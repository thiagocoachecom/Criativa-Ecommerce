<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/* * *****************************************************************************
 * Controller da área de administração dos clientes.
 * ***************************************************************************** */

class Clientes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->_init();
    }
    
     private function _init() {
          //Controle de Permissão
        $this->load->model('usuarios_model', 'modelusuarios');
        $this->modelusuarios->validar($this->router->class, $this->router->method);
        
        
        //Carregar models
        $this->load->model('clientes_model', 'modelclientes');
        
        //Configurações de Templates
        $this->output->set_template('loja_backend');
        $this->output->set_title("Criativa e-commerce");
        $this->output->append_title("Uma plataforma de ecommerce grátis, criativa, segura e eficaz!");
        $this->output->set_meta('description', 'Uma plataforma de ecommerce gratis com total segurança e credibilidades dada pelos nossos clientes. Somos uma plataforma de loja virtual totalmente grátis.');
        $this->output->set_meta('keywords', 'plataforma de ecommerce, loja de ecommerce, loja virtual, loja virtual grátis, ecommerce grátis, loja integrada grátis');

        //Carregar Sessoes do Template
        $this->load->section('footer', 'loja_frontend/footer');
    }


    public function index() {
        $this->load->library('table');
        $dados['clientes'] = $this->modelclientes->listar($this->input->post('filtro'));
        $this->load->view('loja_backend/clientes', $dados);
    }

    public function alterar($cliente) {
        $dados['cliente'] = $this->modelclientes->detalhes($cliente);
        $this->load->view('loja_backend/alterar_cliente', $dados);
    }

    public function detalhes($cliente) {
        $dados['cliente'] = $this->modelclientes->detalhes($cliente);
        $this->load->view('loja_backend/detalhes_cliente', $dados);
    }

    public function salvar_alteracao() {
        $this->form_validation->set_rules('nome', 'Nome', 'required|min_length[5]');
        $this->form_validation->set_rules('cpf', 'CPF', 'required|min_length[14]');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        if ($this->form_validation->run() == FALSE) {
            $this->alterar($this->input->post('id'));
        } else {
            $id = $this->input->post('id');
            $nome = $this->input->post('nome');
            $sobrenome = $this->input->post('sobrenome');
            $rg = $this->input->post('rg');
            $cpf = $this->input->post('cpf');
            $data_nascimento = dataBr_to_dataMySQL($this->input->post('data_nascimento'));
            $sexo = $this->input->post('sexo');
            $cep = $this->input->post('cep');
            $rua = $this->input->post('rua');
            $bairro = $this->input->post('bairro');
            $cidade = $this->input->post('cidade');
            $estado = $this->input->post('estado');
            $numero = $this->input->post('numero');
            $telefone = $this->input->post('telefone');
            $celular = $this->input->post('celular');
            $email = $this->input->post('email');
            $status = $this->input->post('status');
            if ($this->modelclientes->salvar_alteracao($id, $nome, $sobrenome, $rg, $cpf, $data_nascimento, $sexo, $cep, $rua, $bairro, $cidade, $estado, $numero, $telefone, $celular, $email, $status)) {
                redirect(base_url("administracao/clientes/alterar/" . $id));
            } else {
                echo "Houve um erro ao processar o cadastro";
            }
        }
    }

    public function excluir($cliente) {
        if ($this->modelclientes->excluir_cliente($cliente)) {
            redirect(base_url("administracao/clientes/"));
        } else {
            echo "Houve um erro ao excluir o cadastro";
        }
    }

}
