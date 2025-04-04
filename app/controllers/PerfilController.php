<?php

namespace App\Controllers;

use App\Controllers\Daos\UsuarioDao;
use App\Core\Middleware;
use App\Models\Usuarios;;

require_once __DIR__ . '/../controllers/Daos/UsuarioDao.php';
require_once __DIR__ . '/../models/Usuarios.php';


class PerfilController
{
    private $middleware;
    private $usuarioDao;

    public function __construct()
    {
        $this->middleware = Middleware::getInstance();
        $this->usuarioDao = new UsuarioDao();
    }

    public function render($id)
    {
        if ($this->middleware->autenticarUsuario()) {

            $consulta = $this->usuarioDao->obtenerUsuarioPorId($id);
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
                $consulta['FECHA_REGISTRO']
            );
            $usuarioEnSesion = $this->middleware->obtenerIdEnSesion($usuario->getIdUsuario()); // se usa en la pantalla de perfil
            require_once __DIR__ . '/../views/perfil.php';
        }
    }
}
