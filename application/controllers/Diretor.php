<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diretor extends CI_Controller {
	
    public function __construct(){
        parent::__construct();
    }	

	public function index()
	{
		$this->load->view('tamplete/diretor/header');
		$this->load->view('pages/diretor/index');
		$this->load->view('tamplete/diretor/footer');
	}
	
	public function contasPagar()
	{
		$this->load->view('tamplete/diretor/header');
		$this->load->view('pages/diretor/contaspagar');
		$this->load->view('tamplete/diretor/footer');
	}

	public function convenio()
	{
		$this->load->view('tamplete/diretor/header');
		$this->load->view('pages/diretor/convenio');
		$this->load->view('tamplete/diretor/footer');
		
	}

	public function boletosPagos()
	{
		$this->load->view('tamplete/diretor/header');
		$this->load->view('pages/diretor/boletospagos');
		$this->load->view('tamplete/diretor/footer');
	}
}