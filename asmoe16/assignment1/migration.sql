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

DROP USER IF EXISTS asmoe16@localhost;
CREATE USER asmoe16@localhost IDENTIFIED BY '123';
GRANT ALL PRIVILEGES ON member TO asmoe16@localhost;
GRANT ALL PRIVILEGES ON image TO asmoe16@localhost;
FLUSH PRIVILEGES;

INSERT INTO member (username,password) VALUES ('user1','123');
INSERT INTO member (username,password) VALUES ('user2','123');
INSERT INTO member (username,password) VALUES ('user3','123');
INSERT INTO member (username,password) VALUES ('user4','123');
INSERT INTO member (username,password) VALUES ('user5','123');
INSERT INTO member (username,password) VALUES ('user6','123');
INSERT INTO member (username,password) VALUES ('user7','123');
INSERT INTO member (username,password) VALUES ('user8','123');
INSERT INTO member (username,password) VALUES ('user9','123');

#Show table
SELECT * FROM member;
