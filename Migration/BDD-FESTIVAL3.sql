-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 04 avr. 2024 à 14:06
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `festival`
--

-- --------------------------------------------------------

--
-- Structure de la table `festival_event`
--

DROP TABLE IF EXISTS `festival_event`;
CREATE TABLE IF NOT EXISTS `festival_event` (
  `Id_Date` int NOT NULL AUTO_INCREMENT,
  `Date_Start` date NOT NULL,
  `Date_End` date NOT NULL,
  `Price` decimal(50,0) NOT NULL,
  `Reduced_Price` int NOT NULL,
  `Name` varchar(255) NOT NULL,
  PRIMARY KEY (`Id_Date`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `festival_event`
--

INSERT INTO `festival_event` (`Id_Date`, `Date_Start`, `Date_End`, `Price`, `Reduced_Price`, `Name`) VALUES
(1, '2024-07-01', '2024-07-01', 40, 25, 'Pass 1 jour'),
(2, '2024-07-02', '2024-07-02', 40, 25, 'Pass 1 jour'),
(3, '2024-07-03', '2024-07-03', 40, 25, 'Pass 1 jour'),
(4, '2024-07-01', '2024-07-02', 70, 50, 'Pass 2 jour'),
(5, '2024-07-02', '2024-07-03', 70, 50, 'Pass 2 jour'),
(6, '2024-07-01', '2024-07-03', 100, 65, 'Pass 3 jour');

-- --------------------------------------------------------

--
-- Structure de la table `festival_night`
--

DROP TABLE IF EXISTS `festival_night`;
CREATE TABLE IF NOT EXISTS `festival_night` (
  `Id_Date` int NOT NULL,
  `Price` decimal(10,0) NOT NULL,
  `Name` varchar(250) NOT NULL,
  PRIMARY KEY (`Id_Date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `festival_night`
--

INSERT INTO `festival_night` (`Id_Date`, `Price`, `Name`) VALUES
(1, 5, 'Van jour 1'),
(2, 5, 'Van jour 2'),
(3, 5, 'Van jour 3'),
(4, 12, 'Van 3 jours'),
(5, 5, 'Tente jour 1'),
(6, 5, 'Tente jour 2'),
(7, 5, 'Tente jour 3'),
(8, 12, 'Tente 3 jours');

-- --------------------------------------------------------

--
-- Structure de la table `festival_reservation`
--

DROP TABLE IF EXISTS `festival_reservation`;
CREATE TABLE IF NOT EXISTS `festival_reservation` (
  `ID_RESERVATION` int NOT NULL AUTO_INCREMENT,
  `Number_Reservation` int NOT NULL,
  `Quantity_Sledge` int NOT NULL,
  `Quantity_Headphone` int NOT NULL,
  `Children` tinyint(1) NOT NULL,
  `Id_User` int NOT NULL,
  `Price_Reduced` tinyint NOT NULL,
  PRIMARY KEY (`ID_RESERVATION`),
  KEY `Reservation_USER_FK` (`Id_User`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `festival_reservation`
--

INSERT INTO `festival_reservation` (`ID_RESERVATION`, `Number_Reservation`, `Quantity_Sledge`, `Quantity_Headphone`, `Children`, `Id_User`, `Price_Reduced`) VALUES
(30, 1, 0, 0, 1, 1, 0),
(31, 1, 0, 0, 1, 1, 0),
(32, 1, 0, 0, 1, 1, 0),
(33, 1, 0, 0, 1, 1, 0),
(34, 1, 0, 0, 1, 1, 0),
(35, 1, 0, 0, 1, 1, 0),
(36, 1, 2, 2, 1, 1, 0),
(37, 1, 0, 0, 1, 1, 0),
(38, 1, 0, 0, 1, 1, 0),
(39, 1, 0, 0, 1, 1, 0),
(40, 1, 0, 0, 1, 1, 0),
(41, 1, 0, 0, 1, 1, 0),
(42, 1, 0, 0, 1, 1, 0),
(43, 1, 0, 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `festival_reservationhasevent`
--

DROP TABLE IF EXISTS `festival_reservationhasevent`;
CREATE TABLE IF NOT EXISTS `festival_reservationhasevent` (
  `Id_Date` int NOT NULL,
  `ID_RESERVATION` int NOT NULL,
  PRIMARY KEY (`Id_Date`,`ID_RESERVATION`),
  KEY `ReservationHasEvent_Reservation0_FK` (`ID_RESERVATION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `festival_reservationhasevent`
--

INSERT INTO `festival_reservationhasevent` (`Id_Date`, `ID_RESERVATION`) VALUES
(6, 30),
(6, 31),
(6, 32),
(6, 33),
(6, 34),
(6, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43);

-- --------------------------------------------------------

--
-- Structure de la table `festival_reservationhasnight`
--

DROP TABLE IF EXISTS `festival_reservationhasnight`;
CREATE TABLE IF NOT EXISTS `festival_reservationhasnight` (
  `Id_Date` int NOT NULL,
  `ID_RESERVATION` int NOT NULL,
  PRIMARY KEY (`Id_Date`,`ID_RESERVATION`),
  KEY `ReservationHasNight_Reservation0_FK` (`ID_RESERVATION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `festival_user`
--

DROP TABLE IF EXISTS `festival_user`;
CREATE TABLE IF NOT EXISTS `festival_user` (
  `Id_User` int NOT NULL AUTO_INCREMENT,
  `lastName` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `telephone` int NOT NULL,
  `User_Role` tinyint(1) NOT NULL,
  `mail` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_User`),
  UNIQUE KEY `USER_AK` (`mail`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `festival_user`
--

INSERT INTO `festival_user` (`Id_User`, `lastName`, `firstName`, `password`, `address`, `telephone`, `User_Role`, `mail`) VALUES
(1, 'Dupont', 'Pierre', 'azdazdazd', '4 rue Victor Hugo 38000 Grenoble', 612345678, 0, 'email@gmail.com');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `festival_reservation`
--
ALTER TABLE `festival_reservation`
  ADD CONSTRAINT `Reservation_USER_FK` FOREIGN KEY (`Id_User`) REFERENCES `festival_user` (`Id_User`);

--
-- Contraintes pour la table `festival_reservationhasevent`
--
ALTER TABLE `festival_reservationhasevent`
  ADD CONSTRAINT `ReservationHasEvent_Event_FK` FOREIGN KEY (`Id_Date`) REFERENCES `festival_event` (`Id_Date`),
  ADD CONSTRAINT `ReservationHasEvent_Reservation0_FK` FOREIGN KEY (`ID_RESERVATION`) REFERENCES `festival_reservation` (`ID_RESERVATION`);

--
-- Contraintes pour la table `festival_reservationhasnight`
--
ALTER TABLE `festival_reservationhasnight`
  ADD CONSTRAINT `ReservationHasNight_Night_FK` FOREIGN KEY (`Id_Date`) REFERENCES `festival_night` (`Id_Date`),
  ADD CONSTRAINT `ReservationHasNight_Reservation0_FK` FOREIGN KEY (`ID_RESERVATION`) REFERENCES `festival_reservation` (`ID_RESERVATION`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
