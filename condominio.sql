-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-04-2024 a las 04:51:51
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
-- Base de datos: `condominiovane`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuota`
--

CREATE TABLE `cuota` (
  `id_cuota` int(3) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `monto` float DEFAULT NULL,
  `id_pagos` int(3) DEFAULT NULL,
  `id_inmobiliaria` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `id_gastos` int(3) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `monto` float DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `id_tipogasto` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `gastos`
--

INSERT INTO `gastos` (`id_gastos`, `nombre`, `monto`, `fecha`, `id_tipogasto`) VALUES
(1, 'Electricidad', 120, '2024-03-15 00:00:00', 2),
(2, 'Electricidad', 120, '2024-03-15 00:00:00', 2),
(3, 'Electricidad', 120, '2024-03-15 00:00:00', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmobiliaria`
--

CREATE TABLE `inmobiliaria` (
  `id_inmobiliaria` int(5) NOT NULL,
  `cant_cuartos` int(2) DEFAULT NULL,
  `metros` float DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `alicuota` varchar(50) DEFAULT NULL,
  `id_propietario` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inmobiliaria`
--

INSERT INTO `inmobiliaria` (`id_inmobiliaria`, `cant_cuartos`, `metros`, `direccion`, `alicuota`, `id_propietario`) VALUES
(1, 5, 2300, 'carrera 20 entre calles 17 y 19', '3.5', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_pagos` int(3) NOT NULL,
  `fecha` date NOT NULL,
  `monto` float DEFAULT NULL,
  `referencia` int(6) NOT NULL,
  `id_tasadia` int(3) DEFAULT NULL,
  `id_tipopago` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietario`
--

CREATE TABLE `propietario` (
  `id_propietario` int(3) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `cedula` varchar(9) DEFAULT NULL,
  `telefono` varchar(14) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `propietario`
--

INSERT INTO `propietario` (`id_propietario`, `nombre`, `apellido`, `cedula`, `telefono`, `correo`) VALUES
(1, 'Cesar', 'Guedez', '29868277', '04145289380', 'cesarguedez@gmail.com'),
(7, 'Adrian', 'Martinez', '29834360', '04245289380', 'adrianmartinez@gmail.com'),
(8, 'Vanessa', 'Guedez', '27258518', '04124734126', 'vaneshaguedez@gmail.com'),
(9, 'Paola', 'Escalona', '29467360', '04148565039', 'paoleishonescalona@gmail.com'),
(10, 'Agapita', 'Lopez', '7461194', '041426528560', 'agapitadelcarmen@gmail.com'),
(11, 'Mariam', 'Martinez', '30456123', '02514432324', 'mm.0530@gmail.com'),
(12, 'Jonni', 'Guedez', '7323207', '04127659870', 'jonnymanuelguedez@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasa_del_dia`
--

CREATE TABLE `tasa_del_dia` (
  `id_tasadia` int(3) NOT NULL,
  `valor` float DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tasa_del_dia`
--

INSERT INTO `tasa_del_dia` (`id_tasadia`, `valor`, `fecha`) VALUES
(1, 38.3, '2024-03-27 00:00:00'),
(2, 38.97, '2024-03-28 00:00:00'),
(3, 38.76, '2024-03-29 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_de_pago`
--

CREATE TABLE `tipo_de_pago` (
  `id_tipopago` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_de_pago`
--

INSERT INTO `tipo_de_pago` (`id_tipopago`, `nombre`) VALUES
(1, 'Pago Móvil'),
(2, 'Transferencia'),
(3, 'Zelle');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_gastos`
--

CREATE TABLE `tipo_gastos` (
  `id_tipogasto` int(3) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_gastos`
--

INSERT INTO `tipo_gastos` (`id_tipogasto`, `nombre`) VALUES
(1, 'Externo'),
(2, 'Interno'),
(3, 'Medida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `id_propietario` int(3) NOT NULL,
  `id_pagos` int(3) NOT NULL,
  `id_inmobiliaria` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuota`
--
ALTER TABLE `cuota`
  ADD KEY `fk_id_pagos` (`id_pagos`),
  ADD KEY `fk_id_inmobiliaria` (`id_inmobiliaria`);

--
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`id_gastos`),
  ADD KEY `fk_id_tipogasto` (`id_tipogasto`);

--
-- Indices de la tabla `inmobiliaria`
--
ALTER TABLE `inmobiliaria`
  ADD PRIMARY KEY (`id_inmobiliaria`),
  ADD KEY `id_propietario` (`id_propietario`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_pagos`),
  ADD KEY `id_tasadia` (`id_tasadia`),
  ADD KEY `id_tipopago` (`id_tipopago`);

--
-- Indices de la tabla `propietario`
--
ALTER TABLE `propietario`
  ADD PRIMARY KEY (`id_propietario`);

--
-- Indices de la tabla `tasa_del_dia`
--
ALTER TABLE `tasa_del_dia`
  ADD PRIMARY KEY (`id_tasadia`);

--
-- Indices de la tabla `tipo_de_pago`
--
ALTER TABLE `tipo_de_pago`
  ADD PRIMARY KEY (`id_tipopago`);

--
-- Indices de la tabla `tipo_gastos`
--
ALTER TABLE `tipo_gastos`
  ADD PRIMARY KEY (`id_tipogasto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_propietario` (`id_propietario`),
  ADD KEY `id_inmobiliaria` (`id_inmobiliaria`),
  ADD KEY `id_pagos` (`id_pagos`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `id_gastos` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `inmobiliaria`
--
ALTER TABLE `inmobiliaria`
  MODIFY `id_inmobiliaria` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `propietario`
--
ALTER TABLE `propietario`
  MODIFY `id_propietario` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tasa_del_dia`
--
ALTER TABLE `tasa_del_dia`
  MODIFY `id_tasadia` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_de_pago`
--
ALTER TABLE `tipo_de_pago`
  MODIFY `id_tipopago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_gastos`
--
ALTER TABLE `tipo_gastos`
  MODIFY `id_tipogasto` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuota`
--
ALTER TABLE `cuota`
  ADD CONSTRAINT `fk_id_inmobiliaria` FOREIGN KEY (`id_inmobiliaria`) REFERENCES `inmobiliaria` (`id_inmobiliaria`);

--
-- Filtros para la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD CONSTRAINT `fk_id_tipogasto` FOREIGN KEY (`id_tipogasto`) REFERENCES `tipo_gastos` (`id_tipogasto`);

--
-- Filtros para la tabla `inmobiliaria`
--
ALTER TABLE `inmobiliaria`
  ADD CONSTRAINT `fk_id_propietario` FOREIGN KEY (`id_propietario`) REFERENCES `propietario` (`id_propietario`),
  ADD CONSTRAINT `inmobiliaria_ibfk_1` FOREIGN KEY (`id_propietario`) REFERENCES `propietario` (`id_propietario`);

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `id_tasadia` FOREIGN KEY (`id_tasadia`) REFERENCES `tasa_del_dia` (`id_tasadia`),
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`id_tipopago`) REFERENCES `tipo_de_pago` (`id_tipopago`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `id_inmobiliaria` FOREIGN KEY (`id_inmobiliaria`) REFERENCES `inmobiliaria` (`id_inmobiliaria`),
  ADD CONSTRAINT `id_pagos` FOREIGN KEY (`id_pagos`) REFERENCES `pagos` (`id_pagos`),
  ADD CONSTRAINT `id_propietario` FOREIGN KEY (`id_propietario`) REFERENCES `propietario` (`id_propietario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
