CREATE DATABASE IF NOT EXISTS kivin18 CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE kivin18;

CREATE TABLE user(
    username VARCHAR(50) NOT NULL,
    pw_hash TEXT NOT NULL,
    join_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (username)
);

CREATE TABLE image(
    image_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    image_path VARCHAR(255),
    header varchar(50),
    description TEXT,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (image_id)
);
