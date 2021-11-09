-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2021 a las 02:31:02
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sis_inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id` int(11) NOT NULL,
  `producto` varchar(150) NOT NULL,
  `precio` int(11) NOT NULL,
  `medida` varchar(50) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `tipoProducto` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id`, `producto`, `precio`, `medida`, `cantidad`, `tipoProducto`) VALUES
(4, 'Café Molido', 45, 'Lb', 10, 'Cafe'),
(6, 'Agua', 15, 'Garrafón', 10, 'Cafe'),
(33, 'Azucar', 102, 'saco(25lb)', 3, 'Cafe'),
(35, 'Agua', 20, 'Garrafón', 14, 'Cafe Expresso'),
(37, 'Canela en Polvo', 46, 'Lb', 1, 'Cafe Americano'),
(38, 'Café en Grano', 50, 'Lb', 3, 'Cafe Expresso'),
(40, 'Azucar', 100, 'Saco(15)', 3, 'Cafe Americano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadores`
--

CREATE TABLE `trabajadores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `puesto` varchar(150) NOT NULL,
  `sueldo` int(11) NOT NULL,
  `bonificación` int(11) NOT NULL DEFAULT 250,
  `total_devengado` int(11) NOT NULL,
  `igss` double NOT NULL,
  `prestamo` int(11) NOT NULL DEFAULT 0,
  `anticipo` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `trabajadores`
--

INSERT INTO `trabajadores` (`id`, `nombre`, `puesto`, `sueldo`, `bonificación`, `total_devengado`, `igss`, `prestamo`, `anticipo`) VALUES
(1, 'Juan Pérez', 'Barista', 2000, 250, 0, 0, 0, 0),
(2, 'Alejandra Salázar', 'Barista', 2350, 250, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `user` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `tipo` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`user`, `password`, `tipo`) VALUES
('admin', '123', 'Admin'),
('trabajador', '456', 'Trabajador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
