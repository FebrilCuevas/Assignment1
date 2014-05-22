-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 22, 2014 at 08:35 AM
-- Server version: 5.5.36-cll
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `febrilcu_seagull`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `AdminName` varchar(15) NOT NULL,
  `Password` varchar(8) NOT NULL,
  PRIMARY KEY (`AdminName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminName`, `Password`) VALUES
('admin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(200) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE IF NOT EXISTS `portfolio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `title`, `user_id`) VALUES
(12, 'Outback', 5),
(13, 'Belize', 5),
(16, 'Woods', 3),
(17, 'crazed', 3),
(18, 'beach', 3),
(19, 'mountains', 3),
(20, 'london', 3),
(21, 'streets', 3),
(22, 'ocean', 3),
(24, 'Desert', 3);

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_image`
--

CREATE TABLE IF NOT EXISTS `portfolio_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `portfolio_id` int(11) NOT NULL,
  `url` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `image_id` (`title`),
  KEY `portf_id` (`portfolio_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `portfolio_image`
--

INSERT INTO `portfolio_image` (`id`, `title`, `portfolio_id`, `url`) VALUES
(18, 'Desert', 12, '1509925516.jpg'),
(19, 'back', 12, '36728614.jpg'),
(20, 'beauty', 13, '73243361.jpg'),
(21, 'woods', 16, '1245298492.jpg'),
(22, 'crazy', 17, '320847700.jpg'),
(23, 'beach', 18, '1832631918.jpg'),
(24, 'mountain range', 19, '1782811607.jpg'),
(25, 'bridge', 20, '1453709926.jpg'),
(26, 'street blur', 21, '475364641.jpg'),
(27, 'water', 22, '816816234.jpg'),
(28, 'des', 24, '587854693.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `portf_collab`
--

CREATE TABLE IF NOT EXISTS `portf_collab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `portf_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) COLLATE latin1_general_ci NOT NULL,
  `firstname` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `lastname` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `portfolio` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `portfolio` (`portfolio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `firstname`, `lastname`, `email`, `password`, `portfolio`) VALUES
(3, 'fcuevas', 'Febril', 'Cuevas', 'febrilcuevas@hotmail.com', 'localhost ', NULL),
(5, 'john', 'john', 'john', 'john', 'john', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_portfolio`
--

CREATE TABLE IF NOT EXISTS `user_portfolio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `portfolio_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `picture_id` (`portfolio_id`),
  KEY `user_id_2` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_portfolio`
--

INSERT INTO `user_portfolio` (`id`, `user_id`, `portfolio_id`) VALUES
(1, 1, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`portfolio`) REFERENCES `portfolio` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
