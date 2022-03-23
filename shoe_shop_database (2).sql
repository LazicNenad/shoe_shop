-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2021 at 06:53 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoe_shop_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `idBrand` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`idBrand`, `name`) VALUES
(1, 'Bogner'),
(2, 'Paciotti'),
(3, 'Armani'),
(4, 'Replay'),
(5, 'Nike'),
(6, 'Tommy Hilfiger');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `idCat` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`idCat`, `name`) VALUES
(1, 'Men'),
(2, 'Women');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `idMenu` int(10) NOT NULL,
  `text` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(70) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`idMenu`, `text`, `path`) VALUES
(1, 'Home', 'index.php'),
(2, 'Store', 'store.php'),
(3, 'Contact', 'contact.php'),
(4, 'Author', 'author.php'),
(5, 'Admin', 'admin-panel.php'),
(6, 'Log in', 'login.php'),
(7, 'Log out', 'models/logout-process.php'),
(8, 'Register', 'register.php');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `idMessage` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`idMessage`, `name`, `lastName`, `email`, `message`) VALUES
(1, 'Nenad', 'Lazic', 'w.nesa.97@gmail.com', 'dasdasdasdddddddddddddddddddddddd'),
(3, 'Nenad', 'Lazic', 'w.nesa.97@gmail.com', 'AASDJJASDKASDJKASDJKJKASDASJKSJSJKSDJK'),
(4, 'Nenad', 'Lazic', 'w.nesa.97@gmail.com', 'AASDJJASDKASDJKASDJKJKASDASJKSJSJKSDJK'),
(5, 'Nenad', 'Lazic', 'w.nesa.97@gmail.com', 'ASDASD>A>>ASD>ASD><AS<ASDMASDMSDMASDMMAS');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `idProduct` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `oldPrice` decimal(10,2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `idCat` int(10) NOT NULL,
  `idBrand` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`idProduct`, `name`, `price`, `oldPrice`, `date`, `image`, `idCat`, `idBrand`) VALUES
(1, 'MEN SNEAKER BOGNER WASHINGTON 1C', '350.00', '375.00', '2021-04-22 10:43:03', 'assets/img/bogner-index.jpg', 1, 1),
(2, 'MEN SNEAKER BOGNER WASHINGTON 1B', '400.00', '423.00', '2021-04-22 10:50:22', 'assets/img/bogner-store-1.jpg', 1, 1),
(3, 'REPLAY MEN SHOE CALIFORNIA', '200.00', '219.00', '2021-04-22 10:50:22', 'assets/img/replay-store-1.jpg', 1, 4),
(6, 'PACIOTTI MEN SHOE 4US', '379.00', '400.00', '2021-04-22 10:52:26', 'assets/img/paciotti-store-1.jpg', 1, 2),
(7, 'PACIOTTI MEN SHOE 4US', '399.00', '420.00', '2021-04-22 10:52:26', 'assets/img/paciotti-store-2.jpg', 1, 2),
(8, 'NIKE SPORTS MEN', '250.00', '276.00', '2021-04-22 10:53:18', 'assets/img/nike-store-1.jpg', 1, 5),
(9, 'NIKE SPORTS MEN RUNNING', '225.00', '300.00', '2021-04-22 10:53:18', 'assets/img/nike-store-2.jpg', 1, 5),
(10, 'REPLAY BOOTS', '420.00', '450.00', '2021-04-25 18:48:32', 'assets/img/replay-store-1w.jpg', 2, 4),
(11, 'WOMAN BOOTS REPLAY CALIFORNIA', '410.00', '435.00', '2021-04-25 18:48:32', 'assets/img/replay-store-2w.jpg', 2, 4),
(12, 'WOMAN SHOE PACIOTTI 4US', '325.00', '355.00', '2021-04-25 18:54:41', 'assets/img/paciotti-store-1w.jpg', 2, 2),
(13, 'WOMAN SHOE PACIOTTI 4US', '310.00', '345.00', '2021-04-25 18:54:41', 'assets/img/paciotti-store-2w.jpg', 2, 2),
(16, 'WOMAN SHOE BOGNER NEW MALAGA 8', '385.00', '424.00', '2021-04-25 18:57:28', 'assets/img/bogner-store-1w.jpg', 2, 1),
(17, 'WOMAN SHOE BOGNER NEW MALAGA 7 B', '429.00', '485.00', '2021-04-25 18:57:28', 'assets/img/bogner-store-2w.jpg', 2, 1),
(18, 'WOMAN SHOE PACIOTTI 4US', '155.00', '199.00', '2021-04-25 18:58:24', 'assets/img/paciotti-store-3w.jpg', 2, 2),
(20, 'WOMAN SHOE PACIOTTI 4US', '199.00', '225.00', '2021-04-25 18:59:17', 'assets/img/paciotti-store-4w.jpg', 2, 2),
(21, 'WOMAN SHOE ARMANI EXCHANGE SNEAKER', '299.00', '325.00', '2021-04-25 18:59:50', 'assets/img/armani-store-1w.jpg', 2, 3),
(22, 'WOMAN SHOE ARMANI EXCHANGE SNEAKER', '244.00', '295.00', '2021-04-25 19:00:25', 'assets/img/armani-store-2w.jpg', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `idRole` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`idRole`, `name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUser` int(10) NOT NULL,
  `firstName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `idRole` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUser`, `firstName`, `lastName`, `email`, `password`, `date`, `idRole`) VALUES
(3, 'Nenad', 'Lazic', 'w.nesa.97@gmail.com', '938569b738d8dcf615dd3fd877049c55', '2021-04-22 21:47:50', 1),
(4, 'Ivan', 'Ivanovic', 'ivan.ivanovic@gmail.com', '76869590b5092152d4804397e1764015', '2021-04-22 21:48:06', 2),
(8, 'Nemanja', 'Ilic', 'nemanja@gmail.com', '291b6daa282103d4aef036307b539cd2', '2021-05-04 23:16:00', 1),
(9, 'Nemanja', 'Ilic', 'nemanjailic@gmail.com', '291b6daa282103d4aef036307b539cd2', '2021-05-05 00:03:44', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`idBrand`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCat`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idMenu`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`idMessage`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`idProduct`),
  ADD KEY `idCat` (`idCat`),
  ADD KEY `idBrand` (`idBrand`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRole`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idRole` (`idRole`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `idBrand` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `idCat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `idMenu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `idMessage` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `idProduct` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `idRole` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`idCat`) REFERENCES `category` (`idCat`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`idBrand`) REFERENCES `brand` (`idBrand`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idRole`) REFERENCES `roles` (`idRole`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
