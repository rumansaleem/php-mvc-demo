<?php

return [
    'GET' => [
        '/' => 'PagesController@home',
        '/about' => 'PagesController@about',
        '/contact' => 'PagesController@contact',
        '/login' => 'LoginController@showLoginForm',
        '/signup' => 'SignupController@showSignupForm',
    ],
    'POST' => [
        '/login' => 'LoginController@login',
        '/signup' => 'SignupController@signup',
        '/logout' => 'LogoutController@logout',
        '/posts' => 'PostController@store',
    ]
];
