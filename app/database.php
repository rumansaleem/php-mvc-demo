<?php

$config = require __DIR__ . '/../config.php';
extract($config['database']);

$db = mysqli_connect($host, $user, $password, $database, $port);

if ($db == null) {
    die('<b>MySql Connection Error:</b> ' . mysqli_connect_error());
} 

return $db;