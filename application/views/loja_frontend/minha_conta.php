<div class="col-md-12">
    <div class="row">
        <div class="col-md-3">
            <div class="mold-minha-conta-left">
                <div class="mold-minha-conta-info-user">
                    <a href="#" class="thumbnail">
                        <img src="http://lorempixel.com/400/400/people" alt="">
                    </a>
                    <h4>Olá <?= $cliente[0]->nome ?> <?= $cliente[0]->sobrenome ?>  <button type="button" class="btn btn-danger btn-xs pull-right"><i class="fa fa-sign-out" aria-hidden="true"></i> Sair</button></h4> 
                </div>
                <div class="list-group">
                    <a href="<?= base_url('minhaconta/') . md5($cliente[0]->id); ?>" type="button" class="list-group-item"><i class="fa fa-user" aria-hidden="true"></i> Sua conta</a>
                    <a type="button" class="list-group-item"><i class="fa fa-archive" aria-hidden="true"></i> Pedidos</a>
                    <a type="button" class="list-group-item"><i class="fa fa-list-alt" aria-hidden="true"></i> Dados pessoais</a>
                    <a type="button" class="list-group-item"><i class="fa fa-map-marker" aria-hidden="true"></i> Endereços cadastrados</a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="mold-minha-conta-rigth">
                <div class="headline headline-home ng-scope">
                    <h1 class="title ng-binding"><i class="fa fa-user" aria-hidden="true"></i> Bem-vindo à sua conta ;)</h1>
                    <p class="description ng-binding">Aqui você acompanha seus pedidos e nos ajuda a te conhecer ainda mais ;)</p>
                    <hr>
                </div>
                <div class="order-container box-model box-default ng-scope">
                    <div class="box-inner">
                        <span class="icon-default icon-blue-order pull-left"></span>
                        <span class="message pull-left">
                            <span class="ng-binding ng-scope"><i class="fa fa-archive" aria-hidden="true"></i> Nenhum pedido realizado</span>
                        </span>
                    </div>
                </div>
                <div class="dados-pessoais">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Seus dados pessoais</h3>
                        </div>
                        <div class="panel-body">
                            <p>Mantenha sempre seus dados atualizados, fica mais fácil para nós conversarmos ;)</p>
                            <div class="mold-dados-pessoais">
                                <form action="<?= base_url('cadastro/salvar_alteracao_cadastro') ?>" id="form_cadastro" method="post" accept-charset="utf-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?= form_label('*Nome:', 'nome'); ?>
                                                <?= form_hidden('id', md5($cliente[0]->id)) ?>
                                                <?= form_input(array('id' => 'nome', 'name' => 'nome', 'Placeholder' => 'Primeiro nome', 'value' => $cliente[0]->nome, 'class' => 'form-control')) ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?= form_label('Sobrenome:', 'sobrenome'); ?>
                                                <?= form_input(array('id' => 'sobrenome', 'name' => 'sobrenome', 'Placeholder' => 'Segundo nome', 'value' => $cliente[0]->sobrenome, 'class' => 'form-control')) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <?= form_label('RG:', 'rg'); ?>
                                                <?= form_input(array('id' => 'rg', 'name' => 'rg', 'Placeholder' => 'Numero do RG', 'value' => $cliente[0]->rg, 'class' => 'form-control')) ?>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <?= form_label('Sexo:', 'sexo'); ?>
                                                <?= form_input(array('id' => 'sexo', 'name' => 'sexo', 'Placeholder' => 'Sexo (M/F)', 'value' => $cliente[0]->sexo, 'class' => 'form-control')) ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <?= form_label('*CPF:', 'cpf'); ?>
                                                <?= form_input(array('id' => 'cpf', 'name' => 'cpf', 'Placeholder' => 'Ex: 038.635.635.35', 'value' => $cliente[0]->cpf, 'class' => 'form-control')) ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <?= form_label('*Data de Nascimento', 'data_nascimento'); ?>
                                                <?= form_input(array('id' => 'data_nascimento', 'name' => 'data_nascimento', 'Placeholder' => 'Dia/Mês/Ano', 'value' => dataMySQL_to_dataBr($cliente[0]->data_nascimento), 'class' => 'form-control')) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <?= form_label('*CEP:', 'cep'); ?>
                                                <?= form_input(array('id' => 'cep', 'name' => 'cep', 'Placeholder' => 'Digite o CEP', 'value' => $cliente[0]->cep, 'class' => 'form-control')) ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?= form_label('Rua:', 'rua'); ?>
                                                <?= form_input(array('id' => 'rua', 'name' => 'rua', 'Placeholder' => 'Rua', 'value' => $cliente[0]->rua, 'class' => 'form-control')) ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <?= form_label('Bairro:', 'bairro'); ?>
                                                <?= form_input(array('id' => 'bairro', 'name' => 'bairro', 'value' => '', 'Placeholder' => 'Bairro', 'value' => $cliente[0]->bairro, 'class' => 'form-control')) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <?= form_label('Cidade:', 'cidade'); ?>
                                                <?= form_input(array('id' => 'cidade', 'name' => 'cidade', 'value' => '', 'Placeholder' => 'Cidade', 'value' => $cliente[0]->cidade, 'class' => 'form-control')) ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <?= form_label('Estado:', 'estado'); ?>
                                                <?= form_input(array('id' => 'estado', 'name' => 'estado', 'value' => '', 'Placeholder' => 'Estado', 'value' => $cliente[0]->estado, 'class' => 'form-control')) ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <?= form_label('*Numero:', 'numero'); ?>
                                                <?= form_input(array('id' => 'numero', 'name' => 'numero', 'value' => '', 'Placeholder' => 'Número', 'value' => $cliente[0]->numero, 'class' => 'form-control')) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?= form_label('*Telefone:', 'telefone'); ?>
                                                <?= form_input(array('id' => 'telefone', 'name' => 'telefone', 'value' => '', 'Placeholder' => 'Telefone', 'value' => $cliente[0]->telefone, 'class' => 'form-control')) ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?= form_label('Celular:', 'celular'); ?>
                                                <?= form_input(array('id' => 'celular', 'name' => 'celular', 'value' => '', 'Placeholder' => 'Celular', 'value' => $cliente[0]->celular, 'class' => 'form-control')) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?= form_label('*Email:', 'email'); ?>
                                                <?= form_input(array('id' => 'email', 'name' => 'email', 'Placeholder' => 'E-mail', 'value' => $cliente[0]->email, 'class' => 'form-control')) ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?= form_label('*Senha', 'senha'); ?>
                                                <?= form_input(array('id' => 'senha', 'name' => 'senha', 'type' => 'password', 'value' => $cliente[0]->senha, 'class' => 'form-control')) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                               <?= form_submit('btn_cadastrar', 'Alterar Cadastro', array('class' => 'btn btn-success')); ?>  
                                            </div>  
                                        </div> 
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>