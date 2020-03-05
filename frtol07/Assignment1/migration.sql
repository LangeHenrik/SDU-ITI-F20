CREATE DATABASE IF NOT EXISTS assignment1;

USE assignment1;


CREATE TABLE IF NOT EXISTS  users(
	username varchar(100) NOT NULL,
	password varchar(100) NOT NULL,
	email varchar(100) NOT NULL,
	primary key (username)

)ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE IF NOT EXISTS  images (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `user` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `header` varchar(200) NOT NULL,
  `image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

