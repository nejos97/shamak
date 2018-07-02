-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 28, 2018 at 12:52 
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shamak`
--

CREATE DATABASE shamak;

-- --------------------------------------------------------

--
-- Table structure for table `acteur`
--

CREATE TABLE `acteur` (
  `idActeur` int(11) NOT NULL,
  `nomActeur` varchar(254) NOT NULL,
  `prenomActeur` varchar(254) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acteur`
--

INSERT INTO `acteur` (`idActeur`, `nomActeur`, `prenomActeur`) VALUES
(5, 'Avaika', 'Troumba'),
(4, 'Nenba', 'Jonathan'),
(6, 'X maleya', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL,
  `nomAdmin` varchar(254) NOT NULL,
  `prenomAdmin` varchar(254) NOT NULL,
  `sexeAdmin` enum('m','f') NOT NULL DEFAULT 'm' COMMENT 'Sexe',
  `emailAdmin` varchar(254) NOT NULL,
  `mdpAdmin` varchar(254) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idAdmin`, `nomAdmin`, `prenomAdmin`, `sexeAdmin`, `emailAdmin`, `mdpAdmin`) VALUES
(1, 'shamak', 'allharamadji', 'm', 'shamak@gmail.com', '8104ba1dc0409b259f487ed07db477c38f205a30'),
(2, 'Nenba', 'Jonathan', 'm', 'jnenba@pm.me', '7c01e815085568413c90f9dfd8658c29a46a5e22');

-- --------------------------------------------------------

--
-- Table structure for table `artiste`
--

CREATE TABLE `artiste` (
  `idArtiste` int(11) NOT NULL,
  `nomArtiste` varchar(254) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artiste`
--

INSERT INTO `artiste` (`idArtiste`, `nomArtiste`) VALUES
(3, 'Tony Nobody'),
(2, 'Ezaboto');

-- --------------------------------------------------------

--
-- Table structure for table `comprend`
--

CREATE TABLE `comprend` (
  `idFilm` int(11) NOT NULL,
  `idGenre` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `entreprise`
--

CREATE TABLE `entreprise` (
  `idEntreprise` int(11) NOT NULL,
  `nomEntreprise` varchar(254) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `idFilm` int(11) NOT NULL,
  `titreFilm` varchar(254) NOT NULL,
  `dateAjoutFilm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `datePubFilm` date NOT NULL,
  `imageFilm` varchar(254) NOT NULL,
  `lienFilm` varchar(254) NOT NULL,
  `resumeFilm` varchar(254) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `idGenre` int(11) NOT NULL,
  `nomGenre` varchar(254) NOT NULL,
  `descriptionGenre` varchar(254) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`idGenre`, `nomGenre`, `descriptionGenre`) VALUES
(3, 'Horreur', 'zombie slm'),
(2, 'Romantique', 'haha');

-- --------------------------------------------------------

--
-- Table structure for table `joue`
--

CREATE TABLE `joue` (
  `idActeur` int(11) NOT NULL,
  `idFilm` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `musique`
--

CREATE TABLE `musique` (
  `idMusique` int(11) NOT NULL,
  `idArtiste` int(11) NOT NULL,
  `titreMusique` varchar(254) NOT NULL,
  `dateAjoutMusique` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `datePubMusique` date NOT NULL,
  `imageMusique` varchar(254) NOT NULL,
  `lienMusique` varchar(254) NOT NULL,
  `resumeMusique` varchar(254) NOT NULL,
  `autreMusique` varchar(254) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `emailNewsLetter` varchar(254) NOT NULL,
  `statut` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`emailNewsLetter`, `statut`) VALUES
('alladintroumba@gmail.com', 1),
('shamak@gmail.com', 1),
('reireir@gmail.com', 1),
('ladinstar@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `publicite`
--

CREATE TABLE `publicite` (
  `idPublicite` int(11) NOT NULL,
  `idEntreprise` int(11) NOT NULL,
  `titrePublicite` varchar(254) NOT NULL,
  `dateAjoutMusique` datetime NOT NULL,
  `datePubMusique` date NOT NULL,
  `imageMusique` varchar(254) NOT NULL,
  `lienMusique` varchar(254) NOT NULL,
  `resumeMusique` varchar(254) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sugestions`
--

CREATE TABLE `sugestions` (
  `idSug` int(11) NOT NULL,
  `nomSug` varchar(254) NOT NULL,
  `emailSug` varchar(254) NOT NULL,
  `sujetSug` varchar(254) NOT NULL,
  `messageSug` varchar(254) NOT NULL,
  `dateSug` datetime NOT NULL,
  `luSug` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acteur`
--
ALTER TABLE `acteur`
  ADD PRIMARY KEY (`idActeur`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `artiste`
--
ALTER TABLE `artiste`
  ADD PRIMARY KEY (`idArtiste`);

--
-- Indexes for table `comprend`
--
ALTER TABLE `comprend`
  ADD PRIMARY KEY (`idFilm`,`idGenre`),
  ADD KEY `FK_comprend` (`idGenre`);

--
-- Indexes for table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`idEntreprise`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`idFilm`),
  ADD KEY `AK_idFilm` (`idFilm`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`idGenre`),
  ADD KEY `AK_idGenre` (`idGenre`);

--
-- Indexes for table `joue`
--
ALTER TABLE `joue`
  ADD PRIMARY KEY (`idActeur`,`idFilm`),
  ADD KEY `FK_joue` (`idFilm`);

--
-- Indexes for table `musique`
--
ALTER TABLE `musique`
  ADD PRIMARY KEY (`idMusique`),
  ADD KEY `FK_association1` (`idArtiste`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`emailNewsLetter`);

--
-- Indexes for table `publicite`
--
ALTER TABLE `publicite`
  ADD PRIMARY KEY (`idPublicite`),
  ADD KEY `FK_pubEntreprise` (`idEntreprise`);

--
-- Indexes for table `sugestions`
--
ALTER TABLE `sugestions`
  ADD PRIMARY KEY (`idSug`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acteur`
--
ALTER TABLE `acteur`
  MODIFY `idActeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `artiste`
--
ALTER TABLE `artiste`
  MODIFY `idArtiste` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `idEntreprise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `idFilm` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `idGenre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sugestions`
--
ALTER TABLE `sugestions`
  MODIFY `idSug` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
