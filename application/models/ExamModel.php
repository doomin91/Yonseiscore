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
        return $this->db->get("EXAM_TYPE_LIST")->result();
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

