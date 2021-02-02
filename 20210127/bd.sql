-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Fev-2021 às 17:20
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `revisao_aula`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `prontuario` varchar(8) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `data_nascimento` date NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `senha` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`prontuario`, `nome`, `email`, `data_nascimento`, `sexo`, `senha`) VALUES
('111111', 'Ricardo dos Santos Ferreira', 'ricardo@email.com', '2000-09-20', 'M', ''),
('123123', 'Gisele dos Santos Ferreira', 'gisele@email.com', '1999-01-05', 'F', ''),
('123456', 'Ana da Silva dos Santos', 'anasilva@email.com', '2000-01-01', 'F', ''),
('12345678', 'Fatima', 'Fatima@email.com', '2003-06-27', 'f', ''),
('333333', 'Altair', 'altair@altair.com', '2000-02-08', 'm', ''),
('44444444', 'Amanda', 'amanda@email', '2000-03-02', 'f', ''),
('61019423', 'Amalia Melo', 'amalia.melo@aluno.ifsp.edu.br', '2002-06-30', 'f', ''),
('61213456', 'Maria Aparecida de Oliveira', 'maria@email.com', '1999-06-20', 'f', ''),
('654321', 'João da Silva Santos', 'joao@email.com', '1999-02-03', 'M', ''),
('67972594', 'Pamela Melo', 'pamela.melo@aluno.ifsp.edu.br', '2003-05-01', 'f', ''),
('85487659', 'Pamela Melo', 'pamela@email.com', '1980-12-02', 'f', ''),
('89101112', 'Giovani', 'giovani@email.com', '1998-06-05', 'm', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `nivel_permissao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id`, `nome`, `nivel_permissao`) VALUES
(1, 'Administrador', 3),
(2, 'Professor', 2),
(3, 'Aluno', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissao`
--

CREATE TABLE `permissao` (
  `nivel` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `permissao`
--

INSERT INTO `permissao` (`nivel`, `descricao`) VALUES
(1, 'Permissão básica'),
(2, 'Permissão média'),
(3, 'Permissão alta');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `prontuario` varchar(8) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `formacao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`prontuario`, `nome`, `email`, `formacao`) VALUES
('01276476', 'Fatima Ferreira dos Santos', 'fatima.ferreira@ifsp.edu.br', 'Bacharel em Ciências da Computação'),
('1890417', 'Pamela Melo', 'pamela@email.com', 'Artes'),
('222222', 'Marcos', 'marcos@email.com', 'Fisica'),
('333333', 'Janaina', 'janaina@email.com', 'Programação'),
('4444444', 'Paulo', 'paulo@email.com', 'matematica');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `cpf` varchar(14) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo` enum('aluno','professor','administrador') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`cpf`, `email`, `senha`, `tipo`) VALUES
('270.387.100-79', 'joana@email.com', '202cb962ac59075b964b07152d234b70', 'administrador'),
('32397985810', 'deniszaniro@ifsp.edu.br', '202cb962ac59075b964b07152d234b70', 'professor'),
('664.046.970-76', 'jhonatam@email.com', '202cb962ac59075b964b07152d234b70', 'aluno'),
('856.726.800-11', 'otavio@email.com', '202cb962ac59075b964b07152d234b70', 'professor'),
('888.888.888-88', 'luisa@email.com', '202cb962ac59075b964b07152d234b70', 'professor'),
('999.999.999-99', 'lorena@email.com', '202cb962ac59075b964b07152d234b70', 'professor');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`prontuario`);

--
-- Índices para tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nivel_permissao_fk` (`nivel_permissao`);

--
-- Índices para tabela `permissao`
--
ALTER TABLE `permissao`
  ADD PRIMARY KEY (`nivel`);

--
-- Índices para tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`prontuario`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cpf`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
