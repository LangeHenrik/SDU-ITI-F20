/* Making a migration.sql file*/
DROP DATABASE IF EXISTS kaseb18frhaa18;
Create DATABASE kaseb18frhaa18;
USE kaseb18frhaa18;

CREATE TABLE person (
    person_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL, 
    username VARCHAR(20) NOT NULL, 
    passwordHash VARCHAR(1000) NOT NULL
);

CREATE TABLE feed (
	photo BLOB NOT NULL,
	head VARCHAR(25) NOT NULL, 
	description VARCHAR(250) NOT NULL
);
