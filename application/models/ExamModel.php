<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExamModel extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->DATAbase();
    }

    /// Main Youtube Content Model ///

    public function getExamList() {
        $this->db->where("EXAM_TYPE_LIST.ETL_DEL_YN", "N");
        $this->db->order_by("EXAM_TYPE_LIST.ETL_REG_DATE", 'DESC');
        return $this->db->get("EXAM_TYPE_LIST")->result();
    }

    public function getExamListByID($EID) {
        $this->db->where("EXAM_TYPE_LIST.ETL_DEL_YN", "N");
        $this->db->where("EXAM_TYPE_LIST.ETL_SEQ", $EID);
        return $this->db->get("EXAM_TYPE_LIST")->result();
    }

    public function getPaperListByID($EID) {
        $this->db->where("EXAM_PAPER_LIST.EPL_DEL_YN", "N");
        $this->db->where("EXAM_PAPER_LIST.EPL_RA_SEQ", $EID);
        $this->db->from("EXAM_PAPER_LIST");
        $this->db->join("USER_LIST_STUDENT", "EXAM_PAPER_LIST.EPL_STUDENT_SEQ = USER_LIST_STUDENT.ULS_SEQ");
        return $this->db->get()->result();
    }

    public function getPaperCntByID($EID) {
        $this->db->where("EXAM_PAPER_LIST.EPL_DEL_YN", "N");
        $this->db->where("EXAM_PAPER_LIST.EPL_RA_SEQ", $EID);
        return $this->db->get("EXAM_PAPER_LIST")->num_rows();
    }

    public function getQuestionsCountByID($EID) {
        $this->db->where("EXAM_QUESTION_LIST.EQL_DEL_YN", "N");
        $this->db->where("EXAM_QUESTION_LIST.EQL_RA_SEQ", $EID);
        return $this->db->get("EXAM_QUESTION_LIST")->num_rows();
    }

    public function getQuestionBySEQ($SEQ) {
        $this->db->where("EXAM_QUESTION_LIST.EQL_DEL_YN", "N");
        $this->db->where("EXAM_QUESTION_LIST.EQL_SEQ", $SEQ);
        return $this->db->get("EXAM_QUESTION_LIST")->result();
    }

    public function updateQuestionBySEQ($SEQ, $DATA) {
        $this->db->where("EXAM_QUESTION_LIST.EQL_DEL_YN", "N");
        $this->db->where("EXAM_QUESTION_LIST.EQL_SEQ", $SEQ);
        return $this->db->update("EXAM_QUESTION_LIST", $DATA);
    }

    public function getQuestionsByID($EID) {
        $this->db->where("EXAM_QUESTION_LIST.EQL_DEL_YN", "N");
        $this->db->where("EXAM_QUESTION_LIST.EQL_RA_SEQ", $EID);
        $this->db->order_by("EXAM_QUESTION_LIST.PARENT_SEQ");

        return $this->db->get("EXAM_QUESTION_LIST")->result();
    }

    public function getExamListCount() {
        $this->db->where("EXAM_TYPE_LIST.ETL_DEL_YN", "N");
        return $this->db->get("EXAM_TYPE_LIST")->num_rows();
    }

    public function saveExamList($DATA) {
        $this->db->where("EXAM_TYPE_LIST.ETL_DEL_YN", "N");
        return $this->db->insert('EXAM_TYPE_LIST', $DATA);        
    }

    public function saveQuestion($DATA) {
        $this->db->where("EXAM_QUESTION_LIST.EQL_DEL_YN", "N");
        return $this->db->insert('EXAM_QUESTION_LIST', $DATA);        
    }


    public function addQuestionBelow($DATA){
        $this->db->where("EXAM_QUESTION_LIST.EQL_DEL_YN", "N");
        return $this->db->insert('EXAM_QUESTION_LIST', $DATA);        
    }
    public function delQuestion($SEQ) {
        $this->db->where("EXAM_QUESTION_LIST.EQL_SEQ", $SEQ);
        return $this->db->delete("EXAM_QUESTION_LIST");
    }

    public function getSequence(){
        return $this->db->query("SELECT MAX(EQL_SEQ) FROM EXAM_QUESTION_LIST")->result();
    }

    public function getMarkers($SEQ){
        $this->db->select("USER_LIST_MARKER.ULM_NAME");
        $this->db->distinct("USER_LIST_MARKER.ULM_NAME");
        $this->db->where("EXAM_MATCH_LIST.EML_DEL_YN", "N");
        $this->db->where("EXAM_MATCH_LIST.EML_RA_SEQ", $SEQ);
        $this->db->from("EXAM_MATCH_LIST");
        $this->db->join("USER_LIST_MARKER", "EXAM_MATCH_LIST.EML_ULM_SEQ = USER_LIST_MARKER.ULM_SEQ");
        return $this->db->get()->result();
    }

    public function getStudentBySEQ($SEQ){
        $this->db->where("USER_LIST_STUDENT.ULS_DEL_YN", "N");
        $this->db->where("USER_LIST_STUDENT.ULS_SEQ", $SEQ);
        return $this->db->get("USER_LIST_STUDENT")->result();
    }

    public function getMatchInfoBySEQ($SEQ){
        $this->db->where("EXAM_MATCH_LIST.EML_DEL_YN", "N");
        $this->db->where("EXAM_MATCH_LIST.EML_RA_SEQ", $SEQ);
        $this->db->order_by("EXAM_MATCH_LIST.EML_ULM_SEQ");

        return $this->db->get("EXAM_MATCH_LIST")->result();
    }
}

