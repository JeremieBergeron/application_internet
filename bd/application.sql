-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 16 oct. 2020 à 18:04
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

--
-- Déchargement des données de la table `files`
--

INSERT INTO `files` (`id`, `name`, `path`, `created`, `modified`, `status`) VALUES
(3, '63072.jpg', 'files/add/', '2020-09-28 15:11:58', '2020-09-28 15:11:58', 1),
(7, '3max.jpg', 'files/add/', '2020-10-16 15:16:56', '2020-10-16 15:16:56', 1),
(8, 'headset.jpg', 'files/add/', '2020-10-16 17:08:19', '2020-10-16 17:08:19', 1);

-- --------------------------------------------------------

--
-- Structure de la table `files_products`
--

CREATE TABLE `files_products` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `files_products`
--

INSERT INTO `files_products` (`id`, `product_id`, `file_id`) VALUES
(16, 16, 3),
(17, 17, 7),
(18, 18, 8);

-- --------------------------------------------------------

--
-- Structure de la table `i18n`
--

CREATE TABLE `i18n` (
  `id` int(11) NOT NULL,
  `locale` varchar(6) COLLATE utf8mb4_general_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `i18n`
--

INSERT INTO `i18n` (`id`, `locale`, `model`, `foreign_key`, `field`, `content`) VALUES
(1, 'fr_CA', 'Roles', 1, 'description', 'Administrateur du système'),
(2, 'fr_CA', 'Roles', 2, 'description', 'Personne responsable de l\'ajout et de la modification des produits'),
(3, 'fr_CA', 'Roles', 3, 'description', 'Personne qui peut voir et acheter des produits'),
(4, 'fr_CA', 'Roles', 2, 'name', 'gestionnaire'),
(5, 'fr_CA', 'Roles', 3, 'name', 'client'),
(6, 'ja_JP', 'Roles', 1, 'description', 'システム管理者'),
(7, 'ja_JP', 'Roles', 1, 'name', '管理者'),
(8, 'ja_JP', 'Roles', 2, 'description', '商品の追加や修正を行う担当者'),
(9, 'ja_JP', 'Roles', 2, 'name', '管理者'),
(10, 'ja_JP', 'Roles', 3, 'description', '商品の閲覧・購入ができる人'),
(11, 'ja_JP', 'Roles', 3, 'name', '御客様'),
(12, 'ja_JP', 'Tags', 1, 'title', 'コンソール'),
(13, 'ja_JP', 'Tags', 2, 'title', 'ソニー'),
(14, 'ja_JP', 'Tags', 3, 'title', 'マイクロソフト'),
(15, 'fr_CA', 'Tags', 4, 'title', 'Écouteur'),
(16, 'ja_JP', 'Tags', 4, 'title', 'ヘッドセット'),
(17, 'fr_CA', 'Tags', 5, 'title', 'Logitech'),
(18, 'ja_JP', 'Tags', 5, 'title', 'ロジクール');

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
(16, 'PS4', '', 400, 100, '2020-10-03 14:40:12', '2020-10-16 17:04:40'),
(17, 'Xbox One', 'Console de jeu vidéo', 400, 20, '2020-10-16 15:17:28', '2020-10-16 15:17:28'),
(18, 'Écouteur', '', 100, 10, '2020-10-16 17:10:01', '2020-10-16 17:10:01');

-- --------------------------------------------------------

--
-- Structure de la table `products_tags`
--

CREATE TABLE `products_tags` (
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `products_tags`
--

INSERT INTO `products_tags` (`product_id`, `tag_id`) VALUES
(16, 1),
(17, 1),
(16, 2),
(17, 3),
(18, 4),
(18, 5);

-- --------------------------------------------------------

--
-- Structure de la table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `quantity_purchased` int(11) NOT NULL,
  `detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `purchases`
--

INSERT INTO `purchases` (`id`, `quantity_purchased`, `detail`, `product_id`, `user_id`, `created`, `modified`) VALUES
(57, 1, '', 16, 1, '2020-10-03 14:40:38', '2020-10-03 14:51:22'),
(58, 1, '', 16, 2, '2020-10-03 14:41:44', '2020-10-03 14:41:44'),
(60, 1, '', 18, 1, '2020-10-16 17:10:35', '2020-10-16 17:10:35'),
(61, 3, '', 17, 5, '2020-10-16 17:10:57', '2020-10-16 17:10:57'),
(62, 1, '', 16, 5, '2020-10-16 17:11:43', '2020-10-16 17:11:43');

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
-- Structure de la table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tags`
--

INSERT INTO `tags` (`id`, `title`, `created`, `modified`) VALUES
(1, 'Console', '2020-09-28 17:34:47', '2020-10-05 17:58:54'),
(2, 'Sony', '2020-09-28 17:38:27', '2020-10-05 17:59:35'),
(3, 'Microsoft', '2020-09-28 17:38:35', '2020-10-05 18:00:00'),
(4, 'Headset', '2020-10-16 17:05:32', '2020-10-16 17:06:30'),
(5, 'Logitech', '2020-10-16 17:08:55', '2020-10-16 17:09:28');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
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

INSERT INTO `users` (`id`, `username`, `email`, `password`, `uuid`, `confirmed`, `adress`, `first_name`, `last_name`, `role_id`, `created`, `modified`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$T44oYw0Ov4GgOGb.YPTNF.htJLoRJUxiCXPBvNysfn2ccZV7MPhqy', '79d1e7b7-a337-4748-9a18-ea8f7f213b9d', 1, '2000 Rue de l\'école', 'Jérémie', 'Bergeron', 1, '2020-09-06 13:03:09', '2020-10-03 16:29:32'),
(2, 'manager', 'manager@manager.com', '$2y$10$IH551bVho046lEsiAxG1Zuz0kRPHqpqf3004bCKl8WyeZ5CbwZgSa', '3d3d669d-e981-4965-882b-b796a33bdfcc', 1, '4000 rue de Lamontagne', 'Jean', 'Gagnon', 2, '2020-09-06 13:03:09', '2020-10-03 16:29:53'),
(5, 'customer', 'customer@customer.com', '$2y$10$mRkfW.GsVc9JBxgOATJq0.U6uCvog5QZYrLNZE.NSP6Np6sO.hVYK', '5c2b2551-8efb-4343-b2c3-6759700a1032', 1, '34 Rue de la sagesse', 'Diego', 'Bouchard', 3, '2020-09-06 13:03:09', '2020-10-03 16:29:27'),
(41, 'test', 'jeremiebergeron1515@gmail.com', '$2y$10$ZsXg3YpUBk2pkz/hVn14je47VYt4CFFCAM1lMpTmeKVWn13CBzpOS', '42374759-2d0b-4b84-b5f7-79120085d095', 0, '1867 Rue de Limbourg', 'Jeremie', 'Bergeron', 3, '2020-10-07 18:18:03', '2020-10-07 18:18:03');

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
-- Index pour la table `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `I18N_LOCALE_FIELD` (`locale`,`model`(100),`foreign_key`,`field`(100)),
  ADD KEY `I18N_FIELD` (`model`(100),`foreign_key`,`field`(100));

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products_tags`
--
ALTER TABLE `products_tags`
  ADD PRIMARY KEY (`product_id`,`tag_id`),
  ADD KEY `tag_key` (`tag_id`);

--
-- Index pour la table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_ibfk_1` (`user_id`),
  ADD KEY `purchases_ibfk_2` (`product_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `files_products`
--
ALTER TABLE `files_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `i18n`
--
ALTER TABLE `i18n`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

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
-- Contraintes pour la table `products_tags`
--
ALTER TABLE `products_tags`
  ADD CONSTRAINT `products_tags_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`),
  ADD CONSTRAINT `products_tags_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Contraintes pour la table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
