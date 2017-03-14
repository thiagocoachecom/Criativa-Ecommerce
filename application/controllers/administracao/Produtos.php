<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/* * *****************************************************************************
 * Controller da área de administração dos produtos.
 * ***************************************************************************** */

class Produtos extends CI_Controller {

    private $categorias;

    public function __construct() {
        parent::__construct();
        $this->_init();
    }

    private function _init() {
        $this->load->model('categorias_model', 'modelcategorias');
        $this->categorias = $this->modelcategorias->listar_categorias();
        $this->load->model('produtos_model', 'modelprodutos');

        //Configurações de Templates
        $this->output->set_template('loja_backend');
        $this->output->set_title("Criativa e-commerce");
        $this->output->append_title("Uma plataforma de ecommerce grátis, criativa, segura e eficaz!");
        $this->output->set_meta('description', 'Uma plataforma de ecommerce gratis com total segurança e credibilidades dada pelos nossos clientes. Somos uma plataforma de loja virtual totalmente grátis.');
        $this->output->set_meta('keywords', 'plataforma de ecommerce, loja de ecommerce, loja virtual, loja virtual grátis, ecommerce grátis, loja integrada grátis');

        //Carregar Sessoes do Template
        $this->load->section('footer', 'loja_frontend/footer');
    }

    public function index($pular = null) {
        $this->load->library('table');
        $this->load->library('pagination');
        $config['base_url'] = base_url("administracao/produtos/index");
        $config['total_rows'] = $this->modelprodutos->contar();
        $produtos_por_pagina = 5;
        $config['per_page'] = $produtos_por_pagina;
        $this->pagination->initialize($config);
        $dados['links_paginacao'] = $this->pagination->create_links();
        $dados['produtos'] = $this->modelprodutos->listar($pular, $produtos_por_pagina);
        $dados['categorias'] = $this->categorias;
        $this->load->view('loja_backend/produtos', $dados);
    }

    public function adicionar() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt_codigo', 'Código', 'required|min_length[3]|is_unique[produtos.codigo]');
        $this->form_validation->set_rules('txt_titulo', 'Nome da categoria', 'required|min_length[3]');
        $this->form_validation->set_rules('txt_preco', 'Preço', 'required|decimal|min_length[3]');
        $this->form_validation->set_rules('txt_largura_caixa_mm', 'Largura (mm)', 'required|integer|min_length[3]');
        $this->form_validation->set_rules('txt_altura_caixa_mm', 'Altura (mm)', 'required|integer|min_length[3]');
        $this->form_validation->set_rules('txt_comprimento_caixa_mm', 'Comprimento (mm)', 'required|integer|min_length[3]');
        $this->form_validation->set_rules('txt_peso_gramas', 'Peso (gramas)', 'required|integer|min_length[2]');
        $this->form_validation->set_rules('txt_descricao', 'Descricao', 'required|min_length[30]');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $codigo = $this->input->post('txt_codigo');
            $titulo = $this->input->post('txt_titulo');
            $preco = $this->input->post('txt_preco');
            $largura = $this->input->post('txt_largura_caixa_mm');
            $altura = $this->input->post('txt_altura_caixa_mm');
            $comprimento = $this->input->post('txt_comprimento_caixa_mm');
            $peso = $this->input->post('txt_peso_gramas');
            $descricao = $this->input->post('txt_descricao');
            if ($this->modelprodutos->adicionar($codigo, $titulo, $preco, $largura, $altura, $comprimento, $peso, $descricao)) {
                redirect(base_url('administracao/produtos'));
            } else {
                echo "Houve um erro ao cadastrar a categoria.";
            }
        }
    }

    public function alterar($produto) {
        $dados['produto'] = $this->modelprodutos->detalhes_produto($produto);
        $this->load->view('loja_backend/alterar_produto', $dados);
    }

    public function salvar_alteracoes() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt_codigo', 'Código', 'required|min_length[3]');
        $this->form_validation->set_rules('txt_titulo', 'Nome da categoria', 'required|min_length[3]');
        $this->form_validation->set_rules('txt_preco', 'Preço', 'required|decimal|min_length[3]');
        $this->form_validation->set_rules('txt_largura_caixa_mm', 'Largura (mm)', 'required|integer|min_length[3]');
        $this->form_validation->set_rules('txt_altura_caixa_mm', 'Altura (mm)', 'required|integer|min_length[3]');
        $this->form_validation->set_rules('txt_comprimento_caixa_mm', 'Comprimento (mm)', 'required|integer|min_length[3]');
        $this->form_validation->set_rules('txt_peso_gramas', 'Peso (gramas)', 'required|integer|min_length[2]');
        $this->form_validation->set_rules('txt_descricao', 'Descricao', 'required|min_length[30]');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $id = $this->input->post('id');
            $codigo = $this->input->post('txt_codigo');
            $titulo = $this->input->post('txt_titulo');
            $preco = $this->input->post('txt_preco');
            $largura = $this->input->post('txt_largura_caixa_mm');
            $altura = $this->input->post('txt_altura_caixa_mm');
            $comprimento = $this->input->post('txt_comprimento_caixa_mm');
            $peso = $this->input->post('txt_peso_gramas');
            $descricao = $this->input->post('txt_descricao');
            if ($this->modelprodutos->salvar_alteracoes($id, $codigo, $titulo, $preco, $largura, $altura, $comprimento, $peso, $descricao)) {
                redirect(base_url('administracao/produtos/alterar/' . $id));
            } else {
                echo "Houve um erro ao cadastrar o produto.";
            }
        }
    }

    public function nova_foto() {
        $id = $this->input->post('id');
        $config['upload_path'] = './assets/uploads/images/produtos';
        $config['allowed_types'] = 'jpg';
        $config['file_name'] = $id . ".jpg";
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            echo $this->upload->display_errors();
        } else {
            $config2['source_image'] = './assets/uploads/images/produtos/' . $id . '.jpg';
            $config2['create_thumb'] = FALSE;
            $config2['width'] = 400;
            $config2['height'] = 400;
            $this->load->library('image_lib', $config2);
            if ($this->image_lib->resize()) {
                redirect(base_url('administracao/produtos/alterar/' . $id));
            } else {
                echo $this->image_lib->display_errors();
            }
        }
    }

    public function excluir($produto) {
        if ($this->modelprodutos->excluir($produto)) {
            redirect(base_url('administracao/produtos'));
        } else {
            echo "Houve um erro ao excluir o produto.";
        }
    }

}
