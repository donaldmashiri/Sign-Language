/*
 Navicat Premium Data Transfer

 Source Server         : aaLocalhost
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : sign_language

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 15/05/2024 15:29:24
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for dictionaries
-- ----------------------------
DROP TABLE IF EXISTS `dictionaries`;
CREATE TABLE `dictionaries`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `image_path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `letter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dictionaries
-- ----------------------------
INSERT INTO `dictionaries` VALUES (1, 'images/A.png', 'A', NULL, NULL);
INSERT INTO `dictionaries` VALUES (2, 'images/B.png', 'B', NULL, NULL);
INSERT INTO `dictionaries` VALUES (3, 'images/C.png', 'C', NULL, NULL);
INSERT INTO `dictionaries` VALUES (4, 'images/D.png', 'D', NULL, NULL);
INSERT INTO `dictionaries` VALUES (5, 'images/E.png', 'E', NULL, NULL);
INSERT INTO `dictionaries` VALUES (6, 'images/F.png', 'F', NULL, NULL);
INSERT INTO `dictionaries` VALUES (7, 'images/G.png', 'G', NULL, NULL);
INSERT INTO `dictionaries` VALUES (8, 'images/H.png', 'H', NULL, NULL);
INSERT INTO `dictionaries` VALUES (9, 'images/I.png', 'I', NULL, NULL);
INSERT INTO `dictionaries` VALUES (10, 'images/J.png', 'J', NULL, NULL);
INSERT INTO `dictionaries` VALUES (11, 'images/K.png', 'K', NULL, NULL);
INSERT INTO `dictionaries` VALUES (12, 'images/L.png', 'L', NULL, NULL);
INSERT INTO `dictionaries` VALUES (13, 'images/M.png', 'M', NULL, NULL);
INSERT INTO `dictionaries` VALUES (14, 'images/N.png', 'N', NULL, NULL);
INSERT INTO `dictionaries` VALUES (15, 'images/O.png', 'O', NULL, NULL);
INSERT INTO `dictionaries` VALUES (16, 'images/P.png', 'P', NULL, NULL);
INSERT INTO `dictionaries` VALUES (17, 'images/Q.png', 'Q', NULL, NULL);
INSERT INTO `dictionaries` VALUES (18, 'images/R.png', 'R', NULL, NULL);
INSERT INTO `dictionaries` VALUES (19, 'images/S.png', 'S', NULL, NULL);
INSERT INTO `dictionaries` VALUES (20, 'images/T.png', 'T', NULL, NULL);
INSERT INTO `dictionaries` VALUES (21, 'images/U.png', 'U', NULL, NULL);
INSERT INTO `dictionaries` VALUES (22, 'images/V.png', 'V', NULL, NULL);
INSERT INTO `dictionaries` VALUES (23, 'images/W.png', 'W', NULL, NULL);
INSERT INTO `dictionaries` VALUES (24, 'images/X.png', 'X', NULL, NULL);
INSERT INTO `dictionaries` VALUES (25, 'images/Y.png', 'Y', NULL, NULL);
INSERT INTO `dictionaries` VALUES (26, 'images/Z.png', 'Z', NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
