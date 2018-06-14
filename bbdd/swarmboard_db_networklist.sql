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
-- Table structure for table `networklist`
--

DROP TABLE IF EXISTS `networklist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `networklist` (
  `fecha` varchar(100) NOT NULL DEFAULT '',
  `NetworkID` varchar(100) NOT NULL DEFAULT '',
  `Name` varchar(100) DEFAULT NULL,
  `Subnet` varchar(100) DEFAULT NULL,
  `Gateway` varchar(100) DEFAULT NULL,
  `Driver` varchar(100) DEFAULT NULL,
  `Scope` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`NetworkID`,`fecha`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `networklist`
--

LOCK TABLES `networklist` WRITE;
/*!40000 ALTER TABLE `networklist` DISABLE KEYS */;
INSERT INTO `networklist` VALUES ('17:51:59 05/13/18','338b834e0e6ff59058a844744a218afd673a4b2642a334119f032e75205f4e85','host','','','host','local'),('17:51:59 05/13/18','38733f11c6e1febfbbfecabb47390db3196e49932b2f18a4d425f9c25ca6617c','docker_gwbridge','172.18.0.0/16','172.18.0.1','bridge','local'),('17:51:59 05/13/18','3f83a097cf1aa6f2860c754f0edc2234c818bebb1ff63b701f200c245d55bca0','none','','','null','local'),('17:51:59 05/13/18','45d370e3cebdace85f0ced095d357aac10b0ca335111829722a9573bbf55b188','bridge','172.17.0.0/16','172.17.0.1','bridge','local'),('17:51:59 05/13/18','odmrw3vnx575e4ghvp320bota','ingress','10.255.0.0/16','10.255.0.1','overlay','swarm'),('17:51:59 05/13/18','swkk2dha62ng9zgo7i7p446x1','prueba_default','','','overlay','swarm'),('17:51:59 05/13/18','up1dik8vmt26rgz7lpylo1myk','apache2_default','10.0.1.0/24','10.0.1.1','overlay','swarm');
/*!40000 ALTER TABLE `networklist` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-13 19:58:37
