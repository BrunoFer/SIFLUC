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
                $this->db->join(TABELA_PESSOA, 'pessoas.id = mov_saidas.fornecedor');
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

        //SELECT sum(mov_saidas.valor),pessoas.id, pessoas.nome FROM mov_saidas inner join pessoas on 
        //mov_saidas.fornecedor=pessoas.id group by pessoas.id order by sum(mov_saidas.valor) desc limit 3
        
        public function getMaioresSaidas($condicao = null){
            $this->db->select('sum('.TABELA_MOV_SAIDA.'.valor) as soma, '.TABELA_PESSOA.'.id, '.TABELA_PESSOA.'.nome');
            if ($condicao){
                $this->db->where($condicao);
            }
            $this->db->from(TABELA_MOV_SAIDA);
            $this->db->join(TABELA_PESSOA,TABELA_MOV_SAIDA.'.fornecedor='.TABELA_PESSOA.'.id');
            $this->db->group_by(TABELA_PESSOA.'.id');
            $this->db->order_by('sum('.TABELA_MOV_SAIDA.'.valor)','desc');
            $this->db->limit(3);
            $query = $this->db->get();
            return $query->result();
        }
                
                
        
}