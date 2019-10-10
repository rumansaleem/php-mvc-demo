<?php
    $title = 'Login';
    require_once __DIR__ . '/../../_partials/head.php';
?>
<h1>Login</h1>
<form action="/login" method="POST">

    <div style="margin-bottom: .5rem;">
        <label style="display: block" for="email">Email:</label>
        <input id="email" name="email" type="text" placeholder="e.g. johndoe@gmail.com" style="min-width: 33.33%;">
    </div>

    <div style="margin-bottom: .5rem;">
        <label style="display: block" for="password">Password:</label>
        <input id="password" name="password" type="password" placeholder="Choose a password" style="min-width: 33.33%;">
    </div>

    <div style="margin-bottom: .5rem;">
        <button type="submit">Login</button>
    </div> 
</form>

<?php require_once __DIR__ . '/../../_partials/footer.php'; ?>