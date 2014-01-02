-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2014 at 10:55 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shop_phone`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`c_id`),
  KEY `status` (`status`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `name`, `parent_id`, `status`) VALUES
(1, 'Featured phones', 0, 1),
(2, 'Smart phones', 0, 1),
(4, 'Accessories', 0, 1),
(5, 'Sales', 1, 1),
(8, 'Sales', 2, 1),
(9, 'Android', 12, 1),
(10, 'iOS', 12, 1),
(12, 'Main stream', 2, 1),
(13, 'Sale', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cat_and_pro`
--

CREATE TABLE IF NOT EXISTS `cat_and_pro` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NOT NULL,
  PRIMARY KEY (`p_id`,`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

--
-- Dumping data for table `cat_and_pro`
--

INSERT INTO `cat_and_pro` (`p_id`, `c_id`) VALUES
(2, 1),
(2, 2),
(2, 5),
(4, 1),
(4, 2),
(4, 5),
(4, 8),
(5, 1),
(5, 4),
(5, 8),
(5, 9),
(5, 10),
(5, 12),
(5, 13),
(6, 1),
(6, 2),
(6, 4),
(6, 5),
(6, 8),
(6, 9),
(6, 10),
(6, 12),
(6, 13),
(7, 1),
(7, 2),
(7, 4),
(7, 5),
(7, 8),
(7, 9),
(7, 10),
(7, 12),
(7, 13),
(8, 1),
(8, 2),
(8, 12),
(9, 1),
(9, 2),
(9, 12),
(11, 1),
(11, 2),
(11, 4),
(11, 5),
(11, 8),
(11, 9),
(11, 10),
(11, 12),
(11, 13),
(15, 1),
(15, 2),
(15, 12),
(18, 1),
(18, 2),
(18, 4),
(18, 5),
(18, 8),
(18, 9),
(18, 10),
(18, 12),
(18, 13),
(19, 1),
(19, 2),
(19, 4),
(19, 5),
(19, 8),
(19, 9),
(19, 10),
(19, 12),
(19, 13),
(20, 1),
(20, 2),
(20, 4),
(20, 5),
(20, 8),
(20, 9),
(20, 10),
(20, 12),
(20, 13),
(29, 4),
(29, 10),
(30, 1),
(30, 2),
(30, 4),
(30, 5),
(30, 8),
(30, 9),
(30, 10),
(30, 12),
(30, 13);

-- --------------------------------------------------------

--
-- Table structure for table `maker`
--

CREATE TABLE IF NOT EXISTS `maker` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `maker`
--

INSERT INTO `maker` (`m_id`, `name`) VALUES
(0, 'other'),
(1, 'Nokia'),
(2, 'Apple'),
(3, 'Samsung');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `status` smallint(6) NOT NULL DEFAULT '1',
  `thumb` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `selected` int(11) DEFAULT '0',
  `m_id` int(11) DEFAULT '0',
  PRIMARY KEY (`p_id`),
  KEY `name` (`name`),
  KEY `price` (`price`),
  KEY `status` (`status`),
  KEY `selected` (`selected`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `name`, `price`, `description`, `quantity`, `status`, `thumb`, `selected`, `m_id`) VALUES
(2, '<b>jjjjjjjjj</b>', '0.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 0, 1, 'public/backend/images/aa.jpg', 1, 0),
(3, 'pro3', '231.16', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 1212, 1, 'public/backend/images/aa.jpg', 5, 0),
(4, 'Pro 0003', '13.16', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 121, 1, 'public/backend/images/aa.jpg', 0, 3),
(5, 'pro4', '21.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 121, 1, 'public/backend/images/aa.jpg', 4, 3),
(6, 'Pro 6', '54.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 54, 1, 'public/backend/images/aa.jpg', 5, 2),
(7, 'sdd', '0.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 1, 1, 'public/backend/images/aa.jpg', 0, 1),
(8, 'Nokia lumia', '123.00', '<p>Lumia 520 sẽ nằm trong ph&acirc;n kh&uacute;c smartphone tầm trung b&igrave;nh thấp với m&agrave;n h&igrave;nh 4 inch d&ugrave;ng c&ocirc;ng nghệ Super Sensitive Touch (cho ph&eacute;p người d&ugrave;ng thao t&aacute;c bằng cả găng tay d&agrave;y), chip l&otilde;i k&eacute;p tốc độ 1 GHz, RAM 512 MB v&agrave; dung lượng lưu trữ trong 8 GB. Lumia 520 hỗ trợ khe cắm thẻ nhớ ngo&agrave;i, camera sau 5 megapixel v&agrave; kh&ocirc;ng c&oacute; camera trước. Trong khi đ&oacute;, Lumia 720 sở hữu cấu h&igrave;nh gần như tương đồng với Lumia 520 nhưng d&ugrave;ng camera sau 6 megapixel, m&agrave;n h&igrave;nh 4,3 inch v&agrave; được t&iacute;ch hợp camera 2 megapixel ph&iacute;a trước.</p>\r\n', 123, 1, 'public/backend/images/aa.jpg', 0, 3),
(9, 'pro 8', '23.00', 'The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone''s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3. ', 12, 1, 'public/backend/images/aa.jpg', 0, 2),
(11, 'Pro1324', '3232.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 21, 1, 'public/backend/images/aa.jpg', 2, 2),
(13, 'Nokia lumia 43', '21.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 21, 1, 'public/backend/images/aa.jpg', 0, 3),
(14, 'Nokia lumia 3213', '34.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 2121, 1, 'public/backend/images/aa.jpg', 0, 3),
(15, 'Nokia lumia232', '332.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 32, 1, 'public/backend/images/aa.jpg', 0, 3),
(16, 'Nokia lumia43t', '33.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 43, 1, 'public/backend/images/aa.jpg', 0, 3),
(17, 'Nokia lumia45465', '54.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 12, 1, 'public/backend/images/aa.jpg', 0, 3),
(18, 'Nokia lumia545', '3232.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 23, 1, 'public/backend/images/aa.jpg', 0, 1),
(19, 'Nokia lumia32r', '3232.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 32, 1, 'public/backend/images/aa.jpg', 0, 0),
(20, 'Nokia lumia32r', '3232.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 0, 1, 'public/backend/images/aa.jpg', 0, 3),
(21, 'Nokia lumia56', '32.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 0, 1, 'public/backend/images/aa.jpg', 0, 1),
(22, 'Nokia lumia4535', '35.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 0, 1, 'public/backend/images/aa.jpg', 0, 1),
(23, 'Nokia lumia th', '32.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 12, 1, 'public/backend/images/aa.jpg', 0, 1),
(24, 'Nokia lumia 3234', '345.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 12, 1, 'public/backend/images/aa.jpg', 0, 2),
(25, 'Nokia lumia32t', '34.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 0, 1, 'public/backend/images/aa.jpg', 0, 2),
(26, 'Nokia lumia32ghh', '12.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 12, 1, 'public/backend/images/aa.jpg', 0, 2),
(27, 'pro999999', '12.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 12, 1, 'public/backend/images/aa.jpg', 0, 1),
(28, 'hghghgh', '12.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 1223, 1, 'public/backend/images/aa.jpg', 0, 2),
(29, 'hghghgh', '12.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 1223, 1, 'public/backend/images/aa.jpg', 0, 1),
(30, 'hihi', '12.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 212, 1, 'public/backend/images/aa.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(5) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`role_id`),
  KEY `status` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `name`, `status`) VALUES
(1, 'users', 1),
(4, 'role', 1),
(5, 'admin', 1),
(6, 'maker', 1),
(8, 'product', 1),
(9, 'category', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role_and_user`
--

CREATE TABLE IF NOT EXISTS `role_and_user` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_and_user`
--

INSERT INTO `role_and_user` (`user_id`, `role_id`) VALUES
(1, 4),
(1, 5),
(8, 9),
(9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`),
  KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `full_name`, `status`) VALUES
(1, 'binhpt', '12345678', 'Phan The Binh', 1),
(8, '<b>binhpt</b>', '123456', '<b>Phan The Binh</b>', 1),
(9, 'aaa@hhh.com', '123456', 'aaa', 1),
(10, 'fff@gmail.com', '12345', 'Binh', 1),
(11, 'fffh@gmail.com', '12345678', 'Phan The Binh', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
