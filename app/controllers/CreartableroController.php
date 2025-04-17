<?php

namespace App\Controllers;

use App\Core\Middleware;

class CreartableroController
{
    private $middleware;

    public function __construct()
    {
        $this->middleware = Middleware::getInstance();
    }

    public function render()
    {
        // Verificar si el usuario está autenticado
        if ($this->middleware->autenticarUsuario()) {
            // Si está autenticado, redirigir a la página de inici

            require_once __DIR__ . '/../views/crearTablero.php';
            exit;
        } else {
            // Si no está autenticado, redirigir a la página de inicio de sesión
            $this->middleware->cerrarSesion();
        }
    }
}
