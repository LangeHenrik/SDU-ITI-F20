DROP DATABASE if EXISTS whatever;
CREATE DATABASE whatever;
USE whatever;

CREATE TABLE author(
	author_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(20) NOT NULL,
	title VARCHAR(20) NOT NULL
);

CREATE TABLE book(
	book_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	title VARCHAR(20) NOT NULL
);

CREATE TABLE book_author(
	book_id INT UNIQUE,
	author_id INT,
	publisher_id INT
);

CREATE TABLE publisher(
	publisher_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(20) NOT NULL
);

INSERT INTO author (name, title) VALUES ('alex', 'what');
INSERT INTO author (name, title) VALUES ('bob', 'who');
INSERT INTO author (name, title) VALUES ('charlie', 'who');

INSERT INTO book (title) VALUES ('moby dick');
INSERT INTO book (title) VALUES ('great expectation');
INSERT INTO book (title) VALUES ('war and peace');

INSERT INTO publisher (NAME) VALUES ('publisher_a');
INSERT INTO publisher (NAME) VALUES ('publisher_b');
INSERT INTO publisher (NAME) VALUES ('publisher_c');

INSERT INTO book_author (book_id, author_id, publisher_id) VALUES (1, 1, 1);
INSERT INTO book_author (book_id, author_id, publisher_id) VALUES (2, 2, 2);
INSERT INTO book_author (book_id, author_id, publisher_id) VALUES (3, 3, 3);
