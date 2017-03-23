<div class="col-md-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Registration Form <small>Click to validate</small></h2>
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

            <form action="<?= base_url('administracao/produtos/criar'); ?>" method="POST">

                <label for="codigo">Código do produto * :</label>
                <input type="text" class="form-control" name="txt_codigo" value="<?= set_value('txt_codigo') ?>">

                <label for="txt_titulo">Título do produto * :</label>
                <input type="text" class="form-control" name="txt_titulo" value="<?= set_value('txt_titulo') ?>">

                <label for="txt_preco">Preço do produto * :</label>
                <input type="text" class="form-control" name="txt_preco" value="<?= set_value('txt_preco') ?>">

                <label for="txt_largura_caixa_mm">Largura da Caixa * :</label>
                <input type="text" class="form-control" name="txt_largura_caixa_mm" value="<?= set_value('txt_largura_caixa_mm') ?>">
                
                <label for="txt_altura_caixa_mm">Altura da Caixa * :</label>
                <input type="text" class="form-control" name="txt_altura_caixa_mm" value="<?= set_value('txt_altura_caixa_mm') ?>">

                <label for="txt_comprimento_caixa_mm">Comprimento da Caixa * :</label>
                <input type="text" class="form-control" name="txt_comprimento_caixa_mm" value="<?= set_value('txt_comprimento_caixa_mm') ?>">

                <label for="txt_peso_gramas">Peso em Gramas * :</label>
                <input type="text" class="form-control" name="txt_peso_gramas" value="<?= set_value('txt_peso_gramas') ?>">

                <br>
                <textarea class="form-control" name="txt_descricao"></textarea>
                <br>
                <button type="submit" class="btn btn-primary">Cadastrar Produto</button>
            </form>
            <!-- end form for validations -->
        </div>
    </div>
</div>