-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 29, 2018 at 11:16 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mailpanel`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminusers`
--

DROP TABLE IF EXISTS `adminusers`;
CREATE TABLE IF NOT EXISTS `adminusers` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_fname` varchar(50) NOT NULL,
  `a_lname` varchar(50) NOT NULL,
  `a_username` varchar(50) NOT NULL,
  `a_password` varchar(50) NOT NULL,
  `a_image` varchar(1000) NOT NULL,
  `a_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`a_id`),
  UNIQUE KEY `a_username` (`a_username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminusers`
--

INSERT INTO `adminusers` (`a_id`, `a_fname`, `a_lname`, `a_username`, `a_password`, `a_image`, `a_date`) VALUES
(1, 'Francis', 'Omari', 'francis', 'omari', 'imgs/user.png', '2018-08-28 23:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_fname` varchar(50) NOT NULL,
  `m_lname` varchar(50) NOT NULL,
  `m_email` varchar(50) NOT NULL,
  `m_subject` varchar(100) NOT NULL,
  `m_body` varchar(2000) NOT NULL,
  `m_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`m_id`),
  KEY `m_email` (`m_email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`m_id`, `m_fname`, `m_lname`, `m_email`, `m_subject`, `m_body`, `m_date`) VALUES
(1, 'Anas', 'Aliyu', 'anasaliyu@gmail.com', 'Fees Inquiring', 'I want to get full details on payment options', '2018-08-29 15:24:01'),
(3, 'Francis', 'Omari', 'francisomari@gmail.com', 'Program inquiry', 'I want to know your programs', '2018-08-29 22:08:13');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
