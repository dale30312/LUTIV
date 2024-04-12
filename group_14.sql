-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2019-06-11 18:12:51
-- 伺服器版本： 10.1.38-MariaDB
-- PHP 版本： 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `group_14`
--
DROP DATABASE IF EXISTS `group_14`;
CREATE DATABASE IF NOT EXISTS `group_14` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci;
USE `group_14`;

-- --------------------------------------------------------

--
-- 資料表結構 `board`
--

DROP TABLE IF EXISTS `board`;
CREATE TABLE `board` (
  `message_id` int(10) NOT NULL,
  `item_id` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `item_type` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `item_img` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `item_name` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `item_price` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `account` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `content` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- 傾印資料表的資料 `board`
--

INSERT INTO `board` (`message_id`, `item_id`, `item_type`, `item_img`, `item_name`, `item_price`, `account`, `content`) VALUES
(2, 'Shirt_01', '休閒襯衫', 'images/shirt1.jpg', '棉麻短袖襯衫', 'NT$ 399 活動價NT$ 350', '訪客', '真的很棒1'),
(3, 'Shortku_01', '短褲', 'images/shortku1.jpg', '休閒海灘褲', 'NT$ 399   活動價NT$ 390', '訪客', 'NICE');

-- --------------------------------------------------------

--
-- 資料表結構 `item_basis`
--

DROP TABLE IF EXISTS `item_basis`;
CREATE TABLE `item_basis` (
  `item_cart_id` int(10) NOT NULL,
  `item_id` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `item_type` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `item_img` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `item_img_1` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `item_img_2` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `item_name` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `item_price` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `saleout` int(50) NOT NULL,
  `activity` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- 傾印資料表的資料 `item_basis`
--

INSERT INTO `item_basis` (`item_cart_id`, `item_id`, `item_type`, `item_img`, `item_img_1`, `item_img_2`, `item_name`, `item_price`, `saleout`, `activity`) VALUES
(1, 'Coat_01', '外套', 'images/coat1.jpg', 'images/coat1_1.jpg', 'images/coat1_2.jpg', '輕型連帽外套', 'NT$ 399   活動價NT$ 390', 9, 'prompt1'),
(2, 'Coat_02', '外套\r\n', 'images/coat2.jpg', 'images/coat2_1.jpg', 'images/coat2_2.jpg', '飛行外套', 'NT$ 790   活動價NT$ 680', 15, 'prompt1'),
(3, 'Coat_03', '外套', 'images/coat3.jpg', 'images/coat3_1.jpg', 'images/coat3_2.jpg', '連帽軍裝外套', 'NT$ 990   活動價NT$ 680', 4, 'prompt1'),
(4, 'Coat_04', '外套', 'images/coat4.jpg', 'images/coat4_1.jpg', 'images/coat4_2.jpg', '毛圈休閒連帽外套', 'NT$ 690   活動價NT$ 450', 7, 'prompt1'),
(5, 'Coat_05', '外套', 'images/coat5.jpg', 'images/coat5_1.jpg', 'images/coat5_2.jpg', '牛仔外套', 'NT$ 890   活動價NT$ 790', 15, 'prompt1'),
(6, 'Hoodie_01', '厚棉系列', 'images/hoodie1.jpg', 'images/hoodie1_1.jpg', 'images/hoodie1_2.jpg', '刷毛連帽上衣', 'NT$ 590 活動價NT$ 399', 12, 'prompt1'),
(7, 'Hoodie_02', '厚棉系列', 'images/hoodie2.jpg', 'images/hoodie2_1.jpg', 'images/hoodie2_2.jpg', '毛絨連帽外套', 'NT$ 790 活動價NT$ 590', 16, 'prompt1'),
(8, 'Jeans_01', '牛仔褲', 'images/jeans1.jpg', 'images/jeans1_1.jpg', 'images/jeans1_2.jpg', 'Slim Fit 修身直筒牛仔褲', 'NT$590', 5, ''),
(9, 'Jeans_02', '牛仔褲', 'images/jeans2.jpg', 'images/jeans2_1.jpg', 'images/jeans2_2.jpg', 'Regular Fit 直筒牛仔褲', 'NT$590', 8, ''),
(10, 'Jeans_03', '牛仔褲', 'images/jeans3.jpg', 'images/jeans3_1.jpg', 'images/jeans3_2.jpg', '牛仔束口褲', 'NT$ 590   活動價NT$ 550', 14, 'prompt4'),
(11, 'Long_01', '七分 / 長袖', 'images/long1.jpg', 'images/long1_1.jpg', 'images/long1_2.jpg', '棉V領長袖T恤', 'NT$ 290   活動價NT$ 190', 9, ''),
(12, 'Long_02', '七分 / 長袖', 'images/long2.jpg', 'images/long2_1.jpg', 'images/long2_2.jpg', '純棉條紋圓領長袖上衣', 'NT$ 490   活動價NT$ 249', 15, ''),
(13, 'Long_03', '七分 / 長袖', 'images/long3.jpg', 'images/long3_1.jpg', 'images/long3_2.jpg', 'Fleece立領上衣', 'NT$ 290   活動價NT$ 190', 24, ''),
(14, 'Pants_01', '長褲', 'images/pants1.jpg', 'images/pants1_1.jpg', '   images/pants1_2.jpg', '復古Regular Fit無褶卡其褲', 'NT$590', 16, ''),
(15, 'Pants_02', '長褲', 'images/pants2.jpg', '  images/pants2_1.jpg', '   images/pants2_2.jpg', '輕便九分褲', 'NT$ 690   活動價NT$ 490', 8, 'prompt4'),
(16, 'Pants_03', '長褲', 'images/pants3.jpg', '  images/pants3_1.jpg', 'images/pants3_2.jpg', '彈性束口褲', 'NT$ 590   活動價NT$ 550', 19, 'prompt4'),
(17, 'Pants_04', '長褲', 'images/pants4.jpg', '  images/pants4_1.jpg', 'images/pants4_2.jpg', '棉質束口褲', 'NT$ 590   活動價NT$ 550', 12, 'prompt1'),
(18, 'Pants_05', '長褲', 'images/pants5.jpg', '  images/pants5_1.jpg', 'images/pants5_2.jpg', '工作束口褲', 'NT$ 590   活動價NT$ 550', 7, 'prompt4'),
(19, 'Pants_06', '長褲', 'images/pants6.jpg', '  images/pants6_1.jpg', 'images/pants6_2.jpg', '吸排彈性加厚休閒長褲', 'NT$590', 17, ''),
(20, 'Pants_07', '長褲', 'images/pants7.jpg', '  images/pants7_1.jpg', 'images/pants7_2.jpg', '棉質束口工作褲', 'NT$ 690   活動價NT$ 650', 6, 'prompt1'),
(21, 'Polo_01', 'Polo衫', 'images/POLO1.jpg', 'images/POLO1_1.jpg', 'images/POLO1_2.jpg', '快乾網眼徽章polo衫', 'NT$ 399   活動價NT$ 390', 9, 'prompt4'),
(22, 'Polo_02', 'Polo衫', 'images/POLO2.jpg', 'images/POLO2_1.jpg', 'images/POLO2_2.jpg', '快乾網眼polo衫', 'NT$ 390   活動價NT$ 195', 0, 'prompt4'),
(23, 'Saleshirt_01', '商務襯衫', 'images/saleshirt1.jpg', 'images/saleshirt1_1.jpg', 'images/saleshirt1_2.jpg', '商務彈性長袖襯衫', 'NT$490', 4, ''),
(24, 'Saleshirt_02', '商務襯衫', 'images/saleshirt2.jpg', 'images/saleshirt2_1.jpg', 'images/saleshirt2_2.jpg', '商務彈性短袖襯衫', 'NT$399', 7, ''),
(25, 'Shirt_01', '休閒襯衫', 'images/shirt1.jpg', 'images/shirt1_1.jpg', 'images/shirt1_2.jpg', '棉麻短袖襯衫', 'NT$ 399 活動價NT$ 350', 12, 'prompt4'),
(26, 'Shirt_02', '休閒襯衫', 'images/shirt2.jpg', 'images/shirt2_1.jpg', 'images/shirt2_2.jpg', '棉麻長袖襯衫', 'NT$ 490 活動價NT$ 399', 3, 'prompt4'),
(27, 'Shirt_03', '休閒襯衫', 'images/shirt3.jpg', 'images/shirt3_1.jpg', 'images/shirt3_2.jpg', '牛仔雙口袋襯衫', 'NT$ 490 活動價NT$ 399', 9, 'prompt1'),
(28, 'Shirt_04', '休閒襯衫', 'images/shirt4.jpg', 'images/shirt4_1.jpg', 'images/shirt4_2.jpg', '牛仔短袖襯衫', 'NT$ 399 活動價NT$ 390', 0, 'prompt4'),
(29, 'Shortku_01', '短褲', 'images/shortku1.jpg', 'images/shortku1_1.jpg', 'images/shortku1_2.jpg', '休閒海灘褲', 'NT$ 399   活動價NT$ 390', 6, 'prompt5'),
(30, 'Shortku_02', '短褲', 'images/shortku2.jpg', 'images/shortku2_1.jpg', 'images/shortku2_2.jpg', '輕便短褲', 'NT$299', 0, ''),
(31, 'Shortku_03', '短褲', 'images/shortku3.jpg', 'images/shortku3_1.jpg', 'images/shortku3_2.jpg', '五分卡其褲', 'NT$ 399   活動價NT$ 299', 3, 'prompt4'),
(32, 'Shortku_04', '短褲', 'images/shortku4.jpg', 'images/shortku4_1.jpg', 'images/shortku4_2.jpg', '牛仔短褲', 'NT$490', 16, ''),
(33, 'Shortku_05', '短褲', 'images/shortku5.jpg', 'images/shortku5_1.jpg', 'images/shortku5_2.jpg', '吸排運動褲', 'NT$ 399   活動價NT$ 350', 0, 'prompt5'),
(34, 'Shorts_01', '短袖 / 背心', 'images/short1.jpg', 'images/short1_1.jpg', 'images/short1_2.jpg', '棉圓領T恤', 'NT$ 290   活動價NT$ 145', 11, 'prompt5'),
(35, 'Shorts_02', '短袖 / 背心', 'images/short2.jpg', 'images/short2_1.jpg', 'images/short2_2.jpg', '快乾棉羅紋背心', 'NT$ 290   活動價NT$ 145', 15, 'prompt5'),
(36, 'Shorts_03', '短袖 / 背心', 'images/short3.jpg', 'images/short3_1.jpg', 'images/short3_2.jpg', '快乾棉圓領T恤', 'NT$ 149   活動價NT$ 145', 8, 'prompt5'),
(37, 'Shorts_04', '短袖 / 背心', 'images/short4.jpg', 'images/short4_1.jpg', 'images/short4_2.jpg', '竹節棉口袋短袖T恤', 'NT$ 299   活動價NT$ 290', 20, 'prompt4'),
(38, 'Shorts_05', '短袖 / 背心', 'images/short5.jpg', 'images/short5_1.jpg', 'images/short5_2.jpg', '竹節棉配色T恤', 'NT$299', 16, ''),
(39, 'Shorts_06', '短袖 / 背心', 'images/short6.jpg', 'images/short6_1.jpg', 'images/short6_2.jpg', '純棉寬版條紋T恤', 'NT$ 490   活動價NT$ 260', 7, 'prompt4'),
(40, 'Shorts_07', '短袖 / 背心', 'images/short7.jpg', 'images/short7_1.jpg', 'images/short7_2.jpg', '輕涼圓領短袖T恤', 'NT$ 199   活動價NT$ 190', 1, 'prompt5'),
(41, 'Shorts_08', '短袖 / 背心', 'images/short8.jpg', 'images/short8_1.jpg', 'images/short8_2.jpg', '吸排短袖T恤', 'NT$ 299   活動價NT$ 249', 14, 'prompt5'),
(42, 'Shorts_09', '短袖 / 背心', 'images/short9.jpg', 'images/short9_1.jpg', 'images/short9_2.jpg', '吸排彈性加厚圓領短袖T恤', 'NT$ 390   活動價NT$ 249', 8, 'prompt5');

-- --------------------------------------------------------

--
-- 資料表結構 `item_element`
--

DROP TABLE IF EXISTS `item_element`;
CREATE TABLE `item_element` (
  `source` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `material` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- 傾印資料表的資料 `item_element`
--

INSERT INTO `item_element` (`source`, `material`) VALUES
('中國', '棉100%');

-- --------------------------------------------------------

--
-- 資料表結構 `item_model_report`
--

DROP TABLE IF EXISTS `item_model_report`;
CREATE TABLE `item_model_report` (
  `model` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `height` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `weight` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `shoulder` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `chest` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `model_size` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- 傾印資料表的資料 `item_model_report`
--

INSERT INTO `item_model_report` (`model`, `height`, `weight`, `shoulder`, `chest`, `model_size`) VALUES
('A', '165', '47', '40', '82', 'S'),
('B', '151', '58', '39', '88', 'L'),
('C', '151', '48', '35', '81', 'M'),
('D', '152', '66', '39', '99', 'XL'),
('E', '153', '70', '40', '108', 'XXL'),
('F', '155', '49', '37', '78', 'S'),
('G', '160', '54', '39', '86', 'M'),
('H', '161', '62', '38', '92', 'L'),
('I', '163', '53', '40', '83', 'M'),
('J', '163', '80', '42', '109', 'XL'),
('K', '163', '50', '39', '83', 'S'),
('L', '165', '70', '41', '96', 'L'),
('M', '165', '87', '42', '115', 'XXL'),
('N', '167', '62', '40', '87', 'L'),
('O', '168', '50', '38', '82', 'S'),
('P', '170', '55', '38', '82', 'M'),
('Q', '176', '75', '41', '93', 'XL');

-- --------------------------------------------------------

--
-- 資料表結構 `item_shopcar`
--

DROP TABLE IF EXISTS `item_shopcar`;
CREATE TABLE `item_shopcar` (
  `id` int(10) NOT NULL,
  `member` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `car_item` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `car_size` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `car_num` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- 傾印資料表的資料 `item_shopcar`
--

INSERT INTO `item_shopcar` (`id`, `member`, `car_item`, `car_size`, `car_num`) VALUES
(4, 'member', 'Coat_01', 'XL', '1'),
(5, 'member', 'Coat_03', 'XL', '1'),
(7, 'dale30312', 'Shorts_02', 'XL', '1'),
(8, 'dale30312', 'Shorts_02', 'XL', '1'),
(9, 'dale30312', 'Shirt_02', 'XXL', '1');

-- --------------------------------------------------------

--
-- 資料表結構 `item_sizeform`
--

DROP TABLE IF EXISTS `item_sizeform`;
CREATE TABLE `item_sizeform` (
  `size` varchar(5) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `shoulder` varchar(5) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `chest` varchar(5) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `sleeve` varchar(5) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `length` varchar(5) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- 傾印資料表的資料 `item_sizeform`
--

INSERT INTO `item_sizeform` (`size`, `shoulder`, `chest`, `sleeve`, `length`) VALUES
('L', '35.5', '44', '18', '63'),
('M', '34', '41', '17', '61'),
('S', '33', '38', '17', '59'),
('XL', '37', '47', '18.5', '65'),
('XXL', '38', '50', '19', '67.5');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `account` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `pw` varchar(12) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `mail` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `type` varchar(8) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`account`, `pw`, `phone`, `mail`, `type`) VALUES
('admin', 'admin123456', 'none', 'none', 'admin'),
('dale30312', 'dale123456', '098777777', 'dale123@gmail.com', 'member'),
('dale50709', '123456567', '0123456789', 'dale1230@gmail.com', 'member'),
('member', 'member123456', 'none', 'none', 'member');

-- --------------------------------------------------------

--
-- 資料表結構 `order123`
--

DROP TABLE IF EXISTS `order123`;
CREATE TABLE `order123` (
  `order_id` int(10) NOT NULL,
  `buy_item` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `buy_mem` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `buy_size` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `buy_num` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- 傾印資料表的資料 `order123`
--

INSERT INTO `order123` (`order_id`, `buy_item`, `buy_mem`, `buy_size`, `buy_num`) VALUES
(6, 'Shorts_03', 'dale30312', 'M', '11');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`message_id`);

--
-- 資料表索引 `item_basis`
--
ALTER TABLE `item_basis`
  ADD KEY `item_cart_id` (`item_cart_id`);

--
-- 資料表索引 `item_element`
--
ALTER TABLE `item_element`
  ADD PRIMARY KEY (`source`);

--
-- 資料表索引 `item_model_report`
--
ALTER TABLE `item_model_report`
  ADD PRIMARY KEY (`model`);

--
-- 資料表索引 `item_shopcar`
--
ALTER TABLE `item_shopcar`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `item_sizeform`
--
ALTER TABLE `item_sizeform`
  ADD PRIMARY KEY (`size`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`account`);

--
-- 資料表索引 `order123`
--
ALTER TABLE `order123`
  ADD PRIMARY KEY (`order_id`);

--
-- 在傾印的資料表使用自動增長(AUTO_INCREMENT)
--

--
-- 使用資料表自動增長(AUTO_INCREMENT) `board`
--
ALTER TABLE `board`
  MODIFY `message_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `item_basis`
--
ALTER TABLE `item_basis`
  MODIFY `item_cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `item_shopcar`
--
ALTER TABLE `item_shopcar`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
