<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportModel extends CI_Model{
    function __construct(){
        parent::__construct(); 
        $this->load->database();
    }

    public function getReportList2(){
        $this->db->select("ULS_NO, ULS_NAME, ULM_NAME, EQL_SEQ, PARENT_SEQ, DEPTH, EML_ULM_SCORE, EML_COMMENT");
        $this->db->join("EXAM_PAPER_LIST AS EPL", "EML.EML_RA_SEQ = EPL.EPL_SEQ" , "LEFT");
        $this->db->join("USER_LIST_STUDENT AS ULS", "EPL.EPL_STUDENT_SEQ = ULS.ULS_SEQ" , "LEFT");
        $this->db->join("USER_LIST_MARKER AS ULM", "ULM.ULM_SEQ = EML.EML_ULM_SEQ" , "LEFT");
        $this->db->join("EXAM_QUESTION_LIST AS EQL", "EQL.EQL_SEQ = EML.EML_EQL_SEQ" , "LEFT");
        $this->db->from("EXAM_MATCH_LIST AS EML");
        $this->db->where("DEPTH", "1");
        return $this->db->get()->result();

    }

    PUBLIC FUNCTION GETREPORTLIST(){
        $SQL = "SELECT *, 
        (SELECT GROUP_CONCAT(EMLB.EML_ULM_SCORE) FROM EXAM_MATCH_LIST AS EMLB
        LEFT JOIN EXAM_PAPER_LIST EPLB ON EMLB.EML_RA_SEQ = EPLB.EPL_SEQ
        LEFT JOIN USER_LIST_STUDENT ULSB ON EPLB.EPL_STUDENT_SEQ = ULSB.ULS_SEQ
        LEFT JOIN USER_LIST_MARKER ULMB ON ULMB.ULM_SEQ = EMLB.EML_ULM_SEQ
        LEFT JOIN EXAM_QUESTION_LIST EQLB ON EQLB.EQL_SEQ = EMLB.EML_EQL_SEQ
        WHERE EQLB.PARENT_SEQ = EQL.PARENT_SEQ
        AND EMLB.EML_ULM_SEQ = EML.EML_ULM_SEQ
        AND ULSB.ULS_SEQ = ULS.ULS_SEQ
        ) AS SUB_SCORE
        FROM EXAM_MATCH_LIST EML
        LEFT JOIN EXAM_PAPER_LIST EPL ON EML.EML_RA_SEQ = EPL.EPL_SEQ
        LEFT JOIN USER_LIST_STUDENT ULS ON EPL.EPL_STUDENT_SEQ = ULS.ULS_SEQ
        LEFT JOIN USER_LIST_MARKER ULM ON ULM.ULM_SEQ = EML.EML_ULM_SEQ
        LEFT JOIN EXAM_QUESTION_LIST EQL ON EQL.EQL_SEQ = EML.EML_EQL_SEQ
        WHERE EQL.DEPTH = 1";

        return $this->db->query($SQL)->result();

    }
    
}