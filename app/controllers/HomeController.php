<?php

namespace App\Controllers;

use App\Core\Middleware;

class HomeController
{
    private $middleware;

    public function __construct()
    {
        $this->middleware = Middleware::getInstance();
    }
    public function index() {}

    public function render()
    {
        // Verificar si el usuario está autenticado
        if ($this->middleware->autenticarUsuario()) {
            // Si está autenticado, redirigir a la página de inicio
            require_once __DIR__ . '/../views/home.php';
            exit;
        }
    }
}
