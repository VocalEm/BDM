<?php

namespace App\Core;

class Middleware
{

    private static $instance;

    // Constructor privado para evitar instanciación directa
    private function __construct()
    {
        session_start();
    }

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
        // Verificar si la sesión es válida
        if (isset($_SESSION['id_user'])) {
            return true; // Usuario autenticado con sesión
        }
        // Verificar si la cookie es válida
        if (isset($_COOKIE['id_user'])) {
            // Iniciar sesión con la cookie
            $_SESSION['id_user'] = $_COOKIE['id_user'];
            return true; // Usuario autenticado con cookie
        }

        // Si no tiene sesión ni cookie, no está autenticado
        return false;
    }



    function cerrarSesion()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start(); // Inicia la sesión si no está activa
        }
        session_unset(); // Eliminar todas las variables de sesión
        session_destroy(); // Destruir la sesión

        // Verificar si la cookie existe antes de intentar eliminarla
        if (isset($_COOKIE['id_user'])) {
            // Configurar la cookie con parámetros más específicos y un tiempo pasado
            setcookie('id_user', '', time() - 3600, "/", "", false, true);
        }
    }

    function verificarCookie()
    {
        if (isset($_COOKIE['id_user'])) {
            return true; // Cookie válida
        } else {
            return false;
        }
    }

    function login($recordarSesion, $id)
    {

        if (session_status() === PHP_SESSION_NONE) {
            session_start(); // Inicia la sesión si no está activa
        }
        if (!isset($id) || empty($id)) {
            return false; // No se puede iniciar sesión sin un ID válido
        }

        $_SESSION['id_user'] = $id; // Asignar el ID de usuario a la sesión

        if ($recordarSesion) {
            // Si el usuario seleccionó "Recordar sesión", establecer una cookie
            setcookie('id_user', $id, time() + (86400 * 30), "/"); // 30 días
        }

        return true; // Inicio de sesión exitoso
    }

    function estaAutenticado()
    {
        if (isset($_SESSION['id_user']) || isset($_COOKIE['id_user'])) {
            return true; // Usuario autenticado
        }
        return false; // Usuario no autenticado
    }



    function obtenerIdEnSesion($id)
    {
        if ($id == $_SESSION['id_user']) {
            return true;
        }
        return false;
    }
}
