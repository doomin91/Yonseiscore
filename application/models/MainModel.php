<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainModel extends CI_Model{
    function __construct(){
        parent::__construct(); 
        $this->load->database();
    }

    public function GetClientAccount(){
        $this->db->where("EUM_CLIENTS.cli_del_yn", "N");
        $this->db->from("EUM_CLIENTS");
        return $this->db->count_all_results();
    }

    public function GetClientMore($db_req){
        return $this->db->query("
        SELECT  *  FROM `EUM_CLIENTS` 
        WHERE `cli_del_yn` = 'N'
        ORDER BY `cli_seq` 
        DESC  Limit  $db_req[0], $db_req[1]
        ")->result();
    }


    public function GetAnoAccount(){
        $this->db->where("EUM_CONTENTS_ANOTHER.del_yn", "N");
        $this->db->from("EUM_CONTENTS_ANOTHER");
        return $this->db->count_all_results();
    }

    public function GetAnoMore($db_req){
        return $this->db->query("
        SELECT  *  FROM `EUM_CONTENTS_ANOTHER` 
        WHERE `del_yn` = 'N'
        ORDER BY `seq` 
        DESC  Limit  $db_req[0], $db_req[1]
        ")->result();
    }

    public function GetContentAccount(){
        $this->db->where("EUM_CONTENTS_YOUTUBE.del_yn", "N");
        $this->db->from("EUM_CONTENTS_YOUTUBE");
        return $this->db->count_all_results();
    }

    public function GetContentMore($db_req){
        return $this->db->query("
        SELECT  *  FROM `EUM_CONTENTS_YOUTUBE` 
        WHERE `del_yn` = 'N'
        ORDER BY `seq` 
        DESC  Limit  $db_req[0], $db_req[1]
        ")->result();
    }
    
    public function GetPortfolioAdmin($data){
        $this->db->where("EUM_PORTFOLIO_USERS.po_del_yn", "N");
        $this->db->where("EUM_PORTFOLIO_USERS.po_id", $data['po_id']);
        $this->db->where("EUM_PORTFOLIO_USERS.po_pw", $data['po_pw']);
        return $this->db->get("EUM_PORTFOLIO_USERS")->result();
    }
}