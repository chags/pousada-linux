-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Maio-2021 às 03:54
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pousada`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `logs`
--

CREATE TABLE `logs` (
  `id_log` int(11) NOT NULL,
  `log_tempo` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `log_observacao` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `logs`
--

INSERT INTO `logs` (`id_log`, `log_tempo`, `log_observacao`) VALUES
(90, '2021-05-16 22:36:13', 'cristiano Entrou na pousada'),
(91, '2021-05-16 22:40:56', 'um hospede saiu da pousada'),
(92, '2021-05-16 22:41:14', 'cristiano Entrou na pousada'),
(93, '2021-05-16 22:45:47', 'um hospede saiu da pousada'),
(94, '2021-05-16 22:46:05', 'did Entrou na pousada'),
(95, '2021-05-16 22:48:12', 'um hospede saiu da pousada'),
(96, '2021-05-16 22:48:35', 'cristiano Entrou na pousada'),
(97, '2021-05-16 22:52:21', 'aline Entrou na pousada'),
(98, '2021-05-16 22:54:55', 'aaaa Entrou na pousada'),
(99, '2021-05-16 22:57:31', 'um hospede saiu da pousada'),
(100, '2021-05-16 22:57:32', 'um hospede saiu da pousada'),
(101, '2021-05-16 22:57:32', 'um hospede saiu da pousada'),
(102, '2021-05-16 22:57:50', 'ddd Entrou na pousada'),
(103, '2021-05-16 23:05:24', 'um hospede saiu da pousada'),
(104, '2021-05-16 23:06:16', 'dd Entrou na pousada'),
(105, '2021-05-16 23:08:59', 'dd Entrou na pousada'),
(106, '2021-05-16 23:11:42', 'dd Entrou na pousada'),
(107, '2021-05-16 23:13:23', 'dd Entrou na pousada'),
(108, '2021-05-16 23:14:01', 'dd Entrou na pousada'),
(109, '2021-05-16 23:14:37', 'dd Entrou na pousada'),
(110, '2021-05-16 23:16:00', 'dd Entrou na pousada'),
(111, '2021-05-16 23:17:24', 'cris Entrou na pousada'),
(112, '2021-05-16 23:20:48', 'ddd Entrou na pousada'),
(113, '2021-05-16 23:24:10', 'aaaaaaaaaaaa Entrou na pousada'),
(114, '2021-05-16 23:25:49', 'qqqqqqqqqqqqq Entrou na pousada'),
(115, '2021-05-16 23:28:02', 'www Entrou na pousada'),
(116, '2021-05-16 23:29:15', 'cris Entrou na pousada'),
(117, '2021-05-16 23:31:42', 'loren Entrou na pousada'),
(118, '2021-05-16 23:34:22', 'loren Entrou na pousada'),
(119, '2021-05-16 23:35:39', 'cristiano Entrou na pousada'),
(120, '2021-05-16 23:38:42', 'homa Entrou na pousada'),
(121, '2021-05-16 23:39:01', 'ddd Entrou na pousada'),
(122, '2021-05-16 23:45:54', 'cristiano Entrou na pousada'),
(123, '2021-05-16 23:46:13', 'luiz Entrou na pousada'),
(124, '2021-05-16 23:49:22', 'alinnn Entrou na pousada'),
(125, '2021-05-16 23:54:38', 'amigo Entrou na pousada'),
(126, '2021-05-16 23:54:49', 'um hospede saiu da pousada'),
(127, '2021-05-16 23:54:54', 'cristiano Entrou na pousada'),
(128, '2021-05-17 00:10:04', 'um hospede saiu da pousada'),
(129, '2021-05-17 00:10:10', 'Lorena Entrou na pousada'),
(130, '2021-05-17 00:10:22', 'cristiano Entrou na pousada'),
(131, '2021-05-17 00:12:24', 'luiz Entrou na pousada'),
(132, '2021-05-17 00:52:06', 'um hospede saiu da pousada'),
(133, '2021-05-17 00:52:15', 'um hospede saiu da pousada'),
(134, '2021-05-17 00:52:24', 'um hospede saiu da pousada'),
(135, '2021-05-17 00:52:26', 'cristiano Entrou na pousada'),
(136, '2021-05-17 00:58:42', 'lorena Entrou na pousada'),
(137, '2021-05-17 01:00:08', 'cristine Entrou na pousada'),
(138, '2021-05-17 01:20:23', 'luiz Entrou na pousada'),
(139, '2021-05-17 01:20:23', '12 Entra na sala'),
(140, '2021-05-17 01:22:45', '12 Entra na sala'),
(141, '2021-05-17 01:25:07', '12 Entra na sala'),
(142, '2021-05-17 01:27:28', '12 Entra na sala'),
(143, '2021-05-17 01:29:50', '12 Entra na sala'),
(144, '2021-05-17 01:32:11', '12 Entra na sala'),
(145, '2021-05-17 01:34:33', '12 Entra na sala'),
(146, '2021-05-17 01:36:55', '12 Entra na sala'),
(147, '2021-05-17 01:39:20', '12 Entra na sala'),
(148, '2021-05-17 01:41:42', '12 Entra na sala'),
(149, '2021-05-17 01:44:03', '12 Entra na sala'),
(150, '2021-05-17 01:46:25', '12 Entra na sala'),
(151, '2021-05-17 01:48:47', '12 Entra na sala'),
(152, '2021-05-17 01:51:09', '12 Entra na sala'),
(153, '2021-05-17 02:00:17', '12 Entra na sala'),
(154, '2021-05-17 02:00:58', '12 Entra na sala'),
(155, '2021-05-17 02:01:38', '12 Entra na sala'),
(156, '2021-05-17 02:02:19', '12 Entra na sala'),
(157, '2021-05-17 02:02:59', '12 Entra na sala'),
(158, '2021-05-17 02:03:40', '12 Entra na sala'),
(159, '2021-05-17 02:04:20', '12 Entra na sala'),
(160, '2021-05-17 02:05:01', '12 Entra na sala'),
(161, '2021-05-17 02:05:41', '12 Entra na sala'),
(162, '2021-05-17 02:06:22', '12 Entra na sala'),
(163, '2021-05-17 02:07:02', '12 Entra na sala'),
(164, '2021-05-17 02:07:43', '12 Entra na sala'),
(165, '2021-05-17 02:08:23', '12 Entra na sala'),
(166, '2021-05-17 02:09:03', '12 Entra na sala'),
(167, '2021-05-17 02:09:44', '12 Entra na sala'),
(168, '2021-05-17 02:10:24', '12 Entra na sala'),
(169, '2021-05-17 02:11:05', '12 Entra na sala'),
(170, '2021-05-17 02:11:45', '12 Entra na sala'),
(171, '2021-05-17 02:12:26', '12 Entra na sala'),
(172, '2021-05-17 02:13:06', '12 Entra na sala'),
(173, '2021-05-17 02:13:47', '12 Entra na sala'),
(174, '2021-05-17 02:14:27', '12 Entra na sala'),
(175, '2021-05-17 02:15:08', '12 Entra na sala'),
(176, '2021-05-17 02:15:48', '12 Entra na sala'),
(177, '2021-05-17 02:16:29', '12 Entra na sala'),
(178, '2021-05-17 02:17:09', '12 Entra na sala'),
(179, '2021-05-17 02:17:50', '12 Entra na sala'),
(180, '2021-05-17 02:18:30', '12 Entra na sala'),
(181, '2021-05-17 02:19:11', '12 Entra na sala'),
(182, '2021-05-17 02:19:51', '12 Entra na sala'),
(183, '2021-05-17 02:44:37', 'crist Entrou na pousada'),
(184, '2021-05-17 02:44:37', '13 Entra na sala'),
(185, '2021-05-17 02:45:17', '13 Entra na sala'),
(186, '2021-05-17 02:45:58', '13 Entra na sala'),
(187, '2021-05-17 02:46:38', '13 Entra na sala'),
(188, '2021-05-17 02:47:19', '13 Entra na sala'),
(189, '2021-05-17 02:47:59', '13 Entra na sala'),
(190, '2021-05-17 02:48:40', '13 Entra na sala'),
(191, '2021-05-17 02:49:20', '13 Entra na sala'),
(192, '2021-05-17 02:50:00', '13 Entra na sala'),
(193, '2021-05-17 02:50:41', '13 Entra na sala'),
(194, '2021-05-17 02:51:21', '13 Entra na sala'),
(195, '2021-05-17 02:52:02', '13 Entra na sala'),
(196, '2021-05-17 02:52:42', '13 Entra na sala'),
(197, '2021-05-17 02:53:23', '13 Entra na sala'),
(198, '2021-05-17 02:54:03', '13 Entra na sala'),
(199, '2021-05-17 02:54:44', '13 Entra na sala'),
(200, '2021-05-17 02:55:24', '13 Entra na sala'),
(201, '2021-05-17 02:56:05', '13 Entra na sala'),
(202, '2021-05-17 02:56:45', '13 Entra na sala'),
(203, '2021-05-17 02:57:26', '13 Entra na sala'),
(204, '2021-05-17 02:58:06', '13 Entra na sala'),
(205, '2021-05-17 02:58:47', '13 Entra na sala'),
(206, '2021-05-17 02:59:27', '13 Entra na sala'),
(207, '2021-05-17 03:00:08', '13 Entra na sala'),
(208, '2021-05-17 03:00:48', '13 Entra na sala'),
(209, '2021-05-17 03:01:28', '13 Entra na sala'),
(210, '2021-05-17 03:02:09', '13 Entra na sala'),
(211, '2021-05-17 03:02:49', '13 Entra na sala'),
(212, '2021-05-17 03:03:30', '13 Entra na sala'),
(213, '2021-05-17 03:04:10', '13 Entra na sala'),
(214, '2021-05-17 03:04:51', '13 Entra na sala'),
(215, '2021-05-17 03:05:31', '13 Entra na sala'),
(216, '2021-05-17 03:06:12', '13 Entra na sala'),
(217, '2021-05-17 03:06:52', '13 Entra na sala'),
(218, '2021-05-17 03:07:33', '13 Entra na sala'),
(219, '2021-05-17 03:08:13', '13 Entra na sala'),
(220, '2021-05-17 03:08:54', '13 Entra na sala'),
(221, '2021-05-17 03:09:34', '13 Entra na sala'),
(222, '2021-05-17 03:10:15', '13 Entra na sala'),
(223, '2021-05-17 03:10:55', '13 Entra na sala'),
(224, '2021-05-17 03:11:36', '13 Entra na sala'),
(225, '2021-05-17 03:12:16', '13 Entra na sala'),
(226, '2021-05-17 03:12:57', '13 Entra na sala'),
(227, '2021-05-17 03:13:37', '13 Entra na sala'),
(228, '2021-05-17 03:14:18', '13 Entra na sala'),
(229, '2021-05-17 03:14:58', '13 Entra na sala'),
(230, '2021-05-17 03:15:39', '13 Entra na sala'),
(231, '2021-05-17 03:16:19', '13 Entra na sala'),
(232, '2021-05-17 03:17:00', '13 Entra na sala'),
(233, '2021-05-17 03:17:40', '13 Entra na sala'),
(234, '2021-05-17 03:18:21', '13 Entra na sala'),
(235, '2021-05-17 03:19:01', '13 Entra na sala'),
(236, '2021-05-17 03:19:42', '13 Entra na sala'),
(237, '2021-05-17 03:20:22', '13 Entra na sala'),
(238, '2021-05-17 03:21:03', '13 Entra na sala');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `usuario_nome` varchar(150) DEFAULT NULL,
  `usuario_imagem` varchar(150) DEFAULT NULL,
  `usuario_canal` varchar(150) DEFAULT NULL,
  `usuario_status` varchar(3) DEFAULT NULL,
  `usuario_local` varchar(6) DEFAULT NULL,
  `usuario_tv` int(2) DEFAULT NULL,
  `usuario_quarto` int(2) DEFAULT NULL,
  `usuario_controle` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id_log`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `logs`
--
ALTER TABLE `logs`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
