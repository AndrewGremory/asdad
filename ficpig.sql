-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-12-2021 a las 14:08:50
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
-- Base de datos: `ficpig`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimento`
--

CREATE TABLE `alimento` (
  `id` int(11) NOT NULL,
  `nom_alimento` varchar(30) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `tipo` varchar(30) DEFAULT NULL,
  `cantidad` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimento_cerda`
--

CREATE TABLE `alimento_cerda` (
  `id` int(11) NOT NULL,
  `num_cerda` int(11) DEFAULT NULL,
  `nomb_alimento` varchar(20) DEFAULT NULL,
  `fecha` varchar(20) DEFAULT NULL,
  `cant_kg` int(11) DEFAULT NULL,
  `id_cerda` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimento_lote`
--

CREATE TABLE `alimento_lote` (
  `id` int(11) NOT NULL,
  `num_lote` int(10) DEFAULT NULL,
  `nomb_alimento` varchar(30) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `cant_kg` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cerda`
--

CREATE TABLE `cerda` (
  `id` int(11) NOT NULL,
  `num_cerda` int(11) DEFAULT NULL,
  `raza` varchar(20) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `peso` int(10) NOT NULL,
  `f_nacimiento` date DEFAULT NULL,
  `f_fallecimiento` date NOT NULL,
  `id_usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cerda`
--

INSERT INTO `cerda` (`id`, `num_cerda`, `raza`, `estado`, `peso`, `f_nacimiento`, `f_fallecimiento`, `id_usuario`) VALUES
(17, 135, 'landrace', 'gestante', 133, '2021-12-17', '0000-00-00', 0),
(18, 255, 'puroc', 'gestante', 133, '2021-12-17', '0000-00-00', 0),
(19, 0, 'puroc', 'apto', 255, '2021-12-08', '2021-12-02', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cerdo`
--

CREATE TABLE `cerdo` (
  `id` int(10) NOT NULL,
  `num_varraco` int(10) DEFAULT NULL,
  `raza` varchar(20) DEFAULT NULL,
  `f_nacimiento` date DEFAULT NULL,
  `f_fallecimiento` date DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `peso` varchar(20) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cerdo`
--

INSERT INTO `cerdo` (`id`, `num_varraco`, `raza`, `f_nacimiento`, `f_fallecimiento`, `estado`, `peso`, `id_usuario`) VALUES
(1, 0, 'puroc', '0000-00-00', '0000-00-00', 'acto', '125kg', 2),
(2, 0, 'puroc', '0000-00-00', '0000-00-00', 'acto', '125kg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_cerda`
--

CREATE TABLE `control_cerda` (
  `id` int(11) NOT NULL,
  `num_cerda` int(11) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `fecha` varchar(25) DEFAULT NULL,
  `dosis` varchar(20) DEFAULT NULL,
  `tiempo_retiro` varchar(25) DEFAULT NULL,
  `descripcion` varchar(70) DEFAULT NULL,
  `id_cerda` int(11) DEFAULT NULL,
  `id_medicamento` int(11) DEFAULT NULL,
  `cant_KG` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_lote`
--

CREATE TABLE `control_lote` (
  `id` int(11) NOT NULL,
  `num_lote` int(11) DEFAULT NULL,
  `fecha` varchar(20) DEFAULT NULL,
  `dosis` varchar(20) DEFAULT NULL,
  `num_aplicacion` int(11) DEFAULT NULL,
  `tiempo_retiro` varchar(25) DEFAULT NULL,
  `descripcion` varchar(80) DEFAULT NULL,
  `id_lote` int(11) DEFAULT NULL,
  `id_medicamento` int(11) DEFAULT NULL,
  `can_KG` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_peso`
--

CREATE TABLE `control_peso` (
  `id_control_peso` int(11) NOT NULL,
  `fecha` varchar(15) DEFAULT NULL,
  `nomb_alimento` varchar(20) DEFAULT NULL,
  `cant_KG` int(11) DEFAULT NULL,
  `descripcion` varchar(80) DEFAULT NULL,
  `conversion` varchar(40) DEFAULT NULL,
  `id_lote` int(11) DEFAULT NULL,
  `id_medicamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cubriciones`
--

CREATE TABLE `cubriciones` (
  `id` int(11) NOT NULL,
  `num_cerda` int(11) DEFAULT NULL,
  `num_marrano` int(11) DEFAULT NULL,
  `fecha_servicio` varchar(15) DEFAULT NULL,
  `tipo` varchar(15) DEFAULT NULL,
  `estado` varchar(15) DEFAULT NULL,
  `id_cerda` int(11) DEFAULT NULL,
  `id_varraco` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lote`
--

CREATE TABLE `lote` (
  `id` int(11) NOT NULL,
  `num_lote` int(11) DEFAULT NULL,
  `cant_animales` int(11) DEFAULT NULL,
  `peso` varchar(20) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lote`
--

INSERT INTO `lote` (`id`, `num_lote`, `cant_animales`, `peso`, `id_usuario`) VALUES
(11, 12, 3, '125', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamento`
--

CREATE TABLE `medicamento` (
  `id` int(11) NOT NULL,
  `medicamento` int(11) DEFAULT NULL,
  `fecha` varchar(30) DEFAULT NULL,
  `descripcion` varchar(80) DEFAULT NULL,
  `cantidad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parto`
--

CREATE TABLE `parto` (
  `id_parto` int(11) NOT NULL,
  `num_cerda` int(11) DEFAULT NULL,
  `f_nacimiento` varchar(30) DEFAULT NULL,
  `raza` varchar(20) DEFAULT NULL,
  `peso` varchar(15) DEFAULT NULL,
  `f_ul_parto` varchar(25) DEFAULT NULL,
  `f_deteste` varchar(25) DEFAULT NULL,
  `cant_nacidos` int(11) DEFAULT NULL,
  `nacidos_vivos` int(11) DEFAULT NULL,
  `cant_hembras` int(11) DEFAULT NULL,
  `cant_machos` int(11) DEFAULT NULL,
  `nacidos_muertos` int(11) DEFAULT NULL,
  `id_cerda` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nomb_granja` varchar(40) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `contrasena` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alimento`
--
ALTER TABLE `alimento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `alimento_cerda`
--
ALTER TABLE `alimento_cerda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cerda` (`id_cerda`),
  ADD KEY `alimento_ibfk_1` (`num_cerda`);

--
-- Indices de la tabla `alimento_lote`
--
ALTER TABLE `alimento_lote`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cerda`
--
ALTER TABLE `cerda`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cerdo`
--
ALTER TABLE `cerdo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `control_cerda`
--
ALTER TABLE `control_cerda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cerda` (`id_cerda`),
  ADD KEY `id_medicamento` (`id_medicamento`);

--
-- Indices de la tabla `control_lote`
--
ALTER TABLE `control_lote`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lote` (`id_lote`),
  ADD KEY `id_medicamento` (`id_medicamento`),
  ADD KEY `num_lote` (`num_lote`);

--
-- Indices de la tabla `control_peso`
--
ALTER TABLE `control_peso`
  ADD PRIMARY KEY (`id_control_peso`),
  ADD KEY `id_lote` (`id_lote`),
  ADD KEY `id_medicamento` (`id_medicamento`),
  ADD KEY `nomb_alimento` (`nomb_alimento`);

--
-- Indices de la tabla `cubriciones`
--
ALTER TABLE `cubriciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cerda` (`id_cerda`),
  ADD KEY `id_varraco` (`id_varraco`),
  ADD KEY `estado_ibfk_2` (`num_marrano`);

--
-- Indices de la tabla `lote`
--
ALTER TABLE `lote`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `medicamento`
--
ALTER TABLE `medicamento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `parto`
--
ALTER TABLE `parto`
  ADD PRIMARY KEY (`id_parto`),
  ADD KEY `id_cerda` (`id_cerda`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alimento`
--
ALTER TABLE `alimento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `alimento_lote`
--
ALTER TABLE `alimento_lote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cerda`
--
ALTER TABLE `cerda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `cerdo`
--
ALTER TABLE `cerdo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `lote`
--
ALTER TABLE `lote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alimento_cerda`
--
ALTER TABLE `alimento_cerda`
  ADD CONSTRAINT `alimento_cerda_ibfk_1` FOREIGN KEY (`id_cerda`) REFERENCES `cerda` (`id`);

--
-- Filtros para la tabla `control_cerda`
--
ALTER TABLE `control_cerda`
  ADD CONSTRAINT `control_cerda_ibfk_1` FOREIGN KEY (`id_medicamento`) REFERENCES `medicamento` (`id`),
  ADD CONSTRAINT `control_cerda_ibfk_2` FOREIGN KEY (`id_cerda`) REFERENCES `cerda` (`id`);

--
-- Filtros para la tabla `control_lote`
--
ALTER TABLE `control_lote`
  ADD CONSTRAINT `control_lote_ibfk_1` FOREIGN KEY (`num_lote`) REFERENCES `lote` (`id`),
  ADD CONSTRAINT `control_lote_ibfk_2` FOREIGN KEY (`id_medicamento`) REFERENCES `medicamento` (`id`);

--
-- Filtros para la tabla `control_peso`
--
ALTER TABLE `control_peso`
  ADD CONSTRAINT `control_peso_ibfk_1` FOREIGN KEY (`id_control_peso`) REFERENCES `alimento_cerda` (`id`),
  ADD CONSTRAINT `control_peso_ibfk_2` FOREIGN KEY (`id_lote`) REFERENCES `alimento_cerda` (`id`);

--
-- Filtros para la tabla `cubriciones`
--
ALTER TABLE `cubriciones`
  ADD CONSTRAINT `cubriciones_ibfk_1` FOREIGN KEY (`id_cerda`) REFERENCES `cerda` (`id`),
  ADD CONSTRAINT `cubriciones_ibfk_2` FOREIGN KEY (`id_varraco`) REFERENCES `cerdo` (`id`);

--
-- Filtros para la tabla `medicamento`
--
ALTER TABLE `medicamento`
  ADD CONSTRAINT `medicamento_ibfk_1` FOREIGN KEY (`id`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `parto`
--
ALTER TABLE `parto`
  ADD CONSTRAINT `parto_ibfk_1` FOREIGN KEY (`id_cerda`) REFERENCES `cerda` (`id`),
  ADD CONSTRAINT `parto_ibfk_2` FOREIGN KEY (`id_cerda`) REFERENCES `usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
