-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 18 2018 г., 20:40
-- Версия сервера: 5.6.38
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mvc`
--

-- --------------------------------------------------------

--
-- Структура таблицы `files`
--

CREATE TABLE `files` (
  `id` int(10) UNSIGNED NOT NULL,
  `userid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `filepath` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `files`
--

INSERT INTO `files` (`id`, `userid`, `file`, `filepath`) VALUES
(4, '1', 'burger.png', 'C:/OSPanel/domains/mvc/images/burger.png'),
(8, '1', 'teammate.jpg', 'C:/OSPanel/domains/mvc/images/teammate.jpg'),
(9, '1', '1.png', 'C:/OSPanel/domains/mvc/images/1.png'),
(10, '1', '4.png', 'C:/OSPanel/domains/mvc/images/4.png'),
(11, '1', '3.png', 'C:/OSPanel/domains/mvc/images/3.png'),
(12, '1', '3.png', 'C:/OSPanel/domains/mvc/images/3.png'),
(13, '1', '3.png', 'C:/OSPanel/domains/mvc/images/3.png'),
(14, '1', '3.png', 'C:/OSPanel/domains/mvc/images/3.png'),
(15, '1', '3.png', 'C:/OSPanel/domains/mvc/images/3.png'),
(16, '1', '', 'C:/OSPanel/domains/mvc/images/'),
(17, '1', '1.png', 'C:/OSPanel/domains/mvc/images/1.png');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Пользователь',
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatarURL` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `info` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Не указано'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `password`, `age`, `avatar`, `avatarURL`, `info`) VALUES
(1, 'Илья123', 'ikustow@yandex.ru', '28', 28, 'HzWMbiIA4o4.jpg', 'lhkjghkb', '13123'),
(5, 'Илья', 'admin', 'admin', 0, '', '', ''),
(6, 'Илья', 'ikstow@yandex.', 'admin', 0, '', '', ''),
(7, 'Илья123', 'ikustow@yandex.r', '28', 28, NULL, NULL, '13123');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
