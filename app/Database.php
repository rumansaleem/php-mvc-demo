<?php

class Database extends PDO
{
    private static $instance;
    
    /**
     * Database constructor
     *
     * @param array $config database config
     */
    private function __construct($config)
    {
        extract($config);

        parent::__construct(
            "mysql:dbname=$database;host=$host;port=$port", 
            $username, 
            $password
        );
    }

    public static function getInstance()
    {
        if (isset(static::$instance)) {
            return static::$instance;
        }

        $config = require __DIR__ . '/../config.php';
        return static::$instance = new Database($config['database']);
    }

    public function execute($query, $params = [])
    {
        $statement = $this->prepare($query);

        if ($statement->execute($params) === false) {
            throw new Exception(implode(': ', $statement->errorInfo()));
        }

        return $statement;
    }
}