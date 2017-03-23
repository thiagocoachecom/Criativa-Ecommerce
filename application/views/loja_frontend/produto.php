<form action="<?= base_url('carrinho/adicionar') ?>" method="POST" accept-charset="utf-8">
    <div class="mold_produto_container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class='span4'>
                        <?php
                        if (is_file("assets/uploads/images/produtos/" . md5($produtos[0]->id) . ".jpg")) {
                            $foto = base_url("assets/uploads/images/produtos/" . md5($produtos[0]->id) . ".jpg");
                        } else {
                            $foto = base_url("assets/themes/loja_backend/images/categoria-sem-imagem.gif");
                        }
                        echo img($foto, FALSE, array('class' => 'img-responsive'));
                        ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="#">Início</a></li>
                            <li><a href="#">Categoria</a></li>
                            <li class="active"><?= $produtos[0]->titulo ?></li>
                        </ol>
                    </div>
                    <div class="titulo">
                        <h1><?= $produtos[0]->titulo ?></h1>
                    </div>
                    <div class="codigo-produto">
                        <span class="label label-primary">Código: <?= $produtos[0]->codigo ?></span>
                        <span class="cor-secundaria pull-right" itemprop="brand" itemscope="itemscope" itemtype="http://schema.org/Brand">
                            <b>Marca: </b>
                            <a href="http://www.siaparafusos.com/marca/vonder.html" itemprop="url">Marca do Produto</a>
                            <meta itemprop="name" content="Vonder">
                        </span>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="preco-produto destaque-avista com-promocao">
                                <div itemprop="offers" itemscope="itemscope" itemtype="http://schema.org/Offer">
                                    <s class="preco-venda ">
                                        <?= reais($produtos[0]->preco); ?>
                                    </s>
                                    <strong class="preco-promocional cor-principal ">
                                        <?= reais($produtos[0]->preco); ?>
                                    </strong>
                                </div>
                                <!--googleoff: all-->
                                <div itemprop="offers" itemscope="itemscope" itemtype="http://schema.org/Offer">
                                    <span class="preco-parcela ">
                                        até
                                        <strong class="cor-secundaria ">5x</strong>
                                        de
                                        <strong class="cor-secundaria"><?= reais($produtos[0]->preco); ?></strong>
                                        <span>sem juros</span>
                                    </span>
                                </div>
                                <!--googleon: all-->
                                <span class="desconto-a-vista" itemprop="offers" itemscope="itemscope" itemtype="http://schema.org/Offer">
                                    ou <strong class="cor-principal  preco-boleto"> <?= reais($produtos[0]->preco); ?></strong>
                                    via Boleto Bancário
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="comprar pull-right text-center">
                                <button type="submit" class="btn btn-danger btn-lg btn-finalizarcompra" rel="nofollow" data-placement="left">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Comprar
                                </button>
                                <br>
                                <span class="disponibilidade-produto">
                                    Estoque:
                                    <b class="">
                                        Disponível
                                    </b>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs ul-produtos" role="tablist">
                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Especificações Técnicas:</a></li>
                            <li role="presentation"><a href="#forma-pagamento" aria-controls="forma-pagamento" role="tab" data-toggle="tab">Formas de Pagamento:</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">
                                <?= $produtos[0]->descricao ?>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="forma-pagamento">
                                <div class="mold-form-pagamento">
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingOne">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        Boleto Bancário
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <img style="-webkit-user-select: none" src="https://www.asaas.com/blog/wp-content/uploads/2015/08/banner_boleto2.jpg" class="img-responsive">
                                                        </div>
                                                        <div class="col-md-10">
                                                            Com o boleto bancário da <b>BSB Placas</b> você tem total facilidade no processo de compra em nosso site. Realize o pagamento com até <b>12% de desconto</b> em todo site.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingTwo">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Cartão de Crédito
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                <div class="panel-body">
                                                    <img src="https://cdn.awsli.com.br/production/static/img/formas-de-pagamento/pagarme-cards.png?v=ec88fd0" alt="Pagar.me">
                                                    <br>
                                                    <br>
                                                    Em até 5x de <b>R$ 20,33</b> sem juros
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>






                    <div class="form-group">
                        <input type="hidden" name="id" value="<?= $produtos[0]->codigo ?>">
                        <input type="hidden" name="url" value="<?= base_url(uri_string()) ?>">
                        <input type="hidden" name="foto" value="<?= $foto ?>">
                        <input type="hidden" name="nome" value="<?= $produtos[0]->titulo ?>">
                        <input type="hidden" name="altura" value="<?= $produtos[0]->altura_caixa_mm ?>">
                        <input type="hidden" name="largura" value="<?= $produtos[0]->largura_caixa_mm ?>">
                        <input type="hidden" name="comprimento" value="<?= $produtos[0]->comprimento_caixa_mm ?>">
                        <input type="hidden" name="peso" value="<?= $produtos[0]->peso_gramas ?>">
                        <input type="hidden" name="preco" value="<?= reaisCart($produtos[0]->preco); ?>">
                        <input type="hidden" name="quantidade" value="1">
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>