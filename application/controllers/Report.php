<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

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
        $this->load->model('ReportModel');
        $this->load->model('ExamModel');
    }

    public function index(){
        if ($this->session->userdata("admin_id") != ""):
            redirect("http://".$_SERVER["SERVER_NAME"]."/admin", "location");
        endif;
    
        $this->load->view("login");
    }

    public function reportDownload(){
        
        header( "Content-type: application/vnd.ms-excel" );   
        header( "Content-type: application/vnd.ms-excel; charset=utf-8");  
        header( "Content-Disposition: attachment; filename = report.xls" );   
        header( "Content-Description: PHP4 Generated Data" );   
    

        $search = isset($_GET["search"]) ? $_GET["search"] : "";
        print_r($search);
        $wheresql = array(
            "search" => $search,
            );

        $lists = $this->ReportModel->getReportForm($wheresql);
        $listCount = 0;
        $listCount = $this->ReportModel->getReportFormCount($wheresql);
        $pagenum = $listCount;

        $DATA = array(
                "search" => $search,
                "lists" => $lists,
                "listCount" => $listCount,
                "pagenum" => $pagenum,
                );

		$this->load->view('/admin/report_form', $DATA);
    }
}
