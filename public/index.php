<?php

require_once __DIR__ . '/../app/bootstrap.php';

require_once __DIR__ . '/../app/Request.php';
require_once __DIR__ . '/../app/Router.php';
require_once __DIR__ . '/../app/Database.php';
require_once __DIR__ . '/../app/helpers.php';

require_once __DIR__ . '/../app/Controllers/Controller.php';
require_once __DIR__ . '/../app/Controllers/PagesController.php';
require_once __DIR__ . '/../app/Controllers/LoginController.php';
require_once __DIR__ . '/../app/Controllers/LogoutController.php';
require_once __DIR__ . '/../app/Controllers/SignupController.php';
require_once __DIR__ . '/../app/Controllers/PostController.php';

$router = Router::getInstance();
$request = Request::createFromGlobals();

$router->loadRoutesFrom(__DIR__ . '/../routes.php');

$response = $router->handle($request);

return $response;
