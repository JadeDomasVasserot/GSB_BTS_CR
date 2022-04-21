-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 21 avr. 2022 à 22:33
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `compterendu`
--

-- --------------------------------------------------------

--
-- Structure de la table `rapportmedicament`
--

DROP TABLE IF EXISTS `rapportmedicament`;
CREATE TABLE IF NOT EXISTS `rapportmedicament` (
  `idRapportMedi` int(11) NOT NULL AUTO_INCREMENT,
  `quantite` int(11) NOT NULL,
  `estEchantillon` tinyint(1) NOT NULL,
  `estDocumente` tinyint(1) NOT NULL,
  `idMedicament` int(11) DEFAULT NULL,
  `idRapport` int(11) DEFAULT NULL,
  PRIMARY KEY (`idRapportMedi`),
  KEY `IDX_D462F1CB18686CD0` (`idMedicament`),
  KEY `IDX_D462F1CBAE8DCB6E` (`idRapport`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `rapportmedicament`
--

INSERT INTO `rapportmedicament` (`idRapportMedi`, `quantite`, `estEchantillon`, `estDocumente`, `idMedicament`, `idRapport`) VALUES
(1, 1, 0, 0, 2, 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `rapportmedicament`
--
ALTER TABLE `rapportmedicament`
  ADD CONSTRAINT `FK_D462F1CB18686CD0` FOREIGN KEY (`idMedicament`) REFERENCES `medicament` (`idMedicament`),
  ADD CONSTRAINT `FK_D462F1CBAE8DCB6E` FOREIGN KEY (`idRapport`) REFERENCES `rapportvisite` (`idRapportVisite`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
