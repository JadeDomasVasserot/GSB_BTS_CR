-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 30 mai 2022 à 10:17
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
-- Structure de la table `famille`
--

DROP TABLE IF EXISTS `famille`;
CREATE TABLE IF NOT EXISTS `famille` (
  `idFamille` int(11) NOT NULL AUTO_INCREMENT,
  `famLib` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idFamille`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `famille`
--

INSERT INTO `famille` (`idFamille`, `famLib`) VALUES
(1, 'Cachet'),
(2, 'Crème'),
(3, 'Gellule');

-- --------------------------------------------------------

--
-- Structure de la table `laboratoire`
--

DROP TABLE IF EXISTS `laboratoire`;
CREATE TABLE IF NOT EXISTS `laboratoire` (
  `idLaboratoire` int(11) NOT NULL AUTO_INCREMENT,
  `laboLib` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idLaboratoire`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `laboratoire`
--

INSERT INTO `laboratoire` (`idLaboratoire`, `laboLib`) VALUES
(1, 'Swiss'),
(2, 'Galaxy'),
(3, 'Spectra');

-- --------------------------------------------------------

--
-- Structure de la table `lieu`
--

DROP TABLE IF EXISTS `lieu`;
CREATE TABLE IF NOT EXISTS `lieu` (
  `idLieu` int(11) NOT NULL AUTO_INCREMENT,
  `lieuexercice` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idLieu`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `lieu`
--

INSERT INTO `lieu` (`idLieu`, `lieuexercice`) VALUES
(1, 'Hopital'),
(2, 'Clinique'),
(3, 'Privé');

-- --------------------------------------------------------

--
-- Structure de la table `medicament`
--

DROP TABLE IF EXISTS `medicament`;
CREATE TABLE IF NOT EXISTS `medicament` (
  `idMedicament` int(11) NOT NULL AUTO_INCREMENT,
  `nomCommercial` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `composition` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `effetsIndesirables` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contreIndications` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prixEchantillon` decimal(10,0) NOT NULL,
  `idFamille` int(11) NOT NULL,
  PRIMARY KEY (`idMedicament`),
  KEY `IDX_9A9C723A34CA99E1` (`idFamille`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `medicament`
--

INSERT INTO `medicament` (`idMedicament`, `nomCommercial`, `composition`, `effetsIndesirables`, `contreIndications`, `prixEchantillon`, `idFamille`) VALUES
(1, 'Doliprane', 'Paracétamole', 'Vertiges', '1x par toutes les 3h', '2', 3),
(2, 'Onctose', 'Crémeux', 'Allergies', 'Pas à mélanger avec d\'autres crèmes', '5', 2);

-- --------------------------------------------------------

--
-- Structure de la table `motif`
--

DROP TABLE IF EXISTS `motif`;
CREATE TABLE IF NOT EXISTS `motif` (
  `idMotif` int(11) NOT NULL AUTO_INCREMENT,
  `motifLib` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idMotif`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `motif`
--

INSERT INTO `motif` (`idMotif`, `motifLib`) VALUES
(1, 'Périodicité'),
(2, 'Actualisation'),
(3, 'Relance'),
(4, 'Sollicitation praticien'),
(5, 'Autre');

-- --------------------------------------------------------

--
-- Structure de la table `praticien`
--

DROP TABLE IF EXISTS `praticien`;
CREATE TABLE IF NOT EXISTS `praticien` (
  `idPraticien` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` int(11) NOT NULL,
  `ville` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateEmbauche` date NOT NULL,
  `coefNotoriete` decimal(10,0) NOT NULL,
  `lieuExercice` int(11) NOT NULL,
  PRIMARY KEY (`idPraticien`),
  KEY `IDX_D9A27D388A27C87` (`lieuExercice`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `praticien`
--

INSERT INTO `praticien` (`idPraticien`, `nom`, `prenom`, `adresse`, `cp`, `ville`, `dateEmbauche`, `coefNotoriete`, `lieuExercice`) VALUES
(6, 'Stephens', 'Jesse', '8976 A Av.', 8766, 'Tabuk', '2021-08-23', '8', 2),
(7, 'Russo', 'Carl', '957 Ornare Street', 13758, 'Oaxaca', '2022-06-29', '9', 1),
(8, 'Palmer', 'Shea', 'Ap #801-7689 A Av.', 35452, 'Belfast', '2021-07-31', '1', 1),
(9, 'Luna', 'Abigail', 'P.O. Box 412, 9816 Nullam St.', 65453, 'Ligney', '2023-04-20', '1', 3),
(10, 'Myers', 'Miranda', 'P.O. Box 479, 6212 In St.', 4640, 'Pangkalpinang', '2023-03-31', '6', 2);

-- --------------------------------------------------------

--
-- Structure de la table `rapportmedicament`
--

DROP TABLE IF EXISTS `rapportmedicament`;
CREATE TABLE IF NOT EXISTS `rapportmedicament` (
  `idRapportMedi` int(11) NOT NULL AUTO_INCREMENT,
  `quantite` int(11) DEFAULT NULL,
  `estEchantillon` tinyint(1) NOT NULL,
  `idMedicament` int(11) NOT NULL,
  `idRapport` int(11) NOT NULL,
  `estPresente` tinyint(1) NOT NULL,
  PRIMARY KEY (`idRapportMedi`),
  KEY `IDX_D462F1CB18686CD0` (`idMedicament`),
  KEY `IDX_D462F1CBAE8DCB6E` (`idRapport`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `rapportmedicament`
--

INSERT INTO `rapportmedicament` (`idRapportMedi`, `quantite`, `estEchantillon`, `idMedicament`, `idRapport`, `estPresente`) VALUES
(1, NULL, 0, 2, 18, 1),
(2, NULL, 0, 1, 18, 1),
(3, 45, 1, 2, 18, 0),
(10, NULL, 0, 2, 21, 1),
(11, NULL, 0, 1, 21, 1),
(12, 5, 1, 2, 21, 0),
(16, NULL, 0, 1, 23, 1),
(17, NULL, 0, 2, 23, 1),
(18, 4, 1, 2, 23, 0),
(19, NULL, 0, 1, 24, 1),
(20, NULL, 0, 2, 24, 1),
(21, 3, 1, 2, 24, 0),
(22, NULL, 0, 1, 25, 1),
(23, NULL, 0, 2, 25, 1),
(24, 5, 1, 2, 25, 0),
(25, NULL, 0, 1, 26, 1),
(26, NULL, 0, 2, 26, 1),
(27, 41, 1, 1, 26, 0),
(28, NULL, 0, 1, 27, 1),
(29, NULL, 0, 2, 27, 1),
(30, 0, 1, 2, 27, 0),
(31, NULL, 0, 2, 28, 1),
(32, NULL, 0, 1, 28, 1),
(33, 1, 1, 2, 28, 0),
(34, NULL, 0, 1, 29, 1),
(35, NULL, 0, 2, 29, 1),
(36, 1, 1, 1, 29, 0);

-- --------------------------------------------------------

--
-- Structure de la table `rapportvisite`
--

DROP TABLE IF EXISTS `rapportvisite`;
CREATE TABLE IF NOT EXISTS `rapportvisite` (
  `idRapportVisite` int(11) NOT NULL AUTO_INCREMENT,
  `dateVisite` date NOT NULL,
  `estRemplacant` tinyint(1) NOT NULL,
  `bilan` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motifText` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idVisiteur` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idMotif` int(11) NOT NULL,
  `idRemplacant` int(11) DEFAULT NULL,
  `idPraticien` int(11) NOT NULL,
  PRIMARY KEY (`idRapportVisite`),
  KEY `IDX_1A9679F9901734A6` (`idMotif`),
  KEY `IDX_1A9679F91D06ADE3` (`idVisiteur`),
  KEY `IDX_1A9679F9354419B9` (`idRemplacant`),
  KEY `IDX_1A9679F9F1700C85` (`idPraticien`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `rapportvisite`
--

INSERT INTO `rapportvisite` (`idRapportVisite`, `dateVisite`, `estRemplacant`, `bilan`, `motifText`, `idVisiteur`, `idMotif`, `idRemplacant`, `idPraticien`) VALUES
(18, '2022-03-30', 1, 'Soliccit', NULL, 'jdv', 2, 7, 8),
(21, '2002-06-10', 1, 'Le praticien remplaçant semble OK', NULL, 'jdv', 5, 10, 7),
(23, '2022-04-20', 1, 'Remplacé par Luna Abigail', NULL, 'jdv', 5, 9, 7),
(24, '2022-04-08', 1, 'Bilan visite remplacée par russo Carl', NULL, 'jdv', 5, 7, 8),
(25, '2022-04-06', 1, 'Visite 06/04/2022', NULL, 'jdv', 2, 10, 9),
(26, '2022-04-12', 0, 'Période', NULL, 'jdv', 1, NULL, 7),
(27, '2022-03-10', 1, 'Relance', NULL, 'jdv', 3, 6, 7),
(28, '2022-04-13', 0, 'OK pour mettre en place un module RGPD', NULL, 'jdv', 5, NULL, 6),
(29, '2022-03-28', 0, 'Actu', NULL, 'jdv', 2, NULL, 10),
(30, '2022-04-21', 1, 'Visite', NULL, 'jdv', 5, 7, 8),
(31, '2022-04-21', 1, 'Visite', NULL, 'jdv', 5, 7, 8);

-- --------------------------------------------------------

--
-- Structure de la table `secteur`
--

DROP TABLE IF EXISTS `secteur`;
CREATE TABLE IF NOT EXISTS `secteur` (
  `idSecteur` int(11) NOT NULL AUTO_INCREMENT,
  `secLib` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idSecteur`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `secteur`
--

INSERT INTO `secteur` (`idSecteur`, `secLib`) VALUES
(1, 'Est'),
(2, 'Ouest'),
(3, 'Nord'),
(4, 'Sud');

-- --------------------------------------------------------

--
-- Structure de la table `visiteur`
--

DROP TABLE IF EXISTS `visiteur`;
CREATE TABLE IF NOT EXISTS `visiteur` (
  `id` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateEmbauche` date NOT NULL,
  `idLaboratoire` int(11) NOT NULL,
  `idSecteur` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4EA587B884F0FCBB` (`idLaboratoire`),
  KEY `IDX_4EA587B890FC4EED` (`idSecteur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `visiteur`
--

INSERT INTO `visiteur` (`id`, `nom`, `prenom`, `login`, `mdp`, `adresse`, `cp`, `ville`, `dateEmbauche`, `idLaboratoire`, `idSecteur`) VALUES
('bfr', 'Freeman', 'Bradley', 'bfreeman', '123', 'P.O. Box 760, 3172 Orci. Rd.', '90668', 'Pioneer', '2021-10-24', 1, 2),
('jdv', 'DOMAS', 'Jade', 'jdomas', '123', 'A30 rue rebatel', '69008', 'Lyon', '2021-07-23', 2, 3),
('ola', 'Lane', 'Owen', 'olane', '123', 'Ap #890-9987 Sit St.', '83803', 'Port Elizabeth', '2022-07-23', 2, 1),
('sri', 'Richard', 'Sopoline', 'srichard', '123', '947-8276 Arcu Avenue', '6758', 'Asan', '2021-05-02', 3, 3),
('tgu', 'Guerra', 'Teegan', 'tguerra', '123', '1864 Tellus. Avenue', '6134', 'Jennersdorf', '2021-06-05', 1, 2),
('tst', 'Strickland', 'Tamekah', 'tstrickland', '123', '6426 Ipsum. Avenue', '81666', 'Muzaffarpur', '2022-11-01', 2, 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `medicament`
--
ALTER TABLE `medicament`
  ADD CONSTRAINT `FK_9A9C723A34CA99E1` FOREIGN KEY (`idFamille`) REFERENCES `famille` (`idFamille`);

--
-- Contraintes pour la table `praticien`
--
ALTER TABLE `praticien`
  ADD CONSTRAINT `FK_D9A27D388A27C87` FOREIGN KEY (`lieuExercice`) REFERENCES `lieu` (`idLieu`);

--
-- Contraintes pour la table `rapportmedicament`
--
ALTER TABLE `rapportmedicament`
  ADD CONSTRAINT `FK_D462F1CB18686CD0` FOREIGN KEY (`idMedicament`) REFERENCES `medicament` (`idMedicament`),
  ADD CONSTRAINT `FK_D462F1CBAE8DCB6E` FOREIGN KEY (`idRapport`) REFERENCES `rapportvisite` (`idRapportVisite`);

--
-- Contraintes pour la table `rapportvisite`
--
ALTER TABLE `rapportvisite`
  ADD CONSTRAINT `FK_1A9679F91D06ADE3` FOREIGN KEY (`idVisiteur`) REFERENCES `visiteur` (`id`),
  ADD CONSTRAINT `FK_1A9679F9354419B9` FOREIGN KEY (`idRemplacant`) REFERENCES `praticien` (`idPraticien`),
  ADD CONSTRAINT `FK_1A9679F9901734A6` FOREIGN KEY (`idMotif`) REFERENCES `motif` (`idMotif`),
  ADD CONSTRAINT `FK_1A9679F9F1700C85` FOREIGN KEY (`idPraticien`) REFERENCES `praticien` (`idPraticien`);

--
-- Contraintes pour la table `visiteur`
--
ALTER TABLE `visiteur`
  ADD CONSTRAINT `FK_4EA587B884F0FCBB` FOREIGN KEY (`idLaboratoire`) REFERENCES `laboratoire` (`idLaboratoire`),
  ADD CONSTRAINT `FK_4EA587B890FC4EED` FOREIGN KEY (`idSecteur`) REFERENCES `secteur` (`idSecteur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
