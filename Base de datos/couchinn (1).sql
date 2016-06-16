-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2016 a las 22:21:07
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
  `estado_hospedaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hospedajes`
--

INSERT INTO `hospedajes` (`id_hospedaje`, `nombre_hospedaje`, `descripcion_hospedaje`, `direccion_hospedaje`, `capacidad_hospedaje`, `nombre_tipo_hospedaje`, `id_usuario`, `estado_hospedaje`) VALUES
(13, 'aspokd', 'pokas', 'pok', '1', 'Depto', 'ayudante@hotmail.com', 1),
(14, 'oasjdi', 'pokaspok', '2', '1', 'Depto', 'ayudante@hotmail.com', 0),
(22, 'asd', 'aksjpk', 'pokdwq', '2', 'Casa', 'ayudante@hotmail.com', 0);

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
(3, 'yjfyrt', '2016-06-09', 5, 'ayudante@hotmail.com'),
(4, 'aaa', '2016-06-10', 2, 'jorge@hotmail.com'),
(5, 'eee', '2016-06-10', 2, 'jorge@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta_respuesta`
--

CREATE TABLE `pregunta_respuesta` (
  `id` int(11) NOT NULL,
  `comentariop` text NOT NULL,
  `comentarior` text NOT NULL,
  `fecha` date NOT NULL,
  `id_inquilino` text NOT NULL,
  `id_hospedaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pregunta_respuesta`
--

INSERT INTO `pregunta_respuesta` (`id`, `comentariop`, `comentarior`, `fecha`, `id_inquilino`, `id_hospedaje`) VALUES
(2, 'es un avion?', 'si', '2016-06-10', 'ayudante@hotmail.com', 1),
(3, 'y vuela?', 'no', '2016-06-10', 'ayudante@hotmail.com', 1),
(7, 'buenisimo', 'genial', '2016-06-11', 'ayudante@hotmail.com', 1),
(8, 'aspokdas', 'daslk', '2016-06-13', 'agustin@hotmail.com', 10);

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
  `comentario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id_reserva`, `comienzo`, `finalizacion`, `estado`, `id_huesped`, `id_hospedaje`, `comentario`) VALUES
(8, '2016-06-11', '2016-06-12', 1, 'jorge@hotmail.com', 13, ''),
(9, '2016-06-07', '2016-06-11', 1, 'virginia@hotmail.com', 13, ''),
(10, '2016-06-05', '2016-06-12', 1, 'virginia@hotmail.com', 13, 'sos puto\r\n'),
(11, '2016-06-05', '2016-06-23', 1, 'jorge@hotmail.com', 13, ''),
(12, '2016-06-10', '2016-06-23', 2, 'virginia@hotmail.com', 13, ''),
(13, '2016-06-02', '2016-06-08', 0, 'virginia@hotmail.com', 13, ''),
(14, '2016-06-01', '2016-06-02', 0, 'jorge@hotmail.com', 13, ''),
(15, '2016-05-09', '2016-05-25', 0, 'jorge@hotmail.com', 13, ''),
(16, '2016-06-05', '2016-06-19', 1, 'jorge@hotmail.com', 13, '');

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
(3, 'dgdg', '2016-06-09', 5, 'ayudante@hotmail.com'),
(4, '', '0000-00-00', 2, 'jorge@hotmail.com'),
(5, '', '0000-00-00', 2, 'jorge@hotmail.com');

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
(9, 'Casa', '', '0'),
(10, 'Depto', '', '0');

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
(29, 'ayudante', 'ayudante', 'ayudante@hotmail.com', '123456', 'ayudante', '2', 0, '', NULL),
(30, 'vir', 'v', 'virginia@hotmail.com', '123456', 'sgsd', '2', 0, '', NULL),
(31, 'a', 'a', 'hola@hotmail.com', '123456', 'asd', '2', 0, '', 0),
(32, 'adf', 'asdf', 'comun@hotmail.com', '123456', 'zdgv', '1', 0, '', 0),
(33, 'a', 'a', 'torres@hotmail.com', '123456', 'asdfs', '2', 0, '', NULL),
(34, 'dañsl', 'pokpok', 'a@gmail.com', '123456', 'okfpsad', '1', 0, '', NULL);

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
-- Indices de la tabla `pregunta_respuesta`
--
ALTER TABLE `pregunta_respuesta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id_reserva`);

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
  MODIFY `id_hospedaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `pregunta_respuesta`
--
ALTER TABLE `pregunta_respuesta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tipos_hospedajes`
--
ALTER TABLE `tipos_hospedajes`
  MODIFY `id_tipo_hospedaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
