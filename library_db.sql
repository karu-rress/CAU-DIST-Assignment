-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: library
-- ------------------------------------------------------
-- Server version	8.0.32

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
-- Table structure for table `bookinfo`
--

DROP TABLE IF EXISTS `bookinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bookinfo` (
  `isbn` bigint NOT NULL,
  `title` varchar(80) NOT NULL,
  `author` varchar(45) NOT NULL,
  `publisher` varchar(45) NOT NULL,
  `takenby` varchar(45) DEFAULT NULL,
  `uploaded` date DEFAULT NULL,
  PRIMARY KEY (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookinfo`
--

LOCK TABLES `bookinfo` WRITE;
/*!40000 ALTER TABLE `bookinfo` DISABLE KEYS */;
INSERT INTO `bookinfo` VALUES (22884165,'초연결시대 기술융합을 위한 사물 인터넷 기술의 특허동향 분석','노승민','한국정보통신학회논문지',NULL,'2023-05-08'),(9788961335324,'개념원리 미적분 (2023)','이홍섭','개념원리',NULL,'2023-05-09'),(9791130333571,'인공지능과 법','한국인공지능법학회','(주)박영사',NULL,'2023-05-09'),(9791157031665,'한 권으로 끝내는 스페인어 능력시험 DELE B2~C1','정기훈','동양북스',NULL,'2023-05-09'),(9791158393724,'시작하세요! C# 10 프로그래밍','정성태','위키북스',NULL,'2023-05-07'),(9791160507676,'모던 C++ 디자인 패턴','드미트리 네스터룩','길벗',NULL,'2023-05-08'),(9791161753119,'C++17 STL 프로그래밍','야체크 갈로비치','에이콘출판사',NULL,'2023-05-08'),(9791162243664,'혼자 공부하는 머신러닝+딥러닝','박해선','한빛미디어',NULL,'2023-05-07'),(9791163034223,'Do it! 모던 자바스크립트 프로그래밍의 정석','고경희','이지스퍼블리싱',NULL,'2023-05-09'),(9791163034254,'Do it! 깡샘의 안드로이드 앱 프로그래밍 with 코틀린','강성윤','이지스퍼블리싱',NULL,'2023-05-09'),(9791165921453,'어떤 개발자가 살아남는가','이경종','비제이퍼블릭',NULL,'2023-05-09'),(9791196395704,'친절한 SQL 튜닝','조시형','디비안',NULL,'2023-05-09');
/*!40000 ALTER TABLE `bookinfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userinfo`
--

DROP TABLE IF EXISTS `userinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `userinfo` (
  `id` varchar(30) NOT NULL,
  `pwd` varchar(80) NOT NULL,
  `name` varchar(20) NOT NULL,
  `age` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userinfo`
--

LOCK TABLES `userinfo` WRITE;
/*!40000 ALTER TABLE `userinfo` DISABLE KEYS */;
INSERT INTO `userinfo` VALUES ('admin','f7bbd8d85bfdbc01370ee7d0b5b4f69e5949878c0b9243c9dc736a1f18b648aa','관리자',20),('karu','ae49b654a681e24f5444c7fda819e59656102165bd2817e885c84cbadf54d80f','나선우',20),('user1','0a041b9462caa4a31bac3567e0b6e6fd9100787db2ab433d96f6d178cabfce90','유저1',21);
/*!40000 ALTER TABLE `userinfo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-09  1:56:21
