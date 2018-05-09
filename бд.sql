-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 09 2018 г., 12:37
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
(211, 2013, 2),
(212, 2011, 3);

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

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`id`, `name`, `lastname`, `father`, `group_num`, `speciality`, `birthdate`, `phone`, `registration`, `dormitory`, `residence`, `grouphealth`, `disability`, `kdn`, `class`, `midmark`, `work`, `hobby`, `family`, `security`, `lowincome`, `children`, `socialrisk`, `father_name`, `f_pensioner`, `f_work`, `f_workplace`, `f_phone`, `f_address`, `mother_name`, `m_pensioner`, `m_work`, `m_workplace`, `m_phone`, `m_address`, `guardian_name`, `g_pensioner`, `g_work`, `g_workplace`, `g_phone`, `g_address`) VALUES
(4, 'Кен', 'Толиров', 'Кураптович', 211, 'Дошкольное образование', '2018-05-19', '89637442114', '4', 1, 'ул. Мурманская, д. 4, кв. 3', 'II', 0, 0, '9', '54', '4', '4', 'Полная', 'Опекун', 0, 0, 1, '4', 0, 0, '4', '4', '4', '4', 0, 0, '4', '4', '4', '4', 0, 1, '4', '4', '4'),
(5, 'Евгений', 'Дуров', 'Петрович', 211, 'Дошкольное образование', '2018-05-09', '8911559193', '5', 1, 'ул. Молоторная, д. 4, кв. 24', 'II', 0, 0, '9', '5', '5', '5', 'Полная', 'Гос.обеспечение', 0, 0, 0, '5', 0, 0, '5', '5', '5', '5', 0, 0, '5', '5', '5', '5', 1, 0, '5', '5', '5'),
(6, 'Кувеев', 'Третьяк', 'Морозович', 212, 'Физическая культура', '2018-05-12', '89637044154', '43', 0, 'ул. Малохольного, д. 2, кв. 24', 'II', 1, 0, '11', '4', '43', '3', 'Неполная', 'Опекун', 0, 0, 0, '43', 0, 0, '3', '3', '3', '3', 1, 1, '3', '3', '3', '3', 0, 0, '3', '3', '3'),
(7, 'Геога', 'Маога', 'Литрач', 212, 'Прикладная информатика', '2018-05-19', '8911441155', '5', 0, 'ул. Петрова, д. 4, кв. 14', 'II', 0, 0, '11', '5', '5', '5', 'Неполная', 'Опекун', 0, 0, 0, '5', 0, 1, '5', '5', '5', '5', 0, 1, '5', '5', '5', '5', 0, 0, '5', '5', '5'),
(8, 'Алла', 'Трунова', 'Машоновна', 211, 'Физическая культура', '2018-05-02', '89637424449', 'ул. Кирова, д. 4, кв. 24', 0, 'ул. Кирова, д. 4, кв. 24', 'I', 1, 0, '11', '3.6', '5', '5', 'Полная', 'Гос.обеспечение', 0, 1, 0, '5', 1, 0, '5', '5', '5', '5', 0, 0, '5', '5', '5', '5', 0, 0, '5', '5', '5');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`uid`, `username`, `pass`, `admin`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'qwer', '962012d09b8170d912f0669f6d7d9d07', 0),
(3, 'asdf', '912ec803b2ce49e4a541068d495ab570', 0);

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
  MODIFY `g_name` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
