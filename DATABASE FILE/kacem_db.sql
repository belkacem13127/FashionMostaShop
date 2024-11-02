-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 02 nov. 2024 à 08:58
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
-- Base de données : `kacem_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `about_us`
--

DROP TABLE IF EXISTS `about_us`;
CREATE TABLE IF NOT EXISTS `about_us` (
  `about_id` int NOT NULL AUTO_INCREMENT,
  `about_heading` text NOT NULL,
  `about_short_desc` text NOT NULL,
  `about_desc` text NOT NULL,
  PRIMARY KEY (`about_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `about_us`
--

INSERT INTO `about_us` (`about_id`, `about_heading`, `about_short_desc`, `about_desc`) VALUES
(1, 'L\'historique de Fashion Mosta Shop', '\r\n\r\n', '');

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_country` text NOT NULL,
  `admin_job` varchar(255) NOT NULL,
  `admin_about` text NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_contact`, `admin_country`, `admin_job`, `admin_about`) VALUES
(2, 'Administrateur', 'admin@mail.com', 'Password@123', 'user-profile-min.png', '0707070707', 'Mostaganem', 'Administrateur', ' ');

-- --------------------------------------------------------

--
-- Structure de la table `bundle_product_relation`
--

DROP TABLE IF EXISTS `bundle_product_relation`;
CREATE TABLE IF NOT EXISTS `bundle_product_relation` (
  `rel_id` int NOT NULL AUTO_INCREMENT,
  `rel_title` varchar(255) NOT NULL,
  `product_id` int NOT NULL,
  `bundle_id` int NOT NULL,
  PRIMARY KEY (`rel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bundle_product_relation`
--

INSERT INTO `bundle_product_relation` (`rel_id`, `rel_title`, `product_id`, `bundle_id`) VALUES
(1, 'Lot FSM', 9, 45);

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `p_id` int NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int NOT NULL,
  `p_price` varchar(255) NOT NULL,
  `size` text NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int NOT NULL AUTO_INCREMENT,
  `cat_title` text NOT NULL,
  `cat_top` text NOT NULL,
  `cat_image` text NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_top`, `cat_image`) VALUES
(2, 'Pull, Chemisier, T-shirt, etc.', 'yes', 'T-shirt Nano.PNG'),
(3, 'Jupe, Pantalon, Jean, etc.', 'yes', 'Jean Rio.png'),
(4, 'Robe, Tailleur, Manteau, etc.', 'yes', 'Tailleur Verde.PNG');

-- --------------------------------------------------------

--
-- Structure de la table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
CREATE TABLE IF NOT EXISTS `contact_us` (
  `contact_id` int NOT NULL AUTO_INCREMENT,
  `contact_email` text NOT NULL,
  `contact_heading` text NOT NULL,
  `contact_desc` text NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contact_us`
--

INSERT INTO `contact_us` (`contact_id`, `contact_email`, `contact_heading`, `contact_desc`) VALUES
(1, 'fashionmostashop@gmail.com', 'Contactez-nous', '');

-- --------------------------------------------------------

--
-- Structure de la table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE IF NOT EXISTS `coupons` (
  `coupon_id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `coupon_title` varchar(255) NOT NULL,
  `coupon_price` varchar(255) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_limit` int NOT NULL,
  `coupon_used` int NOT NULL,
  PRIMARY KEY (`coupon_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `product_id`, `coupon_title`, `coupon_price`, `coupon_code`, `coupon_limit`, `coupon_used`) VALUES
(7, 9, 'promo du Mois', '200', 'FMS 2', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(255) NOT NULL,
  `customer_confirm_code` text NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`, `customer_confirm_code`) VALUES
(2, 'Dekiouss', 'dekiouss@gmail.com', 'dekiouss@123', 'Mostaganem', 'Mostaganem', '0707070707', 'Raisinville27000 Mostaganem', 'icon image.jpg', '::1', '');

-- --------------------------------------------------------

--
-- Structure de la table `customer_orders`
--

DROP TABLE IF EXISTS `customer_orders`;
CREATE TABLE IF NOT EXISTS `customer_orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int NOT NULL,
  `due_amount` int NOT NULL,
  `invoice_no` int NOT NULL,
  `qty` int NOT NULL,
  `size` text NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_status` text NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES
(33, 2, 9000, 1364168439, 1, 'Sélectionner une Taille', '2024-10-29 17:38:56', 'En Attente'),
(34, 2, 15000, 882013808, 1, 'L', '2024-10-30 13:59:17', 'En Attente');

-- --------------------------------------------------------

--
-- Structure de la table `enquiry_types`
--

DROP TABLE IF EXISTS `enquiry_types`;
CREATE TABLE IF NOT EXISTS `enquiry_types` (
  `enquiry_id` int NOT NULL AUTO_INCREMENT,
  `enquiry_title` varchar(255) NOT NULL,
  PRIMARY KEY (`enquiry_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `enquiry_types`
--

INSERT INTO `enquiry_types` (`enquiry_id`, `enquiry_title`) VALUES
(1, 'Commandes et Livraisons'),
(2, 'A votre écoute 7/7'),
(3, 'Prix et Promotions');

-- --------------------------------------------------------

--
-- Structure de la table `manufacturers`
--

DROP TABLE IF EXISTS `manufacturers`;
CREATE TABLE IF NOT EXISTS `manufacturers` (
  `manufacturer_id` int NOT NULL AUTO_INCREMENT,
  `manufacturer_title` text NOT NULL,
  `manufacturer_top` text NOT NULL,
  `manufacturer_image` text NOT NULL,
  PRIMARY KEY (`manufacturer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `manufacturers`
--

INSERT INTO `manufacturers` (`manufacturer_id`, `manufacturer_title`, `manufacturer_top`, `manufacturer_image`) VALUES
(2, 'Desigual', 'yes', 'desigual.PNG'),
(3, 'H & M', 'yes', 'H & M.PNG'),
(4, 'Mango', 'yes', 'Mango.PNG'),
(5, 'Morgan', 'yes', 'Morgan.PNG'),
(7, 'Zara', 'yes', 'Zara.PNG');

-- --------------------------------------------------------

--
-- Structure de la table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` int NOT NULL AUTO_INCREMENT,
  `invoice_no` int NOT NULL,
  `amount` int NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int NOT NULL,
  `code` int NOT NULL,
  `payment_date` text NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `pending_orders`
--

DROP TABLE IF EXISTS `pending_orders`;
CREATE TABLE IF NOT EXISTS `pending_orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int NOT NULL,
  `invoice_no` int NOT NULL,
  `product_id` text NOT NULL,
  `qty` int NOT NULL,
  `size` text NOT NULL,
  `order_status` text NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `size`, `order_status`) VALUES
(33, 2, 1364168439, '45', 1, 'Sélectionner une Taille', 'En Attente'),
(34, 2, 882013808, '42', 1, 'L', 'En Attente');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `p_cat_id` int NOT NULL,
  `cat_id` int NOT NULL,
  `manufacturer_id` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_title` text NOT NULL,
  `product_url` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int NOT NULL,
  `product_psp_price` int NOT NULL,
  `product_desc` text NOT NULL,
  `product_features` text NOT NULL,
  `product_video` text NOT NULL,
  `product_keywords` text NOT NULL,
  `product_label` text NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `manufacturer_id`, `date`, `product_title`, `product_url`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_psp_price`, `product_desc`, `product_features`, `product_video`, `product_keywords`, `product_label`, `status`) VALUES
(5, 4, 2, 2, '0000-00-00 00:00:00', 'Chemisier Ascona', 'product-url-5', 'Chemisier Ascona.PNG', 'Chemisier Ascona.PNG', 'Chemisier Ascona.PNG', 3000, 2500, '\r\n', '\r\n\r\n', '\r\n\r\n', 'FMSCA001', 'Desigual', 'Article'),
(6, 5, 3, 3, '2024-10-24 16:28:47', 'Jupe Rosas', 'product-url-6', 'Jupe Rosas.PNG', 'Jupe Rosas.PNG', 'Jupe Rosas.PNG', 4000, 3500, '\r\n\r\n\r\n\r\n\r\n\r\n', '\r\n\r\n\r\n\r\n\r\n\r\n', '\r\n\r\n\r\n\r\n\r\n\r\n', 'FMSJR002', 'H & M', 'product'),
(7, 6, 0, 4, '2024-10-24 16:29:12', 'Robe Bilbao', 'product-url-7', 'Robe Bilbao.PNG', 'Robe Bilbao.PNG', 'Robe Bilbao.PNG', 5000, 4500, '', '', '', 'FMSRB003', 'Mango', 'product'),
(8, 4, 2, 5, '2024-10-24 16:29:52', 'Veste Bella', 'product-url-8', 'Veste Bella.PNG', 'Veste Bella.PNG', 'Veste Bella.PNG', 7000, 6500, '', '', '', 'FMSVB004', 'Morgan', 'product'),
(9, 4, 2, 7, '2024-10-29 12:26:38', 'Chemise Napoli', 'product-Url-9', 'chemise napoli.PNG', 'chemise napoli.PNG', 'chemise napoli.PNG', 3000, 2500, 'Chemise 50/50', '', '', 'FMSCN005', 'H & M', 'product'),
(10, 4, 2, 5, '2024-10-29 12:26:57', 'Chemise Urbino', 'product-Url-10', 'Chemise Urbino.PNG', 'Chemise Urbino.PNG', 'Chemise Urbino.PNG', 3000, 2500, 'Chemise en polyester', '', '', 'FMSCU006', 'Morgan', 'product'),
(11, 4, 2, 2, '2024-10-29 12:27:17', 'Chemisier Blanca', 'product-Url-11', 'Chemisier Blanca.PNG', 'Chemisier Blanca.PNG', 'Chemisier Blanca.PNG', 3000, 2500, 'Chemisier en polyester', '', '', 'FMSCB007', 'desigual', 'product'),
(12, 4, 2, 3, '2024-10-29 12:27:36', 'Chemisier Genova', 'product-Url-12', 'Chemisier Genova.PNG', 'Chemisier Genova.PNG', 'Chemisier Genova.PNG', 3000, 2500, 'Chemisier en polyester', '', '', 'FMSCG008', 'H & M', 'product'),
(13, 4, 2, 4, '2024-10-29 12:27:57', 'Pull Burg', 'product-Url-13', 'Pull Burg.PNG', 'Pull Burg.PNG', 'Pull Burg.PNG', 3000, 2500, 'Pull col V', '', '', 'FMSPB010', 'Mango', 'product'),
(14, 4, 2, 7, '2024-10-29 12:28:18', 'Pull Ibiza', 'product-Url-14', 'Pull Ibiza.PNG', 'Pull Ibiza.PNG', 'Pull Ibiza.PNG', 3000, 2500, 'Pull long', '', '', 'FMSPI011', 'Zara', 'product'),
(15, 4, 2, 2, '2024-10-29 12:28:36', 'Pull Marin', 'product-Url-15', 'Pull Marin.PNG', 'Pull Marin.PNG', 'Pull Marin.PNG', 3000, 2500, 'Pull marinière', '', '', 'FMSPM013', 'Desigual', 'product'),
(16, 5, 3, 3, '2024-10-29 12:28:59', 'Jupe Denia', 'product-Url-16', 'Jupe Denia.PNG', 'Jupe Denia.PNG', 'Jupe Denia.PNG', 4000, 3500, 'Jupe en polyester', '', '', 'FMSJD014', 'H & M', 'product'),
(17, 5, 3, 4, '2024-10-29 12:29:17', 'jupe Gandie', 'product-Url-17', 'Jupe Gandie.PNG', 'Jupe Gandie.PNG', 'Jupe Gandie.PNG', 4000, 3500, 'Jupe en polyester', '', '', 'FMSJG016', 'Mango', 'product'),
(18, 5, 3, 5, '2024-10-29 12:29:39', 'Jupe Xabia', 'product-Url-18', 'Jupe Xabia.PNG', 'Jupe Xabia.PNG', 'Jupe Xabia.PNG', 4000, 3500, 'Jupe en polyester', '', '', 'FMQJG017', 'Morgan', 'product'),
(19, 5, 3, 7, '2024-10-29 12:30:19', 'Pantalon Elche', 'product-Url-19', 'Pantalon Elche.PNG', 'Pantalon Elche.PNG', 'Pantalon Elche.PNG', 5000, 4500, 'Pantalon en toile', '', '', 'FMSPE019', 'Zara', 'product'),
(20, 5, 3, 2, '2024-10-29 12:30:41', 'Pantalon Girona', 'product-Url-20', 'Pantalon Girona.PNG', 'Pantalon Girona.PNG', 'Pantalon Girona.PNG', 5000, 4500, 'Pantalon en toile', '', '', 'FMSPG020', 'Desigual', 'product'),
(21, 5, 3, 3, '2024-10-29 12:31:01', 'Pantalon Lambda', 'product-Url-21', 'Pantalon Lambda.PNG', 'Pantalon Lambda.PNG', 'Pantalon Lambda.PNG', 5000, 4500, 'Pantalon en polyester ', '', '', 'FMSPL021', 'H & M', 'product'),
(22, 6, 4, 4, '2024-10-29 12:31:25', 'Ensemble Anzio', 'product-Url-22', 'Ensemble Anzio.PNG', 'Ensemble Anzio.PNG', 'Ensemble Anzio.PNG', 7000, 6500, 'Ensemble en poly/gersey', '', '', 'FMSEA022', 'Mango', 'product'),
(23, 6, 4, 5, '2024-10-29 12:31:42', 'Ensemble Biella', 'product-Url-23', 'Ensemble Biella.PNG', 'Ensemble Biella.PNG', 'Ensemble Biella.PNG', 7000, 6500, 'Ensemble en coton', '', '', 'FMSEB023', 'Morgan', 'product'),
(24, 6, 4, 2, '2024-10-29 12:32:05', 'Ensemble Bolsano', 'product-Url-24', 'Ensemble Bolsano.PNG', 'Ensemble Bolsano.PNG', 'Ensemble Bolsano.PNG', 7000, 6500, 'Ensemble en dralon', '', '', 'FMSEB025', 'Desigual', 'product'),
(25, 6, 4, 4, '2024-10-29 12:32:40', 'Robe Betis', 'product-Url-25', 'Robe Betis.PNG', 'Robe Betis.PNG', 'Robe Betis.PNG', 7000, 6500, 'Robe en polyester', '', '', 'FMSRB030', 'Mango', 'product'),
(26, 6, 4, 4, '2024-10-29 12:33:19', 'Robe Malaga', 'product-Url-26', 'Robe Malaga.PNG', 'Robe Malaga.PNG', 'Robe Malaga.PNG', 7000, 6500, 'Robe 50/50', '', '', 'FMSRM031', 'Mango', 'product'),
(27, 6, 4, 5, '2024-10-29 12:33:40', 'Robe Venitia', 'product-Url-27', 'Robe Venitia.PNG', 'Robe Venitia.PNG', 'Robe Venitia.PNG', 7000, 6500, 'Robe en coton', '', '', 'FMSRV033', 'Morgan', 'product'),
(28, 6, 4, 7, '2024-10-29 12:34:10', 'Costume Dosi0', 'product-Url-28', 'Costume Dosio.PNG', 'Costume Dosio.PNG', 'Costume Dosio.PNG', 12000, 10000, 'Costume en coton', '', '', 'FMSCD040', 'Zara', 'product'),
(29, 6, 4, 5, '2024-10-29 12:34:38', 'Costume Orgali', 'product-url-29', 'Costume Orgali.PNG', 'Costume Orgali.PNG', 'Costume Orgali.PNG', 12000, 10000, 'Costume en coton', '', '', 'FMSCO041', 'Morgan', 'product'),
(41, 6, 4, 3, '2024-10-25 13:57:55', 'Costume Real', 'product-Url-30', 'Costume Real.PNG', 'Costume Real.PNG', 'Costume Real.PNG', 12000, 10000, 'Costume en coton', '', '', 'FMSCR042', 'H & M', 'product'),
(42, 6, 4, 4, '2024-10-25 14:00:06', 'Manteau Cecina', 'product-Url-31', 'Manteau Cecina.PNG', 'Manteau Cecina.PNG', 'Manteau Cecina.PNG', 15000, 13000, 'Manteau en laine ', '', '', 'FMSMC050', 'Mango', 'product'),
(43, 6, 4, 7, '2024-10-25 15:12:40', 'Manteau Chiarpi', 'product-Url-32', 'Manteau Chiarpi.PNG', 'Manteau Chiarpi.PNG', 'Manteau Chiarpi.PNG', 20000, 15000, '\r\nManteau en laine\r\n', '\r\n\r\n', '\r\n\r\n', 'FMSMC051', 'Zara', 'product'),
(44, 6, 4, 4, '2024-10-25 14:04:38', 'Manteau Volvi', 'product-Url-33', 'Manteau Volvi.PNG', 'Manteau Volvi.PNG', 'Manteau Volvi.PNG', 20000, 15000, 'Manteau en laine', '', '', 'FMSMV052', 'Mango', 'product'),
(45, 4, 2, 2, '2024-10-29 17:25:12', 'Lot FSM', '1', 'chemise napoli.PNG', 'Chemise Urbino.PNG', 'Chemisier Genova.PNG', 9000, 7000, '', '', '', 'FSMLOT001', 'Desigual', 'bundle');

-- --------------------------------------------------------

--
-- Structure de la table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE IF NOT EXISTS `product_categories` (
  `p_cat_id` int NOT NULL AUTO_INCREMENT,
  `p_cat_title` text NOT NULL,
  `p_cat_top` text NOT NULL,
  `p_cat_image` text NOT NULL,
  PRIMARY KEY (`p_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_top`, `p_cat_image`) VALUES
(4, 'Vêtement du Haut', 'yes', 'T-shirt Nano.PNG'),
(5, 'Vêtement du Bas', 'yes', 'Jean Rio.png'),
(6, 'Vêtement Ensemble', 'yes', 'Tailleur Verde.PNG');

-- --------------------------------------------------------

--
-- Structure de la table `store`
--

DROP TABLE IF EXISTS `store`;
CREATE TABLE IF NOT EXISTS `store` (
  `store_id` int NOT NULL AUTO_INCREMENT,
  `store_title` varchar(255) NOT NULL,
  `store_image` varchar(255) NOT NULL,
  `store_desc` text NOT NULL,
  `store_button` varchar(255) NOT NULL,
  `store_url` varchar(255) NOT NULL,
  PRIMARY KEY (`store_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `store`
--

INSERT INTO `store` (`store_id`, `store_title`, `store_image`, `store_desc`, `store_button`, `store_url`) VALUES
(4, 'Mostaganem', 'store (3).jpg', '', 'Afficher le Plan', 'https://www.Fashion Mosta Shop.com'),
(5, 'Oran', 'store (1).png', '', 'Afficher le Plan', 'http://www.Fashion Mosta Shop.com'),
(6, 'Alger', 'store (2).jpg', '', 'Afficher le Plan', 'http://www.Fashion Mosta Shop.com');

-- --------------------------------------------------------

--
-- Structure de la table `terms`
--

DROP TABLE IF EXISTS `terms`;
CREATE TABLE IF NOT EXISTS `terms` (
  `term_id` int NOT NULL AUTO_INCREMENT,
  `term_title` varchar(100) NOT NULL,
  `term_link` varchar(100) NOT NULL,
  `term_desc` text NOT NULL,
  PRIMARY KEY (`term_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `terms`
--

INSERT INTO `terms` (`term_id`, `term_title`, `term_link`, `term_desc`) VALUES
(1, 'Règlement', 'Conditions', ''),
(2, 'Retour de Marchandise', 'Retour', ''),
(3, 'Satisfait ou Remboursé', 'Cash Back', '\r\n\r\n		');

-- --------------------------------------------------------

--
-- Structure de la table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `wishlist_id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`wishlist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `wishlist`
--

INSERT INTO `wishlist` (`wishlist_id`, `customer_id`, `product_id`) VALUES
(6, 2, 45);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
