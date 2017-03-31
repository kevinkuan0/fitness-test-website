-- phpMyAdmin SQL Dump
-- version 4.2.9
-- http://www.phpmyadmin.net
--
-- Host: dbhome.cs.nctu.edu.tw
-- Generation Time: Mar 31, 2017 at 02:41 PM
-- Server version: 5.6.34-log
-- PHP Version: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hhkuan_cs_fitness`
--

-- --------------------------------------------------------

--
-- Table structure for table `attitude`
--

CREATE TABLE IF NOT EXISTS `attitude` (
  `sid` int(11) NOT NULL DEFAULT '0',
  `q1` int(11) DEFAULT NULL,
  `q2` int(11) DEFAULT NULL,
  `q3` int(11) DEFAULT NULL,
  `q4` int(11) DEFAULT NULL,
  `q5` int(11) DEFAULT NULL,
  `q6` int(11) DEFAULT NULL,
  `q7` int(11) DEFAULT NULL,
  `q8` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `region` varchar(12) NOT NULL DEFAULT '',
  `city` varchar(12) NOT NULL DEFAULT '',
  `school` varchar(12) NOT NULL DEFAULT '',
  `year` tinyint(4) NOT NULL DEFAULT '0',
  `class` int(11) NOT NULL DEFAULT '0',
  `seat_no` int(11) NOT NULL DEFAULT '0',
  `height` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `no_hint` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `dscore` int(11) DEFAULT NULL,
  `sex` varchar(6) DEFAULT NULL,
`sid` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `attitude`
--
ALTER TABLE `attitude`
 ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`region`,`city`,`school`,`year`,`class`,`seat_no`), ADD UNIQUE KEY `sid` (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
