-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Сен 04 2014 г., 16:41
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
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `tbl_enterprise`
--

INSERT INTO `tbl_enterprise` (`id`, `title`, `address`, `info`, `e_lng`, `e_lat`, `user_id`) VALUES
(1, 'Центравис', 'г.Никополь', 'АСРВО', 0, 0, 1),
(2, 'Никотьюб', 'Никополь', 'Нержавейка', 0, 0, 0),
(3, 'Титан', 'г. Никополь', 'Титановые трубы', 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `enterprise_id` int(11) NOT NULL,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `email`, `enterprise_id`, `role`) VALUES
(1, 'admin', '$2a$13$aoktYifNWSm6m4Hod3pJGe9s1QYOxhWbucZEIWiMNudCxnLq1V62K', 'admin@mail.ru', 3, 'admin'),
(2, 'user1', '$2a$13$L1EPZNxOeilL2N7/5CFDY.WG/0RijLHzHHtbJZe9qIct7i0Ka2OhG', 'user1@mail.ru', 0, 'root'),
(3, 'user2', '$2a$13$s5ua.Oc3KG/wgZsn21J6A.kWOYv/az9rXivobI0i6l1F03yE/Lf0C', 'user@mail.ru', 2, 'user'),
(5, 'user3', '$2a$13$C6BwvqE3bkm/t2khxIkq8.Gikc6n2dp4v8w6U8pgCfjaO0Pw9C/GG', '1234', 0, 'user'),
(6, 'sadasd', '$2a$13$ARrI/c.RoTlLfUzq4N8yH.VknB7qV6RUQvghHkfJiwk4nAEeYn9uq', 'asdas@mail.ru', 2, 'admin'),
(7, 'asdasd', '$2a$13$CmrW3lAGjFg5UXi75xKWS.MNPBdJ8O5gQVIlL9psFZWCEkz06rrNO', 'asdsa', 0, 'user'),
(9, 'demo', '$2a$13$jvH2j8HxSoWxk05aTXfLC.w3TIu1kcIlc0CywyYMFxrgfFa4SyKge', '1234@mail.ru', 0, 'root');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
