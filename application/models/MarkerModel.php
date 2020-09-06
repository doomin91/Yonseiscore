<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MarkerModel extends CI_Model{
    function __construct(){
        parent::__construct(); 
        $this->load->database();
    }

<<<<<<< HEAD
    public function markerLogin($marker_id, $marker_pass){
        $this->db->where("USER_LIST_MARKER.ULM_ID", $marker_id);
        $this->db->where("USER_LIST_MARKER.ULM_PWD", $this->customclass->Encrypt($marker_pass));
        return $this->db->get("USER_LIST_MARKER")->row();
    }

=======
>>>>>>> 4c868d0d10bbe8057a7dd381aca800da6ac07d15
    public function insertMarker($whereArr){
        return $this->db->insert("USER_LIST_MARKER", $whereArr);
    }

<<<<<<< HEAD
    public function checkMarkerId($user_id){
        return $this->db->where("USER_LIST_MARKER.ULM_ID", $user_id)->from('USER_LIST_MARKER')->count_All_results();
    }

=======
>>>>>>> 4c868d0d10bbe8057a7dd381aca800da6ac07d15
    public function getMarker($whereArr){
        return $this->db->select('*')->from('USER_LIST_MARKER')
                ->order_by('ULM_SEQ', 'desc')
                ->limit($whereArr['limit'], $whereArr['start'])
                ->get()->result();
    }

    public function getMarkerCount($whereArr){
        return $this->db->from('USER_LIST_MARKER')->count_All_results();
    }

    public function updateMarker($whereArr, $seq){
        $this->db->where("USER_LIST_MARKER.ULM_SEQ", $seq);
        return $this->db->update("USER_LIST_MARKER", $whereArr);   
    }

    
}