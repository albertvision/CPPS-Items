-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Време на генериране: 
-- Версия на сървъра: 5.5.16
-- Версия на PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данни: `items`
--
CREATE DATABASE `items` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `items`;

--
-- Структура на таблица `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(12) NOT NULL,
  `cost` int(10) NOT NULL,
  `is_member` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;