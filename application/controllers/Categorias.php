<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Categorias extends CI_Controller {

    private $categorias;

    function __construct() {
        parent::__construct();
        $this->_init();
    }

    private function _init() {
        //Carregar models
        $this->load->model('categorias_model', 'modelcategorias');
        
        //Carregar categorias
        $this->categorias = $this->modelcategorias->listar_categorias();
        $data['categorias'] = $this->categorias;
        
        //Configurações de Templates
        $this->output->set_template('loja_frontend');
        
        //Carregar Sessoes do Template
        $this->load->section('footer', 'loja_frontend/footer');
    }

    public function index() {
        $data['categorias'] = $this->categorias;
        $this->load->view('loja_frontend/categorias', $data);
    }

    public function categoria($id, $slug = NULL) {
        $data['categorias'] = $this->categorias;
        $data['categoria'] = $this->modelcategorias->listar_produtos_categoria($id);
        $this->load->section('sidebar', 'loja_frontend/sidebar', $data);
        $this->load->view('loja_frontend/categoria', $data);
    }

}
