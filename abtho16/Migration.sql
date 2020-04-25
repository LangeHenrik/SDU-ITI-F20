/*!I didn't make the insert sentence due to my local database was not working with my site */;

DROP DATABASE IF EXISTS `abtho16`;
CREATE DATABASE IF NOT EXISTS `abtho16` 
USE `abtho16`;

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `zipcode` varchar(4) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phonenumber` varchar(11) DEFAULT NULL,
  PRIMARY KEY ( `userid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `picture`;
CREATE TABLE IF NOT EXISTS `picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `picture` blob NOT NULL,
  `user` varchar(16) NOT NULL,
  `header` varchar(50)  NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_pic_user` (`user`),
  CONSTRAINT `FK_pic_user` FOREIGN KEY (`user`) REFERENCES `user` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
