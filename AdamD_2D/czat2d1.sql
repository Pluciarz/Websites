-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 30 Lis 2023, 22:19
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `czat2d1`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `imie` varchar(30) DEFAULT NULL,
  `nazwisko` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `login` varchar(50) NOT NULL,
  `haslo` varchar(50) NOT NULL,
  `zdjecia` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `imie`, `nazwisko`, `email`, `login`, `haslo`, `zdjecia`) VALUES
(19, 'Test', 'Testowy', 'serio@gmail.com', 'lubieplacki', 'eee440bfbe0801ec3f533f897c1d55e6a5afd5cd', NULL),
(20, 'Taco', 'Hemingway', 'lol@gmail.com', 'tahe', 'c380f833034d60bf035a134094eb538d600dc6f9', 'krowa.png'),
(21, 'Kamil', 'Slimak', 'slimak@wp.pl', 'dobryziomek', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '1185280.png'),
(22, 'Ślimak', 'Lubek', 'ktos@gmail.com', 'misio', 'c380f833034d60bf035a134094eb538d600dc6f9', 'w-sowieckiej-rosji-wrozka-zebuszka-nie-czeka-az-ci-zab-wypadnie-babcia-z-siekierą.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wiadomosci`
--

CREATE TABLE `wiadomosci` (
  `idw` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `wiadomosc` text DEFAULT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `wiadomosci`
--

INSERT INTO `wiadomosci` (`idw`, `id`, `wiadomosc`, `data`) VALUES
(2, 19, 'siema', '2023-11-11'),
(5, 19, 'elo', '2023-11-11'),
(6, 19, 'co tam', '2023-11-11'),
(94, 20, 'dobra wiadomość', '2023-11-30'),
(97, 20, 'dobra wiadomość', '2023-11-30'),
(98, 21, 'siema jestem tu nowy', '2023-11-30'),
(99, 21, 'siema jestem tu nowy', '2023-11-30'),
(100, 22, 'kiedy zagracie ze mną w wota?', '2023-11-30');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `wiadomosci`
--
ALTER TABLE `wiadomosci`
  ADD PRIMARY KEY (`idw`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT dla tabeli `wiadomosci`
--
ALTER TABLE `wiadomosci`
  MODIFY `idw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
