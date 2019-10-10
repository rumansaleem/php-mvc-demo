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
                <li><a href="/about">About Us</a></li>
                <li><a href="/contact">Contact Us</a></li>
                <?php if (! isSignedIn()): ?>
                    <li><a href="/signup">Sign Up</a> / <a href="/login">Log In</a></li>
                <?php else: ?>
                    <li>
                        <form action="/logout" method="POST">
                            <em><?= authenticatedUser()['name'] ?></em>
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <hr>

    <main style="margin: 4rem 0;">