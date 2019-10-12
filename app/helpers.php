<?php


function dump($value) {
    echo '<pre>';
    print_r($value);
    echo '</pre>';
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