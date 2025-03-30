<?php

namespace App\Core;


class Middleware
{
    public static function verificarSesion()
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit;
        }
    }

    public static function verificarPermisos($rolRequerido)
    {
        session_start();
        if (!isset($_SESSION['user']) || $_SESSION['user']->getRol() !== $rolRequerido) {
            header("Location: /home");
            exit;
        }
    }
}
