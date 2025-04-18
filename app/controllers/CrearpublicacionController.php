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
        global $usuarioSesion; // Asegurarse de que la variable global esté disponible

        // Verificar si el usuario está autenticado
        if ($this->middleware->autenticarUsuario()) {
            // Si está autenticado, redirigir a la página de inici
            $categorias = PublicacionDao::getInstance()->obtenerCategorias();
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
        global $usuarioSesion; // Asegurarse de que la variable global esté disponible

        if ($this->middleware->autenticarUsuario()) {
            // Procesar el formulario de creación de publicación
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $descripcion = $_POST['descripcion'] ?? '';
                $idUsuario = $usuarioSesion->getIdUsuario() ?? null; // Obtener el ID del usuario autenticado
                $categoria = $_POST['categoria'] ?? '';
                $estatus = 1; // Publicación activa por defecto
                $contadorLikes = 0; // Inicializar contador de likes
                $rutaVideo = ''; // Valor predeterminado para evitar null
                $tipoImg = '';
                $imagen = '';

                // Procesar la carga de imagen o video
                if (!empty($_FILES['imagen']['tmp_name'])) {
                    $tipoImg = $_FILES['imagen']['type'];
                    $imagen = file_get_contents($_FILES['imagen']['tmp_name']);
                } elseif (!empty($_FILES['video']['tmp_name'])) {
                    $videoTmpName = $_FILES['video']['tmp_name'];
                    $videoOriginalName = $_FILES['video']['name'];
                    $videoExtension = pathinfo($videoOriginalName, PATHINFO_EXTENSION);

                    // Generar un nombre único para el video
                    $videoUniqueName = uniqid('video_', true) . '.' . $videoExtension;

                    // Ruta donde se guardará el video
                    $targetDir = __DIR__ . '/../views/assets/videos/';
                    if (!is_dir($targetDir)) {
                        mkdir($targetDir, 0777, true); // Create the directory with proper permissions
                    }

                    $videoDestination = $targetDir . $videoUniqueName;

                    // Mover el archivo a la carpeta de destino
                    if (move_uploaded_file($videoTmpName, $videoDestination)) {
                        $rutaVideo =  __DIR__ . 'views\assets\videos\\' . $videoUniqueName; // Ruta relativa para guardar en la base de datos
                    } else {
                        echo "Error al guardar el video.";
                        return;
                    }
                }

                if ($idUsuario) {
                    // Crear una nueva instancia de Publicaciones con los datos del formulario
                    $publicacion = new Publicaciones(
                        0, // id_publicacion (se generará automáticamente en la base de datos)
                        $descripcion,
                        $idUsuario,
                        $categoria,
                        $estatus,
                        date('Y-m-d H:i:s'), // fecha_creacion
                        $contadorLikes,
                        $rutaVideo,
                        $tipoImg,
                        $imagen
                    );

                    // Guardar la publicación en la base de datos
                    $dao = PublicacionDao::getInstance();
                    $resultado = $dao->agregarPublicacion($publicacion);

                    if ($resultado) {
                        header('Location: /perfil/render/' . $idUsuario); // Redirigir a la lista de publicaciones
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
