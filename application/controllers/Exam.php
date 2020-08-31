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

	public function modQuestion(){

	}
	public function saveExamCase()
	{
		$ROUND = $this->input->post("exam_round");
		$LEVEL = $this->input->post("exam_level");
		$NAME = $this->input->post("exam_name");
		$DATE = $this->input->post("exam_date");
		$COMMENT = $this->input->post("exam_comment");

		$DATA = array (
			"ETL_ROUND" => $ROUND,
			"ETL_LEVEL" => $LEVEL,
			"ETL_NAME" => $NAME,
			"ETL_DATE" => $DATE,
			"ETL_COMMENT" => $COMMENT
		);
		
		$result = $this->ExamModel->saveExamList($DATA);

		echo json_encode($result);
	}

	public function saveQuestion(){
		$RA_SEQ = $this->input->post("ra_seq");
		$TYPE = $this->input->post("que_type");
		$SCORE = $this->input->post("que_score");



		$DATA = array (
			"EQL_RA_SEQ" => $RA_SEQ,
			"DEPTH" => 1,
			"EQL_TYPE" => $TYPE,
			"EQL_SCORE" => $SCORE
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
}
