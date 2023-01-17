-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2022 at 08:39 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yoyo_quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `quiz_list`
--

CREATE TABLE `quiz_list` (
  `Username` varchar(16) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Type` varchar(30) NOT NULL,
  `Quiz_Code` varchar(16) NOT NULL,
  `Total_point` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `NAME` varchar(30) NOT NULL,
  `TITLE` varchar(40) NOT NULL,
  `DOB` date NOT NULL,
  `CONTACT` bigint(10) NOT NULL,
  `USERNAME` varchar(16) NOT NULL,
  `PASSWORD` varchar(16) NOT NULL,
  `ROLE` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `score_board`
--

CREATE TABLE `score_board` (
  `Name` varchar(30) NOT NULL,
  `E_code` varchar(30) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Type_of_question` varchar(10) NOT NULL,
  `Point` int(10) NOT NULL,
  `Total_Point` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE `sports` (
  `Question_no` int(100) NOT NULL,
  `Question` varchar(500) NOT NULL,
  `Option_1` varchar(100) NOT NULL,
  `Option_2` varchar(100) NOT NULL,
  `Option_3` varchar(100) NOT NULL,
  `Option_4` varchar(100) NOT NULL,
  `Correct_option` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quiz_list`
--
ALTER TABLE `quiz_list`
  ADD PRIMARY KEY (`Quiz_Code`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`USERNAME`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
