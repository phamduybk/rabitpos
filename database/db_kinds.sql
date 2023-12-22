-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 03, 2023 lúc 04:17 AM
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
-- Cấu trúc bảng cho bảng `db_kinds`
--

CREATE TABLE `db_kinds` (
  `id` int(50) NOT NULL,
  `kind_name` varchar(50) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `company_id` int(5) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_kinds`
--

INSERT INTO `db_kinds` (`kind_name`, `description`, `company_id`, `status`) VALUES
( 'Size M màu trắng', '', NULL, 1),
('Size S màu trắng', '', NULL, 1),
('Size M màu đen', '', NULL, 1),
( 'loại 15 cm', '', NULL, 1),
('loại 20 cm', '', NULL, 1),
('loại 25 cm', '', NULL, 1),


--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `db_kinds`
--
ALTER TABLE `db_kinds`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `db_kinds`
--
ALTER TABLE `db_kinds`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;


