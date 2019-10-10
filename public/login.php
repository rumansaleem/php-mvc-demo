<?php

require_once __DIR__ . '/../bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $input_password = trim($_POST['password']);

    $query = "SELECT id, password FROM users WHERE email = ? LIMIT 1";
    
    $statement = $db->prepare($query);

    if($statement === false) {
        printf("SQL Error: %s", $db->error);
    }

    $statement->bind_param('s', $email);
    
    if ($statement->execute() === false) {
        printf("SQL Error: %s", $statement->error);
    }

    $user = $statement->get_result()->fetch_assoc();

    if(password_verify($input_password, $user['password'])) {
        $_SESSION['auth'] = $user['id'];
    }

    header("Location: /");
}
?>

<?php
    $title = 'Login';
    require_once __DIR__ . '/../_partials/head.php';
?>
<h1>Login</h1>
<form action="/login.php" method="POST">

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

<?php require_once __DIR__ . '/../_partials/footer.php'; ?>