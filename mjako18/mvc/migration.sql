CREATE DATABASE IF NOT EXISTS `image_share` CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE USER IF NOT EXISTS 'mjako18'@'localhost' IDENTIFIED BY 'ITIassignment';

GRANT ALL PRIVILEGES ON `image_share`.* TO 'mjako18'@'localhost';

FLUSH PRIVILEGES;

USE `image_share`;

CREATE TABLE IF NOT EXISTS `image_share`.`account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255),/* NOT NULL, /* NOT USED, GDPR */
  `lastname` varchar(255),/* NOT NULL, /* NOT USED, GDPR */
  `email` varchar(255),/* NOT NULL, /* NOT USED, GDPR */
  PRIMARY KEY (`id`),
  UNIQUE (`username`, `password`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `image_share`.`image` (
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
