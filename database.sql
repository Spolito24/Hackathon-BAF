-- Adminer 4.8.1 MySQL 8.0.32-0ubuntu0.22.04.2 dump
SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';
SET NAMES utf8mb4;
DROP DATABASE IF EXISTS `hackathon1`;
CREATE DATABASE `hackathon1`
/*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */
/*!80016 DEFAULT ENCRYPTION='N' */
;
USE `hackathon1`;
DROP TABLE IF EXISTS `destination`;
CREATE TABLE `destination` (
  `id` int NOT NULL AUTO_INCREMENT,
  `country` varchar(150) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `lat` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `long` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;
INSERT INTO `destination` (`id`, `country`, `city`, `lat`, `long`)
VALUES (
    1,
    'Groenland',
    'Narsarmijit',
    '60.005417',
    '-44.666359'
  ),
  (2, 'Botswana', 'Ghanzi', '-21.69785', '21.64581'),
  (3, 'Somalie', 'Hobyo', '5.351592', '48.524975'),
  (
    4,
    'Philippine',
    'Palawan',
    '11.350636',
    '119.461095'
  ),
  (
    5,
    'Bresil',
    'Missão Tunuí',
    '-68.14892',
    '1.4077399'
  );
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;
-- 2023-05-11 12:21:00