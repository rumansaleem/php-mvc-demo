<?php

namespace App\Controllers;

use App\Core\Auth;

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
        
        $user_id = $this->builder->table('users')->insert([
            'name' => $request->post('name'),
            'email' => $request->post('email'),
            'password' => $hashed_password,
        ]);
        
        Auth::login($user_id);
    
        return redirect('/');
    }
}