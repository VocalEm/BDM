<?php

namespace App\Controllers\Daos;

use App\Core\Database;
use App\Models\Publicaciones;

class PublicacionDao
{
    private $conexion;
    private static $instance = null;

    public function __construct()
    {
        $this->conexion = Database::getInstance()->getConnection();
    }

    // Agregar una nueva publicación
    public function agregarPublicacion(Publicaciones $publicacion)
    {
        try {
            $stmt = $this->conexion->prepare("CALL sp_publicacion(
                :opcion, NULL, :descripcion, :idUsuario, :categoria, 
                :estatus, NULL, :contadorLikes, :rutaVideo, :tipoImg, :imagen
            )");

            $opcion = 1; // Opción 1: Registrar una publicación
            $descripcion = $publicacion->getDescripcion();
            $idUsuario = $publicacion->getIdUsuario();
            $categoria = $publicacion->getCategoria();
            $estatus = $publicacion->getEstatus();
            $contadorLikes = $publicacion->getContadorLikes();
            $rutaVideo = $publicacion->getRutaVideo();
            $tipoImg = $publicacion->getTipoImg();
            $imagen = $publicacion->getImagen();

            $stmt->bindParam(':opcion', $opcion, \PDO::PARAM_INT);
            $stmt->bindParam(':descripcion', $descripcion, \PDO::PARAM_STR);
            $stmt->bindParam(':idUsuario', $idUsuario, \PDO::PARAM_INT);
            $stmt->bindParam(':categoria', $categoria, \PDO::PARAM_STR);
            $stmt->bindParam(':estatus', $estatus, \PDO::PARAM_INT);
            $stmt->bindParam(':contadorLikes', $contadorLikes, \PDO::PARAM_INT);
            $stmt->bindParam(':rutaVideo', $rutaVideo, \PDO::PARAM_STR);
            $stmt->bindParam(':tipoImg', $tipoImg, \PDO::PARAM_STR);
            $stmt->bindParam(':imagen', $imagen, \PDO::PARAM_LOB);

            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error al agregar publicación: " . $e->getMessage();
            return false;
        }
    }

    // Modificar una publicación existente
    public function modificarPublicacion(Publicaciones $publicacion)
    {
        try {
            $stmt = $this->conexion->prepare("CALL sp_publicacion(
                :opcion, :idPublicacion, :descripcion, :idUsuario, :categoria, 
                :estatus, :fechaCreacion, :contadorLikes, :rutaVideo, :tipoImg, :imagen
            )");

            $opcion = 3; // Opción 3: Modificar una publicación
            $idPublicacion = $publicacion->getIdPublicacion();
            $descripcion = $publicacion->getDescripcion();
            $idUsuario = $publicacion->getIdUsuario();
            $categoria = $publicacion->getCategoria();
            $estatus = $publicacion->getEstatus();
            $fechaCreacion = $publicacion->getFechaCreacion();
            $contadorLikes = $publicacion->getContadorLikes();
            $rutaVideo = $publicacion->getRutaVideo();
            $tipoImg = $publicacion->getTipoImg();
            $imagen = $publicacion->getImagen();

            $stmt->bindParam(':opcion', $opcion, \PDO::PARAM_INT);
            $stmt->bindParam(':idPublicacion', $idPublicacion, \PDO::PARAM_INT);
            $stmt->bindParam(':descripcion', $descripcion, \PDO::PARAM_STR);
            $stmt->bindParam(':idUsuario', $idUsuario, \PDO::PARAM_INT);
            $stmt->bindParam(':categoria', $categoria, \PDO::PARAM_STR);
            $stmt->bindParam(':estatus', $estatus, \PDO::PARAM_INT);
            $stmt->bindParam(':fechaCreacion', $fechaCreacion, \PDO::PARAM_STR);
            $stmt->bindParam(':contadorLikes', $contadorLikes, \PDO::PARAM_INT);
            $stmt->bindParam(':rutaVideo', $rutaVideo, \PDO::PARAM_STR);
            $stmt->bindParam(':tipoImg', $tipoImg, \PDO::PARAM_STR);
            $stmt->bindParam(':imagen', $imagen, \PDO::PARAM_LOB);

            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error al modificar publicación: " . $e->getMessage();
            return false;
        }
    }

    // Eliminar (desactivar) una publicación
    public function eliminarPublicacion($idPublicacion)
    {
        try {
            $stmt = $this->conexion->prepare("CALL sp_publicacion(:opcion, :idPublicacion, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)");

            $opcion = 2; // Opción 2: Desactivar una publicación
            $stmt->bindParam(':opcion', $opcion, \PDO::PARAM_INT);
            $stmt->bindParam(':idPublicacion', $idPublicacion, \PDO::PARAM_INT);

            $stmt->execute();
            return true;
        } catch (\PDOException $e) {
            echo "Error al eliminar publicación: " . $e->getMessage();
            return false;
        }
    }

    // Obtener una publicación por ID
    public function obtenerPublicacionPorId($idPublicacion)
    {
        try {
            $stmt = $this->conexion->prepare("CALL sp_publicacion(:opcion, :idPublicacion, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)");

            $opcion = 4; // Opción 4: Mostrar una publicación
            $stmt->bindParam(':opcion', $opcion, \PDO::PARAM_INT);
            $stmt->bindParam(':idPublicacion', $idPublicacion, \PDO::PARAM_INT);

            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error al obtener publicación: " . $e->getMessage();
            return null;
        }
    }

    // Obtener todas las publicaciones
    public function obtenerPublicaciones()
    {
        try {
            $stmt = $this->conexion->prepare("CALL sp_publicacion(:opcion, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)");

            $opcion = 5; // Opción 5: Obtener todas las publicaciones
            $stmt->bindParam(':opcion', $opcion, \PDO::PARAM_INT);

            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error al obtener publicaciones: " . $e->getMessage();
            return [];
        }
    }

    public function obtenerCategorias()
    {
        try {
            $stmt = $this->conexion->prepare("CALL sp_publicacion(:opcion, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)");
            $opcion = 6; // Opción 5: Obtener todas las categorias
            $stmt->bindParam(':opcion', $opcion, \PDO::PARAM_INT);

            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error al obtener publicaciones: " . $e->getMessage();
            return [];
        }
    }

    public function obtenerPublicacionUsuario($id_usuario)
    {
        try {
            $stmt = $this->conexion->prepare("CALL sp_publicacion(:opcion, NULL, NULL, :id_usuario, NULL, NULL, NULL, NULL, NULL, NULL, NULL)");
            $opcion = 7;
            $stmt->bindParam(':opcion', $opcion, \PDO::PARAM_INT);
            $stmt->bindParam(':id_usuario', $id_usuario, \PDO::PARAM_INT);

            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error al obtener publicaciones: " . $e->getMessage();
            return [];
        }
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new PublicacionDao();
        }
        return self::$instance;
    }

    public function CrearComentario() {} // funcion para crear comentario, posible crear un modelo o crear un dao para comentarios
}
