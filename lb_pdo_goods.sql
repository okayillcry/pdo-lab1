-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 20, 2024 at 03:49 PM
-- Server version: 8.0.24
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lb_pdo_goods`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ID_Category` int NOT NULL,
  `c_name` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID_Category`, `c_name`) VALUES
(1, 'Videocard'),
(2, 'CPU'),
(3, 'Display'),
(4, 'Memory'),
(5, 'TV'),
(6, 'Power Bank'),
(7, 'Mouse');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `ID_Items` int NOT NULL,
  `name` varchar(16) NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL,
  `quality` int NOT NULL,
  `FID_Vendor` int NOT NULL,
  `FID_Category` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ID_Items`, `name`, `price`, `quantity`, `quality`, `FID_Vendor`, `FID_Category`) VALUES
(1, 'Монитор 22\"', 1500, 15, 5, 1, 3),
(2, 'Монитор 17\"', 1200, 20, 4, 3, 3),
(3, 'GeForce 660M', 2000, 12, 4, 4, 1),
(4, 'Radeon R9', 2500, 7, 5, 5, 1),
(5, 'Core i7', 3000, 10, 5, 4, 2),
(6, 'FX-6300', 2700, 15, 4, 5, 2),
(7, 'RAM 8GB', 1500, 11, 5, 2, 4),
(8, 'RAM 4GB', 1000, 15, 4, 3, 4),
(9, 'Samsung TV 50\"', 7000, 8, 5, 3, 5),
(10, 'LG TV 42\"', 6000, 10, 4, 1, 5),
(11, 'Anker 10000mAh', 200, 25, 5, 6, 6),
(12, 'Xiaomi 20000mAh', 300, 20, 4, 9, 6),
(13, 'Logitech M220', 50, 50, 5, 7, 7),
(14, 'Razer DeathAdder', 150, 30, 5, 8, 7);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `ID_Vendors` int NOT NULL,
  `v_name` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`ID_Vendors`, `v_name`) VALUES
(1, 'LG'),
(2, 'ASUS'),
(3, 'Samsung'),
(4, 'Intel'),
(5, 'AMD'),
(6, 'Anker'),
(7, 'Logitech'),
(8, 'Razer'),
(9, 'Xiaomi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID_Category`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ID_Items`),
  ADD KEY `fk_category` (`FID_Category`),
  ADD KEY `fk_vendor` (`FID_Vendor`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`ID_Vendors`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`FID_Category`) REFERENCES `category` (`ID_Category`),
  ADD CONSTRAINT `fk_vendor` FOREIGN KEY (`FID_Vendor`) REFERENCES `vendors` (`ID_Vendors`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
