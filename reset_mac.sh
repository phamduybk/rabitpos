#!/bin/bash
SCRIPT_DIR="$(cd "$(dirname "$0")" && pwd)"
PORT=8888

# Nhận diện bố cục: RELEASE (phẳng) hay DEV (Tools/ tách)
if [ -d "$SCRIPT_DIR/cloudflared" ]; then
    CF_DIR="$SCRIPT_DIR/cloudflared"
else
    CF_DIR="$(cd "$SCRIPT_DIR/.." && pwd)/Tools/cloudflared"
fi
CODE_FILE="$CF_DIR/mycode.txt"

# Kill cloudflared
if pgrep -x cloudflared > /dev/null 2>&1; then
    pkill -x cloudflared 2>/dev/null
    echo "Da tat cloudflared."
fi

# Kill port PHP server — quét cả 8889/8890 vì run_mac.sh tự lùi sang 2 cổng này
# khi 8888 bận (G1); chỉ giết 8888 sẽ để sót tiến trình cũ đang giữ cổng lùi.
for P in $PORT 8889 8890; do
    PID_PHP=$(lsof -ti :$P 2>/dev/null)
    if [ -n "$PID_PHP" ]; then
        kill $PID_PHP 2>/dev/null
        echo "Da tat process port $P (PID: $PID_PHP)."
    fi
done

# Xóa URL cũ
if [ -f "$CODE_FILE" ]; then
    OLD=$(cat "$CODE_FILE")
    rm "$CODE_FILE"
    echo "Da xoa URL cu: https://${OLD}.rabitpos.com"
fi

echo "Chay ./run_mac.sh de tao URL moi."
