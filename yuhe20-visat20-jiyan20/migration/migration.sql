
DROP DATABASE IF EXISTS ass2;
Create DATABASE ass2;
USE ass2;

CREATE TABLE users (
    userid INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(50) NOT NULL, 
    username VARCHAR(20) NOT NULL UNIQUE,
    pwd VARCHAR(1000) NOT NULL
);

CREATE TABLE images (
   imageid INT UNSIGNED AUTO_INCREMENT,
	image LONGBLOB NOT NULL,
	header VARCHAR(25) NOT NULL, 
	description VARCHAR(250) NOT NULL,
	userid int UNSIGNED,
	PRIMARY KEY (imageid),
   FOREIGN KEY (userid) REFERENCES users(userid)
);

INSERT INTO users (username, email, pwd)
VALUES ('username', 'yuhe20@student.sdu.dk', 'password');