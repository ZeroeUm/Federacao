-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 25/03/2013 às 15:01:00
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
  `id_certificado` int(11) NOT NULL AUTO_INCREMENT,
  `id_evento` int(8) NOT NULL,
  `id_federado` int(11) NOT NULL,
  `data_emissao` date NOT NULL,
  `id_tipo_certificado` int(5) NOT NULL,
  PRIMARY KEY (`id_certificado`),
  KEY `FK_tipo_certificado` (`id_tipo_certificado`),
  KEY `FK_certificado_federado` (`id_federado`),
  KEY `FK_evento_graduacao` (`id_evento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `certificado`
--

INSERT INTO `certificado` (`id_certificado`, `id_evento`, `id_federado`, `data_emissao`, `id_tipo_certificado`) VALUES
(1, 20000105, 6, '2000-12-15', 1),
(2, 20010101, 6, '2001-03-20', 2),
(3, 20010103, 6, '2001-09-20', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `coordenador`
--

CREATE TABLE IF NOT EXISTS `coordenador` (
  `id_coordenador` int(11) NOT NULL AUTO_INCREMENT,
  `id_federado` int(11) NOT NULL,
  PRIMARY KEY (`id_coordenador`),
  KEY `FK_coordenador_federado` (`id_federado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `coordenador`
--

INSERT INTO `coordenador` (`id_coordenador`, `id_federado`) VALUES
(1, 2),
(2, 14),
(3, 15),
(4, 16),
(5, 17),
(6, 18);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa_rede`
--

CREATE TABLE IF NOT EXISTS `empresa_rede` (
  `id_empresa_rede` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `endereco` longtext,
  `site` varchar(45) DEFAULT NULL,
  `area` varchar(45) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `status_ativacao` int(11) DEFAULT '1',
  `identificacao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_empresa_rede`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE IF NOT EXISTS `endereco` (
  `id_endereco` int(12) NOT NULL AUTO_INCREMENT,
  `logradouro` varchar(80) COLLATE latin1_spanish_ci NOT NULL,
  `numero` int(5) NOT NULL,
  `complemento` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `bairro` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `cidade` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `uf` int(2) NOT NULL,
  `tipo_endereco` int(3) DEFAULT '1',
  PRIMARY KEY (`id_endereco`),
  KEY `FK_endereco_tipo_endereco` (`tipo_endereco`),
  KEY `FK_endereco_uf` (`uf`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=35 ;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id_endereco`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `tipo_endereco`) VALUES
(1, 'Rua Inexistente', 12, 'ap. 23', 'Imaginação', 'Nula', 26, 1),
(2, 'Rua Imaginaria', 43, 'bl. 3 ap. 12', 'Inexistente', 'Inexistente', 26, 1),
(3, 'Rua Ficticia', 45, '', 'Ficticio', 'Imaginária', 26, 1),
(4, 'Avenida da Não Existência', 312, 'fundos', 'Existência', 'Existente', 26, 1),
(5, 'Travessa dos Fundos', 2, NULL, 'Fundista', 'Nula', 26, 1),
(6, 'Praça dos Bobos', 34, 'bl. 1 ap. 43', 'Bobolândia', 'Nula', 26, 1),
(7, 'Praça da Força', 0, NULL, 'Existência', 'Existente', 26, 3),
(8, 'Avenida Existente', 12, 'sobreloja', 'Imaginação', 'Imaginária', 26, 3),
(9, 'Alameda Floradas', 900, NULL, 'Inexistente', 'Inexistente', 26, 3),
(10, 'Rua Principal', 1200, NULL, 'Ficticio', 'Imaginária', 26, 2),
(11, 'Avenida Primeira', 100, NULL, 'Bobolândia', 'Nula', 26, 2),
(12, 'Alameda dos Beija-flores', 300, NULL, 'Inexistente', 'Inexistente', 26, 2),
(13, 'Rua dos Bobos', 123, 'apartamento 44', 'Bobolandia', 'Inexistente', 26, 1),
(14, 'Alameda das Árvores', 23, NULL, 'Arboredo', 'Imaginária', 26, 1),
(15, 'Avenida Carolina Gonçalves', 222, 'quadra poliesportiva', 'Oculto', 'Inexistente', 26, 3),
(16, 'Avenida Carolina Gonçalves', 222, 'quadra poliesportiva', 'Oculto', 'Inexistente', 26, 3),
(17, 'Avenida Carolina Gonçalves', 222, 'quadra poliesportiva', 'Oculto', 'Inexistente', 26, 3),
(18, 'Avenida Carolina Gonçalves', 222, 'quadra poliesportiva', 'Oculto', 'Inexistente', 26, 3),
(19, 'Avenida Carolina Gonçalves', 222, 'quadra poliesportiva', 'Oculto', 'Inexistente', 26, 3),
(20, 'Rua Tomé de Lara', 161, 'Casa2', 'Tucuruvi', 'São Paulo', 26, NULL),
(21, 'Rua Tomé de Lara', 161, 'Casa2', 'Tucuruvi', 'São Paulo', 26, NULL),
(22, 'Rua Tomé de Lara', 161, 'Casa2', 'Tucuruvi', 'São Paulo', 26, NULL),
(23, 'Rua Tomé de Lara', 161, 'Casa2', 'Tucuruvi', 'São Paulo', 26, NULL),
(24, 'Rua Tomé de Lara', 161, 'Casa2', 'Tucuruvi', 'São Paulo', 26, NULL),
(25, 'Rua Tomé de Lara', 161, 'Casa2', 'Tucuruvi', 'São Paulo', 26, NULL),
(26, 'Rua Tomé de Lara', 161, 'Casa2', 'Tucuruvi', 'São Paulo', 26, NULL),
(27, 'Rua Tomé de Lara', 161, 'Casa2', 'Tucuruvi', 'São Paulo', 26, NULL),
(28, 'asdasd', 0, 'dasdad', 'asdas', 'asdasd', 26, NULL),
(29, 'Av Paulista 352', 457, '', 'Jaçana', 'Campo Limpo', 26, NULL),
(30, 'Av Paulista 352', 457, '', 'Jaçana', 'Campo Limpo', 26, 1),
(31, 'Av Paulista 352', 457, '', 'Jaçana', 'Campo Limpo', 26, 1),
(32, 'Av Paulista 352', 457, '', 'Jaçana', 'Campo Limpo', 26, 1),
(33, 'Rua Tomé de Lara', 161, 'Casa2', 'Tucuruvi', 'São Paulo', 26, 1),
(34, 'Rua dos eventos ', 161, '', 'jaçana', 'São Paulo', 26, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `escolaridade`
--

CREATE TABLE IF NOT EXISTS `escolaridade` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `escolaridade`
--

INSERT INTO `escolaridade` (`id`, `descricao`) VALUES
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
-- Estrutura da tabela `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `id_estados` int(2) NOT NULL,
  `sigla` varchar(2) COLLATE latin1_spanish_ci DEFAULT NULL,
  `nome` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_estados`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Extraindo dados da tabela `estados`
--

INSERT INTO `estados` (`id_estados`, `sigla`, `nome`) VALUES
(1, 'AC', 'Acre'),
(2, 'AL', 'Alagoas'),
(3, 'AM', 'Amazonas'),
(4, 'AP', 'Amapá'),
(5, 'BA', 'Bahia'),
(6, 'CE', 'Ceará'),
(7, 'DF', 'Distrito Federal'),
(8, 'ES', 'Espírito Santo'),
(9, 'GO', 'Goiás'),
(10, 'MA', 'Maranhão'),
(11, 'MG', 'Minas Gerais'),
(12, 'MS', 'Mato Grosso do Sul'),
(13, 'MT', 'Mato Grosso'),
(14, 'PA', 'Pará'),
(15, 'PB', 'Paraíba'),
(16, 'PE', 'Pernambuco'),
(17, 'PI', 'Piauí'),
(18, 'PR', 'Paraná'),
(19, 'RJ', 'Rio de Janeiro'),
(20, 'RN', 'Rio Grande do Norte'),
(21, 'RO', 'Rondônia'),
(22, 'RR', 'Roraima'),
(23, 'RS', 'Rio Grande do Sul'),
(24, 'SC', 'Santa Catarina'),
(25, 'SE', 'Sergipe'),
(26, 'SP', 'São Paulo'),
(27, 'TO', 'Tocantins');

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
  `descricao` longtext COLLATE latin1_spanish_ci,
  PRIMARY KEY (`id_evento`),
  KEY `FK_evento_graduacao_endereco` (`id_endereco`),
  KEY `FK_evento_graduacao_modalidade` (`id_modalidade`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Extraindo dados da tabela `evento_graduacao`
--

INSERT INTO `evento_graduacao` (`id_evento`, `numero_evento`, `data_evento`, `id_endereco`, `id_modalidade`, `descricao`) VALUES
(20000105, 5, '2000-12-15', 11, 1, NULL),
(20010101, 1, '2001-03-20', 10, 1, NULL),
(20010103, 3, '2001-09-20', 12, 1, NULL),
(20020101, 1, '2002-03-30', 10, 1, NULL),
(20080105, 5, '2008-12-02', 12, 1, NULL),
(20090102, 2, '2009-06-20', 12, 1, NULL),
(20090105, 5, '2009-12-01', 10, 1, NULL),
(20100102, 2, '2010-06-20', 12, 1, NULL),
(20100103, 3, '2010-09-20', 10, 1, NULL),
(20100105, 5, '2010-12-06', 10, 1, NULL),
(20110101, 1, '2011-03-22', 10, 1, NULL),
(20110102, 2, '2011-06-20', 12, 1, NULL),
(20110103, 3, '2011-09-22', 10, 1, NULL),
(20110105, 5, '2011-12-15', 10, 1, NULL),
(20120101, 1, '2012-03-20', 10, 1, NULL),
(20120102, 2, '2012-06-29', 11, 1, NULL),
(20120103, 3, '2012-09-22', 10, 1, NULL),
(20120104, 4, '2012-06-29', 11, 1, NULL),
(20120105, 5, '2012-12-12', 12, 1, NULL),
(2147483647, 1, '2013-03-31', 34, 1, '<p>Evento de gradua&ccedil;&atilde;o de faixa branca para azul</p>');

-- --------------------------------------------------------

--
-- Estrutura da tabela `faixas`
--

CREATE TABLE IF NOT EXISTS `faixas` (
  `id_faixa` int(1) NOT NULL AUTO_INCREMENT,
  `descricao` text NOT NULL,
  `id_modalidade` int(11) NOT NULL,
  PRIMARY KEY (`id_faixa`),
  KEY `fk_faixas_1` (`id_modalidade`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `faixas`
--

INSERT INTO `faixas` (`id_faixa`, `descricao`, `id_modalidade`) VALUES
(1, 'Faixa Branca', 1),
(2, 'Faixa Azul', 1),
(3, 'Faixa Amarela', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `federado`
--

CREATE TABLE IF NOT EXISTS `federado` (
  `id_federado` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `filiacao_materna` varchar(60) COLLATE latin1_spanish_ci DEFAULT NULL,
  `filiacao_paterna` varchar(60) COLLATE latin1_spanish_ci DEFAULT NULL,
  `sexo` varchar(1) COLLATE latin1_spanish_ci NOT NULL COMMENT 'M/F',
  `data_nasc` date NOT NULL,
  `rg` varchar(12) COLLATE latin1_spanish_ci NOT NULL,
  `telefone` varchar(13) COLLATE latin1_spanish_ci NOT NULL,
  `celular` varchar(14) COLLATE latin1_spanish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `caminho_imagem` varchar(50) COLLATE latin1_spanish_ci NOT NULL DEFAULT 'sem foto',
  `id_escolaridade` int(1) NOT NULL,
  `id_status` int(1) NOT NULL DEFAULT '1',
  `id_endereco` int(12) NOT NULL,
  `id_nacionalidade` int(1) NOT NULL,
  `id_tipo_federado` int(1) NOT NULL,
  PRIMARY KEY (`id_federado`),
  KEY `FK_federado_endereco` (`id_endereco`),
  KEY `FK_federado_escolaridade` (`id_escolaridade`),
  KEY `FK_federado_nacionalidade` (`id_nacionalidade`),
  KEY `FK_federado_status_federado` (`id_status`),
  KEY `FK_federado_tipo_federado` (`id_tipo_federado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=19 ;

--
-- Extraindo dados da tabela `federado`
--

INSERT INTO `federado` (`id_federado`, `nome`, `filiacao_materna`, `filiacao_paterna`, `sexo`, `data_nasc`, `rg`, `telefone`, `celular`, `email`, `caminho_imagem`, `id_escolaridade`, `id_status`, `id_endereco`, `id_nacionalidade`, `id_tipo_federado`) VALUES
(1, 'Administrador Jr.', NULL, 'Administrador', 'M', '1987-02-20', '39.493.019-0', '(11)3930-9490', NULL, 'adm@gmail.com', 'sem foto', 5, 1, 1, 4, 4),
(2, 'Coordenadora', NULL, NULL, 'F', '1988-04-29', '49.019.193-1', '(11)2300-0122', NULL, 'coord@gmail.com', 'sem foto', 4, 1, 2, 3, 3),
(3, 'Instrutor 1', NULL, NULL, 'M', '1989-02-20', '39.019.392-1', '(11)3349-9239', '(11)92039-2932', 'instr1@gmail.com', 'sem foto', 6, 1, 5, 3, 2),
(4, 'Instrutora 2', NULL, NULL, 'F', '1990-12-22', '43.192.129-5', '(11)2019-9494', '(11)99029-0124', 'instr2@gmail.com', 'sem foto', 4, 1, 3, 17, 2),
(5, 'Instrutor 3', NULL, NULL, 'M', '1978-09-20', '42.092.940-4', '(11)4319-4912', '(11)99120-1249', 'instr3@yahoo.com.br', 'sem foto', 5, 1, 1, 2, 2),
(6, 'Aluna Uma', NULL, NULL, 'F', '1995-03-04', '69.523.920-5', '(11)2359-9235', '(11)90185-3592', 'alun1@hotmail.com', 'sem foto', 4, 1, 4, 1, 1),
(7, 'Aluno Dois', NULL, NULL, 'M', '2000-08-31', '49.129.124-4', '(11)2401-1401', '(11)99102-1924', 'alun2@terra.com', 'sem foto', 2, 1, 6, 4, 1),
(8, 'Aluno Três', NULL, NULL, 'M', '2004-01-01', '98.912.912-4', '(11)2001-1294', '(11)99120-1495', 'alun3@globo.com', 'sem foto', 1, 1, 4, 11, 1),
(9, 'Aluna Quatro', NULL, NULL, 'F', '1997-12-31', '59.129.120-1', '(11)2333-1292', '(11)91049-9194', 'alun4@ig.com.br', 'sem foto', 2, 1, 3, 1, 1),
(10, 'Aluna Cinco', NULL, NULL, 'F', '1999-10-20', '40.493.393-2', '(11)4930-3403', '(11)92300-9999', 'alun5@hotmail.com', 'tkd/Aluna_Cinco.jpg', 2, 0, 2, 2, 1),
(11, 'Aluno Seis', NULL, NULL, 'M', '2000-01-25', '49.923.239-3', '(11)4292-1249', '(11)94845-4049', 'alun6@pop.com', 'tkd/Aluno Seis.jpg', 1, 1, 4, 20, 1),
(12, 'Aluno Sete', 'Mãe cinco', 'Pai dois', 'M', '2003-05-16', '34.909.998-3', '(11)2344-0000', '(11)90000-1111', 'alun7@alun.com', 'sem foto', 1, 1, 13, 17, 1),
(13, 'Aluna Oito', 'Mãe Quatro', 'Pai Quatro', 'F', '1993-02-28', '29.102.029-2', '(11)2920-2020', '(11)99999-9999', 'alun8@globo.com', 'tkd/Aluna_Oito.jpg', 5, 1, 14, 3, 1),
(14, 'Coordenador Capoeira', NULL, NULL, 'M', '1960-02-11', '32.029.990-1', '(11)2939-0003', '(11)93000-2222', 'coordCap@cap.com', 'sem foto', 9, 1, 17, 1, 3),
(15, 'Coordenadora Judo', NULL, NULL, 'F', '1972-12-01', '38.293.202-2', '(11)3432-2392', '(11)92829-2492', 'coordJud@jud.com', 'sem foto', 10, 0, 16, 5, 3),
(16, 'Coordenador Hapkido', NULL, NULL, 'M', '1980-08-12', '56.023.020-1', '(11)2392-0020', '(11)90000-1234', 'coordHkd@hkd.com', 'sem foto', 8, 1, 17, 10, 3),
(17, 'Coordenadora Krav Magá', NULL, NULL, 'F', '1977-07-07', '39.001.140-9', '(11)3290-2049', '(11)94032-1093', 'coordKkm@kkm.com', 'sem foto', 9, 1, 14, 23, 3),
(18, 'Coordenador MMA', NULL, NULL, 'M', '1988-08-08', '41.491.419-1', '(11)2333-0000', '(11)99012-1249', 'coordMMA@mma.com', 'sem foto', 6, 0, 14, 20, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `filial`
--

CREATE TABLE IF NOT EXISTS `filial` (
  `id_filial` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `cnpj` varchar(19) COLLATE latin1_spanish_ci NOT NULL,
  `telefone` varchar(13) COLLATE latin1_spanish_ci DEFAULT NULL,
  `fax` varchar(13) COLLATE latin1_spanish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `representante` varchar(60) COLLATE latin1_spanish_ci DEFAULT NULL,
  `id_modalidade` int(2) NOT NULL,
  `id_instrutor` int(11) NOT NULL,
  `id_endereco` int(12) NOT NULL,
  PRIMARY KEY (`id_filial`),
  KEY `FK_filial_endereco` (`id_endereco`),
  KEY `FK_filial_modalidade` (`id_modalidade`),
  KEY `FK_filial_instrutor` (`id_instrutor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `filial`
--

INSERT INTO `filial` (`id_filial`, `nome`, `cnpj`, `telefone`, `fax`, `email`, `representante`, `id_modalidade`, `id_instrutor`, `id_endereco`) VALUES
(1, 'Ativa''s Fitness', '43.012.020/9230-20', '(11)3319-1234', '(11)3319-1234', 'ativa@ativa.com', 'Representante 1', 1, 2, 8),
(2, 'Eye of Tiger', '14.012.023/1202-21', '(11)4129-9123', '(11)4129-9123', 'eye@tiger.com', 'Representante 2', 1, 3, 7),
(3, 'Condominio Portal das Américas IV', '12.120.012/1293-11', '(11)2229-9121', '(11)2229-9121', 'portal_americas_IV@imobiliaria.com', 'Representante 3', 1, 1, 9),
(4, 'Escola Municipal da Cidade Inexistente', '84.192.010/1204-10', '(11)2411-4129', '(11)2411-4130', 'escola@gov.br', 'Representante 4', 1, 1, 10),
(5, 'Condominio Portal das Américas V', '12.120.013/1293-11', '(11)3012-0120', '(11)3012-0120', 'portal_americas_V@imobiliaria.com', 'Representante 5', 1, 1, 8),
(6, 'Fist Pump', '41.124.129/1249-11', '(11)4950-2323', '(11)4950-2325', 'fistpump@fistpump.com', 'Representante 6', 1, 2, 9),
(7, 'Centro Cultural da Cidade', '23.239.123/2922-29', '(11)5843-3933', '(11)5843-3934', 'cc@gov.br', 'Representante 7', 1, 3, 7),
(8, 'Condominio América II', '12.492.129/0010-12', '(11)3329-2020', '(11)3329-2121', 'cond.amer2@imobiliaria.com', 'Representante 8', 1, 4, 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE IF NOT EXISTS `fornecedor` (
  `id_fornecedor` int(3) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `telefone` varchar(13) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_fornecedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id_fornecedor`, `nome`, `telefone`, `email`) VALUES
(1, 'Jugui', '(11)2941-8841', 'atendimento@jugui.com.br'),
(2, 'Nike', '(11)2929-2292', 'atendimento@nike.com'),
(3, 'Adidas', '(11)3939-2022', 'atendimento@adidas.com'),
(4, 'Reebok', '(11)3990-9000', 'atendimento@rbk.com'),
(5, 'Torah', '(11)4920-0101', 'atendimento@torah.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `graduacao`
--

CREATE TABLE IF NOT EXISTS `graduacao` (
  `id_modalidade` int(2) NOT NULL,
  `grau` varchar(7) COLLATE latin1_spanish_ci NOT NULL,
  `ordem` int(2) NOT NULL,
  `faixa` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `curriculo` blob,
  PRIMARY KEY (`id_modalidade`,`grau`),
  KEY `FK_graduacao_modalidade` (`id_modalidade`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Extraindo dados da tabela `graduacao`
--

INSERT INTO `graduacao` (`id_modalidade`, `grau`, `ordem`, `faixa`, `curriculo`) VALUES
(1, '-------', 10, 'Candidato à preta', NULL),
(1, '10º Gub', 1, 'Branca', NULL),
(1, '1º Dan', 11, 'Preta 1º dan', NULL),
(1, '1º Gub', 9, 'Vermelha ponta preta', NULL),
(1, '2º Dan', 12, 'Preta 2º dan', NULL),
(1, '2º Gub ', 8, 'Vermelha', NULL),
(1, '3º Dan', 13, 'Preta 3º dan', NULL),
(1, '3º Gub', 7, 'Azul ponta vermelha', NULL),
(1, '4º Dan', 14, 'Preta 4º dan', NULL),
(1, '4º Gub', 6, 'Azul', NULL),
(1, '5º Dan', 15, 'Preta 5º dan', NULL),
(1, '5º Gub', 5, 'Verde ponta azul', NULL),
(1, '6º Dan', 16, 'Preta 6º dan', NULL),
(1, '6º Gub', 4, 'Verde', NULL),
(1, '7º Dan', 17, 'Preta 7º dan', NULL),
(1, '7º Gub', 3, 'Amarela ponta verde', NULL),
(1, '8º Gub', 2, 'Amarela', NULL),
(3, '10º Gub', 1, 'Branca', NULL),
(3, '1º Dan', 11, 'Preta 1º dan', NULL),
(3, '1º Gub', 10, 'Vermelha duas pontas pretas', NULL),
(3, '2º Dan', 12, 'Preta 2º dan', NULL),
(3, '2º Gub', 9, 'Vermelha uma ponta preta', NULL),
(3, '3º Dan', 13, 'Preta 3º dan', NULL),
(3, '3º Gub', 8, 'Vermelha', NULL),
(3, '4º Dan', 14, 'Preta 4º dan', NULL),
(3, '4º Gub', 7, 'Azul ponta vermelha', NULL),
(3, '5º Gub', 6, 'Azul', NULL),
(3, '6º Gub', 5, 'Verde ponta azul', NULL),
(3, '7º Gub', 4, 'Verde', NULL),
(3, '8º Gub', 3, 'Amarela ponta verde', NULL),
(3, '9º Gub', 2, 'Amarela', NULL),
(4, '10º', 10, 'Amarelo e branco', NULL),
(4, '11º', 11, 'Azul e branco', NULL),
(4, '12º', 12, 'Branco', NULL),
(4, '1º', 1, 'Sem corda', NULL),
(4, '2º', 2, 'Verde', NULL),
(4, '3º', 3, 'Amarela', NULL),
(4, '4º', 4, 'Azul', NULL),
(4, '5º', 5, 'Verde e amarelo', NULL),
(4, '6º', 6, 'Verde e azul', NULL),
(4, '7º', 7, 'Amarelo e azul', NULL),
(4, '8º', 8, 'Verde, amarelo, azul e branco', NULL),
(4, '9º', 9, 'Verde e branco', NULL),
(5, '1º Dan', 7, 'Preta 1º dan', NULL),
(5, '1º Kyu', 1, 'Branca', NULL),
(5, '2º Dan', 8, 'Preta 2º dan', NULL),
(5, '2º Kyu', 2, 'Amarela', NULL),
(5, '3º Dan', 9, 'Preta 3º dan', NULL),
(5, '3º Kyu', 3, 'Laranja', NULL),
(5, '4º Dan', 10, 'Preta 4º dan', NULL),
(5, '4º Kyu', 4, 'Verde', NULL),
(5, '5º Dan', 11, 'Preta 5º dan', NULL),
(5, '5º Kyu', 5, 'Azul', NULL),
(5, '6º Dan', 12, 'Branca e vermelha 6º dan', NULL),
(5, '6º Kyu', 6, 'Marrom', NULL),
(5, '7º Dan', 13, 'Branca e vermelha 7º dan', NULL),
(5, '8º Dan', 14, 'Branca e vermelha 8º dan', NULL),
(5, '9º Dan', 15, 'Branca e vermelha 9º dan', NULL),
(6, '0º Kyu', 1, 'Branca', NULL),
(6, '10º Dan', 18, 'Vermelha 10º dan', NULL),
(6, '1º Dan', 9, 'Preta 1º dan', NULL),
(6, '1º Kyu', 8, 'Marrom', NULL),
(6, '2º Dan', 10, 'Preta 2º dan', NULL),
(6, '2º Kyu', 7, 'Roxa', NULL),
(6, '3º Dan', 11, 'Preta 3º dan', NULL),
(6, '3º Kyu', 6, 'Verde', NULL),
(6, '4º Dan', 12, 'Preta 4º dan', NULL),
(6, '4º Kyu', 5, 'Laranja', NULL),
(6, '5º Dan', 13, 'Preta 5º dan', NULL),
(6, '5º Kyu', 4, 'Amarela', NULL),
(6, '6º Dan', 14, 'Coral 6º dan', NULL),
(6, '6º Kyu', 3, 'Azul', NULL),
(6, '7º Dan', 15, 'Coral 7º dan', NULL),
(6, '7º Kyu', 2, 'Cinza', NULL),
(6, '8º Dan', 16, 'Coral 8º dan', NULL),
(6, '9º Dan', 17, 'Vermelha 9º dan', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `graduacao_federado`
--

CREATE TABLE IF NOT EXISTS `graduacao_federado` (
  `id_modalidade` int(2) NOT NULL,
  `grau` varchar(7) COLLATE latin1_spanish_ci NOT NULL,
  `id_federado` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `data_emissao` date NOT NULL,
  PRIMARY KEY (`id_modalidade`,`grau`,`id_federado`),
  KEY `FK_federado_graduacao` (`id_federado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Extraindo dados da tabela `graduacao_federado`
--

INSERT INTO `graduacao_federado` (`id_modalidade`, `grau`, `id_federado`, `status`, `data_emissao`) VALUES
(1, '-------', 6, 0, '2011-12-15'),
(1, '-------', 9, 1, '2012-09-22'),
(1, '10º Gub', 6, 0, '2000-12-15'),
(1, '10º Gub', 7, 0, '2011-12-15'),
(1, '10º Gub', 8, 1, '2012-12-12'),
(1, '10º Gub', 9, 0, '2008-12-02'),
(1, '10º Gub', 10, 0, '2010-12-06'),
(1, '10º Gub', 11, 0, '2011-03-22'),
(1, '1º Dan', 6, 1, '2012-06-29'),
(1, '1º Gub', 6, 0, '2011-09-22'),
(1, '1º Gub', 9, 0, '2012-03-20'),
(1, '2º Gub', 6, 0, '2011-06-20'),
(1, '2º Gub', 9, 0, '2011-09-22'),
(1, '3º Gub', 6, 0, '2011-03-22'),
(1, '3º Gub', 9, 0, '2011-03-22'),
(1, '3º Gub', 10, 1, '2012-12-12'),
(1, '4º Gub', 6, 0, '2010-09-20'),
(1, '4º Gub', 9, 0, '2010-12-06'),
(1, '4º Gub', 10, 0, '2012-09-22'),
(1, '4º Gub', 11, 1, '2012-12-12'),
(1, '5º Gub', 6, 0, '2010-06-20'),
(1, '5º Gub', 7, 1, '2012-12-12'),
(1, '5º Gub', 9, 0, '2010-06-20'),
(1, '5º Gub', 10, 0, '2011-12-15'),
(1, '5º Gub', 11, 0, '2012-06-29'),
(1, '6º Gub', 6, 0, '2002-03-30'),
(1, '6º Gub', 7, 0, '2012-09-22'),
(1, '6º Gub', 9, 0, '2009-12-01'),
(1, '6º Gub', 10, 0, '2011-09-22'),
(1, '6º Gub', 11, 0, '2011-12-15'),
(1, '7º Gub', 6, 0, '2001-09-20'),
(1, '7º Gub', 7, 0, '2012-06-29'),
(1, '7º Gub', 9, 0, '2009-06-20'),
(1, '7º Gub', 10, 0, '2011-06-20'),
(1, '7º Gub', 11, 0, '2011-09-22'),
(1, '8º Gub', 6, 0, '2001-03-20'),
(1, '8º Gub', 7, 0, '2012-03-20'),
(1, '8º Gub', 9, 0, '2009-03-12'),
(1, '8º Gub', 10, 0, '2011-03-22'),
(1, '8º Gub', 11, 0, '2011-06-20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `graduacao_participantes`
--

CREATE TABLE IF NOT EXISTS `graduacao_participantes` (
  `id_graduacao_participantes` int(11) NOT NULL AUTO_INCREMENT,
  `id_evento` int(8) DEFAULT NULL,
  `id_federado` int(11) DEFAULT NULL,
  `data_inscricao` date DEFAULT NULL,
  `matriculador` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_graduacao_participantes`),
  KEY `FK_participante` (`id_federado`),
  KEY `FK_graduacao` (`id_evento`),
  KEY `unico` (`id_federado`,`id_evento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `graduacao_participantes`
--

INSERT INTO `graduacao_participantes` (`id_graduacao_participantes`, `id_evento`, `id_federado`, `data_inscricao`, `matriculador`) VALUES
(1, 2147483647, 6, '2013-03-25', NULL),
(2, 2147483647, 7, '2013-03-25', NULL),
(3, 2147483647, 8, '2013-03-25', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `instrutor`
--

CREATE TABLE IF NOT EXISTS `instrutor` (
  `id_instrutor` int(11) NOT NULL AUTO_INCREMENT,
  `id_federado` int(11) NOT NULL,
  PRIMARY KEY (`id_instrutor`),
  KEY `FK_instrutor_federado` (`id_federado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `instrutor`
--

INSERT INTO `instrutor` (`id_instrutor`, `id_federado`) VALUES
(4, 2),
(1, 3),
(2, 4),
(3, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id_item` int(2) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `id_modalidade` int(2) NOT NULL,
  PRIMARY KEY (`id_item`),
  KEY `FK_item_modalidade` (`id_modalidade`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=89 ;

--
-- Extraindo dados da tabela `item`
--

INSERT INTO `item` (`id_item`, `descricao`, `id_modalidade`) VALUES
(1, 'Faixa Branca', 1),
(2, 'Faixa Branca Adulto', 1),
(3, 'Faixa Amarela', 1),
(4, 'Faixa Amarela Adulto', 1),
(5, 'Faixa Amarela Ponta Verde', 1),
(6, 'Faixa Amarela Ponta Verde Adulto', 1),
(7, 'Faixa Verde ', 1),
(8, 'Faixa Verde Adulto', 1),
(9, 'Faixa Verde ponta Azul', 1),
(10, 'Faixa Verde ponta Azul Adulto', 1),
(11, 'Faixa Azul', 1),
(12, 'Faixa Azul Adulto', 1),
(13, 'Faixa Azul ponta Vermelha', 1),
(14, 'Faixa Azul ponta Vermelha Adulto', 1),
(15, 'Faixa Vermelha', 1),
(16, 'Faixa Vermelha Adulto', 1),
(17, 'Faixa Vermelha ponta Preta', 1),
(18, 'Faixa Vermelha ponta Preta Adulto', 1),
(19, 'Faixa Candidato à Preta', 1),
(20, 'Faixa Candidato à Preta Adulto', 1),
(21, 'Faixa Preta 1º dan', 1),
(22, 'Faixa Preta 1º dan adulto', 1),
(23, 'Faixa Preta 1º dan personalizada', 1),
(24, 'Faixa Preta 1º dan adulto personalizada', 1),
(25, 'Faixa Preta 2º dan', 1),
(26, 'Faixa Preta 2º dan adulto', 1),
(27, 'Faixa Preta 2º dan personalizada', 1),
(28, 'Faixa Preta 2º dan adulto personalizada', 1),
(30, 'Faixa Branca', 3),
(31, 'Faixa Branca Adulto', 3),
(32, 'Faixa Amarela', 3),
(33, 'Faixa Amarela Adulto', 3),
(34, 'Faixa Amarela ponta Verde', 3),
(35, 'Faixa Amarela ponta Verde Adulto', 3),
(36, 'Faixa Verde', 3),
(37, 'Faixa Verde Adulto', 3),
(38, 'Faixa Verde ponta Azul', 3),
(39, 'Faixa Verde ponta Azul Adulto', 3),
(40, 'Faixa Azul', 3),
(41, 'Faixa Azul Adulto', 3),
(42, 'Faixa Azul ponta Vermelha', 3),
(43, 'Faixa Azul ponta Vermelha Adulto', 3),
(44, 'Faixa Vermelha', 3),
(45, 'Faixa Vermelha Adulto', 3),
(46, 'Faixa Vermelha uma ponta Preta', 3),
(47, 'Faixa Vermelha uma ponta Preta Adulto', 3),
(48, 'Faixa Vermelha duas pontas Pretas', 3),
(49, 'Faixa Vermelha duas pontas Pretas Adulto', 3),
(50, 'Faixa Preta 1º dan', 3),
(51, 'Faixa Preta 1º dan Adulto', 3),
(52, 'Faixa Preta 1º dan Personalizada', 3),
(53, 'Faixa Preta 1º dan Adulto Personalizada', 3),
(54, 'Faixa Preta 2º dan', 3),
(55, 'Faixa Preta 2º dan Adulto', 3),
(56, 'Faixa Preta 2º dan Personalizada', 3),
(57, 'Faixa Preta 2º dan Adulto Personalizada', 3),
(58, 'Corda Verde ', 4),
(59, 'Corda Verde Adulto', 4),
(60, 'Corda Amarela', 4),
(61, 'Corda Amarela Adulto', 4),
(62, 'Corda Azul', 4),
(63, 'Corda Azul Adulto', 4),
(64, 'Corda Verde e Amarela', 4),
(65, 'Corda Verde e Amarela Adulto', 4),
(66, 'Corda Verde e Azul Adulto', 4),
(67, 'Corda Amarela e Azul Adulto', 4),
(68, 'Corda Verde, Amarela, Azul e Branca', 4),
(69, 'Corda Verde e Branca', 4),
(70, 'Corda Amarela e Branca', 4),
(71, 'Corda Azul e Branca', 4),
(72, 'Corda Branca', 4),
(73, 'Faixa Branca', 5),
(74, 'Faixa Branca Adulto', 5),
(75, 'Faixa Amarela', 5),
(76, 'Faixa Amarela Adulto', 5),
(77, 'Faixa Laranja', 5),
(78, 'Faixa Laranja Adulto', 5),
(79, 'Faixa Verde', 5),
(80, 'Faixa Verde Adulto', 5),
(81, 'Faixa Azul', 5),
(82, 'Faixa Azul Adulto', 5),
(83, 'Faixa Marrom', 5),
(84, 'Faixa Marrom Adulto', 5),
(85, 'Faixa Preta 1º dan', 5),
(86, 'Faixa Preta 1º dan Adulto', 5),
(87, 'Faixa Preta 1º dan Personalizada', 5),
(88, 'Faixa Preta 1º dan Personalizada Adulto', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_pedido`
--

CREATE TABLE IF NOT EXISTS `itens_pedido` (
  `id_pedido` int(12) NOT NULL,
  `numero` int(3) NOT NULL,
  `id_item` int(2) NOT NULL,
  `tamanho` varchar(2) COLLATE latin1_spanish_ci NOT NULL,
  `quantidade` int(3) NOT NULL,
  PRIMARY KEY (`id_pedido`,`numero`),
  KEY `FK_itens_pedido` (`id_item`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Extraindo dados da tabela `itens_pedido`
--

INSERT INTO `itens_pedido` (`id_pedido`, `numero`, `id_item`, `tamanho`, `quantidade`) VALUES
(1, 1, 1, 'M', 1),
(2, 1, 3, 'M', 1),
(3, 1, 5, 'M', 1),
(4, 1, 7, 'M', 1),
(5, 1, 7, 'M', 1),
(6, 1, 9, 'G', 1),
(7, 1, 11, 'G', 1),
(8, 1, 13, 'G', 1),
(10, 1, 15, 'G', 1),
(22, 1, 1, 'M', 1),
(22, 2, 9, 'G', 1),
(22, 3, 11, 'M', 1),
(22, 4, 13, 'G', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id_login` int(11) NOT NULL,
  `login` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `senha` varchar(32) COLLATE latin1_spanish_ci NOT NULL,
  `id_federado` int(11) NOT NULL,
  PRIMARY KEY (`id_login`),
  KEY `FK_login_federado` (`id_federado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id_login`, `login`, `senha`, `id_federado`) VALUES
(0, 'felipe@hotmail.com', '1234', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mala-direta`
--

CREATE TABLE IF NOT EXISTS `mala-direta` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `mensagem` mediumtext COLLATE latin1_spanish_ci NOT NULL COMMENT 'campo para armazenar a mensagem de mala-direta aos aniversariantes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `mala-direta`
--

INSERT INTO `mala-direta` (`id`, `mensagem`) VALUES
(2, 'Teste para fazer uma inclus&atilde;o de mensagem de mala-direta via sistema.&lt;br&gt;Teste acentua&ccedil;&atilde;o&lt;br&gt;&aacute;&agrave;&acirc;&atilde;&auml;&eacute;&egrave;&ecirc;&euml;i&iacute;&iuml;&icirc;&oacute;&ograve;&ouml;&otilde;&ocirc;&uacute;&ugrave;&uuml;&lt;br&gt;&lt;br&gt;Teste para caracteres HTML&lt;br&gt;&lt;b&gt;Negrito&lt;/b&gt;&lt;br&gt;&lt;i&gt;It&aacute;lico&lt;/i&gt;&lt;br&gt;&lt;u&gt;Sublinhado&lt;/u&gt;&lt;br&gt;&lt;br&gt;Teste para alinhamento de texto&lt;br&gt;&lt;div align=&quot;left&quot;&gt;Alinhado &agrave; esquerda&lt;br&gt;&lt;div align=&quot;center&quot;&gt;Centralizado&lt;br&gt;&lt;div align=&quot;right&quot;&gt;Alinhado &agrave; direita&lt;br&gt;&lt;div align=&quot;justify&quot;&gt;Justificado&lt;br&gt;&lt;br&gt;Lista ordenada&lt;br&gt;&lt;ol&gt;&lt;li&gt;um&lt;/li&gt;&lt;li&gt;dois&lt;/li&gt;&lt;li&gt;tres&lt;/li&gt;&lt;li&gt;quatro&lt;/li&gt;&lt;/ol&gt;Lista n&atilde;o-ordenada&lt;br&gt;&lt;ul&gt;&lt;li&gt;um&lt;/li&gt;&lt;li&gt;dois&lt;/li&gt;&lt;li&gt;tres&lt;/li&gt;&lt;li&gt;quatro&lt;/li&gt;&lt;/ul&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Extraindo dados da tabela `matricula`
--

INSERT INTO `matricula` (`id_federado`, `id_modalidade`, `id_filial`, `data_matricula`, `matricula_filial`) VALUES
(6, 1, 1, '2000-09-12', '2000-09-12'),
(7, 1, 3, '2011-11-11', '2011-11-11'),
(8, 1, 3, '2012-09-11', '2012-09-11'),
(9, 1, 2, '2008-08-08', '2008-08-08'),
(10, 1, 3, '2010-10-10', '2010-10-10'),
(11, 1, 1, '2010-12-01', '2010-12-01'),
(12, 1, 6, '2010-09-21', '2010-09-21'),
(13, 1, 8, '2011-08-22', '2011-08-22');

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
-- Estrutura da tabela `meta`
--

CREATE TABLE IF NOT EXISTS `meta` (
  `id_meta` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(300) CHARACTER SET latin1 DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_final` date DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `valor` decimal(10,2) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `id` int(10) unsigned NOT NULL,
  `hash` varchar(45) DEFAULT NULL,
  `tipo` int(1) DEFAULT '1' COMMENT '1 para receita \n0 para cortar custos',
  PRIMARY KEY (`id_meta`),
  KEY `fk_meta_1` (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `modalidade`
--

CREATE TABLE IF NOT EXISTS `modalidade` (
  `id_modalidade` int(2) NOT NULL AUTO_INCREMENT,
  `nome` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `id_responsavel` int(11) NOT NULL,
  PRIMARY KEY (`id_modalidade`),
  KEY `FK_coordenador_modalidade` (`id_responsavel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `modalidade`
--

INSERT INTO `modalidade` (`id_modalidade`, `nome`, `id_responsavel`) VALUES
(1, 'Taekwondo', 1),
(2, 'MMA', 6),
(3, 'Hapkido', 4),
(4, 'Capoeira', 2),
(5, 'Krav Magá', 5),
(6, 'Judo', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentos_por_faixa`
--

CREATE TABLE IF NOT EXISTS `movimentos_por_faixa` (
  `id_movimentos_por_faixa` int(11) NOT NULL AUTO_INCREMENT,
  `id_faixa` int(11) DEFAULT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_movimentos_por_faixa`),
  KEY `fk_movimentos_por_faixa_1` (`id_faixa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `movimentos_por_faixa`
--

INSERT INTO `movimentos_por_faixa` (`id_movimentos_por_faixa`, `id_faixa`, `descricao`, `status`) VALUES
(1, 1, 'Chute', ''),
(2, 1, 'Soco', NULL),
(3, 1, 'Chute Frontal', NULL),
(4, 1, 'Defesa', NULL),
(5, 2, 'Hadukem', NULL),
(6, 2, 'Chute especial', NULL),
(7, 2, 'Defesa armada', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `nacionalidade`
--

CREATE TABLE IF NOT EXISTS `nacionalidade` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nacionalidade` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=34 ;

--
-- Extraindo dados da tabela `nacionalidade`
--

INSERT INTO `nacionalidade` (`id`, `nacionalidade`) VALUES
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
  `status` int(1) NOT NULL,
  `id_responsavel` int(11) NOT NULL,
  `fornecedor` int(3) NOT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `FK_pedido_fornecedor` (`fornecedor`),
  KEY `FK_pedido_coordenador_responsavel` (`id_responsavel`),
  KEY `FK_pedido_status_pedido` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=23 ;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `data_pedido`, `status`, `id_responsavel`, `fornecedor`) VALUES
(1, '2000-12-08', 3, 1, 5),
(2, '2001-03-17', 3, 1, 2),
(3, '2001-03-13', 3, 1, 2),
(4, '2001-09-13', 4, 1, 1),
(5, '2001-09-15', 3, 1, 4),
(6, '2002-03-23', 3, 1, 3),
(7, '2008-11-25', 3, 1, 1),
(8, '2009-03-05', 3, 1, 3),
(9, '2009-06-13', 3, 1, 2),
(10, '2009-11-24', 3, 1, 4),
(11, '2010-06-13', 4, 1, 2),
(12, '2010-06-15', 3, 1, 5),
(13, '2010-09-13', 3, 1, 5),
(14, '2011-03-15', 3, 1, 5),
(15, '2011-06-11', 3, 1, 2),
(16, '2011-09-15', 3, 1, 3),
(17, '2011-12-02', 3, 1, 1),
(18, '2012-03-13', 3, 1, 1),
(19, '2012-06-20', 3, 1, 1),
(20, '2012-09-12', 3, 1, 1),
(21, '2012-06-12', 3, 1, 4),
(22, '2012-12-01', 3, 1, 2);

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
-- Estrutura da tabela `prontuario`
--

CREATE TABLE IF NOT EXISTS `prontuario` (
  `id_prontuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_federado` int(11) DEFAULT NULL,
  `id_evento` int(8) DEFAULT NULL,
  `id_faixa` int(11) DEFAULT NULL,
  `id_movimentos_por_faixa` int(11) DEFAULT NULL,
  `nota` varchar(10) COLLATE latin1_spanish_ci DEFAULT NULL,
  `data` date DEFAULT NULL,
  `update` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_prontuario`),
  KEY `fk_prontuario_1` (`id_federado`),
  KEY `fk_prontuario_2` (`id_faixa`),
  KEY `fk_prontuario_3` (`id_movimentos_por_faixa`),
  KEY `fk_prontuario_4` (`id_evento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `prontuario`
--

INSERT INTO `prontuario` (`id_prontuario`, `id_federado`, `id_evento`, `id_faixa`, `id_movimentos_por_faixa`, `nota`, `data`, `update`) VALUES
(1, 6, 20000105, 1, 1, '9', '2013-03-25', '2013-03-25 14:26:41'),
(11, 6, 20000105, 1, 2, '7', '2013-03-25', '2013-03-25 14:26:42'),
(12, 6, 20000105, 1, 3, '10', '2013-03-25', '2013-03-25 14:26:42'),
(13, 6, 20000105, 1, 4, '8', '2013-03-25', '2013-03-25 14:26:42');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_federado`
--

CREATE TABLE IF NOT EXISTS `status_federado` (
  `id` int(1) NOT NULL,
  `status` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Extraindo dados da tabela `status_federado`
--

INSERT INTO `status_federado` (`id`, `status`) VALUES
(0, 'Inativo'),
(1, 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_pedido`
--

CREATE TABLE IF NOT EXISTS `status_pedido` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `status_pedido`
--

INSERT INTO `status_pedido` (`id`, `descricao`) VALUES
(1, 'Pendente'),
(2, 'Em aberto'),
(3, 'Finalizado'),
(4, 'Cancelado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_certificado`
--

CREATE TABLE IF NOT EXISTS `tipo_certificado` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=57 ;

--
-- Extraindo dados da tabela `tipo_certificado`
--

INSERT INTO `tipo_certificado` (`id`, `descricao`) VALUES
(1, 'Taekwondo Faixa Amarela'),
(2, 'Taekwondo Faixa Amarela ponta Verde'),
(3, 'Taekwondo Faixa Verde'),
(4, 'Taekwondo Faixa Verde ponta Azul'),
(5, 'Taekwondo Faixa Azul'),
(6, 'Taekwondo Faixa Azul ponta Vermelha'),
(7, 'Taekwondo Faixa Vermelha'),
(8, 'Taekwondo Faixa Vermelha ponta Preta'),
(9, 'Taekwondo Faixa Candidato à Preta'),
(10, 'Taekwondo Faixa Preta 1º Dan'),
(11, 'Taekwondo Faixa Preta 2º Dan'),
(12, 'Taekwondo Faixa Preta 3º Dan'),
(13, 'Taekwondo Faixa Preta 4º Dan'),
(15, 'Capoeira Corda Verde'),
(16, 'Capoeira Corda Amarela'),
(17, 'Capoeira Corda Azul'),
(18, 'Capoeira Corda Verde e Amarelo'),
(19, 'Capoeira Corda Verde e Azul'),
(20, 'Capoeira Corda Amarelo e Azul'),
(21, 'Capoeira Corda Verde, Amarelo e Azul'),
(22, 'Capoeira Corda Verde e Branco'),
(23, 'Capoeira Corda Amarelo e Branco'),
(24, 'Capoeira Corda Azul e Branco'),
(25, 'Capoeira Corda Branco'),
(26, 'Hapkido Faixa Amarela'),
(27, 'Hapkido Faixa Amarela ponta Verde'),
(28, 'Hapkido Faixa Verde'),
(29, 'Hapkido Faixa Verde ponta Azul'),
(30, 'Hapkido Faixa Azul'),
(31, 'Hapkido Faixa Azul ponta Vermelha'),
(32, 'Hapkido Faixa Vermelha'),
(33, 'Hapkido Faixa Vermelha uma ponta preta'),
(34, 'Hapkido Faixa Vemelha duas pontas pretas'),
(35, 'Judô Faixa Cinza'),
(36, 'Judô Faixa Azul'),
(37, 'Judô Faixa Amarela'),
(38, 'Judô Faixa Laranja'),
(39, 'Judô Faixa Verde'),
(40, 'Judô Faixa Roxa'),
(41, 'Judô Faixa Marrom'),
(42, 'Judô Faixa Preta 1º Dan'),
(43, 'Judô Faixa Preta 2º Dan'),
(44, 'Judô Faixa Preta 3º Dan'),
(45, 'Judô Faixa Preta 4º Dan'),
(46, 'Judô Faixa Preta 5º Dan'),
(47, 'Krav Magá Faixa Amarela'),
(48, 'Krav Magá Faixa Laranja'),
(49, 'Krav Magá Faixa Verde'),
(50, 'Krav Magá Faixa Azul'),
(51, 'Krav Magá Faixa Marrom'),
(52, 'Krav Magá Faixa Preta 1º Dan'),
(53, 'Krav Magá Faixa Preta 2º Dan'),
(54, 'Krav Magá Faixa Preta 3º Dan'),
(55, 'Krav Magá Faixa Preta 4º Dan'),
(56, 'Krav Magá Faixa Preta 5º Dan');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_endereco`
--

CREATE TABLE IF NOT EXISTS `tipo_endereco` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tipo_endereco`
--

INSERT INTO `tipo_endereco` (`id`, `descricao`) VALUES
(1, 'Residencial'),
(2, 'Evento'),
(3, 'Filial');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_federado`
--

CREATE TABLE IF NOT EXISTS `tipo_federado` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `tipo_federado`
--

INSERT INTO `tipo_federado` (`id`, `tipo`) VALUES
(1, 'Aluno'),
(2, 'Instrutor'),
(3, 'Coordenador'),
(4, 'Administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `uf`
--

CREATE TABLE IF NOT EXISTS `uf` (
  `uf` int(11) NOT NULL,
  `sigla` varchar(2) DEFAULT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`uf`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `uf`
--

INSERT INTO `uf` (`uf`, `sigla`, `descricao`) VALUES
(26, 'SP', 'São Paulo'),
(25, 'RJ', 'Rio de Janeiro');

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
-- Restrições para a tabela `faixas`
--
ALTER TABLE `faixas`
  ADD CONSTRAINT `fk_faixas_1` FOREIGN KEY (`id_modalidade`) REFERENCES `modalidade` (`id_modalidade`) ON DELETE CASCADE ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `FK_federado_graduacao` FOREIGN KEY (`id_federado`) REFERENCES `federado` (`id_federado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_graduacao_federado` FOREIGN KEY (`id_modalidade`, `grau`) REFERENCES `graduacao` (`id_modalidade`, `grau`) ON UPDATE CASCADE;

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
  ADD CONSTRAINT `FK_coordenador_modalidade` FOREIGN KEY (`id_responsavel`) REFERENCES `coordenador` (`id_coordenador`) ON UPDATE CASCADE;

--
-- Restrições para a tabela `movimentos_por_faixa`
--
ALTER TABLE `movimentos_por_faixa`
  ADD CONSTRAINT `fk_movimentos_por_faixa_1` FOREIGN KEY (`id_faixa`) REFERENCES `faixas` (`id_faixa`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Restrições para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `FK_pedido_coordenador_responsavel` FOREIGN KEY (`id_responsavel`) REFERENCES `coordenador` (`id_coordenador`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_pedido_fornecedor` FOREIGN KEY (`fornecedor`) REFERENCES `fornecedor` (`id_fornecedor`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_pedido_status_pedido` FOREIGN KEY (`status`) REFERENCES `status_pedido` (`id`) ON UPDATE CASCADE;

--
-- Restrições para a tabela `prontuario`
--
ALTER TABLE `prontuario`
  ADD CONSTRAINT `fk_prontuario_4` FOREIGN KEY (`id_evento`) REFERENCES `evento_graduacao` (`id_evento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prontuario_1` FOREIGN KEY (`id_federado`) REFERENCES `federado` (`id_federado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prontuario_2` FOREIGN KEY (`id_faixa`) REFERENCES `faixas` (`id_faixa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prontuario_3` FOREIGN KEY (`id_movimentos_por_faixa`) REFERENCES `movimentos_por_faixa` (`id_movimentos_por_faixa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
