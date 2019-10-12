<?php 

namespace App\Controllers;

use App\Core\Application;

abstract class Controller
{
    public function __construct()
    {
        $this->builder = Application::resolve('builder');
    }
}