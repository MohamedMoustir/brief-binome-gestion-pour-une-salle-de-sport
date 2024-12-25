-- Base de données : `all_sports`
CREATE DATABASE  `all_sports`;
USE `all_sports`;

CREATE TABLE `activites` (
  `id_activite` int NOT NULL,
  `Nom_activite` varchar(100) DEFAULT NULL,
  `Description_activite` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `Capacite` int DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `Disponibilite` tinyint DEFAULT '0',
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--Déchargement des données de la table `activites`

INSERT INTO `activites` (`id_activite`, `Nom_activite`, `Description_activite`, `Capacite`, `date_debut`, `date_fin`, `Disponibilite`, `image_path`) VALUES
(156, 'Zumba', 'Cours de zumba énergétiques', 30, '2024-02-01', '2024-11-30', 1, 'images/zumba.jpg'),
(157, 'Musculation', 'Entraînement pour la musculation', 15, '2024-03-01', '2024-10-31', 1, 'images/musculation.jpg'),
(158, 'Pilates', 'Cours de Pilates pour le bien-être', 25, '2024-01-15', '2024-09-15', 1, 'images/pilates.jpg'),
(159, 'Basketball', 'Matchs de basketball en équipe', 10, '2024-04-01', '2024-08-31', 0, 'images/basketball.jpg'),
(160, 'Boxe', 'Entraînement de boxe pour tous les niveaux', 18, '2024-02-01', '2024-12-01', 1, 'images/boxe.jpg'),
(161, 'Football', 'Compétitions de football en salle', 12, '2024-05-01', '2024-10-30', 1, 'images/football.jpg'),
(163, 'Tennis', 'Cours de tennis pour débutants et avancés', 8, '2024-06-01', '2024-11-30', 1, 'images/tennis.jpg'),
(164, 'Danse classique', 'Séances de danse classique', 20, '2024-01-20', '2024-10-01', 1, 'images/danse_classique.jpg');

-- Structure de la table `reservations`

CREATE TABLE `reservations` (
  `id` int NOT NULL,
  `activityId` int NOT NULL,
  `userId` int NOT NULL,
  `date_activity` date DEFAULT NULL,
  `time_activity` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Déchargement des données de la table `reservations`

INSERT INTO `reservations` (`id`, `activityId`, `userId`, `date_activity`, `time_activity`) VALUES
(170, 163, 56, '2022-12-20', '15:00:00'),
(171, 158, 56, '2022-12-20', '01:00:00');
