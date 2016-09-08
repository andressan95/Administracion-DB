-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2015 a las 22:31:34
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tutoriales`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cosas`
--

CREATE TABLE IF NOT EXISTS `cosas` (
  `cosa_id` int(11) NOT NULL AUTO_INCREMENT,
  `cosa_nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`cosa_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `cosas`
--

INSERT INTO `cosas` (`cosa_id`, `cosa_nombre`) VALUES
(1, 'Mesa'),
(2, 'Puerta'),
(3, 'Celular'),
(4, 'Botella'),
(5, 'Zapatos'),
(6, 'Alicate'),
(7, 'Televisor'),
(8, 'Cama'),
(9, 'Plato'),
(10, 'Escoba'),
(11, 'Tarjeta'),
(12, 'Carro'),
(13, 'Control'),
(14, 'Pelota'),
(15, 'Reloj');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usu_id` int(11) NOT NULL AUTO_INCREMENT,
  `usu_codigo` varchar(8) NOT NULL,
  `usu_nombres` varchar(50) NOT NULL,
  `usu_apellidos` varchar(50) NOT NULL,
  `usu_nacimiento` date NOT NULL,
  `usu_sexo` varchar(1) NOT NULL,
  PRIMARY KEY (`usu_id`),
  UNIQUE KEY `usu_codigo` (`usu_codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usu_id`, `usu_codigo`, `usu_nombres`, `usu_apellidos`, `usu_nacimiento`, `usu_sexo`) VALUES
(1, '11111111', 'Kevin Rodrigo', 'Avalos Cama', '1992-09-23', 'M'),
(2, '22222222', 'Gerardo Manuel', 'Martinez Perez', '1990-01-11', 'M'),
(3, '33333333', 'Fernanda Brigida', 'Borda Beltran', '1993-08-22', 'F'),
(4, '44444444', 'Maria Luisa', 'Estrada Soto', '1990-12-10', 'F'),
(5, '55555555', 'Pedro Pablo', 'Rodriguez Boado', '1989-06-19', 'M'),
(6, '66666666', 'Mario Pilatos', 'Forlan Ganster', '1988-01-10', 'M');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
