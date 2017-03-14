<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Thiago Soares Pereira - NetCriativa">

        <title><?= $title; ?></title>

        <?php
        /** -- Copy from here -- */
        if (!empty($meta))
            foreach ($meta as $name => $content) {
                echo "\n\t\t";
                ?><meta name="<?php echo $name; ?>" content="<?php echo $content; ?>" /><?php
            }
        echo "\n";

        if (!empty($canonical)) {
            echo "\n\t\t";
            ?><link rel="canonical" href="<?php echo $canonical ?>" /><?php
        }
        echo "\n\t";

        foreach ($css as $file) {
            echo "\n\t\t";
            ?><link rel="stylesheet" href="<?php echo $file; ?>" type="text/css" /><?php
        } echo "\n\t";


        /** -- to here -- */
        ?>

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

        <!-- Bootstrap Core CSS -->
        <link href="<?= base_url(); ?>assets/themes/loja_frontend/css/bootstrap.min.css" rel="stylesheet">

        <!-- Font Awesome -->
        <link href="<?= base_url(); ?>assets/library/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?= base_url(); ?>assets/themes/loja_frontend/css/small-business.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="<?= base_url(); ?>assets/themes/loja_frontend/images/favicon.png" type="image/x-icon"/>

    </head>
    <body>
        <!-- Navigation -->
        <div class="header-menu">
            <nav class="navbar navbar-fixed-top" role="navigation">
                <div class="mold_menu_top">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mold_info_redes_sociais">
                                    <i class="fa fa-facebook-square" aria-hidden="true"></i> Facebook | <i class="fa fa-google-plus-circle" aria-hidden="true"></i> Google Plus
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mold_info_menu_top">
                                    <ul>
                                        <?php if (null != $this->session->userdata('logado')): ?>
                                            <li><a href="<?= base_url('minhaconta/') . md5($this->session->userdata('cliente')->id); ?>"><i class="fa fa-user" aria-hidden="true"></i> Minha conta</a></li>
                                            <li><a href="#"><i class="fa fa-list-ul" aria-hidden="true"></i> Meus pedidos</a></li>
                                            <li><a href="#"><i class="fa fa-question-circle" aria-hidden="true"></i> Ajuda</a></li>
                                            <li><a href="<?= base_url('logout'); ?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Sair</a></li>
                                        <?php else: ?>
                                            <li><a href="#"><i class="fa fa-question-circle" aria-hidden="true"></i> Ajuda</li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mold_header_1">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a class="navbar-brand" href="<?= base_url('home/inicio'); ?>">
                                        <img src="<?= base_url('assets/themes/loja_frontend/images/logo-bsbplacas.png') ?>" alt="Sia Parafusos e Ferramentas" width="100%" title="Sia Parafusos e Ferramentas LTDA">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mold_pesquisa_login">
                                    <div class="login">
                                        <div class="wrapper">
                                            <?php if (null != $this->session->userdata('logado')): ?>
                                                Seja bem-vindo: <?= $this->session->userdata('cliente')->nome; ?> <?= $this->session->userdata('cliente')->sobrenome; ?>
                                            <?php else: ?>
                                                <a href="<?= base_url('login'); ?>"><i class="fa fa-sign-in" aria-hidden="true"></i> Entre</a>
                                                &nbsp;<span class="color">ou</span>&nbsp;
                                                <a id="topbar-signup-link" class="wm-topbar-sign-up" href="<?= base_url('cadastro'); ?>">Cadastre-se</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="pesquisa">
                                        <div class="form-group">
                                            <?php
                                            echo form_open(base_url("home/buscar"), array("name" => "form_busca", "class" => "form-inline"));
                                            echo form_input(array("type" => "text", "name" => "txt_busca", "class" => "form-control input_style_busca", "placeholder" => "Olá o que você procura?"));
                                            echo form_submit('submit_busca', 'Buscar produto', array("class" => "btn btn-default btn-busca"));
                                            echo form_close();
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <a href="<?= base_url('carrinho') ?>">
                                    <div class="carrinho_compras">
                                        <div class="icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></div>
                                        <div class="titulo">Meu Carrinho</div>
                                        <div class="item_valor"><?= $this->cart->total_items() ?> itens - <b><?= reais($this->cart->total()) ?></b></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="menu-secundario">
                    <div class="container">
                        <div class="mold_secundario">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                        <ul class="nav navbar-nav">
                                            <li class="dropdown categorias">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Todas as categorias <span class="caret"></span></a>
                                                <ul class="dropdown-menu categorias-ul">
                                                    <?php foreach ($categorias as $categoria): ?>
                                                        <li><a href="<?= base_url("categoria/" . $categoria->id . "/" . limpar($categoria->titulo)); ?>"><?= $categoria->titulo ?></a></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </li>
                                            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Quem somos</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Catálogo</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Matéria prima</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Informações Úteis</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Links Downloads</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Fotos e Vídeos</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Fale Conosco</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="pos-f-t" id="nav-scrool" style="display: none;">
            <div class="collapse" id="navbar-header" aria-expanded="false">
                <div class="container-fluid bg-inverse p-1">
                    <h3>Collapsed content</h3>
                    <p>Toggleable via the navbar brand.</p>
                </div>
            </div>
            <div class="navbar navbar-light bg-faded navbar-static-top">
                <div class="container">
                    <button class="navbar-toggler collapsed btn btn-primary" type="button" data-toggle="collapse" data-target="#navbar-header" aria-controls="navbar-header" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
        <?php if ($this->load->get_section('SlideBanner') != '') { ?>
            <?= $this->load->get_section('SlideBanner'); ?>
        <?php } ?>
        <div class="container">
            <div class="row">
                <?= $this->load->get_section('sidebar'); ?>
                <?= $output; ?>
            </div>
        </div>
        <!-- /.container -->


        <!-- Inicio do Rodape do E-commerce -->
        <?php if ($this->load->get_section('footer') != '') { ?>
            <!-- Footer -->
            <footer>
                <div class="container">
                    <div class="row">
                        <?= $this->load->get_section('footer'); ?>
                    </div>
                </div>
                <div class="mold-footer-bootom">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9">
                                <p class="texto-rodape">Copyright ® - Todos os direitos reservados.<br>
                                    Preços e condições de pagamento válidos exclusivamente para compras efetuadas no site, não valendo necessariamente para a rede de lojas físicas.<br>
                                    As imagens dos produtos são meramente ilustrativas. Todos os preços e condições comerciais estão sujeitos a alteração sem prévio aviso.</p>
                            </div>
                            <div class="col-md-3">
                                <a href="https://www.facebook.com/internetcriativa" target="_blank"><img src="<?= base_url('assets/themes/loja_frontend/images/logo-net-criativa-branco.png') ?>" class="pull-right logo-netcriativa"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        <?php } ?>
        <!-- FIM -->


        <!-- jQuery -->
        <script src="<?= base_url(); ?>assets/themes/loja_frontend/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?= base_url(); ?>assets/themes/loja_frontend/js/bootstrap.min.js"></script>

        <!-- Library Core JavaScript -->    
        <?php
        foreach ($js as $file) {
            echo "\n\t\t";
            ?><script src="<?php echo $file; ?>"></script><?php
        } echo "\n\t";
        ?>
    </body>
</html>
