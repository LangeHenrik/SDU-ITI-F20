DROP DATABASE IF EXISTS Mschr18_Phans18_Mach018;
CREATE DATABASE Mschr18_Phans18_Mach018;
USE Mschr18_Phans18_Mach018;

CREATE TABLE user (
	userid INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(10) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    fullname VARCHAR(100) NOT NULL,
    phone VARCHAR(25) NOT NULL,
    email VARCHAR(320) NOT NULL,
    signup_date DATE NOT NULL,
    PRIMARY KEY (userid)
);

# 03-03-2020
-- ALTER TABLE `Mschr18_Phans18_Mach018`.`user` 
-- ADD UNIQUE INDEX `username_UNIQUE` (`username` ASC) VISIBLE;

# 04-03-2020
-- ALTER TABLE `Mschr18_Phans18_Mach018`.`user` 
-- CHANGE COLUMN `password` `password` VARCHAR(255) NOT NULL ;

# 04-03-2020
-- ALTER TABLE `Mschr18_Phans18_Mach018`.`user` 
-- ADD COLUMN `signup_date` DATE NOT NULL AFTER `email`;

# 04-03-2020
-- CREATE TABLE picture (
-- 		picid INT NOT NULL AUTO_INCREMENT,
-- 		userid INT NOT NULL,
--      uploaddate DATE NOT NULL,
--      imagename VARCHAR(200) NOT NULL,
--      imagebase64 BLOB NOT NULL,
--      PRIMARY KEY (picid),
--      FOREIGN KEY (userid) REFERENCES user(userid)
-- );

# 08-03-2020
DROP TABLE IF EXISTS picture;
CREATE TABLE picture (
	picid INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(10) NOT NULL,
    titel VARCHAR(20) NOT NULL,
    description VARCHAR(240) NOT NULL,
    uploaddate DATE NOT NULL,
    imagename VARCHAR(200) NOT NULL,
    imagebase64 LONGTEXT NOT NULL,
    PRIMARY KEY (picid),
    FOREIGN KEY (username) REFERENCES user(username) ON DELETE CASCADE
);

# 09-03-2020
-- ALTER TABLE `Mschr18_Phans18_Mach018`.`picture` 
-- ADD COLUMN `titel` VARCHAR(20) NOT NULL AFTER `username`;
-- ALTER TABLE `Mschr18_Phans18_Mach018`.`picture` 
-- ADD COLUMN `description` VARCHAR(240) NOT NULL AFTER `titel`;

# 09-03-2020
-- Adding admin user with username: admin , and password: Administrator1!
INSERT INTO user (username, password, fullname, phone, email, signup_date) VALUES
('admin', '$2y$10$bl48UKL80MWqPTZxu7Fc6OOclpCz/X1gf6ZZa/5/Sf5YGC3kDbOJm', 'Mr. Administrator', '+1234567890', 'admin@mail.dk', NOW()),
('mach018', '$2y$10$9D28DU3YiQhrluxeRZigCeb3g01oLb28eG98i/BsVfMCod3o1Rb/C', 'Mads Willum Christiansen', '+4512345678', 'mads.wc@mail.com', NOW());

-- Vi havde problem med at forbinde til databasen indtil vi kørte følgende
# ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'password'; 
-- Hvor password er det password du vil bruge til db'en.

CREATE TABLE chat (
	chatid INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(10) NOT NULL,
    picid INT NOT NULL,
    comment VARCHAR(240) NOT NULL,
    timestamp TIMESTAMP NOT NULL,
    PRIMARY KEY (chatid),
    FOREIGN KEY (username) REFERENCES user(username) ON DELETE CASCADE,
    FOREIGN KEY (picid) REFERENCES picture(picid) ON DELETE CASCADE
);