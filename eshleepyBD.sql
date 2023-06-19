-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 19-06-2023 a las 02:13:08
-- Versión del servidor: 10.6.12-MariaDB-cll-lve
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u478910710_eshleepy`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre_es` varchar(150) DEFAULT NULL,
  `nombre_en` varchar(150) DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `estatus` enum('si','no') DEFAULT NULL,
  `orden` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre_es`, `nombre_en`, `foto`, `estatus`, `orden`) VALUES
(1, 'Cuerdas', 'Jump Ropes', '16_32_29cat.jpg', 'si', 3),
(2, 'Tapetes', 'Mats', '15_46_43cat.jpg', 'si', 1),
(7, 'Velas', 'Candles', '15_47_25cat.jpg', 'si', 2),
(8, 'Accesorios', 'Accessories', '16_31_24cat.jpg', 'si', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `nombre_es` varchar(150) DEFAULT NULL,
  `nombre_en` varchar(150) DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `estatus` enum('si','no') DEFAULT NULL,
  `orden` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`id`, `nombre_es`, `nombre_en`, `foto`, `estatus`, `orden`) VALUES
(1, 'Negro', 'Black', NULL, 'si', 1),
(2, 'Azul', 'Blue', NULL, 'si', 2),
(3, 'Gris', 'Grey', NULL, 'si', 3),
(4, 'Blanco', 'White', NULL, 'si', NULL),
(5, 'Morado', 'Purple', NULL, 'si', NULL),
(6, 'Rojo', 'Red', NULL, 'si', NULL),
(7, 'Marrón', 'Brown', NULL, 'si', NULL),
(8, 'Varios colores', 'Varios colores', NULL, 'si', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosbancarios`
--

CREATE TABLE `datosbancarios` (
  `id` int(11) NOT NULL,
  `banco` varchar(150) DEFAULT NULL,
  `cuenta` varchar(150) DEFAULT NULL,
  `contacto` varchar(150) DEFAULT NULL,
  `identificacionid` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `estatus` enum('si','no') DEFAULT NULL,
  `orden` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `datosbancarios`
--

INSERT INTO `datosbancarios` (`id`, `banco`, `cuenta`, `contacto`, `identificacionid`, `email`, `estatus`, `orden`) VALUES
(2, 'Banresevas', '0000000132', 'Marielys Martínez', '987-99873-002', 'marielys@gmail.com', 'si', NULL),
(3, 'Popular', '0000000132', 'Marielys Martínez', '987-99873-002', 'marielys@gmail.com', 'si', NULL),
(4, 'Banco BHD', '353254545', 'Caroline Jiménez', '987-99873-444', 'carolinejimenez@gmail.com', 'si', NULL),
(5, 'American Bank', '2345234', 'Melny Rivera', '987-99873-555', 'melnyrivera@gmail.com', 'si', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envio`
--

CREATE TABLE `envio` (
  `id` int(11) NOT NULL,
  `nombre_es` varchar(150) DEFAULT NULL,
  `nombre_en` varchar(150) DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `estatus` enum('si','no') DEFAULT NULL,
  `orden` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `envio`
--

INSERT INTO `envio` (`id`, `nombre_es`, `nombre_en`, `foto`, `estatus`, `orden`) VALUES
(1, 'EPS', 'EPS', NULL, 'si', 2),
(2, 'VimenPaq', 'VimenPaq', NULL, 'si', 3),
(3, 'UPS', 'UPS', NULL, 'si', 4),
(4, 'FedEx', 'FedEx', NULL, 'si', 1),
(5, 'DHL', 'DHL', NULL, 'si', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `nombre_es` varchar(150) DEFAULT NULL,
  `nombre_en` varchar(150) DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `estatus` enum('si','no') DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `items`
--

INSERT INTO `items` (`id`, `nombre_es`, `nombre_en`, `foto`, `estatus`, `orden`, `id_categoria`) VALUES
(1, 'CAMISAS', 'SHIRTS', NULL, 'si', 1, 1),
(2, 'CAMISAS', 'SHIRTS', NULL, 'si', NULL, 2),
(3, 'CAMISAS', 'SHIRTS', NULL, 'si', NULL, 3),
(4, 'CAMISAS', 'SHIRTS', NULL, 'si', NULL, 4),
(6, 'CAMISAS', 'SHIRTS', NULL, 'si', NULL, 5),
(7, 'ZAPATOS', 'SHOES', NULL, 'si', NULL, 1),
(8, 'Pantalones', 'Pants', NULL, 'si', NULL, 1),
(9, 'Short', 'Shorts', NULL, 'si', NULL, 1),
(10, 'VESTIDOS', 'DRESSES', NULL, 'si', NULL, 2),
(11, 'ACCESORIOS', 'ACCESSORIES', NULL, 'si', NULL, 2),
(12, 'PANTALONES', 'PANTS', NULL, 'si', NULL, 3),
(13, 'BERMUDAS', 'BERMUDA', NULL, 'si', NULL, 3),
(14, 'VESTIDOS', 'DRESSES', NULL, 'si', NULL, 4),
(15, 'PIJAMAS', 'PIJAMAS', NULL, 'si', NULL, 4),
(16, 'PIJAMAS', 'PIJAMAS', NULL, 'si', NULL, 2),
(17, 'PANTALONES', 'PANTS', NULL, 'si', NULL, 5),
(18, 'ZAPATOS', 'SHOES', NULL, 'si', NULL, 5),
(19, 'ZAPATOS', 'SHOES', NULL, 'si', NULL, 3),
(20, 'ZAPATOS', 'SHOES', NULL, 'si', NULL, 4),
(21, 'ZAPATOS', 'SHOES', NULL, 'si', NULL, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `nombre_es` varchar(150) DEFAULT NULL,
  `nombre_en` varchar(150) DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `estatus` enum('si','no') DEFAULT NULL,
  `orden` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `nombre_es`, `nombre_en`, `foto`, `estatus`, `orden`) VALUES
(7, 'Blogilates', 'Blogilates', '23_10_17cat.png', 'si', NULL),
(9, 'ALO ', 'ALO', '23_43_00cat.png', 'si', NULL),
(14, 'Girlfriend Collective', 'Girlfriend Collective', '02_14_04cat.png', 'si', NULL),
(11, 'GAIAM', 'GAIAM', '01_00_00cat.png', 'si', NULL),
(13, 'Bath & Body Works', 'Bath & Body Works', '10_06_30cat.png', 'si', NULL),
(15, 'Manduka', 'Manduka', '02_15_15cat.png', 'si', NULL),
(16, 'Liforme', 'Liforme', '02_16_55cat.png', 'si', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE `modelo` (
  `id` int(11) NOT NULL,
  `nombre_es` varchar(150) DEFAULT NULL,
  `nombre_en` varchar(150) DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `estatus` enum('si','no') DEFAULT NULL,
  `orden` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`id`, `nombre_es`, `nombre_en`, `foto`, `estatus`, `orden`) VALUES
(1, 'SENCILLO', 'SIMPLE', NULL, 'si', NULL),
(2, 'CUERPO COMPLETO', 'WHOLE BODY', NULL, 'si', NULL),
(3, 'MEDIO CUERPO', 'HALF BODY', NULL, 'si', NULL),
(4, 'BORDADA PUNTOS', 'EMBROIDERY POINTS', NULL, 'si', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `id` bigint(40) NOT NULL,
  `id_confirmacion` varchar(250) DEFAULT NULL,
  `estatus` enum('por_pagar','pagada','eliminada','validar_pago') DEFAULT NULL,
  `id_envio` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL,
  `banco_pago` varchar(350) DEFAULT NULL,
  `tipo_pago_pago` enum('deposito','transferencia','paypal','tdc','cheque','efectivo') DEFAULT NULL,
  `codigo` varchar(35) DEFAULT NULL,
  `direccion_retiro` text DEFAULT NULL,
  `persona_retiro` varchar(150) DEFAULT NULL,
  `cedula_retiro` varchar(150) DEFAULT NULL,
  `telefono_retiro` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`id`, `id_confirmacion`, `estatus`, `id_envio`, `fecha`, `observaciones`, `id_cliente`, `fecha_pago`, `banco_pago`, `tipo_pago_pago`, `codigo`, `direccion_retiro`, `persona_retiro`, `cedula_retiro`, `telefono_retiro`) VALUES
(19, '93242432', 'validar_pago', 1, '2023-06-17', 'Monto Pago 16.200,00', 23, '2023-06-17', 'Banresevas', 'transferencia', '0UgJYuoH', 'Yabanal, #20, Puñal', 'Caroline ', '402-2984133-9', '829-427-9999'),
(18, NULL, 'por_pagar', 2, '2023-06-17', NULL, 27, NULL, NULL, NULL, 'QHZnW2JJ', 'Calle Paseo de Los Periodistas', 'Silvi', '028378282', '8092839382'),
(17, '74257733', 'validar_pago', 2, '2023-06-17', 'Monto Pago 4.700,00', 23, '2023-06-17', 'American Bank', 'transferencia', 'pexUx4k3', 'Los Mateos, #17', 'Caroline Jiménez ', '9282-977-8898', '8294270000'),
(14, '56856778847', 'pagada', 1, '2023-06-15', 'Monto Pago 299.000.050,00', 24, '2023-06-16', 'Popular', 'transferencia', '3ED6zyB8', 'Yabanal, #20, Puñal', 'Caroline', '402-555555-9', '829-427-5555'),
(16, NULL, 'por_pagar', 5, '2023-06-16', NULL, 26, NULL, NULL, NULL, 'lYS62d2j', 'santiago', 'jose', '03104242960', '809-357-6248'),
(15, '1', 'validar_pago', 5, '2023-06-16', 'Monto Pago 12.600,00', 22, '2023-06-16', 'Banresevas', 'transferencia', '6NOKcS3d', 'Baitoa, los ciruelos, carretera baitoa', 'Marielys Martinez', '675-8874468-6', '809-337-4133');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_carrito`
--

CREATE TABLE `orden_carrito` (
  `id` bigint(40) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `id_orden` bigint(40) DEFAULT NULL,
  `id_talla` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `orden_carrito`
--

INSERT INTO `orden_carrito` (`id`, `id_producto`, `cantidad`, `precio`, `fecha`, `id_orden`, `id_talla`) VALUES
(26, 15, 9, '1800.00', '2023-06-17', 19, 1),
(25, 13, 6, '1500.00', '2023-06-17', 18, 1),
(24, 23, 1, '2000.00', '2023-06-17', 17, 1),
(23, 20, 1, '1700.00', '2023-06-17', 17, 1),
(22, 14, 1, '1000.00', '2023-06-17', 17, 5),
(21, 13, 1, '1500.00', '2023-06-16', 16, 1),
(14, 3, 1, '18000000.00', '2023-06-15', 12, 1),
(15, 6, 1, '24000000.00', '2023-06-15', 13, 2),
(16, 7, 10, '23000000.00', '2023-06-15', 13, 3),
(17, 7, 13, '23000000.00', '2023-06-15', 14, 3),
(18, 9, 5, '10.00', '2023-06-15', 14, 2),
(19, 16, 2, '1800.00', '2023-06-16', 15, 1),
(20, 15, 5, '1800.00', '2023-06-16', 15, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL,
  `id_modelo` int(11) DEFAULT NULL,
  `id_tipo` int(11) DEFAULT NULL,
  `id_color` int(11) DEFAULT NULL,
  `id_talla` int(11) DEFAULT NULL,
  `stock_inicial` int(11) DEFAULT NULL,
  `stock_actual` int(11) DEFAULT NULL,
  `estatus` enum('si','no') DEFAULT NULL,
  `contador` int(11) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `nombre_es` varchar(150) DEFAULT NULL,
  `nombre_en` varchar(150) DEFAULT NULL,
  `descripcion_es` text DEFAULT NULL,
  `descripcion_en` text DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `peso` varchar(50) DEFAULT NULL,
  `dimensiones` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `id_marca`, `id_modelo`, `id_tipo`, `id_color`, `id_talla`, `stock_inicial`, `stock_actual`, `estatus`, `contador`, `orden`, `nombre_es`, `nombre_en`, `descripcion_es`, `descripcion_en`, `precio`, `peso`, `dimensiones`) VALUES
(23, 8, 11, 1, 5, 5, 5, 20, 19, 'si', 20, NULL, 'Cubo de yoga morado', 'purple yoga cube', 'Cubo de yoga morado', 'purple yoga cube', '2000.00', '5lbs', '5x5'),
(19, 8, 16, 3, 3, 1, NULL, NULL, NULL, 'si', NULL, NULL, 'Mochila de tapete Liforme', 'Liforme Mat Bag', 'Mochila de tapete Liforme', 'Liforme Mat Bag', '1000.00', '2lbs', '15X15'),
(20, 2, 16, 2, 5, 1, NULL, NULL, NULL, 'si', NULL, NULL, 'Tapete Negro Liforme', 'Black Yoga Mat Liforme', 'Tapete Negro Liforme', 'Black Yoga Mat Liforme', '1700.00', '3lbs', '21X30'),
(21, 1, 1, 1, 5, 1, NULL, NULL, NULL, 'si', NULL, NULL, 'Nike cuerda de saltar negra', 'Jump Rope Nike', 'Nike cuerda de saltar negra', 'Jump Rope Nike', '1200.00', '1lbs', '15X15'),
(22, 1, 1, 3, 5, 6, NULL, NULL, NULL, 'si', NULL, NULL, 'Cuerda de saltar roja', 'Jump Rope Nike', 'Cuerda de saltar roja', 'Jump Rope Nike', '1303.00', '1lbs', '15X15'),
(15, 7, 13, 1, 6, 4, NULL, NULL, NULL, 'si', NULL, NULL, 'Bath & Body Works Palo Santo', 'Candles', 'Vela con olor a Palo Santo', 'Palo Santo scented candle', '1800.00', '3lbs', '15X15'),
(16, 7, 13, 1, 6, 4, NULL, NULL, NULL, 'si', NULL, NULL, 'Bath & Body Works Champagne Toast', 'Candles', 'Vela con olor a Champaña', 'Champagne scented candle', '1800.00', '3lbs', '15X15'),
(17, 7, 13, 1, 6, 2, NULL, NULL, NULL, 'si', NULL, NULL, 'Bath & Body Works Lakeside Morning', 'Candles', 'Vela con olor a Lakeside', 'Lakeside scented candle', '1850.00', '3lbs', '15X15'),
(18, 2, 16, 2, 5, 8, NULL, NULL, NULL, 'si', NULL, NULL, 'Tapete Multicolor', 'Mats', 'Tapete multicolor', 'Multicolor mats', '2000.00', '2lbs', '21X30'),
(14, 2, 7, 3, 5, 5, NULL, NULL, NULL, 'si', NULL, NULL, 'Colcha de rodilla', 'Mats', 'tapete para la rodilla', 'Knee Mat', '1000.00', '1lbs', '15X15'),
(13, 2, 7, 2, 5, 5, NULL, NULL, NULL, 'si', NULL, NULL, 'Tapetes morado Blogilates', 'Mats', 'Tapete confortable', 'comfortable mat', '1500.00', '2lbs', '21X30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_imagenes`
--

CREATE TABLE `productos_imagenes` (
  `id` bigint(20) NOT NULL,
  `id_producto` bigint(20) DEFAULT NULL,
  `foto` varchar(80) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `productos_imagenes`
--

INSERT INTO `productos_imagenes` (`id`, `id_producto`, `foto`, `orden`) VALUES
(1, 3, '22_13_23prod.jpg', 3),
(18, 3, '22_13_35prod.jpg', 1),
(5, 4, '19_03_53prod.png', 18),
(6, 4, '19_04_04prod.png', 17),
(7, 4, '19_04_13prod.png', 16),
(8, 5, '20_20_20prod.png', 15),
(9, 5, '20_20_29prod.png', 14),
(10, 5, '20_20_40prod.png', 13),
(11, 5, '20_20_52prod.png', 12),
(12, 5, '20_21_22prod.png', 11),
(13, 5, '20_21_35prod.png', 10),
(14, 5, '20_21_50prod.png', 7),
(15, 5, '20_22_02prod.png', 9),
(16, 5, '20_22_12prod.png', 8),
(17, 5, '20_22_20prod.png', 6),
(19, 3, '22_13_42prod.jpg', 5),
(20, 3, '22_13_49prod.jpg', 4),
(21, 3, '22_13_58prod.jpg', 2),
(22, 6, '22_16_21prod.jpg', NULL),
(23, 7, '22_18_02prod.jpg', NULL),
(24, 8, '22_19_47prod.jpg', NULL),
(25, 9, '22_20_45prod.jpg', NULL),
(26, 10, '22_21_42prod.jpg', NULL),
(28, 11, 'tapete.jpg', 19),
(29, 12, '23_48_19prod.jpg', NULL),
(30, 13, '02_33_10prod.jpg', NULL),
(31, 14, '02_36_54prod.jpg', NULL),
(32, 15, '02_39_00prod.jpg', NULL),
(33, 16, '02_40_46prod.jpg', NULL),
(34, 17, '02_42_34prod.jpg', NULL),
(35, 18, '02_50_34prod.jpeg', NULL),
(36, 19, '02_57_18prod.jpeg', NULL),
(37, 20, '02_59_27prod.jpg', NULL),
(38, 21, '03_01_52prod.jpg', NULL),
(39, 22, '03_04_42prod.jpg', NULL),
(40, 23, '03_07_47prod.jpeg', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_tallas`
--

CREATE TABLE `productos_tallas` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_talla` int(11) DEFAULT NULL,
  `stock_inicial` int(11) DEFAULT NULL,
  `stock_actual` int(11) DEFAULT NULL,
  `estatus` enum('si','no') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `productos_tallas`
--

INSERT INTO `productos_tallas` (`id`, `id_producto`, `id_talla`, `stock_inicial`, `stock_actual`, `estatus`) VALUES
(3, 3, 2, 10, 10, 'si'),
(2, 3, 1, 10, 12, 'si'),
(4, 3, 3, 2, 0, 'si'),
(5, 6, 2, 2, 3, 'si'),
(6, 7, 3, 5, 4, 'si'),
(7, 8, 1, 12, 15, 'si'),
(8, 9, 2, 2, 1, 'si'),
(9, 10, 3, 2, 1, 'si'),
(10, 15, 1, 1, 100, 'si'),
(11, 23, 1, 1, 100, 'si'),
(12, 19, 1, 1, 100, 'si'),
(13, 20, 1, 1, 93, 'si'),
(14, 21, 1, 1, 100, 'si'),
(15, 22, 1, 1, 86, 'si'),
(16, 16, 1, 1, 98, 'si'),
(17, 17, 1, 1, 100, 'si'),
(18, 18, 1, 1, 100, 'si'),
(19, 14, 1, 1, 100, 'si'),
(20, 13, 1, 1, 99, 'si'),
(25, 14, 4, 1, 47, 'si'),
(26, 14, 5, 3, 25, 'si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `nombre_es` varchar(150) DEFAULT NULL,
  `nombre_en` varchar(150) DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `estatus` enum('si','no') DEFAULT NULL,
  `orden` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `nombre_es`, `nombre_en`, `foto`, `estatus`, `orden`) VALUES
(1, 'Envío gratis a todo el mundo', 'Free Worldwide Shipping', '19_48_19ser.png', 'si', 2),
(2, 'Garantía de devolución del dinero', 'Money Back Guarantee', '19_48_41ser.png', 'si', 3),
(3, 'Atención al cliente 24/7', '24/7 Customer Support', '19_48_57ser.png', 'si', 4),
(4, 'Pago seguro en línea', 'Secure Online Payment', '19_49_14ser.png', 'si', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tallas`
--

CREATE TABLE `tallas` (
  `id` int(11) NOT NULL,
  `nombre_es` varchar(150) DEFAULT NULL,
  `nombre_en` varchar(150) DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `estatus` enum('si','no') DEFAULT NULL,
  `orden` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tallas`
--

INSERT INTO `tallas` (`id`, `nombre_es`, `nombre_en`, `foto`, `estatus`, `orden`) VALUES
(1, 'Mediano', 'Medium', NULL, 'si', NULL),
(5, 'Pequeño', 'Small', NULL, 'si', NULL),
(4, 'Grande', 'Large', NULL, 'si', NULL),
(11, 'Tamaño Unico', 'One Size', NULL, 'si', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `nombre_es` varchar(150) DEFAULT NULL,
  `nombre_en` varchar(150) DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `estatus` enum('si','no') DEFAULT NULL,
  `orden` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id`, `nombre_es`, `nombre_en`, `foto`, `estatus`, `orden`) VALUES
(1, 'ALGODON 100%', 'COTTON', NULL, 'si', NULL),
(3, 'ATLETICA', 'ATLETICA', NULL, 'si', NULL),
(6, 'VIDRIO', 'GLASS', NULL, 'si', NULL),
(5, 'GOMA', 'rubber', NULL, 'si', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL,
  `tipo_es` varchar(150) DEFAULT NULL,
  `tipo_en` varchar(150) DEFAULT NULL,
  `estatus` enum('si','no') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `tipo_es`, `tipo_en`, `estatus`) VALUES
(1, 'Usuario de Instagram', 'Instagram User', 'si'),
(5, 'Usuario de Facebook', 'Facebook User', 'si'),
(6, 'usuario de  Tiktok', 'Tiktok user', 'si'),
(7, 'Referido por Amigo/a', 'Friends', 'si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `social_id` varchar(100) NOT NULL,
  `picture` varchar(250) NOT NULL,
  `created` datetime NOT NULL,
  `id_tipo_usuario` int(11) DEFAULT NULL,
  `telefono1` varchar(150) DEFAULT NULL,
  `telefono2` varchar(150) DEFAULT NULL,
  `estatus` enum('si','no') DEFAULT NULL,
  `direccion` varchar(450) DEFAULT NULL,
  `razon_social` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `social_id`, `picture`, `created`, `id_tipo_usuario`, `telefono1`, `telefono2`, `estatus`, `direccion`, `razon_social`) VALUES
(21, 'Juan perez', 'webforming@gmail.com', '257ed3d51b08f8088ce972378e53f6ff', '66778888', '', '2023-06-15 10:52:19', 1, '3473648677', '66777777', 'si', '588 jacques st perth amboy', 'Ghjjjj'),
(22, 'Caroline Jimenez', 'caroline@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '900-8777775-4', '', '2023-06-15 14:35:30', 1, '8096675543', '8976753422', 'si', 'baitoa, los ciruelos', 'ggggggggggggggggggggg'),
(23, 'Caroline Jiménez', 'carolinejimenez882@gmail.com', '14b1c8a85a8103431594d3786ede11eb', '402-2984133-9', 'logo14_45_14.jpg', '2023-06-15 14:41:08', 1, '829-427-4899', '829-427-4899', 'si', 'Los Mateos, #17, Puñal', 'Eshleepy'),
(24, 'Melny Rivera', 'melnyrivera@gmail.com', '3bdb184e3fa3b0d0fc4c96062d7e82f4', '402-555555-9', '', '2023-06-15 14:54:10', 1, '829-427-4899', '829-427-5555', 'si', 'Ave. Francisco J. de Goya', 'Eshleepy'),
(25, 'Carlota Lajara', 'carlota01@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '890-4567845-1', '', '2023-06-16 04:23:15', 1, '809-456-2456', '809-337-4133', 'si', 'Pekin', 'No se'),
(26, 'jose', 'webforming2@gmail.com', 'f4f46d0225d1a95a3ac831c4f18b8669', '031-0424350-4', '', '2023-06-16 18:54:01', 1, '809-357-6148', '809-357-6249', 'si', 'santiago', 'dominicana'),
(27, 'Gatasensual12', 'silvana032005@gmail.com', '4915f26fb167e5ab0168cc3703c323f7', '257998766898', '', '2023-06-17 03:29:38', 7, '8092830309', '8092830309', 'si', 'Calle Paseo de los Periodistas', 'Dominicana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `_carrito`
--

CREATE TABLE `_carrito` (
  `id` bigint(40) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `aux` bigint(40) DEFAULT NULL,
  `id_talla` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `_carrito`
--

INSERT INTO `_carrito` (`id`, `id_producto`, `cantidad`, `precio`, `fecha`, `aux`, `id_talla`) VALUES
(2, 23, 1, '2000.00', '2023-06-16', 24390263, 1),
(4, 14, 3, '1000.00', '2023-06-17', 298465614, 1),
(5, 20, 1, '1700.00', '2023-06-17', 298465614, 1),
(13, 13, 2, '1500.00', '2023-06-18', 513113553, 1),
(11, 15, 5, '1800.00', '2023-06-17', 615851736, 1),
(9, 13, 1, '1500.00', '2023-06-17', 332878466, 1),
(14, 14, 3, '1000.00', '2023-06-18', 847123179, 4),
(15, 13, 1, '1500.00', '2023-06-18', 355453090, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `_informativos`
--

CREATE TABLE `_informativos` (
  `id` int(11) NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono1` varchar(100) DEFAULT NULL,
  `telefono2` varchar(100) DEFAULT NULL,
  `correo1` varchar(100) DEFAULT NULL,
  `correo2` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `youtube` varchar(266) DEFAULT NULL,
  `linkedin` varchar(150) DEFAULT NULL,
  `lat_map` varchar(60) DEFAULT NULL,
  `lon_map` text DEFAULT NULL,
  `logo` varchar(250) DEFAULT NULL,
  `horario` varchar(250) DEFAULT NULL,
  `descripcion_meta_generico` varchar(450) NOT NULL,
  `logo_meta_generico` varchar(340) NOT NULL,
  `codigo` text NOT NULL,
  `lat2` varchar(29) DEFAULT NULL,
  `lon2` varchar(29) DEFAULT NULL,
  `multilenguaje` enum('no','si') NOT NULL,
  `palabras_claves` text DEFAULT NULL,
  `staff` enum('si','no') DEFAULT NULL,
  `banner1` varchar(250) DEFAULT NULL,
  `banner2` varchar(250) DEFAULT NULL,
  `banner3` varchar(250) DEFAULT NULL,
  `banner4` varchar(250) DEFAULT NULL,
  `banner5` varchar(250) DEFAULT NULL,
  `banner6` varchar(200) DEFAULT NULL,
  `nombre_pagina` varchar(250) DEFAULT NULL,
  `color_principal` varchar(10) DEFAULT NULL,
  `bandera_es` varchar(45) DEFAULT NULL,
  `bandera_en` varchar(45) DEFAULT NULL,
  `comming_soon` enum('no','si') DEFAULT NULL,
  `moneda` varchar(20) DEFAULT NULL,
  `fotoB` varchar(20) DEFAULT NULL,
  `color_secundario` varchar(50) DEFAULT NULL,
  `fotoC` varchar(30) DEFAULT NULL,
  `fotoP` varchar(30) DEFAULT NULL,
  `fotoN` varchar(50) DEFAULT NULL,
  `fondo_producto` varchar(100) DEFAULT NULL,
  `fondo_footer` varchar(100) DEFAULT NULL,
  `nosotros` text DEFAULT NULL,
  `mision` text DEFAULT NULL,
  `vision` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `_informativos`
--

INSERT INTO `_informativos` (`id`, `direccion`, `telefono1`, `telefono2`, `correo1`, `correo2`, `twitter`, `facebook`, `instagram`, `youtube`, `linkedin`, `lat_map`, `lon_map`, `logo`, `horario`, `descripcion_meta_generico`, `logo_meta_generico`, `codigo`, `lat2`, `lon2`, `multilenguaje`, `palabras_claves`, `staff`, `banner1`, `banner2`, `banner3`, `banner4`, `banner5`, `banner6`, `nombre_pagina`, `color_principal`, `bandera_es`, `bandera_en`, `comming_soon`, `moneda`, `fotoB`, `color_secundario`, `fotoC`, `fotoP`, `fotoN`, `fondo_producto`, `fondo_footer`, `nosotros`, `mision`, `vision`) VALUES
(1, 'Los Mateos, #17, Puñal. Santiago, República Dominicana', '+1 (829)-427-5555', '+1 (829) 376-6666', 'eshleepy@gmail.com', 'eshleepy122@gmail.com', '-', 'https://www.facebook.com/', 'https://www.instagram.com/', '', '', '10.694067', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3732.096442038015!2d-102.35364368464285!3d20.706307986174032!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjDCsDQyJzIyLjciTiAxMDLCsDIxJzA1LjIiVw!5e0!3m2!1ses!2sve!4v1503532337820\" width=\"200\" height=\"250\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'logo23_05_19.png', 'de Lunes a Viernes', 'descripcion  aqui', '1logo_meta_generico.jpg', '', '20.706308', '-102.351455', 'no', 'palabras claves aqui', 'no', '1banner1.jpg', '1banner2.jpg', '1banner3.jpg', '1banner4.jpg', '1banner5.jpg', '1banner6.jpg', 'Eshleepy', '', 'bandera_es.png', 'bandera_en.png', 'no', '$', 'fotoB01:50:43.jpg', '', 'fotoC12:15:39.jpg', 'fotoP13:49:12.jpg', 'fotoN09:27:14.jpg', NULL, NULL, 'Somos un equipo de estudiantes que han creado una tienda virtual que desesa onvertirse en la aplicación líder en Latinoamérica en ayudar a las personas a llevar una vida más tranquila y promover la importancia de la salud mental en todo el mundo con sus productos.\r\n\r\nLa creatividad es simplemente conectar cosas. Cuando le preguntas a las personas creativas cómo hicieron algo, se sienten un poco culpables porque en realidad no lo hicieron, solo vieron algo. Les pareció obvio después de un rato.\r\n\r\n- Steve Job’s\r\n', 'La misión es mejorar la vida cotidiana de los usuarios de nuestra aplicación, ofreciendo productos que promuevan la relajación, la seguridad y la comodidad. Se busca ayudar a los clientes a crear buenos recuerdos y conectarse consigo mismos, mientras como equipo se trabaja con pasión y conciencia.', 'La visión es convertirnos en la principal aplicación en Latinoamérica en ayudar a todo tipo de personas a llevar una vida más tranquila, fomentando a su vez la importancia de la salud mental. Que nuestros productos personalizados sigan expandiéndose internacionalmente y ser conocidos por brindar un servicio excepcional al cliente que comprende sus necesidades.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `_suscribir`
--

CREATE TABLE `_suscribir` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `estatus` enum('si','no') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `_suscribir`
--

INSERT INTO `_suscribir` (`id`, `nombre`, `email`, `estatus`) VALUES
(1, 'fsdfsd', 'fsdfds@sadfsa.com', 'si'),
(2, 'Freddy Ramos ', 'Freddyramos41@gmail.com', 'si'),
(3, 'aime', 'aime@aime.com', 'si'),
(4, 'Frank', 'intecweld@gmail.com', 'si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `_textos`
--

CREATE TABLE `_textos` (
  `id` int(11) NOT NULL,
  `texto_ES` text DEFAULT NULL,
  `texto_EN` text DEFAULT NULL,
  `texto_PO` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `_textos`
--

INSERT INTO `_textos` (`id`, `texto_ES`, `texto_EN`, `texto_PO`) VALUES
(1, 'Categorías', 'Categories', NULL),
(2, 'Idioma', 'Language', NULL),
(3, 'INICIO', 'HOME', NULL),
(4, 'Ver carrito', 'VIEW CART', NULL),
(5, 'Ver ', 'See', ''),
(6, 'Marcas Populares', 'Popular brands', NULL),
(7, 'Póngase en contacto con nosotros', 'Get In Touch With Us', NULL),
(8, 'Teléfono', 'Phone', NULL),
(9, 'Dirección', 'Address', NULL),
(10, 'Nuestra aplicación móvil', 'Our Mobile App', NULL),
(11, 'Talla', 'Size', ''),
(12, 'COLECCIONES', 'COLLECTIONS', NULL),
(13, 'RANGO DE PRECIOS', 'PRICE RANGE', NULL),
(14, 'Filtrar', 'Filter', NULL),
(15, 'Filtrar por marca', 'Filter by Brand', NULL),
(16, 'Filtrar por tamaño', 'Filter by Size', NULL),
(17, 'Añadir al carrito', 'Add to Cart', NULL),
(18, 'Seleccionar', 'Choose', NULL),
(19, 'Cantidad', 'Quantity', NULL),
(20, 'Colección', 'Collection', ''),
(21, 'Marca', 'Brand', NULL),
(22, 'Material', 'Material', NULL),
(23, 'Modelo', 'Model\r\n', NULL),
(24, 'Compartir', 'Share', NULL),
(25, 'También te puede interesar\r\n', 'You May Also Like', NULL),
(26, 'Ver', 'See', ''),
(27, 'Se ha actualizado el carrito satisfactoriamente.', 'The cart has been updated successfully.', NULL),
(28, 'Nombre del producto', 'Product Name', NULL),
(29, 'Cantidad\r\n', 'Quantity', NULL),
(30, 'De vuelta a las compras', 'Back to Shopping', NULL),
(31, 'Actualizar Carrito', 'Update Cart', NULL),
(32, 'Contacto', 'Contact', NULL),
(33, 'CUENTA', 'ACCOUNT', NULL),
(34, 'Tienda', 'Shop', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `_usuarios`
--

CREATE TABLE `_usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(150) NOT NULL DEFAULT '',
  `login` varchar(150) NOT NULL DEFAULT '',
  `clave` varchar(150) NOT NULL DEFAULT '',
  `estatus` enum('activo','desactivo') NOT NULL,
  `tipo_usuario` enum('administrador','operador','cliente') NOT NULL,
  `email` varchar(80) DEFAULT NULL,
  `razon_social_empresa` varchar(500) DEFAULT NULL,
  `rif_cedula` varchar(200) DEFAULT NULL,
  `company` varchar(150) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `ciudad` varchar(150) DEFAULT NULL,
  `estado` varchar(150) DEFAULT NULL,
  `codigo_postal` varchar(50) DEFAULT NULL,
  `phone` varchar(60) DEFAULT NULL,
  `apellidos` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `_usuarios`
--

INSERT INTO `_usuarios` (`id`, `nombres`, `login`, `clave`, `estatus`, `tipo_usuario`, `email`, `razon_social_empresa`, `rif_cedula`, `company`, `direccion`, `ciudad`, `estado`, `codigo_postal`, `phone`, `apellidos`) VALUES
(1, 'Administrador', 'admin', '123', 'activo', 'administrador', 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Caroline', 'caroline', '123456', 'activo', 'administrador', 'caroline', 'ijiiii', '909-8886654-9', NULL, 'jh', 'santigo', 'm;,;', '51000', '809-677-7789', 'jimenez'),
(3, 'Melny', 'melny', '123456', 'activo', 'administrador', 'melny', 'kjkkkkkk', '675-7778958-4', 'jjjjjjjjjjjj', 'las charcas', 'santiago', 'jkkkkk', '51000', '809-776-4644', 'Rivera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `_wishlist`
--

CREATE TABLE `_wishlist` (
  `id` bigint(40) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `id_cliente` bigint(40) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `datosbancarios`
--
ALTER TABLE `datosbancarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `envio`
--
ALTER TABLE `envio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orden_carrito`
--
ALTER TABLE `orden_carrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos_imagenes`
--
ALTER TABLE `productos_imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos_tallas`
--
ALTER TABLE `productos_tallas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tallas`
--
ALTER TABLE `tallas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `email` (`email`),
  ADD KEY `login` (`password`);

--
-- Indices de la tabla `_carrito`
--
ALTER TABLE `_carrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `_informativos`
--
ALTER TABLE `_informativos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `_suscribir`
--
ALTER TABLE `_suscribir`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `_textos`
--
ALTER TABLE `_textos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `_usuarios`
--
ALTER TABLE `_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `_wishlist`
--
ALTER TABLE `_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `datosbancarios`
--
ALTER TABLE `datosbancarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `envio`
--
ALTER TABLE `envio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `modelo`
--
ALTER TABLE `modelo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `id` bigint(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `orden_carrito`
--
ALTER TABLE `orden_carrito`
  MODIFY `id` bigint(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `productos_imagenes`
--
ALTER TABLE `productos_imagenes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `productos_tallas`
--
ALTER TABLE `productos_tallas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tallas`
--
ALTER TABLE `tallas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `_carrito`
--
ALTER TABLE `_carrito`
  MODIFY `id` bigint(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `_informativos`
--
ALTER TABLE `_informativos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `_suscribir`
--
ALTER TABLE `_suscribir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `_textos`
--
ALTER TABLE `_textos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `_usuarios`
--
ALTER TABLE `_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `_wishlist`
--
ALTER TABLE `_wishlist`
  MODIFY `id` bigint(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
