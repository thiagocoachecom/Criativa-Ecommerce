<div class="col-md-12">
    <div class="page-header">
        <h1>Identificação <small>Faça o seu login ou crie uma conta caso ainda não possua cadastro</small></h1>
    </div>
    <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>') ?>
</div>

<form action="<?= base_url('cadastro/adicionar') ?>" id="form_cadastro" method="post" accept-charset="utf-8">
    <div class="col-md-12">
        <p class="text-danger">* Alguns campos deste formulário de cadastro são obrigatórios.</p>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-user" aria-hidden="true"></i> Dados para acesso ao sistema</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= form_label('*Email:', 'email'); ?>
                            <?= form_input(array('id' => 'email', 'name' => 'email', 'Placeholder' => 'E-mail', 'value' => set_value('email'), 'class' => 'form-control')) ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= form_label('*Confirmar o email:', 'email'); ?>
                            <?= form_input(array('id' => 'confirmacao_email', 'name' => 'confirmacao_email', 'value' => set_value('confirmacao_email'), 'Placeholder' => 'Confirme o seu email', 'class' => 'form-control')) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= form_label('*Senha', 'senha'); ?>
                            <?= form_input(array('id' => 'senha', 'name' => 'senha', 'type' => 'password', 'value' => set_value('senha'), 'class' => 'form-control')) ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= form_label('*Confirme a sua senha', 'senha'); ?>
                            <?= form_input(array('id' => 'confirmacao_senha', 'name' => 'confirmacao_senha', 'value' => set_value('confirmacao_senha'), 'type' => 'password', 'class' => 'form-control')) ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-users" aria-hidden="true"></i> Dados pessoais</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= form_label('*Nome:', 'nome'); ?>
                            <?= form_input(array('id' => 'nome', 'name' => 'nome', 'Placeholder' => 'Primeiro nome', 'value' => set_value('nome'), 'class' => 'form-control')) ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= form_label('Sobrenome:', 'sobrenome'); ?>
                            <?= form_input(array('id' => 'sobrenome', 'name' => 'sobrenome', 'Placeholder' => 'Segundo nome', 'value' => set_value('sobrenome'), 'class' => 'form-control')) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <?= form_label('RG:', 'rg'); ?>
                            <?= form_input(array('id' => 'rg', 'name' => 'rg', 'Placeholder' => 'Numero do RG', 'value' => set_value('rg'), 'class' => 'form-control')) ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?= form_label('*CPF:', 'cpf'); ?>
                            <?= form_input(array('id' => 'cpf', 'name' => 'cpf', 'Placeholder' => 'Ex: 038.635.635.35', 'value' => set_value('cpf'), 'class' => 'form-control')) ?>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <?= form_label('*Data de Nascimento', 'data_nascimento'); ?>
                            <?= form_input(array('id' => 'data_nascimento', 'name' => 'data_nascimento', 'Placeholder' => 'Dia/Mês/Ano', 'value' => set_value('data_nascimento'), 'class' => 'form-control')) ?>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <?= form_label('Sexo:', 'sexo'); ?>
                            <?= form_input(array('id' => 'sexo', 'name' => 'sexo', 'Placeholder' => 'Sexo (M/F)', 'value' => set_value('sexo'), 'class' => 'form-control')) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-map-marker" aria-hidden="true"></i> Localizaçao e contato</h3>
            </div>
            <div class="panel-body">

                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <?= form_label('*CEP:', 'cep'); ?>
                            <?= form_input(array('id' => 'cep', 'name' => 'cep', 'Placeholder' => 'Digite o CEP', 'value' => set_value('cep'), 'class' => 'form-control')) ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= form_label('Rua:', 'rua'); ?>
                            <?= form_input(array('id' => 'rua', 'name' => 'rua', 'Placeholder' => 'Rua', 'value' => set_value('rua'), 'class' => 'form-control')) ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?= form_label('Bairro:', 'bairro'); ?>
                            <?= form_input(array('id' => 'bairro', 'name' => 'bairro', 'value' => '', 'Placeholder' => 'Bairro', 'value' => set_value('bairro'), 'class' => 'form-control')) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <?= form_label('Cidade:', 'cidade'); ?>
                            <?= form_input(array('id' => 'cidade', 'name' => 'cidade', 'value' => '', 'Placeholder' => 'Cidade', 'value' => set_value('cidade'), 'class' => 'form-control')) ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <?= form_label('Estado:', 'estado'); ?>
                            <?= form_input(array('id' => 'estado', 'name' => 'estado', 'value' => '', 'Placeholder' => 'Estado', 'value' => set_value('estado'), 'class' => 'form-control')) ?>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <?= form_label('*Numero:', 'numero'); ?>
                            <?= form_input(array('id' => 'numero', 'name' => 'numero', 'value' => '', 'Placeholder' => 'Número', 'value' => set_value('numero'), 'class' => 'form-control')) ?>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <?= form_label('*Telefone:', 'telefone'); ?>
                            <?= form_input(array('id' => 'telefone', 'name' => 'telefone', 'value' => '', 'Placeholder' => 'Telefone', 'value' => set_value('telefone'), 'class' => 'form-control')) ?>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <?= form_label('Celular:', 'celular'); ?>
                            <?= form_input(array('id' => 'celular', 'name' => 'celular', 'value' => '', 'Placeholder' => 'Celular', 'value' => set_value('celular'), 'class' => 'form-control')) ?>
                        </div>
                    </div>
                </div>
                <div class="form-group mtop-40">
                    <img src="https://www.ssl.net.br/wp-content/uploads/2014/10/comodo-ssl.png" width="150px" class="pright-20">
                    <img src="https://cdn.awsli.com.br/production/static/img/struct/stamp_rapidssl.png">
                    <input type="submit" name="btn_cadastrar" value="Cadastrar agora!" class="btn btn-success btn-lg pull-right">
                </div>
            </div>
        </div>
        <div class="sign-up-footer">
            Ao criar uma conta, você concorda com nossos <a href="#" target="_blank">termos de uso</a>, condições, <a href="#" target="_blank"> política de privacidade</a> e que tem pelo menos 18 anos de idade.
        </div>
    </div>
</form>