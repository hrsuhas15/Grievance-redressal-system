-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 25, 2019 at 11:29 PM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.15-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grs`
--

-- --------------------------------------------------------

--
-- Table structure for table `ADMIN`
--

CREATE TABLE `ADMIN` (
  `adminId` int(10) NOT NULL,
  `categoryId` int(10) DEFAULT NULL,
  `adminName` varchar(50) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ADMIN`
--

INSERT INTO `ADMIN` (`adminId`, `categoryId`, `adminName`, `mobile`, `password`) VALUES
(1, 0, 'Suresh H N', 1234567890, '0192023a7bbd73250516f069df18b500'),
(2, 1, 'Sam', 1212121212, '332532dcfaa1cbf61e2a266bd723612c'),
(3, 2, 'Suhas', 8660011736, '332532dcfaa1cbf61e2a266bd723612c'),
(4, 3, 'Ram', 9148525140, '332532dcfaa1cbf61e2a266bd723612c'),
(9, 9, 'Abdul Shields', 48, '3a6aa7d09c652df23b4962820db38743'),
(10, 8, 'Amethyst Sawyer', 93, 'cd16bae8e1077c0634fc5c2ef5511cfc'),
(12, 4, 'Riley Rogers', 60, '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `CATEGORY`
--

CREATE TABLE `CATEGORY` (
  `categoryId` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` longtext NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CATEGORY`
--

INSERT INTO `CATEGORY` (`categoryId`, `name`, `details`, `creationDate`) VALUES
(0, 'General', 'Grievances that does not belongs to any Category', '2019-03-28 06:57:01'),
(1, 'Hostel issues', 'Issues Related to Hostel', '2019-02-27 01:40:55'),
(2, 'ISE Department', 'Problems related to ISE department', '2019-03-24 16:57:20'),
(3, 'CSE Department', 'Problems related to CSE department', '2019-03-25 01:00:35'),
(4, 'EC Department', 'Problems related to EC Departmet', '2019-03-25 15:57:47'),
(5, 'Administrative Issues ', 'problems related to administration', '2019-03-26 08:50:07'),
(8, 'Civil Department', 'problems related to civil Department', '2019-04-25 16:21:40'),
(9, 'Office', 'Office issues', '2019-04-25 16:23:00'),
(10, 'Mechanical Department', 'Issues related to mechanical department only', '2019-04-25 17:50:54');

-- --------------------------------------------------------

--
-- Table structure for table `FEEDBACK`
--

CREATE TABLE `FEEDBACK` (
  `usn` varchar(10) NOT NULL,
  `Details` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `FEEDBACK`
--

INSERT INTO `FEEDBACK` (`usn`, `Details`, `date`) VALUES
('1rv16is055', 'Rem minim nulla cons', '2019-04-25 17:51:36'),
('1rv16is055', 'Dolor quia neque tem', '2019-04-25 17:51:40');

-- --------------------------------------------------------

--
-- Table structure for table `GRIEVANCE`
--

CREATE TABLE `GRIEVANCE` (
  `grievanceId` int(10) NOT NULL,
  `usn` varchar(10) NOT NULL,
  `adminId` int(10) NOT NULL,
  `subject` mediumtext NOT NULL,
  `details` longtext NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Open',
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `GRIEVANCE`
--

INSERT INTO `GRIEVANCE` (`grievanceId`, `usn`, `adminId`, `subject`, `details`, `status`, `regDate`) VALUES
(1, '1RV16IS055', 1, 'Regarding Room clean', 'Workers are not comming properly to clean the rooms', 'remark', '2019-03-19 03:07:04'),
(2, '1RV17IS403', 1, 'mess Condition', 'Some Cracks are present in mess ', 'remark', '2019-03-19 03:25:58'),
(3, '1RV16IS055', 1, 'Regarding mess', 'tiffin provideing on wednesday are not good change it', 'remark', '2019-03-19 03:07:04'),
(4, '1RV17IS403', 2, 'Keyboard not working', 'some keyboards are not working in lab', 'remark', '2019-03-19 03:07:04'),
(193, '1RV16IS055', 2, 'Quod dolorem dolore ', 'Labore consectetur r', 'remark', '2019-04-01 16:59:43'),
(195, '1rv16is055', 3, 'Sed quia consequatur', 'Debitis nihil except', 'open', '2019-04-23 16:15:14'),
(196, '1rv16is055', 3, 'Sed quia consequatur', 'Debitis nihil except', 'remark', '2019-04-23 16:18:50'),
(197, '1rv16is055', 3, 'Sed quia consequatur', 'Debitis nihil except', 'open', '2019-04-23 16:18:59'),
(200, '1rv16is055', 2, 'Irure sequi occaecat', 'Quasi neque iure mod', 'remark', '2019-04-23 16:31:59'),
(201, '1rv16is055', 3, 'Quos et ea cumque om', 'Labore architecto ex', 'open', '2019-04-23 16:46:50');

-- --------------------------------------------------------

--
-- Table structure for table `REMARKS`
--

CREATE TABLE `REMARKS` (
  `grievanceId` int(10) NOT NULL,
  `remarks` longtext NOT NULL,
  `rating` int(5) NOT NULL DEFAULT '3',
  `remarkDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `REMARKS`
--

INSERT INTO `REMARKS` (`grievanceId`, `remarks`, `rating`, `remarkDate`) VALUES
(1, 'wdd', 3, '2019-04-24 10:37:56'),
(2, 'dsafava', 3, '2019-04-24 10:39:39'),
(3, 'It has been descussed in meeting from next week we change the shedule', 3, '2019-03-19 06:02:53'),
(4, 'it has been discussed in the mess meeting and we will use quality washing materials here after', 2, '2019-03-31 14:37:40'),
(193, 'sjidosv0d eafpxpv', 3, '2019-04-25 13:38:31'),
(196, 'u09u0q', 3, '2019-04-24 04:43:28'),
(200, 'fgvgds', 3, '2019-04-25 17:48:40');

-- --------------------------------------------------------

--
-- Table structure for table `STAFF`
--

CREATE TABLE `STAFF` (
  `categoryId` int(10) NOT NULL,
  `staffId` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `work` varchar(100) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `email` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `STAFF`
--

INSERT INTO `STAFF` (`categoryId`, `staffId`, `name`, `work`, `mobile`, `email`) VALUES
(2, 8, 'Keefe Guthrie', 'Bernard Callahan', 546, 'bernard.callahan@mailinator.net'),
(1, 14, 'Ramesh R', 'Hoste office incharge', 1231231234, 'hrsuhas15@gmail.com'),
(3, 15, 'Aiko Rhodes', 'A pariatur Esse il', 55, 'aiko.rhodes@mailinator.com'),
(3, 16, 'Nigel Mullen', 'Officia rerum explic', 57, 'nigel.mullen@mailinator.com'),
(2, 21, 'Brendan Padilla', 'Dolore in sunt ut mo', 25, 'brendan.padilla@mailinator.com'),
(3, 23, 'Melodie Hutchinson', 'Obcaecati laboriosam', 12, 'melodie.hutchinson@mailinator.net'),
(3, 24, 'Brynne Nash', 'Debitis soluta nihil', 100, 'brynne.nash@mailinator.net'),
(1, 25, 'Melissa Le', 'Doloribus suscipit c', 2522, 'melissa.le@mailinator.com'),
(1, 26, 'Quintessa Vance', 'Est iure qui consect', 4, 'quintessa.vance@mailinator.com'),
(3, 27, 'Audrey Sloan', 'Autem sit dolorem e', 86, 'audrey.sloan@mailinator.com'),
(3, 28, 'Harper Jordan', 'Sunt sint pariatur', 61, 'harper.jordan@mailinator.com');

-- --------------------------------------------------------

--
-- Table structure for table `USER`
--

CREATE TABLE `USER` (
  `usn` varchar(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `USER`
--

INSERT INTO `USER` (`usn`, `name`, `mobile`, `email`, `password`) VALUES
('1RV16IS055', 'Suhas R Hegde', 9148525140, 'hrsuhas15@gmail.com', '559e3ea609b545a204248a19d87ccfe4'),
('1RV17IS403', 'Kalifkhan sitnur', 8660011736, 'kalif@gmail.com', 'a5b538b8f9725b19db1e7b49ed1266d6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ADMIN`
--
ALTER TABLE `ADMIN`
  ADD PRIMARY KEY (`adminId`),
  ADD KEY `CAT_1` (`categoryId`);

--
-- Indexes for table `CATEGORY`
--
ALTER TABLE `CATEGORY`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `FEEDBACK`
--
ALTER TABLE `FEEDBACK`
  ADD KEY `fee` (`usn`);

--
-- Indexes for table `GRIEVANCE`
--
ALTER TABLE `GRIEVANCE`
  ADD PRIMARY KEY (`grievanceId`),
  ADD KEY `GRIEVANCE_ibfk_1` (`usn`),
  ADD KEY `GRIEVANCE_ibfk_2` (`adminId`);

--
-- Indexes for table `REMARKS`
--
ALTER TABLE `REMARKS`
  ADD PRIMARY KEY (`grievanceId`),
  ADD UNIQUE KEY `grievanceId` (`grievanceId`);

--
-- Indexes for table `STAFF`
--
ALTER TABLE `STAFF`
  ADD PRIMARY KEY (`staffId`),
  ADD KEY `stf` (`categoryId`);

--
-- Indexes for table `USER`
--
ALTER TABLE `USER`
  ADD PRIMARY KEY (`usn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ADMIN`
--
ALTER TABLE `ADMIN`
  MODIFY `adminId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `CATEGORY`
--
ALTER TABLE `CATEGORY`
  MODIFY `categoryId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `GRIEVANCE`
--
ALTER TABLE `GRIEVANCE`
  MODIFY `grievanceId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;
--
-- AUTO_INCREMENT for table `STAFF`
--
ALTER TABLE `STAFF`
  MODIFY `staffId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ADMIN`
--
ALTER TABLE `ADMIN`
  ADD CONSTRAINT `CAT_1` FOREIGN KEY (`categoryId`) REFERENCES `CATEGORY` (`categoryId`);

--
-- Constraints for table `FEEDBACK`
--
ALTER TABLE `FEEDBACK`
  ADD CONSTRAINT `fee` FOREIGN KEY (`usn`) REFERENCES `USER` (`usn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `GRIEVANCE`
--
ALTER TABLE `GRIEVANCE`
  ADD CONSTRAINT `GRIEVANCE_ibfk_1` FOREIGN KEY (`usn`) REFERENCES `USER` (`usn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `GRIEVANCE_ibfk_2` FOREIGN KEY (`adminId`) REFERENCES `ADMIN` (`adminId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `REMARKS`
--
ALTER TABLE `REMARKS`
  ADD CONSTRAINT `REM_1` FOREIGN KEY (`grievanceId`) REFERENCES `GRIEVANCE` (`grievanceId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `STAFF`
--
ALTER TABLE `STAFF`
  ADD CONSTRAINT `stf` FOREIGN KEY (`categoryId`) REFERENCES `CATEGORY` (`categoryId`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
