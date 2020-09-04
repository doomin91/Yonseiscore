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
		$this->load->library("PHPExcel");
		
		$this->load->model('ExamModel');
		$this->load->model('MarkerModel');
		$this->load->model('StudentModel');
		$this->load->model('AdminModel');

		if ($this->session->userdata("admin_id") == ""){
			echo "<script type=\"text/javascript\">
			<!--
				document.location.href=\"/auth/\";
			//-->
			</script>";
			exit;
		}

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

		if ($this->session->userdata("id") == "admin"){
			$DATA["LIST"] = $this->ExamModel->getExamList();
			$DATA["LIST_COUNT"] = $this->ExamModel->getExamListCount();	
		} else {
			$DATA["LIST"] = $this->ExamModel->getExamList();
			$DATA["LIST_COUNT"] = $this->ExamModel->getExamListCount();	
		}
		
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
		$DATA["MARKER_LIST"] = $this->ExamModel->getMarkerList();
		$this->load->view('/admin/header');
		$this->load->view('/admin/paper_create_view', $DATA);
		$this->load->view('/admin/footer');
	}

	public function paperCheck(){
		$EID = $this->input->get("EID");

		$DATA["LIST"] = $this->ExamModel->getExamListByID($EID);
		$DATA["PAPER_LIST"] = $this->ExamModel->getPaperListByID($EID);
		$DATA["PAPER_LIST_CNT"] = $this->ExamModel->getPaperCntByID($EID);
		$DATA["MARKER_LIST"] = $this->ExamModel->getMarkerList();
		$this->load->view('/admin/header');
		$this->load->view('/admin/paper_check_view', $DATA);
		$this->load->view('/admin/footer');
	}

	public function paperCheckDetail(){
		$EID = $this->input->get("EID");
		$SEQ = $this->input->get("SEQ");
		$STUDENT_SEQ = $this->input->get("ST");

		$DATA["LIST"] = $this->ExamModel->getExamListByID($EID);
		$DATA["STUDENT_LIST"] = $this->ExamModel->getStudentBySEQ($STUDENT_SEQ);
		$DATA["MARKER_LIST"] = $this->ExamModel->getMarkers($SEQ);

		$this->load->view('/admin/header');
		$this->load->view('/admin/paper_check_detail_view', $DATA);
		$this->load->view('/admin/footer');
	}

	public function paperDetail(){
		$EID = $this->input->get("EID");
		$SEQ = $this->input->get("SEQ");

		$DATA["LIST"] = $this->ExamModel->getExamListByID($EID);
		$DATA["STUDENT_LIST"] = $this->ExamModel->getStudent();
		$DATA["MARKER_LIST"] = $this->ExamModel->getMarkers($SEQ);
		$DATA["ATTACH_LIST"] = $this->ExamModel->getAttachList($SEQ);

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
		$insert_arr = array(
			"ULM_ID" => $this->input->post('id'),
			"ULM_PWD" => $this->customclass->Encrypt($this->input->post('passwd')),
			"ULM_NO" => $this->input->post('no'),
			"ULM_TEL" => $this->input->post('tel'),
			"ULM_NAME" => $this->input->post('name'),
			"ULM_DEL_YN" => $this->input->post('state'),
			"ULM_REG_DATE" => date("Y-m-d H:i:s"),
		);

		$result = $this->MarkerModel->insertMarker($insert_arr);

		if($result)
			echo json_encode(array("code" => "200"));
		else
			echo json_encode(array("code" => "202", "msg" => $logs));
	}

	public function markerModify(){
		$update_arr = array(
			"ULM_ID" => $this->input->post('id'),
			"ULM_NO" => $this->input->post('no'),
			"ULM_TEL" => $this->input->post('tel'),
			"ULM_NAME" => $this->input->post('name'),
			"ULM_DEL_YN" => $this->input->post('state'),
			"ULM_REG_DATE" => date("Y-m-d H:i:s"),
		);

		if($this->input->post('passwd') != ""){
			$update_arr["ULM_PWD"] = $this->customclass->Encrypt($this->input->post('passwd'));
		}
		// WlFQTjhVaTdEL0YrYkZ5OXdveFJtQT09
        $result = $this->MarkerModel->updateMarker($update_arr, $this->input->post('seq'));

        if($result)
			echo json_encode(array("code" => "200"));
		else
			echo json_encode(array("code" => "202", "msg" => $logs));
	}

	public function markerList(){
		$limit = 10;
        $nowpage = "";
        if (!isset($_GET["per_page"])){
            $start = 0;
        }else{
            $start = ($_GET["per_page"]-1)*10;
            $nowpage = $_GET["per_page"];
        }

        $wheresql = array(
                        "start" => $start,
                        "limit" => $limit
						);
						
        $lists = $this->MarkerModel->getMarker($wheresql);

        $listCount = 0;
		$listCount = $this->MarkerModel->getMarkerCount($wheresql);
		
        if ($nowpage != ""){
            $pagenum = $listCount-(($nowpage-1)*10);
        }else{
            $pagenum = $listCount;
		}
		
        $pagination = $this->customclass->pagenavi("/admin/markerList", $listCount, 10, 5, $nowpage);

        $data = array(
                    "lists" => $lists,
                    "listCount" => $listCount,
                    "pagination" => $pagination,
                    "pagenum" => $pagenum,
                    "listCount" => $listCount,
                    "start" => $start+1,
                    "limit" => $limit,
		);
		
		$this->load->view('/admin/header');
		$this->load->view('/admin/marker_list_view', $data);
		$this->load->view('/admin/footer');
	}

	public function studentCreate(){
		$insert_arr = array(
			"ULS_NO" => $this->input->post('no'),
			"ULS_TEL" => $this->input->post('tel'),
			"ULS_NAME" => $this->input->post('name'),
			"ULS_DEL_YN" => "N",
			"ULS_REG_DATE" => date("Y-m-d H:i:s"),
		);

		$result = $this->StudentModel->insertStudent($insert_arr);

		if($result)
			echo json_encode(array("code" => "200"));
		else
			echo json_encode(array("code" => "202", "msg" => $logs));
	}

	public function studentCreateWithFile(){
		if (isset($_FILES['student_list_file']['name'])) {
			$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'] . "/upload/promotion";
			$path = $config['upload_path'];
			if(!file_exists($path)){
				mkdir($path, 0777, true);
			}
			
			$config['allowed_types'] = "xls|xlsx";
			$new_name = $_FILES['student_list_file']['name'];
			$config["file_name"] = $new_name;
			/*
				library('upload', $config)로 호출하고 initailize하지 않고 $config[''] = 이렇게 넣으면 값이 안바끼는 경우도 있음.
				그래서 여러 파일을 넣을 때는 초기화 시켜줘야함.
			*/
			$this->load->library('upload');
			$this->upload->initialize($config);

			// print_r($this->upload->data());
			// print_r($_FILES);
	
			if (0 < $_FILES['student_list_file']['error']) {
				echo 'Error during file upload' . $_FILES['student_list_file']['error'];
			} else {
				if (file_exists("/upload/promotion/" . $_FILES['student_list_file']['name'])) {
					echo "File already exists : /upload/promotion/" . $_FILES['student_list_file']['name'];
				} else {
					if (!$this->upload->do_upload('student_list_file')) {
						echo json_encode(array("code" => "202", "msg" => $this->upload->display_errors()));
					} else {
						// 엑셀 작업
						$objPHPExcel = new PHPExcel();
						$allData = array();
						$filename = iconv("UTF-8", "EUC-KR", $_FILES['student_list_file']['tmp_name']);

						try {
							// 업로드한 PHP 파일을 읽어온다.
							$objPHPExcel = PHPExcel_IOFactory::load($filename);
						
							$extension = strtoupper(pathinfo($filename, PATHINFO_EXTENSION));
							$sheetsCount = $objPHPExcel -> getSheetCount();
						
							// 시트Sheet별로 읽기
							for($sheet = 0; $sheet < $sheetsCount; $sheet++) {
						
								  $objPHPExcel -> setActiveSheetIndex($sheet);
								  $activesheet = $objPHPExcel -> getActiveSheet();
								  $highestRow = $activesheet -> getHighestRow();             // 마지막 행
								  $highestColumn = $activesheet -> getHighestColumn();    // 마지막 컬럼
						
								  // 한줄읽기
								  for($row = 1; $row <= $highestRow; $row++) {
									// $rowData가 한줄의 데이터를 셀별로 배열처리 된다.
									$rowData = $activesheet -> rangeToArray("A" . $row . ":" . $highestColumn . $row, NULL, TRUE, FALSE);
									$insert_arr = array(
										"ULS_NO" => $rowData[0][0],
										"ULS_NAME" => $rowData[0][1],
										"ULS_TEL" => $rowData[0][2],
										"ULS_DEL_YN" => 'N',
										"ULS_NO" => $rowData[0][0],
										"ULS_REG_DATE" => date("Y-m-d H:i:s")

									);
						
									// $rowData에 들어가는 값은 계속 초기화 되기때문에 값을 담을 새로운 배열을 선안하고 담는다.
									$allData[$row] = $insert_arr;
								  }
							}
						} catch(exception $exception) {
							echo $exception;
						}
						$result = $this->StudentModel->insertStudents($allData);
						// echo "<pre>";
						// print_r($allData);
						// echo "</pre>";
						if($result)
							echo json_encode(array("code" => "200"));
						else
							echo json_encode(array("code" => "202", "msg" => $logs));
					}
				}
			}
		} else {
			echo json_encode(array("code" => "202", "msg" => $logs));
		}
	}

	public function studentModify(){
		$update_arr = array(
			"ULS_NO" => $this->input->post('no'),
			"ULS_TEL" => $this->input->post('tel'),
			"ULS_NAME" => $this->input->post('name'),
			"ULS_DEL_YN" => "N",
			"ULS_REG_DATE" => date("Y-m-d H:i:s"),
		);

        $result = $this->StudentModel->updateStudent($update_arr, $this->input->post('seq'));

        if($result)
			echo json_encode(array("code" => "200"));
		else
			echo json_encode(array("code" => "202", "msg" => $logs));
	}


	public function studentList(){
		$limit = 10;
        $nowpage = "";
        if (!isset($_GET["per_page"])){
            $start = 0;
        }else{
            $start = ($_GET["per_page"]-1)*10;
            $nowpage = $_GET["per_page"];
        }

        $search = isset($_GET["search"]) ? $_GET["search"] : "";

        $wheresql = array(
                        "search" => $search,
                        "start" => $start,
                        "limit" => $limit
                        );
        $lists = $this->StudentModel->getStudent($wheresql);
        // echo $this->db->last_query();

        $listCount = 0;
        $listCount = $this->StudentModel->getStudentCount($wheresql);
        if ($nowpage != ""){
            $pagenum = $listCount-(($nowpage-1)*10);
        }else{
            $pagenum = $listCount;
        }
        $pagination = $this->customclass->pagenavi("/admin/studentList?search=".$search, $listCount, 10, 5, $nowpage);

        $data = array(
                    "search" => $search,
                    "lists" => $lists,
                    "listCount" => $listCount,
                    "pagination" => $pagination,
                    "pagenum" => $pagenum,
                    "listCount" => $listCount,
                    "start" => $start+1,
                    "limit" => $limit,
                    );

		$this->load->view('/admin/header');
		$this->load->view('/admin/student_list_view', $data);
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
