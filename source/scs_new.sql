-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-06-01 18:28:30
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
-- 資料庫： `scs`
--

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
('P00001', '星火公司周年派對', '2020-05-30 13:10:00.000000', '2020-05-30 17:00:00.000000', '台中市西屯區文華路9000號 13F', '會場約100坪。 會場入口處須要擺置8架花束，前方兩側需要各一普通聚光燈以及大型音響，後方兩側各一普通音響，後方中間架設拍攝平台。', 5, '邱小源'),
('P00002', '張小伊 陳小軍 婚禮', '2020-06-10 17:00:00.000000', '2020-06-10 21:30:00.000000', '台中市西屯區西屯路二段1990號 10F', '會場約60坪。 會場四周處須要擺置各4架花束，前方兩側需要各一普通音響，後方兩側各一普通音響，後方中間架設拍攝平台。', 3, '陳小軍'),
('P00003', '多視界影視公司 開業晚宴', '2020-06-15 17:00:00.000000', '2020-06-15 22:45:00.000000', '台中市西屯區福星路3000號 4F', '會場約80坪。 會場入口處須以氣球裝飾，前方兩側需要各一普通聚光燈以及普通音響，後方兩側各一普通音響，後方中間架設拍攝平台。', 2, '光小中');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`P_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
