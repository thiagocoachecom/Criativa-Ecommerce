<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/* * *****************************************************************************
 * Controller da área de administração das categorias.
 * ***************************************************************************** */

class Paginas extends CI_Controller {

    private $paginas;

    public function __construct() {
        parent::__construct();
        $this->_init();
    }

    private function _init() {
        //Controle de Permissão
        $this->load->model('usuarios_model', 'modelusuarios');
        $this->modelusuarios->validar($this->router->class, $this->router->method);


        //Carregar models
        $this->load->model('paginas_model', 'modelpaginas');
        $this->paginas = $this->modelpaginas->listar_paginas();

        //Configurações de Templates
        $this->output->set_template('loja_backend');
        $this->output->set_title("Criativa e-commerce");

        //Carregar Sessoes do Template
        $this->load->section('footer', 'loja_frontend/footer');
    }

    public function index() {
        $this->load->library('table');
        $dados['paginas'] = $this->paginas;
        $this->load->view('loja_backend/paginas', $dados);
    }

    public function adicionar() {
        $this->form_validation->set_rules('txt_titulo', 'Título da página', 'required|min_length[3]');
        $this->form_validation->set_rules('txt_conteudo', 'Conteúdo da página', 'required|min_length[30]');
        $this->form_validation->set_rules('ordem_menu', 'Ordem do Menu', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('loja_backend/nova_pagina');
        } else {

            $titulo = $this->input->post('txt_titulo');
            $ordem_menu = $this->input->post('ordem_menu');
            $slug = urlAmigavel($titulo);
            $conteudo = $this->input->post('txt_conteudo');

            if ($this->modelpaginas->adicionar($titulo, $ordem_menu, $slug, $conteudo)) {
                redirect(base_url('administracao/paginas'));
            } else {
                echo "Houve um erro ao cadastrar a categoria.";
            }
        }
    }

    public function editar($pagina) {
        $dados['pagina'] = $this->modelpaginas->detalhes_pagina($pagina);
        $this->load->view('loja_backend/editar_pagina', $dados);
    }

    public function salvar_alteracoes() {
        $this->form_validation->set_rules('txt_titulo', 'Título da página', 'required|min_length[3]');
        $this->form_validation->set_rules('txt_conteudo', 'Conteúdo da página', 'required|min_length[30]');
        $this->form_validation->set_rules('ordem_menu', 'Ordenação', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->editar($this->input->post('id'));
        } else {

            $id = $this->input->post('id');
            $titulo = $this->input->post('txt_titulo');
            $ordem_menu = $this->input->post('ordem_menu');
            $slug = urlAmigavel($titulo);
            $conteudo = $this->input->post('txt_conteudo');


            if ($this->modelpaginas->salvar_alteracoes($id, $titulo, $ordem_menu, $slug, $conteudo)) {
                redirect(base_url('administracao/paginas'));
            } else {
                echo "Houve um erro ao cadastrar a categoria.";
            }
        }
        
        
    }

    public function nova_foto() {
        $id = $this->input->post('id');
        $config['upload_path'] = './assets/uploads/images/categorias';
        $config['allowed_types'] = 'jpg';
        $config['file_name'] = $id . ".jpg";
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            echo $this->upload->display_errors();
        } else {
            $config2['source_image'] = './assets/uploads/images/categorias/' . $id . '.jpg';
            $config2['create_thumb'] = FALSE;
            $config2['width'] = 400;
            $config2['height'] = 400;
            $this->load->library('image_lib', $config2);
            if ($this->image_lib->resize()) {
                redirect(base_url('administracao/categorias/alterar/' . $id));
            } else {
                echo $this->image_lib->display_errors();
            }
        }
    }

    public function excluir($pagina) {
        if ($this->modelpaginas->excluir($pagina)) {
            redirect(base_url('administracao/paginas'));
        } else {
            echo "Houve um erro ao excluir a categoria.";
        }
    }
    
    public function ordenacao($id_pagina){
        $this->form_validation->set_rules('ordem_menu', 'Ordenação', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $ordem_menu = $this->input->post('ordem_menu');


            if ($this->modelpaginas->salvar_ordenacao($id_pagina, $ordem_menu)) {
                redirect(base_url('administracao/paginas'));
            } else {
                echo "Houve um erro ao cadastrar a categoria.";
            }
        }
    }
}