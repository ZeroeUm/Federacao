-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 22/04/2013 às 19:23:15
-- Versão do Servidor: 5.1.66-0ubuntu0.11.10.3
-- Versão do PHP: 5.3.6-13ubuntu3.10

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
  `id_certificado` int(11) NOT NULL AUTO_INCREMENT,
  `id_evento` int(8) NOT NULL,
  `id_federado` int(11) NOT NULL,
  `data_emissao` date NOT NULL,
  `id_tipo_certificado` int(5) NOT NULL,
  PRIMARY KEY (`id_certificado`),
  KEY `FK_tipo_certificado` (`id_tipo_certificado`),
  KEY `FK_certificado_federado` (`id_federado`),
  KEY `FK_evento_graduacao` (`id_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `coordenador`
--

CREATE TABLE IF NOT EXISTS `coordenador` (
  `id_coordenador` int(11) NOT NULL AUTO_INCREMENT,
  `id_federado` int(11) NOT NULL,
  PRIMARY KEY (`id_coordenador`),
  KEY `FK_coordenador_federado` (`id_federado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `coordenador`
--

INSERT INTO `coordenador` (`id_coordenador`, `id_federado`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE IF NOT EXISTS `endereco` (
  `id_endereco` int(12) NOT NULL AUTO_INCREMENT,
  `logradouro` varchar(80) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `numero` int(5) NOT NULL,
  `complemento` varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `bairro` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `cidade` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `uf` int(2) NOT NULL,
  `tipo_endereco` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_endereco`),
  KEY `FK_endereco_tipo_endereco` (`tipo_endereco`),
  KEY `FK_endereco_uf` (`uf`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id_endereco`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `tipo_endereco`) VALUES
(1, 'Rua do coordenador ', 1540, '', 'Penha', 'São paulo', 1, 1),
(2, 'Rua do coordenador ', 3, NULL, 'Tucuruvi', 'São paulo', 1, 1),
(3, 'Rua do instrutor', 5887, '', 'Itaquera', 'São paulo', 1, 1),
(4, 'Endereço filial 1', 2000, '', 'Centro', 'São paulo', 1, 1),
(5, 'Rua do aluno', 150, '1', 'Vila Mariana', 'SÃ£o paulo', 1, 1),
(9, 'Rua dos eventos ', 161, 'Casa', 'jaÃ§ana', 'SÃ£o Paulo', 1, 3),
(10, 'Rua dos eventos ', 161, '', 'Tucuruvi', 'SÃ£o Paulo', 1, 3),
(11, 'Rua dos eventos ', 161, '', 'asdsad', 'asdasd', 1, 3),
(12, 'asdasdad', 123, '', 'asdasdasd', 'asdasdasd', 1, 3),
(13, 'Rua dos eventos ', 161, '', 'Tucuruvi', 'SÃ£o Paulo', 1, 3),
(14, 'dasdasdasd', 140, 'as', 'Penha', 'sp', 1, 1),
(15, 'Rua do evento', 123, '', 'Bairro do evento', 'Cidade do evento', 1, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `escolaridade`
--

CREATE TABLE IF NOT EXISTS `escolaridade` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `escolaridade`
--

INSERT INTO `escolaridade` (`id`, `descricao`) VALUES
(1, 'Ensino fundamental'),
(2, 'Ensino médio'),
(3, 'Ensino Superior');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `id_estados` int(2) NOT NULL AUTO_INCREMENT,
  `sigla` varchar(2) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `nome` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_estados`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `estados`
--

INSERT INTO `estados` (`id_estados`, `sigla`, `nome`) VALUES
(1, 'SP', 'São Paulo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento_graduacao`
--

CREATE TABLE IF NOT EXISTS `evento_graduacao` (
  `id_evento` int(8) NOT NULL COMMENT 'ano + modalidade + numero do evento (20130104)',
  `numero_evento` int(2) NOT NULL,
  `data_evento` date NOT NULL,
  `id_endereco` int(12) NOT NULL,
  `id_modalidade` int(2) NOT NULL,
  `descricao` longtext CHARACTER SET latin1 COLLATE latin1_spanish_ci,
  PRIMARY KEY (`id_evento`),
  KEY `FK_evento_graduacao_endereco` (`id_endereco`),
  KEY `FK_evento_graduacao_modalidade` (`id_modalidade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `evento_graduacao`
--

INSERT INTO `evento_graduacao` (`id_evento`, `numero_evento`, `data_evento`, `id_endereco`, `id_modalidade`, `descricao`) VALUES
(2147483647, 13, '2013-04-30', 15, 1, '<p>O evento acontecer&aacute; as 18:00 todos est&atilde;o convidados</p>');

-- --------------------------------------------------------

--
-- Estrutura da tabela `faixa`
--

CREATE TABLE IF NOT EXISTS `faixa` (
  `id_faixa` int(11) NOT NULL AUTO_INCREMENT,
  `id_modalidade` int(11) DEFAULT NULL,
  `nome` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_faixa`),
  KEY `fk_faixa_1` (`id_modalidade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `federado`
--

CREATE TABLE IF NOT EXISTS `federado` (
  `id_federado` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `filiacao_materna` varchar(60) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `filiacao_paterna` varchar(60) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `sexo` varchar(1) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL COMMENT 'M/F',
  `data_nasc` date NOT NULL,
  `rg` varchar(12) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `telefone` varchar(13) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `celular` varchar(14) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `caminho_imagem` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL DEFAULT 'sem foto',
  `id_escolaridade` int(1) NOT NULL,
  `id_status` int(1) NOT NULL DEFAULT '1',
  `id_endereco` int(12) NOT NULL,
  `id_nacionalidade` int(1) NOT NULL,
  `id_tipo_federado` int(1) NOT NULL,
  `tamanho_faixa` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_federado`),
  KEY `FK_federado_endereco` (`id_endereco`),
  KEY `FK_federado_escolaridade` (`id_escolaridade`),
  KEY `FK_federado_nacionalidade` (`id_nacionalidade`),
  KEY `FK_federado_status_federado` (`id_status`),
  KEY `FK_federado_tipo_federado` (`id_tipo_federado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `federado`
--

INSERT INTO `federado` (`id_federado`, `nome`, `filiacao_materna`, `filiacao_paterna`, `sexo`, `data_nasc`, `rg`, `telefone`, `celular`, `email`, `caminho_imagem`, `id_escolaridade`, `id_status`, `id_endereco`, `id_nacionalidade`, `id_tipo_federado`, `tamanho_faixa`) VALUES
(1, 'Administrador', '--', '--', 'm', '1985-10-25', '5211144452', '(11)3333-9999', '(11)3333-99999', 'contato@mail.com', 'sem foto', 3, 1, 1, 1, 4, NULL),
(2, 'Coordenador', '--', '--', 'm', '1975-10-15', '5211144452', '(11)3333-9999', '(11)3333-99999', 'contato@mail.com', 'sem foto', 3, 1, 2, 1, 3, NULL),
(3, 'Instrutor', '--', '--', 'm', '2000-11-25', '5211144452', '(11)3333-9999', '(11)3333-9999', 'contato@mail.com', 'sem foto', 3, 1, 3, 1, 2, NULL),
(4, 'Aluno 1', NULL, 'pai aluno 1', 'M', '1985-09-30', '555555555', '111111111', '111111111', 'contato@dworker.com.br', 'sem foto', 2, 1, 5, 1, 1, NULL),
(5, 'joana', 'mae', 'pai', 'M', '1985-04-12', '554444445', '1122223333', '1199998888', 'mail@mail.com', 'sem foto', 3, 1, 14, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `filial`
--

CREATE TABLE IF NOT EXISTS `filial` (
  `id_filial` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `cnpj` varchar(19) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `telefone` varchar(13) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `fax` varchar(13) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `representante` varchar(60) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `id_modalidade` int(2) NOT NULL,
  `id_instrutor` int(11) NOT NULL,
  `id_endereco` int(12) NOT NULL,
  PRIMARY KEY (`id_filial`),
  KEY `FK_filial_endereco` (`id_endereco`),
  KEY `FK_filial_modalidade` (`id_modalidade`),
  KEY `FK_filial_instrutor` (`id_instrutor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `filial`
--

INSERT INTO `filial` (`id_filial`, `nome`, `cnpj`, `telefone`, `fax`, `email`, `representante`, `id_modalidade`, `id_instrutor`, `id_endereco`) VALUES
(1, 'Filial 1', '22.100.222/0001-25', '(11)3333-2222', NULL, 'filial@email.com.br', 'Representantes', 1, 1, 4),
(2, 'Filial 2', '22.100.222/0001-25', '(11)3333-2222', NULL, 'filial2@mail.com', 'Representante', 1, 1, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE IF NOT EXISTS `fornecedor` (
  `id_fornecedor` int(3) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `telefone` varchar(13) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_fornecedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `graduacao`
--

CREATE TABLE IF NOT EXISTS `graduacao` (
  `id_graduacao` int(11) NOT NULL AUTO_INCREMENT,
  `id_modalidade` int(2) NOT NULL,
  `grau` varchar(7) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `ordem` int(2) DEFAULT NULL,
  `faixa` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `curriculo` blob,
  PRIMARY KEY (`id_graduacao`),
  KEY `FK_graduacao_modalidade` (`id_modalidade`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Extraindo dados da tabela `graduacao`
--

INSERT INTO `graduacao` (`id_graduacao`, `id_modalidade`, `grau`, `ordem`, `faixa`, `curriculo`) VALUES
(1, 1, '-------', 10, 'Candidato à preta', NULL),
(2, 1, '10º Gub', 1, 'Branca', NULL),
(3, 1, '1º Dan', 11, 'Preta 1º dan', NULL),
(4, 1, '1º Gub', 9, 'Vermelha ponta preta', NULL),
(5, 1, '2º Dan', 12, 'Preta 2º dan', NULL),
(6, 1, '2º Gub ', 8, 'Vermelha', NULL),
(7, 1, '3º Dan', 13, 'Preta 3º dan', NULL),
(8, 1, '3º Gub', 7, 'Azul ponta vermelha', NULL),
(9, 1, '4º Dan', 14, 'Preta 4º dan', NULL),
(10, 1, '4º Gub', 6, 'Azul', NULL),
(11, 1, '5º Dan', 15, 'Preta 5º dan', NULL),
(12, 1, '5º Gub', 5, 'Verde ponta azul', NULL),
(13, 1, '6º Dan', 16, 'Preta 6º dan', NULL),
(14, 1, '6º Gub', 4, 'Verde', NULL),
(15, 1, '7º Dan', 17, 'Preta 7º dan', NULL),
(16, 1, '7º Gub', 3, 'Amarela ponta verde', NULL),
(17, 1, '8º Gub', 2, 'Amarela', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `graduacao_federado`
--

CREATE TABLE IF NOT EXISTS `graduacao_federado` (
  `id_graduacao_federado` int(11) NOT NULL AUTO_INCREMENT,
  `id_modalidade` int(2) NOT NULL,
  `id_graduacao` varchar(7) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `id_federado` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `data_emissao` date NOT NULL,
  PRIMARY KEY (`id_graduacao_federado`),
  KEY `FK_federado_graduacao` (`id_federado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `graduacao_federado`
--

INSERT INTO `graduacao_federado` (`id_graduacao_federado`, `id_modalidade`, `id_graduacao`, `id_federado`, `status`, `data_emissao`) VALUES
(1, 1, '2', 4, 1, '2013-01-20'),
(2, 1, '10', 5, 1, '2013-02-20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `graduacao_participantes`
--

CREATE TABLE IF NOT EXISTS `graduacao_participantes` (
  `id_evento` int(8) NOT NULL,
  `id_federado` int(11) NOT NULL,
  `id_faixa` int(11) DEFAULT NULL COMMENT 'faixa que está se candidatando\n',
  PRIMARY KEY (`id_evento`,`id_federado`),
  KEY `FK_participante` (`id_federado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `instrutor`
--

CREATE TABLE IF NOT EXISTS `instrutor` (
  `id_instrutor` int(11) NOT NULL AUTO_INCREMENT,
  `id_federado` int(11) NOT NULL,
  PRIMARY KEY (`id_instrutor`),
  KEY `FK_instrutor_federado` (`id_federado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Aqui contem a lista de todos os que são instrutores dentro d' AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `instrutor`
--

INSERT INTO `instrutor` (`id_instrutor`, `id_federado`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `instrutor_por_modalidade`
--

CREATE TABLE IF NOT EXISTS `instrutor_por_modalidade` (
  `id_instrutor_por_modalidade` int(11) NOT NULL AUTO_INCREMENT,
  `id_modalidade` int(11) NOT NULL,
  `id_instrutor` int(11) NOT NULL,
  `data_inicio` date DEFAULT NULL,
  PRIMARY KEY (`id_instrutor_por_modalidade`),
  KEY `fk_instrutor_por_modalidade_1` (`id_modalidade`),
  KEY `fk_instrutor_por_modalidade_2` (`id_instrutor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Aqui nessa tabela fica a lista com todos os instrutores de a' AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `instrutor_por_modalidade`
--

INSERT INTO `instrutor_por_modalidade` (`id_instrutor_por_modalidade`, `id_modalidade`, `id_instrutor`, `data_inicio`) VALUES
(1, 1, 1, '2012-05-07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id_item` int(2) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `id_modalidade` int(2) NOT NULL,
  PRIMARY KEY (`id_item`),
  KEY `FK_item_modalidade` (`id_modalidade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_pedido`
--

CREATE TABLE IF NOT EXISTS `itens_pedido` (
  `id_pedido` int(12) NOT NULL,
  `numero` int(3) NOT NULL,
  `id_item` int(2) NOT NULL,
  `tamanho` varchar(2) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `quantidade` int(3) NOT NULL,
  PRIMARY KEY (`id_pedido`,`numero`),
  KEY `FK_itens_pedido` (`id_item`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `senha` varchar(32) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `id_federado` int(11) NOT NULL,
  PRIMARY KEY (`id_login`),
  KEY `FK_login_federado` (`id_federado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id_login`, `login`, `senha`, `id_federado`) VALUES
(1, 'administrador', '1234', 1),
(2, 'a1', 'KQinTUFh2p5', 4),
(3, 'jjoana', '1m5eFJ5vrEi', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mala_direta`
--

CREATE TABLE IF NOT EXISTS `mala_direta` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `mensagem` mediumtext CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL COMMENT 'campo para armazenar a mensagem de mala-direta aos aniversariantes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `matricula`
--

CREATE TABLE IF NOT EXISTS `matricula` (
  `id_federado` int(11) NOT NULL,
  `id_modalidade` int(2) NOT NULL,
  `id_filial` int(10) NOT NULL,
  `data_matricula` date NOT NULL COMMENT 'data da matricula para saber o tempo de prática',
  `matricula_filial` date NOT NULL COMMENT 'data de matricula na filial',
  PRIMARY KEY (`id_federado`,`id_modalidade`,`id_filial`),
  KEY `FK_matricula_modalidade` (`id_modalidade`),
  KEY `FK_matricula_filial` (`id_filial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `matricula`
--

INSERT INTO `matricula` (`id_federado`, `id_modalidade`, `id_filial`, `data_matricula`, `matricula_filial`) VALUES
(4, 1, 1, '2013-04-18', '2013-04-18'),
(5, 1, 1, '2013-04-22', '2013-04-18');

--
-- Gatilhos `matricula`
--
DROP TRIGGER IF EXISTS `matricula_before_insert`;
DELIMITER //
CREATE TRIGGER `matricula_before_insert` BEFORE INSERT ON `matricula`
 FOR EACH ROW BEGIN
	IF new.data_matricula = '0000-00-00' THEN
		SET NEW.data_matricula = NOW();
	END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `modalidade`
--

CREATE TABLE IF NOT EXISTS `modalidade` (
  `id_modalidade` int(2) NOT NULL AUTO_INCREMENT,
  `nome` varchar(15) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `id_coordenador` int(11) NOT NULL,
  PRIMARY KEY (`id_modalidade`),
  KEY `FK_coordenador_modalidade` (`id_coordenador`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `modalidade`
--

INSERT INTO `modalidade` (`id_modalidade`, `nome`, `id_coordenador`) VALUES
(1, 'Arte Marcial', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimento_faixa`
--

CREATE TABLE IF NOT EXISTS `movimento_faixa` (
  `id_movimento_faixa` int(11) NOT NULL AUTO_INCREMENT,
  `id_faixa` int(11) DEFAULT NULL,
  `id_modalidade` int(11) DEFAULT NULL,
  `nome_movimento` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_movimento_faixa`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `nacionalidade`
--

CREATE TABLE IF NOT EXISTS `nacionalidade` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nacionalidade` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `nacionalidade`
--

INSERT INTO `nacionalidade` (`id`, `nacionalidade`) VALUES
(1, 'Brasileiro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `id_pedido` int(12) NOT NULL AUTO_INCREMENT,
  `data_pedido` date NOT NULL,
  `status` int(1) NOT NULL,
  `id_responsavel` int(11) NOT NULL,
  `fornecedor` int(3) NOT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `FK_pedido_fornecedor` (`fornecedor`),
  KEY `FK_pedido_coordenador_responsavel` (`id_responsavel`),
  KEY `FK_pedido_status_pedido` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Gatilhos `pedido`
--
DROP TRIGGER IF EXISTS `pedido_before_insert`;
DELIMITER //
CREATE TRIGGER `pedido_before_insert` BEFORE INSERT ON `pedido`
 FOR EACH ROW BEGIN
	if NEW.data_pedido = '0000-00-00' THEN
		SET NEW.data_pedido = NOW();
	END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pre_avaliacao`
--

CREATE TABLE IF NOT EXISTS `pre_avaliacao` (
  `id_pre_avaliacao` int(11) NOT NULL AUTO_INCREMENT,
  `id_evento` int(11) NOT NULL,
  `id_federado` int(11) NOT NULL,
  `id_status_avaliacao` int(11) NOT NULL,
  `data_agendamento` date DEFAULT NULL,
  `id_filial` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pre_avaliacao`),
  KEY `fk_pre_avaliacao_1` (`id_evento`),
  KEY `fk_pre_avaliacao_2` (`id_federado`),
  KEY `fk_pre_avaliacao_3` (`id_status_avaliacao`),
  KEY `fk_pre_avaliacao_4` (`id_filial`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `pre_avaliacao`
--

INSERT INTO `pre_avaliacao` (`id_pre_avaliacao`, `id_evento`, `id_federado`, `id_status_avaliacao`, `data_agendamento`, `id_filial`) VALUES
(1, 2147483647, 4, 4, '0000-00-00', 1),
(2, 2147483647, 5, 4, '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `prontuario`
--

CREATE TABLE IF NOT EXISTS `prontuario` (
  `id_prontuario` int(11) NOT NULL,
  `id_federado` int(11) DEFAULT NULL,
  `id_evento` int(8) DEFAULT NULL,
  `id_faixa` int(11) DEFAULT NULL,
  `id_movimento` int(11) DEFAULT NULL,
  `nota` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_prontuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_avaliacao`
--

CREATE TABLE IF NOT EXISTS `status_avaliacao` (
  `id_status_avaliacao` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_status_avaliacao`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `status_avaliacao`
--

INSERT INTO `status_avaliacao` (`id_status_avaliacao`, `descricao`) VALUES
(1, 'Aprovado'),
(2, 'Agendado'),
(3, 'Reprovado'),
(4, 'Aguardando agendamento');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_federado`
--

CREATE TABLE IF NOT EXISTS `status_federado` (
  `id` int(1) NOT NULL,
  `status` varchar(10) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `status_federado`
--

INSERT INTO `status_federado` (`id`, `status`) VALUES
(1, 'Ativo'),
(2, 'Inativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_pedido`
--

CREATE TABLE IF NOT EXISTS `status_pedido` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `status_pedido`
--

INSERT INTO `status_pedido` (`id`, `descricao`) VALUES
(1, 'Aberto'),
(2, 'Em andamento'),
(3, 'Finalizado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_certificado`
--

CREATE TABLE IF NOT EXISTS `tipo_certificado` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_endereco`
--

CREATE TABLE IF NOT EXISTS `tipo_endereco` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tipo_endereco`
--

INSERT INTO `tipo_endereco` (`id`, `descricao`) VALUES
(1, 'Casa'),
(2, 'Apartamento'),
(3, 'Evento');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_federado`
--

CREATE TABLE IF NOT EXISTS `tipo_federado` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(15) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `tipo_federado`
--

INSERT INTO `tipo_federado` (`id`, `tipo`) VALUES
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
  ADD CONSTRAINT `FK_certificado_evento` FOREIGN KEY (`id_evento`) REFERENCES `evento_graduacao` (`id_evento`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_certificado_federado` FOREIGN KEY (`id_federado`) REFERENCES `federado` (`id_federado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tipo_certificado` FOREIGN KEY (`id_tipo_certificado`) REFERENCES `tipo_certificado` (`id`) ON UPDATE CASCADE;

--
-- Restrições para a tabela `coordenador`
--
ALTER TABLE `coordenador`
  ADD CONSTRAINT `FK_coordenador_federado` FOREIGN KEY (`id_federado`) REFERENCES `federado` (`id_federado`) ON UPDATE CASCADE;

--
-- Restrições para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `FK_endereco_tipo_endereco` FOREIGN KEY (`tipo_endereco`) REFERENCES `tipo_endereco` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_endereco_uf` FOREIGN KEY (`uf`) REFERENCES `estados` (`id_estados`) ON UPDATE CASCADE;

--
-- Restrições para a tabela `evento_graduacao`
--
ALTER TABLE `evento_graduacao`
  ADD CONSTRAINT `FK_evento_graduacao_endereco` FOREIGN KEY (`id_endereco`) REFERENCES `endereco` (`id_endereco`),
  ADD CONSTRAINT `FK_evento_graduacao_modalidade` FOREIGN KEY (`id_modalidade`) REFERENCES `modalidade` (`id_modalidade`) ON UPDATE CASCADE;

--
-- Restrições para a tabela `faixa`
--
ALTER TABLE `faixa`
  ADD CONSTRAINT `fk_faixa_1` FOREIGN KEY (`id_modalidade`) REFERENCES `modalidade` (`id_modalidade`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `federado`
--
ALTER TABLE `federado`
  ADD CONSTRAINT `FK_federado_endereco` FOREIGN KEY (`id_endereco`) REFERENCES `endereco` (`id_endereco`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_federado_escolaridade` FOREIGN KEY (`id_escolaridade`) REFERENCES `escolaridade` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_federado_nacionalidade` FOREIGN KEY (`id_nacionalidade`) REFERENCES `nacionalidade` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_federado_status_federado` FOREIGN KEY (`id_status`) REFERENCES `status_federado` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_federado_tipo_federado` FOREIGN KEY (`id_tipo_federado`) REFERENCES `tipo_federado` (`id`) ON UPDATE CASCADE;

--
-- Restrições para a tabela `filial`
--
ALTER TABLE `filial`
  ADD CONSTRAINT `FK_filial_endereco` FOREIGN KEY (`id_endereco`) REFERENCES `endereco` (`id_endereco`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_filial_instrutor` FOREIGN KEY (`id_instrutor`) REFERENCES `instrutor` (`id_instrutor`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_filial_modalidade` FOREIGN KEY (`id_modalidade`) REFERENCES `modalidade` (`id_modalidade`) ON UPDATE CASCADE;

--
-- Restrições para a tabela `graduacao`
--
ALTER TABLE `graduacao`
  ADD CONSTRAINT `FK_graduacao_modalidade` FOREIGN KEY (`id_modalidade`) REFERENCES `modalidade` (`id_modalidade`) ON UPDATE CASCADE;

--
-- Restrições para a tabela `graduacao_federado`
--
ALTER TABLE `graduacao_federado`
  ADD CONSTRAINT `FK_federado_graduacao` FOREIGN KEY (`id_federado`) REFERENCES `federado` (`id_federado`) ON UPDATE CASCADE;

--
-- Restrições para a tabela `graduacao_participantes`
--
ALTER TABLE `graduacao_participantes`
  ADD CONSTRAINT `FK_graduacao` FOREIGN KEY (`id_evento`) REFERENCES `evento_graduacao` (`id_evento`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_participante` FOREIGN KEY (`id_federado`) REFERENCES `federado` (`id_federado`) ON UPDATE CASCADE;

--
-- Restrições para a tabela `instrutor`
--
ALTER TABLE `instrutor`
  ADD CONSTRAINT `FK_instrutor_federado` FOREIGN KEY (`id_federado`) REFERENCES `federado` (`id_federado`) ON UPDATE CASCADE;

--
-- Restrições para a tabela `instrutor_por_modalidade`
--
ALTER TABLE `instrutor_por_modalidade`
  ADD CONSTRAINT `fk_instrutor_por_modalidade_1` FOREIGN KEY (`id_modalidade`) REFERENCES `modalidade` (`id_modalidade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_instrutor_por_modalidade_2` FOREIGN KEY (`id_instrutor`) REFERENCES `instrutor` (`id_instrutor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `FK_item_modalidade` FOREIGN KEY (`id_modalidade`) REFERENCES `modalidade` (`id_modalidade`) ON UPDATE CASCADE;

--
-- Restrições para a tabela `itens_pedido`
--
ALTER TABLE `itens_pedido`
  ADD CONSTRAINT `FK_itens_pedido` FOREIGN KEY (`id_item`) REFERENCES `item` (`id_item`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_pedido` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`) ON UPDATE CASCADE;

--
-- Restrições para a tabela `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `FK_login_federado` FOREIGN KEY (`id_federado`) REFERENCES `federado` (`id_federado`) ON UPDATE CASCADE;

--
-- Restrições para a tabela `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `FK_matricula_federado` FOREIGN KEY (`id_federado`) REFERENCES `federado` (`id_federado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_matricula_filial` FOREIGN KEY (`id_filial`) REFERENCES `filial` (`id_filial`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_matricula_modalidade` FOREIGN KEY (`id_modalidade`) REFERENCES `modalidade` (`id_modalidade`) ON UPDATE CASCADE;

--
-- Restrições para a tabela `modalidade`
--
ALTER TABLE `modalidade`
  ADD CONSTRAINT `FK_coordenador_modalidade` FOREIGN KEY (`id_coordenador`) REFERENCES `coordenador` (`id_coordenador`) ON UPDATE CASCADE;

--
-- Restrições para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `FK_pedido_coordenador_responsavel` FOREIGN KEY (`id_responsavel`) REFERENCES `coordenador` (`id_coordenador`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_pedido_fornecedor` FOREIGN KEY (`fornecedor`) REFERENCES `fornecedor` (`id_fornecedor`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_pedido_status_pedido` FOREIGN KEY (`status`) REFERENCES `status_pedido` (`id`) ON UPDATE CASCADE;

--
-- Restrições para a tabela `pre_avaliacao`
--
ALTER TABLE `pre_avaliacao`
  ADD CONSTRAINT `fk_pre_avaliacao_1` FOREIGN KEY (`id_evento`) REFERENCES `evento_graduacao` (`id_evento`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pre_avaliacao_2` FOREIGN KEY (`id_federado`) REFERENCES `federado` (`id_federado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pre_avaliacao_3` FOREIGN KEY (`id_status_avaliacao`) REFERENCES `status_avaliacao` (`id_status_avaliacao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pre_avaliacao_4` FOREIGN KEY (`id_filial`) REFERENCES `filial` (`id_filial`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
