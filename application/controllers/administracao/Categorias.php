<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/* * *****************************************************************************
 * Controller da área de administração das categorias.
 * ***************************************************************************** */

class Categorias extends CI_Controller {

    private $categorias;

    public function __construct() {
        parent::__construct();
        $this->_init();
    }

    private function _init() {
        //Carregar models
        $this->load->model('categorias_model', 'modelcategorias');
        $this->categorias = $this->modelcategorias->listar_categorias();
        
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
        $dados['categorias'] = $this->categorias;
        $this->load->view('loja_backend/categorias', $dados);
    }

    public function adicionar() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt_titulo', 'Nome da categoria', 'required|min_length[3]|is_unique[categorias.titulo]');
        $this->form_validation->set_rules('txt_descricao', 'Descricao', 'required|min_length[30]');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $titulo = $this->input->post('txt_titulo');
            $descricao = $this->input->post('txt_descricao');
            if ($this->modelcategorias->adicionar($titulo, $descricao)) {
                redirect(base_url('administracao/categorias'));
            } else {
                echo "Houve um erro ao cadastrar a categoria.";
            }
        }
    }

    public function alterar($categoria) {
        $dados['categoria'] = $this->modelcategorias->detalhes_categoria($categoria);
        $this->load->view('loja_backend/alterar_categoria', $dados);
    }

    public function salvar_alteracoes() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt_titulo', 'Nome da categoria', 'required|min_length[3]');
        $this->form_validation->set_rules('txt_descricao', 'Descricao', 'required|min_length[30]');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $id = $this->input->post('id');
            $titulo = $this->input->post('txt_titulo');
            $descricao = $this->input->post('txt_descricao');
            if ($this->modelcategorias->salvar_alteracoes($id, $titulo, $descricao)) {
                redirect(base_url('administracao/categorias/alterar/' . $id));
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

    public function excluir($categoria) {
        if ($this->modelcategorias->excluir($categoria)) {
            redirect(base_url('administracao/categorias'));
        } else {
            echo "Houve um erro ao excluir a categoria.";
        }
    }

}
