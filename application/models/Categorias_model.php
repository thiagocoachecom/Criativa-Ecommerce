<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Categorias_model extends CI_Model {

    public $id;
    public $titulo;
    public $descricao;

    public function __construct() {
        parent::__construct();
    }

    public function listar_categorias() {
        $this->db->order_by('titulo', 'ASC');
        return $this->db->get('categorias')->result();
    }

    public function total_categorias() {
        $query = $this->db->query('SELECT * FROM categorias');
        return $query->num_rows();
    }

    public function detalhes_categoria($id) {
        $this->db->where('id', $id);
        $this->db->or_where('md5(id)', $id);
        return $this->db->get('categorias')->result();
    }

    public function listar_produtos_categoria($id) {
        $dados['detalhes'] = $this->detalhes_categoria($id);
        $this->db->select('*');
        $this->db->from('produtos');
        $this->db->join('produtos_categorias', 'produtos_categorias.produto = produtos.id AND produtos_categorias.categoria = ' . $id);
        $dados['produtos'] = $this->db->get()->result();
        return $dados;
    }

    public function adicionar($titulo, $descricao) {
        $dados['titulo'] = $titulo;
        $dados['descricao'] = $descricao;
        return $this->db->insert('categorias', $dados);
    }

    public function excluir($id) {
        $this->db->where('md5(id)', $id);
        return $this->db->delete('categorias');
    }

    public function salvar_alteracoes($id, $titulo, $descricao) {
        $dados['titulo'] = $titulo;
        $dados['descricao'] = $descricao;
        $this->db->where('md5(id)', $id);
        return $this->db->update('categorias', $dados);
    }

}
