<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
    public function __construct(){
        parent::__construct();
		$this->load->model('diretor_model');
		$this->load->model('supervisor_model');
    }	


	public function login(){
		$login = $this->input->post('login');
		$senha = MD5($this->input->post('senha'));
		$diretor = $this->diretor_model->loginDiretor($login, $senha)->result();
		$supervisor = $this->supervisor_model->loginSupervisor($login, $senha)->result();	
		if($diretor){
			foreach($diretor as $d)
			$this->session->set_userdata('nome', $d->nome);
			$this->session->set_userdata('senha', $d->senha);
			$this->session->set_userdata('id', $d->id);
			$this->session->set_userdata('login', $d->login);
			//echo $this->db->last_query(); //Use para verificar a última consulta executada
			//exit();			
			redirect('diretor/index');
		}elseif($supervisor){
			foreach($supervisor as $s)
			$this->session->set_userdata('nome', $s->nome);
			$this->session->set_userdata('id', $s->id);
			$this->session->set_userdata('login', $s->login);
			redirect('supervisor/index');
		}else{
			$this->session->set_flashdata('msg-danger', 'Usuário ou senha incorreto.');
			redirect('/');
		}
		
	}
	
	public function logout(){
		$this->session->sess_destroy();
		$this->session->unset_userdata('nome');
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('login');
		redirect('/');
	}
	
	public function alterarSenha(){		
		$sb_usuario['senha'] = md5($this->input->post('senhaNova'));
		$this->db->where('id', $this->session->userdata('id'));
		$this->db->where('senha', md5($this->input->post('senhaAtual')));
		$novaSenha = $this->db->update('tb_usuario', $sb_usuario);			
		if(!$novaSenha){		
			echo "senha atual incorreta.";
		}else{
			$this->session->set_flashdata('msg-success', 'Senha alterada com sucesso.');	
			redirect('/');
		}
	}
}
