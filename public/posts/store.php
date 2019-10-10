<?php
    $title = "Store Post";
    require_once __DIR__ . '/../../_partials/head.php';

    if ($_SERVER['REQUEST_METHOD'] != 'POST' || !array_key_exists('auth', $_SESSION)) {
        header('Location: /');
    }

    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    $db = require_once __DIR__ . '/../../database.php';

    $query = "INSERT INTO posts (title, content, author_id) VALUES (?, ?, ?);";

    $statement = $db->prepare($query);
    $statement->bind_param('ssi', $title, $content, $_SESSION['auth']);

    if ($statement->execute()) {
        header('Location: /');
    }

    echo "ERORR: {$statement->error}";
?>