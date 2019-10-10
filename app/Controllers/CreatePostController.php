<?php

    if (!isSignedIn()) {
        header('Location: /');
    }

    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    $query = "INSERT INTO posts (title, content, author_id) VALUES (?, ?, ?);";

    $statement = $db->prepare($query);
    $statement->bind_param('ssi', $title, $content, $_SESSION['auth']);

    $statement->execute();

    header('Location: /');