-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2022 at 06:32 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trackingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `firstname`, `lastname`, `photo`, `created_on`) VALUES
(1, 'admin', '$2y$10$CodwRyUneJhIFgXPbrdQV.9vYHz0cfJRlLfSbH26LSthtyI7LL8r2', 'Admin', 'ICTD', 'profile.jpg', '2018-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(15) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `birthdate` date NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `position_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_id`, `firstname`, `lastname`, `address`, `birthdate`, `contact_info`, `gender`, `position_id`, `schedule_id`, `photo`, `created_on`) VALUES
(5, 'MSK820615347', 'Lowella', 'Viray', 'Blk 14 Lot 11\r\nPhase 2 Dela Costa Subdivision\r\nBrgy San Jose Montalban', '1979-07-15', '09232969321', 'Female', 3, 1, 'viray, lowella.jpg', '2022-03-22'),
(6, 'RZY231568790', 'Eric Emilio', 'Azanes', '', '1969-03-07', '09171667891', 'Male', 4, 3, 'azanes, eric.png', '2022-03-22'),
(7, 'RIF208567934', 'Agustin', 'Sopoco', '212-S Cherry Orcharge Suites Neptune cor Saturn Sts. Brgy. Tandang Sora, Quezon City', '1962-08-23', '0935-495-2670', 'Male', 5, 3, 'sopoco, august (1).jpg', '2022-03-22'),
(8, 'JRT138507469', 'John Henry', 'Canas', '', '0000-00-00', '', 'Male', 6, 1, 'canas, johnry.jpg', '2022-03-22'),
(9, 'WIK897510236', 'Nathaniel Paul', 'Bunag', '', '0000-00-00', '', 'Male', 8, 3, 'bunag, nathan.jpg', '2022-03-22'),
(10, 'QON920183756', 'Lawrence Miguel', 'Segui', '', '0000-00-00', '', 'Male', 7, 1, 'segui, lawrence (1).jpg', '2022-03-24');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `description` varchar(150) NOT NULL,
  `rate` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `description`, `rate`) VALUES
(3, 'Information Technology Officer III', 88000),
(4, 'Information Technology Officer II', 60000),
(5, 'Information Technology Officer I', 50000),
(6, 'Information Systems Analyst III', 50000),
(7, 'Information Systems Analyst I', 30000),
(8, 'Computer Maintenance Technician II', 40000);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `time_in`, `time_out`) VALUES
(1, '07:00:00', '16:00:00'),
(2, '08:00:00', '17:00:00'),
(3, '09:00:00', '18:00:00'),
(4, '10:00:00', '19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `TaskID` varchar(500) DEFAULT NULL,
  `TaskName` varchar(500) DEFAULT NULL,
  `BucketName` varchar(500) DEFAULT NULL,
  `Progress` varchar(500) DEFAULT NULL,
  `Priority` varchar(500) DEFAULT NULL,
  `AssignedTo` varchar(500) DEFAULT NULL,
  `CreatedBy` varchar(500) DEFAULT NULL,
  `CreatedDate` varchar(255) DEFAULT NULL,
  `StartDate` varchar(255) DEFAULT NULL,
  `DueDate` varchar(255) DEFAULT NULL,
  `Late` varchar(255) DEFAULT NULL,
  `CompletedDate` varchar(255) DEFAULT NULL,
  `CompletedBy` varchar(500) DEFAULT NULL,
  `Description` varchar(1000) DEFAULT NULL,
  `CompletedChecklistItems` varchar(255) DEFAULT NULL,
  `ChecklistItems` varchar(100) DEFAULT NULL,
  `Labels` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
