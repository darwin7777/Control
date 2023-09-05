-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-09-2023 a las 07:39:36
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
  `id_usuario` int(6) NOT NULL,
  `producto` varchar(250) NOT NULL,
  `cantidad_final` int(11) NOT NULL,
  `cantidad_estimada` int(11) NOT NULL,
  `empresa` varchar(150) NOT NULL,
  `estado` varchar(1) NOT NULL,
  `fecha` date NOT NULL,
  `horas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `linea_trabajo`
--

INSERT INTO `linea_trabajo` (`id`, `id_usuario`, `producto`, `cantidad_final`, `cantidad_estimada`, `empresa`, `estado`, `fecha`, `horas`) VALUES
(1, 1, 'producto1', 8000, 1000, 'Agripac', 'A', '2023-09-02', 8),
(2, 1, 'producto2', 5000, 500, 'Agripac', 'A', '2023-09-02', 8),
(3, 1, 'producto3', 4000, 400, 'Agripac', 'A', '2023-09-02', 8),
(4, 1, 'producto4', 8000, 800, 'Agripac', 'A', '2023-09-02', 8),
(5, 1, 'producto5', 800, 100, 'Agripac', 'A', '2023-09-02', 8),
(6, 1, 'producto6', 2000, 250, 'Agripac', 'A', '2023-09-02', 8),
(7, 1, 'producto7', 400, 50, 'Agripac', 'A', '2023-09-02', 8),
(8, 1, 'producto8', 1200, 150, 'Agripac', 'A', '2023-09-02', 8),
(9, 1, 'producto9', 1800, 225, 'Agripac', 'A', '2023-09-02', 8),
(10, 1, 'producto10', 12000, 1500, 'Agripac', 'A', '2023-09-02', 8),
(11, 1, 'producto11', 15000, 1875, 'Agripac', 'A', '2023-09-02', 8),
(12, 1, 'producto12', 20000, 2500, 'Agripac', 'A', '2023-09-02', 8),
(13, 1, 'producto13', 30000, 3750, 'Agripac', 'A', '2023-09-02', 8),
(14, 1, 'producto14', 1000, 125, 'Agripac', 'A', '2023-09-02', 8),
(15, 1, 'producto15', 6000, 750, 'Agripac', 'A', '2023-09-02', 8),
(16, 1, 'producto16', 7000, 875, 'Agripac', 'A', '2023-09-02', 8),
(17, 1, 'producto17', 3200, 400, 'Agripac', 'A', '2023-09-02', 8),
(18, 1, 'producto18', 2400, 300, 'Agripac', 'A', '2023-09-02', 8),
(19, 1, 'producto19', 4400, 550, 'Agripac', 'A', '2023-09-02', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidacion`
--

CREATE TABLE `liquidacion` (
  `id` int(11) NOT NULL,
  `id_linea_trabajo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `liquidacion`
--

INSERT INTO `liquidacion` (`id`, `id_linea_trabajo`, `cantidad`, `hora`) VALUES
(1, 1, 1000, '05:50:03'),
(2, 1, 2000, '05:50:03'),
(3, 1, 3000, '05:50:03'),
(4, 1, 4000, '05:50:03'),
(5, 1, 5000, '05:50:03'),
(6, 1, 6000, '05:50:03'),
(7, 1, 7000, '05:50:03'),
(8, 1, 8000, '05:50:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre_producto` varchar(20) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `valor` decimal(11,2) NOT NULL,
  `estado` varchar(1) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `id_usuario`, `nombre_producto`, `cantidad`, `valor`, `estado`, `fecha`) VALUES
(1, 1, 'producto1', 10000, 35.00, 'A', '2023-08-31'),
(2, 1, 'producto2', 2000, 35.00, 'A', '2023-08-31'),
(3, 1, 'producto4', 1000, 12.00, 'A', '2023-08-31'),
(4, 1, 'producto5', 5000, 20.00, 'A', '2023-08-31'),
(5, 1, 'producto6', 8000, 30.00, 'A', '2023-08-31'),
(6, 1, 'producto7', 3000, 40.00, 'A', '2023-08-31'),
(7, 1, 'producto8', 800, 24.00, 'A', '2023-08-31'),
(8, 1, 'producto9', 500, 32.00, 'A', '2023-08-31'),
(9, 1, 'producto10', 1000, 42.00, 'A', '2023-08-31'),
(10, 1, 'producto11', 2000, 46.00, 'A', '2023-08-31'),
(11, 1, 'producto12', 4000, 13.00, 'A', '2023-08-31'),
(12, 1, 'producto13', 5000, 15.00, 'A', '2023-08-31'),
(13, 1, 'producto14', 6000, 29.00, 'A', '2023-08-31'),
(14, 1, 'producto15', 6000, 9.00, 'A', '2023-08-31'),
(15, 1, 'producto16', 5000, 8.00, 'A', '2023-08-31'),
(16, 1, 'producto17', 2000, 26.00, 'A', '2023-08-31'),
(17, 1, 'producto18', 2000, 47.00, 'A', '2023-08-31'),
(18, 1, 'producto19', 1000, 11.00, 'A', '2023-08-31'),
(19, 1, 'producto20', 4000, 33.00, 'A', '2023-08-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
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
(1, 'darwin', '1829', 'Administrador', 'Darwin', 'Peralta', 'A', 'darwin', '2023-07-30', 'dperalta@gmail.com'),
(2, 'dvera', '1234', 'Usuario', 'Derek', 'Vera', 'A', 'darwin', '2023-08-14', 'dvera_agrip@hotmail.com'),
(3, 'kevin29', '1111', 'usuario', 'Kevin', 'Torres', 'A', 'darwin', '2023-08-29', 'ktores@hotmail.com'),
(4, 'cristian', '5555', 'Usuario', 'Cristian', 'Paez', 'A', 'darwin', '2023-09-01', 'cris12@hotmail.com'),
(5, 'angel', '5555', 'Usuario', 'Angel', 'Paez', 'A', 'darwin', '2023-09-01', 'cris12@hotmail.com'),
(6, 'boris', '6666', 'Usuario', 'Boris', 'Paez', 'A', 'darwin', '2023-09-01', 'boris99@hotmail.com'),
(7, 'manuel', '9876', 'Usuario', 'Manuel', 'Paez', 'A', 'darwin', '2023-09-01', 'manuel-1978@hotmail.com'),
(8, 'jose', '2345', 'Usuario', 'Jose', 'Paez', 'A', 'darwin', '2023-09-01', 'jose21@hotmail.com'),
(9, 'daniel', '3456', 'Usuario', 'Daniel', 'Paez', 'A', 'darwin', '2023-09-01', 'daniel159@hotmail.com'),
(10, 'luis', '6789', 'Usuario', 'Luis', 'Paez', 'A', 'darwin', '2023-09-01', 'luis-f9@hotmail.com'),
(11, 'samuel', '9137', 'Usuario', 'Samuel', 'Paez', 'A', 'darwin', '2023-09-01', 'samu-eleg@hotmail.com'),
(12, 'david', '2846', 'Usuario', 'David', 'Paez', 'A', 'darwin', '2023-09-01', 'dav-guerr@hotmail.com'),
(13, 'enrique', '6655', 'Usuario', 'Enrique', 'Paez', 'A', 'darwin', '2023-09-01', 'enr-pa@hotmail.com');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `liquidacion`
--
ALTER TABLE `liquidacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
