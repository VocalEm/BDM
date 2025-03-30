<?php

use App\Core\Router;



// Incluir el archivo del Router
require_once __DIR__ . '/app/core/Router.php';

/*
$_url = $_SERVER['REQUEST_URI'];
$parsedUrl = parse_url($_url); // Obtiene solo la ruta
$ruta = isset($parsedUrl['path']) ? $parsedUrl['path'] : '';
$limpiaRuta = ucfirst(trim($ruta, '/')); // Quita los slashes iniciales/finales y capitaliza
$limpiaRuta =  explode('/', $limpiaRuta); // Obtiene solo el primer segmento de la ruta
echo $limpiaRuta[0];
echo $limpiaRuta[1];
*/

$router = new Router($_SERVER['REQUEST_URI']);
$router->enrutar();
