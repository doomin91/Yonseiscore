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

}