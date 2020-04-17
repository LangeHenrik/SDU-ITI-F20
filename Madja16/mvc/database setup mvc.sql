CREATE DATABASE IF NOT EXISTS madja16;

USE madja16;

CREATE TABLE users (
user_id int (11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
username VARCHAR(255) UNIQUE NOT NULL,
user_password VARCHAR(255) NOT NULL
);

CREATE TABLE user_images (
image_id int (11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
image_description VARCHAR(255) NOT NULL,
image_header VARCHAR(255) NOT NULL,
image_blob BLOB NOT NULL,
image_owner VARCHAR(255) NOT NULL,

-- For testing purposes don't use foreign key when testing direct insertion
    CONSTRAINT fk_user_images_users
    FOREIGN KEY (image_owner) REFERENCES users (username)
    ON DELETE CASCADE
    ON UPDATE RESTRICT
);
