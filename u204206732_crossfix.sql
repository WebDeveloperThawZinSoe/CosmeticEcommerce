-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 25, 2024 at 02:10 AM
-- Server version: 10.11.10-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u204206732_crossfix`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `icon`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Optimum Nutrition', '67224d4f70573_images (3).png', NULL, '2024-10-30 08:44:23', '2024-10-30 08:44:23'),
(2, 'Women’s Best', '67224d6a51f8f_images (4).png', NULL, '2024-10-30 08:44:50', '2024-10-30 08:44:50'),
(5, 'Allmax', '6748a82dccc51_5.စညါ.jpg', NULL, '2024-11-19 08:29:48', '2024-11-28 17:28:13'),
(6, 'Animal', '6748ac005481b_animal_logo.png', NULL, '2024-11-28 17:44:32', '2024-11-28 17:45:57'),
(9, 'BAAM', '67498fc536744_6375e70fd75c5.png', NULL, '2024-11-29 09:56:21', '2024-11-29 09:56:21'),
(10, 'Nutrabio', '6763090b6abf6_nutrabio-labs-inc-logo-vector.png', NULL, '2024-12-18 17:40:27', '2024-12-18 17:40:27'),
(11, 'Xtend', '6763fe6650c95_tWgc3MWB63f3320f152eb_1676882447_420x420.png', NULL, '2024-12-19 11:07:18', '2024-12-19 11:07:18');

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `product_variant_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `user_id`, `session_id`, `product_variant_id`, `qty`, `created_at`, `updated_at`) VALUES
(3, NULL, '0siYDJmt0ftwlx6lpmsX56bHskCiFjE2RSqCGXWE', 1, 1, '2024-12-18 03:26:15', '2024-12-18 03:26:15');

-- --------------------------------------------------------

--
-- Table structure for table `customer_feedback`
--

CREATE TABLE `customer_feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_types`
--

CREATE TABLE `customer_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `f_a_q_s`
--

CREATE TABLE `f_a_q_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `f_a_q_s`
--

INSERT INTO `f_a_q_s` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'Is it safe?', 'Yes, our service is 99.99% safe, however you have to take the RMT into consideration, because the game author company might be taking steps to avoid this kind of service as much as possible. Currently we can state that this is the safest POE shop today, we do the highest level of security pre-cautions in game and in general to avoid issues with the orders.\r\nSo this is considered as safe, as long as you are not talking about your order in the game, and trade back some useless or free items.', '2024-08-20 09:26:08', '2024-08-20 09:26:08'),
(2, 'How do I know if my order is ready?', 'We can prepare the order within a short time. Please just keep online in the game and waiting for the trade. If you are not online in game when we are ready for your order , we will notify you via email to come online for the trade. You can also contact us by live chat to inform us when you are free to get delivery.', '2024-08-20 09:26:22', '2024-08-20 09:26:22'),
(3, 'How can I become a VIP?', 'You can sign up on our website in the upper right corner of the home page with email address or other social methods, you are promoted to the next VIP level by reaching the goal of each rank. Your current rank depends on the number of your total orders and the money you have spent. every rank has different discounts.', '2024-08-20 09:26:37', '2024-08-20 09:26:37'),
(4, 'How do I place my path of exile order?', 'Select Path of Exile platform from the menu and choose your server. Look for the POE items you would like to receive.\r\nBy using the search field, you can find the items faster.\r\nWhen you choose the products, you can add to your shopping cart immediately, which is located under on the top right corner, then you can click on the check-out button.\r\nAt this point, you have to leave your character name and read the notes. After that, you just have to choose from a wide variety of payment methods and complete the purchase.', '2024-08-20 09:26:47', '2024-08-20 09:26:47'),
(5, 'What forms of payment do you accept?', 'We accept a wide variety of payments, including payments via Paypal, Skrill, Visa and Mastercard , and many local payment methods. All of these payment gateways are safe to use. You can find the fees of the different payment methods when checking out. The fee depends on the total amount of payment.', '2024-08-20 09:27:01', '2024-08-20 09:27:01');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `sort` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'banner_image', '66cb4114334e6_202407240905041979 (1).jpg', '2024-08-20 09:11:42', '2024-08-25 08:05:00'),
(2, 'about_image', '671dee4b26368_66c4b9362fc5b_202407240905041979.jpg', '2024-08-20 09:11:42', '2024-10-27 07:39:55'),
(3, 'contact_image', '671dee4b26b76_66c4b9362fc5b_202407240905041979.jpg', '2024-08-20 09:11:42', '2024-10-27 07:39:55'),
(4, 'banner_link', NULL, '2024-08-20 09:11:42', '2024-11-22 08:39:25'),
(5, 'phone_number_1', '09770099006', '2024-08-20 09:11:42', '2024-11-27 17:47:04'),
(6, 'phone_number_2', '09944466611', '2024-08-20 09:11:42', '2024-11-27 17:47:04'),
(7, 'phone_number_3', NULL, '2024-08-20 09:11:42', '2024-08-20 09:11:42'),
(8, 'email_1', 'crossfitfitnessclubmm@gmail.com', '2024-08-20 09:11:42', '2024-11-27 17:47:04'),
(9, 'email_2', NULL, '2024-08-20 09:11:42', '2024-11-22 08:39:25'),
(10, 'email_3', NULL, '2024-08-20 09:11:42', '2024-08-20 09:11:42'),
(11, 'facebook', 'https://crossfitsupplements.net/', '2024-08-20 09:11:42', '2024-11-22 08:39:25'),
(12, 'telegram', 'https://crossfitsupplements.net/', '2024-08-20 09:11:42', '2024-11-22 08:39:25'),
(13, 'discord', 'https://crossfitsupplements.net/', '2024-08-20 09:11:42', '2024-11-22 08:39:25'),
(14, 'about_us', NULL, '2024-08-20 09:11:42', '2024-11-22 08:39:25'),
(15, 'how_to_sell_us', NULL, '2024-08-20 09:11:42', '2024-11-22 08:39:25'),
(16, 'viber', '09763712244', NULL, '2024-11-27 17:47:04'),
(17, 'skype', NULL, NULL, '2024-11-27 17:47:04'),
(18, 'logo', '672094e33a2b5_Crossfit-Logo.png', NULL, '2024-10-29 01:25:15'),
(19, 'contact_us', NULL, '2024-10-25 17:13:35', '2024-11-22 08:39:25'),
(20, 'address', 'No 9/689 , ShwePadar Street , East Dagon  , Yangon.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `goals`
--

CREATE TABLE `goals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `product_category_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `goals`
--

INSERT INTO `goals` (`id`, `name`, `product_category_id`, `created_at`, `updated_at`) VALUES
(9, 'Build Muscle', '2', '2024-11-12 01:36:19', '2024-11-12 01:36:19'),
(10, 'Goal Two', '1', '2024-11-18 07:44:40', '2024-11-18 07:44:40'),
(11, 'Goal Two', '2', '2024-11-18 07:44:40', '2024-11-18 07:44:40');

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
(29, '2014_10_12_000000_create_users_table', 1),
(30, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(31, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(32, '2019_08_19_000000_create_failed_jobs_table', 1),
(33, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(34, '2024_08_17_020015_create_sessions_table', 1),
(35, '2024_08_17_021031_create_permission_tables', 1),
(36, '2024_08_17_021328_create_types_table', 1),
(37, '2024_08_17_021329_create_customer_types_table', 1),
(38, '2024_08_17_021329_create_product_categories_table', 1),
(39, '2024_08_17_021330_create_products_table', 1),
(43, '2024_08_20_135812_create_sub_categories_table', 2),
(44, '2024_08_20_144227_create_general_settings_table', 3),
(45, '2024_08_20_145317_create_f_a_q_s_table', 4),
(46, '2024_09_10_133106_create_payment_methods_table', 5),
(48, '2024_09_11_140712_create_v_i_p_requests_table', 6),
(49, '2024_09_12_132152_create_customer_feedback_table', 7),
(50, '2024_10_28_033441_add_provider_columns_to_users_table', 8),
(51, '2024_10_28_035858_create_product_variants_table', 9),
(52, '2024_10_30_142204_create_brands_table', 10),
(53, '2024_11_01_012137_add_new_column_to_products_and_product_variants_tables', 11),
(54, '2024_08_17_021331_create_cards_table', 12),
(55, '2024_08_17_021331_create_orders_table', 13),
(56, '2024_08_17_021332_create_order_details_table', 13),
(57, '2024_11_12_025218_create_galleries_table', 14),
(58, '2024_11_12_040509_create_goals_table', 15),
(60, '2024_11_12_082329_create_supplies_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 9),
(1, 'App\\Models\\User', 44),
(1, 'App\\Models\\User', 49),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6),
(2, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 11),
(2, 'App\\Models\\User', 12),
(2, 'App\\Models\\User', 14),
(2, 'App\\Models\\User', 15),
(2, 'App\\Models\\User', 17),
(2, 'App\\Models\\User', 18),
(2, 'App\\Models\\User', 19),
(2, 'App\\Models\\User', 20),
(2, 'App\\Models\\User', 21),
(2, 'App\\Models\\User', 22),
(2, 'App\\Models\\User', 23),
(2, 'App\\Models\\User', 24),
(2, 'App\\Models\\User', 25),
(2, 'App\\Models\\User', 26),
(2, 'App\\Models\\User', 27),
(2, 'App\\Models\\User', 28),
(2, 'App\\Models\\User', 29),
(2, 'App\\Models\\User', 30),
(2, 'App\\Models\\User', 31),
(2, 'App\\Models\\User', 33),
(2, 'App\\Models\\User', 34),
(2, 'App\\Models\\User', 35),
(2, 'App\\Models\\User', 36),
(2, 'App\\Models\\User', 37),
(2, 'App\\Models\\User', 38),
(2, 'App\\Models\\User', 39),
(2, 'App\\Models\\User', 40),
(2, 'App\\Models\\User', 41),
(2, 'App\\Models\\User', 42),
(2, 'App\\Models\\User', 43),
(2, 'App\\Models\\User', 45),
(2, 'App\\Models\\User', 46),
(2, 'App\\Models\\User', 47),
(2, 'App\\Models\\User', 48),
(2, 'App\\Models\\User', 50),
(2, 'App\\Models\\User', 51),
(2, 'App\\Models\\User', 52),
(2, 'App\\Models\\User', 53),
(2, 'App\\Models\\User', 54),
(2, 'App\\Models\\User', 55),
(2, 'App\\Models\\User', 58),
(2, 'App\\Models\\User', 59),
(2, 'App\\Models\\User', 60),
(3, 'App\\Models\\User', 57);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_slip` varchar(255) DEFAULT NULL,
  `payment_account_name` varchar(255) DEFAULT NULL,
  `total_price` decimal(8,1) NOT NULL,
  `note` text DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_variant_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(8,1) NOT NULL,
  `discount_type` varchar(255) NOT NULL DEFAULT '0',
  `discount_amount` varchar(255) NOT NULL DEFAULT '0',
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('mscousapex@gmail.com', '$2y$12$prMxJ83ThMCUh/zsc2Yqn.mwM/meuCmK9/JNybXKAGa6s46ystkjG', '2024-11-12 03:28:17'),
('pyaephyoaungktt@gmail.com', '$2y$12$x4VFK01MC7fXWSMNK/Ikc.yK9NtFz5SF22xWu.U90EDGpZJqab1Hu', '2024-10-07 18:09:11'),
('thawzinsoe.dev@gmail.com', '$2y$12$c2fLXh7zgQafYhBCbh4Fp.dOw3t3mkW/DU5QQxivB5lxzzjA3ejMu', '2024-10-27 07:19:07');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `method_name` varchar(255) NOT NULL,
  `account_no` varchar(255) NOT NULL,
  `icon` varchar(225) DEFAULT NULL,
  `account_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `method_name`, `account_no`, `icon`, `account_name`, `created_at`, `updated_at`) VALUES
(1, 'KBZ Pay', '09403077739', '1726587802.png', 'Thaw Zin Soe', '2024-09-10 07:08:52', '2024-09-17 09:13:22'),
(2, 'Wave Money', '09403077739', '1726587821.png', 'Thaw Zin Soe', '2024-09-10 07:09:03', '2024-09-17 09:13:41'),
(8, 'Skrill', 'ppaktt@outlook.com', '1729844501.png', 'Pyae Phyo Aung', '2024-10-25 08:21:41', '2024-10-25 08:21:41');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
  `price` decimal(10,1) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `min_stock` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `short_description` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_type` int(11) NOT NULL DEFAULT 1,
  `pre_order` int(11) NOT NULL DEFAULT 0,
  `discount_type` int(11) NOT NULL DEFAULT 0,
  `discount_amount` int(11) DEFAULT 0,
  `images` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `stock`, `min_stock`, `image`, `category_id`, `sub_category_id`, `brand_id`, `status`, `short_description`, `description`, `created_at`, `updated_at`, `product_type`, `pre_order`, `discount_type`, `discount_amount`, `images`) VALUES
(1, 'Allmax IsoFlex', NULL, 3, NULL, 'product_images/6748ab0b9d23b_ISOFLEX-CH-5lb-MAIN.png', 1, NULL, 5, 1, '<p>Ultra-Pure, Highly Bioavailable Delicious Whey Protein Isolate!</p><ul><li>Scoop lock keeps your scoop from getting buried</li><li>Lab tested &amp; certified</li><li>Protein 100% sourced from Whey</li><li>27g Protein per serving</li></ul>', '<h4><strong>ISOFLEX: TRULY SUPERIOR PROTEIN</strong></h4><p>All new and improved ISOFLEX is the ultimate in taste and the ultimate in quality. Not only does ISOFLEX have a brand new look and great taste, using cutting edge technology, it\'s a pure 100% Whey Protein Isolate. ISOFLEX is significantly lower in lactose, fat, sugar and carbs, compared to regular WPIs too! If you\'re looking for the highest quality, most premium and fastest absorbing protein, then look no further than ISOFLEX; a Truly Superior Whey Protein Isolate.</p><p>ISOFLEX uses a unique protein extraction technology called Hybrid-Ratio Ion-Filtration (HRI). A hybrid of two isolate purification technologies incorporated at a specific ratio to produce a truly superior ultra-pure Whey Protein Isolate. Cutting-Edge HRI Technology allows ISOFLEX t retain an exceptionally high protein yield while maintaining enhanced bioactive whey fractions.</p><p>ISOFLEX contains absolutely NO Whey Concentrate. Concentrates have higher levels of fat and sugars with a lower percentage of protein and lower bioavailability than Isolates. While other brands use Concentrates, ISOFLEX users know that Isolates have a superior protein percentage and won\'t settle for non-Isolate blends.</p><p>That\'s right, 100% Whey Protein Isolate at your fingertips, giving you a whopping 90% protein content! With only Native and Intact, Non-Denatured Whey Protein Fractions. 27g of Pure Protein that has been laboratory tested, certified and approved.</p><p>If you\'re a bodybuilder you know that high levels of protein consumption are critical to success. Most aim for 1.5 to 3 grams of protein per pound of bodyweight daily depending on the intensity and frequency of their training and space their consumption throughout the day. We all know how important it is to get our protein in during that precious anabolic window.</p><p>Because of ISOFLEX\'s high quality pureness you get some of the fastest protein absorption out there with the ultimate amount of amino acids to balance it out. And don\'t forget ZERO fat and ZERO sugar! ISOFLEX mixes well in a shaker cup but can be combined with other ingredients in a blender as a smoothie too. Take ISOFLEX anytime and anywhere you need it.</p><p>ISOFLEX now features SCOOP-LOCK technology. Together we can put an end to the scourge of Scoop Loss.</p><p>Gone are the days of digging through your protein to get your scoop. SCOOP-LOCK is ergonomically designed to lock your scoop into place the first time and every time! And it\'s right there at the top of your ISOFLEX when you open it! Scoop-Lock is available on all ISOFLEX, ALLWHEY Gold, ALLWHEY Classic, and HEXAPRO products and it\'s only from ALLMAX. Look for the rugged new Ergo-Lid on ALLMAX products with Scoop-Lock inside!</p><h4><strong>THE TASTE YOU CRAVE - THE RESULTS YOU DEMAND</strong></h4><p>Don\'t give up taste to get the power of Whey Protein Isolate. The first thing that really sets ISOFLEX apart from any other protein powder on the market is its taste. It tastes amazing! And with eight delicious flavors to choose from, there\'s sure to be one that satisfies your distinct taste buds.</p><p><br>&nbsp;</p>', '2024-11-28 17:38:01', '2024-11-28 17:40:27', 2, 0, 0, 0, '[\"product_images\\/6748ab0b9d497_ISOFLEX-CH-5lb-MAIN.png\"]'),
(2, 'Animal Cuts', 325000.0, 3, NULL, 'product_images/67495ed0baf63_AnimalCuts_Pills_Aug2023_1 (1).png', 4, NULL, 6, 1, '<p>Award-Winning Thermogenic Fat Burner</p><ul><li>8 powerful complexes to support your cutting goals</li><li>Over 40 active ingredients</li><li>Designed to stimulate the metabolism</li><li>Same formula used by pro bodybuilders</li></ul>', '<h2><strong>THERMOGENIC AND METABOLIC COMPLEXES</strong></h2><p>Burn excess fat thermogenically and boost metabolism naturally*</p><h2><strong>NOOTROPIC AND CORTISOL - INHIBITING COMPLEXES</strong></h2><p>Brain boosters for better focus and increased alertness plus reduced stress with patented SerinAid*</p><p><br><strong>DIURETIC AND THYROID SUPPORT AND COMPLEXES</strong></p><p>Cut fat and shed excess water weight without losing pump or muscle size naturally*</p><p><br><strong>APPETITE SUPPRESSANT AND BIOAVAILABILITY COMPLEXES</strong></p><p>Suppresses appetite with CCK boosters plus a delivery system including patented Bioperine*</p><p>&nbsp;</p>', '2024-11-29 06:27:28', '2024-12-09 08:35:35', 1, 0, 0, 0, '[\"product_images\\/67495ed0bb315_AnimalCuts_Pills_Aug2023_1 (1).png\"]'),
(3, 'BAAM Creatine', NULL, 20, NULL, 'product_images/674991808982f_d399ca72f0ab25ffd65a4861e76b6540.png', 5, NULL, 9, 0, '<p><strong>✓</strong>&nbsp; 5 grams of pure Creatine / spoon<br><strong>✓</strong>&nbsp; Small particles (Super Micronized), quick absorption<br><strong>✓</strong>&nbsp; Increase weightlifting force, allowing muscles to work continuously for longer<br><strong>✓</strong>&nbsp; Helps bring water and nutrients into the muscles, making the muscles firm<br><strong>✓</strong>&nbsp; Helps restore and build muscle<br><strong>✓</strong>&nbsp; Helps the nervous system and brain to function at their full potential<br><strong>✓</strong>&nbsp; Free from hazardous substances and prohibited substances in sports<br>&nbsp;</p>', '<p><i><strong>BAAM!! &nbsp;CREATINE MAX ATP x JACK HANMA</strong></i><br>The secret weapon of real weightlifters!! Important<br>&nbsp; &nbsp; &nbsp;amino acids in the body that help create strength when lifting weights, allowing muscles to exert force for a longer time = lift more repetitions and use more weight, resulting in better development of muscle strength and building more muscle. It also helps accelerate recovery and makes muscles firm and tight when used continuously. Most importantly, it tastes good.<i><strong> Use ATP to the MAX!!</strong></i></p>', '2024-11-29 10:03:44', '2024-12-12 03:55:02', 2, 0, 0, 0, '[\"product_images\\/6749918089e06_d399ca72f0ab25ffd65a4861e76b6540.png\"]'),
(5, 'BAAM Ultra Mass', NULL, 12, NULL, 'product_images/67572a059e43f_5677bad773c821cb0750b8bf51de0543.png', 1, NULL, 9, 1, '<p><strong>✓</strong> &nbsp; Energy ~3,400 Kcal*<br><strong>✓</strong> &nbsp; Protein 75 grams, Carbohydrates 763 grams*<br><strong>✓</strong> &nbsp; Fortified with more than 18 types of vitamins and minerals with a solid amount of 70 - 100% RDI !!!!!<br><strong>✓</strong> &nbsp; Helps increase weight and strength during exercise<br><strong>✓</strong> &nbsp; Accelerate muscle building and recovery<br><strong>✓</strong> &nbsp; No harmful substances and banned substances for sports<br><strong>✓</strong> &nbsp; No Amino Spiking, sent for regular lab tests</p>', '<p><i><strong>BAAM!! ULTRA MASS</strong> X <strong>OLIVA</strong></i><br>Heavy weapons for those who want to break free from the original limitations!!<br>&nbsp; &nbsp; &nbsp;<i><strong> Unchain your MASS</strong></i> &nbsp;with the ultimate in weight gain and massive strength with 3,400 Kcal of energy per serving,<br>like eating 6 more meals. Break down all the walls of thin people who want to transform. This is not made for the faint-hearted. So get ready!!</p>', '2024-12-09 17:33:57', '2024-12-19 11:23:29', 2, 0, 0, 0, '[\"product_images\\/67572a37dd951_f7d5eebe6e7b926fbfeb4563ab92d799.png\"]'),
(6, 'BAAM ISO Absolute Zero, 5lb', NULL, 3, NULL, 'product_images/67572becf2897_45d6d2be9a9c7f849d2bb134f55a0f26.png', 1, NULL, 9, 1, '<p>&nbsp; 30 g. of quick-absorbing protein.*<br><strong>✓&nbsp;</strong> &nbsp;Only 130 Kcal.*<br><strong>✓&nbsp;</strong> &nbsp;Sugar 0, Fat 0, &nbsp;Carbohydrates 0, Cholesterol 0*<br><strong>✓</strong>&nbsp; &nbsp;Provides about 6 g. of BCAA, about 5 g. of Glutamine.*<br><strong>✓&nbsp;</strong> &nbsp;Helps repair, restore and build muscle mass<br><strong>. ✓&nbsp;</strong> &nbsp;Helps reduce appetite and sweets.<br><strong>✓&nbsp;</strong> &nbsp;No sugar added. (Use of sweeteners instead)<br><strong>✓&nbsp;</strong> &nbsp;No harmful substances and prohibited substances in sports<br><strong>✓&nbsp;</strong> &nbsp;No Amino Spiking, sent for regular lab testing</p>', '<p><i><strong>BAAM!! &nbsp;ISO ABSOLUTE ZERO X YUCHIRO</strong></i><br>&nbsp; &nbsp; &nbsp;High-purity whey protein isolate For those who want to be the strongest creatures in the world. Through a special process, fat and sugar are<i><strong> 0 = ZERO*.</strong></i> &nbsp;Quick absorption, easy to digest, even those who are lactose intolerant. No diarrhea. Low energy. Focus on building muscle without worrying about excess energy because this formula is for<i><strong> superheroes.</strong></i><br><br>Warning: For the strongest creatures in the world only. Ordinary people, step back.</p>', '2024-12-09 17:42:04', '2024-12-09 17:42:05', 2, 0, 0, 0, '[\"product_images\\/67572becf2cce_45d6d2be9a9c7f849d2bb134f55a0f26.png\",\"product_images\\/67572becf306b_a34c0e9b64bd6b9efa9c9db6205c3fe3.png\",\"product_images\\/67572becf33dc_d0f78a664300ef31d221b52a111d8276.png\"]'),
(8, 'ON Gold Standard 100% Whey', NULL, 3, NULL, 'product_images/6763087d4a1b9_on-1111964_Image_01.png', 1, NULL, 1, 1, '<p>The Standard by Which All Other Whey Proteins are Measured</p><ul><li>Post-workout muscle support &amp; recovery*</li><li>24 grams of protein per serving</li><li>5.5 grams of naturally occurring BCAAs per serving</li><li>The world\'s best-selling whey protein powder</li></ul>', '<h3><strong>Gold Standard 100% Whey</strong></h3><p>Each serving of the world’s best-selling whey protein powder provides 24 grams of high-quality whey protein primarily from Whey Protein Isolate, which has had excess carbohydrates, fat, and lactose ‘isolated’ out using sophisticated filtering technologies. The powder is also instantized for easy mixing using just a glass and spoon. With more than 20 different flavors – including naturally flavored options – there’s no doubt this is the Optimum Nutrition Gold Standard 100% Whey Protein.</p><p><br>&nbsp;</p>', '2024-12-18 17:35:12', '2024-12-18 18:14:38', 2, 0, 0, 0, '[\"product_images\\/6763089cec720_on-1111963_Image_01.png\",\"product_images\\/6763089cec8ea_on-1111963-US_Image_04.png\",\"product_images\\/6763089ceca0e_on-1111964_Image_01.png\",\"product_images\\/6763089cecb44_on-1111964-US_Image_04.png\",\"product_images\\/6763089cecc62_on-gsw-US-flavor_05_DeliciousStrawberry.png\",\"product_images\\/6763089cecd64_on-gsw-US-flavor_05_DoubleRichChoc.png\"]'),
(9, 'Nutrabio Classic Whey, 5lb', NULL, 3, NULL, 'product_images/67630a52be2d8_51041.png', 1, NULL, 10, 1, '<p>Boost your performance with the purest and cleanest Whey Protein Concentrate, providing your muscles with essential nutrients for optimal muscle growth and repair.</p>', '<h2>What you get in every scoop!</h2><ul><li><strong>High Protein:</strong> 25g of high quality whey protein concentrate (WPC80)</li><li><strong>Full-Spectrum Aminos:</strong> 25g of advanced amino acids for muscle repair and growth.</li><li><strong>Low Calories, Carbs, and Fats:</strong> Perfect for lean muscle and weight management.</li><li><strong>Award-Winning Taste:</strong> Delicious flavors that make every shake enjoyable.</li></ul><h2>What is Nutrabio Classic Whey Protein?</h2><p>Classic Whey is our perfectly balanced, premium everyday protein made to provide you with the hgihest quality protein your body deserves. This high-quality, pure whey protein powder serves as the cornerstone of your nutrition regimen, designed to help you achieve your fitness and wellness goals. Made with an unwavering commitment to never compromising, Classic Whey is created using only the highest-grade ingredients, ensuring you get the most out of every scoop. Our dedication to transparency means you know exactly what you\'re putting into your body, with no hidden fillers or additives, making it an unparalleled protein source that\'s both delicious and effective.</p><h2><strong>Why Choose Classic Whey Protein?</strong></h2><h3>MUSCLE GROWTH</h3><p>Whey Protein Concentrate (WPC80) delivers essential nutrients that directly support muscle growth. Packed with a rich amino acid profile, WPC80 helps stimulate protein synthesis, allowing muscles to repair and grow stronger after every workout. With its high-quality protein content, it provides the foundation needed for lean muscle development and sustained growth, making it a key choice for anyone focused on building a stronger, more muscular physique.</p><h3>MUSCLE RECOVERY</h3><p>Research shows that high-quality whey protein, like WPC80, creates an ideal recovery environment by delivering essential amino acids for muscle repair and protein synthesis. With balanced fats and carbs, WPC80 provides a comprehensive profile to accelerate recovery post-workout.</p><h3>FULL TRANSPARENCY</h3><p>Classic Whey Protein is produced in our GMP-certified, FDA-regulated facility, ensuring quality control from start to finish. Every serving of WPC80 is fully dosed, non-GMO, and third-party tested for purity and potency, providing unmatched transparency.</p><p>Each scoop reflects a commitment to integrity, offering protein purity and transparency that sets a new standard in supplement quality.</p>', '2024-12-18 17:45:54', '2024-12-18 17:53:21', 2, 0, 0, 0, '[\"product_images\\/67630c11bede2_fourth-img_cbc50496-c3a8-41b9-864a-07a5d17d8190.png\",\"product_images\\/67630c11bf1c5_third-img_04bec76f-9d8b-424c-81dc-9f239215d986.png\",\"product_images\\/67630c11bf32d_21111_b2830ce0-eb5d-44b1-8f2d-3ba404779727.png\",\"product_images\\/67630c11bf492_51041_34a6bf41-d8a1-463f-aa9d-4b4cb6dd2f51.png\",\"product_images\\/67630c11bf5ee_51051_ff547cfa-06cf-4e54-b4be-4c50d3b48c96.png\"]'),
(10, 'Nutrabio Whey Protein Isolate, 5lb', NULL, 2, NULL, 'product_images/67630b705284d_50022.png', 1, NULL, 10, 1, '<p>High-quality whey protein with a full spectrum of essential amino acids, including BCAAs and glutamine precursors, for fast repair and recovery, in delicious award-winning flavors.</p>', '<p>The cleanest and most delicious whey isolate protein on the planet!</p><ul><li>25g of high biological value isolate protein per scoop</li><li>25g of advanced full-spectrum amino acid profile</li><li>Over 5g of branched-chain amino acids and 4g of glutamine precursors</li><li>Fast-acting whey isolate to support rapid repair and recovery</li><li>Award-winning protein available in delicious flavors</li><li>Unflavored version is available as a versatile source of protein</li></ul><h3>The Cleanest Whey Isolate Available</h3><p>NutraBio 100% Whey Protein Isolate is scientifically designed to provide 25 grams of protein that\'s a clean and pure source of protein derived solely from 100% Whey Protein Isolate — which research has shown to ignite muscle protein synthesis, promote optimal nitrogen retention, and accelerate muscle growth and repair.</p><p>Our high-quality Whey Protein Isolate contains no whey concentrate or other inferior proteins and no amino spiking, added carbs, maltodextrin, dextrose, creamers, or any other fillers — just pure cross-flow ultra-filtered, non-denatured whey isolate protein supplements.</p><h3>Why choose Whey Protein Isolate?</h3><h4>Muscle Growth</h4><p>No other macronutrient is more essential to muscle growth and recovery than protein. Unfortunately, not all whey protein supplements are created equal. The most beneficial and fast-digesting form is whey protein isolate which contains not only branched-chain amino acids but also all the essential amino acids as well. Whey protein isolates are more easily digested and absorbed by the body to help achieve rapid muscle recovery and growth. NutraBio 100% Whey Protein Isolate provides the purest source of protein available (90% whey isolate protein).</p><p>Such a high level of purity can only be achieved through a cold cross-flow micro- and ultra-filtration process that removes the larger, less-absorbable protein molecules while also filtering out fat and lactose. Furthermore, this process does not denature the valuable proteins and peptides in whey, so the protein boost itself is of a higher quality to help further enhance muscle growth.</p><h4>Muscle Recovery</h4><p>Studies suggest ingesting fast-acting protein sources, such as a whey isolate protein powder, can increase amino acid levels in systemic circulation and stimulate robust increases in protein synthesis, arguably the most important physiological factor in existence when it comes to muscle recovery and growth.</p><p>Moreover, since high-quality isolates and the use of an iso protein powder are generally low in carbs, lactose-free, fat-free, cholesterol-free, and gluten-free, it makes it the perfect choice for low-carb dieters, lactose intolerant individuals, or athletes who want to get ripped while packing on muscle. You get no digestive issues compared to inferior protein supplements and better recovery thanks to 25 grams of protein per scoop and all your essential amino acids.</p><h4>Full Transparency</h4><p>Our 100% Whey Protein Isolate is developed in our own GMP-certified and FDA-inspected facility. 99.9% of our competitors can\'t make this claim. We have total control of our whey protein isolate from start to finish. No other protein on the market comes close to providing the level of quality and transparency as NutraBio\'s 100% Whey Protein Isolate.</p><p>NutraBio 100% Whey Protein Isolate has a biological value of 159, protein digestibility of 95, protein efficiency ratio of 3.6, net protein utilization of 92, and a perfect 1.0 PDCAAS (Protein Digestibility Corrected Amino Acid Score). Does your protein powder show this? If not, what are they hiding from you?</p><h4>Award-Winning Accolades</h4><p>We like to have our products do the talking for us, and when it comes to gaining the respect of our peers and customers, NutraBio Whey Protein Isolate is no stranger to taking home awards.</p><p>NutraBio Whey Protein Isolate has been \"Tiger Tested &amp; Approved\" by TigerFitness.com, has been awarded the Protein Wars \"People\'s #1 Protein\" voted on by consumers multiple years through Stack3D, has been rated the \"#1 Most Effective Whey Protein\" according to SupplementReviews.com as well as receiving their \"#1 Overall Whey Protein\" award.</p>', '2024-12-18 17:50:40', '2024-12-18 17:55:06', 2, 0, 0, 0, '[\"product_images\\/67630b7052a38_50022_4ffc15be-057f-46e4-89ba-1677d0c19028.png\",\"product_images\\/67630b7052b87_26982_418dc58f-fcc3-4e7a-9258-5ec139e2ecab.png\",\"product_images\\/67630b7052cb7_fourth-img_cbc50496-c3a8-41b9-864a-07a5d17d8190.png\",\"product_images\\/67630b7052db6_third-img_04bec76f-9d8b-424c-81dc-9f239215d986.png\"]'),
(11, 'Allmax Micronized Creatine Monohydrate, 400g', 165000.0, 1, NULL, 'product_images/67630d922e6a7_CREATINE-400G-US1022-main.png', 5, NULL, 5, 1, '<p>Pure Creatine Monohydrate Made With CreaMAX Technology!</p><ul><li>100% pure micronized German creatine</li><li>Gluten free, vegan, kosher certified ingredients</li><li>Made in a cGMP registered facility</li><li>Created using CreaMax technology</li></ul>', '<h4><strong>100% PURE MICRONIZED CREATINE*</strong></h4><ul><li><strong>100% Pure Micronized highest grade Creatine!*</strong></li><li><strong>Improves Performance in Short-Burst, High Intensity Training!*</strong></li><li><strong>The World’s Most Studied and Proven Supplement!*</strong></li></ul><p>Creatine Monohydrate is the most heavily researched and time-tested sports nutrition supplement in the world. Creatine can lead to a gain in lean muscle mass, improve workout performance, and significant enhancement in strength and power. It also offers therapeutic benefits, including the prevention of ATP depletion, stimulation of protein synthesis and cell volumization.*</p><h4><strong>WHAT IS CREATINE?</strong></h4><p>Creatine is a nitrogenous compound that occurs naturally in the body and helps to supply energy to all cells in the body, primarily muscle cells. Creatine is a quickly available source of energy for muscle contractions used to enhance athletic performance. Creatine has been shown to increase maximal strength and endurance by as much as 15% and up to 30% in power output and energy release in short-burst/interval sports like football, hockey, baseball, soccer and weight lifting; anything that requires intense bursts of speed and power.*</p><h4><strong>HOW DOES CREATINE WORK?</strong></h4><p>Inside the muscle, creatine bonds to a phosphate molecule to produce phosphocreatine, an important factor in the recycling of Adenoside TriPhosphate or ATP. Phosphocreatine donates a phosphate molecule to ADP to create ATP, the primary source of energy for muscle contraction, as well as other bodily functions.*</p><p>The increase in additional energy to the working muscles can lead to enhanced strength and power, improving overall workout performance and increase gains in lean muscle mass. Creatine not only helps the muscle endure long-lasting, more intense training sessions, it also helps to increase muscle recovery rate.*</p><p><br><strong>BETTER PUMPS</strong></p><p>A quick look at the underlying physiology of reactive hyperemia, or “the pump” suggests that blood flow to the area is critical. Muscle fullness or cell volumization is directly linked to the growth of the muscle. Expand the cell, expand and grow the muscle. Intramuscular Creatine enhancement works to deliver better pumps and makes muscles fuller.*</p><h4><strong>BETTER DIET</strong></h4><p>During the fat loss phase of a training plan when you are typically lowering your carbohydrates while aiming for weight loss, supplementing with Creatine will help keep your performance levels high. By adding creatine to your daily supplementation you can help offset the fatigue of dieting and maintain higher levels of strength output and ultimately, muscle growth.*</p><h4><strong>THE ALLMAX DIFFERENCE</strong></h4><p>ALLMAX Nutrition Essentials Creatine is micronized to microparticulate each particle to ensure an ultra-fine Creatine powder that is easy to mix in virtually any liquid. Our Creatine is the purest and highest grade Creatine monohydrate to give you the world-class results that Creatine is renowned for. ALLMAX uses cGMP manufacturing processes and employs the ALLMAX 5-Stage Quality Guarantee to provide you with the ultimate in purity, quality and effectiveness.*</p>', '2024-12-18 17:59:46', '2024-12-18 17:59:46', 1, 0, 0, 0, '[\"product_images\\/67630d922e869_CREATINE-400G-US1022-main.png\"]'),
(12, 'ON Amino Energy', NULL, 2, NULL, 'product_images/6763fdca6c6d2_on-1122232_Image_01.png', 2, NULL, 1, 1, '<p>Anytime Energy &amp; Muscle Recovery*</p><ul><li>Helps build muscle with BCAAs &amp; amino acids</li><li>100mg of caffeine from coffee bean and/or tea leaf</li><li>5 grams of amino acids per serving</li><li>5 to 10 calories per serving with zero sugar</li></ul>', '<p>Mix up ESSENTIAL AMIN.O. ENERGY anytime you want a boost of energy, focus and muscle recovery support. Each serving provides 100 mg of caffeine from natural sources to support energy and focus along with 5 grams of amino acids for muscle support.*</p><h3><strong>Beyond The Basics:</strong></h3><ul><li>100 mg of Caffeine per Serving from Coffee Bean and/or Tea Leaf</li><li>5 Grams of Amino Acids per Serving for Muscle Recovery Support*</li><li>5 to 10 Calories Per Serving with Zero Sugar</li><li>Essential Amino Acid Delivery*</li><li>Supports Energy, Focus &amp; Muscle Support*</li></ul><p><br>&nbsp;</p>', '2024-12-19 11:04:42', '2024-12-19 11:04:42', 2, 0, 0, 0, '[\"product_images\\/6763fdca6c9ba_Screen Shot 2024-12-19 at 5.33.46 PM.png\"]'),
(13, 'Xtend Original', NULL, 2, NULL, 'product_images/6763ff5359082_xtend-original-30-br.png', 2, NULL, 11, 1, '<p>Formulated to Support Muscle Recovery and Hydration*</p><ul><li>Hydrate: XTEND contains essential blends of electrolytes</li><li>Repair &amp; recover*: 7G of BCAAs in clinically studied ratios per serving</li><li>Incredible taste and contains zero sugar, calories, or carbs.</li><li>The OG: the BCAA that started it all!</li></ul>', '<p>XTEND Original contains 7 g of BCAAs, hydrating electrolytes and other performance ingredients to maximize your recovery, replenishment, and repair.*</p><p>Every XTEND product is powered by a cutting-edge mix of BCAAs, goal-based performance ingredients, and hydrating electrolytes to help you refuel, repair, and recover unlike anything else on the market. XTEND is the best for a reason: it’s delicious, sugar-free, and trusted by athletes, lifters, and champions around the globe.*</p><p>&nbsp;</p><h3><strong>KEY INGREDIENTS:</strong></h3><p>&nbsp;</p><ul><li>7g of Branched Chain Amino Acids (BCAAs) in the clinically studied 2:1:1 ratio</li><li>A replenishing electrolyte blend to support hydration*</li><li>3.5g of Leucine to support muscle protein synthesis*</li><li>2.5g Glutamine</li><li>0 sugar per serving</li><li>&nbsp;</li></ul>', '2024-12-19 11:11:15', '2024-12-19 11:11:15', 2, 0, 0, 0, '[\"product_images\\/6763ff53594b1_81M34_tP6FL._AC_SL1500.png\"]'),
(14, 'Xtend EAA', NULL, 3, NULL, 'product_images/676401dc26373_XTEND_0222_P4_Digital_CampaignAssets_Ecomm_PDP_EAA_January2024-BO-Render_1.png', 2, NULL, 11, 1, '<p>Enhance Athletic Recovery with XTEND EAAs</p><ul><li>9 Essential Amino Acids</li><li>Enhance Athletic Recovery*</li><li>Build and Preserve Lean Muscle*</li><li>America’s #1 BCAA Brand</li></ul>', '<h2><strong>GROW, PRESERVE, RECOVER</strong></h2><p>Build and Preserve Lean Mass with XTEND Essential Amino Acids.</p><p>Enhance athletic recovery with XTEND EAAs – crafted with all 9 essential amino acids for a complete protein source, XTEND EAAS are a simple way to get a full suite of aminos to help grow muscle mass. Elevate your routine with zero sugar and a variety of delightful, sugar-free flavors.*</p><h2><strong>XTEND EAAS: UNLEASH MUSCLE POWER!</strong></h2><p>Revolutionize Muscle Growth + Recovery with Essential Amino Acids</p><h4><strong>9 Essential Amino Acid Blend:</strong></h4><ul><li>L-Leucine 1.5g</li><li>L-Isoleucine 750mg</li><li>L-Valine 750mg</li><li>L-Threonine 750mg</li><li>L-Lysine Hydrochloride 650mg</li><li>L-Arginine 250mg</li><li>L-Phenylalanine 200mg</li><li>L-Tryptophan 100mg</li><li>L-Histidine 25mg</li><li>L-Methionine 25mg</li></ul>', '2024-12-19 11:22:04', '2024-12-19 11:22:04', 2, 0, 0, 0, '[\"product_images\\/676401dc266b8_XTEND_0222_P4_Digital_CampaignAssets_Ecomm_PDP_EAA_January2024-BO-Panel.png\"]');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `icon`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Protein', NULL, NULL, '2024-10-31 23:07:12', '2024-10-31 23:07:12'),
(2, 'BCAA/Amino', NULL, NULL, '2024-11-19 08:25:35', '2024-11-19 08:25:35'),
(4, 'Fat Burner', NULL, NULL, '2024-11-28 17:46:46', '2024-11-28 17:46:46'),
(5, 'Creatine', NULL, NULL, '2024-11-29 06:40:01', '2024-11-29 09:57:11');

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_name` varchar(255) DEFAULT NULL,
  `attribute_value` varchar(255) DEFAULT NULL,
  `price` decimal(8,1) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `discount_type` int(11) DEFAULT 0,
  `discount_amount` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `attribute_name`, `attribute_value`, `price`, `stock`, `image`, `status`, `created_at`, `updated_at`, `discount_type`, `discount_amount`) VALUES
(1, 1, 'Chocolate', '5lb', 475000.0, 3, 'product_images/6748aae998d07_ISOFLEX-CH-5lb-MAIN.png', 1, '2024-11-28 17:38:01', '2024-11-28 17:39:53', 0, 0),
(2, 2, NULL, NULL, 325000.0, 3, 'product_images/67495ed0baf63_AnimalCuts_Pills_Aug2023_1 (1).png', 1, '2024-11-29 06:27:28', '2024-12-09 08:35:35', 0, 0),
(3, 3, '300g(46 Servings)', 'Juicy Watermelon', 73000.0, 10, 'product_images/674991808aaa3_d399ca72f0ab25ffd65a4861e76b6540.png', 0, '2024-11-29 10:03:44', '2024-12-11 18:45:29', 0, 0),
(4, 3, '300g(46 Servings)', 'Frosty Blue Raspberry', 73000.0, 10, 'product_images/674991808c16a_6b06d5e9eb360935e56fd050cab6573f.png', 0, '2024-11-29 10:03:44', '2024-12-11 18:45:34', 0, 0),
(9, 5, '6lb', 'King Kong Chocolate', 137000.0, 5, 'product_images/67572a059f733_5677bad773c821cb0750b8bf51de0543.png', 1, '2024-12-09 17:33:57', '2024-12-09 17:33:57', 0, 0),
(10, 5, '6lb', 'Kaiju Vanilla', 137000.0, 5, 'product_images/67572a05a0871_f7d5eebe6e7b926fbfeb4563ab92d799.png', 1, '2024-12-09 17:33:57', '2024-12-09 17:33:57', 0, 0),
(11, 6, '5lb', 'Fantasy Strawberry Milkshake(8/27)', 365000.0, 1, 'product_images/67572becf3eb4_45d6d2be9a9c7f849d2bb134f55a0f26.png', 0, '2024-12-09 17:42:05', '2024-12-10 08:57:58', 0, 0),
(12, 6, '5lb', 'Bliss Vanilla Ice Cream(8/27)', 365000.0, 1, 'product_images/67572bed00f9e_a34c0e9b64bd6b9efa9c9db6205c3fe3.png', 1, '2024-12-09 17:42:05', '2024-12-09 17:42:05', 0, 0),
(13, 6, '5lb', 'Chocolate(8/27)', 365000.0, 1, 'product_images/67572bed0194d_d0f78a664300ef31d221b52a111d8276.png', 1, '2024-12-09 17:42:05', '2024-12-09 17:42:05', 0, 0),
(16, 8, '5lb', 'Double Rich Chocolate', 375000.0, 1, 'product_images/676307d09e466_on-1111964_Image_01.png', 1, '2024-12-18 17:35:12', '2024-12-18 18:10:57', 0, 0),
(17, 8, '5lb', 'Delicious Strawberry(6/26)', 375000.0, 1, 'product_images/1734543423_6763083f9b7a3.png', 1, '2024-12-18 17:37:03', '2024-12-18 18:11:12', 0, 0),
(18, 9, '5lb', 'Chocolate Milkshake(4/26)', 365000.0, 1, 'product_images/67630a52bf2c6_51041.png', 1, '2024-12-18 17:45:54', '2024-12-18 17:52:13', 0, 0),
(19, 9, '5lb', 'Strawberry Shortcake(3/26)', 365000.0, 1, 'product_images/67630a52c0572_21111.png', 1, '2024-12-18 17:45:54', '2024-12-18 17:52:20', 0, 0),
(20, 9, '5lb', 'Creamy Vanilla(3/26)', 365000.0, 1, 'product_images/67630a52c0d06_51051_d0410a47-660e-4f95-b8a3-92ec096e6953.png', 1, '2024-12-18 17:45:54', '2024-12-18 17:52:31', 0, 0),
(21, 10, '5lb', 'Strawberry Ice Cream(5/26)', 445000.0, 1, 'product_images/67630b7053fe7_50022.png', 1, '2024-12-18 17:50:40', '2024-12-18 17:50:40', 0, 0),
(22, 10, '5lb', 'Blueberry Muffin(2/26)', 445000.0, 1, 'product_images/67630b7054a5c_26982.png', 1, '2024-12-18 17:50:40', '2024-12-18 17:51:26', 0, 0),
(23, 11, NULL, NULL, 165000.0, 1, 'product_images/67630d922e6a7_CREATINE-400G-US1022-main.png', 1, '2024-12-18 17:59:46', '2024-12-18 17:59:46', 0, 0),
(24, 8, '2lb', 'Double Rich Chocolate', 235000.0, 1, 'product_images/1734545106_67630ed27faa4.png', 1, '2024-12-18 18:05:06', '2024-12-18 18:11:22', 0, 0),
(25, 5, '20lb', 'King Kong Chocolate', 399000.0, 1, 'product_images/1734602382_6763ee8ec60c7.png', 1, '2024-12-19 09:59:42', '2024-12-19 09:59:42', 0, NULL),
(26, 5, '20lb', 'Kaiju Vanilla', 399000.0, 1, 'product_images/1734602435_6763eec3a1091.png', 1, '2024-12-19 10:00:35', '2024-12-19 10:00:35', 0, NULL),
(27, 12, '30 Servings', 'Blue Raspberry(5/26)', 149000.0, 1, 'product_images/6763fdca6d58e_on-1132800_Image_01.png', 1, '2024-12-19 11:04:42', '2024-12-19 11:05:27', 0, 0),
(28, 12, '30 Servings', 'Green Apple(4/26)', 149000.0, 1, 'product_images/6763fdca6df6d_on-1122232_Image_01.png', 1, '2024-12-19 11:04:42', '2024-12-19 11:05:41', 0, 0),
(29, 13, '30 Servings', 'Blue Raspberry Ice(5/26)', 155000.0, 1, 'product_images/6763ff5359df8_xtend-original-30-br.png', 1, '2024-12-19 11:11:15', '2024-12-19 11:11:15', 0, 0),
(30, 13, '30 Servings', 'Smash Apple(6/26)', 155000.0, 1, 'product_images/6763ff535a820_xtend-original-30-sa.png', 1, '2024-12-19 11:11:15', '2024-12-19 11:11:15', 0, 0),
(31, 14, '40 Servings', 'Mango(1/26)', 149000.0, 1, 'product_images/676401dc27e19_XTEND_0222_P4_Digital_CampaignAssets_Ecomm_PDP_EAA_January2024-MM-Render.png', 1, '2024-12-19 11:22:04', '2024-12-19 11:22:04', 0, 0),
(32, 14, '40 Servings', 'Lemon Lime(1/26)', 149000.0, 1, 'product_images/676401dc29324_XTEND_0222_P4_Digital_CampaignAssets_Ecomm_PDP_EAA_January2024-LL-Render.png', 1, '2024-12-19 11:22:04', '2024-12-19 11:22:04', 0, 0),
(33, 14, '40 Servings', 'Blood Orange(1/26)', 149000.0, 1, 'product_images/676401dc29c79_XTEND_0222_P4_Digital_CampaignAssets_Ecomm_PDP_EAA_January2024-BO-Render_1.png', 1, '2024-12-19 11:22:04', '2024-12-19 11:22:04', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2024-08-19 07:15:19', '2024-08-19 07:15:19'),
(2, 'Customer', 'web', '2024-08-19 07:15:19', '2024-08-19 07:15:19'),
(3, 'Manager', 'web', '2024-08-19 07:15:19', '2024-08-19 07:15:19');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('2IY47aZr4Wic0iiHhonNPwwvqfjt0pByGeLuXSL8', NULL, '111.231.10.88', 'Mozilla/5.0 (Linux; Android 10; LIO-AN00 Build/HUAWEILIO-AN00; wv) MicroMessenger Weixin QQ AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/78.0.3904.62 XWEB/2692 MMWEBSDK/200901 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOTZQYmJzWVQ5UUcxN3NnbUs2U01mWnc3a01qTnJZUjU2R2VWY0N5SCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vY3Jvc3NmaXRzdXBwbGVtZW50cy5uZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735053653),
('2mOJSLa5NvIh750CNJLSPuRr08CDqyj4uP7maiec', NULL, '2a02:4780:3:8::7', 'Go-http-client/2.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidG1MMjUxOFc4MUl4cnhyM2V2Z0hyR0h0YjRkQ1hhSTI5Z253ZzFYSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vY3Jvc3NmaXRzdXBwbGVtZW50cy5uZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735087660),
('6DsS9Eusi2MNqzwVBEmSP7iHUqhJuZi2ZnoZfUzp', NULL, '2001:41d0:303:374::1', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaXY2eEhjNW9DbVQ0UDRlMDVHMlJSdFRKNFhyNVI1UjE3UmUyRDBYNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHBzOi8vd3d3LmNyb3NzZml0c3VwcGxlbWVudHMubmV0L3Byb2R1Y3RzLzgvZGV0YWlsIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1735050707),
('9Rh44fHqCNWbXKmPpmJ5RWRO0AXB5HDPB3mhnJN1', NULL, '2001:41d0:303:374::1', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR0MyeUw2YWd5NEdsamw0UkpNSW42dTFmOW9NNDBtaGczUk1uMzZOVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHBzOi8vd3d3LmNyb3NzZml0c3VwcGxlbWVudHMubmV0L3Byb2R1Y3RzLzEzL2RldGFpbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735050702),
('bFf6CNNDCLFCm8w8vMjFfEyV3mXJkxGYqtrfsVfV', NULL, '2001:41d0:303:374::1', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidUxZaGNyeHVrUGhJZHRSV0xTTjRDbURFUW1pNmRkOGVEZGxXZTRuMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHBzOi8vd3d3LmNyb3NzZml0c3VwcGxlbWVudHMubmV0L3Byb2R1Y3RzLzEwL2RldGFpbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735050693),
('BVAF238Fc9CWxDxm8n4BA4qznfUk1MnOB1K6rUg0', NULL, '104.248.236.94', 'Mozilla/5.0 (compatible)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUDhjWDV5ZjdOZlZxTzZ2eUlKTFZEeW9hSkRTQ3ZaVUFWYTQ4UUtKYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vY3Jvc3NmaXRzdXBwbGVtZW50cy5uZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735067703),
('fFqRVwHHOEC5wGbh8xoiPnpxK8sBpMYO1OzE8oLN', NULL, '2001:41d0:303:374::1', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSnkyVGVwNzFLR2M2ZEtTUjlZZW4yaGdkRGpVNFRHemp5RWhCOG1rQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHBzOi8vd3d3LmNyb3NzZml0c3VwcGxlbWVudHMubmV0L3Byb2R1Y3RzLzE0L2RldGFpbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735050705),
('FQFg0IFEYyC24XXFwH0RDBSop3J9RrQDBiBEbEJ5', NULL, '2001:41d0:303:374::1', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQVE0TzdiNGU5NlB3ZnM5N1Ztc1dXalo2WmtrT3lOWkk2d1lqek8wUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHBzOi8vd3d3LmNyb3NzZml0c3VwcGxlbWVudHMubmV0L3Byb2R1Y3RzLzExL2RldGFpbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735050696),
('gnZ806iASkKGbvkyMpNLNXG62Vmawwmef9o8cnQt', NULL, '2001:41d0:303:374::1', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaUR6cm03RU9nSFlWd1RrS21ZS05XdFVJUGN2ZFRxdThob2tUYWNrZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHBzOi8vd3d3LmNyb3NzZml0c3VwcGxlbWVudHMubmV0L3Byb2R1Y3RzLzEyL2RldGFpbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735050699),
('hZEVg4tLXfbLY0rbWZsxpNidhtYrj58zGNNDN1hs', NULL, '49.245.53.23', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_1_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.1.1 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieUxjb0g4eDdBWVRPY3poWGVxeFA4bkR0eE1zU2xkMFlwdGc5amRCQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHBzOi8vY3Jvc3NmaXRzdXBwbGVtZW50cy5uZXQvcHJvZHVjdHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735024431),
('J6IQFNToYZpVEeKjTOKNiKzypaXWZor7aoObdV0a', NULL, '46.17.174.172', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:98.0) Gecko/20100101 Firefox/98.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibFNSaG93U1h4cEd0Y3p2bG5JWjNoZjdFOHE5UWIyUXB2cElqU1E3ayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vY3Jvc3NmaXRzdXBwbGVtZW50cy5uZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735061908),
('L6Rk3nZ0fSLLtSmgmg6TMuzlvAJutWLilGcaaoLr', NULL, '207.46.13.87', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZUZZY3lRbm1JMTFDZWN4ZVVJc0M1UXhaeFlHZWRKUWJYT0Y3S2V3TSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vd3d3LmNyb3NzZml0c3VwcGxlbWVudHMubmV0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1735031512),
('LLZcROXndpuswXXm4p2aZfWiqJXSVJ5Hpe5uI5hM', NULL, '111.231.10.88', 'Mozilla/5.0 (Linux; Android 10; LIO-AN00 Build/HUAWEILIO-AN00; wv) MicroMessenger Weixin QQ AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/78.0.3904.62 XWEB/2692 MMWEBSDK/200901 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic29UdDFaV3IzN1VmYW9UZW9HbDJYanZjWnhVWUxqeGtFbXprVjdCUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vY3Jvc3NmaXRzdXBwbGVtZW50cy5uZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735053998),
('OOHmf88Hq2dKGPAon9rjDy8FM93jLJvQ4SCunX7b', NULL, '2a0b:4140:3679::2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTUZHUDE2ZkhPSmlNN2FoWlhoSVc0dVJmcUFnc2k5Ulo1UDdCOE12VSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vY3Jvc3NmaXRzdXBwbGVtZW50cy5uZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735017519),
('qjHYC9lQDOp5qndIWEh3Fo6nYbFIp7T3PTAhgeXZ', NULL, '170.106.184.100', 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.4 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiejViWFB3MmlmamhkNGtwSjU1QmNCa2dCMko3MGw2UDY5dWVoMUw3YyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vd3d3LmNyb3NzZml0c3VwcGxlbWVudHMubmV0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1735073863),
('r4MJlSDNMgiIrQLDGelUWwfoE4CgpeYFD6OsEJjy', NULL, '2001:41d0:303:374::1', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicGt2RkxkQlBjZHRvOVdSNWlhVUNnUE9JVjk5dWhSY0M5Z1BXbE00dyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHBzOi8vd3d3LmNyb3NzZml0c3VwcGxlbWVudHMubmV0L3Byb2R1Y3RzLzkvZGV0YWlsIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1735050710),
('rdq8Hozv40OMmrXeD1a1XtPLEDGDcSPg4qbjcIDe', NULL, '2001:bc8:17c0:50f:2247:47ff:fe86:94ec', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.3', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRFRuQ0x4cndUdWtlREdmYnBQdk40WGt2SmxtS1BIR1FldWJIRmVSTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vY3Jvc3NmaXRzdXBwbGVtZW50cy5uZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735040459),
('Rxqax5zhfJd3qN95JFT5JHYzwoKKCQqDSiH4G3mv', NULL, '111.231.10.88', 'Mozilla/5.0 (Linux; Android 10; LIO-AN00 Build/HUAWEILIO-AN00; wv) MicroMessenger Weixin QQ AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/78.0.3904.62 XWEB/2692 MMWEBSDK/200901 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR0MyY0h4Mk1nbGhUNkdKZmJDejVnMVo4YXVLUk9VQVlGbHhMbkZ4YyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vY3Jvc3NmaXRzdXBwbGVtZW50cy5uZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735053974),
('S2ZpoFjCM58OjYFayYR1I62jEZnU8ufUY14Os4MO', NULL, '66.249.64.11', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.6778.139 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQzZjZ3RlSHlGeXpXaWVENmd3d3pZdFhOZnFteUV4N2U2cjlQeTEweSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHBzOi8vY3Jvc3NmaXRzdXBwbGVtZW50cy5uZXQvcHJlX29yZGVyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1735084846),
('S6Nbbg1l6Iw0Hf3EIW6b9ZF9wbq1Ev5lg1MzznkF', NULL, '40.77.167.131', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUVZhVlZqWVp4MFVhdDl3ZHFhV0ZlVHRjb3RUbXMzTHRDT0J6dzRGRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHBzOi8vd3d3LmNyb3NzZml0c3VwcGxlbWVudHMubmV0L2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1735031542),
('volw4WdQNFmiBJjf0vMHE7GdsYRqZNDJe0ukmnQf', NULL, '116.15.117.4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicXdRTzl1dkhLcFF1UG9ZaTFGanhPektUc1hiQ0VPbzZNd21pdFUwSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vY3Jvc3NmaXRzdXBwbGVtZW50cy5uZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735026017),
('Wnfc09Hf0t26C25ozW0VlxuVQKCeEPAPLW5HaCOx', NULL, '195.191.219.130', 'Mozilla/5.0 (compatible; MJ12bot/v1.4.8; http://mj12bot.com/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaVY3eFhrNVZzYlhDVndWQXV5MFFJb3hZOVVmS2FYYlNxMFo1RTBlQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vd3d3LmNyb3NzZml0c3VwcGxlbWVudHMubmV0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1735032159),
('XeBlA8G5YaKEMqEjwcexvpA8kD9hnp0xUNiFE2TC', NULL, '111.231.10.88', 'Mozilla/5.0 (Linux; Android 10; LIO-AN00 Build/HUAWEILIO-AN00; wv) MicroMessenger Weixin QQ AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/78.0.3904.62 XWEB/2692 MMWEBSDK/200901 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVjZ5M3cyOU1OMDZaUUxnYUxHSEh4SkJZQmNnTFI5UzJZU05wZ1dmaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vY3Jvc3NmaXRzdXBwbGVtZW50cy5uZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735053971),
('Z9wJYBQEMfp2ttSoNLAnjt1ii8n7EkiX9ySb6s1c', NULL, '182.42.105.85', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieXZzZXpFZTZqQnl5UExjVmI0c2NzekRvelpBNUlka2I2M3RrNjlyaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vY3Jvc3NmaXRzdXBwbGVtZW50cy5uZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735088988);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

CREATE TABLE `supplies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `varaint_product_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`id`, `product_id`, `varaint_product_id`, `type`, `qty`, `description`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 3, 'Product Create', '2024-11-28 00:00:00', '2024-11-28 17:38:01', '2024-11-28 17:38:01'),
(2, 2, 2, 1, 3, 'Product Create', '2024-11-29 00:00:00', '2024-11-29 06:27:28', '2024-11-29 06:27:28'),
(3, 3, 3, 1, 10, 'Product Create', '2024-11-29 00:00:00', '2024-11-29 10:03:44', '2024-11-29 10:03:44'),
(4, 3, 4, 1, 10, 'Product Create', '2024-11-29 00:00:00', '2024-11-29 10:03:44', '2024-11-29 10:03:44'),
(8, 8, 8, 1, 2, 'Product Create', '2024-11-29 00:00:00', '2024-11-29 10:48:35', '2024-11-29 10:48:35'),
(9, 5, 9, 1, 5, 'Product Create', '2024-12-09 00:00:00', '2024-12-09 17:33:57', '2024-12-09 17:33:57'),
(10, 5, 10, 1, 5, 'Product Create', '2024-12-09 00:00:00', '2024-12-09 17:33:57', '2024-12-09 17:33:57'),
(11, 6, 11, 1, 1, 'Product Create', '2024-12-09 00:00:00', '2024-12-09 17:42:05', '2024-12-09 17:42:05'),
(12, 6, 12, 1, 1, 'Product Create', '2024-12-09 00:00:00', '2024-12-09 17:42:05', '2024-12-09 17:42:05'),
(13, 6, 13, 1, 1, 'Product Create', '2024-12-09 00:00:00', '2024-12-09 17:42:05', '2024-12-09 17:42:05'),
(16, 8, 16, 1, 1, 'Product Create', '2024-12-18 00:00:00', '2024-12-18 17:35:12', '2024-12-18 17:35:12'),
(17, 17, 17, 1, 1, 'Product Create', '2024-12-18 00:00:00', '2024-12-18 17:37:03', '2024-12-18 17:37:03'),
(18, 9, 18, 1, 1, 'Product Create', '2024-12-18 00:00:00', '2024-12-18 17:45:54', '2024-12-18 17:45:54'),
(19, 9, 19, 1, 1, 'Product Create', '2024-12-18 00:00:00', '2024-12-18 17:45:54', '2024-12-18 17:45:54'),
(20, 9, 20, 1, 1, 'Product Create', '2024-12-18 00:00:00', '2024-12-18 17:45:54', '2024-12-18 17:45:54'),
(21, 10, 21, 1, 1, 'Product Create', '2024-12-18 00:00:00', '2024-12-18 17:50:40', '2024-12-18 17:50:40'),
(22, 10, 22, 1, 1, 'Product Create', '2024-12-18 00:00:00', '2024-12-18 17:50:40', '2024-12-18 17:50:40'),
(23, 11, 23, 1, 1, 'Product Create', '2024-12-18 00:00:00', '2024-12-18 17:59:46', '2024-12-18 17:59:46'),
(24, 24, 24, 1, 1, 'Product Create', '2024-12-18 00:00:00', '2024-12-18 18:05:06', '2024-12-18 18:05:06'),
(25, 25, 25, 1, 1, 'Product Create', '2024-12-19 00:00:00', '2024-12-19 09:59:42', '2024-12-19 09:59:42'),
(26, 26, 26, 1, 1, 'Product Create', '2024-12-19 00:00:00', '2024-12-19 10:00:35', '2024-12-19 10:00:35'),
(27, 12, 27, 1, 1, 'Product Create', '2024-12-19 00:00:00', '2024-12-19 11:04:42', '2024-12-19 11:04:42'),
(28, 12, 28, 1, 1, 'Product Create', '2024-12-19 00:00:00', '2024-12-19 11:04:42', '2024-12-19 11:04:42'),
(29, 13, 29, 1, 1, 'Product Create', '2024-12-19 00:00:00', '2024-12-19 11:11:15', '2024-12-19 11:11:15'),
(30, 13, 30, 1, 1, 'Product Create', '2024-12-19 00:00:00', '2024-12-19 11:11:15', '2024-12-19 11:11:15'),
(31, 14, 31, 1, 1, 'Product Create', '2024-12-19 00:00:00', '2024-12-19 11:22:04', '2024-12-19 11:22:04'),
(32, 14, 32, 1, 1, 'Product Create', '2024-12-19 00:00:00', '2024-12-19 11:22:04', '2024-12-19 11:22:04'),
(33, 14, 33, 1, 1, 'Product Create', '2024-12-19 00:00:00', '2024-12-19 11:22:04', '2024-12-19 11:22:04');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `discount_amount` decimal(8,2) NOT NULL,
  `amount_limit` varchar(225) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `icon`, `discount_amount`, `amount_limit`, `created_at`, `updated_at`) VALUES
(1, 'Gold', 'icons/7Xr1E3TXDX.png', 5.00, '1000', '2024-08-19 07:15:19', '2024-10-01 07:29:44'),
(2, 'Silver', 'icons/HQ6lDyN8wh.png', 3.00, '500', '2024-08-19 07:15:19', '2024-10-01 07:29:14'),
(3, 'Diamonds', 'icons/NgCUTUgd0m.png', 10.00, '3000', '2024-08-19 09:14:08', '2024-10-01 07:30:04'),
(6, 'Super', 'icons/wUR29uz2hy.png', 20.00, '15000', '2024-09-24 07:19:25', '2024-09-24 07:23:58'),
(7, 'Normal', 'icons/MwWQRXkgcL.jfif', 0.00, '0', '2024-10-01 07:28:41', '2024-10-01 07:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(225) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 2,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `provider_name` varchar(255) DEFAULT NULL,
  `provider_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `role`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `provider_name`, `provider_id`) VALUES
(1, 'Admin User', 'admin@example.com', '', NULL, '$2y$12$mlM1loNcGVh6jJuQI4IzIeznF5QNHY1Ta1O910Qkqm/aFcbFw6IVi', NULL, NULL, NULL, 1, '4a8bEr0qMxiu2zTEmuRM3TteV9O8SdJyh6xfrNiHyA3a8qyA7i4ojXD5vPiJ', NULL, NULL, '2024-08-19 07:15:20', '2024-08-19 07:15:20', NULL, NULL),
(2, 'Guest User For Admin Order', 'tzs1@gmail.com', '', NULL, '$2y$12$GUFjt1bKHSv31.vORcy5cOP/CFe0jV4wAyrNGAQ0xXTir8aQ2july', NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-08-19 08:47:02', '2024-08-19 08:47:08', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `v_i_p_requests`
--

CREATE TABLE `v_i_p_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `v_i_p_requests`
--

INSERT INTO `v_i_p_requests` (`id`, `user_id`, `type_id`, `status`, `comment`, `created_at`, `updated_at`) VALUES
(1, 12, 2, 1, 'Success', '2024-09-11 08:14:38', '2024-09-11 09:11:24'),
(7, 43, 1, 1, NULL, '2024-10-08 16:13:37', '2024-10-25 15:50:32'),
(8, 43, 3, 0, NULL, '2024-10-25 15:51:24', '2024-10-25 15:51:24'),
(9, 45, 3, 2, 'not enough yet', '2024-10-25 16:28:33', '2024-10-25 16:29:26'),
(10, 45, 1, 1, NULL, '2024-10-25 16:29:46', '2024-10-25 16:30:04'),
(11, 50, 1, 1, NULL, '2024-10-27 07:34:25', '2024-10-27 07:35:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cards_user_id_foreign` (`user_id`),
  ADD KEY `cards_product_variant_id_foreign` (`product_variant_id`);

--
-- Indexes for table `customer_feedback`
--
ALTER TABLE `customer_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_types`
--
ALTER TABLE `customer_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_types_user_id_foreign` (`user_id`),
  ADD KEY `customer_types_type_id_foreign` (`type_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `f_a_q_s`
--
ALTER TABLE `f_a_q_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goals`
--
ALTER TABLE `goals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_variant_id_foreign` (`product_variant_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_variants_product_id_foreign` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplies`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `v_i_p_requests`
--
ALTER TABLE `v_i_p_requests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_feedback`
--
ALTER TABLE `customer_feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_types`
--
ALTER TABLE `customer_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `f_a_q_s`
--
ALTER TABLE `f_a_q_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `goals`
--
ALTER TABLE `goals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplies`
--
ALTER TABLE `supplies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `v_i_p_requests`
--
ALTER TABLE `v_i_p_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cards`
--
ALTER TABLE `cards`
  ADD CONSTRAINT `cards_product_variant_id_foreign` FOREIGN KEY (`product_variant_id`) REFERENCES `product_variants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cards_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customer_types`
--
ALTER TABLE `customer_types`
  ADD CONSTRAINT `customer_types_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_types_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_variant_id_foreign` FOREIGN KEY (`product_variant_id`) REFERENCES `product_variants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `product_variants_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
