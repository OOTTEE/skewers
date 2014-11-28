-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Xerado en: 27 de Nov de 2014 ás 11:31
-- Versión do servidor: 5.5.40-0ubuntu0.14.04.1
-- Versión do PHP: 5.5.9-1ubuntu4.5

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `skewersDB`
--

-- --------------------------------------------------------

--
-- Estrutura da táboa `asignaciones`
--

DROP TABLE IF EXISTS `asignaciones`;
CREATE TABLE IF NOT EXISTS `asignaciones` (
  `pincho_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`pincho_id`,`usuario_id`),
  KEY `fk_pinchos_has_usuarios_usuarios1_idx` (`usuario_id`),
  KEY `fk_pinchos_has_usuarios_pinchos1_idx` (`pincho_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da táboa `codigos`
--

DROP TABLE IF EXISTS `codigos`;
CREATE TABLE IF NOT EXISTS `codigos` (
  `codigo_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pincho_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`codigo_id`),
  KEY `fk_codigos_pinchos1_idx` (`pincho_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da táboa `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE IF NOT EXISTS `comentarios` (
  `usuario_id` int(11) NOT NULL,
  `pincho_id` int(11) unsigned NOT NULL,
  `comentario` varchar(300) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`usuario_id`,`pincho_id`),
  KEY `fk_comentarios_pinchos1_idx` (`pincho_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da táboa `configuracion`
--

DROP TABLE IF EXISTS `configuracion`;
CREATE TABLE IF NOT EXISTS `configuracion` (
  `logo` varchar(250) COLLATE utf8_bin NOT NULL,
  `nombre` varchar(250) COLLATE utf8_bin NOT NULL,
  `Decripcion` mediumtext COLLATE utf8_bin NOT NULL,
  `imagen` varchar(250) COLLATE utf8_bin NOT NULL,
  `f_incio` date NOT NULL,
  `f_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da táboa `establecimientos`
--

DROP TABLE IF EXISTS `establecimientos`;
CREATE TABLE IF NOT EXISTS `establecimientos` (
  `usuario_id` int(11) NOT NULL,
  `imagen` text COLLATE utf8_bin,
  `horario` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `descripcion` mediumtext COLLATE utf8_bin,
  `web` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `direccion` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da táboa `pinchos`
--

DROP TABLE IF EXISTS `pinchos`;
CREATE TABLE IF NOT EXISTS `pinchos` (
  `pincho_id` int(11) unsigned NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `ingredientes` varchar(45) COLLATE utf8_bin NOT NULL,
  `nombre` varchar(150) COLLATE utf8_bin NOT NULL,
  `precio` decimal(4,2) NOT NULL,
  `finalista` tinyint(1) NOT NULL DEFAULT '0',
  `imagen` varchar(250) COLLATE utf8_bin NOT NULL,
  `descripcion` mediumtext COLLATE utf8_bin NOT NULL,
  `validado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pincho_id`),
  KEY `fk_pinchos_establecimientos1_idx` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da táboa `puntuacion_finalistas`
--

DROP TABLE IF EXISTS `puntuacion_finalistas`;
CREATE TABLE IF NOT EXISTS `puntuacion_finalistas` (
  `usuario_id` int(11) NOT NULL,
  `pincho_id` int(11) unsigned NOT NULL,
  `nota` int(4) NOT NULL,
  PRIMARY KEY (`usuario_id`,`pincho_id`),
  KEY `fk_profesional_jurados_has_pinchos_pinchos1_idx` (`pincho_id`),
  KEY `fk_puntuacion_finalistas_usuarios1_idx` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da táboa `puntuacion_ganadores`
--

DROP TABLE IF EXISTS `puntuacion_ganadores`;
CREATE TABLE IF NOT EXISTS `puntuacion_ganadores` (
  `usuario_id` int(11) NOT NULL,
  `pincho_id` int(11) unsigned NOT NULL,
  `nota` int(4) NOT NULL,
  PRIMARY KEY (`usuario_id`,`pincho_id`),
  KEY `fk_puntuacion_ganadores_usuarios1_idx` (`usuario_id`),
  KEY `fk_puntuacion_ganadores_pinchos1_idx` (`pincho_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da táboa `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_bin NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(250) COLLATE utf8_bin NOT NULL,
  `role` varchar(16) COLLATE utf8_bin NOT NULL,
  `phone` varchar(13) COLLATE utf8_bin NOT NULL,
  `email` varchar(250) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`usuario_id`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=40 ;

-- --------------------------------------------------------

--
-- Estrutura da táboa `votos`
--

DROP TABLE IF EXISTS `votos`;
CREATE TABLE IF NOT EXISTS `votos` (
  `codigo_id` int(10) unsigned NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `me_gusta` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo_id`,`usuario_id`),
  KEY `fk_votos_usuarios1_idx` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Restricións para os envorcados das táboas
--

--
-- Restricións para a táboa `asignaciones`
--
ALTER TABLE `asignaciones`
  ADD CONSTRAINT `fk_pinchos_has_usuarios_pinchos1` FOREIGN KEY (`pincho_id`) REFERENCES `pinchos` (`pincho_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pinchos_has_usuarios_usuarios1` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restricións para a táboa `codigos`
--
ALTER TABLE `codigos`
  ADD CONSTRAINT `fk_codigos_pinchos1` FOREIGN KEY (`pincho_id`) REFERENCES `pinchos` (`pincho_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restricións para a táboa `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `fk_comentarios_pinchos1` FOREIGN KEY (`pincho_id`) REFERENCES `pinchos` (`pincho_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comentarios_usuarios1` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restricións para a táboa `establecimientos`
--
ALTER TABLE `establecimientos`
  ADD CONSTRAINT `fk_establecimientos_usuarios1` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restricións para a táboa `pinchos`
--
ALTER TABLE `pinchos`
  ADD CONSTRAINT `fk_pinchos_establecimientos1` FOREIGN KEY (`usuario_id`) REFERENCES `establecimientos` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restricións para a táboa `puntuacion_finalistas`
--
ALTER TABLE `puntuacion_finalistas`
  ADD CONSTRAINT `fk_profesional_jurados_has_pinchos_pinchos1` FOREIGN KEY (`pincho_id`) REFERENCES `pinchos` (`pincho_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_puntuacion_finalistas_usuarios1` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restricións para a táboa `puntuacion_ganadores`
--
ALTER TABLE `puntuacion_ganadores`
  ADD CONSTRAINT `fk_puntuacion_ganadores_pinchos1` FOREIGN KEY (`pincho_id`) REFERENCES `pinchos` (`pincho_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_puntuacion_ganadores_usuarios1` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restricións para a táboa `votos`
--
ALTER TABLE `votos`
  ADD CONSTRAINT `fk_votos_codigos1` FOREIGN KEY (`codigo_id`) REFERENCES `codigos` (`codigo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_votos_usuarios1` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


SET FOREIGN_KEY_CHECKS=1;