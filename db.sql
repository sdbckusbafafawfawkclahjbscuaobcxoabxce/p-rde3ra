-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 01, 2019 at 08:42 AM
-- Server version: 5.6.41
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bazir_GILAS_CMS_ZARXSTDCYUVFIGBONJMPKSSDSDSD`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#',
  `imgpath` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jalalitimestamps` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catgories`
--

CREATE TABLE `catgories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `post_type_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jalalitimestamps` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catgories`
--

INSERT INTO `catgories` (`id`, `title`, `father`, `post_type_id`, `jalalitimestamps`, `status`, `created_at`, `updated_at`) VALUES
(1, 'فروشگاه آنلاین3024', 'none', '1', '1397-11-05 12:51:53', 'active', '2019-01-25 04:51:53', '2019-01-25 04:51:53'),
(2, 'رب گوجه ارزان', 'none', '1', '1397-11-05 12:51:57', 'active', '2019-01-25 04:51:57', '2019-01-25 04:51:57'),
(3, 'فروشگاه گلبافت', '1', '1', '1397-11-05 12:52:05', 'active', '2019-01-25 04:52:05', '2019-01-27 22:18:09'),
(4, 'نوین ابر پرشین 2', '3', '1', '1397-11-05 12:52:15', 'active', '2019-01-25 04:52:15', '2019-01-27 21:39:07'),
(5, 'ارسال رایگان', '3', '1', '1397-11-05 13:30:12', 'deleted', '2019-01-25 05:30:12', '2019-01-27 10:41:34'),
(6, 'فروشگاه گلبافت', '2', '1', '1397-11-05 13:30:24', 'deleted', '2019-01-25 05:30:24', '2019-01-27 10:41:37'),
(7, 'فروشگاه آنلاین3024', '1', '1', '1397-11-12 04:46:28', 'active', '2019-02-01 01:16:28', '2019-02-01 01:16:28'),
(8, 'رب گوجه ارزان', '2', '1', '1397-11-12 04:46:36', 'active', '2019-02-01 01:16:36', '2019-02-01 01:16:36'),
(9, 'لوازم آرایشی اهواز', 'none', '1', '1397-11-12 04:47:03', 'active', '2019-02-01 01:17:03', '2019-02-01 01:17:03'),
(10, 'فروشگاه گلبافت', '9', '1', '1397-11-12 04:47:18', 'active', '2019-02-01 01:17:18', '2019-02-01 01:17:18');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `imgpath` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `extradata` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `post_type_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catgory` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'دسته بندی نشده',
  `jalalitimestamps` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `generalinfo`
--

CREATE TABLE `generalinfo` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `jalalitimestamps` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `generalinfo`
--

INSERT INTO `generalinfo` (`id`, `name`, `value`, `description`, `status`, `jalalitimestamps`, `created_at`, `updated_at`) VALUES
(1, 'title', 'GilasCMS-GL5', 'توضیحات اضافه', 'active', '08:00:08/1397-10-15', '2017-08-23 05:42:36', '2019-01-24 21:38:53'),
(2, 'description', 'اولین سیستم مدیریت محتوی متصل تیم نرم افزاری گیلاس', 'توضیحات اضافه', 'active', '08:00:08/1397-10-15', '2017-08-23 05:42:36', '2019-02-01 01:26:16'),
(3, 'keywords', 'مشاوره و تولید انواع وب سایت و اپلیکشن موبایل', 'توضیحات اضافه', 'active', '08:00:08/1397-10-15', '2017-08-23 05:42:36', '2019-01-24 21:34:01'),
(4, 'adminemail', 'info@gilasweb.ir', 'توضیحات اضافه', 'active', '08:00:08/1397-10-15', '2017-08-23 05:42:36', '2019-01-24 21:34:01'),
(5, 'url', 'http://localhost', 'توضیحات اضافه', 'active', '08:00:08/1397-10-15', '2017-08-23 05:42:36', '2019-01-24 21:34:01'),
(6, 'logopath', '/uploads/generalinfo/b7b70189b9698f6213f2799fb12925e2cfcd208495d565ef66e7dff9f98764da.png', 'توضیحات اضافه', 'active', '08:00:08/1397-10-15', '2017-08-23 05:42:36', '2019-01-25 01:22:50'),
(7, 'faviconpath', '/uploads/generalinfo/7ce30eeb956b8bbdecfdb304b556edbacfcd208495d565ef66e7dff9f98764da.png', 'توضیحات اضافه', 'active', '08:00:08/1397-10-15', '2017-08-23 05:42:36', '2019-02-01 01:26:16'),
(8, 'address', 'خوزستان، اهواز، دانشگاه شهید چمران، مرکز رشد واحدهای فناور، طبقه اول، اتاق ٣٢', 'توضیحات اضافه', 'active', '08:00:08/1397-10-15', '2017-08-23 05:42:36', '2019-01-05 04:30:08'),
(9, 'attachcode', '...test', 'توضیحات اضافه', 'active', '08:00:08/1397-10-15', '2017-08-23 05:42:36', '2019-02-01 01:26:16'),
(10, 'tel', '06133334232', 'توضیحات اضافه', 'active', '08:00:08/1397-10-15', '2017-08-23 05:42:36', '2019-01-05 04:30:08'),
(11, 'mobile', '09163151967', 'توضیحات اضافه', 'active', '08:00:08/1397-10-15', '2017-08-23 05:42:36', '2019-01-05 04:30:08'),
(12, 'facebook', 'https://', 'توضیحات اضافه', 'active', '08:00:08/1397-10-15', '2017-08-23 05:42:36', '2019-01-05 04:30:08'),
(13, 'twitter', 'https://', 'توضیحات اضافه', 'active', '08:00:08/1397-10-15', '2017-08-23 05:42:37', '2019-01-05 04:30:08'),
(14, 'aparat', 'https://', 'توضیحات اضافه', 'active', '08:00:08/1397-10-15', '2017-08-23 05:42:37', '2019-01-05 04:30:08'),
(15, 'soroush', 'https://', 'توضیحات اضافه', 'active', '08:00:08/1397-10-15', '2017-08-23 05:42:37', '2019-01-05 04:30:08'),
(16, 'instagram', 'https://', 'تست', 'active', '08:00:08/1397-10-15', '2017-08-23 05:42:37', '2019-01-05 04:30:08'),
(17, 'telegram', 'https://', 'توضیحات اضافه', 'active', '08:00:08/1397-10-15', '2017-08-23 05:42:37', '2019-01-05 04:30:08'),
(18, 'linkdin', 'https://', 'توضیحات اضافه', 'active', '08:00:08/1397-10-15', '2017-08-23 05:42:37', '2019-01-05 04:30:08'),
(19, 'zarinpal key', 'f1db018a-8500-11e8-bbc0-005056a205be', 'توضیحات اضافه', 'active', '08:00:08/1397-10-15', '2017-08-23 05:42:37', '2019-01-05 04:30:08'),
(20, 'sms key', '5970724F3067626C6863694F62657442574A6C7877366E6D42305832756F796C', 'توضیحات اضافه', 'active', '08:00:08/1397-10-15', '2017-08-23 05:42:37', '2019-01-05 04:30:08'),
(21, 'sms line number', '10005505505550', 'توضیحات اضافه', 'active', '08:00:08/1397-10-15', '2017-08-23 05:42:37', '2019-01-05 04:30:08'),
(22, 'tax value', '0', 'توضیحات اضافه', 'active', '08:00:08/1397-10-15', '2017-08-23 05:42:37', '2019-01-05 04:30:08'),
(24, 'bank key', 'xxxxxxxxxxxx', 'توضیحات اضافه', 'active', '08:00:08/1397-10-15', '2017-08-23 05:42:37', '2019-01-25 01:43:30'),
(23, 'google key', 'xxxxxxxxxxxx', 'توضیحات اضافه', 'active', '08:00:08/1397-10-15', '2017-08-23 05:42:37', '2019-01-25 01:42:43'),
(25, 'defaultheader', '/uploads/generalinfo/dfc6aa246e88ab3e32caeaaecf433550cfcd208495d565ef66e7dff9f98764da.jpg', 'توضیحات اضافه', 'active', '08:00:08/1397-10-15', '2017-08-23 05:42:37', '2019-02-01 01:26:16');

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
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usercarts`
--

CREATE TABLE `usercarts` (
  `id` int(10) UNSIGNED NOT NULL,
  `userid` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cartcontent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cartsubtotal` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `other` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `jalalitimestamps` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userlogs`
--

CREATE TABLE `userlogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `userrole` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `useragent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jalalitimestamps` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `userid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userlogsarchives`
--

CREATE TABLE `userlogsarchives` (
  `id` int(10) UNSIGNED NOT NULL,
  `userrole` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `useragent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jalalitimestamps` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `userid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `credit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `extradata` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `other` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catgories`
--
ALTER TABLE `catgories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generalinfo`
--
ALTER TABLE `generalinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Indexes for table `usercarts`
--
ALTER TABLE `usercarts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlogs`
--
ALTER TABLE `userlogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlogsarchives`
--
ALTER TABLE `userlogsarchives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `catgories`
--
ALTER TABLE `catgories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `generalinfo`
--
ALTER TABLE `generalinfo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `usercarts`
--
ALTER TABLE `usercarts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userlogs`
--
ALTER TABLE `userlogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userlogsarchives`
--
ALTER TABLE `userlogsarchives`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
