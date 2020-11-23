-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 23 nov. 2020 à 16:34
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `livreor`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_utilisateur`, `date`) VALUES
(1, 'Bisous mes loulous ! Superbe mariage ! Des bisouuuus avec papi Michel on vous aimes fort !! - Tati Jacquie', 3, '2020-11-23 10:48:28'),
(3, 'Voila les beau gosses ! Plus que le minot maintenant eh ! Allez la bise - Tonton Bruno ( PS: le meilleur xD)', 4, '2020-11-23 10:50:34'),
(4, 'Wow les beau gosses ! Une tuerie ce mariage je m&#039;en remet toujours pas ! Bref vous Ã©tiez vraiment beau vous deux insh y&#039;a le bÃ©bÃ© qui suit eh ! Bisous', 6, '2020-11-23 11:00:27'),
(5, 'Mes amours ! DES B-O-M-B-E-S !! Je vous kiffs trop du bonheur a fond !! Et surtout un petit bÃ©bÃ© Ã§a serait sympasthique je veut bien Ãªtre tata - Nana ', 7, '2020-11-23 11:05:33'),
(6, 'Beau mariage, bonne ambiance, manquÃ© un peu d&#039;animation, Ã  mon Ã©poque on allait jeter la mariÃ©e dans l\'etang lol ! Bisous - Bernard le vioc adorÃ© !', 8, '2020-11-23 11:07:35'),
(7, 'Trooop beau ! De vrais tourteraux , le gÃ¢teau Ã©tait superbe ! Encore fÃ©licitation aux mariÃ©s ! - Grand mÃ¨re Marie Antoinette.', 5, '2020-11-23 16:14:08'),
(8, 'Superbe mariage ! J&#039;Ã©tais aux anges, vivement le mien !! &lt;3 - Nina (PS : LaPlusBelle)', 9, '2020-11-23 16:25:30'),
(9, 'Je vous aime fort ! &lt;3&lt;3&lt;3', 9, '2020-11-23 16:33:16');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'admin', 'root'),
(2, 'WylsTix', 'admins'),
(3, 'Jacquie', 'chouqette'),
(4, 'Bruno', 'gamer42'),
(5, 'Marie Antoinette', 'poussinamour'),
(6, 'Kevin', 'kevinlebg'),
(7, 'Anastasia', 'fripouillelove'),
(8, 'Bernard69', 'pasage'),
(9, 'Nina', 'caramel89');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
