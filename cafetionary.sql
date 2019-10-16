-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2019 at 06:13 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafetionary`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'ankitasarker41@gmail.com', 'de5b5bf65ba66517f9b70b1443d2102d');

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `name`, `price`, `image`, `type`) VALUES
(3, 'Chicken Burger', 8700, 'images/burger.jpg', 'Snacks'),
(4, 'Special Noodles', 30, 'images/noodles.jpg', 'Snacks'),
(5, 'Singara', 5, 'images/Singara.jpg', 'Snacks'),
(6, 'Samucha', 5, 'images/samucha.jpg', 'Snacks'),
(7, 'Sandwiche', 15, 'images/Sandwiches.jpg', 'Snacks'),
(8, 'Chicken Fry', 40, 'images/chicken.jpg', 'Snacks'),
(9, 'Special Khichuri', 20, 'images/khicuri.jpg', 'Khichuri'),
(10, 'Pran Juice', 20, 'images/juice.jpg', 'Drinks'),
(11, 'COFFEE', 18, 'images/coffee.jpg', 'Drinks'),
(12, 'Cocacola', 25, 'images/', 'Drinks'),
(13, 'Seven Up', 30, 'images/sevenup.jpg', 'Drinks'),
(14, 'Furtika', 30, 'images/Furtika.jpg', 'Drinks'),
(15, 'Mangolee', 30, 'images/mangolee.jpg', 'Drinks'),
(16, 'chocolate Pastry', 10, 'images/chocolate_cake.jpg', 'Sweets'),
(17, 'Kitkat', 10, 'images/kitkate.jpg', 'Sweets'),
(18, 'Vanila Pestry', 10, 'images/Vanila.jpeg', 'Sweets'),
(19, 'Muffin Cake', 10, 'images/cake.jpg', 'Sweets'),
(20, 'chocolate ice-cream', 45, 'images/cone.jpg', 'Sweets'),
(21, 'Vanila ice-cream', 45, 'images/cone1.jpg', 'Sweets'),
(22, 'Alooz chips', 15, 'images/Alooz.jpg', 'Chips'),
(23, 'Dong Dong chips', 10, 'images/Dong Dong.jpg', 'Chips'),
(24, 'Mr. Twist', 15, 'images/Mr. Twist.jpeg', 'Chips'),
(25, 'Cenachur', 10, 'images/Cenachur.jpg', 'Chips'),
(26, 'Jhal Muri', 10, 'images/jhal muri.jpg', 'Chips'),
(27, 'Poteto chips', 10, 'images/potato.png', 'Chips'),
(28, 'Potato chips', 10, 'images/poteto1.jpg', 'Chips'),
(29, 'Ring chips', 10, 'images/ring.png', 'Chips'),
(30, 'pran dal', 10, 'images/pran-dal.jpg', 'Snacks'),
(31, 'sun chips', 15, 'images/sun.jpg', 'Chips'),
(32, 'Pen', 10, 'images/pen.png', 'Stationary'),
(33, 'pencil', 10, 'images/pencil.jpg', 'Stationary'),
(34, 'Marker', 30, 'images/marker.jpg', 'Stationary'),
(35, 'A4 page', 5, 'images/A4.jpg', 'Stationary'),
(36, 'Color Pen', 15, 'images/color_pen.jpg', 'Stationary'),
(37, 'Designr pen', 20, 'images/designr_pen.jpg', 'Stationary'),
(38, 'Eraser', 10, 'images/Eraser.jpg', 'Stationary'),
(39, 'File', 15, 'images/file.jpg', 'Stationary'),
(40, 'Khata', 40, 'images/khata.png', 'Stationary'),
(41, 'puncher', 60, 'images/puncher.jpg', 'Stationary'),
(42, 'Sharpener', 15, 'images/sharpener.jpg', 'Stationary'),
(43, 'Ruler', 30, 'images/ruler.jpg', 'Stationary');

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`id`, `userid`, `name`, `email`, `phone`, `message`, `status`) VALUES
(1, 1, 'Testing', '', '', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum ', 'success'),
(2, 160, 'Ankita Sarker', '', '', '', 'Pending'),
(3, 160, 'Ankita Sarker', 'ankitasarker41@gmail.com', 'ankitasarker', 'hghghjhjg', 'Pending'),
(4, 10001, 'Parijat', 'parijat@gmail.com', 'parijat@gmai', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum ', 'Pending'),
(6, 160, 'Md Ruman Hossain', 'ruman.cse.brur@gmail.com', 'ruman.cse.br', 'রুমান হোসেন ', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `foodid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userid`, `foodid`, `name`, `phone`, `address`, `status`) VALUES
(1, 1, 3, 'Ankita Sarker', '01712345678', 'Rangpur', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_id`, `mail`, `password`) VALUES
(1, '160', 'ankita@gmail.com', '1234'),
(2, '161', 'sabrina@gmail.com', '12345'),
(9, '10001', 'parijat@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
