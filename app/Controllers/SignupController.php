<?php

class SignupController extends Controller
{
    public function showSignupForm()
    {
        return view('signup');
    }

    public function signup($request) 
    {
        $confirm_password = $request->post('confirm_password');
    
        $hashed_password = password_hash($request->post('password'), PASSWORD_BCRYPT);
        
        $db = Database::getInstance();
        $query = "INSERT INTO users( name, email, password ) VALUES (:name, :email, :password)";

        $db->execute($query, [
            'name' => $request->post('name'),
            'email' => $request->post('email'),
            'password' => $hashed_password
        ]);
    
        $user_id = $db->lastInsertId();
        
        $_SESSION['auth'] = $user_id;
    
        return redirect('/');
    }
}