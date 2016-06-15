-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2016 a las 23:09:07
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `couchinn`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hospedajes`
--

CREATE TABLE `hospedajes` (
  `id_hospedaje` int(11) NOT NULL,
  `nombre_hospedaje` text NOT NULL,
  `descripcion_hospedaje` text NOT NULL,
  `direccion_hospedaje` text NOT NULL,
  `capacidad_hospedaje` text NOT NULL,
  `nombre_tipo_hospedaje` text NOT NULL,
  `id_usuario` text NOT NULL,
  `comienzo` date NOT NULL,
  `finalizacion` date NOT NULL,
  `estado_hospedaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `hospedajes`
--
ALTER TABLE `hospedajes`
  ADD PRIMARY KEY (`id_hospedaje`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `hospedajes`
--
ALTER TABLE `hospedajes`
  MODIFY `id_hospedaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
