#MySQL 5.7.12
#please drop objects you've created at the end of the script 
#or check for their existance before creating
#'\\' is a delimiter

select version() as 'mysql version'
DROP DATABASE IF EXISTS `abtho16`;
CREATE DATABASE IF NOT EXISTS `abtho16`;
USE `abtho16`;

DROP TABLE IF EXISTS 'user';
CREATE TABLE IF NOT EXISTS `user' (
  'userid' int(8) unsigned NOT NULL AUTO_INCREMENT,
  'username' char(50) COLLATE latin1_danish_ci NOT NULL,
  'password_hash' char(100) COLLATE latin1_danish_ci NOT NULL,
  'firstname' char(100) COLLATE latin1_danish_ci NOT NULL,
  'lastname' char(100) COLLATE latin1_danish_ci NOT NULL,
  'zip' char(10) COLLATE latin1_danish_ci DEFAULT NULL,
  'city' char(50) COLLATE latin1_danish_ci DEFAULT NULL,
  'email' char(50) COLLATE latin1_danish_ci DEFAULT NULL,
  'phonenumber' char(50) COLLATE latin1_danish_ci DEFAULT NULL,
  PRIMARY KEY ('userid'),
  UNIQUE KEY 'username' ('username')
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;



DROP TABLE IF EXISTS 'picture';
CREATE TABLE IF NOT EXISTS 'picture' (
  'id' int(8) unsigned NOT NULL AUTO_INCREMENT,
  'picture' blob NOT NULL,
  'user' char(50) COLLATE latin1_danish_ci NOT NULL,
  'header' varchar(50) COLLATE latin1_danish_ci NOT NULL,
  'description' varchar(250) COLLATE latin1_danish_ci DEFAULT NULL,
  PRIMARY KEY ('id'),
  KEY 'FK_pic_user' ('user'),
  CONSTRAINT 'FK_pic_user' FOREIGN KEY ('user') REFERENCES 'user' ('username')
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;
