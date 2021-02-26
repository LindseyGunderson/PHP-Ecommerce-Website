-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 26, 2021 at 09:40 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoppingcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` double(10,2) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `img`) VALUES
(1, 'Darkside Cauldron', 'Take a trip to the dark side with our darkest roast. Add a bit of spice to your morning or afternoon coffee with this option. Roasted between 437-450°F, indulge the darkside and become one of us.', 16.99, 'dark-roast.jpg'),
(2, 'Midnight Expresso Express', 'All aboard the expresso train and get that extra boost of energy. Kick off your morning or afternoon with an extra shot of flavour and take on the day.', 16.99, 'expresso-roast.jpg'),
(3, 'Vanilla French Brew', 'A classical flavour for a classy coffee. Taste the dash of vanilla with this light roast for a twist. ', 16.99, 'french-roast.jpg'),
(4, 'Signature Breakfast Roast', 'Our favourite option to have with your morning breakfast. Light in both colour and flavour, you\'ll enjoy sipping this blend.  ', 16.99, 'light-roast.jpg'),
(5, 'Sunrise Roast', 'Not a morning person? Try our Sunrise Roast that captures what a sunrise might takes like. With a hint of cinnamon and nutty flavour, it will be just the pick me up you need.', 16.99, 'medium-roast.jpg'),
(6, 'Latte On The Rocks', 'Get rockin with our signature latte blend. Feel energized first thing in the morning to be the rockstar of your day to day activities.', 16.99, 'medium-roast-light.jpg'),
(7, 'Darkside Cauldron Pods', 'The Darkside just got darker with our pod version. We took what you loved about our darkest roast and brought them to pods. Enjoy a single serving of the Darkside. Pack size of 12.', 11.99, 'dark-roast-pod.jpg'),
(8, 'Midnight Expresso Express Pods', 'Expresso kick now in pod form! Making it easier to get on the expresso express to coast through the day. Pack size of 12.', 11.99, 'expresso-roast-pod.jpg'),
(9, 'French Vanilla Brew Pods', 'Take a single serve of vanilla with you on your morning adventure. Add a bit of sweetness to start your morning. Pack size of 12.', 11.99, 'french-roast-pod.jpg'),
(10, 'Signature Breakfast Roast Pods', 'Breakfast just got easier with our Signature Breakfast Blend in single serve. If you are on the go or having coffee at home, we have made it easy.Pack size of 12.', 11.99, 'light-roast-pod.jpg'),
(11, 'Latte On The Rocks Pods', 'Our twist of a light and medium blend coffee. If you are in between light or a dark roast, this ones for you! Pack size of 12.', 11.99, 'medium-roast-light-pod.jpg'),
(12, 'Sunrise Roast Pods', 'The best way to wake up, without having to wake up early. Enjoy the sunrise of our Sunrise Blend in our single cup option. Pack size of 12.', 11.99, 'medium-roast-pod.jpg'),
(13, 'Variety Pack 6 Bags', 'Having trouble choosing which coffee type to go with? Why not try the variety pack and take home each type to try.', 79.99, 'variety-pack.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
