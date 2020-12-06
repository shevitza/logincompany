-- MySQL dump 10.13  Distrib 8.0.22, for Linux (x86_64)
--
-- Host: localhost    Database: mycompany
-- ------------------------------------------------------
-- Server version	8.0.22-0ubuntu0.20.04.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `department` (
  `departmentID` int unsigned NOT NULL AUTO_INCREMENT,
  `departmentName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`departmentID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (1,'Developers'),(2,'Accounting'),(3,'Risk');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `userID` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `departmentID` int DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `staff` varchar(45) DEFAULT NULL,
  `bi` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (22,'ana','Ana Ivanova-Dimova','ana.ivanova@ddd.com',2,'$2y$10$5DugrheWdsn5c9kMGTen..Vrq/pWIBzzOH66iBCfVETSsRLoow/EW','staff_admin','NULL','2020-10-23 08:45:42','2020-10-23 21:54:15'),(23,'ivan','Ivan Milev','ivan.milev@ddd.com',1,'$2y$10$11sZACJMkgXkOQSPeoePO.Y8ZI209xe2tTbNRnTkGokvRYfjDfxuG','staff_active','bi_admin','2020-10-23 10:37:33','2020-10-25 01:14:05'),(25,'maria','Maria Dikova','maria.dikova@ddd.com',3,'$2y$10$yvGJNkfCqeqonMufvQ5YoOad383r1hChomcnOiYYWQEEN167Nzliq','staff_active','bi_active','2020-10-23 10:43:04','2020-10-23 21:54:36'),(26,'petar','Petar Ivanov','petar.ivanov@ddd.com',1,'$2y$10$rJzQ3SnSh7TkXKMW48Op..V01l5AvXgdu/wcInn6/zej9m4pu3yxK','staff_active','NULL','2020-10-23 11:46:36','2020-10-23 11:47:57'),(27,'hristo','Hristo Nikolov','hristo.nikolov@ddd.com',1,'$2y$10$H95wWgjljpFx7ZBM7SR7Ve.4jVi3XBmL3d.E0RKDz9jNLtGsQw3bK','staff_active','bi_active','2020-10-25 01:15:17','2020-10-25 01:25:40'),(28,'milena','Milena Koleva','milena.coleva@ddd.com',1,'$2y$10$yaVq0R3SQAag6ArgjLNRuegrUi0HrLicc40wWpT63ZX6gC3A/OjAK','staff_active','NULL','2020-10-25 01:18:32','2020-10-25 01:25:28');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-06  8:58:17
