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
		$this->load->model('MarkerModel');
    }

    public function index(){
        if ($this->session->userdata("admin_id") != ""):
            redirect("http://".$_SERVER["SERVER_NAME"]."/admin", "location");
        endif;
		
        $this->load->view("admin/login");
    }
    
    public function sign_out(){
        $this->session->sess_destroy();
        echo $this->session->userdata('admin_id');
    }
    
    public function sign_in_proc(){
        $admin_id = isset($_POST["admin_id"]) ? $_POST["admin_id"] : "";
        $admin_pass = isset($_POST["admin_pass"]) ? $_POST["admin_pass"] : "";
    
        $user = $this->AdminModel->adminLogin($admin_id, $admin_pass);
        // echo $this->db->last_query();
        // print_r($user);
        if (empty($user)){
			$user = $this->MarkerModel->markerLogin($admin_id, $admin_pass);
			if (empty($user)){
				echo json_encode(array("code" => "201", "msg" => "아이디 패스워드를  확인해주세요"));
			}else{
				//print_r($user);
				$session_data = array(
									"marker_id" => $user->ULM_ID,
									"logged_in" => TRUE,
									"name" => $user->ULM_NAME,
									"seq" => $user->ULM_SEQ
				);
				$this->session->set_userdata($session_data);
		
				echo json_encode(array("code" => "200"));
			}
        }else{
            //print_r($user);
            $session_data = array(
								"seq" => $user->ULA_SEQ,
                                "admin_id" => $user->ULA_ID,
                                "logged_in" => TRUE,
                                "name" => "관리자"
            );
            $this->session->set_userdata($session_data);
        
            // print_r($this->session->userdata("admin_id"));
    
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
