-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2015 at 06:14 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12





--
-- Database: `dictionnaire`
--

-- --------------------------------------------------------
--
-- Table structure for table `data`
--

DROP TABLE block ;
DROP TABLE cita ;
DROP TABLE entry ;


CREATE TABLE IF NOT EXISTS `entry` (
  `idData` int(6) NOT NULL,
  `word` varchar(50) NOT NULL,
  `nature` varchar(255) NOT NULL DEFAULT '''''',
  PRIMARY KEY (`idData`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
--
-- Table structure for table `cita`
--

CREATE TABLE IF NOT EXISTS `cita` (
  `idCita` int(6) NOT NULL,
  `idData` int(6) NOT NULL,
  `trans` text,
  `cf` varchar(255) NOT NULL DEFAULT '''''',
  `syn` varchar(255) NOT NULL DEFAULT '''''',
  `anto` varchar(255) NOT NULL DEFAULT '''''',
  `hom` varchar(255) NOT NULL DEFAULT '''''',
  `NB` varchar(255) NOT NULL DEFAULT '''''',
  PRIMARY KEY (`idCita`),
 FOREIGN KEY (idData) REFERENCES entry(idData) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Table structure for table `block`
--

CREATE TABLE IF NOT EXISTS `block` (
  `idBlock` int(11) NOT NULL,
  `idCita` int(11) NOT NULL,
  `lang` varchar(255) NOT NULL DEFAULT '''''',
  `fran` varchar(255) NOT NULL DEFAULT '''''',
  `genre` varchar(10) NOT NULL ,
  PRIMARY KEY (`idBlock`),
  FOREIGN KEY (idCita) REFERENCES cita(idCita) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------



