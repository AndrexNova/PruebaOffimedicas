-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para offimedicas
DROP DATABASE IF EXISTS `offimedicas`;
CREATE DATABASE IF NOT EXISTS `offimedicas` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `offimedicas`;

-- Volcando estructura para tabla offimedicas.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla offimedicas.migrations: ~0 rows (aproximadamente)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla offimedicas.nucleos
DROP TABLE IF EXISTS `nucleos`;
CREATE TABLE IF NOT EXISTS `nucleos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idusuarioppal` int(11) NOT NULL,
  `idusuarionucleo` int(11) NOT NULL,
  `idparentesco` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla offimedicas.nucleos: ~0 rows (aproximadamente)
DELETE FROM `nucleos`;
/*!40000 ALTER TABLE `nucleos` DISABLE KEYS */;
INSERT INTO `nucleos` (`id`, `idusuarioppal`, `idusuarionucleo`, `idparentesco`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, 5, '2020-08-14 00:23:30', '2020-08-14 00:23:30');
/*!40000 ALTER TABLE `nucleos` ENABLE KEYS */;

-- Volcando estructura para tabla offimedicas.parentescos
DROP TABLE IF EXISTS `parentescos`;
CREATE TABLE IF NOT EXISTS `parentescos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla offimedicas.parentescos: ~0 rows (aproximadamente)
DELETE FROM `parentescos`;
/*!40000 ALTER TABLE `parentescos` DISABLE KEYS */;
INSERT INTO `parentescos` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Padres', '2020-08-13 19:20:07', '2020-08-13 19:41:24'),
	(2, 'Hijos', '2020-08-13 19:41:16', '2020-08-13 19:41:19'),
	(3, 'Abuelos', '2020-08-13 19:41:27', '2020-08-13 19:41:25'),
	(4, 'Nietos', '2020-08-13 19:41:27', '2020-08-13 19:41:27'),
	(5, 'Hermanos', '2020-08-13 19:41:29', '2020-08-13 19:41:29'),
	(6, 'Bisabuelos', '2020-08-13 19:41:30', '2020-08-13 19:41:31'),
	(7, 'Bisnietos', '2020-08-13 19:41:33', '2020-08-13 19:41:32'),
	(8, 'Tios', '2020-08-13 19:41:33', '2020-08-13 19:41:33'),
	(9, 'Sobrinos', '2020-08-13 19:41:35', '2020-08-13 19:41:34'),
	(10, 'Primos', '2020-08-13 19:41:36', '2020-08-13 19:41:36');
/*!40000 ALTER TABLE `parentescos` ENABLE KEYS */;

-- Volcando estructura para tabla offimedicas.usuarios
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuarios_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla offimedicas.usuarios: ~1 rows (aproximadamente)
DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
	(1, 'JAHIR ANDRES NOVA MARTINEZ', 'andrexjahifer@gmail.com', '7feff30c4d3427c498fd9a4f8dea965a6bb09608', '2020-08-14 00:14:21', '2020-08-14 00:14:21'),
	(2, 'Geraldin Nova', 'geral123@jajaj.com', '7feff30c4d3427c498fd9a4f8dea965a6bb09608', '2020-08-14 00:23:30', '2020-08-14 00:34:54');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
