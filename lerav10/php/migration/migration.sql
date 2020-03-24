-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.2.14-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2020-03-24 17:52:06
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for login
CREATE DATABASE IF NOT EXISTS `login` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `login`;


-- Dumping structure for table login.users
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table login.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`userID`, `username`, `password`) VALUES
	(1, 'testuser', 'testuser');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
