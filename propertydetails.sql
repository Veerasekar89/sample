-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 03, 2013 at 10:14 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `propertydetails`
--

-- --------------------------------------------------------

--
-- Table structure for table `appatments`
--

CREATE TABLE IF NOT EXISTS `appatments` (
  `AppartmentId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ProjectId` int(10) unsigned NOT NULL,
  `Appartment` varchar(250) NOT NULL,
  `State` varchar(150) NOT NULL,
  `City` varchar(150) NOT NULL,
  `Staus` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`AppartmentId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `appatments`
--

INSERT INTO `appatments` (`AppartmentId`, `ProjectId`, `Appartment`, `State`, `City`, `Staus`) VALUES
(1, 1, 'Acc-ch', 'Tamil Nadu', 'Chennai', 0),
(2, 1, 'Ac-ch-2', 'Tamil Nadu', 'Chennai', 0),
(3, 2, 'Trichy-ch-1', 'Tamil Nadu', 'Trichy', 0),
(4, 2, 'ma-ch-1', 'Tamil Nadu', 'Maduari', 0);

-- --------------------------------------------------------

--
-- Table structure for table `aptblocks`
--

CREATE TABLE IF NOT EXISTS `aptblocks` (
  `BlockId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ProjectId` int(10) unsigned NOT NULL,
  `AppartmentId` int(10) unsigned NOT NULL,
  `BlockNo` varchar(100) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT '0',
  `CreatedDate` datetime NOT NULL,
  `UpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`BlockId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `aptblocks`
--

INSERT INTO `aptblocks` (`BlockId`, `ProjectId`, `AppartmentId`, `BlockNo`, `Status`, `CreatedDate`, `UpdatedDate`) VALUES
(1, 1, 1, 'Block A1', 0, '0000-00-00 00:00:00', '2013-03-03 06:26:46'),
(2, 1, 1, 'Block A2', 0, '0000-00-00 00:00:00', '2013-03-03 06:26:46'),
(3, 1, 2, 'Block B1', 0, '0000-00-00 00:00:00', '2013-03-03 06:28:31'),
(4, 1, 2, 'Block B2', 0, '0000-00-00 00:00:00', '2013-03-03 06:28:31'),
(5, 2, 4, 'Block C1', 0, '0000-00-00 00:00:00', '2013-03-03 06:29:21'),
(6, 2, 4, 'Block C2', 0, '0000-00-00 00:00:00', '2013-03-03 06:29:21');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `ProjectId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ProjectName` varchar(255) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `UpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ProjectId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`ProjectId`, `ProjectName`, `CreatedDate`, `UpdatedDate`) VALUES
(1, 'Test1', '0000-00-00 00:00:00', '2013-03-02 18:23:28'),
(2, 'Test2', '0000-00-00 00:00:00', '2013-03-02 18:23:28');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
