<?php 
    $title = 'Home';
    require_once __DIR__ . '/../_partials/head.php'; 
?>

<?php
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

<?php require_once __DIR__ . '/../_partials/footer.php'; ?>
