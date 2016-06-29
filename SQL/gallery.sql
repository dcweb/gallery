/*
Navicat MySQL Data Transfer

Source Server         : Combell_newserver
Source Server Version : 50623
Source Host           : 178.208.48.50:3306
Source Database       : dcms_groupdc_be

Target Server Type    : MYSQL
Target Server Version : 50623
File Encoding         : 65001

Date: 2016-06-29 16:10:51
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `gallery`
-- ----------------------------
DROP TABLE IF EXISTS `gallery`;
CREATE TABLE `gallery` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of gallery
-- ----------------------------
INSERT INTO `gallery` VALUES ('1', 'testss', 'http://dcms.groupdc.be/userfiles/Image/', 'admin', '2016-06-29 13:56:15', '2016-06-29 14:05:14');
INSERT INTO `gallery` VALUES ('2', 'abc', 'http://dcms.groupdc.be/userfiles/Image/grondtest/', 'admin', '2016-06-29 13:56:59', '2016-06-29 14:05:04');
