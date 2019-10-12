<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/bootstrap.php';

$router = \App\Core\Router::getInstance();
$request = \App\Core\Request::createFromGlobals();

$router->loadRoutesFrom(__DIR__ . '/../routes.php');

$response = $router->handle($request);

return $response;
