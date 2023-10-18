-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th8 20, 2022 lúc 05:04 AM
-- Phiên bản máy phục vụ: 8.0.17
-- Phiên bản PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `technology`
-- Cấu trúc bảng cho bảng `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(255) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_user`
--

INSERT INTO `admin_user` (`id`, `name`, `email`, `phone`, `address`, `password`, `status`) VALUES
(1, 'Huỳnh Trọng Nghĩa', 'htnghia2702@gmail.com', '012335555', 'Tây ninh', 'huynhtrongnghia', 'user'),
(2, 'admin', 'admin@gmail.com', '', '', 'admin', 'admin\r\n');


-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_khachhang` int(11) NOT NULL,
  `code_cart` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `cart_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id_cart`, `id_khachhang`, `code_cart`, `cart_status`) VALUES
(26, 23, '4069', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_detail`
--

CREATE TABLE `cart_detail` (
  `id_cart_detail` int(11) NOT NULL,
  `code_cart` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `cart_detail`
--

INSERT INTO `cart_detail` (`id_cart_detail`, `code_cart`, `id_sanpham`, `soluong`) VALUES
(47, '4069', 42, 2),
(48, '4069', 31, 1),
(49, '4069', 38, 1),
(50, '4069', 43, 1),
(51, '4069', 39, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catalog`
--

CREATE TABLE `catalog` (
  `catalog_name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `sort_order` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `catalog`
--

INSERT INTO `catalog` (`catalog_name`, `parent_id`, `sort_order`) VALUES
('Điện Thoại', 1, 1),
('LapTop', 2, 2),
('TabLet', 3, 3),
('Phụ Kiện', 4, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `parent_id` int(11) NOT NULL,
  `catalog_id` int(11) NOT NULL,
  `category_name` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`parent_id`, `catalog_id`, `category_name`, `sort`) VALUES
(1, 1, 'Iphone', 0),
(1, 2, 'SamSung', 0),
(1, 3, 'Oppo', 0),
(1, 4, 'Vivo', 0),
(1, 5, 'Xiaomi', 0),
(1, 6, 'Realme', 0),
(1, 7, 'NoKia', 0),
(1, 8, 'Asus', 0),
(2, 1, 'Asus', 0),
(2, 2, 'Dell', 0),
(2, 3, 'MacBook', 0),
(2, 4, 'Acer', 0),
(2, 5, 'HP', 0),
(2, 6, 'Msi', 0),
(2, 7, 'Lenovo', 0),
(3, 1, 'SamSung', 0),
(3, 2, 'iPad', 0),
(3, 3, 'Xiaomi', 0),
(3, 4, 'HuaWei', 0),
(3, 5, 'Lenovo', 0),
(3, 6, 'Nokia', 0),
(4, 1, 'Tai Nghe', 0),
(4, 2, 'Sạc Dự Phòng', 0),
(4, 3, 'Sạc, Cáp', 0),
(4, 4, 'Loa BlueTooth', 0),
(4, 5, 'Ốp Lưng', 0),
(4, 6, 'Chuột, Bàn Phím', 0),
(4, 7, 'camera, WebCam', 0),
(4, 8, 'Usb', 0),
(5, 6, 'Đồng Hồ\r\n', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(255) NOT NULL,
  `parent_id` int(50) NOT NULL,
  `catalog_id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `sale` int(11) NOT NULL,
  `image_link` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `image_list` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `created` int(11) NOT NULL DEFAULT '0',
  `view` int(11) NOT NULL DEFAULT '0',
  `status` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `parent_id`, `catalog_id`, `name`, `price`, `content`, `sale`, `image_link`, `image_list`, `created`, `view`, `status`) VALUES
(2, 1, 1, 'Iphone 12 Pro Max', '28000000.0000', 'Chiếc điện thoại iPhone 12 Pro Max 256 GB là mẫu smartphone sở hữu nhiều tính năng nổi bật với hệ thống camera chất lượng, hiệu năng vượt trội hay hỗ trợ kết nối 5G hứa hẹn sẽ là mẫu sản phẩm mang lại cảm giác trải nghiệm tối ưu cho người dùng.', 0, 'iphone-12-pro-max-xam-new-600x600-1-600x600.jpg', '', 0, 0, 0),
(3, 1, 1, 'Iphone 13 Pro Max', '29000000.0000', 'Trong khi sức hút đến từ bộ 4 phiên bản iPhone 12 vẫn chưa nguội đi, thì Apple đã mang đến cho người dùng một siêu phẩm mới iPhone 13 - điện thoại có nhiều cải tiến thú vị sẽ mang lại những trải nghiệm hấp dẫn nhất cho người dùng.', 0, 'iphone-13-pro-max-xanh-lajpg.jpg', '', 0, 0, 0),
(4, 1, 1, 'Iphone 13 Pro', '20000000.0000', 'Mỗi lần ra mắt phiên bản mới là mỗi lần iPhone chiếm sóng trên khắp các mặt trận và lần này cái tên khiến vô số người \"sục sôi\" là iPhone 13 Pro, chiếc điện thoại thông minh vẫn giữ nguyên thiết kế cao cấp, cụm 3 camera được nâng cấp, cấu hình mạnh mẽ cùng thời lượng pin lớn ấn tượng. ', 0, 'iphone-13-pro-sierra-blue-600x600.jpg', '', 0, 0, 0),
(17, 1, 2, 'SamSung Galaxy S22 5G', '21990000.0000', 'Samsung Galaxy S22 ra mắt với diện mạo vô cùng tinh tế và trẻ trung, mang trong mình thiết kế phẳng theo xu hướng thịnh hành, màn hình 120 Hz mượt mà, cụm camera AI 50 MP và bộ xử lý đến từ Qualcomm.', 0, 'Galaxy-S22-Black-600x600.jpg', '', 0, 0, 0),
(18, 1, 2, 'SamSung Galaxy S22 Plus', '24000000.0000', 'Samsung Galaxy S22 ra mắt với diện mạo vô cùng tinh tế và trẻ trung, mang trong mình thiết kế phẳng theo xu hướng thịnh hành, màn hình 120 Hz mượt mà, cụm camera AI 50 MP và bộ xử lý đến từ Qualcomm.', 0, 'Galaxy-S22-Plus-White-600x600.jpg', '', 0, 0, 0),
(19, 1, 2, 'SamSung Galaxy S22 Ultra', '30000000.0000', 'Galaxy S22 Ultra 5G chiếc smartphone cao cấp nhất trong bộ 3 Galaxy S22 series mà Samsung đã cho ra mắt. Tích hợp bút S Pen hoàn hảo trong thân máy, trang bị vi xử lý mạnh mẽ cho các tác vụ sử dụng vô cùng mượt mà và nổi bật hơn với cụm camera không viền độc đáo mang đậm dấu ấn riêng.', 0, 'Galaxy-S22-Ultra-Burgundy.jpg', '', 0, 0, 0),
(20, 1, 2, 'SamSung Galaxy A03', '2890000.0000', 'Samsung Galaxy A03 là chiếc điện thoại Galaxy A đầu tiên của nhà Samsung trong năm 2022 tại thị trường Việt Nam. Đây là sản phẩm có mức giá dễ tiếp cận, có camera chính đến 48 MP, pin 5000 mAh thoải mái sử dụng cả ngày.', 0, 'samsung-galaxy-a03.jpg', '', 0, 0, 0),
(21, 1, 2, 'SamSung Galaxy a52s', '9000000.0000', 'Samsung đã chính thức giới thiệu chiếc điện thoại Galaxy A52s 5G đến người dùng, đây phiên bản nâng cấp của Galaxy A52 5G ra mắt cách đây không lâu, với ngoại hình không đổi nhưng được nâng cấp đáng kể về thông số cấu hình bên trong.', 0, 'samsung-galaxy-a52s-5g-mint-600x600.jpg', '', 0, 0, 0),
(22, 1, 3, 'Oppo find x5', '39999000.0000', 'Oppo find x5', 0, 'oppo-find-x5-pro-den-thumb-600x600.jpg', '', 0, 0, 0),
(23, 1, 3, 'Oppo Reno 7', '10000000.0000', 'OPPO đã trình làng mẫu Reno7 Z 5G với thiết kế OPPO Glow độc quyền, camera mang hiệu ứng như máy DSLR chuyên nghiệp cùng viền sáng kép, máy có một cấu hình mạnh mẽ và đạt chứng nhận xếp hạng A về độ mượt.', 0, 'oppo-reno7-z-5g.jpg', '', 0, 0, 0),
(24, 1, 2, 'SamSung Galaxy S21 Ultra', '30000000.0000', 'Sự đẳng cấp được Samsung gửi gắm thông qua chiếc smartphone Galaxy S21 Ultra 5G với hàng loạt sự nâng cấp và cải tiến không chỉ ngoại hình bên ngoài mà còn sức mạnh bên trong, hứa hẹn đáp ứng trọn vẹn nhu cầu ngày càng cao của người dùng.', 0, 'samsung-galaxy-s21-ultra-bac-600x600-1-600x600.jpg', '', 0, 0, 0),
(25, 1, 2, 'Samsung Galaxy Z Fold3', '39000000.0000', 'Galaxy Z Fold3 5G, chiếc điện thoại được nâng cấp toàn diện về nhiều mặt, đặc biệt đây là điện thoại màn hình gập đầu tiên trên thế giới có camera ẩn (08/2021). Sản phẩm sẽ là một “cú hit” của Samsung góp phần mang đến những trải nghiệm mới cho người dùng.', 0, 'samsung-galaxy-z-fold-3-silver-1-600x600.jpg', '', 0, 0, 0),
(26, 1, 6, 'Realme C35 64G', '4000000.0000', 'Realme C35 thuộc phân khúc giá rẻ được nhà Realme cho ra mắt với thiết kế trẻ trung, dung lượng pin lớn cùng camera hỗ trợ nhiều tính năng. Đây sẽ là thiết bị liên lạc, giải trí và làm việc ổn định,… cho các nhu cầu sử dụng của bạn.', 0, 'realme-c35-thumb.jpg', '', 0, 0, 3),
(27, 1, 4, 'Vivo Y15s', '3900000.0000', 'Vivo vừa mang một chiến binh mới đến phân khúc tầm trung giá rẻ có tên Vivo Y15s, một sản phẩm sở hữu khá nhiều ưu điểm như thiết kế đẹp, màn hình lớn, camera kép, pin cực trâu và còn rất nhiều điều thú vị khác đang chờ đón bạn.', 0, 'Vivo-y15s-2021-xanh-den-660x600.jpg', '', 0, 0, 0),
(28, 1, 5, 'Xiaomi 11T 5G', '8400000.0000', 'Xiaomi 11T đầy nổi bật với thiết kế vô cùng trẻ trung, màn hình AMOLED, bộ 3 camera sắc nét và viên pin lớn đây sẽ là mẫu smartphone của Xiaomi thỏa mãn mọi nhu cầu giải trí, làm việc và là niềm đam mê sáng tạo của bạn. ', 0, 'Xiaomi-11T-White.jpg', '', 0, 0, 3),
(29, 1, 5, 'Xiaomi Redmi Note 11 Pro', '7000000.0000', 'Xiaomi Redmi Note 11 Pro 4G mang trong mình khá nhiều những nâng cấp cực kì sáng giá. Là chiếc điện thoại có màn hình lớn, tần số quét 120 Hz, hiệu năng ổn định cùng một viên pin siêu trâu.', 0, 'xiaomi-redmi-note-11.jpg', '', 0, 0, 0),
(30, 1, 5, 'Xiaomi Redmi Note 11S 5G ', '6490000.0000', 'Tại sự kiện ra mắt sản phẩm mới diễn ra hôm 29/3, Xiaomi đã ra mắt Xiaomi Redmi Note 11S 5G toàn cầu. Thiết bị là một bản nâng cấp đáng giá so với Redmi Note 11S 4G, cùng xem máy có gì đặc biệt thôi nào.', 0, 'xiaomi-redmi-note-11s-5g.jpg', '', 0, 0, 0),
(31, 2, 3, 'MacBook Pro', '60000000.0000', 'Laptop Apple Air M1 2020 có thiết kế đẹp, sang trọng với CPU M1 độc quyền từ Apple cho hiệu năng đồ họa cao, màn hình Retina hiển thị siêu nét cùng với hệ thống bảo mật tối ưu.', 0, 'macbook-pro-2021.png', 'vi-vn-apple-macbook-air-m1-2020-z124000de-1.jpg,vi-vn-apple-macbook-air-m1-2020-z124000de-2.jpg,vi-vn-apple-macbook-air-m1-2020-z124000de-3.jpg,apple-macbook-air-m1-2020-z124000de-4-1-1-1020x570.jpeg', 0, 0, 1),
(32, 1, 8, 'ROG Phone 5', '20000000.0000', 'Mới, đầy đủ phụ kiện từ nhà sản xuất  Máy,</br><br> Sách hướng dẫn sử dụng, Cáp sạc USB-C, Củ sạc nhanh 65W, Cáp sạc, Ốp lưng <br><br> Bảo hành chính hãng 12 tháng tại trung tâm bảo hành ủy quyền, 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ NSX. ', 0, 'asus-rog-phone-5.png', 'asus-rog-phone-5.png,asus-rog-phone-5-4.jpg,_0006_rog-phone-5-6.jpg,asus-rog-phone-5_0000_3-rog-phone-5display-16153751648.jpg,rog_5_1.jpg', 0, 0, 1),
(33, 4, 4, 'Marshall Acton II', '5000000.0000', '', 0, 'Loa-Bluetooth-Marshall-Acton-II.png', '', 0, 0, 1),
(35, 4, 1, 'AirPods Pro', '60000000.0000', '', 3, 'AirPodsPro.png', '', 0, 0, 1),
(36, 4, 1, 'Tai Nghe Airpods 3', '5000000.0000', '', 4, 'bluetooth-airpods.png', '', 0, 0, 2),
(37, 4, 6, 'Chuột Gaming Asus có dây', '5000000.0000', '', 1, 'chuot-gaming-asus-tuf.png', '', 0, 0, 2),
(38, 1, 2, 'SamSung Galaxy S22 Utral 5G', '20000000.0000', '', 2, 'S22_utral.png', '', 0, 0, 2),
(39, 2, 7, 'LapTop Lenovo i5/16GB RAM', '12999999.0000', '', 0, 'lenovo-yoga-duet-7-13itl6-i5.png', '', 0, 0, 3),
(40, 1, 1, 'Iphone 13 pro Max 512GB', '31999999.0000', '', 0, 'iphone-13-pro-sierra-blue.png', '', 0, 0, 3),
(41, 1, 2, 'SamSung Galaxy z-fold 3 Silver', '50000000.0000', '', 0, 'samsung-galaxy-z-fold-3-silver-1-600x600.png', '', 0, 0, 3),
(42, 3, 1, 'SamSung Galaxy Tab s8', '10000000.0000', '', 0, 'Samsung-Galaxy-Tab-s8.png', '', 0, 0, 3),
(43, 4, 2, 'Sạc dự phòng Poplymer', '1000000.0000', '', 0, 'sac-du-phong-polymer.png', '', 0, 0, 3),
(44, 4, 4, 'Loa blueTooth sony srs', '2000000.0000', '', 0, 'loa-bluetooth-sony-srs-xb43-ava-600x600.png', '', 0, 0, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongso`
--

CREATE TABLE `thongso` (
  `id` int(11) NOT NULL,
  `man_hinh` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `cg_man_hinh` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `camera_truoc` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `camera_sau` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `chipset` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ram` text NOT NULL,
  `rom` text NOT NULL,
  `pin` text NOT NULL,
  `he_dieu_hanh` text NOT NULL,
  `cpu` text NOT NULL,
  `trong_luong` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `thongso`
--

INSERT INTO `thongso` (`id`, `man_hinh`, `cg_man_hinh`, `camera_truoc`, `camera_sau`, `chipset`, `ram`, `rom`, `pin`, `he_dieu_hanh`, `cpu`, `trong_luong`) VALUES
(31, '13.3\"Retina (2560 x 1600)', '400 nits <br>\r\n\r\nCông nghệ IPS <br>\r\n\r\nLED Backlit <br>\r\n\r\nTrue Tone Technology', '720p FaceTime Camera', 'Không', 'Apple M1', '\r\n16 GB', '256 GB SSD', '\r\nKhoảng 10 tiếng', '\r\nMac OS', 'Apple M1', '1.29 kg\r\n'),
(32, '6.78 inches', 'AMOLED\r\n', '24 MP, f/2.5, 27mm (wide), 0.9µm', 'Camera góc rộng: 64 MP, f/1.8, 26mm, 1/1.73\", 0.8µm, PDAF\r\nCamera góc siêu rộng: 13 MP, f/2.4, 11mm, 125˚\r\nCamera macro\" 5 MP, f/2.0', 'Snapdragon 888 (5 nm)', '16 GB', '256 GB', '6000 mAh', 'Android 11, ROG UI', '8 nhân ((1x2.84 GHz Kryo 680 & 3x2.42 GHz Kryo 680 & 4x1.80 GHz Kryo 680))', '238 g');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction`
--

CREATE TABLE `transaction` (
  `id` bigint(20) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `amount` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `payment` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payment_info` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `message` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `security` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Chỉ mục cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`id_cart_detail`);

--
-- Chỉ mục cho bảng `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`parent_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `product` ADD FULLTEXT KEY `name` (`name`);

--
-- Chỉ mục cho bảng `thongso`
--
ALTER TABLE `thongso`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `id_cart_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT cho bảng `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
