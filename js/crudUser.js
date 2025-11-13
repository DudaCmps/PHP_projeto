$('input, select').on('input change', function () {
    const id = $(this).attr('id');
    const errorId = `#${id}-error`;
    
    $(this).removeClass('border-danger');
    $(errorId).html('');
});

const divClientes = document.getElementById("#listaClientes");

$(document).ready(function() {
  if (divClientes) {
    carregarClientes();
  } else {
      carregarVeiculos();
  }

});

//FUNÇÃO PARA LISTAR OS CLIENTES/RECARREGAR TABELA

function carregarClientes() {
    $.ajax({
      url: '../admin/listagemClientesAjax.php',
      type: 'GET',
      dataType: 'json',
      success: function(usuarios) {
        let html = '';
  
        if (usuarios.length === 0) {
          html = '<tr><td colspan="7" class="text-center">Sem registros</td></tr>';
        } else {
          usuarios.forEach(usuario => {
            if (usuario.perfil === 'cliente') {
              const ativo = usuario.ativo == 1 
                ? '<span class="status status-success">Sim</span>'
                : '<span class="status status-warning">Não</span>';
  
              const botaoAtivo = usuario.ativo == 1
                ? `<button onclick="inativarAtivarCliente(${usuario.id_user})" type="button" class="btn btn-sm me-1 btn-warning" title="Inativar">
                        <i class="fa-solid fa-ban"></i>
                      </button>`
                : `<button onclick="inativarAtivarCliente(${usuario.id_user})" type="button" class="btn btn-sm me-1 btn-success" title="Ativar">
                        <i class="cil-check-circle"></i>
                      </button>`;
  
              html += `
                <tr>
                  <td>${usuario.id_user}</td>
                  <td class="text-center">${usuario.nome}</td>
                  <td class="text-center">${usuario.cpf}</td>
                  <td class="text-center">${usuario.data_nasc}</td>
                  <td class="text-center">${ativo}</td>
                  <td class="text-center">${usuario.telefone}</td>
                  <td class="text-center">
                      <button onclick="editaCliente(${usuario.id_user})" type="button" class="btn btn-sm me-1 btn-primary" title="Editar">
                        <i class="fa-regular fa-pen-to-square"></i>
                      </button>
  
                    <button onclick="buscaHistorico(${usuario.id_user})" type="button" class="btn btn-sm btn-light me-1" title="Histórico">
                      <i class="cil-description"></i>
                    </button>
  
                    <button onclick="buscaEndereco(${usuario.id_user})" type="button" class="btn btn-sm btn-info me-1" title="Endereços">
                      <i class="cil-house"></i>
                    </button>
  
                    ${botaoAtivo}
  
                    <button onclick="deleteUser(${usuario.id_user})" type="button" class="btn btn-sm me-1 btn-danger" title="Excluir">
                        <i class="cil-trash"></i>
                    </button>
                  </td>
                </tr>`;
            }
          });
        }
  
        $('#listaClientes').html(html);
      },
      error: function() {
        $('#listaClientes').html('<tr><td colspan="7" class="text-center text-danger">Erro ao carregar clientes.</td></tr>');
      }
    });
}
  
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
                carregarClientes();
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

//FUNÇÕES DE EDITAR UM USUARIO
function trocarFormulario(modo) {
    if (modo === 'editar') {
      $('#form-visualizar').hide();
      $('#form-editar').show();
    } else if (modo === 'visualizar') {
      $('#form-editar').hide();
      $('#form-visualizar').show();
    }
}

$(document).ready(function () {
$('#btnEditar').on('click', function () {
    trocarFormulario('editar');
});

$('#btnCancelar').on('click', function () {
    trocarFormulario('visualizar');
});
});

function updateUser() {
    var id_user = $("#id_user").val();
    var perfil = $("#perfil").val();
    var nome = $("#nome").val();
    var email = $("#email").val();
    var telefone = $("#telefone").val();
    var cpf = $("#cpf").val();
    var data_nasc = $("#data_nasc").val();
    var senha = $("#senha").val();

    console.log({id_user, perfil, nome, email, telefone, cpf, data_nasc, senha});

    $.ajax({
         method: "post",
         url: "/locaFast/aUser/atualizarUser.php",
         data: {id_user:id_user, perfil:perfil, nome:nome, email:email, telefone:telefone,data_nasc:data_nasc , cpf:cpf, senha:senha},
         dataType: "json",
         success: function (response) {

            if (response.status == 'success') {
                
                alert(response.message || 'Sucesso ao atualizar.');

                $("#visualizar_nome").val(nome);
                $("#visualizar_email").val(email);
                $("#visualizar_telefone").val(telefone);
                $("#visualizar_cpf").val(cpf);
                $("#visualizar_data_nasc").val(data_nasc);

                // Fecha modal se existir
                if (modal.length) modal.modal('hide');
                
                trocarFormulario('visualizar');
            }else {
                 alert(response.message || 'Erro no cadastro.');
            }
         },
     });

}

//FUNÇÃO INATIVAR
function inativarAtivarCliente (idUser) {
    $.ajax({
        method: "GET",
        url: "../admin/inativarUsuario.php",
        data: { id_user: idUser },
        dataType: "json",
        success: function (response) {
            if (response.status === 'success') {
                carregarClientes();
            } else {
                alert(response.message || 'Erro.');
            }
        },
        error: function () {
            alert('SOCORRO');
        }
    });
}

//FUNÇÃO DELETAR
function deleteUser (idUser) {
  
  if (confirm("Você deseja continuar?")) {
    $.ajax({
      method: "GET",
        url: "../admin/excluirCliente.php",
        data: { id_user: idUser },
        dataType: "json",
        success: function (response) {
            if (response.status === 'success') {
                alert('Usuário deletado.');
                carregarClientes();
            } else {
                alert(response.message || 'Erro.');
            }
        },
        error: function () {
            alert('BLEH');
        }
    });
  }

}
//FUNÇÃO EDITAR CLIENTE
function editaCliente(idUser){
  const modal = new coreui.Modal($('#clienteEditar'));
  const conteudo = $('#conteudoEditar');

  modal.show();

  $.ajax({
    url: '../admin/editarCliente.php',
    type: 'GET',
    data: { id_user: idUser },
    success: function(response) {
      conteudo.html(response);
    },
    error: function() {
      conteudo.html('<p>Erro ao carregar ficha.</p>');
    }
  });
}

function atualizarCliente() {

const modal = $('#clienteEditar');
var id_user = modal.find("#id_user").val();
var perfil = modal.find("#perfil").val();
var nome = modal.find("#nome").val();
var email = modal.find("#email").val();
var telefone = modal.find("#telefone").val();
var cpf = modal.find("#cpf").val();
var data_nasc = modal.find("#data_nasc").val();
var senha = modal.find("#senha").val();

  $.ajax({
       method: "post",
       url: "/locaFast/aUser/atualizarUser.php",
       data: {id_user:id_user, perfil:perfil, nome:nome, email:email, telefone:telefone,data_nasc:data_nasc , cpf:cpf, senha:senha},
       dataType: "json",
       success: function (response) {

          if (response.status == 'success') {
              
              alert(response.message || 'Sucesso ao atualizar.');

              $("#visualizar_nome").val(nome);
              $("#visualizar_email").val(email);
              $("#visualizar_telefone").val(telefone);
              $("#visualizar_cpf").val(cpf);
              $("#visualizar_data_nasc").val(data_nasc);

              // modal.modal('hide');
    
          }else {
               alert(response.message || 'Erro ao atualizar.');
          }
       },
   });

}

//FUNÇÕES PARA BUSCAR HISTORICO
function buscaHistorico (idUser) {
    const modal = new coreui.Modal($('#clienteHistorico'));
    const conteudo = $('#conteudoHistorico');

    modal.show();

    $.ajax({
        url: '../clientes/listagemHistorico.php',
        type: 'GET',
        data: { id_user: idUser },
        success: function(response) {
          conteudo.html(response);
        },
        error: function() {
          conteudo.html('<p>Erro ao carregar histórico.</p>');
        }
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

function buscaEndereco (idUser) {

  // Se o modal já existir, pega ele; se não, cria
  let modal = coreui.Modal.getInstance(document.getElementById('clienteEndereco'));
  if (!modal) {
    modal = new coreui.Modal($('#clienteEndereco')[0]);
  }

  const conteudo = $('#conteudoEndereco');
  const conteudoEditar = $('#conteudoEditarEndereco');
  let titulo = $('#titulo-endereco');

  conteudoEditar.hide();
  conteudo.show();

  // Só mostra o modal se ainda não estiver aberto
  if (!$('#clienteEndereco').hasClass('show')) {
    modal.show();
  }
    
    $.ajax({
        url: '../enderecos/listagemEnderecos.php',
        type: 'GET',
        data: { id_user: idUser },
        success: function(response) {
          conteudo.html(response);
          titulo.html('Endereços cadastrados');
        },
        error: function() {
          conteudo.html('<p>Erro ao carregar histórico.</p>');
        }
    });
}

function buscaEditarEndereco(idEndereco) {
  const conteudo = $('#conteudoEditarEndereco');
  const conteudoEndereco = $('#conteudoEndereco');
  let titulo = $('#titulo-endereco');
  conteudoEndereco.hide();

  $.ajax({
      url: '../enderecos/formularioEndereco.php',
      type: 'GET',
      data: { id_endereco: idEndereco },
      success: function(response) {
      conteudo.show();
      conteudo.html(response);
      titulo.html('Editar');

      },
      error: function() {
        conteudo.html('<p>Erro ao carregar endereço.</p>');
      }
  });
}

function atualizarEndereco(idEndereco) {

  const modal = $('#clienteEndereco'); // seu modal
  var id_endereco = idEndereco;
  var cep = modal.find("#cep").val();
  var cidade = modal.find("#cidade").val();
  var estado = modal.find("#estado").val();
  var numero = modal.find("#numero").val();
  var bairro = modal.find("#bairro").val();
  var logradouro = modal.find("#logradouro").val();
  var complemento = modal.find("#complemento").val();
  
    $.ajax({
         method: "post",
         url: "/locaFast/enderecos/editarEndereco.php",
         data: {id_endereco:id_endereco, cep:cep, cidade:cidade,estado:estado, numero:numero, bairro:bairro , logradouro:logradouro, complemento:complemento},
         dataType: "json",
         success: function (response) {
  
            if (response.status == 'success') {
                
                alert(response.message || 'Sucesso ao atualizar.');
  
                $("#cep").val(cep);
                $("#cidade").val(cidade);
                $("#estado").val(estado);
                $("#numero").val(numero);
                $("#bairro").val(bairro);
                $("#logradouro").val(logradouro);
                $("#complemento").val(complemento);
      
            }else {
                 alert(response.message || 'Erro ao atualizar.');
            }
         },
     });
  
}

//FUNÇOES PARA RESERVAS

function carregarVeiculos() {

  $.ajax({
    url: 'admin/listagemVeiculosAjax.php',
    type: 'GET',
    dataType: 'json',
    success: function(veiculos) {
      let html = '';

      if (veiculos.length === 0) {
        html = '<tr><td colspan="7" class="text-center">Sem registros</td></tr>';
      } else {
        veiculos.forEach(carro => {

            const categoria = carro.categoria == 'luxo'
            ? 'Luxo'
            : carro.categoria == 'economico'
              ? 'Econômico'
              : 'SUV';
      
            if (carro.status === 'manutencao' || carro.status === 'alugado') {
              return;
            }

            html += `
              <tr>
                <td>${carro.id_carro}</td>
                <td class="text-center">${carro.nome_modelos}  ${carro.nomeMarca}</td>
                <td class="text-center">${carro.ano_fabricacao}</td>
                <td class="text-center">${carro.placa}</td>
                <td class="text-center">${categoria}</td>
                <td class="text-center">
                  
                  <button onclick="criaReserva(${carro.id_carro})" type="button" class="btn btn-sm btn-success me-1" data-coreui-toggle="tooltip" data-coreui-placement="top" title="Reservar">Reservar</button>
                </td>
              </tr>`;
        });
      }

      $('#listaVeiculosClientes').html(html);
    },
    error: function() {
      $('#listaVeiculosClientes').html('<tr><td colspan="7" class="text-center text-danger">Erro ao carregar veículos. Tente novamente!</td></tr>');
    }
  });
}

function criaReserva(idCarro) {

  $.ajax({
    method: 'get',
    url:'reservas/criaReserva.php',
    data: {id_carro:idCarro},
    dataType: 'json',
    success: function (response) {
      if (response.status == 'success') {
        alert('Sua solicitação foi enviada. Aguarde a confirmação!')
        carregarVeiculos();
      }else {
        alert(response.message || 'erro.');
      }
    },
    error: function(){
      alert('Erro na conexão com o servidor.')
    }
  });
}