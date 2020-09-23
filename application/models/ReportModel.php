<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportModel extends CI_Model{
    function __construct(){
        parent::__construct(); 
        $this->load->database();
    }

    public function getReportForm($wheresql){
        $SQL = "SELECT *, 
        (SELECT GROUP_CONCAT(EMLB.EML_ULM_SCORE) FROM EXAM_MATCH_LIST AS EMLB
        LEFT JOIN EXAM_PAPER_LIST EPLB ON EMLB.EML_RA_SEQ = EPLB.EPL_SEQ
        LEFT JOIN USER_LIST_STUDENT ULSB ON EPLB.EPL_STUDENT_SEQ = ULSB.ULS_SEQ
        LEFT JOIN USER_LIST_MARKER ULMB ON ULMB.ULM_SEQ = EMLB.EML_ULM_SEQ
        LEFT JOIN EXAM_QUESTION_LIST EQLB ON EQLB.EQL_SEQ = EMLB.EML_EQL_SEQ
        LEFT JOIN EXAM_TYPE_LIST ETLB ON ETLB.ETL_SEQ = EQLB.EQL_RA_SEQ
        WHERE EQLB.PARENT_SEQ = EQL.PARENT_SEQ
        AND EMLB.EML_ULM_SEQ = EML.EML_ULM_SEQ
        AND ULSB.ULS_SEQ = ULS.ULS_SEQ
        AND EPLB.EPL_SEQ = EPL.EPL_SEQ
        ) AS SUB_SCORE
        FROM EXAM_MATCH_LIST EML
        LEFT JOIN EXAM_PAPER_LIST EPL ON EML.EML_RA_SEQ = EPL.EPL_SEQ
        LEFT JOIN USER_LIST_STUDENT ULS ON EPL.EPL_STUDENT_SEQ = ULS.ULS_SEQ
        LEFT JOIN USER_LIST_MARKER ULM ON ULM.ULM_SEQ = EML.EML_ULM_SEQ
        LEFT JOIN EXAM_QUESTION_LIST EQL ON EQL.EQL_SEQ = EML.EML_EQL_SEQ
        LEFT JOIN EXAM_TYPE_LIST ETL ON ETL.ETL_SEQ = EQL.EQL_RA_SEQ
        WHERE EQL.DEPTH > 0 AND EQL.EQL_NON_TARGET = 0 AND ULS.ULS_NAME IS NOT NULL";
        
        
        if (isset($wheresql["exam_name"]) && $wheresql["exam_name"] != ""){
            $SQL = $SQL . " AND ETL.ETL_NAME ='" . $wheresql["exam_name"] . "'";;
        }
        
        if (isset($wheresql["exam_round"]) && $wheresql["exam_round"] != ""){
            $SQL = $SQL . " AND ETL.ETL_ROUND ='" . $wheresql["exam_round"] . "'";;
        }

        if (isset($wheresql["marker_name"]) && $wheresql["marker_name"] != ""){
            $SQL = $SQL . " AND ULM.ULM_NAME = '" . $wheresql["marker_name"] . "'";
        }

        return $this->db->query($SQL)->result();

    }

    public function getReportFormCount($wheresql){
        $SQL = "SELECT *, 
        (SELECT GROUP_CONCAT(EMLB.EML_ULM_SCORE) FROM EXAM_MATCH_LIST AS EMLB
        LEFT JOIN EXAM_PAPER_LIST EPLB ON EMLB.EML_RA_SEQ = EPLB.EPL_SEQ
        LEFT JOIN USER_LIST_STUDENT ULSB ON EPLB.EPL_STUDENT_SEQ = ULSB.ULS_SEQ
        LEFT JOIN USER_LIST_MARKER ULMB ON ULMB.ULM_SEQ = EMLB.EML_ULM_SEQ
        LEFT JOIN EXAM_QUESTION_LIST EQLB ON EQLB.EQL_SEQ = EMLB.EML_EQL_SEQ
        LEFT JOIN EXAM_TYPE_LIST ETLB ON ETLB.ETL_SEQ = EQLB.EQL_RA_SEQ
        WHERE EQLB.PARENT_SEQ = EQL.PARENT_SEQ
        AND EMLB.EML_ULM_SEQ = EML.EML_ULM_SEQ
        AND ULSB.ULS_SEQ = ULS.ULS_SEQ
        AND EPLB.EPL_SEQ = EPL.EPL_SEQ
        ) AS SUB_SCORE
        FROM EXAM_MATCH_LIST EML
        LEFT JOIN EXAM_PAPER_LIST EPL ON EML.EML_RA_SEQ = EPL.EPL_SEQ
        LEFT JOIN USER_LIST_STUDENT ULS ON EPL.EPL_STUDENT_SEQ = ULS.ULS_SEQ
        LEFT JOIN USER_LIST_MARKER ULM ON ULM.ULM_SEQ = EML.EML_ULM_SEQ
        LEFT JOIN EXAM_QUESTION_LIST EQL ON EQL.EQL_SEQ = EML.EML_EQL_SEQ
        LEFT JOIN EXAM_TYPE_LIST ETL ON ETL.ETL_SEQ = EQL.EQL_RA_SEQ
        WHERE EQL.DEPTH > 0 AND EQL.EQL_NON_TARGET = 0 AND ULS.ULS_NAME IS NOT NULL";
        
        
        if (isset($wheresql["exam_name"]) && $wheresql["exam_name"] != ""){
            $SQL = $SQL . " AND ETL.ETL_NAME ='" . $wheresql["exam_name"] . "'";;
        }
        
        if (isset($wheresql["exam_round"]) && $wheresql["exam_round"] != ""){
            $SQL = $SQL . " AND ETL.ETL_ROUND ='" . $wheresql["exam_round"] . "'";;
        }

        if (isset($wheresql["marker_name"]) && $wheresql["marker_name"] != ""){
            $SQL = $SQL . " AND ULM.ULM_NAME = '" . $wheresql["marker_name"] . "'";
        }


        return $this->db->query($SQL)->num_rows();

    }

    public function getReportList($wheresql){
        $SQL = "SELECT *, 
        (SELECT GROUP_CONCAT(EMLB.EML_ULM_SCORE) FROM EXAM_MATCH_LIST AS EMLB
        LEFT JOIN EXAM_PAPER_LIST EPLB ON EMLB.EML_RA_SEQ = EPLB.EPL_SEQ
        LEFT JOIN USER_LIST_STUDENT ULSB ON EPLB.EPL_STUDENT_SEQ = ULSB.ULS_SEQ
        LEFT JOIN USER_LIST_MARKER ULMB ON ULMB.ULM_SEQ = EMLB.EML_ULM_SEQ
        LEFT JOIN EXAM_QUESTION_LIST EQLB ON EQLB.EQL_SEQ = EMLB.EML_EQL_SEQ
        LEFT JOIN EXAM_TYPE_LIST ETLB ON ETLB.ETL_SEQ = EQLB.EQL_RA_SEQ
        WHERE EQLB.PARENT_SEQ = EQL.PARENT_SEQ
        AND EMLB.EML_ULM_SEQ = EML.EML_ULM_SEQ
        AND ULSB.ULS_SEQ = ULS.ULS_SEQ
        AND EPLB.EPL_SEQ = EPL.EPL_SEQ
        ) AS SUB_SCORE
        FROM EXAM_MATCH_LIST EML
        LEFT JOIN EXAM_PAPER_LIST EPL ON EML.EML_RA_SEQ = EPL.EPL_SEQ
        LEFT JOIN USER_LIST_STUDENT ULS ON EPL.EPL_STUDENT_SEQ = ULS.ULS_SEQ
        LEFT JOIN USER_LIST_MARKER ULM ON ULM.ULM_SEQ = EML.EML_ULM_SEQ
        LEFT JOIN EXAM_QUESTION_LIST EQL ON EQL.EQL_SEQ = EML.EML_EQL_SEQ
        LEFT JOIN EXAM_TYPE_LIST ETL ON ETL.ETL_SEQ = EQL.EQL_RA_SEQ
        WHERE EQL.DEPTH > 0 AND EQL.EQL_NON_TARGET = 0 AND ULS.ULS_NAME IS NOT NULL";
        
        if (isset($wheresql["exam_name"]) && $wheresql["exam_name"] != ""){
            $SQL = $SQL . " AND ETL.ETL_NAME ='" . $wheresql["exam_name"] . "'";;
        }
        
        if (isset($wheresql["exam_round"]) && $wheresql["exam_round"] != ""){
            $SQL = $SQL . " AND ETL.ETL_ROUND ='" . $wheresql["exam_round"] . "'";;
        }

        if (isset($wheresql["marker_name"]) && $wheresql["marker_name"] != ""){
            $SQL = $SQL . " AND ULM.ULM_NAME = '" . $wheresql["marker_name"] . "'";
        }

        $SQL = $SQL . " ORDER BY ULM.ULM_NAME, EML_SEQ, ULS.ULS_NO DESC ";
        $SQL = $SQL . " LIMIT " . $wheresql["start"] . "," . $wheresql["limit"];

        return $this->db->query($SQL)->result();

    }

    public function getReportListCount($wheresql){
        $SQL = "SELECT *, 
        (SELECT GROUP_CONCAT(EMLB.EML_ULM_SCORE) FROM EXAM_MATCH_LIST AS EMLB
        LEFT JOIN EXAM_PAPER_LIST EPLB ON EMLB.EML_RA_SEQ = EPLB.EPL_SEQ
        LEFT JOIN USER_LIST_STUDENT ULSB ON EPLB.EPL_STUDENT_SEQ = ULSB.ULS_SEQ
        LEFT JOIN USER_LIST_MARKER ULMB ON ULMB.ULM_SEQ = EMLB.EML_ULM_SEQ
        LEFT JOIN EXAM_QUESTION_LIST EQLB ON EQLB.EQL_SEQ = EMLB.EML_EQL_SEQ
        LEFT JOIN EXAM_TYPE_LIST ETLB ON ETLB.ETL_SEQ = EQLB.EQL_RA_SEQ
        WHERE EQLB.PARENT_SEQ = EQL.PARENT_SEQ
        AND EMLB.EML_ULM_SEQ = EML.EML_ULM_SEQ
        AND ULSB.ULS_SEQ = ULS.ULS_SEQ
        AND EPLB.EPL_SEQ = EPL.EPL_SEQ
        ) AS SUB_SCORE
        FROM EXAM_MATCH_LIST EML
        LEFT JOIN EXAM_PAPER_LIST EPL ON EML.EML_RA_SEQ = EPL.EPL_SEQ
        LEFT JOIN USER_LIST_STUDENT ULS ON EPL.EPL_STUDENT_SEQ = ULS.ULS_SEQ
        LEFT JOIN USER_LIST_MARKER ULM ON ULM.ULM_SEQ = EML.EML_ULM_SEQ
        LEFT JOIN EXAM_QUESTION_LIST EQL ON EQL.EQL_SEQ = EML.EML_EQL_SEQ
        LEFT JOIN EXAM_TYPE_LIST ETL ON ETL.ETL_SEQ = EQL.EQL_RA_SEQ
        WHERE EQL.DEPTH > 0 AND EQL.EQL_NON_TARGET = 0 AND ULS.ULS_NAME IS NOT NULL";
        
        if (isset($wheresql["exam_name"]) && $wheresql["exam_name"] != ""){
            $SQL = $SQL . " AND ETL.ETL_NAME ='" . $wheresql["exam_name"] . "'";;
        }
        
        if (isset($wheresql["exam_round"]) && $wheresql["exam_round"] != ""){
            $SQL = $SQL . " AND ETL.ETL_ROUND ='" . $wheresql["exam_round"] . "'";;
        }

        if (isset($wheresql["marker_name"]) && $wheresql["marker_name"] != ""){
            $SQL = $SQL . " AND ULM.ULM_NAME = '" . $wheresql["marker_name"] . "'";
        }

        $SQL = $SQL . " ORDER BY ULM.ULM_NAME, EML_SEQ, ULS.ULS_NO ";

        
        return $this->db->query($SQL)->num_rows();

    }
}