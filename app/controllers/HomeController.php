<?php

namespace App\Controllers;

use App\Core\Database;

class HomeController
{

    public function __construct() {}

    public function index() {}

    public function render()
    {
        require_once __DIR__ . '/../views/login.php';
    }
}
