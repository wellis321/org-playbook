<?php
/**
 * Router script for PHP's built-in development server
 * This handles URL rewriting similar to .htaccess
 */

$requestUri = $_SERVER['REQUEST_URI'];
$scriptName = $_SERVER['SCRIPT_NAME'];

// Remove query string for routing
$uri = parse_url($requestUri, PHP_URL_PATH);

// If it's a file that exists (not a directory), serve it directly
$filePath = __DIR__ . $uri;
if ($uri !== '/' && file_exists($filePath) && !is_dir($filePath)) {
    return false; // Let PHP serve the file directly
}

// Route: /playbook -> playbook/index.php
if ($uri === '/playbook' || $uri === '/playbook/') {
    $_SERVER['SCRIPT_NAME'] = '/playbook/index.php';
    require __DIR__ . '/playbook/index.php';
    return true;
}

// Route: /playbook/[page] -> playbook/[page].php
if (preg_match('#^/playbook/([^/]+)/?$#', $uri, $matches)) {
    $page = $matches[1];
    $phpFile = __DIR__ . '/playbook/' . $page . '.php';
    if (file_exists($phpFile)) {
        $_SERVER['SCRIPT_NAME'] = '/playbook/' . $page . '.php';
        require $phpFile;
        return true;
    }
}

// Route: /blogs -> blogs/index.php
if ($uri === '/blogs' || $uri === '/blogs/') {
    $_SERVER['SCRIPT_NAME'] = '/blogs/index.php';
    require __DIR__ . '/blogs/index.php';
    return true;
}

// Route: /blogs/[slug] -> blogs/[slug].php
if (preg_match('#^/blogs/([^/]+)/?$#', $uri, $matches)) {
    $slug = $matches[1];
    $phpFile = __DIR__ . '/blogs/' . $slug . '.php';
    if (file_exists($phpFile)) {
        $_SERVER['SCRIPT_NAME'] = '/blogs/' . $slug . '.php';
        require $phpFile;
        return true;
    }
}

// Route: /roadmap -> roadmap/index.php
if ($uri === '/roadmap' || $uri === '/roadmap/') {
    $_SERVER['SCRIPT_NAME'] = '/roadmap/index.php';
    require __DIR__ . '/roadmap/index.php';
    return true;
}

// Route: /systems -> systems/index.php
if ($uri === '/systems' || $uri === '/systems/') {
    $_SERVER['SCRIPT_NAME'] = '/systems/index.php';
    require __DIR__ . '/systems/index.php';
    return true;
}

// Route: /systems/[slug] -> systems/detail.php?slug=[slug]
if (preg_match('#^/systems/([^/]+)/?$#', $uri, $matches)) {
    $slug = $matches[1];
    $queryString = $_SERVER['QUERY_STRING'] ?? '';
    $_GET['slug'] = $slug;
    if ($queryString) {
        parse_str($queryString, $queryParams);
        $_GET = array_merge($_GET, $queryParams);
    }
    $_SERVER['SCRIPT_NAME'] = '/systems/detail.php';
    require __DIR__ . '/systems/detail.php';
    return true;
}

// Route: /admin -> admin/index.php
if ($uri === '/admin' || $uri === '/admin/') {
    $_SERVER['SCRIPT_NAME'] = '/admin/index.php';
    require __DIR__ . '/admin/index.php';
    return true;
}

// Default: serve index.php for root
if ($uri === '/' || $uri === '') {
    $_SERVER['SCRIPT_NAME'] = '/index.php';
    require __DIR__ . '/index.php';
    return true;
}

// For other paths, let PHP's default handler deal with it
return false;
