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

insert  into `federado`(`id_federado`,`nome`,`filiacao_materna`,`filiacao_paterna`,`sexo`,`data_nasc`,`rg`,`telefone`,`celular`,`email`,`caminho_imagem`,`id_escolaridade`,`id_status`,`id_endereco`,`id_nacionalidade`,`id_tipo_federado`,`tamanho_faixa`) values (1,'Administrador Mestre Carlos','Não Declarada','Não declarada','M','1980-04-05','52.444.111-1','(11)1111-2222','(11)3333-4444','mail@mail.com','',6,1,1,1,4,'G'),(3,'Instrutor Roberto','Não declarado','Não declarado','M','1980-11-01','52.222.111-1','(00)0000-0000','(00)0000-0000','mail@mail.com','sem foto',6,1,2,1,2,'G'),(5,'Coordenador Valter','Não Declarado','Não Declarado','M','2000-01-01','58.222.222-1','(00)0000-0000','(00)0000-0000','mail@mail.com','sem foto',6,1,2,1,3,'G'),(6,'Aluno joão paulo','não declarado','não declarado','M','1985-04-30','55.444.444-5','(11)2222-2222','(11)96666-6666','mail@mail.com','sem foto',4,1,3,1,1,'M'),(7,'Aluna maria de Paula','não declarado','não declarado','F','1999-04-09','22.222.222-2','(11)2222-2222','(11)90494-3904','mail.com@mna.com.br','sem foto',6,1,4,1,1,'M'),(8,'Maria Fernanda','não declarado','não declarado','M','1985-05-31','55.444.444-5','(11)1111-1111','(11)99999-9999','email.re@email.com','sem foto',4,1,23,1,1,'M'),(9,'Caetano silveira','Não declarado','não declarado','M','1969-12-31','88.888.888-8','(22)2222-2222','(99)99999-9999','mail@mail.com','sem foto',6,1,24,1,1,'GG'),(10,'Paula Fernandes','não declarado','não declarado','F','1985-04-30','22.222.222-2','(11)2222-2222','(11)96666-6666','mail@mail.com','sem foto',6,1,25,1,1,'G');

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
  PRIMARY KEY (`id_graduacao`),
  KEY `FK_graduacao_modalidade` (`id_modalidade`),
  CONSTRAINT `FK_graduacao_modalidade` FOREIGN KEY (`id_modalidade`) REFERENCES `modalidade` (`id_modalidade`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `graduacao` */

insert  into `graduacao`(`id_graduacao`,`id_modalidade`,`grau`,`ordem`,`faixa`) values (1,1,'10º GUB',1,'Faixa Branca'),(2,1,'8º GUB',2,'Faixa Amarela'),(3,1,'7º GUB',3,'Faixa Ponta Amarela Verde'),(4,1,'6º GUB',4,'Faixa Verde'),(5,1,'5º GUB',5,'Faixa Ponta Verde Azul'),(6,1,'4º GUB',6,'Faixa Azul'),(7,1,'3º GUB',7,'Faixa Ponta Azul Vermelha'),(8,1,'2º GUB',8,'Faixa Vermelha'),(9,1,'1º GUB',9,'Faixa Vermelha Ponta Preta'),(10,1,' ',10,'Candidato à Preta'),(11,1,'1º DAN',11,'Faixa Preta 1º DAN'),(12,1,'2º DAN',12,'Faixa Preta 2º DAN'),(13,1,'3º DAN',13,'Faixa Preta 3º DAN'),(14,1,'4º DAN',14,'Faixa Preta 4º DAN');

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

insert  into `pre_avaliacao`(`id_pre_avaliacao`,`id_evento`,`id_federado`,`id_status_avaliacao`,`data_agendamento`,`id_filial`) values (1,13,6,2,'2013-04-30',1),(2,13,7,2,'2013-04-30',1),(3,13,8,2,'2013-04-30',1),(4,13,9,2,'2013-04-30',1);

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
