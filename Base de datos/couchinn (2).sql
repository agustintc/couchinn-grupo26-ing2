-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-07-2016 a las 17:32:25
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
-- Estructura de tabla para la tabla `calificaciones_hospedajes`
--

CREATE TABLE `calificaciones_hospedajes` (
  `id_calificaciones` int(11) NOT NULL,
  `hospedaje_calificado` int(11) NOT NULL,
  `valoracion` text NOT NULL,
  `comentario` text NOT NULL,
  `finalizacion` date NOT NULL,
  `email_calificador` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calificaciones_hospedajes`
--

INSERT INTO `calificaciones_hospedajes` (`id_calificaciones`, `hospedaje_calificado`, `valoracion`, `comentario`, `finalizacion`, `email_calificador`) VALUES
(1, 26, '2', 'Muy buena', '2016-06-28', 'rodrigo@hotmail.com'),
(2, 27, '0', '', '2016-06-27', 'jorge@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones_usuarios`
--

CREATE TABLE `calificaciones_usuarios` (
  `id_calificaciones` int(11) NOT NULL,
  `usuario_calificado` text NOT NULL,
  `valoracion` int(11) NOT NULL,
  `comentario` text,
  `finalizacion` date NOT NULL,
  `email_calificador` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calificaciones_usuarios`
--

INSERT INTO `calificaciones_usuarios` (`id_calificaciones`, `usuario_calificado`, `valoracion`, `comentario`, `finalizacion`, `email_calificador`) VALUES
(1, 'rodrigo@hotmail.com', 5, 'Excelente husped', '2016-06-28', 'ayudante@hotmail.com'),
(2, 'jorge@hotmail.com', 0, '', '2016-06-27', 'ayudante@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hospedajes`
--

CREATE TABLE `hospedajes` (
  `id_hospedaje` int(11) NOT NULL,
  `nombre_hospedaje` text NOT NULL,
  `descripcion_hospedaje` text NOT NULL,
  `nombre_lugar` text NOT NULL,
  `direccion_hospedaje` text NOT NULL,
  `capacidad_hospedaje` text NOT NULL,
  `nombre_tipo_hospedaje` text NOT NULL,
  `id_usuario` text NOT NULL,
  `estado_hospedaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hospedajes`
--

INSERT INTO `hospedajes` (`id_hospedaje`, `nombre_hospedaje`, `descripcion_hospedaje`, `nombre_lugar`, `direccion_hospedaje`, `capacidad_hospedaje`, `nombre_tipo_hospedaje`, `id_usuario`, `estado_hospedaje`) VALUES
(23, 'departamento lujo', 'departamento a estrenar', 'La Plata', '4 1262', '2', 'Depto', 'ayudante@hotmail.com', 0),
(24, 'casatilla', 'Una casa en forma de zapatilla', 'Trelew', 'joseph jones 87', '3', 'Casa', 'z@hotmail.com', 0),
(25, 'mansion hobbit', 'Una lugar para sentirse en la tierra media', 'Villa Elisa', '125 nº 34', '2', 'Mansion', 'z@hotmail.com', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugares`
--

CREATE TABLE `lugares` (
  `id_lugar` int(11) NOT NULL,
  `nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lugares`
--

INSERT INTO `lugares` (`id_lugar`, `nombre`) VALUES
(1, 'Mar del Plata'),
(2, 'Las Toninas'),
(3, 'Mar de Ajo'),
(4, 'Villa Gesell'),
(5, 'Santa Clara del Mar'),
(6, 'San Bernardo'),
(7, 'Necochea'),
(8, 'Puerto Madryn'),
(9, 'Florencio Varela'),
(10, 'Berazategui'),
(11, 'La Plata'),
(12, 'Gonnet'),
(13, 'Villa Elisa'),
(14, 'Trelew');

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
(29, 'torres@hotmail.com', '60', '2016-06-07'),
(30, 'z@hotmail.com', '60', '2016-06-17'),
(31, 'rodrigo@hotmail.com', '60', '2016-06-24');

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
(9, 'Que talle es?', '', '2016-06-21', 'agustin@hotmail.com', 24),
(10, 'Es una mansion?', '', '2016-06-24', 'ayudante@hotmail.com', 25),
(11, 'Es oscura?', 'Super luminoso', '2016-06-24', 'jorge@hotmail.com', 26),
(12, 'Es tenebrosa?', '', '2016-06-24', 'jorge@hotmail.com', 26),
(13, 'Da miedo?', 'un poco', '2016-06-24', 'rodrigo@hotmail.com', 26);

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
(1, '2016-06-24', '2016-06-26', 0, 'rodrigo@hotmail.com', 24, ' '),
(2, '2016-06-25', '2016-06-28', 0, 'jorge@hotmail.com', 24, ' '),
(3, '2016-07-23', '2016-07-30', 0, 'jorge@hotmail.com', 24, ' '),
(4, '2016-06-24', '2016-06-26', 1, 'jorge@hotmail.com', 26, ' '),
(5, '2016-07-22', '2016-07-26', 0, 'jorge@hotmail.com', 26, ' '),
(6, '2016-06-25', '2016-06-28', 3, 'rodrigo@hotmail.com', 26, ' '),
(7, '2016-06-25', '2016-07-20', 0, 'jorge@hotmail.com', 26, ' '),
(8, '2016-06-24', '2016-06-27', 3, 'jorge@hotmail.com', 27, ' '),
(9, '2016-06-30', '2016-07-30', 0, 'jorge@hotmail.com', 27, ' ');

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
(9, 'CasAA', '', '0'),
(10, 'Depto', '', '1'),
(11, 'Mansion', 'Una casa grande y lujosa', '0'),
(12, 'Departamento', 'oadskok', '0');

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
(28, 'Jorge', 'Castillo', 'jorge@hotmail.com', '123456', 'La  Plata', '2', 18, '', NULL),
(29, 'ayudante', 'ayudante', 'ayudante@hotmail.com', '123456', 'ayudante', '2', 0, '', NULL),
(30, 'vir', 'v', 'virginia@hotmail.com', '123456', 'sgsd', '2', 0, '', NULL),
(31, 'a', 'a', 'hola@hotmail.com', '123456', 'asd', '2', 0, '', 0),
(32, 'adf', 'asdf', 'comun@hotmail.com', '123456', 'zdgv', '1', 0, '', 0),
(33, 'a', 'a', 'torres@hotmail.com', '123456', 'asdfs', '2', 0, '', NULL),
(34, 'dañsl', 'pokpok', 'a@gmail.com', '123456', 'okfpsad', '1', 0, '', NULL),
(35, 'aoksd', 'opkas', 'm@hotmail.com', '123456', 'opkaspo', '1', 0, '', 0),
(36, 'Rodrigo', 'Testa', 'rodrigo@hotmail.com', '123456', 'iojdaosij', '2', 0, '', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificaciones_hospedajes`
--
ALTER TABLE `calificaciones_hospedajes`
  ADD PRIMARY KEY (`id_calificaciones`);

--
-- Indices de la tabla `calificaciones_usuarios`
--
ALTER TABLE `calificaciones_usuarios`
  ADD PRIMARY KEY (`id_calificaciones`);

--
-- Indices de la tabla `hospedajes`
--
ALTER TABLE `hospedajes`
  ADD PRIMARY KEY (`id_hospedaje`);

--
-- Indices de la tabla `lugares`
--
ALTER TABLE `lugares`
  ADD PRIMARY KEY (`id_lugar`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_pago`);

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
-- AUTO_INCREMENT de la tabla `calificaciones_hospedajes`
--
ALTER TABLE `calificaciones_hospedajes`
  MODIFY `id_calificaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `calificaciones_usuarios`
--
ALTER TABLE `calificaciones_usuarios`
  MODIFY `id_calificaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `hospedajes`
--
ALTER TABLE `hospedajes`
  MODIFY `id_hospedaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `lugares`
--
ALTER TABLE `lugares`
  MODIFY `id_lugar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT de la tabla `pregunta_respuesta`
--
ALTER TABLE `pregunta_respuesta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tipos_hospedajes`
--
ALTER TABLE `tipos_hospedajes`
  MODIFY `id_tipo_hospedaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
