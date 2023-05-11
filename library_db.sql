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
-- Table structure for table `bookdetails`
--

DROP TABLE IF EXISTS `bookdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bookdetails` (
  `isbn` bigint NOT NULL,
  `price` int NOT NULL,
  `published` date NOT NULL,
  `link` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookdetails`
--

LOCK TABLES `bookdetails` WRITE;
/*!40000 ALTER TABLE `bookdetails` DISABLE KEYS */;
INSERT INTO `bookdetails` VALUES (9788961335324,19000,'2022-06-15','http://www.yes24.com/Product/Goods/110348141'),(9791130333571,25000,'2019-02-28','http://www.yes24.com/Product/Goods/70833416'),(9791140702794,28000,'2023-01-25','http://www.yes24.com/Product/Goods/116918361'),(9791157031665,19500,'2016-02-20','http://www.yes24.com/Product/Goods/24343695'),(9791158392239,45000,'2020-09-25','http://www.yes24.com/Product/Goods/92742567'),(9791158393724,36000,'2022-10-27','http://www.yes24.com/Product/Goods/114854152'),(9791160505030,18000,'2018-06-30','http://www.yes24.com/Product/Goods/61794014'),(9791160507676,25000,'2019-04-30','http://www.yes24.com/Product/Goods/71969505'),(9791161753119,40000,'2019-06-19','http://www.yes24.com/Product/Goods/74362523'),(9791162243077,34000,'2020-08-05','http://www.yes24.com/Product/Goods/91433923'),(9791162243664,26000,'2020-12-21','http://www.yes24.com/Product/Goods/96024871'),(9791162243770,36000,'2023-05-04','http://www.yes24.com/Product/Goods/118685906'),(9791163034223,36000,'2022-12-05','http://www.yes24.com/Product/Goods/115633312'),(9791163034254,40000,'2022-12-16','http://www.yes24.com/Product/Goods/116012310'),(9791165921453,17000,'2022-03-30','http://www.yes24.com/Product/Goods/108462627'),(9791169210881,25000,'2023-04-10','http://www.yes24.com/Product/Goods/118266847'),(9791193059005,17700,'2023-04-30','http://www.yes24.com/Product/Goods/118485597'),(9791196395704,38000,'2018-06-01','http://www.yes24.com/Product/Goods/61254539');
/*!40000 ALTER TABLE `bookdetails` ENABLE KEYS */;
UNLOCK TABLES;

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
INSERT INTO `bookinfo` VALUES (12269026,'문화권 클러스터링 기반 SNS 빅데이터 및 사용자 선호도 분석','노승민','한국항행학회논문지','','2023-05-11'),(17381916,'특허분석을 통한 빅데이터 분석 플랫폼 기술 개발 동향','노승민','한국디지털정책학회',NULL,'2023-05-11'),(22884165,'초연결시대 기술융합을 위한 사물 인터넷 기술의 특허동향 분석','노승민','한국정보통신학회논문지','admin','2023-05-08'),(1226902601,'RFID 표준특허 데이터 분석을 통한 RFID 기술 동향','노승민','한국항행학회논문지',NULL,'2023-05-11'),(9788961335324,'개념원리 미적분 (2023)','이홍섭','개념원리','','2023-05-09'),(9791130333571,'인공지능과 법','한국인공지능법학회','(주)박영사',NULL,'2023-05-09'),(9791140702794,'모두의 구글 애널리틱스4','김도연','길벗',NULL,'2023-05-11'),(9791157031665,'한 권으로 끝내는 스페인어 능력시험 DELE B2~C1','정기훈','동양북스','user7','2023-05-09'),(9791158392239,'모던 자바스크립트 Deep Dive','이웅모','위키북스',NULL,'2023-05-11'),(9791158393724,'시작하세요! C# 10 프로그래밍','정성태','위키북스',NULL,'2023-05-07'),(9791160505030,'모두의 네트워크','미즈구치 카츠야','길벗','karu','2023-05-11'),(9791160507676,'모던 C++ 디자인 패턴','드미트리 네스터룩','길벗',NULL,'2023-05-08'),(9791161753119,'C++17 STL 프로그래밍','야체크 갈로비치','에이콘출판사','karu','2023-05-08'),(9791162243077,'이것이 취업을 위한 코딩 테스트다 with 파이썬','나동빈','한빛미디어','karu','2023-05-11'),(9791162243664,'혼자 공부하는 머신러닝+딥러닝','박해선','한빛미디어','user7','2023-05-07'),(9791162243770,'이것이 C# 이다','박상현','한빛미디어','','2023-05-11'),(9791163034223,'Do it! 모던 자바스크립트 프로그래밍의 정석','고경희','이지스퍼블리싱',NULL,'2023-05-09'),(9791163034254,'Do it! 깡샘의 안드로이드 앱 프로그래밍 with 코틀린','강성윤','이지스퍼블리싱','user3','2023-05-09'),(9791165921453,'어떤 개발자가 살아남는가','이경종','비제이퍼블릭',NULL,'2023-05-09'),(9791169210881,'Docs for Developers 기술 문서 작성 완벽 가이드','자레드 바티 외','한빛미디어',NULL,'2023-05-11'),(9791193059005,'챗GPT & AI 31가지 실전 활용','권지선 외','앤써북','user3','2023-05-11'),(9791196395704,'친절한 SQL 튜닝','조시형','디비안',NULL,'2023-05-09');
/*!40000 ALTER TABLE `bookinfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `log` (
  `isbn` bigint NOT NULL,
  `user` varchar(30) NOT NULL,
  `action` varchar(45) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`time`),
  KEY `user_idx` (`user`),
  CONSTRAINT `user` FOREIGN KEY (`user`) REFERENCES `userinfo` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` VALUES (17381916,'admin','check out','2023-05-11 14:16:17'),(17381916,'admin','return','2023-05-11 14:18:56'),(9791161753119,'karu','check out','2023-05-11 14:22:43'),(9791162243077,'karu','check out','2023-05-11 14:22:50'),(9791160505030,'karu','check out','2023-05-11 15:21:24'),(9791157031665,'user3','check out','2023-05-11 18:06:56'),(9791157031665,'user3','return','2023-05-11 18:07:01'),(9791157031665,'user7','check out','2023-05-11 18:07:23'),(9791158392239,'user7','check out','2023-05-11 18:07:27'),(9791162243664,'user7','check out','2023-05-11 18:07:32'),(9791158392239,'user7','return','2023-05-11 18:07:35'),(9791163034254,'user3','check out','2023-05-11 18:14:54'),(9791193059005,'user3','check out','2023-05-11 18:14:58');
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
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
INSERT INTO `userinfo` VALUES ('admin','f7bbd8d85bfdbc01370ee7d0b5b4f69e5949878c0b9243c9dc736a1f18b648aa','관리자',20),('karu','ae49b654a681e24f5444c7fda819e59656102165bd2817e885c84cbadf54d80f','나선우',20),('user1','0a041b9462caa4a31bac3567e0b6e6fd9100787db2ab433d96f6d178cabfce90','유저1',21),('user10','5bbf1a9e0de062225a1bb7df8d8b3719591527b74950810f16b1a6bc6d7bd29b','문희연',27),('user2','6025d18fe48abd45168528f18a82e265dd98d421a7084aa09f61b341703901a3','문서준',17),('user3','5860faf02b6bc6222ba5aca523560f0e364ccd8b67bee486fe8bf7c01d492ccb','정지호',15),('user4','5269ef980de47819ba3d14340f4665262c41e933dc92c1a27dd5d01b047ac80e','이예준',13),('user5','5a39bead318f306939acb1d016647be2e38c6501c58367fdb3e9f52542aa2442','주이안',18),('user6','ecb48a1cc94f951252ec462fe9ecc55c3ef123fadfe935661396c26a45a5809d','차민준',16),('user7','3268151e52d97b4cacf97f5b46a5c76c8416e928e137e3b3dc447696a29afbaa','권도하',17),('user8','f60afa4989a7db13314a2ab9881372634b5402c30ba7257448b13fa388de1b78','김춘배',65),('user9','0fb8d3c5dfaf81a387bf0ba439ab40e6343d2155fb4ddf6978a52d9b9ea8d0f8','김철혁',35);
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

-- Dump completed on 2023-05-11 18:15:09
