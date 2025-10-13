//FUNÇÕES LOGIN E CADASTRO

function loginUser(){

    var email = $("#email").val();
    var senha = $("#senha").val();

    if (!validateLogin(email,senha)) {
        return false;
    }

    $.ajax({
        method: "post",
        url: "loginProcess.php",
        data: {email:email, senha:senha},
        dataType: "json",
        success: function (response) {
            if (response.status == 'success') {
                if (response.perfil == 'admin') {
                    window.location.href = '../admin/index.php';
                }else{
                    window.location.href = '../index.php';
                }
            }else {
                alert(response.message || 'Erro no login.');
            }
        },
    });
}

function validateLogin(email, senha) {
    let valid = true; 
    
    if (email == "") {
        $("#emailError").html("Digite seu E-mail");
        valid = false;
    } else {
        $("#emailError").html("");
    }

    if (senha == "") {
        $("#senhaError").html("Digite sua senha");
        valid = false;
    } else {
        $("#senhaError").html("");
    }

    return valid;
}

function registerUser(){

   var nome = $("#nome").val();
   var email = $("#email").val();
   var telefone = $("#telefone").val();
   var cpf = $("#cpf").val();
   var data_nasc = $("#data_nasc").val();
   var senha = $("#senha").val();

   if (!validateRegister(nome,email, telefone, data_nasc, cpf,  senha)) {
        return false;
    }

    $.ajax({
        method: "post",
        url: "registerProcess.php",
        data: {nome:nome, email:email, telefone:telefone,data_nasc:data_nasc , cpf:cpf, senha:senha},
        dataType: "json",
        success: function (response) {

            if (response.status == 'success') {
                window.location.href = '../auth/loginPage.php';
                
            }else {
                alert(response.message || 'Erro no cadastro.');
            }
        },
    });
}

function validateRegister(nome,email, telefone, data_nasc, cpf, senha) {
    let valid = true;

    if (nome == "") {
        $("#nomeError").html("Digite seu nome");
        valid = false;
    } else {
        $("#nomeError").html("");
    }

    if (email == "") {
        $("#emailError").html("Digite seu E-mail");
        valid = false;
    } else {
        $("#emailError").html("");
    }

    if (telefone == "") {
        $("#telefoneError").html("Digite seu telefone");
        valid = false;
    } else {
        $("#telefoneError").html("");
    }

    if (data_nasc == "") {
        $("#data_nascError").html("Digite sua data de nascimento");
        valid = false;
    } else {
        $("#data_nascError").html("");
    }

    if (cpf == "") {
        $("#cpfError").html("Digite seu CPF");
        valid = false;
    } else {
        $("#cpfError").html("");
    }

    if (senha == "") {
        $("#senhaError").html("Digite sua senha");
        valid = false;
    } else {
        $("#senhaError").html("");
    }

    return valid;
}

//-------------------------------------------------

//FUNÇÕES DE EDITAR UM USUARIO

// Função para alternar entre os formulários de visualização e edição
function trocarFormulario(modo) {
    if (modo === 'editar') {
      $('#form-visualizar').hide();
      $('#form-editar').show();
    } else if (modo === 'visualizar') {
      $('#form-editar').hide();
      $('#form-visualizar').show();
    }
  }
  
// Evento par aos button
$(document).ready(function () {
$('#btnEditar').on('click', function () {
    trocarFormulario('editar');
});

$('#btnCancelar').on('click', function () {
    trocarFormulario('visualizar');
});
});
  

function updateUser() {

    console.log("#nome");
    var id_user = $("#id_user").val();
    var perfil = $("#perfil").val();
    var nome = $("#nome").val();
    var email = $("#email").val();
    var telefone = $("#telefone").val();
    var cpf = $("#cpf").val();
    var data_nasc = $("#data_nasc").val();
    var senha = $("#senha").val();

    $.ajax({
         method: "post",
         url: "atualizarUser.php",
         data: {id_user:id_user, perfil:perfil, nome:nome, email:email, telefone:telefone,data_nasc:data_nasc , cpf:cpf, senha:senha},
         dataType: "json",
         success: function (response) {

            if (response.status == 'success') {
                
                alert(response.message || 'Sucesso ao cadastrar.');

                 // Atualiza os campos no formulário de visualização
                $("#visualizar_nome").val(nome);
                $("#visualizar_email").val(email);
                $("#visualizar_telefone").val(telefone);
                $("#visualizar_cpf").val(cpf);
                $("#visualizar_data_nasc").val(data_nasc);
                
                trocarFormulario('visualizar');
            }else {
                 alert(response.message || 'Erro no cadastro.');
            }
         },
     });

}


//FUNÇÕES DE EDITAR UM USUARIO

function showAdress(){  

    var botao = document.getElementById('formularioEndereco');
    var botaoAdress = document.getElementById('btnAdress');

    if (botao.style.display === 'none') {
        botao.style.display = 'block';
        document.querySelector('#btnAdress').textContent = 'Não cadastrar endereço';
    }else{
        botao.style.display = 'none';
        document.querySelector('#btnAdress').textContent = 'Adicionar endereço ao cliente';

    }
}