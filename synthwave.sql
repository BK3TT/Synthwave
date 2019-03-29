-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 29, 2019 at 11:51 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `synthwave`
--

-- --------------------------------------------------------

--
-- Table structure for table `constants`
--

DROP TABLE IF EXISTS `constants`;
CREATE TABLE IF NOT EXISTS `constants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `value` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `constants`
--

INSERT INTO `constants` (`id`, `type`, `value`) VALUES
(1, 'status', 'Pending'),
(2, 'status', 'Processing'),
(3, 'status', 'Despatched'),
(4, 'status', 'Shipped'),
(5, 'status', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `house` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `firstname`, `surname`, `email`, `house`, `address`, `address2`, `city`, `postcode`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Chris', 'Beckett', 'chrisbeckett13@yahoo.co.uk', '12', 'Guernsey Close', 'Appleton', 'Warrington', 'WA43AZ', 1, '2019-03-26 00:00:00', '2019-03-26 00:00:00'),
(2, 'Jamie', 'Smith', 'jamieS1994@gmail.com', '25', 'Dunlows Green', 'Appleton', 'Warrington', 'WA43JD', 1, '2019-03-24 00:00:00', '2019-03-24 00:00:00'),
(12, 'Lauren', 'Devlin', 'laaaurendevlin@gmail.com', '21', 'Ventor Close', 'Great Sankey', 'Warrington', 'WA53JL', 1, '2019-03-27 23:13:22', '2019-03-27 23:13:22'),
(13, 'Lauren', 'Devlin', 'laaaurendevlinnn@gmail.com', '21', 'Ventor Close', 'Great Sankey', 'Warrington', 'WA53JL', 1, '2019-03-29 18:49:59', '2019-03-29 18:49:59'),
(14, 'Chris', 'Devlin', 'chris@gmail.com', '21', 'Ventor Close', 'Great Sankey', 'Warrington', 'WA53JL', 1, '2019-03-29 18:57:34', '2019-03-29 18:57:34');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `total_price` decimal(6,2) NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `customer_id`, `total_price`, `status_id`, `created_at`, `updated_at`) VALUES
(15, 1, '15.94', 1, '2019-03-28 20:26:54', '2019-03-28 20:26:54'),
(16, 1, '15.94', 4, '2019-03-28 20:26:58', '2019-03-29 18:06:02');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

DROP TABLE IF EXISTS `order_products`;
CREATE TABLE IF NOT EXISTS `order_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` tinyint(4) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(15, 16, 2, 1, '5.95', '2019-03-28 20:26:58', '2019-03-28 20:26:58'),
(14, 16, 1, 1, '9.99', '2019-03-28 20:26:58', '2019-03-28 20:26:58'),
(19, 18, 2, 1, '5.95', '2019-03-29 19:15:11', '2019-03-29 19:15:11'),
(18, 18, 1, 1, '9.99', '2019-03-29 19:15:11', '2019-03-29 19:15:11'),
(20, 19, 1, 1, '9.99', '2019-03-29 19:55:05', '2019-03-29 19:55:05'),
(21, 19, 2, 1, '5.95', '2019-03-29 19:55:05', '2019-03-29 19:55:05');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(1, 'CD', '9.99', '2019-03-26 00:00:00', '2019-03-26 00:00:00'),
(2, 'Poster', '5.95', '2019-03-26 00:00:00', '2019-03-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `shipment`
--

DROP TABLE IF EXISTS `shipment`;
CREATE TABLE IF NOT EXISTS `shipment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `customer_address` text NOT NULL,
  `billing_address` text NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_price` decimal(6,2) NOT NULL,
  `delivery_cost` decimal(6,2) NOT NULL,
  `total_cost` decimal(6,2) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipment`
--

INSERT INTO `shipment` (`id`, `customer_id`, `customer_address`, `billing_address`, `order_id`, `order_price`, `delivery_cost`, `total_cost`, `created_at`, `updated_at`) VALUES
(7, 16, '21 Ventor Close, Great Sankey, Warrington, WA53JL', '21 Ventor Close, Great Sankey, Warrington, WA53JL', 16, '15.94', '2.95', '18.89', '2019-03-29 18:06:02', '2019-03-29 18:06:02');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
