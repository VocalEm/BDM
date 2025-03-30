<?php

namespace App\Controllers;

use App\Core\Database;
use App\Controllers\Daos\UsuarioDao;
use App\Models\Usuarios;

class LoginController
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function index() {}

    public function render()
    {
        require_once __DIR__ . '/../views/login.php';
    }

    public function login()
    {
        session_start();
        $correo = $_POST['correo'];
        $password = $_POST['password'];

        $usuarioDao = new UsuarioDao();
        $usuario = $usuarioDao->login($correo, $password);

        if ($usuario && password_verify($password, $usuario->getPassword())) {
            $_SESSION['user'] = $usuario; //fa;ta corregir esto y trabajar en un middleware 
            header("Location: /home"); // Redirigir a la página de inicio
            exit;
        } else {
            $error = "Nombre de usuario o contraseña incorrectos.";
            require_once __DIR__ . '/../views/login.php';
        }
    }
}
