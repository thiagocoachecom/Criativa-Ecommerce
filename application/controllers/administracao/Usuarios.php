<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    private $categorias;

    function __construct() {
        parent::__construct();
        $this->_init();
    }

    private function _init() {
        //Controle de Permissão
        $this->load->model('usuarios_model', 'modelusuarios');
        $this->modelusuarios->validar($this->router->class, $this->router->method);

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

    public function efetuar_login() {
        $usuario = $this->input->post('usuario');
        $senha = $this->input->post('senha');
        $login = $this->modelusuarios->efetuar_login($usuario, $senha);
        if (count($login) === 1) {
            $sessao = array("login" => TRUE, "id_usuario" => $login[0]->id, "usuario" => $login[0]->login);
            $this->session->set_userdata($sessao);
            redirect(base_url("administracao"));
        } else {
            redirect(base_url("administracao/login"));
        }
    }

    public function sem_permissao() {
        $this->load->view('loja_backend/sem_permissao');
    }

    public function logout() {
        if ($this->session->unset_userdata('login') &&
                $this->session->unset_userdata('id_usuario') &&
                $this->session->unset_userdata('usuario')) {
            redirect(base_url("administracao/login"));
        } else {
            $this->session->sess_destroy();
            redirect(base_url("administracao/login"));
        }
    }

    public function index() {
        $this->load->library('table');
        $dados['usuarios'] = $this->modelusuarios->listar();
        $this->load->view('loja_backend/usuarios', $dados);
    }

    public function permissoes($usuario) {
        $this->load->library('table');
        $dados['usuario'] = $usuario;
        $dados['permissoes'] = $this->modelusuarios->listar_permissoes_usuario($usuario);
        $this->load->view('loja_backend/permissoes', $dados);
    }

    public function alterar_permissoes() {
        $usuario = $this->input->post("usuario");
        $metodo = $this->input->post("metodo");
        if ($this->modelusuarios->alterar_permissoes_usuario($usuario, $metodo)) {
            redirect(base_url("administracao/usuarios/permissoes/" . $usuario));
        } else {
            echo "Não foi possível alterar as permissões do usuário";
        }
    }

    public function adicionar() {
        $login = $this->input->post('login');
        $senha = $this->input->post('senha');
        if ($this->modelusuarios->adicionar($login, $senha)) {
            redirect(base_url("administracao/usuarios"));
        } else {
            echo "Não foi possível adicionar o usuário";
        }
    }

    public function alterar($usuario) {
        $dados['usuario'] = $this->modelusuarios->detalhes($usuario);
        $this->load->view('loja_backend/alterar_usuario', $dados);
    }

    public function salvar_alteracao() {
        $id = $this->input->post('id');
        $login = $this->input->post('login');
        $senha = $this->input->post('senha');
        if ($this->modelusuarios->salvar_alteracao($id, $login, $senha)) {
            redirect(base_url("administracao/usuarios"));
        } else {
            echo "Não foi possível alterar o usuário";
        }
    }

    public function excluir($usuario) {
        if ($this->modelusuarios->excluir($usuario)) {
            redirect(base_url("administracao/usuarios"));
        } else {
            echo "Não foi possível excluir o usuário";
        }
    }
} 