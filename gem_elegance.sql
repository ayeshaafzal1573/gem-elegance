-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2024 at 05:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gem_elegance`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `show` enum('Yes','No') NOT NULL DEFAULT 'No',
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `image`, `gender`, `show`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Men Watch', 'men-watches', 'public/uploads/category/1.png', 'Male', 'Yes', 1, '2023-11-26 06:41:46', '2023-11-26 06:48:52'),
(2, 'Men Necklace', 'men-necklace', 'public/uploads/category/2.png', 'Male', 'Yes', 1, '2023-11-26 06:47:38', '2023-11-26 06:48:24'),
(3, 'Men Rings', 'men-rings', 'public/uploads/category/3.png', 'Male', 'Yes', 1, '2023-11-26 06:49:17', '2023-11-26 06:49:17'),
(4, 'Women Rings', 'women-rings', 'public/uploads/category/4.png', 'Female', 'Yes', 1, '2023-11-26 06:50:05', '2023-11-26 06:50:37'),
(5, 'Women Earrings', 'women-earrings', 'public/uploads/category/5.png', 'Female', 'Yes', 1, '2023-11-26 06:51:30', '2023-11-26 06:51:51'),
(6, 'Women Necklace', 'women-necklace', 'public/uploads/category/6.png', 'Female', 'Yes', 1, '2023-11-26 06:54:23', '2024-01-30 06:52:57');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'United States', 'US', NULL, NULL),
(2, 'Canada', 'CA', NULL, NULL),
(3, 'Afghanistan', 'AF', NULL, NULL),
(4, 'Albania', 'AL', NULL, NULL),
(5, 'Algeria', 'DZ', NULL, NULL),
(6, 'American Samoa', 'AS', NULL, NULL),
(7, 'Andorra', 'AD', NULL, NULL),
(8, 'Angola', 'AO', NULL, NULL),
(9, 'Anguilla', 'AI', NULL, NULL),
(10, 'Antarctica', 'AQ', NULL, NULL),
(11, 'Antigua and/or Barbuda', 'AG', NULL, NULL),
(12, 'Argentina', 'AR', NULL, NULL),
(13, 'Armenia', 'AM', NULL, NULL),
(14, 'Aruba', 'AW', NULL, NULL),
(15, 'Australia', 'AU', NULL, NULL),
(16, 'Austria', 'AT', NULL, NULL),
(17, 'Azerbaijan', 'AZ', NULL, NULL),
(18, 'Bahamas', 'BS', NULL, NULL),
(19, 'Bahrain', 'BH', NULL, NULL),
(20, 'Bangladesh', 'BD', NULL, NULL),
(21, 'Barbados', 'BB', NULL, NULL),
(22, 'Belarus', 'BY', NULL, NULL),
(23, 'Belgium', 'BE', NULL, NULL),
(24, 'Belize', 'BZ', NULL, NULL),
(25, 'Benin', 'BJ', NULL, NULL),
(26, 'Bermuda', 'BM', NULL, NULL),
(27, 'Bhutan', 'BT', NULL, NULL),
(28, 'Bolivia', 'BO', NULL, NULL),
(29, 'Bosnia and Herzegovina', 'BA', NULL, NULL),
(30, 'Botswana', 'BW', NULL, NULL),
(31, 'Bouvet Island', 'BV', NULL, NULL),
(32, 'Brazil', 'BR', NULL, NULL),
(33, 'British lndian Ocean Territory', 'IO', NULL, NULL),
(34, 'Brunei Darussalam', 'BN', NULL, NULL),
(35, 'Bulgaria', 'BG', NULL, NULL),
(36, 'Burkina Faso', 'BF', NULL, NULL),
(37, 'Burundi', 'BI', NULL, NULL),
(38, 'Cambodia', 'KH', NULL, NULL),
(39, 'Cameroon', 'CM', NULL, NULL),
(40, 'Cape Verde', 'CV', NULL, NULL),
(41, 'Cayman Islands', 'KY', NULL, NULL),
(42, 'Central African Republic', 'CF', NULL, NULL),
(43, 'Chad', 'TD', NULL, NULL),
(44, 'Chile', 'CL', NULL, NULL),
(45, 'China', 'CN', NULL, NULL),
(46, 'Christmas Island', 'CX', NULL, NULL),
(47, 'Cocos (Keeling) Islands', 'CC', NULL, NULL),
(48, 'Colombia', 'CO', NULL, NULL),
(49, 'Comoros', 'KM', NULL, NULL),
(50, 'Congo', 'CG', NULL, NULL),
(51, 'Cook Islands', 'CK', NULL, NULL),
(52, 'Costa Rica', 'CR', NULL, NULL),
(53, 'Croatia (Hrvatska)', 'HR', NULL, NULL),
(54, 'Cuba', 'CU', NULL, NULL),
(55, 'Cyprus', 'CY', NULL, NULL),
(56, 'Czech Republic', 'CZ', NULL, NULL),
(57, 'Democratic Republic of Congo', 'CD', NULL, NULL),
(58, 'Denmark', 'DK', NULL, NULL),
(59, 'Djibouti', 'DJ', NULL, NULL),
(60, 'Dominica', 'DM', NULL, NULL),
(61, 'Dominican Republic', 'DO', NULL, NULL),
(62, 'East Timor', 'TP', NULL, NULL),
(63, 'Ecudaor', 'EC', NULL, NULL),
(64, 'Egypt', 'EG', NULL, NULL),
(65, 'El Salvador', 'SV', NULL, NULL),
(66, 'Equatorial Guinea', 'GQ', NULL, NULL),
(67, 'Eritrea', 'ER', NULL, NULL),
(68, 'Estonia', 'EE', NULL, NULL),
(69, 'Ethiopia', 'ET', NULL, NULL),
(70, 'Falkland Islands (Malvinas)', 'FK', NULL, NULL),
(71, 'Faroe Islands', 'FO', NULL, NULL),
(72, 'Fiji', 'FJ', NULL, NULL),
(73, 'Finland', 'FI', NULL, NULL),
(74, 'France', 'FR', NULL, NULL),
(75, 'France, Metropolitan', 'FX', NULL, NULL),
(76, 'French Guiana', 'GF', NULL, NULL),
(77, 'French Polynesia', 'PF', NULL, NULL),
(78, 'French Southern Territories', 'TF', NULL, NULL),
(79, 'Gabon', 'GA', NULL, NULL),
(80, 'Gambia', 'GM', NULL, NULL),
(81, 'Georgia', 'GE', NULL, NULL),
(82, 'Germany', 'DE', NULL, NULL),
(83, 'Ghana', 'GH', NULL, NULL),
(84, 'Gibraltar', 'GI', NULL, NULL),
(85, 'Greece', 'GR', NULL, NULL),
(86, 'Greenland', 'GL', NULL, NULL),
(87, 'Grenada', 'GD', NULL, NULL),
(88, 'Guadeloupe', 'GP', NULL, NULL),
(89, 'Guam', 'GU', NULL, NULL),
(90, 'Guatemala', 'GT', NULL, NULL),
(91, 'Guinea', 'GN', NULL, NULL),
(92, 'Guinea-Bissau', 'GW', NULL, NULL),
(93, 'Guyana', 'GY', NULL, NULL),
(94, 'Haiti', 'HT', NULL, NULL),
(95, 'Heard and Mc Donald Islands', 'HM', NULL, NULL),
(96, 'Honduras', 'HN', NULL, NULL),
(97, 'Hong Kong', 'HK', NULL, NULL),
(98, 'Hungary', 'HU', NULL, NULL),
(99, 'Iceland', 'IS', NULL, NULL),
(100, 'India', 'IN', NULL, NULL),
(101, 'Indonesia', 'ID', NULL, NULL),
(102, 'Iran (Islamic Republic of)', 'IR', NULL, NULL),
(103, 'Iraq', 'IQ', NULL, NULL),
(104, 'Ireland', 'IE', NULL, NULL),
(105, 'Israel', 'IL', NULL, NULL),
(106, 'Italy', 'IT', NULL, NULL),
(107, 'Ivory Coast', 'CI', NULL, NULL),
(108, 'Jamaica', 'JM', NULL, NULL),
(109, 'Japan', 'JP', NULL, NULL),
(110, 'Jordan', 'JO', NULL, NULL),
(111, 'Kazakhstan', 'KZ', NULL, NULL),
(112, 'Kenya', 'KE', NULL, NULL),
(113, 'Kiribati', 'KI', NULL, NULL),
(114, 'Korea, Democratic People\'s Republic of', 'KP', NULL, NULL),
(115, 'Korea, Republic of', 'KR', NULL, NULL),
(116, 'Kuwait', 'KW', NULL, NULL),
(117, 'Kyrgyzstan', 'KG', NULL, NULL),
(118, 'Lao People\'s Democratic Republic', 'LA', NULL, NULL),
(119, 'Latvia', 'LV', NULL, NULL),
(120, 'Lebanon', 'LB', NULL, NULL),
(121, 'Lesotho', 'LS', NULL, NULL),
(122, 'Liberia', 'LR', NULL, NULL),
(123, 'Libyan Arab Jamahiriya', 'LY', NULL, NULL),
(124, 'Liechtenstein', 'LI', NULL, NULL),
(125, 'Lithuania', 'LT', NULL, NULL),
(126, 'Luxembourg', 'LU', NULL, NULL),
(127, 'Macau', 'MO', NULL, NULL),
(128, 'Macedonia', 'MK', NULL, NULL),
(129, 'Madagascar', 'MG', NULL, NULL),
(130, 'Malawi', 'MW', NULL, NULL),
(131, 'Malaysia', 'MY', NULL, NULL),
(132, 'Maldives', 'MV', NULL, NULL),
(133, 'Mali', 'ML', NULL, NULL),
(134, 'Malta', 'MT', NULL, NULL),
(135, 'Marshall Islands', 'MH', NULL, NULL),
(136, 'Martinique', 'MQ', NULL, NULL),
(137, 'Mauritania', 'MR', NULL, NULL),
(138, 'Mauritius', 'MU', NULL, NULL),
(139, 'Mayotte', 'TY', NULL, NULL),
(140, 'Mexico', 'MX', NULL, NULL),
(141, 'Micronesia, Federated States of', 'FM', NULL, NULL),
(142, 'Moldova, Republic of', 'MD', NULL, NULL),
(143, 'Monaco', 'MC', NULL, NULL),
(144, 'Mongolia', 'MN', NULL, NULL),
(145, 'Montserrat', 'MS', NULL, NULL),
(146, 'Morocco', 'MA', NULL, NULL),
(147, 'Mozambique', 'MZ', NULL, NULL),
(148, 'Myanmar', 'MM', NULL, NULL),
(149, 'Namibia', 'NA', NULL, NULL),
(150, 'Nauru', 'NR', NULL, NULL),
(151, 'Nepal', 'NP', NULL, NULL),
(152, 'Netherlands', 'NL', NULL, NULL),
(153, 'Netherlands Antilles', 'AN', NULL, NULL),
(154, 'New Caledonia', 'NC', NULL, NULL),
(155, 'New Zealand', 'NZ', NULL, NULL),
(156, 'Nicaragua', 'NI', NULL, NULL),
(157, 'Niger', 'NE', NULL, NULL),
(158, 'Nigeria', 'NG', NULL, NULL),
(159, 'Niue', 'NU', NULL, NULL),
(160, 'Norfork Island', 'NF', NULL, NULL),
(161, 'Northern Mariana Islands', 'MP', NULL, NULL),
(162, 'Norway', 'NO', NULL, NULL),
(163, 'Oman', 'OM', NULL, NULL),
(164, 'Pakistan', 'PK', NULL, NULL),
(165, 'Palau', 'PW', NULL, NULL),
(166, 'Panama', 'PA', NULL, NULL),
(167, 'Papua New Guinea', 'PG', NULL, NULL),
(168, 'Paraguay', 'PY', NULL, NULL),
(169, 'Peru', 'PE', NULL, NULL),
(170, 'Philippines', 'PH', NULL, NULL),
(171, 'Pitcairn', 'PN', NULL, NULL),
(172, 'Poland', 'PL', NULL, NULL),
(173, 'Portugal', 'PT', NULL, NULL),
(174, 'Puerto Rico', 'PR', NULL, NULL),
(175, 'Qatar', 'QA', NULL, NULL),
(176, 'Republic of South Sudan', 'SS', NULL, NULL),
(177, 'Reunion', 'RE', NULL, NULL),
(178, 'Romania', 'RO', NULL, NULL),
(179, 'Russian Federation', 'RU', NULL, NULL),
(180, 'Rwanda', 'RW', NULL, NULL),
(181, 'Saint Kitts and Nevis', 'KN', NULL, NULL),
(182, 'Saint Lucia', 'LC', NULL, NULL),
(183, 'Saint Vincent and the Grenadines', 'VC', NULL, NULL),
(184, 'Samoa', 'WS', NULL, NULL),
(185, 'San Marino', 'SM', NULL, NULL),
(186, 'Sao Tome and Principe', 'ST', NULL, NULL),
(187, 'Saudi Arabia', 'SA', NULL, NULL),
(188, 'Senegal', 'SN', NULL, NULL),
(189, 'Serbia', 'RS', NULL, NULL),
(190, 'Seychelles', 'SC', NULL, NULL),
(191, 'Sierra Leone', 'SL', NULL, NULL),
(192, 'Singapore', 'SG', NULL, NULL),
(193, 'Slovakia', 'SK', NULL, NULL),
(194, 'Slovenia', 'SI', NULL, NULL),
(195, 'Solomon Islands', 'SB', NULL, NULL),
(196, 'Somalia', 'SO', NULL, NULL),
(197, 'South Africa', 'ZA', NULL, NULL),
(198, 'South Georgia South Sandwich Islands', 'GS', NULL, NULL),
(199, 'Spain', 'ES', NULL, NULL),
(200, 'Sri Lanka', 'LK', NULL, NULL),
(201, 'St. Helena', 'SH', NULL, NULL),
(202, 'St. Pierre and Miquelon', 'PM', NULL, NULL),
(203, 'Sudan', 'SD', NULL, NULL),
(204, 'Suriname', 'SR', NULL, NULL),
(205, 'Svalbarn and Jan Mayen Islands', 'SJ', NULL, NULL),
(206, 'Swaziland', 'SZ', NULL, NULL),
(207, 'Sweden', 'SE', NULL, NULL),
(208, 'Switzerland', 'CH', NULL, NULL),
(209, 'Syrian Arab Republic', 'SY', NULL, NULL),
(210, 'Taiwan', 'TW', NULL, NULL),
(211, 'Tajikistan', 'TJ', NULL, NULL),
(212, 'Tanzania, United Republic of', 'TZ', NULL, NULL),
(213, 'Thailand', 'TH', NULL, NULL),
(214, 'Togo', 'TG', NULL, NULL),
(215, 'Tokelau', 'TK', NULL, NULL),
(216, 'Tonga', 'TO', NULL, NULL),
(217, 'Trinidad and Tobago', 'TT', NULL, NULL),
(218, 'Tunisia', 'TN', NULL, NULL),
(219, 'Turkey', 'TR', NULL, NULL),
(220, 'Turkmenistan', 'TM', NULL, NULL),
(221, 'Turks and Caicos Islands', 'TC', NULL, NULL),
(222, 'Tuvalu', 'TV', NULL, NULL),
(223, 'Uganda', 'UG', NULL, NULL),
(224, 'Ukraine', 'UA', NULL, NULL),
(225, 'United Arab Emirates', 'AE', NULL, NULL),
(226, 'United Kingdom', 'GB', NULL, NULL),
(227, 'United States minor outlying islands', 'UM', NULL, NULL),
(228, 'Uruguay', 'UY', NULL, NULL),
(229, 'Uzbekistan', 'UZ', NULL, NULL),
(230, 'Vanuatu', 'VU', NULL, NULL),
(231, 'Vatican City State', 'VA', NULL, NULL),
(232, 'Venezuela', 'VE', NULL, NULL),
(233, 'Vietnam', 'VN', NULL, NULL),
(234, 'Virgin Islands (British)', 'VG', NULL, NULL),
(235, 'Virgin Islands (U.S.)', 'VI', NULL, NULL),
(236, 'Wallis and Futuna Islands', 'WF', NULL, NULL),
(237, 'Western Sahara', 'EH', NULL, NULL),
(238, 'Yemen', 'YE', NULL, NULL),
(239, 'Yugoslavia', 'YU', NULL, NULL),
(240, 'Zaire', 'ZR', NULL, NULL),
(241, 'Zambia', 'ZM', NULL, NULL),
(242, 'Zimbabwe', 'ZW', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_addresses`
--

CREATE TABLE `customer_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `address` text NOT NULL,
  `apartment` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_addresses`
--

INSERT INTO `customer_addresses` (`id`, `user_id`, `first_name`, `last_name`, `email`, `mobile`, `country_id`, `address`, `apartment`, `city`, `state`, `zip`, `notes`, `created_at`, `updated_at`) VALUES
(2, 5, 'aisha', 'afzal', 'aisha@gmail.com', '819`', 164, 'hey', 'hy', 'hy', 'hy', 'hy', NULL, '2023-12-13 12:14:15', '2024-02-17 11:03:07'),
(3, 6, 'Aisha', 'Afzal', 'ayeshaafzal1573@gmail.com', '03472284368', 3, 'C-178 Flat No 2 Behind Shamsi Hospital', 'Flat-2', 'Karachi', 'Sindh', '78219', NULL, '2024-02-17 06:54:02', '2024-02-18 08:14:02');

-- --------------------------------------------------------

--
-- Table structure for table `discount_coupans`
--

CREATE TABLE `discount_coupans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `max_uses` int(11) DEFAULT NULL,
  `max_uses_user` int(11) DEFAULT NULL,
  `type` enum('percent','fixed') NOT NULL DEFAULT 'fixed',
  `discount_amount` double(10,2) NOT NULL,
  `min_amount` double(10,2) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `starts_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount_coupans`
--

INSERT INTO `discount_coupans` (`id`, `code`, `name`, `description`, `max_uses`, `max_uses_user`, `type`, `discount_amount`, `min_amount`, `status`, `starts_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(2, 'PK1947', 'SAVE15', 'This Coupan is valid for only 2 days', 1, 10, 'percent', 15.00, 100.00, 1, '2023-12-18 13:57:55', '2024-03-01 13:58:00', '2023-12-19 08:58:05', '2024-01-27 14:45:33'),
(4, 'BACHAT', 'BACHAT', 'Bachat Coupan', 2, 400, 'fixed', 200.00, 1000.00, 1, '2023-12-17 15:48:08', '2024-01-31 15:48:15', '2023-12-19 10:51:14', '2024-01-27 14:30:20'),
(5, 'Flat50', '50 % OFF', 'Flat 50% off on all products', 19, 300, 'fixed', 200.00, 1200.00, 1, '2024-01-26 19:51:03', '2024-07-10 19:51:17', '2024-01-27 14:51:22', '2024-02-17 07:08:21'),
(8, 'TOGETHER20', 'TOGETHER20', 'this is code', 2000, 2000, 'percent', 500.00, 600.00, 1, '2024-02-18 14:39:46', '2024-02-29 14:39:54', '2024-02-18 09:39:58', '2024-02-18 09:39:58');

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
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 'uploads/home-banner.png', '2024-02-18 14:35:45', '2024-02-18 14:35:45'),
(2, 'uploads/home-banner-2.png', '2024-02-18 14:43:15', '2024-02-19 09:30:56'),
(3, 'uploads/last-banner.png', '2024-02-18 14:47:35', '2024-02-18 14:47:35'),
(4, 'uploads/logo.png', '2024-02-18 14:47:57', '2024-02-18 14:47:57'),
(5, 'uploads/new-arrival-banner.png', '2024-02-19 10:32:19', '2024-02-19 10:32:19'),
(6, 'uploads/man-banner.png', '2024-02-19 10:38:58', '2024-02-19 10:38:58'),
(7, 'uploads/WOMEN-BANNER.png', '2024-02-19 10:39:48', '2024-02-19 10:39:48'),
(8, 'uploads/thanks.png', '2024-02-19 10:53:31', '2024-02-19 10:53:31'),
(9, 'uploads/about-banner.png', '2024-02-19 11:02:56', '2024-02-19 11:02:56'),
(10, 'uploads/aboutbanner2 (1).png', '2024-02-19 11:03:10', '2024-02-19 11:03:10'),
(11, 'uploads/Rectangle 44.png', '2024-02-19 11:03:24', '2024-02-19 11:03:24');

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
(5, '2023_11_18_172024_create_category_table', 1),
(6, '2023_11_20_064205_create_products_table', 2),
(7, '2023_11_20_064325_create_product_images_table', 2),
(8, '2023_11_29_161950_alter_users_table', 3),
(9, '2023_12_05_123424_create_countries_table', 4),
(10, '2023_12_06_135511_create_orders_table', 5),
(11, '2023_12_06_135645_create_order_items_table', 5),
(12, '2023_12_06_135734_create_customer_addresses_table', 5),
(13, '2023_12_10_082734_create_shipping_charges_table', 6),
(14, '2023_12_11_131828_create_discount_coupans_table', 7),
(15, '2023_12_12_145125_create_discount_coupan_table', 8),
(16, '2023_12_19_102901_create_discount_coupans_table', 9),
(17, '2024_01_27_211407_alter_orders_table', 10),
(18, '2024_01_28_193732_alter_orders_table', 11),
(22, '2024_02_18_185342_create_home_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subtotal` double(10,2) NOT NULL,
  `shipping` double(10,2) NOT NULL,
  `coupan_code` varchar(400) DEFAULT NULL,
  `discount` double(10,2) DEFAULT NULL,
  `grand_total` double(10,2) NOT NULL,
  `payment_status` enum('Paid','Not Paid') NOT NULL DEFAULT 'Not Paid',
  `status` enum('Pending','Shipped','Delivered','Cancelled') NOT NULL DEFAULT 'Pending',
  `shipped_date` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `address` text NOT NULL,
  `apartment` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `subtotal`, `shipping`, `coupan_code`, `discount`, `grand_total`, `payment_status`, `status`, `shipped_date`, `first_name`, `last_name`, `email`, `mobile`, `country_id`, `address`, `apartment`, `city`, `state`, `zip`, `notes`, `created_at`, `updated_at`) VALUES
(14, 5, 10000.00, 100.00, 'PK1947', 15.00, 10085.00, 'Not Paid', 'Delivered', '2024-02-26 19:36:16', 'Syeda', 'Sunaina', 'sunaina@gmail.com', '0312-199201', 164, 'Flat-14,South Tower,Lakhani Presidency', 'Block-14,Gulshan-e-Iqbal', 'Karachi', 'Sidnh', '78102', NULL, '2024-02-17 10:42:32', '2024-02-17 14:36:21'),
(17, 6, 10000.00, 1200.00, 'Flat50', 200.00, 11000.00, 'Not Paid', 'Shipped', NULL, 'Aisha', 'Afzal', 'ayeshaafzal1573@gmail.com', '03472284368', 3, 'C-178 Flat No 2 Behind Shamsi Hospital', 'Flat-2', 'Karachi', 'Sindh', '78219', NULL, '2024-02-18 08:14:02', '2024-02-18 08:24:47');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `total` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `name`, `qty`, `price`, `total`, `created_at`, `updated_at`) VALUES
(15, 14, 48, 'Bold Bezel', 1, 10000.00, 10000.00, '2024-02-17 10:42:32', '2024-02-17 10:42:32'),
(18, 17, 50, 'Crystal Charm', 1, 10000.00, 10000.00, '2024-02-18 08:14:02', '2024-02-18 08:14:02');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `compare_price` decimal(10,2) DEFAULT NULL,
  `style` varchar(255) DEFAULT NULL,
  `material` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `price`, `compare_price`, `style`, `material`, `description`, `qty`, `category_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Time Elegance', 'time-elegance', 5000.00, 8000.00, 'Elegant', 'Stainless Steel', 'Discover the perfect blend of sophistication and functionality with our Timeless Elegance Men\'s Watch. This timepiece is a tribute to classic design and enduring style, designed to make a lasting impression wherever your journey takes you.', 8, 1, 1, '2023-11-26 08:51:35', '2023-11-26 09:00:05'),
(4, 'Gold Plated Hola', 'gold-plated-hola', 500.00, 800.00, 'Classic', 'Gold', 'Elevate your elegance with our exquisite Gold-Plated Halo Earrings. These stunning pieces are a tribute to the beauty of simplicity and the radiance of gold. The delicate, circular design gracefully encircles your earlobes, creating a heavenly halo effect.', 10, 5, 1, '2023-11-27 01:58:31', '2023-11-27 01:58:31'),
(5, 'Dazzling Drops', 'dazzling-drops', 650.00, 700.00, 'Beautiful', 'Gold', 'Dazzling Drops epitomize elegance with their intricate design and brilliant craftsmanship. These women\'s earrings feature cascading, shimmering drops that effortlessly capture attention. Crafted to complement any attire, they add a touch of sophistication.', 10, 5, 1, '2023-12-11 14:07:30', '2023-12-11 14:07:30'),
(6, 'Luxe Loops', 'luxe-loops', 700.00, 800.00, 'Elegant', 'Steel', 'Luxe Loops redefine sophistication in women\'s accessories. These intricately designed earrings showcase a looped elegance that effortlessly combines style and grace. With a timeless appeal, Luxe Loops elevate any ensemble, making them the perfect choice f', 8, 5, 1, '2023-12-11 14:18:02', '2023-12-11 14:22:16'),
(7, 'Crystal Cascade', 'crystal-cascade', 800.00, 900.00, 'Stud', 'Pearl', 'Crystal Cascade earrings are a dazzling embodiment of refined glamour. Featuring a cascading arrangement of sparkling crystals, these earrings exude timeless allure. Elevate your style with the captivating brilliance of Crystal Cascade, adding a touch of ', 12, 5, 1, '2023-12-11 14:29:03', '2023-12-11 14:29:03'),
(8, 'Silver Shimmer', 'silver-shimmer', 400.00, 530.00, 'Hoop', 'Silver', 'Silver Shimmer earrings epitomize timeless elegance. Crafted with precision, these earrings feature a delicate interplay of silver, creating a mesmerizing shimmer. Elevate your style with the understated sophistication of Silver Shimmer, perfect for addin', 5, 5, 1, '2023-12-11 14:33:29', '2023-12-11 14:33:29'),
(9, 'Golden Glitz', 'golden-glitz', 1000.00, 1200.00, 'Dangle', 'Gemstone', 'Golden Glitz earrings radiate opulence with their luxurious design. Crafted in radiant gold, these earrings captivate with their intricate details and shimmering allure. Elevate your style with the resplendent charm of Golden Glitz, a statement of sophist', 3, 5, 1, '2023-12-11 14:36:03', '2023-12-11 14:36:03'),
(10, 'Gemstone Gleam', 'gemstone-gleam', 750.00, 850.00, 'Drop', 'Fashion', 'Experience the enchantment of Gemstone Gleam earrings, where elegance meets vibrant allure. Adorned with meticulously selected gemstones, these earrings captivate with their brilliant hues and timeless charm. Elevate your style with the mesmerizing beauty', 2, 5, 1, '2023-12-11 14:53:49', '2023-12-11 14:53:49'),
(11, 'Delicate Dangles', 'delicate-dangles', 950.00, 1000.00, 'Ear Jackets', 'Rose Gold', 'Delicate Dangles earrings redefine grace with their subtle yet captivating design. These finely crafted dangles offer a touch of sophistication, gently swaying with every movement. Elevate your style with the understated charm of Delicate Dangles, a timel', 12, 5, 1, '2023-12-11 14:59:32', '2023-12-11 14:59:32'),
(12, 'Whimsical Waves', 'whimsical-waves', 640.00, 740.00, 'Chandelier', 'Pearl', 'Whimsical Waves earrings enchant with their playful design, reminiscent of gentle ocean waves. Crafted with meticulous attention, these earrings bring a touch of carefree elegance to any ensemble. Elevate your style with the delightful allure of Whimsical', 15, 5, 1, '2023-12-11 15:01:39', '2023-12-11 15:01:39'),
(13, 'Steel Chain', 'steel-chain', 1500.00, 2000.00, 'Elegant', 'Gold', 'Steel Chain embraces modern elegance in women\'s fashion. This necklace seamlessly blends strength and style with its sleek steel links. Versatile and bold, it complements any outfit, making a statement of contemporary sophistication for the confident, fas', 2, 6, 1, '2023-12-12 10:16:15', '2023-12-12 10:16:15'),
(14, 'Leather Amulet', 'leather-amulet', 2000.00, 3500.00, 'Decent', 'Gold', 'Leather Amulet is a captivating women\'s necklace that merges rugged charm with bohemian elegance. Crafted from supple leather, adorned with intricate amulets, it adds a touch of mystique to your style. Embrace a fusion of strength and allure with the uniq', 12, 6, 1, '2023-12-12 10:23:35', '2023-12-12 10:24:38'),
(15, 'Urban Pendant', 'urban-pendant', 1299.00, 1399.00, 'Beautiful', 'Pearl', 'Urban Pendant is a chic women\'s necklace that epitomizes metropolitan style. With its sleek design and modern aesthetics, this pendant effortlessly complements urban fashion. Elevate your look with the contemporary flair of Urban Pendant, a versatile acce', 7, 6, 1, '2023-12-12 10:26:27', '2023-12-12 10:26:27'),
(16, 'Rugged Emblem', 'rugged-emblem', 2200.00, 2500.00, 'Pendant', 'Gemstones', 'Rugged Emblem is a bold and distinctive women\'s necklace that exudes strength and character. Crafted with robust materials and featuring an emblematic design, it adds a touch of fearless style to any outfit. Make a statement with the unique and powerful p', 20, 6, 1, '2023-12-12 12:58:33', '2023-12-12 12:58:33'),
(17, 'Titanium Token', 'titanium-token', 4000.00, 5000.00, 'Lariat', 'Titanium', 'Titanium Token is a sleek women\'s necklace that embodies modern sophistication. Crafted from durable titanium, this token of elegance seamlessly blends strength and style. Elevate your ensemble with the contemporary allure and enduring beauty of Titanium ', 5, 6, 0, '2023-12-12 13:00:19', '2023-12-12 13:00:19'),
(18, 'Onyx Crest', 'onyx-crest', 3500.00, 3999.00, 'Tassel', 'Enamel', 'Onyx Crest is a symbol of timeless sophistication in women\'s jewelry. This necklace features a stunning onyx centerpiece, exuding an air of mystery and elegance. Meticulously crafted, it adds a touch of luxury to any ensemble, making Onyx Crest a captivat', 8, 6, 1, '2023-12-12 13:01:53', '2023-12-12 13:01:53'),
(19, 'Sporty Link', 'sporty-link', 4500.00, 5000.00, 'Bib', 'Mixed Material', 'Sporty Link is a dynamic women\'s necklace that seamlessly combines athleticism with style. Featuring sleek and resilient links, this necklace is a perfect blend of sporty energy and contemporary fashion. Elevate your active lifestyle with the dynamic char', 9, 6, 1, '2023-12-12 13:03:35', '2023-12-12 13:03:35'),
(20, 'Starlight Spark', 'starlight-spark', 2700.00, 2900.00, 'Lariat', 'Gold', 'Starlight Spark is a celestial-inspired women\'s necklace that captures the essence of a shimmering night sky. Adorned with delicate star-shaped elements, it radiates a subtle brilliance. Elevate your style with the enchanting charm of Starlight Spark, a c', 11, 6, 1, '2023-12-12 13:04:57', '2023-12-12 13:04:57'),
(21, 'Nature\'s Embrace', 'natures-embrace', 1499.00, 1599.00, 'Layered', 'Silver', 'Nature\'s Embrace necklace merges organic beauty with timeless elegance.Crafted with botanical-inspired elements, it radiates harmony and nature\'s allure. Elevate your style with the tranquil charm of Nature\'s Embrace, a sophisticated accessory celebrating', 5, 6, 1, '2023-12-12 13:06:11', '2023-12-12 13:06:11'),
(22, 'Golden Halo', 'golden-halo', 5000.00, 6500.00, 'Solitaire', 'Gold', 'Golden Halo rings radiate timeless elegance, crafted in gleaming gold with a celestial-inspired design. These rings form a captivating halo, adding a touch of celestial charm to your fingers. Elevate your style with the enduring beauty and sophistication.', 7, 4, 1, '2023-12-12 13:08:36', '2023-12-12 13:08:36'),
(23, 'Elegant Band', 'elegant-band', 500.00, 700.00, 'Signet', 'Platinum', 'Elegant Band is a refined women\'s ring, epitomizing simplicity and sophistication. With its clean lines and timeless design, this band effortlessly complements any style. Elevate your look with the understated elegance of the Elegant Band, a versatile look.', 20, 4, 1, '2023-12-12 13:10:29', '2023-12-12 13:10:29'),
(24, 'Pearl Elegance', 'pearl-elegance', 950.00, 1050.00, 'Cocktail', 'Pearl', 'Pearl Elegance rings embody classic sophistication with their timeless design. Featuring lustrous pearls set in delicate bands, they exude understated charm. Elevate your style with the enduring beauty and refined allure of Pearl Elegance, a symbol of tim', 15, 4, 1, '2023-12-12 13:14:01', '2023-12-12 13:14:01'),
(25, 'Diamond Bliss', 'diamond-bliss', 9000.00, 10000.00, 'Eternity', 'Diamond', 'Diamond Bliss rings radiate opulence and timeless allure. Crafted with precision and featuring brilliant diamonds, they capture the essence of pure elegance. Elevate your style with the luxurious charm of Diamond Bliss, a symbol of enduring beauty and ref', 2, 4, 1, '2023-12-12 13:15:07', '2023-12-12 13:15:07'),
(26, 'Vintage Charm', 'vintage-charm', 650.00, 700.00, 'Three-Stone', 'Gemstones', 'Vintage Charm rings capture the essence of bygone eras with their intricate design and timeless elegance. Crafted with meticulous attention to detail, these rings exude a nostalgic allure. Elevate your style with the vintage charm of these rings, adding a', 8, 4, 1, '2023-12-12 13:16:21', '2023-12-12 13:16:21'),
(27, 'Silver Stack', 'silver-stack', 3000.00, 4500.00, 'Signet', 'Silver', 'Silver Stack rings redefine versatility with their minimalist design and sleek elegance. Crafted in sterling silver, these stackable rings offer endless styling possibilities. Elevate your look with the modern simplicity and understated beauty of the Silv', 13, 4, 1, '2023-12-12 13:17:47', '2023-12-12 13:17:47'),
(28, 'Chic Circle', 'chic-circle', 700.00, 800.00, 'Antique', 'Minimalist', 'Chic Circle rings embody modern elegance with their sleek and minimalist design. Crafted to perfection, these rings feature a captivating circular motif, adding a touch of contemporary charm to your fingers. Elevate your style with the understated beauty ', 5, 4, 1, '2023-12-12 13:18:58', '2023-12-12 13:18:58'),
(29, 'Classic Crown', 'classic-crown', 1350.00, 1450.00, 'Halo', 'Gold', 'Classic Crown rings exude regal elegance with their timeless design. Crafted with meticulous attention, these rings feature a majestic crown motif, adding a touch of royalty to your fingers. Elevate your style with the enduring beauty and refined allure o', 6, 4, 1, '2023-12-12 13:20:03', '2023-12-12 13:20:03'),
(30, 'Starry Night', 'starry-night', 650.00, 799.00, 'Elegant', 'Silver', 'Starry Night rings capture the magic of the cosmos with their celestial-inspired design. Featuring delicate stars set against a backdrop of polished metal, these rings add a touch of enchantment to your fingers. Elevate your style with the celestial charm', 6, 4, 1, '2023-12-12 13:21:05', '2023-12-12 13:21:05'),
(31, 'Chronic Classic', 'chronic-classic', 3500.00, 3900.00, 'Chronophic', 'Leather', 'A sleek and versatile timepiece for the modern man. Precision meets style with its sophisticated chronograph design, showcasing a stainless steel case and a timeless blend of functionality and elegance.', 11, 1, 1, '2024-01-27 14:10:18', '2024-01-27 14:11:36'),
(32, 'Precision Pro', 'precision-pro', 10000.00, 11000.00, 'Classic', 'Leather', 'Define your style with this sleek men\'s watch. Meticulously crafted with premium materials, it exudes sophistication and durability. Elevate your look with its timeless design and impeccable precision.', 20, 1, 1, '2024-02-13 05:02:02', '2024-02-13 05:02:02'),
(33, 'Navigator\'s Watch', 'navigators-watch', 8999.00, 9999.00, 'Ceramic', 'Elegane', 'Navigate life\'s adventures with confidence wearing this rugged yet stylish timepiece. Crafted for explorers, it combines durability with functionality, ensuring reliability wherever your journey takes you.', 30, 1, 1, '2024-02-13 05:05:10', '2024-02-13 05:05:10'),
(34, 'Urban Explorer', 'urban-explorer', 11000.00, 12000.00, 'Gold', 'Alloys', 'Embrace city life with this versatile watch. Designed for the modern adventurer, its sleek style meets durability. Navigate urban landscapes in style and confidence with this essential accessory.', 5, 1, 1, '2024-02-13 05:07:08', '2024-02-13 05:07:08'),
(35, 'Retro Revival', 'retro-revival', 20000.00, 21000.00, 'Tachymeter', 'Stainless Steel', 'Embrace nostalgia with this vintage-inspired watch. Its timeless design pays homage to classic styles while offering modern functionality. Elevate your look with a touch of retro charm and contemporary flair.', 20, 1, 1, '2024-02-13 05:09:35', '2024-02-13 05:09:35'),
(36, 'Gentleman\'s Gear', 'gentlemans-gear', 22000.00, 2250.00, 'Submariner', 'Titanium', 'Elevate your sophistication with this refined timepiece. Crafted for the modern gentleman, its classic design exudes timeless elegance. Embrace luxury and style with this essential accessory for every occasion.', 5, 1, 1, '2024-02-13 05:11:42', '2024-02-13 05:11:42'),
(37, 'Diver\'s Delight', 'divers-delight', 24000.00, 2490.00, 'Elegant', 'Silver', 'Dive into adventure with confidence wearing this robust timepiece. Designed for underwater exploration, its durable build and water resistance ensure reliability. Make a splash with style and functionality.', 12, 1, 1, '2024-02-13 05:13:47', '2024-02-13 05:13:47'),
(38, 'Bold Expedition', 'bold-expedition', 9999.00, 10000.00, 'Mechanical', 'Steel', 'Embark on daring journeys with this rugged timepiece. Built for adventure, its bold design and durability withstand the toughest conditions. Forge your path with confidence and style on every expedition.', 20, 1, 1, '2024-02-13 05:15:04', '2024-02-13 05:15:04'),
(39, 'Gem Cascade', 'gem-cascade', 2300.00, 2500.00, 'Craftsmanship', 'Gold', 'Enhance your ensemble with this captivating men\'s necklace. Adorned with a cascade of exquisite gemstones, it exudes elegance and charm. Elevate your look with this luxurious accessory.', 20, 2, 1, '2024-02-13 05:18:00', '2024-02-13 05:18:00'),
(40, 'Steel Band', 'steel-band', 30000.00, 32000.00, 'Special', 'Gold', 'Make a statement with this sleek men\'s ring. Crafted from durable stainless steel, its minimalist design exudes modern sophistication. Elevate your style with this versatile accessory that adds a touch of elegance to any look.', 15, 3, 1, '2024-02-13 05:20:27', '2024-02-13 05:20:27'),
(41, 'Gold Signet', 'gold-signet', 3000.00, 3500.00, 'Classic', 'Gold', 'Gold Signet men\'s ring exudes sophistication. Meticulously designed in 18K gold, its classic style embodies refinement and distinction, a must-have for every gentleman\'s collection. Shop now at Gem Elegance', 20, 3, 1, '2024-02-17 05:33:51', '2024-02-17 05:33:51'),
(42, 'Silver Halo', 'silver-halo', 4500.00, 4999.00, 'Elegance', 'Diamond', 'Elevate your style with our Silver Halo ring, a symbol of grace and sophistication. Expertly crafted in sterling silver, its halo design exudes timeless elegance, perfect for any occasion. Shop now at Gem Elegance', 2, 3, 1, '2024-02-17 05:35:18', '2024-02-17 05:35:18'),
(43, 'Brushed Silver', 'brushed-silver', 5000.00, 5400.00, 'Classic', 'Silver', '\"Introducing our Brushed Silver ring, a masterpiece of modern sophistication. Crafted with meticulous detail, its brushed finish exudes contemporary elegance, making it a timeless addition to any collection. Elevate your style with understated luxury. Sho', 20, 3, 1, '2024-02-17 05:38:27', '2024-02-17 05:38:27'),
(44, 'Urban Signet', 'urban-signet', 3000.00, 3200.00, 'Modern', 'Gold', 'Embrace urban sophistication with our Urban Signet ring. Bold yet refined, this statement piece features sleek lines and modern design, crafted for the contemporary gentleman\'s style. Elevate your look with confidence. Shop now !', 2, 3, 1, '2024-02-17 05:39:42', '2024-02-17 05:39:42'),
(45, 'Sleek Slate', 'sleek-slate', 4500.00, 4599.00, 'Modern', 'Diamond', 'Introducing Sleek Slate – a fusion of modernity and elegance. Crafted with precision, its slate-inspired design exudes sophistication, making it a versatile addition to any wardrobe. Elevate your style with confidence. Shop now', 15, 3, 1, '2024-02-17 05:41:14', '2024-02-17 05:41:14'),
(46, 'Tungsten Twist', 'tungsten-twist', 5000.00, 5200.00, 'Sophisticated', 'Gold', 'Experience the Tungsten Twist - a blend of strength and style. Crafted with durable tungsten, its unique twist design adds a touch of sophistication to any look. Elevate your ensemble with lasting elegance. Shop now !', 8, 3, 1, '2024-02-17 05:42:45', '2024-02-17 05:42:45'),
(47, 'Diamond Duo', 'diamond-duo', 7500.00, 7800.00, 'Classic', 'Diamond', 'Discover the brilliance of our Diamond Duo ring, where elegance meets extravagance. Crafted with exquisite diamonds set in a duo formation, this piece epitomizes luxury and sophistication. Elevate your style with unmatched radiance. Shop now', 12, 3, 1, '2024-02-17 05:43:49', '2024-02-17 05:43:49'),
(48, 'Bold Bezel', 'bold-bezel', 10000.00, 11999.00, 'Ceramic', 'Graphic', 'Make a statement with our Bold Bezel ring, a symbol of confidence and style. Crafted with precision, its prominent bezel design exudes strength and sophistication, perfect for the modern gentleman. Elevate your look with bold elegance. Shop now', 22, 3, 1, '2024-02-17 05:45:41', '2024-02-17 05:45:41'),
(49, 'Pearl Elegance', 'pearl-elegance', 2000.00, 2300.00, 'Classic', 'Pearl', 'Pearl Elegance isn\'t just for women. Our men\'s necklace redefines sophistication. Crafted with timeless pearls and masculine design, it exudes refined masculinity. Elevate your style at Gem Elegance', 20, 2, 1, '2024-02-17 05:49:46', '2024-02-17 05:49:46'),
(50, 'Crystal Charm', 'crystal-charm', 10000.00, 12000.00, 'Elegant', 'Gold', '\"Introducing Crystal Charm, a men\'s necklace that embodies elegance and charm. Crafted with precision and adorned with crystals, it adds a touch of sophistication to any ensemble. Elevate your style with Gem Elegance', 20, 2, 1, '2024-02-17 05:55:36', '2024-02-17 05:55:36'),
(52, 'Silver Moon', 'silver-moon', 4500.00, 4900.00, 'Ceramic', 'Silver', 'Radiate celestial elegance with our Silver Moon men\'s necklace. Crafted with sterling silver, its moon-inspired design evokes mystery and sophistication. Elevate your style with lunar allure. Discover it at Gem Elegance', 29, 2, 1, '2024-02-17 06:05:59', '2024-02-17 06:05:59'),
(53, 'Boho Bead', 'boho-bead', 5200.00, 5400.00, 'Craftsmanship', 'Diamond', 'Embrace the free spirit with our Boho Bead men\'s necklace. Crafted with vibrant beads and eclectic charm, it exudes bohemian style and individuality. Elevate your look with a touch of wanderlust. Find it at Gem Elegance', 30, 2, 1, '2024-02-17 06:07:28', '2024-02-17 06:07:28'),
(54, 'Retro Link', 'retro-link', 2300.00, 2400.00, 'Classic', 'Ceramic', '\"Step into the past with our Retro Link men\'s necklace. Crafted with vintage-inspired links, it exudes old-school charm and timeless style. Elevate your look with a nostalgic touch. Discover it at Gem Elegance', 8, 2, 1, '2024-02-17 06:09:13', '2024-02-17 06:09:13'),
(55, 'Bold Choker', 'bold-choker', 6000.00, 6500.00, 'Elegant', 'Silver Gold', 'Make a statement with our Bold Choker men\'s necklace. Crafted to stand out, its striking design exudes confidence and style. Elevate your look with bold sophistication. Find it exclusively at Gem Elegance', 23, 2, 1, '2024-02-17 06:10:48', '2024-02-17 06:10:48'),
(56, 'Gemstone Loop', 'gemstone-loop', 6200.00, 6500.00, 'Unique', 'Diamond', '\"Introducing the Gemstone Loop men\'s necklace, a fusion of elegance and masculinity. Crafted with striking gemstones intricately looped, it exudes sophistication and individuality. Elevate your style with Gem Elegance', 15, 2, 1, '2024-02-17 06:12:09', '2024-02-17 06:12:09');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_path`, `created_at`, `updated_at`) VALUES
(34, 2, 'uploads/watch-1-4.png', '2023-11-27 01:54:05', '2023-11-27 01:54:05'),
(35, 2, 'uploads/watch-1-3.png', '2023-11-27 01:54:05', '2023-11-27 01:54:05'),
(36, 2, 'uploads/watch-1-2.png', '2023-11-27 01:54:05', '2023-11-27 01:54:05'),
(37, 2, 'uploads/watch-1-1.png', '2023-11-27 01:54:05', '2023-11-27 01:54:05'),
(42, 4, 'uploads/women-earing1-1.png', '2023-11-27 02:08:57', '2023-11-27 02:08:57'),
(43, 4, 'uploads/women-earing1-2.png', '2023-11-27 02:08:57', '2023-11-27 02:08:57'),
(44, 4, 'uploads/women-earing1-3.png', '2023-11-27 02:08:57', '2023-11-27 02:08:57'),
(45, 4, 'uploads/women-earing1-4.png', '2023-11-27 02:08:57', '2023-11-27 02:08:57'),
(46, 5, 'uploads/women-earing2 (2).JPG', '2023-12-11 14:07:33', '2023-12-11 14:07:33'),
(47, 5, 'uploads/women-earing2.JPG', '2023-12-11 14:07:33', '2023-12-11 14:07:33'),
(48, 5, 'uploads/women-earing2-1.JPG', '2023-12-11 14:07:33', '2023-12-11 14:07:33'),
(49, 5, 'uploads/women-earing2-2.JPG', '2023-12-11 14:07:33', '2023-12-11 14:07:33'),
(54, 6, 'uploads/1.png', '2023-12-11 14:22:16', '2023-12-11 14:22:16'),
(55, 6, 'uploads/arteum-ro-VJZdxfvFGuo-unsplash.JPEG', '2023-12-11 14:22:16', '2023-12-11 14:22:16'),
(56, 6, 'uploads/arteum-ro-VJZdxfvFGuo-unsplash.JPG', '2023-12-11 14:22:16', '2023-12-11 14:22:16'),
(57, 6, 'uploads/arteum-ro-VJZdxfvFGuo-unsplash-1.JPG', '2023-12-11 14:22:16', '2023-12-11 14:22:16'),
(58, 7, 'uploads/women-earing-4.JPEG', '2023-12-11 14:29:03', '2023-12-11 14:29:03'),
(59, 7, 'uploads/women-earing-4.JPG', '2023-12-11 14:29:03', '2023-12-11 14:29:03'),
(60, 7, 'uploads/women-earing-4.png', '2023-12-11 14:29:03', '2023-12-11 14:29:03'),
(61, 7, 'uploads/women-earing-4-1.JPG', '2023-12-11 14:29:03', '2023-12-11 14:29:03'),
(62, 8, 'uploads/women-earing5.JPEG', '2023-12-11 14:33:29', '2023-12-11 14:33:29'),
(63, 8, 'uploads/women-earing5.JPG', '2023-12-11 14:33:29', '2023-12-11 14:33:29'),
(64, 8, 'uploads/women-earing5.png', '2023-12-11 14:33:29', '2023-12-11 14:33:29'),
(65, 8, 'uploads/women-earing5-1.JPG', '2023-12-11 14:33:29', '2023-12-11 14:33:29'),
(66, 9, 'uploads/women-earing-6.JPEG', '2023-12-11 14:36:03', '2023-12-11 14:36:03'),
(67, 9, 'uploads/women-earing-6.JPG', '2023-12-11 14:36:03', '2023-12-11 14:36:03'),
(68, 9, 'uploads/women-earing-6.png', '2023-12-11 14:36:03', '2023-12-11 14:36:03'),
(69, 9, 'uploads/women-earing-6-1.JPG', '2023-12-11 14:36:03', '2023-12-11 14:36:03'),
(70, 10, 'uploads/women-earing7.JPEG', '2023-12-11 14:53:49', '2023-12-11 14:53:49'),
(71, 10, 'uploads/women-earing7.JPG', '2023-12-11 14:53:49', '2023-12-11 14:53:49'),
(72, 10, 'uploads/women-earing7.png', '2023-12-11 14:53:49', '2023-12-11 14:53:49'),
(73, 10, 'uploads/women-earing7-1.JPG', '2023-12-11 14:53:49', '2023-12-11 14:53:49'),
(74, 11, 'uploads/women-earing8.JPEG', '2023-12-11 14:59:32', '2023-12-11 14:59:32'),
(75, 11, 'uploads/women-earing8.JPG', '2023-12-11 14:59:32', '2023-12-11 14:59:32'),
(76, 11, 'uploads/women-earing8.png', '2023-12-11 14:59:32', '2023-12-11 14:59:32'),
(77, 11, 'uploads/women-earing8-1.JPG', '2023-12-11 14:59:32', '2023-12-11 14:59:32'),
(78, 12, 'uploads/women-earing9.JPEG', '2023-12-11 15:01:39', '2023-12-11 15:01:39'),
(79, 12, 'uploads/women-earing9.JPG', '2023-12-11 15:01:39', '2023-12-11 15:01:39'),
(80, 12, 'uploads/women-earing9.png', '2023-12-11 15:01:39', '2023-12-11 15:01:39'),
(81, 12, 'uploads/women-earing9-1.JPG', '2023-12-11 15:01:39', '2023-12-11 15:01:39'),
(82, 13, 'uploads/EARINGS.JPEG', '2023-12-12 10:16:15', '2023-12-12 10:16:15'),
(83, 13, 'uploads/EARINGS.JPG', '2023-12-12 10:16:15', '2023-12-12 10:16:15'),
(84, 13, 'uploads/EARINGS-1.JPG', '2023-12-12 10:16:15', '2023-12-12 10:16:15'),
(85, 13, 'uploads/Earrings.png', '2023-12-12 10:16:15', '2023-12-12 10:16:15'),
(90, 14, 'uploads/A.JPG', '2023-12-12 10:24:38', '2023-12-12 10:24:38'),
(91, 14, 'uploads/EARINGS (1).JPG', '2023-12-12 10:24:38', '2023-12-12 10:24:38'),
(92, 14, 'uploads/EARINGS (1)-1.JPG', '2023-12-12 10:24:38', '2023-12-12 10:24:38'),
(93, 14, 'uploads/EARINGS (1)-2.JPG', '2023-12-12 10:24:38', '2023-12-12 10:24:38'),
(94, 15, 'uploads/Rectangle 24.JPEG', '2023-12-12 10:26:27', '2023-12-12 10:26:27'),
(95, 15, 'uploads/Rectangle 24.JPG', '2023-12-12 10:26:27', '2023-12-12 10:26:27'),
(96, 15, 'uploads/Rectangle 24-1.JPG', '2023-12-12 10:26:27', '2023-12-12 10:26:27'),
(97, 15, 'uploads/Rectangle24.JPEG', '2023-12-12 10:26:27', '2023-12-12 10:26:27'),
(98, 16, 'uploads/EARINGS (2) - Copy.JPG', '2023-12-12 12:58:34', '2023-12-12 12:58:34'),
(99, 16, 'uploads/EARINGS (2).JPG', '2023-12-12 12:58:34', '2023-12-12 12:58:34'),
(100, 16, 'uploads/EARINGS (2)-1.JPG', '2023-12-12 12:58:34', '2023-12-12 12:58:34'),
(101, 16, 'uploads/EARINGS (2)-2.JPG', '2023-12-12 12:58:34', '2023-12-12 12:58:34'),
(102, 17, 'uploads/EARINGS (3)-1 - Copy.JPG', '2023-12-12 13:00:19', '2023-12-12 13:00:19'),
(103, 17, 'uploads/EARINGS (3)-1.JPG', '2023-12-12 13:00:19', '2023-12-12 13:00:19'),
(104, 17, 'uploads/EARINGS (3)-2.JPG', '2023-12-12 13:00:19', '2023-12-12 13:00:19'),
(105, 17, 'uploads/EARINGS (3)-3.JPG', '2023-12-12 13:00:19', '2023-12-12 13:00:19'),
(106, 18, 'uploads/EARINGS (4) - Copy.JPEG', '2023-12-12 13:01:53', '2023-12-12 13:01:53'),
(107, 18, 'uploads/EARINGS (4).JPEG', '2023-12-12 13:01:53', '2023-12-12 13:01:53'),
(108, 18, 'uploads/EARINGS (4).JPG', '2023-12-12 13:01:53', '2023-12-12 13:01:53'),
(109, 18, 'uploads/EARINGS (4)-1.JPG', '2023-12-12 13:01:53', '2023-12-12 13:01:53'),
(110, 19, 'uploads/EARINGS (5) - Copy.JPEG', '2023-12-12 13:03:35', '2023-12-12 13:03:35'),
(111, 19, 'uploads/EARINGS (5).JPEG', '2023-12-12 13:03:35', '2023-12-12 13:03:35'),
(112, 19, 'uploads/EARINGS (5).JPG', '2023-12-12 13:03:35', '2023-12-12 13:03:35'),
(113, 19, 'uploads/EARINGS (5)-1.JPG', '2023-12-12 13:03:35', '2023-12-12 13:03:35'),
(114, 20, 'uploads/EARINGS (6) - Copy.JPEG', '2023-12-12 13:04:57', '2023-12-12 13:04:57'),
(115, 20, 'uploads/EARINGS (6).JPEG', '2023-12-12 13:04:57', '2023-12-12 13:04:57'),
(116, 20, 'uploads/EARINGS (6).JPG', '2023-12-12 13:04:57', '2023-12-12 13:04:57'),
(117, 20, 'uploads/EARINGS (6)-1.JPG', '2023-12-12 13:04:57', '2023-12-12 13:04:57'),
(118, 21, 'uploads/Rectangle 24 (1) - Copy.JPEG', '2023-12-12 13:06:12', '2023-12-12 13:06:12'),
(119, 21, 'uploads/Rectangle 24 (1).JPEG', '2023-12-12 13:06:12', '2023-12-12 13:06:12'),
(120, 21, 'uploads/Rectangle 24 (1).JPG', '2023-12-12 13:06:12', '2023-12-12 13:06:12'),
(121, 21, 'uploads/Rectangle 24 (1)-1.JPG', '2023-12-12 13:06:12', '2023-12-12 13:06:12'),
(122, 22, 'uploads/EARINGS (7) - Copy.JPEG', '2023-12-12 13:08:36', '2023-12-12 13:08:36'),
(123, 22, 'uploads/EARINGS (7).JPEG', '2023-12-12 13:08:36', '2023-12-12 13:08:36'),
(124, 22, 'uploads/EARINGS (7).JPG', '2023-12-12 13:08:36', '2023-12-12 13:08:36'),
(125, 22, 'uploads/EARINGS (7)-1.JPG', '2023-12-12 13:08:36', '2023-12-12 13:08:36'),
(126, 23, 'uploads/EARINGS (8) - Copy.JPEG', '2023-12-12 13:10:29', '2023-12-12 13:10:29'),
(127, 23, 'uploads/EARINGS (8).JPEG', '2023-12-12 13:10:29', '2023-12-12 13:10:29'),
(128, 23, 'uploads/EARINGS (8).JPG', '2023-12-12 13:10:29', '2023-12-12 13:10:29'),
(129, 23, 'uploads/EARINGS (8)-1.JPG', '2023-12-12 13:10:29', '2023-12-12 13:10:29'),
(130, 24, 'uploads/Rectangle 24 (2) - Copy.JPEG', '2023-12-12 13:14:01', '2023-12-12 13:14:01'),
(131, 24, 'uploads/Rectangle 24 (2).JPEG', '2023-12-12 13:14:01', '2023-12-12 13:14:01'),
(132, 24, 'uploads/Rectangle 24 (2).JPG', '2023-12-12 13:14:01', '2023-12-12 13:14:01'),
(133, 24, 'uploads/Rectangle 24 (2)-1.JPG', '2023-12-12 13:14:01', '2023-12-12 13:14:01'),
(134, 25, 'uploads/EARINGS (9) - Copy.JPEG', '2023-12-12 13:15:07', '2023-12-12 13:15:07'),
(135, 25, 'uploads/EARINGS (9).JPEG', '2023-12-12 13:15:07', '2023-12-12 13:15:07'),
(136, 25, 'uploads/EARINGS (9).JPG', '2023-12-12 13:15:07', '2023-12-12 13:15:07'),
(137, 25, 'uploads/EARINGS (9)-1.JPG', '2023-12-12 13:15:07', '2023-12-12 13:15:07'),
(138, 26, 'uploads/EARINGS (10) - Copy.JPEG', '2023-12-12 13:16:21', '2023-12-12 13:16:21'),
(139, 26, 'uploads/EARINGS (10).JPEG', '2023-12-12 13:16:21', '2023-12-12 13:16:21'),
(140, 26, 'uploads/EARINGS (10).JPG', '2023-12-12 13:16:21', '2023-12-12 13:16:21'),
(141, 26, 'uploads/EARINGS (10)-1.JPG', '2023-12-12 13:16:21', '2023-12-12 13:16:21'),
(142, 27, 'uploads/EARINGS (11) - Copy.JPEG', '2023-12-12 13:17:47', '2023-12-12 13:17:47'),
(143, 27, 'uploads/EARINGS (11).JPEG', '2023-12-12 13:17:47', '2023-12-12 13:17:47'),
(144, 27, 'uploads/EARINGS (11).JPG', '2023-12-12 13:17:47', '2023-12-12 13:17:47'),
(145, 27, 'uploads/EARINGS (11)-1.JPG', '2023-12-12 13:17:47', '2023-12-12 13:17:47'),
(146, 28, 'uploads/EARINGS (13) - Copy.JPEG', '2023-12-12 13:18:58', '2023-12-12 13:18:58'),
(147, 28, 'uploads/EARINGS (13).JPEG', '2023-12-12 13:18:58', '2023-12-12 13:18:58'),
(148, 28, 'uploads/EARINGS (13).JPG', '2023-12-12 13:18:58', '2023-12-12 13:18:58'),
(149, 28, 'uploads/EARINGS (13)-1.JPG', '2023-12-12 13:18:58', '2023-12-12 13:18:58'),
(150, 29, 'uploads/EARINGS (12) - Copy.JPEG', '2023-12-12 13:20:03', '2023-12-12 13:20:03'),
(151, 29, 'uploads/EARINGS (12).JPEG', '2023-12-12 13:20:03', '2023-12-12 13:20:03'),
(152, 29, 'uploads/EARINGS (12).JPG', '2023-12-12 13:20:03', '2023-12-12 13:20:03'),
(153, 29, 'uploads/EARINGS (12)-1.JPG', '2023-12-12 13:20:03', '2023-12-12 13:20:03'),
(154, 30, 'uploads/Rectangle 24 (3) - Copy.JPEG', '2023-12-12 13:21:05', '2023-12-12 13:21:05'),
(155, 30, 'uploads/Rectangle 24 (3).JPEG', '2023-12-12 13:21:05', '2023-12-12 13:21:05'),
(156, 30, 'uploads/Rectangle 24 (3).JPG', '2023-12-12 13:21:05', '2023-12-12 13:21:05'),
(157, 30, 'uploads/Rectangle 24 (3)-1.JPG', '2023-12-12 13:21:05', '2023-12-12 13:21:05'),
(162, 31, 'uploads/EARINGS 1.JPEG', '2024-01-27 14:11:36', '2024-01-27 14:11:36'),
(163, 31, 'uploads/EARINGS 2.JPG', '2024-01-27 14:11:36', '2024-01-27 14:11:36'),
(164, 31, 'uploads/EARINGS 3.JPG', '2024-01-27 14:11:36', '2024-01-27 14:11:36'),
(165, 31, 'uploads/EARINGS 4.JPEG', '2024-01-27 14:11:36', '2024-01-27 14:11:36'),
(166, 32, 'uploads/3-0.JPG', '2024-02-13 05:02:03', '2024-02-13 05:02:03'),
(167, 32, 'uploads/3-1.JPEG', '2024-02-13 05:02:03', '2024-02-13 05:02:03'),
(168, 32, 'uploads/3-2.JPG', '2024-02-13 05:02:03', '2024-02-13 05:02:03'),
(169, 32, 'uploads/3-4.JPG', '2024-02-13 05:02:03', '2024-02-13 05:02:03'),
(202, 35, 'uploads/1-1.JPEG', '2024-02-13 05:22:17', '2024-02-13 05:22:17'),
(203, 35, 'uploads/1-2.JPG', '2024-02-13 05:22:17', '2024-02-13 05:22:17'),
(204, 35, 'uploads/1-3.JPG', '2024-02-13 05:22:17', '2024-02-13 05:22:17'),
(205, 35, 'uploads/1-4.JPEG', '2024-02-13 05:22:17', '2024-02-13 05:22:17'),
(206, 36, 'uploads/g-1.JPEG', '2024-02-13 05:25:49', '2024-02-13 05:25:49'),
(207, 36, 'uploads/g2-.JPG', '2024-02-13 05:25:49', '2024-02-13 05:25:49'),
(208, 36, 'uploads/g3.JPG', '2024-02-13 05:25:49', '2024-02-13 05:25:49'),
(209, 36, 'uploads/g4.JPEG', '2024-02-13 05:25:49', '2024-02-13 05:25:49'),
(210, 33, 'uploads/h1.JPG', '2024-02-13 05:28:11', '2024-02-13 05:28:11'),
(211, 33, 'uploads/h2.JPEG', '2024-02-13 05:28:11', '2024-02-13 05:28:11'),
(212, 33, 'uploads/h3.JPG', '2024-02-13 05:28:11', '2024-02-13 05:28:11'),
(213, 33, 'uploads/h4.JPG', '2024-02-13 05:28:11', '2024-02-13 05:28:11'),
(214, 34, 'uploads/f1.JPEG', '2024-02-13 05:30:44', '2024-02-13 05:30:44'),
(215, 34, 'uploads/f2.JPG', '2024-02-13 05:30:44', '2024-02-13 05:30:44'),
(216, 34, 'uploads/f3.JPG', '2024-02-13 05:30:44', '2024-02-13 05:30:44'),
(217, 34, 'uploads/f4.JPEG', '2024-02-13 05:30:44', '2024-02-13 05:30:44'),
(222, 38, 'uploads/b1.JPEG', '2024-02-13 05:33:37', '2024-02-13 05:33:37'),
(223, 38, 'uploads/b2.JPG', '2024-02-13 05:33:37', '2024-02-13 05:33:37'),
(224, 38, 'uploads/b3.JPG', '2024-02-13 05:33:37', '2024-02-13 05:33:37'),
(225, 38, 'uploads/b4.JPEG', '2024-02-13 05:33:37', '2024-02-13 05:33:37'),
(226, 39, 'uploads/n3.JPG', '2024-02-13 05:36:55', '2024-02-13 05:36:55'),
(227, 39, 'uploads/a1.JPEG', '2024-02-13 05:36:55', '2024-02-13 05:36:55'),
(228, 39, 'uploads/n2.JPG', '2024-02-13 05:36:55', '2024-02-13 05:36:55'),
(229, 39, 'uploads/n4.JPEG', '2024-02-13 05:36:55', '2024-02-13 05:36:55'),
(230, 40, 'uploads/r1.JPEG', '2024-02-13 05:38:05', '2024-02-13 05:38:05'),
(231, 40, 'uploads/r2.JPG', '2024-02-13 05:38:05', '2024-02-13 05:38:05'),
(232, 40, 'uploads/r3.JPG', '2024-02-13 05:38:05', '2024-02-13 05:38:05'),
(233, 40, 'uploads/r4.JPEG', '2024-02-13 05:38:05', '2024-02-13 05:38:05'),
(234, 37, 'uploads/a2.jfif', '2024-02-13 09:46:09', '2024-02-13 09:46:09'),
(235, 37, 'uploads/a3.jfif', '2024-02-13 09:46:09', '2024-02-13 09:46:09'),
(236, 37, 'uploads/a1.jfif', '2024-02-13 09:46:09', '2024-02-13 09:46:09'),
(237, 37, 'uploads/01.jfif', '2024-02-13 09:46:09', '2024-02-13 09:46:09'),
(238, 41, 'uploads/c1.JPEG', '2024-02-17 05:33:52', '2024-02-17 05:33:52'),
(239, 41, 'uploads/c2.JPG', '2024-02-17 05:33:52', '2024-02-17 05:33:52'),
(240, 41, 'uploads/c3.JPG', '2024-02-17 05:33:52', '2024-02-17 05:33:52'),
(241, 41, 'uploads/c4.JPEG', '2024-02-17 05:33:52', '2024-02-17 05:33:52'),
(242, 42, 'uploads/d1.JPEG', '2024-02-17 05:35:18', '2024-02-17 05:35:18'),
(243, 42, 'uploads/d2.JPG', '2024-02-17 05:35:18', '2024-02-17 05:35:18'),
(244, 42, 'uploads/d3.JPG', '2024-02-17 05:35:18', '2024-02-17 05:35:18'),
(245, 42, 'uploads/d4.JPEG', '2024-02-17 05:35:18', '2024-02-17 05:35:18'),
(246, 43, 'uploads/z-1.JPEG', '2024-02-17 05:38:28', '2024-02-17 05:38:28'),
(247, 43, 'uploads/z-3.JPG', '2024-02-17 05:38:28', '2024-02-17 05:38:28'),
(248, 43, 'uploads/z-4.JPEG', '2024-02-17 05:38:28', '2024-02-17 05:38:28'),
(249, 43, 'uploads/z-2.JPG', '2024-02-17 05:38:28', '2024-02-17 05:38:28'),
(250, 44, 'uploads/e1.JPG', '2024-02-17 05:39:43', '2024-02-17 05:39:43'),
(251, 44, 'uploads/e2.JPG', '2024-02-17 05:39:43', '2024-02-17 05:39:43'),
(252, 44, 'uploads/e3.JPG', '2024-02-17 05:39:43', '2024-02-17 05:39:43'),
(253, 44, 'uploads/e4.JPG', '2024-02-17 05:39:43', '2024-02-17 05:39:43'),
(254, 45, 'uploads/f1.JPEG', '2024-02-17 05:41:14', '2024-02-17 05:41:14'),
(255, 45, 'uploads/f2.JPG', '2024-02-17 05:41:14', '2024-02-17 05:41:14'),
(256, 45, 'uploads/f3.JPG', '2024-02-17 05:41:14', '2024-02-17 05:41:14'),
(257, 45, 'uploads/f4.JPEG', '2024-02-17 05:41:14', '2024-02-17 05:41:14'),
(258, 46, 'uploads/g1.JPEG', '2024-02-17 05:42:45', '2024-02-17 05:42:45'),
(259, 46, 'uploads/g2.JPG', '2024-02-17 05:42:45', '2024-02-17 05:42:45'),
(260, 46, 'uploads/g3.JPG', '2024-02-17 05:42:45', '2024-02-17 05:42:45'),
(261, 46, 'uploads/g4.JPEG', '2024-02-17 05:42:45', '2024-02-17 05:42:45'),
(262, 47, 'uploads/i1.JPEG', '2024-02-17 05:43:49', '2024-02-17 05:43:49'),
(263, 47, 'uploads/i2.JPG', '2024-02-17 05:43:49', '2024-02-17 05:43:49'),
(264, 47, 'uploads/i3.JPG', '2024-02-17 05:43:49', '2024-02-17 05:43:49'),
(265, 47, 'uploads/i4.JPEG', '2024-02-17 05:43:49', '2024-02-17 05:43:49'),
(266, 48, 'uploads/i5.JPEG', '2024-02-17 05:45:41', '2024-02-17 05:45:41'),
(267, 48, 'uploads/i6.JPG', '2024-02-17 05:45:41', '2024-02-17 05:45:41'),
(268, 48, 'uploads/i7.JPG', '2024-02-17 05:45:41', '2024-02-17 05:45:41'),
(269, 48, 'uploads/i8.JPG', '2024-02-17 05:45:41', '2024-02-17 05:45:41'),
(270, 49, 'uploads/j1.JPEG', '2024-02-17 05:49:46', '2024-02-17 05:49:46'),
(271, 49, 'uploads/j2.JPG', '2024-02-17 05:49:46', '2024-02-17 05:49:46'),
(272, 49, 'uploads/j3.JPG', '2024-02-17 05:49:46', '2024-02-17 05:49:46'),
(273, 49, 'uploads/j4.JPG', '2024-02-17 05:49:46', '2024-02-17 05:49:46'),
(278, 50, 'uploads/four.jpg', '2024-02-17 06:00:26', '2024-02-17 06:00:26'),
(279, 50, 'uploads/three.jpg', '2024-02-17 06:00:26', '2024-02-17 06:00:26'),
(280, 50, 'uploads/two.jpg', '2024-02-17 06:00:26', '2024-02-17 06:00:26'),
(281, 50, 'uploads/1.jpg', '2024-02-17 06:00:26', '2024-02-17 06:00:26'),
(286, 52, 'uploads/EARINGS (31).JPEG', '2024-02-17 06:05:59', '2024-02-17 06:05:59'),
(287, 52, 'uploads/EARINGS (31).JPG', '2024-02-17 06:05:59', '2024-02-17 06:05:59'),
(288, 52, 'uploads/EARINGS (31)-0.JPG', '2024-02-17 06:05:59', '2024-02-17 06:05:59'),
(289, 52, 'uploads/EARINGS (31)-1 -2.JPG', '2024-02-17 06:05:59', '2024-02-17 06:05:59'),
(290, 53, 'uploads/EARINGS (32) - 4.JPEG', '2024-02-17 06:07:28', '2024-02-17 06:07:28'),
(291, 53, 'uploads/EARINGS (32).JPEG', '2024-02-17 06:07:28', '2024-02-17 06:07:28'),
(292, 53, 'uploads/EARINGS (32).JPG', '2024-02-17 06:07:28', '2024-02-17 06:07:28'),
(293, 53, 'uploads/EARINGS (32)-1.JPG', '2024-02-17 06:07:28', '2024-02-17 06:07:28'),
(294, 54, 'uploads/Rectangle 24 (7).JPEG', '2024-02-17 06:09:13', '2024-02-17 06:09:13'),
(295, 54, 'uploads/Rectangle 24 (7).JPG', '2024-02-17 06:09:13', '2024-02-17 06:09:13'),
(296, 54, 'uploads/Rectangle 24 (7)-1.JPG', '2024-02-17 06:09:13', '2024-02-17 06:09:13'),
(297, 54, 'uploads/Rectangle 24 (7)-2.JPG', '2024-02-17 06:09:13', '2024-02-17 06:09:13'),
(298, 55, 'uploads/EARINGS (33).JPEG', '2024-02-17 06:10:48', '2024-02-17 06:10:48'),
(299, 55, 'uploads/EARINGS (33).JPG', '2024-02-17 06:10:48', '2024-02-17 06:10:48'),
(300, 55, 'uploads/EARINGS (33)-1 - 2.JPG', '2024-02-17 06:10:48', '2024-02-17 06:10:48'),
(301, 55, 'uploads/EARINGS (33)-1.JPG', '2024-02-17 06:10:48', '2024-02-17 06:10:48'),
(302, 56, 'uploads/Rectangle 24 (8) - Copy.JPEG', '2024-02-17 06:12:09', '2024-02-17 06:12:09'),
(303, 56, 'uploads/Rectangle 24 (8).JPEG', '2024-02-17 06:12:09', '2024-02-17 06:12:09'),
(304, 56, 'uploads/Rectangle 24 (8).JPG', '2024-02-17 06:12:09', '2024-02-17 06:12:09'),
(305, 56, 'uploads/Rectangle 24 (8)-1.JPG', '2024-02-17 06:12:09', '2024-02-17 06:12:09');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_charges`
--

CREATE TABLE `shipping_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` varchar(255) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_charges`
--

INSERT INTO `shipping_charges` (`id`, `country_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, '2', 1100.00, '2023-12-10 05:06:46', '2024-01-30 07:28:13'),
(2, 'rest_of_world', 0.00, '2023-12-10 05:22:55', '2023-12-10 05:22:55'),
(3, '3', 1200.00, '2023-12-10 05:47:28', '2023-12-10 05:47:28'),
(8, '164', 100.00, '2023-12-10 06:40:24', '2023-12-10 06:40:24'),
(9, '1', 2000.00, '2023-12-11 10:58:24', '2023-12-11 10:58:24'),
(10, '42', 200.00, '2024-02-17 10:11:54', '2024-02-17 10:11:54'),
(11, '46', 150.00, '2024-02-17 10:15:33', '2024-02-17 10:15:33'),
(12, '4', 100.00, '2024-02-19 11:28:08', '2024-02-19 11:28:08'),
(13, '5', 200.00, '2024-02-19 11:28:15', '2024-02-19 11:28:15'),
(14, '9', 1000.00, '2024-02-19 11:28:26', '2024-02-19 11:28:26'),
(15, '6', 200.00, '2024-02-19 11:28:41', '2024-02-19 11:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, 2, NULL, '$2y$10$JLF1I532CD5PrCyJZeg1zec3bLzfZ9fR3cLO3MNzPlFfuwooTK10a', NULL, '2023-11-26 06:33:14', '2024-01-30 05:41:32'),
(5, 'Sunaina', 'sunaina@gmail.com', '0391-9290123', 1, NULL, '$2y$10$pfy9QEN64gsKfjh7Te6M3Oql9YfHsCdEs3tO6J97FkraB4T5HGX3O', NULL, '2023-12-10 09:59:46', '2024-01-29 13:49:25'),
(6, 'Aisha', 'ayeshaafzal1573@gmail.com', '03472284368', 1, NULL, '$2y$10$U3jgbC/CIPGJHnwOIz7gsOkWDppV8wHXKmhalzWAoWz4Mqz4HAQ0i', NULL, '2024-02-17 06:50:14', '2024-02-17 06:50:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_slug_unique` (`slug`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_addresses_user_id_foreign` (`user_id`),
  ADD KEY `customer_addresses_country_id_foreign` (`country_id`);

--
-- Indexes for table `discount_coupans`
--
ALTER TABLE `discount_coupans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_country_id_foreign` (`country_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `discount_coupans`
--
ALTER TABLE `discount_coupans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=306;

--
-- AUTO_INCREMENT for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  ADD CONSTRAINT `customer_addresses_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
