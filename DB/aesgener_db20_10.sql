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
  `idValores` int(11) NOT NULL AUTO_INCREMENT,
  `actualMes` double NOT NULL,
  `targetMes` double NOT NULL,
  `ytdActual` double NOT NULL,
  `ytdTarget` double NOT NULL,
  `fyf` double NOT NULL,
  `fyBudget` double NOT NULL,
  `hedp` double DEFAULT NULL,
  `hsf` double DEFAULT NULL,
  `mtbf` int(11) DEFAULT NULL,
  `mtbfTarget` int(11) DEFAULT NULL,
  `idUnidadGen` int(11) DEFAULT NULL,
  `idDivision` int(11) DEFAULT NULL,
  `idComplejo` int(11) DEFAULT NULL,
  `idKPIPlanilla` int(11) NOT NULL,
  PRIMARY KEY (`idValores`),
  KEY `idUnidadGen` (`idUnidadGen`),
  KEY `idDivision` (`idDivision`),
  KEY `idComplejo` (`idComplejo`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

/*Data for the table `valores` */

insert  into `valores`(`idValores`,`actualMes`,`targetMes`,`ytdActual`,`ytdTarget`,`fyf`,`fyBudget`,`hedp`,`hsf`,`mtbf`,`mtbfTarget`,`idUnidadGen`,`idDivision`,`idComplejo`,`idKPIPlanilla`) values (1,93.94,96.56,87.24,87.35,0,0,0,0,0,0,3,0,1,1),(2,93.9502688172043,96.5591427659313,87.5831367924529,87.3393129624855,0,0,0,0,0,0,4,0,1,1),(3,95.9233870967742,95.3397802102081,84.7983490566038,87.9907208900181,0,0,0,0,0,0,5,0,1,1),(4,99.8185483870968,95.7121014525359,85.6405267295598,95.3780674936567,0,0,0,0,0,0,6,0,1,1),(5,94.0160989473833,96.2433556282164,88.0171378892777,90.512210082793,0,0,0,0,0,0,0,0,1,1),(6,99.4731182795699,96.9499928241358,94.7826257861635,92.9509678208976,0,0,0,0,0,0,1,0,1,1),(7,74.6438172043011,96.9626247634409,94.3209512578616,96.5249741996855,0,0,0,0,0,0,2,0,1,1),(8,92.2970430107527,89.3956525686977,86.8150550314465,86.9986924309923,0,0,0,0,0,0,7,1,2,1),(9,44.0322580645161,3.2258064516129,75.4286556603774,80.6778810949511,0,0,0,0,0,0,8,1,2,1),(10,98.6693548387097,97.6317052805711,89.4141116352201,91.1254162696064,0,0,0,0,0,0,9,1,2,1),(11,99.5833333333333,97.8533539680467,88.6006289308176,92.1305330443307,0,0,0,0,0,0,10,1,2,1),(12,100,100,100,100,0,0,0,0,0,0,11,1,2,1),(13,86.1569274426147,75.9098436673445,86.3537130921007,89.1422996247503,0,0,0,0,0,0,0,1,2,1),(14,41.002688172043,99.8871617915072,87.7977594339623,83.2689318902569,0,0,0,0,0,0,12,2,2,1),(15,100,99.8871617915072,96.4571540880503,97.384199769925,0,0,0,0,0,0,13,2,2,1),(16,100,99.8119428373593,99.7657343242738,85.7024721073099,0,0,0,0,0,0,14,2,2,1),(17,100,99.8119428373593,99.9239422680318,85.7037451981041,0,0,0,0,0,0,15,2,2,1),(18,99.864247311828,3.2258064516129,99.83157241267,85.6561313285147,0,0,0,0,0,0,16,2,2,1),(19,99.1129032258065,99.7323154633674,99.7116658903049,99.6836246975251,0,0,0,0,0,0,17,2,2,1),(20,100,99.7323154633674,99.7480270425159,99.6836246975251,0,0,0,0,0,0,18,2,2,1),(21,100,99.7323154633674,99.8748011982387,99.6836246975251,0,0,0,0,0,0,19,2,2,1),(22,100,99.7010374276261,99.4579402515723,99,0,0,0,0,0,0,20,2,2,1),(23,80.588912635405,96.1422977195374,94.7507037906991,91.9350201122949,0,0,0,0,0,0,0,2,2,1),(24,89.5832671629446,92.6179913275434,88.793159396412,93.4529621323174,0,0,0,0,0,0,21,3,2,1),(25,100,100,99.8026729559749,92.91994611954,0,0,0,0,0,0,22,3,2,1),(26,100,99.9885604851502,100,99.9948913626936,0,0,0,0,0,0,23,3,2,1),(27,100,94.8387096774194,98.278498427673,96.6132075471698,0,0,0,0,0,0,24,3,2,1),(28,94.2500795338785,95.8376054560929,93.7441027372563,94.8405265124509,0,0,0,0,0,0,0,3,2,1),(29,88.1135566258078,86.2192873897046,90.3216328965949,91.6060440642432,0,0,0,0,0,0,0,0,2,1),(30,0,2.10914696081045,1.43238993710692,1.99793155017153,0,0,0,0,0,0,1,0,1,2),(31,10364,10014,10184,10014,0,0,0,0,0,0,1,NULL,1,3);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
