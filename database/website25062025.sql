/*
 Navicat Premium Data Transfer

 Source Server         : Server Lokal
 Source Server Type    : MySQL
 Source Server Version : 100424
 Source Host           : localhost:3306
 Source Schema         : website

 Target Server Type    : MySQL
 Target Server Version : 100424
 File Encoding         : 65001

 Date: 25/06/2025 09:44:49
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for company
-- ----------------------------
DROP TABLE IF EXISTS `company`;
CREATE TABLE `company`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `phone` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `maps_location` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of company
-- ----------------------------
INSERT INTO `company` VALUES (1, 'RS Mitra Husada', 'uploads/1750818144_fce35154e8050dd86179.png', 'Jl. Contoh Alamat No.1, Kota Contoh', '021-12345678', 'https://maps.google.com/?q=-6.200000,106.816666', '2025-06-25 02:20:56', '2025-06-25 02:22:24');

-- ----------------------------
-- Table structure for doctor_schedules
-- ----------------------------
DROP TABLE IF EXISTS `doctor_schedules`;
CREATE TABLE `doctor_schedules`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `doctor_id` int UNSIGNED NOT NULL,
  `day` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `doctor_schedules_doctor_id_foreign`(`doctor_id` ASC) USING BTREE,
  CONSTRAINT `doctor_schedules_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of doctor_schedules
-- ----------------------------
INSERT INTO `doctor_schedules` VALUES (1, 1, 'Senin', '08:00:00', '12:00:00', '2025-06-25 02:20:56', NULL);
INSERT INTO `doctor_schedules` VALUES (2, 2, 'Selasa', '09:00:00', '13:00:00', '2025-06-25 02:20:56', NULL);

-- ----------------------------
-- Table structure for doctors
-- ----------------------------
DROP TABLE IF EXISTS `doctors`;
CREATE TABLE `doctors`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `specialization` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of doctors
-- ----------------------------
INSERT INTO `doctors` VALUES (1, 'dr. Andi Wijaya', 'Penyakit Dalam', NULL, '2025-06-25 02:20:56', NULL);
INSERT INTO `doctors` VALUES (2, 'dr. Siti Rahma', 'Anak', NULL, '2025-06-25 02:20:56', NULL);

-- ----------------------------
-- Table structure for media
-- ----------------------------
DROP TABLE IF EXISTS `media`;
CREATE TABLE `media`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `file_path` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `uploaded_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of media
-- ----------------------------

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `icon` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `type` enum('item','caption') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'item',
  `parent_id` int UNSIGNED NULL DEFAULT NULL,
  `position` int NOT NULL DEFAULT 0,
  `menu_type` enum('admin','public') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'public',
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `menus_parent_id_foreign`(`parent_id` ASC) USING BTREE,
  CONSTRAINT `menus_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES (1, 'Beranda', 'admin', 'ti ti-dashboard', 'item', NULL, 1, 'admin', NULL, NULL);
INSERT INTO `menus` VALUES (2, 'Posting', 'admin/news', 'ti ti-news', 'item', NULL, 2, 'admin', NULL, NULL);
INSERT INTO `menus` VALUES (3, 'Galeri', 'admin/media', 'ti ti-photo', 'item', NULL, 3, 'admin', NULL, NULL);
INSERT INTO `menus` VALUES (4, 'Halaman', 'admin/pages', 'ti ti-file', 'item', NULL, 4, 'admin', NULL, NULL);
INSERT INTO `menus` VALUES (5, 'Dokter', 'admin/doctors', 'ti ti-user', 'item', NULL, 5, 'admin', NULL, NULL);
INSERT INTO `menus` VALUES (6, 'Jadwal', 'admin/schedules', 'ti ti-calendar', 'item', NULL, 6, 'admin', NULL, NULL);
INSERT INTO `menus` VALUES (7, 'Pengguna', 'admin/users', 'ti ti-user-plus', 'item', NULL, 7, 'admin', NULL, NULL);
INSERT INTO `menus` VALUES (8, 'Pengaturan', 'admin/company', 'ti ti-settings', 'item', NULL, 8, 'admin', NULL, NULL);
INSERT INTO `menus` VALUES (9, 'Keluar', 'logout', 'ti ti-logout', 'item', NULL, 9, 'admin', NULL, NULL);
INSERT INTO `menus` VALUES (10, 'Beranda', '/', 'ti ti-home', 'item', NULL, 1, 'public', NULL, NULL);
INSERT INTO `menus` VALUES (11, 'Berita', '/news', 'ti ti-news', 'item', NULL, 2, 'public', NULL, NULL);
INSERT INTO `menus` VALUES (12, 'Profil', '/profil', 'ti ti-user', 'item', NULL, 3, 'public', NULL, NULL);
INSERT INTO `menus` VALUES (13, 'Fasilitas', '/fasilitas', 'ti ti-calendar', 'item', NULL, 4, 'public', NULL, NULL);
INSERT INTO `menus` VALUES (14, 'Karir', '/karir', NULL, 'item', NULL, 5, 'public', NULL, NULL);
INSERT INTO `menus` VALUES (15, 'Sejarah', '/profil/sejarah', NULL, 'item', 12, 6, 'public', NULL, NULL);
INSERT INTO `menus` VALUES (16, 'Visi & Misi', '/profil/visimisi', NULL, 'item', 12, 7, 'public', NULL, NULL);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `version` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `class` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `group` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `namespace` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2024-06-02-000001', 'App\\Database\\Migrations\\CreateUsersTable', 'default', 'App', 1750817846, 1);
INSERT INTO `migrations` VALUES (2, '2024-06-02-000002', 'App\\Database\\Migrations\\CreateMenusTable', 'default', 'App', 1750817847, 1);
INSERT INTO `migrations` VALUES (3, '2024-06-02-000003', 'App\\Database\\Migrations\\CreateNewsTable', 'default', 'App', 1750817847, 1);
INSERT INTO `migrations` VALUES (4, '2024-06-02-000004', 'App\\Database\\Migrations\\CreateDoctorsTable', 'default', 'App', 1750817847, 1);
INSERT INTO `migrations` VALUES (5, '2024-06-02-000005', 'App\\Database\\Migrations\\CreateDoctorSchedulesTable', 'default', 'App', 1750817847, 1);
INSERT INTO `migrations` VALUES (6, '2024-06-02-000006', 'App\\Database\\Migrations\\CreateCompanyTable', 'default', 'App', 1750817847, 1);
INSERT INTO `migrations` VALUES (7, '2025-06-09-131700', 'App\\Database\\Migrations\\CreateMediaTable', 'default', 'App', 1750817847, 1);
INSERT INTO `migrations` VALUES (8, '2025-06-09-132100', 'App\\Database\\Migrations\\CreatePagesTable', 'default', 'App', 1750817848, 1);
INSERT INTO `migrations` VALUES (9, '2025-06-09-132400', 'App\\Database\\Migrations\\CreateSchedulesTable', 'default', 'App', 1750817848, 1);
INSERT INTO `migrations` VALUES (10, '2025-06-17-090601', 'App\\Database\\Migrations\\AddMetaFieldsToNews', 'default', 'App', 1750817849, 1);

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `slug` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `featured_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `published_at` datetime NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `meta_title` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `meta_keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `slug`(`slug` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES (1, 'Rumah Sakit Meluncurkan Layanan Baru', 'rs-luncurkan-layanan-baru', 'Rumah sakit kini menyediakan layanan rawat jalan terbaru untuk pasien.', NULL, '2025-06-25 02:20:56', '2025-06-25 02:20:56', NULL, NULL, NULL, NULL);
INSERT INTO `news` VALUES (2, 'Pendaftaran Dokter Spesialis', 'pendaftaran-dokter-spesialis', 'Kini tersedia pendaftaran dokter spesialis secara online.', NULL, '2025-06-25 02:20:56', '2025-06-25 02:20:56', NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for pages
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `slug`(`slug` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pages
-- ----------------------------
INSERT INTO `pages` VALUES (1, 'Tentang Kami', 'tentang-kami', '<p>Ini adalah halaman tentang kami.</p>', '2025-06-25 02:20:56', '2025-06-25 02:20:56');
INSERT INTO `pages` VALUES (2, 'Kontak', 'kontak', '<p>Ini adalah halaman kontak.</p>', '2025-06-25 02:20:56', '2025-06-25 02:20:56');

-- ----------------------------
-- Table structure for schedules
-- ----------------------------
DROP TABLE IF EXISTS `schedules`;
CREATE TABLE `schedules`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `doctor_id` int UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `schedules_doctor_id_foreign`(`doctor_id` ASC) USING BTREE,
  CONSTRAINT `schedules_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of schedules
-- ----------------------------
INSERT INTO `schedules` VALUES (1, 1, '2025-06-10', '08:00:00', 'Praktek Pagi', '2025-06-25 02:20:56', '2025-06-25 02:20:56');
INSERT INTO `schedules` VALUES (2, 1, '2025-06-10', '13:00:00', 'Praktek Siang', '2025-06-25 02:20:56', '2025-06-25 02:20:56');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `role` enum('admin','staff') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'staff',
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username` ASC) USING BTREE,
  UNIQUE INDEX `email`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', 'admin@localhost', '$2y$10$AcpuSYtB5lXSgUyMxIw4f.ZvheAYOQDLNB2a9bpxVZWJPr7Skoe06', 'Administrator', 'admin', '2025-06-25 02:20:56', NULL);

SET FOREIGN_KEY_CHECKS = 1;
