DROP DATABASE IF EXISTS siped18_timch15;
CREATE DATABASE siped18_timch15;
USE siped18_timch15;

CREATE TABLE user (
    firstname VARCHAR(255),
    lastname VARCHAR(255),
	username VARCHAR(255),
    email VARCHAR(255),
	password VARCHAR(255) NOT NULL
);

CREATE TABLE picture (
	id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    image VARCHAR(255),
	FOREIGN KEY (name) REFERENCES USER(username) 
);

