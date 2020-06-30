-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-06-30 16:46:13
-- 伺服器版本： 10.4.13-MariaDB
-- PHP 版本： 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `haha`
--

-- --------------------------------------------------------

--
-- 資料表結構 `post`
--

CREATE TABLE `post` (
  `ID` int(10) NOT NULL,
  `tag` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `post`
--

INSERT INTO `post` (`ID`, `tag`, `topic`, `content`) VALUES
(0, '藍', 'S', 'B'),
(1, '藍', '罷免', '斯'),
(2, '綠', 'ㄋ', 'ㄎ'),
(4, '中立', 'u', 'u'),
(5, '中立', 'i', 'i'),
(6, '綠', 'o', 'o'),
(7, '綠', 'p', 'ppp'),
(8, '綠', 'p', 'ppp'),
(9, '綠', 'sda', 'ads'),
(10, '藍', 'nn', '綠蛆快去領1450啦 下去'),
(11, '藍', '1', 'asdas'),
(12, '綠', '2', '525'),
(13, '中立', '4', '543545');

-- --------------------------------------------------------

--
-- 資料表結構 `帳號`
--

CREATE TABLE `帳號` (
  `會員ID` int(10) NOT NULL,
  `帳號` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `密碼` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `帳號`
--

INSERT INTO `帳號` (`會員ID`, `帳號`, `密碼`) VALUES
(0, '1', '1'),
(1, '9', '9');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`ID`);

--
-- 資料表索引 `帳號`
--
ALTER TABLE `帳號`
  ADD PRIMARY KEY (`帳號`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
