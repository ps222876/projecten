-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2023 at 09:37 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project4`
--
CREATE DATABASE IF NOT EXISTS `project4` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `project4`;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `userId` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `date`, `userId`, `status`) VALUES
(15, '2023-01-24 12:29:02', 5, 'Delivered'),
(16, '2023-01-24 12:34:00', 1, 'Baking'),
(18, '2023-01-24 13:47:40', 6, 'Delivered'),
(20, '2023-01-26 10:44:29', 7, 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `order_pizza`
--

CREATE TABLE `order_pizza` (
  `ordercontentID` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `pizzaId` int(11) NOT NULL,
  `sizeId` int(11) NOT NULL,
  `amount` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_pizza`
--

INSERT INTO `order_pizza` (`ordercontentID`, `orderId`, `pizzaId`, `sizeId`, `amount`) VALUES
(14, 15, 4, 2, 10),
(15, 16, 1, 1, 2),
(19, 18, 1, 2, 1),
(21, 20, 4, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pizzas`
--

CREATE TABLE `pizzas` (
  `pizzaID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pizzas`
--

INSERT INTO `pizzas` (`pizzaID`, `name`, `price`) VALUES
(1, 'Clazone', '10.00'),
(2, 'Diavola', '8.95'),
(3, 'Frutedimare', '12.99'),
(4, 'Funghi', '4.75'),
(5, 'Hawaii', '9.95'),
(6, 'Margaritha', '13.95'),
(7, 'Napolitana', '8.85'),
(8, 'Peperone', '11.95'),
(9, 'Prosciutto', '4.00'),
(10, 'Tonno', '7.10');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `sizeID` int(11) NOT NULL,
  `size` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`sizeID`, `size`) VALUES
(1, 'Small'),
(2, 'Medium'),
(3, 'Large');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `postalcode` varchar(6) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `firstname`, `lastname`, `address`, `postalcode`, `city`) VALUES
(1, 'Khaled', 'Hajjar', 'Niersstraat 31', '5626DW', 'Eindhoven'),
(5, 'Martijn', 'van Meer', 'Sterrenlaan 10', '5631AK', 'Eindhoven'),
(6, 'Bushra', 'Obeido', 'Sterrenlaan 10', '5626DW', 'Eindhoven'),
(7, 'Raul', 'Van der Zande', 'skdvjga', '5421ds', 'Veghel');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `order_pizza`
--
ALTER TABLE `order_pizza`
  ADD PRIMARY KEY (`ordercontentID`),
  ADD KEY `orderId` (`orderId`),
  ADD KEY `pizzaId` (`pizzaId`);

--
-- Indexes for table `pizzas`
--
ALTER TABLE `pizzas`
  ADD PRIMARY KEY (`pizzaID`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`sizeID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_pizza`
--
ALTER TABLE `order_pizza`
  MODIFY `ordercontentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pizzas`
--
ALTER TABLE `pizzas`
  MODIFY `pizzaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `sizeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_pizza`
--
ALTER TABLE `order_pizza`
  ADD CONSTRAINT `order_pizza_ibfk_1` FOREIGN KEY (`pizzaId`) REFERENCES `pizzas` (`pizzaID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_pizza_ibfk_2` FOREIGN KEY (`orderId`) REFERENCES `orders` (`orderID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
