-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 30 juin 2020 à 14:18
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `newgestionvols`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `idClient` int(11) NOT NULL,
  `Nom` varchar(200) NOT NULL,
  `Prenom` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `CIN` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idClient`, `Nom`, `Prenom`, `Email`, `tel`, `CIN`) VALUES
(1, 'tarek', 'mobariki', 'moubariki@gmail.com', 'SH6667', '0697546508'),
(2, 'simo', 'donor', 'simo@gmail.com', 'BH555', '0616825191'),
(3, 'moubariki', 'tarik', 'moubariki@gmail.com', 'HHH7777', '0616825191'),
(15, 'moubariki', 'tarik', 'moubariki.tarik@gmail.com', '123456', '0606778389'),
(16, 'moubariki', 'tarik', 'moubariki.tarik@gmail.com', '123456', '0606778389'),
(17, 'Tarek', 'mb', 'moubariki@gmail.com', '579808', '060607080'),
(18, 'mb', 'tr', 'mb@hotmail.fr', '2345', '2345678'),
(19, 'tarek', 'tm', 'mb@hotmail.fr', '2345', '060607080'),
(20, 'mohamed', 'mh', 'mh@hotmail.fr', '123455', '1356765778');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `idreservation` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idVol` int(11) NOT NULL,
  `date_reseravtion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`idreservation`, `idClient`, `iduser`, `idVol`, `date_reseravtion`) VALUES
(21, 16, 2, 1, '2020-06-28 02:48:11'),
(22, 17, 2, 1, '2020-06-28 04:41:07'),
(23, 18, 2, 1, '2020-06-28 04:43:51'),
(24, 19, 2, 1, '2020-06-28 05:22:19'),
(25, 20, 2, 2, '2020-06-30 11:49:39');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `iduser` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `pass_word` varchar(50) NOT NULL,
  `statu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`iduser`, `username`, `mail`, `pass_word`, `statu`) VALUES
(2, 'ahmed', 'ahmed@gmail.com', 'azerty', 'User'),
(3, 'moubariki', 'moubariki@gmail.com', '123456', 'Admin'),
(4, 'TAREK', 'TAREK@gmail.com', '123456', 'Admin'),
(27, 'TOTO', 'toto@gmail.com', 'azert', 'User'),
(28, 'kamkoum', 'kamkoum@gmail', '123456', 'User'),
(29, 'test', 'test@gmail.com', '123456', 'User'),
(30, 'kamkoum', '', '123456', 'User'),
(31, 'test', 'test@gmail.com', '123456', 'User'),
(32, 'simo', 'simo@hotmail.fr', 'azerty', 'User'),
(33, 'abdo', 'abdo@hotmail.fr', 'azerty', 'User');

-- --------------------------------------------------------

--
-- Structure de la table `vols`
--

CREATE TABLE `vols` (
  `idVol` int(11) NOT NULL,
  `depart` varchar(200) NOT NULL,
  `destination` varchar(200) NOT NULL,
  `date_depart` date NOT NULL,
  `time` time NOT NULL,
  `prix` float NOT NULL,
  `place_disponible` int(11) NOT NULL,
  `statu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vols`
--

INSERT INTO `vols` (`idVol`, `depart`, `destination`, `date_depart`, `time`, `prix`, `place_disponible`, `statu`) VALUES
(1, 'Safi', 'Casablanca', '2020-05-28', '12:00:00', 100, 0, 'Activer'),
(2, 'Agadir', 'Fes', '2020-05-26', '10:30:00', 100, 19, 'Activer'),
(3, 'Agadir', 'Fes', '2020-06-18', '17:30:00', 200, 10, 'Desactiver'),
(4, 'Fes', 'Marrakech', '2020-06-18', '17:30:00', 2000, 100, 'Activer'),
(16, 'Tanger', 'Marrakech', '2020-06-26', '00:00:19', 2000, 24, 'Activer'),
(17, 'safi', 'marrakech', '2020-06-10', '00:00:16', 400, 10, 'Activer');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idClient`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`idreservation`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`);

--
-- Index pour la table `vols`
--
ALTER TABLE `vols`
  ADD PRIMARY KEY (`idVol`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `idreservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `vols`
--
ALTER TABLE `vols`
  MODIFY `idVol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
