# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.26)
# Database: SCOREPROJECT
# Generation Time: 2020-08-28 10:07:18 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table exam_match_list
# ------------------------------------------------------------

DROP TABLE IF EXISTS `exam_match_list`;

CREATE TABLE `exam_match_list` (
  `EML_SEQ` int(11) NOT NULL AUTO_INCREMENT COMMENT '고유번호',
  `EML_RA_SEQ` int(11) NOT NULL COMMENT '시험지 번호',
  `EML_ULS_SEQ` varchar(5) DEFAULT NULL COMMENT '학생 SEQ',
  `EML_ULM_SEQ` varchar(5) DEFAULT NULL COMMENT '채점자 SEQ',
  `EML_ULM_SCORE` varchar(3) DEFAULT NULL COMMENT '채점자 점수',
  `EML_STATUS` char(1) DEFAULT '0' COMMENT '상태',
  `EML_DEL_YN` char(1) NOT NULL DEFAULT 'N' COMMENT '삭제유무',
  `EML_REG_DATE` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '등록날짜',
  PRIMARY KEY (`EML_SEQ`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table exam_paper_list
# ------------------------------------------------------------

DROP TABLE IF EXISTS `exam_paper_list`;

CREATE TABLE `exam_paper_list` (
  `EPL_SEQ` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '고유번호',
  `EPL_RA_SEQ` int(11) DEFAULT NULL COMMENT '시험 종류',
  `EPL_PATH` varchar(150) DEFAULT NULL COMMENT '시험지',
  `EPL_STATUS` int(1) DEFAULT NULL COMMENT '진행사항',
  `EPL_REG_DATE` datetime DEFAULT NULL,
  `EPL_DEL_YN` char(1) NOT NULL DEFAULT 'N' COMMENT '삭제유무',
  PRIMARY KEY (`EPL_SEQ`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table exam_type_list
# ------------------------------------------------------------

DROP TABLE IF EXISTS `exam_type_list`;

CREATE TABLE `exam_type_list` (
  `ETL_SEQ` int(11) NOT NULL AUTO_INCREMENT,
  `ETL_NAME` varchar(50) NOT NULL,
  `ETL_DATE` date DEFAULT NULL,
  `ETL_STATUS` int(1) NOT NULL DEFAULT '0',
  `ETL_REG_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ETL_DEL_YN` char(1) DEFAULT 'N',
  PRIMARY KEY (`ETL_SEQ`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `exam_type_list` WRITE;
/*!40000 ALTER TABLE `exam_type_list` DISABLE KEYS */;

INSERT INTO `exam_type_list` (`ETL_SEQ`, `ETL_NAME`, `ETL_DATE`, `ETL_STATUS`, `ETL_REG_DATE`, `ETL_DEL_YN`)
VALUES
	(1,'1학기 중간 고사','2020-08-20',2,'2020-08-20 19:35:50','N'),
	(2,'1학기 기말 고사','2020-08-23',1,'2020-08-20 19:36:37','N'),
	(3,'2학기 중간고사','2020-08-26',0,'2020-08-20 19:36:59','N');

/*!40000 ALTER TABLE `exam_type_list` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_list_admin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_list_admin`;

CREATE TABLE `user_list_admin` (
  `ULA_SEQ` int(11) NOT NULL AUTO_INCREMENT,
  `ULA_ID` varchar(20) NOT NULL COMMENT '아이디',
  `ULA_PWD` varchar(50) NOT NULL COMMENT '비밀번호',
  `ULA_DEL_YN` char(1) NOT NULL DEFAULT 'N' COMMENT '삭제유무',
  `ULA_REG_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '등록일',
  PRIMARY KEY (`ULA_SEQ`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

LOCK TABLES `user_list_admin` WRITE;
/*!40000 ALTER TABLE `user_list_admin` DISABLE KEYS */;

INSERT INTO `user_list_admin` (`ULA_SEQ`, `ULA_ID`, `ULA_PWD`, `ULA_DEL_YN`, `ULA_REG_DATE`)
VALUES
	(1,'admin','1234','N','2020-08-20 20:20:01');

/*!40000 ALTER TABLE `user_list_admin` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_list_marker
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_list_marker`;

CREATE TABLE `user_list_marker` (
  `ULM_SEQ` int(11) NOT NULL AUTO_INCREMENT,
  `ULM_RA_SEQ` int(11) DEFAULT NULL COMMENT '할당된 시험',
  `ULM_ID` varchar(20) NOT NULL COMMENT '아이디',
  `ULM_PWD` varchar(50) NOT NULL COMMENT '비밀번호',
  `ULM_NO` int(11) NOT NULL COMMENT '식별번호',
  `ULM_NAME` int(11) NOT NULL COMMENT '채점자이름',
  `ULM_DEL_YN` char(1) NOT NULL DEFAULT 'N' COMMENT '삭제유무',
  `ULM_REG_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '등록일',
  PRIMARY KEY (`ULM_SEQ`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;



# Dump of table user_list_student
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_list_student`;

CREATE TABLE `user_list_student` (
  `ULS_SEQ` int(11) NOT NULL AUTO_INCREMENT,
  `ULS_RA_SEQ` int(11) DEFAULT NULL COMMENT '할당된 시험',
  `ULS_NO` int(11) NOT NULL COMMENT '학번',
  `ULS_NAME` int(11) NOT NULL COMMENT '학생이름',
  `ULS_TEL` varchar(15) NOT NULL,
  `ULS_DEL_YN` char(1) NOT NULL DEFAULT 'N' COMMENT '삭제유무',
  `ULS_REG_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '등록일',
  PRIMARY KEY (`ULS_SEQ`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
