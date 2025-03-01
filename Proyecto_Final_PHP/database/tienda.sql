-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-03-2025 a las 00:52:41
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(255) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(11, 'Mandos'),
(12, 'Consolas'),
(13, 'Juegos ps4'),
(15, 'JUEGOS DS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas_pedidos`
--

CREATE TABLE `lineas_pedidos` (
  `id` int(255) NOT NULL,
  `pedido_id` int(255) NOT NULL,
  `producto_id` int(255) NOT NULL,
  `unidades` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(255) NOT NULL,
  `usuario_id` int(255) NOT NULL,
  `provincia` varchar(100) NOT NULL,
  `localidad` varchar(100) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `coste` float(200,2) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(255) NOT NULL,
  `categoria_id` int(255) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` float(100,2) NOT NULL,
  `stock` int(255) NOT NULL,
  `oferta` varchar(2) NOT NULL,
  `fecha` date NOT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `categoria_id`, `nombre`, `descripcion`, `precio`, `stock`, `oferta`, `fecha`, `imagen`) VALUES
(7, 11, 'Mando XBOX', 'MANDO', 30.00, 50, '0', '2025-03-01', 'mando xbox.jpg'),
(8, 11, 'MANDO PS2', 'MANDO', 10.00, 70, '0', '2025-03-01', 'mando ps2.jpg'),
(9, 11, 'MANDO SUPER NINTENDO', 'MANDO ', 40.00, 80, '0', '2025-03-01', 'mando super nintendo.jpg'),
(10, 11, 'MANDO PS4', 'MANDO', 90.00, 70, '0', '2025-03-01', 'mando ps4.jpg'),
(11, 13, 'Battlefield 1 ', 'Bt', 50.00, 2, '0', '2025-03-01', 'BF1-PS4-B.jpg'),
(12, 13, 'Control', 'c', 6.00, 90, '0', '2025-03-01', 'control_ps4.jpg'),
(13, 13, 'God of War', 'gow', 90.00, 40, '0', '2025-03-01', 'a14fe5bce6f1458be3eee1b4b723d3f6.jpg'),
(14, 13, 'Call of duty', 'cod', 80.00, 56, '0', '2025-03-01', 'Call-of-Duty-Modern-Warfare-PS4-EU.jpg'),
(15, 13, 'The surge', 'ts', 13.00, 133, '0', '2025-03-01', 'sirge.jpg'),
(16, 13, 'The Last of Us 2', 'tlou', 70.00, 2, '0', '2025-03-01', '712f750f783b98bcd600243b74ad08d8.jpg'),
(17, 12, 'Nintendo Switch', 'ns', 190.00, 60, '0', '2025-03-01', '155c4cd3a00d8414e67f8039bf39d0247108f6ee.jpeg'),
(18, 12, 'Play Station 4', 'Ps4', 200.00, 60, '0', '2025-03-01', '71iKdXqlx2L.jpg'),
(20, 12, 'Play Station 5', 'PS', 250.00, 50, '0', '2025-03-01', '51NbBH89m1L.jpg'),
(21, 15, 'SUPER MARIO', 'MARIO', 8.00, 70, '0', '2025-03-01', 'SUPERM.jpeg'),
(22, 15, 'MARIO KART', 'MK', 15.00, 800, '0', '2025-03-01', 'MK.jpeg'),
(23, 15, 'CARS', 'CAR', 70.00, 8, '0', '2025-03-01', 'Cars DS.jpg'),
(25, 15, 'MARIO Y SONIC EN LOS JUEGOS OLIMPICOS', 'MS', 40.00, 40, '0', '2025-03-01', '5178228-mario-sonic-at-the-olympic-games-nintendo-ds-front-cover.jpg'),
(26, 11, 'MANDO SEGA', 'MS', 17.00, 80, '0', '2025-03-01', 'MANDO SEGA.jpeg'),
(33, 15, 'RESIDENT EVIL', 'MMMMMMMMMMMMMMMMMMMMMMMMMM', 78.00, 45, '0', '2025-03-01', 'RE.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(255) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` varchar(20) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `email`, `password`, `rol`, `imagen`) VALUES
(2, 'Pepe', 'Molina', 'AAAA@GMAIL.com', '$2y$04$6b3/B25KgoDOmkiipfPay.Po7sCTtN22J/4Yxr4d4UVMmXGG7XiCi', 'user', NULL),
(5, 'Daniel', 'Osuna', 'daniel@daniel.com', '$2y$04$ZMPw.fHU7dQbluTEtt/NfO2a2hLQ8gKX1Rc9EDIS8dWMWcrwCxY/2', 'admin', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lineas_pedidos`
--
ALTER TABLE `lineas_pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_linea_pedido` (`pedido_id`),
  ADD KEY `fk_linea_producto` (`producto_id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pedido_usuario` (`usuario_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_producto_categoria` (`categoria_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `lineas_pedidos`
--
ALTER TABLE `lineas_pedidos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `lineas_pedidos`
--
ALTER TABLE `lineas_pedidos`
  ADD CONSTRAINT `fk_linea_pedido` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`),
  ADD CONSTRAINT `fk_linea_producto` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_pedido_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
