/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : ronalddu_gunpro8182018

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-10-06 23:53:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `report_product`
-- ----------------------------
DROP TABLE IF EXISTS `report_product`;
CREATE TABLE `report_product` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `details` text,
  `date_reported` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of report_product
-- ----------------------------
INSERT INTO `report_product` VALUES ('0', '30', 'test', '2018-10-06 21:19:30', '5');
