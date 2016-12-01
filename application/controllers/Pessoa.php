<?php

class Pessoa extends MY_Controller {

    public function __construct() {
        parent::__construct();

        //carrega o model
        $this->load->model('ModelPessoa');
    }

    public function index() {
        $this->pessoas();
    }

    public function cadastro($id = null) {
        $this->load->helper('form');
        if ($id){
            $data['pessoa'] = $this->ModelPessoa->getPessoa($id);
            $this->render('pessoa/editar',$data);
        } else {
            $this->render('pessoa/form');
        }
        
    }

    public function registra() {
        $this->load->library('form_validation');
        $tipo = $date = $this->input->post('tipopessoa');
        if ($tipo == 'Fisica') {
            $this->form_validation->set_rules('nome', 'Nome', 'required|callback_verifica_nome', array('required' => 'Você deve preencher o campo %s.'));
            $this->form_validation->set_rules('cpf', 'CPF', 'required', array('required' => 'Você deve preencher o campo %s.'));
        } else {
            $this->form_validation->set_rules('nome', 'Razão Social', 'required|callback_verifica_nome', array('required' => 'Você deve preencher o campo %s.'));
            $this->form_validation->set_rules('cnpj', 'CNPJ', 'required', array('required' => 'Você deve preencher o campo %s.'));
        }
        
        $this->form_validation->set_rules('email', 'Email', 'required', array('required' => 'Você deve preencher o campo %s.'));
        

        if ($this->form_validation->run() == FALSE) {
            $data['tipo'] = $tipo;
            $this->render('pessoa/form', $data);
        } else {

            $data['nome'] = $this->input->post('nome');
            $data['tipo'] = $this->input->post('tipopessoa');
            if ($tipo == 'Fisica') {
                $data['documento'] = $this->input->post('cpf');
            } else {
                $data['documento'] = $this->input->post('cnpj');
            }
            $data['apelido'] = $this->input->post('apelido');
            $data['email'] = $this->input->post('email');
            $data['telefone'] = $this->input->post('telefone');
            $data['cep'] = $this->input->post('cep');
            $data['rua'] = $this->input->post('rua');
            $data['numero'] = $this->input->post('num');
            $data['bairro'] = $this->input->post('bairro');
            $data['cidade'] = $this->input->post('cidade');
            $data['estado'] = $this->input->post('uf');

            if ($this->input->post("id")){
                $this->ModelPessoa->atualizar($this->input->post("id"), $data);
                $data['msgem'] = 'Cadastro alterado!';
            } else {
                $this->ModelPessoa->inserir($data);
                $data['msgem'] = 'Cadastro efetuado com sucesso!';
            }
            $this->render('pessoa/form', $data);
        }
    }

    function verifica_nome($nome) {
        if (!preg_match('/^[^ ][a-zãáàâêíúõéü ]+[^ ]$/i', $nome)) {
            // seta a mensagem de erro
            $this->form_validation->set_message('verifica_nome', 'O campo %s só permite letras');
            return false;
        } else {
            return true;
        }
    }

    public function pessoas() {
        $data['lista'] = $this->ModelPessoa->getPessoas();
        $this->render('pessoa/index', $data);
    }

    public function busca() {
        if (isset($_GET['term'])) {
            $nome = $_GET['term'];
            $lista = $this->ModelPessoa->getPessoas($nome);
            if (count($lista) > 0) {
                foreach ($lista as $pessoa) {
                    $array[] = $pessoa->nome . ' (' . $pessoa->email . ')';
                }
                echo json_encode($array);
            }
        }
    }

}
