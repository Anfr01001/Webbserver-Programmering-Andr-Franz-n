-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 12 feb 2020 kl 10:41
-- Serverversion: 10.4.6-MariaDB
-- PHP-version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `webbshop`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `customers`
--

CREATE TABLE `customers` (
  `kundID` int(10) UNSIGNED NOT NULL,
  `username` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `FirstName` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `LastName` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `Postnummer` int(10) NOT NULL,
  `postadress` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `telefon` varchar(10) COLLATE utf8_swedish_ci NOT NULL,
  `adress` varchar(50) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `customers`
--

INSERT INTO `customers` (`kundID`, `username`, `FirstName`, `LastName`, `Postnummer`, `postadress`, `telefon`, `adress`) VALUES
(16, 'Andre', 'Andre', 'Franzen', 35243, 'SkyttevÃ¤gen', '0768475533', 'skyttevÃ¤gen 12E'),
(18, 'Luddz', 'Ludde', 'Helge', 35249, 'Ã–sterish', '12345678', 'Ã–stervÃ¤gen'),
(19, 'kalle', 'Kalle', 'kallson', 76742, 'kalleankavÃ¤gen', '87654321', 'stan 35');

-- --------------------------------------------------------

--
-- Tabellstruktur `orders`
--

CREATE TABLE `orders` (
  `orderID` int(10) UNSIGNED NOT NULL,
  `produktID` int(10) UNSIGNED NOT NULL,
  `antal` int(5) NOT NULL,
  `kundID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `orders`
--

INSERT INTO `orders` (`orderID`, `produktID`, `antal`, `kundID`) VALUES
(44, 16, 1, 19),
(45, 17, 1, 19),
(46, 18, 1, 19),
(50, 16, 1, 19),
(51, 17, 1, 19),
(52, 18, 1, 19);

-- --------------------------------------------------------

--
-- Tabellstruktur `products`
--

CREATE TABLE `products` (
  `productID` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `price` int(50) NOT NULL,
  `picture` varchar(200) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `products`
--

INSERT INTO `products` (`productID`, `name`, `description`, `price`, `picture`) VALUES
(16, 'BMW M2', 'FrÃ¤sig bil', 500000, 'bilder/bmwm2.png'),
(17, 'Turbo', 'Super mega trim bilen gÃ¥r snabbt', 500, 'bilder/fetingturbo.png'),
(18, 'HjÃ¤lm (begangnad)', 'Skyddar kranium', 10, 'bilder/hjÃ¤lm.png'),
(19, 'DÃ¤ck', 'Passar majoriteten av fÃ¤lgar', 2300, 'bilder/dÃ¤ck.png'),
(20, 'Gris', 'En gris', 62, 'bilder/pig-2889661_960_720.png'),
(23, 'Trash bil', 'En dÃ¥lig bil', 999, 'bilder/trashcar.png');

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `username` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_swedish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `status` tinyint(2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`username`, `email`, `password`, `status`) VALUES
('Andre', 'andre@andre.se', '$2y$10$Nx7BjJdGmfbRqm9sst/uZ.7sCAEodjk84TfEaAcliEHXwc4fqHpMu', 1),
('kalle', 'kalle@kalle.se', '$2y$10$4FwH/eqGJgj/s9tqF7f8A.TQCTAMVwQSfJJJfoUi34dRh5E9NzQcO', 2),
('Luddz', 'ludd.ludd@ludd.se', '$2y$10$VqNpiXJqxK3VOkXCJ56/duf.fAG75yZPYN5ldKaH96l///GQVKsrC', 1);

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`kundID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `kundID` (`kundID`);

--
-- Index för tabell `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `kundID` (`kundID`) USING BTREE,
  ADD KEY `produktID` (`produktID`) USING BTREE;

--
-- Index för tabell `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `password` (`password`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `customers`
--
ALTER TABLE `customers`
  MODIFY `kundID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT för tabell `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT för tabell `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Restriktioner för tabell `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`produktID`) REFERENCES `products` (`productID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`kundID`) REFERENCES `customers` (`kundID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
