-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 06, 2022 at 04:36 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fidelity_stores`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

DROP TABLE IF EXISTS `billing`;
CREATE TABLE IF NOT EXISTS `billing` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Address` varchar(225) NOT NULL,
  `City` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`ID`, `Name`, `Email`, `Address`, `City`) VALUES
(1, 'Zainab Patel', 'zainabp269@gmail.com', '5 Mushemi Road, Rhodespark', 'Lusaka'),
(14, 'Zainab Patel', 'zainabp269@gmail.com', '5 Mushemi Road, Rhodespark', 'Lusaka'),
(5, 'Celaena Sardothien', 'sardothien26@gmail.com', '59th Street, Ishop Worldwide Zambia, 733', 'BROOKLYN'),
(8, 'Zainab Patel', 'zainabp269@gmail.com', '5 Mushemi Road, Rhodespark', 'Lusaka'),
(7, 'Jim Gordon', 'jimbo99@gmail.com', '4, Privet Drive', 'Ndola'),
(15, 'Zainab Patel', 'zainabp269@gmail.com', '5 Mushemi Road, Rhodespark', 'Lusaka');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `Category_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Category_Name` varchar(100) NOT NULL,
  `Category_status` varchar(30) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`Category_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_ID`, `Category_Name`, `Category_status`) VALUES
(3, 'Kitchenware', 'Active'),
(4, 'Childrens toys', 'Active'),
(5, '    Homeware', 'Deactive'),
(6, 'Furniture', 'Active'),
(7, 'Stationery', 'Active'),
(16, 'Electrical Appliances', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

DROP TABLE IF EXISTS `contact_messages`;
CREATE TABLE IF NOT EXISTS `contact_messages` (
  `Email` varchar(30) NOT NULL,
  `Subject` varchar(50) NOT NULL,
  `Message` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`Email`, `Subject`, `Message`) VALUES
('zainabp269@gmail.com', 'Hello', 'This is a test.');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `Inventory_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Supplier_ID` varchar(10) DEFAULT NULL,
  `Category_ID` int(11) DEFAULT NULL,
  `Item_Description` varchar(45) DEFAULT NULL,
  `Description` varchar(1000) NOT NULL DEFAULT 'No description has been added yet. For more information, contact us. ',
  `Image` varchar(255) NOT NULL,
  `Unit_Price` double DEFAULT NULL,
  `Quantity_purchased` int(11) DEFAULT NULL,
  `Amount_Owing` double GENERATED ALWAYS AS ((`Unit_Price` * `Quantity_purchased`)) VIRTUAL,
  `Status` varchar(30) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`Inventory_ID`),
  KEY `Supplier_ID` (`Supplier_ID`),
  KEY `Category_ID` (`Category_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`Inventory_ID`, `Supplier_ID`, `Category_ID`, `Item_Description`, `Description`, `Image`, `Unit_Price`, `Quantity_purchased`, `Status`) VALUES
(16, '3', 3, 'Bowl', '', 'bowl.jpeg', 10, 400, 'Active'),
(15, '3', 3, 'Plates', '', 'plate.jpeg', 15, 500, 'Active'),
(14, '6', 3, 'Pans', '', 'pans.jpg', 25, 200, 'Active'),
(13, '6', 3, 'Pots', '', 'pots1.jpg', 100, 200, 'Active'),
(17, '6', 3, 'Knives', '', 'knives.jpg', 15, 200, 'Active'),
(18, '3', 3, 'Forks', '', 'forks.jpeg', 6, 600, 'Active'),
(19, '3', 3, 'Mugs', '', 'mugs.jpeg', 10, 300, 'Active'),
(20, '3', 3, 'Spoons', '', 'spoons.jpeg', 4, 700, 'Active'),
(21, '1', 16, 'Blender', '', 'blender.jpg', 150, 100, 'Active'),
(22, '1', 16, 'Mixer', '', 'mixer.jpg', 120, 60, 'Active'),
(23, '1', 16, 'Fans', '', 'fans.jpg', 130, 100, 'Active'),
(24, '1', 16, 'Stove', '', 'stove.jpg', 200, 150, 'Active'),
(25, '1', 16, 'Hair dryer', '', 'hair_dryers.jpg', 250, 50, 'Active'),
(26, '1', 16, 'Kettle', '', 'kettles.jpg', 130, 120, 'Active'),
(27, '1', 16, 'Deep fryer', '', 'fryer.jpg', 130, 70, 'Active'),
(28, '3', 6, 'Office chair', '', 'chair.jpg', 70, 50, 'Active'),
(29, '3', 6, 'Bar stool', '', 'bar_stool.jpg', 80, 250, 'Active'),
(30, '6', 6, 'Single bed', '', 'bed.jpeg', 250, 80, 'Active'),
(31, '3', 6, 'Coffee table', '', 'coffee_table.jpg', 250, 75, 'Active'),
(32, '3', 6, 'Desk', '', 'office_desk.jpg', 300, 45, 'Active'),
(34, '6', 6, 'Wardrobe', '', 'wardrobe.jpeg', 350, 25, 'Active'),
(35, '5', 7, 'Pens', '', 'pens.jpg', 2, 800, 'Active'),
(36, '5', 7, 'Pencils', '', 'pencils1.jpeg', 3, 700, 'Active'),
(37, '5', 7, 'Eraser', '', 'erasers1.jpeg', 2, 600, 'Active'),
(38, '5', 7, 'Crayons', '', 'crayons1.jpeg', 15, 600, 'Active'),
(39, '5', 7, 'Scientific Calculator', '', 'calculator1.jpeg', 80, 500, 'Active'),
(40, '5', 7, 'Mathematical set', '', 'math_set1.jpeg', 40, 450, 'Active'),
(41, '2', 4, 'Ball', '', 'ball1.jpeg', 5, 350, 'Active'),
(42, '2', 4, 'Board games', '', 'board_game.jpeg', 25, 250, 'Active'),
(43, '2', 4, 'Toy car', '', 'toy_car_.jpeg', 35, 350, 'Active'),
(44, '2', 4, 'Toy plane', '', 'plane1.jpg', 25, 450, 'Active'),
(45, '2', 4, 'Rubiks cube', '', 'rubiks_cube.jpeg', 8, 450, 'Active'),
(46, '2', 4, 'Toy train', '', 'train1.jpeg', 18, 450, 'Active'),
(47, '2', 4, 'Toy motor cycle', '', 'motor_cycle1.jpeg', 25, 250, 'Active'),
(49, '1', 16, 'Toaster', '', 'toasters.jpeg', 125, 650, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `Order_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Inventory_ID` int(11) NOT NULL,
  `User_email` varchar(30) NOT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Total_Per_Product` double DEFAULT NULL,
  `Date_purchased` timestamp NOT NULL,
  PRIMARY KEY (`Order_ID`),
  KEY `Inventory_ID` (`Inventory_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_ID`, `Inventory_ID`, `User_email`, `Quantity`, `Total_Per_Product`, `Date_purchased`) VALUES
(28, 20, 'zainabp269@gmail.com', 4, 16, '2022-05-02 09:33:28'),
(15, 29, 'zainabp269@gmail.com', 2, 160, '2022-04-21 17:38:41'),
(29, 30, 'zainabp269@gmail.com', 2, 500, '2022-05-02 09:33:28'),
(23, 35, 'jimbo99@gmail.com', 3, 6, '2022-04-21 18:50:27'),
(24, 49, 'jimbo99@gmail.com', 3, 375, '2022-04-21 18:50:27'),
(20, 35, 'sardothien26@gmail.com', 3, 6, '2022-04-21 18:47:20'),
(21, 42, 'sardothien26@gmail.com', 3, 75, '2022-04-21 18:47:20'),
(22, 49, 'sardothien26@gmail.com', 3, 375, '2022-04-21 18:47:20'),
(25, 30, 'jimbo99@gmail.com', 2, 500, '2022-04-21 18:50:27'),
(26, 35, 'zainabp269@gmail.com', 3, 6, '2022-04-22 17:40:39'),
(27, 42, 'zainabp269@gmail.com', 3, 75, '2022-04-22 17:40:39'),
(47, 35, 'zainabp269@gmail.com', 2, 4, '2022-05-02 10:15:55'),
(46, 30, 'zainabp269@gmail.com', 2, 500, '2022-05-02 10:15:55'),
(45, 20, 'zainabp269@gmail.com', 4, 16, '2022-05-02 10:15:55'),
(44, 35, 'zainabp269@gmail.com', 2, 4, '2022-05-02 10:15:34'),
(42, 20, 'zainabp269@gmail.com', 4, 16, '2022-05-02 10:15:34'),
(43, 30, 'zainabp269@gmail.com', 2, 500, '2022-05-02 10:15:34');

--
-- Triggers `orders`
--
DROP TRIGGER IF EXISTS `Total_amount_per_product_insert`;
DELIMITER $$
CREATE TRIGGER `Total_amount_per_product_insert` BEFORE INSERT ON `orders` FOR EACH ROW set new.Total_Per_Product = (select new.Quantity*inventory.Unit_Price from inventory where new.Inventory_ID=inventory.Inventory_ID)
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `Total_amount_per_product_update`;
DELIMITER $$
CREATE TRIGGER `Total_amount_per_product_update` BEFORE UPDATE ON `orders` FOR EACH ROW set new.Total_Per_Product = (select new.Quantity*inventory.Unit_Price from inventory where new.Inventory_ID=inventory.Inventory_ID)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `order_totals`
--

DROP TABLE IF EXISTS `order_totals`;
CREATE TABLE IF NOT EXISTS `order_totals` (
  `User_email` varchar(30) NOT NULL,
  `Date_purchased` timestamp NOT NULL,
  `Subtotal` double(19,2) DEFAULT NULL,
  `Value_Added_Tax` double(19,2) DEFAULT NULL,
  `Total` double(19,2) DEFAULT NULL,
  PRIMARY KEY (`User_email`,`Date_purchased`),
  KEY `Date_purchased` (`Date_purchased`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_totals`
--

INSERT INTO `order_totals` (`User_email`, `Date_purchased`, `Subtotal`, `Value_Added_Tax`, `Total`) VALUES
('jimbo99@gmail.com', '2022-04-21 18:50:27', 881.00, 140.96, 1021.96),
('sardothien26@gmail.com', '2022-04-21 18:47:20', 456.00, 72.96, 528.96),
('zainabp269@gmail.com', '2022-04-21 17:38:41', 610.00, 97.60, 707.60);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `Supplier_ID` varchar(10) NOT NULL,
  `Total_Amount_Owing` double DEFAULT NULL,
  `Amount_Paid` double DEFAULT NULL,
  `Supplier_Amount_Outstanding` double GENERATED ALWAYS AS ((`Total_Amount_Owing` - `Amount_Paid`)) VIRTUAL,
  PRIMARY KEY (`Supplier_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Triggers `payments`
--
DROP TRIGGER IF EXISTS `amount_owing_insert`;
DELIMITER $$
CREATE TRIGGER `amount_owing_insert` BEFORE INSERT ON `payments` FOR EACH ROW set new.Total_Amount_Owing = (select sum(Amount_Owing) from Inventory where Inventory.Supplier_ID=new.Supplier_ID group by Supplier_ID)
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `amount_owing_update`;
DELIMITER $$
CREATE TRIGGER `amount_owing_update` BEFORE UPDATE ON `payments` FOR EACH ROW set new.Total_Amount_Owing = (select sum(Amount_Owing) from Inventory where Inventory.Supplier_ID=new.Supplier_ID group by Supplier_ID)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

DROP TABLE IF EXISTS `receipts`;
CREATE TABLE IF NOT EXISTS `receipts` (
  `User_ID` varchar(10) NOT NULL,
  `Total_Amount_Due` double DEFAULT NULL,
  `Amount_Received` double DEFAULT NULL,
  `Amount_Outstanding` double GENERATED ALWAYS AS ((`Total_Amount_Due` - `Amount_Received`)) VIRTUAL,
  PRIMARY KEY (`User_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Triggers `receipts`
--
DROP TRIGGER IF EXISTS `amount_due_insert`;
DELIMITER $$
CREATE TRIGGER `amount_due_insert` BEFORE INSERT ON `receipts` FOR EACH ROW set new.Total_Amount_Due = (select sum(Total) from orders,order_totals where orders.User_ID=new.User_ID
 AND order_totals.Order_ID=orders.Order_ID group by User_ID)
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `amount_due_update`;
DELIMITER $$
CREATE TRIGGER `amount_due_update` BEFORE UPDATE ON `receipts` FOR EACH ROW set new.Total_Amount_Due = (select sum(Total) from orders,order_totals where orders.User_ID=new.User_ID
 AND order_totals.Order_ID=orders.Order_ID group by User_ID)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `Supplier_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Supplier_Name` varchar(30) DEFAULT NULL,
  `Supplier_Tel` longtext,
  `Supplier_Email` varchar(30) NOT NULL,
  PRIMARY KEY (`Supplier_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`Supplier_ID`, `Supplier_Name`, `Supplier_Tel`, `Supplier_Email`) VALUES
(1, 'Levi Industries', '0966357159', 'levi22@gmail.com'),
(2, 'Satoru Investors Ltd', '    0965247863', '    satoru76@yahoo.com'),
(3, 'Sardothien Enterprises ', '0965874145', 'sardothien88@hotmail.com'),
(6, 'Barry Investments', '0147896325', 'barry_investments@hotmail.com'),
(5, 'Wayne Enterprises', '0756984125', 'wayne_enterprises@gmail.com'),
(8, 'Zenitsu Trading', '0764582147', 'zenitsu99@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `User_ID` varchar(30) NOT NULL,
  `User_name` varchar(30) NOT NULL,
  `User_email` varchar(30) NOT NULL,
  `Password` varchar(1000) NOT NULL,
  `User_type` varchar(30) NOT NULL DEFAULT 'Customer',
  `Date_registered` timestamp NOT NULL,
  PRIMARY KEY (`User_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `User_name`, `User_email`, `Password`, `User_type`, `Date_registered`) VALUES
('21599756', 'Zainab Patel', 'zainabp269@gmail.com', '$2y$10$hEJfglCRt/WCRrX2s2ozIuU5.DtbqPecdjmehfoR5fLep2A97ulQO', 'Customer', '2022-03-14 04:25:43'),
('472306059', 'Shinobu', 'butterfly@gmail.com', '$2y$10$27.CJcj7hcWU9o9c7BidNenVacmk.4aQ6SC.i3wK2xn.YuZD1sE6G', 'Customer', '2022-05-01 04:57:31'),
('318399273', 'Admin', 'admin@gmail.com', '$2y$10$VFo4o1FwZqafwWsrQ6.oP.TFk7qvoPKOFsAi.TwoXVqa60hrahpMG', 'Admin', '2022-03-14 04:27:09');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
