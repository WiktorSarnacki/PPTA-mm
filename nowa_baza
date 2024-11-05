-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2024 at 02:25 PM
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
-- Database: `allegro`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(6) UNSIGNED NOT NULL,
  `id_uzytkownika` int(6) NOT NULL,
  `id_produktu` int(6) NOT NULL,
  `ilosc` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produkty`
--

CREATE TABLE `produkty` (
  `id` int(255) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `seller` varchar(255) NOT NULL,
  `rating` int(255) NOT NULL,
  `prod_thumbnail` varchar(255) NOT NULL,
  `user_id` int(6) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produkty`
--

INSERT INTO `produkty` (`id`, `prod_name`, `price`, `seller`, `rating`, `prod_thumbnail`, `user_id`, `description`) VALUES
(16, 'Testowy produkt', 120, 'Jan', 0, 'uploads/16.jpg', 1, 'opis');

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `adress` varchar(60) DEFAULT NULL,
  `number` varchar(9) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `upassword` varchar(24) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`id`, `name`, `surname`, `adress`, `number`, `email`, `upassword`) VALUES
(1, 'Jan', 'Nowak', '10-244', '123456789', 'superEmail@gmail.com', 'niewiem'),
(2, 'Robert', 'Kowalski', '14-160', '098765432', 'superEmail2@gmail.com', 'haslo123'),
(3, 'Wojtek', 'Żuk', '34-768', '765432452', 'w.spell@gmail.com', 'haslo321'),
(4, 'Mariusz', 'Pudzianowski', '43-854', '234567819', 'superEmail3@gmail.com', 'ludologia'),
(5, 'Tomasz', 'Krzyżanowski', '43-615', '765132409', 'aikido@gmail.com', '7danow'),
(6, 'Jordan', 'Peterson', '23-917', '756438273', 'superEmail4@gmail.com', 'psychologia'),
(7, 'Morihei', 'Ueshiba', '76-345', '764219700', 'aikido2@gmail.com', 'aikidoIsLife'),
(8, 'kasztab', 'kastzab', '12-923', '123456788', '12345@1234.comsd', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`),
  ADD KEY `id_produktu` (`id_produktu`);

--
-- Indexes for table `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`user_id`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `userdata` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_produktu`) REFERENCES `produkty` (`id`);

--
-- Constraints for table `produkty`
--
ALTER TABLE `produkty`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `userdata` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
