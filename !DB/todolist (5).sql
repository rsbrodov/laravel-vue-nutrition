-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 27 2022 г., 19:38
-- Версия сервера: 8.0.24
-- Версия PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `todolist`
--

-- --------------------------------------------------------

--
-- Структура таблицы `chats`
--

CREATE TABLE `chats` (
  `id` bigint UNSIGNED NOT NULL,
  `room_id` int NOT NULL,
  `user_id` int NOT NULL,
  `message` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `chats`
--

INSERT INTO `chats` (`id`, `room_id`, `user_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Привет', '2021-11-26 01:47:55', '2021-11-26 01:47:55'),
(2, 1, 1, 'ододлодллдодо', '2021-11-28 19:07:23', '2021-11-28 19:07:23'),
(3, 1, 1, 'fghf', '2022-03-09 01:47:48', '2022-03-09 01:47:48');

-- --------------------------------------------------------

--
-- Структура таблицы `culinary_processings`
--

CREATE TABLE `culinary_processings` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `culinary_processings`
--

INSERT INTO `culinary_processings` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Варка', NULL, NULL),
(2, 'Запекание', NULL, NULL),
(3, 'Иное (не предусматривает термической обработки)', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `days`
--

CREATE TABLE `days` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `days`
--

INSERT INTO `days` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Понедельник', NULL, NULL),
(2, 'Вторник', NULL, NULL),
(3, 'Среда', NULL, NULL),
(4, 'Четверг', NULL, NULL),
(5, 'Пятница', NULL, NULL),
(6, 'Суббота', NULL, NULL),
(7, 'Воскресенье', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `dishes`
--

CREATE TABLE `dishes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dishes_categories_id` bigint UNSIGNED NOT NULL,
  `recipes_collections_id` bigint UNSIGNED NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `culinary_processings_id` bigint UNSIGNED NOT NULL,
  `yield` double NOT NULL,
  `dishes_characters` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `techmap_number` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `dishes`
--

INSERT INTO `dishes` (`id`, `name`, `dishes_categories_id`, `recipes_collections_id`, `description`, `culinary_processings_id`, `yield`, `dishes_characters`, `techmap_number`, `created_at`, `updated_at`) VALUES
(22, 'Каша гречневая рассыпчатая', 3, 1, 'Крупу перебирают, промывают, несколько раз меняя воду, засыпают в кипящую подсоленную воду, всплывающие пустые зерна удаляют (ситечком) и варят до загустения, помешивая. Когда каша сделается густой, помешивание прекращают, закрывают крышкой и доводят до готовности на пару или водяной бане (температура 100о С) или в жарочном шкафу при температуре 140-160 градусов Цельсия. Затем вливают растопленное сливочное масло, взрыхляют поварской вилкой, уваривают еще 3-4 мин. Температура подачи: не менее 65 градусов С.', 1, 150, 'Внешний вид - зерна крупы полностью набухшие, сохраняют форму, легко отделяются друг от друга; консистенция - рассыпчатая; цвет, вкус и запах - соответствуют наименованию блюда.', 54, '2022-05-16 09:13:17', '2022-05-16 09:13:17'),
(23, 'Компот из смородины', 5, 1, 'Ягоду (свежую или свежемороженую) перебирают, удаляют плодоножки, моют. В горячей воде растворяют сахар, доводят до кипения, добавляют ягоды и проваривают 10-12 минут. Компот охлаждают. Готовый компот разливают по стаканам. Температура подачи: 20 градусов С.', 1, 200, 'Вкус, цвет и запах: сладкий, с выраженным вкусом ягод.', 547, '2022-05-16 09:16:15', '2022-05-16 09:16:15'),
(24, 'Коржик молочный', 8, 1, 'Размягченное масло взбивают с сахаром до полного его растворения, добавляют яйца и молоко, растворенные разрыхлитель и ванилин, а затем всыпают муку и замешивают тесто 1-4 минут. Приготовленное тесто раскатывают в виде пласта толщиной 6-7 мм,наносят рисунок рифленой скалкой, вырезают изделия круглой формы диаметром 95 мм,укладывают на листы, смазывают яйцом и выпекают при температуре 200-220 градусов в течение 10-12 минут.', 2, 40, 'Изделия круглой формы с узорчатой поверхностью, края с зубчиками. Цвет светло-желтый. Влажность: не более 14,50%.', 542, '2022-05-16 09:21:37', '2022-05-16 09:21:37'),
(25, 'Сыр твердых сортов в нарезке', 4, 1, 'Сыр разрезают на крупные куски, очищают от наружного покрытия и нарезают ломтиками прямоугольной, квадратной, треугольной или другой формы толщиной 2-3 мм. Сыр нарезают не ранее чем за 30-40 мин до отпуска. Перед раздачей порционированный сыр хранят в холодильнике. Температура подачи: 14 градусов С.', 3, 30, 'Внешний вид - форма нарезки сохранена; вкус, цвет и запах - соответствуют используемому продукту.', 541, '2022-05-16 09:26:25', '2022-05-16 09:26:25'),
(26, 'Суфле рыбное без глютена (горбуша)', 2, 1, 'Подготовленные (обработанные) яйца разбивают в отдельную емкость, отделяя белки от желтков, яичные белки взбивают. Рыбное филе размораживают на воздухе или в холодной воде с температурой не выше +12 градусов, обмывают водой, очищают от кожи и нарезают на кусочки массой 50-100 г., измельчают на мясорубке, добавляют соль, перемешивают. В полученную массу добавляют соус молочный безглютеновый (54-6 соус-2020) из расчета 25 грамм соуса на 55 грамм блюда, затем добавляют желтки яиц, и после вводят взбитые яичные белки. Полученную массу раскладывают в смазанную маслом емкость и запекают 15-20 мин при температуре 220 градусов Цельсия.', 2, 60, 'Консистенция - однородная, сочная; вкус и запах – рыбный.', 5412, '2022-05-16 09:36:23', '2022-05-16 09:36:23'),
(27, 'Котлета рыбная', 2, 1, 'Рыбное филе размораживают на воздухе или в холодной воде с температурой не выше +12 градусов Цельсия из расчета 2 л на 1 кг рыбы. Для сокращения потерь минеральных веществ в воду рекомендуется добавлять соль из расчета 7 - 10 г на 1 литр. Размороженную рыбу очищают от кожи, разрезают на куски и измельчают на мясорубке, второй раз пропускают через мясорубку вместе с замоченным в воде и отжатым пшеничным хлебом, добавляют соль, сливочное масло, сырые яйца, оставшуюся воду, все тщательно перемешивают и выбивают. Из рыбной котлетной массы формируют котлеты. Изделия укладывают на противень, смазанный маслом в один ряд, добавляют процеженный рыбный бульон или воду и запекают до готовности (20-25 минут) в духовом шкафу или пароконвектомате. Температура подачи: не менее 65 градусов С.', 2, 100, 'Консистенция - однородная, рыхлая, сочная; цвет - белый с сероватым оттенком; вкус и запах -рыбный.', 5422, '2022-05-16 09:55:09', '2022-05-16 09:55:09'),
(28, 'Хлеб пшеничный', 8, 1, 'Продукт пром. производства', 3, 100, '-', 0, '2022-05-16 10:00:12', '2022-05-16 10:00:12');

-- --------------------------------------------------------

--
-- Структура таблицы `dishes_categories`
--

CREATE TABLE `dishes_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `dishes_categories`
--

INSERT INTO `dishes_categories` (`id`, `name`, `sort`, `created_at`, `updated_at`) VALUES
(1, 'Блюда из мяса', 50, NULL, NULL),
(2, 'Блюда из рыбы', 50, NULL, NULL),
(3, 'Блюда из круп', 10, NULL, NULL),
(4, 'Первые блюда', 10, NULL, NULL),
(5, 'Холодные напитки', 90, NULL, NULL),
(6, 'Горячие напитки', 80, NULL, NULL),
(7, 'Гарниры', 40, NULL, NULL),
(8, 'Мучные изделия', 120, NULL, NULL),
(9, 'Соусы', 60, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `dishes_products`
--

CREATE TABLE `dishes_products` (
  `id` bigint UNSIGNED NOT NULL,
  `dishes_id` bigint UNSIGNED NOT NULL,
  `products_id` bigint UNSIGNED NOT NULL,
  `net_weight` double NOT NULL,
  `gross_weight` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `dishes_products`
--

INSERT INTO `dishes_products` (`id`, `dishes_id`, `products_id`, `net_weight`, `gross_weight`, `created_at`, `updated_at`) VALUES
(13, 22, 15, 69, 69, '2022-05-16 09:13:35', '2022-05-16 09:13:35'),
(14, 22, 12, 6.8, 6.8, '2022-05-16 09:14:00', '2022-05-16 09:14:00'),
(15, 22, 17, 0.5, 0.5, '2022-05-16 09:14:20', '2022-05-16 09:14:20'),
(16, 22, 18, 102, 102, '2022-05-16 09:14:32', '2022-05-16 09:14:32'),
(17, 23, 19, 30, 32.1, '2022-05-16 09:16:41', '2022-05-16 09:16:41'),
(18, 23, 18, 168, 168, '2022-05-16 09:17:10', '2022-05-16 09:17:10'),
(19, 23, 23, 7, 7, '2022-05-16 09:20:15', '2022-05-16 09:20:15'),
(20, 24, 22, 22.5, 22.5, '2022-05-16 09:21:58', '2022-05-16 09:21:58'),
(21, 24, 23, 7, 7, '2022-05-16 09:22:05', '2022-05-16 09:22:05'),
(22, 24, 21, 2, 2.2, '2022-05-16 09:22:17', '2022-05-16 09:22:17'),
(23, 24, 11, 4, 4, '2022-05-16 09:22:40', '2022-05-16 09:22:40'),
(24, 24, 12, 5.3, 5.3, '2022-05-16 09:22:52', '2022-05-16 09:22:52'),
(25, 25, 14, 30, 31.2, '2022-05-16 09:26:39', '2022-05-16 09:26:39'),
(26, 26, 24, 81.2, 91.8, '2022-05-16 09:36:40', '2022-05-16 09:36:40'),
(27, 26, 21, 18.5, 20.3, '2022-05-16 09:36:54', '2022-05-16 09:36:54'),
(28, 26, 12, 1.8, 1.8, '2022-05-16 09:37:08', '2022-05-16 09:37:08'),
(29, 26, 17, 0.27, 0.27, '2022-05-16 09:37:34', '2022-05-16 09:37:34'),
(30, 27, 24, 80, 90.4, '2022-05-16 09:55:37', '2022-05-16 09:55:37'),
(31, 27, 10, 19, 119, '2022-05-16 09:55:42', '2022-05-16 09:55:42'),
(32, 27, 21, 6, 6.6, '2022-05-16 09:55:56', '2022-05-16 09:55:56'),
(33, 27, 12, 2, 2, '2022-05-16 09:56:01', '2022-05-16 09:56:01'),
(34, 27, 17, 0.4, 0.4, '2022-05-16 09:56:15', '2022-05-16 09:56:15'),
(35, 27, 18, 14, 14, '2022-05-16 09:56:22', '2022-05-16 09:56:22'),
(36, 28, 10, 100, 100, '2022-05-16 10:13:44', '2022-05-16 10:13:44');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id`, `name`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(18, 'рлророл', 0, NULL, '2021-10-28 03:20:30', '2021-10-28 03:20:30'),
(24, 'рлдлдрлдр', 0, NULL, '2021-11-28 19:07:11', '2021-11-28 19:07:11');

-- --------------------------------------------------------

--
-- Структура таблицы `menus`
--

CREATE TABLE `menus` (
  `id` bigint UNSIGNED NOT NULL,
  `parent_id` int NOT NULL DEFAULT '0',
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menus`
--

INSERT INTO `menus` (`id`, `parent_id`, `name`, `created_at`, `updated_at`) VALUES
(9, 0, 'Меню второе', '2022-03-31 00:54:41', '2022-03-31 00:54:41'),
(10, 0, 'Меню для детского сада', '2022-03-31 01:03:30', '2022-03-31 01:03:30'),
(12, 0, 'Завтраки для персонала', '2022-05-03 01:45:39', '2022-05-03 01:45:39');

-- --------------------------------------------------------

--
-- Структура таблицы `menu_days`
--

CREATE TABLE `menu_days` (
  `id` bigint UNSIGNED NOT NULL,
  `menu_id` bigint UNSIGNED NOT NULL,
  `days_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menu_days`
--

INSERT INTO `menu_days` (`id`, `menu_id`, `days_id`, `created_at`, `updated_at`) VALUES
(18, 9, 1, '2022-03-31 00:54:41', '2022-03-31 00:54:41'),
(19, 9, 7, '2022-03-31 00:54:41', '2022-03-31 00:54:41'),
(20, 10, 1, '2022-03-31 01:03:30', '2022-03-31 01:03:30'),
(21, 10, 2, '2022-03-31 01:03:30', '2022-03-31 01:03:30'),
(22, 10, 3, '2022-03-31 01:03:30', '2022-03-31 01:03:30'),
(23, 10, 4, '2022-03-31 01:03:30', '2022-03-31 01:03:30'),
(24, 10, 5, '2022-03-31 01:03:30', '2022-03-31 01:03:30'),
(25, 10, 6, '2022-03-31 01:03:30', '2022-03-31 01:03:30'),
(26, 10, 7, '2022-03-31 01:03:30', '2022-03-31 01:03:30'),
(29, 12, 1, '2022-05-03 01:45:39', '2022-05-03 01:45:39'),
(30, 12, 2, '2022-05-03 01:45:39', '2022-05-03 01:45:39'),
(31, 12, 6, '2022-05-03 01:45:39', '2022-05-03 01:45:39');

-- --------------------------------------------------------

--
-- Структура таблицы `menu_dishes`
--

CREATE TABLE `menu_dishes` (
  `id` bigint UNSIGNED NOT NULL,
  `menu_id` bigint UNSIGNED NOT NULL,
  `cycle` int NOT NULL,
  `days_id` int NOT NULL,
  `nutrition_id` int NOT NULL,
  `dishes_id` bigint UNSIGNED NOT NULL,
  `yield` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menu_dishes`
--

INSERT INTO `menu_dishes` (`id`, `menu_id`, `cycle`, `days_id`, `nutrition_id`, `dishes_id`, `yield`, `created_at`, `updated_at`) VALUES
(22, 9, 1, 1, 1, 22, 200, '2022-05-16 10:07:40', '2022-05-16 10:07:40'),
(23, 9, 1, 1, 1, 23, 250, '2022-05-16 10:07:51', '2022-05-16 10:07:51'),
(24, 9, 1, 1, 1, 25, 35, '2022-05-16 10:07:59', '2022-05-16 10:07:59'),
(25, 9, 1, 1, 1, 28, 50, '2022-05-16 10:08:05', '2022-05-16 10:08:05'),
(26, 9, 1, 1, 6, 27, 100, '2022-05-16 10:09:23', '2022-05-16 10:09:23'),
(27, 9, 1, 1, 6, 22, 150, '2022-05-16 10:09:41', '2022-05-16 10:09:41'),
(28, 9, 1, 1, 6, 24, 45, '2022-05-16 10:09:53', '2022-05-16 10:09:53'),
(29, 9, 1, 7, 1, 23, 200, '2022-05-16 10:10:07', '2022-05-16 10:10:07'),
(30, 9, 1, 7, 1, 24, 100, '2022-05-16 10:10:21', '2022-05-16 10:10:21'),
(31, 9, 1, 7, 1, 22, 55, '2022-05-16 10:10:28', '2022-05-16 10:10:28'),
(32, 9, 1, 7, 6, 26, 140, '2022-05-16 10:10:42', '2022-05-16 10:10:42'),
(33, 9, 1, 7, 6, 22, 150, '2022-05-16 10:10:48', '2022-05-16 10:10:48'),
(34, 9, 1, 7, 6, 23, 200, '2022-05-16 10:10:54', '2022-05-16 10:10:54'),
(35, 9, 1, 7, 6, 25, 45, '2022-05-16 10:11:02', '2022-05-16 10:11:02');

-- --------------------------------------------------------

--
-- Структура таблицы `menu_nutrition`
--

CREATE TABLE `menu_nutrition` (
  `id` bigint UNSIGNED NOT NULL,
  `menu_id` bigint UNSIGNED NOT NULL,
  `nutrition_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menu_nutrition`
--

INSERT INTO `menu_nutrition` (`id`, `menu_id`, `nutrition_id`, `created_at`, `updated_at`) VALUES
(11, 9, 1, '2022-03-31 00:54:41', '2022-03-31 00:54:41'),
(12, 9, 6, '2022-03-31 00:54:41', '2022-03-31 00:54:41'),
(13, 10, 1, '2022-03-31 01:03:30', '2022-03-31 01:03:30'),
(14, 10, 2, '2022-03-31 01:03:30', '2022-03-31 01:03:30'),
(15, 10, 3, '2022-03-31 01:03:30', '2022-03-31 01:03:30'),
(16, 10, 4, '2022-03-31 01:03:30', '2022-03-31 01:03:30'),
(17, 10, 5, '2022-03-31 01:03:30', '2022-03-31 01:03:30'),
(18, 10, 6, '2022-03-31 01:03:30', '2022-03-31 01:03:30'),
(21, 12, 1, '2022-05-03 01:45:39', '2022-05-03 01:45:39');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_23_143449_create_items_table', 1),
(7, '2021_11_01_133532_create_chats_table', 2),
(8, '2021_11_26_071856_create_dishes_categories_table', 2),
(9, '2021_11_26_072958_create_recipes_collections_table', 3),
(10, '2021_11_26_073239_create_culinary_processings_table', 4),
(11, '2021_11_26_073356_create_dishes_table', 5),
(12, '2021_12_17_050731_create_products_categories_table', 6),
(13, '2021_12_17_051024_create_products_subcategories_table', 6),
(14, '2021_12_17_051238_create_products_table', 6),
(16, '2022_01_07_082116_create_permission_tables', 8),
(19, '2022_03_15_101238_create_menus_table', 9),
(24, '2021_12_17_051601_create_dishes_products_table', 11),
(27, '2022_03_16_100609_create_menu_dishes_table', 11),
(29, '2022_03_27_181157_create_days_table', 13),
(30, '2022_03_28_100546_create_menu_days_table', 13),
(32, '2022_03_19_085623_create_nutrition_table', 14),
(33, '2022_03_29_100336_create_menu_nutrition_table', 14),
(34, '2022_05_08_134830_add_columns_to_products', 15);

-- --------------------------------------------------------

--
-- Структура таблицы `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `nutritions`
--

CREATE TABLE `nutritions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `nutritions`
--

INSERT INTO `nutritions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Завтрак', NULL, NULL),
(2, 'Второй завтрак', NULL, NULL),
(3, 'Обед', NULL, NULL),
(4, 'Полдник', NULL, NULL),
(5, 'Ужин', NULL, NULL),
(6, 'Второй ужин', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'write', 'web', '2022-01-07 08:14:30', '2022-01-07 08:14:30');

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 5, 'admin@mail.ru', '1aadafc7d2a2151efb87f9df264f000f3aaa83589346b5a966b13155a56cf8e8', '[\"*\"]', NULL, '2022-03-20 09:04:59', '2022-03-20 09:04:59'),
(2, 'App\\Models\\User', 5, 'admin@mail.ru', 'c899f035e07e4ffb93cd6ab17d75f4e13f1126d5374041a0a1b5a1b3ab5ec89a', '[\"*\"]', '2022-03-20 09:15:06', '2022-03-20 09:12:19', '2022-03-20 09:15:06'),
(3, 'App\\Models\\User', 5, 'admin@mail.ru', '26f17a1eb8fc8cd4a91e56bbf745ef210e2b519886b043c590fd5980be78cd6c', '[\"*\"]', '2022-03-20 09:21:20', '2022-03-20 09:21:20', '2022-03-20 09:21:20'),
(4, 'App\\Models\\User', 5, 'admin@mail.ru', 'f47784df4787d4546ce23599a244a0043fdd95adba6369f891b942f21d2d0727', '[\"*\"]', '2022-03-20 09:23:48', '2022-03-20 09:23:23', '2022-03-20 09:23:48'),
(5, 'App\\Models\\User', 5, 'admin@mail.ru', '5c1788cbf2178a64e70be90c51b253b55fca751836fc077eaece9bd6a03d1c5a', '[\"*\"]', '2022-03-21 09:49:48', '2022-03-20 09:28:35', '2022-03-21 09:49:48'),
(6, 'App\\Models\\User', 5, 'admin@mail.ru', 'ca859cee3fff5a685bb96553e28a0d14ca6aec2851b038e2586db8cf39966120', '[\"*\"]', '2022-03-21 09:50:27', '2022-03-21 09:50:27', '2022-03-21 09:50:27'),
(7, 'App\\Models\\User', 5, 'admin@mail.ru', '2f0afa4aaf144840849bcc074b429dd025fa6828d187597cf544989247a32f02', '[\"*\"]', NULL, '2022-03-21 10:18:06', '2022-03-21 10:18:06'),
(8, 'App\\Models\\User', 5, 'admin@mail.ru', 'b5a38a86e8a6eea597fa51c89697ce8e62e2734841cc55617e9e3f6ef0bd36ff', '[\"*\"]', NULL, '2022-03-21 10:26:43', '2022-03-21 10:26:43'),
(9, 'App\\Models\\User', 5, 'admin@mail.ru', 'd3ed42fe997a567c9c469af1a9f73acf98b5432ddfebf2d720a2b8dfe9d1c980', '[\"*\"]', NULL, '2022-03-21 10:44:39', '2022-03-21 10:44:39');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `products_categories_id` bigint UNSIGNED NOT NULL,
  `products_subcategories_id` bigint UNSIGNED NOT NULL,
  `sort` double NOT NULL,
  `water` double NOT NULL,
  `protein` double NOT NULL,
  `fat` double NOT NULL,
  `carbohydrates_total` double(8,2) DEFAULT NULL,
  `na` double(8,2) DEFAULT NULL,
  `k` double(8,2) DEFAULT NULL,
  `ca` double(8,2) DEFAULT NULL,
  `mg` double(8,2) DEFAULT NULL,
  `p` double(8,2) DEFAULT NULL,
  `fe` double(8,2) DEFAULT NULL,
  `i` double(8,2) DEFAULT NULL,
  `se` double(8,2) DEFAULT NULL,
  `vitamin_a` double(8,2) DEFAULT NULL,
  `vitamin_b1` double(8,2) DEFAULT NULL,
  `vitamin_b2` double(8,2) DEFAULT NULL,
  `vitamin_c` double(8,2) DEFAULT NULL,
  `vitamin_d` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `products_categories_id`, `products_subcategories_id`, `sort`, `water`, `protein`, `fat`, `carbohydrates_total`, `na`, `k`, `ca`, `mg`, `p`, `fe`, `i`, `se`, `vitamin_a`, `vitamin_b1`, `vitamin_b2`, `vitamin_c`, `vitamin_d`, `created_at`, `updated_at`) VALUES
(10, 'Хлеб пшеничный', 22, 1, 0, 37.8, 7.6, 0.8, 49.20, 499.00, 93.00, 20.00, 14.00, 65.00, 1.10, 3.20, 6.00, 0.00, 0.11, 0.03, 0.00, 0.00, '2022-05-08 09:04:26', '2022-05-08 09:04:26'),
(11, 'Молоко 3.2%', 24, 1, 0, 88.4, 2.9, 3.2, 4.70, 50.00, 146.00, 120.00, 14.00, 90.00, 0.10, 9.00, 2.00, 22.00, 0.04, 0.15, 1.30, 0.00, '2022-05-08 09:06:48', '2022-05-08 09:06:48'),
(12, 'Масло сливочное 82.5% м.д.ж', 23, 1, 0, 1.6, 0.6, 82.5, 0.80, 7.00, 15.00, 12.00, 0.00, 19.00, 0.20, 0.00, 1.00, 653.00, 0.00, 0.10, 0.00, 1.00, '2022-05-08 09:08:43', '2022-05-08 09:08:43'),
(13, 'Огурец', 12, 1, 0, 95, 0.8, 0.1, 2.50, 8.00, 141.00, 23.00, 14.00, 42.00, 0.60, 3.00, 0.30, 10.00, 0.03, 0.04, 10.00, 0.00, '2022-05-08 09:11:01', '2022-05-08 09:11:01'),
(14, 'Сыр российский', 19, 1, 0, 41, 23.2, 29.5, 0.00, 810.00, 88.00, 880.00, 35.00, 500.00, 1.00, 0.00, 14.50, 260.00, 0.04, 0.30, 0.70, 0.96, '2022-05-08 09:13:14', '2022-05-08 09:13:14'),
(15, 'Крупа гречневая ядрица', 6, 1, 0, 14, 12.6, 3.3, 57.10, 3.00, 380.00, 20.00, 200.00, 298.00, 6.70, 3.30, 5.70, 2.00, 0.43, 0.20, 0.00, 0.00, '2022-05-15 22:45:47', '2022-05-15 22:45:47'),
(17, 'Соль поваренная пищевая', 14, 1, 0, 3, 0, 0, 0.00, 37417.00, 15.00, 485.00, 97.00, 0.00, 10.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2022-05-15 22:51:34', '2022-05-15 22:51:34'),
(18, 'Вода', 17, 1, 0, 100, 0, 0, 0.00, 0.00, 0.00, 35.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2022-05-15 22:53:26', '2022-05-15 22:53:26'),
(19, 'Смородина черная', 21, 1, 0, 83.1, 1, 0.4, 7.30, 32.00, 350.00, 36.00, 31.00, 33.00, 1.30, 1.00, 1.10, 17.00, 0.03, 0.04, 200.00, 0.00, '2022-05-15 22:56:42', '2022-05-15 22:56:42'),
(21, 'Яйцо куриное', 18, 1, 0, 74.1, 12.7, 11.5, 0.70, 134.00, 140.00, 55.00, 12.00, 192.00, 2.50, 20.00, 30.70, 260.00, 0.07, 0.44, 0.00, 2.20, '2022-05-16 00:17:29', '2022-05-16 00:17:29'),
(22, 'Мука пшеничная высший сорт', 13, 1, 0, 14, 10.8, 1.3, 70.00, 3.00, 122.00, 18.00, 16.00, 86.00, 1.20, 1.50, 6.00, 0.00, 0.17, 0.04, 0.00, 0.00, '2022-05-16 00:20:04', '2022-05-16 00:20:04'),
(23, 'Сахар-песок', 9, 1, 0, 0.14, 0, 0, 99.80, 1.00, 3.00, 2.00, 0.00, 0.00, 0.30, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2022-05-16 09:19:41', '2022-05-16 09:19:41'),
(24, 'Горбуша (филе)', 10, 1, 0, 71.8, 20.5, 6.5, 0.00, 70.00, 335.00, 20.00, 30.00, 200.00, 0.60, 50.00, 44.60, 30.00, 0.20, 0.16, 0.90, 0.01, '2022-05-16 09:35:14', '2022-05-16 09:35:14');

-- --------------------------------------------------------

--
-- Структура таблицы `products_categories`
--

CREATE TABLE `products_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products_categories`
--

INSERT INTO `products_categories` (`id`, `name`, `sort`, `created_at`, `updated_at`) VALUES
(1, 'Дрожжи хлебопекарные', 330, NULL, NULL),
(2, 'Картофель', 90, NULL, NULL),
(3, 'Какао-порошок', 310, NULL, NULL),
(4, 'Колбасные изделия', 180, NULL, NULL),
(5, 'Кондитерские изделия', 290, NULL, NULL),
(6, 'Крупы, бобовые', 60, NULL, NULL),
(7, 'Макаронные изделия', 70, NULL, NULL),
(8, 'Масло растительное', 250, NULL, NULL),
(9, 'Сахар', 270, NULL, NULL),
(10, 'Рыба', 170, NULL, NULL),
(11, 'Сметана', 230, NULL, NULL),
(12, 'Овощи', 100, NULL, NULL),
(13, 'Мука пшеничная', 40, NULL, NULL),
(14, 'Соль', 350, NULL, NULL),
(15, 'Специи', 360, NULL, NULL),
(16, 'Мясо жилованое', 140, NULL, NULL),
(17, 'Иные продукты', 370, NULL, NULL),
(18, 'Яйцо', 260, NULL, NULL),
(19, 'Сыр', 220, NULL, NULL),
(20, 'Чай', 300, NULL, NULL),
(21, 'Фрукты свежие', 110, NULL, NULL),
(22, 'Хлеб', 20, NULL, NULL),
(23, 'Масло сливочное', 240, NULL, NULL),
(24, 'Молоко и молочные продукты', 190, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `products_subcategories`
--

CREATE TABLE `products_subcategories` (
  `id` bigint UNSIGNED NOT NULL,
  `products_categories_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products_subcategories`
--

INSERT INTO `products_subcategories` (`id`, `products_categories_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Безглютеновые продукты', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `recipes_collections`
--

CREATE TABLE `recipes_collections` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization_id` int NOT NULL,
  `year` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `recipes_collections`
--

INSERT INTO `recipes_collections` (`id`, `name`, `short_title`, `organization_id`, `year`, `created_at`, `updated_at`) VALUES
(1, 'Мой сборник', 'Мой сборник', 1, 2020, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2022-01-07 01:44:17', '2022-01-07 01:44:17'),
(2, 'writer', 'web', '2022-01-07 08:14:30', '2022-01-07 08:14:30');

-- --------------------------------------------------------

--
-- Структура таблицы `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'adadada', 'asdasdad', NULL, '$2y$10$/5gtgVQWP2/IdU3iIBP9yeC41QI.e/E0yr5oGRenqsSIkQzWJr8E6', NULL, '2021-11-05 09:50:20', '2021-11-05 09:50:20'),
(2, 'asdasd', 'erer@mail.ru', NULL, '$2y$10$8jpEOF7vn60U21M/nbNNaeoR2R1DyPJ/xzCNf8uUnEg.Llyn9np5e', NULL, '2021-11-05 09:50:48', '2021-11-05 09:50:48'),
(3, 'ruslan', 'ruslan@mail.ru', NULL, '$2y$10$/Whb9CixrQmthiIggncxYOlLLDYdCagEbL6F86U0RDBOxEDEarUVy', NULL, '2021-11-06 05:14:44', '2021-11-06 05:14:44'),
(5, 'adminlaravel@mail.ru', 'adminlaravel@mail.ru', NULL, '$2y$10$KxbThjp5LzgKJoEiT7WHQu2pH3O3ifOA3dUsDBfHdhR0qf6jzQtv6', NULL, '2022-01-07 09:06:02', '2022-01-07 09:06:02'),
(7, 'ruslan', 'admin@mail.ru', NULL, '$2y$10$OG2lGoTBdRwGdHVh52klx..TDEAzvw5hYomfRohK68MJqhVfvv5He', NULL, '2022-03-21 11:06:56', '2022-03-21 11:06:56'),
(8, 'fhfghf', 'fhfghf@mail.ru', NULL, '$2y$10$qWU1jZGcPi6uEVZrp/.iK.GowLafChTANPlm5Kv6Y6GlcQjzvlIoi', NULL, '2022-07-23 08:30:42', '2022-07-23 08:30:42');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `culinary_processings`
--
ALTER TABLE `culinary_processings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dishes_dishes_categories_id_index` (`dishes_categories_id`),
  ADD KEY `dishes_recipes_collections_id_index` (`recipes_collections_id`),
  ADD KEY `dishes_culinary_processings_id_index` (`culinary_processings_id`);

--
-- Индексы таблицы `dishes_categories`
--
ALTER TABLE `dishes_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `dishes_products`
--
ALTER TABLE `dishes_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dishes_products_dishes_id_index` (`dishes_id`),
  ADD KEY `dishes_products_products_id_index` (`products_id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu_days`
--
ALTER TABLE `menu_days`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_days_menu_id_index` (`menu_id`),
  ADD KEY `menu_days_days_id_index` (`days_id`);

--
-- Индексы таблицы `menu_dishes`
--
ALTER TABLE `menu_dishes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_dishes_menu_id_index` (`menu_id`),
  ADD KEY `menu_dishes_dishes_id_index` (`dishes_id`);

--
-- Индексы таблицы `menu_nutrition`
--
ALTER TABLE `menu_nutrition`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_nutrition_menu_id_index` (`menu_id`),
  ADD KEY `menu_nutrition_nutrition_id_index` (`nutrition_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Индексы таблицы `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Индексы таблицы `nutritions`
--
ALTER TABLE `nutritions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_products_categories_id_index` (`products_categories_id`),
  ADD KEY `products_products_subcategories_id_index` (`products_subcategories_id`);

--
-- Индексы таблицы `products_categories`
--
ALTER TABLE `products_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products_subcategories`
--
ALTER TABLE `products_subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_subcategories_products_categories_id_index` (`products_categories_id`);

--
-- Индексы таблицы `recipes_collections`
--
ALTER TABLE `recipes_collections`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Индексы таблицы `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `culinary_processings`
--
ALTER TABLE `culinary_processings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `days`
--
ALTER TABLE `days`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `dishes_categories`
--
ALTER TABLE `dishes_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `dishes_products`
--
ALTER TABLE `dishes_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `menu_days`
--
ALTER TABLE `menu_days`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `menu_dishes`
--
ALTER TABLE `menu_dishes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `menu_nutrition`
--
ALTER TABLE `menu_nutrition`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `nutritions`
--
ALTER TABLE `nutritions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `products_categories`
--
ALTER TABLE `products_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `products_subcategories`
--
ALTER TABLE `products_subcategories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `recipes_collections`
--
ALTER TABLE `recipes_collections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `dishes`
--
ALTER TABLE `dishes`
  ADD CONSTRAINT `dishes_culinary_processings_id_foreign` FOREIGN KEY (`culinary_processings_id`) REFERENCES `culinary_processings` (`id`),
  ADD CONSTRAINT `dishes_dishes_categories_id_foreign` FOREIGN KEY (`dishes_categories_id`) REFERENCES `dishes_categories` (`id`),
  ADD CONSTRAINT `dishes_recipes_collections_id_foreign` FOREIGN KEY (`recipes_collections_id`) REFERENCES `recipes_collections` (`id`);

--
-- Ограничения внешнего ключа таблицы `dishes_products`
--
ALTER TABLE `dishes_products`
  ADD CONSTRAINT `dishes_products_dishes_id_foreign` FOREIGN KEY (`dishes_id`) REFERENCES `dishes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dishes_products_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `menu_days`
--
ALTER TABLE `menu_days`
  ADD CONSTRAINT `menu_days_days_id_foreign` FOREIGN KEY (`days_id`) REFERENCES `days` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `menu_days_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `menu_dishes`
--
ALTER TABLE `menu_dishes`
  ADD CONSTRAINT `menu_dishes_dishes_id_foreign` FOREIGN KEY (`dishes_id`) REFERENCES `dishes` (`id`),
  ADD CONSTRAINT `menu_dishes_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `menu_nutrition`
--
ALTER TABLE `menu_nutrition`
  ADD CONSTRAINT `menu_nutrition_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `menu_nutrition_nutrition_id_foreign` FOREIGN KEY (`nutrition_id`) REFERENCES `nutritions` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_products_categories_id_foreign` FOREIGN KEY (`products_categories_id`) REFERENCES `products_categories` (`id`),
  ADD CONSTRAINT `products_products_subcategories_id_foreign` FOREIGN KEY (`products_subcategories_id`) REFERENCES `products_subcategories` (`id`);

--
-- Ограничения внешнего ключа таблицы `products_subcategories`
--
ALTER TABLE `products_subcategories`
  ADD CONSTRAINT `products_subcategories_products_categories_id_foreign` FOREIGN KEY (`products_categories_id`) REFERENCES `products_categories` (`id`);

--
-- Ограничения внешнего ключа таблицы `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
