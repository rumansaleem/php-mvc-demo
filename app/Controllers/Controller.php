<?php 

abstract class Controller
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
}