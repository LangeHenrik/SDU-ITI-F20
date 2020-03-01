DROP DATABASE IF EXISTS lektion04_book;
CREATE DATABASE lektion04_book;
USE lektion04_book;

CREATE TABLE author (
    author_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name varchar(100),
    title varchar(100)
);

CREATE TABLE book (
    book_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title varchar(100),
    year char(4)
);

CREATE TABLE author_book (
    book_id INT UNSIGNED,
    author_id INT UNSIGNED
);

INSERT INTO author (name, title) VALUES 
('author1', 'Mr.'),
('author2', 'Mr.'),
('author3', 'Mr.');

INSERT INTO book (title, year) VALUES 
('book1', '1999'),
('book2', '1993'),
('book3', '1993');

INSERT INTO author_book (book_id, author_id) VALUES 
(1, 2),
(2, 1),
(3, 2);