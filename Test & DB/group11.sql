-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 27, 2017 at 07:58 PM
-- Server version: 5.7.17-log
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `group11`
--

-- --------------------------------------------------------

--
-- Table structure for table `donate`
--

CREATE TABLE `donate` (
  `donate_id` int(11) NOT NULL,
  `donate_name` varchar(45) NOT NULL,
  `donate_description` varchar(200) DEFAULT NULL,
  `donate_detail` varchar(100) DEFAULT NULL,
  `donate_date` datetime DEFAULT NULL,
  `donate_height` varchar(45) DEFAULT NULL,
  `donate_length` varchar(45) DEFAULT NULL,
  `donate_width` varchar(45) DEFAULT NULL,
  `donate_weight` varchar(45) DEFAULT NULL,
  `donate_amount` varchar(45) DEFAULT NULL,
  `donate_image` varchar(45) DEFAULT NULL,
  `donatetype_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donate`
--

INSERT INTO `donate` (`donate_id`, `donate_name`, `donate_description`, `donate_detail`, `donate_date`, `donate_height`, `donate_length`, `donate_width`, `donate_weight`, `donate_amount`, `donate_image`, `donatetype_id`, `user_id`) VALUES
(1, 'name', 'description', 'detail', '2017-03-24 14:14:38', NULL, NULL, NULL, 'weight', 'amount', 'WS201490361278', 5, 20),
(2, 'name', 'description', 'detail', '2017-03-24 14:20:32', NULL, NULL, NULL, 'weight', 'amount', 'WS201490361632.gif', 6, 20),
(3, 'น่ารัก', 'descriptionมาก', 'detail', '2017-03-24 14:28:18', NULL, NULL, NULL, 'weight', 'amount', 'WS201490362098.jpg', 6, 20),
(4, 'เย้ๆ', 'รายละเอียด', 'รักเลย', '2017-03-24 15:17:03', NULL, NULL, NULL, 'บวก', 'ง่อว', 'WS201490365023.jpg', 6, 20),
(5, 'name', 'description', 'detail', '2017-03-24 15:21:24', NULL, NULL, NULL, 'weight', 'amount', 'WS201490365284.gif', 6, 20),
(6, 'name', 'description', 'detail', '2017-03-24 15:24:26', NULL, NULL, NULL, 'weight', 'amount', 'WS201490365466.png', 8, 20),
(7, 'name', 'description', 'detail', '2017-03-25 14:07:05', NULL, NULL, NULL, 'weight', 'amount', 'WS201490447225.png', 6, 20),
(8, 'this', 'is', 'small', '2017-03-26 15:15:13', NULL, NULL, NULL, '1', '2', 'WS201490534113.png', 6, 20),
(9, 'zzzz', 'cccc', 'xxxx', '2017-03-27 18:46:16', '21', '4444', '333', '13', '2', 'WS201490633176.png', 5, 20),
(10, 'zzzz', 'cccc', 'xxxx', '2017-03-27 18:46:37', '21', '4444', '333', '13', '2', 'WS201490633197.png', 5, 20),
(11, 'zzzz', 'cccc', 'xxxx', '2017-03-27 18:48:55', '21', '4444', '333', '13', '2', 'WS201490633335.png', 5, 20),
(12, 'ของสิ่งนี้', 'นะจ่ะ', 'คือของเล่น', '2017-03-27 19:05:11', '18', '13', '13', '40', '4', 'WS201490634311.png', 6, 20);

-- --------------------------------------------------------

--
-- Table structure for table `donatetype`
--

CREATE TABLE `donatetype` (
  `type_id` int(11) NOT NULL,
  `type_name_en` varchar(45) NOT NULL,
  `type_name_th` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donatetype`
--

INSERT INTO `donatetype` (`type_id`, `type_name_en`, `type_name_th`) VALUES
(5, 'บริจาค1', 'Donate1'),
(6, 'บริจาค2', 'Donate2'),
(7, 'บริจาค3', 'Donate3'),
(8, 'บริจาค4', 'Donate4');

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE `picture` (
  `pic_id` int(11) NOT NULL,
  `pic_name` varchar(45) COLLATE armscii8_bin NOT NULL,
  `pic_created` datetime NOT NULL,
  `donate_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `prefix`
--

CREATE TABLE `prefix` (
  `prefix_id` int(11) NOT NULL,
  `prefix_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prefix`
--

INSERT INTO `prefix` (`prefix_id`, `prefix_name`) VALUES
(4, 'นาย'),
(5, 'นาง'),
(6, 'นางสาว'),
(7, 'เด็กชาย'),
(8, 'เด็กหญิง');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `question_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `question_name`) VALUES
(3, 'โดยส่วนตัวแล้วคุณคิดว่าตัวเองน่ารักมากแค่ไหน'),
(4, 'ถ้าคุณถูกลอตเตอรี่สามล้าน คุณจะบอกบอกคนอื่นหรือไม่'),
(5, 'คุณเกิดวันที่เท่าไหร่'),
(6, 'ถนนบ้านเกิดของคุณชื่อว่าอะไร'),
(7, 'สัตว์เลี้ยงตัวแรกของคุณชื่อว่าอะไร'),
(8, 'คุณเป็นคนใช่หรือไม่'),
(9, 'ถ้าวันนี้คุณเจอคนที่คุณชอบ คุณจะบอกเขาว่าอะไร');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(45) NOT NULL,
  `prefix_id` int(11) NOT NULL,
  `user_password` varchar(150) NOT NULL,
  `user_fname` varchar(45) NOT NULL,
  `user_lname` varchar(45) NOT NULL,
  `user_idno` char(13) NOT NULL,
  `user_address` varchar(150) NOT NULL,
  `user_tel` char(10) NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_answer` varchar(45) NOT NULL,
  `user_type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `prefix_id`, `user_password`, `user_fname`, `user_lname`, `user_idno`, `user_address`, `user_tel`, `question_id`, `user_answer`, `user_type`) VALUES
(20, 'amnat@weshare4u.com', 4, '2af8172b0add87a349bbbf7549568a8d824754109db65ef299d05b818f818024', 'อำนาจ', 'มะธิปิไข', '1231231234567', 'kku123', '0001112223', 3, 'มาก', 1),
(21, 'komkeao@weshare4u.com', 4, '158dc26dd297817226245c3461786ad7611a2e7962296624d7f28ef45ee6a866', 'คมเคียว', 'ตั้งประเสริฐ', '1111113332225', 'kku123', '1112221123', 6, 'kku', 1),
(22, 'rattapong@weshare4u.com', 4, 'dc350bfa798cda14ca549b2b6444e8624ef4d5a0b0ac75740f8b40b460e3d8a4', 'รัฐพงศ์', 'ทองรักษ์', '1231456745321', 'kku123', '4444444444', 5, 'หนุ่ม', 1),
(23, 'chanatip@weshare4u.com', 4, '66f87a41556619392b81934af58135b8d63863d947c9f2856fa9c772685c67fd', 'ชนาธิป', 'ดวงชาทม', '1212123452225', 'kku123', '4445553345', 5, 'สตางค์', 1),
(24, 'kittiwadee@weshare4u.com', 6, 'c649c87122ea31557fc1afa045dfb0b821ece56073631283647adf6270275da1', 'กิตติวดี', 'ยุระยาตร์', '1231456745321', 'kku123', '4444444444', 5, 'capper', 1),
(25, 'apinya@weshare4u.com', 6, '66bd16054474920be76d3ce910601ff1a2ac89047e8f45773606cfec5a2a3eb1', 'อภิญญา', 'ไชยสัจ', '1212123452225', 'kku123', '4445553345', 5, 'moccy', 1),
(26, 'admin', 4, '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'แอดมิน', 'คนหล่อ', '1231231234567', 'kku123', '0001112223', 3, 'มาก', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donate`
--
ALTER TABLE `donate`
  ADD PRIMARY KEY (`donate_id`,`donatetype_id`,`user_id`),
  ADD KEY `fk_donate_donateType_idx` (`donatetype_id`),
  ADD KEY `fk_donate_user1_idx` (`user_id`);

--
-- Indexes for table `donatetype`
--
ALTER TABLE `donatetype`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`pic_id`,`donate_id`),
  ADD KEY `fk_picture_donate1_idx` (`donate_id`);

--
-- Indexes for table `prefix`
--
ALTER TABLE `prefix`
  ADD PRIMARY KEY (`prefix_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`,`prefix_id`,`question_id`),
  ADD KEY `fk_user_question1_idx` (`question_id`),
  ADD KEY `fk_user_prefix1_idx` (`prefix_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donate`
--
ALTER TABLE `donate`
  MODIFY `donate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `donatetype`
--
ALTER TABLE `donatetype`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `pic_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prefix`
--
ALTER TABLE `prefix`
  MODIFY `prefix_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `donate`
--
ALTER TABLE `donate`
  ADD CONSTRAINT `fk_donate_donateType` FOREIGN KEY (`donatetype_id`) REFERENCES `donatetype` (`type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_donate_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `fk_picture_donate1` FOREIGN KEY (`donate_id`) REFERENCES `donate` (`donate_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_prefix1` FOREIGN KEY (`prefix_id`) REFERENCES `prefix` (`prefix_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_question1` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
