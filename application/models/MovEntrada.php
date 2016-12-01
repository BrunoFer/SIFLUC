<?php

class MovEntrada extends CI_Model{

	private $id;
	private $data;
	private $valor;
	private $cliente;
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

	public function setCliente($cliente){
		$this->cliente = $cliente;
	}

	public function setComentario($comentario){
		$this->comentario = $comentario;
	}

	public function inserir($data){
		$this->db->insert(TABELA_MOV_ENTRADA, $data);
	}

	public function getEntradas($condicao = null){
		if ($condicao){
			$this->db->where($condicao);
		}
		$this->db->order_by("data", "desc");
                $this->db->join(TABELA_PESSOA, 'pessoas.email = mov_entradas.cliente');
		$query = $this->db->get(TABELA_MOV_ENTRADA);
		//print_r($this->db);
		return $query->result();
	}

	public function getSomaEntradas($condicao = null){
		$this->db->select('sum(valor) as soma');
		if ($condicao){
			$this->db->where($condicao);
		}
		$query = $this->db->get(TABELA_MOV_ENTRADA);
		return $query->row()->soma;
	}

}