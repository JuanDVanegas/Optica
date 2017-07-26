-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-07-2017 a las 23:18:03
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
  `codigoAcesso` varchar(20) COLLATE utf8_bin NOT NULL,
  `palabraClave` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_entidad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1010 ;

--
-- Volcado de datos para la tabla `entidad`
--

INSERT INTO `entidad` (`id_entidad`, `nombre`, `address`, `codigoAcesso`, `palabraClave`) VALUES
(1000, 'Vision 20/20', 'cra 23 - 19 NQS bis 4', 'kh25J45SS', 'tu vision nuestra responsabilidad'),
(1001, 'ABC OPTICAS', 'Cr 86 6-37 L-242', '3001186', 'ver mejor'),
(1002, 'OPTICAL CARE', 'Cl 53 73 A-47', ' 8022715', 'enfocar la retina'),
(1003, 'OPTICA VEA', 'Cr 24 67-22 L-117', '2178429', 'pupila endoplasmatica'),
(1004, 'SERVIOPTICA', 'Cl 75 a 20-55', '76948248', 'como tienes tu vision'),
(1005, 'OPTICA MONSERRATE', 'Cr 9 15-19', '490803823', 'porque no ves bien'),
(1006, 'OJAZOS y OJITOS', 'Cr 9 18-46', '591180438', 'la enfermedad visual crece'),
(1007, 'OPTICLINICAS', 'Cr18 136 A-26', '4258429', 'los ojos son vitales para vivir'),
(1008, 'GAMMALUZ', 'Avenida 19 8 - 05', '2840689', 'un ciego no tiene esta experiencia'),
(1009, 'CONTACTO VISUAL', 'Cr 15 52-19', '977837962', 'acata las reglas');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id_login`, `fk_user`, `email`, `password`, `confirmMail`) VALUES
(1, 1, 'prueba', '123', 0),
(2, 2, 'david', '123', 0);

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
  `perfil` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `rolUsuario`, `nombre`, `apellido`, `tipoDocumento`, `numeroDocumento`, `telefono`, `nacimiento`, `entidad`, `perfil`) VALUES
(1, 'Paciente', 'Leyder', 'Mendieta', 'Cedula de ciudadania', '1024590834', NULL, '0454-09-12', 0, 'profile/predeterminado.jpg'),
(2, 'Medico', 'David', 'Perdomo', 'Cedula extrajera', '56258484', NULL, '1201-06-09', 1001, 'profile/predeterminado.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
