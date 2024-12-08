-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2024 at 08:17 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_address` text NOT NULL,
  `admin_about` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_address`, `admin_about`, `admin_contact`, `admin_role`) VALUES
(1, 'Himal Rasaily', 'himalrasaily49@gmail.com', 'himal123', 'mypic.jpg', 'Barahatal-9 surkhet', ' my name is himal rasaily. i am a admin of this palne', '9749755143', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `boxes_section`
--

CREATE TABLE `boxes_section` (
  `box_id` int(10) NOT NULL,
  `box_title` text NOT NULL,
  `box_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `boxes_section`
--

INSERT INTO `boxes_section` (`box_id`, `box_title`, `box_desc`) VALUES
(2, '  New Title Box Best Offers  ', 'New Lorem  dolor sit amet consectetur adipisicing elit. Laborum nam voluptate ipsum, quasi, soluta voluptatem eligendi voluptatum officia sed, molestiae tempore corrupti similique'),
(3, 'New Title Box 100% Satisfy ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum nam voluptate ipsum, quasi, soluta voluptatem eligendi voluptatum officia sed, molestiae tempore corrupti similique? Deserunt odio fugit facere voluptate consequuntur doloremque?'),
(4, 'New Title Box New Box Title 4 ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum, aliquid veritatis amet ad saepe nesciunt eos? Quas ipsum laboriosam hic sunt fugit cumque maiores! Ducimus officiis commodi consequuntur rerum minima.');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_top` text NOT NULL,
  `cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_top`, `cat_image`) VALUES
(5, 'Mans', 'yes', 'photos of man.png'),
(6, 'Women', 'yes', 'girl photo.webp'),
(7, 'Kids', 'yes', 'kid photo.jpg'),
(8, 'others', 'yes', 'galleries-1-1200x800.png');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_province` varchar(255) NOT NULL,
  `customer_district` varchar(255) NOT NULL,
  `customer_Rural_municipality` varchar(255) NOT NULL,
  `customer_word_no` varchar(255) NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_contact`, `customer_province`, `customer_district`, `customer_Rural_municipality`, `customer_word_no`, `customer_image`, `customer_ip`) VALUES
(8, 'Himal Rasaily', 'himalrasaily49@gmal.com', '123', '9749755143', 'province 6 (Karnali province)', 'Surkhet', 'Barahtal rural municipality', 'Ward.no 09', 'mypic.jpg', '::1'),
(12, 'gaumaya bk', 'gaumayabk24@gmail.com', '', '', '', '', '', '', 'https://lh3.googleusercontent.com/a/ACg8ocIExisEtFekLzBJs4jjfN9ySTA1Jz-wWS2V0pSBwXMoAbXOaw=s96-c', '::1'),
(13, 'himal B.k', 'himalrasaily965@gmail.com', '1234', '9749755134', 'Karnali province', 'Surkhet', 'Barahtal rural municipality', 'Ward.no 09', '', '::1'),
(14, 'Himal Rasaily', 'himalrasaily49@gmail.com', '123', '9749755143', 'Karnali province', 'Surkhet', 'Barahtal rural municipality', 'Ward.no 09', '', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_date` date NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES
(24, 8, 8890, 418209686, 2, 'Medium', '2024-06-26', 'pending'),
(25, 8, 1971, 2120100170, 1, 'Small', '2024-06-26', 'pending'),
(27, 8, 9999, 1675171513, 1, 'Small', '2024-06-26', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `manufacturer_id` int(10) NOT NULL,
  `manufacturer_title` text NOT NULL,
  `manufacturer_top` text NOT NULL,
  `manufacturer_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`manufacturer_id`, `manufacturer_title`, `manufacturer_top`, `manufacturer_image`) VALUES
(8, 'Nike', 'yes', 'logo of nike.png'),
(9, 'Adidas', 'yes', 'logo of adidas.png'),
(10, 'Prada', 'yes', 'logo of prada.jpg'),
(11, 'Gucci', 'yes', 'logo of gucci.webp');

-- --------------------------------------------------------

--
-- Table structure for table `order_reciver_details`
--

CREATE TABLE `order_reciver_details` (
  `customer_id` int(10) NOT NULL,
  `reciver_name` varchar(255) NOT NULL,
  `reciver_phone` varchar(255) NOT NULL,
  `reciver_email` varchar(255) NOT NULL,
  `reciver_province` varchar(255) NOT NULL,
  `reciver_district` varchar(255) NOT NULL,
  `reciver_Rural_municipality` varchar(255) NOT NULL,
  `reciver_word_no` varchar(255) NOT NULL,
  `reciver_location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_reciver_details`
--

INSERT INTO `order_reciver_details` (`customer_id`, `reciver_name`, `reciver_phone`, `reciver_email`, `reciver_province`, `reciver_district`, `reciver_Rural_municipality`, `reciver_word_no`, `reciver_location`) VALUES
(8, 'Himal Rasaily', 'himalrasaily49@gmal.com', '9749755143', 'province 6 (Karnali province)', 'Surkhet', 'Barahtal rural municipality', 'Ward.no 09', 'birendranagar'),
(8, 'Himal Rasaily', '9749755143', 'himalrasaily49@gmal.com', 'province 6 (Karnali province)', 'Surkhet', 'Barahtal rural municipality', 'Ward.no 09', 'birendranagar'),
(7, 'Himal Rasaily', '9700220220', 'himalrasail49@gmal.com', 'province 6 (Karnali province)', 'Surkhet', 'Birendranagar municipality', 'Ward.no 06', 'birendranagar'),
(8, 'Himal Rasaily', '9749755143', 'himalrasaily49@gmal.com', 'province 6 (Karnali province)', 'Surkhet', 'Barahtal rural municipality', 'Ward.no 09', 'birendranagar'),
(8, 'Himal Rasaily', '9749755143', 'himalrasaily49@gmal.com', 'province 6 (Karnali province)', 'Surkhet', 'Barahtal rural municipality', 'Ward.no 09', 'birendranagar'),
(8, 'Himal Rasaily', '9749755143', 'himalrasaily49@gmal.com', 'province 6 (Karnali province)', 'Surkhet', 'Barahtal rural municipality', 'Ward.no 09', 'birendranagar');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(10) NOT NULL,
  `code` int(10) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `vendor_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` text NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `vendor_id`, `invoice_no`, `product_id`, `qty`, `size`, `order_status`) VALUES
(24, 8, 3, 418209686, '25', 2, 'Medium', 'pending'),
(25, 8, 3, 2120100170, '43', 1, 'Small', 'completed'),
(27, 8, 0, 1675171513, '54', 1, 'Small', 'pending');



-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `sells` (
  `sell_id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` int(10) NOT NULL,
  `sell_price` int(10) NOT NULL,
  PRIMARY KEY (`sell_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `manufacturer_id` int(10) NOT NULL,
  `vendor_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  
  `product_keywords` text NOT NULL,
  `product_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `manufacturer_id`, `vendor_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_keywords`, `product_desc`) VALUES
(20, 6, 5, 8, 3, '2024-12-03 18:22:55', 'NIKE Dri Fit Academy', 'nike dri fit academy        1495.jpeg', 'nike dri fit academy 1.png', 'nike dri fit academy.jpeg', 1495, 't-shirt', '<p><strong>S<em>tay comfortable and stylish in this Nike branded t-shirt. Made with soft, breathable fabric, this shirt is perfect for workouts or casual wear. The iconic Nike logo adds a sporty touch to your look. Upgrade your wardrobe with this versatile and trendy t-shirt</em>.</strong></p>\r\n<p>&nbsp;</p>'),
(21, 8, 5, 0, 0, '2024-06-06 09:07:14', 'NIKE acg mountain fly', 'nike acg mountain fly 1.png', 'nike acg mountain fly 2   13995.png', 'nike dri fit academy 1.png', 3999, 'shoes', '<p style=\"text-align: justify;\"><em>Nike brand shoes are recognized around the world for their exceptional performance, comfort, and style. With a focus on innovation and cutting-edge technology, Nike offers a wide range of athletic footwear for all sports and activities. Whether you are a professional athlete or just enjoy staying active, Nike shoes provide superior cushioning, support, and durability to help you reach your full potential. From iconic designs like Air Max and Air Jordan to the latest advancements in running and training shoes, Nike has something for everyone. Choose Nike and step up your game with the best in footwear technology.</em></p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>'),
(22, 7, 5, 8, 0, '2024-06-06 09:12:59', 'NIKE club', 'nike club    4695.png', 'nike club   1.png', 'nike club.png', 4695, 'jacket', '<p style=\"text-align: justify;\"><em>The Nike brand jacket is a versatile and sleek outerwear option designed for both performance and style. Made with high-quality materials, this jacket offers comfort, durability, and protection from the elements. The iconic Nike logo adds a sporty touch to the design, while features like adjustable hoods, zippered pockets, and breathable fabric make this jacket perfect for any active lifestyle.</em></p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>'),
(23, 6, 6, 8, 3, '2024-12-03 18:22:55', 'NIKE sportwear essential', 'nike sportswear essential      699.95.png', 'sport swear 1.png', 'sport swear 2.png', 699, 't-shirt', '<p>this t-shirt is very good for womens. this is nike brands and it is very good quility.</p>'),
(24, 8, 6, 8, 3, '2024-12-03 18:22:55', 'Air max ', 'nike air max 90 LV8        13995.png', 'air max 1.png', 'air max 2.png', 3445, 'shoes', '<p>it is a good product of nike brands. this shoes is flexible and soft.</p>'),
(25, 7, 6, 8, 3, '2024-12-03 18:22:55', 'running jacket', 'running jacket     8995.png', 'running division 1.png', 'running division 2.png', 4445, 'jacket', '<p>this jacket is nike brands product. that is very soft and comfortable for women.</p>'),
(26, 6, 7, 8, 3, '2024-12-03 18:22:55', 'dri fit short sleeve', 'dri fit short sleeve   1695.png', 'short sleeve t shirt 1.png', 'short sleeve t shirt 2.png', 1695, 't-shirt', '<p>this is a nike brands t shirt. this is very comfortable product for kids.</p>'),
(27, 8, 7, 8, 0, '2024-06-06 09:47:43', 'Air max', 'nike air max dn     9995.png', 'air max 1.jpeg', 'air max 2.png', 4395, 'shoes', '<p>this is nike brands shoes. this shoes are very comfortable and soft for kids.</p>'),
(28, 7, 7, 8, 0, '2024-06-06 09:49:07', 'repel long sleeve jacket', 'repel long sleeve zip    3507.jpeg', 'long sleeve jacket 1.jpeg', 'long sleeve 2.png', 3507, 'jacket', '<p>the jacekt is nike brands product. that is very cool and stylish for kids.</p>'),
(29, 6, 7, 9, 0, '2024-06-06 09:55:55', 'tiro tee ', 'tiro tee kids     1847.avif', 'hover model  1.avif', 'hover model 2.avif', 1847, 't-shirt', '<p>this t shirt is adidas brands product. this is very comfortable for kids.</p>'),
(30, 8, 7, 9, 0, '2024-06-06 09:57:53', 'cross em up select shoes ', 'cross em up select shoes      3135.avif', 'cross em 1.avif', 'cross em2.avif', 3135, 'shoes', '<p>this shoes is adidas brands product. that is very cool and stylish for kids.</p>'),
(31, 7, 7, 9, 0, '2024-06-06 10:01:10', 'wind breaker jacket', 'wind breaker jacket    2999.avif', 'wind breaker 1.avif', 'wind breaker 2.avif', 2999, 'jacket', '<p>it is a very coolest jacket for kids which is very low cost and very qualityable product made by adidas.</p>'),
(32, 6, 5, 9, 0, '2024-06-06 10:06:08', 'long sleeve tee', 'long sleeve tee      2700.avif', 'long sleeve tee 1.avif', 'long sleeve tee 2.avif', 2700, 't-shirt', '<p>this t shirt is adidas brands product. that is very soft, cool, and comfortable for mans.</p>'),
(33, 8, 5, 9, 3, '2024-12-03 18:22:55', 'crazy infinity shoes', 'crazy infinity shoes    10400.avif', 'crazy infinity shoes 1.avif', 'crazy infinity shoes 2.avif', 5400, 'shoes', '<p>this shoes is adidas brands product. this is very cool and stylish for mans.</p>'),
(34, 7, 5, 9, 3, '2024-12-03 18:22:55', 'hooded jacket', 'hooded jacket    6599.avif', 'hooded jacket 1.avif', 'hooded jacket 2.avif', 3570, 'jacket', '<p>this product is adidas brands. this is very soft and cool for mans.</p>'),
(35, 6, 6, 9, 0, '2024-06-06 10:11:32', 'women t shirt', 'women t shirt  790.jpg', 'women t shirt 1.jpg', 'women t shirt 2.jpg', 790, 't-shirt', '<p>this t shirt is adidas brands. this is very comfortable for women.</p>'),
(36, 8, 6, 9, 0, '2024-06-06 10:13:11', 'ozgaia shoes', 'ozgaia shoes      8999.avif', 'ozgaia shoes 1.avif', 'ozgaia shoes 2.avif', 5500, 'shoes', '<p>this shoes is adidas brands. that is very stylish shoes for women.</p>'),
(37, 7, 6, 9, 0, '2024-06-06 10:14:51', 'helionic relaxed down jacket', 'helionic relaxed down jacket         9519.avif', 'helionic relaxed down jacket    1.avif', 'helionic relaxed down jacket  2.avif', 4545, 'jacket', '<p>this jacket is adidas brands. this is very fool and comfortable for women.</p>'),
(38, 6, 7, 11, 0, '2024-06-06 10:17:22', 'logo print t shirt in cotton  ', 'logo print t shirt in cotton    1050.webp', 'logo print t shirt in cotton   1.webp', 'logo print t shirt in cotton 2.webp', 1050, 't-shirt', '<p>this t shirt is gucci brands product. that is very cool for kids.</p>'),
(39, 8, 7, 11, 0, '2024-06-06 10:18:43', 'gucci leather shoes', 'gucci leather sneakers       4500.jpeg', 'gucci leather shoes  1.webp', 'gucci leather shoes 2.webp', 4500, 'shoes', '<p>this shoes is gucci brands product. that is very comfortable for kids.</p>'),
(40, 7, 7, 11, 0, '2024-06-06 10:19:59', 'sweat jacket', 'sweat jacket 2700.webp', 'sweat jacket 1.webp', 'sweat jacket 2.webp', 2795, 'jacket', '<p>this jacket is gucci brands. this is very coolest for kids.</p>'),
(41, 6, 5, 11, 0, '2024-06-06 10:21:23', 'blade logo print cotton t shirt  ', 'blade logo print cotton t shirt     2500.webp', 'blade logo print cotton t shirt    1.webp', 'blade logo print cotton t shirt     2.webp', 2599, 't-shirt', '<p>this t shirt is gucci brands. that is very comfortable for mans.</p>'),
(42, 8, 5, 11, 0, '2024-06-06 10:23:33', 'run leather sneakers ', 'run leather sneakers      10020.webp', 'run leather sneakers   1.webp', 'run leather sneakers      2.webp', 5599, 'shoes', '<p>this shoes is gucci brands. that is very cool and stylish for mans.</p>'),
(43, 7, 5, 11, 3, '2024-12-03 18:22:55', 'colour block bomber jacket', 'colour block bomber jacket   1971.webp', 'color block bomber jacket  1.webp', 'color block bomber jacket  2.webp', 1971, 'jacket', '<p>this jacket is gucci brands. that is very cool and comfortable for mans.</p>'),
(44, 6, 6, 11, 0, '2024-06-06 10:26:11', 'logo print cotton t shirt', 'logo print cotton t shirt    2200.webp', 'logo print cotton t shirt    1.webp', 'logo print cotton t shirt    2.webp', 2299, 't-shirt', '<p>this t shirt is gucci brands. this is very cool t shirt for women.</p>'),
(45, 8, 6, 11, 0, '2024-06-06 10:27:34', 'perforated logo lace up sneakers ', 'perforated logo lace up sneakers   8400.webp', 'perforated logo lace up sneakers   1.webp', 'perforated logo lace up sneakers   2.webp', 4499, 'shoes', '<p>this shoes is guccu brands. that is very stylish shoes for women.</p>'),
(46, 7, 6, 11, 0, '2024-06-06 10:28:58', 'interlocking g logo tweed jacket', 'ointerlocking g logo tweed jacket     3085.webp', 'interlocking g logo tweed jacket   1.webp', 'interlocking g logo tweed jacket   2.jpg', 3085, 'jacket', '<p>this jacket is gucci brands. that is very cool and comfortable for women.</p>'),
(47, 6, 7, 10, 0, '2024-06-06 10:30:16', 'prada t shirt', 'prada t shirt     1700.jpeg', 'prada t shirt 1.jpeg', 'prada t shirt 2.jpeg', 1799, 't-shirt', '<p>this t shirt is prada brands. that is very cool t shirt for kids.</p>'),
(48, 8, 7, 10, 0, '2024-06-06 10:31:32', 'soft sneakers black and white sneakers', 'soft sneakers shoes black white size      4500.webp', 'black white smeakers 1.webp', 'black white sneakers 2.webp', 4599, 'shoes', '<p>this shoes is prada brands. that is very cool and stylish for kids.</p>'),
(49, 7, 7, 10, 0, '2024-06-06 10:32:43', 'nayomar jacket', 'nayomar jacket      3500.jpg', 'nayomar 1.jpg', 'nayomar 2.jpg', 3599, 'jacket', '<p>this jacket is prada brands. that is very comfortable for kids.</p>'),
(50, 6, 5, 10, 0, '2024-06-06 10:34:19', 'logo intarsia jumper', 'logo intarsia wool jumper      1045.jpg', 'logo intarsia jumper  1.webp', 'logo intarsia jumper  2.webp', 1045, 't-shirt', '<p>this t shirt is prada brands. that is very cool for mans.</p>'),
(51, 8, 5, 10, 0, '2024-06-06 10:35:40', 'diamond quilted leather shoes', 'diamond quilted leather sneakers     12350.jpg', 'diamond quilted leather shoes    1.webp', 'diamond quilted leather shoes    2.webp', 6099, 'shoes', '<p>this shoes is prada brands. that is very coolest and stylish for mans.</p>'),
(52, 7, 5, 10, 0, '2024-06-06 10:37:00', 'pannelled hooded jacket', 'panelled hooded jacket      2190.webp', 'pannelled hooded   1.webp', 'pannelled hooded 2.webp', 2190, 'jacket', '<p>this jacket is prada brands. that is very cool and stylish for mans.</p>'),
(53, 6, 6, 10, 0, '2024-06-06 10:38:26', 'embroidered jersey t shirt', 'embroidered jersey t shirt     1420.webp', 'embroidered jersey  t shirt 1.webp', 'embroidered jersey  t shirt 2.webp', 1420, 't-shirt', '<p>this t shirt is prada brands. that is very cool for women.</p>'),
(54, 8, 6, 10, 0, '2024-06-06 10:39:51', 'monolith pounch detail leather boots', 'monolith pouch detail leather boots     19330.webp', 'monolith pouch detail leather shoes  1.webp', 'monolith pouch detail leather boots   2.webp', 9999, 'shoes', '<p>this shoes is prada brands. that is very stylish for women.</p>'),
(55, 7, 6, 10, 0, '2024-06-06 10:41:22', 're nylon down jacket', 're nylon down jacket     4310.webp', 're nylon down jacket 1.webp', 're nylon down jacket 2.webp', 4310, 'jacket', '<p>this jacket is prada brands. that is very cool and stylish for women.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_top` text NOT NULL,
  `p_cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_top`, `p_cat_image`) VALUES
(6, 'T-shirt', 'yes', 'nike dri fit academy        1495.jpeg'),
(7, 'Jacket', 'yes', 'coaches jacket     4995.png'),
(8, 'Shoes', 'yes', 'air jordan 1 low se craft    10795.png');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `r_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `r_text` text NOT NULL,
  `r_rating` int(10) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`r_id`, `product_id`, `user_id`, `r_text`, `r_rating`, `date`) VALUES
(0, 21, 8, 'Fantastic value for money!', 2, '2024-08-15 00:00:00'),
(0, 38, 13, 'Quality is average for the price.', 1, '2024-01-28 00:00:00'),
(0, 23, 8, 'Quality is average for the price.', 3, '2024-04-22 00:00:00'),
(0, 28, 13, 'Absolutely love it! Worth every penny.', 1, '2024-02-19 00:00:00'),
(0, 35, 13, 'Great product, highly recommended!', 5, '2024-09-05 00:00:00'),
(0, 34, 8, 'Great product, highly recommended!', 4, '2024-08-16 00:00:00'),
(0, 31, 12, 'Disappointed with the quality.', 4, '2024-06-15 00:00:00'),
(0, 44, 12, 'Exceeded my expectations. Will buy again.', 2, '2024-10-27 00:00:00'),
(0, 42, 8, 'Great product, highly recommended!', 5, '2024-05-02 00:00:00'),
(0, 20, 12, 'Disappointed with the quality.', 1, '2024-08-03 00:00:00'),
(0, 22, 12, 'Fantastic value for money!', 3, '2024-06-01 00:00:00'),
(0, 22, 13, 'Quality is average for the price.', 2, '2024-07-13 00:00:00'),
(0, 43, 12, 'Product arrived late, but works well.', 1, '2024-05-09 00:00:00'),
(0, 29, 8, 'Product arrived late, but works well.', 1, '2024-07-06 00:00:00'),
(0, 37, 8, 'Great product, highly recommended!', 4, '2024-09-30 00:00:00'),
(0, 40, 12, 'Disappointed with the quality.', 5, '2023-12-05 00:00:00'),
(0, 30, 8, 'Great product, highly recommended!', 2, '2024-09-07 00:00:00'),
(0, 26, 12, 'Not bad, but could be better.', 5, '2024-07-15 00:00:00'),
(0, 20, 8, 'Great product, highly recommended!', 1, '2024-09-03 00:00:00'),
(0, 20, 12, 'Great product, highly recommended!', 5, '2024-08-14 00:00:00'),
(0, 41, 12, 'Product arrived late, but works well.', 2, '2024-01-04 00:00:00'),
(0, 42, 13, 'Quality is average for the price.', 3, '2024-09-27 00:00:00'),
(0, 32, 13, 'Exceeded my expectations. Will buy again.', 4, '2024-09-23 00:00:00'),
(0, 22, 13, 'Quality is average for the price.', 3, '2024-09-26 00:00:00'),
(0, 28, 8, 'Product arrived late, but works well.', 2, '2024-10-04 00:00:00'),
(0, 44, 12, 'Disappointed with the quality.', 5, '2024-10-04 00:00:00'),
(0, 22, 8, 'Great product, highly recommended!', 5, '2024-02-28 00:00:00'),
(0, 42, 8, 'Great product, highly recommended!', 4, '2024-08-28 00:00:00'),
(0, 28, 13, 'Product arrived late, but works well.', 2, '2024-02-18 00:00:00'),
(0, 43, 12, 'Fantastic value for money!', 4, '2024-04-02 00:00:00'),
(0, 25, 8, 'Fantastic value for money!', 3, '2024-01-20 00:00:00'),
(0, 35, 12, 'Disappointed with the quality.', 2, '2024-09-21 00:00:00'),
(0, 21, 13, 'Absolutely love it! Worth every penny.', 3, '2024-11-25 00:00:00'),
(0, 32, 12, 'Exceeded my expectations. Will buy again.', 2, '2024-04-28 00:00:00'),
(0, 24, 8, 'Disappointed with the quality.', 4, '2024-05-10 00:00:00'),
(0, 31, 12, 'Product arrived late, but works well.', 3, '2024-04-26 00:00:00'),
(0, 31, 12, 'Product arrived late, but works well.', 2, '2024-05-29 00:00:00'),
(0, 34, 12, 'Great product, highly recommended!', 5, '2023-12-18 00:00:00'),
(0, 40, 8, 'Quality is average for the price.', 3, '2024-06-29 00:00:00'),
(0, 33, 12, 'Product arrived late, but works well.', 2, '2024-09-30 00:00:00'),
(0, 20, 12, 'Great product, highly recommended!', 1, '2024-01-02 00:00:00'),
(0, 20, 12, 'Disappointed with the quality.', 5, '2024-08-14 00:00:00'),
(0, 36, 12, 'Fantastic value for money!', 3, '2024-05-19 00:00:00'),
(0, 28, 8, 'Great product, highly recommended!', 2, '2024-07-09 00:00:00'),
(0, 20, 13, 'Disappointed with the quality.', 2, '2024-05-22 00:00:00'),
(0, 21, 12, 'Fantastic value for money!', 4, '2024-01-11 00:00:00'),
(0, 27, 13, 'Not bad, but could be better.', 4, '2024-04-01 00:00:00'),
(0, 28, 13, 'Exceeded my expectations. Will buy again.', 5, '2024-11-25 00:00:00'),
(0, 35, 8, 'Exceeded my expectations. Will buy again.', 4, '2024-09-02 00:00:00'),
(0, 26, 12, 'Disappointed with the quality.', 4, '2024-01-13 00:00:00'),
(0, 29, 8, 'Great product, highly recommended!', 4, '2024-07-09 00:00:00'),
(0, 39, 13, 'Exceeded my expectations. Will buy again.', 2, '2024-05-11 00:00:00'),
(0, 43, 8, 'Exceeded my expectations. Will buy again.', 2, '2023-12-05 00:00:00'),
(0, 41, 12, 'Great product, highly recommended!', 2, '2024-03-31 00:00:00'),
(0, 25, 8, 'Great product, highly recommended!', 5, '2024-07-03 00:00:00'),
(0, 27, 8, 'Not bad, but could be better.', 3, '2024-07-03 00:00:00'),
(0, 41, 13, 'Quality is average for the price.', 5, '2024-05-06 00:00:00'),
(0, 21, 12, 'Absolutely love it! Worth every penny.', 1, '2024-02-12 00:00:00'),
(0, 39, 12, 'Great product, highly recommended!', 4, '2024-07-10 00:00:00'),
(0, 42, 12, 'Great product, highly recommended!', 3, '2024-03-18 00:00:00'),
(0, 28, 12, 'Fantastic value for money!', 5, '2024-03-23 00:00:00'),
(0, 39, 13, 'Disappointed with the quality.', 3, '2023-12-13 00:00:00'),
(0, 31, 12, 'Product arrived late, but works well.', 5, '2023-12-19 00:00:00'),
(0, 41, 12, 'Absolutely love it! Worth every penny.', 2, '2024-11-13 00:00:00'),
(0, 27, 12, 'Fantastic value for money!', 4, '2024-03-19 00:00:00'),
(0, 29, 13, 'Absolutely love it! Worth every penny.', 2, '2024-06-27 00:00:00'),
(0, 44, 12, 'Great product, highly recommended!', 4, '2024-01-15 00:00:00'),
(0, 33, 13, 'Not bad, but could be better.', 2, '2023-12-23 00:00:00'),
(0, 38, 13, 'Disappointed with the quality.', 4, '2024-07-05 00:00:00'),
(0, 37, 8, 'Exceeded my expectations. Will buy again.', 3, '2024-03-16 00:00:00'),
(0, 21, 8, 'Fantastic value for money!', 2, '2024-11-16 00:00:00'),
(0, 35, 13, 'Fantastic value for money!', 5, '2024-11-17 00:00:00'),
(0, 25, 13, 'Not bad, but could be better.', 1, '2024-08-25 00:00:00'),
(0, 39, 8, 'Quality is average for the price.', 3, '2024-03-07 00:00:00'),
(0, 42, 8, 'Disappointed with the quality.', 2, '2024-10-20 00:00:00'),
(0, 34, 12, 'Great product, highly recommended!', 3, '2024-08-29 00:00:00'),
(0, 42, 13, 'Disappointed with the quality.', 1, '2024-10-08 00:00:00'),
(0, 28, 8, 'Great product, highly recommended!', 5, '2024-01-23 00:00:00'),
(0, 40, 12, 'Great product, highly recommended!', 4, '2024-10-21 00:00:00'),
(0, 36, 13, 'Fantastic value for money!', 3, '2024-09-11 00:00:00'),
(0, 29, 8, 'Absolutely love it! Worth every penny.', 4, '2024-06-20 00:00:00'),
(0, 27, 8, 'Absolutely love it! Worth every penny.', 3, '2024-02-22 00:00:00'),
(0, 31, 13, 'Not bad, but could be better.', 2, '2024-03-23 00:00:00'),
(0, 37, 12, 'Not bad, but could be better.', 3, '2024-11-10 00:00:00'),
(0, 38, 12, 'Quality is average for the price.', 4, '2024-10-21 00:00:00'),
(0, 32, 8, 'Disappointed with the quality.', 5, '2024-11-24 00:00:00'),
(0, 31, 8, 'Quality is average for the price.', 4, '2024-06-24 00:00:00'),
(0, 43, 12, 'Exceeded my expectations. Will buy again.', 1, '2024-04-15 00:00:00'),
(0, 42, 12, 'Exceeded my expectations. Will buy again.', 4, '2024-07-19 00:00:00'),
(0, 43, 12, 'Disappointed with the quality.', 4, '2024-02-19 00:00:00'),
(0, 43, 8, 'Product arrived late, but works well.', 2, '2024-02-19 00:00:00'),
(0, 42, 8, 'Not bad, but could be better.', 3, '2024-11-14 00:00:00'),
(0, 35, 13, 'Fantastic value for money!', 5, '2024-03-28 00:00:00'),
(0, 36, 8, 'Quality is average for the price.', 3, '2024-01-21 00:00:00'),
(0, 44, 8, 'Quality is average for the price.', 4, '2024-04-30 00:00:00'),
(0, 23, 13, 'Disappointed with the quality.', 3, '2024-10-03 00:00:00'),
(0, 27, 13, 'Disappointed with the quality.', 2, '2024-01-18 00:00:00'),
(0, 34, 8, 'Disappointed with the quality.', 5, '2024-07-19 00:00:00'),
(0, 21, 8, 'Product arrived late, but works well.', 5, '2024-10-07 00:00:00'),
(0, 27, 13, 'Fantastic value for money!', 3, '2024-10-13 00:00:00'),
(0, 52, 13, 'this good ', 4, '2024-12-02 00:00:00'),
(0, 34, 12, 'Absolutely love it! Worth every penny.', 2, '2024-09-22 00:00:00'),
(0, 41, 13, 'Exceeded my expectations. Will buy again.', 5, '2023-12-14 00:00:00'),
(0, 20, 8, 'Disappointed with the quality.', 4, '2024-10-31 00:00:00'),
(0, 26, 13, 'Not bad, but could be better.', 5, '2024-03-19 00:00:00'),
(0, 20, 8, 'Not bad, but could be better.', 4, '2024-10-01 00:00:00'),
(0, 35, 12, 'Great product, highly recommended!', 3, '2023-12-10 00:00:00'),
(0, 36, 12, 'Not bad, but could be better.', 2, '2024-07-31 00:00:00'),
(0, 36, 12, 'Product arrived late, but works well.', 3, '2024-05-29 00:00:00'),
(0, 44, 12, 'Disappointed with the quality.', 4, '2024-04-28 00:00:00'),
(0, 36, 12, 'Disappointed with the quality.', 2, '2024-06-11 00:00:00'),
(0, 25, 13, 'Great product, highly recommended!', 4, '2024-01-09 00:00:00'),
(0, 24, 8, 'Great product, highly recommended!', 5, '2024-10-13 00:00:00'),
(0, 23, 12, 'Exceeded my expectations. Will buy again.', 4, '2024-07-14 00:00:00'),
(0, 41, 8, 'Not bad, but could be better.', 2, '2024-11-11 00:00:00'),
(0, 29, 13, 'Disappointed with the quality.', 3, '2024-07-18 00:00:00'),
(0, 26, 8, 'Disappointed with the quality.', 4, '2024-10-09 00:00:00'),
(0, 35, 12, 'Great product, highly recommended!', 2, '2024-02-28 00:00:00'),
(0, 38, 12, 'Disappointed with the quality.', 4, '2024-07-27 00:00:00'),
(0, 33, 12, 'Quality is average for the price.', 2, '2024-08-03 00:00:00'),
(0, 37, 12, 'Not bad, but could be better.', 4, '2024-06-26 00:00:00'),
(0, 29, 12, 'Disappointed with the quality.', 2, '2024-08-11 00:00:00'),
(0, 31, 12, 'Disappointed with the quality.', 3, '2024-08-05 00:00:00'),
(0, 21, 8, 'Exceeded my expectations. Will buy again.', 3, '2024-06-01 00:00:00'),
(0, 23, 8, 'Disappointed with the quality.', 2, '2024-07-09 00:00:00'),
(0, 41, 8, 'Great product, highly recommended!', 5, '2024-09-30 00:00:00'),
(0, 26, 13, 'Quality is average for the price.', 4, '2024-09-20 00:00:00'),
(0, 41, 13, 'Fantastic value for money!', 4, '2024-04-27 00:00:00'),
(0, 42, 13, 'Disappointed with the quality.', 5, '2024-06-21 00:00:00'),
(0, 27, 8, 'Great product, highly recommended!', 4, '2024-01-02 00:00:00'),
(0, 39, 8, 'Not bad, but could be better.', 5, '2024-06-03 00:00:00'),
(0, 44, 12, 'Fantastic value for money!', 3, '2024-05-31 00:00:00'),
(0, 25, 12, 'Disappointed with the quality.', 3, '2024-08-15 00:00:00'),
(0, 42, 12, 'Fantastic value for money!', 2, '2024-04-20 00:00:00'),
(0, 24, 8, 'Absolutely love it! Worth every penny.', 3, '2023-12-16 00:00:00'),
(0, 28, 13, 'Great product, highly recommended!', 1, '2024-09-03 00:00:00'),
(0, 41, 12, 'Quality is average for the price.', 3, '2024-01-16 00:00:00'),
(0, 21, 12, 'Disappointed with the quality.', 2, '2024-04-15 00:00:00'),
(0, 34, 13, 'Disappointed with the quality.', 3, '2023-12-12 00:00:00'),
(0, 29, 13, 'Disappointed with the quality.', 5, '2024-01-06 00:00:00'),
(0, 20, 12, 'Great product, highly recommended!', 1, '2024-08-11 00:00:00'),
(0, 25, 8, 'Great product, highly recommended!', 1, '2024-01-15 00:00:00'),
(0, 27, 13, 'Product arrived late, but works well.', 4, '2024-03-10 00:00:00'),
(0, 28, 12, 'Quality is average for the price.', 5, '2024-10-24 00:00:00'),
(0, 40, 13, 'Great product, highly recommended!', 1, '2024-06-09 00:00:00'),
(0, 21, 13, 'Great product, highly recommended!', 4, '2024-03-08 00:00:00'),
(0, 28, 12, 'Not bad, but could be better.', 5, '2024-07-06 00:00:00'),
(0, 34, 13, 'Product arrived late, but works well.', 1, '2024-03-13 00:00:00'),
(0, 26, 8, 'Disappointed with the quality.', 4, '2024-10-23 00:00:00'),
(0, 30, 13, 'Product arrived late, but works well.', 2, '2024-07-26 00:00:00'),
(0, 40, 8, 'Product arrived late, but works well.', 2, '2024-11-13 00:00:00'),
(0, 36, 8, 'Product arrived late, but works well.', 5, '2024-07-05 00:00:00'),
(0, 31, 13, 'Absolutely love it! Worth every penny.', 5, '2024-06-01 00:00:00'),
(0, 20, 12, 'Not bad, but could be better.', 4, '2024-06-19 00:00:00'),
(0, 43, 12, 'Fantastic value for money!', 4, '2024-05-28 00:00:00'),
(0, 34, 8, 'Product arrived late, but works well.', 4, '2024-09-28 00:00:00'),
(0, 43, 8, 'Disappointed with the quality.', 4, '2024-02-19 00:00:00'),
(0, 20, 13, 'Product arrived late, but works well.', 2, '2024-08-21 00:00:00'),
(0, 34, 8, 'Exceeded my expectations. Will buy again.', 3, '2024-06-26 00:00:00'),
(0, 39, 12, 'Fantastic value for money!', 3, '2024-11-28 00:00:00'),
(0, 30, 8, 'Exceeded my expectations. Will buy again.', 1, '2024-09-12 00:00:00'),
(0, 22, 13, 'Disappointed with the quality.', 3, '2024-08-08 00:00:00'),
(0, 44, 13, 'Quality is average for the price.', 2, '2024-06-03 00:00:00'),
(0, 33, 8, 'Great product, highly recommended!', 5, '2024-11-26 00:00:00'),
(0, 35, 13, 'Great product, highly recommended!', 1, '2024-03-15 00:00:00'),
(0, 23, 12, 'Quality is average for the price.', 4, '2024-02-21 00:00:00'),
(0, 44, 12, 'Disappointed with the quality.', 3, '2024-04-08 00:00:00'),
(0, 20, 8, 'Absolutely love it! Worth every penny.', 2, '2024-05-16 00:00:00'),
(0, 22, 13, 'Fantastic value for money!', 2, '2024-02-01 00:00:00'),
(0, 22, 8, 'Product arrived late, but works well.', 3, '2024-05-02 00:00:00'),
(0, 27, 13, 'Fantastic value for money!', 1, '2023-12-05 00:00:00'),
(0, 34, 8, 'Not bad, but could be better.', 1, '2024-03-13 00:00:00'),
(0, 29, 13, 'Disappointed with the quality.', 4, '2024-02-25 00:00:00'),
(0, 43, 12, 'Great product, highly recommended!', 3, '2024-02-05 00:00:00'),
(0, 40, 12, 'Absolutely love it! Worth every penny.', 4, '2024-07-14 00:00:00'),
(0, 34, 13, 'Fantastic value for money!', 4, '2024-04-23 00:00:00'),
(0, 42, 13, 'Product arrived late, but works well.', 3, '2024-08-06 00:00:00'),
(0, 23, 13, 'Quality is average for the price.', 1, '2024-04-23 00:00:00'),
(0, 20, 12, 'Product arrived late, but works well.', 2, '2024-04-03 00:00:00'),
(0, 27, 12, 'Product arrived late, but works well.', 4, '2024-03-23 00:00:00'),
(0, 27, 12, 'Fantastic value for money!', 2, '2024-10-09 00:00:00'),
(0, 36, 13, 'Quality is average for the price.', 4, '2024-06-30 00:00:00'),
(0, 39, 12, 'Product arrived late, but works well.', 3, '2024-02-17 00:00:00'),
(0, 27, 8, 'Exceeded my expectations. Will buy again.', 4, '2024-08-05 00:00:00'),
(0, 34, 13, 'Great product, highly recommended!', 3, '2024-01-03 00:00:00'),
(0, 28, 13, 'Exceeded my expectations. Will buy again.', 5, '2024-05-10 00:00:00'),
(0, 24, 8, 'Exceeded my expectations. Will buy again.', 1, '2024-05-03 00:00:00'),
(0, 34, 8, 'Exceeded my expectations. Will buy again.', 4, '2024-04-04 00:00:00'),
(0, 26, 8, 'Absolutely love it! Worth every penny.', 1, '2024-06-22 00:00:00'),
(0, 23, 12, 'Disappointed with the quality.', 3, '2023-12-19 00:00:00'),
(0, 31, 12, 'Absolutely love it! Worth every penny.', 3, '2024-09-30 00:00:00'),
(0, 24, 12, 'Product arrived late, but works well.', 5, '2024-03-23 00:00:00'),
(0, 37, 12, 'Product arrived late, but works well.', 2, '2024-09-12 00:00:00'),
(0, 30, 12, 'Product arrived late, but works well.', 3, '2024-11-13 00:00:00'),
(0, 43, 12, 'Product arrived late, but works well.', 1, '2024-10-11 00:00:00'),
(0, 33, 8, 'Great product, highly recommended!', 1, '2024-10-15 00:00:00'),
(0, 34, 12, 'Absolutely love it! Worth every penny.', 2, '2024-10-22 00:00:00'),
(0, 33, 8, 'Fantastic value for money!', 4, '2024-01-19 00:00:00'),
(0, 24, 8, 'Absolutely love it! Worth every penny.', 2, '2024-02-17 00:00:00'),
(0, 20, 13, 'Quality is average for the price.', 2, '2023-12-26 00:00:00'),
(0, 41, 12, 'Fantastic value for money!', 2, '2024-02-21 00:00:00'),
(0, 27, 12, 'Disappointed with the quality.', 2, '2024-06-22 00:00:00'),
(0, 21, 8, 'Fantastic value for money!', 5, '2024-02-04 00:00:00'),
(0, 24, 8, 'Exceeded my expectations. Will buy again.', 4, '2024-01-02 00:00:00'),
(0, 23, 12, 'Not bad, but could be better.', 5, '2024-10-17 00:00:00'),
(0, 30, 8, 'Not bad, but could be better.', 4, '2024-08-19 00:00:00'),
(0, 27, 12, 'Disappointed with the quality.', 2, '2024-03-08 00:00:00'),
(0, 30, 8, 'Exceeded my expectations. Will buy again.', 4, '2023-12-09 00:00:00'),
(0, 28, 12, 'Fantastic value for money!', 4, '2024-08-17 00:00:00'),
(0, 26, 13, 'Fantastic value for money!', 1, '2024-02-18 00:00:00'),
(0, 25, 8, 'Fantastic value for money!', 3, '2024-02-05 00:00:00'),
(0, 26, 8, 'Product arrived late, but works well.', 1, '2024-03-31 00:00:00'),
(0, 20, 8, 'Not bad, but could be better.', 4, '2024-03-15 00:00:00'),
(0, 28, 12, 'Absolutely love it! Worth every penny.', 5, '2024-11-16 00:00:00'),
(0, 23, 12, 'Quality is average for the price.', 4, '2024-08-05 00:00:00'),
(0, 25, 8, 'Exceeded my expectations. Will buy again.', 2, '2024-03-02 00:00:00'),
(0, 30, 8, 'Absolutely love it! Worth every penny.', 3, '2024-01-09 00:00:00'),
(0, 20, 12, 'Absolutely love it! Worth every penny.', 1, '2023-12-17 00:00:00'),
(0, 25, 12, 'Quality is average for the price.', 2, '2024-01-23 00:00:00'),
(0, 26, 8, 'Not bad, but could be better.', 2, '2024-08-31 00:00:00'),
(0, 22, 8, 'Fantastic value for money!', 5, '2024-06-02 00:00:00'),
(0, 30, 13, 'Absolutely love it! Worth every penny.', 1, '2024-08-21 00:00:00'),
(0, 30, 12, 'Exceeded my expectations. Will buy again.', 5, '2024-01-24 00:00:00'),
(0, 23, 8, 'Not bad, but could be better.', 1, '2024-05-08 00:00:00'),
(0, 28, 13, 'Product arrived late, but works well.', 1, '2024-01-08 00:00:00'),
(0, 31, 13, 'Disappointed with the quality.', 1, '2024-08-16 00:00:00'),
(0, 21, 13, 'Exceeded my expectations. Will buy again.', 2, '2024-08-31 00:00:00'),
(0, 27, 8, 'Disappointed with the quality.', 5, '2024-06-12 00:00:00'),
(0, 25, 13, 'Not bad, but could be better.', 2, '2024-05-25 00:00:00'),
(0, 31, 8, 'Great product, highly recommended!', 3, '2024-02-06 00:00:00'),
(0, 24, 12, 'Not bad, but could be better.', 4, '2024-04-06 00:00:00'),
(0, 23, 12, 'Fantastic value for money!', 5, '2024-04-10 00:00:00'),
(0, 27, 8, 'Exceeded my expectations. Will buy again.', 4, '2024-06-17 00:00:00'),
(0, 22, 12, 'Not bad, but could be better.', 1, '2023-12-21 00:00:00'),
(0, 26, 13, 'Absolutely love it! Worth every penny.', 3, '2024-02-05 00:00:00'),
(0, 26, 8, 'Exceeded my expectations. Will buy again.', 5, '2024-05-25 00:00:00'),
(0, 20, 12, 'Exceeded my expectations. Will buy again.', 5, '2024-11-04 00:00:00'),
(0, 25, 8, 'Fantastic value for money!', 2, '2024-04-13 00:00:00'),
(0, 25, 8, 'Fantastic value for money!', 4, '2024-02-23 00:00:00'),
(0, 30, 13, 'Disappointed with the quality.', 2, '2024-01-19 00:00:00'),
(0, 28, 13, 'Product arrived late, but works well.', 3, '2024-11-29 00:00:00'),
(0, 28, 12, 'Quality is average for the price.', 4, '2024-06-14 00:00:00'),
(0, 20, 13, 'Absolutely love it! Worth every penny.', 3, '2024-09-26 00:00:00'),
(0, 22, 12, 'Not bad, but could be better.', 1, '2024-09-20 00:00:00'),
(0, 27, 8, 'Disappointed with the quality.', 2, '2024-02-17 00:00:00'),
(0, 22, 12, 'Fantastic value for money!', 1, '2024-05-19 00:00:00'),
(0, 26, 8, 'Exceeded my expectations. Will buy again.', 4, '2024-01-08 00:00:00'),
(0, 23, 13, 'Not bad, but could be better.', 2, '2023-12-16 00:00:00'),
(0, 31, 8, 'Exceeded my expectations. Will buy again.', 2, '2024-11-19 00:00:00'),
(0, 31, 13, 'Quality is average for the price.', 2, '2024-09-21 00:00:00'),
(0, 22, 12, 'Exceeded my expectations. Will buy again.', 4, '2024-11-30 00:00:00'),
(0, 22, 13, 'Fantastic value for money!', 5, '2024-03-14 00:00:00'),
(0, 31, 12, 'Product arrived late, but works well.', 4, '2024-11-23 00:00:00'),
(0, 28, 12, 'Disappointed with the quality.', 1, '2024-10-04 00:00:00'),
(0, 26, 8, 'Disappointed with the quality.', 1, '2024-01-01 00:00:00'),
(0, 23, 12, 'Quality is average for the price.', 1, '2024-06-07 00:00:00'),
(0, 31, 12, 'Absolutely love it! Worth every penny.', 1, '2024-04-12 00:00:00'),
(0, 21, 13, 'Fantastic value for money!', 5, '2024-04-09 00:00:00'),
(0, 25, 12, 'Great product, highly recommended!', 5, '2024-04-10 00:00:00'),
(0, 23, 8, 'Disappointed with the quality.', 2, '2024-08-23 00:00:00'),
(0, 23, 12, 'Quality is average for the price.', 5, '2024-07-18 00:00:00'),
(0, 20, 8, 'Not bad, but could be better.', 4, '2024-03-20 00:00:00'),
(0, 27, 13, 'Fantastic value for money!', 5, '2024-02-25 00:00:00'),
(0, 20, 13, 'Disappointed with the quality.', 5, '2024-05-30 00:00:00'),
(0, 27, 12, 'Fantastic value for money!', 2, '2024-08-09 00:00:00'),
(0, 29, 8, 'Disappointed with the quality.', 1, '2024-04-22 00:00:00'),
(0, 20, 8, 'Great product, highly recommended!', 3, '2024-03-26 00:00:00'),
(0, 29, 13, 'Quality is average for the price.', 4, '2024-05-23 00:00:00'),
(0, 25, 12, 'Absolutely love it! Worth every penny.', 1, '2024-01-01 00:00:00'),
(0, 22, 12, 'Not bad, but could be better.', 5, '2024-03-02 00:00:00'),
(0, 21, 12, 'Exceeded my expectations. Will buy again.', 4, '2024-06-14 00:00:00'),
(0, 24, 12, 'Disappointed with the quality.', 1, '2024-05-30 00:00:00'),
(0, 20, 12, 'Product arrived late, but works well.', 4, '2024-07-14 00:00:00'),
(0, 31, 12, 'Quality is average for the price.', 4, '2024-01-10 00:00:00'),
(0, 28, 13, 'Quality is average for the price.', 5, '2024-09-06 00:00:00'),
(0, 26, 8, 'Product arrived late, but works well.', 2, '2024-10-26 00:00:00'),
(0, 29, 13, 'Exceeded my expectations. Will buy again.', 3, '2024-10-30 00:00:00'),
(0, 22, 13, 'Disappointed with the quality.', 2, '2024-04-25 00:00:00'),
(0, 23, 13, 'Fantastic value for money!', 2, '2024-03-14 00:00:00'),
(0, 28, 12, 'Product arrived late, but works well.', 2, '2024-03-08 00:00:00'),
(0, 27, 13, 'Exceeded my expectations. Will buy again.', 1, '2023-12-12 00:00:00'),
(0, 23, 12, 'Absolutely love it! Worth every penny.', 3, '2024-05-09 00:00:00'),
(0, 25, 12, 'Exceeded my expectations. Will buy again.', 5, '2024-06-28 00:00:00'),
(0, 26, 12, 'Exceeded my expectations. Will buy again.', 3, '2024-03-20 00:00:00'),
(0, 20, 8, 'Exceeded my expectations. Will buy again.', 1, '2024-02-26 00:00:00'),
(0, 26, 8, 'Quality is average for the price.', 5, '2024-04-12 00:00:00'),
(0, 29, 13, 'Great product, highly recommended!', 4, '2024-08-24 00:00:00'),
(0, 23, 13, 'Absolutely love it! Worth every penny.', 3, '2024-08-31 00:00:00'),
(0, 27, 8, 'Great product, highly recommended!', 4, '2024-03-29 00:00:00'),
(0, 21, 12, 'Great product, highly recommended!', 4, '2024-06-22 00:00:00'),
(0, 21, 12, 'Exceeded my expectations. Will buy again.', 3, '2024-09-05 00:00:00'),
(0, 31, 8, 'Exceeded my expectations. Will buy again.', 2, '2024-07-13 00:00:00'),
(0, 22, 8, 'Absolutely love it! Worth every penny.', 4, '2024-05-27 00:00:00'),
(0, 27, 13, 'Disappointed with the quality.', 5, '2024-02-25 00:00:00'),
(0, 23, 8, 'Great product, highly recommended!', 5, '2024-05-03 00:00:00'),
(0, 31, 8, 'Exceeded my expectations. Will buy again.', 2, '2024-08-04 00:00:00'),
(0, 31, 13, 'Disappointed with the quality.', 5, '2024-07-04 00:00:00'),
(0, 23, 8, 'Product arrived late, but works well.', 2, '2024-01-08 00:00:00'),
(0, 30, 13, 'Quality is average for the price.', 4, '2023-12-24 00:00:00'),
(0, 29, 8, 'Not bad, but could be better.', 2, '2024-07-31 00:00:00'),
(0, 28, 12, 'Disappointed with the quality.', 4, '2024-07-11 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slide_id` int(10) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_image` text NOT NULL,
  `slide_url` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_image`, `slide_url`, `type`) VALUES
(15, 'slide number 1', 'b68996b0aeb13339740f961ada455a77.jpg', 'http://localhost/shop/shop.php', 'desktop'),
(17, 'slide number 4', 'slide-1.jpg', 'http://localhost/ed/shop.php', 'desktop'),
(19, 'slide number 4', 'slide-7.jpg', 'http://localhost/ed/shop.php', 'desktop'),
(20, 'slide number 2', 'slide-2.jpg', 'http://localhost/ed/shop.php', 'desktop'),
(21, 'mobile1', 'm w.jpg', 'http://localhost/shop/shop.php', 'mobile'),
(22, 'mobile2', 'mw1.jpg', 'http://localhost/shop/shop.php', 'mobile');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `term_id` int(10) NOT NULL,
  `term_title` varchar(100) NOT NULL,
  `term_link` varchar(100) NOT NULL,
  `term_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`term_id`, `term_title`, `term_link`, `term_desc`) VALUES
(9, 'Rules & Regulations', 'link_1', '<div>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quidem ut itaque quibusdam dolores modi natus. Enim earum laboriosam, quos error voluptatem fugiat eos? In maiores quia eligendi, ea aperiam voluptate.</div>'),
(10, 'Promo & Regulations', 'link_2', '<div>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quidem ut itaque quibusdam dolores modi natus. Enim earum laboriosam, quos error voluptatem fugiat eos? In maiores quia eligendi, ea aperiam voluptate.</div>'),
(11, 'Refund Condition Policy', 'link_3', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quidem ut itaque quibusdam dolores modi natus. Enim earum laboriosam, quos error voluptatem fugiat eos? In maiores quia eligendi, ea aperiam voluptate.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `vendor_id` int(11) NOT NULL,
  `vendor_name` varchar(255) NOT NULL,
  `vendor_email` varchar(255) NOT NULL,
  `vendor_pass` varchar(255) NOT NULL,
  `vendor_contact` varchar(20) NOT NULL,
  `vendor_province` varchar(100) DEFAULT NULL,
  `vendor_district` varchar(100) DEFAULT NULL,
  `vendor_Rural_municipality` varchar(100) DEFAULT NULL,
  `vendor_word_no` varchar(11) DEFAULT NULL,
  `vendor_image` varchar(255) DEFAULT NULL,
  `vendor_ip` varchar(45) DEFAULT NULL,
  `vendor_category` varchar(255) DEFAULT NULL,
  `vendor_bio` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `status` enum('pending','active','inactive') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`vendor_id`, `vendor_name`, `vendor_email`, `vendor_pass`, `vendor_contact`, `vendor_province`, `vendor_district`, `vendor_Rural_municipality`, `vendor_word_no`, `vendor_image`, `vendor_ip`, `vendor_category`, `vendor_bio`, `created_at`, `status`) VALUES
(6, 'bg mall', 'himalrasaily49@gmail.com', '1212', '9879755143', 'Karnali province', 'Surkhet', 'Birendranagar municipality', 'Ward.no 14', 'mypic.jpg', '::1', 'Jacket', 'this is this ', '2024-12-06 12:14:34', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `boxes_section`
--
ALTER TABLE `boxes_section`
  ADD PRIMARY KEY (`box_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);
ALTER TABLE `products` ADD FULLTEXT KEY `product_title` (`product_title`,`product_keywords`,`product_desc`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`term_id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`vendor_id`),
  ADD UNIQUE KEY `vendor_email` (`vendor_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `boxes_section`
--
ALTER TABLE `boxes_section`
  MODIFY `box_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `manufacturer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `term_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
