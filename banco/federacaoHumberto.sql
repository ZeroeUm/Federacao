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
CREATE DATABASE /*!32312 IF NOT EXISTS*/`federacao` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci */;

USE `federacao`;

/*Table structure for table `certificado` */

DROP TABLE IF EXISTS `certificado`;

CREATE TABLE `certificado` (
  `numero_serie` bigint(20) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `data_emissao` date NOT NULL,
  `id_evento` varchar(7) COLLATE latin1_spanish_ci NOT NULL,
  `federado` bigint(20) NOT NULL,
  `tipo_certificado` int(5) NOT NULL,
  PRIMARY KEY (`numero_serie`),
  KEY `FK_tipo_certificado` (`tipo_certificado`),
  KEY `FK_certificado_federado` (`federado`),
  KEY `FK_evento_graduacao` (`id_evento`),
  CONSTRAINT `FK_evento_graduacao` FOREIGN KEY (`id_evento`) REFERENCES `evento_graduacao` (`id_evento`),
  CONSTRAINT `FK_certificado_federado` FOREIGN KEY (`federado`) REFERENCES `federado` (`registro`),
  CONSTRAINT `FK_tipo_certificado` FOREIGN KEY (`tipo_certificado`) REFERENCES `tipo_certificado` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `certificado` */

/*Table structure for table `endereco` */

DROP TABLE IF EXISTS `endereco`;

CREATE TABLE `endereco` (
  `registro` int(12) NOT NULL AUTO_INCREMENT,
  `logradouro` varchar(80) COLLATE latin1_spanish_ci NOT NULL,
  `numero` int(5) NOT NULL,
  `complemento` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `bairro` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `cidade` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `uf` varchar(2) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`registro`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `endereco` */

insert  into `endereco`(`registro`,`logradouro`,`numero`,`complemento`,`bairro`,`cidade`,`uf`) values (1,'Rua dos Bobos',0,'apto. 10','Bobolândia','São Paulo','SP'),(2,'Rua dos Bobos',0,'apto. 11','Bobolândia','São Paulo','SP');

/*Table structure for table `escolaridade` */

DROP TABLE IF EXISTS `escolaridade`;

CREATE TABLE `escolaridade` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `escolaridade` */

insert  into `escolaridade`(`id`,`descricao`) values (1,'Ensino Fundamental (1º ano ao 5º ano)'),(2,'Ensino Fundamental (1º ano ao 9º ano)'),(3,'Ensino Médio Incompleto'),(4,'Ensino Médio Completo'),(5,'Ensino Médio Técnico'),(6,'Ensino Técnico'),(7,'Ensino Superior Incompleto'),(8,'Ensino Superior Completo'),(9,'Bacharelado'),(10,'Pós-Graduação'),(11,'EJA');

/*Table structure for table `evento_graduacao` */

DROP TABLE IF EXISTS `evento_graduacao`;

CREATE TABLE `evento_graduacao` (
  `id_evento` varchar(7) COLLATE latin1_spanish_ci NOT NULL COMMENT '01/2012, 02/2012,03/2012,04/2012 - faixa preta,05/2012',
  `data_evento` date NOT NULL,
  `endereco` int(12) NOT NULL,
  `descricao` longtext COLLATE latin1_spanish_ci,
  PRIMARY KEY (`id_evento`),
  KEY `FK_evento_graduacao_endereco` (`endereco`),
  CONSTRAINT `FK_evento_graduacao_endereco` FOREIGN KEY (`endereco`) REFERENCES `endereco` (`registro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `evento_graduacao` */

/*Table structure for table `federado` */

DROP TABLE IF EXISTS `federado`;

CREATE TABLE `federado` (
  `registro` bigint(20) NOT NULL,
  `nome` varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `data_nasc` date NOT NULL,
  `rg` varchar(12) COLLATE latin1_spanish_ci NOT NULL,
  `telefone` varchar(13) COLLATE latin1_spanish_ci NOT NULL,
  `celular` varchar(14) COLLATE latin1_spanish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `escolaridade` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `endereco` int(12) NOT NULL,
  `nacionalidade` int(1) NOT NULL,
  PRIMARY KEY (`registro`),
  KEY `FK_endereco_federado` (`endereco`),
  KEY `FK_federado_escolaridade` (`escolaridade`),
  KEY `FK_federado` (`nacionalidade`),
  KEY `FK_status_federado` (`status`),
  CONSTRAINT `FK_status_federado` FOREIGN KEY (`status`) REFERENCES `status_federado` (`id`),
  CONSTRAINT `FK_endereco_federado` FOREIGN KEY (`endereco`) REFERENCES `endereco` (`registro`),
  CONSTRAINT `FK_federado` FOREIGN KEY (`nacionalidade`) REFERENCES `nacionalidade` (`id`),
  CONSTRAINT `FK_federado_escolaridade` FOREIGN KEY (`escolaridade`) REFERENCES `escolaridade` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `federado` */

insert  into `federado`(`registro`,`nome`,`data_nasc`,`rg`,`telefone`,`celular`,`email`,`escolaridade`,`status`,`endereco`,`nacionalidade`) values (1,'Coordenador de Taekwondo','0000-00-00','12.345.678-9','(11) 3456-789','(11) 98765-432','taekwondo@tkd.com',6,1,1,11),(2,'Coordenadora de Capoeira','0000-00-00','23.456.789-0','(11) 4567-890','(11) 90123-456','capoeira@cap.com.br',7,1,1,1),(3,'Coordenador de Judô','0000-00-00','11.222.333-4','(11) 5544-332','(11) 99999-999','judo@jud.com',10,1,2,13),(4,'Coordenador de MMA','0000-00-00','56.789.012-3','(11) 4455-667','(11) 9666-6666','mma@mma.com',5,0,2,15),(5,'Coordenadora de Hapkido','0000-00-00','98.765.432-1','(11) 5544-332','(11) 9333-3333','hapkido@hpk',11,1,2,12),(6,'Coordenador de Krav Maga','0000-00-00','84.129.123-9','(11) 2312-234','(11) 9123-1232','kravmaga@krm.com',8,1,1,23);

/*Table structure for table `filial` */

DROP TABLE IF EXISTS `filial`;

CREATE TABLE `filial` (
  `idFilial` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `cnpj` varchar(19) COLLATE latin1_spanish_ci NOT NULL,
  `telefone` varchar(13) COLLATE latin1_spanish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `modalidade` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `instrutor` bigint(20) NOT NULL,
  `endereco` int(12) NOT NULL,
  PRIMARY KEY (`idFilial`),
  KEY `FK_filial_endereco` (`endereco`),
  KEY `FK_filial_modalidade` (`modalidade`),
  KEY `FK_filial_instrutor` (`instrutor`),
  CONSTRAINT `FK_filial_instrutor` FOREIGN KEY (`instrutor`) REFERENCES `federado` (`registro`),
  CONSTRAINT `FK_filial_endereco` FOREIGN KEY (`endereco`) REFERENCES `endereco` (`registro`),
  CONSTRAINT `FK_filial_modalidade` FOREIGN KEY (`modalidade`) REFERENCES `modalidade` (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `filial` */

/*Table structure for table `fornecedor` */

DROP TABLE IF EXISTS `fornecedor`;

CREATE TABLE `fornecedor` (
  `idFornecedor` int(3) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `telefone` varchar(13) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`idFornecedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `fornecedor` */

/*Table structure for table `graduacao` */

DROP TABLE IF EXISTS `graduacao`;

CREATE TABLE `graduacao` (
  `faixa` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `grau` varchar(7) COLLATE latin1_spanish_ci NOT NULL,
  `modalidade` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`grau`,`modalidade`),
  KEY `FK_graduacao` (`modalidade`),
  CONSTRAINT `FK_graduacao` FOREIGN KEY (`modalidade`) REFERENCES `modalidade` (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `graduacao` */

insert  into `graduacao`(`faixa`,`grau`,`modalidade`) values ('Candidato à preta','-------','Taekwondo'),('Preta','10º Dan','Taekwondo'),('Branca','10º Gub','Taekwondo'),('Preta','1º Dan','Taekwondo'),('Vermelha ponta preta','1º Gub','Taekwondo'),('Preta','2º Dan','Taekwondo'),('Vermelha','2º Gub','Taekwondo'),('Preta','3º Dan','Taekwondo'),('Azul ponta vermelha','3º Gub','Taekwondo'),('Preta','4º Dan','Taekwondo'),('Azul','4º Gub ','Taekwondo'),('Preta','5º Dan','Taekwondo'),('Verde ponta azul','5º Gub','Taekwondo'),('Preta','6º Dan','Taekwondo'),('Verde','6º Gub','Taekwondo'),('Preta','7º Dan','Taekwondo'),('Amarela ponta verde','7º Gub','Taekwondo'),('Preta','8º Dan','Taekwondo'),('Amarela','8º Gub','Taekwondo'),('Preta','9º Dan','Taekwondo');

/*Table structure for table `graduacao_federado` */

DROP TABLE IF EXISTS `graduacao_federado`;

CREATE TABLE `graduacao_federado` (
  `federado` bigint(20) NOT NULL,
  `grau` varchar(7) COLLATE latin1_spanish_ci NOT NULL,
  `modalidade` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `status` int(1) NOT NULL,
  `data_emissao` date NOT NULL,
  PRIMARY KEY (`federado`,`grau`,`modalidade`),
  KEY `FK_graduacao_federado` (`grau`,`modalidade`),
  CONSTRAINT `FK_graduacao_federado` FOREIGN KEY (`grau`, `modalidade`) REFERENCES `graduacao` (`grau`, `modalidade`),
  CONSTRAINT `FK_registro_federado` FOREIGN KEY (`federado`) REFERENCES `federado` (`registro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `graduacao_federado` */

/*Table structure for table `graduacao_participantes` */

DROP TABLE IF EXISTS `graduacao_participantes`;

CREATE TABLE `graduacao_participantes` (
  `id_evento` varchar(7) COLLATE latin1_spanish_ci NOT NULL,
  `registro_federado` bigint(20) NOT NULL,
  PRIMARY KEY (`id_evento`,`registro_federado`),
  KEY `FK_participante` (`registro_federado`),
  CONSTRAINT `FK_evento` FOREIGN KEY (`id_evento`) REFERENCES `evento_graduacao` (`id_evento`),
  CONSTRAINT `FK_participante` FOREIGN KEY (`registro_federado`) REFERENCES `federado` (`registro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `graduacao_participantes` */

/*Table structure for table `item` */

DROP TABLE IF EXISTS `item`;

CREATE TABLE `item` (
  `id_item` int(2) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `modalidade` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_item`),
  KEY `FK_item_modalidade` (`modalidade`),
  CONSTRAINT `FK_item_modalidade` FOREIGN KEY (`modalidade`) REFERENCES `modalidade` (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `item` */

/*Table structure for table `itens_pedido` */

DROP TABLE IF EXISTS `itens_pedido`;

CREATE TABLE `itens_pedido` (
  `id_pedido` int(12) NOT NULL,
  `id_item` int(2) NOT NULL,
  `tamanho` varchar(2) COLLATE latin1_spanish_ci NOT NULL,
  `quantidade` int(3) NOT NULL,
  PRIMARY KEY (`id_pedido`,`id_item`),
  KEY `FK_itens_pedido` (`id_item`),
  CONSTRAINT `FK_itens_pedido` FOREIGN KEY (`id_item`) REFERENCES `item` (`id_item`),
  CONSTRAINT `FK_pedido` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `itens_pedido` */

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `registro` bigint(20) NOT NULL,
  `login` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `senha` varchar(32) COLLATE latin1_spanish_ci NOT NULL,
  `nivel_acesso` int(1) NOT NULL,
  PRIMARY KEY (`registro`),
  KEY `FK_nivel_acesso` (`nivel_acesso`),
  CONSTRAINT `FK_login` FOREIGN KEY (`registro`) REFERENCES `federado` (`registro`),
  CONSTRAINT `FK_nivel_acesso` FOREIGN KEY (`nivel_acesso`) REFERENCES `tipo_federado` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `login` */

/*Table structure for table `matricula` */

DROP TABLE IF EXISTS `matricula`;

CREATE TABLE `matricula` (
  `federado` bigint(20) NOT NULL,
  `modalidade` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `id_filial` int(10) NOT NULL,
  PRIMARY KEY (`federado`,`modalidade`,`id_filial`),
  KEY `FK_matricula_modalidade` (`modalidade`),
  KEY `FK_matricula_filial` (`id_filial`),
  CONSTRAINT `FK_matricula_federado` FOREIGN KEY (`federado`) REFERENCES `federado` (`registro`),
  CONSTRAINT `FK_matricula_filial` FOREIGN KEY (`id_filial`) REFERENCES `filial` (`idFilial`),
  CONSTRAINT `FK_matricula_modalidade` FOREIGN KEY (`modalidade`) REFERENCES `modalidade` (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `matricula` */

/*Table structure for table `modalidade` */

DROP TABLE IF EXISTS `modalidade`;

CREATE TABLE `modalidade` (
  `nome` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `responsavel` bigint(20) NOT NULL,
  PRIMARY KEY (`nome`),
  KEY `FK_coordenador_modalidade` (`responsavel`),
  CONSTRAINT `FK_coordenador_modalidade` FOREIGN KEY (`responsavel`) REFERENCES `federado` (`registro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `modalidade` */

insert  into `modalidade`(`nome`,`responsavel`) values ('Taekwondo',1),('Capoeira',2),('Judô',3),('MMA',4),('Hapkido',5),('Krav Magá',6);

/*Table structure for table `nacionalidade` */

DROP TABLE IF EXISTS `nacionalidade`;

CREATE TABLE `nacionalidade` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nacionalidade` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `nacionalidade` */

insert  into `nacionalidade`(`id`,`nacionalidade`) values (1,'Brasileiro'),(2,'Argentino'),(3,'Chileno'),(4,'Uruguaio'),(5,'Paraguaio'),(6,'Equatoriano'),(7,'Peruano'),(8,'Boliviano'),(9,'Venezuelano'),(10,'Colombiano'),(11,'Sul-coreano'),(12,'Norte-coreano'),(13,'Japonês'),(14,'Chinês'),(15,'Norte-Americano'),(16,'Mexicano'),(17,'Canadense'),(18,'Tailandês'),(19,'Português'),(20,'Espanhol'),(21,'Francês'),(22,'Inglês'),(23,'Israelita'),(24,'Indiano'),(25,'Russo'),(26,'Escocês'),(27,'Galês'),(28,'Irlandês'),(29,'Australiano'),(30,'Cingapurenho'),(31,'Malaio'),(32,'Hondurenho'),(33,'Haitiano');

/*Table structure for table `pedido` */

DROP TABLE IF EXISTS `pedido`;

CREATE TABLE `pedido` (
  `id_pedido` int(12) NOT NULL AUTO_INCREMENT,
  `data_pedido` date NOT NULL,
  `status` int(1) NOT NULL,
  `responsavel` bigint(20) NOT NULL,
  `fornecedor` int(3) NOT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `FK_fornecedor` (`fornecedor`),
  KEY `FK_coordenador_responsavel` (`responsavel`),
  KEY `FK_status_pedido` (`status`),
  CONSTRAINT `FK_status_pedido` FOREIGN KEY (`status`) REFERENCES `status_pedido` (`id`),
  CONSTRAINT `FK_coordenador_responsavel` FOREIGN KEY (`responsavel`) REFERENCES `federado` (`registro`),
  CONSTRAINT `FK_fornecedor` FOREIGN KEY (`fornecedor`) REFERENCES `fornecedor` (`idFornecedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `pedido` */

/*Table structure for table `prontuario` */

DROP TABLE IF EXISTS `prontuario`;

CREATE TABLE `prontuario` (
  `registro_federado` bigint(20) NOT NULL,
  `id_evento` varchar(7) COLLATE latin1_spanish_ci NOT NULL,
  `arquivo` varchar(35) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`registro_federado`,`id_evento`),
  KEY `FK_prontuario_evento` (`id_evento`),
  CONSTRAINT `FK_prontuario_evento` FOREIGN KEY (`id_evento`) REFERENCES `evento_graduacao` (`id_evento`),
  CONSTRAINT `FK_prontuario_federado` FOREIGN KEY (`registro_federado`) REFERENCES `federado` (`registro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `prontuario` */

/*Table structure for table `status_federado` */

DROP TABLE IF EXISTS `status_federado`;

CREATE TABLE `status_federado` (
  `id` int(1) NOT NULL,
  `status` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `status_federado` */

insert  into `status_federado`(`id`,`status`) values (0,'Inativo'),(1,'Ativo');

/*Table structure for table `status_pedido` */

DROP TABLE IF EXISTS `status_pedido`;

CREATE TABLE `status_pedido` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `status_pedido` */

insert  into `status_pedido`(`id`,`descricao`) values (0,'Finalizado'),(1,'Em espera'),(2,'Cancelado');

/*Table structure for table `tipo_certificado` */

DROP TABLE IF EXISTS `tipo_certificado`;

CREATE TABLE `tipo_certificado` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `tipo_certificado` */

/*Table structure for table `tipo_federado` */

DROP TABLE IF EXISTS `tipo_federado`;

CREATE TABLE `tipo_federado` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `tipo_federado` */

insert  into `tipo_federado`(`id`,`tipo`) values (1,'Aluno'),(2,'Instrutor'),(3,'Coordenador'),(4,'Administrador');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
