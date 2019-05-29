-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29-Maio-2019 às 02:54
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.0

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
(1, 'Maria José', 'maria.jose@gmail.com', 'Rua Dirce Migliorini', 326, 'Jardim Nápoli', 'Sorocaba', 'São Paulo', '18071-426', '1525866324', '15964521865', '764.881.100-63', '22.683.978-3', '1985-06-08', NULL, NULL, NULL),
(2, 'Clube de Futebol São Bento', 'sao.bento@gmail.com', 'Rua Rúbens Cleto', 253, 'Jardim Los Angeles', 'Sorocaba', 'São Paulo', '18074-050', '1563254114', '15987456521', NULL, NULL, NULL, '68.565.744/0001-97', '668.596.650.607', 'São Bento'),
(3, 'José João', 'jose.joao@gmail.com.br', 'Rua Faustino Rodrigues Martins', 852, 'Vila Mineirão', 'Sorocaba', 'São Paulo', '18076-500', '1574258413', '15965124585', '682.964.310-41', '12.420.268-8', '1980-12-15', NULL, NULL, NULL),
(5, 'COCA', '', 'sadasdds', 2626, 'sadassad', 'sadasddsa', 'saddsaads', '511', '', '', NULL, NULL, NULL, '03.093.215/0001-92', '', 'assasaas'),
(6, 'sadasd', '', 'sdasda', 26, 'sususus', 'sadasd', 'sadads', '2662', '', '', '440.431.288-88', '', '1994-08-21', NULL, NULL, NULL),
(7, 'sadasd', 'rogerio@gmail.com', 'sdasda', 362, 'Mirante', 'sadasd', 'sadads', '2662', '', '', '440.431.288-18', '', '1994-08-21', NULL, NULL, NULL),
(8, 'sadasd', 'rogerio@gmail.com', 'sdasda', 33, 'asasasa', 'sadasd', 'sadads', '2662', '', '', '1551515151', '', '1994-08-21', NULL, NULL, NULL),
(9, 'sadasd', 'rogerio@gmail.com', 'sdasda', 362, 'Mirante', 'sadasd', 'sadads', '2662', '', '', '440.431.288-19', '', '1994-08-21', NULL, NULL, NULL);

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
  `senha` varchar(80) NOT NULL,
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
  `id_cliente` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `data_pedido`, `total_pedido`, `id_cliente`, `id_funcionario`, `tipo`) VALUES
(1, '2019-03-11', 243.68, 1, 1, 1),
(2, '2019-03-12', 236.89, 3, 2, 1),
(3, '2019-03-20', 333.88, 3, 3, 0),
(4, '2019-03-15', 179.39, 2, 2, 0);

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
(1, 1, 2, NULL, NULL, 193.98),
(1, 2, 1, NULL, NULL, 49.7),
(2, 1, 1, NULL, NULL, 96.99),
(2, 5, 1, NULL, NULL, 139.9),
(3, 1, 2, NULL, NULL, 193.98),
(3, 5, 1, NULL, NULL, 139.9),
(4, 2, 2, NULL, NULL, 99.4),
(4, 4, 1, NULL, NULL, 79.99);

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
(1, 'Luvas Boxe', 96.99, 'Par de luvas de boxe.', '13467985213265874125', 15, ''),
(2, 'Luvas Para Goleiro', 49.7, 'Par de luvas de goleiro.', '15478745963265874125', 32, ''),
(3, 'Bola de Basquete', 76.49, 'Bola de basquete com medidas oficiais.', '36525269854712453698', 12, ''),
(4, 'Bola de Futebol', 79.99, 'Bola de Futebol com medidas oficiais.', '54147858472369563214', 6, ''),
(5, 'Saco de Areia', 139.9, 'Saco de areia para pratica de artes marciais.', '21453962795386425963', 26, ''),
(46, 'asaas', 18.25, '', '5b46bdfe2b653aad8b4f4e15e711d3f5', 2, 'Array'),
(47, 'asdasda', 18.25, 'sad', '7a4406c3acf6dcfb351a1eaca633d555', 1, 'Array'),
(48, 'assadds', 18.25, 'OItenta', '61f1220f07d0ed44b2c71878c6717d04', 1, 'Array'),
(49, 'asaas', 262.62, 'A turma do chaves', '32a42c1b0f46b67e202d6de8d8010022', 1, 'bda9b92cfeb81a86cca1d4adc481c3c8-foto.jpg'),
(50, 'asdsda', 18.25, 'A turma do chaves', '32ec5e8e4ca7fcd7180fb75c5a88053b', 1, '6862d3d221de34cf9aa64db5980216b6-foto.jpg');

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
  ADD KEY `fk_cliente_pedido` (`id_cliente`),
  ADD KEY `fk_funcionario_pedido` (`id_funcionario`);

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
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_cliente_pedido` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_funcionario_pedido` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limitadores para a tabela `pedido_produto`
--
ALTER TABLE `pedido_produto`
  ADD CONSTRAINT `fk_pedido_pedido_produto` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_produto_pedido_produto` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
