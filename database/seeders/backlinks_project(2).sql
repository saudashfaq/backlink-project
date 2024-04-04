-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 04, 2024 at 09:11 AM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `backlinks_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'quasi', NULL, NULL),
(2, 'unde', NULL, NULL),
(3, 'id', NULL, NULL),
(4, 'consequatur', NULL, NULL),
(5, 'magnam', NULL, NULL),
(6, 'ea', NULL, NULL),
(7, 'est', NULL, NULL),
(8, 'quisquam', NULL, NULL),
(9, 'recusandae', NULL, NULL),
(10, 'ex', NULL, NULL),
(11, 'exercitationem', NULL, NULL),
(12, 'molestiae', NULL, NULL),
(13, 'repellendus', NULL, NULL),
(14, 'asperiores', NULL, NULL),
(15, 'optio', NULL, NULL),
(16, 'ut', NULL, NULL),
(17, 'quia', NULL, NULL),
(18, 'ullam', NULL, NULL),
(19, 'ducimus', NULL, NULL),
(20, 'corporis', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_website`
--

CREATE TABLE `category_website` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `website_id` bigint(20) UNSIGNED NOT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_website`
--

INSERT INTO `category_website` (`id`, `category_id`, `website_id`, `is_visible`, `created_at`, `updated_at`) VALUES
(1, 8, 8, 1, '2024-02-10 01:27:07', '2024-02-10 01:27:07'),
(2, 8, 2, 1, '2024-02-10 01:27:07', '2024-02-10 01:27:07'),
(3, 10, 12, 0, '2024-02-10 01:27:07', '2024-02-10 01:27:07'),
(4, 15, 12, 0, '2024-02-10 01:27:07', '2024-02-10 01:27:07'),
(5, 14, 16, 1, '2024-02-10 01:27:07', '2024-02-10 01:27:07'),
(6, 19, 3, 0, '2024-02-10 01:27:07', '2024-02-10 01:27:07'),
(8, 19, 17, 0, '2024-02-10 01:27:07', '2024-02-10 01:27:07'),
(9, 8, 5, 0, '2024-02-10 01:27:07', '2024-02-10 01:27:07'),
(10, 15, 11, 1, '2024-02-10 01:27:07', '2024-02-10 01:27:07'),
(11, 9, 16, 1, '2024-02-10 01:27:07', '2024-02-10 01:27:07'),
(12, 7, 10, 1, '2024-02-10 01:27:07', '2024-02-10 01:27:07'),
(14, 12, 7, 1, '2024-02-10 01:27:07', '2024-02-10 01:27:07'),
(15, 1, 1, 1, '2024-02-10 01:27:07', '2024-02-10 01:27:07'),
(16, 18, 17, 1, '2024-02-10 01:27:07', '2024-02-10 01:27:07'),
(17, 2, 2, 1, '2024-02-10 01:27:07', '2024-02-10 01:27:07'),
(18, 2, 6, 0, '2024-02-10 01:27:07', '2024-02-10 01:27:07'),
(19, 3, 7, 0, '2024-02-10 01:27:07', '2024-02-10 01:27:07'),
(20, 2, 8, 0, '2024-02-10 01:27:07', '2024-02-10 01:27:07'),
(30, 14, 28, 1, NULL, NULL),
(31, 19, 28, 1, NULL, NULL),
(32, 10, 29, 1, NULL, NULL),
(33, 11, 29, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(33, '2014_10_12_000000_create_users_table', 1),
(34, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(35, '2019_08_19_000000_create_failed_jobs_table', 1),
(36, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(37, '2024_02_03_125125_create_websites_table', 1),
(38, '2024_02_03_125229_create_orders_table', 1),
(39, '2024_02_03_125250_create_transactions_table', 1),
(40, '2024_02_03_131126_create_categories_table', 1),
(41, '2024_02_03_131619_create_chats_table', 1),
(42, '2024_02_03_131928_create_website_backlink_rates_table', 2),
(43, '2024_02_03_140651_create_category_website_table', 2),
(44, '2024_02_08_072540_create_website_scores_table', 2),
(45, '2024_02_08_085109_create_user_profiles_table', 2),
(46, '2024_03_02_115006_add_instructions_to_orders_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orderchats`
--

CREATE TABLE `orderchats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` bigint(20) UNSIGNED NOT NULL,
  `website_id` bigint(20) UNSIGNED NOT NULL,
  `website_backlink_rate_id` bigint(20) UNSIGNED NOT NULL,
  `order_amount` decimal(6,2) NOT NULL,
  `order_details` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '[{"linkurl": "", "keyphrase": ""},{"linkurl": "", "keyphrase": ""}]',
  `instructions` text COLLATE utf8mb4_unicode_ci,
  `order_status` enum('open','declined','expired','processing','delivered','rivision','rejected','dispute','confirmed','completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `order_status_updated_at` datetime NOT NULL COMMENT 'when this order was updated to current latest status',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `buyer_id`, `seller_id`, `website_id`, `website_backlink_rate_id`, `order_amount`, `order_details`, `instructions`, `order_status`, `order_status_updated_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 3, 29, 30, '5.00', '[{\"link\":\"https:\\/\\/gotopetsshop.com\",\"phrase\":\"Some phrase\"},{\"link\":null,\"phrase\":null}]', 'Some instructions', 'open', '2024-03-02 12:06:34', '2024-03-02 07:06:34', '2024-03-02 07:06:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` decimal(5,2) NOT NULL,
  `transaction_type` enum('Credit','Debit') COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_type` enum('Withdraw Request','Topup Account','Purchased Guestpost','Sold Guestpost') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_balance` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `account_balance`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'walker.joanne@example.org', '2024-02-10 01:27:06', '$2y$12$eUwzlHmAEILtoqOaeQcC6uPUM9Gm7MBzM3WG/qxjGjFpu.gZb3bM6', '0.00', 1, 'klPYZ44MpU', '2024-02-10 01:27:07', '2024-02-10 01:27:07'),
(2, 'nschultz@example.com', '2024-02-10 01:27:07', '$2y$12$eUwzlHmAEILtoqOaeQcC6uPUM9Gm7MBzM3WG/qxjGjFpu.gZb3bM6', '0.00', 1, 'msBqscnnwX', '2024-02-10 01:27:07', '2024-02-10 01:27:07'),
(3, 'sharon67@example.net', '2024-02-10 01:27:07', '$2y$12$eUwzlHmAEILtoqOaeQcC6uPUM9Gm7MBzM3WG/qxjGjFpu.gZb3bM6', '0.00', 1, 'pIJjzmG2b6', '2024-02-10 01:27:07', '2024-02-10 01:27:07'),
(4, 'kirlin.johnathon@example.com', '2024-02-10 01:27:07', '$2y$12$eUwzlHmAEILtoqOaeQcC6uPUM9Gm7MBzM3WG/qxjGjFpu.gZb3bM6', '0.00', 1, 'bOIfLnytmZ', '2024-02-10 01:27:07', '2024-02-10 01:27:07'),
(5, 'vernie.cormier@example.org', '2024-02-10 01:27:07', '$2y$12$eUwzlHmAEILtoqOaeQcC6uPUM9Gm7MBzM3WG/qxjGjFpu.gZb3bM6', '0.00', 1, 'XN90v6v7bu', '2024-02-10 01:27:07', '2024-02-10 01:27:07'),
(6, 'vhudson@example.com', '2024-02-10 01:27:07', '$2y$12$eUwzlHmAEILtoqOaeQcC6uPUM9Gm7MBzM3WG/qxjGjFpu.gZb3bM6', '0.00', 1, 'E0ZHJhxjLt', '2024-02-10 01:27:07', '2024-02-10 01:27:07'),
(7, 'lisa.kertzmann@example.com', '2024-02-10 01:27:07', '$2y$12$eUwzlHmAEILtoqOaeQcC6uPUM9Gm7MBzM3WG/qxjGjFpu.gZb3bM6', '0.00', 1, 'vUZpaEzsuG', '2024-02-10 01:27:07', '2024-02-10 01:27:07'),
(8, 'nienow.abe@example.org', '2024-02-10 01:27:07', '$2y$12$eUwzlHmAEILtoqOaeQcC6uPUM9Gm7MBzM3WG/qxjGjFpu.gZb3bM6', '0.00', 1, 'vODOMAO3RU', '2024-02-10 01:27:07', '2024-02-10 01:27:07'),
(9, 'botsford.novella@example.com', '2024-02-10 01:27:07', '$2y$12$eUwzlHmAEILtoqOaeQcC6uPUM9Gm7MBzM3WG/qxjGjFpu.gZb3bM6', '0.00', 1, 'eWBLQxvg1v', '2024-02-10 01:27:07', '2024-02-10 01:27:07'),
(10, 'elwin54@example.org', '2024-02-10 01:27:07', '$2y$12$eUwzlHmAEILtoqOaeQcC6uPUM9Gm7MBzM3WG/qxjGjFpu.gZb3bM6', '0.00', 1, '6oIsVz751E', '2024-02-10 01:27:07', '2024-02-10 01:27:07'),
(11, 'vgreenfelder@example.com', '2024-02-10 01:27:07', '$2y$12$eUwzlHmAEILtoqOaeQcC6uPUM9Gm7MBzM3WG/qxjGjFpu.gZb3bM6', '0.00', 1, 'I8xnq8XUXy', '2024-02-10 01:27:07', '2024-02-10 01:27:07'),
(12, 'gsipes@example.net', '2024-02-10 01:27:07', '$2y$12$eUwzlHmAEILtoqOaeQcC6uPUM9Gm7MBzM3WG/qxjGjFpu.gZb3bM6', '0.00', 1, 'CofKvG3iMF', '2024-02-10 01:27:07', '2024-02-10 01:27:07'),
(13, 'lindgren.brennon@example.net', '2024-02-10 01:27:07', '$2y$12$eUwzlHmAEILtoqOaeQcC6uPUM9Gm7MBzM3WG/qxjGjFpu.gZb3bM6', '0.00', 1, 'EBPKQZ7ODA', '2024-02-10 01:27:07', '2024-02-10 01:27:07'),
(14, 'payton.kiehn@example.net', '2024-02-10 01:27:07', '$2y$12$eUwzlHmAEILtoqOaeQcC6uPUM9Gm7MBzM3WG/qxjGjFpu.gZb3bM6', '0.00', 1, 'DW4QHw8R2z', '2024-02-10 01:27:07', '2024-02-10 01:27:07'),
(15, 'tbrakus@example.net', '2024-02-10 01:27:07', '$2y$12$eUwzlHmAEILtoqOaeQcC6uPUM9Gm7MBzM3WG/qxjGjFpu.gZb3bM6', '0.00', 1, 'oy32QXv8Kr', '2024-02-10 01:27:07', '2024-02-10 01:27:07'),
(16, 'chermann@example.net', '2024-02-10 01:27:07', '$2y$12$eUwzlHmAEILtoqOaeQcC6uPUM9Gm7MBzM3WG/qxjGjFpu.gZb3bM6', '0.00', 1, 'bzB56xbppP', '2024-02-10 01:27:07', '2024-02-10 01:27:07'),
(17, 'uherman@example.net', '2024-02-10 01:27:07', '$2y$12$eUwzlHmAEILtoqOaeQcC6uPUM9Gm7MBzM3WG/qxjGjFpu.gZb3bM6', '0.00', 1, 'WbJYLa2Ntf', '2024-02-10 01:27:07', '2024-02-10 01:27:07'),
(18, 'schmitt.enrique@example.com', '2024-02-10 01:27:07', '$2y$12$eUwzlHmAEILtoqOaeQcC6uPUM9Gm7MBzM3WG/qxjGjFpu.gZb3bM6', '0.00', 1, '27mdW227gi', '2024-02-10 01:27:07', '2024-02-10 01:27:07'),
(19, 'julius06@example.net', '2024-02-10 01:27:07', '$2y$12$eUwzlHmAEILtoqOaeQcC6uPUM9Gm7MBzM3WG/qxjGjFpu.gZb3bM6', '0.00', 1, 'mM3yv8qMlX', '2024-02-10 01:27:07', '2024-02-10 01:27:07'),
(20, 'otromp@example.net', '2024-02-10 01:27:07', '$2y$12$eUwzlHmAEILtoqOaeQcC6uPUM9Gm7MBzM3WG/qxjGjFpu.gZb3bM6', '0.00', 1, 'gGF1MD0nvc', '2024-02-10 01:27:07', '2024-02-10 01:27:07');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(21) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('Male','Female','Trans') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `websitebacklinkrates`
--

CREATE TABLE `websitebacklinkrates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `website_id` bigint(20) UNSIGNED NOT NULL,
  `words_count` int(11) NOT NULL DEFAULT '350' COMMENT 'the post on which link will be placed will consist of minimum this number of words',
  `price` decimal(5,2) NOT NULL,
  `max_number_of_links` tinyint(4) NOT NULL DEFAULT '3' COMMENT 'The buyer can provide this number of links to be posted on the post',
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `websitebacklinkrates`
--

INSERT INTO `websitebacklinkrates` (`id`, `user_id`, `website_id`, `words_count`, `price`, `max_number_of_links`, `is_visible`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 16, 4, 683, '60.12', 4, 0, '2024-02-10 01:27:07', '2024-02-10 01:27:07', NULL),
(2, 14, 5, 506, '10.79', 3, 1, '2024-02-10 01:27:07', '2024-02-10 01:27:07', NULL),
(3, 15, 1, 1219, '20.76', 3, 1, '2024-02-10 01:27:07', '2024-02-10 01:27:07', NULL),
(4, 2, 2, 368, '36.07', 1, 1, '2024-02-10 01:27:07', '2024-02-10 01:27:07', NULL),
(5, 15, 13, 255, '69.85', 4, 0, '2024-02-10 01:27:07', '2024-02-10 01:27:07', NULL),
(6, 14, 7, 1622, '37.51', 3, 0, '2024-02-10 01:27:07', '2024-02-10 01:27:07', NULL),
(7, 14, 7, 529, '31.29', 1, 1, '2024-02-10 01:27:07', '2024-02-10 01:27:07', NULL),
(8, 17, 16, 1848, '27.15', 5, 0, '2024-02-10 01:27:07', '2024-02-10 01:27:07', NULL),
(9, 6, 13, 1475, '36.34', 2, 1, '2024-02-10 01:27:07', '2024-02-10 01:27:07', NULL),
(10, 8, 2, 1856, '41.75', 1, 0, '2024-02-10 01:27:07', '2024-02-10 01:27:07', NULL),
(11, 15, 14, 414, '60.35', 3, 1, '2024-02-10 01:27:07', '2024-02-10 01:27:07', NULL),
(13, 3, 13, 666, '67.07', 3, 0, '2024-02-10 01:27:07', '2024-02-10 01:27:07', NULL),
(14, 17, 3, 1693, '40.51', 3, 0, '2024-02-10 01:27:07', '2024-02-10 01:27:07', NULL),
(15, 1, 9, 1468, '81.38', 4, 1, '2024-02-10 01:27:07', '2024-02-10 01:27:07', NULL),
(17, 17, 18, 1380, '35.03', 3, 0, '2024-02-10 01:27:07', '2024-02-10 01:27:07', NULL),
(18, 2, 11, 1525, '64.47', 3, 1, '2024-02-10 01:27:07', '2024-02-10 01:27:07', NULL),
(19, 12, 1, 389, '17.50', 1, 0, '2024-02-10 01:27:07', '2024-02-10 01:27:07', NULL),
(20, 20, 3, 955, '16.71', 2, 1, '2024-02-10 01:27:07', '2024-02-10 01:27:07', NULL),
(24, 13, 27, 350, '5.00', 3, 1, '2024-02-10 08:56:44', '2024-02-10 08:56:44', NULL),
(26, 8, 28, 350, '5.00', 3, 1, '2024-02-24 09:10:17', '2024-02-24 09:10:17', NULL),
(27, 8, 28, 350, '5.00', 3, 1, '2024-02-24 09:10:17', '2024-02-24 09:10:17', NULL),
(28, 8, 28, 350, '5.00', 3, 1, '2024-02-24 09:10:17', '2024-02-24 09:10:17', NULL),
(29, 12, 29, 350, '10.00', 5, 1, '2024-02-24 11:02:01', '2024-02-24 11:02:01', NULL),
(30, 12, 29, 350, '5.00', 3, 1, '2024-02-24 11:02:01', '2024-02-24 11:02:01', NULL),
(31, 12, 29, 350, '5.00', 3, 1, '2024-02-24 11:02:01', '2024-02-24 11:02:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `websites`
--

CREATE TABLE `websites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci COMMENT 'Details about this website, and why it should be considered for the link posting. Will be displayed to the Buyers',
  `website_status` enum('In Review','Rejected','Approved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'In Review' COMMENT 'this status is used for pending review, approved, etc',
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `websites`
--

INSERT INTO `websites` (`id`, `user_id`, `url`, `details`, `website_status`, `is_visible`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'http://www.mueller.com/fugit-adipisci-reiciendis-omnis-voluptatem-molestias-nisi.html', 'Recusandae culpa voluptates nemo nihil. Eos eum enim dolor sunt eius et. In quia et quam quia. Aut odio provident doloremque.', 'In Review', 1, '2024-02-10 01:27:07', '2024-02-10 01:27:07', NULL),
(2, 18, 'http://www.kunde.com/totam-aspernatur-nobis-et-ad', 'Animi praesentium sit voluptatum incidunt eaque earum et iusto. Nostrum occaecati recusandae illo molestias labore. Ipsam odio facilis reprehenderit numquam inventore nesciunt placeat est. Neque voluptates ut qui.', 'Rejected', 0, '2024-02-10 01:27:07', '2024-02-10 01:27:07', NULL),
(3, 16, 'http://www.wyman.org/culpa-quo-eaque-delectus-consequatur-repellat-sunt.html', 'Doloribus qui repellendus quia minus. Officiis nesciunt voluptatem incidunt. Suscipit eum tempore minus error enim.', 'In Review', 1, '2024-02-10 01:27:07', '2024-02-10 01:27:07', NULL),
(4, 12, 'http://www.harris.net/', 'Voluptates est est necessitatibus quia dolor odit iste. Non non dolores consequatur. Iure repudiandae ipsa voluptas sapiente et vel unde vitae. Quod iste doloribus qui culpa eligendi fuga officia. Dignissimos dolorem et ullam et ut quia omnis dolor.', 'Rejected', 1, '2024-02-10 01:27:07', '2024-02-10 01:27:07', NULL),
(5, 4, 'https://willms.info/est-sint-sapiente-libero-dolor-magni-occaecati-consequuntur.html', 'Culpa et deserunt non et blanditiis. Dolor illo maxime est molestiae. Dignissimos voluptatibus in saepe qui iure ad et. Sed dolores unde est omnis qui et.', 'Approved', 0, '2024-02-10 01:27:07', '2024-02-10 01:27:07', NULL),
(6, 18, 'http://www.runolfsson.com/', 'Accusantium aut iste illo deserunt nisi. Rerum ipsa odit distinctio ut. Magni nam tempora eos modi quisquam culpa et.', 'Approved', 0, '2024-02-10 01:27:07', '2024-02-10 01:27:07', NULL),
(7, 6, 'http://bednar.com/', 'Cumque sint asperiores ut illo. Non quasi nam dicta repellendus qui accusamus optio. Deleniti sequi quibusdam soluta illo accusamus quia. Distinctio debitis voluptate aut sunt possimus sapiente.', 'Approved', 0, '2024-02-10 01:27:07', '2024-02-10 01:27:07', NULL),
(8, 2, 'http://berge.com/dignissimos-nostrum-iusto-sequi-dignissimos', 'Et eos ut pariatur sunt quam perferendis. Et aspernatur similique rerum sit sunt facilis. Soluta ut ea est praesentium nihil rem ipsum. Reiciendis nihil dignissimos qui quaerat omnis in consequatur. In voluptatibus consequatur sunt quae doloribus quia dolorum.', 'In Review', 1, '2024-02-10 01:27:07', '2024-02-10 01:27:07', NULL),
(9, 6, 'http://www.larkin.net/natus-magnam-voluptas-quis', 'Mollitia quod molestiae et molestiae. Deleniti et dignissimos magni nostrum quibusdam.', 'Approved', 0, '2024-02-10 01:27:07', '2024-02-10 01:27:07', NULL),
(10, 8, 'http://labadie.com/dolorem-laborum-tempora-facere-error-et-eum.html', 'Est voluptates vel nisi dignissimos. Iste ea ipsum rem rerum. Eveniet dicta cum necessitatibus quas nesciunt consequatur totam. Neque molestiae et dolorem doloremque beatae.', 'In Review', 0, '2024-02-10 01:27:07', '2024-02-10 01:27:07', NULL),
(11, 18, 'http://www.nitzsche.com/quisquam-dolores-eius-et-modi', 'Sit sapiente ipsa dolor laborum et commodi rerum. Quis rem perferendis non unde quis. Est assumenda quidem veniam non.', 'Approved', 0, '2024-02-10 01:27:07', '2024-02-10 01:27:07', NULL),
(12, 5, 'http://schmeler.biz/', 'Est qui nihil ea et et odio. Magnam voluptatibus ex asperiores perspiciatis doloribus delectus. Consequuntur fugiat sed quo quidem debitis. Et atque amet culpa et consequatur.', 'In Review', 1, '2024-02-10 01:27:07', '2024-02-10 01:27:07', NULL),
(13, 2, 'http://mcglynn.com/', 'Aut temporibus natus aut. Et repudiandae accusamus soluta aut dicta dolores quae. Earum ut facere alias ex sequi tempore. At sequi debitis maxime necessitatibus possimus dolorem voluptas praesentium.', 'Approved', 0, '2024-02-10 01:27:07', '2024-02-10 01:27:07', NULL),
(14, 3, 'http://www.oconnell.com/', 'Itaque sed est temporibus blanditiis nulla repudiandae corrupti. Qui quia animi recusandae incidunt. Recusandae non quo qui ea doloremque cumque. Ipsa qui mollitia necessitatibus omnis repellat sit laboriosam.', 'Approved', 0, '2024-02-10 01:27:07', '2024-02-10 01:27:07', NULL),
(15, 4, 'http://skiles.com/', 'Nisi iusto molestiae porro a rerum perferendis exercitationem. Non eum maiores deserunt. Eveniet voluptas est architecto omnis in perspiciatis qui aut. Et cupiditate pariatur ipsa vel quos praesentium.', 'Rejected', 0, '2024-02-10 01:27:07', '2024-02-10 01:27:07', NULL),
(16, 8, 'http://marvin.com/sint-tenetur-illum-numquam-velit-sunt-nulla-enim.html', 'Id voluptate dolore perferendis rem qui laborum perferendis. Facere consectetur sunt impedit cum voluptas. Est atque error ullam dignissimos optio asperiores. Odit enim vitae repudiandae.', 'In Review', 1, '2024-02-10 01:27:07', '2024-02-10 01:27:07', NULL),
(17, 2, 'http://www.toy.com/architecto-tenetur-aliquam-voluptatibus-reiciendis', 'Repellendus ex minima sit sequi debitis. Libero et tempora qui quia quibusdam. Voluptatem mollitia et sed placeat quia dignissimos.', 'Rejected', 0, '2024-02-10 01:27:07', '2024-02-10 01:27:07', NULL),
(18, 8, 'http://www.ratke.com/', 'Qui non eligendi voluptates perferendis. Deserunt odio amet dolores porro esse aliquid corporis. Deserunt accusamus recusandae beatae ducimus.', 'In Review', 1, '2024-02-10 01:27:07', '2024-02-10 01:27:07', NULL),
(19, 13, 'http://www.abernathy.com/recusandae-voluptatem-beatae-ex-commodi-voluptas-explicabo-et.html', 'Mollitia nam magni est in at molestias. Commodi eos quia voluptatibus tempora unde ut dolore. Dolore in et et non dolorum voluptatem assumenda. Accusantium rem non non ipsam laboriosam.', 'In Review', 0, '2024-02-10 01:27:07', '2024-02-10 01:27:07', NULL),
(20, 4, 'https://www.fadel.biz/et-facilis-ea-ut-consequatur-dolore-ut-nam-id', 'Ea eum iure quaerat debitis. Non dolor quia magnam amet omnis. Porro illum eveniet beatae quos eligendi magnam.', 'In Review', 0, '2024-02-10 01:27:07', '2024-03-02 01:04:21', '2024-03-02 01:04:21'),
(25, 10, 'https://gotopetsshop.com', 'fddasfdsaf', 'In Review', 1, '2024-02-10 08:54:37', '2024-02-10 09:28:33', '2024-02-10 09:28:33'),
(26, 4, 'https://gotopetsshop.com', 'fddasfdsaf', 'In Review', 1, '2024-02-10 08:55:24', '2024-02-10 09:24:00', '2024-02-10 09:24:00'),
(27, 13, 'https://gotopetsshop.com', 'fddasfdsaf', 'Approved', 1, '2024-02-10 08:56:44', '2024-02-10 09:23:54', '2024-02-10 09:23:54'),
(28, 8, 'https://gotopetsshop.com', 'fhdsakfhdkasf', 'In Review', 1, '2024-02-24 09:10:17', '2024-02-24 11:00:36', NULL),
(29, 12, 'https://gotopetsshop.com', 'fkdlfh fjdhakhlf', 'In Review', 0, '2024-02-24 11:02:01', '2024-03-02 00:40:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `website_scores`
--

CREATE TABLE `website_scores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `website_id` bigint(20) UNSIGNED NOT NULL,
  `da` tinyint(4) DEFAULT '0',
  `pa` tinyint(4) DEFAULT '0',
  `monthly_traffic` int(11) DEFAULT '0',
  `organic_search` int(11) DEFAULT '0',
  `spam_score` tinyint(4) DEFAULT '1',
  `domain_age` date DEFAULT NULL,
  `preview_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'This will store the screenshot of the website',
  `last_crawled_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_name_index` (`name`);

--
-- Indexes for table `category_website`
--
ALTER TABLE `category_website`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_website_category_id_index` (`category_id`),
  ADD KEY `category_website_website_id_index` (`website_id`),
  ADD KEY `category_website_is_visible_index` (`is_visible`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderchats`
--
ALTER TABLE `orderchats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderchats_order_id_index` (`order_id`),
  ADD KEY `orderchats_user_id_index` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_buyer_id_index` (`buyer_id`),
  ADD KEY `orders_seller_id_index` (`seller_id`),
  ADD KEY `orders_website_id_index` (`website_id`),
  ADD KEY `orders_website_backlink_rate_id_index` (`website_backlink_rate_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_index` (`user_id`),
  ADD KEY `transactions_order_id_index` (`order_id`),
  ADD KEY `transactions_transaction_type_index` (`transaction_type`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_email_index` (`email`),
  ADD KEY `users_status_index` (`status`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `websitebacklinkrates`
--
ALTER TABLE `websitebacklinkrates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `websitebacklinkrates_user_id_index` (`user_id`),
  ADD KEY `websitebacklinkrates_website_id_index` (`website_id`),
  ADD KEY `websitebacklinkrates_words_count_index` (`words_count`),
  ADD KEY `websitebacklinkrates_price_index` (`price`),
  ADD KEY `websitebacklinkrates_max_number_of_links_index` (`max_number_of_links`),
  ADD KEY `websitebacklinkrates_is_visible_index` (`is_visible`);

--
-- Indexes for table `websites`
--
ALTER TABLE `websites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `websites_url_index` (`url`),
  ADD KEY `websites_user_id_index` (`user_id`),
  ADD KEY `websites_website_status_index` (`website_status`),
  ADD KEY `websites_is_visible_index` (`is_visible`);

--
-- Indexes for table `website_scores`
--
ALTER TABLE `website_scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `website_scores_website_id_foreign` (`website_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `category_website`
--
ALTER TABLE `category_website`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `orderchats`
--
ALTER TABLE `orderchats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `websitebacklinkrates`
--
ALTER TABLE `websitebacklinkrates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `websites`
--
ALTER TABLE `websites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `website_scores`
--
ALTER TABLE `website_scores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_website`
--
ALTER TABLE `category_website`
  ADD CONSTRAINT `category_website_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_website_website_id_foreign` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orderchats`
--
ALTER TABLE `orderchats`
  ADD CONSTRAINT `orderchats_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderchats_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_buyer_id_foreign` FOREIGN KEY (`buyer_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_website_id_foreign` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD CONSTRAINT `user_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `websitebacklinkrates`
--
ALTER TABLE `websitebacklinkrates`
  ADD CONSTRAINT `websitebacklinkrates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `websitebacklinkrates_website_id_foreign` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`);

--
-- Constraints for table `websites`
--
ALTER TABLE `websites`
  ADD CONSTRAINT `websites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `website_scores`
--
ALTER TABLE `website_scores`
  ADD CONSTRAINT `website_scores_website_id_foreign` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
