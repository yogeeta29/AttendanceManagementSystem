-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2017 at 10:43 AM
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
-- RELATIONSHIPS FOR TABLE `adminlogin`:
--

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`name`, `username`, `password`, `course_id`, `email_id`) VALUES
('', 'MBA', 'MBA', 102, 'mba@gmail.com'),
('Venkatesh Kamat', 'MCA', 'mca', 101, 'mca@gmail.com');

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

--
-- RELATIONSHIPS FOR TABLE `attendance`:
--   `course_id`
--       `courses` -> `course_id`
--   `dept_name`
--       `department` -> `dept_name`
--   `fact_id`
--       `faculty` -> `fact_id`
--   `sub_id`
--       `subjects` -> `sub_id`
--   `stud_id`
--       `student` -> `stud_id`
--

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
-- RELATIONSHIPS FOR TABLE `courses`:
--   `dept_name`
--       `department` -> `dept_name`
--

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
-- RELATIONSHIPS FOR TABLE `department`:
--

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

--
-- RELATIONSHIPS FOR TABLE `enroll`:
--   `course_id`
--       `adminlogin` -> `course_id`
--   `sub_id`
--       `subjects` -> `sub_id`
--   `stud_id`
--       `student` -> `stud_id`
--

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`stud_id`, `course_id`, `sub_id`) VALUES
('1701', 101, 201),
('1701', 101, 202),
('1701', 101, 203),
('1701', 101, 204),
('1701', 101, 205),
('1701', 101, 206),
('1703', 101, 201),
('1703', 101, 202),
('1703', 101, 203),
('1703', 101, 204),
('1703', 101, 205),
('1703', 101, 206),
('1704', 101, 201),
('1704', 101, 202),
('1704', 101, 203),
('1704', 101, 204),
('1704', 101, 205),
('1704', 101, 206);

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
-- RELATIONSHIPS FOR TABLE `faculty`:
--   `dept_name`
--       `department` -> `dept_name`
--

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fact_id`, `faculty_name`, `Last_Name`, `dept_name`, `email_id`) VALUES
(0, 'NULL', 'NULL', 'Default', 'NULL'),
(1000, 'Yma', 'Pinto', 'computer science', 'yma@gmail.com'),
(1001, 'Ramrao', 'Wagh', 'computer science', 'ramrao@gmail.com'),
(1002, 'Jyoti ', 'Pawar', 'computer science', 'Jyoti@gmail.com'),
(1003, 'Payaswani ', 'P', 'computer science', 'P@gmail.com');

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
-- RELATIONSHIPS FOR TABLE `facultylogin`:
--   `fact_id`
--       `faculty` -> `fact_id`
--   `dept_name`
--       `department` -> `dept_name`
--

--
-- Dumping data for table `facultylogin`
--

INSERT INTO `facultylogin` (`fact_id`, `username`, `password`, `dept_name`) VALUES
(1000, '1000Yma', 'Yma', 'computer science'),
(1001, '1001Ramrao', 'Ramrao', 'computer science'),
(1002, '1002Jyoti ', 'Jyoti ', 'computer science'),
(1003, '1003Payaswani ', 'Payaswani ', 'computer science');

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

--
-- RELATIONSHIPS FOR TABLE `logindetails`:
--   `stud_id`
--       `student` -> `stud_id`
--   `course_id`
--       `courses` -> `course_id`
--

--
-- Dumping data for table `logindetails`
--

INSERT INTO `logindetails` (`stud_id`, `course_id`, `username`, `password`) VALUES
('1701', 101, '1701', '1701'),
('1703', 101, '1703', '1703'),
('1704', 101, '1704', '1704'),
('1705', 101, '1705', '1705'),
('1706', 101, '1706', '1706'),
('1707', 101, '1707', '1707'),
('1708', 101, '1708', '1708'),
('1709', 101, '1709', '1709'),
('1710', 101, '1710', '1710'),
('1711', 101, '1711', '1711'),
('1713', 101, '1713', '1713'),
('1714', 101, '1714', '1714'),
('1715', 101, '1715', '1715'),
('1716', 101, '1716', '1716'),
('1717', 101, '1717', '1717'),
('1718', 101, '1718', '1718'),
('1719', 101, '1719', '1719'),
('1720', 101, '1720', '1720'),
('1721', 101, '1721', '1721'),
('1722', 101, '1722', '1722'),
('1723', 101, '1723', '1723'),
('1724', 101, '1724', '1724'),
('1725', 101, '1725', '1725'),
('1726', 101, '1726', '1726'),
('1727', 101, '1727', '1727'),
('1728', 101, '1728', '1728'),
('1729', 101, '1729', '1729'),
('1730', 101, '1730', '1730'),
('1731', 101, '1731', '1731'),
('1732', 101, '1732', '1732'),
('1733', 101, '1733', '1733'),
('1734', 101, '1734', '1734'),
('1735', 101, '1735', '1735');

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

--
-- RELATIONSHIPS FOR TABLE `notification`:
--

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

--
-- RELATIONSHIPS FOR TABLE `student`:
--   `course_id`
--       `adminlogin` -> `course_id`
--

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stud_id`, `stud_name`, `course_id`, `sem_no`, `dob`, `address`, `email_id`, `Phone_no`) VALUES
('1701', 'BABU JOSELIN JHONSON', 101, 2, '1996-03-26', 'PinCode:403107 H. No. 736 Devlaiwada Khandola Marcela Ponda-Goa', 'joselinjhonson09@gmail.com', 7798536769),
('1703', 'CHARI HARSHAD RAJA', 101, 2, '1990-05-26', 'H.N. 1545/B, AFRAMENTCURTORIM, SALCETE GOA403709', 'harshadchari.01123@gmail.com', 9763768341),
('1704', 'Dharne sahadev anand', 101, 2, '6/7/1994', 'Block no 54 building no 7 Gomeco residential campus bambolim goa', 'anandsahadev12@gmail.com', 7507405891),
('1705', 'LEONORA FERNANDES', 101, 2, '10/20/1996', 'H.No.240/5, Nirmala nagar, Xeldem, Quepem, Goa 403705', 'leonorafernandes20@gmail.com', 8605070802),
('1706', 'GAD  OMKAR  SAKHARAM', 101, 2, '12/6/1995', 'St. ESTEVAM,  JUVEM,  TONCA-WADA , TISWADI-GOA,  ILHAS 403106', 'omkargad007@gmail.com', 9689074013),
('1707', 'Gaonkar Sameer Zilu', 101, 2, '2/7/1996', 'H.no.71/2 Indrawada Gaondongarim Canacona-Goa 403702', 'sameergaonkar7@gmail.com', 9404145540),
('1708', 'Gupta Shubham Manager', 101, 2, '11/15/1996', 'H.no 567/2 devlaywada khandola marcel goa \n403107', 'shubg13@gmail.com', 8412871051),
('1709', 'JHA SWAPNIL KUMAR', 101, 2, '9/21/1994', 'CHAMUDA RESIDENCY; FLAT NUMBER 5/7 SVENTH FLOOR, BLOCK F\nNEAR GESTA HOTEL, CARZELEM, GOA\n403202', 'swapnilhanuman94@gmail.com', 9881722541),
('1710', 'KAUTHANKAR SHWETA', 101, 2, '2/14/1996', 'NEAR CIVIL COURT,MAUSWADA,PERNEM-GOA', 'sweta.kauthankar@gmail.com', 9168377552),
('1711', 'KENAUDEKAR PRATIK GAJANAN', 101, 2, '11/8/1986', 'HNo 760/19, Behind Chubby Cheeks Primary School, Alto-Porvorim, Goa-403521', 'scorp86@gmail.com', 9881064809),
('1713', 'KERKAR GAYATRI HANUMANT', 101, 2, '11-05-1996', 'HOUSE NUMBER 151/2 DEULWADA, SHIRIGAO ASSNORA GOA 403503', 'gayatrikerkar11@gmail.com', 7769042311),
('1714', 'MIRANDA SAVIO', 101, 2, '12/10/1995', 'H.No.361,NEAR AMUL ICE CREAM PARLOUR, AMBAJIM FATORDA MARGAO-GOA 403602', 'saviomiranda14813@gmail.com', 91),
('1715', 'Nagekar Dattesh Kamlakar', 101, 2, '07-12-1995', 'Hno-40, Mahalaxmi Residency, Behind Kalabhavan, Upasnagar, Sancoale, Goa, PIN:- 403726', 'datteshnagekar7667@gmail.com', 917507000000),
('1716', 'NAIK SAISARVESH ANIL', 101, 2, '5/30/1996', 'H.NO-2325 A1 CARRIAMODDI CURCHOREM GOA\nPIN CODE-403706', 'saisarvesh.naik007@gmail.com', 8007023761),
('1717', 'PAI SHUBHAM SAINATH', 101, 2, '5/3/1996', 'MC-15,First Floor, Goa Housing Board Colony, Antruz-Nagar, Ponda-Goa', 'paishubham737@gmail.com', 9158286885),
('1718', 'PATIL VISHWANATH PARSHURAM', 101, 2, '4/10/1996', '20 Pt. Colony, Socorro, Porvorim, Bardez - Goa 403501', 'vishwanath.patil1996@gmail.com', 8408998252),
('1719', 'Phoolwari Virendra Sheshmal', 101, 2, '12-07-1996', 'Flat no 5, Maurora House\n Aquem-403601\n Margao Goa', 'virend150@gmail.com', 9960426741),
('1720', 'PRABHUGAONKER KEDAR VENKATESH', 101, 2, '11/6/1996', 'C-S-3 Prabhu Residency, Near Socorro Village Panchayat, Porvorim - Bardez, Goa, 403521', 'prabhugaonkerkedar@gmail.com', 9921339569),
('1721', 'RAMNATHKER YOGESH UMESH', 101, 2, '01-10-1995', 'Hno.23 \n Gavthan Kavlem\n Ponda-Goa\n 403401', 'ramnathkerurvesh23@gmail.com', 8806685019),
('1722', 'Rawat Priti Dinesh', 101, 2, '2/2/1996', 'H/No. 653 Shantinagar Near Priya Workshop, Vasco-da-gama, Goa- 403802', 'rawatpriti56@gmail.com', 8390017460),
('1723', 'Sawant Abhishek Chandrakant', 101, 2, '06-04-1996', 'Surekha elite, FLAT NO:T-10, third floor, near al-noor building New-vaddem, vasco, Goa \n 403802', 'abhi14827@gmail.com', 9767889708),
('1724', 'SAWANT PRANITA SHRIDHAR', 101, 2, '11-12-1995', 'C-2/25,Junta Quarters,Pajifond Margao-Goa 403601', '1995sawantpranita@gmail.com', 8805472219),
('1725', 'Sheikh Afsar Harshad Ali', 101, 2, '7/2/1996', 'Flat No. S-4, Holycross Apts., Khorlim, Mapusa, Goa, 403507', 'sheikhafsar72@gmail.com', 7038137214),
('1726', 'Shet Kurtarkar Eshani Ramdas', 101, 2, '7/14/1996', 'UG-3, Bldg-A, Kurtarkar Excellency\nSwami Chinmayananda Marg\nGogol-Margao\nGoa- 403601', 'ekurtarkar@gmail.com', 8408080471),
('1727', 'Solanki Digvijay', 101, 2, '1/22/1997', 'T3 lila plaza , swatantra path,\nNear bank of baroda.Vasco,Goa\n403802', 'digv22@gmail.com', 8408022884),
('1728', 'TORCATO JEFF MARIO', 101, 2, '1996-02-14', 'S-1 Sneha Apts Behind Little\'s School Fatorda-Margao Goa 403602', 'jefftorcato@gmail.com', 918668411084),
('1729', 'Faaez Fazluddin', 101, 2, '4/2/1992', 'Mala, Panaji, 403001', 'Fazluddin.fayez@gmail.com', 917768946389),
('1730', 'NADAF RAJAHMED MEHBOOB', 101, 2, '9/16/1995', 'H. No. 23\nAquem Baixo \nNavelim \nSalcete Goa\n403707', 'rajahmednadaf3@gmail.com', 9765436450),
('1731', 'DIAS LLOYD PASCOAL', 101, 2, '5/17/1996', 'H. No:90/1 godhino ward calata salcete goa\nPin: 403713', 'diaslloydt@gmail.com', 9763032890),
('1732', 'RAO ANISH HARESH', 101, 2, '11/9/1994', 'F-2 THE OLIVE VIDHYANAGAR MARGAO, GOA 403601.', 'rao.anish63@gmail.com', 8830738447),
('1733', 'BORKAR SUYASH KISHOR', 101, 2, '10/9/1996', 'Hno 22/u Suyog Hsg Society Kirbhat Nuvem 403604', 'suyash531@gmail.com', 2790239),
('1734', 'Da Silva Craig Everest', 101, 2, '23-02-1995', 'E1/S11, Rawalnath Estate, Taleigao, Goa. 403002', 'craig95344@gmail.com', 7767026306),
('1735', 'Dias Agnelo', 101, 2, '10/14/1996', 'H.No 132/B Vaddo, Near Camorlim Church,Camorlim Salcete-Goa\n403-718', 'agnelo.dias17@gmail.com', 919765437208);

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
-- RELATIONSHIPS FOR TABLE `subjects`:
--   `fact_id`
--       `faculty` -> `fact_id`
--   `course_id`
--       `courses` -> `course_id`
--

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
-- RELATIONSHIPS FOR TABLE `timetable`:
--   `course_id`
--       `adminlogin` -> `course_id`
--

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
  MODIFY `SrNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for table adminlogin
--

--
-- Metadata for table attendance
--

--
-- Metadata for table courses
--

--
-- Metadata for table department
--

--
-- Metadata for table enroll
--

--
-- Metadata for table faculty
--

--
-- Metadata for table facultylogin
--

--
-- Metadata for table logindetails
--

--
-- Metadata for table notification
--

--
-- Metadata for table student
--

--
-- Metadata for table subjects
--

--
-- Metadata for table timetable
--

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'ams', 'timetable', '{\"sorted_col\":\"`Time`  ASC\"}', '2017-12-07 08:45:16');

--
-- Metadata for database ams
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
