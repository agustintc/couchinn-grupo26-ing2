-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-06-2016 a las 21:44:32
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
  `nombre_tipo_hospedaje` text NOT NULL,
  `id_usuario` text NOT NULL,
  `comienzo` date NOT NULL,
  `finalizacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hospedajes`
--

INSERT INTO `hospedajes` (`id_hospedaje`, `nombre_hospedaje`, `descripcion_hospedaje`, `direccion_hospedaje`, `capacidad_hospedaje`, `nombre_tipo_hospedaje`, `id_usuario`, `comienzo`, `finalizacion`) VALUES
(1, 'Casa Avion', 'una casa con forma de avion', 'arbol 3', '3', 'casa', 'jorge@hotmail.com', '0000-00-00', '0000-00-00'),
(2, 'Choza', 'Una choza en la selva', 'Amazonas', '4', 'Choza', '0', '0000-00-00', '0000-00-00'),
(5, 'srgs', 'sffsdf', 'sdgsdg', '3', 'hostel', 'jorge@hotmail.com', '0214-04-12', '0535-12-31');

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
(26, 'virginia@hotmail.com', '60', '2016-06-04'),
(27, 'hola@hotmail.com', '60', '2016-06-04'),
(28, 'ayudante@hotmail.com', '60', '2016-06-04'),
(29, 'torres@hotmail.com', '60', '2016-06-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `id` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `fecha` date NOT NULL,
  `id_hospedaje` int(11) NOT NULL,
  `id_inquilino` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`id`, `comentario`, `fecha`, `id_hospedaje`, `id_inquilino`) VALUES
(1, 'es un avion?', '2016-06-09', 1, 'ayudante@hotmail.com'),
(2, 'vuela?', '2016-06-09', 1, 'ayudante@hotmail.com'),
(3, 'yjfyrt', '2016-06-09', 5, 'ayudante@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `id` int(11) NOT NULL,
  `comentarior` text NOT NULL,
  `fechar` date NOT NULL,
  `id_hospedaje` int(11) NOT NULL,
  `id_inquilino` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `respuesta`
--

INSERT INTO `respuesta` (`id`, `comentarior`, `fechar`, `id_hospedaje`, `id_inquilino`) VALUES
(1, '333', '2016-06-09', 1, 'ayudante@hotmail.com'),
(2, '333', '2016-06-09', 1, 'ayudante@hotmail.com'),
(3, 'dgdg', '2016-06-09', 5, 'ayudante@hotmail.com');

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
(7, 'casa', 'mi casa', '0'),
(8, 'bungalow', 'asa', '0');

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
(29, 'ayudante', 'ayudante', 'ayudante@hotmail.com', 'ayudante', 'ayudante', '2', 0, '', NULL),
(30, 'vir', 'v', 'virginia@hotmail.com', '123456', 'sgsd', '2', 0, '', NULL),
(31, 'a', 'a', 'hola@hotmail.com', '123456', 'asd', '2', 0, '', 0),
(32, 'adf', 'asdf', 'comun@hotmail.com', '123456', 'zdgv', '1', 0, '', 0),
(33, 'a', 'a', 'torres@hotmail.com', '123456', 'asdfs', '2', 0, '', NULL);

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
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_hospedaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipos_hospedajes`
--
ALTER TABLE `tipos_hospedajes`
  MODIFY `id_tipo_hospedaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
