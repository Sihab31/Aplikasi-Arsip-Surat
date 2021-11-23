/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.4.11-MariaDB : Database - arsip
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`arsip` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `arsip`;

/*Table structure for table `arsip` */

DROP TABLE IF EXISTS `arsip`;

CREATE TABLE `arsip` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `NOMOR` varchar(20) DEFAULT NULL,
  `ID_KAT` smallint(6) DEFAULT NULL,
  `JUDUL` varchar(50) DEFAULT NULL,
  `DIREKTORI` text DEFAULT NULL,
  `WAKTU` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `arsip` */

insert  into `arsip`(`ID`,`NOMOR`,`ID_KAT`,`JUDUL`,`DIREKTORI`,`WAKTU`) values (1,'2020/PD3/TU/001',2,'Laporan Pertanggungjawaban','Laporan Pertanggungjawaban.pdf','2021-11-23 16:22'),(2,'2020/PD3/TU/002',3,'Pemberitahuan Pelayanan Kesehatan','Pemberitahuan Pelayanan Kesehatan.pdf','2021-11-23 15:10'),(7,'2020/PD3/TU/004',4,'Pelaksanaan Vaksinasi tahap 1 COVID-19 Pfizer','Pelaksanaan Vaksinasi tahap 1 COVID-19 Pfizer.pdf','2021-11-23 15:57');

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `KAT_ID` smallint(6) NOT NULL AUTO_INCREMENT,
  `KAT_NAMA` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`KAT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `kategori` */

insert  into `kategori`(`KAT_ID`,`KAT_NAMA`) values (1,'Undangan'),(2,'Pengumuman'),(3,'Nota Dinas'),(4,'Pemberitahuan');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
