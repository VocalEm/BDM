<?php


require_once __DIR__ . '/Database.php';


class Router
{
    private $segments;
    private $queryParams;
    private $url;

    public function __construct($url)
    {
        $this->url = $url;
        $parts = explode('?', $url);
        $path = $parts[0];
        $queryString = isset($parts[1]) ? $parts[1] : '';

        $this->segments = array_filter(explode('/', $path));
        $this->queryParams = $this->parseQueryParams($queryString);
    }

    // Método principal para manejar el enrutamiento
    public function dispatch()
    {
        $routeInfo = $this->getRouteInfo();

        // Manejar la ruta raíz
        if ($this->url === "/" || $this->url === "") {
            return $this->handleHomeRoute();
        }

        // Manejar otras rutas
        $controllerName = ucfirst($routeInfo['controller']) . 'Controller';
        $controllerFile = __DIR__ . "/../controllers/{$controllerName}.php";

        if (file_exists($controllerFile)) {
            return $this->handleController($controllerFile, $controllerName, $routeInfo);
        }

        return $this->handleNotFound("Controller not found!");
    }

    private function handleHomeRoute()
    {
        $controllerFile = __DIR__ . "/../controllers/HomeController.php";
        if (!file_exists($controllerFile)) {
            return $this->handleNotFound("Home Controller not found!");
        }

        require_once $controllerFile;
        $controller = new HomeController();
        return $controller->render();
    }

    private function handleController($controllerFile, $controllerName, $routeInfo)
    {
        require_once $controllerFile;
        $controller = new $controllerName();
        $action = $routeInfo['action'];

        if (method_exists($controller, $action)) {
            return call_user_func_array(
                [$controller, $action],
                $routeInfo['params']
            );
        }

        return $this->handleNotFound("Action not found!");
    }

    private function handleNotFound($message)
    {
        header("HTTP/1.0 404 Not Found");
        echo $message;
        return false;
    }

    // Método para obtener el controlador
    public function getController()
    {
        return isset($this->segments[0]) ? $this->segments[0] : 'defaultController';
    }

    // Método para obtener la acción  
    public function getAction()
    {
        return isset($this->segments[1]) ? $this->segments[1] : 'defaultAction';
    }

    // Método para obtener los parámetros
    public function getParams()
    {
        return array_slice($this->segments, 2);
    }

    // Método auxiliar para analizar la query string
    private function parseQueryParams($queryString)
    {
        $queryParams = array();
        if ($queryString) {
            $pairs = explode('&', $queryString);
            foreach ($pairs as $pair) {
                $parts = explode('=', $pair);
                $key = $parts[0];
                $value = isset($parts[1]) ? $parts[1] : null;
                $queryParams[$key] = $value;
            }
        }
        return $queryParams;
    }

    // Método para obtener toda la información junta
    public function getRouteInfo()
    {
        return array(
            'controller' => $this->getController(),
            'action' => $this->getAction(),
            'params' => $this->getParams(),
            'queryParams' => $this->queryParams
        );
    }
}
/*
// Ejemplo de uso
$url = '/products/details/42?category=books&sort=desc';
$router = new Router($url);

print_r($router->getRouteInfo());
// Salida:
// Array(
//   'controller' => 'products',
//   'action' => 'details', 
//   'params' => Array('42'),
//   'queryParams' => Array('category' => 'books', 'sort' => 'desc')
// )
*/