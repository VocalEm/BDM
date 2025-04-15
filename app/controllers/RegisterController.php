<?php

namespace App\Controllers;

use App\Controllers\Daos\UsuarioDao;
use App\Models\Usuarios;


class RegisterController
{

    private $usuarioDao;

    public function __construct()
    {
        $this->usuarioDao = UsuarioDao::getInstance(); // Instancia de UsuarioDao
    }

    public function render()
    {
        require_once __DIR__ . '/../views/register.php';
    }

    public function form()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validar si se subió un archivo
            if (isset($_FILES['fotoPerfil']) && $_FILES['fotoPerfil']['error'] === UPLOAD_ERR_OK) {
                // Obtener el contenido del archivo y su tipo MIME
                $fotoPerfil = file_get_contents($_FILES['fotoPerfil']['tmp_name']);
                $tipoImg = mime_content_type($_FILES['fotoPerfil']['tmp_name']); // Obtener el tipo MIME
            } else {
                // Si no se subió una imagen, usar valores predeterminados
                $fotoPerfil = null;
                $tipoImg = null;
            }

            // Crear el objeto Usuarios con los datos del formulario
            $usuario = new Usuarios(
                null,
                $_POST['nombre'],
                $_POST['apellidoPaterno'],
                $_POST['apellidoMaterno'],
                $_POST['correo'],
                $_POST['fechaNacimiento'],
                $_POST['sexo'] === 'masculino' ? 1 : 0,
                $_POST['username'],
                password_hash($_POST['password'], PASSWORD_BCRYPT), // Encriptar contraseña
                $fotoPerfil, // Contenido binario de la imagen
                1, // Privacidad por defecto
                $tipoImg // Tipo MIME de la imagen
            );

            // Validar los datos del formulario (puedes agregar más validaciones según sea necesario)

            $respuesta = $this->usuarioDao->agregarUsuario($usuario);

            switch ($respuesta) {
                case "correcto":
                    // Redirigir a la página de inicio o mostrar un mensaje de éxito
                    header("Location: /login");
                    exit;
                case "correo":
                    // Correo ya existe, redirigir a la página de registro con un mensaje de error
                    $error = "El correo electrónico ya está registrado.";
                    require_once __DIR__ . '/../views/register.php';
                    break;
                default:
                    // Manejar otros errores (si los hay)
                    $error = "Ocurrió un error al registrar el usuario.";
                    require_once __DIR__ . '/../views/register.php';
                    break;
            }
        }
    }
}
