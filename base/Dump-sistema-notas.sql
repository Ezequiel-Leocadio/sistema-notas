CREATE DATABASE  IF NOT EXISTS `sistema_notas` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sistema_notas`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: sistema_notas
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.22-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `boletos`
--

DROP TABLE IF EXISTS `boletos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `boletos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `situacao` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `banco` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `data` date DEFAULT NULL,
  `valor` decimal(12,2) DEFAULT NULL,
  `data_ven` date DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `numero_UNIQUE` (`numero`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `boletos`
--

LOCK TABLES `boletos` WRITE;
/*!40000 ALTER TABLE `boletos` DISABLE KEYS */;
INSERT INTO `boletos` VALUES (1,'99999999999999999999999999999999999999999999','Em aberto','Brasil','2017-05-30',99999.00,'2017-05-30','ezequiel');
/*!40000 ALTER TABLE `boletos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contas`
--

DROP TABLE IF EXISTS `contas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nf` varchar(41) DEFAULT NULL,
  `loja` int(11) NOT NULL,
  `empresa` int(11) NOT NULL,
  `data` date NOT NULL,
  `dataVen` date NOT NULL,
  `valor` double NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `banco` varchar(45) DEFAULT NULL,
  `comprovante` varchar(80) DEFAULT NULL,
  `fpagamento` varchar(45) DEFAULT NULL,
  `numcomprovante` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51610 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contas`
--

LOCK TABLES `contas` WRITE;
/*!40000 ALTER TABLE `contas` DISABLE KEYS */;
/*!40000 ALTER TABLE `contas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `controle_usuario`
--

DROP TABLE IF EXISTS `controle_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `controle_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rotina` varchar(45) NOT NULL,
  `visualizar` tinyint(4) DEFAULT '0',
  `editar` tinyint(4) DEFAULT '0',
  `excluir` tinyint(4) DEFAULT '0',
  `salvar` tinyint(4) DEFAULT '0',
  `usuario` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `controle_usuario`
--

LOCK TABLES `controle_usuario` WRITE;
/*!40000 ALTER TABLE `controle_usuario` DISABLE KEYS */;
INSERT INTO `controle_usuario` VALUES (1,'home',1,0,0,0,1,NULL),(2,'permissao',1,1,1,1,1,NULL),(3,'usuario',1,1,1,1,1,'2018-03-09'),(7,'pedidos',1,1,1,1,1,'2018-03-09'),(19,'contas',1,1,0,1,1,'2010-03-12'),(20,'notas',1,0,0,1,1,'0000-00-00'),(21,'notas_cpd',1,0,1,1,1,'0000-00-00'),(29,'lojas',1,1,0,1,1,'2018-04-06'),(39,'notas_uso',1,1,0,1,1,'2018-04-20'),(75,'empresa',1,1,1,1,1,'2018-08-22'),(85,'fornecedor',1,1,0,1,1,'2019-01-29');
/*!40000 ALTER TABLE `controle_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalhe_pedido`
--

DROP TABLE IF EXISTS `detalhe_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalhe_pedido` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `pedido` int(11) NOT NULL,
  `data` date NOT NULL,
  `situacao` varchar(100) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `pedidos_detalhe_pedido_idx` (`pedido`),
  CONSTRAINT `pedidos_detalhe_pedido` FOREIGN KEY (`pedido`) REFERENCES `pedidos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalhe_pedido`
--

LOCK TABLES `detalhe_pedido` WRITE;
/*!40000 ALTER TABLE `detalhe_pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalhe_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresas`
--

DROP TABLE IF EXISTS `empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(15) CHARACTER SET latin1 NOT NULL,
  `nome` varchar(45) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo_UNIQUE` (`codigo`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42142 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas`
--

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` VALUES (1,'12','OI Empresa  Telefonia');
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fornecedor`
--

DROP TABLE IF EXISTS `fornecedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fornecedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `cnpj` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2237 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fornecedor`
--

LOCK TABLES `fornecedor` WRITE;
/*!40000 ALTER TABLE `fornecedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `fornecedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lojas`
--

DROP TABLE IF EXISTS `lojas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lojas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(15) NOT NULL,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo_UNIQUE` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=28107 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lojas`
--

LOCK TABLES `lojas` WRITE;
/*!40000 ALTER TABLE `lojas` DISABLE KEYS */;
INSERT INTO `lojas` VALUES (1,'01','Matriz');
/*!40000 ALTER TABLE `lojas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notas`
--

DROP TABLE IF EXISTS `notas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notas` (
  `id` int(111) NOT NULL AUTO_INCREMENT,
  `chave_acesso` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `numero_nota` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `fornecedor` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `usuario_ant` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fornecedor` (`fornecedor`)
) ENGINE=MyISAM AUTO_INCREMENT=83237 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notas`
--

LOCK TABLES `notas` WRITE;
/*!40000 ALTER TABLE `notas` DISABLE KEYS */;
/*!40000 ALTER TABLE `notas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notas_cpd`
--

DROP TABLE IF EXISTS `notas_cpd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notas_cpd` (
  `id` int(111) NOT NULL AUTO_INCREMENT,
  `chave_acesso` varchar(50) DEFAULT NULL,
  `numero_nota` varchar(20) DEFAULT NULL,
  `fornecedor` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `usuario_ant` varchar(20) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `observacao` varchar(50) DEFAULT NULL,
  `status_ant` varchar(45) DEFAULT NULL,
  `data_ven` date DEFAULT NULL,
  `data_fina` date DEFAULT NULL,
  `data_env` date DEFAULT NULL,
  `data_pend` date DEFAULT NULL,
  `filial` varchar(45) NOT NULL,
  `data_horth` date DEFAULT NULL,
  `data_finan` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19953 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notas_cpd`
--

LOCK TABLES `notas_cpd` WRITE;
/*!40000 ALTER TABLE `notas_cpd` DISABLE KEYS */;
/*!40000 ALTER TABLE `notas_cpd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notas_uso_consumo`
--

DROP TABLE IF EXISTS `notas_uso_consumo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notas_uso_consumo` (
  `id` int(111) NOT NULL AUTO_INCREMENT,
  `chave_acesso` varchar(50) DEFAULT NULL,
  `numero_nota` varchar(20) DEFAULT NULL,
  `fornecedor` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `usuario_ant` varchar(20) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `status_ant` varchar(45) DEFAULT NULL,
  `data_ven` varchar(45) DEFAULT NULL,
  `observacao` varchar(50) DEFAULT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `data_ven_copy1` date DEFAULT NULL,
  `filial` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1990 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notas_uso_consumo`
--

LOCK TABLES `notas_uso_consumo` WRITE;
/*!40000 ALTER TABLE `notas_uso_consumo` DISABLE KEYS */;
INSERT INTO `notas_uso_consumo` VALUES (1,'51180200441133000101550010000633421000633429','000063342',333,'2018-04-28',NULL,'3',NULL,'2018-03-27','CONTABILIDADE.','Alex',NULL,'01');
/*!40000 ALTER TABLE `notas_uso_consumo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidos` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `protocolo` int(100) NOT NULL,
  `data` date NOT NULL,
  `solicitante` varchar(50) NOT NULL,
  `loja` varchar(40) NOT NULL,
  `setor` varchar(50) NOT NULL,
  `solicitacao` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `user_finalizado` varchar(45) DEFAULT NULL,
  `motivo_finali` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `protocolo_UNIQUE` (`protocolo`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `login` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `senha` longtext CHARACTER SET latin1,
  `tipo` varchar(20) DEFAULT NULL,
  `filial` varchar(45) NOT NULL,
  `setor` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login_UNIQUE` (`login`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'admin','admin','7cZWK2nIOcN/s','Admin','01','TI');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'sistema_notas'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-23 18:12:11
