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
            $errores = [];

            // Validar nombre
            $nombre = trim($_POST['nombre']);
            if (
                mb_strlen($nombre) < 3 ||
                mb_strlen($nombre) > 50 ||
                !preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/u', $nombre)
            ) {
                $errores[] = "El nombre debe tener entre 3 y 50 caracteres y solo letras.";
            }

            // Validar apellido paterno
            $apellidoPaterno = trim($_POST['apellidoPaterno']);
            if (
                mb_strlen($apellidoPaterno) < 3 ||
                mb_strlen($apellidoPaterno) > 50 ||
                !preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/u', $apellidoPaterno)
            ) {
                $errores[] = "El apellido paterno debe tener entre 3 y 50 caracteres y solo letras.";
            }

            // Validar apellido materno
            $apellidoMaterno = trim($_POST['apellidoMaterno']);
            if (
                mb_strlen($apellidoMaterno) < 3 ||
                mb_strlen($apellidoMaterno) > 50 ||
                !preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/u', $apellidoMaterno)
            ) {
                $errores[] = "El apellido materno debe tener entre 3 y 50 caracteres y solo letras.";
            }

            // Validar correo
            $correo = trim($_POST['correo']);
            if (!filter_var($correo, FILTER_VALIDATE_EMAIL) || !preg_match('/^[^\s@]+@[^\s@]+\.[a-zA-Z]{2,}$/', $correo)) {
                $errores[] = "El correo electrónico no es válido.";
            }

            // Validar fecha de nacimiento
            $fechaNacimiento = $_POST['fechaNacimiento'];
            $fechaValida = false;
            if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $fechaNacimiento)) {
                $partes = explode('-', $fechaNacimiento);
                if (count($partes) === 3 && checkdate((int)$partes[1], (int)$partes[2], (int)$partes[0])) {
                    $hoy = new \DateTime();
                    $nacimiento = new \DateTime($fechaNacimiento);
                    $edad = $hoy->diff($nacimiento)->y;
                    if ($edad >= 18 && $edad <= 90) {
                        $fechaValida = true;
                    }
                }
            }
            if (!$fechaValida) {
                $errores[] = "La fecha de nacimiento debe ser válida y tener entre 18 y 90 años.";
            }

            // Validar sexo
            $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';
            if (!in_array($sexo, ['masculino', 'femenino'])) {
                $errores[] = "Selecciona un sexo válido.";
            }

            // Validar username
            $username = trim($_POST['username']);
            if (strlen($username) < 5 || strlen($username) > 50) {
                $errores[] = "El nombre de usuario debe tener entre 5 y 50 caracteres.";
            }

            // Validar contraseña
            $password = $_POST['password'];
            if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&.])[A-Za-z\d@$!%*?&.]{8,}$/', $password)) {
                $errores[] = "La contraseña debe tener al menos 8 caracteres, incluyendo una mayúscula, una minúscula, un número y un carácter especial.";
            }

            // Validar imagen (opcional, solo si se sube)
            if (isset($_FILES['fotoPerfil']) && $_FILES['fotoPerfil']['error'] === UPLOAD_ERR_OK) {
                $fotoPerfil = file_get_contents($_FILES['fotoPerfil']['tmp_name']);
                $tipoImg = mime_content_type($_FILES['fotoPerfil']['tmp_name']);
            } else {
                $fotoPerfil = null;
                $tipoImg = null;
            }

            if (!empty($errores)) {
                $error = implode("<br>", $errores);
                require_once __DIR__ . '/../views/register.php';
                return;
            }

            // Crear el objeto Usuarios con los datos del formulario
            $usuario = new Usuarios(
                null,
                $nombre,
                $apellidoPaterno,
                $apellidoMaterno,
                $correo,
                $fechaNacimiento,
                $sexo === 'masculino' ? 1 : 0,
                $username,
                password_hash($password, PASSWORD_BCRYPT),
                $fotoPerfil,
                1,
                $tipoImg
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
                    $error = "El correo electrónico  o usuario ya está registrado.";
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
