-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 10 2018 г., 08:26
-- Версия сервера: 10.1.31-MariaDB
-- Версия PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `lich`
--

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `g_name` int(3) NOT NULL,
  `g_year` int(4) NOT NULL,
  `g_curator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`g_name`, `g_year`, `g_curator`) VALUES
(201, 2011, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `father` varchar(40) NOT NULL,
  `group_num` int(11) NOT NULL,
  `speciality` varchar(40) NOT NULL,
  `birthdate` date NOT NULL,
  `phone` varchar(12) NOT NULL,
  `registration` varchar(40) NOT NULL,
  `dormitory` tinyint(1) NOT NULL,
  `residence` varchar(40) NOT NULL,
  `grouphealth` varchar(3) NOT NULL,
  `disability` tinyint(1) NOT NULL,
  `kdn` tinyint(1) NOT NULL,
  `class` varchar(2) NOT NULL,
  `midmark` varchar(4) NOT NULL,
  `work` varchar(40) NOT NULL,
  `hobby` varchar(40) NOT NULL,
  `family` varchar(11) NOT NULL,
  `security` varchar(20) NOT NULL,
  `lowincome` tinyint(1) NOT NULL,
  `children` tinyint(1) NOT NULL,
  `socialrisk` tinyint(1) NOT NULL,
  `father_name` varchar(40) NOT NULL,
  `f_pensioner` tinyint(1) NOT NULL,
  `f_work` tinyint(1) NOT NULL,
  `f_workplace` varchar(40) NOT NULL,
  `f_phone` varchar(12) NOT NULL,
  `f_address` varchar(40) NOT NULL,
  `mother_name` varchar(40) NOT NULL,
  `m_pensioner` tinyint(1) NOT NULL,
  `m_work` tinyint(1) NOT NULL,
  `m_workplace` varchar(40) NOT NULL,
  `m_phone` varchar(12) NOT NULL,
  `m_address` varchar(40) NOT NULL,
  `guardian_name` varchar(40) NOT NULL,
  `g_pensioner` tinyint(1) NOT NULL,
  `g_work` tinyint(1) NOT NULL,
  `g_workplace` varchar(40) NOT NULL,
  `g_phone` varchar(12) NOT NULL,
  `g_address` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`uid`, `username`, `pass`, `admin`) VALUES
(1, 'admin', '$2y$10$DnEVlvS8ZMM4mXa1sOXx7ulMBzAikTCMMBa0z96GmlS4I0WAs9uWC', 1),
(2, 'qwer', '$2y$10$EsKDDxziJLS9JAjdA/AOo.3Pbvc4W9DJB6X5PTsY1a5KGtWRUTlWG', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`g_name`),
  ADD KEY `g_curator` (`g_curator`);

--
-- Индексы таблицы `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_num` (`group_num`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `g_name` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;

--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`g_curator`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`group_num`) REFERENCES `groups` (`g_name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
