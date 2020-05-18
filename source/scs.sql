-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2020 at 11:30 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scs`
--

-- --------------------------------------------------------

--
-- Table structure for table `agm_member`
--

CREATE TABLE `agm_member` (
  `Aid` char(10) NOT NULL,
  `emp_id` char(10) NOT NULL,
  `lead.flag` tinyint(1) NOT NULL,
  `detail` text DEFAULT NULL,
  `Pid` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `A_id` char(10) NOT NULL,
  `A_name` varchar(30) NOT NULL,
  `start_date` int(6) NOT NULL,
  `end_date` int(6) NOT NULL,
  `location` varchar(30) NOT NULL,
  `detail` text NOT NULL,
  `client` int(30) NOT NULL,
  `P_id` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` char(10) NOT NULL,
  `emp_name` varchar(30) NOT NULL,
  `tel.` char(16) NOT NULL,
  `rating` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_name`, `tel.`, `rating`) VALUES
('E00001', 'Captain Price', '886123456789', NULL),
('E00002', 'Simon Ghost', '866987654321', NULL),
('E00003', 'David Maso', '866000000000', NULL),
('E00004', 'Shu Zhi Wei', '866111111111', 'Summer Boy'),
('E00005', 'Gordon Wee', '866696969696', 'Good IN Respond');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `P_id` char(10) NOT NULL,
  `P_name` varchar(30) NOT NULL,
  `start_date` datetime(6) NOT NULL,
  `end_date` datetime(6) NOT NULL,
  `location` varchar(30) NOT NULL,
  `detail` text NOT NULL,
  `num_req` int(4) DEFAULT NULL,
  `client` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`P_id`, `P_name`, `start_date`, `end_date`, `location`, `detail`, `num_req`, `client`) VALUES
('P00001', 'Zhi Wee\'s family anniversary ', '2020-05-30 13:10:00.000000', '2020-05-30 17:00:00.000000', '台中市西屯區文華路9000號300樓', '溫馨的派對，奇幻風，家庭人數14人，4小時歡樂活動。', 5, 'Zhi Wee');

-- --------------------------------------------------------

--
-- Table structure for table `project_member`
--

CREATE TABLE `project_member` (
  `P_id` char(10) NOT NULL,
  `emp_id` char(10) NOT NULL,
  `lead.flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_member`
--

INSERT INTO `project_member` (`P_id`, `emp_id`, `lead.flag`) VALUES
('P00001', 'E00001', 1),
('P00001', 'E00002', 0),
('P00001', 'E00003', 0),
('P00001', 'E00004', 0),
('P00001', 'E00005', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agm_member`
--
ALTER TABLE `agm_member`
  ADD PRIMARY KEY (`Aid`,`emp_id`) USING BTREE;

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`A_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`P_id`);

--
-- Indexes for table `project_member`
--
ALTER TABLE `project_member`
  ADD PRIMARY KEY (`P_id`,`emp_id`),
  ADD KEY `PmFKMid` (`emp_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `AsmFKPid` FOREIGN KEY (`A_id`) REFERENCES `project` (`P_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `project_member`
--
ALTER TABLE `project_member`
  ADD CONSTRAINT `PmFKMid` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PmFKPid` FOREIGN KEY (`P_id`) REFERENCES `project` (`P_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
