-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-03-2023 a las 16:03:05
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbp_veterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_citas`
--

CREATE TABLE `tbl_citas` (
  `CIT_ID` int(11) NOT NULL,
  `CIT_HORAyFECHA` datetime DEFAULT NULL,
  `CIT_DESCRIPCION` varchar(28) DEFAULT NULL,
  `CIT_FKMAS_ID` int(11) DEFAULT NULL,
  `CIT_FECHA_REGISTRO` datetime NOT NULL DEFAULT current_timestamp(),
  `CIT_ESTADO` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_citas`
--

INSERT INTO `tbl_citas` (`CIT_ID`, `CIT_HORAyFECHA`, `CIT_DESCRIPCION`, `CIT_FKMAS_ID`, `CIT_FECHA_REGISTRO`, `CIT_ESTADO`) VALUES
(1, '2023-03-10 07:00:00', 'Cita De Valoracion', 1, '2023-03-07 06:59:08', 'Activo'),
(2, '2023-03-11 07:05:00', 'Cita De Control', 2, '2023-03-08 07:00:32', 'Activo'),
(3, '2023-03-12 07:10:00', 'Cita General', 5, '2023-03-09 11:00:20', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_clientes`
--

CREATE TABLE `tbl_clientes` (
  `CLI_ID` int(11) NOT NULL,
  `CLI_TIPO_DOC` varchar(11) DEFAULT NULL,
  `CLI_DOCUMENTO` int(28) DEFAULT NULL,
  `CLI_NOMBRES` varchar(28) DEFAULT NULL,
  `CLI_APELLIDOS` varchar(28) DEFAULT NULL,
  `CLI_TELEFONO` varchar(11) DEFAULT NULL,
  `CLI_EMAIL` varchar(92) DEFAULT NULL,
  `CLI_FECHA_REGISTRO` datetime NOT NULL DEFAULT current_timestamp(),
  `CLI_ESTADO` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_clientes`
--

INSERT INTO `tbl_clientes` (`CLI_ID`, `CLI_TIPO_DOC`, `CLI_DOCUMENTO`, `CLI_NOMBRES`, `CLI_APELLIDOS`, `CLI_TELEFONO`, `CLI_EMAIL`, `CLI_FECHA_REGISTRO`, `CLI_ESTADO`) VALUES
(1, 'CC', 1019191919, 'JAIME ALFONSO', 'BATEMAN CAYÓN', '3193191919', 'JaimeBateman@gmail.com', '2023-03-08 01:48:50', 'Activo'),
(2, 'CC', 101238383, 'DIEGO CAMILO', 'RENDON LOPEZ', '3003079207', 'Tear_2892@hotmail.com', '2023-03-09 19:55:20', 'Activo'),
(3, 'CC', 1014554545, 'FREDDY EUSEBIO', 'RINCÓN VALENCIA', '3124526589', 'Freddy19@gmail.com', '2023-03-10 19:22:40', 'Activo'),
(4, 'CC', 1014286897, 'JORGE CAMILO', 'TORRES RESTREPO', '3143645635', 'PadreCamilo@gmail.com', '2023-03-11 00:42:40', 'Activo'),
(5, 'TI', 1014252120, 'DULCE SOPHIA', 'RENDON ARIAS', '3225364826', 'Dulcesophiarendon@gmail.com', '2023-03-11 01:48:00', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estandar`
--

CREATE TABLE `tbl_estandar` (
  `EST_ID` int(1) NOT NULL,
  `EST_CONSULTA` varchar(28) DEFAULT NULL,
  `EST_DETALLE` varchar(92) DEFAULT NULL,
  `EST_DETALLE_2` varchar(92) DEFAULT NULL,
  `EST_DETALLE_3` varchar(92) DEFAULT NULL,
  `EST_FECHA_REGISTRO` datetime NOT NULL DEFAULT current_timestamp(),
  `EST_FECHA_MODIFICADO` datetime DEFAULT NULL,
  `EST_ESTADO` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_estandar`
--

INSERT INTO `tbl_estandar` (`EST_ID`, `EST_CONSULTA`, `EST_DETALLE`, `EST_DETALLE_2`, `EST_DETALLE_3`, `EST_FECHA_REGISTRO`, `EST_FECHA_MODIFICADO`, `EST_ESTADO`) VALUES
(1, 'TipoDocumento', 'CC', 'Cedula De Ciudadania', NULL, '2023-03-08 02:00:00', NULL, 'Activo'),
(2, 'TipoDocumento', 'CE', 'Cedula De Extranjeria', NULL, '2023-03-08 02:00:00', NULL, 'Activo'),
(3, 'TipoDocumento', 'PA', 'Pasaporte', NULL, '2023-03-08 02:00:00', NULL, 'Activo'),
(4, 'TipoDocumento', 'RC', 'Registro Civil', NULL, '2023-03-08 02:00:00', NULL, 'Activo'),
(5, 'TipoDocumento', 'TI', 'Tarjeta De Identidad	', NULL, '2023-03-08 02:00:00', NULL, 'Activo'),
(6, 'TipoMascota', 'Felino', 'Gato', NULL, '2023-03-08 02:20:20', NULL, 'Activo'),
(7, 'TipoMascota', 'Canino', 'Perro', NULL, '2023-03-08 02:20:20', NULL, 'Activo'),
(8, 'TipoMascota', 'Equino', 'Caballo', NULL, '2023-03-08 02:20:20', NULL, 'Activo'),
(9, 'TipoMascota', 'Lepórido', 'Conejo', NULL, '2023-03-08 02:20:20', NULL, 'Activo'),
(10, 'TipoMascota', 'Ave', 'Canario', NULL, '2023-03-08 02:20:20', NULL, 'Activo'),
(11, 'Genero', 'Femenino', NULL, NULL, '2023-03-08 02:20:20', NULL, 'Activo'),
(12, 'Genero', 'Masculino', NULL, NULL, '2023-03-08 02:20:20', NULL, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_mascotas`
--

CREATE TABLE `tbl_mascotas` (
  `MAS_ID` int(11) NOT NULL,
  `MAS_TIPO` varchar(28) DEFAULT NULL,
  `MAS_NOMBRE` varchar(28) DEFAULT NULL,
  `MAS_GENERO` varchar(11) DEFAULT NULL,
  `MAS_FKCLI_ID` int(11) DEFAULT NULL,
  `MAS_FECHA_REGISTRO` datetime NOT NULL DEFAULT current_timestamp(),
  `MAS_ESTADO` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_mascotas`
--

INSERT INTO `tbl_mascotas` (`MAS_ID`, `MAS_TIPO`, `MAS_NOMBRE`, `MAS_GENERO`, `MAS_FKCLI_ID`, `MAS_FECHA_REGISTRO`, `MAS_ESTADO`) VALUES
(1, 'Lepórido', 'BUGS', 'Masculino', 1, '2023-03-08 01:48:50', 'Activo'),
(2, 'Canino', 'MINGA', 'Masculino', 2, '2023-03-09 19:55:20', 'Activo'),
(3, 'Felino', 'KITTY', 'Femenino', 3, '2023-03-10 19:22:40', 'Activo'),
(4, 'Equino', 'PEGASO', 'Masculino', 4, '2023-03-11 00:42:40', 'Activo'),
(5, 'Felino', 'MERY MOON', 'Femenino', 5, '2023-03-11 01:48:00', 'Activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_citas`
--
ALTER TABLE `tbl_citas`
  ADD PRIMARY KEY (`CIT_ID`);

--
-- Indices de la tabla `tbl_clientes`
--
ALTER TABLE `tbl_clientes`
  ADD PRIMARY KEY (`CLI_ID`);

--
-- Indices de la tabla `tbl_estandar`
--
ALTER TABLE `tbl_estandar`
  ADD PRIMARY KEY (`EST_ID`);

--
-- Indices de la tabla `tbl_mascotas`
--
ALTER TABLE `tbl_mascotas`
  ADD PRIMARY KEY (`MAS_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_citas`
--
ALTER TABLE `tbl_citas`
  MODIFY `CIT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_clientes`
--
ALTER TABLE `tbl_clientes`
  MODIFY `CLI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_estandar`
--
ALTER TABLE `tbl_estandar`
  MODIFY `EST_ID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tbl_mascotas`
--
ALTER TABLE `tbl_mascotas`
  MODIFY `MAS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
