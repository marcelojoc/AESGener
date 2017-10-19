-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-10-2017 a las 20:50:18
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aesgener_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `idComentario` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `fecha` date NOT NULL,
  `idEmpleado` int(11) NOT NULL,
  `idValores` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `complejo`
--

CREATE TABLE `complejo` (
  `idComplejo` int(11) NOT NULL,
  `nombreComplejo` varchar(45) NOT NULL,
  `idUbicacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `complejo`
--

INSERT INTO `complejo` (`idComplejo`, `nombreComplejo`, `idUbicacion`) VALUES
(1, 'Complejo Norte', 0),
(2, 'Complejo Centro', 0),
(3, 'Complejo Guacolda', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `idConfiguracion` int(11) NOT NULL,
  `nombreConfig` varchar(45) NOT NULL,
  `fechaI` date NOT NULL,
  `fechaF` date NOT NULL,
  `vigente` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `division`
--

CREATE TABLE `division` (
  `idDivision` int(11) NOT NULL,
  `nombreDivision` varchar(45) NOT NULL,
  `idComplejo` int(11) NOT NULL,
  `idUbicacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `division`
--

INSERT INTO `division` (`idDivision`, `nombreDivision`, `idComplejo`, `idUbicacion`) VALUES
(1, 'Division Ventanas', 2, 0),
(2, 'Division Cordillera', 2, 0),
(3, 'Division Renca', 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `idEmpleado` int(11) NOT NULL,
  `nombreE` varchar(100) NOT NULL,
  `apellidoE` varchar(100) NOT NULL,
  `nroLegajo` int(45) NOT NULL,
  `convenio` varchar(100) NOT NULL,
  `rut` int(11) NOT NULL,
  `telefono` int(11) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL,
  `idTipoEmpleado` int(11) NOT NULL,
  `idReferente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idEmpleado`, `nombreE`, `apellidoE`, `nroLegajo`, `convenio`, `rut`, `telefono`, `direccion`, `email`, `activo`, `idTipoEmpleado`, `idReferente`) VALUES
(1, 'Marcelo', 'Contreras', 12894, 'Contratado', 29806389, 4567823, 'Anchorena 284', 'marceloc@hotmail.com', 1, 1, 0),
(2, 'Aldana', 'Baeza', 27902, 'Contratado', 32085237, 4983256, 'Azcuenaga 188', 'aldanatb@hotmail.com', 1, 1, 0),
(3, 'Usuario', 'OSEP', 11111, 'Planta Permanente', 22222222, 3333333, 'Direccion', 'usuario@email.com', 1, 1, 0),
(4, 'Adriana ', 'Sosa', 1944, 'Planta Permanente', 20304586, NULL, NULL, NULL, 1, 5, 43),
(5, 'Alex', 'Leyton', 8358, 'Planta Permanente', 18857073, NULL, NULL, NULL, 1, 4, 5),
(6, 'Ana Clara', 'García', 4200, 'Planta Permanente', 27790845, NULL, NULL, NULL, 1, 5, 54),
(7, 'Ana Fernanda', 'Montes', 6642, 'Planta Permanente', 23949274, NULL, NULL, NULL, 1, 5, 65),
(8, 'Belen', 'Saavedra ', 5629, 'Planta Permanente', 24705155, NULL, NULL, NULL, 1, 5, 65),
(9, 'Carina', 'Lucero', 4027, 'Planta Permanente', 22170496, NULL, NULL, NULL, 1, 5, 28),
(10, 'Carla', 'Grinberg', 3800, 'Planta Permanente', 29224605, NULL, NULL, NULL, 0, 5, 0),
(11, 'Carlos Marcelo', 'Llampa', 6526, 'Planta Permanente', 22186040, NULL, NULL, NULL, 0, 5, 0),
(12, 'Carolina', 'Alvarado', 7975, 'Planta Permanente', 25309024, NULL, NULL, NULL, 1, 5, 56),
(13, 'Cecilia', 'Gaset ', 6188, 'Planta Permanente', 28668878, NULL, NULL, NULL, 1, 5, 0),
(14, 'Daniel', 'Pizarro', 8265, 'Planta Permanente', 16020354, NULL, NULL, NULL, 1, 5, 65),
(15, 'Darío', 'Saromé', 4229, 'Planta Permanente', 21377566, NULL, NULL, NULL, 1, 5, 17),
(16, 'Diana', 'Cisella', 913, 'Planta Permanente', 17513893, NULL, NULL, NULL, 0, 5, 0),
(17, 'Diana', 'López', 4778, 'Planta Permanente', 25259878, NULL, NULL, NULL, 1, 4, 17),
(18, 'Elisa', 'Concina ', 4575, 'Planta Permanente', 27612322, NULL, NULL, NULL, 1, 5, 28),
(19, 'Fernanda', 'Britos ', 6643, 'Planta Permanente', 34763471, NULL, NULL, NULL, 0, 5, 0),
(20, 'Gustavo', 'Galetto ', 7424, 'Planta Permanente', 24006953, NULL, NULL, NULL, 1, 5, 65),
(21, 'Jessica', 'Espalla', 7118, 'Planta Permanente', 31214144, NULL, NULL, NULL, 1, 5, 54),
(22, 'Jimena', 'Del Barrio', 7830, 'Planta Permanente', 32192583, NULL, NULL, NULL, 1, 2, 0),
(23, 'Jonathan', 'Sixto', 7194, 'Planta Permanente', 31517456, NULL, NULL, NULL, 0, 5, 0),
(24, 'Jorge', 'Baroni', 5651, 'Planta Permanente', 25090908, NULL, NULL, NULL, 1, 5, 56),
(25, 'Leticia', 'Araya ', 1855, 'Planta Permanente', 20181466, NULL, NULL, NULL, 1, 2, 0),
(26, 'Jorge', 'Guajardo', 1957, 'Planta Permanente', 14696947, NULL, NULL, NULL, 0, 5, 0),
(28, 'Laura', 'Carmona', 3233, 'Planta Permanente', 14736621, NULL, NULL, NULL, 1, 4, 28),
(30, 'Leticia', 'Llul', 5187, 'Planta Permanente', 29563342, NULL, NULL, NULL, 1, 5, 43),
(31, 'Lorena', 'Giménez', 4101, 'Planta Permanente', 29226074, NULL, NULL, NULL, 0, 5, 0),
(32, 'Luis', 'Riolobos', 3177, 'Planta Permanente', 11177191, NULL, NULL, NULL, 1, 5, 34),
(33, 'Marcela', 'Illesca', 4590, 'Planta Permanente', 26935470, NULL, NULL, NULL, 1, 5, 28),
(34, 'Marcela', 'Méndez', 5774, 'Planta Permanente', 20525232, NULL, NULL, NULL, 1, 2, 0),
(35, 'Marcos', 'Ortega ', 8223, 'Planta Permanente', 26677902, NULL, NULL, NULL, 0, 5, 0),
(36, 'Margarita', 'Perez ', 3682, 'Planta Permanente', 23966211, NULL, NULL, NULL, 1, 5, 65),
(37, 'María Antonia', 'Cirrincione', 4393, 'Planta Permanente', 29821425, NULL, NULL, NULL, 1, 5, 43),
(38, 'Maricel', 'Gomez', 951, 'Planta Permanente', 17021816, NULL, NULL, NULL, 0, 5, 0),
(39, 'Mariela', 'Araguna', 4495, 'Planta Permanente', 25415644, NULL, NULL, NULL, 1, 5, 43),
(40, 'Mario', 'Cabezas', 1911, 'Planta Permanente', 20753475, NULL, NULL, NULL, 1, 5, 56),
(42, 'Matías', 'Marchiori', 5051, 'Planta Permanente', 27739362, NULL, NULL, NULL, 1, 5, 17),
(43, 'Mauricio', 'Farías', 3643, 'Planta Permanente', 25585014, NULL, NULL, NULL, 1, 4, 0),
(44, 'Mauro', 'Morosini', 6329, 'Planta Permanente', 29935053, NULL, NULL, NULL, 1, 5, 5),
(45, 'Nancy', 'Maldonado', 637, 'Planta Permanente', 16241186, NULL, NULL, NULL, 1, 5, 34),
(47, 'Noemí', 'Alonso', 5753, 'Planta Permanente', 17987425, NULL, NULL, NULL, 1, 5, 28),
(50, 'Rodrigo', 'López', 4350, 'Planta Permanente', 26557756, NULL, NULL, NULL, 1, 5, 43),
(52, 'Rosana', 'Gimenez', 5901, 'Planta Permanente', 29105437, NULL, NULL, NULL, 1, 5, 65),
(53, 'Roxana Fabiana', 'Palma', 6517, 'Planta Permanente', 22120073, NULL, NULL, NULL, 0, 5, 0),
(54, 'Silvana', 'Ponce', 3714, 'Planta Permanente', 25194725, NULL, NULL, NULL, 1, 4, 54),
(55, 'Teodora', 'Taca', 1875, 'Planta Permanente', 18808738, NULL, NULL, NULL, 1, 5, 34),
(56, 'Victor', 'Araujo', 8079, 'Planta Permanente', 28819421, NULL, NULL, NULL, 1, 4, 56),
(57, 'Violeta', 'Mayorga', 6968, 'Planta Permanente', 24634331, NULL, NULL, NULL, 1, 5, 56),
(58, 'Virginia', 'Cecchini', 3415, 'Planta Permanente', 28401142, NULL, NULL, NULL, 1, 2, 0),
(59, 'Cecilia', 'Silva', 3305, 'Planta Permanente', 25034746, NULL, NULL, NULL, 1, 2, 0),
(60, 'Federico', 'Llosa', 3461, 'Planta Permanente', 22140612, NULL, NULL, NULL, 1, 2, 0),
(61, 'Magdalena', 'Moscardo', 4960, 'Planta Permanente', 30051636, NULL, NULL, NULL, 1, 5, 17),
(62, 'Fernanda', 'Suarez', 0, 'Planta Permanente', 31949821, NULL, NULL, NULL, 0, 5, 34),
(63, 'Raquel', 'Barroso', 0, 'Planta Permanente', 26296533, NULL, NULL, NULL, 0, 5, 34),
(64, 'Marisa', 'Canillas', 0, 'Planta Permanente', 24279076, NULL, NULL, NULL, 0, 5, 34),
(65, 'Susana', 'Luna', 6277, 'Planta Permanente', 17641838, NULL, NULL, NULL, 1, 4, 65),
(66, 'Cecilia', 'Molina', 3078, 'Planta Permanente', 17390353, NULL, NULL, NULL, 1, 2, 0),
(67, 'Claudia', 'Gonzalez Mendoza', 953, 'Planta Permanente', 20896530, NULL, NULL, NULL, 1, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kpi`
--

CREATE TABLE `kpi` (
  `idKPI` int(11) NOT NULL,
  `nombreKPI` varchar(45) NOT NULL,
  `abreviaturaKPI` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `kpi`
--

INSERT INTO `kpi` (`idKPI`, `nombreKPI`, `abreviaturaKPI`) VALUES
(1, 'EAF', 'EAF'),
(2, 'EFOF', 'EFOF'),
(3, 'Hate Rate', 'ENPHR'),
(4, 'Comercial Availability', 'CA'),
(5, 'Horas Equivalente Derrateo Programado', 'HEDP'),
(6, 'Horas Equivalente Derrateo Forzado', 'HEDF'),
(7, 'Horas de Salida Forzada', 'HSF'),
(8, 'Horas Operación Unidad Generadora', 'MTBF'),
(9, 'Costos', 'CTM OPEX');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kpi_planilla`
--

CREATE TABLE `kpi_planilla` (
  `idKPIPlanilla` int(11) NOT NULL,
  `idPlanilla` int(11) NOT NULL,
  `idKPI` int(11) NOT NULL,
  `idUbicacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE `nivel` (
  `idNivel` int(11) NOT NULL,
  `descripNivel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`idNivel`, `descripNivel`) VALUES
(1, 'Facilitador'),
(2, 'Coordinador'),
(5, 'Administrador'),
(6, 'Administrador de Usuarios'),
(7, 'Referente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planilla`
--

CREATE TABLE `planilla` (
  `idPlanilla` int(11) NOT NULL,
  `dia` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `anio` int(11) NOT NULL,
  `url` varchar(50) NOT NULL,
  `idEmpleado` int(11) NOT NULL,
  `idTipoPlanilla` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `planilla`
--

INSERT INTO `planilla` (`idPlanilla`, `dia`, `mes`, `anio`, `url`, `idEmpleado`, `idTipoPlanilla`) VALUES
(1, 13, 10, 2017, './uploads/AES_2017-10-13_10-24.xlsx', 2, 1),
(2, 13, 10, 2017, './uploads/AES_2017-10-13_10-45.xlsx', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_planilla`
--

CREATE TABLE `tipo_planilla` (
  `idTipoPlanilla` int(11) NOT NULL,
  `nombreTipoP` varchar(45) NOT NULL,
  `descripTipoP` varchar(45) NOT NULL,
  `idConfig` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_planilla`
--

INSERT INTO `tipo_planilla` (`idTipoPlanilla`, `nombreTipoP`, `descripTipoP`, `idConfig`) VALUES
(1, 'Planilla AES Gener', '', 0),
(2, 'Planilla Costos', '', 0),
(3, 'Planilla SAP', '', 0),
(4, 'Planilla MTBF', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `idUbicacion` int(11) NOT NULL,
  `letra` char(5) NOT NULL,
  `nro` int(5) NOT NULL,
  `inicioLetra` char(5) NOT NULL,
  `finLetra` char(5) NOT NULL,
  `inicioNro` int(5) NOT NULL,
  `finNro` int(5) NOT NULL,
  `idConfiguracion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_generadora`
--

CREATE TABLE `unidad_generadora` (
  `idUnidadGen` int(11) NOT NULL,
  `nombreUG` varchar(45) NOT NULL,
  `abreviaturaUG` varchar(25) NOT NULL,
  `idDivision` int(11) DEFAULT NULL,
  `idComplejo` int(11) DEFAULT NULL,
  `idUbicacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `unidad_generadora`
--

INSERT INTO `unidad_generadora` (`idUnidadGen`, `nombreUG`, `abreviaturaUG`, `idDivision`, `idComplejo`, `idUbicacion`) VALUES
(1, 'Norgener 1', 'NT01', NULL, 1, 0),
(2, 'Norgener 2', 'NT02', NULL, 1, 0),
(3, 'Angamos 1', 'ANG1', NULL, 1, 0),
(4, 'Angamos 2', 'ANG2', NULL, 1, 0),
(5, 'Cochrane 1', '', NULL, 1, 0),
(6, 'Cochrane 2', '', NULL, 1, 0),
(7, 'Ventanas 1', 'VEN1', 1, 2, 0),
(8, 'Ventanas 2', 'VEN2', 1, 2, 0),
(9, 'Ventanas 3', 'NVE3', 1, 2, 0),
(10, 'Ventanas 4', '', 1, 2, 0),
(11, 'Laguna Verde ST', '', 1, 2, 0),
(12, 'Alfalfal 1', '', 2, 2, 0),
(13, 'Alfalfal 2', '', 2, 2, 0),
(14, 'Maitenes 1', '', 2, 2, 0),
(15, 'Maitenes 2', '', 2, 2, 0),
(16, 'Maitenes 3', '', 2, 2, 0),
(17, 'Queltehues 1', '', 2, 2, 0),
(18, 'Queltehues 2', '', 2, 2, 0),
(19, 'Queltehues 3', '', 2, 2, 0),
(20, 'Volcan', '', 2, 2, 0),
(21, 'Nueva Renca', 'CNR', 3, 2, 0),
(22, 'Los Vientos', '', 3, 2, 0),
(23, 'Santa Lidia', '', 3, 2, 0),
(24, 'Laja', '', 3, 2, 0),
(25, 'Guacolda 1', 'GUA1', NULL, 3, 0),
(26, 'Guacolda 2', 'GUA2', NULL, 3, 0),
(27, 'Guacolda 3', 'GUA3', NULL, 3, 0),
(28, 'Guacolda 4', 'GUA4', NULL, 3, 0),
(29, 'Guacolda 5', 'GUA5', NULL, 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `contrasenia` varchar(100) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `idNivel` int(11) NOT NULL,
  `idEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `contrasenia`, `usuario`, `idNivel`, `idEmpleado`) VALUES
(3, '81dc9bdb52d04dc20036dbd8313ed055', 'aldana', 6, 2),
(4, '81dc9bdb52d04dc20036dbd8313ed055', 'aldana', 6, 2),
(5, '81dc9bdb52d04dc20036dbd8313ed055', 'prueba', 6, 4),
(6, 'c893bad68927b457dbed39460e6afd62', 'osep', 6, 3),
(7, 'c893bad68927b457dbed39460e6afd62', 'jimena', 1, 22),
(8, 'c893bad68927b457dbed39460e6afd62', 'adriana', 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valores`
--

CREATE TABLE `valores` (
  `idValores` int(11) NOT NULL,
  `actualMes` double NOT NULL,
  `targetMes` double NOT NULL,
  `ytdActual` double NOT NULL,
  `ytdTarget` double NOT NULL,
  `fyf` double NOT NULL,
  `fyBudget` double NOT NULL,
  `hedp` double NOT NULL,
  `hsf` double NOT NULL,
  `mtbf` int(11) NOT NULL,
  `mtbfTarget` int(11) NOT NULL,
  `idUnidadGen` int(11) NOT NULL,
  `idDivision` int(11) NOT NULL,
  `idComplejo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idComentario`),
  ADD KEY `idEmpleado` (`idEmpleado`),
  ADD KEY `idMaquina` (`idValores`);

--
-- Indices de la tabla `complejo`
--
ALTER TABLE `complejo`
  ADD PRIMARY KEY (`idComplejo`),
  ADD KEY `idUbicacion` (`idUbicacion`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`idConfiguracion`);

--
-- Indices de la tabla `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`idDivision`),
  ADD KEY `idComplejo` (`idComplejo`),
  ADD KEY `idUbicacion` (`idUbicacion`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idEmpleado`),
  ADD KEY `idTipoEmpleado` (`idTipoEmpleado`),
  ADD KEY `idTipoEmpleado_2` (`idTipoEmpleado`),
  ADD KEY `idReferente` (`idReferente`);

--
-- Indices de la tabla `kpi`
--
ALTER TABLE `kpi`
  ADD PRIMARY KEY (`idKPI`);

--
-- Indices de la tabla `kpi_planilla`
--
ALTER TABLE `kpi_planilla`
  ADD PRIMARY KEY (`idKPIPlanilla`),
  ADD KEY `idPlanilla` (`idPlanilla`),
  ADD KEY `idKPI` (`idKPI`),
  ADD KEY `idUbicacion` (`idUbicacion`);

--
-- Indices de la tabla `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`idNivel`);

--
-- Indices de la tabla `planilla`
--
ALTER TABLE `planilla`
  ADD PRIMARY KEY (`idPlanilla`),
  ADD KEY `idEmpleado` (`idEmpleado`),
  ADD KEY `idTipoPlanilla` (`idTipoPlanilla`);

--
-- Indices de la tabla `tipo_planilla`
--
ALTER TABLE `tipo_planilla`
  ADD PRIMARY KEY (`idTipoPlanilla`),
  ADD KEY `idConfig` (`idConfig`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`idUbicacion`),
  ADD KEY `idConfiguracion` (`idConfiguracion`),
  ADD KEY `idConfiguracion_2` (`idConfiguracion`);

--
-- Indices de la tabla `unidad_generadora`
--
ALTER TABLE `unidad_generadora`
  ADD PRIMARY KEY (`idUnidadGen`),
  ADD KEY `idDivision` (`idDivision`),
  ADD KEY `idComplejo` (`idComplejo`),
  ADD KEY `idUbicacion` (`idUbicacion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD UNIQUE KEY `idUsuario_2` (`idUsuario`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `valores`
--
ALTER TABLE `valores`
  ADD PRIMARY KEY (`idValores`),
  ADD KEY `idUnidadGen` (`idUnidadGen`),
  ADD KEY `idDivision` (`idDivision`),
  ADD KEY `idComplejo` (`idComplejo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `complejo`
--
ALTER TABLE `complejo`
  MODIFY `idComplejo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `idConfiguracion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `division`
--
ALTER TABLE `division`
  MODIFY `idDivision` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT de la tabla `kpi`
--
ALTER TABLE `kpi`
  MODIFY `idKPI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `kpi_planilla`
--
ALTER TABLE `kpi_planilla`
  MODIFY `idKPIPlanilla` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `nivel`
--
ALTER TABLE `nivel`
  MODIFY `idNivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `planilla`
--
ALTER TABLE `planilla`
  MODIFY `idPlanilla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_planilla`
--
ALTER TABLE `tipo_planilla`
  MODIFY `idTipoPlanilla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `idUbicacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `unidad_generadora`
--
ALTER TABLE `unidad_generadora`
  MODIFY `idUnidadGen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `valores`
--
ALTER TABLE `valores`
  MODIFY `idValores` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
