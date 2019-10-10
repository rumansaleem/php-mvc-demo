<?php
    require_once __DIR__ . '/../../bootstrap.php';

    if ($_SERVER['REQUEST_METHOD'] != 'POST' || !isSignedIn()) {
        header('Location: /');
    }

    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    $query = "INSERT INTO posts (title, content, author_id) VALUES (?, ?, ?);";

    $statement = $db->prepare($query);
    $statement->bind_param('ssi', $title, $content, $_SESSION['auth']);

    if ($statement->execute()) {
        header('Location: /');
    }

    echo "ERORR: {$statement->error}";
?>