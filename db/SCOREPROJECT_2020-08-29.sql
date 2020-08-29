-- --------------------------------------------------------
-- 호스트:                          127.0.0.1
-- 서버 버전:                        8.0.18 - MySQL Community Server - GPL
-- 서버 OS:                        Win64
-- HeidiSQL 버전:                  11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- scoreproject 데이터베이스 구조 내보내기
CREATE DATABASE IF NOT EXISTS `scoreproject` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `scoreproject`;

-- 테이블 scoreproject.exam_match_list 구조 내보내기
CREATE TABLE IF NOT EXISTS `exam_match_list` (
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

-- 테이블 데이터 scoreproject.exam_match_list:~0 rows (대략적) 내보내기
/*!40000 ALTER TABLE `exam_match_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `exam_match_list` ENABLE KEYS */;

-- 테이블 scoreproject.exam_paper_list 구조 내보내기
CREATE TABLE IF NOT EXISTS `exam_paper_list` (
  `EPL_SEQ` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '고유번호',
  `EPL_RA_SEQ` int(11) DEFAULT NULL COMMENT '시험 종류',
  `EPL_PATH` varchar(150) DEFAULT NULL COMMENT '시험지',
  `EPL_STATUS` int(1) DEFAULT NULL COMMENT '진행사항',
  `EPL_REG_DATE` datetime DEFAULT NULL,
  `EPL_DEL_YN` char(1) NOT NULL DEFAULT 'N' COMMENT '삭제유무',
  PRIMARY KEY (`EPL_SEQ`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 테이블 데이터 scoreproject.exam_paper_list:~0 rows (대략적) 내보내기
/*!40000 ALTER TABLE `exam_paper_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `exam_paper_list` ENABLE KEYS */;

-- 테이블 scoreproject.exam_question_list 구조 내보내기
CREATE TABLE IF NOT EXISTS `exam_question_list` (
  `EQL_SEQ` int(11) NOT NULL AUTO_INCREMENT COMMENT '고유번호',
  `EQL_RA_SEQ` int(11) NOT NULL COMMENT '시험지번호',
  `EQL_REF` int(2) NOT NULL DEFAULT '0' COMMENT '문항숫자',
  `EQL_DEPTH` int(1) NOT NULL DEFAULT '0' COMMENT '하위번호',
  `EQL_TYPE` int(1) NOT NULL COMMENT '문제유형',
  `EQL_SCORE` int(1) DEFAULT NULL COMMENT '배점',
  `EQL_ANSWER` varchar(500) DEFAULT NULL,
  `EQL_REG_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '등록날짜',
  `EQL_DEL_YN` char(1) NOT NULL DEFAULT 'N' COMMENT '삭제유무',
  PRIMARY KEY (`EQL_SEQ`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- 테이블 데이터 scoreproject.exam_question_list:~0 rows (대략적) 내보내기
/*!40000 ALTER TABLE `exam_question_list` DISABLE KEYS */;
INSERT INTO `exam_question_list` (`EQL_SEQ`, `EQL_RA_SEQ`, `EQL_REF`, `EQL_DEPTH`, `EQL_TYPE`, `EQL_SCORE`, `EQL_ANSWER`, `EQL_REG_DATE`, `EQL_DEL_YN`) VALUES
	(1, 14, 0, 0, 0, 3, NULL, '2020-08-29 17:31:50', 'N'),
	(2, 14, 0, 0, 0, 3, NULL, '2020-08-29 17:31:50', 'N'),
	(3, 14, 0, 0, 0, 3, NULL, '2020-08-29 17:31:50', 'N'),
	(4, 14, 0, 0, 1, 5, NULL, '2020-08-29 17:31:50', 'N'),
	(5, 14, 0, 0, 1, 5, NULL, '2020-08-29 17:31:50', 'N'),
	(6, 14, 0, 0, 2, NULL, NULL, '2020-08-29 17:31:50', 'N'),
	(7, 14, 6, 1, 2, 3, NULL, '2020-08-29 17:31:50', 'N'),
	(8, 14, 6, 2, 2, 3, NULL, '2020-08-29 17:31:50', 'N'),
	(9, 13, 0, 0, 0, 3, NULL, '2020-08-29 17:31:50', 'N'),
	(10, 13, 0, 0, 0, 3, NULL, '2020-08-29 17:31:50', 'N'),
	(11, 13, 0, 0, 0, 3, NULL, '2020-08-29 17:31:50', 'N'),
	(12, 13, 0, 0, 0, 3, NULL, '2020-08-29 17:31:50', 'N'),
	(13, 13, 0, 0, 0, 3, NULL, '2020-08-29 17:31:50', 'N');
/*!40000 ALTER TABLE `exam_question_list` ENABLE KEYS */;

-- 테이블 scoreproject.exam_type_list 구조 내보내기
CREATE TABLE IF NOT EXISTS `exam_type_list` (
  `ETL_SEQ` int(11) NOT NULL AUTO_INCREMENT COMMENT '고유번호',
  `ETL_ROUND` int(2) DEFAULT NULL COMMENT '회차',
  `ETL_LEVEL` int(1) DEFAULT NULL COMMENT '난이도',
  `ETL_NAME` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '시험명',
  `ETL_DATE` date DEFAULT NULL COMMENT '시험일',
  `ETL_STATUS` int(1) NOT NULL DEFAULT '0' COMMENT '상태',
  `ETL_COMMENT` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ETL_REG_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '등록날짜',
  `ETL_DEL_YN` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT 'N' COMMENT '삭제여부',
  PRIMARY KEY (`ETL_SEQ`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- 테이블 데이터 scoreproject.exam_type_list:~3 rows (대략적) 내보내기
/*!40000 ALTER TABLE `exam_type_list` DISABLE KEYS */;
INSERT INTO `exam_type_list` (`ETL_SEQ`, `ETL_ROUND`, `ETL_LEVEL`, `ETL_NAME`, `ETL_DATE`, `ETL_STATUS`, `ETL_COMMENT`, `ETL_REG_DATE`, `ETL_DEL_YN`) VALUES
	(1, 1, 0, '1학기 중간 고사', '2020-08-20', 2, '', '2020-08-20 19:35:50', 'N'),
	(2, 1, 2, '1학기 기말 고사', '2020-08-23', 1, '', '2020-08-20 19:36:37', 'N'),
	(3, 1, 1, '2학기 중간고사', '2020-08-26', 0, '', '2020-08-20 19:36:59', 'N'),
	(4, 2, 0, '123', '2020-08-15', 0, '123', '2020-08-29 16:17:23', 'N'),
	(5, 2, 0, '123', '2020-08-15', 0, '123', '2020-08-29 16:17:37', 'N'),
	(6, 2, 0, '123', '2020-08-29', 0, '123', '2020-08-29 16:20:26', 'N'),
	(7, 5, 0, '123', '2020-08-29', 0, '123', '2020-08-29 16:20:35', 'N'),
	(8, 3, 0, '123', '2020-08-29', 0, '123', '2020-08-29 16:21:33', 'N'),
	(9, 4, 0, '213', '2020-08-29', 0, '123', '2020-08-29 16:21:48', 'N'),
	(10, 2, 0, '213', '2020-08-29', 0, '123', '2020-08-29 16:21:56', 'N'),
	(11, 1, 0, '123', '2020-09-04', 0, '123', '2020-08-29 16:23:13', 'N'),
	(13, 1, 1, '1', '1991-12-12', 0, '123', '2020-08-29 16:55:05', 'N'),
	(14, 3, 2, '두민두민', '2020-08-30', 0, '123', '2020-08-29 16:55:40', 'N');
/*!40000 ALTER TABLE `exam_type_list` ENABLE KEYS */;

-- 테이블 scoreproject.user_list_admin 구조 내보내기
CREATE TABLE IF NOT EXISTS `user_list_admin` (
  `ULA_SEQ` int(11) NOT NULL AUTO_INCREMENT,
  `ULA_ID` varchar(20) NOT NULL COMMENT '아이디',
  `ULA_PWD` varchar(50) NOT NULL COMMENT '비밀번호',
  `ULA_DEL_YN` char(1) NOT NULL DEFAULT 'N' COMMENT '삭제유무',
  `ULA_REG_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '등록일',
  PRIMARY KEY (`ULA_SEQ`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- 테이블 데이터 scoreproject.user_list_admin:~0 rows (대략적) 내보내기
/*!40000 ALTER TABLE `user_list_admin` DISABLE KEYS */;
INSERT INTO `user_list_admin` (`ULA_SEQ`, `ULA_ID`, `ULA_PWD`, `ULA_DEL_YN`, `ULA_REG_DATE`) VALUES
	(1, 'admin', '1234', 'N', '2020-08-20 20:20:01');
/*!40000 ALTER TABLE `user_list_admin` ENABLE KEYS */;

-- 테이블 scoreproject.user_list_marker 구조 내보내기
CREATE TABLE IF NOT EXISTS `user_list_marker` (
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

-- 테이블 데이터 scoreproject.user_list_marker:~0 rows (대략적) 내보내기
/*!40000 ALTER TABLE `user_list_marker` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_list_marker` ENABLE KEYS */;

-- 테이블 scoreproject.user_list_student 구조 내보내기
CREATE TABLE IF NOT EXISTS `user_list_student` (
  `ULS_SEQ` int(11) NOT NULL AUTO_INCREMENT,
  `ULS_RA_SEQ` int(11) DEFAULT NULL COMMENT '할당된 시험',
  `ULS_NO` int(11) NOT NULL COMMENT '학번',
  `ULS_NAME` int(11) NOT NULL COMMENT '학생이름',
  `ULS_TEL` varchar(15) NOT NULL,
  `ULS_DEL_YN` char(1) NOT NULL DEFAULT 'N' COMMENT '삭제유무',
  `ULS_REG_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '등록일',
  PRIMARY KEY (`ULS_SEQ`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 테이블 데이터 scoreproject.user_list_student:~0 rows (대략적) 내보내기
/*!40000 ALTER TABLE `user_list_student` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_list_student` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
