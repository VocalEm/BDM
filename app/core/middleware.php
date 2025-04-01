<?php

namespace App\Core;

class Middleware
{

    private static $instance;

    // Constructor privado para evitar instanciación directa
    private function __construct() {}

    // Método para obtener la instancia única
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Middleware();
        }
        return self::$instance;
    }


    function autenticarUsuario()
    {
        session_start();
        if (isset($_SESSION['id_user'])) {
            return true; // Usuario autenticado
        } else {
            $this->redirigir('/login'); // Redirigir al inicio de sesión
        }
    }

    function cerrarSesion()
    {
        session_start();
        session_unset(); // Eliminar todas las variables de sesión
        session_destroy(); // Destruir la sesión
        setcookie('id_user', '', time() - 3600, "/"); // Eliminar la cookie
        $this->redirigir('/login'); // Redirigir al inicio de sesión
    }

    function verificarCookie()
    {
        if (isset($_COOKIE['id_user'])) {
            return true; // Cookie válida
        } else {
            $this->redirigir('/login'); // Redirigir al inicio de sesión
        }
    }

    function login($recordarSesion, $id)
    {
        if (!isset($id) || empty($id)) {
            return false; // No se puede iniciar sesión sin un ID válido
        }

        session_start();
        $_SESSION['id_user'] = $id; // Asignar el ID de usuario a la sesión

        if ($recordarSesion) {
            // Si el usuario seleccionó "Recordar sesión", establecer una cookie
            setcookie('id_user', $id, time() + (86400 * 30), "/"); // 30 días
        }

        return true; // Inicio de sesión exitoso
    }

    function estaAutenticado()
    {
        session_start();
        if (isset($_SESSION['id_user']) || isset($_COOKIE['id_user'])) {
            return true; // Usuario autenticado
        }
        return false; // Usuario no autenticado
    }

    private function redirigir($ruta)
    {
        header("Location: $ruta");
        exit;
    }
}
