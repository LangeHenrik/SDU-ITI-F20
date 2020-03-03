DROP DATABASE IF EXIST kivin18;

CREATE DATABASE kivin18;

USE DATABASE kivin18;

CREATE TABLE user(
    user VARCHAR(15) NOT NULL,
    pw_hashed TEXT NOT NULL,
    join_date DATETIME
);

CREATE TABLE image(
    image_id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    image_path VARCHAR(255),
    header varchar(50),
    description text,
    upload_date DATETIME
);