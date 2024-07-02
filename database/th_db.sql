-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2024 at 09:12 AM
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
  `password` varchar(250) NOT NULL,
  `role` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `name`, `email`, `password`, `role`) VALUES
(1, 'Kevin Almirante', 'kevin.almirante@gmail.com', '2c103f2c4ed1e59c0b4e2e01821770fa', 'admin'),
(2, 'Gabriel Almirante', 'gabgab@gmail.com', '2c103f2c4ed1e59c0b4e2e01821770fa', 'admin'),
(3, 'Andrea Miranda', 'miranda.andrea@gmail.com', '2c103f2c4ed1e59c0b4e2e01821770fa', 'admin'),
(9, 'Tech Haven\'s Owner', 'super.admin@gmail.com', '2c103f2c4ed1e59c0b4e2e01821770fa', 'super_admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartID` int(100) NOT NULL,
  `customerID` int(100) NOT NULL,
  `prodID` int(50) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_price` int(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `img` text NOT NULL,
  `added_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartID`, `customerID`, `prodID`, `prod_name`, `prod_price`, `quantity`, `img`, `added_at`) VALUES
(30003, 20004, 151563, 'Rakk Pirah Wireless Mechanical Keyboard', 2796, 1, '../assets/img/For Ordering (4).png', '2024-07-02 09:08:29'),
(30004, 20004, 151561, 'Redragon M612 Predator', 899, 1, '../assets/img/For Ordering (2).png', '2024-07-02 09:09:23');

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
(2, 'Keyboard', '2024-06-20 20:10:03', 'Kevin Almirante'),
(9, 'Headset', '2024-07-02 01:12:42', 'Kevin Almirante'),
(10, 'Monitor', '2024-07-02 01:14:45', 'Kevin Almirante');

-- --------------------------------------------------------

--
-- Table structure for table `complete_orders`
--

CREATE TABLE `complete_orders` (
  `c_orderID` int(50) NOT NULL,
  `orderID` int(50) NOT NULL,
  `customerID` int(50) NOT NULL,
  `deliveryID` int(11) NOT NULL,
  `items` text NOT NULL,
  `total_amount` int(250) NOT NULL,
  `date_delivered` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complete_orders`
--

INSERT INTO `complete_orders` (`c_orderID`, `orderID`, `customerID`, `deliveryID`, `items`, `total_amount`, `date_delivered`) VALUES
(9, 8, 20004, 1, '[{\"name\":\"Redragon H260 HYLAS\",\"price\":\"839\",\"qty\":\"2\",\"totalPrice\":\"1678\"}]', 1678, '2024-06-30 01:57:45'),
(10, 9, 20004, 1, '[{\"name\":\"Redragon M612 Predator\",\"price\":\"899\",\"qty\":\"2\",\"totalPrice\":\"1798\"},{\"name\":\"Rakk Pirah Wireless Mechanical Keyboard\",\"price\":\"2796\",\"qty\":\"1\",\"totalPrice\":\"2796\"}]', 4594, '2024-07-01 02:04:54'),
(11, 10, 20004, 1, '[{\"name\":\"Viewplus MX-32CH\",\"price\":\"10346\",\"qty\":\"1\",\"totalPrice\":\"10346\"},{\"name\":\"Redragon M719 Invader\",\"price\":\"779\",\"qty\":\"1\",\"totalPrice\":\"779\"}]', 11125, '2024-07-02 02:08:30');

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
(20004, 'Gabriel CK Almirante', 'gabgab@gmail.com', '09260456391', 'B4 L23 Kimberton Ville, Niog 2, Bacoor City, Cavite', '2c103f2c4ed1e59c0b4e2e01821770fa'),
(20007, 'Jasmine Mirandahe', 'miranda.jasmine@gmail.com', '09663489557', '64 B, Don Carlos Street, Dasmarinas City', '2c103f2c4ed1e59c0b4e2e01821770fa'),
(20008, 'kiben pikolo', 'pikopiko@gmail.com', '09260456391', 'B4 L23 Kimberton Ville, Niog 2, Bacoor City, Cavite', '2c103f2c4ed1e59c0b4e2e01821770fa'),
(20012, 'test test', 'test@gmail.com', '09663489557', 'test, test', '2c103f2c4ed1e59c0b4e2e01821770fa');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `deliveryID` int(50) NOT NULL,
  `customerID` int(50) NOT NULL,
  `shipID` int(50) NOT NULL,
  `orderID` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackID` int(100) NOT NULL,
  `prodID` int(50) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `ratings` int(50) NOT NULL,
  `customerID` int(100) NOT NULL,
  `message` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msgID` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactNum` varchar(255) NOT NULL,
  `Message` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msgID`, `name`, `email`, `contactNum`, `Message`, `date_created`) VALUES
(1, 'Kiben Almirante', 'kibenkiben@gmail.com', '091231313', 'Hello collab pls', '2024-07-01 20:10:18');

-- --------------------------------------------------------

--
-- Table structure for table `msg_users`
--

CREATE TABLE `msg_users` (
  `user_msgID` int(50) NOT NULL,
  `customerID` int(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `msg_users`
--

INSERT INTO `msg_users` (`user_msgID`, `customerID`, `title`, `category`, `description`, `image`, `status`, `date_created`) VALUES
(1, 0, 'Order ID# Status Update', '0', 'Your order is now being prepared. We\'re carefully putting it together with the best ingredients for a great experience. Thanks for your patience, we\'ll have it ready for you soon!', 'preparing.png', 'unread', '2024-07-01 08:39:22'),
(2, 0, 'Order ID# Status Update', '0', 'Your order is now being prepared. We\'re carefully putting it together with the best ingredients for a great experience. Thanks for your patience, we\'ll have it ready for you soon!', 'preparing.png', 'unread', '2024-07-01 08:41:58'),
(3, 0, 'Order ID# Status Update', '0', 'Your order is now being prepared. We\'re carefully putting it together with the best ingredients for a great experience. Thanks for your patience, we\'ll have it ready for you soon!', 'preparing.png', 'unread', '2024-07-01 08:42:30'),
(4, 20004, 'Order ID# Status Update', 'Order status', 'Your order is now being prepared. We\'re carefully putting it together with the best ingredients for a great experience. Thanks for your patience, we\'ll have it ready for you soon!', 'preparing.png', 'unread', '2024-07-01 08:57:16'),
(5, 20004, 'Order ID#1 Status Update', 'Order status', 'Your order is on its way! We\'re excited to let you know that your order has been shipped and is currently en route to your address. Thank you for shopping with us. We appreciate your patience and hope you enjoy your purchase!!', 'delivery.png', 'unread', '2024-07-01 09:45:32'),
(6, 20004, 'Order ID# Status Update', 'Order status', 'Your order has been delivered! If you have any questions or need further assistance, feel free to reach out to our customer support team. Thank you for choosing Tech Haven!', 'thankyou.png', 'unread', '2024-07-01 09:50:39'),
(7, 20004, 'Order ID# Status Update', 'Order status', 'Your order is now being prepared. We\'re carefully putting it together with the best ingredients for a great experience. Thanks for your patience, we\'ll have it ready for you soon!', 'preparing.png', 'unread', '2024-07-01 09:54:48'),
(8, 20004, 'Order ID#2 Status Update', 'Order status', 'Your order is on its way! We\'re excited to let you know that your order has been shipped and is currently en route to your address. Thank you for shopping with us. We appreciate your patience and hope you enjoy your purchase!!', 'delivery.png', 'unread', '2024-07-01 09:54:57'),
(9, 20004, 'Order ID# Status Update', 'Order status', 'Your order is now being prepared. We\'re carefully putting it together with the best ingredients for a great experience. Thanks for your patience, we\'ll have it ready for you soon!', 'preparing.png', 'unread', '2024-07-01 09:56:08'),
(10, 20004, 'Order ID#2 Status Update', 'Order status', 'Your order has been delivered! If you have any questions or need further assistance, feel free to reach out to our customer support team. Thank you for choosing Tech Haven!', 'thankyou.png', 'unread', '2024-07-01 19:18:53'),
(11, 20004, 'Order ID#3 Status Update', 'Order status', 'Your order is on its way! We\'re excited to let you know that your order has been shipped and is currently en route to your address. Thank you for shopping with us. We appreciate your patience and hope you enjoy your purchase!!', 'delivery.png', 'unread', '2024-07-01 19:24:17'),
(12, 20004, 'Order ID#3 Status Update', 'Order status', 'Your order has been delivered! If you have any questions or need further assistance, feel free to reach out to our customer support team. Thank you for choosing Tech Haven!', 'thankyou.png', 'unread', '2024-07-01 19:25:44'),
(13, 20004, 'Order ID#3 Status Update', 'Order status', 'Your order is on its way! We\'re excited to let you know that your order has been shipped and is currently en route to your address. Thank you for shopping with us. We appreciate your patience and hope you enjoy your purchase!!', 'delivery.png', 'unread', '2024-07-01 19:28:15'),
(14, 20004, 'Order ID#3 Status Update', 'Order status', 'Your order has been delivered! If you have any questions or need further assistance, feel free to reach out to our customer support team. Thank you for choosing Tech Haven!', 'thankyou.png', 'unread', '2024-07-01 19:28:20'),
(15, 20004, 'Order ID#4 Status Update', 'Order status', 'Your order is now being process. Thanks for your patience, we\'ll have it deliver to you soon!', 'preparing.png', 'unread', '2024-07-01 20:30:43'),
(16, 20004, 'Order ID#4 Status Update', 'Order status', 'Your order is on its way! We\'re excited to let you know that your order has been shipped and is currently en route to your address. Thank you for shopping with us. We appreciate your patience and hope you enjoy your purchase!!', 'delivery.png', 'unread', '2024-07-01 20:30:47'),
(17, 20004, 'Order ID#4 Status Update', 'Order status', 'Your order has been delivered! If you have any questions or need further assistance, feel free to reach out to our customer support team. Thank you for choosing Tech Haven!', 'thankyou.png', 'unread', '2024-07-01 20:30:53'),
(18, 20004, 'Order ID#4 Status Update', 'Order status', 'Your order is now being process. Thanks for your patience, we\'ll have it deliver to you soon!', 'preparing.png', 'unread', '2024-07-01 23:55:31'),
(19, 20004, 'Order ID#4 Status Update', 'Order status', 'Your order is on its way! We\'re excited to let you know that your order has been shipped and is currently en route to your address. Thank you for shopping with us. We appreciate your patience and hope you enjoy your purchase!!', 'delivery.png', 'unread', '2024-07-01 23:56:13'),
(20, 20004, 'Order ID#4 Status Update', 'Order status', 'Your order has been delivered! If you have any questions or need further assistance, feel free to reach out to our customer support team. Thank you for choosing Tech Haven!', 'thankyou.png', 'unread', '2024-07-02 00:05:55'),
(21, 20004, 'Order ID#6 Status Update', 'Order status', 'Your order is now being process. Thanks for your patience, we\'ll have it deliver to you soon!', 'preparing.png', 'unread', '2024-07-02 01:31:19'),
(22, 20004, 'Order ID#6 Status Update', 'Order status', 'Your order is on its way! We\'re excited to let you know that your order has been shipped and is currently en route to your address. Thank you for shopping with us. We appreciate your patience and hope you enjoy your purchase!!', 'delivery.png', 'unread', '2024-07-02 01:31:22'),
(23, 20004, 'Order ID#6 Status Update', 'Order status', 'Your order has been delivered! If you have any questions or need further assistance, feel free to reach out to our customer support team. Thank you for choosing Tech Haven!', 'thankyou.png', 'unread', '2024-07-02 01:31:25'),
(24, 20004, 'Order ID#8 Status Update', 'Order status', 'Your order is now being process. Thanks for your patience, we\'ll have it deliver to you soon!', 'preparing.png', 'unread', '2024-07-02 01:57:33'),
(25, 20004, 'Order ID#8 Status Update', 'Order status', 'Your order is now being process. Thanks for your patience, we\'ll have it deliver to you soon!', 'preparing.png', 'unread', '2024-07-02 01:57:35'),
(26, 20004, 'Order ID#8 Status Update', 'Order status', 'Your order is on its way! We\'re excited to let you know that your order has been shipped and is currently en route to your address. Thank you for shopping with us. We appreciate your patience and hope you enjoy your purchase!!', 'delivery.png', 'unread', '2024-07-02 01:57:42'),
(27, 20004, 'Order ID#8 Status Update', 'Order status', 'Your order has been delivered! If you have any questions or need further assistance, feel free to reach out to our customer support team. Thank you for choosing Tech Haven!', 'thankyou.png', 'unread', '2024-07-02 01:57:45'),
(28, 20004, 'Order ID#9 Status Update', 'Order status', 'Your order is now being process. Thanks for your patience, we\'ll have it deliver to you soon!', 'preparing.png', 'unread', '2024-07-02 02:04:40'),
(29, 20004, 'Order ID#9 Status Update', 'Order status', 'Your order is on its way! We\'re excited to let you know that your order has been shipped and is currently en route to your address. Thank you for shopping with us. We appreciate your patience and hope you enjoy your purchase!!', 'delivery.png', 'unread', '2024-07-02 02:04:49'),
(30, 20004, 'Order ID#9 Status Update', 'Order status', 'Your order has been delivered! If you have any questions or need further assistance, feel free to reach out to our customer support team. Thank you for choosing Tech Haven!', 'thankyou.png', 'unread', '2024-07-02 02:04:54'),
(31, 20004, 'Order ID#10 Status Update', 'Order status', 'Your order is now being process. Thanks for your patience, we\'ll have it deliver to you soon!', 'preparing.png', 'unread', '2024-07-02 02:08:25'),
(32, 20004, 'Order ID#10 Status Update', 'Order status', 'Your order is on its way! We\'re excited to let you know that your order has been shipped and is currently en route to your address. Thank you for shopping with us. We appreciate your patience and hope you enjoy your purchase!!', 'delivery.png', 'unread', '2024-07-02 02:08:27'),
(33, 20004, 'Order ID#10 Status Update', 'Order status', 'Your order has been delivered! If you have any questions or need further assistance, feel free to reach out to our customer support team. Thank you for choosing Tech Haven!', 'thankyou.png', 'unread', '2024-07-02 02:08:30');

-- --------------------------------------------------------

--
-- Table structure for table `ordercount`
--

CREATE TABLE `ordercount` (
  `ocID` int(50) NOT NULL,
  `prodID` int(50) NOT NULL,
  `prod_name` varchar(250) NOT NULL,
  `prod_price` int(250) NOT NULL,
  `prod_orders` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders_prod`
--

CREATE TABLE `orders_prod` (
  `orderID` int(50) NOT NULL,
  `customerID` int(50) NOT NULL,
  `items` text NOT NULL,
  `shipID` int(50) NOT NULL,
  `payment` varchar(250) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) NOT NULL,
  `total_amount` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_prod`
--

INSERT INTO `orders_prod` (`orderID`, `customerID`, `items`, `shipID`, `payment`, `order_date`, `status`, `total_amount`) VALUES
(8, 20004, '[{\"name\":\"Redragon H260 HYLAS\",\"price\":\"839\",\"qty\":\"2\",\"totalPrice\":\"1678\"}]', 1, 'COD', '2024-07-01 08:56:00', 'delivered', 1678),
(9, 20004, '[{\"name\":\"Redragon M612 Predator\",\"price\":\"899\",\"qty\":\"2\",\"totalPrice\":\"1798\"},{\"name\":\"Rakk Pirah Wireless Mechanical Keyboard\",\"price\":\"2796\",\"qty\":\"1\",\"totalPrice\":\"2796\"}]', 1, 'COD', '2024-07-01 08:56:00', 'delivered', 4594),
(10, 20004, '[{\"name\":\"Viewplus MX-32CH\",\"price\":\"10346\",\"qty\":\"1\",\"totalPrice\":\"10346\"},{\"name\":\"Redragon M719 Invader\",\"price\":\"779\",\"qty\":\"1\",\"totalPrice\":\"779\"}]', 1, 'COD', '2024-07-01 08:56:00', 'delivered', 11125),
(11, 20004, '[{\"name\":\"Viewplus MX-32CH\",\"price\":\"5626\",\"qty\":\"1\",\"totalPrice\":\"5626\"},{\"name\":\"Redragon H260 HYLAS\",\"price\":\"839\",\"qty\":\"1\",\"totalPrice\":\"839\"},{\"name\":\"Redragon K617 FIZZ\",\"price\":\"1632\",\"qty\":\"1\",\"totalPrice\":\"1632\"}]', 1, 'COD', '2024-07-02 08:56:00', 'placed', 8097);

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
(151561, 'Redragon M612 Predator', 'Mouse', 'Redragon M612 PREDATOR RGB Gaming Mouse', 899, 'REDRAGON', 'For Ordering (2).png', '2024-07-02 00:52:39', '2024-07-02 00:56:15'),
(151562, 'Redragon M719 Invader', 'Mouse', 'Redragon M719 Invader RGB Wired Optical Gaming Mouse| Ergonomic', 779, 'REDRAGON', 'For Ordering (3).png', '2024-07-02 01:00:20', '2024-07-02 01:00:20'),
(151563, 'Rakk Pirah Wireless Mechanical Keyboard', 'Keyboard', 'Rakk Pirah/Plus 66 Wireless Mechanical Keyboard| RGB| Black', 2796, 'RAKK', 'For Ordering (4).png', '2024-07-02 01:03:05', '2024-07-02 01:03:05'),
(151564, 'Asus ROG Azoth PBT NX Snow Mechanical', 'Keyboard', 'Asus ROG Azoth PBT NX Snow Gaming Keyboard Mechanical| RGB', 14356, 'ASUS', 'For Ordering (5).png', '2024-07-02 01:10:19', '2024-07-02 01:10:19'),
(151565, 'Asus TUF Gaming H3', 'Headset', 'ASUS TUF GAMING H3 Wired Gaming Headset with 7.1 Virtual Surround Sound', 2269, 'ASUS', 'For Ordering (7).png', '2024-07-02 01:13:17', '2024-07-02 01:14:24'),
(151566, 'Fantech Valor MH86', 'Headset', 'Fantech Valor MH86 Multi Platform 3.5mm aux nylon braided cable lightweight Gaming Headset', 1082, 'FANTECH', 'For Ordering (6).png', '2024-07-02 01:14:03', '2024-07-02 01:14:03'),
(151567, 'Viewplus MX-32CH', 'Monitor', 'Viewplus MX-32CH Curved gaming monitor | 32 inch| 165Hz', 10346, 'VIEWPLUS', 'For Ordering (8).png', '2024-07-02 01:18:20', '2024-07-02 01:18:20'),
(151568, 'Viewplus ML-27S 75hz', 'Monitor', 'ViewPlus ML-27S 75hz and 100Hz Monitor| 1080p Resolution', 5626, 'VIEWPLUS', 'For Ordering (9).png', '2024-07-02 01:19:21', '2024-07-02 01:19:21'),
(151569, 'Nvision ES32G2 32\" Curved', 'Monitor', 'Nvision ES32G2 32-inch Curved Gaming Monitor| Va Panel| 165Hz', 10039, 'NVISION', 'For Ordering (11).png', '2024-07-02 01:21:33', '2024-07-02 01:21:33'),
(151570, 'Redragon M609 PHASER', 'Mouse', 'Redragon M609 PHASER Omron Switches 7 Programmable Buttons Gaming Mouse', 501, 'REDRAGON', 'For Ordering (12).png', '2024-07-02 01:23:07', '2024-07-02 01:23:07'),
(151571, 'Redragon H260 HYLAS', 'Headset', 'Redragon H260 HYLAS RGB Backlighting Built-in volume adjustment Wired Gaming Headset', 839, 'REDRAGON', 'For Ordering (13).png', '2024-07-02 01:24:24', '2024-07-02 01:24:24'),
(151572, 'Redragon K617 FIZZ', 'Keyboard', 'Redragon K617 FIZZ 60% Wired RGB Gaming Keyboard Blue Switch', 1632, 'REDRAGON', 'For Ordering (14).png', '2024-07-02 01:26:24', '2024-07-02 01:26:24');

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
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prod_inventory`
--

INSERT INTO `prod_inventory` (`invID`, `prodID`, `prod_name`, `price`, `qty`, `sold`, `last_update`, `updated_by`) VALUES
(6, 151561, 'Redragon M612 Predator', 899, 8, 2, '2024-07-02 02:04:54', 'Kevin Almirante'),
(7, 151562, 'Redragon M719 Invader', 779, 17, 1, '2024-07-02 02:08:30', 'Kevin Almirante'),
(8, 151563, 'Rakk Pirah Wireless Mechanical Keyboard', 2796, 29, 1, '2024-07-02 02:04:54', 'Kevin Almirante'),
(9, 151564, 'Asus ROG Azoth PBT NX Snow Mechanical', 14356, 7, 0, '2024-07-02 02:00:34', 'Kevin Almirante'),
(10, 151565, 'Asus TUF Gaming H3 Wired Gaming Headset', 2269, 26, 0, '2024-07-02 02:00:34', 'Kevin Almirante'),
(11, 151566, 'Fantech Valor MH86', 1082, 3, 0, '2024-07-02 02:00:34', 'Kevin Almirante'),
(12, 151567, 'Viewplus MX-32CH', 10346, 14, 1, '2024-07-02 02:08:30', 'Kevin Almirante'),
(13, 151568, 'Viewplus ML-27S 75hz', 5626, 25, 0, '2024-07-02 02:00:34', 'Kevin Almirante'),
(14, 151569, 'Nvision ES32G2 32\" Curved', 10039, 7, 0, '2024-07-02 02:00:34', 'Kevin Almirante'),
(15, 151570, 'Redragon M609 PHASER', 501, 15, 0, '2024-07-02 02:00:34', 'Kevin Almirante'),
(16, 151571, 'Redragon H260 HYLAS', 839, 4, 2, '2024-07-02 01:57:45', 'Kevin Almirante'),
(17, 151572, 'Redragon K617 FIZZ', 1632, 2, 0, '2024-07-02 01:37:01', 'Gabriel Almirante');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shipID` int(50) NOT NULL,
  `customerID` int(50) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shipID`, `customerID`, `address`) VALUES
(1, 20004, 'sa gedli lang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`),
  ADD KEY `prodID` (`prodID`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `complete_orders`
--
ALTER TABLE `complete_orders`
  ADD PRIMARY KEY (`c_orderID`);

--
-- Indexes for table `customerinfo`
--
ALTER TABLE `customerinfo`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`deliveryID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackID`),
  ADD KEY `productfeed` (`prodID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msgID`);

--
-- Indexes for table `msg_users`
--
ALTER TABLE `msg_users`
  ADD PRIMARY KEY (`user_msgID`);

--
-- Indexes for table `ordercount`
--
ALTER TABLE `ordercount`
  ADD PRIMARY KEY (`ocID`),
  ADD KEY `ordercount` (`prodID`);

--
-- Indexes for table `orders_prod`
--
ALTER TABLE `orders_prod`
  ADD PRIMARY KEY (`orderID`);

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
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shipID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30005;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `complete_orders`
--
ALTER TABLE `complete_orders`
  MODIFY `c_orderID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customerinfo`
--
ALTER TABLE `customerinfo`
  MODIFY `customerID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20013;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `deliveryID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msgID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `msg_users`
--
ALTER TABLE `msg_users`
  MODIFY `user_msgID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `ordercount`
--
ALTER TABLE `ordercount`
  MODIFY `ocID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_prod`
--
ALTER TABLE `orders_prod`
  MODIFY `orderID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prodID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151573;

--
-- AUTO_INCREMENT for table `prod_inventory`
--
ALTER TABLE `prod_inventory`
  MODIFY `invID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shipID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `productfeed` FOREIGN KEY (`prodID`) REFERENCES `products` (`prodID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ordercount`
--
ALTER TABLE `ordercount`
  ADD CONSTRAINT `ordercount` FOREIGN KEY (`prodID`) REFERENCES `products` (`prodID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prod_inventory`
--
ALTER TABLE `prod_inventory`
  ADD CONSTRAINT `prod` FOREIGN KEY (`prodID`) REFERENCES `products` (`prodID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
