-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 04 avr. 2024 à 09:15
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `festival_reservation`
--

INSERT INTO `festival_reservation` (`ID_RESERVATION`, `Number_Reservation`, `Quantity_Sledge`, `Quantity_Headphone`, `Children`, `Id_User`, `Price_Reduced`) VALUES
(6, 1, 5, 5, 1, 1, 0),
(7, 1, 1, 1, 1, 1, 0),
(8, 1, 1, 1, 1, 1, 0),
(9, 2, 0, 0, 1, 1, 0),
(10, 1, 0, 0, 1, 1, 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `festival_reservation`
--
ALTER TABLE `festival_reservation`
  ADD CONSTRAINT `Reservation_USER_FK` FOREIGN KEY (`Id_User`) REFERENCES `festival_user` (`Id_User`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
