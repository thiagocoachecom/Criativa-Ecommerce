
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="<?= base_url('assets/themes/loja_frontend/images/banner/banner-3.png'); ?>" alt="...">
            <div class="carousel-caption">
                <div class="container">
                    <div class="mold-left-anuncio">
                        <div class="titulo"><h1>Qualidade de impressão nunca vista!</h1></div>
                        <div class="descricao">Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI</div>
                        <button type="button" class="btn btn-warning">Saiba mais</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="<?= base_url('assets/themes/loja_frontend/images/banner/banner-2.png'); ?>" alt="...">
            <div class="carousel-caption">
                <div class="mold-produto-slide">
                    <titulo><h1>Placa Não estacione. Sujeito a guincho</h1></titulo>
                    <preco>R$ 29,90</preco>
                    <descricao>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI</desacricao>
                </div>
            </div>
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
