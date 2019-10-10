<?php 
    require_once __DIR__ . '/../bootstrap.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        session_destroy();
    }
    
    header('Location: /');
