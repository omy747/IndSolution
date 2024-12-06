-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 06 2024 г., 13:40
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `onesdb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `catId` int(10) UNSIGNED NOT NULL,
  `cat_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `cat_desc` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `p_amount` int(10) UNSIGNED NOT NULL,
  `distance` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`catId`, `cat_title`, `cat_desc`, `p_amount`, `distance`) VALUES
(1, '1С:Предприятие 8', '1С:Предприятие 8', 15, '1'),
(2, '1С:Бухгалтерия 8', '1С:Бухгалтерия 8,', 11, '1');

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `clId` int(10) UNSIGNED NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `patronymic` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `usr_id` int(10) UNSIGNED NOT NULL,
  `c_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`clId`, `last_name`, `first_name`, `patronymic`, `usr_id`, `c_title`, `address`, `phone`) VALUES
(1, 'Алехин', 'Петр', 'Иванович', 1, 'ООО \"Парус\"', 'Ленина, 11', '123 456 78 90');

-- --------------------------------------------------------

--
-- Структура таблицы `client_products`
--

CREATE TABLE `client_products` (
  `cpId` int(10) UNSIGNED NOT NULL,
  `prod_id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `s_date` date NOT NULL,
  `e_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `employees`
--

CREATE TABLE `employees` (
  `empId` int(10) UNSIGNED NOT NULL,
  `lname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `patr` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `place` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `department` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ur_id` int(10) UNSIGNED NOT NULL,
  `h_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `employees`
--

INSERT INTO `employees` (`empId`, `lname`, `fname`, `patr`, `place`, `department`, `ur_id`, `h_date`) VALUES
(1, 'Антонов', 'Сергей', 'Иванович', 'Бухгалтер', 'Бухгалтерия', 3, '2000-12-11'),
(2, 'Смирнов', 'Андрей', 'Сергеевич', 'Администратор', 'ИТ-отдел', 1, '2015-12-12'),
(4, 'Алехин', 'Михаил', 'Сергеевич', 'Администратор', 'ИТ-отдел', 3, '2008-06-12');

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `messId` int(10) UNSIGNED NOT NULL,
  `m_text` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `IP` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `device` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `country` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `city` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `op_s` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`messId`, `m_text`, `IP`, `device`, `country`, `city`, `status`, `op_s`) VALUES
(2, 'Сколько стоит Бухгалтерия 7?', '127.0.0.1', 'Компьютер', 'РФ', 'Москва', 'получено', 'Windows'),
(4, 'Как получить решение не на год, а больше?', '127.0.0.1', 'Компьютер', 'РФ', 'Москва', 'получено', 'Windows'),
(5, 'Как получить решение не на год, а больше?', '127.0.0.1', 'Компьютер', 'РФ', 'Москва', 'получено', 'Windows'),
(6, 'Как получить решение не на год, а больше?', '127.0.0.1', 'Компьютер', 'РФ', 'Москва', 'получено', 'Windows');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `prodId` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL,
  `workers` tinyint(4) NOT NULL,
  `version` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `price` double UNSIGNED NOT NULL,
  `platform` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `descr` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`prodId`, `title`, `cat_id`, `workers`, `version`, `price`, `platform`, `descr`) VALUES
(1, '1С:Зарплата и управление персоналом 8', 1, 15, 'КОРП', 300000, '8.0', '1С:Зарплата и управление персоналом 8');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `login` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `u_group` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `reg_date` date DEFAULT NULL,
  `p_upd_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `login`, `u_group`, `reg_date`, `p_upd_date`) VALUES
(1, 'user1@usr.rr', '123456', 'user', '', '', NULL, NULL),
(2, 'ad@min.nn', '123456', 'admin', 'ad@min.nn', 'admin', '2024-12-05', '2024-12-05'),
(3, 'user77@mail.com', '123456', 'manager', '', 'manager', '2024-12-05', '2024-12-05');

-- --------------------------------------------------------

--
-- Структура таблицы `user_messages`
--

CREATE TABLE `user_messages` (
  `umId` int(10) UNSIGNED NOT NULL,
  `sender_id` int(10) UNSIGNED NOT NULL,
  `mess_id` int(10) UNSIGNED NOT NULL,
  `send_date` date NOT NULL,
  `send_time` time NOT NULL,
  `reciever_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `user_messages`
--

INSERT INTO `user_messages` (`umId`, `sender_id`, `mess_id`, `send_date`, `send_time`, `reciever_id`) VALUES
(1, 1, 4, '2024-12-06', '10:07:29', 3),
(2, 1, 5, '2024-12-06', '10:07:33', 3),
(3, 1, 6, '2024-12-06', '10:08:44', 3);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catId`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`clId`),
  ADD KEY `usr_id` (`usr_id`),
  ADD KEY `clt` (`c_title`);

--
-- Индексы таблицы `client_products`
--
ALTER TABLE `client_products`
  ADD PRIMARY KEY (`cpId`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Индексы таблицы `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`empId`),
  ADD KEY `ur_id` (`ur_id`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`messId`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prodId`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_messages`
--
ALTER TABLE `user_messages`
  ADD PRIMARY KEY (`umId`),
  ADD KEY `mess_id` (`mess_id`),
  ADD KEY `user_id` (`sender_id`),
  ADD KEY `reciever_id` (`reciever_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `catId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `clId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `client_products`
--
ALTER TABLE `client_products`
  MODIFY `cpId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `employees`
--
ALTER TABLE `employees`
  MODIFY `empId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `messId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `prodId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `user_messages`
--
ALTER TABLE `user_messages`
  MODIFY `umId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`usr_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `client_products`
--
ALTER TABLE `client_products`
  ADD CONSTRAINT `client_products_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`clId`),
  ADD CONSTRAINT `client_products_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prodId`);

--
-- Ограничения внешнего ключа таблицы `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`ur_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`catId`);

--
-- Ограничения внешнего ключа таблицы `user_messages`
--
ALTER TABLE `user_messages`
  ADD CONSTRAINT `user_messages_ibfk_1` FOREIGN KEY (`mess_id`) REFERENCES `messages` (`messId`),
  ADD CONSTRAINT `user_messages_ibfk_2` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_messages_ibfk_3` FOREIGN KEY (`reciever_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
