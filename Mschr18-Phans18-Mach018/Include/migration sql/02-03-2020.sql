DROP DATABASE IF EXISTS MSchr18_Phans18_Mach018;
CREATE DATABASE MSchr18_Phans18_Mach018;
USE MSchr18_Phans18_Mach018;

CREATE TABLE users (
	userid INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(10) NOT NULL,
    passw VARCHAR(30) NOT NULL,
    fullname VARCHAR(100) NOT NULL,
    phone VARCHAR(25) NOT NULL,
    email VARCHAR(320) NOT NULL,
    PRIMARY KEY (userid)
);

# 03-03-2020
ALTER TABLE `MSchr18_Phans18_Mach018`.`users` 
ADD UNIQUE INDEX `username_UNIQUE` (`username` ASC) VISIBLE;

# 04-03-2020
ALTER TABLE `MSchr18_Phans18_Mach018`.`users` 
CHANGE COLUMN `passw` `passw` VARCHAR(255) NOT NULL ;

# 04-03-2020
ALTER TABLE `MSchr18_Phans18_Mach018`.`users` 
ADD COLUMN `signup` DATE NOT NULL AFTER `email`;

# 04-03-2020
CREATE TABLE picture (
	picid INT NOT NULL AUTO_INCREMENT,
    userid INT NOT NULL,
    uploaddate DATE NOT NULL,
    imagename VARCHAR(200) NOT NULL,
    imagebase64 BLOB NOT NULL,
    PRIMARY KEY (picid),
    FOREIGN KEY (userid) REFERENCES users(userid)
);

# 08-03-2020
DROP TABLE picture;
CREATE TABLE picture (
	picid INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(10) NOT NULL,
    uploaddate DATE NOT NULL,
    imagename VARCHAR(200) NOT NULL,
    imagebase64 LONGTEXT NOT NULL,
    PRIMARY KEY (picid),
    FOREIGN KEY (username) REFERENCES users(username)
);

# 09-03-2020
ALTER TABLE `MSchr18_Phans18_Mach018`.`picture` 
ADD COLUMN `titel` VARCHAR(20) NOT NULL AFTER `username`;
ALTER TABLE `MSchr18_Phans18_Mach018`.`picture` 
ADD COLUMN `description` VARCHAR(240) NOT NULL AFTER `titel`;

# 09-03-2020
-- Adding admin user with username: "admin", and password: "Administrator1!"
INSERT INTO users (username, passw, fullname, phone, email, signup) VALUES
('admin', '$2y$10$bl48UKL80MWqPTZxu7Fc6OOclpCz/X1gf6ZZa/5/Sf5YGC3kDbOJm', 'Mr. Administrator', '+1234567890', 'admin@mail.dk', NOW());

-- Vi havde problem med at forbinde til databsen indtil vi kørte følgende
# ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'password'; 
-- Hvor password er det password du vil bruge til db'en.