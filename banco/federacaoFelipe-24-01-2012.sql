-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 24/01/2013 às 12:53:06
-- Versão do Servidor: 5.1.66-0ubuntu0.11.10.3
-- Versão do PHP: 5.3.6-13ubuntu3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `federacao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `certificado`
--

CREATE TABLE IF NOT EXISTS `certificado` (
  `id_certificado` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `data_emissao` date NOT NULL,
  `id_evento_graduacao` int(11) NOT NULL,
  `id_federado` int(11) NOT NULL,
  `id_tipo_certificado` int(5) NOT NULL,
  PRIMARY KEY (`id_certificado`),
  KEY `FK_tipo_certificado` (`id_tipo_certificado`),
  KEY `FK_certificado_federado` (`id_federado`),
  KEY `FK_evento_graduacao` (`id_evento_graduacao`),
  KEY `fk_certificado_1` (`id_evento_graduacao`),
  KEY `fk_certificado_2` (`id_federado`),
  KEY `fk_certificado_3` (`id_tipo_certificado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `coordenador`
--

CREATE TABLE IF NOT EXISTS `coordenador` (
  `id_coordenador` int(11) NOT NULL,
  `id_federado` int(11) NOT NULL,
  PRIMARY KEY (`id_coordenador`),
  KEY `fk_coordenador_1` (`id_federado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE IF NOT EXISTS `endereco` (
  `id_endereco` int(11) NOT NULL AUTO_INCREMENT,
  `logradouro` varchar(80) COLLATE latin1_spanish_ci NOT NULL,
  `numero` int(5) NOT NULL,
  `complemento` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `bairro` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `cidade` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `uf` varchar(2) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_endereco`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id_endereco`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `uf`) VALUES
(1, 'Rua dos Bobos', 0, 'apto. 10', 'Bobolândia', 'São Paulo', 'SP'),
(2, 'Rua dos Bobos', 0, 'apto. 11', 'Bobolândia', 'São Paulo', 'SP');

-- --------------------------------------------------------

--
-- Estrutura da tabela `escolaridade`
--

CREATE TABLE IF NOT EXISTS `escolaridade` (
  `id_escolaridade` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_escolaridade`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `escolaridade`
--

INSERT INTO `escolaridade` (`id_escolaridade`, `descricao`) VALUES
(1, 'Ensino Fundamental (1º ano ao 5º ano)'),
(2, 'Ensino Fundamental (1º ano ao 9º ano)'),
(3, 'Ensino Médio Incompleto'),
(4, 'Ensino Médio Completo'),
(5, 'Ensino Médio Técnico'),
(6, 'Ensino Técnico'),
(7, 'Ensino Superior Incompleto'),
(8, 'Ensino Superior Completo'),
(9, 'Bacharelado'),
(10, 'Pós-Graduação'),
(11, 'EJA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento_graduacao`
--

CREATE TABLE IF NOT EXISTS `evento_graduacao` (
  `id_evento_graduacao` int(11) NOT NULL COMMENT '01/2012, 02/2012,03/2012,04/2012 - faixa preta,05/2012',
  `data_evento` date NOT NULL,
  `id_endereco` int(11) NOT NULL,
  `descricao` longtext COLLATE latin1_spanish_ci,
  `id_modalidade` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_evento_graduacao`),
  KEY `FK_evento_graduacao_endereco` (`id_endereco`),
  KEY `fk_evento_graduacao_modalidade` (`id_modalidade`),
  KEY `fk_evento_graduacao_1` (`id_endereco`),
  KEY `fk_evento_graduacao_2` (`id_modalidade`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `federado`
--

CREATE TABLE IF NOT EXISTS `federado` (
  `id_federado` int(11) NOT NULL,
  `nome` varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `data_nasc` date NOT NULL,
  `rg` varchar(12) COLLATE latin1_spanish_ci NOT NULL,
  `telefone` varchar(13) COLLATE latin1_spanish_ci NOT NULL,
  `celular` varchar(14) COLLATE latin1_spanish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `id_escolaridade` int(11) NOT NULL,
  `id_status_federado` int(11) NOT NULL,
  `id_endereco` int(12) NOT NULL,
  `id_nacionalidade` int(11) NOT NULL,
  PRIMARY KEY (`id_federado`),
  KEY `FK_endereco_federado` (`id_endereco`),
  KEY `FK_federado_escolaridade` (`id_escolaridade`),
  KEY `FK_federado` (`id_nacionalidade`),
  KEY `FK_status_federado` (`id_status_federado`),
  KEY `fk_federado_1` (`id_endereco`),
  KEY `fk_federado_2` (`id_nacionalidade`),
  KEY `fk_federado_3` (`id_status_federado`),
  KEY `fk_federado_4` (`id_escolaridade`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Extraindo dados da tabela `federado`
--

INSERT INTO `federado` (`id_federado`, `nome`, `data_nasc`, `rg`, `telefone`, `celular`, `email`, `id_escolaridade`, `id_status_federado`, `id_endereco`, `id_nacionalidade`) VALUES
(1, 'Coordenador de Taekwondo', '0000-00-00', '12.345.678-9', '(11) 3456-789', '(11) 98765-432', 'taekwondo@tkd.com', 6, 1, 1, 11),
(2, 'Coordenadora de Capoeira', '0000-00-00', '23.456.789-0', '(11) 4567-890', '(11) 90123-456', 'capoeira@cap.com.br', 7, 1, 1, 1),
(3, 'Coordenador de Judô', '0000-00-00', '11.222.333-4', '(11) 5544-332', '(11) 99999-999', 'judo@jud.com', 10, 1, 2, 13),
(4, 'Coordenador de MMA', '0000-00-00', '56.789.012-3', '(11) 4455-667', '(11) 9666-6666', 'mma@mma.com', 5, 0, 2, 15),
(5, 'Coordenadora de Hapkido', '0000-00-00', '98.765.432-1', '(11) 5544-332', '(11) 9333-3333', 'hapkido@hpk', 11, 1, 2, 12),
(6, 'Coordenador de Krav Maga', '0000-00-00', '84.129.123-9', '(11) 2312-234', '(11) 9123-1232', 'kravmaga@krm.com', 8, 1, 1, 23);

-- --------------------------------------------------------

--
-- Estrutura da tabela `filial`
--

CREATE TABLE IF NOT EXISTS `filial` (
  `id_filial` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `cnpj` varchar(19) COLLATE latin1_spanish_ci NOT NULL,
  `telefone` varchar(13) COLLATE latin1_spanish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `id_modalidade` int(11) NOT NULL,
  `id_instrutor` int(11) NOT NULL,
  `id_endereco` int(12) NOT NULL,
  PRIMARY KEY (`id_filial`),
  KEY `FK_filial_endereco` (`id_endereco`),
  KEY `FK_filial_instrutor` (`id_instrutor`),
  KEY `fk_filial_modalidade` (`id_modalidade`),
  KEY `fk_filial_1` (`id_modalidade`),
  KEY `fk_filial_2` (`id_instrutor`),
  KEY `fk_filial_3` (`id_endereco`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE IF NOT EXISTS `fornecedor` (
  `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `telefone` varchar(13) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_fornecedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `graduacao`
--

CREATE TABLE IF NOT EXISTS `graduacao` (
  `id_graduacao` int(11) NOT NULL AUTO_INCREMENT,
  `grau` varchar(45) DEFAULT NULL,
  `faixa` varchar(45) DEFAULT NULL,
  `id_modalidade` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_graduacao`),
  KEY `fk_graduacao_id_modalidade` (`id_modalidade`),
  KEY `fk_graduacao_1` (`id_modalidade`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `graduacao_federado`
--

CREATE TABLE IF NOT EXISTS `graduacao_federado` (
  `id_graduacao_federado` int(11) NOT NULL,
  `id_federado` int(11) NOT NULL,
  `grau` varchar(7) COLLATE latin1_spanish_ci NOT NULL,
  `id_modalidade` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `data_emissao` date NOT NULL,
  PRIMARY KEY (`id_graduacao_federado`),
  UNIQUE KEY `chave` (`id_federado`,`grau`,`id_modalidade`),
  KEY `fk_graduacao_federado_1` (`id_federado`),
  KEY `fk_graduacao_federado_2` (`id_modalidade`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `graduacao_participantes`
--

CREATE TABLE IF NOT EXISTS `graduacao_participantes` (
  `id_graduacao_participantes` int(11) NOT NULL,
  `id_evento_graduacao` int(11) NOT NULL,
  `id_federado` int(11) NOT NULL,
  PRIMARY KEY (`id_graduacao_participantes`),
  KEY `FK_participante` (`id_federado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `instrutor`
--

CREATE TABLE IF NOT EXISTS `instrutor` (
  `id_instrutor` int(11) NOT NULL,
  `id_federado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_instrutor`),
  KEY `fk_instrutor_1` (`id_federado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id_item` int(2) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `id_modalidade` int(11) NOT NULL,
  PRIMARY KEY (`id_item`),
  KEY `fk_item_1` (`id_modalidade`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_pedido`
--

CREATE TABLE IF NOT EXISTS `itens_pedido` (
  `id_pedido` int(12) NOT NULL,
  `id_item` int(2) NOT NULL,
  `tamanho` varchar(2) COLLATE latin1_spanish_ci NOT NULL,
  `quantidade` int(3) NOT NULL,
  PRIMARY KEY (`id_pedido`,`id_item`),
  KEY `FK_itens_pedido` (`id_item`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL,
  `login` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `senha` varchar(32) COLLATE latin1_spanish_ci NOT NULL,
  `nivel_acesso` int(1) NOT NULL,
  `id_federado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_nivel_acesso` (`nivel_acesso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `matricula`
--

CREATE TABLE IF NOT EXISTS `matricula` (
  `id_federado` bigint(20) NOT NULL,
  `id_modalidade` int(11) NOT NULL,
  `id_filial` int(10) NOT NULL,
  `status` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_federado`,`id_filial`),
  KEY `FK_matricula_filial` (`id_filial`),
  KEY `fk_matricula_1` (`id_modalidade`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `modalidade`
--

CREATE TABLE IF NOT EXISTS `modalidade` (
  `id_modalidade` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_modalidade`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `modalidade`
--

INSERT INTO `modalidade` (`id_modalidade`, `nome`) VALUES
(1, 'Judo'),
(2, 'Karate');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nacionalidade`
--

CREATE TABLE IF NOT EXISTS `nacionalidade` (
  `id_nacionalidade` int(11) NOT NULL AUTO_INCREMENT,
  `nacionalidade` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_nacionalidade`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=34 ;

--
-- Extraindo dados da tabela `nacionalidade`
--

INSERT INTO `nacionalidade` (`id_nacionalidade`, `nacionalidade`) VALUES
(1, 'Brasileiro'),
(2, 'Argentino'),
(3, 'Chileno'),
(4, 'Uruguaio'),
(5, 'Paraguaio'),
(6, 'Equatoriano'),
(7, 'Peruano'),
(8, 'Boliviano'),
(9, 'Venezuelano'),
(10, 'Colombiano'),
(11, 'Sul-coreano'),
(12, 'Norte-coreano'),
(13, 'Japonês'),
(14, 'Chinês'),
(15, 'Norte-Americano'),
(16, 'Mexicano'),
(17, 'Canadense'),
(18, 'Tailandês'),
(19, 'Português'),
(20, 'Espanhol'),
(21, 'Francês'),
(22, 'Inglês'),
(23, 'Israelita'),
(24, 'Indiano'),
(25, 'Russo'),
(26, 'Escocês'),
(27, 'Galês'),
(28, 'Irlandês'),
(29, 'Australiano'),
(30, 'Cingapurenho'),
(31, 'Malaio'),
(32, 'Hondurenho'),
(33, 'Haitiano');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `id_pedido` int(12) NOT NULL AUTO_INCREMENT,
  `data_pedido` date NOT NULL,
  `id_status_pedido` int(11) NOT NULL,
  `id_coordenador` int(11) NOT NULL,
  `id_fornecedor` int(3) NOT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `FK_fornecedor` (`id_fornecedor`),
  KEY `FK_coordenador_responsavel` (`id_coordenador`),
  KEY `FK_status_pedido` (`id_status_pedido`),
  KEY `fk_pedido_1` (`id_status_pedido`),
  KEY `fk_pedido_2` (`id_coordenador`),
  KEY `fk_pedido_3` (`id_fornecedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `prontuario`
--

CREATE TABLE IF NOT EXISTS `prontuario` (
  `id_prontuario` int(11) NOT NULL,
  `id_federado` int(11) NOT NULL,
  `id_evento_graduacao` int(11) NOT NULL,
  `arquivo` varchar(35) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_prontuario`),
  KEY `fk_prontuario_1` (`id_federado`),
  KEY `fk_prontuario_2` (`id_evento_graduacao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_federado`
--

CREATE TABLE IF NOT EXISTS `status_federado` (
  `id_status_federado` int(1) NOT NULL,
  `status` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_status_federado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Extraindo dados da tabela `status_federado`
--

INSERT INTO `status_federado` (`id_status_federado`, `status`) VALUES
(0, 'Inativo'),
(1, 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_pedido`
--

CREATE TABLE IF NOT EXISTS `status_pedido` (
  `id_status_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_status_pedido`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `status_pedido`
--

INSERT INTO `status_pedido` (`id_status_pedido`, `descricao`) VALUES
(0, 'Finalizado'),
(1, 'Em espera'),
(2, 'Cancelado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_certificado`
--

CREATE TABLE IF NOT EXISTS `tipo_certificado` (
  `id_tipo_certificado` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_tipo_certificado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_federado`
--

CREATE TABLE IF NOT EXISTS `tipo_federado` (
  `id_tipo_federado` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_tipo_federado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `tipo_federado`
--

INSERT INTO `tipo_federado` (`id_tipo_federado`, `tipo`) VALUES
(1, 'Aluno'),
(2, 'Instrutor'),
(3, 'Coordenador'),
(4, 'Administrador');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `certificado`
--
ALTER TABLE `certificado`
  ADD CONSTRAINT `fk_certificado_3` FOREIGN KEY (`id_tipo_certificado`) REFERENCES `tipo_certificado` (`id_tipo_certificado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_certificado_1` FOREIGN KEY (`id_evento_graduacao`) REFERENCES `evento_graduacao` (`id_evento_graduacao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_certificado_2` FOREIGN KEY (`id_federado`) REFERENCES `federado` (`id_federado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `coordenador`
--
ALTER TABLE `coordenador`
  ADD CONSTRAINT `fk_coordenador_1` FOREIGN KEY (`id_federado`) REFERENCES `federado` (`id_federado`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Restrições para a tabela `evento_graduacao`
--
ALTER TABLE `evento_graduacao`
  ADD CONSTRAINT `fk_evento_graduacao_2` FOREIGN KEY (`id_modalidade`) REFERENCES `modalidade` (`id_modalidade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evento_graduacao_1` FOREIGN KEY (`id_endereco`) REFERENCES `endereco` (`id_endereco`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `federado`
--
ALTER TABLE `federado`
  ADD CONSTRAINT `fk_federado_4` FOREIGN KEY (`id_escolaridade`) REFERENCES `escolaridade` (`id_escolaridade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_federado_1` FOREIGN KEY (`id_endereco`) REFERENCES `endereco` (`id_endereco`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_federado_2` FOREIGN KEY (`id_nacionalidade`) REFERENCES `nacionalidade` (`id_nacionalidade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_federado_3` FOREIGN KEY (`id_status_federado`) REFERENCES `status_federado` (`id_status_federado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `filial`
--
ALTER TABLE `filial`
  ADD CONSTRAINT `fk_filial_3` FOREIGN KEY (`id_endereco`) REFERENCES `endereco` (`id_endereco`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_filial_1` FOREIGN KEY (`id_modalidade`) REFERENCES `modalidade` (`id_modalidade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_filial_2` FOREIGN KEY (`id_instrutor`) REFERENCES `instrutor` (`id_instrutor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `graduacao`
--
ALTER TABLE `graduacao`
  ADD CONSTRAINT `fk_graduacao_1` FOREIGN KEY (`id_modalidade`) REFERENCES `modalidade` (`id_modalidade`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `graduacao_federado`
--
ALTER TABLE `graduacao_federado`
  ADD CONSTRAINT `fk_graduacao_federado_2` FOREIGN KEY (`id_modalidade`) REFERENCES `modalidade` (`id_modalidade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_graduacao_federado_1` FOREIGN KEY (`id_federado`) REFERENCES `federado` (`id_federado`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Restrições para a tabela `instrutor`
--
ALTER TABLE `instrutor`
  ADD CONSTRAINT `fk_instrutor_1` FOREIGN KEY (`id_federado`) REFERENCES `federado` (`id_federado`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Restrições para a tabela `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk_item_1` FOREIGN KEY (`id_modalidade`) REFERENCES `modalidade` (`id_modalidade`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_pedido_3` FOREIGN KEY (`id_fornecedor`) REFERENCES `fornecedor` (`id_fornecedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedido_1` FOREIGN KEY (`id_status_pedido`) REFERENCES `status_pedido` (`id_status_pedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedido_2` FOREIGN KEY (`id_coordenador`) REFERENCES `coordenador` (`id_coordenador`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `prontuario`
--
ALTER TABLE `prontuario`
  ADD CONSTRAINT `fk_prontuario_2` FOREIGN KEY (`id_evento_graduacao`) REFERENCES `evento_graduacao` (`id_evento_graduacao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prontuario_1` FOREIGN KEY (`id_federado`) REFERENCES `federado` (`id_federado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
