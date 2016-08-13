-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jul 29, 2014 at 07:13 AM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `baseball`
--

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `player` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE `stats` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `playerid` int(5) NOT NULL,
  `YR` year(4) NOT NULL,
  `GP` int(5) NOT NULL,
  `AB` int(5) NOT NULL,
  `R` int(5) NOT NULL,
  `H` int(5) NOT NULL,
  `HR` int(5) NOT NULL,
  `RBI` int(5) NOT NULL,
  `Salary` decimal(12,2) NOT NULL,
  `Bio` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;