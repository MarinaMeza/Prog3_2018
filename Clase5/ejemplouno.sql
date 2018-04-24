-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-04-2018 a las 01:16:48
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ejemplouno`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puestotrabajo`
--

CREATE TABLE `puestotrabajo` (
  `IDpuesto` int(11) NOT NULL,
  `Descripcion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Piso` int(11) NOT NULL,
  `Sector` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `puestotrabajo`
--

INSERT INTO `puestotrabajo` (`IDpuesto`, `Descripcion`, `Piso`, `Sector`) VALUES
(1, 'Windows 7', 2, 'Soporte'),
(2, 'Windows 95', 3, 'Testing'),
(3, 'Debian', 4, 'Desarrollo'),
(4, 'Ubuntu', 4, 'Desarrollo'),
(5, 'Parrot', 5, 'Seguridad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IDusuario` int(11) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IDusuario`, `Nombre`) VALUES
(1, 'Jose'),
(2, 'Maria'),
(3, 'Jesus');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariotrabajo`
--

CREATE TABLE `usuariotrabajo` (
  `IDusuarioTrabajo` int(11) NOT NULL,
  `IDusuario` int(11) NOT NULL,
  `IDpuesto` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuariotrabajo`
--

INSERT INTO `usuariotrabajo` (`IDusuarioTrabajo`, `IDusuario`, `IDpuesto`, `fecha`) VALUES
(1, 1, 1, '2018-03-01'),
(2, 1, 1, '2018-04-01'),
(3, 1, 5, '2018-02-01'),
(4, 2, 3, '2018-01-01'),
(5, 2, 3, '2018-05-10'),
(6, 3, 4, '2018-05-01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `puestotrabajo`
--
ALTER TABLE `puestotrabajo`
  ADD PRIMARY KEY (`IDpuesto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IDusuario`);

--
-- Indices de la tabla `usuariotrabajo`
--
ALTER TABLE `usuariotrabajo`
  ADD PRIMARY KEY (`IDusuarioTrabajo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `puestotrabajo`
--
ALTER TABLE `puestotrabajo`
  MODIFY `IDpuesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IDusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `usuariotrabajo`
--
ALTER TABLE `usuariotrabajo`
  MODIFY `IDusuarioTrabajo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
