/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : api_cucre

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2014-03-04 15:50:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `cr_device_token`
-- ----------------------------
DROP TABLE IF EXISTS `cr_device_token`;
CREATE TABLE `cr_device_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `device_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=ios;2=android;3=all',
  `token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `token` (`token`) USING BTREE,
  KEY `user_id` (`user_id`),
  CONSTRAINT `cr_device_token_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `cr_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cr_device_token
-- ----------------------------
INSERT INTO `cr_device_token` VALUES ('25', '4675', '1', '6e3768c267f43acafa5c59bc7af254cb07a34d5adec312c13d8ea79df5267774');
INSERT INTO `cr_device_token` VALUES ('26', '4675', '3', '777778c267f43acafa5c59bc7af254cb07a34d5adec312c13d8ea79df5267774');
INSERT INTO `cr_device_token` VALUES ('27', '4675', '2', '11a0e6ecd1271050963b0243539b10be2da5b15f17aea0181a8e6962baf88cba');
INSERT INTO `cr_device_token` VALUES ('28', '0', '0', '');

-- ----------------------------
-- Table structure for `cr_user`
-- ----------------------------
DROP TABLE IF EXISTS `cr_user`;
CREATE TABLE `cr_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cr_user
-- ----------------------------
INSERT INTO `cr_user` VALUES ('30', '4675', '1', '2014-03-04 05:39:18', '2014-03-04 05:39:18');
INSERT INTO `cr_user` VALUES ('32', '0', '1', '2014-03-04 08:30:00', '2014-03-04 08:30:00');
