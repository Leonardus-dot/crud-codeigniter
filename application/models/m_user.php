<?php
/* Author : leonardus eman */
class m_user extends CI_Model {

	function get_user() {
		$query = $this->db->query('SELECT u.username, u.level, u.status, l.desc FROM user as u 
								   INNER JOIN level as l ON u.level = l.levelid');
		return $query->result();
	}

	function get_level() {
	
		$query = $this->db->get('level');
		return $query->result();
	}

	function edit($id) {
		$query = $this->db->query("SELECT u.username,u.password, u.level, u.status, l.desc FROM user as u 
								   INNER JOIN level as l ON u.level = l.levelid where username='$id'");
		return $query->result();
	}
	
	function insert() {
		$insert_user = array(
		'username' => $this->input->post('username'),
		'password' => md5($this->input->post('password')),
		'level' => $this->input->post('level'),
		'status' => 'A',
		);
		$insert = $this->db->insert('user', $insert_user);
		return $insert;
	}
	
	function prosesedit($id) {
		$update_user = array(
		'username' => $this->input->post('username'),
		'password' => md5($this->input->post('password')),
		'level' => $this->input->post('level'),
		'status' => $this->input->post('status'),
		
	);
		$id = $this->input->post('username');
		$this->db->where('username', $id);
		$this->db->update('user', $update_user);
	}
	
	function delete($id) {
		$this->db->where('username', $id);
		$this->db->delete('user');
	}
}
?>