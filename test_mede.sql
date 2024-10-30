/*
SQLyog Community v13.3.0 (64 bit)
MySQL - 8.0.30 : Database - test_mede
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`test_mede` /*!40100 DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `test_mede`;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `komoditas` */

DROP TABLE IF EXISTS `komoditas`;

CREATE TABLE `komoditas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `komoditas_kode` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `komoditas_nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `komoditas` */

insert  into `komoditas`(`id`,`komoditas_kode`,`komoditas_nama`,`created_at`,`updated_at`) values 
(1,'K001','Beras','2024-10-30 08:16:23','2024-10-30 08:16:23'),
(2,'K002','Jagung','2024-10-30 08:16:23','2024-10-30 08:16:23'),
(3,'K003','Gandum','2024-10-30 08:16:23','2024-10-30 08:16:23'),
(4,'K004','Sagu','2024-10-30 08:16:23','2024-10-30 08:16:23'),
(5,'K005','Bawang','2024-10-30 08:16:23','2024-10-30 08:16:23'),
(6,'K006','Cabe','2024-10-30 08:16:23','2024-10-30 08:16:23'),
(7,'K007','Tebu','2024-10-30 08:16:43','2024-10-30 08:16:43'),
(8,'K008','minyaks','2024-10-30 09:21:25','2024-10-30 09:21:30');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2019_08_19_000000_create_failed_jobs_table',1),
(3,'2024_10_30_065520_create_komoditas',1),
(4,'2024_10_30_073433_create_produksi',1);

/*Table structure for table `produksi` */

DROP TABLE IF EXISTS `produksi`;

CREATE TABLE `produksi` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `komoditas_id` bigint unsigned DEFAULT NULL,
  `tanggal` date NOT NULL,
  `jumlah` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produksi_komoditas_id_foreign` (`komoditas_id`),
  CONSTRAINT `produksi_komoditas_id_foreign` FOREIGN KEY (`komoditas_id`) REFERENCES `komoditas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `produksi` */

insert  into `produksi`(`id`,`komoditas_id`,`tanggal`,`jumlah`,`created_at`,`updated_at`) values 
(1,2,'2024-10-23',1,'2024-10-30 08:18:39','2024-10-30 08:18:39'),
(2,2,'2024-10-31',1212122,'2024-10-30 08:19:46','2024-10-30 08:19:46'),
(3,4,'2024-10-31',345678,'2024-10-30 08:20:11','2024-10-30 08:20:11'),
(4,6,'2024-10-31',12,'2024-10-30 08:25:44','2024-10-30 08:26:49'),
(5,1,'2023-12-06',1212,'2024-10-30 08:51:18','2024-10-30 08:51:18'),
(7,2,'2024-10-30',12,'2024-10-30 09:28:12','2024-10-30 09:28:12'),
(9,1,'2022-11-09',12,'2024-10-30 09:31:18','2024-10-30 09:31:18'),
(10,2,'2024-09-25',12,'2024-10-30 09:32:23','2024-10-30 09:32:23');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
