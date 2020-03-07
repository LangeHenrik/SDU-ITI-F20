DROP DATABASE IF EXISTS jarvis;
CREATE DATABASE jarvis;
USE jarvis;

CREATE TABLE member (
	user_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	username varchar(100) NOT NULL,
	password varchar(100) NOT NULL
);
ALTER TABLE member ADD INDEX (username);

CREATE TABLE image (
	image_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	owner_id INT UNSIGNED NOT NULL,
	FOREIGN KEY (owner_id) REFERENCES member(user_id),
	image_path varchar(140) NOT NULL,
	description varchar(140),
	header varchar(50)
);

DROP VIEW IF EXISTS user_image;
CREATE VIEW user_image
AS
SELECT image.image_path,image.header,image.description,member.username,image.owner_id
FROM
image INNER JOIN member ON image.owner_id = member.user_id;

DROP USER IF EXISTS asmoe16@localhost;
CREATE USER asmoe16@localhost IDENTIFIED BY '123';
GRANT ALL PRIVILEGES ON member TO asmoe16@localhost;
GRANT ALL PRIVILEGES ON image TO asmoe16@localhost;
GRANT ALL PRIVILEGES ON user_image TO asmoe16@localhost;
FLUSH PRIVILEGES;
