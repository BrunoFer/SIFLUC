<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Movimentacoes extends MY_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->helper('form');

		$this->load->model('MovEntrada');
		$this->load->model('MovSaida');

		$condicao = array('DATE(data) =' => date('Y-m-d'));
		$this->saldodia = $this->saldo($condicao);
		$condicao = array('DATE(data) <' => date('Y-m-d'));
		$this->saldoanterior = $this->saldo($condicao);
		$condicao = array('DATE(data) <=' => date('Y-m-d'));
		$this->saldo = $this->saldo($condicao);

		if (!$this->session->has_userdata('user_profile')){
			redirect('login');
		}
	}

	public function index(){
		$this->render('about');
	}

	public function cadastroentrada(){
		$this->render('cadastra_entrada');
	}

	public function cadastrosaida(){
		$this->render('cadastra_saida');
	}

	public function entradas(){
		$data['lista'] = $this->MovEntrada->getEntradas();
		$this->render('listagem', $data);
	}

	public function saidas(){
		$data['lista'] = $this->MovSaida->getSaidas();
		$this->render('listagem', $data);
	}


	public function saldos(){
		$this->render('saldos_view');
	}

	public function relatorios(){
		$this->render('relatorios');
	}

	public function enviasaida(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('valor', 'Valor', 'required', array('required' => 'Você deve preencher o campo %s.'));
		$this->form_validation->set_rules('fornecedor', 'Fornecedor', 'required', array('required' => 'Você deve preencher o campo %s.'));

		if ($this->form_validation->run() == FALSE){
			$this->render('cadastra_saida');
		} else {
			$date = $this->input->post('data');
			if ($date){
				$data['data']= $this->reverseDateLang($date);
			}
			$data['valor']= $this->input->post('valor');
			$data['fornecedor']= $this->input->post('fornecedor');
			$data['comentario']= $this->input->post('comentario');

			$this->MovSaida->inserir($data);

			$data['voltar'] = 'movimentacoes/cadastrosaida';
			$this->render('answer',$data);
		}
	}

	public function enviaentrada(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('valor', 'Valor', 'required', array('required' => 'Você deve preencher o campo %s.'));
		$this->form_validation->set_rules('cliente', 'Cliente', 'required', array('required' => 'Você deve preencher o campo %s.'));

		if ($this->form_validation->run() == FALSE){
			$this->render('cadastra_entrada');
		} else {

			$date = $this->input->post('data');
			if ($date){
				$data['data']= $this->reverseDateLang($date);
			}
			$data['valor']= $this->input->post('valor');
			$data['cliente']= $this->input->post('cliente');
			$data['comentario']= $this->input->post('comentario');

			$this->MovEntrada->inserir($data);

			$data['voltar'] = 'movimentacoes/cadastroentrada';
			$this->render('answer',$data);

		}
	}

	public function buscasaldo(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('data', 'Data', 'required', array('required' => 'Você deve preencher o campo %s.'));

		if ($this->form_validation->run() == FALSE){
			$this->render('saldos_view');
		} else {
			$date = $this->input->post('data');
			if ($date){
				$datept = explode('/', $date);
				$dateen = $datept[2].'-'.$datept[1].'-'.$datept[0];
				$condicao = array('DATE(data) =' => $dateen);
				$saldo = $this->saldo($condicao);
				$data['data'] = $date;
				$data['retorno'] = $saldo;
				$this->render('saldos_view',$data);
			}
		}

	}

	public function buscaregistros(){

		$datainicio = $this->input->post('datainicio');
		$datafim = $this->input->post('datafim');
		$nome = $this->input->post('nome');
		$checkentrada = $this->input->post('entrada');
		$checksaida = $this->input->post('saida');

		$condicoes = array();

		if ($datainicio && $datafim){
			$datept = explode('/', $datainicio);
			$datainicio = $datept[2].'-'.$datept[1].'-'.$datept[0];
			$datept = explode('/', $datafim);
			$datafim = $datept[2].'-'.$datept[1].'-'.$datept[0];
			if (strtotime($datainicio) > strtotime($datafim)){
				$data['erro'] = "Erro: data final menor que data inicial.";
				$this->render('relatorios',$data,null);
				return;
			} else {
				$condicoes['DATE(data) >='] = $datainicio;
				$condicoes['DATE(data) <='] = $datafim;
			}
		} else if ($datafim){
			$datept = explode('/', $datafim);
			$datafim = $datept[2].'-'.$datept[1].'-'.$datept[0];
			$condicoes['DATE(data) <='] = $datafim;
		} else if ($datainicio){
			$datept = explode('/', $datainicio);
			$datainicio = $datept[2].'-'.$datept[1].'-'.$datept[0];
			$condicoes['DATE(data) >='] = $datainicio;
		}

		if ($checkentrada == 'on'){
			if ($nome){
				$condicoes['cliente'] = $nome;
			}
			$entradas = $this->MovEntrada->getEntradas($condicoes);
			$data['listaEntrada'] = $entradas;
		}

		if ($checksaida == 'on'){
			if ($nome && $checkentrada == 'on'){
				array_pop($condicoes);
				$condicoes['fornecedor'] = $nome;
			} else if ($nome){
				$condicoes['fornecedor'] = $nome;
			}
			$saidas = $this->MovSaida->getSaidas($condicoes);
			$data['listaSaida'] = $saidas;
		}
		
		if ($checkentrada != 'on' && $checksaida !='on'){
			$data['erro'] = "Erro: Selecione ao menos um tipo de movimentação.";
			$this->render('relatorios', $data);
		} else {
			$this->render('mostrarelatorio', $data);
		}

	}


	public function saldo($condicao){
		$saldoEntradas = $this->MovEntrada->getSomaEntradas($condicao);
		$saldoSaidas = $this->MovSaida->getSomaSaidas($condicao);
		return $saldoEntradas-$saldoSaidas;
	}

	private function reverseDateLang($date){
		$dateptbr = explode(' ',$date);
		$onlydate = explode('/', $dateptbr[0]);
		$date = $onlydate[2].'-'.$onlydate[1].'-'.$onlydate[0].' '.$dateptbr[1];
		$date = date('Y-m-d h:i:s',strtotime($date));
		return $date;
	}
}