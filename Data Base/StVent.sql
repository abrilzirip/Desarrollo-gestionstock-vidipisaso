-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-10-2023 a las 04:07:57
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbtest2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `ID_CATEGORIA` bigint(20) NOT NULL,
  `NOMBRE` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`ID_CATEGORIA`, `NOMBRE`) VALUES
(1, 'Almacen'),
(2, 'Bebidas'),
(3, 'Frescos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `ID_CLIENTE` bigint(20) NOT NULL,
  `ID_USUARIO_REGISTRADO` bigint(20) NOT NULL,
  `NOMBRE` char(255) NOT NULL,
  `APELLIDO` varchar(255) NOT NULL,
  `APODO` char(255) NOT NULL,
  `FECHA_ALTA` datetime NOT NULL,
  `FECHA_BAJA` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`ID_CLIENTE`, `ID_USUARIO_REGISTRADO`, `NOMBRE`, `APELLIDO`, `APODO`, `FECHA_ALTA`, `FECHA_BAJA`) VALUES
(1, 2, 'vicky', 'acevedo', 'vicky', '2023-10-22 03:15:56', NULL),
(2, 2, 'abril', 'abril', 'abril', '2023-10-21 22:18:35', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicador`
--

CREATE TABLE `indicador` (
  `ID_INDICADOR` bigint(20) NOT NULL,
  `ID_USUARIO_REGISTRADO` bigint(20) NOT NULL,
  `ID_CATEGORIA` bigint(20) NOT NULL,
  `ID_PRODUCTO` bigint(20) NOT NULL,
  `NOMBRE` char(255) NOT NULL,
  `NIVEL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `ID_PERFIL` bigint(20) NOT NULL,
  `DESCRIPCION` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`ID_PERFIL`, `DESCRIPCION`) VALUES
(1, 'Administrador'),
(2, 'Vendedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ID_PRODUCTO` bigint(20) NOT NULL,
  `ID_USUARIO_REGISTRADO` bigint(20) NOT NULL,
  `ID_SUBCATEGORIA` bigint(20) NOT NULL,
  `FECHA` datetime NOT NULL,
  `NOMBRE` char(250) NOT NULL,
  `MARCA` varchar(255) NOT NULL,
  `CANTIDAD` bigint(20) NOT NULL,
  `PROD_PRECIO_COMPRA` bigint(20) NOT NULL,
  `PROD_PRECIO_VENTA` bigint(20) NOT NULL,
  `DESCRIPCION` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ID_PRODUCTO`, `ID_USUARIO_REGISTRADO`, `ID_SUBCATEGORIA`, `FECHA`, `NOMBRE`, `MARCA`, `CANTIDAD`, `PROD_PRECIO_COMPRA`, `PROD_PRECIO_VENTA`, `DESCRIPCION`) VALUES
(1, 2, 1, '2023-10-13 05:26:29', 'Puré de Tomate 520 Gr', 'DIA', 10, 145, 249, 'n/a'),
(2, 2, 1, '2023-10-13 05:26:29', 'Granos de Choclo Amarillo 300 Gr', 'DIA', 10, 205, 399, 'n/a'),
(3, 2, 1, '2023-10-13 05:26:29', 'Durazno en Mitades 820 Gr', 'DIA', 10, 505, 700, 'n/a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

CREATE TABLE `subcategoria` (
  `ID_SUBCATEGORIA` bigint(20) NOT NULL,
  `ID_CATEGORIA` bigint(20) NOT NULL,
  `NOMBRE` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `subcategoria`
--

INSERT INTO `subcategoria` (`ID_SUBCATEGORIA`, `ID_CATEGORIA`, `NOMBRE`) VALUES
(1, 1, 'Conservas'),
(2, 2, 'Gaseosas'),
(3, 2, 'Cervezas'),
(4, 2, 'Vinos'),
(5, 3, 'Lacteos'),
(6, 3, 'Fiambreria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE `turno` (
  `ID_TURNO` bigint(20) NOT NULL,
  `T_MAÑANA_DESDE` time DEFAULT NULL,
  `T_MAÑANA_HASTA` time DEFAULT NULL,
  `T_TARDE_DESDE` time DEFAULT NULL,
  `T_TARDE_HASTA` time DEFAULT NULL,
  `T_NOCHE_DESDE` time DEFAULT NULL,
  `T_NOCHE_HASTA` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `turno`
--

INSERT INTO `turno` (`ID_TURNO`, `T_MAÑANA_DESDE`, `T_MAÑANA_HASTA`, `T_TARDE_DESDE`, `T_TARDE_HASTA`, `T_NOCHE_DESDE`, `T_NOCHE_HASTA`) VALUES
(1, '06:00:00', '12:00:00', NULL, NULL, NULL, NULL),
(2, NULL, NULL, '12:00:00', '18:00:00', NULL, NULL),
(3, NULL, NULL, NULL, NULL, '18:00:00', '24:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_USUARIO_REGISTRADO` bigint(20) NOT NULL,
  `ID_TURNO` bigint(20) NOT NULL,
  `ID_PERFIL` bigint(20) NOT NULL,
  `NOMBRE` varchar(255) NOT NULL,
  `PASSWORD` varchar(500) NOT NULL,
  `F_BAJA` datetime DEFAULT NULL,
  `F_ALTA` datetime NOT NULL,
  `MAIL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_USUARIO_REGISTRADO`, `ID_TURNO`, `ID_PERFIL`, `NOMBRE`, `PASSWORD`, `F_BAJA`, `F_ALTA`, `MAIL`) VALUES
(1, 1, 2, 'salvador', '123', NULL, '2023-10-13 04:38:49', 'salvador@gmail.com'),
(2, 1, 1, 'diego', '123', NULL, '2023-10-13 04:38:49', 'diego@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `ID_VENTA` bigint(20) NOT NULL,
  `ID_USUARIO_REGISTRADO` bigint(20) NOT NULL,
  `ID_PRODUCTO` bigint(20) NOT NULL,
  `FECHA` datetime NOT NULL,
  `HORA` datetime NOT NULL,
  `DESCRIPCION` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID_CATEGORIA`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ID_CLIENTE`),
  ADD KEY `ID_USUARIO_REGISTRADO` (`ID_USUARIO_REGISTRADO`);

--
-- Indices de la tabla `indicador`
--
ALTER TABLE `indicador`
  ADD PRIMARY KEY (`ID_INDICADOR`),
  ADD KEY `ID_USUARIO_REGISTRADO` (`ID_USUARIO_REGISTRADO`),
  ADD KEY `ID_CATEGORIA` (`ID_CATEGORIA`),
  ADD KEY `ID_PRODUCTO` (`ID_PRODUCTO`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`ID_PERFIL`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID_PRODUCTO`),
  ADD KEY `ID_USUARIO_REGISTRADO` (`ID_USUARIO_REGISTRADO`),
  ADD KEY `ID_SUBCATEGORIA` (`ID_SUBCATEGORIA`);

--
-- Indices de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`ID_SUBCATEGORIA`),
  ADD KEY `ID_CATEGORIA` (`ID_CATEGORIA`);

--
-- Indices de la tabla `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`ID_TURNO`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_USUARIO_REGISTRADO`),
  ADD KEY `ID_TURNO` (`ID_TURNO`),
  ADD KEY `ID_PERFIL` (`ID_PERFIL`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`ID_VENTA`),
  ADD KEY `ID_USUARIO_REGISTRADO` (`ID_USUARIO_REGISTRADO`),
  ADD KEY `ID_PRODUCTO` (`ID_PRODUCTO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID_CATEGORIA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ID_CLIENTE` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `indicador`
--
ALTER TABLE `indicador`
  MODIFY `ID_INDICADOR` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `ID_PERFIL` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ID_PRODUCTO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `ID_SUBCATEGORIA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `turno`
--
ALTER TABLE `turno`
  MODIFY `ID_TURNO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_USUARIO_REGISTRADO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `ID_VENTA` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`ID_USUARIO_REGISTRADO`) REFERENCES `usuario` (`ID_USUARIO_REGISTRADO`);

--
-- Filtros para la tabla `indicador`
--
ALTER TABLE `indicador`
  ADD CONSTRAINT `indicador_ibfk_1` FOREIGN KEY (`ID_USUARIO_REGISTRADO`) REFERENCES `usuario` (`ID_USUARIO_REGISTRADO`),
  ADD CONSTRAINT `indicador_ibfk_2` FOREIGN KEY (`ID_CATEGORIA`) REFERENCES `categoria` (`ID_CATEGORIA`),
  ADD CONSTRAINT `indicador_ibfk_3` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `producto` (`ID_PRODUCTO`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`ID_USUARIO_REGISTRADO`) REFERENCES `usuario` (`ID_USUARIO_REGISTRADO`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`ID_SUBCATEGORIA`) REFERENCES `subcategoria` (`ID_SUBCATEGORIA`);

--
-- Filtros para la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD CONSTRAINT `subcategoria_ibfk_1` FOREIGN KEY (`ID_CATEGORIA`) REFERENCES `categoria` (`ID_CATEGORIA`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ID_TURNO`) REFERENCES `turno` (`ID_TURNO`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`ID_PERFIL`) REFERENCES `perfil` (`ID_PERFIL`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`ID_USUARIO_REGISTRADO`) REFERENCES `usuario` (`ID_USUARIO_REGISTRADO`),
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `producto` (`ID_PRODUCTO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
