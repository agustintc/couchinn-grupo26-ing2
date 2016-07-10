-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-07-2016 a las 13:30:08
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

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
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id_reserva` int(11) NOT NULL,
  `comienzo` date NOT NULL,
  `finalizacion` date NOT NULL,
  `estado` int(11) NOT NULL,
  `id_huesped` text NOT NULL,
  `id_hospedaje` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `fecha_aceptado` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id_reserva`, `comienzo`, `finalizacion`, `estado`, `id_huesped`, `id_hospedaje`, `comentario`, `fecha_aceptado`) VALUES
(1, '2016-06-24', '2016-06-26', 0, 'rodrigo@hotmail.com', 24, ' ', '0000-00-00'),
(2, '2016-06-25', '2016-06-28', 0, 'jorge@hotmail.com', 24, ' ', '0000-00-00'),
(3, '2016-07-23', '2016-07-30', 0, 'jorge@hotmail.com', 24, ' ', '0000-00-00'),
(4, '2016-06-24', '2016-06-26', 1, 'jorge@hotmail.com', 26, ' ', '0000-00-00'),
(5, '2016-07-22', '2016-07-26', 0, 'jorge@hotmail.com', 26, ' ', '0000-00-00'),
(6, '2016-06-25', '2016-06-28', 3, 'rodrigo@hotmail.com', 26, ' ', '2016-07-05'),
(7, '2016-06-25', '2016-07-20', 0, 'jorge@hotmail.com', 26, ' ', '0000-00-00'),
(8, '2016-06-24', '2016-06-27', 3, 'jorge@hotmail.com', 27, ' ', '2016-06-10'),
(9, '2016-06-30', '2016-07-30', 0, 'jorge@hotmail.com', 27, ' ', '0000-00-00'),
(10, '2016-07-11', '2016-07-12', 3, 'jorge@hotmail.com', 25, ' ', '2016-07-10'),
(11, '2016-07-14', '2016-07-15', 2, 'jorge@hotmail.com', 25, 'ghi', '2016-07-10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id_reserva`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
