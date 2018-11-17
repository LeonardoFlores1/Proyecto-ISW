-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2018 a las 20:20:05
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `isw`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(70) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `nombre`, `descripcion`) VALUES
(1, 'disponible', 'el libro no esta ni reservado ni vendido o intercambiado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intercambio`
--

CREATE TABLE `intercambio` (
  `id_intercambio` int(10) UNSIGNED NOT NULL,
  `lugar_reunion` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `estado` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_libro` int(10) UNSIGNED NOT NULL,
  `id_libro_com` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `id_libro` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `edicion` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `volumen` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `autor` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `precio` decimal(40,2) NOT NULL DEFAULT '0.00',
  `se_intercambia` tinyint(1) DEFAULT '0',
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_estado` int(10) UNSIGNED NOT NULL,
  `observaciones` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id_libro`, `nombre`, `edicion`, `volumen`, `autor`, `precio`, `se_intercambia`, `id_usuario`, `id_estado`, `observaciones`) VALUES
(23, 'aaaaaaaaaaa', '1', '1', 'aaaaaaaaa', '1.00', 1, 2, 1, 'jlkjlk'),
(24, 'bbbbbbbbbb', '1', '1', 'bbbbbbbbbbbb', '1.00', 1, 2, 1, 'kkkkkkkkkk'),
(25, 'eeeeeeeee', '1', '1', 'eeeeeeeeeeeeee', '1.00', 1, 2, 1, 'eeeeeeeeee'),
(27, 'ffffffffffffffffffff', '1', '1', 'fffffffffffffffff', '1.00', 1, 3, 1, 'ff'),
(28, 'eeeeeeeeeee', '1', '1', 'eeeeeeeeeeeeee', '1.00', 1, 3, 1, 'ff'),
(29, 'hhhhhhhhhhh', '1', '1', 'hhhhhhhhhhh', '1.00', 1, 3, 1, 'hhhhh'),
(30, 'uuuuuuuu', '1', '1', 'uuuuuuuuuuu', '1.00', 1, 3, 1, 'hhhhh'),
(31, 'DDDDDDDDDDD', '1', '1', 'DDDDD', '1.00', 1, 2, 1, ''),
(32, 'GGGGGGG', '1', '1', 'DDDDD', '1.00', 1, 2, 1, 'Ninguna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `no_cuenta` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `pass`, `correo`, `no_cuenta`, `telefono`) VALUES
(1, 'anres', '$2y$10$9TcYmkiDHkYUfSigCcCq2.Q.M1YPKwymVmsFAGkwFuaIy1rbmJxLW', 'bacostacarcamo777@gmail.com', '20101006896', '8928-6934'),
(2, 'brayan', '$2y$10$P4oVigvgylozm0vYuIpYseB9AOMvwasWbUKn8Slr9FAOXBcaqBF9S', 'bacostacarcamo@yahoo.es', '20091003368', '9865-7829'),
(3, 'celia', '$2y$10$IIi1KutaYxyDxot1VJt38O3P8jZNKjB9NhrwnGk4AbMqr22ybdiP.', 'celia5969@yahoo.es', '20111004029', '9865-8963');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(10) UNSIGNED NOT NULL,
  `lugar_reunion` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `estado` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_libro` int(10) UNSIGNED NOT NULL,
  `precio_comprador` decimal(40,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `lugar_reunion`, `fecha`, `estado`, `id_usuario`, `id_libro`, `precio_comprador`) VALUES
(1, 'Biblioteca UNAH', '2018-11-10', 'espera', 2, 27, '0.00'),
(6, 'Biblioteca UNAH', '2018-11-10', 'espera', 2, 28, '0.00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `intercambio`
--
ALTER TABLE `intercambio`
  ADD PRIMARY KEY (`id_usuario`,`id_libro`),
  ADD UNIQUE KEY `id_intercambio` (`id_intercambio`),
  ADD KEY `id_libro` (`id_libro`),
  ADD KEY `id_libro_com` (`id_libro_com`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id_libro`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_usuario`,`id_libro`),
  ADD UNIQUE KEY `id_venta` (`id_venta`),
  ADD KEY `id_libro` (`id_libro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `intercambio`
--
ALTER TABLE `intercambio`
  MODIFY `id_intercambio` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `id_libro` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `intercambio`
--
ALTER TABLE `intercambio`
  ADD CONSTRAINT `intercambio_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `intercambio_ibfk_2` FOREIGN KEY (`id_libro`) REFERENCES `libro` (`id_libro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `intercambio_ibfk_3` FOREIGN KEY (`id_libro_com`) REFERENCES `libro` (`id_libro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `libro_ibfk_2` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`id_libro`) REFERENCES `libro` (`id_libro`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
