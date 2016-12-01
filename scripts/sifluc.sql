-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 01, 2016 at 08:35 PM
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
  `cliente` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `mov_entradas`
--

INSERT INTO `mov_entradas` (`id`, `data`, `valor`, `comentario`, `cliente`) VALUES
(1, '2016-12-01 22:23:10', 100, 'nada', 1),
(2, '2016-12-01 22:23:16', 404.5, 'Livros', 3),
(3, '2016-12-01 22:26:41', 300, '', 2),
(4, '2016-12-01 22:34:10', 128.9, '', 1),
(5, '2016-12-01 22:34:16', 100, '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `mov_saidas`
--

CREATE TABLE IF NOT EXISTS `mov_saidas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `valor` double NOT NULL,
  `comentario` text,
  `fornecedor` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mov_saidas`
--

INSERT INTO `mov_saidas` (`id`, `data`, `valor`, `comentario`, `fornecedor`) VALUES
(1, '2016-12-01 22:23:22', 99.9, '', 2),
(2, '2016-12-01 22:26:47', 1000, 'saida', 4),
(3, '2016-12-01 22:34:38', 35, '', 5);

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
(1, 'Bruno', 'Bruno', 'Fisica', '012.832.312-31', '(32)98451-1233', 'bruno@gmail.com', '08.465-312', 'Rua Quarenta e Sete', '275/301', 'Jardim São Paulo(Zona Leste)', 'São Paulo', 'SP'),
(2, 'Padaria e Mercearia Pio XII Ltda', 'Padaria Pio XII', 'Juridica', '00.001.111/1111-1', '(32)33671-494', 'padaria@gmail.com', '', '', '', '', '', ''),
(3, 'Maria Martha', 'Martinha', 'Fisica', '192.146.234-98', '(32)99912-1314', 'maria.m@gmail.com', '36.200-010', 'Rua Teobaldo Tolendal', '312', 'Centro', 'Barbacena', 'MG'),
(4, 'Submarino Ltda', 'Submarino', 'Juridica', '12.321.312/3123-1', '(11)22211-111', 'submarino@gmail.com', '36.080-080', 'Rua Coronel Vidal', '80', 'Mariano Procópio', 'Juiz de Fora', 'MG'),
(5, 'Marcio', '', 'Fisica', '999.889.779-98', '(51)22222-222', 'marcio@gmail.com', '66.080-580', 'Vila Nazaré', '', 'Pedreira', 'Belém', 'PA');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
