-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Tempo de geração: 27/04/2022 às 17:24
-- Versão do servidor: 5.7.34
-- Versão do PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cadastroMedicos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `medicos`
--

CREATE TABLE `medicos` (
  `id` int(11) NOT NULL,
  `crm` varchar(12) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `idade` varchar(3) DEFAULT NULL,
  `genero` char(1) DEFAULT NULL,
  `especialidade` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `medicos`
--

INSERT INTO `medicos` (`id`, `crm`, `nome`, `idade`, `genero`, `especialidade`) VALUES
(1, '3454353', 'Pedro', '35', 'M', 'Pediatra'),
(2, '345434', 'Pedro', '35', 'M', 'Pediatra'),
(3, '123456', 'Pedro', '35', 'M', 'Pediatra'),
(5, '34344', 'Patrick', '23', 'M', 'Pediatra'),
(7, '45321', 'Millena', '33', 'F', 'pediatria'),
(9, '27263', 'millena', '29', 'F', 'pediatria'),
(10, '454545', 'Pedro', '31', 'M', 'neurologia'),
(14, '909090', 'Patrick', '54', 'M', 'cardiologia'),
(15, '56790', 'Maria da Silva', '56', 'F', 'pediatria'),
(16, '1234', 'Pedro', '34', 'M', 'pediatria'),
(18, '45543', 'Patrick', '34', 'M', 'pediatria');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
