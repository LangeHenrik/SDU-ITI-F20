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
  Mime varchar(255) NOT NULL,
  Image varchar(255) NOT NULL,
  Data longblob NOT NULL,
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
  Image varchar(255) NOT NULL,
  LoginID int NOT NULL,
  PRIMARY KEY (ID),
  FOREIGN KEY (LoginID) REFERENCES user(ID)
);

INSERT INTO user (ID, Username, Email, Password) VALUES
(1, 'ItIsMeMcNugget', 'Mc@Nugget.com', '$2y$10$g7lMhHlN/kXWwGvMDGAATepoIEj3ivbiHli47KUVZV5lnPDZuUIOi'),
(2, 'Juli', 'Jull@mail.com', '$2y$10$cAhCrkFQsRJFqk5VW2EirefQCa4QHeaK2HM.w0jfuuZZ4frGquC6.'),
(3, 'Teses', 'Tester@test.dk', '$2y$10$OppKmLp7W.LkufCNsZEKbecBQNB931KgkKhXqrlTr6tD8/TXdpIbu'),
(4, 'admin', 'admin@admin.com', '$2y$10$EwRHNFBVGmKzIXagmqzwpuUIYNnBf14G5O3jLcJ17A3tF74RrvyYu');

INSERT INTO userinfo (ID, Name, BDate, Image, LoginID) VALUES
(1, 'McNugget', '1999-06-04 00:00:00', 'batman.png', '1'),
(2, 'JulieM', '1997-01-01 00:00:00', 'batmans.png', '2'),
(3, 'Tester Test', '1997-06-22 00:00:00', 'wall.jpg', '3'),
(4, 'Admin', '2020-04-26 00:00:00', 'wall.jpg', '4');