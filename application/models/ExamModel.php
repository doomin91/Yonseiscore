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

}

