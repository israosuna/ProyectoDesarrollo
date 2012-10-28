-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 28, 2012 at 01:21 AM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ProyectoDesarrollo`
--

-- --------------------------------------------------------

--
-- Table structure for table `archivo_adjunto`
--

CREATE TABLE IF NOT EXISTS `archivo_adjunto` (
  `id_adjunto` int(11) NOT NULL AUTO_INCREMENT,
  `ruta_archivo` varchar(30) DEFAULT NULL,
  `extension` varchar(30) DEFAULT NULL,
  `nombre_archivo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_adjunto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `archivo_adjunto`
--


-- --------------------------------------------------------

--
-- Table structure for table `etiqueta`
--

CREATE TABLE IF NOT EXISTS `etiqueta` (
  `id_etiqueta` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_etiqueta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `etiqueta`
--


-- --------------------------------------------------------

--
-- Table structure for table `etiqueta_nota`
--

CREATE TABLE IF NOT EXISTS `etiqueta_nota` (
  `id_nota` int(11) NOT NULL,
  `id_etiqueta` int(11) NOT NULL,
  PRIMARY KEY (`id_nota`,`id_etiqueta`),
  KEY `id_etiqueta` (`id_etiqueta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `etiqueta_nota`
--


-- --------------------------------------------------------

--
-- Table structure for table `libreta`
--

CREATE TABLE IF NOT EXISTS `libreta` (
  `id_libreta` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_libreta`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `libreta`
--



-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE IF NOT EXISTS `nota` (
  `id_nota` int(11) NOT NULL AUTO_INCREMENT,
  `id_libreta` int(11) NOT NULL,
  `titulo` varchar(30) DEFAULT NULL,
  `contenido` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_nota`),
  KEY `id_libreta` (`id_libreta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `nota`
--


-- --------------------------------------------------------

--
-- Table structure for table `nota_adjunto`
--

CREATE TABLE IF NOT EXISTS `nota_adjunto` (
  `id_nota` int(11) NOT NULL,
  `id_adjunto` int(11) NOT NULL,
  PRIMARY KEY (`id_nota`,`id_adjunto`),
  KEY `id_adjunto` (`id_adjunto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota_adjunto`
--


-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `usuario` varchar(30) DEFAULT NULL,
  `clave` varchar(30) DEFAULT NULL,
  `usuario_dropbox` varchar(30) DEFAULT NULL,
  `password_dropbox` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `token` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `usuario`, `clave`, `usuario_dropbox`, `password_dropbox`, `email`, `token`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', NULL, NULL, 'admin@admin.com', NULL)
);
--
-- Constraints for dumped tables
--

--
-- Constraints for table `etiqueta_nota`
--
ALTER TABLE `etiqueta_nota`
  ADD CONSTRAINT `etiqueta_nota_ibfk_1` FOREIGN KEY (`id_etiqueta`) REFERENCES `etiqueta` (`id_etiqueta`),
  ADD CONSTRAINT `etiqueta_nota_ibfk_2` FOREIGN KEY (`id_nota`) REFERENCES `nota` (`id_nota`);

--
-- Constraints for table `libreta`
--
ALTER TABLE `libreta`
  ADD CONSTRAINT `libreta_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Constraints for table `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `nota_ibfk_1` FOREIGN KEY (`id_libreta`) REFERENCES `libreta` (`id_libreta`);

--
-- Constraints for table `nota_adjunto`
--
ALTER TABLE `nota_adjunto`
  ADD CONSTRAINT `nota_adjunto_ibfk_1` FOREIGN KEY (`id_nota`) REFERENCES `nota` (`id_nota`),
  ADD CONSTRAINT `nota_adjunto_ibfk_2` FOREIGN KEY (`id_adjunto`) REFERENCES `archivo_adjunto` (`id_adjunto`);
