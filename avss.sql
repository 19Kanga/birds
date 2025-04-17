-- MySQL dump 10.13  Distrib 9.0.1, for macos13.7 (x86_64)
--
-- Host: localhost    Database: avss
-- ------------------------------------------------------
-- Server version	9.0.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `_prisma_migrations`
--

DROP TABLE IF EXISTS `_prisma_migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `_prisma_migrations` (
  `id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checksum` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `finished_at` datetime(3) DEFAULT NULL,
  `migration_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logs` text COLLATE utf8mb4_unicode_ci,
  `rolled_back_at` datetime(3) DEFAULT NULL,
  `started_at` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  `applied_steps_count` int unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_prisma_migrations`
--

LOCK TABLES `_prisma_migrations` WRITE;
/*!40000 ALTER TABLE `_prisma_migrations` DISABLE KEYS */;
INSERT INTO `_prisma_migrations` VALUES ('0642f6a8-7396-4486-b05f-e5db6db649eb','3dcffbf2d07d8b4896c986850ea50ee1d56de28bed530e4395534fe0b6b214f6','2025-04-12 13:34:59.575','20250412133450_update_table',NULL,NULL,'2025-04-12 13:34:59.542',1),('0af59e0c-e696-4599-aefe-ca94034d7e44','149573c91b5126df822fe3b9e18179731cfdcc3aef6aa6a20877c49e32695191','2025-04-10 11:58:16.106','20250410115815_init',NULL,NULL,'2025-04-10 11:58:15.877',1),('7eeb2777-2329-44eb-bb27-4299d70e516e','f8d94c78bc29a2dd7bbb421462ab8ab17477c1e0495af4d17e4fe59bed9825ad','2025-04-10 12:14:58.670','20250410121347_update_champs_email',NULL,NULL,'2025-04-10 12:14:58.646',1),('b5c6fa31-3ce0-49b2-9e88-734831d5b931','f733a2ea70724df81b2846ec76097f08d967bb3a893ae29ef2eb41e17c536b59','2025-04-10 11:48:14.063','20250410114813_init',NULL,NULL,'2025-04-10 11:48:13.983',1),('d02b0a96-4f80-4796-ac0c-204ce9d3a41a','0075663df080cba6ba860c3a5318cdfd2d2aaea449179a012382bcb9befe36f0','2025-04-10 12:03:25.811','20250410120325_init',NULL,NULL,'2025-04-10 12:03:25.782',1),('d831b708-e73f-4c38-86c3-17571c03adb1','d90c42bb8dd4cad8cf5962f8168395726f6a96b7834d9d5ee40b971e77146e70','2025-04-11 23:10:28.290','20250411231016_new_bd',NULL,NULL,'2025-04-11 23:10:28.100',1);
/*!40000 ALTER TABLE `_prisma_migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cages`
--

DROP TABLE IF EXISTS `cages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cages` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int NOT NULL,
  `emplacement` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('available','maintenance','unavailable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available',
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cages_id_key` (`id`),
  UNIQUE KEY `cages_name_key` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cages`
--

LOCK TABLES `cages` WRITE;
/*!40000 ALTER TABLE `cages` DISABLE KEYS */;
/*!40000 ALTER TABLE `cages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission`
--

DROP TABLE IF EXISTS `permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permission` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permission_name_key` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission`
--

LOCK TABLES `permission` WRITE;
/*!40000 ALTER TABLE `permission` DISABLE KEYS */;
INSERT INTO `permission` VALUES (5,'manage_birds'),(8,'manage_breeding'),(10,'manage_purchases'),(4,'manage_roles'),(9,'manage_sales'),(11,'manage_settings'),(7,'manage_species'),(14,'manage_users'),(1,'view_manage'),(12,'view_reports'),(3,'view_users');
/*!40000 ALTER TABLE `permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `role_name_key` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (3,'admin'),(4,'user');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rolehaspermission`
--

DROP TABLE IF EXISTS `rolehaspermission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rolehaspermission` (
  `id` int NOT NULL AUTO_INCREMENT,
  `roleId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissionId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rolehaspermission_roleId_fkey` (`roleId`),
  KEY `rolehaspermission_permissionId_fkey` (`permissionId`),
  CONSTRAINT `rolehaspermission_permissionId_fkey` FOREIGN KEY (`permissionId`) REFERENCES `permission` (`name`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `rolehaspermission_roleId_fkey` FOREIGN KEY (`roleId`) REFERENCES `role` (`name`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rolehaspermission`
--

LOCK TABLES `rolehaspermission` WRITE;
/*!40000 ALTER TABLE `rolehaspermission` DISABLE KEYS */;
INSERT INTO `rolehaspermission` VALUES (1,'admin','view_manage'),(2,'admin','view_users'),(3,'user','view_users'),(4,'admin','manage_users'),(5,'admin','manage_birds'),(8,'user','manage_birds'),(9,'user','manage_breeding'),(12,'user','manage_sales'),(17,'user','manage_roles'),(21,'admin','manage_settings'),(22,'admin','manage_species'),(23,'admin','manage_birds'),(24,'admin','view_reports'),(25,'admin','manage_roles'),(26,'admin','manage_purchases'),(27,'admin','manage_breeding'),(28,'admin','manage_sales');
/*!40000 ALTER TABLE `rolehaspermission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int NOT NULL,
  `timezone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `species`
--

DROP TABLE IF EXISTS `species`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `species` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scientifiquename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` enum('small','medium','large') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'small',
  `lifespan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `species_id_key` (`id`),
  UNIQUE KEY `species_name_key` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `species`
--

LOCK TABLES `species` WRITE;
/*!40000 ALTER TABLE `species` DISABLE KEYS */;
/*!40000 ALTER TABLE `species` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roleId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `createdAt` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  `updatedAt` datetime(3) DEFAULT CURRENT_TIMESTAMP(3),
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_id_key` (`id`),
  UNIQUE KEY `users_email_key` (`email`),
  KEY `users_roleId_fkey` (`roleId`),
  CONSTRAINT `users_roleId_fkey` FOREIGN KEY (`roleId`) REFERENCES `role` (`name`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('67fdfd323e43c',NULL,'leoo','p@gmail.com','$2y$10$ZYvNB4j8gRD8hLKmcnv01uoUx0fiXecTUSZ3GD7p8ao4g8CULInZ.','admin','active','2025-04-15 07:31:14.446','2025-04-15 07:31:14.446'),('67fea4958392e',NULL,'fotso lionel','test@gmail.com','$2y$10$TzOmltM.ycapqHqwwWeYbeLtfTvn4mDYbEB04Yq.iDhNtjs8rQ2dq','user','active','2025-04-15 19:25:25.601','2025-04-15 19:25:25.601'),('68015a8b83bbd',NULL,'loser','loser@gmail.com','$2y$10$2FA6QdkzmedoJ7oSLHdH6un0aaq8h9Pt6BpRozsMCree5oyMkewTy','user','active','2025-04-17 20:46:19.692','2025-04-17 20:46:19.692'),('68015c9fabe2a',NULL,'lose','lose@gmail.com','$2y$10$x8il8thbMzbaxwnaFBlKTeL9Ux.ZZJwCP7hlz3MjpDHI3RHojAI.u','user','active','2025-04-17 20:55:11.841','2025-04-17 20:55:11.841');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-18  0:15:39
