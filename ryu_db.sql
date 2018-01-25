/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 100119
Source Host           : localhost:3306
Source Database       : ryu_db

Target Server Type    : MYSQL
Target Server Version : 100119
File Encoding         : 65001

Date: 2018-01-25 13:23:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ryu_menu
-- ----------------------------
DROP TABLE IF EXISTS `ryu_menu`;
CREATE TABLE `ryu_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_parent_id` int(11) DEFAULT NULL,
  `menu_title` varchar(50) DEFAULT NULL,
  `menu_order` int(11) DEFAULT NULL,
  `publish` enum('y','n') DEFAULT 'y',
  `url` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ryu_menu
-- ----------------------------
INSERT INTO `ryu_menu` VALUES ('1', '0', 'Powertools', '1', 'y', 'product/index/powertools');
INSERT INTO `ryu_menu` VALUES ('2', '0', 'Accessories', '2', 'y', 'product/index/accessories');
INSERT INTO `ryu_menu` VALUES ('3', '0', 'Engine', '3', 'y', 'product/index/engine');
INSERT INTO `ryu_menu` VALUES ('4', '0', 'Welding', '4', 'y', 'product/index/welding');
INSERT INTO `ryu_menu` VALUES ('5', '0', 'Segementation', '5', 'y', 'segmentation');
INSERT INTO `ryu_menu` VALUES ('6', '0', 'News & Event', '6', 'y', 'news');
INSERT INTO `ryu_menu` VALUES ('7', '0', 'Service & Support', '7', 'y', 'service');
INSERT INTO `ryu_menu` VALUES ('8', '0', 'Download', '8', 'y', 'download');
INSERT INTO `ryu_menu` VALUES ('9', '1', 'Metal Working', '1', 'y', '');
INSERT INTO `ryu_menu` VALUES ('10', '1', 'Wood Working', '2', 'y', 'product/shop/wood');
INSERT INTO `ryu_menu` VALUES ('11', '1', 'Others', '3', 'y', 'product/shop/other');
INSERT INTO `ryu_menu` VALUES ('12', '9', 'Gurinda', '1', 'y', 'product/shop/grinders');
INSERT INTO `ryu_menu` VALUES ('13', '9', 'Cut Off Shaw', '2', 'y', null);
