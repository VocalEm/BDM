<?php

namespace App\Controllers\Daos;

use App\Core\Database;
use App\Models\Usuarios;

class UsuarioDao
{
    private $conexion;
    private static $instance = null;

    public function __construct()
    {
        $this->conexion = Database::getInstance()->getConnection();
    }

    // Agregar un nuevo usuario
    public function agregarUsuario(Usuarios $usuario)
    {
        try {
            $stmt = $this->conexion->prepare("CALL sp_usuario(
                :opcion, NULL, :nombre, :apellidoPaterno, :apellidoMaterno, 
                :correo, :fechaNacimiento, :sexo, :username, :password, :fotoPerfil, :privacidad, :tipoImg, NULL
            )");

            $opcion = 1; // Opción 1: Registrar un usuario
            $nombre = $usuario->getNombre();
            $apellidoPaterno = $usuario->getApellidoPaterno();
            $apellidoMaterno = $usuario->getApellidoMaterno();
            $correo = $usuario->getCorreo();
            $fechaNacimiento = $usuario->getFechaNacimiento();
            $sexo = $usuario->getSexo();
            $username = $usuario->getUsername();
            $password = $usuario->getPassword();
            $fotoPerfil = $usuario->getFotoPerfil();
            $privacidad = $usuario->getPrivacidad();

            $stmt->bindParam(':opcion', $opcion, \PDO::PARAM_INT);
            $stmt->bindParam(':nombre', $nombre, \PDO::PARAM_STR);
            $stmt->bindParam(':apellidoPaterno', $apellidoPaterno, \PDO::PARAM_STR);
            $stmt->bindParam(':apellidoMaterno', $apellidoMaterno, \PDO::PARAM_STR);
            $stmt->bindParam(':correo', $correo, \PDO::PARAM_STR);
            $stmt->bindParam(':fechaNacimiento', $fechaNacimiento, \PDO::PARAM_STR);
            $stmt->bindParam(':sexo', $sexo, \PDO::PARAM_INT);
            $stmt->bindParam(':username', $username, \PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, \PDO::PARAM_STR);
            $stmt->bindParam(':fotoPerfil', $fotoPerfil, \PDO::PARAM_LOB);
            $stmt->bindParam(':privacidad', $privacidad, \PDO::PARAM_INT);
            $stmt->bindParam(':tipoImg', $usuario->getTipoImg(), \PDO::PARAM_STR);

            $stmt->execute();

            $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($resultado['correo'] == true) {
                return "correo";
            } else if ($resultado['output'] == true) {
                return "correcto";
            }
        } catch (\PDOException $e) {
            echo "Error al agregar usuario: " . $e->getMessage();
            return false;
        }
    }

    // Modificar un usuario existente
    public function modificarUsuario(Usuarios $usuario)
    {
        try {
            $stmt = $this->conexion->prepare("CALL sp_usuario(
                :opcion, :idUsuario, :nombre, :apellidoPaterno, :apellidoMaterno, 
                :correo, :fechaNacimiento, :sexo, :username, :password, :fotoPerfil, :privacidad, :tipoImg, NULL
            )");

            $opcion = 3;

            $idUsuario = $usuario->getIdUsuario();
            $nombre = $usuario->getNombre();
            $apellidoPaterno = $usuario->getApellidoPaterno();
            $apellidoMaterno = $usuario->getApellidoMaterno();
            $correo = $usuario->getCorreo();
            $fechaNacimiento = $usuario->getFechaNacimiento();
            $sexo = $usuario->getSexo();
            $username = $usuario->getUsername();
            $password = $usuario->getPassword();
            $fotoPerfil = $usuario->getFotoPerfil();
            $privacidad = $usuario->getPrivacidad();
            $tipoImg = $usuario->getTipoImg();

            $stmt->bindParam(':opcion', $opcion, \PDO::PARAM_INT);
            $stmt->bindParam(':idUsuario', $idUsuario, \PDO::PARAM_INT);
            $stmt->bindParam(':nombre', $nombre, \PDO::PARAM_STR);
            $stmt->bindParam(':apellidoPaterno', $apellidoPaterno, \PDO::PARAM_STR);
            $stmt->bindParam(':apellidoMaterno', $apellidoMaterno, \PDO::PARAM_STR);
            $stmt->bindParam(':correo', $correo, \PDO::PARAM_STR);
            $stmt->bindParam(':fechaNacimiento', $fechaNacimiento, \PDO::PARAM_STR);
            $stmt->bindParam(':sexo', $sexo, \PDO::PARAM_INT);
            $stmt->bindParam(':username', $username, \PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, \PDO::PARAM_STR);
            $stmt->bindParam(':fotoPerfil', $fotoPerfil, \PDO::PARAM_LOB);
            $stmt->bindParam(':privacidad', $privacidad, \PDO::PARAM_INT);
            $stmt->bindParam(':tipoImg', $tipoImg, \PDO::PARAM_STR);

            $stmt->execute();

            $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($resultado && $resultado['correcto'] == true) {
                return true;
            } else {
                return false;
            }
        } catch (\PDOException $e) {
            echo "Error al modificar usuario: " . $e->getMessage();
            return false;
        }
    }

    // Eliminar (desactivar) un usuario
    public function eliminarUsuario($idUsuario)
    {
        try {
            $stmt = $this->conexion->prepare("CALL sp_usuario(:opcion, :idUsuario, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)");

            $opcion = 2;
            $stmt->bindParam(':opcion', $opcion, \PDO::PARAM_INT);
            $stmt->bindParam(':idUsuario', $idUsuario, \PDO::PARAM_INT);

            $stmt->execute();
            return $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error al eliminar usuario: " . $e->getMessage();
        }
    }

    // Obtener un usuario por ID
    public function obtenerUsuarioPorId($idUsuario)
    {
        try {
            $stmt = $this->conexion->prepare("CALL sp_usuario(:opcion, :idUsuario, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)");

            $opcion = 4;
            $stmt->bindParam(':opcion', $opcion, \PDO::PARAM_INT);
            $stmt->bindParam(':idUsuario', $idUsuario, \PDO::PARAM_INT);

            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error al obtener usuario: " . $e->getMessage();
            return null;
        }
    }

    // Obtener todos los usuarios
    public function obtenerUsuarios()
    {
        try {
            $stmt = $this->conexion->prepare("CALL sp_usuario(:opcion, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)");

            $opcion = 5;
            $stmt->bindParam(':opcion', $opcion, \PDO::PARAM_INT);

            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error al obtener usuarios: " . $e->getMessage();
            return [];
        }
    }

    // Login de usuario
    public function login($correo)
    {
        try {
            $stmt = $this->conexion->prepare("CALL sp_usuario(:opcion, NULL, NULL, NULL, NULL, :correo, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)");

            $opcion = 6;
            $stmt->bindParam(':opcion', $opcion, \PDO::PARAM_INT);
            $stmt->bindParam(':correo', $correo, \PDO::PARAM_STR);

            $stmt->execute();
            $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);
            if (!$resultado) {
                return false;
            } else {
                return $resultado;
            }
        } catch (\PDOException $e) {
            echo "Error al iniciar sesión: " . $e->getMessage();
            return false;
        }
    }

    // Seguir a un usuario
    public function seguirUsuario($idSeguidor, $idSeguido)
    {
        try {
            $stmt = $this->conexion->prepare("CALL sp_usuario(:opcion, :idSeguidor, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, :idSeguido)");

            $opcion = 7;
            $stmt->bindParam(':opcion', $opcion, \PDO::PARAM_INT);
            $stmt->bindParam(':idSeguidor', $idSeguidor, \PDO::PARAM_INT);
            $stmt->bindParam(':idSeguido', $idSeguido, \PDO::PARAM_INT);

            $stmt->execute();
            $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error al seguir usuario: " . $e->getMessage();
            return false;
        }
    }

    // Dejar de seguir a un usuario
    public function dejarSeguirUsuario($idSeguidor, $idSeguido) //tambien sirve para eliminar una solicitud
    {
        try {
            $stmt = $this->conexion->prepare("CALL sp_usuario(:opcion, :idSeguidor, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, :idSeguido)");

            $opcion = 8;
            $stmt->bindParam(':opcion', $opcion, \PDO::PARAM_INT);
            $stmt->bindParam(':idSeguidor', $idSeguidor, \PDO::PARAM_INT);
            $stmt->bindParam(':idSeguido', $idSeguido, \PDO::PARAM_INT);

            $stmt->execute();
            $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error al dejar de seguir usuario: " . $e->getMessage();
            return false;
        }
    }

    public function verificarSeguir($idSeguidor, $idSeguido)
    {
        try {
            $stmt = $this->conexion->prepare("CALL sp_usuario(:opcion, :idSeguidor, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, :idSeguido)");

            $opcion = 9;
            $stmt->bindParam(':opcion', $opcion, \PDO::PARAM_INT);
            $stmt->bindParam(':idSeguidor', $idSeguidor, \PDO::PARAM_INT);
            $stmt->bindParam(':idSeguido', $idSeguido, \PDO::PARAM_INT);

            $stmt->execute();
            $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

            return $resultado;
        } catch (\PDOException $e) {
            echo "Error al verificar seguir: " . $e->getMessage();
            return false;
        }
    }

    public function verificarSolicitud($idSeguidor, $idSeguido)
    {
        try {
            $stmt = $this->conexion->prepare("CALL sp_usuario(:opcion, :idSeguidor, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, :idSeguido)");

            $opcion = 10;
            $stmt->bindParam(':opcion', $opcion, \PDO::PARAM_INT);
            $stmt->bindParam(':idSeguidor', $idSeguidor, \PDO::PARAM_INT);
            $stmt->bindParam(':idSeguido', $idSeguido, \PDO::PARAM_INT);

            $stmt->execute();
            $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);
            // Si hay resultado, regresa un array con la clave SOLICITUD

            return $resultado;
        } catch (\PDOException $e) {
            echo "Error al verificar solicitud: " . $e->getMessage();
            return false;
        }
    }

    public function crearSolicitud($idSeguidor, $idSeguido)
    {
        try {
            $stmt = $this->conexion->prepare("CALL sp_usuario(:opcion, :idSeguidor, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, :idSeguido)");

            $opcion = 11;
            $stmt->bindParam(':opcion', $opcion, \PDO::PARAM_INT);
            $stmt->bindParam(':idSeguidor', $idSeguidor, \PDO::PARAM_INT);
            $stmt->bindParam(':idSeguido', $idSeguido, \PDO::PARAM_INT);

            $stmt->execute();
            return $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error al crear solicitud: " . $e->getMessage();
            return false;
        }
    }

    public function aceptarSolicitud($idSeguidor, $idSeguido)
    {
        try {
            $stmt = $this->conexion->prepare("CALL sp_usuario(:opcion, :idSeguidor, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, :idSeguido)");

            $opcion = 12;
            $stmt->bindParam(':opcion', $opcion, \PDO::PARAM_INT);
            $stmt->bindParam(':idSeguidor', $idSeguidor, \PDO::PARAM_INT);
            $stmt->bindParam(':idSeguido', $idSeguido, \PDO::PARAM_INT);

            $stmt->execute();
            return $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error al aceptar solicitud: " . $e->getMessage();
            return false;
        }
    }

    public function obtenerSolicitudes($idUsuario)
    {
        try {
            $stmt = $this->conexion->prepare("CALL sp_usuario(:opcion, :idUsuario, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)");

            $opcion = 13;
            $stmt->bindParam(':opcion', $opcion, \PDO::PARAM_INT);
            $stmt->bindParam(':idUsuario', $idUsuario, \PDO::PARAM_INT);

            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error al obtener solicitudes: " . $e->getMessage();
            return false;
        }
    }

    public function obtenerSeguidores($idUsuario)
    {
        try {
            $stmt = $this->conexion->prepare("CALL sp_usuario(:opcion, :idUsuario, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)");

            $opcion = 14;
            $stmt->bindParam(':opcion', $opcion, \PDO::PARAM_INT);
            $stmt->bindParam(':idUsuario', $idUsuario, \PDO::PARAM_INT);

            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error al obtener solicitudes: " . $e->getMessage();
            return false;
        }
    }

    public function obtenerSeguidos($idUsuario)
    {
        try {
            $stmt = $this->conexion->prepare("CALL sp_usuario(:opcion, :idUsuario, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)");

            $opcion = 15;
            $stmt->bindParam(':opcion', $opcion, \PDO::PARAM_INT);
            $stmt->bindParam(':idUsuario', $idUsuario, \PDO::PARAM_INT);

            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error al obtener solicitudes: " . $e->getMessage();
            return false;
        }
    }


    public function rechazarSolicitud($idSeguidor, $idSeguido)
    {
        try {
            $stmt = $this->conexion->prepare("CALL sp_usuario(:opcion, :idSeguidor, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, :idSeguido)");

            $opcion = 16;
            $stmt->bindParam(':opcion', $opcion, \PDO::PARAM_INT);
            $stmt->bindParam(':idSeguidor', $idSeguidor, \PDO::PARAM_INT);
            $stmt->bindParam(':idSeguido', $idSeguido, \PDO::PARAM_INT);

            $stmt->execute();
            return $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error al rechazar solicitud: " . $e->getMessage();
            return false;
        }
    }


    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new UsuarioDao();
        }
        return self::$instance;
    }
}
