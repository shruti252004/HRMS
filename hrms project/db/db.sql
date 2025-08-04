-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2024 at 08:59 PM
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
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `emp_id` int(20) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `regular` int(10) NOT NULL,
  `holidays` int(10) NOT NULL,
  `off_days` int(10) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`emp_id`, `emp_name`, `regular`, `holidays`, `off_days`) VALUES
(1000, 'Liza Fen', 6, 0, 2),
(1001, 'Shraddha Kale', 6, 1, 2),
(1002, 'Shivani Salunke', 6, 0, 2),
(1003, 'Sam Motwani', 6, 4, 2),
(1004, 'Smita Pawar', 6, 2, 2),
(1005, 'Rina Roy', 6, 1, 2),
(1006, 'Taniya Shah', 6, 5, 2),
(1007, 'Lana Del', 6, 0, 2),
(1008, 'Rohit Gaikwad', 6, 1, 2),
(1009, 'Fiza Shaikh', 6, 3, 2);
SELECT * FROM attendance;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `emp_id` int(20) NOT NULL,
  `emp_name` varchar(20) NOT NULL,
  `department` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`emp_id`, `emp_name`, `department`) VALUES
(1000, 'Liza Fen', 'IT dept'),
(1001, 'Shraddha Kale', 'Project mgt'),
(1002, 'Shivani Salunke', 'Stationary'),
(1003, 'Sam Motwani', 'IT dept'),
(1004, 'Smita Pawar', 'Management'),
(1005, 'Rina Roy', 'Project mgt'),
(1006, 'Taniya Shah', 'Finance'),
(1007, 'Lana Del', 'IT Dept'),
(1008, 'Rohit Gaikwad', 'Management'),
(1009, 'FIza Shaikh', 'Finance');
SELECT * FROM department;


-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `department` varchar(20) NOT NULL,
  `position` varchar(20) NOT NULL,
  `salary` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_name`, `email`, `department`, `position`, `salary`) VALUES
(1000, 'Liza Fen', 'fenliza123@gmail.com', 'IT dept', 'System Analyst', '3,00,000'),
(1001, 'Shraddha Kale', 'kaleshraddha@gmail.com', 'Project Mgt', 'Project Sponsor', '60,000'),
(1002, 'Shivani Salunke', 'salunkeshivani@gamil.com', 'Stationary', 'Machine Technician', '20,000'),
(1003, 'Sam Motwani', 'motwanisami123@gmail.com', 'IT dept', 'Web developer', '3,00,000'),
(1004, 'Smita Pawar', 'smitap00@gmail.com', 'Management', 'Operations Manager', '50,000'),
(1005, 'Rina Roy', 'rinaroy65@gmail.com', 'Project Mgt', 'Junior Project  spon', '20,000'),
(1006, 'Taniya Shah', 'shahtaniya09@gmail.com', 'Finance', 'Finance Analyst', '70,000'),
(1007, 'Lana Del', 'lanadel22@gmail.com', 'IT dept', 'Software Engineer', '3,00,000'),
(1008, 'Rohit Gaikwad', 'gaikwadroh@gmail.com', 'Management', 'General Manager', '50,000'),
(1009, 'Fiza Shaikh', 'shaikhfiz20@gmail.com', 'Finance', 'Accountant', '70,000');
SELECT * FROM employee;


-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE `leave` (
  `emp_id` int(10) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `leave_status` varchar(50) NOT NULL,
  `no_of_leaves` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave`
--

INSERT INTO `leave` (`emp_id`, `emp_name`, `leave_status`, `no_of_leaves`) VALUES
(1000, 'Liza Fen', 'Urgency', 1),
(1001, 'Shraddha Kale', 'Sick Leave', 1),
(1002, 'Shivani Salunke', 'Personal', 1),
(1003, 'Sam Motwani', 'Vacation', 4),
(1004, 'Smita Pawar', 'Sick Leave', 2),
(1005, 'Rina Roy', 'Urgency', 1),
(1006, 'Taniya Shah', 'Personal issue', 5),
(1007, 'Lana Del', 'Sick Leave', 5),
(1008, 'Rohit Gaikwad', 'Bereavement leave', 1),
(1009, 'Fiza Shaikh', 'Urgency', 3);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `sal_amount` varchar(10) NOT NULL,
  `deparment` varchar(20) NOT NULL,
  `position` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`emp_id`, `emp_name`, `sal_amount`, `deparment`, `position`) VALUES
(1000, 'Liza Fen', '3,00,000', 'IT dept', 'System Analyst'),
(1001, 'Shraddha Kale', '60,000', 'Project mgt', 'Project Sponsor'),
(1002, 'Shivani Salunke', '20,000', 'Stationary', 'Machine Technician'),
(1003, 'Sam Motwani', '3,00,000', 'IT dept', 'Web developer'),
(1004, 'Smita Pawar', '50,000', 'Management', 'Operations Manager'),
(1005, 'Rina Roy', '60,000', 'Project mgt', 'Junior Project  sponsor '),
(1006, 'Taniya Shah', '70,000', 'Finance', 'Finance Analyst'),
(1007, 'Lana Del', '3,00,000', 'IT dept', 'Software Engineer'),
(1008, 'Rohit Gaikwad', '50,000', 'Management', 'General Manager'),
(1009, 'Fiza Shaikh', '70,000', 'Finance', 'Accountant');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `emp_id` int(10) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `attnd_report` varchar(30) NOT NULL,
  `performance` varchar(30) NOT NULL,
  `tasks` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`emp_id`, `emp_name`, `attnd_report`, `performance`, `tasks`) VALUES
(1000, 'Liza Fen', 'Excellent', 'Good', 'Complete'),
(1001, 'Shraddha Kale', 'Regular', 'Good', 'Complete'),
(1002, 'Shivani Salunke', 'Excellent', 'Good', 'Complete'),
(1003, 'Sam Motwani', 'Average', 'Average', 'Pending'),
(1004, 'Smita Pawar', 'Good', 'Good', 'Complete'),
(1005, 'Rina Roy', 'Good', 'Good', 'Complete'),
(1006, 'Taniya Shah', 'Below Average', 'Average', 'Pending'),
(1007, 'Lana Del', 'Excellent', 'Good', 'Complete'),
(1008, 'Rohit Gaikwad', 'Good', 'Excellent', 'Complete'),
(1009, 'Fiza Shaikh', 'Good', 'Average', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `emp_id` int(20) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `sal_amount` varchar(10) NOT NULL,
  `deparment` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`emp_id`, `emp_name`, `sal_amount`, `deductions`,'total_salary') VALUES
(1000, 'Liza Fen', '3,00,000', '20,000','2,80,000'),
(1001, 'Shraddha Kale', '60,000', '10,000','50,000'),
(1002, 'Shivani Salunke', '20,000', '1,000','19,000'),
(1003, 'Sam Motwani', '3,00,000', '20,000','2,80,000'),
(1004, 'Smita Pawar', '50,000', '15,000','35,000'),
(1005, 'Rina Roy', '60,000', '10,000','50,000'),
(1006, 'Taniya Shah', '70,000', '20,000','50,000'),
(1007, 'Lana Del', '3,00,000', '20,000','2,80,000'),
(1008, 'Rohit Gaikwad', '50,000', '15,000','35,000'),
(1009, 'Fiza Shaikh', '70,000', '20,000','50,000');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
