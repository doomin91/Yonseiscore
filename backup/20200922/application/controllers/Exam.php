<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exam extends CI_Controller {

	function __construct(){
        parent::__construct();

		// print_r($this->session->all_userDATA());
        $this->load->helper('url');
        $this->load->helper('form');
		$this->load->helper('download');
		$this->load->helper('cookie');

		$this->load->model('ExamModel');
    }

	public function getQuestion(){
		$SEQ = $this->input->post("seq");
		
		$result = $this->ExamModel->getQuestionBySEQ($SEQ);

		echo json_encode($result);
	}

	public function getQuestionCountInExam(){
		$EID = $this->input->post("eid");

		$result = $this->ExamModel->getQuestionCountInExamByEid($EID);

		echo json_encode($result);
	}

	public function getQuestionChildCount(){
		$SEQ = $this->input->post("seq");

		$result = $this->ExamModel->getQuestionChildCountBySeq($SEQ);

		echo json_encode($result);
	}

	public function deleteExamBySeq(){
		$ETL_SEQ = $this->input->post("ETL_SEQ");
		$result = $this->ExamModel->deleteExamBySeq($ETL_SEQ);

		echo json_encode($result);
	}

	public function saveExamCase()
	{
		$ROUND = $this->input->post("exam_round");
		$LEVEL = $this->input->post("exam_level");
		$NAME = $this->input->post("exam_name");
		$PAPER = $this->input->post("exam_paper");
		$DATE = $this->input->post("exam_date");
		$COMMENT = $this->input->post("exam_comment");

		$DATA = array (
			"ETL_ROUND" => $ROUND,
			"ETL_LEVEL" => $LEVEL,
			"ETL_NAME" => $NAME,
			"ETL_PAPER" => $PAPER,
			"ETL_DATE" => $DATE,
			"ETL_COMMENT" => $COMMENT
		);
		
		$result = $this->ExamModel->saveExamList($DATA);

		echo json_encode($result);
	}

	public function completeQuestion(){
		$EID = $this->input->post("eid");
		$DATA = array(
			"ETL_STATUS" => 1
		);

		$return = $this->ExamModel->updateExamList($EID, $DATA);

		echo json_encode($return);

	}

	public function saveQuestion(){
		$RA_SEQ = $this->input->post("ra_seq");
		$TYPE = $this->input->post("que_type");
		$SCORE = $this->input->post("que_score");
		$TARGET = $this->input->post("que_target");

		if($TARGET == "on"){
			$NON_TARGET = 1;
		} else {
			$NON_TARGET = 0;
		}

		$DATA = array (
			"EQL_RA_SEQ" => $RA_SEQ,
			"DEPTH" => 1,
			"EQL_TYPE" => $TYPE,
			"EQL_SCORE" => $SCORE,
			"EQL_NON_TARGET" => $NON_TARGET

		);

		$result = $this->ExamModel->saveQuestion($DATA);

		$MAX_SEQ = $this->ExamModel->getSequence();	
		foreach ($MAX_SEQ[0] as $value){
			$MAX_SEQ = $value;
		}

		$DATA = array (
			"PARENT_SEQ" => $MAX_SEQ
		);
		
		$result = $this->ExamModel->updateQuestionBySEQ($MAX_SEQ, $DATA);

		echo json_encode($result);
	}

	public function addQuestionBelow(){
		$RA_SEQ = $this->input->post("ra_seq");
		$SEQ = $this->input->post("seq");
		$TYPE = $this->input->post("que_type");
		$SCORE = $this->input->post("que_score");

		$DATA = array (
			"EQL_RA_SEQ" => $RA_SEQ,
			"PARENT_SEQ" => $SEQ,
			"DEPTH" => 2,
			"EQL_TYPE" => $TYPE,
			"EQL_SCORE" => $SCORE
		);

		$result = $this->ExamModel->addQuestionBelow($DATA);
		
		echo json_encode($result);

	}

	public function delQuestion(){
		$SEQ = $this->input->post("SEQ");
		$DEPTH = $this->input->post("DEPTH");

		$result = $this->ExamModel->delQuestion($SEQ);

		if($result && $DEPTH==1)
			$result = $this->ExamModel->delQuestionsChildren($SEQ);
			
		echo json_encode($result);
	}

	public function updateQuestion(){
		$SEQ = $this->input->post("seq");
		$TYPE = $this->input->post("que_type");
		$SCORE = $this->input->post("que_score");

		$DATA = array (
			"EQL_TYPE" => $TYPE,
			"EQL_SCORE" => $SCORE
		);

		$result = $this->ExamModel->updateQuestionBySEQ($SEQ, $DATA);
		
		echo json_encode($result);
	}

	public function getMatchInfo(){
		$SEQ = $this->input->post("SEQ");

		$result = $this->ExamModel->getMatchInfoBySEQ($SEQ);

		echo json_encode($result);
	}


	public function uploadPaper(){
		$fileObj = $this->input->post("EID");
		$config["upload_path"] = $_SERVER['DOCUMENT_ROOT'] . "/upload/TEST/";
        $config["allowed_types"] = "gif|jpg|png|jpeg|zip";
        $config["overwrite"] = FALSE;
		$config["remove_spaces"] = TRUE;
		$config["max_size"] = 0;

		$this->load->library("upload", $config);
		$this->upload->initialize($config);

		if(isset($_FILES['fileObj']['name'])) {
			$number_of_files = count($_FILES['fileObj']['name']);

			if(0 < $_FILES['fileObj']['error']) {
				echo 'Error';
			}
		} else {
			if( !$this->upload->do_upload("fileObj")) {
                    echo $this->upload->display_errors();
                    exit;
			} else {
					echo "업로드 성공";
					$this->upload->data("fileObj");
				
			}

		}
		
		echo json_encode($fileObj);
	}

	
	public function FileUploadAjax()
	{
		date_default_timezone_set('Asia/Seoul');
		ini_set('memory_limit', '20480M');
		ini_set('max_execution_time', 0);
		ini_set("display_errors", 1);
	    $time =  explode(" ", microtime());
		
	    $UPLOAD = "/upload/Files/";
	    $UPLOAD_FILE =  "/upload/Files/";
		$mydir =  $_SERVER['DOCUMENT_ROOT'].$UPLOAD.date('Ymd');
	    $strmydir =  $UPLOAD_FILE.date('Ymd');
	    if(!is_dir($mydir)) {
	        if(mkdir($mydir, 0777)) {
	            chmod($mydir, 0777);
	        }
		}

	    $apply_number = isset($_POST["apply_number"]) ? $_POST["apply_number"] : "";
	    $file_name = array();
		$file_path = array();
		//print_r($_FILES);
		//exit;
	    if (isset($_FILES["apply_attach"]) && !empty($_FILES["apply_attach"])){
	        $no_files = count($_FILES["apply_attach"]["name"]);
	        for ($i=0; $i<$no_files; $i++){
	            if ($_FILES["apply_attach"]["error"][$i] > 0){
	                $ErrMsg = "Error : " . $_FILES["apply_attach"]["error"][$i];
	                $return  = array(
	                    "code"=>"201",
	                    "msg"=>$ErrMsg
	                );
	                echo json_encode($return);
	            }else{
	                if (file_exists($mydir. "/" .$_FILES["apply_attach"]["name"][$i])){
	                    $ErrMsg = $Err . "동일한 이름의 파일이 존재합니다.";
	                    $return  = array(
	                        "code"=>"202",
	                        "msg"=> $ErrMsg
	                    ); 
	                    
	                    echo json_encode($return);
	                }else{
	                    $tmp = explode(".", $_FILES["apply_attach"]["name"][$i]);
						$new_name = time().$i.".".end($tmp);
	                    move_uploaded_file($_FILES["apply_attach"]["tmp_name"][$i], $mydir. "/" .$new_name);
	                    array_push($file_name, $_FILES["apply_attach"]["name"][$i]);
	                    array_push($file_path, $strmydir . "/" .$new_name);
	                }
	            }
	        }
	        
			$file_data = array();
			
			// $number_of_paper = 시험지 장수
			$number_of_paper = $this->ExamModel->getNumberOfPaper($apply_number);
			$nop = $number_of_paper[0]->ETL_PAPER;

			if(count($file_name) % $nop != 0) {
				$ErrMsg = "설정된 시험지수 단위로 업로드해주세요.";
			} else {
	        for ($num=0; $num<count($file_name); $num++){
				$insert_paper = array(
					"EPL_RA_SEQ" => $apply_number,
				);
				if( $num % $nop  == 0 ){
					$this->ExamModel->insertPaperList($insert_paper);
					$pk = $this->db->insert_id();
				}

	            $insert_attach = array(
					"PAPER_SEQ" => $pk,
	                "FILE_NAME" => $file_name[$num],
	                "FILE_PATH" => $file_path[$num]
				);

				$this->ExamModel->insertPaperAttach($insert_attach);
				
				array_push($file_data, array("file_seq"=>$this->db->insert_id(), "file_name" => $file_name[$num]));
				
			}
			
			}
			if(isset($ErrMsg)){
				$resultMsg = array("code" => "202", "file_list" => $file_data, "msg" => $ErrMsg);
			} else {
				$resultMsg = array("code" => "200", "file_list" => $file_data);
			}
			echo json_encode($resultMsg);
	    }
	}
	
	public function FileDeleteAjax(){
	    $file_seq = $this->input->post("file_seq");
	    $result = $this->ExamModel->deletePaperAttach($file_seq);
	    if($result){
	        echo json_encode(array("code"=>"200"));
	    }
	}

	public function deleteCheckedPaper(){
		$chkArr = $this->input->post("chkArr");

		foreach($chkArr as $SEQ){
			$this->ExamModel->deletePaper($SEQ);
			$this->ExamModel->deleteAttachFormPaper($SEQ);
			$this->ExamModel->deleteMarkerFromPaper($SEQ);
			$this->ExamModel->deleteMatchFromPaper($SEQ);
		}

		echo json_encode($chkArr);

	}

	public function assignMarkerInPaper(){
	    $apply_number = $this->input->post("apply_number");
		$chkArr = $this->input->post("chkArr");
		$mrkArr = $this->input->post("mrkArr");
		foreach($chkArr as $PAPER_SEQ){
			$return = $this->ExamModel->getMarkerInPaper($PAPER_SEQ);
			if($return){
				$result = array(
					"code" => "200",
					"msg" => "기존에 값이 존재하여 삭제 후 진행합니다."
				);
				$this->ExamModel->deleteMarkerFromPaper($PAPER_SEQ);
				$this->ExamModel->deleteMatchFromPaper($PAPER_SEQ);
			} else {
				$result = array(
					"code" => "201",
					"msg" => "기존 값이 존재하지 않아 바로 삽입을 진행합니다."
				);
			}

			foreach($mrkArr as $MARKER_SEQ){
				$data = array(
					"EPM_RA_SEQ" => $PAPER_SEQ,
					"EPM_ULM_SEQ" => $MARKER_SEQ
				);
				$this->ExamModel->insertMarkerInPaper($data);
				$return = $this->ExamModel->getQuestionsByID($apply_number);
				foreach ($return as $row)  {
					$insert_match = array(
					"EML_RA_SEQ" => $PAPER_SEQ,
					"EML_EQL_SEQ" => $row->EQL_SEQ,
					"EML_ULM_SEQ" => $MARKER_SEQ
					);
					$this->ExamModel->insertMatchInfo($insert_match);
				}
			}
		}
		echo json_encode($result);
	}

	public function updateMatchInfo(){
		$SEQ = $this->input->post("seqArr");
		$EID = $this->input->post("EID");
		$PAPER_SEQ = $this->input->post("PAPER_SEQ");
		$MARKER_SEQ = $this->session->userdata("seq");

		$SCORE = $this->input->post("scoreArr");
		$COMMENT = $this->input->post("commentArr");
		$IS_THERE_EMPTY = 0;
		for($i=0 ; $i < count($SEQ); $i++){
			if(($SCORE[$i]) != ""){
				$DATA = array(
					"EML_ULM_SCORE" => $SCORE[$i],
					"EML_COMMENT" => $COMMENT[$i],
					"EML_STATUS" => 1
				);
			} else {
				$DATA = array(
					"EML_ULM_SCORE" => "",
					"EML_COMMENT" => $COMMENT[$i],
					"EML_STATUS" => 0
				);
				$IS_THERE_EMPTY = 1;
			}
			$return = $this->ExamModel->updateMatchInfo($SEQ[$i], $DATA);
		}

		if($IS_THERE_EMPTY == 0){
			$DATA = array(
				"EPM_STATUS" => 1
			);
			$return = $this->ExamModel->updateStatus($PAPER_SEQ, $MARKER_SEQ, $DATA);
		} else {
			$DATA = array(
				"EPM_STATUS" => 0
			);
			$return = $this->ExamModel->updateStatus($PAPER_SEQ, $MARKER_SEQ, $DATA);
		}

		if($return){
			$result = array(
				"code" => "200",
				"msg" => "업로드 완료",
				"return" => $return
			);
		} else {
			$result = array(
				"code" => "201",
				"msg" => "문제가 발생했습니다. 관리자에게 문의하세요.",
				"return" => $return
			);
		}
		
		echo json_encode($result);
	}

	public function getUserInfo(){
		$PSEQ = $this->input->post("PAPER_SEQ");
		$SSEQ = $this->input->post("STUDENT_SEQ");
		
		$return = $this->ExamModel->getStudentBySEQ($SSEQ);
		
		if($return){
			$result = array(
				"code" => "200",
				"msg" => "조회 성공 하였습니다."
			);
			$this->ExamModel->updatePaperUserBySEQ($PSEQ, $SSEQ);
		} else {
			$result = array(
				"code" => "201",
				"msg" => "값이 없습니다."
			);
		}

		echo json_encode($return);
	}
}
