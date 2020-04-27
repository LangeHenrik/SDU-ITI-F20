-- --------------------------------------------------------
-- Vært:                         127.0.0.1
-- Server-version:               10.3.12-MariaDB - mariadb.org binary distribution
-- ServerOS:                     Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for accounts
DROP DATABASE IF EXISTS `accounts`;
CREATE DATABASE IF NOT EXISTS `accounts` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `accounts`;

-- Dumping structure for tabel accounts.images
DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(200) NOT NULL DEFAULT '0',
  `title` tinytext NOT NULL DEFAULT '0',
  `description` text NOT NULL DEFAULT '0',
  `uploadby` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table accounts.images: ~1 rows (approximately)
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT IGNORE INTO `images` (`id`, `image`, `title`, `description`, `uploadby`) VALUES
	(1, '0UesMNX.jpg', 'Words to live by.', 'This is a long description.\r\nThis is a long description.\r\nThis is a long description.\r\nThis is a long description.\r\nThis is a long description.\r\nThis is a long description.', 'admin123');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;

-- Dumping structure for tabel accounts.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `name` varchar(50) NOT NULL,
  `joined` datetime NOT NULL,
  `group` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table accounts.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT IGNORE INTO `users` (`id`, `username`, `password`, `salt`, `name`, `joined`, `group`) VALUES
	(1, 'admin123', '2d5c372e64bc4bf31a7e8c16109d6b03c80db813481cdf2f96730d91035b3166', 'µÐË<‚™¨E3õšÖ4z8~ý…6PrçQfeÀ‰1', 'admin', '2020-03-07 13:49:51', 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
