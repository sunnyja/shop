-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Июн 29 2019 г., 19:51
-- Версия сервера: 5.6.41
-- Версия PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(3) NOT NULL,
  `id_tov` int(3) NOT NULL,
  `id_cli` int(5) NOT NULL,
  `count` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` int(3) NOT NULL,
  `cl_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `oplata` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `cl_name`, `user_name`, `tel`, `address`, `oplata`) VALUES
(12, 'Иванов Сергей', '', '79856321232', 'г.Москва, ул.Цветочная, д.6, кв.3', 'безналичная оплата'),
(13, 'Петров Андрей', '', '76541239875', 'г.Санкт-Петербург, ул.Центральная, д.8', 'при получении товара'),
(14, 'Смирнов Иван', 'user1', '75554443322', 'г.Москва, ул. Ленина, д.26, кв 56', 'безналичная оплата'),
(20, 'Смирнов Иван', 'user1', '75554443322', 'г.Москва, ул.Ленина, д.26, кв.56', 'безналичная оплата'),
(21, 'Иванов Константин', 'user2', '78889994455', 'г.Уфа, проспект Мира, д.56, кв.8', 'при получении товара');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(5) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `articul` int(10) NOT NULL,
  `opis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(10) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `articul`, `opis`, `price`, `image`) VALUES
(1, 'Акустическая система Hi-Fi Elac Debut C5', 1063161, '[центр 1 шт., корпус - MDF, 120 Вт, 48 Гц - 20 кГц, 6 Ом]', 8399, 'img/1.jpg'),
(2, 'Акустическая система Hi-Fi Yamaha NS-P60', 1202650, '[тыл 2 шт., центр 1 шт., корпус - MDF, 330 Вт, 70 Гц - 30 кГц, 6Ω]', 8999, 'img/2.jpg'),
(3, 'Акустическая система Hi-Fi Yamaha NS-6490', 1119573, '[фронт 2 шт., корпус - MDF, 140 Вт, 45 Гц - 23 кГц, 8Ω]', 9999, 'img/3.jpg'),
(4, 'Акустическая система Hi-Fi Yamaha NS-P160', 1137688, '[тыл 2 шт., центр 1 шт., корпус - MDF, 140 Вт, 60 Гц - 38 кГц, 6Ω]', 9999, 'img/4.jpg'),
(5, 'Акустическая система Hi-Fi Jamo S 801', 1234799, '[тыл 2 шт., корпус - MDF, 120 Вт, 76 Гц - 26 кГц, 8Ω]', 10999, 'img/5.jpg'),
(6, 'Акустическая система Hi-Fi Jamo S 81', 1234802, '[центр 1 шт., корпус - MDF, 120 Вт, 71 Гц - 26 кГц, 8Ω]', 10999, 'img/6.jpg'),
(7, 'Акустическая система Hi-Fi JBL Stage A120', 1316162, '[фронт 2 шт., корпус - MDF, 125 Вт, 60 Гц - 40 кГц, 6Ω]', 11799, 'img/7.jpg'),
(8, 'Акустическая система Hi-Fi Yamaha NS-C444', 6709725, '[центр 1 шт., корпус - MDF, 250 Вт, 55 Гц - 35 кГц, 6Ω]', 11999, 'img/8.jpg'),
(9, 'Акустическая система Hi-Fi JBL Stage A130', 1316165, '[фронт 2 шт., корпус - MDF, 125 Вт, 55 Гц - 40 кГц, 6Ω]', 13799, 'img/9.jpg'),
(10, 'Акустическая система Hi-Fi Yamaha NS-F51', 1119666, '[фронт 2 шт., корпус - MDF, 240 Вт, 43 Гц - 26 кГц, 6Ω]', 15999, 'img/10.jpg'),
(11, 'Акустическая система Hi-Fi Yamaha NS-333', 6677799, '[тыл 2 шт., корпус - MDF, 150 Вт, 60 Гц - 35 кГц, 6 Ом]', 18999, 'img/11.jpg'),
(12, 'Акустическая система Hi-Fi Yamaha NS-F150', 1137681, '[фронт 2 шт., корпус - MDF, 180 Вт, 37 Гц - 30 кГц, 6Ω]', 18999, 'img/12.jpg'),
(13, 'Акустическая система Hi-Fi Elac С5.2', 1294569, '[центр 1 шт., корпус - MDF, 120 Вт, 55 Гц - 35 кГц, 8 Ом]', 20499, 'img/13.jpg'),
(14, 'Акустическая система Hi-Fi Atmos Elac A4.2', 1294573, '[фронт 2 шт., корпус - MDF, 80 Вт, 180 Гц - 20 кГц, 6Ω]', 23499, 'img/14.jpg'),
(15, 'Акустическая система Hi-Fi Elac B5.2', 1294562, '[фронт 2 шт., корпус - MDF, 120 Вт, 46 Гц - 35 кГц, 6Ω]', 24999, 'img/15.jpg'),
(16, 'Акустическая система Hi-Fi Elac OW4.2', 1294571, '[фронт 2 шт., корпус - MDF, 80 Вт, 70 Гц - 35 кГц, 6 Ом]', 24999, 'img/16.jpg'),
(17, 'Акустическая система Hi-Fi Elac С6.2', 1294568, '[центр 1 шт., корпус - MDF, 120 Вт, 55 Гц - 35 кГц, 8Ω]', 27999, 'img/17.jpg'),
(18, 'Акустическая система Hi-Fi Magnat Tempus 55', 1197489, '[фронт 2 шт., корпус - MDF, 280 Вт, 24 Гц - 45 кГц, 8Ω]', 28999, 'img/18.jpg'),
(19, 'Акустическая система Hi-Fi Yamaha NS-F160', 1137682, '[фронт 2 шт., корпус - MDF, 300 Вт, 30 Гц - 36 кГц, 6Ω]', 28999, 'img/19.jpg'),
(20, 'Акустическая система Hi-Fi Elac B6.2', 1294557, '[фронт 2 шт., корпус - MDF, 120 Вт, 44 Гц - 35 кГц, 6 Ом]', 29499, 'img/20.jpg'),
(21, 'Акустическая система Hi-Fi JBL Stage A170', 1316167, '[фронт 2 шт., корпус - MDF, 200 Вт, 44 Гц - 40 кГц, 6 Ом]', 29999, 'img/21.jpg'),
(22, 'Акустическая система Hi-Fi Elac Debut F6', 1063158, '[фронт 2 шт., корпус - MDF, 150 Вт, 39 Гц - 20 кГц, 6Ω]', 33999, 'img/22.jpg'),
(23, 'Акустическая система Hi-Fi JBL Stage A180', 1316168, '[фронт 2 шт., корпус - MDF, 225 Вт, 40 Гц - 40 кГц, 6Ω]', 39999, 'img/23.jpg'),
(24, 'Акустическая система Hi-Fi Yamaha NS-555', 6677800, '[фронт 2 шт., корпус - MDF, 250 Вт, 35 Гц - 35 кГц, 6 Ом]', 39999, 'img/24.jpg'),
(25, 'Акустическая система Hi-Fi Boston Acoustics CS260', 1082509, '[тыл 2 шт., центр 1 шт., фронт 2 шт., корпус - MDF, 575 Вт, 46 Гц - 25 кГц, 8Ω]', 41999, 'img/25.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(3) NOT NULL,
  `id_tov` int(3) NOT NULL,
  `id_cli` int(5) NOT NULL,
  `user_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` int(3) NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `id_tov`, `id_cli`, `user_name`, `count`, `status`) VALUES
(1, 1, 12, '', 1, 'в работе'),
(2, 6, 13, '', 1, 'ожидает обработки'),
(3, 7, 13, '', 2, 'ожидает обработки'),
(4, 3, 14, 'user1', 2, 'в работе'),
(7, 9, 20, 'user1', 1, 'выполнено'),
(8, 9, 21, 'user2', 1, 'в работе');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `login` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`) VALUES
(2, 'admin', '202cb962ac59075b964b07152d234b70'),
(3, 'user1', '202cb962ac59075b964b07152d234b70'),
(4, 'user2', '202cb962ac59075b964b07152d234b70');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
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
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
