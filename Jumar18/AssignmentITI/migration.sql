DROP DATABASE IF EXISTS jumar18_micpe18_mihen13;
CREATE DATABASE jumar18_micpe18_mihen13;
USE jumar18_micpe18_mihen13;

CREATE TABLE user (
  ID int NOT NULL AUTO_INCREMENT,
  Username varchar(255) NOT NULL UNIQUE,
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