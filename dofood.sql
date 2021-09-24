-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-09-2021 a las 20:07:29
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dofood`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(50) NOT NULL,
  `foto_categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`, `foto_categoria`) VALUES
(1, 'Comida Italiana', 'italiana.jpg'),
(2, 'Comida China', 'china.jpg'),
(3, 'Comida Española', 'espanola.jpg'),
(4, 'Parrilla', 'parrilla.jpg'),
(5, 'Hamburguesas', 'hamburguesa.jpg'),
(6, 'Pizzas', 'pizza.jpeg'),
(7, 'Kebab', 'kebab.png'),
(8, 'Pescado', 'pescado.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comida`
--

CREATE TABLE `comida` (
  `id_comida` int(11) NOT NULL,
  `nombre_comida` varchar(50) NOT NULL,
  `tipo_comida` varchar(30) NOT NULL,
  `precio_comida` float(5,2) NOT NULL,
  `id_comida_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comida`
--

INSERT INTO `comida` (`id_comida`, `nombre_comida`, `tipo_comida`, `precio_comida`, `id_comida_categoria`) VALUES
(1, 'Ensalada de gambas', 'Ensaladas', 4.00, 2),
(2, 'Ensalada de algas', 'Ensaladas', 4.30, 2),
(3, 'Ensalada china', 'Ensaladas', 3.00, 2),
(4, 'Empanadilla china', 'Ensaladas', 2.70, 2),
(5, 'Rollito de primavera', 'Ensaladas', 3.30, 2),
(6, 'Sopa de aleta de tiburon', 'Sopas', 3.10, 2),
(7, 'Sopa de pollo con champiñon', 'Sopas', 3.40, 2),
(8, 'Sopa agripicante', 'Sopas', 3.10, 2),
(9, 'Sopa de pollo', 'Sopas', 3.00, 2),
(10, 'Sopa de mariscos', 'Sopas', 3.10, 2),
(12, 'Coca Cola', 'Bebidas', 1.60, 1),
(13, 'Coca Cola', 'Bebidas', 1.60, 2),
(14, 'Coca Cola', 'Bebidas', 1.60, 3),
(15, 'Coca Cola', 'Bebidas', 1.60, 4),
(16, 'Coca Cola', 'Bebidas', 1.60, 5),
(17, 'Coca Cola', 'Bebidas', 1.60, 6),
(18, 'Coca Cola', 'Bebidas', 1.60, 7),
(19, 'Coca Cola', 'Bebidas', 1.60, 8),
(20, 'Pepsi', 'Bebidas', 1.60, 1),
(21, 'Pepsi', 'Bebidas', 1.60, 2),
(22, 'Pepsi', 'Bebidas', 1.60, 3),
(23, 'Pepsi', 'Bebidas', 1.60, 4),
(24, 'Pepsi', 'Bebidas', 1.60, 5),
(25, 'Pepsi', 'Bebidas', 1.60, 6),
(26, 'Pepsi', 'Bebidas', 1.60, 7),
(27, 'Pepsi', 'Bebidas', 1.60, 8),
(28, 'Agua', 'Bebidas', 1.00, 1),
(29, 'Agua', 'Bebidas', 1.00, 2),
(30, 'Agua', 'Bebidas', 1.00, 3),
(31, 'Agua', 'Bebidas', 1.00, 4),
(32, 'Agua', 'Bebidas', 1.00, 5),
(33, 'Agua', 'Bebidas', 1.00, 6),
(34, 'Agua', 'Bebidas', 1.00, 7),
(35, 'Agua', 'Bebidas', 1.00, 8),
(36, 'Cerveza', 'Bebidas', 1.60, 1),
(37, 'Cerveza', 'Bebidas', 1.60, 2),
(38, 'Cerveza', 'Bebidas', 1.60, 3),
(39, 'Cerveza', 'Bebidas', 1.60, 4),
(40, 'Cerveza', 'Bebidas', 1.60, 5),
(41, 'Cerveza', 'Bebidas', 1.60, 6),
(42, 'Cerveza', 'Bebidas', 1.60, 7),
(43, 'Cerveza', 'Bebidas', 1.60, 8),
(44, 'Fanta naranja', 'Bebidas', 1.60, 1),
(45, 'Fanta naranja', 'Bebidas', 1.60, 2),
(46, 'Fanta naranja', 'Bebidas', 1.60, 3),
(47, 'Fanta naranja', 'Bebidas', 1.60, 4),
(48, 'Fanta naranja', 'Bebidas', 1.60, 5),
(49, 'Fanta naranja', 'Bebidas', 1.60, 6),
(50, 'Fanta naranja', 'Bebidas', 1.60, 7),
(51, 'Fanta naranja', 'Bebidas', 1.60, 8),
(52, 'Arroz con gambas', 'Arroz', 3.60, 2),
(53, 'Arroz tres delicias', 'Arroz', 3.50, 2),
(54, 'Arroz con ternera y curry', 'Arroz', 4.20, 2),
(55, 'Arroz frito con huevos', 'Arroz', 3.80, 2),
(56, 'Arroz con pollo y curry', 'Arroz', 4.30, 2),
(57, 'Pan chino', 'Arroz', 2.20, 2),
(58, 'Filetes de pollo con patatas', 'Pollo', 6.30, 2),
(59, 'Pollo estilo Hong Kong', 'Pollo', 6.50, 2),
(60, 'Pollo con bambu y setas chinas', 'Pollo', 6.00, 2),
(61, 'Pollo con salsa picante', 'Pollo', 6.30, 2),
(62, 'Pollo agridulce', 'Pollo', 6.40, 2),
(63, 'Pollo con limon', 'Pollo', 6.30, 2),
(64, 'Pollo con almendras', 'Pollo', 6.20, 2),
(65, 'Ternera con verdura', 'Ternera', 5.30, 2),
(66, 'Ternera con patatas fritas', 'Ternera', 6.50, 2),
(67, 'Ternera con salsa curry', 'Ternera', 5.80, 2),
(68, 'Ternera con champiñones', 'Ternera', 6.10, 2),
(69, 'Ternera con pimientos verdes', 'Ternera', 6.20, 2),
(70, 'Ternera con cebolla', 'Ternera', 5.10, 2),
(71, 'Ternera con salsa de ostras', 'Ternera', 5.20, 2),
(72, 'Ensalada cesar', 'Entrantes', 2.20, 1),
(73, 'Berenjenas parmesanas', 'Entrantes', 2.50, 1),
(74, 'Piadina', 'Entrantes', 2.10, 1),
(75, 'Ensalada caprese', 'Entrantes', 2.20, 1),
(76, 'Ensalada italiana', 'Entrantes', 2.20, 1),
(77, 'Pulpo a la gallega', 'Entrantes', 3.20, 1),
(78, 'Spaghetti carbonara', 'Pasta', 8.20, 1),
(79, 'Spaghetti boloñesa', 'Pasta', 10.20, 1),
(80, 'Maccheroni carbonara', 'Pasta', 9.20, 1),
(81, 'Maccheroni napolitana', 'Pasta', 10.00, 1),
(82, 'Spaghetti diavola', 'Pasta', 10.00, 1),
(83, 'Spaghetti napolitana', 'Pasta', 8.50, 1),
(84, 'Lasaña de carne', 'Lasaña', 10.50, 1),
(85, 'Lasaña de salmon', 'Lasaña', 9.50, 1),
(86, 'Lasaña de carne con roquefort', 'Lasaña', 10.00, 1),
(87, 'Lasaña de verduras', 'Lasaña', 9.50, 1),
(88, 'Lasaña de langostinos', 'Lasaña', 10.50, 1),
(89, 'Lasaña de frutos del mar', 'Lasaña', 8.70, 1),
(90, 'Gnoqui con tomate, matequilla y queso', 'Gnoqui', 11.70, 1),
(91, 'Gnoqui 4 quesos', 'Gnoqui', 12.70, 1),
(92, 'Gnoqui con nata', 'Gnoqui', 11.40, 1),
(93, 'Gnoqui con espinacas', 'Gnoqui', 10.40, 1),
(94, 'Gnoqui con langostinos y champiñones', 'Gnoqui', 12.90, 1),
(95, 'Brownie', 'Postres', 5.90, 1),
(96, 'Tarta de queso', 'Postres', 5.40, 1),
(97, 'Bola de helado', 'Postres', 4.30, 1),
(98, 'Arroz con leche', 'Postres', 4.90, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurantes`
--

CREATE TABLE `restaurantes` (
  `id_restaurante` int(11) NOT NULL,
  `nombre_restaurante` varchar(50) NOT NULL,
  `modo_entrega` varchar(25) NOT NULL,
  `precio_entrega` float NOT NULL,
  `tiempo_entrega` int(11) NOT NULL,
  `estado_res` varchar(25) NOT NULL,
  `minimo` int(11) NOT NULL,
  `localizacion_restaurante` varchar(25) NOT NULL,
  `calle` varchar(50) NOT NULL,
  `foto_restaurante` text NOT NULL,
  `id_categoria_restaurante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `restaurantes`
--

INSERT INTO `restaurantes` (`id_restaurante`, `nombre_restaurante`, `modo_entrega`, `precio_entrega`, `tiempo_entrega`, `estado_res`, `minimo`, `localizacion_restaurante`, `calle`, `foto_restaurante`, `id_categoria_restaurante`) VALUES
(1, 'KFC', 'Domicilio', 3, 30, 'Abierto', 10, 'Granada', 'Nevada Shopping', 'hamburguesas/granada/kfc-granada.jpeg', 5),
(2, 'Desi', 'Domicilio', 2.5, 20, 'Abierto', 15, 'Granada', 'C. Palencia', 'pizzas/granada/pizzeria-desi.jpg', 6),
(3, 'Telepizza', 'Domicilio', 4, 25, 'Abierto', 20, 'Granada', 'C.Acera del Darro', 'pizzas/granada/telepizza.jpg', 6),
(4, 'Tagliatela', 'Recogida', 0, 10, 'Abierto', 12, 'Granada', 'Centro Comercial El Serrallo', 'italiana/granada/tagliatela.jpg', 1),
(5, 'Pizza Hunt', 'Domicilio', 1.5, 35, 'Abierto', 16, 'Granada', 'Camino de Ronda', 'pizzas/granada/pizza-hunt.jpeg', 6),
(6, 'Muerde La Pasta', 'Recogida', 0, 10, 'Abierto', 10, 'Granada', 'Nevada Shopping', 'italiana/granada/muerde-la-pasta.jpg', 1),
(7, 'La Mafia', 'Recogida', 0, 10, 'Abierto', 10, 'Granada', 'Calle San Matías', 'italiana/granada/la-mafia.jpg', 1),
(8, '7 pecados', 'Domicilio', 3, 40, 'Abierto', 23, 'Granada', 'C. Melchor Almagro', 'pizzas/granada/7-pecados.jpeg', 6),
(9, 'Buen Gusto', 'Domicilio', 1.4, 25, 'Abierto', 8, 'Granada', 'Calle San Marcos', 'china/granada/buen-gusto.jpg', 2),
(10, 'Casa Wu', 'Domicilio', 1.6, 15, 'Abierto', 5, 'Granada', 'Calle San Juan de Dios', 'china/granada/casa-wu.jpg', 2),
(11, 'Dynasty', 'Recogida', 0, 10, 'Cerrado', 6, 'Granada', 'Camino de Ronda', 'china/granada/dynasty.jpg', 2),
(12, 'Estrella Oriental', 'Domicilio', 2.3, 24, 'Abierto', 11, 'Granada', 'Calle Álvaro de Bazán', 'china/granada/estrella-oriental.jpg', 2),
(13, 'Gran Muralla', 'Recogida', 0, 30, 'Abierto', 7, 'Granada', 'Calle Dr.Severo Ochoa', 'china/granada/gran-muralla.jpg', 2),
(14, 'Jin Jin', 'Domicilio', 3, 24, 'Abierto', 12, 'Granada', 'Avenida América', 'china/granada/jin-jin.jpg', 2),
(15, 'Wen Zhou', 'Domicilio', 2.3, 27, 'Abierto', 6, 'Granada', 'Plaza Sol y Luna', 'china/granada/wenzhou.jpg', 2),
(16, 'Alhambra Doner Kebab', 'Domicilio', 1, 25, 'Abierto', 5, 'Granada', 'Av.de Cádiz', 'kebab/granada/alhambra-doner-kebab.jpg', 7),
(17, 'Chana Doner Kebab', 'Domicilio', 2, 20, 'Abierto', 0, 'Granada', 'Calle Pintor Manuel Maldonado', 'kebab/granada/chana-doner-kebab.jpg', 7),
(18, 'Chicken Kebab', 'Domicilio', 1.5, 10, 'Abierto', 2, 'Granada', 'Calle del Guerra', 'kebab/granada/chicken-kebab.jpg', 7),
(19, 'Kebab García Lorca', 'Domicilio', 3, 15, 'Abierto', 5, 'Granada', 'Av. Compositor Luis de Narváez', 'kebab/granada/kevab-garcia-lorca.jpg', 7),
(20, 'Shawarma Poco Loco', 'Domicilio', 2.4, 12, 'Abierto', 6, 'Granada', 'C. Pedro Antonio de Alarcón', 'kebab/granada/shawarma-poco-loco.jpg', 7),
(21, 'Capitan Amargo', 'Domicilio', 2, 30, 'Abierto', 7, 'Granada', 'Calle Molinos', 'española/granada/capitan-amargo.jpg', 3),
(22, 'El Mercader', 'Recoger', 0, 14, 'Abierto', 10, 'Granada', 'Calle Imprenta', 'española/granada/el-mercader.jpg', 3),
(23, 'La Cuchara de Carmela', 'Domicilio', 3, 30, 'Abierto', 8, 'Granada', 'Paseo de los Basilios', 'española/granada/la-cuchara-de-carmela.jpg', 3),
(24, 'La Pililla', 'Domicilio', 1.5, 12, 'Abierto', 12, 'Granada', 'Calle Musico Vicente Zarzo', 'española/granada/la-pililla.jpg', 3),
(25, 'Palacio Andaluz', 'Recoger', 0, 10, 'Abierto', 8, 'Granada', 'Calle San Jerónimo', 'española/granada/palacio-andaluz.jpg', 3),
(26, 'Restaurante APO', 'Domicilio', 2.3, 16, 'Abierto', 9, 'Granada', 'Pl. de San Lázaro', 'parrilla/granada/apo.jpg', 4),
(27, 'Casa Gabriel', 'Domicilio', 1.8, 24, 'Abierto', 13, 'Granada', 'C. Pagés', 'parrilla/granada/casa-gabriel.jpg', 4),
(28, 'La Morocha', 'Domicilio', 3, 18, 'Abierto', 10, 'Granada', 'C. Postigo de Zárate', 'parrilla/granada/la-morocha.jpg', 4),
(29, 'La Parrillita', 'Recogida', 0, 10, 'Abierto', 9, 'Granada', 'C. Solarillo de Gracia', 'parrilla/granada/la-parrillita.jpg', 4),
(30, 'La Riviera', 'Domicilio', 3.4, 22, 'Abierto', 14, 'Granada', 'C. Cetti Meriem', 'parrilla/granada/la-riviera.jpg', 4),
(31, 'Los Marianos', 'Domicilio', 2.6, 36, 'Abierto', 14, 'Granada', 'C. Concepción', 'pescado/granada/los-marianos.jpg', 8),
(32, 'Pescadería Serie de Oro', 'Recogida', 0, 10, 'Abierto', 13, 'Granada', 'Pl. de San Agustín', 'pescado/granada/pescaderia-serie-oro.jpg', 8),
(33, 'Burguer King', 'Domicilio', 2.3, 35, 'Abierto', 8, 'Granada', 'Av.Juan Pablo II', 'hamburguesas/granada/burger-king.jpg', 5),
(34, 'McDonalds', 'Domicilio', 2.5, 35, 'Abierto', 5, 'Granada', 'Calle Luis Buñuel', 'hamburguesas/granada/mcdonalds.jpg', 5),
(35, 'Hamburguesería MOAI', 'Domicilio', 1.4, 20, 'Abierto', 6, 'Granada', 'Calle Manuel de Falla', 'hamburguesas/granada/moai.jpg', 5),
(36, 'Mostaza Green Burguer', 'Domicilio', 3, 40, 'Abierto', 9, 'Granada', 'Calle Jaúdenes', 'hamburguesas/granada/mostaza-green-burguer.jpg', 5),
(37, 'Nickel Burguer', 'Domicilio', 1.8, 30, 'Abierto', 7, 'Granada', 'Calle Carril del Picón', 'hamburguesas/granada/nickel-burguer.jpg', 5),
(38, 'Hamburguesería Pibes', 'Domicilio', 2.6, 24, 'Abierto', 6, 'Granada', 'Calle Torre de la Vela', 'hamburguesas/granada/pibes.jpg', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(25) NOT NULL,
  `fecha-registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `pass`, `fecha-registro`) VALUES
(84, 'dan@gmail.com', '123', '2021-07-19 09:58:13'),
(85, 'pepe@gmail.com', '12', '2021-07-19 11:22:20');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `comida`
--
ALTER TABLE `comida`
  ADD PRIMARY KEY (`id_comida`),
  ADD KEY `id_comida_categoria` (`id_comida_categoria`);

--
-- Indices de la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  ADD PRIMARY KEY (`id_restaurante`),
  ADD KEY `id_categoria_restaurante` (`id_categoria_restaurante`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `comida`
--
ALTER TABLE `comida`
  MODIFY `id_comida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  MODIFY `id_restaurante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comida`
--
ALTER TABLE `comida`
  ADD CONSTRAINT `comida_ibfk_1` FOREIGN KEY (`id_comida_categoria`) REFERENCES `categorias` (`id_categoria`);

--
-- Filtros para la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  ADD CONSTRAINT `restaurantes_ibfk_1` FOREIGN KEY (`id_categoria_restaurante`) REFERENCES `categorias` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
