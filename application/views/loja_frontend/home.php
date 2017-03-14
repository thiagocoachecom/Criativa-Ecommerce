<div class="col-xs-12 col-sm-9">
    <div class="row">
        <?php
        $contador = 0;
        foreach ($destaques as $destaque): $contador++;
            ?>
            <div class="col-sm-4 col-md-3 hidden-sm hidden-xs box-product-outer">
                <div class="box-product">
                    <div class="img-wrapper">
                        <a href="<?= base_url("produto/" . $destaque->id . "/" . limpar($destaque->titulo)); ?>">
                            <?php
                            if (is_file("assets/uploads/images/produtos/" . md5($destaque->id) . ".jpg")) {
                                $image_properties = array(
                                    'src' => "assets/uploads/images/produtos/" . md5($destaque->id) . ".jpg",
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
                    <h6><a href="<?= base_url("produto/" . $destaque->id . "/" . limpar($destaque->titulo)); ?>"><?= $destaque->titulo ?></a></h6>
                    <div class="price">
                        <span class="price-old">de: <del><?= reais($destaque->preco) ?></del></span>
                        <div>por: <strong><?= reais($destaque->preco) ?></strong> <span class="label-tags"><span class="label label-success">-10%</span></span></div>
                    </div>
                </div>
            </div>
            <?php
            if ($contador % 4 == 0) {
                echo "</div><div class='row'>";
            } endforeach;
        ?>
    </div>  
</div>  