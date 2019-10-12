<?php

class Request
{
    protected $urlComponents;
    protected $method;
    protected $queryParams;
    protected $postParams;

    private function __construct($url, $method, $queryPrams, $postParams)
    {
        $this->urlComponents = parse_url($url);
        $this->method = $method;
        $this->queryParams = $queryPrams;
        $this->postParams = $postParams;
    }

    public static function create($url, $method = 'GET', $queryPrams = [], $postParams = [])
    {
        return new self($url, $method, $queryPrams, $postParams);
    }

    public static function createFromGlobals() 
    {
        $url = ($_SERVER['REQUEST_SCHEME'] ?? 'http'). '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        return static::create($url, $method, $_GET, $_POST);
    }

    public function has($param) 
    {
        return array_key_exists($param, $this->queryParams)
            || array_key_exists($param, $this->postParams);
    }

    public function query($param)
    {
        return trim($this->queryParams[$param]) ?? null;
    }

    public function post($param)
    {
        return trim($this->postParams[$param]) ?? null;
    }

    public function scheme()
    {
        return $this->urlComponents['scheme'];
    }

    public function host()
    {
        return $this->urlComponents['host'];
    }

    public function path()
    {
        return '/' . trim($this->urlComponents['path'], '/');
    }

    public function method()
    {
        return $this->method;
    }

    public function queryString()
    {
        return $this->urlComponents['query'];
    }
}