-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2016 a las 14:33:35
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
(1, 'choZA MAYOR', 'una choza en la selva', 'arbol 3', '3', 'dsgsg');

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
(1, 'z', '60', '2016-05-30'),
(2, 'hola@hotmail.com', '60', '2016-05-30'),
(3, 'hodor', '60', '2016-05-31'),
(4, 'agustintc92@hotmail.com', '60', '2016-05-31'),
(5, 'aaa@hotmail.com', '60', '2016-06-01'),
(6, 'agus@hotmail.com', '60', '2016-06-01'),
(7, 'g@hotmail.com', '60', '2016-06-01'),
(8, 'h@hotmail.com', '60', '2016-06-01'),
(9, 'hhh@hotmail.com', '60', '2016-06-01');

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
(1, 'hostel', 'habitacion compartida', '0'),
(2, 'choza', 'thtdhfffh', '0'),
(3, 'casa', 'hgfg', '0'),
(4, '', '', '0');

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
  `ocupacion_usuario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `apellido_usuario`, `email_usuario`, `pass_usuario`, `direccion_usuario`, `tipo_usuario`, `edad_usuario`, `ocupacion_usuario`) VALUES
(1, 'agustin', 'torres casares', 'agustintc92@hotmail.com', 'hola', '4', '', 23, 'ty'),
(2, 'hodor', 'hodor', 'hodor', 'holdthedoor', 'hodor', '', 39, 'hold the door'),
(3, 'asda', 'asd', 'UnMail@asdadomain.com', 'a', 'asd', '', 0, ''),
(4, 'z', 'z', 'z', 'z', 'z', '', 0, ''),
(5, 'x', 'x', 'x', 'x', 'x', '1', 0, ''),
(6, 'a', 'a', '234@hotmail.com', 'aaaaaa', 'a', '1', 0, ''),
(7, 'a', 'a', 'x@hotmail.com', '123456', '234234', '1', 0, ''),
(8, 'dsf', 'df', 'rter@hotmail.com', 'eeeeee', 'sdasd', '1', 0, ''),
(9, 'hola', 'hola', 'hola@hotmail.com', '123456', '65767', '3', 0, ''),
(10, 'a', 'a', 'aaa@hotmail.com', '123456', 'a', '1', 0, ''),
(11, 'a', 'a', 'agus@hotmail.com', '123456', 'a', '2', 0, ''),
(12, 'a', 'a', 'g@hotmail.com', '123456', 'a', '2', 0, ''),
(13, 'ddsf', 'dfd', 'h@hotmail.com', '123456', 'a', '2', 0, ''),
(14, 'a', 'a', 'hhh@hotmail.com', '123456', 'asd', '2', 0, '');

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
  MODIFY `id_hospedaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tipos_hospedajes`
--
ALTER TABLE `tipos_hospedajes`
  MODIFY `id_tipo_hospedaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
