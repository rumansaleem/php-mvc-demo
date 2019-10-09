<?php
    ini_set('display_errors', "on");
    error_reporting(E_ALL);
    
    $db = require_once __DIR__ . '/../database.php';
 
    $statement = $db->prepare('SELECT * FROM posts');

    if($statement === false) {
        die('<b>SQLError: </b>' . $db->error);
    }

    if($statement->execute() === false) {
        die('<b>SQLError: </b>' . $statement->error);
    }

    $posts = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home | Equinox Technical Blog</title>
</head>
<body>
    <header>
        <h1>Equinox Technical Blog</h1>
    
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/about.php">About Us</a></li>
                <li><a href="/contact.php">Contact Us</a></li>
            </ul>
        </nav>
    </header>

    <hr>

    <main>
        <h2>Posts</h2>
        <p>We currently have <?= count($posts) ?> post<?= count($posts) == 1 ? '' : 's' ?>.</p>

        <div style="margin-top: 4rem;">
            <?php foreach($posts as  $post): ?>
                <div style="margin: 2rem 0;">
                    <h3><?= $post['title'] ?></h3>
                    <p><?= $post['content'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>        
    </main>
</body>
</html>

