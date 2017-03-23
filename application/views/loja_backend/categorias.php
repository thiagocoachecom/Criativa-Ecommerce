<div class="page-title">
    <div class="title_left">
        <h3><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Categorias</h3>
    </div>

    <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="O que você procura?">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Buscar!</button>
                </span>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-6">
        <div class="x_panel">
            <div class="x_title">
                <h2>Nova Categoria <small>Realize o cadastro de novas categorias</small></h2>
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
            <div class="x_content" style="display: block;">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <?php if (validation_errors()): ?>

                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <?= validation_errors() ?>
                        </div>

                    <?php endif; ?>

                    <form id="demo-form" data-parsley-validate="" novalidate="" action="<?= base_url('administracao/categorias/adicionar') ?>" method="POST">
                        <label for="nomecategoria">Nome da Categoria * :</label>
                        <input type="text" id="txt_titulo" class="form-control" name="txt_titulo" value="<?= set_value('txt_titulo') ?>" required="">

                        <label for="nomecategoria">Nome da Categoria * :</label>
                        <textarea type="text" id="txt_descricao" class="form-control" name="txt_descricao" value="<?= set_value('txt_descricao') ?>" required=""></textarea>
                        <br>
                        <input type="submit" name="btn_adicionar" value="Adicionar" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="x_panel">
            <div class="x_title">
                <h2>Alterar Categoria <small>Atualize suas categorias</small></h2>
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
            <div class="x_content" style="display: block;">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <?php
                    $this->table->set_heading("Imagem", "Excluir", "Alterar", "Nome da categoria");
                    foreach ($categorias as $categoria) {
                        $image_properties = array(
                            'src' => 'assets/themes/loja_backend/images/categoria-sem-imagem.gif',
                            'alt' => 'Categoria NetCriativa sem Imagem',
                            'class' => 'cat_images',
                            'width' => '100px',
                            'height' => '',
                            'title' => 'That was quite a night',
                            'rel' => 'lightbox'
                        );
                        $imagem = img($image_properties);


                        if (is_file("assets/uploads/images/categorias/" . md5($categoria->id) . ".jpg")) {
                            $image_properties = array(
                                'src' => "assets/uploads/images/categorias/" . md5($categoria->id) . ".jpg",
                                'alt' => 'Categoria NetCriativa sem Imagem',
                                'class' => 'cat_images',
                                'width' => '100px',
                                'height' => '',
                                'title' => 'That was quite a night',
                                'rel' => 'lightbox'
                            );
                            $imagem = img($image_properties);
                        }


                        $excluir = anchor(base_url("administracao/categorias/excluir/" . md5($categoria->id)), "Excluir");
                        $alterar = anchor(base_url("administracao/categorias/alterar/" . md5($categoria->id)), "Alterar");
                        $this->table->add_row($imagem, $excluir, $alterar, $categoria->titulo);
                    }
                    $this->table->set_template(array('table_open' => '<table class="table table-striped miniaturas">'));
                    echo $this->table->generate()
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>