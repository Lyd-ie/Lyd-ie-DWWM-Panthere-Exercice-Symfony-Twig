-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 03 août 2023 à 14:09
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_name`
--

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230803071520', '2023-08-03 09:10:26', 115);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `position`
--

DROP TABLE IF EXISTS `position`;
CREATE TABLE IF NOT EXISTS `position` (
  `id` int NOT NULL AUTO_INCREMENT,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `position`
--

INSERT INTO `position` (`id`, `label`) VALUES
(1, 'Gérant'),
(2, 'Lead dev'),
(3, 'Comptabilité'),
(4, 'Commercial'),
(5, 'Dev'),
(6, 'UI/UX'),
(7, 'Testeur stagiaire');

-- --------------------------------------------------------

--
-- Structure de la table `position_team`
--

DROP TABLE IF EXISTS `position_team`;
CREATE TABLE IF NOT EXISTS `position_team` (
  `position_id` int NOT NULL,
  `team_id` int NOT NULL,
  PRIMARY KEY (`position_id`,`team_id`),
  KEY `IDX_D7788841DD842E46` (`position_id`),
  KEY `IDX_D7788841296CD8AE` (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `position_team`
--

INSERT INTO `position_team` (`position_id`, `team_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(5, 6),
(6, 7),
(7, 8);

-- --------------------------------------------------------

--
-- Structure de la table `team`
--

DROP TABLE IF EXISTS `team`;
CREATE TABLE IF NOT EXISTS `team` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `superieur` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `team`
--

INSERT INTO `team` (`id`, `firstname`, `lastname`, `age`, `adresse`, `tel`, `mail`, `photo`, `cv`, `superieur`) VALUES
(1, 'Paul', 'Stone', '55 ans', '123 Rue du Sommet', '+33 6 12 34 56 78', 'paul.stone@toto.com', 'stone-paul', 'stone-paul', NULL),
(2, 'Paul', 'Martin', '39 ans', '1010 Rue de la Rose', '+33 6 11 22 33 44', 'paul.martin@toto.com', 'martin-paul', 'martin-paul', 1),
(3, 'Martine', 'Duck', '47 ans', '789 Chemin du Moulin', '+33 6 55 44 33 22', ' martine.duck@toto.com', 'duck-martine', 'duck-martine', 1),
(4, 'Sylvie', 'Durand', '42 ans', '456 Avenue des Lilas', '+33 6 98 76 54 32', 'sylvie.durand@toto.com', 'durand-sylvie', 'durand-sylvie', 1),
(5, 'Justine', 'Dupont', '28 ans', '222 Place de l\'Église', '+33 6 66 77 88 99', 'justine.dupont@toto.com', 'dupont-justine', 'dupont-justine', 2),
(6, 'Arthur', 'Vincent', '31 ans', '33 Boulevard du Parc', '+33 6 44 55 66 77', 'arthur.vincent@toto.com', 'vincent-arthur', 'vincent-arthur', 2),
(7, 'John', 'Deer', '35 ans', '444 Rue du Chêne', '+33 6 88 99 00 11', 'john.deer@toto.com', 'deer-john', 'deer-john', 2),
(8, 'Charly', 'Goose', '21 ans', '555 Rue des Étoiles', '+33 6 33 22 11 00', 'charly.goose@toto.com', 'goose-charly', 'goose-charly', 5);

-- --------------------------------------------------------

--
-- Structure de la table `team_team`
--

DROP TABLE IF EXISTS `team_team`;
CREATE TABLE IF NOT EXISTS `team_team` (
  `team_source` int NOT NULL,
  `team_target` int NOT NULL,
  PRIMARY KEY (`team_source`,`team_target`),
  KEY `IDX_15015264299138AA` (`team_source`),
  KEY `IDX_1501526430746825` (`team_target`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `team_team`
--

INSERT INTO `team_team` (`team_source`, `team_target`) VALUES
(1, 2),
(1, 3),
(1, 4),
(2, 5),
(2, 6),
(2, 7),
(5, 8);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `position_team`
--
ALTER TABLE `position_team`
  ADD CONSTRAINT `FK_D7788841296CD8AE` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_D7788841DD842E46` FOREIGN KEY (`position_id`) REFERENCES `position` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `team_team`
--
ALTER TABLE `team_team`
  ADD CONSTRAINT `FK_15015264299138AA` FOREIGN KEY (`team_source`) REFERENCES `team` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_1501526430746825` FOREIGN KEY (`team_target`) REFERENCES `team` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
