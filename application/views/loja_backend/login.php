<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Painel de Controle - BSB Placas</title>

        <!-- Bootstrap -->
        <link href="<?= base_url('assets/library/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?= base_url('assets/library/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
        <!-- NProgress -->
        <link href="<?= base_url('assets/library/nprogress/nprogress.css') ?>" rel="stylesheet">
        <!-- Animate.css -->
        <link href="<?= base_url('assets/library/animate.css/animate.min.css') ?>" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="<?= base_url('assets/themes/loja_backend/css/custom.min.css') ?>" rel="stylesheet">
    </head>

    <body class="login">
        <div>
            <a class="hiddenanchor" id="signup"></a>
            <a class="hiddenanchor" id="signin"></a>

            <div class="login_wrapper">
                <div class="animate form login_form">
                    <section class="login_content">
                        <form action="<?= base_url("administracao/usuarios/efetuar_login") ?>" method="POST">
                            <h1>BSB Placas</h1>
                            <div>
                                <input type="text" name="usuario" class="form-control" placeholder="Usuário" required="" />
                            </div>
                            <div>
                                <input type="password" name="senha" class="form-control" placeholder="Senha" required="" />
                            </div>
                            <div>
                                <button type="submit" class="btn btn-success btn-large">Conectar</button>
                            </div>

                            <div class="clearfix"></div>

                            <div class="separator">
                                <div>
                                    <h1><i class="fa fa-paw"></i> NetCriativa!</h1>
                                    <p>©2017 Todos os direitos reservador. NetCriativa - Desenvolvimentos web e mobile</p>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </body>
</html>