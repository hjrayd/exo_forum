-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour forum_hajar
CREATE DATABASE IF NOT EXISTS `forum_hajar` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `forum_hajar`;

-- Listage de la structure de table forum_hajar. category
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int NOT NULL AUTO_INCREMENT,
  `nomCategory` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table forum_hajar.category : ~9 rows (environ)
INSERT INTO `category` (`id_category`, `nomCategory`) VALUES
	(3, 'Manga'),
	(4, 'Cuisine'),
	(5, 'Film'),
	(6, 'Photographie'),
	(7, 'Jeux vidéo'),
	(9, 'Série'),
	(10, 'Animaux'),
	(11, 'Sport'),
	(12, 'Santé');

-- Listage de la structure de table forum_hajar. post
CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int NOT NULL AUTO_INCREMENT,
  `texte` longtext NOT NULL,
  `datePost` datetime NOT NULL,
  `id_topic` int NOT NULL,
  `id_user` int NOT NULL,
  PRIMARY KEY (`id_post`),
  KEY `id_topic` (`id_topic`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `FK_post_topic` FOREIGN KEY (`id_topic`) REFERENCES `topic` (`id_topic`),
  CONSTRAINT `FK_post_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table forum_hajar.post : ~16 rows (environ)
INSERT INTO `post` (`id_post`, `texte`, `datePost`, `id_topic`, `id_user`) VALUES
	(1, 'gojo est mort ', '2024-09-24 16:05:20', 1, 6),
	(2, 'bof j\'ai pas trop aimé', '2024-09-26 14:58:21', 1, 2),
	(3, 'Il te faudrait beaucoup de lumière', '2023-04-15 16:05:20', 2, 3),
	(4, 'Un bon smartphone', '2023-05-16 15:43:27', 2, 4),
	(5, 'Oui c\'est normal c\'est un chat', '2022-06-27 15:45:08', 3, 5),
	(6, 'Achètes lui des jouets', '2022-06-29 15:46:04', 3, 4),
	(7, 'Le film est pas mal mais il ne vaut pas le premier', '2024-09-21 15:47:30', 4, 6),
	(8, 'J\'ai bien aimé la fin', '2024-09-23 15:48:13', 4, 4),
	(9, 'Breaking bad sans hésiter', '2020-09-15 15:48:36', 5, 4),
	(10, 'On ne peut pas comparer les deux', '2020-09-20 15:49:38', 5, 6),
	(11, 'J\'aime bien faire du footing de temps à autres', '2024-09-24 15:50:17', 6, 4),
	(12, 'Je fais du tennis 2 fois par semaine', '2024-09-24 15:50:57', 6, 5),
	(13, 'Yoga, tisane, exercices de respiration', '2021-05-25 15:51:48', 7, 6),
	(14, 'Resident evil 8 pour le retournement de situation à la fin', '2023-06-26 15:53:25', 8, 2),
	(15, 'Red dead redemption', '2023-07-05 15:54:47', 8, 5),
	(16, 'Tu devrais respecter la quantité de beurre inscrite dans la recette', '2021-05-16 15:55:34', 9, 5);

-- Listage de la structure de table forum_hajar. topic
CREATE TABLE IF NOT EXISTS `topic` (
  `id_topic` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL DEFAULT '0',
  `dateTopic` datetime NOT NULL,
  `locked` tinytext NOT NULL,
  `id_category` int NOT NULL,
  `id_user` int NOT NULL,
  PRIMARY KEY (`id_topic`),
  KEY `id_category` (`id_category`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `FK_topic_category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`),
  CONSTRAINT `FK_topic_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table forum_hajar.topic : ~9 rows (environ)
INSERT INTO `topic` (`id_topic`, `titre`, `dateTopic`, `locked`, `id_category`, `id_user`) VALUES
	(1, 'Dernier chapitre de jujutsu kaisen', '2024-09-24 14:45:00', '1', 3, 4),
	(2, 'Comment prendre un beau selfie', '2023-04-15 14:46:34', '0', 6, 2),
	(3, 'Mon chat dort toute la journée', '2022-06-26 14:48:17', '0', 10, 6),
	(4, 'Avis beetlejuice 2 ?', '2024-09-20 14:49:14', '1', 5, 5),
	(5, 'Breaking bad ou Games of thrones ?', '2020-08-13 14:50:21', '1', 9, 3),
	(6, 'Quel sport pratiquez vous ?', '2024-09-24 14:51:27', '1', 11, 1),
	(7, 'Astuces contre le stress', '2021-05-24 14:51:54', '1', 12, 4),
	(8, 'Quel est le meilleur jeu vidéo selon vous ?', '2023-06-25 14:53:23', '1', 7, 6),
	(9, 'Astuce fondant au chocolat réussi', '2021-12-05 14:55:55', '0', 4, 6);

-- Listage de la structure de table forum_hajar. user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `motDePasse` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `dateInscription` datetime NOT NULL,
  `mail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `role` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table forum_hajar.user : ~6 rows (environ)
INSERT INTO `user` (`id_user`, `pseudo`, `motDePasse`, `dateInscription`, `mail`, `role`) VALUES
	(1, 'leaa_12', 'abcd', '2024-09-24 14:38:03', 'leab@gmail.com', 'User'),
	(2, 'jeanjaques1', 'efgh', '2023-02-13 22:13:56', 'jjaques@gmail.com', 'Admin'),
	(3, 'marie67', 'ijk', '2016-02-24 13:50:09', 'marie67000@gmail.com', 'User'),
	(4, 'jeremm_y', 'lmn', '2013-04-15 16:23:05', 'jerem@gmail/com', 'User'),
	(5, 'lucie_59', 'opq', '2013-04-15 16:02:52', 'luciee@gmail.com', 'Admin'),
	(6, 'julieT', 'rst', '2019-06-25 14:44:13', 'julie@gmail.com', 'User');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
