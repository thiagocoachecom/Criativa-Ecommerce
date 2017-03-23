<div class="row">
    <div class="col-md-12">
        <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#myModal">Cadastrar nova</button>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Especificações Técnicas </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php echo validation_errors(); ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Descrição</th>
                            <th>Preço</th>
                            <th>Tamanho</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($especificacoes as $item): ?>
                            <tr>
                                <th scope="row"><?= $item->descricao ?></th>
                                <td><?= reais($item->preco) ?></td>
                                <td><?= $item->altura ?></td>
                                <td>
                                    <a type="button" href="<?= base_url('administracao/produtos/editar_especificacoes/' . md5($item->id)) ?>" class="btn btn-round btn-primary">Editar</a>
                                    <a type="button" href="<?= base_url('administracao/produtos/editar_especificacoes/' . md5($item->id)) ?>" class="btn btn-round btn-danger">Excluir</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form class="form-horizontal form-label-left input_mask" action="<?= base_url('administracao/produtos/especificacoes') ?>" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Criar nova especificação técnica</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Descricao" name="descricao" value="<?= set_value('descricao') ?>">
                            <span class="fa fa-file-text form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="text" class="form-control" id="inputSuccess3" placeholder="Preço" name="preco" value="<?= set_value('preco') ?>">
                            <span class="fa fa-usd form-control-feedback right" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Altura" name="altura" value="<?= set_value('altura') ?>">
                            <span class="fa fa-arrows-v form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="text" class="form-control" id="inputSuccess5" placeholder="Largura" name="largura" value="<?= set_value('largura') ?>">
                            <span class="fa fa-arrows-h form-control-feedback right" aria-hidden="true"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>
</div>