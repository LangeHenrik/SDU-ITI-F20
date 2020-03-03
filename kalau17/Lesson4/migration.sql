DROP DATABASE IF EXISTS Library;
CREATE DATABASE Library;
USE Library;

CREATE TABLE Author(
  Author_Id int auto_increment,
Author_name char(100) not null,
Book_title char(100) not null unique,
constraint table_name_pk
  primary key (Author_Id)
);


create table Publisher
(
	Publisher_id int auto_increment,
	Publisher_Name char(100) not null unique,
	Publisher_country char(100) not null,
	constraint Publisher_pk
		primary key (Publisher_id)

);

create unique index Publisher_Publisher_Name_uindex
	on Publisher (Publisher_Name);

create table Book
(
	Book_id int auto_increment,
	Book_title char(100) not null unique ,
	Book_description char(250) not null,
  Book_publisher char(100) not null unique,
	constraint Book_pk
		primary key (Book_id),
	constraint Book_Author_Author_title_fk
		foreign key (Book_title) references Author (Book_title),
    constraint Book_publisher_Publisher_Name_fk
  		foreign key (Book_publisher) references Publisher (Publisher_Name)
);
