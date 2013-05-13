-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 13/05/2013 às 19:53:06
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
(1, 5);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id_endereco`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `tipo_endereco`) VALUES
(1, 'Rua do Administrador', 150, 'Complemento', 'Bela Vista', 'São Paulo', 1, 1),
(2, 'Rua do aluno', 260, NULL, 'Penha', 'São Paulo', 1, 1),
(3, 'Rua do aluno', 154, NULL, 'Penha', 'são paulo', 1, 1),
(4, 'Rua do aluno', 154, 'asdasd', 'Penha', 'São paulo', 1, 1),
(19, 'Rua dos eventos ', 161, '', '', 'São Paulo', 1, 3),
(20, 'Rua dos eventos ', 161, '', '', 'São Paulo', 1, 3),
(21, 'Rua dos eventos ', 161, '', '', 'São Paulo', 1, 3),
(22, 'Rua dos eventos ', 150, '', 'Bela Vista', 'São Paulo', 1, 3),
(23, 'asdasd', 154, 'asd', 'asd', 'São Paulo', 1, 1),
(24, 'asdadasd', 123, 'dasdasd', 'asdasd', 'asdasd', 1, 1),
(25, 'Endereco da filiaal 1', 154, '1', 'Penha', 'São paulo', 1, 1),
(26, 'Rua blábláblá', 77, NULL, 'Bela Vista', 'São Paulo', 1, 1),
(27, 'Rua dos eventos ', 161, '', 'jaçana', 'São Paulo', 1, 3),
(28, 'Rua dos eventos ', 161, '', 'jaçana', 'São Paulo', 1, 3),
(29, 'Rua dos eventos', 154, 'asad', 'Tucuruvi', 'São Paulo', 1, 3),
(30, 'Rua dos eventos ', 0, '', '', 'São Paulo', 1, 3),
(31, 'Rua dos eventos', 161, '', '', 'São paulo', 1, 3),
(32, 'Novo Evento', 78, '', 'Bela Vista', 'São paulo', 1, 3),
(33, 'Av Paulista ', 325, '', 'Bela Vista', 'são paulo', 1, 3),
(34, 'Av Paulista ', 325, '', 'Bela Vista', 'São Paulo', 1, 3),
(35, 'Endereco da filiaal 1', 22, '', 'Penha', 'São Paulo', 1, 1),
(36, 'Rua do Evento ', 151, '', 'Bela Vista', 'São paulo', 1, 3),
(37, 'Novo evento 2', 0, '', '', 'São paulo', 1, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `escolaridade`
--

CREATE TABLE IF NOT EXISTS `escolaridade` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `escolaridade`
--

INSERT INTO `escolaridade` (`id`, `descricao`) VALUES
(1, 'Ensino Fundamental Incompleto'),
(2, 'Ensino Fundamental Completo'),
(3, 'Ensino Médio Incompleto'),
(4, 'Ensino Médio Completo'),
(5, 'Ensino Superior Incompleto'),
(6, 'Ensino Superior Completo');

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
  `id_evento` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ano + modalidade + numero do evento (20130104)',
  `numero_evento` varchar(30) NOT NULL,
  `data_evento` date NOT NULL,
  `id_endereco` int(12) NOT NULL,
  `id_modalidade` int(2) NOT NULL,
  `descricao` longtext CHARACTER SET latin1 COLLATE latin1_spanish_ci,
  PRIMARY KEY (`id_evento`),
  UNIQUE KEY `validacao` (`numero_evento`),
  KEY `FK_evento_graduacao_endereco` (`id_endereco`),
  KEY `FK_evento_graduacao_modalidade` (`id_modalidade`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Extraindo dados da tabela `evento_graduacao`
--

INSERT INTO `evento_graduacao` (`id_evento`, `numero_evento`, `data_evento`, `id_endereco`, `id_modalidade`, `descricao`) VALUES
(19, '05-2013', '2013-05-31', 36, 1, 'Evento de graduação de faixa, para todos os filiados    \n        '),
(20, '06-2013', '2013-06-30', 37, 1, '    \n        asdasdasdas');

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
  UNIQUE KEY `index7` (`rg`,`data_nasc`),
  KEY `FK_federado_endereco` (`id_endereco`),
  KEY `FK_federado_escolaridade` (`id_escolaridade`),
  KEY `FK_federado_nacionalidade` (`id_nacionalidade`),
  KEY `FK_federado_status_federado` (`id_status`),
  KEY `FK_federado_tipo_federado` (`id_tipo_federado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `federado`
--

INSERT INTO `federado` (`id_federado`, `nome`, `filiacao_materna`, `filiacao_paterna`, `sexo`, `data_nasc`, `rg`, `telefone`, `celular`, `email`, `caminho_imagem`, `id_escolaridade`, `id_status`, `id_endereco`, `id_nacionalidade`, `id_tipo_federado`, `tamanho_faixa`) VALUES
(1, 'Administrador Mestre Carlos', 'Não Declarada', 'Não declarada', 'M', '1980-04-05', '52.444.111-1', '(11)1111-2222', '(11)3333-4444', 'mail@mail.com', '', 6, 1, 1, 1, 4, 'G'),
(3, 'Instrutor Roberto', 'Não declarado', 'Não declarado', 'M', '1980-11-01', '52.222.111-1', '(00)0000-0000', '(00)0000-0000', 'mail@mail.com', 'sem foto', 6, 1, 2, 1, 2, 'G'),
(5, 'Coordenador Valter', 'Não Declarado', 'Não Declarado', 'M', '2000-01-01', '58.222.222-1', '(00)0000-0000', '(00)0000-0000', 'mail@mail.com', 'sem foto', 6, 1, 2, 1, 3, 'G'),
(6, 'Aluno joão paulo', 'não declarado', 'não declarado', 'M', '1985-04-30', '55.444.444-5', '(11)2222-2222', '(11)96666-6666', 'mail@mail.com', 'sem foto', 4, 1, 3, 1, 1, 'M'),
(7, 'Aluna maria de Paula', 'não declarado', 'não declarado', 'F', '1999-04-09', '22.222.222-2', '(11)2222-2222', '(11)90494-3904', 'mail.com@mna.com.br', 'sem foto', 6, 1, 4, 1, 1, 'M'),
(8, 'Maria Fernanda', 'não declarado', 'não declarado', 'M', '1985-05-31', '55.444.444-5', '(11)1111-1111', '(11)99999-9999', 'email.re@email.com', 'sem foto', 4, 1, 23, 1, 1, 'M'),
(9, 'Caetano silveira', 'Não declarado', 'não declarado', 'M', '1969-12-31', '88.888.888-8', '(22)2222-2222', '(99)99999-9999', 'mail@mail.com', 'sem foto', 6, 1, 24, 1, 1, 'GG'),
(10, 'Paula Fernandes', 'não declarado', 'não declarado', 'F', '1985-04-30', '22.222.222-2', '(11)2222-2222', '(11)96666-6666', 'mail@mail.com', 'sem foto', 6, 1, 25, 1, 1, 'G'),
(11, 'Mariana silveira', 'não declarado', 'não declarado', 'F', '1970-05-22', '88.888.888-8', '(11)9999-9999', '(99)99999-9999', 'mail@mail.com', 'sem foto', 6, 1, 26, 1, 1, 'G'),
(12, 'Felipe de Oliveira da Silva', 'não declarado', 'não declarado', 'M', '1985-11-23', '55.444.444-5', '(11)96666-666', '(11)96666-6666', 'felipe@chipsetdesenvolvimento.com', 'sem foto', 6, 1, 35, 1, 1, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `filial`
--

INSERT INTO `filial` (`id_filial`, `nome`, `cnpj`, `telefone`, `fax`, `email`, `representante`, `id_modalidade`, `id_instrutor`, `id_endereco`) VALUES
(0, 'Administração', '000.000.000/0000-00', '(00)0000-0000', NULL, 'email@email.com', 'Mestre Carlos Mariano', 1, 2, 1),
(1, 'Default', '000.000.000/0000-00', '(00)0000-0000', '(00)0000-0000', 'mail@mail.com', 'Mestre Carlos', 1, 1, 1);

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
  `curriculo` blob COMMENT 'Curriculo da faixa na modalidade',
  PRIMARY KEY (`id_graduacao`),
  KEY `FK_graduacao_modalidade` (`id_modalidade`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `graduacao`
--

INSERT INTO `graduacao` (`id_graduacao`, `id_modalidade`, `grau`, `ordem`, `faixa`, `curriculo`) VALUES
(1, 1, '10º GUB', 1, 'Faixa Branca', NULL),
(2, 1, '8º GUB', 2, 'Faixa Amarela', NULL),
(3, 1, '7º GUB', 3, 'Faixa Ponta Amarela Verde', NULL),
(4, 1, '6º GUB', 4, 'Faixa Verde', NULL),
(5, 1, '5º GUB', 5, 'Faixa Ponta Verde Azul', NULL),
(6, 1, '4º GUB', 6, 'Faixa Azul', NULL),
(7, 1, '3º GUB', 7, 'Faixa Ponta Azul Vermelha', NULL),
(8, 1, '2º GUB', 8, 'Faixa Vermelha', NULL),
(9, 1, '1º GUB', 9, 'Faixa Vermelha Ponta Preta', NULL),
(10, 1, ' ', 10, 'Candidato à Preta', NULL),
(11, 1, '1º DAN', 11, 'Faixa Preta 1º DAN', NULL),
(12, 1, '2º DAN', 12, 'Faixa Preta 2º DAN', NULL),
(13, 1, '3º DAN', 13, 'Faixa Preta 3º DAN', NULL),
(14, 1, '4º DAN', 14, 'Faixa Preta 4º DAN', NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `graduacao_federado`
--

INSERT INTO `graduacao_federado` (`id_graduacao_federado`, `id_modalidade`, `id_graduacao`, `id_federado`, `status`, `data_emissao`) VALUES
(1, 1, '13', 1, 1, '1990-05-05'),
(2, 1, '4', 6, 1, '2013-05-13'),
(3, 1, '10', 5, 1, '1999-10-10'),
(4, 1, '11', 3, 1, '2000-01-10'),
(5, 1, '4', 7, 1, '2013-05-13'),
(6, 1, '4', 8, 1, '2013-05-13'),
(7, 1, '4', 9, 1, '2013-05-13'),
(8, 1, '4', 11, 1, '2013-05-13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `graduacao_participantes`
--

CREATE TABLE IF NOT EXISTS `graduacao_participantes` (
  `id_evento` int(8) NOT NULL,
  `id_federado` int(11) NOT NULL,
  `id_graduacao` int(11) DEFAULT NULL COMMENT 'faixa que está se candidatando\n',
  `status_participacao` int(11) DEFAULT '1' COMMENT '1 para participante e 0 para não participante',
  PRIMARY KEY (`id_evento`,`id_federado`),
  KEY `FK_participante` (`id_federado`),
  KEY `fk_graduacao_participantes_1` (`id_graduacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `graduacao_participantes`
--

INSERT INTO `graduacao_participantes` (`id_evento`, `id_federado`, `id_graduacao`, `status_participacao`) VALUES
(19, 6, 2, 1),
(19, 7, 2, 1),
(19, 8, 3, 1),
(19, 9, 2, 1),
(19, 11, 3, 1),
(20, 6, 4, 1),
(20, 7, 4, 1),
(20, 8, 4, 1),
(20, 9, 4, 1),
(20, 11, 4, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `instrutor`
--

CREATE TABLE IF NOT EXISTS `instrutor` (
  `id_instrutor` int(11) NOT NULL AUTO_INCREMENT,
  `id_federado` int(11) NOT NULL,
  PRIMARY KEY (`id_instrutor`),
  KEY `FK_instrutor_federado` (`id_federado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Aqui contem a lista de todos os que são instrutores dentro d' AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `instrutor`
--

INSERT INTO `instrutor` (`id_instrutor`, `id_federado`) VALUES
(2, 1),
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
(1, 1, 1, '2013-05-08');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id_login`, `login`, `senha`, `id_federado`) VALUES
(1, 'administrador', '1234', 1),
(3, 'apaulo', 'pPRBUMewgO', 6),
(4, 'apaula', 'ExBuOwUtWT', 7),
(5, 'mfernanda', 'kBWkX5OUwr', 8),
(6, 'csilveira', 'tpKGrPRXfv', 9),
(7, 'iroberto', '1234', 3),
(8, 'cvalter', '1234', 5),
(9, 'msilveira', '1234', 11);

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
(1, 1, 0, '2013-04-30', '2013-04-30'),
(3, 1, 0, '2013-04-30', '2013-04-30'),
(5, 1, 0, '2013-04-30', '2013-04-30'),
(6, 1, 1, '2013-04-29', '2013-04-29'),
(7, 1, 1, '2013-04-29', '2013-04-29'),
(8, 1, 1, '2013-04-29', '2013-04-29'),
(9, 1, 1, '2013-04-29', '2013-04-29'),
(11, 1, 1, '2013-05-03', '2013-05-03');

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
(1, 'Taekwondo', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimento_faixa`
--

CREATE TABLE IF NOT EXISTS `movimento_faixa` (
  `id_movimento_faixa` int(11) NOT NULL AUTO_INCREMENT,
  `id_graduacao` int(11) DEFAULT NULL,
  `id_modalidade` int(11) DEFAULT NULL,
  `nome_movimento` varchar(45) DEFAULT NULL,
  `sigla` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`id_movimento_faixa`),
  KEY `fk_movimento_faixa_1` (`id_modalidade`),
  KEY `fk_movimento_faixa_2` (`id_graduacao`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- Extraindo dados da tabela `movimento_faixa`
--

INSERT INTO `movimento_faixa` (`id_movimento_faixa`, `id_graduacao`, `id_modalidade`, `nome_movimento`, `sigla`) VALUES
(1, 1, 1, 'POOM-SE – Movimento de faixa', 'PS'),
(2, 1, 1, 'TCHAGUI – Chutes', 'TG'),
(3, 1, 1, 'IRON – Teoria', 'IR'),
(4, 2, 1, 'POOM-SE – Movimento de faixa', 'PS'),
(5, 2, 1, 'TCHAGUI – Chutes', 'TG'),
(6, 2, 1, 'MATCHO KYORUGUI ', 'MK'),
(7, 2, 1, 'JAIU KYORUGUI – Combate', 'JK'),
(8, 2, 1, 'YUYON SUNG – Flexibilidade', 'YU'),
(9, 2, 1, 'IRON – Teoria', 'IR'),
(10, 3, 1, 'POOM-SE – Movimento de faixa', 'PS'),
(11, 3, 1, 'TCHAGUI – Chutes', 'TG'),
(12, 3, 1, 'MATCHO KYORUGUI – Luta combinada', 'Mk'),
(13, 3, 1, 'JAIU KYORUGUI – Combate', 'JK'),
(14, 3, 1, 'YUYON SUNG – Flexibilidade', 'YU'),
(15, 3, 1, 'IRON – Teoria', 'IR'),
(16, 4, 1, 'POOM-SE – Movimento de faixa	', 'PS'),
(17, 4, 1, 'TCHAGUI – Chutes', 'TG'),
(18, 4, 1, 'MATCHO KYORUGUI – Luta combinada', 'MK'),
(19, 4, 1, 'JAIU KYORUGUI – Combate', 'JK'),
(20, 4, 1, 'YUYON SUNG – Flexibilidade', 'YU'),
(21, 4, 1, 'IRON – Teoria', 'IR'),
(22, 5, 1, 'POOM-SE – Movimento de faixa	', 'PS'),
(23, 5, 1, 'TCHAGUI – Chutes', 'TG'),
(24, 5, 1, 'MATCHO KYORUGUI – Luta combinada', 'MK'),
(25, 5, 1, 'JAIU KYORUGUI – Combate', 'JK'),
(26, 5, 1, 'YUYON SUNG – Flexibilidade', 'YU'),
(27, 5, 1, 'IRON – Teoria', 'IR'),
(28, 6, 1, 'POOM-SE – Movimento de faixa', 'PS'),
(29, 6, 1, 'POOM-SE EXTRA – Movimento das faixas anterior', 'PE'),
(30, 6, 1, 'TCHAGUI – Chutes', 'TG'),
(31, 6, 1, 'MATCHO KYORUGUI – Luta combinada', 'MK'),
(32, 6, 1, 'STEP KYORUGUI – Combate de step', 'SK'),
(33, 6, 1, 'JAIU KYORUGUI – Combate', 'JK'),
(34, 6, 1, 'KYOK PA – Quebramento', 'KP'),
(35, 6, 1, 'YUYON SUNG – Flexibilidade', 'YU'),
(36, 6, 1, 'IRON – Teoria', 'IR'),
(37, 7, 1, 'POOM-SE – Movimento de faixa', 'PS'),
(38, 7, 1, 'POOM-SE EXTRA – Movimento das faixas anterior', 'PE'),
(39, 7, 1, 'TCHAGUI – Chutes', 'TG'),
(40, 7, 1, 'MATCHO KYORUGUI – Luta combinada', 'MK'),
(41, 7, 1, 'STEP KYORUGUI – Combate de step', 'SK'),
(42, 7, 1, 'JAIU KYORUGUI – Combate', 'JK'),
(43, 7, 1, 'JAIU KYORUGUI EXTRA – Combate extra', 'KE'),
(44, 7, 1, 'KYOK PA – Quebramento', 'KP'),
(45, 7, 1, 'YUYON SUNG – Flexibilidade', 'YU'),
(46, 7, 1, 'IRON – Teoria', 'IR'),
(47, 8, 1, 'POOM-SE – Movimento de faixa', 'PS'),
(48, 8, 1, 'POOM-SE EXTRA – Movimento das faixas anterior', 'PE'),
(49, 8, 1, 'TCHAGUI – Chutes', 'TG'),
(50, 8, 1, 'MATCHO KYORUGUI – Luta combinada', 'MK'),
(51, 8, 1, 'STEP KYORUGUI – Combate de step', 'SK'),
(52, 8, 1, 'JAIU KYORUGUI – Combate', 'JK'),
(53, 8, 1, 'JAIU KYORUGUI EXTRA – Combate extra', 'KE'),
(54, 8, 1, 'KYOK PA – Quebramento', 'KP'),
(55, 8, 1, 'YUYON SUNG – Flexibilidade', 'YU'),
(56, 8, 1, 'IRON – Teoria', 'IR'),
(57, 9, 1, 'POOM-SE – Movimento de faixa', 'PS'),
(58, 9, 1, 'POOM-SE EXTRA – Movimento das faixas anterior', 'PE'),
(59, 9, 1, 'TCHAGUI – Chutes', 'TG'),
(60, 9, 1, 'MATCHO KYORUGUI – Luta combinada', 'MK'),
(61, 9, 1, 'STEP KYORUGUI – Combate de step', 'SK'),
(62, 9, 1, 'JAIU KYORUGUI – Combate', 'JK'),
(63, 9, 1, 'JAIU KYORUGUI EXTRA – Combate extra', 'KE'),
(64, 9, 1, 'KYOK PA – Quebramento', 'KP'),
(65, 9, 1, 'YUYON SUNG – Flexibilidade', 'YU'),
(66, 9, 1, 'IRON – Teoria', 'IR'),
(72, 10, 1, 'POOM-SE', 'PO'),
(73, 10, 1, 'POOM-SE EXTRA (I e II) – 2 Movimentos das fai', 'POEX'),
(74, 10, 1, 'TCHAGUI (I a VI) – Chutes', 'TC(I'),
(75, 10, 1, 'KIBON DONGJAC – Movimentos básicos de ataque ', 'KIDO'),
(76, 10, 1, 'MATCHO KYORUGUI (I e II) – Luta combinada', 'MAKY'),
(77, 10, 1, 'HOSIN KYORUGUI – Defesa pessoal contra pegada', 'HOKY'),
(78, 10, 1, 'STEP KYORUGUI – Combate de step', 'STKY'),
(79, 10, 1, 'JAIU KYORUGUI – Combate', 'JAKY'),
(80, 10, 1, 'JAIU KYORUGUI EXTRA – Combate extra', 'JAKY'),
(81, 10, 1, 'KYOK PA – Quebramento', 'KYPA'),
(82, 10, 1, 'YUYON SUNG – Flexibilidade', 'YUSU'),
(83, 10, 1, 'IRON – Teoria', 'IR');

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
-- Estrutura da tabela `pedido_faixa`
--

CREATE TABLE IF NOT EXISTS `pedido_faixa` (
  `id_pedido_faixa` int(11) NOT NULL AUTO_INCREMENT,
  `id_evento` int(11) NOT NULL,
  `id_graduacao` int(11) NOT NULL,
  `tamanho` varchar(45) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pedido_faixa`),
  UNIQUE KEY `index4` (`id_evento`,`id_graduacao`,`tamanho`,`quantidade`),
  KEY `fk_pedido_faixa_1` (`id_graduacao`),
  KEY `fk_pedido_faixa_2` (`id_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `horario` int(11) DEFAULT NULL COMMENT 'Campo horario...\n1 para manhã / 2 para Tarde / 3 para Noite',
  PRIMARY KEY (`id_pre_avaliacao`),
  KEY `fk_pre_avaliacao_1` (`id_evento`),
  KEY `fk_pre_avaliacao_2` (`id_federado`),
  KEY `fk_pre_avaliacao_3` (`id_status_avaliacao`),
  KEY `fk_pre_avaliacao_4` (`id_filial`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=82 ;

--
-- Extraindo dados da tabela `pre_avaliacao`
--

INSERT INTO `pre_avaliacao` (`id_pre_avaliacao`, `id_evento`, `id_federado`, `id_status_avaliacao`, `data_agendamento`, `id_filial`, `horario`) VALUES
(72, 19, 6, 1, '2013-05-13', 1, 1),
(73, 19, 7, 1, '2013-05-13', 1, 1),
(74, 19, 8, 1, '2013-05-13', 1, 1),
(75, 19, 9, 1, '2013-05-13', 1, 1),
(76, 19, 11, 1, '2013-05-13', 1, 1),
(77, 20, 6, 1, '2013-06-26', 1, 1),
(78, 20, 7, 1, '2013-06-26', 1, 1),
(79, 20, 8, 1, '2013-06-26', 1, 1),
(80, 20, 9, 1, '2013-06-26', 1, 1),
(81, 20, 11, 1, '2013-06-26', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `prontuario`
--

CREATE TABLE IF NOT EXISTS `prontuario` (
  `id_prontuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_federado` int(11) DEFAULT NULL,
  `id_evento` int(11) DEFAULT NULL,
  `ordem` int(11) DEFAULT NULL,
  `id_movimento_faixa` int(11) DEFAULT NULL,
  `nota` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_prontuario`),
  UNIQUE KEY `validar_nota` (`id_evento`,`id_movimento_faixa`,`id_federado`),
  KEY `fk_prontuario_1` (`id_movimento_faixa`),
  KEY `fk_prontuario_3` (`id_evento`),
  KEY `fk_prontuario_4` (`id_federado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=383 ;

--
-- Extraindo dados da tabela `prontuario`
--

INSERT INTO `prontuario` (`id_prontuario`, `id_federado`, `id_evento`, `ordem`, `id_movimento_faixa`, `nota`) VALUES
(317, 11, 19, NULL, 4, '9.9'),
(318, 11, 19, NULL, 5, '9.9'),
(319, 11, 19, NULL, 6, '9.9'),
(320, 11, 19, NULL, 7, '9.9'),
(321, 11, 19, NULL, 8, '9.9'),
(322, 11, 19, NULL, 9, '9.9'),
(323, 8, 19, NULL, 4, '9.9'),
(324, 8, 19, NULL, 5, '9.9'),
(325, 8, 19, NULL, 6, '9.9'),
(326, 8, 19, NULL, 7, '9.9'),
(327, 8, 19, NULL, 8, '9.9'),
(328, 8, 19, NULL, 9, '9.9'),
(329, 9, 19, NULL, 4, '8'),
(330, 9, 19, NULL, 5, '8'),
(331, 9, 19, NULL, 6, '8'),
(332, 9, 19, NULL, 7, '8'),
(333, 9, 19, NULL, 8, '8'),
(334, 9, 19, NULL, 9, '8'),
(335, 6, 19, NULL, 4, '8'),
(336, 6, 19, NULL, 5, '8'),
(337, 6, 19, NULL, 6, '8'),
(338, 6, 19, NULL, 7, '8'),
(339, 6, 19, NULL, 8, '8'),
(340, 6, 19, NULL, 9, '8'),
(341, 7, 19, NULL, 4, '8'),
(342, 7, 19, NULL, 5, '8'),
(343, 7, 19, NULL, 6, '8'),
(344, 7, 19, NULL, 7, '8'),
(345, 7, 19, NULL, 8, '8'),
(347, 7, 19, NULL, 9, '8'),
(353, 6, 20, NULL, 10, '9.9'),
(354, 6, 20, NULL, 11, '9.9'),
(355, 6, 20, NULL, 12, '9.9'),
(356, 6, 20, NULL, 13, '9.9'),
(357, 6, 20, NULL, 14, '9.9'),
(358, 6, 20, NULL, 15, '9.9'),
(359, 9, 20, NULL, 10, '9.9'),
(360, 9, 20, NULL, 11, '9.9'),
(361, 9, 20, NULL, 12, '9.9'),
(362, 9, 20, NULL, 13, '9.9'),
(363, 9, 20, NULL, 14, '9.9'),
(364, 9, 20, NULL, 15, '9.9'),
(365, 11, 20, NULL, 16, '8'),
(366, 11, 20, NULL, 17, '8'),
(367, 11, 20, NULL, 18, '8'),
(368, 11, 20, NULL, 19, '8'),
(369, 11, 20, NULL, 20, '8'),
(370, 11, 20, NULL, 21, '8'),
(371, 7, 20, NULL, 16, '8'),
(372, 7, 20, NULL, 17, '8'),
(373, 7, 20, NULL, 18, '8'),
(374, 7, 20, NULL, 19, '8'),
(375, 7, 20, NULL, 20, '8'),
(376, 7, 20, NULL, 21, '8'),
(377, 8, 20, NULL, 16, '8'),
(378, 8, 20, NULL, 17, '8'),
(379, 8, 20, NULL, 18, '8'),
(380, 8, 20, NULL, 19, '8'),
(381, 8, 20, NULL, 20, '8'),
(382, 8, 20, NULL, 21, '8');

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
(2, 'Reprovado'),
(3, 'Agendado'),
(4, 'Aguardando Agendamento');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
(1, 'Federado'),
(2, 'Filial'),
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
  ADD CONSTRAINT `FK_federado_graduacao` FOREIGN KEY (`id_federado`) REFERENCES `federado` (`id_federado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `graduacao_participantes`
--
ALTER TABLE `graduacao_participantes`
  ADD CONSTRAINT `FK_graduacao` FOREIGN KEY (`id_evento`) REFERENCES `evento_graduacao` (`id_evento`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_graduacao_participantes_1` FOREIGN KEY (`id_graduacao`) REFERENCES `graduacao` (`id_graduacao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
-- Restrições para a tabela `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `FK_login_federado` FOREIGN KEY (`id_federado`) REFERENCES `federado` (`id_federado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `FK_matricula_federado` FOREIGN KEY (`id_federado`) REFERENCES `federado` (`id_federado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_matricula_filial` FOREIGN KEY (`id_filial`) REFERENCES `filial` (`id_filial`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_matricula_modalidade` FOREIGN KEY (`id_modalidade`) REFERENCES `modalidade` (`id_modalidade`) ON UPDATE CASCADE;

--
-- Restrições para a tabela `modalidade`
--
ALTER TABLE `modalidade`
  ADD CONSTRAINT `FK_coordenador_modalidade` FOREIGN KEY (`id_coordenador`) REFERENCES `coordenador` (`id_coordenador`) ON UPDATE CASCADE;

--
-- Restrições para a tabela `movimento_faixa`
--
ALTER TABLE `movimento_faixa`
  ADD CONSTRAINT `fk_movimento_faixa_1` FOREIGN KEY (`id_modalidade`) REFERENCES `modalidade` (`id_modalidade`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_movimento_faixa_2` FOREIGN KEY (`id_graduacao`) REFERENCES `graduacao` (`id_graduacao`) ON UPDATE NO ACTION;

--
-- Restrições para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `FK_pedido_coordenador_responsavel` FOREIGN KEY (`id_responsavel`) REFERENCES `coordenador` (`id_coordenador`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_pedido_fornecedor` FOREIGN KEY (`fornecedor`) REFERENCES `fornecedor` (`id_fornecedor`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_pedido_status_pedido` FOREIGN KEY (`status`) REFERENCES `status_pedido` (`id`) ON UPDATE CASCADE;

--
-- Restrições para a tabela `pedido_faixa`
--
ALTER TABLE `pedido_faixa`
  ADD CONSTRAINT `fk_pedido_faixa_1` FOREIGN KEY (`id_graduacao`) REFERENCES `graduacao` (`id_graduacao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedido_faixa_2` FOREIGN KEY (`id_evento`) REFERENCES `evento_graduacao` (`id_evento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `pre_avaliacao`
--
ALTER TABLE `pre_avaliacao`
  ADD CONSTRAINT `fk_pre_avaliacao_1` FOREIGN KEY (`id_evento`) REFERENCES `evento_graduacao` (`id_evento`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pre_avaliacao_2` FOREIGN KEY (`id_federado`) REFERENCES `federado` (`id_federado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pre_avaliacao_3` FOREIGN KEY (`id_status_avaliacao`) REFERENCES `status_avaliacao` (`id_status_avaliacao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pre_avaliacao_4` FOREIGN KEY (`id_filial`) REFERENCES `filial` (`id_filial`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `prontuario`
--
ALTER TABLE `prontuario`
  ADD CONSTRAINT `fk_prontuario_1` FOREIGN KEY (`id_movimento_faixa`) REFERENCES `movimento_faixa` (`id_movimento_faixa`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prontuario_3` FOREIGN KEY (`id_evento`) REFERENCES `evento_graduacao` (`id_evento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prontuario_4` FOREIGN KEY (`id_federado`) REFERENCES `federado` (`id_federado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
