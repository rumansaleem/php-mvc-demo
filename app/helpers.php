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

    return Database::table('users')
        ->select(['id', 'name', 'email'])
        ->where('id', '=', $_SESSION['auth'])
        ->limit(1)
        ->first();
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