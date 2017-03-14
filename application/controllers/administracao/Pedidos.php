<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/* * *****************************************************************************
 * Controller da área de administração dos pedidos de clientes.
 * ***************************************************************************** */

class Pedidos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->_init();
    }

    private function _init() {
        //Carregar models
        $this->load->model('pedidos_model', 'modelpedidos');
        $this->load->library('table');

        //Configurações de Templates
        $this->output->set_template('loja_backend');
        $this->output->set_title("Criativa e-commerce");
        $this->output->append_title("Uma plataforma de ecommerce grátis, criativa, segura e eficaz!");
        $this->output->set_meta('description', 'Uma plataforma de ecommerce gratis com total segurança e credibilidades dada pelos nossos clientes. Somos uma plataforma de loja virtual totalmente grátis.');
        $this->output->set_meta('keywords', 'plataforma de ecommerce, loja de ecommerce, loja virtual, loja virtual grátis, ecommerce grátis, loja integrada grátis');

        //Carregar Sessoes do Template
        $this->load->section('footer', 'loja_frontend/footer');
        $this->load->js('assets/library/echarts/dist/echarts.min.js');
        $this->load->js('assets/library/echarts/map/js/world.js');
        $this->load->js('assets/library/custom.js');
    }

    public function index() {
        $dados['total'] = $this->modelpedidos->contar();
        $dados['pedidos'] = $this->modelpedidos->listar($this->input->post('filtro'), $this->input->post('numero_nome'));
        $this->load->view('loja_backend/pedidos', $dados);
    }

    public function detalhes($pedido) {
        $dados = $this->modelpedidos->detalhes($pedido);
        $this->load->view('loja_backend/pedido', $dados);
    }

    public function alterar_status() {
        $id = $this->input->post('pedido_id');
        $status = $this->input->post('status');
        $comentarios = $this->input->post('comentarios');
        if ($this->modelpedidos->alterar_status($id, $status, $comentarios)) {
            $dados = $this->modelpedidos->detalhes(md5($id));
            $this->load->library('email');
            $this->email->from("contato@bsbplacas.com.br", "The Grocery Store Brazil");
            $this->email->to($dados['cliente'][0]->email);
            $this->email->subject('The Grocery Store Brazil - Pedido:' . $id);
            $this->email->message($this->load->view('loja_backend/emails/atualizacao_pedido', $dados, TRUE));
            if ($this->email->send()) {
                redirect(base_url("administracao/pedidos/detalhes/" . md5($id)));
            } else {
                return $this->email->print_debugger();
            }
        }
    }

    public function excluir($pedido) {
        if ($this->modelpedidos->excluir($pedido)) {
            redirect(base_url("administracao/pedidos/"));
        } else {
            echo "Houve um erro ao excluir o pedido";
        }
    }

}
