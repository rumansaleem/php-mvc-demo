<?php

require_once __DIR__ . '/../app/bootstrap.php';

require_once __DIR__ . '/../app/Core/Request.php';
require_once __DIR__ . '/../app/Core/Router.php';
require_once __DIR__ . '/../app/Core/Database.php';
require_once __DIR__ . '/../app/Core/QueryBuilder.php';
require_once __DIR__ . '/../app/Core/Auth.php';

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
