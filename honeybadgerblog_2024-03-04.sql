# ************************************************************
# Sequel Ace SQL dump
# Version 20062
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 11.2.3-MariaDB-1:11.2.3+maria~ubu2204)
# Database: honeybadgerblog
# Generation Time: 2024-03-04 10:34:43 +0000
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `blogposts` WRITE;
/*!40000 ALTER TABLE `blogposts` DISABLE KEYS */;

INSERT INTO `blogposts` (`id`, `title`, `content`, `authorid`, `posttime`)
VALUES
	(1,'The One Habit Doctors Won\'t Tell You','Blog post 1 is some health grifting. Don\'t click!! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin et sollicitudin orci. Morbi eu metus pellentesque, fermentum quam in, vestibulum tellus. Sed dapibus libero eget tincidunt imperdiet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc ultrices sapien ac metus consectetur, eu dignissim ligula pellentesque. Donec at est nibh. Proin et nibh blandit neque aliquam volutpat quis quis ligula. Proin finibus posuere purus, vitae faucibus justo lobortis in. Maecenas sed suscipit orci.\n\nCras at venenatis mauris. Sed vel ornare neque, varius pellentesque lectus. Donec in dignissim lacus. Suspendisse dictum nunc quis est fermentum faucibus. Nunc ut interdum odio. Mauris porta est sit amet est placerat mattis. In quis tellus at metus sodales mollis. Nam pulvinar sem sed magna consequat euismod. Vestibulum sed ultricies nisi.\n\nProin vitae lectus luctus, pretium elit nec, sagittis justo. Vestibulum non risus arcu. Nunc tempus posuere arcu, vel viverra elit hendrerit eu. Aenean ornare nibh ac felis euismod rutrum nec fermentum leo. Etiam sit amet dui tristique, auctor ligula eleifend, sagittis justo. Sed lacinia nisl odio, viverra hendrerit elit vulputate ut. Vivamus eu ipsum nec tortor suscipit tincidunt. Maecenas ornare laoreet ante vel blandit. Morbi nisi odio, molestie dapibus leo mattis, maximus bibendum nisi. Aenean semper lacinia bibendum. Cras tempor erat eros, at aliquet massa ultricies in. Morbi fringilla urna vel turpis pulvinar varius. Aliquam erat volutpat. Integer iaculis diam mi, sed aliquam augue maximus pharetra. Nulla congue id leo pellentesque fermentum. Ut semper iaculis arcu, ut condimentum odio consectetur sit amet.\n\nEtiam finibus augue non convallis blandit. Donec tempor ligula diam, non egestas ex fermentum sit amet. Vestibulum consequat turpis et nisi blandit tincidunt. Nulla quis nulla sit amet orci blandit semper nec hendrerit purus. Vivamus at enim tortor. Fusce rhoncus magna sit amet semper aliquet. Donec vulputate accumsan velit. Fusce ultricies neque eu est maximus eleifend fringilla sit amet massa. Proin fringilla turpis ut tellus faucibus tincidunt. Cras molestie in ligula vitae finibus. Ut urna eros, lobortis eu tortor nec, auctor sagittis dui.\n\nNullam viverra finibus mauris, ac varius orci gravida ut. In non dapibus ante. Pellentesque rutrum tellus leo, eu vulputate purus commodo vitae. Cras eget mi lacinia, finibus quam semper, vehicula elit. Pellentesque aliquet ac neque sit amet lobortis. In vitae lectus arcu. Quisque pellentesque nec eros ac rutrum. Sed facilisis ut nulla sit amet aliquet. Etiam at gravida eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vestibulum pulvinar, est sit amet congue luctus, orci purus finibus dolor, et tempor orci augue in metus. Phasellus vulputate placerat sem at hendrerit. Phasellus pharetra commodo quam, sit amet rhoncus leo. Nulla at facilisis turpis. Nam tincidunt elit id mauris malesuada vestibulum. Ut eros augue, gravida nec egestas quis, placerat ac magna.\n\n',1,'2024-03-04 10:11:03'),
	(2,'28 Facts You Didn\'t Know About The Marvel Universe','Blog post 2 is about entertainment. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin et sollicitudin orci. Morbi eu metus pellentesque, fermentum quam in, vestibulum tellus. Sed dapibus libero eget tincidunt imperdiet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc ultrices sapien ac metus consectetur, eu dignissim ligula pellentesque. Donec at est nibh. Proin et nibh blandit neque aliquam volutpat quis quis ligula. Proin finibus posuere purus, vitae faucibus justo lobortis in. Maecenas sed suscipit orci.\n\nCras at venenatis mauris. Sed vel ornare neque, varius pellentesque lectus. Donec in dignissim lacus. Suspendisse dictum nunc quis est fermentum faucibus. Nunc ut interdum odio. Mauris porta est sit amet est placerat mattis. In quis tellus at metus sodales mollis. Nam pulvinar sem sed magna consequat euismod. Vestibulum sed ultricies nisi.\n\nProin vitae lectus luctus, pretium elit nec, sagittis justo. Vestibulum non risus arcu. Nunc tempus posuere arcu, vel viverra elit hendrerit eu. Aenean ornare nibh ac felis euismod rutrum nec fermentum leo. Etiam sit amet dui tristique, auctor ligula eleifend, sagittis justo. Sed lacinia nisl odio, viverra hendrerit elit vulputate ut. Vivamus eu ipsum nec tortor suscipit tincidunt. Maecenas ornare laoreet ante vel blandit. Morbi nisi odio, molestie dapibus leo mattis, maximus bibendum nisi. Aenean semper lacinia bibendum. Cras tempor erat eros, at aliquet massa ultricies in. Morbi fringilla urna vel turpis pulvinar varius. Aliquam erat volutpat. Integer iaculis diam mi, sed aliquam augue maximus pharetra. Nulla congue id leo pellentesque fermentum. Ut semper iaculis arcu, ut condimentum odio consectetur sit amet.\n\nEtiam finibus augue non convallis blandit. Donec tempor ligula diam, non egestas ex fermentum sit amet. Vestibulum consequat turpis et nisi blandit tincidunt. Nulla quis nulla sit amet orci blandit semper nec hendrerit purus. Vivamus at enim tortor. Fusce rhoncus magna sit amet semper aliquet. Donec vulputate accumsan velit. Fusce ultricies neque eu est maximus eleifend fringilla sit amet massa. Proin fringilla turpis ut tellus faucibus tincidunt. Cras molestie in ligula vitae finibus. Ut urna eros, lobortis eu tortor nec, auctor sagittis dui.\n\nNullam viverra finibus mauris, ac varius orci gravida ut. In non dapibus ante. Pellentesque rutrum tellus leo, eu vulputate purus commodo vitae. Cras eget mi lacinia, finibus quam semper, vehicula elit. Pellentesque aliquet ac neque sit amet lobortis. In vitae lectus arcu. Quisque pellentesque nec eros ac rutrum. Sed facilisis ut nulla sit amet aliquet. Etiam at gravida eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vestibulum pulvinar, est sit amet congue luctus, orci purus finibus dolor, et tempor orci augue in metus. Phasellus vulputate placerat sem at hendrerit. Phasellus pharetra commodo quam, sit amet rhoncus leo. Nulla at facilisis turpis. Nam tincidunt elit id mauris malesuada vestibulum. Ut eros augue, gravida nec egestas quis, placerat ac magna.\n\n',1,'2024-03-04 10:20:39'),
	(3,'He\'s a 10 but He Ordered Lemon & Herb Nandos...','Blog post 3 is about dating. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin et sollicitudin orci. Morbi eu metus pellentesque, fermentum quam in, vestibulum tellus. Sed dapibus libero eget tincidunt imperdiet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc ultrices sapien ac metus consectetur, eu dignissim ligula pellentesque. Donec at est nibh. Proin et nibh blandit neque aliquam volutpat quis quis ligula. Proin finibus posuere purus, vitae faucibus justo lobortis in. Maecenas sed suscipit orci.\n\nCras at venenatis mauris. Sed vel ornare neque, varius pellentesque lectus. Donec in dignissim lacus. Suspendisse dictum nunc quis est fermentum faucibus. Nunc ut interdum odio. Mauris porta est sit amet est placerat mattis. In quis tellus at metus sodales mollis. Nam pulvinar sem sed magna consequat euismod. Vestibulum sed ultricies nisi.\n\nProin vitae lectus luctus, pretium elit nec, sagittis justo. Vestibulum non risus arcu. Nunc tempus posuere arcu, vel viverra elit hendrerit eu. Aenean ornare nibh ac felis euismod rutrum nec fermentum leo. Etiam sit amet dui tristique, auctor ligula eleifend, sagittis justo. Sed lacinia nisl odio, viverra hendrerit elit vulputate ut. Vivamus eu ipsum nec tortor suscipit tincidunt. Maecenas ornare laoreet ante vel blandit. Morbi nisi odio, molestie dapibus leo mattis, maximus bibendum nisi. Aenean semper lacinia bibendum. Cras tempor erat eros, at aliquet massa ultricies in. Morbi fringilla urna vel turpis pulvinar varius. Aliquam erat volutpat. Integer iaculis diam mi, sed aliquam augue maximus pharetra. Nulla congue id leo pellentesque fermentum. Ut semper iaculis arcu, ut condimentum odio consectetur sit amet.\n\nEtiam finibus augue non convallis blandit. Donec tempor ligula diam, non egestas ex fermentum sit amet. Vestibulum consequat turpis et nisi blandit tincidunt. Nulla quis nulla sit amet orci blandit semper nec hendrerit purus. Vivamus at enim tortor. Fusce rhoncus magna sit amet semper aliquet. Donec vulputate accumsan velit. Fusce ultricies neque eu est maximus eleifend fringilla sit amet massa. Proin fringilla turpis ut tellus faucibus tincidunt. Cras molestie in ligula vitae finibus. Ut urna eros, lobortis eu tortor nec, auctor sagittis dui.\n\nNullam viverra finibus mauris, ac varius orci gravida ut. In non dapibus ante. Pellentesque rutrum tellus leo, eu vulputate purus commodo vitae. Cras eget mi lacinia, finibus quam semper, vehicula elit. Pellentesque aliquet ac neque sit amet lobortis. In vitae lectus arcu. Quisque pellentesque nec eros ac rutrum. Sed facilisis ut nulla sit amet aliquet. Etiam at gravida eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vestibulum pulvinar, est sit amet congue luctus, orci purus finibus dolor, et tempor orci augue in metus. Phasellus vulputate placerat sem at hendrerit. Phasellus pharetra commodo quam, sit amet rhoncus leo. Nulla at facilisis turpis. Nam tincidunt elit id mauris malesuada vestibulum. Ut eros augue, gravida nec egestas quis, placerat ac magna.\n\n',2,'2024-03-04 10:23:52');

/*!40000 ALTER TABLE `blogposts` ENABLE KEYS */;
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
