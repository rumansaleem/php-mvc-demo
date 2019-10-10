<?php
    $title = 'Sign Up';
    require_once __DIR__ . '/../_partials/head.php';
?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    
    $query = "INSERT INTO users( name, email, password ) VALUES (?, ?, ?)";
    
    $db = require_once __DIR__ . '/../database.php';
    $statement = $db->prepare($query);

    if($statement === false) {
        printf("SQL Error: %s", $db->error);
    }

    $statement->bind_param('sss', $name, $email, $hashed_password);
    
    if ($statement->execute() === false) {
        printf("SQL Error: %s", $statement->error);
    }

    $user_id = $statement->insert_id;

    $_SESSION['auth'] = $user_id;

    header("Location: /");
}
?>

<h1>Sign Up</h1>
<form action="/signup.php" method="POST">
    <div style="margin-bottom: .5rem;">
        <label style="display: block" for="name">Full Name:</label>
        <input id="name" name="name" type="text" placeholder="e.g. John Doe" style="min-width: 33.33%;">
    </div>

    <div style="margin-bottom: .5rem;">
        <label style="display: block" for="email">Email:</label>
        <input id="email" name="email" type="text" placeholder="e.g. johndoe@gmail.com" style="min-width: 33.33%;">
    </div>

    <div style="margin-bottom: .5rem;">
        <label style="display: block" for="password">Password:</label>
        <input id="password" name="password" type="password" placeholder="Choose a password" style="min-width: 33.33%;">
    </div>

    <div style="margin-bottom: .5rem;">
        <label style="display: block" for="confirm_password">Confirm Password:</label>
        <input id="confirm_password" name="confirm_password" type="password" placeholder="Re-enter your password" style="min-width: 33.33%;">
    </div>

    <div style="margin-bottom: .5rem;">
        <button type="submit">Sign Up</button>
    </div> 
</form>

<?php require_once __DIR__ . '/../_partials/footer.php'; ?>