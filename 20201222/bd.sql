-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Dez-2020 às 19:43
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
(28, 2, 222222, 2, '2020-12-01'),
(30, 6, 222222, 6, '2020-12-06'),
(31, 3, 270387, 3, '2020-12-07'),
(32, 4, 604227, 4, '2020-12-08'),
(33, 6, 999999, 6, '2020-12-08'),
(35, 2, 270387, 2, '2020-12-10'),
(36, 3, 222222, 3, '2020-12-11'),
(37, 4, 222222, 4, '2021-01-12'),
(38, 6, 999999, 6, '2020-12-02'),
(39, 8, 222222, 8, '2020-12-23'),
(40, 8, 270387, 8, '2020-12-02'),
(41, 3, 604227, 3, '2020-12-19'),
(43, 4, 604227, 4, '2020-12-22'),
(46, 6, 270387, 6, '2020-12-01'),
(47, 8, 270387, 8, '2020-12-03'),
(48, 2, 604227, 2, '2020-11-29'),
(49, 12, 401835, 6, '2020-12-15'),
(50, 10, 650000, 3, '2020-12-15');

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
(3, 'Aventura'),
(4, 'Suspense Policial'),
(5, 'Suspense'),
(6, 'Romance'),
(8, 'Ficção Juvenil');

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
(6, 6, 'Dom Casmurro', 'Machado de Assis', 1899, 400, 'Livraria Garnier'),
(8, 8, 'As vantagens de ser invisivel', ' Stephen Chbosky', 2012, 220, 'Pocket Books'),
(9, 2, 'Drácula', 'Bram Stoker', 1897, 603, 'Archibald Constable and Company '),
(10, 3, 'Alice no País das Maravilhas', 'Lewis Carroll', 1865, 17, 'MacMillan'),
(11, 5, 'O homem de giz', ' C.J. Tudor', 2018, 334, 'Intrinseca'),
(12, 6, 'Orgulho e Preconceito', 'Jane Austen', 1813, 278, 'T. Egerton, Whitehall');

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
  `senha` char(32) NOT NULL,
  `permissao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`cpf`, `nome_usuario`, `email`, `telefone`, `cep`, `senha`, `permissao`) VALUES
(111111, 'Administrador', 'admin@admin.com', 977814357, 15687455, '4badaee57fed5610012a296273158f5f', 1),
(222222, 'Carlos Eduardo Siqueira', 'carlos.edu@email.com', 98123456, 13789566, 'e4ae5a0d155ae14613e6cd907bf7040a', 2),
(270387, 'Fernando Garcia 09', 'fernando@email.com', 33245747, 15203998, '827ccb0eea8a706c4c34a16891f84e7b', 2),
(401835, 'Fabricio Silva', 'fabricio@email.com', 99656432, 9999999, 'c18ba39368ea85f954a4391775c8f212', 2),
(604227, 'Fernanda Pitanga ', 'fernanda@email.com', 159814357, 15687455, '827ccb0eea8a706c4c34a16891f84e7b', 2),
(650000, 'Paola Florentino', 'paola@email.com', 986545, 3222222, '4fc90a71bcc1da84edd23de2dabae7ec', 2),
(888888, 'Eduardo Antuner', 'eduardo@email.com', 995463452, 12345766, 'dfdc20cbab482c8d159f42d3250d1f7c', 2),
(993310, 'Tales Roberto', 'tales@email.com', 9965452, 16590233, '4d856efeaefb6ab89eb27286e2f907e6', 2),
(999999, 'Julia Silva 03', 'julia.silva@email.com', 997965631, 987555765, 'c4ded2b85cc5be82fa1d2464eba9a7d3', 2),
(2147483647, 'Renata Amancio', 'renata@email.com', 2147483647, 23423422, '4badaee57fed5610012a296273158f5f', 2);

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
  MODIFY `id_emprestimo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `id_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
