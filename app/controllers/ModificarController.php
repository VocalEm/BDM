<?php

namespace App\Controllers;


class LoginController
{
    private $middleware;

    public function __construct() {}

    public function render()
    {
        require_once __DIR__ . '/../views/modificarusuario.php';
    }
}
