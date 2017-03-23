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
        //Controle de Permissão
        $this->load->model('usuarios_model', 'modelusuarios');		
	$this->modelusuarios->validar($this->router->class,$this->router->method);
        
        //Carregar models
        $this->load->model('categorias_model', 'modelcategorias');

        //Carregar categorias
        $this->categorias = $this->modelcategorias->total_categorias();
        

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
        $data['categorias'] = $this->categorias;
        $this->load->view('loja_backend/home', $data);
    }
    
    public function login(){
        $this->output->unset_template();
        $this->load->view('loja_backend/login');
    }


}
