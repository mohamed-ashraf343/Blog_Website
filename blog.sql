-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2024 at 01:28 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `parent` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `image`, `parent`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'images/689e7b36-dab8-405a-83f4-112325c9e9a0logo.png', 0, '2024-01-23 06:41:40', '2024-01-23 06:43:06', NULL),
(2, 'images/a70314f7-ac98-4b2a-ac80-52e793d8ed162fcf0217-9dd4-48f1-a80d-cbec23c81e17.jpg', 1, '2024-01-23 06:42:28', '2024-01-23 06:55:08', NULL),
(4, NULL, 0, '2024-01-23 06:47:23', '2024-01-23 06:47:23', NULL),
(5, NULL, 0, '2024-01-23 06:54:41', '2024-01-23 06:54:41', NULL),
(6, NULL, 4, '2024-01-23 09:40:00', '2024-01-23 09:40:00', NULL),
(7, NULL, 4, '2024-01-23 09:41:16', '2024-01-23 09:41:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_translations`
--

CREATE TABLE `category_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_translations`
--

INSERT INTO `category_translations` (`id`, `category_id`, `locale`, `title`, `content`) VALUES
(1, 1, 'ar', 'قسم فرعي', 'يييييييييييييييييي'),
(2, 1, 'en', NULL, NULL),
(3, 1, 'fr', NULL, NULL),
(4, 2, 'ar', 'قسم تحت القسم الفرعي (1)', NULL),
(5, 2, 'en', NULL, NULL),
(6, 2, 'fr', NULL, NULL),
(10, 4, 'ar', 'قسم تحت القسم الرئيسي  (2)', NULL),
(11, 4, 'en', NULL, NULL),
(12, 4, 'fr', NULL, NULL),
(13, 5, 'ar', 'قسم تحت القسم الرئيسي  (2)', NULL),
(14, 5, 'en', NULL, NULL),
(15, 5, 'fr', NULL, NULL),
(16, 6, 'ar', 'عنوان المقالة بالعربي', 'dddddddddd'),
(17, 6, 'en', NULL, NULL),
(18, 6, 'fr', NULL, NULL),
(19, 7, 'ar', 'عنوان المقالة بالعربي', 'dddddddddd'),
(20, 7, 'en', NULL, NULL),
(21, 7, 'fr', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_04_20_182841_create_settings_table', 1),
(6, '2022_04_20_183045_create_setting_translations_table', 1),
(7, '2022_04_20_183752_categories', 1),
(8, '2022_04_20_183836_create_category_translations_table', 1),
(9, '2022_04_20_184155_create_posts_table', 1),
(10, '2022_04_20_184207_create_post_translations_table', 1),
(11, '2022_04_24_120025_add_softdelete_to_users_table', 1),
(12, '2022_04_27_183723_add_tags_to_post_translations_table', 1),
(13, '2022_04_29_223308_add_user_id_to_posts_table', 1),
(14, '2014_10_12_100000_create_password_reset_tokens_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `image`, `category_id`, `created_at`, `updated_at`, `deleted_at`, `user_id`) VALUES
(1, 'images/7a9d4773-b2f5-4567-b443-2a2a0361bd8eabout1.jpeg', 1, '2024-01-23 09:20:46', '2024-01-23 10:27:26', NULL, NULL),
(2, 'images/0e75424c-25fe-408c-b1ae-1250a584936d2fcf0217-9dd4-48f1-a80d-cbec23c81e17.jpg', 1, '2024-01-23 09:37:50', '2024-01-23 09:37:50', NULL, NULL),
(3, 'images/9dea2b03-b30d-43ef-83e3-b94252ec6dc37442aa2e-134c-40b5-b3a6-3675b48f249d7778888.png', 2, '2024-01-23 09:43:08', '2024-01-23 10:05:24', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_translations`
--

CREATE TABLE `post_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `smallDesc` text DEFAULT NULL,
  `tags` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_translations`
--

INSERT INTO `post_translations` (`id`, `post_id`, `locale`, `title`, `content`, `smallDesc`, `tags`) VALUES
(1, 1, 'ar', 'عنوان المقالة بالعربي 1', '<p>نص المقالة الثاني 2</p>', '<p>نص المقالة الاول 1</p>', 'تاج واحد و تاج اتنين12'),
(2, 1, 'en', 'english', '<p>Eng Desc 2</p>', '<p>Eng Desc 1</p>', 'tags 1 tages 2'),
(3, 1, 'fr', NULL, NULL, NULL, NULL),
(4, 2, 'ar', 'عنوان المقالة بالعربي', NULL, NULL, 'تاج واحد و تاج اتنين'),
(5, 2, 'en', 'english', NULL, NULL, 'tags 1 tages 2'),
(6, 2, 'fr', NULL, NULL, NULL, NULL),
(7, 3, 'ar', 'عنوان المقالة بالعربي', NULL, NULL, NULL),
(8, 3, 'en', NULL, NULL, NULL, NULL),
(9, 3, 'fr', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `favicon`, `facebook`, `instagram`, `phone`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '/images/2c7c53eb-82cc-4343-9882-feb8af9ec93b7e92a6bc-228c-43a3-bbde-36cb090556f4male-placeholder-image.jpeg', '/images/2ae3eefd-67cb-4f45-bda3-3dc3bbacec497e92a6bc-228c-43a3-bbde-36cb090556f4male-placeholder-image.jpeg', 'facebook', 'instagram', '0101307133', 'masterlink223@yahoo.com', '2024-01-16 19:42:59', '2024-01-16 19:45:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setting_translations`
--

CREATE TABLE `setting_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `setting_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting_translations`
--

INSERT INTO `setting_translations` (`id`, `setting_id`, `locale`, `title`, `content`, `address`) VALUES
(1, 1, 'ar', 'العربية', 'الوصففففف ,,,,,,,,,,,,,,,,,,', 'طنطا  الغربية'),
(2, 1, 'en', 'english', NULL, NULL),
(3, 1, 'fr', 'frensh', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('writer','admin') DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mohamed Ashraf', 'masterlink223@yahoo.com', NULL, '$2y$12$IbO2ZrKUFqoCV4LnK5M3pekLu/7i8LB44CLonPtZfGnM0wkoP.jH6', 'admin', NULL, '2024-01-16 19:47:30', '2024-01-16 19:47:30', NULL),
(2, 'Mohamed Ahmed Ashraf', 'admin@gmail.com', NULL, '$2y$12$fkRSwnle.yj6xsU59npPFe0ABgraZ/18.KJJ99oNyuJL5jvl1kcgK', NULL, NULL, '2024-01-20 06:34:05', '2024-01-20 06:52:07', NULL),
(3, 'Ali Mohamed', 'ali_mohamed@yahoo.com', NULL, '$2y$12$YsGXjkD.rAzY4xZe/79IWuvmTFzJW4kSJqIIUMfysrgM1zPNwxPHu', NULL, NULL, '2024-01-20 06:34:45', '2024-01-20 06:34:45', NULL),
(4, 'Mahmoud Ahmed', 'Mahmoud_ahmed@yahoo.com', NULL, '$2y$12$PPGcelME9ZEWb7KsgrNhT.NbaOqkEOpHuUVFJQOBqao3rgtdeVY52', NULL, NULL, '2024-01-20 06:35:14', '2024-01-20 06:44:25', NULL),
(5, 'mohamed', 'masterlink@yahoo.com', NULL, '$2y$12$din1RXWSgSdYVoZbzXjw1.QqsQn4.s9Des9hbrPK4ZApywdbfCPHK', 'writer', NULL, '2024-01-20 06:55:05', '2024-01-20 06:55:05', NULL),
(6, 'mohamed', 'mahmoudelramaly1996@gmail.com', NULL, '$2y$12$rWKNwNr3/UbClhw4g/uYd.rndt.Xg/KF6mdpiLAJkEgXC0n8pxBLa', NULL, NULL, '2024-01-20 07:08:33', '2024-01-20 07:08:33', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_translations_category_id_locale_unique` (`category_id`,`locale`),
  ADD KEY `category_translations_locale_index` (`locale`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `post_translations`
--
ALTER TABLE `post_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_translations_post_id_locale_unique` (`post_id`,`locale`),
  ADD KEY `post_translations_locale_index` (`locale`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_translations`
--
ALTER TABLE `setting_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `setting_translations_setting_id_locale_unique` (`setting_id`,`locale`),
  ADD KEY `setting_translations_locale_index` (`locale`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category_translations`
--
ALTER TABLE `category_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post_translations`
--
ALTER TABLE `post_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_translations`
--
ALTER TABLE `setting_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD CONSTRAINT `category_translations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_translations`
--
ALTER TABLE `post_translations`
  ADD CONSTRAINT `post_translations_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `setting_translations`
--
ALTER TABLE `setting_translations`
  ADD CONSTRAINT `setting_translations_setting_id_foreign` FOREIGN KEY (`setting_id`) REFERENCES `settings` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
