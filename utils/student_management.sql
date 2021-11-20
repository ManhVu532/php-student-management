-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 20, 2021 lúc 07:28 AM
-- Phiên bản máy phục vụ: 8.0.26
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `student_management`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `register_subject`
--

CREATE TABLE `register_subject` (
  `userId` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `subjectSemesterId` int NOT NULL,
  `pointCC` float DEFAULT NULL,
  `pointKT` float DEFAULT NULL,
  `pointTH` float DEFAULT NULL,
  `pointBT` float DEFAULT NULL,
  `pointExam` float DEFAULT NULL,
  `createAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `register_subject`
--

INSERT INTO `register_subject` (`userId`, `subjectSemesterId`, `pointCC`, `pointKT`, `pointTH`, `pointBT`, `pointExam`, `createAt`, `updateAt`) VALUES
('B18DCKT002', 3, 9, 8, 7.5, 8.5, 9.5, '2021-11-18 06:58:16', NULL),
('B18DCKT022', 6, NULL, NULL, NULL, NULL, NULL, '2021-11-18 11:19:19', NULL),
('B18DCKT030', 6, NULL, NULL, NULL, NULL, NULL, '2021-11-18 11:09:44', NULL),
('B18DCKT038', 16, NULL, NULL, NULL, NULL, NULL, '2021-11-19 10:04:09', NULL),
('B18DCMR177', 9, NULL, NULL, NULL, NULL, NULL, '2021-11-19 07:43:36', NULL),
('B18DCMR177', 16, 7, 5, 5, 6, 7, '2021-11-19 10:02:58', NULL),
('B18DCPT000', 10, NULL, NULL, NULL, NULL, NULL, '2021-11-19 10:43:40', NULL),
('B18DCPT000', 11, NULL, NULL, NULL, NULL, NULL, '2021-11-19 10:43:26', NULL),
('B18DCPT000', 12, 10, 8, 8, 8, 7.5, '2021-11-19 10:16:31', NULL),
('B18DCPT000', 13, NULL, NULL, NULL, NULL, NULL, '2021-11-19 10:43:09', NULL),
('B18DCPT000', 15, 8, 8.5, 7, 9, 8, '2021-11-19 10:15:57', NULL),
('B18DCPT000', 16, 10, 8, 8, 9, 10, '2021-11-19 10:03:21', NULL),
('B18DCPT020', 16, NULL, NULL, NULL, NULL, NULL, '2021-11-19 10:05:46', NULL),
('B18DCPT030', 16, NULL, NULL, NULL, NULL, NULL, '2021-11-19 10:03:39', NULL),
('B18DCPT035', 16, NULL, NULL, NULL, NULL, NULL, '2021-11-19 10:03:56', NULL),
('B18DCPT045', 16, NULL, NULL, NULL, NULL, NULL, '2021-11-19 10:04:35', NULL),
('B18DCPT050', 16, NULL, NULL, NULL, NULL, NULL, '2021-11-19 10:04:46', NULL),
('B18DCPT055', 16, 9, 7, 6, 8, 9, '2021-11-19 10:06:53', NULL),
('B18DCPT070', 16, NULL, NULL, NULL, NULL, NULL, '2021-11-19 10:05:01', NULL),
('B18DCPT090', 16, 10, 9, 8, 8, 9, '2021-11-19 10:06:12', NULL),
('B18DCPT095', 1, 7, 9, 9, 8, 7.5, '2021-11-15 14:16:43', NULL),
('B18DCPT095', 16, 10, 6, 7, 7, 9, '2021-11-19 10:05:29', NULL),
('B18DCPT110', 16, 10, 8.5, 10, 10, 9, '2021-11-19 10:07:08', NULL),
('B18DCPT155', 1, NULL, NULL, NULL, NULL, NULL, '2021-11-15 14:51:07', NULL),
('B18DCPT155', 3, 8, 8, 8, 8, 8, '2021-11-18 06:45:05', NULL),
('B18DCPT155', 16, 10, 8, 8, 10, 8, '2021-11-19 10:05:11', NULL),
('B18DCPT190', 16, 10, 9, 9, 9, 8.5, '2021-11-19 10:07:20', NULL),
('B18DCPT205', 16, 9, 8, 9, 7, 8, '2021-11-19 10:05:58', NULL),
('B18DCPT230', 16, 10, 8, 7, 7.5, 7.8, '2021-11-19 10:07:48', NULL),
('B18DCPT235', 16, 9, 8, 7.5, 8, 8, '2021-11-19 10:07:35', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `semester_tbl`
--

CREATE TABLE `semester_tbl` (
  `id` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `type` tinyint NOT NULL,
  `startYear` int NOT NULL,
  `endYear` int NOT NULL,
  `fee` int NOT NULL DEFAULT '0',
  `createAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `semester_tbl`
--

INSERT INTO `semester_tbl` (`id`, `type`, `startYear`, `endYear`, `fee`, `createAt`, `updateAt`) VALUES
('HK-1-2018', 1, 2018, 2019, 420000, '2021-11-13 16:49:55', NULL),
('HK-1-2020', 1, 2020, 2021, 480000, '2021-11-15 14:13:27', NULL),
('HK-2-2018', 2, 2018, 2019, 420000, '2021-11-13 16:49:55', NULL),
('HK-3-2018', 3, 2018, 2019, 420000, '2021-11-13 16:49:55', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subject_semester`
--

CREATE TABLE `subject_semester` (
  `id` int NOT NULL,
  `semesterId` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `subjectId` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `lecturer` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `numberOfSlots` int NOT NULL,
  `room` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `dayOfWeek` tinyint NOT NULL,
  `startAt` tinyint NOT NULL,
  `endAt` tinyint NOT NULL,
  `examType` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `roomExam` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `examAt` timestamp NULL DEFAULT NULL,
  `totalTime` int DEFAULT NULL,
  `createAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `subject_semester`
--

INSERT INTO `subject_semester` (`id`, `semesterId`, `subjectId`, `lecturer`, `numberOfSlots`, `room`, `dayOfWeek`, `startAt`, `endAt`, `examType`, `roomExam`, `examAt`, `totalTime`, `createAt`, `updateAt`) VALUES
(1, 'HK-1-2020', 'INT1434', 'N.Q.Hưng', 10, '303-A2', 5, 9, 10, 'Vấn đáp', '403-A2', '2021-12-10 00:00:00', 90, '2021-11-15 14:15:23', NULL),
(3, 'HK-1-2020', 'MUL1446', 'Đ.T.Liên', 12, '406-A3', 3, 7, 10, 'Viết', '1231', '2021-11-20 00:30:00', 120, '2021-11-17 17:12:44', NULL),
(6, 'HK-1-2020', 'MUL1446', 'Đ.T.Liên', 12, '406-A2', 2, 1, 4, 'Vấn đáp', '102-A2', '2021-12-12 01:30:00', 120, '2021-11-18 07:54:49', NULL),
(8, 'HK-1-2020', 'INT1340', 'H.H.Hạnh', 15, '505-A2', 5, 1, 2, 'Viết', '306-A2', '2021-12-10 09:30:00', 60, '2021-11-19 06:30:25', NULL),
(9, 'HK-1-2020', 'INT13110', 'V.T.T.Anh', 12, '603-A2', 2, 7, 8, 'BTL + Vấn đáp', '605-A2', '2021-12-20 00:30:00', 120, '2021-11-19 06:54:34', NULL),
(10, 'HK-1-2018', 'INT1313', 'N.Đ.Hóa', 12, '102-A2', 2, 1, 2, 'Viết', '203-A3', '2021-12-10 06:30:00', 120, '2021-11-19 06:56:27', NULL),
(11, 'HK-1-2018', 'INT13111', 'N.T.T.Tâm', 12, '202-A2', 2, 3, 4, NULL, NULL, NULL, NULL, '2021-11-19 06:57:14', NULL),
(12, 'HK-1-2018', 'MUL14126', 'P.V.Sự', 16, '505-A2', 3, 7, 8, NULL, NULL, NULL, NULL, '2021-11-19 06:57:59', NULL),
(13, 'HK-1-2018', 'CDT1238', 'H.T.H.Ngân', 16, '306-A2', 4, 1, 2, NULL, NULL, NULL, NULL, '2021-11-19 06:58:55', NULL),
(14, 'HK-2-2018', 'INT1155', 'Đ.N.Hùng', 12, '104-A2', 5, 7, 8, NULL, NULL, NULL, NULL, '2021-11-19 06:59:42', NULL),
(15, 'HK-2-2018', 'INT1155', 'P.V.Sự', 12, '102-A2', 5, 7, 8, NULL, NULL, NULL, NULL, '2021-11-19 07:00:12', NULL),
(16, 'HK-2-2018', 'CDT1320', 'H.T.H.Ngân', 18, '506-A3', 6, 1, 4, NULL, NULL, NULL, NULL, '2021-11-19 07:01:09', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subject_tbl`
--

CREATE TABLE `subject_tbl` (
  `id` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `numberOfCredits` tinyint NOT NULL,
  `numberOfLessons` int NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `createAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `subject_tbl`
--

INSERT INTO `subject_tbl` (`id`, `name`, `numberOfCredits`, `numberOfLessons`, `isActive`, `createAt`, `updateAt`) VALUES
('BAS1102', 'Đường lối cách mạng của Đảng cộng sản Việt Nam', 3, 135, 1, '2021-11-13 14:39:36', NULL),
('BAS1106', 'Giáo dục thể chất 1', 2, 90, 1, '2021-11-13 14:39:36', NULL),
('BAS1107', 'Giáo dục thể chất 2', 2, 90, 1, '2021-11-13 14:39:36', NULL),
('BAS1111', 'Những nguyên lý cơ bản của Chủ nghĩa Mác Lênin 1', 2, 90, 1, '2021-11-13 14:39:36', NULL),
('BAS1112', 'Những nguyên lý cơ bản của Chủ nghĩa Mác Lênin 2', 3, 135, 1, '2021-11-13 14:39:36', NULL),
('BAS1122', 'Tư tưởng Hồ Chí Minh', 2, 90, 1, '2021-11-13 14:39:36', NULL),
('BAS1141', 'Tiếng anh A11', 3, 135, 1, '2021-11-13 14:39:36', NULL),
('BAS1142', 'Tiếng anh A12', 4, 180, 1, '2021-11-13 14:39:36', NULL),
('BAS1143', 'Tiếng anh A21', 3, 135, 1, '2021-11-13 14:39:36', NULL),
('BAS1144', 'Tiếng anh A22', 4, 180, 1, '2021-11-13 14:39:36', NULL),
('BAS1145', 'Tiếng anh B11', 3, 135, 1, '2021-11-13 14:39:36', NULL),
('BAS1146', 'Tiếng anh B12', 4, 180, 1, '2021-11-13 14:39:37', NULL),
('BAS1219', 'Toán cao cấp 1', 2, 90, 1, '2021-11-13 14:29:44', NULL),
('BAS1220', 'Toán cao cấp 2', 2, 90, 1, '2021-11-13 14:39:36', NULL),
('BAS1226', 'Xác suất thống kê', 2, 90, 1, '2021-11-13 14:39:36', NULL),
('CDT1238', 'Cơ sở tạo hình', 3, 135, 1, '2021-11-13 14:39:36', NULL),
('CDT1320', 'Nhập môn đa phương tiện', 2, 90, 1, '2021-11-13 14:39:36', NULL),
('INT1154', 'Tin học cơ sở 1', 2, 90, 1, '2021-11-13 14:29:44', NULL),
('INT1155', 'Tin học cơ sở 2', 2, 90, 1, '2021-11-13 14:39:36', NULL),
('INT1306', 'Cấu trúc dữ liệu và giải thuật', 3, 135, 1, '2021-11-13 14:39:37', NULL),
('INT13108', 'Ngôn ngữ lập trình Java', 3, 135, 1, '2021-11-13 14:39:36', NULL),
('INT13109', 'Lập trình hướng đối tượng với C++', 3, 135, 1, '2021-11-13 14:39:37', NULL),
('INT13110', 'Lập trình mạng với C++', 3, 135, 1, '2021-11-13 14:39:37', NULL),
('INT13111', 'Kỹ thuật đồ họa', 3, 135, 1, '2021-11-13 14:39:37', NULL),
('INT1313', 'Cơ sở dữ liệu', 3, 135, 1, '2021-11-13 14:39:37', NULL),
('INT1325', 'Kiến trúc máy tính và hệ điều hành', 2, 90, 1, '2021-11-13 14:39:36', NULL),
('INT1340', 'Nhập môn công nghệ phần mềm', 3, 135, 1, '2021-11-13 14:39:37', NULL),
('INT1358', 'Toán rời rạc 1', 3, 135, 1, '2021-11-13 14:39:36', NULL),
('INT1434', 'Lập trình Web', 3, 135, 1, '2021-11-13 14:39:37', NULL),
('INT14344', 'Thử Nghiệm Hạt Nhân', 2, 155, 1, '2021-11-17 11:20:31', NULL),
('MUL1218', 'Mỹ thuật cơ bản', 2, 90, 1, '2021-11-13 14:39:36', NULL),
('MUL1307', 'Xử lý và truyền thông đa phương tiện', 2, 90, 1, '2021-11-13 14:39:36', NULL),
('MUL13121', 'Thiết kế đồ họa', 2, 90, 1, '2021-11-13 14:39:36', NULL),
('MUL13122', 'Kỹ thuật nhiếp ảnh', 2, 90, 1, '2021-11-13 14:39:36', NULL),
('MUL13124', 'Dựng audio và video phi tuyến', 3, 135, 1, '2021-11-13 14:39:36', NULL),
('MUL1314', 'Kỹ thuật quay phim', 3, 135, 1, '2021-11-13 14:39:36', NULL),
('MUL14125', 'Xử lý ảnh và video', 3, 135, 1, '2021-11-13 14:39:37', NULL),
('MUL14126', 'Lập trình âm thanh', 2, 90, 1, '2021-11-13 14:39:37', NULL),
('MUL14129', 'Phát triển ứng dụng thực tại ảo', 3, 135, 1, '2021-11-13 14:39:37', NULL),
('MUL1415', 'Kỹ xảo đa phương tiện', 2, 90, 1, '2021-11-13 14:39:37', NULL),
('MUL1422', 'Tổ chức sản xuất sản phẩm đa phương tiện', 2, 90, 1, '2021-11-13 14:39:37', NULL),
('MUL1423', 'Kịch bản đa phương tiện', 2, 90, 1, '2021-11-13 14:39:37', NULL),
('MUL1425', 'Thiết kế tương tác đa phương tiện', 2, 90, 1, '2021-11-13 14:39:36', NULL),
('MUL1429', 'Thiết kế web cơ bản', 2, 90, 1, '2021-11-13 14:39:37', NULL),
('MUL1446', 'Lập trình game cơ bản', 3, 135, 1, '2021-11-13 14:39:37', NULL),
('MUL1448', 'Lập trình ứng dụng trên đầu cuối di động', 3, 135, 1, '2021-11-13 14:39:37', NULL),
('MUL1451', 'Chuyên đề', 1, 45, 1, '2021-11-13 14:39:37', NULL),
('MUL1454', 'Thiết kế đồ họa 3D', 3, 135, 1, '2021-11-13 14:39:37', NULL),
('SKD1101', 'Kỹ năng thuyết trình', 1, 45, 1, '2021-11-13 14:39:36', NULL),
('SKD1102', 'Kỹ năng làm việc nhóm', 1, 45, 1, '2021-11-13 14:39:36', NULL),
('SKD1103', 'Kỹ năng tạo lập Văn bản', 1, 45, 1, '2021-11-13 14:39:37', NULL),
('SKD1108', 'Phương pháp luận nghiên cứu khoa học', 2, 90, 1, '2021-11-13 14:39:37', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_semester`
--

CREATE TABLE `user_semester` (
  `semesterId` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `userId` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `amountPaid` int DEFAULT NULL,
  `createAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_semester`
--

INSERT INTO `user_semester` (`semesterId`, `userId`, `amountPaid`, `createAt`, `updateAt`) VALUES
('HK-2-2018', 'B18DCPT000', 1680000, '2021-11-20 06:23:58', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_tbl`
--

CREATE TABLE `user_tbl` (
  `id` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `gender` varchar(12) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `classId` varchar(20) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'unknow',
  `address` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phoneNumber` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dob` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK',
  `type` tinyint NOT NULL DEFAULT '0',
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `createAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NULL DEFAULT NULL,
  `avatar` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `verifyCode` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `expriedAt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `firstName`, `lastName`, `gender`, `classId`, `address`, `email`, `phoneNumber`, `dob`, `password`, `type`, `isActive`, `createAt`, `updateAt`, `avatar`, `verifyCode`, `expriedAt`) VALUES
('admin', 'admin', 'admin', NULL, 'unknow', NULL, 'vuvanmanhttvtvp@gmail.com', '0962068684', NULL, '$2y$10$DrEhMYaj0kOq6q9t..Urhu3fQsBf95hhqJOBdR.HnAFKf08k6yDc2', 1, 1, '2021-11-10 07:26:33', '2021-11-19 08:35:37', 'uploads/619761d53544b5.91214900.gif', '37071930', '2021-11-11 00:08:21'),
('B18DCAT002', 'AN', 'NGUYỄN TRỌNG ', 'Nam', 'D18CQAT02-B', 'Yên Bái', NULL, NULL, '2000-06-11 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:27:39', NULL, NULL, NULL, NULL),
('B18DCAT003', 'ANH', 'BÙI TUẤN ', 'Nam', 'D18CQAT03-B', 'Nam Định', NULL, NULL, '2000-05-23 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:27:40', NULL, NULL, NULL, NULL),
('B18DCAT005', 'ANH', 'LƯU HÙNG ', 'Nam', 'D18CQAT01-B', 'Lạng Sơn', NULL, NULL, '1999-04-28 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:27:38', NULL, NULL, NULL, NULL),
('B18DCAT006', 'ANH', 'NGUYỄN HOÀNG ', 'Nam', 'D18CQAT02-B', 'Hà Nội', NULL, NULL, '2000-04-19 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:27:39', NULL, NULL, NULL, NULL),
('B18DCAT007', 'ANH', 'NGUYỄN NGỌC ', 'Nữ', 'D18CQAT03-B', 'Bắc Giang', NULL, NULL, '2000-05-24 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:27:40', NULL, NULL, NULL, NULL),
('B18DCAT013', 'ANH', 'TRẦN THỊ MAI ', 'Nữ', 'D18CQAT01-B', 'Nam Định', NULL, NULL, '2000-02-26 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:27:38', NULL, NULL, NULL, NULL),
('B18DCAT014', 'ANH', 'TRỊNH THẾ ', 'Nam', 'D18CQAT02-B', 'Thanh Hoá', NULL, NULL, '2000-02-29 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:27:39', NULL, NULL, NULL, NULL),
('B18DCAT015', 'ANH', 'VŨ TUẤN ', 'Nam', 'D18CQAT03-B', 'Thái Bình', NULL, NULL, '2000-05-03 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:27:40', NULL, NULL, NULL, NULL),
('B18DCAT016', 'BÁCH', 'TRẦN QUANG ', 'Nam', 'D18CQAT04-B', 'Thái Bình', NULL, NULL, '2000-12-07 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:27:42', NULL, NULL, NULL, NULL),
('B18DCAT018', 'BÌNH', 'NGÔ ĐỨC ', 'Nam', 'D18CQAT02-B', 'Hà Nội', NULL, NULL, '2000-10-16 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:27:39', NULL, NULL, NULL, NULL),
('B18DCAT019', 'BÌNH', 'NGUYỄN ĐỨC ', 'Nam', 'D18CQAT03-B', 'Hà Nội', NULL, NULL, '2000-03-13 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:27:41', NULL, NULL, NULL, NULL),
('B18DCAT022', 'BÍNH', 'ĐỖ THIỆN ', 'Nam', 'D18CQAT02-B', 'Bắc Ninh', NULL, NULL, '2000-11-02 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:27:39', NULL, NULL, NULL, NULL),
('B18DCAT023', 'CÔNG', 'ĐOÀN VĂN ', 'Nam', 'D18CQAT03-B', 'Hà Nội', NULL, NULL, '2000-04-06 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:27:41', NULL, NULL, NULL, NULL),
('B18DCAT024', 'CƯỜNG', 'NGUYỄN ĐÌNH ', 'Nam', 'D18CQAT04-B', 'Thanh Hoá', NULL, NULL, '1997-04-26 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:27:42', NULL, NULL, NULL, NULL),
('B18DCAT025', 'CƯỜNG', 'VŨ NGỌC ', 'Nam', 'D18CQAT01-B', 'Hà Nội', NULL, NULL, '2000-06-28 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:27:39', NULL, NULL, NULL, NULL),
('B18DCAT026', 'CHIẾN', 'NGUYỄN XU N ', 'Nam', 'D18CQAT02-B', 'Thái Bình', NULL, NULL, '2000-03-13 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:27:40', NULL, NULL, NULL, NULL),
('B18DCAT028', 'CHÍNH', 'NGUYỄN CHUNG ', 'Nam', 'D18CQAT04-B', 'Thái Bình', NULL, NULL, '2000-03-10 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:27:42', NULL, NULL, NULL, NULL),
('B18DCAT029', 'CHUNG', 'DƯƠNG VĂN ', 'Nam', 'D18CQAT01-B', 'Nam Định', NULL, NULL, '2000-01-22 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:27:39', NULL, NULL, NULL, NULL),
('B18DCCN002', 'AN', 'NGUYỄN ĐÌNH ', 'Nam', 'D18CQCN02-B', 'Bắc Giang', NULL, NULL, '2000-11-25 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN013', 'ANH', 'KIỀU QUỐC ', 'Nam', 'D18CQCN02-B', 'Hà Nội', NULL, NULL, '2000-03-11 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN024', 'ANH', 'NGUYỄN QUỐC ', 'Nam', 'D18CQCN02-B', 'Hà Nội', NULL, NULL, '1999-11-02 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN035', 'ANH', 'PHÙNG NGỌC TUẤN ', 'Nam', 'D18CQCN02-B', 'Hà Nội', NULL, NULL, '2000-01-21 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN046', 'ÁNH', 'HOÀNG DUY ', 'Nam', 'D18CQCN02-B', 'Hà Nội', NULL, NULL, '2000-09-27 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN057', 'CÔNG', 'ĐÀO QUANG ', 'Nam', 'D18CQCN02-B', 'Hà Nội', NULL, NULL, '2000-02-12 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN068', 'CƯỜNG', 'NGUYỄN ĐÌNH ', 'Nam', 'D18CQCN02-B', 'Hà Nội', NULL, NULL, '2000-09-14 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN079', 'CHIẾN', 'NGUYỄN VĂN ', 'Nam', 'D18CQCN02-B', 'Vĩnh Phúc', NULL, NULL, '2000-05-14 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN090', 'CHUNG', 'QUẢN VĂN ', 'Nam', 'D18CQCN02-B', 'Hà Nội', NULL, NULL, '2000-12-27 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN101', 'DŨNG', 'NGUYỄN THẾ ', 'Nam', 'D18CQCN02-B', 'Đà Nẵng', NULL, NULL, '2000-08-11 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN112', 'DUY', 'PHẠM ĐÌNH ', 'Nam', 'D18CQCN02-B', 'Thái Bình', NULL, NULL, '1999-12-31 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN123', 'DƯƠNG', 'PHẠM THỊ THUỲ ', 'Nữ', 'D18CQCN02-B', 'Hà Nội', NULL, NULL, '2000-10-21 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN134', 'ĐẠT', 'ĐÀO VĂN ', 'Nam', 'D18CQCN02-B', 'Hải Dương', NULL, NULL, '2000-11-08 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN145', 'ĐẠT', 'TRẦN TẤN ', 'Nam', 'D18CQCN02-B', 'Thái Bình', NULL, NULL, '2000-01-01 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN156', 'ĐOÀN', 'HOÀNG KHẮC ', 'Nam', 'D18CQCN02-B', 'Hà Nội', NULL, NULL, '2000-08-21 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN167', 'ĐỨC', 'HOÀNG MINH ', 'Nam', 'D18CQCN02-B', 'Hà Nội', NULL, NULL, '2000-10-27 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN178', 'ĐỨC', 'NGUYỄN VĂN ', 'Nam', 'D18CQCN02-B', 'Hà Tĩnh', NULL, NULL, '2000-01-09 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN189', 'HÀ', 'ĐỖ THỊ THU ', 'Nữ', 'D18CQCN02-B', 'Hà Nội', NULL, NULL, '2000-03-31 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN200', 'HẢI', 'TÔ VĂN ', 'Nam', 'D18CQCN02-B', 'Thái Bình', NULL, NULL, '2000-11-02 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN211', 'HIỆP', 'NGUYỄN TUẤN ', 'Nam', 'D18CQCN02-B', 'Phú Thọ', NULL, NULL, '2000-11-27 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN222', 'HIẾU', 'NGUYỄN VĂN ', 'Nam', 'D18CQCN02-B', 'Hà Nội', NULL, NULL, '2000-08-31 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN233', 'HÒA', 'NGUYỄN MINH ', 'Nữ', 'D18CQCN02-B', 'Nam Định', NULL, NULL, '2000-02-15 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN244', 'HOÀNG', 'NGUYỄN VIẾT MINH ', 'Nam', 'D18CQCN02-B', 'Thái Nguyên', NULL, NULL, '2000-12-10 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN255', 'HÙNG', 'NGUYỄN MINH ', 'Nam', 'D18CQCN02-B', 'Thanh Hoá', NULL, NULL, '2000-06-27 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN266', 'HUY', 'LÊ TRẦN QUANG ', 'Nam', 'D18CQCN02-B', 'Phú Thọ', NULL, NULL, '2000-06-24 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN277', 'HUYỀN', 'PHẠM THỊ THU ', 'Nữ', 'D18CQCN02-B', 'Hải Dương', NULL, NULL, '2000-09-14 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN288', 'HƯNG', 'PHẠM THÀNH ', 'Nam', 'D18CQCN02-B', 'Hà Nội', NULL, NULL, '2000-12-18 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN299', 'KHẢI', 'TRẦN THANH ', 'Nam', 'D18CQCN02-B', 'Hà Nam', NULL, NULL, '2000-07-06 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN310', 'KHÁNH', 'NGUYỄN DUY ', 'Nam', 'D18CQCN02-B', 'Nam Định', NULL, NULL, '2000-11-13 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN321', 'LAN', 'NINH THỊ ', 'Nữ', 'D18CQCN02-B', 'Ninh Bình', NULL, NULL, '2000-05-31 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN332', 'LINH', 'PHẠM THỊ DIỆU ', 'Nữ', 'D18CQCN02-B', 'Nam Định', NULL, NULL, '2000-11-22 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN343', 'LONG', 'ĐỖ VIỆT ', 'Nam', 'D18CQCN02-B', 'Nam Định', NULL, NULL, '2000-08-06 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN354', 'LONG', 'NGUYỄN NGỌC THÀNH ', 'Nam', 'D18CQCN02-B', 'Nghệ An', NULL, NULL, '2000-05-19 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN365', 'LONG', 'TRƯƠNG QUANG ', 'Nam', 'D18CQCN02-B', 'Nam Định', NULL, NULL, '2000-02-26 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN376', 'LỘC', 'NGUYỄN XU N ', 'Nam', 'D18CQCN02-B', 'Hà Nội', NULL, NULL, '2000-08-23 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN387', 'MAI', 'BÙI PHƯƠNG NGỌC ', 'Nữ', 'D18CQCN02-B', 'Hà Nội', NULL, NULL, '2000-12-16 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN398', 'MINH', 'BÙI QUANG ', 'Nam', 'D18CQCN02-B', 'Hải Phòng', NULL, NULL, '2000-08-25 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN409', 'MINH', 'PHẠM NGỌC ', 'Nam', 'D18CQCN02-B', 'Thanh Hoá', NULL, NULL, '2000-01-25 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN420', 'NAM', 'ĐỖ BÙI THÀNH ', 'Nam', 'D18CQCN02-B', 'Nam Định', NULL, NULL, '2000-10-08 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN431', 'NAM', 'NGUYỄN VĂN ', 'Nam', 'D18CQCN02-B', 'Hải Dương', NULL, NULL, '2000-04-22 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:54', NULL, NULL, NULL, NULL),
('B18DCCN442', 'NGA', 'TRƯƠNG THỊ THUÝ ', 'Nữ', 'D18CQCN02-B', 'Ninh Bình', NULL, NULL, '2000-08-19 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:55', NULL, NULL, NULL, NULL),
('B18DCCN453', 'NGHIỆP', 'QUÁCH THÀNH ', 'Nam', 'D18CQCN02-B', 'Ninh Bình', NULL, NULL, '2000-02-04 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:55', NULL, NULL, NULL, NULL),
('B18DCCN464', 'NHUNG', 'TRẦN THỊ THÙY ', 'Nữ', 'D18CQCN02-B', 'Hưng Yên', NULL, NULL, '2000-08-25 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:55', NULL, NULL, NULL, NULL),
('B18DCCN475', 'PHÚC', 'VŨ TIẾN ', 'Nam', 'D18CQCN02-B', 'Thái Bình', NULL, NULL, '2000-11-04 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:55', NULL, NULL, NULL, NULL),
('B18DCCN486', 'QUANG', 'VŨ MẠNH ', 'Nam', 'D18CQCN02-B', 'Thanh Hoá', NULL, NULL, '2000-12-03 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:55', NULL, NULL, NULL, NULL),
('B18DCCN497', 'QUỐC', 'ĐÀO THẾ ', 'Nam', 'D18CQCN02-B', 'Hà Tĩnh', NULL, NULL, '1999-04-15 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:55', NULL, NULL, NULL, NULL),
('B18DCCN508', 'SANG', 'NGUYỄN VĂN ', 'Nam', 'D18CQCN02-B', 'Hưng Yên', NULL, NULL, '1997-04-15 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:55', NULL, NULL, NULL, NULL),
('B18DCCN519', 'SƠN', 'PHẠM ĐÌNH ', 'Nam', 'D18CQCN02-B', 'Thái Bình', NULL, NULL, '2000-07-05 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:55', NULL, NULL, NULL, NULL),
('B18DCCN530', 'TIẾN', 'ĐỖ VĂN ', 'Nam', 'D18CQCN02-B', 'Hà Nội', NULL, NULL, '2000-11-22 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:55', NULL, NULL, NULL, NULL),
('B18DCCN541', 'TOÀN', 'NGUYỄN MẠNH ', 'Nam', 'D18CQCN02-B', 'Hà Nội', NULL, NULL, '2000-03-14 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:55', NULL, NULL, NULL, NULL),
('B18DCCN552', 'TÚ', 'TRẦN ANH ', 'Nam', 'D18CQCN02-B', 'Hà Nội', NULL, NULL, '2000-08-08 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:55', NULL, NULL, NULL, NULL),
('B18DCCN563', 'TUẤN', 'NGUYỄN ANH ', 'Nam', 'D18CQCN02-B', 'Nam Định', NULL, NULL, '2000-10-07 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:55', NULL, NULL, NULL, NULL),
('B18DCCN574', 'TÙNG', 'ĐÀO QUANG ', 'Nam', 'D18CQCN02-B', 'Hải Phòng', NULL, NULL, '2000-01-31 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:55', NULL, NULL, NULL, NULL),
('B18DCCN585', 'TÙNG', 'NGUYỄN THẾ ', 'Nam', 'D18CQCN02-B', 'Hải Dương', NULL, NULL, '2000-07-25 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:55', NULL, NULL, NULL, NULL),
('B18DCCN596', 'THÁI', 'NGUYỄN HỒNG ', 'Nam', 'D18CQCN02-B', 'Hà Nội', NULL, NULL, '2000-10-24 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:55', NULL, NULL, NULL, NULL),
('B18DCCN607', 'THANH', 'PHẠM VĂN ', 'Nam', 'D18CQCN02-B', 'Nam Định', NULL, NULL, '2000-11-27 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:55', NULL, NULL, NULL, NULL),
('B18DCCN618', 'THÀNH', 'NGUYỄN TRUNG ', 'Nam', 'D18CQCN02-B', 'Hải Dương', NULL, NULL, '2000-04-17 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:55', NULL, NULL, NULL, NULL),
('B18DCCN629', 'THẮNG', 'NGUYỄN TIẾN ', 'Nam', 'D18CQCN02-B', 'Hà Nội', NULL, NULL, '2000-03-27 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:55', NULL, NULL, NULL, NULL),
('B18DCCN640', 'THÌN', 'ĐINH VĂN ', 'Nam', 'D18CQCN02-B', 'Nam Định', NULL, NULL, '2000-05-03 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:55', NULL, NULL, NULL, NULL),
('B18DCCN651', 'THỦY', 'NGUYỄN THỊ ', 'Nữ', 'D18CQCN02-B', 'Thanh Hoá', NULL, NULL, '1998-10-15 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:55', NULL, NULL, NULL, NULL),
('B18DCCN662', 'TRANG', 'NGUYỄN THU ', 'Nữ', 'D18CQCN02-B', 'Hà Nội', NULL, NULL, '2000-02-20 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:55', NULL, NULL, NULL, NULL),
('B18DCCN673', 'TRUNG', 'QUẢN THÀNH ', 'Nam', 'D18CQCN02-B', 'Hà Nội', NULL, NULL, '2000-01-23 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:55', NULL, NULL, NULL, NULL),
('B18DCCN684', 'VĂN', 'LÊ SỸ ', 'Nam', 'D18CQCN02-B', 'Thanh Hoá', NULL, NULL, '2000-08-29 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:55', NULL, NULL, NULL, NULL),
('B18DCCN695', 'VŨ', 'HOÀNG PHI ', 'Nam', 'D18CQCN02-B', 'Hà Nội', NULL, NULL, '2000-08-17 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:48:55', NULL, NULL, NULL, NULL),
('B18DCDT005', 'ANH', 'NGUYỄN ĐỨC ', 'Nam', 'D18CQDT01-B', 'Nam Định', NULL, NULL, '2000-08-05 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:49:45', NULL, NULL, NULL, NULL),
('B18DCDT009', 'ANH', 'NGUYỄN NAM ', 'Nam', 'D18CQDT01-B', 'Hà Nội', NULL, NULL, '2000-06-30 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:49:45', NULL, NULL, NULL, NULL),
('B18DCDT013', 'ANH', 'PHẠM VIỆT ', 'Nam', 'D18CQDT01-B', 'Hải Dương', NULL, NULL, '2000-07-24 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:49:45', NULL, NULL, NULL, NULL),
('B18DCDT017', 'BA', 'TRẦN VŨ PHONG ', 'Nam', 'D18CQDT01-B', 'Nam Định', NULL, NULL, '2000-10-10 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:49:45', NULL, NULL, NULL, NULL),
('B18DCDT021', 'CÔNG', 'BÙI VĂN ', 'Nam', 'D18CQDT01-B', 'Nam Định', NULL, NULL, '2000-05-19 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:49:45', NULL, NULL, NULL, NULL),
('B18DCDT025', 'CHUNG', 'NGUYỄN ĐẮC ', 'Nam', 'D18CQDT01-B', 'Hà Nội', NULL, NULL, '2000-09-07 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:49:45', NULL, NULL, NULL, NULL),
('B18DCDT029', 'DŨNG', 'ĐOÀN VIỆT ', 'Nam', 'D18CQDT01-B', 'Ninh Bình', NULL, NULL, '2000-09-24 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:49:45', NULL, NULL, NULL, NULL),
('B18DCDT033', 'DUY', 'LÊ ĐỨC ', 'Nam', 'D18CQDT01-B', 'Nam Định', NULL, NULL, '2000-07-11 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:49:45', NULL, NULL, NULL, NULL),
('B18DCDT037', 'ĐẠI', 'NGUYỄN XU N ', 'Nam', 'D18CQDT01-B', 'Thanh Hoá', NULL, NULL, '2000-03-04 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:49:45', NULL, NULL, NULL, NULL),
('B18DCDT041', 'ĐẠO', 'CHU MINH ', 'Nam', 'D18CQDT01-B', 'Tuyên Quang', NULL, NULL, '2000-08-22 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:49:45', NULL, NULL, NULL, NULL),
('B18DCDT045', 'ĐẠT', 'HOÀNG DUY ', 'Nam', 'D18CQDT01-B', 'Thái Nguyên', NULL, NULL, '2000-09-18 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:49:45', NULL, NULL, NULL, NULL),
('B18DCDT049', 'ĐẠT', 'PHẠM THÀNH ', 'Nam', 'D18CQDT01-B', 'Nghệ An', NULL, NULL, '2000-09-29 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:49:45', NULL, NULL, NULL, NULL),
('B18DCDT053', 'ĐỨC', 'CẤN NGỌC ', 'Nam', 'D18CQDT01-B', 'Hà Nội', NULL, NULL, '2000-03-03 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:49:45', NULL, NULL, NULL, NULL),
('B18DCDT057', 'ĐỨC', 'NGUYỄN TIẾN ', 'Nam', 'D18CQDT01-B', 'Hà Nội', NULL, NULL, '2000-12-25 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:49:45', NULL, NULL, NULL, NULL),
('B18DCDT061', 'GIANG', 'NGUYỄN ĐỨC ', 'Nam', 'D18CQDT01-B', 'Hà Nội', NULL, NULL, '2000-02-03 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:49:45', NULL, NULL, NULL, NULL),
('B18DCDT065', 'HẠNH', 'PHẠM MINH ', 'Nam', 'D18CQDT01-B', 'Nam Định', NULL, NULL, '2000-07-28 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:49:45', NULL, NULL, NULL, NULL),
('B18DCDT069', 'HIẾN', 'TRẦN NGỌC ', 'Nam', 'D18CQDT01-B', 'Phú Thọ', NULL, NULL, '2000-02-17 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:49:45', NULL, NULL, NULL, NULL),
('B18DCDT073', 'HIẾU', 'ĐỖ XU N ', 'Nam', 'D18CQDT01-B', 'Thanh Hoá', NULL, NULL, '1999-04-10 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:49:45', NULL, NULL, NULL, NULL),
('B18DCDT077', 'HIẾU', 'TRẦN ĐỨC ', 'Nam', 'D18CQDT01-B', 'Hà Nội', NULL, NULL, '2000-10-19 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:49:45', NULL, NULL, NULL, NULL),
('B18DCDT081', 'HINH', 'BÙI ĐỨC ', 'Nam', 'D18CQDT01-B', 'Nam Định', NULL, NULL, '2000-04-25 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:49:45', NULL, NULL, NULL, NULL),
('B18DCDT085', 'HOÀNG', 'NGUYỄN THÁI ', 'Nam', 'D18CQDT01-B', 'Hà Nội', NULL, NULL, '2000-09-11 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:49:46', NULL, NULL, NULL, NULL),
('B18DCDT089', 'HÙNG', 'ĐỖ NGỌC ', 'Nam', 'D18CQDT01-B', 'Phú Thọ', NULL, NULL, '2000-09-12 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:49:46', NULL, NULL, NULL, NULL),
('B18DCDT093', 'HÙNG', 'NGUYỄN MẠNH ', 'Nam', 'D18CQDT01-B', 'Hà Nội', NULL, NULL, '2000-09-12 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:49:46', NULL, NULL, NULL, NULL),
('B18DCDT097', 'HUY', 'NGUYỄN NGỌC ', 'Nam', 'D18CQDT01-B', 'Bắc Ninh', NULL, NULL, '2000-12-23 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:49:46', NULL, NULL, NULL, NULL),
('B18DCDT101', 'HƯNG', 'MAI ĐÌNH ', 'Nam', 'D18CQDT01-B', 'Hà Nội', NULL, NULL, '2000-12-19 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:49:46', NULL, NULL, NULL, NULL),
('B18DCDT105', 'KIÊN', 'TRỊNH VĂN ', 'Nam', 'D18CQDT01-B', 'Thanh Hoá', NULL, NULL, '2000-01-09 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:49:46', NULL, NULL, NULL, NULL),
('B18DCDT109', 'KHÁNH', 'ĐOÀN DUY ', 'Nam', 'D18CQDT01-B', 'Vĩnh Phúc', NULL, NULL, '2000-08-10 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:49:46', NULL, NULL, NULL, NULL),
('B18DCDT113', 'KHÁNH', 'PHẠM ĐÌNH ', 'Nam', 'D18CQDT01-B', 'Nghệ An', NULL, NULL, '2000-11-13 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:49:46', NULL, NULL, NULL, NULL),
('B18DCKT001', 'ANH', 'ĐẶNG PHƯƠNG ', 'Nữ', 'D18CQKT01-B', 'Hà Nội', NULL, NULL, '2000-10-31 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:29', NULL, NULL, NULL, NULL),
('B18DCKT002', 'ANH', 'ĐỖ DIỆU', 'Nữ', 'D18CQKT02-B', 'Hà Nội', 'anhdd@gmail.com', '032423142', '2000-11-16 17:00:00', '$2y$10$Up0V780.L93/KU5ZgAMg9uq0jBpAOBMq2NOU.saNro5T5pC3n4FYu', 0, 1, '2021-11-12 08:50:30', '2021-11-19 06:28:04', NULL, '22575779', '2021-11-18 11:33:27'),
('B18DCKT005', 'ANH', 'MAI LAN ', 'Nữ', 'D18CQKT01-B', 'Nam Định', NULL, NULL, '2000-09-02 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:29', NULL, NULL, NULL, NULL),
('B18DCKT006', 'ANH', 'NGUYỄN ĐỨC', 'Nam', 'D18CQKT02-B', 'Hà Nội', 'anhnd@gmail.com', '0987345212', '2000-08-21 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:30', '2021-11-19 06:28:42', NULL, NULL, NULL),
('B18DCKT009', 'ANH', 'NGUYỄN THỊ MAI ', 'Nữ', 'D18CQKT01-B', 'Hà Nội', NULL, NULL, '2000-12-29 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:29', NULL, NULL, NULL, NULL),
('B18DCKT010', 'ANH', 'NGUYỄN THỊ NGỌC', 'Nữ', 'D18CQKT02-B', 'Hà Nội', 'anhntnkt010@gmail.com', '09754123213', '2000-08-11 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:30', '2021-11-19 06:29:19', NULL, NULL, NULL),
('B18DCKT013', 'ANH', 'TỪ THỊ HOÀNG ', 'Nữ', 'D18CQKT01-B', 'Hà Nội', NULL, NULL, '2000-07-02 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:29', NULL, NULL, NULL, NULL),
('B18DCKT014', 'ANH', 'TRẦN MINH ', 'Nữ', 'D18CQKT02-B', 'Hà Nội', NULL, NULL, '2000-09-27 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:30', NULL, NULL, NULL, NULL),
('B18DCKT017', 'ÁNH', 'NGUYỄN THỊ ', 'Nữ', 'D18CQKT01-B', 'Thanh Hoá', NULL, NULL, '2000-09-03 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:29', NULL, NULL, NULL, NULL),
('B18DCKT018', 'ÁNH', 'PHẠM THỊ NGỌC ', 'Nữ', 'D18CQKT02-B', 'Lâm Đồng', NULL, NULL, '2000-06-28 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:30', NULL, NULL, NULL, NULL),
('B18DCKT021', 'BÍCH', 'PHẠM THỊ ', 'Nữ', 'D18CQKT01-B', 'Nam Định', NULL, NULL, '2000-02-13 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:29', NULL, NULL, NULL, NULL),
('B18DCKT022', 'BÍCH', 'TRẦN THỊ ', 'Nữ', 'D18CQKT02-B', 'Thái Bình', NULL, NULL, '2000-01-06 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:30', NULL, NULL, NULL, NULL),
('B18DCKT025', 'CH M', 'NGUYỄN THỊ ', 'Nữ', 'D18CQKT01-B', 'Hà Nội', NULL, NULL, '2000-07-18 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:29', NULL, NULL, NULL, NULL),
('B18DCKT026', 'CHI', 'BÙI YẾN ', 'Nữ', 'D18CQKT02-B', 'Bắc Giang', NULL, NULL, '2000-11-22 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:30', NULL, NULL, NULL, NULL),
('B18DCKT029', 'CHI', 'NGUYỄN KIM', 'Nữ', 'D18CQKT01-B', 'Hà Nội', 'vuvanmanhttvtvp3@gmail.com', NULL, '1999-11-21 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:29', '2021-11-19 10:38:34', NULL, NULL, NULL),
('B18DCKT030', 'CHI', 'NGUYỄN THỊ KIM ', 'Nữ', 'D18CQKT02-B', 'Hà Nội', NULL, NULL, '2000-10-08 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:30', NULL, NULL, NULL, NULL),
('B18DCKT033', 'DUYÊN', 'ĐẶNG BÍCH ', 'Nữ', 'D18CQKT01-B', 'Hải Dương', NULL, NULL, '2000-04-20 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:29', NULL, NULL, NULL, NULL),
('B18DCKT034', 'DUYÊN', 'ĐẶNG THỊ ', 'Nữ', 'D18CQKT02-B', 'Thái Bình', NULL, NULL, '2000-11-26 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:30', NULL, NULL, NULL, NULL),
('B18DCKT037', 'DƯƠNG', 'CAO VĂN ', 'Nam', 'D18CQKT01-B', 'Thanh Hoá', NULL, NULL, '2000-06-28 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:29', NULL, NULL, NULL, NULL),
('B18DCKT038', 'DƯƠNG', 'NGUYỄN THỊ THÙY ', 'Nữ', 'D18CQKT02-B', 'Hà Nội', NULL, NULL, '2000-01-09 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:30', NULL, NULL, NULL, NULL),
('B18DCKT041', 'GIANG', 'NGUYỄN THỊ ', 'Nữ', 'D18CQKT01-B', 'Thanh Hoá', NULL, NULL, '2000-03-05 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:29', NULL, NULL, NULL, NULL),
('B18DCKT045', 'HÀ', 'ĐINH THU ', 'Nữ', 'D18CQKT01-B', 'Ninh Bình', NULL, NULL, '2000-06-08 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:29', NULL, NULL, NULL, NULL),
('B18DCKT049', 'HÀ', 'TRẦN ĐỖ THU ', 'Nữ', 'D18CQKT01-B', 'Thanh Hoá', NULL, NULL, '2000-10-01 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:29', NULL, NULL, NULL, NULL),
('B18DCKT053', 'HẰNG', 'CÔNG THỊ THÚY ', 'Nữ', 'D18CQKT01-B', 'Hà Nội', NULL, NULL, '2000-06-07 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:29', NULL, NULL, NULL, NULL),
('B18DCKT057', 'HIÊN', 'NGUYỄN THỊ ', 'Nữ', 'D18CQKT01-B', 'Hà Nội', NULL, NULL, '2000-07-25 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:29', NULL, NULL, NULL, NULL),
('B18DCKT061', 'HIỀN', 'NGÔ THỊ THU ', 'Nữ', 'D18CQKT01-B', 'Bắc Ninh', NULL, NULL, '2000-07-04 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:29', NULL, NULL, NULL, NULL),
('B18DCKT065', 'HOA', 'LƯU THÚY ', 'Nữ', 'D18CQKT01-B', 'Hà Nội', NULL, NULL, '2000-06-23 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:29', NULL, NULL, NULL, NULL),
('B18DCKT069', 'HỒNG', 'VŨ THỊ ', 'Nữ', 'D18CQKT01-B', 'Ninh Bình', NULL, NULL, '2000-10-30 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:29', NULL, NULL, NULL, NULL),
('B18DCKT073', 'HUYỀN', 'NGUYỄN TRUNG THỊ ', 'Nữ', 'D18CQKT01-B', 'Hà Nội', NULL, NULL, '2000-07-07 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:29', NULL, NULL, NULL, NULL),
('B18DCKT077', 'HƯƠNG', 'TẠ THANH ', 'Nữ', 'D18CQKT01-B', 'Hà Nội', NULL, NULL, '2000-12-17 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:29', NULL, NULL, NULL, NULL),
('B18DCKT081', 'KIỀU', 'VŨ THỊ ÁNH ', 'Nữ', 'D18CQKT01-B', 'Hà Nội', NULL, NULL, '2000-08-10 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:29', NULL, NULL, NULL, NULL),
('B18DCKT085', 'LAN', 'VŨ THỊ THÚY ', 'Nữ', 'D18CQKT01-B', 'Nam Định', NULL, NULL, '1999-12-31 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:29', NULL, NULL, NULL, NULL),
('B18DCKT089', 'LINH', 'MAI THỊ THÙY ', 'Nữ', 'D18CQKT01-B', 'Nam Định', NULL, NULL, '2000-05-28 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:29', NULL, NULL, NULL, NULL),
('B18DCKT093', 'LINH', 'NGUYỄN THỊ MỸ ', 'Nữ', 'D18CQKT01-B', 'Lào Cai', NULL, NULL, '2000-02-18 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:29', NULL, NULL, NULL, NULL),
('B18DCKT097', 'LINH', 'PHẠM PHƯƠNG ', 'Nữ', 'D18CQKT01-B', 'Ninh Bình', NULL, NULL, '1999-12-31 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:29', NULL, NULL, NULL, NULL),
('B18DCKT101', 'LƯƠNG', 'DƯƠNG THỊ ', 'Nữ', 'D18CQKT01-B', 'Hà Nội', NULL, NULL, '2000-11-17 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:29', NULL, NULL, NULL, NULL),
('B18DCKT105', 'LY', 'VŨ THỊ KHÁNH ', 'Nữ', 'D18CQKT01-B', 'Nam Định', NULL, NULL, '2000-07-14 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:29', NULL, NULL, NULL, NULL),
('B18DCKT109', 'MAI', 'PHẠM THỊ ', 'Nữ', 'D18CQKT01-B', 'Hải Dương', NULL, NULL, '2000-04-25 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:29', NULL, NULL, NULL, NULL),
('B18DCKT113', 'MY', 'NGUYỄN HÀ ', 'Nữ', 'D18CQKT01-B', 'Hà Nội', NULL, NULL, '2000-09-04 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:29', NULL, NULL, NULL, NULL),
('B18DCKT117', 'NINH', 'PHẠM THỊ ', 'Nữ', 'D18CQKT01-B', 'Hà Nội', NULL, NULL, '2000-01-29 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:30', NULL, NULL, NULL, NULL),
('B18DCKT121', 'NGOAN', 'BÙI THANH ', 'Nữ', 'D18CQKT01-B', 'Thái Bình', NULL, NULL, '2000-09-10 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:30', NULL, NULL, NULL, NULL),
('B18DCKT125', 'NGỌC', 'NGUYỄN HOÀNG THANH ', 'Nữ', 'D18CQKT01-B', 'Hải Phòng', NULL, NULL, '2000-10-31 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:30', NULL, NULL, NULL, NULL),
('B18DCKT129', 'NGUYỆT', 'CAO THỊ MINH ', 'Nữ', 'D18CQKT01-B', 'Nam Định', NULL, NULL, '2000-09-03 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:30', NULL, NULL, NULL, NULL),
('B18DCKT133', 'NHI', 'NGUYỄN LINH ', 'Nữ', 'D18CQKT01-B', 'Hoà Bình', NULL, NULL, '2000-09-07 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:30', NULL, NULL, NULL, NULL),
('B18DCKT137', 'NHUNG', 'TẠ THỊ HỒNG ', 'Nữ', 'D18CQKT01-B', 'Lào Cai', NULL, NULL, '2000-02-05 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:30', NULL, NULL, NULL, NULL),
('B18DCKT141', 'PHƯƠNG', 'NGUYỄN THỊ ', 'Nữ', 'D18CQKT01-B', 'Hà Nam', NULL, NULL, '2000-07-27 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:30', NULL, NULL, NULL, NULL),
('B18DCKT145', 'QUYÊN', 'LÊ THỊ ', 'Nữ', 'D18CQKT01-B', 'Thanh Hoá', NULL, NULL, '2000-11-25 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:30', NULL, NULL, NULL, NULL),
('B18DCKT149', 'QUỲNH', 'NGUYỄN THÚY ', 'Nữ', 'D18CQKT01-B', 'Hà Nội', NULL, NULL, '2000-12-24 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:30', NULL, NULL, NULL, NULL),
('B18DCKT153', 'TUYẾN', 'TRẦN KIM ', 'Nữ', 'D18CQKT01-B', 'Nam Định', NULL, NULL, '2000-04-29 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:30', NULL, NULL, NULL, NULL),
('B18DCKT157', 'THANH', 'NGUYỄN HÀ ', 'Nữ', 'D18CQKT01-B', 'Bắc Ninh', NULL, NULL, '2000-09-13 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:30', NULL, NULL, NULL, NULL),
('B18DCKT161', 'THẢO', 'CHU THỊ ', 'Nữ', 'D18CQKT01-B', 'Hà Nội', NULL, NULL, '2000-03-12 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:30', NULL, NULL, NULL, NULL),
('B18DCKT165', 'THẢO', 'PHẠM THU ', 'Nữ', 'D18CQKT01-B', 'Hà Nội', NULL, NULL, '2000-09-30 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:30', NULL, NULL, NULL, NULL),
('B18DCKT169', 'THU', 'NGUYỄN HUỆ ', 'Nữ', 'D18CQKT01-B', 'Hà Nội', NULL, NULL, '2000-11-17 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:30', NULL, NULL, NULL, NULL),
('B18DCKT173', 'THÙY', 'LÊ MINH ', 'Nữ', 'D18CQKT01-B', 'Hà Nội', NULL, NULL, '2000-11-10 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:30', NULL, NULL, NULL, NULL),
('B18DCKT177', 'THƯ', 'ĐỖ MINH ', 'Nữ', 'D18CQKT01-B', 'Thanh Hoá', NULL, NULL, '2000-11-22 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:30', NULL, NULL, NULL, NULL),
('B18DCKT181', 'THƯƠNG', 'NGUYỄN THỊ ', 'Nữ', 'D18CQKT01-B', 'Nghệ An', NULL, NULL, '2000-11-03 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:30', NULL, NULL, NULL, NULL),
('B18DCKT185', 'TRANG', 'LÊ THU ', 'Nữ', 'D18CQKT01-B', 'Hà Nội', NULL, NULL, '2000-11-30 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:30', NULL, NULL, NULL, NULL),
('B18DCKT189', 'TRANG', 'TRẦN THỊ THU ', 'Nữ', 'D18CQKT01-B', 'Ninh Bình', NULL, NULL, '2000-11-06 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:30', NULL, NULL, NULL, NULL),
('B18DCKT193', 'TRINH', 'VŨ HÀ VIỆT ', 'Nữ', 'D18CQKT01-B', 'Ninh Bình', NULL, NULL, '2000-01-25 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:30', NULL, NULL, NULL, NULL),
('B18DCKT197', 'UYÊN', 'TRẦN THỊ ', 'Nữ', 'D18CQKT01-B', 'Yên Bái', NULL, NULL, '2000-09-18 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:30', NULL, NULL, NULL, NULL),
('B18DCKT201', 'YẾN', 'NGUYỄN NGỌC ', 'Nữ', 'D18CQKT01-B', 'Hà Nội', NULL, NULL, '2000-08-19 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:30', NULL, NULL, NULL, NULL),
('B18DCMR001', 'AN', 'BÙI THẢO ', 'Nữ', 'D18CQMR01-B', 'Hà Nội', NULL, NULL, '2000-07-25 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:08', NULL, NULL, NULL, NULL),
('B18DCMR002', 'AN', 'LƯƠNG THỊ HẢI ', 'Nữ', 'D18CQMR02-B', 'Hà Nội', NULL, NULL, '2000-10-27 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR005', 'ANH', 'BÙI THỊ V N ', 'Nữ', 'D18CQMR01-B', 'Bắc Ninh', NULL, NULL, '2000-08-18 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR006', 'ANH', 'CAO THỊ V N ', 'Nữ', 'D18CQMR02-B', 'Bắc Ninh', NULL, NULL, '2000-10-04 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR009', 'ANH', 'KIM THỊ TÚ ', 'Nữ', 'D18CQMR01-B', 'Hà Nội', NULL, NULL, '2000-04-19 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR010', 'ANH', 'NGUYỄN HỒNG ', 'Nữ', 'D18CQMR02-B', 'Hà Nội', NULL, NULL, '2000-10-16 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR013', 'ANH', 'NGUYỄN THỊ LAN ', 'Nữ', 'D18CQMR01-B', 'Bắc Ninh', NULL, NULL, '2000-07-16 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR014', 'ANH', 'NGUYỄN THỊ TÚ ', 'Nữ', 'D18CQMR02-B', 'Hà Nội', NULL, NULL, '2000-06-25 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR017', 'ANH', 'PHẠM HOÀNG ', 'Nam', 'D18CQMR01-B', 'Bắc Ninh', NULL, NULL, '2000-05-02 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR018', 'ANH', 'PHẠM THỊ NHẬT ', 'Nữ', 'D18CQMR02-B', 'Bắc Ninh', NULL, NULL, '2000-10-21 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR021', 'ANH', 'TRẦN THỊ LAN ', 'Nữ', 'D18CQMR01-B', 'Nam Định', NULL, NULL, '2000-01-11 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR022', 'ANH', 'TRẦN V N ', 'Nữ', 'D18CQMR02-B', 'Hà Nội', NULL, NULL, '2000-01-18 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR025', 'BÁCH', 'NGÔ XU N ', 'Nam', 'D18CQMR01-B', 'Hà Nội', NULL, NULL, '2000-06-11 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR026', 'BẢO', 'NGUYỄN THỊ THÁI ', 'Nữ', 'D18CQMR02-B', 'Hà Nội', NULL, NULL, '2000-10-26 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR029', 'CÚC', 'TRƯƠNG THỊ ', 'Nữ', 'D18CQMR01-B', 'Hà Nam', NULL, NULL, '2000-09-02 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR030', 'CƯỜNG', 'TRẦN MẠC THẾ ', 'Nam', 'D18CQMR02-B', 'Phú Thọ', NULL, NULL, '2000-01-12 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR033', 'DIỄM', 'VŨ THỊ ', 'Nữ', 'D18CQMR01-B', 'Nam Định', NULL, NULL, '2000-04-18 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR034', 'DUNG', 'ĐẶNG PHƯƠNG ', 'Nữ', 'D18CQMR02-B', 'Thái Bình', NULL, NULL, '2000-09-10 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR037', 'DUNG', 'VŨ THỊ ', 'Nữ', 'D18CQMR01-B', 'Nghệ An', NULL, NULL, '2000-05-26 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR038', 'DUY', 'CAO VĂN ', 'Nam', 'D18CQMR02-B', 'Nam Định', NULL, NULL, '2000-04-03 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR041', 'DƯƠNG', 'HÀ HOÀNG ', 'Nam', 'D18CQMR01-B', 'Hà Nội', NULL, NULL, '2000-05-24 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR042', 'ĐAN', 'NGUYỄN NGỌC ', 'Nữ', 'D18CQMR02-B', 'Nam Định', NULL, NULL, '2000-07-25 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR045', 'ĐỨC', 'LÊ ANH ', 'Nam', 'D18CQMR01-B', 'Nghệ An', NULL, NULL, '1999-12-31 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR049', 'GIANG', 'NGUYỄN HOÀNG HƯƠNG ', 'Nữ', 'D18CQMR01-B', 'Hà Nội', NULL, NULL, '2000-10-15 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR053', 'HÀ', 'MAI THỊ ', 'Nữ', 'D18CQMR01-B', 'Thanh Hoá', NULL, NULL, '2000-06-29 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR057', 'HÀ', 'TRẦN THỊ THU ', 'Nữ', 'D18CQMR01-B', 'Nam Định', NULL, NULL, '2000-07-17 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR061', 'HẠNH', 'LỖ THỊ ', 'Nữ', 'D18CQMR01-B', 'Phú Thọ', NULL, NULL, '2000-06-22 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR065', 'HIỀN', 'PHAN BÍCH ', 'Nữ', 'D18CQMR01-B', 'Hà Nội', NULL, NULL, '2000-08-26 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR069', 'HIẾU', 'ĐINH VĂN ', 'Nam', 'D18CQMR01-B', 'Thanh Hoá', NULL, NULL, '2000-10-12 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR073', 'HOÀN', 'DƯƠNG THỊ HỒNG ', 'Nữ', 'D18CQMR01-B', 'Bắc Ninh', NULL, NULL, '2000-12-22 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR077', 'HỒNG', 'PHẠM THỊ ', 'Nữ', 'D18CQMR01-B', 'Hưng Yên', NULL, NULL, '2000-02-27 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR081', 'HUYỀN', 'HÀ THANH ', 'Nữ', 'D18CQMR01-B', 'Hà Nội', NULL, NULL, '2000-08-14 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR085', 'HUYỀN', 'VŨ THANH ', 'Nữ', 'D18CQMR01-B', 'Nam Định', NULL, NULL, '2000-01-18 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR089', 'HƯƠNG', 'LÊ THỊ THU ', 'Nữ', 'D18CQMR01-B', 'Hoà Bình', NULL, NULL, '2000-07-09 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR093', 'KIÊN', 'NGUYỄN VĂN MẠNH ', 'Nam', 'D18CQMR01-B', 'Nghệ An', NULL, NULL, '2000-05-29 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR097', 'KHUÊ', 'TRẦN NGUYỄN ĐAN ', 'Nữ', 'D18CQMR01-B', 'Hà Nội', NULL, NULL, '2000-01-30 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR101', 'LAN', 'TRỊNH THỊ PHƯƠNG ', 'Nữ', 'D18CQMR01-B', 'Ninh Bình', NULL, NULL, '1999-02-21 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR105', 'LINH', 'ĐẶNG THỊ ', 'Nữ', 'D18CQMR01-B', 'Bắc Giang', NULL, NULL, '2000-06-08 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR109', 'LINH', 'NGUYỄN THỊ THUỲ ', 'Nữ', 'D18CQMR01-B', 'Thái Bình', NULL, NULL, '2000-01-15 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR113', 'LOAN', 'ĐINH THỊ ', 'Nữ', 'D18CQMR01-B', 'Thanh Hoá', NULL, NULL, '1999-04-27 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR117', 'LONG', 'LÝ HẢI ', 'Nam', 'D18CQMR01-B', 'Hà Nội', NULL, NULL, '2000-08-22 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR121', 'LY', 'NGUYỄN KHÁNH ', 'Nữ', 'D18CQMR01-B', 'Yên Bái', NULL, NULL, '2000-03-30 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR125', 'MINH', 'NGUYỄN ĐỨC ', 'Nam', 'D18CQMR01-B', 'Hà Nội', NULL, NULL, '2000-04-15 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR129', 'MY', 'DƯƠNG NỮ TRÀ ', 'Nữ', 'D18CQMR01-B', 'Thái Bình', NULL, NULL, '2000-07-31 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR133', 'NGA', 'NGUYỄN THỊ HỒNG ', 'Nữ', 'D18CQMR01-B', 'Vĩnh Phúc', NULL, NULL, '2000-01-01 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR137', 'NGOAN', 'VŨ THỊ ', 'Nữ', 'D18CQMR01-B', 'Hải Dương', NULL, NULL, '2000-07-02 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR141', 'NHI', 'VŨ THỊ ', 'Nữ', 'D18CQMR01-B', 'Nam Định', NULL, NULL, '2000-08-17 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR145', 'NHUNG', 'PHẠM THỊ ', 'Nữ', 'D18CQMR01-B', 'Thái Bình', NULL, NULL, '2000-09-05 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR149', 'PHONG', 'NGUYỄN MINH ', 'Nam', 'D18CQMR01-B', 'Nam Định', NULL, NULL, '2000-04-13 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR153', 'PHƯƠNG', 'NGUYỄN THỊ HÀ ', 'Nữ', 'D18CQMR01-B', 'Bắc Ninh', NULL, NULL, '2000-11-24 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR157', 'PHƯỢNG', 'NGUYỄN THỊ ', 'Nữ', 'D18CQMR01-B', 'Nam Định', NULL, NULL, '2000-06-07 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL);
INSERT INTO `user_tbl` (`id`, `firstName`, `lastName`, `gender`, `classId`, `address`, `email`, `phoneNumber`, `dob`, `password`, `type`, `isActive`, `createAt`, `updateAt`, `avatar`, `verifyCode`, `expriedAt`) VALUES
('B18DCMR161', 'QUỲNH', 'NGUYỄN THỊ ', 'Nữ', 'D18CQMR01-B', 'Quảng Ninh', NULL, NULL, '2000-04-03 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR165', 'SINH', 'LÊ THỊ ', 'Nữ', 'D18CQMR01-B', 'Thanh Hoá', NULL, NULL, '2000-05-29 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR169', 'TÙNG', 'HOÀNG SƠN ', 'Nam', 'D18CQMR01-B', 'Hà Nội', NULL, NULL, '2000-03-17 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR173', 'THẢO', 'ĐOÀN THỊ THU ', 'Nữ', 'D18CQMR01-B', 'Hưng Yên', NULL, NULL, '2000-12-24 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR177', 'THẮNG', 'HOÀNG CÔNG ', 'Nam', 'D18CQMR01-B', 'Nghệ An', NULL, NULL, '2000-07-31 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR181', 'THU', 'DƯƠNG THỊ KIM ', 'Nữ', 'D18CQMR01-B', 'Phú Thọ', NULL, NULL, '2000-02-20 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR185', 'THÚY', 'LẠI THỊ ', 'Nữ', 'D18CQMR01-B', 'Nam Định', NULL, NULL, '2000-08-03 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR189', 'TRÀ', 'PHÙNG THỊ HƯƠNG ', 'Nữ', 'D18CQMR01-B', 'Nghệ An', NULL, NULL, '2000-05-04 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR193', 'TRANG', 'NGUYỄN THỊ THU ', 'Nữ', 'D18CQMR01-B', 'Bắc Giang', NULL, NULL, '2000-11-04 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR197', 'TRANG', 'TRẦN THỊ QUỲNH ', 'Nữ', 'D18CQMR01-B', 'Hà Nội', NULL, NULL, '2000-04-19 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR201', 'TRUNG', 'ĐOÀN QUỐC ', 'Nam', 'D18CQMR01-B', 'Hà Nội', NULL, NULL, '2000-11-02 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR205', 'V N', 'NGUYỄN THỊ ', 'Nữ', 'D18CQMR01-B', 'Vĩnh Phúc', NULL, NULL, '2000-06-17 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCMR209', 'XU N', 'LÊ THANH ', 'Nữ', 'D18CQMR01-B', 'Hà Nội', NULL, NULL, '2000-09-10 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:50:09', NULL, NULL, NULL, NULL),
('B18DCPT000', 'Anh', 'Nguyễn Văn Tuấn', 'Nam', 'B18DCPT06-B', 'Hà Nội', 'anhnvt000@gmail.com', '0943953485', '2000-11-03 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-19 06:53:13', '2021-11-20 05:04:18', NULL, NULL, NULL),
('B18DCPT005', 'ANH', 'DƯƠNG ĐỨC ', 'Nam', 'D18CQPT05-B', 'Hà Nội', NULL, NULL, '2000-11-01 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:45:59', NULL, NULL, NULL, NULL),
('B18DCPT010', 'ANH', 'NGUYỄN HẢI ', 'Nam', 'D18CQPT05-B', 'Vĩnh Phúc', NULL, NULL, '2000-01-02 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:45:59', NULL, NULL, NULL, NULL),
('B18DCPT015', 'ANH', 'PHAN THỊ MAI ', 'Nữ', 'D18CQPT05-B', 'Hà Nội', NULL, NULL, '2000-12-15 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:45:59', NULL, NULL, NULL, NULL),
('B18DCPT020', 'ANH', 'VŨ PHƯƠNG ', 'Nữ', 'D18CQPT05-B', 'Hà Nội', NULL, NULL, '2000-07-19 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:45:59', NULL, NULL, NULL, NULL),
('B18DCPT025', 'BẢO', 'HÀ DUY TUẤN ', 'Nam', 'D18CQPT05-B', 'Hải Dương', NULL, NULL, '1999-12-31 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:45:59', NULL, NULL, NULL, NULL),
('B18DCPT030', 'BÌNH', 'LÊ THANH ', 'Nam', 'D18CQPT05-B', 'Điện Biên', NULL, NULL, '2000-10-10 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:46:00', NULL, NULL, NULL, NULL),
('B18DCPT035', 'CƯỜNG', 'PHẠM QUỐC ', 'Nam', 'D18CQPT05-B', 'Nam Định', NULL, NULL, '2000-08-13 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:46:00', NULL, NULL, NULL, NULL),
('B18DCPT040', 'DŨNG', 'CẤN VĂN ', 'Nam', 'D18CQPT05-B', 'Hà Nội', NULL, NULL, '2000-10-20 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:46:00', NULL, NULL, NULL, NULL),
('B18DCPT045', 'DŨNG', 'NGUYỄN MẠNH ', 'Nam', 'D18CQPT05-B', 'Hà Nội', NULL, NULL, '2000-09-21 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:46:00', NULL, NULL, NULL, NULL),
('B18DCPT050', 'DUY', 'PHẠM KHÁNH ', 'Nam', 'D18CQPT05-B', 'Hải Phòng', NULL, NULL, '1999-12-31 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:46:00', NULL, NULL, NULL, NULL),
('B18DCPT055', 'ĐẠT', 'NGUYỄN TIẾN ', 'Nam', 'D18CQPT05-B', 'Hà Nội', NULL, NULL, '2000-11-28 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:46:00', NULL, NULL, NULL, NULL),
('B18DCPT060', 'ĐĂNG', 'NGUYỄN NHƯ ', 'Nam', 'D18CQPT05-B', 'Hà Nội', NULL, NULL, '2000-12-29 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:46:00', NULL, NULL, NULL, NULL),
('B18DCPT065', 'GIANG', 'NGUYỄN TRƯỜNG ', 'Nam', 'D18CQPT05-B', 'Thái Bình', NULL, NULL, '1999-12-31 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:46:00', NULL, NULL, NULL, NULL),
('B18DCPT070', 'HẢI', 'PHẠM THỊ ', 'Nữ', 'D18CQPT05-B', 'Hải Phòng', NULL, NULL, '2000-01-09 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:46:00', NULL, NULL, NULL, NULL),
('B18DCPT075', 'HẰNG', 'LÊ THU ', 'Nữ', 'D18CQPT05-B', 'Hà Nội', NULL, NULL, '2000-07-25 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:46:00', NULL, NULL, NULL, NULL),
('B18DCPT080', 'HIỀN', 'LÊ THỊ ', 'Nữ', 'D18CQPT05-B', 'Hà Nội', NULL, NULL, '2000-08-23 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:46:00', NULL, NULL, NULL, NULL),
('B18DCPT085', 'HIẾU', 'NGUYỄN NGHIÊM CHÍ ', 'Nam', 'D18CQPT05-B', 'Hà Nội', NULL, NULL, '2000-01-25 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:46:00', NULL, NULL, NULL, NULL),
('B18DCPT090', 'HÒA', 'VŨ THỊ ', 'Nữ', 'D18CQPT05-B', 'Thái Bình', NULL, NULL, '2000-05-29 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:46:00', NULL, NULL, NULL, NULL),
('B18DCPT095', 'HOÀNG', 'NGUYỄN NHẬT ', 'Nam', 'D18CQPT05-B', 'Nghệ An', NULL, NULL, '2000-03-05 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:46:00', NULL, NULL, NULL, NULL),
('B18DCPT100', 'HÙNG', 'NGUYỄN QUỐC ', 'Nam', 'D18CQPT05-B', 'Hà Nội', NULL, NULL, '2000-11-24 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:46:00', NULL, NULL, NULL, NULL),
('B18DCPT105', 'HUY', 'TẠ QUANG ', 'Nam', 'D18CQPT05-B', 'Bắc Ninh', NULL, NULL, '2000-03-11 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:46:00', NULL, NULL, NULL, NULL),
('B18DCPT110', 'HƯƠNG', 'BÙI THỊ THU ', 'Nữ', 'D18CQPT05-B', 'Hải Phòng', NULL, NULL, '2000-12-30 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:46:00', NULL, NULL, NULL, NULL),
('B18DCPT115', 'KIÊN', 'NGUYỄN ANH ', 'Nam', 'D18CQPT05-B', 'Hà Nội', NULL, NULL, '1998-03-08 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:46:00', NULL, NULL, NULL, NULL),
('B18DCPT120', 'KHIÊM', 'NGUYỄN ĐÌNH ', 'Nam', 'D18CQPT05-B', 'Bắc Ninh', NULL, NULL, '2000-02-15 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:46:00', NULL, NULL, NULL, NULL),
('B18DCPT125', 'L N', 'VÕ NGỌC ', 'Nam', 'D18CQPT05-B', 'Hà Nội', NULL, NULL, '2000-08-03 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:46:00', NULL, NULL, NULL, NULL),
('B18DCPT130', 'LINH', 'KHUẤT QUANG ', 'Nam', 'D18CQPT05-B', 'Phú Thọ', NULL, NULL, '2000-07-11 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:46:00', NULL, NULL, NULL, NULL),
('B18DCPT135', 'LINH', 'NGUYỄN THÙY ', 'Nữ', 'D18CQPT05-B', 'Hà Nội', NULL, NULL, '2000-09-17 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:46:00', NULL, NULL, NULL, NULL),
('B18DCPT140', 'LONG', 'DƯƠNG KIM ', 'Nam', 'D18CQPT05-B', 'Bắc Giang', NULL, NULL, '2000-09-28 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:46:00', NULL, NULL, NULL, NULL),
('B18DCPT145', 'LONG', 'NGUYỄN XU N THANH ', 'Nam', 'D18CQPT05-B', 'Hà Nội', NULL, NULL, '2000-03-03 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:46:00', NULL, NULL, NULL, NULL),
('B18DCPT150', 'LU N', 'NGUYỄN THÀNH ', 'Nam', 'D18CQPT05-B', 'Hà Nội', NULL, NULL, '2000-11-10 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-12 08:46:00', NULL, NULL, NULL, NULL),
('B18DCPT151', 'LU N', 'TRẦN VĂN', 'Nam', 'D18CQPT01-B', 'Hà Nội', NULL, NULL, '2000-10-14 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:30:38', NULL, NULL, NULL, NULL),
('B18DCPT155', 'MẠNH', 'VŨ VĂN', 'Nam', 'D18CQPT05-B', 'Vĩnh Phúc', 'vuvanmanh@gmail.com', '0964674467', '2000-03-04 17:00:00', '$2y$10$MAektuL7dWQEOkqaqDJ4g.RQtsoLtiiegcVp.OXm4N1vnH6ExYzOS', 0, 1, '2021-11-11 14:37:00', '2021-11-19 17:07:25', 'uploads/6197d240dd08b0.31669099.jpg', NULL, NULL),
('B18DCPT156', 'MINH', 'LÊ THỊ HIỀN', 'Nữ', 'D18CQPT01-B', 'Thanh Hoá', NULL, NULL, '2000-09-03 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:30:38', NULL, NULL, NULL, NULL),
('B18DCPT160', 'NAM', 'NGUYỄN HUY ', 'Nam', 'D18CQPT05-B', 'Bắc Ninh', NULL, NULL, '2000-06-30 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:37:00', NULL, NULL, NULL, NULL),
('B18DCPT161', 'NAM', 'TRẦN HẢI', 'Nam', 'D18CQPT01-B', 'Thanh Hoá', NULL, NULL, '2000-03-25 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:30:38', NULL, NULL, NULL, NULL),
('B18DCPT165', 'NGHĨA', 'TRẦN TRUNG ', 'Nam', 'D18CQPT05-B', 'Hà Nam', NULL, NULL, '2000-10-23 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:37:00', NULL, NULL, NULL, NULL),
('B18DCPT166', 'NGỌC', 'ĐOÀN HỒNG', 'Nữ', 'D18CQPT01-B', 'Hà Nội', NULL, NULL, '2000-01-26 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:30:38', NULL, NULL, NULL, NULL),
('B18DCPT170', 'NGUYỆN', 'VI VĂN ', 'Nam', 'D18CQPT05-B', 'Lạng Sơn', NULL, NULL, '2000-01-20 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:37:00', NULL, NULL, NULL, NULL),
('B18DCPT171', 'NGUYỆT', 'PHAN THỊ', 'Nữ', 'D18CQPT01-B', 'Vĩnh Phúc', NULL, NULL, '2000-07-22 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:30:38', NULL, NULL, NULL, NULL),
('B18DCPT175', 'OANH', 'TẠ KIỀU ', 'Nữ', 'D18CQPT05-B', 'Hà Nội', NULL, NULL, '2000-02-01 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:37:00', NULL, NULL, NULL, NULL),
('B18DCPT176', 'PHÚC', 'TRẦN XU N', 'Nam', 'D18CQPT01-B', 'Bắc Giang', NULL, NULL, '2000-06-04 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:30:38', NULL, NULL, NULL, NULL),
('B18DCPT180', 'QUANG', 'NGUYỄN VĂN ', 'Nam', 'D18CQPT05-B', 'Bắc Ninh', NULL, NULL, '2000-01-09 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:37:00', NULL, NULL, NULL, NULL),
('B18DCPT181', 'QUANG', 'PHẠM ĐÌNH', 'Nam', 'D18CQPT01-B', 'Hải Phòng', NULL, NULL, '2000-01-18 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:30:38', NULL, NULL, NULL, NULL),
('B18DCPT185', 'QUYỀN', 'CAO MINH ', 'Nam', 'D18CQPT05-B', 'Hưng Yên', NULL, NULL, '2000-10-31 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:37:00', NULL, NULL, NULL, NULL),
('B18DCPT186', 'QUYẾT', 'LÝ VĂN', 'Nam', 'D18CQPT01-B', 'Cao Bằng', NULL, NULL, '2000-02-02 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:30:38', NULL, NULL, NULL, NULL),
('B18DCPT190', 'QUỲNH', 'TRẦN NHƯ ', 'Nữ', 'D18CQPT05-B', 'Hà Nội', NULL, NULL, '2000-07-13 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:37:00', NULL, NULL, NULL, NULL),
('B18DCPT191', 'SANG', 'HOÀNG VĂN', 'Nam', 'D18CQPT01-B', 'Hà Nội', NULL, NULL, '2000-02-09 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:30:38', NULL, NULL, NULL, NULL),
('B18DCPT195', 'SƠN', 'NGUYỄN THÁI ', 'Nam', 'D18CQPT05-B', 'Phú Thọ', NULL, NULL, '2000-08-17 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:37:00', NULL, NULL, NULL, NULL),
('B18DCPT196', 'SƠN', 'NGUYỄN VĂN', 'Nam', 'D18CQPT01-B', 'Ninh Bình', NULL, NULL, '2000-07-02 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:30:38', NULL, NULL, NULL, NULL),
('B18DCPT200', 'TIẾN', 'TRẦN MINH ', 'Nam', 'D18CQPT05-B', 'Bắc Giang', NULL, NULL, '2000-05-24 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:37:00', NULL, NULL, NULL, NULL),
('B18DCPT201', 'TÚ', 'HOÀNG MINH', 'Nam', 'D18CQPT01-B', 'Hà Nội', NULL, NULL, '2000-12-12 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:30:38', NULL, NULL, NULL, NULL),
('B18DCPT205', 'TUẤN', 'ĐỒNG ANH ', 'Nam', 'D18CQPT05-B', 'Hà Nội', NULL, NULL, '2000-08-23 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:37:00', NULL, NULL, NULL, NULL),
('B18DCPT206', 'TUẤN', 'PHẠM ANH', 'Nam', 'D18CQPT01-B', 'Thanh Hoá', NULL, NULL, '2000-02-22 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:30:38', NULL, NULL, NULL, NULL),
('B18DCPT210', 'TÙNG', 'NGÔ THANH ', 'Nam', 'D18CQPT05-B', 'Ninh Bình', NULL, NULL, '2000-06-06 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:37:00', NULL, NULL, NULL, NULL),
('B18DCPT211', 'TÙNG', 'NGUYỄN KIM', 'Nam', 'D18CQPT01-B', 'Bắc Ninh', NULL, NULL, '2000-12-04 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:30:38', NULL, NULL, NULL, NULL),
('B18DCPT215', 'THÀNH', 'LÃ QUANG ', 'Nam', 'D18CQPT05-B', 'Ninh Bình', NULL, NULL, '2000-08-24 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:37:00', NULL, NULL, NULL, NULL),
('B18DCPT216', 'THÀNH', 'NGUYỄN NGỌC', 'Nam', 'D18CQPT01-B', 'Hải Dương', NULL, NULL, '2000-10-26 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:30:38', NULL, NULL, NULL, NULL),
('B18DCPT220', 'THẢO', 'NGUYỄN THỊ THU ', 'Nữ', 'D18CQPT05-B', 'Quảng Ninh', NULL, NULL, '2000-10-11 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:37:00', NULL, NULL, NULL, NULL),
('B18DCPT221', 'THẾ', 'DOÃN CÔNG', 'Nam', 'D18CQPT01-B', 'Nam Định', NULL, NULL, '1998-03-05 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:30:38', NULL, NULL, NULL, NULL),
('B18DCPT225', 'THƠM', 'DƯƠNG THỊ ', 'Nữ', 'D18CQPT05-B', 'Hưng Yên', NULL, NULL, '2000-07-12 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:37:00', NULL, NULL, NULL, NULL),
('B18DCPT226', 'THUẬN', 'TRƯƠNG DUY', 'Nam', 'D18CQPT01-B', 'Hà Nội', NULL, NULL, '2000-07-19 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:30:38', NULL, NULL, NULL, NULL),
('B18DCPT230', 'THỦY', 'LÊ THU ', 'Nữ', 'D18CQPT05-B', 'Thanh Hoá', NULL, NULL, '2000-09-23 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:37:00', NULL, NULL, NULL, NULL),
('B18DCPT231', 'THƯ', 'NGUYỄN THANH', 'Nữ', 'D18CQPT01-B', 'Thái Bình', NULL, NULL, '2000-01-22 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:30:38', NULL, NULL, NULL, NULL),
('B18DCPT235', 'TRÍ', 'PHẠM MINH ', 'Nam', 'D18CQPT05-B', 'Nam Định', NULL, NULL, '2000-11-02 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:37:00', NULL, NULL, NULL, NULL),
('B18DCPT236', 'TRINH', 'NGUYỄN VIỆT', 'Nữ', 'D18CQPT01-B', 'Thái Bình', NULL, NULL, '2000-01-14 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:30:38', NULL, NULL, NULL, NULL),
('B18DCPT240', 'TRUNG', 'NGUYỄN QUỐC ', 'Nam', 'D18CQPT05-B', 'Hà Nội', NULL, NULL, '2000-07-20 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:37:00', NULL, NULL, NULL, NULL),
('B18DCPT241', 'TRUNG', 'TRẦN', 'Nam', 'D18CQPT01-B', 'Hà Nội', NULL, NULL, '2000-09-12 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:30:38', NULL, NULL, NULL, NULL),
('B18DCPT245', 'UYÊN', 'ĐOÀN THỊ THU ', 'Nữ', 'D18CQPT05-B', 'Thái Bình', NULL, NULL, '2000-09-09 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:37:00', NULL, NULL, NULL, NULL),
('B18DCPT246', 'V N', 'LÊ THỊ HỒNG', 'Nữ', 'D18CQPT01-B', 'Phú Thọ', NULL, NULL, '2000-11-30 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:30:38', NULL, NULL, NULL, NULL),
('B18DCPT250', 'VIỆT', 'NGUYỄN QUỐC ', 'Nam', 'D18CQPT05-B', 'Thái Bình', NULL, NULL, '2000-05-13 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:37:00', NULL, NULL, NULL, NULL),
('B18DCPT251', 'VINH', 'TRẦN VĂN', 'Nam', 'D18CQPT01-B', 'Bắc Giang', 'vuvanmanhttvtvp2@gmail.com', '', '2000-11-19 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:30:38', '2021-11-19 06:21:35', NULL, NULL, NULL),
('B18DCPT255', 'YẾN', 'HÁN THỊ HẢI ', 'Nữ', 'D18CQPT05-B', 'Phú Thọ', NULL, NULL, '2000-06-01 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:37:00', NULL, NULL, NULL, NULL),
('B18DCPT256', 'YẾN', 'HOÀNG', 'Nữ', 'D18CQPT01-B', 'Hà Nội', NULL, NULL, '2000-12-13 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:30:38', NULL, NULL, NULL, NULL),
('B18DCQT001', 'ANH', 'DƯ THỊ NGỌC ', 'Nữ', 'D18CQQT01-B', 'Hà Nội', NULL, NULL, '2000-01-15 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:37:00', NULL, NULL, NULL, NULL),
('B18DCQT002', 'ANH', 'ĐỖ THỊ PHƯƠNG ', 'Nữ', 'D18CQQT02-B', 'Thanh Hoá', NULL, NULL, '2000-12-06 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:14', NULL, NULL, NULL, NULL),
('B18DCQT005', 'ANH', 'L M THỊ HOÀNG ', 'Nữ', 'D18CQQT01-B', 'Thanh Hoá', NULL, NULL, '2000-06-21 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT006', 'ANH', 'MAI QUỲNH ', 'Nữ', 'D18CQQT02-B', 'Hà Nội', NULL, NULL, '2000-12-29 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:14', NULL, NULL, NULL, NULL),
('B18DCQT009', 'ANH', 'NGUYỄN PHƯƠNG ', 'Nữ', 'D18CQQT01-B', 'Hà Nội', NULL, NULL, '2000-09-15 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT010', 'ANH', 'NGUYỄN THỊ LAN ', 'Nữ', 'D18CQQT02-B', 'Hà Nội', NULL, NULL, '2000-01-29 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:14', NULL, NULL, NULL, NULL),
('B18DCQT013', 'ANH', 'NGUYỄN THỊ V N ', 'Nữ', 'D18CQQT01-B', 'Hà Nội', NULL, NULL, '2000-08-02 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT014', 'ANH', 'VŨ HOÀNG ', 'Nam', 'D18CQQT02-B', 'Hà Nội', NULL, NULL, '2000-06-23 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:14', NULL, NULL, NULL, NULL),
('B18DCQT017', 'ANH', 'VŨ VIỆT ', 'Nam', 'D18CQQT01-B', 'Hà Nội', NULL, NULL, '2000-10-19 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT018', 'ÁNH', 'LÊ PHỤNG ', 'Nữ', 'D18CQQT02-B', 'Hà Nội', NULL, NULL, '2000-07-16 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:14', NULL, NULL, NULL, NULL),
('B18DCQT021', 'BÍCH', 'NGUYỄN THỊ ', 'Nữ', 'D18CQQT01-B', 'Nam Định', NULL, NULL, '2000-11-01 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT022', 'BÌNH', 'LƯƠNG THỊ ', 'Nữ', 'D18CQQT02-B', 'Hà Nội', NULL, NULL, '2000-08-23 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:14', NULL, NULL, NULL, NULL),
('B18DCQT025', 'CHƯƠNG', 'GIANG QUỐC ', 'Nam', 'D18CQQT01-B', 'Hà Nội', NULL, NULL, '2000-04-01 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT029', 'DUNG', 'LÊ ', 'Nữ', 'D18CQQT01-B', 'Thanh Hoá', NULL, NULL, '2000-03-25 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT033', 'DŨNG', 'PHẠM ĐỨC ', 'Nam', 'D18CQQT01-B', 'Hà Nội', NULL, NULL, '2000-01-04 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT037', 'ĐANG', 'L M HỮU ', 'Nam', 'D18CQQT01-B', 'Nam Định', NULL, NULL, '2000-08-13 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT041', 'GIANG', 'ĐẶNG THỊ HƯƠNG ', 'Nữ', 'D18CQQT01-B', 'Hà Nội', NULL, NULL, '2000-02-03 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT045', 'HẢI', 'TRẦN NGỌC ', 'Nam', 'D18CQQT01-B', 'Hà Nam', NULL, NULL, '2000-10-14 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT049', 'HẰNG', 'NGUYỄN THỊ ', 'Nữ', 'D18CQQT01-B', 'Hà Nội', NULL, NULL, '2000-09-24 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT053', 'HIỀN', 'NGUYỄN THU ', 'Nữ', 'D18CQQT01-B', 'Hoà Bình', NULL, NULL, '2000-07-05 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT057', 'HOAN', 'NGUYỄN HỮU ', 'Nam', 'D18CQQT01-B', 'Hà Nội', NULL, NULL, '2000-09-21 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT061', 'HỒNG', 'TRẦN THỊ ', 'Nữ', 'D18CQQT01-B', 'Nam Định', NULL, NULL, '2000-12-27 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT065', 'HÙNG', 'HOÀNG MẠNH ', 'Nam', 'D18CQQT01-B', 'Quảng Ninh', NULL, NULL, '2000-07-04 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT069', 'HUYỀN', 'PHẠM THU ', 'Nữ', 'D18CQQT01-B', 'Thái Bình', NULL, NULL, '2000-09-02 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT073', 'HƯƠNG', 'HOÀNG THU ', 'Nữ', 'D18CQQT01-B', 'Thái Nguyên', NULL, NULL, '2000-08-09 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT077', 'HƯƠNG', 'NGUYỄN THỊ ', 'Nữ', 'D18CQQT01-B', 'Vĩnh Phúc', NULL, NULL, '2000-03-20 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT081', 'KHÁNH', 'LÊ ĐINH QUỐC ', 'Nam', 'D18CQQT01-B', 'Hà Nội', NULL, NULL, '2000-10-28 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT085', 'LINH', 'NGUYỄN DUY ', 'Nam', 'D18CQQT01-B', 'Hà Nội', NULL, NULL, '2000-02-10 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT089', 'LINH', 'TRẦN KHÁNH ', 'Nam', 'D18CQQT01-B', 'Phú Thọ', NULL, NULL, '2000-06-14 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT093', 'LU N', 'NGUYỄN VĂN ', 'Nam', 'D18CQQT01-B', 'Bắc Giang', NULL, NULL, '2000-09-13 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT097', 'MAI', 'VŨ THỊ THÚY ', 'Nữ', 'D18CQQT01-B', 'Thái Bình', NULL, NULL, '2000-08-15 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT101', 'MY', 'NGUYỄN THẢO ', 'Nữ', 'D18CQQT01-B', 'Hà Nội', NULL, NULL, '2000-11-14 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT105', 'NGA', 'NGUYỄN THỊ ', 'Nữ', 'D18CQQT01-B', 'Nam Định', NULL, NULL, '2000-06-27 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT109', 'NG N', 'HOÀNG THỊ KIM ', 'Nữ', 'D18CQQT01-B', 'Nam Định', NULL, NULL, '1999-12-31 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT113', 'NGHĨA', 'NGUYỄN TRÍ ', 'Nam', 'D18CQQT01-B', 'Hà Nội', NULL, NULL, '1999-10-08 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT117', 'NGỌC', 'NGUYỄN THỊ MINH ', 'Nữ', 'D18CQQT01-B', 'Bắc Giang', NULL, NULL, '2000-12-15 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT121', 'NHI', 'NGUYỄN NGỌC ', 'Nữ', 'D18CQQT01-B', 'Thanh Hoá', NULL, NULL, '1999-07-04 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT125', 'OANH', 'BÙI THỊ NGỌC ', 'Nữ', 'D18CQQT01-B', 'Nam Định', NULL, NULL, '2000-08-15 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT129', 'PHƯƠNG', 'LÊ THANH ', 'Nữ', 'D18CQQT01-B', 'Hoà Bình', NULL, NULL, '2000-02-23 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT133', 'QUỲNH', 'HÀ LỆ ', 'Nữ', 'D18CQQT01-B', 'Phú Thọ', NULL, NULL, '2000-10-30 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT137', 'TĂNG', 'PHAN NGỌC ', 'Nam', 'D18CQQT01-B', 'Phú Thọ', NULL, NULL, '2000-09-07 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT141', 'TUYẾT', 'ĐỖ THỊ ', 'Nữ', 'D18CQQT01-B', 'Hải Dương', NULL, NULL, '2000-09-12 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT145', 'THÀNH', 'TRẦN CÔNG ', 'Nam', 'D18CQQT01-B', 'Hà Nội', NULL, NULL, '2000-11-10 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT149', 'THẢO', 'TRẦN THỊ PHƯƠNG ', 'Nữ', 'D18CQQT01-B', 'Hà Nội', NULL, NULL, '2000-07-09 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT153', 'THUỶ', 'NGUYỄN THỊ ', 'Nữ', 'D18CQQT01-B', 'Thanh Hoá', NULL, NULL, '2000-01-18 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT157', 'TRANG', 'ĐÀO THU ', 'Nữ', 'D18CQQT01-B', 'Thái Bình', NULL, NULL, '2000-03-15 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT161', 'TRANG', 'TRẦN THỊ HUYỀN ', 'Nữ', 'D18CQQT01-B', 'Nghệ An', NULL, NULL, '2000-01-25 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:13', NULL, NULL, NULL, NULL),
('B18DCQT165', 'TRUNG', 'NGUYỄN ĐÌNH ', 'Nam', 'D18CQQT01-B', 'Quảng Ninh', NULL, NULL, '2000-10-06 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:14', NULL, NULL, NULL, NULL),
('B18DCQT169', 'VIỆT', 'NGUYỄN QUỐC ', 'Nam', 'D18CQQT01-B', 'Hà Nội', NULL, NULL, '2000-12-30 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:14', NULL, NULL, NULL, NULL),
('B18DCQT173', 'YẾN', 'L M NGỌC ', 'Nữ', 'D18CQQT01-B', 'Nam Định', NULL, NULL, '2000-07-26 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:14', NULL, NULL, NULL, NULL),
('B18DCQT177', 'YẾN', 'PHẠM HẢI ', 'Nữ', 'D18CQQT01-B', 'Hà Nội', NULL, NULL, '2000-02-21 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:42:14', NULL, NULL, NULL, NULL),
('B18DCVT001', 'AN', 'NGUYỄN NGỌC ', 'Nam', 'D18CQVT01-B', 'Vĩnh Phúc', NULL, NULL, '2000-08-11 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:53', NULL, NULL, NULL, NULL),
('B18DCVT002', 'AN', 'NGUYỄN TRƯỜNG ', 'Nam', 'D18CQVT02-B', 'Thanh Hoá', NULL, NULL, '2000-09-02 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:54', NULL, NULL, NULL, NULL),
('B18DCVT003', 'AN', 'TÔ ĐÌNH ', 'Nam', 'D18CQVT03-B', 'Hải Dương', NULL, NULL, '2000-12-26 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:55', NULL, NULL, NULL, NULL),
('B18DCVT004', 'ANH', 'CAO THỊ ', 'Nữ', 'D18CQVT04-B', 'Hải Phòng', NULL, NULL, '2000-08-20 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:56', NULL, NULL, NULL, NULL),
('B18DCVT005', 'ANH', 'ĐÀO THỊ NGỌC ', 'Nữ', 'D18CQVT05-B', 'Hà Nội', NULL, NULL, '2000-09-15 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:57', NULL, NULL, NULL, NULL),
('B18DCVT009', 'ANH', 'ĐỖ THỊ PHƯƠNG ', 'Nữ', 'D18CQVT01-B', 'Hà Nội', NULL, NULL, '2000-12-14 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:54', NULL, NULL, NULL, NULL),
('B18DCVT010', 'ANH', 'HOÀNG KỲ ', 'Nam', 'D18CQVT02-B', 'Thái Bình', NULL, NULL, '2000-06-10 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:54', NULL, NULL, NULL, NULL),
('B18DCVT011', 'ANH', 'HOÀNG VIỆT ', 'Nam', 'D18CQVT03-B', 'Hà Nội', NULL, NULL, '2000-02-20 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:55', NULL, NULL, NULL, NULL),
('B18DCVT012', 'ANH', 'HỒ THỊ MINH ', 'Nữ', 'D18CQVT04-B', 'Hà Nam', NULL, NULL, '2000-01-14 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:56', NULL, NULL, NULL, NULL),
('B18DCVT013', 'ANH', 'LÊ TUẤN ', 'Nam', 'D18CQVT05-B', 'Hà Nội', NULL, NULL, '2000-07-18 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:57', NULL, NULL, NULL, NULL),
('B18DCVT017', 'ANH', 'NGUYỄN KHẮC ', 'Nam', 'D18CQVT01-B', 'Thanh Hoá', NULL, NULL, '2000-01-29 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:54', NULL, NULL, NULL, NULL),
('B18DCVT018', 'ANH', 'NGUYỄN NGỌC ', 'Nam', 'D18CQVT02-B', 'Quảng Ninh', NULL, NULL, '2000-02-09 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:54', NULL, NULL, NULL, NULL),
('B18DCVT019', 'ANH', 'NGUYỄN TUẤN ', 'Nam', 'D18CQVT03-B', 'Phú Thọ', NULL, NULL, '2000-11-02 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:55', NULL, NULL, NULL, NULL),
('B18DCVT020', 'ANH', 'NGUYỄN TUẤN ', 'Nam', 'D18CQVT04-B', 'Thái Bình', NULL, NULL, '2000-01-02 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:56', NULL, NULL, NULL, NULL),
('B18DCVT021', 'ANH', 'NGUYỄN THẾ ', 'Nam', 'D18CQVT05-B', 'Sơn La', NULL, NULL, '2000-10-01 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:57', NULL, NULL, NULL, NULL),
('B18DCVT025', 'ANH', 'TRỊNH TUẤN ', 'Nam', 'D18CQVT01-B', 'Hà Nội', NULL, NULL, '2000-04-09 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:54', NULL, NULL, NULL, NULL),
('B18DCVT026', 'ANH', 'VŨ HOÀNG ', 'Nam', 'D18CQVT02-B', 'Hà Nội', NULL, NULL, '2000-07-15 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:54', NULL, NULL, NULL, NULL),
('B18DCVT027', 'ANH', 'VŨ TIẾN ', 'Nam', 'D18CQVT03-B', 'Hà Nội', NULL, NULL, '2000-11-29 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:55', NULL, NULL, NULL, NULL),
('B18DCVT028', 'ANH', 'VŨ VIỆT ', 'Nam', 'D18CQVT04-B', 'Hải Dương', NULL, NULL, '2000-08-18 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:56', NULL, NULL, NULL, NULL),
('B18DCVT029', 'BÁCH', 'CAO XU N ', 'Nam', 'D18CQVT05-B', 'Hà Nội', NULL, NULL, '2000-09-27 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:57', NULL, NULL, NULL, NULL),
('B18DCVT033', 'BẢO', 'NGUYỄN TRUNG ', 'Nam', 'D18CQVT01-B', 'Nam Định', NULL, NULL, '2000-12-27 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:54', NULL, NULL, NULL, NULL),
('B18DCVT034', 'BÁU', 'PHẠM VĂN ', 'Nam', 'D18CQVT02-B', 'Hà Tĩnh', NULL, NULL, '2000-03-27 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:54', NULL, NULL, NULL, NULL),
('B18DCVT035', 'BẰNG', 'NGUYỄN VĂN ', 'Nam', 'D18CQVT03-B', 'Nam Định', NULL, NULL, '2000-03-06 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:55', NULL, NULL, NULL, NULL),
('B18DCVT036', 'BÌNH', 'HOÀNG VĂN ', 'Nam', 'D18CQVT04-B', 'Hà Nam', NULL, NULL, '2000-01-17 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:56', NULL, NULL, NULL, NULL),
('B18DCVT037', 'BÌNH', 'PHẠM NGỌC ', 'Nam', 'D18CQVT05-B', 'Thái Bình', NULL, NULL, '2000-11-04 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:57', NULL, NULL, NULL, NULL),
('B18DCVT041', 'CƯỜNG', 'NGUYỄN MẠNH ', 'Nam', 'D18CQVT01-B', 'Hà Nội', NULL, NULL, '2000-05-31 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:54', NULL, NULL, NULL, NULL),
('B18DCVT042', 'CƯỜNG', 'NGUYỄN MINH ', 'Nam', 'D18CQVT02-B', 'Thanh Hoá', NULL, NULL, '2000-02-03 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:54', NULL, NULL, NULL, NULL),
('B18DCVT043', 'CƯỜNG', 'VŨ ANH ', 'Nam', 'D18CQVT03-B', 'Nghệ An', NULL, NULL, '2000-11-19 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:55', NULL, NULL, NULL, NULL),
('B18DCVT044', 'CHI', 'ĐOÀN THỊ LINH ', 'Nữ', 'D18CQVT04-B', 'Thái Bình', NULL, NULL, '2000-11-03 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:56', NULL, NULL, NULL, NULL),
('B18DCVT045', 'CHÍ', 'HOÀNG MINH ', 'Nam', 'D18CQVT05-B', 'Hà Nội', NULL, NULL, '2000-09-08 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:57', NULL, NULL, NULL, NULL),
('B18DCVT049', 'CHÍNH', 'BÙI QUANG ', 'Nam', 'D18CQVT01-B', 'Hà Nội', NULL, NULL, '2000-02-01 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:54', NULL, NULL, NULL, NULL),
('B18DCVT050', 'CHUNG', 'HOÀNG VĂN ', 'Nam', 'D18CQVT02-B', 'Bắc Giang', NULL, NULL, '2000-10-04 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:54', NULL, NULL, NULL, NULL),
('B18DCVT051', 'CHUNG', 'MAI VĂN ', 'Nam', 'D18CQVT03-B', 'Thái Bình', NULL, NULL, '2000-02-18 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:55', NULL, NULL, NULL, NULL),
('B18DCVT052', 'CHUNG', 'VŨ QUANG ', 'Nam', 'D18CQVT04-B', 'Phú Thọ', NULL, NULL, '2000-10-31 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:56', NULL, NULL, NULL, NULL),
('B18DCVT053', 'D N', 'MAI THẾ ', 'Nam', 'D18CQVT05-B', 'Lào Cai', NULL, NULL, '2000-01-23 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:57', NULL, NULL, NULL, NULL),
('B18DCVT057', 'DŨNG', 'ĐẶNG TIẾN ', 'Nam', 'D18CQVT01-B', 'Hà Giang', NULL, NULL, '2000-09-24 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:54', NULL, NULL, NULL, NULL),
('B18DCVT058', 'DŨNG', 'ĐẶNG VIỆT ', 'Nam', 'D18CQVT02-B', 'Hà Nội', NULL, NULL, '2000-10-18 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:55', NULL, NULL, NULL, NULL),
('B18DCVT059', 'DŨNG', 'ĐINH TIẾN ', 'Nam', 'D18CQVT03-B', 'Phú Thọ', NULL, NULL, '1996-07-27 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:55', NULL, NULL, NULL, NULL),
('B18DCVT060', 'DŨNG', 'ĐỖ VĂN ', 'Nam', 'D18CQVT04-B', 'Thanh Hoá', NULL, NULL, '2000-10-25 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:56', NULL, NULL, NULL, NULL),
('B18DCVT061', 'DŨNG', 'HOÀNG TRUNG ', 'Nam', 'D18CQVT05-B', 'Hà Nội', NULL, NULL, '2000-09-08 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:57', NULL, NULL, NULL, NULL),
('B18DCVT065', 'DŨNG', 'NGUYỄN SỸ ', 'Nam', 'D18CQVT01-B', 'Nghệ An', NULL, NULL, '2000-01-14 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:54', NULL, NULL, NULL, NULL),
('B18DCVT066', 'DŨNG', 'NGUYỄN TIẾN ', 'Nam', 'D18CQVT02-B', 'Cao Bằng', NULL, NULL, '2000-03-09 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:55', NULL, NULL, NULL, NULL),
('B18DCVT067', 'DŨNG', 'NGUYỄN TIẾN ', 'Nam', 'D18CQVT03-B', 'Nam Định', NULL, NULL, '2000-01-17 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:55', NULL, NULL, NULL, NULL),
('B18DCVT068', 'DUY', 'NGUYỄN ĐỨC ', 'Nam', 'D18CQVT04-B', 'Nam Định', NULL, NULL, '2000-06-14 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:56', NULL, NULL, NULL, NULL),
('B18DCVT069', 'DUY', 'NGUYỄN KHƯƠNG ', 'Nam', 'D18CQVT05-B', 'Bắc Giang', NULL, NULL, '2000-03-04 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:57', NULL, NULL, NULL, NULL),
('B18DCVT073', 'DƯƠNG', 'ĐINH VĂN ', 'Nam', 'D18CQVT01-B', 'Nam Định', NULL, NULL, '2000-08-06 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:54', NULL, NULL, NULL, NULL),
('B18DCVT074', 'DƯƠNG', 'LÊ THÀNH ', 'Nam', 'D18CQVT02-B', 'Hà Nội', NULL, NULL, '2000-06-24 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:55', NULL, NULL, NULL, NULL),
('B18DCVT075', 'DƯƠNG', 'NGUYỄN THẾ ', 'Nam', 'D18CQVT03-B', 'Hải Phòng', NULL, NULL, '2000-05-10 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:55', NULL, NULL, NULL, NULL),
('B18DCVT076', 'ĐẠI', 'NGUYỄN ĐỨC ', 'Nam', 'D18CQVT04-B', 'Hà Nội', NULL, NULL, '2000-09-07 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:56', NULL, NULL, NULL, NULL),
('B18DCVT077', 'ĐẠI', 'NGUYỄN VĂN ', 'Nam', 'D18CQVT05-B', 'Hà Nội', NULL, NULL, '2000-09-21 17:00:00', '$2y$10$Mpnyn1vh4kZ.dKB9RyWOIuOgPuzDFaBaFmin2lO5NGiQH/36ubMiK', 0, 1, '2021-11-11 14:38:57', NULL, NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `register_subject`
--
ALTER TABLE `register_subject`
  ADD PRIMARY KEY (`userId`,`subjectSemesterId`),
  ADD KEY `register_subject_ibfk_1` (`subjectSemesterId`);

--
-- Chỉ mục cho bảng `semester_tbl`
--
ALTER TABLE `semester_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `subject_semester`
--
ALTER TABLE `subject_semester`
  ADD PRIMARY KEY (`id`),
  ADD KEY `semesterId` (`semesterId`,`subjectId`) USING BTREE,
  ADD KEY `subject_semester_ibfk_2` (`subjectId`);

--
-- Chỉ mục cho bảng `subject_tbl`
--
ALTER TABLE `subject_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_semester`
--
ALTER TABLE `user_semester`
  ADD PRIMARY KEY (`semesterId`,`userId`),
  ADD KEY `user_semester_ibfk_2` (`userId`);

--
-- Chỉ mục cho bảng `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phoneNumber` (`phoneNumber`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `subject_semester`
--
ALTER TABLE `subject_semester`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `register_subject`
--
ALTER TABLE `register_subject`
  ADD CONSTRAINT `register_subject_ibfk_1` FOREIGN KEY (`subjectSemesterId`) REFERENCES `subject_semester` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `register_subject_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `subject_semester`
--
ALTER TABLE `subject_semester`
  ADD CONSTRAINT `subject_semester_ibfk_1` FOREIGN KEY (`semesterId`) REFERENCES `semester_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_semester_ibfk_2` FOREIGN KEY (`subjectId`) REFERENCES `subject_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `user_semester`
--
ALTER TABLE `user_semester`
  ADD CONSTRAINT `user_semester_ibfk_1` FOREIGN KEY (`semesterId`) REFERENCES `semester_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_semester_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
