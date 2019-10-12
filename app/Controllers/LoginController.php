<?php

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login($request)
    {
        $query = "SELECT id, password FROM users WHERE email = :email LIMIT 1";
        
        $statement = Database::getInstance()->execute($query, ['email' => $request->post('email')]);
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();

        if (password_verify($request->post('password'), $user['password'])) {
            $_SESSION['auth'] = $user['id'];
        }

        return redirect('/');
    }
} 