DROP DATABASE IF EXISTS rayou18_kalau17_jlaur13;
CREATE DATABASE rayou18_kalau17_jlaur13;
USE rayou18_kalau17_jlaur13;

CREATE TABLE user(
  user_id int auto_increment,
	username char(50) not null unique ,
	password char(255) not null,
	constraint user_pk
		primary key (user_id)
);

CREATE TABLE picture(
  picture_id int auto_increment,
	user char(50) not null,
	header char(50) not null,
	description char(255) not null,
	picture LONGBLOB not null,
	constraint picture_pk
		primary key (picture_id),
	constraint picture_username_fk
		foreign key (user) references user(username)
);

INSERT INTO user (username, password) VALUE ('JohnDoe' , '$2y$10$Ug4gEVoQhXTZ4Xzg7vSkX./JsJJnMelWIYiaCcm5UAGX.elMNeIOe');
