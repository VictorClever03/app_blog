-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Maio-2023 às 16:44
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_blog`
--
CREATE DATABASE IF NOT EXISTS `db_blog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_blog`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nome`, `descricao`) VALUES
(1, 'Teste', 'Fiz um teste'),
(4, 'Direcao', 'Para provas'),
(5, 'Divertimento', 'Animacao'),
(6, 'Administrativo', 'Direcao do IPPA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id_coment` int(11) NOT NULL,
  `conteudo` text NOT NULL,
  `create_coment` datetime NOT NULL DEFAULT current_timestamp(),
  `postagens_id` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `comentarios`
--

INSERT INTO `comentarios` (`id_coment`, `conteudo`, `create_coment`, `postagens_id`, `usuarios_id`) VALUES
(2, 'Segundo comentario', '2023-05-26 15:29:49', 2, 2),
(3, 'O Aldair é pobre, por isso reclama hahaha.', '2023-05-26 16:14:40', 3, 2),
(6, 'estamos mal', '2023-05-27 11:07:04', 3, 6),
(7, 'As propinas aumentaram mas mal qualidade permanece', '2023-05-27 11:11:32', 4, 6),
(8, 'O pão', '2023-05-27 11:11:36', 3, 7),
(9, 'Melhorem primeiro a qualidade de ensino e serviços.', '2023-05-27 11:17:02', 4, 7),
(10, 'Ninguem mesmo vai pagar, somos malandros! hahaha', '2023-05-27 13:55:22', 5, 2),
(11, 'Já era evidente o fracasso', '2023-05-27 13:56:16', 5, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `assunto` varchar(300) NOT NULL,
  `mensagem` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contact`
--

INSERT INTO `contact` (`id`, `nome`, `email`, `assunto`, `mensagem`, `create_at`) VALUES
(4, 'Victor Nanga', 'vectorclever00@gmail.com', 'Teste', '$frase = \"Exemplo de frase em PHP\"; $palavras = explode(\" \", $frase); // Quebra a frase em um array de palavras $iniciais = array_map(function($palavra) { return strtoupper(substr($palavra, 0, 1)); // Pega a primeira letra de cada palavra e converte para maiúscula }, $palavras); $resultado = implode(\"\", $iniciais); // Junta as iniciais em uma única string echo $resultado; // Saída: EDFEPHP', '2023-05-23 23:17:01'),
(6, 'Silas Lukoki', 'lukoki@gmail.com', 'Teste', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2023-05-24 16:22:46');

-- --------------------------------------------------------

--
-- Estrutura da tabela `honra`
--

CREATE TABLE `honra` (
  `id_honra` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `media` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `imagem` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `honra`
--

INSERT INTO `honra` (`id_honra`, `nome`, `media`, `descricao`, `imagem`) VALUES
(2, 'Ribeiro P', 18, 'Aluno do curso de informatica', 'uploads\\Quadro Honra\\WhatsApp Image 2023-05-27 at 13.59.07.jpg'),
(3, 'Clever', 18, 'Curso de Informatica', 'uploads\\Quadro Honra\\167579835_177761310839645_3211802789231516836_n.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagens`
--

CREATE TABLE `postagens` (
  `id_postagens` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `conteudo` text NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `usuarios_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `postagens`
--

INSERT INTO `postagens` (`id_postagens`, `titulo`, `imagem`, `conteudo`, `create_at`, `usuarios_id`, `categoria_id`) VALUES
(2, 'Trabalho', 'uploads\\Posts\\Administrativo\\blog-header.jpg', 'Trabalhando...', '2023-05-25 17:26:08', 1, 6),
(3, 'Reclamações', 'uploads\\Posts\\Direcao\\278170269_1951292741710295_8698701406332524387_n.jpg', 'Os Alunos estão revoltados com os preços da capa dura recomendada pelo Instituto Anherc.', '2023-05-26 12:46:55', 1, 4),
(4, 'O aumento das propinas', 'uploads\\Posts\\Direcao\\ddr.jpg', 'O IPPA acaba de aumentar as propinas', '2023-05-27 11:09:55', 1, 4),
(5, 'Anulamento da Gala', 'uploads\\Posts\\Divertimento\\IMG-20221025-WA0017.jpg', 'Os não vão de acordo com preço estipulado por causa da impressão do relatório.', '2023-05-27 13:53:43', 9, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `adm` int(11) NOT NULL DEFAULT 1,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `nome`, `senha`, `adm`, `email`) VALUES
(1, 'Victor Clever', '$2y$10$KR1sdu/3v4N1b7Korpi7JeGrywCa6VaX9cGTe4ddNJHOvzd6RTvs6', 0, 'clevervictor03@gmail.com'),
(2, 'Telma Neto', '$2y$10$KR1sdu/3v4N1b7Korpi7JeGrywCa6VaX9cGTe4ddNJHOvzd6RTvs6', 1, 'telma@gmail.com'),
(6, 'jacob canganjo', '$2y$10$YUssBWHiSxEuW2aIcd1Zvu7NeWHHV0i3fF2zCyXF15x30fryf42TS', 1, 'jacobcanganjo000@gmail.com'),
(7, 'Vânio Aldair', '$2y$10$i8SpIQORnnwwkDBnIawfe.e7tXQzsh5OiaqjsSEogLNgErky/thiy', 1, 'vaangola@gmail.com'),
(9, 'Ribeiro Paulo', '$2y$10$6idBEQD8bsLodmgY3cjlYO2uzNYuVsjNxvIpKwJwOTzX7tB/qYHuO', 0, 'ribeiro@gmail.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices para tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_coment`),
  ADD KEY `fk_postagens_id` (`postagens_id`),
  ADD KEY `fk_usuarios_idC` (`usuarios_id`);

--
-- Índices para tabela `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `honra`
--
ALTER TABLE `honra`
  ADD PRIMARY KEY (`id_honra`);

--
-- Índices para tabela `postagens`
--
ALTER TABLE `postagens`
  ADD PRIMARY KEY (`id_postagens`),
  ADD KEY `fk_usuarios_id` (`usuarios_id`),
  ADD KEY `fk_categoria_id` (`categoria_id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_coment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `honra`
--
ALTER TABLE `honra`
  MODIFY `id_honra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `postagens`
--
ALTER TABLE `postagens`
  MODIFY `id_postagens` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `fk_postagens_id` FOREIGN KEY (`postagens_id`) REFERENCES `postagens` (`id_postagens`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuarios_idC` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id_usuarios`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `postagens`
--
ALTER TABLE `postagens`
  ADD CONSTRAINT `fk_categoria_id` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuarios_id` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id_usuarios`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
