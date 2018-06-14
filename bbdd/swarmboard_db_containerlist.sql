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
-- Table structure for table `containerlist`
--

DROP TABLE IF EXISTS `containerlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `containerlist` (
  `fecha` varchar(100) NOT NULL DEFAULT '',
  `ContainerID` varchar(100) NOT NULL DEFAULT '',
  `Image` varchar(100) DEFAULT NULL,
  `Command` varchar(100) DEFAULT NULL,
  `Created` varchar(100) DEFAULT NULL,
  `Status` varchar(100) DEFAULT NULL,
  `Ports` varchar(100) DEFAULT NULL,
  `Names` varchar(100) DEFAULT NULL,
  `Ip` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ContainerID`,`fecha`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `containerlist`
--

LOCK TABLES `containerlist` WRITE;
/*!40000 ALTER TABLE `containerlist` DISABLE KEYS */;
INSERT INTO `containerlist` VALUES ('17:52:17 05/13/18','1d80d2237f0ffa20148cff5d3492c9e89e45728e463d458ad8318c610314b165','hypriot/rpi-mysql','/entrypoint.sh','2018-04-14T13:18:08.660669849Z','running','3306','mysql','0.0.0.0'),('17:52:17 05/13/18','cdce977e488633a82889da3cbfa481403f1903c6c0f2f4078f3a367ad5edefa9','nginx','nginx','2018-05-13T14:53:04.67328848Z','exited','','nginx1',''),('17:52:17 05/13/18','d9ca2d7962179fe43d26668690c70361864bad463ed5ea439f35dae1a9433413','php:apache','docker-php-entrypoint','2018-05-12T13:00:54.707626163Z','running','','apache2_apache.1.z543hi82of2zsf1qsv7dvg767','');
/*!40000 ALTER TABLE `containerlist` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-13 19:58:36
