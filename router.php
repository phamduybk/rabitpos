<?php
// Router cho PHP built-in server
// Serve static files trực tiếp, còn lại qua index.php
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$file = __DIR__ . $uri;

// Serve static files directly (not directories)
if ($uri !== '/' && file_exists($file) && !is_dir($file)) {
    return false;
}

// Serve index.html for directory requests (e.g. /help/)
if (is_dir($file)) {
    $index = rtrim($file, '/\\') . '/index.html';
    if (file_exists($index)) {
        header('Content-Type: text/html; charset=utf-8');
        readfile($index);
        exit;
    }
}

// Redirect /help/{section} → /help/index.html#{section}
if (preg_match('~^/help/([^/?#]+)$~', $uri, $m)) {
    header('Location: /help/index.html#' . $m[1]);
    exit;
}

require_once __DIR__ . '/index.php';
