-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 03, 2019 at 02:01 PM
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
-- Database: `lnu-online-application`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant_tbl`
--

DROP TABLE IF EXISTS `applicant_tbl`;
CREATE TABLE IF NOT EXISTS `applicant_tbl` (
  `applicantID` int(11) NOT NULL,
  `applicationType` varchar(120) NOT NULL,
  `returneeMonth` varchar(120) NOT NULL,
  `returneeYear` varchar(120) NOT NULL,
  `returneePasser` varchar(120) NOT NULL,
  `returneeSelectedCourse` varchar(120) NOT NULL,
  `firstCoursePreference` varchar(120) NOT NULL,
  `secondCoursePreference` varchar(120) NOT NULL,
  `lname` varchar(120) NOT NULL,
  `fname` varchar(120) NOT NULL,
  `mname` varchar(120) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(120) NOT NULL,
  `civilStatus` varchar(120) NOT NULL,
  `citizenship` varchar(120) NOT NULL,
  `completeHomeAddress` varchar(120) NOT NULL,
  `completeCityAddress` varchar(120) NOT NULL,
  `telNo` varchar(120) NOT NULL,
  `mobileNo` varchar(120) NOT NULL,
  `emailAdd` varchar(120) NOT NULL,
  `applicationStatus` int(11) NOT NULL,
  `applicationDate` timestamp NOT NULL,
  `dateApprove` date NOT NULL,
  PRIMARY KEY (`applicantID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `characterreference_tbl`
--

DROP TABLE IF EXISTS `characterreference_tbl`;
CREATE TABLE IF NOT EXISTS `characterreference_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicantID` varchar(120) NOT NULL,
  `name` varchar(120) NOT NULL,
  `address` varchar(120) NOT NULL,
  `contactNo` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guardian_tbl`
--

DROP TABLE IF EXISTS `guardian_tbl`;
CREATE TABLE IF NOT EXISTS `guardian_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicantID` varchar(120) NOT NULL,
  `name` varchar(120) NOT NULL,
  `occupation` varchar(120) NOT NULL,
  `contactNo` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schoolattended_tbl`
--

DROP TABLE IF EXISTS `schoolattended_tbl`;
CREATE TABLE IF NOT EXISTS `schoolattended_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicantID` varchar(120) NOT NULL,
  `schoolType` varchar(50) NOT NULL,
  `schoolCategory` varchar(50) NOT NULL,
  `schoolName` varchar(120) NOT NULL,
  `address` varchar(120) NOT NULL,
  `level` varchar(120) NOT NULL,
  `inclusiveDate` date NOT NULL,
  `honorsAwardsReceived` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schoolrecords_tbl`
--

DROP TABLE IF EXISTS `schoolrecords_tbl`;
CREATE TABLE IF NOT EXISTS `schoolrecords_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicantID` varchar(120) NOT NULL,
  `generalWeightedAverage` varchar(120) NOT NULL,
  `membershipOrganization` varchar(120) NOT NULL,
  `hobbiesTalentsInterest` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
