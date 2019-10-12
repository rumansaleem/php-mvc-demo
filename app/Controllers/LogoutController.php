<?php

namespace App\Controllers;

use App\Core\Auth;

class LogoutController extends Controller
{
    public function logout()
    {
        Auth::logout();
        
        return redirect('/');
    }
}
