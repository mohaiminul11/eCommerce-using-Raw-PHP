-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2016 at 04:36 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutorial`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `Id` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`Id`, `username`, `name`, `password`, `address`, `email`, `dob`, `gender`, `role`) VALUES
(57, 'admin', 'mehedi', 'admin', 'nikunja-2', 'mehedi@gmail.com', '2016-10-10', 'Male', 'admin'),
(58, 'sumon', 'sumon', 'aA12', 'adsf', 'a@dsf.com', '0000-00-00', 'male', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand`) VALUES
(1, 'Levis'),
(2, 'Nike'),
(3, 'Rime');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `parent`) VALUES
(1, 'Male', 0),
(2, 'Women', 0),
(3, 'Boys', 0),
(4, 'Girls', 0),
(5, 'Shirts', 1),
(6, 'Pants', 1),
(7, 'Shoes', 1),
(8, 'Accessories', 1),
(9, 'Shirts', 2),
(10, 'Pants', 2),
(11, 'Shoes', 2),
(12, 'Dresses', 2),
(13, 'Shirts', 3),
(14, 'Pants', 3),
(15, 'Dresses', 4),
(16, 'Shoes', 4),
(17, 'Accessories', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `orderId`, `productId`, `quantity`, `date`) VALUES
(5, 42, 1, 7, '2016-05-07'),
(6, 43, 1, 3, '2016-05-07'),
(7, 44, 2, 9, '2016-05-07'),
(8, 45, 1, 11, '2016-05-07'),
(9, 45, 2, 1, '2016-05-07'),
(10, 46, 2, 8, '2016-05-07'),
(11, 47, 2, 2, '2016-05-07'),
(12, 48, 1, 4, '2016-05-08'),
(13, 51, 1, 4, '2016-05-08'),
(14, 52, 1, 4, '2016-05-08'),
(15, 52, 2, 3, '2016-05-08'),
(16, 52, 3, 4, '2016-05-08'),
(17, 53, 2, 3, '2016-05-08'),
(18, 54, 1, 4, '2016-05-08'),
(19, 55, 4, 2, '2016-05-08'),
(20, 55, 5, 1, '2016-05-08'),
(21, 56, 1, 4, '2016-05-08'),
(22, 56, 2, 2, '2016-05-08'),
(23, 56, 4, 1, '2016-05-08'),
(24, 56, 5, 2, '2016-05-08'),
(25, 57, 2, 3, '2016-05-08'),
(26, 58, 4, 2, '2016-05-08'),
(27, 58, 5, 2, '2016-05-08'),
(28, 58, 1, 1, '2016-05-08'),
(29, 59, 1, 1, '2016-05-08'),
(30, 60, 2, 1, '2016-05-08'),
(31, 61, 4, 2, '2016-05-08'),
(32, 61, 5, 1, '2016-05-08'),
(33, 62, 4, 1, '2016-05-08');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `totalAmount` int(11) NOT NULL,
  `date` date NOT NULL,
  `customerid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `totalAmount`, `date`, `customerid`) VALUES
(42, 217, '2016-05-07', 1),
(43, 93, '2016-05-07', 1),
(44, 180, '2016-05-07', 1),
(45, 361, '2016-05-07', 1),
(46, 0, '2016-05-07', 1),
(47, 40, '2016-05-07', 1),
(48, 124, '2016-05-08', 0),
(49, 0, '2016-05-08', 58),
(50, 0, '2016-05-08', 58),
(51, 124, '2016-05-08', 58),
(52, 1556, '2016-05-08', 58),
(53, 60, '2016-05-08', 58),
(54, 124, '2016-05-08', 58),
(55, 70, '2016-05-08', 0),
(56, 256, '2016-05-08', 0),
(57, 60, '2016-05-08', 0),
(58, 139, '2016-05-08', 0),
(59, 31, '2016-05-08', 0),
(60, 20, '2016-05-08', 0),
(61, 70, '2016-05-08', 0),
(62, 16, '2016-05-08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `brand` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `featured` int(11) NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `brand`, `categories`, `image`, `description`, `featured`, `quantity`) VALUES
(1, 'Levi''s Jeans', '30.99', 1, '6', 'images/products/men4.png', 'These are amazing. They are super confy and sexy! Buy them and enjoy!', 1, 7),
(2, 'Cool Shirt', '19.99', 1, '5', 'images/products/men1.png', 'A cool Shirt you must try on. It would make you look wonderful.', 1, 5),
(4, 'T-Shirts', '16.00', 1, '1', 'images/ra,unisex_tshirt,x1350,dd2121 8219e99865,front-c,30,60,940,730-bg,f8f8f8.jpg', 'Plain colour t-shirts are 100% Cotton, Heather Grey is 90% Cotton/10% Polyester, Charcoal Heather is 52% Cotton/48% Polyester', 1, 3),
(5, 'Formal Shirt', '38.00', 2, '1', 'images/Peter-England-Blue-Printed-Slim-Fit-Formal-Shirt-3526-0003291-1-pdp_slider_l.jpg', 'Fashioned using the ultimate material for comfort- cotton, this formal shirt will keep you at ease.', 1, 3),
(6, 'Shirt', '450.00', 2, '9', 'images/girls4.png', 'good shirt', 1, 45);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
