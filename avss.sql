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
INSERT INTO `_prisma_migrations` VALUES ('037325bd-fd64-46fa-8c83-e46fb34db5ec','3545a35ba2553e098a49ece4f667243d228add11134a471f3f9aa34abb949d2f','2025-05-11 23:28:32.511','20250511232821_add_uuid_for_all_table',NULL,NULL,'2025-05-11 23:28:32.295',1),('075c6716-ef2e-4603-b47c-15b63f2a49f6','f733a2ea70724df81b2846ec76097f08d967bb3a893ae29ef2eb41e17c536b59','2025-05-03 01:23:15.288','20250410114813_init',NULL,NULL,'2025-05-03 01:23:15.271',1),('1bfccc9c-2146-4bdd-94bb-2a46b698294f','0075663df080cba6ba860c3a5318cdfd2d2aaea449179a012382bcb9befe36f0','2025-05-03 01:23:15.369','20250410120325_init',NULL,NULL,'2025-05-03 01:23:15.349',1),('1de942b6-6423-41e0-a13a-60bbe021c5a7','3ee49cda5b01334c2a788964ba9e1b4483f806c535cb5b0047801d9f41f3a436','2025-05-12 00:26:54.750','20250512002647_add_date_in_cage',NULL,NULL,'2025-05-12 00:26:54.708',1),('2839d0e1-c752-4246-a4e5-8234b546ac70','32d137d89dea115acc10d48dd0e11603587d276a9f048f595d1b56bef39d5572','2025-06-01 02:22:31.812','20250601022214_update_and_add_species',NULL,NULL,'2025-06-01 02:22:31.348',1),('375c6a34-c851-469e-b5aa-6f5afe658f63','019a0112862a5cb529749259df84888ac55213d8a1f1511f7a8be9d816b4e722','2025-05-03 01:23:15.873','20250503005207_update_type_role_id',NULL,NULL,'2025-05-03 01:23:15.595',1),('39a919ef-37f0-4d33-beb8-56653dd05ecd','9094393f2978c547510545e94bdf0ad93db94f2b30d581b12cce258f819ad570','2025-05-30 05:51:45.726','20250530055132_delete_uu_id',NULL,NULL,'2025-05-30 05:51:45.705',1),('3f01a7db-e835-4356-bcf0-0e37d18eac30','8c7c4576d4e1cb6ae7a946261d331986efa92f500900bb18c021fa3c304247d9','2025-05-30 01:59:02.250','20250530015850_update_schedule_feed',NULL,NULL,'2025-05-30 01:59:02.220',1),('44535734-7213-406d-bf65-387b1233e9ae','a70b961b4f0082d2bdb71706b8fdde963ac31ec559a3a0d0ad7084f87348a83a','2025-05-23 09:31:00.700','20250523093044_full_table_ams',NULL,NULL,'2025-05-23 09:30:59.817',1),('482b1747-673e-4e44-bee0-2eb1ed5aa0b0','1b476595f232822744a70c9c4748c77f1e9c16464f6fba19fc68e2bfa2197d64','2025-05-30 01:38:50.166','20250530013834_update_feed_logs',NULL,NULL,'2025-05-30 01:38:50.110',1),('4efe5e06-f7e5-4453-a222-abf348b92bb3','251f8f88ebe428498c7692ff9240a51ab6c494fdae7f124f36f71419374026be','2025-05-12 00:48:54.749','20250512004847_update_type_cage',NULL,NULL,'2025-05-12 00:48:54.626',1),('5b5fde2b-dcc3-4765-a882-3bd63077041c','7a30137217ce357579531f4e60ff8d486c91d6b14aad7aa7dcff064220404978','2025-05-24 01:15:35.623','20250524011521_update_type_species',NULL,NULL,'2025-05-24 01:15:35.576',1),('61d58da4-1531-478b-9769-1ba2bd551ce8','71a162c5d63f94c1831b2a2c9671841f5bfd507f1c3afef87c23828c31140bc8','2025-05-12 01:04:00.930','20250512010353_update_cage_id_and_subspecies_id',NULL,NULL,'2025-05-12 01:04:00.862',1),('64d3fac8-2db7-4a08-9c13-43d0e0d3da0f','4aff1a6645f31eb0ddceac6e48929976e06fb29fffce151fb4ce4cd8086a16e1','2025-05-29 18:06:08.837','20250529180548_daven',NULL,NULL,'2025-05-29 18:06:08.751',1),('65f07d74-94fa-480c-aea2-fc0c133ab625','cc749029d12f5452b71d0b6bef21c95f455930ac9f6297b61f4cad7e0e196664','2025-05-12 00:46:35.056','20250512004626_update_cage_column',NULL,NULL,'2025-05-12 00:46:35.024',1),('6d271278-f23a-44f4-90dc-8cd33fde63a3','26bba1759d7e3d4295ff102f52cf9c055e42485d134e1482ab6a4f67f72307a9','2025-05-29 10:37:04.403','20250529103625_upfd',NULL,NULL,'2025-05-29 10:37:04.275',1),('7a4517c4-ca7b-4b78-82c7-38e34bcd9236','13674492ad6fd8f78963d3c17370ea8b3c632f880ea09dfd05354c59b2d56baf','2025-05-26 13:16:58.683','20250526131630_up',NULL,NULL,'2025-05-26 13:16:57.724',1),('8743fe57-6ad0-4248-82f5-7515907632d2','edbdd1404e08f792abfa110c70185fe6ff63c89b2a922b92061341b8652461f0','2025-05-24 01:38:17.490','20250524012404_update_status',NULL,NULL,'2025-05-24 01:38:17.409',1),('8bda82b1-54c1-487b-8710-f762a3c3c686','122d743a0403e77ad7e0ed9447f5b8826f2fbdbc55612d936eff004dd13c2eec','2025-05-03 01:36:13.356','20250503013601_update_rolehas_permition',NULL,NULL,'2025-05-03 01:36:13.352',1),('90133d2f-db04-43e5-8e6f-94888f2dd3be','338ce062cf6bebf30af8b58bf7edfc43097a15c2276c311d4c165647020930ca','2025-05-30 01:39:47.043','20250530013935_log_feed_schedule',NULL,NULL,'2025-05-30 01:39:46.978',1),('94c99d87-f2aa-4e09-8248-6d16cc4762ac','0a5aac09be1473ae2d1d8e2dbb8a2f8735b3fa3f4d1edaa7b84fab7868bc4dd2','2025-05-26 11:01:58.603','20250526110139_updated_cagetype_on_table_cage',NULL,NULL,'2025-05-26 11:01:58.549',1),('9671408f-caa3-4993-85c4-b458c6b6dd1d','149573c91b5126df822fe3b9e18179731cfdcc3aef6aa6a20877c49e32695191','2025-05-03 01:23:15.347','20250410115815_init',NULL,NULL,'2025-05-03 01:23:15.292',1),('a4fe34e7-d452-4bcc-beec-cb8c09656003','3dcffbf2d07d8b4896c986850ea50ee1d56de28bed530e4395534fe0b6b214f6','2025-05-03 01:23:15.594','20250412133450_update_table',NULL,NULL,'2025-05-03 01:23:15.559',1),('ab2956b8-9aeb-4c93-8be1-c36b2f273168','1c54f4a0f354a122061b09ae9968c67c3a88fa7fa76c13c1ec8d5f423e0960ff','2025-05-14 09:42:18.596','20250514094200_new_column_on_table_birds',NULL,NULL,'2025-05-14 09:42:18.518',1),('af5f364b-4d58-4a93-841b-d99d81a6da93','cc64eebf381af856ba90c49f455e290f0bc201b22171d5437d7eeb3f4e35cb3f','2025-05-30 02:11:33.280','20250530021116_restitute',NULL,NULL,'2025-05-30 02:11:33.237',1),('b080e1bb-fd1a-4134-a40a-a261f6e6a8ed','9047f4a4bed3b18d4b8af71281439c8ba2728f897132fa8d5faaa523a0825f87','2025-05-30 01:36:44.095','20250530013629_feed_update',NULL,NULL,'2025-05-30 01:36:44.026',1),('b0dfcb2a-2292-46a4-b8fc-a5189f8a6acf','95304611d1674d6d8485180074a7e6cd5cc76ebd2974e30d2c8fe5ad5462fcd7','2025-05-31 11:23:51.063','20250531112335_rest',NULL,NULL,'2025-05-31 11:23:50.971',1),('b9037303-d227-4ce0-9ab7-cff8136f1e8f','d90c42bb8dd4cad8cf5962f8168395726f6a96b7834d9d5ee40b971e77146e70','2025-05-03 01:23:15.557','20250411231016_new_bd',NULL,NULL,'2025-05-03 01:23:15.385',1),('b9ff5622-474a-4109-b978-a193c8972e2a','f0af32c715a485a79e1704fd3fbe88ea8ab293cffa5ce3bc4c6aa330e962b96b','2025-05-11 17:48:16.871','20250511174808_update_colonne_supliers_and_clients',NULL,NULL,'2025-05-11 17:48:16.820',1),('bbf32614-50e2-4c76-8250-5947368da8b8','585ef50a5d398875016789c7cd9a9132fd4463fb4613b992bf64eb2e05286c57','2025-05-11 16:37:30.314','20250511163716_add_uuid',NULL,NULL,'2025-05-11 16:37:29.930',1),('ca8bfbfb-88a6-476b-89b0-2ea914ec6d69','cd36764ba94fd8feec9dbad8383b6e1f5898c31f126e68e5ec9d0b5af93478c6','2025-05-12 01:28:31.413','20250512012824_update_bird_profile',NULL,NULL,'2025-05-12 01:28:31.370',1),('d6b2495a-525a-4648-b1b2-684784e8da32','122d743a0403e77ad7e0ed9447f5b8826f2fbdbc55612d936eff004dd13c2eec','2025-05-26 13:55:44.874','20250526135524_updated',NULL,NULL,'2025-05-26 13:55:44.851',1),('e26043fe-4f30-4466-82cd-8803d4135001','122d743a0403e77ad7e0ed9447f5b8826f2fbdbc55612d936eff004dd13c2eec','2025-05-29 10:39:04.994','20250529103850_update_category_feed',NULL,NULL,'2025-05-29 10:39:04.991',1),('e3530b5a-e918-4017-9edd-0868d25eb030','f580cc0c5bc401edfda2b726580f6ea2936bc15900e88759609adf098106641f','2025-05-24 15:47:39.201','20250524154722_add_champs_cages_on_table_cage',NULL,NULL,'2025-05-24 15:47:39.009',1),('ed1f19d7-ddf7-464a-94e9-226e334c90c6','584c02cb9ddde82a13b9ce5654eeaf3bf37df82f458d7db72f7705d4946fd0ba','2025-05-30 01:55:24.384','20250530015447_add_time_in_shedule',NULL,NULL,'2025-05-30 01:55:24.366',1),('f44ffcad-6a58-49af-ab1e-4e77b5428677','f8d94c78bc29a2dd7bbb421462ab8ab17477c1e0495af4d17e4fe59bed9825ad','2025-05-03 01:23:15.383','20250410121347_update_champs_email',NULL,NULL,'2025-05-03 01:23:15.371',1),('ffe1a135-e65b-4271-b8b4-8921e12c9f59','65a99ee8e7eda14944fce0bc1030b257a4090a0399ff9f12d36d8c189c4a9029','2025-05-03 01:23:15.944','20250503012017_update_type_of_permission',NULL,NULL,'2025-05-03 01:23:15.874',1);
/*!40000 ALTER TABLE `_prisma_migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Appointment`
--

DROP TABLE IF EXISTS `Appointment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Appointment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birdId` int NOT NULL,
  `veterinarianId` int DEFAULT NULL,
  `scheduledAt` datetime(3) NOT NULL,
  `purpose` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'SCHEDULED',
  `createdAt` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  `updatedAt` datetime(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Appointment_birdId_fkey` (`birdId`),
  KEY `Appointment_veterinarianId_fkey` (`veterinarianId`),
  CONSTRAINT `Appointment_birdId_fkey` FOREIGN KEY (`birdId`) REFERENCES `birds` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `Appointment_veterinarianId_fkey` FOREIGN KEY (`veterinarianId`) REFERENCES `Veterinarian` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Appointment`
--

LOCK TABLES `Appointment` WRITE;
/*!40000 ALTER TABLE `Appointment` DISABLE KEYS */;
/*!40000 ALTER TABLE `Appointment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `birdpricehistory`
--

DROP TABLE IF EXISTS `birdpricehistory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `birdpricehistory` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category` enum('old','breeding','gender') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'old',
  `minAge` int DEFAULT NULL,
  `maxAge` int DEFAULT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coefficient` double NOT NULL,
  `createdAt` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  `updatedAt` datetime(3) DEFAULT CURRENT_TIMESTAMP(3),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `birdpricehistory`
--

LOCK TABLES `birdpricehistory` WRITE;
/*!40000 ALTER TABLE `birdpricehistory` DISABLE KEYS */;
/*!40000 ALTER TABLE `birdpricehistory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `birds`
--

DROP TABLE IF EXISTS `birds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `birds` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `speciesId` int DEFAULT NULL,
  `subSpeciesId` int DEFAULT NULL,
  `cageId` int DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `old` datetime(3) NOT NULL,
  `createdAt` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  `updatedAt` datetime(3) DEFAULT CURRENT_TIMESTAMP(3),
  `status` enum('active','sick','breeding','deaths') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `type` enum('hatched','purchase','sold') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'hatched',
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `birds_uuid_key` (`uuid`),
  KEY `birds_speciesId_fkey` (`speciesId`),
  KEY `birds_subSpeciesId_fkey` (`subSpeciesId`),
  CONSTRAINT `birds_speciesId_fkey` FOREIGN KEY (`speciesId`) REFERENCES `species` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `birds_subSpeciesId_fkey` FOREIGN KEY (`subSpeciesId`) REFERENCES `subspecies` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `birds`
--

LOCK TABLES `birds` WRITE;
/*!40000 ALTER TABLE `birds` DISABLE KEYS */;
INSERT INTO `birds` VALUES (2,'Bird 1',2,1,1,'female','2025-02-15 00:00:00.000','2025-05-12 02:41:55.697','2025-05-26 23:33:23.000','active','hatched','B0002','test description','15kg'),(4,'Bird 3',2,1,0,'male','2025-02-04 00:00:00.000','2025-05-30 05:14:03.769','2025-05-31 14:47:47.000','deaths','hatched','B0004','bird 2 test','15');
/*!40000 ALTER TABLE `birds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `breeding`
--

DROP TABLE IF EXISTS `breeding`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `breeding` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maleid` int DEFAULT NULL,
  `femaleid` int DEFAULT NULL,
  `status` enum('active','complete','incube','failed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `notes` text COLLATE utf8mb4_unicode_ci,
  `startAt` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `breeding`
--

LOCK TABLES `breeding` WRITE;
/*!40000 ALTER TABLE `breeding` DISABLE KEYS */;
INSERT INTO `breeding` VALUES (3,'BR0003',4,2,'active','how are you','2025-05-30 05:26:36.388');
/*!40000 ALTER TABLE `breeding` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `breedingslogs`
--

DROP TABLE IF EXISTS `breedingslogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `breedingslogs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breedingId` int DEFAULT NULL,
  `type` enum('active','complete','incube','failed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `createdAt` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  `updatedAt` datetime(3) DEFAULT CURRENT_TIMESTAMP(3),
  PRIMARY KEY (`id`),
  KEY `breedingslogs_breedingId_fkey` (`breedingId`),
  CONSTRAINT `breedingslogs_breedingId_fkey` FOREIGN KEY (`breedingId`) REFERENCES `breeding` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `breedingslogs`
--

LOCK TABLES `breedingslogs` WRITE;
/*!40000 ALTER TABLE `breedingslogs` DISABLE KEYS */;
/*!40000 ALTER TABLE `breedingslogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cages`
--

DROP TABLE IF EXISTS `cages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int NOT NULL,
  `emplacement` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('available','maintenance','unavailable','occupied') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available',
  `notes` text COLLATE utf8mb4_unicode_ci,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdAt` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  `updatedAt` datetime(3) DEFAULT CURRENT_TIMESTAMP(3),
  `typeCage` enum('purchase','simple') COLLATE utf8mb4_unicode_ci DEFAULT 'simple',
  PRIMARY KEY (`id`),
  UNIQUE KEY `cages_name_key` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cages`
--

LOCK TABLES `cages` WRITE;
/*!40000 ALTER TABLE `cages` DISABLE KEYS */;
INSERT INTO `cages` VALUES (1,'Cage 1',4,'Section C','available','Cage en bon état, nettoyée récemment.','CG0001','2025-05-12 01:49:02.215','2025-05-13 15:45:02.000','simple'),(2,'Cage 2',3,'Section R','available','Cage en bon état, nettoyée récemment.','CG0002','2025-05-13 21:15:32.154','2025-06-01 04:19:44.000','simple');
/*!40000 ALTER TABLE `cages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clients` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adress` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdAt` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  `updatedAt` datetime(3) DEFAULT CURRENT_TIMESTAMP(3),
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'lionel','lionel@gmail.com','66666666','douale','2025-05-11 17:07:33.000','2025-05-11 18:24:44.000','SP0001'),(2,'Customer1','lionelfotso@gmail.com','68999999','Karachika','2025-05-12 16:26:19.000','2025-05-12 17:26:19.398','CUS0002');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `costspecieslogs`
--

DROP TABLE IF EXISTS `costspecieslogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `costspecieslogs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `speciesId` int DEFAULT NULL,
  `pu` double NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `createdAt` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  `updatedAt` datetime(3) DEFAULT CURRENT_TIMESTAMP(3),
  PRIMARY KEY (`id`),
  KEY `costspecieslogs_speciesId_fkey` (`speciesId`),
  CONSTRAINT `costspecieslogs_speciesId_fkey` FOREIGN KEY (`speciesId`) REFERENCES `species` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `costspecieslogs`
--

LOCK TABLES `costspecieslogs` WRITE;
/*!40000 ALTER TABLE `costspecieslogs` DISABLE KEYS */;
/*!40000 ALTER TABLE `costspecieslogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `damages`
--

DROP TABLE IF EXISTS `damages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `damages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cause` text COLLATE utf8mb4_unicode_ci,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `type` enum('birds','feeds','eggs','cages') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'birds',
  `thingsId` int DEFAULT NULL,
  `typeStatus` enum('deaths','badeggs','brokeneggs','expiredfood','destroyed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'deaths',
  `createdAt` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  `updatedAt` datetime(3) DEFAULT CURRENT_TIMESTAMP(3),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `damages`
--

LOCK TABLES `damages` WRITE;
/*!40000 ALTER TABLE `damages` DISABLE KEYS */;
INSERT INTO `damages` VALUES (1,'DG0001','desease','test anomalie','birds',4,'deaths','2025-05-31 15:29:23.654','2025-05-31 16:48:53.000');
/*!40000 ALTER TABLE `damages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Discount`
--

DROP TABLE IF EXISTS `Discount`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Discount` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` double DEFAULT NULL,
  `createdAt` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  PRIMARY KEY (`id`),
  UNIQUE KEY `Discount_uuid_key` (`uuid`),
  UNIQUE KEY `Discount_name_key` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Discount`
--

LOCK TABLES `Discount` WRITE;
/*!40000 ALTER TABLE `Discount` DISABLE KEYS */;
/*!40000 ALTER TABLE `Discount` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eggs`
--

DROP TABLE IF EXISTS `eggs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `eggs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breedingId` int DEFAULT NULL,
  `total` int DEFAULT NULL,
  `hatched` int DEFAULT NULL,
  `brokendeggs` int DEFAULT NULL,
  `badeggs` int DEFAULT NULL,
  `sales` int DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `eggs_breedingId_fkey` (`breedingId`),
  CONSTRAINT `eggs_breedingId_fkey` FOREIGN KEY (`breedingId`) REFERENCES `breeding` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eggs`
--

LOCK TABLES `eggs` WRITE;
/*!40000 ALTER TABLE `eggs` DISABLE KEYS */;
INSERT INTO `eggs` VALUES (1,'EG0001',3,4,2,0,0,0);
/*!40000 ALTER TABLE `eggs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eggslogs`
--

DROP TABLE IF EXISTS `eggslogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `eggslogs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `eggsId` int DEFAULT NULL,
  `qte` bigint DEFAULT '0',
  `type` enum('add','hatched','sales','brookengEgss','badEggs') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'add',
  `createdAt` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  `updatedAt` datetime(3) DEFAULT CURRENT_TIMESTAMP(3),
  PRIMARY KEY (`id`),
  KEY `eggslogs_eggsId_fkey` (`eggsId`),
  CONSTRAINT `eggslogs_eggsId_fkey` FOREIGN KEY (`eggsId`) REFERENCES `eggs` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eggslogs`
--

LOCK TABLES `eggslogs` WRITE;
/*!40000 ALTER TABLE `eggslogs` DISABLE KEYS */;
INSERT INTO `eggslogs` VALUES (1,1,4,'add','2025-05-30 06:45:59.423','2025-05-30 06:45:59.423'),(2,1,2,'hatched','2025-05-30 06:52:58.969','2025-05-30 06:52:58.969');
/*!40000 ALTER TABLE `eggslogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feeds`
--

DROP TABLE IF EXISTS `feeds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feeds` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minstock` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expirydate` datetime(3) DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `status` enum('active','expiredfood') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `createdAt` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  `updatedAt` datetime(3) DEFAULT CURRENT_TIMESTAMP(3),
  `categorieId` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `feeds_categorieId_fkey` (`categorieId`),
  CONSTRAINT `feeds_categorieId_fkey` FOREIGN KEY (`categorieId`) REFERENCES `feedscategory` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feeds`
--

LOCK TABLES `feeds` WRITE;
/*!40000 ALTER TABLE `feeds` DISABLE KEYS */;
INSERT INTO `feeds` VALUES (1,'FD0001','Premium Seed Mix','36','kg','5','2025-06-06 03:28:45.820','good feed','active','2025-05-30 02:48:47.225','2025-05-30 03:13:16.000',1);
/*!40000 ALTER TABLE `feeds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedscategory`
--

DROP TABLE IF EXISTS `feedscategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedscategory` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedscategory`
--

LOCK TABLES `feedscategory` WRITE;
/*!40000 ALTER TABLE `feedscategory` DISABLE KEYS */;
INSERT INTO `feedscategory` VALUES (1,'FC0001','vegetables');
/*!40000 ALTER TABLE `feedscategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedschedule`
--

DROP TABLE IF EXISTS `feedschedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedschedule` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `days` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qte` double DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `createdAt` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  `updatedAt` datetime(3) DEFAULT CURRENT_TIMESTAMP(3),
  `feedtypeId` int DEFAULT NULL,
  `time` time DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `feedschedule_uuid_key` (`uuid`),
  KEY `feedschedule_feedtypeId_fkey` (`feedtypeId`),
  CONSTRAINT `feedschedule_feedtypeId_fkey` FOREIGN KEY (`feedtypeId`) REFERENCES `feeds` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedschedule`
--

LOCK TABLES `feedschedule` WRITE;
/*!40000 ALTER TABLE `feedschedule` DISABLE KEYS */;
INSERT INTO `feedschedule` VALUES (1,'FS0001','Morning Seed Mix','everyday',4,'active','2025-05-30 03:02:42.397','2025-05-30 03:02:42.397',1,'08:00:00','feed species');
/*!40000 ALTER TABLE `feedschedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedschedulelogs`
--

DROP TABLE IF EXISTS `feedschedulelogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedschedulelogs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdAt` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  `status` enum('complete','delayed') COLLATE utf8mb4_unicode_ci DEFAULT 'complete',
  `feedscheduleId` int DEFAULT NULL,
  `userId` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `feedschedulelogs_userId_fkey` (`userId`),
  KEY `feedschedulelogs_feedscheduleId_fkey` (`feedscheduleId`),
  CONSTRAINT `feedschedulelogs_feedscheduleId_fkey` FOREIGN KEY (`feedscheduleId`) REFERENCES `feedschedule` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `feedschedulelogs_userId_fkey` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedschedulelogs`
--

LOCK TABLES `feedschedulelogs` WRITE;
/*!40000 ALTER TABLE `feedschedulelogs` DISABLE KEYS */;
INSERT INTO `feedschedulelogs` VALUES (1,'FD0001','2025-05-30 03:13:16.940','complete',1,'68157448aca9a');
/*!40000 ALTER TABLE `feedschedulelogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `HealthStatusLog`
--

DROP TABLE IF EXISTS `HealthStatusLog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `HealthStatusLog` (
  `id` int NOT NULL AUTO_INCREMENT,
  `birdId` int NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci,
  `createdAt` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  PRIMARY KEY (`id`),
  KEY `HealthStatusLog_birdId_fkey` (`birdId`),
  CONSTRAINT `HealthStatusLog_birdId_fkey` FOREIGN KEY (`birdId`) REFERENCES `birds` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `HealthStatusLog`
--

LOCK TABLES `HealthStatusLog` WRITE;
/*!40000 ALTER TABLE `HealthStatusLog` DISABLE KEYS */;
/*!40000 ALTER TABLE `HealthStatusLog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medicalfile`
--

DROP TABLE IF EXISTS `medicalfile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medicalfile` (
  `id` int NOT NULL AUTO_INCREMENT,
  `birdId` int DEFAULT NULL,
  `createdAt` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  `updatedAt` datetime(3) NOT NULL,
  `healthStatus` enum('STABLE','UNDER_OBSERVATION','CRITICAL','RECOVERING','HEALED') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'STABLE',
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `medicalfile_birdId_fkey` (`birdId`),
  CONSTRAINT `medicalfile_birdId_fkey` FOREIGN KEY (`birdId`) REFERENCES `birds` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicalfile`
--

LOCK TABLES `medicalfile` WRITE;
/*!40000 ALTER TABLE `medicalfile` DISABLE KEYS */;
/*!40000 ALTER TABLE `medicalfile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medicalrecord`
--

DROP TABLE IF EXISTS `medicalrecord`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medicalrecord` (
  `id` int NOT NULL AUTO_INCREMENT,
  `medicalFileId` int NOT NULL,
  `symptoms` text COLLATE utf8mb4_unicode_ci,
  `diagnosis` text COLLATE utf8mb4_unicode_ci,
  `createdAt` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  `updatedAt` datetime(3) DEFAULT CURRENT_TIMESTAMP(3),
  `appointmentId` int DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `temperature` double DEFAULT NULL,
  `veterinarianId` int DEFAULT NULL,
  `weight` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `medicalrecord_medicalFileId_fkey` (`medicalFileId`),
  KEY `medicalrecord_veterinarianId_fkey` (`veterinarianId`),
  KEY `medicalrecord_appointmentId_fkey` (`appointmentId`),
  CONSTRAINT `medicalrecord_appointmentId_fkey` FOREIGN KEY (`appointmentId`) REFERENCES `Appointment` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `medicalrecord_medicalFileId_fkey` FOREIGN KEY (`medicalFileId`) REFERENCES `medicalfile` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `medicalrecord_veterinarianId_fkey` FOREIGN KEY (`veterinarianId`) REFERENCES `Veterinarian` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicalrecord`
--

LOCK TABLES `medicalrecord` WRITE;
/*!40000 ALTER TABLE `medicalrecord` DISABLE KEYS */;
/*!40000 ALTER TABLE `medicalrecord` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission`
--

LOCK TABLES `permission` WRITE;
/*!40000 ALTER TABLE `permission` DISABLE KEYS */;
INSERT INTO `permission` VALUES (2,'manage_birds'),(31,'manage_breeding'),(34,'manage_purchases'),(33,'manage_sales'),(30,'manage_species'),(37,'manage_users'),(32,'view_manage'),(35,'view_reports'),(36,'view_users');
/*!40000 ALTER TABLE `permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pricecoefficient`
--

DROP TABLE IF EXISTS `pricecoefficient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pricecoefficient` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category` enum('old','breeding','gender') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'old',
  `minAge` int DEFAULT NULL,
  `maxAge` int DEFAULT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coefficient` double NOT NULL,
  `createdAt` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  `updatedAt` datetime(3) DEFAULT CURRENT_TIMESTAMP(3),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pricecoefficient`
--

LOCK TABLES `pricecoefficient` WRITE;
/*!40000 ALTER TABLE `pricecoefficient` DISABLE KEYS */;
/*!40000 ALTER TABLE `pricecoefficient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `purchase` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supliersId` int DEFAULT NULL,
  `total` double DEFAULT NULL,
  `status` enum('success','failed','pending') COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `createdAt` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  `updatedAt` datetime(3) DEFAULT CURRENT_TIMESTAMP(3),
  PRIMARY KEY (`id`),
  KEY `purchase_supliersId_fkey` (`supliersId`),
  CONSTRAINT `purchase_supliersId_fkey` FOREIGN KEY (`supliersId`) REFERENCES `supliers` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase`
--

LOCK TABLES `purchase` WRITE;
/*!40000 ALTER TABLE `purchase` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchasesitems`
--

DROP TABLE IF EXISTS `purchasesitems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `purchasesitems` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchaseId` int DEFAULT NULL,
  `typePurchase` enum('cages','birds','feeds') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'birds',
  `idproduct` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qte` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pu` double DEFAULT NULL,
  `createdAt` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  `updatedAt` datetime(3) DEFAULT CURRENT_TIMESTAMP(3),
  PRIMARY KEY (`id`),
  KEY `purchasesitems_purchaseId_fkey` (`purchaseId`),
  CONSTRAINT `purchasesitems_purchaseId_fkey` FOREIGN KEY (`purchaseId`) REFERENCES `purchase` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchasesitems`
--

LOCK TABLES `purchasesitems` WRITE;
/*!40000 ALTER TABLE `purchasesitems` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchasesitems` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'admin'),(2,'ground staff');
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
  `roleId` int NOT NULL,
  `permissionId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rolehaspermission_permissionId_fkey` (`permissionId`),
  KEY `rolehaspermission_roleId_fkey` (`roleId`),
  CONSTRAINT `rolehaspermission_permissionId_fkey` FOREIGN KEY (`permissionId`) REFERENCES `permission` (`name`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `rolehaspermission_roleId_fkey` FOREIGN KEY (`roleId`) REFERENCES `role` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rolehaspermission`
--

LOCK TABLES `rolehaspermission` WRITE;
/*!40000 ALTER TABLE `rolehaspermission` DISABLE KEYS */;
INSERT INTO `rolehaspermission` VALUES (1,1,'manage_birds'),(2,1,'manage_species'),(3,1,'manage_species'),(4,1,'manage_breeding'),(5,1,'view_manage'),(6,1,'manage_sales'),(7,1,'manage_purchases'),(8,1,'view_reports'),(9,1,'view_users'),(10,1,'manage_users'),(88,2,'manage_breeding');
/*!40000 ALTER TABLE `rolehaspermission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sales` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clientId` int DEFAULT NULL,
  `total` double DEFAULT NULL,
  `discounId` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('success','failed','pending') COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `createdAt` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  `updatedAt` datetime(3) DEFAULT CURRENT_TIMESTAMP(3),
  PRIMARY KEY (`id`),
  KEY `sales_clientId_fkey` (`clientId`),
  KEY `sales_discounId_fkey` (`discounId`),
  CONSTRAINT `sales_clientId_fkey` FOREIGN KEY (`clientId`) REFERENCES `clients` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `sales_discounId_fkey` FOREIGN KEY (`discounId`) REFERENCES `Discount` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salesitems`
--

DROP TABLE IF EXISTS `salesitems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `salesitems` (
  `id` int NOT NULL AUTO_INCREMENT,
  `saleId` int DEFAULT NULL,
  `typeSales` enum('birds','eggs') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'birds',
  `idproduct` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qte` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pu` double DEFAULT NULL,
  `createdAt` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  `updatedAt` datetime(3) DEFAULT CURRENT_TIMESTAMP(3),
  PRIMARY KEY (`id`),
  KEY `salesitems_saleId_fkey` (`saleId`),
  CONSTRAINT `salesitems_saleId_fkey` FOREIGN KEY (`saleId`) REFERENCES `sales` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salesitems`
--

LOCK TABLES `salesitems` WRITE;
/*!40000 ALTER TABLE `salesitems` DISABLE KEYS */;
/*!40000 ALTER TABLE `salesitems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` int NOT NULL AUTO_INCREMENT,
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
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` enum('small','medium','large') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'small',
  `lifespan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scienticname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pu` double DEFAULT '0',
  `createdAt` datetime(3) DEFAULT CURRENT_TIMESTAMP(3),
  `updatedAt` datetime(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `species_name_key` (`name`),
  UNIQUE KEY `species_uuid_key` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `species`
--

LOCK TABLES `species` WRITE;
/*!40000 ALTER TABLE `species` DISABLE KEYS */;
INSERT INTO `species` VALUES (1,'paraquets','Romanie','large','7-9 years','SP0001','Serinus canaria',70,'2025-06-01 03:22:31.386',NULL),(2,'Canary','Australia','medium','5-9 years','SP0002','Serinus canaria',100,'2025-06-01 03:22:31.386',NULL),(9,'posh','England','small','5-8 years','SP0009','testo',134,'2025-06-01 03:22:31.386',NULL);
/*!40000 ALTER TABLE `species` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subspecies`
--

DROP TABLE IF EXISTS `subspecies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subspecies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `speciesId` int DEFAULT NULL,
  `characteristiq` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subspecies_name_key` (`name`),
  UNIQUE KEY `subspecies_uuid_key` (`uuid`),
  KEY `subspecies_speciesId_fkey` (`speciesId`),
  CONSTRAINT `subspecies_speciesId_fkey` FOREIGN KEY (`speciesId`) REFERENCES `species` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subspecies`
--

LOCK TABLES `subspecies` WRITE;
/*!40000 ALTER TABLE `subspecies` DISABLE KEYS */;
INSERT INTO `subspecies` VALUES (1,'Canary',2,'Australia','SUB0001');
/*!40000 ALTER TABLE `subspecies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supliers`
--

DROP TABLE IF EXISTS `supliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `supliers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdAt` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  `updatedAt` datetime(3) DEFAULT CURRENT_TIMESTAMP(3),
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adress` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `supliers_name_key` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supliers`
--

LOCK TABLES `supliers` WRITE;
/*!40000 ALTER TABLE `supliers` DISABLE KEYS */;
INSERT INTO `supliers` VALUES (17,'lionel','feed,bird','2025-05-11 18:58:16.000','2025-05-11 20:09:08.000','SP0017','douala','supliers@gmail.com','666888');
/*!40000 ALTER TABLE `supliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Treatment`
--

DROP TABLE IF EXISTS `Treatment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Treatment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birdId` int NOT NULL,
  `medicalrecordId` int NOT NULL,
  `medication` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dosage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `startDate` datetime(3) NOT NULL,
  `endDate` datetime(3) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ONGOING',
  `createdAt` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  `updatedAt` datetime(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Treatment_birdId_fkey` (`birdId`),
  KEY `Treatment_medicalrecordId_fkey` (`medicalrecordId`),
  CONSTRAINT `Treatment_birdId_fkey` FOREIGN KEY (`birdId`) REFERENCES `birds` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `Treatment_medicalrecordId_fkey` FOREIGN KEY (`medicalrecordId`) REFERENCES `medicalrecord` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Treatment`
--

LOCK TABLES `Treatment` WRITE;
/*!40000 ALTER TABLE `Treatment` DISABLE KEYS */;
/*!40000 ALTER TABLE `Treatment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TreatmentLog`
--

DROP TABLE IF EXISTS `TreatmentLog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `TreatmentLog` (
  `id` int NOT NULL AUTO_INCREMENT,
  `treatmentId` int NOT NULL,
  `entryDate` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `TreatmentLog_treatmentId_fkey` (`treatmentId`),
  CONSTRAINT `TreatmentLog_treatmentId_fkey` FOREIGN KEY (`treatmentId`) REFERENCES `Treatment` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TreatmentLog`
--

LOCK TABLES `TreatmentLog` WRITE;
/*!40000 ALTER TABLE `TreatmentLog` DISABLE KEYS */;
/*!40000 ALTER TABLE `TreatmentLog` ENABLE KEYS */;
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
  `roleId` int NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `createdAt` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  `updatedAt` datetime(3) DEFAULT CURRENT_TIMESTAMP(3),
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_id_key` (`id`),
  UNIQUE KEY `users_email_key` (`email`),
  KEY `users_roleId_fkey` (`roleId`),
  CONSTRAINT `users_roleId_fkey` FOREIGN KEY (`roleId`) REFERENCES `role` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('68157448aca9a',NULL,'fotso lionel','admin@gmail.com','$2y$10$vpppJX4phoIhadl3Xk8bnuMaHNL2.7oepQcbnm3mqEHH9csJo1udC',1,'active','2025-05-03 02:41:28.792','2025-05-23 12:16:19.318','+237679032247'),('68157f5da533a',NULL,'Groun Staff','staff@gmail.com','$2y$10$lAdMYF.Ufm4JfIpanUb3Ae4TcJFvO8kZHizW11OJJXXfoE.YgyijK',2,'active','2025-05-03 03:28:45.820','2025-05-26 21:11:34.066','+237679032247');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Vaccination`
--

DROP TABLE IF EXISTS `Vaccination`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Vaccination` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birdId` int DEFAULT NULL,
  `vaccineName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `administrationDate` datetime(3) NOT NULL,
  `nextDoseDate` datetime(3) DEFAULT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `veterinarianId` int DEFAULT NULL,
  `createdAt` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  PRIMARY KEY (`id`),
  KEY `Vaccination_birdId_fkey` (`birdId`),
  KEY `Vaccination_veterinarianId_fkey` (`veterinarianId`),
  CONSTRAINT `Vaccination_birdId_fkey` FOREIGN KEY (`birdId`) REFERENCES `birds` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `Vaccination_veterinarianId_fkey` FOREIGN KEY (`veterinarianId`) REFERENCES `Veterinarian` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Vaccination`
--

LOCK TABLES `Vaccination` WRITE;
/*!40000 ALTER TABLE `Vaccination` DISABLE KEYS */;
/*!40000 ALTER TABLE `Vaccination` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Veterinarian`
--

DROP TABLE IF EXISTS `Veterinarian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Veterinarian` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdAt` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  `updatedAt` datetime(3) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Veterinarian_email_key` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Veterinarian`
--

LOCK TABLES `Veterinarian` WRITE;
/*!40000 ALTER TABLE `Veterinarian` DISABLE KEYS */;
/*!40000 ALTER TABLE `Veterinarian` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-01 11:25:02
