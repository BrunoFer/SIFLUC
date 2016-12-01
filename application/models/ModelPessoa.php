<?php

class ModelPessoa extends CI_Model {

    private $id;
    private $nome;
    private $apelido;
    private $tipopessoa;
    private $documento;
    private $endereco;
    private $telefone;

    public function __construct() {
        parent::__construct();
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }
    
    public function setApelido($apelido) {
        $this->apelido = $apelido;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function setTipo($tipo) {
        $this->tipopessoa = $tipo;
    }

    //pode ser CNPJ ou CPF
    public function setDocumento($documento) {
        $this->documento = $documento;
    }

    public function inserir($data) {
        $this->db->insert(TABELA_PESSOA, $data);
    }
    
    public function atualizar($id, $data) {
        $this->db->where('id',$id);
        $this->db->update(TABELA_PESSOA, $data);
    }

    public function getPessoas($nome = null) {
        if ($nome) {
            $this->db->like('nome',$nome);
        }
        $query = $this->db->get(TABELA_PESSOA);
        return $query->result();
    }
    
    public function getPessoa($id){
        $this->db->where('id',$id);
        $query = $this->db->get(TABELA_PESSOA);
        return $query->row();
    }

}
