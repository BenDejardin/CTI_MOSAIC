-- phpMyAdmin SQL Dump
-- version 4.6.0
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 25 Juin 2021 à 06:03
-- Version du serveur :  5.5.48
-- Version de PHP :  5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `MOSAIC_2.0`
--

-- --------------------------------------------------------

--
-- Structure de la table `bilan`
--

CREATE TABLE `bilan` (
  `numAgent` int(11) DEFAULT NULL,
  `nomTable` varchar(100) DEFAULT NULL,
  `numMois` varchar(30) DEFAULT NULL,
  `dateBilan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `bilan`
--

INSERT INTO `bilan` (`numAgent`, `nomTable`, `numMois`, `dateBilan`) VALUES
(1111, 'ComitÃ© Suivi', '1', '2021-06-21'),
(1111, 'Bilan Etape Responsable', '1', '2021-06-21'),
(1111, 'Bilan Etape Responsable', '1', '2021-06-22'),
(1111, 'Bilan Etape Responsable', '1', '2021-06-23'),
(1111, 'ComitÃ© Suivi', '2', '2021-06-22'),
(1111, 'Bilan Etape Responsable', '2', '2021-06-22'),
(1111, 'Bilan Etape Responsable', '2', '2021-06-23'),
(1111, 'ComitÃ© Suivi', '3', '2021-06-23'),
(1111, 'Bilan Etape Responsable', '3', '2021-06-23'),
(1111, 'Bilan Etape Responsable', '3', '2021-06-24'),
(1111, 'ComitÃ© Suivi', '4', '2021-06-24'),
(1111, 'Bilan Etape Responsable', '4', '2021-06-24'),
(1111, 'Bilan Etape Responsable', '4', '2021-06-25'),
(1111, 'Bilan Etape Responsable', '4', '2021-06-26'),
(1111, 'ComitÃ© Suivi', '5', '2021-06-25'),
(1111, 'Bilan Etape Responsable', '5', '2021-06-25'),
(1111, 'Bilan Etape Responsable', '5', '2021-06-26'),
(1111, 'Bilan Etape Responsable', '5', '2021-06-27'),
(1111, 'ComitÃ© Suivi', '6', '2021-06-26'),
(1111, 'Bilan Etape Responsable', '6', '2021-06-26'),
(1111, 'Bilan Etape Responsable', '6', '2021-06-27');

-- --------------------------------------------------------

--
-- Structure de la table `canevas`
--

CREATE TABLE `canevas` (
  `id_canevas` int(11) NOT NULL,
  `nom_canevas` varchar(255) DEFAULT NULL,
  `date_creation_canevas` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `canevas`
--

INSERT INTO `canevas` (`id_canevas`, `nom_canevas`, `date_creation_canevas`) VALUES
(50, 'Presentation Generale', '2021-05-28'),
(52, 'SMI', '2021-05-28');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `numAgent` int(11) NOT NULL,
  `apprehPeriodeIntegration` varchar(5000) DEFAULT NULL,
  `apprehItemParticulier` varchar(5000) DEFAULT NULL,
  `pointPositif` varchar(5000) DEFAULT NULL,
  `ameliorationEmbauche` varchar(5000) DEFAULT NULL,
  `apporterCti` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Contenu_Canevas`
--

CREATE TABLE `Contenu_Canevas` (
  `id_item` int(11) NOT NULL,
  `nom_canevas` varchar(255) DEFAULT NULL,
  `intitule` varchar(500) DEFAULT NULL,
  `animateur` varchar(100) DEFAULT NULL,
  `date_presentation_prevision` date DEFAULT NULL,
  `date_presentation_reelle` date DEFAULT NULL,
  `date_quiz` date DEFAULT NULL,
  `date_retour_quiz` date DEFAULT NULL,
  `commentaire` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Contenu_Canevas`
--

INSERT INTO `Contenu_Canevas` (`id_item`, `nom_canevas`, `intitule`, `animateur`, `date_presentation_prevision`, `date_presentation_reelle`, `date_quiz`, `date_retour_quiz`, `commentaire`) VALUES
(97, 'Presentation Generale', 'Lâ€™institution', '', NULL, NULL, NULL, NULL, NULL),
(98, 'Presentation Generale', 'La DDSI et les sites de production', '', NULL, NULL, NULL, NULL, NULL),
(99, 'Presentation Generale', 'Le CTI Melun', '', NULL, NULL, NULL, NULL, NULL),
(100, 'Presentation Generale', 'Visite Ã  la CPAM de Melun', 'Le Responsable', NULL, NULL, NULL, NULL, NULL),
(101, 'Presentation Generale', 'Le S.I. de lâ€™Assurance Maladie', '', NULL, NULL, NULL, NULL, NULL),
(102, 'SMI', 'Le SMI et dÃ©marche processus', 'I Fischer', NULL, NULL, NULL, NULL, NULL),
(103, 'SMI', 'GDC&MEP (procÃ©dure, CAB Trans., CAB CTI, ...)', 'JA Songadele', NULL, NULL, NULL, NULL, NULL),
(104, 'SMI', 'Visite du service MEP', 'JA Songadele', NULL, NULL, NULL, NULL, NULL),
(105, 'SMI', 'TI (journÃ©e type, HSV, clÃ´ture fin de chaine)', 'JL Perrier', NULL, NULL, NULL, NULL, NULL),
(106, 'SMI', 'Visite du service Production ', 'JL Perrier', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `ContexteEvaluation`
--

CREATE TABLE `ContexteEvaluation` (
  `NumAgent` int(11) NOT NULL,
  `ChoixContexte` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ContexteEvaluation`
--

INSERT INTO `ContexteEvaluation` (`NumAgent`, `ChoixContexte`) VALUES
(1111, 'Nouvel Emploie'),
(2222, 'Mesure Promotionnel');

-- --------------------------------------------------------

--
-- Structure de la table `entretien`
--

CREATE TABLE `entretien` (
  `id` int(11) NOT NULL,
  `Nom_Candidat` varchar(30) DEFAULT NULL,
  `Prenom_Candidat` varchar(30) DEFAULT NULL,
  `Date_Debut_Entretien` date DEFAULT NULL,
  `Poste_id` int(11) DEFAULT NULL,
  `Type` varchar(30) DEFAULT NULL,
  `Nom_Personne_Presente` varchar(30) DEFAULT NULL,
  `Commentaires` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `entretien`
--

INSERT INTO `entretien` (`id`, `Nom_Candidat`, `Prenom_Candidat`, `Date_Debut_Entretien`, `Poste_id`, `Type`, `Nom_Personne_Presente`, `Commentaires`) VALUES
(1, 'Sow', 'Awa', '2021-06-24', 4, 'Telephonique', 'DFO', 'Rigoureux'),
(2, 'Dejardins', 'Benjamins', '2021-06-24', 4, 'PrÃ©sentiel Direction', 'ALO,PIS', 'Rigoureux'),
(3, 'Guey', 'Lucie', '2021-06-24', 4, 'PrÃ©sentiel Direction', 'AMA', 'Rigoureux'),
(4, 'Zucchero', 'Philipin', '2021-06-24', 4, 'PrÃ©sentiel Cadre', 'SLE', 'Rigoureux'),
(5, 'Dejardins', 'Benjamins', '2021-06-24', 8, 'Telephonique', 'PIS,DFO,AMA', 'Gentil'),
(6, 'Oumbafa', 'Eva', '2021-06-24', 8, 'PrÃ©sentiel Direction', 'SLE', 'Gentil'),
(7, 'LÃ´', 'Jess', '2021-06-24', 8, 'PrÃ©sentiel Cadre', 'ALO', 'Gentil...');

-- --------------------------------------------------------

--
-- Structure de la table `P2I`
--

CREATE TABLE `P2I` (
  `id` int(11) NOT NULL,
  `numAgent` int(255) DEFAULT '0',
  `nom_canevas` varchar(255) DEFAULT NULL,
  `intitule` varchar(500) DEFAULT NULL,
  `animateur` varchar(255) DEFAULT NULL,
  `date_presentation_prevision` date DEFAULT NULL,
  `date_presentation_reelle` date DEFAULT NULL,
  `date_quiz` date DEFAULT NULL,
  `date_retour_quiz` date DEFAULT NULL,
  `commentaire` varchar(1000) DEFAULT NULL,
  `mois` int(10) DEFAULT NULL,
  `avancementCanevas` int(10) DEFAULT NULL,
  `tauxGlobal` int(10) DEFAULT NULL,
  `commentaireAgent` varchar(5000) DEFAULT NULL,
  `commentaireResponsable` varchar(5000) DEFAULT NULL,
  `commentaireAdjointDirecteur` varchar(5000) DEFAULT NULL,
  `commentaireDirecteur` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `P2I`
--

INSERT INTO `P2I` (`id`, `numAgent`, `nom_canevas`, `intitule`, `animateur`, `date_presentation_prevision`, `date_presentation_reelle`, `date_quiz`, `date_retour_quiz`, `commentaire`, `mois`, `avancementCanevas`, `tauxGlobal`, `commentaireAgent`, `commentaireResponsable`, `commentaireAdjointDirecteur`, `commentaireDirecteur`) VALUES
(1077, 1111, 'Presentation Generale', 'Lâ€™institution', 'I Fischer', '2020-01-19', '2020-01-19', '0000-00-00', '0000-00-00', NULL, 1, 20, 10, '', '', '', ''),
(1078, 1111, 'Presentation Generale', 'La DDSI et les sites de production', 'I Fischer', '2020-01-19', '0000-00-00', '0000-00-00', '0000-00-00', NULL, 1, 20, 10, '', '', '', ''),
(1079, 1111, 'Presentation Generale', 'Le CTI Melun', 'I Fischer', '2020-01-19', '2020-01-19', '2020-01-19', '0000-00-00', NULL, 1, 20, 10, '', '', '', ''),
(1080, 1111, 'Presentation Generale', 'Visite Ã  la CPAM de Melun', 'le responsable', '2020-01-19', '2020-01-19', '2020-01-19', '2020-01-19', NULL, 1, 20, 10, '', '', '', ''),
(1081, 1111, 'Presentation Generale', 'Le S.I. de lâ€™Assurance Maladie', 'P Ringuet', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', NULL, 1, 20, 10, '', '', '', ''),
(1082, 1111, 'SMI', 'Le SMI et dÃ©marche processus', 'I Fischer', '2020-01-19', '0000-00-00', '0000-00-00', '0000-00-00', NULL, 1, 0, 10, '', '', '', ''),
(1083, 1111, 'SMI', 'GDC&MEP (procÃ©dure, CAB Trans., CAB CTI, ...)', 'JA Songadele', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', NULL, 1, 0, 10, '', '', '', ''),
(1084, 1111, 'SMI', 'Visite du service MEP', 'JA Songadele', '2020-01-19', '2020-01-19', '0000-00-00', '0000-00-00', NULL, 1, 0, 10, '', '', '', ''),
(1085, 1111, 'SMI', 'TI (journÃ©e type, HSV, clÃ´ture fin de chaine)', 'JL Perrier', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', NULL, 1, 0, 10, '', '', '', ''),
(1086, 1111, 'SMI', 'Visite du service Production ', 'JL Perrier', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', NULL, 1, 0, 10, '', '', '', ''),
(1092, 2222, 'SMI', 'Le SMI et dÃ©marche processus', 'I Fischer', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, '', '', '', ''),
(1093, 2222, 'SMI', 'GDC&MEP (procÃ©dure, CAB Trans., CAB CTI, ...)', 'JA Songadele', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, '', '', '', ''),
(1094, 2222, 'SMI', 'Visite du service MEP', 'JA Songadele', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, '', '', '', ''),
(1095, 2222, 'SMI', 'TI (journÃ©e type, HSV, clÃ´ture fin de chaine)', 'JL Perrier', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, '', '', '', ''),
(1096, 2222, 'SMI', 'Visite du service Production ', 'JL Perrier', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, '', '', '', ''),
(1099, 1111, 'Presentation Generale', 'Lâ€™institution', 'I Fischer', '2020-01-19', '2020-01-19', '0000-00-00', '0000-00-00', NULL, 2, 20, 20, '', '', '', ''),
(1100, 1111, 'Presentation Generale', 'La DDSI et les sites de production', 'I Fischer', '2020-01-19', '2020-01-19', '0000-00-00', '0000-00-00', NULL, 2, 20, 20, '', '', '', ''),
(1101, 1111, 'Presentation Generale', 'Le CTI Melun', 'I Fischer', '2020-01-19', '2020-01-19', '2020-01-19', '0000-00-00', NULL, 2, 20, 20, '', '', '', ''),
(1102, 1111, 'Presentation Generale', 'Visite Ã  la CPAM de Melun', 'le responsable', '2020-01-19', '2020-01-19', '2020-01-19', '2020-01-19', NULL, 2, 20, 20, '', '', '', ''),
(1103, 1111, 'Presentation Generale', 'Le S.I. de lâ€™Assurance Maladie', 'P Ringuet', '2020-01-19', '2020-01-19', '0000-00-00', '0000-00-00', NULL, 2, 20, 20, '', '', '', ''),
(1104, 1111, 'SMI', 'Le SMI et dÃ©marche processus', 'I Fischer', '2020-01-19', '0000-00-00', '0000-00-00', '0000-00-00', NULL, 2, 20, 20, '', '', '', ''),
(1105, 1111, 'SMI', 'GDC&MEP (procÃ©dure, CAB Trans., CAB CTI, ...)', 'JA Songadele', '2020-01-19', '2020-01-19', '0000-00-00', '0000-00-00', NULL, 2, 20, 20, '', '', '', ''),
(1106, 1111, 'SMI', 'Visite du service MEP', 'JA Songadele', '2020-01-19', '2020-01-19', '2020-01-19', '0000-00-00', NULL, 2, 20, 20, '', '', '', ''),
(1107, 1111, 'SMI', 'TI (journÃ©e type, HSV, clÃ´ture fin de chaine)', 'JL Perrier', '2020-01-19', '0000-00-00', '0000-00-00', '0000-00-00', NULL, 2, 20, 20, '', '', '', ''),
(1108, 1111, 'SMI', 'Visite du service Production ', 'JL Perrier', '2020-01-19', '2020-01-19', '2020-01-19', '2020-01-19', NULL, 2, 20, 20, '', '', '', ''),
(1114, 1111, 'Presentation Generale', 'Lâ€™institution', 'I Fischer', '2020-01-19', '2020-01-19', '2020-01-19', '0000-00-00', NULL, 3, 20, 30, '', '', '', ''),
(1115, 1111, 'Presentation Generale', 'La DDSI et les sites de production', 'I Fischer', '2020-01-19', '2020-01-19', '0000-00-00', '0000-00-00', NULL, 3, 20, 30, '', '', '', ''),
(1116, 1111, 'Presentation Generale', 'Le CTI Melun', 'I Fischer', '2020-01-19', '2020-01-19', '2020-01-19', '0000-00-00', NULL, 3, 20, 30, '', '', '', ''),
(1117, 1111, 'Presentation Generale', 'Visite Ã  la CPAM de Melun', 'le responsable', '2020-01-19', '2020-01-19', '2020-01-19', '2020-01-19', NULL, 3, 20, 30, '', '', '', ''),
(1118, 1111, 'Presentation Generale', 'Le S.I. de lâ€™Assurance Maladie', 'P Ringuet', '2020-01-19', '2020-01-19', '0000-00-00', '0000-00-00', NULL, 3, 20, 30, '', '', '', ''),
(1119, 1111, 'SMI', 'Le SMI et dÃ©marche processus', 'I Fischer', '2020-01-19', '2020-01-19', '0000-00-00', '0000-00-00', NULL, 3, 40, 30, '', '', '', ''),
(1120, 1111, 'SMI', 'GDC&MEP (procÃ©dure, CAB Trans., CAB CTI, ...)', 'JA Songadele', '2020-01-19', '2020-01-19', '0000-00-00', '0000-00-00', NULL, 3, 40, 30, '', '', '', ''),
(1121, 1111, 'SMI', 'Visite du service MEP', 'JA Songadele', '2020-01-19', '2020-01-19', '2020-01-19', '2020-01-19', NULL, 3, 40, 30, '', '', '', ''),
(1122, 1111, 'SMI', 'TI (journÃ©e type, HSV, clÃ´ture fin de chaine)', 'JL Perrier', '2020-01-19', '0000-00-00', '0000-00-00', '0000-00-00', NULL, 3, 40, 30, '', '', '', ''),
(1123, 1111, 'SMI', 'Visite du service Production ', 'JL Perrier', '2020-01-19', '2020-01-19', '2020-01-19', '2020-01-19', NULL, 3, 40, 30, '', '', '', ''),
(1129, 1111, 'Presentation Generale', 'Lâ€™institution', 'I Fischer', '2020-01-19', '2020-01-19', '2020-01-19', '2020-01-19', NULL, 4, 60, 50, '', '', '', ''),
(1130, 1111, 'Presentation Generale', 'La DDSI et les sites de production', 'I Fischer', '2020-01-19', '2020-01-19', '0000-00-00', '0000-00-00', NULL, 4, 60, 50, '', '', '', ''),
(1131, 1111, 'Presentation Generale', 'Le CTI Melun', 'I Fischer', '2020-01-19', '2020-01-19', '2020-01-19', '2020-01-19', NULL, 4, 60, 50, '', '', '', ''),
(1132, 1111, 'Presentation Generale', 'Visite Ã  la CPAM de Melun', 'le responsable', '2020-01-19', '2020-01-19', '2020-01-19', '2020-01-19', NULL, 4, 60, 50, '', '', '', ''),
(1133, 1111, 'Presentation Generale', 'Le S.I. de lâ€™Assurance Maladie', 'P Ringuet', '2020-01-19', '2020-01-19', '0000-00-00', '0000-00-00', NULL, 4, 60, 50, '', '', '', ''),
(1134, 1111, 'SMI', 'Le SMI et dÃ©marche processus', 'I Fischer', '2020-01-19', '2020-01-19', '0000-00-00', '0000-00-00', NULL, 4, 40, 50, '', '', '', ''),
(1135, 1111, 'SMI', 'GDC&MEP (procÃ©dure, CAB Trans., CAB CTI, ...)', 'JA Songadele', '2020-01-19', '2020-01-19', '0000-00-00', '0000-00-00', NULL, 4, 40, 50, '', '', '', ''),
(1136, 1111, 'SMI', 'Visite du service MEP', 'JA Songadele', '2020-01-19', '2020-01-19', '2020-01-19', '2020-01-19', NULL, 4, 40, 50, '', '', '', ''),
(1137, 1111, 'SMI', 'TI (journÃ©e type, HSV, clÃ´ture fin de chaine)', 'JL Perrier', '2020-01-19', '2020-01-19', '2020-01-19', '0000-00-00', NULL, 4, 40, 50, '', '', '', ''),
(1138, 1111, 'SMI', 'Visite du service Production ', 'JL Perrier', '2020-01-19', '2020-01-19', '2020-01-19', '2020-01-19', NULL, 4, 40, 50, '', '', '', ''),
(1144, 1111, 'Presentation Generale', 'Lâ€™institution', 'I Fischer', '2020-01-19', '2020-01-19', '2020-01-19', '2020-01-19', NULL, 5, 100, 80, '', '', '', ''),
(1145, 1111, 'Presentation Generale', 'La DDSI et les sites de production', 'I Fischer', '2020-01-19', '2020-01-19', '2020-01-19', '2020-01-19', NULL, 5, 100, 80, '', '', '', ''),
(1146, 1111, 'Presentation Generale', 'Le CTI Melun', 'I Fischer', '2020-01-19', '2020-01-19', '2020-01-19', '2020-01-19', NULL, 5, 100, 80, '', '', '', ''),
(1147, 1111, 'Presentation Generale', 'Visite Ã  la CPAM de Melun', 'le responsable', '2020-01-19', '2020-01-19', '2020-01-19', '2020-01-19', NULL, 5, 100, 80, '', '', '', ''),
(1148, 1111, 'Presentation Generale', 'Le S.I. de lâ€™Assurance Maladie', 'P Ringuet', '2020-01-19', '2020-01-19', '2020-01-19', '2020-01-19', NULL, 5, 100, 80, '', '', '', ''),
(1149, 1111, 'SMI', 'Le SMI et dÃ©marche processus', 'I Fischer', '2020-01-19', '2020-01-19', '2020-01-19', '2020-01-19', NULL, 5, 60, 80, '', '', '', ''),
(1150, 1111, 'SMI', 'GDC&MEP (procÃ©dure, CAB Trans., CAB CTI, ...)', 'JA Songadele', '2020-01-19', '2020-01-19', '2020-01-19', '0000-00-00', NULL, 5, 60, 80, '', '', '', ''),
(1151, 1111, 'SMI', 'Visite du service MEP', 'JA Songadele', '2020-01-19', '2020-01-19', '2020-01-19', '2020-01-19', NULL, 5, 60, 80, '', '', '', ''),
(1152, 1111, 'SMI', 'TI (journÃ©e type, HSV, clÃ´ture fin de chaine)', 'JL Perrier', '2020-01-19', '2020-01-19', '2020-01-19', '0000-00-00', NULL, 5, 60, 80, '', '', '', ''),
(1153, 1111, 'SMI', 'Visite du service Production ', 'JL Perrier', '2020-01-19', '2020-01-19', '2020-01-19', '2020-01-19', NULL, 5, 60, 80, '', '', '', ''),
(1161, 1111, 'Presentation Generale', 'Lâ€™institution', 'I Fischer', '2020-01-19', '2020-01-19', '2020-01-19', '2020-01-19', NULL, 6, 100, 100, '', '', '', ''),
(1162, 1111, 'Presentation Generale', 'La DDSI et les sites de production', 'I Fischer', '2020-01-19', '2020-01-19', '2020-01-19', '2020-01-19', NULL, 6, 100, 100, '', '', '', ''),
(1163, 1111, 'Presentation Generale', 'Le CTI Melun', 'I Fischer', '2020-01-19', '2020-01-19', '2020-01-19', '2020-01-19', NULL, 6, 100, 100, '', '', '', ''),
(1164, 1111, 'Presentation Generale', 'Visite Ã  la CPAM de Melun', 'le responsable', '2020-01-19', '2020-01-19', '2020-01-19', '2020-01-19', NULL, 6, 100, 100, '', '', '', ''),
(1165, 1111, 'Presentation Generale', 'Le S.I. de lâ€™Assurance Maladie', 'P Ringuet', '2020-01-19', '2020-01-19', '2020-01-19', '2020-01-19', NULL, 6, 100, 100, '', '', '', ''),
(1166, 1111, 'SMI', 'Le SMI et dÃ©marche processus', 'I Fischer', '2020-01-19', '2020-01-19', '2020-01-19', '2020-01-19', NULL, 6, 100, 100, '', '', '', ''),
(1167, 1111, 'SMI', 'GDC&MEP (procÃ©dure, CAB Trans., CAB CTI, ...)', 'JA Songadele', '2020-01-19', '2020-01-19', '2020-01-19', '2020-01-19', NULL, 6, 100, 100, '', '', '', ''),
(1168, 1111, 'SMI', 'Visite du service MEP', 'JA Songadele', '2020-01-19', '2020-01-19', '2020-01-19', '2020-01-19', NULL, 6, 100, 100, '', '', '', ''),
(1169, 1111, 'SMI', 'TI (journÃ©e type, HSV, clÃ´ture fin de chaine)', 'JL Perrier', '2020-01-19', '2020-01-19', '2020-01-19', '2020-01-19', NULL, 6, 100, 100, '', '', '', ''),
(1170, 1111, 'SMI', 'Visite du service Production ', 'JL Perrier', '2020-01-19', '2020-01-19', '2020-01-19', '2020-01-19', NULL, 6, 100, 100, '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `personnePresente`
--

CREATE TABLE `personnePresente` (
  `id_Personne` int(11) NOT NULL,
  `Nom` varchar(30) DEFAULT NULL,
  `Prenom` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `personnePresente`
--

INSERT INTO `personnePresente` (`id_Personne`, `Nom`, `Prenom`) VALUES
(1, 'LOPEZ', 'Anthony'),
(2, 'ISAIA', 'Philippe'),
(3, 'FONTAINE', 'Didier'),
(4, 'DESJARDINS', 'Jessica'),
(5, 'MANGEOT', 'Arnaud'),
(6, 'LEMESLE', 'Steve');

-- --------------------------------------------------------

--
-- Structure de la table `postePouvoir`
--

CREATE TABLE `postePouvoir` (
  `id` int(11) NOT NULL,
  `Date_Creation` date DEFAULT NULL,
  `Libelle_Emploi` varchar(100) DEFAULT NULL,
  `Niveau_Qualification` varchar(100) DEFAULT NULL,
  `Profil_Recherche` varchar(5000) DEFAULT NULL,
  `Service` varchar(100) DEFAULT NULL,
  `Nombre_Entretien_Telephone` int(50) DEFAULT NULL,
  `Nombre_Entretien_Cadre` int(50) DEFAULT NULL,
  `Nombre_Entretien_Direction` int(50) DEFAULT NULL,
  `Etat` varchar(100) DEFAULT NULL,
  `Date_Modification` date DEFAULT NULL,
  `Expression_besoin` varchar(100) DEFAULT NULL,
  `Candidat_Retenu` varchar(100) DEFAULT NULL,
  `Motif_Poste` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `postePouvoir`
--

INSERT INTO `postePouvoir` (`id`, `Date_Creation`, `Libelle_Emploi`, `Niveau_Qualification`, `Profil_Recherche`, `Service`, `Nombre_Entretien_Telephone`, `Nombre_Entretien_Cadre`, `Nombre_Entretien_Direction`, `Etat`, `Date_Modification`, `Expression_besoin`, `Candidat_Retenu`, `Motif_Poste`) VALUES
(4, '2021-06-02', 'Integration', 'IVA', 'DiplÃ´me / :BAC +2 OU PLUS EN INFORMATIQUE', 'Service Mise en ProductionM. SONGADELE(Respons)', 0, 0, 0, 'En cours', '2021-06-24', 'Maitrise AIX/LINUX et SHELL ', '', ''),
(5, '2021-06-02', 'Analyste ', 'VB', 'BAC +2 OU PLUS EN INFORMATIQUE', 'Service ProductionMME MANDAR(Responsable)', 0, 0, 0, 'AffectÃ©', '2021-06-24', 'Maitrise des outils $universe/univiewer, Sql, Cft', '', ''),
(6, '2021-06-02', 'Production', 'VA', 'BAC +2 OU PLUS EN INFORMATIQUECompÃ©tent', 'Missions NationalesÂ« METEORe Â»M. RINGUET (Responsable)', 0, 0, 0, 'AbandonnÃ©', '2021-06-24', 'UNIX, SCRIPT SHELL et SQL, Ordonnanceur, WEB Services', '', ''),
(8, '2021-06-17', 'Cadre', 'VA', 'BAC +2 OU PLUS EN INFORMATIQUE', 'ARPEGE', 0, 0, 0, 'En cours', '2021-06-17', 'MaÃ®trise des outils $universe/univiewer, Sql', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `presentation_generale`
--

CREATE TABLE `presentation_generale` (
  `id` int(11) NOT NULL,
  `intitule` varchar(250) DEFAULT NULL,
  `animateur` varchar(100) DEFAULT NULL,
  `date_presentat_prevision` date DEFAULT NULL,
  `date_presentat_reelle` date DEFAULT NULL,
  `date_quiz` date DEFAULT NULL,
  `date_quiz_retour` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `presentation_generale`
--

INSERT INTO `presentation_generale` (`id`, `intitule`, `animateur`, `date_presentat_prevision`, `date_presentat_reelle`, `date_quiz`, `date_quiz_retour`) VALUES
(1, 'Lâ€™institutions', 'I Fischer', '2020-07-07', '2020-07-08', '2020-07-08', '2020-07-01'),
(2, 'La DDSI et les sites de production', 'I Fischer', '2020-07-09', '2020-07-09', '2020-07-01', '2020-07-09'),
(3, 'Le CTI Melun', 'I Fischer', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(4, 'Visite Ã  la CPAM de Melun', 'I Fischer', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(5, 'Le CTI Melun', 'I Fischer', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(6, 'Lâ€™institution', 'I Fischer', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(7, 'Le C.S.E.', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(8, 'test2', 'test2', '2020-01-01', '0000-00-00', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `qualification`
--

CREATE TABLE `qualification` (
  `id_Qualif` int(11) NOT NULL,
  `Niveau_Qualification` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `qualification`
--

INSERT INTO `qualification` (`id_Qualif`, `Niveau_Qualification`) VALUES
(1, 'IVA'),
(2, 'VB'),
(3, 'VA'),
(4, 'VI');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `idService` int(11) NOT NULL,
  `nomService` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `services`
--

INSERT INTO `services` (`idService`, `nomService`) VALUES
(1, 'Mise en Production'),
(2, 'Production'),
(3, 'METEORe'),
(4, 'ARPEGE');

-- --------------------------------------------------------

--
-- Structure de la table `suivi`
--

CREATE TABLE `suivi` (
  `numAgent` varchar(255) NOT NULL DEFAULT '',
  `typeSuivi` varchar(3) DEFAULT NULL,
  `noms_canevas` varchar(100) DEFAULT NULL,
  `dateCreation` date DEFAULT NULL,
  `nomAgent` varchar(100) DEFAULT NULL,
  `prenomAgent` varchar(100) DEFAULT NULL,
  `serviceAgent` varchar(255) DEFAULT NULL,
  `nomResponsable` varchar(100) DEFAULT NULL,
  `intituleEmploi` varchar(500) DEFAULT NULL,
  `dateDebutPeriodeEssai` date DEFAULT NULL,
  `dateFinPeriodeEssai` date DEFAULT NULL,
  `dateDebutStageProbatoire` date DEFAULT NULL,
  `dateFinStageProbatoire` date DEFAULT NULL,
  `dateCloture` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `suivi`
--

INSERT INTO `suivi` (`numAgent`, `typeSuivi`, `noms_canevas`, `dateCreation`, `nomAgent`, `prenomAgent`, `serviceAgent`, `nomResponsable`, `intituleEmploi`, `dateDebutPeriodeEssai`, `dateFinPeriodeEssai`, `dateDebutStageProbatoire`, `dateFinStageProbatoire`, `dateCloture`) VALUES
('1111', 'P2I', 'Presentation Generale|SMI', '2021-06-24', 'Dejardin', 'Benjamin', 'METEORe', 'P.Ringuet', 'Stage', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
('2222', 'P2I', 'SMI', '2021-06-24', 'Sow', 'Awa', 'ARPEGE', 'A.Lopez', 'Stage', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `Titularisation`
--

CREATE TABLE `Titularisation` (
  `numAgent` int(11) DEFAULT NULL,
  `Personne` varchar(50) DEFAULT NULL,
  `avisEssaie` varchar(30) DEFAULT NULL,
  `dateDecisionEssai` date DEFAULT NULL,
  `signatureEssaie` varchar(30) DEFAULT NULL,
  `avisTitularisation` varchar(50) DEFAULT NULL,
  `dateTitularisation` date DEFAULT NULL,
  `signatureTitularisation` varchar(30) DEFAULT NULL,
  `commentaire` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Titularisation`
--

INSERT INTO `Titularisation` (`numAgent`, `Personne`, `avisEssaie`, `dateDecisionEssai`, `signatureEssaie`, `avisTitularisation`, `dateTitularisation`, `signatureTitularisation`, `commentaire`) VALUES
(1111, 'Responsable', 'Positif', '2021-06-24', 'BD', 'Titularisation', '2021-06-24', 'bd', NULL),
(1111, 'Directeur Adjoint', 'Positif', '2021-06-24', 'Bd', 'Titularisation', '2021-06-24', 'bD', NULL),
(1111, 'Directeur', 'Positif', '2021-06-24', 'bd', ' Non titularisation', '2021-06-24', 'Db', NULL),
(2222, 'Responsable', 'Positif', '2021-06-24', 'BD', 'Titularisation', '2021-06-24', 'bd', NULL),
(2222, 'Directeur Adjoint', 'Positif', '2021-06-24', 'Bd', 'Titularisation', '2021-06-24', 'bD', NULL),
(2222, 'Directeur', 'Positif', '2021-06-24', 'bd', ' Non titularisation', '2021-06-24', 'Db', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `canevas`
--
ALTER TABLE `canevas`
  ADD PRIMARY KEY (`id_canevas`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`numAgent`);

--
-- Index pour la table `Contenu_Canevas`
--
ALTER TABLE `Contenu_Canevas`
  ADD PRIMARY KEY (`id_item`);

--
-- Index pour la table `ContexteEvaluation`
--
ALTER TABLE `ContexteEvaluation`
  ADD PRIMARY KEY (`NumAgent`);

--
-- Index pour la table `entretien`
--
ALTER TABLE `entretien`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `P2I`
--
ALTER TABLE `P2I`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Index pour la table `personnePresente`
--
ALTER TABLE `personnePresente`
  ADD UNIQUE KEY `id_Personne` (`id_Personne`);

--
-- Index pour la table `postePouvoir`
--
ALTER TABLE `postePouvoir`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `presentation_generale`
--
ALTER TABLE `presentation_generale`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `qualification`
--
ALTER TABLE `qualification`
  ADD UNIQUE KEY `id_Qualif` (`id_Qualif`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`idService`);

--
-- Index pour la table `suivi`
--
ALTER TABLE `suivi`
  ADD PRIMARY KEY (`numAgent`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `canevas`
--
ALTER TABLE `canevas`
  MODIFY `id_canevas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT pour la table `Contenu_Canevas`
--
ALTER TABLE `Contenu_Canevas`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT pour la table `entretien`
--
ALTER TABLE `entretien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `P2I`
--
ALTER TABLE `P2I`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1176;
--
-- AUTO_INCREMENT pour la table `personnePresente`
--
ALTER TABLE `personnePresente`
  MODIFY `id_Personne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `postePouvoir`
--
ALTER TABLE `postePouvoir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `presentation_generale`
--
ALTER TABLE `presentation_generale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `qualification`
--
ALTER TABLE `qualification`
  MODIFY `id_Qualif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `idService` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
