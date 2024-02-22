-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: entretenimentosss
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB

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
-- Table structure for table `avaliacoes`
--

DROP TABLE IF EXISTS `avaliacoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `avaliacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL COMMENT 'nome de quem fez a avaliação',
  `email` varchar(100) NOT NULL COMMENT 'email de quem fez a avaliação',
  `avaliacao` float NOT NULL COMMENT 'a avaliação deve ir de 1 a 5',
  `comentario` varchar(500) DEFAULT NULL,
  `data_avaliacao` datetime NOT NULL DEFAULT current_timestamp(),
  `id_listagem` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_listagem` (`id_listagem`),
  CONSTRAINT `avaliacoes_ibfk_1` FOREIGN KEY (`id_listagem`) REFERENCES `listagem` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avaliacoes`
--

LOCK TABLES `avaliacoes` WRITE;
/*!40000 ALTER TABLE `avaliacoes` DISABLE KEYS */;
INSERT INTO `avaliacoes` VALUES (1,'CORINGA','HAHAHA@GMAIL.COM',5,'A HISTORIA DE QUE PHP É FACIL, PARECE MENTIRA, MAS NÃO É, E NO FILME VEMOS ISSO CLARAMENTE. APROVEITEM O TEMPO...','2023-12-20 20:56:36',1),(2,'LORRANE','LORRANEVECANANDRIA@GMAIL.COM',4,'SÉRIE SOBRE MACACOS INTELIGENTES','2023-12-20 20:56:36',2),(3,'OPTMUS PRIME','TRANSFORMERS@GMAIL.COM',3,'A PREMISSA É HORRIVEL, MAS O FILME É BOM','2023-12-20 20:56:36',3),(4,'CO KERUM','COKERUM@GMAIL.COM',0,'ALGUMA COISA AI ','2023-12-26 18:23:11',4),(5,'ZERRA','ZERRA@gmail.com',1,'O FILME É LINDO!!!','2024-02-15 12:11:46',182),(6,'Calabr3so','gokuvegeta@gmail.com',5,'ICRÍVEL!!!!!','2024-02-15 13:57:25',182),(8,'Marcin primo do bil','marcin@gmail.com',4.9,'muito ruim esse filme, bixo. sou mais lagoa azul...','2024-02-15 17:23:43',182);
/*!40000 ALTER TABLE `avaliacoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `data_criacao` datetime DEFAULT current_timestamp(),
  `data_edicao` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'terror',NULL,'2023-12-20 20:56:36','2023-12-20 20:56:36'),(2,'Comédia',NULL,'2023-12-20 20:56:36','2023-12-20 20:56:36'),(3,'drama',NULL,'2023-12-20 20:56:36','2023-12-20 20:56:36');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `listagem`
--

DROP TABLE IF EXISTS `listagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `listagem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `faixa_etaria` enum('L','10','12','14','16','18') NOT NULL,
  `duracao` int(11) DEFAULT NULL,
  `diretor` varchar(255) NOT NULL,
  `lancamento` year(4) NOT NULL,
  `data_criacao` datetime DEFAULT current_timestamp(),
  `data_edicao` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_tipo` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tipo` (`id_tipo`),
  KEY `id_categoria` (`id_categoria`),
  CONSTRAINT `listagem_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipos_entretenimento` (`id`),
  CONSTRAINT `listagem_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=183 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `listagem`
--

LOCK TABLES `listagem` WRITE;
/*!40000 ALTER TABLE `listagem` DISABLE KEYS */;
INSERT INTO `listagem` VALUES (1,'JOAO E O PE DE PHP','18',160,'POPOZINHO FLAMENGUISTA',2021,'2023-12-20 20:56:36','2024-01-12 15:41:25',1,1),(2,'PLANETA DOS MACACOS','14',180,'POPOZINHO BOTAFOGUENSE',2022,'2023-12-20 20:56:36','2024-01-12 15:42:13',2,2),(3,'O VIDENTE','18',175,'JOAO DA MICROFONIA',2023,'2023-12-20 20:56:36','2024-01-12 15:42:13',3,3),(4,'OTUFILME','12',90,'HIPOCRATES',2024,'2023-12-26 18:22:09','2024-01-12 15:42:13',2,2),(181,'O Vento Levou','16',180,'Zerrai Mundo',1988,'2024-02-03 10:14:40','2024-02-03 10:14:40',1,1),(182,'Wonka','L',116,'Não sei',2023,'2024-02-08 19:35:31','2024-02-08 19:35:31',1,2);
/*!40000 ALTER TABLE `listagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_entretenimento`
--

DROP TABLE IF EXISTS `tipos_entretenimento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipos_entretenimento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `data_criacao` datetime DEFAULT current_timestamp(),
  `data_edicao` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_entretenimento`
--

LOCK TABLES `tipos_entretenimento` WRITE;
/*!40000 ALTER TABLE `tipos_entretenimento` DISABLE KEYS */;
INSERT INTO `tipos_entretenimento` VALUES (1,'FILME',NULL,'2023-12-20 20:56:36','2023-12-20 20:56:36'),(2,'serie',NULL,'2023-12-20 20:56:36','2023-12-20 20:56:36'),(3,'documentario',NULL,'2023-12-20 20:56:36','2023-12-20 20:56:36');
/*!40000 ALTER TABLE `tipos_entretenimento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(245) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'morais','morais@gmail.com','$2y$10$ZEr/m7Ae2gtr9wSiUX389u0CCl0zKzBlLFSiJkS1/fdTfo9.b3FQi');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-22 20:26:01
