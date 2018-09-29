-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2018 at 11:50 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `course_id` int(11) NOT NULL,
  `email_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`name`, `username`, `password`, `course_id`, `email_id`) VALUES
('', 'MBA', 'MBA', 102, 'mba@gmail.com'),
('admin', 'MCA', 'mca', 101, 'mca@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attd_date` varchar(30) NOT NULL,
  `Last_Date` varchar(30) NOT NULL,
  `stud_id` varchar(50) NOT NULL,
  `Present_Count` float DEFAULT '0',
  `Total_Classes` float DEFAULT NULL,
  `dept_name` varchar(20) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `sub_id` int(11) NOT NULL,
  `fact_id` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `dept_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `dept_name`) VALUES
(101, 'MCA', 'computer science'),
(102, 'MBA', 'MBA Department');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_name` varchar(30) NOT NULL,
  `locations` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_name`, `locations`) VALUES
('computer science', 'Marin science block'),
('Default', 'default'),
('MBA Department', 'B block');

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `stud_id` varchar(50) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `sub_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `fact_id` int(11) NOT NULL,
  `faculty_name` varchar(20) DEFAULT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `dept_name` varchar(20) NOT NULL,
  `email_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fact_id`, `faculty_name`, `Last_Name`, `dept_name`, `email_id`) VALUES
(0, 'NULL', 'NULL', 'Default', 'NULL'),
(1000, 'Yma', 'Pinto', 'computer science', 'yma@gmail.com'),
(1001, 'Ramrao', 'Wagh', 'computer science', 'ramrao@gmail.com'),
(1002, 'Jyoti ', 'Pawar', 'computer science', 'Jyoti@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `facultylogin`
--

CREATE TABLE `facultylogin` (
  `fact_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `dept_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facultylogin`
--

INSERT INTO `facultylogin` (`fact_id`, `username`, `password`, `dept_name`) VALUES
(1000, '1000Yma', 'Yma', 'computer science'),
(1001, '1001Ramrao', 'Ramrao', 'computer science'),
(1002, '1002Jyoti ', 'Jyoti ', 'computer science');

-- --------------------------------------------------------

--
-- Table structure for table `logindetails`
--

CREATE TABLE `logindetails` (
  `stud_id` varchar(50) NOT NULL,
  `course_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `SrNo` int(11) NOT NULL,
  `Sender` varchar(50) NOT NULL,
  `Topic` varchar(50) NOT NULL,
  `Target` varchar(30) NOT NULL,
  `Message` varchar(100) NOT NULL,
  `Date` varchar(30) NOT NULL,
  `Time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stud_id` varchar(50) NOT NULL,
  `stud_name` varchar(50) NOT NULL,
  `course_id` int(11) NOT NULL,
  `sem_no` int(11) DEFAULT NULL,
  `dob` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `email_id` varchar(50) NOT NULL,
  `Phone_no` bigint(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `course_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  `fact_id` int(11) DEFAULT '0',
  `Enroll_Key` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`course_id`, `sub_id`, `sub_name`, `fact_id`, `Enroll_Key`) VALUES
(101, 201, 'Data and File Structure', 1000, 201),
(101, 202, 'Operating System', 1000, 202),
(101, 203, 'Applied Operations Research', 1000, 203),
(101, 204, 'Probability and Statistics', 1000, 204),
(101, 205, 'Data and File Structure Lab', 1000, 205),
(101, 206, 'Operating System Lab', 1000, 206);

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `course_id` int(11) NOT NULL,
  `sem_no` int(11) NOT NULL,
  `lect_slot` int(11) NOT NULL,
  `StartTime` varchar(50) NOT NULL,
  `EndTime` varchar(50) NOT NULL,
  `Time` varchar(50) NOT NULL,
  `mon` varchar(30) NOT NULL,
  `tues` varchar(30) NOT NULL,
  `wed` varchar(30) NOT NULL,
  `thurs` varchar(30) NOT NULL,
  `fri` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`course_id`, `sem_no`, `lect_slot`, `StartTime`, `EndTime`, `Time`, `mon`, `tues`, `wed`, `thurs`, `fri`) VALUES
(101, 2, 1, '10:00', '11:30', '', '202', '203', '204', '203', '202'),
(101, 2, 2, '11:30', '13:00', '', '204', '201', '202', '201', '204'),
(101, 2, 3, '13:00', '14:00', '', '---', 'Break', '---', 'Time', '---'),
(101, 2, 4, '14:00', '15:00', '', '205/206', '205/206', '205/206', '205/206', '201'),
(101, 2, 5, '15:00', '16:00', '', '205/206', '205/206', '205/206', '205/206', '203'),
(101, 2, 6, '16:00', '17:00', '', '205/206', '205/206', '205/206', '205/206', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`username`),
  ADD KEY `adminlogin_ibfk_1` (`course_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`stud_id`,`sub_id`) USING BTREE,
  ADD KEY `stud_id` (`stud_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `sub_id` (`sub_id`),
  ADD KEY `fact_id` (`fact_id`),
  ADD KEY `dept_name` (`dept_name`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`,`course_name`),
  ADD KEY `dept_name` (`dept_name`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_name`);

--
-- Indexes for table `enroll`
--
ALTER TABLE `enroll`
  ADD PRIMARY KEY (`stud_id`,`sub_id`),
  ADD KEY `enroll_ibfk_2` (`course_id`),
  ADD KEY `enroll_ibfk_4` (`sub_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`fact_id`,`dept_name`),
  ADD KEY `dept_name` (`dept_name`);

--
-- Indexes for table `facultylogin`
--
ALTER TABLE `facultylogin`
  ADD PRIMARY KEY (`fact_id`,`username`),
  ADD KEY `facultylogin_ibfk_2` (`dept_name`);

--
-- Indexes for table `logindetails`
--
ALTER TABLE `logindetails`
  ADD PRIMARY KEY (`stud_id`,`username`),
  ADD KEY `stud_id` (`stud_id`),
  ADD KEY `logindetails_ibfk_2` (`course_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`SrNo`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stud_id`,`course_id`) USING BTREE,
  ADD KEY `stud_id` (`stud_id`) USING BTREE,
  ADD KEY `student_ibfk_1` (`course_id`),
  ADD KEY `stud_id_2` (`stud_id`,`course_id`) USING BTREE;

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`sub_id`,`course_id`),
  ADD KEY `course_id` (`course_id`) USING BTREE,
  ADD KEY `sub_id` (`sub_id`) USING BTREE,
  ADD KEY `subjects_ibfk_2` (`fact_id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`course_id`,`sem_no`,`lect_slot`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `SrNo` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_3` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendance_ibfk_5` FOREIGN KEY (`dept_name`) REFERENCES `department` (`dept_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendance_ibfk_6` FOREIGN KEY (`fact_id`) REFERENCES `faculty` (`fact_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `attendance_ibfk_8` FOREIGN KEY (`sub_id`) REFERENCES `subjects` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendance_ibfk_9` FOREIGN KEY (`stud_id`) REFERENCES `student` (`stud_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`dept_name`) REFERENCES `department` (`dept_name`);

--
-- Constraints for table `enroll`
--
ALTER TABLE `enroll`
  ADD CONSTRAINT `enroll_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `adminlogin` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enroll_ibfk_4` FOREIGN KEY (`sub_id`) REFERENCES `subjects` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enroll_ibfk_5` FOREIGN KEY (`stud_id`) REFERENCES `student` (`stud_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`dept_name`) REFERENCES `department` (`dept_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `facultylogin`
--
ALTER TABLE `facultylogin`
  ADD CONSTRAINT `facultylogin_ibfk_1` FOREIGN KEY (`fact_id`) REFERENCES `faculty` (`fact_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `facultylogin_ibfk_2` FOREIGN KEY (`dept_name`) REFERENCES `department` (`dept_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `logindetails`
--
ALTER TABLE `logindetails`
  ADD CONSTRAINT `logindetails_ibfk_1` FOREIGN KEY (`stud_id`) REFERENCES `student` (`stud_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `logindetails_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `adminlogin` (`course_id`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_2` FOREIGN KEY (`fact_id`) REFERENCES `faculty` (`fact_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `subjects_ibfk_3` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `timetable`
--
ALTER TABLE `timetable`
  ADD CONSTRAINT `timetable_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `adminlogin` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
