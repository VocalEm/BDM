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
-- Table structure for table `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comentarios` (
  `ID_COMENTARIO` int NOT NULL,
  `ID_USUARIO` int NOT NULL,
  `COMENTARIO` varchar(100) NOT NULL,
  `ID_PUBLIACION` int NOT NULL,
  PRIMARY KEY (`ID_COMENTARIO`),
  KEY `ID_PUBLICACION_COMENTARIO_idx` (`ID_PUBLIACION`),
  KEY `ID_PUBLICACION_USUARIO_idx` (`ID_USUARIO`),
  CONSTRAINT `ID_PUBLICACION_COMENTARIO` FOREIGN KEY (`ID_PUBLIACION`) REFERENCES `publicaciones` (`ID_PUBLICACION`),
  CONSTRAINT `ID_PUBLICACION_USUARIO` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuarios` (`ID_USUARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='				';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `multimedia`
--

DROP TABLE IF EXISTS `multimedia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `multimedia` (
  `ID_MULTIMEDIA` int NOT NULL,
  `RUTA_VIDEO` varchar(255) NOT NULL,
  `FOTO` tinyblob NOT NULL,
  PRIMARY KEY (`ID_MULTIMEDIA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
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
  `ID_MULTIMEDIA` int NOT NULL,
  `ID_USUARIO` int NOT NULL,
  `CATEGORIA` varchar(50) NOT NULL,
  `ESTATUS` tinyint NOT NULL,
  `FECHA_CREACION` datetime NOT NULL,
  `CONTADOR_LIKES` int NOT NULL,
  PRIMARY KEY (`ID_PUBLICACION`),
  KEY `ID_MULTIMEDIA_PUBLICACION_idx` (`ID_MULTIMEDIA`),
  KEY `ID_USUARIO_PUBLICACION_idx` (`ID_USUARIO`),
  CONSTRAINT `ID_MULTIMEDIA_PUBLICACION` FOREIGN KEY (`ID_MULTIMEDIA`) REFERENCES `multimedia` (`ID_MULTIMEDIA`),
  CONSTRAINT `ID_USUARIO_PUBLICACION` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuarios` (`ID_USUARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `reacciones`
--

DROP TABLE IF EXISTS `reacciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reacciones` (
  `ID_REACCION` int NOT NULL,
  `ID_USUARIO` int NOT NULL,
  `ID_PUBLICACION` int NOT NULL,
  PRIMARY KEY (`ID_REACCION`),
  KEY `ID_REACCION_USUARIO_idx` (`ID_USUARIO`),
  KEY `ID_REACCION_PUBLICACION_idx` (`ID_PUBLICACION`),
  CONSTRAINT `ID_REACCION_PUBLICACION` FOREIGN KEY (`ID_PUBLICACION`) REFERENCES `publicaciones` (`ID_PUBLICACION`),
  CONSTRAINT `ID_REACCION_USUARIO` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuarios` (`ID_USUARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `seguidores`
--

DROP TABLE IF EXISTS `seguidores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `seguidores` (
  `ID_SEGUIDOR` int NOT NULL,
  `ID_USUARIO_SEGUIDO` int NOT NULL,
  `ID_USUARIO_SEGUIDOR` int NOT NULL,
  PRIMARY KEY (`ID_SEGUIDOR`),
  KEY `ID_USUARIOS_SEGUDIOR_idx` (`ID_USUARIO_SEGUIDOR`),
  KEY `ID_USUARIO_SEGUDIO_idx` (`ID_USUARIO_SEGUIDO`),
  CONSTRAINT `ID_USUARIO_SEGUDIO` FOREIGN KEY (`ID_USUARIO_SEGUIDO`) REFERENCES `usuarios` (`ID_USUARIO`),
  CONSTRAINT `ID_USUARIOS_SEGUDIOR` FOREIGN KEY (`ID_USUARIO_SEGUIDOR`) REFERENCES `usuarios` (`ID_USUARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
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
  PRIMARY KEY (`ID_TABLERO`),
  KEY `ID_USUARIO_TABLERO_idx` (`ID_USUARIO`),
  CONSTRAINT `ID_USUARIO_TABLERO` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuarios` (`ID_USUARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
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
  PRIMARY KEY (`ID_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-02  9:24:07
