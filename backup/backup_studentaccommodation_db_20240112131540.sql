-- MariaDB dump 10.19  Distrib 10.4.27-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: studentaccommodation_db
-- ------------------------------------------------------
-- Server version	8.0.35

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','password');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apartinspection`
--

DROP TABLE IF EXISTS `apartinspection`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apartinspection` (
  `apartNo` int NOT NULL,
  `dateOfInspection` date NOT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `employeeNo` int DEFAULT NULL,
  PRIMARY KEY (`apartNo`,`dateOfInspection`),
  KEY `employeeNo` (`employeeNo`),
  CONSTRAINT `apartinspection_ibfk_1` FOREIGN KEY (`apartNo`) REFERENCES `apartment` (`apartNo`),
  CONSTRAINT `apartinspection_ibfk_2` FOREIGN KEY (`employeeNo`) REFERENCES `employee` (`employeeNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apartinspection`
--

LOCK TABLES `apartinspection` WRITE;
/*!40000 ALTER TABLE `apartinspection` DISABLE KEYS */;
INSERT INTO `apartinspection` VALUES (1,'2024-04-04','It sucks','Dead',1);
/*!40000 ALTER TABLE `apartinspection` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apartment`
--

DROP TABLE IF EXISTS `apartment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apartment` (
  `apartNo` int NOT NULL,
  `apartAddress` varchar(255) DEFAULT NULL,
  `noOfRoomsInApart` int DEFAULT NULL,
  PRIMARY KEY (`apartNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apartment`
--

LOCK TABLES `apartment` WRITE;
/*!40000 ALTER TABLE `apartment` DISABLE KEYS */;
INSERT INTO `apartment` VALUES (1,'Accra',500),(456,'456 Oak St, Apt 203',2);
/*!40000 ALTER TABLE `apartment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `employeeNo` int NOT NULL,
  `employeeName` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`employeeNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (1,'Brown'),(20,'Manager Name');
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hall`
--

DROP TABLE IF EXISTS `hall`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hall` (
  `hallName` varchar(50) NOT NULL,
  `hallAddress` varchar(100) DEFAULT NULL,
  `hallTelNo` varchar(15) DEFAULT NULL,
  `hallFaxNo` varchar(15) DEFAULT NULL,
  `noOfRoomsInHall` int DEFAULT NULL,
  `managerEmployeeNo` int DEFAULT NULL,
  PRIMARY KEY (`hallName`),
  UNIQUE KEY `hallTelNo` (`hallTelNo`),
  UNIQUE KEY `hallFaxNo` (`hallFaxNo`),
  KEY `managerEmployeeNo` (`managerEmployeeNo`),
  CONSTRAINT `hall_ibfk_1` FOREIGN KEY (`managerEmployeeNo`) REFERENCES `employee` (`employeeNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hall`
--

LOCK TABLES `hall` WRITE;
/*!40000 ALTER TABLE `hall` DISABLE KEYS */;
INSERT INTO `hall` VALUES ('Sarbah','Accra','125867','085996',100,20);
/*!40000 ALTER TABLE `hall` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoice` (
  `invoiceNo` int NOT NULL,
  `semester` varchar(20) DEFAULT NULL,
  `dateDue` date DEFAULT NULL,
  `datePaid` date DEFAULT NULL,
  `leaseNo` int DEFAULT NULL,
  `pMethodNo` int DEFAULT NULL,
  PRIMARY KEY (`invoiceNo`),
  KEY `leaseNo` (`leaseNo`),
  KEY `pMethodNo` (`pMethodNo`),
  CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`leaseNo`) REFERENCES `lease` (`leaseNo`),
  CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`pMethodNo`) REFERENCES `paymentmethod` (`pMethodNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice`
--

LOCK TABLES `invoice` WRITE;
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` VALUES (1,'1st','2024-04-04','2024-01-01',1,1);
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lease`
--

DROP TABLE IF EXISTS `lease`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lease` (
  `leaseNo` int NOT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `dateStart` date DEFAULT NULL,
  `dateLeave` date DEFAULT NULL,
  `studentNo` int DEFAULT NULL,
  `placeNo` int DEFAULT NULL,
  PRIMARY KEY (`leaseNo`),
  UNIQUE KEY `placeNo` (`placeNo`,`dateStart`),
  UNIQUE KEY `studentNo` (`studentNo`,`dateStart`),
  CONSTRAINT `lease_ibfk_1` FOREIGN KEY (`studentNo`) REFERENCES `student` (`studentNo`),
  CONSTRAINT `lease_ibfk_2` FOREIGN KEY (`placeNo`) REFERENCES `room` (`placeNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lease`
--

LOCK TABLES `lease` WRITE;
/*!40000 ALTER TABLE `lease` DISABLE KEYS */;
INSERT INTO `lease` VALUES (1,'4','2024-01-01','2028-05-05',1,123);
/*!40000 ALTER TABLE `lease` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paymentmethod`
--

DROP TABLE IF EXISTS `paymentmethod`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paymentmethod` (
  `pMethodNo` int NOT NULL,
  `paymentMethodName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pMethodNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paymentmethod`
--

LOCK TABLES `paymentmethod` WRITE;
/*!40000 ALTER TABLE `paymentmethod` DISABLE KEYS */;
INSERT INTO `paymentmethod` VALUES (1,'Hall Fees');
/*!40000 ALTER TABLE `paymentmethod` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reminder`
--

DROP TABLE IF EXISTS `reminder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reminder` (
  `invoiceNo` int NOT NULL,
  `dateReminder1sent` date DEFAULT NULL,
  `dateReminder2sent` date DEFAULT NULL,
  `dateInterview` date DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`invoiceNo`),
  CONSTRAINT `reminder_ibfk_1` FOREIGN KEY (`invoiceNo`) REFERENCES `invoice` (`invoiceNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reminder`
--

LOCK TABLES `reminder` WRITE;
/*!40000 ALTER TABLE `reminder` DISABLE KEYS */;
INSERT INTO `reminder` VALUES (1,'2024-04-04','2024-04-04','2024-03-03','It sucks');
/*!40000 ALTER TABLE `reminder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room` (
  `placeNo` int NOT NULL,
  `roomNo` int DEFAULT NULL,
  `rentPerSemester` decimal(10,2) DEFAULT NULL,
  `hallName` varchar(50) DEFAULT NULL,
  `apartNo` int DEFAULT NULL,
  PRIMARY KEY (`placeNo`),
  UNIQUE KEY `roomNo` (`roomNo`,`hallName`),
  UNIQUE KEY `roomNo_2` (`roomNo`,`apartNo`),
  KEY `hallName` (`hallName`),
  KEY `apartNo` (`apartNo`),
  CONSTRAINT `room_ibfk_1` FOREIGN KEY (`hallName`) REFERENCES `hall` (`hallName`),
  CONSTRAINT `room_ibfk_2` FOREIGN KEY (`apartNo`) REFERENCES `apartment` (`apartNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room`
--

LOCK TABLES `room` WRITE;
/*!40000 ALTER TABLE `room` DISABLE KEYS */;
INSERT INTO `room` VALUES (123,10,5000.00,'Sarbah',1);
/*!40000 ALTER TABLE `room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `studentNo` int NOT NULL,
  `studentFirstName` varchar(50) DEFAULT NULL,
  `studentMiddleInitial` char(1) DEFAULT NULL,
  `studentLastName` varchar(50) DEFAULT NULL,
  `studentHomeStreet` varchar(100) DEFAULT NULL,
  `studentHomeCity` varchar(50) DEFAULT NULL,
  `studentHomeState` varchar(2) DEFAULT NULL,
  `studentHomeZipCode` varchar(10) DEFAULT NULL,
  `studentHomeTelNo` varchar(15) DEFAULT NULL,
  `studentSex` char(1) DEFAULT NULL,
  `studentDOB` date DEFAULT NULL,
  `studentType` varchar(20) DEFAULT NULL,
  `studentStatus` varchar(20) DEFAULT NULL,
  `accommodationTypeRequired` varchar(20) DEFAULT NULL,
  `accommodationDuration` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`studentNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(123456,'John','D','Doe','123 Main St','Cityville','CA','12345','555-1234','M','1990-01-01','Undergraduate','Active','Hall','4');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `useractivitylog`
--

DROP TABLE IF EXISTS `useractivitylog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `useractivitylog` (
  `logID` int NOT NULL AUTO_INCREMENT,
  `activityType` varchar(20) DEFAULT NULL,
  `activityTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`logID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `useractivitylog`
--

LOCK TABLES `useractivitylog` WRITE;
/*!40000 ALTER TABLE `useractivitylog` DISABLE KEYS */;
INSERT INTO `useractivitylog` VALUES (1,'Accommodation','2024-01-10 10:39:37'),(2,'Student','2024-01-12 12:45:50'),(3,'Hall','2024-01-12 12:45:50');
/*!40000 ALTER TABLE `useractivitylog` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-12 13:15:41
