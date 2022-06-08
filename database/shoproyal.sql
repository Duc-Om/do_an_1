-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 04, 2022 lúc 08:53 AM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shoproyal`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `name_receiver` varchar(100) DEFAULT NULL,
  `phone_receiver` varchar(10) DEFAULT NULL,
  `address_receiver` varchar(200) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `total` float DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL COMMENT '0 - trong giỏ hàng\r\n1 - đang chờ xác nhận\r\n2- đã xác nhận'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name_receiver`, `phone_receiver`, `address_receiver`, `created_date`, `total`, `status`) VALUES
(1, 3, 'Phạm Duy Tân', '0973889724', 'Đại học kinh bắc', '2022-05-31 17:23:32', 6146400, 3),
(2, 2, 'Đặng Quốc Ân', '0754312734', 'Yên Bái', '2022-05-31 17:25:01', 4392800, 4),
(3, 3, 'Phạm Duy Tân', '0973889724', 'Hà Nội', '2022-06-01 08:38:57', 2123200, 3),
(4, 2, 'Đặng Quốc Ân', '0754312734', 'Bắc Cạn', '2022-06-01 08:40:13', 2100000, 2),
(5, 3, 'Phạm Duy Tân', '0973889724', 'Bắc Ninh', '2022-06-01 15:05:02', 1446400, 3),
(6, 3, 'Phạm Duy Tân', '0973889724', 'Hà Nội City', '2022-06-03 02:52:44', 2508600, 2),
(7, 3, 'Phạm Duy Tân', '0973889724', 'Bắc Ninh', '2022-06-03 06:36:17', 2146400, 3),
(8, 3, 'Phạm Duy Tân', '0973889724', 'Bắc Giang', '2022-06-04 06:45:27', 1400000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_products`
--

CREATE TABLE `order_products` (
  `order_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_products`
--

INSERT INTO `order_products` (`order_id`, `product_id`, `quantity`, `status`) VALUES
(1, 1, 2, 1),
(1, 3, 2, 1),
(1, 5, 3, 1),
(1, 6, 2, 1),
(2, 3, 2, 1),
(2, 6, 4, 1),
(3, 1, 2, 1),
(3, 6, 1, 1),
(4, 3, 2, 1),
(4, 5, 1, 1),
(5, 6, 2, 1),
(6, 3, 1, 1),
(6, 6, 2, 1),
(6, 7, 2, 1),
(7, 1, 1, 1),
(7, 6, 2, 1),
(8, 1, 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `discount` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `suppliers_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `discount`, `photo`, `description`, `suppliers_id`) VALUES
(1, 'Ducati Panigale V4', 700000, 0, 'photo_products/124023369562923a6ce3712.jpg', 'Nón bảo hiểm thiết kế dành riêng cho Ducati Panigale V4.\nKhông chịu kém cạnh 2 mẫu nón thiết kế dành riêng cho BMW S1000RR mà MotoSaigon từng giới thiệu, mẫu nón bảo hiểm được Design dành cho các chủ sở hữu siêu phẩm đến từ Ý Ducati ', 2),
(2, 'S1000RR', 1000000, 0, 'photo_products/161633164862923b106aa5d.jpg', 'Thêm một chiếc nón bảo hiểm với thiết kế tuyệt đẹp, thiết kế dành riêng cho mẫu xe Sport-bike hàng đầu thương hiệu BMW S1000RR. Chiếc nón được phối 3 màu đặc trưng của S1000RR Xanh Đỏ và Trắng cực kỳ đẹp mắt.', 3),
(3, 'Yohe 978 SRT', 752203, 0, 'photo_products/55951526762923bb893cff.jpg', 'Mũ Fullface Yohe 978 là dòng mũ mới nhất đạt chuẩn châu Âu, kiểu dáng thanh thoát mạnh mẽ cực đẹp.\r\nCác đặc điểm chính của mũ Fullface Yohe 978 SRT:\r\nVỏ bằng chất liệu ABS nguyên sinh, có tính năng hấp thụ lực tốt, đáp ứng độ an toàn cao (tham khảo bài viết Nguyên liệu làm vỏ mũ bảo hiểm để biết thêm về chất liệu ABS)\r\nKính chắn mũ Fullface Yohe 978 Sahara độ bền cao, có tác dụng chắn gió, bụi, đá băng, côn trùng bay vào mắt,... mà không làm biến dạng hình ảnh.\r\nKính chắn ngoài đạt tiêu chuẩn Châu Âu E1. Bên cạnh đó phần kính chắn này còn được thiết kế với phần rìa trái và phải nhô ra ngay mũi kính, giúp người đội lật mở hay đóng kính cách nhanh chóng, thuận tiện cho cả người thuận tay phải lẫn tay trái.', 1),
(4, 'Fullface Royal H1', 450000, 0, 'photo_products/185600473362923d175148c.jpg', 'Chiếc mũ bảo hiểm Fullface Royal H1 rất được ưa chuộng bởi vẻ ngoài đơn giản, cổ điển nhưng không kém phần thời trang, tinh tế.. rất thích hợp với các biker yêu thích phong cách classic, vintage.', 1),
(5, 'Fullface AGU', 600000, 0, 'photo_products/143572317762923e5c0f5d5.jpg', 'Vỏ Nón Bảo Hiểm Fullface AGU được làm từ nhựa ABS nguyên sinh, nhựa ABS nguyên sinh.\r\nCó độ bền cao và chịu va đập tốt.\r\nMút xốp bằng EPS hấp thụ chấn động khi có sự cố.\r\nQuai mũ dệt 2 lớp bằng sợi tổng hợp, chịu lực giật kéo tốt.\r\nMiếng lót bên trong Nón Bảo Hiểm Fullface AGU có thể được tháo rời giúp việc vệ sinh dễ dàng.\r\nNgoài ra phần đệm lót bên trong nón còn có lớp vải kháng khuẩn, chống ẩm, rất tốt cho việc bảo vệ chiếc nón khỏi mùi hôi, ẩm mốc.\r\nKhóa lẫy kim loại chất lượng cao, có các nấc để thao tác khóa mũ dễ dàng và tiện lợi.\r\nKích thước vòng đầu : 56-59c', 1),
(6, 'Yohe 978 SRT', 723200, 0, 'photo_products/114220748562923ee5cad67.jpg', 'Vỏ Nón Bảo Hiểm Fullface AGU được làm từ nhựa ABS nguyên sinh, nhựa ABS nguyên sinh.\r\nCó độ bền cao và chịu va đập tốt.\r\nMút xốp bằng EPS hấp thụ chấn động khi có sự cố.\r\nQuai mũ dệt 2 lớp bằng sợi tổng hợp, chịu lực giật kéo tốt.\r\nMiếng lót bên trong Nón Bảo Hiểm Fullface AGU có thể được tháo rời giúp việc vệ sinh dễ dàng.\r\nNgoài ra phần đệm lót bên trong nón còn có lớp vải kháng khuẩn, chống ẩm, rất tốt cho việc bảo vệ chiếc nón khỏi mùi hôi, ẩm mốc.\r\nKhóa lẫy kim loại chất lượng cao, có các nấc để thao tác khóa mũ dễ dàng và tiện lợi.\r\nKích thước vòng đầu : 56-59c', 4),
(7, 'Mũ Bảo Hiểm 3/4 Có Tai Pikachu', 155000, 0, 'photo_products/13333283946297df9f04b67.jpg', 'MŨ 3/4 PIKACHU CÓ TAI Đạt chuẩn CR, bảo hành bao rơi bao đập. Lót và xốp bên trông cao cấp. Sản xuất 100% tại Việt Nam. Free Size. Vòng đầu từ 53 - 60 cm. Cam Kết:Sản phẩm như hình Tính chất đặc trưng của ABS là độ chịu va đập và độ dai: Do đó 1 chiếc mũ bảo hiểm được sản xuất từ nhựa ABS giúp đảm bảo an toàn hơn khi không may có sự cố. Ngoài yếu tố an toàn, việc đội mũ bảo hiểm có cảm giác thoải mái cũng được quan tâm nhiều. Khách hàng luôn mong muốn được sử dụng sản phẩm mũ bảo hiểm không có cảm giác hầm nóng khi đội . Mũ bảo hiểm thiết kế lớp bên trong là mút xốp EPS . Mút xốp EPS có những đặc điểm sau + Khả năng cách nhiệt cao, giúp tạo cảm giác thoáng mát, không bị hầm nóng khi đội ( giúp bạn vẫn giữ được mái tóc gọn gàng ) + Ngăn chặn sự tồn tại của vi khuẩn, nấm mốc và sự ngưng tụ nước. + Không độc hại với con người, và môi trường', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) NOT NULL,
  `name` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'ADMIN'),
(2, 'USER');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `address`, `phone`, `email`) VALUES
(1, 'Royal', 'Hà Nội', '0356835202', 'royalcity@gmail.com'),
(2, 'Yamaha', 'Lào Cai', '0356835232', 'yamahacity@gmail.com'),
(3, 'Toyota', 'Hà Nội', '0356835221', 'toyotacity@gmail.com'),
(4, 'Royal Carbon M09', 'Bắc Giang', '0973889724', 'royalcarbonm09@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `account` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `roles_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `gender`, `address`, `phone`, `email`, `account`, `password`, `avatar`, `roles_id`) VALUES
(1, 'Bùi Minh Đức', 'male', 'Lào Cai', '0356835281', 'buiminhduc2k@gmail.com', 'ducom230920', '$2y$10$gHtiNexdYcAz8ZJGt8Hw/.fDn8s8.Rg59o9iYa5pPPuBKt.0yUwu6', 'photo_avatar/975493798628d50a399a32.jpg', 1),
(2, 'Đặng Quốc Ân', 'male', 'Yên Bái', '0754312734', 'dangquocan1@gmail.com', 'dangquocan', '$2y$10$CHWfHZsHwmK.rpNQkYG9nO3kod0n3IZOmZfHiZOVwkCcF0mpmv2WW', 'photo_avatar/1386140184628fe9b24a053.jpg', 2),
(3, 'Phạm Duy Tân', 'male', 'Bắc Giang', '0973889724', 'phamduytan@gmail.com', 'phamduytan', '$2y$10$cSwYbb1qcwmAcPaO.trPse4M4QxJSGe.ByrfvJk38m2lnUW8RZpzy', 'photo_avatar/88931614628fea108b0da.jpg', 2),
(6, 'Kiên', 'male', 'Hải Dương', '0356835222', 'kienhaiduong@gmail.com', 'kienhaiduong', '$2y$10$IFOBcYkU66PBlRT6.nFwEegvnvuM4DoRtpf8Wz65gRxCevsOW6s6a', '', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `fk_product_order` (`product_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suppliers_id` (`suppliers_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Chỉ mục cho bảng `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `account` (`account`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `address` (`address`),
  ADD UNIQUE KEY `avatar` (`avatar`),
  ADD KEY `roles_id` (`roles_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `fk_order_product` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `fk_product_order` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`suppliers_id`) REFERENCES `suppliers` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`suppliers_id`) REFERENCES `suppliers` (`id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
