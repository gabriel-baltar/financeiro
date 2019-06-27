<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diretor extends CI_Controller {
	
    public function __construct(){
        parent::__construct();
		$this->load->model('auxiliar_model');
    }	

	public function index()
	{
		$dados['title'] = "Diretor | Relatórios";
		$dados['avaliacao'] = $this->auxiliar_model->listarAvaliacao()->result();
		$dados['curriculo'] = $this->auxiliar_model->listarCurriculo()->result();
		$dados['status'] = $this->auxiliar_model->listarStatus()->result();
		$dados['cargos'] = $this->auxiliar_model->listarCargos()->result();
		$this->load->view('template/auxiliar/header', $dados);
		$this->load->view('pages/auxiliar/relatorios', $dados);
		$this->load->view('template/auxiliar/footer');
	}
	
	
}