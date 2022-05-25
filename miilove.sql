-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 23 mai 2022 à 00:27
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `miilove`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `image`, `place`, `date`, `bio`) VALUES
(14, 'zpgon', 'Ryan Ez Zerqti PP.png', 'klnzegf', 'ok zfol', 'oinzdgof'),
(18, 'zetkhn', 'shyGangster.png', 'pon,zpen', '&poa,efn', 'knezrgok'),
(19, 'Vente de drogue', 'ultraAtlantide.png', 'oinbedfdig', 'eojthezij', 'ratio '),
(20, 'aerpgtjo&ozerhgn', 'free paco.png', 'ohiegfo', 'zhdfgoi²', 'jzrgiehnrg^rhitbe^fhioergoefgheigêigegeôgieôgiheg^nego^negohegioehgoehgehigiegh'),
(22, 'sbonezrgb', 'ninjaToutSeul.png', 'pnaefnzvn', 'zgnkzefn', 'nkzelsrbzerg'),
(23, 'QMPDINVZJBV', 'blue-desert.png', 'znzenesfobnez', 'aebqerb', 'POZEFBKJEZBV'),
(24, 'Gros Nibard', 'ultraAtlantide.png', 'Paris - Parmentier ', '01/01/2001', 'Joel dit gros nibard durant un live sur twitch. Ceci relfete la mysiginie de cet individue qu\'est Joel el eclatax'),
(25, 'enerGiai', 'CVRyanEzZerqti .png', 'Parc des Expositions de Montpellier', '7 & 8 décembre 2022', 'Rendez-vous incontournable sur le marché des EnR, EnerGaïa accompagne depuis 16 ans la filière des énergies renouvelables'),
(26, 'enerGiai ', 'energaia_logo_2050 (1).png', 'Parc des Expositions de Montpellier', '7 & 8 décembre 2022', 'Rendez-vous incontournable sur le marché des EnR, EnerGaïa accompagne depuis 16 ans la filière des énergies renouvelables');

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`id`, `nom`, `image`, `description`, `date`, `place`) VALUES
(8, 'ethopn', 'free paco.png', 'ieang', '&oiezrgn', '&oizgn'),
(10, 'aerhù^po,ezrg', 'banner.png', 'poengroienrgùergn', 'oaibzùrgolbz', 'oiibzùoubgù'),
(11, 'wsnorhonkijbsfoibnAKIJDFBKJ', 'Ryan Ez Zerqti PP.png', 'IJDSBFKJSBOI', 'OIBSFBOIZO', 'OIZVIODS'),
(12, 'aefbmonezfb qe', 'blue-desert-filter.png', 'lelakb lekafb kelafb zkleb aelbknaklEFblaebn alkefb nalekb aelbaebaelkbnalkebalkeb', 'enkblkerblkaebrn', 'eknbeaklrbzelk');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `militantCause` varchar(255) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `image4` varchar(255) NOT NULL,
  `image5` varchar(255) NOT NULL,
  `image6` varchar(255) NOT NULL,
  `subscription` varchar(255) NOT NULL DEFAULT 'normal',
  `work` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `age`, `city`, `mail`, `password`, `gender`, `militantCause`, `image1`, `image2`, `image3`, `image4`, `image5`, `image6`, `subscription`, `work`, `bio`, `role`) VALUES
(1, 'Paco', 'ElGuapo', '18', 'Konoha', 'pacoelguapo@gmail.com', '$2y$10$c7J0nowHOtUZD46M6jcK4OW/lezTpQbumT0fHqzJiFg8HuyBtyNx2', 'Homme', 'Cause animalière', 'blue-desert-filter.png', '', '', '', '', '', '12mois', 'chomeur', 'J\'aime les choses rondes, wola !', 'admin'),
(5, 'Ryan', 'EZZERQTI', '6666', 'PARIS 11', 'ryanezzerqti@gmail.com', '$2y$10$0roLWUsxCLfc53OWfn2zSuV0lMnCRo1XJgHuy9JevnexlH0M.pgVy', 'Homme', 'Cause animalière', 'ultraAtlantide.png', '', '', '', '', '', 'normal', '', '', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
