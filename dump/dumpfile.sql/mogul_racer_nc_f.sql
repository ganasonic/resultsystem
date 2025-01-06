CREATE DATABASE  IF NOT EXISTS `mogul` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `mogul`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: mogul
-- ------------------------------------------------------
-- Server version	5.6.15

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
-- Table structure for table `racer_nc_f`
--

DROP TABLE IF EXISTS `racer_nc_f`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `racer_nc_f` (
  `SAJNO` varchar(8) DEFAULT NULL,
  `FISNO` varchar(8) DEFAULT NULL,
  `氏名R` varchar(32) DEFAULT NULL,
  `氏名漢` varchar(32) DEFAULT NULL,
  `国名` varchar(4) DEFAULT NULL,
  `県連盟` varchar(16) DEFAULT NULL,
  `FIS_AEﾎﾟｲﾝﾄ` float DEFAULT NULL,
  `FIS_HPﾎﾟｲﾝﾄ` float DEFAULT NULL,
  `FIS_MOﾎﾟｲﾝﾄ` float DEFAULT NULL,
  `FIS_SXﾎﾟｲﾝﾄ` float DEFAULT NULL,
  `FIS_SSﾎﾟｲﾝﾄ` float DEFAULT NULL,
  `FIS_BAﾎﾟｲﾝﾄ` float DEFAULT NULL,
  `SAJ_AEﾎﾟｲﾝﾄ` float DEFAULT NULL,
  `SAJ_HPﾎﾟｲﾝﾄ` float DEFAULT NULL,
  `SAJ_MOﾎﾟｲﾝﾄ` float DEFAULT NULL,
  `SAJ_SXﾎﾟｲﾝﾄ` float DEFAULT NULL,
  `SAJ_SSﾎﾟｲﾝﾄ` float DEFAULT NULL,
  `SAJ_BAﾎﾟｲﾝﾄ` float DEFAULT NULL,
  `所属` varchar(32) DEFAULT NULL,
  `生年月日` date DEFAULT NULL,
  `ｸﾗｽ` char(2) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `氏名2` varchar(16) DEFAULT NULL,
  `学年` char(2) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `競技者ｺｰﾄﾞ` varchar(8) DEFAULT NULL,
  `姓` varchar(16) DEFAULT NULL,
  `名` varchar(16) DEFAULT NULL,
  `ｾｲ` varchar(16) DEFAULT NULL,
  `ﾒｲ` varchar(16) DEFAULT NULL,
  `sei` varchar(16) DEFAULT NULL,
  `mei` varchar(16) DEFAULT NULL,
  `連盟ｺｰﾄﾞ` char(2) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `ﾁｰﾑﾖﾐｶﾞﾅ` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-25 17:37:48
