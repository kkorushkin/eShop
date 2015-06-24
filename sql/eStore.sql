-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 24 2015 г., 09:43
-- Версия сервера: 5.6.22-log
-- Версия PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `eShop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE IF NOT EXISTS `basket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(33) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

-- --------------------------------------------------------

--
-- Структура таблицы `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `brands_id` int(11) NOT NULL AUTO_INCREMENT,
  `brands_name` text NOT NULL,
  PRIMARY KEY (`brands_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Дамп данных таблицы `brands`
--

INSERT INTO `brands` (`brands_id`, `brands_name`) VALUES
(1, 'adidas'),
(2, 'nike'),
(3, 'jordan'),
(4, 'reebok'),
(5, 'puma'),
(6, 'under armour'),
(7, 'converse'),
(8, 'vans'),
(9, 'fila'),
(10, 'asics'),
(11, 'diadora'),
(12, 'and1'),
(13, 'lotto'),
(14, 'kappa'),
(15, 'umbro'),
(16, 'new balance');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `categories_id` int(11) NOT NULL AUTO_INCREMENT,
  `categories_name` text NOT NULL,
  PRIMARY KEY (`categories_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`) VALUES
(1, 'shoes'),
(2, 'clothing'),
(3, 'gear');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `item_id` int(6) NOT NULL,
  `link` varchar(222) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `item_id`, `link`) VALUES
(1, 1, 'images/shoes/man/AIR-JORDAN-XX9-695515_403/AIR-JORDAN-XX9-695515_403_A_b.jpg'),
(2, 2, 'images/shoes/man/AIR-JORDAN-I-RETRO-HIGHT.jpg'),
(3, 3, 'images/shoes/man/JORDAN-INSTIGATOR_red.jpg'),
(4, 4, 'images/shoes/man/JORDAN-SUPERFLY-3-684933_613_A_b.jpg'),
(5, 5, 'images/shoes/man/JORDAN-ECLIPSE-724010_402_A_b.jpg'),
(6, 6, 'images/shoes/man/Air-Jordan-1-Retro-94.jpg'),
(7, 7, 'images/gear/balls/Jordan-Legend-Size-7-Mens-Basketball-BB0473_823.jpg'),
(8, 8, 'images/gear/balls/Jordan-Hyper-Grip-OT-Size-7-Mens-Basketball-BB0517_066.jpg'),
(9, 9, 'images/gear/wristbands/JORDAN-JUMPMAN-WRISTBAND-619352_010.jpg'),
(10, 10, 'images/clothing/man/t-shirt/Jordan-RE2PECT-Derek-Jeter-Mens-T-Shirt-708586_066_A_s.jpg'),
(11, 11, 'images/gear/balls/Elite-Championship-Airlock-8-Panel-Size-6-Womens-Basketb_005.jpg'),
(13, 12, 'images/shoes/man/JORDAN-SUPERFLY-3-PO-724934_601/Red_Black_White/JORDAN-SUPERFLY-3-PO-724934_601_A_b.jpg'),
(15, 12, 'images/shoes/man/JORDAN-SUPERFLY-3-PO-724934_601/Red_Black_White/JORDAN-SUPERFLY-3-PO-724934_601_B_b.jpg'),
(17, 12, 'images/shoes/man/JORDAN-SUPERFLY-3-PO-724934_601/Red_Black_White/JORDAN-SUPERFLY-3-PO-724934_601_C_b.jpg'),
(19, 12, 'images/shoes/man/JORDAN-SUPERFLY-3-PO-724934_601/Red_Black_White/JORDAN-SUPERFLY-3-PO-724934_601_D_b.jpg'),
(21, 12, 'images/shoes/man/JORDAN-SUPERFLY-3-PO-724934_601/Red_Black_White/JORDAN-SUPERFLY-3-PO-724934_601_E_b.jpg'),
(28, 1, 'images/shoes/man/AIR-JORDAN-XX9-695515_403/AIR-JORDAN-XX9-695515_403_D_b.jpg'),
(23, 12, 'images/shoes/man/JORDAN-SUPERFLY-3-PO-724934_601/Red_Black_White/JORDAN-SUPERFLY-3-PO-724934_601_F_b.jpg'),
(26, 1, 'images/shoes/man/AIR-JORDAN-XX9-695515_403/AIR-JORDAN-XX9-695515_403_B_b.jpg'),
(30, 1, 'images/shoes/man/AIR-JORDAN-XX9-695515_403/AIR-JORDAN-XX9-695515_403_F_b.jpg'),
(29, 1, 'images/shoes/man/AIR-JORDAN-XX9-695515_403/AIR-JORDAN-XX9-695515_403_E_b.jpg'),
(27, 1, 'images/shoes/man/AIR-JORDAN-XX9-695515_403/AIR-JORDAN-XX9-695515_403_C_b.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `items_id` int(6) NOT NULL AUTO_INCREMENT,
  `items_name` varchar(111) NOT NULL,
  `items_brand` text NOT NULL,
  `items_description` varchar(255) NOT NULL,
  `items_price` int(6) NOT NULL,
  `items_category` int(3) NOT NULL,
  `items_sub_category` int(11) NOT NULL,
  `items_margin` int(11) NOT NULL,
  `items_originlink` varchar(222) NOT NULL,
  PRIMARY KEY (`items_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`items_id`, `items_name`, `items_brand`, `items_description`, `items_price`, `items_category`, `items_sub_category`, `items_margin`, `items_originlink`) VALUES
(1, 'AIR JORDAN XX9', '3', 'The Air Jordan XX9 is the lightest Air Jordan to date with a reengineered FlightPlate and a one-piece woven upper that moves naturally and comfortably with your foot.\nThe newest colorways of the Air Jordan XX9 arrive just in time for the playoffs, featur', 225, 1, 3, 10, 'http://store.nike.com/us/en_us/pd/air-jordan-xx9-basketball-shoe/pid-10241311/pgid-10232626'),
(2, 'Air Jordan I Retro High', '3', '', 130, 1, 3, 10, ''),
(3, 'JORDAN INSTIGATOR', '3', '', 150, 1, 3, 10, ''),
(4, 'JORDAN SUPER.FLY 3', '3', '', 99, 1, 3, 10, ''),
(5, 'JORDAN ECLIPSE', '3', '', 110, 1, 3, 10, 'http://store.nike.com/us/en_us/pd/jordan-eclipse-shoe/pid-10264757/pgid-10264747'),
(6, 'air jordan 1 retro 94', '3', '', 130, 1, 3, 10, 'http://store.nike.com/us/en_us/pd/air-jordan-1-retro-94-shoe/pid-845116/pgid-845112'),
(7, 'jordan legend (size 7)', '3', '', 65, 3, 1, 10, 'http://store.nike.com/us/en_us/pd/jordan-legend-size-7-basketball/pid-401236/pgid-10226605'),
(8, 'Jordan Hyper Grip OT (Size 7)', '3', '', 50, 3, 1, 10, 'http://store.nike.com/us/en_us/pd/jordan-hyper-grip-ot-basketball/pid-10062823/pgid-10068135'),
(9, 'Jordan Jumpman Wristbands', '3', '', 10, 3, 1, 10, 'http://store.nike.com/us/en_us/pd/jordan-jumpman-wristbands/pid-1469569/pgid-10084733'),
(10, 'Jordan "RE2PECT" (Derek Jeter)', '3', '', 35, 2, 3, 10, 'http://store.nike.com/us/en_us/pd/jordan-re2pect-derek-jeter-t-shirt/pid-10320966/pgid-1539151'),
(11, 'Elite Championship Airlock (size 6)', '2', '', 70, 3, 4, 10, 'http://store.nike.com/us/en_us/pd/elite-championship-airlock-8-panel-basketball/pid-574746/pgid-10089875'),
(12, 'Jordan Super.Fly 3 PO', '3', '', 140, 1, 3, 10, 'http://store.nike.com/us/en_us/pd/jordan-superfly-3-po-basketball-shoe/pid-10265013/pgid-10265012');

-- --------------------------------------------------------

--
-- Структура таблицы `sub_categories`
--

CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`) VALUES
(1, 'unisex_adult'),
(2, 'unisex_kids'),
(3, 'man'),
(4, 'woman'),
(5, 'kids');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
