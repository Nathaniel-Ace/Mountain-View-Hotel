-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 15. Jan 2023 um 19:19
-- Server-Version: 10.4.25-MariaDB
-- PHP-Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `web_hotel_tetcu_panganiban`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `reservierung`
--

CREATE TABLE `reservierung` (
  `RID` int(11) NOT NULL,
  `Ankunft` date NOT NULL,
  `Abreise` date NOT NULL,
  `Frühstück` text NOT NULL,
  `Parkplatz` text NOT NULL,
  `Haustiere` text NOT NULL,
  `UID` int(11) NOT NULL,
  `Username` varchar(256) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `reservierung`
--

INSERT INTO `reservierung` (`RID`, `Ankunft`, `Abreise`, `Frühstück`, `Parkplatz`, `Haustiere`, `UID`, `Username`, `timestamp`) VALUES
(1, '2023-01-16', '2023-01-18', 'mit', 'mit', 'mit', 2, 'ace17', '2023-01-15 18:02:00'),
(2, '2023-01-19', '2023-01-21', 'ohne', 'ohne', 'ohne', 3, 'james', '2023-01-15 18:03:00'),
(3, '2023-01-28', '2023-01-29', 'mit', 'ohne', 'ohne', 8, 'annalyn', '2023-01-15 18:04:00'),
(4, '2023-02-24', '2023-02-28', 'mit', 'mit', 'ohne', 2, 'nathaniel17', '2023-01-15 18:50:00'),
(5, '2023-03-15', '2023-03-18', 'mit', 'ohne', 'mit', 9, 'aliye', '2023-01-15 18:52:00');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `UID` int(11) NOT NULL,
  `Vorname` varchar(256) NOT NULL,
  `Nachname` varchar(256) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `Username` varchar(256) NOT NULL,
  `Passwort` varchar(256) NOT NULL,
  `Rolle` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`UID`, `Vorname`, `Nachname`, `Email`, `Username`, `Passwort`, `Rolle`) VALUES
(1, 'Nathaniel Ace', 'Panganiban', 'nathaniel@gmail.com', 'admin', '$2y$10$rKPrQqKvo2fm7AnkUgKwJ.y6qHrwuutMRe4W8/utKKxOVRJbASWYO', 'Admin'),
(2, 'Ace', 'Panganiban', 'nathaniel@gmail.com', 'nathaniel17', '$2y$10$TQTJsZAblSZ8kCA6AnXbv.HZ2Nmvi234TTpX3p0kmU6CP72vr4a.G', 'Kunde/Kundin'),
(3, 'James', 'Ikan', 'james@ikan.com', 'james', '$2y$10$XFEVmdU1RHXj4kBHbtY6qOlobVrTUZDJhX5/hCkwkbHnmEulWAkWa', 'Kunde/Kundin'),
(4, 'Ace', 'Panganiban', 'ace@pan.com', 'ace175', '$2y$10$fXRHOvCOKQlNjV2WqM9T/.H3yaAzoYjetvW4O1ePtN62on3nnlvMO', 'Kunde/Kundin'),
(5, 'Patricica', 'Tetcu', 'pat@tet.com', 'pat', '$2y$10$AvzordW38rBbiH3uhPEjQ.pA1OtrvI4jZF4Sd.5tZ47kvfhFo/6te', 'Kunde/Kundin'),
(6, 'Asyong', 'Panganiban', 'nathanielace@gmail.com', 'nathaniel', '$2y$10$AImjq/tR5xt4HVaKYN6teeJMpuCILY2UsK.9m69nkcg4ARr99BS8O', 'Kunde/Kundin'),
(7, 'Nathaniel', 'Panganiban', 'nathaniel@gmail.com', 'ace1752003', '$2y$10$ub9ODHg2TcCclmRB/gNV3.UoNwx8dcDqAS5lB/x0EcMF5/SdIqcBu', 'Kunde/Kundin'),
(8, 'Annalyn', 'Panganiban', 'annalyn@yahoo.com', 'annalyn', '$2y$10$aNtbq2cFBVz2UE7FjP1mj.n2c2eOHCz9PE2Y7cXY4lONKpMZM58k6', 'Kunde/Kundin'),
(9, 'Aliye', 'Saka', 'aliye@saka.com', 'aliye', '$2y$10$0XcWmflY0RvtCsNAp4v1F.PrRm9SBlGeXeKqeZzgQ4.F9oEppPpti', 'Kunde/Kundin');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `reservierung`
--
ALTER TABLE `reservierung`
  ADD PRIMARY KEY (`RID`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `reservierung`
--
ALTER TABLE `reservierung`
  MODIFY `RID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
