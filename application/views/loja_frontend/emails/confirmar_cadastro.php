<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Net - Criativa Desenvolvimento</title>
    </head>
    <body>
        <h2>Net - Criativa Desenvolvimento</h2>
        <h3> Confirmação de cadastro. </h3>
        <p>Olá: <?php echo $nome . " " . $sobrenome ?>.<br> Muito obrigado por se cadastrar em nosso website.</p>
        <p>Para concluir seu cadastro e liberar sua conta para compras clique no link abaixo.</p>
        <p><a href="<?php echo base_url("cadastro/confirmar/" . md5($email)) ?>">Confimar cadastro no website!</a></p>
        <h4>Seja bem vindo, e boas compras!<br>Net - Criativa Desenvolvimento. </h4>
    </body>
</html>