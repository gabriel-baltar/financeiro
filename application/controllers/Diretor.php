<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diretor extends CI_Controller {
	
    public function __construct(){
		parent::__construct();
		$this->load->model("calendar_diretor_Model");
    }	

	public function index()
	{
		$this->load->view('tamplete/diretor/header');
		$this->load->view('pages/diretor/boletospagos');
		$this->load->view('tamplete/diretor/footer');
	}
	
	public function convenio()
	{
		$this->load->view('tamplete/diretor/header');
		$this->load->view('pages/diretor/convenio');
		$this->load->view('tamplete/diretor/footer');
	}

	public function contasPagar()
	{
		$this->load->view('tamplete/diretor/header');
		$this->load->view('pages/diretor/contaspagar');
		$this->load->view('tamplete/diretor/footer');
		
	}

	public function boletosPagos()
	{
		$dados['boletos'] = $this->calendar_diretor_Model->get_boletos_pagos()->result();
		$this->load->view('tamplete/diretor/header');
		$this->load->view('pages/diretor/boletospagos', $dados);
		$this->load->view('tamplete/diretor/footer');
	}

	public function boletos_a_Vencer()
	{
		$dados['boletos'] = $this->calendar_diretor_Model->get_boletos_a_vencer()->result();
		$this->load->view('tamplete/diretor/header');
		$this->load->view('pages/diretor/boletos_a_vencer', $dados);
		$this->load->view('tamplete/diretor/footer');
	}

	public function boletos_Vencidos()
	{
		$dados['boletos'] = $this->calendar_diretor_Model->get_boletos_vencidos()->result();
		$this->load->view('tamplete/diretor/header');
		$this->load->view('pages/diretor/boletos_vencidos', $dados);
		$this->load->view('tamplete/diretor/footer');
	}
}