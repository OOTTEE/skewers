-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-12-2014 a las 14:03:40
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

INSERT INTO `configuracion` (`id`, `logo`, `nombre`, `descripcion`, `imagen`, `f_inicio`, `f_fin`, `votacionesFinalistas`, `votacionesGanadores`, `votacionesPopulares`) VALUES
(1, 'logo.png', 'Pinchos Ourense', 'Descripcion del concurso de Ourense', 'portada.png', '2014-01-01', '2014-01-01', 0, 0, 0);

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
(19, '/imagenes/establecimiento/establecimiento.jpg', '12:00 - 24:00', 'Exquisito pincho del establecimiento1', 'www.establecimiento1.com', 'direccion del establecimiento'),
(20, '/imagenes/establecimiento/establecimiento.jpg', '12:00 - 24:00', 'Exquisito pincho del establecimiento2', 'www.establecimiento2.com', 'direccion del establecimiento'),
(21, '/imagenes/establecimiento/establecimiento.jpg', '12:00 - 24:00', 'Exquisito pincho del establecimiento3', 'www.establecimiento3.com', 'direccion del establecimiento'),
(22, '/imagenes/establecimiento/establecimiento.jpg', '12:00 - 24:00', 'Exquisito pincho del establecimiento4', 'www.establecimiento4.com', 'direccion del establecimiento'),
(23, '/imagenes/establecimiento/establecimiento.jpg', '12:00 - 24:00', 'Exquisito pincho del establecimiento5', 'www.establecimiento5.com', 'direccion del establecimiento'),
(24, '/imagenes/establecimiento/establecimiento.jpg', '12:00 - 24:00', 'Exquisito pincho del establecimiento6', 'www.establecimiento6.com', 'direccion del establecimiento'),
(25, '/imagenes/establecimiento/establecimiento.jpg', '12:00 - 24:00', 'Exquisito pincho del establecimiento7', 'www.establecimiento7.com', 'direccion del establecimiento'),
(26, '/imagenes/establecimiento/establecimiento.jpg', '12:00 - 24:00', 'Exquisito pincho del establecimiento8', 'www.establecimiento8.com', 'direccion del establecimiento'),
(27, '/imagenes/establecimiento/establecimiento.jpg', '12:00 - 24:00', 'Exquisito pincho del establecimiento9', 'www.establecimiento9.com', 'direccion del establecimiento'),
(28, '/imagenes/establecimiento/establecimiento.jpg', '12:00 - 24:00', 'Exquisito pincho del establecimiento10', 'www.establecimiento10.com', 'direccion del establecimiento'),
(29, '/imagenes/establecimiento/establecimiento.jpg', '12:00 - 24:00', 'Exquisito pincho del establecimiento11', 'www.establecimiento11.com', 'direccion del establecimiento'),
(30, '/imagenes/establecimiento/establecimiento.jpg', '12:00 - 24:00', 'Exquisito pincho del establecimiento12', 'www.establecimiento12.com', 'direccion del establecimiento'),
(32, '/imagenes/establecimiento/establecimiento.jpg', '8:00 - 20:00', 'Cafeteria con buen ambiente y pinchos', 'http://cafeteriaEsei.com', 'Escuela de ingenieria informatica');

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
  UNIQUE KEY `usuario_id` (`usuario_id`),
  KEY `fk_pinchos_establecimientos1_idx` (`usuario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `pinchos`
--

INSERT INTO `pinchos` (`pincho_id`, `usuario_id`, `ingredientes`, `nombre`, `precio`, `finalista`, `imagen`, `descripcion`, `validado`) VALUES
(1, 32, 'sal, patatas, huevos', 'Pincho de tortilla', 0.85, 0, '/imagenes/pincho/32_P_pincho.jpg', 'Delicioso pincho de tortilla', 1),
(12, 20, 'concepto de zorza, sal, pimiento, pimenton, a', 'concepto de reduccion  Zorza ', 1.25, 0, '/imagenes/pincho/20_P_zorza gallega.jpg', '<h3>Delicioso pincho de zorza</h3>', 0),
(13, 21, 'Calamares fresco, ensalada, harina, sal', 'Calamares fritos', 1.00, 0, '/imagenes/pincho/21_P_pincho-de-calamares-encebollad.jpg', 'Un toque moderno al pincho de toda la vida', 1),
(17, 22, 'ternera, agua, verduras', 'sopa de ternera', 2.00, 0, '', 'Un delicioso crujiente de verduras, con sopa de terneras', 0),
(18, 23, 'Garbanzos, Cayos, de todo.', 'Cayos', 2.00, 0, '/imagenes/pincho/23_P_1558_producto_normal.jpg', 'Receta tradicional de cayos', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`usuario_id`, `name`, `username`, `password`, `role`, `phone`, `email`) VALUES
(1, 'Jurado Profesional 1', 'Jurado1', 'ED6D3CDEBC0E7ACA', 'profesional', '600600001', 'jurado1@correo.es'),
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
(31, 'Administrador', 'administrador', 'ED6D3CDEBC0E7ACA', 'administrador', '600400013', 'establecimiento13@correo.es'),
(32, 'Cafeteria de la Esei', 'camba', 'ED6D3CDEBC0E7ACA', 'establecimiento', '988453923', 'cafeteriaesei@gmail.com');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=351 ;

--
-- Volcado de datos para la tabla `votos`
--

INSERT INTO `votos` (`codigo_id`, `pincho_id`, `usuario_id`, `me_gusta`) VALUES
(1, 20, NULL, 0),
(2, 20, NULL, 0),
(3, 20, NULL, 0),
(4, 20, NULL, 0),
(5, 20, NULL, 0),
(6, 20, NULL, 0),
(7, 20, 12, 0),
(8, 20, 13, 0),
(9, 20, 14, 0),
(10, 20, 15, 0),
(11, 20, 16, 0),
(12, 20, 17, 0),
(13, 20, 18, 0),
(14, 20, NULL, 0),
(15, 20, NULL, 0),
(16, 20, NULL, 0),
(17, 20, NULL, 0),
(18, 20, NULL, 0),
(19, 20, NULL, 0),
(20, 20, NULL, 0),
(21, 20, NULL, 0),
(22, 20, NULL, 0),
(23, 20, NULL, 0),
(24, 20, NULL, 0),
(25, 20, NULL, 0),
(26, 20, NULL, 0),
(27, 20, NULL, 0),
(28, 20, NULL, 0),
(29, 20, NULL, 0),
(30, 20, NULL, 0),
(31, 20, NULL, 0),
(32, 20, NULL, 0),
(33, 20, NULL, 0),
(34, 20, NULL, 0),
(35, 20, NULL, 0),
(36, 20, NULL, 0),
(37, 20, NULL, 0),
(38, 20, NULL, 0),
(39, 20, NULL, 0),
(40, 20, NULL, 0),
(41, 20, NULL, 0),
(42, 20, NULL, 0),
(43, 20, NULL, 0),
(44, 20, 11, 0),
(45, 20, 11, 0),
(46, 20, NULL, 0),
(47, 20, 10, 0),
(48, 20, 9, 0),
(49, 20, 8, 0),
(50, 20, 7, 0),
(51, 21, 7, 0),
(52, 21, 8, 0),
(53, 21, 9, 0),
(54, 21, 10, 0),
(55, 21, 11, 0),
(56, 21, 11, 0),
(57, 21, 12, 0),
(58, 21, 13, 0),
(59, 21, 14, 0),
(60, 21, 15, 0),
(61, 21, 16, 0),
(62, 21, 17, 0),
(63, 21, 18, 0),
(64, 21, NULL, 0),
(65, 21, NULL, 0),
(66, 21, NULL, 0),
(67, 21, NULL, 0),
(68, 21, NULL, 0),
(69, 21, NULL, 0),
(70, 21, NULL, 0),
(71, 21, NULL, 0),
(72, 21, NULL, 0),
(73, 21, NULL, 0),
(74, 21, NULL, 0),
(75, 21, NULL, 0),
(76, 21, NULL, 0),
(77, 21, NULL, 0),
(78, 21, NULL, 0),
(79, 21, NULL, 0),
(80, 21, NULL, 0),
(81, 21, NULL, 0),
(82, 21, NULL, 0),
(83, 21, NULL, 0),
(84, 21, NULL, 0),
(85, 21, NULL, 0),
(86, 21, NULL, 0),
(87, 21, NULL, 0),
(88, 21, NULL, 0),
(89, 21, NULL, 0),
(90, 21, NULL, 0),
(91, 21, NULL, 0),
(92, 21, NULL, 0),
(93, 21, NULL, 0),
(94, 21, NULL, 0),
(95, 21, NULL, 0),
(96, 21, NULL, 0),
(97, 21, NULL, 0),
(98, 21, NULL, 0),
(99, 21, NULL, 0),
(100, 21, NULL, 0),
(101, 23, NULL, 0),
(102, 23, NULL, 0),
(103, 23, NULL, 0),
(104, 23, NULL, 0),
(105, 23, NULL, 0),
(106, 23, NULL, 0),
(107, 23, NULL, 0),
(108, 23, NULL, 0),
(109, 23, NULL, 0),
(110, 23, NULL, 0),
(111, 23, NULL, 0),
(112, 23, NULL, 0),
(113, 23, NULL, 0),
(114, 23, NULL, 0),
(115, 23, NULL, 0),
(116, 23, NULL, 0),
(117, 23, NULL, 0),
(118, 23, NULL, 0),
(119, 23, NULL, 0),
(120, 23, NULL, 0),
(121, 23, NULL, 0),
(122, 23, NULL, 0),
(123, 23, NULL, 0),
(124, 23, NULL, 0),
(125, 23, NULL, 0),
(126, 23, NULL, 0),
(127, 23, NULL, 0),
(128, 23, NULL, 0),
(129, 23, NULL, 0),
(130, 23, NULL, 0),
(131, 23, NULL, 0),
(132, 23, NULL, 0),
(133, 23, NULL, 0),
(134, 23, NULL, 0),
(135, 23, NULL, 0),
(136, 23, NULL, 0),
(137, 23, NULL, 0),
(138, 23, NULL, 0),
(139, 23, NULL, 0),
(140, 23, NULL, 0),
(141, 23, NULL, 0),
(142, 23, NULL, 0),
(143, 23, NULL, 0),
(144, 23, NULL, 0),
(145, 23, NULL, 0),
(146, 23, NULL, 0),
(147, 23, NULL, 0),
(148, 23, NULL, 0),
(149, 23, NULL, 0),
(150, 23, NULL, 0),
(151, 32, NULL, 0),
(152, 32, NULL, 0),
(153, 32, NULL, 0),
(154, 32, NULL, 0),
(155, 32, NULL, 0),
(156, 32, NULL, 0),
(157, 32, NULL, 0),
(158, 32, NULL, 0),
(159, 32, NULL, 0),
(160, 32, NULL, 0),
(161, 32, NULL, 0),
(162, 32, NULL, 0),
(163, 32, NULL, 0),
(164, 32, NULL, 0),
(165, 32, NULL, 0),
(166, 32, NULL, 0),
(167, 32, NULL, 0),
(168, 32, NULL, 0),
(169, 32, NULL, 0),
(170, 32, NULL, 0),
(171, 32, NULL, 0),
(172, 32, NULL, 0),
(173, 32, NULL, 0),
(174, 32, NULL, 0),
(175, 32, NULL, 0),
(176, 32, NULL, 0),
(177, 32, NULL, 0),
(178, 32, NULL, 0),
(179, 32, NULL, 0),
(180, 32, NULL, 0),
(181, 32, NULL, 0),
(182, 32, NULL, 0),
(183, 32, NULL, 0),
(184, 32, NULL, 0),
(185, 32, NULL, 0),
(186, 32, NULL, 0),
(187, 32, NULL, 0),
(188, 32, NULL, 0),
(189, 32, NULL, 0),
(190, 32, NULL, 0),
(191, 32, NULL, 0),
(192, 32, NULL, 0),
(193, 32, NULL, 0),
(194, 32, NULL, 0),
(195, 32, NULL, 0),
(196, 32, NULL, 0),
(197, 32, NULL, 0),
(198, 32, NULL, 0),
(199, 32, NULL, 0),
(200, 32, NULL, 0),
(201, 32, NULL, 0),
(202, 32, NULL, 0),
(203, 32, NULL, 0),
(204, 32, NULL, 0),
(205, 32, NULL, 0),
(206, 32, NULL, 0),
(207, 32, NULL, 0),
(208, 32, NULL, 0),
(209, 32, NULL, 0),
(210, 32, NULL, 0),
(211, 32, NULL, 0),
(212, 32, NULL, 0),
(213, 32, NULL, 0),
(214, 32, NULL, 0),
(215, 32, NULL, 0),
(216, 32, NULL, 0),
(217, 32, NULL, 0),
(218, 32, NULL, 0),
(219, 32, NULL, 0),
(220, 32, NULL, 0),
(221, 32, NULL, 0),
(222, 32, NULL, 0),
(223, 32, NULL, 0),
(224, 32, NULL, 0),
(225, 32, NULL, 0),
(226, 32, NULL, 0),
(227, 32, NULL, 0),
(228, 32, NULL, 0),
(229, 32, NULL, 0),
(230, 32, NULL, 0),
(231, 32, NULL, 0),
(232, 32, NULL, 0),
(233, 32, NULL, 0),
(234, 32, NULL, 0),
(235, 32, NULL, 0),
(236, 32, NULL, 0),
(237, 32, NULL, 0),
(238, 32, NULL, 0),
(239, 32, NULL, 0),
(240, 32, NULL, 0),
(241, 32, NULL, 0),
(242, 32, NULL, 0),
(243, 32, NULL, 0),
(244, 32, NULL, 0),
(245, 32, NULL, 0),
(246, 32, NULL, 0),
(247, 32, NULL, 0),
(248, 32, NULL, 0),
(249, 32, NULL, 0),
(250, 32, NULL, 0),
(251, 32, NULL, 0),
(252, 32, NULL, 0),
(253, 32, NULL, 0),
(254, 32, NULL, 0),
(255, 32, NULL, 0),
(256, 32, NULL, 0),
(257, 32, NULL, 0),
(258, 32, NULL, 0),
(259, 32, NULL, 0),
(260, 32, NULL, 0),
(261, 32, NULL, 0),
(262, 32, NULL, 0),
(263, 32, NULL, 0),
(264, 32, NULL, 0),
(265, 32, NULL, 0),
(266, 32, NULL, 0),
(267, 32, NULL, 0),
(268, 32, NULL, 0),
(269, 32, NULL, 0),
(270, 32, NULL, 0),
(271, 32, NULL, 0),
(272, 32, NULL, 0),
(273, 32, NULL, 0),
(274, 32, NULL, 0),
(275, 32, NULL, 0),
(276, 32, NULL, 0),
(277, 32, NULL, 0),
(278, 32, NULL, 0),
(279, 32, NULL, 0),
(280, 32, NULL, 0),
(281, 32, NULL, 0),
(282, 32, NULL, 0),
(283, 32, NULL, 0),
(284, 32, NULL, 0),
(285, 32, NULL, 0),
(286, 32, NULL, 0),
(287, 32, NULL, 0),
(288, 32, NULL, 0),
(289, 32, NULL, 0),
(290, 32, NULL, 0),
(291, 32, NULL, 0),
(292, 32, NULL, 0),
(293, 32, NULL, 0),
(294, 32, NULL, 0),
(295, 32, NULL, 0),
(296, 32, NULL, 0),
(297, 32, NULL, 0),
(298, 32, NULL, 0),
(299, 32, NULL, 0),
(300, 32, 7, 1),
(301, 32, 8, 1),
(302, 32, 9, 1),
(303, 32, 10, 1),
(304, 32, NULL, 0),
(305, 32, 11, 1),
(306, 32, 11, 1),
(307, 32, 12, 1),
(308, 32, 13, 1),
(309, 32, 14, 1),
(310, 32, 15, 1),
(311, 32, 16, 1),
(312, 32, 17, 1),
(313, 32, 18, 1),
(314, 32, NULL, 0),
(315, 32, NULL, 0),
(316, 32, NULL, 0),
(317, 32, NULL, 0),
(318, 32, NULL, 0),
(319, 32, NULL, 0),
(320, 32, NULL, 0),
(321, 32, NULL, 0),
(322, 32, NULL, 0),
(323, 32, NULL, 0),
(324, 32, NULL, 0),
(325, 32, NULL, 0),
(326, 32, NULL, 0),
(327, 32, NULL, 0),
(328, 32, NULL, 0),
(329, 32, NULL, 0),
(330, 32, NULL, 0),
(331, 32, NULL, 0),
(332, 32, NULL, 0),
(333, 32, NULL, 0),
(334, 32, NULL, 0),
(335, 32, NULL, 0),
(336, 32, NULL, 0),
(337, 32, NULL, 0),
(338, 32, NULL, 0),
(339, 32, NULL, 0),
(340, 32, NULL, 0),
(341, 32, NULL, 0),
(342, 32, NULL, 0),
(343, 32, NULL, 0),
(344, 32, NULL, 0),
(345, 32, NULL, 0),
(346, 32, NULL, 0),
(347, 32, NULL, 0),
(348, 32, NULL, 0),
(349, 32, NULL, 0),
(350, 32, NULL, 0);

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
