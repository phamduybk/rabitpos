-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 23, 2023 lúc 10:39 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `localhost`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('uau4ft1gearoa27vl6jdevhfhno1cp4e', '::1', 1700903450, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730303930333232353b63757272656e63797c733a333a22e282ab223b63757272656e63795f706c6163656d656e747c733a353a225269676874223b63757272656e63795f636f64657c733a333a22564e44223b766965775f646174657c733a31303a2264642d6d6d2d79797979223b766965775f74696d657c733a323a223132223b6661696c65647c733a33333a22506c6561736520656e74657220757365726e616d6520262070617373776f726421223b5f5f63695f766172737c613a323a7b733a363a226661696c6564223b733a333a226f6c64223b733a373a2273756363657373223b733a333a226f6c64223b7d696e765f757365726e616d657c733a353a2261646d696e223b696e765f7573657269647c733a313a2233223b6c6f676765645f696e7c623a313b726f6c655f69647c733a313a2233223b726f6c655f6e616d657c733a31303a225175e1baa36e206cc3bd223b737563636573737c733a32373a225265636f7264205375636365737366756c6c792053617665642121223b6c616e67756167657c733a373a22566965746e616d223b6c616e67756167655f69647c733a313a2232223b),
('iev760rm31sob34vcjmouk54cclev52q', '::1', 1700732338, 0x5f5f63695f6c6173745f726567656e65726174657c693a313730303733323035393b63757272656e63797c733a333a22e282ab223b63757272656e63795f706c6163656d656e747c733a353a225269676874223b63757272656e63795f636f64657c733a333a22564e44223b766965775f646174657c733a31303a2264642d6d6d2d79797979223b766965775f74696d657c733a323a223132223b696e765f757365726e616d657c733a353a2261646d696e223b696e765f7573657269647c733a313a2233223b6c6f676765645f696e7c623a313b726f6c655f69647c733a313a2233223b726f6c655f6e616d657c733a31303a225175e1baa36e206cc3bd223b737563636573737c733a33383a22537563636573732121204e6577204974656d204164646564205375636365737366756c6c7921223b5f5f63695f766172737c613a313a7b733a373a2273756363657373223b733a333a226f6c64223b7d6c616e67756167657c733a373a22566965746e616d223b6c616e67756167655f69647c733a313a2232223b);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_brands`
--

CREATE TABLE `db_brands` (
  `id` int(50) NOT NULL,
  `brand_code` varchar(50) DEFAULT NULL,
  `brand_name` varchar(100) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `company_id` int(5) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_category`
--

CREATE TABLE `db_category` (
  `id` int(50) NOT NULL,
  `category_code` varchar(50) DEFAULT NULL,
  `category_name` varchar(100) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `company_id` int(5) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_category`
--

INSERT INTO `db_category` (`id`, `category_code`, `category_name`, `description`, `company_id`, `status`) VALUES
(1, 'CT0001', 'Trà sữa', '', NULL, 1),
(2, 'CT0002', 'Kem', '', NULL, 1),
(3, 'CT0003', 'Món ăn chính', '', NULL, 1),
(4, 'CT0004', 'Món tráng miệng', '', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_cobpayments`
--

CREATE TABLE `db_cobpayments` (
  `id` int(50) NOT NULL,
  `customer_id` int(5) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_type` varchar(50) DEFAULT NULL,
  `payment` double(20,2) DEFAULT NULL,
  `payment_note` mediumtext DEFAULT NULL,
  `system_ip` varchar(50) DEFAULT NULL,
  `system_name` varchar(50) DEFAULT NULL,
  `created_time` time DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_company`
--

CREATE TABLE `db_company` (
  `id` int(50) NOT NULL,
  `company_code` varchar(150) DEFAULT NULL,
  `company_name` varchar(150) DEFAULT NULL,
  `company_website` varchar(150) DEFAULT NULL,
  `mobile` varchar(150) DEFAULT NULL,
  `phone` varchar(150) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(250) DEFAULT NULL,
  `company_logo` text DEFAULT NULL,
  `logo` mediumtext DEFAULT NULL,
  `upi_id` varchar(50) DEFAULT NULL,
  `upi_code` text DEFAULT NULL,
  `signature` text DEFAULT NULL,
  `show_signature` int(1) DEFAULT 0,
  `country` varchar(150) DEFAULT NULL,
  `state` varchar(150) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `postcode` varchar(50) DEFAULT NULL,
  `gst_no` varchar(50) DEFAULT NULL,
  `vat_no` varchar(50) DEFAULT NULL,
  `pan_no` varchar(50) DEFAULT NULL,
  `bank_details` mediumtext DEFAULT NULL,
  `cid` int(10) DEFAULT NULL,
  `category_init` varchar(5) DEFAULT NULL,
  `item_init` varchar(5) DEFAULT NULL COMMENT 'INITAL CODE',
  `supplier_init` varchar(5) DEFAULT NULL COMMENT 'INITAL CODE',
  `purchase_init` varchar(5) DEFAULT NULL COMMENT 'INITAL CODE',
  `purchase_return_init` varchar(5) DEFAULT NULL,
  `customer_init` varchar(5) DEFAULT NULL COMMENT 'INITAL CODE',
  `sales_init` varchar(5) DEFAULT NULL COMMENT 'INITAL CODE',
  `sales_return_init` varchar(5) DEFAULT NULL,
  `expense_init` varchar(5) DEFAULT NULL,
  `invoice_view` int(5) DEFAULT NULL COMMENT '1=Standard,2=Indian GST',
  `status` int(1) DEFAULT NULL,
  `sms_status` int(1) DEFAULT NULL COMMENT '1=Enable 0=Disable',
  `sales_terms_and_conditions` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_company`
--

INSERT INTO `db_company` (`id`, `company_code`, `company_name`, `company_website`, `mobile`, `phone`, `email`, `website`, `company_logo`, `logo`, `upi_id`, `upi_code`, `signature`, `show_signature`, `country`, `state`, `city`, `address`, `postcode`, `gst_no`, `vat_no`, `pan_no`, `bank_details`, `cid`, `category_init`, `item_init`, `supplier_init`, `purchase_init`, `purchase_return_init`, `customer_init`, `sales_init`, `sales_return_init`, `expense_init`, `invoice_view`, `status`, `sms_status`, `sales_terms_and_conditions`) VALUES
(1, '', 'RabitPos', NULL, '0987987987', '0999999999', 'cafe@gmail.com', '', 'localhost/company/1559022944_thumb.jpg', 'logo-0.png', '', '1566111586_thumb1.jpg', 'uploads/localhost/company/1559022862_thumb.jpg', 0, 'Việt Nam', 'Hà Nội', '', 'Số 1, Cầu Giấy, HN', '', '', '', '', 'ko co', 1, 'CT', 'IT', 'SP', 'PU', 'PR', 'CU', 'SL', 'PR', 'EX', 1, 1, 1, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_country`
--

CREATE TABLE `db_country` (
  `id` int(50) NOT NULL,
  `country_code` varchar(10) DEFAULT NULL,
  `country` varchar(4050) DEFAULT NULL,
  `added_on` date DEFAULT NULL,
  `company_id` int(5) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_country`
--

INSERT INTO `db_country` (`id`, `country_code`, `country`, `added_on`, `company_id`, `status`) VALUES
(3, NULL, 'Việt Nam', NULL, NULL, 1),
(4, NULL, 'Nước ngoài', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_currency`
--

CREATE TABLE `db_currency` (
  `id` int(50) NOT NULL,
  `currency_name` varchar(50) DEFAULT NULL,
  `currency_code` varchar(20) DEFAULT NULL,
  `currency` blob DEFAULT NULL,
  `symbol` mediumtext DEFAULT NULL,
  `status` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_currency`
--

INSERT INTO `db_currency` (`id`, `currency_name`, `currency_code`, `currency`, `symbol`, `status`) VALUES
(32, 'China - Chinese yuan (CNY)', NULL, 0xe5858320, NULL, 1),
(36, 'Japan - Japanese yen (JPY)', NULL, 0xc2a5, NULL, 1),
(45, 'Vietnam - Vietnamese dong', 'VND', 0xe282ab, NULL, 1),
(46, 'Bitcoin - BTC or XBT', 'BTC ', 0xe282bf, NULL, 1),
(51, 'Euro', 'EUR', 0xe282ac, NULL, 1),
(53, 'US dollar', 'USD', 0x24, NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_customers`
--

CREATE TABLE `db_customers` (
  `id` int(50) NOT NULL,
  `customer_code` varchar(20) DEFAULT NULL,
  `customer_name` varchar(50) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `gstin` varchar(100) DEFAULT NULL,
  `tax_number` varchar(50) DEFAULT NULL,
  `vatin` varchar(100) DEFAULT NULL,
  `opening_balance` double(20,2) DEFAULT NULL,
  `sales_due` double(20,2) DEFAULT NULL,
  `sales_return_due` double(20,2) DEFAULT NULL,
  `country_id` varchar(50) DEFAULT NULL,
  `state_id` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `postcode` varchar(10) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `system_ip` varchar(50) DEFAULT NULL,
  `system_name` varchar(50) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_time` varchar(30) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `company_id` int(5) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_customers`
--

INSERT INTO `db_customers` (`id`, `customer_code`, `customer_name`, `mobile`, `phone`, `email`, `gstin`, `tax_number`, `vatin`, `opening_balance`, `sales_due`, `sales_return_due`, `country_id`, `state_id`, `city`, `postcode`, `address`, `system_ip`, `system_name`, `created_date`, `created_time`, `created_by`, `company_id`, `status`) VALUES
(1, 'CU0001', 'Khách hàng vãng lai', '', '', '', '', '', NULL, NULL, 0.00, NULL, '', '', NULL, '', '', NULL, NULL, '2019-01-01', '10:55:54 pm', 'admin', NULL, 1),
(2, 'CU0002', 'Nguyễn Văn A', '0911686792', '911686792', 'phamduybk@gmail.com', '', '', NULL, 0.00, NULL, NULL, '3', '1', '', '', '', '::1', 'PQDUY', '2023-10-03', '02:52:47 pm', 'banhang', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_customer_payments`
--

CREATE TABLE `db_customer_payments` (
  `id` int(50) NOT NULL,
  `salespayment_id` int(5) DEFAULT NULL,
  `customer_id` int(5) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_type` varchar(50) DEFAULT NULL,
  `payment` double(20,2) DEFAULT NULL,
  `payment_note` text DEFAULT NULL,
  `system_ip` varchar(50) DEFAULT NULL,
  `system_name` varchar(50) DEFAULT NULL,
  `created_time` varchar(50) DEFAULT NULL,
  `created_date` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_expense`
--

CREATE TABLE `db_expense` (
  `id` int(50) NOT NULL,
  `expense_code` varchar(50) DEFAULT NULL,
  `category_id` int(5) DEFAULT NULL,
  `expense_date` date DEFAULT NULL,
  `reference_no` varchar(50) DEFAULT NULL,
  `expense_for` varchar(100) DEFAULT NULL,
  `expense_amt` double(20,2) DEFAULT NULL,
  `note` mediumtext DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_time` varchar(50) DEFAULT NULL,
  `system_ip` varchar(50) DEFAULT NULL,
  `system_name` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_expense_category`
--

CREATE TABLE `db_expense_category` (
  `id` int(50) NOT NULL,
  `category_code` varchar(50) DEFAULT NULL,
  `category_name` varchar(50) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_hold`
--

CREATE TABLE `db_hold` (
  `id` int(50) NOT NULL,
  `reference_id` varchar(50) DEFAULT NULL,
  `reference_no` varchar(50) DEFAULT NULL,
  `sales_date` date DEFAULT NULL,
  `sales_status` varchar(50) DEFAULT NULL,
  `customer_id` int(5) DEFAULT NULL,
  `other_charges_input` double(20,2) DEFAULT NULL,
  `other_charges_tax_id` int(5) DEFAULT NULL,
  `other_charges_amt` double(20,2) DEFAULT NULL,
  `discount_to_all_input` double(20,2) DEFAULT NULL,
  `discount_to_all_type` varchar(50) DEFAULT NULL,
  `tot_discount_to_all_amt` double(20,2) DEFAULT NULL,
  `subtotal` double(20,2) DEFAULT NULL,
  `round_off` double(20,2) DEFAULT NULL,
  `grand_total` double(20,2) DEFAULT NULL,
  `sales_note` text DEFAULT NULL,
  `pos` int(1) DEFAULT NULL COMMENT '1=yes 0=no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_holditems`
--

CREATE TABLE `db_holditems` (
  `id` int(50) NOT NULL,
  `hold_id` int(5) DEFAULT NULL,
  `item_id` int(5) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `sales_qty` double(20,2) DEFAULT NULL,
  `price_per_unit` double(20,2) DEFAULT NULL,
  `tax_type` varchar(50) DEFAULT NULL,
  `tax_id` int(5) DEFAULT NULL,
  `tax_amt` double(20,2) DEFAULT NULL,
  `discount_type` varchar(50) DEFAULT NULL,
  `discount_input` double(20,2) DEFAULT NULL,
  `discount_amt` double(20,2) DEFAULT NULL,
  `unit_total_cost` double(20,2) DEFAULT NULL,
  `total_cost` double(20,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_items`
--

CREATE TABLE `db_items` (
  `id` int(50) NOT NULL,
  `item_code` varchar(50) DEFAULT NULL,
  `custom_barcode` varchar(100) DEFAULT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `category_id` int(10) DEFAULT NULL,
  `sku` varchar(50) DEFAULT NULL,
  `hsn` varbinary(50) DEFAULT NULL,
  `unit_id` int(10) DEFAULT NULL,
  `alert_qty` int(10) DEFAULT NULL,
  `brand_id` int(5) DEFAULT NULL,
  `lot_number` varchar(50) DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `price` double(20,2) DEFAULT NULL,
  `tax_id` int(5) DEFAULT NULL,
  `purchase_price` double(20,2) DEFAULT NULL,
  `tax_type` varchar(50) DEFAULT NULL,
  `profit_margin` double(20,2) DEFAULT NULL,
  `sales_price` double(20,2) DEFAULT NULL,
  `final_price` double(20,2) DEFAULT NULL,
  `stock` double(20,2) DEFAULT NULL,
  `item_image` mediumtext DEFAULT NULL,
  `system_ip` varchar(50) DEFAULT NULL,
  `system_name` varchar(50) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_time` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `company_id` int(5) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `discount_type` varchar(100) DEFAULT NULL,
  `discount` double(20,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_items`
--

INSERT INTO `db_items` (`id`, `item_code`, `custom_barcode`, `item_name`, `description`, `category_id`, `sku`, `hsn`, `unit_id`, `alert_qty`, `brand_id`, `lot_number`, `expire_date`, `price`, `tax_id`, `purchase_price`, `tax_type`, `profit_margin`, `sales_price`, `final_price`, `stock`, `item_image`, `system_ip`, `system_name`, `created_date`, `created_time`, `created_by`, `company_id`, `status`, `discount_type`, `discount`) VALUES
(1, 'IT0001', '', 'Trà sữa dâu', '', 1, '', '', 7, 0, 0, '', NULL, 20000.00, 1, 20000.00, 'Exclusive', 150.00, 50000.00, 50000.00, 200000.00, NULL, '::1', 'PQDUY', '2026-11-10', '04:35:08 pm', 'admin', NULL, 1, 'Percentage', 0.00),
(2, 'IT0002', '', 'Kem trà xanh', '', 2, '', '', 11, 0, 0, '', NULL, 50000.00, 1, 50000.00, 'Exclusive', 20.00, 60000.00, 60000.00, 12000.00, NULL, '::1', 'PQDUY', '2023-11-23', '04:36:36 pm', 'admin', NULL, 1, 'Percentage', 0.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_languages`
--

CREATE TABLE `db_languages` (
  `id` int(50) NOT NULL,
  `language` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_languages`
--

INSERT INTO `db_languages` (`id`, `language`, `status`) VALUES
(1, 'English', 1),
(2, 'Vietnam', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_paymenttypes`
--

CREATE TABLE `db_paymenttypes` (
  `id` int(50) NOT NULL,
  `payment_type` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_paymenttypes`
--

INSERT INTO `db_paymenttypes` (`id`, `payment_type`, `status`) VALUES
(1, 'Tiền mặt', 1),
(3, 'Trả thẻ ATM', 1),
(4, 'Trả tiền đủ', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_permissions`
--

CREATE TABLE `db_permissions` (
  `id` int(50) NOT NULL,
  `role_id` int(5) DEFAULT NULL,
  `permissions` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_permissions`
--

INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES
(1, 2, 'items_add'),
(2, 2, 'items_edit'),
(3, 2, 'items_delete'),
(4, 2, 'items_view'),
(5, 2, 'sales_add'),
(6, 2, 'sales_edit'),
(7, 2, 'sales_delete'),
(8, 2, 'sales_view'),
(9, 2, 'sales_payment_view'),
(10, 2, 'sales_payment_add'),
(11, 2, 'sales_payment_delete'),
(12, 2, 'items_category_add'),
(13, 2, 'items_category_edit'),
(14, 2, 'items_category_delete'),
(15, 2, 'items_category_view'),
(16, 2, 'print_labels'),
(17, 2, 'import_items'),
(18, 2, 'sales_return_add'),
(19, 2, 'sales_return_edit'),
(20, 2, 'sales_return_delete'),
(21, 2, 'sales_return_view'),
(22, 2, 'sales_return_payment_view'),
(23, 2, 'sales_return_payment_add'),
(24, 2, 'sales_return_payment_delete'),
(25, 2, 'pos'),
(26, 2, 'view_all_users_sales_invoices'),
(27, 2, 'view_all_users_sales_return_invoices'),
(141, 3, 'users_add'),
(142, 3, 'users_edit'),
(143, 3, 'users_delete'),
(144, 3, 'users_view'),
(145, 3, 'tax_add'),
(146, 3, 'tax_edit'),
(147, 3, 'tax_delete'),
(148, 3, 'tax_view'),
(149, 3, 'currency_add'),
(150, 3, 'currency_edit'),
(151, 3, 'currency_delete'),
(152, 3, 'currency_view'),
(153, 3, 'company_edit'),
(154, 3, 'site_edit'),
(155, 3, 'units_add'),
(156, 3, 'units_edit'),
(157, 3, 'units_delete'),
(158, 3, 'units_view'),
(159, 3, 'roles_add'),
(160, 3, 'roles_edit'),
(161, 3, 'roles_delete'),
(162, 3, 'roles_view'),
(163, 3, 'places_add'),
(164, 3, 'places_edit'),
(165, 3, 'places_delete'),
(166, 3, 'places_view'),
(167, 3, 'expense_add'),
(168, 3, 'expense_edit'),
(169, 3, 'expense_delete'),
(170, 3, 'expense_view'),
(171, 3, 'items_add'),
(172, 3, 'items_edit'),
(173, 3, 'items_delete'),
(174, 3, 'items_view'),
(175, 3, 'brand_add'),
(176, 3, 'brand_edit'),
(177, 3, 'brand_delete'),
(178, 3, 'brand_view'),
(179, 3, 'suppliers_add'),
(180, 3, 'suppliers_edit'),
(181, 3, 'suppliers_delete'),
(182, 3, 'suppliers_view'),
(183, 3, 'customers_add'),
(184, 3, 'customers_edit'),
(185, 3, 'customers_delete'),
(186, 3, 'customers_view'),
(187, 3, 'purchase_add'),
(188, 3, 'purchase_edit'),
(189, 3, 'purchase_delete'),
(190, 3, 'purchase_view'),
(191, 3, 'sales_add'),
(192, 3, 'sales_edit'),
(193, 3, 'sales_delete'),
(194, 3, 'sales_view'),
(195, 3, 'sales_payment_view'),
(196, 3, 'sales_payment_add'),
(197, 3, 'sales_payment_delete'),
(198, 3, 'sales_report'),
(199, 3, 'purchase_report'),
(200, 3, 'expense_report'),
(201, 3, 'profit_report'),
(202, 3, 'stock_report'),
(203, 3, 'item_sales_report'),
(204, 3, 'purchase_payments_report'),
(205, 3, 'sales_payments_report'),
(206, 3, 'expired_items_report'),
(207, 3, 'items_category_add'),
(208, 3, 'items_category_edit'),
(209, 3, 'items_category_delete'),
(210, 3, 'items_category_view'),
(211, 3, 'print_labels'),
(212, 3, 'import_items'),
(213, 3, 'expense_category_add'),
(214, 3, 'expense_category_edit'),
(215, 3, 'expense_category_delete'),
(216, 3, 'expense_category_view'),
(217, 3, 'dashboard_view'),
(218, 3, 'send_sms'),
(219, 3, 'sms_template_edit'),
(220, 3, 'sms_template_view'),
(221, 3, 'sms_api_view'),
(222, 3, 'sms_api_edit'),
(223, 3, 'purchase_return_add'),
(224, 3, 'purchase_return_edit'),
(225, 3, 'purchase_return_delete'),
(226, 3, 'purchase_return_view'),
(227, 3, 'purchase_return_report'),
(228, 3, 'sales_return_add'),
(229, 3, 'sales_return_edit'),
(230, 3, 'sales_return_delete'),
(231, 3, 'sales_return_view'),
(232, 3, 'sales_return_report'),
(233, 3, 'sales_return_payment_view'),
(234, 3, 'sales_return_payment_add'),
(235, 3, 'sales_return_payment_delete'),
(236, 3, 'purchase_return_payment_view'),
(237, 3, 'purchase_return_payment_add'),
(238, 3, 'purchase_return_payment_delete'),
(239, 3, 'purchase_payment_view'),
(240, 3, 'purchase_payment_add'),
(241, 3, 'purchase_payment_delete'),
(242, 3, 'payment_types_add'),
(243, 3, 'payment_types_edit'),
(244, 3, 'payment_types_delete'),
(245, 3, 'payment_types_view'),
(246, 3, 'import_customers'),
(247, 3, 'import_suppliers'),
(248, 3, 'item_purchase_report'),
(249, 3, 'pos'),
(250, 3, 'help'),
(251, 3, 'view_all_users_sales_invoices'),
(252, 3, 'view_all_users_sales_return_invoices'),
(253, 3, 'view_all_users_purchase_invoices'),
(254, 3, 'view_all_users_purchase_return_invoices');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_purchase`
--

CREATE TABLE `db_purchase` (
  `id` int(50) NOT NULL,
  `purchase_code` varchar(50) DEFAULT NULL,
  `reference_no` varchar(50) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `purchase_status` varchar(50) DEFAULT NULL,
  `supplier_id` int(5) DEFAULT NULL,
  `warehouse_id` int(5) DEFAULT NULL,
  `other_charges_input` double(20,2) DEFAULT NULL,
  `other_charges_tax_id` int(5) DEFAULT NULL,
  `other_charges_amt` double(20,2) DEFAULT NULL,
  `discount_to_all_input` double(20,2) DEFAULT NULL,
  `discount_to_all_type` varchar(50) DEFAULT NULL,
  `tot_discount_to_all_amt` double(20,2) DEFAULT NULL,
  `subtotal` double(20,2) DEFAULT NULL COMMENT 'Purchased qty',
  `round_off` double(20,2) DEFAULT NULL COMMENT 'Pending Qty',
  `grand_total` double(20,2) DEFAULT NULL,
  `purchase_note` mediumtext DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  `paid_amount` double(20,2) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_time` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `system_ip` varchar(100) DEFAULT NULL,
  `system_name` varchar(100) DEFAULT NULL,
  `company_id` int(5) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `return_bit` int(1) DEFAULT NULL COMMENT 'Purchase return raised'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_purchaseitems`
--

CREATE TABLE `db_purchaseitems` (
  `id` int(50) NOT NULL,
  `purchase_id` int(5) DEFAULT NULL,
  `purchase_status` varchar(50) DEFAULT NULL,
  `item_id` int(5) DEFAULT NULL,
  `purchase_qty` double(20,2) DEFAULT NULL,
  `price_per_unit` double(20,2) DEFAULT NULL,
  `tax_id` int(5) DEFAULT NULL,
  `tax_amt` double(20,2) DEFAULT NULL,
  `tax_type` varchar(50) DEFAULT NULL,
  `unit_discount_per` double(20,2) DEFAULT NULL,
  `discount_amt` double(20,2) DEFAULT NULL,
  `unit_total_cost` double(20,2) DEFAULT NULL,
  `total_cost` double(20,2) DEFAULT NULL,
  `profit_margin_per` double(20,2) DEFAULT NULL,
  `unit_sales_price` double(20,2) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `discount_type` varchar(100) DEFAULT NULL,
  `discount_input` double(20,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_purchaseitemsreturn`
--

CREATE TABLE `db_purchaseitemsreturn` (
  `id` int(50) NOT NULL,
  `purchase_id` int(5) DEFAULT NULL,
  `return_id` int(5) DEFAULT NULL,
  `return_status` varchar(50) DEFAULT NULL,
  `item_id` int(5) DEFAULT NULL,
  `return_qty` double(20,2) DEFAULT NULL,
  `price_per_unit` double(20,2) DEFAULT NULL,
  `tax_id` int(5) DEFAULT NULL,
  `tax_amt` double(20,2) DEFAULT NULL,
  `tax_type` varchar(50) DEFAULT NULL,
  `unit_discount_per` double(20,2) DEFAULT NULL,
  `discount_amt` double(20,2) DEFAULT NULL,
  `unit_total_cost` double(20,2) DEFAULT NULL,
  `total_cost` double(20,2) DEFAULT NULL,
  `profit_margin_per` double(20,2) DEFAULT NULL,
  `unit_sales_price` double(20,2) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `discount_type` varchar(100) DEFAULT NULL,
  `discount_input` double(20,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_purchasepayments`
--

CREATE TABLE `db_purchasepayments` (
  `id` int(50) NOT NULL,
  `purchase_id` int(5) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_type` varchar(50) DEFAULT NULL,
  `payment` double(20,2) DEFAULT NULL,
  `payment_note` mediumtext DEFAULT NULL,
  `system_ip` varchar(50) DEFAULT NULL,
  `system_name` varchar(50) DEFAULT NULL,
  `created_time` time DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_purchasepaymentsreturn`
--

CREATE TABLE `db_purchasepaymentsreturn` (
  `id` int(50) NOT NULL,
  `purchase_id` int(11) DEFAULT NULL,
  `return_id` int(5) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_type` varchar(50) DEFAULT NULL,
  `payment` double(20,2) DEFAULT NULL,
  `payment_note` mediumtext DEFAULT NULL,
  `system_ip` varchar(50) DEFAULT NULL,
  `system_name` varchar(50) DEFAULT NULL,
  `created_time` time DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_purchasereturn`
--

CREATE TABLE `db_purchasereturn` (
  `id` int(50) NOT NULL,
  `purchase_id` int(11) DEFAULT NULL,
  `return_code` varchar(50) DEFAULT NULL,
  `reference_no` varchar(50) DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `return_status` varchar(50) DEFAULT NULL,
  `supplier_id` int(5) DEFAULT NULL,
  `warehouse_id` int(5) DEFAULT NULL,
  `other_charges_input` double(20,2) DEFAULT NULL,
  `other_charges_tax_id` int(5) DEFAULT NULL,
  `other_charges_amt` double(20,2) DEFAULT NULL,
  `discount_to_all_input` double(20,2) DEFAULT NULL,
  `discount_to_all_type` varchar(50) DEFAULT NULL,
  `tot_discount_to_all_amt` double(20,2) DEFAULT NULL,
  `subtotal` double(20,2) DEFAULT NULL COMMENT 'Purchased qty',
  `round_off` double(20,2) DEFAULT NULL COMMENT 'Pending Qty',
  `grand_total` double(20,2) DEFAULT NULL,
  `return_note` mediumtext DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  `paid_amount` double(20,2) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_time` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `system_ip` varchar(100) DEFAULT NULL,
  `system_name` varchar(100) DEFAULT NULL,
  `company_id` int(5) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_roles`
--

CREATE TABLE `db_roles` (
  `id` int(50) NOT NULL,
  `role_name` varchar(50) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_roles`
--

INSERT INTO `db_roles` (`id`, `role_name`, `description`, `status`) VALUES
(1, 'Admin', 'All Rights Permitted.', 1),
(2, 'Bán hàng', '', 1),
(3, 'Quản lý', '', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_sales`
--

CREATE TABLE `db_sales` (
  `id` int(50) NOT NULL,
  `sales_code` varchar(50) DEFAULT NULL,
  `reference_no` varchar(50) DEFAULT NULL,
  `sales_date` date DEFAULT NULL,
  `sales_status` varchar(50) DEFAULT NULL,
  `customer_id` int(5) DEFAULT NULL,
  `warehouse_id` int(5) DEFAULT NULL,
  `other_charges_input` double(20,2) DEFAULT NULL,
  `other_charges_tax_id` int(5) DEFAULT NULL,
  `other_charges_amt` double(20,2) DEFAULT NULL,
  `discount_to_all_input` double(20,2) DEFAULT NULL,
  `discount_to_all_type` varchar(50) DEFAULT NULL,
  `tot_discount_to_all_amt` double(20,2) DEFAULT NULL,
  `subtotal` double(20,2) DEFAULT NULL,
  `round_off` double(20,2) DEFAULT NULL,
  `grand_total` double(20,2) DEFAULT NULL,
  `sales_note` mediumtext DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  `paid_amount` double(20,2) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_time` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `system_ip` varchar(100) DEFAULT NULL,
  `system_name` varchar(100) DEFAULT NULL,
  `company_id` int(5) DEFAULT NULL,
  `pos` int(1) DEFAULT NULL COMMENT '1=yes 0=no',
  `status` int(1) DEFAULT NULL,
  `return_bit` int(1) DEFAULT NULL COMMENT 'sales return raised'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_salesitems`
--

CREATE TABLE `db_salesitems` (
  `id` int(50) NOT NULL,
  `sales_id` int(5) DEFAULT NULL,
  `sales_status` varchar(50) DEFAULT NULL,
  `item_id` int(5) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `sales_qty` double(20,2) DEFAULT NULL,
  `price_per_unit` double(20,2) DEFAULT NULL,
  `tax_type` varchar(50) DEFAULT NULL,
  `tax_id` int(5) DEFAULT NULL,
  `tax_amt` double(20,2) DEFAULT NULL,
  `discount_type` varchar(50) DEFAULT NULL,
  `discount_input` double(20,2) DEFAULT NULL,
  `discount_amt` double(20,2) DEFAULT NULL,
  `unit_total_cost` double(20,2) DEFAULT NULL,
  `total_cost` double(20,2) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `purchase_price` double(20,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_salesitemsreturn`
--

CREATE TABLE `db_salesitemsreturn` (
  `id` int(50) NOT NULL,
  `sales_id` int(5) DEFAULT NULL,
  `return_id` int(5) DEFAULT NULL,
  `return_status` varchar(50) DEFAULT NULL,
  `item_id` int(5) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `return_qty` double(20,2) DEFAULT NULL,
  `price_per_unit` double(20,2) DEFAULT NULL,
  `tax_id` int(5) DEFAULT NULL,
  `tax_amt` double(20,2) DEFAULT NULL,
  `tax_type` varchar(50) DEFAULT NULL,
  `discount_input` double(20,2) DEFAULT NULL,
  `discount_amt` double(20,2) DEFAULT NULL,
  `discount_type` varchar(50) DEFAULT NULL,
  `unit_total_cost` double(20,2) DEFAULT NULL,
  `total_cost` double(20,2) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `purchase_price` double(20,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_salespayments`
--

CREATE TABLE `db_salespayments` (
  `id` int(50) NOT NULL,
  `sales_id` int(5) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_type` varchar(50) DEFAULT NULL,
  `payment` double(20,2) DEFAULT NULL,
  `payment_note` mediumtext DEFAULT NULL,
  `change_return` double(20,2) DEFAULT NULL COMMENT 'Refunding the greater amount',
  `system_ip` varchar(50) DEFAULT NULL,
  `system_name` varchar(50) DEFAULT NULL,
  `created_time` time DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_salespayments`
--

INSERT INTO `db_salespayments` (`id`, `sales_id`, `payment_date`, `payment_type`, `payment`, `payment_note`, `change_return`, `system_ip`, `system_name`, `created_time`, `created_date`, `created_by`, `status`) VALUES
(96, 95, '2023-11-06', 'Cash', 120000.00, 'Paid By Cash', 0.00, '::1', 'PQDUY', '09:40:37', '2023-11-06', 'admin', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_salespaymentsreturn`
--

CREATE TABLE `db_salespaymentsreturn` (
  `id` int(50) NOT NULL,
  `sales_id` int(5) DEFAULT NULL,
  `return_id` int(5) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_type` varchar(50) DEFAULT NULL,
  `payment` double(20,2) DEFAULT NULL,
  `payment_note` mediumtext DEFAULT NULL,
  `change_return` double(20,2) DEFAULT NULL COMMENT 'Refunding the greater amount',
  `system_ip` varchar(50) DEFAULT NULL,
  `system_name` varchar(50) DEFAULT NULL,
  `created_time` time DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_salesreturn`
--

CREATE TABLE `db_salesreturn` (
  `id` int(50) NOT NULL,
  `sales_id` int(5) DEFAULT NULL,
  `return_code` varchar(50) DEFAULT NULL,
  `reference_no` varchar(50) DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `return_status` varchar(50) DEFAULT NULL,
  `customer_id` int(5) DEFAULT NULL,
  `warehouse_id` int(5) DEFAULT NULL,
  `other_charges_input` double(20,2) DEFAULT NULL,
  `other_charges_tax_id` int(5) DEFAULT NULL,
  `other_charges_amt` double(20,2) DEFAULT NULL,
  `discount_to_all_input` double(20,2) DEFAULT NULL,
  `discount_to_all_type` varchar(50) DEFAULT NULL,
  `tot_discount_to_all_amt` double(20,2) DEFAULT NULL,
  `subtotal` double(20,2) DEFAULT NULL,
  `round_off` double(20,2) DEFAULT NULL,
  `grand_total` double(20,2) DEFAULT NULL,
  `return_note` mediumtext DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  `paid_amount` double(20,2) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_time` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `system_ip` varchar(100) DEFAULT NULL,
  `system_name` varchar(100) DEFAULT NULL,
  `company_id` int(5) DEFAULT NULL,
  `pos` int(1) DEFAULT NULL COMMENT '1=yes 0=no',
  `status` int(1) DEFAULT NULL,
  `return_bit` int(1) DEFAULT NULL COMMENT 'Return raised or not 1 or null'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_sitesettings`
--

CREATE TABLE `db_sitesettings` (
  `id` int(50) NOT NULL,
  `version` varchar(10) DEFAULT NULL,
  `site_name` varchar(100) DEFAULT NULL,
  `logo` mediumtext DEFAULT NULL COMMENT 'path',
  `language_id` int(5) DEFAULT NULL,
  `currency_id` int(5) DEFAULT NULL,
  `currency_placement` varchar(50) DEFAULT NULL,
  `timezone` varchar(50) DEFAULT NULL,
  `date_format` varchar(30) DEFAULT NULL,
  `time_format` int(5) DEFAULT NULL,
  `sales_discount` double(20,2) DEFAULT NULL,
  `site_url` varchar(100) DEFAULT NULL,
  `site_title` varchar(50) DEFAULT NULL,
  `meta_title` varchar(100) DEFAULT NULL,
  `meta_desc` mediumtext DEFAULT NULL,
  `meta_keywords` mediumtext DEFAULT NULL,
  `currencysymbol_id` int(5) DEFAULT NULL,
  `regno_key` varchar(6) DEFAULT NULL,
  `copyright` mediumtext DEFAULT NULL,
  `facebook_url` mediumtext DEFAULT NULL,
  `twitter_url` mediumtext DEFAULT NULL,
  `youtube_url` mediumtext DEFAULT NULL,
  `analytic_code` mediumtext DEFAULT NULL,
  `fav_icon` mediumtext DEFAULT NULL COMMENT 'path',
  `footer_logo` mediumtext DEFAULT NULL COMMENT 'path',
  `company_id` int(1) DEFAULT NULL,
  `purchase_code` mediumtext DEFAULT NULL,
  `change_return` int(1) DEFAULT NULL COMMENT 'show in pos',
  `sales_invoice_format_id` int(5) DEFAULT NULL,
  `sales_invoice_footer_text` text DEFAULT NULL,
  `round_off` int(1) DEFAULT NULL COMMENT '1=Enble, 0=Disable',
  `machine_id` text DEFAULT NULL,
  `domain` text DEFAULT NULL,
  `show_upi_code` int(1) DEFAULT 0,
  `unique_code` text DEFAULT NULL,
  `disable_tax` int(1) DEFAULT 0 COMMENT 'If set Disable the tax from app',
  `number_to_words` varchar(100) DEFAULT 'Default',
  `backup_count` int(11) NOT NULL,
  `backup_count_max` int(11) NOT NULL,
  `backup_lastdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_sitesettings`
--

INSERT INTO `db_sitesettings` (`id`, `version`, `site_name`, `logo`, `language_id`, `currency_id`, `currency_placement`, `timezone`, `date_format`, `time_format`, `sales_discount`, `site_url`, `site_title`, `meta_title`, `meta_desc`, `meta_keywords`, `currencysymbol_id`, `regno_key`, `copyright`, `facebook_url`, `twitter_url`, `youtube_url`, `analytic_code`, `fav_icon`, `footer_logo`, `company_id`, `purchase_code`, `change_return`, `sales_invoice_format_id`, `sales_invoice_footer_text`, `round_off`, `machine_id`, `domain`, `show_upi_code`, `unique_code`, `disable_tax`, `number_to_words`, `backup_count`, `backup_count_max`, `backup_lastdate`) VALUES
(1, '2.4', 'Rabit POS', 'localhost/1559021603.jpg', 2, 45, 'Right', 'Asia/Ho_Chi_Minh\r\n', 'dd-mm-yyyy', 12, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 'Cám ơn và hẹn gặp lại quý khách', 0, 'Demo', 'demosforyou.tech', 0, 'x5no9gzba6rydkclmtjfvh0s3we418', 0, 'Indian', 3, 200, '2023-10-13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_smsapi`
--

CREATE TABLE `db_smsapi` (
  `id` int(50) NOT NULL,
  `info` varchar(150) DEFAULT NULL,
  `key` varchar(600) DEFAULT NULL,
  `key_value` varchar(600) DEFAULT NULL,
  `delete_bit` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_smsapi`
--

INSERT INTO `db_smsapi` (`id`, `info`, `key`, `key_value`, `delete_bit`) VALUES
(150, 'mobile', '', '', NULL),
(151, 'message', '', '', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_smstemplates`
--

CREATE TABLE `db_smstemplates` (
  `id` int(50) NOT NULL,
  `template_name` varchar(100) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `variables` text DEFAULT NULL,
  `company_id` int(5) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `undelete_bit` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_smstemplates`
--

INSERT INTO `db_smstemplates` (`id`, `template_name`, `content`, `variables`, `company_id`, `status`, `undelete_bit`) VALUES
(1, 'GREETING TO CUSTOMER ON SALES', 'Hi {{customer_name}},\r\nYour sales Id is {{sales_id}},\r\nSales Date {{sales_date}},\r\nTotal amount {{sales_amount}},\r\nYou have paid {{paid_amt}},\r\nand customer total due amount is {{cust_tot_due_amt}}\r\nThank you Visit Again', '{{customer_name}}\n\r\n{{sales_id}}\n\r\n{{sales_date}}\n\r\n{{sales_amount}}\n\r\n{{paid_amt}}\n\r\n{{cust_tot_due_amt}}\n\r\n{{invoice_due_amt}}\n\r\n{{company_name}}\n\r\n{{company_mobile}}\n\r\n{{company_address}}\n\r\n{{company_website}}\n\r\n{{company_email}}\n', NULL, 1, 1),
(2, 'GREETING TO CUSTOMER ON SALES RETURN', 'Hi {{customer_name}},\r\nYour sales return Id is {{return_id}},\r\nReturn Date {{return_date}},\r\nTotal amount {{return_amount}},\r\nWe paid {{paid_amt}},\r\nand customer total due amount is {{cust_tot_due_amt}}\r\nThank you Visit Again', '{{customer_name}}\n\r\n{{return_id}}\n\r\n{{return_date}}\n\r\n{{return_amount}}\n\r\n{{paid_amt}}\n\r\n{{cust_tot_due_amt}}\n\r\n{{invoice_due_amt}}\n\r\n{{company_name}}\n\r\n{{company_mobile}}\n\r\n{{company_address}}\n\r\n{{company_website}}\n\r\n{{company_email}}\n', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_sobpayments`
--

CREATE TABLE `db_sobpayments` (
  `id` int(50) NOT NULL,
  `supplier_id` int(5) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_type` varchar(50) DEFAULT NULL,
  `payment` double(20,2) DEFAULT NULL,
  `payment_note` mediumtext DEFAULT NULL,
  `system_ip` varchar(50) DEFAULT NULL,
  `system_name` varchar(50) DEFAULT NULL,
  `created_time` time DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_states`
--

CREATE TABLE `db_states` (
  `id` int(50) NOT NULL,
  `state_code` varchar(10) DEFAULT NULL,
  `state` varchar(4050) DEFAULT NULL,
  `country_code` varchar(15) DEFAULT NULL,
  `country_id` int(5) DEFAULT NULL,
  `country` varchar(15) DEFAULT NULL,
  `added_on` date DEFAULT NULL,
  `company_id` int(5) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_states`
--

INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES
(1, NULL, 'An Giang', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(2, NULL, 'Bà Rịa - Vũng Tàu', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(3, NULL, 'Bắc Giang', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(4, NULL, 'Bắc Kạn', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(5, NULL, 'Bạc Liêu', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(6, NULL, 'Bắc Ninh', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(7, NULL, 'Bến Tre', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(8, NULL, 'Bình Định', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(9, NULL, 'Bình Dương', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(10, NULL, 'Bình Phước', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(11, NULL, 'Bình Thuận', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(12, NULL, 'Cà Mau', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(13, NULL, 'Cần Thơ', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(14, NULL, 'Cao Bằng', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(15, NULL, 'Đà Nẵng', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(16, NULL, 'Đắk Lắk', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(17, NULL, 'Đắk Nông', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(18, NULL, 'Điện Biên', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(19, NULL, 'Đồng Nai', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(20, NULL, 'Đồng Tháp', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(21, NULL, 'Gia Lai', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(22, NULL, 'Hà Giang', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(23, NULL, 'Hà Nam', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(24, NULL, 'Hà Nội', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(25, NULL, 'Hà Tĩnh', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(26, NULL, 'Hải Dương', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(27, NULL, 'Hải Phòng', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(28, NULL, 'Hậu Giang', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(29, NULL, 'Hòa Bình', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(30, NULL, 'Hưng Yên', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(31, NULL, 'Khánh Hòa', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(32, NULL, 'Kiên Giang', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(33, NULL, 'Kon Tum', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(34, NULL, 'Lai Châu', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(35, NULL, 'Lâm Đồng', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(36, NULL, 'Lạng Sơn', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(37, NULL, 'Lào Cai', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(38, NULL, 'Long An', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(39, NULL, 'Nam Định', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(40, NULL, 'Nghệ An', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(41, NULL, 'Ninh Bình', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(42, NULL, 'Ninh Thuận', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(43, NULL, 'Phú Thọ', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(44, NULL, 'Phú Yên', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(45, NULL, 'Quảng Bình', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(46, NULL, 'Quảng Nam', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(47, NULL, 'Quảng Ngãi', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(48, NULL, 'Quảng Ninh', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(49, NULL, 'Quảng Trị', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(50, NULL, 'Sóc Trăng', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(51, NULL, 'Sơn La', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(52, NULL, 'Tây Ninh', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(53, NULL, 'Thái Bình', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(54, NULL, 'Thái Nguyên', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(55, NULL, 'Thanh Hóa', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(56, NULL, 'Thừa Thiên-Huế', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(57, NULL, 'Tiền Giang', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(58, NULL, 'Trà Vinh', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(59, NULL, 'Tuyên Quang', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(60, NULL, 'Vĩnh Long', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(61, NULL, 'Vĩnh Phúc', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(62, NULL, 'Yên Bái', NULL, NULL, 'Việt Nam', NULL, NULL, 1),
(63, NULL, 'Đắk Nông', NULL, NULL, 'Việt Nam', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_stockentry`
--

CREATE TABLE `db_stockentry` (
  `id` int(50) NOT NULL,
  `entry_date` date DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `qty` int(5) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_stockentry`
--

INSERT INTO `db_stockentry` (`id`, `entry_date`, `item_id`, `qty`, `note`, `status`) VALUES
(8, '2023-11-23', 1, 200000, '', 1),
(9, '2023-11-23', 2, 12000, '', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_suppliers`
--

CREATE TABLE `db_suppliers` (
  `id` int(50) NOT NULL,
  `supplier_code` varchar(20) DEFAULT NULL,
  `supplier_name` varchar(50) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `gstin` varchar(100) DEFAULT NULL,
  `tax_number` varchar(50) DEFAULT NULL,
  `vatin` varchar(100) DEFAULT NULL,
  `opening_balance` double(20,2) DEFAULT NULL,
  `purchase_due` double(20,2) DEFAULT NULL,
  `purchase_return_due` double(20,2) DEFAULT NULL,
  `country_id` int(5) DEFAULT NULL,
  `state_id` int(5) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `postcode` varchar(10) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `system_ip` varchar(50) DEFAULT NULL,
  `system_name` varchar(50) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_time` varchar(30) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `company_id` int(5) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_suppliers`
--

INSERT INTO `db_suppliers` (`id`, `supplier_code`, `supplier_name`, `mobile`, `phone`, `email`, `gstin`, `tax_number`, `vatin`, `opening_balance`, `purchase_due`, `purchase_return_due`, `country_id`, `state_id`, `city`, `postcode`, `address`, `system_ip`, `system_name`, `created_date`, `created_time`, `created_by`, `company_id`, `status`) VALUES
(1, 'SP0001', 'samsung', '0911686792', '911686792', 'fkgkf@gmail.com', '352523523', '353465476584', NULL, 5000000000000.00, NULL, NULL, 3, 1, '', '', '', '::1', 'PQDUY', '2023-10-12', '09:19:58 am', 'admin', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_supplier_payments`
--

CREATE TABLE `db_supplier_payments` (
  `id` int(50) NOT NULL,
  `purchasepayment_id` int(5) DEFAULT NULL,
  `supplier_id` int(5) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_type` varchar(50) DEFAULT NULL,
  `payment` double(20,2) DEFAULT NULL,
  `payment_note` text DEFAULT NULL,
  `system_ip` varchar(50) DEFAULT NULL,
  `system_name` varchar(50) DEFAULT NULL,
  `created_time` varchar(50) DEFAULT NULL,
  `created_date` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_tax`
--

CREATE TABLE `db_tax` (
  `id` int(50) NOT NULL,
  `tax_name` varchar(50) DEFAULT NULL,
  `tax` double(20,2) DEFAULT NULL,
  `group_bit` int(1) DEFAULT NULL COMMENT '1=Yes, 0=No',
  `subtax_ids` varchar(10) DEFAULT NULL COMMENT 'Tax groups IDs',
  `status` int(1) DEFAULT NULL,
  `undelete_bit` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_tax`
--

INSERT INTO `db_tax` (`id`, `tax_name`, `tax`, `group_bit`, `subtax_ids`, `status`, `undelete_bit`) VALUES
(1, 'None', 0.00, NULL, NULL, 1, 1),
(2, 'VAT', 10.00, NULL, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_timezone`
--

CREATE TABLE `db_timezone` (
  `id` int(50) NOT NULL,
  `timezone` varchar(100) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_timezone`
--

INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES
(1, 'Africa/Abidjan\r', 1),
(2, 'Africa/Accra\r', 1),
(3, 'Africa/Addis_Ababa\r', 1),
(4, 'Africa/Algiers\r', 1),
(5, 'Africa/Asmara\r', 1),
(6, 'Africa/Asmera\r', 1),
(7, 'Africa/Bamako\r', 1),
(8, 'Africa/Bangui\r', 1),
(9, 'Africa/Banjul\r', 1),
(10, 'Africa/Bissau\r', 1),
(11, 'Africa/Blantyre\r', 1),
(12, 'Africa/Brazzaville\r', 1),
(13, 'Africa/Bujumbura\r', 1),
(14, 'Africa/Cairo\r', 1),
(15, 'Africa/Casablanca\r', 1),
(16, 'Africa/Ceuta\r', 1),
(17, 'Africa/Conakry\r', 1),
(18, 'Africa/Dakar\r', 1),
(19, 'Africa/Dar_es_Salaam\r', 1),
(20, 'Africa/Djibouti\r', 1),
(21, 'Africa/Douala\r', 1),
(22, 'Africa/El_Aaiun\r', 1),
(23, 'Africa/Freetown\r', 1),
(24, 'Africa/Gaborone\r', 1),
(25, 'Africa/Harare\r', 1),
(26, 'Africa/Johannesburg\r', 1),
(27, 'Africa/Juba\r', 1),
(28, 'Africa/Kampala\r', 1),
(29, 'Africa/Khartoum\r', 1),
(30, 'Africa/Kigali\r', 1),
(31, 'Africa/Kinshasa\r', 1),
(32, 'Africa/Lagos\r', 1),
(33, 'Africa/Libreville\r', 1),
(34, 'Africa/Lome\r', 1),
(35, 'Africa/Luanda\r', 1),
(36, 'Africa/Lubumbashi\r', 1),
(37, 'Africa/Lusaka\r', 1),
(38, 'Africa/Malabo\r', 1),
(39, 'Africa/Maputo\r', 1),
(40, 'Africa/Maseru\r', 1),
(41, 'Africa/Mbabane\r', 1),
(42, 'Africa/Mogadishu\r', 1),
(43, 'Africa/Monrovia\r', 1),
(44, 'Africa/Nairobi\r', 1),
(45, 'Africa/Ndjamena\r', 1),
(46, 'Africa/Niamey\r', 1),
(47, 'Africa/Nouakchott\r', 1),
(48, 'Africa/Ouagadougou\r', 1),
(49, 'Africa/Porto-Novo\r', 1),
(50, 'Africa/Sao_Tome\r', 1),
(51, 'Africa/Timbuktu\r', 1),
(52, 'Africa/Tripoli\r', 1),
(53, 'Africa/Tunis\r', 1),
(54, 'Africa/Windhoek\r', 1),
(55, 'AKST9AKDT\r', 1),
(56, 'America/Adak\r', 1),
(57, 'America/Anchorage\r', 1),
(58, 'America/Anguilla\r', 1),
(59, 'America/Antigua\r', 1),
(60, 'America/Araguaina\r', 1),
(61, 'America/Argentina/Buenos_Aires\r', 1),
(62, 'America/Argentina/Catamarca\r', 1),
(63, 'America/Argentina/ComodRivadavia\r', 1),
(64, 'America/Argentina/Cordoba\r', 1),
(65, 'America/Argentina/Jujuy\r', 1),
(66, 'America/Argentina/La_Rioja\r', 1),
(67, 'America/Argentina/Mendoza\r', 1),
(68, 'America/Argentina/Rio_Gallegos\r', 1),
(69, 'America/Argentina/Salta\r', 1),
(70, 'America/Argentina/San_Juan\r', 1),
(71, 'America/Argentina/San_Luis\r', 1),
(72, 'America/Argentina/Tucuman\r', 1),
(73, 'America/Argentina/Ushuaia\r', 1),
(74, 'America/Aruba\r', 1),
(75, 'America/Asuncion\r', 1),
(76, 'America/Atikokan\r', 1),
(77, 'America/Atka\r', 1),
(78, 'America/Bahia\r', 1),
(79, 'America/Bahia_Banderas\r', 1),
(80, 'America/Barbados\r', 1),
(81, 'America/Belem\r', 1),
(82, 'America/Belize\r', 1),
(83, 'America/Blanc-Sablon\r', 1),
(84, 'America/Boa_Vista\r', 1),
(85, 'America/Bogota\r', 1),
(86, 'America/Boise\r', 1),
(87, 'America/Buenos_Aires\r', 1),
(88, 'America/Cambridge_Bay\r', 1),
(89, 'America/Campo_Grande\r', 1),
(90, 'America/Cancun\r', 1),
(91, 'America/Caracas\r', 1),
(92, 'America/Catamarca\r', 1),
(93, 'America/Cayenne\r', 1),
(94, 'America/Cayman\r', 1),
(95, 'America/Chicago\r', 1),
(96, 'America/Chihuahua\r', 1),
(97, 'America/Coral_Harbour\r', 1),
(98, 'America/Cordoba\r', 1),
(99, 'America/Costa_Rica\r', 1),
(100, 'America/Creston\r', 1),
(101, 'America/Cuiaba\r', 1),
(102, 'America/Curacao\r', 1),
(103, 'America/Danmarkshavn\r', 1),
(104, 'America/Dawson\r', 1),
(105, 'America/Dawson_Creek\r', 1),
(106, 'America/Denver\r', 1),
(107, 'America/Detroit\r', 1),
(108, 'America/Dominica\r', 1),
(109, 'America/Edmonton\r', 1),
(110, 'America/Eirunepe\r', 1),
(111, 'America/El_Salvador\r', 1),
(112, 'America/Ensenada\r', 1),
(113, 'America/Fort_Wayne\r', 1),
(114, 'America/Fortaleza\r', 1),
(115, 'America/Glace_Bay\r', 1),
(116, 'America/Godthab\r', 1),
(117, 'America/Goose_Bay\r', 1),
(118, 'America/Grand_Turk\r', 1),
(119, 'America/Grenada\r', 1),
(120, 'America/Guadeloupe\r', 1),
(121, 'America/Guatemala\r', 1),
(122, 'America/Guayaquil\r', 1),
(123, 'America/Guyana\r', 1),
(124, 'America/Halifax\r', 1),
(125, 'America/Havana\r', 1),
(126, 'America/Hermosillo\r', 1),
(127, 'America/Indiana/Indianapolis\r', 1),
(128, 'America/Indiana/Knox\r', 1),
(129, 'America/Indiana/Marengo\r', 1),
(130, 'America/Indiana/Petersburg\r', 1),
(131, 'America/Indiana/Tell_City\r', 1),
(132, 'America/Indiana/Vevay\r', 1),
(133, 'America/Indiana/Vincennes\r', 1),
(134, 'America/Indiana/Winamac\r', 1),
(135, 'America/Indianapolis\r', 1),
(136, 'America/Inuvik\r', 1),
(137, 'America/Iqaluit\r', 1),
(138, 'America/Jamaica\r', 1),
(139, 'America/Jujuy\r', 1),
(140, 'America/Juneau\r', 1),
(141, 'America/Kentucky/Louisville\r', 1),
(142, 'America/Kentucky/Monticello\r', 1),
(143, 'America/Knox_IN\r', 1),
(144, 'America/Kralendijk\r', 1),
(145, 'America/La_Paz\r', 1),
(146, 'America/Lima\r', 1),
(147, 'America/Los_Angeles\r', 1),
(148, 'America/Louisville\r', 1),
(149, 'America/Lower_Princes\r', 1),
(150, 'America/Maceio\r', 1),
(151, 'America/Managua\r', 1),
(152, 'America/Manaus\r', 1),
(153, 'America/Marigot\r', 1),
(154, 'America/Martinique\r', 1),
(155, 'America/Matamoros\r', 1),
(156, 'America/Mazatlan\r', 1),
(157, 'America/Mendoza\r', 1),
(158, 'America/Menominee\r', 1),
(159, 'America/Merida\r', 1),
(160, 'America/Metlakatla\r', 1),
(161, 'America/Mexico_City\r', 1),
(162, 'America/Miquelon\r', 1),
(163, 'America/Moncton\r', 1),
(164, 'America/Monterrey\r', 1),
(165, 'America/Montevideo\r', 1),
(166, 'America/Montreal\r', 1),
(167, 'America/Montserrat\r', 1),
(168, 'America/Nassau\r', 1),
(169, 'America/New_York\r', 1),
(170, 'America/Nipigon\r', 1),
(171, 'America/Nome\r', 1),
(172, 'America/Noronha\r', 1),
(173, 'America/North_Dakota/Beulah\r', 1),
(174, 'America/North_Dakota/Center\r', 1),
(175, 'America/North_Dakota/New_Salem\r', 1),
(176, 'America/Ojinaga\r', 1),
(177, 'America/Panama\r', 1),
(178, 'America/Pangnirtung\r', 1),
(179, 'America/Paramaribo\r', 1),
(180, 'America/Phoenix\r', 1),
(181, 'America/Port_of_Spain\r', 1),
(182, 'America/Port-au-Prince\r', 1),
(183, 'America/Porto_Acre\r', 1),
(184, 'America/Porto_Velho\r', 1),
(185, 'America/Puerto_Rico\r', 1),
(186, 'America/Rainy_River\r', 1),
(187, 'America/Rankin_Inlet\r', 1),
(188, 'America/Recife\r', 1),
(189, 'America/Regina\r', 1),
(190, 'America/Resolute\r', 1),
(191, 'America/Rio_Branco\r', 1),
(192, 'America/Rosario\r', 1),
(193, 'America/Santa_Isabel\r', 1),
(194, 'America/Santarem\r', 1),
(195, 'America/Santiago\r', 1),
(196, 'America/Santo_Domingo\r', 1),
(197, 'America/Sao_Paulo\r', 1),
(198, 'America/Scoresbysund\r', 1),
(199, 'America/Shiprock\r', 1),
(200, 'America/Sitka\r', 1),
(201, 'America/St_Barthelemy\r', 1),
(202, 'America/St_Johns\r', 1),
(203, 'America/St_Kitts\r', 1),
(204, 'America/St_Lucia\r', 1),
(205, 'America/St_Thomas\r', 1),
(206, 'America/St_Vincent\r', 1),
(207, 'America/Swift_Current\r', 1),
(208, 'America/Tegucigalpa\r', 1),
(209, 'America/Thule\r', 1),
(210, 'America/Thunder_Bay\r', 1),
(211, 'America/Tijuana\r', 1),
(212, 'America/Toronto\r', 1),
(213, 'America/Tortola\r', 1),
(214, 'America/Vancouver\r', 1),
(215, 'America/Virgin\r', 1),
(216, 'America/Whitehorse\r', 1),
(217, 'America/Winnipeg\r', 1),
(218, 'America/Yakutat\r', 1),
(219, 'America/Yellowknife\r', 1),
(220, 'Antarctica/Casey\r', 1),
(221, 'Antarctica/Davis\r', 1),
(222, 'Antarctica/DumontDUrville\r', 1),
(223, 'Antarctica/Macquarie\r', 1),
(224, 'Antarctica/Mawson\r', 1),
(225, 'Antarctica/McMurdo\r', 1),
(226, 'Antarctica/Palmer\r', 1),
(227, 'Antarctica/Rothera\r', 1),
(228, 'Antarctica/South_Pole\r', 1),
(229, 'Antarctica/Syowa\r', 1),
(230, 'Antarctica/Vostok\r', 1),
(231, 'Arctic/Longyearbyen\r', 1),
(232, 'Asia/Aden\r', 1),
(233, 'Asia/Almaty\r', 1),
(234, 'Asia/Amman\r', 1),
(235, 'Asia/Anadyr\r', 1),
(236, 'Asia/Aqtau\r', 1),
(237, 'Asia/Aqtobe\r', 1),
(238, 'Asia/Ashgabat\r', 1),
(239, 'Asia/Ashkhabad\r', 1),
(240, 'Asia/Baghdad\r', 1),
(241, 'Asia/Bahrain\r', 1),
(242, 'Asia/Baku\r', 1),
(243, 'Asia/Bangkok\r', 1),
(244, 'Asia/Beirut\r', 1),
(245, 'Asia/Bishkek\r', 1),
(246, 'Asia/Brunei\r', 1),
(247, 'Asia/Calcutta\r', 1),
(248, 'Asia/Choibalsan\r', 1),
(249, 'Asia/Chongqing\r', 1),
(250, 'Asia/Chungking\r', 1),
(251, 'Asia/Colombo\r', 1),
(252, 'Asia/Dacca\r', 1),
(253, 'Asia/Damascus\r', 1),
(254, 'Asia/Dhaka\r', 1),
(255, 'Asia/Dili\r', 1),
(256, 'Asia/Dubai\r', 1),
(257, 'Asia/Dushanbe\r', 1),
(258, 'Asia/Gaza\r', 1),
(259, 'Asia/Harbin\r', 1),
(260, 'Asia/Hebron\r', 1),
(261, 'Asia/Ho_Chi_Minh\r', 1),
(262, 'Asia/Hong_Kong\r', 1),
(263, 'Asia/Hovd\r', 1),
(264, 'Asia/Irkutsk\r', 1),
(265, 'Asia/Istanbul\r', 1),
(266, 'Asia/Jakarta\r', 1),
(267, 'Asia/Jayapura\r', 1),
(268, 'Asia/Jerusalem\r', 1),
(269, 'Asia/Kabul\r', 1),
(270, 'Asia/Kamchatka\r', 1),
(271, 'Asia/Karachi\r', 1),
(272, 'Asia/Kashgar\r', 1),
(273, 'Asia/Kathmandu\r', 1),
(274, 'Asia/Katmandu\r', 1),
(275, 'Asia/Kolkata\r', 1),
(276, 'Asia/Krasnoyarsk\r', 1),
(277, 'Asia/Kuala_Lumpur\r', 1),
(278, 'Asia/Kuching\r', 1),
(279, 'Asia/Kuwait\r', 1),
(280, 'Asia/Macao\r', 1),
(281, 'Asia/Macau\r', 1),
(282, 'Asia/Magadan\r', 1),
(283, 'Asia/Makassar\r', 1),
(284, 'Asia/Manila\r', 1),
(285, 'Asia/Muscat\r', 1),
(286, 'Asia/Nicosia\r', 1),
(287, 'Asia/Novokuznetsk\r', 1),
(288, 'Asia/Novosibirsk\r', 1),
(289, 'Asia/Omsk\r', 1),
(290, 'Asia/Oral\r', 1),
(291, 'Asia/Phnom_Penh\r', 1),
(292, 'Asia/Pontianak\r', 1),
(293, 'Asia/Pyongyang\r', 1),
(294, 'Asia/Qatar\r', 1),
(295, 'Asia/Qyzylorda\r', 1),
(296, 'Asia/Rangoon\r', 1),
(297, 'Asia/Riyadh\r', 1),
(298, 'Asia/Saigon\r', 1),
(299, 'Asia/Sakhalin\r', 1),
(300, 'Asia/Samarkand\r', 1),
(301, 'Asia/Seoul\r', 1),
(302, 'Asia/Shanghai\r', 1),
(303, 'Asia/Singapore\r', 1),
(304, 'Asia/Taipei\r', 1),
(305, 'Asia/Tashkent\r', 1),
(306, 'Asia/Tbilisi\r', 1),
(307, 'Asia/Tehran\r', 1),
(308, 'Asia/Tel_Aviv\r', 1),
(309, 'Asia/Thimbu\r', 1),
(310, 'Asia/Thimphu\r', 1),
(311, 'Asia/Tokyo\r', 1),
(312, 'Asia/Ujung_Pandang\r', 1),
(313, 'Asia/Ulaanbaatar\r', 1),
(314, 'Asia/Ulan_Bator\r', 1),
(315, 'Asia/Urumqi\r', 1),
(316, 'Asia/Vientiane\r', 1),
(317, 'Asia/Vladivostok\r', 1),
(318, 'Asia/Yakutsk\r', 1),
(319, 'Asia/Yekaterinburg\r', 1),
(320, 'Asia/Yerevan\r', 1),
(321, 'Atlantic/Azores\r', 1),
(322, 'Atlantic/Bermuda\r', 1),
(323, 'Atlantic/Canary\r', 1),
(324, 'Atlantic/Cape_Verde\r', 1),
(325, 'Atlantic/Faeroe\r', 1),
(326, 'Atlantic/Faroe\r', 1),
(327, 'Atlantic/Jan_Mayen\r', 1),
(328, 'Atlantic/Madeira\r', 1),
(329, 'Atlantic/Reykjavik\r', 1),
(330, 'Atlantic/South_Georgia\r', 1),
(331, 'Atlantic/St_Helena\r', 1),
(332, 'Atlantic/Stanley\r', 1),
(333, 'Australia/ACT\r', 1),
(334, 'Australia/Adelaide\r', 1),
(335, 'Australia/Brisbane\r', 1),
(336, 'Australia/Broken_Hill\r', 1),
(337, 'Australia/Canberra\r', 1),
(338, 'Australia/Currie\r', 1),
(339, 'Australia/Darwin\r', 1),
(340, 'Australia/Eucla\r', 1),
(341, 'Australia/Hobart\r', 1),
(342, 'Australia/LHI\r', 1),
(343, 'Australia/Lindeman\r', 1),
(344, 'Australia/Lord_Howe\r', 1),
(345, 'Australia/Melbourne\r', 1),
(346, 'Australia/North\r', 1),
(347, 'Australia/NSW\r', 1),
(348, 'Australia/Perth\r', 1),
(349, 'Australia/Queensland\r', 1),
(350, 'Australia/South\r', 1),
(351, 'Australia/Sydney\r', 1),
(352, 'Australia/Tasmania\r', 1),
(353, 'Australia/Victoria\r', 1),
(354, 'Australia/West\r', 1),
(355, 'Australia/Yancowinna\r', 1),
(356, 'Brazil/Acre\r', 1),
(357, 'Brazil/DeNoronha\r', 1),
(358, 'Brazil/East\r', 1),
(359, 'Brazil/West\r', 1),
(360, 'Canada/Atlantic\r', 1),
(361, 'Canada/Central\r', 1),
(362, 'Canada/Eastern\r', 1),
(363, 'Canada/East-Saskatchewan\r', 1),
(364, 'Canada/Mountain\r', 1),
(365, 'Canada/Newfoundland\r', 1),
(366, 'Canada/Pacific\r', 1),
(367, 'Canada/Saskatchewan\r', 1),
(368, 'Canada/Yukon\r', 1),
(369, 'CET\r', 1),
(370, 'Chile/Continental\r', 1),
(371, 'Chile/EasterIsland\r', 1),
(372, 'CST6CDT\r', 1),
(373, 'Cuba\r', 1),
(374, 'EET\r', 1),
(375, 'Egypt\r', 1),
(376, 'Eire\r', 1),
(377, 'EST\r', 1),
(378, 'EST5EDT\r', 1),
(379, 'Etc./GMT\r', 1),
(380, 'Etc./GMT+0\r', 1),
(381, 'Etc./UCT\r', 1),
(382, 'Etc./Universal\r', 1),
(383, 'Etc./UTC\r', 1),
(384, 'Etc./Zulu\r', 1),
(385, 'Europe/Amsterdam\r', 1),
(386, 'Europe/Andorra\r', 1),
(387, 'Europe/Athens\r', 1),
(388, 'Europe/Belfast\r', 1),
(389, 'Europe/Belgrade\r', 1),
(390, 'Europe/Berlin\r', 1),
(391, 'Europe/Bratislava\r', 1),
(392, 'Europe/Brussels\r', 1),
(393, 'Europe/Bucharest\r', 1),
(394, 'Europe/Budapest\r', 1),
(395, 'Europe/Chisinau\r', 1),
(396, 'Europe/Copenhagen\r', 1),
(397, 'Europe/Dublin\r', 1),
(398, 'Europe/Gibraltar\r', 1),
(399, 'Europe/Guernsey\r', 1),
(400, 'Europe/Helsinki\r', 1),
(401, 'Europe/Isle_of_Man\r', 1),
(402, 'Europe/Istanbul\r', 1),
(403, 'Europe/Jersey\r', 1),
(404, 'Europe/Kaliningrad\r', 1),
(405, 'Europe/Kiev\r', 1),
(406, 'Europe/Lisbon\r', 1),
(407, 'Europe/Ljubljana\r', 1),
(408, 'Europe/London\r', 1),
(409, 'Europe/Luxembourg\r', 1),
(410, 'Europe/Madrid\r', 1),
(411, 'Europe/Malta\r', 1),
(412, 'Europe/Mariehamn\r', 1),
(413, 'Europe/Minsk\r', 1),
(414, 'Europe/Monaco\r', 1),
(415, 'Europe/Moscow\r', 1),
(416, 'Europe/Nicosia\r', 1),
(417, 'Europe/Oslo\r', 1),
(418, 'Europe/Paris\r', 1),
(419, 'Europe/Podgorica\r', 1),
(420, 'Europe/Prague\r', 1),
(421, 'Europe/Riga\r', 1),
(422, 'Europe/Rome\r', 1),
(423, 'Europe/Samara\r', 1),
(424, 'Europe/San_Marino\r', 1),
(425, 'Europe/Sarajevo\r', 1),
(426, 'Europe/Simferopol\r', 1),
(427, 'Europe/Skopje\r', 1),
(428, 'Europe/Sofia\r', 1),
(429, 'Europe/Stockholm\r', 1),
(430, 'Europe/Tallinn\r', 1),
(431, 'Europe/Tirane\r', 1),
(432, 'Europe/Tiraspol\r', 1),
(433, 'Europe/Uzhgorod\r', 1),
(434, 'Europe/Vaduz\r', 1),
(435, 'Europe/Vatican\r', 1),
(436, 'Europe/Vienna\r', 1),
(437, 'Europe/Vilnius\r', 1),
(438, 'Europe/Volgograd\r', 1),
(439, 'Europe/Warsaw\r', 1),
(440, 'Europe/Zagreb\r', 1),
(441, 'Europe/Zaporozhye\r', 1),
(442, 'Europe/Zurich\r', 1),
(443, 'GB\r', 1),
(444, 'GB-Eire\r', 1),
(445, 'GMT\r', 1),
(446, 'GMT+0\r', 1),
(447, 'GMT0\r', 1),
(448, 'GMT-0\r', 1),
(449, 'Greenwich\r', 1),
(450, 'Hong Kong\r', 1),
(451, 'HST\r', 1),
(452, 'Iceland\r', 1),
(453, 'Indian/Antananarivo\r', 1),
(454, 'Indian/Chagos\r', 1),
(455, 'Indian/Christmas\r', 1),
(456, 'Indian/Cocos\r', 1),
(457, 'Indian/Comoro\r', 1),
(458, 'Indian/Kerguelen\r', 1),
(459, 'Indian/Mahe\r', 1),
(460, 'Indian/Maldives\r', 1),
(461, 'Indian/Mauritius\r', 1),
(462, 'Indian/Mayotte\r', 1),
(463, 'Indian/Reunion\r', 1),
(464, 'Iran\r', 1),
(465, 'Israel\r', 1),
(466, 'Jamaica\r', 1),
(467, 'Japan\r', 1),
(468, 'JST-9\r', 1),
(469, 'Kwajalein\r', 1),
(470, 'Libya\r', 1),
(471, 'MET\r', 1),
(472, 'Mexico/BajaNorte\r', 1),
(473, 'Mexico/BajaSur\r', 1),
(474, 'Mexico/General\r', 1),
(475, 'MST\r', 1),
(476, 'MST7MDT\r', 1),
(477, 'Navajo\r', 1),
(478, 'NZ\r', 1),
(479, 'NZ-CHAT\r', 1),
(480, 'Pacific/Apia\r', 1),
(481, 'Pacific/Auckland\r', 1),
(482, 'Pacific/Chatham\r', 1),
(483, 'Pacific/Chuuk\r', 1),
(484, 'Pacific/Easter\r', 1),
(485, 'Pacific/Efate\r', 1),
(486, 'Pacific/Enderbury\r', 1),
(487, 'Pacific/Fakaofo\r', 1),
(488, 'Pacific/Fiji\r', 1),
(489, 'Pacific/Funafuti\r', 1),
(490, 'Pacific/Galapagos\r', 1),
(491, 'Pacific/Gambier\r', 1),
(492, 'Pacific/Guadalcanal\r', 1),
(493, 'Pacific/Guam\r', 1),
(494, 'Pacific/Honolulu\r', 1),
(495, 'Pacific/Johnston\r', 1),
(496, 'Pacific/Kiritimati\r', 1),
(497, 'Pacific/Kosrae\r', 1),
(498, 'Pacific/Kwajalein\r', 1),
(499, 'Pacific/Majuro\r', 1),
(500, 'Pacific/Marquesas\r', 1),
(501, 'Pacific/Midway\r', 1),
(502, 'Pacific/Nauru\r', 1),
(503, 'Pacific/Niue\r', 1),
(504, 'Pacific/Norfolk\r', 1),
(505, 'Pacific/Noumea\r', 1),
(506, 'Pacific/Pago_Pago\r', 1),
(507, 'Pacific/Palau\r', 1),
(508, 'Pacific/Pitcairn\r', 1),
(509, 'Pacific/Pohnpei\r', 1),
(510, 'Pacific/Ponape\r', 1),
(511, 'Pacific/Port_Moresby\r', 1),
(512, 'Pacific/Rarotonga\r', 1),
(513, 'Pacific/Saipan\r', 1),
(514, 'Pacific/Samoa\r', 1),
(515, 'Pacific/Tahiti\r', 1),
(516, 'Pacific/Tarawa\r', 1),
(517, 'Pacific/Tongatapu\r', 1),
(518, 'Pacific/Truk\r', 1),
(519, 'Pacific/Wake\r', 1),
(520, 'Pacific/Wallis\r', 1),
(521, 'Pacific/Yap\r', 1),
(522, 'Poland\r', 1),
(523, 'Portugal\r', 1),
(524, 'PRC\r', 1),
(525, 'PST8PDT\r', 1),
(526, 'ROC\r', 1),
(527, 'ROK\r', 1),
(528, 'Singapore\r', 1),
(529, 'Turkey\r', 1),
(530, 'UCT\r', 1),
(531, 'Universal\r', 1),
(532, 'US/Alaska\r', 1),
(533, 'US/Aleutian\r', 1),
(534, 'US/Arizona\r', 1),
(535, 'US/Central\r', 1),
(536, 'US/Eastern\r', 1),
(537, 'US/East-Indiana\r', 1),
(538, 'US/Hawaii\r', 1),
(539, 'US/Indiana-Starke\r', 1),
(540, 'US/Michigan\r', 1),
(541, 'US/Mountain\r', 1),
(542, 'US/Pacific\r', 1),
(543, 'US/Pacific-New\r', 1),
(544, 'US/Samoa\r', 1),
(545, 'UTC\r', 1),
(546, 'WET\r', 1),
(547, 'W-SU\r', 1),
(548, 'Zulu\r', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_units`
--

CREATE TABLE `db_units` (
  `id` int(50) NOT NULL,
  `unit_name` varchar(50) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `company_id` int(5) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_units`
--

INSERT INTO `db_units` (`id`, `unit_name`, `description`, `company_id`, `status`) VALUES
(7, 'Chai', '1 Chai', NULL, 1),
(8, 'Bát', '1 Bát', NULL, 1),
(9, 'Đĩa', '1 Đĩa', NULL, 1),
(10, 'kg', '1 kg', NULL, 1),
(11, 'Gói', '1 Gói', NULL, 1),
(12, 'Đơn vị', '1 Đơn vị', NULL, 1),
(13, 'Thùng', '1 Thùng', NULL, 1),
(14, 'Hộp', '1 Hộp', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_users`
--

CREATE TABLE `db_users` (
  `id` int(50) NOT NULL,
  `username` varchar(1350) DEFAULT NULL,
  `password` blob DEFAULT NULL,
  `member_of` varchar(50) DEFAULT NULL,
  `firstname` varchar(1350) DEFAULT NULL,
  `lastname` varchar(1350) DEFAULT NULL,
  `mobile` varchar(405) DEFAULT NULL,
  `email` varchar(1350) DEFAULT NULL,
  `photo` blob DEFAULT NULL,
  `gender` varchar(1350) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `country` varchar(1620) DEFAULT NULL,
  `state` varchar(1350) DEFAULT NULL,
  `city` varchar(1620) DEFAULT NULL,
  `address` blob DEFAULT NULL,
  `postcode` varchar(270) DEFAULT NULL,
  `role_name` varchar(1350) DEFAULT NULL,
  `role_id` int(5) DEFAULT NULL,
  `profile_picture` text DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_time` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `system_ip` varchar(100) DEFAULT NULL,
  `system_name` varchar(100) DEFAULT NULL,
  `company_id` int(5) DEFAULT NULL,
  `status` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_users`
--

INSERT INTO `db_users` (`id`, `username`, `password`, `member_of`, `firstname`, `lastname`, `mobile`, `email`, `photo`, `gender`, `dob`, `country`, `state`, `city`, `address`, `postcode`, `role_name`, `role_id`, `profile_picture`, `created_date`, `created_time`, `created_by`, `system_ip`, `system_name`, `company_id`, `status`) VALUES
(1, 'root', 0x3166623330376633346434333034376666303732393361646166616130356134, '', NULL, NULL, '9845454454', 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2018-11-27', '::1', NULL, NULL, 'superadmin', 1, 1),
(2, 'saler', 0x6531306164633339343962613539616262653536653035376632306638383365, NULL, NULL, NULL, '0911686792', 'banhang@admin.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '', '2023-10-03', '02:51:11 pm', 'admin', '::1', 'PQDUY', NULL, 1),
(3, 'admin', 0x6531306164633339343962613539616262653536653035376632306638383365, NULL, NULL, NULL, '0366793686', 'super@example.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'uploads/localhost/users/1559022862_thumb.jpg', '2023-10-03', '02:51:34 pm', 'admin', '::1', 'PQDUY', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_warehouse`
--

CREATE TABLE `db_warehouse` (
  `id` int(50) NOT NULL,
  `warehouse_name` varchar(50) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `temp_holdinvoice`
--

CREATE TABLE `temp_holdinvoice` (
  `id` int(5) NOT NULL,
  `invoice_id` int(5) DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `reference_id` varchar(50) DEFAULT NULL,
  `item_id` int(5) DEFAULT NULL,
  `item_qty` int(5) DEFAULT NULL,
  `item_price` double(10,2) DEFAULT NULL,
  `tax` double(10,2) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_time` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `system_ip` varchar(50) DEFAULT NULL,
  `system_name` varchar(50) DEFAULT NULL,
  `pos` int(5) DEFAULT NULL,
  `status` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Chỉ mục cho bảng `db_brands`
--
ALTER TABLE `db_brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_category`
--
ALTER TABLE `db_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_cobpayments`
--
ALTER TABLE `db_cobpayments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_company`
--
ALTER TABLE `db_company`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_country`
--
ALTER TABLE `db_country`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_currency`
--
ALTER TABLE `db_currency`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_customers`
--
ALTER TABLE `db_customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_customer_payments`
--
ALTER TABLE `db_customer_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `salespayment_id` (`salespayment_id`);

--
-- Chỉ mục cho bảng `db_expense`
--
ALTER TABLE `db_expense`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_expense_category`
--
ALTER TABLE `db_expense_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_hold`
--
ALTER TABLE `db_hold`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `db_holditems`
--
ALTER TABLE `db_holditems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_id` (`hold_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Chỉ mục cho bảng `db_items`
--
ALTER TABLE `db_items`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_languages`
--
ALTER TABLE `db_languages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_paymenttypes`
--
ALTER TABLE `db_paymenttypes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_permissions`
--
ALTER TABLE `db_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_purchase`
--
ALTER TABLE `db_purchase`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_purchaseitems`
--
ALTER TABLE `db_purchaseitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_id` (`purchase_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Chỉ mục cho bảng `db_purchaseitemsreturn`
--
ALTER TABLE `db_purchaseitemsreturn`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_id` (`purchase_id`),
  ADD KEY `return_id` (`return_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Chỉ mục cho bảng `db_purchasepayments`
--
ALTER TABLE `db_purchasepayments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_purchasepaymentsreturn`
--
ALTER TABLE `db_purchasepaymentsreturn`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_purchasereturn`
--
ALTER TABLE `db_purchasereturn`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_roles`
--
ALTER TABLE `db_roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_sales`
--
ALTER TABLE `db_sales`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_salesitems`
--
ALTER TABLE `db_salesitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `sales_id` (`sales_id`);

--
-- Chỉ mục cho bảng `db_salesitemsreturn`
--
ALTER TABLE `db_salesitemsreturn`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `return_id` (`return_id`),
  ADD KEY `sales_id` (`sales_id`);

--
-- Chỉ mục cho bảng `db_salespayments`
--
ALTER TABLE `db_salespayments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_salespaymentsreturn`
--
ALTER TABLE `db_salespaymentsreturn`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_salesreturn`
--
ALTER TABLE `db_salesreturn`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_sitesettings`
--
ALTER TABLE `db_sitesettings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `currencysymbol_id` (`currencysymbol_id`);

--
-- Chỉ mục cho bảng `db_smsapi`
--
ALTER TABLE `db_smsapi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_smstemplates`
--
ALTER TABLE `db_smstemplates`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_sobpayments`
--
ALTER TABLE `db_sobpayments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_states`
--
ALTER TABLE `db_states`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_stockentry`
--
ALTER TABLE `db_stockentry`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_suppliers`
--
ALTER TABLE `db_suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_supplier_payments`
--
ALTER TABLE `db_supplier_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `purchasepayment_id` (`purchasepayment_id`);

--
-- Chỉ mục cho bảng `db_tax`
--
ALTER TABLE `db_tax`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_timezone`
--
ALTER TABLE `db_timezone`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_units`
--
ALTER TABLE `db_units`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_users`
--
ALTER TABLE `db_users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `db_warehouse`
--
ALTER TABLE `db_warehouse`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `temp_holdinvoice`
--
ALTER TABLE `temp_holdinvoice`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `db_brands`
--
ALTER TABLE `db_brands`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `db_category`
--
ALTER TABLE `db_category`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `db_cobpayments`
--
ALTER TABLE `db_cobpayments`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `db_company`
--
ALTER TABLE `db_company`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `db_country`
--
ALTER TABLE `db_country`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `db_currency`
--
ALTER TABLE `db_currency`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `db_customers`
--
ALTER TABLE `db_customers`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `db_customer_payments`
--
ALTER TABLE `db_customer_payments`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4068;

--
-- AUTO_INCREMENT cho bảng `db_expense`
--
ALTER TABLE `db_expense`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `db_expense_category`
--
ALTER TABLE `db_expense_category`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `db_hold`
--
ALTER TABLE `db_hold`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `db_holditems`
--
ALTER TABLE `db_holditems`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `db_items`
--
ALTER TABLE `db_items`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `db_languages`
--
ALTER TABLE `db_languages`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `db_paymenttypes`
--
ALTER TABLE `db_paymenttypes`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `db_permissions`
--
ALTER TABLE `db_permissions`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT cho bảng `db_purchase`
--
ALTER TABLE `db_purchase`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `db_purchaseitems`
--
ALTER TABLE `db_purchaseitems`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `db_purchaseitemsreturn`
--
ALTER TABLE `db_purchaseitemsreturn`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `db_purchasepayments`
--
ALTER TABLE `db_purchasepayments`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `db_purchasepaymentsreturn`
--
ALTER TABLE `db_purchasepaymentsreturn`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `db_purchasereturn`
--
ALTER TABLE `db_purchasereturn`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `db_roles`
--
ALTER TABLE `db_roles`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `db_sales`
--
ALTER TABLE `db_sales`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT cho bảng `db_salesitems`
--
ALTER TABLE `db_salesitems`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;

--
-- AUTO_INCREMENT cho bảng `db_salesitemsreturn`
--
ALTER TABLE `db_salesitemsreturn`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `db_salespayments`
--
ALTER TABLE `db_salespayments`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT cho bảng `db_salespaymentsreturn`
--
ALTER TABLE `db_salespaymentsreturn`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `db_salesreturn`
--
ALTER TABLE `db_salesreturn`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `db_sitesettings`
--
ALTER TABLE `db_sitesettings`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `db_smsapi`
--
ALTER TABLE `db_smsapi`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT cho bảng `db_smstemplates`
--
ALTER TABLE `db_smstemplates`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `db_sobpayments`
--
ALTER TABLE `db_sobpayments`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `db_states`
--
ALTER TABLE `db_states`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `db_stockentry`
--
ALTER TABLE `db_stockentry`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `db_suppliers`
--
ALTER TABLE `db_suppliers`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `db_supplier_payments`
--
ALTER TABLE `db_supplier_payments`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=291;

--
-- AUTO_INCREMENT cho bảng `db_tax`
--
ALTER TABLE `db_tax`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `db_timezone`
--
ALTER TABLE `db_timezone`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=549;

--
-- AUTO_INCREMENT cho bảng `db_units`
--
ALTER TABLE `db_units`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `db_users`
--
ALTER TABLE `db_users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT cho bảng `db_warehouse`
--
ALTER TABLE `db_warehouse`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `temp_holdinvoice`
--
ALTER TABLE `temp_holdinvoice`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `db_customer_payments`
--
ALTER TABLE `db_customer_payments`
  ADD CONSTRAINT `db_customer_payments_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `db_customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `db_customer_payments_ibfk_2` FOREIGN KEY (`salespayment_id`) REFERENCES `db_salespayments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `db_hold`
--
ALTER TABLE `db_hold`
  ADD CONSTRAINT `db_hold_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `db_customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `db_holditems`
--
ALTER TABLE `db_holditems`
  ADD CONSTRAINT `db_holditems_ibfk_2` FOREIGN KEY (`hold_id`) REFERENCES `db_hold` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `db_holditems_ibfk_3` FOREIGN KEY (`item_id`) REFERENCES `db_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `db_purchaseitems`
--
ALTER TABLE `db_purchaseitems`
  ADD CONSTRAINT `db_purchaseitems_ibfk_1` FOREIGN KEY (`purchase_id`) REFERENCES `db_purchase` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `db_purchaseitems_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `db_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `db_purchaseitemsreturn`
--
ALTER TABLE `db_purchaseitemsreturn`
  ADD CONSTRAINT `db_purchaseitemsreturn_ibfk_1` FOREIGN KEY (`purchase_id`) REFERENCES `db_purchase` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `db_purchaseitemsreturn_ibfk_2` FOREIGN KEY (`return_id`) REFERENCES `db_purchasereturn` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `db_purchaseitemsreturn_ibfk_3` FOREIGN KEY (`item_id`) REFERENCES `db_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `db_salesitems`
--
ALTER TABLE `db_salesitems`
  ADD CONSTRAINT `db_salesitems_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `db_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `db_salesitems_ibfk_2` FOREIGN KEY (`sales_id`) REFERENCES `db_sales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `db_salesitemsreturn`
--
ALTER TABLE `db_salesitemsreturn`
  ADD CONSTRAINT `db_salesitemsreturn_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `db_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `db_salesitemsreturn_ibfk_2` FOREIGN KEY (`return_id`) REFERENCES `db_salesreturn` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `db_salesitemsreturn_ibfk_3` FOREIGN KEY (`sales_id`) REFERENCES `db_sales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `db_supplier_payments`
--
ALTER TABLE `db_supplier_payments`
  ADD CONSTRAINT `db_supplier_payments_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `db_suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `db_supplier_payments_ibfk_2` FOREIGN KEY (`purchasepayment_id`) REFERENCES `db_purchasepayments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
