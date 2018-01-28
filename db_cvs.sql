-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 29 Janvier 2018 à 00:19
-- Version du serveur :  5.6.21
-- Version de PHP :  5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `db_cvs`
--

-- --------------------------------------------------------

--
-- Structure de la table `codeuses`
--

CREATE TABLE IF NOT EXISTS `codeuses` (
`id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `naissance` date NOT NULL,
  `resume` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `telephone` int(8) NOT NULL,
  `password` varchar(30) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `specialisation` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `codeuses`
--

INSERT INTO `codeuses` (`id`, `nom`, `prenom`, `naissance`, `resume`, `email`, `telephone`, `password`, `photo`, `specialisation`) VALUES
(1, 'kodjo', 'salimata', '2018-01-12', 'apprenti codeuse', 'lylykoj@yahoo.fr', 7961264, 'merci', 'img.jpg', 'coding');

-- --------------------------------------------------------

--
-- Structure de la table `cv`
--

CREATE TABLE IF NOT EXISTS `cv` (
`id` int(11) NOT NULL,
  `id_codeuses` int(11) NOT NULL,
  `facebook` varchar(50) NOT NULL,
  `twitter` varchar(50) NOT NULL,
  `github` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `diplomes`
--

CREATE TABLE IF NOT EXISTS `diplomes` (
`id` int(11) NOT NULL,
  `etablissement` varchar(100) NOT NULL,
  `diplome` varchar(100) NOT NULL,
  `date_obtention` date NOT NULL,
  `id_codeuses` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `diplomes`
--

INSERT INTO `diplomes` (`id`, `etablissement`, `diplome`, `date_obtention`, `id_codeuses`) VALUES
(1, 'ets loko', 'bts finances comptabilite', '2018-01-27', 0),
(2, 'ets loko', 'bts finances comptabilite', '2018-01-28', 0),
(3, 'ets loko', 'bts finances comptabilite', '2018-01-28', 1);

-- --------------------------------------------------------

--
-- Structure de la table `experiences`
--

CREATE TABLE IF NOT EXISTS `experiences` (
`id` int(11) NOT NULL,
  `organisation` varchar(100) NOT NULL,
  `postes` varchar(100) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `id_codeuses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `interets`
--

CREATE TABLE IF NOT EXISTS `interets` (
`id` int(11) NOT NULL,
  `centre_interet` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `id_codeuses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `codeuses`
--
ALTER TABLE `codeuses`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cv`
--
ALTER TABLE `cv`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `diplomes`
--
ALTER TABLE `diplomes`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `experiences`
--
ALTER TABLE `experiences`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `interets`
--
ALTER TABLE `interets`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `codeuses`
--
ALTER TABLE `codeuses`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `cv`
--
ALTER TABLE `cv`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `diplomes`
--
ALTER TABLE `diplomes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `experiences`
--
ALTER TABLE `experiences`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `interets`
--
ALTER TABLE `interets`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
