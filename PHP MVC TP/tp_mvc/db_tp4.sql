/*
 Navicat Premium Data Transfer

 Source Server         : koneksi 1
 Source Server Type    : MySQL
 Source Server Version : 100428
 Source Host           : localhost:3306
 Source Schema         : db_tp4

 Target Server Type    : MySQL
 Target Server Version : 100428
 File Encoding         : 65001

 Date: 05/05/2024 19:43:18
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for members
-- ----------------------------
DROP TABLE IF EXISTS `members`;
CREATE TABLE `members`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `join_date` date NULL DEFAULT NULL,
  `id_role` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_role`(`id_role`) USING BTREE,
  CONSTRAINT `fk_role` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of members
-- ----------------------------
INSERT INTO `members` VALUES (1, 'Asep Saepullloh', 'asepsaepul0h@gmail.com', '08123456789', '2024-06-04', 1);
INSERT INTO `members` VALUES (5, 'Jajang Supriatna', 'Jajangz@gmail.com', '08987654321', '2024-05-10', 2);
INSERT INTO `members` VALUES (7, 'Siti Surati', 'Sitiris@gmail.com', '085678941234', '2024-04-30', 6);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `nama_role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_role`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'Front End Web Developer');
INSERT INTO `roles` VALUES (2, 'Back End Web Developer');
INSERT INTO `roles` VALUES (4, 'Mobile Developer');
INSERT INTO `roles` VALUES (6, 'UI/UX Designer');

SET FOREIGN_KEY_CHECKS = 1;
