<?php

require_once __DIR__ . '/../app/bootstrap.php';

require_once __DIR__ . '/../app/database.php';
require_once __DIR__ . '/../app/helpers.php';

$requestMethod = $_SERVER['REQUEST_METHOD'];
$path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

if ($requestMethod == 'GET') {
    if ($path == '') {
        require __DIR__ . '/../app/Controllers/HomeController.php';
    } else if ($path == 'about') {
        require __DIR__ . '/../app/Controllers/AboutController.php';
    } else if ($path == 'contact') {
        require __DIR__ . '/../app/Controllers/ContactController.php';
    } else if ($path == 'login') {
        require __DIR__ . '/../app/Controllers/LoginFormController.php';
    } else if ($path == 'signup') {
        require __DIR__ . '/../app/Controllers/SignupFormController.php';
    } 
} else if ($requestMethod == 'POST') {
    if ($path == 'login') {
        require __DIR__ . '/../app/Controllers/LoginController.php';
    } else if ($path == 'signup') {
        require __DIR__ . '/../app/Controllers/SignupController.php';
    } else if ($path == 'logout') {
        require __DIR__ . '/../app/Controllers/LogoutController.php';
    } else if($path == 'posts') {
        require __DIR__ . '/../app/Controllers/CreatePostController.php';
    }
} else {
    http_response_code(404);
    echo '404 Not Found!';
}
