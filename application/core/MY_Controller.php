<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	private $saldo;
	private $saldodia;
	private $saldoanterior;

	public function __construct(){
		parent::__construct();

		$this->load->helper('url');

		$this->load->library('session');

	}

	public function render($view, $data = null, $template = null){
		if (!$template){
			$data['user_profile'] = $this->session->userdata('user_profile');
			$this->load->view('templates/header',$data);
			$this->load->view($view,$data);
			$this->load->view('templates/footer');
		} else {
			$this->load->view('templates/header_guest');
			$this->load->view($view,$data);
			$this->load->view('templates/footer');
		}
	}

}