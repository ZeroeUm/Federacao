-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 29/05/2013 às 19:29:46
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `coordenador`
--

INSERT INTO `coordenador` (`id_coordenador`, `id_federado`) VALUES
(1, 1),
(4, 66);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=110 ;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id_endereco`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `tipo_endereco`) VALUES
(1, 'Rua do Administrador', 150, 'Complemento', 'Bela Vista', 'São Paulo', 1, 1),
(95, 'Não declarado', 1, NULL, 'Não declarado', 'São Paulo', 1, 1),
(96, 'Teste de endereco', 140, NULL, 'Desonhecido', 'Desconhecida', 1, 1),
(97, 'Endereco da coordenador', 154, NULL, 'Penha', 'são paulo', 1, 1),
(98, 'Endereco da coordenador', 154, NULL, 'Penha', 'são paulo', 1, 1),
(99, 'Endereco da coordenador', 154, NULL, 'Penha', 'são paulo', 1, 1),
(100, 'Endereco da coordenador', 154, NULL, 'Penha', 'são paulo', 1, 1),
(101, 'Endereco da coordenador', 154, NULL, 'Penha', 'são paulo', 1, 1),
(102, 'Endereco da coordenador', 154, NULL, 'Penha', 'são paulo', 1, 1),
(103, 'Rua do aluno', 123, NULL, 'Penha', 'São Paulo', 1, 1),
(104, 'Endereco da filiaal', 154, '1', 'Penha', 'São paulo', 1, 1),
(105, 'Rua do aluno', 123, '1', 'Penha', 'são paulo', 1, 1),
(106, 'Rua da academia', 150, NULL, 'Bela Vista', 'São Paulo', 1, 3),
(107, 'Teste de endereço', 123, NULL, 'Penha', 'São Paulo', 1, 1),
(108, 'Endereco da filiaal 1', 154, 'Complemento', 'Centro', 'São Paulo', 1, 1),
(109, 'Rua dos eventos ', 123, 'Casa2', 'jaçana', 'São Paulo', 1, 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `evento_graduacao`
--

INSERT INTO `evento_graduacao` (`id_evento`, `numero_evento`, `data_evento`, `id_endereco`, `id_modalidade`, `descricao`) VALUES
(1, '06-2013', '2013-06-30', 109, 1, 'Evento de graduação agendado para esse dia   \n        ');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=68 ;

--
-- Extraindo dados da tabela `federado`
--

INSERT INTO `federado` (`id_federado`, `nome`, `filiacao_materna`, `filiacao_paterna`, `sexo`, `data_nasc`, `rg`, `telefone`, `celular`, `email`, `caminho_imagem`, `id_escolaridade`, `id_status`, `id_endereco`, `id_nacionalidade`, `id_tipo_federado`, `tamanho_faixa`) VALUES
(1, 'Carlos Mariano', 'Não Declarada', 'Não declarada', 'M', '1980-04-05', '52.444.111-1', '(11)1111-2222', '(11)99999-9999', 'felipe@chipsetdesenvolvimento.com', 'tkd/1369861822.jpg', 6, 1, 1, 1, 4, 'G'),
(65, 'Obi Wan Kenobi', 'não conhecida', 'não conhecida', 'M', '1960-05-08', '55.555.555-5', '(11)1111-1111', '(99)99999-9999', 'mail@dworker.com.br', 'sem foto', 3, 1, 105, 1, 2, 'G'),
(66, 'Yoda', 'não conhecida', 'não conhecida', 'M', '1969-12-31', '11.111.111-1', '(33)3333-3333', '(33)99999-9999', 'contato@dworker.com.br', 'tkd/1369860976.jpg', 4, 1, 107, 1, 3, 'P'),
(67, 'Anakin skywalker', 'Shmi Skywalker', 'Midichlorians', 'M', '1985-05-30', '33.333.333-3', '(11)1111-1111', '(99)99999-9999', 'felipe@chipsetdesenvolvimento.com', 'tkd/1369865174.jpg', 4, 1, 108, 1, 1, 'M');

-- --------------------------------------------------------

--
-- Estrutura da tabela `filial`
--

CREATE TABLE IF NOT EXISTS `filial` (
  `id_filial` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `cnpj` varchar(19) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `telefone` varchar(15) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `fax` varchar(15) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
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
(1, 'Federacao Paulista', '000.000.000/0000-00', '(11)1111-1111', '(22)2222-2222', 'contato@dworker.com.br', 'Federação', 1, 1, 1),
(2, 'Academia Galax', '111.111.111/1111-11', '(22)2222-2222', '(22)2222-2222', 'academia@dworker.com.br', 'Obi Wan Kinobi', 1, 3, 106);

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
  `curriculo` longtext COMMENT 'Curriculo da faixa na modalidade',
  PRIMARY KEY (`id_graduacao`),
  KEY `FK_graduacao_modalidade` (`id_modalidade`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Extraindo dados da tabela `graduacao`
--

INSERT INTO `graduacao` (`id_graduacao`, `id_modalidade`, `grau`, `ordem`, `faixa`, `curriculo`) VALUES
(1, 1, '10º GUB', 1, 'Faixa Branca', '<div class="titulo"><span>Faixa Branca para Amarela</span><a href="#" onclick="window.open(''fotos_pop.php?z=imagens/ilustrativas/fx_branca.jpg&amp;width=98&amp;height=77&amp;title=fx_branca.jpg'',''fotos_pop'',''width=98,height=77,directories=no,location=no,menubar=no,scrollbars=no,status=no,toolbar=no,resizable=no,left=0,top=0,screenx=50,screeny=50'');return false"></a> <br><br>A faixa branca é a primeira do taekwondo, nesta faixa o aluno terá sua introdução na modalidade ela representa a pureza e o início do aprendizado no taekwondo, o aluno terá o seu primeiro contato com a arte e com seus princípios básicos, tais como: disciplina, respeito, cortesia, dedicação, perseverança e autocontrole.<br><br>\n\n	Para que o aluno dê seqüência à próxima etapa, além de assimilar os princípios básicos acima ele deve aprender todo o conteúdo que segue abaixo e prestar o exame de graduação.<br><br>\n\n	O conteúdo desta faixa esta dividido em 3 partes:<br>\n\n1. POOM-SE - Movimento de faixa	<br>\n2. TCHAGUI - Chutes<br>\n3. IRON - Teoria<br>\n<br><br>\n1. POOM-SE<br>\nNome: SAJU DIRUGUI<br>\nSignificado: A palavra “Saju” significa quatro direções e “Dirugui” significa soco. Portanto socando em quatro direções. O primeiro soco do movimento deve ser aplicado com kihap (grito).<br>\nComposição: O Saju dirugui é composto por um ataque de soco no tronco e uma defesa baixa todos com a base apkubi (base de um passo penetrado para frente com o joelho da frente flexionado e a perna de trás esticada).<br>\n	Deverá ser aplicado tanto para o lado direito “orun” quanto para o lado esquerdo “uen” ou seja:<br>\nORUN SAJU DIRUGUI – Socando em quatro direções pelo lado direito.<br>\nUEN SAJU DIRUGUI – Socando em quatro direções pelo lado esquerdo.<br>\n	As crianças até 06 anos de idade poderão apresentar apenas o lado direito de acordo com o bom senso de avaliação do professor.\n<br><br>\n2. TCHAGUI – Chutes<br>\n	São cinco chutes nesta graduação que deverão ser executados da seguinte forma:<br>\nPreparo: O professor dará o seguinte comando “Tchagui, Jumbi”, e o aluno deverá recuar a perna direita com kihap (grito), aguardar a contagem do professor para chutar alternando as pernas, ou seja, na primeira contagem o chute será com a perna direita e na segunda com a esquerda e assim sucessivamente.<br>\n	Todos os chutes deverão ser executados com kihap e no mesmo lugar (parado), alternando as pernas, uma vez com a direita e outra com a esquerda.<br><br>\n<center><object width="480" height="360"><param name="movie" value="http://www.youtube-nocookie.com/v/RXdoC77O-EE?version=3&amp;hl=pt_BR&amp;rel=0"><param name="allowFullScreen" value="true"><param name="allowscriptaccess" value="always"><embed src="http://www.youtube-nocookie.com/v/RXdoC77O-EE?version=3&amp;hl=pt_BR&amp;rel=0" type="application/x-shockwave-flash" width="480" height="360" allowscriptaccess="always" allowfullscreen="true"></object></center>\n<br><br>\n1 - APTCHA OLIGUI<br>\nLevantamento frontal (levantar a perna estendida o máximo possível).<br>\n2 - AP TCHAGUI<br>\nChute frontal (levantar o joelho flexionado e estender a ponta do pé na altura do queixo).<br>\n3 - BACAT TCHAGUI<br>\nChute circular para fora (levantar a perna fazendo um circulo de dentro para fora).<br>\n4 - AN TCHAGUI<br>\nChute circular para dentro (levantar a perna fazendo um circulo de fora para dentro).<br>\n5 - AP DOLIO TCHAGUI:<br>\nChute com o peito do pé na cintura\nobs. É fundamental que gire o pé de base e a cintura<br><br>\n			\n3. IRON – Teoria<br>\n	A teoria como as demais partes do exame de graduação, tem o caráter reprovativo, porém ela não será aplicada pelo mestre e sim pelo professor responsável.<br>\n	A prova poderá ser escrita ou verbal, de acordo com o critério adotado pelo professor. A nota desta prova deverá ser somada com a nota de comportamento, participação e nível de aplicação do aluno com o conteúdo do exame, portanto a nota final da categoria “Iron” será a média de todas citadas, podendo ser acrescidas de mais algumas de acordo com o professor.<br><br>\n\n	O conteúdo teórico para esta faixa segue conforme abaixo:<br>\n\n1. Contagem:<br>\n	01 - Ranna<br>\n	02 - Dul<br>\n	03 - Sêt<br>\n	04 - Nêt<br>\n	05 - Dassôt<br>\n	06 - Iossôt<br>\n	07 - Ilgôp<br>\n	08 - Iodol<br>\n	09 - Arrôp<br>\n	10 - Iol<br>\n	11 - Iol ranna<br>\n	12 - Iol dul<br>\n	13 - Iol set<br>\n	14 - Iol net<br>\n	15 - Iol dasôt<br>\n	20 - Sumur<br>\n	30 - Sórun<br>\n	40 - Mahun<br>\n	50 - Shihun<br>\n	100 - Bek<br>\n<br>\n2. Cumprimentos\n	<br>À bandeira: Tchariot, kuki é deraio kiunhe, baro<br>\n	Ao grão-mestre: Tchariot, kwanjanim que kiunhe (7 a 9 dan)<br>\n	Ao mestre: Tchariot, sabunim que kiunhe (4 a 6 dan)<br>\n	Ao instrutor: Tchariot, kyosanim que kiunhe (1 a 3 dan)<br>\n	Ao assistente: Jokyo nim que kiunhê (2 à 1 Gub)<br>\n	Ao superior: Tchariot, kiunhe.<br><br>\n\n3. Juramento do taekwondo:<br>\n		EU PROMETO<br>\n	1- Observar as regras do taekwondo;<br>\n	2- Respeitar o instrutor e meus superiores;<br>\n	3- Nunca fazer mau uso do taekwondo;<br>\n	4- Ser campeão da liberdade e da justiça;<br>\n	5- Construir um mundo mais pacífico.<br>\n<br>\n4. Significado da palavra TAEKWONDO:<br>\nA palavra taekwondo significa literalmente o caminho dos pés e das mãos através da mente.\n<br><br>\n5. Espírito do taekwondo:<br>\n	- cortesia: Educação e Respeito;<br>\n	- integridade: Honestidade e Justiça;<br>\n	- perseverança: Nunca desistir de seus objetivos;<br>\n	- domínio sobre si mesmo: Lutar contra os desejos do corpo;<br>\n	- espírito indomável: Nunca se entregar perante o inimigo.<br>\n<br>\n6. Direções e altura:<br>\n	Orun – Lado direito;<br>\n	Uen – Lado esquerdo;<br>\n	Are – Parte baixa;<br>\n	Momtong – Altura tronco;<br>\n	Olgul – Altura rosto;<br>\n	Saju – Quatro direções;<br>\n	Ap – Frente;<br>\n	Dolio – Virando lateral;<br>\n	Iop – Lado;<br>\n	Bacat – Fora;<br>\n	An – Dentro;<br>\n	Pitrô – Diagonal para fora;<br>\n	Tui – Atrás.<br>\n<br>\n7. Vocabulário usado em aulas: <br>		\n	Tchariot – Sentido;<br>\n	Kiunhê – Cumprimentar;<br>\n	Jumbi – Preparar;<br>\n	Shijak – Começar;<br>\n	Guman – Terminar;<br>\n	Baro – Voltar;<br>\n	Andja – Sentar;<br>\n	Irossó – Levantar;<br>\n	Rethio – Abrir debandar;<br>\n	Schiô – Descansar, ficar à vontade;<br>\n	Bal bacuó – Trocar de perna;<br>\n	Duiró dora – Virar meia volta;<br>\n	Jua u hyang ú – Ficar frente a frente, ou de frente para o instrutor;<br>\n	U hyang ú – Virar para direita;<br>\n	Dojan – Academia, sala de treino;<br>\n	Dobok – Uniforme;<br>\n	Ti – Faixa;<br>\n	Ié – sim;<br>\n	Gamsa-ram-nida – Obrigado\n<br></div>'),
(2, 1, '8º GUB', 2, 'Faixa Amarela', '<div class="titulo"><span>Faixa Amarela para Ponta Verde</span><a href="#" onclick="window.open(''fotos_pop.php?z=imagens/ilustrativas/fx_amarela.jpg&amp;width=98&amp;height=77&amp;title=fx_amarela.jpg'',''fotos_pop'',''width=98,height=77,directories=no,location=no,menubar=no,scrollbars=no,status=no,toolbar=no,resizable=no,left=0,top=0,screenx=50,screeny=50'');return false"></a> A faixa amarela é a segunda do taekwondo, para que o aluno dê seqüência à próxima etapa, além de assimilar os conteúdos desta faixa para prestar o exame de graduação, deverá saber o conteúdo da faixa anterior. <br><br>\nEsta e a próxima faixa representam o início da adaptação do aluno no taekwondo, é simbolizado pela terra, onde a planta brota e finca sua raiz, é o começo de seu desenvolvimento técnico e tático, assim como de uma gama de princípios que irão ser adquiridos. <br><br>\n	\nOs conteúdos desta faixa estão divididos em 6 partes: <br><br>\n1. POOM-SE – Movimento de faixa	<br>\n2. TCHAGUI – Chutes<br>\n3. MATCHO KYORUGUI – Luta combinada<br>\n4. JAIU KYORUGUI – Combate<br>\n5. YUYON SUNG – Flexibilidade<br>\n6. IRON – Teoria<br><br>\n\n1. POOM-SE<br>\nNome: TEGUK IL JANG<br>\nSignificado: O Teguk il jang representa o símbolo do "keon", um dos 8 Kwaes (sinais divinos), que significa o "positivo e o negativo". Como o "keon" simboliza o começo da criação de todas as coisas no universo. A palavra “il” significa 1º (primeiro), portanto a primeira parte de todos os movimentos. <br><br>\n\nComposição: Esse poom-se consiste nos movimentos básicos, como are-maki (defesa baixa), montong maki (defesa no meio), olgul maki (defesa alta), montong dirgui (soco no tronco), e ap tchagui (chute frontal). Os 20 movimentos devem ser executados em 18 contagens. <br><br>\nTempo: O tempo de duração deste poom-se deverá ser de 25 segundos. <br><br>\n\n	As crianças poderão apresentar este poom-se com contagem no dia do exame, de acordo com o bom senso do professor. <br><br>\n\n<center><object width="445" height="364"><param name="movie" value="http://www.youtube.com/v/jW-F9I3Gm9k&amp;hl=pt-br&amp;fs=1&amp;rel=0&amp;color1=0x5d1719&amp;color2=0xcd311b&amp;border=1"><param name="allowFullScreen" value="true"><param name="allowscriptaccess" value="always"><embed src="http://www.youtube.com/v/jW-F9I3Gm9k&amp;hl=pt-br&amp;fs=1&amp;rel=0&amp;color1=0x5d1719&amp;color2=0xcd311b&amp;border=1" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="445" height="364"></object></center>\n<br><br>\n2. TCHAGUI – Chutes<br>\n	São cinco chutes nesta graduação que deverão ser executados da seguinte forma: <br>\nPreparo: O professor dará o seguinte comando “Tchagui, Jumbi”, e o aluno deverá recuar a perna direita com kihap (grito), aguardar a contagem do professor para chutar alternando as pernas, ou seja, na primeira contagem o chute será com a perna direita e na segunda com a esquerda e assim sucessivamente. <br>\n	Todos os chutes deverão ser executados com kihap e no mesmo lugar (parado). <br><br>\n\n<center>\n<iframe width="480" height="360" src="http://www.youtube-nocookie.com/embed/29Sy9HCXAIA?rel=0" frameborder="0" allowfullscreen=""></iframe>\n</center>\n<br><br>\n1 - MIRÔ TCHAGUI<br>\nChute empurrando (levantar o joelho flexionado e empurrar o alvo com a sola ou com a ponta do pé). <br><br>\n2 - TIGÔ TCHAGUI<br>\nChute pisando (levantar o joelho flexionado e estender a perna aplicando uma pisada na altura do rosto). <br><br>\n3 - DOLIO TCHAGUI<br>\nChute diagonal na altura do rosto (levantar o joelho flexionado gire o pé de base e a cintura, estenda a perna acertando com peito do pé na altura do rosto). <br><br>\n4 - IOP TCHAGUI<br>\nChute de lado (levantar o joelho flexionado e girando o pé de base e a cintura, simultaneamente, estenda a perna acertando com a “faca” do pé no alvo). <br><br>\n5 - TUIT TCHAGUI<br>\nChute por trás (girar o corpo por trás e chutar “como um coice” a perna que soltará o golpe deverá passar rente ao outro joelho). <br><br>\n\n3. MATCHO KYORUGUI – Luta combinada<br>\n	Matcho kyorugui é uma luta combinada que será executada de maneira pré-arranjada utilizando as habilidades básicas do Taekwondo e técnicas adaptadas do poom-se. Matcho kyorugui ajuda o praticante a aumentar seu foco mental, controle de distância, senso de objetivo, tempo de reação e exatidão. <br>\n	Nesta graduação o matcho kyorugui exigido será Il-bo derion (luta combinada de um passo). <br>\n	O aluno deverá desenvolver técnicas utilizando apenas socos (técnica de mão fechada). <br><br>\n\n4. JAIU KYORUGUI – Combate<br>\n	Jaiu kyorugui é um combate livre que requer rigor absoluto em utilizar as regras de segurança e os golpes assimilados até o momento. <br>\nOs fatores mais importantes no Jaiu kyorugui são agilidade, poder, condicionamento, julgamento, coragem, estratégias táticas e técnicas. <br>\nNo exame de graduação o Jaiu Kyorugui deve ser semicontato (sombra). <br>\nCombate de 30 segundos a 01 minuto. <br><br>\n\n5. YUYON SUNG – Flexibilidade<br><br>\n\n6. IRON – Teoria<br><br>\n	\n1. Aplicação (finalização): <br>\n	Dirgui – Soco; <br>\n	Tchigui – Bater; <br>\n	Tchirgui – Perfurar; <br>\n	Tchagui – Chute<br>\n	Maki – Defesa; <br>\n	Oligui – Levantar. <br><br>\n\n2. Base do pé: <br>\n	Narani: As pernas separadas de lado na largura do ombro. <br>	\nJutchumso: Base agachada, as pernas separadas de lado, 2x a largura do ombro. <br>\n	Apsogui: Base de um passo normal para frente<br>\n	Apkubi: Base de um passo penetrado para frente com o joelho da frente 	flexionado e a perna de trás esticada<br><br>\n	\n3. Regras de competição: <br> 										a) Quais são os pontos ganhos numa competição? <br>		 		\nChute no tronco, chute no rosto e soco no tronco. <br>\n	b) Protetores obrigatórios em competição: <br>								Cabeça, bucal, tórax, antibraço, genital e canela. <br>\n	\nNo caso de empate depois de finalizado o 3º round, o quarto round de dois minutos se levará a cabo como round de morte súbita, depois de um minuto de descanso do 3º round. <br>\n	d) Tamanho da área oficial de combate: 	<br>							A área é de 8 x 8m., e terá uma superfície lisa e sem obstáculos. <br><br>\n\n4. Contagem numérica: <br>\n	1º - Il<br>\n	2º - I	<br>\n	3º - Sam<br>\n	4º - Sa<br>\n	5º - Ô<br>\n	6º - Iuk<br>\n	7º - Tchil<br>		\n	8º - Pal<br>\n	9º - Gu<br>\n	10º – Ship<br>\n</div>'),
(3, 1, '7º GUB', 3, 'Faixa Ponta Amarela Verde', '<div class="titulo"><span>Faixa Amarela ponta Verde para Verde</span><a href="#" onclick="window.open(''fotos_pop.php?z=imagens/ilustrativas/fx_pontaverde.jpg&amp;width=98&amp;height=77&amp;title=fx_pontaverde.jpg'',''fotos_pop'',''width=98,height=77,directories=no,location=no,menubar=no,scrollbars=no,status=no,toolbar=no,resizable=no,left=0,top=0,screenx=50,screeny=50'');return false"></a> A faixa amarela ponta verde é a terceira do taekwondo, para que o aluno dê seqüência à próxima etapa, além de assimilar os conteúdos desta faixa para prestar o exame de graduação, deverá saber o conteúdo das faixas anteriores. <br>\n<br>\nOs conteúdos desta faixa estão divididos em 6 partes: <br>\n<br>\n1. POOM-SE – Movimento de faixa<br>\n2. TCHAGUI – Chutes<br>\n3. MATCHO KYORUGUI – Luta combinada<br>\n4. JAIU KYORUGUI – Combate<br>\n5. YUYON SUNG – Flexibilidade<br>\n6. IRON – Teoria<br><br>\n\n1. POOM-SE<br>\nNome: TEGUK I JANG<br>\nSignificado: Teguk I Jang simboliza o "Tae", um dos 8 sinais divinos, que significa a firmeza e a suavidade externa. <br><br>\nComposição: Esse poom-se consiste nos movimentos básicos apresentados na graduação anterior com ênfase nas ações do ap tchagui que aparecem mais freqüentemente neste poom-se. Os 23 movimentos devem ser executados em 18 contagens. <br><br>\nTempo: O tempo de duração deste poom-se deverá ser de 30 segundos. <br><br>\n\n	As crianças poderão apresentar este poom-se com contagem no dia do exame, de acordo com o bom senso do professor. <br>\n\n<br>\n<center><object width="445" height="364"><param name="movie" value="http://www.youtube.com/v/lhJNlqHfmB0&amp;hl=pt-br&amp;fs=1&amp;rel=0&amp;color1=0x5d1719&amp;color2=0xcd311b&amp;border=1"><param name="allowFullScreen" value="true"><param name="allowscriptaccess" value="always"><embed src="http://www.youtube.com/v/lhJNlqHfmB0&amp;hl=pt-br&amp;fs=1&amp;rel=0&amp;color1=0x5d1719&amp;color2=0xcd311b&amp;border=1" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="445" height="364"></object></center>\n<br><br>\n\n2. TCHAGUI – Chutes<br>\n	São cinco chutes nesta graduação que deverão ser executados da seguinte forma: <br>\nPreparo: O professor dará o seguinte comando “Tchagui, Jumbi”, e o aluno deverá recuar a perna direita com kihap (grito), aguardar a contagem do professor para chutar alternando as pernas, ou seja, na primeira contagem o chute será com a perna direita e na segunda com a esquerda e assim sucessivamente. <br><br>\n	Todos os chutes deverão ser executados com kihap e no mesmo lugar (parado). <br><br>\n<center>\n<iframe width="480" height="360" src="http://www.youtube-nocookie.com/embed/1Ty2FgLPyxY?rel=0" frameborder="0" allowfullscreen=""></iframe>\n</center>\n<br><br>\n1 - TIMIO AP BAL AP DOLIO TCHAGUI<br>\nChute saltando, acerta o peito do pé da frente na altura da cintura. <br><br>\n2 - TIMIO TUIT TCHAGUI<br>\nChute saltando por trás (dar um salto girando o corpo por trás e chutar “como um coice” a perna que soltará o golpe deverá passar rente ao outro joelho). <br><br>\n3 - RURIO TCHAGUI<br>\nGancho - Gira o corpo pela frente e acerta o calcanhar na altura do rosto puxando como se fosse um gancho. <br><br>\n4 - AP BAL RURIO TCHAGUI<br>\nMesmo chute anterior agora com o pé da frente<br><br>\n5 - MONDOLIO RURIO TCHAGUI<br>\nChute girando por trás e puxando um gancho na altura do rosto. <br><br>\n\n3. MATCHO KYORUGUI – Luta combinada<br>\n	Nesta graduação o matcho kyorugui exigido será Il-bo derion (luta combinada de um passo). <br>\n	O aluno deverá desenvolver as habilidades utilizando apenas técnicas com a mão aberta. <br><br>\n\n4. JAIU KYORUGUI – Combate<br>\n	Combate de 30 segundos a 01 minuto. <br><br>\n5. YUYON SUNG – Flexibilidade<br><br>\n\n6. IRON – Teoria<br>\n\n 1. Base do pé: <br>\n	- Tuit kubi: Base em "L", o pé da frente apontado para frente e o pé de trás 	apontado para o lado. <br>\n	- Moa sogui: Base com os pés juntos. <br>\n	- Bum sogui: Base leopardo, o pé da frente com o calcanhar levantado e os dois 	joelhos flexionados. <br>\n	- Tchariot  sogui: Base em posição de sentido com a ponta dos pés 22.5 graus 	separados. <br>\n	- Pyoni sogui: As pernas separadas de lado na largura do ombro com a ponta dos 	pés separados 22.5 graus. <br><br>\n\n2. Regras de Competição<br>\n- As meias faltas (Kyong go - Advertência equivale a meio ponto perdido) <br>\n1.	Segurar o adversário; <br>\n2.	Empurrar o adversário; <br>\n3.	Agarrar o adversário; <br>\n4.	Sair da quadra (10m x 10m); <br>\n5.	Virar as costas; <br>\n6.	Cair propositalmente; <br>\n7.	Aplicar joelhada; <br>\n8.	Ataque na região genital; <br>\n9.	Chute na coxa; <br>\n10.	Soco no rosto; <br>\n11.	Comemorar após golpe; <br>\n12.	Mau comportamento; <br>\n13.	Fingimento. <br>\n<br>\n- As faltas inteiras (Kam jom - Advertência equivale a um ponto negativo) <br>\n1.	Atacar adversário caído; <br>\n2.	Atacar região das costas; <br>\n3.	Mau comportamento; <br>\n4.	Soco no rosto; <br>\n5.	Dar cabeçada; <br>\n6.	Derrubar o adversário; <br>\n7.	Sair da área de competição; e<br>\n8.	Atacar o adversário após a separação, sem autorização de prosseguir. <br><br>\n\n- Pontuação<br>\nOs pontos válidos se dividem como se segue: <br>\n	1 ponto ganho: - sôco no tronco e chute no tronco. <br>\n	2 pontos ganhos: - chute com giro<br>\n	3 pontos ganhos:	- chute no rosto<br><br>\n	\n- Partes proibidas ao ataque: <br>\n	A região do órgão genital e abaixo dele<br>\n	Toda parte posterior da cabeça<br>\nQualquer parte do corpo que for atingida pelo joelho ou cotovelo<br>\n</div>'),
(4, 1, '6º GUB', 4, 'Faixa Verde', '<div class="titulo"><span>Faixa Amarela ponta Verde para Verde</span><a href="#" onclick="window.open(''fotos_pop.php?z=imagens/ilustrativas/fx_pontaverde.jpg&amp;width=98&amp;height=77&amp;title=fx_pontaverde.jpg'',''fotos_pop'',''width=98,height=77,directories=no,location=no,menubar=no,scrollbars=no,status=no,toolbar=no,resizable=no,left=0,top=0,screenx=50,screeny=50'');return false"></a> A faixa amarela ponta verde é a terceira do taekwondo, para que o aluno dê seqüência à próxima etapa, além de assimilar os conteúdos desta faixa para prestar o exame de graduação, deverá saber o conteúdo das faixas anteriores. <br>\n<br>\nOs conteúdos desta faixa estão divididos em 6 partes: <br>\n<br>\n1. POOM-SE – Movimento de faixa<br>\n2. TCHAGUI – Chutes<br>\n3. MATCHO KYORUGUI – Luta combinada<br>\n4. JAIU KYORUGUI – Combate<br>\n5. YUYON SUNG – Flexibilidade<br>\n6. IRON – Teoria<br><br>\n\n1. POOM-SE<br>\nNome: TEGUK I JANG<br>\nSignificado: Teguk I Jang simboliza o "Tae", um dos 8 sinais divinos, que significa a firmeza e a suavidade externa. <br><br>\nComposição: Esse poom-se consiste nos movimentos básicos apresentados na graduação anterior com ênfase nas ações do ap tchagui que aparecem mais freqüentemente neste poom-se. Os 23 movimentos devem ser executados em 18 contagens. <br><br>\nTempo: O tempo de duração deste poom-se deverá ser de 30 segundos. <br><br>\n\n	As crianças poderão apresentar este poom-se com contagem no dia do exame, de acordo com o bom senso do professor. <br>\n\n<br>\n<center><object width="445" height="364"><param name="movie" value="http://www.youtube.com/v/lhJNlqHfmB0&amp;hl=pt-br&amp;fs=1&amp;rel=0&amp;color1=0x5d1719&amp;color2=0xcd311b&amp;border=1"><param name="allowFullScreen" value="true"><param name="allowscriptaccess" value="always"><embed src="http://www.youtube.com/v/lhJNlqHfmB0&amp;hl=pt-br&amp;fs=1&amp;rel=0&amp;color1=0x5d1719&amp;color2=0xcd311b&amp;border=1" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="445" height="364"></object></center>\n<br><br>\n\n2. TCHAGUI – Chutes<br>\n	São cinco chutes nesta graduação que deverão ser executados da seguinte forma: <br>\nPreparo: O professor dará o seguinte comando “Tchagui, Jumbi”, e o aluno deverá recuar a perna direita com kihap (grito), aguardar a contagem do professor para chutar alternando as pernas, ou seja, na primeira contagem o chute será com a perna direita e na segunda com a esquerda e assim sucessivamente. <br><br>\n	Todos os chutes deverão ser executados com kihap e no mesmo lugar (parado). <br><br>\n<center>\n<iframe width="480" height="360" src="http://www.youtube-nocookie.com/embed/1Ty2FgLPyxY?rel=0" frameborder="0" allowfullscreen=""></iframe>\n</center>\n<br><br>\n1 - TIMIO AP BAL AP DOLIO TCHAGUI<br>\nChute saltando, acerta o peito do pé da frente na altura da cintura. <br><br>\n2 - TIMIO TUIT TCHAGUI<br>\nChute saltando por trás (dar um salto girando o corpo por trás e chutar “como um coice” a perna que soltará o golpe deverá passar rente ao outro joelho). <br><br>\n3 - RURIO TCHAGUI<br>\nGancho - Gira o corpo pela frente e acerta o calcanhar na altura do rosto puxando como se fosse um gancho. <br><br>\n4 - AP BAL RURIO TCHAGUI<br>\nMesmo chute anterior agora com o pé da frente<br><br>\n5 - MONDOLIO RURIO TCHAGUI<br>\nChute girando por trás e puxando um gancho na altura do rosto. <br><br>\n\n3. MATCHO KYORUGUI – Luta combinada<br>\n	Nesta graduação o matcho kyorugui exigido será Il-bo derion (luta combinada de um passo). <br>\n	O aluno deverá desenvolver as habilidades utilizando apenas técnicas com a mão aberta. <br><br>\n\n4. JAIU KYORUGUI – Combate<br>\n	Combate de 30 segundos a 01 minuto. <br><br>\n5. YUYON SUNG – Flexibilidade<br><br>\n\n6. IRON – Teoria<br>\n\n 1. Base do pé: <br>\n	- Tuit kubi: Base em "L", o pé da frente apontado para frente e o pé de trás 	apontado para o lado. <br>\n	- Moa sogui: Base com os pés juntos. <br>\n	- Bum sogui: Base leopardo, o pé da frente com o calcanhar levantado e os dois 	joelhos flexionados. <br>\n	- Tchariot  sogui: Base em posição de sentido com a ponta dos pés 22.5 graus 	separados. <br>\n	- Pyoni sogui: As pernas separadas de lado na largura do ombro com a ponta dos 	pés separados 22.5 graus. <br><br>\n\n2. Regras de Competição<br>\n- As meias faltas (Kyong go - Advertência equivale a meio ponto perdido) <br>\n1.	Segurar o adversário; <br>\n2.	Empurrar o adversário; <br>\n3.	Agarrar o adversário; <br>\n4.	Sair da quadra (10m x 10m); <br>\n5.	Virar as costas; <br>\n6.	Cair propositalmente; <br>\n7.	Aplicar joelhada; <br>\n8.	Ataque na região genital; <br>\n9.	Chute na coxa; <br>\n10.	Soco no rosto; <br>\n11.	Comemorar após golpe; <br>\n12.	Mau comportamento; <br>\n13.	Fingimento. <br>\n<br>\n- As faltas inteiras (Kam jom - Advertência equivale a um ponto negativo) <br>\n1.	Atacar adversário caído; <br>\n2.	Atacar região das costas; <br>\n3.	Mau comportamento; <br>\n4.	Soco no rosto; <br>\n5.	Dar cabeçada; <br>\n6.	Derrubar o adversário; <br>\n7.	Sair da área de competição; e<br>\n8.	Atacar o adversário após a separação, sem autorização de prosseguir. <br><br>\n\n- Pontuação<br>\nOs pontos válidos se dividem como se segue: <br>\n	1 ponto ganho: - sôco no tronco e chute no tronco. <br>\n	2 pontos ganhos: - chute com giro<br>\n	3 pontos ganhos:	- chute no rosto<br><br>\n	\n- Partes proibidas ao ataque: <br>\n	A região do órgão genital e abaixo dele<br>\n	Toda parte posterior da cabeça<br>\nQualquer parte do corpo que for atingida pelo joelho ou cotovelo<br>\n</div>'),
(5, 1, '5º GUB', 5, 'Faixa Ponta Verde Azul', '<div class="titulo"><span>Faixa Verde ponta Azul para Azul</span><a href="#" onclick="window.open(''fotos_pop.php?z=imagens/ilustrativas/fx_pontaazul.jpg&amp;width=98&amp;height=77&amp;title=fx_pontaazul.jpg'',''fotos_pop'',''width=98,height=77,directories=no,location=no,menubar=no,scrollbars=no,status=no,toolbar=no,resizable=no,left=0,top=0,screenx=50,screeny=50'');return false"></a> A faixa verde ponta azul é a quinta do taekwondo, para que o aluno dê seqüência à próxima etapa, além de assimilar os conteúdos desta faixa para prestar o exame de graduação, deverá saber o conteúdo das faixas anteriores. <br><br>\n \n	Os conteúdos desta faixa estão divididos em 6 partes: <br><br>\n\n1. POOM-SE – Movimento de faixa	<br>\n2. TCHAGUI – Chutes<br>\n3. MATCHO KYORUGUI – Luta combinada<br>\n4. JAIU KYORUGUI – Combate<br>\n5. YUYON SUNG – Flexibilidade<br>\n6. IRON – Teoria<br><br>\n\n1. POOM-SE<br>\nNome: TEGUK SA JANG<br>\nSignificado: Teguk Sa Jang simboliza o "Jin", um dos 8 sinais divinos, que representa o grande poder do trovão e da dignidade. <br><br>\nComposição: Esse poom-se consiste nos movimentos básicos apresentados nas graduações anteriores e novas ações como: sonnal montong maki, pyon son cut seo thirgui, jebi poom mok thigui, yop tchaqui, montong bacat maki  e dung jumok olgul ap thigui. Em vários movimentos usamos a base duit kub. Os 29 movimentos devem ser executados em 20 contagens. <br><br>\nTempo: O tempo de duração deste poom-se deverá ser de 30 segundos. <br><br>\n\n	As crianças poderão apresentar este poom-se com contagem no dia do exame, de acordo com o bom senso do professor. <br><br>\n<center><object width="445" height="364"><param name="movie" value="http://www.youtube.com/v/wekwYvlmN9U&amp;hl=pt-br&amp;fs=1&amp;rel=0&amp;color1=0x5d1719&amp;color2=0xcd311b&amp;border=1"><param name="allowFullScreen" value="true"><param name="allowscriptaccess" value="always"><embed src="http://www.youtube.com/v/wekwYvlmN9U&amp;hl=pt-br&amp;fs=1&amp;rel=0&amp;color1=0x5d1719&amp;color2=0xcd311b&amp;border=1" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="445" height="364"></object></center>\n<br><br>\n2. TCHAGUI – Chutes<br>\n	São dez chutes nesta graduação, sendo que os 4 primeiros são com a base “narani are retcho maki” e os outros 6  são com salto e na base “Kyonumse”  (base básica dos chutes, livre, a vontade), que deverão ser executados da seguinte forma: <br><br>\nPreparo: Do 1º ao 4º chute, o professor dará o seguinte comando “Narani are retcho maki – Jumbi” e o aluno deverá separar a perna esquerda e ao mesmo tempo cruzar os braços na frente do peito, descendo e executando duas defesas baixas simultaneamente com kihap. <br><br>\n	Do 5º ao 10º o professor dará o seguinte comando “Tchagui, Jumbi”, e o aluno deverá recuar a perna direita com kihap (grito). <br><br>\n	Todos os chutes deverão ser executados com kihap. <br><br>\n* Base narani are retcho maki<br><br>\n	1 - GODUP AP TCHAGUI<br>\n	Chutar dois ap tchagui com a mesma perna (chute frontal - levantar o joelho flexionado e estender a ponta do pé na altura do queixo 2x). <br><br>\n2 - AN, BACAT e RURIO TCHAGUI<br>\nChute para dentro, fora e gancho. <br><br>\n3 - AP, IOP, RURIO, DOLIO e TUIT TCHAGUI<br>\nChute frontal, chute de lado, chute diagonal na altura do rosto com o peito do pé e chute por trás “tipo coice” (direção - o primeiro será para frente, os outros três para o lado e o último para trás). <br><br>\n4 - GODUP IOP TCHAGUI<br>\nChutar dois iop tchagui - de lado (levantar o joelho flexionado lateralmente, estenda a perna acertando com a “faca” do pé no alvo). <br><br>\n* Kyonumse – Tchagui jumbi. <br><br>\n5 – TIMIO AP TCHAGUI<br>\nChute frontal com salto (dar um salto levantando o joelho flexionado e estender a ponta do pé na altura do queixo). <br><br>\n6 – TIMIO TIGÔ TCHAGUI<br>\nChute pisando com salto (dar um salto levantando o joelho flexionado e estender a perna aplicando uma pisada na altura do rosto). <br><br>\n7 - TIMIO AP BAL RURIO TCHAGUI<br>\nGancho com o pé da frente e com salto (dar um salto girando o corpo pela frente e acertar o calcanhar na altura do rosto puxando como se fosse um gancho). <br><br>\n8 - TIMIO IOP MIRÔ TCHAGUI<br>\nChute empurrando de lado e com salto (dar um salto levantando o joelho flexionado e girando a cintura, simultaneamente, estenda a perna acertando com a “faca” do pé no alvo). <br><br>\n9 – TIMIO DOLIO THAGUI<br>\nChute diagonal na altura do rosto e com salto (saltar levantantando o joelho flexionado girando a cintura, estenda a perna acertando com peito do pé na altura do rosto). <br><br>\n10 - TIMIO MONDOLIO RURIO TCHAGUI<br>\nChute girando por trás e puxando um gancho na altura do rosto e com salto. <br><br>\n\n\n3. MATCHO KYORUGUI – Luta combinada<br>\n	Nesta graduação o matcho kyorugui exigido será Il-bo derion (luta combinada de um passo). <br>\n	O aluno deverá desenvolver as habilidades utilizando técnicas com chutes. <br><br>\n\n4. JAIU KYORUGUI – Combate<br>\n	Combate de 30” a 1’ e 30”. <br><br>\n\n5. YUYON SUNG – Flexibilidade<br><br>\n\n6. IRON – Teoria<br><br>\n1. DIRGUI – Socar<br>\n	Momtong dirgui – soco no tronco<br>\n	Dolio dirgui – soco lateral<br>\n	Seuó dirgui – soco levantado<br>\n	Iop dirgui – soco de lado<br>\n	Nerio dirgui – soco de cima para baixo <br>\n	Jetchio dirgui – soco virando o punho na barriga<br><br>\n\n2. MAKI – Defesa		<br>									- 	Bacat maki – defesa para fora<br>\n	An maki – defesa para dentro<br>\n	Iop maki – defesa de lado<br>\n	Pitro 	maki – defesa diagonal<br>\n	Otgoro maki – defesa cruzando o pulso<br><br>\n\n3. TCHIGUI – Bater<br>\n	Ap tchigui – bater de frente<br>\n	An tchigui  - bater para dentro<br>\n	Bacat tchigui	 - bater para fora<br>\n	Iop tchigui – bater de lado<br>		\n	Nerio tchigui	- bater de cima pra baixo<br>\n</div>'),
(6, 1, '4º GUB', 6, 'Faixa Azul', '<div class="titulo"><span>Faixa Azul para Ponta Vermelha</span><a href="#" onclick="window.open(''fotos_pop.php?z=imagens/ilustrativas/fx_azul.jpg&amp;width=98&amp;height=77&amp;title=fx_azul.jpg'',''fotos_pop'',''width=98,height=77,directories=no,location=no,menubar=no,scrollbars=no,status=no,toolbar=no,resizable=no,left=0,top=0,screenx=50,screeny=50'');return false"></a> A faixa azul é a sexta do taekwondo, para que o aluno dê seqüência à próxima etapa, além de assimilar os conteúdos desta faixa para prestar o exame de graduação, deverá saber o conteúdo das faixas anteriores. <br><br>\nEsta e a próxima faixa representam o amadurecimento do aluno. Simbolizada pelo céu, para onde a planta se dirige; a liberdade de utilizar, com raciocínio e criatividade tudo o que foi aprendido. <br><br>\n\n	Os conteúdos desta faixa estão divididos em 9 partes: <br><br>\n\n1. POOM-SE – Movimento de faixa<br>\n2. POOM-SE EXTRA – Movimento das faixas anteriores	<br>\n3. TCHAGUI – Chutes<br>\n4. MATCHO KYORUGUI – Luta combinada<br>\n5. STEP KYORUGUI – Combate de step<br>\n6. JAIU KYORUGUI – Combate<br>\n7. KYOK PA – Quebramento<br>\n8. YUYON SUNG – Flexibilidade<br>\n9. IRON – Teoria<br><br>\n	\n1. POOM-SE<br>\nNome: TEGUK O JANG<br>\nSignificado: Teguk O Jang simboliza o "Son", um dos 8 sinais divinos, que representa o vento, significando tanto uma força potente quanto a tranqüilidade de acordo com sua força. <br><br>\nComposição: Esse poom-se consiste em alguns movimentos básicos apresentados nas graduações anteriores e em novas ações como: me jumok nerio tchigui, palkup dolio tchigui, iop tchamio iop dirugui e palkup pyo jok tchigui. Esse poom-se é caracterizado pelas sucessivas defesas de montong maki e are maki. Os 32 movimentos devem ser executados em 20 contagens. <br><br>\nTempo: O tempo de duração deste poom-se deverá ser de 30 segundos. <br>\n\n	As crianças poderão apresentar este poom-se com contagem no dia do exame, de acordo com o bom senso do professor. <br><br>\n\n<center><object width="445" height="364"><param name="movie" value="http://www.youtube.com/v/sALWDdxMjVo&amp;hl=pt-br&amp;fs=1&amp;rel=0&amp;color1=0x5d1719&amp;color2=0xcd311b&amp;border=1"><param name="allowFullScreen" value="true"><param name="allowscriptaccess" value="always"><embed src="http://www.youtube.com/v/sALWDdxMjVo&amp;hl=pt-br&amp;fs=1&amp;rel=0&amp;color1=0x5d1719&amp;color2=0xcd311b&amp;border=1" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="445" height="364"></object></center><br><br>\n\n2. POOM-SE EXTRA<br>\n	O aluno deverá executar um poom-se entre o teguk il jang e o teguk sa jang de acordo com a escolha do mestre examinador. <br><br>\n\n3. TCHAGUI – Chutes<br>\n	São dez chutes nesta graduação, sendo que os 8 primeiros são no lugar e os 2 últimos seqüenciais, que deverão ser executados da seguinte forma: <br><br>\nPreparo: O professor dará o seguinte comando “Tchagui, Jumbi”, e o aluno deverá recuar a perna direita com kihap (grito). <br><br>\n	Do 1º ao 8º chute, aguardar a contagem do professor para chutar alternando as pernas, ou seja, na primeira contagem o chute será com a perna direita e na segunda com a esquerda e assim sucessivamente. <br><br>\n	O 9º e 10º serão seqüenciais (ion-sok bal tchagui), iniciando com a perna direita atrás. <br><br>\n	Todos os chutes deverão ser executados com kihap. <br><br>\n* Jejari - no lugar do 1º ao 8º chute. <br><br>\n	1 - GODUP DOLIO TCHAGUI<br>\n	Fingir (ameaçar) um ap dolho (peito do pé na cintura), e aplicar o dolio tchagui com a mesma perna (chute diagonal na altura do rosto), <br><br>\n2 - GODUP IOP TCHAGUI<br>\nFingir (ameaçar) um iop tchagui (chute de lado) mais baixo e em seguida aplicar o iop tchagui mais alto. <br><br>\n3 - GODUP MONDOLIO RURIO TCHAGUI<br>\nFingir (ameaçar) um mondolio mais baixo e em seguida executá-lo corretamente. (chute girando por trás e puxando um gancho na altura do rosto). <br><br>\n4 - OLGUL NARÊ TCHAGUI<br>\nChutar com salto - ap dolio na cintura com uma perna e dolio na altura do rosto com a outra perna, após aplicação voltar à perna do segundo chute para trás. <br><br>\n5 – AP DOLIO TCHAGÔ GODUP MONDOLIO RURIO TCHAGUI<br>\nChutar ap dolio (peito do pé na cintura), voltar a perna para trás, fingir (ameaçar) um mondolio mais baixo e em seguida executá-lo corretamente. (chute girando por trás e puxando um gancho na altura do rosto), todos com a mesma perna. <br><br>\n6 – SEBON NARÊ TCHAGÔ TUIT TCHAGUI<br>\nChutar 3 ap dolio (peito do pé na cintura) sendo com as pernas alternadas (ex. direita, esquerda e direita), voltar a perna do último chute para trás e aplicar um tuit tchagui, chute por trás (girar o corpo por trás e chutar “como um coice” a perna que soltará o golpe deverá passar rente ao outro joelho). <br><br>\n7 - SEBON NARÊ TCHAGÔ MONDOLIO RURIO TCHAGUI<br>\nChutar 3 ap dolio (peito do pé na cintura) sendo com as pernas alternadas (ex. direita, esquerda e direita), voltar a perna do último chute para trás e aplicar um mondolio (chute girando por trás e puxando um gancho na altura do rosto). <br><br>\n8 - SEBON NARÊ TCHAGÔ DOLGUE TCHAGUI<br>\nChutar 3 ap dolio (peito do pé na cintura) sendo com as pernas alternadas (ex. direita, esquerda e direita), voltar a perna do último chute para trás e aplicar um dolgue (gire pelas costas levando a perna de trás e aplique um ap tolho com a perna da frente) <br><br>\n* Ion-sok – seqüência - 9º e 10º chutes. <br><br>\n9 - APURO DASSÔT-BON BAL TCHAGUI<br>\nAplicar 5 chutes caminhando com qualquer perna, com ou sem step e salto. <br><br>\n10 - JEJARI DASSÔT-BON BAL TCHAGUI<br>\nAplicar 5 chutes no lugar com qualquer perna, com ou sem step e salto. <br><br>\n\n4. MATCHO KYORUGUI – Luta combinada<br>\n	Nesta graduação o matcho kyorugui exigido será Il-bo derion (luta combinada de um passo). <br>\n	O aluno deverá desenvolver as habilidades utilizando técnicas de torção e queda. <br><br>\n\n5. STEP KYORUGUI – Combate de step<br>\n		Combate utilizando apenas steps - de 30” a 1’. <br>\n		Ameaçar os chutes. <br><br>\n\n6. JAIU KYORUGUI – Combate<br>\n	Combate de 30” a 1’ e 30”. <br><br>\n\n7. KYOK PA – Quebramento<br>\n	Kyok pa é um dos métodos usados para medir a força, velocidade e a precisão do praticante, aplicando uma variedade de habilidades de taekwondo contra tábuas de madeira, tijolos ou qualquer material escolhido com aplicação de força física e concentração mental. <br><br>\n	Nesta graduação a técnica utilizada será o Timio ap tchagui. <br><br>\n	- Mulheres, crianças e 3ª idade – a altura será de um palmo acima da cabeça. <br>\n	- Adulto Masculino – a altura será de um braço estendido acima da 			cabeça. <br><br>\n\n8. YUYON SUNG – Flexibilidade<br><br>\n\n9. IRON – Teoria<br><br>\n1. BASE<br>\n	Orun sogui: Base com o pé direito apontado para frente e o pé esquerdo 	apontado para o lado esquerdo. <br>\n	Uen sogui: Base com o pé esquerdo apontado para frente e o pé direito 	apontado para o lado direito. <br>\n	Tui coa sogui: Base cruzada por trás – pé direito apontado para frente e o 	esquerdo cruzado por trás e apenas com a ponta do pé no chão. <br><br>\n\n2. DIVISÃO DO CORPO<br>\n	- Jumok (Punho cerrado) <br>\n		Dung jumok - Costa do punho<br>\n		Me jumok - Barriga do punho<br>\n		Jung kwon - Punho<br><br>\n\n	- Son (Mão) <br>\n		Sonnal - Faca da mão<br>\n		Pyon soncut - Ponta dos dedos<br>\n		Sonnal dung - Lado oposto da faca da mão<br>\n		Batang son - Palma da mão<br>\n		Gaui soncut - Ponta do indicador e médio<br>\n		Ran soncut - Ponta de um dedo<br>\n		Agui son - Adutor do polegar e indicador<br><br>\n		\n	- Bal (Pé) <br>\n		Ap tchuk - Ponta do pé<br>\n		Dui tchuk - Calcanhar<br>\n		Bal cut - Ponta dos dedos<br>\n		Bal nal - Faca do pé<br>\n		Bal nal dung - Lado oposto da faca de pé<br>\n		Bal padak - Planta do pé<br>\n		Bal dung - Dorso do pé<br>\n		Duikuntchi – Calcanhar<br>\n</div>'),
(7, 1, '3º GUB', 7, 'Faixa Ponta Azul Vermelha', '<div class="titulo"><span>Faixa Azul ponta Vermelha para Vermelha</span><a href="#" onclick="window.open(''fotos_pop.php?z=imagens/ilustrativas/fx_pontavermelha.jpg&amp;width=98&amp;height=77&amp;title=fx_pontavermelha.jpg'',''fotos_pop'',''width=98,height=77,directories=no,location=no,menubar=no,scrollbars=no,status=no,toolbar=no,resizable=no,left=0,top=0,screenx=50,screeny=50'');return false"></a> A faixa azul ponta vermelha é a sétima do taekwondo, para que o aluno dê seqüência à próxima etapa, além de assimilar os conteúdos desta faixa para prestar o exame de graduação, deverá saber o conteúdo das faixas anteriores. <br><br>\n \n	Os conteúdos desta faixa estão divididos em 10 partes: <br><br>\n\n01. POOM-SE – Movimento de faixa<br>\n02. POOM-SE EXTRA – Movimento das faixas anteriores<br>	\n03. TCHAGUI – Chutes<br>\n04. MATCHO KYORUGUI – Luta combinada<br>\n05. STEP KYORUGUI – Combate de step<br>\n06. JAIU KYORUGUI – Combate<br>\n07. JAIU KYORUGUI EXTRA – Combate extra<br>\n08. KYOK PA – Quebramento<br>\n09. YUYON SUNG – Flexibilidade<br>\n10. IRON – Teoria<br><br>\n	\n1. POOM-SE<br>\nNome: TEGUK IUK JANG<br>\nSignificado: Teguk Iuk Jang, simboliza o "Kam", um dos 8 sinais divinos, que representa a água, significando um continuo fluxo e suavidade. <br><br>\nComposição: Esse poom-se consiste em alguns movimentos básicos apresentados nas graduações anteriores e em novas ações como: han sonnal pitrô maki, olgul bacat maki, are retchiô maki e batang son montong maki. Deve-se ter cuidado para fazer com que o pé do chute termine no ponto certo após o dolio tchagui, a palma da mão do batang son montong maki, deve ficar na altura do peito, no han sonnal pitrô maki virar bem o tronco para o lado oposto da perna da frente, sem levantar o calcanhar de trás. Os 31 movimentos devem ser executados em 19 contagens. <br><br>\nTempo: O tempo de duração deste poom-se deverá ser de 32 segundos. <br><br>\n	As crianças poderão apresentar este poom-se com contagem no dia do exame, de acordo com o bom senso do professor. <br><br>\n\n<center><object width="445" height="364"><param name="movie" value="http://www.youtube.com/v/foNwMMBB-rw&amp;hl=pt-br&amp;fs=1&amp;rel=0&amp;color1=0x5d1719&amp;color2=0xcd311b&amp;border=1"><param name="allowFullScreen" value="true"><param name="allowscriptaccess" value="always"><embed src="http://www.youtube.com/v/foNwMMBB-rw&amp;hl=pt-br&amp;fs=1&amp;rel=0&amp;color1=0x5d1719&amp;color2=0xcd311b&amp;border=1" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="445" height="364"></object></center>\n<br><br>\n\n\n2. POOM-SE EXTRA<br>\n	O aluno deverá executar um poom-se entre o teguk il jang e o teguk o jang de acordo com a escolha do mestre examinador. <br><br>\n\n3. TCHAGUI – Chutes<br>\n	São dez chutes nesta graduação, sendo que os 7 primeiros são no lugar e os 3 últimos caminhando, que deverão ser executados da seguinte forma: <br><br>\nPreparo: O professor dará o seguinte comando “Tchagui, Jumbi”, e o aluno deverá recuar a perna direita com kihap (grito). <br><br>\n	Do 1º ao 7º chute, aguardar a contagem do professor para chutar alternando as pernas, ou seja, na primeira contagem o chute será com a perna direita e na segunda com a esquerda e assim sucessivamente. <br><br>\n	Do 8º ao 10º serão seqüenciais (ion-sok bal tchagui), iniciando com a perna direita atrás. <br><br>\n	Todos os chutes deverão ser executados com kihap. <br><br>\n* Jejari - no lugar do 1º ao 7º chute. <br><br>\n	1 - AP BAL IOP TCHAGUI<br>\nChute de lado com o pé da frente (levantar o joelho da perna da frente, flexionado e girando o pé de base e a cintura, simultaneamente, estenda a perna acertando com a “faca” do pé no alvo). <br><br>\n2 - AP BAL TIGO TCHAGUI<br>\nChute pisando com o pé da frente (levantar o joelho da perna da frente, flexionado e estender a perna aplicando uma pisada na altura do rosto). <br><br>\n3 - AP BAL BACAT TCHAGUI<br>\nChute circular para fora com o pé da frente (levantar a perna da frente fazendo um circulo de dentro para fora). <br><br>\n4 - AP BAL DOLIO TCHAGUI<br>\nChute diagonal na altura do rosto com a perna da frente (levantar o joelho da perna da frente flexionado gire o pé de base e a cintura, estenda a perna acertando com peito do pé na altura do rosto). <br><br>\n5 – APURÔ TIMIO TUIT TCHAGUI<br>\n(360º) Avance saltando com perna de trás (direita) para frente e gire um tuit tchagui - chute por trás (girar o corpo por trás e chutar “como um coice” a perna que soltará o golpe deverá passar rente ao outro joelho), com a perna esquerda. <br><br>\n6 – APURÔ TIMIO MONDOLIO RURIO TCHAGUI <br>\n(360º) Avance saltando com perna de trás (direita) para frente e gire um mondolio - chute girando por trás e puxando um gancho na altura do rosto. <br><br>\n7 - MONDOLIO (fingimento), DOLGUE TCHAGUI<br>\nFingir a aplicação de um mondolio (giratório), voltando a perna atrás e em seguida, efetuar um dolgue (gire pelas costas levando a perna de trás e aplique um ap tolho com a perna da frente). <br><br>\n* Ion-sok – seqüência – do 8º ao 10º chute. <br><br>\n8 - APURÔ ORUN BAL DASÔT-BON TCHAGUI<br>\nAplicar 5 chutes caminhando com a perna direita, com ou sem step e salto. <br><br>\n9 - APURÔ UEN BAL DASÔT-BON TCHAGUI<br>\nAplicar 5 chutes caminhando com a perna esquerda, com ou sem step e salto. <br><br>\n10 - APURÔ DASSÔT-BON BAL TIMIO TCHAGUI<br>\nAplicar 5 chutes caminhando, com salto e step. <br><br>\n	\n4. MATCHO KYORUGUI – Luta combinada<br>\n	Nesta graduação o matcho kyorugui exigido será Il-bo derion (luta combinada de um passo). <br>\n	O aluno deverá desenvolver as habilidades utilizando todas as técnicas das graduações anteriores (livre). <br><br>\n\n5. STEP KYORUGUI – Combate de step<br>\n		Combate utilizando apenas steps - de 30” a 1’ e 30”. <br>\n		Ameaçar os chutes. <br><br>\n\n6. JAIU KYORUGUI – Combate<br>\n	Combate de 30” a 2’. <br><br>\n\n7. JAIU KYORUGUI EXTRA – Combate extra<br>\n		3 alunos (cada um por si) ou 1 contra 2<br>\n		De 20” a 1’ de duração. <br><br>\n\n8. KYOK PA – Quebramento<br>\n		Nesta graduação a técnica utilizada será o timio iop tchagui. <br>\n		- Mulheres, crianças e 3ª idade – saltando sobre 3 a 5 pessoas 				ajoelhadas. <br>\n		- Adulto Masculino – saltando sobre 4 a 8 pessoas com as pernas 			esticadas e com o tronco inclinado para frente. <br><br>\n\n9. YUYON SUNG – Flexibilidade<br><br>\n\n10. IRON – Teoria<br><br>\n\n1. TIPOS DE KYORUGUI<br>\n		Matcho kyorugui - Luta combinada<br>\n		Sebun kyorugui - Luta combinada de 3 passos (sambo kyorugui) <br>\n		Dubun kyorugui - Luta combinada de 2 passos (Ibo kyorugui ) <br>\n		Hanbun kyorugui - Luta combinada de 1 passo ( Ilbo kyorugui ) <br>\n		Jaiu kyorugui - Luta livre - combate	<br>\n		Iaksok kyorugui - Luta combinada simulada – sombra<br>\n		Sihap 	kyorugui - Luta de competição<br>\n		Hogu 	kyorugui - Luta com protetores<br>\n		Step 	kyorugui - Luta de step<br>\n		Hosin 	kyorugui - Luta de defesa pessoal<br>\n		Anja 	kyorugui - Luta sentada (ajoelhada) <br>\n		Il de I 	kyorugui - Luta de um contra dois<br><br>\n\n2. PALAVRAS USADAS EM COMPETIÇÕES<br>\n		Kyong ki jang - Área de competição<br>\n		Son su - Atleta <br>\n		Tchong - Azul 	<br>\n		Hong - Vermelho<br>\n		Tche gub - Categoria <br>	\n		Thu tchom - Sorteio<br>\n		Kyogki shigam - Duração do combate	<br>\n		Seung ja -Vencedor	<br>\n		Duk jom - Ponto ganho<br>\n		Gam jom - Dedução de ponto	<br>\n		Bohodê - Protetores	<br>\n		Kyong-go - Advertência (meia falta) <br>\n		Kam jom - Advertência (equivale a um ponto negativo)	<br>\n		Knock Down - Queda	<br>\n		Knock Out - Nocaute - K.O. <br>\n		Ju-shim - Arbitro central <br>	\n		Bu-shim - Árbitro lateral	<br>	\n		Be-shim - Juiz de mesa 	<br>\n		Ho-gu - Protetor de tórax<br>\n		Safodê - Protetor genital <br>	\n		Use - Superioridade<br>\n</div>');
INSERT INTO `graduacao` (`id_graduacao`, `id_modalidade`, `grau`, `ordem`, `faixa`, `curriculo`) VALUES
(8, 1, '2º GUB', 8, 'Faixa Vermelha', '<div class="titulo"><span>Faixa Vermelha para Ponta Preta</span><a href="#" onclick="window.open(''fotos_pop.php?z=imagens/ilustrativas/fx_vermelha.jpg&amp;width=98&amp;height=77&amp;title=fx_vermelha.jpg'',''fotos_pop'',''width=98,height=77,directories=no,location=no,menubar=no,scrollbars=no,status=no,toolbar=no,resizable=no,left=0,top=0,screenx=50,screeny=50'');return false"></a> A faixa vermelha é a oitava do taekwondo, para que o aluno dê seqüência à próxima etapa, além de assimilar os conteúdos desta faixa para prestar o exame de graduação, deverá saber o conteúdo das faixas anteriores. <br><br>\nEsta e a próxima faixa representam o sol, assim como o sol é responsável pela vida no universo, nesta fase o aluno torna-se responsável por todos em sua academia, torna-se assistente de instrutor (Jokyo nim). Seus conhecimentos adquiridos e aperfeiçoados representam uma parte da própria academia, portanto é uma fase de alerta sobre seus atos e comportamentos, o aluno tem que ter a consciência de suas técnicas e do poder que elas têm, e por isso, é fundamental que este saiba porque, como, quando e para que usá-las, tendo em vista sua grande responsabilidade. <br><br>\n\n	Os conteúdos desta faixa estão divididos em 10 partes: <br><br>\n\n01. POOM-SE – Movimento de faixa<br>\n02. POOM-SE EXTRA – Movimento das faixas anteriores<br>	\n03. TCHAGUI – Chutes<br>\n04. MATCHO KYORUGUI – Luta combinada<br>\n05. STEP KYORUGUI – Combate de step<br>\n06. JAIU KYORUGUI – Combate<br>\n07. JAIU KYORUGUI EXTRA – Combate extra<br>\n08. KYOK PA – Quebramento<br>\n09. YUYON SUNG – Flexibilidade<br>\n10. IRON – Teoria<br><br>\n	\n1. POOM-SE<br>\nNome: TEGUK TCHIL JANG<br>\nSignificado: Teguk Tchil Jang simboliza o "Kan", um dos 8 sinais divinos, que representa a montanha, significando ponderação e firmeza. <br><br>\nComposição: Esse poom-se consiste em alguns movimentos básicos apresentados nas graduações anteriores e em novas ações como: sonnal are maki, batang son gudurô montong maki, montong rethio maki, iop dirgui, murup tchigui, gauí maki, du jumok jetchio dirgui, otgorô are maki, ding jumok bacat tchigui e bo jumok. Uma conexão refinada de movimentos é importante para treinar esse poom-se. Os 33 movimentos devem ser executados em 25 contagens. <br><br>\nTempo: O tempo de duração deste poom-se deverá ser de 32 segundos. <br><br>\n\n	As crianças poderão apresentar este poom-se com contagem no dia do exame, de acordo com o bom senso do professor. <br><br>\n\n<center><object width="445" height="364"><param name="movie" value="http://www.youtube.com/v/8taON5pwT38&amp;hl=pt-br&amp;fs=1&amp;rel=0&amp;color1=0x5d1719&amp;color2=0xcd311b&amp;border=1"><param name="allowFullScreen" value="true"><param name="allowscriptaccess" value="always"><embed src="http://www.youtube.com/v/8taON5pwT38&amp;hl=pt-br&amp;fs=1&amp;rel=0&amp;color1=0x5d1719&amp;color2=0xcd311b&amp;border=1" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="445" height="364"></object></center>\n<br><br>\n2. POOM-SE EXTRA<br>\n	O aluno deverá executar um poom-se entre o teguk il jang e o teguk iuk jang de acordo com a escolha do mestre examinador. <br><br>\n\n3. TCHAGUI – Chutes<br>\n	São dez chutes nesta graduação, sendo que os 4 primeiros são no lugar e os 6 últimos serão na TAGUET (raquete), que deverão ser executados da seguinte forma: <br><br>\nPreparo: O professor dará o seguinte comando “Tchagui, Jumbi”, e o aluno deverá recuar a perna direita com kihap (grito). <br><br>\n	Do 1º ao 4º chute, aguardar a contagem do professor para chutar alternando as pernas, ou seja, na primeira contagem o chute será com a perna direita e na segunda com a esquerda e assim sucessivamente. <br><br>\n	O 5º e 10º deverá formar uma fila, na ordem da formação do exame e cada aluno executará o chute individualmente na raquete após o comando do professor “Shijak”. <br><br>\n	Todos os chutes deverão ser executados com kihap. <br><br>\n* Jejari - no lugar do 1º ao 4º chute. <br><br>\n	1 – AP DOLIO, IOP TCHAGUI <br>\n	Chutar ap dolio (peito do pé na cintura), antes de colocar o pé no chão executar um iop tchagui (chute de lado) com o mesmo pé. <br><br>\n2 - TIGÔ, IOP TCHAGUI<br>\nChute pisando (levantar o joelho flexionado e estender a perna aplicando uma pisada na altura do rosto), antes de colocar o pé no chão executar um iop tchagui (chute de lado) com o mesmo pé. <br><br>\n3 – AN, IOP TCHAGUI<br>\nChute circular para dentro (levantar a perna fazendo um circulo de fora para dentro), antes de colocar o pé no chão executar um iop tchagui (chute de lado) com o mesmo pé. <br><br>\n4 - DOLIO, IOP TCHAGUI<br>\nChute diagonal na altura do rosto (levantar o joelho flexionado gire o pé de base e a cintura, estenda a perna acertando com peito do pé na altura do rosto), antes de colocar o pé no chão executar um iop tchagui (chute de lado) com o mesmo pé. <br><br>\n* TAGUET (raquete demonstração) - 5º ao 10º chute. <br><br>\n5 – TIMIO AP TCHAGUI<br>\nChute frontal com salto (dar um salto levantando o joelho flexionado e estender a ponta do pé da frente na altura do queixo), também pode levantar uma perna saltando e chutar com a outra. <br><br>\n6 – TIMIO DUBUN AP TCHAGUI <br>\nDar um salto e aplicar dois chutes frontais na mesma altura. (revezando as pernas, 1º direita e depois esquerda), serão dois chutes no mesmo salto. <br><br>\n7 - TIMIO SEBON AP TCHAGUI<br>\nDar um salto e aplicar três chutes frontais na mesma altura. (revezando as pernas, 1º direita, depois esquerda e direita novamente), serão três chutes no mesmo salto. <br><br>\n8 - TIMIO SEBON AP TCHAGO, TIGO TCHAGUI<br>\nDar um salto e aplicar dois chutes frontais na mesma altura, um na altura do rosto e finalizando com um tigo tchagui. (1º direita, depois esquerda, direita e direita novamente), serão quatro chutes no mesmo salto. <br><br>\n9 - TIMIO SSÃO BAL AP TCHAGUI<br>\nDar um salto e aplicar dois chutes frontais com as penas separadas (uma perna para cada lado) ao mesmo tempo. <br><br>\n10 - TIMIO DUBAL AP TCHAGUI<br>\nCom os dois pés juntos aplicar um ap tchagui com salto. <br><br><br>\n\n4. MATCHO KYORUGUI – Luta combinada<br>\n	Nesta graduação o matcho kyorugui exigido será Il-bo derion (luta combinada de um passo). E de acordo com o mestre avaliador, poderá ser exigido também “andja kyorugui” – luta combinada ajoelhado. <br><br>\n	O aluno deverá desenvolver as habilidades utilizando técnicas livres, ou seja, poderão ser utilizadas todas aprendidas anteriormente e poderão ser desenvolvidas algumas técnicas pelo próprio aluno. <br><br>\n\n5. STEP KYORUGUI – Combate de step<br>\n		Combate utilizando apenas steps - de 30” a 1’ e 30”. <br>\n		Ameaçar os chutes. <br><br>\n\n6. JAIU KYORUGUI – Combate<br>\n	Combate de 30” a 2’. <br><br>\n\n7. JAIU KYORUGUI EXTRA – Combate extra<br>\n		3 alunos (cada um por si) ou 1 contra 2<br>\n		De 20” a 1’ de duração. <br><br>\n\n8. KYOK PA – Quebramento<br>\n		Nesta graduação a técnica utilizada será o timio mondolio rurio tchagui.\n<br><br>\n9. YUYON SUNG – Flexibilidade<br><br>\n\n10.  IRON – Teoria<br>\n		Nesta graduação, além de  toda a teoria das faixas anteriores, poderá ser exigido um trabalho escrito de acordo com o professor responsável. <br>\n</div>'),
(9, 1, '1º GUB', 9, 'Faixa Vermelha Ponta Preta', '<div class="titulo"><span>Faixa Vermelha Pontra Preta para Candidato</span><a href="#" onclick="window.open(''fotos_pop.php?z=imagens/ilustrativas/fx_pontapreta.jpg&amp;width=98&amp;height=77&amp;title=fx_pontapreta.jpg'',''fotos_pop'',''width=98,height=77,directories=no,location=no,menubar=no,scrollbars=no,status=no,toolbar=no,resizable=no,left=0,top=0,screenx=50,screeny=50'');return false"></a> A faixa vermelha com ponta preta é a nona do taekwondo, para que o aluno dê seqüência à próxima etapa, além de assimilar os conteúdos desta faixa para prestar o exame de graduação, deverá saber o conteúdo das faixas anteriores. <br><br>\nOs conteúdos desta faixa estão divididos em 10 partes: <br><br>\n\n01. POOM-SE – Movimento de faixa<br>\n02. POOM-SE EXTRA – Movimento das faixas anteriores	<br>\n03. TCHAGUI – Chutes<br>\n04. MATCHO KYORUGUI – Luta combinada<br>\n05. STEP KYORUGUI – Combate de step<br>\n06. JAIU KYORUGUI – Combate<br>\n07. JAIU KYORUGUI EXTRA – Combate extra<br>\n08. KYOK PA – Quebramento<br>\n09. YUYON SUNG – Flexibilidade<br>\n10. IRON – Teoria<br><br>\n	\n1. POOM-SE<br>\nNome: TEGUK PAL JANG<br>\nSignificado: Teguk Pal Jang simboliza o "Kon", um dos 8 sinais divinos, que representa o "yin" e a Terra, significando a origem, a povoação e também o começo e o fim. <br><br>\nComposição: Esse poom-se consiste em alguns movimentos básicos apresentados nas graduações anteriores e em novas ações como: goduro montong maki, eu santul maki, dangyo tuk tchigui e goduro are maki. Esse é o ultimo dos 8 Teguk, que poderá permitir ao aluno passar pelo exame de promoção para candidato a faixa preta e posteriormente ao 1º Dan (faixa preta). Os 38 movimentos devem ser executados em 27 contagens. <br><br>\nTempo: O tempo de duração deste poom-se deverá ser de 37 segundos. <br><br>\n	As crianças poderão apresentar este poom-se com contagem no dia do exame, de acordo com o bom senso do professor. <br><br>\n\n<center><object width="445" height="364"><param name="movie" value="http://www.youtube.com/v/oIm9m7HNuSQ&amp;hl=pt-br&amp;fs=1&amp;rel=0&amp;color1=0x5d1719&amp;color2=0xcd311b&amp;border=1"><param name="allowFullScreen" value="true"><param name="allowscriptaccess" value="always"><embed src="http://www.youtube.com/v/oIm9m7HNuSQ&amp;hl=pt-br&amp;fs=1&amp;rel=0&amp;color1=0x5d1719&amp;color2=0xcd311b&amp;border=1" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="445" height="364"></object></center><br><br>\n\n\n2. POOM-SE EXTRA<br>\n	O aluno deverá executar um poom-se entre o teguk il jang e o teguk tchil jang de acordo com a escolha do mestre examinador. <br><br>\n\n3. TCHAGUI – Chutes<br>\n	São dez chutes nesta graduação, sendo que os 5 primeiros são no lugar e mais 5 na TAGUET (raquete), nesta graduação poderá ser exigido também chutes na raquete para competição. <br><br>\n	Os chutes deverão ser executados da seguinte forma: <br><br>\nPreparo: O professor dará o seguinte comando “Tchagui, Jumbi”, e o aluno deverá recuar a perna direita com kihap (grito). <br><br>\n	Do 1º ao 5º chute, aguardar a contagem do professor para chutar alternando as pernas, ou seja, na primeira contagem o chute será com a perna direita e na segunda com a esquerda e assim sucessivamente. <br><br>\n	O 6º e 10º deverá formar uma fila, na ordem da formação do exame e cada aluno executará o chute individualmente na raquete após o comando do professor “Shijak”. <br><br>\n	Todos os chutes deverão ser executados com kihap. <br><br>\n* Jejari - no lugar do 1º ao 5º chute. <br><br>\n	1 – SEBON OLGUL NARE TCHAGUI<br>\n	Serão três chutes, sendo dois ap dolio com salto (nare tchagui) e o terceiro no rosto. <br><br>\n2 - TIMIO IOP TCHAGO E TIMIO TUIT TCHAGUI<br>\nExecutar com salto um iop tchagui (chute de lado) e com a outra perna e no mesmo salto executar um tuit tchagui (chute por trás). <br><br>\n3 – TIMIO AP BAL IOP TCHAGO TUIT TCHAGUI<br>\nExecutar com salto um iop tchagui, com a perna da frente e com a outra perna (no mesmo salto) executar um tuit tchagui (chute por trás). <br><br>\n4 - TIMIO AP BAL AP DOLIO TCHAGO TUIT TCHACUI<br>\nExecutar com salto um ap dolio, com a perna da frente e com a outra perna (no mesmo salto) executar um tuit tchagui (chute por trás). <br><br>\n5 – TIMIO AP BAL AP DOLIO TCHAGO MONDOLIO RURIO TCHAGUI<br>\nExecutar com salto um ap dolio, com a perna da frente e com a outra perna (no mesmo salto) executar um mondolio (chute girando por trás e puxando um gancho na altura do rosto). <br><br>\n* TAGUET (raquete demonstração) - 6º ao 10º chute. <br><br>\n6 – TIMIO IOP TCHAGUI<br>\nChute de lado com salto (levantar o joelho flexionado girando a cintura e saltando, simultaneamente, estenda a perna acertando com a “faca” do pé no alvo). <br><br>\n7 - TIMIO SEBUN IOP TCHAGUI<br>\nDar um salto e aplicar três chutes laterais (revezando as pernas, 1º direita, depois esquerda e direita novamente), serão três chutes no mesmo salto. <br><br>\n8 - TIMIO GAUI TCHAGUI<br>\nDar um salto e aplicar dois chutes simultaneamente (um pitro para esquerda e um iop para direita). <br><br>\n9 - TIMIO MO-DUM BAL IOP TCHAGUI<br>\nDar um salto e aplicar iop tchagui com os pés juntos no mesmo alvo. <br><br>\n10 - TIMIO IOP TCHAGO JUNG KWON<br>\nDar um salto e aplicar um iop para um lado direito e um soco para o esquerdo. <br><br>\n* TAGUET (raquete competição) – 1 minuto<br>\n	Um professor ou auxiliar, deverá segurar duas raquetes, uma na altura da cintura e outra na altura do rosto e contar quantos chutes o aluno que está sendo avaliado chutará durante um minuto. <br><br>\n\n4. MATCHO KYORUGUI – Luta combinada<br>\n	Nesta graduação o matcho kyorugui exigido será Il-bo derion (luta combinada de um passo). E de acordo com o mestre avaliador, poderá ser exigido também “andja kyorugui” – luta combinada ajoelhado. <br><br>\n	O aluno deverá desenvolver as habilidades utilizando técnicas livres, ou seja, poderão ser utilizadas todas aprendidas anteriormente e poderão ser desenvolvidas algumas técnicas pelo próprio aluno. <br><br>\n\n5. STEP KYORUGUI – Combate de step<br>\n		Combate utilizando apenas steps - de 30” a 1’ e 30”. <br>\n		Ameaçar os chutes. <br><br>\n\n6. JAIU KYORUGUI – Combate<br>\n	Combate de 30” a 2’. <br><br>\n\n7. JAIU KYORUGUI EXTRA – Combate extra<br>\n		3 alunos (cada um por si) ou 1 contra 2<br>\n		De 30” a 1’ de duração. <br><br>\n\n8. KYOK PA – Quebramento<br>\n		Nesta graduação a técnica utilizada será o timio ssão bal ap tchagui. <br><br>\n\n9. YUYON SUNG – Flexibilidade<br><br>\n\n10.  IRON – Teoria<br>\n		Nesta graduação, além de toda a teoria das faixas anteriores, poderá ser exigido um trabalho escrito de acordo com o professor responsável. <br>\n</div>'),
(10, 1, ' ', 10, 'Candidato à Preta', '<div class="titulo"><span>Faixa Candidato para PRETA 1º Dan</span><a href="#" onclick="window.open(''fotos_pop.php?z=imagens/ilustrativas/fx_candidato.jpg&amp;width=98&amp;height=77&amp;title=fx_candidato.jpg'',''fotos_pop'',''width=98,height=77,directories=no,location=no,menubar=no,scrollbars=no,status=no,toolbar=no,resizable=no,left=0,top=0,screenx=50,screeny=50'');return false"></a> A faixa de candidato a preta é a décima do taekwondo, para que o aluno dê seqüência à próxima etapa, além de assimilar os conteúdos desta faixa para prestar o exame de graduação, deverá saber o conteúdo das faixas anteriores. <br><br>\n \n	Os conteúdos desta faixa estão divididos em 10 partes: <br><br>\n\n01. POOM-SE – Movimento de faixa<br>\n02. POOM-SE EXTRA (I e II) – 2 Movimentos das faixas anteriores<br>\n03. TCHAGUI (I a VI) – Chutes<br>\n04. KIBON DONGJAC – Movimentos básicos de ataque e defesa<br>\n05. MATCHO KYORUGUI (I e II) – Luta combinada<br>\n06. HOSIN KYORUGUI – Defesa pessoal contra pegadas<br>\n07. STEP KYORUGUI – Combate de step<br>\n08. JAIU KYORUGUI – Combate<br>\n09. JAIU KYORUGUI EXTRA – Combate extra<br>\n10. KYOK PA – Quebramento<br>\n11. YUYON SUNG – Flexibilidade<br>\n12. IRON – Teoria<br><br>\n	\n1. POOM-SE<br>\nNome: TEGUK PAL JANG<br>\nSignificado: Teguk Pal Jang simboliza o "Kon", um dos 8 sinais divinos, que representa o "yin" e a Terra, significando a origem, a povoação e também o começo e o fim. <br><br>\nComposição: Esse poom-se consiste em alguns movimentos básicos apresentados nas graduações anteriores e em novas ações como: goduro montong maki, eu santul maki, dangyo tuk tchigui e goduro are maki. Esse é o ultimo dos 8 Teguk, que poderá permitir ao aluno passar pelo exame de promoção para candidato a faixa preta e posteriormente ao 1º Dan (faixa preta). Os 38 movimentos devem ser executados em 27 contagens. <br><br>\nTempo: O tempo de duração deste poom-se deverá ser de 37 segundos. <br><br>\n\n	As crianças poderão apresentar este poom-se com contagem no dia do exame, de acordo com o bom senso do professor. <br><br>\n<center><object width="445" height="364"><param name="movie" value="http://www.youtube.com/v/oIm9m7HNuSQ&amp;hl=pt-br&amp;fs=1&amp;rel=0&amp;color1=0x5d1719&amp;color2=0xcd311b&amp;border=1"><param name="allowFullScreen" value="true"><param name="allowscriptaccess" value="always"><embed src="http://www.youtube.com/v/oIm9m7HNuSQ&amp;hl=pt-br&amp;fs=1&amp;rel=0&amp;color1=0x5d1719&amp;color2=0xcd311b&amp;border=1" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="445" height="364"></object></center>\n\n<br><br>\n2. POOM-SE EXTRA<br>\n	O aluno deverá executar dois poom-ses entre o teguk il jang e o teguk tchil jang de acordo com a escolha do mestre examinador. <br><br>\n\n3. TCHAGUI – Chutes<br>\n	1 – KIBON BAL TCHAGUI<br>\n	Todos os chutes básicos feitos no mesmo lugar. <br><br>\n2 – ION-SOK BAL TCHAGUI<br>\nChutes em seqüência – no lugar e caminhando. <br><br>\n3 – GYUN HYONG BAL TCHAGUI<br>\nProjeção dos chutes básicos - na finalização manter 10 segundos parado para teste de equilíbrio. <br><br>\n4 - TAGUET TCHAGUI – I<br>\nChutes de demonstração na raquete com salto. <br><br>\n5 – JONG HWAK SUNG BAL TCHAGUI<br>\nChute de precisão – poderá ser utilizado copos descartáveis como alvo. <br><br>\n6 – TAGUET TCHAGUI – II<br>\nChutes livres na raquete, acompanhados de velocidade e força. <br><br>\n\n4. MATCHO KYORUGUI e ANDJA KYORUGUI – Luta combinada<br>\n	Nesta graduação o matcho kyorugui exigido será Il-bo derion (luta combinada de um passo). <br><br>\n	Será exigido também o andja kyorugui – luta combinada ajoelhado. <br><br>\n	O aluno deverá desenvolver as habilidades utilizando técnicas livres, ou seja, poderão ser utilizadas todas aprendidas anteriormente e poderão ser desenvolvidas algumas técnicas pelo próprio aluno. <br><br>\n\n5. HOSIN KYORUGUI – Defesa pessoal contra pegadas<br>\n	O aluno deverá desenvolver técnicas contra pegadas. Terá que sair da pegada e aplicar uma finalização com kihap. <br><br>\n\n6. STEP KYORUGUI – Combate de step<br>\n		Combate utilizando apenas steps - de 30” a 1’ e 30”. <br>\n		Ameaçar os chutes. <br><br>\n\n7. JAIU KYORUGUI – Combate<br>\n	Combate de 30” a 2’. <br><br>\n\n8. JAIU KYORUGUI EXTRA – Combate extra<br>\n		3 alunos (cada um por si) ou 1 contra 2<br>\n		De 30” a 1’ de duração. <br><br>\n\n9. KYOK PA – Quebramento<br>\n		Nesta graduação a técnica utilizada será escolhida na hora pela bancada examinadora. <br><br>\n		Aconselha-se treinar TIMIO SEBON AP TCHAGUI e mais uma técnica especial escolhida pelo aluno graduando. <br><br>\n\n10. YUYON SUNG – Flexibilidade<br><br>\n\n11.  IRON – Teoria<br><br>\n		Nesta graduação, além de toda a teoria das faixas anteriores o graduando deverá elaborar um trabalho escrito de acordo com as normas do órgão examinador competente. (Federação, Confederação ou Liga) <br><br>\n\nOutros itens que serão avaliados separadamente nesta graduação. <br>\nSI - Sison: visão<br>\nSO - Sogui: base<br>\nJA - Jasé: postura<br>\nHI - Him: força<br>\nYU - Yu-yon sung: flexibilidade<br>\nKI - Kihap: Ki-hap<br>\nGU - Guin-hyong: equilíbrio<br>\nGI - Gigu-ryok: resistência<br>\nYE - Ye-ui: disciplina<br>\nTC - Tchamyo song: participação<br>\nJI - Jip-jung-ryok: concentração<br>\nU - Sunbal-ryok: impulsão / explosão<br>\nJO - Jong rak song: precisão 	<br>\n</div>'),
(11, 1, '1º DAN', 11, 'Faixa Preta 1º DAN', NULL),
(12, 1, '2º DAN', 12, 'Faixa Preta 2º DAN', NULL),
(13, 1, '3º DAN', 13, 'Faixa Preta 3º DAN', NULL),
(14, 1, '4º DAN', 14, 'Faixa Preta 4º DAN', NULL),
(15, 1, '5º DAN', 15, 'Faixa Preta 5º DAN', NULL),
(16, 1, '6º DAN', 16, 'Faixa Preta 6º DAN', NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Extraindo dados da tabela `graduacao_federado`
--

INSERT INTO `graduacao_federado` (`id_graduacao_federado`, `id_modalidade`, `id_graduacao`, `id_federado`, `status`, `data_emissao`) VALUES
(1, 1, '16', 1, 1, '2000-05-01'),
(32, 1, '1', 65, 1, '2013-05-29'),
(33, 1, '1', 66, 1, '2013-05-29'),
(34, 1, '2', 67, 1, '2013-05-29');

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
(1, 67, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `instrutor`
--

CREATE TABLE IF NOT EXISTS `instrutor` (
  `id_instrutor` int(11) NOT NULL AUTO_INCREMENT,
  `id_federado` int(11) NOT NULL,
  PRIMARY KEY (`id_instrutor`),
  KEY `FK_instrutor_federado` (`id_federado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Aqui contem a lista de todos os que são instrutores dentro d' AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `instrutor`
--

INSERT INTO `instrutor` (`id_instrutor`, `id_federado`) VALUES
(1, 1),
(3, 65);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Aqui nessa tabela fica a lista com todos os instrutores de a' AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `instrutor_por_modalidade`
--

INSERT INTO `instrutor_por_modalidade` (`id_instrutor_por_modalidade`, `id_modalidade`, `id_instrutor`, `data_inicio`) VALUES
(1, 1, 1, '2013-05-29'),
(2, 1, 3, '2013-05-29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `senha` varchar(32) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `id_federado` int(11) NOT NULL,
  `status` int(1) DEFAULT '0' COMMENT '0 para inativo 1 para ativo\n',
  PRIMARY KEY (`id_login`),
  KEY `FK_login_federado` (`id_federado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id_login`, `login`, `senha`, `id_federado`, `status`) VALUES
(1, 'administrador', '1234', 1, 1),
(28, 'instrutor', '1234', 65, 1),
(29, 'coordenador', '1234', 66, 1),
(30, 'askywalker', '1234', 67, 1);

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
(1, 1, 1, '2000-05-27', '2000-05-27'),
(65, 1, 1, '2013-05-29', '2013-05-29'),
(66, 1, 1, '2013-05-29', '2013-05-29'),
(67, 1, 2, '2013-05-29', '2013-05-29');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `pre_avaliacao`
--

INSERT INTO `pre_avaliacao` (`id_pre_avaliacao`, `id_evento`, `id_federado`, `id_status_avaliacao`, `data_agendamento`, `id_filial`, `horario`) VALUES
(1, 1, 67, 1, '2013-05-31', 2, 3);

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
  `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_prontuario`),
  UNIQUE KEY `validar_nota` (`id_evento`,`id_movimento_faixa`,`id_federado`),
  KEY `fk_prontuario_1` (`id_movimento_faixa`),
  KEY `fk_prontuario_3` (`id_evento`),
  KEY `fk_prontuario_4` (`id_federado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `prontuario`
--

INSERT INTO `prontuario` (`id_prontuario`, `id_federado`, `id_evento`, `ordem`, `id_movimento_faixa`, `nota`, `data`) VALUES
(1, 67, 1, NULL, 4, '9', '2013-05-29 22:28:59'),
(2, 67, 1, NULL, 5, '8', '2013-05-29 22:28:59'),
(3, 67, 1, NULL, 6, '9', '2013-05-29 22:29:00'),
(4, 67, 1, NULL, 7, '8', '2013-05-29 22:29:00'),
(5, 67, 1, NULL, 8, '9', '2013-05-29 22:29:00'),
(6, 67, 1, NULL, 9, '8', '2013-05-29 22:29:00');

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
  ADD CONSTRAINT `FK_coordenador_federado` FOREIGN KEY (`id_federado`) REFERENCES `federado` (`id_federado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `FK_graduacao_modalidade` FOREIGN KEY (`id_modalidade`) REFERENCES `modalidade` (`id_modalidade`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `graduacao_federado`
--
ALTER TABLE `graduacao_federado`
  ADD CONSTRAINT `FK_federado_graduacao` FOREIGN KEY (`id_federado`) REFERENCES `federado` (`id_federado`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Restrições para a tabela `graduacao_participantes`
--
ALTER TABLE `graduacao_participantes`
  ADD CONSTRAINT `FK_graduacao` FOREIGN KEY (`id_evento`) REFERENCES `evento_graduacao` (`id_evento`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_graduacao_participantes_1` FOREIGN KEY (`id_graduacao`) REFERENCES `graduacao` (`id_graduacao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_participante` FOREIGN KEY (`id_federado`) REFERENCES `federado` (`id_federado`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `FK_coordenador_modalidade` FOREIGN KEY (`id_coordenador`) REFERENCES `coordenador` (`id_coordenador`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `movimento_faixa`
--
ALTER TABLE `movimento_faixa`
  ADD CONSTRAINT `fk_movimento_faixa_1` FOREIGN KEY (`id_modalidade`) REFERENCES `modalidade` (`id_modalidade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_movimento_faixa_2` FOREIGN KEY (`id_graduacao`) REFERENCES `graduacao` (`id_graduacao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_pedido_faixa_2` FOREIGN KEY (`id_evento`) REFERENCES `evento_graduacao` (`id_evento`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Restrições para a tabela `pre_avaliacao`
--
ALTER TABLE `pre_avaliacao`
  ADD CONSTRAINT `fk_pre_avaliacao_1` FOREIGN KEY (`id_evento`) REFERENCES `evento_graduacao` (`id_evento`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pre_avaliacao_2` FOREIGN KEY (`id_federado`) REFERENCES `federado` (`id_federado`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pre_avaliacao_3` FOREIGN KEY (`id_status_avaliacao`) REFERENCES `status_avaliacao` (`id_status_avaliacao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pre_avaliacao_4` FOREIGN KEY (`id_filial`) REFERENCES `filial` (`id_filial`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `prontuario`
--
ALTER TABLE `prontuario`
  ADD CONSTRAINT `fk_prontuario_1` FOREIGN KEY (`id_movimento_faixa`) REFERENCES `movimento_faixa` (`id_movimento_faixa`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prontuario_3` FOREIGN KEY (`id_evento`) REFERENCES `evento_graduacao` (`id_evento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prontuario_4` FOREIGN KEY (`id_federado`) REFERENCES `federado` (`id_federado`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
