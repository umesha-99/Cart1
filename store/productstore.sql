-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2022 at 08:31 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `productstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(10) NOT NULL,
  `productName` varchar(20) NOT NULL,
  `productCategory` varchar(20) NOT NULL,
  `productDiscription` varchar(200) NOT NULL,
  `productPrice` float NOT NULL,
  `productImgSrc` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productName`, `productCategory`, `productDiscription`, `productPrice`, `productImgSrc`) VALUES
(1, 'SAMSUNG A13', 'Android Smart Phone', 'This is s smart phone. operating system is Android. 64mp rear Camera. 4k display.', 79500, 'https://celltronics.lk/wp-content/uploads/2022/05/71G-UqoDkL._AC_SL1500_.jpg'),
(2, 'SAMSUNG S22 Ultra', 'Android Smart Phone', 'this is a Samsung Android smart phone. 4k display. 64mp rear cam. 16mp front cam.', 130000, 'https://fdn2.gsmarena.com/vv/pics/samsung/samsung-galaxy-s22-ultra-5g-2.jpg'),
(3, 'APPLE iPhone 11', 'Apple iPhone', ' Apple new iPhone 11. Add more discription', 220000, 'https://appleasia.lk/wp-content/uploads/2021/07/iPhone-11-Price-in-Srilanka-Apple-Asia-Black-1.jpg'),
(4, 'SAMSUNG M02', 'Android Smart Phone', 'Samsung smart phone. full HD display. 32GB internal storage. 4GB RAM.', 48500, 'https://www.ideabeam.com/images/product/big/samsung-galaxy-m02.jpg'),
(5, 'Huawei Y7 plus', 'Android Smart Phone', 'This is a android amart phone. Huawei product/', 35800, 'https://fdn2.mobgsm.com/vv/pics/huawei/huawei-y7-2018-0.jpg'),
(6, 'Samsung S3', 'Samsung Smart Phone', 'No need to tell', 30500, 'http://img.gsmarena.com/vv/bigpic/samsung-i9300-galaxy-s-iii-ofic.jpg'),
(7, 'Samsung S3', 'Samsung Smart Phone', 'No need to tell', 30500, 'http://img.gsmarena.com/vv/bigpic/samsung-i9300-galaxy-s-iii-ofic.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `usercart`
--

CREATE TABLE `usercart` (
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `userID` int(10) NOT NULL,
  `productID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usercart`
--

INSERT INTO `usercart` (`dateTime`, `userID`, `productID`) VALUES
('2022-12-31 18:07:37', 8, 1),
('2022-12-31 18:07:50', 8, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(8) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(10) NOT NULL,
  `avatarSrc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `role`, `avatarSrc`) VALUES
(8, 'user1', '1234', 'user', 'ProPic-63b075fb2fec98.61310380.webp'),
(9, 'user2', 'user', 'user', 'ProPic-63b0774fa60626.68638586.jpg'),
(11, 'admin1', 'admin', 'admin', 'ProPic-63b0785377a599.00051688.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `usercart`
--
ALTER TABLE `usercart`
  ADD UNIQUE KEY `dateTime` (`dateTime`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
