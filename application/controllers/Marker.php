<!-- <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marker extends CI_Controller {

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
		$this->load->model('MarkerModel');
        $this->load->model('StudentModel');	
        
        if ($this->session->userdata("marker_id") == ""){
			echo "<script type=\"text/javascript\">
			<!--
				document.location.href=\"/  /\";
			//-->
			</script>";
			exit;
		}
    }
    public function index(){
    
        if ($this->session->userdata("admin_id") != ""):
            redirect("http://".$_SERVER["SERVER_NAME"]."/administrator/notice", "location");
        endif;
    
        $this->load->view("admin/login");
    
    }
    
    public function logout(){
        $this->session->sess_destroy();
        redirect("http://".$_SERVER["SERVER_NAME"]."/admin", "location");        
    }
    
    public function login_proc(){
        $admin_id = isset($_POST["admin_id"]) ? $_POST["admin_id"] : "";
        $admin_pass = isset($_POST["admin_pass"]) ? $_POST["admin_pass"] : "";
    
        $user = $this->CodeModel->adminLogin($admin_id, $admin_pass);
        //echo $this->db->last_query();
        if (empty($user)){
            echo json_encode(array("code" => "201", "msg" => "아이디 패스워드를 확인해주세요"));
        }else{
            //print_r($user);
            $session_data = array(
                                "admin_id" => $user->ADMIN_ID
            );
            $this->session->set_userdata($session_data);
    
            echo json_encode(array("code" => "200"));
        }
    }
}