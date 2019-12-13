/*
SQLyog Enterprise Trial - MySQL GUI v7.11 
MySQL - 5.5.5-10.4.8-MariaDB : Database - chat
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`chat` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `chat`;

/*Table structure for table `message` */

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `lu` tinyint(1) NOT NULL,
  `supprime` enum('N','E','R','T') NOT NULL,
  `date_message` datetime NOT NULL,
  `expediteur` int(11) NOT NULL,
  `recepteur` int(11) NOT NULL,
  PRIMARY KEY (`message_id`),
  KEY `fk_expediteur` (`expediteur`),
  KEY `fk_recepteur` (`recepteur`),
  CONSTRAINT `fk_expediteur` FOREIGN KEY (`expediteur`) REFERENCES `user` (`user_id`),
  CONSTRAINT `fk_recepteur` FOREIGN KEY (`recepteur`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `message` */

insert  into `message`(`message_id`,`message`,`lu`,`supprime`,`date_message`,`expediteur`,`recepteur`) values (1,'Bonjour Mr',0,'N','2019-12-12 00:00:00',1,3),(2,'Oui bonjour comment tu va ?',0,'N','2019-12-12 00:00:00',3,1);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `connecte` datetime NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`user_id`,`login`,`password`,`connecte`) values (1,'samtou','samtou','0000-00-00 00:00:00'),(3,'samtou2','samtou','2019-11-27 00:00:00'),(4,'chris','chris','2019-11-28 00:00:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
