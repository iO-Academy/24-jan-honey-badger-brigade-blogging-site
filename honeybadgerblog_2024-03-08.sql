# ************************************************************
# Sequel Ace SQL dump
# Version 20062
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 11.2.3-MariaDB-1:11.2.3+maria~ubu2204)
# Database: honeybadgerblog
<<<<<<< HEAD:honeybadgerblog_2024-03-08.sql
# Generation Time: 2024-03-08 14:08:59 +0000
=======
# Generation Time: 2024-03-08 13:40:30 +0000
>>>>>>> b27d20a376b1c72e5483bc088e35057084763def:honeybadgerblog_2024-03-07.sql
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table blogposts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `blogposts`;

CREATE TABLE `blogposts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `content` longtext NOT NULL,
  `authorid` int(11) NOT NULL,
  `posttime` timestamp NOT NULL,
  `category` smallint(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `blogposts` WRITE;
/*!40000 ALTER TABLE `blogposts` DISABLE KEYS */;

INSERT INTO `blogposts` (`id`, `title`, `content`, `authorid`, `posttime`, `category`)
VALUES
	(1,'The One Habit Doctors Won\'t Tell You','Blog post 1 is some health grifting. Don\'t click!! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin et sollicitudin orci. Morbi eu metus pellentesque, fermentum quam in, vestibulum tellus. Sed dapibus libero eget tincidunt imperdiet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc ultrices sapien ac metus consectetur, eu dignissim ligula pellentesque. Donec at est nibh. Proin et nibh blandit neque aliquam volutpat quis quis ligula. Proin finibus posuere purus, vitae faucibus justo lobortis in. Maecenas sed suscipit orci.\n\n',1,'2024-03-04 10:11:03',5),
	(2,'28 Facts You Didn\'t Know About The Marvel Universe','Blog post 2 is about entertainment. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin et sollicitudin orci. Morbi eu metus pellentesque, fermentum quam in, vestibulum tellus. Sed dapibus libero eget tincidunt imperdiet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc ultrices sapien ac metus consectetur, eu dignissim ligula pellentesque. Donec at est nibh. Proin et nibh blandit neque aliquam volutpat quis quis ligula. Proin finibus posuere purus, vitae faucibus justo lobortis in. Maecenas sed suscipit orci.\n\nC',1,'2024-03-04 10:20:39',3),
	(3,'He\'s a 10 but He Ordered Lemon & Herb Nandos...','Blog post 3 is about dating. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin et sollicitudin orci. Morbi eu metus pellentesque, fermentum quam in, vestibulum tellus. Sed dapibus libero eget tincidunt imperdiet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc ultrices sapien ac metus consectetur, eu dignissim ligula pellentesque. Donec at est nibh. Proin et nibh blandit neque aliquam volutpat quis quis ligula. Proin finibus posuere purus, vitae faucibus justo lobortis in. Maecenas sed suscipit orci.\n\n',2,'2024-03-04 10:23:52',1),
	(4,'Jar Jar Binks or Legolas? Who is Worse?','Blog 4 is about nerdy movies. Lorem Ipsum Cras tempor erat eros, at aliquet massa ultricies in. Morbi fringilla urna vel turpis pulvinar varius. Aliquam erat volutpat. Integer iaculis diam mi, sed aliquam augue maximus pharetra. Nulla congue id leo pellentesque fermentum. Ut semper iaculis arcu, ut condimentum odio consectetur sit amet. Etiam finibus augue non convallis blandit. Donec tempor ligula diam, non egestas ex fermentum sit amet. Vestibulum consequat turpis et nisi blandit tincidunt. Nulla quis nulla sit amet orci blandit semper nec hendrerit purus. Vivamus at enim tortor.',0,'2024-03-07 14:40:32',3),
	(5,'qdfqedqewf','rfwefwe',2,'2024-03-07 04:31:15',1),
	(6,'Yet Another Post','Lorem ipsum rocks and I won\'t have a word said against it. You may think it\'s weird and boring to put latin on a website, but where else can latin scholars get work?',2,'2024-03-07 04:37:53',4),
	(7,'Early morning blogging','Does this come back as the morning or evening? Only PHP can tell me the answer',2,'2024-03-07 17:06:53',3),
	(8,'How I beat Tetris','I just got really good at matching up the shapes and tesselating them really fast. My favourite shape is the L because I like right angles.',2,'2024-03-07 18:53:25',2);

/*!40000 ALTER TABLE `blogposts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `name`)
VALUES
	(1,'News'),
	(2,'Gaming'),
	(3,'Films'),
	(4,'TV'),
	(5,'Science and Nature');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `authorid` int(11) NOT NULL,
  `blogid` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `timestamp` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;

INSERT INTO `comments` (`id`, `authorid`, `blogid`, `content`, `timestamp`)
VALUES
	(1,1,1,'Thank you for sharing this insightful post! I particularly enjoyed how you explained the concept of [specific topic]. It clarified a lot of my doubts.','2024-03-05 16:34:30'),
	(2,2,3,'Great read! I found your perspective on [specific topic] very thought-provoking. It’s interesting to consider this from a different angle.','2024-03-05 16:35:58'),
	(3,1,2,'This was a very informative article. The way you presented the information made it easy to understand and follow. Looking forward to more posts on similar topics.','2024-03-05 16:36:12'),
	(4,2,1,'Another fab post! Love it!','2024-03-07 14:38:10'),
	(5,1,1,'Brenda you love all my work\r\n','2024-03-07 15:55:16'),
	(6,1,5,'This is shite Brenda','2024-03-07 16:51:29');

/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table likes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `likes`;

CREATE TABLE `likes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(11) unsigned NOT NULL,
  `blogid` int(11) unsigned NOT NULL,
  `value` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;

INSERT INTO `likes` (`id`, `userid`, `blogid`, `value`)
VALUES
	(1,1,1,1),
	(2,1,2,1),
	(3,1,3,0),
	(4,1,4,1),
	(5,1,5,0),
	(6,2,1,0),
	(7,2,2,0),
	(8,0,1,1),
	(9,0,1,1),
	(10,0,1,1),
	(11,0,1,1),
	(12,0,1,1),
	(13,0,1,1),
	(14,0,1,1),
	(15,0,1,0),
	(16,0,1,0),
	(17,0,1,0),
	(18,0,1,0),
	(19,0,2,1),
	(20,0,2,1),
	(21,0,2,1),
	(22,0,2,1),
	(23,0,2,1),
	(24,0,2,1),
	(25,0,2,1),
	(26,0,3,1),
	(27,0,3,0),
	(28,0,3,1),
	(29,0,3,1),
	(30,0,3,1),
	(31,0,3,0),
	(32,0,8,1),
	(33,1,9,1),
	(34,0,12,0),
	(35,1,12,1),
	(36,1,8,1),
	(37,1,7,1),
	(38,2,8,1),
	(39,2,7,1),
	(40,2,9,1),
	(41,2,6,1),
	(42,2,4,0),
	(43,2,5,0),
	(44,2,3,1);

/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `email`, `password`)
VALUES
	(1,'Aaron Adams','aaron@testing.com','$2y$10$ip5X2x135F66WmJXSbseu.gSLKjygCLwGB2cZpki4Tg8hpyZa95ku'),
	(2,'Brenda Brown','brenda@testing.com','$2y$10$vV4UPl4aeB0FSzzgEx7Hfu4fA.yU3xzZe2Lp11cl8InebjOoU7kiS');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
