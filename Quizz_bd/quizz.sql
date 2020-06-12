-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  ven. 12 juin 2020 à 02:00
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `quizz`
--

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `Libelle` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `reponsePossible` varchar(200) NOT NULL,
  `bonneReponse` varchar(200) NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`question_id`, `Libelle`, `score`, `Type`, `reponsePossible`, `bonneReponse`) VALUES
(3, 'Question au hasard', 5, 'multiple', 'reponse une,faux,Senegal', 'reponse une,Senegal'),
(4, 'something', 15, 'simple', 'first one, second one, one', 'one'),
(5, 'azerty', 25, 'simple', 'azerty,qsdfghj,wxcvbn', 'azerty'),
(6, 'enez', 35, 'text', 'Array', 'erfg'),
(8, 'zef', 14, 'multiple', 'Bonne,faux', 'Bonne'),
(9, 'zef', 14, 'multiple', 'Bonne,faux', 'Bonne'),
(22, 'test with new machine', 54, 'multiple', 'bonne reponse,mauvaise reponse', 'bonne reponse'),
(23, 'Qui a organise le world cup 2010', 14, 'simple', 'Sud Afrique,Brazil,Qatar', 'Sud Afrique');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `profil` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `avatar` varchar(50) NOT NULL,
  `score` int(11) DEFAULT NULL,
  `statut` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `prenom`, `nom`, `login`, `profil`, `password`, `avatar`, `score`, `statut`) VALUES
(1, 'Wane', 'Wane', 'wane', 'admin', 'wane', '20200528145848.jpg', 0, 0),
(2, 'Abdou', 'Diallo', 'admin', 'admin', 'admin', '', 0, 0),
(3, 'Wane', 'Wane', 'wane', 'admin', 'wane', '20200528145848.jpg', 0, 0),
(4, 'Someonne', 'Someonne', 'Someonne', 'admin', '1234', '', NULL, 0),
(5, 'sdfg', 'zer', 'qsdfghjk', 'admin', '1234', '20200602220435.jpg', NULL, 0),
(6, 'Abdou', 'poiuytr', 'pourtoujr', 'joueur', '1234', '20200602224158.jpg', 0, 1),
(7, 'Abdou', 'Diop', 'lilll', 'admin', '147', '', NULL, 0),
(8, 'Abdou', 'Diop', 'mpl', 'admin', 'azerty', '', NULL, 0),
(9, 'azer', 'qsdfg', 'sdfghjk', 'admin', '1234', '', NULL, 0),
(11, 'Mohamed', 'Rassoul', 'mlgrfghj,;', 'joueur', '1234', '', 0, 1),
(12, 'king', 'Dou', 'xcfghuiopkjhbvbn', 'joueur', '1234', '', 0, 1),
(13, 'abdu karim', 'niang', 'bgtnhy', 'joueur', '1234', '', 0, 0),
(14, 'qwerty', 'qwerty', 'qwerty', 'admin', 'qwerty', '', NULL, 0),
(39, 'Lil', 'Dou', 'lil', 'joueur', '1234', '', 0, 0),
(40, 'Gamer', 'Gamer', 'Gamer', 'joueur', 'Gamer', '', 0, 0),
(41, 'king', 'king', 'king', 'joueur', 'king', '', 0, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
