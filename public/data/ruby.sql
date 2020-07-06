-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 06, 2020 lúc 05:24 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ruby`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `address_users`
--

CREATE TABLE `address_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `address_users`
--

INSERT INTO `address_users` (`id`, `user_id`, `address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'Số 292 Bà Triệu, P. Lê Đại Hành, Q. Hai Bà Trưng, TP. Hà Nội', '2020-07-05 04:14:32', '2020-07-05 04:14:32', NULL),
(2, 3, 'Tầng 7, Toà nhà Sài Gòn PARAGON\r\n03 Nguyễn Lương Bằng, P.Tân Phú, Quận 7, Hồ Chí Minh', '2020-07-05 04:18:16', '2020-07-05 04:18:16', NULL),
(3, 4, 'Lô I, II - số 1.01 Hồng Lĩnh Plaza, Đường số 9A, Khu dân cư Trung Sơn,\r\nxã Bình Hưng, huyện Bình Chánh, Tp. Hồ Chí Minh, Việt Nam', '2020-07-05 04:24:37', '2020-07-05 04:24:37', NULL),
(4, 5, 'Công Ty Cổ Phần Dịch Vụ Thương Mại Tổng Hợp VinCommerce\r\nTầng 5, Mplaza SaiGon, 39 Lê Duẩn, Phường Bến Nghé, Quận 1, Thành Phố Hồ Chí Minh, Việt Nam.', '2020-07-05 14:06:52', '2020-07-05 14:06:52', NULL),
(5, 6, 'Hà Nội', '2020-07-05 14:29:44', '2020-07-05 14:29:44', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` bigint(20) UNSIGNED NOT NULL,
  `discount_id` bigint(20) UNSIGNED DEFAULT NULL,
  `discount_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_price` double DEFAULT NULL,
  `price` double DEFAULT 0,
  `price_paid` double NOT NULL DEFAULT 0,
  `tax_rate` double DEFAULT 0,
  `status` tinyint(4) DEFAULT 0,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `user_id`, `seller_id`, `discount_id`, `discount_name`, `discount_code`, `discount_price`, `price`, `price_paid`, `tax_rate`, `status`, `address`, `note`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 6, 4, 1, 'Freeship CIRCLE K', '2ZUT6', 25000, 301400, 0, 6400, 3, NULL, NULL, 6, NULL, NULL, '2020-07-06 14:40:08', '2020-07-06 14:41:57', NULL),
(2, 6, 2, NULL, NULL, NULL, NULL, 1062000, 0, 0, 3, NULL, NULL, 6, NULL, NULL, '2020-07-06 14:40:41', '2020-07-06 14:43:05', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_details`
--

CREATE TABLE `bill_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `species_id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) DEFAULT 0,
  `price` double DEFAULT 0,
  `qty` int(11) DEFAULT 0,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_details`
--

INSERT INTO `bill_details` (`id`, `bill_id`, `product_id`, `species_id`, `amount`, `price`, `qty`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 8, 14, 1, 20000, 9, 6, NULL, NULL, '2020-07-06 14:40:08', '2020-07-06 14:40:08', NULL),
(2, 1, 9, 14, 1, 20000, 3, 6, NULL, NULL, '2020-07-06 14:40:08', '2020-07-06 14:40:08', NULL),
(3, 1, 10, 14, 1, 20000, 4, 6, NULL, NULL, '2020-07-06 14:40:08', '2020-07-06 14:40:08', NULL),
(4, 2, 2, 11, 3, 79000, 6, 6, NULL, NULL, '2020-07-06 14:40:41', '2020-07-06 14:40:41', NULL),
(5, 2, 2, 11, 5, 98000, 6, 6, NULL, NULL, '2020-07-06 14:40:41', '2020-07-06 14:40:41', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1: active, 0: inactive',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `category_id`, `icon`, `image`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Đồ uống và đồ ăn nhanh', 'do-uong-va-do-an-nhanh', NULL, NULL, '1053186942450705202007pYWeoGR9.jpeg', 1, 1, NULL, NULL, '2020-07-05 03:53:18', '2020-07-05 03:53:18', NULL),
(2, 'Đồ uống nhanh', 'do-uong-nhanh', 1, NULL, '105509985802070520203DVwhZisCF.jpeg', 1, 1, NULL, NULL, '2020-07-05 03:55:09', '2020-07-05 03:55:09', NULL),
(3, 'Đồ ăn nhanh', 'do-an-nhanh', 1, NULL, '10553970559207052020cq0WzHwKlk.jpeg', 1, 1, NULL, NULL, '2020-07-05 03:55:39', '2020-07-05 03:55:39', NULL),
(4, 'Đồ tiêu dùng và thực phẩm', 'do-tieu-dung', NULL, NULL, '10574768089307052020x7mRr9Vstx.jpeg', 1, 1, NULL, NULL, '2020-07-05 03:57:47', '2020-07-05 03:57:47', NULL),
(5, 'Thực phẩm khô', 'thuc-pham-kho', 4, NULL, '11025380873507052020q5s61IwwBc.png', 1, 1, NULL, NULL, '2020-07-05 04:00:33', '2020-07-05 04:02:53', NULL),
(6, 'Đồ dùng tổng hợp', 'do-dung-tong-hop', 4, NULL, '11015088295207052020S2UmEqQVIl.png', 1, 1, NULL, NULL, '2020-07-05 04:01:50', '2020-07-05 04:01:50', NULL),
(7, 'Hóa mỹ phẩm', 'hoa-my-pham', 4, NULL, '11023302467207052020S1EeWkov2W.png', 1, 1, NULL, NULL, '2020-07-05 04:02:33', '2020-07-05 04:02:33', NULL),
(8, 'Kem', 'kem', 4, NULL, '11035879985707052020q318j0NbrV.png', 1, 1, NULL, NULL, '2020-07-05 04:03:58', '2020-07-05 04:03:58', NULL),
(9, 'Sữa và sản phẩm từ sữa', 'sua-va-san-pham-tu-sua', 4, NULL, '11042575115807052020UY5u992e1U.png', 1, 1, NULL, NULL, '2020-07-05 04:04:25', '2020-07-05 04:04:25', NULL),
(10, 'Chips và snacks', 'chips-va-snacks', 4, NULL, '11052840661507052020AhAEj6yArr.png', 1, 1, NULL, NULL, '2020-07-05 04:05:28', '2020-07-05 04:05:28', NULL),
(11, 'Bánh kẹo', 'banh-keo', 4, NULL, '110608835524070520207j3Evuz6HF.png', 1, 1, NULL, NULL, '2020-07-05 04:06:08', '2020-07-05 04:06:08', NULL),
(12, 'Nước giải khát', 'nuoc-giai-khat', 4, NULL, '11063561586407052020L3MolvZ1h0.png', 1, 1, NULL, NULL, '2020-07-05 04:06:35', '2020-07-05 04:06:35', NULL),
(13, 'Rượu', 'ruou', 4, NULL, '11070056327007052020W7wvq4B73W.png', 1, 1, NULL, NULL, '2020-07-05 04:07:00', '2020-07-05 04:07:00', NULL),
(14, 'Bia và rượu trái cây', 'bia-va-ruou-trai-cay', 4, NULL, '110731971696070520200gaUDyH6bo.png', 1, 1, NULL, NULL, '2020-07-05 04:07:31', '2020-07-05 04:07:31', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL DEFAULT 0,
  `use` bigint(20) NOT NULL DEFAULT 0,
  `amount` bigint(20) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1: Instock, 0: Outstok',
  `start` date DEFAULT NULL,
  `finish` date DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `discounts`
--

INSERT INTO `discounts` (`id`, `name`, `code`, `price`, `use`, `amount`, `status`, `start`, `finish`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Freeship CIRCLE K', '2ZUT6', 25000, 2, 9998, 1, '2020-07-01', '2020-07-31', 4, NULL, NULL, '2020-07-05 05:22:07', '2020-07-06 14:40:08', NULL),
(2, 'FreeShip KFC', '1DRTX', 20000, 1, 99999, 1, '2020-07-01', '2020-07-31', 2, NULL, NULL, '2020-07-05 05:22:45', '2020-07-06 13:37:34', NULL),
(3, 'FreeShip LOTTERIA', 'T641T', 20000, 0, 100000, 1, '2020-07-01', '2020-07-31', 3, NULL, NULL, '2020-07-05 05:23:29', '2020-07-05 05:23:29', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image_products`
--

CREATE TABLE `image_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `image_products`
--

INSERT INTO `image_products` (`id`, `product_id`, `image`) VALUES
(1, 1, '[\"11411741474007052020bNfSyGFZlP.png\",\"11411741887107052020lAz9PnWBP8.png\"]'),
(2, 2, '[\"114326725025070520200exUOkHVDh.png\",\"11432672909807052020BKJtlP2ER4.jpeg\"]'),
(3, 3, '[\"114502537381070520203y1vU6JbNt.png\",\"11450254100907052020Cjn4HO1D0S.png\"]'),
(4, 4, '[\"11505566804207052020pOMMS2rhtb.png\",\"11505567246607052020irU1lEfXir.png\"]'),
(5, 5, '[\"11550719368507052020X0eGem4n9O.jpeg\",\"11550719806507052020ro1MqN77em.png\"]'),
(6, 6, '[\"11564184937207052020doGDpvGnzz.png\",\"115641853310070520207UnSCgJ4Od.png\"]'),
(7, 7, '[\"11574142696207052020cbCvMwtTSy.png\",\"11574143144807052020jI2l3NMvDF.png\"]'),
(8, 21, '[\"21204770796607052020GYjGM1G4xY.jpeg\",\"21204783373907052020OHwtakChN2.jpeg\",\"21204783649307052020735s7fW4tM.jpeg\",\"21204784086907052020pZltdR6UAJ.jpeg\",\"21204784392607052020Z7rDaHUtfa.jpeg\"]'),
(9, 22, '[\"21243077396407052020skmW3tn7dK.jpeg\",\"212430783403070520204IZDWAUtM4.jpeg\",\"21243078595507052020rPEJBAXGCg.jpeg\"]');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_02_12_111845_create_permission_tables', 1),
(4, '2020_02_14_085732_create_categories_table', 1),
(5, '2020_02_14_152834_create_discounts_table', 1),
(6, '2020_02_15_151203_create_products_table', 1),
(7, '2020_02_15_151330_create_suppliers_table', 1),
(8, '2020_02_15_151721_create_image_products_table', 1),
(9, '2020_02_16_145412_create_sales_table', 1),
(10, '2020_03_08_140018_create_species_table', 1),
(11, '2020_03_08_140109_create_option_products_table', 1),
(12, '2020_03_21_172929_add_image_to_products_table', 1),
(13, '2020_04_12_163724_create_address_users_table', 2),
(22, '2020_05_18_160845_create_rates_table', 8),
(24, '2020_06_13_172342_change_image_to_image_products_table', 9),
(25, '2020_06_16_101444_change_fax_to_suppliers_table', 10),
(26, '2020_04_12_163935_create_bills_table', 11),
(27, '2020_04_12_163941_create_bill_details_table', 11),
(28, '2020_05_15_163233_change_species_id_to_bill_details_table', 11),
(29, '2020_05_16_145841_add_seller_id_to_bills_table', 11),
(30, '2020_05_16_151304_change_columns_to_bills_table', 11),
(31, '2020_05_26_113657_add_price_paid_to_bills_table', 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `option_products`
--

CREATE TABLE `option_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `species_id` bigint(20) UNSIGNED NOT NULL,
  `price` double DEFAULT NULL,
  `amount` bigint(20) NOT NULL DEFAULT 0,
  `pay` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `option_products`
--

INSERT INTO `option_products` (`id`, `product_id`, `supplier_id`, `species_id`, `price`, `amount`, `pay`) VALUES
(1, 1, 1, 11, 79000, 2, 0),
(2, 2, 1, 11, 79000, 3, 0),
(3, 2, 1, 11, 98000, 5, 0),
(4, 3, 1, 11, 85000, 1, 0),
(5, 4, 1, 11, 89000, 1, 0),
(6, 5, 1, 12, 69000, 1, 0),
(7, 6, 1, 12, 89000, 1, 0),
(8, 7, 1, 12, 95000, 1, 0),
(9, 8, 2, 14, 20000, 1, 0),
(10, 9, 2, 14, 20000, 1, 0),
(11, 10, 2, 14, 20000, 1, 0),
(12, 11, 2, 14, 15000, 1, 0),
(13, 12, 2, 14, 15000, 1, 0),
(14, 13, 2, 14, 15000, 1, 0),
(15, 14, 2, 14, 15000, 1, 0),
(16, 15, 2, 14, 20000, 1, 0),
(17, 16, 2, 14, 30000, 1, 0),
(18, 17, 2, 14, 35000, 1, 0),
(19, 18, 2, 14, 30000, 1, 0),
(20, 19, 2, 14, 40000, 1, 0),
(21, 20, 3, 10, 6800, 1, 0),
(22, 20, 3, 1, 26500, 4, 0),
(23, 20, 3, 2, 312000, 1, 0),
(24, 21, 3, 10, 6500, 1, 0),
(25, 21, 3, 10, 26500, 4, 0),
(26, 21, 3, 2, 312000, 1, 0),
(27, 22, 4, 10, 6600, 1, 0),
(28, 22, 4, 10, 25000, 4, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2020-07-05 03:50:49', '2020-07-05 03:50:49'),
(2, 'home', 'web', '2020-07-05 03:50:49', '2020-07-05 03:50:49'),
(3, 'role-list', 'web', '2020-07-05 03:50:49', '2020-07-05 03:50:49'),
(4, 'role-create', 'web', '2020-07-05 03:50:49', '2020-07-05 03:50:49'),
(5, 'role-edit', 'web', '2020-07-05 03:50:49', '2020-07-05 03:50:49'),
(6, 'role-delete', 'web', '2020-07-05 03:50:49', '2020-07-05 03:50:49'),
(7, 'user-list', 'web', '2020-07-05 03:50:49', '2020-07-05 03:50:49'),
(8, 'user-create', 'web', '2020-07-05 03:50:49', '2020-07-05 03:50:49'),
(9, 'user-edit', 'web', '2020-07-05 03:50:49', '2020-07-05 03:50:49'),
(10, 'user-delete', 'web', '2020-07-05 03:50:49', '2020-07-05 03:50:49'),
(11, 'permission-list', 'web', '2020-07-05 03:50:49', '2020-07-05 03:50:49'),
(12, 'permission-create', 'web', '2020-07-05 03:50:49', '2020-07-05 03:50:49'),
(13, 'permission-edit', 'web', '2020-07-05 03:50:49', '2020-07-05 03:50:49'),
(14, 'permission-delete', 'web', '2020-07-05 03:50:49', '2020-07-05 03:50:49'),
(15, 'category-list', 'web', '2020-07-05 03:50:49', '2020-07-05 03:50:49'),
(16, 'category-create', 'web', '2020-07-05 03:50:49', '2020-07-05 03:50:49'),
(17, 'category-edit', 'web', '2020-07-05 03:50:49', '2020-07-05 03:50:49'),
(18, 'category-delete', 'web', '2020-07-05 03:50:49', '2020-07-05 03:50:49'),
(19, 'product-list', 'web', '2020-07-05 03:50:50', '2020-07-05 03:50:50'),
(20, 'product-create', 'web', '2020-07-05 03:50:50', '2020-07-05 03:50:50'),
(21, 'product-detail', 'web', '2020-07-05 03:50:50', '2020-07-05 03:50:50'),
(22, 'product-edit', 'web', '2020-07-05 03:50:50', '2020-07-05 03:50:50'),
(23, 'product-delete', 'web', '2020-07-05 03:50:50', '2020-07-05 03:50:50'),
(24, 'discount-list', 'web', '2020-07-05 03:50:50', '2020-07-05 03:50:50'),
(25, 'discount-create', 'web', '2020-07-05 03:50:50', '2020-07-05 03:50:50'),
(26, 'discount-edit', 'web', '2020-07-05 03:50:50', '2020-07-05 03:50:50'),
(27, 'discount-delete', 'web', '2020-07-05 03:50:50', '2020-07-05 03:50:50'),
(28, 'supplier-list', 'web', '2020-07-05 03:50:50', '2020-07-05 03:50:50'),
(29, 'supplier-create', 'web', '2020-07-05 03:50:50', '2020-07-05 03:50:50'),
(30, 'supplier-edit', 'web', '2020-07-05 03:50:50', '2020-07-05 03:50:50'),
(31, 'supplier-delete', 'web', '2020-07-05 03:50:50', '2020-07-05 03:50:50'),
(32, 'species-list', 'web', '2020-07-05 03:50:50', '2020-07-05 03:50:50'),
(33, 'species-create', 'web', '2020-07-05 03:50:50', '2020-07-05 03:50:50'),
(34, 'species-edit', 'web', '2020-07-05 03:50:50', '2020-07-05 03:50:50'),
(35, 'species-delete', 'web', '2020-07-05 03:50:50', '2020-07-05 03:50:50'),
(36, 'bill-list', 'web', '2020-07-05 03:50:50', '2020-07-05 03:50:50'),
(37, 'bill-create', 'web', '2020-07-05 03:50:50', '2020-07-05 03:50:50'),
(38, 'bill-edit', 'web', '2020-07-05 03:50:50', '2020-07-05 03:50:50'),
(39, 'bill-detail', 'web', '2020-07-05 03:50:50', '2020-07-05 03:50:50'),
(40, 'bill-delete', 'web', '2020-07-05 03:50:50', '2020-07-05 03:50:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1: active, 0: inactive',
  `likes` bigint(20) NOT NULL DEFAULT 0,
  `views` bigint(20) NOT NULL DEFAULT 0,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `category_id`, `image`, `status`, `likes`, `views`, `content`, `detail`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Combo gà rán A', 'combo-ga-ran-a', 3, '11411741976707052020FriEBLXRok.jpeg', 1, 0, 5, '<p><a href=\"http://xienquegiasi.com/san-pham/canh-ga-kfc\">Gà rán KFC</a>&nbsp;từ lâu đã nổi tiếng bởi hương vị &nbsp;thơm ngon và giòn, nên có rất nhiều bạn trẻ, người lớn thích món ăn này và thường thưởng thức cùng với bạn bè và gia đình mỗi khi có những diệp đặc biệt hay dẫn con cái đi ăn cuối tuần. Để tối đa hóa quyền lợi cũng như thời gian của khách hàng chúng tôi đã ra sản phẩm gà rán KFC với hương vị thơm ngon không thua kém chất lượng của sản phẩm gà &nbsp;rán KFC thật.</p>\r\n\r\n<h2>Nguyên nhân ra đời của gà rán KFC</h2>\r\n\r\n<p>Gà KFC có rất nhiều mặt &nbsp;hàng hiện đang bán là: Cánh gà KFC, đùi gà KFC, gà &nbsp;viên, sụn gà... Tất cả điều có &nbsp;hương vị riêng hết và &nbsp;đặc biệt chúng rất là ngon. Nên khách hàng thường đến của hàng KFC để chon lựa và không khó chon được một món ăn ưng ý cho mình. Nhưng bên cạnh đó &nbsp;tiếp thu từ ý kiến khách hàng ching tôi nhận được một số thông tin như sau: Tốn thời gian để đến cửa hàng, giá món ăn quá cao ăn chưa đã, qua nhiều dầu mỡ.... Chính vì những nguyên nhân đó Nhà Xiên Que chúng &nbsp;tôi đã cho &nbsp;ra mắt sản phẩm gà rán KFC bao gòm:&nbsp;Cánh gà KFC,&nbsp;<a href=\"http://xienquegiasi.com/san-pham/dui-ga-kfc\">đùi gà KFC</a>,&nbsp;<a href=\"http://xienquegiasi.com/san-pham/ga-vien\">gà viên</a>.... Do chính chúng tôi sản xuất nhưng chất lượng không thua kém các sản phẩm của KFC, điều đó được chứng minh qua đơn hàng chúng tôi nhận được ngày càng nhiều lên trên tất cả các &nbsp;vùng, đặc biệt là miền Trung.</p>\r\n\r\n<p>Hiện gà rán KFC của chúng tôi số lượng bán ra hàng tháng là &nbsp;hơn 50Kg, chưa kể gà &nbsp;viên &nbsp;và gà xiêm tiêm - sản phẩm mới. Nên các bạn yên tâm về chất lượng vì chất lượng sẽ được kiểm tra tốt nhất là qua ý &nbsp;kiếm của khách hàng. Hãy liên hệ với chúng tôi các bạn nhé.</p>\r\n\r\n<h2>Cách làm&nbsp;<a href=\"http://xienquegiasi.com/san-pham/ga-chip\">gà rán kfc</a>&nbsp;ngon</h2>\r\n\r\n<p>Để &nbsp;có được một &nbsp;cánh gà kfc ngon các bạn phải chọn lựa nguyên kỹ càng từ nguyên liệu thô đó là cánh gà, cánh gà là phần ngon nhất trong trong các&nbsp;bộ phận &nbsp;của con gà, chúng ta thường nhầm lẫn là gà ngon nhất là đùi gà nhưng đó là sai lầm phần mềm và béo nhất lại là cánh gà -nên món&nbsp;cánh gà kfc&nbsp;là món ngon nhất của chúng tôi hiện&nbsp; nay bên cạnh đùi gà kfc. Cánh gà kfc được chọn là phải điều nhau trước hết nhằm tạo sự đẹp mắt &nbsp;cho người&nbsp;dùng, cánh gà phải tươi ngon được &nbsp;lấy sau khi giết gà và được rữa sạch và tẩm ướp gia vị trước khi tẩm bột xù.</p>\r\n\r\n<h2>Nguyên liệu ướp gà rán kfc</h2>\r\n\r\n<p>Mỗi nơi sản xuất điều có một bí quyết riêng cho sản phẩm của mình, và gà&nbsp; rán kfc của chúng&nbsp; tôi cũng vậy, đây là một bí quyết rất lâu do quá trình làm sản phẩm theo thời gian đút kết mà thành. Nhưng suy cho&nbsp; cùng nguyên liệu chính của món gà rán kfc này là: đường, tiêu, muối, trứng gà và bột xù…</p>\r\n\r\n<p>Trước khi&nbsp; thấm ướp các bạn ngâm cánh gà vào dung dịch muối để qua đêm nhằm lấy hết chất tanh&nbsp; trong cánh gà&nbsp; ra ngoài. Để tạo dung dịch bao ngoài&nbsp; cho cánh gà kfc các bạn dung một cái thao nhỏ tùy vào số lượng cánh gà mình làm mà có lượng nước khác nhau, cho long đỏ trứng, đường, tiêu muối sữa vào để tạo thành dung dịch sệt, các bạn lấy cánh gà nhúng&nbsp; và dung dịch sau đó tẩm bột xù lên thế là các bạn có món cánh gà rán kfc rồi đó.</p>\r\n\r\n<h2>Chiên gà rán kfc</h2>\r\n\r\n<p>Để gà rán kfc ngon và giòn các bạn nên đổ nhiều nhiều dầu để ngập cánh gà hoặc đùi gà. Để cho dầu sôi nhiều nhất sau đó để cánh gà vào, khi bột xù bên&nbsp; ngoài chuyển sang màu vàng nâu thế là bạn đã có món cánh&nbsp; gà kfc ngon tuyệt để thưởng thức rồi nhé.</p>\r\n\r\n<h2>Cách bảo quản</h2>\r\n\r\n<p>Để giữ được gà rán kfc tươi ngon các bạn nên để trong ngăn đông của tủ lạnh hoặc là ngăn đông của tủ đông, với cách bảo quản này các bạn có thể bảo quản được hơn 6 tháng.</p>\r\n\r\n<p>Để có được sản phẩm ưng ý nhất và để không phải vất vả đến các cửa hàng ăn uống các bạn hãy liên hệ ngay cho&nbsp;<a href=\"http://xienquegiasi.com/\">chúng tôi</a>&nbsp;để được chúng&nbsp; tôi tư vấn và ship hàng&nbsp; tận hàng&nbsp; tận nhà nhé. Sự hài lòng của&nbsp; các bạn là niềm tự hào và là động lực để chúng&nbsp; tôi tiếp tực kinh doanh mặt hàng này.</p>', '<p><a href=\"http://xienquegiasi.com/san-pham/canh-ga-kfc\">Gà rán KFC</a>&nbsp;từ lâu đã nổi tiếng bởi hương vị &nbsp;thơm ngon và giòn, nên có rất nhiều bạn trẻ, người lớn thích món ăn này và thường thưởng thức cùng với bạn bè và gia đình mỗi khi có những diệp đặc biệt hay dẫn con cái đi ăn cuối tuần. Để tối đa hóa quyền lợi cũng như thời gian của khách hàng chúng tôi đã ra sản phẩm gà rán KFC với hương vị thơm ngon không thua kém chất lượng của sản phẩm gà &nbsp;rán KFC thật.</p>\r\n\r\n<h2>Nguyên nhân ra đời của gà rán KFC</h2>\r\n\r\n<p>Gà KFC có rất nhiều mặt &nbsp;hàng hiện đang bán là: Cánh gà KFC, đùi gà KFC, gà &nbsp;viên, sụn gà... Tất cả điều có &nbsp;hương vị riêng hết và &nbsp;đặc biệt chúng rất là ngon. Nên khách hàng thường đến của hàng KFC để chon lựa và không khó chon được một món ăn ưng ý cho mình. Nhưng bên cạnh đó &nbsp;tiếp thu từ ý kiến khách hàng ching tôi nhận được một số thông tin như sau: Tốn thời gian để đến cửa hàng, giá món ăn quá cao ăn chưa đã, qua nhiều dầu mỡ.... Chính vì những nguyên nhân đó Nhà Xiên Que chúng &nbsp;tôi đã cho &nbsp;ra mắt sản phẩm gà rán KFC bao gòm:&nbsp;Cánh gà KFC,&nbsp;<a href=\"http://xienquegiasi.com/san-pham/dui-ga-kfc\">đùi gà KFC</a>,&nbsp;<a href=\"http://xienquegiasi.com/san-pham/ga-vien\">gà viên</a>.... Do chính chúng tôi sản xuất nhưng chất lượng không thua kém các sản phẩm của KFC, điều đó được chứng minh qua đơn hàng chúng tôi nhận được ngày càng nhiều lên trên tất cả các &nbsp;vùng, đặc biệt là miền Trung.</p>\r\n\r\n<p>Hiện gà rán KFC của chúng tôi số lượng bán ra hàng tháng là &nbsp;hơn 50Kg, chưa kể gà &nbsp;viên &nbsp;và gà xiêm tiêm - sản phẩm mới. Nên các bạn yên tâm về chất lượng vì chất lượng sẽ được kiểm tra tốt nhất là qua ý &nbsp;kiếm của khách hàng. Hãy liên hệ với chúng tôi các bạn nhé.</p>\r\n\r\n<h2>Cách làm&nbsp;<a href=\"http://xienquegiasi.com/san-pham/ga-chip\">gà rán kfc</a>&nbsp;ngon</h2>\r\n\r\n<p>Để &nbsp;có được một &nbsp;cánh gà kfc ngon các bạn phải chọn lựa nguyên kỹ càng từ nguyên liệu thô đó là cánh gà, cánh gà là phần ngon nhất trong trong các&nbsp;bộ phận &nbsp;của con gà, chúng ta thường nhầm lẫn là gà ngon nhất là đùi gà nhưng đó là sai lầm phần mềm và béo nhất lại là cánh gà -nên món&nbsp;cánh gà kfc&nbsp;là món ngon nhất của chúng tôi hiện&nbsp; nay bên cạnh đùi gà kfc. Cánh gà kfc được chọn là phải điều nhau trước hết nhằm tạo sự đẹp mắt &nbsp;cho người&nbsp;dùng, cánh gà phải tươi ngon được &nbsp;lấy sau khi giết gà và được rữa sạch và tẩm ướp gia vị trước khi tẩm bột xù.</p>\r\n\r\n<h2>Nguyên liệu ướp gà rán kfc</h2>\r\n\r\n<p>Mỗi nơi sản xuất điều có một bí quyết riêng cho sản phẩm của mình, và gà&nbsp; rán kfc của chúng&nbsp; tôi cũng vậy, đây là một bí quyết rất lâu do quá trình làm sản phẩm theo thời gian đút kết mà thành. Nhưng suy cho&nbsp; cùng nguyên liệu chính của món gà rán kfc này là: đường, tiêu, muối, trứng gà và bột xù…</p>\r\n\r\n<p>Trước khi&nbsp; thấm ướp các bạn ngâm cánh gà vào dung dịch muối để qua đêm nhằm lấy hết chất tanh&nbsp; trong cánh gà&nbsp; ra ngoài. Để tạo dung dịch bao ngoài&nbsp; cho cánh gà kfc các bạn dung một cái thao nhỏ tùy vào số lượng cánh gà mình làm mà có lượng nước khác nhau, cho long đỏ trứng, đường, tiêu muối sữa vào để tạo thành dung dịch sệt, các bạn lấy cánh gà nhúng&nbsp; và dung dịch sau đó tẩm bột xù lên thế là các bạn có món cánh gà rán kfc rồi đó.</p>\r\n\r\n<h2>Chiên gà rán kfc</h2>\r\n\r\n<p>Để gà rán kfc ngon và giòn các bạn nên đổ nhiều nhiều dầu để ngập cánh gà hoặc đùi gà. Để cho dầu sôi nhiều nhất sau đó để cánh gà vào, khi bột xù bên&nbsp; ngoài chuyển sang màu vàng nâu thế là bạn đã có món cánh&nbsp; gà kfc ngon tuyệt để thưởng thức rồi nhé.</p>\r\n\r\n<h2>Cách bảo quản</h2>\r\n\r\n<p>Để giữ được gà rán kfc tươi ngon các bạn nên để trong ngăn đông của tủ lạnh hoặc là ngăn đông của tủ đông, với cách bảo quản này các bạn có thể bảo quản được hơn 6 tháng.</p>\r\n\r\n<p>Để có được sản phẩm ưng ý nhất và để không phải vất vả đến các cửa hàng ăn uống các bạn hãy liên hệ ngay cho&nbsp;<a href=\"http://xienquegiasi.com/\">chúng tôi</a>&nbsp;để được chúng&nbsp; tôi tư vấn và ship hàng&nbsp; tận hàng&nbsp; tận nhà nhé. Sự hài lòng của&nbsp; các bạn là niềm tự hào và là động lực để chúng&nbsp; tôi tiếp tực kinh doanh mặt hàng này.</p>', 2, NULL, NULL, '2020-07-05 04:41:17', '2020-07-06 13:34:59', NULL),
(2, 'Combo gà rán B', 'combo-ga-ran-b', 3, '11432672975407052020lXHKl8RO7m.jpeg', 1, 1, 8, '<p><a href=\"http://xienquegiasi.com/san-pham/canh-ga-kfc\">Gà rán KFC</a>&nbsp;từ lâu đã nổi tiếng bởi hương vị &nbsp;thơm ngon và giòn, nên có rất nhiều bạn trẻ, người lớn thích món ăn này và thường thưởng thức cùng với bạn bè và gia đình mỗi khi có những diệp đặc biệt hay dẫn con cái đi ăn cuối tuần. Để tối đa hóa quyền lợi cũng như thời gian của khách hàng chúng tôi đã ra sản phẩm gà rán KFC với hương vị thơm ngon không thua kém chất lượng của sản phẩm gà &nbsp;rán KFC thật.</p>\r\n\r\n<h2>Nguyên nhân ra đời của gà rán KFC</h2>\r\n\r\n<p>Gà KFC có rất nhiều mặt &nbsp;hàng hiện đang bán là: Cánh gà KFC, đùi gà KFC, gà &nbsp;viên, sụn gà... Tất cả điều có &nbsp;hương vị riêng hết và &nbsp;đặc biệt chúng rất là ngon. Nên khách hàng thường đến của hàng KFC để chon lựa và không khó chon được một món ăn ưng ý cho mình. Nhưng bên cạnh đó &nbsp;tiếp thu từ ý kiến khách hàng ching tôi nhận được một số thông tin như sau: Tốn thời gian để đến cửa hàng, giá món ăn quá cao ăn chưa đã, qua nhiều dầu mỡ.... Chính vì những nguyên nhân đó Nhà Xiên Que chúng &nbsp;tôi đã cho &nbsp;ra mắt sản phẩm gà rán KFC bao gòm:&nbsp;Cánh gà KFC,&nbsp;<a href=\"http://xienquegiasi.com/san-pham/dui-ga-kfc\">đùi gà KFC</a>,&nbsp;<a href=\"http://xienquegiasi.com/san-pham/ga-vien\">gà viên</a>.... Do chính chúng tôi sản xuất nhưng chất lượng không thua kém các sản phẩm của KFC, điều đó được chứng minh qua đơn hàng chúng tôi nhận được ngày càng nhiều lên trên tất cả các &nbsp;vùng, đặc biệt là miền Trung.</p>\r\n\r\n<p>Hiện gà rán KFC của chúng tôi số lượng bán ra hàng tháng là &nbsp;hơn 50Kg, chưa kể gà &nbsp;viên &nbsp;và gà xiêm tiêm - sản phẩm mới. Nên các bạn yên tâm về chất lượng vì chất lượng sẽ được kiểm tra tốt nhất là qua ý &nbsp;kiếm của khách hàng. Hãy liên hệ với chúng tôi các bạn nhé.</p>\r\n\r\n<h2>Cách làm&nbsp;<a href=\"http://xienquegiasi.com/san-pham/ga-chip\">gà rán kfc</a>&nbsp;ngon</h2>\r\n\r\n<p>Để &nbsp;có được một &nbsp;cánh gà kfc ngon các bạn phải chọn lựa nguyên kỹ càng từ nguyên liệu thô đó là cánh gà, cánh gà là phần ngon nhất trong trong các&nbsp;bộ phận &nbsp;của con gà, chúng ta thường nhầm lẫn là gà ngon nhất là đùi gà nhưng đó là sai lầm phần mềm và béo nhất lại là cánh gà -nên món&nbsp;cánh gà kfc&nbsp;là món ngon nhất của chúng tôi hiện&nbsp; nay bên cạnh đùi gà kfc. Cánh gà kfc được chọn là phải điều nhau trước hết nhằm tạo sự đẹp mắt &nbsp;cho người&nbsp;dùng, cánh gà phải tươi ngon được &nbsp;lấy sau khi giết gà và được rữa sạch và tẩm ướp gia vị trước khi tẩm bột xù.</p>\r\n\r\n<h2>Nguyên liệu ướp gà rán kfc</h2>\r\n\r\n<p>Mỗi nơi sản xuất điều có một bí quyết riêng cho sản phẩm của mình, và gà&nbsp; rán kfc của chúng&nbsp; tôi cũng vậy, đây là một bí quyết rất lâu do quá trình làm sản phẩm theo thời gian đút kết mà thành. Nhưng suy cho&nbsp; cùng nguyên liệu chính của món gà rán kfc này là: đường, tiêu, muối, trứng gà và bột xù…</p>\r\n\r\n<p>Trước khi&nbsp; thấm ướp các bạn ngâm cánh gà vào dung dịch muối để qua đêm nhằm lấy hết chất tanh&nbsp; trong cánh gà&nbsp; ra ngoài. Để tạo dung dịch bao ngoài&nbsp; cho cánh gà kfc các bạn dung một cái thao nhỏ tùy vào số lượng cánh gà mình làm mà có lượng nước khác nhau, cho long đỏ trứng, đường, tiêu muối sữa vào để tạo thành dung dịch sệt, các bạn lấy cánh gà nhúng&nbsp; và dung dịch sau đó tẩm bột xù lên thế là các bạn có món cánh gà rán kfc rồi đó.</p>\r\n\r\n<h2>Chiên gà rán kfc</h2>\r\n\r\n<p>Để gà rán kfc ngon và giòn các bạn nên đổ nhiều nhiều dầu để ngập cánh gà hoặc đùi gà. Để cho dầu sôi nhiều nhất sau đó để cánh gà vào, khi bột xù bên&nbsp; ngoài chuyển sang màu vàng nâu thế là bạn đã có món cánh&nbsp; gà kfc ngon tuyệt để thưởng thức rồi nhé.</p>\r\n\r\n<h2>Cách bảo quản</h2>\r\n\r\n<p>Để giữ được gà rán kfc tươi ngon các bạn nên để trong ngăn đông của tủ lạnh hoặc là ngăn đông của tủ đông, với cách bảo quản này các bạn có thể bảo quản được hơn 6 tháng.</p>\r\n\r\n<p>Để có được sản phẩm ưng ý nhất và để không phải vất vả đến các cửa hàng ăn uống các bạn hãy liên hệ ngay cho&nbsp;<a href=\"http://xienquegiasi.com/\">chúng tôi</a>&nbsp;để được chúng&nbsp; tôi tư vấn và ship hàng&nbsp; tận hàng&nbsp; tận nhà nhé. Sự hài lòng của&nbsp; các bạn là niềm tự hào và là động lực để chúng&nbsp; tôi tiếp tực kinh doanh mặt hàng này.</p>', '<p><a href=\"http://xienquegiasi.com/san-pham/canh-ga-kfc\">Gà rán KFC</a>&nbsp;từ lâu đã nổi tiếng bởi hương vị &nbsp;thơm ngon và giòn, nên có rất nhiều bạn trẻ, người lớn thích món ăn này và thường thưởng thức cùng với bạn bè và gia đình mỗi khi có những diệp đặc biệt hay dẫn con cái đi ăn cuối tuần. Để tối đa hóa quyền lợi cũng như thời gian của khách hàng chúng tôi đã ra sản phẩm gà rán KFC với hương vị thơm ngon không thua kém chất lượng của sản phẩm gà &nbsp;rán KFC thật.</p>\r\n\r\n<h2>Nguyên nhân ra đời của gà rán KFC</h2>\r\n\r\n<p>Gà KFC có rất nhiều mặt &nbsp;hàng hiện đang bán là: Cánh gà KFC, đùi gà KFC, gà &nbsp;viên, sụn gà... Tất cả điều có &nbsp;hương vị riêng hết và &nbsp;đặc biệt chúng rất là ngon. Nên khách hàng thường đến của hàng KFC để chon lựa và không khó chon được một món ăn ưng ý cho mình. Nhưng bên cạnh đó &nbsp;tiếp thu từ ý kiến khách hàng ching tôi nhận được một số thông tin như sau: Tốn thời gian để đến cửa hàng, giá món ăn quá cao ăn chưa đã, qua nhiều dầu mỡ.... Chính vì những nguyên nhân đó Nhà Xiên Que chúng &nbsp;tôi đã cho &nbsp;ra mắt sản phẩm gà rán KFC bao gòm:&nbsp;Cánh gà KFC,&nbsp;<a href=\"http://xienquegiasi.com/san-pham/dui-ga-kfc\">đùi gà KFC</a>,&nbsp;<a href=\"http://xienquegiasi.com/san-pham/ga-vien\">gà viên</a>.... Do chính chúng tôi sản xuất nhưng chất lượng không thua kém các sản phẩm của KFC, điều đó được chứng minh qua đơn hàng chúng tôi nhận được ngày càng nhiều lên trên tất cả các &nbsp;vùng, đặc biệt là miền Trung.</p>\r\n\r\n<p>Hiện gà rán KFC của chúng tôi số lượng bán ra hàng tháng là &nbsp;hơn 50Kg, chưa kể gà &nbsp;viên &nbsp;và gà xiêm tiêm - sản phẩm mới. Nên các bạn yên tâm về chất lượng vì chất lượng sẽ được kiểm tra tốt nhất là qua ý &nbsp;kiếm của khách hàng. Hãy liên hệ với chúng tôi các bạn nhé.</p>\r\n\r\n<h2>Cách làm&nbsp;<a href=\"http://xienquegiasi.com/san-pham/ga-chip\">gà rán kfc</a>&nbsp;ngon</h2>\r\n\r\n<p>Để &nbsp;có được một &nbsp;cánh gà kfc ngon các bạn phải chọn lựa nguyên kỹ càng từ nguyên liệu thô đó là cánh gà, cánh gà là phần ngon nhất trong trong các&nbsp;bộ phận &nbsp;của con gà, chúng ta thường nhầm lẫn là gà ngon nhất là đùi gà nhưng đó là sai lầm phần mềm và béo nhất lại là cánh gà -nên món&nbsp;cánh gà kfc&nbsp;là món ngon nhất của chúng tôi hiện&nbsp; nay bên cạnh đùi gà kfc. Cánh gà kfc được chọn là phải điều nhau trước hết nhằm tạo sự đẹp mắt &nbsp;cho người&nbsp;dùng, cánh gà phải tươi ngon được &nbsp;lấy sau khi giết gà và được rữa sạch và tẩm ướp gia vị trước khi tẩm bột xù.</p>\r\n\r\n<h2>Nguyên liệu ướp gà rán kfc</h2>\r\n\r\n<p>Mỗi nơi sản xuất điều có một bí quyết riêng cho sản phẩm của mình, và gà&nbsp; rán kfc của chúng&nbsp; tôi cũng vậy, đây là một bí quyết rất lâu do quá trình làm sản phẩm theo thời gian đút kết mà thành. Nhưng suy cho&nbsp; cùng nguyên liệu chính của món gà rán kfc này là: đường, tiêu, muối, trứng gà và bột xù…</p>\r\n\r\n<p>Trước khi&nbsp; thấm ướp các bạn ngâm cánh gà vào dung dịch muối để qua đêm nhằm lấy hết chất tanh&nbsp; trong cánh gà&nbsp; ra ngoài. Để tạo dung dịch bao ngoài&nbsp; cho cánh gà kfc các bạn dung một cái thao nhỏ tùy vào số lượng cánh gà mình làm mà có lượng nước khác nhau, cho long đỏ trứng, đường, tiêu muối sữa vào để tạo thành dung dịch sệt, các bạn lấy cánh gà nhúng&nbsp; và dung dịch sau đó tẩm bột xù lên thế là các bạn có món cánh gà rán kfc rồi đó.</p>\r\n\r\n<h2>Chiên gà rán kfc</h2>\r\n\r\n<p>Để gà rán kfc ngon và giòn các bạn nên đổ nhiều nhiều dầu để ngập cánh gà hoặc đùi gà. Để cho dầu sôi nhiều nhất sau đó để cánh gà vào, khi bột xù bên&nbsp; ngoài chuyển sang màu vàng nâu thế là bạn đã có món cánh&nbsp; gà kfc ngon tuyệt để thưởng thức rồi nhé.</p>\r\n\r\n<h2>Cách bảo quản</h2>\r\n\r\n<p>Để giữ được gà rán kfc tươi ngon các bạn nên để trong ngăn đông của tủ lạnh hoặc là ngăn đông của tủ đông, với cách bảo quản này các bạn có thể bảo quản được hơn 6 tháng.</p>\r\n\r\n<p>Để có được sản phẩm ưng ý nhất và để không phải vất vả đến các cửa hàng ăn uống các bạn hãy liên hệ ngay cho&nbsp;<a href=\"http://xienquegiasi.com/\">chúng tôi</a>&nbsp;để được chúng&nbsp; tôi tư vấn và ship hàng&nbsp; tận hàng&nbsp; tận nhà nhé. Sự hài lòng của&nbsp; các bạn là niềm tự hào và là động lực để chúng&nbsp; tôi tiếp tực kinh doanh mặt hàng này.</p>', 2, NULL, NULL, '2020-07-05 04:43:26', '2020-07-06 14:40:32', NULL),
(3, 'Combo gà rán C', 'combo-ga-ran-c', 3, '11450254187607052020tVV40iLBXB.jpeg', 1, 0, 0, '<p><a href=\"http://xienquegiasi.com/san-pham/canh-ga-kfc\">Gà rán KFC</a>&nbsp;từ lâu đã nổi tiếng bởi hương vị &nbsp;thơm ngon và giòn, nên có rất nhiều bạn trẻ, người lớn thích món ăn này và thường thưởng thức cùng với bạn bè và gia đình mỗi khi có những diệp đặc biệt hay dẫn con cái đi ăn cuối tuần. Để tối đa hóa quyền lợi cũng như thời gian của khách hàng chúng tôi đã ra sản phẩm gà rán KFC với hương vị thơm ngon không thua kém chất lượng của sản phẩm gà &nbsp;rán KFC thật.</p>\r\n\r\n<h2>Nguyên nhân ra đời của gà rán KFC</h2>\r\n\r\n<p>Gà KFC có rất nhiều mặt &nbsp;hàng hiện đang bán là: Cánh gà KFC, đùi gà KFC, gà &nbsp;viên, sụn gà... Tất cả điều có &nbsp;hương vị riêng hết và &nbsp;đặc biệt chúng rất là ngon. Nên khách hàng thường đến của hàng KFC để chon lựa và không khó chon được một món ăn ưng ý cho mình. Nhưng bên cạnh đó &nbsp;tiếp thu từ ý kiến khách hàng ching tôi nhận được một số thông tin như sau: Tốn thời gian để đến cửa hàng, giá món ăn quá cao ăn chưa đã, qua nhiều dầu mỡ.... Chính vì những nguyên nhân đó Nhà Xiên Que chúng &nbsp;tôi đã cho &nbsp;ra mắt sản phẩm gà rán KFC bao gòm:&nbsp;Cánh gà KFC,&nbsp;<a href=\"http://xienquegiasi.com/san-pham/dui-ga-kfc\">đùi gà KFC</a>,&nbsp;<a href=\"http://xienquegiasi.com/san-pham/ga-vien\">gà viên</a>.... Do chính chúng tôi sản xuất nhưng chất lượng không thua kém các sản phẩm của KFC, điều đó được chứng minh qua đơn hàng chúng tôi nhận được ngày càng nhiều lên trên tất cả các &nbsp;vùng, đặc biệt là miền Trung.</p>\r\n\r\n<p>Hiện gà rán KFC của chúng tôi số lượng bán ra hàng tháng là &nbsp;hơn 50Kg, chưa kể gà &nbsp;viên &nbsp;và gà xiêm tiêm - sản phẩm mới. Nên các bạn yên tâm về chất lượng vì chất lượng sẽ được kiểm tra tốt nhất là qua ý &nbsp;kiếm của khách hàng. Hãy liên hệ với chúng tôi các bạn nhé.</p>\r\n\r\n<h2>Cách làm&nbsp;<a href=\"http://xienquegiasi.com/san-pham/ga-chip\">gà rán kfc</a>&nbsp;ngon</h2>\r\n\r\n<p>Để &nbsp;có được một &nbsp;cánh gà kfc ngon các bạn phải chọn lựa nguyên kỹ càng từ nguyên liệu thô đó là cánh gà, cánh gà là phần ngon nhất trong trong các&nbsp;bộ phận &nbsp;của con gà, chúng ta thường nhầm lẫn là gà ngon nhất là đùi gà nhưng đó là sai lầm phần mềm và béo nhất lại là cánh gà -nên món&nbsp;cánh gà kfc&nbsp;là món ngon nhất của chúng tôi hiện&nbsp; nay bên cạnh đùi gà kfc. Cánh gà kfc được chọn là phải điều nhau trước hết nhằm tạo sự đẹp mắt &nbsp;cho người&nbsp;dùng, cánh gà phải tươi ngon được &nbsp;lấy sau khi giết gà và được rữa sạch và tẩm ướp gia vị trước khi tẩm bột xù.</p>\r\n\r\n<h2>Nguyên liệu ướp gà rán kfc</h2>\r\n\r\n<p>Mỗi nơi sản xuất điều có một bí quyết riêng cho sản phẩm của mình, và gà&nbsp; rán kfc của chúng&nbsp; tôi cũng vậy, đây là một bí quyết rất lâu do quá trình làm sản phẩm theo thời gian đút kết mà thành. Nhưng suy cho&nbsp; cùng nguyên liệu chính của món gà rán kfc này là: đường, tiêu, muối, trứng gà và bột xù…</p>\r\n\r\n<p>Trước khi&nbsp; thấm ướp các bạn ngâm cánh gà vào dung dịch muối để qua đêm nhằm lấy hết chất tanh&nbsp; trong cánh gà&nbsp; ra ngoài. Để tạo dung dịch bao ngoài&nbsp; cho cánh gà kfc các bạn dung một cái thao nhỏ tùy vào số lượng cánh gà mình làm mà có lượng nước khác nhau, cho long đỏ trứng, đường, tiêu muối sữa vào để tạo thành dung dịch sệt, các bạn lấy cánh gà nhúng&nbsp; và dung dịch sau đó tẩm bột xù lên thế là các bạn có món cánh gà rán kfc rồi đó.</p>\r\n\r\n<h2>Chiên gà rán kfc</h2>\r\n\r\n<p>Để gà rán kfc ngon và giòn các bạn nên đổ nhiều nhiều dầu để ngập cánh gà hoặc đùi gà. Để cho dầu sôi nhiều nhất sau đó để cánh gà vào, khi bột xù bên&nbsp; ngoài chuyển sang màu vàng nâu thế là bạn đã có món cánh&nbsp; gà kfc ngon tuyệt để thưởng thức rồi nhé.</p>\r\n\r\n<h2>Cách bảo quản</h2>\r\n\r\n<p>Để giữ được gà rán kfc tươi ngon các bạn nên để trong ngăn đông của tủ lạnh hoặc là ngăn đông của tủ đông, với cách bảo quản này các bạn có thể bảo quản được hơn 6 tháng.</p>\r\n\r\n<p>Để có được sản phẩm ưng ý nhất và để không phải vất vả đến các cửa hàng ăn uống các bạn hãy liên hệ ngay cho&nbsp;<a href=\"http://xienquegiasi.com/\">chúng tôi</a>&nbsp;để được chúng&nbsp; tôi tư vấn và ship hàng&nbsp; tận hàng&nbsp; tận nhà nhé. Sự hài lòng của&nbsp; các bạn là niềm tự hào và là động lực để chúng&nbsp; tôi tiếp tực kinh doanh mặt hàng này.</p>', '<p><a href=\"http://xienquegiasi.com/san-pham/canh-ga-kfc\">Gà rán KFC</a>&nbsp;từ lâu đã nổi tiếng bởi hương vị &nbsp;thơm ngon và giòn, nên có rất nhiều bạn trẻ, người lớn thích món ăn này và thường thưởng thức cùng với bạn bè và gia đình mỗi khi có những diệp đặc biệt hay dẫn con cái đi ăn cuối tuần. Để tối đa hóa quyền lợi cũng như thời gian của khách hàng chúng tôi đã ra sản phẩm gà rán KFC với hương vị thơm ngon không thua kém chất lượng của sản phẩm gà &nbsp;rán KFC thật.</p>\r\n\r\n<h2>Nguyên nhân ra đời của gà rán KFC</h2>\r\n\r\n<p>Gà KFC có rất nhiều mặt &nbsp;hàng hiện đang bán là: Cánh gà KFC, đùi gà KFC, gà &nbsp;viên, sụn gà... Tất cả điều có &nbsp;hương vị riêng hết và &nbsp;đặc biệt chúng rất là ngon. Nên khách hàng thường đến của hàng KFC để chon lựa và không khó chon được một món ăn ưng ý cho mình. Nhưng bên cạnh đó &nbsp;tiếp thu từ ý kiến khách hàng ching tôi nhận được một số thông tin như sau: Tốn thời gian để đến cửa hàng, giá món ăn quá cao ăn chưa đã, qua nhiều dầu mỡ.... Chính vì những nguyên nhân đó Nhà Xiên Que chúng &nbsp;tôi đã cho &nbsp;ra mắt sản phẩm gà rán KFC bao gòm:&nbsp;Cánh gà KFC,&nbsp;<a href=\"http://xienquegiasi.com/san-pham/dui-ga-kfc\">đùi gà KFC</a>,&nbsp;<a href=\"http://xienquegiasi.com/san-pham/ga-vien\">gà viên</a>.... Do chính chúng tôi sản xuất nhưng chất lượng không thua kém các sản phẩm của KFC, điều đó được chứng minh qua đơn hàng chúng tôi nhận được ngày càng nhiều lên trên tất cả các &nbsp;vùng, đặc biệt là miền Trung.</p>\r\n\r\n<p>Hiện gà rán KFC của chúng tôi số lượng bán ra hàng tháng là &nbsp;hơn 50Kg, chưa kể gà &nbsp;viên &nbsp;và gà xiêm tiêm - sản phẩm mới. Nên các bạn yên tâm về chất lượng vì chất lượng sẽ được kiểm tra tốt nhất là qua ý &nbsp;kiếm của khách hàng. Hãy liên hệ với chúng tôi các bạn nhé.</p>\r\n\r\n<h2>Cách làm&nbsp;<a href=\"http://xienquegiasi.com/san-pham/ga-chip\">gà rán kfc</a>&nbsp;ngon</h2>\r\n\r\n<p>Để &nbsp;có được một &nbsp;cánh gà kfc ngon các bạn phải chọn lựa nguyên kỹ càng từ nguyên liệu thô đó là cánh gà, cánh gà là phần ngon nhất trong trong các&nbsp;bộ phận &nbsp;của con gà, chúng ta thường nhầm lẫn là gà ngon nhất là đùi gà nhưng đó là sai lầm phần mềm và béo nhất lại là cánh gà -nên món&nbsp;cánh gà kfc&nbsp;là món ngon nhất của chúng tôi hiện&nbsp; nay bên cạnh đùi gà kfc. Cánh gà kfc được chọn là phải điều nhau trước hết nhằm tạo sự đẹp mắt &nbsp;cho người&nbsp;dùng, cánh gà phải tươi ngon được &nbsp;lấy sau khi giết gà và được rữa sạch và tẩm ướp gia vị trước khi tẩm bột xù.</p>\r\n\r\n<h2>Nguyên liệu ướp gà rán kfc</h2>\r\n\r\n<p>Mỗi nơi sản xuất điều có một bí quyết riêng cho sản phẩm của mình, và gà&nbsp; rán kfc của chúng&nbsp; tôi cũng vậy, đây là một bí quyết rất lâu do quá trình làm sản phẩm theo thời gian đút kết mà thành. Nhưng suy cho&nbsp; cùng nguyên liệu chính của món gà rán kfc này là: đường, tiêu, muối, trứng gà và bột xù…</p>\r\n\r\n<p>Trước khi&nbsp; thấm ướp các bạn ngâm cánh gà vào dung dịch muối để qua đêm nhằm lấy hết chất tanh&nbsp; trong cánh gà&nbsp; ra ngoài. Để tạo dung dịch bao ngoài&nbsp; cho cánh gà kfc các bạn dung một cái thao nhỏ tùy vào số lượng cánh gà mình làm mà có lượng nước khác nhau, cho long đỏ trứng, đường, tiêu muối sữa vào để tạo thành dung dịch sệt, các bạn lấy cánh gà nhúng&nbsp; và dung dịch sau đó tẩm bột xù lên thế là các bạn có món cánh gà rán kfc rồi đó.</p>\r\n\r\n<h2>Chiên gà rán kfc</h2>\r\n\r\n<p>Để gà rán kfc ngon và giòn các bạn nên đổ nhiều nhiều dầu để ngập cánh gà hoặc đùi gà. Để cho dầu sôi nhiều nhất sau đó để cánh gà vào, khi bột xù bên&nbsp; ngoài chuyển sang màu vàng nâu thế là bạn đã có món cánh&nbsp; gà kfc ngon tuyệt để thưởng thức rồi nhé.</p>\r\n\r\n<h2>Cách bảo quản</h2>\r\n\r\n<p>Để giữ được gà rán kfc tươi ngon các bạn nên để trong ngăn đông của tủ lạnh hoặc là ngăn đông của tủ đông, với cách bảo quản này các bạn có thể bảo quản được hơn 6 tháng.</p>\r\n\r\n<p>Để có được sản phẩm ưng ý nhất và để không phải vất vả đến các cửa hàng ăn uống các bạn hãy liên hệ ngay cho&nbsp;<a href=\"http://xienquegiasi.com/\">chúng tôi</a>&nbsp;để được chúng&nbsp; tôi tư vấn và ship hàng&nbsp; tận hàng&nbsp; tận nhà nhé. Sự hài lòng của&nbsp; các bạn là niềm tự hào và là động lực để chúng&nbsp; tôi tiếp tực kinh doanh mặt hàng này.</p>', 2, NULL, NULL, '2020-07-05 04:45:02', '2020-07-05 04:45:02', NULL),
(4, 'Combo gà rán D', 'combo-ga-ran-d', 3, '11505568213807052020wPjv0K41nv.jpeg', 1, 0, 0, '<p><a href=\"http://xienquegiasi.com/san-pham/canh-ga-kfc\">Gà rán KFC</a>&nbsp;từ lâu đã nổi tiếng bởi hương vị &nbsp;thơm ngon và giòn, nên có rất nhiều bạn trẻ, người lớn thích món ăn này và thường thưởng thức cùng với bạn bè và gia đình mỗi khi có những diệp đặc biệt hay dẫn con cái đi ăn cuối tuần. Để tối đa hóa quyền lợi cũng như thời gian của khách hàng chúng tôi đã ra sản phẩm gà rán KFC với hương vị thơm ngon không thua kém chất lượng của sản phẩm gà &nbsp;rán KFC thật.</p>\r\n\r\n<h2>Nguyên nhân ra đời của gà rán KFC</h2>\r\n\r\n<p>Gà KFC có rất nhiều mặt &nbsp;hàng hiện đang bán là: Cánh gà KFC, đùi gà KFC, gà &nbsp;viên, sụn gà... Tất cả điều có &nbsp;hương vị riêng hết và &nbsp;đặc biệt chúng rất là ngon. Nên khách hàng thường đến của hàng KFC để chon lựa và không khó chon được một món ăn ưng ý cho mình. Nhưng bên cạnh đó &nbsp;tiếp thu từ ý kiến khách hàng ching tôi nhận được một số thông tin như sau: Tốn thời gian để đến cửa hàng, giá món ăn quá cao ăn chưa đã, qua nhiều dầu mỡ.... Chính vì những nguyên nhân đó Nhà Xiên Que chúng &nbsp;tôi đã cho &nbsp;ra mắt sản phẩm gà rán KFC bao gòm:&nbsp;Cánh gà KFC,&nbsp;<a href=\"http://xienquegiasi.com/san-pham/dui-ga-kfc\">đùi gà KFC</a>,&nbsp;<a href=\"http://xienquegiasi.com/san-pham/ga-vien\">gà viên</a>.... Do chính chúng tôi sản xuất nhưng chất lượng không thua kém các sản phẩm của KFC, điều đó được chứng minh qua đơn hàng chúng tôi nhận được ngày càng nhiều lên trên tất cả các &nbsp;vùng, đặc biệt là miền Trung.</p>\r\n\r\n<p>Hiện gà rán KFC của chúng tôi số lượng bán ra hàng tháng là &nbsp;hơn 50Kg, chưa kể gà &nbsp;viên &nbsp;và gà xiêm tiêm - sản phẩm mới. Nên các bạn yên tâm về chất lượng vì chất lượng sẽ được kiểm tra tốt nhất là qua ý &nbsp;kiếm của khách hàng. Hãy liên hệ với chúng tôi các bạn nhé.</p>\r\n\r\n<h2>Cách làm&nbsp;<a href=\"http://xienquegiasi.com/san-pham/ga-chip\">gà rán kfc</a>&nbsp;ngon</h2>\r\n\r\n<p>Để &nbsp;có được một &nbsp;cánh gà kfc ngon các bạn phải chọn lựa nguyên kỹ càng từ nguyên liệu thô đó là cánh gà, cánh gà là phần ngon nhất trong trong các&nbsp;bộ phận &nbsp;của con gà, chúng ta thường nhầm lẫn là gà ngon nhất là đùi gà nhưng đó là sai lầm phần mềm và béo nhất lại là cánh gà -nên món&nbsp;cánh gà kfc&nbsp;là món ngon nhất của chúng tôi hiện&nbsp; nay bên cạnh đùi gà kfc. Cánh gà kfc được chọn là phải điều nhau trước hết nhằm tạo sự đẹp mắt &nbsp;cho người&nbsp;dùng, cánh gà phải tươi ngon được &nbsp;lấy sau khi giết gà và được rữa sạch và tẩm ướp gia vị trước khi tẩm bột xù.</p>\r\n\r\n<h2>Nguyên liệu ướp gà rán kfc</h2>\r\n\r\n<p>Mỗi nơi sản xuất điều có một bí quyết riêng cho sản phẩm của mình, và gà&nbsp; rán kfc của chúng&nbsp; tôi cũng vậy, đây là một bí quyết rất lâu do quá trình làm sản phẩm theo thời gian đút kết mà thành. Nhưng suy cho&nbsp; cùng nguyên liệu chính của món gà rán kfc này là: đường, tiêu, muối, trứng gà và bột xù…</p>\r\n\r\n<p>Trước khi&nbsp; thấm ướp các bạn ngâm cánh gà vào dung dịch muối để qua đêm nhằm lấy hết chất tanh&nbsp; trong cánh gà&nbsp; ra ngoài. Để tạo dung dịch bao ngoài&nbsp; cho cánh gà kfc các bạn dung một cái thao nhỏ tùy vào số lượng cánh gà mình làm mà có lượng nước khác nhau, cho long đỏ trứng, đường, tiêu muối sữa vào để tạo thành dung dịch sệt, các bạn lấy cánh gà nhúng&nbsp; và dung dịch sau đó tẩm bột xù lên thế là các bạn có món cánh gà rán kfc rồi đó.</p>\r\n\r\n<h2>Chiên gà rán kfc</h2>\r\n\r\n<p>Để gà rán kfc ngon và giòn các bạn nên đổ nhiều nhiều dầu để ngập cánh gà hoặc đùi gà. Để cho dầu sôi nhiều nhất sau đó để cánh gà vào, khi bột xù bên&nbsp; ngoài chuyển sang màu vàng nâu thế là bạn đã có món cánh&nbsp; gà kfc ngon tuyệt để thưởng thức rồi nhé.</p>\r\n\r\n<h2>Cách bảo quản</h2>\r\n\r\n<p>Để giữ được gà rán kfc tươi ngon các bạn nên để trong ngăn đông của tủ lạnh hoặc là ngăn đông của tủ đông, với cách bảo quản này các bạn có thể bảo quản được hơn 6 tháng.</p>\r\n\r\n<p>Để có được sản phẩm ưng ý nhất và để không phải vất vả đến các cửa hàng ăn uống các bạn hãy liên hệ ngay cho&nbsp;<a href=\"http://xienquegiasi.com/\">chúng tôi</a>&nbsp;để được chúng&nbsp; tôi tư vấn và ship hàng&nbsp; tận hàng&nbsp; tận nhà nhé. Sự hài lòng của&nbsp; các bạn là niềm tự hào và là động lực để chúng&nbsp; tôi tiếp tực kinh doanh mặt hàng này.</p>', '<p><a href=\"http://xienquegiasi.com/san-pham/canh-ga-kfc\">Gà rán KFC</a>&nbsp;từ lâu đã nổi tiếng bởi hương vị &nbsp;thơm ngon và giòn, nên có rất nhiều bạn trẻ, người lớn thích món ăn này và thường thưởng thức cùng với bạn bè và gia đình mỗi khi có những diệp đặc biệt hay dẫn con cái đi ăn cuối tuần. Để tối đa hóa quyền lợi cũng như thời gian của khách hàng chúng tôi đã ra sản phẩm gà rán KFC với hương vị thơm ngon không thua kém chất lượng của sản phẩm gà &nbsp;rán KFC thật.</p>\r\n\r\n<h2>Nguyên nhân ra đời của gà rán KFC</h2>\r\n\r\n<p>Gà KFC có rất nhiều mặt &nbsp;hàng hiện đang bán là: Cánh gà KFC, đùi gà KFC, gà &nbsp;viên, sụn gà... Tất cả điều có &nbsp;hương vị riêng hết và &nbsp;đặc biệt chúng rất là ngon. Nên khách hàng thường đến của hàng KFC để chon lựa và không khó chon được một món ăn ưng ý cho mình. Nhưng bên cạnh đó &nbsp;tiếp thu từ ý kiến khách hàng ching tôi nhận được một số thông tin như sau: Tốn thời gian để đến cửa hàng, giá món ăn quá cao ăn chưa đã, qua nhiều dầu mỡ.... Chính vì những nguyên nhân đó Nhà Xiên Que chúng &nbsp;tôi đã cho &nbsp;ra mắt sản phẩm gà rán KFC bao gòm:&nbsp;Cánh gà KFC,&nbsp;<a href=\"http://xienquegiasi.com/san-pham/dui-ga-kfc\">đùi gà KFC</a>,&nbsp;<a href=\"http://xienquegiasi.com/san-pham/ga-vien\">gà viên</a>.... Do chính chúng tôi sản xuất nhưng chất lượng không thua kém các sản phẩm của KFC, điều đó được chứng minh qua đơn hàng chúng tôi nhận được ngày càng nhiều lên trên tất cả các &nbsp;vùng, đặc biệt là miền Trung.</p>\r\n\r\n<p>Hiện gà rán KFC của chúng tôi số lượng bán ra hàng tháng là &nbsp;hơn 50Kg, chưa kể gà &nbsp;viên &nbsp;và gà xiêm tiêm - sản phẩm mới. Nên các bạn yên tâm về chất lượng vì chất lượng sẽ được kiểm tra tốt nhất là qua ý &nbsp;kiếm của khách hàng. Hãy liên hệ với chúng tôi các bạn nhé.</p>\r\n\r\n<h2>Cách làm&nbsp;<a href=\"http://xienquegiasi.com/san-pham/ga-chip\">gà rán kfc</a>&nbsp;ngon</h2>\r\n\r\n<p>Để &nbsp;có được một &nbsp;cánh gà kfc ngon các bạn phải chọn lựa nguyên kỹ càng từ nguyên liệu thô đó là cánh gà, cánh gà là phần ngon nhất trong trong các&nbsp;bộ phận &nbsp;của con gà, chúng ta thường nhầm lẫn là gà ngon nhất là đùi gà nhưng đó là sai lầm phần mềm và béo nhất lại là cánh gà -nên món&nbsp;cánh gà kfc&nbsp;là món ngon nhất của chúng tôi hiện&nbsp; nay bên cạnh đùi gà kfc. Cánh gà kfc được chọn là phải điều nhau trước hết nhằm tạo sự đẹp mắt &nbsp;cho người&nbsp;dùng, cánh gà phải tươi ngon được &nbsp;lấy sau khi giết gà và được rữa sạch và tẩm ướp gia vị trước khi tẩm bột xù.</p>\r\n\r\n<h2>Nguyên liệu ướp gà rán kfc</h2>\r\n\r\n<p>Mỗi nơi sản xuất điều có một bí quyết riêng cho sản phẩm của mình, và gà&nbsp; rán kfc của chúng&nbsp; tôi cũng vậy, đây là một bí quyết rất lâu do quá trình làm sản phẩm theo thời gian đút kết mà thành. Nhưng suy cho&nbsp; cùng nguyên liệu chính của món gà rán kfc này là: đường, tiêu, muối, trứng gà và bột xù…</p>\r\n\r\n<p>Trước khi&nbsp; thấm ướp các bạn ngâm cánh gà vào dung dịch muối để qua đêm nhằm lấy hết chất tanh&nbsp; trong cánh gà&nbsp; ra ngoài. Để tạo dung dịch bao ngoài&nbsp; cho cánh gà kfc các bạn dung một cái thao nhỏ tùy vào số lượng cánh gà mình làm mà có lượng nước khác nhau, cho long đỏ trứng, đường, tiêu muối sữa vào để tạo thành dung dịch sệt, các bạn lấy cánh gà nhúng&nbsp; và dung dịch sau đó tẩm bột xù lên thế là các bạn có món cánh gà rán kfc rồi đó.</p>\r\n\r\n<h2>Chiên gà rán kfc</h2>\r\n\r\n<p>Để gà rán kfc ngon và giòn các bạn nên đổ nhiều nhiều dầu để ngập cánh gà hoặc đùi gà. Để cho dầu sôi nhiều nhất sau đó để cánh gà vào, khi bột xù bên&nbsp; ngoài chuyển sang màu vàng nâu thế là bạn đã có món cánh&nbsp; gà kfc ngon tuyệt để thưởng thức rồi nhé.</p>\r\n\r\n<h2>Cách bảo quản</h2>\r\n\r\n<p>Để giữ được gà rán kfc tươi ngon các bạn nên để trong ngăn đông của tủ lạnh hoặc là ngăn đông của tủ đông, với cách bảo quản này các bạn có thể bảo quản được hơn 6 tháng.</p>\r\n\r\n<p>Để có được sản phẩm ưng ý nhất và để không phải vất vả đến các cửa hàng ăn uống các bạn hãy liên hệ ngay cho&nbsp;<a href=\"http://xienquegiasi.com/\">chúng tôi</a>&nbsp;để được chúng&nbsp; tôi tư vấn và ship hàng&nbsp; tận hàng&nbsp; tận nhà nhé. Sự hài lòng của&nbsp; các bạn là niềm tự hào và là động lực để chúng&nbsp; tôi tiếp tực kinh doanh mặt hàng này.</p>', 2, NULL, NULL, '2020-07-05 04:50:55', '2020-07-05 04:50:55', NULL),
(5, 'Combo cơm A', 'combo-com-a', 3, '11550719915707052020NFV8jWn4kr.png', 1, 0, 0, '<p>Lấy ý tưởng từ&nbsp;xứ sở Hàn quốc với nét văn hóa ẩm thực độc đáo. KFC cho ra mắt một sản phẩm mới “cực hot” mang tên “Cơm Gà Nướng Kim Chi Hàn Quốc”. Miếng gà phi-lê được nướng chậm rãi cho đến khi lớp thịt mọng nước và lớp da giòn giòn dai dai. Phần cơm gà được phục vụ kèm với bắp cải trộn Kim Chi có 102 của KFC giúp tạo nên hương vị khó quên.</p>\r\n\r\n<p>Hiện sản phẩm đã có mặt tại tất cả nhà hàng KFC trên toàn quốc với giá dùng thử áp dụng đến 4/10/2019 chỉ với 35.000 đồng/phần (giá gốc 45.000 đồng/phần).</p>\r\n\r\n<p>Hoặc chọn ngay combo Cơm Gà Nướng Kim Chi Hàn Quốc với giá chỉ 81.000 đồng/combo bao gồm: 1 Cơm Gà Nướng Kim Chi Hàn Quốc + 1 miếng Gà Rán. Tặng thêm 1 Bánh Trứng thơm ngon khi ăn tại nhà hàng hoặc mua mang về.</p>\r\n\r\n<p>Hãy đến KFC và cảm nhận hương vị Hàn Quốc rất riêng từ Cơm Gà Nướng Kim Chi Hàn Quốc mới!</p>\r\n\r\n<p>#KFCVietnam# ComGaNuongKimChiHanQuoc</p>', '<p>Lấy ý tưởng từ&nbsp;xứ sở Hàn quốc với nét văn hóa ẩm thực độc đáo. KFC cho ra mắt một sản phẩm mới “cực hot” mang tên “Cơm Gà Nướng Kim Chi Hàn Quốc”. Miếng gà phi-lê được nướng chậm rãi cho đến khi lớp thịt mọng nước và lớp da giòn giòn dai dai. Phần cơm gà được phục vụ kèm với bắp cải trộn Kim Chi có 102 của KFC giúp tạo nên hương vị khó quên.</p>\r\n\r\n<p>Hiện sản phẩm đã có mặt tại tất cả nhà hàng KFC trên toàn quốc với giá dùng thử áp dụng đến 4/10/2019 chỉ với 35.000 đồng/phần (giá gốc 45.000 đồng/phần).</p>\r\n\r\n<p>Hoặc chọn ngay combo Cơm Gà Nướng Kim Chi Hàn Quốc với giá chỉ 81.000 đồng/combo bao gồm: 1 Cơm Gà Nướng Kim Chi Hàn Quốc + 1 miếng Gà Rán. Tặng thêm 1 Bánh Trứng thơm ngon khi ăn tại nhà hàng hoặc mua mang về.</p>\r\n\r\n<p>Hãy đến KFC và cảm nhận hương vị Hàn Quốc rất riêng từ Cơm Gà Nướng Kim Chi Hàn Quốc mới!</p>\r\n\r\n<p>#KFCVietnam# ComGaNuongKimChiHanQuoc</p>', 2, NULL, NULL, '2020-07-05 04:55:07', '2020-07-05 04:55:07', NULL),
(6, 'Combo cơm B', 'combo-com-b', 3, '11564185438207052020tukZ3mIqfh.jpeg', 1, 0, 1, '<p>Lấy ý tưởng từ&nbsp;xứ sở Hàn quốc với nét văn hóa ẩm thực độc đáo. KFC cho ra mắt một sản phẩm mới “cực hot” mang tên “Cơm Gà Nướng Kim Chi Hàn Quốc”. Miếng gà phi-lê được nướng chậm rãi cho đến khi lớp thịt mọng nước và lớp da giòn giòn dai dai. Phần cơm gà được phục vụ kèm với bắp cải trộn Kim Chi có 102 của KFC giúp tạo nên hương vị khó quên.</p>\r\n\r\n<p>Hiện sản phẩm đã có mặt tại tất cả nhà hàng KFC trên toàn quốc với giá dùng thử áp dụng đến 4/10/2019 chỉ với 35.000 đồng/phần (giá gốc 45.000 đồng/phần).</p>\r\n\r\n<p>Hoặc chọn ngay combo Cơm Gà Nướng Kim Chi Hàn Quốc với giá chỉ 81.000 đồng/combo bao gồm: 1 Cơm Gà Nướng Kim Chi Hàn Quốc + 1 miếng Gà Rán. Tặng thêm 1 Bánh Trứng thơm ngon khi ăn tại nhà hàng hoặc mua mang về.</p>\r\n\r\n<p>Hãy đến KFC và cảm nhận hương vị Hàn Quốc rất riêng từ Cơm Gà Nướng Kim Chi Hàn Quốc mới!</p>\r\n\r\n<p>#KFCVietnam# ComGaNuongKimChiHanQuoc</p>', '<p>Lấy ý tưởng từ&nbsp;xứ sở Hàn quốc với nét văn hóa ẩm thực độc đáo. KFC cho ra mắt một sản phẩm mới “cực hot” mang tên “Cơm Gà Nướng Kim Chi Hàn Quốc”. Miếng gà phi-lê được nướng chậm rãi cho đến khi lớp thịt mọng nước và lớp da giòn giòn dai dai. Phần cơm gà được phục vụ kèm với bắp cải trộn Kim Chi có 102 của KFC giúp tạo nên hương vị khó quên.</p>\r\n\r\n<p>Hiện sản phẩm đã có mặt tại tất cả nhà hàng KFC trên toàn quốc với giá dùng thử áp dụng đến 4/10/2019 chỉ với 35.000 đồng/phần (giá gốc 45.000 đồng/phần).</p>\r\n\r\n<p>Hoặc chọn ngay combo Cơm Gà Nướng Kim Chi Hàn Quốc với giá chỉ 81.000 đồng/combo bao gồm: 1 Cơm Gà Nướng Kim Chi Hàn Quốc + 1 miếng Gà Rán. Tặng thêm 1 Bánh Trứng thơm ngon khi ăn tại nhà hàng hoặc mua mang về.</p>\r\n\r\n<p>Hãy đến KFC và cảm nhận hương vị Hàn Quốc rất riêng từ Cơm Gà Nướng Kim Chi Hàn Quốc mới!</p>\r\n\r\n<p>#KFCVietnam# ComGaNuongKimChiHanQuoc</p>', 2, NULL, NULL, '2020-07-05 04:56:41', '2020-07-05 13:59:38', NULL),
(7, 'Combo cơm C', 'combo-com-c', 3, '11574143283507052020MslmS0969b.jpeg', 1, 0, 0, '<p>Lấy ý tưởng từ&nbsp;xứ sở Hàn quốc với nét văn hóa ẩm thực độc đáo. KFC cho ra mắt một sản phẩm mới “cực hot” mang tên “Cơm Gà Nướng Kim Chi Hàn Quốc”. Miếng gà phi-lê được nướng chậm rãi cho đến khi lớp thịt mọng nước và lớp da giòn giòn dai dai. Phần cơm gà được phục vụ kèm với bắp cải trộn Kim Chi có 102 của KFC giúp tạo nên hương vị khó quên.</p>\r\n\r\n<p>Hiện sản phẩm đã có mặt tại tất cả nhà hàng KFC trên toàn quốc với giá dùng thử áp dụng đến 4/10/2019 chỉ với 35.000 đồng/phần (giá gốc 45.000 đồng/phần).</p>\r\n\r\n<p>Hoặc chọn ngay combo Cơm Gà Nướng Kim Chi Hàn Quốc với giá chỉ 81.000 đồng/combo bao gồm: 1 Cơm Gà Nướng Kim Chi Hàn Quốc + 1 miếng Gà Rán. Tặng thêm 1 Bánh Trứng thơm ngon khi ăn tại nhà hàng hoặc mua mang về.</p>\r\n\r\n<p>Hãy đến KFC và cảm nhận hương vị Hàn Quốc rất riêng từ Cơm Gà Nướng Kim Chi Hàn Quốc mới!</p>\r\n\r\n<p>#KFCVietnam# ComGaNuongKimChiHanQuoc</p>', '<p>Lấy ý tưởng từ&nbsp;xứ sở Hàn quốc với nét văn hóa ẩm thực độc đáo. KFC cho ra mắt một sản phẩm mới “cực hot” mang tên “Cơm Gà Nướng Kim Chi Hàn Quốc”. Miếng gà phi-lê được nướng chậm rãi cho đến khi lớp thịt mọng nước và lớp da giòn giòn dai dai. Phần cơm gà được phục vụ kèm với bắp cải trộn Kim Chi có 102 của KFC giúp tạo nên hương vị khó quên.</p>\r\n\r\n<p>Hiện sản phẩm đã có mặt tại tất cả nhà hàng KFC trên toàn quốc với giá dùng thử áp dụng đến 4/10/2019 chỉ với 35.000 đồng/phần (giá gốc 45.000 đồng/phần).</p>\r\n\r\n<p>Hoặc chọn ngay combo Cơm Gà Nướng Kim Chi Hàn Quốc với giá chỉ 81.000 đồng/combo bao gồm: 1 Cơm Gà Nướng Kim Chi Hàn Quốc + 1 miếng Gà Rán. Tặng thêm 1 Bánh Trứng thơm ngon khi ăn tại nhà hàng hoặc mua mang về.</p>\r\n\r\n<p>Hãy đến KFC và cảm nhận hương vị Hàn Quốc rất riêng từ Cơm Gà Nướng Kim Chi Hàn Quốc mới!</p>\r\n\r\n<p>#KFCVietnam# ComGaNuongKimChiHanQuoc</p>', 2, NULL, NULL, '2020-07-05 04:57:41', '2020-07-05 04:57:41', NULL),
(8, 'Cà phê phim đen đá', 'ca-phe-phim-den-da', 2, '12091521906407052020x3ELMcqoLa.png', 1, 0, 10, '<p>Người Việt Nam uống cà phê như một văn hóa. Một ly cà phê truyền thống đậm chất Việt Nam sẽ luôn luôn sẵn sàng cho bạn tại Circle K vào bất cứ lúc nào trong ngày. Hệ thống Circle K phục vụ 2 loại: Cà Phê Đen &amp; Cà Phê Sữa - nóng và đá. Bạn có thể uống tại chỗ hoặc mang đi</p>', '<p>Người Việt Nam uống cà phê như một văn hóa. Một ly cà phê truyền thống đậm chất Việt Nam sẽ luôn luôn sẵn sàng cho bạn tại Circle K vào bất cứ lúc nào trong ngày. Hệ thống Circle K phục vụ 2 loại: Cà Phê Đen &amp; Cà Phê Sữa - nóng và đá. Bạn có thể uống tại chỗ hoặc mang đi</p>', 4, NULL, NULL, '2020-07-05 05:09:15', '2020-07-06 14:28:32', NULL),
(9, 'Cà phê phim sữa đá', 'ca-phe-phim-sua-da', 2, '12100357453607052020xaKpzmIXz5.png', 1, 0, 9, '<p>Người Việt Nam uống cà phê như một văn hóa. Một ly cà phê truyền thống đậm chất Việt Nam sẽ luôn luôn sẵn sàng cho bạn tại Circle K vào bất cứ lúc nào trong ngày. Hệ thống Circle K phục vụ 2 loại: Cà Phê Đen &amp; Cà Phê Sữa - nóng và đá. Bạn có thể uống tại chỗ hoặc mang đi.</p>', '<p>Người Việt Nam uống cà phê như một văn hóa. Một ly cà phê truyền thống đậm chất Việt Nam sẽ luôn luôn sẵn sàng cho bạn tại Circle K vào bất cứ lúc nào trong ngày. Hệ thống Circle K phục vụ 2 loại: Cà Phê Đen &amp; Cà Phê Sữa - nóng và đá. Bạn có thể uống tại chỗ hoặc mang đi.</p>', 4, NULL, NULL, '2020-07-05 05:10:03', '2020-07-06 14:28:39', NULL),
(10, 'Sữa tươi cà phê', 'sua-tuoi-ca-phe', 2, '121041311877070520202F16MElE1u.png', 1, 0, 4, '<p>Người Việt Nam uống cà phê như một văn hóa. Một ly cà phê truyền thống đậm chất Việt Nam sẽ luôn luôn sẵn sàng cho bạn tại Circle K vào bất cứ lúc nào trong ngày. Hệ thống Circle K phục vụ 2 loại: Cà Phê Đen &amp; Cà Phê Sữa - nóng và đá. Bạn có thể uống tại chỗ hoặc mang đi.</p>', '<p>Người Việt Nam uống cà phê như một văn hóa. Một ly cà phê truyền thống đậm chất Việt Nam sẽ luôn luôn sẵn sàng cho bạn tại Circle K vào bất cứ lúc nào trong ngày. Hệ thống Circle K phục vụ 2 loại: Cà Phê Đen &amp; Cà Phê Sữa - nóng và đá. Bạn có thể uống tại chỗ hoặc mang đi.</p>', 4, NULL, NULL, '2020-07-05 05:10:41', '2020-07-06 14:28:44', NULL),
(11, 'Trà chanh', 'tra-chanh', 2, '12111505018007052020LSpOg3Vm3t.png', 1, 0, 0, '<p>Tại Circle K, những sản phẩm quen thuộc từ nhãn hàng Nestlé được pha chế theo công thức riêng mang lại cảm giác sảng khoái và tươi mát hơn.<br />\r\nHiện tại có 2 dòng sản phẩm phổ biến: Trà Chanh và Milo.</p>', '<p>Tại Circle K, những sản phẩm quen thuộc từ nhãn hàng Nestlé được pha chế theo công thức riêng mang lại cảm giác sảng khoái và tươi mát hơn.<br />\r\nHiện tại có 2 dòng sản phẩm phổ biến: Trà Chanh và Milo.</p>', 4, NULL, NULL, '2020-07-05 05:11:15', '2020-07-05 05:11:15', NULL),
(12, 'Trà đà', 'tra-da', 2, '12114861565407052020vkaC5GClzI.png', 1, 0, 0, '<p>Trà Đào được pha chế ngay tại cửa hàng với hương vị thơm ngon, mát lạnh. Không chỉ vậy, ly trà thêm phần đậm đà hơn với lát đào giòn ngọt được thêm vào.</p>', '<p>Trà Đào được pha chế ngay tại cửa hàng với hương vị thơm ngon, mát lạnh. Không chỉ vậy, ly trà thêm phần đậm đà hơn với lát đào giòn ngọt được thêm vào.</p>', 4, NULL, NULL, '2020-07-05 05:11:48', '2020-07-05 05:11:48', NULL),
(13, 'Milo', 'milo', 2, '121222969298070520207o96D9IGJE.png', 1, 0, 0, '<p>Tại Circle K, những sản phẩm quen thuộc từ nhãn hàng Nestlé được pha chế theo công thức riêng mang lại cảm giác sảng khoái và tươi mát hơn.<br />\r\nHiện tại có 2 dòng sản phẩm phổ biến: Trà Chanh và Milo.</p>', '<p>Tại Circle K, những sản phẩm quen thuộc từ nhãn hàng Nestlé được pha chế theo công thức riêng mang lại cảm giác sảng khoái và tươi mát hơn.<br />\r\nHiện tại có 2 dòng sản phẩm phổ biến: Trà Chanh và Milo.</p>', 4, NULL, NULL, '2020-07-05 05:12:22', '2020-07-05 05:12:22', NULL),
(14, 'Trà Sữa Thái (Đỏ)', 'tra-sua-thai-do', 2, '12125912761907052020u7kZgya9fX.png', 1, 0, 0, '<p>Trà Sữa Thái là một trong những thức uống được giới trẻ ưa chuộng. Với Trà Sữa Thái Xanh hay Đỏ, bạn có thể tận hưởng được hương vị tươi mát, đậm chất ngọt ngào đặc trưng của trà sữa. Hơn thế nữa, sự kết hợp giữa Trà Sữa Thái với Kem Bồng Bềnh chắc chắn là lựa chọn độc đáo chỉ có tại Circle K.</p>', '<p>Trà Sữa Thái là một trong những thức uống được giới trẻ ưa chuộng. Với Trà Sữa Thái Xanh hay Đỏ, bạn có thể tận hưởng được hương vị tươi mát, đậm chất ngọt ngào đặc trưng của trà sữa. Hơn thế nữa, sự kết hợp giữa Trà Sữa Thái với Kem Bồng Bềnh chắc chắn là lựa chọn độc đáo chỉ có tại Circle K.</p>', 4, NULL, NULL, '2020-07-05 05:12:59', '2020-07-05 05:12:59', NULL),
(15, 'Trà Sữa Thái (Xanh)', 'tra-sua-thai-xanh', 2, '12133377135807052020axsuWcCvgj.png', 1, 0, 0, '<p>Trà Sữa Thái là một trong những thức uống được giới trẻ ưa chuộng. Với Trà Sữa Thái Xanh hay Đỏ, bạn có thể tận hưởng được hương vị tươi mát, đậm chất ngọt ngào đặc trưng của trà sữa. Hơn thế nữa, sự kết hợp giữa Trà Sữa Thái với Kem Bồng Bềnh chắc chắn là lựa chọn độc đáo chỉ có tại Circle K.</p>', '<p>Trà Sữa Thái là một trong những thức uống được giới trẻ ưa chuộng. Với Trà Sữa Thái Xanh hay Đỏ, bạn có thể tận hưởng được hương vị tươi mát, đậm chất ngọt ngào đặc trưng của trà sữa. Hơn thế nữa, sự kết hợp giữa Trà Sữa Thái với Kem Bồng Bềnh chắc chắn là lựa chọn độc đáo chỉ có tại Circle K.</p>', 4, NULL, NULL, '2020-07-05 05:13:33', '2020-07-05 05:13:33', NULL),
(16, 'FROSTER Unicorn', 'froster-unicorn', 2, '12140978409007052020S8RmM7diyJ.png', 1, 0, 0, '<p>Trà Sữa Thái là một trong những thức uống được giới trẻ ưa chuộng. Với Trà Sữa Thái Xanh hay Đỏ, bạn có thể tận hưởng được hương vị tươi mát, đậm chất ngọt ngào đặc trưng của trà sữa. Hơn thế nữa, sự kết hợp giữa Trà Sữa Thái với Kem Bồng Bềnh chắc chắn là lựa chọn độc đáo chỉ có tại Circle K.</p>', '<p>Trà Sữa Thái là một trong những thức uống được giới trẻ ưa chuộng. Với Trà Sữa Thái Xanh hay Đỏ, bạn có thể tận hưởng được hương vị tươi mát, đậm chất ngọt ngào đặc trưng của trà sữa. Hơn thế nữa, sự kết hợp giữa Trà Sữa Thái với Kem Bồng Bềnh chắc chắn là lựa chọn độc đáo chỉ có tại Circle K.</p>', 4, NULL, NULL, '2020-07-05 05:14:09', '2020-07-05 05:14:09', NULL),
(17, 'FROSTER Phúc Bồn Tử Xanh', 'froster-phuc-bon-tu-xanh', 2, '121443241845070520201NnQ1zc1U5.png', 1, 0, 0, '<p>Froster là một thương hiệu giải khát riêng của Circle K được pha chế từ nguồn nguyên liệu si rô đã có danh tiếng gần 100 năm tại Mỹ, tạo ra những ly si rô tuyết Froster hấp dẫn mang hương vị trái cây tươi mát và đầy màu sắc. Bạn cũng có thể tự do tạo hương vị riêng của chính bạn bằng cách pha trộn những vị trái cây khác nhau, cho bạn những trải nghiệm hoàn toàn mới mà không thể tìm thấy ở bất cứ đâu.</p>\r\n\r\n<p>Hiện tại Froster có rất nhiều mùi vị, bao gồm: dâu tây, phúc bồn tử xanh, đào, táo xanh, chanh dây, việt quất... thay đổi theo mùa.</p>', '<p>Froster là một thương hiệu giải khát riêng của Circle K được pha chế từ nguồn nguyên liệu si rô đã có danh tiếng gần 100 năm tại Mỹ, tạo ra những ly si rô tuyết Froster hấp dẫn mang hương vị trái cây tươi mát và đầy màu sắc. Bạn cũng có thể tự do tạo hương vị riêng của chính bạn bằng cách pha trộn những vị trái cây khác nhau, cho bạn những trải nghiệm hoàn toàn mới mà không thể tìm thấy ở bất cứ đâu.</p>\r\n\r\n<p>Hiện tại Froster có rất nhiều mùi vị, bao gồm: dâu tây, phúc bồn tử xanh, đào, táo xanh, chanh dây, việt quất... thay đổi theo mùa.</p>', 4, NULL, NULL, '2020-07-05 05:14:43', '2020-07-05 05:14:43', NULL),
(18, 'FROSTER Dâu Tây', 'froster-dau-tay', 2, '12151409125807052020e2AR1ZKdpq.png', 1, 0, 0, '<p>Froster là một thương hiệu giải khát riêng của Circle K được pha chế từ nguồn nguyên liệu si rô đã có danh tiếng gần 100 năm tại Mỹ, tạo ra những ly si rô tuyết Froster hấp dẫn mang hương vị trái cây tươi mát và đầy màu sắc. Bạn cũng có thể tự do tạo hương vị riêng của chính bạn bằng cách pha trộn những vị trái cây khác nhau, cho bạn những trải nghiệm hoàn toàn mới mà không thể tìm thấy ở bất cứ đâu.</p>\r\n\r\n<p>Hiện tại Froster có rất nhiều mùi vị, bao gồm: dâu tây, phúc bồn tử xanh, đào, việt quất, táo xanh, chanh dây... thay đổi theo mùa.</p>', '<p>Froster là một thương hiệu giải khát riêng của Circle K được pha chế từ nguồn nguyên liệu si rô đã có danh tiếng gần 100 năm tại Mỹ, tạo ra những ly si rô tuyết Froster hấp dẫn mang hương vị trái cây tươi mát và đầy màu sắc. Bạn cũng có thể tự do tạo hương vị riêng của chính bạn bằng cách pha trộn những vị trái cây khác nhau, cho bạn những trải nghiệm hoàn toàn mới mà không thể tìm thấy ở bất cứ đâu.</p>\r\n\r\n<p>Hiện tại Froster có rất nhiều mùi vị, bao gồm: dâu tây, phúc bồn tử xanh, đào, việt quất, táo xanh, chanh dây... thay đổi theo mùa.</p>', 4, NULL, NULL, '2020-07-05 05:15:14', '2020-07-05 05:15:14', NULL);
INSERT INTO `products` (`id`, `name`, `slug`, `category_id`, `image`, `status`, `likes`, `views`, `content`, `detail`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(19, 'Espresso/ Americano/ Latte/ Cappuccino', 'espresso-americano-latte-cappuccino', 2, '12154504753807052020zYxYzGfCt7.png', 1, 0, 1, '<p>Cà phê Mỹ tại Circle K được pha chế bằng nguyên liệu chọn lọc được nhập khẩu thông qua nhà cung cấp có uy tín trong ngành cà phê, là loại cà phê rang xay tại chỗ bằng máy làm cà phê chuyên dụng, tạo ra các hương vị đặc trưng của dòng cà phê cao cấp: Espresso, Americano, Cappuchino và Latte.</p>', '<p>Cà phê Mỹ tại Circle K được pha chế bằng nguyên liệu chọn lọc được nhập khẩu thông qua nhà cung cấp có uy tín trong ngành cà phê, là loại cà phê rang xay tại chỗ bằng máy làm cà phê chuyên dụng, tạo ra các hương vị đặc trưng của dòng cà phê cao cấp: Espresso, Americano, Cappuchino và Latte.</p>', 4, NULL, NULL, '2020-07-05 05:15:45', '2020-07-05 14:01:50', NULL),
(20, 'Sữa uống lúa mạch Milo', 'sua-uong-lua-mach-milo', 9, '21204784831707052020su94x9iAuZ.jpeg', 1, 0, 1, '<p><strong>Thức uống lúa mạch Ovaltine hộp 180ml&nbsp;</strong>được làm từ sữa và lúa mạch bổ dưỡng, chế biến theo công thức dành riêng cho trẻ. Sản phẩm cung cấp choline, taurin, axit folic là những chất quan trọng hỗ trợ sự phát triển của não, giúp trí não hoạt động tốt hơn. Nguồn canxi trong sữa dồi dào giúp trẻ tăng trưởng về chiều cao hiệu quả. &nbsp;</p>\r\n\r\n<p><strong>Thức uống lúa mạch Ovaltine hộp 180ml&nbsp;</strong>có hương vị thơm ngon, độ ngọt vừa phải, giúp bổ sung nguồn năng lượng thích hợp cho trẻ bắt đầu ngày mới đầy khỏe khoắn và năng động. Thức uống được đóng hộp nhỏ gọn, tiện lợi rất dễ mang theo.</p>\r\n\r\n<p><img alt=\"Sữa lúa mạch Ovaltine 180ML, Giá 5/2020\" src=\"https://img.sosanhgia.com/images/b10c57d7406b4bb792dc5534c294d4a0/sa-la-mch-ovaltine-180ml.jpeg\" /></p>\r\n\r\n<p><strong>Thức uống lúa mạch Ovaltine 180ml&nbsp;</strong>được sản xuất trên dây chuyền công nghệ hiện đại, hợp vệ sinh, đảm bảo đúng tiêu chuẩn vệ sinh an toàn thực phẩm.</p>\r\n\r\n<p><strong>Sử dụng Thức uống lúa mạch Ovaltine hộp 180ml&nbsp;</strong>thường xuyên giúp bổ sung lượng canxi, cải thiện vóc dáng cũng như tăng cường sự cứng cáp cho xương.</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng:&nbsp;</strong></p>\r\n\r\n<p>- Lắc đều trước khi uống. Ngon hơn khi uống lạnh.&nbsp;</p>\r\n\r\n<p>- Không dùng cho trẻ dưới 1 tuổi.&nbsp;</p>\r\n\r\n<p>- Dùng 2 hộp mỗi ngày mang đến hiệu quả tốt cho người sử dụng.</p>\r\n\r\n<p><strong>Hướng dẫn bảo quản:&nbsp;</strong>Bảo quản nơi khô ráo và thoáng mát</p>', '<p><strong>Thức uống lúa mạch Ovaltine hộp 180ml&nbsp;</strong>được làm từ sữa và lúa mạch bổ dưỡng, chế biến theo công thức dành riêng cho trẻ. Sản phẩm cung cấp choline, taurin, axit folic là những chất quan trọng hỗ trợ sự phát triển của não, giúp trí não hoạt động tốt hơn. Nguồn canxi trong sữa dồi dào giúp trẻ tăng trưởng về chiều cao hiệu quả. &nbsp;</p>\r\n\r\n<p><strong>Thức uống lúa mạch Ovaltine hộp 180ml&nbsp;</strong>có hương vị thơm ngon, độ ngọt vừa phải, giúp bổ sung nguồn năng lượng thích hợp cho trẻ bắt đầu ngày mới đầy khỏe khoắn và năng động. Thức uống được đóng hộp nhỏ gọn, tiện lợi rất dễ mang theo.</p>\r\n\r\n<p><img alt=\"Sữa lúa mạch Ovaltine 180ML, Giá 5/2020\" src=\"https://img.sosanhgia.com/images/b10c57d7406b4bb792dc5534c294d4a0/sa-la-mch-ovaltine-180ml.jpeg\" /></p>\r\n\r\n<p><strong>Thức uống lúa mạch Ovaltine 180ml&nbsp;</strong>được sản xuất trên dây chuyền công nghệ hiện đại, hợp vệ sinh, đảm bảo đúng tiêu chuẩn vệ sinh an toàn thực phẩm.</p>\r\n\r\n<p><strong>Sử dụng Thức uống lúa mạch Ovaltine hộp 180ml&nbsp;</strong>thường xuyên giúp bổ sung lượng canxi, cải thiện vóc dáng cũng như tăng cường sự cứng cáp cho xương.</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng:&nbsp;</strong></p>\r\n\r\n<p>- Lắc đều trước khi uống. Ngon hơn khi uống lạnh.&nbsp;</p>\r\n\r\n<p>- Không dùng cho trẻ dưới 1 tuổi.&nbsp;</p>\r\n\r\n<p>- Dùng 2 hộp mỗi ngày mang đến hiệu quả tốt cho người sử dụng.</p>\r\n\r\n<p><strong>Hướng dẫn bảo quản:&nbsp;</strong>Bảo quản nơi khô ráo và thoáng mát</p>', 5, NULL, NULL, '2020-07-05 14:18:48', '2020-07-05 14:21:46', NULL),
(21, 'Sữa uống lúa mạch Milo', 'sua-uong-lua-mach-milo', 9, '21204784831707052020su94x9iAuZ.jpeg', 1, 0, 2, '<p><strong>Thức uống lúa mạch Ovaltine hộp 180ml&nbsp;</strong>được làm từ sữa và lúa mạch bổ dưỡng, chế biến theo công thức dành riêng cho trẻ. Sản phẩm cung cấp choline, taurin, axit folic là những chất quan trọng hỗ trợ sự phát triển của não, giúp trí não hoạt động tốt hơn. Nguồn canxi trong sữa dồi dào giúp trẻ tăng trưởng về chiều cao hiệu quả. &nbsp;</p>\r\n\r\n<p><strong>Thức uống lúa mạch Ovaltine hộp 180ml&nbsp;</strong>có hương vị thơm ngon, độ ngọt vừa phải, giúp bổ sung nguồn năng lượng thích hợp cho trẻ bắt đầu ngày mới đầy khỏe khoắn và năng động. Thức uống được đóng hộp nhỏ gọn, tiện lợi rất dễ mang theo.</p>\r\n\r\n<p><img alt=\"Sữa lúa mạch Ovaltine 180ML, Giá 5/2020\" src=\"https://img.sosanhgia.com/images/b10c57d7406b4bb792dc5534c294d4a0/sa-la-mch-ovaltine-180ml.jpeg\" /></p>\r\n\r\n<p><strong>Thức uống lúa mạch Ovaltine 180ml&nbsp;</strong>được sản xuất trên dây chuyền công nghệ hiện đại, hợp vệ sinh, đảm bảo đúng tiêu chuẩn vệ sinh an toàn thực phẩm.</p>\r\n\r\n<p><strong>Sử dụng Thức uống lúa mạch Ovaltine hộp 180ml&nbsp;</strong>thường xuyên giúp bổ sung lượng canxi, cải thiện vóc dáng cũng như tăng cường sự cứng cáp cho xương.</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng:&nbsp;</strong></p>\r\n\r\n<p>- Lắc đều trước khi uống. Ngon hơn khi uống lạnh.&nbsp;</p>\r\n\r\n<p>- Không dùng cho trẻ dưới 1 tuổi.&nbsp;</p>\r\n\r\n<p>- Dùng 2 hộp mỗi ngày mang đến hiệu quả tốt cho người sử dụng.</p>\r\n\r\n<p><strong>Hướng dẫn bảo quản:&nbsp;</strong>Bảo quản nơi khô ráo và thoáng mát</p>', '<p>&nbsp;</p>\r\n\r\n<p><strong>Thức uống lúa mạch Ovaltine hộp 180ml&nbsp;</strong>được làm từ sữa và lúa mạch bổ dưỡng, chế biến theo công thức dành riêng cho trẻ. Sản phẩm cung cấp choline, taurin, axit folic là những chất quan trọng hỗ trợ sự phát triển của não, giúp trí não hoạt động tốt hơn. Nguồn canxi trong sữa dồi dào giúp trẻ tăng trưởng về chiều cao hiệu quả. &nbsp;</p>\r\n\r\n<p><strong>Thức uống lúa mạch Ovaltine hộp 180ml&nbsp;</strong>có hương vị thơm ngon, độ ngọt vừa phải, giúp bổ sung nguồn năng lượng thích hợp cho trẻ bắt đầu ngày mới đầy khỏe khoắn và năng động. Thức uống được đóng hộp nhỏ gọn, tiện lợi rất dễ mang theo.</p>\r\n\r\n<p><img alt=\"Sữa lúa mạch Ovaltine 180ML, Giá 5/2020\" src=\"https://img.sosanhgia.com/images/b10c57d7406b4bb792dc5534c294d4a0/sa-la-mch-ovaltine-180ml.jpeg\" /></p>\r\n\r\n<p><strong>Thức uống lúa mạch Ovaltine 180ml&nbsp;</strong>được sản xuất trên dây chuyền công nghệ hiện đại, hợp vệ sinh, đảm bảo đúng tiêu chuẩn vệ sinh an toàn thực phẩm.</p>\r\n\r\n<p><strong>Sử dụng Thức uống lúa mạch Ovaltine hộp 180ml&nbsp;</strong>thường xuyên giúp bổ sung lượng canxi, cải thiện vóc dáng cũng như tăng cường sự cứng cáp cho xương.</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng:&nbsp;</strong></p>\r\n\r\n<p>- Lắc đều trước khi uống. Ngon hơn khi uống lạnh.&nbsp;</p>\r\n\r\n<p>- Không dùng cho trẻ dưới 1 tuổi.&nbsp;</p>\r\n\r\n<p>- Dùng 2 hộp mỗi ngày mang đến hiệu quả tốt cho người sử dụng.</p>\r\n\r\n<p><strong>Hướng dẫn bảo quản:&nbsp;</strong>Bảo quản nơi khô ráo và thoáng mát</p>', 5, NULL, NULL, '2020-07-05 14:20:47', '2020-07-05 14:21:42', NULL),
(22, 'Thức uống lúa mạch Ovaltine', 'thuc-uong-lua-mach-ovaltine', 9, '21243078883307052020oFobMUON5J.jpeg', 1, 0, 1, '<p><strong>Thức uống lúa mạch Ovaltine hộp 180ml&nbsp;</strong>được làm từ sữa và lúa mạch bổ dưỡng, chế biến theo công thức dành riêng cho trẻ. Sản phẩm cung cấp choline, taurin, axit folic là những chất quan trọng hỗ trợ sự phát triển của não, giúp trí não hoạt động tốt hơn. Nguồn canxi trong sữa dồi dào giúp trẻ tăng trưởng về chiều cao hiệu quả. &nbsp;</p>\r\n\r\n<p><strong>Thức uống lúa mạch Ovaltine hộp 180ml&nbsp;</strong>có hương vị thơm ngon, độ ngọt vừa phải, giúp bổ sung nguồn năng lượng thích hợp cho trẻ bắt đầu ngày mới đầy khỏe khoắn và năng động. Thức uống được đóng hộp nhỏ gọn, tiện lợi rất dễ mang theo.</p>\r\n\r\n<p><img alt=\"Sữa lúa mạch Ovaltine 180ML, Giá 5/2020\" src=\"https://img.sosanhgia.com/images/b10c57d7406b4bb792dc5534c294d4a0/sa-la-mch-ovaltine-180ml.jpeg\" /></p>\r\n\r\n<p><strong>Thức uống lúa mạch Ovaltine 180ml&nbsp;</strong>được sản xuất trên dây chuyền công nghệ hiện đại, hợp vệ sinh, đảm bảo đúng tiêu chuẩn vệ sinh an toàn thực phẩm.</p>\r\n\r\n<p><strong>Sử dụng Thức uống lúa mạch Ovaltine hộp 180ml&nbsp;</strong>thường xuyên giúp bổ sung lượng canxi, cải thiện vóc dáng cũng như tăng cường sự cứng cáp cho xương.</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng:&nbsp;</strong></p>\r\n\r\n<p>- Lắc đều trước khi uống. Ngon hơn khi uống lạnh.&nbsp;</p>\r\n\r\n<p>- Không dùng cho trẻ dưới 1 tuổi.&nbsp;</p>\r\n\r\n<p>- Dùng 2 hộp mỗi ngày mang đến hiệu quả tốt cho người sử dụng.</p>\r\n\r\n<p><strong>Hướng dẫn bảo quản:&nbsp;</strong>Bảo quản nơi khô ráo và thoáng mát</p>', '<p><strong>Thức uống lúa mạch Ovaltine hộp 180ml&nbsp;</strong>được làm từ sữa và lúa mạch bổ dưỡng, chế biến theo công thức dành riêng cho trẻ. Sản phẩm cung cấp choline, taurin, axit folic là những chất quan trọng hỗ trợ sự phát triển của não, giúp trí não hoạt động tốt hơn. Nguồn canxi trong sữa dồi dào giúp trẻ tăng trưởng về chiều cao hiệu quả. &nbsp;</p>\r\n\r\n<p><strong>Thức uống lúa mạch Ovaltine hộp 180ml&nbsp;</strong>có hương vị thơm ngon, độ ngọt vừa phải, giúp bổ sung nguồn năng lượng thích hợp cho trẻ bắt đầu ngày mới đầy khỏe khoắn và năng động. Thức uống được đóng hộp nhỏ gọn, tiện lợi rất dễ mang theo.</p>\r\n\r\n<p><img alt=\"Sữa lúa mạch Ovaltine 180ML, Giá 5/2020\" src=\"https://img.sosanhgia.com/images/b10c57d7406b4bb792dc5534c294d4a0/sa-la-mch-ovaltine-180ml.jpeg\" /></p>\r\n\r\n<p><strong>Thức uống lúa mạch Ovaltine 180ml&nbsp;</strong>được sản xuất trên dây chuyền công nghệ hiện đại, hợp vệ sinh, đảm bảo đúng tiêu chuẩn vệ sinh an toàn thực phẩm.</p>\r\n\r\n<p><strong>Sử dụng Thức uống lúa mạch Ovaltine hộp 180ml&nbsp;</strong>thường xuyên giúp bổ sung lượng canxi, cải thiện vóc dáng cũng như tăng cường sự cứng cáp cho xương.</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng:&nbsp;</strong></p>\r\n\r\n<p>- Lắc đều trước khi uống. Ngon hơn khi uống lạnh.&nbsp;</p>\r\n\r\n<p>- Không dùng cho trẻ dưới 1 tuổi.&nbsp;</p>\r\n\r\n<p>- Dùng 2 hộp mỗi ngày mang đến hiệu quả tốt cho người sử dụng.</p>\r\n\r\n<p><strong>Hướng dẫn bảo quản:&nbsp;</strong>Bảo quản nơi khô ráo và thoáng mát</p>', 5, NULL, NULL, '2020-07-05 14:24:30', '2020-07-05 14:25:03', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rates`
--

CREATE TABLE `rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `star` tinyint(4) DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2020-07-05 03:50:50', '2020-07-05 03:50:50'),
(2, 'Shop', 'web', '2020-07-05 04:21:51', '2020-07-05 04:21:51'),
(3, 'Customer', 'web', '2020-07-05 04:22:10', '2020-07-05 04:22:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 3),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 1),
(21, 2),
(22, 1),
(22, 2),
(23, 1),
(23, 2),
(24, 1),
(24, 2),
(25, 1),
(25, 2),
(26, 1),
(26, 2),
(27, 1),
(27, 2),
(28, 1),
(28, 2),
(29, 1),
(29, 2),
(30, 1),
(30, 2),
(31, 1),
(32, 1),
(32, 2),
(33, 1),
(33, 2),
(34, 1),
(34, 2),
(35, 1),
(36, 1),
(36, 2),
(37, 1),
(37, 2),
(38, 1),
(38, 2),
(39, 1),
(39, 2),
(40, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `sale` int(11) NOT NULL DEFAULT 0,
  `start` date DEFAULT NULL,
  `finish` date DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `species`
--

CREATE TABLE `species` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `species`
--

INSERT INTO `species` (`id`, `name`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Lô', 1, NULL, NULL, '2020-07-05 04:32:02', '2020-07-05 04:32:02', NULL),
(2, 'Thùng', 1, NULL, NULL, '2020-07-05 04:32:07', '2020-07-05 04:32:07', NULL),
(3, 'Chai', 1, NULL, NULL, '2020-07-05 04:32:12', '2020-07-05 04:32:12', NULL),
(4, 'Lọ', 1, NULL, NULL, '2020-07-05 04:32:38', '2020-07-05 04:32:38', NULL),
(5, 'Chiếc', 1, NULL, NULL, '2020-07-05 04:33:05', '2020-07-05 04:33:05', NULL),
(6, 'Lốc', 1, NULL, NULL, '2020-07-05 04:33:12', '2020-07-05 04:33:12', NULL),
(7, 'Vỉ', 1, NULL, NULL, '2020-07-05 04:33:18', '2020-07-05 04:33:18', NULL),
(8, 'Cái', 1, NULL, NULL, '2020-07-05 04:33:23', '2020-07-05 04:33:23', NULL),
(9, 'Lon', 1, NULL, NULL, '2020-07-05 04:33:28', '2020-07-05 04:33:28', NULL),
(10, 'Hộp', 1, NULL, NULL, '2020-07-05 04:34:24', '2020-07-05 04:34:24', NULL),
(11, 'Miếng', 2, NULL, NULL, '2020-07-05 04:38:19', '2020-07-05 04:38:19', NULL),
(12, 'Đĩa', 1, NULL, NULL, '2020-07-05 04:54:05', '2020-07-05 04:54:05', NULL),
(13, 'Bát', 1, NULL, NULL, '2020-07-05 04:54:05', '2020-07-05 04:54:05', NULL),
(14, 'Cốc', 1, NULL, NULL, '2020-07-05 05:01:08', '2020-07-05 05:01:08', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` bigint(20) NOT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `company`, `phone`, `fax`, `email`, `address`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'KFC Việt Nam', 'CÔNG TY LIÊN DOANH TNHH KFC VIỆT NAM', 2838489828, NULL, 'info@circlek.com.vn', 'Số 292 Bà Triệu, P. Lê Đại Hành, Q. Hai Bà Trưng, TP. Hà Nội.', 2, NULL, NULL, '2020-07-05 04:36:11', '2020-07-05 04:36:11', NULL),
(2, 'Circle K Vietnam', 'CÔNG TY TNHH VÒNG TRÒN ĐỎ', 2836209017, NULL, 'info@circlek.com.vn', 'Lô I, II - số 1.01 Hồng Lĩnh Plaza, Đường số 9A, Khu dân cư Trung Sơn, xã Bình Hưng, huyện Bình Chánh, Tp. Hồ Chí Minh, Việt Nam', 4, NULL, NULL, '2020-07-05 05:04:43', '2020-07-05 05:04:43', NULL),
(3, 'Nestlé', 'Công ty TNHH Nestlé Việt Nam', 2839113737, '2838288632', 'consumer.services@vn.nestle.com', 'Công ty TNHH Nestlé Việt Nam Lầu 5, Empress Tower, 138-142 Hai Bà Trưng, Phường Đa Kao, Quận 1, Tp.Hồ Chí Minh', 5, NULL, NULL, '2020-07-05 14:12:21', '2020-07-05 14:12:21', NULL),
(4, 'FrieslandCampina', 'Công Ty TNHH FrieslandCampina Việt Nam', 2743754422, '2743754726', 'contactus@frieslandcampina.com', 'Khu phố Bình Đức 1 - Phường Bình Hòa - Thị xã Thuận An - Tỉnh Bình Dương', 5, NULL, NULL, '2020-07-05 14:15:06', '2020-07-05 14:15:06', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth` date DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL COMMENT '0: boy, 1: girl, 2: other',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1: active, 0: inactive',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `birth`, `phone`, `address`, `gender`, `status`, `image`, `email`, `email_verified_at`, `password`, `created_by`, `updated_by`, `deleted_by`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', NULL, 987654321, 'HN', 0, 1, NULL, 'admin@gmail.com', '2020-07-05 03:50:50', '$2y$10$hvZhlKme8hWTfxpTy6G9x.lTsvk44b2yaQz33uunaN1M1z8x.Y6MK', NULL, NULL, NULL, NULL, '2020-07-05 03:50:50', '2020-07-05 03:50:50', NULL),
(2, 'Shop KFC', '2020-07-05', 2838489828, 'Số 292 Bà Triệu, P. Lê Đại Hành, Q. Hai Bà Trưng, TP. Hà Nội', 0, 1, NULL, 'lienhe@kfcvietnam.com.vn', '2020-07-05 04:15:06', '$2y$10$PzAm78LqFibQu/msFhs0QOP0gnTah5mpwyDNu3jSL8kvS.utbxoVu', NULL, NULL, NULL, NULL, '2020-07-05 04:14:32', '2020-07-05 04:14:32', NULL),
(3, 'Shop LOTTERIA', '2020-07-05', 854161072, 'Tầng 7, Toà nhà Sài Gòn PARAGON\r\n03 Nguyễn Lương Bằng, P.Tân Phú, Quận 7, Hồ Chí Minh', 2, 1, NULL, 'marketing@lotteria.vn', '2020-07-05 04:18:27', '$2y$10$P3FrtNdIln.KPBDOPVOl8e7/mtwJzCOl6WMcXPre0fHJnS6.mT1TO', NULL, NULL, NULL, NULL, '2020-07-05 04:18:16', '2020-07-05 04:18:16', NULL),
(4, 'Shop CIRCLE K', '2020-07-05', 2836209017, 'Lô I, II - số 1.01 Hồng Lĩnh Plaza, Đường số 9A, Khu dân cư Trung Sơn,\r\nxã Bình Hưng, huyện Bình Chánh, Tp. Hồ Chí Minh, Việt Nam', 2, 1, NULL, 'info@circlek.com.vn', '2020-07-05 04:24:49', '$2y$10$dNw6d0Dngboc4jQoa/OCE.DnNUKtz8T0RTe8BgqQ/CjII48B1cr0S', NULL, NULL, NULL, NULL, '2020-07-05 04:24:37', '2020-07-05 04:24:37', NULL),
(5, 'Shop VIMART', '2020-07-05', 1800462583, 'Công Ty Cổ Phần Dịch Vụ Thương Mại Tổng Hợp VinCommerce\r\nTầng 5, Mplaza SaiGon, 39 Lê Duẩn, Phường Bến Nghé, Quận 1, Thành Phố Hồ Chí Minh, Việt Nam.', 2, 1, NULL, 'cskh@vimart.com', '2020-07-05 14:07:24', '$2y$10$PUCjOppGucm/bkT9nSMu0.19lFL73hshJJQItUYWZN8L44/rLJZfe', NULL, NULL, NULL, NULL, '2020-07-05 14:06:52', '2020-07-05 14:06:52', NULL),
(6, 'Customer RUBY', '2020-07-05', 123456789, 'Hà Nội', 2, 1, NULL, 'customer@ruby.com', '2020-07-05 14:30:01', '$2y$10$As2g8TKr93HtTNdViwNOFeFwxOxITgEDubt8Uq3iyH79SorfYrPrO', NULL, NULL, NULL, NULL, '2020-07-05 14:29:44', '2020-07-05 14:29:44', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `address_users`
--
ALTER TABLE `address_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_users_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_user_id_foreign` (`user_id`),
  ADD KEY `bills_seller_id_foreign` (`seller_id`);

--
-- Chỉ mục cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_details_bill_id_foreign` (`bill_id`),
  ADD KEY `bill_details_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `image_products`
--
ALTER TABLE `image_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_products_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Chỉ mục cho bảng `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Chỉ mục cho bảng `option_products`
--
ALTER TABLE `option_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `option_products_product_id_foreign` (`product_id`),
  ADD KEY `option_products_supplier_id_foreign` (`supplier_id`),
  ADD KEY `option_products_species_id_foreign` (`species_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rates_product_id_foreign` (`product_id`),
  ADD KEY `rates_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `species`
--
ALTER TABLE `species`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `address_users`
--
ALTER TABLE `address_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `image_products`
--
ALTER TABLE `image_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `option_products`
--
ALTER TABLE `option_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `rates`
--
ALTER TABLE `rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `species`
--
ALTER TABLE `species`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `address_users`
--
ALTER TABLE `address_users`
  ADD CONSTRAINT `address_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bills_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  ADD CONSTRAINT `bill_details_bill_id_foreign` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bill_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `image_products`
--
ALTER TABLE `image_products`
  ADD CONSTRAINT `image_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `option_products`
--
ALTER TABLE `option_products`
  ADD CONSTRAINT `option_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `option_products_species_id_foreign` FOREIGN KEY (`species_id`) REFERENCES `species` (`id`),
  ADD CONSTRAINT `option_products_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `rates`
--
ALTER TABLE `rates`
  ADD CONSTRAINT `rates_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `rates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
