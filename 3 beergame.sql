-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018 年 12 月 26 日 11:38
-- 伺服器版本: 10.1.37-MariaDB
-- PHP 版本： 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `beergame`
--

-- --------------------------------------------------------

--
-- 資料表結構 `characters`
--

CREATE TABLE `characters` (
  `cid` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `characters`
--

INSERT INTO `characters` (`cid`, `name`) VALUES
(1, 'retailer'),
(2, 'wholesaler'),
(3, 'distributor'),
(4, 'factory');

-- --------------------------------------------------------

--
-- 資料表結構 `orderform`
--

CREATE TABLE `orderform` (
  `serno` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `arrival` int(11) NOT NULL,
  `inventory` int(11) NOT NULL,
  `demand` int(11) NOT NULL,
  `currentcost` int(11) NOT NULL,
  `sales` int(11) NOT NULL,
  `complete` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`cid`);

--
-- 資料表索引 `orderform`
--
ALTER TABLE `orderform`
  ADD PRIMARY KEY (`serno`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `orderform`
--
ALTER TABLE `orderform`
  MODIFY `serno` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
