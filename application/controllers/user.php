<?php
class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');	
		$this->load->model('m_user');
		$this->load->library('session');
	}

	public function index() {
	  if($this->session->userdata("username")&& $this->session->userdata("password") ){
		//data["session_u"] = $this->session->userdata('username');
        //$data["session_p"] = $this->session->userdata('password');
		$data['u'] = $this->m_user->get_user();
		$data["message"] = "";
        $this->load->view('v_user', $data);
		}
		else 
		redirect(base_url().'login');
	}
	
	public function add() {
	if($this->session->userdata("username")&& $this->session->userdata("password") ){
		$data['d'] = $this->m_user->get_level();
		$this->load->view('v_add_user',$data);
		}
	else 
		redirect(base_url().'login');	
	}
	
	public function prosesadd() {
	if($this->session->userdata("username")&& $this->session->userdata("password") ){
		if ($this->input->post('level')==0) {  echo " gagal proses";}
		else if ($this->input->post('level')!=0){
		$this->m_user->insert();
		redirect('user');
	    }
	else 
		redirect(base_url().'login');
	   }
	}
	
	public function edit($id) {
	if($this->session->userdata("username")&& $this->session->userdata("password") ){
		$user = $this->m_user->edit($id);
		$data['e'] = $this->m_user->edit($id);
		/* Ambil data dari kategori level */
		$data['d'] = $this->m_user->get_level();
		$this->load->view('v_edit_user',$data);
		}
	else 
		redirect(base_url().'login');
	}
	
	public function prosesedit() {
	if($this->session->userdata("username")&& $this->session->userdata("password") ){
		$this->m_user->prosesedit();
		redirect('user');
		}
	else 
		redirect(base_url().'login');
	}
	
	/*----proses menghapus data ---- */
	function delete($id) {
	if($this->session->userdata("username")&& $this->session->userdata("password") ){
		$this->m_user->delete($id);
		redirect('user/deleted');
		}
	else 
		redirect(base_url().'login');
	}
	function deleted() {	
	if($this->session->userdata("username")&& $this->session->userdata("password") ){
	//$data["session"] = $this->session->userdata('username');
		$data['u'] = $this->m_user->get_user();
		$data["message"] = "berhasil dihapus!";
        $this->load->view('v_user', $data );	
	}
	else 
		redirect(base_url().'login');
}
}
?>
