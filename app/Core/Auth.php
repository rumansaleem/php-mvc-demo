<?php

class Auth
{
    const AUTH_SESSION_KEY = 'auth';
    
    public static function login($user)
    {
        return $_SESSION[self::AUTH_SESSION_KEY] = (is_array($user) ? $user['id'] : $user);
    }

    public static function logout()
    {
        return session_destroy();
    }
    
    public static function loggedIn()
    {
        return array_key_exists(self::AUTH_SESSION_KEY, $_SESSION);
    }
    
    public static function guest()
    {
        return !static::loggedIn();
    }

    public static function userId() {
        return $_SESSION[static::AUTH_SESSION_KEY];
    }

    public static function user()
    {
        if (static::guest()) {
            return null;
        }

        return Database::table('users')
            ->select(['id', 'name', 'email'])
            ->where('id', '=', static::userId())
            ->limit(1)
            ->first();
    }
}