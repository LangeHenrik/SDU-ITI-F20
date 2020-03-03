DROP DATABASE IF EXISTS aldus17;

CREATE DATABASE IF NOT EXISTS aldus17;

USE aldus17;

DROP TABLE IF EXISTS users;

DROP TABLE IF EXISTS images;

CREATE TABLE users (
	userID INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	username VARCHAR(100) UNIQUE NOT NULL,
	fullname VARCHAR(150) NULL,
	email VARCHAR(150) NOT NULL,
	password VARCHAR(255) NOT NULL,
	PRIMARY KEY (userID)
);

INSERT INTO
	users (username, fullname, email, password)
VALUES
	('test', 'test', 'test@test.com', '$2y$12$syuFo.W56bAuWIMqGCjtDODOVoriPXdwmTWyNDo7K3b0V27LmtQXG'),
	('willien', 'William Simonsen', 'willien@gmail.com', '$2y$12$c.hm0gn.iSYgfTcLiBxEQu8f/8wpDRadGbkGqhzUxWQf3mHem3rI2');
	


CREATE TABLE images (
	imageID INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	userID INT(10) UNSIGNED NOT NULL,
	image MEDIUMBLOB NOT NULL,
	title VARCHAR(150) NOT NULL,
	description TEXT NULL,
	creationTime DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
	PRIMARY KEY (imageID),
	FOREIGN KEY (userID) REFERENCES users(userID)
);

INSERT INTO
	images (userID, image, title, description)
VALUES
	((SELECT userID FROM users WHERE users.username='willien'),'images/cwwBXiMibTY.jpg', 'Motorcycle', 'Ride in the dessert');
	--((SELECT userID FROM users WHERE users.username='rebecsen'), 'images/AifaTusrQQM.jpg', 'Tour in Asia', 'A short visit in China, in a village this picture was snapped'),
	--((SELECT userID FROM users WHERE users.username='eriksten'), 'images/-045rdpAsZA.jpg', 'A window', 'Closed window with white sunscreen'),
	--((SELECT userID FROM users WHERE users.username='johald'), 'images/gUDNK8NqYHk.jpg', 'Art', 'Art of lake in the hills'),
	--((SELECT userID FROM users WHERE users.username='gustaven'), 'images/hec6OogZ-cs.jpg', 'Truck', 'Truck riding in the mountains. Weather not to good.'),
	--((SELECT userID FROM users WHERE users.username='bjarkech'), 'images/mxdDX98iMKo.jpg', 'German Shepherd', 'Picture of my dog while on vacation'),
	--((SELECT userID FROM users WHERE users.username='johanth'), 'images/ZgDNfiw5aOQ.jpg', 'Picture of forest', 'Picture taken while on a walk in the forest');