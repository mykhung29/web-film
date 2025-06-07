<?php
session_start();
require_once '../config/config.php';
require_once '../app/models/Database.php';
// Autoload controllers and models
spl_autoload_register(function($class) {
    $paths = [
        __DIR__ . '/../app/controllers/' . $class . '.php',
        __DIR__ . '/../app/models/' . $class . '.php'
    ];
    foreach($paths as $file) {
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Parse URI
$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

if ($uri === '') {
    $controller = new HomeController();
    $controller->index();
} elseif (preg_match('#^chi-tiet/([a-zA-Z0-9\-]+)$#', $uri, $matches)) {
    $controller = new MovieController();
    $controller->detail($matches[1]);
} elseif (preg_match('#^xem/([a-zA-Z0-9\-]+)/([a-zA-Z0-9\-]+)$#', $uri, $matches)) {
    $controller = new MovieController();
    $controller->watch($matches[1], $matches[2]); 
} elseif (preg_match('#^the-loai/([a-zA-Z0-9\-]+)$#', $uri, $matches)) {
    $controller = new CategoryController();
    $controller->index($matches[1]);
} elseif (preg_match('#^tim-kiem/(.+)$#', $uri, $matches)) {
    $controller = new SearchController();
    $controller->index($matches[1]);
} elseif ($uri === 'login') {
    $controller = new AuthController();
    $controller->login();
} elseif ($uri === 'logout') {
    $controller = new AuthController();
    $controller->logout();
} else {
    header("HTTP/1.0 404 Not Found");
    echo "Page not found";
}
