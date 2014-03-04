-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 17, 2014 at 05:06 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `homedepot`
--
CREATE DATABASE IF NOT EXISTS `homedepot` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `homedepot`;

-- --------------------------------------------------------

--
-- Table structure for table `advertise_section`
--

CREATE TABLE IF NOT EXISTS `advertise_section` (
  `section_id` int(11) NOT NULL AUTO_INCREMENT,
  `section_name` varchar(200) NOT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `advertise_section`
--

INSERT INTO `advertise_section` (`section_id`, `section_name`) VALUES
(1, 'service_bottom');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(100) NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`) VALUES
(1, 'Aquel'),
(2, 'Jaquar'),
(3, 'Ganga'),
(4, 'Raksha'),
(5, 'Florence'),
(6, 'Ess Ess');

-- --------------------------------------------------------

--
-- Table structure for table `expert_area`
--

CREATE TABLE IF NOT EXISTS `expert_area` (
  `worker_expertice_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `worker_expertice_name` varchar(255) NOT NULL,
  PRIMARY KEY (`worker_expertice_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `expert_area`
--

INSERT INTO `expert_area` (`worker_expertice_id`, `service_id`, `worker_expertice_name`) VALUES
(1, 1, 'New Residence Work'),
(2, 1, 'New Commercial Work'),
(3, 2, 'Tap Fitting'),
(4, 2, 'Water proofing'),
(5, 2, 'Pump Fitting'),
(6, 1, 'New Site'),
(7, 1, 'Repairing work'),
(8, 2, 'Drainage'),
(9, 2, 'Swimming pool'),
(10, 2, 'Gas pipe line');

-- --------------------------------------------------------

--
-- Table structure for table `expert_in`
--

CREATE TABLE IF NOT EXISTS `expert_in` (
  `expert_in_id` int(11) NOT NULL AUTO_INCREMENT,
  `worker_id` varchar(50) NOT NULL,
  `worker_expertice_id` int(11) NOT NULL,
  PRIMARY KEY (`expert_in_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `expert_in`
--

INSERT INTO `expert_in` (`expert_in_id`, `worker_id`, `worker_expertice_id`) VALUES
(1, 'GUJVDR11092001', 3),
(2, 'GUJVDR11092002', 4),
(3, 'GUJVDR11092003', 3),
(4, 'GUJVDR11092004', 3),
(5, 'GUJVDR11092005', 1),
(6, 'GUJVDR11092001', 1),
(7, 'GUJVDR11092002', 1),
(8, 'GUJVDR11092003', 4),
(9, 'GUJVDR11092004', 4),
(10, 'GUJVDR11092005', 2);

-- --------------------------------------------------------

--
-- Table structure for table `generator`
--

CREATE TABLE IF NOT EXISTS `generator` (
  `id` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `generator`
--

INSERT INTO `generator` (`id`, `num`) VALUES
(1, 11092011);

-- --------------------------------------------------------

--
-- Table structure for table `service_advertise`
--

CREATE TABLE IF NOT EXISTS `service_advertise` (
  `service_advertise_id` int(11) NOT NULL AUTO_INCREMENT,
  `advertise_section_id` int(11) NOT NULL,
  `advertise_company_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `advertise_image` varchar(255) NOT NULL,
  PRIMARY KEY (`service_advertise_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `service_advertise`
--

INSERT INTO `service_advertise` (`service_advertise_id`, `advertise_section_id`, `advertise_company_id`, `service_id`, `advertise_image`) VALUES
(1, 1, 1, 2, 'aquel_small.jpg'),
(2, 1, 2, 2, 'jaquar_small.jpg'),
(3, 1, 3, 2, 'ganga_small.jpg'),
(4, 1, 4, 2, 'raksha_small.jpg'),
(5, 1, 5, 2, 'florence_small.jpg'),
(6, 1, 6, 2, 'essess_small.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `service_category`
--

CREATE TABLE IF NOT EXISTS `service_category` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_type` varchar(25) NOT NULL,
  `service_photo` varchar(200) NOT NULL,
  PRIMARY KEY (`service_id`),
  UNIQUE KEY `service_type` (`service_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `service_category`
--

INSERT INTO `service_category` (`service_id`, `service_type`, `service_photo`) VALUES
(1, 'Mason', 'mason.jpg'),
(2, 'Plumber', 'plumber.jpg'),
(3, 'Painter', 'painter.jpg'),
(4, 'Electrician', 'electrician.jpg'),
(5, 'Carpenter', 'carpenter.jpg'),
(6, 'Paste Control', 'plumber.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `service_subcategory`
--

CREATE TABLE IF NOT EXISTS `service_subcategory` (
  `service_subcategory_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `service_subtype` varchar(25) NOT NULL,
  PRIMARY KEY (`service_subcategory_id`,`service_id`),
  KEY `service_id` (`service_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `service_subcategory`
--

INSERT INTO `service_subcategory` (`service_subcategory_id`, `service_id`, `service_subtype`) VALUES
(1, 2, 'Plumber'),
(2, 2, 'Plumber Consultant'),
(3, 2, 'Plumber Contractor'),
(4, 1, 'Contractor'),
(5, 1, 'Mason');

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

CREATE TABLE IF NOT EXISTS `worker` (
  `worker_id` varchar(50) NOT NULL,
  `worker_fname` varchar(50) NOT NULL,
  `worker_lname` varchar(50) DEFAULT NULL,
  `worker_service_subcategory_id` int(11) NOT NULL,
  `worker_address_line_1` varchar(255) NOT NULL,
  `worker_address_line_2` varchar(255) NOT NULL,
  `worker_area` varchar(50) NOT NULL,
  `worker_latitude` float(10,6) NOT NULL,
  `worker_longitude` float(10,6) NOT NULL,
  `worker_city` varchar(50) NOT NULL,
  `worker_state` varchar(50) NOT NULL,
  `worker_birthdate` date DEFAULT NULL,
  `worker_contact` varchar(15) NOT NULL,
  `worker_email` varchar(100) DEFAULT NULL,
  `worker_gender` varchar(10) NOT NULL,
  `worker_isverified` tinyint(1) NOT NULL,
  `worker_rating` tinyint(4) NOT NULL,
  `worker_photo` varchar(200) NOT NULL,
  `worker_password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`worker_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `worker`
--

INSERT INTO `worker` (`worker_id`, `worker_fname`, `worker_lname`, `worker_service_subcategory_id`, `worker_address_line_1`, `worker_address_line_2`, `worker_area`, `worker_latitude`, `worker_longitude`, `worker_city`, `worker_state`, `worker_birthdate`, `worker_contact`, `worker_email`, `worker_gender`, `worker_isverified`, `worker_rating`, `worker_photo`, `worker_password`) VALUES
('GUJAHM11092007', 'Raj', 'Patel', 3, 'Shriram Stores Compaund', 'Opp. Kailash Complex', 'Naroda', 0.000000, 0.000000, 'Ahmedabad', 'Gujarat', '1992-03-20', '9725251072', '333pratik@gmai.com', 'Male', 0, 2, '', '0cb2b62754dfd12b6ed0161d4b447df7'),
('GUJAHM11092009', 'pratik', 'patel', 2, 'Shriram Stores Compaund', 'Opp. Kailash Complex', 'Naroda', 0.000000, 0.000000, 'Ahmedabad', 'Gujarat', '1992-03-20', '9725251072', '333pratik@gmai.com', 'Male', 0, 2, '', '0cb2b62754dfd12b6ed0161d4b447df7'),
('GUJSUR11092010', 'Raj', 'Patel', 3, 'abc', 'def', 'Naroda', 0.000000, 0.000000, 'Surat', 'Gujarat', '1992-03-20', '9725251072', '333pratik@gmai.com', 'Male', 0, 2, '', '65a1223dae83b8092c4edba0823a793c'),
('GUJVDR11092001', 'Kanjibhai', 'Chavada', 1, '', '', 'naroda', 23.074530, 72.652428, 'ahmedabad', 'gujarat', '1980-06-04', '9624720214', 'kanaji01@gujaratplumber.com', 'Male', 1, 5, 'GUJVDR11092001.jpg', ''),
('GUJVDR11092002', 'Hashmukhbhai', 'Parghi', 2, '', '', 'paldi', 23.009590, 72.561890, 'ahmedabad', 'gujarat', '1980-06-04', '9624720214', 'hasmukh02@gujaratplumber.com', 'Male', 1, 5, 'GUJVDR11092002.jpg', ''),
('GUJVDR11092003', 'Rameshbhai', 'Paramar', 1, '', '', 'naroda', 23.069241, 72.653214, 'ahmedabad', 'gujarat', '1980-06-04', '9624720214', 'ramesh03@gujaratplumber.com', 'Male', 1, 4, 'GUJVDR11092003.jpg', ''),
('GUJVDR11092004', 'Dineshbhai', 'Vala', 3, '', '', 'vastrapur', 23.035959, 72.529388, 'ahmedabad', 'gujarat', '1980-06-04', '9624720214', 'dinesh04@gujaratplumber.com', 'Male', 1, 4, 'GUJVDR11092004.jpg', ''),
('GUJVDR11092005', 'Sureshkumar', 'Chavada', 4, '', '', 'naroda', 23.079981, 72.653549, 'ahmedabad', 'gujarat', '1980-06-04', '9624720214', 'suresh05@gujaratplumber.com', 'Male', 1, 5, 'GUJVDR11092005.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `work_detail`
--

CREATE TABLE IF NOT EXISTS `work_detail` (
  `worker_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `worker_id` varchar(50) NOT NULL,
  `work_description` varchar(1000) DEFAULT NULL,
  `work_title` varchar(100) NOT NULL,
  `work_photo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`worker_detail_id`,`worker_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `service_subcategory`
--
ALTER TABLE `service_subcategory`
  ADD CONSTRAINT `FK_service_subcategory` FOREIGN KEY (`service_id`) REFERENCES `service_category` (`service_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
