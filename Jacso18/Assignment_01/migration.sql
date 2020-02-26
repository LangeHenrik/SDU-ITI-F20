DROP DATABASE IF EXISTS jacso18;
CREATE DATABASE jacso18;
USE jacso18;


Create TABLE users(
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    username varchar(100) NOT NULL,
    email varchar(100) not null,
    password varchar(100) not null
    );

CREATE TABLE posts(
    post_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    image MEDIUMBLOB NOT NULL,
    title VARCHAR(150) NOT NULL,
    comment VARCHAR(150) NOT NULL DEFAULT '',
    timestamp DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(user_id) REFERENCES users(user_id)
);
