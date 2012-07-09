-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 09, 2012 at 08:57 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `allstatewwh`
--

-- --------------------------------------------------------

--
-- Table structure for table `cargos`
--

CREATE TABLE IF NOT EXISTS `cargos` (
  `cargo_id` int(11) NOT NULL,
  `cargo_owner` int(11) NOT NULL,
  `cargo_start_city` varchar(50) COLLATE utf8_bin NOT NULL,
  `cargo_start_address` varchar(255) COLLATE utf8_bin NOT NULL,
  `cargo_start_zip` char(5) COLLATE utf8_bin NOT NULL,
  `cargo_stop_state` char(2) COLLATE utf8_bin NOT NULL,
  `cargo_stop_city` varchar(50) COLLATE utf8_bin NOT NULL,
  `cargo_stop_address` varchar(255) COLLATE utf8_bin NOT NULL,
  `cargo_stop_zip` char(5) COLLATE utf8_bin NOT NULL,
  `cargo_millage` decimal(10,2) NOT NULL,
  PRIMARY KEY (`cargo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `company_phone` varchar(12) COLLATE utf8_bin NOT NULL,
  `company_fax` varchar(12) COLLATE utf8_bin DEFAULT NULL,
  `company_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `company_state` char(2) COLLATE utf8_bin NOT NULL,
  `company_city` varchar(50) COLLATE utf8_bin NOT NULL,
  `company_address` varchar(255) COLLATE utf8_bin NOT NULL,
  `company_owner` int(11) NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`) VALUES
(1, 'USA'),
(2, 'Canada');

-- --------------------------------------------------------

--
-- Table structure for table `loads`
--

CREATE TABLE IF NOT EXISTS `loads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `loads`
--

INSERT INTO `loads` (`id`, `owner`, `startState`, `startCity`, `startZip`, `endState`, `endCity`, `endZip`, `weight`, `feet`, `pickupDate`, `diliveryDate`, `truckType`, `company`, `email`, `phone`, `extra`) VALUES
(24, 8, 'AL', 'San Jose', '001', 'AL', 'Los Angeles', '002', '100', '50', '2012-07-07', '2012-07-14', '3', '', 'adilshakar@gmail.com', '+923459549921', 'First Shippers Co'),
(21, 8, 'CA', 'San Jose', '001', 'CA', 'Los Angeles', '002', '100', '100', '2013-07-07', '2012-07-14', '2', '', 'adilshakar@gmail.com', '+923459549921', 'First Shippers Co'),
(23, 8, 'CA', 'San Jose', '001', 'CA', 'Los Angeles', '002', '100', '100', '2012-07-07', '2012-07-14', '3', '', 'adilshakar@gmail.com', '+923459549921', 'First Shippers Co'),
(22, 8, 'CA', 'San Jose', '001', 'CA', 'Los Angeles', '002', '100', '100', '2012-07-07', '2012-07-14', '3', '', 'adilshakar@gmail.com', '+923459549921', 'First Shippers Co');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=11 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `member_username`, `member_email`, `member_pass`, `member_role`, `member_company`, `member_phone`) VALUES
(8, 'shipper', 'adilshakar@gmail.com', 'shipper', 3, NULL, NULL),
(9, 'trucker', 'robertbain2001@gmail.com', 'trucker', 4, NULL, NULL),
(10, 'combo', 'combo@gmail.com', 'combo', 2, NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_posted`, `news_text`) VALUES
(1, 'Hello world', '2011-03-08 22:28:52', 'sit malesuada lacus pellus parturpiscing Pellenterdumat maecenatoque cras a magna nibh et quis diam ames et Laoremvolutpat ac dolor eget eget temper lacus vestibus velit lacus venean Magnaipsum tellus morbi leo aliquat nulla convallis pellentesque'),
(2, 'Hello', '2011-03-08 22:28:52', 'sit malesuada lacus pellus parturpiscing. Pellenterdumat maecenatoque cras a magna nibh et quis diam ames et. Laoremvolutpat ac dolor eget eget temper lacus vestibus velit lacus venean. Magnaipsum tellus morbi leo aliquat nulla convallis pellentesque.'),
(3, 'asada', '2012-05-31 10:58:05', 'zcadadadada'),
(4, 'Hello', '2012-06-02 07:25:28', 'test 123 test 123');

-- --------------------------------------------------------

--
-- Table structure for table `newtrucks`
--

CREATE TABLE IF NOT EXISTS `newtrucks` (
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `startingDate` date NOT NULL,
  `endDate` date NOT NULL,
  `via` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `newtrucks`
--

INSERT INTO `newtrucks` (`owner`, `public`, `s_state`, `s_city`, `s_zip`, `e_state`, `e_city`, `e_zip`, `team`, `full`, `weight`, `feet`, `feet_left`, `type`, `phone`, `email`, `created`, `id`, `startingDate`, `endDate`, `via`) VALUES
(9, 1, 'CA', 'San Jose', '001', 'CA', 'Los Angeles', '002', 0, 0, '200', '200', '200', '2', '+923459549921', 'adilshakar@gmail.com', '2012-07-06', 28, '2012-07-07', '2012-07-14', ''),
(9, 0, 'CA', 'San Jose', '001', 'CA', 'Los Angeles', '002', 0, 0, '100', '100', '100', '2', '+923459549921', 'adilshakar@gmail.com', '2012-06-28', 27, '2012-07-07', '2012-07-14', '');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Administrator'),
(2, 'Moderator'),
(3, 'Shipper'),
(4, 'Truck Driver');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `state` varchar(22) NOT NULL,
  `state_code` char(2) NOT NULL,
  PRIMARY KEY (`state_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`state`, `state_code`) VALUES
('Alaska', 'AK'),
('Alabama', 'AL'),
('Arkansas', 'AR'),
('Arizona', 'AZ'),
('California', 'CA'),
('Colorado', 'CO'),
('Connecticut', 'CT'),
('District of Columbia', 'DC'),
('Delaware', 'DE'),
('Florida', 'FL'),
('Georgia', 'GA'),
('Hawaii', 'HI'),
('Iowa', 'IA'),
('Idaho', 'ID'),
('Illinois', 'IL'),
('Indiana', 'IN'),
('Kansas', 'KS'),
('Kentucky', 'KY'),
('Louisiana', 'LA'),
('Massachusetts', 'MA'),
('Maryland', 'MD'),
('Maine', 'ME'),
('Michigan', 'MI'),
('Minnesota', 'MN'),
('Missouri', 'MO'),
('Mississippi', 'MS'),
('Montana', 'MT'),
('North Carolina', 'NC'),
('North Dakota', 'ND'),
('Nebraska', 'NE'),
('New Hampshire', 'NH'),
('New Jersey', 'NJ'),
('New Mexico', 'NM'),
('Nevada', 'NV'),
('New York', 'NY'),
('Ohio', 'OH'),
('Oklahoma', 'OK'),
('Oregon', 'OR'),
('Pennsylvania', 'PA'),
('Rhode Island', 'RI'),
('South Carolina', 'SC'),
('South Dakota', 'SD'),
('Tennessee', 'TN'),
('Texas', 'TX'),
('Utah', 'UT'),
('Virginia', 'VA'),
('Vermont', 'VT'),
('Washington', 'WA'),
('Wisconsin', 'WI'),
('West Virginia', 'WV'),
('Wyoming', 'WY');

-- --------------------------------------------------------

--
-- Table structure for table `trucks`
--

CREATE TABLE IF NOT EXISTS `trucks` (
  `truck_id` int(11) NOT NULL AUTO_INCREMENT,
  `truck_owner` int(11) NOT NULL,
  `truck_country` int(11) NOT NULL,
  `truck_type` int(11) NOT NULL,
  `truck_city` varchar(50) COLLATE utf8_bin NOT NULL,
  `truck_zip` char(5) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`truck_id`),
  UNIQUE KEY `truck_id` (`truck_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `trucks`
--

INSERT INTO `trucks` (`truck_id`, `truck_owner`, `truck_country`, `truck_type`, `truck_city`, `truck_zip`) VALUES
(2, 1, 2, 0, 'Other Town', '12345'),
(3, 2, 1, 1, 'New York', '12456');

-- --------------------------------------------------------

--
-- Table structure for table `truck_types`
--

CREATE TABLE IF NOT EXISTS `truck_types` (
  `truck_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `truck_type_name` varchar(200) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`truck_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Dumping data for table `truck_types`
--

INSERT INTO `truck_types` (`truck_type_id`, `truck_type_name`) VALUES
(1, 'Auto Carrier'),
(2, 'B-Train'),
(3, 'Container - Regular'),
(4, 'Container - Insulated');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(32) COLLATE utf8_bin NOT NULL,
  `user_pass` varchar(32) COLLATE utf8_bin NOT NULL,
  `user_email` varchar(50) COLLATE utf8_bin NOT NULL,
  `user_level` int(2) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_level`) VALUES
(1, 'admin', '159159', 'admin@admin.com', 1),
(2, 'unno', '159159', 'unno@unno.com', 2),
(3, 'robert', 'bain2001', 'robertbain2001@gmail.com', 2),
(4, 'test', 'test', 'robertbain2001@yahoo.com', 1),
(5, 'unnnno', '159159', 'unno@unno.lt', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
