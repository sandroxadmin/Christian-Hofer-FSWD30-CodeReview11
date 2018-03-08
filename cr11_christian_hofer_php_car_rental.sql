-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 08. Mrz 2018 um 10:12
-- Server-Version: 10.1.30-MariaDB
-- PHP-Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr11_christian_hofer_php_car_rental`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `car`
--

CREATE TABLE `car` (
  `car_id` int(11) NOT NULL,
  `office_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `car_model_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `car`
--

INSERT INTO `car` (`car_id`, `office_id`, `location_id`, `car_model_id`) VALUES
(0, NULL, NULL, 1),
(1, 1, NULL, 1),
(2, 1, NULL, 2),
(3, 2, NULL, 1),
(4, 2, NULL, 3),
(5, 3, NULL, 4),
(6, 3, NULL, 1),
(7, 4, NULL, 2),
(8, 4, NULL, 3),
(9, NULL, 1, 2),
(10, NULL, 2, 1),
(11, NULL, 3, 4),
(12, 4, NULL, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `car_model`
--

CREATE TABLE `car_model` (
  `car_model_id` int(11) NOT NULL,
  `manufacturer` varchar(255) NOT NULL,
  `model_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `car_model`
--

INSERT INTO `car_model` (`car_model_id`, `manufacturer`, `model_name`) VALUES
(1, 'Tesla', 'Model 3'),
(2, 'Tesla', 'Model Y'),
(3, 'Tesla', 'Model S'),
(4, 'Tesla', 'Model X');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `car_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `customer`
--

INSERT INTO `customer` (`customer_id`, `firstname`, `lastname`, `car_id`) VALUES
(1, 'Max', 'Mustermann', NULL),
(2, 'Hermine', 'Schuster', NULL),
(3, 'Anton', 'Pfeffer', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `atitude` double NOT NULL,
  `longtitute` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `location`
--

INSERT INTO `location` (`location_id`, `atitude`, `longtitute`) VALUES
(1, 48.214474, 16.366528),
(2, 48.262273, 16.337993),
(3, 48.253192, 16.420653);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `office`
--

CREATE TABLE `office` (
  `office_id` int(11) NOT NULL,
  `street_name` varchar(255) NOT NULL,
  `street_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `office`
--

INSERT INTO `office` (`office_id`, `street_name`, `street_number`) VALUES
(1, 'Rotenturmstraße', '4'),
(2, 'Kettenbrückengasse', '1'),
(3, 'Landstraße', '5'),
(4, 'Neubaugasse', '8');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`user_id`, `email`, `password_hash`) VALUES
(1, 'example@example.com', '$2y$10$waX94AUFYW9rlXNgk.w3SOmsgZP5GZt18UTSheVHJs3Iy.VcXilXO');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `fk_car_office_idx` (`office_id`),
  ADD KEY `fk_car_location1_idx` (`location_id`),
  ADD KEY `fk_car_car_model1_idx` (`car_model_id`);

--
-- Indizes für die Tabelle `car_model`
--
ALTER TABLE `car_model`
  ADD PRIMARY KEY (`car_model_id`);

--
-- Indizes für die Tabelle `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `fk_customer_car1_idx` (`car_id`);

--
-- Indizes für die Tabelle `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indizes für die Tabelle `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`office_id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `car_model`
--
ALTER TABLE `car_model`
  MODIFY `car_model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `office`
--
ALTER TABLE `office`
  MODIFY `office_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `fk_car_car_model1` FOREIGN KEY (`car_model_id`) REFERENCES `car_model` (`car_model_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_car_location1` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_car_office` FOREIGN KEY (`office_id`) REFERENCES `office` (`office_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk_customer_car1` FOREIGN KEY (`car_id`) REFERENCES `car` (`car_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
