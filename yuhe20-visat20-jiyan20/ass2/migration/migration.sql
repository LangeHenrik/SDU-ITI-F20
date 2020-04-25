DROP DATABASE IF EXISTS ass1;
CREATE DATABASE ass1;
USE ass1;

CREATE TABLE users
(
 userid INT auto_increment primary key,
 username varchar(50) not null,
 email varchar(100) not null,
 pwd varchar(100) not null
);

CREATE TABLE images
(
imageid INT auto_increment primary key,
header varchar(100) not null,
description varchar(450) not null,
username varchar(50) not null,
image longblob not null
);

INSERT INTO users (username, email, pwd)
VALUES ('username', 'email@mail.com', 'password');