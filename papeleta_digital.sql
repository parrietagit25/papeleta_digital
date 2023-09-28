-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 28-09-2023 a las 23:02:12
-- Versión del servidor: 8.0.33
-- Versión de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `papeleta_digital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `papeleta_general`
--

CREATE TABLE `papeleta_general` (
  `id` int NOT NULL,
  `id_user_operaciones` int DEFAULT NULL,
  `date_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `stat` int DEFAULT NULL COMMENT '1=registrado2=counter;3=heiker;4=salida;5=regreso',
  `unidad` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `placa` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `odometro` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `combustible` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `poliza_seguro` varchar(5) DEFAULT NULL,
  `placa_revisado` varchar(5) DEFAULT NULL,
  `formato_danios_menores` varchar(5) DEFAULT NULL,
  `registro_unico_vehicula` varchar(5) DEFAULT NULL,
  `stiker_panapass` varchar(5) DEFAULT NULL,
  `pito_claxon` varchar(5) DEFAULT NULL,
  `luces_direccionales` varchar(5) DEFAULT NULL,
  `luces_traseras` varchar(5) DEFAULT NULL,
  `luces_delanteras` varchar(5) DEFAULT NULL,
  `aire_acondicinado` varchar(5) DEFAULT NULL,
  `limpia_parabrisas` varchar(5) DEFAULT NULL,
  `alfombras` varchar(5) DEFAULT NULL,
  `herramientas` varchar(5) DEFAULT NULL,
  `antenas` varchar(5) DEFAULT NULL,
  `placa_pipa` varchar(5) DEFAULT NULL,
  `extintor` varchar(5) DEFAULT NULL,
  `gato` varchar(5) DEFAULT NULL,
  `llanta_repuesto` varchar(5) DEFAULT NULL,
  `copas_1234` varchar(5) DEFAULT NULL,
  `base_antena` varchar(5) DEFAULT NULL,
  `triangulo_seguridad` varchar(5) DEFAULT NULL,
  `imspeccion` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `contrato` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email_cliente` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `sucursal` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_user_counter` int DEFAULT NULL,
  `foto_frente` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `foto_lado_conductor` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `foto_mateleto` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `foto_lado_pasajero` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `firma_salida` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `aire_acondicionado` varchar(5) DEFAULT NULL,
  `imspeccion2` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_user_heiker` int DEFAULT NULL,
  `firma_ingreso` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `imspeccion3` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_user_heiker_fin` int DEFAULT NULL,
  `foto_frente_ing` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `foto_conductor_ing` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `foto_maletero_ing` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `foto_pasajero_ing` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `op_foto_frente` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `op_foto_coductor` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `op_foto_cajuela` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `op_foto_pasajero` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `papeleta_revicion`
--

CREATE TABLE `papeleta_revicion` (
  `id` int NOT NULL,
  `id_user_operaciones` int DEFAULT NULL,
  `date_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `stat` int DEFAULT NULL COMMENT '1=registrado2=counter;3=heiker;4=salida;5=regreso',
  `unidad` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `placa` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `odometro` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `combustible` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `poliza_seguro` varchar(5) DEFAULT NULL,
  `placa_revisado` varchar(5) DEFAULT NULL,
  `formato_danios_menores` varchar(5) DEFAULT NULL,
  `registro_unico_vehicula` varchar(5) DEFAULT NULL,
  `stiker_panapass` varchar(5) DEFAULT NULL,
  `pito_claxon` varchar(5) DEFAULT NULL,
  `luces_direccionales` varchar(5) DEFAULT NULL,
  `luces_traseras` varchar(5) DEFAULT NULL,
  `luces_delanteras` varchar(5) DEFAULT NULL,
  `aire_acondicinado` varchar(5) DEFAULT NULL,
  `limpia_parabrisas` varchar(5) DEFAULT NULL,
  `alfombras` varchar(5) DEFAULT NULL,
  `herramientas` varchar(5) DEFAULT NULL,
  `antenas` varchar(5) DEFAULT NULL,
  `placa_pipa` varchar(5) DEFAULT NULL,
  `extintor` varchar(5) DEFAULT NULL,
  `gato` varchar(5) DEFAULT NULL,
  `llanta_repuesto` varchar(5) DEFAULT NULL,
  `copas_1234` varchar(5) DEFAULT NULL,
  `base_antena` varchar(5) DEFAULT NULL,
  `triangulo_seguridad` varchar(5) DEFAULT NULL,
  `imspeccion` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `contrato` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email_cliente` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `sucursal` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_user_counter` int DEFAULT NULL,
  `foto_frente` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `foto_lado_conductor` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `foto_mateleto` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `foto_lado_pasajero` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `firma_salida` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `aire_acondicionado` varchar(5) DEFAULT NULL,
  `imspeccion2` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_user_heiker` int DEFAULT NULL,
  `firma_ingreso` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `imspeccion3` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `inspeccion4` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `firma_revicion` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_user_heiker_fin` int DEFAULT NULL,
  `id_papeleta_general` int DEFAULT NULL,
  `foto_frente_ing` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `foto_conductor_ing` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `foto_maletero_ing` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `foto_pasajero_ing` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `op_foto_frente` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `op_foto_coductor` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `op_foto_cajuela` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `op_foto_pasajero` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `email` varchar(150) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `stat` int NOT NULL COMMENT '1=on;2=off',
  `tipo_usuario` int NOT NULL COMMENT '1=admin;2=operaciones;3=Counter;4=heiker;5=supervisor',
  `fecha_reg` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sucursal` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `nombre`, `password`, `stat`, `tipo_usuario`, `fecha_reg`, `sucursal`) VALUES
(1, 'q@q.com', 'q', '$2a$12$MbF33MIo.0xe6LK4eq7tWe1gY2.nMvMGn3fylwb.MKNO3OI2/uU6y', 1, 1, '2023-09-22 02:09:58', 'PCR'),
(2, 'operaciones@operaciones.com', 'Ernesto Ortiz', '$2a$12$MbF33MIo.0xe6LK4eq7tWe1gY2.nMvMGn3fylwb.MKNO3OI2/uU6y', 1, 2, '2023-09-25 18:39:18', 'PCR'),
(3, 'counter@counter.com', 'Andry Puche', '$2a$12$MbF33MIo.0xe6LK4eq7tWe1gY2.nMvMGn3fylwb.MKNO3OI2/uU6y', 1, 3, '2023-09-25 18:39:18', 'PCR'),
(4, 'heiker@heiker.com', 'Luis Antonio', '$2a$12$MbF33MIo.0xe6LK4eq7tWe1gY2.nMvMGn3fylwb.MKNO3OI2/uU6y', 1, 4, '2023-09-25 18:39:18', 'PCR');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `papeleta_general`
--
ALTER TABLE `papeleta_general`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `papeleta_revicion`
--
ALTER TABLE `papeleta_revicion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `papeleta_general`
--
ALTER TABLE `papeleta_general`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `papeleta_revicion`
--
ALTER TABLE `papeleta_revicion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
