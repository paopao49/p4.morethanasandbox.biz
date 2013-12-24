-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 23, 2013 at 04:15 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `moretha3_p4_morethanasandbox_biz`
--
CREATE DATABASE IF NOT EXISTS `moretha3_p4_morethanasandbox_biz` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `moretha3_p4_morethanasandbox_biz`;

-- --------------------------------------------------------

--
-- Table structure for table `festivals`
--

CREATE TABLE IF NOT EXISTS `festivals` (
  `festival_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `start_date` text NOT NULL,
  `end_date` text NOT NULL,
  `location` text NOT NULL,
  `genre` text NOT NULL,
  `link` text NOT NULL,
  `cost` int(11) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`festival_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;


-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE IF NOT EXISTS `plans` (
  `plans_id` int(11) NOT NULL AUTO_INCREMENT,
  `festival_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transportation_name` text,
  `transportation_cost` int(11) DEFAULT NULL,
  `transportation_notes` text,
  `accomodation_name` text,
  `accomodation_cost` int(11) DEFAULT NULL,
  `accomodation_notes` text,
  `tickets_name` text,
  `tickets_cost` int(11) DEFAULT NULL,
  `tickets_notes` text,
  `other_1_name` text,
  `other_1_cost` int(11) DEFAULT NULL,
  `other_1_notes` text,
  `other_2_name` text,
  `other_2_cost` int(11) DEFAULT NULL,
  `other_2_notes` text,
  `other_3_name` text,
  `other_3_cost` int(11) DEFAULT NULL,
  `other_3_notes` text,
  PRIMARY KEY (`plans_id`),
  KEY `festival_id` (`festival_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

-- --------------------------------------------------------

--
-- Table structure for table `rsvp`
--

CREATE TABLE IF NOT EXISTS `rsvp` (
  `rsvp_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `festival_id` int(11) NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`rsvp_id`),
  KEY `festival_id` (`festival_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` int(11) NOT NULL,
  `timezone` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

-- --------------------------------------------------------

--
-- Constraints for dumped tables
--

--
-- Constraints for table `plans`
--
ALTER TABLE `plans`
  ADD CONSTRAINT `plans_ibfk_1` FOREIGN KEY (`festival_id`) REFERENCES `festivals` (`festival_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plans_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rsvp`
--
ALTER TABLE `rsvp`
  ADD CONSTRAINT `rsvp_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rsvp_ibfk_2` FOREIGN KEY (`festival_id`) REFERENCES `festivals` (`festival_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
