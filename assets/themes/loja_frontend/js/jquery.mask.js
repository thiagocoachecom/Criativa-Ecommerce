$('#cpf').mask('000.000.000-00', {reverse: true});
$('#cep').mask('00000-000', {reverse: true});
$('#telefone').mask('00 - 0000.0000', {reverse: true});
$('#celular').mask('00 - 0 0000.0000', {reverse: true});
$('#data_nascimento').mask('00/00/0000', {reverse: true});
$('#sexo').mask('A', {reverse: true});
$("#cep").blur(function () {
    $.getJSON("https://viacep.com.br/ws/" + $("#cep").val() + "/json", function (dados) {
        if (!("erro" in dados)) {
            $("#rua").val(dados.logradouro);
            $("#bairro").val(dados.bairro);
            $("#cidade").val(dados.localidade);
            $("#estado").val(dados.uf);
            $("#numero").focus();
        } else {
            alert("CEP não encontrado.");
        }
    });
});
