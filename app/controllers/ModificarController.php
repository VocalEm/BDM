<?php

namespace App\Controllers;

use App\Core\Middleware;
use App\Controllers\Daos\UsuarioDao;
use App\Models\Usuarios;

class ModificarController
{

    private $middleware;
    private $usuarioDao;


    public function __construct()
    {
        $this->middleware = Middleware::getInstance();
        $this->usuarioDao = UsuarioDao::getInstance();
    }

    public function render()
    {
        global $usuarioSesion; // Asegurarse de que la variable global esté disponible

        if ($this->middleware->autenticarUsuario()) {

            require_once __DIR__ . '/../views/modificar.php';
        }
    }

    public function form()
    {
        global $usuarioSesion; // Asegurarse de que la variable global esté disponible

        if ($this->middleware->autenticarUsuario()) {
            // Validar si se subió un archivo
            if (isset($_FILES['fotoPerfil']) && $_FILES['fotoPerfil']['error'] === UPLOAD_ERR_OK) {
                // Obtener el contenido del archivo y su tipo MIME
                $fotoPerfil = file_get_contents($_FILES['fotoPerfil']['tmp_name']);
                $tipoImg = mime_content_type($_FILES['fotoPerfil']['tmp_name']); // Obtener el tipo MIME
            } else {
                // Si no se subió una imagen, usar los valores actuales del usuario
                $usuarioActual = $this->usuarioDao->obtenerUsuarioPorId($_SESSION['id_user']);
                $fotoPerfil = $usuarioActual['FOTO_PERFIL'] ?? null;
                $tipoImg = $usuarioActual['TIPO_IMG'] ?? null;
            }

            if (!empty($_POST['PASSWORD'])) {
                $password = password_hash($_POST['PASSWORD'], PASSWORD_BCRYPT); // Encriptar nueva contraseña
            } else {
                // Si no se envió una nueva contraseña, usar la actual
                $usuarioActual = $this->usuarioDao->obtenerUsuarioPorId($_SESSION['id_user']);
                $password = $usuarioActual['PASSWORD'] ?? null;
            }

            // Crear el objeto Usuarios con los datos del formulario
            $usuario = new Usuarios(
                $_SESSION['id_user'],
                $_POST['NOMBRE'],
                $_POST['APELLIDO_PATERNO'],
                $_POST['APELLIDO_MATERNO'],
                $_POST['CORREO'],
                $_POST['FECHA_NACIMINENTO'],
                $_POST['SEXO'] === 'masculino' ? 1 : 0,
                $_POST['USERNAME'],
                $password, // Encriptar contraseña
                $fotoPerfil, // Contenido binario de la imagen
                $_POST['PRIVACIDAD'],
                $tipoImg // Tipo MIME de la imagen
            );

            // Validar los datos del formulario
            if (empty($_POST['NOMBRE']) || empty($_POST['APELLIDO_PATERNO']) || empty($_POST['CORREO']) || empty($_POST['USERNAME'])) {
                $error = "Todos los campos obligatorios deben ser completados.";
                echo $error;
                require_once __DIR__ . '/../views/modificar.php';
                return;
            }

            if (!filter_var($_POST['CORREO'], FILTER_VALIDATE_EMAIL)) {
                $error = "El correo electrónico no es válido.";
                echo $error;
                require_once __DIR__ . '/../views/modificar.php';
                return;
            }

            // Actualizar el usuario en la base de datos

            $respuesta = $this->usuarioDao->modificarUsuario($usuario);

            if ($respuesta) {
                // Redirigir a la página de perfil o mostrar un mensaje de éxito
                header("Location: /perfil/render/" . $usuario->getIdUsuario());
                exit;
            } else {
                // Manejar errores al actualizar
                $error = "Ocurrió un error al actualizar el usuario.";
                echo $error;
                require_once __DIR__ . '/../views/modificar.php';
            }
        } else {
            // Si no está autenticado, redirigir a la página de inicio de sesión
            $this->middleware->cerrarSesion();
        }
    }
}
