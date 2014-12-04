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
  `votacionesFinalistas` tinyint(1) NOT NULL DEFAULT '0',
  `votacionesGanadores` tinyint(1) NOT NULL DEFAULT '0',
  `votacionesPopulares` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `logo`, `nombre`, `descripcion`, `imagen`, `f_inicio`, `f_fin`, `votacionesFinalistas`, `votacionesGanadores`, `votacionesPopulares`) VALUES
(1, 'pincho.jpg', 'Pinchos Ourense 2015', '  <div class="row">\r\n			<div class="col-md-8">\r\n				Bienvenido al concurso de pinchos de <strong>Ourense</strong>, pruebe los pinchos que quiera y vote\r\n			</div>\r\n			<div class="col-md-4">\r\n				<strong>Del 4 al 17 de Noviembre</strong>\r\n			</div>\r\n		  </div>', 'portada.png', '2014-01-16', '2014-05-16', 1, 0, 0);

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
-- Volcado de datos para la tabla `establecimientos`
--

INSERT INTO `establecimientos` (`usuario_id`, `imagen`, `horario`, `descripcion`, `web`, `direccion`) VALUES
(19, 'establecimiento.png', '12:00 - 24:00', 'Exquisito pincho del establecimiento1', 'www.establecimiento1.com', 'direccion del establecimiento'),
(20, 'establecimiento.png', '12:00 - 24:00', 'Exquisito pincho del establecimiento2', 'www.establecimiento2.com', 'direccion del establecimiento'),
(21, 'establecimiento.png', '12:00 - 24:00', 'Exquisito pincho del establecimiento3', 'www.establecimiento3.com', 'direccion del establecimiento'),
(22, 'establecimiento.png', '12:00 - 24:00', 'Exquisito pincho del establecimiento4', 'www.establecimiento4.com', 'direccion del establecimiento'),
(23, 'establecimiento.png', '12:00 - 24:00', 'Exquisito pincho del establecimiento5', 'www.establecimiento5.com', 'direccion del establecimiento'),
(24, 'establecimiento.png', '12:00 - 24:00', 'Exquisito pincho del establecimiento6', 'www.establecimiento6.com', 'direccion del establecimiento'),
(25, 'establecimiento.png', '12:00 - 24:00', 'Exquisito pincho del establecimiento7', 'www.establecimiento7.com', 'direccion del establecimiento'),
(26, 'establecimiento.png', '12:00 - 24:00', 'Exquisito pincho del establecimiento8', 'www.establecimiento8.com', 'direccion del establecimiento'),
(27, 'establecimiento.png', '12:00 - 24:00', 'Exquisito pincho del establecimiento9', 'www.establecimiento9.com', 'direccion del establecimiento'),
(28, 'establecimiento.png', '12:00 - 24:00', 'Exquisito pincho del establecimiento10', 'www.establecimiento10.com', 'direccion del establecimiento'),
(29, 'establecimiento.png', '12:00 - 24:00', 'Exquisito pincho del establecimiento11', 'www.establecimiento11.com', 'direccion del establecimiento'),
(30, 'establecimiento.png', '12:00 - 24:00', 'Exquisito pincho del establecimiento12', 'www.establecimiento12.com', 'direccion del establecimiento'),
(41, ' ', '10.00', 'desc', NULL, NULL),
(58, '/imagenes/establecimiento/58pincho.jpg', '10:00 - 22:00', 'asdfasdfasfasdfasdf', 'http://www.asdfasasdfasdf.com', 'curros enriquez');

-- --------------------------------------------------------

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
-- Volcado de datos para la tabla `pinchos`
--

INSERT INTO `pinchos` (`pincho_id`, `usuario_id`, `ingredientes`, `nombre`, `precio`, `finalista`, `imagen`, `descripcion`, `validado`) VALUES
(2, 19, 'Patata, Huevos, Sal', 'Pincho de tortilla', 0.09, 0, '', 'Esos pinchos del camba', 0),
(3, 20, 'Calamares frescos, Harina, Huevo, Sal y el  s', 'Calamares fritos', 0.85, 0, '', 'Delicios calamares fritos', 0),
(4, 21, 'cerdo adobado', 'Zorza', 1.75, 0, '', 'esta bueno bueno', 0);

-- --------------------------------------------------------

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
(2, 'Jurado Profesional 2', 'Jurado2', 'ED6D3CDEBC0E7ACA', 'profesional', '600600002', 'jurado2@correo.es'),
(3, 'Jurado Profesional 3', 'Jurado3', 'ED6D3CDEBC0E7ACA', 'profesional', '600600003', 'jurado3@correo.es'),
(4, 'Jurado Profesional 4', 'Jurado4', 'ED6D3CDEBC0E7ACA', 'profesional', '600600004', 'jurado4@correo.es'),
(5, 'Jurado Profesional 5', 'Jurado5', 'ED6D3CDEBC0E7ACA', 'profesional', '600600005', 'jurado5@correo.es'),
(6, 'Jurado Profesional 6', 'Jurado6', 'ED6D3CDEBC0E7ACA', 'profesional', '600600006', 'jurado6@correo.es'),
(7, 'Jurado Popular 1', 'Popular1', 'ED6D3CDEBC0E7ACA', 'popular', '600500001', 'juradopopular1@correo.es'),
(8, 'Jurado Popular 2', 'Popular2', 'ED6D3CDEBC0E7ACA', 'popular', '600500002', 'juradopopular2@correo.es'),
(9, 'Jurado Popular 3', 'Popular3', 'ED6D3CDEBC0E7ACA', 'popular', '600500003', 'juradopopular3@correo.es'),
(10, 'Jurado Popular 4', 'Popular4', 'ED6D3CDEBC0E7ACA', 'popular', '600500004', 'juradopopular4@correo.es'),
(11, 'Jurado Popular 5', 'Popular5', 'ED6D3CDEBC0E7ACA', 'popular', '600500005', 'juradopopular5@correo.es'),
(12, 'Jurado Popular 6', 'Popular6', 'ED6D3CDEBC0E7ACA', 'popular', '600500006', 'juradopopular6@correo.es'),
(13, 'Jurado Popular 7', 'Popular7', 'ED6D3CDEBC0E7ACA', 'popular', '600500007', 'juradopopular7@correo.es'),
(14, 'Jurado Popular 8', 'Popular8', 'ED6D3CDEBC0E7ACA', 'popular', '600500008', 'juradopopular8@correo.es'),
(15, 'Jurado Popular 9', 'Popular9', 'ED6D3CDEBC0E7ACA', 'popular', '600500009', 'juradopopular9@correo.es'),
(16, 'Jurado Popular 10', 'Popular10', 'ED6D3CDEBC0E7ACA', 'popular', '600500010', 'juradopopular10@correo.es'),
(17, 'Jurado Popular 11', 'Popular11', 'ED6D3CDEBC0E7ACA', 'popular', '600500011', 'juradopopular11@correo.es'),
(18, 'Jurado Popular 12', 'Popular12', 'ED6D3CDEBC0E7ACA', 'popular', '600500012', 'juradopopular12@correo.es'),
(19, 'Establecimiento 1', 'Establecimiento1', 'ED6D3CDEBC0E7ACA', 'establecimiento', '600400001', 'establecimiento1@correo.es'),
(20, 'Establecimiento 2', 'Establecimiento2', 'ED6D3CDEBC0E7ACA', 'establecimiento', '600400002', 'establecimiento2@correo.es'),
(21, 'Establecimiento 3', 'Establecimiento3', 'ED6D3CDEBC0E7ACA', 'establecimiento', '600400003', 'establecimiento3@correo.es'),
(22, 'Establecimiento 4', 'Establecimiento4', 'ED6D3CDEBC0E7ACA', 'establecimiento', '600400004', 'establecimiento4@correo.es'),
(23, 'Establecimiento 5', 'Establecimiento5', 'ED6D3CDEBC0E7ACA', 'establecimiento', '600400005', 'establecimiento5@correo.es'),
(24, 'Establecimiento 6', 'Establecimiento6', 'ED6D3CDEBC0E7ACA', 'establecimiento', '600400006', 'establecimiento6@correo.es'),
(25, 'Establecimiento 7', 'Establecimiento7', 'ED6D3CDEBC0E7ACA', 'establecimiento', '600400007', 'establecimiento7@correo.es'),
(26, 'Establecimiento 8', 'Establecimiento8', 'ED6D3CDEBC0E7ACA', 'establecimiento', '600400008', 'establecimiento8@correo.es'),
(27, 'Establecimiento 9', 'Establecimiento9', 'ED6D3CDEBC0E7ACA', 'establecimiento', '600400009', 'establecimiento9@correo.es'),
(28, 'Establecimiento 10', 'Establecimiento10', 'ED6D3CDEBC0E7ACA', 'establecimiento', '600400010', 'establecimiento10@correo.es'),
(29, 'Establecimiento 11', 'Establecimiento11', 'ED6D3CDEBC0E7ACA', 'establecimiento', '600400011', 'establecimiento11@correo.es'),
(30, 'Establecimiento 12', 'Establecimiento12', 'ED6D3CDEBC0E7ACA', 'establecimiento', '600400012', 'establecimiento12@correo.es'),
(31, 'Administrador', 'administrador', 'ED6D3CDEBC0E7ACA', 'establecimiento', '600400013', 'establecimiento13@correo.es'),
(40, 'Javier Lorenzo Martin', 'admin', 'ED6D3CDEBC0E7ACA', 'administrador', '696514394', 'javier.ote.ote@gmail.com'),
(41, 'esta', 'esta', 'ED6D3CDEBC0E7ACA', 'establecimiento', '555555555', 'asdf'),
(46, 'asdfasfdas', 'adminadmin', 'ED6D3CDEBC0E7ACA', 'popular', '9999999999', 'asdf@asdf.com'),
(57, 'juanca', 'juanca', 'ED6D3CDEBC0E7ACA', 'popular', '1231234122', 'asdf@asdf.com3'),
(58, 'establecimiento juanca', 'juancaesta', 'ED6D3CDEBC0E7ACA', 'establecimiento', '134919391', 'juanca@miraesta.es');

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
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
