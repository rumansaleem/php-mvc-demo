<?php

class LogoutController extends Controller
{
    public function logout()
    {
        Auth::logout();
        
        return redirect('/');
    }
}
