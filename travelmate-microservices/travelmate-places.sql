-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2019 at 12:51 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travelmate-places`
--

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `code`, `name`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'BE', 'Berlin', 3, NULL, NULL),
(2, 'BY', 'Munich', 3, NULL, NULL),
(3, 'HH', 'Hamburg', 3, NULL, NULL),
(4, 'HB', 'Bremen', 3, NULL, NULL),
(5, 'HE', 'Hessen', 3, NULL, NULL),
(6, 'PA', 'Paris', 4, '2019-05-24 17:10:53', '2019-05-24 17:10:53');

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `code`, `name`, `continet_name`, `created_at`, `updated_at`) VALUES
(1, 'AL', 'Albania', 'Europe', NULL, NULL),
(2, 'KS', 'Kosovo', 'Europe', NULL, NULL),
(3, 'DEU', 'Germany', 'Europe', NULL, NULL),
(4, 'FRA', 'France', 'Europe', NULL, NULL),
(5, 'ITA', 'Italy', 'Europe', '2019-05-24 16:59:11', '2019-05-24 16:59:11');

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `name`, `type_id`, `description`, `address`, `city_id`, `created_at`, `updated_at`) VALUES
(1, 'Eiffel Tower', 1, 'The Eiffel Tower is a wrought-iron lattice tower on the Champ de Mars in Paris, France. It is named after the engineer Gustave Eiffel, whose company designed and built the tower.', 'Champ de Mars, 5 Avenue Anatole France, 75007', 6, NULL, NULL),
(2, 'Louvre Museum', 1, 'The Louvre, or the Louvre Museum, is the world\'s largest art museum and a historic monument in Paris, France. A central landmark of the city, it is located on the Right Bank of the Seine in the city\'s 1st arrondissement.', 'Rue de Rivoli, 75001', 6, NULL, NULL),
(3, 'Arc de Triomphe', 1, 'The Arc de Triomphe de l\'Étoile is one of the most famous monuments in Paris, France, standing at the western end of the Champs-Élysées at the centre of Place Charles de Gaulle', 'Place Charles de Gaulle, 75008', 6, NULL, NULL),
(4, 'Cathédrale Notre-Dame de Paris', 1, 'Notre-Dame de Paris, often referred to simply as Notre-Dame, is a medieval Catholic cathedral on the Île de la Cité in the 4th arrondissement of Paris.', '6 Parvis Notre-Dame - Pl. Jean-Paul II, 75004', 6, NULL, NULL),
(5, 'Marienplatz', 1, 'Marienplatz is a central square in the city centre of Munich, Germany. It has been the city\'s main square since 1158.', 'Marienplatz 1, 80331', 2, NULL, NULL),
(6, 'Nymphenburg Palace', 1, 'The Nymphenburg Palace, i. e., \"Castle of the Nymph\", is a Baroque palace in Munich, Bavaria, southern Germany. The palace was the main summer residence of the former rulers of Bavaria of the House of Wittelsbach.', 'Schloß Nymphenburg 1, 80638', 2, NULL, NULL),
(7, 'English Garden', 3, 'The Englischer Garten is a large public park in the centre of Munich, Bavaria, stretching from the city centre to the northeastern city limits. ', 'English Garden, 80538', 2, NULL, NULL),
(8, 'Munich Residenz', 1, 'The Residenz in central Munich is the former royal palace of the Wittelsbach monarchs of Bavaria. ', 'Residenzstraße 1, 80333', 2, NULL, NULL);

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Culture', NULL, NULL),
(2, 'Great Food', NULL, NULL),
(3, 'Nature', NULL, NULL),
(4, 'Historic Places', NULL, NULL),
(5, 'Active', NULL, NULL),
(6, 'Night Life', '2019-05-24 17:35:27', '2019-05-24 17:35:27');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
