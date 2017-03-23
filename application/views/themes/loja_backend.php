<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?= $title; ?></title>

        <script src="http://cloud.tinymce.com/stable/tinymce.min.js?apiKey=y5sbu0l3u3entc9glq8g4ks45pmob1uxpzpmgupybfjjktfs"></script>
        <script type="text/javascript">
            tinymce.init({
                selector: 'textarea',
                height: 500,
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code'
                ],
                toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
            });
        </script>

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

        <!-- Bootstrap -->
        <link href="<?= base_url('assets/library/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?= base_url('assets/library/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
        <!-- NProgress -->
        <link href="<?= base_url('assets/library/nprogress/nprogress.css') ?>" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="<?= base_url('assets/themes/loja_backend/css/custom.min.css') ?>" rel="stylesheet">
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="<?= base_url('administracao'); ?>" class="site_title"><i class="fa fa-paw"></i> <span>Criativa</span></a>
                        </div>

                        <div class="clearfix"></div>

                        <!-- menu profile quick info -->
                        <div class="profile clearfix">
                            <div class="profile_pic">
                                <img src="http://www.escoteiros.org.br/wp-content/uploads/2015/05/nopic.png" alt="..." class="img-circle profile_img">
                            </div>
                            <div class="profile_info">
                                <span>Bem vindo,</span>
                                <h2><?= $this->session->userdata('usuario'); ?></h2>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- /menu profile quick info -->

                        <br />

                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                                <h3>Painel Geral</h3>
                                <ul class="nav side-menu">
                                    <li><a><i class="fa fa-home"></i> Vendas <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?= base_url('administracao/pedidos'); ?>">Pedidos</a></li>
                                            <li><a href="<?= base_url('administracao/clientes'); ?>">Clientes</a></li>
                                            <li><a href="<?= base_url('administracao/estoque'); ?>">Estoque</a></li>
                                            <li><a href="<?= base_url('administracao/relatorio'); ?>">Relatórios</a></li>
                                            <li><a href="<?= base_url('administracao/visaoGeral'); ?>">Visão Geral</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-edit"></i> Produtos <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?= base_url('administracao/produtos/listar'); ?>">Listar</a></li>
                                            <li><a href="<?= base_url('administracao/produtos/criar'); ?>">Criar</a></li>
                                            <li><a href="<?= base_url('administracao/produtos/especificacoes'); ?>">Especificações Técnicas</a></li>
                                            <li><a href="<?= base_url('administracao'); ?>">Importar / Exportar</a></li>
                                            <li><a href="<?= base_url('administracao/categorias'); ?>">Categorias</a></li>
                                            <li><a href="<?= base_url('administracao'); ?>">Marcas</a></li>
                                            <li><a href="<?= base_url('administracao'); ?>">Variações</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-desktop"></i> Marketing <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?= base_url('administracao'); ?>">Cupons de desconto</a></li>
                                            <li><a href="<?= base_url('administracao'); ?>">Frete Grátis</a></li>
                                            <li><a href="<?= base_url('administracao'); ?>">Carrinhos Abandonados</a></li>
                                            <li><a href="<?= base_url('administracao'); ?>">Depoimentos</a></li>
                                            <li><a href="<?= base_url('administracao'); ?>">Assinantes de Newsletter</a></li>
                                            <li><a href="<?= base_url('administracao'); ?>">Relatórios</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-table"></i> Layout <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?= base_url('administracao'); ?>">Editor de Tema</a></li>
                                            <li><a href="<?= base_url('administracao'); ?>">Banners</a></li>
                                            <li><a href="<?= base_url('administracao/paginas'); ?>">Páginas</a></li>
                                            <li><a href="<?= base_url('administracao'); ?>">Redes Sociais</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-cog"></i> Configurações <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?= base_url('administracao/usuarios'); ?>">Usuários</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /sidebar menu -->

                        <!-- /menu footer buttons -->
                        <div class="sidebar-footer hidden-small">
                            <a data-toggle="tooltip" data-placement="top" title="Settings">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Lock">
                                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Logout">
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            </a>
                        </div>
                        <!-- /menu footer buttons -->
                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
                        <nav>
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>

                            <ul class="nav navbar-nav navbar-right">
                                <li class="">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <img src="http://www.escoteiros.org.br/wp-content/uploads/2015/05/nopic.png" alt=""><?= $this->session->userdata('usuario'); ?>
                                        <span class=" fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                                        <!--                                        <li><a href="javascript:;"> Profile</a></li>
                                                                                <li>
                                                                                    <a href="javascript:;">
                                                                                        <span class="badge bg-red pull-right">50%</span>
                                                                                        <span>Settings</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li><a href="javascript:;">Help</a></li>-->
                                        <li><a href="<?= base_url('administracao/usuarios/logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Sair</a></li>
                                    </ul>
                                </li>

                                <li role="presentation" class="dropdown">
                                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-envelope-o"></i>
                                        <span class="badge bg-green">1</span>
                                    </a>
                                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                        <li>
                                            <a>
                                                <span class="image"><img src="http://www.escoteiros.org.br/wp-content/uploads/2015/05/nopic.png" alt="Profile Image" /></span>
                                                <span>
                                                    <span>Thiago Soares</span>
                                                    <span class="time">3 min atrás</span>
                                                </span>
                                                <span class="message">
                                                    Banco de dados da loja atualizado com sucesso!
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="text-center">
                                                <a>
                                                    <strong>Ver todas as mensagens</strong>
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /top navigation -->

                <!-- page content -->
                <div class="right_col" role="main">
                    <?= $this->load->get_section('sidebar'); ?>
                    <?= $output; ?>
                </div>
                <!-- /page content -->

                <!-- footer content -->
                <footer>
                    <div class="pull-right">
                        Criativa e-commerce - Uma plataforma de ecommerce grátis, criativa, segura e eficaz by <a href="https://netcriativa.com">NetCriativa</a>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>

        <!-- jQuery -->
        <script src="<?= base_url('assets/library/jquery/dist/jquery.min.js') ?>"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url('assets/library/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
        <!-- FastClick -->
        <script src="<?= base_url('assets/library/fastclick/lib/fastclick.js') ?>"></script>
        <!-- NProgress -->
        <script src="<?= base_url('assets/library/nprogress/nprogress.js') ?>"></script>

        <!-- Custom Theme Scripts -->
        <script src="<?= base_url('assets/themes/loja_backend/js/custom.min.js') ?>"></script>

        <!-- Library Core JavaScript -->    
        <?php
        foreach ($js as $file) {
            echo "\n\t\t";
            ?><script src="<?php echo $file; ?>"></script><?php
        } echo "\n\t";
        ?>
    </body>
</html>
