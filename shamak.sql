-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 25 Juin 2018 à 10:00
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `shamak`
--

-- CREATE DATABASE shamak;

-- --------------------------------------------------------

--
-- Structure de la table `acteur`
--

DROP TABLE IF EXISTS `acteur`;
CREATE TABLE IF NOT EXISTS `acteur` (
  `idActeur` int(11) NOT NULL,
  `nomActeur` varchar(254) NOT NULL,
  `prenomActeur` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idActeur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `nomAdmin` varchar(254) NOT NULL,
  `prenomAdmin` varchar(254) NOT NULL,
  `sexeAdmin` enum('m','f') NOT NULL DEFAULT 'm' COMMENT 'Sexe',
  `emailAdmin` varchar(254) NOT NULL,
  `mdpAdmin` varchar(254) NOT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`idAdmin`, `nomAdmin`, `prenomAdmin`, `sexeAdmin`, `emailAdmin`, `mdpAdmin`) VALUES
(1, 'shamak', 'allharamadji', 'm', 'shamak@gmail.com', '8104ba1dc0409b259f487ed07db477c38f205a30');

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

DROP TABLE IF EXISTS `artiste`;
CREATE TABLE IF NOT EXISTS `artiste` (
  `idArtiste` int(11) NOT NULL AUTO_INCREMENT,
  `nomArtiste` varchar(254) NOT NULL,
  PRIMARY KEY (`idArtiste`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `comprend`
--

DROP TABLE IF EXISTS `comprend`;
CREATE TABLE IF NOT EXISTS `comprend` (
  `idFilm` int(11) NOT NULL,
  `idGenre` int(11) NOT NULL,
  PRIMARY KEY (`idFilm`,`idGenre`),
  KEY `FK_comprend` (`idGenre`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise` (
  `idEntreprise` int(11) NOT NULL,
  `nomEntreprise` varchar(254) NOT NULL,
  PRIMARY KEY (`idEntreprise`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

DROP TABLE IF EXISTS `film`;
CREATE TABLE IF NOT EXISTS `film` (
  `idFilm` int(11) NOT NULL AUTO_INCREMENT,
  `titreFilm` varchar(254) NOT NULL,
  `dateAjoutFilm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `datePubFilm` date NOT NULL,
  `imageFilm` varchar(254) NOT NULL,
  `lienFilm` varchar(254) NOT NULL,
  `resumeFilm` varchar(254) NOT NULL,
  PRIMARY KEY (`idFilm`),
  KEY `AK_idFilm` (`idFilm`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `idGenre` int(11) NOT NULL,
  `nomGenre` varchar(254) NOT NULL,
  `descriptionGenre` varchar(254) NOT NULL,
  PRIMARY KEY (`idGenre`),
  KEY `AK_idGenre` (`idGenre`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `joue`
--

DROP TABLE IF EXISTS `joue`;
CREATE TABLE IF NOT EXISTS `joue` (
  `idActeur` int(11) NOT NULL,
  `idFilm` int(11) NOT NULL,
  PRIMARY KEY (`idActeur`,`idFilm`),
  KEY `FK_joue` (`idFilm`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `musique`
--

DROP TABLE IF EXISTS `musique`;
CREATE TABLE IF NOT EXISTS `musique` (
  `idMusique` int(11) NOT NULL,
  `idArtiste` int(11) NOT NULL,
  `titreMusique` varchar(254) NOT NULL,
  `dateAjoutMusique` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `datePubMusique` date NOT NULL,
  `imageMusique` varchar(254) NOT NULL,
  `lienMusique` varchar(254) NOT NULL,
  `resumeMusique` varchar(254) NOT NULL,
  `autreMusique` varchar(254) NOT NULL,
  PRIMARY KEY (`idMusique`),
  KEY `FK_association1` (`idArtiste`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE IF NOT EXISTS `newsletter` (
  `emailNewsLetter` varchar(254) NOT NULL,
  `statut` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`emailNewsLetter`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `newsletter`
--

INSERT INTO `newsletter` (`emailNewsLetter`, `statut`) VALUES
('alladintroumba@gmail.com', 1),
('shamak@gmail.com', 1),
('reireir@gmail.com', 1),
('ladinstar@gmail.com', 1);

-- --------------------------------------------------------

--
-- Structure de la table `publicite`
--

DROP TABLE IF EXISTS `publicite`;
CREATE TABLE IF NOT EXISTS `publicite` (
  `idPublicite` int(11) NOT NULL,
  `idEntreprise` int(11) NOT NULL,
  `titrePublicite` varchar(254) NOT NULL,
  `dateAjoutMusique` datetime NOT NULL,
  `datePubMusique` date NOT NULL,
  `imageMusique` varchar(254) NOT NULL,
  `lienMusique` varchar(254) NOT NULL,
  `resumeMusique` varchar(254) NOT NULL,
  PRIMARY KEY (`idPublicite`),
  KEY `FK_pubEntreprise` (`idEntreprise`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sugestions`
--

DROP TABLE IF EXISTS `sugestions`;
CREATE TABLE IF NOT EXISTS `sugestions` (
  `idSug` int(11) NOT NULL AUTO_INCREMENT,
  `nomSug` varchar(254) NOT NULL,
  `emailSug` varchar(254) NOT NULL,
  `sujetSug` varchar(254) NOT NULL,
  `messageSug` varchar(254) NOT NULL,
  `dateSug` datetime NOT NULL,
  `luSug` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idSug`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
