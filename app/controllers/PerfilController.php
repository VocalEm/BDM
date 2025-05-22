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
                    $usuarioEnSesion = false; // el perfil a visulizar no es  el usuario en sesion
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
                        $consulta['PRIVACIDAD'],
                        $consulta['TIPO_IMG']
                    );

                    $usuario->setContadorPublicaciones($consulta['PUBLICACIONES']);
                    $usuario->setContadorSeguidores($consulta['SEGUIDORES']);
                    $usuario->setContadorSeguidos($consulta['SEGUIDOS']);
                    if ($usuario->getPrivacidad() == 1) {
                        $dataSeguidos = $this->usuarioDao->verificarSeguir($usuarioSesion->getIdUsuario(), $usuario->getIdUsuario());
                        $isSeguido = $dataSeguidos['ISSEGUIDO'];
                    } else {
                        $dataSeguidos = $this->usuarioDao->verificarSeguir($usuarioSesion->getIdUsuario(), $usuario->getIdUsuario());
                        $isSeguido = $dataSeguidos['ISSEGUIDO'];
                        if ($isSeguido == 0) {
                            $dataSolicitudes = $this->usuarioDao->verificarSolicitud($usuarioSesion->getIdUsuario(), $usuario->getIdUsuario());
                            $isSolicitud = $dataSolicitudes['ISSOLICITUD'];
                        }
                    }
                }
                $publicaciones = PublicacionDao::GetInstance()->obtenerPublicacionUsuario($usuario->getIdUsuario());
            }
            require_once __DIR__ . '/../views/perfil.php';
        } else {
            // Si no está autenticado, redirigir a la página de inicio de sesión
            $this->middleware->cerrarSesion();
        }
    }

    public function seguir($id_usuario_seguir, $isSeguido)
    {
        global $usuarioSesion; // Asegurarse de que la variable global esté disponible

        if ($this->middleware->autenticarUsuario()) {
            if ($isSeguido == 0) {
                if (isset($usuarioSesion)) {
                    $this->usuarioDao->seguirUsuario($usuarioSesion->getIdUsuario(), $id_usuario_seguir);
                    header('Location: /perfil/render/' . $id_usuario_seguir);
                    exit;
                } else {
                    // Si no está autenticado, redirigir a la página de inicio de sesión
                    $this->middleware->cerrarSesion();
                    Header('Location: /login');
                    exit;
                }
            } else if ($isSeguido == 1) {
                if (isset($usuarioSesion)) {
                    $this->usuarioDao->dejarSeguirUsuario($usuarioSesion->getIdUsuario(), $id_usuario_seguir);
                    header('Location: /perfil/render/' . $id_usuario_seguir);
                    exit;
                } else {
                    // Si no está autenticado, redirigir a la página de inicio de sesión
                    $this->middleware->cerrarSesion();
                }
            }
        } else {
            // Si no está autenticado, redirigir a la página de inicio de sesión
            $this->middleware->cerrarSesion();
            Header('Location: /login');
            exit;
        }
    }

    public function crearSolicitud($id_usuario_seguir, $isSolicitud)
    {
        global $usuarioSesion; // Asegurarse de que la variable global esté disponible

        if ($this->middleware->autenticarUsuario()) {
            if ($isSolicitud == 0) {
                if (isset($usuarioSesion)) {
                    $this->usuarioDao->crearsolicitud($usuarioSesion->getIdUsuario(), $id_usuario_seguir);
                    header('Location: /perfil/render/' . $id_usuario_seguir);
                    exit;
                } else {
                    // Si no está autenticado, redirigir a la página de inicio de sesión
                    $this->middleware->cerrarSesion();
                }
            } else if ($isSolicitud == 1) {
                if (isset($usuarioSesion)) {
                    $this->usuarioDao->dejarSeguirUsuario($usuarioSesion->getIdUsuario(), $id_usuario_seguir);
                    header('Location: /perfil/render/' . $id_usuario_seguir);
                    exit;
                } else {
                    // Si no está autenticado, redirigir a la página de inicio de sesión
                    $this->middleware->cerrarSesion();
                }
            }
        } else {
            // Si no está autenticado, redirigir a la página de inicio de sesión
            $this->middleware->cerrarSesion();
            Header('Location: /login');
            exit;
        }
    }
}
