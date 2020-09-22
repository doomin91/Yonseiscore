<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customclass{


    function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->helper('url');
        
        $this->CI->load->library('session');
        $this->CI->load->library("pagination");
    }
    
    public function CheckAgent($REQUEST){
            $mAgent = array("iPhone", "iPod", "Android", "Blackberry", "Opera Mini", "Windows ce", "Nokia", "sony" );
            $chkMobile = false;
            for($i=0; $i<sizeof($mAgent); $i++){
                if(stripos( $_SERVER['HTTP_USER_AGENT'], $mAgent[$i] )){
                    $chkMobile = true;
                    break;
                }
            }

            if($chkMobile){
                $url = $REQUEST;
                print_r("모바일 입니다. 현재 경로 => ".$url);
                $url_segment = explode("/", $url);
                print_r("나눈 후 경로 => ".$url[0].' + '.$url[1]);
                // redirect('/main_m/intro', 'refresh');
                
            }            
        
    }

    public function Encrypt($str, $secret_key="withnetworksPass", $secret_iv="withnetworksPass"){
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        return str_replace("=", "", base64_encode(openssl_encrypt($str, "aes-128-cbc", $key, 0, $iv)));
    }

    public function Decrypt($str, $secret_key="withnetworksPass", $secret_iv="withnetworksPass"){
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        return openssl_decrypt(base64_decode($str), "aes-128-cbc", $key, 0, $iv);
    }

    public function pagenavi($url, $total_cnt, $per_page, $num_links, $nowpage){
        //$PAGINATION
        //게시물 전체 수
        $config['total_rows'] = $total_cnt;

        //패아장 설정
        $config['base_url'] = $url; // 페이징 연결 주소
        $config['per_page'] = $per_page;  // 페이지당 표시 게시물 수
        $config['num_links'] = $num_links;
        // 페이지 표시 수
        if ($nowpage==""){
            $startRow =0;
        }else{
            $startRow = $config['per_page']*($nowpage-1);
        }

        $config['display_pages'] = TRUE;
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['full_tag_open'] = "<ul class=\"pagination\" style=\"margin:0 !important\">";
        $config['full_tag_close'] = "</ul>";
        $config['next_link'] = "Next";
        $config['next_tag_open'] = "<li class=\"next\">";
        $config['next_tag_close'] = "</li>";
        $config['prev_link'] = "Previous";
        $config['prev_tag_open'] = "<li class=\"prev\">";
        $config['prev_tag_close'] = "</li>";
        $config['cur_tag_open'] = "<li class=\"active\"><a href=\"#\">";
        $config['cur_tag_close'] = "</a></li>";
        $config['num_tag_open'] = "<li>";
        $config['num_tag_close'] = "</li>";
        $this->CI->pagination->initialize($config);

        return $this->CI->pagination->create_links();
    }

}