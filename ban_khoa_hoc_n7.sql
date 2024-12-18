-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 14, 2024 lúc 01:21 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ban_khoa_hoc_n7`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(100) NOT NULL,
  `email_admin` varchar(100) NOT NULL,
  `name_admin` varchar(100) NOT NULL,
  `password_admin` varchar(100) NOT NULL,
  `level` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id_admin`, `email_admin`, `name_admin`, `password_admin`, `level`) VALUES
(1, 'tin@gmail.com', 'tin', '698d51a19d8a121ce581499d7b701668', 2),
(3, 'admin@gmail.com', 'admin', '698d51a19d8a121ce581499d7b701668', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `courses`
--

CREATE TABLE `courses` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` int(100) NOT NULL,
  `number_lessons` int(100) NOT NULL,
  `context` varchar(1000) NOT NULL,
  `request` varchar(1000) NOT NULL,
  `number_student` int(100) NOT NULL,
  `duration_course` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `courses`
--

INSERT INTO `courses` (`id`, `name`, `image`, `price`, `number_lessons`, `context`, `request`, `number_student`, `duration_course`) VALUES
(1, 'PHP cơ bản', 'php.png', 200000, 6, 'PHP bản chất là một ngôn ngữ kịch bản (script) thường dùng để phát triển các ứng dụng Web, tuy vậy nó vẫn được sử dụng như một ngôn ngữ lập trình hoàn chỉnh. Đầu tiên PHP được tạo ra bởi Rasmus Lerdorf năm 1994, giờ nó được phát triển bởi PHP Group (gồm nhiều cá nhân và tổ chức - xem tại: credits php). PHP với nghĩa ban đầu là Personal Home Page (Trang chủ cá nhân), nhưng giờ nó mang nghĩa là Hypertext Preprocessor (Bộ tiền xử lý cho siêu văn bản).', 'Có kiến thức cơ bản về HTML JS CSS', 0, 0),
(2, 'CSS zero to hero', 'CSS.png', 999999, 1, 'CSS (Cascading Style Sheets) là ngôn ngữ biểu định kiểu, tức là định dạng và trang trí cho trang web như điều chỉnh màu sắc, font chữ, khoảng cách, bố cục, hiệu ứng hình ảnh,… CSS giúp trang web trở nên đẹp mắt và thu hút hơn với người dùng.\r\n\r\nTrong lập trình web, CSS có thể được chèn vào HTML theo 3 cách CSS nội tuyến (Inline CSS), CSS nội bộ (Internal CSS) và CSS bên ngoài (External CSS). Mỗi cách thêm CSS được thực hiện khác nhau nhưng đều đảm bảo thực hiện các vai trò: Định dạng và trình bày trang web, tăng khả năng truy cập của website.', 'Đam mê, chăm chỉ cày cuốc', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course_cart`
--

CREATE TABLE `course_cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `course_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course_videos`
--

CREATE TABLE `course_videos` (
  `id` int(100) NOT NULL,
  `course_id` int(100) NOT NULL,
  `video` varchar(500) NOT NULL,
  `title` varchar(500) NOT NULL,
  `duration` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `course_videos`
--

INSERT INTO `course_videos` (`id`, `course_id`, `video`, `title`, `duration`) VALUES
(71, 0, 'PHP in 100 Seconds.mp4', 'Các khái niệm', '2:21'),
(78, 2, 'css vai tro.mp4', 'Vai trò CSS', '5:43'),
(79, 1, 'B1.mp4', 'Bài 1. Cài đặt Xampp', '9:53'),
(80, 1, 'B2.mp4', 'Bài 2. Cú pháp PHP', '13:37'),
(81, 1, 'B3.mp4', 'Bài 3. Bình luận trong PHP', '5:46'),
(82, 1, 'B4.mp4', 'Bài 4. Chèn HTML vào PHP', '2:51'),
(83, 1, 'B5.mp4', 'Bài 5: Hằng trong PHP', '5:12'),
(84, 1, 'B6.mp4', 'Bài 6.  \' \'  và  \" \"', '3:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(23, 'tin', 'tin@gmail.com', '698d51a19d8a121ce581499d7b701668');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_course`
--

CREATE TABLE `user_course` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `course_id` int(100) NOT NULL,
  `payment_state` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_course`
--

INSERT INTO `user_course` (`id`, `user_id`, `course_id`, `payment_state`) VALUES
(18, 23, 1, 'Xong'),
(21, 23, 2, 'Xong');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `course_cart`
--
ALTER TABLE `course_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Chỉ mục cho bảng `course_videos`
--
ALTER TABLE `course_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_course`
--
ALTER TABLE `user_course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `course_id` (`course_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `course_cart`
--
ALTER TABLE `course_cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `course_videos`
--
ALTER TABLE `course_videos`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `user_course`
--
ALTER TABLE `user_course`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `course_cart`
--
ALTER TABLE `course_cart`
  ADD CONSTRAINT `course_cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_cart_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `course_videos`
--
ALTER TABLE `course_videos`
  ADD CONSTRAINT `course_videos_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `user_course`
--
ALTER TABLE `user_course`
  ADD CONSTRAINT `user_course_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_course_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
