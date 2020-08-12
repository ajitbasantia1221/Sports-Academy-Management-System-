-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 10, 2019 at 01:07 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sports_academy`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `display`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `display` ()  select * from tournament$$

DROP PROCEDURE IF EXISTS `GetAge`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAge` ()  SELECT *, year(current_date())-year(Member_DOB) as age from MEMBER$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `PHONE` varchar(15) DEFAULT NULL,
  `MEMBER_ID` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`PHONE`, `MEMBER_ID`) VALUES
('9656896542', 'M101'),
('9959965632', 'M101'),
('9886785489', 'M101'),
('7895648973', 'M101'),
('8974623148', 'M101');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `COURSE_ID` varchar(20) NOT NULL,
  `COURSE_HEAD` varchar(20) DEFAULT NULL,
  `COURSE_FEE` int(5) DEFAULT NULL,
  PRIMARY KEY (`COURSE_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`COURSE_ID`, `COURSE_HEAD`, `COURSE_FEE`) VALUES
('01', 'SHYAM SINGH', 10000),
('02', 'BHUSHAN KUMAR', 15000),
('03', 'ASHUTOSH RAINA', 14000),
('04', 'SURESH PRASAD', 18000),
('05', 'ANIL KUMAR', 11000);

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `GAME_ID` varchar(10) NOT NULL,
  `GAME_NAME` varchar(10) DEFAULT NULL,
  `GAME_FEE` int(5) DEFAULT NULL,
  PRIMARY KEY (`GAME_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`GAME_ID`, `GAME_NAME`, `GAME_FEE`) VALUES
('GM001', 'CRICKET', 10000),
('GM002', 'TENNIS', 9000),
('GM003', 'BASKETBALL', 6000),
('GM004', 'FOOTBALL', 9000),
('GM005', 'BADMINTON', 8000);

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

DROP TABLE IF EXISTS `instructor`;
CREATE TABLE IF NOT EXISTS `instructor` (
  `INS_ID` varchar(10) NOT NULL,
  `INS_NAME` varchar(50) DEFAULT NULL,
  `COURSE_ID` varchar(20) DEFAULT NULL,
  `INS_SALARY` int(10) DEFAULT NULL,
  `Entry_Time` varchar(50) NOT NULL,
  PRIMARY KEY (`INS_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`INS_ID`, `INS_NAME`, `COURSE_ID`, `INS_SALARY`, `Entry_Time`) VALUES
('INS003', 'ARUN LAL', '03', 32000, '2019-11-10 17:30:06'),
('INS002', 'RAMESH VERMA', '02', 40000, '2019-11-10 17:29:09'),
('INS001', 'SUNIL THAKUR', '01', 45000, '2019-11-10 17:27:43'),
('INS004', 'ASHOK KUMAR', '04', 38000, '2019-11-10 17:30:06'),
('INS005', 'MANISH SINGH', '05', 42000, '2019-11-10 17:30:38');

--
-- Triggers `instructor`
--
DROP TRIGGER IF EXISTS `timestamp`;
DELIMITER $$
CREATE TRIGGER `timestamp` BEFORE INSERT ON `instructor` FOR EACH ROW set new.Entry_Time=now()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `MEMBER_ID` varchar(10) NOT NULL,
  `MEMBER_NAME` varchar(20) DEFAULT NULL,
  `PHONE` varchar(15) DEFAULT NULL,
  `MEMBER_DOB` varchar(10) DEFAULT NULL,
  `AGE` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`MEMBER_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`MEMBER_ID`, `MEMBER_NAME`, `PHONE`, `MEMBER_DOB`, `AGE`) VALUES
('M101', 'ABHINAV SINGH', '9656896542', '1974-03-27', NULL),
('M102', 'HARSHVARDHAN RAJ', '9959965632', '1975-11-12', NULL),
('M103', 'RAJESH RANJAN', '9886785489', '1972-05-19', NULL),
('M104', 'NAVEEN BHARTI', '7895648973', '1981-01-21', NULL),
('M105', 'AJAY CHOUDHARY', '8974623148', '1980-04-22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tournament`
--

DROP TABLE IF EXISTS `tournament`;
CREATE TABLE IF NOT EXISTS `tournament` (
  `TOUR_ID` varchar(20) NOT NULL,
  `PRIZE` int(5) DEFAULT NULL,
  `MEMBER_ID` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`TOUR_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tournament`
--

INSERT INTO `tournament` (`TOUR_ID`, `PRIZE`, `MEMBER_ID`) VALUES
('T501', 1500, 'M101'),
('T502', 1000, 'M102'),
('T503', 2500, 'M103'),
('T504', 2200, 'M104'),
('T505', 3000, 'M105');

-- --------------------------------------------------------

--
-- Table structure for table `tournament_loc`
--

DROP TABLE IF EXISTS `tournament_loc`;
CREATE TABLE IF NOT EXISTS `tournament_loc` (
  `LOC_ID` varchar(20) NOT NULL,
  `LOC_NAME` varchar(50) DEFAULT NULL,
  `LOC_AREA` varchar(20) DEFAULT NULL,
  `TOUR_ID` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`LOC_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tournament_loc`
--

INSERT INTO `tournament_loc` (`LOC_ID`, `LOC_NAME`, `LOC_AREA`, `TOUR_ID`) VALUES
('LC01', 'COMPLEX A', 'BANGALORE', 'T501'),
('LC02', 'COMPLEX B', 'MANGALORE', 'T502'),
('LC03', 'COMPLEX C', 'DELHI', 'T503'),
('LC04', 'COMPLEX D', 'MUMBAI', 'T504'),
('LC05', 'COMPLEX E', 'CHENNAI', 'T505');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
