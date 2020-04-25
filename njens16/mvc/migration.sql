
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
    image_header varchar(100) NOT NULL,
    image_description varchar(512),
    image_data longblob NOT NULL,
    upload_user_id INT UNSIGNED NOT NULL,
    upload_time DATETIME DEFAULT CURRENT_TIMESTAMP 
);

CREATE USER "njens16"@"localhost" IDENTIFIED BY "mypassword";
GRANT ALL PRIVILEGES ON njens16 . * TO "njens16"@"localhost";
FLUSH PRIVILEGES;

use njens16;
INSERT INTO user(username, password) VALUES ("test", ENCRYPT("test"));
INSERT INTO user(username, password) VALUES ("test1", ENCRYPT("test"));
INSERT INTO user(username, password) VALUES ("test2", ENCRYPT("test"));
INSERT INTO user(username, password) VALUES ("test3", ENCRYPT("test"));
