-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2021 at 04:20 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diary`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2021_05_24_142735_create_posts_table', 1),
(4, '2021_05_31_120407_create_post_media_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entrycontent` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `entrycontent`, `created_at`, `updated_at`) VALUES
(1, 1, 'Post 1', 'Hello world,\r\nthis is my first post here', '2021-05-31 01:44:21', '2021-05-31 01:44:21'),
(3, 1, 'Post 2', 'Does\r\nthis work with \r\nbreaks?', '2021-05-31 02:02:30', '2021-05-31 02:02:30'),
(17, 1, 'black', 'black', '2021-05-31 04:18:35', '2021-05-31 04:18:35'),
(23, 1, 'multi image', 'lets seeeeeeeeee', '2021-06-02 21:10:16', '2021-06-02 21:10:16'),
(24, 1, 'video??', 'can i upload small video?', '2021-06-02 21:29:41', '2021-06-02 21:29:41'),
(26, 1, 'new video bb', 'trying something again', '2021-06-03 05:04:18', '2021-06-03 05:04:18'),
(27, 1, 'can i do video AND image?', 'omg can i?', '2021-06-03 05:06:59', '2021-06-03 05:06:59'),
(28, 2, 'Beach Day', 'Dear Diary, Today we went on beach and it was refreshing. We built sand castle, went to the sea and played around . We were all tired like hell. Best day of lockdown.', '2021-05-31 05:10:09', '2021-05-31 05:37:07'),
(29, 2, 'Beach Day 2', 'It was refreshing', '2021-05-31 05:12:40', '2021-05-31 05:12:40'),
(30, 2, 'Beach Day 21', 'ddddddddddddddddddddddddddddd', '2021-05-31 08:04:34', '2021-05-31 08:04:34'),
(31, 2, 'Beach Day', 'ddddddddddddddddddddddddddddddddddddddddddddddddddddd', '2021-05-31 08:04:54', '2021-05-31 08:04:54'),
(32, 2, 'Beach Day 21', 'dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', '2021-05-31 08:05:09', '2021-05-31 08:05:09'),
(34, 1, 'Gif work?', 'lets check', '2021-06-03 07:43:15', '2021-06-03 07:43:15'),
(41, 1, 'Triple', 'trouble', '2021-06-03 08:18:56', '2021-06-03 08:47:03');

-- --------------------------------------------------------

--
-- Table structure for table `post_media`
--

CREATE TABLE `post_media` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filetype` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_media`
--

INSERT INTO `post_media` (`id`, `user_id`, `post_id`, `filename`, `filetype`) VALUES
(3, 1, 17, '1_17_51Ro8uxPeQL.jpg', 'image'),
(6, 1, 23, '1_23_photo_2021-05-10_00-28-42.jpg', 'image'),
(7, 1, 23, '1_23_X7C2F9Q.png', 'image'),
(8, 1, 24, '1_24_ughfightmusic.mp4', 'video'),
(9, 1, 25, '1_25_atticusavi.PNG', 'image'),
(10, 1, 26, '1_26_kitty flat.mp4', 'video'),
(11, 1, 27, '1_27_8821-1b.jpg', 'image'),
(12, 1, 27, '1_27_NOW THIS GIF IS ON ANOTHER LEVEL.mp4', 'video'),
(13, 2, 28, '2_28_PicsArt_12-26-11.03.42 (2).jpg', 'image'),
(14, 2, 29, '2_29_Screenshot (271).png', 'image'),
(15, 1, 33, '1_33_bfcbaa54-64cb-4b22-9c0a-20a7c7287d5a.jpg', 'image'),
(16, 1, 34, '1_34_hellmo.gif', 'image'),
(23, 1, 41, '1_41_Happy_bday.gif', 'image'),
(24, 1, 41, '1_41_EfFGvIcU0AAAPXO.jpg', 'image'),
(25, 1, 41, '1_41_gojo.jpg', 'image');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Aishwarya Ganesh', 'aishwarya@gmail.com', '$2y$10$mS51k.wec1KTap.shPlUOOMQywwPxWvByPa/jNY9Yt7Nyz8EgaRWC', NULL, '2021-05-31 01:38:40', '2021-05-31 01:38:40'),
(2, 'Meliva Cruz', 'meliva12@gmail.com', '$2y$10$KIcvT2JgnxxEEOI3/ZkiDOtTPXptAvmImrZSMcozWTaC5ni2x/IH.', NULL, '2021-05-31 01:39:55', '2021-05-31 01:39:55');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_media`
--
ALTER TABLE `post_media`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `post_media`
--
ALTER TABLE `post_media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
