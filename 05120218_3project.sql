-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 31 2019 г., 21:25
-- Версия сервера: 10.1.38-MariaDB
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `05120218_3project`
--
CREATE DATABASE IF NOT EXISTS `05120218_3project` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `05120218_3project`;

-- --------------------------------------------------------

--
-- Структура таблицы `catalogs`
--

CREATE TABLE IF NOT EXISTS `catalogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `code` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `catalogs`
--

INSERT INTO `catalogs` (`id`, `name`, `code`) VALUES
(1, 'Мужской', 'man'),
(2, 'Женский', 'woman'),
(3, 'Детский', 'children');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img_src` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sku` varchar(10) NOT NULL,
  `price` float NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `img_src`, `name`, `sku`, `price`, `description`) VALUES
(1, '/images/catalog/8.jpg', 'Высокие кеды', '3415413', 7500, 'Кроссовки просто огонь! Берите'),
(2, '/images/catalog/4.jpg', 'Кожаная куртка', '2535347', 15000, 'Куртка просто огонь! Берите'),
(3, '/images/catalog/10.jpg', 'Осенние ботинки', '3415413', 6700, 'Кроссовки просто огонь! Берите'),
(4, '/images/catalog/5.jpg', 'Зимняя куртка', '2535347', 20000, 'Куртка просто огонь! Берите'),
(5, '/images/catalog/7.jpg', 'Летние кеды', '7485932', 4500, 'Носки просто огонь! Берите'),
(6, '/images/catalog/2.jpg', 'Лёгкая весенняя куртка на молнии', '9384759', 5000, 'Толстовка просто огонь! Берите'),
(7, '/images/catalog/11.jpg', 'Тёмные джинсы', '1489503', 1800, 'Футболка просто огонь! Берите'),
(8, '/images/catalog/12.jpg', 'Светлые джинсы', '8056377', 6600, 'Джинсы просто огонь! Берите'),
(9, '/images/catalog/8.jpg', 'Высокие кеды 2', '3415413', 7500, 'Кроссовки просто огонь! Берите'),
(10, '/images/catalog/4.jpg', 'Кожаная куртка 2', '2535347', 15000, 'Куртка просто огонь! Берите'),
(11, '/images/catalog/10.jpg', 'Осенние ботинки 2', '3415413', 6700, 'Кроссовки просто огонь! Берите'),
(12, '/images/catalog/5.jpg', 'Зимняя куртка 2', '2535347', 20000, 'Куртка просто огонь! Берите'),
(13, '/images/catalog/7.jpg', 'Летние кеды 2', '7485932', 4500, 'Носки просто огонь! Берите'),
(14, '/images/catalog/2.jpg', 'Лёгкая весенняя куртка на молнии 2', '9384759', 5000, 'Толстовка просто огонь! Берите'),
(15, '/images/catalog/11.jpg', 'Тёмные джинсы 2', '1489503', 1800, 'Футболка просто огонь! Берите'),
(16, '/images/catalog/12.jpg', 'Светлые джинсы 2', '8056377', 6600, 'Джинсы просто огонь! Берите'),
(17, '/images/catalog/10.jpg', 'Осенние ботинки 2 3', '3415413', 6700, 'Кроссовки просто огонь! Берите'),
(18, '/images/catalog/5.jpg', 'Зимняя куртка 2 3', '2535347', 20000, 'Куртка просто огонь! Берите'),
(19, '/images/catalog/7.jpg', 'Летние кеды 2 3', '7485932', 4500, 'Носки просто огонь! Берите'),
(20, '/images/catalog/2.jpg', 'Лёгкая весенняя куртка на молнии 2 3', '9384759', 5000, 'Толстовка просто огонь! Берите'),
(21, '/images/catalog/11.jpg', 'Тёмные джинсы 2 3', '1489503', 1800, 'Футболка просто огонь! Берите'),
(22, '/images/catalog/12.jpg', 'Светлые джинсы 2 3', '8056377', 6600, 'Джинсы просто огонь! Берите');

-- --------------------------------------------------------

--
-- Структура таблицы `product_catalog`
--

CREATE TABLE IF NOT EXISTS `product_catalog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `catalog_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_catalog`
--

INSERT INTO `product_catalog` (`id`, `product_id`, `catalog_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 5, 1),
(4, 6, 2),
(5, 7, 1),
(6, 8, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
