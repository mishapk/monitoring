-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Сен 28 2014 г., 19:39
-- Версия сервера: 5.5.38
-- Версия PHP: 5.3.10-1ubuntu3.14

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `tbl_events`
--

INSERT INTO `tbl_events` (`id`, `created`, `title`, `info`, `sensor_id`, `level_id`, `raw_info`, `user_id`) VALUES
(4, '2014-09-26 13:48:45', '111', '111', 5, 1, '111', 2),
(5, '2014-09-26 13:58:39', '1111', '111', 3, 3, '', 2),
(6, '2014-09-26 17:46:34', 'Сработка на титане', 'Фиг', 5, 4, '', 2),
(7, '2014-09-28 11:50:54', '', '', 5, 1, '', 2),
(8, '2014-09-28 11:52:29', '', '', 5, 1, '', 2),
(9, '2014-09-28 11:56:57', '', '', 5, 1, '', 2),
(10, '2014-09-28 13:03:57', '', '', 5, 1, '', 2),
(11, '2014-09-28 13:04:04', '', '', 5, 1, '', 2),
(12, '2014-09-28 13:08:43', '', '', 5, 1, '', 2);

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
(1, 'Уровень 1', 'До кретический', 1, '#ff9900'),
(2, 'Уровень 2', 'Критический', 2, '#ff0000'),
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
(6, 'Травилка ТТТ', 'Тиат', 3),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `tbl_sensor`
--

INSERT INTO `tbl_sensor` (`id`, `address`, `title`, `place`, `id_type`, `x_cord`, `y_cord`, `state`, `id_object`) VALUES
(3, 1, '1', '1', 2, 1, 1, 1, 3),
(4, 1, '1', '1', 1, 1, 1, 1, 4),
(5, 11, 'ТЬ ЬТ', 'ффф', 1, 0, 0, 0, 6),
(6, 10, 'Титан1', 'sada', 3, 1, 1, 1, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_stype`
--

CREATE TABLE IF NOT EXISTS `tbl_stype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL,
  `info` varchar(32) NOT NULL,
  `svg` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `tbl_stype`
--

INSERT INTO `tbl_stype` (`id`, `title`, `info`, `svg`) VALUES
(1, 'Температура', '-', '<?xml version="1.0" encoding="utf-8"?>\r\n<!-- Generator: Adobe Illustrator 15.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->\r\n<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">\r\n<svg version="1.1" id="РЎР»РѕР№_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"\r\n	 width="175.517px" height="48.667px" viewBox="0 0 175.517 48.667" enable-background="new 0 0 175.517 48.667"\r\n	 xml:space="preserve">\r\n<g>\r\n	<rect x="7.517" y="6.177" fill="#FF8000" stroke="#000000" stroke-miterlimit="10" width="36" height="36"/>\r\n	<path fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" d="M27.191,27.772V12.886c0-1.145-0.917-2.074-2.049-2.074\r\n		c-1.132,0-2.05,0.929-2.05,2.074v14.886c-1.947,0.89-3.318,3.006-3.318,5.478c0,3.273,2.403,5.927,5.368,5.927\r\n		s5.368-2.654,5.368-5.927C30.51,30.778,29.139,28.661,27.191,27.772z"/>\r\n</g>\r\n<g>\r\n	<rect x="48.416" y="6.177" fill="#FF0000" stroke="#000000" stroke-miterlimit="10" width="36" height="36"/>\r\n	<path fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" d="M68.465,26.421V11.535c0-1.145-0.917-2.074-2.049-2.074\r\n		c-1.132,0-2.05,0.929-2.05,2.074v14.886c-1.947,0.89-3.318,3.006-3.318,5.478c0,3.273,2.403,5.927,5.368,5.927\r\n		s5.368-2.654,5.368-5.927C71.784,29.427,70.413,27.31,68.465,26.421z"/>\r\n</g>\r\n<g>\r\n	<rect x="90.592" y="6.177" fill="#40A629" stroke="#000000" stroke-miterlimit="10" width="36" height="36"/>\r\n	<path fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" d="M110.642,27.11V12.225c0-1.145-0.917-2.074-2.049-2.074\r\n		c-1.132,0-2.05,0.929-2.05,2.074V27.11c-1.947,0.89-3.318,3.006-3.318,5.478c0,3.273,2.403,5.927,5.368,5.927\r\n		s5.368-2.654,5.368-5.927C113.961,30.116,112.59,28,110.642,27.11z"/>\r\n</g>\r\n<g>\r\n	<rect x="133.449" y="6.177" fill="#808080" stroke="#000000" stroke-miterlimit="10" width="36" height="36"/>\r\n	<path fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" d="M153.235,26.955V12.069c0-1.145-0.917-2.074-2.049-2.074\r\n		c-1.132,0-2.05,0.929-2.05,2.074v14.886c-1.947,0.89-3.318,3.006-3.318,5.478c0,3.273,2.403,5.927,5.368,5.927\r\n		s5.368-2.654,5.368-5.927C156.554,29.96,155.183,27.844,153.235,26.955z"/>\r\n</g>\r\n</svg>\r\n'),
(2, 'Давление', '-', '<?xml version="1.0" encoding="utf-8"?>\r\n<!-- Generator: Adobe Illustrator 15.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->\r\n<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">\r\n<svg version="1.1" id="РЎР»РѕР№_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"\r\n	 width="175.517px" height="48.667px" viewBox="0 0 175.517 48.667" enable-background="new 0 0 175.517 48.667"\r\n	 xml:space="preserve">\r\n<g>\r\n	<rect x="7.517" y="6.177" fill="#FF8000" stroke="#000000" stroke-miterlimit="10" width="36" height="36"/>\r\n	<ellipse fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" cx="25.517" cy="24.177" rx="10.868" ry="12"/>\r\n</g>\r\n<g>\r\n	<rect x="48.416" y="6.177" fill="#FF0000" stroke="#000000" stroke-miterlimit="10" width="36" height="36"/>\r\n	<ellipse fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" cx="66.415" cy="24.177" rx="10.868" ry="12.001"/>\r\n</g>\r\n<g>\r\n	<rect x="90.592" y="6.177" fill="#40A629" stroke="#000000" stroke-miterlimit="10" width="36" height="36"/>\r\n	<ellipse fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" cx="108.592" cy="24.177" rx="10.868" ry="12.001"/>\r\n</g>\r\n<g>\r\n	<rect x="133.449" y="6.177" fill="#808080" stroke="#000000" stroke-miterlimit="10" width="36" height="36"/>\r\n	<ellipse fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" cx="151.448" cy="24.177" rx="10.868" ry="12.001"/>\r\n</g>\r\n</svg>\r\n'),
(3, 'Уровень', '-', '<?xml version="1.0" encoding="utf-8"?>\r\n<!-- Generator: Adobe Illustrator 15.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->\r\n<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">\r\n<svg version="1.1" id="РЎР»РѕР№_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"\r\n	 width="175.517px" height="48.667px" viewBox="0 0 175.517 48.667" enable-background="new 0 0 175.517 48.667"\r\n	 xml:space="preserve">\r\n<g>\r\n	<rect x="7.517" y="6.177" fill="#FF8000" stroke="#000000" stroke-miterlimit="10" width="36" height="36"/>\r\n	<polygon fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" points="25.517,24.177 25.517,24.177 8.125,6.177 42.875,6.177 	\r\n		"/>\r\n</g>\r\n<g>\r\n	<rect x="48.416" y="6.177" fill="#FF0000" stroke="#000000" stroke-miterlimit="10" width="36" height="36"/>\r\n	<polygon fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" points="66.433,24.177 66.433,24.177 49.041,6.177 83.791,6.177 	\r\n		"/>\r\n</g>\r\n<g>\r\n	<rect x="90.592" y="6.177" fill="#40A629" stroke="#000000" stroke-miterlimit="10" width="36" height="36"/>\r\n	<polygon fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" points="108.61,24.333 108.61,24.333 91.218,6.333 125.968,6.333 \r\n			"/>\r\n</g>\r\n<g>\r\n	<rect x="133.449" y="6.177" fill="#808080" stroke="#000000" stroke-miterlimit="10" width="36" height="36"/>\r\n	<polygon fill="#FFFFFF" stroke="#000000" stroke-miterlimit="10" points="151.466,24.333 151.466,24.333 134.074,6.333 \r\n		168.824,6.333 	"/>\r\n</g>\r\n</svg>\r\n'),
(4, 'Ручной извещатель', '-', '<?xml version="1.0" encoding="utf-8"?>\r\n<!-- Generator: Adobe Illustrator 15.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->\r\n<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">\r\n<svg version="1.1" id="РЎР»РѕР№_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"\r\n	 width="175.517px" height="48.667px" viewBox="0 0 175.517 48.667" enable-background="new 0 0 175.517 48.667"\r\n	 xml:space="preserve">\r\n<g>\r\n	<rect x="7.517" y="6.177" fill="#FF8000" stroke="#000000" stroke-miterlimit="10" width="36" height="36"/>\r\n	<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="7.517" y1="6.177" x2="25.517" y2="24.177"/>\r\n	<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="25.517" y1="24.177" x2="43.517" y2="6.177"/>\r\n	<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="25.517" y1="24.177" x2="25.517" y2="41.875"/>\r\n</g>\r\n<g>\r\n	<rect x="48.416" y="6.177" fill="#FF0000" stroke="#000000" stroke-miterlimit="10" width="36" height="36"/>\r\n	<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="48.416" y1="6.329" x2="66.416" y2="24.329"/>\r\n	<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="66.416" y1="24.329" x2="84.416" y2="6.329"/>\r\n	<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="66.416" y1="24.329" x2="66.416" y2="42.026"/>\r\n</g>\r\n<g>\r\n	<rect x="90.592" y="6.177" fill="#40A629" stroke="#000000" stroke-miterlimit="10" width="36" height="36"/>\r\n	<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="91.076" y1="6.924" x2="109.076" y2="24.924"/>\r\n	<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="109.076" y1="24.924" x2="127.076" y2="6.924"/>\r\n	<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="109.076" y1="24.924" x2="109.076" y2="42.622"/>\r\n</g>\r\n<g>\r\n	<rect x="133.449" y="6.177" fill="#808080" stroke="#000000" stroke-miterlimit="10" width="36" height="36"/>\r\n	<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="133.938" y1="6.484" x2="151.938" y2="24.484"/>\r\n	<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="151.938" y1="24.484" x2="169.938" y2="6.484"/>\r\n	<line fill="none" stroke="#000000" stroke-miterlimit="10" x1="151.938" y1="24.484" x2="151.938" y2="42.182"/>\r\n</g>\r\n</svg>\r\n');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `email`, `enterprise_id`, `role`, `lastLoginTime`) VALUES
(1, 'admin', '$2a$13$aoktYifNWSm6m4Hod3pJGe9s1QYOxhWbucZEIWiMNudCxnLq1V62K', 'admin@mail.ru', 3, 'admin', '0000-00-00 00:00:00'),
(2, 'user1', '$2a$13$L1EPZNxOeilL2N7/5CFDY.WG/0RijLHzHHtbJZe9qIct7i0Ka2OhG', 'user1@mail.ru', 0, 'root', '2014-09-28 16:22:20'),
(3, 'user2', '$2a$13$s5ua.Oc3KG/wgZsn21J6A.kWOYv/az9rXivobI0i6l1F03yE/Lf0C', 'user@mail.ru', 2, 'user', '0000-00-00 00:00:00'),
(5, 'user3', '$2a$13$C6BwvqE3bkm/t2khxIkq8.Gikc6n2dp4v8w6U8pgCfjaO0Pw9C/GG', '1234', NULL, 'user', '0000-00-00 00:00:00'),
(6, 'sadasd', '$2a$13$ARrI/c.RoTlLfUzq4N8yH.VknB7qV6RUQvghHkfJiwk4nAEeYn9uq', 'asdas@mail.ru', 2, 'admin', '0000-00-00 00:00:00'),
(7, 'asdasd', '$2a$13$CmrW3lAGjFg5UXi75xKWS.MNPBdJ8O5gQVIlL9psFZWCEkz06rrNO', 'asdsa', NULL, 'user', '0000-00-00 00:00:00'),
(9, 'demo', '$2a$13$jvH2j8HxSoWxk05aTXfLC.w3TIu1kcIlc0CywyYMFxrgfFa4SyKge', '1234@mail.ru', NULL, 'root', '0000-00-00 00:00:00');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD CONSTRAINT `tbl_events_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `tbl_level` (`id`),
  ADD CONSTRAINT `tbl_events_ibfk_2` FOREIGN KEY (`sensor_id`) REFERENCES `tbl_sensor` (`id`),
  ADD CONSTRAINT `tbl_events_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`);

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
