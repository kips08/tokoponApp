-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.6-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for tokoponApp
DROP DATABASE IF EXISTS `tokoponApp`;
CREATE DATABASE IF NOT EXISTS `tokoponapp` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `tokoponApp`;

-- Dumping structure for table tokoponApp.alamats
DROP TABLE IF EXISTS `alamats`;
CREATE TABLE IF NOT EXISTS `alamats` (
  `id_alamat` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Alamat` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodepos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_alamat`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tokoponApp.alamats: ~1 rows (approximately)
DELETE FROM `alamats`;
/*!40000 ALTER TABLE `alamats` DISABLE KEYS */;
INSERT INTO `alamats` (`id_alamat`, `id_user`, `label`, `Alamat`, `kota`, `provinsi`, `kodepos`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Rumah', 'Graha Indah', 'Bekasi', 'Jawa Barat', '17422', NULL, NULL),
	(2, 1, 'Kantor 1', 'Jl. Graha Indah X A9 No. 9', 'Bekasi', 'Jawa Barat', '17422', '2019-11-06 05:25:29', '2019-11-06 05:30:34');
/*!40000 ALTER TABLE `alamats` ENABLE KEYS */;

-- Dumping structure for table tokoponApp.carts
DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id_cart` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_cart`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tokoponApp.carts: ~1 rows (approximately)
DELETE FROM `carts`;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
INSERT INTO `carts` (`id_cart`, `id_user`, `created_at`, `updated_at`) VALUES
	(1, 1, '2019-11-07 14:58:11', '2019-11-07 14:58:11');
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;

-- Dumping structure for table tokoponApp.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tokoponApp.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table tokoponApp.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tokoponApp.migrations: ~10 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_10_17_063538_drop_email_verified_at_from_users', 1),
	(5, '2019_10_17_064540_add_column_to_users', 1),
	(6, '2019_10_17_065226_create_products_table', 1),
	(7, '2019_10_28_080833_create_alamats_table', 1),
	(8, '2019_11_07_053138_create_orders_table', 2),
	(9, '2019_11_07_063137_add_timestamo_to_orders_table', 3),
	(10, '2019_11_07_142903_create_carts_table', 4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table tokoponApp.orders
DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id_order` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tgl_pesan` date NOT NULL,
  `id_cart` int(11) NOT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ekspedisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_resi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `status_bayar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_order`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tokoponApp.orders: ~1 rows (approximately)
DELETE FROM `orders`;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id_order`, `tgl_pesan`, `id_cart`, `invoice`, `ekspedisi`, `no_resi`, `total`, `status_bayar`, `status_kirim`, `created_at`, `updated_at`) VALUES
	(2, '2019-11-02', 2, 'INV/11/1/2', 'JNE', '1234567', 5340000, 'terbayar', 'sedang dikirim', '2019-11-07 06:37:47', '2019-11-07 06:55:36');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table tokoponApp.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tokoponApp.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table tokoponApp.products
DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id_product` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `merk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soc_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soc_tipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ram` int(11) NOT NULL,
  `rom` int(11) NOT NULL,
  `deskripsi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tokoponApp.products: ~2 rows (approximately)
DELETE FROM `products`;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id_product`, `merk`, `tipe`, `soc_nama`, `soc_tipe`, `ram`, `rom`, `deskripsi`, `harga`, `stok`, `created_at`, `updated_at`) VALUES
	(1, 'Realme', 'X2 Pro', 'Snapdragon', '855 Plus', 6, 64, 'bebas', 5199000, 100, '2019-11-07 05:23:21', '2019-11-07 05:23:21'),
	(2, 'Xiaomi', 'Mi Note 10 Pro', 'Snapdragon', '730', 6, 128, 'bebas', 4399000, 50, '2019-11-07 05:24:05', '2019-11-07 05:25:06');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table tokoponApp.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_verif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unverified',
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tokoponApp.users: ~0 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id_user`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `pic`, `status_verif`) VALUES
	(1, 'Bernice', 'Anibal42@example.org', '$2y$10$31qnZQiU1eX.OTYYbn9M5.Wdmm1Y89q/vHHpYDiVWTUqWgeLdJBda', 0, NULL, '2019-10-28 08:12:35', '2019-10-28 08:12:35', NULL, 'unverified');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
