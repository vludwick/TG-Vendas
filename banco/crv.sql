-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01-Maio-2019 às 01:11
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
  `data_nascimento` date DEFAULT NULL,
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
(9, 'sadasd', 'rogerio@gmail.com', 'sdasda', 362, 'Mirante', 'sadasd', 'sadads', '2662', '', '', '440.431.288-19', '', '1994-08-21', NULL, NULL, NULL),
(10, 'agora vai                    ', 'victor@gmail.com', 'avenida', 4563, 'bairosssfwsafga', 'efgaedgadsg', 'agaerg', '18016000', '(21) 5212-1212', '(21) 21212-1212', '460.088.098-66', '', '1111-11-21', NULL, NULL, NULL),
(11, 'teste', 'victor@gmail.com', 'avenida', 4563, 'bairosssfwsafga', 'efgaedgadsg', 'agaerg', '18016000', '(21) 5212-1212', '', '673.636.369-15', '', '0000-00-00', NULL, NULL, NULL),
(12, 'agora vai', 'victor@gmail.com', 'avenida', 12121, '212121', 'efgaedgadsg', 'agaerg', '18016000', '(21) 5212-1212', '', '329.969.680-77', '', '0000-00-00', NULL, NULL, NULL),
(13, 'agora vai', 'victor@gmail.com', 'avenida', 3434343, '3434343', 'efgaedgadsg', 'agaerg', '18016000', '(21) 5212-1212', '(43) 43434-3434', '631.059.800-75', '', '0000-00-00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id_funcionario` int(11) NOT NULL,
  `nome` varchar(100) CHARACTER SET utf8 NOT NULL,
  `data_nascimento` date NOT NULL,
  `cpf` varchar(15) CHARACTER SET utf8 NOT NULL,
  `rg` varchar(15) CHARACTER SET utf8 NOT NULL,
  `data_admissao` date NOT NULL,
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
-- Estrutura da tabela `nota_fiscal`
--

CREATE TABLE `nota_fiscal` (
  `id_nota` int(11) NOT NULL,
  `numero` varchar(30) NOT NULL,
  `data_emissao` date NOT NULL,
  `id_pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `nota_fiscal`
--

INSERT INTO `nota_fiscal` (`id_nota`, `numero`, `data_emissao`, `id_pedido`) VALUES
(1, '13468525987463589426', '2019-03-11', 1),
(2, '85369521647528565235', '2019-03-12', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `data_pedido` varchar(100) NOT NULL,
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
(4, '2019-03-15', 179.39, 2, 2, 0),
(5, '0000-00-00', 96.99, 1, 1, 1),
(6, '0000-00-00', 0, 1, 1, 1),
(7, '0000-00-00', 96.99, 2, 2, 1),
(9, '0000-00-00', 96.99, 2, 2, 1),
(10, '01-05-2019 00:56:21', 96.99, 1, 1, 1),
(11, '01-05-2019 00:56:39', 0, 1, 1, 1),
(12, '01-05-2019 00:56:57', 173.48, 1, 1, 1),
(13, '01-05-2019 00:57:23', 96.99, 1, 1, 1);

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
(4, 4, 1, NULL, NULL, 79.99),
(5, 1, 1, NULL, NULL, 96.99),
(10, 1, 1, NULL, NULL, 96.99),
(12, 1, 1, NULL, NULL, 96.99),
(12, 3, 1, NULL, NULL, 76.49),
(13, 1, 1, NULL, NULL, 96.99);

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
(1, 'Luvas Boxe', 96.99, 'Par de luvas de boxe.', '13467985213265874125', 15, 'prod1.jpg'),
(2, 'Luvas Para Goleiro', 49.7, 'Par de luvas de goleiro.', '15478745963265874125', 32, 'prod2.jpg'),
(3, 'Bola de Basquete', 76.49, 'Bola de basquete com medidas oficiais.', '36525269854712453698', 12, 'prod3.jpg'),
(4, 'Bola de Futebol', 79.99, 'Bola de Futebol com medidas oficiais.', '54147858472369563214', 6, 'prod4.jpg'),
(5, 'Saco de Areia', 139.9, 'Saco de areia para pratica de artes marciais.', '21453962795386425963', 26, 'prod5.jpg'),
(46, 'asaas    ', 18.25, '    ', '5b46bdfe2b653aad8b4f4e15e711d3f5', 2, 'd80aeafb6dfd42243d1b21d19a353844-foto.jpg'),
(47, 'asdasda', 18.25, 'sad', '7a4406c3acf6dcfb351a1eaca633d555', 1, 'prod47.jpg'),
(48, 'assadds', 18.25, 'OItenta', '61f1220f07d0ed44b2c71878c6717d04', 1, 'prod48.jpg'),
(49, 'asaas', 262.62, 'A turma do chaves    ', '32a42c1b0f46b67e202d6de8d8010022', 1, 'prod49.jpg'),
(50, 'asdsda', 18.25, 'A turma do chaves', '32ec5e8e4ca7fcd7180fb75c5a88053b', 1, 'prod50.jpg'),
(51, 'bbbbbbbbbb', 18.25, 'A turma do chaves    ', '0cda4d9ebcf2782882e3b402d3913c68', 4, 'prod51.jpg'),
(52, 'bola', 18.25, 'bola de teste', '3465dd8eef3507807b3c77dd1733c52c', 3, 'prod52.jpg'),
(53, 'luva de teste', 12.12, 'luva', '00e4dd041e0883f234b9bfb91ba50d21', 2, 'prod53.jpg'),
(54, 'caraio de teste', 12.12, 'tete', '6c1f8e1c5d6e5c4855145da806552587', 4, 'prod54.jpg'),
(55, 'merda de teste', 10.01, 'teste', 'a04e5e79fd70c7a673adb3f4401301e9', 4, 'prod55.jpg'),
(56, 'VICTOR LUDWICK GUEDES DOMINGUES', 18.25, 'A turma do chaves       ', 'ac0e3ea4090dec2a1699e953598d3498', 3, 'prod56.jpg'),
(57, 'VICTOR LUDWICK GUEDES DOMINGUES', 18.25, 'A turma do chaves    ', '84cc64d580baaf41e8c905c8e349bf7e', 3, 'prod57.jpg'),
(58, 'VICTOR LUDWICK GUEDES DOMINGUES', 18.25, 'A turma do chaves    ', '6faea6b044066ce1b29761410a9d0f1b', 3, 'prod58.jpg'),
(59, 'Maria José    ', 18.25, 'A turma do chaves', 'e1b5fbe95489181cad2407f0db37cf60', 3, 'prod59.jpg'),
(60, 'VICTOR LUDWICK GUEDES DOMINGUES', 18.25, 'A turma do chaves    ', 'bfc806e7184b5018422737ec8807f8e5', 5, 'prod60.jpg'),
(61, 'teste final', 18.25, 'A turma do chaves    ', 'a4ce2c80500aab397f4bfe696aef5278', 4, 'prod61.jpg'),
(62, 'agora vai                    ', 12.36, 'cccc                    ', 'a41662c191e21950b9a95ab28bcab0d5', 25, 'c240a9823b3a28bb4be3b704d801b144-foto.jpg');

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
-- Indexes for table `nota_fiscal`
--
ALTER TABLE `nota_fiscal`
  ADD PRIMARY KEY (`id_nota`),
  ADD UNIQUE KEY `numero` (`numero`),
  ADD KEY `fk_pedido_nota` (`id_pedido`);

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
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nota_fiscal`
--
ALTER TABLE `nota_fiscal`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `nota_fiscal`
--
ALTER TABLE `nota_fiscal`
  ADD CONSTRAINT `fk_pedido_nota` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`) ON DELETE NO ACTION ON UPDATE CASCADE;

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
