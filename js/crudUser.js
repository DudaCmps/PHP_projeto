$('input, select').on('input change', function () {
    const id = $(this).attr('id');
    const errorId = `#${id}-error`;
    
    $(this).removeClass('border-danger');
    $(errorId).html('');
});

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

function registerUser() {
    var nome = $("#nome").val();
    var email = $("#email").val(); // Certifique-se de que exista no form
    var telefone = $("#telefone").val();
    var cpf = $("#cpf").val();
    var data_nasc = $("#data_nasc").val();
    var senha = $("#senha").val();

    var endereco = document.getElementById('formularioEndereco');

    // Validação básica
    if (!validateRegister(nome, email, telefone, data_nasc, cpf, senha)) return false;

    var data = { nome, email, telefone, data_nasc, cpf, senha };

    if (endereco.style.display !== 'none') {
        var cep = $("#cep").val();
        var cidade = $("#cidade").val();
        var uf = $("#uf").val();
        var numero = $("#numero").val();
        var bairro = $("#bairro").val();
        var logradouro = $("#logradouro").val();
        var complemento = $("#complemento").val();

        if (!validateAdress(cep, cidade, uf, numero, bairro, logradouro, complemento)) return false;

        // Adiciona os dados do endereço ao objeto data
        Object.assign(data, { cep, cidade, uf, numero, bairro, logradouro, complemento });
    }

    $.ajax({
        method: "POST",
        url: "../auth/registerProcess.php",
        data: data,
        dataType: "json",
        success: function (response) {
            if (response.status === 'success') {
                alert(response.message || 'Cadastro realizado com sucesso!');
                $('#clienteNovoModal').modal('hide');
                $('#nome, #email, #telefone, #cpf, #data_nasc, #senha, #cep,#cidade,#uf,#numero,#bairro,#logradouro,#complemento').val('');
            } else {
                alert(response.message || 'Erro no cadastro.');
            }
        },
        error: function () {
            alert('Erro na comunicação com o servidor.');
        }
    });
}

function validateRegister(nome,email, telefone, data_nasc, cpf, senha) {
    let valid = true;

    // Nome
    if (nome.trim() === "") {
        $("#nome-error").html("Insira um nome válido");
        $("#nome").addClass("border-danger");
        valid = false;
    } else {
        $("#nome-error").html("");
        $("#nome").removeClass("border-danger");
    }

    //Email
    if (email == "") {
        $("#email-error").html("Insira um email válido");
        $("#email").addClass("border-danger");
        valid = false;
    } else {
        $("#email-error").html("");
        $("#email").removeClass("border-danger");
    }

    //Telefone
    if (telefone == "") {
        $("#telefone-error").html("Insira um telefone válido");
        $("#telefone").addClass("border-danger");
        valid = false;
    } else {
        $("#telefone-error").html("");
        $("#telefone").removeClass("border-danger");
    }

    //Telefone
    if (data_nasc == "") {
        $("#data_nasc-error").html("Digite sua data de nascimento");
        $("#data_nasc").addClass("border-danger");
        valid = false;
    } else {
        $("#data_nasc-error").html("");
        $("#data_nasc").removeClass("border-danger");
    }

    //CPF
    if (cpf == "") {
        $("#cpf-error").html("Digite seu CPF");
        $("#cpf").addClass("border-danger");
        valid = false;
    } else {
        $("#cpf-error").html("");
        $("#cpf").removeClass("border-danger");
    }

    //Senha
    if (senha == "") {
        $("#senha-error").html("Digite sua senha");
        $("#senha").addClass("border-danger");
        valid = false;
    } else {
        $("#senha-error").html("");
        $("#senha").removeClass("border-danger");
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
  
// Evento para os button
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

//FUNÇÕES DE ENDEREÇO

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

function validateAdress(cep, cidade, uf, numero, bairro, logradouro, complemento) {
    let valid = true;

    // CEP
    if (cep.trim() === "") {
        $("#cep-error").html("Insira um CEP válido");
        $("#cep").addClass("border-danger");
        valid = false;
    } else {
        $("#cep-error").html("");
        $("#cep").removeClass("border-danger");
    }

    // Cidade
    if (cidade.trim() === "") {
        $("#cidade-error").html("Insira um cidade válido");
        $("#cidade").addClass("border-danger");
        valid = false;
    } else {
        $("#cidade-error").html("");
        $("#cidade").removeClass("border-danger");
    }
    
    // UF
    if (uf === null) {
        $("#uf-error").html("Selecione uma opção");
        $("#uf").addClass("border-danger");
        valid = false;

      } else {
        $("#uf-error").html("");
        $("#uf").removeClass("border-danger");
      }

    // Número
    if (numero.trim() === "") {
        $("#numero-error").html("Insira um número válido");
        $("#numero").addClass("border-danger");
        valid = false;
      } else {
        $("#numero-error").html("");
        $("#numero").removeClass("border-danger");
      }

      // Bairro
      if (bairro.trim() === "") {
        $("#bairro-error").html("Insira um endereço válido");
        $("#bairro").addClass("border-danger");
        valid = false;
      } else {
        $("#bairro-error").html("");
        $("#bairro").removeClass("border-danger");
      }

      // Logradouro
      if (logradouro.trim() === "") {
        $("#logradouro-error").html("Insira um endereço válido");
        $("#logradouro").addClass("border-danger");
        valid = false;
      } else {
        $("#logradouro-error").html("");
        $("#logradouro").removeClass("border-danger");
      }

      // Complemento
      if (complemento.trim() === "") {
        $("#complemento-error").html("Insira um endereço válido");
        $("#complemento").addClass("border-danger");
        valid = false;
      } else {
        $("#complemento-error").html("");
        $("#complemento").removeClass("border-danger");
      }
      
    return valid;
}