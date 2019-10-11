<?php

require_once __DIR__ . '/../app/bootstrap.php';

require_once __DIR__ . '/../app/database.php';
require_once __DIR__ . '/../app/helpers.php';
require_once __DIR__ . '/../app/Controllers/PagesController.php';
require_once __DIR__ . '/../app/Controllers/LoginController.php';
require_once __DIR__ . '/../app/Controllers/LogoutController.php';
require_once __DIR__ . '/../app/Controllers/SignupController.php';
require_once __DIR__ . '/../app/Controllers/PostController.php';

$routes = [
    'GET' => [
        '/' => 'PagesController@home',
        '/about' => 'PagesController@about',
        '/contact' => 'PagesController@contact',
        '/login' => 'LoginController@showLoginForm',
        '/signup' => 'SignupController@showSignupForm',
    ],
    'POST' => [
        '/login' => 'LoginController@login',
        '/signup' => 'SignupController@signup',
        '/logout' => 'LogoutController@logout',
        '/posts' => 'PostController@store',
    ]
];

$requestMethod = $_SERVER['REQUEST_METHOD'];
$path = '/' . trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

if (!array_key_exists($path, $routes[$requestMethod])) {
    http_response_code(404);
    echo '<h1>404 - Not Found!</h1>';
    return;
}

$controllerName = explode('@', $routes[$requestMethod][$path])[0];
$methodName = explode('@', $routes[$requestMethod][$path])[1];

$controller = new $controllerName($db);

$response = $controller->{$methodName}();

return $response;
