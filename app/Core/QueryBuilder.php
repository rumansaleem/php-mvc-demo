<?php

class QueryBuilder
{
    protected $db;

    protected $operation = 'select';
    
    protected $table;
    protected $selects = [];
    protected $wheres = [];
    protected $joins = [];
    protected $values = [];

    protected $params = [];
    
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function table($table) {
        $this->table = $table;

        return $this;
    }

    public function select(array $selects) {
        $this->selects = $selects;
        
        return $this;
    }

    public function addSelect(array $selects) {
        array_walk($selects, function($select) {
            array_push($this->selects, $select);
        });
        
        return $this;
    }

    public function where($column, $operator, $value) {
        array_push($this->wheres, [$column, $operator, $value]);

        return $this;
    }

    public function innerJoin($table, $foreignKey, $localKey) {
        array_push($this->joins, "INNER JOIN $table ON $foreignKey = $localKey");

        return $this;
    }

    public function limit(int $limit) {
        $this->limit = $limit;

        return $this;
    }

    public function offset(int $offset) {
        $this->offset = $offset;

        return $this;
    }

    public function insert(array $data)
    {
        $this->operation = 'insert';
        $this->values = $data;

        $this->db->execute($this->toSQL(), $this->params);

        return $this->db->lastInsertId();
    }

    public function all()
    {
        return $this->db->execute($this->toSQL(), $this->params)
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function first()
    {
        $statement = $this->db->execute($this->toSQL(), $this->params);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        
        return $result;
    }

    public function toSQL() 
    {
        $operation = ucwords($this->operation);
        return $this->{'make' . $operation .'Query'}();
    }

    protected function makeInsertQuery() {
        $columns = implode(', ', array_keys($this->values));
        $placeholders = trim(str_repeat('?, ', count($this->values)), ', ');
        $this->params = array_values($this->values);
        return "INSERT INTO {$this->table}($columns) VALUES ($placeholders)";
    }

    protected function makeSelectQuery() {
        $sql = 'SELECT '
            . (count($this->selects) ? implode(', ', $this->selects) : '*')
            . ' FROM ' . $this->table;

        if(count($this->joins) > 0) {
            $sql .= ' ' . implode(' ', $this->joins);
        }

        $whereClauses = [];
        foreach($this->wheres as $where) {
            array_push($this->params, $where[2]);
            array_push($whereClauses, "WHERE $where[0] $where[1] ?");
        }

        if (count($whereClauses) > 0) {
            $sql .= ' ' . implode(' AND ', $whereClauses);
        }

        if (isset($this->limit)) {
            $sql .= " LIMIT {$this->limit}";
        }

        if (isset($this->offset)) {
            $sql .= " OFFSET {$this->offset}";
        }

        return $sql;
    }
}