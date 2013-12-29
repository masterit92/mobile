-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2013 at 05:19 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

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
(12, 'Main stream', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cat_and_pro`
--

CREATE TABLE IF NOT EXISTS `cat_and_pro` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NOT NULL,
  PRIMARY KEY (`p_id`,`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `cat_and_pro`
--

INSERT INTO `cat_and_pro` (`p_id`, `c_id`) VALUES
(2, 1),
(2, 2),
(2, 12),
(3, 1),
(3, 2),
(3, 12),
(4, 1),
(4, 2),
(4, 8),
(5, 1),
(5, 4),
(5, 9),
(6, 1),
(6, 2),
(6, 8),
(7, 1),
(7, 8),
(7, 9),
(8, 1),
(8, 2),
(8, 12),
(9, 1),
(9, 2),
(9, 12),
(10, 1),
(10, 2),
(10, 4),
(10, 12),
(11, 1),
(11, 8),
(11, 12),
(12, 1),
(12, 8),
(15, 1),
(15, 2),
(15, 12),
(29, 4),
(29, 10),
(30, 4),
(30, 9);

-- --------------------------------------------------------

--
-- Table structure for table `maker`
--

CREATE TABLE IF NOT EXISTS `maker` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `name`, `price`, `description`, `quantity`, `status`, `thumb`, `selected`, `m_id`) VALUES
(2, 'Pro2222', '12.11', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 120, 1, 'public/default_img.gif', 0, 0),
(3, 'pro3', '231.16', 'The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone''s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3. ', 121, 1, 'public/backend/images/aa.jpg', 0, 0),
(4, 'Pro 0003', '12.16', 'The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone''s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3. ', 121, 1, 'public/backend/images/aa.jpg', 3, 3),
(5, 'pro4', '21.00', 'The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone''s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3. ', 121, 1, 'public/backend/images/aa.jpg', 4, 3),
(6, 'Pro 6', '54.00', 'The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone''s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3. ', 54, 1, 'public/backend/images/aa.jpg', 5, 2),
(7, 'sdd', '0.00', 'The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone''s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3. ', 1, 1, 'public/backend/images/aa.jpg', 0, 1),
(8, 'Nokia lumia', '123.00', 'Lumia 520 sẽ nằm trong phân khúc smartphone tầm trung bình thấp với màn hình 4 inch dùng công nghệ Super Sensitive Touch (cho phép người dùng thao tác bằng cả găng tay dày), chip lõi kép tốc độ 1 GHz, RAM 512 MB và dung lượng lưu trữ trong 8 GB. Lumia 520 hỗ trợ khe cắm thẻ nhớ ngoài, camera sau 5 megapixel và không có camera trước. Trong khi đó, Lumia 720 sở hữu cấu hình gần như tương đồng với Lumia 520 nhưng dùng camera sau 6 megapixel, màn hình 4,3 inch và được tích hợp camera 2 megapixel phía trước.', 123, 1, 'public/backend/images/aa.jpg', 0, 3),
(9, 'pro 8', '23.00', 'The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone''s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3. ', 12, 1, 'public/backend/images/aa.jpg', 0, 2),
(10, 'Pro 234', '434.00', 'The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone''s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3. ', 12, 1, 'public/backend/images/aa.jpg', 0, 1),
(11, 'Pro1324', '3232.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 21, 1, 'public/backend/images/aa.jpg', 2, 1),
(12, 'Nokia lumia4354', '43.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 12, 1, 'public/backend/images/aa.jpg', 0, 2),
(13, 'Nokia lumia 43', '21.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 21, 1, 'public/backend/images/aa.jpg', 0, 3),
(14, 'Nokia lumia 3213', '34.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 2121, 1, 'public/backend/images/aa.jpg', 0, 3),
(15, 'Nokia lumia232', '332.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 32, 1, 'public/backend/images/aa.jpg', 0, 3),
(16, 'Nokia lumia43t', '33.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 43, 1, 'public/backend/images/aa.jpg', 0, 3),
(17, 'Nokia lumia45465', '54.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 12, 1, 'public/backend/images/aa.jpg', 0, 3),
(18, 'Nokia lumia545', '32.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 23, 1, 'public/backend/images/aa.jpg', 0, 1),
(19, 'Nokia lumia32r', '43.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 32, 1, 'public/backend/images/aa.jpg', 0, 1),
(20, 'Nokia lumia32r', '0.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 0, 1, 'public/backend/images/aa.jpg', 0, 1),
(21, 'Nokia lumia56', '32.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 0, 1, 'public/backend/images/aa.jpg', 0, 1),
(22, 'Nokia lumia4535', '35.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 0, 1, 'public/backend/images/aa.jpg', 0, 1),
(23, 'Nokia lumia th', '32.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 12, 1, 'public/backend/images/aa.jpg', 0, 1),
(24, 'Nokia lumia 3234', '345.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 12, 1, 'public/backend/images/aa.jpg', 0, 2),
(25, 'Nokia lumia32t', '34.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 0, 1, 'public/backend/images/aa.jpg', 0, 2),
(26, 'Nokia lumia32ghh', '12.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 12, 1, 'public/backend/images/aa.jpg', 0, 2),
(27, 'pro999999', '12.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 12, 1, 'public/backend/images/aa.jpg', 0, 1),
(28, 'hghghgh', '12.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 1223, 1, 'public/backend/images/aa.jpg', 0, 2),
(29, 'hghghgh', '12.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 1223, 1, 'public/backend/images/aa.jpg', 0, 1),
(30, 'hihi', '12.00', '<p>The Nokia Lumia 1520 is a big-screen behemoth that will truly blur the line between smartphone and tablet when it is released later this month as an exclusive for AT&amp;T customers in the U.S. While the Nokia Lumia 1520 is only 8.6mm thick when not measuring the phone&#39;s bumped-out camera, it is 6mm wider than the enormous Samsung Galaxy Note 3.</p>\r\n', 212, 1, 'public/backend/images/aa.jpg', 0, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

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
(1, 1),
(1, 5),
(8, 4),
(8, 5),
(9, 8);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `full_name`, `status`) VALUES
(1, 'binhpt', '12345678', 'Phan The Binh', 1),
(8, '<b>binhpt</b>', '123456', '<b>Phan The Binh</b>', 1),
(9, 'demo', '1234567', 'demo', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
