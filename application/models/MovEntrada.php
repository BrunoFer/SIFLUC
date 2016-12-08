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
                $this->db->join(TABELA_PESSOA, 'pessoas.id = mov_entradas.cliente');
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
        
        //SELECT sum(mov_entradas.valor),pessoas.id, pessoas.nome FROM mov_entradas inner join pessoas on 
        //mov_entradas.cliente=pessoas.id group by pessoas.id order by sum(mov_entradas.valor) desc limit 3
        
        public function getMaioresEntradas($condicao = null){
            $this->db->select('sum('.TABELA_MOV_ENTRADA.'.valor) as soma, '.TABELA_PESSOA.'.id, '.TABELA_PESSOA.'.nome');
            if ($condicao){
                $this->db->where($condicao);
            }
            $this->db->from(TABELA_MOV_ENTRADA);
            $this->db->join(TABELA_PESSOA,TABELA_MOV_ENTRADA.'.cliente='.TABELA_PESSOA.'.id');
            $this->db->group_by(TABELA_PESSOA.'.id');
            $this->db->order_by('sum('.TABELA_MOV_ENTRADA.'.valor)','desc');
            $this->db->limit(3);
            $query = $this->db->get();
            return $query->result();
        }

}