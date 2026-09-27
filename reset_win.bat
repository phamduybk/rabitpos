@echo off
setlocal EnableDelayedExpansion

:: Nhận diện bố cục: RELEASE (phẳng) hay DEV (Tools\ tách)
IF EXIST "%~dp0cloudflared\" (
    SET CF_DIR=%~dp0cloudflared
) ELSE (
    FOR %%I IN ("%~dp0..") DO SET ROOT_DIR=%%~fI
    SET CF_DIR=!ROOT_DIR!\Tools\cloudflared
)
SET CODE_FILE=!CF_DIR!\mycode.txt
SET /P DOMAIN=<"!CF_DIR!\domain.txt"

TASKKILL /F /IM cloudflared.exe >nul 2>&1

:: Quet ca 8889/8890 vi run_window.bat tu lui sang 2 cong nay khi 8888 ban (G1).
FOR /F "tokens=5" %%i IN ('netstat -ano ^| findstr ":8888 " ^| findstr "LISTENING"') DO TASKKILL /F /PID %%i >nul 2>&1
FOR /F "tokens=5" %%i IN ('netstat -ano ^| findstr ":8889 " ^| findstr "LISTENING"') DO TASKKILL /F /PID %%i >nul 2>&1
FOR /F "tokens=5" %%i IN ('netstat -ano ^| findstr ":8890 " ^| findstr "LISTENING"') DO TASKKILL /F /PID %%i >nul 2>&1

IF NOT EXIST "%CODE_FILE%" GOTO :done
SET /P OLD_CODE=<"%CODE_FILE%"
SET OLD_CODE=%OLD_CODE: =%
DEL /F /Q "%CODE_FILE%"
echo Da xoa URL cu: https://%OLD_CODE%.%DOMAIN%

:done
echo Chay run_window.bat de tao URL moi.
pause
