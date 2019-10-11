<?php

class LogoutController extends Controller
{
    public function logout()
    {
        session_destroy();
        
        return redirect('/');
    }
}
