DROP DATABASE IF EXISTS assignment1;
CREATE DATABASE assignment1;
USE assignment1;

CREATE TABLE user (
	user_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	username varchar(100),
    	password varchar(100)
);

CREATE TABLE image (
	image_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	image varchar(100),
	header varchar(100),
    	description varchar(400)
);

CREATE TABLE user_image (
    	user_id INT,
    	image_id INT
);

INSERT INTO user (username, password) VALUES
	('alfonso', '$2y$10$NfHlQKsL4B2ICC/QSxhLbulLBxo0epV/LHpIKM1hJlx8sRfhQYSyO'),
	('anazamora', '$2y$10$TjdwrPpf122h3TTvGENPguLD9RMHWZtsKl/M5/2oqYKxJQcKb2K1K'),
	('rito5', '$2y$10$E6ba0ZZa80CiqYNVSIOe9OAMRB8Ja1hf5TlO7Y5WDwI645JEFoBty'),
	('username10', '$2y$10$LNxU//LvLXK86Lps5g6d9uhYugO7z6YGoVPkMGZr84H.l22aTEOpW'),
	('paulette', '$2y$10$VNtXn.c424UNYBKK2fxxveXzMqh6WFn5xXwt9C1/T/zi5d4eRoxaS'),
	('gloria', '$2y$10$jRJZlW2ryNVhBSYs3IFQO.QHv2m3DxAgoNm2ZbDZ3onZnm0fYIKZq'),
	('alonso', '$2y$10$/ZdsvEImIrybdKLDWI4wHu7Hjx2LIrRurI6oMAKgkrpR59CT4W2M6');

INSERT INTO image (image, header, description) VALUES
	('user_images/imagen_alfonso.jpg', 'Dog', 'This is a dog.'),
	('user_images/image_rito.jpg', 'Koala', 'This image shows a koala.'),
	('user_images/image_username10.jpg', 'Panda bear', 'This is a panda bear.'),
	('user_images/paulette_img.jpg', 'Rabbit', 'There is a rabbit.'),
	('user_images/img_for_gloria.jpeg', 'Another dog', 'This image shows a dog.'),
	('user_images/alonso_dolphin.jpg', 'Dolphin', 'There is a dolphin.'),
	('user_images/cat_poli.jpg', 'Little cat', 'Here is a little cat.'),
	('user_images/cat_ana.jpg', 'Cat', 'There is a cat');
	
INSERT INTO user_image (user_id, image_id) VALUES
	(1, 1),
	(3, 2),
	(4, 3),
	(5, 4),
	(6, 5),
	(7, 6),
	(5, 7),
	(2, 8);