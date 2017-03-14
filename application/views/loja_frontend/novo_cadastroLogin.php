<div class="col-md-12">
    <div class="page-header">
        <h1>Identificação <small>Faça o seu login ou crie uma conta caso ainda não possua cadastro</small></h1>
    </div>
    <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>') ?>
</div>


<div class="col-md-6">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-user" aria-hidden="true"></i> Já sou cadastrado</h3>
        </div>
        <div class="panel-body">
            <form action="<?= base_url('cadastro/login') ?>" id="form_cadastro" method="post" accept-charset="utf-8">
                <div class="form-group">
                    <?= form_label('Email:', 'email'); ?>
                    <?= form_input(array('id' => 'email', 'name' => 'email', 'Placeholder' => 'Email cadastrado', 'value' => set_value('email'), 'class' => 'form-control')) ?>
                </div>
                <div class="form-group">
                    <?= form_label('Senha:', 'senha'); ?>
                    <?= form_input(array('id' => 'senha', 'name' => 'senha', 'class' => 'form-control', 'type' => 'password')) ?>
                </div>
                <input type="submit" name="btn_cadastrar" value="Prosseguir" class="btn btn-primary"> <a class="esqueci-minha-senha" href="<?=  base_url('esqueci_minha_senha')?>"><i class="fa fa-lock" aria-hidden="true"></i> Esqueci minha senha!</a>
            </form>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-plus-circle" aria-hidden="true"></i> Ainda não possuo cadastro</h3>
        </div>
        <div class="panel-body">
            <div class="col-md-12">
                <h3>Cadastre-se agora ;)</h3>
                <form action="<?= base_url('cadastro') ?>" id="form_cadastro" method="post" accept-charset="utf-8">
                    <div class="form-group">
                        <?= form_label('*Email:', 'email'); ?>
                        <?= form_input(array('id' => 'email', 'name' => 'email', 'value' => '', 'Placeholder' => 'E-mail', 'value' => set_value('email'), 'class' => 'form-control')) ?>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="btn_cadastrar" value="Cadastrar" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>