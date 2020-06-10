-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-06-10 17:54:41
-- 伺服器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `new_scs`
--

-- --------------------------------------------------------

--
-- 資料表結構 `employee`
--

CREATE TABLE `employee` (
  `emp_id` char(10) NOT NULL,
  `emp_name` varchar(30) NOT NULL,
  `tel` char(16) NOT NULL,
  `rating` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `employee`
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
-- 替換檢視表以便查看 `emp_info`
-- (請參考以下實際畫面)
--
CREATE TABLE `emp_info` (
`emp_id` char(10)
,`emp_name` varchar(30)
,`tel` char(16)
,`rating` text
);

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `emp_proj`
-- (請參考以下實際畫面)
--
CREATE TABLE `emp_proj` (
`P_name` varchar(30)
,`P_id` char(10)
,`start_date` datetime(6)
,`end_date` datetime(6)
,`loc_addr` varchar(30)
,`emp_id` char(10)
);

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `emp_proj_info`
-- (請參考以下實際畫面)
--
CREATE TABLE `emp_proj_info` (
`P_id` char(10)
,`P_name` varchar(30)
,`start_date` datetime(6)
,`end_date` datetime(6)
,`loc_addr` varchar(30)
,`lead_id` char(10)
,`lead_name` varchar(30)
,`p_detail` text
,`emp_id` char(10)
,`emp_name` varchar(30)
,`e_detail` text
);

-- --------------------------------------------------------

--
-- 資料表結構 `location`
--

CREATE TABLE `location` (
  `loc_pid` char(10) NOT NULL,
  `loc_addr` varchar(30) NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `location`
--

INSERT INTO `location` (`loc_pid`, `loc_addr`, `lat`, `lng`) VALUES
('P00001', '407台中市西屯區文華路121-12號', 24.1801, 120.646),
('P00002', '407台中市西屯區西屯路二段236號', 24.1691, 120.648),
('P00003', '40743台中市西屯區福星路525號', 24.1772, 120.645);

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `mgr_cal`
-- (請參考以下實際畫面)
--
CREATE TABLE `mgr_cal` (
`P_id` char(10)
,`P_name` varchar(30)
,`client` varchar(30)
,`loc_addr` varchar(30)
,`start_date` datetime(6)
,`end_date` datetime(6)
);

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `mgr_emp`
-- (請參考以下實際畫面)
--
CREATE TABLE `mgr_emp` (
`emp_name` varchar(30)
,`emp_id` char(10)
,`rating` text
);

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `mgr_emp_info`
-- (請參考以下實際畫面)
--
CREATE TABLE `mgr_emp_info` (
`emp_id` char(10)
,`emp_name` varchar(30)
,`tel` char(16)
,`P_id` char(10)
,`P_name` varchar(30)
,`lead.flag` tinyint(1)
,`detail` text
);

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `mgr_proj`
-- (請參考以下實際畫面)
--
CREATE TABLE `mgr_proj` (
`P_name` varchar(30)
,`P_id` char(10)
,`start_date` datetime(6)
,`end_date` datetime(6)
,`loc_addr` varchar(30)
);

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `mgr_proj_info`
-- (請參考以下實際畫面)
--
CREATE TABLE `mgr_proj_info` (
`P_id` char(10)
,`P_name` varchar(30)
,`start_date` datetime(6)
,`end_date` datetime(6)
,`loc_addr` varchar(30)
,`p_detail` text
,`num_req` int(4)
,`client` varchar(30)
,`lead_id` char(10)
,`lead_name` varchar(30)
);

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `mgr_proj_info_emp`
-- (請參考以下實際畫面)
--
CREATE TABLE `mgr_proj_info_emp` (
`Pid` char(10)
,`emp_id` char(10)
,`emp_name` varchar(30)
,`emp_detail` text
);

-- --------------------------------------------------------

--
-- 資料表結構 `project`
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
-- 傾印資料表的資料 `project`
--

INSERT INTO `project` (`P_id`, `P_name`, `start_date`, `end_date`, `detail`, `num_req`, `client`) VALUES
('P00001', '星火公司周年派對', '2020-05-30 13:10:00.000000', '2020-05-30 17:00:00.000000', '會場約100坪。 會場入口處須要擺置8架花束，前方兩側需要各一普通聚光燈以及大型音響，後方兩側各一普通音響，後方中間架設拍攝平台。', 5, '邱小源'),
('P00002', '張小伊 陳小軍 婚禮', '2020-06-10 17:00:00.000000', '2020-06-10 21:30:00.000000', '會場約60坪。 會場四周處須要擺置各4架花束，前方兩側需要各一普通音響，後方兩側各一普通音響，後方中間架設拍攝平台。', 3, '陳小軍'),
('P00003', '多視界影視公司 開業晚宴', '2020-06-15 17:00:00.000000', '2020-06-15 22:45:00.000000', '會場約80坪。 會場入口處須以氣球裝飾，前方兩側需要各一普通聚光燈以及普通音響，後方兩側各一普通音響，後方中間架設拍攝平台。', 2, '光小中');

-- --------------------------------------------------------

--
-- 資料表結構 `project_member`
--

CREATE TABLE `project_member` (
  `Pid` char(10) NOT NULL,
  `emp_id` char(10) NOT NULL,
  `lead.flag` tinyint(1) NOT NULL,
  `detail` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `project_member`
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

-- --------------------------------------------------------

--
-- 檢視表結構 `emp_info`
--
DROP TABLE IF EXISTS `emp_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `emp_info`  AS  select `employee`.`emp_id` AS `emp_id`,`employee`.`emp_name` AS `emp_name`,`employee`.`tel` AS `tel`,`employee`.`rating` AS `rating` from `employee` ;

-- --------------------------------------------------------

--
-- 檢視表結構 `emp_proj`
--
DROP TABLE IF EXISTS `emp_proj`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `emp_proj`  AS  select `project`.`P_name` AS `P_name`,`project`.`P_id` AS `P_id`,`project`.`start_date` AS `start_date`,`project`.`end_date` AS `end_date`,`location`.`loc_addr` AS `loc_addr`,`project_member`.`emp_id` AS `emp_id` from ((`project` join `location`) join `project_member`) where `project`.`P_id` = `location`.`loc_pid` and `project`.`P_id` = `project_member`.`Pid` ;

-- --------------------------------------------------------

--
-- 檢視表結構 `emp_proj_info`
--
DROP TABLE IF EXISTS `emp_proj_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `emp_proj_info`  AS  select `mgr_proj_info`.`P_id` AS `P_id`,`mgr_proj_info`.`P_name` AS `P_name`,`mgr_proj_info`.`start_date` AS `start_date`,`mgr_proj_info`.`end_date` AS `end_date`,`mgr_proj_info`.`loc_addr` AS `loc_addr`,`mgr_proj_info`.`lead_id` AS `lead_id`,`mgr_proj_info`.`lead_name` AS `lead_name`,`mgr_proj_info`.`p_detail` AS `p_detail`,`employee`.`emp_id` AS `emp_id`,`employee`.`emp_name` AS `emp_name`,`project_member`.`detail` AS `e_detail` from ((`mgr_proj_info` join `project_member`) join `employee`) where `mgr_proj_info`.`P_id` = `project_member`.`Pid` and `project_member`.`emp_id` = `employee`.`emp_id` ;

-- --------------------------------------------------------

--
-- 檢視表結構 `mgr_cal`
--
DROP TABLE IF EXISTS `mgr_cal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mgr_cal`  AS  select `project`.`P_id` AS `P_id`,`project`.`P_name` AS `P_name`,`project`.`client` AS `client`,`location`.`loc_addr` AS `loc_addr`,`project`.`start_date` AS `start_date`,`project`.`end_date` AS `end_date` from (`project` join `location`) where `project`.`P_id` = `location`.`loc_pid` ;

-- --------------------------------------------------------

--
-- 檢視表結構 `mgr_emp`
--
DROP TABLE IF EXISTS `mgr_emp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mgr_emp`  AS  select `employee`.`emp_name` AS `emp_name`,`employee`.`emp_id` AS `emp_id`,`employee`.`rating` AS `rating` from `employee` ;

-- --------------------------------------------------------

--
-- 檢視表結構 `mgr_emp_info`
--
DROP TABLE IF EXISTS `mgr_emp_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mgr_emp_info`  AS  select `e`.`emp_id` AS `emp_id`,`e`.`emp_name` AS `emp_name`,`e`.`tel` AS `tel`,`p`.`P_id` AS `P_id`,`p`.`P_name` AS `P_name`,`pm`.`lead.flag` AS `lead.flag`,`pm`.`detail` AS `detail` from ((`employee` `e` join `project_member` `pm`) join `project` `p`) where `e`.`emp_id` = `pm`.`emp_id` and `pm`.`Pid` = `p`.`P_id` ;

-- --------------------------------------------------------

--
-- 檢視表結構 `mgr_proj`
--
DROP TABLE IF EXISTS `mgr_proj`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mgr_proj`  AS  select `project`.`P_name` AS `P_name`,`project`.`P_id` AS `P_id`,`project`.`start_date` AS `start_date`,`project`.`end_date` AS `end_date`,`location`.`loc_addr` AS `loc_addr` from (`project` join `location`) where `project`.`P_id` = `location`.`loc_pid` ;

-- --------------------------------------------------------

--
-- 檢視表結構 `mgr_proj_info`
--
DROP TABLE IF EXISTS `mgr_proj_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mgr_proj_info`  AS  select `p`.`P_id` AS `P_id`,`p`.`P_name` AS `P_name`,`p`.`start_date` AS `start_date`,`p`.`end_date` AS `end_date`,`l`.`loc_addr` AS `loc_addr`,`p`.`detail` AS `p_detail`,`p`.`num_req` AS `num_req`,`p`.`client` AS `client`,`e`.`emp_id` AS `lead_id`,`e`.`emp_name` AS `lead_name` from (((`project` `p` join `location` `l`) join `project_member` `pm`) join `employee` `e`) where `pm`.`emp_id` = `e`.`emp_id` and `pm`.`Pid` = `p`.`P_id` and `p`.`P_id` = `l`.`loc_pid` and `pm`.`lead.flag` = '1' group by `p`.`P_id` ;

-- --------------------------------------------------------

--
-- 檢視表結構 `mgr_proj_info_emp`
--
DROP TABLE IF EXISTS `mgr_proj_info_emp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mgr_proj_info_emp`  AS  select `pm`.`Pid` AS `Pid`,`e`.`emp_id` AS `emp_id`,`e`.`emp_name` AS `emp_name`,`pm`.`detail` AS `emp_detail` from (`project_member` `pm` join `employee` `e`) where `pm`.`emp_id` = `e`.`emp_id` ;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- 資料表索引 `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`loc_pid`);

--
-- 資料表索引 `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`P_id`);

--
-- 資料表索引 `project_member`
--
ALTER TABLE `project_member`
  ADD PRIMARY KEY (`Pid`,`emp_id`),
  ADD KEY `Prj_mem empid` (`emp_id`);

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`loc_pid`) REFERENCES `project` (`P_id`);

--
-- 資料表的限制式 `project_member`
--
ALTER TABLE `project_member`
  ADD CONSTRAINT `Prj_mem empid` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`),
  ADD CONSTRAINT `Prj_mem pid` FOREIGN KEY (`Pid`) REFERENCES `project` (`P_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
