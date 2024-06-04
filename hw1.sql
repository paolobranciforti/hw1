create database hw1;
use hw1;



CREATE TABLE users (
    id integer primary key auto_increment,
    username varchar(16) not null unique,
    password varchar(255) not null,
    email varchar(255) not null unique,
    name varchar(255) not null,
    surname varchar(255) not null
) Engine = InnoDB;


CREATE TABLE gare (
    id integer,
    circuito VARCHAR(255),
    FOREIGN KEY (id) REFERENCES users(id)
);


CREATE TABLE songs (
    id integer primary key auto_increment,
    user_id integer not null,
    foreign key (user_id) references users(id),
    song_id varchar(255),
    content json
) Engine = InnoDB;