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
    }

    public function index(){
        if ($this->session->userdata("admin_id") != ""):
            redirect("http://".$_SERVER["SERVER_NAME"]."/admin", "location");
        endif;
    
        $this->load->view("login");
    }

    public function download(){
        $objPHPExcel = new PHPExcel();

        $filename = 'test2.xls';
     
        $objPHPExcel->getActiveSheet()->setTitle('부대운임');
         
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'partner');
         
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(12);
         
        $objPHPExcel->getActiveSheet()->setCellValue('A2', '1234');
         
        header("Content-Type: application/vnd.ms-excel; charset=utf-8");
         
        header('Content-Disposition: attachment;filename="' . $filename . '"');
         
        header('Cache-Control: max-age=0');
         
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
         
        ob_end_clean();
         
        $objWriter->save('php://output');

    }

    public function reportDownload(){
        $cols = $this->input->post("cols");
        $rows = $this->input->post("rows");
        $column1 = $this->input->post("column1");
        $objPHPExcel = new PHPExcel();

        for($i=0; $i<$cols; $i++){
            eval("$" . "column" . $i . "=" . $i .";");
        }

        $arrData = array();
        for($i=0; $i<$rows;$i++){
            $arrData[$i] = array("cols" => $cols, "column1" => $column1);
        }
        

        $count = 1;

        for($i=0; $i<= $rows ; $i++){
            for($j=0; $j<=$cols; $j++){
                $objPHPExcel -> setActiveSheetIndex(0)
                -> setCellValue(sprintf("A%s", $j), $j)
                -> setCellValue(sprintf("B%s", $j), $j)
                -> setCellValue(sprintf("C%s", $j), $j);
            }
        }

        // foreach($arrData as $key => $val) {
        
        //     $num = 1 + $key;
        
        //     $objPHPExcel -> setActiveSheetIndex(0)
        //     -> setCellValue(sprintf("A%s", $num), $key)
        //     -> setCellValue(sprintf("B%s", $num), $val['cols'])
        //     -> setCellValue(sprintf("C%s", $num), $val['column1']);
        //     // -> setCellValueExplicit(sprintf("C%s", $num), $val['position'])
        //     // -> setCellValue(sprintf("D%s", $num), $val['birthday']);
        //     $count++;
        
        // }

        // // 가로 넓이 조정
        // $objPHPExcel -> getActiveSheet() -> getColumnDimension("A") -> setWidth(6);
        // $objPHPExcel -> getActiveSheet() -> getColumnDimension("B") -> setWidth(12);
        // $objPHPExcel -> getActiveSheet() -> getColumnDimension("C") -> setWidth(30);
        // $objPHPExcel -> getActiveSheet() -> getColumnDimension("D") -> setWidth(15);

        // // 전체 세로 높이 조정
        // $objPHPExcel -> getActiveSheet() -> getDefaultRowDimension() -> setRowHeight(15);

        // // 전체 가운데 정렬
        // $objPHPExcel -> getActiveSheet() -> getStyle(sprintf("A1:D%s", $count)) -> getAlignment()
        // -> setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        // // 전체 테두리 지정
        // $objPHPExcel -> getActiveSheet() -> getStyle(sprintf("A1:D%s", $count)) -> getBorders() -> getAllBorders()
        // -> setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);

        // // 타이틀 부분
        // $objPHPExcel -> getActiveSheet() -> getStyle("A1:D1") -> getFont() -> setBold(true);
        // $objPHPExcel -> getActiveSheet() -> getStyle("A1:D1") -> getFill() -> setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        // -> getStartColor() -> setRGB("CECBCA");

        // // 내용 지정
        // $objPHPExcel -> getActiveSheet() -> getStyle(sprintf("A2:D%s", $count)) -> getFill()
        // -> setFillType(PHPExcel_Style_Fill::FILL_SOLID) -> getStartColor() -> setRGB("F4F4F4");

        // // 시트 네임
        // $objPHPExcel -> getActiveSheet() -> setTitle("트와이스");

        // 첫번째 시트(Sheet)로 열리게 설정
        $objPHPExcel -> setActiveSheetIndex(0);

        // 파일의 저장형식이 utf-8일 경우 한글파일 이름은 깨지므로 euc-kr로 변환해준다.
        $filename = iconv("UTF-8", "EUC-KR", "트와이스_TWICE");

        // 브라우저로 엑셀파일을 리다이렉션
        header("Content-Type:application/vnd.ms-excel");
        header("Content-Disposition: attachment;filename=".$filename.".xls");
        header("Cache-Control:max-age=0");
        
        
        
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel5");
        $objWriter -> save("php://output");

        echo json_encode($objWriter);
    }
}
