<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Diretor_model extends CI_Model{
	
    public function __construct(){
        parent::__construct();
    }
    
	public function loginDiretor($login, $senha){
		$sql = "SELECT * FROM usuario WHERE login = ? AND senha = ? AND id_login = 1";
		$result = $this->db->query($sql, array($login, $senha));
		return $result;
	}
	
	
}