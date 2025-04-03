<?php

namespace App\Controllers;

use App\Core\Middleware;;

require_once __DIR__ . '/../controllers/Daos/UsuarioDao.php';
require_once __DIR__ . '/../models/Usuarios.php';


class PerfilController
{
    private $middleware;

    public function __construct()
    {
        $this->middleware = Middleware::getInstance();
    }

    public function render()
    {
        require_once __DIR__ . '/../views/perfil.php';
    }
}
