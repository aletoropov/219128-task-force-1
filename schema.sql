CREATE DATABASE `taskforce`;
USE `taskforce`;

CREATE TABLE `task` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` CHAR(255),
  `description` TEXT,
  PRIMARY KEY (`id`)
);

CREATE TABLE `user` (
  `id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `login` CHAR(255),
  `email` CHAR(255),
  `role` CHAR(255),
  PRIMARY KEY (`id`)
);
