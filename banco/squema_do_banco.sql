/*
SQLyog Ultimate v9.02 
MySQL - 5.5.16 : Database - federacao
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`federacao` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `federacao`;

/*Table structure for table `certificado` */

DROP TABLE IF EXISTS `certificado`;

CREATE TABLE `certificado` (
  `id_certificado` int(11) NOT NULL AUTO_INCREMENT,
  `id_evento` int(8) NOT NULL,
  `id_federado` int(11) NOT NULL,
  `data_emissao` date NOT NULL,
  `id_tipo_certificado` int(5) NOT NULL,
  PRIMARY KEY (`id_certificado`),
  KEY `FK_tipo_certificado` (`id_tipo_certificado`),
  KEY `FK_certificado_federado` (`id_federado`),
  KEY `FK_evento_graduacao` (`id_evento`),
  CONSTRAINT `FK_certificado_evento` FOREIGN KEY (`id_evento`) REFERENCES `evento_graduacao` (`id_evento`) ON UPDATE CASCADE,
  CONSTRAINT `FK_certificado_federado` FOREIGN KEY (`id_federado`) REFERENCES `federado` (`id_federado`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tipo_certificado` FOREIGN KEY (`id_tipo_certificado`) REFERENCES `tipo_certificado` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `certificado` */

/*Table structure for table `coordenador` */

DROP TABLE IF EXISTS `coordenador`;

CREATE TABLE `coordenador` (
  `id_coordenador` int(11) NOT NULL AUTO_INCREMENT,
  `id_federado` int(11) NOT NULL,
  PRIMARY KEY (`id_coordenador`),
  KEY `FK_coordenador_federado` (`id_federado`),
  CONSTRAINT `FK_coordenador_federado` FOREIGN KEY (`id_federado`) REFERENCES `federado` (`id_federado`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `coordenador` */

insert  into `coordenador`(`id_coordenador`,`id_federado`) values (1,5);

/*Table structure for table `endereco` */

DROP TABLE IF EXISTS `endereco`;

CREATE TABLE `endereco` (
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
  KEY `FK_endereco_uf` (`uf`),
  CONSTRAINT `FK_endereco_tipo_endereco` FOREIGN KEY (`tipo_endereco`) REFERENCES `tipo_endereco` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_endereco_uf` FOREIGN KEY (`uf`) REFERENCES `estados` (`id_estados`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

/*Data for the table `endereco` */

insert  into `endereco`(`id_endereco`,`logradouro`,`numero`,`complemento`,`bairro`,`cidade`,`uf`,`tipo_endereco`) values (1,'Rua do Administrador',150,'Complemento','Bela Vista','São Paulo',1,1),(2,'Rua do aluno',260,NULL,'Penha','São Paulo',1,1),(3,'Rua do aluno',154,NULL,'Penha','são paulo',1,1),(4,'Rua do aluno',154,'asdasd','Penha','São paulo',1,1),(19,'Rua dos eventos ',161,'','','São Paulo',1,3),(20,'Rua dos eventos ',161,'','','São Paulo',1,3),(21,'Rua dos eventos ',161,'','','São Paulo',1,3),(22,'Rua dos eventos ',150,'','','São Paulo',1,3),(23,'asdasd',154,'asd','asd','São Paulo',1,1),(24,'asdadasd',123,'dasdasd','asdasd','asdasd',1,1),(25,'Endereco da filiaal 1',154,'1','Penha','São paulo',1,1);

/*Table structure for table `escolaridade` */

DROP TABLE IF EXISTS `escolaridade`;

CREATE TABLE `escolaridade` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `escolaridade` */

insert  into `escolaridade`(`id`,`descricao`) values (1,'Ensino Fundamental Incompleto'),(2,'Ensino Fundamental Completo'),(3,'Ensino Médio Incompleto'),(4,'Ensino Médio Completo'),(5,'Ensino Superior Incompleto'),(6,'Ensino Superior Completo');

/*Table structure for table `estados` */

DROP TABLE IF EXISTS `estados`;

CREATE TABLE `estados` (
  `id_estados` int(2) NOT NULL AUTO_INCREMENT,
  `sigla` varchar(2) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `nome` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_estados`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `estados` */

insert  into `estados`(`id_estados`,`sigla`,`nome`) values (1,'SP','São Paulo');

/*Table structure for table `evento_graduacao` */

DROP TABLE IF EXISTS `evento_graduacao`;

CREATE TABLE `evento_graduacao` (
  `id_evento` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ano + modalidade + numero do evento (20130104)',
  `numero_evento` varchar(30) NOT NULL,
  `data_evento` date NOT NULL,
  `id_endereco` int(12) NOT NULL,
  `id_modalidade` int(2) NOT NULL,
  `descricao` longtext CHARACTER SET latin1 COLLATE latin1_spanish_ci,
  PRIMARY KEY (`id_evento`),
  KEY `FK_evento_graduacao_endereco` (`id_endereco`),
  KEY `FK_evento_graduacao_modalidade` (`id_modalidade`),
  CONSTRAINT `FK_evento_graduacao_endereco` FOREIGN KEY (`id_endereco`) REFERENCES `endereco` (`id_endereco`),
  CONSTRAINT `FK_evento_graduacao_modalidade` FOREIGN KEY (`id_modalidade`) REFERENCES `modalidade` (`id_modalidade`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `evento_graduacao` */

insert  into `evento_graduacao`(`id_evento`,`numero_evento`,`data_evento`,`id_endereco`,`id_modalidade`,`descricao`) values (13,'04-2013','2013-04-30',22,1,'       dados    \n                ');

/*Table structure for table `faixa` */

DROP TABLE IF EXISTS `faixa`;

CREATE TABLE `faixa` (
  `id_faixa` int(11) NOT NULL AUTO_INCREMENT,
  `id_modalidade` int(11) DEFAULT NULL,
  `nome` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_faixa`),
  KEY `fk_faixa_1` (`id_modalidade`),
  CONSTRAINT `fk_faixa_1` FOREIGN KEY (`id_modalidade`) REFERENCES `modalidade` (`id_modalidade`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `faixa` */

/*Table structure for table `federado` */

DROP TABLE IF EXISTS `federado`;

CREATE TABLE `federado` (
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
  KEY `FK_federado_tipo_federado` (`id_tipo_federado`),
  CONSTRAINT `FK_federado_endereco` FOREIGN KEY (`id_endereco`) REFERENCES `endereco` (`id_endereco`) ON UPDATE CASCADE,
  CONSTRAINT `FK_federado_escolaridade` FOREIGN KEY (`id_escolaridade`) REFERENCES `escolaridade` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_federado_nacionalidade` FOREIGN KEY (`id_nacionalidade`) REFERENCES `nacionalidade` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_federado_status_federado` FOREIGN KEY (`id_status`) REFERENCES `status_federado` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_federado_tipo_federado` FOREIGN KEY (`id_tipo_federado`) REFERENCES `tipo_federado` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `federado` */

insert  into `federado`(`id_federado`,`nome`,`filiacao_materna`,`filiacao_paterna`,`sexo`,`data_nasc`,`rg`,`telefone`,`celular`,`email`,`caminho_imagem`,`id_escolaridade`,`id_status`,`id_endereco`,`id_nacionalidade`,`id_tipo_federado`,`tamanho_faixa`) values (1,'Administrador Mestre Carlos','Não Declarada','Não declarada','M','1980-04-05','52.444.111-1','(11)1111-2222','(11)3333-4444','mail@mail.com','sem foto',6,1,1,1,4,'G'),(3,'Instrutor Roberto','Não declarado','Não declarado','M','1980-11-01','52.222.111-1','(00)0000-0000','(00)0000-0000','mail@mail.com','sem foto',6,1,2,1,2,'G'),(5,'Coordenador Valter','Não Declarado','Não Declarado','M','2000-01-01','58.222.222-1','(00)0000-0000','(00)0000-0000','mail@mail.com','sem foto',6,1,2,1,3,'G'),(6,'Aluno joão paulo','não declarado','não declarado','M','1985-04-30','55.444.444-5','(11)2222-2222','(11)96666-6666','mail@mail.com','sem foto',4,1,3,1,1,'M'),(7,'Aluna maria de Paula','não declarado','não declarado','F','1999-04-09','22.222.222-2','(11)2222-2222','(11)90494-3904','mail.com@mna.com.br','sem foto',6,1,4,1,1,'M'),(8,'Maria Fernanda','não declarado','não declarado','M','1985-05-31','55.444.444-5','(11)1111-1111','(11)99999-9999','email.re@email.com','sem foto',4,1,23,1,1,'M'),(9,'Caetano silveira','Não declarado','não declarado','M','1969-12-31','88.888.888-8','(22)2222-2222','(99)99999-9999','mail@mail.com','sem foto',6,1,24,1,1,'GG'),(10,'Paula Fernandes','não declarado','não declarado','F','1985-04-30','22.222.222-2','(11)2222-2222','(11)96666-6666','mail@mail.com','sem foto',6,1,25,1,1,'G');

/*Table structure for table `filial` */

DROP TABLE IF EXISTS `filial`;

CREATE TABLE `filial` (
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
  KEY `FK_filial_instrutor` (`id_instrutor`),
  CONSTRAINT `FK_filial_endereco` FOREIGN KEY (`id_endereco`) REFERENCES `endereco` (`id_endereco`) ON UPDATE CASCADE,
  CONSTRAINT `FK_filial_instrutor` FOREIGN KEY (`id_instrutor`) REFERENCES `instrutor` (`id_instrutor`) ON UPDATE CASCADE,
  CONSTRAINT `FK_filial_modalidade` FOREIGN KEY (`id_modalidade`) REFERENCES `modalidade` (`id_modalidade`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `filial` */

insert  into `filial`(`id_filial`,`nome`,`cnpj`,`telefone`,`fax`,`email`,`representante`,`id_modalidade`,`id_instrutor`,`id_endereco`) values (0,'Administração','000.000.000/0000-00','(00)0000-0000',NULL,'email@email.com','Mestre Carlos Mariano',1,2,1),(1,'Default','000.000.000/0000-00','(00)0000-0000','(00)0000-0000','mail@mail.com','Mestre Carlos',1,1,1);

/*Table structure for table `fornecedor` */

DROP TABLE IF EXISTS `fornecedor`;

CREATE TABLE `fornecedor` (
  `id_fornecedor` int(3) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `telefone` varchar(13) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_fornecedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fornecedor` */

/*Table structure for table `graduacao` */

DROP TABLE IF EXISTS `graduacao`;

CREATE TABLE `graduacao` (
  `id_graduacao` int(11) NOT NULL AUTO_INCREMENT,
  `id_modalidade` int(2) NOT NULL,
  `grau` varchar(7) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `ordem` int(2) DEFAULT NULL,
  `faixa` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `curriculo` blob COMMENT 'Curriculo da faixa na modalidade',
  PRIMARY KEY (`id_graduacao`),
  KEY `FK_graduacao_modalidade` (`id_modalidade`),
  CONSTRAINT `FK_graduacao_modalidade` FOREIGN KEY (`id_modalidade`) REFERENCES `modalidade` (`id_modalidade`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `graduacao` */

insert  into `graduacao`(`id_graduacao`,`id_modalidade`,`grau`,`ordem`,`faixa`,`curriculo`) values (1,1,'10º GUB',1,'Faixa Branca','A faixa branca é a primeira do taekwondo, nesta faixa o aluno terá sua introdução na modalidade ela representa a pureza e o início do aprendizado no taekwondo, o aluno terá o seu primeiro contato com a arte e com seus princípios básicos, tais como: disciplina, respeito, cortesia, dedicação, perseverança e autocontrole.\r\n\r\nPara que o aluno dê seqüência à próxima etapa, além de assimilar os princípios básicos acima ele deve aprender todo o conteúdo que segue abaixo e prestar o exame de graduação.\r\n\r\nO conteúdo desta faixa esta dividido em 3 partes:\r\n1. POOM-SE - Movimento de faixa	\r\n2. TCHAGUI - Chutes\r\n3. IRON - Teoria\r\n\r\n1. POOM-SE\r\nNome: SAJU DIRUGUI\r\nSignificado: A palavra “Saju” significa quatro direções e “Dirugui” significa soco. Portanto socando em quatro direções. O primeiro soco do movimento deve ser aplicado com kihap (grito).\r\nComposição: O Saju dirugui é composto por um ataque de soco no tronco e uma defesa baixa todos com a base apkubi (base de um passo penetrado para frente com o joelho da frente flexionado e a perna de trás esticada).\r\nDeverá ser aplicado tanto para o lado direito “orun” quanto para o lado esquerdo “uen” ou seja:\r\nORUN SAJU DIRUGUI – Socando em quatro direções pelo lado direito.\r\nUEN SAJU DIRUGUI – Socando em quatro direções pelo lado esquerdo.\r\nAs crianças até 06 anos de idade poderão apresentar apenas o lado direito de acordo com o bom senso de avaliação do professor. \r\n\r\n2. TCHAGUI – Chutes\r\nSão cinco chutes nesta graduação que deverão ser executados da seguinte forma:\r\nPreparo: O professor dará o seguinte comando “Tchagui, Jumbi”, e o aluno deverá recuar a perna direita com kihap (grito), aguardar a contagem do professor para chutar alternando as pernas, ou seja, na primeira contagem o chute será com a perna direita e na segunda com a esquerda e assim sucessivamente.\r\nTodos os chutes deverão ser executados com kihap e no mesmo lugar (parado), alternando as pernas, uma vez com a direita e outra com a esquerda.\r\n\r\n1 - APTCHA OLIGUI\r\nLevantamento frontal (levantar a perna estendida o máximo possível).\r\n2 - AP TCHAGUI\r\nChute frontal (levantar o joelho flexionado e estender a ponta do pé na altura do queixo).\r\n3 - BACAT TCHAGUI\r\nChute circular para fora (levantar a perna fazendo um circulo de dentro para fora).\r\n4 - AN TCHAGUI\r\nChute circular para dentro (levantar a perna fazendo um circulo de fora para dentro).\r\n5 - AP DOLIO TCHAGUI:\r\nChute com o peito do pé na cintura obs. É fundamental que gire o pé de base e a cintura\r\n\r\n3. IRON – Teoria\r\nA teoria como as demais partes do exame de graduação, tem o caráter reprovativo, porém ela não será aplicada pelo mestre e sim pelo professor responsável.\r\nA prova poderá ser escrita ou verbal, de acordo com o critério adotado pelo professor. A nota desta prova deverá ser somada com a nota de comportamento, participação e nível de aplicação do aluno com o conteúdo do exame, portanto a nota final da categoria “Iron” será a média de todas citadas, podendo ser acrescidas de mais algumas de acordo com o professor.\r\n\r\nO conteúdo teórico para esta faixa segue conforme abaixo:\r\n1. Contagem:\r\n01 - Ranna\r\n02 - Dul\r\n03 - Sêt\r\n04 - Nêt\r\n05 - Dassôt\r\n06 - Iossôt\r\n07 - Ilgôp\r\n08 - Iodol\r\n09 - Arrôp\r\n10 - Iol\r\n11 - Iol ranna\r\n12 - Iol dul\r\n13 - Iol set\r\n14 - Iol net\r\n15 - Iol dasôt\r\n20 - Sumur\r\n30 - Sórun\r\n40 - Mahun\r\n50 - Shihun\r\n100 - Bek\r\n\r\n2. Cumprimentos \r\nÀ bandeira: Tchariot, kuki é deraio kiunhe, baro\r\nAo grão-mestre: Tchariot, kwanjanim que kiunhe (7 a 9 dan)\r\nAo mestre: Tchariot, sabunim que kiunhe (4 a 6 dan)\r\nAo instrutor: Tchariot, kyosanim que kiunhe (1 a 3 dan)\r\nAo assistente: Jokyo nim que kiunhê (2 à 1 Gub)\r\nAo superior: Tchariot, kiunhe.\r\n\r\n3. Juramento do taekwondo:\r\nEU PROMETO\r\n1º Observar as regras do taekwondo;\r\n2º Respeitar o instrutor e meus superiores;\r\n3º Nunca fazer mau uso do taekwondo;\r\n4º Ser campeão da liberdade e da justiça;\r\n5º Construir um mundo mais pacífico.\r\n\r\n4. Significado da palavra TAEKWONDO:\r\nA palavra taekwondo significa literalmente o caminho dos pés e das mãos através da mente. \r\n\r\n5. Espírito do taekwondo:\r\n- cortesia: Educação e Respeito;\r\n- integridade: Honestidade e Justiça;\r\n- perseverança: Nunca desistir de seus objetivos;\r\n- domínio sobre si mesmo: Lutar contra os desejos do corpo;\r\n- espírito indomável: Nunca se entregar perante o inimigo.\r\n\r\n6. Direções e altura:\r\nOrun – Lado direito;\r\nUen – Lado esquerdo;\r\nAre – Parte baixa;\r\nMomtong – Altura tronco;\r\nOlgul – Altura rosto;\r\nSaju – Quatro direções;\r\nAp – Frente;\r\nDolio – Virando lateral;\r\nIop – Lado;\r\nBacat – Fora;\r\nAn – Dentro;\r\nPitrô – Diagonal para fora;\r\nTui – Atrás.\r\n\r\n7. Vocabulário usado em aulas: \r\nTchariot – Sentido;\r\nKiunhê – Cumprimentar;\r\nJumbi – Preparar;\r\nShijak – Começar;\r\nGuman – Terminar;\r\nBaro – Voltar;\r\nAndja – Sentar;\r\nIrossó – Levantar;\r\nRethio – Abrir debandar;\r\nSchiô – Descansar, ficar à vontade;\r\nBal bacuó – Trocar de perna;\r\nDuiró dora – Virar meia volta;\r\nJua u hyang ú – Ficar frente a frente, ou de frente para o instrutor;\r\nU hyang ú – Virar para direita;\r\nDojan – Academia, sala de treino;\r\nDobok – Uniforme;\r\nTi – Faixa;\r\nIé – sim;\r\nGamsa-ram-nida – Obrigado '),(2,1,'8º GUB',2,'Faixa Amarela','A faixa amarela é a segunda do taekwondo, para que o aluno dê seqüência à próxima etapa, além de assimilar os conteúdos desta faixa para prestar o exame de graduação, deverá saber o conteúdo da faixa anterior. \r\n\r\nEsta e a próxima faixa representam o início da adaptação do aluno no taekwondo, é simbolizado pela terra, onde a planta brota e finca sua raiz, é o começo de seu desenvolvimento técnico e tático, assim como de uma gama de princípios que irão ser adquiridos. \r\n\r\nOs conteúdos desta faixa estão divididos em 6 partes: \r\n\r\n1. POOM-SE – Movimento de faixa	\r\n2. TCHAGUI – Chutes\r\n3. MATCHO KYORUGUI – Luta combinada\r\n4. JAIU KYORUGUI – Combate\r\n5. YUYON SUNG – Flexibilidade\r\n6. IRON – Teoria\r\n\r\n1. POOM-SE\r\nNome: TEGUK IL JANG\r\nSignificado: O Teguk il jang representa o símbolo do \"keon\", um dos 8 Kwaes (sinais divinos), que significa o \"positivo e o negativo\". Como o \"keon\" simboliza o começo da criação de todas as coisas no universo. A palavra “il” significa 1º (primeiro), portanto a primeira parte de todos os movimentos. \r\n\r\nComposição: Esse poom-se consiste nos movimentos básicos, como are-maki (defesa baixa), montong maki (defesa no meio), olgul maki (defesa alta), montong dirgui (soco no tronco), e ap tchagui (chute frontal). Os 20 movimentos devem ser executados em 18 contagens. \r\n\r\nTempo: O tempo de duração deste poom-se deverá ser de 25 segundos. \r\n\r\nAs crianças poderão apresentar este poom-se com contagem no dia do exame, de acordo com o bom senso do professor. \r\n\r\n2. TCHAGUI – Chutes\r\nSão cinco chutes nesta graduação que deverão ser executados da seguinte forma: \r\nPreparo: O professor dará o seguinte comando “Tchagui, Jumbi”, e o aluno deverá recuar a perna direita com kihap (grito), aguardar a contagem do professor para chutar alternando as pernas, ou seja, na primeira contagem o chute será com a perna direita e na segunda com a esquerda e assim sucessivamente. \r\nTodos os chutes deverão ser executados com kihap e no mesmo lugar (parado). \r\n\r\n1 - MIRÔ TCHAGUI\r\nChute empurrando (levantar o joelho flexionado e empurrar o alvo com a sola ou com a ponta do pé). \r\n\r\n2 - TIGÔ TCHAGUI\r\nChute pisando (levantar o joelho flexionado e estender a perna aplicando uma pisada na altura do rosto). \r\n\r\n3 - DOLIO TCHAGUI\r\nChute diagonal na altura do rosto (levantar o joelho flexionado gire o pé de base e a cintura, estenda a perna acertando com peito do pé na altura do rosto). \r\n\r\n4 - IOP TCHAGUI\r\nChute de lado (levantar o joelho flexionado e girando o pé de base e a cintura, simultaneamente, estenda a perna acertando com a “faca” do pé no alvo). \r\n\r\n5 - TUIT TCHAGUI\r\nChute por trás (girar o corpo por trás e chutar “como um coice” a perna que soltará o golpe deverá passar rente ao outro joelho). \r\n\r\n3. MATCHO KYORUGUI – Luta combinada\r\nMatcho kyorugui é uma luta combinada que será executada de maneira pré-arranjada utilizando as habilidades básicas do Taekwondo e técnicas adaptadas do poom-se. Matcho kyorugui ajuda o praticante a aumentar seu foco mental, controle de distância, senso de objetivo, tempo de reação e exatidão. \r\nNesta graduação o matcho kyorugui exigido será Il-bo derion (luta combinada de um passo). \r\nO aluno deverá desenvolver técnicas utilizando apenas socos (técnica de mão fechada). \r\n\r\n4. JAIU KYORUGUI – Combate\r\nJaiu kyorugui é um combate livre que requer rigor absoluto em utilizar as regras de segurança e os golpes assimilados até o momento. \r\nOs fatores mais importantes no Jaiu kyorugui são agilidade, poder, condicionamento, julgamento, coragem, estratégias táticas e técnicas. \r\nNo exame de graduação o Jaiu Kyorugui deve ser semicontato (sombra). \r\nCombate de 30 segundos a 01 minuto. \r\n\r\n5. YUYON SUNG – Flexibilidade\r\n\r\n6. IRON – Teoria\r\n\r\n1. Aplicação (finalização): \r\nDirgui – Soco; \r\nTchigui – Bater; \r\nTchirgui – Perfurar; \r\nTchagui – Chute\r\nMaki – Defesa; \r\nOligui – Levantar. \r\n\r\n2. Base do pé: \r\nNarani: As pernas separadas de lado na largura do ombro. \r\nJutchumso: Base agachada, as pernas separadas de lado, 2x a largura do ombro. \r\nApsogui: Base de um passo normal para frente\r\nApkubi: Base de um passo penetrado para frente com o joelho da frente flexionado e a perna de trás esticada\r\n\r\n3. Regras de competição: \r\na) Quais são os pontos ganhos numa competição? \r\nChute no tronco, chute no rosto e soco no tronco. \r\nb) Protetores obrigatórios em competição: \r\nCabeça, bucal, tórax, antibraço, genital e canela. \r\nNo caso de empate depois de finalizado o 3º round, o quarto round de dois minutos se levará a cabo como round de morte súbita, depois de um minuto de descanso do 3º round. \r\nd) Tamanho da área oficial de combate: \r\nA área é de 8m x 8m, e terá uma superfície lisa e sem obstáculos. \r\n\r\n4. Contagem numérica: \r\n1º - Il\r\n2º - I	\r\n3º - Sam\r\n4º - Sa\r\n5º - Ô\r\n6º - Iuk\r\n7º - Tchil\r\n8º - Pal\r\n9º - Gu\r\n10º – Ship'),(3,1,'7º GUB',3,'Faixa Amarela Ponta Verde','A faixa amarela ponta verde é a terceira do taekwondo, para que o aluno dê seqüência à próxima etapa, além de assimilar os conteúdos desta faixa para prestar o exame de graduação, deverá saber o conteúdo das faixas anteriores. \r\n\r\nOs conteúdos desta faixa estão divididos em 6 partes: \r\n\r\n1. POOM-SE – Movimento de faixa\r\n2. TCHAGUI – Chutes\r\n3. MATCHO KYORUGUI – Luta combinada\r\n4. JAIU KYORUGUI – Combate\r\n5. YUYON SUNG – Flexibilidade\r\n6. IRON – Teoria\r\n\r\n1. POOM-SE\r\nNome: TEGUK I JANG\r\nSignificado: Teguk I Jang simboliza o \"Tae\", um dos 8 sinais divinos, que significa a firmeza e a suavidade externa. \r\n\r\nComposição: Esse poom-se consiste nos movimentos básicos apresentados na graduação anterior com ênfase nas ações do ap tchagui que aparecem mais freqüentemente neste poom-se. Os 23 movimentos devem ser executados em 18 contagens. \r\n\r\nTempo: O tempo de duração deste poom-se deverá ser de 30 segundos. \r\n\r\nAs crianças poderão apresentar este poom-se com contagem no dia do exame, de acordo com o bom senso do professor. \r\n\r\n2. TCHAGUI – Chutes\r\nSão cinco chutes nesta graduação que deverão ser executados da seguinte forma: \r\nPreparo: O professor dará o seguinte comando “Tchagui, Jumbi”, e o aluno deverá recuar a perna direita com kihap (grito), aguardar a contagem do professor para chutar alternando as pernas, ou seja, na primeira contagem o chute será com a perna direita e na segunda com a esquerda e assim sucessivamente. \r\n\r\nTodos os chutes deverão ser executados com kihap e no mesmo lugar (parado). \r\n\r\n1 - TIMIO AP BAL AP DOLIO TCHAGUI\r\nChute saltando, acerta o peito do pé da frente na altura da cintura. \r\n\r\n2 - TIMIO TUIT TCHAGUI\r\nChute saltando por trás (dar um salto girando o corpo por trás e chutar “como um coice” a perna que soltará o golpe deverá passar rente ao outro joelho). \r\n\r\n3 - RURIO TCHAGUI\r\nGancho - Gira o corpo pela frente e acerta o calcanhar na altura do rosto puxando como se fosse um gancho. \r\n\r\n4 - AP BAL RURIO TCHAGUI\r\nMesmo chute anterior agora com o pé da frente\r\n\r\n5 - MONDOLIO RURIO TCHAGUI\r\nChute girando por trás e puxando um gancho na altura do rosto. \r\n\r\n3. MATCHO KYORUGUI – Luta combinada\r\nNesta graduação o matcho kyorugui exigido será Il-bo derion (luta combinada de um passo). \r\nO aluno deverá desenvolver as habilidades utilizando apenas técnicas com a mão aberta. \r\n\r\n4. JAIU KYORUGUI – Combate\r\nCombate de 30 segundos a 01 minuto. \r\n\r\n5. YUYON SUNG – Flexibilidade\r\n\r\n6. IRON – Teoria\r\n1. Base do pé: \r\n- Tuit kubi: Base em \"L\", o pé da frente apontado para frente e o pé de trás apontado para o lado. \r\n- Moa sogui: Base com os pés juntos. \r\n- Bum sogui: Base leopardo, o pé da frente com o calcanhar levantado e os dois joelhos flexionados. \r\n- Tchariot sogui: Base em posição de sentido com a ponta dos pés 22.5 graus separados. \r\n- Pyoni sogui: As pernas separadas de lado na largura do ombro com a ponta dos pés separados 22.5 graus. \r\n\r\n2. Regras de Competição\r\n- As meias faltas (Kyong go - Advertência equivale a meio ponto perdido) \r\n1.	Segurar o adversário; \r\n2.	Empurrar o adversário; \r\n3.	Agarrar o adversário; \r\n4.	Sair da quadra (10m x 10m); \r\n5.	Virar as costas; \r\n6.	Cair propositalmente; \r\n7.	Aplicar joelhada; \r\n8.	Ataque na região genital; \r\n9.	Chute na coxa; \r\n10.	Soco no rosto; \r\n11.	Comemorar após golpe; \r\n12.	Mau comportamento; \r\n13.	Fingimento. \r\n\r\n- As faltas inteiras (Kam jom - Advertência equivale a um ponto negativo) \r\n1.	Atacar adversário caído; \r\n2.	Atacar região das costas; \r\n3.	Mau comportamento; \r\n4.	Soco no rosto; \r\n5.	Dar cabeçada; \r\n6.	Derrubar o adversário; \r\n7.	Sair da área de competição;\r\n8.	Atacar o adversário após a separação, sem autorização de prosseguir. \r\n\r\n- Pontuação\r\nOs pontos válidos se dividem como se segue: \r\n1 ponto ganho: - sôco no tronco e chute no tronco. \r\n2 pontos ganhos: - chute com giro\r\n3 pontos ganhos: - chute no rosto\r\n\r\n- Partes proibidas ao ataque: \r\nA região do órgão genital e abaixo dele\r\nToda parte posterior da cabeça\r\nQualquer parte do corpo que for atingida pelo joelho ou cotovelo'),(4,1,'6º GUB',4,'Faixa Verde','A faixa verde é a quarta do taekwondo, para que o aluno dê seqüência à próxima etapa, além de assimilar os conteúdos desta faixa para prestar o exame de graduação, deverá saber o conteúdo das faixas anteriores. \r\n\r\nEsta e a próxima faixa representam o crescimento físico, mental e espiritual, é o início da destreza que começa a surgir no aluno, onde além do aprimoramento de todos seus conhecimentos, é fundamental que o aluno esteja ciente do espírito do Taekwondo, é uma etapa de amplo crescimento de seu conhecimento. \r\n\r\nOs conteúdos desta faixa estão divididos em 6 partes: \r\n\r\n1. POOM-SE – Movimento de faixa	\r\n2. TCHAGUI – Chutes\r\n3. MATCHO KYORUGUI – Luta combinada\r\n4. JAIU KYORUGUI – Combate\r\n5. YUYON SUNG – Flexibilidade\r\n6. IRON – Teoria\r\n\r\n1. POOM-SE\r\nNome: TEGUK SAM JANG\r\nSignificado: Teguk Sam Jang simboliza o \"Ra\", um dos 8 sinais divinos, que representa \"quente e resplandecente\". Isso encoraja o aluno a abrigar um senso de justiça e ardor pra treinar. \r\n\r\nComposição: Esse poom-se consiste nos movimentos básicos apresentados nas graduações anteriores e novas ações como: han sonnal mok thigui e han sonnal iop maki. Esse poom-se é caracterizado pelas sucessivas defesas e ataques. É dada ênfase para os contra-ataques empregados contra o ataque do oponente. Os 34 movimentos devem ser executados em 20 contagens. \r\n\r\nTempo: O tempo de duração deste poom-se deverá ser de 35 segundos. \r\n\r\nAs crianças poderão apresentar este poom-se com contagem no dia do exame, de acordo com o bom senso do professor. \r\n\r\n2. TCHAGUI – Chutes\r\nSão dez chutes nesta graduação, sendo que 4 são no lugar e 6 andando, que deverão ser executados da seguinte forma: \r\nPreparo: O professor dará o seguinte comando “Tchagui, Jumbi”, e o aluno deverá recuar a perna direita com kihap (grito). \r\n\r\nDo 1º ao 4º chute, aguardar a contagem do professor para chutar alternando as pernas, ou seja, na primeira contagem o chute será com a perna direita e na segunda com a esquerda e assim sucessivamente. \r\n\r\nDo 5º ao 10º chute, eles deverão ser aplicados caminhando, iniciando com a perna direita atrás, no fim da execução de cada chute, fazer meia volta e no retorno deverá ser com perna esquerda (caso a execução termine com a perna direita na frente, basta dar um passo e fazer a meia volta, deixando a perna esquerda atrás após a virada). \r\n\r\nTodos os chutes deverão ser executados com kihap. \r\n\r\n* Jejari - no lugar do 1º ao 4º chute. \r\n\r\n1 - NARÊ TCHAGUI\r\nChutar dois ap dolio com salto, sendo com a perna direita e depois esquerda e voltar a perna do segundo chute para trás. \r\n\r\n2 - AP DOLIO TCHAGÔ DOLIO TCHAGUI\r\nChutar ap dolio (peito do pé na cintura), coloque o pé no chão e dolio (chute lateral na altura do rosto), os dois chutes com a mesma perna. \r\n\r\n3 - AP DOLIO TCHAGÔ MOMDOLIO RURIO TCHAGUI\r\nChutar ap dolio (peito do pé na cintura), voltar o pé para trás e aplicar o mondolio (chute girando por trás e puxando um gancho na altura do rosto), os dois chutes com a mesma perna. \r\n\r\n4 - TIMIO AP BAL AP TCHAGUI\r\nChute frontal com salto e com o pé da frente (dar um salto levantando o joelho flexionado e estender a ponta do pé da frente na altura do queixo). \r\n\r\n* Apuro – caminhando do 5º ao 10º chute. \r\n\r\n5 – AP DOLIO TCHAGÔ DOLIO TCHAGUI \r\nChutar ap dolio (peito do pé na cintura), dar um passo (step) e chutar dolio (chute diagonal na altura do rosto), com a mesma perna. \r\n\r\n6 – AP DOLIO TCHAGÔ CRÔ TIMIO DOLIO TCHAGUI\r\nChutar ap dolio (peito do pé na cintura), com a perna de trás, após o chute ela ficará na frente, levante a mesma perna ameaçando e chute dolio com a outra perna (chute diagonal na altura do rosto).\r\n\r\n7 - TIGÔ TCHAGÔ TUIT TCHAGUI\r\nChute pisando (levantar o joelho flexionado e estender a perna aplicando uma pisada na altura do rosto), após o chute a perna ficará na frente, chute tuit tchagui (girar o corpo por trás e chutar “como um coice” a perna que soltará o golpe deverá passar rente ao outro joelho). \r\n\r\n8 - TIGÔ TCHAGÔ APURO TUIT TCHAGUI\r\nChute pisando (levantar o joelho flexionado e estender a perna aplicando uma pisada na altura do rosto), após o chute a perna ficará na frente, dar um passo (step) e chutar duit tchagui com o pé dir (girar o corpo por trás e chutar “como um coice” a perna que soltará o golpe deverá passar rente ao outro joelho). \r\n\r\n9 - DOLIO TCHAGÔ JEJARI BALBACUÓ TUIT TCHAGUI\r\nChutar dolio (chute diagonal na altura do rosto), jejari balbacuó (trocar de base no lugar) e chutar duit tchagui com o pé dir (girar o corpo por trás e chutar “como um coice” a perna que soltará o golpe deverá passar rente ao outro joelho). \r\n\r\n10 - DOLIO TCHAGÔ APURO MICRÔ TUIT TCHAGUI\r\nChutar dolio (chute diagonal na altura do rosto), apuro micro (escorregar os dois pés paralelamente para frente) e chutar tuit tchagui (girar o corpo por trás e chutar “como um coice” a perna que soltará o golpe deverá passar rente ao outro joelho). \r\n\r\n3. MATCHO KYORUGUI – Luta combinada\r\nNesta graduação o matcho kyorugui exigido será Il-bo derion (luta combinada de um passo). \r\nO aluno deverá desenvolver as habilidades utilizando técnicas com o cotovelo e com o joelho. \r\n\r\n4. JAIU KYORUGUI – Combate\r\nCombate de 30” a 1’ e 30”. \r\n\r\n5. YUYON SUNG – Flexibilidade\r\n\r\n6. IRON – Teoria\r\n\r\n- Palmok - antebraço\r\nAn palmok - dentro do antebraço\r\nBacat palmok - fora do antebraço\r\nDung palmok - costa do punho\r\nMit palmok - barriga do antebraço\r\nPalkup – cotovelo\r\n\r\n- Alguns tipos de competições e concursos: \r\nKyorugui individual\r\nKyorugui dupla\r\nKyorugui por equipe de 5 atletas\r\nPoom-se individual\r\nPoom-se por equipe\r\nTaekwondo Dance\r\nKyok pa - Quebramento em altura, força e distância\r\nKihap – Grito\r\nMiss Taekwondo\r\n\r\n- Tipos de vitória\r\nVitória por desclassificação\r\nVitória por desistência\r\nVitória por ferimento\r\nVitória por nocaute\r\nVitória por pontos\r\nVitória por pontos perdidos\r\nVitória por superioridade\r\nVitória por nocaute técnico'),(5,1,'5º GUB',5,'Faixa Verde Ponta Azul','A faixa verde ponta azul é a quinta do taekwondo, para que o aluno dê seqüência à próxima etapa, além de assimilar os conteúdos desta faixa para prestar o exame de graduação, deverá saber o conteúdo das faixas anteriores. \r\n\r\nOs conteúdos desta faixa estão divididos em 6 partes: \r\n\r\n1. POOM-SE – Movimento de faixa	\r\n2. TCHAGUI – Chutes\r\n3. MATCHO KYORUGUI – Luta combinada\r\n4. JAIU KYORUGUI – Combate\r\n5. YUYON SUNG – Flexibilidade\r\n6. IRON – Teoria\r\n\r\n1. POOM-SE\r\nNome: TEGUK SA JANG\r\nSignificado: Teguk Sa Jang simboliza o \"Jin\", um dos 8 sinais divinos, que representa o grande poder do trovão e da dignidade. \r\n\r\nComposição: Esse poom-se consiste nos movimentos básicos apresentados nas graduações anteriores e novas ações como: sonnal montong maki, pyon son cut seo thirgui, jebi poom mok thigui, yop tchaqui, montong bacat maki e dung jumok olgul ap thigui. Em vários movimentos usamos a base duit kub. Os 29 movimentos devem ser executados em 20 contagens. \r\n\r\nTempo: O tempo de duração deste poom-se deverá ser de 30 segundos. \r\n\r\nAs crianças poderão apresentar este poom-se com contagem no dia do exame, de acordo com o bom senso do professor. \r\n\r\n2. TCHAGUI – Chutes\r\nSão dez chutes nesta graduação, sendo que os 4 primeiros são com a base “narani are retcho maki” e os outros 6 são com salto e na base “Kyonumse” (base básica dos chutes, livre, a vontade), que deverão ser executados da seguinte forma: \r\n\r\nPreparo: Do 1º ao 4º chute, o professor dará o seguinte comando “Narani are retcho maki – Jumbi” e o aluno deverá separar a perna esquerda e ao mesmo tempo cruzar os braços na frente do peito, descendo e executando duas defesas baixas simultaneamente com kihap. \r\n\r\nDo 5º ao 10º o professor dará o seguinte comando “Tchagui, Jumbi”, e o aluno deverá recuar a perna direita com kihap (grito). \r\n\r\nTodos os chutes deverão ser executados com kihap. \r\n\r\n* Base narani are retcho maki\r\n\r\n1 - GODUP AP TCHAGUI\r\nChutar dois ap tchagui com a mesma perna (chute frontal - levantar o joelho flexionado e estender a ponta do pé na altura do queixo 2x). \r\n\r\n2 - AN, BACAT e RURIO TCHAGUI\r\nChute para dentro, fora e gancho. \r\n\r\n3 - AP, IOP, RURIO, DOLIO e TUIT TCHAGUI\r\nChute frontal, chute de lado, chute diagonal na altura do rosto com o peito do pé e chute por trás “tipo coice” (direção - o primeiro será para frente, os outros três para o lado e o último para trás). \r\n\r\n4 - GODUP IOP TCHAGUI\r\nChutar dois iop tchagui - de lado (levantar o joelho flexionado lateralmente, estenda a perna acertando com a “faca” do pé no alvo). \r\n\r\n* Kyonumse – Tchagui jumbi. \r\n\r\n5 – TIMIO AP TCHAGUI\r\nChute frontal com salto (dar um salto levantando o joelho flexionado e estender a ponta do pé na altura do queixo). \r\n\r\n6 – TIMIO TIGÔ TCHAGUI\r\nChute pisando com salto (dar um salto levantando o joelho flexionado e estender a perna aplicando uma pisada na altura do rosto). \r\n\r\n7 - TIMIO AP BAL RURIO TCHAGUI\r\nGancho com o pé da frente e com salto (dar um salto girando o corpo pela frente e acertar o calcanhar na altura do rosto puxando como se fosse um gancho). \r\n\r\n8 - TIMIO IOP MIRÔ TCHAGUI\r\nChute empurrando de lado e com salto (dar um salto levantando o joelho flexionado e girando a cintura, simultaneamente, estenda a perna acertando com a “faca” do pé no alvo). \r\n\r\n9 – TIMIO DOLIO THAGUI\r\nChute diagonal na altura do rosto e com salto (saltar levantantando o joelho flexionado girando a cintura, estenda a perna acertando com peito do pé na altura do rosto). \r\n\r\n10 - TIMIO MONDOLIO RURIO TCHAGUI\r\nChute girando por trás e puxando um gancho na altura do rosto e com salto. \r\n\r\n3. MATCHO KYORUGUI – Luta combinada\r\nNesta graduação o matcho kyorugui exigido será Il-bo derion (luta combinada de um passo). \r\nO aluno deverá desenvolver as habilidades utilizando técnicas com chutes. \r\n\r\n4. JAIU KYORUGUI – Combate\r\nCombate de 30” a 1’ e 30”. \r\n\r\n5. YUYON SUNG – Flexibilidade\r\n\r\n6. IRON – Teoria\r\n\r\n1. DIRGUI – Socar\r\nMomtong dirgui – soco no tronco\r\nDolio dirgui – soco lateral\r\nSeuó dirgui – soco levantado\r\nIop dirgui – soco de lado\r\nNerio dirgui – soco de cima para baixo \r\nJetchio dirgui – soco virando o punho na barriga\r\n\r\n2. MAKI – Defesa	\r\n- Bacat maki – defesa para fora\r\nAn maki – defesa para dentro\r\nIop maki – defesa de lado\r\nPitro maki – defesa diagonal\r\nOtgoro maki – defesa cruzando o pulso\r\n\r\n3. TCHIGUI – Bater\r\nAp tchigui – bater de frente\r\nAn tchigui - bater para dentro\r\nBacat tchigui - bater para fora\r\nIop tchigui – bater de lado\r\nNerio tchigui - bater de cima pra baixo'),(6,1,'4º GUB',6,'Faixa Azul','A faixa azul é a sexta do taekwondo, para que o aluno dê seqüência à próxima etapa, além de assimilar os conteúdos desta faixa para prestar o exame de graduação, deverá saber o conteúdo das faixas anteriores. \r\n\r\nEsta e a próxima faixa representam o amadurecimento do aluno. Simbolizada pelo céu, para onde a planta se dirige; a liberdade de utilizar, com raciocínio e criatividade tudo o que foi aprendido. \r\n\r\nOs conteúdos desta faixa estão divididos em 9 partes: \r\n\r\n1. POOM-SE – Movimento de faixa\r\n2. POOM-SE EXTRA – Movimento das faixas anteriores	\r\n3. TCHAGUI – Chutes\r\n4. MATCHO KYORUGUI – Luta combinada\r\n5. STEP KYORUGUI – Combate de step\r\n6. JAIU KYORUGUI – Combate\r\n7. KYOK PA – Quebramento\r\n8. YUYON SUNG – Flexibilidade\r\n9. IRON – Teoria\r\n\r\n1. POOM-SE\r\nNome: TEGUK O JANG\r\nSignificado: Teguk O Jang simboliza o \"Son\", um dos 8 sinais divinos, que representa o vento, significando tanto uma força potente quanto a tranqüilidade de acordo com sua força. \r\n\r\nComposição: Esse poom-se consiste em alguns movimentos básicos apresentados nas graduações anteriores e em novas ações como: me jumok nerio tchigui, palkup dolio tchigui, iop tchamio iop dirugui e palkup pyo jok tchigui. Esse poom-se é caracterizado pelas sucessivas defesas de montong maki e are maki. Os 32 movimentos devem ser executados em 20 contagens. \r\n\r\nTempo: O tempo de duração deste poom-se deverá ser de 30 segundos. \r\nAs crianças poderão apresentar este poom-se com contagem no dia do exame, de acordo com o bom senso do professor. \r\n\r\n\r\n\r\n\r\n2. POOM-SE EXTRA\r\nO aluno deverá executar um poom-se entre o teguk il jang e o teguk sa jang de acordo com a escolha do mestre examinador. \r\n\r\n3. TCHAGUI – Chutes\r\nSão dez chutes nesta graduação, sendo que os 8 primeiros são no lugar e os 2 últimos seqüenciais, que deverão ser executados da seguinte forma: \r\n\r\nPreparo: O professor dará o seguinte comando “Tchagui, Jumbi”, e o aluno deverá recuar a perna direita com kihap (grito). \r\n\r\nDo 1º ao 8º chute, aguardar a contagem do professor para chutar alternando as pernas, ou seja, na primeira contagem o chute será com a perna direita e na segunda com a esquerda e assim sucessivamente. \r\n\r\nO 9º e 10º serão seqüenciais (ion-sok bal tchagui), iniciando com a perna direita atrás. \r\n\r\nTodos os chutes deverão ser executados com kihap. \r\n\r\n* Jejari - no lugar do 1º ao 8º chute. \r\n\r\n1 - GODUP DOLIO TCHAGUI\r\nFingir (ameaçar) um ap dolho (peito do pé na cintura), e aplicar o dolio tchagui com a mesma perna (chute diagonal na altura do rosto), \r\n\r\n2 - GODUP IOP TCHAGUI\r\nFingir (ameaçar) um iop tchagui (chute de lado) mais baixo e em seguida aplicar o iop tchagui mais alto. \r\n\r\n3 - GODUP MONDOLIO RURIO TCHAGUI\r\nFingir (ameaçar) um mondolio mais baixo e em seguida executá-lo corretamente. (chute girando por trás e puxando um gancho na altura do rosto). \r\n\r\n4 - OLGUL NARÊ TCHAGUI\r\nChutar com salto - ap dolio na cintura com uma perna e dolio na altura do rosto com a outra perna, após aplicação voltar à perna do segundo chute para trás. \r\n\r\n5 – AP DOLIO TCHAGÔ GODUP MONDOLIO RURIO TCHAGUI\r\nChutar ap dolio (peito do pé na cintura), voltar a perna para trás, fingir (ameaçar) um mondolio mais baixo e em seguida executá-lo corretamente. (chute girando por trás e puxando um gancho na altura do rosto), todos com a mesma perna. \r\n\r\n6 – SEBON NARÊ TCHAGÔ TUIT TCHAGUI\r\nChutar 3 ap dolio (peito do pé na cintura) sendo com as pernas alternadas (ex. direita, esquerda e direita), voltar a perna do último chute para trás e aplicar um tuit tchagui, chute por trás (girar o corpo por trás e chutar “como um coice” a perna que soltará o golpe deverá passar rente ao outro joelho). \r\n\r\n7 - SEBON NARÊ TCHAGÔ MONDOLIO RURIO TCHAGUI\r\nChutar 3 ap dolio (peito do pé na cintura) sendo com as pernas alternadas (ex. direita, esquerda e direita), voltar a perna do último chute para trás e aplicar um mondolio (chute girando por trás e puxando um gancho na altura do rosto). \r\n\r\n8 - SEBON NARÊ TCHAGÔ DOLGUE TCHAGUI\r\nChutar 3 ap dolio (peito do pé na cintura) sendo com as pernas alternadas (ex. direita, esquerda e direita), voltar a perna do último chute para trás e aplicar um dolgue (gire pelas costas levando a perna de trás e aplique um ap tolho com a perna da frente) \r\n\r\n* Ion-sok – seqüência - 9º e 10º chutes. \r\n\r\n9 - APURO DASSÔT-BON BAL TCHAGUI\r\nAplicar 5 chutes caminhando com qualquer perna, com ou sem step e salto. \r\n\r\n10 - JEJARI DASSÔT-BON BAL TCHAGUI\r\nAplicar 5 chutes no lugar com qualquer perna, com ou sem step e salto. \r\n\r\n4. MATCHO KYORUGUI – Luta combinada\r\nNesta graduação o matcho kyorugui exigido será Il-bo derion (luta combinada de um passo). \r\nO aluno deverá desenvolver as habilidades utilizando técnicas de torção e queda. \r\n\r\n5. STEP KYORUGUI – Combate de step\r\nCombate utilizando apenas steps - de 30” a 1’. \r\nAmeaçar os chutes. \r\n\r\n6. JAIU KYORUGUI – Combate\r\nCombate de 30” a 1’ e 30”. \r\n\r\n7. KYOK PA – Quebramento\r\nKyok pa é um dos métodos usados para medir a força, velocidade e a precisão do praticante, aplicando uma variedade de habilidades de taekwondo contra tábuas de madeira, tijolos ou qualquer material escolhido com aplicação de força física e concentração mental. \r\n\r\nNesta graduação a técnica utilizada será o Timio ap tchagui. \r\n\r\n- Mulheres, crianças e 3ª idade – a altura será de um palmo acima da cabeça. \r\n- Adulto Masculino – a altura será de um braço estendido acima da cabeça. \r\n\r\n8. YUYON SUNG – Flexibilidade\r\n\r\n9. IRON – Teoria\r\n\r\n1. BASE\r\nOrun sogui: Base com o pé direito apontado para frente e o pé esquerdo apontado para o lado esquerdo. \r\nUen sogui: Base com o pé esquerdo apontado para frente e o pé direito apontado para o lado direito. \r\nTui coa sogui: Base cruzada por trás – pé direito apontado para frente e o esquerdo cruzado por trás e apenas com a ponta do pé no chão. \r\n\r\n2. DIVISÃO DO CORPO\r\n- Jumok (Punho cerrado) \r\nDung jumok - Costa do punho\r\nMe jumok - Barriga do punho\r\nJung kwon - Punho\r\n\r\n- Son (Mão) \r\nSonnal - Faca da mão\r\nPyon soncut - Ponta dos dedos\r\nSonnal dung - Lado oposto da faca da mão\r\nBatang son - Palma da mão\r\nGaui soncut - Ponta do indicador e médio\r\nRan soncut - Ponta de um dedo\r\nAgui son - Adutor do polegar e indicador\r\n\r\n- Bal (Pé) \r\nAp tchuk - Ponta do pé\r\nDui tchuk - Calcanhar\r\nBal cut - Ponta dos dedos\r\nBal nal - Faca do pé\r\nBal nal dung - Lado oposto da faca de pé\r\nBal padak - Planta do pé\r\nBal dung - Dorso do pé\r\nDuikuntchi – Calcanhar'),(7,1,'3º GUB',7,'Faixa Azul Ponta Vermelha','A faixa azul ponta vermelha é a sétima do taekwondo, para que o aluno dê seqüência à próxima etapa, além de assimilar os conteúdos desta faixa para prestar o exame de graduação, deverá saber o conteúdo das faixas anteriores. \r\n\r\nOs conteúdos desta faixa estão divididos em 10 partes: \r\n\r\n01. POOM-SE – Movimento de faixa\r\n02. POOM-SE EXTRA – Movimento das faixas anteriores\r\n03. TCHAGUI – Chutes\r\n04. MATCHO KYORUGUI – Luta combinada\r\n05. STEP KYORUGUI – Combate de step\r\n06. JAIU KYORUGUI – Combate\r\n07. JAIU KYORUGUI EXTRA – Combate extra\r\n08. KYOK PA – Quebramento\r\n09. YUYON SUNG – Flexibilidade\r\n10. IRON – Teoria\r\n\r\n1. POOM-SE\r\nNome: TEGUK IUK JANG\r\nSignificado: Teguk Iuk Jang, simboliza o \"Kam\", um dos 8 sinais divinos, que representa a água, significando um continuo fluxo e suavidade. \r\n\r\nComposição: Esse poom-se consiste em alguns movimentos básicos apresentados nas graduações anteriores e em novas ações como: han sonnal pitrô maki, olgul bacat maki, are retchiô maki e batang son montong maki. Deve-se ter cuidado para fazer com que o pé do chute termine no ponto certo após o dolio tchagui, a palma da mão do batang son montong maki, deve ficar na altura do peito, no han sonnal pitrô maki virar bem o tronco para o lado oposto da perna da frente, sem levantar o calcanhar de trás. Os 31 movimentos devem ser executados em 19 contagens. \r\n\r\nTempo: O tempo de duração deste poom-se deverá ser de 32 segundos. \r\n\r\nAs crianças poderão apresentar este poom-se com contagem no dia do exame, de acordo com o bom senso do professor. \r\n\r\n2. POOM-SE EXTRA\r\nO aluno deverá executar um poom-se entre o teguk il jang e o teguk o jang de acordo com a escolha do mestre examinador. \r\n\r\n3. TCHAGUI – Chutes\r\nSão dez chutes nesta graduação, sendo que os 7 primeiros são no lugar e os 3 últimos caminhando, que deverão ser executados da seguinte forma: \r\n\r\nPreparo: O professor dará o seguinte comando “Tchagui, Jumbi”, e o aluno deverá recuar a perna direita com kihap (grito). \r\n\r\nDo 1º ao 7º chute, aguardar a contagem do professor para chutar alternando as pernas, ou seja, na primeira contagem o chute será com a perna direita e na segunda com a esquerda e assim sucessivamente. \r\n\r\nDo 8º ao 10º serão seqüenciais (ion-sok bal tchagui), iniciando com a perna direita atrás. \r\n\r\nTodos os chutes deverão ser executados com kihap. \r\n\r\n* Jejari - no lugar do 1º ao 7º chute. \r\n\r\n1 - AP BAL IOP TCHAGUI\r\nChute de lado com o pé da frente (levantar o joelho da perna da frente, flexionado e girando o pé de base e a cintura, simultaneamente, estenda a perna acertando com a “faca” do pé no alvo). \r\n\r\n2 - AP BAL TIGO TCHAGUI\r\nChute pisando com o pé da frente (levantar o joelho da perna da frente, flexionado e estender a perna aplicando uma pisada na altura do rosto). \r\n\r\n3 - AP BAL BACAT TCHAGUI\r\nChute circular para fora com o pé da frente (levantar a perna da frente fazendo um circulo de dentro para fora). \r\n\r\n4 - AP BAL DOLIO TCHAGUI\r\nChute diagonal na altura do rosto com a perna da frente (levantar o joelho da perna da frente flexionado gire o pé de base e a cintura, estenda a perna acertando com peito do pé na altura do rosto). \r\n\r\n5 – APURÔ TIMIO TUIT TCHAGUI\r\n(360º) Avance saltando com perna de trás (direita) para frente e gire um tuit tchagui - chute por trás (girar o corpo por trás e chutar “como um coice” a perna que soltará o golpe deverá passar rente ao outro joelho), com a perna esquerda. \r\n\r\n6 – APURÔ TIMIO MONDOLIO RURIO TCHAGUI \r\n(360º) Avance saltando com perna de trás (direita) para frente e gire um mondolio - chute girando por trás e puxando um gancho na altura do rosto. \r\n\r\n7 - MONDOLIO (fingimento), DOLGUE TCHAGUI\r\nFingir a aplicação de um mondolio (giratório), voltando a perna atrás e em seguida, efetuar um dolgue (gire pelas costas levando a perna de trás e aplique um ap tolho com a perna da frente). \r\n\r\n* Ion-sok – seqüência – do 8º ao 10º chute. \r\n\r\n8 - APURÔ ORUN BAL DASÔT-BON TCHAGUI\r\nAplicar 5 chutes caminhando com a perna direita, com ou sem step e salto. \r\n\r\n9 - APURÔ UEN BAL DASÔT-BON TCHAGUI\r\nAplicar 5 chutes caminhando com a perna esquerda, com ou sem step e salto. \r\n\r\n10 - APURÔ DASSÔT-BON BAL TIMIO TCHAGUI\r\nAplicar 5 chutes caminhando, com salto e step. \r\n\r\n4. MATCHO KYORUGUI – Luta combinada\r\nNesta graduação o matcho kyorugui exigido será Il-bo derion (luta combinada de um passo). \r\nO aluno deverá desenvolver as habilidades utilizando todas as técnicas das graduações anteriores (livre).\r\n\r\n5. STEP KYORUGUI – Combate de step\r\nCombate utilizando apenas steps - de 30” a 1’ e 30”. \r\nAmeaçar os chutes. \r\n\r\n6. JAIU KYORUGUI – Combate\r\nCombate de 30” a 2’. \r\n\r\n7. JAIU KYORUGUI EXTRA – Combate extra\r\n3 alunos (cada um por si) ou 1 contra 2\r\nDe 20” a 1’ de duração. \r\n\r\n8. KYOK PA – Quebramento\r\nNesta graduação a técnica utilizada será o timio iop tchagui. \r\n- Mulheres, crianças e 3ª idade – saltando sobre 3 a 5 pessoas ajoelhadas. \r\n- Adulto Masculino – saltando sobre 4 a 8 pessoas com as pernas esticadas e com o tronco inclinado para frente. \r\n\r\n9. YUYON SUNG – Flexibilidade\r\n\r\n10. IRON – Teoria\r\n\r\n1. TIPOS DE KYORUGUI\r\nMatcho kyorugui - Luta combinada\r\nSebun kyorugui - Luta combinada de 3 passos (sambo kyorugui) \r\nDubun kyorugui - Luta combinada de 2 passos (Ibo kyorugui ) \r\nHanbun kyorugui - Luta combinada de 1 passo ( Ilbo kyorugui ) \r\nJaiu kyorugui - Luta livre - combate	\r\nIaksok kyorugui - Luta combinada simulada – sombra\r\nSihap kyorugui - Luta de competição\r\nHogu kyorugui - Luta com protetores\r\nStep kyorugui - Luta de step\r\nHosin kyorugui - Luta de defesa pessoal\r\nAnja kyorugui - Luta sentada (ajoelhada) \r\nIl de I kyorugui - Luta de um contra dois\r\n\r\n2. PALAVRAS USADAS EM COMPETIÇÕES\r\nKyong ki jang - Área de competição\r\nSon su - Atleta \r\nTchong - Azul \r\nHong - Vermelho\r\nTche gub - Categoria \r\nThu tchom - Sorteio\r\nKyogki shigam - Duração do combate	\r\nSeung ja -Vencedor	\r\nDuk jom - Ponto ganho\r\nGam jom - Dedução de ponto	\r\nBohodê - Protetores	\r\nKyong-go - Advertência (meia falta) \r\nKam jom - Advertência (equivale a um ponto negativo)	\r\nKnock Down - Queda	\r\nKnock Out - Nocaute - K.O. \r\nJu-shim - Arbitro central \r\nBu-shim - Árbitro lateral	\r\nBe-shim - Juiz de mesa \r\nHo-gu - Protetor de tórax\r\nSafodê - Protetor genital \r\nUse - Superioridade'),(8,1,'2º GUB',8,'Faixa Vermelha','A faixa vermelha é a oitava do taekwondo, para que o aluno dê seqüência à próxima etapa, além de assimilar os conteúdos desta faixa para prestar o exame de graduação, deverá saber o conteúdo das faixas anteriores. \r\n\r\nEsta e a próxima faixa representam o sol, assim como o sol é responsável pela vida no universo, nesta fase o aluno torna-se responsável por todos em sua academia, torna-se assistente de instrutor (Jokyo nim). Seus conhecimentos adquiridos e aperfeiçoados representam uma parte da própria academia, portanto é uma fase de alerta sobre seus atos e comportamentos, o aluno tem que ter a consciência de suas técnicas e do poder que elas têm, e por isso, é fundamental que este saiba porque, como, quando e para que usá-las, tendo em vista sua grande responsabilidade. \r\n\r\nOs conteúdos desta faixa estão divididos em 10 partes: \r\n\r\n01. POOM-SE – Movimento de faixa\r\n02. POOM-SE EXTRA – Movimento das faixas anteriores\r\n03. TCHAGUI – Chutes\r\n04. MATCHO KYORUGUI – Luta combinada\r\n05. STEP KYORUGUI – Combate de step\r\n06. JAIU KYORUGUI – Combate\r\n07. JAIU KYORUGUI EXTRA – Combate extra\r\n08. KYOK PA – Quebramento\r\n09. YUYON SUNG – Flexibilidade\r\n10. IRON – Teoria\r\n\r\n1. POOM-SE\r\nNome: TEGUK TCHIL JANG\r\nSignificado: Teguk Tchil Jang simboliza o \"Kan\", um dos 8 sinais divinos, que representa a montanha, significando ponderação e firmeza. \r\n\r\nComposição: Esse poom-se consiste em alguns movimentos básicos apresentados nas graduações anteriores e em novas ações como: sonnal are maki, batang son gudurô montong maki, montong rethio maki, iop dirgui, murup tchigui, gauí maki, du jumok jetchio dirgui, otgorô are maki, ding jumok bacat tchigui e bo jumok. Uma conexão refinada de movimentos é importante para treinar esse poom-se. Os 33 movimentos devem ser executados em 25 contagens. \r\n\r\nTempo: O tempo de duração deste poom-se deverá ser de 32 segundos. \r\n\r\nAs crianças poderão apresentar este poom-se com contagem no dia do exame, de acordo com o bom senso do professor. \r\n\r\n2. POOM-SE EXTRA\r\nO aluno deverá executar um poom-se entre o teguk il jang e o teguk iuk jang de acordo com a escolha do mestre examinador. \r\n\r\n3. TCHAGUI – Chutes\r\nSão dez chutes nesta graduação, sendo que os 4 primeiros são no lugar e os 6 últimos serão na TAGUET (raquete), que deverão ser executados da seguinte forma: \r\n\r\nPreparo: O professor dará o seguinte comando “Tchagui, Jumbi”, e o aluno deverá recuar a perna direita com kihap (grito). \r\n\r\nDo 1º ao 4º chute, aguardar a contagem do professor para chutar alternando as pernas, ou seja, na primeira contagem o chute será com a perna direita e na segunda com a esquerda e assim sucessivamente. \r\n\r\nO 5º e 10º deverá formar uma fila, na ordem da formação do exame e cada aluno executará o chute individualmente na raquete após o comando do professor “Shijak”. \r\n\r\nTodos os chutes deverão ser executados com kihap. \r\n\r\n* Jejari - no lugar do 1º ao 4º chute. \r\n\r\n1 – AP DOLIO, IOP TCHAGUI \r\nChutar ap dolio (peito do pé na cintura), antes de colocar o pé no chão executar um iop tchagui (chute de lado) com o mesmo pé. \r\n\r\n2 - TIGÔ, IOP TCHAGUI\r\nChute pisando (levantar o joelho flexionado e estender a perna aplicando uma pisada na altura do rosto), antes de colocar o pé no chão executar um iop tchagui (chute de lado) com o mesmo pé. \r\n\r\n3 – AN, IOP TCHAGUI\r\nChute circular para dentro (levantar a perna fazendo um circulo de fora para dentro), antes de colocar o pé no chão executar um iop tchagui (chute de lado) com o mesmo pé. \r\n\r\n4 - DOLIO, IOP TCHAGUI\r\nChute diagonal na altura do rosto (levantar o joelho flexionado gire o pé de base e a cintura, estenda a perna acertando com peito do pé na altura do rosto), antes de colocar o pé no chão executar um iop tchagui (chute de lado) com o mesmo pé. \r\n\r\n* TAGUET (raquete demonstração) - 5º ao 10º chute. \r\n\r\n5 – TIMIO AP TCHAGUI\r\nChute frontal com salto (dar um salto levantando o joelho flexionado e estender a ponta do pé da frente na altura do queixo), também pode levantar uma perna saltando e chutar com a outra. \r\n\r\n6 – TIMIO DUBUN AP TCHAGUI \r\nDar um salto e aplicar dois chutes frontais na mesma altura. (revezando as pernas, 1º direita e depois esquerda), serão dois chutes no mesmo salto. \r\n\r\n7 - TIMIO SEBON AP TCHAGUI\r\nDar um salto e aplicar três chutes frontais na mesma altura. (revezando as pernas, 1º direita, depois esquerda e direita novamente), serão três chutes no mesmo salto. \r\n\r\n8 - TIMIO SEBON AP TCHAGO, TIGO TCHAGUI\r\nDar um salto e aplicar dois chutes frontais na mesma altura, um na altura do rosto e finalizando com um tigo tchagui. (1º direita, depois esquerda, direita e direita novamente), serão quatro chutes no mesmo salto. \r\n\r\n9 - TIMIO SSÃO BAL AP TCHAGUI\r\nDar um salto e aplicar dois chutes frontais com as penas separadas (uma perna para cada lado) ao mesmo tempo. \r\n\r\n10 - TIMIO DUBAL AP TCHAGUI\r\nCom os dois pés juntos aplicar um ap tchagui com salto. \r\n\r\n4. MATCHO KYORUGUI – Luta combinada\r\nNesta graduação o matcho kyorugui exigido será Il-bo derion (luta combinada de um passo). E de acordo com o mestre avaliador, poderá ser exigido também “andja kyorugui” – luta combinada ajoelhado. \r\n\r\nO aluno deverá desenvolver as habilidades utilizando técnicas livres, ou seja, poderão ser utilizadas todas aprendidas anteriormente e poderão ser desenvolvidas algumas técnicas pelo próprio aluno. \r\n\r\n5. STEP KYORUGUI – Combate de step\r\nCombate utilizando apenas steps - de 30” a 1’ e 30”. \r\nAmeaçar os chutes. \r\n\r\n6. JAIU KYORUGUI – Combate\r\nCombate de 30” a 2’. \r\n\r\n7. JAIU KYORUGUI EXTRA – Combate extra\r\n3 alunos (cada um por si) ou 1 contra 2\r\nDe 20” a 1’ de duração. \r\n\r\n8. KYOK PA – Quebramento\r\nNesta graduação a técnica utilizada será o timio mondolio rurio tchagui. \r\n\r\n9. YUYON SUNG – Flexibilidade\r\n\r\n10. IRON – Teoria\r\nNesta graduação, além de toda a teoria das faixas anteriores, poderá ser exigido um trabalho escrito de acordo com o professor responsável.'),(9,1,'1º GUB',9,'Faixa Vermelha Ponta Preta','A faixa vermelha com ponta preta é a nona do taekwondo, para que o aluno dê seqüência à próxima etapa, além de assimilar os conteúdos desta faixa para prestar o exame de graduação, deverá saber o conteúdo das faixas anteriores. \r\n\r\nOs conteúdos desta faixa estão divididos em 10 partes: \r\n\r\n01. POOM-SE – Movimento de faixa\r\n02. POOM-SE EXTRA – Movimento das faixas anteriores	\r\n03. TCHAGUI – Chutes\r\n04. MATCHO KYORUGUI – Luta combinada\r\n05. STEP KYORUGUI – Combate de step\r\n06. JAIU KYORUGUI – Combate\r\n07. JAIU KYORUGUI EXTRA – Combate extra\r\n08. KYOK PA – Quebramento\r\n09. YUYON SUNG – Flexibilidade\r\n10. IRON – Teoria\r\n\r\n1. POOM-SE\r\nNome: TEGUK PAL JANG\r\nSignificado: Teguk Pal Jang simboliza o \"Kon\", um dos 8 sinais divinos, que representa o \"yin\" e a Terra, significando a origem, a povoação e também o começo e o fim. \r\n\r\nComposição: Esse poom-se consiste em alguns movimentos básicos apresentados nas graduações anteriores e em novas ações como: goduro montong maki, eu santul maki, dangyo tuk tchigui e goduro are maki. Esse é o ultimo dos 8 Teguk, que poderá permitir ao aluno passar pelo exame de promoção para candidato a faixa preta e posteriormente ao 1º Dan (faixa preta). Os 38 movimentos devem ser executados em 27 contagens. \r\n\r\nTempo: O tempo de duração deste poom-se deverá ser de 37 segundos. \r\n\r\nAs crianças poderão apresentar este poom-se com contagem no dia do exame, de acordo com o bom senso do professor. \r\n\r\n2. POOM-SE EXTRA\r\nO aluno deverá executar um poom-se entre o teguk il jang e o teguk tchil jang de acordo com a escolha do mestre examinador. \r\n\r\n3. TCHAGUI – Chutes\r\nSão dez chutes nesta graduação, sendo que os 5 primeiros são no lugar e mais 5 na TAGUET (raquete), nesta graduação poderá ser exigido também chutes na raquete para competição. \r\n\r\nOs chutes deverão ser executados da seguinte forma: \r\n\r\nPreparo: O professor dará o seguinte comando “Tchagui, Jumbi”, e o aluno deverá recuar a perna direita com kihap (grito). \r\n\r\nDo 1º ao 5º chute, aguardar a contagem do professor para chutar alternando as pernas, ou seja, na primeira contagem o chute será com a perna direita e na segunda com a esquerda e assim sucessivamente. \r\n\r\nO 6º e 10º deverá formar uma fila, na ordem da formação do exame e cada aluno executará o chute individualmente na raquete após o comando do professor “Shijak”. \r\n\r\nTodos os chutes deverão ser executados com kihap. \r\n\r\n* Jejari - no lugar do 1º ao 5º chute. \r\n\r\n1 – SEBON OLGUL NARE TCHAGUI\r\nSerão três chutes, sendo dois ap dolio com salto (nare tchagui) e o terceiro no rosto. \r\n\r\n2 - TIMIO IOP TCHAGO E TIMIO TUIT TCHAGUI\r\nExecutar com salto um iop tchagui (chute de lado) e com a outra perna e no mesmo salto executar um tuit tchagui (chute por trás). \r\n\r\n3 – TIMIO AP BAL IOP TCHAGO TUIT TCHAGUI\r\nExecutar com salto um iop tchagui, com a perna da frente e com a outra perna (no mesmo salto) executar um tuit tchagui (chute por trás). \r\n\r\n4 - TIMIO AP BAL AP DOLIO TCHAGO TUIT TCHACUI\r\nExecutar com salto um ap dolio, com a perna da frente e com a outra perna (no mesmo salto) executar um tuit tchagui (chute por trás). \r\n\r\n5 – TIMIO AP BAL AP DOLIO TCHAGO MONDOLIO RURIO TCHAGUI\r\nExecutar com salto um ap dolio, com a perna da frente e com a outra perna (no mesmo salto) executar um mondolio (chute girando por trás e puxando um gancho na altura do rosto). \r\n\r\n* TAGUET (raquete demonstração) - 6º ao 10º chute. \r\n\r\n6 – TIMIO IOP TCHAGUI\r\nChute de lado com salto (levantar o joelho flexionado girando a cintura e saltando, simultaneamente, estenda a perna acertando com a “faca” do pé no alvo). \r\n\r\n7 - TIMIO SEBUN IOP TCHAGUI\r\nDar um salto e aplicar três chutes laterais (revezando as pernas, 1º direita, depois esquerda e direita novamente), serão três chutes no mesmo salto. \r\n\r\n8 - TIMIO GAUI TCHAGUI\r\nDar um salto e aplicar dois chutes simultaneamente (um pitro para esquerda e um iop para direita). \r\n\r\n9 - TIMIO MO-DUM BAL IOP TCHAGUI\r\nDar um salto e aplicar iop tchagui com os pés juntos no mesmo alvo. \r\n\r\n10 - TIMIO IOP TCHAGO JUNG KWON\r\nDar um salto e aplicar um iop para um lado direito e um soco para o esquerdo. \r\n\r\n* TAGUET (raquete competição) – 1 minuto\r\nUm professor ou auxiliar, deverá segurar duas raquetes, uma na altura da cintura e outra na altura do rosto e contar quantos chutes o aluno que está sendo avaliado chutará durante um minuto. \r\n\r\n4. MATCHO KYORUGUI – Luta combinada\r\nNesta graduação o matcho kyorugui exigido será Il-bo derion (luta combinada de um passo). E de acordo com o mestre avaliador, poderá ser exigido também “andja kyorugui” – luta combinada ajoelhado. \r\n\r\nO aluno deverá desenvolver as habilidades utilizando técnicas livres, ou seja, poderão ser utilizadas todas aprendidas anteriormente e poderão ser desenvolvidas algumas técnicas pelo próprio aluno. \r\n\r\n5. STEP KYORUGUI – Combate de step\r\nCombate utilizando apenas steps - de 30” a 1’ e 30”. \r\nAmeaçar os chutes. \r\n\r\n6. JAIU KYORUGUI – Combate\r\nCombate de 30” a 2’. \r\n\r\n7. JAIU KYORUGUI EXTRA – Combate extra\r\n3 alunos (cada um por si) ou 1 contra 2\r\nDe 30” a 1’ de duração. \r\n\r\n8. KYOK PA – Quebramento\r\nNesta graduação a técnica utilizada será o timio ssão bal ap tchagui. \r\n\r\n9. YUYON SUNG – Flexibilidade\r\n\r\n10. IRON – Teoria\r\nNesta graduação, além de toda a teoria das faixas anteriores, poderá ser exigido um trabalho escrito de acordo com o professor responsável.'),(10,1,' ',10,'Faixa Candidato à Preta','A faixa de candidato a preta é a décima do taekwondo, para que o aluno dê seqüência à próxima etapa, além de assimilar os conteúdos desta faixa para prestar o exame de graduação, deverá saber o conteúdo das faixas anteriores. \r\n\r\nOs conteúdos desta faixa estão divididos em 10 partes: \r\n\r\n01. POOM-SE – Movimento de faixa\r\n02. POOM-SE EXTRA (I e II) – 2 Movimentos das faixas anteriores\r\n03. TCHAGUI (I a VI) – Chutes\r\n04. KIBON DONGJAC – Movimentos básicos de ataque e defesa\r\n05. MATCHO KYORUGUI (I e II) – Luta combinada\r\n06. HOSIN KYORUGUI – Defesa pessoal contra pegadas\r\n07. STEP KYORUGUI – Combate de step\r\n08. JAIU KYORUGUI – Combate\r\n09. JAIU KYORUGUI EXTRA – Combate extra\r\n10. KYOK PA – Quebramento\r\n11. YUYON SUNG – Flexibilidade\r\n12. IRON – Teoria\r\n\r\n1. POOM-SE\r\nNome: TEGUK PAL JANG\r\nSignificado: Teguk Pal Jang simboliza o \"Kon\", um dos 8 sinais divinos, que representa o \"yin\" e a Terra, significando a origem, a povoação e também o começo e o fim. \r\n\r\nComposição: Esse poom-se consiste em alguns movimentos básicos apresentados nas graduações anteriores e em novas ações como: goduro montong maki, eu santul maki, dangyo tuk tchigui e goduro are maki. Esse é o ultimo dos 8 Teguk, que poderá permitir ao aluno passar pelo exame de promoção para candidato a faixa preta e posteriormente ao 1º Dan (faixa preta). Os 38 movimentos devem ser executados em 27 contagens. \r\n\r\nTempo: O tempo de duração deste poom-se deverá ser de 37 segundos. \r\n\r\nAs crianças poderão apresentar este poom-se com contagem no dia do exame, de acordo com o bom senso do professor. \r\n\r\n2. POOM-SE EXTRA\r\nO aluno deverá executar dois poom-ses entre o teguk il jang e o teguk tchil jang de acordo com a escolha do mestre examinador. \r\n\r\n3. TCHAGUI – Chutes\r\n1 – KIBON BAL TCHAGUI\r\nTodos os chutes básicos feitos no mesmo lugar. \r\n\r\n2 – ION-SOK BAL TCHAGUI\r\nChutes em seqüência – no lugar e caminhando. \r\n\r\n3 – GYUN HYONG BAL TCHAGUI\r\nProjeção dos chutes básicos - na finalização manter 10 segundos parado para teste de equilíbrio. \r\n\r\n4 - TAGUET TCHAGUI – I\r\nChutes de demonstração na raquete com salto. \r\n\r\n5 – JONG HWAK SUNG BAL TCHAGUI\r\nChute de precisão – poderá ser utilizado copos descartáveis como alvo. \r\n\r\n6 – TAGUET TCHAGUI – II\r\nChutes livres na raquete, acompanhados de velocidade e força. \r\n\r\n4. MATCHO KYORUGUI e ANDJA KYORUGUI – Luta combinada\r\nNesta graduação o matcho kyorugui exigido será Il-bo derion (luta combinada de um passo). \r\n\r\nSerá exigido também o andja kyorugui – luta combinada ajoelhado. \r\n\r\nO aluno deverá desenvolver as habilidades utilizando técnicas livres, ou seja, poderão ser utilizadas todas aprendidas anteriormente e poderão ser desenvolvidas algumas técnicas pelo próprio aluno. \r\n\r\n5. HOSIN KYORUGUI – Defesa pessoal contra pegadas\r\nO aluno deverá desenvolver técnicas contra pegadas. Terá que sair da pegada e aplicar uma finalização com kihap. \r\n\r\n6. STEP KYORUGUI – Combate de step\r\nCombate utilizando apenas steps - de 30” a 1’ e 30”. \r\nAmeaçar os chutes. \r\n\r\n7. JAIU KYORUGUI – Combate\r\nCombate de 30” a 2’. \r\n\r\n8. JAIU KYORUGUI EXTRA – Combate extra\r\n3 alunos (cada um por si) ou 1 contra 2\r\nDe 30” a 1’ de duração. \r\n\r\n9. KYOK PA – Quebramento\r\nNesta graduação a técnica utilizada será escolhida na hora pela bancada examinadora. \r\n\r\nAconselha-se treinar TIMIO SEBON AP TCHAGUI e mais uma técnica especial escolhida pelo aluno graduando. \r\n\r\n10. YUYON SUNG – Flexibilidade\r\n\r\n11. IRON – Teoria\r\n\r\nNesta graduação, além de toda a teoria das faixas anteriores o graduando deverá elaborar um trabalho escrito de acordo com as normas do órgão examinador competente. (Federação, Confederação ou Liga)\r\n\r\nOutros itens que serão avaliados separadamente nesta graduação. \r\nSI - Sison: visão\r\nSO - Sogui: base\r\nJA - Jasé: postura\r\nHI - Him: força\r\nYU - Yu-yon sung: flexibilidade\r\nKI - Kihap: Ki-hap\r\nGU - Guin-hyong: equilíbrio\r\nGI - Gigu-ryok: resistência\r\nYE - Ye-ui: disciplina\r\nTC - Tchamyo song: participação\r\nJI - Jip-jung-ryok: concentração\r\nU - Sunbal-ryok: impulsão / explosão\r\nJO - Jong rak song: precisão '),(11,1,'1º DAN',11,'Faixa Preta 1º Dan',NULL),(12,1,'2º DAN',12,'Faixa Preta 2º Dan',NULL),(13,1,'3º DAN',13,'Faixa Preta 3º Dan',NULL),(14,1,'4º DAN',14,'Faixa Preta 4º Dan',NULL);

/*Table structure for table `graduacao_federado` */

DROP TABLE IF EXISTS `graduacao_federado`;

CREATE TABLE `graduacao_federado` (
  `id_graduacao_federado` int(11) NOT NULL AUTO_INCREMENT,
  `id_modalidade` int(2) NOT NULL,
  `id_graduacao` varchar(7) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `id_federado` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `data_emissao` date NOT NULL,
  PRIMARY KEY (`id_graduacao_federado`),
  KEY `FK_federado_graduacao` (`id_federado`),
  CONSTRAINT `FK_federado_graduacao` FOREIGN KEY (`id_federado`) REFERENCES `federado` (`id_federado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `graduacao_federado` */

insert  into `graduacao_federado`(`id_graduacao_federado`,`id_modalidade`,`id_graduacao`,`id_federado`,`status`,`data_emissao`) values (1,1,'13',1,1,'1990-05-05'),(2,1,'1',6,1,'2013-01-01'),(3,1,'10',5,1,'1999-10-10'),(4,1,'11',3,1,'2000-01-10'),(5,1,'3',7,1,'1999-10-05'),(6,1,'9',8,1,'2013-04-29'),(7,1,'5',9,1,'2013-04-29');

/*Table structure for table `graduacao_participantes` */

DROP TABLE IF EXISTS `graduacao_participantes`;

CREATE TABLE `graduacao_participantes` (
  `id_evento` int(8) NOT NULL,
  `id_federado` int(11) NOT NULL,
  `id_faixa` int(11) DEFAULT NULL COMMENT 'faixa que está se candidatando\n',
  PRIMARY KEY (`id_evento`,`id_federado`),
  KEY `FK_participante` (`id_federado`),
  CONSTRAINT `FK_graduacao` FOREIGN KEY (`id_evento`) REFERENCES `evento_graduacao` (`id_evento`) ON UPDATE CASCADE,
  CONSTRAINT `FK_participante` FOREIGN KEY (`id_federado`) REFERENCES `federado` (`id_federado`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `graduacao_participantes` */

/*Table structure for table `instrutor` */

DROP TABLE IF EXISTS `instrutor`;

CREATE TABLE `instrutor` (
  `id_instrutor` int(11) NOT NULL AUTO_INCREMENT,
  `id_federado` int(11) NOT NULL,
  PRIMARY KEY (`id_instrutor`),
  KEY `FK_instrutor_federado` (`id_federado`),
  CONSTRAINT `FK_instrutor_federado` FOREIGN KEY (`id_federado`) REFERENCES `federado` (`id_federado`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Aqui contem a lista de todos os que são instrutores dentro d';

/*Data for the table `instrutor` */

insert  into `instrutor`(`id_instrutor`,`id_federado`) values (2,1),(1,3);

/*Table structure for table `instrutor_por_modalidade` */

DROP TABLE IF EXISTS `instrutor_por_modalidade`;

CREATE TABLE `instrutor_por_modalidade` (
  `id_instrutor_por_modalidade` int(11) NOT NULL AUTO_INCREMENT,
  `id_modalidade` int(11) NOT NULL,
  `id_instrutor` int(11) NOT NULL,
  `data_inicio` date DEFAULT NULL,
  PRIMARY KEY (`id_instrutor_por_modalidade`),
  KEY `fk_instrutor_por_modalidade_1` (`id_modalidade`),
  KEY `fk_instrutor_por_modalidade_2` (`id_instrutor`),
  CONSTRAINT `fk_instrutor_por_modalidade_1` FOREIGN KEY (`id_modalidade`) REFERENCES `modalidade` (`id_modalidade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_instrutor_por_modalidade_2` FOREIGN KEY (`id_instrutor`) REFERENCES `instrutor` (`id_instrutor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Aqui nessa tabela fica a lista com todos os instrutores de a';

/*Data for the table `instrutor_por_modalidade` */

insert  into `instrutor_por_modalidade`(`id_instrutor_por_modalidade`,`id_modalidade`,`id_instrutor`,`data_inicio`) values (1,1,1,'2013-05-08');

/*Table structure for table `item` */

DROP TABLE IF EXISTS `item`;

CREATE TABLE `item` (
  `id_item` int(2) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `id_modalidade` int(2) NOT NULL,
  PRIMARY KEY (`id_item`),
  KEY `FK_item_modalidade` (`id_modalidade`),
  CONSTRAINT `FK_item_modalidade` FOREIGN KEY (`id_modalidade`) REFERENCES `modalidade` (`id_modalidade`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `item` */

/*Table structure for table `itens_pedido` */

DROP TABLE IF EXISTS `itens_pedido`;

CREATE TABLE `itens_pedido` (
  `id_pedido` int(12) NOT NULL,
  `numero` int(3) NOT NULL,
  `id_item` int(2) NOT NULL,
  `tamanho` varchar(2) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `quantidade` int(3) NOT NULL,
  PRIMARY KEY (`id_pedido`,`numero`),
  KEY `FK_itens_pedido` (`id_item`),
  CONSTRAINT `FK_itens_pedido` FOREIGN KEY (`id_item`) REFERENCES `item` (`id_item`) ON UPDATE CASCADE,
  CONSTRAINT `FK_pedido` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `itens_pedido` */

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `senha` varchar(32) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `id_federado` int(11) NOT NULL,
  PRIMARY KEY (`id_login`),
  KEY `FK_login_federado` (`id_federado`),
  CONSTRAINT `FK_login_federado` FOREIGN KEY (`id_federado`) REFERENCES `federado` (`id_federado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `login` */

insert  into `login`(`id_login`,`login`,`senha`,`id_federado`) values (1,'administrador','1234',1),(3,'apaulo','pPRBUMewgO',6),(4,'apaula','ExBuOwUtWT',7),(5,'mfernanda','kBWkX5OUwr',8),(6,'csilveira','tpKGrPRXfv',9),(7,'iroberto','uURJ810mp1',3),(8,'cvalter','PDmcn289al',5);

/*Table structure for table `mala_direta` */

DROP TABLE IF EXISTS `mala_direta`;

CREATE TABLE `mala_direta` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `mensagem` mediumtext CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL COMMENT 'campo para armazenar a mensagem de mala-direta aos aniversariantes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `mala_direta` */

/*Table structure for table `matricula` */

DROP TABLE IF EXISTS `matricula`;

CREATE TABLE `matricula` (
  `id_federado` int(11) NOT NULL,
  `id_modalidade` int(2) NOT NULL,
  `id_filial` int(10) NOT NULL,
  `data_matricula` date NOT NULL COMMENT 'data da matricula para saber o tempo de prática',
  `matricula_filial` date NOT NULL COMMENT 'data de matricula na filial',
  PRIMARY KEY (`id_federado`,`id_modalidade`,`id_filial`),
  KEY `FK_matricula_modalidade` (`id_modalidade`),
  KEY `FK_matricula_filial` (`id_filial`),
  CONSTRAINT `FK_matricula_federado` FOREIGN KEY (`id_federado`) REFERENCES `federado` (`id_federado`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_matricula_filial` FOREIGN KEY (`id_filial`) REFERENCES `filial` (`id_filial`) ON UPDATE CASCADE,
  CONSTRAINT `FK_matricula_modalidade` FOREIGN KEY (`id_modalidade`) REFERENCES `modalidade` (`id_modalidade`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `matricula` */

insert  into `matricula`(`id_federado`,`id_modalidade`,`id_filial`,`data_matricula`,`matricula_filial`) values (1,1,0,'2013-04-30','2013-04-30'),(3,1,0,'2013-04-30','2013-04-30'),(5,1,0,'2013-04-30','2013-04-30'),(6,1,1,'2013-04-29','2013-04-29'),(7,1,1,'2013-04-29','2013-04-29'),(8,1,1,'2013-04-29','2013-04-29'),(9,1,1,'2013-04-29','2013-04-29');

/*Table structure for table `modalidade` */

DROP TABLE IF EXISTS `modalidade`;

CREATE TABLE `modalidade` (
  `id_modalidade` int(2) NOT NULL AUTO_INCREMENT,
  `nome` varchar(15) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `id_coordenador` int(11) NOT NULL,
  PRIMARY KEY (`id_modalidade`),
  KEY `FK_coordenador_modalidade` (`id_coordenador`),
  CONSTRAINT `FK_coordenador_modalidade` FOREIGN KEY (`id_coordenador`) REFERENCES `coordenador` (`id_coordenador`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `modalidade` */

insert  into `modalidade`(`id_modalidade`,`nome`,`id_coordenador`) values (1,'Taekwondo',1);

/*Table structure for table `movimento_faixa` */

DROP TABLE IF EXISTS `movimento_faixa`;

CREATE TABLE `movimento_faixa` (
  `id_movimento_faixa` int(11) NOT NULL AUTO_INCREMENT,
  `id_graduacao` int(11) DEFAULT NULL,
  `id_modalidade` int(11) DEFAULT NULL,
  `nome_movimento` varchar(45) DEFAULT NULL,
  `sigla` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id_movimento_faixa`),
  KEY `fk_movimento_faixa_1` (`id_modalidade`),
  KEY `fk_movimento_faixa_2` (`id_graduacao`),
  CONSTRAINT `fk_movimento_faixa_1` FOREIGN KEY (`id_modalidade`) REFERENCES `modalidade` (`id_modalidade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_movimento_faixa_2` FOREIGN KEY (`id_graduacao`) REFERENCES `graduacao` (`id_graduacao`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

/*Data for the table `movimento_faixa` */

insert  into `movimento_faixa`(`id_movimento_faixa`,`id_graduacao`,`id_modalidade`,`nome_movimento`,`sigla`) values (1,1,1,'POOM-SE – Movimento de faixa','PS'),(2,1,1,'TCHAGUI – Chutes','TG'),(3,1,1,'IRON – Teoria','IR'),(4,2,1,'POOM-SE – Movimento de faixa','PS'),(5,2,1,'TCHAGUI – Chutes','TG'),(6,2,1,'MATCHO KYORUGUI ','MK'),(7,2,1,'JAIU KYORUGUI – Combate','JK'),(8,2,1,'YUYON SUNG – Flexibilidade','YU'),(9,2,1,'IRON – Teoria','IR'),(10,3,1,'POOM-SE – Movimento de faixa','PS'),(11,3,1,'TCHAGUI – Chutes','TG'),(12,3,1,'MATCHO KYORUGUI – Luta combinada','Mk'),(13,3,1,'JAIU KYORUGUI – Combate','JK'),(14,3,1,'YUYON SUNG – Flexibilidade','YU'),(15,3,1,'IRON – Teoria','IR'),(16,4,1,'POOM-SE – Movimento de faixa	','PS'),(17,4,1,'TCHAGUI – Chutes','TG'),(18,4,1,'MATCHO KYORUGUI – Luta combinada','MK'),(19,4,1,'JAIU KYORUGUI – Combate','JK'),(20,4,1,'YUYON SUNG – Flexibilidade','YU'),(21,4,1,'IRON – Teoria','IR'),(22,5,1,'POOM-SE – Movimento de faixa	','PS'),(23,5,1,'TCHAGUI – Chutes','TG'),(24,5,1,'MATCHO KYORUGUI – Luta combinada','MK'),(25,5,1,'JAIU KYORUGUI – Combate','JK'),(26,5,1,'YUYON SUNG – Flexibilidade','YU'),(27,5,1,'IRON – Teoria','IR'),(28,6,1,'POOM-SE – Movimento de faixa','PS'),(29,6,1,'POOM-SE EXTRA – Movimento das faixas anterior','PE'),(30,6,1,'TCHAGUI – Chutes','TG'),(31,6,1,'MATCHO KYORUGUI – Luta combinada','MK'),(32,6,1,'STEP KYORUGUI – Combate de step','SK'),(33,6,1,'JAIU KYORUGUI – Combate','JK'),(34,6,1,'KYOK PA – Quebramento','KP'),(35,6,1,'YUYON SUNG – Flexibilidade','YU'),(36,6,1,'IRON – Teoria','IR'),(37,7,1,'POOM-SE – Movimento de faixa','PS'),(38,7,1,'POOM-SE EXTRA – Movimento das faixas anterior','PE'),(39,7,1,'TCHAGUI – Chutes','TG'),(40,7,1,'MATCHO KYORUGUI – Luta combinada','MK'),(41,7,1,'STEP KYORUGUI – Combate de step','SK'),(42,7,1,'JAIU KYORUGUI – Combate','JK'),(43,7,1,'JAIU KYORUGUI EXTRA – Combate extra','KE'),(44,7,1,'KYOK PA – Quebramento','KP'),(45,7,1,'YUYON SUNG – Flexibilidade','YU'),(46,7,1,'IRON – Teoria','IR'),(47,8,1,'POOM-SE – Movimento de faixa','PS'),(48,8,1,'POOM-SE EXTRA – Movimento das faixas anterior','PE'),(49,8,1,'TCHAGUI – Chutes','TG'),(50,8,1,'MATCHO KYORUGUI – Luta combinada','MK'),(51,8,1,'STEP KYORUGUI – Combate de step','SK'),(52,8,1,'JAIU KYORUGUI – Combate','JK'),(53,8,1,'JAIU KYORUGUI EXTRA – Combate extra','KE'),(54,8,1,'KYOK PA – Quebramento','KP'),(55,8,1,'YUYON SUNG – Flexibilidade','YU'),(56,8,1,'IRON – Teoria','IR'),(57,9,1,'POOM-SE – Movimento de faixa','PS'),(58,9,1,'POOM-SE EXTRA – Movimento das faixas anterior','PE'),(59,9,1,'TCHAGUI – Chutes','TG'),(60,9,1,'MATCHO KYORUGUI – Luta combinada','MK'),(61,9,1,'STEP KYORUGUI – Combate de step','SK'),(62,9,1,'JAIU KYORUGUI – Combate','JK'),(63,9,1,'JAIU KYORUGUI EXTRA – Combate extra','KE'),(64,9,1,'KYOK PA – Quebramento','KP'),(65,9,1,'YUYON SUNG – Flexibilidade','YU'),(66,9,1,'IRON – Teoria','IR');

/*Table structure for table `nacionalidade` */

DROP TABLE IF EXISTS `nacionalidade`;

CREATE TABLE `nacionalidade` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nacionalidade` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `nacionalidade` */

insert  into `nacionalidade`(`id`,`nacionalidade`) values (1,'Brasileiro');

/*Table structure for table `pedido` */

DROP TABLE IF EXISTS `pedido`;

CREATE TABLE `pedido` (
  `id_pedido` int(12) NOT NULL AUTO_INCREMENT,
  `data_pedido` date NOT NULL,
  `status` int(1) NOT NULL,
  `id_responsavel` int(11) NOT NULL,
  `fornecedor` int(3) NOT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `FK_pedido_fornecedor` (`fornecedor`),
  KEY `FK_pedido_coordenador_responsavel` (`id_responsavel`),
  KEY `FK_pedido_status_pedido` (`status`),
  CONSTRAINT `FK_pedido_coordenador_responsavel` FOREIGN KEY (`id_responsavel`) REFERENCES `coordenador` (`id_coordenador`) ON UPDATE CASCADE,
  CONSTRAINT `FK_pedido_fornecedor` FOREIGN KEY (`fornecedor`) REFERENCES `fornecedor` (`id_fornecedor`) ON UPDATE CASCADE,
  CONSTRAINT `FK_pedido_status_pedido` FOREIGN KEY (`status`) REFERENCES `status_pedido` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pedido` */

/*Table structure for table `pre_avaliacao` */

DROP TABLE IF EXISTS `pre_avaliacao`;

CREATE TABLE `pre_avaliacao` (
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
  KEY `fk_pre_avaliacao_4` (`id_filial`),
  CONSTRAINT `fk_pre_avaliacao_1` FOREIGN KEY (`id_evento`) REFERENCES `evento_graduacao` (`id_evento`) ON UPDATE NO ACTION,
  CONSTRAINT `fk_pre_avaliacao_2` FOREIGN KEY (`id_federado`) REFERENCES `federado` (`id_federado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pre_avaliacao_3` FOREIGN KEY (`id_status_avaliacao`) REFERENCES `status_avaliacao` (`id_status_avaliacao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pre_avaliacao_4` FOREIGN KEY (`id_filial`) REFERENCES `filial` (`id_filial`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `pre_avaliacao` */

insert  into `pre_avaliacao`(`id_pre_avaliacao`,`id_evento`,`id_federado`,`id_status_avaliacao`,`data_agendamento`,`id_filial`,`horario`) values (1,13,6,2,'2013-04-30',1,NULL),(2,13,7,2,'2013-04-30',1,NULL),(3,13,8,2,'2013-04-30',1,NULL),(4,13,9,2,'2013-04-30',1,NULL);

/*Table structure for table `prontuario` */

DROP TABLE IF EXISTS `prontuario`;

CREATE TABLE `prontuario` (
  `id_prontuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_federado` int(11) DEFAULT NULL,
  `id_evento` int(11) DEFAULT NULL,
  `ordem` int(11) DEFAULT NULL,
  `id_movimento_faixa` int(11) DEFAULT NULL,
  `nota` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_prontuario`),
  KEY `fk_prontuario_1` (`id_movimento_faixa`),
  KEY `fk_prontuario_2` (`ordem`),
  KEY `fk_prontuario_3` (`id_evento`),
  KEY `fk_prontuario_4` (`id_federado`),
  CONSTRAINT `fk_prontuario_1` FOREIGN KEY (`id_movimento_faixa`) REFERENCES `movimento_faixa` (`id_movimento_faixa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_prontuario_3` FOREIGN KEY (`id_evento`) REFERENCES `evento_graduacao` (`id_evento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_prontuario_4` FOREIGN KEY (`id_federado`) REFERENCES `federado` (`id_federado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `prontuario` */

/*Table structure for table `status_avaliacao` */

DROP TABLE IF EXISTS `status_avaliacao`;

CREATE TABLE `status_avaliacao` (
  `id_status_avaliacao` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_status_avaliacao`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `status_avaliacao` */

insert  into `status_avaliacao`(`id_status_avaliacao`,`descricao`) values (1,'Aprovado'),(2,'Reprovado'),(3,'Agendado'),(4,'Aguardando Agendamento');

/*Table structure for table `status_federado` */

DROP TABLE IF EXISTS `status_federado`;

CREATE TABLE `status_federado` (
  `id` int(1) NOT NULL,
  `status` varchar(10) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `status_federado` */

insert  into `status_federado`(`id`,`status`) values (1,'Ativo'),(2,'Inativo');

/*Table structure for table `status_pedido` */

DROP TABLE IF EXISTS `status_pedido`;

CREATE TABLE `status_pedido` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `status_pedido` */

/*Table structure for table `tipo_certificado` */

DROP TABLE IF EXISTS `tipo_certificado`;

CREATE TABLE `tipo_certificado` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tipo_certificado` */

/*Table structure for table `tipo_endereco` */

DROP TABLE IF EXISTS `tipo_endereco`;

CREATE TABLE `tipo_endereco` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `tipo_endereco` */

insert  into `tipo_endereco`(`id`,`descricao`) values (1,'Federado'),(2,'Filial'),(3,'Evento');

/*Table structure for table `tipo_federado` */

DROP TABLE IF EXISTS `tipo_federado`;

CREATE TABLE `tipo_federado` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(15) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `tipo_federado` */

insert  into `tipo_federado`(`id`,`tipo`) values (1,'Aluno'),(2,'Instrutor'),(3,'Coordenador'),(4,'Administrador');

/* Trigger structure for table `matricula` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `matricula_before_insert` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `matricula_before_insert` BEFORE INSERT ON `matricula` FOR EACH ROW BEGIN
	IF new.data_matricula = '0000-00-00' THEN
		SET NEW.data_matricula = NOW();
	END IF;
END */$$


DELIMITER ;

/* Trigger structure for table `pedido` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `pedido_before_insert` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `pedido_before_insert` BEFORE INSERT ON `pedido` FOR EACH ROW BEGIN
	if NEW.data_pedido = '0000-00-00' THEN
		SET NEW.data_pedido = NOW();
	END IF;
END */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
