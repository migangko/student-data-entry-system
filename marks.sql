-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 21, 2022 at 07:12 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `marks`
--

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE IF NOT EXISTS `colleges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`id`, `code`, `name`, `email`, `password`) VALUES
(7, '101', 'Mriganka Institution of Technology', 'mriganka@institute.in', '179');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `college_code` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `dept_code` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `college_code`, `department`, `course`, `semester`, `dept_code`, `password`) VALUES
(8, '101', 'Computer science department', 'BCA', '1ST', '301', '301'),
(9, '302', 'Computer science department', 'BCA', '2ND', '302', '302');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `college` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `parents_name` varchar(50) NOT NULL,
  `exam_roll` varchar(50) NOT NULL,
  `exam_registration` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `course` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `blood_group` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `college`, `name`, `email`, `parents_name`, `exam_roll`, `exam_registration`, `department`, `phone`, `course`, `semester`, `blood_group`, `subject`) VALUES
(1, 'Mriganka Institution of Technology', 'Mriganka', 'mrigz179@gmail.com', 'Sanghamitra Das', '123', '123456', 'Computer science department', '7577992161', 'BCA', '1ST', 'b+', 'maths,  science,  english, '),
(2, 'Mriganka Institution of Technology', 'Migangko', 'm@gmail.com', 'Migangko&#039;s parents', '159', '159756', 'Computer science department', '987654321', 'BCA', '1ST', 'b+', 'maths,  science, '),
(3, 'Mriganka Institution of Technology', 'Bibek', 'a@gmail.com', 'His/Her parents', '15478', '134567', 'Computer science department', '987654321', 'BCA', '2ND', 'b+', 'maths2,  science2,  english2, '),
(4, 'Mriganka Institution of Technology', 'Bibek&#039;s girlfriend', 'b@gmail.com', 'her parent&#039;s name', '1576486', '13489757', 'Computer science department', '157946832', 'BCA', '2ND', 'g+', 'maths2,  science2,  english2, ');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department` varchar(50) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `subject` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `department`, `semester`, `subject`) VALUES
(7, 'Computer science department', '1ST', 'maths'),
(8, 'Computer science department', '1ST', ' science'),
(9, 'Computer science department', '1ST', ' english'),
(10, 'Computer science department', '2ND', 'maths2'),
(11, 'Computer science department', '2ND', ' science2'),
(12, 'Computer science department', '2ND', ' english2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
