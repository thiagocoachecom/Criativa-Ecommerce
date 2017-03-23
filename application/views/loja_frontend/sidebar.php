<div class="col-md-3 sidebar-offcanvas" id="sidebar">
    <div class="mold_categorias">
        <p><i class="fa fa-list-ul" aria-hidden="true"></i> <strong>Categorias em destaque</strong></p>
        <div class="list-group">
            <?php foreach ($categorias as $categoria): $categoria_id_url = $this->uri->segment(2, 0); ?>
                <a href="<?= base_url("categoria/" . $categoria->id . "/" . limpar($categoria->titulo)); ?>" class="list-group-item <?php
                if ($categoria->id == $categoria_id_url) : echo 'active';
                endif;
                ?>"><i class="fa fa-caret-right" aria-hidden="true"></i> <?= $categoria->titulo; ?></a>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="mold_banner">
        <img alt="" src="https://integrando.se/files/produtos/127/400/ofertas-antecipadas.jpg" class="img-responsive">
        <br>
        <img alt="" src="https://integrando.se/files/produtos/130/400/semana-do-consumidor.png" class="img-responsive">
        <br>
    </div>
</div>
