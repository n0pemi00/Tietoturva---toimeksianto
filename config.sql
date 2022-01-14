drop database if exists n0pemi00;
create database n0pemi00;

create table account (
    username varchar(50) not null,
    password varchar(150) not null,
    PRIMARY KEY (username)
);

create table info (
    username varchar(50) not null,
    address varchar(50),
    phone varchar(50),
    city varchar (50),
    zip varchar(50),
    foreign key (username) references account(username)
);