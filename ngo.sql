-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2023 at 05:48 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ngo`
--

-- --------------------------------------------------------

--
-- Table structure for table `ngo`
--

CREATE TABLE `ngo` (
  `NAME` varchar(50) NOT NULL,
  `DES` longtext NOT NULL,
  `AVAILABILITY` tinyint(1) NOT NULL,
  `EMAIL` mediumtext NOT NULL,
  `PASSWORD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ngo`
--

INSERT INTO `ngo` (`NAME`, `DES`, `AVAILABILITY`, `EMAIL`, `PASSWORD`) VALUES
('Smile Foundation', 'noob', 0, 'vmr.manjeera@gmail.com', 'sfoundation123');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `NAME` varchar(50) NOT NULL,
  `USN` varchar(50) NOT NULL,
  `ADMN_NUM` int(11) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `DATE` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`NAME`, `USN`, `ADMN_NUM`, `EMAIL`, `PASSWORD`, `DATE`) VALUES
('John', '1NT19CS001', 22001, '1nt19cs001.john@nmit.ac.in', '123', '2023-01-13T16:05:51.742+00:00');

-- --------------------------------------------------------

--
-- Table structure for table `studngo`
--

CREATE TABLE `studngo` (
  `USN` varchar(50) NOT NULL,
  `NGO` varchar(50) NOT NULL,
  `HOURS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studngo`
--

INSERT INTO `studngo` (`USN`, `NGO`, `HOURS`) VALUES
('1NT19CS001', 'Smile Foundation', 4),
('1NT19CS002', 'Smile Foundation', 0),
('1NT19CS001', 'Smile Foundation', 0),
('1NT19CS001', 'Smile Charity', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ngo`
--
ALTER TABLE `ngo`
  ADD PRIMARY KEY (`NAME`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`USN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
