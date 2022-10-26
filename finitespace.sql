-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 26 Paź 2022, 08:16
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `finitespace`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ships`
--

CREATE TABLE `ships` (
  `id` int(11) NOT NULL,
  `model` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `hp_act` int(11) NOT NULL,
  `hp_max` int(11) NOT NULL,
  `fuel_act` int(11) NOT NULL,
  `fuel_max` int(11) NOT NULL,
  `generator_output` int(11) NOT NULL,
  `generator_max` int(11) NOT NULL,
  `battery_act` int(11) NOT NULL,
  `battery_max` int(11) NOT NULL,
  `class` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `mass` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `thrust` int(11) NOT NULL,
  `v2_max` int(11) NOT NULL,
  `owner` int(11) NOT NULL,
  `last_price` int(11) NOT NULL,
  `when_bought` datetime DEFAULT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `ships`
--

INSERT INTO `ships` (`id`, `model`, `hp_act`, `hp_max`, `fuel_act`, `fuel_max`, `generator_output`, `generator_max`, `battery_act`, `battery_max`, `class`, `mass`, `size`, `thrust`, `v2_max`, `owner`, `last_price`, `when_bought`, `price`, `image`) VALUES
(1, 'Rouge', 1000, 1000, 50, 50, 500, 500, 100, 100, 'Lekki myśliwiec', 3000, '4m x 3m x 2m', 350, 1000, 1, 0, '2022-10-26 07:57:32', 0, 'fighter1.jpg'),
(2, 'Nautilus', 10950, 11000, 900, 1000, 2000, 5000, 1000, 2500, 'Krążownik', 33000, '30m x 8m x 6m', 5000, 500, 1, 0, '2022-10-26 07:57:32', 0, 'cruiser.jpg'),
(3, 'Viper', 1500, 2000, 90, 100, 300, 300, 100, 150, 'Ścigacz', 2000, '4m x 4m x 2m', 1300, 7000, 2, 0, '2022-10-26 07:57:32', 0, 'razorback.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nickname` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `premium_currency` int(11) NOT NULL DEFAULT 0,
  `join_date` date NOT NULL DEFAULT current_timestamp(),
  `last_active` date NOT NULL DEFAULT current_timestamp(),
  `clan_id` int(11) DEFAULT NULL,
  `personal_text` text COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `nickname`, `email`, `password_hash`, `premium_currency`, `join_date`, `last_active`, `clan_id`, `personal_text`) VALUES
(1, 'Adam', 'adam@adam.com', 'asdasda', 0, '2022-10-11', '2022-10-11', NULL, 'życie takie jest'),
(2, 'alfred', 'alfred@aa.bb', 'qwer1234', 200, '2022-10-17', '2022-10-17', 1, 'życie jest inne');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `weapons`
--

CREATE TABLE `weapons` (
  `id` int(11) NOT NULL,
  `model` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `hp_act` int(11) NOT NULL,
  `hp_max` int(11) NOT NULL,
  `mass` int(11) NOT NULL,
  `damage` int(11) NOT NULL,
  `power_cons` int(11) NOT NULL,
  `deuter_cons` int(11) NOT NULL,
  `ammo_type` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `slot` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `owner` int(11) NOT NULL,
  `last_price` int(11) NOT NULL,
  `when_bought` datetime NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `image` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `weapons`
--

INSERT INTO `weapons` (`id`, `model`, `hp_act`, `hp_max`, `mass`, `damage`, `power_cons`, `deuter_cons`, `ammo_type`, `slot`, `owner`, `last_price`, `when_bought`, `price`, `created_at`, `image`) VALUES
(1, 'Laser Beam v1', 50, 50, 100, 100, 300000, 0, '-', 'A', 0, 7000, '2022-10-23 23:59:39', 8000, '2022-10-24 23:59:39', 'laser_beam.jpg'),
(2, 'Minigun 2000', 30, 30, 30, 120, 500, 0, '7.62mm', 'A', 0, 6000, '2022-10-19 22:01:40', 5000, '2022-10-25 00:01:40', 'minigun.png'),
(3, 'Działo jonowe', 150, 150, 300, 150, 100000, 1, '-', 'D', 0, 10500, '2022-10-18 11:50:39', 11000, '2022-10-25 11:50:38', 'ion_gun.png'),
(4, 'Plasma Caster', 250, 250, 1200, 300, 1000000, 100, '-', 'DC', 0, 0, '2022-10-25 14:54:48', 22000, '2022-10-25 14:54:48', 'plasma_caster.png');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `ships`
--
ALTER TABLE `ships`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `weapons`
--
ALTER TABLE `weapons`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `ships`
--
ALTER TABLE `ships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `weapons`
--
ALTER TABLE `weapons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
