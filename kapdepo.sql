-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 28 2021 г., 13:01
-- Версия сервера: 5.7.20
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kapdepo`
--

-- --------------------------------------------------------

--
-- Структура таблицы `achievements`
--

CREATE TABLE `achievements` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `achievements`
--

INSERT INTO `achievements` (`id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Test  11', 'achievments/3p2So0FmTaKOhmQjqs6elqVU9olq9nfQPz3xHwIV.png', '2020-12-24 00:08:44', '2020-12-24 00:10:49'),
(2, 'test 2', 'achievments/IOIVciag49ykec4Z2A3oogk0ag9qC6mJWKF9GX5j.png', '2020-12-24 00:09:18', '2020-12-24 00:09:18'),
(3, 'test 3', 'achievments/PirgSFcwLuErGrSXOYCnyNdmIJfD8V1bKpJM3DFK.png', '2020-12-24 00:09:30', '2020-12-24 00:09:30'),
(5, 'test 54', 'achievments/EymqyXzyLeoWjuJBVaaS8LknX1Wvms9e02nsDhEe.png', '2020-12-24 00:46:35', '2020-12-24 00:46:35');

-- --------------------------------------------------------

--
-- Структура таблицы `analysises`
--

CREATE TABLE `analysises` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `analysises`
--

INSERT INTO `analysises` (`id`, `company_id`, `title`, `lang`, `image`, `desc`, `created_at`, `updated_at`) VALUES
(4, 5, 'dsadsadsa', 'ru', 'analysis/lWBtIilhTlbwklC3iEg4gL6qVEE5W3mjKUfT8VD3.png', '<p>dsads ad sad adsad as dsadas&nbsp; dsadsa&nbsp; dsadsadsa d asdsa dsa&nbsp;</p>', '2020-11-03 21:07:44', '2020-11-03 21:07:44'),
(5, 5, 'Test', 'ru', 'analysis/8u9snUjOgPQsJOaLJKBm4TyO3Zx9sAVDYyTRcL2K.pdf', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2020-11-03 21:52:46', '2020-11-03 22:11:10'),
(6, 5, 'New title', 'ru', 'analysis/msMUw5fknA8VoH64Cs0F97j4dmgfmqWDCu5uwYHU.pdf', '<p>New titleNew titleNew title&nbsp;New titleNew titleNew title</p>', '2020-11-04 09:00:47', '2020-11-04 09:00:47'),
(7, 5, 'dsadsadsaen', 'en', 'analysis/lWBtIilhTlbwklC3iEg4gL6qVEE5W3mjKUfT8VD3.png', '<p>dsads ad sad adsad as dsadas&nbsp; dsadsa&nbsp; dsadsadsa d asdsa dsa&nbsp;</p>en', '2020-11-04 09:01:54', '2020-11-04 09:01:54');

-- --------------------------------------------------------

--
-- Структура таблицы `analytics`
--

CREATE TABLE `analytics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ava` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `analytics`
--

INSERT INTO `analytics` (`id`, `name`, `title`, `body`, `file`, `ava`, `lang`, `parent_id`, `created_at`, `updated_at`) VALUES
(4, 'Admin', 'Analytics data every day updating', '<p>Analytics data every day updating &nbsp;Analytics data every day updating &nbsp;Analytics data every day updating &nbsp;Analytics data every day updating &nbsp;Analytics data every day updating &nbsp;Analytics data every day updating &nbsp;Analytics data every day updating &nbsp;Analytics data every day updating &nbsp;Analytics data every day updating &nbsp;Analytics data every day updating &nbsp;Analytics data every day updating &nbsp;Analytics data every day updating &nbsp;Analytics data every day updating &nbsp;Analytics data every day updating &nbsp;Analytics data every day updating &nbsp;</p>', 'analytics/2unTASUFQAkDydZJQoRyso7xTpVbbbpWsVd3Mcqt.pdf', 'analytics/DXjV2RjQNOU8Y9QVAg52YGpFAfGEzOsZcazY3Eey.jpeg', 'ru', NULL, '2020-11-15 11:00:49', '2020-11-15 11:00:49');

-- --------------------------------------------------------

--
-- Структура таблицы `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ban_id` int(11) DEFAULT NULL,
  `published` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `banners`
--

INSERT INTO `banners` (`id`, `title`, `path`, `link`, `lang`, `ban_id`, `published`, `created_at`, `updated_at`) VALUES
(6, 'Кокандский суперфосфатный завод продали иностранцам', 'banners/hhFOXAeRepUGoBqUL5xAX02Mqc9df3p44U1G8Yqk.jpeg', NULL, 'ru', NULL, 1, '2020-01-05 06:06:45', '2020-01-05 06:06:45'),
(7, 'Кокандский суперфосфатный завод продали иностранцам en', 'banners/hhFOXAeRepUGoBqUL5xAX02Mqc9df3p44U1G8Yqk.jpeg', NULL, 'en', 6, 1, '2020-01-06 05:28:20', '2020-01-06 05:28:20');

-- --------------------------------------------------------

--
-- Структура таблицы `bonds`
--

CREATE TABLE `bonds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issuer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_in` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_out` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `bonds`
--

INSERT INTO `bonds` (`id`, `title`, `issuer`, `image`, `date_in`, `date_out`, `price`, `percent`, `company_id`, `created_at`, `updated_at`) VALUES
(2, 'te', 'te', 'bonds/jBxWIGAmW5QKTWX8eluHxO9y65CWqSOxdQUTDXVn.png', 'te', 'te', 'te', 'te', 5, '2020-11-16 14:27:41', '2020-11-16 14:27:41'),
(3, 'dsadsa1', 'dsadsa1', 'bonds/V94fhwpxyCUBLNOyAtdHyZpU02PibPoAXEWm6hQn.png', '17.07.2024', '6', '1300.40', '15.06', NULL, '2020-11-16 14:46:07', '2020-11-16 15:02:04');

-- --------------------------------------------------------

--
-- Структура таблицы `branches`
--

CREATE TABLE `branches` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_one` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_two` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `branches`
--

INSERT INTO `branches` (`id`, `title`, `address`, `lang`, `branch_id`, `longitude`, `latitude`, `phone_one`, `phone_two`, `link`, `created_at`, `updated_at`) VALUES
(6, 'Kapital-depozit', 'ул. Аккурган, 25', 'ru', NULL, '69.304688', '41.328180', '90 991 99 99', '90 991 99 99', 'https://yandex.uz/maps/-/CCUANXa7LC', '2020-01-07 05:39:41', '2020-11-16 20:57:01');

-- --------------------------------------------------------

--
-- Структура таблицы `buy_stocks`
--

CREATE TABLE `buy_stocks` (
  `kzl` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity_items` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_items` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `certificates`
--

CREATE TABLE `certificates` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `public` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `certificates`
--

INSERT INTO `certificates` (`id`, `title`, `image`, `public`, `created_at`, `updated_at`) VALUES
(1, 'Сертификат 1', 'certificates/CAqxuabARiQP6GdmokkgPHxlqYFpnf2qJpclR00Z.jpeg', 1, '2020-01-11 05:29:58', '2020-01-11 05:29:58'),
(2, 'Лицензия', 'certificates/u8AZX9utrS84IiiLgoYcObrSlANSyuNbGTCzofXL.jpeg', 1, '2020-01-11 05:30:27', '2020-01-11 05:30:27'),
(3, 'Сертификат 2', 'certificates/7iWcZluneMp1bBh3RFyEXEHZPVxgyJ0qHtCk9y3K.jpeg', 1, '2020-01-11 05:33:17', '2020-01-11 05:33:17'),
(4, 'Лицензия 2', 'certificates/jK8tmRolydesdu3oRif5RG7Kij0ndTHa1scF7v0q.jpeg', 1, '2020-01-11 05:34:50', '2020-01-11 05:34:50');

-- --------------------------------------------------------

--
-- Структура таблицы `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issuer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kdindex` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `companies`
--

INSERT INTO `companies` (`id`, `title`, `isin`, `issuer`, `image`, `kdindex`, `created_at`, `updated_at`) VALUES
(5, 'Hamkorbank', 'UZ7011340005', 'HMKB', 'company/RIK7vuv4HGiSmaDhuspLTGuYI3hIEbHEtuBTPutH.png', 1, '2020-10-11 15:46:57', '2020-10-11 15:46:57'),
(6, 'test', 'test', 'QZSM', 'company/nWSctxcHL0qKmvMPxqxULFpwwBBOsJ4TXZcewSZQ.png', NULL, '2020-10-20 21:53:26', '2020-10-20 21:53:26'),
(7, 'test 3', 'UZ7021720006', 'URTS', 'company/RgDVhkE2bW3Hfv9h7ZUxij6AihPriun8lqGRlqLJ.png', 0, '2020-11-17 09:47:45', '2020-11-17 09:47:45');

-- --------------------------------------------------------

--
-- Структура таблицы `companies_data`
--

CREATE TABLE `companies_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `last_price` double(8,2) NOT NULL,
  `volume` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `companies_data`
--

INSERT INTO `companies_data` (`id`, `company_id`, `last_price`, `volume`, `time`, `date`, `timestamp`, `created_at`, `updated_at`) VALUES
(82, 5, 15.00, '1', '14:00:00', '2020-11-12', 1604480400, '2020-11-12 09:43:11', '2020-11-12 09:43:11'),
(83, 5, 14.00, '1', '13:00:00', '2020-11-12', 1604476800, '2020-11-12 09:43:11', '2020-11-12 09:43:11'),
(84, 6, 20.00, '1', '14:00:00', '2020-11-12', 1604480400, '2020-11-12 09:45:01', '2020-11-12 09:45:01'),
(85, 5, 12.00, '1', '14:00:00', '2020-10-12', 1602493200, '2020-11-12 09:51:06', '2020-11-12 09:51:06'),
(86, 6, 25.00, '1', '14:00:00', '2020-10-12', 1602493200, '2020-11-12 09:51:44', '2020-11-12 09:51:44');

-- --------------------------------------------------------

--
-- Структура таблицы `companies_detail`
--

CREATE TABLE `companies_detail` (
  `company_id` int(10) UNSIGNED NOT NULL,
  `common_stocks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_e` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_b` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dividend` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capitalization` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preference` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `face` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free_procent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free_quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `companies_detail`
--

INSERT INTO `companies_detail` (`company_id`, `common_stocks`, `p_e`, `p_b`, `dividend`, `capitalization`, `preference`, `face`, `free_procent`, `free_quantity`, `created_at`, `updated_at`) VALUES
(5, '10000', '0.00', '0.00', NULL, '0.00', '500', '0.00', '25', '2500', '2020-10-11 15:46:57', '2020-11-04 09:05:17'),
(6, '1000', '0.00', '0.00', NULL, '0.00', NULL, '0.00', '10', '100', '2020-10-20 21:53:26', '2020-11-12 09:39:55'),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-17 09:47:45', '2020-11-17 09:47:45');

-- --------------------------------------------------------

--
-- Структура таблицы `companies_info`
--

CREATE TABLE `companies_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `site` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sector` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `industry` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `companies_info`
--

INSERT INTO `companies_info` (`id`, `company_id`, `lang`, `desc`, `site`, `address`, `phone`, `sector`, `industry`, `created_at`, `updated_at`) VALUES
(6, 5, 'ru', '<p>test test 213143141421&nbsp;</p>', 'test.site 321321', 'test address 111111', 'test phone 231321', 'test sector 321 3', 'test indust321', '2020-10-11 15:46:57', '2021-01-05 08:48:17'),
(7, 6, 'ru', NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-20 21:53:26', '2020-10-20 21:53:26'),
(8, 5, 'en', '<p>test en</p>', 'testen', 'testen', 'testen', 'testen', 'testen', '2020-11-03 14:40:18', '2021-01-05 08:47:25'),
(9, 7, 'ru', NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-17 09:47:45', '2020-11-17 09:47:45'),
(10, 5, 'uz', '<p>test uz</p>', 'testuz', 'test uz', 'testuz', 'testuz', 'testuz', '2021-01-05 08:42:14', '2021-01-05 08:48:10');

-- --------------------------------------------------------

--
-- Структура таблицы `dividends`
--

CREATE TABLE `dividends` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED DEFAULT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sum` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `procent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `dividends`
--

INSERT INTO `dividends` (`id`, `company_id`, `year`, `sum`, `procent`, `created_at`, `updated_at`) VALUES
(1, 5, '2001', '10000000', '10', '2020-12-09 10:27:08', '2020-12-09 10:27:08'),
(2, 5, '2002', '100000003', '14', '2020-12-09 10:27:22', '2020-12-09 10:27:22');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `indices`
--

CREATE TABLE `indices` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `index` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count_stock` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `indices`
--

INSERT INTO `indices` (`id`, `date`, `index`, `count_stock`, `created_at`, `updated_at`) VALUES
(1, '16.01.2020', '5000', NULL, '2020-01-16 15:41:58', '2020-01-16 15:41:58'),
(2, '15.01.2020', '4900', NULL, '2020-01-16 19:00:00', '2020-01-16 19:00:00'),
(3, '14.01.2020', '5000', NULL, '2020-01-16 19:00:00', '2020-01-16 19:00:00'),
(4, '13.01.2020', '3000', NULL, '2020-01-16 19:00:00', '2020-01-16 19:00:00'),
(5, '12.01.2020', '5050', NULL, '2020-01-16 19:00:00', '2020-01-16 19:00:00'),
(6, '11.01.2020', '5000', NULL, NULL, NULL),
(7, '10.01.2020', '5000', NULL, '2020-01-16 19:00:00', '2020-01-16 19:00:00'),
(8, '09.01.2020', '5500', NULL, '2020-01-16 19:00:00', '2020-01-16 19:00:00'),
(9, '08.01.2020', '6000', NULL, '2020-01-16 19:00:00', '2020-01-16 19:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `keys`
--

CREATE TABLE `keys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `keys`
--

INSERT INTO `keys` (`id`, `name`, `position`, `lang`, `company_id`, `created_at`, `updated_at`) VALUES
(6, 'admin', 'test', 'ru', 5, '2020-11-03 18:57:04', '2020-11-03 18:57:04'),
(7, 'Ivanov Ivan Ivanovich', 'Director', 'ru', 5, '2020-11-04 08:58:24', '2020-11-04 08:58:24');

-- --------------------------------------------------------

--
-- Структура таблицы `market_reports`
--

CREATE TABLE `market_reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quarter` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `title`, `subtitle`, `body`, `lang`, `path`, `parent_id`, `order`, `published`, `created_at`, `updated_at`) VALUES
(7, 'О нас', 'KAPDEPO осуществляет многовекторную деятельность на рынке ценных бумаг, в связи с чем определены следующие миссии компании:', '- Превратить трейдинг и инвестиции в интересное и доступное увлечение\r\n- Усилить компании страны, помогая им внедрять стандарты корпоративного управления\r\n- Заботиться об активах своих клиентов, помогая улучшить финансовую жизнь', 'ru', 'about-us', NULL, 0, 1, '2020-01-05 12:24:16', '2020-12-03 10:19:56'),
(8, 'Наши предложения', 'Что такое трэйдинг ?', 'Это финансовый инструмент. С его помощью наблюдают за изменением стоимости популярных активов: акций, металлов, фондовых индексов и нефти. На платформе можно изучать торговые стратегии и прогнозировать стоимость. Процесс совершения сделок называется торгами, а торгующий — трейдером.', 'ru', 'our-offers', NULL, 1, 1, '2020-01-05 12:24:26', '2021-01-26 22:02:08'),
(9, 'Контакты', 'Как приобрести акции ?', 'Для приобретения акций существует специальная платформа (биржа), где осуществляется купля-продажа акций. Для покупки или продажи акций Вы должны зарегистрироваться в брокерском доме (у брокера), где он предоставит Вам доступ к платформе.', 'ru', 'contacts', NULL, 3, 1, '2020-01-05 12:24:36', '2020-11-19 13:08:38'),
(12, 'About us', 'dsads', 'sdadsa', 'en', '/about-us', NULL, 0, 1, '2020-01-06 08:35:58', '2020-03-24 09:00:45'),
(13, 'Частным клиентам', NULL, NULL, 'ru', 'private', 8, 0, 1, '2020-01-13 13:29:13', '2020-11-22 17:23:56'),
(14, 'Корпоративным клиентам и институциональным клиентам', NULL, NULL, 'ru', 'corporate', 8, 1, 1, '2020-01-13 13:30:17', '2020-11-22 17:24:04'),
(15, 'Наша команда', NULL, NULL, 'ru', 'about-us#team', 7, 1, 1, '2020-01-13 13:57:38', '2020-12-06 17:07:11'),
(16, 'Достижения', NULL, NULL, 'ru', 'about-us#achievments', 7, 4, 1, '2020-01-13 13:58:21', '2020-12-24 00:19:56'),
(17, 'Миссия', NULL, NULL, 'ru', 'about-us#section-bg8', 7, 2, 1, '2020-01-13 13:58:44', '2020-11-19 10:46:36'),
(18, 'Лицензии', NULL, NULL, 'ru', 'about-us#certificates', 7, 3, 1, '2020-01-13 14:01:40', '2020-11-19 13:06:32'),
(19, 'История возникновения', NULL, NULL, 'ru', 'about-us#history_block', 7, 0, 1, '2020-01-13 14:02:45', '2020-11-19 10:49:18'),
(20, 'KD IDEAS', NULL, NULL, 'ru', 'kd-ideas', 8, 2, 1, '2020-01-13 14:39:14', '2020-11-19 13:02:46'),
(21, 'Our offers', NULL, NULL, 'en', '#', NULL, 0, 1, '2020-03-24 08:56:08', '2020-03-24 08:56:08'),
(22, 'Contacts', NULL, NULL, 'en', '/contacts', NULL, 0, 1, '2020-03-24 08:56:33', '2020-03-24 09:01:27'),
(23, 'Biz haqimizda', NULL, NULL, 'uz', '/about-us', NULL, 0, 1, '2020-03-24 09:26:03', '2020-03-24 09:26:03'),
(24, 'Aloqa', NULL, NULL, 'uz', '/contacts', NULL, 2, 1, '2020-03-24 09:26:57', '2020-03-24 09:31:51'),
(25, 'Bizning takliflarimiz', NULL, NULL, 'uz', '#', NULL, 1, 1, '2020-03-24 09:31:41', '2020-03-24 09:31:51'),
(26, 'Новости', 'Новости фондового рынка и экономики Узбекистана.', 'Статьи об инвестициях и финансовых инструментах.', 'ru', '#', NULL, 2, 1, '2020-10-11 17:20:21', '2020-12-23 18:57:30'),
(27, 'Полезные статьи', NULL, NULL, 'ru', 'news/World', 26, 0, 1, '2020-10-11 17:21:07', '2020-12-03 11:12:51'),
(28, 'Новости фондового рынка Узбекистана', NULL, NULL, 'ru', 'news/Uzbekistan', 26, 1, 1, '2020-10-11 17:21:21', '2020-12-03 11:13:06'),
(29, '1.	KD index', NULL, NULL, 'ru', 'kd-ideas/index', 20, 0, 1, '2020-11-09 14:00:09', '2020-12-03 11:06:22'),
(30, '2.	KD analytics', NULL, NULL, 'ru', 'kd-ideas#analytics', 20, 1, 1, '2020-11-09 14:35:44', '2020-11-22 18:47:12'),
(31, '1.	Операции на рынке акций', NULL, NULL, 'ru', 'corporate#stock-market-operations', 14, 0, 1, '2020-11-09 14:37:05', '2020-11-22 20:48:30'),
(32, '2.	Операции на рынке облигаций', NULL, NULL, 'ru', 'corporate#operations-bond-market', 14, 1, 1, '2020-11-09 14:37:53', '2020-11-22 20:50:23'),
(33, '3.	Слияния и поглощения', NULL, NULL, 'ru', 'corporate#mergers-acquisitions', 14, 2, 1, '2020-11-09 14:38:14', '2020-11-22 20:52:16'),
(34, '4.	Управление активами', NULL, NULL, 'ru', 'corporate#asset-management', 14, 3, 1, '2020-11-09 14:38:34', '2020-11-22 20:53:52'),
(35, '5.	Депозитарный сервис', NULL, NULL, 'ru', 'corporate#deposit-service', 14, 4, 1, '2020-11-09 14:38:58', '2020-11-22 20:56:00'),
(36, '6.	Консалтинг', NULL, NULL, 'ru', 'corporate#consulting', 14, 5, 1, '2020-11-09 14:39:22', '2020-11-22 20:57:50'),
(37, '1.	Трейдинг', NULL, NULL, 'ru', 'private#trading', 13, 0, 1, '2020-11-09 14:40:22', '2020-12-24 12:30:56'),
(38, 'Тарифы', 'Гибкие тарифные планы, подходящие вашим целям', NULL, 'ru', 'private#tariff', 8, 3, 1, '2020-11-09 14:40:38', '2020-12-23 19:05:13'),
(40, '5.	Доверительное управление', NULL, NULL, 'ru', 'private#trust-management', 13, 4, 1, '2020-11-09 14:40:56', '2020-12-24 12:30:22'),
(41, '2.	Портфельные инвестиции', NULL, NULL, 'ru', 'private#portfolio-investment', 13, 1, 1, '2020-11-09 14:41:05', '2020-12-24 12:30:50'),
(42, '3.	Депозитарный сервис', NULL, NULL, 'ru', 'private#deposit-service', 13, 2, 1, '2020-11-09 14:41:13', '2020-12-24 12:30:42'),
(43, '4.	Частные сделки', NULL, NULL, 'ru', 'private#private-deals', 13, 3, 1, '2020-11-09 14:41:22', '2020-12-24 12:30:33'),
(44, 'Рыночные данные', NULL, NULL, 'ru', 'market-data', NULL, 4, 1, '2020-12-03 14:46:48', '2020-12-03 14:49:39');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(130, '2014_10_12_100000_create_password_resets_table', 1),
(132, '2019_12_04_110648_create_banners_table', 1),
(137, '2019_12_17_115335_create_certificates_table', 1),
(138, '2019_12_21_134452_create_images_table', 1),
(142, '2019_12_08_200751_create_branches_table', 5),
(146, '2019_11_26_092223_create_menu_table', 6),
(150, '2019_12_10_121645_create_team_table', 7),
(151, '2020_01_08_120159_create_settings_table', 8),
(152, '2020_01_08_120445_create_socials_table', 8),
(153, '2020_01_09_112716_create_pages_table', 9),
(155, '2020_01_10_094242_create_setting_file', 10),
(159, '2020_01_09_120932_create_tariff_table', 11),
(163, '2020_01_14_112225_create_stories_table', 12),
(164, '2020_01_14_150044_add_field_news', 13),
(166, '2019_12_08_200421_create_news_table', 14),
(167, '2019_12_28_130035_create_statistics_table', 15),
(169, '2020_01_16_111204_create_stocks_table', 16),
(170, '2020_01_16_114402_create_indices_table', 17),
(172, '2020_01_20_100156_add_field_stocks_table', 18),
(173, '2014_10_12_000000_create_users_table', 19),
(174, '2016_06_01_000001_create_oauth_auth_codes_table', 20),
(175, '2016_06_01_000002_create_oauth_access_tokens_table', 20),
(176, '2016_06_01_000003_create_oauth_refresh_tokens_table', 20),
(177, '2016_06_01_000004_create_oauth_clients_table', 20),
(178, '2016_06_01_000005_create_oauth_personal_access_clients_table', 20),
(181, '2019_12_10_114634_create_partners_table', 21),
(186, '2020_01_29_094556_create_data_table', 25),
(190, '2020_02_03_121645_create_data_finance_table', 28),
(196, '2020_01_30_091123_create_finance_dictionary_table', 29),
(198, '2020_02_03_100003_create_buh_dictionary_table', 30),
(199, '2020_02_03_125357_create_data_buh_table', 31),
(208, '2020_02_13_142635_create_sell_stocks_table', 37),
(209, '2020_02_13_142705_create_buy_stocks_table', 38),
(211, '2020_02_19_115619_create_pnl_data_table', 39),
(212, '2020_02_13_144104_create_stocks_info_table', 40),
(214, '2020_03_30_153216_create_seos_table', 42),
(219, '2020_07_09_203605_create_market_reports_table', 45),
(238, '2020_08_10_092250_create_companies_detail_table', 46),
(239, '2020_08_17_120951_create_companies_data_table', 46),
(241, '2020_01_29_094409_create_companies_table', 47),
(243, '2020_08_24_153119_create_companies_info_table', 48),
(245, '2020_09_25_031859_create_orders_paynet_table', 49),
(246, '2020_11_03_203125_create_keys_table', 50),
(247, '2020_11_04_000857_create_analysises_table', 51),
(248, '2020_11_12_030908_create_preference_data_table', 52),
(250, '2020_11_15_144036_create_analytics_table', 53),
(254, '2020_11_16_182043_create_bonds_table', 54),
(256, '2020_12_07_023001_create_dividends_table', 55),
(257, '2020_12_24_045118_create_achievements_table', 56);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `public` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `desc`, `image`, `body`, `lang`, `parent_id`, `category_id`, `public`, `created_at`, `updated_at`) VALUES
(4, 'test 1 New  World', 'test-1-new-world', 'Кокандский суперфосфатный завод продали иностранцам', 'news/X4so7bQcmHfQ7FkB0o5lEElF25d6nxTgQAlAMeBY.jpeg', '<p>Кокандский суперфосфатный завод продали иностранцамКокандский суперфосфатный завод продали иностранцамКокандский суперфосфатный завод продали иностранцамКокандский суперфосфатный завод продали иностранцамКокандский суперфосфатный завод продали иностранцамКокандский суперфосфатный завод продали иностранцамКокандский суперфосфатный завод продали иностранцам</p>', 'ru', NULL, 1, 1, '2020-10-11 22:34:08', '2020-10-11 22:34:08'),
(5, 'test 2  New Uzbekistan', 'test-2-new-uzbekistan', 'Кокандский суперфосфатный завод продали иностранцам', 'news/FhdNKAO8MGVOzvda0ucMZZPPWIlYL98bECCh8qqy.jpeg', '<p>Кокандский суперфосфатный завод продали иностранцамКокандский суперфосфатный завод продали иностранцамКокандский суперфосфатный завод продали иностранцамКокандский суперфосфатный завод продали иностранцамКокандский суперфосфатный завод продали иностранцамКокандский суперфосфатный завод продали иностранцамКокандский суперфосфатный завод продали иностранцам</p>', 'ru', NULL, 2, 1, '2020-10-11 22:34:37', '2020-11-12 09:32:25'),
(6, 'test 1 New  World en', 'test-1-new-world-en', 'Кокандский суперфосфатный завод продали иностранцам', 'news/X4so7bQcmHfQ7FkB0o5lEElF25d6nxTgQAlAMeBY.jpeg', '<p>Кокандский суперфосфатный завод продали иностранцамКокандский суперфосфатный завод продали иностранцамКокандский суперфосфатный завод продали иностранцамКокандский суперфосфатный завод продали иностранцамКокандский суперфосфатный завод продали иностранцамКокандский суперфосфатный завод продали иностранцамКокандский суперфосфатный завод продали иностранцам</p>', 'en', 4, NULL, 1, '2020-10-11 22:41:44', '2020-10-11 22:44:23'),
(7, 'test 1 New  World uz', 'test-1-new-world-uz', 'Кокандский суперфосфатный завод продали иностранцам', 'news/X4so7bQcmHfQ7FkB0o5lEElF25d6nxTgQAlAMeBY.jpeg', '<p>Кокандский суперфосфатный завод продали иностранцамКокандский суперфосфатный завод продали иностранцамКокандский суперфосфатный завод продали иностранцамКокандский суперфосфатный завод продали иностранцамКокандский суперфосфатный завод продали иностранцамКокандский суперфосфатный завод продали иностранцамКокандский суперфосфатный завод продали иностранцам</p>', 'uz', 4, 1, 1, '2020-10-11 22:44:28', '2020-10-11 22:44:28'),
(8, 'Test news cat world 1', 'test-news-cat-world-1', 'Стандартный евроремонт может «освежить» вашу квартиру, но вряд ли добавит ей оригинальность и, 1', 'news/TLuDMtG6mVX7JPC1i05nm20svbMR10nTqd3KAFjW.jpeg', '<p>Стандартный евроремонт может &laquo;освежить&raquo; вашу квартиру, но вряд ли добавит ей оригинальность и, тем более, лишние квадратные метры. Однако не стоит забывать, что современный дизайн интерьера не стоит на месте и уже давно изобретены простые способы &laquo;раздвинуть стены&raquo; любой малогабаритной жилплощади. Как это сделать &ndash; в нашей статье.Стандартный евроремонт может &laquo;освежить&raquo; вашу квартиру, но вряд ли добавит ей оригинальность и, тем более, лишние квадратные метры. Однако не стоит забывать, что современный дизайн интерьера не стоит на месте и уже давно изобретены простые способы &laquo;раздвинуть стены&raquo; любой малогабаритной жилплощади. Как это сделать &ndash; в нашей статье. 1&nbsp;</p>', 'ru', NULL, 2, 1, '2020-11-27 20:29:12', '2020-11-27 20:29:58');

-- --------------------------------------------------------

--
-- Структура таблицы `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_ids` varchar(255) NOT NULL,
  `amount` decimal(18,2) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `product_ids`, `amount`, `state`, `user_id`, `phone`) VALUES
(17, '{1}', '100000.00', 2, 2, '909914322'),
(18, '{1}', '100000.00', 1, 2, '909914322'),
(19, '{1}', '100000.00', 1, 2, '909914322'),
(20, '{1}', '100000.00', 1, 2, '909914322'),
(21, '{1}', '100000.00', 1, 2, '909914322'),
(22, '{1}', '100000.00', 1, 2, '909914322'),
(23, '{1}', '100000.00', 1, 2, '909914322'),
(24, '{1}', '100000.00', 1, 2, '909914322'),
(25, '{1}', '100000.00', 1, 7, '909914322'),
(26, '{1}', '10000000.00', 1, 7, '909914322'),
(27, '{1}', '100000.00', 1, 7, '909914322'),
(28, '{1}', '100000.00', 1, 7, '909914322'),
(29, '{1}', '100000.00', 1, 7, '909914322'),
(30, '{1}', '100000.00', 1, 7, '909914322'),
(31, '{1}', '10000.00', 1, 7, '909914322'),
(32, '{1}', '10000.00', 1, 7, '909914322'),
(33, '{1}', '100000.00', 1, 2, '909914322'),
(34, '{1}', '100000.00', 1, 2, '909914322'),
(35, '{1}', '15000.00', 1, 2, '909914322'),
(36, '{1}', '10000.00', 1, 2, '909914322'),
(37, '{1}', '141.00', 1, 2, '909914322');

-- --------------------------------------------------------

--
-- Структура таблицы `orders_paynet`
--

CREATE TABLE `orders_paynet` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `transaction_ID` bigint(20) DEFAULT NULL,
  `transaction_TIME` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_STATE` int(11) DEFAULT NULL,
  `transaction_AMOUNT` bigint(20) DEFAULT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `partners`
--

CREATE TABLE `partners` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `par_id` int(11) DEFAULT NULL,
  `public` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `partners`
--

INSERT INTO `partners` (`id`, `title`, `image`, `desc`, `lang`, `link`, `par_id`, `public`, `created_at`, `updated_at`) VALUES
(1, 'texnomart', 'partners/1dtln5306JxBjtlcKQrGJgtnBELv9BEGDpJ0WfdF.png', '-test 1 \r\n-test 2\r\n-test 3', 'ru', '1', NULL, 1, '2020-01-23 07:19:32', '2020-01-23 07:34:11'),
(2, 'texnomart en', 'partners/1dtln5306JxBjtlcKQrGJgtnBELv9BEGDpJ0WfdF.png', '-test 1 \r\n-test 2\r\n-test 3', 'en', '1', 1, 1, '2020-01-23 07:45:07', '2020-01-23 07:45:07'),
(5, 'fujitsu', 'partners/qcdH74c31K3Y1V5pA2kGhuBmU3XeuktY2MdsrF6Y.png', NULL, 'ru', NULL, NULL, 0, '2020-01-23 08:12:33', '2020-01-23 08:12:53'),
(6, 'Uzkabel', 'partners/09trKR3HAfMW46hH9BfAuTwZIRsh84pyRAjJxRvV.png', NULL, 'ru', NULL, NULL, 0, '2020-01-23 08:13:18', '2020-01-23 08:13:18'),
(7, 'vostok', 'partners/T1yQvsTarFjd6KriTAdhcOJl2EyLsu5xcXlL38pn.png', NULL, 'ru', NULL, NULL, 0, '2020-01-23 08:13:39', '2020-01-23 08:13:39'),
(8, 'test', 'partners/j5OHXTQrcTiE2r1doYd0aw172LJYZNIfJUWEViDX.png', '- test description <br>\r\n- test description\r\n- test description', 'ru', 'https://www.youtube.com', NULL, 1, '2020-01-27 04:59:04', '2020-01-27 05:05:41');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `pnl_data`
--

CREATE TABLE `pnl_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kzl` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity_items` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_items` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `net_sum` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `pnl_data`
--

INSERT INTO `pnl_data` (`id`, `kzl`, `isin`, `action`, `date`, `quantity_items`, `price_items`, `net_sum`, `created_at`, `updated_at`) VALUES
(1, '004709', 'UZ7029000005', 'buy', '28-10-2019', '100', '1589.99', '149443.16', '2020-06-29 05:18:04', '2020-06-29 05:18:04'),
(2, '004709', 'UZ7029000005', 'buy', '28-10-2019', '100', '1589.99', '158983.10', '2020-06-29 05:18:04', '2020-06-29 05:18:04'),
(3, '004709', 'UZ7011340005', 'buy', '28-10-2019', '100', '1589.99', '158983.10', '2020-06-29 05:18:04', '2020-06-29 05:18:04'),
(4, '004709', 'UZ7029000005', 'buy', '28-10-2019', '50', '1589.99', '149443.16', '2020-06-29 06:50:56', '2020-06-29 06:50:56'),
(5, '004709', 'UZ7029000005', 'sell', '28-10-2019', '50', '1589.99', '149443.16', '2020-06-29 06:54:06', '2020-06-29 06:54:06');

-- --------------------------------------------------------

--
-- Структура таблицы `preference_data`
--

CREATE TABLE `preference_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `last_price` double(8,2) NOT NULL,
  `volume` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `preference_data`
--

INSERT INTO `preference_data` (`id`, `company_id`, `last_price`, `volume`, `time`, `date`, `timestamp`, `created_at`, `updated_at`) VALUES
(2, 5, 15.00, '1', '14:00:00', '2020-11-12', 1604480400, '2020-11-12 09:44:21', '2020-11-12 09:44:21'),
(3, 5, 14.00, '1', '13:00:00', '2020-11-12', 1604476800, '2020-11-12 09:44:21', '2020-11-12 09:44:21'),
(4, 5, 10.00, '1', '15:00:00', '2020-11-12', 1604484000, '2020-11-12 09:44:21', '2020-11-12 09:44:21');

-- --------------------------------------------------------

--
-- Структура таблицы `sell_stocks`
--

CREATE TABLE `sell_stocks` (
  `kzl` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity_items` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_items` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sell_stocks`
--

INSERT INTO `sell_stocks` (`kzl`, `isin`, `date`, `quantity_items`, `price_items`, `created_at`, `updated_at`) VALUES
('004709', 'UZ7029000005', '28-10-2019', '100', '1589.99', '2020-02-17 10:06:29', '2020-02-17 10:06:29'),
('004709', 'UZ7029000005', '28-10-2019', '100', '1589.99', '2020-02-17 10:06:29', '2020-02-17 10:06:29');

-- --------------------------------------------------------

--
-- Структура таблицы `seos`
--

CREATE TABLE `seos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `sitename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_ru` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_uz` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foot_ru` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foot_uz` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foot_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `sitename`, `email`, `phone`, `file`, `address_ru`, `address_uz`, `address_en`, `foot_ru`, `foot_uz`, `foot_en`, `created_at`, `updated_at`) VALUES
(1, 'Kapital Depozit', 'inbox@kapdepo.uz', '+998 78 200-42-24', 'storage/tariff/6nyxcxeO3WsCKmni8BB5Aq10seoYpeGJwJ2IBrHP.pdf', 'Ташкент, улица Аккурганская, дом 25', 'Ташкент, улица Аккурганская, дом 25 uz', 'Ташкент, улица Аккурганская, дом 25 en', 'Настоящим ООО «АТОН» уведомляет о том, что ООО «АТОН» осуществляет свою деятельность на рынке ценных бумаг в соответствии со следующими лицензиями профессионального участника рынка ценных бумаг: на осуществление депозитарной деятельности №177-04357-000100 от 27.12.2000; на осуществление дилерской деятельности №177-03006-010000 от 27.11.2000; на осуществление брокерской деятельности №177-02896-100000 от 27.11.2000; а также уведомляет о существовании риска возникновения конфликта интересов, в том числе вследствие осуществления ООО «АТОН» профессиональной деятельности на рынке ценных бумаг на условиях совмещения различных видов профессиональной деятельности. ru', 'Настоящим ООО «АТОН» уведомляет о том, что ООО «АТОН» осуществляет свою деятельность на рынке ценных бумаг в соответствии со следующими лицензиями профессионального участника рынка ценных бумаг: на осуществление депозитарной деятельности №177-04357-000100 от 27.12.2000; на осуществление дилерской деятельности №177-03006-010000 от 27.11.2000; на осуществление брокерской деятельности №177-02896-100000 от 27.11.2000; а также уведомляет о существовании риска возникновения конфликта интересов, в том числе вследствие осуществления ООО «АТОН» профессиональной деятельности на рынке ценных бумаг на условиях совмещения различных видов профессиональной деятельности. uz', 'Настоящим ООО «АТОН» уведомляет о том, что ООО «АТОН» осуществляет свою деятельность на рынке ценных бумаг в соответствии со следующими лицензиями профессионального участника рынка ценных бумаг: на осуществление депозитарной деятельности №177-04357-000100 от 27.12.2000; на осуществление дилерской деятельности №177-03006-010000 от 27.11.2000; на осуществление брокерской деятельности №177-02896-100000 от 27.11.2000; а также уведомляет о существовании риска возникновения конфликта интересов, в том числе вследствие осуществления ООО «АТОН» профессиональной деятельности на рынке ценных бумаг на условиях совмещения различных видов профессиональной деятельности. en', '2020-01-08 08:32:28', '2020-12-06 17:40:49');

-- --------------------------------------------------------

--
-- Структура таблицы `socials`
--

CREATE TABLE `socials` (
  `id` int(10) UNSIGNED NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `socials`
--

INSERT INTO `socials` (`id`, `facebook`, `twitter`, `instagram`, `google`, `created_at`, `updated_at`) VALUES
(1, '#', '#', '#', '#', '2020-01-08 08:32:28', '2020-01-08 08:32:28');

-- --------------------------------------------------------

--
-- Структура таблицы `statistics`
--

CREATE TABLE `statistics` (
  `id` int(10) UNSIGNED NOT NULL,
  `fond` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transactions` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `years` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clients` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clients_count` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `statistics`
--

INSERT INTO `statistics` (`id`, `fond`, `transactions`, `years`, `clients`, `clients_count`, `created_at`, `updated_at`) VALUES
(1, '91353553', '2016', '3', '4', '2999', '2020-01-16 05:28:40', '2020-12-23 22:54:47');

-- --------------------------------------------------------

--
-- Структура таблицы `stocks`
--

CREATE TABLE `stocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `isin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issuer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock_id` int(11) DEFAULT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `public` tinyint(4) NOT NULL DEFAULT '0',
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `stocks`
--

INSERT INTO `stocks` (`id`, `title`, `image`, `desc`, `isin`, `issuer`, `stock_id`, `weight`, `public`, `lang`, `created_at`, `updated_at`) VALUES
(1, 'Hamkorbank', NULL, 'test', 'UZ7011340005', 'HMKB', NULL, '38.4615384615385', 1, 'ru', '2020-01-16 07:32:19', '2020-01-20 06:40:20'),
(2, 'Hamkorbank en', NULL, 'test', 'UZ7011340005', 'HMKB', 1, NULL, 1, 'en', '2020-01-16 08:23:21', '2020-01-20 06:40:20'),
(3, 'Kvarts', NULL, NULL, 'UZ7025770007', 'KVTS', NULL, '0.185185185185185', 1, 'ru', '2020-01-16 09:47:54', '2020-01-20 06:37:01'),
(4, 'O\'zmetkombinat', NULL, NULL, 'UZ7021720006', 'UZMK', NULL, '0.0634517766497462', 1, 'ru', '2020-01-16 09:49:00', '2020-01-20 06:37:29'),
(5, 'O\'zRTXB', NULL, NULL, 'UZ7043200003', 'URTS', NULL, '0.166666666666667', 1, 'ru', '2020-01-16 09:51:02', '2020-01-20 06:39:57'),
(6, 'Qizilqumsement', NULL, NULL, 'UZ7029000005', 'QZSM', NULL, '0.666666666666667', 1, 'ru', '2020-01-16 09:52:31', '2020-01-20 06:37:57');

-- --------------------------------------------------------

--
-- Структура таблицы `stocks_info`
--

CREATE TABLE `stocks_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `stocks_info`
--

INSERT INTO `stocks_info` (`id`, `title`, `isin`, `current_price`, `image`, `created_at`, `updated_at`) VALUES
(1, '<Hamkorbank> ATB', 'UZ7011340005', '25', 'stocks/8kilB6i4MRT2MlOdRK8e7B7BaDkT2F4j983nXyWi.png', '2020-07-02 09:43:50', '2020-07-03 16:27:21'),
(2, '<Kvarts> AJ', 'UZ7025770007', '2980', NULL, '2020-07-02 09:43:50', '2020-07-02 09:43:50'),
(3, 'ChEII <Toshkentvino kombinati> AJ', 'UZ7028090007', '208101.22', NULL, '2020-07-02 09:43:51', '2020-07-02 09:43:51'),
(4, '<Qizilqumsement> AJ', 'UZ7029000005', '1710.03', NULL, '2020-07-02 09:43:51', '2020-07-02 09:43:51'),
(5, '<Trastbank> XAB', 'UZ7033480003', '7000', NULL, '2020-07-02 09:43:51', '2020-07-02 09:43:51'),
(6, '<O\'zsanoatqurilishbank> ATB', 'UZ7037560008', '16.5', NULL, '2020-07-02 09:43:51', '2020-07-02 09:43:51'),
(7, '<Chilonzor buyum savdo kompleksi> AJ', 'UZ7038380000', '10', NULL, '2020-07-02 09:43:51', '2020-07-02 09:43:51'),
(11, '<O\'zRTXB> AJ', 'UZ7043200003', '16000', NULL, '2020-07-02 11:06:06', '2020-07-02 11:06:06'),
(12, '<Alskom> SK AJ', 'UZ7045320007', '1400', NULL, '2020-07-02 11:06:06', '2020-07-02 11:06:06');

-- --------------------------------------------------------

--
-- Структура таблицы `stories`
--

CREATE TABLE `stories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `his_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `stories`
--

INSERT INTO `stories` (`id`, `title`, `desc`, `year`, `image`, `lang`, `his_id`, `created_at`, `updated_at`) VALUES
(3, 'Открытие компании', 'В 2005 году была зарегистрирована компания ООО \"Кapital-Depozit\".', 2005, 'history/GWz0see8MHTUD0kcUT8fl7HU6yY8OA7EOKAa57rZ.jpeg', 'ru', NULL, '2020-01-14 07:31:37', '2020-01-14 07:31:37'),
(4, 'Награда', 'Самый лучший инвест. консультант 2016 года на рынке капитала.', 2016, 'history/Pk23nmNYKFmwM2EAUn8JLmscW1XgzDXQv9qvy9Sd.jpeg', 'ru', NULL, '2020-01-14 07:32:10', '2020-01-14 07:32:10'),
(5, 'Открытие сайта', 'Открытие оффициального сайта ООО \"Кapital-Depozit\"', 2017, 'history/SXa553lwwko9tiAcuAfOUarpAdjhMsU8LHhhP39I.jpeg', 'ru', NULL, '2020-01-14 07:32:48', '2020-01-14 07:32:48');

-- --------------------------------------------------------

--
-- Структура таблицы `tariff`
--

CREATE TABLE `tariff` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `tar_id` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT '1',
  `public` tinyint(4) NOT NULL,
  `commission` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tariff`
--

INSERT INTO `tariff` (`id`, `title`, `desc`, `note`, `tar_id`, `order`, `public`, `commission`, `lang`, `created_at`, `updated_at`) VALUES
(1, 'test 1 1 1', '<ul>\r\n	<li>fsfdsfdsfds</li>\r\n	<li>fdsfdsfdsfds</li>\r\n	<li>fdsfdsfdsfsd</li>\r\n	<li>fdsfdsfds</li>\r\n	<li>dsdsadsadas</li>\r\n</ul>', '<p>Рынок акциий - 1%</p>\r\n\r\n<p>Рынок акциий - 1%</p>\r\n\r\n<p>Рынок акциий - 1%</p>', NULL, 1, 1, '4214', 'ru', '2020-01-10 06:05:13', '2021-01-25 23:53:09'),
(2, 'test 1 1 1 1en', 'dsadsa', 'dsadas', 1, 1, 1, '4214', 'en', '2020-01-10 06:20:18', '2021-01-25 21:36:13'),
(3, 'стартовый', 'Если Вы совершаете сделки нерегулярно', 'Комиссия за сделку через организатора торговли', NULL, 2, 1, '0.17', 'ru', '2020-01-23 04:09:15', '2021-01-25 21:33:38'),
(4, 'test', 'tedsdsa', 'dsadsa', NULL, 3, 1, '13', 'ru', '2021-01-25 21:01:08', '2021-01-25 21:33:44'),
(5, 'tesdt', '<ul>\r\n	<li>fsfdsfdsfds</li>\r\n	<li>fdsfdsfdsfds</li>\r\n	<li>fdsfdsfdsfsd</li>\r\n	<li>fdsfdsfds</li>\r\n	<li>dsdsadsadas</li>\r\n<li>fsfdsfdsfds</li>\r\n	<li>fdsfdsfdsfds</li>\r\n	<li>fdsfdsfdsfsd</li>\r\n	<li>fdsfdsfds</li>\r\n	<li>dsdsadsadas</li>\r\n<li>fsfdsfdsfds</li>\r\n	<li>fdsfdsfdsfds</li>\r\n	<li>fdsfdsfdsfsd</li>\r\n	<li>fdsfdsfds</li>\r\n	<li>dsdsadsadas</li>\r\n</ul>', 'dsadas', NULL, 4, 1, '13', 'ru', '2021-01-25 21:01:30', '2021-01-25 23:40:35'),
(6, 'стартовый en', 'Если Вы совершаете сделки нерегулярно', 'Комиссия за сделку через организатора торговли', 3, 2, 1, '0.17', 'en', '2021-01-25 21:34:33', '2021-01-25 21:37:56'),
(7, 'стартовый uz', 'Если Вы совершаете сделки нерегулярно', 'Комиссия за сделку через организатора торговли', 3, 2, 1, '0.17', 'uz', '2021-01-25 21:34:45', '2021-01-25 21:34:50');

-- --------------------------------------------------------

--
-- Структура таблицы `team`
--

CREATE TABLE `team` (
  `id` int(10) UNSIGNED NOT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_one` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_two` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `person_id` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `public` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `team`
--

INSERT INTO `team` (`id`, `surname`, `name`, `patronymic`, `position`, `description`, `photo`, `phone_one`, `phone_two`, `email`, `lang`, `person_id`, `order`, `public`, `created_at`, `updated_at`) VALUES
(1, 'Рахимджанович', 'Фаррух', NULL, 'Директор', '<pre>\r\n<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</pre>', 'team/v38DTFcwyquZsgnjzLHgvPM89G1AM56hnk502MQg.jpeg', '90 991 99 99', '90 991 99 99', 'test@mail.ru', 'ru', NULL, 1, 1, '2020-01-06 05:33:25', '2020-11-19 14:23:49'),
(2, 'Ivanov en', 'Ivan en', 'Ivanovic en', 'test', NULL, 'team/v38DTFcwyquZsgnjzLHgvPM89G1AM56hnk502MQg.jpeg', '90 991 99 99', NULL, 'test@mail.ru', 'en', 1, 1, 1, '2020-01-06 05:33:42', '2020-11-19 14:23:49'),
(3, 'Абдурахмановна', 'Азиза', NULL, 'Главный бухгалтер', NULL, 'team/Ui3a7r02R9K4Me4B8lE8172HizuozYVgxkkBFLHX.jpeg', '90 991 99 99', NULL, 'test@mail.ru', 'ru', NULL, 2, 1, '2020-01-11 05:38:29', '2020-01-11 05:38:29'),
(4, 'Абдуманнопович', 'Анвар', NULL, 'Начальник отдела корпоративного консалтинга', NULL, 'team/kwEsLfPsyQt5QcRgijjpswgbvfgOyRYTjvmcHnhA.jpeg', '90 991 99 99', NULL, 'test@mail.ru', 'ru', NULL, 2, 1, '2020-01-11 05:39:41', '2020-01-11 05:39:41'),
(5, 'Абдуллаевич', 'Сарвар', 'Абдуллаевич', 'Внутренний контролёр', NULL, 'team/yborzyK2vUTbdMHcDO87dtArCr9k7PnRla1fJ1hw.jpeg', '90 991 99 99', NULL, 'test@mail.ru', 'ru', NULL, 2, 1, '2020-01-11 05:45:53', '2020-01-11 05:45:53'),
(6, 'Бахрамовна', 'Лола', NULL, 'Ведущий специалист', NULL, 'team/nmdULceqipXyaxbfvnsbPP3JFPXJdDBlY07D3Ivf.jpeg', '90 991 99 99', NULL, 'test@mail.ru', 'ru', NULL, 2, 1, '2020-01-11 05:52:01', '2020-01-11 05:52:01');

-- --------------------------------------------------------

--
-- Структура таблицы `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `paycom_transaction_id` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `paycom_time` varchar(13) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `paycom_time_datetime` datetime NOT NULL,
  `create_time` datetime NOT NULL,
  `perform_time` datetime DEFAULT NULL,
  `cancel_time` datetime DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `state` tinyint(2) NOT NULL,
  `reason` tinyint(2) DEFAULT NULL,
  `receivers` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'JSON array of receivers',
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `transactions`
--

INSERT INTO `transactions` (`id`, `paycom_transaction_id`, `paycom_time`, `paycom_time_datetime`, `create_time`, `perform_time`, `cancel_time`, `amount`, `state`, `reason`, `receivers`, `order_id`) VALUES
(2, '5e68e4c335ac93546bc7f43a', '1587299678', '2020-04-19 12:34:38', '2020-04-19 12:34:38', '2020-04-19 12:45:12', NULL, 10000000, 2, NULL, NULL, 17);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT '0',
  `agreement` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `agreement`, `first_name`, `surname`, `lastname`, `phone`, `value`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'akmakhamidov@gmail.com', NULL, '$2y$10$7nmgi0GjX93GIcoc15Bd/uJVNsi0c9jgQDTbziaiMGLOevjF316aW', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-22 05:27:41', '2020-01-22 05:27:41'),
(2, '004709', 'test@test.ru', NULL, '$2y$10$9Z5RG.ptMQnvtCrhpu911O/ujHfc38JC3neQIk3KfIQNsJhnxbflu', 0, '415164', 'Ivan', 'Ivanov', 'Ivanovich', '909914322', NULL, NULL, '2020-01-22 06:40:03', '2020-05-03 22:45:35');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `analysises`
--
ALTER TABLE `analysises`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `analytics`
--
ALTER TABLE `analytics`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `bonds`
--
ALTER TABLE `bonds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bonds_company_id_foreign` (`company_id`);

--
-- Индексы таблицы `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `companies_data`
--
ALTER TABLE `companies_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_data_company_id_foreign` (`company_id`);

--
-- Индексы таблицы `companies_detail`
--
ALTER TABLE `companies_detail`
  ADD KEY `companies_detail_company_id_foreign` (`company_id`);

--
-- Индексы таблицы `companies_info`
--
ALTER TABLE `companies_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_info_company_id_foreign` (`company_id`);

--
-- Индексы таблицы `dividends`
--
ALTER TABLE `dividends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dividends_company_id_foreign` (`company_id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `indices`
--
ALTER TABLE `indices`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `market_reports`
--
ALTER TABLE `market_reports`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `news_slug_unique` (`slug`);

--
-- Индексы таблицы `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Индексы таблицы `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Индексы таблицы `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Индексы таблицы `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders_paynet`
--
ALTER TABLE `orders_paynet`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `pnl_data`
--
ALTER TABLE `pnl_data`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `preference_data`
--
ALTER TABLE `preference_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `preference_data_company_id_foreign` (`company_id`);

--
-- Индексы таблицы `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `stocks_info`
--
ALTER TABLE `stocks_info`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tariff`
--
ALTER TABLE `tariff`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT для таблицы `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `analysises`
--
ALTER TABLE `analysises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `analytics`
--
ALTER TABLE `analytics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `bonds`
--
ALTER TABLE `bonds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `companies_data`
--
ALTER TABLE `companies_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT для таблицы `companies_info`
--
ALTER TABLE `companies_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `dividends`
--
ALTER TABLE `dividends`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `indices`
--
ALTER TABLE `indices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `keys`
--
ALTER TABLE `keys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `market_reports`
--
ALTER TABLE `market_reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблицы `orders_paynet`
--
ALTER TABLE `orders_paynet`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `pnl_data`
--
ALTER TABLE `pnl_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `preference_data`
--
ALTER TABLE `preference_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `statistics`
--
ALTER TABLE `statistics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `stocks_info`
--
ALTER TABLE `stocks_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `stories`
--
ALTER TABLE `stories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `tariff`
--
ALTER TABLE `tariff`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `team`
--
ALTER TABLE `team`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `bonds`
--
ALTER TABLE `bonds`
  ADD CONSTRAINT `bonds_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `companies_info`
--
ALTER TABLE `companies_info`
  ADD CONSTRAINT `companies_info_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `dividends`
--
ALTER TABLE `dividends`
  ADD CONSTRAINT `dividends_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `preference_data`
--
ALTER TABLE `preference_data`
  ADD CONSTRAINT `preference_data_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
