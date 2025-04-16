<?php

namespace App\Controllers;

use App\Controllers\Daos\PublicacionDao;
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
            require_once __DIR__ . '/../views/post.php';
            exit;
        } else {
            // Si no está autenticado, redirigir a la página de inicio de sesión
            $this->middleware->cerrarSesion();
        }
    }

    public function comentar()
    {
        global $usuarioSesion; // Asegurarse de que la variable global esté disponible

        // Verificar si el usuario está autenticado
        if ($this->middleware->autenticarUsuario()) {
            $id_publicacion = $_POST['id_publicacion'];
            $comentario = $_POST['comentario'];
            $id_usuario = $usuarioSesion->getIdUsuario(); // Obtener el ID del usuario autenticado
            // Aquí puedes agregar la lógica para guardar el comentario en la base de datos
            // Por ejemplo, llamar a un método en el modelo o DAO para insertar el comentario
            // PublicacionDao::GetInstance()->guardarComentario($id_publicacion, $comentario);
            echo "Comentario guardado con éxito"; // Mensaje de éxito (puedes cambiarlo según tus necesidades)
        } else {
            // Si no está autenticado, redirigir a la página de inicio de sesión
            $this->middleware->cerrarSesion();
        }
    }
}


//quitar el inncesario de usuario en el render