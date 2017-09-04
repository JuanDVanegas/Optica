-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 04-09-2017 a las 15:17:51
-- Versión del servidor: 5.5.57-cll
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `opticaal_optica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigo`
--

CREATE TABLE `codigo` (
  `id_codigo` int(11) NOT NULL,
  `numero` varchar(200) COLLATE utf8_bin NOT NULL,
  `tipo` varchar(250) COLLATE utf8_bin NOT NULL,
  `fk_mail` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `codigo`
--

INSERT INTO `codigo` (`id_codigo`, `numero`, `tipo`, `fk_mail`) VALUES
(1, '17e62166fc8586dfa4d1bc0e1742c08b', 'Restablecer Contraseña', 0),
(3, '28dd2c7955ce926456240b2ff0100bde', 'Restablecer Contraseña', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidad`
--

CREATE TABLE `entidad` (
  `id_entidad` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_bin NOT NULL,
  `address` varchar(200) COLLATE utf8_bin NOT NULL,
  `codigo` varchar(200) COLLATE utf8_bin NOT NULL,
  `detalles` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `entidad`
--

INSERT INTO `entidad` (`id_entidad`, `nombre`, `address`, `codigo`, `detalles`, `estado`) VALUES
(0, 'Ninguno', 'Ninguno', '', 'Ninguno', 1),
(1000, 'vision 20/20', 'cra 23 - 19 NQS bis 4', 'kh25J45SS', 'reuniendo', 1),
(1001, 'abc opticas', 'Cr 86 6-37 L-242', '3001186', 'new inspiration to you', 1),
(1002, 'optical care', 'Cl 53 73 A-47', ' 8022715', 'my future is yours', 1),
(1003, 'good life visions', 'Cr 24 67-22 L-117', '2178429', 'presidents at visions', 1),
(1004, 'servioptica', 'Cl 75 a 20-55', '76948248', 'vive con dirección y confort', 1),
(1005, 'OPTICA MONSERRATE', 'Cr 9 15-19', '490803823', NULL, 1),
(1007, 'OPTICLINICAS', 'Cr18 136 A-26', '4258429', NULL, 1),
(1008, 'GAMMALUZ', 'Avenida 19 8 - 05', '2840689', NULL, 1),
(1009, 'CONTACTO VISUAL', 'Cr 15 52-19', '977837962', NULL, 1),
(1010, 'MY EYESs', 'KR 69 # 51 - 80', 'aab3238922bcc25a6f606eb525ffdc56', 'nueva entidad', 1),
(1015, 'truncate true', 'fucking there', 'c20ad4d76fe97759aa27a0c99bff6710', 'database answering', 1);

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

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id_historial`, `fk_paciente`, `fk_medico`, `fk_registro`, `lugar`, `fecha`) VALUES
(1, 5, 2, 1, 'asdf', '2017-08-18'),
(2, 12, 14, 2, 'asdf', '2017-08-10'),
(3, 16, 2, 3, 'Bogota Chapinero', '2017-08-10'),
(4, 18, 14, 4, 'Helling From Shit', '2017-08-04'),
(5, 18, 14, 5, 'Fucker', '2017-08-18'),
(6, 18, 21, 6, 'Soacha', '2017-08-16'),
(7, 22, 2, 7, 'Soacha', '2017-08-11'),
(8, 18, 2, 8, 'USAQUEN', '2017-08-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `fk_user` int(100) NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `confirmMail` int(100) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id_login`, `fk_user`, `email`, `password`, `confirmMail`, `estado`) VALUES
(1, 1, 'prueba', '202cb962ac59075b964b07152d234b70', 1, 1),
(2, 2, 'leiderpresiado@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 1),
(3, 3, 'optical.oficial@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 1),
(5, 5, 'katherine', '202cb962ac59075b964b07152d234b70', 0, 1),
(6, 6, 'noquiere', '202cb962ac59075b964b07152d234b70', 0, 1),
(10, 10, 'jdvanegas087@misena.edu.co', '202cb962ac59075b964b07152d234b70', 1, 1),
(11, 11, 'nosepork', '202cb962ac59075b964b07152d234b70', 1, 1),
(12, 12, 'conmigo', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1),
(13, 13, 'admin', '202cb962ac59075b964b07152d234b70', 0, 1),
(14, 14, 'juan.vaanegas.16@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 1),
(15, 15, 'dfburgos36@misena.edu.co', '202cb962ac59075b964b07152d234b70', 1, 1),
(17, 17, 'newuser@gmail.com', '4a2028eceac5e1f4d252ea13c71ecec6', 0, 1),
(18, 18, 'holmer', '202cb962ac59075b964b07152d234b70', 1, 1),
(19, 19, 'bob', '202cb962ac59075b964b07152d234b70', 0, 1),
(21, 21, 'leyder154611@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 1),
(22, 22, 'astridp28723@gmail.com', '46e95a03cdf8448c2f08ebcee76a1f11', 1, 1),
(23, 23, 'katiika.morera@gmail.com', 'b0e6e2814443ed6a058ccd0ff1dc0ffe', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id_registro` int(11) NOT NULL,
  `descripcion` varchar(1250) COLLATE utf8_bin NOT NULL,
  `resultados` varchar(1250) COLLATE utf8_bin NOT NULL,
  `tratamiento` varchar(1250) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id_registro`, `descripcion`, `resultados`, `tratamiento`) VALUES
(1, 'sadf', 'asd', 'asdf'),
(2, '123asd4f56', 'fasd465sa4f86', '4fas6d4fsa6d5'),
(3, 'Esto funciona a la perfeccion', 'Esto funciona a la perfeccion', 'Esto funciona a la perfeccion'),
(4, 'Where´s fucking dream', 'trying out rights', 'fuckers fisaste'),
(5, 'Trying two parts ', 'foreing keys', 'persons'),
(6, 'Checking for database Where answering equals true', 'Advanced project', 'Requesting by fetching'),
(7, 'Hola madre', 'Su resultado exito', 'Ninguno'),
(8, 'EL PACIENTE INGRESA CON SÍNTOMAS VISUALES DE CONJUNTIVITIS.', 'SE TRANSMITE A UN TRATAMIENTO LEVE DE MEJORÍA PARA SU ENFERMEDAD', 'SE LE FORMULA MEDICINAS Y GOTAS PARA SU RECUPERACION.');

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
(2, 'Medico', 'Leyder', 'Mendieta', 'Pasaporte', '12555', 214748364, '2012-06-14', 'F', 1001),
(3, 'Paciente', 'Pedro Tamato', 'fonseca', 'Tarjeta de identidad', '105656', 453412, '2017-07-13', 'M', 0),
(5, 'Paciente', 'carlos', 'esperanza', 'Libreta Militar', '0000001', 0, '2017-07-20', 'F', 0),
(6, 'Medico', 'carlos', 'esperanza', 'Libreta Militar', '0000002', 0, '2017-07-21', 'F', 1002),
(10, 'Paciente', 'Juan', 'Vanegas', 'Cedula de ciudadania', '99043002780', 0, '1468-03-10', 'F', 0),
(11, 'Medico', 'Rodrigo ', 'Florez', 'Cedula extrajera', '123465498798', 0, '1990-08-08', 'M', 1007),
(12, 'Paciente', 'Francis', 'Edwar', 'Cedula de ciudadania', '13217846', 0, '2017-08-09', 'M', 0),
(13, 'Admin', 'Juan', 'Vanegas', 'Libreta Militar', '1234', 0, '2017-08-16', 'M', 0),
(14, 'Medico', 'Juan David', 'Vanegas', 'Cedula extrajera', '6596797', 7851212, '2017-08-03', 'M', 1007),
(15, 'Paciente', 'estosdatossonfake', '123', 'Cedula de ciudadania', '1010243943', 0, '2017-08-01', 'M', 0),
(17, 'Paciente', 'new', 'user', 'Tarjeta de identidad', '123', 0, '0000-00-00', 'F', 0),
(18, 'Paciente', 'Andres', 'morales', 'Cedula extrajera', '123', 2147483647, '2017-08-11', 'F', 0),
(19, 'Medico', 'Bob', 'user', 'Tarjeta de identidad', '123456', 0, '2017-08-04', 'F', 1013),
(21, 'Medico', 'Michael', 'Jackson', 'Pasaporte', '154611', 0, '2017-08-18', 'M', 1000),
(22, 'Paciente', 'Astrid', 'Paez', 'Cedula de ciudadania', '19235678', 0, '1984-08-17', 'F', 0),
(23, 'Paciente', 'Katherine ', 'roriguez', 'Cedula de ciudadania', '1020830064', 0, '1997-09-30', 'F', 0);

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
  MODIFY `id_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `entidad`
--
ALTER TABLE `entidad`
  MODIFY `id_entidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1016;
--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador del registro a realizar', AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
