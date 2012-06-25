-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 27, 2011 at 08:21 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `allstatewwh`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_username` varchar(50) COLLATE utf8_bin NOT NULL,
  `member_email` varchar(45) COLLATE utf8_bin NOT NULL,
  `member_pass` varchar(45) COLLATE utf8_bin NOT NULL,
  `member_role` tinyint(4) NOT NULL,
  `member_company` int(11) DEFAULT NULL,
  `member_phone` varchar(12) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`member_id`),
  UNIQUE KEY `member_email_UNIQUE` (`member_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `member_username`, `member_email`, `member_pass`, `member_role`, `member_company`, `member_phone`) VALUES
(1, 'unno', '159159', '123123', 1, NULL, NULL),
(3, 'jonas', 'jonas@jonas.lt', '159159', 4, NULL, NULL),
(4, 'test', 'robertbain2001@yahoo.com', 'test', 3, NULL, NULL),
(5, 'test5', 'test4', 'test5', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(255) COLLATE utf8_bin NOT NULL,
  `news_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `news_text` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=11 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_posted`, `news_text`) VALUES
(10, 'gabamm', '2011-03-14 19:08:52', 'bLukakksaksdksadk');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `short` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `short`) VALUES
(1, 'Administrator', 'admin'),
(2, 'Moderator', 'member'),
(3, 'Shipper', 'member'),
(4, 'Truck Driver', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `trucks`
--

CREATE TABLE IF NOT EXISTS `trucks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner` int(11) NOT NULL,
  `public` enum('0','1') COLLATE utf8_bin NOT NULL,
  `s_state` char(2) COLLATE utf8_bin DEFAULT NULL,
  `s_city` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `s_zip` int(5) unsigned zerofill DEFAULT NULL,
  `e_state` char(2) COLLATE utf8_bin DEFAULT NULL,
  `e_city` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `e_zip` int(5) unsigned zerofill DEFAULT NULL,
  `team` enum('0','1') COLLATE utf8_bin NOT NULL,
  `full` enum('0','1') COLLATE utf8_bin NOT NULL,
  `weight` int(11) DEFAULT NULL,
  `feet` int(11) DEFAULT NULL,
  `type` int(11) NOT NULL,
  `phone` varchar(45) COLLATE utf8_bin NOT NULL,
  `email` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `trucks`
--

INSERT INTO `trucks` (`id`, `owner`, `public`, `s_state`, `s_city`, `s_zip`, `e_state`, `e_city`, `e_zip`, `team`, `full`, `weight`, `feet`, `type`, `phone`, `email`, `created`) VALUES
(1, 1, '0', 'AL', 'adssa', 12456, 'AL', 'dasdasd', 12125, '1', '0', 1235, 158, 1, '1888888888', 'xpdarius@gmail.com', '2011-03-27'),
(2, 1, '1', 'AL', 'adssa', 12333, 'AR', 'adddd', 55532, '0', '1', 0, 158, 4, '188822234', 'xpdarius@gmail.com', '2011-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `truck_types`
--

CREATE TABLE IF NOT EXISTS `truck_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `truck_types`
--

INSERT INTO `truck_types` (`id`, `name`) VALUES
(1, 'Van'),
(2, 'Flat Bad'),
(3, 'AutoCarrier'),
(4, 'Tanker');
