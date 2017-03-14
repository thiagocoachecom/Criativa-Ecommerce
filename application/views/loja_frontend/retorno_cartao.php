<pre>
    <?= print_r($transacao) ?>
</pre>

<?php if ($transacao->status == 'refused'): ?>
    <div class="alert alert-danger" role="alert">
        <div><strong>Ops! :(</strong> Houve um erro ao processar o pagamento, a seguinte mensagem foi retornada pela operadora de cartão de crédito.</div>
        <div><h4>Código do Error: XXXXX</h4></div>
        <p>Mensagem da operadora: O seu número do pedido <?= $transacao->metadata->pedido_numero ?></p>
    </div>

<?php else: ?>
    <h4>Pedido: <?= $transacao->metadata->pedido_numero ?></h4>
    <p>Seu pagamento foi processado pela administradora de cartão de crédito com o seguinte status.</p>
    <p><b>Status: </b><?= $transacao->status ?></p>
    <p><b>Valor: </b><?= $transacao->amount ?></p>
    <p><b>ID da transação: </b><?= $transacao->id ?></p>
<?php endif; ?>