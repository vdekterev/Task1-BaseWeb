-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 11 2023 г., 19:04
-- Версия сервера: 10.4.27-MariaDB
-- Версия PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `task1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `forms`
--

CREATE TABLE `forms` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `experience` enum('Нет опыта','Меньше года','Больше года') NOT NULL,
  `os` enum('Windows','MacOS','Linux') NOT NULL,
  `learn` set('php','mysql','js','git') NOT NULL,
  `about` varchar(512) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `forms`
--

INSERT INTO `forms` (`id`, `user_id`, `name`, `experience`, `os`, `learn`, `about`, `created_at`) VALUES
(0, 41, 'Vlad', 'Больше года', 'MacOS', 'php,mysql', '', '2023-04-11 00:00:00'),
(0, 41, 'Vladislav', 'Больше года', 'Linux', 'php,mysql,js,git', 'New Form', '2023-04-11 00:00:00'),
(0, 41, 'Vladislav', 'Больше года', 'Linux', 'php,mysql,js,git', 'New Form 2', '2023-04-11 21:01:15');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(41, 'vlad.decterev@icloud.com', '$2y$10$UBG1EJF8.ZnL8TNciam0bukHdRQT.5F5RlbKddHkRw8TFGNCJ6BgG'),
(53, 'vlad.decterev@icloud.com32', '$2y$10$ROkr8TgPjj.0gcFM0gcb7.wfG.GzeG8CFYLz6E4lqaAnslVe.IroK');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_pk` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
