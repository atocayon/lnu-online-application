-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 03, 2020 at 12:18 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

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
-- Table structure for table `admin_accounts`
--

CREATE TABLE `admin_accounts` (
  `id` int(11) NOT NULL,
  `uname` varchar(120) NOT NULL,
  `pword` varchar(120) NOT NULL,
  `role` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`id`, `uname`, `pword`, `role`) VALUES
(1, 'admin', 'admin', 'admin');

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
  `applicationDate` date NOT NULL,
  `dateApprove` date NOT NULL,
  `applicationPeriod` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant_tbl`
--

INSERT INTO `applicant_tbl` (`applicantID`, `applicationType`, `returneeMonth`, `returneeYear`, `returneePasser`, `returneeSelectedCourse`, `firstCoursePreference`, `secondCoursePreference`, `lname`, `fname`, `mname`, `dateOfBirth`, `age`, `sex`, `civilStatus`, `citizenship`, `completeHomeAddress`, `completeCityAddress`, `telNo`, `mobileNo`, `emailAdd`, `applicationStatus`, `applicationDate`, `dateApprove`, `applicationPeriod`) VALUES
('202013184132198', 'returnee-applicant', '12', '2016', 'yes', 'bssw', 'bsmath', 'baps', 'Kyle Mcmahon', 'Jared Graves', 'Neve Dawson', '1977-11-02', 11, 'male', 'legally_separated', 'Laborum aliqua Eos ', 'Nisi qui consectetur', 'Eveniet deleniti su', 'Sed eos et ad a eaqu', 'Deleniti suscipit ve', 'atocayon27@gmail.com', 2, '2020-01-31', '2020-01-31', '1'),
('20201319471467', 'returnee-applicant', '6', '2012', 'yes', 'bsed', 'beed', 'bsit', 'Devin Chang', 'Alexander Ayers', 'McKenzie Sloan', '2000-08-08', 88, 'female', 'legally_separated', 'Quis sed explicabo ', 'Dolore enim et delec', 'Distinctio Qui sit ', 'Quas dolorem dolorib', 'Minus odit quos culp', 'atocayon27@gmail.com', 2, '2020-01-31', '2020-01-31', '1');

-- --------------------------------------------------------

--
-- Table structure for table `application_period`
--

CREATE TABLE `application_period` (
  `id` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  `school_year` varchar(120) NOT NULL,
  `dateStart` date NOT NULL,
  `dateEnd` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application_period`
--

INSERT INTO `application_period` (`id`, `term`, `school_year`, `dateStart`, `dateEnd`, `status`) VALUES
(1, 2, '2019-2020', '2020-01-31', '2020-02-07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `application_status`
--

CREATE TABLE `application_status` (
  `id` int(11) NOT NULL,
  `status` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application_status`
--

INSERT INTO `application_status` (`id`, `status`) VALUES
(1, 'for approval'),
(2, 'for exam'),
(3, 'for interview'),
(4, 'qualified');

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

--
-- Dumping data for table `characterreference_tbl`
--

INSERT INTO `characterreference_tbl` (`id`, `applicantID`, `name`, `address`, `contactNo`) VALUES
(1, '202013184132198', 'Rajah Compton', 'Culpa dolore commod', 'Ipsam molestias volu'),
(2, '202013184132198', 'Deborah Garner', 'Quis praesentium nis', 'Tempore quis autem '),
(3, '20201319471467', 'Ryan Galloway', 'Dolor aperiam autem ', 'Sit ex porro proiden'),
(4, '20201319471467', 'Nyssa Mccarty', 'Obcaecati eum ipsam ', 'In aliquid in aliqui'),
(5, '20201319471467', 'Ryan Galloway', 'Dolor aperiam autem ', 'Sit ex porro proiden'),
(6, '20201319471467', 'Nyssa Mccarty', 'Obcaecati eum ipsam ', 'In aliquid in aliqui');

-- --------------------------------------------------------

--
-- Table structure for table `exam_period`
--

CREATE TABLE `exam_period` (
  `id` int(11) NOT NULL,
  `applicantID` varchar(120) NOT NULL,
  `exam_date` date NOT NULL,
  `exam_time` time NOT NULL,
  `application_period_id` int(11) NOT NULL,
  `remarks` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_period`
--

INSERT INTO `exam_period` (`id`, `applicantID`, `exam_date`, `exam_time`, `application_period_id`, `remarks`) VALUES
(1, '202013184132198', '2020-02-07', '07:00:00', 1, 'n/a'),
(2, '20201319471467', '2020-02-07', '07:30:00', 1, 'n/a');

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
(1, '202013184132198', 'Nisi mollitia magnam', 'Et enim deserunt ut ', 'Pariatur Do possimu'),
(2, '20201319471467', 'Et quas beatae et ma', 'Qui rerum consequunt', 'Quia recusandae Ven'),
(3, '20201319471467', 'Et quas beatae et ma', 'Qui rerum consequunt', 'Quia recusandae Ven');

-- --------------------------------------------------------

--
-- Table structure for table `interview_period`
--

CREATE TABLE `interview_period` (
  `id` int(11) NOT NULL,
  `applicantID` varchar(120) NOT NULL,
  `interview_date` date NOT NULL,
  `interview_time` time NOT NULL,
  `application_period_id` int(11) NOT NULL,
  `remarks` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE `requirements` (
  `id` int(11) NOT NULL,
  `applicantID` varchar(120) NOT NULL,
  `file` varchar(120) NOT NULL,
  `dir` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

--
-- Dumping data for table `schoolattended_tbl`
--

INSERT INTO `schoolattended_tbl` (`id`, `applicantID`, `schoolName`, `address`, `level`, `inclusiveDate`, `honorsAwardsReceived`) VALUES
(1, '202013184132198', 'Mary Hatfield', 'Sed sequi incididunt', 'Ex minima in expedit', '1996-02-25', 'Voluptas aut accusan'),
(2, '202013184132198', 'Chadwick Lambert', 'Ut sequi error facil', 'Placeat fugiat aut', '1988-02-01', 'Sit magni sunt harum'),
(3, '202013184132198', 'Willow Pacheco', 'Id dolor similique ', 'Sint eos velit maxim', '2009-11-16', 'Doloremque incidunt'),
(4, '202013184132198', 'Henry Dunn', 'Dolorum ad tempore ', 'Iusto veniam iste s', '2004-04-29', 'Officiis aut veniam'),
(5, '20201319471467', 'Quemby Gonzalez', 'Dolorem consectetur', 'Molestiae minima aut', '1994-11-24', 'Consectetur et excep'),
(6, '20201319471467', 'Quemby Gonzalez', 'Dolorem consectetur', 'Molestiae minima aut', '1994-11-24', 'Consectetur et excep');

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
-- Dumping data for table `school_last_attended`
--

INSERT INTO `school_last_attended` (`id`, `applicantID`, `type`, `category`, `generalWeightedAverage`, `membershipOrganization`, `hobbiesTalentsInterest`) VALUES
(1, '202013184132198', 'public', 'non-religious', 'Est labore dolor mi', 'Dickerson and Ruiz Co', 'Ex obcaecati volupta'),
(2, '20201319471467', 'public', 'religious', 'Vitae nostrum amet ', 'Houston and Witt Plc', 'Neque sint aliqua V'),
(3, '20201319471467', 'public', 'religious', 'Vitae nostrum amet ', 'Houston and Witt Plc', 'Neque sint aliqua V');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_tbl`
--
ALTER TABLE `applicant_tbl`
  ADD PRIMARY KEY (`applicantID`);

--
-- Indexes for table `application_period`
--
ALTER TABLE `application_period`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_status`
--
ALTER TABLE `application_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `characterreference_tbl`
--
ALTER TABLE `characterreference_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_period`
--
ALTER TABLE `exam_period`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guardian_tbl`
--
ALTER TABLE `guardian_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interview_period`
--
ALTER TABLE `interview_period`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requirements`
--
ALTER TABLE `requirements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schoolattended_tbl`
--
ALTER TABLE `schoolattended_tbl`
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
-- AUTO_INCREMENT for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `application_period`
--
ALTER TABLE `application_period`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `application_status`
--
ALTER TABLE `application_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `characterreference_tbl`
--
ALTER TABLE `characterreference_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `exam_period`
--
ALTER TABLE `exam_period`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `guardian_tbl`
--
ALTER TABLE `guardian_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `interview_period`
--
ALTER TABLE `interview_period`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schoolattended_tbl`
--
ALTER TABLE `schoolattended_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `school_last_attended`
--
ALTER TABLE `school_last_attended`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
