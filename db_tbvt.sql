-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 02, 2021 lúc 01:58 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_tbvt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `username` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `status`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 1),
(2, 'admin1', 'admin1', 1),
(3, 'vietdung', 'a123456', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(5) NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`brand_id`, `name`, `status`) VALUES
(1, 'Panasonic', 1),
(2, 'LG', 1),
(3, 'Suzuki', 1),
(5, 'Yamaha', 1),
(6, 'Samsung', 1),
(7, 'Sony', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(5) NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`cat_id`, `name`, `status`) VALUES
(1, 'Tivi', 1),
(2, 'Tủ lạnh', 1),
(3, 'Máy giặt', 1),
(4, 'Máy lạnh, quạt, điều hòa', 1),
(5, 'Đồ bếp', 1),
(6, 'Chưa biết', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(5) NOT NULL,
  `member_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL,
  `date` datetime NOT NULL,
  `content` tinytext COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `member_id`, `product_id`, `date`, `content`, `status`) VALUES
(1, 2, 4, '2021-08-04 23:22:10', 'aaaaaaaaa', 0),
(2, 2, 2, '2021-08-04 23:24:27', 'BBBBBBB', 0),
(3, 3, 5, '2021-08-04 23:26:49', 'CCCCCCC', 1),
(4, 3, 5, '2021-08-04 23:27:36', 'DDDDDDDD', 0),
(5, 4, 0, '2021-08-05 08:50:21', 'EEEEEEE', 0),
(6, 4, 2, '2021-08-05 09:32:58', 'FFFFFFFFF', 1),
(7, 1, 4, '2021-08-05 09:36:11', 'OOOOOOOOO', 0),
(8, 1, 5, '2021-08-05 09:40:30', 'wqeqweqeqwe4', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `members`
--

CREATE TABLE `members` (
  `member_id` int(5) NOT NULL,
  `username` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `fullname` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `mobile` varchar(12) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(32) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `members`
--

INSERT INTO `members` (`member_id`, `username`, `password`, `fullname`, `mobile`, `address`, `email`, `status`) VALUES
(11, 'hungphamprovip', '123456789', 'Hưng Ank Fạm', '0123456789', 'Việt Chì Fú Thọ', 'hungwanhfam@yahoo.com', 1),
(12, 'user1', '123456789', 'User1', '0147258369', 'Hai Phong', 'User1@dienmayxanh.com', 1),
(13, 'user2', 'd41d8cd98f00b204e9800998ecf8427e', 'ASdasdasdasd', '0156489855', 'Hai Phong', 'user2@gmail.com', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`product_id`, `order_id`, `quantity`, `price`) VALUES
(1, 19, 1, 3400000),
(1, 22, 1, 3400000),
(1, 23, 1, 3400000),
(1, 24, 1, 3400000),
(1, 25, 1, 3400000),
(2, 19, 1, 2100000),
(2, 22, 1, 2100000),
(2, 23, 1, 2100000),
(2, 24, 1, 2100000),
(3, 19, 1, 1200000),
(3, 22, 1, 1200000),
(3, 23, 1, 1200000),
(3, 24, 1, 1200000),
(4, 23, 1, 42333000),
(6, 25, 1, 10000000),
(13, 25, 2, 600000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ordermethod`
--

CREATE TABLE `ordermethod` (
  `id` int(11) NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `ordermethod`
--

INSERT INTO `ordermethod` (`id`, `name`, `status`) VALUES
(1, 'Trực tiếp cho người giao hàng ', 1),
(2, 'Chuyển khoản', 1),
(3, 'Thanh toán tại shop', 1),
(4, 'Paypal', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_method_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `orderdate` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1: Chưa xử lý; 2: Đang xử lý; 3: Đã xử lý; 4: Huỷ ',
  `name` varchar(25) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `address` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `mobile` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `note` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `order_method_id`, `member_id`, `orderdate`, `status`, `name`, `address`, `mobile`, `email`, `note`) VALUES
(19, 1, 11, '2021-11-05 10:08:28', 1, 'Hưng Ank Fạm', 'Việt Chì Fú Thọ', '0123456789', 'hungwanhfam@yahoo.com', ''),
(22, 1, 11, '2021-11-05 11:03:02', 3, 'Hưng Ank Fạm', 'Việt Chì Fú Thọ', '0123456789', 'hungwanhfam@yahoo.com', 'Giao trong ngafy'),
(23, 2, 11, '2021-11-12 09:54:15', 3, 'Hưng Ank Fạm', 'Việt Chì Fú Thọ', '0123456789', 'hungwanhfam@yahoo.com', 'Giao cẩn thận k hỏng'),
(24, 1, 12, '2021-11-25 15:31:01', 3, 'User1', 'Hai Phong', '0147258369', 'User1@dienmayxanh.com', 'Giao ngay hom nay'),
(25, 4, 12, '2021-11-25 19:34:09', 3, 'User1', 'Hai Phong', '0147258369', 'User1@dienmayxanh.com', 'giao cang som cang tot');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(5) NOT NULL,
  `product_cat` int(5) NOT NULL,
  `product_brand` int(5) NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `description` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `name`, `price`, `image`, `description`, `status`) VALUES
(1, 2, 3, 'Tủ lạnh panasonic', 3400000, 'tulanhpana.jpg', '<p>Tủ lạnh panasonic</p>\n', 1),
(2, 4, 2, 'Điều hòa inventer', 2100000, 'dieuhoa.jpg', 'Điều hòa inventer', 1),
(3, 3, 3, 'Máy giặt', 1200000, 'maygiat.jpg', 'Máy giặt', 1),
(4, 2, 2, 'Tủ lạnh samsung', 42333000, 'tulanhsamsung.jpg', 'Tủ lạnh samsung', 1),
(5, 5, 5, 'Lò vi sóng sharp', 1200000, 'lovisong.jpg', 'Lò vi sóng sharp', 1),
(6, 1, 2, 'TV LG', 10000000, 'tvlg.jpg', '<p>TV LG</p>\n', 1),
(8, 1, 1, 'Tivi Panasonic', 120000000, 'tivipanasonic.jpg', '<p>TV panasonic</p>', 1),
(11, 3, 3, 'Máy giặt Beko', 8790000, 'maygiat2.jpg', 'Máy giặt Beko', 1),
(12, 4, 2, 'Quạt hơi nước', 1500000, 'quathoinuoc.jpg', '', 1),
(13, 5, 5, 'Bếp từ sunhouse', 600000, 'beptu.jpg', '', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`product_id`,`order_id`);

--
-- Chỉ mục cho bảng `ordermethod`
--
ALTER TABLE `ordermethod`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `ordermethod`
--
ALTER TABLE `ordermethod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
