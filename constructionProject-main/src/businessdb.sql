-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2024 at 02:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `businessdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `ID` int(11) NOT NULL,
  `pname` text NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `cname` text NOT NULL,
  `budget` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`ID`, `pname`, `sdate`, `edate`, `cname`, `budget`, `description`) VALUES
(5, 'dialog tower project', '2024-05-05', '2024-05-06', 'Rivindu', '120000', 'steel material tender');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `Project_ID` int(11) NOT NULL,
  `pName` varchar(50) NOT NULL,
  `pDescription` varchar(80) NOT NULL,
  `pManager` varchar(50) NOT NULL,
  `cName` varchar(50) NOT NULL,
  `budget` int(50) NOT NULL,
  `contactNo` varchar(50) NOT NULL,
  `projectStart` date NOT NULL,
  `filename` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`Project_ID`, `pName`, `pDescription`, `pManager`, `cName`, `budget`, `contactNo`, `projectStart`, `filename`) VALUES
(78, 'dialog tower project', ' Dialog extended an open invitation to all Sri Lankans to experience the innovat', 'Kavindu Pinsara', 'Dialog axiata', 1200, '0112455697', '2024-05-07', 'tower.png');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `Task_ID` int(11) NOT NULL,
  `taskName` varchar(50) NOT NULL,
  `assignTo` varchar(50) NOT NULL,
  `dueDate` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `prioritization` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`Task_ID`, `taskName`, `assignTo`, `dueDate`, `status`, `prioritization`) VALUES
(10, 'supply gathering', 'dialog tower project', '2024-05-16', 'incomplete', 5),
(11, 'project intialization', 'dialog tower project', '2024-05-07', 'complete', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(250) NOT NULL,
  `fullname` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `nic` text NOT NULL,
  `address` text NOT NULL,
  `email` text NOT NULL,
  `dob` date NOT NULL,
  `mobile` int(10) NOT NULL,
  `user_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `fullname`, `username`, `password`, `nic`, `address`, `email`, `dob`, `mobile`, `user_type`) VALUES
(17, 'Kavindu', 'kavindu', '123', '200212702332', 'galle', 'kavindu@mail.com', '2024-05-05', 771234567, 'pmanager'),
(18, 'Deshan', 'deshan', '123', '200212702332', 'galle', 'deshan@mail.com', '2024-05-07', 771234567, 'engineer'),
(19, 'Osura', 'osura', '123', '200212702332', 'galle', 'osura@mail.com', '2024-05-05', 771234562, 'accountant'),
(20, 'Pramuditha', 'pramuditha', '123', '200212702332', 'anuradhapura', 'pramuditha@mail.com', '2024-05-05', 776904156, 'subcontracter');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`Project_ID`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`Task_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `Project_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `Task_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
