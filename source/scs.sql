-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2020 at 02:48 PM
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
-- Database: `new_scs`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` char(10) NOT NULL,
  `emp_name` varchar(30) NOT NULL,
  `tel` char(16) NOT NULL,
  `rating` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_name`, `tel`, `rating`) VALUES
('E00001', '陳小春', '886934154834', NULL),
('E00002', '魏小庭', '866926710519', NULL),
('E00003', '曾小芳', '866925542827', NULL),
('E00004', '蔡小明', '866963240371', '工作配合度高，同事關係佳'),
('E00005', '吳小彥', '866982199853', NULL),
('E00006', '林小文', '886934817643', '工作配合度差，同事關係不佳'),
('E00007', '李小天', '886923140202', NULL),
('E00008', '溫小德', '886914986518', NULL),
('E00009', '廖小偉', '886920532693', NULL),
('E00010', '葉小丁', '886982960588', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `loc_pid` char(10) NOT NULL,
  `loc_addr` varchar(30) NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`loc_pid`, `loc_addr`, `lat`, `lng`) VALUES
('P00001', '407台中市西屯區文華路121-12號', 24.1801, 120.646),
('P00002', '407台中市西屯區西屯路二段236號', 24.1691, 120.648),
('P00003', '40743台中市西屯區福星路525號', 24.1772, 120.645);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `P_id` char(10) NOT NULL,
  `P_name` varchar(30) NOT NULL,
  `start_date` datetime(6) NOT NULL,
  `end_date` datetime(6) NOT NULL,
  `detail` text NOT NULL,
  `num_req` int(4) DEFAULT NULL,
  `client` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`P_id`, `P_name`, `start_date`, `end_date`, `detail`, `num_req`, `client`) VALUES
('P00001', '星火公司周年派對', '2020-05-30 13:10:00.000000', '2020-05-30 17:00:00.000000', '會場約100坪。 會場入口處須要擺置8架花束，前方兩側需要各一普通聚光燈以及大型音響，後方兩側各一普通音響，後方中間架設拍攝平台。', 5, '邱小源'),
('P00002', '張小伊 陳小軍 婚禮', '2020-06-10 17:00:00.000000', '2020-06-10 21:30:00.000000', '會場約60坪。 會場四周處須要擺置各4架花束，前方兩側需要各一普通音響，後方兩側各一普通音響，後方中間架設拍攝平台。', 3, '陳小軍'),
('P00003', '多視界影視公司 開業晚宴', '2020-06-15 17:00:00.000000', '2020-06-15 22:45:00.000000', '會場約80坪。 會場入口處須以氣球裝飾，前方兩側需要各一普通聚光燈以及普通音響，後方兩側各一普通音響，後方中間架設拍攝平台。', 2, '光小中');

-- --------------------------------------------------------

--
-- Table structure for table `project_member`
--

CREATE TABLE `project_member` (
  `Pid` char(10) NOT NULL,
  `emp_id` char(10) NOT NULL,
  `lead.flag` tinyint(1) NOT NULL,
  `detail` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_member`
--

INSERT INTO `project_member` (`Pid`, `emp_id`, `lead.flag`, `detail`) VALUES
('P00001', 'E00001', 1, '負責領導，監督工作，與客戶溝通'),
('P00001', 'E00002', 0, NULL),
('P00001', 'E00003', 0, NULL),
('P00001', 'E00004', 0, NULL),
('P00001', 'E00005', 0, NULL),
('P00001', 'E00007', 0, '負責布置門口部分'),
('P00002', 'E00006', 1, '負責領導，監督工作，與客戶溝通'),
('P00002', 'E00008', 0, NULL),
('P00003', 'E00009', 0, NULL),
('P00003', 'E00010', 1, '負責領導，監督工作，與客戶溝通');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`loc_pid`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`P_id`);

--
-- Indexes for table `project_member`
--
ALTER TABLE `project_member`
  ADD PRIMARY KEY (`Pid`,`emp_id`),
  ADD KEY `Prj_mem empid` (`emp_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`loc_pid`) REFERENCES `project` (`P_id`);

--
-- Constraints for table `project_member`
--
ALTER TABLE `project_member`
  ADD CONSTRAINT `Prj_mem empid` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`),
  ADD CONSTRAINT `Prj_mem pid` FOREIGN KEY (`Pid`) REFERENCES `project` (`P_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
