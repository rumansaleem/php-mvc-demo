<?php
    $title = 'Logout';
    require_once __DIR__ . '/../_partials/head.php';
?>

<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        session_destroy();
    }
    
    header('Location: /');
?>
