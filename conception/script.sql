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
