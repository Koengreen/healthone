-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 23 jan 2022 om 20:59
-- Serverversie: 10.4.21-MariaDB
-- PHP-versie: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthone`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `picture`) VALUES
(1, 'Freeweights', 'categories/freeweights.jpg'),
(2, 'Machines', 'categories/machines.jpg'),
(3, 'Mobiliteit', 'categories/mobility.jpg'),
(4, 'Cardio', 'categories/cardio.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE `product` (
  `id` int(200) NOT NULL,
  `category_id` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `picture` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `description`, `picture`) VALUES
(1, 1, 'hammerstrength dumbbells 22 kilo', '', 'categories/fw/fw1.png'),
(2, 1, 'hammerstrength bench press', '', 'categories/fw/fw2.png'),
(3, 1, 'olympische halter tunturi', '', 'categories/fw/fw3.jpg'),
(4, 1, 'ez bar lifemaxx', '', 'categories/fw/fw4.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reviews`
--

CREATE TABLE `reviews` (
  `id` int(9) NOT NULL,
  `review` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `product_id` int(9) NOT NULL,
  `sterren` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `reviews`
--

INSERT INTO `reviews` (`id`, `review`, `date`, `product_id`, `sterren`) VALUES
(1, 'heel mooi ding\r\n', '2022-01-20', 1, 4),
(2, 'hallo', '2022-01-20', 0, 1),
(3, 'hallo', '2022-01-20', 1, 1),
(4, 'hallo', '2022-01-20', 1, 5),
(5, '', '2022-01-20', 1, 1),
(6, 'sdsd', '2022-01-20', 0, 1),
(7, 'sdsd', '2022-01-20', 1, 1),
(8, 'sdsdsd', '2022-01-20', 1, 1),
(9, 'heel mooi ding', '2022-01-21', 1, 2),
(10, '2 sterren', '2022-01-21', 1, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `times`
--

CREATE TABLE `times` (
  `id` int(200) NOT NULL,
  `dag` varchar(200) NOT NULL,
  `tijd` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `times`
--

INSERT INTO `times` (`id`, `dag`, `tijd`) VALUES
(1, 'Maandag', '7:00 tot 20:00\r\n'),
(2, 'Dinsdag', '8:00 tot 20:00'),
(3, 'Woensdag', '7:00 tot 20:00'),
(4, 'Donderdag', '8:00 tot 20:00'),
(5, 'vrijdag', '7:00 tot 22:00'),
(6, 'zaterdag', '7:00 tot 20:30'),
(7, 'Zondag', '13:00 tot 20:30');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `role` enum('member','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `first_name`, `last_name`, `role`) VALUES
(1, 'koen.green1@gmail.com', 'Poenka2002', 'Koen', 'Green', ''),
(3, 'koengreen2002@gmail.com', 'Poenka2002', 'Koen', 'Green', ''),
(5, '', '', '', '', 'member'),
(6, '', '', '', '', 'member');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_product` (`category_id`);

--
-- Indexen voor tabel `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `times`
--
ALTER TABLE `times`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT voor een tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `times`
--
ALTER TABLE `times`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `category_product` FOREIGN KEY (`category_id`) REFERENCES `categories` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
