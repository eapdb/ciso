-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-11-05 12:43:42
-- 伺服器版本： 10.4.27-MariaDB
-- PHP 版本： 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+08:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `ciso`
--
CREATE DATABASE IF NOT EXISTS `ciso` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ciso`;

-- --------------------------------------------------------

--
-- 資料表結構 `actions`
--

CREATE TABLE `actions` (
  `id` int(11) NOT NULL,
  `action_name` varchar(255) DEFAULT NULL,
  `resources` int(11) DEFAULT NULL,
  `time_hours` int(11) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `action_means` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `actions`
--

INSERT INTO `actions` (`id`, `action_name`, `resources`, `time_hours`, `cost`, `action_means`) VALUES
(0, '檢查並禁用該帳戶', 5, 1, 5000, '您選擇檢查並禁用該帳戶，需注意應列出帳號之黑名單、白名單'),
(1, '進行安全審查以確保沒有其他未經授權的帳戶', 20, 4, 20000, '您選擇進行安全審查以確保沒有其他未經授權的帳戶，需注意特權和高權限帳號'),
(2, '修改帳戶管理政策以預防未來的未經授權帳戶', 10, 2, 10000, '您選擇修改帳戶管理政策以預防未來的未經授權帳戶，需注意應套用到各主機和使用者電腦');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `actions`
--
ALTER TABLE `actions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
