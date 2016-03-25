<?php
class M_login extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function verifikasi($username,$password){
        $query = $this->db->query("select * from user where username='$username'");
        $data = array();
        if($query->num_rows()==1){
            foreach ($query->result() as $row){
                if($row->password === $password){
                    $data["message"] = "OK";
                }else{
                    $data["message"] = "NOT MATCH";
                }
            }        
        }else
        if($query->num_rows()==0){
            $data["message"] = "NOT OK";
        }
        return $data;
    }
}
