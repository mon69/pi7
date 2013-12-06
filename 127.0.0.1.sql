-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2013 at 05:48 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pi6`
--
CREATE DATABASE `pi6` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `pi6`;

-- --------------------------------------------------------

--
-- Table structure for table `cat_pantallas`
--

CREATE TABLE IF NOT EXISTS `cat_pantallas` (
  `idPantalla` int(11) NOT NULL AUTO_INCREMENT,
  `txt_pantalla` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idPantalla`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

--
-- Dumping data for table `cat_pantallas`
--

INSERT INTO `cat_pantallas` (`idPantalla`, `txt_pantalla`) VALUES
(1, 'Clientes'),
(2, 'Inventario'),
(3, 'Venta'),
(4, 'Rutas'),
(5, 'Reportes'),
(6, 'Permisos'),
(7, 'Usuarios');

-- --------------------------------------------------------

--
-- Table structure for table `cat_permisos`
--

CREATE TABLE IF NOT EXISTS `cat_permisos` (
  `idPermiso` int(11) NOT NULL AUTO_INCREMENT,
  `txt_permiso` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idPermiso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cat_permisos`
--

INSERT INTO `cat_permisos` (`idPermiso`, `txt_permiso`) VALUES
(1, 'Alta'),
(2, 'Baja'),
(3, 'Lista'),
(4, 'Modificar');

-- --------------------------------------------------------

--
-- Table structure for table `cat_productos`
--

CREATE TABLE IF NOT EXISTS `cat_productos` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `txt_nombre` varchar(45) COLLATE utf8_bin NOT NULL,
  `txt_categoria` varchar(45) COLLATE utf8_bin NOT NULL,
  `txt_contenido` varchar(100) COLLATE utf8_bin NOT NULL,
  `txt_marca` varchar(45) COLLATE utf8_bin NOT NULL,
  `txt_codigoBarras` varchar(40) COLLATE utf8_bin NOT NULL,
  `txt_precio` int(10) NOT NULL,
  PRIMARY KEY (`idProducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=20 ;

--
-- Dumping data for table `cat_productos`
--

INSERT INTO `cat_productos` (`idProducto`, `txt_nombre`, `txt_categoria`, `txt_contenido`, `txt_marca`, `txt_codigoBarras`, `txt_precio`) VALUES
(1, 'Coca cola', '', '600ml', 'Coca Cola', '', 0),
(2, 'Mirinda', '', '600ml', 'Pepsi', '', 7),
(7, 'ChocoX', '', 'chocolitros', 'Choco', '', 1000),
(9, 'coco', 'coco', '300', 'coco', '', 0),
(15, 'chetos', 'frituras', '15', 'sabritas', '', 7),
(17, 'manzana', 'bebidas', '50', 'coca-cola', '', 12),
(18, 'melon', 'frutas y verduras', '40 k', 'Fruta', '', 21),
(19, 'felipe', 'felipe', '12', 'felipe', '', 23);

-- --------------------------------------------------------

--
-- Table structure for table `cat_tipopersonal`
--

CREATE TABLE IF NOT EXISTS `cat_tipopersonal` (
  `idTipoPersonal` int(11) NOT NULL AUTO_INCREMENT,
  `txt_nombre` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idTipoPersonal`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cat_tipopersonal`
--

INSERT INTO `cat_tipopersonal` (`idTipoPersonal`, `txt_nombre`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Table structure for table `cat_tipopersonal_permisos`
--

CREATE TABLE IF NOT EXISTS `cat_tipopersonal_permisos` (
  `idRegistro` int(11) NOT NULL AUTO_INCREMENT,
  `idTipoPersonal` int(11) NOT NULL,
  `idPantalla` int(11) NOT NULL,
  `idPermiso` int(11) NOT NULL,
  PRIMARY KEY (`idRegistro`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=29 ;

--
-- Dumping data for table `cat_tipopersonal_permisos`
--

INSERT INTO `cat_tipopersonal_permisos` (`idRegistro`, `idTipoPersonal`, `idPantalla`, `idPermiso`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 2),
(3, 1, 1, 3),
(4, 1, 1, 4),
(5, 1, 2, 1),
(6, 1, 2, 2),
(7, 1, 2, 3),
(8, 1, 2, 4),
(9, 1, 3, 1),
(10, 1, 3, 2),
(11, 1, 3, 3),
(12, 1, 3, 4),
(13, 1, 4, 1),
(14, 1, 4, 2),
(15, 1, 4, 3),
(16, 1, 4, 4),
(17, 1, 5, 1),
(18, 1, 5, 2),
(19, 1, 5, 3),
(20, 1, 5, 4),
(21, 1, 6, 1),
(22, 1, 6, 2),
(23, 1, 6, 3),
(24, 1, 6, 4),
(25, 1, 7, 1),
(26, 1, 7, 2),
(27, 1, 7, 3),
(28, 1, 7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `ctrl_clientes`
--

CREATE TABLE IF NOT EXISTS `ctrl_clientes` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `txt_nombre` varchar(45) COLLATE utf8_bin NOT NULL,
  `txt_correo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `txt_telefono` int(10) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `idProductosFavoritos` int(11) NOT NULL,
  `fec_sigVenta` datetime DEFAULT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ctrl_clientes`
--

INSERT INTO `ctrl_clientes` (`idCliente`, `txt_nombre`, `txt_correo`, `txt_telefono`, `lat`, `lng`, `idProductosFavoritos`, `fec_sigVenta`) VALUES
(1, 'kike', 'algo@gmail.com', 4123, 19.283316950504357, -103.7306758761406, 0, NULL),
(4, 'Choco Amezcua xD', 'algo@gmail.com', 312314, 19.500900485219894, -104.29233312606812, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ctrl_personal`
--

CREATE TABLE IF NOT EXISTS `ctrl_personal` (
  `idPersonal` int(11) NOT NULL AUTO_INCREMENT,
  `txt_usuario` varchar(45) COLLATE utf8_bin NOT NULL,
  `txt_password` varchar(32) COLLATE utf8_bin NOT NULL,
  `idTipoPersonal` int(11) NOT NULL,
  PRIMARY KEY (`idPersonal`),
  KEY `TipoPersonal_idx` (`idTipoPersonal`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ctrl_personal`
--

INSERT INTO `ctrl_personal` (`idPersonal`, `txt_usuario`, `txt_password`, `idTipoPersonal`) VALUES
(1, 'kike', '066fc7b468bbf62055fe69a4f097de90', 1),
(2, 'moy', '066fc7b468bbf62055fe69a4f097de90', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ctrl_producto_ruta`
--

CREATE TABLE IF NOT EXISTS `ctrl_producto_ruta` (
  `idRegistro` int(11) NOT NULL AUTO_INCREMENT,
  `idRutaHistorial` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`idRegistro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ctrl_productosfavoritos`
--

CREATE TABLE IF NOT EXISTS `ctrl_productosfavoritos` (
  `idRegistro` int(11) NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `num_cantidad` int(11) NOT NULL,
  PRIMARY KEY (`idRegistro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ctrl_productoshistorial`
--

CREATE TABLE IF NOT EXISTS `ctrl_productoshistorial` (
  `idHistorial` int(11) NOT NULL AUTO_INCREMENT,
  `fec_dia` date NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `idPersonal` int(11) NOT NULL,
  `num_cantidad` int(11) NOT NULL,
  PRIMARY KEY (`idHistorial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ctrl_productoslotes`
--

CREATE TABLE IF NOT EXISTS `ctrl_productoslotes` (
  `idLote` int(11) NOT NULL AUTO_INCREMENT,
  `idProducto` int(11) NOT NULL,
  `fec_caducidad` date NOT NULL,
  `num_cantidad` int(11) NOT NULL,
  PRIMARY KEY (`idLote`),
  KEY `idProducto_idx` (`idProducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=13 ;

--
-- Dumping data for table `ctrl_productoslotes`
--

INSERT INTO `ctrl_productoslotes` (`idLote`, `idProducto`, `fec_caducidad`, `num_cantidad`) VALUES
(1, 1, '2014-01-06', 100),
(2, 1, '2013-11-14', 200),
(3, 2, '0000-00-00', 300),
(9, 6, '2015-07-16', 111),
(10, 9, '2013-12-05', 100),
(11, 7, '0000-00-00', 100),
(12, 19, '2013-12-27', 12);

-- --------------------------------------------------------

--
-- Table structure for table `ctrl_rutadefinida`
--

CREATE TABLE IF NOT EXISTS `ctrl_rutadefinida` (
  `idRutaDefinida` int(11) NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) NOT NULL,
  `idRutaDefinidaNext` int(11) NOT NULL,
  PRIMARY KEY (`idRutaDefinida`),
  KEY `idCliente_idx` (`idCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ctrl_rutas`
--

CREATE TABLE IF NOT EXISTS `ctrl_rutas` (
  `idRuta` int(11) NOT NULL AUTO_INCREMENT,
  `idRutaDefinida` int(11) NOT NULL,
  `txt_nombreRuta` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idRuta`),
  KEY `RutaDefinida_idx` (`idRutaDefinida`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='				' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ctrl_rutashistorial`
--

CREATE TABLE IF NOT EXISTS `ctrl_rutashistorial` (
  `idHistorial` int(11) NOT NULL AUTO_INCREMENT,
  `idRuta` int(11) NOT NULL,
  `idChofer` int(11) NOT NULL,
  `fec_dia` datetime NOT NULL,
  `idProductoRuta` int(11) NOT NULL,
  PRIMARY KEY (`idHistorial`),
  KEY `idRuta_idx` (`idRuta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
