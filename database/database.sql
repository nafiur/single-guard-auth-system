/*
 Navicat Premium Dump SQL

 Source Server         : Laragoan
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : ebonwindow

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 24/05/2026 16:35:15
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for activity_log
-- ----------------------------
DROP TABLE IF EXISTS `activity_log`;
CREATE TABLE `activity_log`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `log_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `event` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `subject_id` bigint UNSIGNED NULL DEFAULT NULL,
  `causer_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `causer_id` bigint UNSIGNED NULL DEFAULT NULL,
  `properties` json NULL,
  `batch_uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `subject`(`subject_type` ASC, `subject_id` ASC) USING BTREE,
  INDEX `causer`(`causer_type` ASC, `causer_id` ASC) USING BTREE,
  INDEX `activity_log_log_name_index`(`log_name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of activity_log
-- ----------------------------
INSERT INTO `activity_log` VALUES (1, 'user', 'updated', 'App\\Models\\User', 'updated', 1, 'App\\Models\\User', 1, '{\"old\": {\"last_login_at\": null}, \"attributes\": {\"last_login_at\": \"2026-05-24T10:12:16.000000Z\"}}', NULL, '2026-05-24 10:12:16', '2026-05-24 10:12:16');

-- ----------------------------
-- Table structure for cache
-- ----------------------------
DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache`  (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`) USING BTREE,
  INDEX `cache_expiration_index`(`expiration` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cache
-- ----------------------------
INSERT INTO `cache` VALUES ('multi-guard-auth-system-cache-spatie.permission.cache', 'a:3:{s:5:\"alias\";a:11:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:6:\"module\";s:1:\"c\";s:4:\"name\";s:1:\"d\";s:10:\"guard_name\";s:1:\"e\";s:8:\"group_id\";s:1:\"f\";s:5:\"label\";s:1:\"g\";s:11:\"description\";s:1:\"h\";s:9:\"is_active\";s:10:\"created_by\";s:10:\"created_by\";s:10:\"updated_by\";s:10:\"updated_by\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:24:{i:0;a:11:{s:1:\"a\";i:1;s:1:\"b\";s:6:\"Admins\";s:1:\"c\";s:19:\"view-administrators\";s:1:\"d\";s:3:\"web\";s:1:\"e\";i:1;s:1:\"f\";s:19:\"View Administrators\";s:1:\"g\";N;s:1:\"h\";i:1;s:10:\"created_by\";N;s:10:\"updated_by\";N;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:1;a:11:{s:1:\"a\";i:2;s:1:\"b\";s:6:\"Admins\";s:1:\"c\";s:21:\"create-administrators\";s:1:\"d\";s:3:\"web\";s:1:\"e\";i:1;s:1:\"f\";s:21:\"Create Administrators\";s:1:\"g\";N;s:1:\"h\";i:1;s:10:\"created_by\";N;s:10:\"updated_by\";N;s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:2;a:11:{s:1:\"a\";i:3;s:1:\"b\";s:6:\"Admins\";s:1:\"c\";s:19:\"edit-administrators\";s:1:\"d\";s:3:\"web\";s:1:\"e\";i:1;s:1:\"f\";s:19:\"Edit Administrators\";s:1:\"g\";N;s:1:\"h\";i:1;s:10:\"created_by\";N;s:10:\"updated_by\";N;s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:3;a:11:{s:1:\"a\";i:4;s:1:\"b\";s:6:\"Admins\";s:1:\"c\";s:21:\"delete-administrators\";s:1:\"d\";s:3:\"web\";s:1:\"e\";i:1;s:1:\"f\";s:21:\"Delete Administrators\";s:1:\"g\";N;s:1:\"h\";i:1;s:10:\"created_by\";N;s:10:\"updated_by\";N;s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:11:{s:1:\"a\";i:5;s:1:\"b\";s:5:\"Roles\";s:1:\"c\";s:10:\"view-roles\";s:1:\"d\";s:3:\"web\";s:1:\"e\";i:2;s:1:\"f\";s:10:\"View Roles\";s:1:\"g\";N;s:1:\"h\";i:1;s:10:\"created_by\";N;s:10:\"updated_by\";N;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:5;a:11:{s:1:\"a\";i:6;s:1:\"b\";s:5:\"Roles\";s:1:\"c\";s:12:\"create-roles\";s:1:\"d\";s:3:\"web\";s:1:\"e\";i:2;s:1:\"f\";s:12:\"Create Roles\";s:1:\"g\";N;s:1:\"h\";i:1;s:10:\"created_by\";N;s:10:\"updated_by\";N;s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:11:{s:1:\"a\";i:7;s:1:\"b\";s:5:\"Roles\";s:1:\"c\";s:10:\"edit-roles\";s:1:\"d\";s:3:\"web\";s:1:\"e\";i:2;s:1:\"f\";s:10:\"Edit Roles\";s:1:\"g\";N;s:1:\"h\";i:1;s:10:\"created_by\";N;s:10:\"updated_by\";N;s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:11:{s:1:\"a\";i:8;s:1:\"b\";s:5:\"Roles\";s:1:\"c\";s:12:\"delete-roles\";s:1:\"d\";s:3:\"web\";s:1:\"e\";i:2;s:1:\"f\";s:12:\"Delete Roles\";s:1:\"g\";N;s:1:\"h\";i:1;s:10:\"created_by\";N;s:10:\"updated_by\";N;s:1:\"r\";a:1:{i:0;i:1;}}i:8;a:11:{s:1:\"a\";i:9;s:1:\"b\";s:11:\"Permissions\";s:1:\"c\";s:16:\"view-permissions\";s:1:\"d\";s:3:\"web\";s:1:\"e\";i:2;s:1:\"f\";s:16:\"View Permissions\";s:1:\"g\";N;s:1:\"h\";i:1;s:10:\"created_by\";N;s:10:\"updated_by\";N;s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:9;a:11:{s:1:\"a\";i:10;s:1:\"b\";s:11:\"Permissions\";s:1:\"c\";s:18:\"create-permissions\";s:1:\"d\";s:3:\"web\";s:1:\"e\";i:2;s:1:\"f\";s:18:\"Create Permissions\";s:1:\"g\";N;s:1:\"h\";i:1;s:10:\"created_by\";N;s:10:\"updated_by\";N;s:1:\"r\";a:1:{i:0;i:1;}}i:10;a:11:{s:1:\"a\";i:11;s:1:\"b\";s:11:\"Permissions\";s:1:\"c\";s:16:\"edit-permissions\";s:1:\"d\";s:3:\"web\";s:1:\"e\";i:2;s:1:\"f\";s:16:\"Edit Permissions\";s:1:\"g\";N;s:1:\"h\";i:1;s:10:\"created_by\";N;s:10:\"updated_by\";N;s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:11:{s:1:\"a\";i:12;s:1:\"b\";s:11:\"Permissions\";s:1:\"c\";s:18:\"delete-permissions\";s:1:\"d\";s:3:\"web\";s:1:\"e\";i:2;s:1:\"f\";s:18:\"Delete Permissions\";s:1:\"g\";N;s:1:\"h\";i:1;s:10:\"created_by\";N;s:10:\"updated_by\";N;s:1:\"r\";a:1:{i:0;i:1;}}i:12;a:11:{s:1:\"a\";i:13;s:1:\"b\";s:6:\"Groups\";s:1:\"c\";s:22:\"view-permission-groups\";s:1:\"d\";s:3:\"web\";s:1:\"e\";i:2;s:1:\"f\";s:22:\"View Permission Groups\";s:1:\"g\";N;s:1:\"h\";i:1;s:10:\"created_by\";N;s:10:\"updated_by\";N;s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:13;a:11:{s:1:\"a\";i:14;s:1:\"b\";s:6:\"Groups\";s:1:\"c\";s:24:\"create-permission-groups\";s:1:\"d\";s:3:\"web\";s:1:\"e\";i:2;s:1:\"f\";s:24:\"Create Permission Groups\";s:1:\"g\";N;s:1:\"h\";i:1;s:10:\"created_by\";N;s:10:\"updated_by\";N;s:1:\"r\";a:1:{i:0;i:1;}}i:14;a:11:{s:1:\"a\";i:15;s:1:\"b\";s:6:\"Groups\";s:1:\"c\";s:22:\"edit-permission-groups\";s:1:\"d\";s:3:\"web\";s:1:\"e\";i:2;s:1:\"f\";s:22:\"Edit Permission Groups\";s:1:\"g\";N;s:1:\"h\";i:1;s:10:\"created_by\";N;s:10:\"updated_by\";N;s:1:\"r\";a:1:{i:0;i:1;}}i:15;a:11:{s:1:\"a\";i:16;s:1:\"b\";s:6:\"Groups\";s:1:\"c\";s:24:\"delete-permission-groups\";s:1:\"d\";s:3:\"web\";s:1:\"e\";i:2;s:1:\"f\";s:24:\"Delete Permission Groups\";s:1:\"g\";N;s:1:\"h\";i:1;s:10:\"created_by\";N;s:10:\"updated_by\";N;s:1:\"r\";a:1:{i:0;i:1;}}i:16;a:11:{s:1:\"a\";i:17;s:1:\"b\";s:5:\"Users\";s:1:\"c\";s:10:\"view-users\";s:1:\"d\";s:3:\"web\";s:1:\"e\";i:3;s:1:\"f\";s:10:\"View Users\";s:1:\"g\";N;s:1:\"h\";i:1;s:10:\"created_by\";N;s:10:\"updated_by\";N;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:17;a:11:{s:1:\"a\";i:18;s:1:\"b\";s:5:\"Users\";s:1:\"c\";s:12:\"create-users\";s:1:\"d\";s:3:\"web\";s:1:\"e\";i:3;s:1:\"f\";s:12:\"Create Users\";s:1:\"g\";N;s:1:\"h\";i:1;s:10:\"created_by\";N;s:10:\"updated_by\";N;s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:18;a:11:{s:1:\"a\";i:19;s:1:\"b\";s:5:\"Users\";s:1:\"c\";s:10:\"edit-users\";s:1:\"d\";s:3:\"web\";s:1:\"e\";i:3;s:1:\"f\";s:10:\"Edit Users\";s:1:\"g\";N;s:1:\"h\";i:1;s:10:\"created_by\";N;s:10:\"updated_by\";N;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:19;a:11:{s:1:\"a\";i:20;s:1:\"b\";s:5:\"Users\";s:1:\"c\";s:12:\"delete-users\";s:1:\"d\";s:3:\"web\";s:1:\"e\";i:3;s:1:\"f\";s:12:\"Delete Users\";s:1:\"g\";N;s:1:\"h\";i:1;s:10:\"created_by\";N;s:10:\"updated_by\";N;s:1:\"r\";a:1:{i:0;i:1;}}i:20;a:11:{s:1:\"a\";i:21;s:1:\"b\";s:4:\"Logs\";s:1:\"c\";s:18:\"view-activity-logs\";s:1:\"d\";s:3:\"web\";s:1:\"e\";i:4;s:1:\"f\";s:18:\"View Activity Logs\";s:1:\"g\";N;s:1:\"h\";i:1;s:10:\"created_by\";N;s:10:\"updated_by\";N;s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:21;a:11:{s:1:\"a\";i:22;s:1:\"b\";s:4:\"Logs\";s:1:\"c\";s:20:\"delete-activity-logs\";s:1:\"d\";s:3:\"web\";s:1:\"e\";i:4;s:1:\"f\";s:20:\"Delete Activity Logs\";s:1:\"g\";N;s:1:\"h\";i:1;s:10:\"created_by\";N;s:10:\"updated_by\";N;s:1:\"r\";a:1:{i:0;i:1;}}i:22;a:11:{s:1:\"a\";i:23;s:1:\"b\";s:8:\"Settings\";s:1:\"c\";s:13:\"view-settings\";s:1:\"d\";s:3:\"web\";s:1:\"e\";i:5;s:1:\"f\";s:13:\"View Settings\";s:1:\"g\";N;s:1:\"h\";i:1;s:10:\"created_by\";N;s:10:\"updated_by\";N;s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:23;a:11:{s:1:\"a\";i:24;s:1:\"b\";s:8:\"Settings\";s:1:\"c\";s:15:\"update-settings\";s:1:\"d\";s:3:\"web\";s:1:\"e\";i:5;s:1:\"f\";s:15:\"Update Settings\";s:1:\"g\";N;s:1:\"h\";i:1;s:10:\"created_by\";N;s:10:\"updated_by\";N;s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:3:{i:0;a:8:{s:1:\"a\";i:1;s:1:\"c\";s:11:\"Super Admin\";s:1:\"d\";s:3:\"web\";s:1:\"f\";s:19:\"Super Administrator\";s:1:\"g\";N;s:1:\"h\";i:1;s:10:\"created_by\";N;s:10:\"updated_by\";N;}i:1;a:8:{s:1:\"a\";i:2;s:1:\"c\";s:5:\"Admin\";s:1:\"d\";s:3:\"web\";s:1:\"f\";s:13:\"Administrator\";s:1:\"g\";N;s:1:\"h\";i:1;s:10:\"created_by\";N;s:10:\"updated_by\";N;}i:2;a:8:{s:1:\"a\";i:3;s:1:\"c\";s:7:\"Manager\";s:1:\"d\";s:3:\"web\";s:1:\"f\";s:7:\"Manager\";s:1:\"g\";N;s:1:\"h\";i:1;s:10:\"created_by\";N;s:10:\"updated_by\";N;}}}', 1779703936);

-- ----------------------------
-- Table structure for cache_locks
-- ----------------------------
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks`  (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`) USING BTREE,
  INDEX `cache_locks_expiration_index`(`expiration` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cache_locks
-- ----------------------------

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for job_batches
-- ----------------------------
DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches`  (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cancelled_at` int NULL DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of job_batches
-- ----------------------------

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED NULL DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `jobs_queue_index`(`queue` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jobs
-- ----------------------------

-- ----------------------------
-- Table structure for lbs_log
-- ----------------------------
DROP TABLE IF EXISTS `lbs_log`;
CREATE TABLE `lbs_log`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `provider` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_json` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `response_json` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lbs_log
-- ----------------------------

-- ----------------------------
-- Table structure for login_histories
-- ----------------------------
DROP TABLE IF EXISTS `login_histories`;
CREATE TABLE `login_histories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `authenticatable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `authenticatable_id` bigint UNSIGNED NOT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `login_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `login_histories_authenticatable_type_authenticatable_id_index`(`authenticatable_type` ASC, `authenticatable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of login_histories
-- ----------------------------
INSERT INTO `login_histories` VALUES (1, 'App\\Models\\User', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '2026-05-24 10:12:16', '2026-05-24 10:12:16', NULL);
INSERT INTO `login_histories` VALUES (2, 'App\\Models\\User', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', '2026-05-24 10:12:16', '2026-05-24 10:12:16', NULL);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '0001_01_01_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '0001_01_01_000001_create_cache_table', 1);
INSERT INTO `migrations` VALUES (3, '0001_01_01_000002_create_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2026_03_04_141030_create_laravelbd_sms_table', 1);
INSERT INTO `migrations` VALUES (5, '2026_03_05_080852_create_permission_tables', 1);
INSERT INTO `migrations` VALUES (6, '2026_03_05_082122_create_permission_groups_table', 1);
INSERT INTO `migrations` VALUES (7, '2026_03_05_085430_create_activity_log_table', 1);
INSERT INTO `migrations` VALUES (8, '2026_03_05_085431_add_event_column_to_activity_log_table', 1);
INSERT INTO `migrations` VALUES (9, '2026_03_05_085432_add_batch_uuid_column_to_activity_log_table', 1);
INSERT INTO `migrations` VALUES (10, '2026_03_05_094001_add_status_to_users_and_admins_tables', 1);
INSERT INTO `migrations` VALUES (11, '2026_03_05_094759_add_tracking_columns_to_users_and_admins_tables', 1);
INSERT INTO `migrations` VALUES (12, '2026_03_05_094807_create_login_histories_table', 1);
INSERT INTO `migrations` VALUES (13, '2026_03_07_051659_create_settings_table', 1);
INSERT INTO `migrations` VALUES (14, '2026_03_07_060618_create_notifications_table', 1);
INSERT INTO `migrations` VALUES (15, '2026_03_07_064552_add_phone_to_users_and_admins_tables', 1);
INSERT INTO `migrations` VALUES (16, '2026_03_07_120000_add_profile_image_to_users_and_admins_table', 1);

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_permissions_model_id_model_type_index`(`model_id` ASC, `model_type` ASC) USING BTREE,
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles`  (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_roles_model_id_model_type_index`(`model_id` ASC, `model_type` ASC) USING BTREE,
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES (1, 'App\\Models\\User', 1);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 2);

-- ----------------------------
-- Table structure for notifications
-- ----------------------------
DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `notifications_notifiable_type_notifiable_id_index`(`notifiable_type` ASC, `notifiable_id` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of notifications
-- ----------------------------

-- ----------------------------
-- Table structure for otps
-- ----------------------------
DROP TABLE IF EXISTS `otps`;
CREATE TABLE `otps`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `identifier` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expires_at` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of otps
-- ----------------------------

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for permission_groups
-- ----------------------------
DROP TABLE IF EXISTS `permission_groups`;
CREATE TABLE `permission_groups`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `is_active` tinyint(1) NULL DEFAULT 1,
  `created_by` int NULL DEFAULT NULL,
  `updated_by` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permission_groups
-- ----------------------------
INSERT INTO `permission_groups` VALUES (1, 'Admin Management', 'Administrator Access', 'Permissions related to admin accounts', 1, NULL, NULL, '2026-05-24 10:12:10', '2026-05-24 10:12:10');
INSERT INTO `permission_groups` VALUES (2, 'Role Management', 'Access Control', 'Permissions for roles and permissions', 1, NULL, NULL, '2026-05-24 10:12:10', '2026-05-24 10:12:10');
INSERT INTO `permission_groups` VALUES (3, 'User Management', 'Public User Management', 'Permissions for customers and vendors', 1, NULL, NULL, '2026-05-24 10:12:10', '2026-05-24 10:12:10');
INSERT INTO `permission_groups` VALUES (4, 'System Logs', 'Audit Logs', 'Permissions for system and activity logs', 1, NULL, NULL, '2026-05-24 10:12:10', '2026-05-24 10:12:10');
INSERT INTO `permission_groups` VALUES (5, 'Settings', 'System Settings', 'Permissions for general site settings', 1, NULL, NULL, '2026-05-24 10:12:10', '2026-05-24 10:12:10');

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `module` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` int NULL DEFAULT NULL,
  `label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `is_active` tinyint(1) NULL DEFAULT 1,
  `created_by` int NULL DEFAULT NULL,
  `updated_by` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `permissions_name_guard_name_unique`(`name` ASC, `guard_name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'Admins', 'view-administrators', 'web', 1, 'View Administrators', NULL, 1, NULL, NULL, '2026-05-24 10:12:10', '2026-05-24 10:12:10');
INSERT INTO `permissions` VALUES (2, 'Admins', 'create-administrators', 'web', 1, 'Create Administrators', NULL, 1, NULL, NULL, '2026-05-24 10:12:10', '2026-05-24 10:12:10');
INSERT INTO `permissions` VALUES (3, 'Admins', 'edit-administrators', 'web', 1, 'Edit Administrators', NULL, 1, NULL, NULL, '2026-05-24 10:12:10', '2026-05-24 10:12:10');
INSERT INTO `permissions` VALUES (4, 'Admins', 'delete-administrators', 'web', 1, 'Delete Administrators', NULL, 1, NULL, NULL, '2026-05-24 10:12:10', '2026-05-24 10:12:10');
INSERT INTO `permissions` VALUES (5, 'Roles', 'view-roles', 'web', 2, 'View Roles', NULL, 1, NULL, NULL, '2026-05-24 10:12:10', '2026-05-24 10:12:10');
INSERT INTO `permissions` VALUES (6, 'Roles', 'create-roles', 'web', 2, 'Create Roles', NULL, 1, NULL, NULL, '2026-05-24 10:12:10', '2026-05-24 10:12:10');
INSERT INTO `permissions` VALUES (7, 'Roles', 'edit-roles', 'web', 2, 'Edit Roles', NULL, 1, NULL, NULL, '2026-05-24 10:12:10', '2026-05-24 10:12:10');
INSERT INTO `permissions` VALUES (8, 'Roles', 'delete-roles', 'web', 2, 'Delete Roles', NULL, 1, NULL, NULL, '2026-05-24 10:12:10', '2026-05-24 10:12:10');
INSERT INTO `permissions` VALUES (9, 'Permissions', 'view-permissions', 'web', 2, 'View Permissions', NULL, 1, NULL, NULL, '2026-05-24 10:12:10', '2026-05-24 10:12:10');
INSERT INTO `permissions` VALUES (10, 'Permissions', 'create-permissions', 'web', 2, 'Create Permissions', NULL, 1, NULL, NULL, '2026-05-24 10:12:10', '2026-05-24 10:12:10');
INSERT INTO `permissions` VALUES (11, 'Permissions', 'edit-permissions', 'web', 2, 'Edit Permissions', NULL, 1, NULL, NULL, '2026-05-24 10:12:10', '2026-05-24 10:12:10');
INSERT INTO `permissions` VALUES (12, 'Permissions', 'delete-permissions', 'web', 2, 'Delete Permissions', NULL, 1, NULL, NULL, '2026-05-24 10:12:10', '2026-05-24 10:12:10');
INSERT INTO `permissions` VALUES (13, 'Groups', 'view-permission-groups', 'web', 2, 'View Permission Groups', NULL, 1, NULL, NULL, '2026-05-24 10:12:10', '2026-05-24 10:12:10');
INSERT INTO `permissions` VALUES (14, 'Groups', 'create-permission-groups', 'web', 2, 'Create Permission Groups', NULL, 1, NULL, NULL, '2026-05-24 10:12:10', '2026-05-24 10:12:10');
INSERT INTO `permissions` VALUES (15, 'Groups', 'edit-permission-groups', 'web', 2, 'Edit Permission Groups', NULL, 1, NULL, NULL, '2026-05-24 10:12:10', '2026-05-24 10:12:10');
INSERT INTO `permissions` VALUES (16, 'Groups', 'delete-permission-groups', 'web', 2, 'Delete Permission Groups', NULL, 1, NULL, NULL, '2026-05-24 10:12:10', '2026-05-24 10:12:10');
INSERT INTO `permissions` VALUES (17, 'Users', 'view-users', 'web', 3, 'View Users', NULL, 1, NULL, NULL, '2026-05-24 10:12:10', '2026-05-24 10:12:10');
INSERT INTO `permissions` VALUES (18, 'Users', 'create-users', 'web', 3, 'Create Users', NULL, 1, NULL, NULL, '2026-05-24 10:12:10', '2026-05-24 10:12:10');
INSERT INTO `permissions` VALUES (19, 'Users', 'edit-users', 'web', 3, 'Edit Users', NULL, 1, NULL, NULL, '2026-05-24 10:12:10', '2026-05-24 10:12:10');
INSERT INTO `permissions` VALUES (20, 'Users', 'delete-users', 'web', 3, 'Delete Users', NULL, 1, NULL, NULL, '2026-05-24 10:12:10', '2026-05-24 10:12:10');
INSERT INTO `permissions` VALUES (21, 'Logs', 'view-activity-logs', 'web', 4, 'View Activity Logs', NULL, 1, NULL, NULL, '2026-05-24 10:12:10', '2026-05-24 10:12:10');
INSERT INTO `permissions` VALUES (22, 'Logs', 'delete-activity-logs', 'web', 4, 'Delete Activity Logs', NULL, 1, NULL, NULL, '2026-05-24 10:12:10', '2026-05-24 10:12:10');
INSERT INTO `permissions` VALUES (23, 'Settings', 'view-settings', 'web', 5, 'View Settings', NULL, 1, NULL, NULL, '2026-05-24 10:12:10', '2026-05-24 10:12:10');
INSERT INTO `permissions` VALUES (24, 'Settings', 'update-settings', 'web', 5, 'Update Settings', NULL, 1, NULL, NULL, '2026-05-24 10:12:10', '2026-05-24 10:12:10');

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `role_has_permissions_role_id_foreign`(`role_id` ASC) USING BTREE,
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
INSERT INTO `role_has_permissions` VALUES (1, 1);
INSERT INTO `role_has_permissions` VALUES (2, 1);
INSERT INTO `role_has_permissions` VALUES (3, 1);
INSERT INTO `role_has_permissions` VALUES (4, 1);
INSERT INTO `role_has_permissions` VALUES (5, 1);
INSERT INTO `role_has_permissions` VALUES (6, 1);
INSERT INTO `role_has_permissions` VALUES (7, 1);
INSERT INTO `role_has_permissions` VALUES (8, 1);
INSERT INTO `role_has_permissions` VALUES (9, 1);
INSERT INTO `role_has_permissions` VALUES (10, 1);
INSERT INTO `role_has_permissions` VALUES (11, 1);
INSERT INTO `role_has_permissions` VALUES (12, 1);
INSERT INTO `role_has_permissions` VALUES (13, 1);
INSERT INTO `role_has_permissions` VALUES (14, 1);
INSERT INTO `role_has_permissions` VALUES (15, 1);
INSERT INTO `role_has_permissions` VALUES (16, 1);
INSERT INTO `role_has_permissions` VALUES (17, 1);
INSERT INTO `role_has_permissions` VALUES (18, 1);
INSERT INTO `role_has_permissions` VALUES (19, 1);
INSERT INTO `role_has_permissions` VALUES (20, 1);
INSERT INTO `role_has_permissions` VALUES (21, 1);
INSERT INTO `role_has_permissions` VALUES (22, 1);
INSERT INTO `role_has_permissions` VALUES (23, 1);
INSERT INTO `role_has_permissions` VALUES (24, 1);
INSERT INTO `role_has_permissions` VALUES (1, 2);
INSERT INTO `role_has_permissions` VALUES (2, 2);
INSERT INTO `role_has_permissions` VALUES (3, 2);
INSERT INTO `role_has_permissions` VALUES (5, 2);
INSERT INTO `role_has_permissions` VALUES (9, 2);
INSERT INTO `role_has_permissions` VALUES (13, 2);
INSERT INTO `role_has_permissions` VALUES (17, 2);
INSERT INTO `role_has_permissions` VALUES (18, 2);
INSERT INTO `role_has_permissions` VALUES (19, 2);
INSERT INTO `role_has_permissions` VALUES (21, 2);
INSERT INTO `role_has_permissions` VALUES (23, 2);
INSERT INTO `role_has_permissions` VALUES (1, 3);
INSERT INTO `role_has_permissions` VALUES (5, 3);
INSERT INTO `role_has_permissions` VALUES (17, 3);
INSERT INTO `role_has_permissions` VALUES (19, 3);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `is_active` tinyint(1) NULL DEFAULT 1,
  `created_by` int NULL DEFAULT NULL,
  `updated_by` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_name_guard_name_unique`(`name` ASC, `guard_name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'Super Admin', 'web', 'Super Administrator', NULL, 1, NULL, NULL, '2026-05-24 10:12:10', '2026-05-24 10:12:10');
INSERT INTO `roles` VALUES (2, 'Admin', 'web', 'Administrator', NULL, 1, NULL, NULL, '2026-05-24 10:12:10', '2026-05-24 10:12:10');
INSERT INTO `roles` VALUES (3, 'Manager', 'web', 'Manager', NULL, 1, NULL, NULL, '2026-05-24 10:12:10', '2026-05-24 10:12:10');

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions`  (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NULL DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sessions_user_id_index`(`user_id` ASC) USING BTREE,
  INDEX `sessions_last_activity_index`(`last_activity` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sessions
-- ----------------------------
INSERT INTO `sessions` VALUES ('JgN5IFcKuOXCTiH3UjRAJ8D0cgfuRNRmlFJucvvQ', NULL, NULL, '', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOUZvVE5Kb0xwTUMwYXhNcTFEUzdqa1FTNFpLSEowcVpRa1VMM3RVciI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToyOntzOjM6InVybCI7czo4OiJodHRwOi8vOiI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1779618762);
INSERT INTO `sessions` VALUES ('VlErXX7MYGOmnaZWQslS3P7x53QGsBrnQ9exIQDf', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoicndDUHRpeHNyWGpOY2V3ejdlWXo2eWNaVXhBU0VWYXNud0I3U3l5aSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjM3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vZGFzaGJvYXJkIjtzOjU6InJvdXRlIjtzOjE1OiJhZG1pbi5kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjE4OiJmbGFzaGVyOjplbnZlbG9wZXMiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1779618363);

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'general',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `settings_key_unique`(`key` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES (1, 'site_name', 'Site Name', 'Site Name', 'general', '2026-05-24 10:12:10', '2026-05-24 10:12:10');
INSERT INTO `settings` VALUES (2, 'site_logo', 'Site Logo', '', 'general', '2026-05-24 10:12:10', '2026-05-24 10:12:10');
INSERT INTO `settings` VALUES (3, 'sidebar_logo', 'Sidebar Logo', '', 'general', '2026-05-24 10:12:10', '2026-05-24 10:12:10');
INSERT INTO `settings` VALUES (4, 'admin_sidebar_logo', 'Admin Sidebar Logo', '', 'general', '2026-05-24 10:12:10', '2026-05-24 10:12:10');
INSERT INTO `settings` VALUES (5, 'admin_sidebar_title', 'Admin Sidebar Title', 'Site Name', 'general', '2026-05-24 10:12:10', '2026-05-24 10:12:10');
INSERT INTO `settings` VALUES (6, 'contact_email', 'Contact Email', 'info@nafiur.com', 'general', '2026-05-24 10:12:10', '2026-05-24 10:12:10');
INSERT INTO `settings` VALUES (7, 'contact_phone', 'Contact Phone', '+880123456789', 'general', '2026-05-24 10:12:10', '2026-05-24 10:12:10');
INSERT INTO `settings` VALUES (8, 'user_login_enabled', 'Allow User Login', '1', 'security', '2026-05-24 10:12:10', '2026-05-24 10:12:10');
INSERT INTO `settings` VALUES (9, 'user_registration_enabled', 'Allow User Registration', '0', 'security', '2026-05-24 10:12:10', '2026-05-24 10:12:10');
INSERT INTO `settings` VALUES (10, 'otp_enabled', 'Require OTP for User Login', '0', 'security', '2026-05-24 10:12:10', '2026-05-24 10:12:10');
INSERT INTO `settings` VALUES (11, 'user_email_otp_enabled', 'Enable Email OTP for User Login', '0', 'security', '2026-05-24 10:12:10', '2026-05-24 10:12:10');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `otp_verified` tinyint(1) NOT NULL DEFAULT 0,
  `ban_reason` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `last_password_change_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE,
  UNIQUE INDEX `users_phone_unique`(`phone` ASC) USING BTREE,
  UNIQUE INDEX `users_username_unique`(`username` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Super Admin', 'superadmin', 'nafiur@outlook.com', NULL, 'admin', 'active', 1, NULL, '2026-05-24 10:12:10', '$2y$12$dIe11FSfWYlovb4CaNNHK.eI018GyblFHTLkxl9X2MQvg5e0Wm25G', NULL, NULL, '2026-05-24 10:12:16', NULL, '2026-05-24 10:12:10', '2026-05-24 10:12:16');
INSERT INTO `users` VALUES (2, 'Admin User', 'adminuser', 'admin@nafiur.com', NULL, 'admin', 'active', 1, NULL, '2026-05-24 10:12:10', '$2y$12$ftBj/n6upDjgfM13AsJeh.AvciIcYu8i7AxDKuH.JY1XVyCWvkbBm', NULL, NULL, NULL, NULL, '2026-05-24 10:12:11', '2026-05-24 10:12:11');

SET FOREIGN_KEY_CHECKS = 1;
