-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2022 at 11:47 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `position`, `email`, `phone`, `username`, `email_verified_at`, `password`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', NULL, 'superadmin@gmail.com', NULL, 'superadmin', NULL, '$2y$10$P7XKbcdy.V46KeuF1PljgOoXXfAQvqjuZkPg71AyMlNUkdcWbBXjS', 'user-photo/1665758734.png', '1', NULL, '2021-03-24 05:29:53', '2022-10-14 08:45:34'),
(2, 'admin', 'test position', 'admin@gmail.com', '666', 'admin', NULL, '$2y$10$E.AdnAg2QNhGUkTxEGNlSOpiczjg9s4PhCd/zKR/PKLTY.rPbo4g2', NULL, '1', NULL, '2021-03-24 06:14:00', '2022-10-28 05:15:49');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Uniliverw', NULL, 'Active', '2022-10-23 22:58:59', '2022-10-28 03:54:20'),
(2, 'rack 1a', NULL, 'Active', '2022-10-28 03:54:07', '2022-10-30 02:12:52');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(4, 'test2 cat 12', NULL, NULL, '2022-10-30 02:10:44', '2022-10-30 02:10:51'),
(5, 'test cat 2', NULL, NULL, '2022-10-30 02:11:06', '2022-10-30 02:11:06'),
(6, 'test cat 1', NULL, NULL, '2022-10-30 02:11:17', '2022-10-30 02:11:17');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gst_treatment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_of_supply` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_preference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opening_balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_term` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_attention` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_country_region` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_attention` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_country_region` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `customer_type`, `primary_contact`, `company_name`, `customer_display_name`, `phone`, `email`, `website`, `gst_treatment`, `pan`, `place_of_supply`, `tax_preference`, `currency`, `opening_balance`, `payment_term`, `billing_attention`, `billing_country_region`, `billing_address_one`, `billing_address_two`, `billing_city`, `billing_state`, `billing_zip_code`, `billing_phone`, `billing_fax`, `shipping_attention`, `shipping_country_region`, `shipping_address_one`, `shipping_address_two`, `shipping_city`, `shipping_state`, `shipping_zip_code`, `shipping_phone`, `shipping_fax`, `status`, `created_at`, `updated_at`) VALUES
(2, NULL, NULL, NULL, 'QW3S9USvbx', 'wN3ACT1pom', '5NTF9rvPaI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'v0NMWaC3S5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '2022-10-17 10:00:14', '2022-10-28 04:11:40'),
(3, NULL, NULL, NULL, 'Kamruzzaman kajol', '01646735100', 'kkajol428@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Rajshahi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-28 04:10:41', '2022-10-28 04:10:41');

-- --------------------------------------------------------

--
-- Table structure for table `creditnotes`
--

CREATE TABLE `creditnotes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `credit_note_number_prefix` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_credit_note_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `creditnotes`
--

INSERT INTO `creditnotes` (`id`, `credit_note_number_prefix`, `next_credit_note_number`, `created_at`, `updated_at`) VALUES
(1, 'aaaa', 'aaa', '2022-10-15 10:15:37', '2022-10-15 10:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `symbol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `estimates`
--

CREATE TABLE `estimates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `estimate_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_estimate_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimate_due_after` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `estimates`
--

INSERT INTO `estimates` (`id`, `estimate_number`, `next_estimate_number`, `estimate_due_after`, `created_at`, `updated_at`) VALUES
(1, 'd', 'd', 'd', '2022-10-15 10:01:34', '2022-10-15 10:01:34');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `generals`
--

CREATE TABLE `generals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `decimal_separator` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thousand_separator` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_off_padding_zero` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_tax_per_item` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remove_tax_from_item_table_row` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exclude_cur_symbol_from_item_table_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_tax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remove_dec_on_numbermoney` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `output_total_number_in_es_pro` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_word_in_lowercase` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `generals`
--

INSERT INTO `generals` (`id`, `decimal_separator`, `thousand_separator`, `number_off_padding_zero`, `show_tax_per_item`, `remove_tax_from_item_table_row`, `exclude_cur_symbol_from_item_table_amount`, `default_tax`, `remove_dec_on_numbermoney`, `output_total_number_in_es_pro`, `number_word_in_lowercase`, `created_at`, `updated_at`) VALUES
(1, '.', ',', '3', 'Yes', 'Yes', 'Yes', 'gst', 'Yes', 'Yes', 'Yes', '2022-10-15 09:34:37', '2022-10-15 09:34:37'),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-15 10:00:38', '2022-10-15 10:00:38');

-- --------------------------------------------------------

--
-- Table structure for table `invoicesettings`
--

CREATE TABLE `invoicesettings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invice_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_due_after` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoicesettings`
--

INSERT INTO `invoicesettings` (`id`, `invice_number`, `next_invoice_number`, `invoice_due_after`, `created_at`, `updated_at`) VALUES
(1, 'e', 'e', 'e', '2022-10-15 10:07:20', '2022-10-15 10:08:29');

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
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2021_03_18_095906_create_permission_tables', 1),
(13, '2021_03_24_112406_create_admins_table', 2),
(14, '2022_02_07_091424_create_system_information_table', 2),
(15, '2019_12_14_000001_create_personal_access_tokens_table', 3),
(16, '2022_02_19_095110_create_permission_tables', 4),
(17, '2022_02_19_102354_create_admins_table', 5),
(18, '2022_10_15_105118_create_taxes_table', 5),
(19, '2022_10_15_105149_create_currencies_table', 5),
(20, '2022_10_15_105224_create_generals_table', 5),
(21, '2022_10_15_105308_create_invoicesettings_table', 5),
(22, '2022_10_15_105347_create_creditnotes_table', 5),
(23, '2022_10_15_105413_create_estimates_table', 5),
(24, '2022_10_17_141537_create_vendors_table', 6),
(25, '2022_10_17_141604_create_clients_table', 6),
(26, '2022_10_23_175519_create_brands_table', 7),
(27, '2022_10_23_175538_create_categories_table', 7),
(28, '2022_10_23_175612_create_subcategories_table', 7),
(29, '2022_10_23_175634_create_units_table', 7),
(30, '2022_10_23_175835_create_warehouses_table', 7),
(31, '2022_10_23_175948_create_products_table', 7),
(32, '2022_10_26_183747_create_sells_table', 8),
(33, '2022_10_26_184642_create_selldetails_table', 8),
(34, '2022_10_27_180531_create_purchases_table', 9),
(35, '2022_10_27_180549_create_purchasedetails_table', 9),
(36, '2022_10_27_223251_create_requisitions_table', 9),
(37, '2022_10_27_231141_create_rproducts_table', 10),
(38, '2022_10_29_200834_create_requestproducts_table', 11),
(39, '2022_10_29_200906_create_requestproductdetails_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 1),
(1, 'App\\User', 1),
(2, 'App\\Models\\Admin', 2);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_url` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `app_url`, `created_at`, `updated_at`) VALUES
(1, 'dashboard.view', 'admin', 'dashboard', NULL, '2021-03-24 02:04:15', '2021-03-24 02:04:15'),
(2, 'dashboard.edit', 'admin', 'dashboard', NULL, '2021-03-24 02:04:15', '2021-03-24 02:04:15'),
(3, 'blog.create', 'admin', 'blog', NULL, '2021-03-24 02:04:15', '2021-03-24 02:04:15'),
(4, 'blog.view', 'admin', 'blog', NULL, '2021-03-24 02:04:15', '2021-03-24 02:04:15'),
(5, 'blog.edit', 'admin', 'blog', NULL, '2021-03-24 02:04:15', '2021-03-24 02:04:15'),
(6, 'blog.delete', 'admin', 'blog', NULL, '2021-03-24 02:04:15', '2021-03-24 02:04:15'),
(7, 'blog.approve', 'admin', 'blog', NULL, '2021-03-24 02:04:15', '2021-03-24 02:04:15'),
(8, 'admin.create', 'admin', 'admin', NULL, '2021-03-24 02:04:16', '2021-03-24 02:04:16'),
(9, 'admin.view', 'admin', 'admin', NULL, '2021-03-24 02:04:16', '2021-03-24 02:04:16'),
(10, 'admin.edit', 'admin', 'admin', NULL, '2021-03-24 02:04:16', '2021-03-24 02:04:16'),
(11, 'admin.delete', 'admin', 'admin', NULL, '2021-03-24 02:04:16', '2021-03-24 02:04:16'),
(12, 'admin.approve', 'admin', 'admin', NULL, '2021-03-24 02:04:16', '2021-03-24 02:04:16'),
(13, 'role.create', 'admin', 'role', NULL, '2021-03-24 02:04:16', '2021-03-24 02:04:16'),
(14, 'role.view', 'admin', 'role', NULL, '2021-03-24 02:04:16', '2021-03-24 02:04:16'),
(15, 'role.edit', 'admin', 'role', NULL, '2021-03-24 02:04:17', '2021-03-24 02:04:17'),
(16, 'role.delete', 'admin', 'role', NULL, '2021-03-24 02:04:17', '2021-03-24 02:04:17'),
(17, 'role.approve', 'admin', 'role', NULL, '2021-03-24 02:04:17', '2021-03-24 02:04:17'),
(18, 'profile.view', 'admin', 'profile', NULL, '2021-03-24 02:04:17', '2021-03-24 02:04:17'),
(19, 'profile.edit', 'admin', 'profile', NULL, '2021-03-24 02:04:17', '2021-03-24 02:04:17'),
(20, 'permission.create', 'admin', 'permission', NULL, NULL, NULL),
(21, 'permission.view', 'admin', 'permission', NULL, NULL, NULL),
(22, 'permission.edit', 'admin', 'permission', NULL, NULL, NULL),
(23, 'permission.delete', 'admin', 'permission', NULL, NULL, NULL),
(25, 'system_information_add', 'admin', 'system_information', 'admin/system_information_add', NULL, NULL),
(26, 'system_information_view', 'admin', 'system_information', 'admin/system_information_view', NULL, NULL),
(27, 'system_information_delete', 'admin', 'system_information', 'admin/system_information_delete', NULL, NULL),
(28, 'system_information_update', 'admin', 'system_information', 'admin/system_information_update', NULL, NULL),
(29, 'estimate_add', 'admin', 'estimate', 'admin/estimate_add', NULL, NULL),
(30, 'estimate_view', 'admin', 'estimate', 'admin/estimate_view', NULL, NULL),
(31, 'estimate_delete', 'admin', 'estimate', 'admin/estimate_delete', NULL, NULL),
(32, 'estimate_update', 'admin', 'estimate', 'admin/estimate_update', NULL, NULL),
(33, 'credit_notes_add', 'admin', 'credit_notes', 'admin/credit_notes_add', NULL, NULL),
(34, 'credit_notes_view', 'admin', 'credit_notes', 'admin/credit_notes_view', NULL, NULL),
(35, 'credit_notes_delete', 'admin', 'credit_notes', 'admin/credit_notes_delete', NULL, NULL),
(36, 'credit_notes_update', 'admin', 'credit_notes', 'admin/credit_notes_update', NULL, NULL),
(37, 'invoice_setting_add', 'admin', 'invoice_setting', 'admin/invoice_setting_add', NULL, NULL),
(38, 'invoice_setting_view', 'admin', 'invoice_setting', 'admin/invoice_setting_view', NULL, NULL),
(39, 'invoice_setting_delete', 'admin', 'invoice_setting', 'admin/invoice_setting_delete', NULL, NULL),
(40, 'invoice_setting_update', 'admin', 'invoice_setting', 'admin/invoice_setting_update', NULL, NULL),
(41, 'general_add', 'admin', 'general', 'admin/general_add', NULL, NULL),
(42, 'general_view', 'admin', 'general', 'admin/general_view', NULL, NULL),
(43, 'general_delete', 'admin', 'general', 'admin/general_delete', NULL, NULL),
(44, 'general_update', 'admin', 'general', 'admin/general_update', NULL, NULL),
(45, 'tax_add', 'admin', 'tax', 'admin/tax_add', NULL, NULL),
(46, 'tax_view', 'admin', 'tax', 'admin/tax_view', NULL, NULL),
(47, 'tax_delete', 'admin', 'tax', 'admin/tax_delete', NULL, NULL),
(48, 'tax_update', 'admin', 'tax', 'admin/tax_update', NULL, NULL),
(49, 'currency_add', 'admin', 'currency', 'admin/currency_add', NULL, NULL),
(50, 'currency_view', 'admin', 'currency', 'admin/currency_view', NULL, NULL),
(51, 'currency_delete', 'admin', 'currency', 'admin/currency_delete', NULL, NULL),
(52, 'currency_update', 'admin', 'currency', 'admin/currency_update', NULL, NULL),
(53, 'client_add', 'admin', 'client', 'admin/client_add', NULL, NULL),
(54, 'client_view', 'admin', 'client', 'admin/client_view', NULL, NULL),
(55, 'client_update', 'admin', 'client', 'admin/client_update', NULL, NULL),
(56, 'client_delete', 'admin', 'client', 'admin/client_delete', NULL, NULL),
(57, 'vendor_add', 'admin', 'vendor', 'admin/vendor_add', NULL, NULL),
(58, 'vendor_view', 'admin', 'vendor', 'admin/vendor_view', NULL, NULL),
(59, 'vendor_delete', 'admin', 'vendor', 'admin/vendor_delete', NULL, NULL),
(60, 'vendor_update', 'admin', 'vendor', 'admin/vendor_update', NULL, NULL),
(61, 'brand_add', 'admin', 'brand', 'admin/brand_add', NULL, NULL),
(62, 'brand_delete', 'admin', 'brand', 'admin/brand_delete', NULL, NULL),
(63, 'brand_view', 'admin', 'brand', 'admin/brand_view', NULL, NULL),
(64, 'brand_update', 'admin', 'brand', 'admin/brand_update', NULL, NULL),
(65, 'category_add', 'admin', 'Category', 'admin/category_add', NULL, NULL),
(66, 'category_view', 'admin', 'Category', 'admin/category_view', NULL, NULL),
(67, 'category_delete', 'admin', 'Category', 'admin/category_delete', NULL, NULL),
(68, 'category_update', 'admin', 'Category', 'admin/category_update', NULL, NULL),
(69, 'category_create', 'admin', 'Category', 'admin/category_create', NULL, NULL),
(70, 'sub_category_add', 'admin', 'sub_category', 'admin/sub_category_add', NULL, NULL),
(71, 'sub_category_view', 'admin', 'sub_category', 'admin/sub_category_view', NULL, NULL),
(72, 'sub_category_delete', 'admin', 'sub_category', 'admin/sub_category_delete', NULL, NULL),
(73, 'sub_category_update', 'admin', 'sub_category', 'admin/sub_category_update', NULL, NULL),
(74, 'unit_add', 'admin', 'unit', 'admin/unit_add', NULL, NULL),
(75, 'unit_view', 'admin', 'unit', 'admin/unit_view', NULL, NULL),
(76, 'unit_delete', 'admin', 'unit', 'admin/unit_delete', NULL, NULL),
(77, 'unit_update', 'admin', 'unit', 'admin/unit_update', NULL, NULL),
(78, 'ware_house_add', 'admin', 'ware_house', 'admin/ware_house_add', NULL, NULL),
(79, 'ware_house_view', 'admin', 'ware_house', 'admin/ware_house_view', NULL, NULL),
(80, 'ware_house_delete', 'admin', 'ware_house', 'admin/ware_house_delete', NULL, NULL),
(81, 'ware_house_update', 'admin', 'ware_house', 'admin/ware_house_update', NULL, NULL),
(82, 'product_add', 'admin', 'product', 'admin/product_add', NULL, NULL),
(83, 'product_view', 'admin', 'product', 'admin/product_view', NULL, NULL),
(84, 'product_delete', 'admin', 'product', 'admin/product_delete', NULL, NULL),
(85, 'product_update', 'admin', 'product', 'admin/product_update', NULL, NULL),
(86, 'sell_add', 'admin', 'sell', 'admin/sell_add', NULL, NULL),
(87, 'sell_view', 'admin', 'sell', 'admin/sell_view', NULL, NULL),
(88, 'sell_delete', 'admin', 'sell', 'admin/sell_delete', NULL, NULL),
(89, 'sell_update', 'admin', 'sell', 'admin/sell_update', NULL, NULL),
(90, 'rack_add', 'admin', 'rack', 'admin/rack_add', NULL, NULL),
(91, 'rack_view', 'admin', 'rack', 'admin/rack_view', NULL, NULL),
(92, 'rack_delete', 'admin', 'rack', 'admin/rack_delete', NULL, NULL),
(93, 'rack_update', 'admin', 'rack', 'admin/rack_update', NULL, NULL),
(94, 'supplier_add', 'admin', 'supplier', 'admin/supplier_add', NULL, NULL),
(95, 'supplier_view', 'admin', 'supplier', 'admin/supplier_view', NULL, NULL),
(96, 'supplier_delete', 'admin', 'supplier', 'admin/supplier_delete', NULL, NULL),
(97, 'supplier_update', 'admin', 'supplier', 'admin/supplier_update', NULL, NULL),
(98, 'inventory_add', 'admin', 'inventory', 'admin/inventory_add', NULL, NULL),
(99, 'inventory_view', 'admin', 'inventory', 'admin/inventory_view', NULL, NULL),
(100, 'inventory_delete', 'admin', 'inventory', 'admin/inventory_delete', NULL, NULL),
(101, 'inventory_update', 'admin', 'inventory', 'admin/inventory_update', NULL, NULL),
(102, 'requisition_add', 'admin', 'requisition', 'admin/requisition_add', NULL, NULL),
(103, 'requisition_view', 'admin', 'requisition', 'admin/requisition_view', NULL, NULL),
(104, 'requisition_delete', 'admin', 'requisition', 'admin/requisition_delete', NULL, NULL),
(105, 'requisition_update', 'admin', 'requisition', 'admin/requisition_update', NULL, NULL),
(106, 'request_product_add', 'admin', 'request_product', 'admin/request_product_add', NULL, NULL),
(107, 'request_product_view', 'admin', 'request_product', 'admin/request_product_view', NULL, NULL),
(108, 'request_product_delete', 'admin', 'request_product', 'admin/request_product_delete', NULL, NULL),
(109, 'request_product_update', 'admin', 'request_product', 'admin/request_product_update', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subcategory` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_measure` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alert_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ware_house` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buying_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selling_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_with_tax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whole_sale_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image`, `name`, `category`, `subcategory`, `brand`, `unit`, `unit_measure`, `quantity`, `stock_unit`, `alert_quantity`, `ware_house`, `buying_price`, `selling_price`, `price_with_tax`, `whole_sale_price`, `tax`, `sku`, `vendor`, `des`, `status`, `created_at`, `updated_at`) VALUES
(4, 'public/uploads/images.jpg', 'rrr', 'test2 cat 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '2022-10-27 02:12:29', '2022-10-30 02:11:43'),
(5, 'public/uploads/istockphoto-1354031012-170667a.jpg', 'tttt', 'test cat 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '2022-10-27 02:13:53', '2022-10-30 02:11:50'),
(6, NULL, 'jfj', 'test cat 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '2022-10-28 03:42:27', '2022-10-30 02:11:58');

-- --------------------------------------------------------

--
-- Table structure for table `purchasedetails`
--

CREATE TABLE `purchasedetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `request_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchasedetails`
--

INSERT INTO `purchasedetails` (`id`, `request_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(3, '1', '5', '6', '2022-10-28 02:40:06', '2022-10-28 02:40:06'),
(4, '1', '4', '6', '2022-10-28 02:40:06', '2022-10-28 02:40:06');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urgent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_delivery_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `vendor_id`, `request_number`, `request_date`, `request_note`, `total_product`, `total_quantity`, `urgent`, `request_delivery_date`, `term`, `status`, `created_at`, `updated_at`) VALUES
(2, 'jfj', 'Kamruzzaman kajol', '2022-05-24', 'rack 1', '2', '52', NULL, '2022-10-21', NULL, 'Active', '2022-10-28 04:58:52', '2022-10-30 02:15:23');

-- --------------------------------------------------------

--
-- Table structure for table `requestproductdetails`
--

CREATE TABLE `requestproductdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `request_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requestproductdetails`
--

INSERT INTO `requestproductdetails` (`id`, `request_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, '1', '6', '2', '2022-10-30 03:32:56', '2022-10-30 03:32:56'),
(2, '1', '5', '3', '2022-10-30 03:32:56', '2022-10-30 03:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `requestproducts`
--

CREATE TABLE `requestproducts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urgent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_delivery_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requestproducts`
--

INSERT INTO `requestproducts` (`id`, `vendor_id`, `request_number`, `request_date`, `request_note`, `total_product`, `total_quantity`, `urgent`, `request_delivery_date`, `term`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Kamruzzaman kajol', '53IR49O6HT', '2022-10-31', 'czxvcx', '2', '5', 'Yes', '2022-10-26', 'Due end of Month', 'inc', '2022-10-30 03:32:56', '2022-10-30 03:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `requisitions`
--

CREATE TABLE `requisitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requisitions`
--

INSERT INTO `requisitions` (`id`, `admin_id`, `product_name`, `quantity`, `request_type`, `request_date`, `status`, `created_at`, `updated_at`) VALUES
(2, '2', NULL, NULL, 'Normal', '2022-10-26', 'Accept', '2022-10-28 06:43:18', '2022-10-30 02:15:46'),
(3, '2', NULL, NULL, 'Normal', '2022-10-12', 'Accept', '2022-10-28 07:40:18', '2022-10-28 07:41:03'),
(4, '2', NULL, NULL, 'Emergency', '2022-10-12', 'Accept', '2022-10-30 02:15:23', '2022-10-30 02:15:23');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'admin', '2021-03-24 02:04:14', '2021-03-24 02:04:14'),
(2, 'admin', 'admin', '2021-03-24 02:04:14', '2021-03-24 02:04:14'),
(3, 'editor', 'admin', '2021-03-24 02:04:14', '2021-03-24 02:04:14'),
(4, 'user', 'admin', '2021-03-24 02:04:14', '2021-03-24 02:04:14'),
(5, 'test2', 'admin', '2021-03-24 02:13:05', '2021-03-24 02:17:07');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(5, 5),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(7, 5),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(18, 2),
(18, 3),
(19, 1),
(19, 2),
(19, 3),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(102, 2),
(103, 1),
(103, 2),
(104, 1),
(105, 1),
(105, 2),
(106, 1),
(107, 1),
(108, 1),
(109, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rproducts`
--

CREATE TABLE `rproducts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT current_timestamp(),
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rproducts`
--

INSERT INTO `rproducts` (`id`, `admin_id`, `r_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(3, '2', '2', '5', '4', '2022-10-28 07:26:50', '2022-10-28 07:26:50'),
(4, '2', '2', '5', '2', '2022-10-28 07:26:50', '2022-10-28 07:26:50'),
(5, '2', '3', '6', '6', '2022-10-28 07:40:18', '2022-10-28 07:40:18'),
(6, '2', '4', '6', '2', '2022-10-30 02:15:23', '2022-10-30 02:15:23'),
(7, '2', '4', '5', '2', '2022-10-30 02:15:23', '2022-10-30 02:15:23'),
(8, '2', '4', '4', '2', '2022-10-30 02:15:23', '2022-10-30 02:15:23');

-- --------------------------------------------------------

--
-- Table structure for table `selldetails`
--

CREATE TABLE `selldetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `total_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `tax` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `tax_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `total_tax_price` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `selldetails`
--

INSERT INTO `selldetails` (`id`, `invoice_id`, `client_slug`, `order_id`, `product_id`, `size`, `color`, `qty`, `price`, `total_price`, `tax`, `tax_price`, `total_tax_price`, `created_at`, `updated_at`) VALUES
(1, '1', 'QW3S9USvbx', '4AERWD6PXG', '4', NULL, NULL, '2', '630', '1260', '15', '724.5', '1449', '2022-10-27 06:05:49', '2022-10-27 06:05:49'),
(2, '1', 'QW3S9USvbx', '4AERWD6PXG', '5', NULL, NULL, '1', '800', '800', '0', '800', '800', '2022-10-27 06:05:49', '2022-10-27 06:05:49');

-- --------------------------------------------------------

--
-- Table structure for table `sells`
--

CREATE TABLE `sells` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_term` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Due_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_pay_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_due_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_net_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `total_discount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `total_vat_tax` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `delivery_charge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `grand_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `total_pay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `cod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `due` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sells`
--

INSERT INTO `sells` (`id`, `client_slug`, `order_id`, `payment_term`, `pay_date`, `Due_date`, `s_pay_date`, `s_due_date`, `warehouse`, `order_from`, `total_net_price`, `total_discount`, `total_vat_tax`, `delivery_charge`, `grand_total`, `total_pay`, `cod`, `due`, `created_at`, `updated_at`) VALUES
(1, 'QW3S9USvbx', '4AERWD6PXG', 'Instant Payment', '17 Oct, 2022', '24 Oct, 2022', '2022-10-17', '2022-10-24', 'eeh', NULL, '2060', '200', '2249', '0', '2049', '2049', '0', '0', '2022-10-27 06:05:49', '2022-10-27 06:05:49');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_cate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `image`, `sub_cate`, `created_at`, `updated_at`) VALUES
(1, 'DECKgg', NULL, 'test12', '2022-10-23 23:18:49', '2022-10-23 23:18:59');

-- --------------------------------------------------------

--
-- Table structure for table `system_information`
--

CREATE TABLE `system_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `System_Name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_url` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_industry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_gst` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_pan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_tan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_pincode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_format` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_format` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `system_information`
--

INSERT INTO `system_information` (`id`, `logo`, `icon`, `System_Name`, `Phone`, `Email`, `Address`, `app_url`, `company_industry`, `company_gst`, `company_pan`, `company_tan`, `billing_address2`, `billing_pincode`, `billing_country`, `billing_state`, `billing_city`, `date_format`, `time_format`, `created_at`, `updated_at`) VALUES
(1, 'public/uploads/1666902120.png', 'public/uploads/1665754474.ico', 'Store Management', '777', 'erp@gmail.com', 'rr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-07 04:03:26', '2022-10-28 03:24:46');

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tax_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `tax_name`, `tax_rate`, `created_at`, `updated_at`) VALUES
(1, 'gst', '10', '2022-10-15 07:56:37', '2022-10-27 02:05:41'),
(3, 'test', '15', '2022-10-27 02:05:53', '2022-10-27 02:05:53'),
(4, 'test1', '5', '2022-10-27 02:06:02', '2022-10-27 02:06:02');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'kg', '2022-10-23 22:59:19', '2022-10-23 22:59:19');

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
(1, 'kamruzzaman Kajol', 'kajol@gmail.com', NULL, '$2y$10$9GlZ6UZHjKS9qCpZRRiRReZHGINPxKnjd1W0C4Rx8sneI.VIHgiCS', NULL, '2021-03-24 02:04:14', '2021-03-24 02:04:14');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `primary_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gst_treatment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_of_supply` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_preference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opening_balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_term` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_attention` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_country_region` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_attention` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_country_region` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `primary_contact`, `company_name`, `customer_display_name`, `phone`, `email`, `website`, `gst_treatment`, `pan`, `place_of_supply`, `tax_preference`, `currency`, `opening_balance`, `payment_term`, `billing_attention`, `billing_country_region`, `billing_address_one`, `billing_address_two`, `billing_city`, `billing_state`, `billing_zip_code`, `billing_phone`, `billing_fax`, `shipping_attention`, `shipping_country_region`, `shipping_address_one`, `shipping_address_two`, `shipping_city`, `shipping_state`, `shipping_zip_code`, `shipping_phone`, `shipping_fax`, `created_at`, `updated_at`) VALUES
(1, 'Il4jYVyppU', 'UyzTpEotbL', 'I7XbtEHF5R', '83FDRR4jrY', 'jRGx99qVtk', 'v6t0Kuf1pw', '0', 'vwhAOVbUXi', NULL, 'Taxable', 'INR', 'yBhg3bE7W7', 'Payment Due On Receipt', '5CIqI6Z0hn', '4wSCJPu1Kn', 'lusJs677Zx', 'MSqChrDYPS', 'hVtcd1C5ft', 'G8R6M1jmcZ', 'i7XgmqHMwZ', 'kBoEnQmEBl', 'GhrMhnZxHZ', 'tKL9HGgHr8', 'UIFlDlaVsK', 'rPrBmhm2Vi', 'w9reGVptdq', 'KQqctRoJw6', 'ICcZEqh8G8', 'VWf8tuleyM', 'GoE3oyX3nY', 'XVf5zMSB5v', '2022-10-17 10:22:19', '2022-10-17 10:22:19');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `name`, `adress`, `city`, `state`, `phone`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'eeh', 'ee', 'ee', 'ee', '01646735100', 'erer@gmail.com', NULL, '2022-10-23 22:59:39', '2022-10-23 22:59:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `creditnotes`
--
ALTER TABLE `creditnotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estimates`
--
ALTER TABLE `estimates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generals`
--
ALTER TABLE `generals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoicesettings`
--
ALTER TABLE `invoicesettings`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `purchasedetails`
--
ALTER TABLE `purchasedetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requestproductdetails`
--
ALTER TABLE `requestproductdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requestproducts`
--
ALTER TABLE `requestproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requisitions`
--
ALTER TABLE `requisitions`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `rproducts`
--
ALTER TABLE `rproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selldetails`
--
ALTER TABLE `selldetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sells`
--
ALTER TABLE `sells`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_information`
--
ALTER TABLE `system_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `creditnotes`
--
ALTER TABLE `creditnotes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `estimates`
--
ALTER TABLE `estimates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `generals`
--
ALTER TABLE `generals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoicesettings`
--
ALTER TABLE `invoicesettings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `purchasedetails`
--
ALTER TABLE `purchasedetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `requestproductdetails`
--
ALTER TABLE `requestproductdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `requestproducts`
--
ALTER TABLE `requestproducts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `requisitions`
--
ALTER TABLE `requisitions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rproducts`
--
ALTER TABLE `rproducts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `selldetails`
--
ALTER TABLE `selldetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sells`
--
ALTER TABLE `sells`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
