<div class="alinhado-centro borda-base espaco-vertical text-center">
    <h3>Seja bem vindo a nossa loja.</h3>
    <p>A melhor loja de comida, especiarias e temperos. Compre online e receba em casa.</p>
    <a class="btn btn-medium btn-success" href="<?php echo base_url("cadastro") ?>">Cadastre-se</a>
</div>

<div class="row">
    <?php
    $contador = 0;
    foreach ($categorias as $categoria) : $contador++;
        ?>
        <div class="col-md-4">
            <h2><?= $categoria->titulo; ?></h2>
            <?php
            if (is_file("assets/uploads/images/produtos/" . md5($categoria->id) . ".jpg")) {
                $image_properties = array(
                    'src' => "assets/uploads/images/produtos/" . md5($categoria->id) . ".jpg",
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

            <p><?php echo word_limiter($categoria->descricao, 40) ?></p>
            <a class="btn btn-default" href="<?= base_url("categoria/" . $categoria->id . "/" . limpar($categoria->titulo)); ?>">Ver produtos</a>
        </div>
        <?php
        if ($contador % 3 == 0) {
            echo "</div><div class='row'>";
        }
        ?>
    <?php endforeach; ?>
</div>