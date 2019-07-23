<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Supervisor extends CI_Controller {
	
    public function __construct(){
		parent::__construct();
		$this->load->model("calendar_model");
    }	

	public function index()
	{
		$this->load->view('tamplete/supervisor/header');
		$this->load->view('pages/supervisor/boletospagos');
		$this->load->view('tamplete/supervisor/footer');
	}

	public function convenio()
	{
		$this->load->view('tamplete/supervisor/header');
		$this->load->view('pages/supervisor/convenio');
		$this->load->view('tamplete/supervisor/footer');
	}

	public function contasPagar()
	{
		$this->load->view('tamplete/supervisor/header');
		$this->load->view('pages/supervisor/contaspagar');
		$this->load->view('tamplete/supervisor/footer');
	}

	public function boletosPagos()
	{
		$dados['boletos'] = $this->calendar_model->get_boletos_pagos()->result();
		$this->load->view('tamplete/supervisor/header');
		$this->load->view('pages/supervisor/boletospagos', $dados);
		$this->load->view('tamplete/supervisor/footer');
	}

	public function boletos_a_vencer()
	{
		$dados['boletos'] = $this->calendar_model->get_boletos_pagos()->result();
		$this->load->view('tamplete/supervisor/header');
		$this->load->view('pages/supervisor/boletos_a_vencer', $dados);
		$this->load->view('tamplete/supervisor/footer');
	}

	public function boletos_Vencidos()
	{
		$dados['boletos'] = $this->calendar_model->get_boletos_pagos()->result();
		$this->load->view('tamplete/supervisor/header');
		$this->load->view('pages/supervisor/boletos_vencidos', $dados);
		$this->load->view('tamplete/supervisor/footer');
	}

	
	
}