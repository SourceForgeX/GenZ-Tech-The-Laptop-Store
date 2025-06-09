-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2024 at 11:43 AM
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
-- Database: `db_laptop`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogins`
--

CREATE TABLE `adminlogins` (
  `Loginid` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adminlogins`
--

INSERT INTO `adminlogins` (`Loginid`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', '2024-11-02 09:49:51', '2024-11-02 09:49:51');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bookingid` bigint(20) UNSIGNED NOT NULL,
  `laptopid` bigint(20) UNSIGNED DEFAULT NULL,
  `customerid` bigint(20) UNSIGNED DEFAULT NULL,
  `bookingdate` date NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `totalamount` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bookingid`, `laptopid`, `customerid`, `bookingdate`, `quantity`, `totalamount`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '2024-11-16', '1', '102990', 'Requested', '2024-11-16 01:42:00', '2024-11-16 01:42:00'),
(2, 4, 1, '2024-11-16', '1', '102990', 'Requested', '2024-11-16 02:48:01', '2024-11-16 02:48:01'),
(3, 4, 1, '2024-11-16', '1', '102990', 'Requested', '2024-11-16 03:15:59', '2024-11-16 03:15:59'),
(4, 5, 1, '2024-11-16', '2', '419800', 'Requested', '2024-11-16 03:18:37', '2024-11-16 03:18:37'),
(5, 5, 1, '2024-11-16', '1', '209900', 'Delivered', '2024-11-16 03:21:04', '2024-12-09 05:09:48'),
(6, 4, 1, '2024-11-16', '1', '102990', 'Paid', '2024-11-16 03:22:34', '2024-11-16 03:22:50'),
(7, 5, 1, '2024-11-16', '1', '209900', 'Delivered', '2024-11-16 03:25:42', '2024-11-17 23:03:24'),
(8, 5, 1, '2024-11-16', '3', '629700', 'Paid', '2024-11-16 04:31:26', '2024-11-16 04:32:13'),
(9, 6, 2, '2024-12-09', '2', '115980', 'Paid', '2024-12-09 04:33:32', '2024-12-09 04:34:15');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brandid` bigint(20) UNSIGNED NOT NULL,
  `brandname` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brandid`, `brandname`, `logo`, `created_at`, `updated_at`) VALUES
(2, 'Asus', 'download (12).jfif', '2024-10-21 01:56:23', '2024-11-01 04:20:59'),
(3, 'Lenovo', 'images.png', '2024-10-21 01:57:22', '2024-12-09 04:25:36'),
(4, 'Apple', 'download (10).jfif', '2024-10-21 01:57:46', '2024-10-21 01:57:46'),
(5, 'HP', 'hp.png', '2024-12-09 04:23:57', '2024-12-09 04:23:57'),
(6, 'MSI', 'MSI.png', '2024-12-09 05:00:57', '2024-12-09 05:00:57');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerid` bigint(20) UNSIGNED NOT NULL,
  `customername` varchar(255) NOT NULL,
  `landmark` varchar(255) NOT NULL,
  `locationid` bigint(20) UNSIGNED DEFAULT NULL,
  `pincode` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `regdate` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerid`, `customername`, `landmark`, `locationid`, `pincode`, `phone`, `email`, `regdate`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Nandhu', 'church', 1, '6890979', '2324354657', 'Nandhu@gmail.com', '2024-11-02', 'Nandhu', 'Nandhu', '2024-11-02 03:25:57', '2024-11-02 03:25:57'),
(2, 'Alvin', 'Santhigiri', 3, '233345', '9324354657', 'alwin@gmail.com', '2024-11-13', 'alvin', 'alvin', '2024-11-12 23:30:58', '2024-11-12 23:30:58');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `districtid` bigint(20) UNSIGNED NOT NULL,
  `districtname` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`districtid`, `districtname`, `created_at`, `updated_at`) VALUES
(1, 'Ernakulam', '2024-10-19 06:51:01', '2024-10-19 06:51:01'),
(2, 'Idukki', '2024-10-19 06:51:19', '2024-10-19 06:51:19'),
(3, 'Kottayam', '2024-10-19 06:51:42', '2024-10-19 06:51:42');

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
-- Table structure for table `lapmodels`
--

CREATE TABLE `lapmodels` (
  `modelid` bigint(20) UNSIGNED NOT NULL,
  `modelname` varchar(255) NOT NULL,
  `brandid` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lapmodels`
--

INSERT INTO `lapmodels` (`modelid`, `modelname`, `brandid`, `created_at`, `updated_at`) VALUES
(1, 'ASUS ZenBook Series', 2, '2024-11-10 22:54:06', '2024-11-10 22:54:06'),
(2, 'ASUS VivoBook Series', 2, '2024-11-10 22:54:24', '2024-11-10 22:54:24'),
(3, 'ASUS ROG (Republic of Gamers) Series', 2, '2024-11-10 22:54:39', '2024-11-10 22:54:39'),
(4, 'ASUS TUF Gaming Series', 2, '2024-11-10 22:55:01', '2024-11-10 23:41:48'),
(5, 'Lenovo ThinkPad Series', 3, '2024-11-10 22:55:45', '2024-11-10 22:55:45'),
(6, 'Lenovo Legion Series', 3, '2024-11-10 22:56:00', '2024-11-10 22:56:00'),
(7, 'Lenovo Chromebook Series', 3, '2024-11-10 22:56:16', '2024-11-10 22:56:16'),
(8, 'Lenovo Yoga Series', 3, '2024-11-10 22:56:32', '2024-11-10 22:56:32'),
(9, 'MacBook Air', 4, '2024-11-10 22:57:07', '2024-11-10 22:57:07'),
(10, 'MacBook Pro', 4, '2024-11-10 22:57:19', '2024-11-10 22:57:19'),
(13, 'Omen', 5, '2024-12-09 04:24:19', '2024-12-09 04:24:19'),
(14, 'MSI Creator Z 16', 6, '2024-12-09 05:01:16', '2024-12-09 05:01:16');

-- --------------------------------------------------------

--
-- Table structure for table `laptops`
--

CREATE TABLE `laptops` (
  `laptopid` bigint(20) UNSIGNED NOT NULL,
  `laptopname` varchar(255) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `screensize` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `harddisk` varchar(255) NOT NULL,
  `processor` varchar(255) NOT NULL,
  `cpumodel` varchar(255) NOT NULL,
  `ram` varchar(255) NOT NULL,
  `os` varchar(255) NOT NULL,
  `graphics` varchar(255) NOT NULL,
  `stock` varchar(255) NOT NULL,
  `warranty` varchar(255) NOT NULL,
  `features` varchar(255) NOT NULL,
  `modelid` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laptops`
--

INSERT INTO `laptops` (`laptopid`, `laptopname`, `image1`, `image2`, `price`, `screensize`, `color`, `harddisk`, `processor`, `cpumodel`, `ram`, `os`, `graphics`, `stock`, `warranty`, `features`, `modelid`, `created_at`, `updated_at`) VALUES
(1, 'ASUS Vivobook Go 15 (2023)', 'download (12).jfif', '61SJHAQfHwL._SL1500_.jpg', '30,000', '15.6 Inches', 'Black', '512 GB', 'AMD Ryzen 5 7520U Mobile Processor', 'Ryzen 5', '16GB RAM | 512GB SSD,FHD', 'Windows 11 Home', 'Integrated', '10', '2', 'AMD Ryzen 5 7520U, 15.6\" (39.62 cm) FHD, Thin & Light Laptop (16GB/512GB SSD/Windows 11/Office 2021/Alexa Built-in/Mixed Black/1.63 kg), E1504FA-NJ542WS', 2, '2024-11-11 01:08:54', '2024-11-11 01:08:54'),
(3, 'ThinkBook 16 40.64cms - 13th Gen Intel i5', 'download (2).jfif', 'download (6).jfif', '12447', '14 Inches', 'Black', '256 GB', '‎2.2 GHz', 'Intel Core i5', '8 GB', 'Windows', 'Integrated', '6', '1', '(Refurbished) Lenovo ThinkPad 5th Gen Intel Core i5 Thin & Light HD Laptop (8 GB RAM/256 GB SSD/14\" (35.6 cm) HD/Windows 10 Pro/MS Office/WiFi/Webcam/Intel Graphics), Black', 5, '2024-11-11 01:25:31', '2024-11-11 01:25:31'),
(4, 'ASUS Zenbook 14', '61SJHAQfHwL._SL1500_.jpg', '71FE4cemJ9L._SX679_.jpg', '102990', '14 Inches', 'Blue', '512 GB', 'Intel Core', 'Intel Core Ultra 5', '16 GB', 'Windows 11 Home', 'Integrated', '17', '1', 'ASUS Zenbook 14, Intel Core Ultra 5, 14\" 3K OLED 16:10 120 Hz, Thin & Light Laptop, Built-in AI (16GB RAM/1 TB//Win 11/Office 2021/Backlit/Touchscreen/75WHr /Ponder Blue/1.28 Kg), UX3405MA-PZ552WS', 1, '2024-11-11 01:33:04', '2024-12-09 04:26:43'),
(5, 'Apple 2024 MacBook Pro', 'apple-laptop-1000x1000.jpg', '61v405rSEeL._SX679_.jpg', '209900', '14 Inches', 'Space Black', 'SSD', '10‑core GPU', 'Apple M4', '24 GB', 'Mac OS', 'Integrated', '7', '1', 'Apple 2024 MacBook Pro Laptop with M4 chip with 10‑core CPU and 10‑core GPU: Built for Apple Intelligence, (14.2″) Liquid Retina XDR Display, 14GB Unified Memory, 1TB SSD Storage; Space Black', 10, '2024-11-11 01:38:20', '2024-11-11 01:38:20'),
(6, 'ASUS Vivobook 16 (2023)', '71FE4cemJ9L._SX679_ (1).jpg', 'download (22).jfif', '57990', '16 Inches', 'Blue', '512 GB', 'Intel Core i5-13500H Processor 2.6 GHz', 'Core i5', '8GB RAM', 'Windows 11 Home', 'Integrated', '8', '1', 'Backlit Keyboard', 2, '2024-11-11 22:36:40', '2024-11-11 22:36:40'),
(7, 'MSI Creator Z 16', 'MSI Creator Z 16.jpeg', 'MSI Cyborg 15.jpeg', '400000', '16 inch', 'Black', '1 TB', 'Razen 7', 'Razen', '8 GB', 'Windows 11', 'Yes', '4', '5 years', 'Yes', 14, '2024-12-09 05:04:36', '2024-12-09 05:04:36');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `locationid` bigint(20) UNSIGNED NOT NULL,
  `locationname` varchar(255) NOT NULL,
  `districtid` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`locationid`, `locationname`, `districtid`, `created_at`, `updated_at`) VALUES
(1, 'Muvattupuzha', 1, '2024-10-19 04:05:34', '2024-11-01 04:54:50'),
(2, 'Vazhakkulam', 1, '2024-10-19 04:05:59', '2024-10-19 04:05:59'),
(3, 'Payavu', 2, '2024-10-19 04:06:25', '2024-10-19 04:06:25'),
(4, 'Munnar', 2, '2024-10-19 04:06:37', '2024-10-19 04:06:37'),
(6, 'Pala', 3, '2024-10-19 04:06:55', '2024-10-19 04:06:55'),
(7, 'Ezhacherry', 3, '2024-10-19 04:07:07', '2024-10-19 04:07:07'),
(9, 'Munnar', 2, '2024-10-31 23:09:17', '2024-10-31 23:09:17'),
(10, 'Vaikom', 3, '2024-10-31 23:09:48', '2024-10-31 23:09:48'),
(11, 'Ramallor', 1, '2024-11-01 04:55:15', '2024-11-01 04:55:15'),
(12, 'RAMAPURAM KERALA', 3, '2024-12-09 04:23:06', '2024-12-09 04:23:06');

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
(5, '2024_10_19_063722_create_districts_table', 1),
(6, '2024_10_19_093222_create_locations_table', 2),
(7, '2024_10_19_100130_create_brands_table', 3),
(9, '2024_11_01_045930_create_laptops_table', 5),
(10, '2024_11_02_064732_create_customers_table', 6),
(11, '2024_11_02_093514_create_adminlogins_table', 7),
(12, '2024_11_07_042643_add_brandid_to_lapmodels', 8),
(14, '2024_11_07_044257_create_lapmodels_table', 9),
(15, '2024_11_11_052433_create_laptops_table', 10),
(16, '2024_11_16_064958_create_bookings_table', 11),
(17, '2024_11_16_080414_create_payments_table', 12);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `paymentid` bigint(20) UNSIGNED NOT NULL,
  `bookingid` bigint(20) UNSIGNED DEFAULT NULL,
  `paymentdate` date NOT NULL,
  `pstatus` varchar(255) NOT NULL,
  `housename` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`paymentid`, `bookingid`, `paymentdate`, `pstatus`, `housename`, `created_at`, `updated_at`) VALUES
(1, 5, '2024-11-16', 'Delivered', 'Thalayattu', '2024-11-16 03:21:27', '2024-11-17 23:07:35'),
(2, 5, '2024-11-16', 'Paid', 'Thalayattu', '2024-11-16 03:22:05', '2024-11-16 03:22:05'),
(3, 6, '2024-11-16', 'Paid', 'Thalayattu', '2024-11-16 03:22:50', '2024-11-16 03:22:50'),
(4, 7, '2024-11-16', 'Delivered', 'Aswathinivas', '2024-11-16 03:26:17', '2024-11-17 23:07:25'),
(5, 8, '2024-11-16', 'Delivered', 'thachirickal', '2024-11-16 04:32:13', '2024-11-17 23:02:57'),
(6, 9, '2024-12-09', 'Paid', 'KUNNUTHOTTIYIL HOUSE', '2024-12-09 04:34:14', '2024-12-09 04:34:14');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogins`
--
ALTER TABLE `adminlogins`
  ADD PRIMARY KEY (`Loginid`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bookingid`),
  ADD KEY `bookings_laptopid_index` (`laptopid`),
  ADD KEY `bookings_customerid_index` (`customerid`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brandid`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerid`),
  ADD KEY `customers_locationid_index` (`locationid`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`districtid`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `lapmodels`
--
ALTER TABLE `lapmodels`
  ADD PRIMARY KEY (`modelid`),
  ADD KEY `lapmodels_brandid_index` (`brandid`);

--
-- Indexes for table `laptops`
--
ALTER TABLE `laptops`
  ADD PRIMARY KEY (`laptopid`),
  ADD KEY `laptops_modelid_index` (`modelid`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`locationid`),
  ADD KEY `locations_districtid_index` (`districtid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`paymentid`),
  ADD KEY `payments_bookingid_index` (`bookingid`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `adminlogins`
--
ALTER TABLE `adminlogins`
  MODIFY `Loginid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bookingid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brandid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `districtid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lapmodels`
--
ALTER TABLE `lapmodels`
  MODIFY `modelid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `laptops`
--
ALTER TABLE `laptops`
  MODIFY `laptopid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `locationid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `paymentid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_customerid_foreign` FOREIGN KEY (`customerid`) REFERENCES `customers` (`customerid`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_laptopid_foreign` FOREIGN KEY (`laptopid`) REFERENCES `laptops` (`laptopid`) ON DELETE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_locationid_foreign` FOREIGN KEY (`locationid`) REFERENCES `locations` (`locationid`) ON DELETE CASCADE;

--
-- Constraints for table `lapmodels`
--
ALTER TABLE `lapmodels`
  ADD CONSTRAINT `lapmodels_brandid_foreign` FOREIGN KEY (`brandid`) REFERENCES `brands` (`brandid`) ON DELETE CASCADE;

--
-- Constraints for table `laptops`
--
ALTER TABLE `laptops`
  ADD CONSTRAINT `laptops_modelid_foreign` FOREIGN KEY (`modelid`) REFERENCES `lapmodels` (`modelid`) ON DELETE CASCADE;

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_districtid_foreign` FOREIGN KEY (`districtid`) REFERENCES `districts` (`districtid`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_bookingid_foreign` FOREIGN KEY (`bookingid`) REFERENCES `bookings` (`bookingid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
