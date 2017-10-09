-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2017 a las 16:21:47
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
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `idEmpleado` int(11) NOT NULL,
  `nombreE` varchar(100) NOT NULL,
  `apellidoE` varchar(100) NOT NULL,
  `nroLegajo` int(45) NOT NULL,
  `convenio` varchar(100) NOT NULL,
  `dni` int(11) NOT NULL,
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

INSERT INTO `empleado` (`idEmpleado`, `nombreE`, `apellidoE`, `nroLegajo`, `convenio`, `dni`, `telefono`, `direccion`, `email`, `activo`, `idTipoEmpleado`, `idReferente`) VALUES
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

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idEmpleado`),
  ADD KEY `idTipoEmpleado` (`idTipoEmpleado`),
  ADD KEY `idTipoEmpleado_2` (`idTipoEmpleado`),
  ADD KEY `idReferente` (`idReferente`);

--
-- Indices de la tabla `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`idNivel`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD UNIQUE KEY `idUsuario_2` (`idUsuario`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT de la tabla `nivel`
--
ALTER TABLE `nivel`
  MODIFY `idNivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
