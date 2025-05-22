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
  `ID_CATEGORIA` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador único de la categoría. DOM: del 0 a 2,147,483,647',
  `NOMBRE` varchar(50) NOT NULL COMMENT 'Nombre descriptivo de la categoría. DOM: 1 a 50 caracteres',
  PRIMARY KEY (`ID_CATEGORIA`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comentarios` (
  `ID_COMENTARIO` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador único del comentario. DOM: del 0 a 2,147,483,647',
  `ID_USUARIO` int NOT NULL COMMENT 'Identificador del usuario que comentó. DOM: del 0 a 2,147,483,647',
  `COMENTARIO` varchar(100) NOT NULL COMMENT 'Texto del comentario. DOM: 1 a 100 caracteres',
  `ID_PUBLICACION` int NOT NULL COMMENT 'Identificador de la publicación relacionada. DOM: del 0 a 2,147,483,647',
  PRIMARY KEY (`ID_COMENTARIO`),
  KEY `ID_PUBLICACION_PUBLICACION_idx` (`ID_PUBLICACION`),
  KEY `ID_USUARIO_COMENTARIOS_idx` (`ID_USUARIO`),
  CONSTRAINT `ID_PUBLICACION_COMENTARIOS` FOREIGN KEY (`ID_PUBLICACION`) REFERENCES `publicaciones` (`ID_PUBLICACION`),
  CONSTRAINT `ID_USUARIO_COMENTARIOS` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuarios` (`ID_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='				';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `comentarios_usuarios`
--

DROP TABLE IF EXISTS `comentarios_usuarios`;
/*!50001 DROP VIEW IF EXISTS `comentarios_usuarios`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `comentarios_usuarios` AS SELECT 
 1 AS `ID_COMENTARIO`,
 1 AS `ID_USUARIO`,
 1 AS `COMENTARIO`,
 1 AS `ID_PUBLICACION`,
 1 AS `FOTO_PERFIL`,
 1 AS `TIPO_IMG`,
 1 AS `USERNAME`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `login`
--

DROP TABLE IF EXISTS `login`;
/*!50001 DROP VIEW IF EXISTS `login`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `login` AS SELECT 
 1 AS `ID_USUARIO`,
 1 AS `NOMBRE`,
 1 AS `APELLIDO_PATERNO`,
 1 AS `APELLIDO_MATERNO`,
 1 AS `CORREO`,
 1 AS `PASSWORD`,
 1 AS `USERNAME`,
 1 AS `ESTATUS`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `obtener_solicitudes`
--

DROP TABLE IF EXISTS `obtener_solicitudes`;
/*!50001 DROP VIEW IF EXISTS `obtener_solicitudes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `obtener_solicitudes` AS SELECT 
 1 AS `ID_USUARIO`,
 1 AS `NOMBRE`,
 1 AS `APELLIDO_PATERNO`,
 1 AS `APELLIDO_MATERNO`,
 1 AS `CORREO`,
 1 AS `FECHA_NACIMINENTO`,
 1 AS `SEXO`,
 1 AS `USERNAME`,
 1 AS `PASSWORD`,
 1 AS `FOTO_PERFIL`,
 1 AS `ESTATUS`,
 1 AS `PRIVACIDAD`,
 1 AS `FECHA_REGISTRO`,
 1 AS `TIPO_IMG`,
 1 AS `SEGUIDORES`,
 1 AS `SEGUIDOS`,
 1 AS `PUBLICACIONES`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `publicacion_especifica`
--

DROP TABLE IF EXISTS `publicacion_especifica`;
/*!50001 DROP VIEW IF EXISTS `publicacion_especifica`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `publicacion_especifica` AS SELECT 
 1 AS `ID_PUBLICACION`,
 1 AS `DESCRIPCION`,
 1 AS `ID_USUARIO`,
 1 AS `CATEGORIA`,
 1 AS `ESTATUS`,
 1 AS `FECHA_CREACION`,
 1 AS `CONTADOR_LIKES`,
 1 AS `RUTA_VIDEO`,
 1 AS `TIPO_IMG`,
 1 AS `IMAGEN`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `publicaciones`
--

DROP TABLE IF EXISTS `publicaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `publicaciones` (
  `ID_PUBLICACION` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador único de la publicación. DOM: del 0 a 2,147,483,647',
  `DESCRIPCION` varchar(200) NOT NULL COMMENT 'Descripción del contenido de la publicación. DOM: 1 a 200 caracteres',
  `ID_USUARIO` int NOT NULL COMMENT 'Identificador del usuario que creó la publicación. DOM: del 0 a 2,147,483,647',
  `CATEGORIA` varchar(50) NOT NULL COMMENT 'Categoría de la publicación. DOM: 1 a 50 caracteres',
  `ESTATUS` tinyint NOT NULL COMMENT 'Estatus de la publicación (1: Activa, 0: Inactiva). DOM: del 0 a 255',
  `FECHA_CREACION` timestamp NOT NULL COMMENT 'Fecha y hora de creación. DOM: del 1970-01-01 00:00:01 UTC al 2038-01-19 03:14:07 UTC',
  `CONTADOR_LIKES` int NOT NULL COMMENT 'Número de likes recibidos. DOM: del 0 a 2,147,483,647',
  `IMAGEN` longblob NOT NULL COMMENT 'Imagen asociada a la publicación. DOM: hasta 4 GB',
  `TIPO_IMG` varchar(50) NOT NULL COMMENT 'Tipo de imagen. DOM: 1 a 50 caracteres',
  `RUTA_VIDEO` varchar(255) NOT NULL COMMENT 'Ruta del video asociado. DOM: 1 a 255 caracteres',
  PRIMARY KEY (`ID_PUBLICACION`),
  KEY `ID_USUARIO_PUBLICACION_idx` (`ID_USUARIO`),
  CONSTRAINT `ID_USUARIO_PUBLICACION` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuarios` (`ID_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
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
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `publicaciones_AFTER_UPDATE` AFTER UPDATE ON `publicaciones` FOR EACH ROW BEGIN
    -- Verifica si la actualización cambió el estatus a 0
    IF NEW.ESTATUS = 0 AND OLD.ESTATUS <> 0 THEN
        UPDATE usuarios
		SET PUBLICACIONES = CASE WHEN PUBLICACIONES > 0 THEN PUBLICACIONES - 1 ELSE 0 END
		WHERE ID_USUARIO = NEW.ID_USUARIO;
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Temporary view structure for view `publicaciones_tablero`
--

DROP TABLE IF EXISTS `publicaciones_tablero`;
/*!50001 DROP VIEW IF EXISTS `publicaciones_tablero`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `publicaciones_tablero` AS SELECT 
 1 AS `ID_TABLERO`,
 1 AS `ID_PUBLICACION`,
 1 AS `DESCRIPCION`,
 1 AS `ID_USUARIO`,
 1 AS `CATEGORIA`,
 1 AS `ESTATUS`,
 1 AS `FECHA_CREACION`,
 1 AS `CONTADOR_LIKES`,
 1 AS `RUTA_VIDEO`,
 1 AS `TIPO_IMG`,
 1 AS `IMAGEN`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `reacciones`
--

DROP TABLE IF EXISTS `reacciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reacciones` (
  `ID_REACCION` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador único de la reacción. DOM: del 0 a 2,147,483,647',
  `ID_USUARIO` int NOT NULL COMMENT 'Identificador del usuario que reaccionó. DOM: del 0 a 2,147,483,647',
  `ID_PUBLICACION` int NOT NULL COMMENT 'Identificador de la publicación reaccionada. DOM: del 0 a 2,147,483,647',
  PRIMARY KEY (`ID_REACCION`),
  KEY `ID_PUBLICACION_REACCIONES_idx` (`ID_PUBLICACION`),
  KEY `ID_USUARIOS_REACCIONES_idx` (`ID_USUARIO`),
  CONSTRAINT `ID_PUBLICACION_REACCIONES` FOREIGN KEY (`ID_PUBLICACION`) REFERENCES `publicaciones` (`ID_PUBLICACION`),
  CONSTRAINT `ID_USUARIOS_REACCIONES` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuarios` (`ID_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
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
  `ID_SEGUIDOR` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador único del seguidor. DOM: del 0 a 2,147,483,647',
  `ID_USUARIO_SEGUIDO` int NOT NULL COMMENT 'Usuario seguido. DOM: del 0 a 2,147,483,647',
  `ID_USUARIO_SEGUIDOR` int NOT NULL COMMENT 'Usuario seguidor. DOM: del 0 a 2,147,483,647',
  `ESTATUS` tinyint NOT NULL COMMENT 'Estatus de seguimiento (0: Pendiente, 1: Aceptado). DOM: del 0 a 255',
  PRIMARY KEY (`ID_SEGUIDOR`),
  KEY `ID_SEGUIDO_SEGUIDORES_idx` (`ID_USUARIO_SEGUIDO`),
  KEY `ID_SEGUIDOR_SEGUIDORES_idx` (`ID_USUARIO_SEGUIDOR`),
  CONSTRAINT `ID_SEGUIDO_SEGUIDORES` FOREIGN KEY (`ID_USUARIO_SEGUIDO`) REFERENCES `usuarios` (`ID_USUARIO`),
  CONSTRAINT `ID_SEGUIDOR_SEGUIDORES` FOREIGN KEY (`ID_USUARIO_SEGUIDOR`) REFERENCES `usuarios` (`ID_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
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
-- Temporary view structure for view `seguidores_usuarios`
--

DROP TABLE IF EXISTS `seguidores_usuarios`;
/*!50001 DROP VIEW IF EXISTS `seguidores_usuarios`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `seguidores_usuarios` AS SELECT 
 1 AS `ID_USUARIO`,
 1 AS `NOMBRE`,
 1 AS `APELLIDO_PATERNO`,
 1 AS `APELLIDO_MATERNO`,
 1 AS `CORREO`,
 1 AS `FECHA_NACIMINENTO`,
 1 AS `SEXO`,
 1 AS `USERNAME`,
 1 AS `PASSWORD`,
 1 AS `FOTO_PERFIL`,
 1 AS `ESTATUS`,
 1 AS `PRIVACIDAD`,
 1 AS `FECHA_REGISTRO`,
 1 AS `TIPO_IMG`,
 1 AS `SEGUIDORES`,
 1 AS `SEGUIDOS`,
 1 AS `PUBLICACIONES`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `seguidos_usuarios`
--

DROP TABLE IF EXISTS `seguidos_usuarios`;
/*!50001 DROP VIEW IF EXISTS `seguidos_usuarios`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `seguidos_usuarios` AS SELECT 
 1 AS `ID_USUARIO`,
 1 AS `NOMBRE`,
 1 AS `APELLIDO_PATERNO`,
 1 AS `APELLIDO_MATERNO`,
 1 AS `CORREO`,
 1 AS `FECHA_NACIMINENTO`,
 1 AS `SEXO`,
 1 AS `USERNAME`,
 1 AS `PASSWORD`,
 1 AS `FOTO_PERFIL`,
 1 AS `ESTATUS`,
 1 AS `PRIVACIDAD`,
 1 AS `FECHA_REGISTRO`,
 1 AS `TIPO_IMG`,
 1 AS `SEGUIDORES`,
 1 AS `SEGUIDOS`,
 1 AS `PUBLICACIONES`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `tablero_detalle`
--

DROP TABLE IF EXISTS `tablero_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tablero_detalle` (
  `ID_DETALLE` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador único del detalle del tablero. DOM: del 0 a 2,147,483,647',
  `ID_TABLERO` int NOT NULL COMMENT 'Identificador del tablero. DOM: del 0 a 2,147,483,647',
  `ID_PUBLICACION` int NOT NULL COMMENT 'Identificador de la publicación en el tablero. DOM: del 0 a 2,147,483,647',
  PRIMARY KEY (`ID_DETALLE`),
  KEY `ID_TABLERO_DETALLE_idx` (`ID_TABLERO`),
  KEY `ID_PUBLICACION_DETALLE_idx` (`ID_PUBLICACION`),
  CONSTRAINT `ID_PUBLICACION_DETALLE` FOREIGN KEY (`ID_PUBLICACION`) REFERENCES `publicaciones` (`ID_PUBLICACION`),
  CONSTRAINT `ID_TABLERO_DETALLE` FOREIGN KEY (`ID_TABLERO`) REFERENCES `tableros` (`ID_TABLERO`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tableros`
--

DROP TABLE IF EXISTS `tableros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tableros` (
  `ID_TABLERO` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador único del tablero. DOM: del 0 a 2,147,483,647',
  `ID_USUARIO` int NOT NULL COMMENT 'Identificador del usuario que creó el tablero. DOM: del 0 a 2,147,483,647',
  `TITULO` varchar(80) NOT NULL COMMENT 'Título del tablero. DOM: 1 a 80 caracteres',
  `PORTADA` longblob NOT NULL COMMENT 'Portada del tablero. DOM: hasta 4 GB',
  `DESCRIPCION` varchar(200) NOT NULL COMMENT 'Descripción del tablero. DOM: 1 a 200 caracteres',
  `TIPO_IMG` varchar(50) NOT NULL COMMENT 'Tipo de imagen de la portada. DOM: 1 a 50 caracteres',
  PRIMARY KEY (`ID_TABLERO`),
  KEY `ID_USUARIO_TABLERO_idx` (`ID_USUARIO`),
  CONSTRAINT `ID_USUARIO_TABLERO` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuarios` (`ID_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `ID_USUARIO` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador único del usuario. DOM: del 0 a 2,147,483,647',
  `NOMBRE` varchar(50) NOT NULL COMMENT 'Nombre del usuario. DOM: 1 a 50 caracteres',
  `APELLIDO_PATERNO` varchar(50) NOT NULL COMMENT 'Apellido paterno del usuario. DOM: 1 a 50 caracteres',
  `APELLIDO_MATERNO` varchar(50) NOT NULL COMMENT 'Apellido materno del usuario. DOM: 1 a 50 caracteres',
  `CORREO` varchar(80) NOT NULL COMMENT 'Correo electrónico del usuario. DOM: 1 a 80 caracteres',
  `FECHA_NACIMINENTO` date NOT NULL COMMENT 'Fecha de nacimiento del usuario. DOM: del 1000-01-01 al 9999-12-31',
  `SEXO` tinyint NOT NULL COMMENT 'Sexo del usuario (1: Masculino, 2: Femenino). DOM: del 0 a 255',
  `USERNAME` varchar(50) NOT NULL COMMENT 'Nombre de usuario. DOM: 1 a 50 caracteres',
  `PASSWORD` varchar(60) NOT NULL COMMENT 'Contraseña encriptada. DOM: 1 a 60 caracteres',
  `FOTO_PERFIL` longblob NOT NULL COMMENT 'Foto de perfil del usuario. DOM: hasta 4 GB',
  `ESTATUS` tinyint NOT NULL COMMENT 'Estatus del usuario (1: Activo, 0: Inactivo). DOM: del 0 a 255',
  `PRIVACIDAD` tinyint NOT NULL COMMENT 'Nivel de privacidad (1: Público, 0: Privado). DOM: del 0 a 255',
  `FECHA_REGISTRO` datetime NOT NULL COMMENT 'Fecha y hora de registro. DOM: del 1000-01-01 00:00:00 al 9999-12-31 23:59:59',
  `TIPO_IMG` varchar(50) NOT NULL COMMENT 'Tipo de imagen de la foto de perfil. DOM: 1 a 50 caracteres',
  `SEGUIDORES` int NOT NULL DEFAULT '0' COMMENT 'Número de seguidores. DOM: del 0 a 2,147,483,647',
  `SEGUIDOS` int NOT NULL DEFAULT '0' COMMENT 'Número de seguidos. DOM: del 0 a 2,147,483,647',
  `PUBLICACIONES` int NOT NULL DEFAULT '0' COMMENT 'Número de publicaciones creadas. DOM: del 0 a 2,147,483,647',
  PRIMARY KEY (`ID_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `verifica_guardado`
--

DROP TABLE IF EXISTS `verifica_guardado`;
/*!50001 DROP VIEW IF EXISTS `verifica_guardado`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `verifica_guardado` AS SELECT 
 1 AS `ID_PUBLICACION`,
 1 AS `ID_USUARIO`*/;
SET character_set_client = @saved_cs_client;

--
-- Dumping events for database 'bdm'
--

--
-- Dumping routines for database 'bdm'
--
/*!50003 DROP FUNCTION IF EXISTS `DEJASTE_SOLICITUD` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `DEJASTE_SOLICITUD`(p_ID_SEGUIDO INT, p_ID_USUARIO INT) RETURNS int
    DETERMINISTIC
BEGIN
  DECLARE resultado INT;

    SELECT COUNT(*) INTO resultado
    FROM seguidores
    WHERE ID_USUARIO_SEGUIDO = p_ID_SEGUIDO
      AND ID_USUARIO_SEGUIDOR = p_ID_USUARIO
      AND ESTATUS = 0;

    IF resultado > 0 THEN
        RETURN 1;
    ELSE
        RETURN 0;
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `LOSIGUES` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `LOSIGUES`(p_ID_SEGUIDO INT, p_ID_USUARIO INT) RETURNS int
    DETERMINISTIC
BEGIN
    DECLARE resultado INT;

    SELECT COUNT(*) INTO resultado
    FROM seguidores
    WHERE ID_USUARIO_SEGUIDO = p_ID_SEGUIDO
      AND ID_USUARIO_SEGUIDOR = p_ID_USUARIO
      AND ESTATUS = 1;

    IF resultado > 0 THEN
        RETURN 1;
    ELSE
        RETURN 0;
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
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
            SET ESTATUS = 0, CONTADOR_LIKES = 0
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
            FROM PUBLICACION_ESPECIFICA
            WHERE 
            ID_PUBLICACION = p_ID_PUBLICACION;

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
            FROM publicaciones
			WHERE ESTATUS = 1 ;
        
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
			WHERE ESTATUS = 1 AND
            ID_USUARIO = p_ID_USUARIO;
            
		WHEN 8 THEN -- opcion 8 crea un comentario
			INSERT INTO comentarios
            (
                ID_USUARIO, COMENTARIO, ID_PUBLICACION
            ) VALUES (
                p_ID_USUARIO, p_DESCRIPCION, p_ID_PUBLICACION
            );
            SELECT TRUE AS correcto;
		
        WHEN 9 THEN -- opcion 9 MUESTRA COMENTARIOS CON INFO DE USUARIO -- view
			SELECT
				ID_COMENTARIO,
                ID_USUARIO,
                COMENTARIO,
                ID_PUBLICACION, 
                FOTO_PERFIL,
                TIPO_IMG,
                USERNAME
			FROM COMENTARIOS_USUARIOS
            WHERE ID_PUBLICACION = p_ID_PUBLICACION;
            
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
            WHERE ESTATUS = 1 AND CATEGORIA = p_CATEGORIA;
            
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
            WHERE ESTATUS = 1 AND DESCRIPCION LIKE CONCAT('%', p_DESCRIPCION, '%');
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
				ID_TABLERO,
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
			FROM PUBLICACIONES_TABLERO 
            WHERE ID_TABLERO = p_ID_TABLERO;
            
            -- verifica si una publicacion esta guardada por el usuario
		WHEN 5 THEN
			SELECT
				ID_PUBLICACION,
                ID_USUARIO
			FROM VERIFICA_GUARDADO
            WHERE ID_PUBLICACION = p_ID_PUBLICACION
            AND ID_USUARIO = p_ID_USUARIO;
            
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
            UPDATE publicaciones
            SET ESTATUS = 0, CONTADOR_LIKES = 0
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
            FROM LOGIN
            WHERE CORREO = p_CORREO;
            
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
			SELECT LOSIGUES(p_ID_SEGUIDO,p_ID_USUARIO) as ISSEGUIDO;
            
		WHEN 10 THEN -- VERIFICA SI LE DEJASTE UNA SOLICITUD DE AMISTAD
			SELECT DEJASTE_SOLICITUD(p_ID_SEGUIDO,p_ID_USUARIO) as ISSOLICITUD;
            
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
			FROM OBTENER_SOLICITUDES
			WHERE ID_USUARIO_SEGUIDO = p_ID_USUARIO;
            
		WHEN 14 THEN  
			SELECT -- SEGUIDORES
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
			FROM  SEGUIDORES_USUARIOS
			WHERE b.ID_USUARIO_SEGUIDO = p_ID_USUARIO;
            
		WHEN 15 THEN   -- VER LISTA DE SEGUIDOS
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
			FROM SEGUIDOS_USUARIOS
			WHERE ID_USUARIO_SEGUIDOR = p_ID_USUARIO;
		
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

--
-- Final view structure for view `comentarios_usuarios`
--

/*!50001 DROP VIEW IF EXISTS `comentarios_usuarios`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `comentarios_usuarios` AS select `a`.`ID_COMENTARIO` AS `ID_COMENTARIO`,`a`.`ID_USUARIO` AS `ID_USUARIO`,`a`.`COMENTARIO` AS `COMENTARIO`,`a`.`ID_PUBLICACION` AS `ID_PUBLICACION`,`b`.`FOTO_PERFIL` AS `FOTO_PERFIL`,`b`.`TIPO_IMG` AS `TIPO_IMG`,`b`.`USERNAME` AS `USERNAME` from (`comentarios` `a` join `usuarios` `b` on((`a`.`ID_USUARIO` = `b`.`ID_USUARIO`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `login`
--

/*!50001 DROP VIEW IF EXISTS `login`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `login` AS select `usuarios`.`ID_USUARIO` AS `ID_USUARIO`,`usuarios`.`NOMBRE` AS `NOMBRE`,`usuarios`.`APELLIDO_PATERNO` AS `APELLIDO_PATERNO`,`usuarios`.`APELLIDO_MATERNO` AS `APELLIDO_MATERNO`,`usuarios`.`CORREO` AS `CORREO`,`usuarios`.`PASSWORD` AS `PASSWORD`,`usuarios`.`USERNAME` AS `USERNAME`,`usuarios`.`ESTATUS` AS `ESTATUS` from `usuarios` where (`usuarios`.`ESTATUS` = 1) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `obtener_solicitudes`
--

/*!50001 DROP VIEW IF EXISTS `obtener_solicitudes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `obtener_solicitudes` AS select `a`.`ID_USUARIO` AS `ID_USUARIO`,`a`.`NOMBRE` AS `NOMBRE`,`a`.`APELLIDO_PATERNO` AS `APELLIDO_PATERNO`,`a`.`APELLIDO_MATERNO` AS `APELLIDO_MATERNO`,`a`.`CORREO` AS `CORREO`,`a`.`FECHA_NACIMINENTO` AS `FECHA_NACIMINENTO`,`a`.`SEXO` AS `SEXO`,`a`.`USERNAME` AS `USERNAME`,`a`.`PASSWORD` AS `PASSWORD`,`a`.`FOTO_PERFIL` AS `FOTO_PERFIL`,`a`.`ESTATUS` AS `ESTATUS`,`a`.`PRIVACIDAD` AS `PRIVACIDAD`,`a`.`FECHA_REGISTRO` AS `FECHA_REGISTRO`,`a`.`TIPO_IMG` AS `TIPO_IMG`,`a`.`SEGUIDORES` AS `SEGUIDORES`,`a`.`SEGUIDOS` AS `SEGUIDOS`,`a`.`PUBLICACIONES` AS `PUBLICACIONES` from (`usuarios` `a` join `seguidores` `b` on((`a`.`ID_USUARIO` = `b`.`ID_USUARIO_SEGUIDOR`))) where (`b`.`ESTATUS` = 0) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `publicacion_especifica`
--

/*!50001 DROP VIEW IF EXISTS `publicacion_especifica`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `publicacion_especifica` AS select `publicaciones`.`ID_PUBLICACION` AS `ID_PUBLICACION`,`publicaciones`.`DESCRIPCION` AS `DESCRIPCION`,`publicaciones`.`ID_USUARIO` AS `ID_USUARIO`,`publicaciones`.`CATEGORIA` AS `CATEGORIA`,`publicaciones`.`ESTATUS` AS `ESTATUS`,`publicaciones`.`FECHA_CREACION` AS `FECHA_CREACION`,`publicaciones`.`CONTADOR_LIKES` AS `CONTADOR_LIKES`,`publicaciones`.`RUTA_VIDEO` AS `RUTA_VIDEO`,`publicaciones`.`TIPO_IMG` AS `TIPO_IMG`,`publicaciones`.`IMAGEN` AS `IMAGEN` from `publicaciones` where (`publicaciones`.`ESTATUS` = 1) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `publicaciones_tablero`
--

/*!50001 DROP VIEW IF EXISTS `publicaciones_tablero`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `publicaciones_tablero` AS select `a`.`ID_TABLERO` AS `ID_TABLERO`,`b`.`ID_PUBLICACION` AS `ID_PUBLICACION`,`b`.`DESCRIPCION` AS `DESCRIPCION`,`b`.`ID_USUARIO` AS `ID_USUARIO`,`b`.`CATEGORIA` AS `CATEGORIA`,`b`.`ESTATUS` AS `ESTATUS`,`b`.`FECHA_CREACION` AS `FECHA_CREACION`,`b`.`CONTADOR_LIKES` AS `CONTADOR_LIKES`,`b`.`RUTA_VIDEO` AS `RUTA_VIDEO`,`b`.`TIPO_IMG` AS `TIPO_IMG`,`b`.`IMAGEN` AS `IMAGEN` from (`tablero_detalle` `a` join `publicaciones` `b` on((`a`.`ID_PUBLICACION` = `b`.`ID_PUBLICACION`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `seguidores_usuarios`
--

/*!50001 DROP VIEW IF EXISTS `seguidores_usuarios`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `seguidores_usuarios` AS select `a`.`ID_USUARIO` AS `ID_USUARIO`,`a`.`NOMBRE` AS `NOMBRE`,`a`.`APELLIDO_PATERNO` AS `APELLIDO_PATERNO`,`a`.`APELLIDO_MATERNO` AS `APELLIDO_MATERNO`,`a`.`CORREO` AS `CORREO`,`a`.`FECHA_NACIMINENTO` AS `FECHA_NACIMINENTO`,`a`.`SEXO` AS `SEXO`,`a`.`USERNAME` AS `USERNAME`,`a`.`PASSWORD` AS `PASSWORD`,`a`.`FOTO_PERFIL` AS `FOTO_PERFIL`,`a`.`ESTATUS` AS `ESTATUS`,`a`.`PRIVACIDAD` AS `PRIVACIDAD`,`a`.`FECHA_REGISTRO` AS `FECHA_REGISTRO`,`a`.`TIPO_IMG` AS `TIPO_IMG`,`a`.`SEGUIDORES` AS `SEGUIDORES`,`a`.`SEGUIDOS` AS `SEGUIDOS`,`a`.`PUBLICACIONES` AS `PUBLICACIONES` from (`usuarios` `a` join `seguidores` `b` on((`a`.`ID_USUARIO` = `b`.`ID_USUARIO_SEGUIDOR`))) where (`b`.`ESTATUS` = 1) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `seguidos_usuarios`
--

/*!50001 DROP VIEW IF EXISTS `seguidos_usuarios`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `seguidos_usuarios` AS select `a`.`ID_USUARIO` AS `ID_USUARIO`,`a`.`NOMBRE` AS `NOMBRE`,`a`.`APELLIDO_PATERNO` AS `APELLIDO_PATERNO`,`a`.`APELLIDO_MATERNO` AS `APELLIDO_MATERNO`,`a`.`CORREO` AS `CORREO`,`a`.`FECHA_NACIMINENTO` AS `FECHA_NACIMINENTO`,`a`.`SEXO` AS `SEXO`,`a`.`USERNAME` AS `USERNAME`,`a`.`PASSWORD` AS `PASSWORD`,`a`.`FOTO_PERFIL` AS `FOTO_PERFIL`,`a`.`ESTATUS` AS `ESTATUS`,`a`.`PRIVACIDAD` AS `PRIVACIDAD`,`a`.`FECHA_REGISTRO` AS `FECHA_REGISTRO`,`a`.`TIPO_IMG` AS `TIPO_IMG`,`a`.`SEGUIDORES` AS `SEGUIDORES`,`a`.`SEGUIDOS` AS `SEGUIDOS`,`a`.`PUBLICACIONES` AS `PUBLICACIONES` from (`usuarios` `a` join `seguidores` `b` on((`a`.`ID_USUARIO` = `b`.`ID_USUARIO_SEGUIDO`))) where (`b`.`ESTATUS` = 1) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `verifica_guardado`
--

/*!50001 DROP VIEW IF EXISTS `verifica_guardado`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `verifica_guardado` AS select `a`.`ID_PUBLICACION` AS `ID_PUBLICACION`,`b`.`ID_USUARIO` AS `ID_USUARIO` from (`tablero_detalle` `a` join `tableros` `b` on((`a`.`ID_TABLERO` = `b`.`ID_TABLERO`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-05-14 17:46:30
