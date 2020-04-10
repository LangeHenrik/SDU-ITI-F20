CREATE DATABASE IF NOT EXISTS kivin18 CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE kivin18;

CREATE TABLE user(
    user_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    password TEXT NOT NULL,
    join_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (username)
);

CREATE TABLE image(
    image_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    image MEDIUMBLOB,
    header varchar(50),
    description TEXT,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);
