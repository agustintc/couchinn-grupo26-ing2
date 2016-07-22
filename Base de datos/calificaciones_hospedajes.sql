-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-07-2016 a las 04:38:16
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `couchinn`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones_hospedajes`
--

CREATE TABLE IF NOT EXISTS `calificaciones_hospedajes` (
  `id_calificaciones` int(11) NOT NULL,
  `hospedaje_calificado` int(11) NOT NULL,
  `valoracion` text NOT NULL,
  `comentario` text NOT NULL,
  `finalizacion` date NOT NULL,
  `email_calificador` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calificaciones_hospedajes`
--

INSERT INTO `calificaciones_hospedajes` (`id_calificaciones`, `hospedaje_calificado`, `valoracion`, `comentario`, `finalizacion`, `email_calificador`) VALUES
(1, 22, '3', 'adada', '2016-07-01', 'jorge@hotmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificaciones_hospedajes`
--
ALTER TABLE `calificaciones_hospedajes`
  ADD PRIMARY KEY (`id_calificaciones`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificaciones_hospedajes`
--
ALTER TABLE `calificaciones_hospedajes`
  MODIFY `id_calificaciones` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
