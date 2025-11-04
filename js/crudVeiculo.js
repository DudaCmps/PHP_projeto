function cadastrarVeiculo() {
    var modelo = $("#modelo").val();
    var placa = $("#placa").val();
    var ano_fabricacao = $("#ano_fabricacao").val();
    var categoria = $("#categoria").val();

    if (!validateCadastro(modelo,placa, ano_fabricacao, categoria)) {
        return false;
    }

    $.ajax({
        method: "post",
        url: "cadastrarVeiculo.php",
        data: {modelo:modelo,placa:placa, ano_fabricacao:ano_fabricacao, categoria:categoria},
        dataType: "json",
        success: function (response) {

            if (response.status == 'success') {
                alert('Cadastrado com sucesso.');
                window.location.href = '../veiculos/formularioVeiculo.php';
                
            }else {
                alert(response.message || 'Erro no cadastro.');
            }
        },
    });
}

function validateCadastro(modelo,placa, ano_fabricacao, categoria) {
    
    let valid = true;

    if(modelo == null){
        $("#modeloError").html("Selecione um modelo");
        valid = false;
    }

    if (placa == "") {
        $("#placaError").html("Digite a placa corretamente");
        valid = false;
    }

    if(ano_fabricacao == ""){
        $("#anoError").html("Digite o ano corretamente");
        valid = false;
    }

    if (categoria == null) {
        $("#categoriaError").html("Selecione uma categoria");
        valid = false;
    }

    return valid;
}
//-------------------------------------------------

//FUNÇÕES DE EDITAR VEICULO

function editarVeiculo() {
console.log('morte');
    var id_carro = $("#id_carro").val();
    var modelo = $("#modelo").val();
    var placa = $("#placa").val();
    var ano = $("#ano").val();
    var categoria = $("#categoria").val();

    $.ajax({
        method: "post",
        url: "editarVeiculo.php",
        data: {id_carro:id_carro, modelo:modelo, placa:placa, ano:ano, categoria:categoria},
        dataType: "json",
        success: function (response) {

           if (response.status == 'success') {
               
               alert(response.message || 'Sucesso ao cadastrar.');

           }else {
                alert(response.message || 'Erro no cadastro.');
           }
        },
    });
    
}