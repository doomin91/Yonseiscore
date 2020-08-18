<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		
		$this->load->model('ClientModel');
			
			// if ($this->session->userdata("id") == ""){
			// 	echo "<script type=\"text/javascript\">
			// 	<!--
			// 		document.location.href=\"/admin/\";
			// 	//-->
			// 	</script>";
			// 	exit;
			// }

	
		//ini_set("display_errors", "on");
		@ini_set("allow_url_fopen", "1");
	
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{
		$this->load->view('/admin/header');
		$this->load->view('/admin/dashboard');
		$this->load->view('/admin/footer');
	}
	
	public function dashboard(){
		$this->load->view('/admin/header');
		$this->load->view('/admin/dashboard');
		$this->load->view('/admin/footer');
	}

	public function notice_list(){
		$this->load->view('/admin/header');
		$this->load->view('/admin/notice_list_view');
		$this->load->view('/admin/footer');		
	}
	
	public function exam_create(){
		$this->load->view('/admin/header');
		$this->load->view('/admin/exam_create_view');
		$this->load->view('/admin/footer');
	}

	public function exam_list(){
		$this->load->view('/admin/header');
		$this->load->view('/admin/exam_list_view');
		$this->load->view('/admin/footer');
	}

	public function exam_detail(){
		$this->load->view('/admin/header');
		$this->load->view('/admin/exam_detail_view');
		$this->load->view('/admin/footer');
	}

	public function exam_check(){
		$this->load->view('/admin/header');
		$this->load->view('/admin/exam_check_view');
		$this->load->view('/admin/footer');

	}

	public function maker_create(){
		$this->load->view('/admin/header');
		$this->load->view('/admin/maker_create_view');
		$this->load->view('/admin/footer');
	}

	public function maker_list(){
		$this->load->view('/admin/header');
		$this->load->view('/admin/maker_list_view');
		$this->load->view('/admin/footer');
	}

	public function student_create(){
		$this->load->view('/admin/header');
		$this->load->view('/admin/student_create_view');
		$this->load->view('/admin/footer');
	}

	public function student_list(){
		$this->load->view('/admin/header');
		$this->load->view('/admin/student_list_view');
		$this->load->view('/admin/footer');
	}
	

	public function login(){
		$ad_id = $this->input->post('id');
		$ad_pw = $this->input->post('pw');
		// $ad_pw = $this->customclass->Encrypt($ad_pw);
		
		$data = array(
			'ad_id' => $ad_id,
			'ad_pw' => $ad_pw
		);

		$return = $this->ClientModel->CheckIdPassword($data);

		if($return){
			$newdata = array(
				'id' => $return[0]->ad_id,
				'name' => $return[0]->ad_name,
				'admin' => $return[0]->ad_is_admin,
				'logged_in' => TRUE
			);
			
			$this->session->set_userdata($newdata);
			//print_r($this->session->userdata());
			$return_arr = array(
				"code" => 200,
				"msg" => "로그인 성공",
			);
		}else{
			$return_arr = array(
				"code" => 201,
				"msg" => "아이디 혹은 비밀번호를 확인해주세요."
			);
		}

		echo json_encode($return_arr);
	} 

	public function AdminPassword() {
		$this->load->view('./admin/header');
		$this->load->view('./admin/admin_password_v');
		$this->load->view('./admin/footer');

	}

	public function ChangeAdminPassword() {
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
	
	public function logout(){
		$return = $this->session->sess_destroy();

		echo $return;
	}

}
