-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Jan-2021 às 20:00
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
-- Banco de dados: `escola`
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
  `sexo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`prontuario`, `nome`, `email`, `data_nascimento`, `sexo`) VALUES
('111111', 'Ricardo dos Santos Ferreira', 'ricardo@email.com', '2000-09-20', 'M'),
('123123', 'Gisele dos Santos Ferreira', 'gisele@email.com', '1999-01-05', 'F'),
('123456', 'Ana da Silva dos Santos', 'anasilva@email.com', '2000-01-01', 'F'),
('12345678', 'Fatima', 'Fatima@email.com', '2003-06-27', 'f'),
('1967542', 'Antonio Fagundes', 'antonio.fagundes@email.com', '1998-05-04', 'm'),
('333333', 'Altair', 'altair@altair.com', '2000-02-08', 'm'),
('44444444', 'Amanda', 'amanda@email', '2000-03-02', 'f'),
('61019423', 'Amalia Melo', 'amalia.melo@aluno.ifsp.edu.br', '2002-06-30', 'f'),
('61213456', 'Maria Aparecida de Oliveira', 'maria@email.com', '1999-06-20', 'f'),
('654321', 'João da Silva Santos', 'joao@email.com', '1999-02-03', 'M'),
('67972594', 'Pamela Melo', 'pamela.melo@aluno.ifsp.edu.br', '2003-05-01', 'f'),
('777777', 'Gabriel Melo', 'gabriel.melo@gmail.com', '1999-09-07', 'm'),
('85487659', 'Pamela Melo', 'pamela@email.com', '1980-12-02', 'f'),
('89101112', 'Giovani', 'giovani@email.com', '1998-06-05', 'm');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `Id_disciplina` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `cod_professor` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`Id_disciplina`, `nome`, `descricao`, `cod_professor`) VALUES
(5, 'Artes', 'historia da arte e artes plásticas', '1890417'),
(6, 'ALP', 'Algoritimo e programação', '222222'),
(7, 'Matematica', 'Matematica basica', '4444444'),
(8, 'Fisica', 'fisica avançada', '222222');

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
('175248', 'Paula Souza', 'paula.souza@gmail.com', 'Bacharel em Sistemas de Informação'),
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
  `id_perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`cpf`, `email`, `senha`, `id_perfil`) VALUES
('', 'antonio.fagundes@email.com', '827ccb0eea8a706c4c34a16891f84e7b', 3),
('01276476', 'fatima.ferreira@ifsp.edu.br', 'dfdc20cbab482c8d159f42d3250d1f7c', 2),
('175248', 'paula.souza@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2),
('1967542', 'antonio.fagundes@email.com', '81dc9bdb52d04dc20036dbd8313ed055', 3),
('32397985810', 'deniszaniro@ifsp.edu.br', 'aa1bf4646de67fd9086cf6c79007026c', 2),
('51339432889', 'pauloholanda@aluno.ifsp.edu.br', '4e411f3d0d972c6761f9648ef5ed2a98', 3),
('61019423', 'amalia.melo@aluno.ifsp.edu.br', '827ccb0eea8a706c4c34a16891f84e7b', 1),
('67972594', 'pamela.melo@aluno.ifsp.edu.br', '6562c5c1f33db6e05a082a88cddab5ea', 3),
('777777', 'gabriel.melo@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 3),
('78635220803', 'maria@ifsp.edu.br', 'ab56b4d92b40713acc5af89985d4b786', 1),
('83384464168', 'matheus@aluno.ifsp.edu.br', '168d1b7a9535fe6803ef1cad01272145', 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`prontuario`);

--
-- Índices para tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`Id_disciplina`),
  ADD KEY `cod_professor` (`cod_professor`);

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
  ADD PRIMARY KEY (`cpf`),
  ADD KEY `id_perfil_fk` (`id_perfil`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `Id_disciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD CONSTRAINT `disciplina_ibfk_1` FOREIGN KEY (`cod_professor`) REFERENCES `professor` (`prontuario`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `nivel_permissao_fk` FOREIGN KEY (`nivel_permissao`) REFERENCES `permissao` (`nivel`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `id_perfil_fk` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
