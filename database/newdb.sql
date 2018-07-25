-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 25, 2018 at 09:32 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_ image` text NOT NULL,
  `product_keywords` text NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_ image`, `product_keywords`, `product_id`) VALUES
(1, 2, 'test', 6789, 'test', 'ourteam.jpg', 'test', 1),
(1, 1, 'ghjkl', 852, 'fcvbnm,', 'aboutus.jpg', 'vbnm', 2),
(1, 1, 'boomshiva', 550, 'okok', 'Inspirational-Code-HD-Wallpapers.jpg', 'okok g', 3),
(1, 1, 'lets see', 77, 'fghjm', '662edf20f8626ad9578625abcb50445c.jpg', 'ghjm', 4),
(1, 1, 'boom', 52, 'ok', 'einstein.jpg', 'ok', 5),
(1, 1, 'ok', 852, 'ok', '15997-Elon-Musk-Quote-Pay-attention-to-negative-feedback-and-solicit-it.jpg', 'ok', 6),
(1, 1, 'testtetts', 852, 'okok', 'einstein.jpg', 'okok', 7),
(1, 1, 'increment test', 85, 'ij', '15997-Elon-Musk-Quote-Pay-attention-to-negative-feedback-and-solicit-it.jpg', 'ikm', 8),
(1, 1, 'admin test', 85, 'okok', 'logo.png', 'koko', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
