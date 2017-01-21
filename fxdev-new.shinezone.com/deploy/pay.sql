-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 26, 2016 at 09:08 AM
-- Server version: 5.5.31-log
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

DROP DATABASE IF EXISTS `payment`;
CREATE DATABASE `payment`;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payment`
--

-- --------------------------------------------------------

--
-- Table structure for table `pay`
--

CREATE TABLE `pay` (
  `Id` int(11) NOT NULL,
  `TransactionId` char(32) DEFAULT '' COMMENT '订单Id or 交易号',
  `AppName` char(32) DEFAULT '' COMMENT '应用名称',
  `Payer` varchar(64) DEFAULT '' COMMENT '支付用户',
  `PaymentMethod` varchar(32) DEFAULT '' COMMENT '支付方式',
  `Status` tinyint(3) DEFAULT '0' COMMENT '支付状态 0:未支付 1:支付完成 2:支付失败 3:退款中 4:退款完成',
  `Currency` char(3) DEFAULT '' COMMENT '货币类型',
  `TotalAmount` decimal(10,2) DEFAULT NULL COMMENT '充值金额',
  `FeeAmount` decimal(10,2) DEFAULT NULL COMMENT '税金额 or 费用',
  `NetAmount` decimal(10,2) DEFAULT NULL COMMENT '净额',
  `TrackId` varchar(32) DEFAULT '' COMMENT '第三方支付 订单Id',
  `SubTrackId` varchar(32) DEFAULT '' COMMENT 'CP子跟踪Id',
  `TradeInfo` varchar(255) DEFAULT '' COMMENT '交易详情',
  `CreateDate` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='帐单信息';


--
-- Table structure for table `stat`
--

CREATE TABLE `stat` (
  `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `WithdrawCash` decimal(10,2) DEFAULT NULL COMMENT '提取金额',
  `Dateline` datetime DEFAULT NULL COMMENT '操作时间',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='提现流水信息';

--
-- Dumping data for table `pay`
--

INSERT INTO `pay` (`Id`, `TransactionId`, `CreateDate`, `AppName`, `Payer`, `PaymentMethod`, `Status`, `Currency`, `TotalAmount`, `FeeAmount`, `NetAmount`, `TrackId`, `SubTrackId`, `TradeInfo`) VALUES
(1, 'GB22860001355022', '2012-12-30 21:00:00', 'shinezone', '1212', 'alipay_cn', 1, 'USD', '1212.00000', '1212.00000', '1.00000', 'txkskjfiejfkdkdieksleikfke', '1', '12 gold'),
(2, 'GB22860711857814', '2013-12-30 12:00:00', 'shinezone', '1212', 'bitcoin', 0, 'USD', '1212.00000', '1212.00000', '1.00000', 'txkskjfiejfkdkdieksleikfke', '1', '12 gold'),
(3, 'GB14359512233127', '1899-12-30 12:00:00', 'shinezone', '1212', 'boleto_br', 1, 'USD', '1212.00000', '1212.00000', '1.00000', 'txkskjfiejfkdkdieksleikfke', '1', '1'),
(4, 'GB24860711857814', '2014-12-30 12:00:00', 'shinezone', '1212', 'cashu', 1, 'USD', '1212.00000', '1212.00000', '1.00000', 'txkskjfiejfkdkdieksleikfke', '1', '12 gold'),
(5, 'GB14357512233127', '2014-12-30 12:00:00', 'shinezone', '1212', 'ideal_nl', 1, 'USD', '1212.00000', '1212.00000', '1.00000', 'txkskjfiejfkdkdieksleikfke', '1', '1'),
(6, 'GB22860201355022', '2014-12-30 12:00:00', 'shinezone', '1212', 'neosurf', 1, 'USD', '1212.00000', '1212.00000', '1.00000', 'txkskjfiejfkdkdieksleikfke', '1', '12 gold'),
(7, 'GB14319512233127', '2014-12-30 12:00:00', 'shinezone', '1212', 'onecard', 1, 'USD', '1212.00000', '1212.00000', '1.00000', 'txkskjfiejfkdkdieksleikfke', '1', '1'),
(8, 'GB22860201855022', '2014-12-30 12:00:00', 'shinezone', '1212', 'paysafecard', 1, 'USD', '1212.00000', '1212.00000', '1.00000', 'txkskjfiejfkdkdieksleikfke', '1', '12 gold'),
(9, 'GB22820201855022', '2015-12-30 12:00:00', 'shinezone', '1212', 'qiwi', 1, 'USD', '1212.00000', '1212.00000', '1.00000', '1', '1', '1'),
(10, 'GB23360001355022', '2015-12-30 12:00:00', 'shinezone', '1212', 'sofort', 3, 'USD', '1212.00000', '1212.00000', '1.00000', '1', '1', '12 gold'),
(11, 'GB233608851355022', '2016-11-30 12:00:00', 'shinezone', '1212', 'tenpay_cn', 1, 'USD', '1212.00000', '1212.00000', '1.00000', '1', '1', '1'),
(12, 'GB233228851355022', '2016-11-30 12:00:00', 'shinezone', '1212', 'webmoney', 2, 'USD', '1212.00000', '1212.00000', '1.00000', '1', '1', '12 gold'),
(13, 'GB233229951355022', '2016-11-30 12:00:00', 'shinezone', '1212', 'yamoney', 2, 'USD', '1212.00000', '1212.00000', '1.00000', '1', '1', '12 gold');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pay`
--
ALTER TABLE `pay`
  ADD KEY `CreateDate` (`CreateDate`),
  ADD KEY `AppName` (`AppName`),
  ADD KEY `PaymentMethod` (`PaymentMethod`),
  ADD KEY `TrackId` (`TrackId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

