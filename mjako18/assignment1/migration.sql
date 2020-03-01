CREATE DATABASE IF NOT EXISTS `image_share` CHARACTER SET utf8 COLLATE utf8_general_ci;

USE `image_share`;

CREATE TABLE IF NOT EXISTS `image_share`.`accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255),/* NOT NULL, /* NOT USED, GDPR */
  `lastname` varchar(255),/* NOT NULL, /* NOT USED, GDPR */
  `email` varchar(255),/* NOT NULL, /* NOT USED, GDPR */
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `image_share`.`images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caption` varchar(255),
  `description` text,
  `image_name` varchar(255) NOT NULL,
  `uploadDate` datetime NOT NULL DEFAULT NOW(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
