-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18/11/2025 às 19:50
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `kraken-launcher`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `favoritos`
--

CREATE TABLE `favoritos` (
  `id` int(50) DEFAULT NULL,
  `imagem` varchar(1000) DEFAULT NULL,
  `nome` varchar(300) DEFAULT NULL,
  `link` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `jogos`
--

CREATE TABLE `jogos` (
  `id` int(11) NOT NULL,
  `imagem` varchar(1000) DEFAULT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `link` varchar(1000) DEFAULT NULL,
  `estatus` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `jogos`
--

INSERT INTO `jogos` (`id`, `imagem`, `nome`, `link`, `estatus`) VALUES
(13, 'https://tse3.mm.bing.net/th/id/OIP.tCFURJJ2HSYTBk6HFkefgAHaEK?rs=1&pid=ImgDetMain&o=7&rm=3', 'Hollow Knight', 'https://store.steampowered.com/app/367520/Hollow_Knight/', 'false'),
(14, 'https://tse3.mm.bing.net/th/id/OIP.tCFURJJ2HSYTBk6HFkefgAHaEK?rs=1&pid=ImgDetMain&o=7&rm=3', 'Seinen', 'https://store.steampowered.com/app/367520/Hollow_Knight/', 'false');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `jogos`
--
ALTER TABLE `jogos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `jogos`
--
ALTER TABLE `jogos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
