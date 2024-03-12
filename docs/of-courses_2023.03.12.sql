-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 12 mars 2024 à 22:23
-- Version du serveur : 10.11.3-MariaDB-1:10.11.3+maria~ubu2004
-- Version de PHP : 8.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `of-courses`
--

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id of the book of recipes',
  `title` varchar(255) NOT NULL COMMENT 'title of the book of recipes',
  `position` int(10) UNSIGNED NOT NULL COMMENT 'position of the book of recipes among all user''s books',
  `creation_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'creation date of the book of recipes',
  `update_date` datetime DEFAULT NULL COMMENT 'update date of the book of recipes',
  `user_id` int(10) UNSIGNED NOT NULL COMMENT 'id of the user who created the recipe'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`id`, `title`, `position`, `creation_date`, `update_date`, `user_id`) VALUES
(1, 'Mon premier carnet de recettes', 1, '2024-02-15 13:44:08', '2024-02-15 13:44:08', 1),
(2, 'Mes recettes fétiches', 2, '2024-02-29 21:07:31', '2024-02-29 21:07:31', 1),
(3, 'Recettes veggie', 3, '2024-03-04 20:27:30', '2024-03-04 20:27:30', 1),
(15, 'Recettes b&eacute;b&eacute;', 4, '2024-03-05 11:56:33', NULL, 1),
(16, 'Test nouveau carnet', 5, '2024-03-05 16:20:00', NULL, 1),
(17, 'Mon nouveau carnet', 6, '2024-03-11 08:40:49', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id of the category of the recipe',
  `name` varchar(80) NOT NULL COMMENT 'name of the category of the recipe (starter, desert...)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Entrées'),
(2, 'Soupes'),
(3, 'Pâtes et riz'),
(4, 'Plats principaux : viande'),
(5, 'Plats principaux : poisson'),
(6, 'Plats principaux : végétarien'),
(7, 'Plats principaux : autres'),
(8, 'Accompagnements'),
(9, 'Confitures, coulis et tartinades sucrées'),
(10, 'Desserts'),
(11, 'Gourmandises'),
(12, 'Tartes, quiches et pizzas'),
(13, 'Pains et viennoiseries'),
(14, 'Boissons'),
(15, 'Basiques'),
(16, 'Pour bébé'),
(17, 'Sauces, dips et tartinades'),
(18, 'Petit-déjeuner'),
(19, 'En-cas');

-- --------------------------------------------------------

--
-- Structure de la table `difficulties`
--

CREATE TABLE `difficulties` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id of the difficulty level of the recipe',
  `name` varchar(30) NOT NULL COMMENT 'name of the level of difficulty of the recipe'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `difficulties`
--

INSERT INTO `difficulties` (`id`, `name`) VALUES
(1, 'Facile'),
(2, 'Moyen'),
(3, 'Difficile');

-- --------------------------------------------------------

--
-- Structure de la table `foods`
--

CREATE TABLE `foods` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id of the food',
  `name` varchar(100) NOT NULL COMMENT 'name of the food required for the recipe',
  `quantity` int(10) UNSIGNED NOT NULL COMMENT 'quantity of food required for the number of portions by default for the recipe ',
  `position` int(10) UNSIGNED DEFAULT NULL COMMENT 'position of the food in the recipe',
  `recipe_id` int(10) UNSIGNED NOT NULL COMMENT 'id of the recipe which requires the food in this quantity'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `foods`
--

INSERT INTO `foods` (`id`, `name`, `quantity`, `position`, `recipe_id`) VALUES
(1, 'g de beurre', 120, 1, 2),
(2, 'g de cassonade', 120, 2, 2),
(3, 'pincée de sel', 1, 3, 2),
(4, 'oeuf(s)', 1, 4, 2),
(5, 'g de farine', 220, 5, 2),
(6, 'cc de levure chimique', 1, 6, 2),
(7, 'g de pépites de chocolat', 150, 7, 2);

-- --------------------------------------------------------

--
-- Structure de la table `instructions`
--

CREATE TABLE `instructions` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id of the instruction',
  `instruction` text NOT NULL COMMENT 'description of one instruction of the recipe',
  `batchcook` tinyint(1) DEFAULT NULL COMMENT 'Can the instruction be realized as batch cooking?',
  `position` int(10) UNSIGNED NOT NULL COMMENT 'position of the instruction among all instructions of the recipe',
  `recipe_id` int(10) UNSIGNED NOT NULL COMMENT 'Id of the recipe using the instruction'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `instructions`
--

INSERT INTO `instructions` (`id`, `instruction`, `batchcook`, `position`, `recipe_id`) VALUES
(1, 'Préchauffer le four à 180°C.', NULL, 1, 2),
(2, 'Fouetter le beurre fondu, la cassonade et la pincée de sel jusqu’à ce que le mélange mousse.', NULL, 2, 2),
(3, 'Ajouter l’œuf, puis la farine et la levure. Bien mélanger la préparation.', NULL, 3, 2),
(4, 'Incorporer les pistoles (ou les pépites) de chocolat.', NULL, 4, 2),
(5, 'Répartir la pâte en petits tas espacés sur une plaque de cuisson recouverte de papier sulfurisé, en les aplatissant.', NULL, 5, 2),
(6, 'Enfourner 10 minutes pour des cookies moelleux, 12 minutes pour des cookies craquants.', NULL, 6, 2);

-- --------------------------------------------------------

--
-- Structure de la table `meals`
--

CREATE TABLE `meals` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id of the meal date/time',
  `meal_date_time` datetime NOT NULL COMMENT 'date/time of of the meal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `portions`
--

CREATE TABLE `portions` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id of the number of portions planned for the recipe',
  `portions_nb` int(10) UNSIGNED NOT NULL COMMENT 'number of portions planned for the recipe'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `portions`
--

INSERT INTO `portions` (`id`, `portions_nb`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Structure de la table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id of the recipe',
  `title` varchar(255) NOT NULL COMMENT 'title of the recipe',
  `picture` varchar(255) DEFAULT NULL COMMENT 'path of the picture of the recipe',
  `creation_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'creation date of the recipe in the database',
  `time` int(10) UNSIGNED NOT NULL COMMENT 'time needed to prepare the recipe',
  `portions_default` int(10) UNSIGNED NOT NULL COMMENT 'Number of portions for which the recipe is designed by default',
  `category_id` int(10) UNSIGNED NOT NULL COMMENT 'id of the category of the recipe (starter, desert...)',
  `difficulty_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'id of the difficulty level of the recipe',
  `weather_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'id of the weather suitable to prepare the recipe (sunny, cloudy, ...)',
  `user_id` int(10) UNSIGNED NOT NULL COMMENT 'id of the user who created the recipe'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `recipes`
--

INSERT INTO `recipes` (`id`, `title`, `picture`, `creation_date`, `time`, `portions_default`, `category_id`, `difficulty_id`, `weather_id`, `user_id`) VALUES
(2, 'Cookies moelleux aux pépites de chocolat', NULL, '2024-02-15 15:15:10', 25, 4, 11, 1, 3, 1),
(3, 'Quiche tatin', NULL, '2024-02-19 13:29:05', 45, 6, 12, 1, 1, 1),
(4, 'Verrines express', NULL, '2024-02-19 13:29:51', 15, 6, 10, 1, 3, 1),
(5, 'AAAA - Test', NULL, '2024-03-04 20:33:58', 10, 5, 8, 1, 1, 1),
(12, 'Test avec saisons', NULL, '2024-03-12 22:28:24', 15, 5, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `recipes_books`
--

CREATE TABLE `recipes_books` (
  `book_id` int(10) UNSIGNED NOT NULL COMMENT 'Id of the book of recipes',
  `recipe_id` int(10) UNSIGNED NOT NULL COMMENT 'Id of the recipe'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `recipes_books`
--

INSERT INTO `recipes_books` (`book_id`, `recipe_id`) VALUES
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `recipes_meals_portions`
--

CREATE TABLE `recipes_meals_portions` (
  `recipe_id` int(10) UNSIGNED NOT NULL COMMENT 'Id of the recipe',
  `meal_id` int(10) UNSIGNED NOT NULL COMMENT 'Id of the meal',
  `portions_id` int(10) UNSIGNED NOT NULL COMMENT 'Id of the portions number'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `recipes_seasons`
--

CREATE TABLE `recipes_seasons` (
  `recipe_id` int(10) UNSIGNED NOT NULL,
  `season_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `recipes_seasons`
--

INSERT INTO `recipes_seasons` (`recipe_id`, `season_id`) VALUES
(2, 1),
(2, 2),
(2, 3),
(2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `recipes_tags`
--

CREATE TABLE `recipes_tags` (
  `recipe_id` int(10) UNSIGNED NOT NULL COMMENT 'Id of the recipe',
  `tag_id` int(10) UNSIGNED NOT NULL COMMENT 'Id of the tag of the recipe'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `recipes_tags`
--

INSERT INTO `recipes_tags` (`recipe_id`, `tag_id`) VALUES
(2, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `seasons`
--

CREATE TABLE `seasons` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id of the season suitable for the foods of the recipe',
  `name` varchar(30) NOT NULL COMMENT 'name of the season suitable for the foods of the recipe',
  `picture` varchar(255) NOT NULL COMMENT 'Path of the picture of the season'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `seasons`
--

INSERT INTO `seasons` (`id`, `name`, `picture`) VALUES
(1, 'Printemps', 'spring.png'),
(2, 'Eté', 'summer.png'),
(3, 'Automne', 'fall.png'),
(4, 'Hiver', 'winter.png');

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id of the tag of the recipe',
  `name` varchar(100) NOT NULL COMMENT 'name of the tag of the recipe',
  `position` int(10) UNSIGNED NOT NULL COMMENT 'position of the tag among the entire list of tags, to display all tags in a specific order',
  `always_proposed` tinyint(1) NOT NULL COMMENT 'specifies if the tag is a generic tag which is always proposed to be selected when creating a new recipe or searching for recipes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tags`
--

INSERT INTO `tags` (`id`, `name`, `position`, `always_proposed`) VALUES
(1, 'Grandes tablées', 2, 1),
(2, 'Express', 1, 1),
(3, 'Kids friendly', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'user''s id',
  `name` varchar(100) NOT NULL COMMENT 'user''s name',
  `firstname` varchar(100) NOT NULL COMMENT 'user''s firstname',
  `email` varchar(100) NOT NULL COMMENT 'user''s email address'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `firstname`, `email`) VALUES
(1, 'Montaru', 'Marine', 'marine.montaru@gmail.com'),
(2, 'Test', 'User', 'test.user@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `users_meals`
--

CREATE TABLE `users_meals` (
  `user_id` int(10) UNSIGNED NOT NULL COMMENT 'User''s id',
  `meal_id` int(10) UNSIGNED NOT NULL COMMENT 'Id of the meal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `weathers`
--

CREATE TABLE `weathers` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id of the weather suitable to prepare the recipe (sunny, cloudy, ...)',
  `name` varchar(80) NOT NULL COMMENT 'Name of the category of weather suitable to prepare the recipe (sunny, cloudy, ...)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `weathers`
--

INSERT INTO `weathers` (`id`, `name`) VALUES
(1, 'Pour les temps frais'),
(2, 'Pour les temps chauds'),
(3, 'Pour tous les temps');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `difficulties`
--
ALTER TABLE `difficulties`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `instructions`
--
ALTER TABLE `instructions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipe_id` (`recipe_id`);

--
-- Index pour la table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `portions`
--
ALTER TABLE `portions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `difficulty_id` (`difficulty_id`),
  ADD KEY `weather_id` (`weather_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `recipes_books`
--
ALTER TABLE `recipes_books`
  ADD PRIMARY KEY (`book_id`,`recipe_id`),
  ADD KEY `recipe_id` (`recipe_id`);

--
-- Index pour la table `recipes_meals_portions`
--
ALTER TABLE `recipes_meals_portions`
  ADD PRIMARY KEY (`recipe_id`,`meal_id`,`portions_id`),
  ADD KEY `meal_id` (`meal_id`),
  ADD KEY `portions_id` (`portions_id`);

--
-- Index pour la table `recipes_seasons`
--
ALTER TABLE `recipes_seasons`
  ADD PRIMARY KEY (`recipe_id`,`season_id`),
  ADD KEY `season_id` (`season_id`);

--
-- Index pour la table `recipes_tags`
--
ALTER TABLE `recipes_tags`
  ADD PRIMARY KEY (`recipe_id`,`tag_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Index pour la table `seasons`
--
ALTER TABLE `seasons`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users_meals`
--
ALTER TABLE `users_meals`
  ADD PRIMARY KEY (`user_id`,`meal_id`),
  ADD KEY `meal_id` (`meal_id`);

--
-- Index pour la table `weathers`
--
ALTER TABLE `weathers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id of the book of recipes', AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id of the category of the recipe', AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `difficulties`
--
ALTER TABLE `difficulties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id of the difficulty level of the recipe', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id of the food', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `instructions`
--
ALTER TABLE `instructions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id of the instruction', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `meals`
--
ALTER TABLE `meals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id of the meal date/time';

--
-- AUTO_INCREMENT pour la table `portions`
--
ALTER TABLE `portions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id of the number of portions planned for the recipe', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id of the recipe', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `seasons`
--
ALTER TABLE `seasons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id of the season suitable for the foods of the recipe', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id of the tag of the recipe', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'user''s id', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `weathers`
--
ALTER TABLE `weathers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id of the weather suitable to prepare the recipe (sunny, cloudy, ...)', AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `instructions`
--
ALTER TABLE `instructions`
  ADD CONSTRAINT `instructions_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`);

--
-- Contraintes pour la table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `recipes_ibfk_2` FOREIGN KEY (`difficulty_id`) REFERENCES `difficulties` (`id`),
  ADD CONSTRAINT `recipes_ibfk_3` FOREIGN KEY (`weather_id`) REFERENCES `weathers` (`id`),
  ADD CONSTRAINT `recipes_ibfk_5` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `recipes_books`
--
ALTER TABLE `recipes_books`
  ADD CONSTRAINT `recipes_books_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `recipes_books_ibfk_2` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`);

--
-- Contraintes pour la table `recipes_meals_portions`
--
ALTER TABLE `recipes_meals_portions`
  ADD CONSTRAINT `recipes_meals_portions_ibfk_1` FOREIGN KEY (`meal_id`) REFERENCES `meals` (`id`),
  ADD CONSTRAINT `recipes_meals_portions_ibfk_2` FOREIGN KEY (`portions_id`) REFERENCES `portions` (`id`),
  ADD CONSTRAINT `recipes_meals_portions_ibfk_3` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`);

--
-- Contraintes pour la table `recipes_seasons`
--
ALTER TABLE `recipes_seasons`
  ADD CONSTRAINT `recipes_seasons_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`),
  ADD CONSTRAINT `recipes_seasons_ibfk_2` FOREIGN KEY (`season_id`) REFERENCES `seasons` (`id`);

--
-- Contraintes pour la table `recipes_tags`
--
ALTER TABLE `recipes_tags`
  ADD CONSTRAINT `recipes_tags_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`),
  ADD CONSTRAINT `recipes_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Contraintes pour la table `users_meals`
--
ALTER TABLE `users_meals`
  ADD CONSTRAINT `users_meals_ibfk_1` FOREIGN KEY (`meal_id`) REFERENCES `meals` (`id`),
  ADD CONSTRAINT `users_meals_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
