<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marker extends CI_Controller {

	function __construct(){
        parent::__construct();

		// print_r($this->session->all_userdata());
        $this->load->helper('url');
        $this->load->helper('form');
		$this->load->helper('download');
		$this->load->helper('cookie');

		$this->load->library('pagination');
		$this->load->library('form_validation');
		$this->load->library('CustomClass');

		$this->load->model('ExamModel');
		$this->load->model('MarkerModel');
        $this->load->model('StudentModel');	
    }

    public function index(){
        if ($this->session->userdata("marker_id") != ""):
            redirect("http://".$_SERVER["SERVER_NAME"]."/admin", "location");
        endif;
    
        $this->load->view("login");
    }
    
    public function sign_out(){
        $this->session->sess_destroy();
        redirect("http://".$_SERVER["SERVER_NAME"]."/marker", "location");        
    }
    
    public function sign_in_proc(){
        $admin_id = isset($_POST["marker_id"]) ? $_POST["marker_id"] : "";
        $admin_pass = isset($_POST["marker_pass"]) ? $_POST["marker_pass"] : "";
    
        $user = $this->MarkerModel->markerLogin($admin_id, $admin_pass);
        //echo $this->db->last_query();
        if (empty($user)){
            echo json_encode(array("code" => "201", "msg" => "아이디 패스워드를  확인해주세요"));
        }else{
            //print_r($user);
            $session_data = array(
                                "marker_id" => $user->ULM_ID,
                                "logged_in" => TRUE,
                                "name" => $user->ULM_NAME
            );
            $this->session->set_userdata($session_data);
    
            echo json_encode(array("code" => "200"));
        }
    }
}