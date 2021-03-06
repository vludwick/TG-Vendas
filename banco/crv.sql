-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21-Jun-2019 às 19:53
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crv`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `logradouro` varchar(100) NOT NULL,
  `numero` int(11) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `rg` varchar(15) DEFAULT NULL,
  `data_nascimento` varchar(20) DEFAULT NULL,
  `cnpj` varchar(20) DEFAULT NULL,
  `inscricao_estadual` varchar(30) DEFAULT NULL,
  `nome_fantasia` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `email`, `logradouro`, `numero`, `bairro`, `cidade`, `estado`, `cep`, `telefone`, `celular`, `cpf`, `rg`, `data_nascimento`, `cnpj`, `inscricao_estadual`, `nome_fantasia`) VALUES
(1, 'Não Registrado', '', '', 0, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Clube de Futebol São Bento', 'sao.bento@gmail.com', 'Rua Rúbens Cleto', 253, 'Jardim Los Angeles', 'Sorocaba', 'São Paulo', '18074-050', '1563254114', '15987456521', NULL, NULL, NULL, '68.565.744/0001-97', '668.596.650.607', 'São Bento'),
(3, 'José João', 'jose.joao@gmail.com.br', 'Rua Faustino Rodrigues Martins', 852, 'Vila Mineirão', 'Sorocaba', 'São Paulo', '18076-500', '1574258413', '15965124585', '682.964.310-41', '12.420.268-8', '1980-12-15', NULL, NULL, NULL),
(4, 'Fábio Cláudio Bernardo Castro', 'fabioclaudiobernardocastro__fabioclaudiobernardoca', 'Rua Rio de Janeiro', 690, 'Dom Giocondo', 'Rio Branco', 'AC', '69900-309', '(68) 3734-7284', '(68) 99222-1499', '770.596.216-01', '46.632.333-5', '1991-08-16', NULL, NULL, NULL),
(5, 'Laura Isabella Rocha', 'llauraisabellarocha@mmetalica.com.br', 'Rua 20', 642, 'Cidade Operária', 'São Luís', 'MA', 'Cidade OperÃ¡ria', '(98) 2919-4766', '(98) 99656-9689', '804.255.687-09', '21.359.700-7', '1978-04-10', NULL, NULL, NULL),
(6, 'Enrico Augusto Danilo Costa', 'enricoaugustodanilocosta_@smalte.com.br', 'Rua B6', 609, 'Residencial Jardim América', 'Gurupi', 'TO', '77427-012', '(63) 3518-2846', '(63) 98839-7425', '372.488.217-30', '20.638.447-6', '1987-05-01', NULL, NULL, NULL),
(7, 'Alfredo dos Santos', 'alfred@hotmail.com', 'Jardim Versalles', 300, 'Bairro dos Morros', 'Votorantim', 'SP', '18111225', '(15) 3023-0305', '(15) 99891-6564', '440.431.288-19', '', '1994-08-21', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id_funcionario` int(11) NOT NULL,
  `nome` varchar(100) CHARACTER SET utf8 NOT NULL,
  `data_nascimento` varchar(20) NOT NULL,
  `cpf` varchar(15) CHARACTER SET utf8 NOT NULL,
  `rg` varchar(15) CHARACTER SET utf8 NOT NULL,
  `data_admissao` varchar(20) NOT NULL,
  `logradouro` varchar(100) CHARACTER SET utf8 NOT NULL,
  `numero` int(11) NOT NULL,
  `bairro` varchar(100) CHARACTER SET utf8 NOT NULL,
  `cidade` varchar(50) CHARACTER SET utf8 NOT NULL,
  `estado` varchar(50) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `senha` varchar(30) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `nome`, `data_nascimento`, `cpf`, `rg`, `data_admissao`, `logradouro`, `numero`, `bairro`, `cidade`, `estado`, `cep`, `email`, `telefone`, `celular`, `senha`, `tipo`) VALUES
(1, 'Victor Ludwick', '1998-10-21', '586.669.830-78', '27.283.244-3', '2018-09-10', 'Estrada Saladino Duarte de Oliveira', 754, 'Caputera', 'Sorocaba', 'São Paulo', '18017-362', 'victor.ludwick@gmail.com', '1532926548', '15981157644', '123', 1),
(2, 'Rafael Martins', '1999-08-21', '727.388.730-73', '25.154.367-5', '2018-06-12', 'Rua Voluntário Altino', 164, 'Vila Hortência', 'Sorocaba', 'São Paulo', '18020-290', 'rafael.martins@gmail.com', '1546784965', '15985463254', '123', 1),
(3, 'Carlos Rogério', '1992-02-11', '145.840.200-27', '46.348.918-4', '2017-07-17', 'Rua Mário Jonas', 245, 'Jardim Celeste', 'Sorocaba', 'São Paulo', '18066-075', 'carlos.rogerio@gmail.com', '1564585214', '15986565412', '123', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `data_pedido` varchar(20) NOT NULL,
  `total_pedido` double NOT NULL,
  `id_cliente` int(11) DEFAULT '1',
  `id_funcionario` int(11) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `data_pedido`, `total_pedido`, `id_cliente`, `id_funcionario`, `tipo`) VALUES
(1, '2019-05-29 20:58:30', 2476.19, 2, 3, 1),
(2, '2019-05-30 21:00:01', 336.29, 4, 3, 1),
(3, '2019-05-30 21:00:43', 596.05, 3, 3, 0),
(5, '2019-05-30 21:01:31', 695.45, 1, 3, 0),
(6, '2019-05-30 21:01:52', 449.86, 3, 3, 0),
(7, '2019-05-30 21:02:04', 412.36, 3, 3, 0),
(8, '2019-05-30 21:03:31', 452.86, 6, 3, 1),
(9, '2019-05-30 21:03:51', 216.39, 6, 3, 1),
(15, '2019-06-21 14:46:40', 267.1, 1, 3, 1),
(16, '2019-06-21 14:50:40', 297.8, 7, 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_produto`
--

CREATE TABLE `pedido_produto` (
  `id_pedido` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  `preco` double DEFAULT NULL,
  `valor_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedido_produto`
--

INSERT INTO `pedido_produto` (`id_pedido`, `id_produto`, `quantidade`, `descricao`, `preco`, `valor_total`) VALUES
(1, 3, 1, 'Bola de basquete com medidas oficiais.    ', 76.49, 76.49),
(1, 4, 30, 'Bola de Futebol com medidas oficiais.    ', 79.99, 2399.7),
(2, 1, 1, 'Par de luvas de boxe.    ', 96.99, 96.99),
(2, 2, 2, 'Par de luvas de goleiro.    ', 49.7, 99.4),
(2, 5, 1, 'Saco de areia para pratica de artes marciais.    ', 139.9, 139.9),
(3, 1, 1, 'Par de luvas de boxe.    ', 96.99, 96.99),
(3, 2, 1, 'Par de luvas de goleiro.    ', 49.7, 49.7),
(3, 3, 3, 'Bola de basquete com medidas oficiais.    ', 76.49, 229.47),
(3, 4, 1, 'Bola de Futebol com medidas oficiais.    ', 79.99, 79.99),
(3, 5, 1, 'Saco de areia para pratica de artes marciais.    ', 139.9, 139.9),
(5, 1, 1, 'Par de luvas de boxe.    ', 96.99, 96.99),
(5, 2, 3, 'Par de luvas de goleiro.    ', 49.7, 149.1),
(5, 3, 3, 'Bola de basquete com medidas oficiais.    ', 76.49, 229.47),
(5, 4, 1, 'Bola de Futebol com medidas oficiais.    ', 79.99, 79.99),
(5, 5, 1, 'Saco de areia para pratica de artes marciais.    ', 139.9, 139.9),
(6, 1, 2, 'Par de luvas de boxe.    ', 96.99, 193.98),
(6, 2, 2, 'Par de luvas de goleiro.    ', 49.7, 99.4),
(6, 3, 1, 'Bola de basquete com medidas oficiais.    ', 76.49, 76.49),
(6, 4, 1, 'Bola de Futebol com medidas oficiais.    ', 79.99, 79.99),
(7, 2, 2, 'Par de luvas de goleiro.    ', 49.7, 99.4),
(7, 3, 2, 'Bola de basquete com medidas oficiais.    ', 76.49, 152.98),
(7, 4, 2, 'Bola de Futebol com medidas oficiais.    ', 79.99, 159.98),
(8, 3, 2, 'Bola de basquete com medidas oficiais.    ', 76.49, 152.98),
(8, 4, 2, 'Bola de Futebol com medidas oficiais.    ', 79.99, 159.98),
(8, 5, 1, 'Saco de areia para pratica de artes marciais.    ', 139.9, 139.9),
(9, 3, 1, 'Bola de basquete com medidas oficiais.    ', 76.49, 76.49),
(9, 5, 1, 'Saco de areia para pratica de artes marciais.    ', 139.9, 139.9),
(15, 9, 1, 'Tornozeleira Preta - Rudel - Preto', 33, 33),
(15, 11, 1, 'Joelheira Preta - Rudel - Preto', 35.2, 35.2),
(15, 13, 1, 'Regata Rudel Abrigo Boxer Preto', 68.9, 68.9),
(15, 15, 1, 'Cinta Rudel Modeladora Waist Fit', 100, 100),
(15, 16, 1, 'Bandagem Elastica Rudel 50mm 3 Metros Rudel Azul', 30, 30),
(16, 8, 1, 'Cotoveleira Preta - Rudel - Preto', 19.8, 19.8),
(16, 9, 2, 'Tornozeleira Preta - Rudel - Preto', 33, 66),
(16, 10, 1, 'Cinto Fitness Waist Bag Amarelo - Rudel - Amarelo', 43.9, 43.9),
(16, 11, 1, 'Joelheira Preta - Rudel - Preto', 35.2, 35.2),
(16, 13, 1, 'Regata Rudel Abrigo Boxer Preto', 68.9, 68.9),
(16, 14, 1, 'Luva Rudel KO Rosa', 34, 34),
(16, 16, 1, 'Bandagem Elastica Rudel 50mm 3 Metros Rudel Azul', 30, 30);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `preco` double NOT NULL,
  `descricao` varchar(120) DEFAULT NULL,
  `codigo_barras` varchar(50) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `nome`, `preco`, `descricao`, `codigo_barras`, `quantidade`, `foto`) VALUES
(1, 'Luvas Boxe    ', 96.99, 'Par de luvas de boxe.    ', '13467985213265874125', 12, 'a674d6a6228c8e1a667f4497b3b1f05d-foto.jpg'),
(2, 'Luvas Para Goleiro    ', 49.7, 'Par de luvas de goleiro.    ', '15478745963265874125', 29, '24b72f998eb8b22dfc3cc2e20725c3c4-foto.png'),
(3, 'Bola de Basquete', 76.49, 'Bola de basquete com medidas oficiais.        ', '36525269854712453698', 7, 'b73e984d11b1baa6644819680b13926e-foto.jpg'),
(4, 'Bola de Futebol    ', 79.99, 'Bola de Futebol com medidas oficiais.    ', '54147858472369563214', -27, 'b775e08b18df1bb59f53bd129a39fb23-foto.jpg'),
(5, 'Saco de Pancada', 139.9, 'Saco de areia para pratica de artes marciais.    ', '21453962795386425963', 22, '59442ba0c85d96cb7c3fbd86adb096e2-foto.jpg'),
(6, 'Bermuda Masculina', 89.9, 'Bermuda Masculina Moletinho - Rudel Sports - Preto', 'edf5452222584923182d41ee5de25203', 16, '0e0fda042ad8fcd761586379b0b23008-foto.jpg'),
(7, 'Luvas Rubber Ii Evolution', 39.6, 'Luvas Rubber Ii Evolution Preta - Rudel - G - Preto', 'bde987f3a7880b3db60e7060b57e5fc2', 7, '1adcc081956beca62b9a8a2bedfc355a-foto.jpg'),
(8, 'Cotoveleira Preta', 19.8, 'Cotoveleira Preta - Rudel - Preto', 'b40271b32d3c98384242fe1cadf27449', 24, '821a48a656c693e6f5159a5e61cfaf3f-foto.jpg'),
(9, 'Tornozeleira Preta', 33, 'Tornozeleira Preta - Rudel - Preto', 'a09bfec5faf926305be45f4bccb400d7', 17, 'a4cbefc61deeb9625308adeb2278d7b8-foto.jpg'),
(10, 'Cinto Fitness Waist Bag', 43.9, 'Cinto Fitness Waist Bag Amarelo - Rudel - Amarelo', '78b56db3196d0c35787ca5d3545ae933', 17, '1f4093a218c746901f7a92b59d297936-foto.jpg'),
(11, 'Joelheira Preta', 35.2, 'Joelheira Preta - Rudel - Preto', 'c205c78f1128fd4291b8854a8cea18f7', 29, '8fa93bebab1ac510734e9bc51cc38746-foto.jpg'),
(13, 'Regata Rudel', 68.9, 'Regata Rudel Abrigo Boxer Preto', 'ffd3c4f350d81cfe836b1abfff523cc9', 12, 'c0818977c6c0532d67e90aac76171d6b-foto.jpg'),
(14, 'Luva Rudel', 34, 'Luva Rudel KO Rosa', '61da726b4272c46b70620126d79a093b', 4, '3e5051579d1f9b5f5393b211fbd1711f-foto.jpg'),
(15, 'Cinta Rudel Modeladora', 100, 'Cinta Rudel Modeladora Waist Fit', 'ac02eef73a69c73a43d0559d574ad0bd', 10, 'dca93d4b7bf0f3c283dc548d6c335a65-foto.jpg'),
(16, 'Bandagem Elastica Azul', 30, 'Bandagem Elastica Rudel 50mm 3 Metros Rudel Azul', '97d007e3d5a700153bec7d9ce12c5276', 22, '308990fccd8cecc1174e24e48ef40bbd-foto.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `cnpj` (`cnpj`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `rg` (`rg`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `fk_funcionario_pedido` (`id_funcionario`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indexes for table `pedido_produto`
--
ALTER TABLE `pedido_produto`
  ADD PRIMARY KEY (`id_pedido`,`id_produto`) USING BTREE,
  ADD KEY `fk_produto_pedido_produto` (`id_produto`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`),
  ADD UNIQUE KEY `codigo_barras` (`codigo_barras`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
