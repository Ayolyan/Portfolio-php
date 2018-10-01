-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 01 oct. 2018 à 21:04
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
  KEY `CONTAIN_GITEM_GALLERY_CAT0_FK` (`idGalCat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contain_gitem`
--

INSERT INTO `contain_gitem` (`idGalleryItem`, `idGalCat`) VALUES
(3, 1),
(4, 1),
(1, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `gallery_cat`
--

DROP TABLE IF EXISTS `gallery_cat`;
CREATE TABLE IF NOT EXISTS `gallery_cat` (
  `idGalCat` int(11) NOT NULL AUTO_INCREMENT,
  `galCatName` varchar(50) NOT NULL,
  PRIMARY KEY (`idGalCat`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gallery_cat`
--

INSERT INTO `gallery_cat` (`idGalCat`, `galCatName`) VALUES
(1, 'Infographie'),
(2, 'Programmation'),
(3, 'Audio'),
(4, 'Vidéo');

-- --------------------------------------------------------

--
-- Structure de la table `gallery_item`
--

DROP TABLE IF EXISTS `gallery_item`;
CREATE TABLE IF NOT EXISTS `gallery_item` (
  `idGalleryItem` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `mainImgLink` varchar(250) NOT NULL,
  `miniatureImgLink` varchar(250) NOT NULL,
  `creationDate` date NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`idGalleryItem`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gallery_item`
--

INSERT INTO `gallery_item` (`idGalleryItem`, `name`, `mainImgLink`, `miniatureImgLink`, `creationDate`, `description`) VALUES
(1, 'Filyso', '/images/gallery/mainImg/filyso.png', '/images/gallery/miniatureImg/filyso.png', '2018-06-01', 'Filyso est un site web proposant des jeux autour des paroles de chansons.'),
(2, 'Nuit de l\'info 2017', '/images/gallery/mainImg/nuit_de_linfo_2017.jpg', 'images/gallery/miniatureImg/nuit_de_linfo_2017.png', '2017-12-07', 'Les folles aventures de Papalpaga sont le fruit de 15h30 de travail en Ã©quipe durant lesquels le projet a Ã©tÃ© rÃ©alisÃ© de A Ã  Z.'),
(3, 'Article de presse : \"Live-streaming\"', '/images/gallery/mainImg/article_de_presse_live_streaming.png', '/images/gallery/miniatureImg/article_de_presse_live_streaming.png', '2018-05-15', 'Article de presse rÃ©alisÃ© dans le cadre de cours de communication couplÃ© Ã  des cours de mise en page.'),
(4, 'Datavisualisation : \"Hellfest 2017\"', '/images/gallery/mainImg/datavisualisation_hellfest.png', '/images/gallery/miniatureImg/datavisualisation_hellfest.png', '2018-05-01', 'J\'ai souhaitÃ© rÃ©aliser une data-visualisation sur le thÃ¨me du Hellfest 2017. Pour cela j\'ai repris les couleurs utilisÃ©es lors de cette Ã©dition sur les affiches et diffÃ©rents produits dÃ©rivÃ©s. Ainsi on retrouve le jaune et le noir en tant que couleurs principales. On retrouve Ã©galement dans cette data-visualisation de nombreuses rÃ©fÃ©rences musicales (chanteurs, guitare Ã©lectrique, batterie, baguettes de batterie, mÃ©diator). J\'y ai aussi intÃ©grÃ© les fameuses \'Hell hands\' et une biÃ¨re, deux symboles qu\'on pourrait qualifier de reprÃ©sentatifs du Hellfest.');

-- --------------------------------------------------------

--
-- Structure de la table `img`
--

DROP TABLE IF EXISTS `img`;
CREATE TABLE IF NOT EXISTS `img` (
  `idImg` int(11) NOT NULL AUTO_INCREMENT,
  `imgLink` varchar(256) NOT NULL,
  `idGalleryItem` int(11) NOT NULL,
  PRIMARY KEY (`idImg`),
  KEY `IMG_GALLERY_ITEMS_FK` (`idGalleryItem`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `img`
--

INSERT INTO `img` (`idImg`, `imgLink`, `idGalleryItem`) VALUES
(1, '/images/gallery/illustration/filyso/filyso_0', 1),
(2, '/images/gallery/illustration/filyso/filyso_1', 1),
(3, '/images/gallery/illustration/filyso/filyso_2', 1);

-- --------------------------------------------------------

--
-- Structure de la table `link`
--

DROP TABLE IF EXISTS `link`;
CREATE TABLE IF NOT EXISTS `link` (
  `idLink` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `link` varchar(250) NOT NULL,
  `iconLink` varchar(250) DEFAULT NULL,
  `idGalleryItem` int(11) NOT NULL,
  PRIMARY KEY (`idLink`),
  KEY `LINK_GALLERY_ITEMS_FK` (`idGalleryItem`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `link`
--

INSERT INTO `link` (`idLink`, `name`, `link`, `iconLink`, `idGalleryItem`) VALUES
(1, 'Github', 'https://github.com/Filyso/Sprint-2', NULL, 1),
(2, 'Filyso', 'https://projets.iut-laval.univ-lemans.fr/17mmi1pj02/php/', NULL, 1);

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
  KEY `SKILLS_SKILLS_CAT_FK` (`idSkillsCat`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `skills`
--

INSERT INTO `skills` (`idSkill`, `skillName`, `skillSvgLink`, `skillProgress`, `idSkillsCat`) VALUES
(1, 'HTML5', '', 80, 1),
(2, 'CSS3', '', 80, 1),
(3, 'PHP', '', 60, 1),
(4, 'Anglais', '', 70, 2),
(5, 'Allemand', '', 30, 2),
(6, 'Java', '', 50, 1),
(7, 'Permis de conduire B', '/images/skills/carIcon.svg', NULL, 3);

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
  ADD CONSTRAINT `CONTAIN_GITEM_GALLERY_CAT0_FK` FOREIGN KEY (`idGalCat`) REFERENCES `gallery_cat` (`idGalCat`),
  ADD CONSTRAINT `CONTAIN_GITEM_GALLERY_ITEMS_FK` FOREIGN KEY (`idGalleryItem`) REFERENCES `gallery_item` (`idGalleryItem`);

--
-- Contraintes pour la table `img`
--
ALTER TABLE `img`
  ADD CONSTRAINT `IMG_GALLERY_ITEMS_FK` FOREIGN KEY (`idGalleryItem`) REFERENCES `gallery_item` (`idGalleryItem`);

--
-- Contraintes pour la table `link`
--
ALTER TABLE `link`
  ADD CONSTRAINT `LINK_GALLERY_ITEMS_FK` FOREIGN KEY (`idGalleryItem`) REFERENCES `gallery_item` (`idGalleryItem`);

--
-- Contraintes pour la table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `SKILLS_SKILLS_CAT_FK` FOREIGN KEY (`idSkillsCat`) REFERENCES `skills_cat` (`idSkillsCat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
