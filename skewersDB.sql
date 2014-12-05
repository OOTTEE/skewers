-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-12-2014 a las 17:18:09
-- Versión del servidor: 5.5.40-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.5

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

--
-- Base de datos: `skewersDB`
--
CREATE DATABASE IF NOT EXISTS `skewersDB` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `skewersDB`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaciones`
--

DROP TABLE IF EXISTS `asignaciones`;
CREATE TABLE IF NOT EXISTS `asignaciones` (
  `pincho_id` int(11) unsigned NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`pincho_id`,`usuario_id`),
  KEY `fk_pinchos_has_usuarios_usuarios1_idx` (`usuario_id`),
  KEY `fk_pinchos_has_usuarios_pinchos1_idx` (`pincho_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
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
-- Estructura de tabla para la tabla `configuracion`
--

DROP TABLE IF EXISTS `configuracion`;
CREATE TABLE IF NOT EXISTS `configuracion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(250) COLLATE utf8_bin NOT NULL,
  `nombre` varchar(250) COLLATE utf8_bin NOT NULL,
  `descripcion` mediumtext COLLATE utf8_bin NOT NULL,
  `imagen` varchar(250) COLLATE utf8_bin NOT NULL,
  `f_inicio` date NOT NULL,
  `f_fin` date NOT NULL,
  `resultados` tinyint(1) NOT NULL DEFAULT '0',
  `votacionesFinalistas` tinyint(1) NOT NULL DEFAULT '0',
  `votacionesGanadores` tinyint(1) NOT NULL DEFAULT '0',
  `votacionesPopulares` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `logo`, `nombre`, `descripcion`, `imagen`, `f_inicio`, `f_fin`, `votacionesFinalistas`, `votacionesGanadores`, `votacionesPopulares`, `resultados`) VALUES
(1, 'pincho.jpg', '', '', 'portada.png', '2014-01-16', '2014-05-16', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `establecimientos`
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


--
-- Estructura de tabla para la tabla `pinchos`
--

DROP TABLE IF EXISTS `pinchos`;
CREATE TABLE IF NOT EXISTS `pinchos` (
  `pincho_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;


--
-- Estructura de tabla para la tabla `puntuacion_finalistas`
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
-- Estructura de tabla para la tabla `puntuacion_ganadores`
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
-- Estructura de tabla para la tabla `users`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=59 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`usuario_id`, `name`, `username`, `password`, `role`, `phone`, `email`) VALUES
(31, 'Administrador', 'administrador', 'ED6D3CDEBC0E7ACA', 'administrador', '600400013', 'establecimiento13@correo.es'),


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votos`
--

DROP TABLE IF EXISTS `votos`;
CREATE TABLE IF NOT EXISTS `votos` (
  `codigo_id` int(11) NOT NULL AUTO_INCREMENT,
  `pincho_id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `me_gusta` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  ADD CONSTRAINT `fk_pinchos_has_usuarios_pinchos1` FOREIGN KEY (`pincho_id`) REFERENCES `pinchos` (`pincho_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pinchos_has_usuarios_usuarios1` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `fk_comentarios_pinchos1` FOREIGN KEY (`pincho_id`) REFERENCES `pinchos` (`pincho_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comentarios_usuarios1` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `establecimientos`
--
ALTER TABLE `establecimientos`
  ADD CONSTRAINT `fk_establecimientos_usuarios1` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pinchos`
--
ALTER TABLE `pinchos`
  ADD CONSTRAINT `fk_pinchos_establecimientos1` FOREIGN KEY (`usuario_id`) REFERENCES `establecimientos` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `puntuacion_finalistas`
--
ALTER TABLE `puntuacion_finalistas`
  ADD CONSTRAINT `fk_profesional_jurados_has_pinchos_pinchos1` FOREIGN KEY (`pincho_id`) REFERENCES `pinchos` (`pincho_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_puntuacion_finalistas_usuarios1` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `puntuacion_ganadores`
--
ALTER TABLE `puntuacion_ganadores`
  ADD CONSTRAINT `fk_puntuacion_ganadores_pinchos1` FOREIGN KEY (`pincho_id`) REFERENCES `pinchos` (`pincho_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_puntuacion_ganadores_usuarios1` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
  
    
CREATE USER 'skewersUser'@'localhost' IDENTIFIED BY PASSWORD '*71248A3336655BC8B9FC6BD6B945A85399F765AF';

GRANT ALL PRIVILEGES ON * . * TO  'skewersUser'@'localhost' IDENTIFIED BY PASSWORD '*71248A3336655BC8B9FC6BD6B945A85399F765AF' WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;

GRANT ALL PRIVILEGES ON  `skewersDB` . * TO  'skewersUser'@'localhost'; 
  
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
