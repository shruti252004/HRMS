-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2024 at 09:33 AM
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
-- Database: `ccm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(10) DEFAULT NULL,
  `admin_name` varchar(120) DEFAULT NULL,
  `user_name` varchar(120) DEFAULT NULL,
  `mobile_no` bigint(10) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL,
  `registration_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `admin_name`, `user_name`, `mobile_no`, `email`, `password`, `registration_date`) VALUES
(1, 'Shruti', 'shrutik', 8987654321, 'shruti@gmail.com', 'jhgff5543f5g79766', '2024-09-09 05:59:36');

-- --------------------------------------------------------

--
-- Table structure for table `computers`
--

CREATE TABLE `computers` (
  `ID` int(10) NOT NULL,
  `computer_name` varchar(120) NOT NULL,
  `IPaddr` varchar(120) NOT NULL,
  `entry_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `computer_location` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `computers`
--

INSERT INTO `computers` (`ID`, `computer_name`, `IPaddr`, `entry_date`, `computer_location`) VALUES
(1, 'Acer', '127.0.0.1', '2024-03-25 03:55:30', 'Cabin101'),
(2, 'Dell', '128.0.0.1', '2024-03-27 04:50:21', 'Cabin102'),
(3, 'HP', '130.0.0.1', '2024-04-17 06:16:36', 'Cabin103'),
(4, 'Asus', '131.0.0.1', '2024-09-11 05:20:31', 'Cabin104'),
(5, 'Acer', '132.0.0.1', '2024-10-16 05:20:04', 'Cabin105'),
(6, 'Asus gaming laptop', '133.0.0.1', '2024-10-23 06:22:55', 'Cabin106'),
(7, 'Dell', '134.0.0.1', '2024-09-29 22:26:52', 'Cabin107'),
(8, 'HP', '135.0.0.1', '2024-10-02 07:15:12', 'Cabin108'),
(9, 'Aser Nitro', '136.0.0.1', '2024-11-13 03:28:53', 'Cabin109'),
(10, 'Dell', '123.0.0.1', '2024-11-13 06:29:38', 'Cabin110');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(10) DEFAULT NULL,
  `EntryID` varchar(20) DEFAULT NULL,
  `username` varchar(120) DEFAULT NULL,
  `useraddr` varchar(200) DEFAULT NULL,
  `mobile_number` bigint(10) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `computer_name` varchar(120) NOT NULL,
  `IDproof` varchar(120) NOT NULL,
  `intime` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `out_time` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `fees` varchar(120) DEFAULT NULL,
  `remark` varchar(20) DEFAULT NULL,
  `status` varchar(120) NOT NULL,
  `updation_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `EntryID`, `username`, `useraddr`, `mobile_number`, `email`, `computer_name`, `IDproof`, `intime`, `out_time`, `fees`, `remark`, `status`, `updation_date`) VALUES
(1, '345678', 'Pushkar Mishra', 'Pimpri', 4567893283, 'pushkarmitra11@gmail.com', 'Acer', 'EG4HI6790', '2024-09-09 06:41:44', '2024-09-09 09:40:56', '100', 'OK', 'Out', '2024-09-09 10:30:00'),
(2, '897654', 'Shanu Dev', 'Tapkir Mala', 9876546583, 'shanu123@gmail.com', 'Dell', 'F78HG548O', '2024-09-17 01:48:43', '2024-09-17 09:40:56', '120', 'OK', 'In', '2024-09-17 06:53:04'),
(3, '874325', 'Khushi Chourasia', 'Dhangar Chowk', 4532789532, 'chourasiakhushi22@gmail.com', 'HP', 'H75DS47H9', '2024-09-26 05:00:00', '2024-09-24 06:56:22', '100', 'OK', 'OUT', '2024-09-24 10:53:04'),
(4, '784389', 'Rina Roy', 'Kalewadi ', 7654346899, 'rina65@gmail.com', 'Asus', 'GH86S4J89', '2024-09-27 06:59:07', '2024-09-27 08:56:08', '200', 'NA', 'IN', '2024-09-27 09:59:07'),
(5, '345678', 'Pratham Bhosale', 'Pachpir Chowk', 2456378902, 'bhosale45@gmail.com', 'Asus', 'GY89S5FE6', '2024-10-03 05:08:56', '2024-10-03 07:22:00', '200', 'NA', 'Out', '2024-09-09 08:05:23'),
(6, '674839', 'Vilas Mali', 'Krishna Chawl', 56728937456, 'vilasm88@gmail.com', 'Asus gaming laptop', 'YHG89D5S78', '2024-09-18 06:11:46', '2024-09-18 07:00:43', '100', 'OK', 'In', '2024-09-18 07:11:46'),
(7, '45689', 'Tina Shaikh', 'Rahatani', 7895423049, 'shaikh@gmail.com', 'Dell', 'GU89DR359', '2024-10-04 05:18:05', '2024-10-04 09:50:11', '500', 'NA', 'In', '2024-10-05 08:18:05');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
