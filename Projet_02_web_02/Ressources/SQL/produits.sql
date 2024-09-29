-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2023 at 09:03 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ricasso`
--

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `categorie` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `prix` int(11) NOT NULL,
  `image` varchar(300) NOT NULL,
  `taille` int(11) DEFAULT 40
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `categorie`, `description`, `prix`, `image`, `taille`) VALUES
(1, 'Cravate grise', 'Cravate', '\r\nUne cravate grise élégante, subtile et polyvalente, idéale pour compléter un look professionnel ou sophistiqué.', 250, '../Ressources/Image/cravate1.png', 40),
(2, 'Cravate galactique', 'Cravate', '\r\nCravate galactique aux teintes cosmiques, mêlant nuances de bleu profond, violet et éclats argentés. Un accessoire interstellaire, captivant et futuriste.', 325, '../Ressources/Image/cravate2.png', 40),
(3, 'Cravate mauve', 'Cravate', '\r\nCravate mauve, raffinée et apaisante, fusion de douceur et d\'élégance. Parfaite pour une touche subtile de sophistication.', 100, '../Ressources/Image/cravate3.png', 40),
(4, 'Cravate cromatique', 'Cravate', 'Cravate chromatique éclatante, arborant une palette vive de couleurs vives. Un accessoire audacieux et vibrant, captivant le regard avec sa diversité chromatique.', 350, '../Ressources/Image/cravate4.png', 40),
(5, 'Chemise nirvana', 'Chemise', '\r\nChemise à l\'esprit Nirvana, décontractée et rebelle. Inspirée du grunge avec des nuances sombres, elle évoque l\'authenticité du mouvement musical emblématique.', 75, '../Ressources/Image/shirt1.png', 40),
(6, 'Chemise classique', 'Chemise', 'Chemise classique rose et vert, mariage harmonieux de tons doux et vifs. Élégante, elle allie tradition et modernité avec une touche de fraîcheur.', 150, '../Ressources/Image/shirt2.png', 40),
(7, 'Chemise hawaienne', 'Chemise', '\r\nChemise hawaïenne aux motifs vifs, évoquant des paysages tropicaux avec des fleurs exotiques et des palmiers. Légère, décontractée et parfaite pour un style estival décontracté.', 115, '../Ressources/Image/shirt3.png', 40),
(8, 'Chemise féerique', 'Chemise', 'Chemise féérique illustrant un cheval magique, mêlant enchantement et mystère. Des détails délicats, évoquant un monde fantastique et majestueux.', 250, '../Ressources/Image/shirt4.png', 40),
(9, 'Chemise camouflage', 'Chemise', '\r\nChemise au motif camouflage rose et vert, alliant audace et féminité. Un mélange inattendu de couleurs vives pour un look original et dynamique.', 175, '../Ressources/Image/shirt5.png', 40),
(10, 'cravate chip', 'Cravate', 'une cravate pas cher, pour les pauvres', 10, '../Ressources/Image/cravate1.png', 40);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
