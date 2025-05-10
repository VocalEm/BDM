<?php

namespace App\Controllers;

use App\Controllers\Daos\PublicacionDao;
use App\Controllers\Daos\TablerosDao;
use App\Controllers\Daos\UsuarioDao;
use App\Core\Middleware;
use App\Models\Usuarios;
use App\Models\Publicaciones;

class PublicacionController
{
    private $middleware;
    private $usuarioDao;

    public function __construct()
    {
        $this->middleware = Middleware::getInstance();
        $this->usuarioDao = UsuarioDao::getInstance(); // Instancia de UsuarioDao
    }

    public function render() {}

    public function postusuario()
    {
        global $usuarioSesion; // Asegurarse de que la variable global esté disponible

        // Verificar si el usuario está autenticado
        if ($this->middleware->autenticarUsuario()) {
            // Si está autenticado, redirigir a la página de inic
            require_once __DIR__ . '/../views/postPerfil.php';
            exit;
        } else {
            // Si no está autenticado, redirigir a la página de inicio de sesión
            $this->middleware->cerrarSesion();
        }
    }

    public function post($id)
    {
        global $usuarioSesion; // Asegurarse de que la variable global esté disponible

        // Verificar si el usuario está autenticado
        if ($this->middleware->autenticarUsuario()) {
            $dataPublicacion = PublicacionDao::GetInstance()->obtenerPublicacionPorId($id);
            $publicacion = new publicaciones(
                $dataPublicacion['ID_PUBLICACION'],
                $dataPublicacion['DESCRIPCION'],
                $dataPublicacion['ID_USUARIO'],
                $dataPublicacion['CATEGORIA'],
                $dataPublicacion['ESTATUS'],
                $dataPublicacion['FECHA_CREACION'],
                $dataPublicacion['CONTADOR_LIKES'],
                $dataPublicacion['RUTA_VIDEO'],
                $dataPublicacion['TIPO_IMG'],
                $dataPublicacion['IMAGEN']
            );
            $dataUser = $this->usuarioDao->obtenerUsuarioPorId($publicacion->getIdUsuario());
            $usuario = new Usuarios(
                $dataUser['ID_USUARIO'],
                $dataUser['NOMBRE'],
                $dataUser['APELLIDO_PATERNO'],
                $dataUser['APELLIDO_MATERNO'],
                $dataUser['CORREO'],
                $dataUser['FECHA_NACIMINENTO'],
                $dataUser['SEXO'],
                $dataUser['USERNAME'],
                $dataUser['PASSWORD'],
                $dataUser['FOTO_PERFIL'],
                $dataUser['ESTATUS'],
                $dataUser['PRIVACIDAD'],
                $dataUser['FECHA_REGISTRO'],
                $dataUser['TIPO_IMG']
            );
            $reacciono = PublicacionDao::GetInstance()->usuarioReacciono($id, $usuarioSesion->getIdUsuario());
            $comentarios = PublicacionDao::GetInstance()->obtenerComentarios($id);
            $tableros = TablerosDao::GetInstance()->obtenerTablerosPorUsuario($usuarioSesion->getIdUsuario());
            $isGuardado = TablerosDao::GetInstance()->verificarPublicacionGuardada($id, $usuarioSesion->getIdUsuario());

            require_once __DIR__ . '/../views/post.php';
            exit;
        } else {
            $this->middleware->cerrarSesion();
        }
    }

    public function comentar()
    {
        global $usuarioSesion;

        if ($this->middleware->autenticarUsuario()) {

            $id_publicacion = $_POST['id_publicacion'];
            $comentario = $_POST['comentario'];
            $id_usuario = $usuarioSesion->getIdUsuario();

            $comentario = PublicacionDao::GetInstance()->crearComentario($comentario, $id_publicacion, $id_usuario);

            if ($comentario) {
                echo "Comentario guardado con éxito";
                header("Location: /publicacion/post/" . $id_publicacion);
            } else {
                echo "Error al guardar el comentario";
                header("Location: /register");
            }
        } else {
            $this->middleware->cerrarSesion();
        }
    }

    public function interaccion($id_publicacion, $isActivo)
    {
        global $usuarioSesion;

        if ($this->middleware->autenticarUsuario()) {
            $id_usuario = $usuarioSesion->getIdUsuario();
            if ($isActivo == "false") {
                $respuesta = PublicacionDao::GetInstance()->crearLike($id_publicacion, $id_usuario);
            } else if ($isActivo == "true") {
                $respuesta = PublicacionDao::GetInstance()->eliminarLike($id_publicacion, $id_usuario);
            }
            if ($respuesta) {
                echo "Comentario guardado con éxito";
                header("Location: /publicacion/post/" . $id_publicacion);
            } else {
                echo "Error al guardar el comentario";
            }
        } else {
            $this->middleware->cerrarSesion();
        }
    }

    public function desactivar($id_publicacion)
    {
        global $usuarioSesion;

        if ($this->middleware->autenticarUsuario()) {
            $id_usuario = $usuarioSesion->getIdUsuario();
            $respuesta = PublicacionDao::GetInstance()->eliminarPublicacion($id_publicacion);
            if ($respuesta) {
                header("Location: /perfil/render/" . $id_usuario);
            } else {
                echo "Error al eliminar publicacion";
            }
        } else {
            $this->middleware->cerrarSesion();
        }
    }
}
//quitar el inncesario de usuario en el render