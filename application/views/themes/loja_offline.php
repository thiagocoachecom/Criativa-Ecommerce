
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>BSB - Mídia e Comunicação Visual</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <!-- Custom font from Google Web Fonts -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">

        <!-- Social font -->
        <link href="<?= base_url('assets/themes/loja_offline/css/social-font.css'); ?>" rel="stylesheet">

        <!-- Template stylesheet -->
        <link href="<?= base_url('assets/themes/loja_offline/css/metronome.css'); ?>" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <!-- Header -->
            <h1 class="header section">;) Aguarde! </h1>
            <!-- /Header -->

            <!-- Description -->
            <p class="description section">A <strong>BSB Mídia e Comunicação</strong> está preparando uma super loja virtual para atender as suas necessidades com a comunicação visual. Dentro de alguns dias teremos um local onde você poderá efetuar qualquer pedido em nosso site e entregaremos para todo o Brasil.</p>
            <p class="description section">Quer ficar sabendo quando o site estará no ar? É fácil, deixe o seu e-mail abaixo e comunicaremos você!</p>
            <!-- /Description -->

            <!-- Subscription form -->
            <?= validation_errors('<div class="alert-sews" role="alert">', '</div>') ?>
            <?php if (isset($mensagem)): ?>
                <div class="alert-sucesso" role="alert"><?= $mensagem ?></div>
            <?php endif; ?>
            <form action="<?= base_url('home/index'); ?>" method="post" accept-charset="utf-8" class="subscription-form section red" id="subscription-form">
                <input type="email" class="subscription-email" id="subscription-email" name="email" placeholder="Seu melhor e-mail!"><button class="subscription-submit" id="subscription-submit" type="submit">Enviar</button>
            </form>
            <!-- /Subscription form -->
        </div>

        <!-- Scripts -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="./js/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="<?= base_url('assets/themes/loja_offline/js/jquery.countdown.js'); ?>"></script>
        <script src="<?= base_url('assets/themes/loja_offline/js/placeholders.min.js'); ?>"></script>
    </body>
</html>