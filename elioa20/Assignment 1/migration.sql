-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 09, 2020 at 12:57 PM
-- Server version: 10.1.44-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `odinsblog`
--
CREATE DATABASE IF NOT EXISTS `odinsblog` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `odinsblog`;

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `GetImages`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetImages` ()  NO SQL
BEGIN

    SELECT path,header,description,uploadTime,username FROM images;

END$$

DROP PROCEDURE IF EXISTS `GetUsers`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetUsers` ()  NO SQL
BEGIN

    SELECT username FROM users;

END$$

DROP PROCEDURE IF EXISTS `InsertImage`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertImage` (IN `p_path` VARCHAR(200), IN `p_header` VARCHAR(200), IN `p_description` VARCHAR(200), IN `p_uploadtime` DATETIME, IN `p_username` VARCHAR(45))  NO SQL
BEGIN

	INSERT INTO images(path,header,description,uploadTime,username) VALUES (p_path,p_header,p_description,p_uploadtime,p_username);


END$$

DROP PROCEDURE IF EXISTS `InsertNewUser`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertNewUser` (IN `p_username` VARCHAR(45), IN `p_password` VARCHAR(255))  NO SQL
BEGIN

	INSERT INTO users(username,password) VALUES (p_username,p_password);


END$$

DROP PROCEDURE IF EXISTS `LogIn`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `LogIn` (IN `p_username` VARCHAR(45), OUT `p_return` VARCHAR(255))  BEGIN
    DECLARE pass varchar(255);

    SELECT password INTO pass
    FROM users
    WHERE username = p_username;

    IF pass IS NULL THEN
    	SET p_return = 'User does not exist';
    ELSE
    	SET p_return = pass;
    END IF;

END$$

DROP PROCEDURE IF EXISTS `UserExists`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `UserExists` (IN `p_username` VARCHAR(45), OUT `p_exists` BOOLEAN)  NO SQL
BEGIN
    DECLARE userna varchar(45);

 	SET p_exists = true;

    SELECT username INTO userna
    FROM users
    WHERE username = p_username;

    IF userna IS NULL THEN
    	SET p_exists = false;
    END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(200) NOT NULL,
  `header` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `uploadTime` datetime NOT NULL,
  `username` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `path`, `header`, `description`, `uploadTime`, `username`) VALUES
(22, '../uploads/download.jpeg', 'this is an image header', 'this is an image description', '2020-03-09 12:56:49', 'admin01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`,`username`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(11, 'admin01', '$2y$10$o.TDdAkJHcH.pRlIVDi1SuMrVsZMyMkE3ic9E9x2qjKlEAXo1RlyG');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;