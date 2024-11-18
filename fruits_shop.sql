-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 24, 2023 lúc 01:04 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `fruits_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES
(51, 2, 25, 'Bơ', 35000, 1, 'bo.jpeg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL,
  `details` varchar(500) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `details`, `price`, `image`) VALUES
(24, 'Táo xanh', 'traicay', 'Sản phẩm thường có sẵn tại shop. Để đơn hàng đầy đủ hơn. Bạn vui lòng đặt rau trước 15h hằng ngày, Shop xác nhận vào giao đủ hàng cho bạn vào hôm sau nhé.\r\n\r\nRau củ quả:\r\n\r\n☘ Được canh tác theo hướng sạch, an toàn, hướng hữu cơ.\r\n☘ Sản phẩm đa dạng, minh bạch, nguồn gốc farm rõ ràng.\r\n☘ Sản phẩm được thu hoạch, sơ chế, đóng gói, vận chuyển và giao đến bạn trong 24h.', 20000, 'taoxanh.jpg'),
(25, 'Bơ', 'traicay', 'Sản phẩm thường có sẵn tại shop. Để đơn hàng đầy đủ hơn. Bạn vui lòng đặt rau trước 15h hằng ngày, Shop xác nhận vào giao đủ hàng cho bạn vào hôm sau nhé.\r\n\r\nRau củ quả:\r\n\r\n☘ Được canh tác theo hướng sạch, an toàn, hướng hữu cơ.\r\n☘ Sản phẩm đa dạng, minh bạch, nguồn gốc farm rõ ràng.\r\n☘ Sản phẩm được thu hoạch, sơ chế, đóng gói, vận chuyển và giao đến bạn trong 24h.', 35000, 'bo.jpeg'),
(26, 'Bưởi', 'traicay', 'Sản phẩm thường có sẵn tại shop. Để đơn hàng đầy đủ hơn. Bạn vui lòng đặt rau trước 15h hằng ngày, Shop xác nhận vào giao đủ hàng cho bạn vào hôm sau nhé.\r\n\r\nRau củ quả:\r\n\r\n☘ Được canh tác theo hướng sạch, an toàn, hướng hữu cơ.\r\n☘ Sản phẩm đa dạng, minh bạch, nguồn gốc farm rõ ràng.\r\n☘ Sản phẩm được thu hoạch, sơ chế, đóng gói, vận chuyển và giao đến bạn trong 24h.', 25000, 'buoi.jpg'),
(27, 'Cam', 'traicay', 'Sản phẩm thường có sẵn tại shop. Để đơn hàng đầy đủ hơn. Bạn vui lòng đặt rau trước 15h hằng ngày, Shop xác nhận vào giao đủ hàng cho bạn vào hôm sau nhé.\r\n\r\nRau củ quả:\r\n\r\n☘ Được canh tác theo hướng sạch, an toàn, hướng hữu cơ.\r\n☘ Sản phẩm đa dạng, minh bạch, nguồn gốc farm rõ ràng.\r\n☘ Sản phẩm được thu hoạch, sơ chế, đóng gói, vận chuyển và giao đến bạn trong 24h.', 30000, 'cam.jpeg'),
(28, 'Nho xanh', 'traicay', 'Sản phẩm thường có sẵn tại shop. Để đơn hàng đầy đủ hơn. Bạn vui lòng đặt rau trước 15h hằng ngày, Shop xác nhận vào giao đủ hàng cho bạn vào hôm sau nhé.\r\n\r\nRau củ quả:\r\n\r\n☘ Được canh tác theo hướng sạch, an toàn, hướng hữu cơ.\r\n☘ Sản phẩm đa dạng, minh bạch, nguồn gốc farm rõ ràng.\r\n☘ Sản phẩm được thu hoạch, sơ chế, đóng gói, vận chuyển và giao đến bạn trong 24h.', 36000, 'nhoxanh.jpeg'),
(29, 'Nho tím', 'traicay', 'Sản phẩm thường có sẵn tại shop. Để đơn hàng đầy đủ hơn. Bạn vui lòng đặt rau trước 15h hằng ngày, Shop xác nhận vào giao đủ hàng cho bạn vào hôm sau nhé.\r\n\r\nRau củ quả:\r\n\r\n☘ Được canh tác theo hướng sạch, an toàn, hướng hữu cơ.\r\n☘ Sản phẩm đa dạng, minh bạch, nguồn gốc farm rõ ràng.\r\n☘ Sản phẩm được thu hoạch, sơ chế, đóng gói, vận chuyển và giao đến bạn trong 24h.', 35000, 'nhotim.jpeg'),
(30, 'Sầu riêng', 'traicay', 'Sản phẩm thường có sẵn tại shop. Để đơn hàng đầy đủ hơn. Bạn vui lòng đặt rau trước 15h hằng ngày, Shop xác nhận vào giao đủ hàng cho bạn vào hôm sau nhé.\r\n\r\nRau củ quả:\r\n\r\n☘ Được canh tác theo hướng sạch, an toàn, hướng hữu cơ.\r\n☘ Sản phẩm đa dạng, minh bạch, nguồn gốc farm rõ ràng.\r\n☘ Sản phẩm được thu hoạch, sơ chế, đóng gói, vận chuyển và giao đến bạn trong 24h.', 50000, 'saurieng.jpeg'),
(31, 'Mít', 'traicay', 'Sản phẩm thường có sẵn tại shop. Để đơn hàng đầy đủ hơn. Bạn vui lòng đặt rau trước 15h hằng ngày, Shop xác nhận vào giao đủ hàng cho bạn vào hôm sau nhé.\r\n\r\nRau củ quả:\r\n\r\n☘ Được canh tác theo hướng sạch, an toàn, hướng hữu cơ.\r\n☘ Sản phẩm đa dạng, minh bạch, nguồn gốc farm rõ ràng.\r\n☘ Sản phẩm được thu hoạch, sơ chế, đóng gói, vận chuyển và giao đến bạn trong 24h.', 15000, 'mit.jpeg'),
(32, 'Xoài', 'traicay', 'Sản phẩm thường có sẵn tại shop. Để đơn hàng đầy đủ hơn. Bạn vui lòng đặt rau trước 15h hằng ngày, Shop xác nhận vào giao đủ hàng cho bạn vào hôm sau nhé.\r\n\r\nRau củ quả:\r\n\r\n☘ Được canh tác theo hướng sạch, an toàn, hướng hữu cơ.\r\n☘ Sản phẩm đa dạng, minh bạch, nguồn gốc farm rõ ràng.\r\n☘ Sản phẩm được thu hoạch, sơ chế, đóng gói, vận chuyển và giao đến bạn trong 24h.\r\n', 14000, 'xoai.jpeg'),
(33, 'Ổi', 'traicay', 'Sản phẩm thường có sẵn tại shop. Để đơn hàng đầy đủ hơn. Bạn vui lòng đặt rau trước 15h hằng ngày, Shop xác nhận vào giao đủ hàng cho bạn vào hôm sau nhé.\r\n\r\nRau củ quả:\r\n\r\n☘ Được canh tác theo hướng sạch, an toàn, hướng hữu cơ.\r\n☘ Sản phẩm đa dạng, minh bạch, nguồn gốc farm rõ ràng.\r\n☘ Sản phẩm được thu hoạch, sơ chế, đóng gói, vận chuyển và giao đến bạn trong 24h.', 16000, 'oi.jpeg'),
(34, 'Bắp cải', 'rau', 'Sản phẩm thường có sẵn tại shop. Để đơn hàng đầy đủ hơn. Bạn vui lòng đặt rau trước 15h hằng ngày, Shop xác nhận vào giao đủ hàng cho bạn vào hôm sau nhé.\r\n\r\nRau củ quả:\r\n\r\n☘ Được canh tác theo hướng sạch, an toàn, hướng hữu cơ.\r\n☘ Sản phẩm đa dạng, minh bạch, nguồn gốc farm rõ ràng.\r\n☘ Sản phẩm được thu hoạch, sơ chế, đóng gói, vận chuyển và giao đến bạn trong 24h.', 12000, 'bap-cai.jpg'),
(35, 'Cải thảo', 'rau', 'Sản phẩm thường có sẵn tại shop. Để đơn hàng đầy đủ hơn. Bạn vui lòng đặt rau trước 15h hằng ngày, Shop xác nhận vào giao đủ hàng cho bạn vào hôm sau nhé.\r\n\r\nRau củ quả:\r\n\r\n☘ Được canh tác theo hướng sạch, an toàn, hướng hữu cơ.\r\n☘ Sản phẩm đa dạng, minh bạch, nguồn gốc farm rõ ràng.\r\n☘ Sản phẩm được thu hoạch, sơ chế, đóng gói, vận chuyển và giao đến bạn trong 24h.', 13000, 'caithao.jpg'),
(36, 'Cải thìa', 'rau', 'Sản phẩm thường có sẵn tại shop. Để đơn hàng đầy đủ hơn. Bạn vui lòng đặt rau trước 15h hằng ngày, Shop xác nhận vào giao đủ hàng cho bạn vào hôm sau nhé.\r\n\r\nRau củ quả:\r\n\r\n☘ Được canh tác theo hướng sạch, an toàn, hướng hữu cơ.\r\n☘ Sản phẩm đa dạng, minh bạch, nguồn gốc farm rõ ràng.\r\n☘ Sản phẩm được thu hoạch, sơ chế, đóng gói, vận chuyển và giao đến bạn trong 24h.', 12000, 'caithia.jpg'),
(37, 'Cần tây', 'rau', 'Sản phẩm thường có sẵn tại shop. Để đơn hàng đầy đủ hơn. Bạn vui lòng đặt rau trước 15h hằng ngày, Shop xác nhận vào giao đủ hàng cho bạn vào hôm sau nhé.\r\n\r\nRau củ quả:\r\n\r\n☘ Được canh tác theo hướng sạch, an toàn, hướng hữu cơ.\r\n☘ Sản phẩm đa dạng, minh bạch, nguồn gốc farm rõ ràng.\r\n☘ Sản phẩm được thu hoạch, sơ chế, đóng gói, vận chuyển và giao đến bạn trong 24h.', 16000, 'cantay.jpg'),
(38, 'Cà rốt', 'rau', 'Sản phẩm thường có sẵn tại shop. Để đơn hàng đầy đủ hơn. Bạn vui lòng đặt rau trước 15h hằng ngày, Shop xác nhận vào giao đủ hàng cho bạn vào hôm sau nhé.\r\n\r\nRau củ quả:\r\n\r\n☘ Được canh tác theo hướng sạch, an toàn, hướng hữu cơ.\r\n☘ Sản phẩm đa dạng, minh bạch, nguồn gốc farm rõ ràng.\r\n☘ Sản phẩm được thu hoạch, sơ chế, đóng gói, vận chuyển và giao đến bạn trong 24h.', 15000, 'carot.png'),
(39, 'Khổ qua', 'rau', 'Sản phẩm thường có sẵn tại shop. Để đơn hàng đầy đủ hơn. Bạn vui lòng đặt rau trước 15h hằng ngày, Shop xác nhận vào giao đủ hàng cho bạn vào hôm sau nhé.\r\n\r\nRau củ quả:\r\n\r\n☘ Được canh tác theo hướng sạch, an toàn, hướng hữu cơ.\r\n☘ Sản phẩm đa dạng, minh bạch, nguồn gốc farm rõ ràng.\r\n☘ Sản phẩm được thu hoạch, sơ chế, đóng gói, vận chuyển và giao đến bạn trong 24h.', 17000, 'khoqua.jpg'),
(40, 'Củ cải trắng', 'rau', 'Sản phẩm thường có sẵn tại shop. Để đơn hàng đầy đủ hơn. Bạn vui lòng đặt rau trước 15h hằng ngày, Shop xác nhận vào giao đủ hàng cho bạn vào hôm sau nhé.\r\n\r\nRau củ quả:\r\n\r\n☘ Được canh tác theo hướng sạch, an toàn, hướng hữu cơ.\r\n☘ Sản phẩm đa dạng, minh bạch, nguồn gốc farm rõ ràng.\r\n☘ Sản phẩm được thu hoạch, sơ chế, đóng gói, vận chuyển và giao đến bạn trong 24h.', 12000, 'cucai.jpeg'),
(41, 'Củ dền', 'rau', 'Sản phẩm thường có sẵn tại shop. Để đơn hàng đầy đủ hơn. Bạn vui lòng đặt rau trước 15h hằng ngày, Shop xác nhận vào giao đủ hàng cho bạn vào hôm sau nhé.\r\n\r\nRau củ quả:\r\n\r\n☘ Được canh tác theo hướng sạch, an toàn, hướng hữu cơ.\r\n☘ Sản phẩm đa dạng, minh bạch, nguồn gốc farm rõ ràng.\r\n☘ Sản phẩm được thu hoạch, sơ chế, đóng gói, vận chuyển và giao đến bạn trong 24h.', 13000, 'cuden.jpeg'),
(42, 'Khoai tây', 'rau', 'Sản phẩm thường có sẵn tại shop. Để đơn hàng đầy đủ hơn. Bạn vui lòng đặt rau trước 15h hằng ngày, Shop xác nhận vào giao đủ hàng cho bạn vào hôm sau nhé.\r\n\r\nRau củ quả:\r\n\r\n☘ Được canh tác theo hướng sạch, an toàn, hướng hữu cơ.\r\n☘ Sản phẩm đa dạng, minh bạch, nguồn gốc farm rõ ràng.\r\n☘ Sản phẩm được thu hoạch, sơ chế, đóng gói, vận chuyển và giao đến bạn trong 24h.', 20000, 'khoaitay.jpeg'),
(43, 'Rau thơm', 'rau', 'Sản phẩm thường có sẵn tại shop. Để đơn hàng đầy đủ hơn. Bạn vui lòng đặt rau trước 15h hằng ngày, Shop xác nhận vào giao đủ hàng cho bạn vào hôm sau nhé.\r\n\r\nRau củ quả:\r\n\r\n☘ Được canh tác theo hướng sạch, an toàn, hướng hữu cơ.\r\n☘ Sản phẩm đa dạng, minh bạch, nguồn gốc farm rõ ràng.\r\n☘ Sản phẩm được thu hoạch, sơ chế, đóng gói, vận chuyển và giao đến bạn trong 24h.', 13000, 'rauthom.jpeg'),
(44, 'Nấm bào ngư', 'nam', 'Sản phẩm thường có sẵn tại shop. Để đơn hàng đầy đủ hơn. Bạn vui lòng đặt rau trước 15h hằng ngày, Shop xác nhận vào giao đủ hàng cho bạn vào hôm sau nhé.\r\n\r\nRau củ quả:\r\n\r\n☘ Được canh tác theo hướng sạch, an toàn, hướng hữu cơ.\r\n☘ Sản phẩm đa dạng, minh bạch, nguồn gốc farm rõ ràng.\r\n☘ Sản phẩm được thu hoạch, sơ chế, đóng gói, vận chuyển và giao đến bạn trong 24h.', 15000, 'nambaongu.png'),
(45, 'Nấm đông cô', 'nam', 'Sản phẩm thường có sẵn tại shop. Để đơn hàng đầy đủ hơn. Bạn vui lòng đặt rau trước 15h hằng ngày, Shop xác nhận vào giao đủ hàng cho bạn vào hôm sau nhé.\r\n\r\nRau củ quả:\r\n\r\n☘ Được canh tác theo hướng sạch, an toàn, hướng hữu cơ.\r\n☘ Sản phẩm đa dạng, minh bạch, nguồn gốc farm rõ ràng.\r\n☘ Sản phẩm được thu hoạch, sơ chế, đóng gói, vận chuyển và giao đến bạn trong 24h.', 17000, 'namdongco.jpeg'),
(46, 'Nấm đùi gà', 'nam', 'Sản phẩm thường có sẵn tại shop. Để đơn hàng đầy đủ hơn. Bạn vui lòng đặt rau trước 15h hằng ngày, Shop xác nhận vào giao đủ hàng cho bạn vào hôm sau nhé.\r\n\r\nRau củ quả:\r\n\r\n☘ Được canh tác theo hướng sạch, an toàn, hướng hữu cơ.\r\n☘ Sản phẩm đa dạng, minh bạch, nguồn gốc farm rõ ràng.\r\n☘ Sản phẩm được thu hoạch, sơ chế, đóng gói, vận chuyển và giao đến bạn trong 24h.', 25000, 'duiga.jpeg'),
(47, 'Nấm kim châm', 'nam', 'Sản phẩm thường có sẵn tại shop. Để đơn hàng đầy đủ hơn. Bạn vui lòng đặt rau trước 15h hằng ngày, Shop xác nhận vào giao đủ hàng cho bạn vào hôm sau nhé.\r\n\r\nRau củ quả:\r\n\r\n☘ Được canh tác theo hướng sạch, an toàn, hướng hữu cơ.\r\n☘ Sản phẩm đa dạng, minh bạch, nguồn gốc farm rõ ràng.\r\n☘ Sản phẩm được thu hoạch, sơ chế, đóng gói, vận chuyển và giao đến bạn trong 24h.', 13000, 'kimcham.jpeg'),
(48, 'Nấm bạch tuyết', 'nam', 'Sản phẩm thường có sẵn tại shop. Để đơn hàng đầy đủ hơn. Bạn vui lòng đặt rau trước 15h hằng ngày, Shop xác nhận vào giao đủ hàng cho bạn vào hôm sau nhé.\r\n\r\nRau củ quả:\r\n\r\n☘ Được canh tác theo hướng sạch, an toàn, hướng hữu cơ.\r\n☘ Sản phẩm đa dạng, minh bạch, nguồn gốc farm rõ ràng.\r\n☘ Sản phẩm được thu hoạch, sơ chế, đóng gói, vận chuyển và giao đến bạn trong 24h.', 17000, 'bachtuyet.jpeg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user',
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`, `image`) VALUES
(1, 'Kim Ngânn', 'buithikimngan290903@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 'z4898115887236_736e0644acca38585993b78518b3d784.jpg'),
(2, 'Trương Lợii', '21004224@st.vlute.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'user', 'z4228775346127_1955ceb33d4854b61183eeca4f42745f.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `message`
--
ALTER TABLE `message`
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
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
