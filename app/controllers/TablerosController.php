<?php

namespace App\Controllers;

use App\Controllers\Daos\UsuarioDao;
use App\Core\Middleware;
use App\Models\Tableros;
use App\Controllers\Daos\TablerosDao;


require_once __DIR__ . '/../controllers/Daos/UsuarioDao.php';
require_once __DIR__ . '/../models/Usuarios.php';
class TablerosController
{
    private $middleware;
    private $usuarioDao;

    public function __construct()
    {
        $this->middleware = Middleware::getInstance();
        $this->usuarioDao = new UsuarioDao();
    }

    public function render()
    {
        global $usuarioSesion; // Asegurarse de que la variable global esté disponible

        // Verificar si el usuario está autenticado
        if ($this->middleware->autenticarUsuario()) {
            // Recuperar los datos de los tableros desde la base de datos
            $tablerosData = TablerosDao::getInstance()->obtenerTablerosPorUsuario($usuarioSesion->getIdUsuario());

            // Pasar los datos directamente a la vista
            require_once __DIR__ . '/../views/tableros.php';
            exit;
        } else {
            // Si no está autenticado, redirigir a la página de inicio de sesión
            $this->middleware->cerrarSesion();
        }
    }


    public function detalle($id)
    {
        // Verificar si el usuario está autenticado
        if ($this->middleware->autenticarUsuario()) {
            // Si está autenticado, redirigir a la página de inici
            require_once __DIR__ . '/../views/tablerosdetalle.php';
            exit;
        } else {
            // Si no está autenticado, redirigir a la página de inicio de sesión
            $this->middleware->cerrarSesion();
        }
    }

    public function crear()
    {
        // Verificar si el usuario está autenticado
        if ($this->middleware->autenticarUsuario()) {
            // Si está autenticado, redirigir a la página de inici
            require_once __DIR__ . '/../views/crearTablero.php';
            exit;
        } else {
            // Si no está autenticado, redirigir a la página de inicio de sesión
            $this->middleware->cerrarSesion();
        }
    }

    public function form()
    {
        global $usuarioSesion; // Asegurarse de que la variable global esté disponible

        if ($this->middleware->autenticarUsuario()) {
            // Procesar el formulario de creación de tablero
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $titulo = $_POST['titulo'] ?? '';
                $descripcion = $_POST['descripcion'] ?? '';
                $tipoImg = ''; // Inicializar con un valor predeterminado
                $imagen = '';

                // Validar campos obligatorios
                if (empty($titulo) || empty($descripcion)) {
                    echo "El título y la descripción son obligatorios.";
                    return;
                }

                // Procesar la carga de imagen
                if (!empty($_FILES['imagen']['tmp_name'])) {
                    $tipoImg = $_FILES['imagen']['type'];
                    $imagen = file_get_contents($_FILES['imagen']['tmp_name']);
                }

                // Crear una nueva instancia de Tableros con los datos del formulario
                $tablero = new Tableros(
                    0,
                    $usuarioSesion->getIdUsuario(),
                    $titulo,
                    $imagen,
                    [],
                    $descripcion,
                    $tipoImg
                );

                // Guardar el tablero en la base de datos
                $dao = TablerosDao::getInstance();
                $resultado = $dao->agregarTablero($tablero);

                if ($resultado) {
                    header('Location: /perfil/render/' . $usuarioSesion->getIdUsuario()); // Redirigir al perfil del usuario
                    exit;
                } else {
                    echo "Error al crear el tablero.";
                }
            } else {
                echo "Método no permitido.";
            }
        } else {
            // Redirigir a la página de inicio de sesión si no está autenticado
            $this->middleware->cerrarSesion();
        }
    }
}
