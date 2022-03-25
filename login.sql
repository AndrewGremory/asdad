-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-03-2022 a las 22:43:44
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `login`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `act_id` int(11) NOT NULL,
  `act_nombre` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`act_id`, `act_nombre`) VALUES
(1, 'IDENTIFICAR LOS LINEAMIENTOS INSTITUCIONALES RELACIONADOS CON LA FORMACIÒN PROFESIONAL INTEGRAL Y PRESENTACIÓN DEL PROYECTO FORMATIVO'),
(2, 'IDENTIFICAR LOS LINEAMIENTOS INSTITUCIONALES RELACIONADOS CON LA FORMACIÒN PROFESIONAL INTEGRAL Y PRESENTACIÓN DEL PROYECTO FORMATIVO'),
(3, 'IDENTIFICAR LOS LINEAMIENTOS INSTITUCIONALES RELACIONADOS CON LA FORMACIÒN PROFESIONAL INTEGRAL Y PRESENTACIÓN DEL PROYECTO FORMATIVO'),
(4, 'IDENTIFICAR LOS LINEAMIENTOS INSTITUCIONALES RELACIONADOS CON LA FORMACIÒN PROFESIONAL INTEGRAL Y PRESENTACIÓN DEL PROYECTO FORMATIVO'),
(5, 'IDENTIFICAR LOS LINEAMIENTOS INSTITUCIONALES RELACIONADOS CON LA FORMACIÒN PROFESIONAL INTEGRAL Y PRESENTACIÓN DEL PROYECTO FORMATIVO'),
(6, 'DETERMINAR LAS ESPECIFICACIONES FUNCIONALES DEL SISTEMA DE INFORMACIÓN.'),
(7, 'DETERMINAR LAS ESPECIFICACIONES FUNCIONALES DEL SISTEMA DE INFORMACIÓN.'),
(8, 'DETERMINAR LAS ESPECIFICACIONES FUNCIONALES DEL SISTEMA DE INFORMACIÓN.'),
(9, 'DETERMINAR LAS ESPECIFICACIONES FUNCIONALES DEL SISTEMA DE INFORMACIÓN.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centro`
--

CREATE TABLE `centro` (
  `centro_id` int(11) NOT NULL,
  `centro_nombre` varchar(100) DEFAULT NULL,
  `centro_direccion` varchar(30) DEFAULT NULL,
  `centro_telefono` int(10) DEFAULT NULL,
  `centro_regional` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centro_tiene_programa`
--

CREATE TABLE `centro_tiene_programa` (
  `centroprograma_id` int(11) NOT NULL,
  `centro_id` int(11) DEFAULT NULL,
  `progra_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `competencia`
--

CREATE TABLE `competencia` (
  `comp_id` int(11) NOT NULL,
  `comp_nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `competencia`
--

INSERT INTO `competencia` (`comp_id`, `comp_nombre`) VALUES
(1, 'PROMOVER LA INTERACCION IDONEA CONSIGO MISMO, CON LOS DEMAS Y CON LA NATURALEZA EN LOS CONTEXTOS LAB'),
(2, 'PROMOVER LA INTERACCION IDONEA CONSIGO MISMO, CON LOS DEMAS Y CON LA NATURALEZA EN LOS CONTEXTOS LAB'),
(3, 'PROMOVER LA INTERACCION IDONEA CONSIGO MISMO, CON LOS DEMAS Y CON LA NATURALEZA EN LOS CONTEXTOS LAB'),
(4, 'PROMOVER LA INTERACCION IDONEA CONSIGO MISMO, CON LOS DEMAS Y CON LA NATURALEZA EN LOS CONTEXTOS LAB'),
(5, 'PROMOVER LA INTERACCION IDONEA CONSIGO MISMO, CON LOS DEMAS Y CON LA NATURALEZA EN LOS CONTEXTOS LAB'),
(6, 'PROMOVER LA INTERACCION IDONEA CONSIGO MISMO, CON LOS DEMAS Y CON LA NATURALEZA EN LOS CONTEXTOS LAB'),
(7, 'ANALIZAR LOS REQUISITOS DEL CLIENTE PARA CONSTRUIR EL SISTEMA DE INFORMACION.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fase`
--

CREATE TABLE `fase` (
  `fase_id` int(11) NOT NULL,
  `fase_nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fase`
--

INSERT INTO `fase` (`fase_id`, `fase_nombre`) VALUES
(1, 'INDUCCIÓN'),
(2, 'IDENTIFICACIÓN'),
(3, 'ANÁLISIS'),
(4, 'DISEÑO'),
(5, 'DESARROLLO'),
(6, 'IMPLANTACIÓN'),
(7, 'EVALUACIÓN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichas`
--

CREATE TABLE `fichas` (
  `id_ficha` int(11) NOT NULL,
  `tipo_programa` enum('especializacion','tecnologo','tecnico') DEFAULT NULL,
  `nombre_programa` int(11) NOT NULL,
  `lider_ficha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fichas`
--

INSERT INTO `fichas` (`id_ficha`, `tipo_programa`, `nombre_programa`, `lider_ficha`) VALUES
(12345, 'especializacion', 1, 4),
(2068060, 'tecnologo', 1, 4),
(5645665, 'especializacion', 2, 6),
(123448789, 'tecnologo', 1, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `id_programa` int(11) NOT NULL,
  `pro_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`id_programa`, `pro_nombre`) VALUES
(1, 'Análisis y desarrollo de sistemas de información'),
(2, 'Ganaderia'),
(3, 'Especies Menores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rap`
--

CREATE TABLE `rap` (
  `id` int(11) NOT NULL,
  `ficha_id` int(11) DEFAULT NULL,
  `fase_id` int(11) DEFAULT NULL,
  `act_id` int(11) DEFAULT NULL,
  `rcp_id` int(11) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `estado` enum('Evaluado','Pendiente','En ejecución','') DEFAULT 'Pendiente',
  `observacion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rap`
--

INSERT INTO `rap` (`id`, `ficha_id`, `fase_id`, `act_id`, `rcp_id`, `fecha_inicio`, `fecha_fin`, `estado`, `observacion`) VALUES
(31, 12345, 1, 1, 1, '2022-03-15', '2023-03-30', 'Evaluado', NULL),
(32, 12345, NULL, NULL, 2, NULL, NULL, NULL, NULL),
(33, 12345, NULL, NULL, 3, NULL, NULL, NULL, NULL),
(34, 12345, NULL, NULL, 4, NULL, NULL, NULL, NULL),
(38, 2068060, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(39, 2068060, NULL, NULL, 2, NULL, NULL, NULL, NULL),
(40, 2068060, NULL, NULL, 3, NULL, NULL, NULL, NULL),
(41, 2068060, NULL, NULL, 4, NULL, NULL, NULL, NULL),
(55, 5645665, NULL, NULL, 5, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regional`
--

CREATE TABLE `regional` (
  `reg_id` int(11) NOT NULL,
  `reg_nombre` varchar(100) DEFAULT NULL,
  `reg_direccion` varchar(30) DEFAULT NULL,
  `reg_telefono` int(10) DEFAULT NULL,
  `reg_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE `resultados` (
  `id` int(11) NOT NULL,
  `resultado` varchar(500) NOT NULL,
  `tipo_resultado` enum('Específico','Institucional','Clave','Transversal') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `resultados`
--

INSERT INTO `resultados` (`id`, `resultado`, `tipo_resultado`) VALUES
(1, 'ASUMIR LOS DEBERES Y DERECHOS CON BASE EN LAS LEYES Y LA NORMATIVA INSTITUCIONAL EN EL MARCO DE SU PROYECTO DE VIDA.\r\n', 'Específico'),
(2, 'CONCERTAR ALTERNATIVAS Y ACCIONES DE FORMACIÓN PARA EL DESARROLLO DE LAS COMPETENCIAS DEL PROGRAMA FORMACIÓN, CON BASE EN LA POLÍTICA INSTITUCIONAL.\r\n', 'Institucional'),
(3, 'GESTIONAR LA INFORMACIÓN DE ACUERDO CON LOS PROCEDIMIENTOS ESTABLECIDOS Y CON LAS TECNOLOGÍAS DE LA INFORMACIÓN Y LA COMUNICACIÓN DISPONIBLES.\r\n', 'Institucional'),
(4, 'GESTIONAR LA INFORMACIÓN DE ACUERDO CON LOS PROCEDIMIENTOS ESTABLECIDOS Y CON LAS TECNOLOGÍAS DE LA INFORMACIÓN Y LA COMUNICACIÓN DISPONIBLES.', 'Institucional');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultado_aprendizaje`
--

CREATE TABLE `resultado_aprendizaje` (
  `id` int(11) NOT NULL,
  `ficha_id` int(11) DEFAULT NULL,
  `fase` varchar(20) DEFAULT NULL,
  `actividad` varchar(200) DEFAULT NULL,
  `competencia` varchar(500) DEFAULT NULL,
  `resultado` int(11) DEFAULT NULL,
  `tipo` enum('Clave','Transversal','Específico','Institucional') DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `estado` enum('Evaluado','Pendiente','En ejecución') DEFAULT NULL,
  `observaciones` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultado_competencia_programa`
--

CREATE TABLE `resultado_competencia_programa` (
  `id` int(11) NOT NULL,
  `comp_id` int(11) NOT NULL,
  `resultado_id` int(11) DEFAULT NULL,
  `programa_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `resultado_competencia_programa`
--

INSERT INTO `resultado_competencia_programa` (`id`, `comp_id`, `resultado_id`, `programa_id`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 1),
(3, 3, 3, 1),
(4, 3, 3, 1),
(5, 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

CREATE TABLE `seguimiento` (
  `segui_id` int(11) NOT NULL,
  `estado_resultado` enum('evaluado','pendiente por evaluar','finalizado') DEFAULT NULL,
  `segui_ficha` int(11) DEFAULT NULL,
  `segui_rap` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `usuario` varchar(30) DEFAULT NULL,
  `pw` varchar(20) DEFAULT NULL,
  `rol` enum('administrador','instructor','coordinador') DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `permiso1` tinyint(1) DEFAULT NULL,
  `permiso2` tinyint(1) DEFAULT NULL,
  `permiso3` tinyint(1) DEFAULT NULL,
  `permiso4` tinyint(1) DEFAULT NULL,
  `permiso5` tinyint(1) DEFAULT NULL,
  `permiso6` tinyint(1) DEFAULT NULL,
  `permiso7` tinyint(1) DEFAULT NULL,
  `permiso8` tinyint(1) DEFAULT NULL,
  `permiso9` tinyint(1) DEFAULT NULL,
  `permiso10` tinyint(1) DEFAULT NULL,
  `permiso11` tinyint(1) DEFAULT NULL,
  `permiso12` tinyint(1) DEFAULT NULL,
  `permiso13` tinyint(1) DEFAULT NULL,
  `permiso14` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `usuario`, `pw`, `rol`, `correo`, `telefono`, `permiso1`, `permiso2`, `permiso3`, `permiso4`, `permiso5`, `permiso6`, `permiso7`, `permiso8`, `permiso9`, `permiso10`, `permiso11`, `permiso12`, `permiso13`, `permiso14`) VALUES
(2, 'Andres ', 'Amaya Paez', 'Andres', '123', 'administrador', 'andresamayap123123@gmail.com', '3125724378', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Jose Davidad', 'Montesino Hoyos', 'Josedavid123', '123', 'instructor', 'josedavid@gmail.com', '111111111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Linley Catalina', 'Moscote', 'LinleyMoscote', '1234', 'instructor', 'linley123@gmail.com', '12321312', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Karina', 'Meza', 'KarinaMeza', '123', 'instructor', 'karinameza@gmail.com', '2156465465', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Carlos', 'Mendoza', 'Carlomendoza', '1233', 'instructor', 'carlosmendoza@gmail.com', '657894489', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Admin', 'Admin', 'Admin', '123', 'administrador', 'admin@admin.com', '12345689', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`act_id`);

--
-- Indices de la tabla `centro`
--
ALTER TABLE `centro`
  ADD PRIMARY KEY (`centro_id`),
  ADD KEY `centro_regional` (`centro_regional`);

--
-- Indices de la tabla `centro_tiene_programa`
--
ALTER TABLE `centro_tiene_programa`
  ADD PRIMARY KEY (`centroprograma_id`),
  ADD KEY `centro_id` (`centro_id`),
  ADD KEY `progra_id` (`progra_id`);

--
-- Indices de la tabla `competencia`
--
ALTER TABLE `competencia`
  ADD PRIMARY KEY (`comp_id`);

--
-- Indices de la tabla `fase`
--
ALTER TABLE `fase`
  ADD PRIMARY KEY (`fase_id`);

--
-- Indices de la tabla `fichas`
--
ALTER TABLE `fichas`
  ADD PRIMARY KEY (`id_ficha`),
  ADD KEY `nombre_programa` (`nombre_programa`),
  ADD KEY `lider_ficha` (`lider_ficha`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`id_programa`);

--
-- Indices de la tabla `rap`
--
ALTER TABLE `rap`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ficha_id` (`ficha_id`,`rcp_id`),
  ADD KEY `fase_id` (`fase_id`),
  ADD KEY `act_id` (`act_id`),
  ADD KEY `rap_ibfk_4` (`rcp_id`);

--
-- Indices de la tabla `regional`
--
ALTER TABLE `regional`
  ADD PRIMARY KEY (`reg_id`),
  ADD KEY `reg_usuario` (`reg_usuario`);

--
-- Indices de la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `resultado_aprendizaje`
--
ALTER TABLE `resultado_aprendizaje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resultado_aprendizaje_ibfk_1` (`ficha_id`),
  ADD KEY `resultado_aprendizaje_ibfk_2` (`resultado`);

--
-- Indices de la tabla `resultado_competencia_programa`
--
ALTER TABLE `resultado_competencia_programa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programa_id` (`programa_id`),
  ADD KEY `resultado_id` (`resultado_id`),
  ADD KEY `comp_id` (`comp_id`);

--
-- Indices de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD PRIMARY KEY (`segui_id`),
  ADD KEY `segui_ficha` (`segui_ficha`),
  ADD KEY `segui_rap` (`segui_rap`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `act_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `centro`
--
ALTER TABLE `centro`
  MODIFY `centro_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `centro_tiene_programa`
--
ALTER TABLE `centro_tiene_programa`
  MODIFY `centroprograma_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `competencia`
--
ALTER TABLE `competencia`
  MODIFY `comp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `fase`
--
ALTER TABLE `fase`
  MODIFY `fase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `programa`
--
ALTER TABLE `programa`
  MODIFY `id_programa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `rap`
--
ALTER TABLE `rap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `regional`
--
ALTER TABLE `regional`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `resultados`
--
ALTER TABLE `resultados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `resultado_aprendizaje`
--
ALTER TABLE `resultado_aprendizaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2435879;

--
-- AUTO_INCREMENT de la tabla `resultado_competencia_programa`
--
ALTER TABLE `resultado_competencia_programa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  MODIFY `segui_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `centro`
--
ALTER TABLE `centro`
  ADD CONSTRAINT `centro_ibfk_1` FOREIGN KEY (`centro_regional`) REFERENCES `regional` (`reg_id`);

--
-- Filtros para la tabla `centro_tiene_programa`
--
ALTER TABLE `centro_tiene_programa`
  ADD CONSTRAINT `centro_tiene_programa_ibfk_1` FOREIGN KEY (`centro_id`) REFERENCES `centro` (`centro_id`),
  ADD CONSTRAINT `centro_tiene_programa_ibfk_2` FOREIGN KEY (`progra_id`) REFERENCES `programa` (`id_programa`);

--
-- Filtros para la tabla `fichas`
--
ALTER TABLE `fichas`
  ADD CONSTRAINT `fichas_ibfk_1` FOREIGN KEY (`nombre_programa`) REFERENCES `programa` (`id_programa`),
  ADD CONSTRAINT `fichas_ibfk_2` FOREIGN KEY (`lider_ficha`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `rap`
--
ALTER TABLE `rap`
  ADD CONSTRAINT `rap_ibfk_1` FOREIGN KEY (`ficha_id`) REFERENCES `fichas` (`id_ficha`),
  ADD CONSTRAINT `rap_ibfk_2` FOREIGN KEY (`fase_id`) REFERENCES `fase` (`fase_id`),
  ADD CONSTRAINT `rap_ibfk_3` FOREIGN KEY (`act_id`) REFERENCES `actividad` (`act_id`),
  ADD CONSTRAINT `rap_ibfk_4` FOREIGN KEY (`rcp_id`) REFERENCES `resultado_competencia_programa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `regional`
--
ALTER TABLE `regional`
  ADD CONSTRAINT `regional_ibfk_1` FOREIGN KEY (`reg_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `resultado_aprendizaje`
--
ALTER TABLE `resultado_aprendizaje`
  ADD CONSTRAINT `resultado_aprendizaje_ibfk_1` FOREIGN KEY (`ficha_id`) REFERENCES `fichas` (`id_ficha`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resultado_aprendizaje_ibfk_2` FOREIGN KEY (`resultado`) REFERENCES `resultado_competencia_programa` (`id`);

--
-- Filtros para la tabla `resultado_competencia_programa`
--
ALTER TABLE `resultado_competencia_programa`
  ADD CONSTRAINT `resultado_competencia_programa_ibfk_1` FOREIGN KEY (`programa_id`) REFERENCES `programa` (`id_programa`),
  ADD CONSTRAINT `resultado_competencia_programa_ibfk_2` FOREIGN KEY (`resultado_id`) REFERENCES `resultados` (`id`),
  ADD CONSTRAINT `resultado_competencia_programa_ibfk_3` FOREIGN KEY (`comp_id`) REFERENCES `competencia` (`comp_id`);

--
-- Filtros para la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD CONSTRAINT `seguimiento_ibfk_1` FOREIGN KEY (`segui_ficha`) REFERENCES `fichas` (`id_ficha`),
  ADD CONSTRAINT `seguimiento_ibfk_2` FOREIGN KEY (`segui_rap`) REFERENCES `resultado_competencia_programa` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
