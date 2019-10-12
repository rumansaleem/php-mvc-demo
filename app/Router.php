<?php

class Router
{
    private static $instance;
    
    protected $routes;
    
    private function __construct()
    {
        $this->routes = [
            'GET' => [],
            'POST' => [],
        ];
    }

    public static function getInstance()
    {
        if (isset(static::$instance)) {
            return static::$instance;
        }

        return static::$instance = new Router();
    }

    public function loadRoutesFrom($routesFile)
    {
        require_once $routesFile;

        return $this;
    }

    public static function route($method, $uri, $action)
    {
        static::getInstance()->registerRoute($method, $uri, $action);
    }

    public function registerRoute($method, $uri, $action)
    {
        if (!method_exists($this, strtolower($method))) {
            throw new Exception('Invalid Parameter: Unknown request method');
        }

        $this->{strtolower($method)}($uri, $action);
    }

    public function get($uri, $action) 
    {
        $this->routes['GET'][$uri] = $action;
    }

    public function post($uri, $action) 
    {
        $this->routes['POST'][$uri] = $action;
    }

    public function handle()
    {
        $requestMethod = strtoupper($_SERVER['REQUEST_METHOD']);
        $requestPath = '/' . trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

        if (! array_key_exists($requestPath, $this->routes[$requestMethod])) {
            http_response_code(404);
            echo "<h1>404! Not Found</h1>";
            return;
        }
        
        $action = $this->routes[$requestMethod][$requestPath];

        $controllerName = explode('@', $action)[0];
        $methodName = explode('@', $action)[1];

        $controller = new $controllerName();

        return $controller->{$methodName}();
    }
}