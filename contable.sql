-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-05-2018 a las 21:47:46
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `contable`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `id` int(11) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `extra` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`id`, `codigo`, `nombre`, `descripcion`, `tipo`, `status`, `extra`) VALUES
(1, '1', 'ACTIVO', 'd', 'ACTIVO', 'publicado', 'N'),
(2, '11', 'ACTIVO CORRIENTE', '', 'ACTIVO', 'publicado', 'N'),
(3, '111', 'DISPONIBILIDADES', '', 'ACTIVO', 'publicado', 'N'),
(4, '1111', 'caja moneda nacional', '', 'ACTIVO', 'publicado', 'N'),
(5, '1112', 'caja moneda extranjera', '', 'ACTIVO', 'publicado', 'N'),
(6, '1113', 'caja chica(Fondo fijo)', '', 'ACTIVO', 'publicado', 'N'),
(7, '1114', 'bancos(Cta. Cte)', '', 'ACTIVO', 'publicado', 'N'),
(8, '1115', 'caja de ahorro M.N.', '', 'ACTIVO', 'publicado', 'N'),
(9, '1116', 'caja de ahorro M.E.', '', 'ACTIVO', 'publicado', 'N'),
(10, '1117', 'deposito a plazo fijo M.N.', '', 'ACTIVO', 'publicado', 'N'),
(11, '1118', 'deposito a plazo fijo M.E.', '', 'ACTIVO', 'publicado', 'N'),
(12, '1119', 'Fondo de amortizacion', '', 'ACTIVO', 'publicado', 'N'),
(13, '112', 'EXIGIBLE O CREDITOS', '', 'ACTIVO', 'publicado', 'N'),
(14, '1121', 'cuentas por cobrar (a clientes)', '', 'ACTIVO', 'publicado', 'N'),
(15, '11210', 'Dividendos por cobrar', '', 'ACTIVO', 'publicado', 'N'),
(16, '11211', 'Comisionista', '', 'ACTIVO', 'publicado', 'N'),
(17, '11212', 'Consignatario', '', 'ACTIVO', 'publicado', 'N'),
(18, '11213', 'Cuentas incobrables', '', 'ACTIVO', 'publicado', 'N'),
(19, '11214', 'Otras cuentas por cobrar', '', 'ACTIVO', 'publicado', 'N'),
(20, '11215', 'Cuentas del personal', '', 'ACTIVO', 'publicado', 'N'),
(21, '11216', 'Alquileres por cobrar', '', 'ACTIVO', 'publicado', 'N'),
(22, '11217', 'Comisiones por cobrar', '', 'ACTIVO', 'publicado', 'N'),
(23, '11218', 'Intereses por cobrar', '', 'ACTIVO', 'publicado', 'N'),
(24, '11219', 'Seguros por cobrar', '', 'ACTIVO', 'publicado', 'N'),
(25, '1122', 'letras por cobrar', '', 'ACTIVO', 'publicado', 'N'),
(26, '11220', 'Credito fiscal (impuesto IVA)', '', 'ACTIVO', 'publicado', 'N'),
(27, '11221', 'Clientes', '', 'ACTIVO', 'publicado', 'N'),
(28, '11222', 'Provision para cuentas incobrables', '', 'ACTIVO', 'publicado', 'N'),
(29, '11223', 'Documentos por cobrar descontados', '', 'ACTIVO', 'publicado', 'N'),
(30, '1123', 'letras renovadas por cobrar', '', 'ACTIVO', 'publicado', 'N'),
(31, '1124', 'letras protestadas por cobrar', '', 'ACTIVO', 'publicado', 'N'),
(32, '1125', 'documentos por cobrar', '', 'ACTIVO', 'publicado', 'N'),
(33, '1126', 'Hipoteca por cobrar', '', 'ACTIVO', 'publicado', 'N'),
(34, '1127', 'cuentas corrientes del personal', '', 'ACTIVO', 'publicado', 'N'),
(35, '1128', 'Entrega con cargos de cuentas', '', 'ACTIVO', 'publicado', 'N'),
(36, '1129', 'Arrendamientos por cobrar', '', 'ACTIVO', 'publicado', 'N'),
(37, '113', 'REALIZABLES O BIENES DE CAMBIO', '', 'ACTIVO', 'publicado', 'N'),
(38, '1131', 'Inventario inicial de mercaderia', '', 'ACTIVO', 'publicado', 'N'),
(39, '1132', 'Inventario final de mercaderia', '', 'ACTIVO', 'publicado', 'N'),
(40, '1133', 'Inventario de suministro de almacenes', '', 'ACTIVO', 'publicado', 'N'),
(41, '1134', 'Inventario de materias primas', '', 'ACTIVO', 'publicado', 'N'),
(42, '1135', 'Inventario de productos en proceso', '', 'ACTIVO', 'publicado', 'N'),
(43, '1136', 'Inventario de productos terminados', '', 'ACTIVO', 'publicado', 'N'),
(44, '1137', 'Mercaderias en transito', '', 'ACTIVO', 'publicado', 'N'),
(45, '114', 'DIFERIDOS', '', 'ACTIVO', 'publicado', 'N'),
(46, '1141', 'Anticipo sobre contratos', '', 'ACTIVO', 'publicado', 'N'),
(47, '11410', 'Comisiones pagados por anticipado', '', 'ACTIVO', 'publicado', 'N'),
(48, '11411', 'Publicidad pagado por anticipado', '', 'ACTIVO', 'publicado', 'N'),
(49, '11412', 'Arrendamiento pagado por adelantado', '', 'ACTIVO', 'publicado', 'N'),
(50, '11413', 'Gastos de organización', 'desc', 'EGRESO', 'publicado', 'N'),
(51, '11414', 'Amortizacion acumulada', '', 'ACTIVO', 'publicado', 'N'),
(52, '1142', 'Anticipo a proveedores', '', 'ACTIVO', 'publicado', 'N'),
(53, '1143', 'Anticipos al personal', '', 'ACTIVO', 'publicado', 'N'),
(54, '1144', 'Gastos pagados por adelantado', '', 'ACTIVO', 'publicado', 'N'),
(55, '1145', 'Impuestos pagados por anticipado', '', 'ACTIVO', 'publicado', 'N'),
(56, '1146', 'Alquileres pagados por anticipado', '', 'ACTIVO', 'publicado', 'N'),
(57, '1147', 'Intereses pagados por anticipado', '', 'ACTIVO', 'publicado', 'N'),
(58, '1148', 'Seguros pagados por adelantado', '', 'ACTIVO', 'publicado', 'N'),
(59, '1149', 'Sueldos pagados por anticipado', '', 'ACTIVO', 'publicado', 'N'),
(60, '115', 'INVERSIONES', '', 'ACTIVO', 'publicado', 'N'),
(61, '1151', 'Acciones en otras empresas', '', 'ACTIVO', 'publicado', 'N'),
(62, '1152', 'Certificado de aportacion', '', 'ACTIVO', 'publicado', 'N'),
(63, '1153', 'Acciones negociables', '', 'ACTIVO', 'publicado', 'N'),
(64, '1154', 'Inversion en bonos', '', 'ACTIVO', 'publicado', 'N'),
(65, '1155', 'Deposito a plazo fijo', '', 'ACTIVO', 'publicado', 'N'),
(66, '1156', 'Deposito en caja de ahorro', '', 'ACTIVO', 'publicado', 'N'),
(67, '1157', 'Bienes raices', '', 'ACTIVO', 'publicado', 'N'),
(68, '1158', 'Obras de arte', '', 'ACTIVO', 'publicado', 'N'),
(69, '12', 'ACTIVO NO CORRIENTE', '', 'ACTIVO', 'publicado', 'N'),
(70, '121', 'BIENES DE USO', '', 'ACTIVO', 'publicado', 'N'),
(71, '1211', 'Terrenos', '', 'ACTIVO', 'publicado', 'N'),
(72, '12110', 'Aviones', '', 'ACTIVO', 'publicado', 'N'),
(73, '12111', 'Maquinas para la construccion', '', 'ACTIVO', 'publicado', 'N'),
(74, '12112', 'Maquinaria agricola', '', 'ACTIVO', 'publicado', 'N'),
(75, '12113', 'Bienes arrendados', '', 'ACTIVO', 'publicado', 'N'),
(76, '12114', 'Obras de construccion', '', 'ACTIVO', 'publicado', 'N'),
(77, '12115', 'Tinglados', '', 'ACTIVO', 'publicado', 'N'),
(78, '1212', 'Edificios', '', 'ACTIVO', 'publicado', 'N'),
(79, '1213', 'Vehiculos automotores', '', 'ACTIVO', 'publicado', 'N'),
(80, '1214', 'Muebles y enseres de oficina', '', 'ACTIVO', 'publicado', 'N'),
(81, '1215', 'Equipos de computacion', '', 'ACTIVO', 'publicado', 'N'),
(82, '1216', 'Equipos e instalaciones', '', 'ACTIVO', 'publicado', 'N'),
(83, '1217', 'Barcos y lanchas', '', 'ACTIVO', 'publicado', 'N'),
(84, '1218', 'Maquinaria en general', '', 'ACTIVO', 'publicado', 'N'),
(85, '1219', 'Herramientas', '', 'ACTIVO', 'publicado', 'N'),
(86, '122', 'INTANGIBLES', '', 'ACTIVO', 'publicado', 'N'),
(87, '1221', 'Patentes', '', 'ACTIVO', 'publicado', 'N'),
(88, '1222', 'Marcas de fabrica', '', 'ACTIVO', 'publicado', 'N'),
(89, '1223', 'Derechos de autor', '', 'ACTIVO', 'publicado', 'N'),
(90, '1224', 'Lineas de productos', '', 'ACTIVO', 'publicado', 'N'),
(91, '1225', 'Derecho de llave', '', 'ACTIVO', 'publicado', 'N'),
(92, '1226', 'Amortizacion acumulada patentes', '', 'ACTIVO', 'publicado', 'N'),
(93, '1227', 'Programas software', '', 'ACTIVO', 'publicado', 'N'),
(94, '1228', 'Inventario inicial de mercaderia', '', 'ACTIVO', 'publicado', 'N'),
(95, '2', 'PASIVO', '', 'PASIVO', 'publicado', 'N'),
(96, '21', 'PASIVO CORRIENTE', '', 'PASIVO', 'publicado', 'N'),
(97, '211', 'OBLIGACIONEST TRIBUTARIAS', '', 'PASIVO', 'publicado', 'N'),
(98, '2111', 'Debito fiscal IVA', '', 'PASIVO', 'publicado', 'N'),
(99, '2112', 'Impuesto a las transacciones por pagar', '', 'PASIVO', 'publicado', 'N'),
(100, '2113', 'Impuestos por pagar', '', 'PASIVO', 'publicado', 'N'),
(101, '2114', 'IUE. Por pagar', '', 'PASIVO', 'publicado', 'N'),
(102, '2115', 'RC-IVA por pagar', '', 'PASIVO', 'publicado', 'N'),
(103, '2116', 'ICE por pagar', '', 'PASIVO', 'publicado', 'N'),
(104, '2117', 'Patentes municipales por pagar', '', 'PASIVO', 'publicado', 'N'),
(105, '2118', '?????????????????', '', 'PASIVO', 'publicado', 'N'),
(106, '212', 'OBLIGACIONES LABORALES', '', 'PASIVO', 'publicado', 'N'),
(107, '2121', 'Sueldos y salarios por pagar', '', 'PASIVO', 'publicado', 'N'),
(108, '2122', 'Primas por pagar', '', 'PASIVO', 'publicado', 'N'),
(109, '2123', 'Aguinaldo por pagar', '', 'PASIVO', 'publicado', 'N'),
(110, '2124', 'Subsidios por pagar', '', 'PASIVO', 'publicado', 'N'),
(111, '2125', 'Caja nacional de salud', '', 'PASIVO', 'publicado', 'N'),
(112, '2126', 'AFP. Futuro de Bolivia', '', 'PASIVO', 'publicado', 'N'),
(113, '2127', 'AFP. Prevision BBV', '', 'PASIVO', 'publicado', 'N'),
(114, '2128', 'Provivienda por pagar\r\nProvivienda por pagar', '', 'PASIVO', 'publicado', 'N'),
(115, '213', 'OBLIGACIONES COMERCIALES', '', 'PASIVO', 'publicado', 'N'),
(116, '2131', 'Proveedores', '', 'PASIVO', 'publicado', 'N'),
(117, '21310', 'Arrendamiento por pagar', '', 'PASIVO', 'publicado', 'N'),
(118, '21311', 'Contratos de concesiones por pagar', '', 'PASIVO', 'publicado', 'N'),
(119, '21312', 'Prestamos bancarios CP', '', 'PASIVO', 'publicado', 'N'),
(120, '21313', 'Bonos por pagar CP', '', 'PASIVO', 'publicado', 'N'),
(121, '21314', 'Cominente', '', 'PASIVO', 'publicado', 'N'),
(122, '21315', 'Provision para aguinaldos', '', 'PASIVO', 'publicado', 'N'),
(123, '2132', 'Anticipo de clientes', '', 'PASIVO', 'publicado', 'N'),
(124, '2133', 'Cuentas por pagar', '', 'PASIVO', 'publicado', 'N'),
(125, '2134', 'Letras por pagar CP', '', 'PASIVO', 'publicado', 'N'),
(126, '2135', 'Letras renovadas por pagar', '', 'PASIVO', 'publicado', 'N'),
(127, '2136', 'Letras protestadas por pagar', '', 'PASIVO', 'publicado', 'N'),
(128, '2137', 'Documentos por pagar', '', 'PASIVO', 'publicado', 'N'),
(129, '2138', 'Hipotecas por pagar', '', 'PASIVO', 'publicado', 'N'),
(130, '2139', 'Anticipo de clientes', '', 'PASIVO', 'publicado', 'N'),
(131, '214', 'OTRA CUENTAS POR PAGAR', '', 'PASIVO', 'publicado', 'N'),
(132, '2141', 'Gastos de mantenimiento por pagar', '', 'PASIVO', 'publicado', 'N'),
(133, '2142', 'Alquileres por pagar', '', 'PASIVO', 'publicado', 'N'),
(134, '2143', 'comisiones por pagar', '', 'PASIVO', 'publicado', 'N'),
(135, '2144', 'Intereses por pagar', '', 'PASIVO', 'publicado', 'N'),
(136, '2145', 'Publicidad y propaganda por pagar', '', 'PASIVO', 'publicado', 'N'),
(137, '2146', 'Seguros por pagar', '', 'PASIVO', 'publicado', 'N'),
(138, '2147', 'Otras cuentas por pagar', '', 'PASIVO', 'publicado', 'N'),
(139, '215', 'INGRESOS ANTICIPADOS', '', 'PASIVO', 'publicado', 'N'),
(140, '2151', 'Alquileres percibidos por adelantado', '', 'PASIVO', 'publicado', 'N'),
(141, '2152', 'Comisiones percibidos por adelantado', '', 'PASIVO', 'publicado', 'N'),
(142, '2153', 'Intereses percibidos por adelantado', '', 'PASIVO', 'publicado', 'N'),
(143, '2154', 'Anticipo de clientes', '', 'PASIVO', 'publicado', 'N'),
(144, '2155', 'Honorarios cobrados por adelantado', '', 'PASIVO', 'publicado', 'N'),
(145, '2156', '???????????????????', '', 'PASIVO', 'publicado', 'N'),
(146, '22', 'PASIVO CORRIENTE', '', 'PASIVO', 'publicado', 'N'),
(147, '221', 'OBLIGACIONES A LARGO PLAZO', '', 'PASIVO', 'publicado', 'N'),
(148, '2211', 'Prestamos bancarios', '', 'PASIVO', 'publicado', 'N'),
(149, '2212', 'Documentos por pagar LP.', '', 'PASIVO', 'publicado', 'N'),
(150, '2213', 'Hipotecas por pagar LP.', '', 'PASIVO', 'publicado', 'N'),
(151, '2214', 'Bonos por pagar LP.', '', 'PASIVO', 'publicado', 'N'),
(152, '2215', 'Prestamos con garantia', '', 'PASIVO', 'publicado', 'N'),
(153, '2216', 'Prestamos sin garantia', '', 'PASIVO', 'publicado', 'N'),
(154, '2217', 'Provisiones para regalias', '', 'PASIVO', 'publicado', 'N'),
(155, '2218', 'Prevision para indemnizaciones', '', 'PASIVO', 'publicado', 'N'),
(156, '222', 'CREDITOS DIFERIDOS', '', 'PASIVO', 'publicado', 'N'),
(157, '2221', 'Primas en emision de bonos', '', 'PASIVO', 'publicado', 'N'),
(158, '2222', 'Ventas a plazos', '', 'PASIVO', 'publicado', 'N'),
(159, '2223', 'Debito fiscal diferido', '', 'PASIVO', 'publicado', 'N'),
(160, '2224', 'Ingresos diferidos por arrendamiento', '', 'PASIVO', 'publicado', 'N'),
(161, '2225', '????????????????????..', '', 'PASIVO', 'publicado', 'N'),
(162, '3', 'PATRIMONIO', '', 'PATRIMONIO', 'publicado', 'N'),
(163, '31', 'CAPITAL CONTABLE', '', 'PATRIMONIO', 'publicado', 'N'),
(164, '311', 'CAPITAL SOCIAL', '', 'PATRIMONIO', 'publicado', 'N'),
(165, '312', 'Capital social preferente', '', 'PATRIMONIO', 'publicado', 'N'),
(166, '313', 'Capital social comun', '', 'PATRIMONIO', 'publicado', 'N'),
(167, '314', 'Capital limitado', '', 'PATRIMONIO', 'publicado', 'N'),
(168, '315', 'Capital colectivo', '', 'PATRIMONIO', 'publicado', 'N'),
(169, '316', 'Capital comanditario', '', 'PATRIMONIO', 'publicado', 'N'),
(170, '317', 'Capital comanditario por acciones', '', 'PATRIMONIO', 'publicado', 'N'),
(171, '318', 'Aportes laborales por pagar', '', 'PATRIMONIO', 'publicado', 'N'),
(172, '319', '???????????????????', '', 'PATRIMONIO', 'publicado', 'N'),
(173, '321', 'RESERVAS', '', 'PATRIMONIO', 'publicado', 'N'),
(174, '3211', 'Reserva legal', '', 'PATRIMONIO', 'publicado', 'N'),
(175, '3212', 'Ajuste global de patrimonio', '', 'PATRIMONIO', 'publicado', 'N'),
(176, '3213', 'Reserva extraordinaria', '', 'PATRIMONIO', 'publicado', 'N'),
(177, '3214', 'Reserva para reinversion de capital', '', 'PATRIMONIO', 'publicado', 'N'),
(178, '3215', 'Reserva para reposicion de capital', '', 'PATRIMONIO', 'publicado', 'N'),
(179, '3216', 'capital po revalorizacion de activos fijos', '', 'PATRIMONIO', 'publicado', 'N'),
(180, '331', 'RESULTADOS', '', 'PATRIMONIO', 'publicado', 'N'),
(181, '3311', 'Resultados acumulados', '', 'PATRIMONIO', 'publicado', 'N'),
(182, '3312', 'Resultados de ejercicio', '', 'PATRIMONIO', 'publicado', 'N'),
(183, '341', 'SUPERAVIT', '', 'PATRIMONIO', 'publicado', 'N'),
(184, '3411', 'Prima emision de acciones', '', 'PATRIMONIO', 'publicado', 'N'),
(185, '3412', 'Superavit por donaciones', '', 'PATRIMONIO', 'publicado', 'N'),
(186, '3413', 'Superavit por asignacion sobre acciones', '', 'PATRIMONIO', 'publicado', 'N'),
(187, '3414', 'Superavit por donacion de acciones', '', 'PATRIMONIO', 'publicado', 'N'),
(188, '3415', 'Superavit por desercion de acciones', '', 'PATRIMONIO', 'publicado', 'N'),
(189, '4', 'CUENTAS REGULADORAS', '', 'R', 'publicado', 'N'),
(190, '41', 'DEUDORAS DE PASIVO', '', 'R', 'publicado', 'N'),
(191, '411', 'Primas diferidas en emision de bonos', '', 'R', 'publicado', 'N'),
(192, '42', 'DEUDORAS DE PATRIMONIO', '', 'R', 'publicado', 'N'),
(193, '421', 'accionistas', '', 'R', 'publicado', 'N'),
(194, '422', 'Aportes por cobrar', '', 'R', 'publicado', 'N'),
(195, '43', 'PREVISIONES', '', 'R', 'publicado', 'N'),
(196, '431', 'Prevision para cuentas incobrables', '', 'R', 'publicado', 'N'),
(197, '432', 'Prevision para obsolecencia de inventarios', '', 'R', 'publicado', 'N'),
(198, '433', 'Prevision para fluctuacion de valores', '', 'R', 'publicado', 'N'),
(199, '434', 'Letras descontadas', '', 'R', 'publicado', 'N'),
(200, '44', 'DEPRECIACIONES ACUMULADAS', '', 'R', 'publicado', 'N'),
(201, '441', 'Depreciacion acumulada Muebles y enseres de oficina', 'des ', 'PASIVO', 'publicado', 'D'),
(202, '442', 'Depreciacion acumulada equipos de computacion', '', 'PASIVO', 'publicado', 'D'),
(203, '443', 'Depreciacion acumulada vehiculos y automotores', '', 'PASIVO', 'publicado', 'D'),
(204, '444', 'Depreciacion acumulada equipoes e instalaciones', '', 'PASIVO', 'publicado', 'D'),
(205, '445', 'Depreciacion acumulada herramientas', '', 'PASIVO', 'publicado', 'D'),
(206, '446', 'Depreciacion acumulada edificios', 'des', 'PASIVO', 'publicado', 'D'),
(207, '447', 'Depreciacion acumuladabienes arrendados', '', 'PASIVO', 'publicado', 'D'),
(208, '448', 'Depreciacion acumulada maquinaria agricola', '', 'PASIVO', 'publicado', 'D'),
(209, '449', '???????????????????????????', '', 'R', 'publicado', 'N'),
(210, '45', 'AMORTIZACIONES ACUMULADAS', '', 'R', 'publicado', 'N'),
(211, '451', 'Amortizacion acumulada descuento en emision de bonos', '', 'R', 'publicado', 'N'),
(212, '452', 'Amortizacion acumulada gastos de organizaci?n', '', 'R', 'publicado', 'N'),
(213, '453', 'Amortizacion acumulada contratos de concesion', '', 'R', 'publicado', 'N'),
(214, '454', 'Amortizacion acumulada de patentes', '', 'R', 'publicado', 'N'),
(215, '455', 'Amortizacion acumulada derechos de llave', '', 'R', 'publicado', 'N'),
(216, '456', '???????????????????????????..', '', 'R', 'publicado', 'N'),
(217, '5', 'CUENTAS DE ORDEN', '', 'O', 'publicado', 'N'),
(218, '51', 'DEUDORAS', '', 'O', 'publicado', 'N'),
(219, '511', 'Bonos para emision', '', 'O', 'publicado', 'N'),
(220, '512', 'Mercaderias recibidas en consignacion', '', 'O', 'publicado', 'N'),
(221, '513', 'Acciones', '', 'O', 'publicado', 'N'),
(222, '514', 'Aval de boletas', '', 'O', 'publicado', 'N'),
(223, '515', 'Bienes recibidos en custodia', '', 'O', 'publicado', 'N'),
(224, '52', 'ACREEDORAS', '', 'O', 'publicado', 'N'),
(225, '521', 'Bonos autorizados', '', 'O', 'publicado', 'N'),
(226, '522', 'Consignantes', '', 'O', 'publicado', 'N'),
(227, '523', 'Capital autorizado', '', 'O', 'publicado', 'N'),
(228, '524', 'Boletas de garantia', '', 'O', 'publicado', 'N'),
(229, '525', 'Consignante de bienes', '', 'O', 'publicado', 'N'),
(230, '6', 'CUENTAS DE COSTO', '', 'C', 'publicado', 'N'),
(231, '61', 'COSTO DE MERCADERIA', '', 'C', 'publicado', 'N'),
(232, '612', 'Compras', '', 'C', 'publicado', 'N'),
(233, '613', 'Recargo sobre compras', '', 'C', 'publicado', 'N'),
(234, '614', 'Fletes y acarreos sobre compras', '', 'C', 'publicado', 'N'),
(235, '615', 'Devolucion sobre compras', 'desc', 'PASIVO', 'publicado', 'N'),
(236, '7', 'CUENTAS DE GASTO', '', 'EGRESO', 'publicado', 'N'),
(237, '71', 'GASTOS DE ADMINISTRACION', '', 'EGRESO', 'publicado', 'N'),
(238, '711', 'Sueldos y salarios', '', 'EGRESO', 'publicado', 'N'),
(239, '7110', 'Gastos de representacion', '', 'EGRESO', 'publicado', 'N'),
(240, '7111', 'Gastos generales', '', 'EGRESO', 'publicado', 'N'),
(241, '7112', 'Gastos de mantenimiento', '', 'EGRESO', 'publicado', 'N'),
(242, '7113', 'Arrendamientos pagados', '', 'EGRESO', 'publicado', 'N'),
(243, '7114', 'Alquileres pagados', '', 'EGRESO', 'publicado', 'N'),
(244, '7115', 'Comisiones pagadas', '', 'EGRESO', 'publicado', 'N'),
(245, '7116', 'Faltante de caja', '', 'EGRESO', 'publicado', 'N'),
(246, '7117', 'Perdida por venta de bienes de uso', '', 'EGRESO', 'publicado', 'N'),
(247, '7118', 'Perdida por bajas de bienes de uso', '', 'EGRESO', 'publicado', 'N'),
(248, '7119', 'Perdida por venta de invenciones', '', 'EGRESO', 'publicado', 'N'),
(249, '712', 'Aguinaldos', '', 'EGRESO', 'publicado', 'N'),
(250, '7120', 'Perdida por baja de inventarios', '', 'EGRESO', 'publicado', 'N'),
(251, '7121', 'Perdida por recuperacion de siniestros', '', 'EGRESO', 'publicado', 'N'),
(252, '7122', 'Depreciacion de muebles y enseres de oficina', '', 'EGRESO', 'publicado', 'N'),
(253, '7123', 'Depreciacion de equipos de computacion', '', 'EGRESO', 'publicado', 'N'),
(254, '7124', 'Depreciacion de vehiculos automotores', '', 'EGRESO', 'publicado', 'N'),
(255, '7125', 'Depreciacion de equipos e instalaciones', '', 'EGRESO', 'publicado', 'N'),
(256, '7126', 'Depreciacion de herramientas', '', 'EGRESO', 'publicado', 'N'),
(257, '7127', 'Depreciacion de edificios', '', 'EGRESO', 'publicado', 'N'),
(258, '7128', 'Depreciacion de Bienes arrendados', '', 'EGRESO', 'publicado', 'N'),
(259, '7129', 'Amortizacion descuento en emision de bonos', '', 'EGRESO', 'publicado', 'N'),
(260, '713', 'Primas', '', 'EGRESO', 'publicado', 'N'),
(261, '7130', 'Amortizacion patentes', '', 'EGRESO', 'publicado', 'N'),
(262, '7131', 'Amortizacion lineas de productos', '', 'EGRESO', 'publicado', 'N'),
(263, '7132', 'Amortizacion derecho de llave', '', 'EGRESO', 'publicado', 'N'),
(264, '7133', 'Impuesto propiedad bienes inmuebles y vehculos', '', 'EGRESO', 'publicado', 'N'),
(265, '7134', 'Servicio de refrigerio', '', 'EGRESO', 'publicado', 'N'),
(266, '7135', 'Reparacion de vehiculos', '', 'EGRESO', 'publicado', 'N'),
(267, '7136', 'Suscripcion periodicos y revistas', '', 'EGRESO', 'publicado', 'N'),
(268, '7137', 'Papeleria', '', 'EGRESO', 'publicado', 'N'),
(269, '7138', 'Gastos de telefono y comunicaciones', '', 'EGRESO', 'publicado', 'N'),
(270, '7139', 'Energia electrica y agua', '', 'EGRESO', 'publicado', 'N'),
(271, '714', 'Seguros pagados', '', 'EGRESO', 'publicado', 'N'),
(272, '7140', 'Mantenimiento activo fijo', '', 'EGRESO', 'publicado', 'N'),
(273, '7141', 'Gastos generales', '', 'EGRESO', 'publicado', 'N'),
(274, '7142', 'Material de escritorio', 'des', 'ACTIVO', 'publicado', 'N'),
(275, '7143', 'Faltas de caja', '', 'EGRESO', 'publicado', 'N'),
(276, '715', 'Indemnizaciones', '', 'EGRESO', 'publicado', 'N'),
(277, '716', 'Aportes patronales', '', 'EGRESO', 'publicado', 'N'),
(278, '717', 'Subsidios', '', 'EGRESO', 'publicado', 'N'),
(279, '718', 'Honorarios', '', 'EGRESO', 'publicado', 'N'),
(280, '719', 'Pasajes y viaticos', '', 'EGRESO', 'publicado', 'N'),
(281, '72', 'GASTOS DE VENTA', '', 'EGRESO', 'publicado', 'N'),
(282, '721', 'impuesto a las transacciones', '', 'EGRESO', 'publicado', 'N'),
(283, '7210', 'Sueldo a los vendedores', '', 'EGRESO', 'publicado', 'N'),
(284, '722', 'Suministro de almacenes', '', 'EGRESO', 'publicado', 'N'),
(285, '723', 'Fletes de ventas', '', 'EGRESO', 'publicado', 'N'),
(286, '724', 'Descuento en ventas', '', 'EGRESO', 'publicado', 'N'),
(287, '725', 'Devoluciones y rebajas en ventas', '', 'EGRESO', 'publicado', 'N'),
(288, '726', 'Publicidad y propaganda', '', 'EGRESO', 'publicado', 'N'),
(289, '727', 'Perdida en cuentas incobrables', '', 'EGRESO', 'publicado', 'N'),
(290, '728', 'Gastos de protesto', '', 'EGRESO', 'publicado', 'N'),
(291, '729', 'Comisiones en ventas', '', 'EGRESO', 'publicado', 'N'),
(292, '73', 'GASTOS FINANCIEROS', '', 'EGRESO', 'publicado', 'N'),
(293, '731', 'Intereses pagados', '', 'EGRESO', 'publicado', 'N'),
(294, '732', 'Comisiones bancarias', '', 'EGRESO', 'publicado', 'N'),
(295, '733', 'Amortizacion descuento en emision de bonos', '', 'EGRESO', 'publicado', 'N'),
(296, '734', 'Diferencia de cambio (saldo deudor)', '', 'EGRESO', 'publicado', 'N'),
(297, '735', 'Ajuste por inflacion y tenencia de bienes', '', 'EGRESO', 'publicado', 'N'),
(298, '8', 'CUENTAS DE INGRESOS', '', 'INGRESO', 'publicado', 'N'),
(299, '81', 'INGRESOS OPERATIVOS', '', 'INGRESO', 'publicado', 'N'),
(300, '811', 'Ventas', '', 'INGRESO', 'publicado', 'N'),
(301, '812', 'Ingresos por servicios', '', 'INGRESO', 'publicado', 'N'),
(302, '813', 'Ingresos por primas en emision de bonos', '', 'INGRESO', 'publicado', 'N'),
(303, '814', 'Ingresos por arrendamiento', '', 'INGRESO', 'publicado', 'N'),
(304, '82', 'INGRESOS NO OPERATIVOS', '', 'INGRESO', 'publicado', 'N'),
(305, '821', 'Intereses ganados o percibidos', '', 'INGRESO', 'publicado', 'N'),
(306, '8210', 'Ingreso por venta de  inversiones', '', 'INGRESO', 'publicado', 'N'),
(307, '8211', 'Diferencia de cambio (saldo acreedor)', '', 'INGRESO', 'publicado', 'N'),
(308, '8212', 'otros ingresos', '', 'INGRESO', 'publicado', 'N'),
(309, '822', 'Comisiones ganado', '', 'INGRESO', 'publicado', 'N'),
(310, '823', 'Alquileres ganados', '', 'INGRESO', 'publicado', 'N'),
(311, '824', 'Ganancias en venta de acciones', '', 'INGRESO', 'publicado', 'N'),
(312, '825', 'Descuento en compras', '', 'INGRESO', 'publicado', 'N'),
(313, '826', 'Sobrante de caja', '', 'INGRESO', 'publicado', 'N'),
(314, '827', 'Dividendos ganados', '', 'INGRESO', 'publicado', 'N'),
(315, '828', 'Ganancia en venta de activos fijos', '', 'INGRESO', 'publicado', 'N'),
(316, '829', 'Diferencia de inventarios', '', 'INGRESO', 'publicado', 'N'),
(317, 's', 's', 's', 'ACTIVO', 'publicado', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `librodiario`
--

CREATE TABLE `librodiario` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` text NOT NULL,
  `tipo_asiento` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `librodiario`
--

INSERT INTO `librodiario` (`id`, `fecha`, `descripcion`, `tipo_asiento`) VALUES
(1, '2014-06-01', 'Asiento inicial', 'NORMAL'),
(2, '2014-06-08', 'Por gastos de la organización', 'NORMAL'),
(3, '2014-06-12', 'por la compra de 5 cocinas a 1420 c/u según factura 3452 \r\n', 'NORMAL'),
(4, '2014-06-22', 'Por apertura de una cuenta de fondo fijo\r\n', 'NORMAL'),
(5, '2014-06-29', 'por la ventas de 3 cocinas c/u a 700\r\n', 'NORMAL'),
(6, '2014-07-02', 'Por compra de un equipo de computación según factura 1987', 'NORMAL'),
(7, '2014-07-10', 'Por cancelación de sueldos.', 'NORMAL'),
(8, '2014-07-15', 'por regularización del IVA e IT del mes de junio', 'NORMAL'),
(9, '2014-07-20', 'Por la compra de material de escritorio', 'NORMAL'),
(10, '2014-07-28', 'Por la compra de material de limpieza', 'NORMAL'),
(11, '2014-07-29', 'Por el pago de luz, agua y teléfono', 'NORMAL'),
(12, '2014-08-05', 'por la venta de 4 cocinas y 2 refrigeradores', 'NORMAL'),
(13, '2014-08-15', 'Por el deposito a plazo fijo', 'NORMAL'),
(14, '2014-08-20', 'Regularización el pago IVA e IT de julio', 'NORMAL'),
(15, '2014-08-24', 'Por la compra de 1000 dólares', 'NORMAL'),
(16, '2014-08-29', 'Por el pago de sueldos y salarios del mes de julio', 'NORMAL'),
(17, '2014-08-31', 'Por el pago de los servicios básicos y reparación del teléfono fijo', 'NORMAL'),
(18, '2014-08-31', 'Por la reparación del teléfono', 'NORMAL'),
(19, '2014-09-01', 'interés ganados en el BANCO BOLIVIA', 'NORMAL'),
(20, '2014-09-09', 'Por la compra de 40 planchas a 80 c/u según factura 7935', 'NORMAL'),
(21, '2014-09-11', 'Por el pago de la deuda del 12 de junio', 'NORMAL'),
(22, '2014-09-15', 'Por devolución de 10 planchas por encontrarse en mal estado', 'NORMAL'),
(23, '2014-09-15', 'Por el pago de sueldos con incremento de 5% del mes de agosto', 'NORMAL'),
(24, '2014-09-20', 'Se regulariza los impuestos IVA e IT del mes de agosto', 'NORMAL'),
(25, '2014-09-21', 'Por el pago de facturas de luz agua y teléfono\r\n', 'NORMAL'),
(26, '2014-10-05', 'Se otorga un anticipo al personal por 800', 'NORMAL'),
(27, '2014-10-09', 'Por la venta de 15 planchas a 150 c/u según factura 003', 'NORMAL'),
(28, '2014-10-15', 'Por el pago de sueldos y salarios del mes de septiembre', 'NORMAL'),
(29, '2014-10-20', 'Devolución de planchas vendidas el 09 de oct, regularización impuestos IVA e IT', 'NORMAL'),
(30, '2014-10-20', 'Se regulariza los impuestos IVA e IT del mes de septiembre', 'NORMAL'),
(31, '2014-11-02', 'Se devenga las planillas de sueldo del mes de octubre', 'NORMAL'),
(32, '2014-11-08', 'Por la compra de 8 cocinas c/u a 380', 'NORMAL'),
(33, '2014-11-15', 'Por el pago de sueldos del mes de noviembre', 'NORMAL'),
(34, '2014-11-20', 'Se regulariza los impuestos IVA e IT del mes de octubre', 'NORMAL'),
(35, '2014-11-22', 'El banco Bolivia informa que el interés ganado es de 380\r\n', 'NORMAL'),
(36, '2014-11-28', 'Por la venta de 8 planchas y 3 cocinas', 'NORMAL'),
(37, '2014-11-30', 'Por el pago de facturas de luz agua y telefono', 'NORMAL'),
(38, '2014-12-01', 'Por la venta de 3 refrigeradores a 1700 c/u', 'NORMAL'),
(39, '2014-12-09', 'Por el pago de sueldos al personal del mes de noviembre', 'NORMAL'),
(40, '2014-12-13', 'Por el pago de la deuda del 28 de noviembre', 'NORMAL'),
(41, '2014-12-18', 'Pago de aguinaldos del 2° semestre de 2014', 'NORMAL'),
(42, '2014-12-19', 'Se regulariza los impuestos IVA e IT del mes de noviembre', 'NORMAL'),
(43, '2014-12-25', 'Devenga servicios básicos del mes de diciembre', 'NORMAL'),
(44, '2014-12-30', 'Por la reposición de fondos fijos por 590', 'NORMAL'),
(47, '2016-05-30', 'Por depreciacion de Edificios', 'AJUSTE'),
(48, '2016-05-30', 'Por depreciacion de Muebles y Enseres de Oficina', 'AJUSTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `librodiariodetalle`
--

CREATE TABLE `librodiariodetalle` (
  `id` int(11) NOT NULL,
  `id_cuenta` int(11) NOT NULL,
  `debe` decimal(12,2) NOT NULL,
  `haber` decimal(12,2) NOT NULL,
  `id_diario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `librodiariodetalle`
--

INSERT INTO `librodiariodetalle` (`id`, `id_cuenta`, `debe`, `haber`, `id_diario`) VALUES
(1, 4, '90000.00', '0.00', 1),
(2, 78, '150000.00', '0.00', 1),
(3, 80, '80000.00', '0.00', 1),
(4, 38, '4000.00', '0.00', 1),
(5, 164, '0.00', '324000.00', 1),
(6, 50, '1305.00', '0.00', 2),
(7, 26, '195.00', '0.00', 2),
(8, 4, '0.00', '1500.00', 2),
(9, 39, '6177.00', '0.00', 3),
(10, 26, '923.00', '0.00', 3),
(11, 293, '71.00', '0.00', 3),
(12, 4, '0.00', '3550.00', 3),
(13, 124, '0.00', '3550.00', 3),
(14, 135, '0.00', '71.00', 3),
(15, 6, '2000.00', '0.00', 4),
(16, 4, '0.00', '2000.00', 4),
(17, 4, '1680.00', '0.00', 5),
(18, 14, '420.00', '0.00', 5),
(19, 282, '63.00', '0.00', 5),
(20, 23, '12.60', '0.00', 5),
(21, 300, '0.00', '1827.00', 5),
(22, 98, '0.00', '273.00', 5),
(23, 99, '0.00', '63.00', 5),
(24, 305, '0.00', '12.60', 5),
(25, 81, '6660.72', '0.00', 6),
(26, 26, '995.28', '0.00', 6),
(27, 4, '0.00', '7656.00', 6),
(28, 238, '7500.00', '0.00', 7),
(29, 4, '0.00', '7500.00', 7),
(30, 98, '273.00', '0.00', 8),
(31, 99, '63.00', '0.00', 8),
(32, 26, '0.00', '273.00', 8),
(33, 4, '0.00', '63.00', 8),
(34, 274, '435.00', '0.00', 9),
(35, 26, '65.00', '0.00', 9),
(36, 4, '0.00', '500.00', 9),
(37, 273, '174.00', '0.00', 10),
(38, 26, '26.00', '0.00', 10),
(39, 4, '0.00', '200.00', 10),
(40, 270, '95.70', '0.00', 11),
(41, 269, '78.30', '0.00', 11),
(42, 26, '26.00', '0.00', 11),
(43, 4, '0.00', '200.00', 11),
(44, 4, '6480.00', '0.00', 12),
(45, 282, '194.40', '0.00', 12),
(46, 300, '0.00', '5637.60', 12),
(47, 98, '0.00', '842.40', 12),
(48, 99, '0.00', '194.40', 12),
(49, 10, '6480.00', '0.00', 13),
(50, 4, '0.00', '6480.00', 13),
(51, 98, '0.00', '0.00', 14),
(52, 99, '0.00', '0.00', 14),
(53, 26, '0.00', '0.00', 14),
(54, 4, '0.00', '0.00', 14),
(55, 5, '6960.00', '0.00', 15),
(56, 4, '0.00', '6960.00', 15),
(57, 238, '7500.00', '0.00', 16),
(58, 4, '0.00', '7500.00', 16),
(59, 270, '76.56', '0.00', 17),
(60, 269, '87.00', '0.00', 17),
(61, 26, '24.44', '0.00', 17),
(62, 4, '0.00', '188.00', 17),
(63, 272, '696.00', '0.00', 18),
(64, 26, '104.00', '0.00', 18),
(65, 4, '0.00', '800.00', 18),
(66, 7, '380.00', '0.00', 19),
(67, 305, '0.00', '380.00', 19),
(68, 39, '2784.00', '0.00', 20),
(69, 26, '416.00', '0.00', 20),
(70, 4, '0.00', '3200.00', 20),
(71, 124, '3550.00', '0.00', 21),
(72, 135, '71.00', '0.00', 21),
(73, 4, '0.00', '3621.00', 21),
(74, 4, '800.00', '0.00', 22),
(75, 235, '0.00', '696.00', 22),
(76, 26, '0.00', '104.00', 22),
(77, 238, '7875.00', '0.00', 23),
(78, 4, '0.00', '7875.00', 23),
(79, 98, '842.40', '0.00', 24),
(80, 99, '194.40', '0.00', 24),
(81, 26, '0.00', '842.40', 24),
(82, 4, '0.00', '194.40', 24),
(83, 270, '121.80', '0.00', 25),
(84, 269, '82.65', '0.00', 25),
(85, 26, '30.55', '0.00', 25),
(86, 4, '0.00', '235.00', 25),
(87, 53, '800.00', '0.00', 26),
(88, 4, '0.00', '800.00', 26),
(89, 14, '2250.00', '0.00', 27),
(90, 282, '67.50', '0.00', 27),
(91, 300, '0.00', '1957.50', 27),
(92, 98, '0.00', '292.50', 27),
(93, 99, '0.00', '67.50', 27),
(94, 238, '7875.00', '0.00', 28),
(95, 4, '0.00', '7075.00', 28),
(96, 53, '0.00', '800.00', 28),
(97, 300, '261.00', '0.00', 29),
(98, 98, '39.00', '0.00', 29),
(99, 99, '9.00', '0.00', 29),
(100, 282, '0.00', '9.00', 29),
(101, 14, '0.00', '300.00', 29),
(102, 98, '0.00', '0.00', 30),
(103, 26, '0.00', '0.00', 30),
(104, 238, '7875.00', '0.00', 31),
(105, 107, '0.00', '7875.00', 31),
(106, 39, '2644.80', '0.00', 32),
(107, 26, '395.20', '0.00', 32),
(108, 4, '0.00', '3040.00', 32),
(109, 107, '7875.00', '0.00', 33),
(110, 4, '0.00', '7875.00', 33),
(111, 98, '253.50', '0.00', 34),
(112, 99, '58.50', '0.00', 34),
(113, 26, '0.00', '253.50', 34),
(114, 4, '0.00', '58.50', 34),
(115, 7, '380.00', '0.00', 35),
(116, 305, '0.00', '380.00', 35),
(117, 14, '3240.00', '0.00', 36),
(118, 282, '97.20', '0.00', 36),
(119, 300, '0.00', '2818.80', 36),
(120, 98, '0.00', '421.20', 36),
(121, 99, '0.00', '97.20', 36),
(122, 270, '247.95', '0.00', 37),
(123, 269, '217.50', '0.00', 37),
(124, 26, '69.55', '0.00', 37),
(125, 4, '0.00', '535.00', 37),
(126, 4, '5100.00', '0.00', 38),
(127, 282, '153.00', '0.00', 38),
(128, 300, '0.00', '4437.00', 38),
(129, 98, '0.00', '663.00', 38),
(130, 99, '0.00', '153.00', 38),
(131, 238, '7875.00', '0.00', 39),
(132, 4, '0.00', '7875.00', 39),
(133, 4, '3240.00', '0.00', 40),
(134, 14, '0.00', '3240.00', 40),
(135, 249, '7875.00', '0.00', 41),
(136, 4, '0.00', '7875.00', 41),
(137, 98, '421.20', '0.00', 42),
(138, 99, '97.20', '0.00', 42),
(139, 26, '0.00', '421.20', 42),
(140, 4, '0.00', '97.20', 42),
(141, 138, '0.00', '188.00', 43),
(142, 270, '78.30', '0.00', 43),
(143, 269, '85.26', '0.00', 43),
(144, 26, '24.44', '0.00', 43),
(145, 6, '590.00', '0.00', 44),
(146, 4, '0.00', '590.00', 44),
(151, 257, '1875.00', '0.00', 47),
(152, 206, '0.00', '1875.00', 47),
(153, 252, '4000.00', '0.00', 48),
(154, 201, '0.00', '4000.00', 48);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `codigo` varchar(10) DEFAULT NULL,
  `descripcion` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `codigo`, `descripcion`) VALUES
(1, 'ADM', 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `paterno` varchar(30) DEFAULT NULL,
  `materno` varchar(30) DEFAULT NULL,
  `login` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `fecha_record` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `paterno`, `materno`, `login`, `password`, `email`, `rol_id`, `fecha_record`) VALUES
(2, 'johnn', 'johnn', 'johnn', 'proyecto', '316', 'jo@gmail.com', 1, '2018-05-17 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `librodiario`
--
ALTER TABLE `librodiario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `librodiariodetalle`
--
ALTER TABLE `librodiariodetalle`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol_id` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=318;
--
-- AUTO_INCREMENT de la tabla `librodiario`
--
ALTER TABLE `librodiario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT de la tabla `librodiariodetalle`
--
ALTER TABLE `librodiariodetalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
