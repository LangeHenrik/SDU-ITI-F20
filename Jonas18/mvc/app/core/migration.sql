DROP DATABASE IF EXISTS jonas18;
CREATE DATABASE jonas18;
USE jonas18;
DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS image;

create table user(
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    username varchar(25) NOT NULL,
    email varchar(50) not null,
    password varchar(255) not null
);

CREATE TABLE image(
    image_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    title VARCHAR(25),
    image MEDIUMBLOB NOT NULL,
    description VARCHAR(150),
    FOREIGN KEY(user_id) REFERENCES user(user_id)
);


