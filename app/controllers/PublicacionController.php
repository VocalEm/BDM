<?php

namespace App\Controllers;

use App\Controllers\Daos\UsuarioDao;
use App\Core\Middleware;
use App\Models\Usuarios;;

require_once __DIR__ . '/../controllers/Daos/UsuarioDao.php';
require_once __DIR__ . '/../models/Usuarios.php';
class PublicacionController
{
    private $middleware;
    private $usuarioDao;


    public function __construct()
    {
        $this->middleware = Middleware::getInstance();
        $this->usuarioDao = new UsuarioDao();
    }
    public function index() {}

    public function render()
    {
        // Verificar si el usuario está autenticado
        if ($this->middleware->autenticarUsuario()) {
            // Si está autenticado, redirigir a la página de inici
            if (isset($_SESSION['id_user'])) {

                $consulta = $this->usuarioDao->obtenerUsuarioPorId($_SESSION['id_user']);
                if (!$consulta) {
                    header('Location: /home');
                    exit;
                }
                $usuario = new Usuarios(
                    $consulta['ID_USUARIO'],
                    $consulta['NOMBRE'],
                    $consulta['APELLIDO_PATERNO'],
                    $consulta['APELLIDO_MATERNO'],
                    $consulta['CORREO'],
                    $consulta['FECHA_NACIMINENTO'],
                    $consulta['SEXO'],
                    $consulta['USERNAME'],
                    $consulta['PASSWORD'],
                    $consulta['FOTO_PERFIL'],
                    $consulta['ESTATUS'],
                    $consulta['PRIVACIDAD'],
                    $consulta['FECHA_REGISTRO'],
                    $consulta['TIPO_IMG']
                );
                require_once __DIR__ . '/../views/post.php';
                exit;
            } else {
                // Si no está autenticado, redirigir a la página de inicio de sesión
                $this->middleware->cerrarSesion();
            }
        }
    }

    public function postusuario()
    {
        // Verificar si el usuario está autenticado
        if ($this->middleware->autenticarUsuario()) {
            // Si está autenticado, redirigir a la página de inici
            if (isset($_SESSION['id_user'])) {

                $consulta = $this->usuarioDao->obtenerUsuarioPorId($_SESSION['id_user']);
                if (!$consulta) {
                    header('Location: /home');
                    exit;
                }
                $usuario = new Usuarios(
                    $consulta['ID_USUARIO'],
                    $consulta['NOMBRE'],
                    $consulta['APELLIDO_PATERNO'],
                    $consulta['APELLIDO_MATERNO'],
                    $consulta['CORREO'],
                    $consulta['FECHA_NACIMINENTO'],
                    $consulta['SEXO'],
                    $consulta['USERNAME'],
                    $consulta['PASSWORD'],
                    $consulta['FOTO_PERFIL'],
                    $consulta['ESTATUS'],
                    $consulta['PRIVACIDAD'],
                    $consulta['FECHA_REGISTRO'],
                    $consulta['TIPO_IMG']
                );
                require_once __DIR__ . '/../views/postPerfil.php';
                exit;
            } else {
                // Si no está autenticado, redirigir a la página de inicio de sesión
                $this->middleware->cerrarSesion();
            }
        }
    }
}
