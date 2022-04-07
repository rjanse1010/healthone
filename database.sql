-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 07 apr 2022 om 14:23
-- Serverversie: 10.4.21-MariaDB
-- PHP-versie: 8.0.11

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
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `picture`) VALUES
(1, 'Roeitrainer', 'roeitrainer.jpg'),
(2, 'Crosstrainer', 'crosstrainer.jpg'),
(3, 'Hometrainer', 'hometrainer.jpg'),
(4, 'Loopband', 'loopband.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `openingtimes`
--

CREATE TABLE `openingtimes` (
  `id` int(1) NOT NULL,
  `name` varchar(15) NOT NULL,
  `time_open` time NOT NULL,
  `time_close` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `openingtimes`
--

INSERT INTO `openingtimes` (`id`, `name`, `time_open`, `time_close`) VALUES
(0, 'Maandag', '07:00:00', '20:00:00'),
(1, 'Dinsdag', '08:00:00', '20:00:00'),
(2, 'Woensdag', '07:00:00', '20:00:00'),
(3, 'Donderdag', '08:00:00', '20:00:00'),
(4, 'Vrijdag', '07:00:00', '20:30:00'),
(5, 'Zaterdag', '08:00:00', '13:00:00'),
(6, 'Zondag', '08:00:00', '13:00:00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(35) NOT NULL,
  `category_id` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `picture`, `description`) VALUES
(1, 'VirtuFit Row 450', 1, 'roeitrainer/ro1.jpg', 'De VirtuFit Row 450 Roeitrainer is de ideale roeitrainer om thuis mee te sporten zonder dat de rest van het gezin of de onderburen er iets van hoort. Dit komt doordat de roeitrainer beschikt over een “silent magnetic” weerstandssysteem waarbij het ook nog eens eenvoudig is om te schakelen tussen de 10 verschillende weerstanden. En niet alleen de overgang tussen de weerstanden is stil, ook de beweging over de extra brede rails is geluidloos. Dit komt doordat de zitting van PU wielen is voorzien. Deze wielen zorgen er ook voor dat het apparaat steviger en soepeler is dan vergelijkbare roeiapparaten.'),
(2, 'VirtuFit Row 900', 1, 'roeitrainer/ro2.jpg', 'Met de VirtuFit Foldable Water Resistance Row 900 Roeitrainer kun je binnen dezelfde roeiervaring krijgen als buiten op het water. De Row 900 reageert op je roeislagen alsof je buiten in een roeiboot over het water vaart. Dit komt door de waterweerstand. Het rad dat door de watertank draait geeft je dezelfde tegenkracht als een roeispaan die door het water beweegt. Water werkt namelijk progressief; hoe sneller je gaat hoe meer weerstand het oplevert. Dit is heel anders dan bij een roeitrainer met een magnetische weerstand of lucht weerstand. Water weerstand geeft je veel controle over de intensiteit van je oefening. Je moet sneller roeien als je een hogere intensiteit wilt ervaren. Roeien op hoge intensiteit is een oefening waarbij je veel kracht gebruikt en spieren in je hele lichaam traint.'),
(5, 'Crossdinges', 2, 'crosstrainer/cr1.jpg', 'Mooie crosstrainert'),
(6, 'Crosstrainer 2', 2, 'crosstrainer/cr2.jpg', 'Deze is niet zo fraai, maar wel sterk.'),
(7, 'Crosstrainer 3', 2, 'crosstrainer/cr3.jpg', 'Een erg mooie crosstrainer die sinds dit jaar prima zijn werk doet. Je kunt hier lekker mee doorgaan.'),
(8, 'Crosstrainer 4', 2, 'crosstrainer/cr4.jpg', 'Deze is niet zo fraai, maar wel sterk.'),
(9, 'Crosstrainer 5', 2, 'crosstrainer/cr5.jpg', 'Een van onze mooie crosstrainers.'),
(10, 'Zeer legitieme crosstrainer™', 2, 'crosstrainer/cr6.jpg', 'Deze is niet zo fraai, maar wel sterk. Zeer legitiem model, van het welbekende merk.'),
(11, 'Tunturi FitCycle 30', 3, 'hometrainer/ho1.jpg', 'Dit toestel beschikt over een knop onder het stuur, waarmee je eenvoudig de weerstand aanpast terwijl je fietst. Het scherm toont onder andere je afgelegde afstand, snelheid en calorieverbruik. Hierdoor monitor je eenvoudig het verloop van je training. Met de hartslagsensoren op het stuur is het bovendien mogelijk om te trainen in een specifieke hartslagzone. Wanneer je liever ontspannen fietst, gebruik je de tablethouder om een film of serie op je tablet te bekijken. Het zadel van de FitCycle 30 is verstelbaar voor een comfortable fietshouding.'),
(12, 'Focus Fitness Jet 5', 4, 'loopband/lo1.jpg', 'Deze loopband biedt de ruime keuze uit 36 verschillende trainingsprogramma’s. Deze programma’s bestaan uit een manueel programma, user programma en handige voorgeprogrammeerde trainingsprogramma’s. De trainingsprogramma’s bestaan uit hellingtrainingen, intervaltrainingen en combinatieprogramma\'s.');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(25) NOT NULL,
  `title` varchar(50) NOT NULL,
  `text` varchar(250) NOT NULL,
  `rating` int(1) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Is de gebruiker administrator',
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `openingtimes`
--
ALTER TABLE `openingtimes`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test` (`category_id`);

--
-- Indexen voor tabel `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviewproductkoppeling` (`product_id`),
  ADD KEY `reviewuserkoppeling` (`user_id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT voor een tabel `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `test` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Beperkingen voor tabel `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviewproductkoppeling` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `reviewuserkoppeling` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
