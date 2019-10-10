<?php

/**
 * Returns true if the user is signed in or else returns false.
 *
 * @return boolean
 */
function isSignedIn() {
    return array_key_exists('auth', $_SESSION);
}

/**
 * Returns authenticated user as associative array, 
 * if user is not logged in null is returned.
 *
 * @return array|null
 */
function authenticatedUser() {
    if(!isSignedIn()) {
        return null;
    }

    $sql = 'SELECT id, name, email from users WHERE id = ? LIMIT 1';
    
    $db = require __DIR__ . '/database.php';
    
    $statement = $db->prepare($sql);
    $statement->bind_param('i', $_SESSION['auth']);
    $statement->execute();

    return $statement->get_result()->fetch_assoc();
}