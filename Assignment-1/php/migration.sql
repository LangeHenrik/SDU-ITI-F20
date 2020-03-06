DROP DATABASE IF EXISTS jumar18_micpe18_mihen13;
CREATE DATABASE jumar18_micpe18_mihen13;
USE jumar18_micpe18_mihen13;

CREATE TABLE user (
  ID int NOT NULL AUTO_INCREMENT,
  Username varchar(255) NOT NULL UNIQUE,
  Email varchar(255) NOT NULL UNIQUE,
  Password varchar(255) NOT NULL,
  PRIMARY KEY (ID)
);

CREATE TABLE picture (
  ID int NOT NULL AUTO_INCREMENT,
  Image longblob NOT NULL,
  Header varchar(255) NOT NULL,
  Description text NOT NULL,
  UserID int NOT NULL,
  PRIMARY KEY (ID),
  FOREIGN KEY (UserID) REFERENCES user(ID)
);

CREATE TABLE userinfo (
  ID int NOT NULL AUTO_INCREMENT,
  Name varchar(225) NOT NULL,
  BDate timestamp DEFAULT current_timestamp(),
  Image longblob NOT NULL,
  LoginID int NOT NULL,
  PRIMARY KEY (ID),
  FOREIGN KEY (LoginID) REFERENCES user(ID)
);

INSERT INTO user (ID, Username, Email, Password) VALUES
(1, 'ItIsMeMcNugget', 'Mc@Nugget.com', 'ZHM='),
(2, 'Juli', 'Jull@mail.com', 'NDc4'),
(3, 'Teses', 'Tester@test.dk', 'aGVlZWo=');

INSERT INTO userinfo (ID, Name, BDate, Image, LoginID) VALUES
(1, 'McNugget', '1999-06-04 00:00:00', '0x6261746D616E2E706E67', '1'),
(2, 'JulieM', '1997-01-01 00:00:00', '0x77616C6C2E6A7067', '2'),
(3, 'Tester Test', '1997-06-22 00:00:00', '0x6432467362484175616E426E', '3');

INSERT INTO picture (ID, Image, Header, Description, UserID) VALUES
(1, '0x6261746D616E2E706E67', 'This it it!', 'This is my jam.', '1'),
(2, '0x77616C6C2E6A7067', 'To my dear user', 'It is everyday that i sit here thinking about you.', '2'),
(3, '0x6432467362484175616E426E', 'Oh no the disaster', 'Do not see it, do not react, just keep scrolling and act normal.', '3');