<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Paginas extends CI_Controller {

    private $categorias;
    private $paginas;

    function __construct() {
        parent::__construct();
        $this->_init();
    }

    private function _init() {
        //Carregar models
        $this->load->model('categorias_model', 'modelcategorias');
        $this->load->model('paginas_model', 'modelpaginas');

        //Carregar categorias
        $this->categorias = $this->modelcategorias->listar_categorias();
        $this->paginas = $this->modelpaginas->listar_paginas();
        $data['categorias'] = $this->categorias;
        $data['paginas'] = $this->paginas;

        //Configurações de Templates
        $this->output->set_template('loja_frontend');

        //Carregar Sessoes do Template
        $this->load->section('footer', 'loja_frontend/footer');
    }

    public function index() {
        $data['categorias'] = $this->categorias;
        $data['paginas'] = $this->paginas;
        $this->load->view('loja_frontend/paginas', $data);
    }

    public function exibir($id, $slug = NULL) {
        
        $data['paginas'] = $this->paginas;
        $data['conteudoPagina'] = $this->modelpaginas->detalhes_pagina($id);
        
        $data['categorias'] = $this->categorias;
        $data['categoria'] = $this->modelcategorias->listar_produtos_categoria($id);
        $this->load->section('sidebar', 'loja_frontend/sidebar', $data);
        $this->load->view('loja_frontend/pagina', $data);
    }

}
