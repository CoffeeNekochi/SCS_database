-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-05-28 15:44:40
-- 伺服器版本： 10.4.11-MariaDB
-- PHP 版本： 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `scs`
--

-- --------------------------------------------------------

--
-- 資料表結構 `agm_member`
--

CREATE TABLE `agm_member` (
  `emp_id` char(10) NOT NULL,
  `lead.flag` tinyint(1) NOT NULL,
  `detail` text DEFAULT NULL,
  `Pid` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `agm_member`
--

INSERT INTO `agm_member` (`emp_id`, `lead.flag`, `detail`, `Pid`) VALUES
('E00001', 1, '負責領導，監督工作，與客戶溝通', 'P00001'),
('E00002', 0, NULL, 'P00001'),
('E00003', 0, NULL, 'P00001'),
('E00004', 0, NULL, 'P00001'),
('E00005', 0, NULL, 'P00001'),
('E00006', 1, '負責領導，監督工作，與客戶溝通', 'P00002'),
('E00007', 0, '目前收集有關 美式風格 諾爾繁花的設計（主要為白、金、玫瑰紅為主）', 'P00001'),
('E00008', 0, NULL, 'P00002'),
('E00009', 0, NULL, 'P00003'),
('E00010', 1, '負責領導，監督工作，與客戶溝通', 'P00003');

-- --------------------------------------------------------

--
-- 資料表結構 `employee`
--

CREATE TABLE `employee` (
  `emp_id` char(10) NOT NULL,
  `emp_name` varchar(30) NOT NULL,
  `tel.` char(16) NOT NULL,
  `rating` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_name`, `tel.`, `rating`) VALUES
('E00001', 'Captain Price', '886123456789', NULL),
('E00002', 'Simon Ghost', '866987654321', NULL),
('E00003', 'David Maso', '866000000000', NULL),
('E00004', 'Shu Zhi Wei', '866111111111', 'Summer Boy'),
('E00005', 'Gordon Wee', '866696969696', 'Good IN Respond'),
('E00006', 'Andy Vile', '886222222202', 'good'),
('E00007', 'Brad Knight', '886111111103', NULL),
('E00008', 'Evan Wallis', '886222222200', NULL),
('E00009', 'Josh Zell', '886222222201', NULL),
('E00010', 'Jared James', '886111111100', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `project`
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
-- 傾印資料表的資料 `project`
--

INSERT INTO `project` (`P_id`, `P_name`, `start_date`, `end_date`, `location`, `detail`, `num_req`, `client`) VALUES
('P00001', 'Zhi Wee\'s family anniversary ', '2020-05-30 13:10:00.000000', '2020-05-30 17:00:00.000000', '台中市西屯區文華路9000號300樓', '溫馨的派對，奇幻風，家庭人數14人，4小時歡樂活動。', 5, 'Zhi Wee'),
('P00002', '張橋伊 陳建軍 婚禮', '2020-06-10 17:00:00.000000', '2020-06-10 21:30:00.000000', '塔木德酒店原德馆 407台中市西屯區西屯路二段200號', '精緻時尚，婚禮花卉，更多詳情會在日後添加', 3, '陳建軍 先生'),
('P00003', '多姿影視公司 開業晚宴', '2020-06-15 17:00:00.000000', '2020-06-15 22:45:00.000000', '多姿影視公司 台中市西屯區福星路300號4樓', '對前廳進行紅毯佈置，入口表現得大方得體，展示廳要佈置高雅經典金色為主', 2, '光方中 先生');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `agm_member`
--
ALTER TABLE `agm_member`
  ADD PRIMARY KEY (`emp_id`) USING BTREE,
  ADD KEY `Pid` (`Pid`);

--
-- 資料表索引 `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- 資料表索引 `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`P_id`);

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `agm_member`
--
ALTER TABLE `agm_member`
  ADD CONSTRAINT `Agm_mem pid` FOREIGN KEY (`Pid`) REFERENCES `project` (`P_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
