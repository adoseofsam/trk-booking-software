DROP DATABASE IF EXISTS bookDB;
CREATE DATABASE bookDB;
USE bookDB;


CREATE TABLE `bookinfo` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`firstname` varchar(255) NOT NULL,
	`lastname` varchar(255) NOT NULL,
	`email` varchar(255) NOT NULL UNIQUE,
	`address_` CHAR(255) NOT NULL,
	`phone` BIGINT(16),
	`equipment` varchar(255),
	`date_rent` CHAR(255),
	PRIMARY KEY (`id`)
);




INSERT into bookinfo (id, firstname, lastname, email, address_, phone, equipment, date_rent) 
VALUES(1,'Tom', 'Bill', 'admin@project2.com', 'test', 998-000-7686, 'trampoline','2020-12-3');

GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, INDEX, ALTER ON bookinfo.* TO 'admin'@'localhost' IDENTIFIED BY 'password123';
