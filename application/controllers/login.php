<?php
class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');	
		$this->load->model('m_login');
		$this->load->library('session');
	}

	public function index() {
		$data["notif"] = "";
        $this->load->view('v_login',$data);
	}

	 public function verifikasi(){ 
	        
        $username = mysql_real_escape_string($this->input->post('username'));
        $password = mysql_real_escape_string(md5($this->input->post('password')));
        $hasil = $this->m_login->verifikasi($username,$password);
        if($hasil["message"]==="OK"){
            $this->buat_session($username,$password);
			$this->session->set_userdata($username,$password);
            redirect(base_url().'user', 'refresh');
			
        }else
        if($hasil["message"]==="NOT OK"){
			$data["notif"] = "Uppss, gagal login , mohon untuk mencoba kembali";
            $this->load->view('v_login',$data);
           
        }else
        if($hasil["message"]==="NOT MATCH"){
           $data["notif"] = "Uppss, username dan password not match";
           $this->load->view('v_login',$data);
        }
    }  
	
	 public function buat_session($u,$p){
        $data_session = array(
            "username"=>$u,
            "password"=>$p
        );
        $this->session->set_userdata($data_session);
    } 
     
	 public function logout(){
	 $data["notif"] = "berhasil keluar dari sistem";
        unset($_SESSION['username']);
		unset(
			$_SESSION['username'],
			$_SESSION['password']);
			$this->load->view('v_login',$data);
    }  
	
	
}

?>
