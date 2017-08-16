-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 26 Mai 2016 à 03:14
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `rev`
--

-- --------------------------------------------------------

--
-- Structure de la table `bibliotheque`
--

CREATE TABLE `bibliotheque` (
  `id_livre` int(11) NOT NULL,
  `titre` varchar(30) NOT NULL,
  `auteur` varchar(30) NOT NULL,
  `commentaire` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `bibliotheque`
--

INSERT INTO `bibliotheque` (`id_livre`, `titre`, `auteur`, `commentaire`) VALUES
(1, 'c++', 'atef', 'tres bon livre');

-- --------------------------------------------------------

--
-- Structure de la table `cadre_admin`
--

CREATE TABLE `cadre_admin` (
  `cin` int(8) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `dn` date NOT NULL,
  `sexe` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `cadre_admin`
--

INSERT INTO `cadre_admin` (`cin`, `nom`, `prenom`, `dn`, `sexe`, `password`) VALUES
(1, 'ben charifa', 'ahlem', '1974-08-18', 'femme', '123456'),
(12345678, 'moalla', 'mohamed', '1954-10-09', 'homme', '123456');

-- --------------------------------------------------------

--
-- Structure de la table `double_correction`
--

CREATE TABLE `double_correction` (
  `id_matiere` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL,
  `demande` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `emprunter`
--

CREATE TABLE `emprunter` (
  `id_etudiant` int(11) NOT NULL,
  `id_livre` int(11) NOT NULL,
  `date_emprunt` date NOT NULL,
  `date_remise` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE `enseignant` (
  `cin` int(8) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `dn` date NOT NULL,
  `sexe` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `enseignant`
--

INSERT INTO `enseignant` (`cin`, `password`, `nom`, `prenom`, `dn`, `sexe`) VALUES
(12345678, '123', 'moalla', 'mohamed', '1953-10-08', 'homme');

-- --------------------------------------------------------

--
-- Structure de la table `enseignement`
--

CREATE TABLE `enseignement` (
  `id_section` int(11) NOT NULL,
  `id_matiere` int(11) NOT NULL,
  `id_enseignant` int(11) NOT NULL,
  `type_enseignement` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `enseignement`
--

INSERT INTO `enseignement` (`id_section`, `id_matiere`, `id_enseignant`, `type_enseignement`) VALUES
(1, 1, 12345678, 'cour');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `cin` int(8) NOT NULL,
  `password` varchar(30) NOT NULL DEFAULT 'pass',
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `dn` date NOT NULL,
  `id_section` int(11) NOT NULL,
  `sexe` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`cin`, `password`, `nom`, `prenom`, `dn`, `id_section`, `sexe`) VALUES
(3, 'pass', 'kessentini', 'oussama', '1994-05-10', 1, 'homme');

-- --------------------------------------------------------

--
-- Structure de la table `etudier`
--

CREATE TABLE `etudier` (
  `id_matiere` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL,
  `note_tp` int(11) NOT NULL,
  `note_ds` int(11) NOT NULL,
  `note_exam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `etudier`
--

INSERT INTO `etudier` (`id_matiere`, `id_etudiant`, `note_tp`, `note_ds`, `note_exam`) VALUES
(1, 3, 18, 16, 13);

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `id_matiere` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `coeff` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `matiere`
--

INSERT INTO `matiere` (`id_matiere`, `nom`, `coeff`) VALUES
(1, 'sfc', 5),
(2, 'c++', 7);

-- --------------------------------------------------------

--
-- Structure de la table `section`
--

CREATE TABLE `section` (
  `id_section` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `section`
--

INSERT INTO `section` (`id_section`, `nom`) VALUES
(1, 'IF3'),
(2, 'IF4'),
(3, 'IF5');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `bibliotheque`
--
ALTER TABLE `bibliotheque`
  ADD PRIMARY KEY (`id_livre`);

--
-- Index pour la table `cadre_admin`
--
ALTER TABLE `cadre_admin`
  ADD PRIMARY KEY (`cin`);

--
-- Index pour la table `double_correction`
--
ALTER TABLE `double_correction`
  ADD PRIMARY KEY (`id_matiere`,`id_etudiant`);

--
-- Index pour la table `emprunter`
--
ALTER TABLE `emprunter`
  ADD PRIMARY KEY (`id_etudiant`);

--
-- Index pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`cin`);

--
-- Index pour la table `enseignement`
--
ALTER TABLE `enseignement`
  ADD PRIMARY KEY (`id_section`,`id_matiere`,`id_enseignant`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`cin`);

--
-- Index pour la table `etudier`
--
ALTER TABLE `etudier`
  ADD PRIMARY KEY (`id_matiere`,`id_etudiant`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`id_matiere`);

--
-- Index pour la table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id_section`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `bibliotheque`
--
ALTER TABLE `bibliotheque`
  MODIFY `id_livre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `id_matiere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `section`
--
ALTER TABLE `section`
  MODIFY `id_section` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
