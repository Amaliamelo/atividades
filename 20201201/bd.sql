-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Dez-2020 às 20:24
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
-- Banco de dados: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimo`
--

CREATE TABLE `emprestimo` (
  `id_emprestimo` int(11) NOT NULL,
  `cod_livro` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `cod_genero` int(11) NOT NULL,
  `data_emprestimo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `emprestimo`
--

INSERT INTO `emprestimo` (`id_emprestimo`, `cod_livro`, `cod_usuario`, `cod_genero`, `data_emprestimo`) VALUES
(26, 2, 604227, 2, '2020-12-06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(11) NOT NULL,
  `nome_genero` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `genero`
--

INSERT INTO `genero` (`id_genero`, `nome_genero`) VALUES
(2, 'Terror'),
(3, 'adventure'),
(4, 'Suspense Policial'),
(5, 'suspense'),
(6, 'Romance'),
(7, 'Action');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `id_livro` int(11) NOT NULL,
  `cod_genero` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `ano` int(4) NOT NULL,
  `paginas` int(11) NOT NULL,
  `editora` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`id_livro`, `cod_genero`, `titulo`, `autor`, `ano`, `paginas`, `editora`) VALUES
(2, 2, 'IT- a coisa', ' Stephen King', 1987, 300, 'Viking Pressjklk'),
(3, 3, 'Coraline', 'Neil Gaiman', 2002, 224, 'Intrínseca'),
(4, 4, 'As Aventuras de Sherlock Holmes ', ' Arthur Conan Doyle', 1892, 300, 'George Newnes'),
(5, 5, 'Bird Box', 'Josh Malerman', 2014, 273, 'Ecco Press'),
(6, 6, 'Dom Casmurro', 'Machado de Assis', 1899, 400, 'Livraria Garnier'),
(7, 7, 'The Hunger Games', 'Suzanne Collins', 2008, 256, 'Scholastic');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `cpf` int(12) NOT NULL,
  `nome_usuario` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` int(9) NOT NULL,
  `cep` int(8) NOT NULL,
  `senha` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`cpf`, `nome_usuario`, `email`, `telefone`, `cep`, `senha`) VALUES
(270387, 'Fernando Garcia', 'fernando@email.com', 33245747, 15203998, '827ccb0eea8a706c4c34a16891f84e7b'),
(604227, 'Fernanda Pitanga', 'fernanda@email.com', 9814357, 15687455, '6562c5c1f33db6e05a082a88cddab5ea'),
(664046, 'Amalia Melo', 'amalia@amalia.com', 9987656, 2345677, '46d045ff5190f6ea93739da6c0aa19bc'),
(999999, 'Julia Silva', 'julia.silva@email.com', 979656, 987555765, 'c4ded2b85cc5be82fa1d2464eba9a7d3');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD PRIMARY KEY (`id_emprestimo`),
  ADD KEY `cod_livro` (`cod_livro`),
  ADD KEY `cod_usuario` (`cod_usuario`),
  ADD KEY `cod_genero` (`cod_genero`);

--
-- Índices para tabela `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`);

--
-- Índices para tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`id_livro`),
  ADD KEY `genero` (`cod_genero`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cpf`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  MODIFY `id_emprestimo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `id_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD CONSTRAINT `emprestimo_ibfk_1` FOREIGN KEY (`cod_livro`) REFERENCES `livro` (`id_livro`),
  ADD CONSTRAINT `emprestimo_ibfk_2` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`cpf`),
  ADD CONSTRAINT `emprestimo_ibfk_3` FOREIGN KEY (`cod_genero`) REFERENCES `genero` (`id_genero`);

--
-- Limitadores para a tabela `livro`
--
ALTER TABLE `livro`
  ADD CONSTRAINT `livro_ibfk_1` FOREIGN KEY (`cod_genero`) REFERENCES `genero` (`id_genero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
