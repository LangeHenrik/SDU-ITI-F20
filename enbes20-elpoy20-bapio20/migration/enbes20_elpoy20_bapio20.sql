-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 02 mars 2020 à 05:21
-- Version du serveur :  8.0.19
-- Version de PHP : 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `enbes20_elpoy20_bapio20`
--

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int NOT NULL,
  `image` longblob NOT NULL,
  `created` datetime NOT NULL,
  `user_id` int NOT NULL
);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
);

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`) VALUES
(2, 'enzobes2', '$2y$10$fvTS7rsqSdDgqTMS/pCCAObC13Dx1FoQN3aFuZvBrXb/bjci50vba', 'enzobes@me.com'),
(3, 'test3', '$2y$10$uJ5kdIrkxp6PSFKpzr5qleTyZ.uf/roT2shQaNmn8Ut7phdPtZ2qm', 'enz@e.com'),
(4, 'Ezno', '$2y$10$h1O/YCCq6Bsob9JVSnv.i.H0ebRTyMPMHFXiydNrEG3YuNqAFaFfe', 'en@me.com'),
(5, 'enzobes', '$2y$10$uW7/X3eZhCXAIG9aMA9QZ.p3QeS1ziOvO8E0QJZz3HbXwMrNxmpvO', 'enzobes@hotmail.fr');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
