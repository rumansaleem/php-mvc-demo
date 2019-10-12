<?php

require_once __DIR__ . '/../app/bootstrap.php';

require_once __DIR__ . '/../vendor/autoload.php';

class_alias(\App\Core\Auth::class, 'Auth');

$router = \App\Core\Router::getInstance();
$request = \App\Core\Request::createFromGlobals();

$router->loadRoutesFrom(__DIR__ . '/../routes.php');

$response = $router->handle($request);

return $response;
