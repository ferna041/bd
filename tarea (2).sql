-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-06-2023 a las 02:12:19
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

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_resenas_hoteles` (IN `user_id` INT(3))   BEGIN
    SELECT * FROM reseñas_hoteles INNER JOIN hoteles ON reseñas_hoteles.productos_id=hoteles.productos_id and reseñas_hoteles.usuario_id=user_id ORDER BY reseñas_hoteles.fecha_reseña;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `busqueda`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `busqueda` (
`Paquete` int(11)
,`Hotel` int(11)
,`NombrePaquete` varchar(40)
,`NombreHotel` varchar(40)
,`Ciudad` varchar(40)
,`Ida` date
,`Vuelta` date
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `usuario_id` int(11) NOT NULL,
  `productos_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`usuario_id`, `productos_id`, `cantidad`) VALUES
(7, 32, 1),
(7, 11, 1);

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
(34, 12),
(32, 12),
(23, 12),
(45, 12),
(38, 12),
(23, 7),
(35, 7),
(41, 7),
(43, 7),
(44, 7),
(45, 7),
(39, 7),
(1, 7),
(3, 7),
(6, 7),
(8, 7),
(9, 7),
(7, 7),
(13, 7),
(39, 6),
(33, 6),
(32, 6),
(41, 6),
(42, 6),
(1, 6),
(18, 6),
(30, 6),
(29, 6),
(43, 9),
(36, 9),
(14, 9),
(23, 9),
(45, 9),
(8, 9),
(38, 9),
(23, 2),
(30, 2),
(8, 4),
(4, 7),
(38, 7),
(2, 7),
(31, 7),
(33, 7);

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
(1, 'Hotel del Mar', 4, 75000, 'Valparaíso', 9, 20, 1, 1, 1, 1, 1),
(2, 'Hotel Bella Vista', 3, 50000, 'Viña del Mar', 4, 15, 0, 1, 1, 0, 1),
(3, 'Gran Hotel Santiago', 5, 120000, 'Santiago', 41, 50, 1, 1, 1, 1, 1),
(4, 'Hotel Los Andes', 3, 30000, 'Linares', 2, 10, 0, 0, 0, 0, 0),
(5, 'Hotel Montaña Azul', 3, 65000, 'Puerto Varas', 25, 25, 1, 0, 1, 1, 1),
(6, 'Hotel Central', 4, 85000, 'Valdivia', 29, 30, 1, 1, 0, 1, 1),
(7, 'Hotel El Bosque', 3, 45000, 'La Serena', 19, 20, 1, 0, 1, 1, 0),
(8, 'Hotel Oasis', 2, 28000, 'Antofagasta', 8, 12, 1, 0, 0, 1, 1),
(9, 'Gran Hotel del Sur', 5, 110000, 'Concepción', 39, 40, 1, 1, 1, 1, 1),
(10, 'Hotel Estelar', 4, 78000, 'Arica', 21, 22, 0, 1, 1, 0, 1),
(11, 'Hotel Plaza', 3, 55000, 'Iquique', 18, 18, 1, 0, 0, 1, 0),
(12, 'Hotel Colón', 2, 32000, 'Talca', 13, 14, 1, 0, 0, 0, 0),
(13, 'Hotel Aurora', 3, 68000, 'Punta Arenas', 25, 26, 1, 1, 1, 0, 1),
(14, 'Gran Hotel del Norte', 5, 125000, 'Calama', 54, 55, 1, 1, 1, 1, 1),
(15, 'Hotel Bahía', 4, 82000, 'Isla de Pascua', 27, 28, 0, 1, 1, 1, 1),
(16, 'Hotel El Faro', 3, 48000, 'Coquimbo', 16, 16, 0, 0, 1, 1, 0),
(17, 'Hotel Montañas Verdes', 2, 35000, 'Curicó', 12, 12, 1, 0, 0, 0, 1),
(18, 'Hotel Austral', 4, 72000, 'Puerto Natales', 23, 24, 1, 0, 1, 0, 1),
(19, 'Gran Hotel del Valle', 5, 118000, 'Temuco', 44, 45, 1, 1, 1, 1, 1),
(20, 'Hotel Estrella del Norte', 3, 52000, 'Copiapó', 18, 18, 1, 0, 0, 1, 0),
(21, 'Hotel Céntrico', 2, 30000, 'Rancagua', 10, 10, 1, 0, 0, 0, 0),
(22, 'Hotel Costa Sur', 3, 68000, 'La Serena', 26, 26, 1, 1, 0, 1, 1),
(23, 'Gran Hotel del Lago', 5, 125000, 'Puerto Montt', 46, 55, 1, 1, 1, 1, 1),
(24, 'Hotel Playa Blanca', 4, 82000, 'Iquique', 28, 28, 0, 1, 1, 1, 1),
(25, 'Hotel Oasis del Valle', 3, 48000, 'Curicó', 16, 16, 0, 0, 1, 1, 0),
(26, 'Hotel del Bosque', 2, 35000, 'Villarrica', 12, 12, 1, 0, 0, 0, 1),
(27, 'Hotel Austral del Sur', 4, 72000, 'Punta Arenas', 24, 24, 1, 0, 1, 0, 1),
(28, 'Gran Hotel del Mar', 5, 118000, 'Viña del Mar', 45, 45, 1, 1, 1, 1, 1),
(29, 'Hotel Montañas del Norte', 3, 52000, 'Copiapó', 17, 18, 1, 0, 0, 1, 0),
(30, 'Hotel Céntrico Sur', 2, 30000, 'Pucón', 8, 10, 1, 0, 0, 0, 0);

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
(31, 'Sur de Chile Basic', 'JetSamart', 'JetSamart', '2023-06-04', '2023-06-07', 3, 350000, 24, 25, 3),
(32, 'Sur de Chile Medium', 'LATAM', 'LATAM', '2023-07-05', '2023-07-09', 4, 600000, 32, 35, 4),
(33, 'Sur de Chile HIGH QUALITY', 'Jetsmart', 'jetsmart', '2023-07-10', '2023-07-16', 6, 1000000, 27, 30, 6),
(34, 'Sur de Chile PREMIUM', 'Jetsmart', 'Jetsmart', '2023-07-20', '2023-07-27', 7, 1450000, 29, 30, 6),
(35, 'Norte del País Basic', 'latam', 'latam', '2023-08-14', '2023-08-17', 3, 350000, 40, 41, 3),
(36, 'Norte del País Medium', 'latam', 'latam', '2023-07-15', '2023-07-19', 4, 600000, 19, 20, 4),
(37, 'Norte del País HIGH QUALITY', 'jetsmart', 'latam', '2023-07-20', '2023-07-26', 6, 1000000, 12, 12, 6),
(38, 'Norte del País PREMIUM', 'jetsmart', 'jetsmart', '2023-08-03', '2023-08-10', 7, 1450000, 44, 50, 6),
(40, 'Paseo Central Medium', 'latam', 'latam', '2023-08-19', '2023-08-23', 4, 350000, 15, 15, 4),
(42, 'Paseo Central PREMIUM', 'latam', 'latam', '2023-08-13', '2023-08-20', 7, 1450000, 29, 30, 6),
(41, 'oe pucón, no de villarica choro', 'latam', 'latam', '2023-08-10', '2023-08-13', 3, 350000, 35, 37, 6),
(39, '$HILE', 'latam', 'latam', '2023-08-20', '2023-08-26', 6, 1700000, 30, 32, 3),
(43, 'Playas paradisiacas', 'jetsmart', 'latam', '2023-09-01', '2023-09-06', 5, 1000000, 29, 31, 5),
(44, 'Descanso y Relax', 'jetsmart', 'latam', '2023-08-25', '2023-08-29', 4, 400000, 26, 27, 5),
(45, 'Ruta del Vino', 'jetsmart', 'latam', '2023-09-03', '2023-09-07', 4, 300000, 45, 51, 5);

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
(0, 0),
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
-- Estructura de tabla para la tabla `reseñas_hoteles`
--

CREATE TABLE `reseñas_hoteles` (
  `productos_id` int(5) DEFAULT NULL,
  `usuario_id` int(5) DEFAULT NULL,
  `limpieza` int(2) DEFAULT NULL,
  `servicio` int(2) DEFAULT NULL,
  `decoración` int(2) DEFAULT NULL,
  `calidad_camas` int(2) DEFAULT NULL,
  `Reseña` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `fecha_reseña` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reseñas_hoteles`
--

INSERT INTO `reseñas_hoteles` (`productos_id`, `usuario_id`, `limpieza`, `servicio`, `decoración`, `calidad_camas`, `Reseña`, `fecha_reseña`) VALUES
(23, 12, 4, 5, 5, 3, 'Bastante bueno, lo recomiendo totalmente', '2023-06-08'),
(23, 7, NULL, NULL, NULL, NULL, NULL, NULL),
(1, 7, 3, 3, 3, 4, 'miamiiiii chee', '2023-06-08'),
(3, 7, 1, 2, 3, 2, '', '2023-06-08'),
(6, 7, 4, 2, 3, 5, 're piola', '2023-06-08'),
(8, 7, 5, 5, 5, 5, 'picantovich', '2023-06-08'),
(9, 7, 4, 1, 4, 2, 'BUENAAAARRRDOOOO', '2023-06-08'),
(7, 7, 3, 1, 3, 2, '', '2023-06-08'),
(13, 7, 1, 1, 1, 1, '', '2023-06-08'),
(1, 6, 1, 3, 4, 3, 'el de la izquierda es mi hijo', '2023-06-08'),
(18, 6, 3, 2, 3, 3, 'piolei', '2023-06-08'),
(30, 6, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 6, 2, 2, 3, 1, '', '2023-06-08'),
(14, 9, 2, 1, 3, 3, '', '2023-06-08'),
(23, 9, 4, 5, 4, 5, 'fiiiinooooo', '2023-06-08'),
(8, 9, 4, 4, 5, 3, 'weno weno', '2023-06-08'),
(23, 2, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 2, 1, 1, 1, 1, '', '2023-06-08'),
(8, 4, 5, 4, 4, 4, 'omega lul lmao xddddd lol eso fue muy tryhard ', '2023-06-08'),
(4, 7, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 7, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Disparadores `reseñas_hoteles`
--
DELIMITER $$
CREATE TRIGGER `reseñas->compras` AFTER INSERT ON `reseñas_hoteles` FOR EACH ROW INSERT INTO compras VALUES (new.productos_id,new.usuario_id)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reseñas_paquetes`
--

CREATE TABLE `reseñas_paquetes` (
  `productos_id` int(5) NOT NULL,
  `usuario_id` int(5) NOT NULL,
  `calidad_hoteles` int(1) DEFAULT NULL,
  `transporte` int(1) DEFAULT NULL,
  `reseña` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `servicio` int(2) DEFAULT NULL,
  `precio_calidad` int(2) DEFAULT NULL,
  `reseña_fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reseñas_paquetes`
--

INSERT INTO `reseñas_paquetes` (`productos_id`, `usuario_id`, `calidad_hoteles`, `transporte`, `reseña`, `servicio`, `precio_calidad`, `reseña_fecha`) VALUES
(34, 12, 4, 2, 'Muy caro para lo que ofrecen, y los cabros muy pesaos', 4, 2, '2023-06-08'),
(32, 12, 2, 3, '', 4, 4, '2023-06-08'),
(45, 12, 3, 2, '', 4, 3, '2023-06-08'),
(38, 12, 5, 2, '', 4, 4, '2023-06-08'),
(35, 7, 3, 1, '', 3, 4, '2023-06-08'),
(41, 7, 4, 3, 'posta', 2, 4, '2023-06-08'),
(43, 7, 3, 5, 'che lo mejorcito para acostrumbrarse eeeeeehh eeeee a miami ehhhh catar', 4, 5, '2023-06-08'),
(44, 7, 3, 2, '', 3, 1, '2023-06-08'),
(45, 7, 2, 1, 'muy calentito para mi che', 1, 1, '2023-06-08'),
(39, 7, 1, 3, '', 1, 1, '2023-06-08'),
(39, 6, 3, 4, 'SIUUUUUUUUUUUUU', 3, 5, '2023-06-08'),
(33, 6, 3, 1, '', 2, 1, '2023-06-08'),
(32, 6, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 6, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 6, 2, 4, 'eu crep k tienen envidia de me', 3, 3, '2023-06-08'),
(43, 9, 2, 1, 'asdadaadsfadb dgmt', 2, 1, '2023-06-08'),
(36, 9, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 9, 4, 3, 'good', 3, 5, '2023-06-08'),
(38, 9, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 7, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 7, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 7, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Disparadores `reseñas_paquetes`
--
DELIMITER $$
CREATE TRIGGER `reseñas->compras2` AFTER INSERT ON `reseñas_paquetes` FOR EACH ROW INSERT INTO compras VALUES (new.productos_id,new.usuario_id)
$$
DELIMITER ;

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
(1, 'NPC', 'apellido generico', 'gmail@gmail.com', '2023-09-02', '123'),
(2, 'joan', 'laporta ', 'HOTMAIL@gmail.com', '2020-03-02', '123'),
(3, 'juanito', 'juanito ', 'juan@gmail.com', '2010-03-02', '123'),
(4, 'xX_pvp_Xx', 'gamer ', 'gamer@gmail.com', '2009-03-02', '123'),
(5, 'miguelito', 'apellido ', 'HOt@gmail.com', '2000-03-02', '123'),
(6, 'cr7', 'el bichoo ', 'cr7@gmail.com', '2001-03-02', '123'),
(7, 'frionel', 'pessi ', 'tengofrio@gmail.com', '2040-03-02', '123'),
(8, 'seba', 'abes ', 'ses@gmail.com', '2023-03-02', '123'),
(9, 'usuario1', 'npc', 'npc1@hotmail.com', '2023-06-02', '123'),
(10, 'usuario2', 'npc2', 'npccc@gmail.cl', '2023-06-03', '123'),
(11, 'NPC', 'generico', 'lal@gmail.com', '2023-05-31', '123'),
(12, 'fenia', 'lol', 'fer.shalgadom@gmail.com', '2023-06-03', '34634');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wishlist`
--

CREATE TABLE `wishlist` (
  `usuario_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estructura para la vista `busqueda`
--
DROP TABLE IF EXISTS `busqueda`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `busqueda`  AS SELECT `hoteles_paquetes`.`paquetes_id` AS `Paquete`, `hoteles_paquetes`.`hoteles_id` AS `Hotel`, `paquetes`.`paquetes_nombre` AS `NombrePaquete`, `hoteles`.`hoteles_nombre` AS `NombreHotel`, `hoteles`.`hoteles_ciudad` AS `Ciudad`, `paquetes`.`paquetes_fechaida` AS `Ida`, `paquetes`.`paquetes_fechavuelta` AS `Vuelta` FROM ((`hoteles_paquetes` join `hoteles` on(`hoteles_paquetes`.`hoteles_id` = `hoteles`.`productos_id`)) join `paquetes` on(`hoteles_paquetes`.`paquetes_id` = `paquetes`.`productos_id`)) ;

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
  MODIFY `producto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
