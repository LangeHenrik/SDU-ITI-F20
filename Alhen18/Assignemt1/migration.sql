CREATE DATABASE IF NOT EXISTS `alhen18` CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE USER IF NOT EXISTS 'alhen18'@'localhost' IDENTIFIED BY 'alhen18';

GRANT ALL PRIVILEGES ON `alhen18`.* TO 'alhen18'@'localhost';

FLUSH PRIVILEGES;

USE `alhen18`;

CREATE TABLE IF NOT EXISTS `alhen18`.`account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `alhen18`.`image` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `caption` varchar(255),
  `description` text,
  `image_name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `uploadDate` datetime NOT NULL DEFAULT NOW(),
  CONSTRAINT `fk_user_image`
    FOREIGN KEY (`user_id`) REFERENCES `account` (id)
    ON DELETE CASCADE
    ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
