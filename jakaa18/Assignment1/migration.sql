DROP DATABASE IF EXISTS jakaa18_jesha18;

CREATE DATABASE jakaa18_jesha18;

USE jakaa18_jesha18;
CREATE TABLE users
(
    user_id int primary key AUTO_INCREMENT,
    username VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(100) NOT NULL

);

CREATE TABLE pictures
(
    pic_id int AUTO_INCREMENT primary key,
    header VARCHAR(100) NOT NULL,
    description VARCHAR(300) NOT NULL,
    user VARCHAR(100) NOT NULL,
    picture longblob NOT NULL
);
