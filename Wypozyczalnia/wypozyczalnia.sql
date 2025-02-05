-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 23 Maj 2024, 00:06
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
-- Baza danych: `wypozyczalnia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `samochody`
--

CREATE TABLE `samochody` (
  `nr_VIN` varchar(17) NOT NULL,
  `model` varchar(50) DEFAULT NULL,
  `koszt_na_1_dzien` float DEFAULT NULL,
  `liczba_miejsc` int(1) DEFAULT NULL,
  `liczba_bagazy` int(1) DEFAULT NULL,
  `liczba_drzwi` int(1) DEFAULT NULL,
  `klimatyzacja` varchar(3) DEFAULT NULL CHECK (`klimatyzacja` in ('tak','nie')),
  `skrzynia_biegow` varchar(12) DEFAULT NULL CHECK (`skrzynia_biegow` in ('ręczna','automatyczna')),
  `zdjecie` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `samochody`
--

INSERT INTO `samochody` (`nr_VIN`, `model`, `koszt_na_1_dzien`, `liczba_miejsc`, `liczba_bagazy`, `liczba_drzwi`, `klimatyzacja`, `skrzynia_biegow`, `zdjecie`) VALUES
('1FTRX18L71NA17440', 'Volkswagen Touran', 233.84, 7, 1, 4, 'tak', 'ręczna', 'Volkswagen Touran.png'),
('1G11C5SLXFF133766', 'Toyota C-HR', 108.82, 5, 2, 5, 'tak', 'ręczna', 'Toyota C-HR.png'),
('1N4AL2AP5CC235957', 'Toyota Proace', 481.21, 9, 4, 5, 'tak', 'ręczna', 'Toyota Proace.png'),
('2GNALPEK4D1223982', 'Fiat 500', 65.6, 4, 1, 3, 'tak', 'ręczna', 'Fiat_500.png'),
('3FA6P0H76ER125069', 'Volkswagen Golf', 73.44, 5, 2, 5, 'tak', 'ręczna', 'Volkswagen Golf.png'),
('4T1BF3EK4BU652159', 'Kia Ceed STW', 148.9, 5, 2, 5, 'tak', 'ręczna', 'Kia Ceed STW.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `imie` varchar(30) DEFAULT NULL,
  `nazwisko` varchar(30) DEFAULT NULL,
  `data_urodzenia` date DEFAULT NULL,
  `nr_telefonu` int(9) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `haslo` varchar(50) DEFAULT NULL,
  `zdjecie` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `imie`, `nazwisko`, `data_urodzenia`, `nr_telefonu`, `email`, `login`, `haslo`, `zdjecie`) VALUES
(1, 'Adam', 'Dąbrowski', '2007-03-28', 792929950, 'example@mail.com', 'pluciarz', 'c380f833034d60bf035a134094eb538d600dc6f9', 'Pluciarz_przezroczysty.png'),
(4, 'Nataniel', 'Żbikowski', '2008-05-16', 123456789, 'zbikson@email.com', 'zbikson', 'c380f833034d60bf035a134094eb538d600dc6f9', '1200px-Char_T_34_noBG.jpg'),
(5, NULL, NULL, NULL, NULL, NULL, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wypozyczenia`
--

CREATE TABLE `wypozyczenia` (
  `id_wypozyczenia` int(11) NOT NULL,
  `id_uzytkownika` int(11) DEFAULT NULL,
  `nr_VIN_samochodu` varchar(17) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `samochody`
--
ALTER TABLE `samochody`
  ADD PRIMARY KEY (`nr_VIN`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `wypozyczenia`
--
ALTER TABLE `wypozyczenia`
  ADD PRIMARY KEY (`id_wypozyczenia`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`),
  ADD KEY `nr_VIN_samochodu` (`nr_VIN_samochodu`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `wypozyczenia`
--
ALTER TABLE `wypozyczenia`
  MODIFY `id_wypozyczenia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `wypozyczenia`
--
ALTER TABLE `wypozyczenia`
  ADD CONSTRAINT `wypozyczenia_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id`),
  ADD CONSTRAINT `wypozyczenia_ibfk_2` FOREIGN KEY (`nr_VIN_samochodu`) REFERENCES `samochody` (`nr_VIN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
