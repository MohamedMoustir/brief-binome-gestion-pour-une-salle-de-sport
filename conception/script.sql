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

-- Structure de la table `users`

CREATE TABLE `users` (
  `id_users` int NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pass_word` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Role` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Déchargement des données de la table `users`

INSERT INTO `users` (`id_users`, `username`, `email`, `pass_word`, `Role`) VALUES
(55, 'admin', 'admin@gmail.com', '$2y$10$AW3/KMMJvJDMgHJRg46czO7fJmql99eCM.WqUAbxWzo/ROFLb7dG6', 1),
(56, 'moustir', 'itsmoustir@gmail.com', '$2y$10$9tx60suV.wQfLX1CqdEuTOe8e4ajRuGhcePrxe2RUhCloGca2FjWO', 0);

-- Index pour la table `activites`
ALTER TABLE `activites`
  ADD PRIMARY KEY (`id_activite`);


-- Index pour la table `reservations`
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activityId` (`activityId`),
  ADD KEY `userId` (`userId`);


  -- Index pour la table `users`

ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);


-- AUTO_INCREMENT pour les tables déchargées



-- AUTO_INCREMENT pour la table `activites`

ALTER TABLE `activites`
  MODIFY `id_activite` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;


-- AUTO_INCREMENT pour la table `reservations`

ALTER TABLE `reservations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;


-- AUTO_INCREMENT pour la table `users`
ALTER TABLE `users`
  MODIFY `id_users` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

-- Contraintes pour les tables déchargées
--


-- Contraintes pour la table `reservations`

ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`activityId`) REFERENCES `activites` (`id_activite`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`id_users`) ON DELETE CASCADE;
COMMIT;


-- suppression d'une activite
DELETE FROM activites WHERE id_activite = 164;
-- modification d'une activite
UPDATE `activites` SET `Nom_activite`='natation',`Description_activite`='this is natation',`Capacite`=20,`date_debut`='2024/02/20',`date_fin`='2024/02/29',`Disponibilite`=1,`image_path`='imag.png' WHERE id_activite = 163;
-1 afficher les réservations ont été confirmées dans le système 
SELECT * FROM reservations WHERE status = 'confirmee';
--2 afficher les capacité moyenne des activités proposées
SELECT AVG(Capacite) FROM `activites` ;

-- 
SELECT users.username FROM `users` 
JOIN reservations ON users.id_users= reservations.userId
 WHERE Role = 0 GROUP by reservations.id;
--  4
SELECT Nom_activite ,COUNT(Nom_activite) FROM `activites`
 JOIN 
reservations ON activites.id_activite = reservations.activityId 
GROUP BY Nom_activite 
ORDER BY COUNT(Nom_activite) DESC LIMIT 3;
