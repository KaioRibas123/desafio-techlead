-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Nov-2021 às 13:15
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `teste_techlead`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro`
--

CREATE TABLE `cadastro` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cadastro`
--

INSERT INTO `cadastro` (`id`, `nome`, `usuario`, `senha`) VALUES
(6, 'kaio', 'thaissa@123', '345'),
(7, '1234', '12345', '123456'),
(8, 'kaio', 'admin', '73046416'),
(9, 'thaissa', 'thaissa@oliveira', '123456'),
(10, 'kaio', 'thaissa@123', '345'),
(11, 'kaiophp', 'kaiophp@', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `ID` int(11) NOT NULL,
  `LIVRO` varchar(64) NOT NULL,
  `AUTOR` varchar(32) NOT NULL,
  `DATA_CADASTRO` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`ID`, `LIVRO`, `AUTOR`, `DATA_CADASTRO`) VALUES
(14, 'thaissa', 'cezar', '16012020'),
(15, 'kaio', 'olveira', '123456'),
(16, 'thaissa', 'cezar', '789456'),
(17, 'marcio', 'olveira', 'cabecademanga'),
(18, '', '', ''),
(19, '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_cadastro`
--

CREATE TABLE `tbl_cadastro` (
  `cadastro` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbl_cadastro`
--

INSERT INTO `tbl_cadastro` (`cadastro`, `nome`, `email`, `senha`) VALUES
(24, '', '', 'd41d8cd98f00b204e980'),
(25, '', '', 'd41d8cd98f00b204e980'),
(26, '', '', 'd41d8cd98f00b204e980'),
(27, '', '', 'd41d8cd98f00b204e980');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_esqueci_senha`
--

CREATE TABLE `tbl_esqueci_senha` (
  `idesquecisenha` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `nome` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_login`
--

CREATE TABLE `tbl_login` (
  `idlogin` int(11) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `senha` varchar(30) DEFAULT NULL,
  `fkcadastro` int(11) DEFAULT NULL,
  `fkesquecisenha` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `tbl_cadastro`
--
ALTER TABLE `tbl_cadastro`
  ADD PRIMARY KEY (`cadastro`);

--
-- Índices para tabela `tbl_esqueci_senha`
--
ALTER TABLE `tbl_esqueci_senha`
  ADD PRIMARY KEY (`idesquecisenha`);

--
-- Índices para tabela `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`idlogin`),
  ADD KEY `fkcadastro` (`fkcadastro`),
  ADD KEY `fkesquecisenha` (`fkesquecisenha`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastro`
--
ALTER TABLE `cadastro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `tbl_cadastro`
--
ALTER TABLE `tbl_cadastro`
  MODIFY `cadastro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `tbl_esqueci_senha`
--
ALTER TABLE `tbl_esqueci_senha`
  MODIFY `idesquecisenha` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `idlogin` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD CONSTRAINT `tbl_login_ibfk_1` FOREIGN KEY (`fkcadastro`) REFERENCES `tbl_cadastro` (`cadastro`),
  ADD CONSTRAINT `tbl_login_ibfk_2` FOREIGN KEY (`fkesquecisenha`) REFERENCES `tbl_esqueci_senha` (`idesquecisenha`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
