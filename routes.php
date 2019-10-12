<?php

Router::route('GET', '/', 'PagesController@home');
Router::route('GET', '/about', 'PagesController@about');
Router::route('GET', '/contact', 'PagesController@contact');

Router::route('GET', '/signup', 'SignupController@showSignupForm');
Router::route('POST', '/signup', 'SignupController@signup');
Router::route('GET', '/login', 'LoginController@showLoginForm');
Router::route('POST', '/login', 'LoginController@login');
Router::route('POST', '/logout', 'LogoutController@logout');

Router::route('POST', '/posts', 'PostController@store');
