

DROP DATABASE IF EXISTS 'abtho';
CREATE DATABASE IF NOT EXISTS 'abtho';
USE 'abtho';


DROP TABLE IF EXISTS 'picture';
CREATE TABLE IF NOT EXISTS 'picture' (
  'image_id' int(20) NOT NULL AUTO_INCREMENT,
  'username' varchar(100) NOT NULL,
  'title' varchar(100) NOT NULL,
  'description' varchar(200) NOT NULL,
  'image' longblob NOT NULL,
  PRIMARY KEY ('image_id','username'),
  KEY 'username' ('username'),
  CONSTRAINT 'picture_ibfk_1' FOREIGN KEY ('username') REFERENCES 'users' ('username')
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS 'users';
CREATE TABLE IF NOT EXISTS 'users' (
  'user_id' int(10) NOT NULL AUTO_INCREMENT,
  'username' varchar(100) NOT NULL,
  'pwd' varchar(100) NOT NULL,
  'firstname' varchar(50) NOT NULL,
  'lastname' varchar(50) NOT NULL,
  PRIMARY KEY ('user_id`),
  UNIQUE KEY 'username' ('username')
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
