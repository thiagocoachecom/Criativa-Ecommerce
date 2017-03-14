<div class="col-md-12">
    <div class="mold-cadastro-confirmado">
        <div class="jumbotron">
            <h1>;) Recuperar Login</h1>
            <p>Informe o <strong>e-mail</strong> cadastrado e o <strong>CPF</strong> para recuperar os dados de login.<br/>
                Obs. Somente é possível receber dados de login de cadastros ativos.</p>
            <?php
            echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>');
            echo form_open(base_url('cadastro/recuperar_login'), array('id' => 'form_recuperar_login', 'class' => 'form-inline')) .
            form_input(array('id' => 'email', 'class' => 'form-control', 'name' => 'email', 'Placeholder' => 'E-mail', 'value' => set_value('email'))) .
            form_input(array('id' => 'cpf', 'class' => 'form-control', 'name' => 'cpf', 'Placeholder' => 'CPF')) .
            form_submit("btnLogin", "Recuperar Login", array('class' => 'btn btn-success')) .
            form_close() .
            anchor(base_url('login'), "Efetuar Login", array('class' => 'btn btn-primary btn-xs mtop-20'));
            ?>
        </div>
    </div>
</div>