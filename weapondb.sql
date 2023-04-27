-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 27 2023 г., 21:22
-- Версия сервера: 10.4.25-MariaDB
-- Версия PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `weapondb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `types`
--

CREATE TABLE `types` (
  `id` int(45) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `types`
--

INSERT INTO `types` (`id`, `name`) VALUES
(1, 'dsadad'),
(2, 'sadadadsa');

-- --------------------------------------------------------

--
-- Структура таблицы `weapons`
--

CREATE TABLE `weapons` (
  `id` int(45) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_type` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `cost` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `weapons`
--

INSERT INTO `weapons` (`id`, `name`, `id_type`, `description`, `cost`) VALUES
(1, 'dsaddsa', 1, 'sadada', 2000),
(2, 'dsadadsa', 2, 'dsadsada', 3000);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `weapons`
--
ALTER TABLE `weapons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type` (`id_type`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `types`
--
ALTER TABLE `types`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `weapons`
--
ALTER TABLE `weapons`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `weapons`
--
ALTER TABLE `weapons`
  ADD CONSTRAINT `weapons_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
