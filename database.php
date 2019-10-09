<?php

$config = require __DIR__ . '/config.php';
extract($config['database']);

$connection = mysqli_connect($host, $user, $password, $database, $port);

if ($connection == null) {
    die('<b>MySql Connection Error:</b> ' . mysqli_connect_error());
} 

return $connection;