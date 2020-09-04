<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model{
    function __construct(){
        parent::__construct(); 
        $this->load->database();
        $this->load->library('CustomClass');
    }

    public function adminLogin($admin_id, $admin_pass){
        $this->db->where("USER_LIST_ADMIN.ULA_ID", $admin_id);
        $this->db->where("USER_LIST_ADMIN.ULA_PWD", $this->customclass->Encrypt($admin_pass));
        return $this->db->get("USER_LIST_ADMIN")->row();
    }

    public function insertStudent($whereArr){
        return $this->db->insert("USER_LIST_STUDENT", $whereArr);
    }

    public function insertStudents($whereArr){
        return $this->db->insert_batch("USER_LIST_STUDENT", $whereArr);
    }

    
}