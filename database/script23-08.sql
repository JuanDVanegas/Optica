-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-08-2017 a las 21:51:47
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
  `tipo` varchar(250) COLLATE utf8_bin NOT NULL,
  `fk_mail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidad`
--

CREATE TABLE `entidad` (
  `id_entidad` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_bin NOT NULL,
  `address` varchar(200) COLLATE utf8_bin NOT NULL,
  `codigo` varchar(200) COLLATE utf8_bin NOT NULL,
  `detalles` varchar(250) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `entidad`
--

INSERT INTO `entidad` (`id_entidad`, `nombre`, `address`, `codigo`, `detalles`) VALUES
(0, 'Ninguno', 'Ninguno', '', 'Ninguno'),
(1000, 'Vision 20/20', 'cra 23 - 19 NQS bis 4', 'kh25J45SS', NULL),
(1001, 'ABC OPTICAS', 'Cr 86 6-37 L-242', '3001186', NULL),
(1002, 'OPTICAL CARE', 'Cl 53 73 A-47', ' 8022715', NULL),
(1003, 'OPTICA VEA', 'Cr 24 67-22 L-117', '2178429', NULL),
(1004, 'SERVIOPTICA', 'Cl 75 a 20-55', '76948248', NULL),
(1005, 'OPTICA MONSERRATE', 'Cr 9 15-19', '490803823', NULL),
(1007, 'OPTICLINICAS', 'Cr18 136 A-26', '4258429', NULL),
(1008, 'GAMMALUZ', 'Avenida 19 8 - 05', '2840689', NULL),
(1009, 'CONTACTO VISUAL', 'Cr 15 52-19', '977837962', NULL),
(1010, 'MY EYES', 'KR 69 # 51 - 80', 'aab3238922bcc25a6f606eb525ffdc56', 'nueva entidad');

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
(1, 1, 'prueba', '202cb962ac59075b964b07152d234b70', 1),
(2, 2, 'david', '202cb962ac59075b964b07152d234b70', 1),
(3, 3, 'juan', '202cb962ac59075b964b07152d234b70', 0),
(5, 5, 'katherine', '202cb962ac59075b964b07152d234b70', 0),
(6, 6, 'noquiere', '202cb962ac59075b964b07152d234b70', 0),
(10, 10, 'jdvanegas087@misena.edu.co', '202cb962ac59075b964b07152d234b70', 1),
(11, 11, 'nosepork', '202cb962ac59075b964b07152d234b70', 1),
(12, 12, 'conmigo', '202cb962ac59075b964b07152d234b70', 1),
(13, 13, 'admin', '202cb962ac59075b964b07152d234b70', 0);

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
  `genero` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `entidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `rolUsuario`, `nombre`, `apellido`, `tipoDocumento`, `numeroDocumento`, `telefono`, `nacimiento`, `genero`, `entidad`) VALUES
(1, 'Admin', 'Leyder', 'Mendieta', 'Cedula extrajera', '1024', 72132, '0454-09-12', 'M', 0),
(2, 'Medico', 'David', 'Perdomos', 'Cedula de ciudadania', '55555', 2147483647, '2012-06-14', 'F', 1001),
(3, 'Paciente', 'pedro', 'fonseca', 'Tarjeta de identidad', '105656', 0, '2017-07-13', 'M', 0),
(5, 'Paciente', 'carlos', 'esperanza', 'Libreta Militar', '0000001', 0, '2017-07-20', 'F', 0),
(6, 'Medico', 'carlos', 'esperanza', 'Libreta Militar', '0000002', 0, '2017-07-21', 'F', 1002),
(10, 'Paciente', 'Juan', 'Vanegas', 'Cedula de ciudadania', '99043002780', 0, '1468-03-10', 'F', 0),
(11, 'Medico', 'Rodrigo ', 'Florez', 'Cedula extrajera', '123465498798', 0, '1990-08-08', 'M', 1007),
(12, 'Paciente', 'HOLA', 'QuePereza', 'Cedula de ciudadania', '13217846', 0, '2017-08-09', 'M', 0),
(13, 'Admin', 'Juan', 'Vanegas', 'Cedula de ciudadania', '1023568978', 0, '2017-08-16', 'M', 0);

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
  MODIFY `id_codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `entidad`
--
ALTER TABLE `entidad`
  MODIFY `id_entidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011;
--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador del registro a realizar';
--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
