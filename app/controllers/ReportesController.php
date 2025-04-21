<?php

namespace App\Controllers;

use App\Controllers\Daos\UsuarioDao;
use App\Core\Middleware;
use App\Models\Usuarios;;

class ReportesController
{
    private $middleware;
    private $usuarioDao;


    public function __construct()
    {
        $this->middleware = Middleware::getInstance();
        $this->usuarioDao = UsuarioDao::getInstance(); // Instancia de UsuarioDao
    }

    public function render() // DEFAULT USUARIOS SEGUIDORES TUYOS
    {
        global $usuarioSesion; // Asegurarse de que la variable global esté disponible

        // Verificar si el usuario está autenticado
        if ($this->middleware->autenticarUsuario()) {

            $dataSeguidores = $this->usuarioDao->obtenerSeguidores($usuarioSesion->getIdUsuario());
            $seguidosActivo = false;
            require_once __DIR__ . '/../views/reportes.php';
            exit;
        } else {
            // Si no está autenticado, redirigir a la página de inicio de sesión
            $this->middleware->cerrarSesion();
        }
    }

    public function seguidos()
    {
        global $usuarioSesion; // Asegurarse de que la variable global esté disponible

        // Verificar si el usuario está autenticado
        if ($this->middleware->autenticarUsuario()) {

            $dataSeguidores = $this->usuarioDao->obtenerSeguidos($usuarioSesion->getIdUsuario());
            $seguidosActivo = true;
            require_once __DIR__ . '/../views/reportes.php';
            exit;
        } else {
            // Si no está autenticado, redirigir a la página de inicio de sesión
            $this->middleware->cerrarSesion();
        }
    }
}
