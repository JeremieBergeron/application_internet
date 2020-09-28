-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 28 sep. 2020 à 14:00
-- Version du serveur :  8.0.18
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
-- Base de données : `application`
--

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Active, 0 = Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `files_products`
--

CREATE TABLE `files_products` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `price` float NOT NULL,
  `quantity_available` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `quantity_available`, `created`, `modified`) VALUES
(1, 'Xbox 360', NULL, 400, 100, '2020-09-06 12:59:05', '2020-09-06 13:00:18'),
(3, 'PS4', 'Console de jeu vidéo créé par Sony', 400, 100, '2020-09-25 17:48:10', '2020-09-25 17:48:10'),
(4, 'Xbox One', '', 400, 100, '2020-09-26 18:43:27', '2020-09-26 18:43:27'),
(5, 'PS3', '', 200, 100, '2020-09-26 18:45:41', '2020-09-26 18:45:41');

-- --------------------------------------------------------

--
-- Structure de la table `products_purchases`
--

CREATE TABLE `products_purchases` (
  `id` int(11) NOT NULL,
  `quantity_purchased` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `products_purchases`
--

INSERT INTO `products_purchases` (`id`, `quantity_purchased`, `product_id`, `purchase_id`) VALUES
(1, 0, 1, 34),
(2, 0, 1, 35),
(3, 0, 1, 38),
(4, 0, 3, 38);

-- --------------------------------------------------------

--
-- Structure de la table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `purchases`
--

INSERT INTO `purchases` (`id`, `detail`, `user_id`, `created`, `modified`) VALUES
(34, 'test', 1, '2020-09-21 17:22:21', '2020-09-21 17:22:21'),
(35, 'test2', 2, '2020-09-21 17:24:04', '2020-09-21 17:24:04'),
(37, '', 2, '2020-09-21 18:14:59', '2020-09-21 18:14:59'),
(38, '', 1, '2020-09-25 17:48:34', '2020-09-25 17:48:34');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'admin', 'System administrator'),
(2, 'manager', 'Person in charge of adding products and modifying them'),
(3, 'customer', 'Person who can view and purchase products');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `adress` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `adress`, `first_name`, `last_name`, `role_id`, `created`, `modified`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$D8zC5r6wYqKDlZi4wqB3meCgmJppTw2MTe4u0B3R/7HvMnxuSfBtK', '2000 Rue de l\'école', 'Jérémie', 'Bergeron', 1, '2020-09-06 13:03:09', '2020-09-06 13:03:27'),
(2, 'manager', 'manager@manager.com', '$2y$10$IH551bVho046lEsiAxG1Zuz0kRPHqpqf3004bCKl8WyeZ5CbwZgSa', '4000 rue de Lamontagne', 'Jean', 'Gagnon', 2, '2020-09-06 13:03:09', '2020-09-08 18:46:51'),
(5, 'customer', 'customer@customer.com', '$2y$10$mRkfW.GsVc9JBxgOATJq0.U6uCvog5QZYrLNZE.NSP6Np6sO.hVYK', '34 Rue de la sagesse', 'Diego', 'Bouchard', 3, '2020-09-06 13:03:09', '2020-09-08 18:47:02');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `files_products`
--
ALTER TABLE `files_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `file_id` (`file_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products_purchases`
--
ALTER TABLE `products_purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_purchases_ibfk_1` (`product_id`),
  ADD KEY `products_purchases_ibfk_2` (`purchase_id`);

--
-- Index pour la table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_ibfk_1` (`user_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_ibfk_1` (`role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `files_products`
--
ALTER TABLE `files_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `products_purchases`
--
ALTER TABLE `products_purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `files_products`
--
ALTER TABLE `files_products`
  ADD CONSTRAINT `files_products_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `files_products_ibfk_2` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`);

--
-- Contraintes pour la table `products_purchases`
--
ALTER TABLE `products_purchases`
  ADD CONSTRAINT `products_purchases_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `products_purchases_ibfk_2` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`);

--
-- Contraintes pour la table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
