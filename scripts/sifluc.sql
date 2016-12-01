-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 01, 2016 at 07:19 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mov_entradas`
--

INSERT INTO `mov_entradas` (`id`, `data`, `valor`, `comentario`, `cliente`) VALUES
(1, '2016-12-01 00:56:37', 100, 'nada', 'maria.martha@gmail.com'),
(2, '2016-11-30 08:30:00', 404.5, 'Livros', 'submarino@gmail.com');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mov_saidas`
--

INSERT INTO `mov_saidas` (`id`, `data`, `valor`, `comentario`, `fornecedor`) VALUES
(1, '2016-12-01 01:32:38', 99.9, '', 'bferreira129@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pessoas`
--

CREATE TABLE IF NOT EXISTS `pessoas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `apelido` varchar(100) DEFAULT NULL,
  `tipo` set('Fisica','Juridica') DEFAULT NULL,
  `documento` varchar(17) DEFAULT NULL,
  `telefone` varchar(14) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `rua` varchar(100) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `documento` (`documento`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pessoas`
--

INSERT INTO `pessoas` (`id`, `nome`, `apelido`, `tipo`, `documento`, `telefone`, `email`, `cep`, `rua`, `numero`, `bairro`, `cidade`, `estado`) VALUES
(1, 'Bruno', 'Bruno', 'Fisica', '082.482.336-26', '(32)98451-3873', 'bferreira129@gmail.com', '36.080-580', 'Rua Luiz Balthazar Eberle', '275/301', 'Monte Castelo', 'Juiz de Fora', 'MG'),
(2, 'Padaria e Mercearia Pio XII Ltda', 'Padaria Pio XII', 'Juridica', '00.001.111/1111-1', '(32)33671-494', 'padaria@gmail.com', '', '', '', '', '', ''),
(3, 'Maria Martha', 'Martinha', 'Fisica', '192.146.234-98', '(32)99912-1314', 'maria.martha@gmail.com', '36.200-010', 'Rua Teobaldo Tolendal', '312', 'Centro', 'Barbacena', 'MG'),
(4, 'Submarino Ltda', 'Submarino', 'Juridica', '12.321.312/3123-1', '(11)22211-111', 'submarino@gmail.com', '36.080-080', 'Rua Coronel Vidal', '80', 'Mariano Procópio', 'Juiz de Fora', 'MG'),
(5, 'Marcio', '', 'Fisica', '999.889.779-98', '(51)22222-222', 'marcio@gmail.com', '66.080-580', 'Vila Nazaré', '', 'Pedreira', 'Belém', 'PA');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
