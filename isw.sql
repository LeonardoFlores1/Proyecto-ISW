-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2018 at 03:58 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isw`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `confirmar_intercambio` (`id_ve` INT UNSIGNED, `id_lib` INT UNSIGNED, `id_lib_c` INT UNSIGNED)  BEGIN
	UPDATE Intercambio SET estado = 'confirmado' WHERE id_intercambio = id_ve;
    UPDATE Intercambio SET id_libro_com = id_lib_c;
    UPDATE Libro SET id_estado = 2 WHERE id_libro = id_lib;
    UPDATE Libro SET id_estado = 2 WHERE id_libro = id_lib_c;
    DELETE FROM Intercambio WHERE id_intercambio <> id_ve AND id_libro = id_lib;
    DELETE FROM Venta WHERE id_libro = id_lib;
    DELETE FROM Venta WHERE id_libro = id_lib_c;
    DELETE FROM Intercambio WHERE id_libro = id_lib_c;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `confirmar_venta` (`id_ve` INT UNSIGNED, `id_lib` INT UNSIGNED)  BEGIN
	UPDATE Venta SET estado = 'confirmado' WHERE id_venta = id_ve;
    UPDATE Libro SET id_estado = 2 WHERE id_libro = id_lib;
    DELETE FROM Venta WHERE id_venta <> id_ve AND id_libro = id_lib;
    DELETE FROM Intercambio WHERE id_libro = id_lib;    
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(70) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `estado`
--

INSERT INTO `estado` (`id_estado`, `nombre`, `descripcion`) VALUES
(1, 'Disponible', 'No esta reservado para compras o intercambios'),
(2, 'Reservado', 'Esta reservado para compras o intercambios'),
(3, 'Vendido', 'Esta vendido o intercambiado');

-- --------------------------------------------------------

--
-- Table structure for table `intercambio`
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

--
-- Dumping data for table `intercambio`
--

INSERT INTO `intercambio` (`id_intercambio`, `lugar_reunion`, `fecha`, `estado`, `id_usuario`, `id_libro`, `id_libro_com`) VALUES
(16, 'Biblioteca UNAH', '2018-11-21', 'confirmado', 2, 19, 30),
(15, 'Biblioteca UNAH', '2018-11-21', 'confirmado', 2, 20, 30);

-- --------------------------------------------------------

--
-- Table structure for table `libro`
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
-- Dumping data for table `libro`
--

INSERT INTO `libro` (`id_libro`, `nombre`, `edicion`, `volumen`, `autor`, `precio`, `se_intercambia`, `id_usuario`, `id_estado`, `observaciones`) VALUES
(19, 'Fisica I', '1', '1', 'Daniels Green', '1.00', 1, 1, 2, ''),
(20, 'Fisica I', '1', '1', 'Daniels Green', '1.00', 1, 1, 2, ''),
(21, 'Calculo II', '1', '1', 'Daniels Green', '800.00', 0, 1, 1, ''),
(22, 'Calculo I', '1', '1', 'Daniels Green', '500.00', 0, 1, 2, ''),
(23, 'Programacion C++', '1', '1', 'Ernest Roduls', '300.00', 0, 1, 1, ''),
(25, 'Programación Java', '1', '1', 'Ernest Roduls', '250.00', 1, 1, 1, ''),
(26, 'El viejo y el Mar', '1', '1', 'Anonimo', '1.00', 1, 2, 2, ''),
(27, 'El don de la estrella', '1', '1', 'Anonimo', '1.00', 1, 2, 1, ''),
(28, 'Dibujo I', '1', '1', 'Alejando Brizo', '1.00', 1, 2, 1, ''),
(29, 'Dibujo II', '1', '1', 'Alejando Brizo', '1.00', 1, 2, 2, ''),
(30, 'Dibujo III', '1', '1', 'Alejando Brizo', '420.00', 1, 2, 2, ''),
(31, 'Mercadotecnia', '1', '1', 'Carlos Figuus', '900.00', 1, 3, 1, ''),
(32, 'Administracion', '1', '1', 'Carlos Figuus', '600.00', 1, 3, 1, ''),
(33, 'Administración II', '1', '1', 'Carlos Figuus', '600.00', 1, 3, 1, ''),
(34, 'Administración III', '1', '1', 'Carlos Figuus', '600.00', 1, 3, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
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
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `pass`, `correo`, `no_cuenta`, `telefono`) VALUES
(1, 'brayan', '$2y$10$5IqLuUd0T/UQP8skjMvWiu0g2HEMGkLirQJTWz0ZF9/N5Xqg.qUjm', 'bacostacarcamo777@gmail.com', '30592223368', '9988-6654'),
(2, 'maria', '$2y$10$N/5douuQpQYaUcTIFofTOufk96bb6FdWGDMIeRtiHbShD0pD6uODu', 'maria@gmail.com', '22961113365', '9966-2463'),
(3, 'elson', '$2y$10$3m2SzPW2FSxEXl6vTsP9p.rPN.Yq.zSog/zBPEyKosuUCZgSi0XwW', 'elson@yahoo.es', '1245', '9856-9966');

-- --------------------------------------------------------

--
-- Table structure for table `venta`
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
-- Dumping data for table `venta`
--

INSERT INTO `venta` (`id_venta`, `lugar_reunion`, `fecha`, `estado`, `id_usuario`, `id_libro`, `precio_comprador`) VALUES
(43, 'Biblioteca UNAH', '2018-11-21', 'confirmado', 1, 29, '350.00'),
(44, 'Biblioteca UNAH', '2018-11-21', 'espera', 2, 25, '0.00'),
(38, 'Biblioteca UNAH', '2018-11-21', 'confirmado', 3, 22, '300.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indexes for table `intercambio`
--
ALTER TABLE `intercambio`
  ADD PRIMARY KEY (`id_usuario`,`id_libro`),
  ADD UNIQUE KEY `id_intercambio` (`id_intercambio`),
  ADD KEY `id_libro` (`id_libro`),
  ADD KEY `id_libro_com` (`id_libro_com`);

--
-- Indexes for table `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id_libro`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indexes for table `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_usuario`,`id_libro`),
  ADD UNIQUE KEY `id_venta` (`id_venta`),
  ADD KEY `id_libro` (`id_libro`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `intercambio`
--
ALTER TABLE `intercambio`
  MODIFY `id_intercambio` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `libro`
--
ALTER TABLE `libro`
  MODIFY `id_libro` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `intercambio`
--
ALTER TABLE `intercambio`
  ADD CONSTRAINT `intercambio_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `intercambio_ibfk_2` FOREIGN KEY (`id_libro`) REFERENCES `libro` (`id_libro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `intercambio_ibfk_3` FOREIGN KEY (`id_libro_com`) REFERENCES `libro` (`id_libro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `libro_ibfk_2` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`id_libro`) REFERENCES `libro` (`id_libro`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
