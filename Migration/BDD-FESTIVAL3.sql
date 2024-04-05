-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 05 avr. 2024 à 11:42
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
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `festival_reservation`
--

INSERT INTO `festival_reservation` (`ID_RESERVATION`, `Number_Reservation`, `Quantity_Sledge`, `Quantity_Headphone`, `Children`, `Id_User`, `Price_Reduced`) VALUES
(102, 3, 3, 2, 1, 1, 0),
(103, 1, 0, 0, 1, 2, 0),
(104, 1, 0, 0, 1, 2, 0),
(105, 1, 0, 0, 1, 2, 0),
(106, 1, 2, 2, 1, 2, 0),
(107, 1, 2, 2, 1, 2, 0),
(108, 1, 0, 0, 1, 2, 0),
(109, 1, 0, 0, 1, 2, 0),
(110, 1, 1, 1, 1, 2, 0),
(111, 1, 0, 0, 1, 2, 0),
(112, 1, 0, 0, 1, 2, 0),
(113, 1, 2, 2, 1, 3, 0);

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
(1, 102),
(1, 103),
(1, 104),
(1, 105),
(1, 106),
(1, 107),
(1, 108),
(1, 109),
(1, 110),
(1, 111),
(1, 112),
(1, 113);

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

--
-- Déchargement des données de la table `festival_reservationhasnight`
--

INSERT INTO `festival_reservationhasnight` (`Id_Date`, `ID_RESERVATION`) VALUES
(1, 102),
(2, 102),
(5, 102),
(7, 102),
(1, 106),
(2, 106),
(5, 106),
(6, 106),
(1, 107),
(2, 107),
(5, 107),
(6, 107),
(1, 110),
(5, 110),
(1, 113),
(5, 113);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `festival_user`
--

INSERT INTO `festival_user` (`Id_User`, `lastName`, `firstName`, `password`, `address`, `telephone`, `User_Role`, `mail`) VALUES
(1, 'Dupont', 'Pierre', 'azdazdazd', '4 rue Victor Hugo 38000 Grenoble', 612345678, 0, 'email@gmail.com'),
(2, 'Vanhove', 'Killian', '$2y$10$7gxIezE835LN5520rHMSROlawN8c4hW4ItAMZAyCyuHBR22JaZ3lS', '22 TER RUE DE LA CHARTREUSE', 777033128, 0, 'killian2908@gmail.com'),
(3, 'kiki', 'kika', '$2y$10$S62snxUbeFGAD/IwLS9u8.uX3xTOZbXKGVpb9L3u/0Dskto5vJp3q', '22 TER RUE DE LA CHARTREUSE', 789456123, 0, 'kiki@gmail.com');

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
