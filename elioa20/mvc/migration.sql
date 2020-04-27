-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 27, 2020 at 02:55 PM
-- Server version: 10.1.44-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.4

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
    
    SELECT image_blob,header,description,uploadTime,username FROM images;
 
END$$

DROP PROCEDURE IF EXISTS `GetUserID`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetUserID` (IN `p_username` VARCHAR(45))  NO SQL
BEGIN

SELECT user_id 
FROM users
WHERE username = p_username;

END$$

DROP PROCEDURE IF EXISTS `GetUserImages`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetUserImages` (IN `p_username` VARCHAR(45))  NO SQL
BEGIN

SELECT *
FROM images
WHERE username = p_username;

END$$

DROP PROCEDURE IF EXISTS `GetUsername`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetUsername` (IN `p_userid` INT)  NO SQL
BEGIN

SELECT username
FROM users
WHERE user_id = p_userid;

END$$

DROP PROCEDURE IF EXISTS `GetUsers`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetUsers` ()  NO SQL
BEGIN
    
    SELECT user_id,username FROM users;
 
END$$

DROP PROCEDURE IF EXISTS `InsertImage`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertImage` (IN `p_image_blob` BLOB, IN `p_header` VARCHAR(200), IN `p_description` VARCHAR(200), IN `p_uploadtime` DATETIME, IN `p_username` VARCHAR(45))  NO SQL
BEGIN

	INSERT INTO images(image_blob,header,description,uploadTime,username) VALUES (p_image_blob,p_header,p_description,p_uploadtime,p_username);
SELECT LAST_INSERT_ID();

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
CREATE DEFINER=`root`@`localhost` PROCEDURE `UserExists` (IN `p_username` VARCHAR(45), OUT `p_exists` BOOLEAN)  BEGIN
    DECLARE userExists varchar(45);
 
    SELECT username INTO userExists
    FROM users
    WHERE username = p_username;
 
    IF userExists IS NULL THEN
    	SET p_exists = false;
    ELSE
    	SET p_exists = true;
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
  `image_blob` longblob NOT NULL,
  `header` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `uploadTime` datetime NOT NULL,
  `username` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
