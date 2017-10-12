/*
SQLyog Ultimate v9.63 
MySQL - 5.7.14 : Database - aesgener_db
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
  `idMaquina` int(11) NOT NULL,
  PRIMARY KEY (`idComentario`),
  KEY `idEmpleado` (`idEmpleado`),
  KEY `idMaquina` (`idMaquina`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `comentario` */

/*Table structure for table `complejo` */

DROP TABLE IF EXISTS `complejo`;

CREATE TABLE `complejo` (
  `idComplejo` int(11) NOT NULL AUTO_INCREMENT,
  `nombreComplejo` varchar(45) NOT NULL,
  `actualMes` double NOT NULL,
  `targetMes` double NOT NULL,
  `ytdActual` double NOT NULL,
  `ytdTarget` double NOT NULL,
  `fyf` double NOT NULL,
  `fyBudget` double NOT NULL,
  `idUbicacion` int(11) NOT NULL,
  PRIMARY KEY (`idComplejo`),
  KEY `idUbicacion` (`idUbicacion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `complejo` */

insert  into `complejo`(`idComplejo`,`nombreComplejo`,`actualMes`,`targetMes`,`ytdActual`,`ytdTarget`,`fyf`,`fyBudget`,`idUbicacion`) values (1,'Complejo Norte',94.0160989473833,96.2433556282164,88.0171378892777,90.512210082793,90.2489848306043,90.8087976037355,0),(2,'Complejo Centro',88.1135566258078,86.2192873897046,90.3216328965949,91.6060440642432,91.0977570859902,90.6508760627466,0),(3,'Complejo Guancolda',98.1555334251713,92.9891527608771,85.8733959466416,91.648172659415,89.1321878920464,92.6710987331611,0);

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
  `actualMes` double NOT NULL,
  `targetMes` double NOT NULL,
  `ytdActual` double NOT NULL,
  `ytdTarget` double NOT NULL,
  `fyf` double NOT NULL,
  `fyBudget` double NOT NULL,
  `idComplejo` int(11) NOT NULL,
  `idUbicacion` int(11) NOT NULL,
  PRIMARY KEY (`idDivision`),
  KEY `idComplejo` (`idComplejo`),
  KEY `idUbicacion` (`idUbicacion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `division` */

insert  into `division`(`idDivision`,`nombreDivision`,`actualMes`,`targetMes`,`ytdActual`,`ytdTarget`,`fyf`,`fyBudget`,`idComplejo`,`idUbicacion`) values (1,'Divicion Ventanas',86.1569274426147,75.9098436673445,86.3537130921007,89.1422996247503,88.9404392552345,89.7284620074674,2,0),(2,'Divicion Cordillera',80.588912635405,96.1422977195374,94.7507037906991,91.9350201122949,94.2962369868683,92.2803595484225,2,0),(3,'Divicion Renca',94.2500795338785,95.8376054560929,93.7441027372563,94.8405265124509,92.5963087115337,91.1716074791667,2,0);

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
  PRIMARY KEY (`idKPI`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `kpi` */

insert  into `kpi`(`idKPI`,`nombreKPI`) values (1,'EAF'),(2,'EFOF'),(3,'ENPHR'),(4,'CA');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kpi_planilla` */

/*Table structure for table `maquina` */

DROP TABLE IF EXISTS `maquina`;

CREATE TABLE `maquina` (
  `idMaquina` int(11) NOT NULL AUTO_INCREMENT,
  `nombreMaquina` varchar(255) NOT NULL,
  `actualMes` double NOT NULL,
  `targetMes` double NOT NULL,
  `ytdActual` double NOT NULL,
  `ytdTarget` double NOT NULL,
  `fyf` double NOT NULL,
  `fyBudget` double NOT NULL,
  `hedp` float NOT NULL,
  `hedf` float NOT NULL,
  `hsf` float NOT NULL,
  `idKPIPlanilla` int(11) NOT NULL,
  `idUbicacion` int(11) NOT NULL,
  `idDivision` int(11) DEFAULT NULL,
  `idComplejo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idMaquina`),
  KEY `idKPIPlanilla` (`idKPIPlanilla`),
  KEY `idUbicacion` (`idUbicacion`),
  KEY `idDivision` (`idDivision`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `maquina` */

insert  into `maquina`(`idMaquina`,`nombreMaquina`,`actualMes`,`targetMes`,`ytdActual`,`ytdTarget`,`fyf`,`fyBudget`,`hedp`,`hedf`,`hsf`,`idKPIPlanilla`,`idUbicacion`,`idDivision`,`idComplejo`) values (1,'Norgener 1',99.4731182795699,96.9499928241358,94.7826257861635,92.95096588134766,95.2882480809629,94.5292826738745,3.92,0,0,1,1,NULL,1),(2,'Norgener 2',74.6438172043011,96.9626247634409,94.3209512578616,96.5249741996855,93.1564696171408,94.4644074474886,1.39,0,0.17,1,0,NULL,1),(3,'Angamos 1',93.9422043010753,96.5591406165623,87.2437106918239,87.3540933369404,89.0791889371189,89.2226332103263,41.17,3.9,0,1,0,NULL,1),(4,'Angamos 2',93.9502688172043,96.5591427659313,87.5831367924529,87.3393129624855,89.2107878559725,89.0690119407381,37.45,7.56,0,1,0,NULL,1),(5,'Cochrane 1',95.9233870967742,95.3397802102081,84.7983490566038,87.9907208900181,89.0632322103984,91.0956882469085,0.12,4.66,0,1,0,NULL,1),(6,'Cochrane 2',99.8185483870968,95.7121014525359,85.6405267295598,95.3780674936567,89.6406998410543,90.22188072736,1.35,0,0,1,0,NULL,1),(7,'Ventanas 1',92.2970430107527,89.3956525686977,86.8150550314465,86.9986924309923,86.4830016822763,80.4482917009133,41.41,6.14,0,1,0,1,2),(8,'Ventanas 2',44.0322580645161,3.2258064516129,75.4286556603774,80.6778810949511,76.3732940684673,78.8610555301877,26.49,5.83,0,1,0,1,2),(9,'Ventanas 3',98.6693548387097,97.6317052805711,89.4141116352201,91.1254162696064,93.137439463813,94.075925182556,6.28,2.87,0.75,1,0,1,2),(10,'Ventanas 4',99.5833333333333,97.8533539680467,88.6006289308176,92.1305330443307,92.7822053692061,94.8106720462907,0.36,2.74,0,1,0,1,2),(11,'Laguna Verde ST',100,100,100,100,100,100,0,0,0,1,0,1,2);

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
  `mes` int(11) NOT NULL,
  `año` int(11) NOT NULL,
  `idEmpleado` int(11) NOT NULL,
  `idTipoPlanilla` int(11) NOT NULL,
  PRIMARY KEY (`idPlanilla`),
  KEY `idEmpleado` (`idEmpleado`),
  KEY `idTipoPlanilla` (`idTipoPlanilla`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `planilla` */

insert  into `planilla`(`idPlanilla`,`mes`,`año`,`idEmpleado`,`idTipoPlanilla`) values (1,7,2017,1,1);

/*Table structure for table `tipo_planilla` */

DROP TABLE IF EXISTS `tipo_planilla`;

CREATE TABLE `tipo_planilla` (
  `idTipoPlanilla` int(11) NOT NULL AUTO_INCREMENT,
  `nombreTipoP` varchar(45) NOT NULL,
  `descripTipoP` varchar(45) NOT NULL,
  PRIMARY KEY (`idTipoPlanilla`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tipo_planilla` */

insert  into `tipo_planilla`(`idTipoPlanilla`,`nombreTipoP`,`descripTipoP`) values (1,'Kpi operacionales','usa la planilla KPI operacionales Julio 2017.');

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

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
