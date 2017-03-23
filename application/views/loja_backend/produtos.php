<div class="page-title">
    <div class="title_left">
        <h3>Produtos cadastrados</h3>
    </div>

    <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <a type="button" href="<?= base_url('administracao/produtos/criar') ?>" class="btn btn-success pull-right">Novo produto</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><i class="fa fa-bars"></i> Produtos <small>Abaixo faça as alterações necessárias nos produtos</small></h2>
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
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Imagem</th>
                            <th>Titulo</th>
                            <th>Categoria</th>
                            <th>Preço</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>      
                        <?php
                        foreach ($produtos as $produto) :
                            $image_properties = array(
                                'src' => 'assets/themes/loja_backend/images/categoria-sem-imagem.gif',
                                'alt' => 'Categoria NetCriativa sem Imagem',
                                'class' => 'cat_images',
                                'width' => '100px',
                                'height' => '100px',
                                'title' => 'That was quite a night',
                                'rel' => 'lightbox'
                            );
                            $imagem = img($image_properties);



                            if (is_file("assets/uploads/images/produtos/" . md5($produto->id) . ".jpg")) {
                                $image_properties = array(
                                    'src' => "assets/uploads/images/produtos/" . md5($produto->id) . ".jpg",
                                    'alt' => 'Categoria NetCriativa sem Imagem',
                                    'class' => 'cat_images',
                                    'width' => '100px',
                                    'height' => '',
                                    'title' => 'That was quite a night',
                                    'rel' => 'lightbox'
                                );
                                $imagem = img($image_properties);
                            }
                            $status = ($produto->ativo == 1) ? "Ativo" : "Inativo";
                            ?>
                            <tr>
                                <th scope="row"><?= $produto->codigo ?></th>
                                <td><?= $imagem ?></td>
                                <td><?= $produto->titulo ?></td>
                                <td><?= $produto->categoria ?></td>
                                <td><?= $produto->preco ?></td>
                                <td><?= $status ?></td>
                                <td>
                                    <a href="<?= base_url('administracao/produtos/editar/' . md5($produto->id)) ?>" type="button" class="btn btn-primary">Editar</a>
                                    <a href="<?= base_url('administracao/produtos/excluir/' . md5($produto->id)) ?>" type="button" class="btn btn-danger">Excluir</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="paginate_button"><?= $links_paginacao ?></div>
        </div>
    </div>
</div>