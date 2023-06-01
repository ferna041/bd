-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2023 a las 16:24:55
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
-- Base de datos: `tarea`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `usuario_id` int(11) NOT NULL,
  `productos_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `productos_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`productos_id`, `usuario_id`) VALUES
(1, 1),
(33, 1),
(37, 1),
(34, 1),
(2, 1),
(4, 1),
(32, 3),
(2, 3),
(33, 3),
(4, 3),
(34, 3),
(38, 3),
(39, 3),
(42, 3),
(44, 3),
(43, 3),
(32, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoteles`
--

CREATE TABLE `hoteles` (
  `productos_id` int(11) NOT NULL,
  `hoteles_nombre` varchar(40) NOT NULL,
  `hoteles_estrellas` int(11) NOT NULL,
  `hoteles_precio` int(11) NOT NULL,
  `hoteles_ciudad` varchar(40) NOT NULL,
  `hoteles_habitacionesdisp` int(11) NOT NULL,
  `hoteles_habitacionestotales` int(11) NOT NULL,
  `hoteles_estacionamiento` tinyint(1) NOT NULL,
  `hoteles_piscina` tinyint(1) NOT NULL,
  `hoteles_lavanderia` tinyint(1) NOT NULL,
  `hoteles_petfriendly` tinyint(1) NOT NULL,
  `hoteles_desayuno` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `hoteles`
--

INSERT INTO `hoteles` (`productos_id`, `hoteles_nombre`, `hoteles_estrellas`, `hoteles_precio`, `hoteles_ciudad`, `hoteles_habitacionesdisp`, `hoteles_habitacionestotales`, `hoteles_estacionamiento`, `hoteles_piscina`, `hoteles_lavanderia`, `hoteles_petfriendly`, `hoteles_desayuno`) VALUES
(1, 'Hotel del Mar', 4, 75000, 'Valparaíso', 20, 20, 1, 1, 1, 1, 1),
(2, 'Hotel Bella Vista', 3, 50000, 'Viña del Mar', 15, 15, 0, 1, 1, 0, 1),
(3, 'Gran Hotel Santiago', 5, 120000, 'Santiago', 50, 50, 1, 1, 1, 1, 1),
(4, 'Hotel Los Andes', 3, 30000, 'Linares', 10, 10, 0, 0, 0, 0, 0),
(5, 'Hotel Montaña Azul', 3, 65000, 'Puerto Varas', 25, 25, 1, 0, 1, 1, 1),
(6, 'Hotel Central', 4, 85000, 'Valdivia', 30, 30, 1, 1, 0, 1, 1),
(7, 'Hotel El Bosque', 3, 45000, 'La Serena', 20, 20, 1, 0, 1, 1, 0),
(8, 'Hotel Oasis', 2, 28000, 'Antofagasta', 12, 12, 1, 0, 0, 1, 1),
(9, 'Gran Hotel del Sur', 5, 110000, 'Concepción', 40, 40, 1, 1, 1, 1, 1),
(10, 'Hotel Estelar', 4, 78000, 'Arica', 22, 22, 0, 1, 1, 0, 1),
(11, 'Hotel Plaza', 3, 55000, 'Iquique', 18, 18, 1, 0, 0, 1, 0),
(12, 'Hotel Colón', 2, 32000, 'Talca', 14, 14, 1, 0, 0, 0, 0),
(13, 'Hotel Aurora', 3, 68000, 'Punta Arenas', 26, 26, 1, 1, 1, 0, 1),
(14, 'Gran Hotel del Norte', 5, 125000, 'Calama', 55, 55, 1, 1, 1, 1, 1),
(15, 'Hotel Bahía', 4, 82000, 'Isla de Pascua', 28, 28, 0, 1, 1, 1, 1),
(16, 'Hotel El Faro', 3, 48000, 'Coquimbo', 16, 16, 0, 0, 1, 1, 0),
(17, 'Hotel Montañas Verdes', 2, 35000, 'Curicó', 12, 12, 1, 0, 0, 0, 1),
(18, 'Hotel Austral', 4, 72000, 'Puerto Natales', 24, 24, 1, 0, 1, 0, 1),
(19, 'Gran Hotel del Valle', 5, 118000, 'Temuco', 45, 45, 1, 1, 1, 1, 1),
(20, 'Hotel Estrella del Norte', 3, 52000, 'Copiapó', 18, 18, 1, 0, 0, 1, 0),
(21, 'Hotel Céntrico', 2, 30000, 'Rancagua', 10, 10, 1, 0, 0, 0, 0),
(22, 'Hotel Costa Sur', 3, 68000, 'La Serena', 26, 26, 1, 1, 0, 1, 1),
(23, 'Gran Hotel del Lago', 5, 125000, 'Puerto Montt', 55, 55, 1, 1, 1, 1, 1),
(24, 'Hotel Playa Blanca', 4, 82000, 'Iquique', 28, 28, 0, 1, 1, 1, 1),
(25, 'Hotel Oasis del Valle', 3, 48000, 'Curicó', 16, 16, 0, 0, 1, 1, 0),
(26, 'Hotel del Bosque', 2, 35000, 'Villarrica', 12, 12, 1, 0, 0, 0, 1),
(27, 'Hotel Austral del Sur', 4, 72000, 'Punta Arenas', 24, 24, 1, 0, 1, 0, 1),
(28, 'Gran Hotel del Mar', 5, 118000, 'Viña del Mar', 45, 45, 1, 1, 1, 1, 1),
(29, 'Hotel Montañas del Norte', 3, 52000, 'Copiapó', 18, 18, 1, 0, 0, 1, 0),
(30, 'Hotel Céntrico Sur', 2, 30000, 'Pucón', 10, 10, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoteles_paquetes`
--

CREATE TABLE `hoteles_paquetes` (
  `paquetes_id` int(11) NOT NULL,
  `hoteles_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `hoteles_paquetes`
--

INSERT INTO `hoteles_paquetes` (`paquetes_id`, `hoteles_id`) VALUES
(31, 26),
(31, 6),
(32, 12),
(32, 4),
(32, 13),
(33, 18),
(33, 5),
(33, 6),
(34, 19),
(34, 23),
(34, 9),
(35, 2),
(35, 7),
(35, 8),
(36, 1),
(36, 11),
(36, 20),
(37, 16),
(37, 28),
(37, 14),
(38, 14),
(38, 28),
(38, 24),
(39, 21),
(39, 2),
(40, 3),
(40, 28),
(40, 1),
(41, 17),
(41, 30),
(41, 26),
(42, 23),
(42, 3),
(42, 14),
(43, 28),
(43, 15),
(44, 25),
(44, 6),
(45, 4),
(45, 12),
(45, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquetes`
--

CREATE TABLE `paquetes` (
  `productos_id` int(11) NOT NULL,
  `paquetes_nombre` varchar(40) NOT NULL,
  `paquetes_airida` varchar(40) NOT NULL,
  `paquetes_airvuelta` varchar(40) NOT NULL,
  `paquetes_fechaida` date NOT NULL,
  `paquetes_fechavuelta` date NOT NULL,
  `paquetes_noches` int(11) NOT NULL,
  `paquetes_preciopp` int(11) NOT NULL,
  `paquetes_disponibles` int(11) NOT NULL,
  `paquetes_totales` int(11) NOT NULL,
  `paquetes_maxpp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `paquetes`
--

INSERT INTO `paquetes` (`productos_id`, `paquetes_nombre`, `paquetes_airida`, `paquetes_airvuelta`, `paquetes_fechaida`, `paquetes_fechavuelta`, `paquetes_noches`, `paquetes_preciopp`, `paquetes_disponibles`, `paquetes_totales`, `paquetes_maxpp`) VALUES
(31, 'Sur de Chile Basic', 'JetSamart', 'JetSamart', '2023-06-04', '2023-06-07', 3, 350000, 5, 5, 3),
(32, 'Sur de Chile Medium', 'LATAM', 'LATAM', '2023-07-05', '2023-07-09', 4, 600000, 5, 5, 4),
(33, 'Sur de Chile HIGH QUALITY', 'Jetsmart', 'jetsmart', '2023-07-10', '2023-07-16', 6, 1000000, 3, 3, 6),
(34, 'Sur de Chile PREMIUM', 'Jetsmart', 'Jetsmart', '2023-07-20', '2023-07-27', 7, 1450000, 3, 3, 6),
(35, 'Norte del País Basic', 'latam', 'latam', '2023-08-14', '2023-08-17', 3, 350000, 5, 5, 3),
(36, 'Norte del País Medium', 'latam', 'latam', '2023-07-15', '2023-07-19', 4, 600000, 5, 5, 4),
(37, 'Norte del País HIGH QUALITY', 'jetsmart', 'latam', '2023-07-20', '2023-07-26', 6, 1000000, 3, 3, 6),
(38, 'Norte del País PREMIUM', 'jetsmart', 'jetsmart', '2023-08-03', '2023-08-10', 7, 1450000, 3, 3, 6),
(40, 'Paseo Central Medium', 'latam', 'latam', '2023-08-19', '2023-08-23', 4, 350000, 5, 5, 4),
(42, 'Paseo Central PREMIUM', 'latam', 'latam', '2023-08-13', '2023-08-20', 7, 1450000, 3, 3, 6),
(41, 'oe pucón, no de villarica choro', 'latam', 'latam', '2023-08-10', '2023-08-13', 3, 350000, 3, 3, 6),
(39, '$HILE', 'latam', 'latam', '2023-08-20', '2023-08-26', 6, 1700000, 5, 5, 3),
(43, 'Playas paradisiacas', 'jetsmart', 'latam', '2023-09-01', '2023-09-06', 5, 1000000, 5, 5, 5),
(44, 'Descanso y Relax', 'jetsmart', 'latam', '2023-08-25', '2023-08-29', 4, 400000, 5, 5, 5),
(45, 'Ruta del Vino', 'jetsmart', 'latam', '2023-09-03', '2023-09-07', 4, 300000, 5, 5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `producto_id` int(11) NOT NULL,
  `producto_tipo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`producto_id`, `producto_tipo`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2),
(40, 2),
(41, 2),
(42, 2),
(43, 2),
(44, 2),
(45, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `usuario_nombre` varchar(40) NOT NULL,
  `usuario_apellido` varchar(40) NOT NULL,
  `usuario_email` varchar(80) NOT NULL,
  `usuario_fechanacimiento` date NOT NULL,
  `usuario_clave` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `usuario_nombre`, `usuario_apellido`, `usuario_email`, `usuario_fechanacimiento`, `usuario_clave`) VALUES
(1, 'Sebastian', 'Sepulveda', 'sebastian.sepulvedaf@usm.cl', '2023-05-21', 'seba123'),
(2, 'xupalo', 'ola', 'seba401hd@hotmail.com', '2023-05-07', 'seba123'),
(3, 'fenia', 'adskvjbe', 'fer.shalgadom@gmail.com', '2000-01-09', '123'),
(4, 'mili', 'milosa', 'mili@gmail.com', '2024-03-16', '321');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wishlist`
--

CREATE TABLE `wishlist` (
  `usuario_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `wishlist`
--

INSERT INTO `wishlist` (`usuario_id`, `producto_id`) VALUES
(3, 6),
(2, 1),
(3, 10),
(3, 11),
(3, 12),
(3, 13),
(3, 14),
(3, 34),
(3, 38),
(3, 36),
(3, 37),
(3, 42),
(3, 1),
(3, 1),
(3, 1),
(3, 1),
(1, 1),
(3, 32),
(4, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `productos_id` (`productos_id`);

--
-- Indices de la tabla `hoteles`
--
ALTER TABLE `hoteles`
  ADD KEY `productos_id` (`productos_id`);

--
-- Indices de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  ADD KEY `productos_id` (`productos_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`producto_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- Indices de la tabla `wishlist`
--
ALTER TABLE `wishlist`
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `producto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuario_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`productos_id`) REFERENCES `productos` (`producto_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hoteles`
--
ALTER TABLE `hoteles`
  ADD CONSTRAINT `hoteles_ibfk_1` FOREIGN KEY (`productos_id`) REFERENCES `productos` (`producto_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `paquetes`
--
ALTER TABLE `paquetes`
  ADD CONSTRAINT `paquetes_ibfk_1` FOREIGN KEY (`productos_id`) REFERENCES `productos` (`producto_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuario_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`producto_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
