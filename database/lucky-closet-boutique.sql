-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 25, 2019 at 03:27 PM
-- Server version: 5.7.24
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lucky-closet-boutique`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

DROP TABLE IF EXISTS `tbl_cart`;
CREATE TABLE IF NOT EXISTS `tbl_cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `total_cart` int(11) NOT NULL DEFAULT '0',
  `is_shipped` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `userid`, `created_date`, `total_cart`, `is_shipped`) VALUES
(1, 18, '2019-04-11', 2, 1),
(2, 61, '2019-04-18', 4, 1),
(3, 43, '2019-04-18', 2, 1),
(4, 2, '2019-04-21', 1, 0),
(5, 2, '2019-04-21', 1, 0),
(6, 2, '2019-04-21', 1, 0),
(7, 2, '2019-04-21', 1, 0),
(8, 2, '2019-04-21', 1, 0),
(9, 2, '2019-04-21', 1, 0),
(10, 48, '2019-04-21', 2, 1),
(11, 2, '2019-04-21', 1, 0),
(12, 2, '2019-04-21', 5, 0),
(13, 2, '2019-04-21', 6, 0),
(14, 2, '2019-04-21', 6, 0),
(15, 2, '2019-04-21', 7, 0),
(16, 2, '2019-04-21', 7, 0),
(17, 48, '2019-04-21', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart_product`
--

DROP TABLE IF EXISTS `tbl_cart_product`;
CREATE TABLE IF NOT EXISTS `tbl_cart_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_price` double NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart_product`
--

INSERT INTO `tbl_cart_product` (`id`, `product_cart_id`, `product_id`, `product_price`, `quantity`, `color_id`, `size_id`, `ip`) VALUES
(1, 1, 20, 3000, 1, 0, 0, '::1'),
(2, 1, 25, 3000, 1, 0, 0, '::1'),
(3, 2, 43, 450, 3, 0, 0, '::1'),
(4, 2, 40, 250, 1, 0, 0, '::1'),
(5, 3, 41, 320, 2, 0, 0, '::1'),
(6, 4, 40, 250, 1, 0, 0, '::1'),
(7, 5, 40, 250, 1, 0, 0, '::1'),
(8, 6, 40, 250, 1, 0, 0, '::1'),
(9, 7, 40, 250, 1, 0, 0, '::1'),
(10, 8, 40, 250, 1, 0, 0, '::1'),
(11, 9, 40, 250, 1, 0, 0, '::1'),
(12, 10, 41, 320, 1, 0, 0, '::1'),
(13, 10, 49, 500, 1, 0, 0, '::1'),
(14, 11, 52, 300, 1, 0, 0, '::1'),
(15, 12, 52, 300, 1, 0, 0, '::1'),
(16, 12, 40, 250, 1, 0, 0, '::1'),
(17, 12, 49, 500, 2, 0, 0, '::1'),
(18, 12, 41, 320, 1, 0, 0, '::1'),
(19, 13, 52, 300, 1, 0, 0, '::1'),
(20, 13, 40, 250, 2, 0, 0, '::1'),
(21, 13, 49, 500, 2, 0, 0, '::1'),
(22, 13, 41, 320, 1, 0, 0, '::1'),
(23, 14, 52, 300, 1, 0, 0, '::1'),
(24, 14, 40, 250, 2, 0, 0, '::1'),
(25, 14, 49, 500, 2, 0, 0, '::1'),
(26, 14, 41, 320, 1, 0, 0, '::1'),
(27, 15, 52, 300, 1, 0, 0, '::1'),
(28, 15, 40, 250, 3, 0, 0, '::1'),
(29, 15, 49, 500, 2, 0, 0, '::1'),
(30, 15, 41, 320, 1, 0, 0, '::1'),
(31, 16, 52, 300, 1, 0, 0, '::1'),
(32, 16, 40, 250, 3, 0, 0, '::1'),
(33, 16, 49, 500, 2, 0, 0, '::1'),
(34, 16, 41, 320, 1, 0, 0, '::1'),
(35, 17, 49, 500, 1, 0, 0, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `category_name`, `created_by`, `modified_by`, `modified_date`, `created_date`, `status`) VALUES
(6, 'clothes', 4, 43, '2019-04-18 14:45:38', '2019-04-17 16:33:20', '0'),
(13, 'shoes', 14, NULL, NULL, '2019-04-17 16:36:26', '0'),
(14, 'bags', 14, 43, '2019-04-18 14:38:19', '2019-04-17 16:36:29', '0'),
(16, 'essentials', 43, NULL, NULL, '2019-04-18 14:38:26', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_checkout`
--

DROP TABLE IF EXISTS `tbl_checkout`;
CREATE TABLE IF NOT EXISTS `tbl_checkout` (
  `checkout_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `address1` text NOT NULL,
  `address2` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `country` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `province` varchar(20) NOT NULL,
  `postcode` varchar(5) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `payment_option` varchar(20) NOT NULL,
  `order_date` datetime NOT NULL,
  `sale_id` int(11) NOT NULL,
  PRIMARY KEY (`checkout_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_checkout`
--

INSERT INTO `tbl_checkout` (`checkout_id`, `firstname`, `lastname`, `address1`, `address2`, `phone`, `email`, `country`, `city`, `province`, `postcode`, `customer_id`, `payment_option`, `order_date`, `sale_id`) VALUES
(1, 'Lianne', 'Visperas', '2F Marian Lane', 'Brgy San Ville', '9152626366', 'lianne_visperas@yahoo.com', 'Philippines', 'Manila', 'Metro Manila', '1119', 18, 'cash', '2019-04-11 18:53:14', 1),
(2, 'Sha', 'Rivera', 'Santolen Street', 'Cubao Subdivision', '12345677', 'sha_sha@yahoo.com', 'Philippines', 'Bagui', 'Benguet', '1597', 61, 'cash', '2019-04-18 12:03:19', 2),
(3, 'Char', 'Chua', 'Max Restaurant, Quezon Avenue', '', '0918565736289', 'char@gmail.com', 'Philippines', 'Quezon', 'Metro Manila', '1118', 43, 'cash', '2019-04-18 12:11:15', 3),
(4, 'test', 'test', 'Showa-ku, Orido-cho', '', '1239142', 'zxcvbenj@gmail.com', 'Japan', 'Nagoya', 'Aichi', '481-1', 2, 'cash', '2019-04-21 23:06:54', 9),
(5, 'Benjamin', 'test', 'Showa-ku, Orido-cho', '', '12093', 'zxcvbenj@gmail.com', 'Japan', 'Nagoya', 'Aichi', '481-1', 48, 'cash', '2019-04-21 23:12:30', 4),
(6, 'Test', 'Tesssst', 'Showa-ku, Orido-cho', '', '123815481', 'zxcvbenj@gmail.com', 'Japan', 'Nagoya', 'Aichi', '481-1', 2, 'cash', '2019-04-21 23:39:31', 11),
(7, 'Test', 'Tesssst', 'Showa-ku, Orido-cho', '', '123815481', 'zxcvbenj@gmail.com', 'Japan', 'Nagoya', 'Aichi', '481-1', 2, 'cash', '2019-04-21 23:46:07', 0),
(8, 'Test', 'Tesssst', 'Showa-ku, Orido-cho', '', '123815481', 'zxcvbenj@gmail.com', 'Japan', 'Nagoya', 'Aichi', '481-1', 2, 'cash', '2019-04-21 23:46:34', 0),
(9, 'Test', 'Tesssst', 'Showa-ku, Orido-cho', '', '123815481', 'zxcvbenj@gmail.com', 'Japan', 'Nagoya', 'Aichi', '481-1', 2, '', '2019-04-21 23:47:06', 0),
(10, 'Test', 'Tesssst', 'Showa-ku, Orido-cho', '', '123815481', 'zxcvbenj@gmail.com', 'Japan', 'Nagoya', 'Aichi', '481-1', 2, 'cash', '2019-04-21 23:47:49', 12),
(11, 'Test', 'Tesssst', 'Showa-ku, Orido-cho', '', '123815481', 'zxcvbenj@gmail.com', 'Japan', 'Nagoya', 'Aichi', '481-1', 2, 'cash', '2019-04-21 23:53:18', 0),
(12, 'Test', 'Tesssst', 'Showa-ku, Orido-cho', '', '123815481', 'zxcvbenj@gmail.com', 'Japan', 'Nagoya', 'Aichi', '481-1', 2, 'cash', '2019-04-21 23:54:39', 14),
(13, 'Test', 'Tesssst', 'Showa-ku, Orido-cho', '', '123815481', 'zxcvbenj@gmail.com', 'Japan', 'Nagoya', 'Aichi', '481-1', 2, 'cash', '2019-04-21 23:57:00', 16),
(14, 'Test', 'Tesssst', 'Showa-ku, Orido-cho', '', '123815481', 'zxcvbenj@gmail.com', 'Japan', 'Nagoya', 'Aichi', '481-1', 48, 'cash', '2019-04-21 23:59:01', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

DROP TABLE IF EXISTS `tbl_contact`;
CREATE TABLE IF NOT EXISTS `tbl_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `name`, `email`, `message`, `date`) VALUES
(1, 'ss', 'sa@gmail.com', 'jjjddd', '2017-10-07 07:15:00'),
(2, 'Habib', 'reethishabibullah@gmail.com', 'HI,\r\ni wanna share my wishlist with my friends via.\r\nCan you please help me with the script', '2018-01-27 10:36:30'),
(3, 'admin@bladephp.co', 'admin@bladephp.co', '    ffaaf', '2018-01-31 16:16:32'),
(4, 'we', 'sajaldas313@yahoo.com', 'm', '2018-02-24 23:01:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

DROP TABLE IF EXISTS `tbl_customers`;
CREATE TABLE IF NOT EXISTS `tbl_customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` text NOT NULL,
  `customer_type` int(11) NOT NULL,
  `uploadFile` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` int(11) NOT NULL,
  `is_member` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`customer_id`, `company_name`, `first_name`, `last_name`, `email`, `password`, `phone`, `customer_type`, `uploadFile`, `status`, `created_by`, `modified_by`, `created_date`, `modified_date`, `is_member`) VALUES
(1, '', 'AJ', 'Sarino', 'ajSar@yahoo.com', '1212121212', '1231231231', 0, '', 'active', 0, 0, '2019-03-01 10:39:43', 0, 0),
(4, '', 'Sunshine', 'Corazon', 'corazonSunshine@gmail.com', 'SunnyCora', '1234567890', 0, '', 'active', 0, 0, '2019-03-04 14:55:37', 0, 0),
(7, '', 'Ria Mikhaella', 'Panis', 'yellow_ria@yahoo.com', 'dancingismypassion', '9876543210', 0, '', 'active', 0, 0, '2019-03-05 10:33:59', 0, 0),
(10, '', 'Belyn', 'Posidio', 'MilaBelyn@hotmail.com', '90909090', '674497230', 0, '', 'active', 0, 0, '2019-03-09 21:32:53', 0, 0),
(12, '', 'Janina', 'Tresvalles', 'valles1234@yahoo.com', '12345', '674497230', 0, '', 'active', 0, 0, '2018-03-10 21:36:29', 0, 0),
(28, '', 'Luca', 'Modrich', 'football_Luca@gmail.com', 'modrichfootball', '09152727546', 0, '', 'active', 0, 0, '2018-03-15 23:58:34', 0, 0),
(30, '', 'Char', 'Chua', 'char@gmail.com', 'char@197', '9812481284821433', 0, '', 'active', 0, 0, '2019-03-23 16:12:46', 2019, 0),
(44, '', 'Nicolas', 'Del Prado', 'dpradonick@gmail.com', 'delprads', '1234567', 0, '', 'active', 0, 0, '2019-01-03 13:07:42', 0, 0),
(45, '', 'Jessa', 'Gatchalian', 'jess4567@gmail.com', '123123', '09187865432', 0, '', 'active', 0, 0, '2019-02-05 18:51:33', 0, 0),
(46, '', 'Jej ', 'Vinzon', 'Jej_thevoice123@yahoo.com', 'adamlevine', '09785671234', 0, '', 'active', 0, 0, '2019-03-19 12:23:22', 0, 0),
(47, '', 'Japs', 'Hamagutchi', 'hamaguch.japee@hotmail.com', '12345678', '091823456790', 0, '', 'active', 0, 0, '2019-04-01 10:20:58', 0, 0),
(48, '', 'Adelaida', 'Corpuz', 'AdCorpuz88@gmail.com', 'Marx1234!', '090878645321', 0, '', 'active', 0, 0, '2019-02-24 19:20:49', 0, 0),
(49, '', 'Rudyard', 'Somera', 'icefireRudyard@hotmail.com', 'R*urjady123$', '0938675456783', 0, '', 'active', 0, 0, '2019-03-28 19:11:59', 0, 0),
(50, '', 'Selina', 'Lee', 'selina490@gmail.com', '678901234', '099867423567', 0, '', 'active', 0, 0, '2019-03-30 15:03:09', 0, 0),
(51, '', 'Cardo', 'Corpuz', 'angProbinsyano12@yahoo.com', '123456', '0978123567843', 0, '', 'active', 0, 0, '2019-04-10 13:34:22', 0, 0),
(52, '', 'Sabrina', 'De los Reyes', 'sabrina.witch9080@gmail.com', 'spells8989', '0934567123456', 0, '', 'active', 0, 0, '2019-04-20 18:48:49', 0, 0),
(53, '', 'Catriona', 'Gray', 'missUniverse2019@universe.com', 'PiaPia456', '09896754123478', 0, '', 'active', 0, 0, '2019-04-22 13:28:57', 0, 0),
(54, '', 'Roy', 'Montero', 'TroyGeneva@ergmail.com', '9090909090', '09763214567', 0, '', 'active', 0, 0, '2019-04-18 01:02:10', 0, 0),
(55, '', 'Keiko', 'Tan', 'KeikoMusika@yahoo.com', 'iewe0@@!', '09125436789', 0, '', 'active', 0, 0, '2018-04-15 00:18:33', 0, 0),
(56, '', 'Cassidy', 'Pope', 'cassie-1290@gmail.com', 'Ferdinand0967!', '0967123569090', 0, '', 'active', 0, 0, '2019-04-14 14:48:51', 0, 0),
(57, '', 'Garland', 'Medina', 'medina_09accountant@gmail.com', '0915LIKEW', '093214567890', 0, '', 'active', 0, 0, '2019-04-21 15:46:50', 0, 0),
(58, '', 'Greyson', 'Castaneda', 'greyson_cast-29@yahoo.com', '9090123', '09658974334', 0, '', 'active', 0, 0, '2019-04-22 05:50:44', 0, 0),
(59, '', 'Blaze', 'Dela Rosa', 'mary.b.c.delarosa@gmail.com', '1234567', '09400455555', 0, '', 'active', 0, 0, '2019-04-25 00:01:49', 0, 0),
(60, '', 'Kris', 'Aquino', 'krissieTheBestest@yahoo.com', '90897867', '09223344556', 0, '', 'active', 0, 0, '2019-04-16 14:34:33', 0, 0),
(61, '', 'Joatam', 'Lubuat', 'joataml@yahoo.com', 'shashasha', '09153737488', 0, '', 'active', 0, 0, '2019-04-17 18:58:51', 0, 0),
(62, '', 'Michelle', 'Sianghio', 'mich@mich.com', '1234', '09276312312', 0, '', 'active', 0, 0, '2019-04-21 19:31:45', 0, 0),
(63, '', 'Tet', 'Cruz', 'asd@asd.ca', 'asd', '12312', 0, '', 'active', 0, 0, '2019-04-21 19:36:27', 0, 0),
(64, '', 'Test', 'Me', 'test@me.om', 'asd', '9591', 0, '', 'active', 0, 0, '2019-04-21 19:40:40', 0, 0),
(65, '', 'Benjamin', 'Uttoh', 'zxcvbenj@gmail.com', '1234', '129318248', 0, '', 'active', 0, 0, '2019-04-21 20:20:53', 0, 0),
(66, '', 'asd', 'asd', 'asd@asd.caa', 'asd', '912591', 0, '', 'active', 0, 0, '2019-04-21 23:14:48', 0, 0),
(67, '', 'tes', 'test', 'asdaa@as.a', 'asd', '4912941', 0, '', 'active', 0, 0, '2019-04-21 23:17:06', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

DROP TABLE IF EXISTS `tbl_products`;
CREATE TABLE IF NOT EXISTS `tbl_products` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(255) DEFAULT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_description` text,
  `product_price` double NOT NULL,
  `product_type` int(1) NOT NULL,
  `product_image` varchar(5000) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` varchar(500) NOT NULL,
  `color_id` varchar(500) NOT NULL,
  `size_id` varchar(500) NOT NULL,
  `related_product` varchar(200) DEFAULT NULL,
  `quantity` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `gross_amount` varchar(255) NOT NULL,
  `net` varchar(255) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `product_code`, `product_name`, `product_description`, `product_price`, `product_type`, `product_image`, `category_id`, `sub_category_id`, `color_id`, `size_id`, `related_product`, `quantity`, `discount`, `gross_amount`, `net`, `created_date`, `created_by`, `modified_date`, `modified_by`, `status`) VALUES
(38, '464171019240872', 'Shakira\'s Sandals', 'These women\'s leather sandals have a stylish and contemporary look that\'s eye-catching, with a strappy design and a flat style that suits a smart casual look. The leather upper offers a luxurious touch, making these women\'s sandals a great choice in summer footwear.', 120, 1, '8.jpg', 13, '13', '', '', '', '2', '2', '240.00', '235.20', '2019-04-11 20:03:48', 2, '2019-04-24 18:55:52', 1, '0'),
(39, '439323478159447', 'Kate Spade Handbags', 'These sleek Kate Spade handbags are handcrafted from bonded smooth and textured italian leather with interlocking spades they make a good open top shoulder bag with drawstring closure imported.  ', 500, 1, '1.jpg', 14, '7', '', '', '', '2', '0', '1000.00', '1000.00', '2019-04-17 18:10:51', 2, '2019-04-24 18:55:35', 43, '0'),
(40, '310058377521621', 'Caress Body Wash', 'A sensually aromatic body cleanser that lasts for up to 12 hours. Spoil your senses with plush lather and the irresistible notes of angel face rose and lush vanilla.', 250, 2, '1.jpg', 16, '14', '', '', '', '', '0', '', '', '2019-04-17 18:15:26', 2, '2019-04-24 18:54:06', 43, '0'),
(41, '864598730074392', 'Zara Checkered Top', 'Stylish Checkered Zara top with ribbon collar and turned-up sleeveless. Front pocketless with flaps at chest. Front button closure.', 320, 2, '25.jpg', 6, '', '', '', '', '', '12', '', '', '2019-04-17 18:31:52', 43, '2019-04-18 14:40:40', NULL, '0'),
(42, '277982729249210', 'Forever 21 Printed Blouse', 'Infused with floloral graphic print on the front, this white top from Forever 21 will help you emerge looking chic and fashionable. Its boxy silhouette and crisscross lacing on the cutout back also give it a flirty finish. Wear it with shorts and low-ankle shoes.', 300, 1, '32.jpg', 6, '9', '', '', '', '6', '12', '1800.00', '1584.00', '2019-04-17 18:51:43', 2, '2019-04-24 18:53:53', 43, '0'),
(45, '814337280741641', 'Forever 21 Checkered Dress', 'Sleek blue and white checkered printed woven wrap dress', 750, 1, '24.jpg', 6, '', '', '', '', '18', '34', '13500.00', '8910.00', '2019-04-18 13:17:31', 43, '2019-04-18 14:36:45', NULL, '0'),
(47, '130234923766607', 'H&M Stylish Bags', 'Stylish go out to bag, with a grained imitation leather outside, imitation suede inside and two handles at the top. Unlined. Size 16x28x38 cm.', 469, 3, '5.jpg', 14, '7', '', '', '39', '23', '45', '10787.00', '5932.85', '2019-04-18 13:24:16', 2, '2019-04-24 18:53:35', 43, '0'),
(48, '763979751000630', 'Joe Malone Perfume', 'London\'s Covent Garden early morning market. Succulent nectarine, peach and cassis and delicate spring flowers melt into the note of acacia honey. Sweet and delightfully playful. Now available in a larger, limited edition size.', 1400, 3, '3.jpg', 16, '', '', '', '', '34', '24', '47600.00', '36176.00', '2019-04-18 13:30:42', 43, '2019-04-18 14:42:31', 43, '0'),
(49, '361686006362055', 'Bluish Outfit', 'Navy Blue Cropped Top\r\nFlary Checkered Skirt', 500, 2, '20.jpg', 6, '10', '', '', '41,45', '34', '15', '17000.00', '14450.00', '2019-04-18 14:47:54', 2, '2019-04-24 18:54:50', NULL, '0'),
(50, '386400205116112', '60\'s Inspired Sandals', 'Bright Sunny Themed Strapless Sandals for the Summer', 190, 3, '2.jpg', 13, '13', '', '', '', '56', '12', '10640.00', '9363.20', '2019-04-18 14:50:20', 2, '2019-04-24 18:55:21', NULL, '0'),
(51, '935729081378809', 'Long Champ Artsy Bag', 'Black Long Champ Bag with Bird Paint Inspired Art', 1500, 2, '11.jpg', 14, '', '', '', '', '47', '45', '70500.00', '38775.00', '2019-04-18 14:52:03', 43, NULL, NULL, '0'),
(52, '647911535515409', 'Kate Spade Multi Design Pouches', 'Good-Sized Pouches that come in several designs', 300, 3, '18.jpg', 14, '7', '', '', '39', '78', '24', '23400.00', '17784.00', '2019-04-18 14:54:09', 2, '2019-04-24 18:56:00', NULL, '0'),
(53, '118220340236508', 'Victoria\'s Secret Perfume', 'Aromatic and Sweet Scent Perfumes', 250, 2, '2.jpg', 16, '11', '', '', '', '5', '', '1250.00', '', '2019-04-18 14:55:25', 2, '2019-04-24 18:53:26', NULL, '0'),
(54, '361087306922826', 'Rusty Lopez Sasha Shoes', 'Brown partially closed and good fit shoes for the office', 800, 3, '6.jpg', 13, '12', '', '', '', '90', '0', '72000.00', '', '2019-04-18 14:57:30', 2, '2019-04-24 18:54:19', NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales`
--

DROP TABLE IF EXISTS `tbl_sales`;
CREATE TABLE IF NOT EXISTS `tbl_sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buyer_name` varchar(100) NOT NULL,
  `cash_discount` int(11) NOT NULL,
  `grand_amount` double NOT NULL,
  `description` varchar(250) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_by` int(11) NOT NULL,
  `issue_date` date NOT NULL,
  `due_date` date NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `shipped_status` int(11) NOT NULL COMMENT 'orderpace=0,',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sales`
--

INSERT INTO `tbl_sales` (`id`, `buyer_name`, `cash_discount`, `grand_amount`, `description`, `status`, `created_by`, `issue_date`, `due_date`, `total_quantity`, `shipped_status`) VALUES
(1, 'Hukam', 0, 6000, '', 'active', 0, '2019-04-11', '0000-00-00', 2, 1),
(2, 'Joatam', 0, 1600, '', 'active', 0, '2019-04-18', '0000-00-00', 4, 1),
(3, 'Char', 0, 640, '', 'active', 0, '2019-04-18', '0000-00-00', 2, 1),
(4, 'Adelaida', 0, 820, '', 'active', 0, '2019-04-21', '0000-00-00', 2, 0),
(5, 'Adelaida', 0, 500, '', 'active', 0, '2019-04-21', '0000-00-00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_detail`
--

DROP TABLE IF EXISTS `tbl_sales_detail`;
CREATE TABLE IF NOT EXISTS `tbl_sales_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_id` int(11) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `selling_rate` double NOT NULL,
  `discount` int(2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sales_detail`
--

INSERT INTO `tbl_sales_detail` (`id`, `sale_id`, `product_code`, `selling_rate`, `discount`, `quantity`, `color_id`, `size_id`, `product_price`) VALUES
(1, 1, '058107001681158', 0, 0, 1, 0, 0, 3000),
(2, 1, '898469425907082', 0, 0, 1, 0, 0, 3000),
(3, 2, '374729719536626', 0, 0, 3, 0, 0, 450),
(4, 2, '310058377521621', 0, 0, 1, 0, 0, 250),
(5, 3, '864598730074392', 0, 0, 2, 0, 0, 320),
(6, 4, '864598730074392', 0, 0, 1, 0, 0, 320),
(7, 4, '361686006362055', 0, 0, 1, 0, 0, 500),
(8, 5, '361686006362055', 0, 0, 1, 0, 0, 500);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider_images`
--

DROP TABLE IF EXISTS `tbl_slider_images`;
CREATE TABLE IF NOT EXISTS `tbl_slider_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slider_images`
--

INSERT INTO `tbl_slider_images` (`id`, `name`, `created_by`, `created_date`, `modified_by`, `modified_date`, `status`, `views`) VALUES
(10, 'ba.jpg', 1, '2019-04-18 11:53:21', 0, '0000-00-00 00:00:00', 'active', 0),
(13, 'banner-1.png', 2, '2019-04-24 18:57:50', 0, '0000-00-00 00:00:00', 'active', 0),
(15, 'ba2.jpg', 2, '2019-04-24 18:58:47', 0, '0000-00-00 00:00:00', 'active', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

DROP TABLE IF EXISTS `tbl_subcategory`;
CREATE TABLE IF NOT EXISTS `tbl_subcategory` (
  `subcat_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `parent_category_id` int(11) NOT NULL,
  `subcategory_name` varchar(255) DEFAULT NULL,
  `image` varchar(500) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`subcat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcat_id`, `parent_category_id`, `subcategory_name`, `image`, `created_by`, `modified_by`, `modified_date`, `created_date`, `status`) VALUES
(1, 1, 'Soft Toys', '1-piece-30cm-small-cute-teddy-bears-stuffed-animals-soft-plush-toys-white-beige-brown_jpg_640x640.jpg', 4, NULL, NULL, '2018-05-15 08:28:39', '0'),
(2, 4, 'Paintings', '86b4faa343cd8c43c38335df6bca2172.jpg', 4, NULL, NULL, '2018-05-15 08:28:52', '0'),
(3, 2, 'Shirts', '457cc1b7-24da-4688-8dff-e04c20012992.jpg', 4, NULL, NULL, '2018-05-15 08:29:09', '0'),
(4, 2, 'T-Shirts', '500_3ebccf3d-d88f-453f-a9f1-244c61ea6f54_grande.png', 4, NULL, NULL, '2018-05-15 08:29:19', '0'),
(5, 3, 'Sarees', '0f61b7b1bb3966bc7cb9e9903070a548.jpg', 4, NULL, NULL, '2018-05-15 08:29:34', '0'),
(6, 3, 'Kurtas & Kurtis', 'rayon-size-xl-top-cash-on-delivery.jpg', 4, NULL, NULL, '2018-05-15 08:29:44', '0'),
(7, 14, 'Hand Bags', 'handbag.jpg', 2, NULL, NULL, '2019-04-24 18:27:30', '0'),
(8, 14, 'Backpacks', 'backpack.jpg', 2, NULL, NULL, '2019-04-24 18:28:26', '0'),
(9, 6, 'Blouses', 'blouse.jpg', 2, NULL, NULL, '2019-04-24 18:29:15', '0'),
(10, 6, 'Dresses', 'dress.jpg', 2, NULL, NULL, '2019-04-24 18:29:50', '0'),
(11, 16, 'Perfumes', 'perfume.jpg', 2, NULL, NULL, '2019-04-24 18:48:45', '0'),
(12, 13, 'Shoes', 'shoes.jpg', 2, NULL, NULL, '2019-04-24 18:50:49', '0'),
(13, 13, 'Slip-ons', 'slippers.jpg', 2, NULL, NULL, '2019-04-24 18:51:45', '0'),
(14, 16, 'Others', 'bodywash.jpg', 2, NULL, NULL, '2019-04-24 18:52:53', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

DROP TABLE IF EXISTS `user_detail`;
CREATE TABLE IF NOT EXISTS `user_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id`, `firstname`, `middlename`, `lastname`, `email`, `password`, `profile`, `mobile`, `created_date`, `status`, `created_by`) VALUES
(1, 'Lianne', '', 'Visperas', 'lianne_visperas@yahoo.com', '123456', '', '09152626366', '2019-04-17 16:35:42', '0', '1'),
(2, 'Benjamin', '', 'Uttoh', 'benjuttoh@gmail.com', '2012', '', '09153636988', '2019-04-17 16:37:50', '0', '1'),
(3, 'David', '', 'Reyes', 'reyes.david@hotmail.com', 'david12345', '', '0918772657', '2019-04-17 16:43:49', '0', '2'),
(4, 'Rami', '', 'Malek', 'bestactor@hotmail.com', 'oscars', '', '09152626377', '2019-04-17 17:00:14', '0', '3'),
(5, 'Benjamin', '', 'Visperas', 'admin@admin.com', '123456', '', '09152626366', '2019-04-17 17:04:40', '0', '1'),
(6, 'Diane', '', 'Malabanan', 'ilovefashion2019@gmail.com', 'fashionislove', '', '09784561234', '2019-04-17 17:03:22', '0', '4'),
(20, 'Admin', '', 'Admin', 'admin@admin.com.ph', 'password', '', '09112234456', '2019-04-18 11:45:45', '0', '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
