<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/* * *****************************************************************************
 * Controller do carrinho de compras.
 * ***************************************************************************** */

class Carrinho extends CI_Controller {

    private $categorias;

    public function __construct() {
        parent::__construct();
        $this->_init();
    }

    public function _init() {
        //Carregar classes
        $this->load->model('categorias_model', 'modelcategorias');
        $this->categorias = $this->modelcategorias->listar_categorias();

        //Carregar categorias
        $this->categorias = $this->modelcategorias->listar_categorias();
        $data['categorias'] = $this->categorias;

        //Configurações de Templates
        $this->output->set_template('loja_frontend');
        $this->output->set_title("BSB Comunicação Mídia e Comunicação Visual");
        $this->output->append_title("Placas, Banners, Adesivos");
        $this->output->set_meta('description', 'tiohoiuhçkjhlku');
        $this->load->js('https://assets.pagar.me/js/pagarme.min.js');
        $this->load->js('assets/themes/loja_frontend/js/carrinho.js');
        $this->output->set_meta('keywords', 'placas, adesivos, comunicação visual, letreiros, letra caixa forma, banners');

        //Carregar Sessoes do Template
        $this->load->section('footer', 'loja_frontend/footer');
    }

    public function index() {
        $data['categorias'] = $this->categorias;

        if (null != $this->session->userdata('logado') && count($this->cart->contents()) > 0) {
            $sessao = $this->session->userdata();
            $cep = str_replace("-", "", $sessao['cliente']->cep);
            $data['frete'] = $this->calcular_frete($cep);
            //$estado = $sessao['cliente']->estado; //Usar essa variável para o método de cálculo por transportadora.
            //$data['frete'] = $this->frete_transportadora($estado);
        } else {
            $data['frete'] = null;
        }
        $this->load->view('loja_frontend/carrinho', $data);
    }

    public function adicionar() {
        $data = array(
            'id' => $this->input->post('id'),
            'qty' => $this->input->post('quantidade'),
            'price' => $this->input->post('preco'),
            'name' => $this->input->post('nome'),
            'altura' => $this->input->post('altura'),
            'largura' => $this->input->post('largura'),
            'comprimento' => $this->input->post('comprimento'),
            'peso' => $this->input->post('peso'),
            'options' => null,
            'url' => $this->input->post('url'),
            'foto' => $this->input->post('foto'));

        $this->cart->insert($data);
        redirect(base_url("carrinho"));
    }

    function atualizar() {
        foreach ($this->input->post() as $item) {
            if (isset($item['rowid'])) {
                $data = array('rowid' => $item['rowid'], 'qty' => $item['qty']);
                $this->cart->update($data);
            }
        }
        redirect(base_url('carrinho'));
    }

    function remover($rowid) {
        $data = array('rowid' => $rowid, 'qty' => 0);
        $this->cart->update($data);
        redirect(base_url('carrinho'));
    }

    function frete_transportadora($estado_destino) {
        $peso = 0;
        foreach ($this->cart->contents() as $item) {
            $peso += ($item['peso'] * $item['qty']);
        }
        $peso = ceil($peso / 1000);
        $custo_frete = $this->db->query("SELECT * FROM tb_transporte_preco WHERE ucase(uf) = ucase('" . $estado_destino . "') AND peso_ate >= " . $peso . " ORDER BY preco LIMIT 1")->result();
        if (count($custo_frete) < 1) {
            $custo_frete = $this->db->query("SELECT * FROM tb_transporte_preco WHERE uf = '" . $estado_destino . "' ORDER BY peso_ate DESC LIMIT 1")->result();
            print_r($custo_frete);
            if (count($custo_frete) < 1) {
                $custo_frete = $this->db->query("SELECT * FROM tb_transporte_preco ORDER BY preco DESC LIMIT 1")->result();
            }
        }
        $adicional = 0;
        if ($peso > $custo_frete[0]->peso_ate) {
            $adicional = ($peso - $custo_frete[0]->peso_ate) * $custo_frete[0]->adicional_kg;
        }
        $preco_frete = ($custo_frete[0]->preco + $adicional);
        return $preco_frete;
    }

    function calcular_frete($cep_destino) {
        /*
          foreach($this->cart->contents() as $item){
          echo $item['qty'] . " X " .$item['name'] . "&nbsp;&nbsp;";
          echo $item['altura'] . " x " . $item['largura'] . " x " . $item['comprimento'] . "mm = ";
          echo (($item['altura']/10 * $item['largura']/10 * $item['comprimento']/10)/100). "cm<sup>3</sup>" . br();
          }
          echo "<hr>";
         */
        $maior_alt = $maior_lar = $maior_comp = $cm_cub = $peso = 0;
        foreach ($this->cart->contents() as $item) {
            if ($item['altura'] > $maior_alt) {
                $maior_alt = $item['altura'];
            }
            if ($item['largura'] > $maior_lar) {
                $maior_lar = $item['largura'];
            }
            if ($item['comprimento'] > $maior_comp) {
                $maior_comp = $item['comprimento'];
            }
            $cm_cub += ((($item['altura'] / 10) * ($item['largura'] / 10) * ($item['comprimento'] / 10)) / 100) * $item['qty'];
            $peso += ($item['peso'] * $item['qty']);
        }
        $maiores_dimensoes = array('alt' => $maior_alt, 'lar' => $maior_lar, 'comp' => $maior_comp);
        arsort($maiores_dimensoes);
        foreach ($maiores_dimensoes as $chave => $valor) {
            $caixa[] = $valor;
        }
        $dimensao1 = $caixa[0];
        $dimensao2 = $caixa[1];
        $dimensao3 = 1;
        $caixas = 1;
        while (((($dimensao1 / 10) * ($dimensao2 / 10) * ($dimensao3 / 10)) / 100) < $cm_cub) {
            $dimensao3 ++;
            if ($dimensao3 % 1000 == 0) {
                $caixas++;
            }
        }
        if ($caixas > 1) {
            $dimensao3 = $dimensao3 - (($caixas - 1) * 1000);
        }

//        echo "Caixas: " . $caixas . br();
//        echo "Cubagem total dos itens " . ceil($cm_cub) . " cm<sup>3</sup>" . br();
//        echo "Cubagem da caixa calculada:" . ceil(((($dimensao1 / 10) * ($dimensao2 / 10) * ($dimensao3 / 10)) / 100)) . " cm<sup>3</sup>" . br();
//        echo "Altura caixa: " . $dimensao1 . "mm" . br();
//        echo "Largura caixa: " . $dimensao2 . "mm" . br();
//        echo "Comprimento caixa: " . $dimensao3 . "mm" . br();
//        echo "Peso em Kg " . ($peso / 1000) . br();

        $cep_origem = 72308614;
        $preco_correio = 0;
        if ($caixas == 1) {
            $preco_correio = $this->correio($cep_origem, $cep_destino, ($dimensao1 / 10), ($dimensao2 / 10), ($dimensao3 / 10), ($peso / 1000));
        } else if ($caixas > 1) {
            $peso = ($peso / $caixas);
            for ($i = $caixas; $i > 0; $i--) {
                if ($i > 1) {
                    $preco_correio += $this->correio($cep_origem, $cep_destino, ($dimensao1 / 10), ($dimensao2 / 10), 100, ($peso / 1000));
                } else {
                    $preco_correio += $this->correio($cep_origem, $cep_destino, ($dimensao1 / 10), ($dimensao2 / 10), ($dimensao3 / 10), ($peso / 1000));
                }
            }
        }
        return $preco_correio;
    }

    function correio($cep_origem, $cep_destino, $comprimento, $altura, $largura, $peso) {
        if ($altura < 2) {
            $altura = 2;
        } //-18 A altura não pode ser inferior a 2 cm.
        if ($largura < 11) {
            $largura = 11;
        } //-20 A largura não pode ser inferior a 11 cm.
        if ($comprimento < 16) {
            $comprimento = 16;
        } //-22 O comprimento não pode ser inferior a 16 cm.
        $data['nCdEmpresa'] = '';
        $data['sDsSenha'] = '';
        $data['sCepOrigem'] = $cep_origem;
        $data['sCepDestino'] = $cep_destino;
        $data['nVlPeso'] = $peso;
        $data['nCdFormato'] = '1';
        $data['nVlComprimento'] = $comprimento;
        $data['nVlAltura'] = $altura;
        $data['nVlLargura'] = $largura;
        $data['nVlDiametro'] = '0';
        $data['sCdMaoPropria'] = 's';
        $data['nVlValorDeclarado'] = '0';
        $data['sCdAvisoRecebimento'] = 'n';
        $data['StrRetorno'] = 'xml';
        $data['nCdServico'] = '40010'; //41106 PAC,40010 SEDEX,40045 SEDEX a Cobrar,40215 SEDEX 10.
        $data = http_build_query($data);
        $url = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx';
        $curl = curl_init($url . '?' . $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        $result = simplexml_load_string($result);
        foreach ($result->cServico as $row) {
            if ($row->Erro == 0) {
                return $row->Valor;
            } else {
                echo "<pre>";
                print_r($row);
                echo "</pre>";
            }
        }
    }

    public function form_pagamento() {
        if (null != $this->session->userdata('logado')) {
            $dados['categorias'] = $this->categorias;
            if (null != $this->session->userdata('logado')) {
                $sessao = $this->session->userdata();
                $cep = str_replace("-", "", $sessao['cliente']->cep);
                $dados['frete'] = $this->calcular_frete($cep);
                //$estado = $sessao['cliente']->estado;
                //$data['frete'] = $this->frete_transportadora($estado);
            } else {
                $dados['frete'] = null;
            }
            $this->load->view('loja_frontend/carrinho-formulario-pagamento', $dados);
        } else {
            redirect(base_url('login'));
        }
    }

    function finalizar_compra() {
        //Se o usuário estiver logado continua...
        if (null != $this->session->userdata('logado')) {

            //Pega os dados da sessão e armazena na var $sessao
            $sessao = $this->session->userdata();

            //Usa a função calcular_frete para retornar o valor na variável $frete
            $frete = $this->calcular_frete(str_replace("-", "", $sessao['cliente']->cep));


            //Se o imput do campo tipo_pagamento for cartao então...
            if ($this->input->post('tipo_pagamento') == 'cartao') {
                $this->db->trans_start();
                $dados['cliente'] = $sessao['cliente']->id;
                $dados['produtos'] = $this->cart->total();
                $dados['frete'] = (double) str_replace(",", ".", $frete);
                $dados['status'] = 0;
                $dados['comentarios'] = "Novo pedido inserido no sistema.";

                $this->db->insert('pedidos', $dados);

                $pedido = $this->db->insert_id();

                foreach ($this->cart->contents() as $item) {
                    $dados_item['pedido'] = $pedido;
                    $dados_item['item'] = $item['id'];
                    $dados_item['quantidade'] = $item['qty'];
                    $dados_item['preco'] = $item['price'];

                    $this->db->insert('itens_pedidos', $dados_item);
                }
                //A LÓGICA DE PAGAMENTO COM CARTÃO//
                //Hash com as informações do cartão
                $hash = $this->input->post('card_hash');

                //CARREGA A BIBLIOTECA DO PAGAR.ME
                require("./pagarme-php-master/Pagarme.php");
                //inserir a Chave de API encontrada no Dasboard do pagar.me 
                PagarMe::setApiKey("ak_test_eosuihFKuUGDnyVo5cikKj4R9iR7nK");

                //Total da Compra efetuada pelo cliente
                $carrinho = $this->cart->total();
                $frete = str_replace(",", "", $frete);

                $total = $carrinho + $frete;

                echo "Total Carrinho: " . $carrinho . "<br>";
                echo "Frete: " . $frete . "<br>";
                echo "Total a cobrar: " . $total . "<br>";

                //Monta o objeto para transação
                $transaction = new PagarMe_Transaction(array(
                    "amount" => $total,
                    "card_hash" => $hash,
                    "installments" => 1, //$this->input->post('parcelamento'),
                    "postback_url" => base_url('carrinho/finalizar_compra'),
                    "soft_descriptor" => "BSBPlacas",
                    "customer" => array(
                        "name" => $sessao['cliente']->nome,
                        "document_number" => $sessao['cliente']->cpf,
                        "email" => $sessao['cliente']->email,
                        "address" => array(
                            "street" => $sessao['cliente']->rua,
                            "street_number" => $sessao['cliente']->numero,
                            "neighborhood" => $sessao['cliente']->bairro,
                            "zipcode" => $sessao['cliente']->cep,
                        ),
                        "phone" => array(
                            "ddi" => "55",
                            "ddd" => "61",
                            "number" => $sessao['cliente']->telefone,
                        ),
                        "sex" => $sessao['cliente']->sexo,
                        "born_at" => $sessao['cliente']->data_nascimento,
                    ),
                    "metadata" => array(
                        "pedido_numero" => $pedido
                    )
                ));
                $transaction->charge();
                if ($transaction->status == 'processing') {
                    $this->db->trans_commit();
                    $this->cart->destroy();


                    //ENVIA O EMAIL DE CONFIRMAÇÃO
                } else {
                    $this->db->trans_rollback();
                }
                $dados_retorno['transacao'] = $transaction;
                $this->load->view('loja_frontend/retorno_cartao', $dados_retorno);

                $this->db->trans_complete();
            } else if ($this->input->post('tipo_pagamento') == 'boleto') {
                
                
                
                
                
                
            } else {
                redirect(base_url('pagar-e-finalizar-compra'));
            }
        } else {
            redirect(base_url('login'));
        }
    }

}
