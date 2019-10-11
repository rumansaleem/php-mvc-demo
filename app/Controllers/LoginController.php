<?php

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login()
    {
        $email = trim($_POST['email']);
        $input_password = trim($_POST['password']);

        $query = "SELECT id, password FROM users WHERE email = :email LIMIT 1";
        
        $statement = Database::getInstance()->execute($query, ['email' => $email]);
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();

        if (password_verify($input_password, $user['password'])) {
            $_SESSION['auth'] = $user['id'];
        }

        return redirect('/');
    }
} 