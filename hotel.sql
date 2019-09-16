-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 27-Nov-2017 às 22:10
-- Versão do servidor: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `idFuncionario` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `cpf` varchar(200) NOT NULL,
  `login` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  PRIMARY KEY (`idFuncionario`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`idFuncionario`, `nome`, `telefone`, `cpf`, `login`, `senha`) VALUES
(24, 'Vinicius', '123323232', '363.431.610-15', 'vinicius', 'd0994a8045ca160000fa0f2c2fecf81d'),
(17, 'Vinicius Henriques', '(51)98941-9700', '041.697.330-29', 'adm', 'd0994a8045ca160000fa0f2c2fecf81d');

-- --------------------------------------------------------

--
-- Estrutura da tabela `hospede`
--

DROP TABLE IF EXISTS `hospede`;
CREATE TABLE IF NOT EXISTS `hospede` (
  `idHospede` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `cpf` varchar(200) NOT NULL,
  `sexo` varchar(100) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `login` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  PRIMARY KEY (`idHospede`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `hospede`
--

INSERT INTO `hospede` (`idHospede`, `nome`, `cpf`, `sexo`, `telefone`, `login`, `senha`) VALUES
(13, 'Neila Salate', '363.431.610-15', 'Feminino', '11111111111', 'neila', '3a6f73fafca0b748204964f1698f17cb'),
(9, 'Vincius Henriques', '363.431.610-15', 'Masculino', '111111111111', 'hospede', 'd0994a8045ca160000fa0f2c2fecf81d'),
(12, 'Carlos Cuzao', '363.431.610-15', 'Feminino', '5555555555', 'carlos', 'd0994a8045ca160000fa0f2c2fecf81d');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

DROP TABLE IF EXISTS `reserva`;
CREATE TABLE IF NOT EXISTS `reserva` (
  `idReserva` bigint(20) NOT NULL AUTO_INCREMENT,
  `numQuarto` int(11) NOT NULL,
  `dataEntrada` date NOT NULL,
  `dataSaida` date NOT NULL,
  `status` varchar(200) NOT NULL,
  `valor` double NOT NULL,
  `calcularTotal` double NOT NULL,
  PRIMARY KEY (`idReserva`)
) ENGINE=MyISAM AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `reserva`
--

INSERT INTO `reserva` (`idReserva`, `numQuarto`, `dataEntrada`, `dataSaida`, `status`, `valor`, `calcularTotal`) VALUES
(95, 22, '1999-05-21', '1999-05-22', 'Simples Solteiro', 50, 50),
(94, 22, '9999-05-05', '9999-05-05', 'Simples Solteiro', 50, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
