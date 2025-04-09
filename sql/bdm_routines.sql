CREATE DATABASE  IF NOT EXISTS `bdm` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `bdm`;
-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: localhost    Database: bdm
-- ------------------------------------------------------
-- Server version	8.0.39

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping routines for database 'bdm'
--
/*!50003 DROP PROCEDURE IF EXISTS `usuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usuario`(
    IN p_opcion INT,
    IN p_ID_USUARIO INT,
    IN p_NOMBRE VARCHAR(50),
    IN p_APELLIDO_PATERNO VARCHAR(50),
    IN p_APELLIDO_MATERNO VARCHAR(50),
    IN p_CORREO VARCHAR(80),
    IN p_FECHA_NACIMIENTO DATE,
    IN p_SEXO TINYINT,
    IN p_USERNAME VARCHAR(50),
    IN p_PASSWORD VARCHAR(60),
    IN p_FOTO_PERFIL LONGBLOB,
    IN p_PRIVACIDAD TINYINT,
    IN P_TIPO_IMG VARCHAR(50)
)
BEGIN
    CASE p_opcion
        -- Opción 1: Registrar un usuario
        WHEN 1 THEN
            -- Validar si el correo ya existe
            IF EXISTS (
                SELECT 1 FROM usuarios WHERE CORREO = p_CORREO
            ) THEN
                SELECT TRUE AS correo;
            
            -- Validar si el nombre de usuario ya existe
            ELSEIF EXISTS (
                SELECT 1 FROM usuarios WHERE USERNAME = p_USERNAME
            ) THEN
                SELECT TRUE AS username;

            ELSE
                -- Registrar usuario si no hay conflictos
                INSERT INTO usuarios (
                    NOMBRE, APELLIDO_PATERNO, APELLIDO_MATERNO, CORREO, FECHA_NACIMINENTO,
                    SEXO, USERNAME, `PASSWORD`, FOTO_PERFIL, ESTATUS, PRIVACIDAD, FECHA_REGISTRO,TIPO_IMG
                ) VALUES (
                    p_NOMBRE, p_APELLIDO_PATERNO, p_APELLIDO_MATERNO, p_CORREO, p_FECHA_NACIMIENTO,
                    p_SEXO, p_USERNAME, p_PASSWORD, p_FOTO_PERFIL, 1, p_PRIVACIDAD, NOW(), P_TIPO_IMG
                );
                SELECT TRUE AS output;
            END IF;


        -- Opción 2: Desactivar un usuario
        WHEN 2 THEN
            UPDATE usuarios
            SET ESTATUS = 0
            WHERE ID_USUARIO = p_ID_USUARIO;
            SELECT TRUE AS correcto;

        -- Opción 3: Modificar un usuario
		WHEN 3 THEN
            UPDATE usuarios
            SET 
                NOMBRE = p_NOMBRE,
                APELLIDO_PATERNO = p_APELLIDO_PATERNO,
                APELLIDO_MATERNO = p_APELLIDO_MATERNO,
                CORREO = p_CORREO,
                FECHA_NACIMINENTO = p_FECHA_NACIMIENTO,
                SEXO = p_SEXO,
                USERNAME = p_USERNAME,
                `PASSWORD` = p_PASSWORD,
                FOTO_PERFIL = p_FOTO_PERFIL,
                PRIVACIDAD = p_PRIVACIDAD,
                TIPO_IMG = P_TIPO_IMG
            WHERE ID_USUARIO = p_ID_USUARIO;
            SELECT TRUE AS correcto;

        -- Opción 4: Mostrar un usuario específico
        WHEN 4 THEN
            SELECT 
                ID_USUARIO,
                NOMBRE,
                APELLIDO_PATERNO,
                APELLIDO_MATERNO,
                CORREO,
                FECHA_NACIMINENTO,
                SEXO,
                USERNAME,
                `PASSWORD`,
                FOTO_PERFIL,
                ESTATUS,
                PRIVACIDAD,
                FECHA_REGISTRO,
				TIPO_IMG
            FROM usuarios
            WHERE ID_USUARIO = p_ID_USUARIO;

        -- Opción 5: Obtener todos los usuarios
        WHEN 5 THEN
            SELECT 
                ID_USUARIO,
                NOMBRE,
                APELLIDO_PATERNO,
                APELLIDO_MATERNO,
                CORREO,
                FECHA_NACIMINENTO,
                SEXO,
                USERNAME,
                `PASSWORD`,
                FOTO_PERFIL,
                ESTATUS,
                PRIVACIDAD,
                FECHA_REGISTRO,
                TIPO_IMG
            FROM usuarios;

        -- Opción 6: Login - Retornar información del usuario
        WHEN 6 THEN
            SELECT 
                ID_USUARIO,
                NOMBRE,
                APELLIDO_PATERNO,
                APELLIDO_MATERNO,
                CORREO,
                `PASSWORD`,
                USERNAME,
                ESTATUS
            FROM usuarios
            WHERE CORREO = p_CORREO  AND ESTATUS = 1;

        -- Manejo de error: Opción no válida
        ELSE
            SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Opción no válida en el procedimiento';
    END CASE;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-09  0:31:47
