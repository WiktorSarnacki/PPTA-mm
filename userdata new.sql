-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Paź 14, 2024 at 03:12 PM
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
-- Database: `projektallegro`
--

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
-- Indeksy dla tabeli `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
