CREATE DATABASE IF NOT EXISTS assignment1;

USE assignment1;


CREATE TABLE IF NOT EXISTS users
(
    `user_id`     int(11)      NOT NULL AUTO_INCREMENT,
    username varchar(100) NOT NULL,
    password varchar(100) NOT NULL,
    email    varchar(100) NOT NULL,
    primary key (username),
    UNIQUE KEY `person_id` (`user_id`)

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;



CREATE TABLE IF NOT EXISTS images
(
    `id`          int(11)      NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name`        varchar(200) NOT NULL,
    `user`        varchar(200) NOT NULL,
    `description` varchar(200) NOT NULL,
    `header`      varchar(200) NOT NULL,
    `image`       longtext     NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

CREATE TABLE IF NOT EXISTS imagesblob
(
    `id`          int(11)      NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name`        varchar(200) NOT NULL,
    `user`        varchar(200) NOT NULL,
    `description` varchar(200) NOT NULL,
    `title`      varchar(200) NOT NULL,
    `image`       longtext     NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

insert into users (username, password, email)
values ('Test1', '1234', 'test@gmail.com');