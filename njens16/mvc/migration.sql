DROP DATABASE IF EXISTS njens16;
CREATE DATABASE njens16;
USE njens16;
CREATE TABLE user(
    user_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    username varchar(100) NOT NULL,
    password varchar(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE image(
    image_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    title varchar(100) NOT NULL,
    description varchar(512),
    image LongBlob NOT NULL,
    upload_user_id INT UNSIGNED NOT NULL,
    upload_time DATETIME DEFAULT CURRENT_TIMESTAMP 
);

