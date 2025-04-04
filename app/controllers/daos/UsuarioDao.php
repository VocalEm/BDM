<?php

namespace App\Controllers\Daos;

use App\Core\Database;
use App\Models\Usuarios;



class UsuarioDao
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = Database::getInstance()->getConnection();
    }

    // Agregar un nuevo usuario
    public function agregarUsuario(Usuarios $usuario)
    {
        try {
            $stmt = $this->conexion->prepare("CALL usuario(
                :opcion, NULL, :nombre, :apellidoPaterno, :apellidoMaterno, 
                :correo, :fechaNacimiento, :sexo, :username, :password, :fotoPerfil, :privacidad
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

            $stmt->execute();

            // Capturar el resultado del SELECT TRUE AS correcto
            $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($resultado['correo'] == true) {
                return "correo";
            } // Correo ya existe
            else if ($resultado['output'] == true) {
                return "correcto"; // Operación exitosa
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
            $stmt = $this->conexion->prepare("CALL usuario(
                :opcion, :idUsuario, :nombre, :apellidoPaterno, :apellidoMaterno, 
                :correo, :fechaNacimiento, :sexo, :username, :password, :fotoPerfil, :privacidad
            )");

            $opcion = 3; // Opción 3: Modificar un usuario

            // Vincular los parámetros
            $stmt->bindParam(':opcion', $opcion, \PDO::PARAM_INT);
            $stmt->bindParam(':idUsuario', $usuario->getIdUsuario(), \PDO::PARAM_INT); // ID del usuario a modificar
            $stmt->bindParam(':nombre', $usuario->getNombre(), \PDO::PARAM_STR);
            $stmt->bindParam(':apellidoPaterno', $usuario->getApellidoPaterno(), \PDO::PARAM_STR);
            $stmt->bindParam(':apellidoMaterno', $usuario->getApellidoMaterno(), \PDO::PARAM_STR);
            $stmt->bindParam(':correo', $usuario->getCorreo(), \PDO::PARAM_STR);
            $stmt->bindParam(':fechaNacimiento', $usuario->getFechaNacimiento(), \PDO::PARAM_STR);
            $stmt->bindParam(':sexo', $usuario->getSexo(), \PDO::PARAM_INT);
            $stmt->bindParam(':username', $usuario->getUsername(), \PDO::PARAM_STR);
            $stmt->bindParam(':password', $usuario->getPassword(), \PDO::PARAM_STR);
            $stmt->bindParam(':fotoPerfil', $usuario->getFotoPerfil(), \PDO::PARAM_LOB);
            $stmt->bindParam(':privacidad', $usuario->getPrivacidad(), \PDO::PARAM_INT);

            $stmt->execute();

            // Capturar el resultado del SELECT TRUE AS correcto
            $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($resultado && $resultado['correcto'] === true) {
                return true; // Operación exitosa
            } else {
                return false; // Algo salió mal
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
            $stmt = $this->conexion->prepare("CALL usuario(:opcion, :idUsuario, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)");

            $opcion = 2; // Opción 2: Desactivar un usuario
            $stmt->bindParam(':opcion', $opcion, \PDO::PARAM_INT);
            $stmt->bindParam(':idUsuario', $idUsuario, \PDO::PARAM_INT);

            $stmt->execute();
        } catch (\PDOException $e) {
            echo "Error al eliminar usuario: " . $e->getMessage();
        }
    }

    // Obtener un usuario por ID
    public function obtenerUsuarioPorId($idUsuario)
    {
        try {
            $stmt = $this->conexion->prepare("CALL usuario(:opcion, :idUsuario, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)");

            $opcion = 4; // Opción 4: Mostrar un usuario
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
            // Llamada al procedimiento almacenado con la opción 5
            $stmt = $this->conexion->prepare("CALL usuario(:opcion, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)");

            $opcion = 5; // Opción 5: Obtener todos los usuarios
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
            $stmt = $this->conexion->prepare("CALL usuario(:opcion, NULL, NULL, NULL, NULL, :correo, NULL, NULL, NULL, NULL, NULL, NULL)");

            $opcion = 6; // Opción 6: Login
            $stmt->bindParam(':opcion', $opcion, \PDO::PARAM_INT);
            $stmt->bindParam(':correo', $correo, \PDO::PARAM_STR);

            $stmt->execute();
            $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);
            if (!$resultado) {
                return false;
            } else {
                return $resultado; // Retorna el usuario encontrado
            }
        } catch (\PDOException $e) {
            echo "Error al iniciar sesión: " . $e->getMessage();
            return false;
        }
    }
}
