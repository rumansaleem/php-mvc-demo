<?php

namespace App\Core;

class Database extends \PDO
{
    
    /**
     * Database constructor
     *
     * @param array $config database config
     */
    public function __construct($config)
    {
        extract($config);

        parent::__construct(
            "mysql:dbname=$database;host=$host;port=$port", 
            $username, 
            $password
        );
    }

    public function execute($query, $params = [])
    {
        $statement = $this->prepare($query);

        if ($statement->execute($params) === false) {
            throw new \Exception(implode(': ', $statement->errorInfo()));
        }

        return $statement;
    }
}