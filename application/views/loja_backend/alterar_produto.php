<div class="col-md-6 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Alterar produtos: <?php echo $produto[0]->titulo ?> <small>Faça as alterações abaixo</small></h2>
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
            <?php echo validation_errors(); ?>

            <form action="<?= base_url('administracao/produtos/salvar_alteracoes'); ?>" method="POST">
                <?= form_hidden('id', md5($produto[0]->id)) ?>

                <label for="codigo">Código do produto * :</label>
                <input type="text" class="form-control" name="txt_codigo" value="<?=$produto[0]->codigo?>"/>

                <label for="txt_titulo">Título do produto * :</label>
                <input type="text" class="form-control" name="txt_titulo" value="<?=$produto[0]->titulo?>">

                <label for="txt_preco">Preço do produto * :</label>
                <input type="text" class="form-control" name="txt_preco" value="<?=$produto[0]->preco?>">

                <label for="txt_largura_caixa_mm">Largura da Caixa * :</label>
                <input type="text" class="form-control" name="txt_largura_caixa_mm" value="<?=$produto[0]->largura_caixa_mm?>">

                <label for="txt_altura_caixa_mm">Altura da Caixa * :</label>
                <input type="text" class="form-control" name="txt_altura_caixa_mm" value="<?=$produto[0]->altura_caixa_mm?>">

                <label for="txt_comprimento_caixa_mm">Comprimento da Caixa * :</label>
                <input type="text" class="form-control" name="txt_comprimento_caixa_mm" value="<?=$produto[0]->comprimento_caixa_mm?>">

                <label for="txt_peso_gramas">Peso em Gramas * :</label>
                <input type="text" class="form-control" name="txt_peso_gramas" value="<?=$produto[0]->peso_gramas?>">
                <br>
                <textarea class="form-control" name="txt_descricao"><?= $produto[0]->descricao ?></textarea>
                <br>
                <button type="submit" class="btn btn-primary">Cadastrar Produto</button>
            </form>
            <!-- end form for validations -->
        </div>
    </div>
</div>



<div class="col-lg-5 imagem">
    <h3>Imagem do Produto</h3>
    <?php
    if (is_file("assets/uploads/images/produtos/" . md5($produto[0]->id) . ".jpg")) {
        echo img("assets/uploads/images/produtos/" . md5($produto[0]->id) . ".jpg?i=" . date('dmYhis'));
    }
    echo form_open_multipart(base_url("administracao/produtos/nova_foto")) .
    form_hidden('id', md5($produto[0]->id)) .
    form_upload("userfile") .
    form_submit("btn_adicionar", "Adicionar nova imagem") .
    form_close();
    ?>
</div>