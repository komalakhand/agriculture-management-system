-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2026 at 12:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agriculture_management_system`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetFarmerOrders` (IN `farmer_id` INT)   BEGIN
                    SELECT * FROM orders WHERE farmer_id = farmer_id;
                END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `manage_farmer` (IN `action` VARCHAR(10), IN `farmer_id` INT, IN `farmer_name` VARCHAR(100), IN `mobile_no` VARCHAR(15), IN `address` VARCHAR(255))   BEGIN
    IF action = 'insert' THEN
        INSERT INTO farmer (id, name, mobile_no, address) 
        VALUES (farmer_id, farmer_name, mobile_no, address);
    ELSEIF action = 'update' THEN
        UPDATE farmer SET name = farmer_name, mobile_no = mobile_no, address = address
        WHERE id = farmer_id;
    ELSEIF action = 'delete' THEN
        DELETE FROM farmer WHERE id = farmer_id;
    END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `mobile_no`, `address`) VALUES
(1, 'Company A', '9876543210', '123 Street, City, State'),
(2, 'Company B', '9123456789', '456 Avenue, City, State'),
(3, 'Company C', '9988776655', '789 Road, City, State'),
(4, 'Company D', '9234567890', '1010 Boulevard, City, State'),
(5, 'Company E', '9345678901', '2020 Lane, City, State'),
(6, 'Company F', '9456789012', '3030 Parkway, City, State'),
(7, 'Company G', '9567890123', '4040 Drive, City, State'),
(8, 'Company H', '9678901234', '5050 Crescent, City, State'),
(9, 'Company I', '9789012345', '6060 Circle, City, State'),
(10, 'Company J', '9890123456', '7070 Square, City, State'),
(11, 'company Y', '9923270183', 'nagpur, maharastra'),
(12, 'urbanX', '8769065457', 'kalmeshwar,maharashtra');

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`id`, `name`, `mobile_no`, `address`) VALUES
(103, 'shreya', '89765789065', 'nagpur, maharastra'),
(105, 'karan Agare', '9876567890', 'amravti'),
(109, 'Farmer J', '9890123456', '7070 Potato Street, Village J, State'),
(110, 'Farmer K', '9001234567', '8080 Wheat Road, Village K, State'),
(111, 'Komal Akhand', '09923270183', 'nagpur, maharastra'),
(112, 'Komal Akhand', '09923270183', 'nagpur, maharastra'),
(113, 'Roshni Nikhade', '8765431256', 'chndrapur,maharashra'),
(114, 'Nandini', '9876567890', 'sakoli,dashboard'),
(115, 'kran agare', '9876543423', 'amravti'),
(116, 'asdssfdgd', '1234533333', 'bvcbcvbcvbc'),
(117, 'sanchit patil', '9878906789', 'nagpur, maharastra');

-- --------------------------------------------------------

--
-- Stand-in structure for view `farmer_view`
-- (See below for the actual view)
--
CREATE TABLE `farmer_view` (
`id` int(11)
,`name` varchar(100)
,`mobile_no` varchar(15)
,`address` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `loan_id` int(11) NOT NULL,
  `loan_date` date NOT NULL,
  `loan_completion_date` date NOT NULL,
  `loan_amount` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`loan_id`, `loan_date`, `loan_completion_date`, `loan_amount`) VALUES
(1, '2023-01-15', '2025-01-15', 50000.00),
(2, '2023-02-20', '2026-02-20', 120000.00),
(3, '2023-03-10', '2025-03-10', 75000.00),
(4, '2023-04-05', '2027-04-05', 100000.00),
(5, '2023-05-12', '2026-05-12', 25000.00),
(6, '2023-06-17', '2025-06-17', 150000.00),
(7, '2023-07-20', '2026-07-20', 30000.00),
(8, '2023-08-10', '2027-08-10', 85000.00),
(9, '2023-09-25', '2026-09-25', 60000.00),
(10, '2023-10-30', '2027-10-30', 45000.00),
(11, '2023-11-15', '2026-11-15', 95000.00),
(12, '2024-11-12', '2025-12-12', 60000.00),
(13, '2025-04-21', '2025-05-21', 95000.00),
(14, '2024-04-12', '2025-06-11', 900000.00),
(15, '2024-04-12', '2025-06-11', 900000.00),
(16, '2021-11-23', '2022-04-24', 50000.00),
(17, '2021-04-02', '2023-06-05', 65467.00),
(18, '2012-04-12', '2021-06-04', 873796.00);

--
-- Triggers `loan`
--
DELIMITER $$
CREATE TRIGGER `after_loan_insert` AFTER INSERT ON `loan` FOR EACH ROW BEGIN
    INSERT INTO loan_log (loan_id, log_message)
    VALUES (NEW.loan_id, CONCAT('New loan inserted with amount ₹', NEW.loan_amount));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `loan_log`
--

CREATE TABLE `loan_log` (
  `log_id` int(11) NOT NULL,
  `loan_id` int(11) DEFAULT NULL,
  `log_message` varchar(255) DEFAULT NULL,
  `log_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loan_log`
--

INSERT INTO `loan_log` (`log_id`, `loan_id`, `log_message`, `log_time`) VALUES
(1, 11, 'New loan inserted with amount ₹95000.00', '2025-04-21 16:32:37'),
(2, 12, 'New loan inserted with amount ₹60000.00', '2025-04-22 14:16:55'),
(3, 13, 'New loan inserted with amount ₹95000.00', '2025-04-22 18:09:46'),
(4, 14, 'New loan inserted with amount ₹900000.00', '2025-04-22 18:14:38'),
(5, 15, 'New loan inserted with amount ₹900000.00', '2025-04-22 18:14:58'),
(6, 16, 'New loan inserted with amount ₹50000.00', '2025-04-22 18:15:29'),
(7, 17, 'New loan inserted with amount ₹65467.00', '2025-04-22 19:13:31'),
(8, 18, 'New loan inserted with amount ₹873796.00', '2025-04-22 19:17:39');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `product_id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `price`, `product_id`, `farmer_id`) VALUES
(4, 120.20, 4, 103),
(6, 90.30, 6, 105),
(10, 110.80, 10, 109),
(12, 433.00, 11, 110);

--
-- Triggers `orders`
--
DELIMITER $$
CREATE TRIGGER `after_order_delete` AFTER DELETE ON `orders` FOR EACH ROW INSERT INTO order_deletions_log (order_id, deleted_at)
            VALUES (OLD.order_id, NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_type`) VALUES
(1, 'Tomato Fertilizer', 'Fertilizer'),
(2, 'Wheat Fertilizer', 'Fertilizer'),
(3, 'Apple Insecticide', 'Insecticide'),
(4, 'Milk Pesticide', 'Pesticides'),
(5, 'Carrot Fertilizer', 'Fertilizer'),
(6, 'Rice Pesticide', 'Pesticides'),
(7, 'Orange Insecticide', 'Insecticide'),
(8, 'Cheese Pesticide', 'Pesticides'),
(9, 'Potato Fertilizer', 'Fertilizer'),
(10, 'Sugar Insecticide', 'Insecticide'),
(11, 'date insecticede', 'Pesticides'),
(12, '', 'Insecticide'),
(13, '', 'Insecticide'),
(14, '', 'Insecticide'),
(15, 'grapes fertilizer', 'Pesticides');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Komal', 'Admin@123'),
(2, 'Admin', 'Admin@789');

-- --------------------------------------------------------

--
-- Structure for view `farmer_view`
--
DROP TABLE IF EXISTS `farmer_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `farmer_view`  AS SELECT `farmer`.`id` AS `id`, `farmer`.`name` AS `name`, `farmer`.`mobile_no` AS `mobile_no`, `farmer`.`address` AS `address` FROM `farmer` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`loan_id`);

--
-- Indexes for table `loan_log`
--
ALTER TABLE `loan_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `farmer_id` (`farmer_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `loan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `loan_log`
--
ALTER TABLE `loan_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`farmer_id`) REFERENCES `farmer` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
