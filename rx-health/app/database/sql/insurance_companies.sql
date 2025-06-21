/*
 Navicat Premium Data Transfer

 Source Server         : local_sql
 Source Server Type    : MySQL
 Source Server Version : 80200 (8.2.0)
 Source Host           : localhost:3306
 Source Schema         : emr-admin

 Target Server Type    : MySQL
 Target Server Version : 80200 (8.2.0)
 File Encoding         : 65001

 Date: 12/04/2024 23:35:31
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for insurance_companies
-- ----------------------------
-- DROP TABLE IF EXISTS `insurance_companies`;
-- CREATE TABLE `insurance_companies`  (
--   `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
--   `code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
--   `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
--   `tel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
--   `email` varchar(72) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
--   `address` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
--   `type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
--   `status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
--   `company_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
--   `validation_required` tinyint(1) NOT NULL DEFAULT 0,
--   `api_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
--   `otp_required` tinyint(1) NOT NULL DEFAULT 0,
--   `sms_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
--   `api_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
--   `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
--   `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL,
--   PRIMARY KEY (`id`) USING BTREE,
--   UNIQUE INDEX `insurance_companies_code_unique`(`code` ASC) USING BTREE,
--   UNIQUE INDEX `insurance_companies_email_unique`(`email` ASC) USING BTREE
-- ) ENGINE = InnoDB AUTO_INCREMENT = 449 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of insurance_companies
-- ----------------------------
INSERT INTO `insurance_companies` VALUES (1, 'AD0R5WO', 'WORLDWIDE TECHNICAL SERVICE', '09060551401', 'falegbe.michael@wtsenergy.com', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (2, 'AD01SBA', 'BASTION HMO', '08002278466', 'wecare@bastionhmo.com', NULL, 'INSURANCE', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (3, 'AD01CWE', 'WELLNESS HMO', '', NULL, NULL, 'INSURANCE', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (4, 'AD019LE', 'LEADWAY HMO', '08109524850', 'providermanagement@leadway.com , g-diya@leadway.com', NULL, 'INSURANCE', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (5, 'AD05JAS', 'ASSUR HMO', '', NULL, NULL, '', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (6, 'AD0GMLE', 'AXA MANSARD', '012773490, 08092529125', 'healthcare@axamansard.com', NULL, 'INSURANCE', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (7, 'AD0RXPA', 'PARKLANDE HOSPITAL', '07062838839', 'nollybrown4eva67@gmail.com', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (8, 'AD0W4NO', 'NOVO HEALTH', '014601990', 'Gracee@novohealthafrica.org', NULL, 'INSURANCE', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (9, 'AD0PVAT', 'ATIAT LIMITED', '08029110980', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (10, 'AD0RDRE', 'RELIANCE HMO', '017001580', 'hello@reliancehmo.com', NULL, 'INSURANCE', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (11, 'AD02CHE', 'HEALTH KINECT CLINIC', '', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (12, 'AD0M1AL', 'ALPINE INTEGRATED HEALTHCARE LTD', '08098229484', 'naijadoctors@gmail,com', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (13, 'AD0K5SO', 'SONIC LAB', '', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (14, 'AD0PHFA', 'FAITH CITY HOSPITAL', '08160486253', 'info@faithcityhospital.com', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (15, 'AD0K4IV', 'IVES SPECIALIST HOSPITAL', '07039032488', 'zuwareme@yahoo.co.uk', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (16, 'AD0UFFI', 'FIRST CARDIOLOGY CONSULTANT', '08035250205', 'labscientist@firstcardiology.org', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (17, 'AD0JKOB', 'OBALENDE PRIMARY HEALTH CARE', '08033664629', 'sodekedare@gmail.com', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (18, 'AD07PT ', 'T & S MEDICALS ( DR OWOYEMI HABEEB )', '08114444591', 'Chiedunwankwo@outlook.com', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (19, 'AD0P2BE', 'BEN K HOSPITAL', '+234 803 056 8965', ' tbankole18@gmail.com', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (20, 'AD0NNRe', 'Remi Tinubu Primary Health Care', '08067319156', 'Habeebamoo379@gmail.com', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (21, 'AD0S5Ai', 'Aire Dental Clinic', '0814868011', 'info@airedentalclinic.com', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (22, 'AD0Q5GE', 'GENERAL HOSPITAL, LAGOS ISLAND', '07039761934    DR. BISI', 'bisi@generalhospital.com', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (23, 'AD0P4MO', 'MOUTH SPA DENTAL CLINIC', '08094560813, 09071422040', 'themouthspa@gmail.com', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (24, 'AD0NDAl', 'Alphaline. Dr Chidi', '8098229484', 'Dr.Chidi@alpinehealthng', NULL, '', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (25, 'AD02VMa', 'Mari Gold Hospital. Amaka', '9051182174', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (26, 'AD0YNFa', 'Family & Friends Hospital. Dr Abisola ', '9060324190', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (27, 'AD0A7So', 'Southwest Medicals. Mr Aris', '8038065346', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (28, 'AD0L8LU', 'LUTH', '8136731968', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (29, 'AD0QBBe', 'Ben K Hospital Gbagada.  Dr Tosin Bankole', '8030568965', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (30, 'AD02BSu', 'Surgical Associates Clinic', '8033866078', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (31, 'AD06RAB', 'AB Specialist.  Dr Sarah', '8021192923', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (32, 'AD0QLEk', 'Eko Hospital.  Nurse Okoye', '8168022650', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (33, 'AD0G5Ne', 'Newday Specialist', '8076490132', 'newdayspecialistclinic@yahoo.com', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (34, 'AD0D9Mo', 'Mount Sinai. Miss Assumpta', '8161718809', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (35, 'AD0T5Fo', 'Foremost Radiology ', '7064543394', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (36, 'AD08ZGo', 'Good Tidings .  Dr Akunnu', '8033153110', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (37, 'AD0Y4Ge', 'General Hospital Isolo', '8028278494', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (38, 'AD0A8Li', 'Lifeline Children Hospital.  Management', '', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (39, 'AD0Y4In', 'Inemesit Hospital & Maternity Limited', '8135214925', 'inemesithml@gmail.com', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (40, 'AD06YMa', 'Marie Stopes Hospital &laboratory', '9031664786', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (41, 'AD0UJSe', 'Serenity Hospital', '8035612330', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (42, 'AD0JRGe', 'General Hospital Gbagada.  Dr Idibia', '8056132527', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (43, 'AD037R-', 'R-Jolad Plus. Dr Ogbe Emmanuel', '8063220056', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (44, 'AD0S3BT', 'BT Health & Diagnostics Centre', '8146129643', 'info@bthdc.com.ng', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (45, 'AD06XAf', 'Afrimed.  Mr Tope', '8092596770', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (46, 'AD0G6Li', 'Life Fort Children Hospital. Dr Titi Adesanmi', '8037175616', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (47, 'AD02UMa', '', '', NULL, NULL, '', 'Inactive', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (48, 'AD0UJTo', 'Tolajide Health Centre. Dr Tola', '8023205458', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (49, 'AD0A2Ma', 'Marie Stopes Hospital &laboratory', '9031664786', 'mariestopeslaboratorylagos@gmail.com', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (50, 'AD0H4Se', 'Serenity Hospital', '8035612330', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (51, 'AD0ZKSu', 'Surgical ward Hospital', '8187770455', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (52, 'AD0X2So', 'Sonic Diagnostics', '8135016174', 'emekaokoro@sonicmedlab.com', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (53, 'AD0NQOp', 'Optimal Hospital', '9070088877', 'optimalspe3@yahoo.com', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (54, 'AD0HLAm', 'Amazing Grace', '8186272417', 'amazingheartcentre.ahc@gmail.com', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (55, 'AD0SHBM', 'BM Empire Multispecialist Hospital', '8104998025', 'mayoempirehospital@gmail.com', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (56, 'AD0PLHa', 'Havana Specialist Hospital', '8063883274', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (57, 'AD0WLKi', 'Kingtrust Medical Hospital', '8103538644', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (58, 'AD0VDKi', 'Kingtrust Medical Hospital', '8103538644', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (59, 'AD0KCAV', 'AVON HEALTHCARE', '09029421053', 'oludare.bolarinwa@avonhealth.com', NULL, 'INSURANCE', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (60, 'AD0R6HY', 'HYGEIA HMO', '070 62385125', 'ojesuje@hygieahmo.com', NULL, 'INSURANCE', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (61, 'AD07XBL', 'BLUE SKY HOSPITAL', '09021695557', 'adelesiomowunmiesther@gmail.com', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (62, 'AD0AXAR', 'ARRIVE ALIVE ATAFF', '', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (63, 'AD0EJAR', 'ARRIVE ALIVE STAFF', '', 'info@arrivealiveltd.com', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (64, 'AD0V5SA', 'SAMSUNG ', '', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (65, 'AD05BVF', 'VFD', '', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (66, 'AD0PFKE', 'KENNEDIA HMO', '', NULL, NULL, 'INSURANCE', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (67, 'AD0A7RE', 'REDCARE HMO', '08179394311', 'latifat.oladoja@redcarehmo.com', NULL, 'INSURANCE', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (68, 'AD04PHE', 'HEALTH TRACKA', '08174225852', 'results@healthtracka.com', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (69, 'AD0ASRE', 'REDCARE HMO', '08179394311', ' Latifat.oladoja@redcarehmo.com', NULL, 'INSURANCE', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (70, 'AD0VUME', 'METRO', '', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (71, 'AD0DALA', 'LAGOS EXECUTIVE CARDIOVASCULAR CENTRE ( ENGR AGU GERALD )', ' 08034835143', 'agu.gerald@thelecc.com', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (72, 'AD04VKE', 'KELINA HOSPITAL ( ESTHER UDIE )', '  080 53516358', '   admin@lagos.kelinahospital.com', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (73, 'AD0TRSO', 'SOUTH SHORE WOMEN HOSPITAL,', '08050205960', 'folasade.adejolu@southshorewch.com', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (74, 'AD0PCHO', 'HONEYWELL', '08138047560', 'christiana.udensi@honeywellgroup.com', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (75, 'AD067PR', 'PROSPERIS HOLDING', '07025001632', 'bolanle.ekanim@prosperisholdings.com', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (76, 'AD0DBMI', 'MILITARY CANTONMENT MARYLAND', '08022789338', 'toyin19ng@gmail.com', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (77, 'AD0Z6ME', 'METRO HEALTH', '', NULL, NULL, 'INSURANCE', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (78, 'AD01MFA', 'FAMILY HEALTH CLINIC', '08039183801', 'ujunzekwe@fh.com', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (79, 'AD0BLZe', 'Zero Interest travels and tours', '07033621972', 'interestzero@yahoo.com', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (80, 'AD0NNte', 'test company4', '0545196272', 'apeaduebenezer101@yahoo.com', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (81, 'AD0AQOC', 'OCEANIC HEALTH HMO', '012806399', 'hmo@oceanichealthng.com', NULL, 'INSURANCE', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (82, 'AD0PDAv', 'Avon Medical Practice', '09087994655', 'hmo.office@avonmedical.com', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (83, 'AD06ADR', 'DR FEMI ADENUGA', '08074108297', ' femiadenuga@gmail.com ', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (84, 'AD0BWLE', 'LEKKI PORT LFTZ ENTERPRISE LIMITED', '08122386588', 'xulikui@foxmail.com', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (85, 'AD0KZFI', 'FIDELITY BANK ', '', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (86, 'AD05WCR', 'CROWN FLOUR MILL', '', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (87, 'AD0FTIN', 'INLAND CONTAINER NIG LTD ICNL', '', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (88, 'AD0DUEU', 'EUROMEGA', '08098259696', 'aadisbooking@gmail.com', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (89, 'AD0AHin', 'infravision', '08165639092, 09139339106', 'mabel@infravision.com.ng', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (90, 'AD0J8LA', 'LAGOS BUSINESS SCHOOL', '', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (91, 'AD0U5LA', 'LAGOS BUSINESS SCHOOL', '', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (92, 'AD0BLRE', 'RECORE ', '08094209213', 'patriciaokerenta\"yahoo.com', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (93, 'AD03XPR', 'PRISMS HEALTHCARE', '08087321676', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (94, 'AD0PDSM', 'SMAT HEALTH HMO', '09091094727, 09091/96730', 'Info@smathealth.com', NULL, 'INSURANCE', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (95, 'AD0ERDO', 'DOT HMO', '', NULL, NULL, 'INSURANCE', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (96, 'AD0LSTR', 'TRACTION APP LTD', '', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (97, 'AD0R4TR', 'TRACTION APPS', '', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (98, 'AD03YMP', 'MPI AFRICA', '+2348061237192', 'f.nwaiwu@mpiafrica.com', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (99, 'AD0VUBL', 'BLUE SKY HOSPITAL', '07037817389', 'ridwanope15@yahoo.com', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (100, 'AD0URCK', 'CK LINE HMO', '', NULL, NULL, 'INSURANCE', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (101, 'AD0VGNI', 'NIGERIAN WOMEN FOOTBALL ASSOCIATION', '08092963689', 'CUSTOMERCARE@ARRIVEALIVELTD.COM', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (102, 'AD0DZNI', 'NIGERIA FOOTBALLERS ASSOCIATION', '', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (103, 'AD0Z9ME', 'MENOPAUSAL COMMUNITY', '', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (104, 'AD0WJBR', 'BROAD PLACES', '', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (105, 'AD08SFE', 'FEDERAL MEDICAL CENTRE EBUTTE META', '', 'adeyemistephen2000@gmail.com', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (106, 'AD0HRCL', 'CLOUD CLINIC LIMITED', '09165709909', 'hello@cloudclinic.ng', NULL, '', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (107, 'AD03ECL', 'CLEARLINE HMO', '', NULL, NULL, 'INSURANCE', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (108, 'AD0DCNO', 'NOOR TAKAFUL INSURANCE LTD.', '09087191445', 'adedoyin.agunbiade@noortakaful.ng', NULL, 'INSURANCE', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (109, 'AD0FGYE', 'YEMANJA ', '08165414640', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (110, 'AD0L1OR', 'ORILE AGEGE GENERAL HOSPITAL', '09093813798', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (111, 'AD05CPA', 'PATHWAY ADVISORS LIMITED', '', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (112, 'AD0MUMA', 'May Clinics', '08023426679', 'info@mayclinicsltd.com', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (113, 'AD0B7AR', 'ARUBAH FAMILY MEDICAL CENTER', '08033927737', NULL, NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');
INSERT INTO `insurance_companies` VALUES (114, 'AD02FST', 'ST.PAUL EYE CLINIC', '08064250152', 'INFO@STPAULEYECLINIC.COM.NG', NULL, 'COMPANY', 'Active', '6383', 0, NULL, 0, NULL, NULL, NULL, NULL, '2024-04-10 11:54:47', '2024-04-10 11:54:47');

SET FOREIGN_KEY_CHECKS = 1;
