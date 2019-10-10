<?php

    $email = trim($_POST['email']);
    $input_password = trim($_POST['password']);

    $query = "SELECT id, password FROM users WHERE email = ? LIMIT 1";
    
    $statement = $db->prepare($query);

    if($statement === false) {
        printf("SQL Error: %s", $db->error);
    }

    $statement->bind_param('s', $email);
    
    if ($statement->execute() === false) {
        printf("SQL Error: %s", $statement->error);
    }

    $user = $statement->get_result()->fetch_assoc();

    if(password_verify($input_password, $user['password'])) {
        $_SESSION['auth'] = $user['id'];
    }

    header("Location: /");
    