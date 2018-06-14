-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 192.168.1.150    Database: swarmboard_db
-- ------------------------------------------------------
-- Server version	5.5.58-0+deb7u1

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
-- Table structure for table `nodelist`
--

DROP TABLE IF EXISTS `nodelist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nodelist` (
  `fecha` varchar(100) NOT NULL DEFAULT '',
  `ID` varchar(100) NOT NULL DEFAULT '',
  `Hostname` varchar(100) DEFAULT NULL,
  `OS` varchar(100) DEFAULT NULL,
  `IP` varchar(100) DEFAULT NULL,
  `Docker` varchar(100) DEFAULT NULL,
  `Role` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`,`fecha`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nodelist`
--

LOCK TABLES `nodelist` WRITE;
/*!40000 ALTER TABLE `nodelist` DISABLE KEYS */;
INSERT INTO `nodelist` VALUES ('16:22:20 05/13/18','i117t9kr3yyl4wcrg6xzpupvs','worker1','linux','192.168.1.140','17.05.0-ce','worker'),('16:22:20 05/13/18','ltdy13n6z2saw704rirpufa7f','raspi','linux','192.168.1.150','18.04.0-ce','manager'),('16:22:20 05/13/18','xx7ncuy24k3yjl44la0opji55','worker2','linux','192.168.1.139','17.05.0-ce','worker');
/*!40000 ALTER TABLE `nodelist` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-13 19:58:34
