<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Supervisor_model extends CI_Model{
	
    public function __construct(){
        parent::__construct();
    }
    
	public function loginSupervisor($login, $senha){
		$sql = "SELECT * FROM usuario WHERE login = ? AND senha = ? AND id_login = 2";
		$result = $this->db->query($sql, array($login, $senha));
		return $result;
	}
	
	
}