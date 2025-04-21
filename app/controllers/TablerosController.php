<?php

namespace App\Controllers;

use App\Controllers\Daos\UsuarioDao;
use App\Core\Middleware;
use App\Models\Tableros;
use App\Controllers\Daos\TablerosDao;
use App\Models\Publicaciones;

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

    public function render($id_usuario)
    {
        global $usuarioSesion; // Asegurarse de que la variable global esté disponible
        if ($this->middleware->autenticarUsuario()) {
            $usuario = $this->usuarioDao->obtenerUsuarioPorId($id_usuario);
            $loSigues = $this->usuarioDao->verificarSeguir($usuarioSesion->getIdUsuario(), $id_usuario);
            if ($usuario['PRIVACIDAD'] == 1) {
                $tablerosData = TablerosDao::getInstance()->obtenerTablerosPorUsuario($id_usuario);
                if (isset($usuarioSesion)) {
                    if ($id_usuario == $usuarioSesion->getIdUsuario()) // el perfil a visulizar es  el usuario en sesion
                        $usuarioEnSesion = true; // el perfil a visulizar es  el usuario en sesion
                    else //el perfil a visualizar no es el usuario en sesion
                        $usuarioEnSesion = false; // el perfil a visulizar no es  el usuario en sesion
                }
                // Pasar los datos directamente a la vista
                require_once __DIR__ . '/../views/tableros.php';
                exit;
            } else {
                if ($loSigues) {
                    $tablerosData = TablerosDao::getInstance()->obtenerTablerosPorUsuario($id_usuario);
                    if (isset($usuarioSesion)) {
                        if ($id_usuario == $usuarioSesion->getIdUsuario()) // el perfil a visulizar es  el usuario en sesion
                            $usuarioEnSesion = true; // el perfil a visulizar es  el usuario en sesion
                        else //el perfil a visualizar no es el usuario en sesion
                            $usuarioEnSesion = false; // el perfil a visulizar no es  el usuario en sesion
                    }
                    // Pasar los datos directamente a la vista
                    require_once __DIR__ . '/../views/tableros.php';
                    exit;
                } else {
                    header('Location: /perfil/render/' . $id_usuario); // Redirigir al perfil del usuario
                }
            }
        } else {
            $this->middleware->cerrarSesion();
        }
    }

    public function detalle($id_tablero)
    {
        // Verificar si el usuario está autenticado
        if ($this->middleware->autenticarUsuario()) {
            // Si está autenticado, redirigir a la página de inici

            $tableroData = TablerosDao::getInstance()->obtenerPublicacionesDeTablero($id_tablero);
            $tablero = TablerosDao::getInstance()->obtenerTableroPorId($id_tablero);

            foreach ($tableroData as $data) {
                $publicaciones[] = new Publicaciones(
                    $data['ID_PUBLICACION'],
                    $data['DESCRIPCION'],
                    $data['ID_USUARIO'],
                    $data['CATEGORIA'],
                    $data['ESTATUS'],
                    $data['FECHA_CREACION'],
                    $data['CONTADOR_LIKES'],
                    $data['RUTA_VIDEO'],
                    $data['TIPO_IMG'],
                    $data['IMAGEN']
                );
            }

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

    public function guardar($id_tablero, $id_publicacion)
    {
        global $usuarioSesion; // Asegurarse de que la variable global esté disponible

        if ($this->middleware->autenticarUsuario()) {
            // Guardar la publicación en el tablero
            $resultado = TablerosDao::getInstance()->guardarPublicacionEnTablero($id_tablero, $id_publicacion);

            if ($resultado) {
                header('Location: /publicacion/post/' . $id_publicacion); // Redirigir al perfil del usuario
                exit;
            } else {
                echo "Error al guardar la publicación en el tablero.";
            }
        } else {
            // Redirigir a la página de inicio de sesión si no está autenticado
            $this->middleware->cerrarSesion();
        }
    }

    public function eliminar($id_publicacion, $id_usuario)
    {
        global $usuarioSesion; // Asegurarse de que la variable global esté disponible

        if ($this->middleware->autenticarUsuario()) {
            // Eliminar la publicación del tablero
            $resultado = TablerosDao::getInstance()->eliminarPublicacionDeTablero($id_usuario, $id_publicacion);

            if ($resultado) {
                header('Location: /publicacion/post/' . $id_publicacion);
                exit;
            } else {
                echo "Error al eliminar la publicación del tablero.";
            }
        } else {
            // Redirigir a la página de inicio de sesión si no está autenticado
            $this->middleware->cerrarSesion();
        }
    }
}
