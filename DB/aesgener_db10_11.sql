/*
SQLyog Ultimate v9.63 
MySQL - 5.6.17 : Database - aesgener_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`aesgener_db` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;

USE `aesgener_db`;

/*Table structure for table `comentario` */

DROP TABLE IF EXISTS `comentario`;

CREATE TABLE `comentario` (
  `idComentario` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` text NOT NULL,
  `fecha` date NOT NULL,
  `idEmpleado` int(11) NOT NULL,
  `idValores` int(11) NOT NULL,
  PRIMARY KEY (`idComentario`),
  KEY `idEmpleado` (`idEmpleado`),
  KEY `idMaquina` (`idValores`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `comentario` */

/*Table structure for table `complejo` */

DROP TABLE IF EXISTS `complejo`;

CREATE TABLE `complejo` (
  `idComplejo` int(11) NOT NULL AUTO_INCREMENT,
  `nombreComplejo` varchar(45) NOT NULL,
  `idUbicacion` int(11) NOT NULL,
  PRIMARY KEY (`idComplejo`),
  KEY `idUbicacion` (`idUbicacion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `complejo` */

insert  into `complejo`(`idComplejo`,`nombreComplejo`,`idUbicacion`) values (1,'Complejo Norte',0),(2,'Complejo Centro',0),(3,'Complejo Guacolda',0);

/*Table structure for table `configuracion` */

DROP TABLE IF EXISTS `configuracion`;

CREATE TABLE `configuracion` (
  `idConfiguracion` int(11) NOT NULL AUTO_INCREMENT,
  `nombreConfig` varchar(45) NOT NULL,
  `fechaI` date NOT NULL,
  `fechaF` date NOT NULL,
  `vigente` tinyint(1) NOT NULL,
  PRIMARY KEY (`idConfiguracion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `configuracion` */

/*Table structure for table `division` */

DROP TABLE IF EXISTS `division`;

CREATE TABLE `division` (
  `idDivision` int(11) NOT NULL AUTO_INCREMENT,
  `nombreDivision` varchar(45) NOT NULL,
  `idComplejo` int(11) NOT NULL,
  `idUbicacion` int(11) NOT NULL,
  PRIMARY KEY (`idDivision`),
  KEY `idComplejo` (`idComplejo`),
  KEY `idUbicacion` (`idUbicacion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `division` */

insert  into `division`(`idDivision`,`nombreDivision`,`idComplejo`,`idUbicacion`) values (1,'Division Ventanas',2,0),(2,'Division Cordillera',2,0),(3,'Division Renca',2,0);

/*Table structure for table `empleado` */

DROP TABLE IF EXISTS `empleado`;

CREATE TABLE `empleado` (
  `idEmpleado` int(11) NOT NULL AUTO_INCREMENT,
  `nombreE` varchar(100) NOT NULL,
  `apellidoE` varchar(100) NOT NULL,
  `nroLegajo` int(45) NOT NULL,
  `convenio` varchar(100) NOT NULL,
  `rut` int(11) NOT NULL,
  `telefono` int(11) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL,
  `idTipoEmpleado` int(11) NOT NULL,
  `idReferente` int(11) NOT NULL,
  PRIMARY KEY (`idEmpleado`),
  KEY `idTipoEmpleado` (`idTipoEmpleado`),
  KEY `idTipoEmpleado_2` (`idTipoEmpleado`),
  KEY `idReferente` (`idReferente`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

/*Data for the table `empleado` */

insert  into `empleado`(`idEmpleado`,`nombreE`,`apellidoE`,`nroLegajo`,`convenio`,`rut`,`telefono`,`direccion`,`email`,`activo`,`idTipoEmpleado`,`idReferente`) values (1,'Marcelo','Contreras',12894,'Contratado',29806389,4567823,'Anchorena 284','marceloc@hotmail.com',1,1,0),(2,'Aldana','Baeza',27902,'Contratado',32085237,4983256,'Azcuenaga 188','aldanatb@hotmail.com',1,1,0),(3,'Usuario','OSEP',11111,'Planta Permanente',22222222,3333333,'Direccion','usuario@email.com',1,1,0),(4,'Adriana ','Sosa',1944,'Planta Permanente',20304586,NULL,NULL,NULL,1,5,43),(5,'Alex','Leyton',8358,'Planta Permanente',18857073,NULL,NULL,NULL,1,4,5),(6,'Ana Clara','García',4200,'Planta Permanente',27790845,NULL,NULL,NULL,1,5,54),(7,'Ana Fernanda','Montes',6642,'Planta Permanente',23949274,NULL,NULL,NULL,1,5,65),(8,'Belen','Saavedra ',5629,'Planta Permanente',24705155,NULL,NULL,NULL,1,5,65),(9,'Carina','Lucero',4027,'Planta Permanente',22170496,NULL,NULL,NULL,1,5,28),(10,'Carla','Grinberg',3800,'Planta Permanente',29224605,NULL,NULL,NULL,0,5,0),(11,'Carlos Marcelo','Llampa',6526,'Planta Permanente',22186040,NULL,NULL,NULL,0,5,0),(12,'Carolina','Alvarado',7975,'Planta Permanente',25309024,NULL,NULL,NULL,1,5,56),(13,'Cecilia','Gaset ',6188,'Planta Permanente',28668878,NULL,NULL,NULL,1,5,0),(14,'Daniel','Pizarro',8265,'Planta Permanente',16020354,NULL,NULL,NULL,1,5,65),(15,'Darío','Saromé',4229,'Planta Permanente',21377566,NULL,NULL,NULL,1,5,17),(16,'Diana','Cisella',913,'Planta Permanente',17513893,NULL,NULL,NULL,0,5,0),(17,'Diana','López',4778,'Planta Permanente',25259878,NULL,NULL,NULL,1,4,17),(18,'Elisa','Concina ',4575,'Planta Permanente',27612322,NULL,NULL,NULL,1,5,28),(19,'Fernanda','Britos ',6643,'Planta Permanente',34763471,NULL,NULL,NULL,0,5,0),(20,'Gustavo','Galetto ',7424,'Planta Permanente',24006953,NULL,NULL,NULL,1,5,65),(21,'Jessica','Espalla',7118,'Planta Permanente',31214144,NULL,NULL,NULL,1,5,54),(22,'Jimena','Del Barrio',7830,'Planta Permanente',32192583,NULL,NULL,NULL,1,2,0),(23,'Jonathan','Sixto',7194,'Planta Permanente',31517456,NULL,NULL,NULL,0,5,0),(24,'Jorge','Baroni',5651,'Planta Permanente',25090908,NULL,NULL,NULL,1,5,56),(25,'Leticia','Araya ',1855,'Planta Permanente',20181466,NULL,NULL,NULL,1,2,0),(26,'Jorge','Guajardo',1957,'Planta Permanente',14696947,NULL,NULL,NULL,0,5,0),(28,'Laura','Carmona',3233,'Planta Permanente',14736621,NULL,NULL,NULL,1,4,28),(30,'Leticia','Llul',5187,'Planta Permanente',29563342,NULL,NULL,NULL,1,5,43),(31,'Lorena','Giménez',4101,'Planta Permanente',29226074,NULL,NULL,NULL,0,5,0),(32,'Luis','Riolobos',3177,'Planta Permanente',11177191,NULL,NULL,NULL,1,5,34),(33,'Marcela','Illesca',4590,'Planta Permanente',26935470,NULL,NULL,NULL,1,5,28),(34,'Marcela','Méndez',5774,'Planta Permanente',20525232,NULL,NULL,NULL,1,2,0),(35,'Marcos','Ortega ',8223,'Planta Permanente',26677902,NULL,NULL,NULL,0,5,0),(36,'Margarita','Perez ',3682,'Planta Permanente',23966211,NULL,NULL,NULL,1,5,65),(37,'María Antonia','Cirrincione',4393,'Planta Permanente',29821425,NULL,NULL,NULL,1,5,43),(38,'Maricel','Gomez',951,'Planta Permanente',17021816,NULL,NULL,NULL,0,5,0),(39,'Mariela','Araguna',4495,'Planta Permanente',25415644,NULL,NULL,NULL,1,5,43),(40,'Mario','Cabezas',1911,'Planta Permanente',20753475,NULL,NULL,NULL,1,5,56),(42,'Matías','Marchiori',5051,'Planta Permanente',27739362,NULL,NULL,NULL,1,5,17),(43,'Mauricio','Farías',3643,'Planta Permanente',25585014,NULL,NULL,NULL,1,4,0),(44,'Mauro','Morosini',6329,'Planta Permanente',29935053,NULL,NULL,NULL,1,5,5),(45,'Nancy','Maldonado',637,'Planta Permanente',16241186,NULL,NULL,NULL,1,5,34),(47,'Noemí','Alonso',5753,'Planta Permanente',17987425,NULL,NULL,NULL,1,5,28),(50,'Rodrigo','López',4350,'Planta Permanente',26557756,NULL,NULL,NULL,1,5,43),(52,'Rosana','Gimenez',5901,'Planta Permanente',29105437,NULL,NULL,NULL,1,5,65),(53,'Roxana Fabiana','Palma',6517,'Planta Permanente',22120073,NULL,NULL,NULL,0,5,0),(54,'Silvana','Ponce',3714,'Planta Permanente',25194725,NULL,NULL,NULL,1,4,54),(55,'Teodora','Taca',1875,'Planta Permanente',18808738,NULL,NULL,NULL,1,5,34),(56,'Victor','Araujo',8079,'Planta Permanente',28819421,NULL,NULL,NULL,1,4,56),(57,'Violeta','Mayorga',6968,'Planta Permanente',24634331,NULL,NULL,NULL,1,5,56),(58,'Virginia','Cecchini',3415,'Planta Permanente',28401142,NULL,NULL,NULL,1,2,0),(59,'Cecilia','Silva',3305,'Planta Permanente',25034746,NULL,NULL,NULL,1,2,0),(60,'Federico','Llosa',3461,'Planta Permanente',22140612,NULL,NULL,NULL,1,2,0),(61,'Magdalena','Moscardo',4960,'Planta Permanente',30051636,NULL,NULL,NULL,1,5,17),(62,'Fernanda','Suarez',0,'Planta Permanente',31949821,NULL,NULL,NULL,0,5,34),(63,'Raquel','Barroso',0,'Planta Permanente',26296533,NULL,NULL,NULL,0,5,34),(64,'Marisa','Canillas',0,'Planta Permanente',24279076,NULL,NULL,NULL,0,5,34),(65,'Susana','Luna',6277,'Planta Permanente',17641838,NULL,NULL,NULL,1,4,65),(66,'Cecilia','Molina',3078,'Planta Permanente',17390353,NULL,NULL,NULL,1,2,0),(67,'Claudia','Gonzalez Mendoza',953,'Planta Permanente',20896530,NULL,NULL,NULL,1,2,0);

/*Table structure for table `kpi` */

DROP TABLE IF EXISTS `kpi`;

CREATE TABLE `kpi` (
  `idKPI` int(11) NOT NULL AUTO_INCREMENT,
  `nombreKPI` varchar(45) NOT NULL,
  `abreviaturaKPI` varchar(25) NOT NULL,
  PRIMARY KEY (`idKPI`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `kpi` */

insert  into `kpi`(`idKPI`,`nombreKPI`,`abreviaturaKPI`) values (1,'EAF','EAF'),(2,'EFOF','EFOF'),(3,'Hate Rate','ENPHR'),(4,'Comercial Availability','CA'),(5,'Horas Equivalente Derrateo Programado','HEDP'),(6,'Horas Equivalente Derrateo Forzado','HEDF'),(7,'Horas de Salida Forzada','HSF'),(8,'Horas Operación Unidad Generadora','MTBF'),(9,'Costos','CTM OPEX');

/*Table structure for table `kpi_planilla` */

DROP TABLE IF EXISTS `kpi_planilla`;

CREATE TABLE `kpi_planilla` (
  `idKPIPlanilla` int(11) NOT NULL AUTO_INCREMENT,
  `idPlanilla` int(11) NOT NULL,
  `idKPI` int(11) NOT NULL,
  `idUbicacion` int(11) NOT NULL,
  PRIMARY KEY (`idKPIPlanilla`),
  KEY `idPlanilla` (`idPlanilla`),
  KEY `idKPI` (`idKPI`),
  KEY `idUbicacion` (`idUbicacion`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `kpi_planilla` */

insert  into `kpi_planilla`(`idKPIPlanilla`,`idPlanilla`,`idKPI`,`idUbicacion`) values (1,1,1,0),(2,1,2,0),(3,1,3,0),(4,1,4,0),(5,1,5,0),(6,1,6,0),(7,1,7,0),(8,1,8,0),(9,1,9,0);

/*Table structure for table `nivel` */

DROP TABLE IF EXISTS `nivel`;

CREATE TABLE `nivel` (
  `idNivel` int(11) NOT NULL AUTO_INCREMENT,
  `descripNivel` varchar(100) NOT NULL,
  PRIMARY KEY (`idNivel`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `nivel` */

insert  into `nivel`(`idNivel`,`descripNivel`) values (1,'Facilitador'),(2,'Coordinador'),(5,'Administrador'),(6,'Administrador de Usuarios'),(7,'Referente');

/*Table structure for table `planilla` */

DROP TABLE IF EXISTS `planilla`;

CREATE TABLE `planilla` (
  `idPlanilla` int(11) NOT NULL AUTO_INCREMENT,
  `dia` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `anio` int(11) NOT NULL,
  `url` varchar(50) NOT NULL,
  `idEmpleado` int(11) NOT NULL,
  `idTipoPlanilla` int(11) NOT NULL,
  PRIMARY KEY (`idPlanilla`),
  KEY `idEmpleado` (`idEmpleado`),
  KEY `idTipoPlanilla` (`idTipoPlanilla`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `planilla` */

insert  into `planilla`(`idPlanilla`,`dia`,`mes`,`anio`,`url`,`idEmpleado`,`idTipoPlanilla`) values (1,13,10,2017,'./uploads/AES_2017-10-13_10-24.xlsx',2,1),(2,13,10,2017,'./uploads/AES_2017-10-13_10-45.xlsx',2,1);

/*Table structure for table `planta` */

DROP TABLE IF EXISTS `planta`;

CREATE TABLE `planta` (
  `idPlanta` int(11) NOT NULL AUTO_INCREMENT,
  `nombrePlanta` varchar(45) NOT NULL,
  `idUbicacion` int(11) NOT NULL,
  PRIMARY KEY (`idPlanta`),
  KEY `idUbicacion` (`idUbicacion`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `planta` */

insert  into `planta`(`idPlanta`,`nombrePlanta`,`idUbicacion`) values (1,'AES Gener S.A.',0),(2,'ESSA',0),(3,'Empresa Eléctrica Guacolda S.A.',0),(4,'Eléctrica Ventanas S.A.',0),(5,'Empresa Electrica Angamos S.A.',0),(6,'Empresa Electrica Campiche S.A.',0),(7,'Empresa Electrica Cochrane S.A.',0);

/*Table structure for table `tipo_planilla` */

DROP TABLE IF EXISTS `tipo_planilla`;

CREATE TABLE `tipo_planilla` (
  `idTipoPlanilla` int(11) NOT NULL AUTO_INCREMENT,
  `nombreTipoP` varchar(45) NOT NULL,
  `descripTipoP` varchar(45) NOT NULL,
  `idConfig` int(11) NOT NULL,
  PRIMARY KEY (`idTipoPlanilla`),
  KEY `idConfig` (`idConfig`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tipo_planilla` */

insert  into `tipo_planilla`(`idTipoPlanilla`,`nombreTipoP`,`descripTipoP`,`idConfig`) values (1,'Planilla AES Gener','',0),(2,'Planilla Costos','',0),(3,'Planilla SAP','',0),(4,'Planilla MTBF','',0);

/*Table structure for table `ubicacion` */

DROP TABLE IF EXISTS `ubicacion`;

CREATE TABLE `ubicacion` (
  `idUbicacion` int(11) NOT NULL AUTO_INCREMENT,
  `letra` char(5) NOT NULL,
  `nro` int(5) NOT NULL,
  `inicioLetra` char(5) NOT NULL,
  `finLetra` char(5) NOT NULL,
  `inicioNro` int(5) NOT NULL,
  `finNro` int(5) NOT NULL,
  `idConfiguracion` int(11) NOT NULL,
  PRIMARY KEY (`idUbicacion`),
  KEY `idConfiguracion` (`idConfiguracion`),
  KEY `idConfiguracion_2` (`idConfiguracion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ubicacion` */

/*Table structure for table `unidad_generadora` */

DROP TABLE IF EXISTS `unidad_generadora`;

CREATE TABLE `unidad_generadora` (
  `idUnidadGen` int(11) NOT NULL AUTO_INCREMENT,
  `nombreUG` varchar(45) NOT NULL,
  `abreviaturaUG` varchar(25) NOT NULL,
  `idDivision` int(11) DEFAULT NULL,
  `idComplejo` int(11) DEFAULT NULL,
  `idUbicacion` int(11) NOT NULL,
  PRIMARY KEY (`idUnidadGen`),
  KEY `idDivision` (`idDivision`),
  KEY `idComplejo` (`idComplejo`),
  KEY `idUbicacion` (`idUbicacion`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `unidad_generadora` */

insert  into `unidad_generadora`(`idUnidadGen`,`nombreUG`,`abreviaturaUG`,`idDivision`,`idComplejo`,`idUbicacion`) values (1,'Norgener 1','NT01',NULL,1,0),(2,'Norgener 2','NT02',NULL,1,0),(3,'Angamos 1','ANG1',NULL,1,0),(4,'Angamos 2','ANG2',NULL,1,0),(5,'Cochrane 1','',NULL,1,0),(6,'Cochrane 2','',NULL,1,0),(7,'Ventanas 1','VEN1',1,2,0),(8,'Ventanas 2','VEN2',1,2,0),(9,'Ventanas 3','NVE3',1,2,0),(10,'Ventanas 4','',1,2,0),(11,'Laguna Verde ST','',1,2,0),(12,'Alfalfal 1','',2,2,0),(13,'Alfalfal 2','',2,2,0),(14,'Maitenes 1','',2,2,0),(15,'Maitenes 2','',2,2,0),(16,'Maitenes 3','',2,2,0),(17,'Queltehues 1','',2,2,0),(18,'Queltehues 2','',2,2,0),(19,'Queltehues 3','',2,2,0),(20,'Volcan','',2,2,0),(21,'Nueva Renca','CNR',3,2,0),(22,'Los Vientos','',3,2,0),(23,'Santa Lidia','',3,2,0),(24,'Laja','',3,2,0),(25,'Guacolda 1','GUA1',NULL,3,0),(26,'Guacolda 2','GUA2',NULL,3,0),(27,'Guacolda 3','GUA3',NULL,3,0),(28,'Guacolda 4','GUA4',NULL,3,0),(29,'Guacolda 5','GUA5',NULL,3,0);

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `contrasenia` varchar(100) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `idNivel` int(11) NOT NULL,
  `idEmpleado` int(11) NOT NULL,
  UNIQUE KEY `idUsuario_2` (`idUsuario`),
  KEY `idUsuario` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */

insert  into `usuario`(`idUsuario`,`contrasenia`,`usuario`,`idNivel`,`idEmpleado`) values (3,'81dc9bdb52d04dc20036dbd8313ed055','aldana',6,2),(4,'81dc9bdb52d04dc20036dbd8313ed055','aldana',6,2),(5,'81dc9bdb52d04dc20036dbd8313ed055','prueba',6,4),(6,'c893bad68927b457dbed39460e6afd62','osep',6,3),(7,'c893bad68927b457dbed39460e6afd62','jimena',1,22),(8,'c893bad68927b457dbed39460e6afd62','adriana',1,4);

/*Table structure for table `valores` */

DROP TABLE IF EXISTS `valores`;

CREATE TABLE `valores` (
  `idValores` int(11) NOT NULL,
  `actualMes` double DEFAULT NULL,
  `targetMes` double DEFAULT NULL,
  `ytdActual` double DEFAULT NULL,
  `ytdTarget` double DEFAULT NULL,
  `fyf` double DEFAULT NULL,
  `fyBudget` double DEFAULT NULL,
  `hedp` double DEFAULT NULL,
  `hedf` double DEFAULT NULL,
  `hsf` double DEFAULT NULL,
  `mtbf` int(11) DEFAULT NULL,
  `mtbfTarget` int(11) DEFAULT NULL,
  `ctmActual` int(11) NOT NULL,
  `ctmBudget` int(11) NOT NULL,
  `idUnidadGen` int(11) DEFAULT NULL,
  `idDivision` int(11) DEFAULT NULL,
  `idComplejo` int(11) DEFAULT NULL,
  `idKPIPlanilla` int(11) DEFAULT NULL,
  `idPlanta` int(11) DEFAULT NULL,
  PRIMARY KEY (`idValores`),
  KEY `idUnidadGen` (`idUnidadGen`),
  KEY `idDivision` (`idDivision`),
  KEY `idComplejo` (`idComplejo`),
  KEY `idKPIPlanilla` (`idKPIPlanilla`),
  KEY `idPlanta` (`idPlanta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `valores` */

insert  into `valores`(`idValores`,`actualMes`,`targetMes`,`ytdActual`,`ytdTarget`,`fyf`,`fyBudget`,`hedp`,`hedf`,`hsf`,`mtbf`,`mtbfTarget`,`ctmActual`,`ctmBudget`,`idUnidadGen`,`idDivision`,`idComplejo`,`idKPIPlanilla`,`idPlanta`) values (1,93.94,96.56,87.24,87.35,0,0,37.45,7.56,0,0,0,0,0,3,0,1,1,0),(2,93.9502688172043,96.5591427659313,87.5831367924529,87.3393129624855,0,0,0.12,4.66,0,0,0,0,0,4,0,1,1,0),(3,95.9233870967742,95.3397802102081,84.7983490566038,87.9907208900181,0,0,1.35,0,0,0,0,0,0,5,0,1,1,0),(4,99.8185483870968,95.7121014525359,85.6405267295598,95.3780674936567,0,0,3.92,0,0,0,0,0,0,6,0,1,1,0),(5,94.0160989473833,96.2433556282164,88.0171378892777,90.512210082793,0,0,0,0,0,0,0,0,0,0,0,1,1,0),(6,99.4731182795699,96.9499928241358,94.7826257861635,92.9509678208976,0,0,1.39,0,0.17,0,0,0,0,1,0,1,1,0),(7,74.6438172043011,96.9626247634409,94.3209512578616,96.5249741996855,0,0,41.17,3.9,0,0,0,0,0,2,0,1,1,0),(8,92.2970430107527,89.3956525686977,86.8150550314465,86.9986924309923,0,0,41.41,6.14,0,0,0,0,0,7,1,2,1,0),(9,44.0322580645161,3.2258064516129,75.4286556603774,80.6778810949511,0,0,26.49,5.83,0,0,0,0,0,8,1,2,1,0),(10,98.6693548387097,97.6317052805711,89.4141116352201,91.1254162696064,0,0,6.28,2.87,0.75,0,0,0,0,9,1,2,1,0),(11,99.5833333333333,97.8533539680467,88.6006289308176,92.1305330443307,0,0,0.63,2.74,0,0,0,0,0,10,1,2,1,0),(12,100,100,100,100,0,0,0,0,0,0,0,0,0,11,1,2,1,0),(13,86.1569274426147,75.9098436673445,86.3537130921007,89.1422996247503,0,0,0,0,0,0,0,0,0,0,1,2,1,0),(14,41.002688172043,99.8871617915072,87.7977594339623,83.2689318902569,0,0,0,0,0,0,0,0,0,12,2,2,1,0),(15,100,99.8871617915072,96.4571540880503,97.384199769925,0,0,0,0,0,0,0,0,0,13,2,2,1,0),(16,100,99.8119428373593,99.7657343242738,85.7024721073099,0,0,0,0,0,0,0,0,0,14,2,2,1,0),(17,100,99.8119428373593,99.9239422680318,85.7037451981041,0,0,0,0,0,0,0,0,0,15,2,2,1,0),(18,99.864247311828,3.2258064516129,99.83157241267,85.6561313285147,0,0,0,0,1,0,0,0,0,16,2,2,1,0),(19,99.1129032258065,99.7323154633674,99.7116658903049,99.6836246975251,0,0,0,0,0,0,0,0,0,17,2,2,1,0),(20,100,99.7323154633674,99.7480270425159,99.6836246975251,0,0,0,0,0,0,0,0,0,18,2,2,1,0),(21,100,99.7323154633674,99.8748011982387,99.6836246975251,0,0,0,0,0,0,0,0,0,19,2,2,1,0),(22,100,99.7010374276261,99.4579402515723,99,0,0,0,0,0,0,0,0,0,20,2,2,1,0),(23,80.588912635405,96.1422977195374,94.7507037906991,91.9350201122949,0,0,0,0,0,0,0,0,0,0,2,2,1,0),(24,89.5832671629446,92.6179913275434,88.793159396412,93.4529621323174,0,0,0,0.29,17.41,0,0,0,0,21,3,2,1,0),(25,100,100,99.8026729559749,92.91994611954,0,0,0,0,0,0,0,0,0,22,3,2,1,0),(26,100,99.9885604851502,100,99.9948913626936,0,0,0,0,0,0,0,0,0,23,3,2,1,0),(27,100,94.8387096774194,98.278498427673,96.6132075471698,0,0,0,0,0,0,0,0,0,24,3,2,1,0),(28,94.2500795338785,95.8376054560929,93.7441027372563,94.8405265124509,0,0,0,0,0,0,0,0,0,0,3,2,1,0),(29,88.1135566258078,86.2192873897046,90.3216328965949,91.6060440642432,0,0,0,0,0,0,0,0,0,0,0,2,1,0),(30,0,2.10914696081045,1.43238993710692,1.99793155017153,0,0,0,0,0,0,0,0,0,1,0,1,2,0),(31,10364.7215759078,10014,10184.6624628421,10014,0,0,0,0,0,0,0,0,0,1,NULL,1,3,0),(33,88.1135566258078,88.1135566258078,90.3216328965949,91.6060440642432,0,0,0,0,0,0,0,0,0,0,0,2,1,0),(34,99.7836021505376,98.0787834502764,89.2753537735849,88.8386273507178,0,0,0,1.61,0,0,0,0,0,25,0,0,1,0),(35,98.0887096774193,98.0126582227105,94.6499606918239,88.092679804541,0,0,1.37,1.35,0,0,0,0,0,26,0,0,1,0),(36,93.0241935483871,98.0014703801129,58.7415487421384,94.3107656293582,0,0,0,0,51.9,0,0,0,0,27,0,0,1,0),(37,99.872311827957,72.7262246009412,94.2625786163522,92.0460973244367,0,0,0,0,0.94,0,0,0,0,28,0,0,1,0),(38,100,97.8013473982335,92.2873427672956,94.3243797576932,0,0,6.28,2.87,0.75,0,0,0,0,29,0,0,1,0),(39,98.1555334251712,92.989152760877,85.8733959466416,91.648172659415,0,0,0,0,0,0,0,0,0,0,0,3,1,0),(40,0.0228494623655914,2.09651502150538,1.25373427672956,2.19751007704403,0,0,0,0,0,0,0,0,0,2,0,0,2,0),(41,0.524193548387097,2.4999991683839,2.61988993710692,2.24889408444325,0,0,0,0,0,0,0,0,0,3,0,0,2,0),(42,1.01612903225806,2.49999701901488,1.05915880503145,2.26367445889815,0,0,0,0,0,0,0,0,0,4,0,0,2,0),(43,0.626344086021505,3.98817677903918,0.576454402515723,3.77421621690015,0,0,0,0,0,0,0,0,0,5,0,0,2,0),(44,0,3.61585553671143,5.1935927672956,3.93403942458229,0,0,0,0,0,0,0,0,0,6,0,0,2,0),(45,3.93403942458229,2.9188690951797,2.13618469964827,2.83728126578538,0,0,0,0,0,0,0,0,0,0,0,1,2,0),(46,0.825268817204301,2.82656965352449,5.81564465408805,2.60298472222222,0,0,0,0,0,0,0,0,0,7,0,0,2,0),(47,0.783602150537634,0,10.248034591195,3.45209794068833,0,0,0,0,0,0,0,0,0,8,0,0,2,0),(48,0.486559139784946,2.3682947139872,0.457547169811321,2.27081014469228,0,0,0,0,0,0,0,0,0,9,0,0,2,0),(49,0.368279569892473,2.14664603195333,8.11340408805031,2.20908959797444,0,0,0,0,0,0,0,0,0,10,0,0,2,0),(50,0,0,0,0,0,0,0,0,0,0,0,0,0,11,0,0,2,0),(51,0.527154192750907,1.6929315612664,5.62780914981614,2.42544065607241,0,0,0,0,0,0,0,0,0,0,1,0,2,0),(52,0,0.112838208492801,0,0.221634147478947,0,0,0,0,0,0,0,0,0,12,0,0,2,0),(53,0,0.112838208492801,0.16686320754717,0.257309664037238,0,0,0,0,0,0,0,0,0,13,0,0,2,0),(54,0,0.188057162640708,0.0560115080385803,0.146584534503836,0,0,0,0,0,0,0,0,0,14,0,0,2,0),(55,0,0.188057162640708,0.0760577319681775,0.145311424689626,0,0,0,0,0,0,0,0,0,15,0,0,2,0),(56,0.145311424689626,0,0.0992484616122213,0.192925294279005,0,0,0,0,0,0,0,0,0,16,0,0,2,0),(57,0,0.267684536632598,0,0.316375314557332,0,0,0,0,0,0,0,0,0,17,0,0,2,0),(58,0,0.267684536632598,0,0.316375314557332,0,0,0,0,0,0,0,0,0,18,0,0,2,0),(59,0,0.267684536632598,0,0.316375314557332,0,0,0,0,0,0,0,0,0,19,0,0,2,0),(60,0,0.298962572373863,0,0.354283593372037,0,0,0,0,0,0,0,0,0,20,0,0,2,0),(61,0.00514618554564512,0.151254254445746,0.0635916177718412,0.249967199964101,0,0,0,0,0,0,0,0,0,0,2,0,2,0),(62,2.37952026468156,0.930395769230769,0.412452225447508,0.886660509192066,0,0,0,0,0,0,0,0,0,21,0,0,2,0),(63,0,0,0,0,0,0,0,0,0,0,0,0,0,22,0,0,2,0),(64,0,0.0114395148497757,0,0.00510863730642434,0,0,0,0,0,0,0,0,0,23,0,0,2,0),(65,0,1.97169811320755,0.77810534591195,1.97169811320755,0,0,0,0,0,0,0,0,0,24,0,0,2,0),(66,1.31346867424421,0.548067073249127,0.240487880809578,0.524001859375323,0,0,0,0,0,0,0,0,0,0,3,0,2,0),(67,0.720325422958541,1.03927787419998,2.82544019668377,1.40211620648995,0,0,0,0,0,0,0,0,0,0,0,2,2,0),(68,0.216397849462366,1.92121654972359,0.0412735849056604,1.72741038374329,0,0,0,0,0,0,0,0,0,25,0,0,2,0),(69,0.181451612903226,1.98734177728948,2.56761006289308,1.75676975539494,0,0,0,0,0,0,0,0,0,26,0,0,2,0),(70,6.9758064516129,1.99852961988709,14.6643081761006,1.91564946216968,0,0,0,0,0,0,0,0,0,27,0,0,2,0),(71,0.126344086021505,1.46732377646502,2.91509433962264,1.82182720244816,0,0,0,0,0,0,0,0,0,28,0,0,2,0),(72,0,2.19865260176651,0.0365566037735849,1.90203533383872,0,0,0,0,0,0,0,0,0,29,0,0,2,0),(73,1.49355489228179,1.91568020701795,4.02987018509814,1.82426405414177,0,0,0,0,0,0,0,0,0,0,0,3,2,0),(74,9970.24556270206,9921,10073.4543269054,9921,0,0,0,0,0,0,0,0,0,2,0,0,3,0),(75,9815.33254124985,9749,9734.07240566505,9749,0,0,0,0,0,0,0,0,0,3,0,0,3,0),(76,10069.2812941846,9606,9671.28028840438,9606,0,0,NULL,NULL,NULL,NULL,NULL,0,0,4,0,0,3,0),(77,10260.3492441538,9822,9895.7350558961,9822,0,0,NULL,NULL,NULL,NULL,NULL,0,0,5,0,0,3,0),(78,10175.450764117,9822,9881.84077343155,9822,0,0,NULL,NULL,NULL,NULL,NULL,0,0,6,0,0,3,0),(79,10092.2578830303,9781.1415404691,9864.78188243386,9785.75195504824,0,0,NULL,NULL,NULL,NULL,NULL,0,0,0,0,1,3,0),(80,10985.0199318459,10460.9999993784,10913.4011711314,10460.9999997286,0,0,NULL,NULL,NULL,NULL,NULL,0,0,7,0,NULL,3,0),(81,10724.8200578726,0,10868.5719160965,10850.9999999687,0,0,NULL,NULL,NULL,NULL,NULL,0,0,8,0,NULL,3,0),(82,9422.6500020048,9379.00000026188,9505.88938644189,9379.00000004433,0,0,NULL,NULL,NULL,NULL,NULL,0,0,9,0,NULL,3,0),(83,9255.12002307157,9522.99999996146,9389.02432070281,9523.00000004585,0,0,NULL,NULL,NULL,NULL,NULL,0,0,10,0,NULL,3,0),(84,9714.788580027,9608.66041517231,9930.85479821196,9836.95963656752,0,0,NULL,NULL,NULL,NULL,NULL,0,0,0,1,NULL,3,0),(85,7594.21422059654,7500,7539.85702175041,7500,0,0,NULL,NULL,NULL,NULL,NULL,0,0,21,0,NULL,3,0),(86,0,11499.6802775128,11065.0139363215,11499.6803414456,0,0,NULL,NULL,NULL,NULL,NULL,0,0,22,0,NULL,3,0),(87,0,11499.6803212477,11483.2835084062,11499.6803299459,0,0,NULL,NULL,NULL,NULL,NULL,0,0,23,0,NULL,3,0),(88,55122.018469657,34170.9402290105,25798.4815453145,31316.1465505976,0,0,NULL,NULL,NULL,NULL,NULL,0,0,24,0,NULL,3,0),(89,7993.80909862295,7891.59925789637,7927.5331825571,7899.03692056787,0,0,NULL,NULL,NULL,NULL,NULL,0,0,0,3,NULL,3,0),(90,9238.76655954075,8970.09710045766,9338.11434559101,9220.06257397278,0,0,NULL,NULL,NULL,NULL,NULL,0,0,0,0,2,3,0),(91,10372.7100242437,10450.9999994725,10366.1581078275,10450.9999999357,0,0,NULL,NULL,NULL,NULL,NULL,0,0,25,0,NULL,3,0),(92,11098.4199252744,10302.0000005371,10772.803867884,10302.0000000985,0,0,NULL,NULL,NULL,NULL,NULL,0,0,26,0,NULL,3,0),(93,9935.04002791908,9898.99999990021,10277.1595109487,9899.00000010656,0,0,NULL,NULL,NULL,NULL,NULL,0,0,27,0,NULL,3,0),(94,9970.34993210974,10076.0000004653,10102.5450158034,10076.0000000548,0,0,NULL,NULL,NULL,NULL,NULL,0,0,28,0,NULL,3,0),(95,10117.3700252293,10366.0000005072,10170.3177832301,10366.000000263,0,0,NULL,NULL,NULL,NULL,NULL,0,0,29,0,NULL,3,0),(96,10244.1549681704,10228.9141074877,10330.9623218786,10214.9597276317,0,0,NULL,NULL,NULL,NULL,NULL,0,0,0,0,3,3,0),(97,96.8337639801388,89.1194216260647,95.9377918993066,97.8229896460719,0,0,0,0,0,0,0,0,0,0,0,0,4,1),(98,97.7749399882741,91.984036302844,97.7175469597692,92.8840009955085,0,0,0,0,0,0,0,0,0,0,0,0,4,2),(99,99.716121818628,97.9820914829,96.9436378562304,98.6796611346863,0,0,0,0,0,0,0,0,0,0,0,0,4,3),(100,99.6577327884435,98.0744698403589,94.8242835180014,94.1260004307825,0,0,0,0,0,0,0,0,0,0,0,0,4,4),(101,98.7927758775546,99.2494529198619,98.7006943453048,96.8479659653685,0,0,0,0,0,0,0,0,0,0,0,0,4,5),(102,99.8822916779174,98.9878524198818,87.0656527699364,96.9425959934477,0,0,0,0,0,0,0,0,0,0,0,0,4,6),(103,99.9085800274447,99.7836886535475,98.9463788605547,99.0023444469624,0,0,0,0,0,0,0,0,0,0,0,0,4,7),(104,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,8514,5727,0,1,0,9,0),(105,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,728,740,0,2,0,9,0),(106,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1950,1281,0,3,0,9,0),(107,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,5421,4260,0,0,1,9,0),(108,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3151,4054,0,0,3,9,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
