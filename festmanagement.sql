-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2021 at 12:05 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `festmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `coordinator`
--

CREATE TABLE `coordinator` (
  `CodId` int(11) NOT NULL,
  `CodName` varchar(30) NOT NULL,
  `CodMobile` varchar(15) DEFAULT NULL,
  `DeptId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coordinator`
--

INSERT INTO `coordinator` (`CodId`, `CodName`, `CodMobile`, `DeptId`) VALUES
(1, 'Madhav Holla', '9845143090', 1),
(2, 'Madhura', '9900195090', 1),
(3, 'Parvat Gowda', '9160089611', 2),
(4, 'Ganga Gudi', '9966331200', 2),
(5, 'Jayaram', '9845006500', 3),
(6, 'Raghu', '9844660080', 3),
(7, 'Sadananda', '9661005041', 4),
(8, 'Kavya', '8449438475', 4),
(9, 'Shruthi', '8006992861', 5),
(10, 'Shafiq', '89745612002', 5);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `DeptId` int(11) NOT NULL,
  `DeptName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DeptId`, `DeptName`) VALUES
(1, 'Information Science and Engineering'),
(2, 'Computer Science and Engineering'),
(3, 'Civil Engineering'),
(4, 'Mechanical Engineering'),
(5, 'Electronics and Communication Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `EventId` int(11) NOT NULL,
  `EventName` varchar(50) NOT NULL,
  `RegFees` float(5,2) DEFAULT NULL,
  `CodId` int(11) NOT NULL,
  `DeptId` int(11) NOT NULL,
  `Venue` varchar(30) DEFAULT NULL,
  `TIME` varchar(10) DEFAULT NULL,
  `JudgeId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`EventId`, `EventName`, `RegFees`, `CodId`, `DeptId`, `Venue`, `TIME`, `JudgeId`) VALUES
(1, 'Cycle Tuli C Kali ', 50.00, 1, 1, 'Parking Lot', '10:00', 1),
(2, 'Water Kabbadi', 100.00, 2, 1, 'AC 301', '10:30', 2),
(3, 'Competitive Coding', 50.00, 3, 2, 'CSE Lab 1', '11:00', 3),
(4, 'Tech Ladder', 100.00, 4, 2, 'AC 301', '11:30', 4),
(5, 'Structure Capture', 100.00, 5, 3, 'Quarter Angle', '12:00', 5),
(6, 'Bridge It', 50.00, 6, 3, 'BC 301', '12:30', 6),
(7, 'Assembly Adventure', 50.00, 7, 4, 'Play ground stage', '13:00', 7),
(8, 'Terrain Survival', 200.00, 8, 4, 'Canteen area', '13:30', 8),
(9, 'Circuitrix', 50.00, 9, 5, 'IoT lab', '14:00', 9),
(10, 'RAM ROM Evoke', 50.00, 10, 5, 'Electrical Lab', '14:30', 10);

-- --------------------------------------------------------

--
-- Table structure for table `judge`
--

CREATE TABLE `judge` (
  `JudgeId` int(11) NOT NULL,
  `JudgeName` varchar(30) NOT NULL,
  `JudgeMobile` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `judge`
--

INSERT INTO `judge` (`JudgeId`, `JudgeName`, `JudgeMobile`) VALUES
(1, 'Raman', '9108163343'),
(2, 'Rajesh', '9006008420'),
(3, 'Ravi', '9845320154'),
(4, 'Mahesh', '9600110006'),
(5, 'Amar', '9116008124'),
(6, 'Aravind', '9264384512'),
(7, 'Ashok', '9631248520'),
(8, 'Arun', '8764382440'),
(9, 'Nagesh', '9558552010'),
(10, 'Thomas', '8861768050');

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `PId` int(11) NOT NULL,
  `PName` varchar(30) NOT NULL,
  `PMobile` varchar(15) DEFAULT NULL,
  `EventId` int(11) NOT NULL,
  `USN` varchar(15) NOT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `College` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`PId`, `PName`, `PMobile`, `EventId`, `USN`, `Gender`, `College`) VALUES
(1, 'Dhanush', '8050221479', 7, '1AT18IS027', 'Male', 'Atria Institute of Technology'),
(2, 'Ashish', '789241452', 8, '1AT18ME006', 'Male', 'Atria Institute of Technology'),
(3, 'Aditya', '9886008764', 3, '1AT18CS007', 'Male', 'Atria Institute of Technology'),
(4, 'Vishwas', '6363732164', 2, '1AT18CV052', 'Male', 'Atria Institute of Technology'),
(5, 'Sudeep', '9545060081', 10, '1AT18ME045', 'Male', 'Atria Institute of Technology'),
(6, 'Girish', '6362227892', 6, '1AT18CV013', 'Male', 'Atria Institute of Technology'),
(7, 'Srinivas', '8618634542', 9, '1ST18EE102', 'Male', 'Sapthagiri College of Engineering'),
(8, 'Karan', '7086134592', 5, '1DS18CT015', 'Male', 'Dayananda Sagara College of Engineering'),
(9, 'Anoop', '9886435928', 4, '1PU18CS010', 'Male', 'Presidency School of Engineering'),
(10, 'Goutam Hegde', '9449438475', 1, '1AT18IS032', 'Male', 'Atria Institute of Technology'),
(11, 'Vijay', '9845143090', 7, '1SM18EC050', 'Male', 'Sambhram Institute of Technology'),
(12, 'Raghotam', '8845531286', 1, '1At18IS065', 'Male', 'Atria Institute of Technology'),
(13, 'Bheema', '8852267892', 7, '1RV18CS002', 'Male', 'R V College of Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `winners`
--

CREATE TABLE `winners` (
  `WId` int(11) NOT NULL,
  `EventId` int(11) NOT NULL,
  `PId` int(11) NOT NULL,
  `Place` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `winners`
--

INSERT INTO `winners` (`WId`, `EventId`, `PId`, `Place`) VALUES
(1, 7, 1, '1'),
(2, 1, 10, '1'),
(3, 7, 11, '2'),
(4, 8, 2, '1'),
(5, 6, 6, '1'),
(6, 2, 4, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coordinator`
--
ALTER TABLE `coordinator`
  ADD PRIMARY KEY (`CodId`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DeptId`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`EventId`,`EventName`);

--
-- Indexes for table `judge`
--
ALTER TABLE `judge`
  ADD PRIMARY KEY (`JudgeId`);

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`PId`,`USN`),
  ADD UNIQUE KEY `PId` (`PId`);

--
-- Indexes for table `winners`
--
ALTER TABLE `winners`
  ADD PRIMARY KEY (`WId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
