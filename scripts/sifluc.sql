-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 22, 2016 at 11:09 PM
-- Server version: 5.5.53-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sifluc`
--

-- --------------------------------------------------------

--
-- Table structure for table `mov_entradas`
--

CREATE TABLE IF NOT EXISTS `mov_entradas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `valor` double NOT NULL,
  `comentario` text,
  `cliente` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `mov_entradas`
--

INSERT INTO `mov_entradas` (`id`, `data`, `valor`, `comentario`, `cliente`) VALUES
(1, '2016-11-19 10:54:00', 140, '', 'Bruno'),
(2, '2016-11-21 23:17:10', 100, '', 'Alexandre'),
(3, '2016-11-16 12:45:00', 750.2, '', 'Alexandre'),
(4, '2016-11-21 11:25:00', 75, 'Duas camisas', 'Maria');

-- --------------------------------------------------------

--
-- Table structure for table `mov_saidas`
--

CREATE TABLE IF NOT EXISTS `mov_saidas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `valor` double NOT NULL,
  `comentario` text,
  `fornecedor` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `mov_saidas`
--

INSERT INTO `mov_saidas` (`id`, `data`, `valor`, `comentario`, `fornecedor`) VALUES
(1, '2016-11-19 10:24:00', 100, '', 'Bruno'),
(2, '2016-11-19 10:24:00', 120, '', 'Bruno'),
(3, '2016-11-19 10:25:00', 10.4, '', 'Bruno'),
(4, '2016-11-20 03:25:00', 4.5, '', 'Bruno'),
(5, '2016-11-21 23:22:00', 25, '', 'Alexandre'),
(6, '2016-11-15 11:25:00', 200.1, 'Compra de pães', 'Alexandre'),
(7, '2016-11-22 11:32:12', 120, '', 'Carlos'),
(8, '2016-11-23 01:02:53', 500, 'Compra de café', 'Diego');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
