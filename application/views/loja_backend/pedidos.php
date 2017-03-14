<div class="col-md-6 col-sm-6 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2><?php echo $total ?> Pedidos Cadastrados <small>Confira todas as informações sobre os pedidos</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                    </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <?php
            echo form_open(base_url("administracao/pedidos"), array('class'=>'form-horizontal form-label-left'));
            echo form_label("Filtrar por tipo&nbsp;", "filtro");
            $filtro = array("*" => 'Todos', '0' => 'Novos', '1' => 'Pagos', '2' => 'Enviados');
            echo form_dropdown('filtro', $filtro, 'todos', array("class" => "form-control"));
            echo form_label("Número do pedido ou Nome do cliente&nbsp;", "numero_nome");
            echo form_input(array("id" => "numero_nome", "name" => "numero_nome", "class" => "form-control"));
            echo form_submit(array("id" => "filtrar", "name" => "filtrar", "value" => "Filtrar", "class" => "btn btn-default"));
            echo form_close();
            ?>

            <?php
            $txt_status = array(0 => "Novo", 1 => "Pagamento confirmado", 2 => "Enviado");
            $this->table->set_heading("Excluir", "Detalhes", "Data", "Número", "Status", "Cliente", "Produtos", "Frete");
            foreach ($pedidos as $pedido) {
                $excluir = anchor(base_url("administracao/pedidos/excluir/" . md5($pedido->id)), "Excluir", array('class'=>'btn btn-round btn-danger btn-sm'));
                $detalhes = anchor(base_url("administracao/pedidos/detalhes/" . md5($pedido->id)), "Detalhes", array('class'=>'btn btn-round btn-primary btn-sm'));
                $nome = $pedido->nome . " " . $pedido->sobrenome;
                $status = $txt_status[$pedido->status];
                $data = dataMySQL_to_dataBr($pedido->data_adicionado);
                $produtos = reais($pedido->produtos);
                $frete = reais($pedido->frete);
                $this->table->add_row($excluir, $detalhes, $data, $pedido->id, $status, $nome, $produtos, $frete);
            }
            $this->table->set_template(array('table_open' => '<table class="table table-striped">'));
            echo $this->table->generate()
            ?>
        </div>
    </div>
</div>
<div class="col-md-6 col-sm-6 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Donut Graph</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                    </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <div id="echart_donut" style="height:350px;"></div>

        </div>
    </div>
</div>