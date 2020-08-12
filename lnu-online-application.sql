-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 05, 2020 at 06:00 AM
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
CREATE DATABASE lnu-online-application; USE lnu-online-application;
-- --------------------------------------------------------

--
-- Table structure for table `admin_accounts`
--

CREATE TABLE `admin_accounts` (
  `id` int(11) NOT NULL,
  `uname` varchar(120) NOT NULL,
  `pword` varchar(120) NOT NULL,
  `role` varchar(120) NOT NULL,
  `office` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`id`, `uname`, `pword`, `role`, `office`) VALUES
(1, 'admin', 'admin', 'admin', '1'),
(2, 'sample', 'sample', 'interviewer', '11');

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
  `dateApprove` date NOT NULL,
  `applicationPeriod` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant_tbl`
--

INSERT INTO `applicant_tbl` (`applicantID`, `applicationType`, `returneeMonth`, `returneeYear`, `returneePasser`, `returneeSelectedCourse`, `firstCoursePreference`, `secondCoursePreference`, `lname`, `fname`, `mname`, `dateOfBirth`, `age`, `sex`, `civilStatus`, `citizenship`, `completeHomeAddress`, `completeCityAddress`, `telNo`, `mobileNo`, `emailAdd`, `applicationStatus`, `applicationDate`, `dateApprove`, `applicationPeriod`) VALUES
('202013184132198', 'returnee-applicant', '12', '2016', 'yes', 'bssw', 9, 5, 'Kyle Mcmahon', 'Jared Graves', 'Neve Dawson', '1977-11-02', 11, 'male', 'legally_separated', 'Laborum aliqua Eos ', 'Nisi qui consectetur', 'Eveniet deleniti su', 'Sed eos et ad a eaqu', 'Deleniti suscipit ve', 'atocayon27@gmail.com', 1, '2020-01-31', '2020-01-31', '1'),
('20201319471467', 'returnee-applicant', '6', '2012', 'yes', 'bsed', 13, 2, 'Devin Chang', 'Alexander Ayers', 'McKenzie Sloan', '2000-08-08', 88, 'female', 'legally_separated', 'Quis sed explicabo ', 'Dolore enim et delec', 'Distinctio Qui sit ', 'Quas dolorem dolorib', 'Minus odit quos culp', 'atocayon27@gmail.com', 2, '2020-01-31', '2020-01-31', '1'),
('2020225193059710', 'new-applicant', 'undefined', 'undefined', 'undefined', 'undefined', 7, 13, 'Gemma Solomon', 'Lewis Stein', 'Bevis Washington', '2009-01-03', 1, 'male', 'legally_separated', 'Accusamus sed praese', 'Facilis aut voluptat', 'Sed soluta quam fugi', 'Veniam fugiat cillu', 'Distinctio Est odi', 'xenuzu@mailinator.net', 2, '2020-02-25', '2020-02-25', '2'),
('20203191956524', 'returnee-applicant', '7', '2018', 'no', 'bacom', 9, 11, 'Kaye Mayer', 'Anjolie Gray', 'Harding Anthony', '1993-06-22', 56, 'male', 'single', 'Sit voluptates veli', 'Molestiae adipisci m', 'Cumque vero ea quasi', 'Reprehenderit iste e', 'Quam lorem nisi id l', 'dininowiqu@mailinator.net', 5, '2020-03-01', '2020-03-01', '3'),
('20203192026185', 'new-applicant', 'undefined', 'undefined', 'undefined', 'undefined', 6, 9, 'Ayanna Rocha', 'Tiger Leblanc', 'Hakeem Trevino', '2004-01-16', 47, 'male', 'single', 'Vel hic tempora susc', 'Qui atque ullamco er', 'Veniam ut accusamus', 'Id ullamco quisquam', 'Sequi adipisicing ex', 'gowa@mailinator.com', 2, '2020-03-01', '2020-03-01', '3');

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
(1, 2, '2019-2020', '2020-01-31', '2020-02-07', 0),
(2, 2, '2019-2020', '2020-02-25', '2020-02-28', 0),
(3, 2, '2018-2019', '2020-03-02', '2020-03-06', 1);

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
(6, '20201319471467', 'Nyssa Mccarty', 'Obcaecati eum ipsam ', 'In aliquid in aliqui'),
(7, '2020225193059710', 'Barbara Clements', 'Sint dolores pariatu', 'Eveniet eiusmod qui'),
(8, '2020225193059710', 'Cara Cleveland', 'Autem vero maiores i', 'Omnis pariatur Repe'),
(9, '20203191956524', 'Adara Burns', 'Commodi ex eos ullam', 'Vero eius optio ali'),
(10, '20203191956524', 'Nolan Joseph', 'Error tenetur quaera', 'Reprehenderit eum s'),
(11, '20203192026185', 'Mufutau Knox', 'Rerum voluptate dele', 'Voluptatem non eaque'),
(12, '20203192026185', 'Iliana Weiss', 'Ipsam illo qui rerum', 'Ex dolores optio re');

-- --------------------------------------------------------

--
-- Table structure for table `exam_period`
--

CREATE TABLE `exam_period` (
  `id` int(11) NOT NULL,
  `applicantID` varchar(120) NOT NULL,
  `exam_date` date NOT NULL,
  `application_period_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_period`
--

INSERT INTO `exam_period` (`id`, `applicantID`, `exam_date`, `application_period_id`) VALUES
(1, '202013184132198', '2020-02-07', 1),
(2, '20201319471467', '2020-02-07', 1),
(3, '2020225193059710', '2020-03-03', 2),
(4, '20203191956524', '2020-03-06', 3),
(5, '20203192026185', '2020-03-06', 3);

-- --------------------------------------------------------

--
-- Table structure for table `exam_result`
--

CREATE TABLE `exam_result` (
  `id` int(11) NOT NULL,
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
  `application_period` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_result`
--

INSERT INTO `exam_result` (`id`, `applicantID`, `art`, `sci`, `nat`, `pro`, `mec`, `ind`, `bus`, `sel`, `acc`, `hum`, `lea`, `phy`, `application_period`) VALUES
(1, '20203191956524', 1, 50, 80, 99, 97, 60, 25, 15, 15, 67, 50, 25, 3),
(2, '20203191956524', 60, 90, 40, 10, 60, 90, 90, 50, 60, 60, 90, 99, 3);

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
(3, '20201319471467', 'Et quas beatae et ma', 'Qui rerum consequunt', 'Quia recusandae Ven'),
(4, '2020225193059710', 'Vel est doloribus cu', 'Quis porro amet aut', 'Sint et ea aut aut i'),
(5, '20203191956524', 'Ad sit et autem mol', 'Nulla dolore aut tem', 'Culpa nisi veritatis'),
(6, '20203192026185', 'Repellendus Est an', 'Optio illum anim e', 'Beatae possimus ut ');

-- --------------------------------------------------------

--
-- Table structure for table `interview_period`
--

CREATE TABLE `interview_period` (
  `id` int(11) NOT NULL,
  `applicantID` varchar(120) NOT NULL,
  `interview_date` date NOT NULL,
  `application_period_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interview_period`
--

INSERT INTO `interview_period` (`id`, `applicantID`, `interview_date`, `application_period_id`) VALUES
(1, '20203191956524', '2020-03-03', 3);

-- --------------------------------------------------------

--
-- Table structure for table `interview_result`
--

CREATE TABLE `interview_result` (
  `id` int(11) NOT NULL,
  `applicantID` varchar(120) NOT NULL,
  `grammar` int(11) NOT NULL,
  `clarity` int(11) NOT NULL,
  `fluency` int(11) NOT NULL,
  `development_delivery_of_info` int(11) NOT NULL,
  `interest` int(11) NOT NULL,
  `application_period` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interview_result`
--

INSERT INTO `interview_result` (`id`, `applicantID`, `grammar`, `clarity`, `fluency`, `development_delivery_of_info`, `interest`, `application_period`) VALUES
(1, '20203191956524', 4, 5, 6, 7, 8, 3),
(2, '20203191956524', 4, 5, 6, 7, 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE `office` (
  `id` int(11) NOT NULL,
  `course` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(6, '20201319471467', 'Quemby Gonzalez', 'Dolorem consectetur', 'Molestiae minima aut', '1994-11-24', 'Consectetur et excep'),
(7, '2020225193059710', 'Portia Wilson', 'Qui repellendus Ius', 'Dolor laborum Adipi', '2000-09-15', 'Eaque ut sunt proide'),
(8, '2020225193059710', 'Ivy Nunez', 'Inventore quod ea ip', 'Id aut fugit except', '1981-06-19', 'Rem velit nihil inv'),
(9, '2020225193059710', 'Ima Mcclain', 'Iste qui nisi dolor ', 'Quia corporis vitae ', '1980-05-02', 'Consequatur ut labor'),
(10, '2020225193059710', 'Sean Sloan', 'Neque omnis proident', 'Quia qui non occaeca', '1980-09-05', 'Amet ab sunt qui v'),
(11, '20203191956524', 'Moses Keith', 'Vel possimus laboru', 'Fugiat voluptas maio', '2006-11-14', 'Fugit tenetur ipsum'),
(12, '20203191956524', 'Cullen Herman', 'Eius tempora maxime ', 'Id ipsa quis enim e', '1970-08-16', 'Laborum proident co'),
(13, '20203191956524', 'Wynter Petersen', 'Cumque elit vel fug', 'Aliquam laborum dolo', '1988-06-03', 'Distinctio Quas fug'),
(14, '20203191956524', 'Casey Massey', 'Occaecat dolore faci', 'Quia harum totam vol', '2012-07-09', 'Laudantium molestia'),
(15, '20203192026185', 'Ramona Baird', 'Corporis deserunt ex', 'Aliquip optio dolor', '1977-05-12', 'Voluptatem modi arch'),
(16, '20203192026185', 'Griffin Sellers', 'Repellendus Ullam d', 'Laborum aliquid ipsa', '1977-08-21', 'Sint in dolorum dolo'),
(17, '20203192026185', 'Germane Morrison', 'Quis impedit quia p', 'Iste molestias occae', '2008-00-03', 'Neque aliqua Expedi'),
(18, '20203192026185', 'Shea Jarvis', 'Beatae aut adipisci ', 'Possimus rerum temp', '2003-11-01', 'Consequatur aliquam ');

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
(3, '20201319471467', 'public', 'religious', 'Vitae nostrum amet ', 'Houston and Witt Plc', 'Neque sint aliqua V'),
(4, '2020225193059710', 'public', 'non-religious', 'Eligendi nobis incid', 'Brennan Rivas Inc', 'Ex tempora maiores e'),
(5, '20203191956524', 'private', 'non-religious', 'Consequatur Tempor ', 'Young and Vega Traders', 'Fugit harum quia qu'),
(6, '20203192026185', 'public', 'non-religious', 'Ea mollit molestias ', 'Gay Huff Trading', 'Praesentium est debi');

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
-- Indexes for table `exam_result`
--
ALTER TABLE `exam_result`
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
-- Indexes for table `interview_result`
--
ALTER TABLE `interview_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `application_period`
--
ALTER TABLE `application_period`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `application_status`
--
ALTER TABLE `application_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `characterreference_tbl`
--
ALTER TABLE `characterreference_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `exam_period`
--
ALTER TABLE `exam_period`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `exam_result`
--
ALTER TABLE `exam_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `guardian_tbl`
--
ALTER TABLE `guardian_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `interview_period`
--
ALTER TABLE `interview_period`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `interview_result`
--
ALTER TABLE `interview_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `office`
--
ALTER TABLE `office`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schoolattended_tbl`
--
ALTER TABLE `schoolattended_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `school_last_attended`
--
ALTER TABLE `school_last_attended`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
