-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 15, 2018 at 03:21 AM
-- Server version: 5.6.34-79.1-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blade2wi_hd_shop_two`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE IF NOT EXISTS `tbl_cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `total_cart` int(11) NOT NULL DEFAULT '0',
  `is_shipped` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart_product`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `category_name`, `created_by`, `modified_by`, `modified_date`, `created_date`, `status`) VALUES
(1, 'baby & kids', 4, NULL, NULL, '2018-05-15 08:28:10', '0'),
(2, 'men', 4, NULL, NULL, '2018-05-15 08:28:12', '0'),
(3, 'woman', 4, NULL, NULL, '2018-05-15 08:28:16', '0'),
(4, 'home & furniture', 4, NULL, NULL, '2018-05-15 08:28:19', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_checkout`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_color`
--

CREATE TABLE IF NOT EXISTS `tbl_color` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `color_name` varchar(255) DEFAULT NULL,
  `colorcode` varchar(255) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `status_delete` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE IF NOT EXISTS `tbl_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

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

CREATE TABLE IF NOT EXISTS `tbl_customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` text NOT NULL,
  `billing_address1` varchar(255) NOT NULL,
  `billing_address2` varchar(255) NOT NULL,
  `billing_city` int(11) NOT NULL,
  `billing_state` int(11) NOT NULL,
  `billing_country` int(11) NOT NULL,
  `billing_zip` varchar(255) NOT NULL,
  `shipping_address1` varchar(255) NOT NULL,
  `shipping_address2` varchar(255) NOT NULL,
  `shipping_city` int(11) NOT NULL,
  `shipping_state` int(11) NOT NULL,
  `shipping_country` int(11) NOT NULL,
  `shipping_zip` varchar(255) NOT NULL,
  `customer_type` int(11) NOT NULL,
  `tax_id` varchar(255) NOT NULL,
  `year` varchar(5) NOT NULL,
  `credit_card_number` varchar(25) NOT NULL,
  `credit_card_cw` varchar(10) NOT NULL,
  `month` varchar(10) NOT NULL,
  `credit_card_type` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `social_networks` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `linkdin` varchar(255) NOT NULL,
  `googlePlus` varchar(255) NOT NULL,
  `uploadFile` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` int(11) NOT NULL,
  `is_member` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`customer_id`, `company_name`, `first_name`, `last_name`, `email`, `password`, `phone`, `billing_address1`, `billing_address2`, `billing_city`, `billing_state`, `billing_country`, `billing_zip`, `shipping_address1`, `shipping_address2`, `shipping_city`, `shipping_state`, `shipping_country`, `shipping_zip`, `customer_type`, `tax_id`, `year`, `credit_card_number`, `credit_card_cw`, `month`, `credit_card_type`, `website`, `social_networks`, `facebook`, `twitter`, `linkdin`, `googlePlus`, `uploadFile`, `status`, `created_by`, `modified_by`, `created_date`, `modified_date`, `is_member`) VALUES
(17, '', 'ari', 'namana', 'purnamaindah262@gmail.com', '123456', '085694340785', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2017-06-23 08:11:01', 0, 0),
(18, '', 'Hukam', 'Singh', 'indianow939@gmail.com', '12345678', '9058791140', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2017-09-01 12:44:36', 0, 0),
(19, '', 'Parth', 'Dholu', 'parthdholu098@gmail.com', 'parth007', '9408065570', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2017-09-12 15:04:47', 0, 0),
(20, '', 'sd', 'sds', 'a@gmail.com', 'a@gmail.com', '9', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2017-09-20 14:36:49', 0, 0),
(21, '', 'aa', 'sa', 'aa@aa.aa', 'aa', '674637422342', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2017-09-22 16:29:40', 0, 0),
(23, '', 'admin', 'admin', 'admin@bladephp.co', '123456', '33', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2017-09-25 05:30:33', 0, 0),
(24, '', 'soz', 'soz', 'kurd@gmail.com', 'garmyan', '123456', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2017-09-26 01:36:23', 0, 0),
(25, '', 'steve', 'nom', 'user@gmail.com', 'stevenom', '0714418874', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2017-09-26 17:18:42', 0, 0),
(26, '', 'sa', 'ku', 'sa@gmail.com', 'sasi', '8989898989', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2017-10-07 07:12:09', 0, 0),
(27, '', 'swapnil', 'chowkekar', 'chowkek@gmail.com', '33102295', '+918652743614', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2017-10-10 22:26:17', 0, 0),
(28, '', 'Aguinaldo', 'Matsinhe', 'aguinaldomatsinhe@gmail.com', '2393', '844747061', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2017-10-16 15:33:04', 0, 0),
(29, '', 'Annu', 'mishra', 'anurag786332@gmail.com', '1234', '9956147684', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2017-12-01 14:18:31', 0, 0),
(30, '', 'Madan', 'Rajput', 'madan.rajput@zaptas.com', '123456', '8923326462', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2017-12-06 13:19:10', 0, 0),
(31, '', 'prem', 'chandra', 'premnits5@gmail.com', '123456789', '9076302616', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2017-12-12 11:21:27', 0, 0),
(32, '', 'a', 'a', 'a@a.com', 'a', '+0124', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2017-12-13 18:07:23', 0, 0),
(33, '', 'a', 'a', 'a@a.a', 'a', '123', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2017-12-13 18:09:07', 0, 0),
(35, '', 'Samuel', 'Urang', 'samurang@yahoo.com', 'Cloudsam', '08084546268', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2018-01-09 17:15:45', 0, 0),
(36, '', 'naveen', 'reddy', 'naveencooldude2011@gmail.com', '123', '869868689', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2018-01-14 12:07:56', 0, 0),
(37, '', 'Rups', 'Shelke', 'rups.shelke@ymail.com', '1212121212', '1231231231', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2018-01-19 10:39:43', 0, 0),
(38, '', 'test', 'test', 'test.codegarage@gmail.com', 'codegarage', '1234567890', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2018-01-25 14:55:37', 0, 0),
(39, '', 'md', 'md', 'reethishabibullah@gmail.com', 'md', '9876543210', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2018-01-27 10:33:59', 0, 0),
(40, '', 'Evelyne', 'Eliakim', 'virusverda@gmail.com', '1234', '674497230', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2018-01-29 21:32:53', 0, 0),
(41, '', 'Evelyne', 'Eliakim', 'verdacleo@gmail.com', '12345', '674497230', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2018-01-29 21:36:29', 0, 0),
(42, '', 'sachin', 'kurude', 'sachinkurude143@gmail.com', 'sachin123', '9172980286', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2018-01-30 23:58:34', 0, 0),
(43, '', 'Char', 'Shahi', 'char@gmail.com', 'char@197', '1234567', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2018-02-02 16:12:46', 0, 0),
(44, '', 'Charli', 'Ritche', 'charli@gmail.com', 'Charli@123', '1234567', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2018-02-04 13:07:42', 0, 0),
(45, '', 'mahmoud', 'sakr', 'ahmedsakr8282@gmail.com', '123123', '0125546240', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2018-02-05 18:51:33', 0, 0),
(46, '', 'asgsa', 'sgsg', 'sd@gmail.com', 'sd', '454545454545', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2018-02-09 12:23:22', 0, 0),
(47, '', 'jaypal', 'sagar', 'jaypal.arkss@gmail.com', '12345678', '34534534534543543534', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2018-02-22 10:20:58', 0, 0),
(48, '', 'test', 'test', 'sajaldas88@gmail.com', 'works@54321', '9088646908', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2018-02-24 19:20:49', 0, 0),
(49, '', 'abhishek', 'dixit', 'adixit572@gmail.com', '100', '9589263072', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2018-02-26 19:11:59', 0, 0),
(50, '', 'Rishav', 'Singh', 'rishavsinghh1@gmail.com', '123456', '9934464262', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2018-03-10 15:03:09', 0, 0),
(51, '', 'aa', 'a', 'aa@sss.com', '123456', '123456789', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2018-03-17 13:34:22', 0, 0),
(52, '', 'rashid', 'resh', 'rashidresh786@gmail.com', '12345', '9069917409', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2018-03-26 18:48:49', 0, 0),
(53, '', 'Tirulipa', 'teste', 'teste@test.com', '12345678', '12345678', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2018-03-28 13:28:57', 0, 0),
(54, '', 'up', 'singh', 'up@gmail.com', '12345', '78755', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2018-04-01 01:02:10', 0, 0),
(55, '', 'sudhir', 'saini', 'sudhir01saini@gmail.com', '9720457997', '9720457997', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2018-04-09 00:18:33', 0, 0),
(56, '', 'vendor', 'f', 'vendor@gmail.com', '123456', '123456789', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2018-04-19 14:48:51', 0, 0),
(57, '', 'Mazina', 'Arcel', 'mazinadavy@gmail.com', '22228566', '7411083031', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2018-04-21 15:46:50', 0, 0),
(58, '', 'sirahj', 'testing', 'nhb_haw-14@live.com', '123', '1234567', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2018-04-22 05:50:44', 0, 0),
(59, '', 'ali', 'ahmad', 'ali.mbbs26@gmail.com', '1234567', '03421842453', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2018-04-25 00:01:49', 0, 0),
(60, '', 'Dalton', 'Doyle', 'abc@abc.com', '123', '62222222222222', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', 0, 0, '2018-05-02 14:34:33', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `product_code`, `product_name`, `product_description`, `product_price`, `product_type`, `product_image`, `category_id`, `sub_category_id`, `color_id`, `size_id`, `related_product`, `quantity`, `discount`, `gross_amount`, `net`, `created_date`, `created_by`, `modified_date`, `modified_by`, `status`) VALUES
(1, '254951270613364', 'Krapal Striped Women''s Straight Kurta', 'Krapal Striped Women''s Straight Kurta', 5000, 1, '16-always-multi-color-printed-anarkali-crepe-kurti--product.jpg', 3, '6', '', '', '', '20', '30', '100000.00', '70000.00', '2018-05-15 08:30:19', 4, NULL, NULL, '0'),
(2, '141314572454736', 'Krapal Striped Women''s Straight Kurta', 'Krapal Striped Women''s Straight Kurta', 300, 2, '81beswvxf4l__ux569_.jpg', 3, '6', '', '', '1', '100', '20', '30000.00', '24000.00', '2018-05-15 08:30:40', 4, NULL, NULL, '0'),
(3, '568889528362593', 'Krapal Striped Women''s Straight Kurta', 'Krapal Striped Women''s Straight Kurta', 3500, 2, 'frock-style-kurti.jpg', 3, '6', '', '', '1,2', '10', '30', '35000.00', '24500.00', '2018-05-15 08:31:02', 4, NULL, NULL, '0'),
(4, '671733892256576', 'Krapal Striped Women''s Straight Kurta', 'Krapal Striped Women''s Straight Kurta', 2500, 2, 'printed-kurti.jpg', 2, '3,4', '', '', '1,2,3', '10', '30', '25000.00', '17500.00', '2018-05-15 08:31:23', 4, NULL, NULL, '0'),
(5, '536457959455580', 'Krapal Striped Women''s Straight Kurta', 'Krapal Striped Women''s Straight Kurta', 200, 2, '16-always-multi-color-printed-anarkali-crepe-kurti--product.jpg', 3, '6', '', '', '1,2,3', '30', '20', '6000.00', '4800.00', '2018-05-15 08:31:44', 4, NULL, NULL, '0'),
(6, '712505849234919', 'Krapal Striped Women''s Straight Kurta', 'Krapal Striped Women''s Straight Kurta', 2300, 2, 'sasya-grey-designer-kurti.jpg', 3, '6', '', '', '1,2,3', '10', '30', '23000.00', '16100.00', '2018-05-15 08:32:04', 4, NULL, NULL, '0'),
(7, '877817612594463', 'SAF Ganesh Modern art Ink Painting', 'SAF Ganesh Modern art Ink Painting', 200, 3, '86b4faa343cd8c43c38335df6bca2172.jpg', 4, '2', '', '', '2,3,4', '10', '10', '2000.00', '1800.00', '2018-05-15 08:32:43', 4, NULL, NULL, '0'),
(8, '628174592547568', 'SAF Ganesh Modern art Ink Painting', 'SAF Ganesh Modern art Ink Painting', 200, 2, 'abstract-art-original-painting-winter-cold-by-madart-megan-duncanson.jpg', 4, '2', '', '', '5,6,7', '20', '30', '4000.00', '2800.00', '2018-05-15 08:33:04', 4, NULL, NULL, '0'),
(9, '244883784936652', 'SAF Ganesh Modern art Ink Painting', 'SAF Ganesh Modern art Ink Painting', 3000, 1, 'c4bcef505d06c84af40b6baee44ae548--ballet-drawings-girl-drawings.jpg', 4, '2', '', '', '1,2,3', '10', '10', '30000.00', '27000.00', '2018-05-15 08:33:57', 4, NULL, NULL, '0'),
(10, '152372475343513', 'SAF Ganesh Modern art Ink Painting', 'SAF Ganesh Modern art Ink Painting', 100, 2, 'finger-1.jpg', 4, '2', '', '', '7,8,9', '20', '10', '2000.00', '1800.00', '2018-05-15 08:34:20', 4, NULL, NULL, '0'),
(11, '658132642159602', 'SAF Ganesh Modern art Ink Painting', 'SAF Ganesh Modern art Ink Painting', 2500, 3, 'image_3846.jpg', 4, '2', '', '', '7,9,10', '10', '30', '25000.00', '17500.00', '2018-05-15 08:34:43', 4, NULL, NULL, '0'),
(12, '676513327548633', 'SAF Ganesh Modern art Ink Painting', 'SAF Ganesh Modern art Ink Painting', 2500, 2, 'pop-culture-characters-thrift-store-paintings-dave-pollot-1.jpg', 4, '2', '', '', '2,3,4', '10', '30', '25000.00', '17500.00', '2018-05-15 08:35:20', 4, NULL, NULL, '0'),
(13, '198431289465646', 'Toyland Panda Bear', 'Toyland Panda Bear', 200, 2, '1-piece-30cm-small-cute-teddy-bears-stuffed-animals-soft-plush-toys-white-beige-brown_jpg_640x640.jpg', 1, '1', '', '', '', '10', '10', '2000.00', '1800.00', '2018-05-15 08:36:18', 4, NULL, NULL, '0'),
(14, '435850556977541', 'Toyland Panda Bear', 'Toyland Panda Bear', 300, 3, '13cm-chick-soft-toy.jpg', 1, '1', '', '', '', '10', '20', '3000.00', '2400.00', '2018-05-15 08:36:38', 4, NULL, NULL, '0'),
(15, '914159603624754', 'Toyland Panda Bear', 'Toyland Panda Bear', 100, 3, 'angelic_adorable_duck_soft_toy_30_cm_8907089312913_76dfa5bd.jpg', 1, '1', '', '', '1,13,14', '50', '30', '5000.00', '3500.00', '2018-05-15 08:37:08', 4, NULL, NULL, '0'),
(16, '363836014801899', 'Toyland Panda Bear', 'Toyland Panda Bear', 10, 3, 'big-soft-3-feet-teddy-bear-with-neck-bow-91-cm-beige-91-arvel-original-imaf2th8zyaxs6as.jpg', 1, '1', '', '', '', '20', '20', '200.00', '160.00', '2018-05-15 08:37:28', 4, NULL, NULL, '0'),
(17, '781632836558818', 'Toyland Panda Bear', 'Toyland Panda Bear', 10, 3, 'jellycat-huge-bashful-tulip-bunny-thumb-436850-9965.jpg', 1, '1', '', '', '14,15,16', '20', '20', '200.00', '160.00', '2018-05-15 08:37:51', 4, NULL, NULL, '0'),
(18, '236650622881657', 'Toyland Panda Bear', 'Toyland Panda Bear', 300, 3, 'soft-toys-4.jpg', 1, '1', '', '', '2,16,17', '10', '10', '3000.00', '2700.00', '2018-05-15 08:38:16', 4, NULL, NULL, '0'),
(19, '595457246643432', 'Saara Solid, Geometric Print, Printed Daily', 'Saara Solid, Geometric Print, Printed Daily', 10000, 2, '0f61b7b1bb3966bc7cb9e9903070a548.jpg', 3, '5', '', '', '16,17,18', '20', '20', '200000.00', '160000.00', '2018-05-15 08:39:26', 4, NULL, NULL, '0'),
(20, '058107001681158', 'Saara Solid, Geometric Print, Printed Daily', 'Saara Solid, Geometric Print, Printed Daily', 3000, 2, '81zbifcenol__uy445_.jpg', 3, '5', '', '', '2,3,4', '10', '20', '30000.00', '24000.00', '2018-05-15 08:39:46', 4, NULL, NULL, '0'),
(21, '446086390280616', 'Saara Solid, Geometric Print, Printed Daily', 'Saara Solid, Geometric Print, Printed Daily', 3000, 2, 'az-large-2184390.jpg', 3, '5', '', '', '2,3,4', '20', '0', '60000.00', '60000.00', '2018-05-15 08:40:07', 4, NULL, NULL, '0'),
(22, '788311725571377', 'Saara Solid, Geometric Print, Printed Daily', 'Saara Solid, Geometric Print, Printed Daily', 200, 2, 'az-large-4133807.jpg', 3, '5', '', '', '17,18,19,20,21', '10', '30', '2000.00', '1400.00', '2018-05-15 08:40:40', 4, NULL, NULL, '0'),
(23, '058556311952924', 'Saara Solid, Geometric Print, Printed Daily', 'Saara Solid, Geometric Print, Printed Daily', 3000, 2, 'images.jpg', 3, '5', '', '', '2,3,4', '10', '3', '30000.00', '29100.00', '2018-05-15 08:41:03', 4, NULL, NULL, '0'),
(24, '878099000845020', 'Saara Solid, Geometric Print, Printed Daily', 'Saara Solid, Geometric Print, Printed Daily', 3000, 2, 'wejiye4007-7.jpg', 3, '5', '', '', '21,22,23', '100', '0', '300000.00', '300000.00', '2018-05-15 08:41:31', 4, NULL, NULL, '0'),
(25, '898469425907082', 'Tripr Men Solid Casual Shirt', 'Tripr Men Solid Casual Shirt', 3000, 1, '46-bfrybluesht02-being-fab-original-imaekjr8ymhnxznp.jpg', 2, '3', '', '', '8,9,10', '1', '0', '3000.00', '3000.00', '2018-05-15 08:42:21', 4, NULL, NULL, '0'),
(26, '914243077816045', 'Tripr Men Solid Casual Shirt', 'Tripr Men Solid Casual Shirt', 2000, 1, '457cc1b7-24da-4688-8dff-e04c20012992.jpg', 2, '3', '', '', '23,24,25', '10', '20', '20000.00', '16000.00', '2018-05-15 08:42:43', 4, NULL, NULL, '0'),
(27, '092019165927857', 'Tripr Men Solid Casual Shirt', 'Tripr Men Solid Casual Shirt', 300, 1, 'hbeu50260064_410_21.jpg', 2, '3', '', '', '2,25,26', '10', '20', '3000.00', '2400.00', '2018-05-15 08:43:05', 4, NULL, NULL, '0'),
(28, '314790233835434', 'Tripr Men Solid Casual Shirt', 'Tripr Men Solid Casual Shirt', 2500, 1, 'hbeu50260064_410_21.jpg', 2, '3', '', '', '1,2,3', '20', '30', '50000.00', '35000.00', '2018-05-15 08:43:27', 4, NULL, NULL, '0'),
(29, '454481061184443', 'Tripr Men Solid Casual Shirt', 'Tripr Men Solid Casual Shirt', 1000, 1, 'images.jpg', 2, '3', '', '', '26,27,28', '20', '0', '20000.00', '20000.00', '2018-05-15 08:43:52', 4, NULL, NULL, '0'),
(30, '669699600532012', 'Tripr Men Solid Casual Shirt', 'Tripr Men Solid Casual Shirt', 300, 1, 'no-logo-sky-blue-casual-shirt.jpg', 2, '3', '', '', '27,28,29', '10', '30', '3000.00', '2100.00', '2018-05-15 08:44:16', 4, NULL, NULL, '0'),
(31, '525162706336965', 'Elepants Graphic Print Men', 'Elepants Graphic Print Men', 100, 2, '500_3ebccf3d-d88f-453f-a9f1-244c61ea6f54_grande.png', 2, '4', '', '', '28,29,30', '30', '10', '3000.00', '2700.00', '2018-05-15 08:45:40', 4, NULL, NULL, '0'),
(32, '501780530593098', 'Elepants Graphic Print Men', 'Elepants Graphic Print Men', 3000, 1, 'thumb.jpg', 2, '4', '', '', '29,30,31', '10', '0', '30000.00', '30000.00', '2018-05-15 08:48:17', 4, NULL, NULL, '0'),
(33, '874403861904912', 'Elepants Graphic Print Men', 'Elepants Graphic Print Men', 3000, 1, 'catalog_detail_image_large.jpg', 2, '4', '', '', '1,2,3', '1', '0', '3000.00', '3000.00', '2018-05-15 08:48:38', 4, NULL, NULL, '0'),
(34, '918877308198963', 'Elepants Graphic Print Men', 'Elepants Graphic Print Men', 2500, 1, 'el-gts139-s8-arctic_1.jpg', 2, '4', '', '', '31,32,33', '10', '0', '25000.00', '25000.00', '2018-05-15 08:49:05', 4, NULL, NULL, '0'),
(35, '921969555560372', 'Elepants Graphic Print Men', 'Elepants Graphic Print Men', 200, 2, 's-ts900406-ghpc-original-imaez6yqz8vgjsed.jpg', 2, '4', '', '', '32,33,34', '10', '0', '2000.00', '2000.00', '2018-05-15 08:49:26', 4, NULL, NULL, '0'),
(36, '141664602573202', 'Elepants Graphic Print Men', 'Elepants Graphic Print Men', 200, 3, 'thumb.jpg', 2, '4', '', '', '33,34,35', '10', '30', '2000.00', '1400.00', '2018-05-15 08:49:49', 4, NULL, NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_detail`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_size`
--

CREATE TABLE IF NOT EXISTS `tbl_size` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `size` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `status_delete` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider_images`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_slider_images`
--

INSERT INTO `tbl_slider_images` (`id`, `name`, `created_by`, `created_date`, `modified_by`, `modified_date`, `status`, `views`) VALUES
(1, 'e-commerce.jpg', 4, '2018-05-15 08:50:24', 0, '0000-00-00 00:00:00', 'active', 0),
(2, 'ecommerce-slider-1.jpg', 4, '2018-05-15 08:50:29', 0, '0000-00-00 00:00:00', 'active', 0),
(3, 'newcommerce-sliders.jpg', 4, '2018-05-15 08:50:34', 0, '0000-00-00 00:00:00', 'active', 0),
(4, 'php-tutorial-build-an-ecommerce-website-slider.jpg', 4, '2018-05-15 08:50:38', 0, '0000-00-00 00:00:00', 'active', 0),
(5, 'slider_13.jpg', 4, '2018-05-15 08:50:42', 0, '0000-00-00 00:00:00', 'active', 0),
(6, 'slider1.jpg', 4, '2018-05-15 08:50:48', 0, '0000-00-00 00:00:00', 'active', 0),
(7, 'slider3.jpg', 4, '2018-05-15 08:50:52', 0, '0000-00-00 00:00:00', 'active', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcat_id`, `parent_category_id`, `subcategory_name`, `image`, `created_by`, `modified_by`, `modified_date`, `created_date`, `status`) VALUES
(1, 1, 'Soft Toys', '1-piece-30cm-small-cute-teddy-bears-stuffed-animals-soft-plush-toys-white-beige-brown_jpg_640x640.jpg', 4, NULL, NULL, '2018-05-15 08:28:39', '0'),
(2, 4, 'Paintings', '86b4faa343cd8c43c38335df6bca2172.jpg', 4, NULL, NULL, '2018-05-15 08:28:52', '0'),
(3, 2, 'Shirts', '457cc1b7-24da-4688-8dff-e04c20012992.jpg', 4, NULL, NULL, '2018-05-15 08:29:09', '0'),
(4, 2, 'T-Shirts', '500_3ebccf3d-d88f-453f-a9f1-244c61ea6f54_grande.png', 4, NULL, NULL, '2018-05-15 08:29:19', '0'),
(5, 3, 'Sarees', '0f61b7b1bb3966bc7cb9e9903070a548.jpg', 4, NULL, NULL, '2018-05-15 08:29:34', '0'),
(6, 3, 'Kurtas & Kurtis', 'rayon-size-xl-top-cash-on-delivery.jpg', 4, NULL, NULL, '2018-05-15 08:29:44', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE IF NOT EXISTS `tbl_wishlist` (
  `wish_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_price` double NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`wish_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE IF NOT EXISTS `user_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `room_no` varchar(255) NOT NULL,
  `floor` varchar(255) NOT NULL,
  `building` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `secondary_address` text NOT NULL,
  `created_date` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id`, `firstname`, `middlename`, `lastname`, `email`, `password`, `profile`, `mobile`, `whatsapp`, `room_no`, `floor`, `building`, `street`, `area`, `city`, `pincode`, `state`, `country`, `secondary_address`, `created_date`, `status`, `created_by`) VALUES
(4, 'bladephp', 'bladephp', 'bladephp', 'admin@bladephp.co', '123456', '', '9979133538', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0', '1'),
(6, 'kaleem', '', 'khan', 'kaleem.khan287@gmail.com', 'abc', '', '123', '', '', '', '', '', '', '', '', '', '', '', '2017-06-21 15:00:25', '0', '4'),
(7, 'Vishal', '', 'Panchal', 'vishal.panchal@bypt.in', '111111', '', '7407405555', '', '', '', '', '', '', '', '', '', '', '', '2017-06-21 15:28:18', '0', '4'),
(8, 'aviral', '', 'shukla', 'aviralshukla84@gmail.com', '56789', '', '8565857803', '', '', '', '', '', '', '', '', '', '', '', '2017-09-18 15:40:04', '0', '4'),
(9, 'garmyan', '', 'abdulla', 'garmyanabdula@gmail.com', '123456', '', '6666666', '', '', '', '', '', '', '', '', '', '', '', '2017-09-26 01:38:40', '0', '4'),
(10, 'Evelyne', '', 'Eliakim', 'virusverda@gmail.com', '1029RNwaka', '', '+255674497230', '', '', '', '', '', '', '', '', '', '', '', '2018-01-29 21:57:44', '0', '4'),
(11, 'Evelyne', '', 'Eliakim', 'evelyneeliakim@gmail.com', '1029RNwaka', '', '+255674497230', '', '', '', '', '', '', '', '', '', '', '', '2018-01-29 21:58:06', '0', '4'),
(12, 'charli', '', 'james', 'charli@gmail.com', 'char123', '', '123456', '', '', '', '', '', '', '', '', '', '', '', '2018-02-15 13:07:45', '0', '4'),
(13, 'ajay', '', 'nishad', 'ajay0333nishad@gmail.com', 'ajay', '', '9718012194', '', '', '', '', '', '', '', '', '', '', '', '2018-03-24 16:12:26', '0', '4');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
