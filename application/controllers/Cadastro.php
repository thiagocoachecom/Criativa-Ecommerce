<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cadastro extends CI_Controller {

    private $categorias;
    private $paginas;

    function __construct() {
        parent::__construct();
        $this->_init();
    }

    private function _init() {
        //Carregar models, library, helper
        $this->load->model('categorias_model', 'modelcategorias');
        $this->load->model('paginas_model', 'modelpaginas');

        //Carregar categorias, paginas
        $this->categorias = $this->modelcategorias->listar_categorias();
        $this->paginas = $this->modelpaginas->listar_paginas();

        //Configurações de Templates
        $this->output->set_template('loja_frontend');
        $this->output->set_title("BSB Comunicação Mídia e Comunicação Visual");
        $this->output->append_title("Faça o seu cadastro e aproveite nossas promoções");

        //Carregando arquivos JS
        $this->load->js('assets/library/jquery.mask/jquery.mask.js');
        $this->load->js('assets/themes/loja_frontend/js/jquery.mask.js');

        //Definir as metas tags
        $this->output->set_meta('description', 'tiohoiuhçkjhlku');
        $this->output->set_meta('keywords', 'placas, adesivos, comunicação visual, letreiros, letra caixa forma, banners');

        //Carregar Sessoes do Template
        $this->load->section('footer', 'loja_frontend/footer');
    }

    public function index() {
        $dados['categorias'] = $this->categorias;
        $dados['paginas'] = $this->paginas;
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|is_unique[clientes.email]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('loja_frontend/novo_cadastroLogin', $dados);
        } else {
            $dados['email'] = $this->input->post('nome');
            $this->load->view('loja_frontend/nova_conta', $dados);
        }
    }

    public function adicionar() {
        //Confirmação de Email
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|is_unique[clientes.email]');
        $this->form_validation->set_rules('confirmacao_email', 'E-mail de confirmação', 'required|matches[email]|valid_email|is_unique[clientes.email]');

        //Confirmação de Senha
        $this->form_validation->set_rules('senha', 'Senha', 'required|min_length[6]');
        $this->form_validation->set_rules('confirmacao_senha', 'Confirmação de Senha', 'required|min_length[6]|matches[senha]');

        //Dados obrigatórios
        $this->form_validation->set_rules('nome', 'Nome', 'required|min_length[5]');
        $this->form_validation->set_rules('cpf', 'CPF', 'required|min_length[14]|is_unique[clientes.cpf]');
        $this->form_validation->set_rules('data_nascimento', 'Data de Nascimento', 'required');
        $this->form_validation->set_rules('cep', 'CEP', 'required|min_length[8]');
        $this->form_validation->set_rules('numero', 'Numero', 'required');
        $this->form_validation->set_rules('telefone', 'Telefone', 'required');

        //Se as informações de cadastro estiverem erradas
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('loja_frontend/nova_conta');
        } else { // caso ocorra tudo ok, cadastrar o novo cliente
            $dados['nome'] = $this->input->post('nome');
            $dados['sobrenome'] = $this->input->post('sobrenome');
            $dados['rg'] = $this->input->post('rg');
            $dados['cpf'] = $this->input->post('cpf');
            $dados['data_nascimento'] = dataBr_to_dataMySQL($this->input->post('data_nascimento'));
            $dados['sexo'] = $this->input->post('sexo');
            $dados['cep'] = $this->input->post('cep');
            $dados['rua'] = $this->input->post('rua');
            $dados['bairro'] = $this->input->post('bairro');
            $dados['cidade'] = $this->input->post('cidade');
            $dados['estado'] = $this->input->post('estado');
            $dados['numero'] = $this->input->post('numero');
            $dados['telefone'] = $this->input->post('telefone');
            $dados['celular'] = $this->input->post('celular');
            $dados['email'] = $this->input->post('email');
            $dados['senha'] = $this->input->post('senha');
            if ($this->db->insert('clientes', $dados)) {
                $this->enviar_email_confirmacao($dados);
            } else {
                echo "Houve um erro ao processar seu cadastro";
            }
        }
    }

    public function enviar_email_confirmacao($dados) {
        $mensagem = $this->load->view('loja_frontend/emails/confirmar_cadastro.php', $dados, TRUE);
        $this->load->library('email');
        $this->email->from("contato@bsbplacas.com.br", "E-Commerce Net Criativa");
        $this->email->to($dados['email']);
        $this->email->subject('E-Comerce NetCriativa - Confirmação de cadastro');
        $this->email->message($mensagem);
        if ($this->email->send()) {
            $dados['categorias'] = $this->categorias;
            $dados['paginas'] = $this->paginas;
            $this->load->view('loja_frontend/cadastro_enviado', $dados);
        } else {
            print_r($this->email->print_debugger());
        }
    }

    public function confirmar($hashEmail) {
        $dados['status'] = 1;
        $this->db->where('md5(email)', $hashEmail);
        if ($this->db->update('clientes', $dados)) {
            $dados['categorias'] = $this->categorias;
            $dados['paginas'] = $this->paginas;
            $this->load->view('loja_frontend/cadastro_liberado', $dados);
        } else {
            echo "Houve um erro ao confirmar seu cadastro";
        }
    }

    public function login() {
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        $this->form_validation->set_rules('senha', 'Senha', 'required|min_length[5]');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $this->db->where('email', $this->input->post('email'));
            $this->db->where('senha', $this->input->post('senha'));
            $this->db->where('status', 1);
            $cliente = $this->db->get('clientes')->result();
            //echo $this->db->last_query(); //Use a função $this->db->last_query() para verificar a última consulta executada.
            //print_r($cliente);
            //exit();      
            if (count($cliente) == 1) {
                $dadosSessao['cliente'] = $cliente[0];
                $dadosSessao['logado'] = TRUE;
                $this->session->set_userdata($dadosSessao);
                redirect(base_url('carrinho'));
            } else {
                $dadosSessao['cliente'] = NULL;
                $dadosSessao['logado'] = FALSE;
                $this->session->set_userdata($dadosSessao);
                redirect(base_url("login"));
            }
        }
    }

    public function logout() {
        $dadosSessao['cliente'] = NULL;
        $dadosSessao['logado'] = FALSE;
        $this->session->set_userdata($dadosSessao);
        redirect(base_url("login"));
    }

    public function esqueci_minha_senha() {
        $dados['categorias'] = $this->categorias;
        $dados['paginas'] = $this->paginas;
        $this->load->view('loja_frontend/form_recupera_login', $dados);
    }

    public function recuperar_login() {
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        $this->form_validation->set_rules('cpf', 'Senha', 'required|min_length[5]');
        if ($this->form_validation->run() == FALSE) {
            $this->esqueci_minha_senha();
        } else {
            $this->db->where('email', $this->input->post('email'));
            $this->db->where('cpf', $this->input->post('cpf'));
            $this->db->where('status', 1);
            $cliente = $this->db->get('clientes')->result();
            if (count($cliente) == 1) {
                $dados = $cliente[0];
                $mensagem = $this->load->view('loja_frontend/emails/recuperar_senha.php', $dados, TRUE);
                $this->load->library('email');
                $this->email->from("contato@bsbplacas.com.br", "The Grocery Store Brazil");
                $this->email->to($dados->email);
                $this->email->subject('The Grocery Store Brazil - Recuperação de cadastro');
                $this->email->message($mensagem);
                if ($this->email->send()) {
                    $dados['categorias'] = $this->categorias;
                    $dados['paginas'] = $this->paginas;
                    $this->load->view('loja_frontend/senha_enviada', $dados);
                } else {
                    print_r($this->email->print_debugger());
                }
            } else {
                redirect(base_url("esqueci_minha_senha"));
            }
        }
    }

    public function minhaconta($id) {
        if (null != $this->session->userdata('logado')) {
            $this->db->where('md5(id)', $id);
            $this->db->where('id', $this->session->userdata('cliente')->id);
            $this->db->where('status', 1);
            $data['cliente'] = $this->db->get('clientes')->result();
            if (count($data['cliente']) == 1) {
                $dados['categorias'] = $this->categorias;
                $dados['paginas'] = $this->paginas;
                $this->load->view('loja_frontend/minha_conta', $dados);
            } else {
                redirect(base_url("login"));
            }
        } else {
            redirect(base_url("login"));
        }
    }

    function salvar_alteracao_cadastro() {
        if (null != $this->session->userdata('logado')) {
            $this->form_validation->set_rules('nome', 'Nome', 'required|min_length[5]');
            $this->form_validation->set_rules('cpf', 'CPF', 'required|min_length[14]');
            $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
            if ($this->form_validation->run() == FALSE) {
                $this->minhaconta($this->input->post('id'));
            } else {
                $dados['nome'] = $this->input->post('nome');
                $dados['sobrenome'] = $this->input->post('sobrenome');
                $dados['rg'] = $this->input->post('rg');
                $dados['cpf'] = $this->input->post('cpf');
                $dados['data_nascimento'] = dataBr_to_dataMySQL($this->input->post('data_nascimento'));
                $dados['sexo'] = $this->input->post('sexo');
                $dados['cep'] = $this->input->post('cep');
                $dados['rua'] = $this->input->post('rua');
                $dados['bairro'] = $this->input->post('bairro');
                $dados['cidade'] = $this->input->post('cidade');
                $dados['estado'] = $this->input->post('estado');
                $dados['numero'] = $this->input->post('numero');
                $dados['telefone'] = $this->input->post('telefone');
                $dados['celular'] = $this->input->post('celular');
                $dados['email'] = $this->input->post('email');
                $dados['senha'] = $this->input->post('senha');
                $dados['status'] = 0;
                $this->db->query("INSERT INTO clientes_log SELECT * FROM clientes WHERE md5(id) = '" . $this->input->post('id') . "'");
                $this->db->where('md5(id)', $this->input->post('id'));
                if ($this->db->update('clientes', $dados)) {
                    $this->enviar_email_confirmacao($dados);
                } else {
                    echo "Houve um erro ao processar a sua atualização!";
                }
            }
        } else {
            redirect(base_url('login'));
        }
    }

}
