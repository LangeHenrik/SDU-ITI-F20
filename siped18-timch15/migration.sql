DROP DATABASE IF EXISTS siped18_timch15;
CREATE DATABASE siped18_timch15;
USE siped18_timch15;

CREATE TABLE user (
	user_id INT AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(255) UNIQUE,
	password VARCHAR(255) NOT NULL
);

CREATE TABLE picture (
	image_id INT AUTO_INCREMENT PRIMARY KEY,
	image MEDIUMTEXT NOT NULL,
	title VARCHAR(255) NOT NULL,
	description VARCHAR(255) NOT NULL,
	uploader VARCHAR(255) NOT NULL,
	FOREIGN KEY (uploader) REFERENCES USER(username) 
);

/* 
Username: jack 
Password: Password
*/
INSERT INTO user (username, password) VALUES ('jack', '$2y$10$PhYWugR5GZBvfc9VmBSsxev1FPAZz2fc2J44Hok0rCK0Og4sR4iZW');
INSERT INTO user (username, password) VALUES ('jane', '$2y$10$PhYWugR5GZBvfc9VmBSsxev1FPAZz2fc2J44Hok0rCK0Og4sR4iZW');
INSERT INTO user (username, password) VALUES ('joey', '$2y$10$PhYWugR5GZBvfc9VmBSsxev1FPAZz2fc2J44Hok0rCK0Og4sR4iZW');

INSERT INTO picture (image, title, description, uploader) VALUES (
'data:image/png;base64,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',
'My signature', 'I drew this signature in paint.', 'jack');