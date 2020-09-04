<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MarkerModel extends CI_Model{
    function __construct(){
        parent::__construct(); 
        $this->load->database();
    }

    public function insertMarker($whereArr){
        return $this->db->insert("USER_LIST_MARKER", $whereArr);
    }

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