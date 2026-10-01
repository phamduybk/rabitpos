<?php
// Router cho PHP built-in server (run_window.bat, run_mac.sh, Docker, gói Synology).
// Serve static files trực tiếp, còn lại qua index.php
//
// BẢO MẬT (2026-09-29, bản 5.0.3): built-in server KHÔNG đọc .htaccess/web.config, nên trước
// đây MỌI file trong web root đều tải được qua HTTP — kể cả khi mở ra LAN (NAS) hoặc qua
// Cloudflare Tunnel: /database/*.db (toàn bộ dữ liệu + hash mật khẩu), /database/.secret_key,
// /cloudflared/connector.json|pairing.json (token tunnel/thiết bị), và các file .php lẻ được
// THỰC THI trực tiếp (vd vendor/phpunit eval-stdin.php = chạy lệnh từ xa).
// Nay:
//   1. Chuẩn hóa đường dẫn (bỏ '.', '//', '\'), từ chối '..', NUL, và các dạng tên chỉ có
//      nghĩa trên Windows: dấu chấm/khoảng trắng cuối tên ("database."), ADS ("x.db::$DATA"),
//      tên ngắn 8.3 ("DATABA~1") — NTFS coi chúng là cùng một file nên phải chặn trước.
//   2. Chặn cứng thư mục/đuôi file riêng tư (không phân biệt hoa thường).
//   3. File tĩnh chỉ được phục vụ khi đuôi nằm trong danh sách cho phép; PHP chỉ chạy qua index.php.
//   4. Kiểm lại bằng realpath (bắt mọi biến thể tên mà hệ điều hành tự quy về cùng một file).
$uri = (string) (isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/');
$cut = strcspn($uri, '?#');                 // KHÔNG dùng parse_url: "//database/x" bị hiểu là host
$uri = rb_router_normalize(rawurldecode(substr($uri, 0, $cut)));

if ($uri === null || rb_router_is_private($uri)) {
    rb_router_404();
}

$file = __DIR__ . $uri;

// Serve static files directly (not directories). File .php lẻ KHÔNG được thực thi trực tiếp:
// mọi request động đi qua index.php (CodeIgniter) như trên Apache.
if ($uri !== '/' && file_exists($file) && !is_dir($file)) {
    if ($uri === '/index.php') {
        return false;
    }
    if (!rb_router_static_allowed($uri) || !rb_router_realpath_ok($file)) {
        rb_router_404();
    }
    return false;
}

// Serve index.html for directory requests (e.g. /help/)
if (is_dir($file)) {
    $index = rtrim($file, '/\\') . '/index.html';
    if (file_exists($index) && rb_router_realpath_ok($index)) {
        header('Content-Type: text/html; charset=utf-8');
        readfile($index);
        exit;
    }
}

// Redirect /help/{section} → /help/index.html#{section}
if (preg_match('~^/help/([^/?#]+)$~', $uri, $m)) {
    // Tương đối ("index.html#..." cùng thư mục /help/) để vẫn đúng khi chạy sau proxy
    // dưới đường dẫn con (Synology: /rabitpos/help/x -> /rabitpos/help/index.html#x).
    header('Location: index.html#' . rawurlencode($m[1]));
    exit;
}

require_once __DIR__ . '/index.php';

function rb_router_404()
{
    http_response_code(404);
    header('Content-Type: text/plain; charset=utf-8');
    echo 'Not Found';
    exit;
}

/**
 * '/a//b/./c' -> '/a/b/c'. Trả null nếu đường dẫn có dạng nguy hiểm.
 */
function rb_router_normalize($path)
{
    if (strpos($path, "\0") !== false) {
        return null;
    }
    $out = array();
    foreach (explode('/', str_replace('\\', '/', $path)) as $seg) {
        if ($seg === '' || $seg === '.') {
            continue;
        }
        if ($seg === '..'
            || strpos($seg, ':') !== false                 // ADS "::$DATA", ổ đĩa "C:"
            || preg_match('~[. ]$~', $seg)                 // "database." / "x.db " (Windows bỏ đuôi này)
            || preg_match('#~[0-9]#', $seg)                // tên ngắn 8.3: DATABA~1
            || preg_match('~[\x00-\x1f<>"|*?]~', $seg)) {  // ký tự không hợp lệ trong tên file
            return null;
        }
        $out[] = $seg;
    }
    return '/' . implode('/', $out);
}

/**
 * Đường dẫn không bao giờ được phục vụ trực tiếp qua HTTP.
 * - thư mục chứa dữ liệu, mã nguồn, runtime, token tunnel, tệp CSV khách tải lên.
 * - dotfile (.secret_key, .setup_done, .pos_port, .git...).
 * - đuôi file dữ liệu/cấu hình/script.
 */
function rb_router_is_private($uri)
{
    if (preg_match('~^/(database|cloudflared|application|system|vendor|php|Tools|Script|logs)(/|$)~i', $uri)) {
        return true;
    }
    if (preg_match('~^/uploads/csv/(customers|items|suppliers)(/|$)~i', $uri)) {
        return true;
    }
    if (preg_match('~/\.[^/]~', $uri)) {
        return true;
    }
    if (preg_match('~\.(db|db-wal|db-shm|db-journal|sqlite|sqlite3|sql|log|ini|sh|bat|cmd|ps1|exe|dll|lock|pid|env|bak|yml|yaml|key|pem|crt)$~i', $uri)) {
        return true;
    }
    return (bool) preg_match('~^/(composer\.(json|lock)|web\.config|router\.php)$~i', $uri);
}

/** File tĩnh: chỉ các đuôi giao diện/tài nguyên công khai. Mọi đuôi khác -> 404. */
function rb_router_static_allowed($uri)
{
    return (bool) preg_match(
        '~\.(css|js|map|json|html?|txt|csv|xml|png|jpe?g|gif|svg|webp|ico|bmp|woff2?|ttf|eot|otf|mp3|mp4|ogg|wav|webm|pdf)$~i',
        $uri
    );
}

/**
 * Kiểm lại trên đường dẫn THẬT của file: hệ điều hành có thể quy nhiều cách viết về cùng một
 * file (hoa/thường, tên ngắn...). Nếu file thật nằm trong web root thì đường dẫn tương đối của
 * nó cũng phải qua được các luật trên. (Thư mục trỏ symlink ra ngoài root — vd uploads/ trên
 * gói Synology — đã được kiểm theo URL ở trên.)
 */
function rb_router_realpath_ok($file)
{
    $real = realpath($file);
    $root = realpath(__DIR__);
    if ($real === false || $root === false) {
        return false;
    }
    $real = str_replace('\\', '/', $real);
    $root = rtrim(str_replace('\\', '/', $root), '/');
    if (stripos($real, $root . '/') !== 0) {
        return true;
    }
    $rel = '/' . substr($real, strlen($root) + 1);
    if (rb_router_is_private($rel)) {
        return false;
    }
    return substr($rel, -11) === '/index.html' || rb_router_static_allowed($rel);
}
