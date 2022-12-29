-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-12-2022 a las 23:09:31
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dailylabcomp`
--
CREATE DATABASE IF NOT EXISTS `dailylabcomp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dailylabcomp`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chequeo`
--
-- Creación: 20-11-2022 a las 01:57:59
--

CREATE TABLE `chequeo` (
  `ID` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `ID Usuario` int(11) NOT NULL,
  `ID Parametro` int(11) NOT NULL,
  `Obsercacion` text NOT NULL,
  `Hora` time NOT NULL,
  `ID PC` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--
-- Creación: 28-12-2022 a las 21:58:09
-- Última actualización: 28-12-2022 a las 21:58:31
--

CREATE TABLE `equipos` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(7) NOT NULL,
  `Ubicacion` varchar(3) NOT NULL,
  `Estado` varchar(1) NOT NULL,
  `IP` varchar(15) NOT NULL,
  `MAC` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`ID`, `Nombre`, `Ubicacion`, `Estado`, `IP`, `MAC`) VALUES
(4, 'P01', 'K01', 'A', '192.168.81.25', '14-18-c3-06-14-E1'),
(7, 'P02', 'K01', 'A', '192.168.81.66', '14-18-c3-06-14-E0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametros`
--
-- Creación: 20-11-2022 a las 01:22:01
--

CREATE TABLE `parametros` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(15) NOT NULL,
  `Descripcion` text NOT NULL,
  `Estado` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--
-- Creación: 28-12-2022 a las 19:35:36
-- Última actualización: 28-12-2022 a las 19:37:26
--

CREATE TABLE `usuario` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(12) NOT NULL,
  `Apellido` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Clave` varchar(100) NOT NULL,
  `Nivel` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID`, `Nombre`, `Apellido`, `email`, `Clave`, `Nivel`) VALUES
(16, 'leonel', 'valcarcel', 'leovalcarcel01@gmail.com', '202cb962ac59075b964b07152d234b70', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `chequeo`
--
ALTER TABLE `chequeo`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID Usuario` (`ID Usuario`,`ID Parametro`),
  ADD KEY `ID Parametro` (`ID Parametro`),
  ADD KEY `ID PC` (`ID PC`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Nombre` (`Nombre`),
  ADD UNIQUE KEY `IP` (`IP`),
  ADD UNIQUE KEY `MAC` (`MAC`);

--
-- Indices de la tabla `parametros`
--
ALTER TABLE `parametros`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `nombre` (`Nombre`),
  ADD UNIQUE KEY `Estado` (`Estado`);
ALTER TABLE `parametros` ADD FULLTEXT KEY `Descripcion` (`Descripcion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `chequeo`
--
ALTER TABLE `chequeo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `parametros`
--
ALTER TABLE `parametros`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `chequeo`
--
ALTER TABLE `chequeo`
  ADD CONSTRAINT `chequeo_ibfk_1` FOREIGN KEY (`ID Parametro`) REFERENCES `parametros` (`ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `chequeo_ibfk_2` FOREIGN KEY (`ID Usuario`) REFERENCES `usuario` (`ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `chequeo_ibfk_3` FOREIGN KEY (`ID PC`) REFERENCES `equipos` (`ID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
