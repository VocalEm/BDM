<?php

namespace App\Controllers\Daos;

use App\Core\Database;
use App\Models\Tableros;

class TablerosDao
{
    private $conexion;
    private static $instance = null;

    public function __construct()
    {
        $this->conexion = Database::getInstance()->getConnection();
    }

    // Agregar un nuevo tablero
    public function agregarTablero(Tableros $tablero)
    {
        try {
            $stmt = $this->conexion->prepare("CALL sp_tablero(
                :opcion, NULL, :titulo, :id_usuario, :portada, NULL, :descripcion, :tipo_img
            )");

            $opcion = 1; // Opción 1: Registrar un tablero
            $id_usuario = $tablero->getIdUsuario();
            $titulo = $tablero->getTitulo();
            $portada = $tablero->getPortada();
            $descripcion = $tablero->getDescripcion(); // Usamos el atributo detalle como descripción
            $tipo_img = $tablero->getTipoImg(); // Nuevo atributo para el tipo de imagen

            $stmt->bindParam(':opcion', $opcion, \PDO::PARAM_INT);
            $stmt->bindParam(':titulo', $titulo, \PDO::PARAM_STR);
            $stmt->bindParam(':id_usuario', $id_usuario, \PDO::PARAM_INT);
            $stmt->bindParam(':portada', $portada, \PDO::PARAM_LOB);
            $stmt->bindParam(':descripcion', $descripcion, \PDO::PARAM_STR);
            $stmt->bindParam(':tipo_img', $tipo_img, \PDO::PARAM_STR);

            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error al agregar tablero: " . $e->getMessage();
            return false;
        }
    }

    // Obtener todos los tableros de un usuario
    public function obtenerTablerosPorUsuario(int $id_usuario)
    {
        try {
            $stmt = $this->conexion->prepare("CALL sp_tablero(
                :opcion, NULL, NULL, :id_usuario, NULL, NULL, NULL, NULL
            )");

            $opcion = 2; // Opción 2: Obtener todos los tableros de un usuario

            $stmt->bindParam(':opcion', $opcion, \PDO::PARAM_INT);
            $stmt->bindParam(':id_usuario', $id_usuario, \PDO::PARAM_INT);

            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error al obtener tableros: " . $e->getMessage();
            return false;
        }
    }

    // Guardar una publicación en un tablero
    public function guardarPublicacionEnTablero(int $id_tablero, int $id_publicacion)
    {
        try {
            $stmt = $this->conexion->prepare("CALL sp_tablero(
                :opcion, :id_tablero, NULL, NULL, NULL, :id_publicacion, NULL, NULL
            )");

            $opcion = 3; // Opción 3: Guardar publicación en tablero

            $stmt->bindParam(':opcion', $opcion, \PDO::PARAM_INT);
            $stmt->bindParam(':id_tablero', $id_tablero, \PDO::PARAM_INT);
            $stmt->bindParam(':id_publicacion', $id_publicacion, \PDO::PARAM_INT);

            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error al guardar publicación en tablero: " . $e->getMessage();
            return false;
        }
    }

    // Obtener publicaciones de un tablero
    public function obtenerPublicacionesDeTablero(int $id_tablero)
    {
        try {
            $stmt = $this->conexion->prepare("CALL sp_tablero(
                :opcion, :id_tablero, NULL, NULL, NULL, NULL, NULL, NULL
            )");

            $opcion = 4; // Opción 4: Obtener publicaciones del tablero

            $stmt->bindParam(':opcion', $opcion, \PDO::PARAM_INT);
            $stmt->bindParam(':id_tablero', $id_tablero, \PDO::PARAM_INT);

            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error al obtener publicaciones del tablero: " . $e->getMessage();
            return false;
        }
    }

    // Verificar si una publicación está guardada por el usuario
    public function verificarPublicacionGuardada(int $id_publicacion, int $id_usuario)
    {
        try {
            $stmt = $this->conexion->prepare("CALL sp_tablero(
                :opcion, NULL, NULL, :id_usuario, NULL, :id_publicacion, NULL, NULL
            )");

            $opcion = 5; // Opción 5: Verificar si una publicación está guardada

            $stmt->bindParam(':opcion', $opcion, \PDO::PARAM_INT);
            $stmt->bindParam(':id_usuario', $id_usuario, \PDO::PARAM_INT);
            $stmt->bindParam(':id_publicacion', $id_publicacion, \PDO::PARAM_INT);

            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error al verificar publicación guardada: " . $e->getMessage();
            return false;
        }
    }

    public function eliminarPublicacionDeTablero(int $id_usuario, int $id_publicacion)
    {
        try {
            $stmt = $this->conexion->prepare("CALL sp_tablero(
                :opcion, NULL, NULL, :id_usuario, NULL, :id_publicacion, NULL, NULL
            )");

            $opcion = 6; // Opción 6: Eliminar publicación de tablero

            $stmt->bindParam(':opcion', $opcion, \PDO::PARAM_INT);
            $stmt->bindParam(':id_usuario', $id_usuario, \PDO::PARAM_INT);
            $stmt->bindParam(':id_publicacion', $id_publicacion, \PDO::PARAM_INT);

            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error al eliminar publicación de tablero: " . $e->getMessage();
            return false;
        }
    }

    public function obtenerTableroPorId(int $id_tablero)
    {
        try {
            $stmt = $this->conexion->prepare("CALL sp_tablero(
                :opcion, :id_tablero, NULL, NULL, NULL, NULL, NULL, NULL
            )");

            $opcion = 7; // Opción 7: Obtener tablero por ID

            $stmt->bindParam(':opcion', $opcion, \PDO::PARAM_INT);
            $stmt->bindParam(':id_tablero', $id_tablero, \PDO::PARAM_INT);

            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error al obtener tablero por ID: " . $e->getMessage();
            return false;
        }
    }

    // Singleton para obtener la instancia de TablerosDao
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new TablerosDao();
        }
        return self::$instance;
    }
}
