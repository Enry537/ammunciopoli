-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: mysql.netsons.com
-- Generato il: Gen 17, 2015 alle 15:04
-- Versione del server: 5.5.36-log
-- Versione PHP: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fsbqilay_annunciopoli`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `annunci`
--

CREATE TABLE IF NOT EXISTS `annunci` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `titolo` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `provincia` varchar(255) NOT NULL,
  `prezzo` varchar(255) NOT NULL,
  `descrizione` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dump dei dati per la tabella `annunci`
--

INSERT INTO `annunci` (`id`, `titolo`, `categoria`, `provincia`, `prezzo`, `descrizione`, `mail`, `data`) VALUES
(1, 'Peugeot', 'Auto', 'Cagliari', '5000', 'Bellissima macchina', 'ms@email.it', '2014-09-15 00:40:24'),
(2, 'Kawasaki', 'Moto', 'Oristano', '7500', 'Bellissima moto', 'ms@email.it', '2014-09-19 13:17:14'),
(3, 'Prova', 'Altro', 'Cagliari', '123', 'Prova', 'ms@email.it', '2014-09-19 13:28:13'),
(4, 'Ford', 'Auto', 'Cagliari', '10000', 'Permuto ford fiesta per lamborghini gallardo', 'ed@email.it', '2014-09-20 18:01:05');

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE IF NOT EXISTS `utenti` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id`, `nome`, `mail`, `user`, `pass`) VALUES
(7, 'M S', 'ms@email.it', 'mattia', '25d55ad283aa400af464c76d713c07ad'),
(8, 'E D', 'ed@email.it', 'enrico', '25d55ad283aa400af464c76d713c07ad');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
