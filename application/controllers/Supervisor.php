<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supervisor extends CI_Controller {
	
    public function __construct(){
        parent::__construct();
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
		$this->load->view('tamplete/supervisor/header');
		$this->load->view('pages/supervisor/boletospagos');
		$this->load->view('tamplete/supervisor/footer');
	}

	
	
}