-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2016 a las 17:43:22
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
-- Estructura de tabla para la tabla `hospedajes`
--

CREATE TABLE `hospedajes` (
  `id_hospedaje` int(11) NOT NULL,
  `nombre_hospedaje` text NOT NULL,
  `descripcion_hospedaje` text NOT NULL,
  `direccion_hospedaje` text NOT NULL,
  `capacidad_hospedaje` text NOT NULL,
  `nombre_tipo_hospedaje` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hospedajes`
--

INSERT INTO `hospedajes` (`id_hospedaje`, `nombre_hospedaje`, `descripcion_hospedaje`, `direccion_hospedaje`, `capacidad_hospedaje`, `nombre_tipo_hospedaje`) VALUES
(1, 'Casa Avion', 'una casa con forma de avion', 'arbol 3', '3', 'casa'),
(2, 'Choza', 'Una choza en la selva', 'Amazonas', '4', 'Choza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_pago` int(11) NOT NULL,
  `email_usuario` text NOT NULL,
  `saldo_pago` text NOT NULL,
  `fecha_pago` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id_pago`, `email_usuario`, `saldo_pago`, `fecha_pago`) VALUES
(25, 'jorge@hotmail.com', '60', '2016-06-03'),
(26, 'virginia@hotmail.com', '60', '2016-06-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_hospedajes`
--

CREATE TABLE `tipos_hospedajes` (
  `id_tipo_hospedaje` int(11) NOT NULL,
  `nombre_tipo_hospedaje` text NOT NULL,
  `descripcion_tipo_hospedaje` text,
  `estado_tipo_hospedaje` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipos_hospedajes`
--

INSERT INTO `tipos_hospedajes` (`id_tipo_hospedaje`, `nombre_tipo_hospedaje`, `descripcion_tipo_hospedaje`, `estado_tipo_hospedaje`) VALUES
(1, 'hostel', 'Habitacion compartido', '0'),
(3, 'casa', 'Una casa comun', '0'),
(5, 'casa de arbol', 'una casa en un arbol', '0'),
(6, 'Choza', 'Casa estilo indigena', '1'),
(7, 'casa', 'mi casa', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` text NOT NULL,
  `apellido_usuario` text NOT NULL,
  `email_usuario` text NOT NULL,
  `pass_usuario` text NOT NULL,
  `direccion_usuario` text NOT NULL,
  `tipo_usuario` text NOT NULL,
  `edad_usuario` int(11) NOT NULL,
  `ocupacion_usuario` text NOT NULL,
  `tipo_clave` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `apellido_usuario`, `email_usuario`, `pass_usuario`, `direccion_usuario`, `tipo_usuario`, `edad_usuario`, `ocupacion_usuario`, `tipo_clave`) VALUES
(9, 'agustin', 'torres', 'agustin@hotmail.com', '123456', 'n4', '3', 0, '', NULL),
(28, 'Jorge', 'Castillo', 'jorge@hotmail.com', '123456', 'La  Plata', '2', 18, '', 0),
(29, 'ayudante', 'ayudante', 'ayudante@hotmail.com', 'ayudante', 'ayudante', '1', 0, '', NULL),
(30, 'vir', 'v', 'virginia@hotmail.com', '123456', 'sgsd', '2', 0, '', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `hospedajes`
--
ALTER TABLE `hospedajes`
  ADD PRIMARY KEY (`id_hospedaje`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_pago`);

--
-- Indices de la tabla `tipos_hospedajes`
--
ALTER TABLE `tipos_hospedajes`
  ADD PRIMARY KEY (`id_tipo_hospedaje`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `hospedajes`
--
ALTER TABLE `hospedajes`
  MODIFY `id_hospedaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `tipos_hospedajes`
--
ALTER TABLE `tipos_hospedajes`
  MODIFY `id_tipo_hospedaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
