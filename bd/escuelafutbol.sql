-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-10-2023 a las 01:52:29
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
-- Base de datos: `escuelafutbol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentacte`
--

CREATE TABLE `cuentacte` (
  `id_cta_cte` int(11) NOT NULL,
  `dni` varchar(10) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallectacte`
--

CREATE TABLE `detallectacte` (
  `id_detalle` int(11) NOT NULL,
  `id_cta_cte` int(11) DEFAULT NULL,
  `f_vto` date DEFAULT NULL,
  `imp_cuota` decimal(10,2) DEFAULT NULL,
  `saldo_afavor` decimal(10,2) DEFAULT NULL,
  `id_estado_det_cta_cte` int(11) DEFAULT NULL,
  `cod_usuario_mov` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `d_dato` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `d_dato`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadodetctacte`
--

CREATE TABLE `estadodetctacte` (
  `id_estado_det_cta_cte` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estadodetctacte`
--

INSERT INTO `estadodetctacte` (`id_estado_det_cta_cte`, `descripcion`) VALUES
(1, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_cta_cte`
--

CREATE TABLE `estado_cta_cte` (
  `id_estado_cta` int(11) NOT NULL,
  `d_dato` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado_cta_cte`
--

INSERT INTO `estado_cta_cte` (`id_estado_cta`, `d_dato`) VALUES
(1, 'Pagado'),
(2, 'No Pagado'),
(3, 'Cancelado'),
(4, 'Judiciado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_jugador`
--

CREATE TABLE `estado_jugador` (
  `id_estado_jug` int(11) NOT NULL,
  `d_dato` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado_jugador`
--

INSERT INTO `estado_jugador` (`id_estado_jug`, `d_dato`) VALUES
(1, 'Disponible'),
(2, 'Lesionado'),
(3, 'Inactivo'),
(4, 'Retirado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `id_jugador` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `id_posicion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posicion`
--

CREATE TABLE `posicion` (
  `id_posicion` int(11) NOT NULL,
  `nombre_posicion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipous`
--

CREATE TABLE `tipous` (
  `id_tipous` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipous`
--

INSERT INTO `tipous` (`id_tipous`, `descripcion`) VALUES
(1, 'Admin'),
(2, 'Empleado'),
(3, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_apellido` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `clave` varchar(100) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `id_tipo_us` int(11) DEFAULT NULL,
  `dni` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_apellido`, `email`, `clave`, `id_estado`, `id_tipo_us`, `dni`) VALUES
(3, 'Lucas Rodriguez', 'rodriguezlucas011@gmail.com', '021021', NULL, NULL, '41761160'),
(5, 'Lucas Rodriguez', 'rodriguezlucas011@gmail.com', '021021', 1, 1, '41761160');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuentacte`
--
ALTER TABLE `cuentacte`
  ADD PRIMARY KEY (`id_cta_cte`);

--
-- Indices de la tabla `detallectacte`
--
ALTER TABLE `detallectacte`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_cta_cte` (`id_cta_cte`),
  ADD KEY `id_estado_det_cta_cte` (`id_estado_det_cta_cte`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `estadodetctacte`
--
ALTER TABLE `estadodetctacte`
  ADD PRIMARY KEY (`id_estado_det_cta_cte`);

--
-- Indices de la tabla `estado_cta_cte`
--
ALTER TABLE `estado_cta_cte`
  ADD PRIMARY KEY (`id_estado_cta`);

--
-- Indices de la tabla `estado_jugador`
--
ALTER TABLE `estado_jugador`
  ADD PRIMARY KEY (`id_estado_jug`);

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`id_jugador`),
  ADD KEY `id_posicion` (`id_posicion`);

--
-- Indices de la tabla `posicion`
--
ALTER TABLE `posicion`
  ADD PRIMARY KEY (`id_posicion`);

--
-- Indices de la tabla `tipous`
--
ALTER TABLE `tipous`
  ADD PRIMARY KEY (`id_tipous`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_estado` (`id_estado`),
  ADD KEY `id_tipo_us` (`id_tipo_us`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detallectacte`
--
ALTER TABLE `detallectacte`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estado_cta_cte`
--
ALTER TABLE `estado_cta_cte`
  MODIFY `id_estado_cta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estado_jugador`
--
ALTER TABLE `estado_jugador`
  MODIFY `id_estado_jug` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `id_jugador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipous`
--
ALTER TABLE `tipous`
  MODIFY `id_tipous` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallectacte`
--
ALTER TABLE `detallectacte`
  ADD CONSTRAINT `detallectacte_ibfk_1` FOREIGN KEY (`id_cta_cte`) REFERENCES `cuentacte` (`id_cta_cte`),
  ADD CONSTRAINT `detallectacte_ibfk_2` FOREIGN KEY (`id_estado_det_cta_cte`) REFERENCES `estadodetctacte` (`id_estado_det_cta_cte`),
  ADD CONSTRAINT `detallectacte_ibfk_3` FOREIGN KEY (`id_estado_det_cta_cte`) REFERENCES `estadodetctacte` (`id_estado_det_cta_cte`);

--
-- Filtros para la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD CONSTRAINT `jugadores_ibfk_1` FOREIGN KEY (`id_posicion`) REFERENCES `posicion` (`id_posicion`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estadodetctacte` (`id_estado_det_cta_cte`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
