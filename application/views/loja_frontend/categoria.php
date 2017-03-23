<div class="col-xs-12 col-sm-9">
    <div class="mold_categorias_produtos">
        <div class="row">
            <div class="col-xs-10 col-sm-10">
                <h1><?= heading($categoria['detalhes'][0]->titulo, 1) ?></h1>
                <p><?= $categoria['detalhes'][0]->descricao ?></p>
            </div>
            <div class="col-xs-2 col-sm-2">
                <img alt="" src="<?= base_url("assets/uploads/images/categorias/" . md5($categoria['detalhes'][0]->id) . ".jpg") ?>" class="img-responsive img-categoria">
            </div>
        </div>
    </div>
    <div class="row">
        <?php
        $contador = 0;
        foreach ($categoria['produtos'] as $produto): $contador++;
            ?>
            <div class="col-sm-4 col-md-3 hidden-sm hidden-xs box-product-outer">
                <div class="box-product">
                    <div class="img-wrapper">
                        <a href="<?= base_url("produto/" . $produto->id . "/" . limpar($produto->titulo)); ?>">
                            <?php
                            if (is_file("assets/uploads/images/produtos/" . md5($produto->id) . ".jpg")) {
                                $image_properties = array(
                                    'src' => "assets/uploads/images/produtos/" . md5($produto->id) . ".jpg",
                                    'alt' => 'Categoria NetCriativa sem Imagem',
                                    'class' => 'img-responsive',
                                );
                                echo img($image_properties);
                            } else {
                                $image_properties = array(
                                    'src' => 'assets/themes/loja_backend/images/categoria-sem-imagem.gif',
                                    'alt' => 'Categoria NetCriativa sem Imagem',
                                    'class' => 'img-responsive',
                                );
                                echo img($image_properties);
                            }
                            ?>
                        </a>
                        <div class="tags tags-left">
                            <span class="label-tags"><span class="label label-success arrowed-right">Frete Grátis</span></span>
                        </div>
                    </div>
                    <h6><a href="<?= base_url("produto/" . $produto->id . "/" . limpar($produto->titulo)); ?>"><?= $produto->titulo ?></a></h6>
                    <div class="mold_info_product">
                        <span class="labelcartao"><b>3x</b> no cartão de crédito</span>
                        <br>
                        <span class="labeltag"><b>5%</b> de desconto no boleto à vista</span>
                    </div>
                    <br>
                    <a href="<?= base_url("produto/" . $produto->id . "/" . limpar($produto->titulo)); ?>" class="btn btn-primary center-block">Detalhes | preço</a>
                </div>
            </div>
            <?php
            if ($contador % 4 == 0) {
                echo "</div><div class='row'>";
            } endforeach;
        ?>
    </div>  
</div>