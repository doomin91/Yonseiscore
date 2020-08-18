<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClientModel extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    /// Main Youtube Content Model ///

    public function GetContentList() {
        $this->db->where("EUM_CONTENTS_YOUTUBE.del_yn", "N");
        return $this->db->get("EUM_CONTENTS_YOUTUBE")->result();
    }

    public function GetYoutubeAccount(){
        $this->db->where("EUM_CONTENTS_YOUTUBE.del_yn", "N");
        $this->db->from("EUM_CONTENTS_YOUTUBE");
        return $this->db->count_all_results();
    }

    public function GetYoutubePage($db_req){
        return $this->db->query("
        SELECT  *  FROM `EUM_CONTENTS_YOUTUBE` 
        WHERE `del_yn` = 'N'
        ORDER BY `seq` 
        DESC  Limit  $db_req[0], $db_req[1]
        ")->result();
    }

    public function GetContent($data){
        $this->db->where("EUM_CONTENTS_YOUTUBE.seq", $data);
        return $this->db->get("EUM_CONTENTS_YOUTUBE")->result();
    }

    public function UploadContents($data){
        return $this->db->insert('EUM_CONTENTS_YOUTUBE', $data);        
    }

    public function DeleteContents($data){
        $this->db->where("EUM_CONTENTS_YOUTUBE.seq", $data);
        return $this->db->update('EUM_CONTENTS_YOUTUBE', array("del_yn" => "Y"));
    }

    public function ModifyContents($data, $seq){
        $this->db->where("EUM_CONTENTS_YOUTUBE.seq", $seq);
        return $this->db->update("EUM_CONTENTS_YOUTUBE", $data);

    }


    /// Another Youtube Model ///
    
    public function GetAnoList() {
        $this->db->where("EUM_CONTENTS_ANOTHER.del_yn", "N");
        return $this->db->get("EUM_CONTENTS_ANOTHER")->result();
    }

    public function GetAnoAccount(){
        $this->db->where("EUM_CONTENTS_ANOTHER.del_yn", "N");
        $this->db->from("EUM_CONTENTS_ANOTHER");
        return $this->db->count_all_results();
    }

    public function GetAnoPage($db_req){
        return $this->db->query("
        SELECT  *  FROM `EUM_CONTENTS_ANOTHER` 
        WHERE `del_yn` = 'N'
        ORDER BY `seq` 
        DESC  Limit  $db_req[0], $db_req[1]
        ")->result();
    }

    public function GetAnoContent($data){
        $this->db->where("EUM_CONTENTS_ANOTHER.del_yn", "N");
        $this->db->where("EUM_CONTENTS_ANOTHER.seq", $data);
        return $this->db->get("EUM_CONTENTS_ANOTHER")->result();
    }

    public function UploadAnoContents($data){
        return $this->db->insert('EUM_CONTENTS_ANOTHER', $data);        
    }

    public function DeleteAnoContents($data){
        $this->db->where("EUM_CONTENTS_ANOTHER.seq", $data);
        return $this->db->update('EUM_CONTENTS_ANOTHER', array("DEL_YN" => "Y"));

    }

    public function ModifyAnoContents($data, $seq){
        $this->db->where("EUM_CONTENTS_ANOTHER.seq", $seq);
        return $this->db->update("EUM_CONTENTS_ANOTHER", $data);

    }
    /// CLIENT MODEL ///

    public function GetClientAccount(){
        $this->db->where("EUM_CLIENTS.cli_del_yn", "N");
        $this->db->from("EUM_CLIENTS");
        return $this->db->count_all_results();
    }


    public function GetClientPage($db_req){
        return $this->db->query("
        SELECT  *  FROM `EUM_CLIENTS` 
        WHERE `cli_del_yn` = 'N'
        ORDER BY `cli_seq` 
        DESC  Limit  $db_req[0], $db_req[1]
        ")->result();
    }

    public function CheckClients($data){
        $this->db->where("EUM_CLIENTS.cli_seq", $data);
        return $this->db->get('EUM_CLIENTS')->result();
    }

    public function UploadClients($data){
        return $this->db->insert('EUM_CLIENTS', $data);
    }

    public function DeleteClients($data){
        $this->db->where("EUM_CLIENTS.cli_seq", $data);
        return $this->db->update('EUM_CLIENTS', array("cli_del_yn" => "Y"));
    }

    public function ModifyClients($data){
        $this->db->where("EUM_CLIENTS.cli_seq", $data["cli_seq"]);
        return $this->db->update('EUM_CLIENTS', $data);
    }

    /// ADMIN PASSWORD MODEL ///

    public function CheckAdminPassword($data){
        $this->db->where("USERS.ID", $data["ID"]);
        $this->db->where("USERS.PASSWORD", $data["PASSWORD"]);
        return $this->db->get("USERS") -> result();
    }

    public function UpdateAdminPassword($data){
        $this->db->where("USERS.ID", $data["ID"]);
        return $this->db->update("USERS", $data);
        
    }

    /// PORTFOLIO PASSWORD MODEL ///

    public function CheckPortfolioPassword($data){
        $this->db->where("EUM_PORTFOLIO_USERS.po_id", $data["po_id"]);
        $this->db->where("EUM_PORTFOLIO_USERS.po_pw", $data["po_pw"]);
        return $this->db->get("EUM_PORTFOLIO_USERS") -> result();
    }

    public function UpdatePortfolioPassword($data){
        $this->db->where("EUM_PORTFOLIO_USERS.po_id", $data["po_id"]);
        return $this->db->update("EUM_PORTFOLIO_USERS", $data);
        
    }

    /// PORTFOLIO PASSWORD MODEL END  ///


    public function CheckIdPassword($data) {
        $this->db->where("USERS.ad_del_yn", 'N');
        $this->db->where("USERS.ID", $data['ID']);
        $this->db->where("USERS.PASSWORD", $data['PASSWORD']);
        return $this->db->get("USERS")->result();

    }

}

