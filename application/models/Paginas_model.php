<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Paginas_model extends CI_Model {

    public $id;
    public $slug;
    public $titulo;
    public $descricao;

    public function __construct() {
        parent::__construct();
    }

    public function listar_paginas() {
        $this->db->order_by('ordem', 'ASD');
        return $this->db->get('paginas')->result();
    }

    public function total_paginas() {
        $query = $this->db->query('SELECT * FROM peginas');
        return $query->num_rows();
    }

    public function detalhes_pagina($id) {
        $this->db->where('id', $id);
        $this->db->or_where('md5(id)', $id);
        return $this->db->get('paginas')->result();
    }

//    public function listar_produtos_categoria($id) {
//        $dados['detalhes'] = $this->detalhes_categoria($id);
//        $this->db->select('*');
//        $this->db->from('produtos');
//        $this->db->join('produtos_categorias', 'produtos_categorias.produto = produtos.id AND produtos_categorias.categoria = ' . $id);
//        $dados['produtos'] = $this->db->get()->result();
//        return $dados;
//    }

    public function adicionar($titulo, $ordem_menu, $slug, $descricao) {
        $dados['titulo'] = $titulo;
        $dados['ordem'] = $ordem_menu;
        $dados['slug'] = $slug;
        $dados['descricao'] = $descricao;
        return $this->db->insert('paginas', $dados);
    }

    public function excluir($id) {
        $this->db->where('md5(id)', $id);
        return $this->db->delete('paginas');
    }

    public function salvar_alteracoes($id, $titulo, $ordem_menu, $slug, $descricao) {
        $dados['titulo'] = $titulo;
        $dados['ordem'] = $ordem_menu;
        $dados['slug'] = $slug;
        $dados['descricao'] = $descricao;
        $this->db->where('md5(id)', $id);
        return $this->db->update('paginas', $dados);
    }

    public function salvar_ordenacao($id, $ordenacao) {
        
        
        
        $dados['ordem'] = $ordenacao;

        $this->db->where('md5(id)', $id);
        return $this->db->update('paginas', $dados);
    }

}
