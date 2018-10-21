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

 Date: 20/10/2018 23:25:42
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
  `status` tinyint(1) DEFAULT 1 COMMENT '1 - public, 0 - private',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_roles
-- ----------------------------
INSERT INTO `tbl_roles` VALUES (1, 'admin', 'User_index;User_add;User_edit;User_delete;News_index;News_add;News_edit;News_delete;Member_index;Member_add;Member_edit;Member_delete', 1);
INSERT INTO `tbl_roles` VALUES (2, 'mod', 'User_index;User_add;User_edit;User_delete;News_index;News_add;News_edit;News_delete;Member_index;Member_add;Member_edit;Member_delete', 1);
INSERT INTO `tbl_roles` VALUES (3, 'super mod', 'User_index;User_add;User_edit;User_delete;News_index;News_add;News_edit;News_delete;Member_index;Member_add;Member_edit;Member_delete', 1);

-- ----------------------------
-- Table structure for tbl_users
-- ----------------------------
DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '1 - public, 0 - private',
  `role` tinyint(1) DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime(0) DEFAULT NULL,
  `updated_at` datetime(0) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_users
-- ----------------------------
INSERT INTO `tbl_users` VALUES (1, 'vuduchong', '$2y$10$bL1u1nEMAD1WF3NAKVU6ju/LQU4bL8K8OJmpIDqjInyCB69YyybLq', 1, 1, 'vuduchong209305@gmail.com', '986209305', NULL, 'l69BuYNwECJdY0E0ju7oxdrsKY11acgx8dPBlYSDNQm76FnA6pEREwN7VLsF', NULL, NULL);
INSERT INTO `tbl_users` VALUES (18, 'vbdsbnsdnsdf', '$2y$10$2nkUlbNIOgLSkiExOh7y5uJ53mMj.gC673ZZr8AYJYlE7YWnV.dVO', 0, 1, 'dbbdsnbsdn@gmail.com', '634734734', '', NULL, '2018-10-14 09:24:57', '2018-10-14 09:24:57');
INSERT INTO `tbl_users` VALUES (19, 'dnsdnsdnsd', '$2y$10$hqkDG7IF08pDXmzCIOGstOmauJasJGnFMZphUKSxyWYZZQuXq.FLe', 0, 1, 'bswehsdeh@gmail.com', '23237237', 'avatar/admin/1539509112-IMG20151115165007.jpg', NULL, '2018-10-14 09:25:13', '2018-10-14 09:25:13');

SET FOREIGN_KEY_CHECKS = 1;
