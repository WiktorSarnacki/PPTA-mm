-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Lis 05, 2024 at 12:44 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

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
-- Struktura tabeli dla tabeli `cart`
--

CREATE TABLE `cart` (
  `id` int(6) UNSIGNED NOT NULL,
  `id_uzytkownika` int(6) NOT NULL,
  `id_produktu` int(6) NOT NULL,
  `ilosc` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `id_uzytkownika`, `id_produktu`, `ilosc`) VALUES
(0, 2, 4, 54);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id` int(255) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `description` varchar(255) NOT NULL,
  `seller_id` int(255) NOT NULL,
  `rating` int(255) NOT NULL,
  `prod_thumbnail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produkty`
--

INSERT INTO `produkty` (`id`, `prod_name`, `price`, `description`, `seller_id`, `rating`, `prod_thumbnail`) VALUES
(4, 'kot', 1020, 'kot', 1, 0, 'uploads/1.jpg'),
(6, 'kot2', 999, 'kot2', 2, 0, 'uploads/2.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `userdata`
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
(7, 'Morihei', 'Ueshiba', '76-345', '764219700', 'aikido2@gmail.com', 'aikidoIsLife');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
