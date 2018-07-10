-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-07-2018 a las 20:48:11
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mediasbd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medias`
--

CREATE TABLE `medias` (
  `id` int(11) NOT NULL,
  `color` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `marca` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `precio` float NOT NULL,
  `talle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `medias`
--

INSERT INTO `medias` (`id`, `color`, `marca`, `precio`, `talle`) VALUES
(1, 'rojo', 'mediasMarca', 23, 35),
(2, 'verde', 'mediasOTRAMarca', 43, 37),
(3, 'azul', 'mediasUnaMarca', 56, 38),
(6, 'negro', 'mediasOTRAMarca', 32, 41),
(7, 'negro', 'mediasUnaMarca', 66, 33),
(8, 'negro', 'mediasUnaMarca', 66, 33),
(9, 'naranja', 'mediasMarca', 45, 35),
(11, 'celeste', 'mediasOTRAMarca', 67, 33),
(12, 'celeste', 'mediasOTRAMarca', 67, 33);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `clave` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `perfil` varchar(25) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `clave`, `perfil`) VALUES
(1, 'encargado', 'encargado', 'encargado'),
(2, 'empleado', 'empleado', 'empleado'),
(3, 'dueño', 'dueño', 'dueño'),
(5, 'empleado', 'empleado', 'empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventamedia`
--

CREATE TABLE `ventamedia` (
  `id` int(11) NOT NULL,
  `idMedia` int(11) NOT NULL,
  `nombreCliente` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` date NOT NULL,
  `importe` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ventamedia`
--

INSERT INTO `ventamedia` (`id`, `idMedia`, `nombreCliente`, `fecha`, `importe`) VALUES
(3, 9, 'Gabriel', '2018-07-09', 45),
(10, 11, 'Susana', '2018-07-09', 67),
(17, 11, 'Susana', '0000-00-00', 67),
(18, 12, 'Cecilia', '2018-07-09', 67),
(19, 1, 'Cecilia', '2018-07-10', 13),
(20, 1, 'Susana', '2018-07-10', 12),
(21, 1, 'Cecilia', '2018-07-10', 1),
(22, 1, 'Cecilia', '2018-07-10', 1),
(23, 1, 'Cecilia', '2018-07-10', 120);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `medias`
--
ALTER TABLE `medias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventamedia`
--
ALTER TABLE `ventamedia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `medias`
--
ALTER TABLE `medias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ventamedia`
--
ALTER TABLE `ventamedia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
