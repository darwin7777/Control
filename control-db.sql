-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-08-2023 a las 22:09:37
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `control`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_trabajo`
--

CREATE TABLE `linea_trabajo` (
  `id` int(11) NOT NULL,
  `id_usuario` varchar(6) NOT NULL,
  `producto` varchar(250) NOT NULL,
  `cantidad_final` int(11) NOT NULL,
  `cantidad_estimada` int(11) NOT NULL,
  `empresa` varchar(150) NOT NULL,
  `estado` varchar(1) NOT NULL,
  `fecha` datetime NOT NULL,
  `horas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `linea_trabajo`
--

INSERT INTO `linea_trabajo` (`id`, `id_usuario`, `producto`, `cantidad_final`, `cantidad_estimada`, `empresa`, `estado`, `fecha`, `horas`) VALUES
(1, 'darwin', 'Gramoxone', 10000, 1000, 'Agripac', 'A', '2023-08-13 18:31:59', 10),
(2, 'darwin', 'Amina', 5000, 500, 'Agripac', 'A', '2023-08-29 14:18:04', 12),
(22, 'dvera', 'Amina', 5000, 500, 'Agripac', 'A', '2023-08-29 14:21:02', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidacion`
--

CREATE TABLE `liquidacion` (
  `id` int(100) NOT NULL,
  `id_linea_trabajo` varchar(100) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `hora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `liquidacion`
--

INSERT INTO `liquidacion` (`id`, `id_linea_trabajo`, `cantidad`, `hora`) VALUES
(1, '1', 0, '2023-08-13 09:00:05'),
(2, '2', 0, '2023-08-29 14:16:36'),
(3, '2', 500, '2023-08-29 14:18:04'),
(4, '2', 1000, '2023-08-29 14:21:02'),
(5, '1', 4000, '2023-08-29 13:00:05'),
(6, '1', 5000, '2023-08-29 14:00:25'),
(7, '1', 6000, '2023-08-29 15:00:33'),
(11, '1', 1000, '2023-08-13 10:00:32'),
(13, '1', 2000, '2023-08-13 11:00:07'),
(14, '1', 3000, '2023-08-13 12:00:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `id_usuario` varchar(100) NOT NULL,
  `nombre_producto` varchar(20) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `valor` decimal(11,2) NOT NULL,
  `estado` varchar(1) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `id_usuario`, `nombre_producto`, `cantidad`, `valor`, `estado`, `fecha`) VALUES
(1, 'darwin1', 'Gramoxone', 10000, 35.50, 'A', '2023-08-13 08:01:49'),
(14, 'darwin1', 'Amina', 5000, 15.00, 'A', '2023-08-29 14:16:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `rol` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `estado` varchar(1) NOT NULL,
  `user` varchar(50) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `pass`, `rol`, `nombre`, `apellido`, `estado`, `user`, `fecha`, `email`) VALUES
(1, 'darwin1', '1829', 'Administrador', 'Darwin', 'Peralta', 'A', 'darwin1', '2023-07-30', 'dperalta@gmail.com'),
(2, 'dvera', '1234', 'Usuario', 'derek', 'vera', 'A', 'darwin1', '2023-08-14', 'dvera_agrip@hotmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `linea_trabajo`
--
ALTER TABLE `linea_trabajo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `liquidacion`
--
ALTER TABLE `liquidacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `linea_trabajo`
--
ALTER TABLE `linea_trabajo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `liquidacion`
--
ALTER TABLE `liquidacion`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
