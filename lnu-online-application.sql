-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2019 at 04:06 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

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

CREATE TABLE `applicant_tbl` (
  `applicantID` varchar(120) NOT NULL,
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
  `applicationDate` date NOT NULL DEFAULT current_timestamp(),
  `dateApprove` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant_tbl`
--

INSERT INTO `applicant_tbl` (`applicantID`, `applicationType`, `returneeMonth`, `returneeYear`, `returneePasser`, `returneeSelectedCourse`, `firstCoursePreference`, `secondCoursePreference`, `lname`, `fname`, `mname`, `dateOfBirth`, `age`, `sex`, `civilStatus`, `citizenship`, `completeHomeAddress`, `completeCityAddress`, `telNo`, `mobileNo`, `emailAdd`, `applicationStatus`, `applicationDate`, `dateApprove`) VALUES
('2019113225640287', 'returnee-applicant', '5', '2002', 'no', 'bssw', 'bsbio', 'bssw', 'Stacy Hines', 'Garth Brewer', 'Zena Jarvis', '2006-11-13', 0, 'female', 'widow', 'In sit accusamus ei', 'Perferendis nisi nih', 'Beatae maxime unde a', 'Ullam consequatur q', 'Deserunt voluptatem', 'kozeryfaj@mailinator.net', 0, '2019-11-03', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `characterreference_tbl`
--

CREATE TABLE `characterreference_tbl` (
  `id` int(11) NOT NULL,
  `applicantID` varchar(120) NOT NULL,
  `name` varchar(120) NOT NULL,
  `address` varchar(120) NOT NULL,
  `contactNo` varchar(120) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guardian_tbl`
--

CREATE TABLE `guardian_tbl` (
  `id` int(11) NOT NULL,
  `applicantID` varchar(120) NOT NULL,
  `name` varchar(120) NOT NULL,
  `occupation` varchar(120) NOT NULL,
  `contactNo` varchar(120) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guardian_tbl`
--

INSERT INTO `guardian_tbl` (`id`, `applicantID`, `name`, `occupation`, `contactNo`) VALUES
(1, '2019113225640287', 'A provident est su', 'Sapiente quaerat sed', 'Quasi conse');

-- --------------------------------------------------------

--
-- Table structure for table `schoolattended_tbl`
--

CREATE TABLE `schoolattended_tbl` (
  `id` int(11) NOT NULL,
  `applicantID` varchar(120) NOT NULL,
  `schoolName` varchar(120) NOT NULL,
  `address` varchar(120) NOT NULL,
  `level` varchar(120) NOT NULL,
  `inclusiveDate` date NOT NULL,
  `honorsAwardsReceived` varchar(120) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schoolrecords_tbl`
--

CREATE TABLE `schoolrecords_tbl` (
  `id` int(11) NOT NULL,
  `applicantID` varchar(120) NOT NULL,
  `generalWeightedAverage` varchar(120) NOT NULL,
  `membershipOrganization` varchar(120) NOT NULL,
  `hobbiesTalentsInterest` varchar(120) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `school_last_attended`
--

CREATE TABLE `school_last_attended` (
  `id` int(11) NOT NULL,
  `applicantID` varchar(120) NOT NULL,
  `type` varchar(120) NOT NULL,
  `category` varchar(120) NOT NULL,
  `generalWeightedAverage` varchar(120) NOT NULL,
  `membershipOrganization` varchar(120) NOT NULL,
  `hobbiesTalentsInterest` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant_tbl`
--
ALTER TABLE `applicant_tbl`
  ADD PRIMARY KEY (`applicantID`);

--
-- Indexes for table `characterreference_tbl`
--
ALTER TABLE `characterreference_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guardian_tbl`
--
ALTER TABLE `guardian_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schoolattended_tbl`
--
ALTER TABLE `schoolattended_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schoolrecords_tbl`
--
ALTER TABLE `schoolrecords_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_last_attended`
--
ALTER TABLE `school_last_attended`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `characterreference_tbl`
--
ALTER TABLE `characterreference_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guardian_tbl`
--
ALTER TABLE `guardian_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schoolattended_tbl`
--
ALTER TABLE `schoolattended_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schoolrecords_tbl`
--
ALTER TABLE `schoolrecords_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_last_attended`
--
ALTER TABLE `school_last_attended`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
