-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Dez-2020 às 20:54
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
-- Banco de dados: `taxonomia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `especie`
--

CREATE TABLE `especie` (
  `id_especie` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `nome_cientifico` varchar(100) NOT NULL,
  `cod_genero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `especie`
--

INSERT INTO `especie` (`id_especie`, `nome`, `nome_cientifico`, `cod_genero`) VALUES
(1, 'Cachorro', 'Canis lupos familiaris', 1),
(2, 'Leão', 'Panthera leo', 3),
(3, 'Tigre', 'Panthera tigris', 3),
(4, 'Lobo', 'Canis lupus lupus', 1),
(5, 'Cachorro do Mato', 'Cerdocyon thous', 2),
(6, 'Leopardo', 'Panthera pardus', 3),
(7, 'Onça Pintada', 'Panthera onca', 3),
(8, 'Sapiens', 'Homo Sapiens', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `familia`
--

CREATE TABLE `familia` (
  `id_familia` int(1) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `nome_cientifico` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `familia`
--

INSERT INTO `familia` (`id_familia`, `nome`, `nome_cientifico`) VALUES
(1, 'Canídeos', 'canidae'),
(2, 'Felinos', 'felidae'),
(3, ' Homini', ' Homini');

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(11) NOT NULL,
  `nome_cientifico` varchar(100) NOT NULL,
  `cod_familia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `genero`
--

INSERT INTO `genero` (`id_genero`, `nome_cientifico`, `cod_familia`) VALUES
(1, 'Canis', 1),
(2, 'Cerdocyon', 1),
(3, 'Panthera', 2),
(4, 'homo', 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `especie`
--
ALTER TABLE `especie`
  ADD PRIMARY KEY (`id_especie`),
  ADD KEY `cod_genero` (`cod_genero`),
  ADD KEY `cod_genero_2` (`cod_genero`),
  ADD KEY `cod_genero_3` (`cod_genero`);

--
-- Índices para tabela `familia`
--
ALTER TABLE `familia`
  ADD PRIMARY KEY (`id_familia`);

--
-- Índices para tabela `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`),
  ADD KEY `cod_familia` (`cod_familia`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `especie`
--
ALTER TABLE `especie`
  MODIFY `id_especie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `familia`
--
ALTER TABLE `familia`
  MODIFY `id_familia` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `especie`
--
ALTER TABLE `especie`
  ADD CONSTRAINT `especie_ibfk_1` FOREIGN KEY (`cod_genero`) REFERENCES `genero` (`id_genero`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `genero`
--
ALTER TABLE `genero`
  ADD CONSTRAINT `genero_ibfk_1` FOREIGN KEY (`cod_familia`) REFERENCES `familia` (`id_familia`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
