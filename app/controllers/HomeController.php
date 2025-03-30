<?php

namespace App\Controllers;

use App\Core\Database;

class HomeController
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function index() {}

    public function render()
    {
        require_once __DIR__ . '/../views/login.php';
    }
}
