/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100424
 Source Host           : localhost:3306
 Source Schema         : website

 Target Server Type    : MySQL
 Target Server Version : 100424
 File Encoding         : 65001

 Date: 04/07/2025 13:12:29
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
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of company
-- ----------------------------
INSERT INTO `company` VALUES (1, 'RS Mitra Husada', 'uploads/1750818144_fce35154e8050dd86179.png', 'Jl. Jend. Ahmad Yani No. 14, Sidoharjo, Kecamatan Pringsewu, Kabupaten Pringsewu, Lampung 35373. \r\n', '021-12345678', 'https://maps.app.goo.gl/Dfs7KcgykWfCfxAw5', '2025-06-25 02:20:56', '2025-06-25 02:22:24');

-- ----------------------------
-- Table structure for company_visi_misi
-- ----------------------------
DROP TABLE IF EXISTS `company_visi_misi`;
CREATE TABLE `company_visi_misi`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `misi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `visi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `tagline` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `nilai_inti` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `deleted` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of company_visi_misi
-- ----------------------------
INSERT INTO `company_visi_misi` VALUES (1, '', '', 'dgfd', '<p>gfdcsds</p>', 0);
INSERT INTO `company_visi_misi` VALUES (2, 'Mengembangkan sumber daya manusia yang kompeten, produktifdan melayani dengan sepenuh hati', '', 'sddsf', '<p>da</p>', 0);
INSERT INTO `company_visi_misi` VALUES (3, 'Mengembangkan pelayanan yang kompeherensif dengan mengacu pada perkembangan teknologi dan keselamatan pasien', '', 'adsad', '<p>dsadasd</p>', 0);
INSERT INTO `company_visi_misi` VALUES (4, 'Menyelnggarakan pelayanan kesehatan yang terhangkau bagi seluruh masyarakat', 'Menjadi rumah sakit pilihan masyarakat yang bermutu, dan unggul dalam bidang pelayanan kesehatan', 'Profeisonal', '<ul><li>Kompeten</li><li>Trampil</li><li>Disiplin</li></ul>', 0);
INSERT INTO `company_visi_misi` VALUES (5, '<p>rerewr</p>', '<p>fewew</p>', 'rew', '<p>ewrew</p>', 1);
INSERT INTO `company_visi_misi` VALUES (6, '', '', 'Profisonal', '', 1);

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
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

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
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of doctors
-- ----------------------------
INSERT INTO `doctors` VALUES (1, 'dr. Andi Wijaya', 'Penyakit Dalam', NULL, '2025-06-25 02:20:56', NULL);
INSERT INTO `doctors` VALUES (2, 'dr. Siti Rahma', 'Anak', NULL, '2025-06-25 02:20:56', NULL);

-- ----------------------------
-- Table structure for kategori_pages
-- ----------------------------
DROP TABLE IF EXISTS `kategori_pages`;
CREATE TABLE `kategori_pages`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `slug_kategori` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategori_pages
-- ----------------------------
INSERT INTO `kategori_pages` VALUES (1, 'Visi dan Misi', 'visimisi');
INSERT INTO `kategori_pages` VALUES (2, 'Sejarah', 'sejarah');
INSERT INTO `kategori_pages` VALUES (3, 'Fasilitas', 'fasilitas');
INSERT INTO `kategori_pages` VALUES (4, 'Tentang Kami', 'tentang-kami');

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

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
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES (1, 'Beranda', 'admin', 'ti ti-dashboard', 'item', NULL, 1, 'admin', NULL, NULL);
INSERT INTO `menus` VALUES (2, 'Posting', 'admin/news', 'ti ti-news', 'item', NULL, 2, 'admin', NULL, NULL);
INSERT INTO `menus` VALUES (3, 'Galeri', 'admin/media', 'ti ti-photo', 'item', NULL, 3, 'admin', NULL, NULL);
INSERT INTO `menus` VALUES (4, 'Halaman', 'admin/pages', 'ti ti-file', 'item', NULL, 5, 'admin', NULL, NULL);
INSERT INTO `menus` VALUES (5, 'Dokter', 'admin/doctors', 'ti ti-user', 'item', NULL, 6, 'admin', NULL, NULL);
INSERT INTO `menus` VALUES (6, 'Jadwal', 'admin/schedules', 'ti ti-calendar', 'item', NULL, 7, 'admin', NULL, NULL);
INSERT INTO `menus` VALUES (7, 'Pengguna', 'admin/users', 'ti ti-user-plus', 'item', NULL, 8, 'admin', NULL, NULL);
INSERT INTO `menus` VALUES (8, 'Pengaturan', 'admin/company', 'ti ti-settings', 'item', NULL, 9, 'admin', NULL, NULL);
INSERT INTO `menus` VALUES (9, 'Keluar', 'logout', 'ti ti-logout', 'item', NULL, 10, 'admin', NULL, NULL);
INSERT INTO `menus` VALUES (10, 'Beranda', '/', 'ti ti-home', 'item', NULL, 1, 'public', NULL, NULL);
INSERT INTO `menus` VALUES (11, 'Berita', '/news', 'ti ti-news', 'item', NULL, 2, 'public', NULL, NULL);
INSERT INTO `menus` VALUES (12, 'Profil', '/profil', 'ti ti-user', 'item', NULL, 3, 'public', NULL, NULL);
INSERT INTO `menus` VALUES (13, 'Fasilitas', '/fasilitas', 'ti ti-calendar', 'item', NULL, 4, 'public', NULL, NULL);
INSERT INTO `menus` VALUES (14, 'Tentang', '/about', NULL, 'item', NULL, 5, 'public', NULL, NULL);
INSERT INTO `menus` VALUES (15, 'Sejarah', '/profil/sejarah', NULL, 'item', 12, 6, 'public', NULL, NULL);
INSERT INTO `menus` VALUES (16, 'Visi & Misi', '/profil/visimisi', NULL, 'item', 12, 7, 'public', NULL, NULL);
INSERT INTO `menus` VALUES (17, 'Kategori Pages', 'admin/kategori-pages', 'ti ti-file', 'item', NULL, 4, 'admin', NULL, NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

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
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES (1, 'Rumah Sakit Meluncurkan Layanan Baru', 'rumah-sakit-meluncurkan-layanan-baru', 'Rumah sakit kini menyediakan layanan rawat jalan terbaru untuk pasien.', 'uploads/news/1751268640_af779728203a0e65643a.png', '2025-06-25 00:00:00', '2025-06-25 02:20:56', '2025-06-30 07:30:40', '', '', '');
INSERT INTO `news` VALUES (2, 'Pendaftaran Dokter Spesialis', 'pendaftaran-dokter-spesialis', 'Kini tersedia pendaftaran dokter spesialis secara online.', 'uploads/news/1751463207_e9a520d263db8dd43933.jpg', '2025-06-25 00:00:00', '2025-06-25 02:20:56', '2025-07-02 13:33:27', '', '', '');
INSERT INTO `news` VALUES (3, 'Selamat Datang Karyawan Baru di Rumah Sakit Mitra Husada', 'selamat-datang-karyawan-baru-di-rumah-sakit-mitra-husada', '<p data-start=\"185\" data-end=\"647\">Rumah Sakit Mitra Husada dengan bangga menyambut kehadiran karyawan baru sebagai bagian dari keluarga besar kami. Sebagai salah satu fasilitas layanan kesehatan yang berkomitmen tinggi terhadap mutu pelayanan dan keselamatan pasien, kami percaya bahwa sumber daya manusia yang profesional, berdedikasi, dan berintegritas merupakan kunci utama dalam mewujudkan visi kami: <em data-start=\"556\" data-end=\"647\">\"Menjadi rumah sakit pilihan utama masyarakat dengan layanan yang unggul dan terpercaya.\"</em></p><p data-start=\"649\" data-end=\"869\">Dengan semangat kebersamaan, kami berharap kehadiran karyawan baru dapat membawa energi positif, ide-ide segar, serta turut andil dalam memberikan pelayanan kesehatan yang humanis, cepat, dan tepat kepada seluruh pasien.</p><p>\r\n\r\n</p><p data-start=\"871\" data-end=\"968\">Selamat bergabung di Rumah Sakit Mitra Husada! Mari bersama kita tumbuh dan melayani dengan hati.</p>', 'uploads/news/1751268598_061528b4243d93cdb8ca.png', '2025-06-30 00:00:00', '2025-06-30 07:28:05', '2025-06-30 07:29:58', '', '', '');
INSERT INTO `news` VALUES (4, 'RS Mitra Husada Resmi Buka Layanan NICU dan ICU Modern', 'rs-mitra-husada-resmi-buka-layanan-nicu-dan-icu-modern', '<p data-start=\"338\" data-end=\"689\"><strong data-start=\"338\" data-end=\"364\">Pringsewu, 15 Mei 2025</strong> – Dalam upaya meningkatkan kualitas layanan medis, Rumah Sakit Mitra Husada meresmikan pembukaan layanan <strong data-start=\"470\" data-end=\"509\">NICU (Neonatal Intensive Care Unit)</strong> dan <strong data-start=\"514\" data-end=\"543\">ICU (Intensive Care Unit)</strong> terbaru. Fasilitas ini dilengkapi peralatan medis berstandar internasional dan ditangani langsung oleh tim dokter spesialis dan perawat terlatih.</p><p>\r\n</p><p data-start=\"691\" data-end=\"841\"><em data-start=\"691\" data-end=\"791\">“Kami berharap layanan ini dapat meningkatkan angka kesembuhan bayi baru lahir dan pasien kritis,”</em> ujar dr. Rina, Sp.A, Kepala NICU RS Mitra Husada.</p>', 'uploads/news/1751516485_7375b8f4050974a730e9.jpg', '2025-07-03 00:00:00', '2025-07-03 04:21:25', '2025-07-03 04:21:25', '', '', '');
INSERT INTO `news` VALUES (5, ' RS Mitra Husada Raih Akreditasi Paripurna dari KARS', 'rs-mitra-husada-raih-akreditasi-paripurna-dari-kars', '<p data-start=\"1885\" data-end=\"2184\">Prestasi membanggakan diraih RS Mitra Husada setelah berhasil meraih <strong data-start=\"1987\" data-end=\"2011\">akreditasi paripurna</strong> dari Komisi Akreditasi Rumah Sakit (KARS). Capaian ini menunjukkan bahwa seluruh aspek pelayanan, manajemen mutu, hingga keselamatan pasien sudah memenuhi standar nasional.</p><p>\r\n</p><p data-start=\"2186\" data-end=\"2297\">Manajemen rumah sakit menyatakan komitmennya untuk terus mempertahankan dan meningkatkan standar pelayanan ini.</p>', 'uploads/news/1751516665_bce4f5b8c2b907952d39.jpg', '2025-07-03 00:00:00', '2025-07-03 04:24:25', '2025-07-03 04:24:25', '', '', '');

-- ----------------------------
-- Table structure for pages
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kategori_id` int NOT NULL COMMENT 'kalo 1 = visimisi, kalo 2 = sejarah, kalo 3 = fasilitas',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gambar` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `link_yt` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `slug`(`slug` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of pages
-- ----------------------------
INSERT INTO `pages` VALUES (1, 'Tentang Kami', 'tentang-kami', '<p data-start=\"200\" data-end=\"504\">Rumah Sakit Mitra Husada Pringsewu merupakan rumah sakit umum swasta tipe C yang berdiri sejak 5 Agustus 2008. Berlokasi di Jl. Jend. Ahmad Yani No. 14, Pringsewu, Lampung, rumah sakit ini hadir sebagai wujud kepedulian terhadap kebutuhan layanan kesehatan yang bermutu dan mudah diakses oleh masyarakat.</p><p data-start=\"506\" data-end=\"766\">Dengan fasilitas yang lengkap dan tenaga medis profesional, RS Mitra Husada melayani berbagai jenis layanan kesehatan mulai dari rawat jalan, rawat inap, ruang operasi, instalasi gawat darurat (IGD), laboratorium, radiologi, hingga layanan penunjang lainnya.</p><p>\r\n\r\n</p><p data-start=\"768\" data-end=\"1006\">Kami terus berkomitmen untuk memberikan pelayanan yang prima, humanis, dan berbasis keselamatan pasien. Seiring perjalanan waktu, RS Mitra Husada telah berkembang menjadi rumah sakit pilihan masyarakat di wilayah Pringsewu dan sekitarnya.</p>', 4, '2025-06-25 02:20:56', '2025-07-02 13:15:11', 'uploads/pages/1751462111_fa33a2faf3bf61dd2423.jpg', 'https://www.youtube.com/watch?v=l0Slj7nmVbg');
INSERT INTO `pages` VALUES (2, 'Kontak', 'kontak', '<p>Ini adalah halaman kontak.</p>', 0, '2025-06-25 02:20:56', '2025-06-25 02:20:56', '', '');
INSERT INTO `pages` VALUES (3, 'Visi', 'visimisi', '<p>Menjadi rumah sakit pilihan masyarakat yang bermutu, dan unggul dalam bidang pelayanan kesehatan</p>', 1, '2025-06-25 02:20:56', '2025-07-04 03:56:40', '', '');
INSERT INTO `pages` VALUES (4, 'Ruang Operasi', 'ruang-operasi', '<h3 data-start=\"168\" data-end=\"220\"><span style=\"font-size: 14px; color: rgb(0, 0, 0); font-weight: 400;\">Ruang operasi kami dilengkapi dengan peralatan medis mutakhir seperti mesin anestesi terbaru, lampu operasi LED berteknologi tinggi, serta sistem sirkulasi udara bertekanan positif (positive pressure) untuk mencegah kontaminasi udara.</span></h3><p data-start=\"603\" data-end=\"762\">Tim medis yang bertugas di ruang operasi terdiri dari dokter spesialis bedah, ahli anestesi, serta perawat kamar operasi yang telah terlatih dan bersertifikat.</p><p data-start=\"222\" data-end=\"550\">\r\n\r\n</p><p data-start=\"764\" data-end=\"914\">Kami menyediakan layanan operasi elektif dan gawat darurat 24 jam, dengan protokol steril yang ketat demi menjaga keselamatan pasien dan tenaga medis.</p>', 3, '2025-07-02 07:19:41', '2025-07-02 13:32:40', 'uploads/pages/1751440781_5cfca66b5b807876c618.png', '');
INSERT INTO `pages` VALUES (5, 'Laboratorium', 'laboratorium', '<p data-start=\"333\" data-end=\"640\">Laboratorium kami dilengkapi dengan berbagai alat diagnostik canggih seperti <strong data-start=\"410\" data-end=\"433\">hematology analyzer</strong>, <strong data-start=\"435\" data-end=\"466\">clinical chemistry analyzer</strong>, <strong data-start=\"468\" data-end=\"486\">urine analyzer</strong>, dan <strong data-start=\"492\" data-end=\"521\">immunology testing system</strong> yang memungkinkan pemeriksaan mulai dari darah lengkap, fungsi hati dan ginjal, hingga pemeriksaan hormon dan infeksi.</p><p>\r\n</p><p data-start=\"642\" data-end=\"846\">Tenaga analis laboratorium kami merupakan profesional berpengalaman dan bersertifikasi, yang siap memberikan pelayanan selama 24 jam, baik untuk pasien rawat jalan, rawat inap, maupun kasus gawat darurat.</p>', 3, '2025-07-02 07:42:57', '2025-07-02 07:42:57', 'uploads/pages/1751442177_4df8ec0b67d55c611b9f.png', '');
INSERT INTO `pages` VALUES (6, 'Sejarah', 'sejarah', '<p data-start=\"227\" data-end=\"543\" style=\"--tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / .5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ;\">Rumah Sakit Mitra Husada didirikan sebagai wujud kepedulian terhadap kebutuhan masyarakat akan pelayanan kesehatan yang aman, cepat, dan terpercaya. Berawal dari sebuah klinik kecil yang berdiri pada tahun&nbsp;<span data-start=\"433\" data-end=\"441\" style=\"--tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / .5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-weight: 600;\">2005</span>, fasilitas kesehatan ini tumbuh seiring waktu menjadi salah satu rumah sakit terkemuka di wilayahnya.</p><p data-start=\"545\" data-end=\"852\" style=\"--tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / .5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ;\">Dengan komitmen tinggi terhadap mutu pelayanan dan keselamatan pasien, RS Mitra Husada terus berinovasi dan memperluas layanan medisnya. Pada tahun&nbsp;<span data-start=\"693\" data-end=\"701\" style=\"--tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / .5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-weight: 600;\">2010</span>, rumah sakit ini resmi memperoleh izin operasional sebagai&nbsp;<span data-start=\"761\" data-end=\"781\" style=\"--tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / .5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-weight: 600;\">Rumah Sakit Umum</span>, dan sejak saat itu telah melayani ribuan pasien dari berbagai daerah.</p><p data-start=\"854\" data-end=\"1136\" style=\"--tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / .5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ;\">Seiring perkembangan zaman dan tuntutan masyarakat yang semakin kompleks, RS Mitra Husada melakukan berbagai peningkatan, baik dalam hal sumber daya manusia, fasilitas medis, maupun sistem informasi rumah sakit. Beberapa tonggak penting dalam perjalanan RS Mitra Husada antara lain:</p><ul data-start=\"1138\" data-end=\"1423\" style=\"--tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / .5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ;\"><li data-start=\"1138\" data-end=\"1220\" style=\"--tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / .5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ;\"><p data-start=\"1140\" data-end=\"1220\" style=\"--tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / .5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ;\"><span data-start=\"1140\" data-end=\"1148\" style=\"--tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / .5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-weight: 600;\">2012</span>: Pengembangan layanan IGD 24 jam dan ruang rawat inap standar nasional.</p></li><li data-start=\"1221\" data-end=\"1289\" style=\"--tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / .5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ;\"><p data-start=\"1223\" data-end=\"1289\" style=\"--tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / .5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ;\"><span data-start=\"1223\" data-end=\"1231\" style=\"--tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / .5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-weight: 600;\">2015</span>: Penambahan fasilitas laboratorium dan radiologi digital.</p></li><li data-start=\"1290\" data-end=\"1361\" style=\"--tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / .5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ;\"><p data-start=\"1292\" data-end=\"1361\" style=\"--tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / .5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ;\"><span data-start=\"1292\" data-end=\"1300\" style=\"--tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / .5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-weight: 600;\">2018</span>: Penerapan sistem rekam medis elektronik (e-medical record).</p></li><li data-start=\"1362\" data-end=\"1423\" style=\"--tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / .5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ;\"><p data-start=\"1364\" data-end=\"1423\" style=\"--tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / .5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ;\"><span data-start=\"1364\" data-end=\"1372\" style=\"--tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / .5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-weight: 600;\">2022</span>: Pembangunan gedung baru untuk ruang ICU dan NICU.</p></li></ul><p style=\"--tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / .5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ;\"></p><p data-start=\"1425\" data-end=\"1760\" style=\"--tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / .5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ;\">Saat ini, Rumah Sakit Mitra Husada telah menjadi pusat layanan kesehatan rujukan dengan berbagai layanan spesialis dan subspesialis. Didukung oleh tenaga medis profesional, peralatan medis modern, dan pelayanan yang ramah serta humanis, RS Mitra Husada siap menjadi mitra terbaik bagi masyarakat dalam menjaga dan memulihkan kesehatan.</p>', 2, '2025-07-03 02:39:28', '2025-07-03 02:39:28', 'uploads/pages/1751510368_f864ac082f6edb674615.jpg', '');

-- ----------------------------
-- Table structure for post
-- ----------------------------
DROP TABLE IF EXISTS `post`;
CREATE TABLE `post`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `gambar` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `slug`(`slug` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of post
-- ----------------------------
INSERT INTO `post` VALUES (1, 'Pendaftaran Dokter Spesialis', 'pendaftaran-dokter-spesialis', '<p>Ini adalah halaman tentang kami.</p>', NULL, '2025-06-25 02:20:56', '2025-06-25 02:20:56');
INSERT INTO `post` VALUES (2, 'Rumah Sakit Meluncurkan Layanan Baru', 'rumah-sakit-meluncurkan-layanan-baru', '<p>Ini adalah halaman kontak.</p>', NULL, '2025-06-25 02:20:56', '2025-06-25 02:20:56');

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
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

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
  `role` enum('admin','editor','user') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'user',
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username` ASC) USING BTREE,
  UNIQUE INDEX `email`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', 'admin@localhost', '$2y$10$AcpuSYtB5lXSgUyMxIw4f.ZvheAYOQDLNB2a9bpxVZWJPr7Skoe06', 'Administrator', 'admin', '2025-06-25 02:20:56', NULL);
INSERT INTO `users` VALUES (2, 'sofyan', 'sofyanhadi1907@gmail.com', '$2y$10$I6EEs8oMcTa8yD.NNqZp/.zYlZpPUp/KXlgJFCRw5NxzcNJBGNWD6', '', 'user', '2025-06-26 03:49:39', '2025-06-26 04:00:40');

SET FOREIGN_KEY_CHECKS = 1;
