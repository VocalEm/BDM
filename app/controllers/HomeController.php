<?php

namespace App\Controllers;

use App\Core\Middleware;
use App\Controllers\Daos\PublicacionDao;

class HomeController
{
    private $middleware;

    public function __construct()
    {
        $this->middleware = Middleware::getInstance();
    }

    public function render()
    {
        global $usuarioSesion; // Asegurarse de que la variable global esté disponible

        // Verificar si el usuario está autenticado
        if ($this->middleware->autenticarUsuario()) {

            $categorias = PublicacionDao::getInstance()->obtenerCategorias();

            // Si está autenticado, redirigir a la página de inicio
            require_once __DIR__ . '/../views/home.php';
            exit;
        } else {
            // Si no está autenticado, redirigir a la página de inicio de sesión
            $this->middleware->cerrarSesion();
        }
    }
}
