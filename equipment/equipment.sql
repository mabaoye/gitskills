/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50726
Source Host           : localhost:3306
Source Database       : equipment

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2019-11-17 21:05:06
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `t_equipment`
-- ----------------------------
DROP TABLE IF EXISTS `t_equipment`;
CREATE TABLE `t_equipment` (
  `equipment_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '设备编号',
  `equipment_type` varchar(32) NOT NULL COMMENT '设备类型',
  `equipment` varchar(32) NOT NULL COMMENT '设备名称',
  `ip` varchar(128) NOT NULL COMMENT 'ip地址',
  `community` varchar(32) NOT NULL COMMENT '社团名',
  `produce` varchar(32) NOT NULL COMMENT '生产厂家',
  `brand` varchar(32) NOT NULL COMMENT '品牌',
  `type` varchar(32) NOT NULL COMMENT '型号',
  `mark` varchar(100) NOT NULL COMMENT '备注',
  `progress` enum('报警','正常') NOT NULL DEFAULT '正常' COMMENT '状态',
  `state` tinyint(4) unsigned NOT NULL DEFAULT '1' COMMENT '删除标记，1表示未删除，0表示已删除',
  PRIMARY KEY (`equipment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_equipment
-- ----------------------------
INSERT INTO `t_equipment` VALUES ('10', '路由器', '路由器1', '127.0.0.1', 'public', '深圳共康科技制造有限公司', '华为', '101.1.1', '无', '报警', '1');
INSERT INTO `t_equipment` VALUES ('12', '', '', '', '', '', '', '', '', '报警', '0');
INSERT INTO `t_equipment` VALUES ('13', '', '', '', '', '', '', '', '', '正常', '0');
