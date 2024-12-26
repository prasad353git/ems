-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 05, 2023 at 03:18 AM
-- Server version: 5.7.15-log
-- PHP Version: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(11) NOT NULL,
  `branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `branch`) VALUES
(1, 'CSE'),
(2, 'ISE'),
(3, 'ME'),
(4, 'ECE');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `room_num` varchar(255) NOT NULL,
  `2023-04-17 20:31` varchar(255) NOT NULL DEFAULT '0',
  `2023-04-17 20:52` varchar(255) NOT NULL DEFAULT '0',
  `2023-04-18 20:52` varchar(255) NOT NULL DEFAULT '0',
  `2023-04-18 09:00` varchar(255) NOT NULL DEFAULT '0',
  `2023-04-18 13:00` varchar(255) NOT NULL DEFAULT '0',
  `2023-04-19 09:00` varchar(255) NOT NULL DEFAULT '0',
  `2023-04-19 13:00` varchar(255) NOT NULL DEFAULT '0',
  `2023-04-17 21:23` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `room_num`, `2023-04-17 20:31`, `2023-04-17 20:52`, `2023-04-18 20:52`, `2023-04-18 09:00`, `2023-04-18 13:00`, `2023-04-19 09:00`, `2023-04-19 13:00`, `2023-04-17 21:23`) VALUES
(1, 'L314', '0', '0', '0', '0', '0', '0', '0', '0'),
(2, 'L315', '0', '0', '0', '0', '0', '0', '0', '0'),
(3, 'L316', '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room` varchar(255) NOT NULL,
  `2023-04-17 20:31` varchar(255) NOT NULL DEFAULT '0',
  `2023-04-17 20:52` varchar(255) NOT NULL DEFAULT '0',
  `2023-04-18 20:52` varchar(255) NOT NULL DEFAULT '0',
  `2023-04-18 09:00` varchar(255) NOT NULL DEFAULT '0',
  `2023-04-18 13:00` varchar(255) NOT NULL DEFAULT '0',
  `2023-04-19 09:00` varchar(255) NOT NULL DEFAULT '0',
  `2023-04-19 13:00` varchar(255) NOT NULL DEFAULT '0',
  `2023-04-17 21:23` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room`, `2023-04-17 20:31`, `2023-04-17 20:52`, `2023-04-18 20:52`, `2023-04-18 09:00`, `2023-04-18 13:00`, `2023-04-19 09:00`, `2023-04-19 13:00`, `2023-04-17 21:23`) VALUES
(1, 'L314', '0', '0', '0', '0', '0', '0', '0', '0'),
(2, 'L315', '0', '0', '0', '0', '0', '0', '0', '0'),
(3, 'L316', '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

CREATE TABLE `slots` (
  `id` int(11) NOT NULL,
  `slot` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `stime` varchar(255) NOT NULL,
  `etime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slots`
--

INSERT INTO `slots` (`id`, `slot`, `date`, `stime`, `etime`) VALUES
(12, '2023-04-17 20:31', '2023-04-17', '20:31', '23:31'),
(14, '2023-04-17 20:52', '2023-04-17', '20:52', '23:52'),
(15, '2023-04-18 20:52', '2023-04-18', '20:52', '23:52'),
(17, '2023-04-18 09:00', '2023-04-18', '09:00', '12:00'),
(18, '2023-04-18 13:00', '2023-04-18', '13:00', '15:00'),
(19, '2023-04-19 09:00', '2023-04-19', '09:00', '12:00'),
(20, '2023-04-19 13:00', '2023-04-19', '13:00', '15:00');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `usn` varchar(255) NOT NULL,
  `name` char(255) NOT NULL,
  `sem` int(11) NOT NULL,
  `branch` char(255) NOT NULL,
  `2023-04-17 20:31` varchar(255) NOT NULL DEFAULT '0',
  `2023-04-17 20:52` varchar(255) NOT NULL DEFAULT '0',
  `2023-04-18 20:52` varchar(255) NOT NULL DEFAULT '0',
  `2023-04-18 09:00` varchar(255) NOT NULL DEFAULT '0',
  `2023-04-18 13:00` varchar(255) NOT NULL DEFAULT '0',
  `2023-04-19 09:00` varchar(255) NOT NULL DEFAULT '0',
  `2023-04-19 13:00` varchar(255) NOT NULL DEFAULT '0',
  `2023-04-17 21:23` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `usn`, `name`, `sem`, `branch`, `2023-04-17 20:31`, `2023-04-17 20:52`, `2023-04-18 20:52`, `2023-04-18 09:00`, `2023-04-18 13:00`, `2023-04-19 09:00`, `2023-04-19 13:00`, `2023-04-17 21:23`) VALUES
(1, '1RF20CS100', 'dfffs', 5, 'cse', '0', '0', '0', '0', '0', '0', '0', '0'),
(2, '1RF20ME101', 'dsasrg', 5, 'me', '0', '0', '0', '0', '0', '0', '0', '0'),
(3, '1RF21EC103', 'htyfr', 5, 'ece', '0', '0', '0', '0', '0', '0', '0', '0'),
(4, '1RF20CS104', 'earg', 5, 'cse', '0', '0', '0', '0', '0', '0', '0', '0'),
(5, '1RF20CS105', 'asrg', 5, 'cse', '0', '0', '0', '0', '0', '0', '0', '0'),
(6, '1RF20EC106', 'aevdv', 5, 'ece', '0', '0', '0', '0', '0', '0', '0', '0'),
(7, '1RF20ME107', 'argradsgg', 5, 'me', '0', '0', '0', '0', '0', '0', '0', '0'),
(8, '1RF20CS108', 'agrgs', 5, 'cse', '0', '0', '0', '0', '0', '0', '0', '0'),
(9, '1RF20ME109', 'aerdsgddgasfg', 5, 'me', '0', '0', '0', '0', '0', '0', '0', '0'),
(10, '1RF20EC110', 'dfdsfdfsfd', 5, 'ece', '0', '0', '0', '0', '0', '0', '0', '0'),
(11, '1RF20CS111', 'asfsf', 5, 'cse', '0', '0', '0', '0', '0', '0', '0', '0'),
(12, '1RF20CS112', 'arfsf', 5, 'cse', '0', '0', '0', '0', '0', '0', '0', '0'),
(13, '1RF20EC113', 'asfsf', 5, 'ece', '0', '0', '0', '0', '0', '0', '0', '0'),
(14, '1RF20ME114', 'afsafs', 5, 'me', '0', '0', '0', '0', '0', '0', '0', '0'),
(15, '1RF20EC115', 'aerrf', 5, 'ece', '0', '0', '0', '0', '0', '0', '0', '0'),
(19, '1RF20CS06', 'abc', 5, 'cse', '0', '0', '0', '0', '0', '0', '0', '0'),
(20, '1RF20CS07', 'def', 5, 'cse', '0', '0', '0', '0', '0', '0', '0', '0'),
(21, '1RF20CS08', 'ghi', 5, 'cse', '0', '0', '0', '0', '0', '0', '0', '0'),
(22, '1RF20EC125', 'xdfg', 5, 'ece', '0', '0', '0', '0', '0', '0', '0', '0'),
(23, '1RF20EC126', 'dfgf', 5, 'ece', '0', '0', '0', '0', '0', '0', '0', '0'),
(24, '1RF20EC127', 'dfgf', 5, 'ece', '0', '0', '0', '0', '0', '0', '0', '0'),
(25, '1RF2EC128', 'dfgf', 5, 'ece', '0', '0', '0', '0', '0', '0', '0', '0'),
(26, '1RF20EC129', 'dfgf', 5, 'ece', '0', '0', '0', '0', '0', '0', '0', '0'),
(27, '1RF20EC130', 'dfgf', 5, 'ece', '0', '0', '0', '0', '0', '0', '0', '0'),
(28, '1RF20EC131', 'drrg', 5, 'ece', '0', '0', '0', '0', '0', '0', '0', '0'),
(29, '1RF20CS120', 'edrhtrhs', 5, 'cse', '0', '0', '0', '0', '0', '0', '0', '0'),
(30, '1RF20CS121', 'srgser', 5, 'cse', '0', '0', '0', '0', '0', '0', '0', '0'),
(31, '1RF20CS122', 'gsre', 5, 'cse', '0', '0', '0', '0', '0', '0', '0', '0'),
(32, '1RF20CS123', 'ery5ery', 5, 'cse', '0', '0', '0', '0', '0', '0', '0', '0'),
(33, '1RF20ME116', 'gyyer', 5, 'me', '0', '0', '0', '0', '0', '0', '0', '0'),
(34, '1RF20ME117', 'hsrth', 5, 'me', '0', '0', '0', '0', '0', '0', '0', '0'),
(35, '1RF20ME118', 'setht', 5, 'me', '0', '0', '0', '0', '0', '0', '0', '0'),
(36, '1RF20EC119', 'seteh', 5, 'ece', '0', '0', '0', '0', '0', '0', '0', '0'),
(37, '1RF20EC120', 'sth', 5, 'ece', '0', '0', '0', '0', '0', '0', '0', '0'),
(38, '1RF20EC121', 'sdth', 5, 'ece', '0', '0', '0', '0', '0', '0', '0', '0'),
(56, '1RF20EC122', 'tryet', 5, 'ECE', '0', '0', '0', '0', '0', '0', '0', '0');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` char(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `desg` int(11) NOT NULL,
  `sid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pwd`, `desg`, `sid`) VALUES
(1, 'Staff1', 'staff@gmail.com', '1234', 2, 11),
(2, 'admin', 'admin@gmail.com', '1234', 1, 0),
(3, 'Staff2', 'staff2@gmail.com', '1234', 2, 12),
(4, 'Staff3', 'staff3@gmail.com', '1234', 2, 13),
(5, 'Staff4', 'staff4@gmail.com', '1234', 2, 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slots`
--
ALTER TABLE `slots`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `slots`
--
ALTER TABLE `slots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
