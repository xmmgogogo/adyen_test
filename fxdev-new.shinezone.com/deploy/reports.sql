-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 04, 2017 at 06:47 PM
-- Server version: 5.5.31-log
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE database `reports`;
USE `reports`;

--
-- Database: `reports`
--

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Id` int(11) NOT NULL,
  `CompanyAccount` char(32) DEFAULT '' COMMENT '公司帐号',
  `MerchantAccount` char(32) DEFAULT '' COMMENT '交易帐户名',
  `PspReferenceId` char(32) DEFAULT '' COMMENT '交易ID',
  `MerchantReferenceId` char(32) DEFAULT '' COMMENT '订单ID',
  `PaymentMethod` varchar(32) DEFAULT '' COMMENT '支付方式',
  `BookingDate` datetime DEFAULT NULL COMMENT '订单时间',
  `TimeZone` char(8) DEFAULT '' COMMENT '时区',
  `MainCurrency` char(3) DEFAULT '' COMMENT '转换货币类型',
  `MainAmount` int(10) DEFAULT '0' COMMENT '价格',
  `RecordType` varchar(32) DEFAULT '' COMMENT '记录状态',
  `PaymentCurrency` char(3) DEFAULT '' COMMENT '支付货币类型',
  `ReceivedPC` int(10) DEFAULT '0' COMMENT '接收到的支付额',
  `AuthorisedPC` int(10) DEFAULT '0' COMMENT '授权的支付额',
  `CapturedPC` int(10) DEFAULT '0' COMMENT '结算的支付额',
  `SettlementCurrency` char(3) DEFAULT '' COMMENT '扣款货币类型',
  `PayableSC` varchar(32) DEFAULT '' COMMENT '',
  `CommissionSC` varchar(32) DEFAULT '' COMMENT '',
  `MarkupSC` varchar(32) DEFAULT '' COMMENT '',
  `SchemeFeesSC` varchar(32) DEFAULT '' COMMENT '',
  `InterchangeSC`  varchar(32) DEFAULT '' COMMENT '',
  `ProcessingFeeCurrency` char(3) DEFAULT '' COMMENT '纳税货币类型',
  `ProcessingFeeFC` decimal(10,2) DEFAULT NULL COMMENT '纳税金额',
  `UserName` varchar(32) DEFAULT '' COMMENT '帐号用户名',
  `PaymentMethodVariant` varchar(32) DEFAULT '' COMMENT '支付方式变体',
  `ModificationMerchantReference` varchar(32) DEFAULT '' COMMENT '修改商家参考',
  `Reserved3` varchar(32) DEFAULT '' COMMENT '',
  `Reserved4` varchar(32) DEFAULT '' COMMENT '',
  `Reserved5` varchar(32) DEFAULT '' COMMENT '',
  `Reserved6` varchar(32) DEFAULT '' COMMENT '',
  `Reserved7` varchar(32) DEFAULT '' COMMENT '',
  `Reserved8` varchar(32) DEFAULT '' COMMENT '',
  `Reserved9` varchar(32) DEFAULT '' COMMENT '',
  `Reserved10` varchar(32) DEFAULT '' COMMENT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='帐单信息';

-- --------------------------------------------------------

INSERT INTO `payment` (`CompanyAccount`, `MerchantAccount`, `PspReferenceId`, `MerchantReferenceId`, `PaymentMethod`,
                         `BookingDate`, `TimeZone`, `MainCurrency`, `MainAmount`, `RecordType`, `PaymentCurrency`, `ReceivedPC`,
                         `AuthorisedPC`, `CapturedPC`, `SettlementCurrency`, `PayableSC`, `CommissionSC`,
                         `MarkupSC`, `SchemeFeesSC`, `InterchangeSC`, `ProcessingFeeCurrency`, `ProcessingFeeFC`,
                         `UserName`, `PaymentMethodVariant`,`ModificationMerchantReference`,
                         `Reserved3`, `Reserved4`, `Reserved5`, `Reserved6`, `Reserved7`,`Reserved8`,`Reserved9`,`Reserved10`
) VALUES
(),


--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
ADD PRIMARY KEY (`Id`),
ADD KEY `BookingDate` (`BookingDate`),
ADD KEY `PspReferenceId` (`PspReferenceId`),
ADD KEY `MerchantReferenceId` (`MerchantReferenceId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

-- Authorised  Completed  Abandoned
--

CREATE TABLE `sessions` (
  `Id` int(11) NOT NULL,
  `CompanyAccount` char(32) DEFAULT '' COMMENT '公司帐号',
  `MerchantAccount` char(32) DEFAULT '' COMMENT '交易帐户名',
  `PspReferenceId` char(32) DEFAULT '' COMMENT '交易ID',
  `MerchantReferenceId` char(32) DEFAULT '' COMMENT '订单ID',
  `PaymentMethod` varchar(32) DEFAULT '' COMMENT '支付方式',
  `CreateDate` datetime DEFAULT NULL COMMENT '时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='帐单信息';


CREATE TABLE `dashboard` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `API` int(11) DEFAULT 0 COMMENT '接口量',
  `HPP` int(11) DEFAULT 0 COMMENT 'HPP量',
  `Abandoned` int(11) DEFAULT 0 COMMENT '拒绝量',
  `Received` int(11) DEFAULT 0 COMMENT '接收量',
  `Refused` int(11) DEFAULT 0 COMMENT '拒绝量',
  `Error` int(11) DEFAULT 0 COMMENT '错误量',
  `Authorised` int(11) DEFAULT 0 COMMENT '授权量',
  `Cancelled` int(11) DEFAULT 0 COMMENT '取消量',
  `Expired` int(11) DEFAULT 0 COMMENT '过期量',
  `SentSettlement` int(11) DEFAULT 0 COMMENT '发送结算量',
  `Settled` int(11) DEFAULT 0 COMMENT '结算量',
  `Refunded` int(11) DEFAULT 0 COMMENT '退单量',
  `RefundReversed` int(11) DEFAULT 0 COMMENT '取消退单量',
  `Chargeback` int(11) DEFAULT 0 COMMENT '退款量',
  `ChargebackReversed` int(11) DEFAULT 0 COMMENT '取消退款',
  `FinalSettled` int(11) DEFAULT 0  COMMENT '最终结算量',
  `CreateDate` date DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `dashboard` (`CreateDate`, `API`, `HPP`, `Abandoned`, `Received`, `Refused`, `Error`, `Authorised`, `Cancelled`, `Expired`, `SentSettlement`, `Settled`, `Refunded`, `RefundReversed`, `Chargeback`, `ChargebackReversed`, `FinalSettled`) VALUES
  ('2017-01-21 00:00:00', 17, 11533, 917, 10633, 58, 0, 10575, 0, 0, 10575, 12577, 0, 0, 0, 0, 12577),
  ('2016-12-01 00:00:00', 335, 9851, 708, 9478, 45, 0, 9433, 0, 0, 9433, 5402, 0, 0, 0, 0, 5402),
  ('2016-11-01 00:00:00', 670, 19702, 1416, 18956, 90, 0, 18866, 0, 0, 18866, 10804, 0, 0, 0, 0, 10804);


CREATE TABLE `risk` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `totalCount` int(11) DEFAULT 0 COMMENT '总交易量',
  `riskTransactionCount` int(11) DEFAULT 0 COMMENT '风险交易量',
  `authorisedCount` int(11) DEFAULT 0 COMMENT '授权量',
  `authorisedEurAmount` int(11) DEFAULT 0 COMMENT '授权欧元区量',
  `refusedByRiskCount` int(11) DEFAULT 0 COMMENT '拒绝的风险计算',
  `refusedByRiskEurAmount` int(11) DEFAULT 0 COMMENT '欧元拒绝的风险值',
  `refusedByBankCount` int(11) DEFAULT 0 COMMENT '银行拒绝量',
  `refusedByBankEurAmount` int(11) DEFAULT 0 COMMENT '欧元区银行拒绝量',
  `chargebackCount` int(11) DEFAULT 0 COMMENT '退款数',
  `cancelledByRiskCount` int(11) DEFAULT 0 COMMENT '取消的风险计算',
  `cancelledByRiskAmount` int(11) DEFAULT 0 COMMENT '风险取消量',
  `chargebackEurAmount` int(11) DEFAULT 0 COMMENT '欧元区退款量',
  `fraudNotificationsEurAmount` int(11) DEFAULT 0 COMMENT '欺诈通知欧元金额',
  `fraudNotificationsCount` int(11) DEFAULT 0 COMMENT '欧元欺诈通知量',
  `CreateDate` date DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `risk` (`CreateDate`,`totalCount`,`riskTransactionCount`,`authorisedCount`,`authorisedEurAmount`,
                    `refusedByRiskCount`,`refusedByRiskEurAmount`,`refusedByBankCount`,`refusedByBankEurAmount`,
                    `chargebackCount`,`cancelledByRiskCount`,`cancelledByRiskAmount`,`chargebackEurAmount`,
                    `fraudNotificationsEurAmount`,`fraudNotificationsCount`) VALUES
  ('2016-12-01',1000,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2016-12-02',1033,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2016-12-03',1066,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2016-12-04',1099,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2016-12-05',1132,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2016-12-06',1165,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2016-12-07',1198,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2016-12-08',1231,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2016-12-09',1264,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2016-12-10',1297,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2016-12-11',1330,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2016-12-12',1363,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2016-12-13',1396,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2016-12-14',1429,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2016-12-15',1462,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2016-12-16',1495,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2016-12-17',1528,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2016-12-18',1561,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2016-12-19',1594,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2016-12-20',1627,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2016-12-21',1660,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2016-12-22',1693,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2016-12-23',1726,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2016-12-24',1759,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2016-12-25',1792,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2016-12-26',1825,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2016-12-27',1858,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2016-12-28',1891,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2016-12-29',1924,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2016-12-30',1957,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2016-12-31',1990,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2017-01-01',2023,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2017-01-02',2056,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2017-01-03',2089,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2017-01-04',2122,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2017-01-05',2155,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2017-01-06',2188,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2017-01-07',2221,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2017-01-08',2254,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2017-01-09',2287,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2017-01-10',2320,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2017-01-11',2353,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2017-01-12',2386,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2017-01-13',2419,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2017-01-14',2452,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2017-01-15',2485,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2017-01-16',2518,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2017-01-17',2551,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2017-01-18',2584,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2017-01-19',2617,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2017-01-20',2650,0,0,0,0,0,0,0,0,0,0,0,0,0),
  ('2017-01-21',2683,0,0,0,0,0,0,0,0,0,0,0,0,0);

ALTER TABLE `risk` ADD `Country` VARCHAR(32) NOT NULL AFTER `fraudNotificationsCount`, ADD INDEX `Country` (`Country`);
ALTER TABLE `risk` ADD `PaymentMethod` VARCHAR(32) NOT NULL AFTER `Country`, ADD INDEX `PaymentMethod` (`PaymentMethod`);
ALTER TABLE `risk` ADD `nofCount` INT NOT NULL COMMENT 'Notifications of fraud 通知的欺诈' AFTER `fraudNotificationsCount`;
ALTER TABLE `risk` ADD `nofEurAmount` INT(11) NOT NULL COMMENT 'Notifications of fraud 通知的欺诈额' AFTER `nofCount`;

CREATE TABLE `download` (
  `Id` int(11) NOT NULL,
  `FileName` varchar(64) DEFAULT '' COMMENT '文件名',
  `Type` varchar(32) DEFAULT '' COMMENT 'HPP ...',
  `Status` TINYINT(4) DEFAULT 0 COMMENT '0 生成 1 下载',
  `CreateDate` datetime DEFAULT NULL COMMENT '时间',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='下载信息';




/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
