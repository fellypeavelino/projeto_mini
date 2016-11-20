-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 20/11/2016 às 18:57
-- Versão do servidor: 10.0.27-MariaDB-0ubuntu0.16.04.1
-- Versão do PHP: 7.0.8-3+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `frelancer`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `adress`
--

CREATE TABLE `adress` (
  `id` int(10) UNSIGNED NOT NULL,
  `number` int(11) NOT NULL,
  `street` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Fazendo dump de dados para tabela `adress`
--

INSERT INTO `adress` (`id`, `number`, `street`, `district`, `city`, `state`, `client_id`) VALUES
(1, 111, 'dhlka', 'slkhlkdl', 'hlkvdlv', 'nczlkvnfls', 5),
(2, 112, 'wrerae', 'fadfa', 'dzfdfd', 'ddsgs', 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `client`
--

CREATE TABLE `client` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Fazendo dump de dados para tabela `client`
--

INSERT INTO `client` (`id`, `name`, `login`, `password`) VALUES
(2, 'felipe', 'lipe', '123'),
(3, 'pedro3', 'peo', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 'maria', 'mari', '202cb962ac59075b964b07152d234b70'),
(5, 'juliana2', 'ju4', 'd14388bb836687ff2b16b7bee6bab182'),
(6, 'uginho', 'ug', '6e1ff1976ef507dfe2693cfcbdd9aae6'),
(7, 'fael', 'fa', '66e967111cda35e89cc341411e8256f5'),
(8, 'novo', 'novinho', '2cfd4560539f887a5e420412b370b361');

-- --------------------------------------------------------

--
-- Estrutura para tabela `LegalPerson`
--

CREATE TABLE `LegalPerson` (
  `id` int(10) UNSIGNED NOT NULL,
  `cnpj` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Fazendo dump de dados para tabela `LegalPerson`
--

INSERT INTO `LegalPerson` (`id`, `cnpj`, `client_id`) VALUES
(1, 89800999989, 4),
(2, 89899, 8);

-- --------------------------------------------------------

--
-- Estrutura para tabela `mail`
--

CREATE TABLE `mail` (
  `id` int(10) UNSIGNED NOT NULL,
  `mail` varchar(255) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Fazendo dump de dados para tabela `mail`
--

INSERT INTO `mail` (`id`, `mail`, `client_id`) VALUES
(1, 'fellypeavelino@hotmail.com', 6),
(2, 'felipeavel3@gmail.com', 6),
(4, 'mariacarmo51@yahoo.com', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `phone`
--

CREATE TABLE `phone` (
  `id` int(10) UNSIGNED NOT NULL,
  `phone` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Fazendo dump de dados para tabela `phone`
--

INSERT INTO `phone` (`id`, `phone`, `client_id`) VALUES
(1, 66666, 7),
(2, 9989000, 7),
(3, 666667, 7),
(4, 66656, 7),
(5, 4444, 7),
(6, 555, 7),
(7, 6767, 2),
(8, 77887, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `PhysicalPerson`
--

CREATE TABLE `PhysicalPerson` (
  `id` int(10) UNSIGNED NOT NULL,
  `cpf` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Fazendo dump de dados para tabela `PhysicalPerson`
--

INSERT INTO `PhysicalPerson` (`id`, `cpf`, `client_id`) VALUES
(1, 2147483647, 2),
(2, 80084143, 3),
(3, 798798796, 5),
(4, 879687, 6),
(5, 787, 7);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `adress`
--
ALTER TABLE `adress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Índices de tabela `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `LegalPerson`
--
ALTER TABLE `LegalPerson`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Índices de tabela `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Índices de tabela `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Índices de tabela `PhysicalPerson`
--
ALTER TABLE `PhysicalPerson`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `adress`
--
ALTER TABLE `adress`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `client`
--
ALTER TABLE `client`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de tabela `LegalPerson`
--
ALTER TABLE `LegalPerson`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `mail`
--
ALTER TABLE `mail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de tabela `phone`
--
ALTER TABLE `phone`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de tabela `PhysicalPerson`
--
ALTER TABLE `PhysicalPerson`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `adress`
--
ALTER TABLE `adress`
  ADD CONSTRAINT `adress_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

--
-- Restrições para tabelas `LegalPerson`
--
ALTER TABLE `LegalPerson`
  ADD CONSTRAINT `LegalPerson_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

--
-- Restrições para tabelas `mail`
--
ALTER TABLE `mail`
  ADD CONSTRAINT `mail_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

--
-- Restrições para tabelas `phone`
--
ALTER TABLE `phone`
  ADD CONSTRAINT `phone_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

--
-- Restrições para tabelas `PhysicalPerson`
--
ALTER TABLE `PhysicalPerson`
  ADD CONSTRAINT `PhysicalPerson_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
