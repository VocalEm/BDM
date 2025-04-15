<?php

namespace App\Controllers;

use App\Controllers\Daos\UsuarioDao;
use App\Core\Middleware;
use App\Models\Usuarios;


require_once __DIR__ . '/../controllers/Daos/UsuarioDao.php';
require_once __DIR__ . '/../models/Usuarios.php';
class TablerosController
{
    private $middleware;
    private $usuarioDao;

    public function __construct()
    {
        $this->middleware = Middleware::getInstance();
        $this->usuarioDao = new UsuarioDao();
    }

    public function render()
    {
        global $usuarioSesion; // Asegurarse de que la variable global esté disponible

        // Verificar si el usuario está autenticado
        if ($this->middleware->autenticarUsuario()) {

            require_once __DIR__ . '/../views/tableros.php';
            exit;
        } else {
            // Si no está autenticado, redirigir a la página de inicio de sesión
            $this->middleware->cerrarSesion();
        }
    }


    public function detalle()
    {
        // Verificar si el usuario está autenticado
        if ($this->middleware->autenticarUsuario()) {
            // Si está autenticado, redirigir a la página de inici
            require_once __DIR__ . '/../views/tablerosdetalle.php';
            exit;
        } else {
            // Si no está autenticado, redirigir a la página de inicio de sesión
            $this->middleware->cerrarSesion();
        }
    }

    public function crear()
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
