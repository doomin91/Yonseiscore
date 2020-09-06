<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct(){
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('form');
		$this->load->helper('download');
		$this->load->helper('cookie');

		$this->load->library('CustomClass');
		
		$this->load->model('AdminModel');
    }

    public function index(){
        if ($this->session->userdata("admin_id") != ""):
            redirect("http://".$_SERVER["SERVER_NAME"]."/admin", "location");
        endif;
		
        $this->load->view("admin/login");
    }
    
    public function sign_out(){
<<<<<<< HEAD
		$this->session->sess_destroy();
		echo $this->session->userdata("admin_id");
        // redirect("http://".$_SERVER["SERVER_NAME"]."/admin", "location");   
=======
        $this->session->sess_destroy();
        redirect("http://".$_SERVER["SERVER_NAME"]."/admin", "location");        
>>>>>>> 4c868d0d10bbe8057a7dd381aca800da6ac07d15
    }
    
    public function sign_in_proc(){
        $admin_id = isset($_POST["admin_id"]) ? $_POST["admin_id"] : "";
        $admin_pass = isset($_POST["admin_pass"]) ? $_POST["admin_pass"] : "";
<<<<<<< HEAD

		$user = $this->AdminModel->adminLogin($admin_id, $admin_pass);

        if (empty($user)){
            echo json_encode(array("code" => "202", "msg" => "아이디 패스워드를 확인해주세요"));
        }else{
=======
    
        $user = $this->AdminModel->adminLogin($admin_id, $admin_pass);
        // echo $this->db->last_query();
        // print_r($user);
        if (empty($user)){
            echo json_encode(array("code" => "202", "msg" => "아이디 패스워드를 확인해주세요"));
        }else{
            //print_r($user);
>>>>>>> 4c868d0d10bbe8057a7dd381aca800da6ac07d15
            $session_data = array(
                                "admin_id" => $user->ULA_ID,
                                "logged_in" => TRUE,
                                "name" => "관리자"
            );
            $this->session->set_userdata($session_data);
<<<<<<< HEAD
=======
        
            // print_r($this->session->userdata("admin_id"));
>>>>>>> 4c868d0d10bbe8057a7dd381aca800da6ac07d15
    
            echo json_encode(array("code" => "200"));
        }
    }

	public function adminPassword() {
		$this->load->view('./admin/header');
		$this->load->view('./admin/admin_password_v');
		$this->load->view('./admin/footer');

	}

	public function changeAdminPassword() {
		$ad_id = "admin";
		$ad_pw = $this->input->post("ad_pw");
		$ad_pw = $this->customclass->Encrypt($ad_pw);
		
		$ad_new_pw = $this->input->post("ad_new_pw");

		$data = array (
			"ad_id" => $ad_id,
			"ad_pw" => $ad_pw
		);
		
		$return = $this->ClientModel->CheckAdminPassword($data);
		
		$data = "";
		if($return)
		{

			$data = array(
				"ad_id" => $ad_id,
				// "ad_pw" => $ad_new_pw
				"ad_pw" => $this->customclass->Encrypt($ad_new_pw)
			);
			$return = $this->ClientModel->UpdateAdminPassword($data);
			if($return) 
			{
				$return_arr = array(
					'msg' => "비밀번호가 변경되었습니다."
				);
			}
		} 
		else 
		{
			$return_arr = array(
				'msg' => "비밀번호가 틀렸습니다."
			);
		}

		echo json_encode($return_arr);

	}
}