/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 100113
Source Host           : localhost:3306
Source Database       : adyen

Target Server Type    : MYSQL
Target Server Version : 100113
File Encoding         : 65001

Date: 2017-01-07 18:57:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for payment
-- ----------------------------
DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment` (
  `PSPReference` varchar(200) NOT NULL,
  `Merchant Reference` varchar(200) NOT NULL,
  `Account` varchar(200) NOT NULL,
  `creationDate` datetime NOT NULL,
  `TimeZone` varchar(200) NOT NULL,
  `POS Transation Date` varchar(200) NOT NULL,
  `Unique Terminal ID` varchar(200) NOT NULL,
  `Value` varchar(200) NOT NULL,
  `Currency` varchar(200) NOT NULL,
  `paymentMethod` varchar(200) NOT NULL,
  `Status` varchar(200) NOT NULL,
  `Raw Acquirer Response` varchar(200) NOT NULL,
  `Issuer Country` varchar(200) NOT NULL,
  `Shopper Country` varchar(200) NOT NULL,
  `Entry Mode` varchar(200) NOT NULL,
  `CVM Performed` varchar(200) NOT NULL,
  `CVM Result` varchar(200) NOT NULL,
  `DCC Accepted` varchar(200) NOT NULL,
  `Offline` varchar(200) NOT NULL,
  `Fraud Scoring` varchar(200) NOT NULL,
  PRIMARY KEY (`PSPReference`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单表';

-- ----------------------------
-- Records of payment
-- ----------------------------
INSERT INTO `payment` VALUES ('1114830000000000', 'ta10082017115962528598574372', 'spilGame', '2017-01-01 00:00:00', 'CET', '', '', '543', 'USD', 'paypal', 'SentForSettle', '', '', '', '', '', '', '', '', '0');
INSERT INTO `payment` VALUES ('1914830000000000', 'lr10082017112392656026547586', 'szGame', '2017-01-03 00:00:00', 'CET', '', '', '61', 'USD', 'paypal', 'Refused', '', '', '', '', '', '', '', '', '0');
INSERT INTO `payment` VALUES ('3114830000000000', 'dm10082017119846260854604264', 'agGame', '2017-03-01 00:00:00', 'CET', '', '', '76', 'USD', 'visa', 'SentForSettle', '', '', '', '', '', '', '', '', '0');
INSERT INTO `payment` VALUES ('3314830000000000', 'ic10082017111431969390719814', 'szGame', '2017-03-01 00:00:00', 'CET', '', '', '876', 'USD', 'visa', 'SentForSettle', '', '', '', '', '', '', '', '', '0');
INSERT INTO `payment` VALUES ('4112830000000000', 'sn10082017117132993997282493', 'MihaGame', '2017-03-01 00:00:00', 'CET', '', '', '3222', 'USD', 'paypal', 'SentForSettle', '', '', '', '', '', '', '', '', '0');
INSERT INTO `payment` VALUES ('4114830000000000', 'sn10082017117132993997282493', 'MihaGame', '2017-03-01 00:00:00', 'CET', '', '', '129', 'USD', 'paypal', 'Cancelled', '', '', '', '', '', '', '', '', '0');
INSERT INTO `payment` VALUES ('4814830000000000', 'wh10082017119333616633854109', 'MihaGame', '2017-01-01 00:00:00', 'CET', '', '', '29', 'USD', 'paypal', 'Cancelled', '', '', '', '', '', '', '', '', '0');
INSERT INTO `payment` VALUES ('5114830000000000', 'yh10082017119212988818678343', 'spilGame', '2017-01-03 00:00:00', 'CET', '', '', '864', 'USD', 'visa', 'SentForSettle', '', '', '', '', '', '', '', '', '0');
INSERT INTO `payment` VALUES ('7114830000000000', 'bk10082017113089129343611116', 'spilGame', '2017-01-02 00:00:00', 'CET', '', '', '1234', 'USD', 'visa', 'SentForSettle', '', '', '', '', '', '', '', '', '0');
INSERT INTO `payment` VALUES ('7614830000000000', 'ee10082017110160678536103963', 'MihaGame', '2017-01-01 00:00:00', 'CET', '', '', '90', 'USD', 'paypal', 'SentForSettle', '', '', '', '', '', '', '', '', '0');
