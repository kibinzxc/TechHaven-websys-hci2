-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2024 at 12:35 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `th_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(50) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `name`, `email`, `password`) VALUES
(1, 'Kevin Almirante', 'kevin.almirante@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(50) NOT NULL,
  `name` varchar(250) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `added_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `name`, `date_created`, `added_by`) VALUES
(1, 'Mouse', '2024-06-20 19:53:35', 'Song Moon Lee'),
(2, 'Keyboard', '2024-06-20 20:10:03', 'Kevin Almirante');

-- --------------------------------------------------------

--
-- Table structure for table `customerinfo`
--

CREATE TABLE `customerinfo` (
  `customerID` int(100) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `contactNum` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customerinfo`
--

INSERT INTO `customerinfo` (`customerID`, `name`, `email`, `contactNum`, `address`, `password`) VALUES
(20004, 'Gabriel CK', 'gabgab@gmail.com', '123', 'sa gedli lang', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackID` int(100) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `ratings` int(50) NOT NULL,
  `customerID` int(100) NOT NULL,
  `message` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackID`, `prod_name`, `ratings`, `customerID`, `message`, `date_created`) VALUES
(1, 'RAKK Ilis RGB Mechanical Keyboard Gateron Yellow\r\n', 5, 20001, 'The product is in good condition. I love it!! I will order again soon', '2024-06-18 15:57:08'),
(2, 'Rakk Aporo RGB Gaming Mouse', 3, 20001, 'The product is good however I saw some dents. The price is good', '2024-06-18 16:04:24');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prodID` int(50) NOT NULL,
  `prod_name` varchar(250) NOT NULL,
  `category` varchar(100) NOT NULL,
  `prod_desc` varchar(250) NOT NULL,
  `prod_price` int(50) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `img` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prodID`, `prod_name`, `category`, `prod_desc`, `prod_price`, `brand`, `img`, `date_created`, `date_updated`) VALUES
(151556, 'Rakk Alkus RGB Gaming Mouse', 'Mouse', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic type', 895, 'Rakk', 'mouse.png', '2024-06-20 19:40:59', '2024-06-20 19:40:59'),
(151557, 'Rakk Huna', 'Mouse', 'Testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing', 999, 'Rakk', 'sample.jpg', '2024-06-20 19:49:58', '2024-06-20 19:50:28');

-- --------------------------------------------------------

--
-- Table structure for table `prod_inventory`
--

CREATE TABLE `prod_inventory` (
  `invID` int(11) NOT NULL,
  `prodID` int(100) NOT NULL,
  `prod_name` varchar(250) NOT NULL,
  `price` int(50) NOT NULL,
  `qty` int(250) NOT NULL,
  `sold` int(100) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prod_inventory`
--

INSERT INTO `prod_inventory` (`invID`, `prodID`, `prod_name`, `price`, `qty`, `sold`, `last_update`, `updated_by`) VALUES
(1, 151556, 'Rakk Alkus RGB Gaming Mouse', 895, 53, 2, '2024-06-20 21:43:02', 'Kevin Almirante');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `customerinfo`
--
ALTER TABLE `customerinfo`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prodID`);

--
-- Indexes for table `prod_inventory`
--
ALTER TABLE `prod_inventory`
  ADD PRIMARY KEY (`invID`),
  ADD KEY `prod` (`prodID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customerinfo`
--
ALTER TABLE `customerinfo`
  MODIFY `customerID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20005;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prodID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151558;

--
-- AUTO_INCREMENT for table `prod_inventory`
--
ALTER TABLE `prod_inventory`
  MODIFY `invID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prod_inventory`
--
ALTER TABLE `prod_inventory`
  ADD CONSTRAINT `prod` FOREIGN KEY (`prodID`) REFERENCES `products` (`prodID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
