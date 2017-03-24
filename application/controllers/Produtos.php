<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Produtos extends CI_Controller {

    public $categorias;

    function __construct() {
        parent::__construct();
        $this->_init();
    }

    private function _init() {
        //Carregar models
        $this->load->model('categorias_model', 'modelcategorias');
        $this->load->model('produtos_model', 'modelprodutos');
        $this->load->model('paginas_model', 'modelpaginas');

        //Carregar categorias, paginas
        $this->categorias = $this->modelcategorias->listar_categorias();
        $this->paginas = $this->modelpaginas->listar_paginas();

        //Configurações de Templates
        $this->output->set_template('loja_frontend');
        $this->output->set_title("BSB Comunicação Mídia e Comunicação Visual");

        //Carregar Sessoes do Template
        $this->load->section('footer', 'loja_frontend/footer');
    }

    public function index() {
        $dados['categorias'] = $this->categorias;
        $dados['paginas'] = $this->paginas;
        $this->load->view('loja_frontend/categorias', $dados);
    }

    public function produto($id) {
        $dados['categorias'] = $this->categorias;
        $dados['paginas'] = $this->paginas;
        $dados['especificacoes'] = $this->modelprodutos->getEspecificacoes();
        $produtos = $dados['produtos'] = $this->modelprodutos->detalhes_produto($id);
        

        //Configurações de Templates
        $this->output->append_title($produtos[0]->titulo);
        $this->output->set_meta('description', '$produtos[0]->description');
        $this->output->set_meta('keywords', '$produtos[0]->keywords');

        $this->load->view('loja_frontend/produto', $dados);
    }

}
