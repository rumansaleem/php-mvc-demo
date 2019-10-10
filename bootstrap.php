<?php
    ini_set('display_errors', "on");
    error_reporting(E_ALL);
    session_start();

    $db = require_once __DIR__ . '/database.php';
    require_once __DIR__ . '/helpers.php';