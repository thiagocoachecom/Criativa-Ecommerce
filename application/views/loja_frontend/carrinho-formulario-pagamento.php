<pre>
    <?=  print_r($this->cart->total());?>
</pre>

<form id="payment_form" action="<?= base_url('carrinho/finalizar_compra') ?>" method="POST">
    <div class="col-md-12">
        <div class="page-header">
            <h1>Finalizar compra <small>preencha as informações de pagamento do seu pedido</small></h1>
        </div>
    </div>
    <div class="col-md-12">
        <div class="radio-inline">
            <label>
                <input type="radio" name="tipo_pagamento" id="optionsRadios1" value="cartao" checked>
                Cartão de Crédito
            </label>
        </div>
        <div class="radio-inline">
            <label>
                <input type="radio" name="tipo_pagamento" id="optionsRadios1" value="boleto">
                Boleto Bancário
            </label>
        </div>
    </div>
    <div class="col-md-4">
        <div id="dados_cartao">
            <div class="form-group">
                <label for="card_number">Numero do cartão</label>
                <input type="text" class="form-control"  id="card_number" value="5067755030181414" />
            </div>
            <div class="form-group">
                <label for="card_holder_name">Nome do titular do cartão</label>
                <input type="text" class="form-control"  id="card_holder_name" value="Thiago S Pereira" />
            </div>
            <div class="form-group">
                <label for="card_expiration_month">Validade Mês</label>
                <input type="text" class="form-control" id="card_expiration_month" value="08"/>
            </div>
            <div class="form-group">
                <label for="card_expiration_year">Validade Ano</label>
                <input type="text" class="form-control" id="card_expiration_year" value="22"/>
            </div>
            <div class="form-group">
                <label for="card_cvv">Código de segurança</label>
                <input type="text" class="form-control" id="card_cvv" value="602"/>
            </div>
            <select class="form-control">
                <option value="1">1 parcela de <?= reais($this->cart->total() + $frete) ?></option>
                <option value="2">2 parcela de <?= reais(($this->cart->total() + $frete) / 2) ?></option>
                <option value="3">3 parcela de <?= reais(($this->cart->total() + $frete) / 3) ?></option>
            </select>
            <div class="dados_preco_frete">
                <div><b>Produtos:</b> <?= reais($this->cart->total()) ?></div>
                <div><b>Frete:</b> <?= reais($frete) ?></div>
                <div><b>Total:</b> <?= reais($this->cart->total() + $frete) ?></div>
            </div>
        </div>
        <div id="field_errors"></div>
        <button type="submit" class="btn btn-danger btn-lg pull-right">Pagar e finalizar compra</button>
    </div>
</form>