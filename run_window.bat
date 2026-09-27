@echo off
setlocal EnableDelayedExpansion
title POS Ban Hang
color 0A

SET SCRIPT_DIR=%~dp0

:: ── Nhận diện bố cục: RELEASE (phẳng) hay DEV (Web\ + Tools\ tách) ──────────
IF EXIST "%SCRIPT_DIR%router.php" (
    REM RELEASE: router.php + php\ + cloudflared\ cùng cấp
    SET WEB_ROOT=%SCRIPT_DIR%
    SET PHP_DIR=%SCRIPT_DIR%php
    SET CF_DIR=%SCRIPT_DIR%cloudflared
) ELSE (
    REM DEV: script trong Script\, web ở ..\Web, tool ở ..\Tools
    FOR %%I IN ("%SCRIPT_DIR%..") DO SET ROOT_DIR=%%~fI
    SET WEB_ROOT=!ROOT_DIR!\Web\
    SET PHP_DIR=!ROOT_DIR!\Tools\php
    SET CF_DIR=!ROOT_DIR!\Tools\cloudflared
)
SET PHP_EXE=!PHP_DIR!\php.exe
SET CF_BIN=!CF_DIR!\cloudflared.exe
SET PORT=

:: ── Chế độ GIÁM SÁT TUNNEL (tự gọi lại chính file này ở tiến trình nền) ─────
:: Xem ghi chú ở nhãn :tunnel_sup phía cuối file.
IF "%~1"=="__tunnel_sup" GOTO tunnel_sup

SET CONN_FILE=!CF_DIR!\connector.json
SET PAIR_FILE=!CF_DIR!\pairing.json
SET TUN_TOKEN=
SET TUN_HOST=
SET TUN_SRC=

IF NOT EXIST "!PHP_EXE!" (
    echo [LOI] Khong tim thay php.exe: !PHP_EXE!
    echo.
    echo Huong dan: Tai PHP 8.x NTS tu https://windows.php.net/download/
    echo            Giai nen vao thu muc php\
    pause
    exit /b 1
)

:: ── Chọn cổng (G1): 8888 bận thì báo tiếng Việt rồi tự lùi 8889/8890 ───────
:: TRƯỚC ĐÂY chạy thẳng `php -S localhost:8888`: cổng bận thì PHP in nguyên văn
:: "Failed to listen on 127.0.0.1:8888 (reason: Address already in use)" rồi cửa
:: sổ cmd chớp tắt — người không rành kỹ thuật tưởng máy hỏng, trong khi thường
:: chỉ là cửa sổ Rabit POS cũ chưa đóng (Docs/spec-onboarding-may-moi.md G1).
:: Viet kieu "moi dong mot lenh" (khong nhan :label, khong CALL, khong long khoi
:: ngoac) de chay dung ca khi file .bat co dau dong LF — dung dung khuon FOR /F +
:: netstat da co san o reset_win.bat.
SET PBUSY=
FOR /F "delims=" %%i IN ('netstat -ano ^| findstr ":8888 " ^| findstr "LISTENING"') DO SET PBUSY=1
IF NOT DEFINED PBUSY SET PORT=8888
IF DEFINED PBUSY echo   [CHU Y] Cong 8888 dang duoc dung boi chuong trinh khac ^(co the Rabit POS dang chay san o cua so khac^).
IF DEFINED PBUSY echo           Hay dong cua so do roi thu lai, hoac mo http://localhost:8888 xem co phai Rabit POS dang chay san khong.
IF DEFINED PBUSY echo           Dang thu cong khac de ban van dung duoc ngay...

SET PBUSY=
IF NOT DEFINED PORT FOR /F "delims=" %%i IN ('netstat -ano ^| findstr ":8889 " ^| findstr "LISTENING"') DO SET PBUSY=1
IF NOT DEFINED PORT IF NOT DEFINED PBUSY SET PORT=8889
IF NOT DEFINED PORT echo           Cong 8889 cung dang ban, thu tiep...

SET PBUSY=
IF NOT DEFINED PORT FOR /F "delims=" %%i IN ('netstat -ano ^| findstr ":8890 " ^| findstr "LISTENING"') DO SET PBUSY=1
IF NOT DEFINED PORT IF NOT DEFINED PBUSY SET PORT=8890
IF NOT DEFINED PORT echo           Cong 8890 cung dang ban, thu tiep...

IF NOT DEFINED PORT echo.
IF NOT DEFINED PORT echo [LOI] Ca 3 cong 8888, 8889 va 8890 deu dang ban.
IF NOT DEFINED PORT echo       Hay dong bot cua so Rabit POS ^(hoac chuong trinh khac^) dang chay roi mo lai.
IF NOT DEFINED PORT pause
IF NOT DEFINED PORT exit /b 1

IF NOT "!PORT!"=="8888" echo   =^> Lan nay Rabit POS chay o cong !PORT!: http://localhost:!PORT!
IF NOT "!PORT!"=="8888" echo.

:: Ghi cổng THẬT đang dùng để trang "Cấu hình tên miền" gửi đúng cổng lên Rabit
:: Cloud khi tạo tunnel (nếu vẫn báo 8888 thì tên miền công khai trỏ vào cổng
:: trống -> link mở ra lỗi 502 mà không ai hiểu vì sao).
IF EXIST "!WEB_ROOT!database" >"!WEB_ROOT!database\.pos_port" echo !PORT!

:: ── Nguồn tunnel: connector.json (mới) > pairing.json (legacy) ─────────────
:: Token do Rabit Cloud cấp (provision {pos_port} hoặc pairing), đọc từ file.
:: Cơ chế tunnel-chung cũ (TUNNEL_ID 34c7db5e + decrypt_cf.php) ĐÃ NGỪNG dùng.
IF EXIST "!CONN_FILE!" (
    FOR /F "usebackq delims=" %%i IN (`powershell -NoProfile -Command "try { $p=Get-Content -Raw -LiteralPath '!CONN_FILE!' | ConvertFrom-Json; [Console]::Write($p.token) } catch {}"`) DO SET TUN_TOKEN=%%i
    FOR /F "usebackq delims=" %%i IN (`powershell -NoProfile -Command "try { $p=Get-Content -Raw -LiteralPath '!CONN_FILE!' | ConvertFrom-Json; [Console]::Write($p.hostname) } catch {}"`) DO SET TUN_HOST=%%i
    IF NOT "!TUN_TOKEN!"=="" SET TUN_SRC=connector
)

IF "!TUN_TOKEN!"=="" IF EXIST "!PAIR_FILE!" (
    FOR /F "usebackq delims=" %%i IN (`powershell -NoProfile -Command "try { $p=Get-Content -Raw -LiteralPath '!PAIR_FILE!' | ConvertFrom-Json; [Console]::Write($p.connector_token) } catch {}"`) DO SET TUN_TOKEN=%%i
    FOR /F "usebackq delims=" %%i IN (`powershell -NoProfile -Command "try { $p=Get-Content -Raw -LiteralPath '!PAIR_FILE!' | ConvertFrom-Json; $d=if($p.domain){$p.domain}else{'rabitpos.com'}; [Console]::Write(('{0}.{1}' -f $p.subdomain,$d)) } catch {}"`) DO SET TUN_HOST=%%i
    IF NOT "!TUN_TOKEN!"=="" SET TUN_SRC=pairing
)

:: ── Cloudflared binary (chỉ cần khi có token) ─────────────────────────────
SET HAS_TUNNEL=0
IF "!TUN_TOKEN!"=="" GOTO :header

IF NOT EXIST "%CF_BIN%" (
    echo   Dang tai cloudflared.exe...
    powershell -Command "try { Invoke-WebRequest -Uri 'https://github.com/cloudflare/cloudflared/releases/latest/download/cloudflared-windows-amd64.exe' -OutFile '%CF_BIN%' -UseBasicParsing } catch { Write-Host 'Tai that bai' }" 2>nul
)

IF EXIST "%CF_BIN%" (
    SET HAS_TUNNEL=1
) ELSE (
    echo   [!] Khong tai duoc cloudflared, chay local-only.
)

:header
echo ====================================
echo   Local  : http://localhost:!PORT!
IF "!HAS_TUNNEL!"=="1" echo   Tunnel : https://!TUN_HOST!
IF NOT "!HAS_TUNNEL!"=="1" echo   (Local-only: chua kich hoat ten mien cong khai)
echo   Nhan Ctrl+C de dung
echo ====================================
echo.

:: ── Khởi động tunnel nền (CÓ GIÁM SÁT, tự khởi động lại) ─────────────────
:: Token-managed tunnel: ingress do Cloudflare/Rabit Cloud quản lý từ xa,
:: KHÔNG cần config.yml/credentials cục bộ.
::
:: TRƯỚC ĐÂY chạy cloudflared MỘT LẦN rồi thả trôi: khi nó chết (mất mạng dài,
:: Cloudflare ngắt phiên, máy ngủ dậy...) thì KHÔNG AI khởi động lại -> tên miền
:: công khai trả lỗi 1033 và im lặng chết cho tới khi người dùng tự phát hiện.
:: NAY chạy qua nhãn :tunnel_sup — cloudflared thoát thì chờ rồi chạy lại.
IF "!HAS_TUNNEL!"=="1" (
    START /B "" cmd /c ""%~f0" __tunnel_sup "!CF_BIN!" "!TUN_TOKEN!" "!CF_DIR!""
)

:start_php_run
cd /d "!WEB_ROOT!"
"!PHP_EXE!" -c "!PHP_DIR!\php.ini" -S localhost:!PORT! router.php

:: ── Cleanup khi PHP thoát ────────────────────────────────────────────────
:: Dừng vòng giám sát TRƯỚC, nếu không nó sẽ hồi sinh cloudflared ngay sau khi
:: TASKKILL — để lại tunnel mồ côi trỏ vào web đã tắt.
TASKKILL /F /FI "WINDOWTITLE eq POS Tunnel Supervisor" >nul 2>&1
DEL /Q "!CF_DIR!\tunnel.run" >nul 2>&1
TASKKILL /F /IM cloudflared.exe >nul 2>&1

pause
EXIT /B 0

:: ── Vòng giám sát tunnel ─────────────────────────────────────────────────
:: Chạy ở tiến trình nền riêng. Thoát khi tệp cờ tunnel.run bị xóa (lúc app tắt).
:: %2 = cloudflared.exe, %3 = token, %4 = thư mục cloudflared
:tunnel_sup
title POS Tunnel Supervisor
SET SUP_BIN=%~2
SET SUP_TOK=%~3
SET SUP_DIR=%~4
SET SUP_LOG=!SUP_DIR!\tunnel.log
SET SUP_DELAY=5
echo running > "!SUP_DIR!\tunnel.run"
:tunnel_sup_loop
IF NOT EXIST "!SUP_DIR!\tunnel.run" EXIT /B 0
"!SUP_BIN!" tunnel run --token "!SUP_TOK!" >> "!SUP_LOG!" 2>&1
echo [%date% %time%] cloudflared thoat, khoi dong lai sau !SUP_DELAY!s >> "!SUP_LOG!"
timeout /t !SUP_DELAY! /nobreak >nul
:: Lùi dần tới 60s để không quay vòng liên tục khi mạng hỏng lâu.
IF !SUP_DELAY! LSS 60 SET /A SUP_DELAY=!SUP_DELAY!*2
GOTO tunnel_sup_loop
