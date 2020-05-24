-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-05-24 07:13:53
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
-- 資料庫： `test`
--

-- --------------------------------------------------------

--
-- 資料表結構 `assignment`
--

CREATE TABLE `assignment` (
  `A_id` char(10) NOT NULL,
  `A_name` varchar(30) NOT NULL,
  `start_date` datetime(6) NOT NULL,
  `end_date` datetime(6) NOT NULL,
  `location` varchar(30) NOT NULL,
  `detail` text NOT NULL,
  `client` varchar(30) NOT NULL,
  `P_id` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `assignment`
--

INSERT INTO `assignment` (`A_id`, `A_name`, `start_date`, `end_date`, `location`, `detail`, `client`, `P_id`) VALUES
('A00001', '天樂公司周年派對', '2020-05-30 13:10:00.000000', '2020-05-30 17:00:00.000000', '台中市西屯區文華路9000號300樓', '場地約100坪，場地前方兩側需大型投影機，有舞台，場地後方需要音響', '莊小耀', 'P00001'),
('A00002', '張小伊 陳小軍 婚禮', '2020-06-10 17:00:00.000000', '2020-06-10 21:30:00.000000', '台中市西屯區西屯路二段8080號', '場地約50坪，準備拱門5座，並以氣球裝飾，背景以花卉與氣球佈置，音響前方兩側設置即可', '陳小軍', 'P00002'),
('A00003', '多洋影視公司 開業晚宴', '2020-06-15 17:00:00.000000', '2020-06-15 22:45:00.000000', '台中市西屯區福星路6668號5樓', '約80坪，入口大廳放置紅毯，會場四周總共需約40支花束佈置，前方兩側放置大型音響，後方兩側放置普通音響', '葉小芳', 'P00003');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`A_id`),
  ADD KEY `AsmFKPid` (`P_id`);

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `AsmFKPid` FOREIGN KEY (`P_id`) REFERENCES `project` (`P_id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
