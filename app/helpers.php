<?php


function dump($value) {
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}

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

    $query = 'SELECT id, name, email from users WHERE id = :user_id LIMIT 1';

    $statement = Database::getInstance()->execute($query, ['user_id' => $_SESSION['auth']]);
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    
    return $user;
}

/**
 * Loads the view with given data.
 *
 * @param string $view
 * @param array $data
 * @return void
 */
function view($view, $data = []) {
    extract($data);
    require __DIR__ . '/../views/' . str_replace('.', '/', $view) . '.view.php';
}

/**
 * Redirects to the given url with 302 status code
 *
 * @param string $url
 * @return void
 */
function redirect($url) {
    return header("Location: $url", true, 302);
}