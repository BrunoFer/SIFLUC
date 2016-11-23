<?php

class MovSaida extends CI_Model{

	private $id;
	private $data;
	private $valor;
	private $fornecedor;
	private $comentario;

	public function __construct(){
		parent::__construct();
	}

	public function setData($data){
		$this->data = $data;
	}

	public function setValor($valor){
		$this->valor = $valor;
	}

	public function setFornecedor($fornecedor){
		$this->fornecedor = $fornecedor;
	}

	public function setComentario($comentario){
		$this->comentario = $comentario;
	}

	public function inserir($data){
		$this->db->insert(TABELA_MOV_SAIDA, $data);
	}

	public function getSaidas($condicao = null){
		if ($condicao){
			$this->db->where($condicao);
		}
		$this->db->order_by("data", "desc");
		$query = $this->db->get(TABELA_MOV_SAIDA);
		//print_r($this->db);
		return $query->result();
	}

	public function getSomaSaidas($condicao = null){
		$this->db->select('sum(valor) as soma');
		if ($condicao){
			$this->db->where($condicao);
		}
		$query = $this->db->get(TABELA_MOV_SAIDA);
		return $query->row()->soma;
	}


	public function get_last_ten_entries()
	{
		$query = $this->db->get(TABELA_MOV_SAIDA, 10);
		return $query->result();
	}

}