#!/bin/bash

SCRIPT_DIR="$(cd "$(dirname "$0")" && pwd)"

# ─── Nhận diện bố cục: RELEASE (phẳng) hay DEV (Web/ + Tools/ tách) ───────────
if [ -f "$SCRIPT_DIR/router.php" ]; then
    # RELEASE: router.php + cloudflared/ nằm cùng cấp với script
    WEB_ROOT="$SCRIPT_DIR"
    CF_DIR="$SCRIPT_DIR/cloudflared"
else
    # DEV: script nằm trong Script/, web ở ../Web, tool ở ../Tools
    ROOT_DIR="$(cd "$SCRIPT_DIR/.." && pwd)"
    WEB_ROOT="$ROOT_DIR/Web"
    CF_DIR="$ROOT_DIR/Tools/cloudflared"
fi

# PORT được chọn ở khối "Chọn cổng (G1)" bên dưới (mặc định 8888, bận thì 8889/8890).

# ─── PHP ──────────────────────────────────────────────────────────────────────
PHP_EXE="$(which php 2>/dev/null)"
if [ -z "$PHP_EXE" ]; then
    echo "[LOI] Khong tim thay PHP"
    echo "Cai PHP: brew install php"
    exit 1
fi

# ─── Chọn cổng (G1): 8888 bận thì báo tiếng Việt rồi tự lùi 8889/8890 ────────
# TRƯỚC ĐÂY chạy thẳng `php -S localhost:8888`: cổng bận thì PHP in nguyên văn
# "Failed to listen on 127.0.0.1:8888 (reason: Address already in use)" rồi thoát —
# câu tiếng Anh này làm người không rành kỹ thuật tưởng máy hỏng, trong khi
# thường chỉ là cửa sổ Rabit POS cũ chưa đóng (Docs/spec-onboarding-may-moi.md G1).
port_busy() {
    if command -v lsof >/dev/null 2>&1; then
        lsof -nP -iTCP:"$1" -sTCP:LISTEN >/dev/null 2>&1 && return 0
        return 1
    fi
    # Máy không có lsof: thử mở socket bằng chính PHP đã tìm thấy ở trên.
    "$PHP_EXE" -r '$c=@fsockopen("127.0.0.1",(int)$argv[1],$e,$s,0.5); if($c){fclose($c); exit(0);} exit(1);' "$1" >/dev/null 2>&1
}

PORT=""
for CAND in 8888 8889 8890; do
    if port_busy "$CAND"; then
        if [ "$CAND" = "8888" ]; then
            echo "[!] Cổng 8888 đang được dùng bởi chương trình khác (có thể Rabit POS đang chạy sẵn ở cửa sổ khác)."
            echo "    Hãy đóng cửa sổ đó rồi thử lại, hoặc mở http://localhost:8888 xem có phải Rabit POS đang chạy sẵn không."
            echo "    Đang thử cổng khác để bạn vẫn dùng được ngay..."
        else
            echo "    Cổng $CAND cũng đang bận, thử tiếp..."
        fi
        continue
    fi
    PORT="$CAND"
    break
done

if [ -z "$PORT" ]; then
    echo ""
    echo "[LOI] Cả 3 cổng 8888, 8889 và 8890 đều đang bận."
    echo "      Hãy đóng bớt cửa sổ Rabit POS (hoặc chương trình khác) đang chạy rồi mở lại."
    exit 1
fi

if [ "$PORT" != "8888" ]; then
    echo "    => Lần này Rabit POS chạy ở cổng $PORT: http://localhost:$PORT"
    echo ""
fi

# Ghi cổng THẬT đang dùng để trang "Cấu hình tên miền" gửi đúng cổng lên Rabit
# Cloud khi tạo tunnel (nếu vẫn báo 8888 thì tên miền công khai trỏ vào cổng
# trống -> link mở ra lỗi 502 mà không ai hiểu vì sao).
if [ -d "$WEB_ROOT/database" ]; then
    printf '%s' "$PORT" > "$WEB_ROOT/database/.pos_port" 2>/dev/null
fi

# ─── Nguồn tunnel: connector.json (mới) > pairing.json (legacy) ───────────────
# Mô hình tunnel-riêng-mỗi-máy: token do Rabit Cloud cấp (provision {pos_port}
# hoặc pairing), đọc server-side từ file chmod 0600, KHÔNG đưa vào HTML/JS.
# Cơ chế tunnel-chung cũ (TUNNEL_ID 34c7db5e + decrypt_cf.php) ĐÃ NGỪNG dùng
# (deprecate — giữ file để tương thích ngược, không còn được kích hoạt ở đây).
TUN_TOKEN=""
TUN_HOST=""
TUN_SRC=""

CONN_FILE="$CF_DIR/connector.json"
if [ -f "$CONN_FILE" ]; then
    TUN_TOKEN="$("$PHP_EXE" -r '$p=json_decode((string)@file_get_contents($argv[1]),true); echo is_array($p)?(string)($p["token"]??""):"";' "$CONN_FILE" 2>/dev/null)"
    TUN_HOST="$("$PHP_EXE" -r '$p=json_decode((string)@file_get_contents($argv[1]),true); echo is_array($p)?(string)($p["hostname"]??""):"";' "$CONN_FILE" 2>/dev/null)"
    if [ -n "$TUN_TOKEN" ] && echo "$TUN_HOST" | grep -Eq '^[a-z0-9.-]+\.[a-z]{2,}$'; then
        TUN_SRC="connector"
    else
        TUN_TOKEN=""
        TUN_HOST=""
    fi
fi

if [ -z "$TUN_TOKEN" ]; then
    PAIR_FILE="$CF_DIR/pairing.json"
    if [ -f "$PAIR_FILE" ]; then
        PT="$("$PHP_EXE" -r '$p=json_decode((string)@file_get_contents($argv[1]),true); echo is_array($p)?(string)($p["connector_token"]??""):"";' "$PAIR_FILE" 2>/dev/null)"
        PS="$("$PHP_EXE" -r '$p=json_decode((string)@file_get_contents($argv[1]),true); echo is_array($p)?(string)($p["subdomain"]??""):"";' "$PAIR_FILE" 2>/dev/null)"
        PD="$("$PHP_EXE" -r '$p=json_decode((string)@file_get_contents($argv[1]),true); $d=is_array($p)?(string)($p["domain"]??""):""; echo $d!==""?$d:"rabitpos.com";' "$PAIR_FILE" 2>/dev/null)"
        if [ -n "$PT" ] && echo "$PS" | grep -Eq '^[a-z0-9][a-z0-9-]{1,62}$'; then
            TUN_TOKEN="$PT"
            TUN_HOST="${PS}.${PD}"
            TUN_SRC="pairing"
        fi
    fi
fi

# ─── Cloudflared binary (chỉ cần khi có token tunnel) ────────────────────────
CF_BIN="$CF_DIR/cloudflared"
HAS_TUNNEL=0
if [ -n "$TUN_TOKEN" ]; then
    if [ ! -x "$CF_BIN" ]; then
        CF_BIN="$(which cloudflared 2>/dev/null)"
    fi

    if [ -n "$CF_BIN" ] && [ -x "$CF_BIN" ]; then
        HAS_TUNNEL=1
    else
        # Tự tải cloudflared nếu chưa có
        echo "  Dang tai cloudflared..."
        ARCH="$(uname -m)"
        if [ "$ARCH" = "arm64" ]; then
            CF_URL="https://github.com/cloudflare/cloudflared/releases/latest/download/cloudflared-darwin-arm64.tgz"
        else
            CF_URL="https://github.com/cloudflare/cloudflared/releases/latest/download/cloudflared-darwin-amd64.tgz"
        fi
        TMPFILE="$(mktemp /tmp/cf_dl_XXXXXX.tgz)"
        if curl -fsSL "$CF_URL" -o "$TMPFILE" 2>/dev/null; then
            tar xzf "$TMPFILE" -C "$CF_DIR/" 2>/dev/null
            rm -f "$TMPFILE"
            CF_BIN="$CF_DIR/cloudflared"
            chmod +x "$CF_BIN" 2>/dev/null
            [ -x "$CF_BIN" ] && HAS_TUNNEL=1 || echo "  [!] Tai cloudflared that bai, chay local-only."
        else
            rm -f "$TMPFILE"
            echo "  [!] Khong tai duoc cloudflared, chay local-only."
        fi
    fi
fi

# ─── Header ───────────────────────────────────────────────────────────────────
echo "===================================="
echo "  Local  : http://localhost:$PORT"
if [ "$HAS_TUNNEL" -eq 1 ]; then
    echo "  Tunnel : https://$TUN_HOST"
else
    echo "  (Local-only: chua kich hoat ten mien cong khai)"
fi
echo "  Nhan Ctrl+C de dung"
echo "===================================="
echo ""

# ─── Cleanup khi thoát ───────────────────────────────────────────────────────
CF_SUP_PID=""
cleanup() {
    if [ -n "$CF_SUP_PID" ]; then
        # Giết cloudflared con TRƯỚC, rồi mới giết vòng giám sát — nếu làm ngược
        # thì cloudflared thành mồ côi và giữ tunnel sống sau khi đã tắt app.
        pkill -P "$CF_SUP_PID" 2>/dev/null
        kill "$CF_SUP_PID" 2>/dev/null
    fi
    echo ""
    echo "Da dung."
}
trap cleanup EXIT INT TERM

# ─── Khởi động Tunnel (CÓ GIÁM SÁT, tự khởi động lại) ────────────────────────
# Token-managed tunnel: cấu hình ingress do Cloudflare/Rabit Cloud quản lý từ xa,
# KHÔNG cần config.yml/credentials cục bộ — chỉ cần `tunnel run --token <token>`.
#
# TRƯỚC ĐÂY chạy cloudflared MỘT LẦN rồi thả trôi: khi nó chết (mất mạng dài,
# Cloudflare ngắt phiên, máy ngủ dậy...) thì KHÔNG AI khởi động lại -> tên miền
# công khai trả lỗi 1033 và im lặng chết cho tới khi người dùng tự phát hiện.
# Đã gặp thật trên máy cài đặt (tunnel chết, web local vẫn chạy, mất 1 tuần).
# NAY bọc trong vòng giám sát: cloudflared thoát -> chờ vài giây -> chạy lại.
if [ "$HAS_TUNNEL" -eq 1 ]; then
    CF_LOG="$CF_DIR/tunnel.log"
    : > "$CF_LOG" 2>/dev/null || CF_LOG="$(mktemp /tmp/.cf_log_XXXXXX)"

    (
        CF_DELAY=5
        while true; do
            "$CF_BIN" tunnel run --token "$TUN_TOKEN" >> "$CF_LOG" 2>&1
            echo "[$(date '+%Y-%m-%d %H:%M:%S')] cloudflared thoat, khoi dong lai sau ${CF_DELAY}s" >> "$CF_LOG"
            sleep "$CF_DELAY"
            # Lùi dần tới 60s để không quay vòng liên tục khi mạng hỏng lâu.
            [ "$CF_DELAY" -lt 60 ] && CF_DELAY=$((CF_DELAY * 2))
        done
    ) &
    CF_SUP_PID=$!

    echo "  Dang ket noi tunnel ($TUN_SRC)..."
    CONNECTED=0
    for i in $(seq 1 15); do
        sleep 1
        if grep -q "Registered tunnel connection" "$CF_LOG" 2>/dev/null; then
            CONNECTED=1
            break
        fi
    done

    if [ "$CONNECTED" -eq 1 ]; then
        echo "  OK: https://$TUN_HOST"
    else
        echo "  [!] Tunnel chua ket noi, dang thu lai nen. Nhat ky: $CF_LOG"
        tail -5 "$CF_LOG" 2>/dev/null
    fi
    echo ""
fi

# ─── Khởi động PHP ───────────────────────────────────────────────────────────
# Nâng giới hạn upload: PHP hệ thống thường mặc định 2M/8M -> ảnh điện thoại (2-5MB)
# hoặc file .db import (onboarding, có thể vài chục MB) không upload được.
# Ép bằng -d để đồng bộ với bản Windows (Tools/php/php.ini = 200M).
cd "$WEB_ROOT"
"$PHP_EXE" \
    -d upload_max_filesize=200M \
    -d post_max_size=200M \
    -d memory_limit=256M \
    -d max_file_uploads=30 \
    -S localhost:$PORT router.php
