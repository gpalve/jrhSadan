-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2022 at 10:37 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parichar_sadan_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `letter_num` bigint(20) DEFAULT NULL,
  `relation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ward` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cot` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diagnosis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umid` date NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `ref`, `letter_num`, `relation`, `pname`, `ward`, `cot`, `diagnosis`, `address`, `gender`, `job`, `umid`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Binay Shrivastav', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Nsp', 'Male', 'Railway', '2000-02-02', 3, '2022-05-26 10:18:25', '2022-05-26 10:18:25'),
(2, 'Shivaram', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dfsasfdafds', 'Male', 'Motorman', '2001-01-01', 4, '2022-05-26 10:23:23', '2022-05-26 10:23:23'),
(3, 'Prince', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NSP', 'Male', 'ALP', '1995-02-03', 5, '2022-05-26 10:35:33', '2022-05-26 10:35:33'),
(4, 'Himmat Singh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dadar', 'Male', 'Railway', '2012-06-07', 6, '2022-05-27 14:34:02', '2022-05-27 14:34:02'),
(5, 'Arush', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'virar', 'Male', 'doc', '2011-02-16', 7, '2022-05-28 21:04:49', '2022-05-28 21:04:49'),
(6, 'Ganesh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dadar', 'Male', 'Railway', '2022-07-30', 8, '2022-05-30 09:35:32', '2022-05-30 09:35:32'),
(7, 'Narayana', 'dr. Prakash', 123456, 'friend', 'Rajaram', '04', '01', 'fever', 'Dadar', 'Male', 'Railway', '2002-06-12', 9, '2022-05-30 12:57:10', '2022-05-30 12:57:10');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `facility_room`
--

CREATE TABLE `facility_room` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `facility_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `url` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `relation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '0000_00_00_000000_create_websockets_statistics_entries_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2021_04_09_022148_create_room_statuses_table', 1),
(6, '2021_04_09_143243_create_customers_table', 1),
(7, '2021_04_09_143318_create_types_table', 1),
(8, '2021_04_09_143320_create_rooms_table', 1),
(9, '2021_04_09_143335_create_transactions_table', 1),
(10, '2021_04_09_143453_create_payments_table', 1),
(11, '2021_04_09_153936_create_images_table', 1),
(12, '2021_04_09_161146_create_facilities_table', 1),
(13, '2021_04_09_161237_create_facility_room_table', 1),
(14, '2021_04_17_202643_add_status_to_payments_table', 1),
(15, '2021_04_18_205922_create_notifications_table', 1),
(16, '2022_05_30_194652_create_members_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(65,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `transaction_id`, `price`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 1, '3000.00', '2022-05-26 10:21:37', '2022-05-26 10:21:37', 'Down Payment'),
(2, 1, 2, '300000.00', '2022-05-26 10:25:13', '2022-05-26 10:25:13', 'Down Payment'),
(3, 1, 3, '20000.00', '2022-05-26 10:37:36', '2022-05-26 10:37:36', 'Down Payment'),
(4, 1, 4, '80000.00', '2022-05-27 14:35:18', '2022-05-27 14:35:18', 'Down Payment'),
(5, 1, 5, '29.00', '2022-05-27 14:41:16', '2022-05-27 14:41:16', 'Down Payment'),
(6, 1, 9, '4.00', '2022-05-30 09:47:02', '2022-05-30 09:47:02', 'Payment');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `room_status_id` bigint(20) UNSIGNED NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` bigint(20) NOT NULL,
  `price` double NOT NULL,
  `view` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `type_id`, `room_status_id`, `number`, `capacity`, `price`, `view`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '10', 3, 2, 'sea  view', '2022-05-26 10:17:22', '2022-05-28 14:15:01'),
(2, 1, 1, '2', 4, 2, 'aaa', '2022-05-26 10:24:10', '2022-05-28 14:15:47'),
(3, 1, 1, '101', 3, 2, 'Sea', '2022-05-27 14:38:30', '2022-05-28 14:15:25'),
(4, 1, 1, '102', 2, 2, 'Lake', '2022-05-27 14:39:38', '2022-05-28 14:15:39');

-- --------------------------------------------------------

--
-- Table structure for table `room_statuses`
--

CREATE TABLE `room_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `information` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_statuses`
--

INSERT INTO `room_statuses` (`id`, `name`, `code`, `information`, `created_at`, `updated_at`) VALUES
(1, 'Available', '1', 'available', '2022-05-26 10:16:29', '2022-05-26 10:16:29'),
(2, 'Pending', '2', 'warning', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_status` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `customer_id`, `room_id`, `check_in`, `check_out`, `status`, `room_status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2022-05-27', '2022-05-29', 'Reservation', 2, '2022-05-26 10:21:37', '2022-05-26 10:21:37'),
(2, 1, 2, 2, '2022-05-29', '2022-06-05', 'Reservation', 2, '2022-05-26 10:25:13', '2022-05-26 10:25:13'),
(3, 1, 3, 2, '2022-05-26', '2022-05-28', 'Reservation', 1, '2022-05-26 10:37:36', '2022-05-31 15:55:30'),
(4, 1, 4, 1, '2022-06-01', '2022-06-06', 'Reservation', 1, '2022-05-27 14:35:18', '2022-05-27 14:35:18'),
(5, 1, 4, 4, '2022-05-27', '2022-05-30', 'Reservation', 1, '2022-05-27 14:41:16', '2022-05-27 14:41:16'),
(6, 1, 5, 1, '2022-06-24', '2022-06-25', 'Reservation', 1, '2022-05-28 21:06:31', '2022-05-30 10:46:28'),
(8, 1, 1, 1, '2022-06-08', '2022-06-11', 'Reservation', 2, '2022-05-28 21:28:27', '2022-05-28 21:28:27'),
(9, 1, 4, 3, '2022-06-04', '2022-06-06', 'Reservation', 2, '2022-05-28 21:29:50', '2022-05-28 21:29:50'),
(10, 1, 5, 4, '2022-06-07', '2022-06-08', 'Reservation', 2, '2022-05-28 21:31:41', '2022-05-28 21:31:41'),
(11, 1, 3, 4, '2022-06-19', '2022-06-20', 'Reservation', 1, '2022-05-28 21:37:24', '2022-06-01 09:54:18'),
(12, 1, 1, 4, '2022-06-23', '2022-06-29', 'Reservation', 2, '2022-05-29 15:35:29', '2022-06-01 09:56:36'),
(13, 1, 6, 2, '2022-06-17', '2022-06-18', 'Reservation', 2, '2022-05-30 09:36:19', '2022-05-30 10:44:52');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `information` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `information`, `created_at`, `updated_at`) VALUES
(1, 'Parichar Sadan', 'Parichar Sadan', '2022-05-26 10:13:36', '2022-05-26 10:13:36'),
(2, 'T-55', 'T-55', '2022-05-26 10:13:51', '2022-05-26 10:13:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('Super','Admin','Customer','Approver') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `random_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `role`, `email_verified_at`, `password`, `random_key`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'krutika', 'krutika@gmail.com', NULL, 'Super', '2022-04-07 10:47:12', '$2y$10$9jvMqH.VrOSx.0Lfce.nJez5R/7BJcm4EDKd9Fzyui8HD2Ju/EY6y', '', NULL, '2022-05-26 06:23:44', '2022-05-26 06:23:55'),
(2, 'Ramesh', 'shiva@gmail.com', NULL, 'Admin', '2022-05-18 06:40:53', '$2y$10$9jvMqH.VrOSx.0Lfce.nJez5R/7BJcm4EDKd9Fzyui8HD2Ju/EY6y', '', NULL, '2022-05-26 06:40:53', '2022-05-26 06:40:55'),
(3, 'Binay Shrivastav', 'binay@gmail.com', NULL, 'Customer', '2022-05-26 07:11:19', '$2y$10$9jvMqH.VrOSx.0Lfce.nJez5R/7BJcm4EDKd9Fzyui8HD2Ju/EY6y', '5p4ss0UlRAUnixvdEBFHxsN9wc9ySaYBKsL81bTDms5vD1qWdkknmTG6duZa', NULL, '2022-05-26 10:18:24', '2022-05-26 10:18:24'),
(4, 'Shivaram', 'shivaramiyer@hotmail.com', NULL, 'Customer', NULL, '$2y$10$9YeXRvirfO.WAt3FAOzmc.Oe8KWzPlrmhIXvrSECzXiCBucASrJim', 'URz62Qgy8xtf0uCW9oUicplTHSBHYQIpl9dDvN2OZsdcqr2LpFjCmuZYblVw', NULL, '2022-05-26 10:23:23', '2022-05-26 10:23:23'),
(5, 'Prince', 'prince@gmail.com', NULL, 'Customer', NULL, '$2y$10$eU2bogCWVP/IVGBdtYOAC.PcHI7JCPacftpSaBT.T.TY8VDrKwBg6', 'ylNrXh0spcqYSHlKWtYQI9Nsy2vXzNgVfvKGJyiGHHNV890r8IaH8wAH4OhC', NULL, '2022-05-26 10:35:33', '2022-05-26 10:35:33'),
(6, 'Himmat Singh', 'himmat@gmail.com', NULL, 'Customer', NULL, '$2y$10$u1jxaR6pwrSQoGjqs4NLm.WiOx.MGzGGLqWhA1s.xakEHFRhpBPFm', '56V9U9qgEJ92ZkDdFJpeIjLOgflNJeeyekBNLKllo48kLXG7O3GLOas7eOzx', NULL, '2022-05-27 14:34:02', '2022-05-27 14:34:02'),
(7, 'Arush', 'arush@gmail.com', NULL, 'Customer', NULL, '$2y$10$UEqSHFTBPpZU2QkW3vmnseG5Jq9N335nLOTt8fijOlI7pELzB1ncq', 'hqXt1KdnPqeQ6BRxFJzzmonNaERMqNpiqn6Mn2Z6z3KRqg4hpy2ERojJmR06', NULL, '2022-05-28 21:04:48', '2022-05-28 21:04:48'),
(8, 'Ganesh', 'gpalve@gmail.com', NULL, 'Customer', NULL, '$2y$10$9AzQfXNSBC3/E5Wyckxs6eNmbettSfEfrLn6MUSBFkfJCtR0/WoZq', '3YVvr1KTbP61aI88mCyFNtsusbDT7GMEr131DCcteCy1wXTS4MY2PqgI2LGL', NULL, '2022-05-30 09:35:32', '2022-05-30 09:35:32'),
(9, 'Narayana', 'narayana@gmail.com', NULL, 'Customer', NULL, '$2y$10$Kj39UMz7K7zXUP/I5hrJhOyBN4NeDmMxg9JIbT7RfByBZQn1JKZeS', 'uHQocNywoZmGzhBjfJaVMoeGHILmwsDiZF1jVSa48OneLFTXGGyEvVxGiuKu', NULL, '2022-05-30 12:57:10', '2022-05-30 12:57:10');

-- --------------------------------------------------------

--
-- Table structure for table `websockets_statistics_entries`
--

CREATE TABLE `websockets_statistics_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peak_connection_count` int(11) NOT NULL,
  `websocket_message_count` int(11) NOT NULL,
  `api_message_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_user_id_foreign` (`user_id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facility_room`
--
ALTER TABLE `facility_room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facility_room_room_id_foreign` (`room_id`),
  ADD KEY `facility_room_facility_id_foreign` (`facility_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_room_id_foreign` (`room_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_user_id_foreign` (`user_id`),
  ADD KEY `payments_transaction_id_foreign` (`transaction_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_type_id_foreign` (`type_id`),
  ADD KEY `rooms_room_status_id_foreign` (`room_status_id`);

--
-- Indexes for table `room_statuses`
--
ALTER TABLE `room_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_customer_id_foreign` (`customer_id`),
  ADD KEY `transactions_room_id_foreign` (`room_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `facility_room`
--
ALTER TABLE `facility_room`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room_statuses`
--
ALTER TABLE `room_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `facility_room`
--
ALTER TABLE `facility_room`
  ADD CONSTRAINT `facility_room_facility_id_foreign` FOREIGN KEY (`facility_id`) REFERENCES `facilities` (`id`),
  ADD CONSTRAINT `facility_room_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`),
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_room_status_id_foreign` FOREIGN KEY (`room_status_id`) REFERENCES `room_statuses` (`id`),
  ADD CONSTRAINT `rooms_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `transactions_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
