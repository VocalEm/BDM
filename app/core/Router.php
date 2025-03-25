<?php

require_once __DIR__ . '/Database.php';

class Router
{
    private $segmentosURL;
    private $parametrosConsulta;
    private $url;

    public function __construct($_url)
    {
        $parsedUrl = parse_url($_url); // Obtiene solo la ruta y consulta
        $ruta = isset($parsedUrl['path']) ? $parsedUrl['path'] : '';
        $cadenaConsulta = isset($parsedUrl['query']) ? $parsedUrl['query'] : '';

        $this->segmentosURL = explode('/', ucfirst(trim($ruta, '/')));
        $this->parametrosConsulta = $this->analizarParametrosConsulta($cadenaConsulta);
    }

    // Método principal para manejar el enrutamiento
    public function enrutar()
    {
        $infoRuta = $this->obtenerInfoRuta();

        $nombreControlador = ucfirst($infoRuta['controlador']) . 'Controller';
        $archivoControlador = __DIR__ . "/../controllers/{$nombreControlador}.php";

        if (file_exists($archivoControlador)) {
            return $this->manejarControlador($archivoControlador, $nombreControlador, $infoRuta);
        }

        return $this->manejarError("¡Controlador no encontrado!");
    }

    private function manejarControlador($archivoControlador, $nombreControlador, $infoRuta)
    {
        require_once $archivoControlador;
        $controlador = new $nombreControlador();
        $accion = $infoRuta['accion'];

        if (method_exists($controlador, $accion)) {
            return call_user_func_array(
                [$controlador, $accion],
                $infoRuta['parametros']
            );
        }

        return $this->manejarError("¡Acción no encontrada error en manejo!");
    }

    private function manejarError($mensaje)
    {
        header("HTTP/1.0 404 Not Found");
        echo $mensaje;
        return false;
    }

    // Método auxiliar para analizar la cadena de consulta
    private function analizarParametrosConsulta($cadenaConsulta)
    {
        $parametrosConsulta = array();
        if ($cadenaConsulta) {
            $pares = explode('&', $cadenaConsulta);
            foreach ($pares as $par) {
                $partes = explode('=', $par);
                $clave = $partes[0];
                $valor = isset($partes[1]) ? $partes[1] : null;
                $parametrosConsulta[$clave] = $valor;
            }
        }
        return $parametrosConsulta;
    }

    // Método para obtener toda la información de la ruta
    public function obtenerInfoRuta()
    {
        return array(
            'controlador' => $this->obtenerControlador(),
            'accion' => $this->obtenerAccion(),
            'parametros' => $this->obtenerParametros(),
            'parametrosConsulta' => $this->parametrosConsulta
        );
    }

    // Método para obtener la acción
    public function obtenerAccion()
    {
        return isset($this->segmentosURL[1]) ? $this->segmentosURL[1] : 'render';
    }

    // Método para obtener los parámetros
    public function obtenerParametros()
    {
        return array_slice($this->segmentosURL, 2);
    }

    // Método para obtener el controlador
    public function obtenerControlador()
    {
        return isset($this->segmentosURL[0]) && $this->segmentosURL[0] !== '' ? $this->segmentosURL[0] : 'home';
    }
}
