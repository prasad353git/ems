-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 01, 2023 at 02:00 PM
-- Server version: 5.7.15-log
-- PHP Version: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covidtmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `room_num` varchar(255) NOT NULL,
  `slot1` char(255) NOT NULL DEFAULT '0',
  `slot2` char(255) NOT NULL DEFAULT '0',
  `slot3` char(255) NOT NULL DEFAULT '0',
  `slot4` char(255) NOT NULL DEFAULT '0',
  `slot5` char(255) NOT NULL DEFAULT '0',
  `slot6` char(255) NOT NULL DEFAULT '0',
  `slot7` char(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `room_num`, `slot1`, `slot2`, `slot3`, `slot4`, `slot5`, `slot6`, `slot7`) VALUES
(1, 'L314', '0', '0', '0', '0', '0', '0', '0'),
(2, 'L315', 'Staff1', '0', '0', '0', '0', '0', '0'),
(3, 'L316', '0', '0', '0', '0', '0', '0', '0'),
(4, 'L317', '0', '0', 'Staff1', '0', '0', '0', '0'),
(5, 'L318', '0', '0', '0', '0', '0', '0', '0'),
(6, 'L319', '0', '0', '0', 'Staff1', '0', '0', '0'),
(7, 'L320', '0', '0', '0', '0', '0', '0', '0'),
(8, 'L321', '0', '0', '0', '0', '0', '0', '0'),
(9, 'L322', '0', '0', '0', '0', '0', '0', '0'),
(10, 'L322', '0', '0', '0', '0', '0', '0', 'Staff1');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `usn` varchar(255) NOT NULL,
  `name` char(255) NOT NULL,
  `room` varchar(255) NOT NULL DEFAULT '0',
  `sem` int(11) NOT NULL,
  `branch` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `usn`, `name`, `room`, `sem`, `branch`) VALUES
(1, '1RF20CS100', 'dfffs', 'L314', 5, 'cse'),
(2, '1RF20ME101', 'dsasrg', '0', 5, 'me'),
(3, '1RF21EC103', 'htyfr', '0', 5, 'ece'),
(4, '1RF20CS104', 'earg', 'L314', 5, 'cse'),
(5, '1RF20CS105', 'asrg', 'L314', 5, 'cse'),
(6, '1RF20EC106', 'aevdv', '0', 5, 'ece'),
(7, '1RF20ME107', 'argradsgg', '0', 5, 'me'),
(8, '1RF20CS108', 'agrgs', 'L314', 5, 'cse'),
(9, '1RF20ME109', 'aerdsgddgasfg', '0', 5, 'me'),
(10, '1RF20EC110', 'dfdsfdfsfd', '0', 5, 'ece'),
(11, '1RF20CS111', 'asfsf', 'L314', 5, 'cse'),
(12, '1RF20CS112', 'arfsf', 'L314', 5, 'cse'),
(13, '1RF20EC113', 'asfsf', '0', 5, 'ece'),
(14, '1RF20ME114', 'afsafs', '0', 5, 'me'),
(15, '1RF20EC115', 'aerrf', '0', 5, 'ece');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `sem` int(11) NOT NULL,
  `branch` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject`, `code`, `sem`, `branch`) VALUES
(1, 'ME', '18CS51', 5, 'cse'),
(2, 'CN', '18CS52', 5, 'cse'),
(3, 'DBMS', '18CS53', 5, 'cse'),
(4, 'ATC', '18CS54', 5, 'cse'),
(5, 'ADP', '18CS55', 5, 'cse'),
(6, 'UP', '18CS56', 5, 'cse'),
(7, 'EVS', '18CIV59', 5, 'cse');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(11) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `AdminuserName` varchar(20) NOT NULL,
  `MobileNumber` int(10) NOT NULL,
  `Email` varchar(120) NOT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `AdminuserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(2, 'Admin', 'admin', 1234567890, 'admin@gmail.com', '1234', '2021-04-19 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblpatients`
--

CREATE TABLE `tblpatients` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(12) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `GovtIssuedId` varchar(150) DEFAULT NULL,
  `GovtIssuedIdNo` varchar(150) DEFAULT NULL,
  `FullAddress` varchar(255) DEFAULT NULL,
  `State` varchar(200) DEFAULT NULL,
  `RegistrationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpatients`
--

INSERT INTO `tblpatients` (`id`, `FullName`, `MobileNumber`, `DateOfBirth`, `GovtIssuedId`, `GovtIssuedIdNo`, `FullAddress`, `State`, `RegistrationDate`) VALUES
(1, 'Anuj kumar', 1234567890, '1999-02-01', 'Driving License', '342545445345', 'A83748 New Delhi India', 'Delhi', '2021-04-27 17:31:22'),
(2, 'Sarita', 6547893210, '1990-05-09', 'Pancard', 'HHHGHGH8888jh', 'H 826273 Noida', 'Uttar Pradesh', '2021-04-27 18:04:57'),
(4, 'Garima Singh', 4598520125, '2005-01-08', 'Pancard', 'DDDKJKJ454545H', 'A-1234 Patna', 'Bihar', '2021-05-08 05:49:44'),
(5, 'Amit Singh', 2536987410, '2007-06-01', 'PANCARD', 'HJGGHG76767HGGH', 'H 37334 New Delhi', 'Delhi', '2021-05-08 09:25:50'),
(6, 'Rahul Yadav', 1234567899, '2003-06-05', 'Driving License', '5435345', 'ABC 123 XYZ Street Noida', 'Uttar Pradesh', '2021-05-08 09:29:22');

-- --------------------------------------------------------

--
-- Table structure for table `tblphlebotomist`
--

CREATE TABLE `tblphlebotomist` (
  `id` int(11) NOT NULL,
  `EmpID` varchar(100) DEFAULT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(12) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblphlebotomist`
--

INSERT INTO `tblphlebotomist` (`id`, `EmpID`, `FullName`, `MobileNumber`, `RegDate`) VALUES
(3, '12587493', 'Amit Singh', 9876543212, '2021-05-03 04:51:44'),
(4, '105202365', 'Rahul', 8529631470, '2021-05-03 04:52:06'),
(5, '10802364', 'Sanjeev Tomar', 1234567890, '2021-05-08 09:34:11');

-- --------------------------------------------------------

--
-- Table structure for table `tblreporttracking`
--

CREATE TABLE `tblreporttracking` (
  `id` int(11) NOT NULL,
  `OrderNumber` bigint(40) DEFAULT NULL,
  `Remark` varchar(255) DEFAULT NULL,
  `Status` varchar(120) DEFAULT NULL,
  `PostingTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `RemarkBy` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblreporttracking`
--

INSERT INTO `tblreporttracking` (`id`, `OrderNumber`, `Remark`, `Status`, `PostingTime`, `RemarkBy`) VALUES
(1, 450040675, 'The Phlebotomist is on the way for collection.', 'On the Way for Collection', '2021-05-06 04:36:22', 2),
(6, 450040675, 'Sample collection.', 'Sample Collected', '2021-05-06 19:15:25', 2),
(7, 450040675, 'Sample sent to the lab.', 'Sent to Lab', '2021-05-06 19:15:48', 2),
(9, 450040675, 'Report uploaded.', 'Delivered', '2021-05-06 20:01:48', 2),
(10, 617325549, 'The phlebotomist is on the way to sample collection.', 'On the Way for Collection', '2021-05-07 04:44:38', 2),
(11, 617325549, 'Sample collected successfully.', 'Sample Collected', '2021-05-07 04:46:46', 2),
(12, 617325549, 'Sample sent to the lab.', 'Sent to Lab', '2021-05-07 04:51:25', 2),
(13, 617325549, 'Report uploaded.', 'Delivered', '2021-05-07 04:57:20', 2),
(14, 250482553, 'On the way for sample collection.', 'On the Way for Collection', '2021-05-08 09:31:42', 2),
(15, 250482553, 'Sample collected successfully', 'Sample Collected', '2021-05-08 09:32:06', 2),
(16, 250482553, 'Sample sent to lab', 'Sent to Lab', '2021-05-08 09:32:26', 2),
(17, 250482553, 'Report Uploaded', 'Delivered', '2021-05-08 09:32:51', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbltestrecord`
--

CREATE TABLE `tbltestrecord` (
  `id` int(11) NOT NULL,
  `OrderNumber` bigint(14) DEFAULT NULL,
  `PatientMobileNumber` bigint(14) DEFAULT NULL,
  `TestType` varchar(100) DEFAULT NULL,
  `TestTimeSlot` varchar(120) DEFAULT NULL,
  `ReportStatus` varchar(100) DEFAULT NULL,
  `FinalReport` varchar(150) DEFAULT NULL,
  `ReportUploadTime` varchar(200) DEFAULT NULL,
  `RegistrationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `AssignedtoEmpId` varchar(150) DEFAULT NULL,
  `AssigntoName` varchar(180) DEFAULT NULL,
  `AssignedTime` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltestrecord`
--

INSERT INTO `tbltestrecord` (`id`, `OrderNumber`, `PatientMobileNumber`, `TestType`, `TestTimeSlot`, `ReportStatus`, `FinalReport`, `ReportUploadTime`, `RegistrationDate`, `AssignedtoEmpId`, `AssigntoName`, `AssignedTime`) VALUES
(1, 450040675, 1234567890, 'Antigen', '2021-05-01T04:05', 'Delivered', '2c86e2aa7eb4cb4db70379e28fab9b521620331308.pdf', '07-05-2021 01:31:48 AM', '2021-04-27 17:31:23', '12587493', 'Amit Singh', '06-05-2021 10:05:22 AM'),
(2, 617325549, 6547893210, 'RT-PCR', '2021-05-01T05:10', 'Delivered', '2c86e2aa7eb4cb4db70379e28fab9b521620363440.pdf', '07-05-2021 10:27:20 AM', '2021-04-27 18:04:58', '105202365', 'Rahul', '07-05-2021 10:13:41 AM'),
(4, 740138296, 1234567890, 'RT-PCR', '2021-05-05T14:40', 'Assigned', NULL, NULL, '2021-04-27 19:10:30', '105202365', 'Rahul', '07-05-2021 03:52:05 PM'),
(5, 716060226, 4598520125, 'CB-NAAT', '2021-05-15T14:22', NULL, NULL, NULL, '2021-05-08 05:49:46', NULL, NULL, NULL),
(6, 599452326, 2536987410, 'CB-NAAT', '2021-05-20T19:00', NULL, NULL, NULL, '2021-05-08 09:25:50', NULL, NULL, NULL),
(7, 250482553, 1234567899, 'Antigen', '2021-05-11T15:00', 'Delivered', '2c86e2aa7eb4cb4db70379e28fab9b521620466371.pdf', '08-05-2021 03:02:51 PM', '2021-05-08 09:29:22', '12587493', 'Amit Singh', '08-05-2021 03:00:47 PM');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` char(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `desg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pwd`, `desg`) VALUES
(1, 'Staff1', 'staff@gmail.com', '1234', 2),
(2, 'admin', 'admin@gmail.com', '1234', 1),
(3, 'Staff2', 'staff2@gmail.com', '1234', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpatients`
--
ALTER TABLE `tblpatients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblphlebotomist`
--
ALTER TABLE `tblphlebotomist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblreporttracking`
--
ALTER TABLE `tblreporttracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltestrecord`
--
ALTER TABLE `tbltestrecord`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblpatients`
--
ALTER TABLE `tblpatients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tblphlebotomist`
--
ALTER TABLE `tblphlebotomist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tblreporttracking`
--
ALTER TABLE `tblreporttracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbltestrecord`
--
ALTER TABLE `tbltestrecord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
