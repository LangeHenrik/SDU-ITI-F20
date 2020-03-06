/* Making a migration.sql file*/
DROP DATABASE IF EXISTS kaseb18frhaa18;
Create DATABASE kaseb18frhaa18;
USE kaseb18frhaa18;

CREATE TABLE person (
    person_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL, 
    username VARCHAR(20) NOT NULL UNIQUE,
    passwordHash VARCHAR(1000) NOT NULL
);

CREATE TABLE feed (
   feed_id INT UNSIGNED AUTO_INCREMENT,
	photo LONGBLOB NOT NULL,
	head VARCHAR(25) NOT NULL, 
	description VARCHAR(250) NOT NULL,
	person_id int UNSIGNED,
	PRIMARY KEY (feed_id),
   FOREIGN KEY (person_id) REFERENCES person(person_id)
);
