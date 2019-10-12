<?php

require_once __DIR__ . '/../app/bootstrap.php';

require_once __DIR__ . '/../vendor/autoload.php';

$router = Router::getInstance();
$request = Request::createFromGlobals();

$router->loadRoutesFrom(__DIR__ . '/../routes.php');

$response = $router->handle($request);

return $response;
