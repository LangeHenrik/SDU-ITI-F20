DROP DATABASE IF EXISTS iti;
CREATE DATABASE iti;
USE iti;

CREATE TABLE users (
	userid INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(10) NOT NULL,
    passw VARCHAR(30) NOT NULL,
    fullname VARCHAR(100) NOT NULL,
    phone VARCHAR(25) NOT NULL,
    email VARCHAR(320) NOT NULL,
    PRIMARY KEY (userid)
);

# 03-03-2020
ALTER TABLE `iti`.`users` 
ADD UNIQUE INDEX `username_UNIQUE` (`username` ASC) VISIBLE;

# 04-03-2020
ALTER TABLE `iti`.`users` 
CHANGE COLUMN `passw` `passw` VARCHAR(255) NOT NULL ;

# 04-03-2020
ALTER TABLE `iti`.`users` 
ADD COLUMN `signup` DATE NOT NULL AFTER `email`;

# 04-03-2020
CREATE TABLE picture (
	picid INT NOT NULL AUTO_INCREMENT,
    userid INT NOT NULL,
    uploaddate DATE NOT NULL,
    imagename VARCHAR(200) NOT NULL,
    imagebase64 LONGTEXT NOT NULL,
    PRIMARY KEY (picid),
    FOREIGN KEY (userid) REFERENCES users(userid)
);

# 08-03-2020
DROP TABLE picture;
CREATE TABLE picture (
	picid INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(10) NOT NULL,
    uploaddate DATE NOT NULL,
    imagename VARCHAR(200) NOT NULL,
    imagebase64 LONGTEXT NOT NULL,
    PRIMARY KEY (picid),
    FOREIGN KEY (username) REFERENCES users(username)
);