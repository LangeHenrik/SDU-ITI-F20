DROP DATABASE IF EXISTS jonas18;

CREATE DATABASE IF NOT EXISTS jonas18;

USE jonas18;

DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS image;

create table user (
userid int auto_increment, 
username VARCHAR(50) NOT NULL,
password VARCHAR(255) NOT NULL,
email VARCHAR(255) NOT NULL, 
Primary key (userid)
);

create table image (
    imageid INTEGER  auto_increment, 
    username VARCHAR(255), 
    header VARCHAR(255), 
    description VARCHAR(255), 
    image LONGBLOB, 
    PRIMARY KEY(imageid));
    
INSERT INTO users (username, password, email) VALUES ('jonas18', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'jonas18@student.sdu.dk');