<?php

namespace App\Controllers;

use App\Core\Database;
use App\Controllers\Daos\UsuarioDao;
use App\Models\Usuarios;

require_once __DIR__ . '/../models/Usuarios.php';
require_once __DIR__ . '/../controllers/Daos/UsuarioDao.php';

class RegisterController
{


    public function __construct() {}

    public function index() {}

    public function render()
    {
        require_once __DIR__ . '/../views/register.php';
    }

    public function form()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

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
                file_get_contents($_FILES['fotoPerfil']['tmp_name']), // Leer imagen como binario
                1 // Privacidad por defecto
            );


            // Validar los datos del formulario (puedes agregar más validaciones según sea necesario)

            $usuarioDao = new UsuarioDao();
            $respuesta = $usuarioDao->agregarUsuario($usuario);
            if ($respuesta) {
                // Redirigir a la página de inicio o mostrar un mensaje de éxito
                header('Location: /login'); // Cambia esto a la ruta deseada
                exit;
            } else {
            }

            echo "Usuario registrado exitosamente.";
        }
    }
}
