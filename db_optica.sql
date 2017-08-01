-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-08-2017 a las 19:38:46
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db_optica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigo`
--

CREATE TABLE IF NOT EXISTS `codigo` (
  `id_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(20) NOT NULL,
  `tipo` varchar(20) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidad`
--

CREATE TABLE IF NOT EXISTS `entidad` (
  `id_entidad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `address` varchar(50) COLLATE utf8_bin NOT NULL,
  `codigo` varchar(20) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_entidad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1010 ;

--
-- Volcado de datos para la tabla `entidad`
--

INSERT INTO `entidad` (`id_entidad`, `nombre`, `address`, `codigo`) VALUES
(1000, 'Vision 20/20', 'cra 23 - 19 NQS bis 4', 'kh25J45SS'),
(1001, 'ABC OPTICAS', 'Cr 86 6-37 L-242', '3001186'),
(1002, 'OPTICAL CARE', 'Cl 53 73 A-47', ' 8022715'),
(1003, 'OPTICA VEA', 'Cr 24 67-22 L-117', '2178429'),
(1004, 'SERVIOPTICA', 'Cl 75 a 20-55', '76948248'),
(1005, 'OPTICA MONSERRATE', 'Cr 9 15-19', '490803823'),
(1006, 'OJAZOS y OJITOS', 'Cr 9 18-46', '591180438'),
(1007, 'OPTICLINICAS', 'Cr18 136 A-26', '4258429'),
(1008, 'GAMMALUZ', 'Avenida 19 8 - 05', '2840689'),
(1009, 'CONTACTO VISUAL', 'Cr 15 52-19', '977837962');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user` int(100) NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `confirmMail` int(100) NOT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=10 ;

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
(8, 7, 'brandon', '202cb962ac59075b964b07152d234b70', 0),
(9, 8, 'pepe', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `rolUsuario` varchar(50) COLLATE utf8_bin NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `apellido` varchar(50) COLLATE utf8_bin NOT NULL,
  `tipoDocumento` varchar(50) COLLATE utf8_bin NOT NULL,
  `numeroDocumento` varchar(20) COLLATE utf8_bin NOT NULL,
  `telefono` int(20) DEFAULT NULL,
  `nacimiento` date DEFAULT NULL,
  `entidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `rolUsuario`, `nombre`, `apellido`, `tipoDocumento`, `numeroDocumento`, `telefono`, `nacimiento`, `entidad`) VALUES
(1, 'Paciente', 'Leyder', 'Mendieta', 'Cedula de ciudadania', '1024590834', NULL, '0454-09-12', 0),
(2, 'Medico', 'David', 'Perdomo', 'Cedula extrajera', '56258484', NULL, '1201-06-09', 1001),
(3, 'Paciente', 'pedro', 'fonseca', 'Tarjeta de identidad', '105656', 0, '2017-07-13', 0),
(4, 'Paciente', 'jesus', 'chuchito', 'Cedula de ciudadania', '12312', 0, '2017-07-12', 0),
(5, 'Paciente', 'carlos', 'esperanza', 'Libreta Militar', '0000001', 0, '2017-07-20', 0),
(6, 'Medico', 'carlos', 'esperanza', 'Libreta Militar', '0000002', 0, '2017-07-21', 1002),
(7, 'Medico', 'yesid', 'mendieta', 'Cedula de ciudadania', '9876584', 0, '2017-06-30', 1004),
(8, 'Paciente', 'pepe', 'casallas', 'Pasaporte', '56464', 0, '2017-07-11', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
