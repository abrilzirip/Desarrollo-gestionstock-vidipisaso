-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2023 a las 18:51:08
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
-- Base de datos: `stvent2`
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
  `FECHA_BAJA` datetime DEFAULT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`ID_CLIENTE`, `ID_USUARIO_REGISTRADO`, `NOMBRE`, `APELLIDO`, `APODO`, `FECHA_ALTA`, `FECHA_BAJA`, `Estado`) VALUES
(1, 2, 'generic', 'generic', 'generic', '2023-10-28 01:57:12', '2023-11-08 21:08:01', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id_detalle_venta` int(11) NOT NULL,
  `ID_VENTA` int(11) NOT NULL,
  `ID_PRODUCTO` int(11) NOT NULL,
  `precio` float NOT NULL,
  `cantidad` int(11) NOT NULL,
  `TOTAL` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id_detalle_venta`, `ID_VENTA`, `ID_PRODUCTO`, `precio`, `cantidad`, `TOTAL`) VALUES
(648, 335, 37, 1855.25, 1, 1855.25),
(650, 337, 37, 1855.25, 1, 1855.25),
(651, 338, 37, 1855.25, 1, 1855.25),
(652, 339, 78, 500.32, 2, 1000.64),
(653, 339, 93, 427.2, 1, 1427.84),
(654, 339, 108, 2890.3, 1, 4318.14),
(655, 340, 108, 2890.3, 1, 2890.3),
(656, 340, 94, 516.2, 1, 3406.5),
(657, 341, 93, 427.2, 1, 427.2),
(658, 341, 106, 858, 1, 1285.2),
(660, 342, 93, 427.2, 1, 907.5),
(661, 342, 72, 300.33, 1, 1207.83),
(663, 343, 101, 430.3, 2, 1340.9),
(664, 343, 72, 300.33, 1, 1641.23),
(665, 343, 99, 966.3, 1, 2607.53),
(667, 344, 95, 866.2, 2, 2212.7),
(668, 345, 19, 480.3, 1, 480.3),
(669, 346, 19, 480.3, 1, 480.3),
(670, 347, 19, 480.3, 1, 480.3),
(671, 348, 19, 480.3, 1, 480.3),
(672, 349, 19, 480.3, 1, 480.3),
(673, 350, 19, 480.3, 1, 480.3),
(674, 351, 19, 480.3, 1, 480.3),
(675, 352, 19, 480.3, 1, 480.3),
(676, 353, 19, 480.3, 1, 480.3),
(677, 354, 80, 805.2, 1, 805.2),
(678, 355, 78, 500.32, 1, 500.32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicador`
--

CREATE TABLE `indicador` (
  `ID_INDICADOR` bigint(20) NOT NULL,
  `ID_USUARIO_REGISTRADO` bigint(20) NOT NULL,
  `ID_CATEGORIA` bigint(20) NOT NULL,
  `ID_PRODUCTO` bigint(20) NOT NULL,
  `NIVEL` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `operacion` varchar(250) NOT NULL,
  `detalle` varchar(250) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `log`
--

INSERT INTO `log` (`id`, `fecha`, `operacion`, `detalle`, `id_usuario`, `perfil`) VALUES
(1, '2023-11-21 14:10:56', 'log-in', 'Inicio de sesion del usuario', 1, 2),
(2, '2023-11-21 14:06:39', 'Actualizo', 'Cerveza Stout Lata 473cc Agrego 1', 1, 2),
(3, '2023-11-21 14:08:15', 'Actualizo', 'Cerveza Stout Lata 473cc Agrego 1', 1, 2),
(4, '2023-11-21 14:08:46', 'Actualizo', 'Mantenca 500 grs La serenisima Agrego 1', 1, 2),
(5, '2023-11-21 14:09:29', 'Actualizo', 'Alfajor 250grs Milka Agrego 1', 1, 2),
(6, '2023-11-21 14:10:00', 'Actualizo', 'Fideos largos 300 grs Matarazo Agrego 1', 1, 2),
(7, '2023-11-21 14:10:32', 'Actualizo', 'Cerveza Stout Lata 473cc Actualizo 1', 1, 2),
(8, '2023-11-21 14:11:10', 'Actualizo', 'Fideos tallarines hierro 500 g Favorita Agrego 1', 1, 2),
(9, '2023-11-21 14:13:22', 'Actualizo', 'Cerveza Stout Lata 473cc Agrego 1', 1, 2),
(10, '2023-11-21 14:17:31', 'Actualizo', 'Fideos tallarines hierro 500 g Favorita Agrego 1', 1, 2),
(11, '2023-11-21 14:17:57', 'Actualizo', 'Cerveza Stout Lata 473cc Actualizo 1', 1, 2),
(12, '2023-11-21 14:37:01', 'Venta', 'Realizo la Venta Nº 354', 1, 2),
(13, '2023-11-21 14:38:21', 'Venta', 'Realizo la Venta Nº 355', 1, 2);

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
  `ID_PRODUCTO` int(11) NOT NULL,
  `ID_USUARIO_REGISTRADO` bigint(20) NOT NULL,
  `ID_SUBCATEGORIA` bigint(20) NOT NULL,
  `FECHA` datetime NOT NULL,
  `NOMBRE` varchar(250) NOT NULL,
  `MARCA` varchar(255) NOT NULL,
  `CANTIDAD` bigint(20) NOT NULL,
  `PROD_PRECIO_COMPRA` float NOT NULL,
  `PROD_PRECIO_VENTA` float NOT NULL,
  `PESO_GRAMOS` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ID_PRODUCTO`, `ID_USUARIO_REGISTRADO`, `ID_SUBCATEGORIA`, `FECHA`, `NOMBRE`, `MARCA`, `CANTIDAD`, `PROD_PRECIO_COMPRA`, `PROD_PRECIO_VENTA`, `PESO_GRAMOS`) VALUES
(19, 2, 3, '2023-10-13 05:26:29', 'Cerveza blanca hinchada en lata 473 cc', 'Quilmes', 0, 400, 480.3, 0),
(24, 2, 5, '2023-10-13 05:26:29', 'Yogur firme frutilla Clásico 120gr', 'La Serenísima', 11, 98, 177.3, 0),
(32, 2, 2, '2023-11-09 00:30:48', 'Cola 2.25 litros', 'Manaos', 155, 400, 450.99, 0),
(33, 2, 6, '2023-11-09 00:31:57', 'Mortadela ', '214', 10, 4500, 6500, 3000),
(34, 2, 5, '2023-11-09 00:34:52', 'Queso', 'Barraza', 10, 2200, 4500, 3250),
(35, 2, 1, '2023-11-09 00:36:23', 'Harina 000 1 kilo', 'Marolio', 10, 250, 500.55, 0),
(36, 2, 1, '2023-11-09 00:39:05', 'Pure de tomate 520grs', 'DIA', 10, 300, 452.55, 0),
(37, 2, 4, '2023-11-09 00:41:39', 'Vino Malbec 750cc ', 'Alma Mora', 4997, 1300, 1855.25, 0),
(72, 2, 1, '2023-11-09 00:58:13', 'Alfajor 250grs', 'Milka', 298, 150, 300.33, 0),
(73, 2, 1, '2023-11-09 00:59:30', 'Durazno mitades 520grs', 'DIA', 40, 500, 600.55, 0),
(76, 2, 2, '2023-11-09 23:27:38', 'Naranja 1.25 litros', 'Manaos', 10, 300, 400.5, 0),
(77, 2, 1, '2023-11-09 23:31:15', 'Fideos largos 300 grs', 'Matarazo', 10, 300, 450.66, 0),
(78, 2, 5, '2023-11-09 23:43:53', 'Mantenca 500 grs', 'La serenisima', 17, 400, 500.32, 0),
(79, 2, 1, '2023-11-10 00:38:09', 'Chocolate 200 grs', 'Milka', 20, 300, 450.88, 0),
(80, 2, 3, '2023-11-10 01:58:10', 'Cerveza Stout Lata 473cc', 'Quilmes', 31, 700, 805.2, 0),
(81, 2, 1, '2023-10-13 05:26:29', 'Granos de Choclo Amarillo 300 Gr', 'DIA', 10, 205, 399.1, 0),
(82, 2, 1, '2023-10-13 05:26:29', 'Pure de tomate 520 g', 'La Campagnola', 10, 180, 279.1, 0),
(83, 2, 1, '2023-10-13 05:26:29', 'Fideos tirabuzones 3 vegetales 500', 'Matarazzo', 10, 290, 371.1, 0),
(84, 2, 1, '2023-10-13 05:26:29', 'Fideos tallarines hierro 500 g', 'Favorita', 10, 100, 190.1, 0),
(85, 2, 1, '2023-10-13 05:26:29', 'Harina especial para pizzas 1 kg', 'Pureza', 10, 350, 427.1, 0),
(86, 2, 1, '2023-10-13 05:26:29', 'Sal fina paquete 500 g', 'Celusal', 10, 200, 273.2, 0),
(87, 2, 2, '2023-10-13 05:26:29', 'Gaseosa Cola sabor original 2.25 l', 'Coca Cola', 10, 650, 790.2, 0),
(88, 2, 2, '2023-10-13 05:26:29', 'Gaseosa black 1.5 l', 'Pepsi', 10, 250, 350.2, 0),
(89, 2, 2, '2023-10-13 05:26:29', 'Gaseosa cola classic pet 2.25 lts', 'Cunnington', 10, 270, 373.2, 0),
(90, 2, 2, '2023-10-13 05:26:29', 'Gaseosa cola regular lata 354 cc', 'Pepsi', 10, 100, 190.2, 0),
(91, 2, 2, '2023-10-13 05:26:29', 'Gaseosa Cola zero 354 ml', 'Coca cola', 10, 150, 240.2, 0),
(92, 2, 2, '2023-10-13 05:26:29', 'Gaseosa cola regular mini pet 237 cc', 'Coca cola', 10, 75, 150.2, 0),
(93, 2, 3, '2023-10-13 05:26:29', 'Cerveza rubia 330 cc', 'Corona', 7, 387, 427.2, 0),
(94, 2, 3, '2023-10-13 05:26:29', 'Cerveza rubia 710 cc', 'Schneider', 9, 438, 516.2, 0),
(95, 2, 3, '2023-10-13 05:26:29', 'Cerveza rubia 710 cc', 'Corona', 8, 797, 866.2, 0),
(96, 2, 3, '2023-10-13 05:26:29', 'Cerveza blanca 150 años en botella 1 lt', 'Heineken', 10, 1399, 1460.2, 0),
(98, 2, 4, '2023-10-13 05:26:29', 'Vino tinto malbec 750 cc', 'Alma Mora', 10, 993, 1060, 0),
(99, 2, 4, '2023-10-13 05:26:29', 'Vino blanco Cosecha tardía 750 cc', 'norton', 9, 900, 966.3, 0),
(100, 2, 4, '2023-10-13 05:26:29', 'Vino tinto 8 chocolate 750 cc', 'Dadá', 10, 888, 954.3, 0),
(101, 2, 5, '2023-10-13 05:26:29', 'Manteca extra calidad 200 Gr', 'Tonadita', 8, 400, 430.3, 0),
(103, 2, 6, '2023-10-13 05:26:29', 'Yogur firme frutilla Clásico 190gr', 'La Serenísima', 10, 239, 306.3, 0),
(104, 2, 6, '2023-10-13 05:26:29', 'Yogur Vainilla Yogurisimo 900 Gr', 'La Serenísima', 10, 900, 999.3, 0),
(105, 2, 6, '2023-10-13 05:26:29', 'Queso Muzzarella Sin Lactosa 250 Gr', 'DIA', 10, 888, 949.3, 250),
(106, 2, 6, '2023-10-13 05:26:29', 'Queso Rallado 150 Gr', 'DIA', 9, 798, 858, 150),
(107, 2, 6, '2023-10-13 05:26:29', 'Jamón Cocido Feteado 200 Gr', 'Chacra', 10, 600, 668.3, 200),
(108, 2, 6, '2023-10-13 05:26:29', 'Queso Cremoso x Kg', 'La Paulina', 8, 2778, 2890.3, 1000),
(109, 2, 6, '2023-10-13 05:26:29', 'Queso cremoso horma x kg', 'Puyehue', 10, 2350, 2450.3, 1000);

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
-- Estructura de tabla para la tabla `telsa`
--

CREATE TABLE `telsa` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `price` float NOT NULL,
  `volume` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `telsa`
--

INSERT INTO `telsa` (`id`, `date`, `price`, `volume`) VALUES
(1, '2023-09-01', 10.55, 500),
(2, '2023-09-02', 11.5, 510),
(3, '2023-09-03', 10.75, 550),
(4, '2023-09-04', 11.11, 450),
(5, '2023-09-05', 11.55, 500),
(6, '2023-09-06', 10, 500),
(7, '2023-09-07', 10.05, 505),
(8, '2023-09-08', 10.5, 507),
(9, '2023-09-09', 9.1, 510),
(11, '2023-09-10', 10.75, 600),
(12, '2023-09-11', 11.25, 510),
(13, '2023-09-12', 12, 560),
(14, '2023-09-13', 10.74, 606),
(15, '2023-09-14', 10.65, 666),
(16, '2023-09-15', 10.95, 750),
(17, '2023-09-16', 11.12, 634),
(18, '2023-09-17', 9.87, 501),
(19, '2023-09-18', 10.34, 450),
(20, '2023-09-19', 10.38, 555),
(21, '2023-09-20', 11.76, 625),
(22, '2023-09-21', 11.34, 632),
(23, '2023-09-22', 10.23, 700),
(24, '2023-09-23', 11.11, 500),
(25, '2023-09-24', 10.05, 521),
(26, '2023-09-25', 10.37, 450);

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
(1, 1, 2, 'salvador', 'Salvador2023', NULL, '2023-10-13 04:38:49', 'salvador@gmail.com'),
(2, 1, 1, 'diego', 'Administrador2023', NULL, '2023-10-24 07:06:45', 'diegocesari@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `ID_VENTA` int(11) NOT NULL,
  `ID_USUARIO_REGISTRADO` bigint(20) NOT NULL,
  `FECHA` datetime NOT NULL,
  `ID_CLIENTE` bigint(20) NOT NULL,
  `TOTAL` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`ID_VENTA`, `ID_USUARIO_REGISTRADO`, `FECHA`, `ID_CLIENTE`, `TOTAL`) VALUES
(335, 2, '2023-11-14 09:00:47', 1, 1855.25),
(336, 2, '2023-11-14 09:01:32', 1, 0),
(337, 2, '2023-11-14 09:06:05', 1, 1855.25),
(338, 2, '2023-11-14 09:07:07', 1, 1855.25),
(339, 2, '2023-11-14 09:09:34', 1, 4318.14),
(340, 2, '2023-11-15 10:09:46', 1, 3406.5),
(341, 2, '2023-11-15 10:10:33', 1, 1285.2),
(342, 2, '2023-11-15 17:10:26', 1, 1207.83),
(343, 2, '2023-11-15 19:45:43', 1, 2607.53),
(344, 2, '2023-11-17 19:07:58', 1, 2212.7),
(345, 2, '2023-11-20 20:40:36', 1, 480.3),
(346, 2, '2023-11-20 20:48:41', 1, 480.3),
(347, 2, '2023-11-20 20:51:00', 1, 480.3),
(348, 2, '2023-11-20 20:58:23', 1, 480.3),
(349, 2, '2023-11-20 21:01:54', 1, 480.3),
(350, 2, '2023-11-20 21:03:47', 1, 480.3),
(351, 2, '2023-11-20 21:13:18', 1, 480.3),
(352, 2, '2023-11-20 21:14:18', 1, 480.3),
(353, 2, '2023-11-20 21:17:13', 1, 480.3),
(354, 2, '2023-11-21 14:37:01', 1, 805.2),
(355, 2, '2023-11-21 14:38:21', 1, 500.32);

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
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id_detalle_venta`),
  ADD KEY `ID_VENTA` (`ID_VENTA`),
  ADD KEY `ID_PRODUCTO` (`ID_PRODUCTO`);

--
-- Indices de la tabla `indicador`
--
ALTER TABLE `indicador`
  ADD PRIMARY KEY (`ID_INDICADOR`),
  ADD KEY `ID_USUARIO_REGISTRADO` (`ID_USUARIO_REGISTRADO`),
  ADD KEY `ID_CATEGORIA` (`ID_CATEGORIA`),
  ADD KEY `ID_PRODUCTO` (`ID_PRODUCTO`);

--
-- Indices de la tabla `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `ID_CLIENTE` (`ID_CLIENTE`);

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
  MODIFY `ID_CLIENTE` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id_detalle_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=679;

--
-- AUTO_INCREMENT de la tabla `indicador`
--
ALTER TABLE `indicador`
  MODIFY `ID_INDICADOR` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `ID_PERFIL` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ID_PRODUCTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

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
  MODIFY `ID_USUARIO_REGISTRADO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `ID_VENTA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=356;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`ID_USUARIO_REGISTRADO`) REFERENCES `usuario` (`ID_USUARIO_REGISTRADO`);

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`ID_VENTA`) REFERENCES `venta` (`ID_VENTA`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `producto` (`ID_PRODUCTO`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`ID_CLIENTE`) REFERENCES `cliente` (`ID_CLIENTE`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
