-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02/12/2025 às 03:50
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
-- Banco de dados: `kraken_db`
--

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
(16, 'https://wallpapers.com/images/hd/among-us-pictures-frg8lbdw0bgau4ki.jpg', 'Among Us', 'https://store.steampowered.com/app/945360/Among_Us/', 'false'),
(17, 'https://tse1.mm.bing.net/th/id/OIP.NhAOtW4q4L9f5AbGFhiNcAHaEK?rs=1&pid=ImgDetMain&o=7&rm=3', 'Elden Ring', 'https://store.steampowered.com/app/1245620/ELDEN_RING/', 'false'),
(18, 'https://th.bing.com/th/id/R.ba4719cd2363c685fe06ef9befa68d55?rik=BOLbfSzFvi2Iqw&riu=http%3a%2f%2fgetwallpapers.com%2fwallpaper%2ffull%2f3%2fc%2fa%2f782669-cool-terraria-wallpaper-hd-1920x1080-for-lockscreen.jpg&ehk=k0r8f6iQgaqZQJ9uU612VKIWe81Hkv%2bpIAG8wQo3doc%3d&risl=&pid=ImgRaw&r=0', 'Terraria', 'https://store.steampowered.com/app/105600/Terraria/', 'false'),
(19, 'https://comicbook.com/wp-content/uploads/sites/4/2025/07/EA-Sports-FC-26-Cover.jpg', 'EA SPORTS FC™ 26', 'https://store.steampowered.com/app/3405690/EA_SPORTS_FC_26/', 'false'),
(20, 'https://cdn1.epicgames.com/offer/b0cd075465c44f87be3b505ac04a2e46/EGS_GrandTheftAutoVEnhanced_RockstarNorth_S1_2560x1440-906d8ae76a91aafc60b1a54c23fab496', 'Grand Theft Auto V Enhanced', 'https://store.steampowered.com/app/3240220/Grand_Theft_Auto_V_Enhanced/', 'false'),
(21, 'https://cdn-cf.ginx.tv/imgcdn/HBApxTng-GZ8cR-kIbJqhDxKJmYUumEKsEvG-8wscxk/rs:fill:1350:760:1/g:ce/aHR0cHM6Ly93d3cuZ2lueC50di91cGxvYWRzMy9GaXZlIE5pZ2h0cyBBdCBGcmVkZHlfcy9mbmFmaHMyLnBuZw', 'Five Nights at Freddys: Help Wanted 2', 'https://store.steampowered.com/app/2287520/Five_Nights_at_Freddys_Help_Wanted_2/', 'false'),
(22, 'https://th.bing.com/th/id/R.980a0e0c2853c9c59ce5b927f70e5d42?rik=KThNLFHQAZtwOg&pid=ImgRaw&r=0', 'Red Dead Redemption 2', 'https://store.steampowered.com/app/1174180/Red_Dead_Redemption_2/', 'false'),
(23, 'https://th.bing.com/th/id/R.a32581cf9948a9a2e24b2ff15c1577c7?rik=EU2kFPxDHuPt%2bg&pid=ImgRaw&r=0', 'Dead by Daylight', 'https://store.steampowered.com/app/381210/Dead_by_Daylight/', 'false'),
(24, 'https://www.geekgeneration.fr/wp-content/uploads/2021/02/Tom-Clancys-Rainbow-Six-Siege.jpg', 'Tom Clancy Rainbow Six Siege', 'https://store.steampowered.com/app/359550/Tom_Clancys_Rainbow_Six_Siege_X/', 'false'),
(25, 'https://cdn1.epicgames.com/offer/77f2b98e2cef40c8a7437518bf420e47/EGS_Cyberpunk2077_CDPROJEKTRED_S1_03_2560x1440-359e77d3cd0a40aebf3bbc130d14c5c7', 'Cyberpunk 2077', 'https://store.steampowered.com/app/1091500/Cyberpunk_2077/', 'false'),
(26, 'https://tse2.mm.bing.net/th/id/OIP.i-h80xeYHuedEuGIxMmmrQHaEK?rs=1&pid=ImgDetMain&o=7&rm=3', 'Resident Evil 7 ', 'https://store.steampowered.com/app/418370/Resident_Evil_7_Biohazard/', 'false'),
(27, 'https://th.bing.com/th/id/R.74dcae624b1049246abd970204158a1d?rik=r0SSwNFga%2fkOmw&pid=ImgRaw&r=0', 'Call of Duty®: Black Ops III', 'https://store.steampowered.com/app/311210/Call_of_Duty_Black_Ops_III/', 'false'),
(28, 'https://tse3.mm.bing.net/th/id/OIP.fTh_ATE2qq4aU1zCU9ceUQHaEK?rs=1&pid=ImgDetMain&o=7&rm=3', 'Need for Speed™ Heat', 'https://store.steampowered.com/app/1222680/Need_for_Speed_Heat/', 'false'),
(29, 'https://tse2.mm.bing.net/th/id/OIP.RA3T1bw1aKUIahzViAXAlQHaEK?rs=1&pid=ImgDetMain&o=7&rm=3', 'DARK SOULS™: REMASTERED', 'https://store.steampowered.com/app/570940/DARK_SOULS_REMASTERED/', 'false');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
