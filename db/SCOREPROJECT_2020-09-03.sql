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
  `EML_EQL_SEQ` int(11) NOT NULL COMMENT '문제 번호',
  `EML_ULM_SEQ` int(11) DEFAULT NULL COMMENT '채점자 SEQ',
  `EML_ULM_SCORE` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '채점자 점수',
  `EML_COMMENT` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '채점자 답변',
  `EML_STATUS` char(1) DEFAULT '0' COMMENT '상태',
  `EML_DEL_YN` char(1) NOT NULL DEFAULT 'N' COMMENT '삭제유무',
  `EML_REG_DATE` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '등록날짜',
  PRIMARY KEY (`EML_SEQ`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- 테이블 데이터 scoreproject.exam_match_list:~0 rows (대략적) 내보내기
/*!40000 ALTER TABLE `exam_match_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `exam_match_list` ENABLE KEYS */;

-- 테이블 scoreproject.exam_paper_attach 구조 내보내기
CREATE TABLE IF NOT EXISTS `exam_paper_attach` (
  `ATTACH_SEQ` int(11) NOT NULL AUTO_INCREMENT,
  `PAPER_SEQ` int(11) DEFAULT NULL,
  `FILE_PATH` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FILE_NAME` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ATTACH_SEQ`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 데이터 scoreproject.exam_paper_attach:~0 rows (대략적) 내보내기
/*!40000 ALTER TABLE `exam_paper_attach` DISABLE KEYS */;
INSERT INTO `exam_paper_attach` (`ATTACH_SEQ`, `PAPER_SEQ`, `FILE_PATH`, `FILE_NAME`) VALUES
	(140, 134, '/upload/TEST/140.png', 'scan002.png'),
	(141, 134, '/upload/TEST/141.png', 'scan003.png'),
	(142, 135, '/upload/TEST/142.png', 'scan004.png'),
	(143, 135, '/upload/TEST/143.png', 'scan005.png'),
	(144, 136, '/upload/TEST/144.png', 'scan006.png'),
	(145, 136, '/upload/TEST/145.png', 'scan007.png'),
	(146, 137, '/upload/TEST/140.png', 'scan002.png'),
	(147, 137, '/upload/TEST/141.png', 'scan003.png'),
	(148, 138, '/upload/TEST/142.png', 'scan004.png'),
	(149, 138, '/upload/TEST/143.png', 'scan005.png'),
	(150, 139, '/upload/TEST/144.png', 'scan006.png'),
	(151, 139, '/upload/TEST/145.png', 'scan007.png'),
	(152, 140, '/upload/TEST/140.png', 'scan007.png');
/*!40000 ALTER TABLE `exam_paper_attach` ENABLE KEYS */;

-- 테이블 scoreproject.exam_paper_list 구조 내보내기
CREATE TABLE IF NOT EXISTS `exam_paper_list` (
  `EPL_SEQ` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '고유번호',
  `EPL_RA_SEQ` int(11) NOT NULL COMMENT '시험 종류',
  `EPL_STUDENT_SEQ` int(11) DEFAULT NULL,
  `EPL_STATUS` int(1) DEFAULT '0' COMMENT '진행사항',
  `EPL_REG_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `EPL_DEL_YN` char(1) NOT NULL DEFAULT 'N' COMMENT '삭제유무',
  PRIMARY KEY (`EPL_SEQ`)
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=utf8;

-- 테이블 데이터 scoreproject.exam_paper_list:~0 rows (대략적) 내보내기
/*!40000 ALTER TABLE `exam_paper_list` DISABLE KEYS */;
INSERT INTO `exam_paper_list` (`EPL_SEQ`, `EPL_RA_SEQ`, `EPL_STUDENT_SEQ`, `EPL_STATUS`, `EPL_REG_DATE`, `EPL_DEL_YN`) VALUES
	(134, 14, NULL, 0, '2020-09-03 17:38:53', 'N'),
	(135, 14, NULL, 0, '2020-09-03 17:38:53', 'N'),
	(136, 14, NULL, 0, '2020-09-03 17:38:53', 'N'),
	(137, 14, NULL, 0, '2020-09-03 18:02:31', 'N'),
	(138, 14, NULL, 0, '2020-09-03 18:02:31', 'N'),
	(139, 14, NULL, 0, '2020-09-03 18:02:31', 'N'),
	(140, 14, NULL, 0, '2020-09-03 18:25:52', 'N');
/*!40000 ALTER TABLE `exam_paper_list` ENABLE KEYS */;

-- 테이블 scoreproject.exam_paper_marker 구조 내보내기
CREATE TABLE IF NOT EXISTS `exam_paper_marker` (
  `EPM_SEQ` int(11) NOT NULL AUTO_INCREMENT,
  `EPM_RA_SEQ` int(11) DEFAULT NULL,
  `EPM_ULM_SEQ` int(11) DEFAULT '0',
  `EPM_STATUS` int(11) DEFAULT '0',
  PRIMARY KEY (`EPM_SEQ`)
) ENGINE=InnoDB AUTO_INCREMENT=178 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 데이터 scoreproject.exam_paper_marker:~0 rows (대략적) 내보내기
/*!40000 ALTER TABLE `exam_paper_marker` DISABLE KEYS */;
INSERT INTO `exam_paper_marker` (`EPM_SEQ`, `EPM_RA_SEQ`, `EPM_ULM_SEQ`, `EPM_STATUS`) VALUES
	(139, 135, 1, 0),
	(140, 135, 2, 0),
	(141, 135, 3, 0),
	(160, 137, 1, 0),
	(161, 137, 4, 0),
	(162, 137, 6, 0),
	(163, 138, 2, 0),
	(164, 138, 3, 0),
	(165, 138, 5, 0),
	(166, 136, 2, 0),
	(167, 136, 3, 0),
	(168, 136, 5, 0),
	(169, 134, 2, 0),
	(170, 134, 3, 0),
	(171, 134, 5, 0),
	(172, 139, 1, 0),
	(173, 139, 2, 0),
	(174, 139, 3, 0),
	(175, 140, 1, 0),
	(176, 140, 2, 0),
	(177, 140, 4, 0);
/*!40000 ALTER TABLE `exam_paper_marker` ENABLE KEYS */;

-- 테이블 scoreproject.exam_question_list 구조 내보내기
CREATE TABLE IF NOT EXISTS `exam_question_list` (
  `EQL_SEQ` int(11) NOT NULL AUTO_INCREMENT COMMENT '고유번호',
  `EQL_RA_SEQ` int(11) NOT NULL COMMENT '시험지번호',
  `PARENT_SEQ` int(2) DEFAULT '0' COMMENT '문항숫자',
  `DEPTH` int(2) NOT NULL DEFAULT '0' COMMENT '하위번호',
  `EQL_TYPE` int(1) NOT NULL COMMENT '문제유형',
  `EQL_SCORE` int(1) DEFAULT NULL COMMENT '배점',
  `EQL_ANSWER` varchar(500) DEFAULT NULL,
  `EQL_REG_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '등록날짜',
  `EQL_DEL_YN` char(1) NOT NULL DEFAULT 'N' COMMENT '삭제유무',
  PRIMARY KEY (`EQL_SEQ`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

-- 테이블 데이터 scoreproject.exam_question_list:~16 rows (대략적) 내보내기
/*!40000 ALTER TABLE `exam_question_list` DISABLE KEYS */;
INSERT INTO `exam_question_list` (`EQL_SEQ`, `EQL_RA_SEQ`, `PARENT_SEQ`, `DEPTH`, `EQL_TYPE`, `EQL_SCORE`, `EQL_ANSWER`, `EQL_REG_DATE`, `EQL_DEL_YN`) VALUES
	(43, 14, 43, 1, 1, 7, NULL, '2020-08-31 14:48:54', 'N'),
	(44, 14, 43, 2, 1, 8, NULL, '2020-08-31 14:49:04', 'N'),
	(45, 14, 43, 2, 2, 7, NULL, '2020-08-31 14:49:11', 'N'),
	(46, 14, 43, 2, 1, 7, NULL, '2020-08-31 14:49:19', 'N'),
	(47, 14, 47, 1, 2, 8, NULL, '2020-08-31 14:49:27', 'N'),
	(48, 14, 48, 1, 2, 8, NULL, '2020-08-31 14:49:35', 'N'),
	(49, 14, 49, 1, 0, 7, NULL, '2020-08-31 14:50:01', 'N'),
	(50, 14, 49, 2, 0, 7, NULL, '2020-08-31 14:50:09', 'N'),
	(51, 14, 49, 2, 2, 8, NULL, '2020-08-31 14:50:18', 'N'),
	(52, 14, 49, 2, 0, 9, NULL, '2020-08-31 14:58:37', 'N'),
	(53, 14, 49, 2, 1, 3, NULL, '2020-08-31 14:59:03', 'N'),
	(54, 14, 49, 2, 0, 5, NULL, '2020-08-31 14:59:14', 'N'),
	(55, 14, 48, 2, 1, 3, NULL, '2020-08-31 16:48:10', 'N'),
	(56, 14, 43, 2, 1, 8, NULL, '2020-08-31 19:32:08', 'N'),
	(57, 14, 43, 2, 0, 9, NULL, '2020-09-01 14:22:37', 'N'),
	(58, 14, 43, 2, 0, 9, NULL, '2020-09-01 14:22:39', 'N');
/*!40000 ALTER TABLE `exam_question_list` ENABLE KEYS */;

-- 테이블 scoreproject.exam_type_list 구조 내보내기
CREATE TABLE IF NOT EXISTS `exam_type_list` (
  `ETL_SEQ` int(11) NOT NULL AUTO_INCREMENT COMMENT '고유번호',
  `ETL_ROUND` int(2) DEFAULT NULL COMMENT '회차',
  `ETL_LEVEL` int(1) DEFAULT NULL COMMENT '난이도',
  `ETL_NAME` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '시험명',
  `ETL_PAPER` int(2) DEFAULT NULL COMMENT '[중요] 시험지 장수',
  `ETL_DATE` date DEFAULT NULL COMMENT '시험일',
  `ETL_STATUS` int(1) NOT NULL DEFAULT '0' COMMENT '채점상태',
  `ETL_UPLOAD_STATUS` int(1) NOT NULL DEFAULT '0' COMMENT '업로드 상태',
  `ETL_COMMENT` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '시험상세',
  `ETL_REG_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '등록날짜',
  `ETL_DEL_YN` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT 'N' COMMENT '삭제여부',
  PRIMARY KEY (`ETL_SEQ`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- 테이블 데이터 scoreproject.exam_type_list:~13 rows (대략적) 내보내기
/*!40000 ALTER TABLE `exam_type_list` DISABLE KEYS */;
INSERT INTO `exam_type_list` (`ETL_SEQ`, `ETL_ROUND`, `ETL_LEVEL`, `ETL_NAME`, `ETL_PAPER`, `ETL_DATE`, `ETL_STATUS`, `ETL_UPLOAD_STATUS`, `ETL_COMMENT`, `ETL_REG_DATE`, `ETL_DEL_YN`) VALUES
	(1, 1, 0, '1학기 중간 고사', 2, '2020-08-20', 2, 0, '', '2020-08-20 19:35:50', 'N'),
	(2, 1, 2, '1학기 기말 고사', 2, '2020-08-23', 1, 2, '', '2020-08-20 19:36:37', 'N'),
	(3, 1, 1, '2학기 중간고사', 2, '2020-08-26', 0, 0, '', '2020-08-20 19:36:59', 'N'),
	(4, 2, 0, '123', 2, '2020-08-15', 0, 0, '123', '2020-08-29 16:17:23', 'N'),
	(5, 2, 0, '123', 2, '2020-08-15', 0, 0, '123', '2020-08-29 16:17:37', 'N'),
	(6, 2, 0, '123', 2, '2020-08-29', 0, 2, '123', '2020-08-29 16:20:26', 'N'),
	(7, 5, 0, '123', 3, '2020-08-29', 0, 0, '123', '2020-08-29 16:20:35', 'N'),
	(8, 3, 0, '123', 2, '2020-08-29', 0, 0, '123', '2020-08-29 16:21:33', 'N'),
	(9, 4, 0, '213', 22, '2020-08-29', 0, 2, '123', '2020-08-29 16:21:48', 'N'),
	(10, 2, 0, '213', 2, '2020-08-29', 0, 0, '123', '2020-08-29 16:21:56', 'N'),
	(11, 1, 0, '123', 2, '2020-09-04', 0, 0, '123', '2020-08-29 16:23:13', 'N'),
	(13, 1, 1, '1', 3, '1991-12-12', 0, 0, '123', '2020-08-29 16:55:05', 'N'),
	(14, 3, 2, '두민두민', 2, '2020-08-30', 0, 0, '123', '2020-08-29 16:55:40', 'N');
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
  `ULM_ID` varchar(20) NOT NULL COMMENT '아이디',
  `ULM_PWD` varchar(50) NOT NULL COMMENT '비밀번호',
  `ULM_NO` int(11) NOT NULL COMMENT '식별번호',
  `ULM_TEL` varchar(20) NOT NULL COMMENT '전화번호',
  `ULM_NAME` varchar(50) NOT NULL DEFAULT '' COMMENT '채점자이름',
  `ULM_DEL_YN` char(1) NOT NULL DEFAULT 'N' COMMENT '삭제유무',
  `ULM_REG_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '등록일',
  PRIMARY KEY (`ULM_SEQ`) USING BTREE,
  KEY `ULM_ID` (`ULM_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- 테이블 데이터 scoreproject.user_list_marker:~6 rows (대략적) 내보내기
/*!40000 ALTER TABLE `user_list_marker` DISABLE KEYS */;
INSERT INTO `user_list_marker` (`ULM_SEQ`, `ULM_ID`, `ULM_PWD`, `ULM_NO`, `ULM_TEL`, `ULM_NAME`, `ULM_DEL_YN`, `ULM_REG_DATE`) VALUES
	(1, 'test1', 'test', 1, '010-1235-4444', '김좌진', 'N', '2020-08-31 18:09:27'),
	(2, 'test2', 'test', 1, '010-1235-4224', '강감찬', 'N', '2020-08-31 18:09:27'),
	(3, 'test3', 'test', 1, '010-1235-4241', '이이', 'N', '2020-08-31 18:09:27'),
	(4, 'test4', 'test', 1, '010-1235-4342', 'test4', 'N', '2020-08-31 18:09:27'),
	(5, 'test5', 'test', 1, '010-1235-2322', 'test5', 'N', '2020-08-31 18:09:27'),
	(6, 'test6', 'test', 1, '010-1235-4777', 'test6', 'N', '2020-08-31 18:09:27');
/*!40000 ALTER TABLE `user_list_marker` ENABLE KEYS */;

-- 테이블 scoreproject.user_list_student 구조 내보내기
CREATE TABLE IF NOT EXISTS `user_list_student` (
  `ULS_SEQ` int(11) NOT NULL AUTO_INCREMENT,
  `ULS_NO` int(11) NOT NULL COMMENT '학번',
  `ULS_NAME` varchar(50) NOT NULL DEFAULT '' COMMENT '학생이름',
  `ULS_TEL` varchar(15) NOT NULL,
  `ULS_DEL_YN` char(1) NOT NULL DEFAULT 'N' COMMENT '삭제유무',
  `ULS_REG_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '등록일',
  PRIMARY KEY (`ULS_SEQ`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- 테이블 데이터 scoreproject.user_list_student:~6 rows (대략적) 내보내기
/*!40000 ALTER TABLE `user_list_student` DISABLE KEYS */;
INSERT INTO `user_list_student` (`ULS_SEQ`, `ULS_NO`, `ULS_NAME`, `ULS_TEL`, `ULS_DEL_YN`, `ULS_REG_DATE`) VALUES
	(1, 1414, '두민', 'TEST', 'N', '2020-08-31 18:07:38'),
	(2, 1313, '준호', 'TEST', 'N', '2020-08-31 18:07:38'),
	(3, 1212, '정빈', 'TEST', 'N', '2020-08-31 18:07:38'),
	(4, 1111, '인호', 'TEST', 'N', '2020-08-31 18:07:38'),
	(5, 11515, '진일', 'TEST', 'N', '2020-08-31 18:07:38'),
	(6, 15155, '현호', 'TEST', 'N', '2020-08-31 18:07:38');
/*!40000 ALTER TABLE `user_list_student` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
