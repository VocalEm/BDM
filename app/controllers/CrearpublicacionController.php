<?php

namespace App\Controllers;

use App\Core\Middleware;
use App\Models\Publicaciones;
use App\Controllers\Daos\PublicacionDao;

class CrearpublicacionController
{
    private $middleware;

    public function __construct()
    {
        $this->middleware = Middleware::getInstance();
    }

    public function render()
    {
        // Verificar si el usuario está autenticado
        if ($this->middleware->autenticarUsuario()) {
            // Si está autenticado, redirigir a la página de inici
            require_once __DIR__ . '/../views/crearPublicacion.php';
            exit;
        } else {
            // Si no está autenticado, redirigir a la página de inicio de sesión
            $this->middleware->cerrarSesion();
        }
    }

    //TODO: falta la funcionalidad de las categorias para que esto funcione
    public function form()
    {
        if ($this->middleware->autenticarUsuario()) {
            // Procesar el formulario de creación de publicación
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $descripcion = $_POST['descripcion'] ?? '';
                $idUsuario = $_SESSION['id_usuario'] ?? null; // Obtener el ID del usuario autenticado
                $categoria = $_POST['categoria'] ?? '';
                $estatus = 1; // Publicación activa por defecto
                $contadorLikes = 0; // Inicializar contador de likes
                $rutaVideo = $_POST['ruta_video'] ?? '';
                $tipoImg = $_FILES['imagen']['type'] ?? '';
                $imagen = file_get_contents($_FILES['imagen']['tmp_name'] ?? '');

                if ($idUsuario) {
                    $publicacion = new Publicaciones();
                    $publicacion->setDescripcion($descripcion);
                    $publicacion->setIdUsuario($idUsuario);
                    $publicacion->setCategoria($categoria);
                    $publicacion->setEstatus($estatus);
                    $publicacion->setFechaCreacion(date('Y-m-d H:i:s'));
                    $publicacion->setContadorLikes($contadorLikes);
                    $publicacion->setRutaVideo($rutaVideo);
                    $publicacion->setTipoImg($tipoImg);
                    $publicacion->setImagen($imagen);

                    $dao = PublicacionDao::getInstance();
                    $resultado = $dao->agregarPublicacion($publicacion);

                    if ($resultado) {
                        header('Location: /publicaciones'); // Redirigir a la lista de publicaciones
                        exit;
                    } else {
                        echo "Error al crear la publicación.";
                    }
                } else {
                    echo "Usuario no autenticado.";
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
