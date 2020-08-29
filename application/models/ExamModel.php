<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExamModel extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    /// Main Youtube Content Model ///

    public function getExamList() {
        $this->db->where("EXAM_TYPE_LIST.ETL_DEL_YN", "N");
        $this->db->order_by("EXAM_TYPE_LIST.ETL_REG_DATE", 'desc');
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

    public function getQuestionsByID($EID) {
        $this->db->where("EXAM_QUESTION_LIST.EQL_DEL_YN", "N");
        $this->db->where("EXAM_QUESTION_LIST.EQL_RA_SEQ", $EID);
        return $this->db->get("EXAM_QUESTION_LIST")->result();
    }


    public function getExamListCount() {
        $this->db->where("EXAM_TYPE_LIST.ETL_DEL_YN", "N");
        return $this->db->get("EXAM_TYPE_LIST")->num_rows();
    }

    public function saveExamList($data) {
        $this->db->where("EXAM_TYPE_LIST.ETL_DEL_YN", "N");
        return $this->db->insert('EXAM_TYPE_LIST', $data);        
    }

}

