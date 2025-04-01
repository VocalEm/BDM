<?php

namespace App\Controllers;

use App\Core\Middleware;
use App\Controllers\Daos\UsuarioDao;

require_once __DIR__ . '/../controllers/Daos/UsuarioDao.php';
require_once __DIR__ . '/../models/Usuarios.php';


class LoginController
{
    private $middleware;

    public function __construct()
    {

        $this->middleware = Middleware::getInstance();
    }

    public function render()
    {
        require_once __DIR__ . '/../views/login.php';
    }

    public function form()
    {
        $correo = $_POST['correo'];
        $password = $_POST['password'];

        $usuarioDao = new UsuarioDao();
        $usuario = $usuarioDao->login($correo, $password);

        if ($usuario && password_verify($password, $usuario['PASSWORD'])) {
            if ($this->middleware->login($_POST['recordarSesion'], $usuario['ID_USUARIO'])) {
                header('Location: /home'); // Redirigir a la página de inicio
                exit;
            } else {
                $error = "Error al iniciar sesión. Por favor, inténtelo de nuevo.";
                require_once __DIR__ . '/../views/login.php';
            }
        } else {
            $error = "Nombre de usuario o contraseña incorrectos.";
            require_once __DIR__ . '/../views/login.php';
        }
    }
}
