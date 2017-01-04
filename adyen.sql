-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-01-04 18:30:55
-- 服务器版本： 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adyen`
--

-- --------------------------------------------------------

--
-- 表的结构 `payment`
--

CREATE TABLE `payment` (
  `PSP Reference` varchar(200) NOT NULL,
  `Merchant Reference` varchar(200) NOT NULL,
  `Account` varchar(200) NOT NULL,
  `Creation Date` varchar(200) NOT NULL,
  `TimeZone` varchar(200) NOT NULL,
  `POS Transation Date` varchar(200) NOT NULL,
  `Unique Terminal ID` varchar(200) NOT NULL,
  `Value` varchar(200) NOT NULL,
  `Currency` varchar(200) NOT NULL,
  `Payment Method` varchar(200) NOT NULL,
  `Status` varchar(200) NOT NULL,
  `Raw Acquirer Response` varchar(200) NOT NULL,
  `Issuer Country` varchar(200) NOT NULL,
  `Shopper Country` varchar(200) NOT NULL,
  `Entry Mode` varchar(200) NOT NULL,
  `CVM Performed` varchar(200) NOT NULL,
  `CVM Result` varchar(200) NOT NULL,
  `DCC Accepted` varchar(200) NOT NULL,
  `Offline` varchar(200) NOT NULL,
  `Fraud Scoring` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单表';

--
-- 转存表中的数据 `payment`
--

INSERT INTO `payment` (`PSP Reference`, `Merchant Reference`, `Account`, `Creation Date`, `TimeZone`, `POS Transation Date`, `Unique Terminal ID`, `Value`, `Currency`, `Payment Method`, `Status`, `Raw Acquirer Response`, `Issuer Country`, `Shopper Country`, `Entry Mode`, `CVM Performed`, `CVM Result`, `DCC Accepted`, `Offline`, `Fraud Scoring`) VALUES
('a1', 'a2', 'a3', 'a4', 'a5', 'a6', 'a7', 'a8', 'a9', 'a10', 'a11', 'a12', 'a13', 'a14', 'a15', 'a16', 'a17', 'a18', 'a19', 'a20'),
('b1', 'b2', 'b3', 'b4', 'b5', 'b6', 'b7', 'b8', 'b9', 'b10', 'b11', 'b12', 'b13', 'b14', 'b15', 'b16', 'b17', 'b18', 'b19', 'b20');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
