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
        
        $user_id = Database::table('users')->insert([
            'name' => $request->post('name'),
            'email' => $request->post('email'),
            'password' => $hashed_password,
        ]);
        
        $_SESSION['auth'] = $user_id;
    
        return redirect('/');
    }
}