<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exam extends CI_Controller {

	function __construct(){
        parent::__construct();

		// print_r($this->session->all_userdata());
        $this->load->helper('url');
        $this->load->helper('form');
		$this->load->helper('download');
		$this->load->helper('cookie');

		$this->load->model('ExamModel');
    }

	public function saveExamCase()
	{
		$ROUND = $this->input->post("exam_round");
		$LEVEL = $this->input->post("exam_level");
		$NAME = $this->input->post("exam_name");
		$DATE = $this->input->post("exam_date");
		$COMMENT = $this->input->post("exam_comment");

		$data = array (
			"ETL_ROUND" => $ROUND,
			"ETL_LEVEL" => $LEVEL,
			"ETL_NAME" => $NAME,
			"ETL_DATE" => $DATE,
			"ETL_COMMENT" => $COMMENT
		);
		
		$result = $this->ExamModel->saveExamList($data);

		echo json_encode($result);
	}
}
