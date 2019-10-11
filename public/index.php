<?php

require_once __DIR__ . '/../app/bootstrap.php';

require_once __DIR__ . '/../app/database.php';
require_once __DIR__ . '/../app/helpers.php';

$routes = [
    'GET' => [
        '/' => 'HomeController',
        '/about' => 'AboutController',
        '/contact' => 'ContactController',
        '/login' => 'LoginFormController',
        '/signup' => 'SignupFormController',
    ],
    'POST' => [
        '/login' => 'LoginController',
        '/signup' => 'SignupController',
        '/logout' => 'LogoutController',
        '/posts' => 'CreatePostController',
    ]
];

$requestMethod = $_SERVER['REQUEST_METHOD'];
$path = '/' . trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

if (!array_key_exists($path, $routes[$requestMethod])) {
    http_response_code(404);
    echo '<h1>404 - Not Found!</h1>';
    return;
}

$controller = $routes[$requestMethod][$path];

require __DIR__ . "/../app/Controllers/{$controller}.php";
