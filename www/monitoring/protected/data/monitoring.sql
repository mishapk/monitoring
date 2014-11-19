-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 19 2014 г., 14:49
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `monitoring`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_enterprise`
--

CREATE TABLE IF NOT EXISTS `tbl_enterprise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `address` text NOT NULL,
  `info` text NOT NULL,
  `e_lng` float NOT NULL,
  `e_lat` float NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `tbl_enterprise`
--

INSERT INTO `tbl_enterprise` (`id`, `title`, `address`, `info`, `e_lng`, `e_lat`) VALUES
(1, 'Центравис', 'г.Никополь', 'АСРВО', 0, 0),
(2, 'Никотьюб', 'Никополь', 'Нержавейка', 0, 0),
(3, 'Титан', 'г. Никополь', 'Титановые трубы', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_events`
--

CREATE TABLE IF NOT EXISTS `tbl_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `title` varchar(128) NOT NULL,
  `info` text NOT NULL,
  `sensor_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `raw_info` text NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sensor_id` (`sensor_id`),
  KEY `level_id` (`level_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

--
-- Дамп данных таблицы `tbl_events`
--

INSERT INTO `tbl_events` (`id`, `created`, `title`, `info`, `sensor_id`, `level_id`, `raw_info`, `user_id`) VALUES
(31, '2014-10-31 15:48:11', '', '', 5, 1, 'fig ego znaet', 11),
(32, '2014-10-31 15:49:14', '', '', 5, 1, 'fig ego znaet', 11),
(33, '2014-11-03 16:20:09', '', '', 5, 1, 'fig ego znaet', 11),
(34, '2014-11-07 17:24:00', '', '', 14, 1, 'TestInfo', 11),
(35, '2014-11-07 17:25:52', '', '', 14, 1, 'StartSystem', 11),
(37, '2014-11-19 10:19:24', '', '', 7, 2, 'Внимание!  Склад Пролив кислотного расствора в травильном отделении достиг  критического значения (Порог II) [10:19:21]', 11),
(38, '2014-11-19 11:07:15', '', '', 7, 4, 'Внимание!  Склад Пролив кислотного расствора в травильном отделении достиг  нормы [11:07:13]', 11),
(40, '2014-11-19 11:46:41', '', '', 7, 3, 'Внимание!  Склад Пролив - отказ датчика.  [11:46:39]', 11),
(41, '2014-11-19 12:18:46', '', '', 14, 1, 'TestInterval', 11),
(42, '2014-11-19 13:18:49', '', '', 14, 1, 'TestInterval', 11),
(43, '2014-11-19 14:10:14', '', '', 5, 3, 'Внимание!  Травильные ванны Пролив - отказ датчика.  [14:10:11]', 11),
(44, '2014-11-19 14:15:02', '', '', 7, 2, 'Внимание!  Склад Пролив кислотного расствора в травильном отделении достиг  критического значения (Порог II) [14:14:59]', 11),
(45, '2014-11-19 14:15:50', '', '', 7, 4, 'Внимание!  Склад Пролив кислотного расствора в травильном отделении достиг  нормы [14:15:48]', 11),
(46, '2014-11-19 14:18:46', '', '', 14, 1, 'TestInterval', 11),
(47, '2014-11-19 14:36:32', '', '', 12, 2, 'Внимание!  Травильные ванны', 11),
(48, '2014-11-19 14:36:49', '', '', 12, 4, 'Внимание!  Травильные ванны ручной извещатель восстановлен.', 11),
(49, '2014-11-19 14:38:19', '', '', 9, 1, 'Внимание!  Склад Концентрация паров диаксида озота в воздухе рабочей зоны достигла  до критического значения (Порог I) [14:38:17]', 11),
(50, '2014-11-19 14:43:42', '', '', 9, 4, 'Внимание!  Склад Концентрация паров диаксида озота в воздухе рабочей зоны достигла  нормы [14:43:39]', 11),
(51, '2014-11-19 14:47:00', '', '', 9, 2, 'Внимание!  Склад Концентрация паров диаксида озота в воздухе рабочей зоны достигла  критического значения (Порог II) [14:46:58]', 11);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_level`
--

CREATE TABLE IF NOT EXISTS `tbl_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(16) NOT NULL,
  `info` varchar(32) NOT NULL,
  `level` int(11) NOT NULL,
  `color` varchar(7) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `level_2` (`level`),
  KEY `level_3` (`level`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `tbl_level`
--

INSERT INTO `tbl_level` (`id`, `title`, `info`, `level`, `color`) VALUES
(1, 'Уровень_I', 'До кретический', 1, '#ff9900'),
(2, 'Уровень_II', 'Критический', 2, '#ff0000'),
(3, 'Отказ', 'Неисправность', 3, '#c0c0c0'),
(4, 'Норма', 'Нормальная работа', 4, '#00ff00');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_objec`
--

CREATE TABLE IF NOT EXISTS `tbl_objec` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) DEFAULT NULL,
  `place` varchar(128) DEFAULT NULL,
  `id_enterprise` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_enterprise` (`id_enterprise`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `tbl_objec`
--

INSERT INTO `tbl_objec` (`id`, `title`, `place`, `id_enterprise`) VALUES
(3, 'Травилка', '', 2),
(4, 'Травилка 2', '', 1),
(5, 'АВК', 'Старое', 1),
(6, 'Травильный участок', 'Травильное отделение', 3),
(7, 'Delphi', 'Delphi2', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_sensor`
--

CREATE TABLE IF NOT EXISTS `tbl_sensor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `place` varchar(64) NOT NULL,
  `id_type` int(11) NOT NULL,
  `x_cord` int(11) NOT NULL,
  `y_cord` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `id_object` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `id_2` (`id`),
  KEY `id_object` (`id_object`),
  KEY `id_type` (`id_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `tbl_sensor`
--

INSERT INTO `tbl_sensor` (`id`, `address`, `title`, `place`, `id_type`, `x_cord`, `y_cord`, `state`, `id_object`) VALUES
(3, 1, '1', '1', 2, 1, 1, 1, 3),
(4, 1, '1', '1', 1, 1, 1, 1, 4),
(5, 162, 'U2.1', 'Травильные ванны', 5, 0, 0, 0, 6),
(6, 162, 'U2.2', 'Травильные Ванны', 5, 1, 1, 1, 6),
(7, 161, 'U2.3', 'Место хранения', 5, 0, 0, 0, 6),
(8, 161, 'U2.4', 'Место хранения кислоты', 5, 0, 0, 0, 6),
(9, 166, 'U4.1', 'Место харанеия', 6, 0, 0, 0, 6),
(10, 166, 'U4.2', 'Место харения', 6, 0, 0, 0, 6),
(11, 163, 'ВТМ1', 'Место хранения', 4, 0, 0, 0, 6),
(12, 164, 'ВТМ2', 'Травильные ванны', 4, 0, 0, 0, 6),
(13, 165, 'ВТМ3', 'Травильные ванны', 4, 0, 0, 0, 6),
(14, 0, 'Тестовый сигнал', 'Тестовый сигнал', 1, 0, 0, 0, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_stype`
--

CREATE TABLE IF NOT EXISTS `tbl_stype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL,
  `info` varchar(32) NOT NULL,
  `svg` text NOT NULL,
  `p1` text NOT NULL,
  `p2` text NOT NULL,
  `p3` text NOT NULL,
  `p4` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `tbl_stype`
--

INSERT INTO `tbl_stype` (`id`, `title`, `info`, `svg`, `p1`, `p2`, `p3`, `p4`) VALUES
(1, 'Температура', '-', '<?xml version="1.0" encoding="utf-8"?>\r\n<!-- Generator: Adobe Illustrator 15.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->\r\n<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">\r\n<svg version="1.1" id="РЎР»РѕР№_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"\r\n	 width="175.517px" height="48.667px" viewBox="0 0 175.517 48.667" enable-background="new 0 0 175.517 48.667"\r\n	 xml:space="preserve">\r\n<g>\r\n	<rect x="7.517" y="6.177" fill="#FF8000" stroke="#000000" stroke-miterlimit="10" width="36" height="36"/>\r\n	<path fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" d="M27.191,27.772V12.886c0-1.145-0.917-2.074-2.049-2.074\r\n		c-1.132,0-2.05,0.929-2.05,2.074v14.886c-1.947,0.89-3.318,3.006-3.318,5.478c0,3.273,2.403,5.927,5.368,5.927\r\n		s5.368-2.654,5.368-5.927C30.51,30.778,29.139,28.661,27.191,27.772z"/>\r\n</g>\r\n<g>\r\n	<rect x="48.416" y="6.177" fill="#FF0000" stroke="#000000" stroke-miterlimit="10" width="36" height="36"/>\r\n	<path fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" d="M68.465,26.421V11.535c0-1.145-0.917-2.074-2.049-2.074\r\n		c-1.132,0-2.05,0.929-2.05,2.074v14.886c-1.947,0.89-3.318,3.006-3.318,5.478c0,3.273,2.403,5.927,5.368,5.927\r\n		s5.368-2.654,5.368-5.927C71.784,29.427,70.413,27.31,68.465,26.421z"/>\r\n</g>\r\n<g>\r\n	<rect x="90.592" y="6.177" fill="#40A629" stroke="#000000" stroke-miterlimit="10" width="36" height="36"/>\r\n	<path fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" d="M110.642,27.11V12.225c0-1.145-0.917-2.074-2.049-2.074\r\n		c-1.132,0-2.05,0.929-2.05,2.074V27.11c-1.947,0.89-3.318,3.006-3.318,5.478c0,3.273,2.403,5.927,5.368,5.927\r\n		s5.368-2.654,5.368-5.927C113.961,30.116,112.59,28,110.642,27.11z"/>\r\n</g>\r\n<g>\r\n	<rect x="133.449" y="6.177" fill="#808080" stroke="#000000" stroke-miterlimit="10" width="36" height="36"/>\r\n	<path fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" d="M153.235,26.955V12.069c0-1.145-0.917-2.074-2.049-2.074\r\n		c-1.132,0-2.05,0.929-2.05,2.074v14.886c-1.947,0.89-3.318,3.006-3.318,5.478c0,3.273,2.403,5.927,5.368,5.927\r\n		s5.368-2.654,5.368-5.927C156.554,29.96,155.183,27.844,153.235,26.955z"/>\r\n</g>\r\n</svg>\r\n', '', '', '', ''),
(2, 'Давление', '-', '<?xml version="1.0" encoding="utf-8"?>\r\n<!-- Generator: Adobe Illustrator 15.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->\r\n<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">\r\n<svg version="1.1" id="РЎР»РѕР№_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"\r\n	 width="175.517px" height="48.667px" viewBox="0 0 175.517 48.667" enable-background="new 0 0 175.517 48.667"\r\n	 xml:space="preserve">\r\n<g>\r\n	<rect x="7.517" y="6.177" fill="#FF8000" stroke="#000000" stroke-miterlimit="10" width="36" height="36"/>\r\n	<ellipse fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" cx="25.517" cy="24.177" rx="10.868" ry="12"/>\r\n</g>\r\n<g>\r\n	<rect x="48.416" y="6.177" fill="#FF0000" stroke="#000000" stroke-miterlimit="10" width="36" height="36"/>\r\n	<ellipse fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" cx="66.415" cy="24.177" rx="10.868" ry="12.001"/>\r\n</g>\r\n<g>\r\n	<rect x="90.592" y="6.177" fill="#40A629" stroke="#000000" stroke-miterlimit="10" width="36" height="36"/>\r\n	<ellipse fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" cx="108.592" cy="24.177" rx="10.868" ry="12.001"/>\r\n</g>\r\n<g>\r\n	<rect x="133.449" y="6.177" fill="#808080" stroke="#000000" stroke-miterlimit="10" width="36" height="36"/>\r\n	<ellipse fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" cx="151.448" cy="24.177" rx="10.868" ry="12.001"/>\r\n</g>\r\n</svg>\r\n', '', '', '', ''),
(3, 'Уровень', '-', '<?xml version="1.0" encoding="utf-8"?>\r\n<!-- Generator: Adobe Illustrator 15.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->\r\n<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">\r\n<svg version="1.1" id="РЎР»РѕР№_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"\r\n	 width="175.517px" height="48.667px" viewBox="0 0 175.517 48.667" enable-background="new 0 0 175.517 48.667"\r\n	 xml:space="preserve">\r\n<g>\r\n	<rect x="7.517" y="6.177" fill="#FF8000" stroke="#000000" stroke-miterlimit="10" width="36" height="36"/>\r\n	<polygon fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" points="25.517,24.177 25.517,24.177 8.125,6.177 42.875,6.177 	\r\n		"/>\r\n</g>\r\n<g>\r\n	<rect x="48.416" y="6.177" fill="#FF0000" stroke="#000000" stroke-miterlimit="10" width="36" height="36"/>\r\n	<polygon fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" points="66.433,24.177 66.433,24.177 49.041,6.177 83.791,6.177 	\r\n		"/>\r\n</g>\r\n<g>\r\n	<rect x="90.592" y="6.177" fill="#40A629" stroke="#000000" stroke-miterlimit="10" width="36" height="36"/>\r\n	<polygon fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" points="108.61,24.333 108.61,24.333 91.218,6.333 125.968,6.333 \r\n			"/>\r\n</g>\r\n<g>\r\n	<rect x="133.449" y="6.177" fill="#808080" stroke="#000000" stroke-miterlimit="10" width="36" height="36"/>\r\n	<polygon fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" points="151.466,24.333 151.466,24.333 134.074,6.333 \r\n		168.824,6.333 	"/>\r\n</g>\r\n</svg>\r\n', '', '', '', ''),
(4, 'Ручной извещатель', '-', '<?xml version="1.0" encoding="utf-8"?>\r\n<!-- Generator: Adobe Illustrator 15.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->\r\n<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">\r\n<svg version="1.1" id="РЎР»РѕР№_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"\r\n	 width="175.517px" height="48.667px" viewBox="0 0 175.517 48.667" enable-background="new 0 0 175.517 48.667"\r\n	 xml:space="preserve">\r\n<g>\r\n	<rect x="7.517" y="6.177" fill="#FF8000" stroke="#000000" stroke-miterlimit="10" width="36" height="36"/>\r\n	<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="7.517" y1="6.177" x2="25.517" y2="24.177"/>\r\n	<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="25.517" y1="24.177" x2="43.517" y2="6.177"/>\r\n	<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="25.517" y1="24.177" x2="25.517" y2="41.875"/>\r\n</g>\r\n<g>\r\n	<rect x="48.416" y="6.177" fill="#FF0000" stroke="#000000" stroke-miterlimit="10" width="36" height="36"/>\r\n	<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="48.416" y1="6.329" x2="66.416" y2="24.329"/>\r\n	<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="66.416" y1="24.329" x2="84.416" y2="6.329"/>\r\n	<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="66.416" y1="24.329" x2="66.416" y2="42.026"/>\r\n</g>\r\n<g>\r\n	<rect x="90.592" y="6.177" fill="#40A629" stroke="#000000" stroke-miterlimit="10" width="36" height="36"/>\r\n	<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="91.076" y1="6.924" x2="109.076" y2="24.924"/>\r\n	<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="109.076" y1="24.924" x2="127.076" y2="6.924"/>\r\n	<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="109.076" y1="24.924" x2="109.076" y2="42.622"/>\r\n</g>\r\n<g>\r\n	<rect x="133.449" y="6.177" fill="#808080" stroke="#000000" stroke-miterlimit="10" width="36" height="36"/>\r\n	<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="133.938" y1="6.484" x2="151.938" y2="24.484"/>\r\n	<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="151.938" y1="24.484" x2="169.938" y2="6.484"/>\r\n	<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="151.938" y1="24.484" x2="151.938" y2="42.182"/>\r\n</g>\r\n</svg>\r\n', '<?xml version="1.0" encoding="utf-8"?>\r\n<!-- Generator: Adobe Illustrator 15.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->\r\n<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">\r\n<svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"\r\n	 width="45.35px" height="45.35px" viewBox="0 0 45.35 45.35" enable-background="new 0 0 45.35 45.35" xml:space="preserve">\r\n<rect x="11.338" y="11.338" fill="#FDAA13" stroke="#000000" stroke-miterlimit="10" width="22.675" height="22.675"/>\r\n<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="11.338" y1="11.338" x2="22.259" y2="22.675"/>\r\n<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="22.259" y1="22.675" x2="34.013" y2="11.338"/>\r\n<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="22.259" y1="22.675" x2="22.259" y2="34.013"/>\r\n</svg>\r\n', '<?xml version="1.0" encoding="utf-8"?>\r\n<!-- Generator: Adobe Illustrator 15.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->\r\n<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">\r\n<svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"\r\n	 width="45.35px" height="45.35px" viewBox="0 0 45.35 45.35" enable-background="new 0 0 45.35 45.35" xml:space="preserve">\r\n<rect x="11.338" y="11.338" fill="#E30613" stroke="#000000" stroke-miterlimit="10" width="22.675" height="22.675"/>\r\n<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="11.338" y1="11.338" x2="22.259" y2="22.675"/>\r\n<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="22.259" y1="22.675" x2="34.013" y2="11.338"/>\r\n<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="22.259" y1="22.675" x2="22.259" y2="34.013"/>\r\n</svg>\r\n', '<?xml version="1.0" encoding="utf-8"?>\r\n<!-- Generator: Adobe Illustrator 15.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->\r\n<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">\r\n<svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"\r\n	 width="45.35px" height="45.35px" viewBox="0 0 45.35 45.35" enable-background="new 0 0 45.35 45.35" xml:space="preserve">\r\n<rect x="11.338" y="11.338" fill="#F39200" stroke="#000000" stroke-miterlimit="10" width="22.675" height="22.675"/>\r\n<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="11.338" y1="11.338" x2="22.259" y2="22.675"/>\r\n<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="22.259" y1="22.675" x2="34.013" y2="11.338"/>\r\n<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="22.259" y1="22.675" x2="22.259" y2="34.013"/>\r\n</svg>\r\n', '<?xml version="1.0" encoding="utf-8"?>\r\n<!-- Generator: Adobe Illustrator 15.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->\r\n<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">\r\n<svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"\r\n	 width="45.35px" height="45.35px" viewBox="0 0 45.35 45.35" enable-background="new 0 0 45.35 45.35" xml:space="preserve">\r\n<rect x="11.338" y="11.338" fill="#23BF2F" stroke="#000000" stroke-miterlimit="10" width="22.675" height="22.675"/>\r\n<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="11.338" y1="11.338" x2="22.259" y2="22.675"/>\r\n<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="22.259" y1="22.675" x2="34.013" y2="11.338"/>\r\n<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="22.259" y1="22.675" x2="22.259" y2="34.013"/>\r\n</svg>\r\n'),
(5, 'Пролив кислоты', 'Датчик пролива', '-', '<?xml version="1.0" encoding="utf-8"?>\r\n<!-- Generator: Adobe Illustrator 15.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->\r\n<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">\r\n<svg version="1.1" id="РЎР»РѕР№_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"\r\n	 width="45.35px" height="45.35px" viewBox="0 0 45.35 45.35" enable-background="new 0 0 45.35 45.35" xml:space="preserve">\r\n<rect x="11.337" y="11.337" fill="#F39200" stroke="#000000" stroke-miterlimit="10" width="22.674" height="22.674"/>\r\n<polygon fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" points="11.337,33.213 22.675,22.675 34.012,12.212 34.012,11.337 \r\n	11.337,11.337 "/>\r\n</svg>\r\n', '<?xml version="1.0" encoding="utf-8"?>\r\n<!-- Generator: Adobe Illustrator 15.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->\r\n<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">\r\n<svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"\r\n	 width="45.35px" height="45.35px" viewBox="0 0 45.35 45.35" enable-background="new 0 0 45.35 45.35" xml:space="preserve">\r\n<rect x="11.338" y="11.338" fill="#E30613" stroke="#000000" stroke-miterlimit="10" width="22.675" height="22.675"/>\r\n<polygon fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" points="11.338,33.212 22.675,22.675 34.013,12.213 34.013,11.338 \r\n	11.338,11.338 "/>\r\n</svg>\r\n', '<?xml version="1.0" encoding="utf-8"?>\r\n<!-- Generator: Adobe Illustrator 15.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->\r\n<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">\r\n<svg version="1.1" id="РЎР»РѕР№_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"\r\n	 width="45.35px" height="45.35px" viewBox="0 0 45.35 45.35" enable-background="new 0 0 45.35 45.35" xml:space="preserve">\r\n<rect x="11.338" y="11.338" fill="#878787" stroke="#000000" stroke-miterlimit="10" width="22.675" height="22.675"/>\r\n<polygon fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" points="11.338,33.212 22.675,22.675 34.013,12.213 34.013,11.338 \r\n	11.338,11.338 "/>\r\n</svg>', '<?xml version="1.0" encoding="utf-8"?>\r\n<!-- Generator: Adobe Illustrator 15.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->\r\n<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">\r\n<svg version="1.1" id="РЎР»РѕР№_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"\r\n	 width="45.35px" height="45.35px" viewBox="0 0 45.35 45.35" enable-background="new 0 0 45.35 45.35" xml:space="preserve">\r\n<rect x="11.338" y="11.338" fill="#3AAA35" stroke="#000000" stroke-miterlimit="10" width="22.675" height="22.675"/>\r\n<polygon fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" points="11.338,33.212 22.675,22.675 34.013,12.213 34.013,11.338 \r\n	11.338,11.338 "/>\r\n</svg>\r\n'),
(6, 'Концентрация', 'Датчик концентрации газа', '-', '<?xml version="1.0" encoding="utf-8"?>\r\n<!-- Generator: Adobe Illustrator 15.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->\r\n<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">\r\n<svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"\r\n	 width="45.35px" height="45.35px" viewBox="0 0 45.35 45.35" enable-background="new 0 0 45.35 45.35" xml:space="preserve">\r\n<rect x="11.338" y="11.338" fill="#F39200" stroke="#000000" stroke-miterlimit="10" width="22.675" height="22.675"/>\r\n<path fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" d="M34.013,34.013c0-6.262-5.076-11.338-11.338-11.338\r\n	c-6.262,0-11.337,5.076-11.337,11.338H34.013z"/>\r\n</svg>\r\n', '<?xml version="1.0" encoding="utf-8"?>\r\n<!-- Generator: Adobe Illustrator 15.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->\r\n<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">\r\n<svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"\r\n	 width="45.35px" height="45.35px" viewBox="0 0 45.35 45.35" enable-background="new 0 0 45.35 45.35" xml:space="preserve">\r\n<rect x="11.338" y="11.338" fill="#E30613" stroke="#000000" stroke-miterlimit="10" width="22.675" height="22.675"/>\r\n<path fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" d="M34.013,34.013c0-6.262-5.076-11.338-11.338-11.338\r\n	c-6.262,0-11.337,5.076-11.337,11.338H34.013z"/>\r\n</svg>\r\n', '<?xml version="1.0" encoding="utf-8"?>\r\n<!-- Generator: Adobe Illustrator 15.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->\r\n<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">\r\n<svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"\r\n	 width="45.35px" height="45.35px" viewBox="0 0 45.35 45.35" enable-background="new 0 0 45.35 45.35" xml:space="preserve">\r\n<rect x="11.338" y="11.338" fill="#878787" stroke="#000000" stroke-miterlimit="10" width="22.675" height="22.675"/>\r\n<path fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" d="M34.013,34.013c0-6.262-5.076-11.338-11.338-11.338\r\n	c-6.262,0-11.337,5.076-11.337,11.338H34.013z"/>\r\n</svg>\r\n', '<?xml version="1.0" encoding="utf-8"?>\r\n<!-- Generator: Adobe Illustrator 15.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->\r\n<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">\r\n<svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"\r\n	 width="45.35px" height="45.35px" viewBox="0 0 45.35 45.35" enable-background="new 0 0 45.35 45.35" xml:space="preserve">\r\n<rect x="11.338" y="11.338" fill="#95C11F" stroke="#000000" stroke-miterlimit="10" width="22.675" height="22.675"/>\r\n<path fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" d="M34.013,34.013c0-6.262-5.076-11.338-11.338-11.338\r\n	c-6.262,0-11.337,5.076-11.337,11.338H34.013z"/>\r\n</svg>\r\n');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `enterprise_id` int(11) DEFAULT NULL,
  `role` varchar(20) NOT NULL,
  `lastLoginTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `enterprise_id` (`enterprise_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `email`, `enterprise_id`, `role`, `lastLoginTime`) VALUES
(10, 'mishapk', '$2a$13$quv9q0vEtnfPCnRj431qMu7TE3WrtvKXUdVyb93hoTd6vZmh2ZSpu', 'mishapk@ya.ru', 0, 'root', '2014-11-19 12:00:39'),
(11, 'titan', '$2a$13$Dkp159j.70Kc8Kav88YBf.jKDcfkURhOouW426DRTcqWr6GsJtdtK', 'titan@mail.ru', 3, 'device', '2014-11-19 12:47:00'),
(12, 'titan2', '$2a$13$R7xZ92V0Ub4VZuZtr67Bd.F1sDJLsgks8yKH8/c3wlmkCmyjmMGIK', 'titan2@mail.ru', 3, 'admin', '2014-11-19 08:09:06');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD CONSTRAINT `tbl_events_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `tbl_level` (`id`),
  ADD CONSTRAINT `tbl_events_ibfk_2` FOREIGN KEY (`sensor_id`) REFERENCES `tbl_sensor` (`id`);

--
-- Ограничения внешнего ключа таблицы `tbl_objec`
--
ALTER TABLE `tbl_objec`
  ADD CONSTRAINT `tbl_objec_ibfk_1` FOREIGN KEY (`id_enterprise`) REFERENCES `tbl_enterprise` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tbl_sensor`
--
ALTER TABLE `tbl_sensor`
  ADD CONSTRAINT `tbl_sensor_ibfk_1` FOREIGN KEY (`id_object`) REFERENCES `tbl_objec` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_sensor_ibfk_2` FOREIGN KEY (`id_type`) REFERENCES `tbl_stype` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
