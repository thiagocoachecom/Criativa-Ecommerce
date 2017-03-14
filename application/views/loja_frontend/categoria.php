<div class="col-xs-12 col-sm-9">
    <h1><?= heading($categoria['detalhes'][0]->titulo, 1) ?></h1>
    <p><?= $categoria['detalhes'][0]->descricao ?></p>



    <div class="row">
        <?php
        $contador = 0;
        foreach ($categoria['produtos'] as $produto) {
            $contador++;
            echo "<div class='col-md-4'>" .
            heading($produto->titulo, 3) .
            heading($produto->codigo, 6);



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



            echo "<p>" . word_limiter($produto->descricao, 15) . "</p>" .
            heading(reais($produto->preco), 5) .
            anchor(base_url("produto/" . $produto->id . "/" . limpar($produto->titulo)), "Ver produto", array('class' => 'btn btn-primary')) .
            "</div>";
            if ($contador % 3 == 0) {
                echo "</div><div class='row'>";
            }
        }
        ?>
    </div>
</div>