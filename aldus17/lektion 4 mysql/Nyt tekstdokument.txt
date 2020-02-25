DROP DATABASE systemName;
CREATE DATABASE systemName;
USE systemName;

CREATE TABLE author (
	author_id INT UNSIGNED AUTO INCREMENT PRIMARY KEY,
name varchar(100);
title varchar(100);
);

CREATE TABLE book (
	book_id INT_UNSIGNED AUTO_INCREMENT PRIMARY KEY;
	title varchar(100);
	year char(4);
);

CREATE TABLE author_book (
	book_id INT UNSIGNED,
	author_id INT UNSIGNED
);