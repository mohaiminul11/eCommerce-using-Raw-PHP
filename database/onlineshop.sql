-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2017 at 04:26 AM
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
  `id` int(100) NOT NULL,
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

INSERT INTO `accounts` (`id`, `username`, `name`, `password`, `address`, `email`, `dob`, `gender`, `role`) VALUES
(57, 'admin', 'mehedi', 'admin', 'nikunja-2', 'mehedi@gmail.com', '2016-10-10', 'Male', 'admin'),
(58, 'sumon', 'sumon', 'aaa', 'adsf', 'a@dsf.com', '0000-00-00', 'male', 'user'),
(59, 'asadf', 'adfdasf', 'aA12f', 'asdf', 'a@b.com', '0000-00-00', 'male', 'user'),
(60, 'sadfsd', 'asdf', '123456aA', 'asdf', 'a@b.com', '0000-00-00', 'male', 'user');

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
(35, 64, 1, 1, '2017-02-27'),
(36, 65, 1, 2, '2017-02-27'),
(37, 65, 2, 2, '2017-02-27'),
(38, 65, 4, 2, '2017-02-27'),
(39, 65, 5, 2, '2017-02-27'),
(40, 65, 6, 22, '2017-02-27'),
(41, 66, 6, 2, '2017-02-27');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `totalAmount` int(11) NOT NULL,
  `date` date NOT NULL,
  `customerid` int(11) NOT NULL,
  `delivered` tinyint(4) NOT NULL DEFAULT '0',
  `sent` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `totalAmount`, `date`, `customerid`, `delivered`, `sent`) VALUES
(64, 31, '2017-02-27', 58, 0, 0),
(65, 10110, '2017-02-27', 58, 0, 0),
(66, 900, '2017-02-27', 58, 0, 0);

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
(1, 'Levi''s Jeans', '30.99', 1, '6', 'images/products/men4.png', 'These are amazing. They are super confy and sexy! Buy them and enjoy!', 1, 50),
(2, 'Cool Shirt', '19.99', 1, '5', 'images/products/men1.png', 'A cool Shirt you must try on. It would make you look wonderful.', 1, 50),
(4, 'T-Shirts', '16.00', 1, '1', 'images/ra,unisex_tshirt,x1350,dd2121 8219e99865,front-c,30,60,940,730-bg,f8f8f8.jpg', 'Plain colour t-shirts are 100% Cotton, Heather Grey is 90% Cotton/10% Polyester, Charcoal Heather is 52% Cotton/48% Polyester', 1, 50),
(5, 'Formal Shirt', '38.00', 2, '1', 'images/Peter-England-Blue-Printed-Slim-Fit-Formal-Shirt-3526-0003291-1-pdp_slider_l.jpg', 'Fashioned using the ultimate material for comfort- cotton, this formal shirt will keep you at ease.', 1, 50),
(6, 'Shirt', '450.00', 2, '9', 'images/girls4.png', 'good shirt', 1, 50);

-- --------------------------------------------------------

--
-- Table structure for table `products_onhold`
--

CREATE TABLE `products_onhold` (
  `id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `sessionid` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `products_onhold`
--
ALTER TABLE `products_onhold`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `products_onhold`
--
ALTER TABLE `products_onhold`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
