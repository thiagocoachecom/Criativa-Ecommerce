<div class="col-md-9">
    <div class="row">
        <div class="col-md-12">
            <h1 class="search-title">Sua pesquisa por "<?= $termo ?>"</h1>
        </div>
    </div>
    <div class="row">
        <?php foreach ($destaques as $destaque): ?>
            <div class="col-sm-4 col-md-3 hidden-sm hidden-xs box-product-outer">
                <div class="box-product">
                    <div class="img-wrapper">
                        <a href="detail.html">
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
                    <h6><a href="detail.html"><?= $destaque->titulo ?></a></h6>
                    <div class="price">
                        <div>$13.50 <span class="label-tags"><span class="label label-danger">-10%</span></span></div>
                        <span class="price-old">$15.00</span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>