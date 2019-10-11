<?php

class SignupController extends Controller
{
    public function showSignupForm()
    {
        return view('signup');
    }

    public function signup() 
    {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $confirm_password = trim($_POST['confirm_password']);
    
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        
        $db = Database::getInstance();
        $query = "INSERT INTO users( name, email, password ) VALUES (:name, :email, :password)";

        $db->execute($query, [
            'name' => $name,
            'email' => $email,
            'password' => $hashed_password
        ]);
    
        $user_id = $db->lastInsertId();
        
        $_SESSION['auth'] = $user_id;
    
        return redirect('/');
    }
}