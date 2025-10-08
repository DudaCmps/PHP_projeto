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


