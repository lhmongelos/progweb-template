-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 29-Jun-2020 às 01:11
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mrautomoveis`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `cod` int(6) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `link` varchar(100) NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`cod`, `nome`, `thumb`, `descricao`, `link`) VALUES
(1, 'Utilitario', 'C:\\wamp64\\www\\mrautomotive\\img\\Categorias\\util.png', 'Categoria de carros utilitarios', 'utilitário-link-test'),
(2, 'Conversivel', 'C:\\wamp64\\www\\mrautomotive\\img\\Categorias\\conversivel.png', 'Categoria de carros conversiveis', 'conversível-link-test'),
(3, 'Esportivo', 'C:\\wamp64\\www\\mrautomotive\\img\\Categorias\\esportivo.png', 'Categoria de veiculo do tipo esportivo', 'esportivo-link-test'),
(4, 'Caminhonete', 'C:\\wamp64\\www\\mrautomotive\\img\\Categorias\\caminhonete.png', 'Categoria de automoveis do tipo caminhonete', 'caminhonet-link-test'),
(5, 'Suv', 'C:\\wamp64\\www\\mrautomotive\\img\\Categorias\\suv.png', 'Categoria de veiculo do tipo suv', 'suv-link-test'),
(9, 'Hatch', 'C:\\wamp64\\www\\mrautomotive\\img\\Categorias\\hatch.png', 'categorias de veiculo do tipo Hacht', 'hatch-link-test');

-- --------------------------------------------------------

--
-- Estrutura da tabela `classificado`
--

DROP TABLE IF EXISTS `classificado`;
CREATE TABLE IF NOT EXISTS `classificado` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `tipo` varchar(1) NOT NULL COMMENT 'hatch, esportivo,suv,picape e etc',
  `valor` double NOT NULL,
  `status` int(1) NOT NULL,
  `perfil` int(1) NOT NULL,
  `usuario_cod` int(6) NOT NULL,
  `categoria_cod` int(6) NOT NULL,
  PRIMARY KEY (`cod`),
  KEY `fk_classificado_usuario1_idx` (`usuario_cod`),
  KEY `fk_classificado_categoria1_idx` (`categoria_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `classificado`
--

INSERT INTO `classificado` (`cod`, `nome`, `descricao`, `tipo`, `valor`, `status`, `perfil`, `usuario_cod`, `categoria_cod`) VALUES
(1, 'Camaro 2017', 'Camaro seminovo, muito bem cuidado e único dono. Carro completo. ', '1', 75000, 1, 1, 9, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

DROP TABLE IF EXISTS `imagens`;
CREATE TABLE IF NOT EXISTS `imagens` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `imagem` varchar(100) NOT NULL,
  `classificado_cod` int(11) NOT NULL,
  PRIMARY KEY (`cod`),
  KEY `fk_imagens_classificado1_idx` (`classificado_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `imagens`
--

INSERT INTO `imagens` (`cod`, `imagem`, `classificado_cod`) VALUES
(1, '', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

DROP TABLE IF EXISTS `marca`;
CREATE TABLE IF NOT EXISTS `marca` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `marca`
--

INSERT INTO `marca` (`cod`, `nome`, `descricao`) VALUES
(1, 'Fiat', 'Fiat automoveis'),
(2, 'Nissan', 'Nissan automoveis'),
(3, 'Suzuki', 'Suzuki Automoveis'),
(4, 'Range Rover', 'Range Rover Automoveis'),
(5, 'Toyota', 'Toyota veiculos'),
(6, 'Volkswagen', 'Volkswagen automoveis'),
(7, 'Ford', 'Ford automoveis'),
(8, 'Renault', 'Automoveis'),
(9, 'Chevrolet', 'Chevrolet automoveis'),
(10, 'Kia', 'Kia automoveis'),
(11, 'Jeep', 'Jeep automoveis'),
(12, 'Citroen', 'Citroen Automoveis');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelo`
--

DROP TABLE IF EXISTS `modelo`;
CREATE TABLE IF NOT EXISTS `modelo` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `modelo`
--

INSERT INTO `modelo` (`cod`, `nome`, `descricao`) VALUES
(1, 'Uno', 'Uno - Fiat'),
(2, 'Mobi', 'Mobi - Fiat'),
(3, 'Argo', 'Argo - Fiat'),
(4, 'Cronos', 'Cronos - Fiat'),
(5, 'Toro', 'Fiat - Toro'),
(6, 'Strada', 'Strada - Fiat'),
(7, 'Siena', 'Fiat - Siena'),
(8, 'Palio', 'Palio - Fiat'),
(9, 'Marea', 'Fiat - Marea'),
(10, 'Focus', 'Ford Focus'),
(11, 'Fiesta', 'Ford Fiesta'),
(12, 'Ka', 'Ford KA'),
(13, 'Edge', 'Ford Edge'),
(14, 'Ecosport', 'Ford Ecosport'),
(15, 'Mustang', 'Ford Mustang'),
(16, 'Ranger', 'Ford Ranger'),
(17, 'Agile', 'Chevrolet Agile'),
(18, 'Blazer', 'Chevrolet Blazer'),
(19, 'Bolt', 'Chevrolet Bolt'),
(20, 'Camaro', 'Chevrolet Camaro'),
(21, 'Captiva', 'Chevrolet Captiva'),
(22, 'Corsa', 'Chevrolet Corsa'),
(23, 'Cruze', 'Chevrolet Cruze'),
(24, 'Malibu', 'Chevrolet Malibu'),
(25, 'Prisma', 'Chevrolet Prisma'),
(26, 'Spin', 'Chevrolet Spin'),
(27, 'Tracker', 'Chevrolet Tracker'),
(28, 'Vectra', 'Chevrolet vectra'),
(29, '', ''),
(30, 'Sandero', 'Renault Sandero'),
(31, 'Duster', 'Renault Duster'),
(32, 'Kwid', 'Renault Kwid'),
(33, 'Logan', 'Renault Logan'),
(34, 'Duster Oroch', 'Renault Duster Oroch'),
(35, 'Captur', 'Renault captur'),
(36, 'Fluence', 'Renault Fluence'),
(37, '', ''),
(38, 'Frontier', 'Nissan Frontier'),
(39, 'Kicks', 'Nissan Kicks'),
(40, 'March', 'Nissa March'),
(41, 'Versa', 'Nissan Versa'),
(43, 'Cruze', 'Chevrolet Cruze');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `cod` int(6) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cpf` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `usuario` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `senha` varchar(50) NOT NULL,
  `nascimento` date NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `status` int(1) NOT NULL,
  `permissao` int(1) NOT NULL,
  `ip` varchar(50) NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`cod`, `nome`, `email`, `cpf`, `usuario`, `senha`, `nascimento`, `sexo`, `status`, `permissao`, `ip`) VALUES
(1, 'Diego Herzer', 'tadsherzer@gmail.com', '114.698.016-71', 'diherzer', '7897c5d5ca9a9455185482b5983e079a', '1995-03-03', 'm', 1, 1, '::1'),
(4, 'Graciele ', 'gramatsuda@gmail.com', '114.698.042-52', 'matsuda', '9fd1f0e4ed2285e11cd9d238ebde36af', '1992-12-10', 'f', 1, 1, '::1'),
(5, 'Luiz Henrique', 'luizH@gmail.com', '111.111.111-11', 'luhenrique', 'd82e3e8c3c6cc441c18937e71d3777e9', '1991-09-11', 'm', 1, 1, '::1'),
(6, 'administrador', 'admin@gmail.com', '000.000.000-00', 'administrador', '02c10513f7dce0bdb09cdba47b984367', '2020-01-01', 'm', 1, 1, '::1'),
(7, 'Administrador Sistema ', 'sistemadm@gmail.com', '114.698.041-27', 'administrador', 'a45958517604f5cd90d6ee51ad9cfdb6', '2020-06-21', 'm', 1, 2, '::1'),
(8, 'Luana Palmas', 'LuPalmas@gmail.com', '115.564.658-82', 'luluzinha', 'b17432561079438675b47db60d78fcfb', '1997-04-05', 'f', 1, 2, '::1'),
(9, 'Jose Jesus', 'Josejesus@gmail.com', '125.894.523-45', 'josejesus', '6eb77d55f6c6ebb5eddf310eab6aa724', '1995-05-02', 'm', 1, 2, '::1');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `classificado`
--
ALTER TABLE `classificado`
  ADD CONSTRAINT `fk_classificado_categoria1` FOREIGN KEY (`categoria_cod`) REFERENCES `categoria` (`cod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_classificado_usuario1` FOREIGN KEY (`usuario_cod`) REFERENCES `usuario` (`cod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `imagens`
--
ALTER TABLE `imagens`
  ADD CONSTRAINT `fk_imagens_classificado1` FOREIGN KEY (`classificado_cod`) REFERENCES `classificado` (`cod`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
