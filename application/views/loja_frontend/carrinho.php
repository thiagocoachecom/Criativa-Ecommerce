<pre>
    <?= print_r($this->cart->contents()); ?>
   
</pre>
<?php $contador = 1; ?>
<div class="col-md-12">
    <div class="page-header">
        <h1>Carrinho <small>Clique em finalizar compra para efetuar o seu pedido.</small></h1>
    </div>
</div>
<?php if ($this->cart->total_items() > 0): ?>
    <div class="col-md-12">
        <?= form_open(base_url("carrinho/atualizar")) ?>
        <table class="table table-striped tabela_carrinho">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th></th>
                    <th>Preço unitário</th>
                    <th>Quantidade</th>
                    <th>Subtotal</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($this->cart->contents() as $item): ?>
                    <?= form_hidden($contador . '[rowid]', $item['rowid']) ?>
                    <tr>
                        <td>
                            <?= img(array("src" => $item['foto'], "class" => "img-thumbnail", "width" => "85px", "heigth" => "85px")) ?>
                        </td>
                        <td>
                            <div class="produto-info">
                                <?= anchor($item['url'], $item['name']) ?>
                                <ul class="ul-carrinho">
                                    <li>
                                        <span>
                                            SKU:
                                            <strong>
                                                85956
                                            </strong>
                                        </span>
                                    </li>
                                    <li>
                                        <span>
                                            Estoque:
                                            <strong>
                                                Disponível
                                            </strong>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </td>
                        <td>
                            <div class="preco-produto destaque-parcela com-promocao">
                                <div>
                                    <s class="preco-venda ">
                                        <?= reais($item['price']); ?>
                                    </s>
                                    <br>
                                    <strong class="preco-promocional">
                                         <?= reais($item['price']); ?>
                                    </strong>
                                </div>
                            </div>
                        </td>
                        <td>
                            <?= form_input(array("name" => $contador . "[qty]", "value" => $item['qty'], 'class' => 'form-control quantidade')) ?> <button type="submit" class="btn btn-primary btn-xs atualizar"><i class="fa fa-refresh" aria-hidden="true"></i> Atualizar</button>
                        </td>
                        <td>
                            <div class="subtotal">
                                <strong class="preco-promocional com-marge">
                                    <?= reais($item['subtotal']) ?>
                                </strong>
                            </div>
                        </td>
                        <td>
                            <div class="excluir">
                                <a href="<?= base_url('carrinho/remover/' . $item['rowid']) ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i> Remover produto</a>
                            </div>
                        </td>
                    </tr>
                    <?php
                    $contador++;
                endforeach;
                ?>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="final-carrinho-soma">Total: <strong><?= reais($this->cart->total()) ?></strong> <br>Frete: <strong><?= reais($frete) ?></strong><br>Total da compra: <strong><?= reais($this->cart->total() + $frete) ?></strong></td>
                </tr>
            </tbody>
        </table>

        <?php if ($frete): ?>

        <?php else: ?>
            <div class="alert alert-info" role="alert"> <strong>Atenção!</strong> Efetue o <b><a href="<?= base_url('login') ?>">Login</a></b> para calcular o frete e finalizar a compra.</div>
        <?php endif; ?>
        <div class="btns-carrinho">
            <img src="https://cdn.awsli.com.br/production/static/img/struct/stamp_positivessl_cart.png" alt="Compra 100% Segura">
            <a href="<?= base_url('pagar-e-finalizar-compra') ?>" class="btn pull-right btn-lg btn-finalizarcompra"><i class="fa fa-check" aria-hidden="true"></i> Finalizar compra</a>
            <a href="<?= base_url() ?>" class="btn pull-right btn-default btn-continuar-comprando">Continuar comprando</a>
        </div>
        <?= form_close(); ?>
    </div>
<?php else: ?>
    <div class="col-md-12">
        <div class="alert alert-info" role="alert"> <strong>Ops! :(</strong> Não encontramos nenhum produto adicionado em seu carrinho. </div>
    </div>
<?php endif; ?>
