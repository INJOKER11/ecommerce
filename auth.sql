-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 04 2022 г., 02:31
-- Версия сервера: 5.7.33-log
-- Версия PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `auth`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_login` varchar(355) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(355) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `admin_login`, `admin_password`) VALUES
(1, 'admin_pasha@gmail.com', '123');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `product_img` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(355) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_cost` varchar(355) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(355) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `full_name`, `login`, `email`, `password`, `avatar`) VALUES
(4, 'Антон Антон Антон', 'Sm1le1332', 'mig20047@gmail.com', '202cb962ac59075b964b07152d234b70', 'uploads/1644781342Без названия.jfif'),
(5, 'Антон Антон Антон', 'sm1le13362', 'mig20047@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'uploads/1644782124Без названия.jfif'),
(6, 'ФИО', 'Логин', 'ikf2003@gmail.com', '9fefa76864f6672fb2c3ea3abaa1685d', 'uploads/1644783063Без названия.jfif'),
(7, 'fgh', 'lik', 'd@g.com', 'c4ca4238a0b923820dcc509a6f75849b', 'uploads/1644783314Без названия.jfif'),
(8, 'Антон Антон Антон', '1234', 'mig20047@gmail.com', '202cb962ac59075b964b07152d234b70', 'uploads/1644783682Без названия.jfif'),
(9, 'Антон Антон Антон', 'qwerty', 'mig20047@gmail.com', '202cb962ac59075b964b07152d234b70', 'uploads/1644784193Без названия.jfif'),
(10, 'Головач Лена', 'Нигол', 'golovachtoprabotnik@gmail.com', '8fa14cdd754f91cc6554c9e71929cce7', 'uploads/1644784832Без названия.jfif');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
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
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
