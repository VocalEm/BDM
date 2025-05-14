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
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria` (
  `ID_CATEGORIA` int NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_CATEGORIA`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comentarios` (
  `ID_COMENTARIO` int NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int NOT NULL,
  `COMENTARIO` varchar(100) NOT NULL,
  `ID_PUBLICACION` int NOT NULL,
  PRIMARY KEY (`ID_COMENTARIO`),
  KEY `ID_PUBLICACION_COMENTARIO_idx` (`ID_PUBLICACION`),
  KEY `ID_PUBLICACION_USUARIO_idx` (`ID_USUARIO`),
  CONSTRAINT `ID_PUBLICACION_COMENTARIO` FOREIGN KEY (`ID_PUBLICACION`) REFERENCES `publicaciones` (`ID_PUBLICACION`),
  CONSTRAINT `ID_PUBLICACION_USUARIO` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuarios` (`ID_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='				';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `publicaciones`
--

DROP TABLE IF EXISTS `publicaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `publicaciones` (
  `ID_PUBLICACION` int NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(200) NOT NULL,
  `ID_USUARIO` int NOT NULL,
  `CATEGORIA` varchar(50) NOT NULL,
  `ESTATUS` tinyint NOT NULL DEFAULT '1',
  `FECHA_CREACION` timestamp NOT NULL,
  `CONTADOR_LIKES` int NOT NULL DEFAULT '0',
  `IMAGEN` longblob,
  `TIPO_IMG` varchar(50) DEFAULT NULL,
  `RUTA_VIDEO` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_PUBLICACION`),
  KEY `ID_USUARIO_PUBLICACION_idx` (`ID_USUARIO`),
  CONSTRAINT `ID_USUARIO_PUBLICACION` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuarios` (`ID_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `actualizar_contador_publicaciones_suma` AFTER INSERT ON `publicaciones` FOR EACH ROW BEGIN
   -- Caso de DELETE (se resta 1 al contador de likes)
    IF (NEW.ID_USUARIO IS NOT NULL) THEN
        UPDATE usuarios
        SET PUBLICACIONES = PUBLICACIONES + 1
        WHERE ID_USUARIO = NEW.ID_USUARIO;
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `reacciones`
--

DROP TABLE IF EXISTS `reacciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reacciones` (
  `ID_REACCION` int NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int NOT NULL,
  `ID_PUBLICACION` int NOT NULL,
  PRIMARY KEY (`ID_REACCION`),
  KEY `ID_REACCION_USUARIO_idx` (`ID_USUARIO`),
  KEY `ID_REACCION_PUBLICACION_idx` (`ID_PUBLICACION`),
  CONSTRAINT `ID_REACCION_PUBLICACION` FOREIGN KEY (`ID_PUBLICACION`) REFERENCES `publicaciones` (`ID_PUBLICACION`),
  CONSTRAINT `ID_REACCION_USUARIO` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuarios` (`ID_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `actualizar_contador_likes` AFTER INSERT ON `reacciones` FOR EACH ROW BEGIN
    -- Caso de INSERT (se suma 1 al contador de likes)
    IF (NEW.ID_PUBLICACION IS NOT NULL) THEN
        UPDATE publicaciones
        SET CONTADOR_LIKES = CONTADOR_LIKES + 1
        WHERE ID_PUBLICACION = NEW.ID_PUBLICACION;
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `actualizar_contador_likes_resta` AFTER DELETE ON `reacciones` FOR EACH ROW BEGIN
   -- Caso de DELETE (se resta 1 al contador de likes)
    IF (OLD.ID_PUBLICACION IS NOT NULL) THEN
        UPDATE publicaciones
        SET CONTADOR_LIKES = CONTADOR_LIKES - 1
        WHERE ID_PUBLICACION = OLD.ID_PUBLICACION;
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `seguidores`
--

DROP TABLE IF EXISTS `seguidores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `seguidores` (
  `ID_SEGUIDOR` int NOT NULL AUTO_INCREMENT,
  `ID_USUARIO_SEGUIDO` int NOT NULL,
  `ID_USUARIO_SEGUIDOR` int NOT NULL,
  `ESTATUS` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_SEGUIDOR`),
  KEY `ID_USUARIOS_SEGUDIOR_idx` (`ID_USUARIO_SEGUIDOR`),
  KEY `ID_USUARIO_SEGUDIO_idx` (`ID_USUARIO_SEGUIDO`),
  CONSTRAINT `ID_USUARIO_SEGUDIO` FOREIGN KEY (`ID_USUARIO_SEGUIDO`) REFERENCES `usuarios` (`ID_USUARIO`),
  CONSTRAINT `ID_USUARIOS_SEGUDIOR` FOREIGN KEY (`ID_USUARIO_SEGUIDOR`) REFERENCES `usuarios` (`ID_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `SumarSeguidosSeguidores` AFTER INSERT ON `seguidores` FOR EACH ROW BEGIN
IF(NEW.ESTATUS = 1)
THEN
    UPDATE usuarios SET SEGUIDORES = SEGUIDORES + 1 WHERE ID_USUARIO = NEW.ID_USUARIO_SEGUIDO;
    UPDATE usuarios SET SEGUIDOS = SEGUIDOS + 1 WHERE ID_USUARIO = NEW.ID_USUARIO_SEGUIDOR;
END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `ActualizacionEstatusSuma` AFTER UPDATE ON `seguidores` FOR EACH ROW BEGIN
	IF(NEW.ESTATUS = 1) THEN
		UPDATE usuarios SET SEGUIDORES = SEGUIDORES + 1 WHERE ID_USUARIO = NEW.ID_USUARIO_SEGUIDO;
		UPDATE usuarios SET SEGUIDOS = SEGUIDOS + 1 WHERE ID_USUARIO = NEW.ID_USUARIO_SEGUIDOR;
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `RestarSeguidosSeguidores` AFTER DELETE ON `seguidores` FOR EACH ROW BEGIN
IF(OLD.ESTATUS = 1) THEN
    UPDATE usuarios SET SEGUIDORES = SEGUIDORES - 1 WHERE ID_USUARIO = OLD.ID_USUARIO_SEGUIDO;
    UPDATE usuarios SET SEGUIDOS = SEGUIDOS - 1 WHERE ID_USUARIO = OLD.ID_USUARIO_SEGUIDOR;
END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `tablero_detalle`
--

DROP TABLE IF EXISTS `tablero_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tablero_detalle` (
  `ID_DETALLE` int NOT NULL AUTO_INCREMENT,
  `ID_TABLERO` int NOT NULL,
  `ID_PUBLICACION` int NOT NULL,
  PRIMARY KEY (`ID_DETALLE`),
  KEY `ID_TABLERO_PUBLICACION_idx` (`ID_PUBLICACION`),
  KEY `ID_TABLERO_TABLERO_idx` (`ID_TABLERO`),
  CONSTRAINT `ID_TABLERO_PUBLICACION` FOREIGN KEY (`ID_PUBLICACION`) REFERENCES `publicaciones` (`ID_PUBLICACION`),
  CONSTRAINT `ID_TABLERO_TABLERO` FOREIGN KEY (`ID_TABLERO`) REFERENCES `tableros` (`ID_TABLERO`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tableros`
--

DROP TABLE IF EXISTS `tableros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tableros` (
  `ID_TABLERO` int NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int NOT NULL,
  `TITULO` varchar(80) NOT NULL,
  `PORTADA` longblob NOT NULL,
  `DESCRIPCION` varchar(200) DEFAULT NULL,
  `TIPO_IMG` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_TABLERO`),
  KEY `ID_USUARIO_TABLERO_idx` (`ID_USUARIO`),
  CONSTRAINT `ID_USUARIO_TABLERO` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuarios` (`ID_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `ID_USUARIO` int NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(50) NOT NULL,
  `APELLIDO_PATERNO` varchar(50) NOT NULL,
  `APELLIDO_MATERNO` varchar(50) NOT NULL,
  `CORREO` varchar(80) NOT NULL,
  `FECHA_NACIMINENTO` date NOT NULL,
  `SEXO` tinyint NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(60) NOT NULL,
  `FOTO_PERFIL` longblob NOT NULL,
  `ESTATUS` tinyint NOT NULL,
  `PRIVACIDAD` tinyint NOT NULL,
  `FECHA_REGISTRO` datetime NOT NULL,
  `TIPO_IMG` varchar(50) NOT NULL,
  `SEGUIDORES` int NOT NULL DEFAULT '0',
  `SEGUIDOS` int NOT NULL DEFAULT '0',
  `PUBLICACIONES` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping routines for database 'bdm'
--
/*!50003 DROP PROCEDURE IF EXISTS `sp_publicacion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_publicacion`(
    IN p_opcion INT,
    IN p_ID_PUBLICACION INT,
    IN p_DESCRIPCION VARCHAR(200),
    IN p_ID_USUARIO INT,
    IN p_CATEGORIA VARCHAR(50),
    IN p_ESTATUS TINYINT,
    IN p_FECHA_CREACION DATETIME,
    IN p_CONTADOR_LIKES INT,
    IN p_RUTA_VIDEO VARCHAR(255),
    IN p_TIPO_IMG VARCHAR(50),
    IN p_IMAGEN LONGBLOB
)
BEGIN
    CASE p_opcion
        -- Opción 1: Registrar una publicación
        WHEN 1 THEN
            INSERT INTO publicaciones (
                DESCRIPCION, ID_USUARIO, CATEGORIA, ESTATUS, FECHA_CREACION, 
                CONTADOR_LIKES, RUTA_VIDEO, TIPO_IMG, IMAGEN
            ) VALUES (
                p_DESCRIPCION, p_ID_USUARIO, p_CATEGORIA, p_ESTATUS, NOW(), 
                p_CONTADOR_LIKES, p_RUTA_VIDEO, p_TIPO_IMG, p_IMAGEN
            );
            SELECT TRUE AS correcto;

        -- Opción 2: Desactivar una publicación
        WHEN 2 THEN
            UPDATE publicaciones
            SET ESTATUS = 0
            WHERE ID_PUBLICACION = p_ID_PUBLICACION;
            SELECT TRUE AS correcto;

        -- Opción 3: Modificar una publicación
        WHEN 3 THEN
            UPDATE publicaciones
            SET 
                DESCRIPCION = p_DESCRIPCION,
                ID_USUARIO = p_ID_USUARIO,
                CATEGORIA = p_CATEGORIA,
                ESTATUS = p_ESTATUS,
                FECHA_CREACION = p_FECHA_CREACION,
                CONTADOR_LIKES = p_CONTADOR_LIKES,
                RUTA_VIDEO = p_RUTA_VIDEO,
                TIPO_IMG = p_TIPO_IMG,
                IMAGEN = p_IMAGEN
            WHERE ID_PUBLICACION = p_ID_PUBLICACION;
            SELECT TRUE AS correcto;

        -- Opción 4: Mostrar una publicación específica
        WHEN 4 THEN
            SELECT 
                ID_PUBLICACION,
                DESCRIPCION,
                ID_USUARIO,
                CATEGORIA,
                ESTATUS,
                FECHA_CREACION,
                CONTADOR_LIKES,
                RUTA_VIDEO,
                TIPO_IMG,
                IMAGEN
            FROM publicaciones
            WHERE ID_PUBLICACION = p_ID_PUBLICACION;

        -- Opción 5: Obtener todas las publicaciones
        WHEN 5 THEN
            SELECT 
                ID_PUBLICACION,
                DESCRIPCION,
                ID_USUARIO,
                CATEGORIA,
                ESTATUS,
                FECHA_CREACION,
                CONTADOR_LIKES,
                RUTA_VIDEO,
                TIPO_IMG,
                IMAGEN
            FROM publicaciones;
        
        -- opcion 6 obtener todas las categorias
		WHEN 6 THEN 
			SELECT
            ID_CATEGORIA,
            NOMBRE
            FROM categoria;
		
        -- opcion 7 obtiene publicaciones de un usuario en especifico
		WHEN 7 THEN
			SELECT
				ID_PUBLICACION,
                DESCRIPCION,
                ID_USUARIO,
                CATEGORIA,
                ESTATUS,
                FECHA_CREACION,
                CONTADOR_LIKES,
                RUTA_VIDEO,
                TIPO_IMG,
                IMAGEN
			FROM publicaciones
            WHERE ID_USUARIO = p_ID_USUARIO;
            
		WHEN 8 THEN -- opcion 8 crea un comentario
			INSERT INTO comentarios
            (
                ID_USUARIO, COMENTARIO, ID_PUBLICACION
            ) VALUES (
                p_ID_USUARIO, p_DESCRIPCION, p_ID_PUBLICACION
            );
            SELECT TRUE AS correcto;
		
        WHEN 9 THEN -- opcion 9 crea un comentario
			SELECT
				a.ID_COMENTARIO,
                a.ID_USUARIO,
                a.COMENTARIO,
                a.ID_PUBLICACION, 
                b.FOTO_PERFIL,
                b.TIPO_IMG,
                b.USERNAME
			FROM comentarios a
            JOIN usuarios b
            ON a.ID_USUARIO = b.ID_USUARIO
            WHERE a.ID_PUBLICACION = p_ID_PUBLICACION;
            
		WHEN 10 THEN -- crea reaccion
			INSERT INTO reacciones
            (ID_USUARIO, ID_PUBLICACION)
            VALUES(p_ID_USUARIO, p_ID_PUBLICACION);
            SELECT TRUE AS correcto;
            
		WHEN 11 THEN -- SABER SI EL USUARIO YA REACCIONO A LA PUBLICACION
			SELECT ID_USUARIO, ID_PUBLICACION 
            FROM reacciones 
            WHERE ID_USUARIO = p_ID_USUARIO AND ID_PUBLICACION = p_ID_PUBLICACION;
            
		WHEN 12 THEN -- elimina la reaccion  si ya la tiene el usuario
			DELETE FROM reacciones WHERE ID_USUARIO = p_ID_USUARIO AND ID_PUBLICACION = p_ID_PUBLICACION;
            SELECT TRUE AS correcto;
            
		WHEN 13 THEN -- BUSCA POR CATEGORIA
			 SELECT 
                ID_PUBLICACION,
                DESCRIPCION,
                ID_USUARIO,
                CATEGORIA,
                ESTATUS,
                FECHA_CREACION,
                CONTADOR_LIKES,
                RUTA_VIDEO,
                TIPO_IMG,
                IMAGEN
            FROM publicaciones
            WHERE CATEGORIA = p_CATEGORIA;
            
            WHEN 14 THEN -- BUSCA POR descripcion 
			 SELECT 
                ID_PUBLICACION,
                DESCRIPCION,
                ID_USUARIO,
                CATEGORIA,
                ESTATUS,
                FECHA_CREACION,
                CONTADOR_LIKES,
                RUTA_VIDEO,
                TIPO_IMG,
                IMAGEN
            FROM publicaciones
            WHERE DESCRIPCION LIKE CONCAT('%', p_DESCRIPCION, '%');
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
/*!50003 DROP PROCEDURE IF EXISTS `sp_tablero` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tablero`(
	IN p_opcion INT,
    IN p_ID_TABLERO INT,
    IN p_TITULO VARCHAR(80),
    IN p_ID_USUARIO INT,
    IN p_PORTADA LONGBLOB,
    IN p_ID_PUBLICACION INT,
    IN p_DESCRIPCION VARCHAR(200),
    IN p_TIPO_IMG VARCHAR(50)
)
BEGIN
CASE p_opcion
        -- Opción 1: Registrar una publicación
        WHEN 1 THEN
            INSERT INTO tableros (
                ID_USUARIO, TITULO, PORTADA, DESCRIPCION, TIPO_IMG
            ) VALUES (
				p_ID_USUARIO, p_TITULO, p_PORTADA, p_DESCRIPCION, p_TIPO_IMG
            );
            SELECT TRUE AS correcto;
		
        -- obtener todos los tableros de un usuario
        WHEN 2 THEN
			SELECT
				ID_TABLERO,
				ID_USUARIO, 
                TITULO,
                PORTADA,
                DESCRIPCION,
                TIPO_IMG
			FROM tableros
            WHERE ID_USUARIO = p_ID_USUARIO;
            
            
            -- guardar publicacion en tablero
		WHEN 3 THEN
            INSERT INTO tablero_detalle (
                ID_TABLERO, ID_PUBLICACION
            ) VALUES (
				p_ID_TABLERO, p_ID_PUBLICACION
            );
            SELECT TRUE AS correcto;
            
            -- obtener publicaciones del tablero
		WHEN 4 THEN
			SELECT 
				a.ID_TABLERO,
                b.ID_PUBLICACION,
                b.DESCRIPCION,
                b.ID_USUARIO,
                b.CATEGORIA,
                b.ESTATUS,
                b.FECHA_CREACION,
                b.CONTADOR_LIKES,
                b.RUTA_VIDEO,
                b.TIPO_IMG,
                b.IMAGEN
			FROM tablero_detalle a
            JOIN publicaciones b
            ON a.ID_PUBLICACION = b.ID_PUBLICACION
            WHERE a.ID_TABLERO = p_ID_TABLERO;
            
            -- verifica si una publicacion esta guardada por el usuario
		WHEN 5 THEN
			SELECT
				a.ID_PUBLICACION,
                b.ID_USUARIO
			FROM tablero_detalle a
            JOIN tableros b
            ON a.ID_TABLERO = b.ID_TABLERO
            WHERE a.ID_PUBLICACION = p_ID_PUBLICACION
            AND b.ID_USUARIO = p_ID_USUARIO;
            
		WHEN 6 THEN
			DELETE td
			FROM tablero_detalle td
			JOIN tableros t ON td.ID_TABLERO = t.ID_TABLERO
			WHERE t.ID_USUARIO = p_ID_USUARIO AND td.ID_PUBLICACION = p_ID_PUBLICACION;
            SELECT TRUE AS correcto;
		
        WHEN 7 THEN
			SELECT 
				ID_TABLERO,
				ID_USUARIO,
				TITULO,
				DESCRIPCION,
				PORTADA,
				TIPO_IMG
			FROM tableros
            WHERE ID_TABLERO = p_ID_TABLERO;
        
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
/*!50003 DROP PROCEDURE IF EXISTS `sp_usuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usuario`(
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
    IN P_TIPO_IMG VARCHAR(50),
    IN p_ID_SEGUIDO INT
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
				TIPO_IMG,
                SEGUIDORES,
                SEGUIDOS,
                PUBLICACIONES
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
            
		WHEN 7 THEN -- PUBLICO
			INSERT INTO seguidores (ID_USUARIO_SEGUIDO, ID_USUARIO_SEGUIDOR,ESTATUS)
            VALUES (p_ID_SEGUIDO, p_ID_USUARIO, 1);
            SELECT TRUE AS correcto;
            
		WHEN 8 THEN -- CUALQUIERA
			DELETE FROM seguidores
				WHERE ID_USUARIO_SEGUIDO = p_ID_SEGUIDO
				AND ID_USUARIO_SEGUIDOR = p_ID_USUARIO;
			 SELECT TRUE AS correcto;
            
		WHEN 9 THEN -- VERIFICA SI LO SIGUES
			SELECT
				ID_USUARIO_SEGUIDOR,
				ID_USUARIO_SEGUIDO
            FROM seguidores
            WHERE ID_USUARIO_SEGUIDO = p_ID_SEGUIDO
			AND ID_USUARIO_SEGUIDOR = p_ID_USUARIO
            AND ESTATUS = 1;
            
		WHEN 10 THEN -- VERIFICA SI LE DEJASTE UNA SOLICITUD DE AMISTAD
			SELECT
				ID_USUARIO_SEGUIDOR,
				ID_USUARIO_SEGUIDO
            FROM seguidores
            WHERE ID_USUARIO_SEGUIDO = p_ID_SEGUIDO
			AND ID_USUARIO_SEGUIDOR = p_ID_USUARIO
            AND ESTATUS = 0;
            
		WHEN 11 THEN -- SOLICITUDES DE AMISTAD CUANDO EL USUARIO ES PRIVADO Y LO QUIERS SEGUIR
			INSERT INTO seguidores (ID_USUARIO_SEGUIDO, ID_USUARIO_SEGUIDOR, ESTATUS)
            VALUES (p_ID_SEGUIDO, p_ID_USUARIO, 0);
            SELECT TRUE AS correcto;
            
		WHEN 12 THEN -- ACTUALIZAR EL REGISTRO CUANDO LA SOLICITUD SEA ACEPTADA
			UPDATE seguidores SET ESTATUS = 1 
            WHERE ID_USUARIO_SEGUIDO = p_ID_USUARIO
            AND ID_USUARIO_SEGUIDOR = p_ID_SEGUIDO;
            
		WHEN 13 THEN -- obtener todos los usuarios que te dejaron solicitud
			SELECT 
				a.ID_USUARIO,
				a.NOMBRE,
				a.APELLIDO_PATERNO,
				a.APELLIDO_MATERNO,
				a.CORREO,
				a.FECHA_NACIMINENTO,
				a.SEXO,
				a.USERNAME,
				a.`PASSWORD`,
				a.FOTO_PERFIL,
				a.ESTATUS,
				a.PRIVACIDAD,
				a.FECHA_REGISTRO,
				a.TIPO_IMG,
				a.SEGUIDORES,
				a.SEGUIDOS,
				a.PUBLICACIONES
			FROM usuarios a
			JOIN seguidores b
				ON a.ID_USUARIO = b.ID_USUARIO_SEGUIDOR
			WHERE b.ID_USUARIO_SEGUIDO = p_ID_USUARIO
            AND b.ESTATUS = 0;
            
		WHEN 14 THEN  
			SELECT -- SEGUIDORES
				a.ID_USUARIO,
				a.NOMBRE,
				a.APELLIDO_PATERNO,
				a.APELLIDO_MATERNO,
				a.CORREO,
				a.FECHA_NACIMINENTO,
				a.SEXO,
				a.USERNAME,
				a.`PASSWORD`,
				a.FOTO_PERFIL,
				a.ESTATUS,
				a.PRIVACIDAD,
				a.FECHA_REGISTRO,
				a.TIPO_IMG,
				a.SEGUIDORES,
				a.SEGUIDOS,
				a.PUBLICACIONES
			FROM usuarios a
			JOIN seguidores b
				ON a.ID_USUARIO = b.ID_USUARIO_SEGUIDOR
			WHERE b.ID_USUARIO_SEGUIDO = p_ID_USUARIO
            AND b.ESTATUS = 1;
            
		WHEN 15 THEN   -- VER LISTA DE SEGUIDOS
			SELECT -- SEGUIDORES
				a.ID_USUARIO,
				a.NOMBRE,
				a.APELLIDO_PATERNO,
				a.APELLIDO_MATERNO,
				a.CORREO,
				a.FECHA_NACIMINENTO,
				a.SEXO,
				a.USERNAME,
				a.`PASSWORD`,
				a.FOTO_PERFIL,
				a.ESTATUS,
				a.PRIVACIDAD,
				a.FECHA_REGISTRO,
				a.TIPO_IMG,
				a.SEGUIDORES,
				a.SEGUIDOS,
				a.PUBLICACIONES
			FROM usuarios a
			JOIN seguidores b
				ON a.ID_USUARIO = b.ID_USUARIO_SEGUIDO
			WHERE b.ID_USUARIO_SEGUIDOR = p_ID_USUARIO
            AND b.ESTATUS = 1;
		
        WHEN 16 THEN -- RECHAZAR SOLICITUDES
			DELETE FROM seguidores
            WHERE ID_USUARIO_SEGUIDO = p_ID_USUARIO
				AND ID_USUARIO_SEGUIDOR = p_ID_SEGUIDO;
			 SELECT TRUE AS correcto;
            
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

-- Dump completed on 2025-04-20 19:13:00
