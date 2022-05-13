-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 13 2022 г., 16:18
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` tinyint(4) NOT NULL,
  `category_title` varchar(150) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `last_post_date` datetime DEFAULT NULL,
  `last_user_posted` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `category_title`, `category_description`, `last_post_date`, `last_user_posted`) VALUES
(17, '17', '          17', '2022-05-13 18:10:35', 'Иванов Иван Иванович'),
(21, 'cid21', '          21', '2022-05-10 16:26:37', 'Пётр Петров Петрович'),
(22, 'cid22', '         22 ', '2022-05-09 20:20:15', 'Администратор'),
(23, 'gh', '          fghgh', '2022-05-10 17:44:39', 'Администратор'),
(24, 'dgggg', '          ggg', '2022-05-10 17:44:46', 'Администратор'),
(25, 'dfgdfg', '          fgf', '2022-05-10 17:50:03', 'Иванов Иван Иванович'),
(26, 'changed', '          cc', '2022-05-13 18:01:00', 'Иванов Иван Иванович'),
(28, 'new', '          new', '2022-05-13 18:09:57', 'Иванов Иван Иванович');

-- --------------------------------------------------------

--
-- Структура таблицы `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_article` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `likes`
--

INSERT INTO `likes` (`id`, `id_user`, `id_article`) VALUES
(13, 11, 92),
(14, 11, 93),
(17, 11, 91),
(19, 2, 91),
(45, 2, 101),
(48, 2, 103),
(54, 11, 104);

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category_id` tinyint(4) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `post_creator` varchar(100) NOT NULL,
  `post_content` text NOT NULL,
  `post_date` datetime NOT NULL,
  `avatar` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `topic_id`, `post_creator`, `post_content`, `post_date`, `avatar`) VALUES
(1, 1, 1, '4', 'dgfdfd', '2022-05-05 14:56:14', NULL),
(2, 1, 2, '4', 'dgfdfd', '2022-05-05 14:56:14', NULL),
(3, 2, 3, '4', 'dgfdfd', '2022-05-05 14:56:14', NULL),
(4, 1, 4, '4', 'dgfdfd', '2022-05-05 14:56:14', NULL),
(5, 1, 4, '4', 'dgfdfd', '2022-05-05 14:56:14', NULL),
(10, 3, 9, '4', 'dgfdfd', '2022-05-05 14:56:14', NULL),
(11, 3, 9, '4', 'dgfdfd', '2022-05-05 14:56:14', NULL),
(12, 1, 10, '2', 'dgfdfd', '2022-05-05 14:56:14', NULL),
(13, 1, 11, '2', 'dgfdfd', '2022-05-05 14:56:14', NULL),
(14, 1, 12, '2', 'dgfdfd', '2022-05-05 14:56:14', NULL),
(15, 1, 13, '2', 'dgfdfd', '2022-05-05 14:56:14', NULL),
(16, 1, 13, '2', 'dgfdfd', '2022-05-05 14:56:14', NULL),
(17, 1, 14, '2', 'dgfdfd', '2022-05-05 14:56:14', NULL),
(18, 1, 15, '2', 'dgfdfd', '2022-05-05 14:56:14', NULL),
(19, 1, 16, '2', 'dgfdfd', '2022-05-05 14:56:14', NULL),
(25, 1, 17, 'Пётр Петров Петрович', 'dgfdfd', '2022-05-05 14:56:14', 'uploads/1651127734decor_footprint.png'),
(26, 1, 17, 'Иванов Иван Иванович', 'dgfdfd', '2022-05-05 14:56:14', 'uploads/15698233144.png'),
(27, 1, 18, '2', 'dgfdfd', '2022-05-05 14:56:14', 'uploads/15698233144.png'),
(28, 1, 19, 'Иванов Иван Иванович', 'dgfdfd', '2022-05-05 14:56:14', 'uploads/15698233144.png'),
(29, 1, 19, 'Пётр Петров Петрович', 'dgfdfd', '2022-05-05 14:56:14', 'uploads/1651127734decor_footprint.png'),
(30, 1, 20, 'Тест', 'dgfdfd', '2022-05-05 14:56:14', 'uploads/1651563974test_ava.jpg'),
(31, 1, 20, 'Пётр Петров Петрович', 'dgfdfd', '2022-05-05 14:56:14', 'uploads/1651127734decor_footprint.png'),
(32, 1, 20, 'Иванов Иван Иванович', 'dgfdfd', '2022-05-05 14:56:14', 'uploads/15698233144.png'),
(33, 2, 21, 'Тест', 'dgfdfd', '2022-05-05 14:56:14', 'uploads/1651563974test_ava.jpg'),
(34, 3, 22, 'Тест', 'dgfdfd', '2022-05-05 14:56:14', 'uploads/1651563974test_ava.jpg'),
(35, 1, 23, 'Тест', 'dgfdfd', '2022-05-05 14:56:14', 'uploads/1651563974test_ava.jpg'),
(36, 1, 23, 'Тест', 'dgfdfd', '2022-05-05 14:56:14', 'uploads/1651563974test_ava.jpg'),
(37, 1, 23, 'Тест', 'dgfdfd', '2022-05-05 14:56:14', 'uploads/1651563974test_ava.jpg'),
(38, 1, 24, 'Тест', 'dgfdfd', '2022-05-05 14:56:14', 'uploads/1651563974test_ava.jpg'),
(39, 1, 24, 'Тест', 'dgfdfd', '2022-05-05 14:56:14', 'uploads/1651563974test_ava.jpg'),
(40, 1, 24, 'Тест', 'dgfdfd', '2022-05-05 14:56:14', 'uploads/1651563974test_ava.jpg'),
(41, 1, 25, 'Тест', 'dgfdfd', '2022-05-05 14:56:14', 'uploads/1651563974test_ava.jpg'),
(42, 1, 25, 'Тест', 'dgfdfd', '2022-05-05 14:56:14', 'uploads/1651563974test_ava.jpg'),
(43, 1, 25, 'Тест', 'dgfdfd', '2022-05-05 14:56:14', 'uploads/1651563974test_ava.jpg'),
(44, 1, 26, 'Тест', 'dgfdfd', '2022-05-05 14:56:14', 'uploads/1651563974test_ava.jpg'),
(45, 1, 26, 'Тест', 'dgfdfd', '2022-05-05 14:56:14', 'uploads/1651563974test_ava.jpg'),
(46, 1, 27, 'Тест', 'dgfdfd', '2022-05-05 14:56:14', 'uploads/1651563974test_ava.jpg'),
(47, 1, 27, 'Пётр Петров Петрович', 'dgfdfd', '2022-05-05 14:56:14', 'uploads/1651127734decor_footprint.png'),
(48, 1, 28, 'Пётр Петров Петрович', 'dgfdfd', '2022-05-05 14:56:14', 'uploads/1651127734decor_footprint.png'),
(49, 1, 29, 'Пётр Петров Петрович', 'dgfdfd', '2022-05-05 14:56:14', 'uploads/1651127734decor_footprint.png'),
(50, 1, 30, 'Пётр Петров Петрович', 'dgfdfd', '2022-05-05 14:56:14', 'uploads/1651127734decor_footprint.png'),
(51, 1, 31, 'Пётр Петров Петрович', 'dgfdfd', '2022-05-05 14:56:14', 'uploads/1651127734decor_footprint.png'),
(52, 3, 22, 'Пётр Петров Петрович', 'dgfdfd', '2022-05-05 14:56:14', 'uploads/1651127734decor_footprint.png'),
(53, 17, 32, 'Администратор', '          222', '2022-05-09 17:50:06', 'uploads/1651645190lgQLRKLpGdFaU1Iadmin.jpg'),
(69, 17, 33, 'Администратор', '          авпвап', '2022-05-09 15:38:06', 'uploads/1651645190lgQLRKLpGdFaU1Iadmin.jpg'),
(70, 17, 34, 'Администратор', '          333', '2022-05-09 17:51:37', 'uploads/1651645190lgQLRKLpGdFaU1Iadmin.jpg'),
(71, 17, 35, 'Администратор', '          18', '2022-05-09 18:34:15', 'uploads/1651645190lgQLRKLpGdFaU1Iadmin.jpg'),
(72, 19, 36, 'Администратор', '          ропропроро', '2022-05-09 19:13:10', 'uploads/1651645190lgQLRKLpGdFaU1Iadmin.jpg'),
(73, 19, 36, 'Администратор', 'dfgfdg', '2022-05-09 19:17:11', 'uploads/1651645190lgQLRKLpGdFaU1Iadmin.jpg'),
(74, 19, 37, 'Администратор', '          dfgdfg', '2022-05-09 19:22:42', 'uploads/1651645190lgQLRKLpGdFaU1Iadmin.jpg'),
(75, 19, 38, 'Администратор', '          dfg', '2022-05-09 19:23:12', 'uploads/1651645190lgQLRKLpGdFaU1Iadmin.jpg'),
(76, 19, 39, 'Администратор', '          gg', '2022-05-09 19:24:16', 'uploads/1651645190lgQLRKLpGdFaU1Iadmin.jpg'),
(77, 19, 40, 'Администратор', '          ff', '2022-05-09 19:24:56', 'uploads/1651645190lgQLRKLpGdFaU1Iadmin.jpg'),
(78, 17, 41, 'Администратор', '          wd', '2022-05-09 19:32:39', 'uploads/1651645190lgQLRKLpGdFaU1Iadmin.jpg'),
(79, 17, 41, 'Администратор', 'ff', '2022-05-09 19:36:31', 'uploads/1651645190lgQLRKLpGdFaU1Iadmin.jpg'),
(80, 17, 41, 'Администратор', 'ff', '2022-05-09 19:37:47', 'uploads/1651645190lgQLRKLpGdFaU1Iadmin.jpg'),
(81, 17, 41, 'Администратор', 'dd', '2022-05-09 19:44:56', 'uploads/1651645190lgQLRKLpGdFaU1Iadmin.jpg'),
(82, 17, 41, '', 'dd', '2022-05-09 19:46:16', ''),
(83, 17, 41, 'Администратор', 'dd', '2022-05-09 19:47:57', 'uploads/1651645190lgQLRKLpGdFaU1Iadmin.jpg'),
(84, 17, 41, 'Администратор', 'dd', '2022-05-09 19:48:16', 'uploads/1651645190lgQLRKLpGdFaU1Iadmin.jpg'),
(85, 17, 43, 'Администратор', '          ff', '2022-05-09 19:48:56', 'uploads/1651645190lgQLRKLpGdFaU1Iadmin.jpg'),
(86, 17, 43, 'Администратор', 'ff', '2022-05-09 19:49:03', 'uploads/1651645190lgQLRKLpGdFaU1Iadmin.jpg'),
(87, 17, 45, 'Администратор', '          hhh', '2022-05-09 19:50:58', 'uploads/1651645190lgQLRKLpGdFaU1Iadmin.jpg'),
(88, 17, 45, 'Администратор', 'ggg', '2022-05-09 19:51:04', 'uploads/1651645190lgQLRKLpGdFaU1Iadmin.jpg'),
(89, 17, 46, 'Администратор', '          jjj', '2022-05-09 19:52:23', 'uploads/1651645190lgQLRKLpGdFaU1Iadmin.jpg'),
(90, 17, 46, 'Администратор', 'fff', '2022-05-09 19:52:30', 'uploads/1651645190lgQLRKLpGdFaU1Iadmin.jpg'),
(91, 17, 47, 'Администратор', '          апа', '2022-05-09 20:15:07', 'uploads/1651645190lgQLRKLpGdFaU1Iadmin.jpg'),
(92, 17, 47, 'Администратор', ']]]', '2022-05-09 19:53:37', 'uploads/1651645190lgQLRKLpGdFaU1Iadmin.jpg'),
(93, 17, 47, 'Иванов Иван Иванович', '...', '2022-05-09 19:58:44', 'uploads/15698233144.png'),
(94, 21, 48, 'Пётр Петров Петрович', '          ддддддд', '2022-05-09 20:16:04', 'uploads/1651127734decor_footprint.png'),
(95, 21, 48, 'Пётр Петров Петрович', 'kk', '2022-05-09 20:02:16', 'uploads/1651127734decor_footprint.png'),
(96, 21, 48, 'Администратор', 'yy', '2022-05-09 20:02:49', 'uploads/1651645190lgQLRKLpGdFaU1Iadmin.jpg'),
(97, 20, 49, 'Администратор', '          оорор', '2022-05-09 20:13:32', 'uploads/1651645190lgQLRKLpGdFaU1Iadmin.jpg'),
(98, 17, 50, 'Иванов Иван Иванович', '          dfgf', '2022-05-13 15:01:08', 'uploads/15698233144.png'),
(99, 17, 51, 'Иванов Иван Иванович', '          dfgfdgfg', '2022-05-13 15:01:39', 'uploads/15698233144.png'),
(100, 17, 52, 'Иванов Иван Иванович', '          hhh', '2022-05-13 15:06:09', 'uploads/15698233144.png'),
(101, 17, 53, 'Иванов Иван Иванович', '          h', '2022-05-13 15:06:15', 'uploads/15698233144.png'),
(102, 17, 53, 'Иванов Иван Иванович', 'h', '2022-05-13 16:49:25', 'uploads/15698233144.png'),
(103, 17, 54, 'Иванов Иван Иванович', '          r', '2022-05-13 16:51:03', 'uploads/15698233144.png'),
(104, 17, 55, 'Администратор', '          admin', '2022-05-13 18:04:03', 'uploads/1651645190lgQLRKLpGdFaU1Iadmin.jpg'),
(105, 17, 55, 'Администратор', 'j', '2022-05-13 17:54:51', 'uploads/1651645190lgQLRKLpGdFaU1Iadmin.jpg'),
(106, 17, 56, 'Иванов Иван Иванович', '        17  ', '2022-05-13 18:10:18', 'uploads/15698233144.png'),
(107, 17, 56, 'Иванов Иван Иванович', '111', '2022-05-13 18:10:35', 'uploads/15698233144.png');

-- --------------------------------------------------------

--
-- Структура таблицы `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `category_id` tinyint(4) NOT NULL,
  `topic_title` varchar(150) NOT NULL,
  `topic_creator` varchar(100) NOT NULL,
  `topic_last_user` varchar(100) DEFAULT NULL,
  `topic_date` datetime NOT NULL,
  `topic_reply_date` datetime NOT NULL,
  `topic_views` int(11) NOT NULL DEFAULT 0,
  `replies` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `topics`
--

INSERT INTO `topics` (`id`, `category_id`, `topic_title`, `topic_creator`, `topic_last_user`, `topic_date`, `topic_reply_date`, `topic_views`, `replies`) VALUES
(21, 2, 'Тема для категории 2', 'Тест', 'Администратор', '2022-05-03 13:51:36', '2022-05-03 13:51:36', 2, 0),
(22, 3, 'Тема для категории 3', 'Тест', 'Администратор', '2022-05-03 13:51:54', '2022-05-03 16:38:56', 8, 0),
(24, 1, 'Тема с 2 ответами(2)', 'Тест', 'Администратор', '2022-05-03 15:05:52', '2022-05-03 15:05:59', 10, 0),
(25, 1, 'Тема с 2 ответами(3)', 'Тест', 'Администратор', '2022-05-03 15:06:23', '2022-05-03 15:06:29', 10, 0),
(26, 1, 'С одним ответом', 'Тест', 'Администратор', '2022-05-03 15:16:18', '2022-05-03 15:16:21', 6, 0),
(27, 1, 'С одним ответом но от другого', 'Тест', 'Администратор', '2022-05-03 15:16:55', '2022-05-03 15:17:12', 13, 0),
(28, 1, 'Без ответов', 'Пётр Петров Петрович', 'Администратор', '2022-05-03 15:19:00', '2022-05-03 15:19:00', 3, 0),
(29, 1, 'Без ответов(2)', 'Пётр Петров Петрович', 'Администратор', '2022-05-03 15:20:20', '2022-05-03 15:20:20', 3, 0),
(30, 1, 'Без ответов (3)', 'Пётр Петров Петрович', 'Администратор', '2022-05-03 15:22:10', '2022-05-03 15:22:10', 4, 0),
(31, 1, 'Без ответов (4)', 'Пётр Петров Петрович', 'Администратор', '2022-05-03 15:25:48', '2022-05-03 15:25:48', 23, 0),
(36, 19, 'папрапр', 'Администратор', 'Администратор', '2022-05-09 19:13:10', '2022-05-09 19:13:10', 5, 0),
(47, 17, 'пап', 'Администратор', 'Иванов Иван Иванович', '2022-05-09 20:15:07', '2022-05-09 20:15:07', 485, 0),
(48, 21, 'ддддддд', 'Пётр Петров Петрович', 'Администратор', '2022-05-09 20:16:04', '2022-05-09 20:16:04', 12, 0),
(50, 17, 'dfgdf', 'Иванов Иван Иванович', NULL, '2022-05-13 15:01:08', '2022-05-13 15:01:08', 1, 0),
(51, 17, 'dfgfd', 'Иванов Иван Иванович', NULL, '2022-05-13 15:01:39', '2022-05-13 15:01:39', 7, 0),
(52, 17, 'ghhh', 'Иванов Иван Иванович', NULL, '2022-05-13 15:06:09', '2022-05-13 15:06:09', 1, 0),
(53, 17, 'h', 'Иванов Иван Иванович', 'Иванов Иван Иванович', '2022-05-13 15:06:15', '2022-05-13 16:49:26', 107, 0),
(54, 17, 'r', 'Иванов Иван Иванович', NULL, '2022-05-13 16:51:03', '2022-05-13 16:51:03', 7, 0),
(55, 17, 'noadmin', 'Администратор', 'Администратор', '2022-05-13 18:04:03', '2022-05-13 18:04:03', 32, 0),
(56, 17, '17', 'Иванов Иван Иванович', 'Иванов Иван Иванович', '2022-05-13 18:10:18', '2022-05-13 18:10:35', 6, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(355) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `avatar` varchar(500) DEFAULT NULL,
  `forum_notification` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `full_name`, `login`, `email`, `password`, `avatar`, `forum_notification`) VALUES
(2, 'Иванов Иван Иванович', 'test', 'test@local.ru', '202cb962ac59075b964b07152d234b70', 'uploads/15698233144.png', '1'),
(4, 'Пётр Петров Петрович', 'petr1', '123@mail.com', '1ae5c74f397d9162f2e7218a4d9d528b', 'uploads/1651127734decor_footprint.png', '1'),
(5, 'Пётр Иванов Иванович', 'petr2', '124@mail.com', 'ad22179a23372e6cafb6a9ab4e49b700', 'uploads/1651127913decor_footprint.png', '1'),
(6, 'Петр Андреев Иванович', 'petr3', '125@mail.com', 'b29e7c8744398ca7f967ff6fdcfab636', 'uploads/1651128003decor_footprint.png', '1'),
(7, 'Петр Андреевв Иванович', 'petr4', '126@email.com', '7f94dd413148ff9ac9e9e4b6ff2b6ca9', 'uploads/1651128065decor_footprint.png', '1'),
(8, 'Петр Андрееввd Иванович', 'petr5', '127@email.com', 'f27f6f1c7c5cbf4e3e192e0a47b85300', 'uploads/1651128118decor_footprint.png', '1'),
(9, 'Андреев Андрей Андреевич', 'andre1', 'andr123@mail.ru', 'c6f057b86584942e415435ffb1fa93d4', 'uploads/1651128252decor_footprint.png', '1'),
(10, 'Тест', 'kot', 'kot@mail.ru', '698d51a19d8a121ce581499d7b701668', 'uploads/1651563974test_ava.jpg', '1'),
(11, 'Администратор', 'admin', 'admin@mail.ru', '21232f297a57a5a743894a0e4a801fc3', 'uploads/1651645190lgQLRKLpGdFaU1Iadmin.jpg', '1'),
(12, 'а', 'а', 'aaa@mail.ru', '202cb962ac59075b964b07152d234b70', 'uploads/1652441999quiz.jpg', '1'),
(13, 'avatar', 'avatar1', 'avatar@mail.ru', '202cb962ac59075b964b07152d234b70', 'uploads/1652442143quiz.jpg', '1');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `topics`
--
ALTER TABLE `topics`
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
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT для таблицы `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
