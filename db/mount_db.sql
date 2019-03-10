/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : mount_db

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-03-10 23:51:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for my_match
-- ----------------------------
DROP TABLE IF EXISTS `my_match`;
CREATE TABLE `my_match` (
  `m_id` int(10) NOT NULL AUTO_INCREMENT,
  `m_host_id` int(10) NOT NULL,
  `m_target_id` int(10) NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of my_match
-- ----------------------------
INSERT INTO `my_match` VALUES ('1', '1', '2');

-- ----------------------------
-- Table structure for my_mount
-- ----------------------------
DROP TABLE IF EXISTS `my_mount`;
CREATE TABLE `my_mount` (
  `my_id` int(10) NOT NULL AUTO_INCREMENT,
  `my_host` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `my_user` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `my_pass` text COLLATE utf8mb4_unicode_ci,
  `my_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`my_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of my_mount
-- ----------------------------
INSERT INTO `my_mount` VALUES ('1', '203.113.123.197', 'veh', 't24112541', '22561');
INSERT INTO `my_mount` VALUES ('2', 'localhost', 'root', null, 'project_vehicle');
