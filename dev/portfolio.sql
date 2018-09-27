-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 27 sep. 2018 à 20:13
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `portfolio`
--

-- --------------------------------------------------------

--
-- Structure de la table `chinese_portrait_items`
--

DROP TABLE IF EXISTS `chinese_portrait_items`;
CREATE TABLE IF NOT EXISTS `chinese_portrait_items` (
  `idCPItem` int(11) NOT NULL AUTO_INCREMENT,
  `CPItemSvgLink` varchar(50) NOT NULL,
  `leftText` text NOT NULL,
  `rightText` text NOT NULL,
  PRIMARY KEY (`idCPItem`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chinese_portrait_items`
--

INSERT INTO `chinese_portrait_items` (`idCPItem`, `CPItemSvgLink`, `leftText`, `rightText`) VALUES
(1, 'images/chinesePortrait/basketballIcon.svg', 'Si j\'étais un sport...', '...ce serait le basket.'),
(2, 'images/chinesePortrait/quote.svg', 'Si j\'étais un proverbe...', '...ce serait « ne remet pas au lendemain ce que tu peux faire le jour même ».'),
(3, 'images/chinesePortrait/megaphone.svg', 'Si j\'étais un slogan...', '...ce serait « à fond la forme »'),
(4, 'images/chinesePortrait/calendar.svg', 'Si j\'étais un mois...', '...ce serait le mois d\'avril .'),
(5, 'images/chinesePortrait/calendar.svg', 'Si j\'étais un jour de la semaine...', '...je serais le samedi.'),
(6, 'images/chinesePortrait/verbe.svg', 'Si j\'étais un verbe...', '...ce serait « réaliser ».'),
(7, 'images/chinesePortrait/train.svg', 'Si j\'étais un moyen de locomotion...', '...je serais un train.'),
(8, 'images/chinesePortrait/binary-code.svg', 'Si j\'étais une matière enseignée...', '...ce serait l\'Informatique.'),
(9, 'images/chinesePortrait/basse.svg', 'Si j\'étais un instrument de musique...', '...je serais une Basse.'),
(10, 'images/chinesePortrait/basse.svg', 'Si j\'étais un logiciel...', '...je serais notepad++.');

-- --------------------------------------------------------

--
-- Structure de la table `contain_gitem`
--

DROP TABLE IF EXISTS `contain_gitem`;
CREATE TABLE IF NOT EXISTS `contain_gitem` (
  `idGalleryItem` int(11) NOT NULL,
  `idGalCat` int(11) NOT NULL,
  PRIMARY KEY (`idGalleryItem`,`idGalCat`),
  KEY `CONTAIN_GITEM_GALLERY_CAT1_FK` (`idGalCat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `contain_img`
--

DROP TABLE IF EXISTS `contain_img`;
CREATE TABLE IF NOT EXISTS `contain_img` (
  `id` int(11) NOT NULL,
  `id_IMG_GALLERY` varchar(10) NOT NULL,
  PRIMARY KEY (`id`,`id_IMG_GALLERY`),
  KEY `CONTAIN_IMG_IMG_GALLERY1_FK` (`id_IMG_GALLERY`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `gallery_cat`
--

DROP TABLE IF EXISTS `gallery_cat`;
CREATE TABLE IF NOT EXISTS `gallery_cat` (
  `idGalCat` int(11) NOT NULL AUTO_INCREMENT,
  `galCatName` varchar(50) NOT NULL,
  PRIMARY KEY (`idGalCat`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gallery_cat`
--

INSERT INTO `gallery_cat` (`idGalCat`, `galCatName`) VALUES
(1, 'Audiovisuel'),
(2, 'Programmation');

-- --------------------------------------------------------

--
-- Structure de la table `gallery_items`
--

DROP TABLE IF EXISTS `gallery_items`;
CREATE TABLE IF NOT EXISTS `gallery_items` (
  `idGalleryItem` int(11) NOT NULL AUTO_INCREMENT,
  `mainImgLink` varchar(250) NOT NULL,
  `miniatureImgLink` varchar(250) NOT NULL,
  `creationDate` date NOT NULL,
  `description` text NOT NULL,
  `id` varchar(10) NOT NULL,
  PRIMARY KEY (`idGalleryItem`),
  UNIQUE KEY `GALLERY_ITEMS_IMG_GALLERY0_AK` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `img`
--

DROP TABLE IF EXISTS `img`;
CREATE TABLE IF NOT EXISTS `img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imgLink` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `img_gallery`
--

DROP TABLE IF EXISTS `img_gallery`;
CREATE TABLE IF NOT EXISTS `img_gallery` (
  `id` varchar(10) NOT NULL,
  `idGalleryItem` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `IMG_GALLERY_GALLERY_ITEMS0_AK` (`idGalleryItem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `skills`
--

DROP TABLE IF EXISTS `skills`;
CREATE TABLE IF NOT EXISTS `skills` (
  `idSkill` int(11) NOT NULL AUTO_INCREMENT,
  `skillName` varchar(50) NOT NULL,
  `skillSvgLink` varchar(250) NOT NULL,
  `skillProgress` tinyint(4) DEFAULT NULL,
  `idSkillsCat` int(11) DEFAULT NULL,
  PRIMARY KEY (`idSkill`),
  KEY `SKILLS_SKILLS_CAT0_FK` (`idSkillsCat`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `skills`
--

INSERT INTO `skills` (`idSkill`, `skillName`, `skillSvgLink`, `skillProgress`, `idSkillsCat`) VALUES
(1, 'HTML5', '', 80, 1),
(2, 'CSS3', '', 80, 1),
(3, 'PHP', '', 60, 1),
(4, 'Anglais', '', 70, 2),
(5, 'Allemand', '', 30, 2),
(6, 'Permis de conduire B', 'images/skills/carIcon.svg', NULL, 3);

-- --------------------------------------------------------

--
-- Structure de la table `skills_cat`
--

DROP TABLE IF EXISTS `skills_cat`;
CREATE TABLE IF NOT EXISTS `skills_cat` (
  `idSkillsCat` int(11) NOT NULL AUTO_INCREMENT,
  `skillsCatName` varchar(50) NOT NULL,
  PRIMARY KEY (`idSkillsCat`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `skills_cat`
--

INSERT INTO `skills_cat` (`idSkillsCat`, `skillsCatName`) VALUES
(1, 'Programmation'),
(2, 'Linguistique'),
(3, 'Autre');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `status` enum('admin','user') NOT NULL,
  `pwd` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `status`, `pwd`) VALUES
(1, 'bidet', 'yoan', 'admin', '');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contain_gitem`
--
ALTER TABLE `contain_gitem`
  ADD CONSTRAINT `CONTAIN_GITEM_GALLERY_CAT1_FK` FOREIGN KEY (`idGalCat`) REFERENCES `gallery_cat` (`idGalCat`),
  ADD CONSTRAINT `CONTAIN_GITEM_GALLERY_ITEMS0_FK` FOREIGN KEY (`idGalleryItem`) REFERENCES `gallery_items` (`idGalleryItem`);

--
-- Contraintes pour la table `contain_img`
--
ALTER TABLE `contain_img`
  ADD CONSTRAINT `CONTAIN_IMG_IMG0_FK` FOREIGN KEY (`id`) REFERENCES `img` (`id`),
  ADD CONSTRAINT `CONTAIN_IMG_IMG_GALLERY1_FK` FOREIGN KEY (`id_IMG_GALLERY`) REFERENCES `img_gallery` (`id`);

--
-- Contraintes pour la table `gallery_items`
--
ALTER TABLE `gallery_items`
  ADD CONSTRAINT `GALLERY_ITEMS_IMG_GALLERY0_FK` FOREIGN KEY (`id`) REFERENCES `img_gallery` (`id`);

--
-- Contraintes pour la table `img_gallery`
--
ALTER TABLE `img_gallery`
  ADD CONSTRAINT `IMG_GALLERY_GALLERY_ITEMS0_FK` FOREIGN KEY (`idGalleryItem`) REFERENCES `gallery_items` (`idGalleryItem`);

--
-- Contraintes pour la table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `SKILLS_SKILLS_CAT0_FK` FOREIGN KEY (`idSkillsCat`) REFERENCES `skills_cat` (`idSkillsCat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
