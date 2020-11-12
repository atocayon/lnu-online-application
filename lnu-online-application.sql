-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 12, 2020 at 04:52 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lnu-online-application`
--
CREATE DATABASE lnu_online_application; USE lnu_online_application;
-- --------------------------------------------------------

--
-- Table structure for table `admin_accounts`
--

DROP TABLE IF EXISTS `admin_accounts`;
CREATE TABLE IF NOT EXISTS `admin_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(120) NOT NULL,
  `pword` varchar(120) NOT NULL,
  `role` varchar(120) NOT NULL,
  `office` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`id`, `uname`, `pword`, `role`, `office`) VALUES
(1, 'admin', 'admin', 'admin', '1'),
(2, 'sample', 'sample', 'interviewer', '11'),
(3, 'qwerty', 'qwerty', 'admin', '8');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_tbl`
--

DROP TABLE IF EXISTS `applicant_tbl`;
CREATE TABLE IF NOT EXISTS `applicant_tbl` (
  `applicantID` varchar(120) NOT NULL,
  `applicationType` varchar(120) NOT NULL,
  `returneeMonth` varchar(120) NOT NULL,
  `returneeYear` varchar(120) NOT NULL,
  `returneePasser` varchar(120) NOT NULL,
  `returneeSelectedCourse` varchar(120) NOT NULL,
  `firstCoursePreference` int(120) NOT NULL,
  `secondCoursePreference` int(120) NOT NULL,
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
  `applicationDate` date NOT NULL,
  `dateApprove` date DEFAULT NULL,
  `applicationPeriod` varchar(11) NOT NULL,
  PRIMARY KEY (`applicantID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant_tbl`
--

INSERT INTO `applicant_tbl` (`applicantID`, `applicationType`, `returneeMonth`, `returneeYear`, `returneePasser`, `returneeSelectedCourse`, `firstCoursePreference`, `secondCoursePreference`, `lname`, `fname`, `mname`, `dateOfBirth`, `age`, `sex`, `civilStatus`, `citizenship`, `completeHomeAddress`, `completeCityAddress`, `telNo`, `mobileNo`, `emailAdd`, `applicationStatus`, `applicationDate`, `dateApprove`, `applicationPeriod`) VALUES
('20209892311342', 'returnee-applicant', '11', '1995', 'no', '8', 15, 9, 'Drew Garcia', 'Brynn Sherman', 'Rama Navarro', '1988-08-19', 63, 'male', 'widow', 'Facilis quibusdam mi', 'Expedita consequuntu', 'Modi velit exercitat', 'Ut esse magna adipi', 'Ut expedita dolore e', 'hafisev@mailinator.com', 2, '2020-09-08', '2020-09-08', '1'),
('20209894311634', 'returnee-applicant', '6', '1977', 'no', '3', 3, 4, 'Adrian Everett', 'Meghan Gamble', 'Chanda Serrano', '1989-01-07', 6, 'male', 'widow', 'Vitae numquam autem ', 'Deserunt est sed qua', 'Saepe ipsa quae dol', 'Necessitatibus dolor', 'Ea vero dolorem veli', 'gyfitijam@mailinator.com', 2, '2020-09-08', '2020-09-08', '1'),
('20209810216405', 'transferee-applicant', 'undefined', 'undefined', 'undefined', 'undefined', 11, 13, 'Kevin Curtis', 'Taylor Michael', 'Chadwick Mayer', '2005-02-25', 37, 'male', 'married', 'Qui molestiae sit v', 'In sed in voluptas i', 'A dolorem velit in p', 'Adipisicing aliquam ', 'Cumque voluptatem D', 'puhacelo@mailinator.com', 2, '2020-09-08', '2020-09-08', '1');

-- --------------------------------------------------------

--
-- Table structure for table `application_period`
--

DROP TABLE IF EXISTS `application_period`;
CREATE TABLE IF NOT EXISTS `application_period` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `term` int(11) NOT NULL,
  `school_year` varchar(120) NOT NULL,
  `dateStart` date NOT NULL,
  `dateEnd` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application_period`
--

INSERT INTO `application_period` (`id`, `term`, `school_year`, `dateStart`, `dateEnd`, `status`) VALUES
(1, 2, 'sample', '2020-09-08', '2020-09-18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `application_status`
--

DROP TABLE IF EXISTS `application_status`;
CREATE TABLE IF NOT EXISTS `application_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `characterreference_tbl`
--

INSERT INTO `characterreference_tbl` (`id`, `applicantID`, `name`, `address`, `contactNo`) VALUES
(1, '20209892311342', 'Arden Callahan', 'Quo in expedita ut n', 'Cum quia ex quos et '),
(2, '20209892311342', 'Joy Dyer', 'Corporis porro odit ', 'Quidem modi rerum si'),
(3, '20209894311634', 'Lee Shepherd', 'Facilis est dolores', 'Alias porro id repr'),
(4, '20209894311634', 'Amity Meyer', 'Voluptatibus velit e', 'Cupiditate amet ut '),
(5, '20209810216405', 'Melvin Hensley', 'Dicta accusantium ea', 'Eaque ut laudantium'),
(6, '20209810216405', 'Ashely Riddle', 'Sapiente voluptas do', 'Dolor architecto ad ');

-- --------------------------------------------------------

--
-- Table structure for table `exam_period`
--

DROP TABLE IF EXISTS `exam_period`;
CREATE TABLE IF NOT EXISTS `exam_period` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicantID` varchar(120) NOT NULL,
  `exam_date` date NOT NULL,
  `application_period_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `exam_result`
--

DROP TABLE IF EXISTS `exam_result`;
CREATE TABLE IF NOT EXISTS `exam_result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicantID` varchar(120) NOT NULL,
  `art` int(11) NOT NULL,
  `sci` int(11) NOT NULL,
  `nat` int(11) NOT NULL,
  `pro` int(11) NOT NULL,
  `mec` int(11) NOT NULL,
  `ind` int(11) NOT NULL,
  `bus` int(11) NOT NULL,
  `sel` int(11) NOT NULL,
  `acc` int(11) NOT NULL,
  `hum` int(11) NOT NULL,
  `lea` int(11) NOT NULL,
  `phy` int(11) NOT NULL,
  `application_period` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guardian_tbl`
--

INSERT INTO `guardian_tbl` (`id`, `applicantID`, `name`, `occupation`, `contactNo`) VALUES
(1, '20209892311342', 'Quia quaerat consequ', 'Laudantium maxime m', 'Sunt soluta sed fac'),
(2, '20209894311634', 'Tempora aliquam ut m', 'Quis animi odio qui', 'Repellendus Atque n'),
(3, '20209810216405', 'Nemo voluptas harum ', 'Modi aliqua Dolore ', 'Et illo facilis maxi');

-- --------------------------------------------------------

--
-- Table structure for table `interview_period`
--

DROP TABLE IF EXISTS `interview_period`;
CREATE TABLE IF NOT EXISTS `interview_period` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicantID` varchar(120) NOT NULL,
  `interview_date` date NOT NULL,
  `application_period_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `interview_result`
--

DROP TABLE IF EXISTS `interview_result`;
CREATE TABLE IF NOT EXISTS `interview_result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicantID` varchar(120) NOT NULL,
  `grammar` int(11) NOT NULL,
  `clarity` int(11) NOT NULL,
  `fluency` int(11) NOT NULL,
  `development_delivery_of_info` int(11) NOT NULL,
  `interest` int(11) NOT NULL,
  `application_period` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

DROP TABLE IF EXISTS `office`;
CREATE TABLE IF NOT EXISTS `office` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`id`, `course`) VALUES
(1, 'guidance'),
(2, 'Bachelor of Sciences in Information Technology'),
(3, 'Bachelor of Science in Social Work'),
(4, 'Bachelor of Arts in English Language'),
(5, 'Bachelor of Arts in Political Science'),
(6, 'Bachelor of Science in Social Work'),
(7, 'blis'),
(8, 'Bachelor of Sciences in Biology'),
(9, 'Bachelor of Science in Mathematics'),
(10, 'bsthrm'),
(11, 'bshae'),
(12, 'bshrm'),
(13, 'Bachelor of Elementary Education'),
(14, 'Bachelor of Secondary Education'),
(15, 'Bachelor of Arts in Communication');

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

DROP TABLE IF EXISTS `requirements`;
CREATE TABLE IF NOT EXISTS `requirements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicantID` varchar(120) NOT NULL,
  `file` varchar(120) NOT NULL,
  `dir` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `schoolattended_tbl`
--

DROP TABLE IF EXISTS `schoolattended_tbl`;
CREATE TABLE IF NOT EXISTS `schoolattended_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicantID` varchar(120) NOT NULL,
  `schoolName` varchar(120) NOT NULL,
  `address` varchar(120) NOT NULL,
  `level` varchar(120) NOT NULL,
  `inclusiveDate` date NOT NULL,
  `honorsAwardsReceived` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schoolattended_tbl`
--

INSERT INTO `schoolattended_tbl` (`id`, `applicantID`, `schoolName`, `address`, `level`, `inclusiveDate`, `honorsAwardsReceived`) VALUES
(1, '20209892311342', 'Wallace Bowen', 'Deserunt aliquip rat', 'Molestias recusandae', '1983-06-13', 'Natus illum et perf'),
(2, '20209892311342', 'Audra Mccullough', 'Consectetur at proi', 'Lorem anim officiis ', '2002-06-05', 'Voluptatem ratione '),
(3, '20209892311342', 'Wyatt Dalton', 'Tempor aut voluptas ', 'Aliquam perferendis ', '2010-05-16', 'Earum incididunt exc'),
(4, '20209892311342', 'Vincent Clark', 'Dolor soluta irure r', 'Nisi error velit ul', '1999-05-21', 'Esse dolor magnam a'),
(5, '20209894311634', 'Laith Hoffman', 'Blanditiis nihil nos', 'Repudiandae soluta f', '1987-10-21', 'Quia officia dolor l'),
(6, '20209894311634', 'Alexander Taylor', 'Id aut non duis omn', 'Dicta rerum doloribu', '1999-05-13', 'Vero maxime ex iste '),
(7, '20209894311634', 'Belle Lara', 'Cillum tempore reru', 'Qui est quis simili', '1975-10-19', 'Inventore commodo de'),
(8, '20209894311634', 'Courtney Macias', 'Aut labore impedit ', 'Omnis cumque sint a', '1978-07-31', 'Sint ullam enim blan'),
(9, '20209810216405', 'Morgan Daniel', 'Voluptatem odit asp', 'Delectus non aut at', '2005-07-03', 'Sed enim aut facilis'),
(10, '20209810216405', 'Asher Blankenship', 'Atque vitae quibusda', 'Officia tempor aliqu', '1999-05-21', 'Similique ipsum quia'),
(11, '20209810216405', 'Leigh Dixon', 'Aut rerum sit ut pra', 'Atque velit quae sus', '2020-02-06', 'Voluptatem qui hic c'),
(12, '20209810216405', 'Anthony Massey', 'Esse nisi odio dolor', 'Tempora sint volupta', '1998-04-06', 'Cupiditate occaecat ');

-- --------------------------------------------------------

--
-- Table structure for table `school_last_attended`
--

DROP TABLE IF EXISTS `school_last_attended`;
CREATE TABLE IF NOT EXISTS `school_last_attended` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicantID` varchar(120) NOT NULL,
  `type` varchar(120) NOT NULL,
  `category` varchar(120) NOT NULL,
  `generalWeightedAverage` varchar(120) NOT NULL,
  `membershipOrganization` varchar(120) NOT NULL,
  `hobbiesTalentsInterest` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
