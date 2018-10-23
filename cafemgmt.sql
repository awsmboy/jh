-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2018 at 08:26 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafemgmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `btime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bid`, `cid`, `amount`, `btime`) VALUES
(9, 105, 80, '2018-10-09 22:39:00'),
(10, 113, 360, '2018-10-09 22:57:57'),
(11, 105, 720, '2018-10-09 23:05:14'),
(32, 105, 648, '2018-10-09 23:30:47'),
(33, 105, 326, '2018-10-10 00:01:42'),
(34, 122, 40, '2018-10-10 00:06:29'),
(42, 105, 32, '2018-10-10 00:24:37'),
(43, 105, 324, '2018-10-10 00:26:41'),
(44, 105, 80, '2018-10-10 00:28:04'),
(61, 122, 160, '2018-10-10 00:49:56'),
(62, 128, 863, '2018-10-10 00:57:14'),
(63, 105, 432, '2018-10-15 02:25:14'),
(64, 105, 1000, '2018-10-12 23:05:14'),
(65, 105, 400, '2018-10-11 23:05:14'),
(66, 105, 500, '2018-10-13 00:01:42'),
(67, 105, 1800, '2018-10-14 23:30:47'),
(68, 129, 630, '2018-10-15 16:46:26'),
(69, 128, 936, '2018-10-23 20:22:31'),
(70, 128, 252, '2018-10-23 20:45:19'),
(71, 104, 288, '2018-10-23 23:10:41'),
(72, 104, 441, '2018-10-23 23:17:50'),
(73, 104, 1814, '2018-10-23 23:35:33'),
(74, 104, 270, '2018-10-23 23:36:48'),
(75, 104, 1633, '2018-10-22 23:35:33'),
(76, 105, 1000, '2018-10-21 23:05:14'),
(77, 113, 1224, '2018-10-20 22:57:57'),
(78, 105, 2250, '2018-10-20 23:30:47'),
(79, 113, 500, '2018-10-19 22:57:57');

--
-- Triggers `bill`
--
DELIMITER $$
CREATE TRIGGER `discount_trigger` BEFORE INSERT ON `bill` FOR EACH ROW begin
     if new.amount >1000 then 
     set new.amount = (new.amount - new.amount*0.10);
     end if;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cafe`
--

CREATE TABLE `cafe` (
  `cfid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cafe`
--

INSERT INTO `cafe` (`cfid`, `name`, `address`) VALUES
(1, 'Boston Barista Express', 'Pune'),
(2, 'Lava Java', 'Kothrud');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `cfid` int(11) NOT NULL,
  `pno` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`cfid`, `pno`, `email`) VALUES
(1, 21457895, 'cafe1@cafe.com'),
(2, 21545514, 'cafe2@cafe.com');

-- --------------------------------------------------------

--
-- Table structure for table `contains`
--

CREATE TABLE `contains` (
  `id` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `iid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contains`
--

INSERT INTO `contains` (`id`, `oid`, `iid`, `quantity`) VALUES
(41, 76, 11, 1),
(42, 76, 11, 1),
(43, 76, 11, 74),
(44, 79, 10, 1000),
(45, 76, 11, 1000),
(46, 76, 11, 2000),
(47, 76, 11, 1000),
(48, 76, 11, 1000),
(49, 76, 11, 1000),
(50, 77, 11, 1000),
(51, 85, 11, 1000),
(52, 86, 10, 9),
(53, 86, 11, 500),
(54, 88, 9, 100),
(56, 90, 12, 900),
(57, 91, 10, 1000),
(58, 92, 10, 2),
(59, 93, 10, 4),
(60, 94, 10, 7),
(61, 94, 12, 5),
(62, 94, 11, 2),
(63, 94, 9, 200),
(64, 95, 11, 6),
(65, 96, 9, 3),
(66, 96, 13, 2),
(67, 97, 11, 2),
(68, 97, 14, 5),
(69, 97, 11, 2),
(70, 97, 15, 1),
(71, 99, 10, 7),
(72, 100, 19, 4),
(73, 100, 16, 2),
(74, 101, 14, 3),
(75, 101, 10, 1),
(76, 102, 11, 1),
(77, 102, 11, 1),
(78, 102, 11, 1),
(79, 102, 11, 1),
(80, 102, 11, 1),
(81, 102, 11, 1),
(82, 102, 11, 1),
(83, 102, 11, 1),
(84, 102, 11, 1),
(85, 102, 11, 1),
(86, 102, 11, 1),
(87, 102, 11, 1),
(88, 102, 11, 1),
(89, 102, 11, 1),
(90, 102, 11, 1),
(91, 102, 11, 1),
(92, 102, 11, 1),
(93, 102, 11, 1),
(94, 102, 11, 1),
(95, 102, 11, 1),
(96, 102, 11, 1),
(97, 102, 11, 1),
(98, 102, 11, 1),
(99, 102, 11, 1),
(100, 102, 11, 1),
(101, 102, 11, 1),
(102, 102, 11, 1),
(103, 102, 11, 1),
(104, 130, 14, 2);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pno` bigint(20) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `name`, `pno`, `address`) VALUES
(103, 'Rahul', 7771234567, 'Katraj,Pune'),
(104, 'Sachin', 8812345678, 'Pune'),
(105, 'SAnket', 8806852775, 'Pune'),
(113, 'Sanket', 8806852776, 'Pune'),
(122, 'Omkar', 9970808317, 'Pune'),
(123, 'a', 9876543210, 'k'),
(128, 'Rahul', 7777777777, 'Pune'),
(129, 'Rahul', 7771234566, 'goa');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `eid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`eid`, `name`, `phone`, `mail`, `password`, `mid`) VALUES
(17, 'Ramesh', 9123456789, 'ramesh@cafe.com', '3c591ecd96a4d5c39232eb425378b0fb', 1),
(18, 'Suresh', 8123456789, 'suresh@cafe.com', 'bc78ca5c227f643a9e8d2e61978ed6dd', 1),
(19, 'Mahesh', 7123456789, 'mahesh@cafe.com', 'ee627db8a1c644c2e22549ba5426b098', 1),
(20, 'Aniket', 9011935175, 'aniketnale5@gmail.com', '19ef44acddcb9d44a3033330b6ecdf25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `iid` int(11) NOT NULL,
  `idesc` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`iid`, `idesc`, `price`, `img`) VALUES
(9, 'Big_Chicken_Cheese_Burger', 50, 'i3.jpg'),
(10, 'Big_Veg_Cheese_Burger', 40, 'i4.jpg'),
(11, 'Crispy_Veg_Wrap', 80, 'i6.jpg'),
(12, 'Fruit_Trifle_Cup', 45, 'i12.jpg'),
(13, 'Afghani_Chicken_Biryani', 275, 'i2.jpg'),
(14, 'Black_Forest_Cake', 150, 'i16.jpg'),
(15, 'Chilli_Cheese_Toastizza', 85, 'i5.jpg'),
(16, 'Chocolate_ice_cream', 40, 'i7.jpg'),
(17, 'Cocoa_Fantasy_Pastry', 45, 'i9.jpg'),
(18, 'Peppy_Chicken_Roll', 85, 'i11.jpg'),
(19, 'Sizzle_Dazzle_Brownie', 60, 'i19.jpg'),
(20, 'Hazelnut_Karat_Cake', 150, 'i15.jpg'),
(21, 'Roasted_Cardamom_Latte', 60, 'i28.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `mid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pno` bigint(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cfid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`mid`, `name`, `pno`, `password`, `cfid`) VALUES
(1, 'admin', 7712345678, 'admin', 1),
(3, 'manager', 8745126451, 'manager', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ord`
--

CREATE TABLE `ord` (
  `oid` int(11) NOT NULL,
  `no_of_item` int(11) NOT NULL DEFAULT '0',
  `eid` int(11) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'unpaid',
  `cid` int(11) NOT NULL,
  `otime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ord`
--

INSERT INTO `ord` (`oid`, `no_of_item`, `eid`, `status`, `cid`, `otime`) VALUES
(76, 1, 17, 'paid', 105, '2018-10-09 22:38:47'),
(77, 1, 17, 'paid', 105, '2018-10-09 22:55:50'),
(78, 1, 17, 'paid', 105, '2018-10-09 22:56:11'),
(79, 1, 17, 'paid', 113, '2018-10-09 22:57:35'),
(80, 1, 17, 'paid', 105, '2018-10-09 22:59:27'),
(81, 1, 17, 'paid', 105, '2018-10-09 23:00:10'),
(82, 1, 17, 'paid', 105, '2018-10-09 23:01:40'),
(83, 1, 17, 'paid', 105, '2018-10-09 23:03:10'),
(84, 1, 17, 'paid', 105, '2018-10-09 23:04:56'),
(85, 1, 17, 'paid', 105, '2018-10-09 23:29:42'),
(86, 1, 17, 'paid', 105, '2018-10-09 23:46:45'),
(87, 1, 17, 'paid', 105, '2018-10-09 23:47:04'),
(88, 1, 17, 'paid', 122, '2018-10-10 00:05:38'),
(90, 1, 17, 'paid', 105, '2018-10-10 00:24:19'),
(91, 1, 17, 'paid', 105, '2018-10-10 00:25:42'),
(92, 1, 17, 'paid', 105, '2018-10-10 00:27:52'),
(93, 1, 17, 'paid', 122, '2018-10-10 00:49:49'),
(94, 4, 17, 'paid', 128, '2018-10-10 00:56:45'),
(95, 1, 17, 'paid', 105, '2018-10-15 02:25:03'),
(96, 2, 19, 'paid', 129, '2018-10-15 16:46:13'),
(97, 2, 17, 'paid', 128, '2018-10-23 20:21:46'),
(98, 2, 17, 'paid', 128, '2018-10-23 20:22:19'),
(99, 1, 17, 'paid', 128, '2018-10-23 20:45:06'),
(100, 2, 20, 'paid', 104, '2018-10-23 23:10:32'),
(101, 2, 20, 'paid', 104, '2018-10-23 23:17:38'),
(102, 1, 20, 'paid', 104, '2018-10-23 23:19:28'),
(103, 1, 20, 'paid', 104, '2018-10-23 23:20:40'),
(104, 1, 20, 'paid', 104, '2018-10-23 23:20:43'),
(105, 1, 20, 'paid', 104, '2018-10-23 23:21:51'),
(106, 1, 20, 'paid', 104, '2018-10-23 23:22:41'),
(107, 1, 20, 'paid', 104, '2018-10-23 23:22:51'),
(108, 1, 20, 'paid', 104, '2018-10-23 23:23:52'),
(109, 1, 20, 'paid', 104, '2018-10-23 23:24:34'),
(110, 1, 20, 'paid', 104, '2018-10-23 23:25:30'),
(111, 1, 20, 'paid', 104, '2018-10-23 23:25:55'),
(112, 1, 20, 'paid', 104, '2018-10-23 23:26:38'),
(113, 1, 20, 'paid', 104, '2018-10-23 23:27:02'),
(114, 1, 20, 'paid', 104, '2018-10-23 23:27:04'),
(115, 1, 20, 'paid', 104, '2018-10-23 23:27:16'),
(116, 1, 20, 'paid', 104, '2018-10-23 23:29:12'),
(117, 1, 20, 'paid', 104, '2018-10-23 23:29:33'),
(118, 1, 20, 'paid', 104, '2018-10-23 23:30:17'),
(119, 1, 20, 'paid', 104, '2018-10-23 23:30:54'),
(120, 1, 20, 'paid', 104, '2018-10-23 23:31:07'),
(121, 1, 20, 'paid', 104, '2018-10-23 23:31:40'),
(122, 1, 20, 'paid', 104, '2018-10-23 23:32:16'),
(123, 1, 20, 'paid', 104, '2018-10-23 23:32:25'),
(124, 1, 20, 'paid', 104, '2018-10-23 23:32:56'),
(125, 1, 20, 'paid', 104, '2018-10-23 23:33:26'),
(126, 1, 20, 'paid', 104, '2018-10-23 23:34:43'),
(127, 1, 20, 'paid', 104, '2018-10-23 23:35:09'),
(128, 1, 20, 'paid', 104, '2018-10-23 23:35:11'),
(129, 1, 20, 'paid', 104, '2018-10-23 23:35:20'),
(130, 1, 20, 'paid', 104, '2018-10-23 23:36:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `cafe`
--
ALTER TABLE `cafe`
  ADD PRIMARY KEY (`cfid`),
  ADD UNIQUE KEY `address` (`address`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`cfid`),
  ADD UNIQUE KEY `pno` (`pno`);

--
-- Indexes for table `contains`
--
ALTER TABLE `contains`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iid` (`iid`),
  ADD KEY `oid` (`oid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `pno` (`pno`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`eid`),
  ADD KEY `mid` (`mid`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`iid`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`mid`),
  ADD KEY `cfid` (`cfid`);

--
-- Indexes for table `ord`
--
ALTER TABLE `ord`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `eid` (`eid`),
  ADD KEY `ord_ibfk_1` (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `cafe`
--
ALTER TABLE `cafe`
  MODIFY `cfid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contains`
--
ALTER TABLE `contains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ord`
--
ALTER TABLE `ord`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`);

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`cfid`) REFERENCES `cafe` (`cfid`),
  ADD CONSTRAINT `contact_ibfk_2` FOREIGN KEY (`cfid`) REFERENCES `cafe` (`cfid`);

--
-- Constraints for table `contains`
--
ALTER TABLE `contains`
  ADD CONSTRAINT `contains_ibfk_1` FOREIGN KEY (`iid`) REFERENCES `item` (`iid`),
  ADD CONSTRAINT `contains_ibfk_2` FOREIGN KEY (`oid`) REFERENCES `ord` (`oid`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `manager` (`mid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`cfid`) REFERENCES `cafe` (`cfid`);

--
-- Constraints for table `ord`
--
ALTER TABLE `ord`
  ADD CONSTRAINT `ord_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`),
  ADD CONSTRAINT `ord_ibfk_2` FOREIGN KEY (`eid`) REFERENCES `employee` (`eid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
