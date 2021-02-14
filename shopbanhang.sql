-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 14, 2021 at 04:28 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopbanhang`
--

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
(20, '2020_10_25_150855_create_table_admin', 1),
(21, '2020_11_15_100218_add_level_status_to_users_table', 1),
(22, '2020_11_16_140119_create_tbl_category', 1),
(23, '2020_11_25_145241_create_brand_table', 1),
(27, '2020_11_29_031600_create_product_table', 2),
(28, '2014_10_12_000000_create_users_table', 3),
(29, '2021_01_27_152333_create_table_orders', 3),
(30, '2021_01_27_152422_create_table_orders_details', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `email`, `password`, `level`, `status`, `name`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '123456', 0, 0, 'Admin', '0977457889', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`, `brand_desc`, `brand_status`, `created_at`, `updated_at`) VALUES
(1, 'Samsung', '<p>Samsung Electronics</p>', 1, NULL, '2020-12-16 06:49:22'),
(2, 'Nokia', '<p>Nokia</p>', 1, NULL, NULL),
(3, 'VinSmart', '<p>VinSmart</p>', 1, NULL, NULL),
(4, 'Asus', '<p>Asus</p>', 1, NULL, '2020-12-16 06:33:07'),
(5, 'Huawei', '<p>Huawei</p>', 1, NULL, '2020-12-16 06:32:42'),
(6, 'Lenovo', '<p>Lenovo</p>', 0, NULL, '2020-12-16 06:33:18'),
(7, 'Apple', '<p>Apple</p>', 0, NULL, '2020-12-16 06:51:48'),
(8, 'Oppo', '<p>Oppo</p>', 1, NULL, '2020-12-16 06:33:28'),
(9, 'Xiaomi', '<p>Xiaomi</p>', 1, NULL, '2020-12-16 06:39:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(10) UNSIGNED NOT NULL,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`, `cat_desc`, `cat_status`, `created_at`, `updated_at`) VALUES
(1, 'Pin củ sạc dự phòng', '<p>Pin củ sạc dự ph&ograve;ng</p>', 1, NULL, '2020-12-16 07:46:57'),
(2, 'Sạc cáp', '<p>Sạc c&aacute;p</p>', 1, NULL, '2020-12-16 06:30:11'),
(3, 'Tai nghe', '<p>Tai nghe</p>', 1, NULL, '2020-12-16 06:30:37'),
(4, 'Loa', '<p>Loa</p>', 1, NULL, '2020-12-16 06:30:44'),
(5, 'Thẻ nhớ', '<p>Thẻ nhớ</p>', 1, NULL, '2020-12-16 06:32:11'),
(6, 'Chuột bàn phím', '<p>Chuột b&agrave;n ph&iacute;m</p>', 1, NULL, '2020-12-16 07:46:54'),
(7, 'Ốp lưng miếng dán', '<p>Ốp lưng miếng d&aacute;n</p>', 1, NULL, '2020-12-16 06:31:47'),
(10, 'Ba lô túi chống sốc', '<p>Ba l&ocirc; t&uacute;i chống sốc</p>', 1, '2020-12-10 06:55:40', '2020-12-16 07:46:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `orders_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` int(11) NOT NULL,
  `orders_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orders_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders_details`
--

CREATE TABLE `tbl_orders_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orders_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `cat_id`, `brand_id`, `product_name`, `product_desc`, `product_content`, `product_image`, `product_price`, `product_quantity`, `product_status`, `created_at`, `updated_at`) VALUES
(1, 10, 5, 'Balo laptop artic hunter', '<p>Balo laptop artic hunter</p>', '<p>Balo laptop artic hunter</p>', 'balo-laptop-15-inch-cong-usb-arctic-hunter21.jpg', '120000', 20, 1, '2020-12-16 07:36:38', '2020-12-16 07:36:38'),
(2, 2, 7, 'Cáp type C lightning', '<p>C&aacute;p type C lightning</p>', '<p>C&aacute;p type C lightning d&agrave;nh cho Iphone 12, 11, pro max</p>', 'cap-type-c-lightning15.jpg', '350000', 66, 1, '2020-12-16 07:38:39', '2020-12-16 07:38:39'),
(3, 6, 6, 'Chuột không dây anker', '<p>Chuột kh&ocirc;ng d&acirc;y anker đen</p>', '<p>Chuột kh&ocirc;ng d&acirc;y anker</p>', 'chuot-khong-day-rapoo-1620-den0.jpg', '45000', 2, 1, '2020-12-16 07:39:40', '2020-12-16 07:39:40'),
(4, 10, 2, 'Loa microlab đen', '<p>Loa microlab đen</p>', '<p>Loa microlab đen</p>', 'microlab-m318bt-den47.jpg', '1000000', 35, 1, '2020-12-16 07:40:11', '2020-12-16 07:40:11'),
(5, 7, 4, 'Miếng dán lưng iphone 12', '<p>Miếng d&aacute;n lưng iphone 12</p>', '<p>Miếng d&aacute;n lưng iphone 12</p>', 'mieng-dan-lung-iphone-1284.jpg', '67000', 100, 1, '2020-12-16 07:40:48', '2020-12-16 07:40:48'),
(6, 5, 3, 'Ổ cứng di động ssd 1TB', '<p>Ổ cứng di động ssd 1TB</p>', '<p>Ổ cứng di động ssd 1TB</p>', 'o-cung-ssd-1tb-wd-my-passportpg64.jpg', '7000000', 29, 1, '2020-12-16 07:41:39', '2020-12-16 07:41:39'),
(7, 1, 8, 'Pin dự phòng 3000 mAH', '<p>Pin dự ph&ograve;ng 3000 mAH</p>', '<p>Pin dự ph&ograve;ng 3000 mAH</p>', 'pin-sac-du-phong-7500mah71.jpg', '570000', 78, 1, '2020-12-16 07:42:30', '2020-12-16 07:42:30'),
(8, 10, 7, 'Pin dự phòng 7500 mAH', '<p>Pin dự ph&ograve;ng 7500 mAH</p>', '<p>Pin dự ph&ograve;ng 7500 mAH</p>', 'sac-du-phong-polymer-10000mah71.jpg', '560000', 89, 0, '2020-12-16 07:42:58', '2020-12-16 07:42:58'),
(9, 3, 1, 'Tai nghe bluetooth DEATHZONE', '<p>Tai nghe bluetooth DEATHZONE</p>', '<p>Tai nghe bluetooth DEATHZONE</p>', 'tai-nghe-bluetooth-true-wireless-mozard-ts13-den54.jpg', '629999', 15, 1, '2020-12-16 07:43:48', '2020-12-16 07:43:48'),
(10, 5, 6, 'Thẻ nhớ microsd 160GB', '<p>Thẻ nhớ microsd 160GB</p>', '<p>Thẻ nhớ microsd 160GB</p>', 'the-nho-microsd-128gb-class-10-uhs163.jpg', '7000000', 88, 1, '2020-12-16 07:44:23', '2020-12-16 07:44:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `username`, `email`, `password`, `phone`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin@gmail.com', '$2y$10$7K3RJnUGtkgZ.MPQWTAXkub9SaRs4gxYEF12PNQfynoM/3F4XLAfe', '0977036293', NULL, NULL, '2021-02-13 21:18:27', '2021-02-13 21:18:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`orders_id`);

--
-- Indexes for table `tbl_orders_details`
--
ALTER TABLE `tbl_orders_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `tbl_users_username_unique` (`username`),
  ADD UNIQUE KEY `tbl_users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `orders_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_orders_details`
--
ALTER TABLE `tbl_orders_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
