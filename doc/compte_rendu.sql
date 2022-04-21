-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 20 avr. 2022 à 23:51
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
-- Base de données : `compte_rendu`
--

-- --------------------------------------------------------

--
-- Structure de la table `famille`
--

DROP TABLE IF EXISTS `famille`;
CREATE TABLE IF NOT EXISTS `famille` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `famLib` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `famille`
--

INSERT INTO `famille` (`id`, `famLib`) VALUES
(1, 'Anti douleur');

-- --------------------------------------------------------

--
-- Structure de la table `laboratoire`
--

DROP TABLE IF EXISTS `laboratoire`;
CREATE TABLE IF NOT EXISTS `laboratoire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `laboLib` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `laboratoire`
--

INSERT INTO `laboratoire` (`id`, `laboLib`) VALUES
(1, 'Swiss'),
(2, 'string');

-- --------------------------------------------------------

--
-- Structure de la table `medicament`
--

DROP TABLE IF EXISTS `medicament`;
CREATE TABLE IF NOT EXISTS `medicament` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomCommercial` varchar(50) NOT NULL,
  `idFamille` int(11) NOT NULL,
  `composition` varchar(50) DEFAULT NULL,
  `effetsIndesirables` varchar(100) DEFAULT NULL,
  `contreIndications` varchar(100) DEFAULT NULL,
  `prixEchantillon` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idFamileFK` (`idFamille`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `medicament`
--

INSERT INTO `medicament` (`id`, `nomCommercial`, `idFamille`, `composition`, `effetsIndesirables`, `contreIndications`, `prixEchantillon`) VALUES
(1, 'Diliprane', 1, 'Paracétamode', 'Vertiges', NULL, '2'),
(2, 'Onctose', 1, 'Creme', NULL, NULL, '10');

-- --------------------------------------------------------

--
-- Structure de la table `motif`
--

DROP TABLE IF EXISTS `motif`;
CREATE TABLE IF NOT EXISTS `motif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `motifLib` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `motif`
--

INSERT INTO `motif` (`id`, `motifLib`) VALUES
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `cp` int(5) NOT NULL,
  `ville` varchar(15) NOT NULL,
  `dateEmbauche` date DEFAULT NULL,
  `coefNotoriete` decimal(10,0) NOT NULL,
  `lieuExercice` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `praticien`
--

INSERT INTO `praticien` (`id`, `nom`, `prenom`, `adresse`, `cp`, `ville`, `dateEmbauche`, `coefNotoriete`, `lieuExercice`) VALUES
(1, 'Praticen', 'Pacome', '40 Rue Francisque Jomard', 69600, 'Oullins', '2017-04-26', '2', 'Lyon');

-- --------------------------------------------------------

--
-- Structure de la table `rapportmedicament`
--

DROP TABLE IF EXISTS `rapportmedicament`;
CREATE TABLE IF NOT EXISTS `rapportmedicament` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idRapport` int(11) NOT NULL,
  `idMedicament` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `estEchantillon` tinyint(1) NOT NULL,
  `estDocumente` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idRapportFK` (`idRapport`),
  KEY `idMedicamentFK` (`idMedicament`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `rapportvisite`
--

DROP TABLE IF EXISTS `rapportvisite`;
CREATE TABLE IF NOT EXISTS `rapportvisite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idVisiteur` char(4) NOT NULL,
  `dateVisite` date NOT NULL,
  `idPraticien` int(11) NOT NULL,
  `estRemplacant` tinyint(1) NOT NULL,
  `idMotif` int(11) NOT NULL,
  `bilan` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idPraticienFK_rapport` (`idPraticien`),
  KEY `idVisiteurFK_rapport` (`idVisiteur`),
  KEY `idMotifFK_rapport` (`idMotif`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `secteur`
--

DROP TABLE IF EXISTS `secteur`;
CREATE TABLE IF NOT EXISTS `secteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `secLib` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `secteur`
--

INSERT INTO `secteur` (`id`, `secLib`) VALUES
(1, 'Pharmacie');

-- --------------------------------------------------------

--
-- Structure de la table `visiteur`
--

DROP TABLE IF EXISTS `visiteur`;
CREATE TABLE IF NOT EXISTS `visiteur` (
  `id` char(4) NOT NULL,
  `nom` char(30) DEFAULT NULL,
  `prenom` char(30) DEFAULT NULL,
  `login` char(20) DEFAULT NULL,
  `mdp` char(20) DEFAULT NULL,
  `adresse` char(30) DEFAULT NULL,
  `cp` char(5) DEFAULT NULL,
  `ville` char(30) DEFAULT NULL,
  `dateEmbauche` date DEFAULT NULL,
  `idSecteur` int(11) DEFAULT NULL,
  `idLaboratoire` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idSecteurFK` (`idSecteur`),
  KEY `idLaboratoireFK` (`idLaboratoire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `visiteur`
--

INSERT INTO `visiteur` (`id`, `nom`, `prenom`, `login`, `mdp`, `adresse`, `cp`, `ville`, `dateEmbauche`, `idSecteur`, `idLaboratoire`) VALUES
('1jdv', 'DOMAS', 'Jade', 'jdomas', '123', 'Rue du doc', '69008', 'Lyon', '2022-04-03', NULL, NULL),
('a131', 'Villechalane', 'Louis', 'lvillachane', 'jux7g', '8 rue des Charmes', '46000', 'Cahors', '2005-12-21', NULL, NULL),
('a17', 'Andre', 'David', 'dandre', 'oppg5', '1 rue Petit', '46200', 'Lalbenque', '1998-11-23', NULL, NULL),
('a55', 'Bedos', 'Christian', 'cbedos', 'gmhxd', '1 rue Peranud', '46250', 'Montcuq', '1995-01-12', NULL, NULL),
('a93', 'Tusseau', 'Louis', 'ltusseau', 'ktp3s', '22 rue des Ternes', '46123', 'Gramat', '2000-05-01', NULL, NULL),
('b13', 'Bentot', 'Pascal', 'pbentot', 'doyw1', '11 allée des Cerises', '46512', 'Bessines', '1992-07-09', NULL, NULL),
('b16', 'Bioret', 'Luc', 'lbioret', 'hrjfs', '1 Avenue gambetta', '46000', 'Cahors', '1998-05-11', NULL, NULL),
('b19', 'Bunisset', 'Francis', 'fbunisset', '4vbnd', '10 rue des Perles', '93100', 'Montreuil', '1987-10-21', NULL, NULL),
('b25', 'Bunisset', 'Denise', 'dbunisset', 's1y1r', '23 rue Manin', '75019', 'paris', '2010-12-05', NULL, NULL),
('b28', 'Cacheux', 'Bernard', 'bcacheux', 'uf7r3', '114 rue Blanche', '75017', 'Paris', '2009-11-12', NULL, NULL),
('b34', 'Cadic', 'Eric', 'ecadic', '6u8dc', '123 avenue de la République', '75011', 'Paris', '2008-09-23', NULL, NULL),
('b4', 'Charoze', 'Catherine', 'ccharoze', 'u817o', '100 rue Petit', '75019', 'Paris', '2005-11-12', NULL, NULL),
('b50', 'Clepkens', 'Christophe', 'cclepkens', 'bw1us', '12 allée des Anges', '93230', 'Romainville', '2003-08-11', NULL, NULL),
('b59', 'Cottin', 'Vincenne', 'vcottin', '2hoh9', '36 rue Des Roches', '93100', 'Monteuil', '2001-11-18', NULL, NULL),
('c14', 'Daburon', 'François', 'fdaburon', '7oqpv', '13 rue de Chanzy', '94000', 'Créteil', '2002-02-11', NULL, NULL),
('c3', 'De', 'Philippe', 'pde', 'gk9kx', '13 rue Barthes', '94000', 'Créteil', '2010-12-14', NULL, NULL),
('c54', 'Debelle', 'Michel', 'mdebelle', 'od5rt', '181 avenue Barbusse', '93210', 'Rosny', '2006-11-23', NULL, NULL),
('d13', 'Debelle', 'Jeanne', 'jdebelle', 'nvwqq', '134 allée des Joncs', '44000', 'Nantes', '2000-05-11', NULL, NULL),
('d51', 'Debroise', 'Michel', 'mdebroise', 'sghkb', '2 Bld Jourdain', '44000', 'Nantes', '2001-04-17', NULL, NULL),
('e22', 'Desmarquest', 'Nathalie', 'ndesmarquest', 'f1fob', '14 Place d Arc', '45000', 'Orléans', '2005-11-12', NULL, NULL),
('e24', 'Desnost', 'Pierre', 'pdesnost', '4k2o5', '16 avenue des Cèdres', '23200', 'Guéret', '2001-02-05', NULL, NULL),
('e39', 'Dudouit', 'Frédéric', 'fdudouit', '44im8', '18 rue de l église', '23120', 'GrandBourg', '2000-08-01', NULL, NULL),
('e49', 'Duncombe', 'Claude', 'cduncombe', 'qf77j', '19 rue de la tour', '23100', 'La souteraine', '1987-10-10', NULL, NULL),
('e5', 'Enault-Pascreau', 'Céline', 'cenault', 'y2qdu', '25 place de la gare', '23200', 'Gueret', '1995-09-01', NULL, NULL),
('e52', 'Eynde', 'Valérie', 'veynde', 'i7sn3', '3 Grand Place', '13015', 'Marseille', '1999-11-01', NULL, NULL),
('f21', 'Finck', 'Jacques', 'jfinck', 'mpb3t', '10 avenue du Prado', '13002', 'Marseille', '2001-11-10', NULL, NULL),
('f39', 'Frémont', 'Fernande', 'ffremont', 'xs5tq', '4 route de la mer', '13012', 'Allauh', '1998-10-01', NULL, NULL),
('f4', 'Gest', 'Alain', 'agest', 'dywvt', '30 avenue de la mer', '13025', 'Berre', '1985-11-01', NULL, NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `medicament`
--
ALTER TABLE `medicament`
  ADD CONSTRAINT `idFamileFK` FOREIGN KEY (`idFamille`) REFERENCES `famille` (`id`);

--
-- Contraintes pour la table `rapportmedicament`
--
ALTER TABLE `rapportmedicament`
  ADD CONSTRAINT `idMedicamentFK` FOREIGN KEY (`idMedicament`) REFERENCES `medicament` (`id`),
  ADD CONSTRAINT `idRapportFK` FOREIGN KEY (`idRapport`) REFERENCES `rapportvisite` (`id`);

--
-- Contraintes pour la table `rapportvisite`
--
ALTER TABLE `rapportvisite`
  ADD CONSTRAINT `idMotifFK_rapport` FOREIGN KEY (`idMotif`) REFERENCES `motif` (`id`),
  ADD CONSTRAINT `idPraticienFK_rapport` FOREIGN KEY (`idPraticien`) REFERENCES `praticien` (`id`),
  ADD CONSTRAINT `idVisiteurFK_rapport` FOREIGN KEY (`idVisiteur`) REFERENCES `visiteur` (`id`);

--
-- Contraintes pour la table `visiteur`
--
ALTER TABLE `visiteur`
  ADD CONSTRAINT `idLaboratoireFK` FOREIGN KEY (`idLaboratoire`) REFERENCES `laboratoire` (`id`),
  ADD CONSTRAINT `idSecteurFK` FOREIGN KEY (`idSecteur`) REFERENCES `secteur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
