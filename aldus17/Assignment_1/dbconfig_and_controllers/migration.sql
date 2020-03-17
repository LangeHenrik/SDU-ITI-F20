DROP DATABASE IF EXISTS aldus17;

CREATE DATABASE IF NOT EXISTS aldus17;

USE aldus17;

DROP TABLE IF EXISTS user;

DROP TABLE IF EXISTS imagefeed;

CREATE TABLE user (
	userID INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	username VARCHAR(100) UNIQUE NOT NULL,
	fullname VARCHAR(150) NULL,
	email VARCHAR(150) NOT NULL,
	password VARCHAR(255) NOT NULL,
	PRIMARY KEY (userID)
);

INSERT INTO
	user (username, fullname, email, password)
VALUES
	('test', 'test', 'test@test.com', '$2y$12$syuFo.W56bAuWIMqGCjtDODOVoriPXdwmTWyNDo7K3b0V27LmtQXG'),
	('willien', 'William Simonsen', 'willien@gmail.com', '$2y$12$c.hm0gn.iSYgfTcLiBxEQu8f/8wpDRadGbkGqhzUxWQf3mHem3rI2'),
	('bjarkech', 'Bjarke Ellegaard-Hald Bech', 'bjarkech@gmail.com', '$2y$12$c.hm0gn.iSYgfTcLiBxEQu8f/8wpDRadGbkGqhzUxWQf3mHem3rI2');


CREATE TABLE imagefeed (
	imageID INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	userID INT(10) UNSIGNED NOT NULL,
	image MEDIUMBLOB NOT NULL,
	title VARCHAR(150) NOT NULL,
	description TEXT NULL,
	creationTime DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
	PRIMARY KEY (imageID),
	FOREIGN KEY (userID) REFERENCES user(userID)
);

INSERT INTO
	imagefeed (userID, image, title, description)
VALUES
	((SELECT userID FROM user WHERE user.username='willien'),'images/cwwBXiMibTY.jpg', 'Motorcycle', 'Ride in the dessert'),
	((SELECT userID FROM user WHERE user.username='bjarkech'), 'images/mxdDX98iMKo.jpg', 'German Shepherd', 'Picture of my dog while on vacation');