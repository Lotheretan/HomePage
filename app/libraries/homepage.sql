-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2017 at 08:44 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homepage`
--

-- --------------------------------------------------------

--
-- Table structure for table `etablissement`
--

CREATE TABLE `etablissement` (
  `id` int(11) NOT NULL,
  `fondEcran` varchar(255) DEFAULT NULL,
  `couleur` varchar(10) DEFAULT NULL,
  `ordre` varchar(255) DEFAULT NULL,
  `options` varchar(255) DEFAULT NULL,
  `idMoteur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `etablissement`
--

INSERT INTO `etablissement` (`id`, `fondEcran`, `couleur`, `ordre`, `options`, `idMoteur`) VALUES
(1, NULL, '#FFFFF', '1,2,3,4', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lienweb`
--

CREATE TABLE `lienweb` (
  `id` int(11) NOT NULL,
  `libelle` varchar(150) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `ordre` int(11) DEFAULT NULL,
  `idSite` int(11) DEFAULT NULL,
  `idEtablissement` int(11) DEFAULT NULL,
  `idUtilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lienweb`
--

INSERT INTO `lienweb` (`id`, `libelle`, `url`, `ordre`, `idSite`, `idEtablissement`, `idUtilisateur`) VALUES
(2, 'google', 'google.com', 1, NULL, 1, 4),
(3, 'gmail', 'gmail.com', 2, NULL, 1, 4),
(5, 'gmail-com', 'gmail.com', 1, NULL, 1, 3),
(6, 'google-com', 'google.com', 1, NULL, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `moteur`
--

CREATE TABLE `moteur` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `code` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `moteur`
--

INSERT INTO `moteur` (`id`, `nom`, `code`) VALUES
(1, 'Google', 'https://www.google.fr/search?q='),
(2, 'Bing', 'https://www.bing.com/search?q=');

-- --------------------------------------------------------

--
-- Table structure for table `option`
--

CREATE TABLE `option` (
  `id` int(11) NOT NULL,
  `libelle` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `option`
--

INSERT INTO `option` (`id`, `libelle`) VALUES
(1, 'couleur'),
(2, 'Fond d\'écran'),
(3, 'Liens web établisement'),
(4, 'Liens web personnalisés');

-- --------------------------------------------------------

--
-- Table structure for table `reseau`
--

CREATE TABLE `reseau` (
  `id` int(11) NOT NULL,
  `ip` varchar(15) DEFAULT NULL,
  `idSite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reseau`
--

INSERT INTO `reseau` (`id`, `ip`, `idSite`) VALUES
(1, '86.24.79.135', 1);

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE `site` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `ecart` double DEFAULT NULL,
  `fondEcran` varchar(255) DEFAULT NULL,
  `couleur` varchar(10) DEFAULT NULL,
  `ordre` varchar(255) DEFAULT NULL,
  `options` varchar(255) DEFAULT NULL,
  `idMoteur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`id`, `nom`, `latitude`, `longitude`, `ecart`, `fondEcran`, `couleur`, `ordre`, `options`, `idMoteur`) VALUES
(1, 'Campus III Ifs', 49.148815, -0.353537, 0, '', '#ededed', '1,2,3,4', '', 1),
(5, 'campus II', 4, 4, 4, NULL, '#ededed', '2,1,3,4', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `statut`
--

CREATE TABLE `statut` (
  `id` int(11) NOT NULL,
  `libelle` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statut`
--

INSERT INTO `statut` (`id`, `libelle`) VALUES
(2, 'Administrateur de site'),
(3, 'Administrateur global'),
(4, 'Super administrateur'),
(1, 'Utilisateur');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `login` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `elementsMasques` varchar(255) DEFAULT NULL,
  `fondEcran` varchar(255) DEFAULT NULL,
  `couleur` varchar(10) DEFAULT NULL,
  `ordre` varchar(255) DEFAULT NULL,
  `idStatut` int(11) NOT NULL,
  `idSite` int(11) NOT NULL,
  `idMoteur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `password`, `elementsMasques`, `fondEcran`, `couleur`, `ordre`, `idStatut`, `idSite`, `idMoteur`) VALUES
(3, 'jcheron', '', NULL, NULL, NULL, NULL, 1, 1, NULL),
(4, 'erabillon', '123456', NULL, '/image/img.png', 'RED', NULL, 2, 5, 1),
(5, 'rprodhomme', '0000', NULL, '/image/img2.png', 'Blue', NULL, 1, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `etablissement`
--
ALTER TABLE `etablissement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idMoteur` (`idMoteur`);

--
-- Indexes for table `lienweb`
--
ALTER TABLE `lienweb`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `libelle_UNIQUE` (`libelle`),
  ADD KEY `fk_LienWeb_Site1_idx` (`idSite`),
  ADD KEY `fk_LienWeb_Etablissement1_idx` (`idEtablissement`),
  ADD KEY `fk_LienWeb_Utilisateur1_idx` (`idUtilisateur`);

--
-- Indexes for table `moteur`
--
ALTER TABLE `moteur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `option`
--
ALTER TABLE `option`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `libelle_UNIQUE` (`libelle`);

--
-- Indexes for table `reseau`
--
ALTER TABLE `reseau`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Reseau_Site1_idx` (`idSite`);

--
-- Indexes for table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom_UNIQUE` (`nom`),
  ADD KEY `idMoteur` (`idMoteur`);

--
-- Indexes for table `statut`
--
ALTER TABLE `statut`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `libelle_UNIQUE` (`libelle`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_UNIQUE` (`login`),
  ADD KEY `fk_Utilisateur_Statut_idx` (`idStatut`),
  ADD KEY `fk_Utilisateur_Site1_idx` (`idSite`),
  ADD KEY `idMoteur` (`idMoteur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `etablissement`
--
ALTER TABLE `etablissement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lienweb`
--
ALTER TABLE `lienweb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `moteur`
--
ALTER TABLE `moteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `option`
--
ALTER TABLE `option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reseau`
--
ALTER TABLE `reseau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `statut`
--
ALTER TABLE `statut`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `etablissement`
--
ALTER TABLE `etablissement`
  ADD CONSTRAINT `etablissement_ibfk_1` FOREIGN KEY (`idMoteur`) REFERENCES `moteur` (`id`);

--
-- Constraints for table `lienweb`
--
ALTER TABLE `lienweb`
  ADD CONSTRAINT `fk_LienWeb_Etablissement1` FOREIGN KEY (`idEtablissement`) REFERENCES `etablissement` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_LienWeb_Site1` FOREIGN KEY (`idSite`) REFERENCES `site` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_LienWeb_Utilisateur1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reseau`
--
ALTER TABLE `reseau`
  ADD CONSTRAINT `fk_Reseau_Site1` FOREIGN KEY (`idSite`) REFERENCES `site` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `site`
--
ALTER TABLE `site`
  ADD CONSTRAINT `site_ibfk_1` FOREIGN KEY (`idMoteur`) REFERENCES `moteur` (`id`);

--
-- Constraints for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_Utilisateur_Statut` FOREIGN KEY (`idStatut`) REFERENCES `statut` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`idMoteur`) REFERENCES `moteur` (`id`),
  ADD CONSTRAINT `utilisateur_ibfk_2` FOREIGN KEY (`idSite`) REFERENCES `site` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
