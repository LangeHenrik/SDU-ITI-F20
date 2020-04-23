DROP DATABASE IF EXISTS user;
CREATE DATABASE user;
USE user

CREATE TABLE user (
    firstname VARCHAR(255),
    lastname VARCHAR(255),
	username VARCHAR(255),
    email VARCHAR(255),
	password VARCHAR(255) NOT NULL
);

CREATE TABLE images (
	id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    image VARCHAR(255),
	FOREIGN KEY (name) REFERENCES USER(username) 
);
