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
-- Table structure for table `result_lists`
--

DROP TABLE IF EXISTS `result_lists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `result_lists` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `class` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `season` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codex` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sajno` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` tinyint(3) unsigned NOT NULL,
  `rank` tinyint(3) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bib` tinyint(3) unsigned NOT NULL,
  `pref` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `turn` decimal(5,2) NOT NULL,
  `air` decimal(5,2) NOT NULL,
  `air1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `air2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sec` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `turnB1` decimal(4,1) NOT NULL,
  `turnD1` decimal(4,1) NOT NULL,
  `turnB2` decimal(4,1) NOT NULL,
  `turnD2` decimal(4,1) NOT NULL,
  `turnB3` decimal(4,1) NOT NULL,
  `turnD3` decimal(4,1) NOT NULL,
  `turnB4` decimal(4,1) NOT NULL,
  `turnD4` decimal(4,1) NOT NULL,
  `turnB5` decimal(4,1) NOT NULL,
  `turnD5` decimal(4,1) NOT NULL,
  `air1_1` decimal(4,1) NOT NULL,
  `air1_2` decimal(4,1) NOT NULL,
  `air2_1` decimal(4,1) NOT NULL,
  `air2_2` decimal(4,1) NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `air1_dd` decimal(4,1) NOT NULL,
  `air2_dd` decimal(4,1) NOT NULL,
  `tiebreak` tinyint(3) unsigned NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-25 17:37:49
