<?php

namespace App\Controllers;

use App\Core\Database;
use App\Controllers\Daos\UsuarioDao;
use App\Models\Usuarios;

class LoginController
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function index() {}

    public function render()
    {
        require_once __DIR__ . '/../views/login.php';
    }
}
