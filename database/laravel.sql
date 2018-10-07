/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100133
 Source Host           : localhost:3306
 Source Schema         : laravel

 Target Server Type    : MySQL
 Target Server Version : 100133
 File Encoding         : 65001

 Date: 08/10/2018 01:10:18
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_roles
-- ----------------------------
DROP TABLE IF EXISTS `tbl_roles`;
CREATE TABLE `tbl_roles`  (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `module` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `status` tinyint(1) DEFAULT 1 COMMENT '1 - active, 2 - inactive',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_roles
-- ----------------------------
INSERT INTO `tbl_roles` VALUES (1, 'admin', '{\"User\":[\"index\",\"add\",\"edit\",\"delete\"],\"News\":[\"index\",\"add\",\"edit\",\"delete\"],\"Member\":[\"index\",\"add\",\"edit\",\"delete\"]}', 1);
INSERT INTO `tbl_roles` VALUES (2, 'mod', '{\"User\":[\"index\",\"add\",\"edit\"],\"News\":[\"index\",\"add\",\"edit\"],\"Member\":[\"index\",\"add\",\"edit\"]}', 1);
INSERT INTO `tbl_roles` VALUES (3, 'super mod', '{\"User\":[\"index\",\"add\",\"edit\",\"delete\"],\"News\":[\"index\",\"add\",\"edit\",\"delete\"],\"Member\":[\"index\",\"add\",\"edit\",\"delete\"]}', 1);

-- ----------------------------
-- Table structure for tbl_users
-- ----------------------------
DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` tinyint(1) DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` int(15) DEFAULT NULL,
  `remember_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime(0) DEFAULT NULL,
  `updated_at` datetime(0) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_users
-- ----------------------------
INSERT INTO `tbl_users` VALUES (1, 'vuduchong', '$2y$10$bL1u1nEMAD1WF3NAKVU6ju/LQU4bL8K8OJmpIDqjInyCB69YyybLq', NULL, 1, 'vuduchong209305@gmail.com', 986209305, '6sg5dHgsh0ER7xh7EhizKFtlNpUNvNZ3jqhzuhNWlAyfLFNmfiU48XPNMMxp', NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
