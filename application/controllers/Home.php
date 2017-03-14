<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    private $categorias;

    function __construct() {
        parent::__construct();
        $this->_init();
    }

    private function _init() {
        //Carregar models
        $this->load->model('categorias_model', 'modelcategorias');
        $this->load->model('produtos_model', 'modelprodutos');

        //Carregar categorias
        $this->categorias = $this->modelcategorias->listar_categorias();
        $data['categorias'] = $this->categorias;

        //Configurações de Templates
        $this->output->set_template('loja_frontend');
        $this->output->set_title("BSB Comunicação Mídia e Comunicação Visual");
        $this->output->append_title("Placas, Banners, Adesivos");
        $this->output->set_meta('description', 'tiohoiuhçkjhlku');
        $this->output->set_meta('keywords', 'placas, adesivos, comunicação visual, letreiros, letra caixa forma, banners');

        //Carregar Sessoes do Template
        $this->load->section('sidebar', 'loja_frontend/sidebar', $data);
        $this->load->section('footer', 'loja_frontend/footer');
    }

    public function index() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        if ($this->form_validation->run() == FALSE) {
            $this->output->set_template('loja_offline');
        } else {
            $dados['email'] = $this->input->post('email');
            $this->enviar_email_confirmacao($dados);
            $this->output->set_template('loja_offline');
        }
    }

    public function enviar_email_confirmacao($dados) {
        $mensagem = 'Obrigado por entrar em contato!' . $dados['email'];
        $this->load->library('email');
        $this->email->from("contato@bsbplacas.com.br", "E-Commerce Net Criativa");
        $this->email->to('ths.pereira@gmail.com');
        $this->email->subject('E-Comerce NetCriativa - Confirmação de cadastro');
        $this->email->message($mensagem);
        if ($this->email->send()) {
            $dados['mensagem'] = "Obrigado por enviar o seu email!";
            $this->output->set_template('loja_offline', $dados);
        } else {
            print_r($this->email->print_debugger());
        }
    }

    public function inicio() {
        $this->load->section('SlideBanner', 'loja_frontend/SlideBanner');
        $dados['destaques'] = $this->modelprodutos->destaques_home(12);
        $this->load->view('loja_frontend/home', $dados);
    }

    public function buscar() {
        $busca = $this->input->post('txt_busca');
        $dados_body['termo'] = $busca;
        $dados_body['destaques'] = $this->modelprodutos->busca($busca);
        $this->load->view('loja_frontend/busca', $dados_body);
    }

}
