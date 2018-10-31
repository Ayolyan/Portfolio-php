-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mer. 31 oct. 2018 à 17:13
-- Version du serveur :  10.0.36-MariaDB-0+deb8u1
-- Version de PHP :  7.1.14

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

CREATE TABLE `chinese_portrait_items` (
  `idCPItem` int(11) NOT NULL,
  `CPItemSvgLink` varchar(50) NOT NULL,
  `leftText` text NOT NULL,
  `rightText` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `contain_gitem` (
  `idGalleryItem` int(11) NOT NULL,
  `idGalCat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contain_gitem`
--

INSERT INTO `contain_gitem` (`idGalleryItem`, `idGalCat`) VALUES
(1, 2),
(2, 2),
(3, 1),
(4, 1),
(5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `gallery_cat`
--

CREATE TABLE `gallery_cat` (
  `idGalCat` int(11) NOT NULL,
  `galCatName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `gallery_item` (
  `idGalleryItem` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mainImgLink` varchar(250) NOT NULL,
  `miniatureImgLink` varchar(250) NOT NULL,
  `creationDate` date NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gallery_item`
--

INSERT INTO `gallery_item` (`idGalleryItem`, `name`, `mainImgLink`, `miniatureImgLink`, `creationDate`, `description`) VALUES
(1, 'Filyso', '/images/gallery/mainImg/filyso.png', '/images/gallery/miniatureImg/filyso.png', '2018-06-01', 'Filyso est un site web proposant des jeux autour des paroles de chansons.'),
(2, 'Nuit de l\'info 2017', '/images/gallery/mainImg/nuit_de_linfo_2017.jpg', 'images/gallery/miniatureImg/nuit_de_linfo_2017.png', '2017-12-07', '\"Les folles aventures de Papalpaga\" sont le fruit de 15 heures 30 minutes de travail en équipe pendant lesquelles le projet a été réalisé de A à Z.'),
(3, 'Article de presse : \"Live-streaming\"', '/images/gallery/mainImg/article_de_presse_live_streaming.jpg', '/images/gallery/miniatureImg/article_de_presse_live_streaming.png', '2018-05-15', 'Article de presse réalisé dans le cadre de cours de communication couplés à des cours de mise en page.'),
(4, 'Datavisualisation : \"Hellfest 2017\"', '/images/gallery/mainImg/datavisualisation_hellfest.png', '/images/gallery/miniatureImg/datavisualisation_hellfest.png', '2018-05-01', 'Dans le cadre de cours sur la data-visualisation, j\'ai souhaité en réaliser une sur le thème du Hellfest 2017.\r\nPour cela j\'ai repris les couleurs utilisées lors de cette édition sur les affiches et différents produits dérivés. Ainsi on retrouve le jaune et le noir en tant que couleurs principales. On retrouve également dans cette data-visualisation de nombreuses références musicales (chanteurs, guitare électrique, batterie, baguettes de batterie, médiator). J\'y ai aussi intégré les fameuses \'Hell hands\' et une bière, deux symboles qu\'on pourrait qualifier de représentatifs du Hellfest.'),
(5, 'Dessin vectoriel : Chambre d\'enfant', '/images/gallery/mainImg/dessin_vectoriel_chambre_d_enfant.png', '/images/gallery/miniatureImg/dessin_vectoriel_chambre_d_enfant.png', '2018-01-15', 'Cette chambre d\'enfant a été réalisé dans le but d\'être intégré dans un jeu, c\'est pourquoi j\'ai opté pour un dessin en isométrique car il est très facile avec cette perspective de déplacer des objets dans l\'espace.</br> \r\n</br>\r\nLa chambre que j\'ai réalisée possède des meubles en bois. J\'ai utilisé des murs orange, car c\'est une couleur qui reflète le caractère énergique des enfants. J\'ai également utilisé le bleu, sa couleur complémentaire, pour mettre en avant certain élément.</br>\r\n</br>\r\nLa principale difficulté a été de garder une taille de chambre raisonnable en incorporant tous les éléments demandés. Cette difficulté a été renforcée par le fait que les éléments se superposent très rapidement en isométrique.');

-- --------------------------------------------------------

--
-- Structure de la table `img`
--

CREATE TABLE `img` (
  `idImg` int(11) NOT NULL,
  `imgLink` varchar(256) NOT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `idGalleryItem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `img`
--

INSERT INTO `img` (`idImg`, `imgLink`, `alt`, `idGalleryItem`) VALUES
(1, '/images/gallery/illustration/filyso/filyso_0.png', 'Page d\'accueil Filyso', 1),
(2, '/images/gallery/illustration/filyso/filyso_1.png', 'Page d\'inscription et menu principal de Filyso', 1),
(3, '/images/gallery/illustration/filyso/filyso_2.png', 'Classement Filyso', 1),
(4, '/images/gallery/illustration/article_de_presse_live_streaming/article_live_streaming_0.jpg', 'Première de couverture : article sur le live streaming', 3),
(5, '/images/gallery/illustration/article_de_presse_live_streaming/article_live_streaming_1.jpg', 'Contenu : article sur le live streaming', 3),
(6, '/images/gallery/illustration/article_de_presse_live_streaming/article_live_streaming_2.jpg', 'Quatrième de couverture : article sur le live streaming', 3),
(7, '/images/gallery/illustration/dessin_vectoriel_chambre_d_enfant/dessin_vectoriel_chambre_d_enfant_0.png', 'Chambre d\'enfant - Dessin vectoriel', 5);

-- --------------------------------------------------------

--
-- Structure de la table `link`
--

CREATE TABLE `link` (
  `idLink` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(250) NOT NULL,
  `iconLink` varchar(250) DEFAULT NULL,
  `idGalleryItem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `link`
--

INSERT INTO `link` (`idLink`, `name`, `link`, `iconLink`, `idGalleryItem`) VALUES
(1, 'Github', 'https://github.com/Filyso/Sprint-2', NULL, 1),
(2, 'Filyso', 'https://projets.iut-laval.univ-lemans.fr/17mmi1pj02/php/', NULL, 1),
(3, 'PDF - Article Live Streaming', '/pdf/gallery/article_de_presse_live_streaming/article_de_presse_live_streaming.pdf', NULL, 3),
(4, 'PDF - Article Live Streaming - Tramé', '/pdf/gallery/article_de_presse_live_streaming/article_de_presse_live_streaming_trame.pdf', NULL, 3);

-- --------------------------------------------------------

--
-- Structure de la table `skills`
--

CREATE TABLE `skills` (
  `idSkill` int(11) NOT NULL,
  `skillName` varchar(50) NOT NULL,
  `skillSvgLink` varchar(250) NOT NULL,
  `skillProgress` tinyint(4) DEFAULT NULL,
  `idSkillsCat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `skills_cat` (
  `idSkillsCat` int(11) NOT NULL,
  `skillsCatName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `status` enum('admin','user') NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `pwd` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `status`, `pseudo`, `pwd`) VALUES
(1, 'bidet', 'yoan', 'admin', 'ayolyan', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chinese_portrait_items`
--
ALTER TABLE `chinese_portrait_items`
  ADD PRIMARY KEY (`idCPItem`);

--
-- Index pour la table `contain_gitem`
--
ALTER TABLE `contain_gitem`
  ADD PRIMARY KEY (`idGalleryItem`,`idGalCat`),
  ADD KEY `CONTAIN_GITEM_GALLERY_CAT0_FK` (`idGalCat`);

--
-- Index pour la table `gallery_cat`
--
ALTER TABLE `gallery_cat`
  ADD PRIMARY KEY (`idGalCat`);

--
-- Index pour la table `gallery_item`
--
ALTER TABLE `gallery_item`
  ADD PRIMARY KEY (`idGalleryItem`);

--
-- Index pour la table `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`idImg`),
  ADD KEY `IMG_GALLERY_ITEMS_FK` (`idGalleryItem`);

--
-- Index pour la table `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`idLink`),
  ADD KEY `LINK_GALLERY_ITEMS_FK` (`idGalleryItem`);

--
-- Index pour la table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`idSkill`),
  ADD KEY `SKILLS_SKILLS_CAT_FK` (`idSkillsCat`);

--
-- Index pour la table `skills_cat`
--
ALTER TABLE `skills_cat`
  ADD PRIMARY KEY (`idSkillsCat`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chinese_portrait_items`
--
ALTER TABLE `chinese_portrait_items`
  MODIFY `idCPItem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `gallery_cat`
--
ALTER TABLE `gallery_cat`
  MODIFY `idGalCat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `gallery_item`
--
ALTER TABLE `gallery_item`
  MODIFY `idGalleryItem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `img`
--
ALTER TABLE `img`
  MODIFY `idImg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `link`
--
ALTER TABLE `link`
  MODIFY `idLink` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `skills`
--
ALTER TABLE `skills`
  MODIFY `idSkill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `skills_cat`
--
ALTER TABLE `skills_cat`
  MODIFY `idSkillsCat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
