<?php

namespace App\Controllers;

use App\Controllers\Daos\UsuarioDao;
use App\Core\Middleware;
use App\Models\Usuarios;;

require_once __DIR__ . '/../controllers/Daos/UsuarioDao.php';
require_once __DIR__ . '/../models/Usuarios.php';
class SolicitudesController
{
    private $middleware;
    private $usuarioDao;


    public function __construct()
    {
        $this->middleware = Middleware::getInstance();
        $this->usuarioDao = UsuarioDao::getInstance(); // Instancia de UsuarioDao
    }

    public function render()
    {
        global $usuarioSesion; // Asegurarse de que la variable global esté disponible

        // Verificar si el usuario está autenticado
        if ($this->middleware->autenticarUsuario()) {

            require_once __DIR__ . '/../views/solicitudes.php';
            exit;
        } else {
            // Si no está autenticado, redirigir a la página de inicio de sesión
            $this->middleware->cerrarSesion();
        }
    }
}
