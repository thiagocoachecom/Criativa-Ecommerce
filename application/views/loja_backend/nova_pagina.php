<div class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Nova Página <small>Cadastre novas páginas para a sua loja</small></h2>
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

                <div class="col-md-12 col-lg-12 col-sm-12">
                    <?php if (validation_errors()): ?>

                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <?= validation_errors() ?>
                        </div>

                    <?php endif; ?>

                    <form id="" data-parsley-validate="" novalidate="" action="<?= base_url('administracao/paginas/adicionar') ?>" method="POST">
                        <label for="nomecategoria">Título da página * :</label>
                        <input type="text" class="form-control" name="txt_titulo" value="<?= set_value('txt_titulo') ?>" required="">
                        
                        <br>

                        <label for="ordem">Ordem do menu:</label>

                        <?= select_ordem() ?>

                        <br>
                        
                        <br>
                        <label for="nomecategoria">Conteúdo da página * :</label>
                        <textarea type="text" class="form-control" name="txt_conteudo" value="<?= set_value('txt_conteudo') ?>" required=""></textarea>


                        <br>
                        <input type="submit" name="btn_adicionar" value="Adicionar" class="btn btn-primary">
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>