-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 06 mai 2024 à 05:26
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `todo_list`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_category`, `name_category`) VALUES
(1, 'Ecole'),
(2, 'Travail'),
(3, 'Famille');

-- --------------------------------------------------------

--
-- Structure de la table `task`
--

CREATE TABLE `task` (
  `id_task` int(11) NOT NULL,
  `name_task` varchar(20) DEFAULT NULL,
  `hour` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `fait` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `task`
--

INSERT INTO `task` (`id_task`, `name_task`, `hour`, `description`, `id_user`, `id_category`, `fait`) VALUES
(2, 'hjsdg', '2024-01-10', '2024-01-10 20:20:35', 1, 2, 0),
(4, ' qwe ', '0000-00-00', ' je tai eu', 1, 2, 0),
(5, ' qwe', '0000-00-00', ' 2', 1, 2, 1),
(6, ' 564kljhg', '0000-00-00', ' 56m,', 1, 3, 1),
(8, 'Aller a lecole', '2024-01-10', '5', 1, 1, 1),
(9, ' ertfgujhfn,s ,fv', '2024-04-07', ' serdtfghj', 1, 2, 1),
(11, 'f', '2024-01-10', '5', 1, 2, 1),
(13, 'SD', '2024-01-10', 'DS', 1, 3, 0),
(14, 'FFSD', '2024-01-10', 'DSF', 1, 1, 0),
(15, 'fsdg', '2024-01-10', 'la vie est belle', 1, 1, 0),
(16, 'voiture', '2024-01-10', 'la voiture de mama', 1, 2, 0),
(17, 'bbbbbbb', '2024-01-10', 'bbbbbbbbb', 1, 1, 0),
(20, 'live', '2024-03-26', 'tazou', 2, 1, 0),
(21, 'jhihd', '2024-03-26', 'sjhsd', 2, 1, 0),
(22, 'tache', '2024-03-26', 'la tache', 2, 1, 0),
(42, 'm,jnkhb', '2024-04-13', 'nmb', 2, 1, 0),
(43, ' ,mn', '2024-04-13', ',.mn', 2, 1, 0),
(44, 'kljhd', '2024-04-13', 'djklh', 2, 1, 0),
(45, 'la veux', '2024-04-04', 'tay', 2, 1, 0),
(46, ' qwe uhui9ojl', '2024-04-16', ' kn lj bl-j -kj jk ', 1, 2, 1),
(53, 'jdhsbbdb', '2024-04-27', 'jsdhsdbkj', 4, 1, 0),
(54, '    sdnsk ', '2024-04-13', '    smd dskj s', 4, 1, 0),
(55, ' j', '2024-04-27', ' h k  k jk k ,n jk jjk h hh', 4, 1, 0),
(56, '111111111', '0000-00-00', '111111111111', 1, 2, 1),
(57, 'uigzyer', '2024-04-21', 'ohiguxrzt', 4, 2, 0),
(60, 'jhbbbbbbbbbbbbbbbbbb', '2024-04-19', 'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbj,', 1, 1, 0),
(61, ' Teste', '2024-04-19', '    Je teste mon appication    Je teste mon appication    Je teste mon appication    Je teste mon appication gh', 5, 1, 0),
(63, ' Autre teste', '2024-04-16', '    Je teste mon appication   Je teste mon appication   Je teste mon appication', 5, 2, 1),
(64, '   Encore teste', '2024-04-19', '      Encore autre testJe teste mon appication   Je teste mon appication   Je teste mon appication', 5, 3, 0),
(65, 'ORdinateur', '2024-04-15', 'duzcjchc l a vie est bele ', 5, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name_user` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `name_user`, `email`, `password`) VALUES
(1, 'root', 'root@gmail.com ', 'rootroot'),
(2, 'ronald', 'jjero@gmail.com ', 'ronald20032004'),
(3, 'kuate', 'tegloic007@gmail.com ', 'tegsd007'),
(4, 'tata', 'tata@gmail.com ', 'tatatata'),
(5, 'Teste', 'teste@gmail.com ', 'testeteste');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Index pour la table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id_task`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `task`
--
ALTER TABLE `task`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`) ON UPDATE CASCADE,
  ADD CONSTRAINT `task_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
