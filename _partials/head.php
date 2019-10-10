<?php
    ini_set('display_errors', "on");
    error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ? $title . ' | ' : '' ?>Equinox Technical Blog</title>
</head>
<body>
    <header>
        <h1>Equinox Technical Blog</h1>
    
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/about.php">About Us</a></li>
                <li><a href="/contact.php">Contact Us</a></li>
            </ul>
        </nav>
    </header>

    <hr>

    <main style="margin: 4rem 0;">