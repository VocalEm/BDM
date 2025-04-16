<?php

namespace App\Controllers;

use App\Controllers\Daos\UsuarioDao;
use App\Core\Middleware;
use App\Models\Usuarios;
use App\Controllers\Daos\PublicacionDao;



class PerfilController
{
    private $middleware;
    private $usuarioDao;

    public function __construct()
    {
        $this->middleware = Middleware::getInstance();
        $this->usuarioDao = UsuarioDao::getInstance();
    }

    public function render($id)
    {
        global $usuarioSesion; // Asegurarse de que la variable global esté disponible

        if ($this->middleware->autenticarUsuario()) {

            if (isset($usuarioSesion)) {
                if ($id == $usuarioSesion->getIdUsuario()) {
                    $usuarioEnSesion = true; // el perfil a visulizar es  el usuario en sesion
                    $usuario = $usuarioSesion;
                } else //el perfil a visualizar no es el usuario en sesion
                {
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
                        $consulta['FECHA_REGISTRO'],
                        $consulta['TIPO_IMG']
                    );
                }
                $publicaciones = PublicacionDao::GetInstance()->obtenerPublicacionUsuario($usuario->getIdUsuario());
            }
            require_once __DIR__ . '/../views/perfil.php';
        } else {
            // Si no está autenticado, redirigir a la página de inicio de sesión
            $this->middleware->cerrarSesion();
        }
    }
}
