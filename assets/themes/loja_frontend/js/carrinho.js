
PagarMe.encryption_key = "ek_test_oNxKqsEoizrZplnH64lLSA0YdBXV1y";

var form = $("#payment_form");

form.submit(function (event) { // quando o form for enviado...
    // inicializa um objeto de cartão de crédito e completa
    // com os dados do form
    var creditCard = new PagarMe.creditCard();
    creditCard.cardHolderName = $("#payment_form #card_holder_name").val();
    creditCard.cardExpirationMonth = $("#payment_form #card_expiration_month").val();
    creditCard.cardExpirationYear = $("#payment_form #card_expiration_year").val();
    creditCard.cardNumber = $("#payment_form #card_number").val();
    creditCard.cardCVV = $("#payment_form #card_cvv").val();

    // pega os erros de validação nos campos do form
    var fieldErrors = creditCard.fieldErrors();

    //Verifica se há erros
    var hasErrors = false;
    for (var field in fieldErrors) {
        hasErrors = true;
        break;
    }

    if (hasErrors) {
        // realiza o tratamento de errors
        alert(fieldErrors);
    } else {
        // se não há erros, gera o card_hash...
        creditCard.generateHash(function (cardHash) {
            // ...coloca-o no form...
            form.append($('<input type="hidden" name="card_hash">').val(cardHash));

            // e envia o form
            form.get(0).submit();
        });
    }
    return false;
});


$("input[name='tipo_pagamento']").click(function () {
    if ($("input[name='tipo_pagamento']:checked").val() == 'boleto') {
        $('#dados_cartao').hide();
    } else {
        $('#dados_cartao').show();
    }
});
