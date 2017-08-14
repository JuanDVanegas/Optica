-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-08-2017 a las 20:03:14
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_optica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigo`
--

CREATE TABLE `codigo` (
  `id_codigo` int(11) NOT NULL,
  `numero` int(20) NOT NULL,
  `tipo` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `codigo`
--

INSERT INTO `codigo` (`id_codigo`, `numero`, `tipo`) VALUES
(1, 7340759, 'Confirmar Cuenta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidad`
--

CREATE TABLE `entidad` (
  `id_entidad` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `address` varchar(50) COLLATE utf8_bin NOT NULL,
  `codigo` varchar(20) COLLATE utf8_bin NOT NULL,
  `sedePrincipal` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `detalles` varchar(250) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `entidad`
--

INSERT INTO `entidad` (`id_entidad`, `nombre`, `address`, `codigo`, `sedePrincipal`, `detalles`) VALUES
(0, '', '', '', NULL, NULL),
(1000, 'Vision 20/20', 'cra 23 - 19 NQS bis 4', 'kh25J45SS', NULL, NULL),
(1001, 'ABC OPTICAS', 'Cr 86 6-37 L-242', '3001186', NULL, NULL),
(1002, 'OPTICAL CARE', 'Cl 53 73 A-47', ' 8022715', NULL, NULL),
(1003, 'OPTICA VEA', 'Cr 24 67-22 L-117', '2178429', NULL, NULL),
(1004, 'SERVIOPTICA', 'Cl 75 a 20-55', '76948248', NULL, NULL),
(1005, 'OPTICA MONSERRATE', 'Cr 9 15-19', '490803823', NULL, NULL),
(1006, 'OJAZOS y OJITOS', 'Cr 9 18-46', '591180438', NULL, NULL),
(1007, 'OPTICLINICAS', 'Cr18 136 A-26', '4258429', NULL, NULL),
(1008, 'GAMMALUZ', 'Avenida 19 8 - 05', '2840689', NULL, NULL),
(1009, 'CONTACTO VISUAL', 'Cr 15 52-19', '977837962', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id_historial` int(11) NOT NULL COMMENT 'identificador del registro a realizar',
  `fk_paciente` int(11) NOT NULL COMMENT 'identificador del usuario paciente al cual se ejecutará el control',
  `fk_medico` int(11) NOT NULL COMMENT 'identificador del usuario medico que genera el reporte',
  `fk_registro` int(11) NOT NULL,
  `lugar` varchar(250) COLLATE utf8_bin DEFAULT NULL COMMENT 'direccion y lugar donde se ejecuta el control, la sede oftalmologica',
  `fecha` date NOT NULL COMMENT 'fecha de ejecución'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `fk_user` int(100) NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `confirmMail` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id_login`, `fk_user`, `email`, `password`, `confirmMail`) VALUES
(1, 1, 'prueba', '202cb962ac59075b964b07152d234b70', 0),
(2, 2, 'david', '202cb962ac59075b964b07152d234b70', 0),
(3, 3, 'hell', '202cb962ac59075b964b07152d234b70', 0),
(4, 4, 'chucho', '202cb962ac59075b964b07152d234b70', 0),
(5, 5, 'solofarra', 'd0d1b3721f62133f8e8b6eb710e58ad1', 0),
(6, 6, 'pgl', '202cb962ac59075b964b07152d234b70', 0),
(7, 7, 'brandon', '202cb962ac59075b964b07152d234b70', 0),
(8, 8, 'pepe', '202cb962ac59075b964b07152d234b70', 0),
(10, 10, 'jdvanegas087@misena.edu.co', 'f9f05b9212295e370124a330446867c6', 0),
(11, 11, 'hola', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(12, 12, 'algobasura', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id_registro` int(11) NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_bin NOT NULL,
  `resultados` varchar(250) COLLATE utf8_bin NOT NULL,
  `tratamiento` varchar(250) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `rolUsuario` varchar(50) COLLATE utf8_bin NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `apellido` varchar(50) COLLATE utf8_bin NOT NULL,
  `tipoDocumento` varchar(50) COLLATE utf8_bin NOT NULL,
  `numeroDocumento` varchar(20) COLLATE utf8_bin NOT NULL,
  `telefono` int(20) DEFAULT NULL,
  `nacimiento` date DEFAULT NULL,
  `entidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `rolUsuario`, `nombre`, `apellido`, `tipoDocumento`, `numeroDocumento`, `telefono`, `nacimiento`, `entidad`) VALUES
(1, 'Paciente', 'Leyder', 'Mendieta', 'Cedula de ciudadania', '1024590834', NULL, '0454-09-12', 0),
(2, 'Medico', 'David', 'Perdomos', 'Cedula de ciudadania', '55555', 2147483647, '2012-06-14', 1001),
(3, 'Paciente', 'pedro', 'fonseca', 'Tarjeta de identidad', '105656', 0, '2017-07-13', 0),
(4, 'Paciente', 'jesus', 'chuchito', 'Cedula de ciudadania', '12312', 0, '2017-07-12', 0),
(5, 'Paciente', 'carlos', 'esperanza', 'Libreta Militar', '0000001', 0, '2017-07-20', 0),
(6, 'Medico', 'carlos', 'esperanza', 'Libreta Militar', '0000002', 0, '2017-07-21', 1002),
(7, 'Medico', 'yesid', 'mendieta', 'Cedula de ciudadania', '9876584', 0, '2017-06-30', 1004),
(8, 'Paciente', 'pepe', 'casallas', 'Pasaporte', '56464', 0, '2017-07-11', 0),
(10, 'Paciente', 'Juan', 'Vanegas', 'Cedula de ciudadania', '99043002780', 0, '1468-03-10', 0),
(11, 'Medico', 'Rodrigo ', 'Florez', 'Cedula extrajera', '123465498798', 0, '1990-08-08', 1007),
(12, 'Paciente', 'HOLA', 'QuePereza', 'Cedula de ciudadania', '13217846', 0, '2017-08-09', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `codigo`
--
ALTER TABLE `codigo`
  ADD PRIMARY KEY (`id_codigo`);

--
-- Indices de la tabla `entidad`
--
ALTER TABLE `entidad`
  ADD PRIMARY KEY (`id_entidad`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id_historial`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id_registro`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `codigo`
--
ALTER TABLE `codigo`
  MODIFY `id_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `entidad`
--
ALTER TABLE `entidad`
  MODIFY `id_entidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1010;
--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador del registro a realizar';
--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
