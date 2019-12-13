/*
SQLyog Professional v12.4.3 (64 bit)
MySQL - 10.1.34-MariaDB : Database - artfest
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`artfest` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `artfest`;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `match_tags` */

DROP TABLE IF EXISTS `match_tags`;

CREATE TABLE `match_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `match_id` int(11) DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `match_tags` */

insert  into `match_tags`(`id`,`match_id`,`tag_id`) values 
(1,1,1),
(2,1,6),
(3,2,1),
(4,2,6),
(5,2,7);

/*Table structure for table `matches` */

DROP TABLE IF EXISTS `matches`;

CREATE TABLE `matches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `description` text,
  `schedule` timestamp NULL DEFAULT NULL,
  `link_embed` varchar(100) DEFAULT NULL,
  `is_live` varchar(1) DEFAULT NULL COMMENT '0: Recorded, 1:Live',
  `is_headline` varchar(1) DEFAULT NULL COMMENT '1:Headline',
  `tag` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `matches` */

insert  into `matches`(`id`,`title`,`description`,`schedule`,`link_embed`,`is_live`,`is_headline`,`tag`) values 
(1,'Pertandingan Futsal Sekretariat Jenderal vs Direktorat Jenderal Imigrasi',NULL,NULL,'https://www.youtube.com/embed/A_Fihl1YhGk','0','0',1),
(2,'Pencangan Hari Dharma Karya Dhika','<p>video pencanangan</p>',NULL,'https://www.youtube.com/embed/oJkmWfUnZcM','0','1',2),
(3,'Olahraga Sepeda \"PASTI Sehat\"',NULL,'2019-10-12 00:00:00',NULL,'0','0',3),
(4,'Silaturahmi Golf Pengayoman',NULL,'2019-10-13 00:00:00',NULL,'0','0',4),
(5,'Turnamen Persatuan Tenis Pengayoman (PTP) Cup',NULL,'2019-10-18 00:00:00',NULL,'0','0',8),
(6,'Turnamen Persatuan Tenis Pengayoman (PTP) Cup',NULL,'2019-10-19 00:00:00',NULL,'0','0',8),
(7,'Turnamen Persatuan Tenis Pengayoman (PTP) Cup',NULL,'2019-10-20 00:00:00',NULL,'0','0',8),
(8,'Olahraga Jalan PASTI Sehat',NULL,'2019-10-27 00:00:00',NULL,'0','0',2);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `tags` */

DROP TABLE IF EXISTS `tags`;

CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tags` */

insert  into `tags`(`id`,`tag`) values 
(1,'Sepeda'),
(2,'Golf'),
(3,'Tennis'),
(4,'Jalan'),
(8,'other');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,'admin','admin',NULL,'$2y$10$9hjYqx/cN7WiRv4MIe83HOy/cRP2gu90Kb.xtf338YXT0O44FTVKS','8GjoCxCFdkDOtptqspNXkZsTJ5606xLUTh5UYghscg2beLmHfLgzxwB0tpqg',NULL,NULL);

/*Table structure for table `votes` */

DROP TABLE IF EXISTS `votes`;

CREATE TABLE `votes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_match` int(11) NOT NULL,
  `cookie` varchar(32) NOT NULL,
  `ip_address` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `votes` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
