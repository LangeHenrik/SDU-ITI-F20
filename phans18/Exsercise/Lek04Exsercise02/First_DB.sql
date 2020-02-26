DROP DATABASE IF EXISTS iti;
CREATE DATABASE  iti;
USE iti;
DROP TABLE IF EXISTS Auther;

CREATE TABLE Auther (
	Id INT PRIMARY KEY AUTO_INCREMENT,
    Auther_name VARCHAR(20) UNIQUE,
    Auther_title VARCHAR(30) NOT NULL
);

INSERT INTO Auther(Auther_name, Auther_title) VALUE ('Mr. Test 1', 'The Answer is 42');
INSERT INTO Auther(Auther_name, Auther_title) VALUE ('Mr. Test 2', 'Why the Answer is not 42');

SELECT * FROM Auther;
SELECT * FROM Auther WHERE Auther_title LIKE '%42%';



