/* Making a migration.sql file*/
DROP DATABASE IF EXISTS kaseb18frhaa18;
Create DATABASE kaseb18frhaa18;
USE kaseb18frhaa18;

CREATE TABLE user (
    user_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL, 
    username VARCHAR(20) NOT NULL UNIQUE,
    password VARCHAR(1000) NOT NULL
);

CREATE TABLE picture (
   image_id INT UNSIGNED AUTO_INCREMENT,
	image LONGBLOB NOT NULL,
	title VARCHAR(25) NOT NULL, 
	description VARCHAR(250) NOT NULL,
	user_id int UNSIGNED,
	PRIMARY KEY (image_id),
   FOREIGN KEY (user_id) REFERENCES user(user_id)
);
