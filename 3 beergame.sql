-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018 年 12 月 26 日 16:12
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
  `cname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `characters`
--

INSERT INTO `characters` (`cid`, `cname`) VALUES
(1, 'factory'),
(2, 'distributor'),
(3, 'wholesaler'),
(4, 'retailer');

-- --------------------------------------------------------

--
-- 資料表結構 `need`
--

CREATE TABLE `need` (
  `period` int(11) NOT NULL,
  `need` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `orderform`
--

CREATE TABLE `orderform` (
  `serno` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `period` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `arrival` int(11) NOT NULL,
  `inventory` int(11) NOT NULL,
  `demand` int(11) NOT NULL,
  `currentcost` int(11) NOT NULL,
  `sales` int(11) NOT NULL,
  `complete` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `team`
--

CREATE TABLE `team` (
  `tid` int(20) NOT NULL,
  `tname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `f` int(11) NOT NULL,
  `d` int(11) NOT NULL,
  `w` int(11) NOT NULL,
  `r` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `team`
--

INSERT INTO `team` (`tid`, `tname`, `f`, `d`, `w`, `r`) VALUES
(1, 'test1', 0, 0, 0, 0),
(2, 'test2', 0, 0, 0, 0),
(3, '', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `uid` int(20) NOT NULL,
  `uname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pwd` int(11) NOT NULL,
  `imgURL` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `score` int(10) NOT NULL,
  `role` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`uid`, `uname`, `pwd`, `imgURL`, `score`, `role`, `tid`) VALUES
(1, 'baal', 0, 'https://image.flaticon.com/icons/svg/163/163801.svg', 0, '', 0),
(2, 'angel', 0, 'https://image.flaticon.com/icons/svg/163/163847.svg', 0, '', 0);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`cid`);

--
-- 資料表索引 `need`
--
ALTER TABLE `need`
  ADD PRIMARY KEY (`period`);

--
-- 資料表索引 `orderform`
--
ALTER TABLE `orderform`
  ADD PRIMARY KEY (`serno`);

--
-- 資料表索引 `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`tid`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `orderform`
--
ALTER TABLE `orderform`
  MODIFY `serno` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表 AUTO_INCREMENT `team`
--
ALTER TABLE `team`
  MODIFY `tid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
