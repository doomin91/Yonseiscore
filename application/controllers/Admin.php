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
		
		$this->load->model('ExamModel');
			
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

	public function noticeList(){
		$this->load->view('/admin/header');
		$this->load->view('/admin/notice_list_view');
		$this->load->view('/admin/footer');		
	}
	
	public function examCreate(){
		$EID = $this->input->get("EID");

		$DATA["LIST"] = $this->ExamModel->getExamListByID($EID);
		$DATA["QUESTIONS"] = $this->ExamModel->getQuestionsByID($EID);
		$DATA["QUESTIONS_CNT"] = $this->ExamModel->getQuestionsCountByID($EID);
		$this->load->view('/admin/header');
		$this->load->view('/admin/exam_create_view', $DATA);
		$this->load->view('/admin/footer');
	}

	public function examList(){
		$DATA["LIST"] = $this->ExamModel->getExamList();
		$DATA["LIST_COUNT"] = $this->ExamModel->getExamListCount();
		$this->load->view('/admin/header');
		$this->load->view('/admin/exam_list_view' , $DATA);
		$this->load->view('/admin/footer');
	}

	public function paperList(){
		$DATA["LIST"] = $this->ExamModel->getExamList();
		$DATA["LIST_COUNT"] = $this->ExamModel->getExamListCount();
		$this->load->view('/admin/header');
		$this->load->view('/admin/paper_list_view' , $DATA);
		$this->load->view('/admin/footer');
	}

	public function paperCreate(){
		$EID = $this->input->get("EID");

		$DATA["LIST"] = $this->ExamModel->getExamListByID($EID);
		$DATA["PAPER_LIST"] = $this->ExamModel->getPaperListByID($EID);
		$DATA["PAPER_LIST_CNT"] = $this->ExamModel->getPaperCntByID($EID);
		$this->load->view('/admin/header');
		$this->load->view('/admin/paper_create_view', $DATA);
		$this->load->view('/admin/footer');
	}

	public function paperDetail(){
		$EID = $this->input->get("EID");
		$SEQ = $this->input->get("SEQ");
		$STUDENT_SEQ = $this->input->get("ST");

		$DATA["LIST"] = $this->ExamModel->getExamListByID($EID);
		$DATA["STUDENT_LIST"] = $this->ExamModel->getStudentBySEQ($STUDENT_SEQ);
		$DATA["MARKER_LIST"] = $this->ExamModel->getMarkers($SEQ);

		$this->load->view('/admin/header');
		$this->load->view('/admin/paper_detail_view', $DATA);
		$this->load->view('/admin/footer');

	}

	public function examDetail(){
		$this->load->view('/admin/header');
		$this->load->view('/admin/exam_detail_view');
		$this->load->view('/admin/footer');
	}

	public function examCheck(){
		$this->load->view('/admin/header');
		$this->load->view('/admin/exam_check_view');
		$this->load->view('/admin/footer');

	}

	public function examCreateDetail(){
		$this->load->view('/admin/header');
		$this->load->view('/admin/exam_create_detail_view');
		$this->load->view('/admin/footer');
		
	}

	public function markerCreate(){
		$this->load->view('/admin/header');
		$this->load->view('/admin/marker_create_view');
		$this->load->view('/admin/footer');
	}

	public function markerList(){
		$this->load->view('/admin/header');
		$this->load->view('/admin/marker_list_view');
		$this->load->view('/admin/footer');
	}

	public function studentCreate(){
		$this->load->view('/admin/header');
		$this->load->view('/admin/student_create_view');
		$this->load->view('/admin/footer');
	}

	public function studentList(){
		$this->load->view('/admin/header');
		$this->load->view('/admin/student_list_view');
		$this->load->view('/admin/footer');
	}
	
	public function reportView(){
		$this->load->view('/admin/header');
		$this->load->view('/admin/report_view');
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
	
	public function logout(){
		$return = $this->session->sess_destroy();

		echo $return;
	}

}
