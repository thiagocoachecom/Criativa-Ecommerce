<div class="page-title">
    <div class="title_left">
        <h3><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Páginas do Site</h3>
    </div>
    <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group pull-right">
                <a class="btn btn-success pull-right" href="<?= base_url('administracao/paginas/adicionar') ?>">Cadastrar nova página</a>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Páginas criadas <small>Suas páginas em funcionamento</small></h2>
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
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Titulo</th>
                                <th>Slug</th>
                                <th>Ordem do menu</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($paginas as $pagina): ?>
                                <tr>
                                    <th scope="row"><?= $pagina->id ?></th>
                                    <td><?= $pagina->titulo ?></td>
                                    <td><?= $pagina->slug ?></td>
                                    <td>
                                        <form action="<?= base_url('administracao/paginas/ordenacao/' . md5($pagina->id)) ?>" method="POST">
                                            <?= select_ordem($pagina->ordem) ?>
                                        </form>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger" href="<?= base_url('administracao/paginas/excluir/' . md5($pagina->id)); ?>">Excluir</a>
                                        <a class="btn btn-primary" href="<?= base_url('administracao/paginas/editar/' . md5($pagina->id)); ?>">Editar</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>