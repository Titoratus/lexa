-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Хост: sql303.byethost.com
-- Время создания: Апр 29 2018 г., 07:46
-- Версия сервера: 5.6.35-81.0
-- Версия PHP: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `b7_19728308_lich`
--

-- --------------------------------------------------------

--
-- Структура таблицы `111_2015`
--

CREATE TABLE IF NOT EXISTS `111_2015` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(40) DEFAULT NULL,
  `LastName` varchar(40) DEFAULT NULL,
  `Otchestvo` varchar(40) DEFAULT NULL,
  `NumberGroup` varchar(3) DEFAULT NULL,
  `Specialnost` varchar(40) DEFAULT NULL,
  `BirthDate` varchar(40) DEFAULT NULL,
  `Phone` varchar(12) DEFAULT NULL,
  `Propiska` varchar(40) DEFAULT NULL,
  `Obshaga` varchar(10) DEFAULT NULL,
  `Progivaet` varchar(50) DEFAULT NULL,
  `GroupHealth` varchar(30) DEFAULT NULL,
  `Invalidnost` varchar(10) DEFAULT NULL,
  `KDN` varchar(10) DEFAULT NULL,
  `Class` varchar(10) DEFAULT NULL,
  `SrBallAt` varchar(5) DEFAULT NULL,
  `Rabota` varchar(50) DEFAULT NULL,
  `Hobbi` varchar(50) DEFAULT NULL,
  `Family` varchar(50) DEFAULT NULL,
  `Obespechenie` varchar(50) DEFAULT NULL,
  `Maloobespech` varchar(50) DEFAULT NULL,
  `Mnogodet` varchar(50) DEFAULT NULL,
  `Socialrisk` varchar(50) DEFAULT NULL,
  `FIOFather` varchar(50) DEFAULT NULL,
  `FPensioner` varchar(10) DEFAULT NULL,
  `FRabota` varchar(10) DEFAULT NULL,
  `FMestoR` varchar(50) DEFAULT NULL,
  `FPhoner` varchar(12) DEFAULT NULL,
  `FAdres` varchar(50) DEFAULT NULL,
  `FIOMother` varchar(50) DEFAULT NULL,
  `MPensioner` varchar(10) DEFAULT NULL,
  `MRabota` varchar(10) DEFAULT NULL,
  `MMestoR` varchar(50) DEFAULT NULL,
  `MPhoner` varchar(12) DEFAULT NULL,
  `MAdres` varchar(50) DEFAULT NULL,
  `FIOOpekun` varchar(50) DEFAULT NULL,
  `OPensioner` varchar(10) DEFAULT NULL,
  `ORabota` varchar(10) DEFAULT NULL,
  `OMestoR` varchar(50) DEFAULT NULL,
  `OPhoner` varchar(12) DEFAULT NULL,
  `OAdres` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `111_2015`
--

INSERT INTO `111_2015` (`id`, `FirstName`, `LastName`, `Otchestvo`, `NumberGroup`, `Specialnost`, `BirthDate`, `Phone`, `Propiska`, `Obshaga`, `Progivaet`, `GroupHealth`, `Invalidnost`, `KDN`, `Class`, `SrBallAt`, `Rabota`, `Hobbi`, `Family`, `Obespechenie`, `Maloobespech`, `Mnogodet`, `Socialrisk`, `FIOFather`, `FPensioner`, `FRabota`, `FMestoR`, `FPhoner`, `FAdres`, `FIOMother`, `MPensioner`, `MRabota`, `MMestoR`, `MPhoner`, `MAdres`, `FIOOpekun`, `OPensioner`, `ORabota`, `OMestoR`, `OPhoner`, `OAdres`) VALUES
(2, 'Алексей', '', '', '', 'Дошкольное образование', '1999-01-18', '', '', 'checked', '', 'I', '', '', '9', '', '', '', 'Полная', 'Гос.обеспечение', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `112_2014`
--

CREATE TABLE IF NOT EXISTS `112_2014` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(40) DEFAULT NULL,
  `LastName` varchar(40) DEFAULT NULL,
  `Otchestvo` varchar(40) DEFAULT NULL,
  `NumberGroup` varchar(3) DEFAULT NULL,
  `Specialnost` varchar(40) DEFAULT NULL,
  `BirthDate` varchar(40) DEFAULT NULL,
  `Phone` varchar(12) DEFAULT NULL,
  `Propiska` varchar(40) DEFAULT NULL,
  `Obshaga` varchar(10) DEFAULT NULL,
  `Progivaet` varchar(50) DEFAULT NULL,
  `GroupHealth` varchar(30) DEFAULT NULL,
  `Invalidnost` varchar(10) DEFAULT NULL,
  `KDN` varchar(10) DEFAULT NULL,
  `Class` varchar(10) DEFAULT NULL,
  `SrBallAt` varchar(5) DEFAULT NULL,
  `Rabota` varchar(50) DEFAULT NULL,
  `Hobbi` varchar(50) DEFAULT NULL,
  `Family` varchar(50) DEFAULT NULL,
  `Obespechenie` varchar(50) DEFAULT NULL,
  `Maloobespech` varchar(50) DEFAULT NULL,
  `Mnogodet` varchar(50) DEFAULT NULL,
  `Socialrisk` varchar(50) DEFAULT NULL,
  `FIOFather` varchar(50) DEFAULT NULL,
  `FPensioner` varchar(10) DEFAULT NULL,
  `FRabota` varchar(10) DEFAULT NULL,
  `FMestoR` varchar(50) DEFAULT NULL,
  `FPhoner` varchar(12) DEFAULT NULL,
  `FAdres` varchar(50) DEFAULT NULL,
  `FIOMother` varchar(50) DEFAULT NULL,
  `MPensioner` varchar(10) DEFAULT NULL,
  `MRabota` varchar(10) DEFAULT NULL,
  `MMestoR` varchar(50) DEFAULT NULL,
  `MPhoner` varchar(12) DEFAULT NULL,
  `MAdres` varchar(50) DEFAULT NULL,
  `FIOOpekun` varchar(50) DEFAULT NULL,
  `OPensioner` varchar(10) DEFAULT NULL,
  `ORabota` varchar(10) DEFAULT NULL,
  `OMestoR` varchar(50) DEFAULT NULL,
  `OPhoner` varchar(12) DEFAULT NULL,
  `OAdres` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `123_2014`
--

CREATE TABLE IF NOT EXISTS `123_2014` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(40) DEFAULT NULL,
  `LastName` varchar(40) DEFAULT NULL,
  `Otchestvo` varchar(40) DEFAULT NULL,
  `NumberGroup` varchar(3) DEFAULT NULL,
  `Specialnost` varchar(40) DEFAULT NULL,
  `BirthDate` varchar(40) DEFAULT NULL,
  `Phone` varchar(12) DEFAULT NULL,
  `Propiska` varchar(40) DEFAULT NULL,
  `Obshaga` varchar(10) DEFAULT NULL,
  `Progivaet` varchar(50) DEFAULT NULL,
  `GroupHealth` varchar(30) DEFAULT NULL,
  `Invalidnost` varchar(10) DEFAULT NULL,
  `KDN` varchar(10) DEFAULT NULL,
  `Class` varchar(10) DEFAULT NULL,
  `SrBallAt` varchar(5) DEFAULT NULL,
  `Rabota` varchar(50) DEFAULT NULL,
  `Hobbi` varchar(50) DEFAULT NULL,
  `Family` varchar(50) DEFAULT NULL,
  `Obespechenie` varchar(50) DEFAULT NULL,
  `Maloobespech` varchar(50) DEFAULT NULL,
  `Mnogodet` varchar(50) DEFAULT NULL,
  `Socialrisk` varchar(50) DEFAULT NULL,
  `FIOFather` varchar(50) DEFAULT NULL,
  `FPensioner` varchar(10) DEFAULT NULL,
  `FRabota` varchar(10) DEFAULT NULL,
  `FMestoR` varchar(50) DEFAULT NULL,
  `FPhoner` varchar(12) DEFAULT NULL,
  `FAdres` varchar(50) DEFAULT NULL,
  `FIOMother` varchar(50) DEFAULT NULL,
  `MPensioner` varchar(10) DEFAULT NULL,
  `MRabota` varchar(10) DEFAULT NULL,
  `MMestoR` varchar(50) DEFAULT NULL,
  `MPhoner` varchar(12) DEFAULT NULL,
  `MAdres` varchar(50) DEFAULT NULL,
  `FIOOpekun` varchar(50) DEFAULT NULL,
  `OPensioner` varchar(10) DEFAULT NULL,
  `ORabota` varchar(10) DEFAULT NULL,
  `OMestoR` varchar(50) DEFAULT NULL,
  `OPhoner` varchar(12) DEFAULT NULL,
  `OAdres` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `123_2014`
--

INSERT INTO `123_2014` (`id`, `FirstName`, `LastName`, `Otchestvo`, `NumberGroup`, `Specialnost`, `BirthDate`, `Phone`, `Propiska`, `Obshaga`, `Progivaet`, `GroupHealth`, `Invalidnost`, `KDN`, `Class`, `SrBallAt`, `Rabota`, `Hobbi`, `Family`, `Obespechenie`, `Maloobespech`, `Mnogodet`, `Socialrisk`, `FIOFather`, `FPensioner`, `FRabota`, `FMestoR`, `FPhoner`, `FAdres`, `FIOMother`, `MPensioner`, `MRabota`, `MMestoR`, `MPhoner`, `MAdres`, `FIOOpekun`, `OPensioner`, `ORabota`, `OMestoR`, `OPhoner`, `OAdres`) VALUES
(1, 'Николай', 'Керитов', 'Дмитриевич', '141', 'Дошкольное образование', '2018-02-03', '89637425211', 'ул. Каруселина', 'checked', 'ул. Каруселина и очень длинный текст, чтобы показа', 'II', '', '', '9', '5', 'Есть', 'Нет', 'Полная', 'Гос.обеспечение', '', '', 'checked', '5', '', '', '5', '5', '5', '5', '', '', '5', '5', '5', '5', 'checked', '', '5', '5', '5'),
(2, 'Кир', 'Малеев', 'Ростиславович', '515', 'Изобразительное искусство и черчение', '2018-02-03', '5', 'ул. Ростислава', '', '5', 'II', 'checked', '', '9', '5', '5', '5', 'Неполная', 'Гос.обеспечение', '', 'checked', '', '5', '', '', '5', '5', '5', '5', '', '', '5', '5', '5', '5', '', '', '5', '5', '5'),
(3, 'Ивано', 'Меньшиков', 'Третентьевич', '411', 'Физическая культура', '1992-02-04', '89637429145', 'ул. Лекка, галактика Мурс', 'checked', 'ул. Лекка, галактика Мурс', 'II', '', '', '9', '5', 'офис Яндекс', 'Apple Inc.', 'Полная', 'Гос.обеспечение', '', '', 'checked', 'Неверов Александр Нетеньевич', '', 'checked', 'Древний Рим', '911', 'ул. Лекка, галактика Мурс', 'Неверов Александр Нетеньевич', '', 'checked', 'Древний Рим', 'Неверов Алек', 'ул. Лекка, галактика Мурс', 'Неверов Александр Нетеньевич', '', 'checked', 'Древний Рим', 'Неверов Алек', 'ул. Лекка, галактика Мурс');

-- --------------------------------------------------------

--
-- Структура таблицы `425_673`
--

CREATE TABLE IF NOT EXISTS `425_673` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(40) DEFAULT NULL,
  `LastName` varchar(40) DEFAULT NULL,
  `Otchestvo` varchar(40) DEFAULT NULL,
  `NumberGroup` varchar(3) DEFAULT NULL,
  `Specialnost` varchar(40) DEFAULT NULL,
  `BirthDate` varchar(40) DEFAULT NULL,
  `Phone` varchar(12) DEFAULT NULL,
  `Propiska` varchar(40) DEFAULT NULL,
  `Obshaga` varchar(10) DEFAULT NULL,
  `Progivaet` varchar(50) DEFAULT NULL,
  `GroupHealth` varchar(30) DEFAULT NULL,
  `Invalidnost` varchar(10) DEFAULT NULL,
  `KDN` varchar(10) DEFAULT NULL,
  `Class` varchar(10) DEFAULT NULL,
  `SrBallAt` varchar(5) DEFAULT NULL,
  `Rabota` varchar(50) DEFAULT NULL,
  `Hobbi` varchar(50) DEFAULT NULL,
  `Family` varchar(50) DEFAULT NULL,
  `Obespechenie` varchar(50) DEFAULT NULL,
  `Maloobespech` varchar(50) DEFAULT NULL,
  `Mnogodet` varchar(50) DEFAULT NULL,
  `Socialrisk` varchar(50) DEFAULT NULL,
  `FIOFather` varchar(50) DEFAULT NULL,
  `FPensioner` varchar(10) DEFAULT NULL,
  `FRabota` varchar(10) DEFAULT NULL,
  `FMestoR` varchar(50) DEFAULT NULL,
  `FPhoner` varchar(12) DEFAULT NULL,
  `FAdres` varchar(50) DEFAULT NULL,
  `FIOMother` varchar(50) DEFAULT NULL,
  `MPensioner` varchar(10) DEFAULT NULL,
  `MRabota` varchar(10) DEFAULT NULL,
  `MMestoR` varchar(50) DEFAULT NULL,
  `MPhoner` varchar(12) DEFAULT NULL,
  `MAdres` varchar(50) DEFAULT NULL,
  `FIOOpekun` varchar(50) DEFAULT NULL,
  `OPensioner` varchar(10) DEFAULT NULL,
  `ORabota` varchar(10) DEFAULT NULL,
  `OMestoR` varchar(50) DEFAULT NULL,
  `OPhoner` varchar(12) DEFAULT NULL,
  `OAdres` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `753_6268`
--

CREATE TABLE IF NOT EXISTS `753_6268` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(40) DEFAULT NULL,
  `LastName` varchar(40) DEFAULT NULL,
  `Otchestvo` varchar(40) DEFAULT NULL,
  `NumberGroup` varchar(3) DEFAULT NULL,
  `Specialnost` varchar(40) DEFAULT NULL,
  `BirthDate` varchar(40) DEFAULT NULL,
  `Phone` varchar(12) DEFAULT NULL,
  `Propiska` varchar(40) DEFAULT NULL,
  `Obshaga` varchar(10) DEFAULT NULL,
  `Progivaet` varchar(50) DEFAULT NULL,
  `GroupHealth` varchar(30) DEFAULT NULL,
  `Invalidnost` varchar(10) DEFAULT NULL,
  `KDN` varchar(10) DEFAULT NULL,
  `Class` varchar(10) DEFAULT NULL,
  `SrBallAt` varchar(5) DEFAULT NULL,
  `Rabota` varchar(50) DEFAULT NULL,
  `Hobbi` varchar(50) DEFAULT NULL,
  `Family` varchar(50) DEFAULT NULL,
  `Obespechenie` varchar(50) DEFAULT NULL,
  `Maloobespech` varchar(50) DEFAULT NULL,
  `Mnogodet` varchar(50) DEFAULT NULL,
  `Socialrisk` varchar(50) DEFAULT NULL,
  `FIOFather` varchar(50) DEFAULT NULL,
  `FPensioner` varchar(10) DEFAULT NULL,
  `FRabota` varchar(10) DEFAULT NULL,
  `FMestoR` varchar(50) DEFAULT NULL,
  `FPhoner` varchar(12) DEFAULT NULL,
  `FAdres` varchar(50) DEFAULT NULL,
  `FIOMother` varchar(50) DEFAULT NULL,
  `MPensioner` varchar(10) DEFAULT NULL,
  `MRabota` varchar(10) DEFAULT NULL,
  `MMestoR` varchar(50) DEFAULT NULL,
  `MPhoner` varchar(12) DEFAULT NULL,
  `MAdres` varchar(50) DEFAULT NULL,
  `FIOOpekun` varchar(50) DEFAULT NULL,
  `OPensioner` varchar(10) DEFAULT NULL,
  `ORabota` varchar(10) DEFAULT NULL,
  `OMestoR` varchar(50) DEFAULT NULL,
  `OPhoner` varchar(12) DEFAULT NULL,
  `OAdres` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `12333_4415`
--

CREATE TABLE IF NOT EXISTS `12333_4415` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(40) DEFAULT NULL,
  `LastName` varchar(40) DEFAULT NULL,
  `Otchestvo` varchar(40) DEFAULT NULL,
  `NumberGroup` varchar(3) DEFAULT NULL,
  `Specialnost` varchar(40) DEFAULT NULL,
  `BirthDate` varchar(40) DEFAULT NULL,
  `Phone` varchar(12) DEFAULT NULL,
  `Propiska` varchar(40) DEFAULT NULL,
  `Obshaga` varchar(10) DEFAULT NULL,
  `Progivaet` varchar(50) DEFAULT NULL,
  `GroupHealth` varchar(30) DEFAULT NULL,
  `Invalidnost` varchar(10) DEFAULT NULL,
  `KDN` varchar(10) DEFAULT NULL,
  `Class` varchar(10) DEFAULT NULL,
  `SrBallAt` varchar(5) DEFAULT NULL,
  `Rabota` varchar(50) DEFAULT NULL,
  `Hobbi` varchar(50) DEFAULT NULL,
  `Family` varchar(50) DEFAULT NULL,
  `Obespechenie` varchar(50) DEFAULT NULL,
  `Maloobespech` varchar(50) DEFAULT NULL,
  `Mnogodet` varchar(50) DEFAULT NULL,
  `Socialrisk` varchar(50) DEFAULT NULL,
  `FIOFather` varchar(50) DEFAULT NULL,
  `FPensioner` varchar(10) DEFAULT NULL,
  `FRabota` varchar(10) DEFAULT NULL,
  `FMestoR` varchar(50) DEFAULT NULL,
  `FPhoner` varchar(12) DEFAULT NULL,
  `FAdres` varchar(50) DEFAULT NULL,
  `FIOMother` varchar(50) DEFAULT NULL,
  `MPensioner` varchar(10) DEFAULT NULL,
  `MRabota` varchar(10) DEFAULT NULL,
  `MMestoR` varchar(50) DEFAULT NULL,
  `MPhoner` varchar(12) DEFAULT NULL,
  `MAdres` varchar(50) DEFAULT NULL,
  `FIOOpekun` varchar(50) DEFAULT NULL,
  `OPensioner` varchar(10) DEFAULT NULL,
  `ORabota` varchar(10) DEFAULT NULL,
  `OMestoR` varchar(50) DEFAULT NULL,
  `OPhoner` varchar(12) DEFAULT NULL,
  `OAdres` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groups` varchar(40) DEFAULT NULL,
  `years` varchar(40) DEFAULT NULL,
  `obshee` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `config`
--

INSERT INTO `config` (`id`, `groups`, `years`, `obshee`) VALUES
(1, '123', '2014', '123_2014'),
(2, '111', '2015', '111_2015'),
(3, '12333', '4415', '12333_4415'),
(4, '425', '673', '425_673'),
(5, '753', '6268', '753_6268'),
(6, '112', '2014', '112_2014');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(40) DEFAULT NULL,
  `pass` varchar(40) DEFAULT NULL,
  `priv` varchar(40) DEFAULT NULL,
  `grup` varchar(30) DEFAULT NULL,
  `year` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `user`, `pass`, `priv`, `grup`, `year`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '666', NULL),
(2, 'qwer', '962012d09b8170d912f0669f6d7d9d07', 'kurator', '123', '2014'),
(3, 'aleksey', '202cb962ac59075b964b07152d234b70', 'kurator', '111', '2015'),
(4, 'lol', '9cdfb439c7876e703e307864c9167a15', 'kurator', '12333', '4415'),
(5, 'lsl', '9f05b617878c89b529edf5b73f69b822', 'admin', '425', '673'),
(6, 'tyui', '15137ac9aa4a99ca503af92199223644', 'kurator', '753', '6268'),
(7, 'aleksey', '202cb962ac59075b964b07152d234b70', 'kurator', '112', '2014');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
