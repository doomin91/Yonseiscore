<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentModel extends CI_Model{
    function __construct(){
        parent::__construct(); 
        $this->load->database();
    }

    public function insertStudent($whereArr){
        return $this->db->insert("USER_LIST_STUDENT", $whereArr);
    }

    public function insertStudents($whereArr){
        return $this->db->insert_batch("USER_LIST_STUDENT", $whereArr);
    }

<<<<<<< HEAD
    public function checkStudentNo($user_id){
        return $this->db->where("USER_LIST_STUDENT.ULS_NO", $user_id)->from('USER_LIST_STUDENT')->count_All_results();
    }

=======
>>>>>>> 4c868d0d10bbe8057a7dd381aca800da6ac07d15
    public function getStudent($whereArr){
        if (isset($whereArr["search"]) && $whereArr["search"] != ""){
            $this->db->group_start();
            $this->db->like('ULS_NAME', $whereArr["search"]);
            $this->db->or_like("ULS_NO", $whereArr["search"]);
            $this->db->group_end();
        }
        return $this->db->select('*')->from('USER_LIST_STUDENT')
                ->where('ULS_DEL_YN', 'N')
                ->order_by('ULS_SEQ', 'desc')
                ->limit($whereArr['limit'], $whereArr['start'])
                ->get()->result();
    }

    public function getStudentCount($whereArr){
        if (isset($whereArr["search"]) && $whereArr["search"] != ""){
            $this->db->group_start();
            $this->db->like('ULS_NAME', $whereArr["search"]);
            $this->db->or_like('ULS_NO', $whereArr["search"]);
            $this->db->group_end();
        }
        return $this->db->where('ULS_DEL_YN', 'N')->from('USER_LIST_STUDENT')->count_All_results();
    }

    public function updateStudent($whereArr, $seq){
        $this->db->where("USER_LIST_STUDENT.ULS_SEQ", $seq);
<<<<<<< HEAD
        return $this->db->update("USER_LIST_STUDENT", $whereArr);
=======
        return $this->db->update("USER_LIST_STUDENT", $whereArr);   
>>>>>>> 4c868d0d10bbe8057a7dd381aca800da6ac07d15
    }
    
}