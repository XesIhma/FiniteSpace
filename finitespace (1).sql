-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 10 Lis 2022, 13:47
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
-- Struktura tabeli dla tabeli `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `clan_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `application` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `applications`
--

INSERT INTO `applications` (`id`, `clan_id`, `user_id`, `application`, `status`, `created_at`, `updated_at`) VALUES
(7, 3, 18, 'Benc', 0, '2022-11-09 23:47:29', '2022-11-09 23:47:29'),
(8, 3, 18, 'Benc', 0, '2022-11-09 23:47:33', '2022-11-09 23:47:33'),
(9, 3, 18, 'Benc', 0, '2022-11-09 23:47:35', '2022-11-09 23:47:35');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `armors`
--

CREATE TABLE `armors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `hp` int(11) NOT NULL,
  `hp_max` int(11) NOT NULL,
  `resistance` int(11) NOT NULL,
  `mass` int(11) NOT NULL,
  `slot` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'armor',
  `price` int(11) NOT NULL DEFAULT 0,
  `last_price` int(11) DEFAULT NULL,
  `bought_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile_id` bigint(20) UNSIGNED NOT NULL,
  `ship_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `armors`
--

INSERT INTO `armors` (`id`, `model`, `class`, `description`, `size`, `image`, `status`, `hp`, `hp_max`, `resistance`, `mass`, `slot`, `price`, `last_price`, `bought_at`, `created_at`, `updated_at`, `profile_id`, `ship_id`) VALUES
(1, 'Pancerz żelazny', 'jednorodny pancerz', 'najbardziej podstawowe opancerzenie, chroniące głównie przed małymi asteroidami', '2m x 2m', 'armors/iron.jpg', 1, 50, 50, 10, 50, 'armor', 0, NULL, NULL, NULL, NULL, 1, NULL),
(2, 'Pancerz stalowy', 'jednorodny pancerz', 'pancerz trochę mocniejszy niż żelazny', '2m x 2m', 'armors/steel.jpg', 1, 70, 70, 20, 45, 'armor', 100, NULL, NULL, NULL, NULL, 2, NULL),
(3, 'ERA v4', 'pancerz reaktywny', 'pancerz wyposażony w wybuchowe płyty', '2m x 2m', 'armors/reactive.jpg', 1, 120, 120, 60, 70, 'armor', 120, NULL, NULL, NULL, NULL, 2, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `clans`
--

CREATE TABLE `clans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inner_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `outer_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `members_limit` int(11) NOT NULL DEFAULT 6,
  `money` int(11) NOT NULL DEFAULT 0,
  `apply` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `clans`
--

INSERT INTO `clans` (`id`, `name`, `tag`, `inner_text`, `outer_text`, `members_limit`, `money`, `apply`, `created_at`, `updated_at`, `user_id`) VALUES
(11, 'The Incredible', 'STRONG', NULL, NULL, 6, 0, 0, '2022-11-10 11:18:23', '2022-11-10 11:18:23', 13);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `engines`
--

CREATE TABLE `engines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `hp` int(11) NOT NULL,
  `hp_max` int(11) NOT NULL,
  `deuter_usage` double(10,3) NOT NULL DEFAULT 0.000,
  `deuter_usage_max` double(10,3) NOT NULL,
  `oxygen_usage` double(10,3) NOT NULL DEFAULT 0.000,
  `oxygen_usage_max` double(10,3) NOT NULL,
  `power` int(11) NOT NULL DEFAULT 0,
  `power_max` int(11) NOT NULL,
  `mass` int(11) NOT NULL,
  `thrust` int(11) NOT NULL DEFAULT 0,
  `thrust_max` int(11) NOT NULL,
  `slot` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'engine',
  `price` int(11) NOT NULL DEFAULT 0,
  `last_price` int(11) DEFAULT NULL,
  `bought_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile_id` bigint(20) UNSIGNED NOT NULL,
  `ship_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `engines`
--

INSERT INTO `engines` (`id`, `model`, `class`, `description`, `size`, `image`, `status`, `hp`, `hp_max`, `deuter_usage`, `deuter_usage_max`, `oxygen_usage`, `oxygen_usage_max`, `power`, `power_max`, `mass`, `thrust`, `thrust_max`, `slot`, `price`, `last_price`, `bought_at`, `created_at`, `updated_at`, `profile_id`, `ship_id`) VALUES
(1, 'Rocket engine', 'SIlnik rakietowy', 'Podstawowy silnik o napędzie chemicznym. Wytwarza ciąg spalając deuter w tlenie.', '2m x 2m x 2.5m', 'engines/engine1.jpg', 0, 200, 200, 0.000, 250.000, 0.000, 1000.000, 0, 10000, 1200, 0, 50000, 'engine', 2000, NULL, NULL, NULL, NULL, 2, NULL),
(2, 'Rocket v2', 'silnik rakietowy', 'Ulepszony silnik rakietowy, wyposażony w sprężarkę', '2m x 2m x 3m ', 'engines/engice_concept1.jpg', 0, 250, 300, 0.000, 300.000, 0.000, 1200.000, 0, 12000, 1300, 0, 70000, 'engine', 4000, NULL, NULL, NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_10_29_141252_create_ships_table', 1),
(6, '2022_10_29_164600_create_profiles_table', 1),
(7, '2022_10_29_212050_create_weapons_table', 1),
(8, '2022_10_29_215149_create_clans_table', 1),
(9, '2022_10_29_220818_create_engines_table', 1),
(10, '2022_10_30_091009_create_armors_table', 1),
(11, '2022_10_30_094230_add_clan_id_to_users', 2),
(12, '2022_10_30_094615_add_profile_id_to_ships', 2),
(13, '2022_10_30_094749_add_user_id_to_profiles', 2),
(14, '2022_10_30_094924_add_profile_id_and_ship_id_to_weapons', 3),
(15, '2022_10_30_095153_add_profile_id_and_ship_id_to_engines', 3),
(16, '2022_10_30_095216_add_profile_id_and_ship_id_to_armors', 3),
(17, '2022_11_09_100448_create_applications_table', 4),
(18, '2022_11_03_094814_add_apply_to_clans', 5),
(19, '2022_11_09_130500_add_owner_clan_to_ships', 6),
(20, '2022_11_10_110248_add_founder_to_clans', 7);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lvl` int(11) NOT NULL DEFAULT 1,
  `exp` int(11) NOT NULL DEFAULT 0,
  `money` int(11) NOT NULL DEFAULT 100,
  `strength` int(11) NOT NULL DEFAULT 10,
  `agility` int(11) NOT NULL DEFAULT 10,
  `speed` int(11) NOT NULL DEFAULT 10,
  `endurance` int(11) NOT NULL DEFAULT 10,
  `mechanics` int(11) NOT NULL DEFAULT 10,
  `building` int(11) NOT NULL DEFAULT 10,
  `informatics` int(11) NOT NULL DEFAULT 10,
  `navigation` int(11) NOT NULL DEFAULT 10,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `profiles`
--

INSERT INTO `profiles` (`id`, `name`, `image`, `lvl`, `exp`, `money`, `strength`, `agility`, `speed`, `endurance`, `mechanics`, `building`, `informatics`, `navigation`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Rudolf', '/avatars/mechanic.jpg', 1, 1, 100, 10, 10, 10, 10, 10, 10, 10, 10, '2022-10-30 09:13:01', '2022-10-30 09:13:01', 13),
(2, 'Alfred', '/avatars/pilot.jpg', 1, 0, 100, 10, 10, 10, 10, 10, 10, 10, 10, '2022-10-30 11:30:54', '2022-10-30 11:30:54', 14),
(3, 'Alice', '/avatars/girl.jpg', 1, 60, 100, 10, 10, 10, 10, 10, 10, 10, 10, '2022-10-30 11:36:22', '2022-10-30 11:36:22', 15),
(4, 'Alice', '/avatars/girl.jpg', 1, 0, 100, 10, 10, 10, 10, 10, 10, 10, 10, '2022-11-08 09:57:50', '2022-11-08 09:57:50', 16),
(5, 'Alice', '/avatars/girl.jpg', 1, 0, 100, 10, 10, 10, 10, 10, 10, 10, 10, '2022-11-08 12:15:45', '2022-11-08 12:15:45', 17),
(6, 'Alice', '/avatars/girl.jpg', 1, 0, 100, 10, 10, 10, 10, 10, 10, 10, 10, '2022-11-09 06:31:19', '2022-11-09 06:31:19', 18),
(7, 'Alice', '/avatars/girl.jpg', 1, 0, 100, 10, 10, 10, 10, 10, 10, 10, 10, '2022-11-09 09:33:37', '2022-11-09 09:33:37', 19);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ships`
--

CREATE TABLE `ships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `hp` int(11) NOT NULL,
  `hp_max` int(11) NOT NULL,
  `deuter` double(10,3) NOT NULL DEFAULT 0.000,
  `deuter_max` double(10,3) NOT NULL,
  `power` int(11) NOT NULL DEFAULT 0,
  `power_max` int(11) NOT NULL,
  `mass` int(11) NOT NULL,
  `weapon_slots` int(11) NOT NULL,
  `engine_slots` int(11) NOT NULL,
  `armor_slots` int(11) NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `last_price` int(11) DEFAULT NULL,
  `bought_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile_id` bigint(20) UNSIGNED DEFAULT NULL,
  `clan_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `ships`
--

INSERT INTO `ships` (`id`, `model`, `class`, `description`, `size`, `image`, `status`, `hp`, `hp_max`, `deuter`, `deuter_max`, `power`, `power_max`, `mass`, `weapon_slots`, `engine_slots`, `armor_slots`, `price`, `last_price`, `bought_at`, `created_at`, `updated_at`, `profile_id`, `clan_id`) VALUES
(1, 'Rouge', 'Lekki myśliwiec', 'Mały, jednoosobowy statek bojowy o ograniczonych możliwościach. ', '\'4m x 3m x 2m\'', 'ships/fighter1.jpg', 0, 1000, 1000, 0.000, 600.000, 0, 800, 3000, 2, 2, 10, 0, NULL, NULL, NULL, NULL, 1, NULL),
(2, 'Nautilus', 'Krążownik', 'Średniej wielkości okręt. Ma sporą siłę ognia i solidne opancerzenie.', '30m x 8m x 6m', 'ships/cruiser.jpg', 0, 10950, 11000, 1500.000, 2500.000, 0, 2000, 33000, 6, 3, 30, 25000, NULL, NULL, NULL, NULL, 2, NULL),
(3, 'Viper', 'Ścigacz', 'Jeden z najszybszych statków w układzie, za to posiada niewielkie opancerzenie i tylko jedno działo.', '4m x 4m x 2m', 'ships/razorback.jpg', 0, 1500, 2000, 300.000, 300.000, 0, 400, 2000, 1, 1, 8, 0, NULL, NULL, NULL, NULL, 3, NULL),
(4, 'Torus', 'stacja klanowa', 'Potężna modułowa konstrukcja', '13000000', 'ships/torus_station.jpg', 1, 11000, 25000, 0.000, 20000.000, 10000, 20000, 3000000, 20, 4, 200, 0, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `premium` int(11) NOT NULL DEFAULT 20,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `clan_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `personal_text`, `premium`, `remember_token`, `created_at`, `updated_at`, `clan_id`) VALUES
(13, 'XesIhma', 'xesihma@o2.pl', NULL, '$2y$10$TysybXTbiZbStOzQ0dUUuOf8u90Y4IpLuJRCk0Xq6AACpZnYQXipm', '', 1050, NULL, '2022-10-30 09:13:01', '2022-11-10 11:18:23', NULL),
(14, 'kasgt500', 'qwer@aa.pp', NULL, '$2y$10$dLS7JAcZR6PL4PY.s89ikeioxj1LPD8sCjgXBIAKshQRlHrQVE9kO', '', 70, NULL, '2022-10-30 11:30:54', '2022-11-08 12:09:39', NULL),
(15, 'Alicja', 'aaa@aaa.aa', NULL, '$2y$10$LXNWcgWJp8UVRZyyZH/fDuDeCRrQ14e3XvE0AnM96sqWzGr2vCxju', '', 327, NULL, '2022-10-30 11:36:22', '2022-11-08 12:16:34', NULL),
(16, 'Uthred', 'synthreda@thred.nr', NULL, '$2y$10$yGktpTu2I0KP1ZJhGe/nGOraoLZpDOm5weYqUO/Aqc/gLGDB5OpCG', '', 118, NULL, '2022-11-08 09:57:50', '2022-11-09 07:42:46', NULL),
(17, 'Ozjasz', 'goldberg@aaa.bb', NULL, '$2y$10$28KkCfhvfV8mZujitZuoNOxsVu52sQhbECnaR4RXxUdd9YDaf1mYK', '', 20, NULL, '2022-11-08 12:15:45', '2022-11-08 12:15:45', NULL),
(18, 'Rojs', 'ro@woo.pl', NULL, '$2y$10$R9DSBTwOkBTwELApufFAKur0KEPk6QULLitld/twsxp4xDBql94dy', '', 5, NULL, '2022-11-09 06:31:19', '2022-11-09 08:21:45', NULL),
(19, 'dyntka', 'd@qasdasd.pl', NULL, '$2y$10$4cT/QgN54DjUym7OSEDgteaPb5dwyu0rbcfgkJdOIM33yOfIF.IOC', '', 20, NULL, '2022-11-09 09:33:37', '2022-11-09 09:33:37', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `weapons`
--

CREATE TABLE `weapons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `hp` int(11) NOT NULL,
  `hp_max` int(11) NOT NULL,
  `deuter_usage` double(10,3) NOT NULL DEFAULT 0.000,
  `deuter_usage_max` double(10,3) NOT NULL,
  `power` int(11) NOT NULL DEFAULT 0,
  `power_max` int(11) NOT NULL,
  `mass` int(11) NOT NULL,
  `damage` int(11) NOT NULL,
  `ammo_type` int(11) DEFAULT NULL,
  `ammo` int(11) DEFAULT NULL,
  `ammo_max` int(11) DEFAULT NULL,
  `slot` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'weapon',
  `price` int(11) NOT NULL DEFAULT 0,
  `last_price` int(11) DEFAULT NULL,
  `bought_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile_id` bigint(20) UNSIGNED NOT NULL,
  `ship_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `weapons`
--

INSERT INTO `weapons` (`id`, `model`, `class`, `description`, `size`, `image`, `status`, `hp`, `hp_max`, `deuter_usage`, `deuter_usage_max`, `power`, `power_max`, `mass`, `damage`, `ammo_type`, `ammo`, `ammo_max`, `slot`, `price`, `last_price`, `bought_at`, `created_at`, `updated_at`, `profile_id`, `ship_id`) VALUES
(1, 'Laser Beam v1', 'broń laserowa', 'Wydajna i prosta broń. Zużywa dużo mocy, ale zadaje odpowiednio duże obrażenia.', '2m', 'weapons/laser_beam.jpg', 0, 50, 50, 0.000, 0.000, 0, 300000, 100, 100, NULL, NULL, NULL, 'weapon', 50, NULL, NULL, NULL, NULL, 1, 1),
(2, 'Minigun 2000', 'gatling', 'Ten mały karabin potrafi narozrabiać, oddajac do 2000 strzałów na minutę.', '2.5m', 'weapons/minigun.png', 0, 150, 150, 0.000, 0.000, 0, 300, 150, 150, 7, 10000, 10000, 'weapon', 5000, NULL, NULL, NULL, NULL, 0, 1),
(3, 'Działko jonowe', 'działo jonowe', 'To działo nadaje cząsteczkom potężną energię, a następnie wystrzeliwuje je w kierunku wrogiego statku.', '1m x 1m x 2m', 'weapons/ion_gun.png', 0, 200, 250, 0.000, 10.000, 0, 50000, 300, 300, NULL, NULL, NULL, 'weapon', 7000, NULL, NULL, NULL, NULL, 3, NULL),
(4, 'Plasma Caster', 'wyrzutnia plazmy', 'Ta potężna broń wytwarza materię podobną jak na słońcu, a następnie niszczy nią wrogie statki.', '4m x 3m x 2m', 'weapons/plasma_caster.png', 0, 800, 800, 0.000, 100.000, 0, 500000, 2000, 800, NULL, NULL, NULL, 'weapon', 11000, NULL, NULL, NULL, NULL, 3, NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `armors`
--
ALTER TABLE `armors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `armors_profile_id_foreign` (`profile_id`),
  ADD KEY `armors_ship_id_foreign` (`ship_id`);

--
-- Indeksy dla tabeli `clans`
--
ALTER TABLE `clans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clans_name_unique` (`name`),
  ADD UNIQUE KEY `clans_tag_unique` (`tag`),
  ADD KEY `clans_user_id_foreign` (`user_id`);

--
-- Indeksy dla tabeli `engines`
--
ALTER TABLE `engines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `engines_profile_id_foreign` (`profile_id`),
  ADD KEY `engines_ship_id_foreign` (`ship_id`);

--
-- Indeksy dla tabeli `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeksy dla tabeli `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeksy dla tabeli `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeksy dla tabeli `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indeksy dla tabeli `ships`
--
ALTER TABLE `ships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ships_profile_id_foreign` (`profile_id`),
  ADD KEY `ships_clan_id_foreign` (`clan_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_clan_id_foreign` (`clan_id`);

--
-- Indeksy dla tabeli `weapons`
--
ALTER TABLE `weapons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `weapons_profile_id_foreign` (`profile_id`),
  ADD KEY `weapons_ship_id_foreign` (`ship_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `armors`
--
ALTER TABLE `armors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `clans`
--
ALTER TABLE `clans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `engines`
--
ALTER TABLE `engines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT dla tabeli `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `ships`
--
ALTER TABLE `ships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT dla tabeli `weapons`
--
ALTER TABLE `weapons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `armors`
--
ALTER TABLE `armors`
  ADD CONSTRAINT `armors_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`),
  ADD CONSTRAINT `armors_ship_id_foreign` FOREIGN KEY (`ship_id`) REFERENCES `ships` (`id`);

--
-- Ograniczenia dla tabeli `clans`
--
ALTER TABLE `clans`
  ADD CONSTRAINT `clans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ograniczenia dla tabeli `engines`
--
ALTER TABLE `engines`
  ADD CONSTRAINT `engines_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`),
  ADD CONSTRAINT `engines_ship_id_foreign` FOREIGN KEY (`ship_id`) REFERENCES `ships` (`id`);

--
-- Ograniczenia dla tabeli `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ograniczenia dla tabeli `ships`
--
ALTER TABLE `ships`
  ADD CONSTRAINT `ships_clan_id_foreign` FOREIGN KEY (`clan_id`) REFERENCES `clans` (`id`),
  ADD CONSTRAINT `ships_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`);

--
-- Ograniczenia dla tabeli `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_clan_id_foreign` FOREIGN KEY (`clan_id`) REFERENCES `clans` (`id`);

--
-- Ograniczenia dla tabeli `weapons`
--
ALTER TABLE `weapons`
  ADD CONSTRAINT `weapons_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`),
  ADD CONSTRAINT `weapons_ship_id_foreign` FOREIGN KEY (`ship_id`) REFERENCES `ships` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
