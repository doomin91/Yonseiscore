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
) ENGINE=InnoDB AUTO_INCREMENT=581 DEFAULT CHARSET=utf8;

-- 테이블 데이터 scoreproject.exam_match_list:~96 rows (대략적) 내보내기
/*!40000 ALTER TABLE `exam_match_list` DISABLE KEYS */;
INSERT INTO `exam_match_list` (`EML_SEQ`, `EML_RA_SEQ`, `EML_EQL_SEQ`, `EML_ULM_SEQ`, `EML_ULM_SCORE`, `EML_COMMENT`, `EML_STATUS`, `EML_DEL_YN`, `EML_REG_DATE`) VALUES
	(449, 152, 43, 1, '1', '테스트', '0', 'N', '2020-09-04 17:12:34'),
	(450, 152, 44, 1, '1', '테슽', '0', 'N', '2020-09-04 17:12:34'),
	(451, 152, 45, 1, '4', '정말 대책없는 녀석', '0', 'N', '2020-09-04 17:12:34'),
	(452, 152, 46, 1, '14', '테스트', '0', 'N', '2020-09-04 17:12:34'),
	(453, 152, 56, 1, '4', 'ㄴㅇ', '0', 'N', '2020-09-04 17:12:34'),
	(454, 152, 57, 1, '1', '', '0', 'N', '2020-09-04 17:12:34'),
	(455, 152, 58, 1, '1', '', '0', 'N', '2020-09-04 17:12:34'),
	(456, 152, 47, 1, '1', '', '0', 'N', '2020-09-04 17:12:34'),
	(457, 152, 48, 1, '1', '', '0', 'N', '2020-09-04 17:12:34'),
	(458, 152, 55, 1, '1', '', '0', 'N', '2020-09-04 17:12:34'),
	(459, 152, 49, 1, '1', '', '0', 'N', '2020-09-04 17:12:34'),
	(460, 152, 50, 1, '1', '', '0', 'N', '2020-09-04 17:12:34'),
	(461, 152, 51, 1, '1', '', '0', 'N', '2020-09-04 17:12:34'),
	(462, 152, 52, 1, '1', '', '0', 'N', '2020-09-04 17:12:34'),
	(463, 152, 53, 1, '1', '444', '0', 'N', '2020-09-04 17:12:34'),
	(464, 152, 54, 1, '5', '', '0', 'N', '2020-09-04 17:12:34'),
	(465, 152, 43, 2, '1', NULL, '0', 'N', '2020-09-04 17:12:34'),
	(466, 152, 44, 2, '0', NULL, '0', 'N', '2020-09-04 17:12:34'),
	(467, 152, 45, 2, '1', NULL, '0', 'N', '2020-09-04 17:12:34'),
	(468, 152, 46, 2, NULL, NULL, '0', 'N', '2020-09-04 17:12:34'),
	(469, 152, 56, 2, NULL, NULL, '0', 'N', '2020-09-04 17:12:34'),
	(470, 152, 57, 2, NULL, NULL, '0', 'N', '2020-09-04 17:12:34'),
	(471, 152, 58, 2, NULL, NULL, '0', 'N', '2020-09-04 17:12:34'),
	(472, 152, 47, 2, NULL, NULL, '0', 'N', '2020-09-04 17:12:34'),
	(473, 152, 48, 2, NULL, NULL, '0', 'N', '2020-09-04 17:12:34'),
	(474, 152, 55, 2, NULL, NULL, '0', 'N', '2020-09-04 17:12:34'),
	(475, 152, 49, 2, NULL, NULL, '0', 'N', '2020-09-04 17:12:34'),
	(476, 152, 50, 2, NULL, NULL, '0', 'N', '2020-09-04 17:12:34'),
	(477, 152, 51, 2, NULL, NULL, '0', 'N', '2020-09-04 17:12:34'),
	(478, 152, 52, 2, NULL, NULL, '0', 'N', '2020-09-04 17:12:34'),
	(479, 152, 53, 2, NULL, NULL, '0', 'N', '2020-09-04 17:12:34'),
	(480, 152, 54, 2, NULL, NULL, '0', 'N', '2020-09-04 17:12:34'),
	(481, 152, 43, 3, NULL, NULL, '0', 'N', '2020-09-04 17:12:34'),
	(482, 152, 44, 3, NULL, NULL, '0', 'N', '2020-09-04 17:12:34'),
	(483, 152, 45, 3, NULL, NULL, '0', 'N', '2020-09-04 17:12:34'),
	(484, 152, 46, 3, NULL, NULL, '0', 'N', '2020-09-04 17:12:34'),
	(485, 152, 56, 3, NULL, NULL, '0', 'N', '2020-09-04 17:12:34'),
	(486, 152, 57, 3, NULL, NULL, '0', 'N', '2020-09-04 17:12:34'),
	(487, 152, 58, 3, NULL, NULL, '0', 'N', '2020-09-04 17:12:34'),
	(488, 152, 47, 3, NULL, NULL, '0', 'N', '2020-09-04 17:12:34'),
	(489, 152, 48, 3, NULL, NULL, '0', 'N', '2020-09-04 17:12:34'),
	(490, 152, 55, 3, NULL, NULL, '0', 'N', '2020-09-04 17:12:34'),
	(491, 152, 49, 3, NULL, NULL, '0', 'N', '2020-09-04 17:12:34'),
	(492, 152, 50, 3, NULL, NULL, '0', 'N', '2020-09-04 17:12:34'),
	(493, 152, 51, 3, NULL, NULL, '0', 'N', '2020-09-04 17:12:34'),
	(494, 152, 52, 3, NULL, NULL, '0', 'N', '2020-09-04 17:12:34'),
	(495, 152, 53, 3, NULL, '테스트', '0', 'N', '2020-09-04 17:12:34'),
	(496, 152, 54, 3, NULL, NULL, '0', 'N', '2020-09-04 17:12:34'),
	(497, 151, 43, 1, NULL, NULL, '0', 'N', '2020-09-04 17:12:34'),
	(498, 151, 44, 1, NULL, NULL, '0', 'N', '2020-09-04 17:12:34'),
	(499, 151, 45, 1, NULL, NULL, '0', 'N', '2020-09-04 17:12:34'),
	(500, 151, 46, 1, NULL, NULL, '0', 'N', '2020-09-04 17:12:34'),
	(501, 151, 56, 1, NULL, NULL, '0', 'N', '2020-09-04 17:12:34'),
	(502, 151, 57, 1, NULL, NULL, '0', 'N', '2020-09-04 17:12:34'),
	(503, 151, 58, 1, NULL, NULL, '0', 'N', '2020-09-04 17:12:34'),
	(504, 151, 47, 1, NULL, NULL, '0', 'N', '2020-09-04 17:12:34'),
	(505, 151, 48, 1, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(506, 151, 55, 1, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(507, 151, 49, 1, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(508, 151, 50, 1, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(509, 151, 51, 1, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(510, 151, 52, 1, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(511, 151, 53, 1, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(512, 151, 54, 1, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(513, 151, 43, 2, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(514, 151, 44, 2, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(515, 151, 45, 2, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(516, 151, 46, 2, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(517, 151, 56, 2, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(518, 151, 57, 2, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(519, 151, 58, 2, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(520, 151, 47, 2, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(521, 151, 48, 2, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(522, 151, 55, 2, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(523, 151, 49, 2, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(524, 151, 50, 2, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(525, 151, 51, 2, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(526, 151, 52, 2, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(527, 151, 53, 2, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(528, 151, 54, 2, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(529, 151, 43, 3, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(530, 151, 44, 3, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(531, 151, 45, 3, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(532, 151, 46, 3, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(533, 151, 56, 3, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(534, 151, 57, 3, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(535, 151, 58, 3, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(536, 151, 47, 3, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(537, 151, 48, 3, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(538, 151, 55, 3, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(539, 151, 49, 3, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(540, 151, 50, 3, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(541, 151, 51, 3, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(542, 151, 52, 3, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(543, 151, 53, 3, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(544, 151, 54, 3, NULL, NULL, '0', 'N', '2020-09-04 17:12:35'),
	(545, 157, 73, 1, NULL, NULL, '0', 'N', '2020-09-06 17:17:47'),
	(546, 157, 74, 1, NULL, NULL, '0', 'N', '2020-09-06 17:17:47'),
	(547, 157, 75, 1, NULL, NULL, '0', 'N', '2020-09-06 17:17:47'),
	(548, 157, 73, 2, NULL, NULL, '0', 'N', '2020-09-06 17:17:48'),
	(549, 157, 74, 2, NULL, NULL, '0', 'N', '2020-09-06 17:17:48'),
	(550, 157, 75, 2, NULL, NULL, '0', 'N', '2020-09-06 17:17:48'),
	(551, 157, 73, 7, NULL, NULL, '0', 'N', '2020-09-06 17:17:48'),
	(552, 157, 74, 7, NULL, NULL, '0', 'N', '2020-09-06 17:17:48'),
	(553, 157, 75, 7, NULL, NULL, '0', 'N', '2020-09-06 17:17:48'),
	(554, 156, 73, 1, NULL, NULL, '0', 'N', '2020-09-06 17:17:48'),
	(555, 156, 74, 1, NULL, NULL, '0', 'N', '2020-09-06 17:17:48'),
	(556, 156, 75, 1, NULL, NULL, '0', 'N', '2020-09-06 17:17:48'),
	(557, 156, 73, 2, NULL, NULL, '0', 'N', '2020-09-06 17:17:48'),
	(558, 156, 74, 2, NULL, NULL, '0', 'N', '2020-09-06 17:17:48'),
	(559, 156, 75, 2, NULL, NULL, '0', 'N', '2020-09-06 17:17:48'),
	(560, 156, 73, 7, '2', '3', '0', 'N', '2020-09-06 17:17:48'),
	(561, 156, 74, 7, '2', '3', '0', 'N', '2020-09-06 17:17:48'),
	(562, 156, 75, 7, '2', '3', '0', 'N', '2020-09-06 17:17:48'),
	(563, 155, 73, 1, NULL, NULL, '0', 'N', '2020-09-06 17:17:48'),
	(564, 155, 74, 1, NULL, NULL, '0', 'N', '2020-09-06 17:17:48'),
	(565, 155, 75, 1, NULL, NULL, '0', 'N', '2020-09-06 17:17:48'),
	(566, 155, 73, 2, NULL, NULL, '0', 'N', '2020-09-06 17:17:48'),
	(567, 155, 74, 2, NULL, NULL, '0', 'N', '2020-09-06 17:17:48'),
	(568, 155, 75, 2, NULL, NULL, '0', 'N', '2020-09-06 17:17:48'),
	(569, 155, 73, 7, NULL, NULL, '0', 'N', '2020-09-06 17:17:48'),
	(570, 155, 74, 7, NULL, NULL, '0', 'N', '2020-09-06 17:17:48'),
	(571, 155, 75, 7, NULL, NULL, '0', 'N', '2020-09-06 17:17:48'),
	(572, 154, 73, 1, NULL, NULL, '0', 'N', '2020-09-06 17:17:48'),
	(573, 154, 74, 1, NULL, NULL, '0', 'N', '2020-09-06 17:17:48'),
	(574, 154, 75, 1, NULL, NULL, '0', 'N', '2020-09-06 17:17:48'),
	(575, 154, 73, 2, NULL, NULL, '0', 'N', '2020-09-06 17:17:48'),
	(576, 154, 74, 2, NULL, NULL, '0', 'N', '2020-09-06 17:17:48'),
	(577, 154, 75, 2, NULL, NULL, '0', 'N', '2020-09-06 17:17:48'),
	(578, 154, 73, 7, NULL, NULL, '0', 'N', '2020-09-06 17:17:48'),
	(579, 154, 74, 7, NULL, NULL, '0', 'N', '2020-09-06 17:17:48'),
	(580, 154, 75, 7, NULL, NULL, '0', 'N', '2020-09-06 17:17:48');
/*!40000 ALTER TABLE `exam_match_list` ENABLE KEYS */;

-- 테이블 scoreproject.exam_paper_attach 구조 내보내기
CREATE TABLE IF NOT EXISTS `exam_paper_attach` (
  `ATTACH_SEQ` int(11) NOT NULL AUTO_INCREMENT,
  `PAPER_SEQ` int(11) DEFAULT NULL,
  `FILE_PATH` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FILE_NAME` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ATTACH_SEQ`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=184 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 데이터 scoreproject.exam_paper_attach:~4 rows (대략적) 내보내기
/*!40000 ALTER TABLE `exam_paper_attach` DISABLE KEYS */;
INSERT INTO `exam_paper_attach` (`ATTACH_SEQ`, `PAPER_SEQ`, `FILE_PATH`, `FILE_NAME`) VALUES
	(173, 151, '/upload/TEST/140.png', 'scan004.png'),
	(174, 151, '/upload/TEST/141.png', 'scan005.png'),
	(175, 152, '/upload/TEST/142.png', 'scan006.png'),
	(176, 152, '/upload/TEST/143.png', 'scan007.png'),
	(177, 153, '/upload/TEST/130.png', 'scan005.png'),
	(178, 153, '/upload/TEST/131.png', 'scan006.png'),
	(179, 153, '/upload/TEST/132.png', 'scan007.png'),
	(180, 154, '/upload/TEST/220.png', 'scan004.png'),
	(181, 155, '/upload/TEST/221.png', 'scan005.png'),
	(182, 156, '/upload/TEST/222.png', 'scan006.png'),
	(183, 157, '/upload/TEST/223.png', 'scan007.png');
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
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=utf8;

-- 테이블 데이터 scoreproject.exam_paper_list:~2 rows (대략적) 내보내기
/*!40000 ALTER TABLE `exam_paper_list` DISABLE KEYS */;
INSERT INTO `exam_paper_list` (`EPL_SEQ`, `EPL_RA_SEQ`, `EPL_STUDENT_SEQ`, `EPL_STATUS`, `EPL_REG_DATE`, `EPL_DEL_YN`) VALUES
	(151, 14, NULL, 0, '2020-09-04 17:12:21', 'N'),
	(152, 14, NULL, 0, '2020-09-04 17:12:21', 'N'),
	(153, 13, NULL, 0, '2020-09-06 15:12:44', 'N'),
	(154, 22, NULL, 0, '2020-09-06 17:17:32', 'N'),
	(155, 22, NULL, 0, '2020-09-06 17:17:32', 'N'),
	(156, 22, NULL, 0, '2020-09-06 17:17:32', 'N'),
	(157, 22, NULL, 0, '2020-09-06 17:17:32', 'N');
/*!40000 ALTER TABLE `exam_paper_list` ENABLE KEYS */;

-- 테이블 scoreproject.exam_paper_marker 구조 내보내기
CREATE TABLE IF NOT EXISTS `exam_paper_marker` (
  `EPM_SEQ` int(11) NOT NULL AUTO_INCREMENT,
  `EPM_RA_SEQ` int(11) DEFAULT NULL,
  `EPM_ULM_SEQ` int(11) DEFAULT '0',
  `EPM_STATUS` int(11) DEFAULT '0',
  PRIMARY KEY (`EPM_SEQ`)
) ENGINE=InnoDB AUTO_INCREMENT=380 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 데이터 scoreproject.exam_paper_marker:~6 rows (대략적) 내보내기
/*!40000 ALTER TABLE `exam_paper_marker` DISABLE KEYS */;
INSERT INTO `exam_paper_marker` (`EPM_SEQ`, `EPM_RA_SEQ`, `EPM_ULM_SEQ`, `EPM_STATUS`) VALUES
	(359, 152, 1, 0),
	(360, 152, 2, 0),
	(361, 152, 3, 0),
	(362, 151, 1, 0),
	(363, 151, 2, 0),
	(364, 151, 3, 0),
	(365, 153, 1, 0),
	(366, 153, 2, 0),
	(367, 153, 3, 0),
	(368, 157, 1, 0),
	(369, 157, 2, 0),
	(370, 157, 7, 0),
	(371, 156, 1, 0),
	(372, 156, 2, 0),
	(373, 156, 7, 0),
	(374, 155, 1, 0),
	(375, 155, 2, 0),
	(376, 155, 7, 0),
	(377, 154, 1, 0),
	(378, 154, 2, 0),
	(379, 154, 7, 0);
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
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

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
	(58, 14, 43, 2, 0, 9, NULL, '2020-09-01 14:22:39', 'N'),
	(59, 18, 59, 1, 0, 3, NULL, '2020-09-06 17:02:52', 'N'),
	(60, 18, 60, 1, 1, 3, NULL, '2020-09-06 17:03:02', 'N'),
	(61, 18, 59, 2, 0, 3, NULL, '2020-09-06 17:03:12', 'N'),
	(62, 18, 59, 2, 2, 3, NULL, '2020-09-06 17:03:22', 'N'),
	(63, 18, 63, 1, 1, 3, NULL, '2020-09-06 17:03:33', 'N'),
	(64, 18, 64, 1, 0, 5, NULL, '2020-09-06 17:03:56', 'N'),
	(65, 18, 60, 2, 1, 3, NULL, '2020-09-06 17:04:13', 'N'),
	(66, 19, 66, 1, 1, 3, NULL, '2020-09-06 17:09:01', 'N'),
	(67, 19, 67, 1, 1, 4, NULL, '2020-09-06 17:09:09', 'N'),
	(68, 19, 68, 1, 0, 3, NULL, '2020-09-06 17:09:19', 'N'),
	(69, 19, 67, 2, 0, 3, NULL, '2020-09-06 17:09:29', 'N'),
	(70, 19, 68, 2, 2, 5, NULL, '2020-09-06 17:09:39', 'N'),
	(71, 19, 71, 1, 0, 2, NULL, '2020-09-06 17:09:48', 'N'),
	(72, 19, 72, 1, 0, 2, NULL, '2020-09-06 17:09:59', 'N'),
	(73, 22, 73, 1, 1, 1, NULL, '2020-09-06 17:13:05', 'N'),
	(74, 22, 74, 1, 1, 2, NULL, '2020-09-06 17:13:12', 'N'),
	(75, 22, 75, 1, 1, 4, NULL, '2020-09-06 17:13:20', 'N');
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

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
	(14, 3, 2, '두민두민', 2, '2020-08-30', 0, 0, '123', '2020-08-29 16:55:40', 'N'),
	(18, 1, 2, 'TEST', 2, '2020-09-05', 0, 0, 'TEST', '2020-09-06 17:02:31', 'N'),
	(19, 2, 2, '2', NULL, '2020-08-30', 0, 0, 'TEST', '2020-09-06 17:08:39', 'N'),
	(20, 2, 0, '2', NULL, '0000-00-00', 0, 0, '2', '2020-09-06 17:11:19', 'N'),
	(21, 3, 1, '3', NULL, '2020-08-30', 0, 0, '3', '2020-09-06 17:12:18', 'N'),
	(22, 1, 1, '1', 1, '2020-09-05', 0, 0, '1', '2020-09-06 17:12:53', 'N');
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
	(1, 'admin', 'QmNqU2NtUU9OR0IvRHBPYmtqKzUwUT09', 'N', '2020-08-20 20:20:01');
/*!40000 ALTER TABLE `user_list_admin` ENABLE KEYS */;

-- 테이블 scoreproject.user_list_marker 구조 내보내기
CREATE TABLE IF NOT EXISTS `user_list_marker` (
  `ULM_SEQ` int(11) NOT NULL AUTO_INCREMENT,
  `ULM_ID` varchar(20) NOT NULL COMMENT '아이디',
  `ULM_PWD` varchar(50) NOT NULL COMMENT '비밀번호',
  `ULM_NO` varchar(20) NOT NULL COMMENT '식별번호',
  `ULM_TEL` varchar(20) NOT NULL COMMENT '전화번호',
  `ULM_NAME` varchar(50) NOT NULL DEFAULT '' COMMENT '채점자이름',
  `ULM_DEL_YN` char(1) NOT NULL DEFAULT 'N' COMMENT '삭제유무',
  `ULM_REG_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '등록일',
  PRIMARY KEY (`ULM_SEQ`) USING BTREE,
  KEY `ULM_ID` (`ULM_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- 테이블 데이터 scoreproject.user_list_marker:~6 rows (대략적) 내보내기
/*!40000 ALTER TABLE `user_list_marker` DISABLE KEYS */;
INSERT INTO `user_list_marker` (`ULM_SEQ`, `ULM_ID`, `ULM_PWD`, `ULM_NO`, `ULM_TEL`, `ULM_NAME`, `ULM_DEL_YN`, `ULM_REG_DATE`) VALUES
	(1, 'test1', 'QmNqU2NtUU9OR0IvRHBPYmtqKzUwUT09', '1', '010-1235-4444', '김좌진', 'N', '2020-08-31 18:09:27'),
	(2, 'test2', 'QmNqU2NtUU9OR0IvRHBPYmtqKzUwUT09', '1', '010-1235-4224', '강감찬', 'N', '2020-08-31 18:09:27'),
	(3, 'test3', 'QmNqU2NtUU9OR0IvRHBPYmtqKzUwUT09', '1', '010-1235-4241', '이이', 'N', '2020-08-31 18:09:27'),
	(4, 'test4', 'QmNqU2NtUU9OR0IvRHBPYmtqKzUwUT09', '1', '010-1235-4342', 'test4', 'N', '2020-08-31 18:09:27'),
	(5, 'test5', 'QmNqU2NtUU9OR0IvRHBPYmtqKzUwUT09', '1', '010-1235-2322', 'test5', 'N', '2020-08-31 18:09:27'),
	(6, 'test6', 'QmNqU2NtUU9OR0IvRHBPYmtqKzUwUT09', '1', '010-1235-4777', 'test6', 'N', '2020-08-31 18:09:27'),
	(7, 'test10', 'QmNqU2NtUU9OR0IvRHBPYmtqKzUwUT09', '11112', '010-2977-2122', '테스터', 'N', '2020-09-06 17:01:04');
/*!40000 ALTER TABLE `user_list_marker` ENABLE KEYS */;

-- 테이블 scoreproject.user_list_student 구조 내보내기
CREATE TABLE IF NOT EXISTS `user_list_student` (
  `ULS_SEQ` int(11) NOT NULL AUTO_INCREMENT,
  `ULS_NO` varchar(20) NOT NULL COMMENT '학번',
  `ULS_NAME` varchar(50) NOT NULL DEFAULT '' COMMENT '학생이름',
  `ULS_TEL` varchar(20) NOT NULL,
  `ULS_DEL_YN` char(1) NOT NULL DEFAULT 'N' COMMENT '삭제유무',
  `ULS_REG_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '등록일',
  PRIMARY KEY (`ULS_SEQ`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- 테이블 데이터 scoreproject.user_list_student:~6 rows (대략적) 내보내기
/*!40000 ALTER TABLE `user_list_student` DISABLE KEYS */;
INSERT INTO `user_list_student` (`ULS_SEQ`, `ULS_NO`, `ULS_NAME`, `ULS_TEL`, `ULS_DEL_YN`, `ULS_REG_DATE`) VALUES
	(1, '1414', '두민', 'TEST', 'N', '2020-08-31 18:07:38'),
	(2, '1313', '준호', 'TEST', 'N', '2020-08-31 18:07:38'),
	(3, '1212', '정빈', 'TEST', 'N', '2020-08-31 18:07:38'),
	(4, '1111', '인호', 'TEST', 'N', '2020-08-31 18:07:38'),
	(5, '11515', '진일', 'TEST', 'N', '2020-08-31 18:07:38'),
	(6, '15155', '현호', 'TEST', 'N', '2020-08-31 18:07:38');
/*!40000 ALTER TABLE `user_list_student` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
