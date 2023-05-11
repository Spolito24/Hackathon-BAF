-- Adminer 4.8.1 MySQL 8.0.32-0ubuntu0.22.04.2 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `hackathon1`;
CREATE DATABASE `hackathon1` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `hackathon1`;

DROP TABLE IF EXISTS `destination`;
CREATE TABLE `destination` (
  `id` int NOT NULL AUTO_INCREMENT,
  `country` varchar(150) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `lat` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `long` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `destination` (`id`, `country`, `city`, `lat`, `long`) VALUES
(1,	'France',	'Paris',	'48.8534',	'2.3488'),
(2,	'USA',	'New-York',	'40.7143',	'-74.006'),
(3,	'Japan',	'Tokyo',	'35.6895',	'139.6917'),
(4,	'Canada',	'Toronto',	'43.7001',	'-79.4163'),
(5,	'Brasil',	'Rio de Janeiro',	'-22.9028',	'-43.2075'),
(6,	'Thailand',	'Phuket',	'7.8906',	'98.3981'),
(7,	'Australia',	'Sydney',	'-33.8679',	'151.2073'),
(8,	'South Africa',	'Cape Town',	'-33.9258',	'18.4232'),
(9,	'Chili',	'Antofagasta',	'-24.2739',	'-69.4097');

-- 2023-05-11 12:21:00
