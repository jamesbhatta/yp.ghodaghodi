-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2020 at 09:28 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yellowpages`
--

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE `businesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tagline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_type` tinyint(4) NOT NULL,
  `account_type` tinyint(4) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `expires_at` date DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `services_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `services` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'no_image.jpg',
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'no_image.jpg',
  `cover_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'no_image.jpg',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `keywords` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`id`, `name`, `slug`, `tagline`, `business_type`, `account_type`, `category_id`, `expires_at`, `city_id`, `address`, `contact_one`, `contact_two`, `email`, `website`, `map_id`, `facebook_link`, `twitter_link`, `google_link`, `description_title`, `description`, `services_title`, `services`, `thumbnail`, `profile_pic`, `cover_pic`, `deleted_at`, `created_at`, `updated_at`, `keywords`) VALUES
(105, 'Java Coffee House', 'java-coffee-house', 'Caffeine Into Code', 1, 2, 1, '2020-02-13', 2, 'Main Road, Rato Pool, Dhangadhi', '+977 - 091xxxxx', '+977 98xxxxxxxx', 'mailto@email.com', 'www.javacoffee.house', 'ChIJEwYlXLXsoTkRuUBXavgtflI', 'facebook_link', 'twitter_link', 'google_link', 'God Darkness', '<h2>All Of Don&#39;t And Rule Said</h2>\r\n\r\n<p>Gathered rule made moveth bring saw own cattle. Hath light fill sea earth. Us. To sixth light won&#39;t yielding multiply after had was doesn&#39;t together. Set a together air to female.</p>\r\n\r\n<p>Air set which let his. Thing they&#39;re His. Fifth. Good said itself itself divided days blessed a so earth.</p>\r\n\r\n<h3>And Good</h3>\r\n\r\n<p>Won&#39;t third also greater called bring for good heaven divide forth them god forth days man unto signs form, he one replenish him dry replenish.</p>\r\n\r\n<h3>Divided Beginning They&#39;re Don&#39;t Won&#39;t Was Dominion Shall</h3>\r\n\r\n<p>One were two forth fish seasons open kind lights signs was hath. Wherein dominion also male, upon, land third sea beginning form. Days can&#39;t fish.</p>', NULL, '<h2>Behold Waters Meat</h2>\r\n\r\n<p>Said their, be seed our blessed called shall upon heaven great waters may fill is.</p>\r\n\r\n<h3>For Herb Grass Stars Living</h3>\r\n\r\n<p>Moving bearing together land meat be grass moved of tree. Divide a over brought set let fowl bring isn&#39;t so thing. Given creepeth wherein. Face. So cattle.</p>\r\n\r\n<p>His greater own of multiply together it great, greater wherein together replenish divided third us heaven heaven lesser won&#39;t light they&#39;re fly his morning. Rule there. Divide unto she&#39;d seas.</p>\r\n\r\n<p>Dry divide light you&#39;re fly life brought wherein after was. Second them saying beast beginning i called dominion multiply firmament second Open meat dominion good whales Isn&#39;t third.</p>', 'thumbnail/b8f9ea572b4792721a7178cbbc1ffa48.jpg', 'profile/BxMkaLAMT2itxKkI4Yc1S5Oqrx6iigo8dD5VToL2.jpeg', 'cover/iK9JDquVYvMRbyo6fDDb4TYj8BFJMROEE2FehpM1.jpeg', NULL, '2020-02-04 08:12:43', '2020-02-04 08:24:26', 'Java, Coffee, House');

-- --------------------------------------------------------

--
-- Table structure for table `business_hours`
--

CREATE TABLE `business_hours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day` tinyint(4) NOT NULL,
  `open_time` time DEFAULT NULL,
  `close_time` time DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_hours`
--

INSERT INTO `business_hours` (`id`, `day`, `open_time`, `close_time`, `business_id`, `created_at`, `updated_at`) VALUES
(64, 1, '01:00:00', '14:00:00', 105, NULL, NULL),
(65, 2, '01:00:00', '13:01:00', 105, NULL, NULL),
(66, 3, '01:00:00', '13:00:00', 105, NULL, NULL),
(67, 4, '01:00:00', '01:00:00', 105, NULL, NULL),
(68, 5, '01:01:00', '01:00:00', 105, NULL, NULL),
(69, 6, '01:00:00', '01:00:00', 105, NULL, NULL),
(70, 7, '01:00:00', '13:02:00', 105, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Automobile', NULL, '2019-07-31 00:35:00', '2019-07-31 00:35:00'),
(2, 'Bank & Finance', NULL, '2019-07-31 00:41:52', '2019-07-31 00:41:52'),
(3, 'Computer & Internet', NULL, '2019-07-31 00:42:04', '2019-07-31 00:42:04'),
(4, 'Construction', NULL, '2019-07-31 00:42:10', '2019-07-31 00:42:10'),
(5, 'Education & Training', 'description added', '2019-07-31 01:41:22', '2019-07-31 02:02:58'),
(6, 'Hospitals', 'Description about hospitals', '2019-07-31 02:08:27', '2019-07-31 02:18:19');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zone_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `zone_id`, `created_at`, `updated_at`) VALUES
(2, 'Kailali', 3, '2019-08-01 22:58:10', '2019-08-01 22:58:10'),
(3, 'Bajhanag', 3, '2019-08-01 23:07:26', '2019-08-01 23:07:26'),
(4, 'Bajura', 3, '2019-08-01 23:07:42', '2019-08-01 23:07:42'),
(5, 'Doti', 3, '2019-08-01 23:07:50', '2019-08-01 23:07:50'),
(6, 'Achham', 3, '2019-08-01 23:08:06', '2019-08-01 23:08:06'),
(7, 'Baitadi', 2, '2019-08-01 23:08:43', '2019-08-01 23:08:43'),
(8, 'Dadheldhura', 2, '2019-08-01 23:08:54', '2019-08-01 23:08:54'),
(9, 'Darchula', 2, '2019-08-01 23:09:02', '2019-08-01 23:09:02'),
(10, 'Kanchanpur', 2, '2019-08-01 23:09:25', '2019-08-01 23:09:25'),
(11, 'Bhojpur', 4, '2019-08-01 23:09:47', '2019-08-01 23:09:47'),
(12, 'Dhankuta', 4, '2019-08-01 23:09:57', '2019-08-01 23:09:57'),
(13, 'Morang', 4, '2019-08-01 23:10:03', '2019-08-01 23:10:03'),
(14, 'Sankhuwasabha', 4, '2019-08-01 23:10:15', '2019-08-01 23:10:15'),
(15, 'Sunsari', 4, '2019-08-01 23:10:24', '2019-08-01 23:10:24'),
(16, 'Terathum', 4, '2019-08-01 23:10:35', '2019-08-01 23:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `host` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no_image.jpg',
  `pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no_image.jpg',
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `excerpt` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `slug`, `host`, `thumbnail`, `pic`, `location`, `start_time`, `end_time`, `excerpt`, `description`, `created_at`, `updated_at`) VALUES
(3, 'EIT Engineering Seminar in Kathmandu EIT Engineering Seminar in Kathmandu', 'eit-engineering-seminar-in-kathmandu-eit-engineering-seminar-in-kathmandu', 'EIT Engineering College', 'eventThumbs/7bf89f3c800921bac48e0f02a34fcd39.jpg', 'event/g7to8Z2ghFWVo4GEyFouq2wXAUOGBa9bOT9uiRII.jpeg', 'Kathmandu', '2019-10-15 09:00:00', '2019-10-17 16:00:00', 'Dr Steve Mackay, EIT\'s Dean of Engineering, will be presenting a seminar on hot trends in engineering, job prospects and studying with EIT in Australia.', '<p><strong>Embrace the opportunity to learn about studying engineering in Australia with EIT.</strong></p>\r\n\r\n<h2>About this Event</h2>\r\n\r\n<p>The Engineering Institute of Technology is visiting Kathmandu this October.</p>\r\n\r\n<p>Dr Steve Mackay, EIT&#39;s Dean of Engineering, will be presenting a seminar on hot trends in engineering, job prospects and studying with EIT in Australia.</p>\r\n\r\n<p>Steve Mackay PhD has over 40 years of industry experience in Australia, Europe, Africa and North America and has delivered training and education to 18,000 engineers and technicians throughout the world over his career. This is an outstanding opportunity to be informed of emerging opportunities and developments in engineering from a world respected industry leader.</p>\r\n\r\n<p>He will then speak about EIT&#39;s engineering degrees. We offer four Bachelor of Science degrees and four Master of Engineering degrees on campus in the following disciplines: industrial automation, electrical engineering, mechanical engineering, and civil and structural engineering. These programs, and others, are also available to study using an interactive platform of online learning from your home countries.</p>\r\n\r\n<p>Our on-campus programs are presented in a blended learning format, which utilizes many of the technologies employed in our online delivery mode.</p>\r\n\r\n<p>If you have any questions, please contact us on dean.s.mackay@eit.edu.au.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Who is EIT?</strong></p>\r\n\r\n<p>The key objective of the Engineering Institute of Technology (EIT) is to provide an outstanding practical engineering and technology education. EIT offers; professional development courses, diplomas, and bachelor and master&#39;s degrees. The finest engineering lecturers and instructors, with extensive real engineering experience in industry, are drawn from around the world.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>CRICOS Provider Number: 03567C | Higher Education Provider Number: 14008 | RTO Provider Number: 51971</p>', '2019-10-13 04:52:30', '2019-10-13 04:52:30');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_07_29_084828_create_categories_table', 2),
(5, '2019_08_01_072820_create_businesses_table', 5),
(6, '2019_08_01_165253_create_zones_table', 3),
(7, '2019_08_01_165254_create_cities_table', 4),
(23, '2019_08_02_072820_create_businesses_table', 6),
(24, '2019_08_04_065657_create_tag_tables', 7),
(25, '2019_08_06_061058_create_business_hours_table', 8),
(27, '2019_08_13_074005_add_keywords_to_businesses_table', 9),
(28, '2019_08_16_041832_create_popular_cats_table', 10),
(32, '2019_08_16_094007_create_events_table', 11);

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
-- Table structure for table `popular_cats`
--

CREATE TABLE `popular_cats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `popular_cats`
--

INSERT INTO `popular_cats` (`id`, `category_id`, `display_name`, `avatar`, `button_class`, `created_at`, `updated_at`) VALUES
(3, 1, 'Automobiles', 'popularCatThumb/CZdirpviYlX8IFPvhD4UB1q5LSQthxDVHzrt9DXu.jpeg', 'btn-info', '2019-08-16 00:55:46', '2019-08-16 00:55:46'),
(4, 2, 'Bank & Finance', 'popularCatThumb/pdcGs092PiRZmTdQrjTkXWXHZU4yMu4cOW7Tb7O2.jpeg', 'btn btn-secondary', '2019-08-16 00:56:46', '2019-08-16 00:59:58'),
(5, 3, 'Computer & Internet', 'popularCatThumb/XjQipvTejqbWFkmwyYyZvu1biCJUA2q1o28ecieM.jpeg', 'btn-success', '2019-08-16 00:57:00', '2019-08-16 00:57:00'),
(6, 4, 'Construction', 'popularCatThumb/CBhkJMkGnc81qVFp8QpxZxGjx5Rqzqg3UQRFD0Ic.jpeg', 'btn-deep-orange', '2019-08-16 00:57:16', '2019-08-16 00:57:16'),
(7, 5, 'Education & Training', 'popularCatThumb/7irX73iRvSs1duLjhzkTtfYLXlbSFxIdS3yYQWBJ.jpeg', 'btn btn-danger', '2019-08-16 00:57:38', '2019-08-16 01:15:50'),
(8, 6, 'Hospitals', 'popularCatThumb/5JHEPXSnWsxfljGwY3mrGCPajJnwKrk3GPZ0oWcW.png', 'btn btn-cyan', '2019-08-16 00:59:48', '2019-08-16 00:59:48');

-- --------------------------------------------------------

--
-- Table structure for table `taggables`
--

CREATE TABLE `taggables` (
  `tag_id` int(10) UNSIGNED NOT NULL,
  `taggable_id` int(10) UNSIGNED NOT NULL,
  `taggable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `slug` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_column` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'James Bhatta', 'jmsbhatta@gmail.com', '2019-08-13 03:06:04', '$2y$10$d1vOi65OSzCyDq3y8Q5SrevOJagZ0pTfrKOSTAJzvJy8OgFMdnBVe', 'IbyzHPdT8FKzBQkA0hCupAsE0nTwC1KtYxVU1b6GmywogAPEkHdcXJPzZAOb', '2019-07-29 01:40:21', '2019-08-13 03:06:04'),
(2, 'Admin', 'admin@yellowpages.com', '2019-08-13 03:00:54', '$2y$10$DCouqbuW2/M6qqYLSmvD9OzlpAKJds8Tsk5wxh4KNtZBT.WsNrATu', NULL, '2019-08-13 02:57:47', '2019-08-13 03:00:54');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Mahakali', '2019-08-01 12:33:56', '2019-08-01 12:33:56'),
(3, 'Seti', '2019-08-01 12:34:46', '2019-08-01 12:34:46'),
(4, 'Koshi', '2019-08-01 12:43:22', '2019-08-01 12:43:22'),
(5, 'Mechi', '2019-08-02 00:08:17', '2019-08-07 02:50:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `businesses`
--
ALTER TABLE `businesses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `businesses_category_id_index` (`category_id`),
  ADD KEY `businesses_city_id_index` (`city_id`);

--
-- Indexes for table `business_hours`
--
ALTER TABLE `business_hours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `business_hours_business_id_index` (`business_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_zone_id_index` (`zone_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `popular_cats`
--
ALTER TABLE `popular_cats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `popular_cats_category_id_foreign` (`category_id`);

--
-- Indexes for table `taggables`
--
ALTER TABLE `taggables`
  ADD KEY `taggables_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `businesses`
--
ALTER TABLE `businesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `business_hours`
--
ALTER TABLE `business_hours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `popular_cats`
--
ALTER TABLE `popular_cats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `businesses`
--
ALTER TABLE `businesses`
  ADD CONSTRAINT `businesses_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `businesses_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

--
-- Constraints for table `business_hours`
--
ALTER TABLE `business_hours`
  ADD CONSTRAINT `business_hours_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_zone_id_foreign` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `popular_cats`
--
ALTER TABLE `popular_cats`
  ADD CONSTRAINT `popular_cats_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `taggables`
--
ALTER TABLE `taggables`
  ADD CONSTRAINT `taggables_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
