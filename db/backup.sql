-- MySQL dump 10.11
--
-- Host: localhost    Database: allstateloads
-- ------------------------------------------------------
-- Server version	5.0.67-community-nt

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
-- Table structure for table `cargos`
--

DROP TABLE IF EXISTS `cargos`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `cargos` (
  `cargo_id` int(11) NOT NULL,
  `cargo_owner` int(11) NOT NULL,
  `cargo_start_city` varchar(50) collate utf8_bin NOT NULL,
  `cargo_start_address` varchar(255) collate utf8_bin NOT NULL,
  `cargo_start_zip` char(5) collate utf8_bin NOT NULL,
  `cargo_stop_state` char(2) collate utf8_bin NOT NULL,
  `cargo_stop_city` varchar(50) collate utf8_bin NOT NULL,
  `cargo_stop_address` varchar(255) collate utf8_bin NOT NULL,
  `cargo_stop_zip` char(5) collate utf8_bin NOT NULL,
  `cargo_millage` decimal(10,2) NOT NULL,
  PRIMARY KEY  (`cargo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `cargos`
--

LOCK TABLES `cargos` WRITE;
/*!40000 ALTER TABLE `cargos` DISABLE KEYS */;
/*!40000 ALTER TABLE `cargos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `companies` (
  `company_id` int(11) NOT NULL auto_increment,
  `company_name` varchar(255) collate utf8_bin NOT NULL,
  `company_phone` varchar(12) collate utf8_bin NOT NULL,
  `company_fax` varchar(12) collate utf8_bin default NULL,
  `company_email` varchar(100) collate utf8_bin default NULL,
  `company_state` char(2) collate utf8_bin NOT NULL,
  `company_city` varchar(50) collate utf8_bin NOT NULL,
  `company_address` varchar(255) collate utf8_bin NOT NULL,
  `company_owner` int(11) NOT NULL,
  PRIMARY KEY  (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL auto_increment,
  `country_name` varchar(100) collate utf8_bin NOT NULL,
  PRIMARY KEY  (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'USA'),(2,'Canada');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loads`
--

DROP TABLE IF EXISTS `loads`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `loads` (
  `id` int(11) NOT NULL auto_increment,
  `owner` int(11) NOT NULL,
  `startState` varchar(255) NOT NULL,
  `startCity` varchar(255) NOT NULL,
  `startZip` varchar(255) NOT NULL,
  `endState` varchar(255) NOT NULL,
  `endCity` varchar(255) NOT NULL,
  `endZip` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `feet` varchar(255) NOT NULL,
  `pickupDate` date NOT NULL,
  `diliveryDate` date NOT NULL,
  `truckType` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `extra` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `loads`
--

LOCK TABLES `loads` WRITE;
/*!40000 ALTER TABLE `loads` DISABLE KEYS */;
INSERT INTO `loads` VALUES (17,8,'CA','San Jose','26387','CA','San Fancisco','387883','5200','5520','2011-11-03','2011-11-03','1','','adilshakar@gmail.com','+923459549921','winwinhost adil'),(18,9,'CA','San Jose','26387','CA','San Fancisco','387883','5200','5520','2011-11-03','2011-11-03','3','','robert@gmail.com','+1789546231','winwinhost robert'),(19,8,'AK','Los Angeles','91406','WA','Washington','none','1000','700','2011-11-12','2011-11-15','1','','none','none','company1'),(20,8,'AK','Los Angeles','91406','WA','Washington','none','1000','700','2011-11-12','2011-11-15','1','','none','none','company1'),(21,8,'AK','Los Angeles','91406','WA','Washington','none','1000','700','2011-11-12','2011-11-15','1','','none','none','company1'),(22,8,'AK','Los Angeles','91406','WA','Washington','none','1000','700','2011-11-12','2011-11-15','1','','none','none','company1');
/*!40000 ALTER TABLE `loads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `members` (
  `member_id` int(11) NOT NULL auto_increment,
  `member_username` varchar(50) collate utf8_bin NOT NULL,
  `member_email` varchar(45) collate utf8_bin NOT NULL,
  `member_pass` varchar(45) collate utf8_bin NOT NULL,
  `member_role` tinyint(4) NOT NULL,
  `member_company` int(11) default NULL,
  `member_phone` varchar(12) collate utf8_bin default NULL,
  PRIMARY KEY  (`member_id`),
  UNIQUE KEY `member_email_UNIQUE` (`member_email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (8,'adil','adilshakar@gmail.com','adil',2,NULL,NULL),(9,'robert','robertbain2001@gmail.com','',2,NULL,NULL),(10,'copilu0','copilu0@yahoo.com','toma',2,0,'none'),(11,'adrian','adrian@winwinhost.com','adrian',2,0,'none'),(12,'Muhammad Saqib','rooott@gmail.com','ejyvevysenyjesy',2,0,'+3459564449'),(13,'zend','zend@gmail.com','dazumamuzazumam',4,0,'234234');
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `news` (
  `news_id` int(11) NOT NULL auto_increment,
  `news_title` varchar(255) collate utf8_bin NOT NULL,
  `news_posted` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `news_text` text collate utf8_bin NOT NULL,
  PRIMARY KEY  (`news_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'All State Loads is Free','2011-11-18 02:14:49','Truckers and Freight Forwarders ,All State Loads is free of charge. It provides you with the best features across the web to find loads for the truckers and trucks for the freight forwarders.Make an account today and see for yourself that there is loads of business for you and your company.');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `newtrucks`
--

DROP TABLE IF EXISTS `newtrucks`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `newtrucks` (
  `owner` int(11) NOT NULL,
  `public` tinyint(1) NOT NULL,
  `s_state` varchar(255) NOT NULL,
  `s_city` varchar(255) NOT NULL,
  `s_zip` varchar(255) NOT NULL,
  `e_state` varchar(255) NOT NULL,
  `e_city` varchar(255) NOT NULL,
  `e_zip` varchar(255) NOT NULL,
  `team` tinyint(1) NOT NULL,
  `full` tinyint(1) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `feet` varchar(255) NOT NULL,
  `feet_left` varchar(255) NOT NULL,
  `type` varchar(30) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created` date NOT NULL,
  `id` int(11) NOT NULL auto_increment,
  `startingDate` date NOT NULL,
  `endDate` date NOT NULL,
  `via` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `newtrucks`
--

LOCK TABLES `newtrucks` WRITE;
/*!40000 ALTER TABLE `newtrucks` DISABLE KEYS */;
INSERT INTO `newtrucks` VALUES (9,0,'','','','','','',0,0,'7000','','7000','1','+1789546231','robert@gmail.com','2011-11-02',24,'0000-00-00','0000-00-00',''),(8,0,'CA','San Jose','26387','CA','San Fancisco','387883',0,0,'7000','','7000','1','+923459549921','adilshakar@gmail.com','2011-11-02',23,'2011-11-03','2011-11-03',''),(8,0,'CA','Los Angeles','91406','WA','Washington','',0,0,'1000','','700','1','none','copilu0@yahoo.com','2011-11-09',25,'2011-11-17','2011-11-21',''),(11,0,'AL','Los Angeles','91406','AL','City2','91400',0,0,'','','','3','1','adrian@winwinhost.com','2011-12-07',33,'2011-12-22','2011-12-29',''),(11,0,'AZ','City1','1','IL','City2','111',0,0,'1000','','700','2','1235','copilu0@yahoo.com','2011-12-07',34,'2011-12-14','2011-12-23','');
/*!40000 ALTER TABLE `newtrucks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `roles` (
  `role_id` tinyint(4) NOT NULL auto_increment,
  `role_name` varchar(100) collate utf8_bin default NULL,
  PRIMARY KEY  (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrator'),(2,'Moderator'),(3,'Shipper'),(4,'Truck Driver');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `states` (
  `state` varchar(22) NOT NULL,
  `state_code` char(2) NOT NULL,
  PRIMARY KEY  (`state_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `states`
--

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
INSERT INTO `states` VALUES ('Alaska','AK'),('Alabama','AL'),('Arkansas','AR'),('Arizona','AZ'),('California','CA'),('Colorado','CO'),('Connecticut','CT'),('District of Columbia','DC'),('Delaware','DE'),('Florida','FL'),('Georgia','GA'),('Hawaii','HI'),('Iowa','IA'),('Idaho','ID'),('Illinois','IL'),('Indiana','IN'),('Kansas','KS'),('Kentucky','KY'),('Louisiana','LA'),('Massachusetts','MA'),('Maryland','MD'),('Maine','ME'),('Michigan','MI'),('Minnesota','MN'),('Missouri','MO'),('Mississippi','MS'),('Montana','MT'),('North Carolina','NC'),('North Dakota','ND'),('Nebraska','NE'),('New Hampshire','NH'),('New Jersey','NJ'),('New Mexico','NM'),('Nevada','NV'),('New York','NY'),('Ohio','OH'),('Oklahoma','OK'),('Oregon','OR'),('Pennsylvania','PA'),('Rhode Island','RI'),('South Carolina','SC'),('South Dakota','SD'),('Tennessee','TN'),('Texas','TX'),('Utah','UT'),('Virginia','VA'),('Vermont','VT'),('Washington','WA'),('Wisconsin','WI'),('West Virginia','WV'),('Wyoming','WY');
/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `truck_types`
--

DROP TABLE IF EXISTS `truck_types`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `truck_types` (
  `truck_type_id` int(11) NOT NULL auto_increment,
  `truck_type_name` varchar(200) collate utf8_bin NOT NULL,
  PRIMARY KEY  (`truck_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `truck_types`
--

LOCK TABLES `truck_types` WRITE;
/*!40000 ALTER TABLE `truck_types` DISABLE KEYS */;
INSERT INTO `truck_types` VALUES (1,'Auto Carrier'),(2,'B-Train'),(3,'Container - Regular'),(4,'Container - Insulated');
/*!40000 ALTER TABLE `truck_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trucks`
--

DROP TABLE IF EXISTS `trucks`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `trucks` (
  `truck_id` int(11) NOT NULL auto_increment,
  `truck_owner` int(11) NOT NULL,
  `truck_country` int(11) NOT NULL,
  `truck_type` int(11) NOT NULL,
  `truck_city` varchar(50) collate utf8_bin NOT NULL,
  `truck_zip` char(5) collate utf8_bin NOT NULL,
  PRIMARY KEY  (`truck_id`),
  UNIQUE KEY `truck_id` (`truck_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `trucks`
--

LOCK TABLES `trucks` WRITE;
/*!40000 ALTER TABLE `trucks` DISABLE KEYS */;
INSERT INTO `trucks` VALUES (2,1,2,0,'Other Town','12345'),(3,2,1,1,'New York','12456');
/*!40000 ALTER TABLE `trucks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL auto_increment,
  `user_name` varchar(32) collate utf8_bin NOT NULL,
  `user_pass` varchar(32) collate utf8_bin NOT NULL,
  `user_email` varchar(50) collate utf8_bin NOT NULL,
  `user_level` int(2) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','159159','admin@admin.com',1),(2,'unno','159159','unno@unno.com',2),(3,'robert','bain2001','robertbain2001@gmail.com',2),(4,'test','test','robertbain2001@yahoo.com',1),(5,'unnnno','159159','unno@unno.lt',2);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-12-13 21:57:15
