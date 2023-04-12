-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Апр 12 2023 г., 09:27
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
  `name` varchar(50) NOT NULL,
  `experience` enum('Нет опыта','Меньше года','Больше года') NOT NULL,
  `os` enum('Windows','MacOS','Linux') NOT NULL,
  `learn` set('php','mysql','js','git') NOT NULL,
  `about` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `forms`
--

INSERT INTO `forms` (`id`, `user_id`, `name`, `experience`, `os`, `learn`, `about`, `created_at`) VALUES
(25, 19, 'User', 'Нет опыта', 'Windows', 'php,mysql,js,git', 'Wanna learn everything', '2023-04-12 11:22:12'),
(26, 20, 'Vlad', 'Больше года', 'MacOS', 'php', 'Average php enjoyer', '2023-04-12 11:23:34'),
(27, 21, 'Python Enjoyer', 'Нет опыта', 'Windows', 'git', 'Excuse me...but where\'s python?', '2023-04-12 11:24:53'),
(28, 18, 'Test', 'Меньше года', 'Windows', 'php', '', '2023-04-12 11:26:45');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(18, 'admin@admin.com', '$2y$10$ZxtKn2m79JLciZA.NNENF.5o.ujE9e4RyNsE1ZmvyLRze3S/vdqRy'),
(19, 'user@user.com', '$2y$10$rjtb3A321gYD9OcHWxFQsev5vypYGhkpKHk4Wh3rwN17PLXlwddg.'),
(20, 'averagephp@enjoyer.com', '$2y$10$6VtC3dCoGcE6zwrMz5D1X.0ReR.jDU1fzC2SbTCDISS//syJPyKsu'),
(21, 'typicalpython@fan.net', '$2y$10$ELWXe9qDt/DlOaUR2nrHvuYJdifaI7DVRO9kyo.DD8/0CbAkw9Ys2');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forms_ibfk_1` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `forms`
--
ALTER TABLE `forms`
  ADD CONSTRAINT `forms_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
