<?php

namespace App\Core;

use Exception;

class Application
{
    protected static $container;

    public static function register($key, $instance)
    {
        static::$container[$key] = $instance;
    }

    public static function resolve($key)
    {
        if( !array_key_exists($key, static::$container)) {
            throw new Exception("No instance found registered to `{$key}` key");
        }
        
        $instance = static::$container[$key];
        
        return is_callable($instance) ? $instance() : $instance;
    }
}