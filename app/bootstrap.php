<?php

use App\Core\Database;
use App\Core\QueryBuilder;

ini_set('display_errors', "on");
error_reporting(E_ALL);
session_start();

class_alias(\App\Core\Auth::class, 'Auth');
class_alias(\App\Core\Application::class, 'App');

App::register('config', require __DIR__ . '/../config.php');

App::register('db', new Database(App::resolve('config')['database']));

App::register('builder', function () {
    return new QueryBuilder(App::resolve('db'));
});
