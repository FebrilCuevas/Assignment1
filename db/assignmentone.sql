-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2014 at 12:36 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `assignmentone`
--
CREATE DATABASE IF NOT EXISTS `assignmentone` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `assignmentone`;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id for image',
  `link` varchar(500) NOT NULL COMMENT 'link for image',
  `title` varchar(100) NOT NULL COMMENT 'title for image',
  `desc` varchar(1000) NOT NULL COMMENT 'desc for image',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `link`, `title`, `desc`) VALUES
(1, 'imageone.png', 'Good', 'This is actually good.'),
(2, 'imagetwo.png', 'Great', 'This is actually great.'),
(3, 'imagethree.png', 'Liverwurst', 'This is liverwurst.');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE IF NOT EXISTS `portfolio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(500) NOT NULL COMMENT 'link for the splash image',
  `title` varchar(100) NOT NULL COMMENT 'title for portfolio',
  `desc` varchar(1000) NOT NULL COMMENT 'title for the description',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `link`, `title`, `desc`) VALUES
(1, 'splashimgone.png', 'Mobile Project', 'Hello Moto'),
(2, 'splashimgtwo.png', 'Video Project', 'Video make me happy i think'),
(3, 'splashimgthree.png', 'Web Project', 'I make much web project');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_collaborator`
--

CREATE TABLE IF NOT EXISTS `portfolio_collaborator` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id for portfolio and collaborator relation',
  `portfolio_id` int(11) NOT NULL COMMENT 'id from portfolio table',
  `user_id` int(11) NOT NULL COMMENT 'id from user table',
  PRIMARY KEY (`id`),
  KEY `portfolio_id` (`portfolio_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `portfolio_collaborator`
--

INSERT INTO `portfolio_collaborator` (`id`, `portfolio_id`, `user_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_image`
--

CREATE TABLE IF NOT EXISTS `portfolio_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id for portfolio image relation',
  `portfolio_id` int(11) NOT NULL COMMENT 'id from portfolio table',
  `image_id` int(11) NOT NULL COMMENT 'id from image table',
  PRIMARY KEY (`id`),
  KEY `portfolio_id` (`portfolio_id`,`image_id`),
  KEY `image_id` (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `portfolio_image`
--

INSERT INTO `portfolio_image` (`id`, `portfolio_id`, `image_id`) VALUES
(1, 1, 1),
(3, 1, 3),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id for user',
  `username` varchar(32) NOT NULL COMMENT 'name for user',
  `email` varchar(320) NOT NULL COMMENT 'users email',
  `password` varchar(32) NOT NULL COMMENT 'users password',
  `first_name` varchar(32) NOT NULL COMMENT 'users first name',
  `last_name` varchar(32) NOT NULL COMMENT 'users last name',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'admin status',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `status`) VALUES
(1, 'adminfebril', 'febrilcuevas94@gmail.com', 'adminfebril', 'Febril', 'Cuevas', 1),
(2, 'admindavid', 'davidnagawin@gmail.com', 'admindavid', 'David', 'Agawin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_portfolio`
--

CREATE TABLE IF NOT EXISTS `user_portfolio` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id for user portfolio relation',
  `user_id` int(11) NOT NULL COMMENT 'id from user table',
  `portfolio_id` int(11) NOT NULL COMMENT 'id from portfolio table',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `portfolio_id` (`portfolio_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_portfolio`
--

INSERT INTO `user_portfolio` (`id`, `user_id`, `portfolio_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(4, 1, 3);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `portfolio_collaborator`
--
ALTER TABLE `portfolio_collaborator`
  ADD CONSTRAINT `portfolio_collaborator_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `portfolio_collaborator_ibfk_1` FOREIGN KEY (`portfolio_id`) REFERENCES `portfolio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `portfolio_image`
--
ALTER TABLE `portfolio_image`
  ADD CONSTRAINT `portfolio_image_ibfk_2` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `portfolio_image_ibfk_1` FOREIGN KEY (`portfolio_id`) REFERENCES `portfolio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_portfolio`
--
ALTER TABLE `user_portfolio`
  ADD CONSTRAINT `user_portfolio_ibfk_2` FOREIGN KEY (`portfolio_id`) REFERENCES `portfolio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_portfolio_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
